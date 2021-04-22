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

if ( !empty( $data['buttonurl']['url'] ) ) {
	$attr  = 'href="' . $data['buttonurl']['url'] . '"';
	$attr .= !empty( $data['buttonurl']['is_external'] ) ? ' target="_blank"' : '';
	$attr .= !empty( $data['buttonurl']['nofollow'] ) ? ' rel="nofollow"' : '';
	
}
if ( !empty( $data['buttontext'] ) ) {
	$btn = '<a class="light-button" ' . $attr . '>' . $data['buttontext'] . '</a>';
}

?>
<div class="rt-el-cta cta-<?php echo esc_attr( $data['style'] ); ?>">
	<div class="rtin-item-content" data-tilt>
		<div class="about-image">
			<?php if ( !empty( $data['image']['id'] ) ) { 
				echo wp_get_attachment_image( $data['image']['id'], 'full' ); 
			} else { 
				echo '<img class="wp-post-image" src="' . ClenixTheme_Helper::get_img( 'noimage_610X580.jpg' ) . '" alt="'.get_the_title().'">';
			} ?>				
		</div>
		<div class="cta-content">
			<h2 class="rtin-title"><?php echo wp_kses_post( $data['title'] );?></h2>
			<?php if ( !empty( $data['content'] )) { ?>
			<h4><?php echo wp_kses_post( $data['content'] );?></h4>
			<?php } ?>
			<?php if ( $btn ) { ?>
				<div class="rtin-button"><?php echo wp_kses_post( $btn );?></div>		
			<?php } ?>
		</div>
	</div>
</div>