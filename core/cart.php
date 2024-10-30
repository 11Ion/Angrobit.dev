<?php 
//  php code
// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);
// require_once '../../bdfunction.php';
?> 
<section class="cart" id="popup_cart">
   <div class="mask" id="mask_cart"></div>
   <div class="cart_content" role="dialog" aria-labelledby="cart" aria-modal="true">
      <span class="border border_t_left"></span>
      <span class="border border_t_right"></span>
      <span class="border border_b_left"></span>
      <span class="border border_b_right"></span>
      <button class="button_close_cart" id="close_cart"><img src="../../assets/images/home/icon_close.svg" alt="close"></button>
      <div class="cart_header">
         <h2 class="title">Check your cart</h2>
         <p class="subtitle"><span>0 items</span> in your cart</p>
      </div>
      <div class="cart_container">
         <div class="left_container">
            <div class="cart_product_container">
               <div class="cart_product_header">
                  <div class="left_box">
                     <p class="text">Description </p>
                     <p class="text">Price</p>
                     <p class="text">Quantity</p>
                     <p class="text">Total price</p>
                  </div>
               </div>
               <ul class="cart_products_items"><!-- product items --></ul>
            </div>
            <p class="empty">Your cart is empty.</p>
            <div class="address_container">
               <p class="text"> Billing address </p>
               <div class="address_items">
                  <!-- address exist -->
                  <div class="address_user_box">
                     <p class="title">Your address</p>
                     <ul class="address_user_items">
                        <li class="address_user_item">
                           <span class="text">Full Name:</span>
                           <span class="text" id="address_user_fullname"></span>
                        </li>
                        <li class="address_user_item">
                           <span class="text">Phone number:</span>
                           <span class="text" id="address_user_phone"></span>
                        </li>
                        <li class="address_user_item">
                           <span class="text">Country:</span>
                           <span class="text" id="address_user_country"></span>
                        </li>
                        <li class="address_user_item">
                           <span class="text">City:</span>
                           <span class="text" id="address_user_city"></span>
                        </li>
                        <li class="address_user_item">
                           <span class="text">Street address:</span>
                           <span class="text" id="address_user_street"></span>
                        </li>
                     </ul>
                     <!-- address none -->
                     <div class="buttons_container">
                        <button class="btn_edit_address">Edit</button>
                        <button class="btn_remove_address">Remove</button>
                     </div>
                  </div>
                  <button class="add_address_button">+Add to address </button>
               </div>
            </div>
         </div>
         <div class="right_container">
            <!-- promocode -->
            <form action="#" method="POST" class="form_promocode">
               <h3 class="title">Enter promo code</h3>
               <div class="form_container">
                  <input type="text" class="form_input" id="promocode_input" placeholder="Promo code">
                  <button type="submit" class="form_button">Submit</button>
               </div>
            </form>
            <ul class="cart_discount_items">
               <li class="cart_discount_item">
                  <span class="text">Item total</span>
                  <span class="text" id="item_total_value">$ 0</span>
               </li>
               <li class="cart_discount_item" id="discount_promo">
                  <span class="text">Discount</span>
                  <span class="text" id="discount_value"> $ 0</span>
               </li>
               <li class="cart_discount_item">
                  <span class="text">TAX</span>
                  <span class="text" id="tax_value">$ 0</span>
               </li>
            </ul>
            <div class="line"></div>
            <div class="cart_total_value">
               <span class="text">Estimated total</span>
               <span class="text" id="cart_total_value">$ 0</span>
            </div>
            <!-- checkout -->
            <div class="button_container_checkout">
               <button class="btn_checkout" id="payment_action" onclick="sendordertelegram();">checkout</button>
            </div>
         </div>
      </div>
   </div>
</section>

