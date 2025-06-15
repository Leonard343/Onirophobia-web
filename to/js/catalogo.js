document.addEventListener('DOMContentLoaded', () => {
    const gamesGrid = document.getElementById('games-grid');
    const genreFilter = document.getElementById('genre-filter');
    const priceFilter = document.getElementById('price-filter');
    const ratingFilter = document.getElementById('rating-filter');
    const sortBy = document.getElementById('sort-by');

    // Cargar juegos desde la API
    async function fetchGames() {
        const genre = genreFilter.value;
        const price = priceFilter.value;
        const rating = ratingFilter.value;
        const sort = sortBy.value;

        const url = `php/juegos.php?genero=${genre}&precio=${price}&rating=${rating}&orden=${sort}`;
        
        try {
            const response = await fetch(url);
            const games = await response.json();
            renderGames(games);
        } catch (error) {
            console.error('Error al cargar juegos:', error);
        }
    }

    // Renderizar juegos
    function renderGames(games) {
        gamesGrid.innerHTML = '';
        games.forEach(game => {
            gamesGrid.innerHTML += `
                <div class="game-card" data-genre="${game.genero}" data-price="${game.precio}" data-rating="${game.rating}" data-date="${game.fecha_lanzamiento}">
                    <img src="${game.imagen_url}" alt="${game.titulo}">
                    <div class="game-info">
                        <h3>${game.titulo}</h3>
                        <div class="game-meta">
                            <span class="price">$${game.precio.toFixed(2)}</span>
                            <span class="rating">${'★'.repeat(Math.floor(game.rating))}${'☆'.repeat(5 - Math.floor(game.rating))} <span>${game.rating}</span></span>
                        </div>
                        <button class="add-to-cart">Añadir al carrito</button>
                    </div>
                </div>
            `;
        });
    }

    // Event listeners para filtros
    genreFilter.addEventListener('change', fetchGames);
    priceFilter.addEventListener('change', fetchGames);
    ratingFilter.addEventListener('change', fetchGames);
    sortBy.addEventListener('change', fetchGames);

    // Carga inicial
    fetchGames();
});