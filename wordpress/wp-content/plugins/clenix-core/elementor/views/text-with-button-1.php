<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

namespace radiustheme\Clenix_Core;
use radiustheme\Lib\WP_SVG;

$btn = $attr = '';

if ( !empty( $data['one_buttonurl']['url'] ) ) {
	$attr  = 'href="' . $data['one_buttonurl']['url'] . '"';
	$attr .= !empty( $data['one_buttonurl']['is_external'] ) ? ' target="_blank"' : '';
	$attr .= !empty( $data['one_buttonurl']['nofollow'] ) ? ' rel="nofollow"' : '';
	
}
if ( $data['button_style'] == 'clenix-button-1' ) {
	if ( !empty( $data['button_one'] ) ) {
		$btn = '<a class="clenix-button-1" ' . $attr . '>' . $data['button_one'] . '</a>';
	}
} else {
	if ( !empty( $data['button_one'] ) ) {
		$btn = '<a class="clenix-button-2" ' . $attr . '>' . $data['button_one'] . '</a>';
	}
}

$title_css = $content_css = $sub_title_css = '';
$title_color = $data['title_color'];
$sub_title_color = $data['sub_title_color'];
$content_color = $data['content_color'];

if ( $title_color != '' ) {
	$title_css  .= " color: {$title_color};";
}
if ( $sub_title_color != '' ) {
	$sub_title_css  .= " color: {$sub_title_color};";
}
if ( $content_color != '' ) {
	$content_css  .= " color: {$content_color};";
}
?>
<div class="title-text-button <?php echo esc_attr( $data['textalign'] );?> <?php echo esc_attr( $data['showhide'] ); ?> text-<?php echo esc_attr( $data['style'] ); ?>">
	<?php if ( !empty( $data['sub_title'] ) ) { ?>
		<div class="subtitle" style="<?php echo esc_attr( $sub_title_css ); ?>"><?php echo wp_kses_post( $data['sub_title'] );?></div>
	<?php } ?>
	<?php if ( !empty( $data['title'] ) ) { ?>
		<h2 class="rtin-title" style="<?php echo esc_attr( $title_css ); ?>"><?php echo wp_kses_post( $data['title'] );?><?php if ( $data['showhide'] == 'barshow' ) { ?><span class="title-bar"></span><?php } ?></h2>
		<?php if( WP_SVG::is_svg( $data['image']['id'] ) ) {
			$icon = WP_SVG::get_svg( $data['image']['id'] );
		} else {
			$icon = wp_get_attachment_image( $data['image']['id'] );
		} ?>
		<?php if ( !empty( $icon ) ) { ?>
		<span class="title-svg"><?php echo $icon; ?></span>
		<?php } ?>
	<?php } ?>
	<div class="rtin-content" style="<?php echo esc_attr( $content_css ); ?>"><?php echo wp_kses_post( $data['content'] );?></div>
	<?php if ( $data['button_display']  == 'yes' ) { ?>
		<?php if ( $btn ) { ?>
			<div class="rtin-button"><?php echo wp_kses_post( $btn );?></div>
		<?php } ?>
	<?php } ?>
</div>