<!--  add/edit address popup -->
<div class="popup_address" id="popup_address">
   <div class="mask" id="popup_address_mask"></div>
   <div class="content">
      <button class="close_add_address" id="popup_address_close_btn"><img src="../../assets/images/home/close_icon_2.svg" alt="close"></button>
      <form action="#" class="form_add_address">
         <h3 class="title">Your address</h3>
         <div class="container_form">
            <div class="group_input">
               <label>First Name</label>
               <input type="text" name="firstname" placeholder="First Name" id="address_first_name" required>
            </div>
            <div class="group_input">
               <label>Last Name</label>
               <input type="text" name="lastname" placeholder="Last Name" id="address_last_name" required>
            </div>
            <div class="group_input">
               <label>Phone number</label>
               <input type="text" name="tel" placeholder="Phone number" id="address_phone_number" required>
            </div>
            <div class="group_input">
               <label>Country</label>
               <input type="text" name="country" placeholder="Country" id="address_country" required>
            </div>
            <div class="group_input">
               <label>City</label>
               <input type="text" name="city" placeholder="City" id="address_city" required>
            </div>
            <div class="group_input">
               <label>Street address</label>
               <input type="text" name="street" placeholder="Street address" id="address_street_address" required>
            </div>
         </div>
         <button class="button_save_address" id="button_save_address" type="submit">Save</button>
      </form>
   </div>
</div>

<!-- template items product cart -->
<template id="cart-product-template">
    <li class="cart_products_item">
        <span class="line"></span>
        <div class="item_container">
            <div class="left_item_container">
                <div class="left_item_image_container">
                    <img src="" alt="" class="product_image">
                </div>
                <div class="box_product_info">
                    <p class="box_product_info_name"></p>
                    <p class="box_product_info_size"><span class="text">Size:</span><span class="size_product"></span></p>
                    <p class="box_product_info_color"><span class="text">Color:</span><span class="color_product"></span></p>
                </div>
            </div>
            <div class="right_item_container">
                <p class="product_price"></p>
                <div class="product_qty">
                    <button class="decrement"><img src="../../assets/images/cart/decrement.svg" alt="decrement"></button>
                    <input type="text" class="value_qty" value="" disabled>
                    <button class="increment"><img src="../../assets/images/cart/increment.svg" alt="increment"></button>
                </div>
                <p class="product_total_price"></p>
                <button class="remove_item"><img src="../../assets/images/cart/trash.svg" alt="delete"></button>
            </div>
        </div>
    </li>
</template>

<!-- confirm notification -->
<div id="confirmation_notification" class="confirmation_notification">
    <div class="confirmation_notification_content">
        <p id="confirmation_notification_message"></p>
            <div class="notification_buttons">
                <button id="confirmation_notification_close" class="hidden">Cancel</button>
                <button id="confirmation_notification_ok">OK</button>
        </div>
    </div>
</div>

