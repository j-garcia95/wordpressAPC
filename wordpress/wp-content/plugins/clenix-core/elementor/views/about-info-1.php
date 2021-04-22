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
<div class="about-info-text about-info-<?php echo esc_attr( $data['style'] ); ?>">
	<?php if ( !empty( $data['title'] ) ) { ?>
		<h2 class="rtin-title"><?php echo wp_kses_post( $data['title'] );?></h2>
	<?php } ?>
	<div class="content-wrap">
		<?php if ( !empty( $data['image']['id'] ) ) { 
			echo wp_get_attachment_image( $data['image']['id'], 'full' ); 
		 } else { 
			echo '<img class="wp-post-image" src="' . ClenixTheme_Helper::get_img( 'noimage_400X400.jpg' ) . '" alt="'.get_the_title().'">';
		} ?>				
		<div class="about-content">
			<?php if ( !empty( $data['name'] ) ) { ?>
			<h3 class="rtin-name"><?php echo wp_kses_post( $data['name'] );?></h3>
			<?php } ?>
			<?php if ( !empty( $data['content'] ) ) { ?>
			<div class="rtin-content"><?php echo wp_kses_post( $data['content'] );?></div>
			<?php } ?>
		</div>
	</div>
</div>