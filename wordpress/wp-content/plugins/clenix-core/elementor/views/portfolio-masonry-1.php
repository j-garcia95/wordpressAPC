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


$number_of_post = $data['itemnumber'];
// sort
$post_sorting = $data['orderby'];
// order
$post_ordering = $data['post_ordering'];
$title_count = $data['title_count'];
$excerpt_count = $data['excerpt_count'];
$p_ids = array();

foreach ( $data['posts_not_in'] as $p_idsn ) {
	$p_ids[] = $p_idsn['post_not_in'];
}

$uniqueid = time() . rand( 1, 99 );
$thumb_size = 'clenix-size' . rand( 5, 6 ) ;
//$thumb_size = 'clenix-size4';

$title_css ='';
$title_size = $data['title_size'];

if ( $title_size != '' ) {
   $title_size       = (int) $title_size;
   $title_css  .= " font-size: {$title_size}px;";
}
$gap_class = '';
if ( $data['column_no_gutters'] == 'hide' ) {
   $gap_class  = 'no-gutters';
}
$col_class = "col-lg-{$data['col_lg']} col-md-{$data['col_md']} col-sm-{$data['col_sm']} col-xs-{$data['col_xs']}";

?>
<div class="portfolio-default portfolio-multi-layout-1 portfolio-masonry-<?php echo esc_attr( $data['layout'] );?> <?php if ( $data['all_button'] == 'hide' ) {?>hide-all<?php } ?> rt-isotope-wrapper">
	<div class="text-center">
		<div class="rt-portfolio-tab rt-isotope-tab">
			<?php if ( $data['all_button'] == 'show' ) {?>
				<a href="#" data-filter="*" class="current"><?php esc_html_e( 'All', 'clenix-core' );?></a>
			<?php } ?>
			<?php
				if ( !empty( $data['category_list'] ) ) {
					foreach ( $data['category_list'] as $cat ) {
						$cats[] = array(
							'cat_multi_box' => $cat['cat_multi_box'],
						);
					}
				} else {
					$portfolio_terms = get_terms( 'clenix_portfolio_category', array(
						'hide_empty' => true,
					) );
					foreach ( $portfolio_terms as $portfolio_term ){
						$cats[] = array(
							'cat_multi_box' => $portfolio_term->term_id,
						);
					}	
				}
				
				if ( !empty( $cats ) ) {
				//category
				$category_number = count( $cats );
					foreach ( $cats as $cat ) {
					if ( $cat['cat_multi_box'] != 0 ) {
						$term_name = get_term( $cat['cat_multi_box'], 'clenix_portfolio_category' );						
						$cat_filter = $term_name->slug; ?>
						<a href="#" data-filter=".<?php echo esc_attr( $cat_filter );?>"><?php echo esc_html( $term_name->name );?></a>
				<?php } } } ?>
		</div>
	</div>	
	<div class="row <?php echo esc_attr( $gap_class ); ?> rt-portfolio-content rt-isotope-content rt-masonry-grid">	
		<?php
			$i = 1;
			$do_not_duplicate = array();
			foreach ( $cats as $cat  ) {
			$args = array(
				'post_type' => 'clenix_portfolio',
				'posts_per_page' => $number_of_post,
				'order' => $post_ordering,
				'tax_query' => array(
					array(
						'taxonomy' => 'clenix_portfolio_category',
						'field'    => 'id',
						'terms'    => $cat['cat_multi_box'],
					),
				),
				'post__not_in'   => $p_ids,
			);
			
			$args['orderby'] = $post_sorting;
			
			$query = new WP_Query( $args );
			
			$temp = ClenixTheme_Helper::wp_set_temp_query( $query );
			
			if ( $query->have_posts() ) {
				
				while ( $query->have_posts() ) {
				$query->the_post();			
				
				$portfolio_id = get_the_ID();
				
				if( !in_array( $portfolio_id , $do_not_duplicate ) ) {
				//uniqe post sure	
				$do_not_duplicate[] = $portfolio_id;
				$excerpt = wp_trim_words( get_the_excerpt(), $excerpt_count, '' );
				$portfolio_title = wp_trim_words( get_the_title(), $title_count, '' );
				
				$item_terms = get_the_terms( get_the_ID(), 'clenix_portfolio_category' );
				
				$term_links = array();
				
				foreach ( $item_terms as $term ) {
					$term_links[] = $term->slug;
				}
				$terms_of_item = join( " ", $term_links );
		?>
		<div class="<?php echo esc_attr( $col_class ). ' '; echo esc_html( $terms_of_item ); ?> rt-grid-item">
			<div class="rtin-item">
				<div class="rtin-figure">
					<a href="<?php the_permalink(); ?>">
						<?php
							if ( has_post_thumbnail() ){
								the_post_thumbnail( ('clenix-size' . rand( 5, 6 ) ) , ['class' => 'img-fluid mb-10 width-100'] );
							} else {
								if ( !empty( ClenixTheme::$options['no_preview_image']['id'] ) ) {
									echo wp_get_attachment_image( ClenixTheme::$options['no_preview_image']['id'], ('clenix-size' . rand( 5, 6 ) ) );
								} else {
									echo '<img class="wp-post-image" src="' . ClenixTheme_Helper::get_img( 'noimage_610X580.jpg' ) . '" alt="'.get_the_title().'">';
								}
							}
						?>
					</a>
					<span class="rtin-icon"><a href="<?php the_permalink(); ?>"><i class="fa fa-long-arrow-right" aria-hidden="true"></i></a></span>
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
			
		<?php $i++; } } ?>
	<?php } ClenixTheme_Helper::wp_reset_temp_query( $temp ); 
			} ?>
		<?php if ( $data['more_button'] == 'show' ) { ?>
			<div class="portfolio-button col-12">
				<a class="clenix-button-1" href="<?php echo esc_url( $data['see_button_link'] );?>"><?php echo esc_html( $data['see_button_text'] );?></a></div>
		<?php } ?>
	</div>             
</div>