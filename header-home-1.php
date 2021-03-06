<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package storefront
 */

?><!doctype html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=2.0">
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <!-- Add the slick-theme.css if you want default styling -->
    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/wow/1.1.2/wow.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.2/animate.min.css" >

    <script>
        const home_url = "<?= home_url() ?>";
        new WOW().init();
    </script>
    <?php
    ?>
    <?php wp_head(); ?>
</head>

<div class="wrap-cart-side">
    <?= get_html_popup_cart(true) ?>
</div>

<body <?php body_class(); ?>>

<?php do_action( 'storefront_before_site' ); ?>
<?php
$class = [];
$action = 'storefront_header_full_home_1';
if (is_page_template('templates/template-home1.php')) {
    $class[] = 'one-page';
    $action = 'storefront_header_home_1';
}
?>

<div id="page" class="hfeed site home-page-1 <?= implode(' ', $class) ?>">
    <header id="masthead" class="site-header" role="banner" style="<?php storefront_header_styles(); ?>">
        <div class="container">
            <div class="col-full">
                <div class="menu-desktop">
                    <?php
                        do_action( $action );
                    ?>
                </div>
                <div class="hamburger-menu">
                    <div class="bar"></div>
                </div>

                <div class="menu-mobile">
                    <div class="wrapper-menu">
                   
                        <?php
                           do_action( $action );
                           if (is_page_template('templates/template-home1.php')) {
                            storefront_slider_header();
                           }
                        ?>
                        <?php
                        storefront_mobile_footer_widgets();
                        ?>
                        <a class="my-account" href="<?= home_url('login') ?>"><span><span>My Account</span><img src="<?php bloginfo('template_url'); ?>/assets/images/icon/user.png"  alt="#"/></span></a>
                        <a class="my-account my-wishlist" href="<?= home_url('wishlist') ?>"><span>My wishlist</span><span class="block-like"></span></a>
                        <div class="ugd">shop in <b>SGD</b><a href="#">change</a></div>
                        <div class="block footer-widget-3">
                            <div id="custom_html-3" class="widget_text widget widget_custom_html">
                                <div class="textwidget custom-html-widget">
                                    <div class="get-social">get social</div>
                                    <div class="block-social-footer">
                                        <ul>
                                            <li>
                                                <a>
                                                    <i class="fab fa-facebook-f"></i>
                                                </a>
                                            </li>
                                            <li><a><i class="fab fa-instagram"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="new-letter-mb">
                            <?php
                            storefront_mobile_footer_widgets();
                            ?>
                        </div>
                        
                    </div>
                    <div class="hamburger-menu close">
                        <div class="bar animate"></div>
                    </div>
                </div>

            </div>
        </div>
    </header><!-- #masthead -->

    <!--    Product search-->

    <div class="wrap-search-product <?= isset($_GET['action']) && $_GET['action'] == 'search' ? 'show' : '' ?>">
        <div class="wrap-block-search">
            <div class="block-search">
                <span class="close"><i class="icon ion-md-close"></i></span>
                <input type="text" class="js-input-search" name="search" autocomplete="off">
                <div class="js-result-empty" style="display: none; font-weight: 600; padding-top: 5px;">
                    No results for "<span></span>"
                </div>
            </div>
        </div>

        <div class="block-content">
            <div class="block-content--main" style="display: none">
               
            </div>
            <div class="block-content--action" style="display: none">
                <a href="#" class="js-btn-search"><?= esc_html('View all products', 'storefront') ?></a>
            </div>
        </div>
    </div>
    <!--  end  -->

    <?php
    /**
     * Functions hooked in to storefront_before_content
     *
     * @hooked storefront_header_widget_region - 10
     * @hooked woocommerce_breadcrumb - 10
     */
    ?>

    <div id="content" class="site-content" tabindex="-1">
        <div class="block-content">

<?php
//do_action( 'storefront_content_top' );
