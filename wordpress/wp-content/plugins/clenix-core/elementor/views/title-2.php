<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

namespace radiustheme\Clenix_Core;
use radiustheme\Lib\WP_SVG;
?>
<div class="sec-title <?php echo esc_attr( $data['style'] ); ?> <?php echo esc_attr( $data['title_align'] ); ?>">
	<div class="sec-title-holder">
		<?php if( WP_SVG::is_svg( $data['title2_image']['id'] ) ) {
			$icon = WP_SVG::get_svg( $data['title2_image']['id'] );
		} else {
			$icon = wp_get_attachment_image( $data['title2_image']['id'] );
		} ?>
		<?php if ( !empty( $icon ) ) { ?>
		<span class="title-svg"><?php echo $icon; ?></span>
		<?php } ?>
		<h2 class="rtin-title"><?php echo wp_kses_post( $data['title'] ); ?></h2>
		<?php if ( !empty( $data['content'] ) ) { ?>
			<div class="rtin-text"><?php echo wp_kses_post( $data['content'] );?></div>
		<?php } ?>
	</div>
</div>