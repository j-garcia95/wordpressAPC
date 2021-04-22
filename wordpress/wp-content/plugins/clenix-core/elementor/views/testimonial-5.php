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

$args = array(
	'post_type'      => 'clenix_testim',
	'posts_per_page' => $data['number'],
	'orderby'        => $data['orderby'],
);

if ( !empty( $data['cat'] ) ) {
	$args['tax_query'] = array(
		array(
			'taxonomy' => 'clenix_testimonial_category',
			'field' => 'term_id',
			'terms' => $data['cat'],
		)
	);
}

switch ( $data['orderby'] ) {
	case 'title':
	case 'menu_order':
	$args['order'] = 'ASC';
	break;
}

$query = new WP_Query( $args );
$col_class = "col-lg-{$data['col_lg']} col-md-{$data['col_md']} col-sm-{$data['col_sm']} col-xs-{$data['col_xs']}";

?>
<div class="default-testimonial rtin-testimonial-2 rtin-testimonial-grid">
	<div class="row auto-clear">
		<?php if ( $query->have_posts() ) :?>
			<?php while ( $query->have_posts() ) : $query->the_post();?>
				<?php
				$id 			= get_the_id();
				$designation 	= get_post_meta( $id, 'clenix_tes_designation', true );
				$content 		= ClenixTheme_Helper::get_current_post_content();
				$content 		= wp_trim_words( $content, $data['count'], '' );
				$content 		= "<p>$content</p>";
				$ratting	 	= get_post_meta( $id, 'clenix_tes_rating', true );
				$rest_testimonial_rating = 5- intval( $ratting ) ;
				?>
				<div class="<?php echo esc_attr( $col_class );?>">
				<div class="rtin-item">
					<div class="rtin-icon"><i class="fa fa-quote-right"></i></div>
					<div class="rtin-content">
						<?php echo wp_kses_post( $content ); ?>
						<?php if ( $data['thumbs_display']  == 'yes' ) { ?>
						<div class="rtin-figure">
							<?php if ( has_post_thumbnail() ) { ?>
								<div class="rtin-thumb"><?php the_post_thumbnail( 'thumbnail' );?></div>
							<?php } ?>
						</div>
						<?php } ?>
						<h3 class="rtin-title"><?php the_title(); ?></h3>
						<div class="rtin-designation"><?php if ( $data['designation_display']  == 'yes' && $designation ) { ?><span><?php echo esc_html( $designation );?></span><?php } ?></div>
						
						
						<?php if ( $data['ratting_display']  == 'yes' ) { ?>
							<ul class="rating">
								<?php for ($i=0; $i < $ratting; $i++) { ?>
									<li class="star-rate"><i class="fa fa-star" aria-hidden="true"></i></li>
								<?php } ?>			
								<?php for ($i=0; $i < $rest_testimonial_rating; $i++) { ?>
									<li><i class="fa fa-star" aria-hidden="true"></i></li>
								<?php } ?>
							</ul>
						<?php } ?>
					</div>
				</div>
				</div>
			<?php endwhile;?>
		<?php endif;?>
		<?php wp_reset_query();?>
	</div>
</div>