<!-- codul vechi -->
<!-- <script> 
    let notificationTimeout;
    // notification
    function showNotification(message, hasClose = false) {
        const notification = document.getElementById('notification');
        const notificationMessage = document.getElementById('notification_message');
        const closeButton = document.getElementById('notification_close');

        // Set message and visibility for close button
        notificationMessage.textContent = message;
        closeButton.classList.toggle('hidden', !hasClose);

        // Show notification
        notification.classList.add('active');

        // Close button functionality
        closeButton.addEventListener('click', hideNotification);
    
        // OK button functionality
        document.getElementById('notification_ok').addEventListener('click', hideNotification);

            // Clear previous timeout if it exists
            if (notificationTimeout) {
                clearTimeout(notificationTimeout);
            }

            // Auto-hide notification after 5 seconds
            notificationTimeout = setTimeout(hideNotification, 5000);
    }
    function hideNotification() {
        const notification = document.getElementById('notification');
        notification.classList.remove('active');
    }  
    function hideConfirmationNotification() {
         const notification = document.getElementById('confirmation_notification');
         notification.classList.remove('active');
    }  
    //  confirmation notification
    function showConfirmationNotification(message, hasClose = false) {
      const notification = document.getElementById('confirmation_notification');
      const notificationMessage = document.getElementById('confirmation_notification_message');
      const closeButton = document.getElementById('confirmation_notification_close');

      // Set message and visibility for close button
      notificationMessage.textContent = message;
      closeButton.classList.toggle('hidden', !hasClose);

      // Show notification
      notification.classList.add('active');

      // Close button functionality
      closeButton.addEventListener('click', hideConfirmationNotification);
   
      // OK button functionality
       document.getElementById('confirmation_notification_ok').addEventListener('click', hideConfirmationNotification);
   }

    function sendordertelegram(){
        const urlParams = new URLSearchParams(window.location.search);
        const param1 = urlParams.get('userid');
        // Preparing the form data
       var idproduct = document.getElementById('arrayprduct').textContent;
        var formData = 'type=telegramsend&id='+idproduct+'&user='+param1;

        // Create a new XMLHttpRequest object
        var xhr = new XMLHttpRequest();

        // Open a connection to the server
        xhr.open('POST', 'https://angrobit.com/api', true);

        // Set the request header for URL-encoded data
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

        // Handle the server's response
        xhr.onreadystatechange = function () {
            if (xhr.readyState == 4 && xhr.status == 200) {
                document.getElementById(`row-${id}`).remove();
            }
        };

        // Send the request with the form data
        xhr.send(formData);

    }

    function delorder(id){
            // Preparing the form data
            var formData = 'type=delelement&id=' + encodeURIComponent(id)+'&user=';

            // Create a new XMLHttpRequest object
            var xhr = new XMLHttpRequest();

            // Open a connection to the server
            xhr.open('POST', 'https://angrobit.com/api', true);

            // Set the request header for URL-encoded data
            xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

            // Handle the server's response
            xhr.onreadystatechange = function () {
                if (xhr.readyState == 4 && xhr.status == 200) {
                   document.getElementById(`row-${id}`).remove();
                }
            };

            // Send the request with the form data
            xhr.send(formData);
    }
    
    document.addEventListener("DOMContentLoaded", function() {
        const cartProductsContainer = document.querySelector('.cart_products_items'); // container items
        const subtitleSpan = document.querySelector('.subtitle span'); // nr items in cart
        const cartTotalValue = document.getElementById('cart_total_value'); // total value last
        const itemTotalValue = document.getElementById('item_total_value'); // total value
        const taxValue = document.getElementById('tax_value'); // tax
        const TAX = 2.05;

        // Обновление корзины при событии 'cartUpdated'
        document.addEventListener('cartUpdated', function() {
            renderCart();
        });

        // Функция для получения корзины из localStorage
        function getCart() {
            return JSON.parse(localStorage.getItem('cart')) || [];
        }


        // PROMO
        const promocodeForm = document.querySelector(".form_promocode");
        const PROMOCODE_TEMP = "test"; // Временный промокод для тестирования
        const DISCOUNT_PERCENTAGE = 10; // Процент скидки по промокоду

        // Обработка промокода при отправке формы
        promocodeForm.addEventListener("submit", function(event) {
            event.preventDefault(); // Предотвращение перезагрузки страницы

            const promocodeValue = document.getElementById("promocode_input").value;
            const discountValue = document.getElementById("discount_promo");
            const discountAmount = document.getElementById("discount_amount");

            // Проверка правильности промокода
            if (promocodeValue === PROMOCODE_TEMP) {
                showNotification("Promocode accepted!", false); // notification user
                localStorage.setItem('appliedPromocode', JSON.stringify({
                    code: promocodeValue,
                    discount: DISCOUNT_PERCENTAGE
                }));
                updateCartSummary(); // Обновление суммы корзины с учетом скидки

            } else {
                showNotification("Invalid promocode. Please try again.", false); // notification user
            }
        });

        // Обновление общей суммы корзины
        function updateCartSummary() {
            const cart = getCart();
            const totalItems = cart.length;

            // Подсчет общей стоимости товаров
            let totalPrice = cart.reduce((acc, product) => acc + product.price * product.quantity, 0);
            let discountAmount = 0;

            // Применение скидки, если промокод был сохранен
            const savedPromo = JSON.parse(localStorage.getItem('appliedPromocode'));
            if (savedPromo && savedPromo.discount) {
                discountAmount = totalPrice * (savedPromo.discount / 100); // Расчет суммы скидки
            }

            const discountedTotal = totalPrice - discountAmount; // Итоговая сумма со скидкой
            const estimatedTotal = discountedTotal + TAX; // Итоговая сумма с налогом

            // Обновление отображаемых значений в корзине
            subtitleSpan.textContent = `${totalItems} ${totalItems === 1 ? 'item' : 'items'}`; // total items
            cartTotalValue.textContent = `$ ${estimatedTotal.toFixed(2)}`; // final value
            itemTotalValue.textContent = `$ ${totalPrice.toFixed(2)}`; // total product items
            taxValue.textContent = `$ ${TAX.toFixed(2)}`; // tax
            document.getElementById('discount_value').textContent = `-$ ${discountAmount.toFixed(2)}`; // reducerea - 
        }

        // Функция для отображения продукта в корзине
        function renderProduct(product) {
            // Select template
            const template = document.getElementById('cart-product-template').content.cloneNode(true);
            // get selector product
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

            // set product data 
            productImage.src = product.image;
            productImage.alt = product.name;
            productName.textContent = product.name;
            productSize.textContent = product.size;
            productColor.style.backgroundColor = product.color;
            productPrice.textContent = `$ ${product.price}`;
            productQuantity.value = product.quantity;
            productTotalPrice.textContent = `$ ${(product.price * product.quantity).toFixed(2)}`;
            decrementButton.setAttribute('data-id', product.id);
            incrementButton.setAttribute('data-id', product.id);
            removeButton.setAttribute('data-id', product.id);
            // add product in append container
            cartProductsContainer.appendChild(template);
        }

        // Отображение всей корзины
        function renderCart() {
            const cart = getCart();
            cartProductsContainer.innerHTML = ''; // Очистка контейнера для продуктов
            const cartCount = document.getElementById("cardcount");
            if(cartCount){
                cartCount.innerText = cart.length; // Обновление количества товаров в корзине
            }
            if (cart.length > 0) {
                cart.forEach(renderProduct); // Отображение каждого товара
                document.getElementById('payment_action').style.display  = 'block';
                document.querySelector('.cart_discount_items').style.display = "flex";
                document.querySelector('.cart_total_value').style.display = "flex";
                document.querySelector('.empty').style.display  = 'none';
                document.querySelector('.cart_product_container').style.display  = 'block';

            } else {
                // Если корзина пуста, показываем сообщение об этом
                document.getElementById('payment_action').style.display  = 'none';
                document.querySelector('.empty').style.display  = 'flex';
                document.querySelector('.cart_product_container').style.display  = 'none';
                document.querySelector('.cart_discount_items').style.display = "none";
                document.querySelector('.cart_total_value').style.display = "none";
            }
            updateCartSummary(); // Обновление суммы корзины
        }

        // Обновление количества продукта
        function updateProductQuantity(productId, isIncrement) {
            const cart = getCart();
            const product = cart.find(p => p.id === productId); // Находим продукт по ID

            if (product) {
                // Увеличиваем или уменьшаем количество продукта
                product.quantity = isIncrement ? Math.min(99, product.quantity + 1) : Math.max(1, product.quantity - 1);
                localStorage.setItem('cart', JSON.stringify(cart)); // Сохраняем обновленную корзину
                renderCart(); // Перерисовываем корзину
            }
        }

        // Удаление продукта из корзины
        function removeProduct(productId) {
            const cart = getCart().filter(product => product.id !== productId); // Удаляем продукт из корзины
            localStorage.setItem('cart', JSON.stringify(cart)); // Сохраняем обновленную корзину
            renderCart(); // Перерисовываем корзину
        }

        // Обработка кликов для увеличения, уменьшения количества и удаления товаров
        document.addEventListener("click", (event) => {
            const target = event.target;
            const incrementButton = target.closest('.increment');
            const decrementButton = target.closest('.decrement');
            const removeButton = target.closest('.remove_item');

            if (incrementButton) {
                updateProductQuantity(incrementButton.getAttribute('data-id'), true);
            }

            if (decrementButton) {
                updateProductQuantity(decrementButton.getAttribute('data-id'), false);
            }

            if (removeButton) {
                removeProduct(removeButton.getAttribute('data-id'));
            }
        });

        renderCart();
    
        // TOGGLE для управления отображением окна адреса
        const addAddressBtn = document.querySelector(".add_address_button");
        const userAddressContainer = document.querySelector(".address_user_box");
        const addressPopup = new Popup(null, "popup_address", "popup_address_mask", "popup_address_close_btn", null);
        // Открытие формы для добавления нового адреса

        addAddressBtn.addEventListener("click", function() {
        addressPopup.open();
        document.getElementById('address_first_name').value = '';
        document.getElementById('address_last_name').value = '';
        document.getElementById('address_phone_number').value = '';
        document.getElementById('address_country').value = '';
        document.getElementById('address_city').value = '';
        document.getElementById('address_street_address').value = '';
     });
     
    // Форма для сохранения адреса
    const form_address = document.querySelector(".form_add_address");
    if (form_address) {
        form_address.addEventListener('submit', function(event) {
            event.preventDefault(); // Предотвращение отправки формы

            // Получение значений из полей формы
            const firstName = document.getElementById('address_first_name').value.trim();
            const lastName = document.getElementById('address_last_name').value.trim();
            const phoneNumber = document.getElementById('address_phone_number').value.trim();
            const country = document.getElementById('address_country').value.trim();
            const city = document.getElementById('address_city').value.trim();
            const streetAddress = document.getElementById('address_street_address').value.trim();

            // Сообщение об ошибке по умолчанию
            let errorMessage = '';

            // Валидация имени и фамилии
            const namePattern = /^[\p{L}]{2,40}$/u;
            if (!namePattern.test(firstName)) {
                errorMessage += 'First Name must contain between 2 and 40 letters and no numbers.\n';
            }
            if (!namePattern.test(lastName)) {
                errorMessage += 'Last Name must contain between 2 and 40 letters and no numbers.\n';
            }

            // Валидация номера телефона
            const phonePattern = /^[0-9\+\-\s]{8,15}$/;
            if (!phonePattern.test(phoneNumber)) {
                errorMessage += 'Phone number must be between 8 and 15 characters and contain only numbers, +, - or spaces.\n';
            }

            // Валидация страны и города
            if (country.length < 2 || country.length > 100) {
                errorMessage += 'Country must contain between 2 and 100 characters.\n';
            }
            if (city.length < 2 || city.length > 100) {
                errorMessage += 'City must contain between 2 and 100 characters.\n';
            }

            // Валидация адреса
            if (streetAddress.length < 5 || streetAddress.length > 100) {
                errorMessage += 'Street Address must contain between 5 and 100 characters.\n';
            }

            // Если есть ошибки, отображаем их и прекращаем выполнение
            if (errorMessage) {
                showNotification(errorMessage, true)
                return;
            }

            // Сохраняем введенный адрес
            const userAddress = {
                firstName: firstName,
                lastName: lastName,
                phoneNumber: phoneNumber,
                country: country,
                city: city,
                streetAddress: streetAddress
            };
            localStorage.setItem('userAddress', JSON.stringify(userAddress)); // Сохранение в localStorage
            addressPopup.close();

            showNotification("Address saved successfully!", false);
            document.getElementById('address_user_fullname').innerText = `${userAddress.firstName} ${userAddress.lastName}`;
            document.getElementById('address_user_phone').innerText = userAddress.phoneNumber;
            document.getElementById('address_user_country').innerText = userAddress.country;
            document.getElementById('address_user_city').innerText = userAddress.city;
            document.getElementById('address_user_street').innerText = userAddress.streetAddress;
            userAddressContainer.style.display = 'flex'; 
            addAddressBtn.style.display = 'none';
        });
    }

    // Удаление сохраненного адреса
    const btnRemoveAddress = document.querySelector('.btn_remove_address');
    if (btnRemoveAddress) {
        btnRemoveAddress.addEventListener('click', function() {

            /// need add new confirmation 
            showConfirmationNotification("Are you sure you want to remove the address?", true)
            const notificationClose = document.getElementById("confirmation_notification_close");
            const notificationOk = document.getElementById("confirmation_notification_ok");

            notificationClose.removeEventListener("click", hideNotification);
            notificationOk.removeEventListener("click", handleAddressRemoval);
            notificationClose.addEventListener("click", hideNotification);
            notificationOk.addEventListener("click", handleAddressRemoval);

            function handleAddressRemoval() {
                localStorage.removeItem('userAddress');
                showNotification("Address removed successfully.", false);
                const userAddressContainer = document.querySelector(".address_user_box");
                const addAddressBtn = document.querySelector('.add_address_button');
                
                if (userAddressContainer) {
                    userAddressContainer.style.display = 'none'; 
                }

                if (addAddressBtn) {
                    addAddressBtn.style.display = 'flex'; 
                }

                hideNotification();
            }

        });
    }
    // Редактирование сохраненного адреса
    const btnEditAddress = document.querySelector('.btn_edit_address');
    if (btnEditAddress) {
        btnEditAddress.addEventListener('click', function() {
            const userAddress = localStorage.getItem('userAddress');
            if (userAddress) {
                const parsedAddress = JSON.parse(userAddress);
                // Заполнение полей формы текущими значениями адреса
                document.getElementById('address_first_name').value = parsedAddress.firstName;
                document.getElementById('address_last_name').value = parsedAddress.lastName;
                document.getElementById('address_phone_number').value = parsedAddress.phoneNumber;
                document.getElementById('address_country').value = parsedAddress.country;
                document.getElementById('address_city').value = parsedAddress.city;
                document.getElementById('address_street_address').value = parsedAddress.streetAddress;

                addressPopup.open();
            }
        });
    }
    // Проверка, есть ли адрес в localStorage и отображение его
    const userAddress = localStorage.getItem('userAddress');
    if (userAddress) {
        const parsedAddress = JSON.parse(userAddress);
        if (parsedAddress.firstName && parsedAddress.lastName && parsedAddress.phoneNumber && parsedAddress.country && parsedAddress.city && parsedAddress.streetAddress) {
            userAddressContainer.style.display = 'flex'
            addAddressBtn.style.display = 'none';
            document.getElementById('address_user_fullname').innerText = `${parsedAddress.firstName} ${parsedAddress.lastName}`;
            document.getElementById('address_user_phone').innerText = parsedAddress.phoneNumber;
            document.getElementById('address_user_country').innerText = parsedAddress.country;
            document.getElementById('address_user_city').innerText = parsedAddress.city;
            document.getElementById('address_user_street').innerText = parsedAddress.streetAddress;
        }
    } else {
        userAddressContainer.style.display = 'none'; 
        addAddressBtn.style.display = 'flex'; 
    }
});
</script> -->
<script type="module">
    import { CartController } from '../../assets/corejs/controllers/CartController.js';
    import { AddressController } from '../../assets/corejs/controllers/AddressController.js';
    // import { PromocodeController } from '../../assets/corejs/controllers/PromocodeController.js';
    
    const cartController = new CartController();
    const addressController = new AddressController();
    cartController.loadCart();

</script>
