<?php
$clenix_footer_column = 1;
switch ( $clenix_footer_column ) {
	case '1':
	$clenix_footer_class = 'col-lg-12 col-sm-12 col-12';
	break;
	case '2':
	$clenix_footer_class = 'col-lg-6 col-sm-6 col-12';
	break;
	case '3':
	$clenix_footer_class = 'col-lg-4 col-sm-4 col-12';
	break;		
	default:
	$clenix_footer_class = 'col-lg-3 col-sm-6 col-12';
	break;
}
// Logo
$clenix_light_logo = empty( ClenixTheme::$options['footer_logo_light']['url'] ) ? CLENIX_IMG_URL . 'logo-light.png' : ClenixTheme::$options['footer_logo_light']['url'];
$clenix_socials = ClenixTheme_Helper::socials();
?>
<?php if ( ClenixTheme::$footer_area == 1 || ClenixTheme::$footer_area == 'on' ){ ?>
	<div class="footer-top-area">
		<div class="container">
			<div class="footer-top-wrap">
				<div class="footer-left">
					<div class="copyright"><?php echo wp_kses( ClenixTheme::$options['copyright_text'] , 'alltext_allow' ); ?></div>
				</div>
				<div class="footer-middle">
					<?php
					for ( $i = 1; $i <= $clenix_footer_column; $i++ ) {
						echo '<div class="' . $clenix_footer_class . '">';
						dynamic_sidebar( 'footer-style-4' );
						echo '</div>';
					}
					?>
				</div>
				<div class="footer-right">
					<div class="footer-social">
					<?php if ( $clenix_socials ): ?>
						<ul>
							<?php foreach ( $clenix_socials as $clenix_social ): ?>
								<li><a target="_blank" href="<?php echo esc_url( $clenix_social['url'] );?>"><i class="fa <?php echo esc_attr( $clenix_social['icon'] );?>"></i></a></li>
							<?php endforeach; ?>
						</ul>
					<?php endif; ?>
					</div>
				</div>
			</div>
		</div>
	</div>
<?php } ?>
