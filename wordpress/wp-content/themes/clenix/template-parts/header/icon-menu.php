<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */
$clenix_socials = ClenixTheme_Helper::socials();
// Logo
$clenix_dark_logo = empty( ClenixTheme::$options['logo']['url'] ) ? CLENIX_IMG_URL . 'logo-dark.png' : ClenixTheme::$options['logo']['url'];

$clenix_addit_info  = ( ClenixTheme::$options['address'] || ClenixTheme::$options['phone'] || ClenixTheme::$options['email'] ) ? true : false;

?>

<div class="additional-menu-area">
	<div class="sidenav">
		<a href="#" class="closebtn">x</a>
		<div class="additional-logo">
			<a class="dark-logo" href="<?php echo esc_url( home_url( '/' ) );?>"><img src="<?php echo esc_url( $clenix_dark_logo );?>" alt="<?php esc_attr( bloginfo( 'name' ) ) ;?>"></a>
		</div>
		<?php wp_nav_menu( array( 'theme_location' => 'topright','container' => '' ) );?>
		<div class="sidenav-address">
		<?php if ( !empty ( $clenix_addit_info ) || !empty ( $clenix_socials ) ) { ?>
			<h4><?php esc_html_e( 'Follow Us', 'clenix' );?></h4>
		<?php } ?>
		<?php if ( $clenix_addit_info ) { ?>
			<?php if ( ClenixTheme::$options['address'] ) { ?>
			<span><?php echo wp_kses( ClenixTheme::$options['address'] , 'alltext_allow' );?></span>
			<?php } ?>
			<?php if ( ClenixTheme::$options['phone'] ) { ?>
			<span><a href="tel:<?php echo esc_attr( ClenixTheme::$options['phone'] );?>"><?php echo esc_html( ClenixTheme::$options['phone'] );?></a></span>
			<?php } ?>
			<?php if ( ClenixTheme::$options['email'] ) { ?>
			<span><a href="mailto:<?php echo esc_attr( ClenixTheme::$options['email'] );?>"><?php echo esc_html( ClenixTheme::$options['email'] );?></a></span>
			<?php } ?>
		<?php } ?>
			<?php if ( $clenix_socials ) { ?>
				<div class="sidenav-social">
					<?php foreach ( $clenix_socials as $clenix_social ): ?>
						<span><a target="_blank" href="<?php echo esc_url( $clenix_social['url'] );?>"><i class="fa <?php echo esc_attr( $clenix_social['icon'] );?>"></i></a></span>
					<?php endforeach; ?>					
				</div>						
			<?php } ?>
		</div>
	</div>
	<span class="side-menu-open side-menu-trigger">
		<span></span>
		<span></span>
		<span></span>
	</span>
</div>