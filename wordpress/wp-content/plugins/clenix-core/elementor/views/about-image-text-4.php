<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

namespace radiustheme\Clenix_Core;

use ClenixTheme;
use ClenixTheme_Helper;
use \WP_Query;

$btn = $attr = '';

if ( !empty( $data['one_buttonurl']['url'] ) ) {
	$attr  = 'href="' . $data['one_buttonurl']['url'] . '"';
	$attr .= !empty( $data['one_buttonurl']['is_external'] ) ? ' target="_blank"' : '';
	$attr .= !empty( $data['one_buttonurl']['nofollow'] ) ? ' rel="nofollow"' : '';
	
}
if ( $data['button_style'] == 'clenix-button-1' ) {
	if ( !empty( $data['button_one'] ) ) {
		$btn = '<a class="clenix-button-1" ' . $attr . '>' . $data['button_one'] . '</a>';
	}
} else {
	if ( !empty( $data['button_one'] ) ) {
		$btn = '<a class="clenix-button-2" ' . $attr . '>' . $data['button_one'] . '</a>';
	}
}

?>

<div class="about-image-text about-layout-<?php echo esc_attr( $data['style'] ); ?>">
	<div class="single-item">
		<?php if ( !empty( $data['image']['id'] ) ) { 
			echo wp_get_attachment_image( $data['image']['id'], 'full' ); 
		 } else { 
			echo '<img class="wp-post-image" src="' . ClenixTheme_Helper::get_img( 'noimage_1210X723.jpg' ) . '" alt="'.get_the_title().'">';
		} ?>	
	</div>
	<div class="single-item">
		<div class="about-content">
			<?php if ( !empty( $data['title'] ) ) { ?>
			<h2 class="rtin-title"><?php echo wp_kses_post( $data['title'] );?></h2>
			<?php } ?>
			<?php if ( !empty( $data['sub_title'] ) ) { ?>
			<span class="sub-rtin-title"><?php echo wp_kses_post( $data['sub_title'] );?></span>
			<?php } ?>
			<div class="rtin-content"><?php echo wp_kses_post( $data['content'] );?></div>
			<?php if ( $data['button_display']  == 'yes' ) { ?>
			<?php if ( $btn ) { ?>
			<div class="rtin-button"><?php echo wp_kses_post( $btn );?></div>
			<?php } ?>
			<?php } ?>
		</div>
	</div>
</div>