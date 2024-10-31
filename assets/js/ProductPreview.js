// ProductPreview.js
import SceneManager from './SceneManager.js';

class ProductPreview {
    constructor(buttonId, templateId) {
        this.previewButton = document.getElementById(buttonId);
        this.templateId = templateId;
        this.previewScene = null;
        this.initPreview();
        this.currentIndex = 0;
    }

    initPreview() {
        if (this.previewButton) {

            this.previewButton.addEventListener('click', () => {
                this.currentIndex = parseInt(document.querySelector('.carousel').getAttribute('data-current-index'), 10);
                const currentSlide = document.querySelectorAll('.carousel_slide')[this.currentIndex];

                const productData = {
                    id: currentSlide.getAttribute('data-id'),
                    name:currentSlide.getAttribute('data-name'),
                    price: currentSlide.getAttribute('data-price'),
                    image: currentSlide.getAttribute('data-image'),
                    size: currentSlide.getAttribute('data-size'),
                    color: currentSlide.getAttribute('data-color'),
                    description: currentSlide.getAttribute('data-description'),
                    material: currentSlide.getAttribute('data-material'),
                    benefici: currentSlide.getAttribute('data-benefici'),
                    model: currentSlide.getAttribute('data-model'),
                    type_product:currentSlide.getAttribute('data-type')
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
        const manMannequin = `${window.location.origin}/assets/models/man_mannequin.gltf`;
        this.previewScene = new SceneManager('.model2', manMannequin, 'popup_preview');
        this.previewScene.initScene();
        this.previewScene.loadClothing(clothingURL, productData.type_product, productData.name, productData.color);
        this.showProductDesc(productData)
        descPopup.open();
    }
    
    // function set data in product preview template
    showProductDesc(data) {
        const nameElement = document.getElementById("name_product_preview");
        const priceElement = document.getElementById("price_product_price");
        const sizeName = document.getElementById("sizes_name");
        const colordesc = document.getElementById("id_coclor_desc");
        const imagedesc = document.getElementById("desc_image");
        const descProduct = document.getElementById("descproduct");
        const materialBg = document.querySelector('.material_bg');
        const nameMaterial = document.querySelector('.name_material');
        const beneficiContainer = document.getElementById('benefici');
        const btnAddToCart = document.getElementById("btn_add_to_cart_preview");
        const sizingRows = document.querySelectorAll('.size_table_row');
    
        sizeName.innerText = data.size;
        colordesc.style.background = data.color;
        descProduct.innerText = data.description;
        nameMaterial.innerText = data.material;
        imagedesc.src = data.image;
        materialBg.style.backgroundImage = `url(${window.location.origin + "/assets/images/home/cotton.webp"})`;
        beneficiContainer.innerHTML = `<li class="item"> <span class="icon"><img src="${window.location.origin}/assets/images/home/icon_favorites.svg" alt="${data.name}" /></span> <span class="text">${data.benefici}</span></li>`;
        nameElement.innerText = data.name;
        priceElement.innerText = parseFloat(data.price).toFixed(2);
    
        btnAddToCart.setAttribute('data-id', data.id);
        btnAddToCart.setAttribute('data-name', data.name);
        btnAddToCart.setAttribute('data-price', data.price);
        btnAddToCart.setAttribute('data-image', 'https://angrobit.com/uploads/'+data.img);
        btnAddToCart.setAttribute('data-size', data.size);
        btnAddToCart.setAttribute('data-color', data.color);
    
        sizingRows.forEach(row => row.classList.remove('selected'));
        sizingRows.forEach(row => {
            const sizeCell = row.querySelector('.size_table_cell');
            if (sizeCell && sizeCell.textContent.trim() === data.size) {
                row.classList.add('selected');
            }
        });
    
        this.addToViewed(data);

        // sizing chart toggle
        const btnToggleSizingChart = document.querySelector(".size_chart");
        const rightContentDesc = document.getElementById("right_content_desc");
        const sizingChartContainer = document.querySelector(".sizing_chart_container");
        const btnBackSizingChart = document.getElementById("back_sizing_chart");
    
        btnToggleSizingChart.addEventListener("click", () => {
            rightContentDesc.style.display = "none";
            sizingChartContainer.style.display = "flex";
        });
    
        btnBackSizingChart.addEventListener("click", () => {
            rightContentDesc.style.display = "flex";
            sizingChartContainer.style.display = "none";
        });
    }
    // function add to local storage history view
    addToViewed(data) {
        let products = localStorage.getItem('historyView');
        products = products ? JSON.parse(products) : [];
        const productExists = products.some(product => product.id === data.id);
        if (!productExists) {
            products.push(data);
            localStorage.setItem('historyView', JSON.stringify(products));
        }
    }
}
export default ProductPreview;
