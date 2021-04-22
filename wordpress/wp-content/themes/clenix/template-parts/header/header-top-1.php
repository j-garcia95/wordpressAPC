<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

$clenix_socials = ClenixTheme_Helper::socials();
?>
<div id="tophead" class="header-top-bar align-items-center">
	<div class="container">
		<div class="top-bar-wrap">
			<div class="tophead-left">
				<?php if ( $clenix_socials ) { ?>
					<ul class="tophead-social">
						<?php foreach ( $clenix_socials as $clenix_social ): ?>
							<li><a target="_blank" href="<?php echo esc_url( $clenix_social['url'] );?>"><i class="fa <?php echo esc_attr( $clenix_social['icon'] );?>"></i></a></li>
						<?php endforeach; ?>
					</ul>
				<?php } ?>
				<?php if ( ClenixTheme::$options['Opening'] ): ?>
					<div class="opening-hour">
						<span><i class="fa fa-clock-o" aria-hidden="true"></i></span><?php echo wp_kses( ClenixTheme::$options['Opening'] , 'alltext_allow' );?>
					</div>
				<?php endif; ?>
			</div>
			<div class="tophead-right">
				<?php if ( ClenixTheme::$options['online_button'] == '1' ) { ?>
					<div class="header-button">
						<a class="button-btn" target="_self" href="<?php echo esc_url( ClenixTheme::$options['online_button_link']  );?>"><i class="fa fa-bell" aria-hidden="true"></i><?php echo esc_html( ClenixTheme::$options['online_button_text'] );?></a>
					</div>
				<?php } ?>
			</div>
		</div>
	</div>
</div>