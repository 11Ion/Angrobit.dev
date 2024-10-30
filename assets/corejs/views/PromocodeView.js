export class PromocodeView {
    constructor() {
        this.discountValueElement = document.getElementById('discount_value');
    }

    showDiscount(discount) {
        this.discountValueElement.textContent = `-$ ${discount.toFixed(2)}`;
    }
}
