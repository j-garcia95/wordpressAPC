<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

namespace radiustheme\Clenix_Core;
use ClenixTheme_Helper;
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
	$btn = '<a class="clenix-button-2" ' . $attr . '>' . $data['buttontext'] . '<i class="fa fa-angle-right" aria-hidden="true"></i>' . '</a>';
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
<div class="info-box info-<?php echo esc_attr( $data['style'] );?> <?php echo esc_attr( $data['title_align'] ); ?> <?php echo esc_attr( $data['shadow'] ); ?>">
	<div class="rtin-item">
		<div class="rtin-media">
			<?php if ( !empty( $data['layout_one_image']['id'] ) ) { 
				echo wp_get_attachment_image( $data['layout_one_image']['id'], 'full' ); 
			} else { 
				echo '<img class="wp-post-image" src="' . ClenixTheme_Helper::get_img( 'noimage_900X500.jpg' ) . '" alt="'.get_the_title().'">';
			} ?>
		</div>
		<div class="rtin-middle">
			<div class="rtin-icon">
				<?php if ( $data['icontype'] == 'image' ): ?>
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
		<div class="rtin-content">
			<?php if ( !empty( $data['title'] ) ) { ?>
			<h3 class="rtin-item-title"><?php echo wp_kses_post( $title );?></h3>
			<?php } if ( !empty( $data['content'] ) ) { ?>
			<div class="rtin-text"><?php echo wp_kses_post( $data['content'] ); ?></div>
			<?php } ?>
		</div>
	</div>
</div>