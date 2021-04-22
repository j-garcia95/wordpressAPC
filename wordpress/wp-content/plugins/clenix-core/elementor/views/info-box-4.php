<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

namespace radiustheme\Clenix_Core;
use radiustheme\Lib\WP_SVG;
$attr = '';
if ( !empty( $data['url']['url'] ) ) {
	$attr  = 'href="' . $data['url']['url'] . '"';
	$attr .= !empty( $data['url']['is_external'] ) ? ' target="_blank"' : '';
	$attr .= !empty( $data['url']['nofollow'] ) ? ' rel="nofollow"' : '';
	$title = '<a ' . $attr . '>' . $data['title'] . '</a>';
	
}
else {
	$title = $data['title'];
}

if ( !empty( $data['buttontext'] ) ) {
	$btn = '<a class="clenix-button-2" ' . $attr . '>' . $data['buttontext'] . '</a>';
}


// icon , image
if ( $data['icontype'] == 'icon' || $data['icontype'] == 'image' ) {
	$size = CLENIX_CORE_THEME_PREFIX . '-size2';
	if ( $attr ) {
		$img = '<a ' . $attr . '>' . wp_get_attachment_image( $data['image']['id'], $size ) . '</a>';
	}
	else {
		$img = wp_get_attachment_image( $data['image']['id'], $size );
	}
}

$icon_css ='';
$icon_size = $data['icon_size'];

if ( $icon_size != '' ) {
   $icon_size       = (int) $icon_size;
   $icon_css  .= " font-size: {$icon_size}px;";
}

?>
<div class="info-box media info-<?php echo esc_attr( $data['style'] );?> <?php echo esc_attr( $data['title_align'] ); ?> <?php echo esc_attr( $data['backg_color'] ); ?>">
	<div class="rtin-item rtin-<?php echo esc_attr( $data['icontype'] );?>">
		<div class="rtin-media">
			<?php if ( !empty( $data['title'] ) ) { ?>
			<h3 class="rtin-item-title"><?php echo wp_kses_post( $title );?></h3>
			<?php } ?>
			<?php if ( !empty( $data['content'] ) ) { ?>
				<div class="rtin-text"><?php echo wp_kses_post( $data['content'] );?></div>
			<?php } ?>
			<div class="rtin-icon">
				<?php if ( $data['icontype'] == 'image' ) : ?>
					<?php if( WP_SVG::is_svg( $data['image']['id'] ) ) {
						$icon = WP_SVG::get_svg( $data['image']['id'] );
					} else {
						$icon = wp_get_attachment_image( $data['image']['id'] );
					} ?>
					<?php if ( !empty( $icon ) ) { ?>
					<span class="image-svg"><?php echo $icon; ?></span>
					<?php } ?>
				<?php else: ?>
					<span  style="<?php echo wp_kses_post( $icon_css ); ?>"><i class="<?php echo esc_attr( $data['icon'] );?>" aria-hidden="true"></i></span>
				<?php endif; ?>
			</div>
		</div>
	</div>
</div>