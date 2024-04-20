const displayedImg = document.querySelector('.displayed-img');
const overlay = document.querySelector('.overlay');
const darkButton = document.querySelector('.dark');
const thumbBar = document.querySelector('.thumb-bar');
const thumbs = document.querySelectorAll('.thumb');

thumbs.forEach((thumb) => {
    thumb.addEventListener('click', () => {
        displayedImg.src = thumb.src;
        displayedImg.alt = thumb.alt;
    });
});

darkButton.addEventListener('click', () => {
    if (overlay.style.backgroundColor === 'rgba(0, 0, 0, 0)') {
        overlay.style.backgroundColor = 'rgba(0, 0, 0, 0.5)';
        darkButton.textContent = 'Lighten';
    } else {
        overlay.style.backgroundColor = 'rgba(0, 0, 0, 0)';
        darkButton.textContent = 'Darken';
    }
});

