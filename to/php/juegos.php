<?php
header('Content-Type: application/json');
require_once '../config/db.php'; // Archivo de conexión (crearlo después)

// Obtener parámetros de filtro
$genero = $_GET['genero'] ?? '';
$precio = $_GET['precio'] ?? '';
$rating = $_GET['rating'] ?? '';
$orden = $_GET['orden'] ?? 'popularidad';

// Construir consulta SQL
$sql = "SELECT * FROM juegos WHERE 1=1";
$params = [];

if ($genero) {
    $sql .= " AND genero = ?";
    $params[] = $genero;
}

if ($precio) {
    list($min, $max) = explode('-', $precio);
    if ($max) {
        $sql .= " AND precio BETWEEN ? AND ?";
        $params[] = $min;
        $params[] = $max;
    } else {
        $sql .= " AND precio >= ?";
        $params[] = $min;
    }
}

if ($rating) {
    $sql .= " AND rating >= ?";
    $params[] = $rating;
}

// Ordenamiento
switch ($orden) {
    case 'precio-asc':
        $sql .= " ORDER BY precio ASC";
        break;
    case 'precio-desc':
        $sql .= " ORDER BY precio DESC";
        break;
    case 'fecha':
        $sql .= " ORDER BY fecha_lanzamiento DESC";
        break;
    default:
        $sql .= " ORDER BY rating DESC";
}

// Ejecutar consulta
$stmt = $pdo->prepare($sql);
$stmt->execute($params);
$juegos = $stmt->fetchAll(PDO::FETCH_ASSOC);

echo json_encode($juegos);
?>