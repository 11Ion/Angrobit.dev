import { CartModel } from '../models/CartModel.js';
import { CartView } from '../views/CartView.js';

export class CartController {
    constructor() {
        this.cartModel = new CartModel(); 
        this.cartView = new CartView();    
        document.addEventListener('cartUpdated', () => this.loadCart());

        document.addEventListener("click", (event) => {
            const target = event.target;
            const dataId = target.closest('[data-id]')?.getAttribute('data-id');
            if (!dataId) return;
            if (target.closest('.increment')) {
                this.updateProductQuantity(dataId, true);
            } else if (target.closest('.decrement')) {
                this.updateProductQuantity(dataId, false);
            } else if (target.closest('.remove_item')) {
                this.removeProductFromCart(dataId);
            }
        });
    }

    loadCart() {
        const cart = this.cartModel.getCart(); 
        this.cartView.displayCart(cart);       
    }

    addProductToCart(product) {
        this.cartModel.addProduct(product);
        this.loadCart();                    
    }

    updateProductQuantity(productId, isIncrement) {
        this.cartModel.updateQuantity(productId, isIncrement);  
        this.loadCart();                                        
    }

    removeProductFromCart(productId) {
        this.cartModel.removeProduct(productId); 
        this.loadCart();                          
    }

    

    
}
