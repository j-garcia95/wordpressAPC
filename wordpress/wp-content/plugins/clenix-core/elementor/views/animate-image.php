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
use radiustheme\Lib\WP_SVG;

$attr = '';
if ( !empty( $data['url']['url'] ) ) {
	$attr  = 'href="' . $data['url']['url'] . '"';
	$attr .= !empty( $data['url']['is_external'] ) ? ' target="_blank"' : '';
	$attr .= !empty( $data['url']['nofollow'] ) ? ' rel="nofollow"' : '';
	$title = '<a ' . $attr . '>' . $data['title'] . '</a>';
	
}?>
<div class="about-animate-image">	
	<?php // repeated icon here ?>
	<?php
	$i=1;
	foreach ( $data['icon_info'] as $ic ) {
		
		// icon , image
		if ( $ic['icontype'] == 'icon' || $ic['icontype'] == 'image' ) {
			$size = CLENIX_CORE_THEME_PREFIX . '-size2';
			if ( $attr ) {
				$img = '<a ' . $attr . '>' . wp_get_attachment_image( $ic['image']['id'], $size ) . '</a>';
			}
			else {
				$img = wp_get_attachment_image( $ic['image']['id'], $size );
			}
		}
		
		$icon_css ='';
		$icon_size = $ic['icon_size'];
		$icon_color = $ic['icon_color'];

		if ( $icon_size != '' ) {
		   $icon_size       = (int) $icon_size;
		   $icon_css  .= " font-size: {$icon_size}px;";
		}
		if ( $icon_color != '' ) {
		   $icon_css  .= " color: {$icon_color};";
		}
		$ani_name = $i%2 === 0 ? "animate-figure-even" : "animate-figure-odd";
	?>

	<div class="item-icon" style="position:absolute; transform: scale(0.7); animation: <?php echo esc_attr( $ani_name ); ?> infinite 6s;<?php if ( !empty($ic['icon_position_top'])) { ?>top:<?php echo esc_attr( $ic['icon_position_top'] ); ?>px;<?php } ?><?php if ( !empty($ic['icon_position_bottom'])) { ?>bottom:<?php echo esc_attr( $ic['icon_position_bottom'] ); ?>px;<?php } ?><?php if ( !empty($ic['icon_position_right'])) { ?>right:<?php echo esc_attr( $ic['icon_position_right'] ); ?>px;<?php } ?><?php if ( !empty($ic['icon_position_left'])) { ?>left:<?php echo esc_attr( $ic['icon_position_left'] ); ?>px; <?php } ?>">		
		<?php if ( $ic['icontype'] == 'image' ) : ?>
			<?php if( WP_SVG::is_svg( $ic['image']['id'] ) ) {
				$icon = WP_SVG::get_svg( $ic['image']['id'] );
			} else {
				$icon = wp_get_attachment_image( $ic['image']['id'] );
			} ?>
			<?php if ( !empty( $icon ) ) { ?>
			<span class="image-svg"><?php echo $icon; ?></span>
			<?php } ?>
		<?php else: ?>
			<span style="<?php echo wp_kses_post( $icon_css ); ?>"><i class="<?php echo esc_attr( $ic['icon'] );?>" aria-hidden="true"></i></span>
		<?php endif; ?>
	</div>
	<?php $i++; 
	} ?>
	<div class="item-img">
		<?php
			if ( !empty( $data['big_image']['id'] ) ) { 
				echo wp_get_attachment_image( $data['big_image']['id'], 'full' ); 
			 } else { 
				echo '<img class="wp-post-image" src="' . ClenixTheme_Helper::get_img( 'noimage_900X500.jpg' ) . '" alt="'.get_the_title().'">';
			}
		?>
	</div>
</div>