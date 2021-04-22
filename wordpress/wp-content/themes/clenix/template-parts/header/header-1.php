<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

$nav_menu_args = ClenixTheme_Helper::nav_menu_args();

// Logo
$clenix_dark_logo = empty( ClenixTheme::$options['logo']['url'] ) ? CLENIX_IMG_URL . 'logo-dark.png' : ClenixTheme::$options['logo']['url'];
$clenix_light_logo = empty( ClenixTheme::$options['logo_light']['url'] ) ? CLENIX_IMG_URL . 'logo-light.png' : ClenixTheme::$options['logo_light']['url'];

?>
<div class="masthead-container header-controll" id="sticker">
	<div class="container">
		<div class="header-top">			
				<div class="site-branding">
					<a class="dark-logo" href="<?php echo esc_url( home_url( '/' ) );?>"><img src="<?php echo esc_url( $clenix_dark_logo );?>" alt="<?php esc_attr( bloginfo( 'name' ) ) ;?>"></a>
					<a class="light-logo" href="<?php echo esc_url( home_url( '/' ) );?>"><img src="<?php echo esc_url( $clenix_light_logo );?>" alt="<?php esc_attr( bloginfo( 'name' ) ) ;?>"></a>
				</div>
				<div class="header-address">
				<?php if ( ClenixTheme::$options['Opening'] ) { ?>
				<div>
					<div class="icon-left">
					<i class="fa fa-clock-o" aria-hidden="true"></i>
					</div>
					<div class="info"><span><?php $header_opening_txt = ClenixTheme::$options['header_opening_txt'];
					if ( !empty( $header_opening_txt ) ){ echo esc_html( $header_opening_txt ); } else { esc_html_e( 'Location', 'clenix' ); } ?></span><?php echo wp_kses( ClenixTheme::$options['Opening'] , 'alltext_allow' );?></div>
				</div>
				<?php } ?>
				<?php if ( ClenixTheme::$options['email'] ) { ?>
				<div>
					<div class="icon-left">
					<i class="flaticon-message"></i>
					</div>
					<div class="info"><span><?php $header_mailus_txt = ClenixTheme::$options['header_mailus_txt'];
					if ( !empty( $header_mailus_txt ) ){ echo esc_html( $header_mailus_txt ); } else { esc_html_e( 'Send Us Email', 'clenix' ); } ?></span><a href="mailto:<?php echo esc_attr( ClenixTheme::$options['email'] );?>"><?php echo wp_kses( ClenixTheme::$options['email'] , 'alltext_allow' );?></a></div>
				</div>
				<?php } ?>
				<?php if ( ClenixTheme::$options['phone'] ) { ?>
				<div>
					<div class="icon-left">
					<i class="flaticon-phone-call"></i>
					</div>
					<div class="info"><span><?php $header_hotline_txt = ClenixTheme::$options['header_hotline_txt'];
					if ( !empty( $header_hotline_txt ) ){ echo esc_html( $header_hotline_txt ); } else { esc_html_e( 'Call Us Now', 'clenix' ); } ?></span><a href="tel:<?php echo esc_attr( ClenixTheme::$options['phone'] );?>"><?php echo wp_kses( ClenixTheme::$options['phone'] , 'alltext_allow' );?></a></div>
				</div>
				<?php } ?>
			</div>
		</div>
	</div>
</div>
<div class="masthead-container menu-bgcol">
	<div class="container">
		<div class="menu-full-wrap">
			<div class="menu-wrap">
				<div id="site-navigation" class="main-navigation">
					<?php wp_nav_menu( $nav_menu_args );?>
				</div>
			</div>
			<div class="button-wrap">			
				<?php if ( ClenixTheme::$options['online_button'] == '1' ) { ?>
				<div class="header-button-wrap">
					<div class="header-button">
						<a class="button-btn" target="_self" href="<?php echo esc_url( ClenixTheme::$options['online_button_link']  );?>"><i class="fa fa-bell" aria-hidden="true"></i><?php echo esc_html( ClenixTheme::$options['online_button_text'] );?></a>
					</div>
				</div>
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