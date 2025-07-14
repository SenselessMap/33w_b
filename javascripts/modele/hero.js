export function initHeroCarousel() {
    const slides = document.querySelectorAll('.hero-slide');
    let current = 0;

    if (slides.length > 0) {
        slides[current].classList.add('active');

        setInterval(() => {
            slides[current].classList.remove('active');
            current = (current + 1) % slides.length;
            slides[current].classList.add('active');
        }, 5000);
    }
}
