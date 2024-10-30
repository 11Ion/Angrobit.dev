<?php
   ini_set('display_errors', 1);
   ini_set('display_startup_errors', 1);
   error_reporting(E_ALL);
   require_once 'bdfunction.php';
?>
<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <link rel="preconnect" href="https://fonts.googleapis.com">
      <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
      <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Saira:ital,wght@0,100..900;1,100..900&family=Work+Sans:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
      <link rel="stylesheet" href="./assets/css/global.css">
      <link rel="stylesheet" href="./assets/css/main.css">
      <link rel="stylesheet" href="./assets/css/reset.css">
      <link rel="stylesheet" href="./assets/css/responsive.css">
      <title>AngroBit Shop</title>
   </head>
   <body class="body" id="home">
      <!-- HEADER -->
      <header class="header" id="menu">
         <span class="border border_t_left"></span>
         <span class="border border_t_right"></span>
         <span class="border border_b_left"></span>
         <span class="border border_b_right"></span>
         <nav class="nav">
            <div class="logo"> <a href="/"> <img src="./assets/images/home/logo.svg" alt="AngroBit Logo"> </a></div>
            <button class="nav_search" id="button_nav_search">
               <span class="icon"><img src="./assets/images/home/icon_search.svg" alt="Seach_Icon"></span>
               <span class="nav_title"> Search </span>
            </button>
            <div class="nav_line"></div>
            <ul class="nav_items">
               <li class="nav_item activated">
                  <a href="/">
                     <span class="icon">
                        <img src="./assets/images/home/icon_home.svg" alt="Home" class="normal">
                        <img src="./assets/images/home/icon_home_active.svg" alt="Home active" class="active">
                     </span>
                     <span class="nav_title">Home</span>
                  </a>
               </li>
               <li class="nav_item">
                  <a href="./pages/catalog/catalog.php">
                     <span class="icon">
                        <img src="./assets/images/home/icon_catalog.svg" alt="Catalog" class="normal">
                        <img src="./assets/images/home/icon_catalog_active.svg" alt="Catalog active" class="active">
                     </span>
                     <span class="nav_title">Catalog</span>
                  </a>
               </li>
               <li class="nav_item">
                  <a href="./pages/collection/collection.php">
                     <span class="icon">
                        <img src="./assets/images/home/icon_collection.svg" alt="Collection" class="normal">
                        <img src="./assets/images/home/icon_collection_active.svg" alt="Collection active" class="active">
                     </span>
                     <span class="nav_title">Collection</span>
                  </a>
               </li>
            </ul>
            <div class="nav_line"></div>
            <div class="game">
               <a href="./pages/page405/page405.html">
                  <span class="icon_game"><img src="./assets/images/home/icon_game.svg" alt="icon game"></span>
                  <span class="nav_title">Coming soon</span>
               </a>
            </div>
         </nav>
      </header>

      <!-- POPUP SEARCH NAV -->
      <div class="popup_search_nav" id="popup_search_nav">
         <span class="border border_t_left"></span>
         <span class="border border_t_right"></span>
         <span class="border border_b_left"></span>
         <span class="border border_b_right"></span>
         <button class="button_close" id="btn_popup_nav_search_close"> <img src="./assets/images/home/icon_close.svg" draggable="false" alt="close icon"> </button>
         <div class="logo">
            <img src="./assets/images/home/logo_2.svg" alt="Logo AngroBit">
         </div>
         <form action="#" class="search_nav_form" >
            <span class="icon"> <img src="./assets/images/home/icon_search.svg" draggable="false" alt="search icon"> </span>
            <input type="search" placeholder="Search" id="search_nav_term">
            <span class="hidden_icon"><img src="./assets/images/home/icon_close.svg" draggable="false" alt="close icon"></span>
         </form>
         <div class="last_viewed_container" id="last_viewed_search_nav">
            <p class="title">Last viewed</p>
            <ul class="items" id="last_viewed_search_items_nav"><!-- last viewed items --></ul>
            <div class="line"></div>
         </div>
         <div class="recommended_container">
            <p class="title">Recommended</p>
            <ul class="items">
               <li class="item">
                  <a href="/pages/catalog/catalog.php?category=sale">
                     <span class="icon"><img src="./assets/images/home/icon_sale.svg" alt="Icon sale"></span>
                     <span class="text">Sale</span>
                  </a>
               </li>
               <li class="item">
                  <a href="/pages/catalog/catalog.php?category=populare">
                     <span class="icon"><img src="./assets/images/home/icon_populare.svg" alt="Icon populare"></span>
                     <span class="text">Populare</span>
                  </a>
               </li>
               <li class="item">
                  <a href="/pages/catalog/catalog.php?category=exclusive">
                     <span class="icon"><img src="./assets/images/home/icon_exclusive.svg" alt="Icon exclusive"></span>
                     <span class="text">Exclusive</span>
                  </a>
               </li>
               <li class="item">
                  <a href="/pages/catalog/catalog.php?category=t-shirt">
                     <span class="icon"><img src="./assets/images/home/icon_t_shirt.svg" alt="Icon T-shirt"></span>
                     <span class="text">T-shirts</span>
                  </a>
               </li>
               <li class="item">
                  <a href="/pages/catalog/catalog.php?category=caps">
                     <span class="icon"><img src="./assets/images/home/icon_caps.svg" alt="Icon Caps"></span>
                     <span class="text">Caps</span>
                  </a>
               </li>
               <li class="item">
                  <a href="/pages/catalog/catalog.php?category=hoddie">
                     <span class="icon"><img src="./assets/images/home/icon_hoddie.svg" alt="Icon hoddie"></span>
                     <span class="text">Hoddie</span>
                  </a>
               </li>
            </ul>
         </div>
         <div class="search_container">
            <p class="title">Search</p>
            <ul class="items" id="search_items_container"><!-- search items --></ul>
         </div>
      </div>

      <main class="main">
         <section class="scene">
            <div class="top_platform">
               <img src="./assets/images/home/platform_top.png" alt="platform">
            </div>
            <div class="bottom_platform">
               <img src="./assets/images/home/platform_bottom.png" alt="platform">
            </div>
            <!-- 3D SCENE -->
            <div class="scene_3d">
            <canvas class="model"></canvas>
            <!-- template circles carousell -->
            <template id="circles-template">
               <div class="rotating_object" data-index="" data-color="" data-model="" data-type="" data-name="">
                  <img class="circle_image" src="./assets/images/home/circle.png" alt="circle" draggable="false">
                  <img class="circle_image_product" src="" alt="" draggable="false">
               </div>
            </template>
            <script>
               const apiUrl = 'https://angrobit.com/api';
               // api response top products test
               const apiResponse = {
                   products: [
                       {
                           name: "T-shirt",
                           price: 191,
                           size: "S",
                           color: "white",
                           description: "Descroptiodsand dadaskd jadj ajds",
                           material: "COTTON",
                           benefici: "dsad asdadk aosd aosdjaidja",
                           type: "upper",
                           imageUrl: "./assets/images/home/shirt1.png",
                           model: "t_shirt.gltf",
                       },
                       {
                           name: "Hoody",
                           price: 192,
                           size: "S",
                           color: "black",
                           description: "Descroptiodsand dadaskd jadj ajds",
                           material: "COTTON",
                           benefici: "dsad asdadk aosd aosdjaidja",
                           type: "upper",
                           imageUrl: "./assets/images/home/shirt2.png",
                           model: "hoody.gltf",
                       },
                       {
                           name: "T-shirt",
                           price: 193,
                           size: "S",
                           color: "yellow",
                           description: "Descroptiodsand dadaskd jadj ajds",
                           material: "COTTON",
                           benefici: "dsad asdadk aosd aosdjaidja",
                           type: "upper",
                           imageUrl: "./assets/images/home/shirt3.png",
                           model: "t_shirt.gltf",
                       },
                       {
                           name: "Hoody",
                           price: 194,
                           size: "S",
                           color: "green",
                           description: "Descroptiodsand dadaskd jadj ajds",
                           material: "COTTON",
                           benefici: "dsad asdadk aosd aosdjaidja",
                           type: "upper",
                           imageUrl: "./assets/images/home/shirt4.png",
                           model: "hoody.gltf",
                       },
                       {
                           name: "T-shirt",
                           price: 195,
                           size: "S",
                           color: "purple",
                           description: "Descroptiodsand dadaskd jadj ajds",
                           material: "COTTON",
                           benefici: "dsad asdadk aosd aosdjaidja",
                           type: "upper",
                           imageUrl: "./assets/images/home/shirt5.png",
                           model: "t_shirt.gltf",
                       },
                       {
                           name: "Hoody",
                           price: 196,
                           size: "S",
                           color: "burlywood",
                           description: "Descroptiodsand dadaskd jadj ajds",
                           material: "COTTON",
                           benefici: "dsad asdadk aosd aosdjaidja",
                           type: "upper",
                           imageUrl: "./assets/images/home/shirt6.png",
                           model: "hoody.gltf",
                       }
                   ]
               };
               function createProductElements(products) {
                  const container = document.querySelector('.scene_3d');
                  const template = document.getElementById('circles-template');
                  products.forEach((product, index) => {
                     const productClone = template.content.cloneNode(true); 
                     const productElement = productClone.querySelector('.rotating_object');
                     productElement.setAttribute('data-index', index);
                     productElement.setAttribute('data-color', product.color);
                     productElement.setAttribute('data-model', product.model);
                     productElement.setAttribute('data-type', product.type);
                     productElement.setAttribute('data-name', product.name);
                     const productImage = productClone.querySelector('.circle_image_product');
                     productImage.src = product.imageUrl;
                     productImage.alt = product.name;
                     container.appendChild(productClone); 
                  });
               }
               function loadCircles() {
                  // fetch(apiUrl)
                  //   .then(response => response.json())
                  //   .then(data => createProductElements(data.products))
                  //   .catch(error => console.error('Error loading products:', error));

                  createProductElements(apiResponse.products);
               }
               document.addEventListener('DOMContentLoaded', loadCircles);
            </script>
         </section>
      </main>
      <!-- SLIDER -->
      <div class="preview_slider_box">
         <div class="preview_slider">
            <div class="container">
               <span class="border border_t_left"></span>
               <span class="border border_t_right"></span>
               <span class="border border_b_left"></span>
               <span class="border border_b_right"></span>
               <p class="name_product">
                  T-shirt
               </p>
               <div class="preview_line"></div>
               <div class="container_carousel">
                  <div class="carousel">
                     <!-- SLIDER ITEMS -->
                     <template id="carousel-slide-template">
                        <div class="carousel_slide" data-id="" data-image="" data-name="" data-price="" data-size="" data-color="" data-description="" data-material="" data-benefici="" data-type="" data-model="">
                           <img src="" alt="" draggable="false">
                        </div>
                     </template>
                     <script>
                        function createCarouselSlides(products) {
                           const carouselContainer = document.querySelector('.carousel');
                           const template = document.getElementById('carousel-slide-template');

                           products.forEach((product, index) => {
                              const slideClone = template.content.cloneNode(true);  
                              const slideDiv = slideClone.querySelector('.carousel_slide');
                              slideDiv.setAttribute('data-id', index + 1);
                              slideDiv.setAttribute('data-image', product.imageUrl);
                              slideDiv.setAttribute('data-name', product.name);
                              slideDiv.setAttribute('data-price', product.price);
                              slideDiv.setAttribute('data-size', product.size);
                              slideDiv.setAttribute('data-color', product.color);
                              slideDiv.setAttribute('data-description', product.description);
                              slideDiv.setAttribute('data-material', product.material);
                              slideDiv.setAttribute('data-benefici', product.benefici);
                              slideDiv.setAttribute('data-type', product.type);
                              slideDiv.setAttribute('data-model', product.model);
                              const productImage = slideClone.querySelector('img');
                              productImage.src = product.imageUrl;
                              productImage.alt = `${product.name} ${product.color}`;
                              carouselContainer.appendChild(slideClone);
                           });
                        }
                        function loadSlides() {
                        // fetch(apiUrl)
                        //   .then(response => response.json())
                        //   .then(data => createProductElements(data.products))
                        //   .catch(error => console.error('Error loading products:', error));
                           createCarouselSlides(apiResponse.products);
                        }
                        document.addEventListener('DOMContentLoaded', loadSlides);
                     </script>
                  </div>
               </div>
               <button class="button" id="preview_carousel_btn"> 
                  <span class="text">PREVIEW</span>
                  <span class="icon"><img src="./assets/images/home/icon_arrow.svg" alt="Arrow"></span>
               </button>
            </div>
         </div>
      </div>
      <div class="grid_floor"></div>
      <!-- PROFILE WIDGET -->
      <?php require_once 'core/profile.php'; ?>
      <!-- CART -->
      <?php require_once 'core/cart.php'; ?>
      <!-- POPUP PREVIEW DESC PRODUCT -->
      <?php require_once './core/descproduct.php'; ?>
      <!--  POUP COLLECTION  -->
      <div class="popup_collection" id="popup_collection">
         <div class="mask" id="mask_collection"></div>
            <div class="content">
               <span class="border border_t_left"></span>
               <span class="border border_b_left"></span>
               <span class="border border_b_right"></span>
               <button id="button_close_collection" class="button_close_collection"><img src="./assets/images/home/close_icon_2.svg" alt="close"></button>
               <div class="container_content">
                  <div class="content_inner">
                     <h1 class="title_collection">LIMITED COLLECTION!</h1>
                        <!--  template carousell -->
                        <template id="collection-item-template">
                           <li class="item_collection">
                              <div class="item_merch">
                                 <img src="" alt="" class="merch_image">
                              </div>
                              <div class="item_element_collection">
                                 <img src="" alt="" class="element_image">
                              </div>
                              <div class="item_collection_timer">
                                 <span class="hours"></span>:
                                 <span class="minutes"></span>:
                                 <span class="seconds"></span>
                              </div>
                           </li>
                        </template>
                     <div class="carouse_container_collection"><div class="floor_collection"></div></div>
                  </div>
                  <div class="slider_indicators"><!-- dinanamic DOTS --></div>
                  <div class="button_show_moore"><a href="./pages/collection/collection.php"> <span class="text">SEE MORE</span> <img src="./assets/images/home/icon_arrow.svg" alt="icon arrow"></a></div>
               </div>
            </div>
         </div>

         <!-- notification -->
         <div id="notification" class="notification">
            <div class="notification_content">
               <p id="notification_message"></p>
                  <div class="notification_buttons">
                     <button id="notification_close" class="hidden">Close</button>
                     <button id="notification_ok">OK</button>
                  </div>
            </div>
         </div>

      <script type="module" src="./assets/js/main.js"></script>
      <script type="module">
         import { addtocard } from './assets/js/main.js'; window.addtocard = addtocard; 
         import { Popup } from "./assets/js/classPopup.js"; window.Popup = Popup; 
      </script>
      <script>
         const UrlApiCollection = "https://angrobit.com/api"
         // response api example collections popup
         const responseFromApi = {
            collections: [
               {
                     name: "T-SHIRT",
                     items: [
                        {  
                           image: "./assets/images/home/shirt1.png",
                           elementImage: "./assets/images/home/element_limited_collection_1.png",
                           hours: 23,
                           minutes: 49,
                           seconds: 49
                        },
                        {
                           image: "./assets/images/home/shirt1.png",
                           elementImage: "./assets/images/home/element_limited_collection_2.png",
                           hours: 23,
                           minutes: 49,
                           seconds: 49
                        },
                        {
                           image: "./assets/images/home/shirt1.png",
                           elementImage: "./assets/images/home/element_limited_collection_3.png",
                           hours: 23,
                           minutes: 49,
                           seconds: 49
                        }
                     ]
               },
               {
                     name: "HOODIE",
                     items: [
                        {  
                           image: "./assets/images/home/shirt2.png",
                           elementImage: "./assets/images/home/element_limited_collection_1.png",
                           hours: 18,
                           minutes: 30,
                           seconds: 50
                        },
                        {
                           image: "./assets/images/home/shirt2.png",
                           elementImage: "./assets/images/home/element_limited_collection_2.png",
                           hours: 18,
                           minutes: 30,
                           seconds: 50
                        },
                        {
                           image: "./assets/images/home/shirt2.png",
                           elementImage: "./assets/images/home/element_limited_collection_3.png",
                           hours: 18,
                           minutes: 30,
                           seconds: 50
                        }
                     ]
               }
            ]
         };
         // function start timer
         function startLiveTimer(hoursElem, minutesElem, secondsElem) {
            let hours = parseInt(hoursElem.textContent);
            let minutes = parseInt(minutesElem.textContent);
            let seconds = parseInt(secondsElem.textContent);
         
            const timerInterval = setInterval(() => {
               if (seconds > 0) {
                     seconds--;
               } else if (minutes > 0) {
                     seconds = 59;
                     minutes--;
               } else if (hours > 0) {
                     minutes = 59;
                     seconds = 59;
                     hours--;
               } else {
                     clearInterval(timerInterval);
               }
               hoursElem.textContent = hours < 10 ? "0" + hours : hours;
               minutesElem.textContent = minutes < 10 ? "0" + minutes : minutes;
               secondsElem.textContent = seconds < 10 ? "0" + seconds : seconds;
            }, 1000);
         };
         // create carousell from template
         function generateCarouselItems(data) {
            const carouselContainer = document.querySelector(".carouse_container_collection");
            const template = document.getElementById("collection-item-template");
            data.collections.forEach(collection => {
               const ul = document.createElement("ul");
               ul.classList.add("items_collection");
               collection.items.forEach(product => {
                     const itemClone = template.content.cloneNode(true);

                     const merchImage = itemClone.querySelector(".merch_image");
                     merchImage.src = product.image;
                     merchImage.alt = collection.name;

                     const elementImage = itemClone.querySelector(".element_image");
                     elementImage.src = product.elementImage;
                     elementImage.alt = collection.name;

                     const hoursSpan = itemClone.querySelector(".hours");
                     const minutesSpan = itemClone.querySelector(".minutes");
                     const secondsSpan = itemClone.querySelector(".seconds");

                     hoursSpan.textContent = product.hours;
                     minutesSpan.textContent = product.minutes;
                     secondsSpan.textContent = product.seconds;

                     startLiveTimer(hoursSpan, minutesSpan, secondsSpan);

                     ul.appendChild(itemClone);
               });

               // Adăugăm lista în containerul caruselului
               carouselContainer.appendChild(ul);
            });
         }
         function loadCollection(){
            // fetch(UrlApiCollection)
            //   .then(response => response.json())
            //   .then(data => createProductElements(data.products))
            //   .catch(error => console.error('Error loading products:', error));
            generateCarouselItems(responseFromApi);
         }

         document.addEventListener('DOMContentLoaded', function(e) {
             document.querySelectorAll('.nav_item  a').forEach(function (e){
                 const urlParams = new URLSearchParams(window.location.search);
                 const param1 = urlParams.get('userid');
                 if(param1){
                     const content = e.getAttribute('href');
                     e.setAttribute('href',`${content}?userid=${param1}`)
                 }
            });
            loadCollection();
            
            // caorusell selector
            const carouselItems = document.querySelectorAll(".items_collection");
            const sliderIndicators = document.querySelector(".slider_indicators");
            let currentIndex = 0;

            // show slide by index
            function showSlide(index) {
               carouselItems.forEach(item => item.classList.remove("active"));
               carouselItems[index].classList.add("active");
               currentIndex = index;
            }

            // function create create dots
            function generateDots() {
               carouselItems.forEach((_, index) => {
                  const dot = document.createElement("span");
                  dot.classList.add("slider_dot");
                  if (index === 0) {
                        dot.classList.add("active");
                  }
                  dot.addEventListener("click", () => {
                        showSlide(index);
                        updateDots(index);
                  });
                  sliderIndicators.appendChild(dot);
               });
            }
            
            // update active dots
            function updateDots(index) {
               const dots = document.querySelectorAll(".slider_dot");
               dots.forEach(dot => dot.classList.remove("active"));
               dots[index].classList.add("active");
            }
            generateDots();
            showSlide(currentIndex);

            // toggle collection
            const popupCollection = new Popup(null, "popup_collection", "mask_collection", "button_close_collection", null)
            setTimeout(function() {
               // popupCollection.open();
            }, 4000);
           
         });
      </script>
   </body>
</html>