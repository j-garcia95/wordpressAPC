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


$thumb_size = 'clenix-size7';
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

$query = new WP_Query( $args );
$temp = ClenixTheme_Helper::wp_set_temp_query( $query );

$title_css ='';
$title_size = $data['title_size'];

if ( $title_size != '' ) {
   $title_size       = (int) $title_size;
   $title_css  .= "font-size: {$title_size}px;";
}
$gap_class = '';
if ( $data['column_no_gutters'] == 'hide' ) {
   $gap_class  = 'no-gutters';
}
$col_class = "col-lg-{$data['col_lg']} col-md-{$data['col_md']} col-sm-{$data['col_sm']} col-xs-{$data['col_xs']}";

?>
<div class="portfolio-default portfolio-multi-layout-2 portfolio-grid-<?php echo esc_attr( $data['layout'] );?>">
	<div class="row <?php echo esc_attr( $gap_class ); ?> rt-masonry-grid">	
		<?php
			if ( $query->have_posts() ) {
				while ( $query->have_posts() ) {
				$query->the_post();			
				$excerpt = wp_trim_words( get_the_excerpt(), $excerpt_count, '' );
				$portfolio_title = wp_trim_words( get_the_title(), $title_count, '' );
		?>
		<div class="<?php echo esc_attr( $col_class ) ?> rt-grid-item">
			<div class="rtin-item">
				<div class="rtin-figure">
					<?php
						if ( has_post_thumbnail() ){
							the_post_thumbnail( $thumb_size, ['class' => 'img-fluid mb-10 width-100'] );
						} else {
							if ( !empty( ClenixTheme::$options['no_preview_image']['id'] ) ) {
								echo wp_get_attachment_image( ClenixTheme::$options['no_preview_image']['id'], $thumb_size );
							} else {
								echo '<img class="wp-post-image" src="' . ClenixTheme_Helper::get_img( 'noimage_610X414.jpg' ) . '" alt="'.get_the_title().'">';
							}
						}
					?>
					<a href="<?php the_permalink(); ?>" class="hover-dot">
						<span></span>
						<span></span>
						<span></span>
					</a>
				</div>
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
			</div>
		</div>
		<?php } ?>
	<?php } ?>
	</div>
		<?php if ( $data['more_button'] == 'show' ) { ?>
			<?php if ( !empty( $data['see_button_text'] ) ) { ?>
			<div class="portfolio-button col-12"><a class="clenix-button-1" href="<?php echo esc_url( $data['see_button_link'] );?>"><?php echo esc_html( $data['see_button_text'] );?></a></div><?php } ?>
		<?php } else { ?>
			<?php ClenixTheme_Helper::pagination(); ?>
		<?php } ?>
		<?php ClenixTheme_Helper::wp_reset_temp_query( $temp ); ?>
</div>