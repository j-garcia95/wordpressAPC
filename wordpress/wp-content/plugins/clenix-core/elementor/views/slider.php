<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

namespace radiustheme\Clenix_Core;

use ClenixTheme;
use ClenixTheme_Helper;

$slides = array();
$default_img = ClenixTheme_Helper::get_img( 'noimage.jpg' );

foreach ( $data['slides'] as $slide ) {
	$slides[] = array(
		'id'           	=> 'slide-' . time().rand( 1, 99 ),
		'image'        	=> $slide['image']['url'] ? $slide['image']['url'] : $default_img,
		'title'        	=> $slide['title'],
		'sub_title'     => $slide['sub_title'],
		'content'     	=> $slide['content'],
		'content_mob' 	=> $slide['content_mob'],
		'buttontext'   	=> $slide['buttontext'],
		'buttonurl'    	=> $slide['buttonurl'],
	);
}
$slideclass = 'rtin-odd';
?>
<div class="rt-el-slider rtin-<?php echo esc_attr( $data['layout'] );?>">
	<div class="rt-nivoslider" data-settings='<?php echo json_encode(array(
		'effect'		=> $data['slider_effect'],
		'animSpeed' 	=> $data['slider_anim_speed'],
		'pauseTime' 	=> $data['slider_pause_time'],
		'directionNav' 	=> $data['slider_nav'] == 'yes' ? true : false,
		'controlNav'	=> $data['slider_dots'] == 'yes' ? true : false,
		'manualAdvance' => $data['slider_autoplay'] == 'yes' ? false : true,
	)) ?>'>
	
	<?php foreach ( $slides as $slide ): ?>
		<img src="<?php echo esc_url( $slide['image'] );?>" title="#<?php echo esc_attr( $slide['id'] );?>" />
	<?php endforeach; ?>
	</div>
	<?php foreach ( $slides as $slide ): ?>
		<div id="<?php echo esc_attr( $slide['id'] );?>" class="slider-direction">
			<div class="rtin-content <?php echo esc_attr( $slideclass );?>">
				<div class="rtin-content-inner">
					<div class="rtin-content-wrap">
						<?php if ( $slide['sub_title'] ): ?>
							<div class="rtin-sub-title"><?php echo wp_kses_post( $slide['sub_title'] );?></div>
						<?php endif; ?>
						<?php if ( $slide['title'] ): ?>
							<div class="rtin-title"><?php echo wp_kses_post( $slide['title'] );?></div>
						<?php endif; ?>
						<?php if ( $slide['content'] ): ?>
							<p class="rtin-content-desk"><?php echo wp_kses_post( $slide['content'] );?></p>
						<?php endif; ?>
						<?php if ( $slide['content_mob'] ): ?>
							<p class="rtin-content-mob"><?php echo wp_kses_post( $slide['content_mob'] );?></p>
						<?php endif; ?>
						<?php if ( $slide['buttontext'] ): ?>
							<div class="rtin-btn"><a href="<?php echo esc_url( $slide['buttonurl'] );?>" class="slider-white-button"><span><?php echo wp_kses_post( $slide['buttontext'] );?></span></a></div>
						<?php endif; ?>
					</div>
				</div>
			</div>
		</div>
		<?php $slideclass = ( $slideclass == 'rtin-odd' ) ? 'rtin-even' : 'rtin-odd';?>
	<?php endforeach; ?>
</div>