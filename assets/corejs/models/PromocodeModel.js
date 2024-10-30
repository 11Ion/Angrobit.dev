export class PromocodeModel {
    constructor() {
        this.appliedPromo = JSON.parse(localStorage.getItem('appliedPromocode')) || null;
        this.discountPercetage = 10; 
    }

}
