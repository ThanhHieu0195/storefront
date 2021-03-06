<?php
/**
 * The template for displaying product content in the single-product.php template
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-single-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 3.6.0
 */

defined( 'ABSPATH' ) || exit;
    global $product;
global $wp;
/**
 * Hook: woocommerce_before_single_product.
 *
 * @hooked wc_print_notices - 10
 */
do_action( 'woocommerce_before_single_product' );
if ( post_password_required() ) {
	echo get_the_password_form(); // WPCS: XSS ok.
	return;
}
?>
<div id="product-<?php the_ID(); ?>" <?php wc_product_class( '', $product ); ?>>
	<div class="container">
		<?php
		/**
		 * Hook: woocommerce_before_single_product_summary.
		 *
		 * @hooked woocommerce_show_product_sale_flash - 10
		 * @hooked woocommerce_show_product_images - 20
		 */
		do_action( 'woocommerce_before_single_product_summary' );
		?>

		<div class="summary entry-summary">
			<?php
			/**
			 * Hook: woocommerce_single_product_summary.
			 *
			 * @hooked woocommerce_template_single_title - 5
			 * @hooked woocommerce_template_single_rating - 10
			 * @hooked woocommerce_template_single_price - 10
			 * @hooked woocommerce_template_single_excerpt - 20
			 * @hooked woocommerce_template_single_add_to_cart - 30
			 * @hooked woocommerce_template_single_meta - 40
			 * @hooked woocommerce_template_single_sharing - 50
			 * @hooked WC_Structured_Data::generate_product_data() - 60
			 */
			do_action( 'woocommerce_single_product_summary' );
			?>
			<div class="block-bookmark">
				<div onclick="onClickLike(this)" class="block-like <?= get_class_the_bookmark() ?>" data-id="<?= get_the_ID() ?>">
					<i class="far fa-heart"></i>
				</div>
				<div class="block-share">
					<i class="fas fa-share-alt"></i>
					<div class="block-share--conent">
						<ul>
							<li>
								<a class="icon-fb" href="https://www.facebook.com/sharer/sharer.php?u=<?= home_url( $wp->request ) ?>"><i class="fab fa-facebook-f"></i></a>
							</li>
							<li>
								<a class="icon-tt" href="https://twitter.com/home?status=<?= home_url( $wp->request ) ?>"><i class="fab fa-twitter"></i></a>
							</li>
							<li>
								<a class="icon-gg" href="https://plus.google.com/share?url=<?= home_url( $wp->request ) ?>"><i class="fab fa-google-plus-g"></i></a>
							</li>
						</ul>
					</div>
				</div>
			</div>
		</div>	
		<?php
		/**
		 * Hook: woocommerce_after_single_product_summary.
		 *
		 * @hooked woocommerce_output_product_data_tabs - 10
		 * @hooked woocommerce_upsell_display - 15
		 * @hooked woocommerce_output_related_products - 20
		 */
		do_action( 'woocommerce_after_single_product_summary' );
		?>
	</div>
</div>

<script type="text/javascript">
	function onClickLike(e) {
		const $e = jQuery(e);
		const post_id = $e.data('id');
		const ajax_url = my_ajax_object.ajax_url;
		jQuery.get(`${ajax_url}?action=action_book_mark&post_id=${post_id}`, function(res) {
			if (res == 0) {
				console.log('feature for account login');
			}

			if (res == 1) {
				$e.addClass('bookmark');
			} 

			if (res == -1) {
				$e.removeClass('bookmark');
			} 
		});
	}
</script>

<?php do_action( 'woocommerce_after_single_product' ); ?>
