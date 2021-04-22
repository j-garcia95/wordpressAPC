<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

// Layout class
if ( ClenixTheme::$layout == 'full-width' ) {
	$clenix_layout_class = 'col-sm-12 col-12';
} else {
	$clenix_layout_class = ClenixTheme_Helper::has_active_widget();
}
$service_layout = get_post_meta( get_the_ID() ,'clenix_service_style', true );
$service_layout_ops = ClenixTheme::$options['service_style'];
$f_layout = ( empty( $service_layout ) || ( $service_layout  == 'default' ) ) ? $service_layout_ops : $service_layout;

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
			}
			?>
			<div class="<?php echo esc_attr( $clenix_layout_class );?>">
				<main id="main" class="site-main">						
					<?php
						if ( $f_layout == 'style1' ) {								
							while ( have_posts() ) : the_post();
								get_template_part( 'template-parts/content-single', 'service-1' );
							endwhile;
						} else if ( $f_layout == 'style2' ) {								
							while ( have_posts() ) : the_post();
								get_template_part( 'template-parts/content-single', 'service-2' );
							endwhile;
						} 
						else {
							while ( have_posts() ) : the_post();
								get_template_part( 'template-parts/content-single', 'service' );
							endwhile;
						}
					?>
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
