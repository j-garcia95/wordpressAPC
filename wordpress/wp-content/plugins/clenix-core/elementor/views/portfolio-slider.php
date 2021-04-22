<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

namespace radiustheme\Clenix_Core;

use ClenixTheme;
use ClenixTheme_Helper;
use \WP_Query;

$thumb_size = 'clenix-size5';

if ( get_query_var('paged') ) {
	$paged = get_query_var('paged');
}
else if ( get_query_var('page') ) {
	$paged = get_query_var('page');
}
else {
	$paged = 1;
}

$number_of_post = $data['itemnumber'];
$post_sorting = $data['orderby'];
$post_ordering = $data['post_ordering'];
$title_count = $data['title_count'];
$excerpt_count = $data['excerpt_count'];	
$cat_single_grid = $data['cat_single'];
$args = array(
	'post_type' => 'clenix_portfolio',
	'post_status' => 'publish',
	'orderby' => $post_sorting,
	'order' => $post_ordering,
	'posts_per_page' => $number_of_post,
	'paged'          => $paged,
);

if ( $cat_single_grid != 0 ) {
	$args['tax_query'] = array (
		array (
			'taxonomy' => 'clenix_portfolio_category',
			'field'    => 'ID',
			'terms'    => $cat_single_grid,
		)
	);
}

$title_css ='';
$title_size = $data['title_size'];

if ( $title_size != '' ) {
   $title_size       = (int) $title_size;
   $title_css  .= "font-size: {$title_size}px;";
}

$query = new WP_Query( $args );
$slider_nav_class = $data['slider_nav'] == 'yes' ? 'slider-nav-enabled' : '';
$slider_dot_class = $data['slider_dots'] == 'yes' ? ' slider-dot-enabled' : '';

?>
<div class="portfolio-slider-default rt-owl-nav-3 owl-wrap <?php echo esc_attr( $slider_nav_class ); ?><?php echo esc_attr( $slider_dot_class ); ?>">
	<div class="owl-theme owl-carousel rt-owl-carousel" data-carousel-options="<?php echo esc_attr( $data['owl_data'] );?>">	
		<?php
			if ( $query->have_posts() ) {
				while ( $query->have_posts() ) {
				$query->the_post();			
				$excerpt = wp_trim_words( get_the_excerpt(), $excerpt_count, '' );
				$portfolio_title = wp_trim_words( get_the_title(), $title_count, '' );
		?>
		<div class="rtin-item">
			<div class="rtin-figure">
				<a href="<?php the_permalink(); ?>">
					<?php
						if ( has_post_thumbnail() ){
							the_post_thumbnail( $thumb_size, ['class' => 'img-fluid mb-10 width-100'] );
						} else {
							if ( !empty( ClenixTheme::$options['no_preview_image']['id'] ) ) {
								echo wp_get_attachment_image( ClenixTheme::$options['no_preview_image']['id'], $thumb_size );
							} else {
								echo '<img class="wp-post-image" src="' . ClenixTheme_Helper::get_img( 'noimage_620X672.jpg' ) . '" alt="'.get_the_title().'">';
							}
						}
					?>
				</a>
			</div>
			<div class="rtin-content-wrap">
				<div class="rtin-content">
				<h3 style="<?php echo wp_kses_post( $title_css ); ?>"><a href="<?php the_permalink(); ?>"><?php echo esc_html( $portfolio_title );?></a></h3>
				<?php if ( $data['excerpt_display'] == 'yes' ) { ?>
				<p><?php echo wp_kses_post( $excerpt );?></p>
				<?php } ?>
				<?php if ( $data['cat_display'] == 'yes' ) { ?>
				<div class="rtin-cat"><?php
					$i = 1;
					$term_lists = get_the_terms( get_the_ID(), 'clenix_portfolio_category' );
					foreach ( $term_lists as $term_list ){ 
					$link = get_term_link( $term_list->term_id, 'clenix_portfolio_category' ); ?><?php if ( $i > 1 ){ echo esc_html( ', ' ); } ?><a href="<?php echo esc_url( $link ); ?>"><?php echo esc_html( $term_list->name ); ?></a><?php $i++; } ?></div>
				<?php } ?>
				</div>
				<?php if ( $data['read_display'] == 'yes' ) { ?>
					<div class="rtin-read"><a href="<?php the_permalink(); ?>"><?php echo wp_kses_post( $data['buttontext'] );?><i class="fa fa-angle-right" aria-hidden="true"></i></a></div>		
				<?php } ?>
			</div>
		</div>
		<?php } ?>
	<?php } ?>
	<?php wp_reset_postdata();?>
	</div>
</div>