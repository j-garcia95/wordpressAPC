<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */
$ul_class = $post_classes = '';

$clenix_has_entry_meta  = ( ( !has_post_thumbnail() && ClenixTheme::$options['blog_date'] ) || ClenixTheme::$options['blog_author_name'] || ClenixTheme::$options['blog_comment_num'] || ClenixTheme::$options['blog_cats'] ) ? true : false;

$clenix_has_entry_meta2  = ( ClenixTheme::$options['blog_author_name'] || ClenixTheme::$options['blog_comment_num'] || ClenixTheme::$options['blog_cats'] ) ? true : false;

$clenix_time_html       = sprintf( '%s <span>%s</span>,<span> %s</span>',get_the_time( 'M' ), get_the_time( 'd' ), get_the_time( 'Y' ) );
$clenix_time_html       = apply_filters( 'clenix_single_time', $clenix_time_html );
$clenix_time_html_2     = apply_filters( 'clenix_single_time_no_thumb', get_the_time( get_option( 'date_format' ) ) );

$clenix_comments_number = number_format_i18n( get_comments_number() );
$clenix_comments_html = $clenix_comments_number == 1 ? esc_html__( 'Comment' , 'clenix' ) : esc_html__( 'Comments' , 'clenix' );
$clenix_comments_html = $clenix_comments_number . ' ' . $clenix_comments_html;

$thumbnail = false;

$thumb_size = 'clenix-size3';

if (  ClenixTheme::$layout == 'right-sidebar' || ClenixTheme::$layout == 'right-sidebar' ){
	$post_classes = array( 'col-lg-6 col-md-6 col-sm-6 col-12 rt-grid-item blog-layout-1' );
	$ul_class = 'side_bar';
} else {
	$post_classes = array( 'col-lg-4 col-md-4 col-sm-4 col-12 rt-grid-item blog-layout-1' );
	$ul_class = '';
}
$id = get_the_ID();
$content = get_the_content();
$content = apply_filters( 'the_content', $content );
$content = wp_trim_words( $content, ClenixTheme::$options['post_content_limit'], '' );	
?>
<div id="post-<?php the_ID(); ?>" <?php post_class( $post_classes ); ?>>
	<div class="blog-box">
		<?php if ( has_post_thumbnail() || ClenixTheme::$options['display_no_preview_image'] == '1'  ) { ?>
		<div class="blog-img-holder">
			<div class="blog-img">
			<a href="<?php the_permalink(); ?>" class="img-opacity-hover"><?php if ( has_post_thumbnail() ) { ?>
				<?php the_post_thumbnail( 'clenix-size3', ['class' => 'img-responsive'] ); ?>
					<?php } else {
					if ( ClenixTheme::$options['display_no_preview_image'] == '1' ) {
						if ( !empty( ClenixTheme::$options['no_preview_image']['id'] ) ) {
							$thumbnail = wp_get_attachment_image( ClenixTheme::$options['no_preview_image']['id'], $thumb_size );						
						}
						elseif ( empty( ClenixTheme::$options['no_preview_image']['id'] ) ) {
							$thumbnail = '<img class="wp-post-image" src="'.CLENIX_IMG_URL.'noimage_450X330.jpg" alt="'. the_title_attribute( array( 'echo'=> false ) ) .'">';
						}
						echo wp_kses( $thumbnail , 'alltext_allow' );
					}
				}
				?>
			</a>
			</div>
		</div>
		<?php } ?>
		<div class="blog-content-holder">
			<?php if ( has_post_thumbnail() || ClenixTheme::$options['display_no_preview_image'] == '1'  ) { ?>
				<?php if ( ClenixTheme::$options['blog_date'] ) { ?>
				<div class="post-date"><?php echo get_the_date();?></div>
				<?php } ?>
			<?php } ?>
			
			<h3><a href="<?php the_permalink();?>"><?php the_title();?></a></h3>
			<?php if ( $clenix_has_entry_meta ) { ?>
			<ul>
				<?php if ( ClenixTheme::$options['blog_author_name'] ) { ?>
				<li><?php the_author_posts_link(); ?></li>
				<?php } if ( ClenixTheme::$options['blog_cats'] ) { ?>			
				<li class="blog-cat"><?php echo the_category( ', ' );?></li>
				<?php } if ( ClenixTheme::$options['blog_comment_num'] ) { ?>
				<li><a href="<?php echo get_comments_link( get_the_ID() ); ?>"><?php echo esc_html( $clenix_comments_html );?></a></li>
				<?php } ?>
				<?php if ( ClenixTheme::$options['blog_date'] ) { ?>
				<li><?php if ( !has_post_thumbnail() && ( ClenixTheme::$options['display_no_preview_image'] == 'off'  ) ) { ?>
				<?php echo get_the_date(); ?>
				<?php } ?>
				</li>
				<?php } ?>
			</ul>
			<?php } ?>
			<div class="blog-text"><?php echo wp_kses( $content , 'alltext_allow' ); ?></div>
		</div>
	</div>
</div>