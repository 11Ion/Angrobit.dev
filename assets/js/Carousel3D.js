class Carousel3D {
    constructor(selector) {
        this.carousel = document.querySelector(selector);
        this.objects = document.querySelectorAll('.rotating_object');
        this.container = document.querySelector('.scene_3d');
        this.angle = 0;
        this.isAnimating = false;
        this.currentIndex = 0;
        this.autoplayInterval = null;
        this.isDragging = false;
        this.startX = 0;
        this.isAutoplayActive = false;
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
            document.querySelector(".name_product").innerHTML = currentSlide.getAttribute('data-name');
        }
    }

    rotateToObject(objectIndex) {
        if (this.isAnimating) return;
        this.isAnimating = true;
        const targetAngle = -((objectIndex - 1.5) * (Math.PI / 3));
        const rotationSpeed = 0.1;

        const animateRotation = () => {
            const delta = targetAngle - this.angle;
            this.angle += delta * rotationSpeed;
            if (Math.abs(delta) < 0.001) {
                this.angle = targetAngle;
                this.updateCarousel(objectIndex);
                this.isAnimating = false;
            } else {
                requestAnimationFrame(animateRotation);
            }
        };
        requestAnimationFrame(animateRotation);
    }

    positionObjects() {
        let xMultiplier, yMultiplier, zMultiplier, unit;

        if (window.innerWidth < 600 && window.innerHeight < 1000) {
            xMultiplier = 120;
            yMultiplier = 50;
            zMultiplier = 40;
            unit = 'px';
            if (this.container) this.container.style.perspective = "200px";
        } else {
            xMultiplier = 18;
            yMultiplier = 5;
            zMultiplier = 120;
            unit = 'vmin';
            if (this.container) this.container.style.perspective = "300vmax";
        }

        this.objects.forEach((object, index) => {
            const offsetAngle = this.angle + (index * (Math.PI / 3));
            const x = Math.cos(offsetAngle) * xMultiplier;
            const y = Math.sin(offsetAngle) * yMultiplier;
            const z = Math.sin(offsetAngle) * zMultiplier;

            object.style.transform = `
                translateX(${x}${unit}) 
                translateY(${y}${unit}) 
                translateZ(${z}${unit})`;

            object.style.zIndex = Math.round(z + 10);
        });
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

    onDragStart(event) {
        this.isDragging = true;
        this.startX = event.type === 'mousedown' ? event.pageX : event.touches[0].pageX;
        this.pauseAutoplay();
    }

    onDragMove(event) {
        if (!this.isDragging) return;
        const currentX = event.type === 'mousemove' ? event.pageX : event.touches[0].pageX;
        const diffX = currentX - this.startX;
        if (Math.abs(diffX) > 20) {
            if (diffX > 0) {
                this.currentIndex = (this.currentIndex - 1 + this.objects.length) % this.objects.length;
            } else {
                this.currentIndex = (this.currentIndex + 1) % this.objects.length;
            }
            this.rotateToObject(this.currentIndex);
            this.startX = currentX;
        }
    }

    onDragEnd() {
        this.isDragging = false;
        this.startAutoplay();
    }

    initCarousel() {
        this.positionObjects();
        this.startAutoplay();
        setInterval(() => this.positionObjects(), 16);
        window.addEventListener('resize', () => this.positionObjects()); 

        this.objects.forEach((object, index) => {
            object.addEventListener('click', () => {
                this.rotateToObject(index);
                this.pauseAutoplay();
            });
            object.addEventListener('mouseenter', () => this.pauseAutoplay());
            object.addEventListener('mouseleave', () => this.startAutoplay());
        });

        if (this.container) {
            this.container.addEventListener('mousedown', (e) => this.onDragStart(e));
            this.container.addEventListener('mousemove', (e) => this.onDragMove(e));
            this.container.addEventListener('mouseup', () => this.onDragEnd());
            this.container.addEventListener('mouseleave', () => this.onDragEnd());
            this.container.addEventListener('touchstart', (e) => this.onDragStart(e));
            this.container.addEventListener('touchmove', (e) => this.onDragMove(e));
            this.container.addEventListener('touchend', () => this.onDragEnd());
        }

        if (this.carousel) {
            this.carousel.addEventListener('mouseenter', () => this.pauseAutoplay());
            this.carousel.addEventListener('mouseleave', () => this.startAutoplay());
        }
    }
}

export default Carousel3D;
