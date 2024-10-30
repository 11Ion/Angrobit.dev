export class CartModel {
    constructor() {
        this.cart = JSON.parse(localStorage.getItem('cart')) || [];  
    }

    getCart() {
        return this.cart; 
    }

    updateQuantity(productId, increment = true) {
        const product = this.cart.find(p => p.id === productId);
        if (product) {
            product.quantity = increment ? Math.min(99, product.quantity + 1) : Math.max(1, product.quantity - 1);  
            this.saveCart(); 
        }
    }

    removeProduct(productId) {
        this.cart = this.cart.filter(p => p.id !== productId);
        this.saveCart();  
        this.triggerCartUpdated()
    }

    saveCart() {
        localStorage.setItem('cart', JSON.stringify(this.cart));
    }

    addProduct(product) {
        this.cart.push(product); 
        this.saveCart();
        this.triggerCartUpdated()
    }

    triggerCartUpdated() {
        const event = new Event('cartUpdated');
        document.dispatchEvent(event);
    }
}
