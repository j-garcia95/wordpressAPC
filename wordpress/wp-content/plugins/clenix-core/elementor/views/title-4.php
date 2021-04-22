<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

namespace radiustheme\Clenix_Core;

use radiustheme\Lib\WP_SVG;

?>
<div class="sec-title <?php echo esc_attr( $data['style'] ); ?>">
	<div class="sec-title-holder">
		<h2 class="rtin-title"><?php echo wp_kses_post( $data['title'] ); ?></h2>
	</div>
</div>