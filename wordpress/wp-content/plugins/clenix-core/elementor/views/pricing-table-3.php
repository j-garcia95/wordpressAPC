<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

use radiustheme\Lib\WP_SVG;


if( !empty( $data['price'] )){
	$price_html  = '<span class="price-symbol">' . $data['price_symbol'] . '</span>' . $data['price'] . '<span class="price-unit"> / '. $data['unit'] . '</span>';
} else {
	$price_html = '';
}

$attr = '';
if ( !empty( $data['url']['url'] ) ) {
	$attr  = 'href="' . $data['url']['url'] . '"';
	$attr .= !empty( $data['url']['is_external'] ) ? ' target="_blank"' : '';
	$attr .= !empty( $data['url']['nofollow'] ) ? ' rel="nofollow"' : '';
	$title = '<a ' . $attr . '>' . $data['title'] . '</a>';
	
}

if ( !empty( $data['buttontext'] ) ) {
	$btn = '<a class="clenix-button-1" ' . $attr . '>' . $data['buttontext'] . '</a>';
}

// icon , image
if ( $data['icontype'] == 'icon' || $data['icontype'] == 'image' ) {
	$size = CLENIX_CORE_THEME_PREFIX . '-size2';
	if ( $attr ) {
		$img = '<a ' . $attr . '>' . wp_get_attachment_image( $data['image']['id'], $size ) . '</a>';
	}
	else {
		$img = wp_get_attachment_image( $data['image']['id'], $size );
	}
}

?>

<div class="default-pricing rtin-pricing-<?php echo esc_attr( $data['layout'] );?> <?php echo esc_attr( $data['display_active'] );?> <?php echo esc_attr( $data['offer_active'] );?>">		
	<div class="rt-price-table-box">
		<?php if ( $data['offer_active'] == 'offer-active' ){ ?>
		<div class="popular-offer">
		<div class="offer"><?php echo esc_html( $data['offertext'] );?></div>
		<div class="popular-shape"></div>
		</div>
		<?php } ?>
		
		<div class="price-header">
			<?php if ( !empty( $data['title'] )) { ?>
			<h3 class="rtin-title"><?php echo esc_html( $data['title'] );?></h3>
			<?php } ?>
		</div>
		<div class="rtin-pricing-price">
			<span class="rtin-price"><?php echo wp_kses_post( $price_html );?></span>
		</div>
		<ul>
		<?php foreach ( $data['features'] as $feature ): ?>
			<li><?php echo esc_html( $feature );?></li>
		<?php endforeach; ?>
		</ul>		
		
		<?php if ( !empty( $btn ) ){ ?>
				<div class="rtin-price-button"><?php echo wp_kses_post( $btn );?></div>		
			<?php } ?>
			
			
	</div>			
</div>