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
	'post_type' 		=> 'clenix_service',
	'post_status' 		=> 'publish',
	'orderby' 			=> $post_sorting,
	'order' 			=> $post_ordering,
	'posts_per_page' 	=> $number_of_post,
	'paged'          	=> $paged,
);

if ( $cat_single_grid != 0 ) {
	$args['tax_query'] = array (
		array (
			'taxonomy' => 'clenix_service_category',
			'field'    => 'ID',
			'terms'    => $cat_single_grid,
		)
	);
}

$query = new WP_Query( $args );
$temp = ClenixTheme_Helper::wp_set_temp_query( $query );
$col_class = "col-lg-{$data['col_lg']} col-md-{$data['col_md']} col-sm-{$data['col_sm']} col-xs-{$data['col_xs']}";

?>
<div class="service-slider-default service-<?php echo esc_attr( $data['style'] );?>">
	<div class="row" >	
		<?php
			if ( $query->have_posts() ) {
				while ( $query->have_posts() ) {
				$query->the_post();			
				$excerpt 				= wp_trim_words( get_the_excerpt(), $excerpt_count, '' );
				$portfolio_title 		= wp_trim_words( get_the_title(), $title_count, '' );
				$clenix_service_icon   	= get_post_meta( get_the_ID(), 'clenix_service_icon', true );
				$clenix_service_img   	= get_post_meta( get_the_ID(), 'clenix_service_img', true );
				$icon_class = '' ;
				if ( empty( $clenix_service_icon ) && empty( $clenix_service_img )  ) {
					$icon_class = ' no-icon';	
				}
			?>
			<div class="<?php echo esc_attr( $col_class ) ?>">
				<div class="rtin-item">
					<h3 class="rtin-title"><a href="<?php the_permalink(); ?>"><?php echo esc_html( $portfolio_title );?></a></h3>
					<?php if (!empty( $clenix_service_icon ) || !empty( $clenix_service_img )) { ?>
					<div class="rtin-icon">
						<?php if ( $clenix_service_img ) : ?>
							<?php echo wp_get_attachment_image( $clenix_service_img );?>
						<?php else: ?>
							<span><i class="<?php echo wp_kses_post( $clenix_service_icon );?>"></i></span>
						<?php endif; ?>
					</div>
					<?php } ?>				
					<div class="rtin-content">
						<?php if ( $data['excerpt_display'] == 'yes' ) { ?>
						<p><?php echo wp_kses_post( $excerpt );?></p>
						<?php } ?>
						
						<?php if ( $data['read_display'] == 'yes' ) { ?>
							<div class="rtin-read"><a href="<?php the_permalink(); ?>"><i class="fa fa-arrow-circle-right" aria-hidden="true"></i><?php echo wp_kses_post( $data['buttontext'] );?></a></div>		
						<?php } ?>
					</div>
				</div>
			</div>
		<?php } ?>
	<?php } ?>
	<?php wp_reset_postdata();?>
	</div>
</div>