<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

$clenix_has_entry_meta  = ( ( !has_post_thumbnail() && ClenixTheme::$options['post_date'] ) || ClenixTheme::$options['post_author_name'] || ClenixTheme::$options['post_comment_num'] || ClenixTheme::$options['post_cats'] || ( ClenixTheme::$options['post_length'] && function_exists( 'clenix_reading_time' ) ) || ( ClenixTheme::$options['post_view'] && function_exists( 'clenix_views' ) ) ) ? true : false;

$clenix_comments_number = number_format_i18n( get_comments_number() );
$clenix_comments_html = $clenix_comments_number == 1 ? esc_html__( 'Comment' , 'clenix' ) : esc_html__( 'Comments' , 'clenix' );
$clenix_comments_html = '<span class="comment-number">'. $clenix_comments_number .'</span> '. $clenix_comments_html;
$clenix_author_bio      = get_the_author_meta( 'description' );

$author = $post->post_author;

$news_author_fb = get_user_meta( $author, 'clenix_facebook', true );
$news_author_tw = get_user_meta( $author, 'clenix_twitter', true );
$news_author_ld = get_user_meta( $author, 'clenix_linkedin', true );
$news_author_gp = get_user_meta( $author, 'clenix_gplus', true );
$news_author_pr = get_user_meta( $author, 'clenix_pinterest', true );
$clenix_author_designation = get_user_meta( $author, 'clenix_author_designation', true );

