<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */
 
if ( function_exists( 'is_woocommerce' ) && is_woocommerce() ) {
	$clenix_title = woocommerce_page_title( false );
} else if ( is_404() ) {
	$clenix_title = ClenixTheme::$options['error_title'];
} else if ( is_search() ) {
	$clenix_title = esc_html__( 'Search Results for : ', 'clenix' ) . get_search_query();
} else if ( is_home() ) {
	if ( get_option( 'page_for_posts' ) ) {
		$clenix_title = get_the_title( get_option( 'page_for_posts' ) );
	}
	else {
		$clenix_title = apply_filters( 'theme_blog_title', esc_html__( 'All Posts', 'clenix' ) );
	}
} else if ( is_archive() ) {
	$clenix_title = get_the_archive_title();
} else if ( is_page() ) {
	$clenix_title = get_the_title();
} else if ( is_single() ) {
	$clenix_title = get_the_title();
}

if ( ClenixTheme::$bgtype == 'bgcolor' ) {
	$clenix_bg = ClenixTheme::$bgcolor;
} else {
	$clenix_bg = 'url(' . ClenixTheme::$bgimg . ') no-repeat scroll center center / cover';
}

if ( !empty( ClenixTheme::$options['post_banner_title'] ) ){
	$post_banner_title = ClenixTheme::$options['post_banner_title'];
} else {
	$post_banner_title = esc_html__( 'Our News' , 'clenix' );
}

?>
<?php if ( ClenixTheme::$has_banner == '1' || ClenixTheme::$has_banner == 'on' ): ?>
	<div class="entry-banner" style="background:<?php echo esc_html( $clenix_bg ); ?>">
		<div class="container">
			<div class="entry-banner-content">
				<?php if ( is_single() ) { ?>
				<h1 class="entry-title"><?php echo wp_kses( $clenix_title , 'alltext_allow' );?></h1>
				<?php } else if ( is_page() ) { ?>
					<h1 class="entry-title"><?php echo wp_kses( $clenix_title , 'alltext_allow' );?></h1>
				<?php } else { ?>
					<h1 class="entry-title"><?php echo wp_kses( $clenix_title , 'alltext_allow' );?></h1>
				<?php } ?>
				<?php if ( ClenixTheme::$has_breadcrumb == '1' || ClenixTheme::$has_breadcrumb == 'on' ) { ?>
					<?php get_template_part( 'template-parts/content', 'breadcrumb' );?>
				<?php } ?>
			</div>
		</div>
	</div>
<?php endif; ?>