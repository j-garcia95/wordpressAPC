<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */
?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!-- <link rel="profile" href="https://gmpg.org/xfn/11" /> -->
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
	<?php do_action( 'wp_body_open' ); ?>
	<?php
		// Preloader
		if ( ClenixTheme::$options['preloader'] == '1' ){ 
			if ( !empty( ClenixTheme::$options['preloader_image']['url'] ) ) {
				$preloader_img = ClenixTheme::$options['preloader_image']['url'];
				echo '<div id="preloader" style="background-image:url(' . esc_url( $preloader_img ) . ');"></div>';
			}
			else { ?>
			<div id="preloader">
				<div class="preloader-wrap">
					<div class="preloader-content">
						<div class="circle"></div>
					</div>
				</div>
			</div>
			<?php }
		}
	?>
	<div id="page" class="site">		
		<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'clenix' ); ?></a>		
		<header id="masthead" class="site-header">			
			<div id="header-<?php echo esc_attr( ClenixTheme::$header_style ); ?>" class="header-area header-fixed ">			
				<?php
					$is_ad_active1 = get_post_meta( get_the_ID(), 'clenix_header_top_ad', true );
					if ( $is_ad_active1 == 'on' ) { do_action( 'clenix_header_top' ); }
				?>
				<?php if ( ClenixTheme::$top_bar == 1 || ClenixTheme::$top_bar == 'on' ){ ?>			
				<?php get_template_part( 'template-parts/header/header-top', ClenixTheme::$top_bar_style ); ?>
				<?php } ?>
				
				<?php if ( ClenixTheme::$header_opt == 1 || ClenixTheme::$header_opt == 'on' ){ ?>
				<?php get_template_part( 'template-parts/header/header', ClenixTheme::$header_style ); ?>
				<?php } ?>
			</div>
		</header>
		<div id="meanmenu"></div>
		<div id="header-area-space"></div>
		<div id="header-search" class="header-search">
            <button type="button" class="close">×</button>
            <?php get_search_form(); ?>
        </div>
		<div id="content" class="site-content">	
			<?php
				if ( ClenixTheme::$has_banner == '1' || ClenixTheme::$has_banner == 'on' ) { 
					get_template_part('template-parts/content', 'banner');
				}
			?>