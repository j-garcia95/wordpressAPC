<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

// Layout class

if ( ClenixTheme::$layout == 'full-width' ) {
	$clenix_layout_class = 'col-sm-12 col-xs-12';
	$col_class    = 'col-lg-4 col-md-6 col-sm-6 col-xs-12 no-equal-item';
}
else{
	$clenix_layout_class = 'col-sm-8 col-md-8 col-xs-12';
	$col_class    = 'col-lg-6 col-md-6 col-sm-12 col-xs-12 no-equal-item';
}

// Template

$template_bg_sty		= 'bg-light-accent100';
$gutters				= '';
$container_class		= 'container';
$iso					= 'no-equal-gallery rt-masonry-grid';

if ( ClenixTheme::$options['services_style'] == 'style1' ){
	$sercices_archive_layout = "service-default service-grid-layout1";
	$template 				 = 'services-1';
}elseif( ClenixTheme::$options['services_style'] == 'style2' ){
	$sercices_archive_layout = "service-default service-grid-layout2";
	$template 				 = 'services-2';
}else{
	$sercices_archive_layout = "service-default service-grid-layout1";
	$template 				 = 'services-1';
}


?>
<?php get_header(); ?>
<div id="primary" class="content-area">
	<div class="container">
		<div class="row">
			<?php
			if ( ClenixTheme::$layout == 'left-sidebar' ) {
				if ( is_active_sidebar( 'service-sidebar' ) ) {
					get_sidebar('clenix_service');
				}
			}?>
			<div class="<?php echo esc_attr( $sercices_archive_layout );?> <?php echo esc_attr( $clenix_layout_class );?>">
				<main id="main" class="site-main">
					<?php if ( have_posts() ) :?>
						<div class="row <?php echo esc_attr( $iso );?>">
							<?php while ( have_posts() ) : the_post(); ?>
								<div class="rt-grid-item <?php echo esc_attr( $col_class );?>">
									<?php get_template_part( 'template-parts/content', $template ); ?>
								</div>
							<?php endwhile; ?>
						</div>
 
					<?php ClenixTheme_Helper::pagination(); ?>	
					<?php else:?>
						<?php get_template_part( 'template-parts/content', 'none' );?>
					<?php endif;?>
				</main>
			</div>
			<?php
			if ( ClenixTheme::$layout == 'right-sidebar' ) {				
				if ( is_active_sidebar( 'service-sidebar' ) ) {
					get_sidebar('clenix_service');
				}
			}
			?>
		</div>
	</div>
</div>
<?php get_footer(); ?>
