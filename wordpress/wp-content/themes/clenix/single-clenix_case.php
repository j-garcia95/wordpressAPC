<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

?>
<?php get_header(); ?>
<div id="primary" class="content-area">
	<main id="main" class="site-main">
		<div class="container">
			<?php while ( have_posts() ) : the_post(); ?>
				<?php get_template_part( 'template-parts/content-single', 'case' );?>
			<?php endwhile; ?>
		</div>
	</main>
</div>
<?php get_footer(); ?>
