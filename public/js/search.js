document.addEventListener('DOMContentLoaded', function() {
    // Manejadores para los botones de filtro
    const showAuthorsBtn = document.getElementById('showAuthors');
    const showTitlesBtn = document.getElementById('showTitles');
    const authorsSection = document.getElementById('authorsSection');
    const titlesSection = document.getElementById('titlesSection');

    showAuthorsBtn.addEventListener('click', function() {
        authorsSection.style.display = 'block';
        titlesSection.style.display = 'none';
        showAuthorsBtn.classList.add('active');
        showTitlesBtn.classList.remove('active');
    });

    showTitlesBtn.addEventListener('click', function() {
        titlesSection.style.display = 'block';
        authorsSection.style.display = 'none';
        showTitlesBtn.classList.add('active');
        showAuthorsBtn.classList.remove('active');
    });

    // Animación suave para la barra de búsqueda
    const searchInput = document.querySelector('.search-input');
    searchInput.addEventListener('focus', function() {
        this.parentElement.classList.add('focused');
    });

    searchInput.addEventListener('blur', function() {
        this.parentElement.classList.remove('focused');
    });
});