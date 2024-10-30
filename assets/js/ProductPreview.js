// ProductPreview.js
import SceneManager from './SceneManager.js';

class ProductPreview {
    constructor(buttonId, templateId) {
        this.previewButton = document.getElementById(buttonId);
        this.templateId = templateId;
        this.previewScene = null;

        this.initPreview();
    }

    initPreview() {
        if (this.previewButton) {
            this.previewButton.addEventListener('click', () => {
                const currentIndex = parseInt(
                    document.querySelector('.carousel').getAttribute('data-current-index'),
                    10
                );
                const currentSlide = document.querySelectorAll('.carousel_slide')[currentIndex];

                const productData = {
                    id: currentSlide.getAttribute('data-id'),
                    name: currentSlide.getAttribute('data-name'),
                    price: currentSlide.getAttribute('data-price'),
                    model: currentSlide.getAttribute('data-model'),
                    color: currentSlide.getAttribute('data-color')
                };

                this.loadProductPreview(productData);
            });
        }
    }

    loadProductPreview(productData) {
        const clothingURL = `${window.location.origin}/assets/models/${productData.model}`;
        const descPopup = new Popup(this.templateId, "preview_product_description", "preview_product_close", "preview_product_close_btn", null);

        if (this.previewScene) {
            this.previewScene.scene.renderer.dispose();
            this.previewScene = null;
        }

        this.previewScene = new SceneManager('.model2', clothingURL, 'popup_preview');
        this.previewScene.initScene();
        this.previewScene.loadClothing(clothingURL, productData.type_product, productData.name, productData.color);

        descPopup.open();
    }
}

export default ProductPreview;
