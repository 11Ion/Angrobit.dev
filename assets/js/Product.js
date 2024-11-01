import ProductPreview from "./ProductPreview.js";

export class Product{
    constructor(array, scene) {
        // this.array = array;
        this.array = JSON.parse(array);
        this.scene = scene;
        this.lastClickedProductId = null;
        this.globalsetting = [];
        this.initProductEvents();
    }

    initProductEvents() {
        document.addEventListener("click", (e) => {  
            const target = e.target.closest('.product');
            if (target && this.lastClickedProductId !== target.dataset.id) {
                this.lastClickedProductId = target.dataset.id;
                this.updatePreviewProduct(target.dataset);
            }
        });
        this.displayDesc("btn_details");
    }
    
    verifyArray(type){
        // Массив с конфигурациями
        const arrayConfig = [
            {
                type: 'productloader',
                array: false,
                messages_error: 'The product was not found :(',
                containerId : "productsContainer"
            },

            {
                type: 'filtreprodcut',
                array: false,
                messages_error: 'The product was not found :(',
                containerId : ""
            }
        ];

        // Перебираем элементы массива и ищем совпадение по ключу type
        for (let item of arrayConfig) {
            if (item.type === type) {
                (!item.array) ? item.array = true :  item.array = false;
                break;
            }
        }
        this.globalsetting = arrayConfig;
    }

    rootprodcut(element){
        switch (element){
            case "productloader":
                this.productloader();
                break;
            case "filtreprodcut":
                this.filtreprodcut();
                break;
        }
    }

    productloader(){
        this.verifyArray('productloader')
        this.rootTemplate(this.array);
    }

    filtreprodcut(){
        if(this.verifyArray()){
            // themplate(data)
        }
    }

    updatePreviewProduct(productData) {
        const previewPriceContainer = document.querySelector(".preview_product");
        previewPriceContainer.style.display = "flex";
        document.getElementById("price_preview").innerText = `$ ${productData.price}`;
    
        const setDataAttributes = (element, data) => {
            Object.entries(data).forEach(([key, value]) => element.setAttribute(`data-${key}`, value));
        };
    
        ['btn_details', 'add_to_cart_btn'].forEach(id => {
            const button = document.getElementById(id);
            if (button) setDataAttributes(button, productData);
        });
    
        this.updateMerch(productData.model, productData.type, productData.name, productData.color);
    }

    getActiveConfig(){
        return this.globalsetting.find(item => item.array === true);
    }

    // show product desc
    displayDesc(btnId){
       const preview = new ProductPreview(btnId, "desc-product-template");
    }
    
    // update merch scene3d
    updateMerch(url, type, name, color){
        this.scene.putOnclothes(`${window.location.origin}/assets/models/${url}`, type, name, color);
    }

    rootTemplate(products) {
        const activeConfig = this.getActiveConfig();
        const productsContainer = document.getElementById(activeConfig.containerId);
        productsContainer.innerHTML = '';

        if (products.length === 0) {
            productsContainer.insertAdjacentHTML('afterend', `<em class='empty_search_result'>${activeConfig.messages_error}</em>`);
            return;
        }   

        products.forEach(product => {
            const productElement = this.createProductElement(product); 
            productsContainer.appendChild(productElement);
        });
    }

    // Helper function to create an element with classes and attributes
    createElement(tag, classNames = [], attributes = {}) {
        const element = document.createElement(tag);
        if (classNames.length) element.classList.add(...classNames);
        for (const [key, value] of Object.entries(attributes)) {
            if (key === 'text') element.textContent = value;
            else if (key === 'html') element.innerHTML = value;
            else element.setAttribute(key, value);
        }
        return element;
    }

    createProductElement(productData) {
        // Main product container
        const productElement = this.createElement('article', ['product'],  { 'data-id': productData.id, 'data-name': productData.name, 'data-price': productData.price, 'data-image': 'https://angrobit.com/uploads/'+productData.img, 'data-size': productData.size,'data-color': productData.color,'data-description':productData.description,'data-material': productData.material,'data-benefici': productData.benefici,'data-model': productData.model,'data-type': productData.type });
        // Background span
        const bgSpan = this.createElement('span', ['bg']);
        productElement.appendChild(bgSpan);

        // Add to cart button with icon
        const addToCartBtn = this.createElement('button', ['botton_add_to_cart'], { 'data-id': productData.id });
        addToCartBtn.onclick = this.addtocard;
        const cartIcon = this.createElement('img', [], { src: '../../assets/images/home/icon_cart.svg', alt: 'icon cart' });
        addToCartBtn.appendChild(cartIcon);
        productElement.appendChild(addToCartBtn);

        // Product image container
        const imageContainer = this.createElement('div', ['image_product_container']);
        const productImage = this.createElement('img', [], { src: 'https://angrobit.com/uploads/'+ productData.img, alt: productData.name });
        imageContainer.appendChild(productImage);
        productElement.appendChild(imageContainer);

        // Color selection container
        const colorContainer = this.createElement('div', ['product_colors']);
        const colorLabel = this.createElement('label');
        const colorInput = this.createElement('input', [], {
            type: 'radio',
            name: `color_product_${productData.id}`,  
            value: productData.color,
            checked: productData.color === 'white' ? 'checked' : undefined
        });
        const colorSpan = this.createElement('span', ['color']);
        colorSpan.style.background = productData.color;
        colorLabel.appendChild(colorInput);
        colorLabel.appendChild(colorSpan);
        colorContainer.appendChild(colorLabel);
        productElement.appendChild(colorContainer);

        // Product name
        const productName = this.createElement('p', ['product_name'], { text: productData.name });
        productElement.appendChild(productName);

        // Buy button with price text
        const buyButton = this.createElement('button', ['button_buy'], { 'data-id': productData.id });
        const buyText = this.createElement('span', ['text'], { text: `$ ${productData.price}` });
        buyButton.appendChild(buyText);
        productElement.appendChild(buyButton);

        return productElement; 
    }

}