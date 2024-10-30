import { Scene3d } from './classScene3d.js';
import { Popup } from './classPopup.js';
import Root from './root.js';
import Carousel3D from './Carousel3D.js';
import ProductPreview from './ProductPreview.js';
import SceneManager from './SceneManager.js';

const root = new Root();
console.debug(root.page)
const UrlMannequin = `${window.location.origin}/assets/models/man_mannequin.gltf`;

if(root.page === "home"){
   document.addEventListener('DOMContentLoaded', () => {
      const scene = new SceneManager(".model", UrlMannequin, root.page);
      scene.initScene();
      const carousel3D = new Carousel3D('.carousel', scene);
      const preview = new ProductPreview("preview_carousel_btn", "desc-product-template");
   });
}

if(root.page === "catalog"){
   var catalogScene = new Scene3d('.model', UrlMannequin, 'catalog');
   catalogScene.initScene();
   // Функция для получения всех продуктов
      async function fetchProducts() {
         const data = {
            type: 'allproduct',
            user: '',
            id: ''
      };

      // Конвертируем объект в URL-encoded строку для отправки через POST-запрос
      const params = new URLSearchParams(data).toString();

      // delete in production
      const testData = [
      {
            "id": "30",
            "name": "ProductNames",
            "description": "Description",
            "price": "423",
            "img": "http://localhost:3000/assets/images/home/default.png",
            "size": "S",
            "color": "#000000",
            "type_product": "upper",
            "model": "hoody.gltf",
            "material": "100% cotton",
            "benefici": "benefis test"
      },
      {
            "id": "31",
            "name": "ProductNames 2",
            "description": "Description 2",
            "price": "350",
            "img": "http://localhost:3000/assets/images/home/default.png",
            "size": "M",
            "color": "#FFFFFF",
            "type_product": "lower",
            "model": "jeans.gltf",
            "material": "80% cotton, 20% polyester",
            "benefici": "benefis test"
      },
      {
            "id": "32",
            "name": "ProductNames 3",
            "description": "Description 3",
            "price": "299",
            "img": "http://localhost:3000/assets/images/home/default.png",
            "size": "L",
            "color": "#FF5733",
            "type_product": "upper",
            "model": "t_shirt.gltf",
            "material": "100% leather",
            "benefici": "benefis test"
      }
      ];

      try {
         // Отправляем запрос на сервер
         let response = await fetch('https://angrobit.com/api', {
            method: 'POST',
            headers: {
               'Content-Type': 'application/x-www-form-urlencoded',
               'X-Requested-With': 'XMLHttpRequest'
            },
            body: params 
         });

         // Проверяем успешен ли запрос
         if (!response.ok) {
            throw new Error(`Error network: ${response.status}`); // Обрабатываем ошибки сети
         }
         
         const productsContainer = document.getElementById('productsContainer');
         if (!productsContainer) return;

         // Парсим ответ сервера
         const result = await response.json();
   
         // Проверяем, является ли результат массивом
         if (result && Array.isArray(result)) {
            // show products 
            ProductCatalogShow(result); 
         } else {
            console.warn('Products are not available or are not in the expected format');
         }

      } catch (error) {
         console.error('Error:', error); // Обрабатываем ошибки
         // delete in production
         ProductCatalogShow(testData); 
      }
   }
   document.addEventListener('DOMContentLoaded', () => {
      fetchProducts();
   })
}
// show product description show
function ProductCatalogShow(result) {
   if (result.length === 0) {
      if (!document.querySelector('.empty_search_result')) {
         productsContainer.insertAdjacentHTML('afterend', "<em class='empty_search_result'>The product was not found :(</em>");
      }
   } else {
      const emptyMessage = document.querySelector('.empty_search_result');
      if (emptyMessage) {
         emptyMessage.remove();
      }
   }
   result.forEach(product => {

      const productData = {
         id: product.id,
         name: product.name,
         price:  parseFloat(product.price).toFixed(2),
         image: product.img ? 'https://angrobit.com/uploads/mini_' + product.img : '../../assets/images/home/default.png',
         color: product.color,
         size: product.size,
         type: product.type_product,
         model: product.model
      }

      function createProductFromTemplate(productData) {
         // select template
         const template = document.getElementById('product-template').content.cloneNode(true);
   
         // add date product
         const productElement = template.querySelector('.product');
         productElement.setAttribute('data-id', productData.id);
         productElement.setAttribute('data-name', productData.name);
         productElement.setAttribute('data-price', productData.price);
         productElement.setAttribute('data-image', productData.image);
         productElement.setAttribute('data-color', productData.color);
         productElement.setAttribute('data-size', productData.size);
         productElement.setAttribute('data-type', productData.type);
         productElement.setAttribute('data-model', productData.model);
   
         // add date product to btn cart
         const addToCartBtn = template.querySelector('.botton_add_to_cart');
         addToCartBtn.setAttribute('data-id', productData.id);
         addToCartBtn.setAttribute('data-name', productData.name);
         addToCartBtn.setAttribute('data-price', productData.price);
         addToCartBtn.setAttribute('data-image', productData.image);
         addToCartBtn.setAttribute('data-size', productData.size);
         addToCartBtn.setAttribute('data-color', productData.color);
   
         // set image product
         const productImage = template.querySelector('.image_product_container img');
         productImage.src = productData.image;
         productImage.alt = productData.name;
   
         // set color product
         const colorInput = template.querySelector('.product_colors input');
         colorInput.setAttribute('name', `color_product_${productData.id}`);
         colorInput.value = productData.color;
         colorInput.checked = productData.color === 'white';
   
         const colorSpan = template.querySelector('.product_colors .color');
         colorSpan.style.background = productData.color;
   
         // set name product
         const productName = template.querySelector('.product_name');
         productName.textContent = productData.name;
   
         const productPrice = template.querySelector('.button_buy .text');
         productPrice.textContent = `$ ${productData.price}`;

         return productElement;
      }
      const productElement = createProductFromTemplate(productData);
      productsContainer.appendChild(productElement);
   });

   // click product events
   let lastClickedProductId = null; // Variable that prevent repeat click product
   productsContainer.addEventListener('click', function (e) {
   const target = e.target.closest('.product');
   if (target) {
      const id = target.getAttribute('data-id');
      const name = target.getAttribute('data-name');
      const price = target.getAttribute('data-price');
      const image = target.getAttribute('data-image');
      const size = target.getAttribute('data-size');
      const color = target.getAttribute('data-color');
      const type = target.getAttribute('data-type');
      const model = target.getAttribute('data-model');
      const modelUrl = 'http://localhost:3000/modele/' + model;

      // prevent spam click one product
      if (lastClickedProductId === id) { return };
      lastClickedProductId = id;

      // update preview price and details btn
      updatePreviewProduct(price, id, name, size, color, image);

      // update clothing model 3d
      catalogScene.putOnclothes(modelUrl, type, name, color);
      
      const btnDetails = document.getElementById("btn_details");
      btnDetails.setAttribute('data-id', id);
      btnDetails.setAttribute('data-name', name);
      btnDetails.setAttribute('data-price', price);
      btnDetails.setAttribute('data-image', image);
      btnDetails.setAttribute('data-size', size);
      btnDetails.setAttribute('data-color', color);
      btnDetails.setAttribute('data-type', type);
      btnDetails.setAttribute('data-model', model);

      }
   });

   let previewScene = null;
   // click btn details events
   const btnDetails = document.getElementById("btn_details");
      btnDetails.addEventListener('click', function () {
      const id = btnDetails.getAttribute('data-id');
      const name = btnDetails.getAttribute('data-name');
      const price = btnDetails.getAttribute('data-price');
      const image = btnDetails.getAttribute('data-image');
      const size = btnDetails.getAttribute('data-size');
      const color = btnDetails.getAttribute('data-color');
      const type = btnDetails.getAttribute('data-type');
      const model = btnDetails.getAttribute('data-model');
      const clothingURL = `${window.location.origin}/assets/models/${model}`;      
      const productData = { id: id, name: name, price:  price, image: image, color: color, size: size, type: type, model: model };

      if (previewScene) {
         previewScene.renderer.dispose(); // clear memory
         previewScene = null;
     }

      const descPopup = new Popup("desc-product-template", "preview_product_description", "preview_product_close", "preview_product_close_btn", null);
      previewScene = new Scene3d('.model2', UrlMannequin, 'popup_preview');
      previewScene.initScene();
      previewScene.loadSingleClothing(clothingURL, type, name, color);
      showProductDesc(productData);
      descPopup.open();
});
}
// show product description function
function showProductDesc(data) {
   // data template selcotrs
   const nameElement = document.getElementById("name_product_preview");
   const priceElement = document.getElementById("price_product_price");
   const sizeName = document.getElementById("sizes_name");
   const colordesc = document.getElementById("id_coclor_desc");
   const imagedesc = document.getElementById("desc_image");
   const descProduct = document.getElementById("descproduct");
   const materialBg = document.querySelector('.material_bg');
   const nameMaterial = document.querySelector('.name_material');
   const beneficiContainer =  document.getElementById('benefici')
   const btnAddToCart = document.getElementById("btn_add_to_cart_preview");
   const sizingRows = document.querySelectorAll('.size_table_row');

  // set data template
  sizeName.innerText = data.size;
  colordesc.style.background = data.color;
  descProduct.innerText = data.description;
  nameMaterial.innerText = data.material;
  imagedesc.src = data.image;
  materialBg.style.backgroundImage = `url(${window.location.origin + "/assets/images/home/cotton.webp"})`;
  beneficiContainer.innerHTML = `<li class="item"> <span class="icon"><img src="${window.location.origin}/assets/images/home/icon_favorites.svg" alt="${data.name}" /></span> <span class="text">${data.benefici}</span></li>`;
  nameElement.innerText = data.name;
  priceElement.innerText = parseFloat(data.price).toFixed(2);
  btnAddToCart.setAttribute('data-id', data.id);
  btnAddToCart.setAttribute('data-name', data.name);
  btnAddToCart.setAttribute('data-price', data.price);
  btnAddToCart.setAttribute('data-image', data.image);
  btnAddToCart.setAttribute('data-size', data.size);
  btnAddToCart.setAttribute('data-color', data.color);
  sizingRows.forEach(row => { row.classList.remove('selected') });
  sizingRows.forEach(row => {
     const sizeCell = row.querySelector('.size_table_cell'); 
     if (sizeCell && sizeCell.textContent.trim() === data.size) { row.classList.add('selected')}
  });

  // сохрание истории просмотров
  function addToViewed(data) {
     let products = localStorage.getItem('historyView');
     products = products ? JSON.parse(products) : [];
     const productExists = products.some(product => product.id === data.id); 
     if (!productExists) {
        const productData = { id: data.id, name: data.name, price: data.price, image: data.image, size: data.size, color: data.color, description: data.description, material: data.material, benefici: data.benefici, model: data.model, type_product: data.type_product };
        products.push(productData);
        localStorage.setItem('historyView', JSON.stringify(products)); 
     }
  }
  addToViewed(data);
  // sizing chart controlls
  const btnTogleSizingChart = document.querySelector(".size_chart");
  const rightContentDesc = document.getElementById("right_content_desc");
  const SizingChartContainer = document.querySelector(".sizing_chart_container");
  const btnBackSizingChart = document.getElementById("back_sizing_chart");
  btnTogleSizingChart.addEventListener("click", function(){ 
     rightContentDesc.style.display = "none";
     SizingChartContainer.style.display = "flex";
  });
  btnBackSizingChart.addEventListener("click", function(){
     rightContentDesc.style.display = "flex";
     SizingChartContainer.style.display = "none";
  });
};
// show product btn details and price preview catalog function
function updatePreviewProduct(productPrice, productId, productName, productSize, productColors, productImage) {
   const previewPrice = document.querySelector(".preview_product");
   if (previewPrice) {
       previewPrice.style.display = "flex";
       previewPrice.style.opacity = 0;
       let opacity = 0;
       const interval = setInterval(function () {
           opacity = Math.min(opacity + 0.1, 1);
           previewPrice.style.opacity = opacity;
           if (opacity >= 1) {
               clearInterval(interval);
           }
       }, 0.1);

       const price = document.getElementById("price_preview");
       price.innerText = `$ ${productPrice}`;
       const btnAddToCartDetails = document.querySelector(".button.add_to_cart");
       btnAddToCartDetails.setAttribute('data-id', productId);
       btnAddToCartDetails.setAttribute('data-name', productName);
       btnAddToCartDetails.setAttribute('data-price', productPrice);
       btnAddToCartDetails.setAttribute('data-image', productImage);
       btnAddToCartDetails.setAttribute('data-size', productSize);
       btnAddToCartDetails.setAttribute('data-color', productColors);
   }
};
// function close all popups
export function closeAllPopups() {
   const popups = [
      { popup: document.getElementById("popup_sort"), trigger: document.querySelector(".dropdown_sort"), arrow: document.querySelector('.dropdown_sort .arrow') },
      { popup: document.getElementById("popup_filter"), trigger: document.getElementById("btn_filters") },
      { popup: document.getElementById("prod_popup_search"), trigger: document.getElementById("search_term") },
      { popup: document.querySelector(".popup_search_nav"), trigger: document.getElementById("button_nav_search") }
   ];

   popups.forEach(popupData => {
      if (popupData.popup && popupData.popup.style.display !== 'none') {
         popupData.popup.style.display = 'none';
         popupData.popup.style.opacity = 0;
         // Reset arrow or trigger state if they exist
         if (popupData.arrow) {
            popupData.arrow.style.transform = "rotate(0deg)";
         }
         if (popupData.trigger) {
            popupData.trigger.classList.remove("active");
         }
      }
   });
};
// Функция для получения последних просмотренных продуктов
async function lastViewed() {
    try {
        const USER = false;
        let response = null;

        if(USER){
            response = [
                {
                "id": "30",
                "name": "ProductNames",
                "description": "Description",
                "price": "423",
                "img": "http://localhost:3000/assets/images/home/default.png",
                "size": "S",
                "color": "#000000",
                "type_product": "upper",
                "model": "hoody.gltf",
                "material": "100% cotton",
                "benefici": "benefis test"
                },
                {
                "id": "31",
                "name": "ProductNames 2",
                "description": "Description 2",
                "price": "350",
                "img": "http://localhost:3000/assets/images/home/default.png",
                "size": "M",
                "color": "#FFFFFF",
                "type_product": "lower",
                "model": "short.gltf",
                "material": "80% cotton, 20% polyester",
                "benefici": "benefis test"
                },
                {
                "id": "32",
                "name": "ProductNames 3",
                "description": "Description 3",
                "price": "299",
                "img": "http://localhost:3000/assets/images/home/default.png",
                "size": "L",
                "color": "#FF5733",
                "type_product": "upper",
                "model": "t_shirt.gltf",
                "material": "100% leather",
                "benefici": "benefis test"
                }
            ];

        } else{

            // Получаем историю просмотров из localStorage
            const historyView = JSON.parse(localStorage.getItem('historyView')) || [];

            if (historyView.length === 0) {
                console.log('No products viewed yet.');
                return [];
            }
            
            // last 3 value
            response = historyView.slice(-3);
        }


       let lastViewedSearchNav = null;
       let lastViewedSearchNavContainer = null;
       let lastViewedSearch = null;
       let lastViewedSearchContainer = null;

       lastViewedSearch = document.getElementById('last_viewed_search');
       lastViewedSearchContainer = document.getElementById('last_viewed_search_items');

       if (lastViewedSearch && lastViewedSearchContainer) {
          lastViewedSearch.style.display = "flex"; 
          lastViewedSearchContainer.innerHTML = ""; 
       }

       // Отображаем навигацию последних просмотров, если поле поиска пустое
       const searchTerm = document.getElementById("search_nav_term").value;
       if (searchTerm === "") {
          lastViewedSearchNav = document.getElementById('last_viewed_search_nav');
          if (lastViewedSearchNav) {
             lastViewedSearchNav.style.display = "block"; // Показываем навигацию последних просмотров
             lastViewedSearchNavContainer = document.getElementById('last_viewed_search_items_nav');
             if (lastViewedSearchNavContainer) {
                lastViewedSearchNavContainer.innerHTML = ""; // Очищаем контейнер
             }
          }
       }
       let previewScene = null;
       response.forEach(product => {

          // Функция для создания элемента списка продукта
          function createListItem(container) {
             const listItem = document.createElement('li');
             listItem.className = 'item';
             listItem.setAttribute('data-id', product.id);
             listItem.setAttribute('data-name', product.name);
             listItem.setAttribute('data-price', product.price);
             listItem.setAttribute('data-image', product.image);
             listItem.setAttribute('data-size', product.size);
             listItem.setAttribute('data-color', product.color);
             listItem.setAttribute('data-description', product.description);
             listItem.setAttribute('data-material', product.material);
             listItem.setAttribute('data-benefici', product.benefici);
             listItem.setAttribute('data-model', product.model);
             listItem.setAttribute('data-type', product.type_product);


             const productImage = document.createElement('img');
             productImage.src = product.image;
             productImage.alt = product.name;

             listItem.appendChild(productImage); // Добавляем изображение продукта
             container.appendChild(listItem); // Добавляем элемент списка в контейнер

             // Добавляем событие клика на элемент списка
             listItem.addEventListener("click", function () {
                const productArray = {
                   id: listItem.getAttribute('data-id'),
                   name: listItem.getAttribute('data-name'),
                   price: listItem.getAttribute('data-price'),
                   image: listItem.getAttribute('data-image'),
                   size: listItem.getAttribute('data-size'),
                   color: listItem.getAttribute('data-color'),
                   description: listItem.getAttribute('data-description'),
                   material: listItem.getAttribute('data-material'),
                   benefici: listItem.getAttribute('data-benefici'),
                   model: listItem.getAttribute('data-model'),
                   type_product:listItem.getAttribute('data-type'),
                };
     
                if (previewScene) {
                  previewScene.renderer.dispose(); // clear memory
                  previewScene = null;
               }
                // events click
                const clothingURL = `${window.location.origin}/assets/models/${productArray.model}`
                const descPopup = new Popup("desc-product-template", "preview_product_description", "preview_product_close", "preview_product_close_btn", null);
                previewScene = new Scene3d('.model2', UrlMannequin, 'popup_preview');
                previewScene.initScene();
                previewScene.loadSingleClothing(clothingURL, productArray.type_product, productArray.name, productArray.color);
                showProductDesc(productArray);
                descPopup.open();
             });
          }

          if (lastViewedSearch) {
             createListItem(lastViewedSearchContainer); // Добавляем продукт в контейнер последних просмотров
          }

          if (lastViewedSearchNavContainer) {
             createListItem(lastViewedSearchNavContainer); // Добавляем продукт в навигацию последних просмотров
          }
       });

    } catch (error) {
       console.error('Error:', error); // Обработка ошибок
    }
};
// fucntion search product by term
async function SearchNav(term) {
    try {
       // Пример ответа от API (симуляция)
       const response = [
          {
             "id": "30",
             "name": "ProductNames",
             "description": "Description",
             "price": "423",
             "img": "",
             "size": "S",
             "color": "#000000",
             "type_product": "upper",
             "model": "hoody.gltf",
             "material": "100% cotton",
             "benefici": "benefis test"
          },
          {
             "id": "31",
             "name": "ProductNames 2",
             "description": "Description 2",
             "price": "350",
             "img": "default.png",
             "size": "M",
             "color": "#FFFFFF",
             "type_product": "lower",
             "model": "short.gltf",
             "material": "80% cotton, 20% polyester",
             "benefici": "benefis test"
          },
          {
             "id": "32",
             "name": "ProductNames 3",
             "description": "Description 3",
             "price": "299",
             "img": "default.png",
             "size": "L",
             "color": "#FF5733",
             "type_product": "upper",
             "model": "t_shirt.gltf",
             "material": "100% leather",
             "benefici": "benefis test"
          }
       ];
       let previewScene = null;
       let searchContainer = document.getElementById('search_items_container');
       searchContainer.innerHTML = ""; 

       // Отображаем каждый продукт в списке поиска
       response.forEach(product => {
          // Функция для создания элемента списка продукта
          function createListItem(container) {
             const listItem = document.createElement('li');
             listItem.className = 'item';
             listItem.setAttribute('data-name', product.name);
             listItem.setAttribute('data-price', product.price);
             listItem.setAttribute('data-type', product.type_product);
             listItem.setAttribute('data-size', product.size);
             listItem.setAttribute('data-color', product.color);
             listItem.setAttribute('data-description', product.description);
             listItem.setAttribute('data-material', product.material);
             listItem.setAttribute('data-benefici', product.benefici);
             listItem.setAttribute('data-model', product.model);

             // Создаем структуру отображения продукта
             const productItemContent = document.createElement('div');
             productItemContent.className = 'product_item_content';

             const productImageDiv = document.createElement('div');
             productImageDiv.className = 'product_image';

             const productImage = document.createElement('img');
             productImage.src = product.img ? 'https://angrobit.com/uploads/mini_' + product.img : '../../assets/images/home/default.png';
             productImage.alt = product.name;

             productImageDiv.appendChild(productImage);
             productItemContent.appendChild(productImageDiv);

             const rightContent = document.createElement('div');
             rightContent.className = 'right_content';

             const productName = document.createElement('p');
             productName.className = 'product_name';
             productName.textContent = product.name;

             const productPrice = document.createElement('p');
             productPrice.className = 'product_price';
             productPrice.textContent = `$${parseFloat(product.price).toFixed(2)}`; // Форматирование цены

             rightContent.appendChild(productName);
             rightContent.appendChild(productPrice);

             productItemContent.appendChild(rightContent);
             listItem.appendChild(productItemContent);

             const lineSpan = document.createElement('span');
             lineSpan.className = 'line';
             listItem.appendChild(lineSpan);

             container.appendChild(listItem);

             // Добавляем событие клика на элемент списка
             listItem.addEventListener("click", function () {
                const productArray = {
                   id: listItem.getAttribute('data-id'),
                   name: listItem.getAttribute('data-name'),
                   price: listItem.getAttribute('data-price'),
                   size: listItem.getAttribute('data-size'),
                   color: listItem.getAttribute('data-color'),
                   description: listItem.getAttribute('data-description'),
                   material: listItem.getAttribute('data-material'),
                   benefici: listItem.getAttribute('data-benefici'),
                   model: listItem.getAttribute('data-model')
                };

                if (previewScene) {
                  previewScene.renderer.dispose(); // clear memory
                  previewScene = null;
               }
                // events click search product
                const clothingURL = `${window.location.origin}/assets/models/${productArray.model}`
                const descPopup = new Popup("desc-product-template", "preview_product_description", "preview_product_close", "preview_product_close_btn", null);
                previewScene = new Scene3d('.model2', UrlMannequin, 'popup_preview');
                previewScene.initScene();
                previewScene.loadSingleClothing(clothingURL, productArray.type_product, productArray.name, productArray.color);
                showProductDesc(productArray);
                descPopup.open();
             });
          }

          createListItem(searchContainer); // Добавляем продукт в контейнер поиска
       });

    } catch (error) {
       console.error('Error:', error); // Обработка ошибок
    }
}
// function add prodicut to card
export function addtocard() {
   event.stopPropagation(); 
   let cardid = localStorage.getItem('id'); // Получаем ID карты из localStorage
   const urlParams = new URLSearchParams(window.location.search);
   const param1 = urlParams.get('userid');
   if (param1 && param1 !== '247') { // Проверяем, существует ли параметр userid и не равен ли он 247
      // Подготовка данных для отправки
      var formData = 'type=productcart&id=' + encodeURIComponent(cardid) + '&idusers=' + encodeURIComponent(param1);
      // Создаем новый XMLHttpRequest
      var xhr = new XMLHttpRequest();
      // Открываем соединение с сервером
      xhr.open('POST', 'https://angrobit.com/api', true);
      // Устанавливаем заголовок для отправки URL-encoded данных
      xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
      // Обработка ответа от сервера
      xhr.onreadystatechange = function () {
         if (xhr.readyState == 4 && xhr.status == 200) { // Проверяем успешен ли запрос
            let date = JSON.parse(xhr.responseText);
            let elementcount = document.getElementById('cardcount').textContent;
            let countproduct = parseInt(elementcount) + 1;
            document.getElementById('cardcount').textContent = countproduct; // Обновляем количество продуктов в корзине
            if (date) {
               showNotification("This product has been added to the cart", false) // notification
            }
         }
      };
      // Отправляем запрос с данными формы
      xhr.send(formData);
   } else {
      // Обработка случая, когда userid равен 247 или отсутствует
      const button = event.target.closest('button');
      let cart = localStorage.getItem('cart');
      cart = cart ? JSON.parse(cart) : [];
      const productId = button.getAttribute('data-id');
      const productName = button.getAttribute('data-name');
      const productPrice = button.getAttribute('data-price');
      const productImage = button.getAttribute('data-image');
      const productSize = button.getAttribute('data-size');
      const productColor = button.getAttribute('data-color');
      // Проверяем, все ли данные получены
      if (!productId || !productName || !productPrice || !productImage || !productSize || !productColor) {
         showNotification("Error: Something didn't go well, try again!", true) // notification
         return;
      }
      let existingProduct = cart.find(item => item.id === productId); // Ищем, есть ли продукт уже в корзине
      if (existingProduct) {
        showNotification("Product existing in your cart!", false) // notification
      } else {
         // Создаем объект для нового продукта
         const productData = {
            id: productId,
            name: productName,
            price: productPrice,
            image: productImage,
            size: productSize,
            color: productColor,
            quantity: 1,
         };
         cart.push(productData); // Добавляем продукт в корзину
         localStorage.setItem('cart', JSON.stringify(cart)); // Сохраняем корзину в localStorage
         showNotification("Product add in cart successfull", false) // notification
         // Создаем и отправляем пользовательское событие для обновления корзины
         const event = new CustomEvent('cartUpdated');
         document.dispatchEvent(event);
      }
   }
};

