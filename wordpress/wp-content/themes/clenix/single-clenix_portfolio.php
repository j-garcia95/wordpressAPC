<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */
// Layout class
if ( ClenixTheme::$layout == 'full-width' ) {
	$clenix_layout_class = 'col-sm-12 col-12';
}
else{
	$clenix_layout_class = ClenixTheme_Helper::has_active_widget();
}
?>
<?php get_header(); ?>
<div id="primary" class="content-area">
	<div class="container">
		<div class="row">
			<?php if ( ClenixTheme::$layout == 'left-sidebar' ) { get_sidebar(); } ?>
				<div class="<?php echo esc_attr( $clenix_layout_class );?>">
					<main id="main" class="site-main">
						<div class="container">
							<?php while ( have_posts() ) : the_post(); ?>
								<?php get_template_part( 'template-parts/content-single', 'portfolio' );?>
							<?php endwhile; ?>
						</div>
					</main>
				</div>
			<?php if ( ClenixTheme::$layout == 'right-sidebar' ) { get_sidebar(); }	?>
		</div>
	</div>
</div>
<?php get_footer(); ?>