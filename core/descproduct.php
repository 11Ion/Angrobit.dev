<template id="desc-product-template">
    <div class="popup_preview" id="preview_product_description">
        <div id="preview_product_close" class="mask"></div>
            <div class="content">
                <span class="border border_t_left"></span>
                <span class="border border_b_left"></span>
                <span class="border border_b_right"></span>

                <button class="botton_close" id="preview_product_close_btn"><img src="../../assets/images/home/close_icon_2.svg" alt="close"></button>

                <div class="left_content">
                    <canvas class="model2"></canvas>
                    <span class="platform_bottom_preview"></span>
                    <span class="bg"></span>
                    <span class="floor"></span>
                    <button class="button_buy" id="btn_add_to_cart_preview" onclick="addtocard();">
                        <span class="text">ADD TO CART</span>
                        <span class="arrow"> <img src="../../assets/images/home/icon_arrow.svg" alt="arrow"> </span>
                    </button>
                </div>
                                    
                <div class="right_content" id="right_content_desc">
                    <div class="inner_container">
                        <div class="product_header">
                            <div class="container_image_product">
                                <img src="../../assets/images/home/shirt1.png" alt="title" id="desc_image">
                            </div>
                        <p class="name" id="name_product_preview"></p>
                        <p class="price"><span>$</span> <span id="price_product_price"></span></p>
                    </div>
                    <div class="line"></div>
                    <div class="product_description">
                        <div class="product_sizing">
                            <p class="title_selector">Size <button class="size_chart">Size chart</button></p>
                            <div class="sizes_box">
                                <span class="name" id="sizes_name"></span>
                            </div>
                        </div>
                        <div class="product_colors">
                            <p class="title_selector">Color</p> 
                            <div class="colors_box">
                                <label>
                                    <input type="radio" name="color_preview" disabled checked="" value="">
                                    <span style="background: " id="id_coclor_desc" class="color"></span>
                                </label>
                            </div>
                        </div>
                        <div class="line"></div>
                        <div class="product_description">
                            <p class="title"> Description </p>
                            <p class="desc_product" id="descproduct"></p>
                        </div>

                        <div class="product_material">
                            <p class="title_selector">Material</p>

                            <div class="material_box" id="material">
                                <span class="material_bg"></span>
                                <p class="name_material"></p>
                            </div>
                        </div>
                        <div class="product_benefis">
                            <p class="title_selector">Benefits</p>
                            <ul class="items" id="benefici">
                                
                            </ul>
                            <div class="line"></div>
                        </div>
                        <div class="designer_signature">
                            <p class="text">Art & Graphic Design: Musteață Anastasia</p>
                            <div class="signature">
                                <img src="../../assets/images/home/signature.svg" alt="signature">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="sizing_chart_container" style="display: none;">
                <div class="sizing_chart_inner_container">
                    <div class="header_sizing_chart">
                        <h3 class="title">
                            Size Chart
                        </h3>
                        <button id="back_sizing_chart">
                            <img src="../../assets/images/home/icon_back.svg" alt="icon back">
                        </button>
                    </div>
                    <div class="line"></div>
                    <div class="controlls_sizes">
                        <p class="text">Switch to</p>
                        <div class="container_buttons">
                            <button id="dropdown_us_size">
                                US size
                                <!-- <span class="arrow">
                                    <img src="../../assets/images/home/icon_arrow.svg" alt="arrow">
                                </span> -->
                            </button>

                            <button id="dropdown_cm_size">
                                CM size
                                <!-- <span class="arrow">
                                    <img src="../../assets/images/home/icon_arrow.svg" alt="arrow">
                                </span> -->
                            </button>
                        </div>
                    </div>
                    <div class="size_table">
                        <div class="size_table_row header_row">
                            <div class="size_table_cell" style="border-bottom: none;"></div>
                            <div class="size_table_cell">US</div>
                            <div class="size_table_cell">Bust</div>
                            <div class="size_table_cell">Waist</div>
                            <div class="size_table_cell">Hips</div>
                            <div class="size_table_cell">Height</div>
                        </div>
                        <div class="size_table_row">
                            <div class="size_table_cell">S</div>
                            <div class="size_table_cell">4</div>
                            <div class="size_table_cell">33.9-35.5</div>
                            <div class="size_table_cell">26-27.6</div>
                            <div class="size_table_cell">35.9-37.4</div>
                            <div class="size_table_cell">5'5"-5'7"</div>
                        </div>
                        <div class="size_table_row">
                            <div class="size_table_cell">M</div>
                            <div class="size_table_cell">6</div>
                            <div class="size_table_cell">35.5-37</div>
                            <div class="size_table_cell">27.6-29.2</div>
                            <div class="size_table_cell">37.4-39</div>
                            <div class="size_table_cell">5'7"-5'9"</div>
                        </div>
                        <div class="size_table_row">
                            <div class="size_table_cell">L</div>
                            <div class="size_table_cell">8/10</div>
                            <div class="size_table_cell">37.4-39.8</div>
                            <div class="size_table_cell">29.6-31.9</div>
                            <div class="size_table_cell">44.1-46.5</div>
                            <div class="size_table_cell">5'11"-6'1"</div>
                        </div>
                        <div class="size_table_row">
                            <div class="size_table_cell">XL</div>
                            <div class="size_table_cell">12</div>
                            <div class="size_table_cell">39.8-42.2</div>
                            <div class="size_table_cell">31.9-34.3</div>
                            <div class="size_table_cell">41.8-44.1</div>
                            <div class="size_table_cell">5'9"-5'11"</div>
                        </div>
                        <div class="size_table_row">
                            <div class="size_table_cell">2XL</div>
                            <div class="size_table_cell">14</div>
                            <div class="size_table_cell">42.2-44.5</div>
                            <div class="size_table_cell">34.3-36.6</div>
                            <div class="size_table_cell">44.1-46.5</div>
                            <div class="size_table_cell">5'11"-6'1"</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template> 