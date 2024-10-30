import { AddressModel } from '../models/AddressModel.js';
import { AddressView } from '../views/AddressView.js';
import { Popup } from '../../js/classPopup.js';

export class AddressController {
    constructor() {
        this.addressModel = new AddressModel();
        const addressContainer = document.querySelector('.address_user_box');
        const addAddressBtn = document.querySelector('.add_address_button');
        this.addressView = new AddressView(addressContainer, addAddressBtn);
        this.addressPopup = new Popup(null, "popup_address", "popup_address_mask", "popup_address_close_btn", null);
        this.loadAddress();
        this.initializeEventListeners();
    }

    initializeEventListeners() {
        this.addressView.addAddressBtn.addEventListener("click", () => this.openAddressForm());
        this.addressView.form.addEventListener("submit", (event) => this.handleSubmit(event));
        document.querySelector(".btn_remove_address").addEventListener("click", () => this.removeAddress());
        document.querySelector(".btn_edit_address").addEventListener("click", () => this.editAddress());
    }

    loadAddress() {
        const address = this.addressModel.getAddress();
        if (address) {
            this.addressView.displayAddress(address);
            this.addressView.toggleAddressDisplay(true);
        } else {
            this.addressView.toggleAddressDisplay(false);
        }
    }

    openAddressForm(clearForm = true) {
        if (clearForm) this.addressView.clearForm();
        this.addressPopup.open();
    }

    editAddress() {
        const address = this.addressModel.getAddress();
        if (address) {
            this.addressView.fillForm(address);
            this.addressPopup.open();
        }
    }

    handleSubmit(event) {
        event.preventDefault();
        
        const addressData = this.collectFormData();
        const errorMessage = this.validateFormData(addressData);

        if (errorMessage) {
            console.log(errorMessage)
            return;
        }

        this.addressModel.saveAddress(addressData);
        this.loadAddress();
        console.log("Adress saved succesfully")
        this.addressPopup.close();
    }

    collectFormData() {
        return {
            firstname: this.addressView.form.elements['firstname'].value.trim(),
            lastname: this.addressView.form.elements['lastname'].value.trim(),
            tel: this.addressView.form.elements['tel'].value.trim(),
            country: this.addressView.form.elements['country'].value.trim(),
            city: this.addressView.form.elements['city'].value.trim(),
            street: this.addressView.form.elements['street'].value.trim(),
        };
    }

    validateFormData(data) {
        let errors = [];
        const namePattern = /^[\p{L}]{2,40}$/u;
        const phonePattern = /^[0-9\+\-\s]{8,15}$/;
        if (!namePattern.test(data.firstname)) errors.push('First Name must contain 2-40 letters with no numbers.');
        if (!namePattern.test(data.lastname)) errors.push('Last Name must contain 2-40 letters with no numbers.');
        if (!phonePattern.test(data.tel)) errors.push('Phone number must be 8-15 characters, numbers only.');
        if (data.country.length < 2 || data.country.length > 100) errors.push('Country must be between 2 and 100 characters.');
        if (data.city.length < 2 || data.city.length > 100) errors.push('City must be between 2 and 100 characters.');
        if (data.street.length < 5 || data.street.length > 100) errors.push('Street Address must be 5-100 characters.');

        return errors.join('\n');
    }

    removeAddress() {
        this.addressModel.removeAddress();
        this.loadAddress();
        console.log("Address delleted succesfull")
    }
}
