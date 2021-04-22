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

$clenix_has_entry_meta  = ( $data['post_grid_date'] == 'yes' || $data['post_grid_category'] == 'yes' || $data['post_grid_comment'] == 'yes' || $data['post_grid_view'] == 'yes' && function_exists( 'clenix_views' ) || $data['post_grid_read'] == 'yes' && function_exists( 'clenix_reading_time' ) ) ? true : false;

$thumb_size = 'clenix-size7';

$args = array(
	'posts_per_page' 	=> $data['itemlimit'],
	'cat'            	=> (int) $data['cat'],
	'order' 			=> $data['post_ordering'],
	'orderby' 			=> $data['post_orderby'],
	
);

$query = new WP_Query( $args );
$temp = ClenixTheme_Helper::wp_set_temp_query( $query );

?>
<div class="post-default post-grid-<?php echo esc_attr( $data['style'] );?>">
	<?php if ( $query->have_posts() ) { ?>
		<?php 
		$i = 1;
		while ( $query->have_posts() ) : $query->the_post(); 
			$content = ClenixTheme_Helper::get_current_post_content();
			$content = wp_trim_words( get_the_excerpt(), $data['count'], '' );
			$content = "<p>$content</p>";
			$title = wp_trim_words( get_the_title(), $data['title_count'], '' );
			
			$clenix_comments_number = number_format_i18n( get_comments_number() );
			$clenix_comments_html = $clenix_comments_number == 1 ? esc_html__( 'Comment' , 'clenix-core' ) : esc_html__( 'Comments' , 'clenix-core' );
			$clenix_comments_html = '<span class="comment-number">'. $clenix_comments_number .'</span> '. $clenix_comments_html;
			
			$thumbnail = false;
			if ( has_post_thumbnail() ){
				$thumbnail = get_the_post_thumbnail( null, $thumb_size , array( 'class' => 'img-responsive' ) );
			}
			else {
				if ( !empty( ClenixTheme::$options['no_preview_image']['id'] ) ) {
					$thumbnail = wp_get_attachment_image( ClenixTheme::$options['no_preview_image']['id'], $thumb_size );
				}
				elseif ( !empty( ClenixTheme::$options['no_preview_image']['url'] ) ) {
					$thumbnail = '<img class="wp-post-image" src="'. CLENIX_IMG_URL .'noimage_610X414.jpg" alt="'.get_the_title().'">';
				}
			}
		?>
		<div class="post-box">
			<div class="row no-gutters content-center">
				<?php if($i % 2 == 0): ?>
				<div class="col-lg-6 no-padding order2">
					<div class="post-content-holder">
						<div class="post-content">
							<div class="text-wrapper">
								<?php if ( $clenix_has_entry_meta ) { ?>
								<ul class="post-grid-meta">
									<?php if ( $data['post_grid_category'] == 'yes' ) { ?>
									<li class="blog-cat"><?php echo the_category( ', ' );?></li>
									<?php } if ( $data['post_grid_date'] == 'yes' ) { ?>
									<li class="blog-date"><?php echo get_the_date(); ?></li>
									<?php } if ( $data['post_grid_comment'] == 'yes' ) { ?>
									<li><i class="fa fa-comment" aria-hidden="true"></i><a href="<?php echo get_comments_link( get_the_ID() ); ?>"><?php echo wp_kses_post( $clenix_comments_html );?></a></li>
									<?php } if ( $data['post_grid_view'] == 'yes' && function_exists( 'clenix_views' ) ) { ?>
									<li><i class="fa fa-heart" aria-hidden="true"></i><span class="meta-views meta-item "><?php echo clenix_views(); ?></span></li>
									<?php } if ( $data['post_grid_read'] == 'yes' && function_exists( 'clenix_reading_time' ) ) { ?>
									<li class="meta-reading-time meta-item"><i class="fa fa-clock-o" aria-hidden="true"></i><?php echo clenix_reading_time(); ?></li>
									<?php } ?>
								</ul>
								<?php } ?>
								<h3 class="rtin-title"><a href="<?php the_permalink();?>"><?php echo esc_html( $title );?></a></h3>
								<?php if ( $data['post_grid_author'] == 'yes' ) { ?>
								<div class="author-meta">
								<i class="fa fa-user" aria-hidden="true"></i><?php esc_html_e( 'by ', 'clenix-core' );?><?php the_author_posts_link(); ?>
								</div>
								<?php } ?>
								<?php echo wp_kses_post( $content );?>
								<?php if ( $data['read_display'] == 'yes' ) { ?>
								<a class="post-grid-more" href="<?php the_permalink();?>"><?php echo wp_kses_post( $data['buttontext'] );?><i class="fa fa-long-arrow-right" aria-hidden="true"></i></a>
								<?php } ?>
							</div>
						</div>
					</div>
				</div>
				<?php endif; ?>
				<div class="col-lg-6 no-padding">
					<div class="post-img-holder">
						<a href="<?php the_permalink(); ?>"><?php echo wp_kses_post( $thumbnail ); ?></a>
					</div>
				</div>
				<?php if($i % 2 != 0): ?>
				<div class="col-lg-6 no-padding order2">
					<div class="post-content-holder">
						<div class="post-content">
							<div class="text-wrapper">
								<?php if ( $clenix_has_entry_meta ) { ?>
								<ul class="post-grid-meta">
									<?php if ( $data['post_grid_category'] == 'yes' ) { ?>
									<li class="blog-cat"><?php echo the_category( ', ' );?></li>
									<?php } if ( $data['post_grid_date'] == 'yes' ) { ?>
									<li class="blog-date"><?php echo get_the_date(); ?></li>
									<?php } if ( $data['post_grid_comment'] == 'yes' ) { ?>
									<li><i class="fa fa-comment" aria-hidden="true"></i><a href="<?php echo get_comments_link( get_the_ID() ); ?>"><?php echo wp_kses_post( $clenix_comments_html );?></a></li>
									<?php } if ( $data['post_grid_view'] == 'yes' && function_exists( 'clenix_views' ) ) { ?>
									<li><i class="fa fa-heart" aria-hidden="true"></i><span class="meta-views meta-item "><?php echo clenix_views(); ?></span></li>
									<?php } if ( $data['post_grid_read'] == 'yes' && function_exists( 'clenix_reading_time' ) ) { ?>
									<li class="meta-reading-time meta-item"><i class="fa fa-clock-o" aria-hidden="true"></i><?php echo clenix_reading_time(); ?></li>
									<?php } ?>
								</ul>
								<?php } ?>
								<h3 class="rtin-title"><a href="<?php the_permalink();?>"><?php echo esc_html( $title );?></a></h3>
								<?php if ( $data['post_grid_author'] == 'yes' ) { ?>
								<div class="author-meta">
								<i class="fa fa-user" aria-hidden="true"></i><?php esc_html_e( 'by ', 'clenix-core' );?><?php the_author_posts_link(); ?>
								</div>
								<?php } ?>
								<?php echo wp_kses_post( $content );?>
								<?php if ( $data['read_display'] == 'yes' ) { ?>
								<a class="post-grid-more" href="<?php the_permalink();?>"><?php echo wp_kses_post( $data['buttontext'] );?><i class="fa fa-long-arrow-right" aria-hidden="true"></i></a>
								<?php } ?>
							</div>
						</div>
					</div>
				</div>
			<?php endif; ?>
			</div>
		</div> 
		<?php 
			$i++;
		endwhile;?>
		<?php wp_reset_query();?>
	<?php } else { ?>
		<div class="<?php echo esc_attr( $col_class ); ?>">
			<?php esc_html_e( 'No Post Found' , 'clenix-core' ); ?>
		</div>
	<?php } ?>
</div>