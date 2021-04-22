<?php
$clenix_footer_column = ClenixTheme::$options['footer_column_1'];
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

$clenix_footer_top_shade = empty( ClenixTheme::$options['footer_shape1']['url'] ) ? CLENIX_IMG_URL . 'figure1.png' : ClenixTheme::$options['footer_shape1']['url'];

$clenix_footer_bottom_shade = empty( ClenixTheme::$options['footer_shape2']['url'] ) ? CLENIX_IMG_URL . 'figure2.png' : ClenixTheme::$options['footer_shape2']['url'];

$clenix_socials = ClenixTheme_Helper::socials();

?>
<?php if ( is_active_sidebar( 'footer-style-1-1' ) ) { ?>
<?php if ( ClenixTheme::$footer_area == 1 || ClenixTheme::$footer_area == 'on' ) { ?>
	<img class="top-shape" src="<?php echo esc_url($clenix_footer_top_shade); ?>" alt="top-shape">
	<div class="footer-top-area">
		<div class="container">
			<div class="row">
				<?php
				for ( $i = 1; $i <= $clenix_footer_column; $i++ ) {
					echo '<div class="' . $clenix_footer_class . '">';
					dynamic_sidebar( 'footer-style-1-'. $i );
					echo '</div>';
				}
				?>
			</div>
		</div>
	</div>
<?php } ?>
<?php } ?>
<?php if ( ClenixTheme::$copyright_area == 1 || ClenixTheme::$copyright_area == 'on' ) { ?>
	<div class="footer-bottom-area">
		<div class="container">
			<div class="copyright_wrap">
				<div class="copyright"><?php echo wp_kses( ClenixTheme::$options['copyright_text'] , 'alltext_allow' );?></div>
				<div class="copyright_widget"><?php dynamic_sidebar( 'copyright_widget' ); ?></div>
			</div>
		</div>
	</div>
	<img class="bottom-shape" src="<?php echo esc_url($clenix_footer_bottom_shade); ?>" alt="bottom-shape">
<?php } ?>