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


?>
<div class="rt-image">
	<div class="rt-image-one js-tilt">
		<?php if ( !empty( $data['image_one']['id'] ) ) { 
			echo wp_get_attachment_image( $data['image_one']['id'], 'full' ); 
		 } else { 
			echo '<img class="wp-post-image" src="' . ClenixTheme_Helper::get_img( 'noimage_400X400.jpg' ) . '" alt="'.get_the_title().'">';
		} ?>				
	</div>
	<div class="rt-image-two js-tilt">
		<?php if ( !empty( $data['image_two']['id'] ) ) { 
			echo wp_get_attachment_image( $data['image_two']['id'], 'full' ); 
		 } else { 
			echo '<img class="wp-post-image" src="' . ClenixTheme_Helper::get_img( 'noimage_400X400.jpg' ) . '" alt="'.get_the_title().'">';
		} ?>				
	</div>
	<div class="rt-image-three js-tilt">
		<?php if ( !empty( $data['image_three']['id'] ) ) { 
			echo wp_get_attachment_image( $data['image_three']['id'], 'full' ); 
		 } else { 
			echo '<img class="wp-post-image" src="' . ClenixTheme_Helper::get_img( 'noimage_400X400.jpg' ) . '" alt="'.get_the_title().'">';
		} ?>				
	</div>
</div>