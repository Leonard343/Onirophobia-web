// script.js
document.addEventListener('DOMContentLoaded', () => {
    // Carrusel
    const carouselItems = document.querySelectorAll('.carousel-item');
    const prevBtn = document.querySelector('.carousel-prev');
    const nextBtn = document.querySelector('.carousel-next');
    let currentIndex = 0;

    function showItem(index) {
        carouselItems.forEach((item, i) => {
            item.classList.toggle('active', i === index);
        });
    }

    prevBtn.addEventListener('click', () => {
        currentIndex = (currentIndex - 1 + carouselItems.length) % carouselItems.length;
        showItem(currentIndex);
    });

    nextBtn.addEventListener('click', () => {
        currentIndex = (currentIndex + 1) % carouselItems.length;
        showItem(currentIndex);
    });

    // Login/Registro (simulado)
    document.getElementById('login-btn').addEventListener('click', () => {
        alert('Redirigiendo a Inicio de Sesión');
    });

    document.getElementById('register-btn').addEventListener('click', () => {
        alert('Redirigiendo a Registro');
    });

    document.getElementById('menu-toggle').addEventListener('click', () => {
        const mobileMenu = document.getElementById('mobile-menu');
        mobileMenu.style.display = mobileMenu.style.display === 'block' ? 'none' : 'block';
    });

});

// Toggle del menú móvil
document.getElementById('menu-toggle').addEventListener('click', () => {
    const mobileMenu = document.getElementById('mobile-menu');
    mobileMenu.style.display = mobileMenu.style.display === 'block' ? 'none' : 'block';
});

// Cerrar menú al hacer clic en un enlace (móvil)
document.querySelectorAll('#mobile-menu a').forEach(link => {
    link.addEventListener('click', () => {
        document.getElementById('mobile-menu').style.display = 'none';
    });
});

// Abrir/Cerrar Modales
document.querySelectorAll('#login-btn, #mobile-login').forEach(btn => {
    btn.addEventListener('click', () => {
        document.getElementById('login-modal').style.display = 'block';
    });
});

document.querySelectorAll('#register-btn, #mobile-register').forEach(btn => {
    btn.addEventListener('click', () => {
        document.getElementById('register-modal').style.display = 'block';
    });
});

document.querySelectorAll('.close-modal').forEach(btn => {
    btn.addEventListener('click', () => {
        document.querySelectorAll('.modal').forEach(modal => {
            modal.style.display = 'none';
        });
    });
});

