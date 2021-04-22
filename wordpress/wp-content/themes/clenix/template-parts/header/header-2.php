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
<div class="masthead-container header-controll" id="sticker">
	<div class="container">
		<div class="menu-full-wrap">
			<div class="site-branding">
				<a class="dark-logo" href="<?php echo esc_url( home_url( '/' ) );?>"><img src="<?php echo esc_url( $clenix_dark_logo );?>" alt="<?php esc_attr( bloginfo( 'name' ) ) ;?>"></a>
				<a class="light-logo" href="<?php echo esc_url( home_url( '/' ) );?>"><img src="<?php echo esc_url( $clenix_light_logo );?>" alt="<?php esc_attr( bloginfo( 'name' ) ) ;?>"></a>
			</div>
			<div class="menu-wrap">
				<div id="site-navigation" class="main-navigation">
					<?php wp_nav_menu( $nav_menu_args );?>
				</div>
			</div>
			<div class="info-wrap">			
				<?php if ( ClenixTheme::$options['phone'] ) { ?>
					<div class="icon-left">
					<i class="flaticon-phone-call"></i>
					</div>
					<div class="info"><span><?php $header_hotline_txt = ClenixTheme::$options['header_hotline_txt'];
					if ( !empty( $header_hotline_txt ) ){ echo esc_html( $header_hotline_txt ); } else { esc_html_e( 'Call Us Now', 'clenix' ); } ?></span><a href="tel:<?php echo esc_attr( ClenixTheme::$options['phone'] );?>"><?php echo wp_kses( ClenixTheme::$options['phone'] , 'alltext_allow' );?></a></div>
				<?php } ?>		
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