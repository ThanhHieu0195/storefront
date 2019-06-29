<?php

class LoopProductItemHelper {
    static function renderHtmlAddToCart($product) {
        $textButton = esc_html__('Add to cart', 'storefront');
        $productId = get_the_ID();
        $total = get_item_quantity($productId);
        $class = $total > 0 ? 'proccessing' : '';
        return <<< HTML
    <div class="wrap-cart">
         <form class="increse-decrease fm-sl-cart $class" data-product_id="$productId">
            <div class="wrap-init">
              <div class="lb-btn">Add to cart</div>
              <div class="value-button js-cart-btn" data-val="1" value="Increase Value">
                    <i class="icon ion-md-add"></i>  
                </div>
            </div>
            <div class="wrap-proccess">
                 <div class="value-button js-cart-btn" data-val="-1" id="decrease" value="Decrease Value">
                     <i class="icon ion-md-remove"></i> 
                </div>
                <div class="block-number">
                                <input type="number" id="number" name="number" value="$total" readonly/>

                </div>
                <div class="value-button js-cart-btn" data-val="1" value="Increase Value">
                    <i class="icon ion-md-add"></i>  
                </div>
            </div>
        </form>
</div>
HTML;

    }
}