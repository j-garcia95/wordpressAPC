<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

// Layout class

$iso						= 'no-equal-gallery';

$team_archive_layout 		= "team-default team-multi-layout-1 team-grid-style1";
$template 				 	= 'team-1';


?>
<?php get_header(); ?>
<div id="primary" class="content-area">
	<div class="container">
		<div class="<?php echo esc_attr( $team_archive_layout );?>">
			<main id="main" class="site-main">	
				<?php if ( have_posts() ) :?>

					<div class="row <?php echo esc_attr( $iso );?>">
						<?php while ( have_posts() ) : the_post(); ?>
							<div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
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
	</div>
</div>
<?php get_footer(); ?>
