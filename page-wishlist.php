<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package storefront
 */
$products =  [];
if (!is_user_logged_in()) {
    header('location: ' . home_url('login?cb=' . home_url('wishlist')));
}

$products = get_products_by_bookmark();

$html_empty_row = '  <div class="wrap-block-empty">
                            <div class="block-message">
                                <p>You\'ve not added any products into your wishlist yet.</p>
                            </div>                
                            <div class="block-button">
                                <a href="'.home_url('derma-rx').'">Continue shopping</a>
                            </div>
                        </div>
                          <style type="text/css">
                            .wrap-block-empty {
                                text-align: center;
                                padding: 10px 0;
                                height: 200px;
                            }

                            .block-message {
                                font-size: 20px;
                            }
                        </style>';

get_header('home-1'); ?>
	<div id="primary" class="content-area">
		<main id="main" class="site-main page-wishlist" role="main">
            <div class="container">
                <?php get_breadcrumb() ?>
            <ul class="products columns-4">
                <div class="loop-main-product" id="product_main">
                    <?php
                    if (!empty($products)) {
                        foreach ($products as $product) {
                            $thumbnail_url = get_the_post_thumbnail_url($product->get_id());
                        ?>
                            <li class="wrap-product-item product type-product">
                                <i class="ion ion-md-close-circle icon-close js-btn-close" data-product_id="<?= $product->get_id() ?>"></i>
                                <a href="<?= esc_url($product->get_permalink()) ?>" class="woocommerce-LoopProduct-link woocommerce-loop-product__link">
                                    <img src="<?= esc_url($thumbnail_url) ?>" alt="<?= esc_url($product->get_permalink()) ?>">
                                    <h2 class="woocommerce-loop-product__title">
                                        <?= $product->get_title() ?>
                                    </h2>
                                    <span class="price">
                                        <?= wc_price($product->get_price()) ?>
                                    </span>
                                </a>
                                <div class="wrap-cart">
                                    <form class="increse-decrease fm-sl-cart proccessing" data-product_id="<?= $product->get_id() ?>">
                                        <div class="wrap-block wrap-init">
                                            <div class="lb-btn js-cart-btn" data-val="1" id="increase" value="Increase Value"><?= esc_html__('Add to cart', 'storefront') ?></div>
                                        </div>
                                        <div class="wrap-block wrap-proccess">
                                            <div class="value-button js-cart-btn" data-val="-1" id="decrease" value="Decrease Value">
                                                <i class="icon ion-md-remove"></i>
                                            </div>
                                            <div class="block-number">
                                                <div id="number"><div class="val"><?= get_quality_product_cart($product->get_id()) ?></div></div>
                                            </div>
                                            <div class="value-button js-cart-btn" data-val="1" id="increase" value="Increase Value">
                                                <i class="icon ion-md-add"></i>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <?php 
                                $check =$product->get_manage_stock() && (intval($product->get_low_stock_amount()) - intval($product->get_stock_quantity())) >= 0;

                                if ($check): ?>
                                <div class="stock">
                                    <div class="wrapper">
                                        <span><i class="ion ion-ios-information-circle"></i></span>
                                        <span class="text"><?= esc_html__('Low in stock', 'storefornt') ?></span>
                                    </div>
                                </div>
                                <?php endif; ?>
                            </li>
                        <?php
                        }
                    }
                    else {
                        echo $html_empty_row;
                    }
                    ?>

                </div>
            </ul>

            <?php 
            echo render_php('views/common/back-to-shopping.php');
            ?>
            <?php

            echo render_php('views/cart/relate-product.php', [
                'title' => get_field('title'),
                'description' => get_field('description'),
                'relate_product' => get_user_bookmark()
            ]);
            ?>
            </div>
		</main><!-- #main -->
	</div><!-- #primary -->
    <script>
        (function($){
            if ($('.js-btn-close').length) {
                let proccessing = false;
                $('.js-btn-close').on('click', function() {
                    if (!proccessing) {
                        proccessing = true;
                        try {
                            const self = this;
                            const product_id = $(self).data('product_id');
                            const url = `${my_ajax_object.ajax_url}?action=action_book_mark&post_id=${product_id}`;
                            $.get(url, function(res) {
                                if (res == -1) {
                                    const parent = $(self).parents('li.product');
                                    parent.hide(500, function () {
                                        parent.remove();

                                        if ($('#product_main .wrap-product-item').length == 0) {
                                            $('#product_main').html(`<?= $html_empty_row ?>`);
                                        }
                                    });
                                }
                                proccessing = false;
                            });
                        } catch(e) {
                            proccessing = false;
                        }
                    }
                });
            }
        })(jQuery); 
    </script>
<?php
get_footer('home-1');
