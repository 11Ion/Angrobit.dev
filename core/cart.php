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


<script type="module">
    import { CartController } from '../../assets/corejs/controllers/CartController.js';
    import { AddressController } from '../../assets/corejs/controllers/AddressController.js';
    // import { PromocodeController } from '../../assets/corejs/controllers/PromocodeController.js';
    
    const cartController = new CartController();
    const addressController = new AddressController();
    cartController.loadCart();

</script>
