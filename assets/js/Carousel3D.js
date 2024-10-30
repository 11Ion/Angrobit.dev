// Carousel3D.js
class Carousel3D {
    constructor(selector) {
        this.carousel = document.querySelector(selector);
        this.objects = document.querySelectorAll('.rotating_object');
        this.angle = 0;
        this.isAnimating = false;
        this.currentIndex = 0;
        this.autoplayInterval = null;
        this.isAutoplayActive = false;
        this.isDragging = false;
        this.startX = 0;

        this.initCarousel();
    }

    updateCarousel(index) {
        const totalSlides = document.querySelectorAll('.carousel_slide').length;
        if (index >= totalSlides) index = 0;
        else if (index < 0) index = totalSlides - 1;

        const offset = -index * 100;
        this.carousel.style.transform = `translateX(${offset}%)`;
        this.carousel.setAttribute('data-current-index', index);

        const currentSlide = document.querySelectorAll(".carousel_slide")[index];
        if (currentSlide) {
            const nameProductSlider = document.querySelector(".name_product");
            nameProductSlider.innerHTML = currentSlide.getAttribute('data-name');
        }
    }

    rotateToObject(index) {
        if (this.isAnimating) return;
        this.isAnimating = true;
        const targetAngle = -((index - 1.5) * (Math.PI / 3));
        const rotationSpeed = 0.1;

        const animateRotation = () => {
            const delta = targetAngle - this.angle;
            this.angle += delta * rotationSpeed;
            if (Math.abs(delta) < 0.001) {
                this.angle = targetAngle;
                this.updateCarousel(index);
                this.isAnimating = false;
            } else {
                requestAnimationFrame(animateRotation);
            }
        };
        requestAnimationFrame(animateRotation);
    }

    startAutoplay() {
        if (this.isAutoplayActive) return;
        this.isAutoplayActive = true;
        this.autoplayInterval = setInterval(() => {
            this.currentIndex = (this.currentIndex + 1) % this.objects.length;
            this.rotateToObject(this.currentIndex);
        }, 2000);
    }

    pauseAutoplay() {
        this.isAutoplayActive = false;
        clearInterval(this.autoplayInterval);
    }

    initCarousel() {
        this.objects.forEach((object, index) => {
            object.addEventListener('click', () => {
                this.rotateToObject(index);
                this.pauseAutoplay();
            });
        });

        if (this.carousel) {
            this.carousel.addEventListener('mouseenter', () => this.pauseAutoplay());
            this.carousel.addEventListener('mouseleave', () => this.startAutoplay());
        }

        this.startAutoplay();
    }
}

export default Carousel3D;
