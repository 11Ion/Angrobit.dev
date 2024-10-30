export class CartView {
    constructor() {
        this.cartContainer = document.querySelector('.cart_products_items');
        this.finalValue = document.getElementById('cart_total_value');
        this.nrItemsInCart = document.querySelector('.subtitle span');
        this.tax = document.getElementById('tax_value');
        this.itemsValue = document.getElementById('item_total_value');
        this.discount = document.getElementById('discount_value');
        this.countCart = document.getElementById("cardcount");
        this.taxValue = 2.05; 
    }

    displayCart(cart) {
        this.cartContainer.innerHTML = '';
        cart.forEach(product => {
            const productElement = this.createProductElement(product);
            this.cartContainer.appendChild(productElement);
        });
        this.updateCartSummary(cart);
        this.showEmptyMessage(cart.length === 0);
        this.countCart.innerText = cart.length;
    }

    createProductElement(product) {
        const template = document.getElementById('cart-product-template').content.cloneNode(true);
        const productItem = template.querySelector('.cart_products_item');
        const productImage = productItem.querySelector('.product_image');
        const productName = productItem.querySelector('.box_product_info_name');
        const productSize = productItem.querySelector('.size_product');
        const productColor = productItem.querySelector('.color_product');
        const productPrice = productItem.querySelector('.product_price');
        const productQuantity = productItem.querySelector('.value_qty');
        const productTotalPrice = productItem.querySelector('.product_total_price');
        const decrementButton = productItem.querySelector('.decrement');
        const incrementButton = productItem.querySelector('.increment');
        const removeButton = productItem.querySelector('.remove_item');

        productImage.src = product.image;
        productImage.alt = product.name;
        productName.textContent = product.name;
        productSize.textContent = product.size;
        productColor.style.backgroundColor = product.color;
        productPrice.textContent = `$ ${(Number(product.price)).toFixed(2)}`;
        productQuantity.value = product.quantity;
        productTotalPrice.textContent = `$ ${(product.price * product.quantity).toFixed(2)}`;
        decrementButton.setAttribute('data-id', product.id);
        incrementButton.setAttribute('data-id', product.id);
        removeButton.setAttribute('data-id', product.id);
        return template;
    }

    updateCartSummary(cart) {
        const totalItems = cart.length;
        let totalPrice = cart.reduce((acc, product) => acc + product.price * product.quantity, 0);

        const savedPromo = JSON.parse(localStorage.getItem('appliedPromocode'));
        const discountAmount = savedPromo ? totalPrice * (savedPromo.discount / 100) : 0;

        const discountedTotal = totalPrice - discountAmount;
        const estimatedTotal = discountedTotal + this.taxValue;

        this.nrItemsInCart.textContent = `${totalItems} ${totalItems === 1 ? 'item' : 'items'}`;
        
        this.finalValue.textContent = `$ ${estimatedTotal.toFixed(2)}`;
        this.itemsValue.textContent = `$ ${totalPrice.toFixed(2)}`;
        this.tax.textContent = `$ ${this.taxValue.toFixed(2)}`;
        this.discount.textContent = `-$ ${discountAmount.toFixed(2)}`;
    }

    showEmptyMessage(isEmpty) {
        document.querySelector('.empty').style.display = isEmpty ? 'flex' : 'none';
        document.querySelector('.cart_product_container').style.display = isEmpty ? 'none' : 'block';
    }
}
