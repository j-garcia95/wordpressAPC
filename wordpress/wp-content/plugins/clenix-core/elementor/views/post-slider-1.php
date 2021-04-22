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

$clenix_has_entry_meta  = ( $data['post_grid_author'] == 'yes' || $data['post_grid_category'] == 'yes' || $data['post_grid_comment'] == 'yes' || $data['post_grid_view'] == 'yes' && function_exists( 'clenix_views' ) || $data['post_grid_read'] == 'yes' && function_exists( 'clenix_reading_time' ) ) ? true : false;

$thumb_size = 'clenix-size7';

$args = array(
	'posts_per_page' 	=> $data['itemlimit'],
	'cat'            	=> (int) $data['cat'],
	'order' 			=> $data['post_ordering'],
	'orderby' 			=> $data['post_orderby'],
);


$query = new WP_Query( $args );
$slider_nav_class = $data['slider_nav'] == 'yes' ? 'slider-nav-enabled' : '';
$slider_dot_class = $data['slider_dots'] == 'yes' ? ' slider-dot-enabled' : '';
?>
<div class="post-default post-grid-style1 rt-owl-nav-2 owl-wrap post-slider-<?php echo esc_attr( $data['style'] );?> <?php echo esc_attr( $slider_nav_class ); ?><?php echo esc_attr( $slider_dot_class ); ?>">
	<div class="owl-theme owl-carousel rt-owl-carousel" data-carousel-options="<?php echo esc_attr( $data['owl_data'] );?>">
		<?php if ( $query->have_posts() ) : ?>
			<?php while ( $query->have_posts() ) : $query->the_post();?>
				<?php
				$content = ClenixTheme_Helper::get_current_post_content();
				$content = wp_trim_words( get_the_excerpt(), $data['count'], '' );
				$content = "<p>$content</p>";
				$title = wp_trim_words( get_the_title(), $data['title_count'], '' );
				
				$clenix_comments_number = number_format_i18n( get_comments_number() );
				$clenix_comments_html = $clenix_comments_number == 1 ? esc_html__( 'Comment' , 'clenix-core' ) : esc_html__( 'Comments' , 'clenix-core' );
				$clenix_comments_html = '<span class="comment-number">'. $clenix_comments_number .'</span> '. $clenix_comments_html;
				
				$clenix_time_html = sprintf( '<span><span>%s</span><br>%s<br>%s<br></span>', get_the_time( 'd' ),get_the_time( 'M' ), get_the_time( 'Y' ) );

				?>
				<div class="rtin-item">
					<div class="rtin-single-post">
						<div class="rtin-img">
							<a href="<?php the_permalink(); ?>">
								<?php
									if ( has_post_thumbnail() ){
										the_post_thumbnail( $thumb_size );
									}
									else {
										if ( !empty( ClenixTheme::$options['no_preview_image']['id'] ) ) {
											echo wp_get_attachment_image( ClenixTheme::$options['no_preview_image']['id'], $thumb_size );
										}
										else {
											echo '<img class="wp-post-image" src="' . ClenixTheme_Helper::get_img( 'noimage_610X414.jpg' ) . '" alt="'.get_the_title().'">';
										}
									}
								?>
							</a>
							<?php if ( $data['post_grid_date'] == 'yes' ) { ?>
							<span class="date-meta"><?php echo wp_kses_post( $clenix_time_html ); ?></span><?php } ?>
						</div>
						<div class="rtin-content">
							<h3 class="rtin-title"><a href="<?php the_permalink();?>"><?php echo esc_html( $title );?></a></h3>
							<?php if ( $clenix_has_entry_meta ) { ?>
							<ul class="post-grid-meta">
								<?php if ( $data['post_grid_author'] == 'yes' ) { ?>
								<li class="item-author"><i class="fa fa-user" aria-hidden="true"></i><?php esc_html_e( 'by ',  'clenix-core' );?><?php the_author_posts_link(); ?></li>
								<?php } if ( $data['post_grid_category'] == 'yes' ) { ?>
								<li class="blog-cat"><i class="fa fa-tag" aria-hidden="true"></i><?php echo the_category( ', ' );?></li>
								<?php } if ( $data['post_grid_comment'] == 'yes' ) { ?>
								<li><i class="fa fa-comment" aria-hidden="true"></i><a href="<?php echo get_comments_link( get_the_ID() ); ?>"><?php echo wp_kses_post( $clenix_comments_html );?></a></li>
								<?php } if ( $data['post_grid_view'] == 'yes' && function_exists( 'clenix_views' ) ) { ?>
								<li><i class="fa fa-heart" aria-hidden="true"></i><span class="meta-views meta-item "><?php echo clenix_views(); ?></span></li>
								<?php } if ( $data['post_grid_read'] == 'yes' && function_exists( 'clenix_reading_time' ) ) { ?>
								<li class="meta-reading-time meta-item"><i class="fa fa-clock-o" aria-hidden="true"></i><?php echo clenix_reading_time(); ?></li>
								<?php } ?>
							</ul>
							<?php } ?>
							<?php echo wp_kses_post( $content );?>
							<?php if ( $data['read_display'] == 'yes' ) { ?>
							<a class="post-grid-more" href="<?php the_permalink();?>"><?php echo wp_kses_post( $data['buttontext'] );?><i class="fa fa-long-arrow-right" aria-hidden="true"></i></a>
							<?php } ?>
						</div>
					</div>
				</div>
			<?php endwhile;?>
		<?php endif;?>
	<?php wp_reset_postdata();?>
	</div>
</div>