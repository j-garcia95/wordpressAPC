<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

?>
<div class="product-thumb-area">
	<?php
	global $product;
	woocommerce_show_product_loop_sale_flash();?>
	<a href="<?php the_permalink(); ?>"><?php
	woocommerce_template_loop_product_thumbnail();
	?></a>
	<?php if ( ClenixTheme::$options['wc_product_hover'] ): ?>
		<div class="product-info">
			<ul>
				<li><?php woocommerce_template_loop_add_to_cart(); ?></li>
				<?php if ( function_exists( 'YITH_WCQV_Frontend' ) && ClenixTheme::$options['wc_quickview_icon'] ): ?>
					<li><a href="" class="yith-wcqv-button" data-product_id="<?php echo esc_attr( $product->get_id() );?>"><i class="fa fa-search"></i></a></li>
				<?php endif; ?>
				<?php if ( class_exists( 'YITH_WCWL_Shortcode' ) && ClenixTheme::$options['wc_wishlist_icon'] ) { ?>
					<?php
					$args = array(
						'browse_wishlist_text' => '<i class="fa fa-check"></i>',
						'already_in_wishslist_text' => '',
						'product_added_text' => '',
						'icon' => 'fa-heart-o',
						'label' => '',
						'link_classes' => 'add_to_wishlist single_add_to_wishlist alt wishlist-icon',
					);
					?>
					<li><?php echo YITH_WCWL_Shortcode::add_to_wishlist( $args );?> </li>
					<li><?php echo do_shortcode( '[yith_compare_button]' ); ?> </li>					
				<?php } ?>
			</ul>			
		</div>
	<?php endif; ?>
</div>