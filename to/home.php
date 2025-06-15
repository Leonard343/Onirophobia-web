<?php
require_once 'config/db.php';
$stmt = $pdo->query("SELECT * FROM juegos WHERE destacado = TRUE LIMIT 3");
$juegos_destacados = $stmt->fetchAll();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GameHub - Inicio</title>
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>
    <!-- Barra de navegación -->
<header>
    <nav>
        <a href="home.php" class="logo">GameHub</a>
        
        <!-- Menú principal -->
        <ul class="nav-links">
            <li><a href="home.php"><i class="fas fa-home"></i> Inicio</a></li>
            <li><a href="catalogo.html"><i class="fas fa-gamepad"></i> Catálogo</a></li>
            <li><a href="offers.html"><i class="fas fa-tag"></i> Ofertas</a></li>
            <li><a href="news.html"><i class="fas fa-newspaper"></i> Noticias</a></li>
        </ul>

        <!-- Barra de búsqueda -->
        <div class="search-bar">
            <input type="text" placeholder="Buscar juegos...">
            <button><i class="fas fa-search"></i></button>
        </div>

        <!-- Auth y menú móvil -->
        <div class="auth-buttons">
            <button id="login-btn"><i class="fas fa-user"></i> Iniciar Sesión</button>
            <button id="register-btn"><i class="fas fa-user-plus"></i> Registrarse</button>
        </div>
        <button class="menu-toggle" id="menu-toggle"><i class="fas fa-bars"></i></button>
    </nav>

    <!-- Menú móvil (oculto por defecto) -->
    <div class="mobile-menu" id="mobile-menu">
        <ul>
            <li><a href="home.php"><i class="fas fa-home"></i> Inicio</a></li>
            <li><a href="catalogo.html"><i class="fas fa-gamepad"></i> Catálogo</a></li>
            <li><a href="offers.html"><i class="fas fa-tag"></i> Ofertas</a></li>
            <li><a href="news.html"><i class="fas fa-newspaper"></i> Noticias</a></li>
        </ul>
        <input type="text" placeholder="Buscar...">
        <button id="mobile-login"><i class="fas fa-user"></i> Iniciar Sesión</button>
        <button id="mobile-register"><i class="fas fa-user-plus"></i> Registrarse</button>
    </div>
</header>

    <!-- Carrusel de juegos destacados -->
    <section class="featured-games">
        <h2>Juegos Destacados</h2>
        <div class="carousel">
            <?php foreach ($juegos_destacados as $index => $juego): ?>
            <div class="carousel-item <?= $index === 0 ? 'active' : '' ?>">
                <img src="<?= htmlspecialchars($juego['imagen_url']) ?>" alt="<?= htmlspecialchars($juego['titulo']) ?>">
                <div class="carousel-caption">
                    <h3><?= htmlspecialchars($juego['titulo']) ?></h3>
                    <p>$$<?= $juego['precio'] ?></p>
                </div>
            </div>
            <?php endforeach; ?>
            <button class="carousel-prev">&#10094;</button>
            <button class="carousel-next">&#10095;</button>
        </div>
    </section>

    <!-- Ofertas especiales -->
    <section class="special-offers">
        <h2>Ofertas Especiales</h2>
        <div class="offers-grid">
        <div class="offer-card">
            <img src="https://cdn.akamai.steamstatic.com/steam/apps/1174180/library_600x900.jpg" alt="Red Dead Redemption 2">
            <h3>50% OFF</h3>
            <p>Red Dead Redemption 2</p>
        </div>
        <div class="offer-card">
            <img src="https://cdn.akamai.steamstatic.com/steam/apps/1313860/library_600x900.jpg" alt="EA Sports FC 24">
            <h3>30% OFF</h3>
            <p>EA Sports FC 24</p>
        </div>
    </section>

    <!-- Categorías populares -->
    <section class="popular-categories">
        <h2>Categorías Populares</h2>
        <div class="categories-grid">
        <div class="category-card">
            <img src="https://images.unsplash.com/photo-1551103782-8ab07afd45c1?ixlib=rb-1.2.1&auto=format&fit=crop&w=150&q=80" alt="Acción">
            <h3>Acción</h3>
        </div>
        <div class="category-card">
            <img src="https://images.unsplash.com/photo-1542751371-adc38448a05e?ixlib=rb-1.2.1&auto=format&fit=crop&w=150&q=80" alt="Aventura">
            <h3>Aventura</h3>
        </div>
        <div class="category-card">
            <img src="https://images.unsplash.com/photo-1542751371-adc38448a05e?ixlib=rb-1.2.1&auto=format&fit=crop&w=150&q=80" alt="RPG">
            <h3>RPG</h3>
        </div>
        </div>
    </section>


    <script src="js/home.js"></script>
</body>
</html>