export function fetchProductsByFilter(formData) {
   var xhr = new XMLHttpRequest();
   // Открываем соединение для отправки фильтров на сервер
   xhr.open('POST', 'https://angrobit.com/api', true);
   xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
   // Обработка ответа от сервера
   xhr.onreadystatechange = function () {
      if (xhr.readyState == 4 && xhr.status == 200) { // Успешный ответ
         const result = JSON.parse(xhr.responseText); // Парсим JSON-ответ от сервера
         const productsContainer = document.getElementById('productsContainer');
         if (productsContainer) {
            productsContainer.innerHTML = ''; // Очищаем контейнер продуктов
         }
         ProductCatalogShow(result); // Отображаем каталог продуктов
      } else if (xhr.readyState == 4) { // Обработка ошибки запроса
         console.error("Error: " + xhr.status);
      }
   };
   // Отправляем данные формы
   xhr.send(formData);
};
// search nav hide, show rec and histrory viewed
const clearSearchTermNav = document.querySelector(".hidden_icon");
const searchTermNav = document.getElementById("search_nav_term");
const lastViewsContainer = document.getElementById("last_viewed_search_nav");
const recommedContainer = document.querySelector(".recommended_container");
const SearchContainer = document.querySelector(".search_container");
if (clearSearchTermNav && searchTermNav && lastViewsContainer && recommedContainer && SearchContainer) {
   const searchNavForm = document.querySelector(".search_nav_form");
   // nav hide/show actions
   searchNavForm.addEventListener("submit", function (event) {
      event.preventDefault(); 
      if (searchTermNav.value) {
         SearchNav(searchTermNav.value); 
         lastViewsContainer.style.display = "none";
         recommedContainer.style.display = "none"; 
         SearchContainer.style.display = "flex";
      }
   });
   searchTermNav.addEventListener("input", function () {
      if (searchTermNav.value !== "") {
         clearSearchTermNav.style.display = "flex"; 
      } else {
         clearSearchTermNav.style.display = "none"; 
         lastViewsContainer.style.display = "block"; 
         recommedContainer.style.display = "block"; 
         SearchContainer.style.display = "none";
      }
   });
   clearSearchTermNav.addEventListener("click", function () {
      searchTermNav.value = ""; 
      clearSearchTermNav.style.display = "none"; 
      lastViewsContainer.style.display = "block"; 
      recommedContainer.style.display = "block";
      SearchContainer.style.display = "none";
   });
}
// notification function
let notificationTimeout;
function showNotification(message, hasClose = false) {
   const notification = document.getElementById('notification');
   const notificationMessage = document.getElementById('notification_message');
   const closeButton = document.getElementById('notification_close');
   notificationMessage.textContent = message;
   closeButton.classList.toggle('hidden', !hasClose);
   notification.classList.add('active');
   closeButton.addEventListener('click', hideNotification);
   document.getElementById('notification_ok').addEventListener('click', hideNotification);
   if (notificationTimeout) {clearTimeout(notificationTimeout);}
   notificationTimeout = setTimeout(hideNotification, 5000);
}
// hide notifcation
function hideNotification() {
   const notification = document.getElementById('notification');
   notification.classList.remove('active');
}

