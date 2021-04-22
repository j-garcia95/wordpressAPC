<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

$nav_menu_args = ClenixTheme_Helper::nav_menu_args();
$clenix_socials = ClenixTheme_Helper::socials();
// Logo
$clenix_dark_logo = empty( ClenixTheme::$options['logo']['url'] ) ? CLENIX_IMG_URL . 'logo-dark.png' : ClenixTheme::$options['logo']['url'];
$clenix_light_logo = empty( ClenixTheme::$options['logo_light']['url'] ) ? CLENIX_IMG_URL . 'logo-light.png' : ClenixTheme::$options['logo_light']['url'];

?>
<div class="masthead-container" id="sticker">
	<div class="container">
		<div class="header-4-wrap">
			<div class="header-4-left">
				<div class="site-branding">
					<a class="dark-logo" href="<?php echo esc_url( home_url( '/' ) );?>"><img src="<?php echo esc_url( $clenix_dark_logo );?>" alt="<?php esc_attr( bloginfo( 'name' ) ) ;?>"></a>
					<a class="light-logo" href="<?php echo esc_url( home_url( '/' ) );?>"><img src="<?php echo esc_url( $clenix_light_logo );?>" alt="<?php esc_attr( bloginfo( 'name' ) ) ;?>"></a>
				</div>
			</div>
			<div class="header-4-middle">
				<div id="site-navigation" class="main-navigation">
					<?php wp_nav_menu( $nav_menu_args );?>
				</div>
			</div>
			<div class="header-4-right">
				<div class="header-phone">
					<div class="item-icon"><i class="flaticon-phone-call"></i></div>
					<div class="item-number"><a href="tel:<?php echo esc_attr( ClenixTheme::$options['phone'] );?>"><?php echo wp_kses( ClenixTheme::$options['phone'] , 'alltext_allow' );?></a></div>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="rt-sticky-menu-wrapper rt-sticky-menu">
	<div class="container">
		<div class="sticky-menu-align">
			<div class="site-branding">
				<a class="dark-logo" href="<?php echo esc_url( home_url( '/' ) );?>"><img src="<?php echo esc_url( $clenix_dark_logo );?>" alt="<?php esc_attr( bloginfo( 'name' ) ) ;?>"></a>
				<a class="light-logo" href="<?php echo esc_url( home_url( '/' ) );?>"><img src="<?php echo esc_url( $clenix_light_logo );?>" alt="<?php esc_attr( bloginfo( 'name' ) ) ;?>"></a>
			</div>
			<div class="main-navigation">
				<?php wp_nav_menu( $nav_menu_args ); ?>
			</div>
		</div>
	</div>
</div>