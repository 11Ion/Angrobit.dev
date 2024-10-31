<?php
    ini_set("display_errors", 1);
    ini_set("display_startup_errors", 1);
    error_reporting(E_ALL);
    require_once "../../bdfunction.php";
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
        <link rel="stylesheet" href="./catalog.css">
        <link rel="stylesheet" href="../../assets/css/reset.css">
        <link rel="stylesheet" href="../../assets/css/responsive.css">
        <title>AngroBit Shop</title>
    </head>
    <body class="body" id="catalog">
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
                <li class="nav_item activated">
                    <a href="../../pages/catalog/catalog.php">
                        <span class="icon">
                        <img src="../../assets/images/home/icon_catalog.svg" alt="Catalog" class="normal">
                        <img src="../../assets/images/home/icon_catalog_active.svg" alt="Catalog active" class="active">
                        </span>
                        <span class="nav_title">Catalog</span>
                    </a>
                </li>
                <li class="nav_item">
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
        <main class="main">
            <!-- CATALOG -->
            <section class="catalog">
                <span class="border border_t_left"></span>
                <span class="border border_t_right"></span>
                <span class="border border_b_left"></span>
                <span class="border border_b_right"></span>

                <!-- POPUP FILTER -->
                <div class="popup_filter" id="popup_filter">
                    <!-- filter by price range and inputs -->
                    <div class="price_filters">
                        <p class="title">Price</p>
                        <div class="box_price">
                            <input type="number" placeholder="min" id="minPrice" min="0" max="2000">
                            <input type="number" placeholder="max" id="maxPrice" min="0" max="2000">
                        </div>
                        <div class="range">
                            <div class="group">
                                <div class="progress"></div>
                                <div class="range-input">
                                    <input type="range" class="range-min" min="0" max="2000" value="0" step="1">
                                    <input type="range" class="range-max" min="0" max="2000" value="2000" step="1">
                                </div>
                                <div class="text-range">
                                    <div class="text-min">0</div>
                                    <div class="text-max">2000</div>
                                </div>
                            </div>
                        </div>

                        <!-- filter by colors  -->
                        <div class="colors_filters">
                            <div class="top_box">
                                <p class="title">Color</p>
                                <label>
                                    <input type="checkbox" name="all_color" onclick="filterByAllColors()">
                                    <span class="name">All</span>
                                </label>
                            </div>
                            <div class="colors_box" id="color_box">
                                <!-- colors items template -->
                                <template id="color-template">
                                    <label>
                                        <input type="checkbox" value="">
                                        <span class="color"></span>
                                    </label>
                                </template>
                            </div>
                        </div>

                        <!-- filter by size -->
                        <div class="size_filters">
                            <div class="top_box">
                                <p class="title">Size</p>
                                <label>
                                    <input type="checkbox" name="all_sizes" onclick="filterByAllSizes()">
                                    <span class="name">All</span>
                                </label>
                            </div>

                            <div class="size_box">
                                <label>
                                    <input type="checkbox" name="filter_size" value="XS" onclick="filterBySizes();">
                                    <span class="name">XS</span>
                                </label>
                                <label>
                                    <input type="checkbox" name="filter_size" value="S" onclick="filterBySizes();">
                                    <span class="name">S</span>
                                </label>
                                <label>
                                    <input type="checkbox" name="filter_size" value="M" onclick="filterBySizes();">
                                    <span class="name">M</span>
                                </label>
                                <label>
                                    <input type="checkbox" name="filter_size" value="L" onclick="filterBySizes();">
                                    <span class="name">L</span>
                                </label>
                                <label>
                                    <input type="checkbox" name="filter_size" value="XL" onclick="filterBySizes();">
                                    <span class="name">XL</span>
                                </label>
                                <label>
                                    <input type="checkbox" name="filter_size" value="2XL" onclick="filterBySizes();">
                                    <span class="name">2XL</span>
                                </label>
                            </div>
                        </div>
                        <span class="filters_line"></span>
                        <!-- filter reset and upatate temp hidden  -->
                        <!-- <div class="buttons">
                            <button class="button" onclick="ResetData();">
                                <span class="text">Reset</span>
                            </button>
                            <button class="button" onclick="refreshData();">
                                <span class="text">UPDATE</span>
                            </button>
                        </div> -->
                    </div>
                </div>

                <!-- POPUP SEARCH  -->
                <div class="popup_search" id="prod_popup_search">
                    <!-- last viewed items if exist  -->
                    <div class="last_viewed" id="last_viewed_search">
                        <p class="title">Last viewed</p>
                        <ul class="items" id="last_viewed_search_items"><!-- last viewed items --></ul>
                        <span class="line_search"></span>
                    </div>

                    <div class="recommended">
                        <p class="title">Recommended</p>
                        <ul class="items">
                            <li class="item">
                                <button class="button" data-category="Sale" onclick="filterByCategory();">
                                    <span class="icon"><img src="../../assets/images/home/icon_sale.svg" alt="Icon sale"></span>
                                    <span class="text">Sale</span>
                                </button>
                            </li>
                            <li class="item">
                                <button class="button" data-category="Populare" onclick="filterByCategory();">
                                    <span class="icon"><img src="../../assets/images/home/icon_populare.svg" alt="Icon populare"></span>
                                    <span class="text">Populare</span>
                                </button>
                            </li>
                            <li class="item">
                                <button class="button" data-category="Exclusive" onclick="filterByCategory();">
                                    <span class="icon"><img src="../../assets/images/home/icon_exclusive.svg" alt="Icon exclusive"></span>
                                    <span class="text">Exclusive</span>
                                </button>
                            </li>
                            <li class="item">
                                <button class="button" data-category="T-shirts" onclick="filterByCategory();">
                                    <span class="icon"><img src="../../assets/images/home/icon_t_shirt.svg" alt="Icon T-shirt"></span>
                                    <span class="text">T-shirts</span>
                                </button>
                            </li>
                            <li class="item">
                                <button class="button" data-category="Caps" onclick="filterByCategory();">
                                    <span class="icon"><img src="../../assets/images/home/icon_caps.svg" alt="Icon caps"></span>
                                    <span class="text">Caps</span>
                                </button>
                            </li>
                            <li class="item">
                                <button class="button" data-category="Hoddie" onclick="filterByCategory();">
                                    <span class="icon"><img src="../../assets/images/home/icon_hoddie.svg" alt="Icon hoddie"></span>
                                    <span class="text">Hoddie</span>
                                </button>
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="settings_bar">
                    <!-- current category -->
                    <button class="dropdown_category" data-category="T-shirt">
                        <span class="icon"><img src="../../assets/images/home/icon_t_shirt.svg" alt="Icon T-shirt"></span>
                        <span class="name" id="current_category_name">T-shirts</span>
                    </button>
                    <div class="filters_product">
                        <!-- toggle search -->
                        <form action="#" class="search_form" id="search_form_prod" onsubmit="SearchByName(event);">
                            <span class="icon"><img src="../../assets/images/home/icon_search.svg" alt="Icon search"></span>
                            <input type="text" id="search_term" placeholder="Search">
                            <span class="clear_icon"><img src="../../assets/images/home/icon_close.svg" alt="Icon close"></span>
                        </form>
                        <!-- toggle filters -->
                        <button class="button" id="btn_filters"><img src="../../assets/images/home/icon_filter.svg" alt="Icon filter"></button>
                    </div>
                    <span class="line_settings_bar"></span>
                </div>

                <div class="content">
                    <!-- toggle active sort -->
                    <div class="sort">
                        <button class="dropdown_sort" data-sort="popular">
                            <span class="text">Popular</span>
                            <span class="arrow"><img src="../../assets/images/home/icon_arrow_bottom.svg" alt="Icon arrow"></span>
                        </button>
                        <!-- popup sort -->
                        <div class="popular_popup" id="popup_sort">
                            <ul class="items">
                                <li class="item">
                                    <button class="item_button" data-sort="sale" onclick="sortProducts()"><span class="text">Sale</span></button>
                                    <span class="item_line"></span>
                                </li>
                                <li class="item">
                                    <button class="item_button" data-sort="popular" onclick="sortProducts()"><span class="text">Popular</span></button>
                                    <span class="item_line"></span>
                                </li>
                                <li class="item">
                                    <button class="item_button" data-sort="newest" onclick="sortProducts()"><span class="text">Newest</span></button>
                                    <span class="item_line"></span>
                                </li>
                                <li class="item">
                                    <button class="item_button" data-sort="price-desc" onclick="sortProducts()"><span class="text">Price: Low to High</span></button>
                                    <span class="item_line"></span>
                                </li>
                                <li class="item">
                                    <button class="item_button" data-sort="price-asc" onclick="sortProducts()"><span class="text">Price: High to Low</span></button>
                                    <span class="item_line"></span>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="products" id="productsContainer">

                    </div>
                </div>
            </section>
            <!-- 3D SCENE -->
            <section class="scene_catalog">
                <div class="spotlight"></div>
                <canvas class="model"></canvas>
                <div class="bottom_platform"><img src="../../assets/images/catalog/platform_bottom.png" alt="platform"></div>
                <!-- preview product details btn and price -->
                <div class="preview_product">
                    <p class="price" id="price_preview"></p>
                    <div class="buttons">
                        <button class="button" id="btn_details"><span class="text">Details</span></button>
                        <button class="button add_to_cart" onclick="addtocard()"><span class="text">ADD TO CART</span><span class="arrow"><img src="../../assets/images/home/icon_arrow.svg" alt="icon arrow"></span></button>
                    </div>
                </div>
            </section>
        </main>
        <div class="grid_floor_2"><div class="floor"></div></div>
        <!-- SIZE WIDGET -->
        <div class="preview_size">
            <p class="title">Size</p>
            <span class="line_size"></span>
            <div class="container_sizes">
                <label>
                    <input type="radio" name="webperoduct_size" value="XS"  onclick="filterBySize()">
                    <span class="name">XS</span>
                </label>
                <label>
                    <input type="radio" name="webperoduct_size" value="S" onclick="filterBySize()">
                    <span class="name">S</span>
                </label>
                <label>
                    <input type="radio" name="webperoduct_size" value="M" onclick="filterBySize()">
                    <span class="name">M</span>
                </label>
                <label>
                    <input type="radio" name="webperoduct_size" value="L" onclick="filterBySize()">
                    <span class="name" >L</span>
                </label>
                <label>
                    <input type="radio" name="webperoduct_size" value="XL" onclick="filterBySize()">
                    <span class="name">XL</span>
                </label>
                <label>
                    <input type="radio" name="webperoduct_size" value="2XL" onclick="filterBySize()">
                    <span class="name">2XL</span>
                </label>
            </div>
        </div>
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
        <script type="module">
            import { addtocard, fetchProductsByFilter, closeAllPopups } from '../../assets/js/main.js';
            window.addtocard = addtocard;
            window.fetchProductsByFilter = fetchProductsByFilter;
            window.closeAllPopups = closeAllPopups;
        </script>
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                document.querySelectorAll('.nav_item  a').forEach(function (e){
                    const urlParams = new URLSearchParams(window.location.search);
                    const param1 = urlParams.get('userid');
                    if(param1){
                        const content = e.getAttribute('href');
                        e.setAttribute('href',`${content}?userid=${param1}`)
                    }
                });
            });
            // collect all current filters
            function collectFilters() {
                let selectedCategory = "";
                let selectedSort = "";
                let selectedSizes = [];
                let selectedColors = [];
                let minPirce, maxPrice;
                setTimeout(function() {
                    // Получение текущей выбранной категории
                    selectedCategory = document.querySelector('.dropdown_category').getAttribute('data-category'); 
                    // Получение текущей сортировки
                    selectedSort = document.querySelector('.dropdown_sort').getAttribute('data-sort'); 
                    // Получение значения размера (radio button)
                    const valueSize = document.querySelector('.container_sizes input[type="radio"]:checked') 
                    // Получение значений размеров (checkbox)
                    const valueSizes = document.querySelectorAll('.size_box input[type="checkbox"]:checked') 
                    // Получение выбранных значений цветов (checkbox)
                    document.querySelectorAll('.colors_box input[type="checkbox"]:checked').forEach(function(checkbox) {
                        selectedColors.push(checkbox.value); 
                    });
                    // Получение минимальной и максимальной цены
                    const minPrice = document.getElementById('minPrice') ? document.getElementById('minPrice').value : '';
                    const maxPrice = document.getElementById('maxPrice') ? document.getElementById('maxPrice').value : '';
                    // Получение поискового запроса
                    const searchTerm = document.getElementById("search_term").value; 
                    // Добавление выбранного размера (radio button) в массив selectedSizes
                    if (valueSize) {
                        selectedSizes.push(valueSize.value); 
                    }
                    // Добавление выбранных размеров (checkbox) в массив selectedSizes
                    if (valueSizes) {
                        valueSizes.forEach(checkbox => {
                            selectedSizes.push(checkbox.value); 
                        });
                    }
                    // Логирование для тестирования
                    if (selectedCategory) {
                        console.log('Category:', selectedCategory);
                    }
                    if (selectedSort) {
                        console.log('Sort:', selectedSort);
                    }
                    if (selectedSizes) {
                        console.log('Single size:', selectedSizes);
                    }
                    if (selectedColors) {
                        console.log('colors:', selectedColors); 
                    }
                    if (minPrice) {
                        console.log('minPrice:', minPrice); 
                    }
                    if (maxPrice) {
                        console.log('maxPrice:', maxPrice); 
                    }

                    if (searchTerm) {
                        console.log('Search Term:', searchTerm); // вывод поискового запроса в консоль
                    }
                    // Формирование данных для отправки формы
                    var formData = '&category=' + encodeURIComponent(selectedCategory) +
                            '&sort=' + encodeURIComponent(selectedSort) +
                            '&minPrice=' + encodeURIComponent(minPrice) +
                            '&maxPrice=' + encodeURIComponent(maxPrice) +
                            '&search=' + encodeURIComponent(searchTerm) +
                            '&colors=' + encodeURIComponent(selectedColors.join(',')) +
                            '&sizes=' + encodeURIComponent(selectedSizes.join(',')) +
                            '&type=filtre&user=&id=';
                    // Отправка запроса с выбранными фильтрами
                    fetchProductsByFilter(formData);
                }, 100); 
            };
                // colors from API
                const apiURLColors = "https://angrobit.com/api";
                const apiResponseColors = {colors: ["#ffffff", "#000000", "#FFFF00", "#FFA500", "#800080"]};
                // function create list color
                function createColorList(colors) {
                    const colorsBox = document.getElementById('color_box');
                    const template = document.getElementById('color-template');
                    colorsBox.innerHTML = '';  
                    colors.forEach(color => {
                        const colorClone = template.content.cloneNode(true);
                        const input = colorClone.querySelector('input');
                        const span = colorClone.querySelector('.color');
                        input.value = color;
                        input.onclick = filterByColors;  
                        span.style.background = color;  
                        colorsBox.appendChild(colorClone);
                    });
                }
                // load colors 
                function loadColors() {
                    // fetch(apiURLColors)
                    //   .then(response => response.json())
                    //   .then(data => createProductElements(data.products))
                    //   .catch(error => console.error('Error loading products:', error));
                    createColorList(apiResponseColors.colors);
                };

                document.addEventListener('DOMContentLoaded', function() {
                    loadColors();
                    // Вызов функции для обработки категории из URL при загрузке страницы
                    handleCategoryFromURL();
                });
                // function reset all filters
                function ResetData(){
                    // Сброс выбранных цветов
                    const colors = document.querySelectorAll('.colors_box input[type="checkbox"]');
                    colors.forEach(color => { color.checked = false; }); // Снять отметку с каждого checkbox для цветов
                    const checkboxSelectAllColors = document.querySelector('input[name="all_color"]');
                    checkboxSelectAllColors.checked = false; // Снять отметку с опции "Выбрать все цвета"
                    const checkboxSelectAllSizes = document.querySelector('input[name="all_sizes"]'); // Сброс выбранных размеров
                    checkboxSelectAllSizes.checked = false; // Снять отметку с опции "Выбрать все размеры"
                    const inputsSizeFilter = document.querySelectorAll(".size_box input");
                    inputsSizeFilter.forEach(size => { size.checked  = false; }); // Снять отметку со всех checkbox для размеров
                    const inputsSizeWidget = document.querySelectorAll(".container_sizes input");
                    inputsSizeWidget.forEach(size => { size.checked  = false; }); // Снять отметку с всех радиокнопок для размеров
                    lastCheckedRadio = null; // Сброс последнего выбранного радиокнопки
                    
                    function resetRange() {
                        // Сброс диапазона цен
                        const rangeInput = document.querySelectorAll(".range-input input");
                        const rangeText = document.querySelectorAll(".text-range div");
                        const range = document.querySelector(".progress");
                        const priceMax = parseInt(rangeInput[0].max);
                        // Установить минимальное и максимальное значение для диапазона
                        const minVal = 0;
                        const maxVal = priceMax;
                        rangeInput[0].value = minVal; // Минимальная цена
                        rangeInput[1].value = maxVal; // Максимальная цена
                        // Обновить стиль диапазона
                        range.style.left = (minVal / priceMax) * 100 + "%";
                        range.style.right = 100 - (maxVal / priceMax) * 100 + "%";
                        // Обновить текстовые значения минимальной и максимальной цены
                        rangeText[0].style.left = (minVal / priceMax) * 100 + "%";
                        rangeText[1].style.right = 100 - (maxVal / priceMax) * 100 + "%";
                        rangeText[0].innerText = minVal.toLocaleString(); // Отображение минимальной цены
                        rangeText[1].innerText = maxVal.toLocaleString(); // Отображение максимальной цены
                        // Вызвать событие 'input' для обновления значений
                        rangeInput[0].dispatchEvent(new Event('input'));
                        rangeInput[1].dispatchEvent(new Event('input'));
                    }
                    // Сброc
                    resetRange();
                    minPrice.value = ""; 
                    maxPrice.value = ""; 
                    collectFilters(); 
                };
                // sort product
                function sortProducts() {
                    const button = event.target.closest('button'); // Получаем кнопку, по которой кликнули
                    const clickedText = button.querySelector('.text').textContent.trim(); // Получаем текст кнопки
                    const selectedSort = button.getAttribute('data-sort'); // Получаем значение сортировки из атрибута data-sort
                    const dropdownSortText = document.querySelector(".dropdown_sort .text");
                    dropdownSortText.innerText = clickedText; // Обновляем текст кнопки сортировки
                    const dropdownSortButton = document.querySelector(".dropdown_sort");
                    dropdownSortButton.setAttribute('data-sort', selectedSort); // Устанавливаем новое значение сортировки
                    collectFilters();
                    closeAllPopups();
                };

                // filter product
                function filterByCategory() {
                    const button = event.target.closest('button'); // Получаем кнопку, по которой кликнули
                    const clickedText = button.querySelector('.text').textContent.trim(); // Получаем текст кнопки
                    const selectedCategory = button.getAttribute('data-category'); // Получаем категорию из атрибута data-category
                    const clickedIconSrc = button.querySelector('.icon img').src; // Получаем иконку выбранной категории
                    const dropdownText = document.querySelector('.dropdown_category .name');
                    dropdownText.textContent = clickedText; // Обновляем текст категории
                    const dropdownIcon = document.querySelector('.dropdown_category .icon img');
                    dropdownIcon.src = clickedIconSrc; // Обновляем иконку категории
                    const dropdownCategoryButton = document.querySelector(".dropdown_category");
                    dropdownCategoryButton.setAttribute('data-category', selectedCategory); // Устанавливаем новую категорию
                    closeAllPopups();
                    // Применяем фильтры и закрываем всплывающие окна
                    collectFilters();
                }

                const clearSearchTerm = document.querySelector(".clear_icon");
                const searchTerm = document.getElementById("search_term");

                // Показать иконку очистки, если поле ввода не пустое
                searchTerm.addEventListener("input", function() {
                    if (searchTerm.value !== "") {
                        clearSearchTerm.style.display = "block"; // Показать иконку очистки
                    } else {
                        clearSearchTerm.style.display = "none"; // Скрыть иконку очистки
                    }
                });

                // Очистить поле поиска и скрыть иконку очистки при клике на иконку
                clearSearchTerm.addEventListener("click", function() {
                    searchTerm.value = ""; 
                    clearSearchTerm.style.display = "none"; // Скрыть иконку
                    collectFilters(); // Применить фильтры
                });
                function SearchByName(event) {
                    event.preventDefault(); // Предотвратить стандартное действие формы

                    clearSearchTerm.style.none = "none"; // Скрыть иконку очистки
                    collectFilters(); // Применить фильтры
                    closeAllPopups(); // Закрыть все всплывающие окна
                }

                // Получение полей для ввода максимальной и минимальной цены
                const maxPrice = document.getElementById("maxPrice");
                const minPrice = document.getElementById("minPrice");
                // Запуск фильтрации при изменении максимальной цены
                maxPrice.addEventListener("change", function() {
                    collectFilters();
                });
                // Запуск фильтрации при изменении минимальной цены
                minPrice.addEventListener("change", function() {
                    collectFilters();
                });

                // Проверка и корректировка значения максимальной цены при вводе
                maxPrice.addEventListener("input", function() {
                    const maxValue = Number(maxPrice.value);
                    const minValue = Number(minPrice.value);
                    // Если поле пустое, не выполняем действия
                    if (maxPrice.value === "") { return;}
                    // Если введенное значение меньше минимально допустимого
                    if (maxValue < Number(maxPrice.min)) { maxPrice.value = maxPrice.min;} 
                    else if (maxValue > Number(maxPrice.max)) { maxPrice.value = maxPrice.max;}
                    // Если минимальная цена больше максимальной, уравниваем их
                    if (minValue && maxValue < minValue) { maxPrice.value = minValue;}
                });
                // Проверка и корректировка значения минимальной цены при вводе
                minPrice.addEventListener("input", function() {
                    const minValue = Number(minPrice.value);
                    const maxValue = Number(maxPrice.value);
                    // Если поле пустое, не выполняем действия
                    if (minPrice.value === "") { return;}
                    // Если введенное значение меньше минимально допустимого
                    if (minValue < Number(minPrice.min)) { minPrice.value = minPrice.min; } 
                    else if (minValue > Number(minPrice.max)) { minPrice.value = minPrice.max; }
                    // Если минимальная цена больше максимальной, уравниваем их
                    if (maxValue && minValue > maxValue) { minPrice.value = maxValue; }
                });

                // Фильтрация при изменении диапазона цен
                const rangeMin = document.querySelector(".range-min");
                const rangeMax = document.querySelector(".range-max");
                // Применение фильтров при изменении максимального диапазона
                rangeMax.addEventListener("change", function() { collectFilters(); });
                // Применение фильтров при изменении минимального диапазона
                rangeMin.addEventListener("change", function() { collectFilters(); });

                // filter by single size
                let lastCheckedRadio = null 
                function filterBySize() {
                    const input = event.target.closest('input');
                    // Если тот же radio-кнопка уже выбрана, ничего не делаем
                    if (lastCheckedRadio === input) { return };
                    lastCheckedRadio = input; // Обновляем последнюю выбранную radio-кнопку
                    // Сбросить выбор "Выбрать все размеры"
                    const checkboxSelectAllSizes = document.querySelector('input[name="all_sizes"]');
                    checkboxSelectAllSizes.checked = false;
                    // Снять отметки со всех checkbox размеров
                    const inputsSizeFilter = document.querySelectorAll(".size_box input");
                    inputsSizeFilter.forEach(size => { size.checked  = false; });// Сброс выбора размеров
                    collectFilters();
                }
                // filter by sizes
                function filterBySizes() {
                    lastCheckedRadio = null; // Сброс последней выбранной radio-кнопки
                    const input = event.target.closest('input');
                    // Сбросить выбор "Выбрать все размеры"
                    const checkboxSelectAllSizes = document.querySelector('input[name="all_sizes"]');
                    checkboxSelectAllSizes.checked = false;
                    // Снять отметки со всех радиокнопок размеров в виджете
                    const inputsSizeWidget = document.querySelectorAll(".container_sizes input");
                    inputsSizeWidget.forEach(size => { size.checked  = false; });// Сброс radio-кнопок размеров
                    collectFilters(); 
                }
                // all sizes
                function filterByAllSizes() {
                    lastCheckedRadio = null; // Сброс последней выбранной radio-кнопки
                    const currentTarget = event.target.closest('input');
                    // Установить или снять отметки со всех checkbox размеров в фильтре
                    const inputsSizeFilter = document.querySelectorAll(".size_box input");
                    inputsSizeFilter.forEach(size => { size.checked  = currentTarget.checked; });
                    // Сбросить radio-кнопки размеров в виджете
                    const inputsSizeWidget = document.querySelectorAll(".container_sizes input");
                    inputsSizeWidget.forEach(size => { size.checked  = false; });// Снять отметки с radio-кнопок
                    collectFilters();
                }
                // filter by colors
                function filterByColors() {
                    // Сбросить выбор "Выбрать все цвета"
                    const checkboxSelectAllColors = document.querySelector('input[name="all_color"]');
                    checkboxSelectAllColors.checked = false;
                    collectFilters(); 
                }
                // filter by all collor
                function filterByAllColors() {
                    const currentTarget = event.target.closest('input');
                    // Установить или снять отметки со всех checkbox цветов
                    const colorInputs = document.querySelectorAll('.colors_box input[type="checkbox"]');
                    colorInputs.forEach((checkbox) => {checkbox.checked = currentTarget.checked; }); 
                    collectFilters(); 
                }


                function handleCategoryFromURL() {
                    // Извлечение параметров URL, в данном случае 'category'
                    const urlParams = new URLSearchParams(window.location.search); 
                    const category = urlParams.get('category'); // Получение значения категории из URL
                    let matched = false; // Флаг для проверки, была ли категория найдена
                    if (category) { // Если в URL есть параметр 'category'
                        console.log(`Category url: ${category}`); // Вывод категории из URL для отладки
                        const recbox = document.querySelector(".recommended"); // Получение элемента с рекомендациями
                        const buttons = recbox.querySelectorAll('[data-category]'); // Получение всех кнопок, содержащих категорию
                        // Проход по всем кнопкам для поиска совпадающей категории
                        buttons.forEach(button => {
                            const buttonCategory = button.getAttribute('data-category'); // Получение категории кнопки
                            if (buttonCategory.toLowerCase() === category.toLowerCase()) { // Сравнение категорий без учета регистра
                                const text = button.querySelector('.text').textContent.trim(); // Текст кнопки
                                const icon = button.querySelector('.icon img').src; // Иконка кнопки
                                const data_category = button.getAttribute('data-category'); // Категория кнопки
                                // Обновление выпадающего меню категории (dropdown)
                                const dropdownText = document.querySelector('.dropdown_category .name');
                                dropdownText.textContent = text; // Обновляем текст выпадающего меню
                                const dropdownIcon = document.querySelector('.dropdown_category .icon img');
                                dropdownIcon.src = icon; // Обновляем иконку в выпадающем меню
                                const dropdownCategoryButton = document.querySelector(".dropdown_category");
                                dropdownCategoryButton.setAttribute('data-category', data_category); // Устанавливаем атрибут категории
                                matched = true; // Устанавливаем флаг, что категория найдена
                            }
                        });
                        // Применение фильтров, если категория была найдена и обновлена
                        collectFilters();       
                    }
                }
        </script>
    </body>
</html>