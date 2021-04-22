<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

namespace radiustheme\Clenix_Core;

$btn = $attr = '';

if ( !empty( $data['buttonurl']['url'] ) ) {
	$attr  = 'href="' . $data['buttonurl']['url'] . '"';
	$attr .= !empty( $data['buttonurl']['is_external'] ) ? ' target="_blank"' : '';
	$attr .= !empty( $data['buttonurl']['nofollow'] ) ? ' rel="nofollow"' : '';
	
}
if ( $data['button_style'] == 'clenix-button-1' ) {
	if ( !empty( $data['buttontext'] ) ) {
		$btn = '<a class="clenix-button-1" ' . $attr . '>' . $data['buttontext'] . '</a>';
	}
} else {
	if ( !empty( $data['buttontext'] ) ) {
		$btn = '<a class="clenix-button-2" ' . $attr . '>' . $data['buttontext'] . '</a>';
	}
}

?>
<div class="rt-el-cta cta-<?php echo esc_attr( $data['style'] ); ?> <?php echo esc_attr( $data['theme'] ); ?>">
	<div class="container">
		<div class="align-items row">
			<div class="cta-content col-lg-8">
				<h2 class="rtin-title"><?php echo wp_kses_post( $data['title'] );?></h2>
				<p><?php echo wp_kses_post( $data['content'] );?></p>
			</div>
			<?php if ( $btn ) { ?>
				<div class="rtin-button col-lg-4"><?php echo wp_kses_post( $btn );?></div>		
			<?php } ?>
		</div>		
	</div>
</div>