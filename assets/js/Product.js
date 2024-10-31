export class Product{
    constructor(array) {
        this.array = array;
    }
    
    verifyArray(type){
        let arrayJson = JSON.parse(this.array);
        // Массив с конфигурациями
        const array = [
            {
                type: 'productloader',
                array: true,
                messages_error: 'The product was not found :(',
                containerId : ""
            },
            {
                type: 'filtreprodcut',
                array: false,
                messages_error: 'The product was not found :(',
                containerId : ""
            }
        ];

        // Перебираем элементы массива и ищем совпадение по ключу type
        for (let item of array) {
            if (item.type === type) {
                (!item.array) ? item.array = true :  item.array = false;
                this.rootTemplate(arrayJson);
                break;
            }
        }

        // Сохраняем обновленный массив в this.globalsetting
        this.globalsetting = array;

        // console.log(this.globalsetting)
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
    }

    filtreprodcut(){
        if(this.verifyArray()){
            // themplate(data)
        }
    }

    cardthemplate(){
    }

    rootTemplate(arrayJson) {
        const productsContainer = document.getElementById('productsContainer');
        productsContainer.innerHTML = '';

        arrayJson.forEach(product => {
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
        const productElement = this.createElement('article', ['product']);

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
    
    updatePreviewProduct(productData) {
        const previewPriceContainer = document.querySelector(".preview_product");
        previewPriceContainer.style.display = "flex";

        // current price
        document.getElementById("price_preview").innerText = `$ ${array.price}`;

        // set data atributes btn details
        const btnDetails = document.getElementById("btn_details");
        btnDetails.setAttribute('data-id', productData.id);
        btnDetails.setAttribute('data-name', productData.name);
        btnDetails.setAttribute('data-price', productData.price);
        btnDetails.setAttribute('data-image', productData.img);
        btnDetails.setAttribute('data-size', productData.size);
        btnDetails.setAttribute('data-color', productData.color);

        // set data atributes btn add to cart
        const btnAddCart = document.querySelector(".button.add_to_cart");
        btnAddCart.setAttribute('data-id', productData.id);
        btnAddCart.setAttribute('data-name', productData.name);
        btnAddCart.setAttribute('data-price', productData.price);
        btnAddCart.setAttribute('data-image', productData.img);
        btnAddCart.setAttribute('data-size', productData.size);
        btnAddCart.setAttribute('data-color', productData.color);
    }
}