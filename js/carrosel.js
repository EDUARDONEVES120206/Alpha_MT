let currentSlide = 0;
const slides = document.querySelectorAll('.carousel-slide');
const slideInterval = 5000; // Intervalo em milissegundos entre os slides (5 segundos no exemplo).

function showSlide(n) {
    if (n < 0) {
        currentSlide = slides.length - 1;
    } else if (n >= slides.length) {
        currentSlide = 0;
    }

    for (let i = 0; i < slides.length; i++) {
        slides[i].classList.remove('active', 'prev', 'next');
    }

    slides[currentSlide].classList.add('active');
    
    if (currentSlide > 0) {
        slides[currentSlide - 1].classList.add('prev');
    } else {
        slides[slides.length - 1].classList.add('prev');
    }
    
    if (currentSlide < slides.length - 1) {
        slides[currentSlide + 1].classList.add('next');
    } else {
        slides[0].classList.add('next');
    }
}

function prevSlide() {
    currentSlide--;
    showSlide(currentSlide);
}

function nextSlide() {
    currentSlide++;
    showSlide(currentSlide);
}

function autoRotate() {
    nextSlide();
    setTimeout(autoRotate, slideInterval);
}

showSlide(currentSlide);
autoRotate(); // Inicia a rotação automática no carregamento da página.