// Layout class
if ( ClenixTheme::$layout == 'full-width' ) {
	$clenix_layout_class = 'col-sm-12 col-12';
} else {
	$clenix_layout_class = 'col-xl-8 col-lg-8 col-md-12';
}
?>	
	<?php	
	$id = get_the_ID();
	if ( ClenixTheme::$layout == 'left-sidebar' ) { ?>
		<?php get_sidebar(); ?>
	<?php } ?>
	
	<div id="post-<?php the_ID(); ?>" <?php post_class( $clenix_layout_class); ?> class="<?php echo esc_attr( $clenix_layout_class );?>">
		<?php if ( ClenixTheme::$options['post_featured_image'] == true ) { ?>
			<?php if ( has_post_thumbnail() ) { ?>
				<div class="entry-thumbnail-area position-relative">
					<?php the_post_thumbnail( 'full' , ['class' => 'img-fluid'] ); ?>
				</div>
			<?php } ?>
		<?php } ?>
		<div class="detail-content-holder">
			<div class="entry-header">
				<div class="entry-meta">
					<?php if ( $clenix_has_entry_meta ) { ?>
					<ul class="post-light">
						<?php if ( ClenixTheme::$options['post_author_name'] ) { ?>
						<li class="item-author">
						<?php
							if ( ClenixTheme::$options['post_author_name'] == '1' ) {
								echo get_avatar( get_the_author_meta( 'ID', $author ), 35, null, get_the_author_meta('display_name', $author) );
								echo esc_html__( 'By ', 'clenix' );
								
								printf('<a href="%1$s"><span class="vcard author author_name"><span class="fn">%2$s</span></span></a>',
								esc_url( get_author_posts_url( get_the_author_meta('ID', $author) ) ),
								get_the_author_meta('display_name', $author));
							}
						?></li>
						<?php } if ( ClenixTheme::$options['post_date'] ) { ?>			
						<li><i class="fa fa-calendar" aria-hidden="true"></i><?php echo get_the_date();?></li>
						<?php } if ( ClenixTheme::$options['post_cats'] ) { ?>			
						<li class="blog-cat"><i class="fa fa-tag" aria-hidden="true"></i><?php echo the_category( ', ' );?></li>
						<?php } if ( ClenixTheme::$options['post_length'] && function_exists( 'clenix_reading_time' ) ) { ?>
						<li class="meta-reading-time meta-item"><i class="fa fa-clock-o" aria-hidden="true"></i><?php echo clenix_reading_time(); ?></li>
						<?php } if ( ClenixTheme::$options['post_view'] && function_exists( 'clenix_views' ) ) { ?>
						<li><i class="fa fa-heart" aria-hidden="true"></i><span class="meta-views meta-item "><?php echo clenix_views(); ?></span></li>
						<?php } if ( ClenixTheme::$options['post_comment_num'] ) { ?>
						<li><i class="fa fa-comment" aria-hidden="true"></i><?php echo wp_kses( $clenix_comments_html , 'alltext_allow' ); ?></li>
						<?php } ?>
					</ul>
					<?php } ?>
					<div class="clear"></div>
				</div>
			</div>
			<?php if ( !empty( get_the_content() ) ) { ?>
				<div class="entry-content rt-single-content"><?php the_content();?>
					<?php wp_link_pages( array(
						'before'      => '<div class="page-links">' . __( 'Pages:', 'clenix' ),
						'after'       => '</div>',
						'link_before' => '<span class="page-number">',
						'link_after'  => '</span>',
					) ); ?>
				</div>
			<?php } ?>
		
			<?php if ( ( ClenixTheme::$options['post_tags'] && has_tag() ) || ClenixTheme::$options['post_share'] ) { ?>
			<div class="entry-footer">
				<div class="entry-footer-meta">
					<?php if ( ClenixTheme::$options['post_tags'] && has_tag() ) { ?>
					<div class="item-tags">
						<span><?php esc_html_e( 'Tags :', 'clenix' );?></span><?php echo get_the_term_list( $post->ID, 'post_tag', '' ,',&nbsp; &nbsp;' ,'' ); ?>
					</div>	
					<?php } if ( ( ClenixTheme::$options['post_share'] ) && ( function_exists( 'clenix_post_share' ) ) ) { ?>
					<div class="post-share"><span><?php esc_html_e( 'Share :', 'clenix' );?></span><?php clenix_post_share(); ?></div>
					<?php } ?>
				</div>
			</div>
			<?php } ?>
		</div>
		<!-- next/prev post -->
		<?php if ( ClenixTheme::$options['post_links'] ) { clenix_post_links_next_prev(); } ?>
		<!-- author bio -->
		<?php if ( ClenixTheme::$options['post_author_bio'] == '1' ) { ?>
			<div class="media about-author">
				<div class="<?php if ( is_rtl() ) { ?> pull-right text-right <?php } else { ?> pull-left <?php } ?>">
					<?php echo get_avatar( $author, 105 ); ?>
				</div>
				<div class="media-body">
					<div class="about-author-info">
						<div class="author-title"><?php the_author_posts_link();?></div>
						<div class="author-designation"><?php if ( !empty ( $clenix_author_designation ) ) {	echo esc_html( $clenix_author_designation ); } else {	$user_info = get_userdata( $author ); echo esc_html ( implode( ', ', $user_info->roles ) );	} ?></div>
					</div>
					<ul class="author-box-social">
						<?php if ( ! empty( $news_author_fb ) ){ ?><li><a href="<?php echo esc_attr( $news_author_fb ); ?>"><i class="fa fa-facebook" aria-hidden="true"></i></a></li><?php } ?>
						<?php if ( ! empty( $news_author_tw ) ){ ?><li><a href="<?php echo esc_attr( $news_author_tw ); ?>"><i class="fa fa-twitter" aria-hidden="true"></i></a></li><?php } ?>
						<?php if ( ! empty( $news_author_gp ) ){ ?><li><a href="<?php echo esc_attr( $news_author_gp ); ?>"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li><?php } ?>
						<?php if ( ! empty( $news_author_ld ) ){ ?><li><a href="<?php echo esc_attr( $news_author_ld ); ?>"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li><?php } ?>
						<?php if ( ! empty( $news_author_pr ) ){ ?><li><a href="<?php echo esc_attr( $news_author_pr ); ?>"><i class="fa fa-pinterest-p" aria-hidden="true"></i></a></li><?php } ?>
					</ul>
					<?php if ( $clenix_author_bio ) { ?>
					<div class="author-bio"><?php echo esc_html( $clenix_author_bio );?></div>
					<?php } ?>
				</div>
				<div class="clear"></div>
			</div>			
		<?php } ?>
		
		<?php if( ClenixTheme::$options['show_related_post'] == '1' && is_single() && !empty ( clenix_related_post() ) ) { ?>
		<div class="related-post">
			<?php clenix_related_post(); ?>
		</div>
		<?php } ?>		
		<?php
			if ( comments_open() || get_comments_number() ){
				comments_template();
			}
		?>
	</div>
	
	<?php if ( ClenixTheme::$layout == 'right-sidebar' ) { ?>
		<?php get_sidebar(); ?>
	<?php } ?>