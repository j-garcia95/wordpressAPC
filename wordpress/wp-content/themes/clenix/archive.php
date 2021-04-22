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
$clenix_is_post_archive = is_home() || ( is_archive() && get_post_type() == 'post' ) ? true : false;

if ( is_post_type_archive( "clenix_service" ) || is_tax( "clenix_service_category" ) ) {
		get_template_part( 'template-parts/archive', 'services' );
	return;
}
if ( is_post_type_archive( "clenix_portfolio" ) || is_tax( "clenix_portfolio_category" ) ) {
		get_template_part( 'template-parts/archive', 'portfolio' );
	return;
}
if ( is_post_type_archive( "clenix_team" ) || is_tax( "clenix_team_category" ) ) {
		get_template_part( 'template-parts/archive', 'team' );
	return;
}

?>
<?php get_header(); ?>
<div id="primary" class="content-area">
	<div class="container">
		<div class="row">
			<?php
			if ( ClenixTheme::$layout == 'left-sidebar' ) {
				get_sidebar();
			}
			?>
			<div class="<?php echo esc_attr( $clenix_layout_class );?>">
				<main id="main" class="site-main">
					<?php
					if ( have_posts() ) { ?>
						<?php
						if ( $clenix_is_post_archive && ClenixTheme::$options['blog_style'] == 'style1' ) {
							echo '<div class="row rt-masonry-grid">';
							while ( have_posts() ) : the_post();
								get_template_part( 'template-parts/content-1', get_post_format() );
							endwhile;
							echo '</div>';
						} else if ( $clenix_is_post_archive && ClenixTheme::$options['blog_style'] == 'style2' ) {
							echo '<div class="auto-clear">';
							while ( have_posts() ) : the_post();
								get_template_part( 'template-parts/content-2', get_post_format() );
							endwhile;
							echo '</div>';
						} else if ( $clenix_is_post_archive && ClenixTheme::$options['blog_style'] == 'style3' ) {
							echo '<div class="auto-clear">';
							while ( have_posts() ) : the_post();
								get_template_part( 'template-parts/content-3', get_post_format() );
							endwhile;
							echo '</div>';
						} else if ( $clenix_is_post_archive && ClenixTheme::$options['blog_style'] == 'style4' ) {
							$i = 0;							
							while ( have_posts() ) : the_post();					
							clenix_loadtemplate('template-parts/content-4', array('i' => $i ));				
							$i++;
							endwhile;
						} else if ( class_exists( 'Clenix_Core' ) ) {
							if ( is_tax( 'clenix_portfolio_category' ) ) {
								echo '<div class="row rt-masonry-grid">';
								while ( have_posts() ) : the_post();
									get_template_part( 'template-parts/content-1', get_post_format() );
								endwhile;
								echo '</div>';
							}							
						}
						else {
							while ( have_posts() ) : the_post();
								get_template_part( 'template-parts/content-1', get_post_format() );
							endwhile;
						}

						?>
						<?php ClenixTheme_Helper::pagination(); ?>
						
					<?php } else {?>
						<?php get_template_part( 'template-parts/content', 'none' );?>
					<?php } ?>
				</main>
			</div>
			<?php
			if( ClenixTheme::$layout == 'right-sidebar' ){				
				get_sidebar();
			}
			?>
		</div>
	</div>
</div>
<?php get_footer(); ?>
