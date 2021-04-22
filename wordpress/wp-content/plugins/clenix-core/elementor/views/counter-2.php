<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

namespace radiustheme\Clenix_Core;
use radiustheme\Lib\WP_SVG;
?>
<div class="rt-counter rtin-counter-<?php echo esc_attr( $data['style'] );?> rtin-<?php echo esc_attr( $data['iconalign'] );?>">
	<div class="rtin-item clearfix">
		<div class="rtin-content">
			<div class="rtin-counter"><span class="counter" data-num="<?php echo esc_attr( $data['number'] );?>" data-rtspeed="<?php echo esc_attr( $data['speed'] );?>" data-rtsteps="<?php echo esc_attr( $data['steps'] );?>"><?php echo esc_html( $data['number'] );?></span></div>
			<h3 class="rtin-title"><?php echo esc_html( $data['title'] );?></h3>
		</div>	
	</div>
</div>
