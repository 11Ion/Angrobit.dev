//  Carousel3D.js
class Carousel3D {
    constructor(selector, scene, objects, container) {
        this.carousel = document.querySelector(selector);
        this.objects = document.querySelectorAll(objects);
        this.container = document.querySelector(container);
        this.angle = 0;
        this.isAnimating = false;
        this.currentIndex = 0;
        this.autoplayInterval = null;
        this.isDragging = false;
        this.startX = 0;
        this.isAutoplayActive = false;
        this.bestClothing = { merh1: [], merh2: [], merh3: [], merh4: [], merh5: [], merh6: [] };
        this.scene = scene;
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
        this.updateClothingVisibility(`merh${index + 1}`);
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

    get3DClothings(){
        const arraySlides = document.querySelectorAll(".carousel_slide");
        const clothings = Array.from(arraySlides).map(slide => {
            return {
               urlModelProduct: slide.getAttribute('data-model'),
               category: slide.getAttribute('data-type'),   
               name: slide.getAttribute('data-name'),           
               color: slide.getAttribute('data-color')       
            };
        });
        return clothings;
    }

    loadAllClothings() {
        const clothings = this.get3DClothings();
        clothings.forEach((clothing, index) => {
            const fullModelUrl = `${window.location.origin}/assets/models/${clothing.urlModelProduct}`;
            const clothingKey = `merh${index + 1}`;
            
            this.scene.putOnclothes(fullModelUrl, clothing.category, clothing.name, clothing.color, (model) => {
                model.traverse(child => child.visible = false); 
                
                this.bestClothing[clothingKey].push({
                    model,
                    name: clothing.name,
                    color: clothing.color,
                    modelProduct: clothing.urlModelProduct
                });
            });
        });
    }
    
    updateClothingVisibility(key) {
        if (!this.bestClothing[key]) return;

        Object.keys(this.bestClothing).forEach(k => {
            this.bestClothing[k].forEach(item => {
                item.model.traverse(child => {
                    if (child) child.visible = false;
                });
            });
        });

        const selectedClothing = this.bestClothing[key][0];
        if (selectedClothing) {
            selectedClothing.model.traverse(child => {
                if (child) child.visible = true;
            });
        }
    }

    initCarousel() {
        this.loadAllClothings()
        this.positionObjects();
        this.startAutoplay();
        setInterval(() => this.positionObjects(), 16);
        window.addEventListener('resize', () => this.positionObjects()); 
        this.updateCarousel(0)

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
