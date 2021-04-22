<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

if( ! function_exists( 'clenix_related_post' )){
	
	function clenix_related_post(){
			
		$post_id = get_the_id();	
		$number_of_avail_post = '';
		$current_post = array( $post_id );	
		$title_length = ClenixTheme::$options['show_related_post_title_limit'] ? ClenixTheme::$options['show_related_post_title_limit'] : '';
		$related_post_number = ClenixTheme::$options['show_related_post_number'];

		# Making ready to the Query ...
		$query_type = ClenixTheme::$options['related_post_query'];

		$args = array(
			'post__not_in'           => $current_post,
			'posts_per_page'         => $related_post_number,
			'no_found_rows'          => true,
			'post_status'            => 'publish',
			'ignore_sticky_posts'    => true,
			'update_post_term_cache' => false,
		);

		# Checking Related Posts Order ----------
		if( ClenixTheme::$options['related_post_sort'] ){

			$post_order = ClenixTheme::$options['related_post_sort'];

			if( $post_order == 'rand' ){

				$args['orderby'] = 'rand';
			}
			elseif( $post_order == 'views' ){

				$args['orderby']  = 'meta_value_num';
				$args['meta_key'] = 'clenix_views';
			}
			elseif( $post_order == 'popular' ){

				$args['orderby'] = 'comment_count';
			}
			elseif( $post_order == 'modified' ){

				$args['orderby'] = 'modified';
				$args['order']   = 'ASC';
			}
			elseif( $post_order == 'recent' ){

				$args['orderby'] = '';
				$args['order']   = '';
			}
		}


		# Get related posts by author ----------
		if( $query_type == 'author' ){
			$args['author'] = get_the_author_meta( 'ID' );
		}

		# Get related posts by tags ----------
		elseif( $query_type == 'tag' ){
			$tags_ids  = array();
			$post_tags = get_the_terms( $post_id, 'post_tag' );

			if( ! empty( $post_tags ) ){
				foreach( $post_tags as $individual_tag ){
					$tags_ids[] = $individual_tag->term_id;
				}

				$args['tag__in'] = $tags_ids;
			}
		}

		# Get related posts by categories ----------
		else{
			$category_ids = array();
			$categories   = get_the_category( $post_id );

			foreach( $categories as $individual_category ){
				$category_ids[] = $individual_category->term_id;
			}

			$args['category__in'] = $category_ids;
		}

		# Get the posts ----------
		$related_query = new wp_query( $args );
		/*the_carousel*/
		if ( ClenixTheme::$layout == 'full-width' ) {
			$responsive = array(
				'0'    => array( 'items' => 1 ),
				'480'  => array( 'items' => 2 ),
				'768'  => array( 'items' => 3 ),
				'992'  => array( 'items' => 4 ),
			);
		}
		else {
			$responsive = array(
				'0'    => array( 'items' => 1 ),
				'480'  => array( 'items' => 2 ),
				'768'  => array( 'items' => 2 ),
				'992'  => array( 'items' => 3 ),
			);
		}
		
		$count_post = $related_query->post_count;
		if ( $count_post < 4 ) {
			$number_of_avail_post = false;
		} else {
			$number_of_avail_post = true;
		}
		$owl_data = array( 
			'nav'                => false,
			'dots'               => false,
			'autoplay'           => false,
			'autoplayTimeout'    => '5000',
			'autoplaySpeed'      => '200',
			'autoplayHoverPause' => true,
			'loop'               => $number_of_avail_post,
			'margin'             => 10,
			'responsive'         => $responsive
		);

		$owl_data = json_encode( $owl_data );
		wp_enqueue_style( 'owl-carousel' );
		wp_enqueue_style( 'owl-theme-default' );
		wp_enqueue_script( 'owl-carousel' );
		
		
		$wrapper_class = '';
		if ( !$count_post ) {
			$wrapper_class .= ' no-nav';
		}
		
		if( $related_query->have_posts() ) { ?>
		
		<div class="owl-wrap rt-woo-nav rt-related-post related post <?php echo esc_attr( $wrapper_class );?>">
			<div class="title-section">
				<h2 class="owl-custom-nav-title"><?php esc_html_e ( 'You May Also Like', 'clenix' ); ?></h2>
				<?php if ( $count_post > 3 ){ ?>
				<div class="owl-custom-nav owl-nav">
					<div class="owl-prev"><i class="fa fa-angle-left"></i></div><div class="owl-next"><i class="fa fa-angle-right"></i></div>
				</div>
				<?php } ?>
				<div class="owl-custom-nav-bar"></div>
				<div class="clear"></div>
			</div>
			<div class="owl-theme owl-carousel rt-owl-carousel" data-carousel-options="<?php echo esc_attr( $owl_data );?>">
				<?php
					while ( $related_query->have_posts() ) {
					$related_query->the_post();
					$trimmed_title = wp_trim_words( get_the_title(), $title_length, '' );
				?>
					<div class="position-relative">
						<?php if ( has_post_thumbnail() || ClenixTheme::$options['display_no_prev_img_related_post'] == '1'  ) { ?>
						<a href="<?php the_permalink(); ?>">
							<div class="img-scale-animate">
							<?php
								$id = get_the_ID();
								$thumbnail = false;
								if ( has_post_thumbnail() ){
									$post_thumbnail_id = get_post_thumbnail_id( $id );
									$image_attributes = wp_get_attachment_image_src( $post_thumbnail_id , 'clenix-size3'  );
									if ( $image_attributes ) : ?>
										<img src="<?php echo esc_attr( $image_attributes[0] ); ?>" width="<?php echo esc_attr( $image_attributes[1] ); ?>" height="<?php echo esc_attr( $image_attributes[2] ); ?>" />
									<?php endif; 
								} else {
									if ( ClenixTheme::$options['display_no_prev_img_related_post'] == '1' ) {
									$thumbnail = '<img class="" src="'.CLENIX_IMG_URL.'noimage_450X330.jpg" alt="'. the_title_attribute(array('echo'=> false)) .'">';
									}
								}
								echo wp_kses( $thumbnail , 'alltext_allow' );
							?>
							</div>
						</a>
						<?php } ?>
						<div class="rt-related-post-info">
							<div class="post-date">
								<ul>
									<?php if ( ClenixTheme::$options['show_related_post_cat'] ) { ?>
									<li><i class="fa fa-tag" aria-hidden="true"></i><?php echo esc_html( clenix_get_primary_category()[0]->name ); ?></li>
									<?php } if ( ClenixTheme::$options['show_related_post_date'] ) { ?>
									<li><i class="fa fa-clock-o" aria-hidden="true"></i><?php echo get_the_date(); ?>,</li>
									<?php } ?>
								</ul>
							</div>
							<h3 class="post-title">
								<a href="<?php the_permalink(); ?>"><?php echo esc_html ( $trimmed_title ); ?></a>
							</h3>
						</div>
					</div>
				<?php } ?>
			</div>
		</div>

		<?php }

		wp_reset_postdata();
	}
}
?>