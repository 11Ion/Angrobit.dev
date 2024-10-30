export class AddressModel {
    constructor() {
        this.address = JSON.parse(localStorage.getItem('userAddress')) || null;
    }

    getAddress() {
        return this.address;
    }

    saveAddress(address) {  
        this.address = address;
        localStorage.setItem('userAddress', JSON.stringify(address));
    }

    removeAddress() {
        this.address = null;
        localStorage.removeItem('userAddress');
    }
}
