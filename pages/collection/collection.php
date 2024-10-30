<?php
 ?>
<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <link rel="preconnect" href="https://fonts.googleapis.com">
      <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
      <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Saira:ital,wght@0,100..900;1,100..900&family=Work+Sans:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
      <link rel="stylesheet" href="../../assets/css/global.css">
      <link rel="stylesheet" href="../../assets/css/main.css">
      <link rel="stylesheet" href="./collection.css">
      <link rel="stylesheet" href="../../assets/css/reset.css">
      <link rel="stylesheet" href="../../assets/css/responsive.css">
      <title>AngroBit Shop</title>
   </head>
   <body class="body collection">
      <!-- HEADER -->
      <header class="header" id="menu">
         <span class="border border_t_left"></span>
         <span class="border border_t_right"></span>
         <span class="border border_b_left"></span>
         <span class="border border_b_right"></span>
         <nav class="nav">
            <div class="logo"> <a href="/"> <img src="../../assets/images/home/logo.svg" alt="AngroBit Logo"> </a></div>
            <button class="nav_search" id="button_nav_search">
               <span class="icon"><img src="../../assets/images/home/icon_search.svg" alt="Seach_Icon"></span>
               <span class="nav_title"> Search </span>
            </button>
            <div class="nav_line"></div>
            <ul class="nav_items">
               <li class="nav_item">
                  <a href="/">
                        <span class="icon">
                           <img src="../../assets/images/home/icon_home.svg" alt="Home" class="normal">
                           <img src="../../assets/images/home/icon_home_active.svg" alt="Home active" class="active">
                        </span>
                        <span class="nav_title">Home</span>
                  </a>
               </li>
               <li class="nav_item">
                  <a href="../../pages/catalog/catalog.php">
                        <span class="icon">
                           <img src="../../assets/images/home/icon_catalog.svg" alt="Catalog" class="normal">
                           <img src="../../assets/images/home/icon_catalog_active.svg" alt="Catalog active" class="active">
                        </span>
                        <span class="nav_title">Catalog</span>
                  </a>
               </li>
               <li class="nav_item activated">
                  <a href="../../pages/collection/collection.php">
                        <span class="icon">
                           <img src="../../assets/images/home/icon_collection.svg" alt="Collection" class="normal">
                           <img src="../../assets/images/home/icon_collection_active.svg" alt="Collection active" class="active">
                        </span>
                        <span class="nav_title">Collection</span>
                  </a>
               </li>
            </ul>
            <div class="nav_line"></div>
            <div class="game">
               <a href="../../pages/page405/page405.html">
                  <span class="icon_game"><img src="../../assets/images/home/icon_game.svg" alt="icon game"></span>
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
         <button class="button_close" id="btn_popup_nav_search_close"> <img src="../../assets/images/home/icon_close.svg" draggable="false" alt="close icon"> </button>
         <div class="logo">
               <img src="../../assets/images/home/logo_2.svg" alt="Logo AngroBit">
         </div>
         <form action="#" class="search_nav_form" >
               <span class="icon"> <img src="../../assets/images/home/icon_search.svg" draggable="false" alt="search icon"> </span>
               <input type="search" placeholder="Search" id="search_nav_term">
               <span class="hidden_icon"><img src="../../assets/images/home/icon_close.svg" draggable="false" alt="close icon"></span>
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
                     <span class="icon"><img src="../../assets/images/home/icon_sale.svg" alt="Icon sale"></span>
                     <span class="text">Sale</span>
                     </a>
                  </li>
                  <li class="item">
                     <a href="/pages/catalog/catalog.php?category=populare">
                     <span class="icon"><img src="../../assets/images/home/icon_populare.svg" alt="Icon populare"></span>
                     <span class="text">Populare</span>
                     </a>
                  </li>
                  <li class="item">
                     <a href="/pages/catalog/catalog.php?category=exclusive">
                     <span class="icon"><img src="../../assets/images/home/icon_exclusive.svg" alt="Icon exclusive"></span>
                     <span class="text">Exclusive</span>
                     </a>
                  </li>
                  <li class="item">
                     <a href="/pages/catalog/catalog.php?category=t-shirt">
                     <span class="icon"><img src="../../assets/images/home/icon_t_shirt.svg" alt="Icon T-shirt"></span>
                     <span class="text">T-shirts</span>
                     </a>
                  </li>
                  <li class="item">
                     <a href="/pages/catalog/catalog.php?category=caps">
                     <span class="icon"><img src="../../assets/images/home/icon_caps.svg" alt="Icon Caps"></span>
                     <span class="text">Caps</span>
                     </a>
                  </li>
                  <li class="item">
                     <a href="/pages/catalog/catalog.php?category=hoddie">
                     <span class="icon"><img src="../../assets/images/home/icon_hoddie.svg" alt="Icon hoddie"></span>
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
      <main class="main collection">
         <section class="collection_section">
            <h1 class="title"> Exclusive T-Shirt Collection</h1>
            <p class="subtitle_collection">
               <span class="text_collection">Step into the future of fashion and gaming with our <span class="text_bold">limited-edition t-shirt collection!</span></span>
               <span class="text_collection">Not only will you stand out in real life with these cyberpunk-inspired designs, but each shirt also comes with exclusive <span class="text_bold">in-game bonuses</span> to enhance your gameplay experience.</span>
            </p>
            <!-- REWARDS -->
            <h2 class="title_rewards">Reward</h2>
            <ul class="reward_items">
               <!-- dinamic rewards items -->
               <template id="reward-item-template">
                  <li class="reward_item">
                     <img class="reward_item_icon" src="" alt="reward icon">
                     <p class="reward_item_points">
                           + <span class="points_value"></span><span class="name_points"><span>bonus</span><span>points</span></span>
                     </p>
                  </li>
               </template>
            </ul>
         </section>
         <!-- COLLECTIONS IMAGES SLIDER -->
         <div class="collection_slider">
            <!-- template slides -->
            <template id="collection-item-template">
               <div class="collection_item">
                  <img src="" alt="">
               </div>
            </template>
         </div>
         <div class="slider_controls">
            <div class="collections_add_slider">
               <!-- add collection item template  -->
                  <template id="add-item-template">
                     <li class="collection_add_item">
                        <button class="button_add_collection"><img src="../../assets/images/collection/icon_add.svg" alt="Add to Collection"></button>
                        <div class="collection_add_image"><img src="" alt=""></div>
                     </li>
               </template>
            </div>
            <!-- slide controller -->
            <div class="exclusive_collection_controller">
               <button class="button_exclusive_collection">
                  <span class="left_controll"></span>
                  <span class="right_controll"></span>
                  <span class="arrow_left"><img src="../../assets/images/home/icon_arrow.svg" alt="arrow"></span>
                  <span class="text"><span class="name_collection"></span></span>
                  <span class="arrow_right"><img src="../../assets/images/home/icon_arrow.svg" alt="arrow"></span>
               </button>
            </div>
         </div>
         <!-- button prorgress collections -->
         <div class="button_choose_collection">
            <div class="container_collections" style="display: none;">
               <ul class="collection_items_progress">
                  <!-- template collection progress -->
                  <template id="progress-item-template">
                     <li class="collection_item_progress">
                        <p class="collection_progress_name"></p>
                        <span class="collection_progress_score"></span>
                     </li>
                  </template>
               </ul>
            </div>
            <button id="choose_collection">
            <span>YOUR COLLECTIONS</span>
            <img src="../../assets/images/home/icon_arrow.svg" alt="arrow">
            </button>
         </div>
         <div class="floor_collection"></div>
      </main>
      <!-- Notification -->
      <div id="notification" class="notification">
         <div class="notification_content">
            <p id="notification_message"></p>
            <div class="notification_buttons">
               <button id="notification_close" class="hidden">Close</button>
               <button id="notification_ok">OK</button>
            </div>
         </div>
      </div>
      <!-- PROFILE WIDGET -->
      <?php require_once "../../core/profile.php"; ?>
      <!-- CART -->
      <?php require_once "../../core/cart.php"; ?>
      <!-- POPUP PREVIEW DESC PRODUCT -->
      <?php require_once "../../core/descproduct.php"; ?>
      <script type="module" src="../../assets/js/main.js"></script>
      <script type="module"> import { addtocard} from '../../assets/js/main.js'; window.addtocard = addtocard; </script>
      <script>
         document.addEventListener('DOMContentLoaded', function() {
            // toggle choose collection
            const btnChooseCollection = document.getElementById("choose_collection");
            const containerCollections = document.querySelector(".container_collections");
            btnChooseCollection.addEventListener("click", function(){
             const arrow = btnChooseCollection.querySelector("img");
                 arrow.style.transform = "rotate(90deg)";
               if (containerCollections.style.display === "flex") {
                     containerCollections.style.display = "none";
                     arrow.style.transform = "rotate(-90deg)";
               } else {
                     containerCollections.style.display = "flex";
                     arrow.style.transform = "rotate(90deg)";
               }
            });
            document.addEventListener("click", function(event) {
               const arrow = btnChooseCollection.querySelector("img");
               if (!containerCollections.contains(event.target) && !btnChooseCollection.contains(event.target)) {
                  containerCollections.style.display = "none";
                  arrow.style.transform = "rotate(-90deg)";
               }
            });
            // load progress
            loadProgressItems();
            // load rewards
            loadRewards();
            // load carousel
            loadCarousel();
            //slider collections
            const leftControl = document.querySelector('.left_controll');
            const rightControl = document.querySelector('.right_controll');
            const items = document.querySelectorAll('.collection_items');
            const items2 = document.querySelectorAll('.collection_add_items');
            const nameBtn = document.querySelector(".name_collection");
            let currentIndex = 0;
            // show current slide
            function showSlide(index) {
            items.forEach(item => item.classList.remove('active'));
            items[index].classList.add('active');
            items2.forEach(item => item.classList.remove('active'));
            items2[index].classList.add('active');
            let name = items2[index].getAttribute("data-collection");
            nameBtn.innerText = name;
            }
            // next slide
            rightControl.addEventListener('click', function() {
            currentIndex = (currentIndex + 1) % items.length; 
            showSlide(currentIndex);
            });
            // prev slide
            leftControl.addEventListener('click', function() {  
            currentIndex = (currentIndex - 1 + items.length) % items.length;
            showSlide(currentIndex);
            });
            showSlide(currentIndex);
         });
         // create progress collection items
         function createProgressItems(response) {
            const collectionList = document.querySelector('.collection_items_progress');
            const template = document.getElementById('progress-item-template');
            collectionList.innerHTML = ''; 
            response.forEach(item => {
               const itemClone = template.content.cloneNode(true);
               const nameElem = itemClone.querySelector('.collection_progress_name');
               const scoreElem = itemClone.querySelector('.collection_progress_score');
               nameElem.textContent = item.name;
               scoreElem.textContent = `${item.score}%`;
               const listItem = itemClone.querySelector('.collection_item_progress');
               listItem.style.background = `linear-gradient(85deg, ${item.color} 0%, #0D2940 ${item.score}%)`;
               collectionList.appendChild(itemClone);
            });
         }
         // load progress collections
         function loadProgressItems(){
            const UrlApiCollection = "https://agrobit.com/api/collection";
            const apiCollectionsResponse = [
                  { name: "Exclusive T-Shirt", score: 0, color: "#000000" },
                  { name: "Thor", score: 0, color: "#FF0000" },
                  { name: "Captain America", score: 5, color: "#1651E8" },
                  { name: "Loki", score: 20, color: "#EBCD7C" },
                  { name: "Hulk", score: 50, color: "#00DE8D" },
                  { name: "Spider-Man", score: 50, color: "#FFFFFF" },
                  { name: "Thanos", score: 80, color: "#844BC1" },
                  { name: "Iron-Man", score: 100, color: "#DE0046" }
            ];
            // fetch(UrlApiCollection)
            //   .then(response => response.json())
            //   .then(data => createProgressItems(apiCollectionsResponse))
            //   .catch(error => console.error('Error loading products:', error));
            createProgressItems(apiCollectionsResponse);
         }
         
         // Function to toggle the visibility of the reward title
         function toggleRewardTitle(response) {
            const titleElement = document.querySelector('.title_rewards');
            if (response.length !== 0) { titleElement.classList.remove('hidden');} else {titleElement.classList.add('hidden');}
         }
         // function create rewards items
         function createRewardItems(response) {
            const rewardList = document.querySelector('.reward_items');
            const template = document.getElementById('reward-item-template');
            const rewardIconUrl = '../../assets/images/collection/icon_reward.png'; 
            rewardList.innerHTML = '';
            response.forEach(item => {
               const itemClone = template.content.cloneNode(true);
               const rewardIcon = itemClone.querySelector('.reward_item_icon');
               rewardIcon.src = rewardIconUrl;
               const pointsElem = itemClone.querySelector('.points_value');
               pointsElem.textContent = item.points.toLocaleString();
               rewardList.appendChild(itemClone);
            });
         }
         // load reawards
         function loadRewards(){
            const UrlApiRewards = "https://agrobit.com/api/collection";
            const apiRewardsResponse = [ { points: 10000 }, { points: 20000 }];
            // fetch(UrlApiRewards)
            //   .then(response => response.json())
            //   .then(data => createRewardItems(apiRewardsResponse))
            //   .catch(error => console.error('Error loading products:', error));
            toggleRewardTitle(apiRewardsResponse);
            createRewardItems(apiRewardsResponse);
         }

         // create slider from template
         function createCollectionDisplay(response) {
            const collectionSlider = document.querySelector('.collection_slider');
            const collectionsAddSlider = document.querySelector('.collections_add_slider');
            const collectionItemTemplate = document.getElementById('collection-item-template');
            const addItemTemplate = document.getElementById('add-item-template');

            collectionSlider.innerHTML = '';
            collectionsAddSlider.innerHTML = '';

            response.forEach(collection => {
               const sliderDiv = document.createElement('div');
               sliderDiv.classList.add('collection_items');
               const addItemsUl = document.createElement('ul');
               addItemsUl.classList.add('collection_add_items');
               addItemsUl.setAttribute("data-collection", collection.collectionName);
               collection.carouselImages.forEach((image, index) => {
                     const collectionItemClone = collectionItemTemplate.content.cloneNode(true);
                     const imgElem = collectionItemClone.querySelector('img');
                     imgElem.src = image.src;
                     imgElem.alt = `${collection.collectionName} - ${index + 1}`;
                     if (image.active) {
                        imgElem.style.filter = "grayscale(0%)";
                     } else {
                        imgElem.style.filter = "grayscale(100%)";
                     }
                     sliderDiv.appendChild(collectionItemClone);
                     const addItemClone = addItemTemplate.content.cloneNode(true);
                     const addImage = addItemClone.querySelector('.collection_add_image img');
                     addImage.src = collection.addImages[index].src;
                     addImage.alt = `${collection.collectionName} - ${index + 1}`;
                     if (collection.addImages[index].active) {
                        addImage.style.filter = "grayscale(0%)";
                        addItemClone.querySelector('.collection_add_item').classList.add('active');
                     } else {
                        addImage.style.filter = "grayscale(100%)";
                     }
                     const buttonElem = addItemClone.querySelector('.button_add_collection');
                     buttonElem.addEventListener("click", function() {
                        window.location.href = "../../pages/catalog/catalog.php";
                     });
                     addItemsUl.appendChild(addItemClone);
               });

               collectionSlider.appendChild(sliderDiv);
               collectionsAddSlider.appendChild(addItemsUl);
            });
         }
         // load  carousell collection images        
         function loadCarousel(){
            const apiCarousel = "https://agrobit.com/api/collection/carousel";
            // fetch(apiCarousel)
            //   .then(response => response.json())
            //   .then(data => createCollectionDisplay(apiCollectionCarouselResponse))
            //   .catch(error => console.error('Error loading products:', error));
            
            const apiCollectionCarouselResponse = [
               {
                  collectionName: "Exclusive T-Shirt Collection",
                  carouselImages: [
                        { src: '../../assets/images/collection/collection_slide_1.png', active: false },
                        { src: '../../assets/images/collection/collection_slide_2.png', active: true },
                        { src: '../../assets/images/collection/collection_slide_3.png', active: true }
                  ],
                  addImages: [
                        { src: '../../assets/images/collection/collection_1.png', active: false },
                        { src: '../../assets/images/collection/collection_2.png', active: true },
                        { src: '../../assets/images/collection/collection_3.png', active: true }
                  ]
               },
               {
                  collectionName: "Exclusive Capitain America Collection",
                  carouselImages: [
                        { src: '../../assets/images/collection/collection_slide_1.png', active: false },
                        { src: '../../assets/images/collection/collection_slide_2.png', active: false },
                        { src: '../../assets/images/collection/collection_slide_3.png', active: true }
                  ],
                  addImages: [
                        { src: '../../assets/images/collection/collection_1.png', active: false },
                        { src: '../../assets/images/collection/collection_2.png', active: false },
                        { src: '../../assets/images/collection/collection_3.png', active: true }
                  ]
               }
            ];
            createCollectionDisplay(apiCollectionCarouselResponse);
         }
      </script>
   </body>
</html>