document.addEventListener('DOMContentLoaded', () => { 
    // cart popup toggle
   const handleCart = document.getElementById("open_cart");
   handleCart.addEventListener("click", function(){
      closeAllPopups();
      const cartPopup = new Popup(null, "popup_cart", "mask_cart", "close_cart", null);
      cartPopup.open();
   });
    
   // sort popup toggle
    const popupSortTrigger = document.querySelector(".dropdown_sort");
    if (popupSortTrigger) {
      const popupSortArrow = popupSortTrigger.querySelector('.arrow');
      popupSortTrigger.addEventListener("click", function(e){
         e.stopPropagation();
         closeAllPopups();
         const popupSort = new Popup(null, "popup_sort", null, null, popupSortTrigger);
         popupSortArrow.style.transform = "rotate(180deg)"
         popupSort.open();

         document.addEventListener("click", function(eventOutside) {
            const popupElement = document.getElementById("popup_sort");
            if (popupElement && !popupElement.contains(eventOutside.target) && eventOutside.target !== popupSortTrigger) {
               popupSortArrow.style.transform = "rotate(0deg)"
               popupSort.close();
            }
         }, { once: true }); 
      });
    }
    // filter popup toggle
    const popupFilterTrigger = document.getElementById("btn_filters");
    if(popupFilterTrigger){
      popupFilterTrigger.addEventListener("click", function(e){
         e.stopPropagation();
         closeAllPopups();
         const popupFilter = new Popup(null, "popup_filter", null, null, popupFilterTrigger);
         popupFilter.open();

         document.addEventListener("click", function(eventOutside) {
            const popupElement = document.getElementById("popup_filter");
            if (popupElement && !popupElement.contains(eventOutside.target) && eventOutside.target !== popupFilterTrigger) {
               popupFilter.close();
            }
         }, { once: true }); 
      });
    }
    // search popup toggle
    const popupSearchTrigger = document.getElementById("search_term");
    if(popupSearchTrigger){
      popupSearchTrigger.addEventListener("click", function(e){
         e.stopPropagation();
         closeAllPopups();
         const popupSearch = new Popup(null, "prod_popup_search", null, null, popupSearchTrigger);
         popupSearch.open();
         lastViewed();

         document.addEventListener("click", function(eventOutside) {
            const popupElement = document.getElementById("prod_popup_search");
            if (popupElement && !popupElement.contains(eventOutside.target) && eventOutside.target !== popupSearchTrigger) {
               popupSearch.close();
            }
         }, { once: true }); 

      });
    }
   //  search nav popup toggle
    const popupSearchTriggerNav = document.getElementById("button_nav_search");
    if(popupSearchTriggerNav){
      popupSearchTriggerNav.addEventListener("click", function(e){
         e.stopPropagation();
         closeAllPopups();
         const popupSearchNav = new Popup(null, "popup_search_nav", null, "btn_popup_nav_search_close", popupSearchTriggerNav);
         popupSearchNav.open();
         lastViewed();

         window.addEventListener("resize", function() { popupSearchNav.close();}, { once: true });

         document.addEventListener("click", function(eventOutside) {
            const popupElement = document.getElementById("popup_search_nav");
            if (popupElement && !popupElement.contains(eventOutside.target) && eventOutside.target !== popupSearchTriggerNav) {
               popupSearchNav.close();
            }
         }, { once: true }); 
      })
    }
   // mobile menu toggle
   const burgerMenuTrigger = document.getElementById("burger");
   const popupElement = document.getElementById("menu");
   const triggerSearchNav = document.getElementById("popup_search_nav");
   if (burgerMenuTrigger && popupElement) {
      let isMobile = window.innerWidth <= 800;
      function handleResize() {
         if (window.innerWidth > 800) {
               popupElement.style.display = "flex"; 
               isMobile = false;
         } else {
               popupElement.style.display = 'none';
               isMobile = true;
         }
      }
      window.addEventListener("resize", handleResize);
      handleResize();
      burgerMenuTrigger.addEventListener("click", function(e) {
         e.stopPropagation();
         if (isMobile) {
             if (popupElement.style.display === 'none') {
                 popupElement.style.display = 'flex';
             } else {
                 popupElement.style.display = 'none';
             }
             document.addEventListener("click", function(eventOutside) {
                 const clickedInsideMenu = popupElement.contains(eventOutside.target);
                 const clickedInsideSearchNav = triggerSearchNav && triggerSearchNav.contains(eventOutside.target);
                 if (!clickedInsideMenu && !clickedInsideSearchNav) {
                     popupElement.style.display = 'none';
                     if (triggerSearchNav) {
                         triggerSearchNav.style.display = 'none'; 
                     }
                 }
             }, { once: true });
         }
      });
   }
   if (triggerSearchNav) {
      triggerSearchNav.addEventListener("click", function(e) {
         e.stopPropagation(); 
      });
   }
    // range slider
    let rangeInput = document.querySelectorAll(".range-input input");
    let rangeText = document.querySelectorAll(".text-range div");
    let range = document.querySelector(".progress");
    let priceGap = 0;
    if (rangeInput && rangeText && range) {
       let priceMax = parseInt(rangeInput[0].max);
       const minPriceInput = document.getElementById('minPrice');
       const maxPriceInput = document.getElementById('maxPrice');
       function updateRange(minVal, maxVal) {
          if (maxVal - minVal < priceGap) {
             if (event.target.className === "range-min") {
                minVal = rangeInput[0].value = maxVal - priceGap;
             } else {
                maxVal = rangeInput[1].value = minVal + priceGap;
             }
          }
          // Обновление стиля прогресса и текстовых значений диапазона
          range.style.left = (minVal / priceMax) * 100 + "%";
          range.style.right = 100 - (maxVal / priceMax) * 100 + "%";
          rangeText[0].style.left = (minVal / priceMax) * 100 + "%";
          rangeText[1].style.right = 100 - (maxVal / priceMax) * 100 + "%";
          // Обновление значений в полях ввода минимальной и максимальной цены
          minPriceInput.value = minVal;
          maxPriceInput.value = maxVal;
          rangeText[0].innerText = minVal.toLocaleString();
          rangeText[1].innerText = maxVal.toLocaleString();
       }
       // Событие для обновления диапазона при изменении значений слайдера
       rangeInput.forEach((input) => {
          input.addEventListener("input", (e) => {
             let minVal = parseInt(rangeInput[0].value);
             let maxVal = parseInt(rangeInput[1].value);
             updateRange(minVal, maxVal);
          });
       });
       // Событие для обновления диапазона при изменении значений в полях ввода минимальной и максимальной цены
       [minPriceInput, maxPriceInput].forEach((input) => {
          input.addEventListener("input", (e) => {
             let minVal = parseInt(minPriceInput.value) || rangeInput[0].min;
             let maxVal = parseInt(maxPriceInput.value) || priceMax;
             // Проверяем, чтобы новые значения не выходили за пределы диапазона и учитывали минимальный промежуток
             if (maxVal - minVal >= priceGap && maxVal <= priceMax && minVal >= rangeInput[0].min) {
                rangeInput[0].value = minVal;
                rangeInput[1].value = maxVal;
                updateRange(minVal, maxVal);
             }
          });
       });
    }     
});
