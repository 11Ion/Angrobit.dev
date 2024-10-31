export class Product{
    constructor(array) {
        this.array = array;
    }
    verifyarray(type){
        // Преобразуем JSON строку this.array в объект
        let arrayJson = JSON.parse(this.array);

        // Массив с конфигурациями
        let array = [
            {
                type: 'productloader',
                array: true,
                messages_error: 'The product was not found :(',
            },
            {
                type: 'filtreprodcut',
                array: false,
                messages_error: 'The product was not found :(',
            }
        ];

        // Перебираем элементы массива и ищем совпадение по ключу type
        for (let item of array) {
            if (item.type === type) {
                (!item.array) ? item.array = true :  item.array = false;
                this.rootTemplate();
                //this.themplate(arrayJson);
                break;
            }
        }
        // Сохраняем обновленный массив в this.globalsetting
        this.globalsetting = array;



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
        this.verifyarray('productloader')
    }

    filtreprodcut(){
        if(this.verifyarray()){
            themplate(data)
        }
    }
    cardthemplate(){

    }

    rootTemplate() {
        const productData = {
            id: 1,
            image: 'path/to/product-image.jpg',
            name: 'Product Name',
            color: 'white', // Example color; change as needed
            price: 29.99
        };

        const productsContainer = document.getElementById('productsContainer');

// Очищаем содержимое контейнера перед добавлением нового элемента
        productsContainer.innerHTML = '';

// Создаем и добавляем элемент продукта после очистки контейнера
        const productElement = this.createProductElement(productData);
        productsContainer.appendChild(productElement);

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
        const productImage = this.createElement('img', [], { src: productData.image, alt: productData.name });
        imageContainer.appendChild(productImage);
        productElement.appendChild(imageContainer);

        // Color selection container
        const colorContainer = this.createElement('div', ['product_colors']);
        const colorLabel = this.createElement('label');
        const colorInput = this.createElement('input', [], {
            type: 'radio',
            name: `color_product_${productData.id}`,  // Использование шаблонной строки
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
        const buyText = this.createElement('span', ['text'], { text: `$ ${productData.price}` }); // Шаблонная строка
        buyButton.appendChild(buyText);
        productElement.appendChild(buyButton);

        return productElement; // Return the created element
    }



}