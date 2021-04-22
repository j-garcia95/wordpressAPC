<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

namespace radiustheme\Clenix_Core;
use ClenixTheme_Helper;

$btn = $attr = '';

if ( !empty( $data['buttonurl']['url'] ) ) {
	$attr  = 'href="' . $data['buttonurl']['url'] . '"';
	$attr .= !empty( $data['buttonurl']['is_external'] ) ? ' target="_blank"' : '';
	$attr .= !empty( $data['buttonurl']['nofollow'] ) ? ' rel="nofollow"' : '';
	
}

?>
<div class="rt-video video-<?php echo esc_attr( $data['style'] );?>">
	<div class="rtin-video">
		<div class="item-video">
			<a class="rtin-play rt-video-popup" href="<?php echo esc_url( $data['videourl']['url'] );?>"><i class="flaticon-play-arrow"></i><?php echo wp_kses_post( $data['buttontext'] ); ?></a>
		</div>
		<div class="item-img">
		<?php if ( !empty( $data['image_one']['id'] ) ) { 
			echo wp_get_attachment_image( $data['image_one']['id'], 'full' ); 
		} else {
			echo '<img class="wp-post-image" src="' . ClenixTheme_Helper::get_img( 'noimage_620X672.jpg' ) . '" alt="'.get_the_title().'">';
		} ?>
		</div>
	</div>
</div>