export class AddressView {
    constructor(addressContainer, addAddressBtn) {
        this.addressContainer = addressContainer;
        this.addAddressBtn = addAddressBtn;
        this.form = document.querySelector('.form_add_address');
    }

    displayAddress(address) {
        document.getElementById('address_user_fullname').innerText = `${address.firstname} ${address.lastname}`;
        document.getElementById('address_user_phone').innerText = address.tel;
        document.getElementById('address_user_country').innerText = address.country;
        document.getElementById('address_user_city').innerText = address.city;
        document.getElementById('address_user_street').innerText = address.street;
    }

    toggleAddressDisplay(isVisible) {
        this.addressContainer.style.display = isVisible ? 'flex' : 'none';
        this.addAddressBtn.style.display = isVisible ? 'none' : 'flex';
    }

    fillForm(address) {
        Object.keys(address).forEach(key => {
            if (this.form.elements[key]) {
                this.form.elements[key].value = address[key] || '';
            }
        });
    }

    clearForm() {
        this.fillForm({
            firstname: '',
            lastname: '',
            tel: '',
            country: '',
            city: '',
            street: ''
        });
    }
}
