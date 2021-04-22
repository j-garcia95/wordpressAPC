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

$thumb_size  = 'clenix-size4';

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
?>

<div class="default-testimonial rtin-testimonial-4">	
	<div class="slick-carousel slick-carousel-content" data-slick='{
		"slidesToShow": 1,
		"slidesToShowTab": 1,
		"slidesToShowMobile": 1,
		"slidesToScroll": 1,
		"speed": 600,
		"autoplaySpeed": 2000,
		"dots": false,
		"arrows": false,
		"lazyLoad": "progressive",
		"pauseOnHover": true,
		"autoplay": false,
		"adaptiveHeight": false,
		"rtl": <?php echo is_rtl() ? 'true' : 'false'; ?>,
		"asNavFor": ".slick-carousel-nav"
		}'>
		
		<?php if ( $query->have_posts() ) { ?>
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
				<div class="rtin-item">
					<div class="rtin-content">
						<?php if ( $data['thumbs_display']  == 'yes' ) { ?>
						<div class="rtin-figure">
							<?php if ( has_post_thumbnail() ) { ?>
								<div class="rtin-thumb"><?php the_post_thumbnail( 'thumbnail' );?></div>
							<?php } ?>
						</div>
						<?php } ?>
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
						<?php echo wp_kses_post( $content ); ?>
						<h3 class="rtin-title"><?php the_title(); ?></h3>
						<div class="rtin-designation"><?php if ( $data['designation_display']  == 'yes' && $designation ) { ?><span><?php echo esc_html( $designation );?></span><?php } ?></div>
					</div>
				</div>
			<?php endwhile; ?>
		<?php } ?>
	</div>
	<div class="slick-carousel slick-carousel-nav testim-box-nav" data-slick='{
		"slidesToShow": <?php echo esc_html( $data['number'] ); ?>,
		"slidesToShowTab": <?php echo esc_html( $data['number'] ); ?>,
		"slidesToShowMobile": <?php echo esc_html( $data['number'] ); ?>,
		"slidesToScroll": 1,
		"speed": 600,
		"autoplaySpeed": 2000,
		"dots": false,
		"arrows": true,
		"lazyLoad": "progressive",
		"pauseOnHover": true,
		"autoplay": false,
		"focusOnSelect": true,
		"centerMode": true,
		"adaptiveHeight": false,
		"rtl": false,
		"asNavFor": ".slick-carousel-content",
		"prevArrow": "<span class=\"slick-prev slick-navigation\"><i class=\"fa fa-angle-left\"></i></span>",
		"nextArrow": "<span class=\"slick-next slick-navigation\"><i class=\"fa fa-angle-right\"></i></span>"
		}'>
		<?php if ( $query->have_posts() ) { ?>
			<?php while ( $query->have_posts() ) : $query->the_post();?>
				<div class="nav-item">
					<?php
					if ( has_post_thumbnail() ){
						the_post_thumbnail( $thumb_size );
					}
					else {
						if ( !empty( ClenixTheme::$options['no_preview_image']['id'] ) ) {
							echo wp_get_attachment_image( ClenixTheme::$options['no_preview_image']['id'], $thumb_size );
						}
						else {
							echo '<img class="wp-post-image" src="' . ClenixTheme_Helper::get_img( 'noimage_520X520.jpg' ) . '" alt="'.get_the_title().'">';
						}
					}
					?>
				</div>
			<?php endwhile;?>
		<?php } ?>
	</div>
</div>


