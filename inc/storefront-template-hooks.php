<?php
/**
 * Storefront hooks
 *
 * @package storefront
 */

/**
 * General
 *
 * @see  storefront_header_widget_region()
 * @see  storefront_get_sidebar()
 */
add_action( 'storefront_before_content', 'storefront_header_widget_region', 10 );
add_action( 'storefront_sidebar', 'storefront_get_sidebar', 10 );

/**
 * Header
 *
 * @see  storefront_skip_links()
 * @see  storefront_secondary_navigation()
 * @see  storefront_site_branding()
 * @see  storefront_primary_navigation()
 */
add_action( 'storefront_header', 'storefront_header_container', 0 );
add_action( 'storefront_header', 'storefront_skip_links', 5 );
add_action( 'storefront_header', 'storefront_site_branding', 20 );
add_action( 'storefront_header', 'storefront_secondary_navigation', 30 );
add_action( 'storefront_header', 'storefront_header_container_close', 41 );
add_action( 'storefront_header', 'storefront_primary_navigation_wrapper', 42 );
add_action( 'storefront_header', 'storefront_primary_navigation', 50 );
add_action( 'storefront_header', 'storefront_primary_navigation_wrapper_close', 68 );


/**
 * hook header home 1
 */
add_action( 'storefront_header_full_home_1', 'storefront_site_branding', 20 );
add_action( 'storefront_header_full_home_1', 'storefront_slider_header', 30 );
add_action( 'storefront_header_full_home_1', 'storefront_site_action', 40 );

add_action( 'storefront_header_home_1', 'storefront_site_branding', 20 );
add_action( 'storefront_header_home_1', 'storefront_site_action', 40 );


/**
 * Footer
 *
 * @see  storefront_footer_widgets()
 * @see  storefront_credit()
 */
add_action( 'storefront_footer', 'storefront_footer_widgets', 10 );
add_action( 'storefront_footer', 'storefront_credit', 20 );


/**
 * Footer home 1
 */

add_action( 'storefront_footer_home_1', 'storefront_footer_widgets', 10 );

/**
 * Homepage
 *
 * @see  storefront_homepage_content()
 */
add_action( 'homepage', 'storefront_homepage_content', 10 );

/**
 * Posts
 *
 * @see  storefront_post_header()
 * @see  storefront_post_meta()
 * @see  storefront_post_content()
 * @see  storefront_paging_nav()
 * @see  storefront_single_post_header()
 * @see  storefront_post_nav()
 * @see  storefront_display_comments()
 */
add_action( 'storefront_loop_post', 'storefront_post_header', 10 );
add_action( 'storefront_loop_post', 'storefront_post_content', 30 );
add_action( 'storefront_loop_post', 'storefront_post_taxonomy', 40 );
add_action( 'storefront_loop_after', 'storefront_paging_nav', 10 );
add_action( 'storefront_single_post', 'storefront_post_header', 10 );
add_action( 'storefront_single_post', 'storefront_post_content', 30 );
add_action( 'storefront_single_post_bottom', 'storefront_edit_post_link', 5 );
add_action( 'storefront_single_post_bottom', 'storefront_post_taxonomy', 5 );
add_action( 'storefront_single_post_bottom', 'storefront_post_nav', 10 );
add_action( 'storefront_single_post_bottom', 'storefront_display_comments', 20 );
add_action( 'storefront_post_header_before', 'storefront_post_meta', 10 );
add_action( 'storefront_post_content_before', 'storefront_post_thumbnail', 10 );

/**
 * Pages
 *
 * @see  storefront_page_header()
 * @see  storefront_page_content()
 * @see  storefront_display_comments()
 */
add_action( 'storefront_page', 'storefront_page_header', 10 );
add_action( 'storefront_page', 'storefront_page_content', 20 );
add_action( 'storefront_page', 'storefront_edit_post_link', 30 );
add_action( 'storefront_page_after', 'storefront_display_comments', 10 );

/**
 * Homepage Page Template
 *
 * @see  storefront_homepage_header()
 * @see  storefront_page_content()
 */
add_action( 'storefront_homepage', 'storefront_homepage_header', 10 );
add_action( 'storefront_homepage', 'storefront_page_content', 20 );


// Custom
add_action( 'widgets_init', function(){
    register_widget( 'PageWidget' );
});

add_filter('body_class', function($class) {
    preg_match('/\/([a-zA-Z0-9]*)\/?\//', $_SERVER['REQUEST_URI'], $matches);
    if (count($matches) == 2) {
        $class[] = 'storefront-'.$matches[1];
    }
    return $class;
});