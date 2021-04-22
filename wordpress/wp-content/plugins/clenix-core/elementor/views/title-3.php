<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

namespace radiustheme\Clenix_Core;

use radiustheme\Lib\WP_SVG;

?>
<div class="sec-title <?php echo esc_attr( $data['style'] ); ?> <?php echo esc_attr( $data['title_align'] ); ?> <?php echo esc_attr( $data['showhide'] ); ?>">
	<div class="sec-title-holder">
		<?php if( !empty ( $data['sub_title'] ) ) { ?>
		<p class="sub-title"><?php echo wp_kses_post( $data['sub_title'] ); ?></p>
		<?php } ?>
		<h2 class="rtin-title"><?php echo wp_kses_post( $data['title'] ); ?><?php if ( $data['showhide'] == 'barshow' ) { ?><span class="title-bar"></span><?php } ?></h2>
		<?php if( WP_SVG::is_svg( $data['image']['id'] ) ) {
			$icon = WP_SVG::get_svg( $data['image']['id'] );
		} else {
			$icon = wp_get_attachment_image( $data['image']['id'] );
		} ?>
		<?php if ( !empty( $icon ) ) { ?>
		<span class="title-svg"><?php echo $icon; ?></span>
		<?php } ?>
	</div>
</div>
