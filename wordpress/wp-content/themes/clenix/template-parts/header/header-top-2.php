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
			<div class="address">
				<i class="fa fa-map-marker" aria-hidden="true"></i><?php if ( ClenixTheme::$options['address'] ) { ?><?php echo wp_kses( ClenixTheme::$options['address'] , 'alltext_allow' );?><?php } ?></div>
			</div>
			<div class="tophead-right">
				<?php if ( $clenix_socials ) { ?>
					<ul class="tophead-social">
						<?php foreach ( $clenix_socials as $clenix_social ): ?>
							<li><a target="_blank" href="<?php echo esc_url( $clenix_social['url'] );?>"><i class="fa <?php echo esc_attr( $clenix_social['icon'] );?>"></i></a></li>
						<?php endforeach; ?>
					</ul>
				<?php } ?>
			</div>
		</div>
	</div>
</div>

