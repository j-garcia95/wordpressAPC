<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

$thumb_size 			= 'clenix-size7';
$id = get_the_ID();
$content = get_the_content();
$content = apply_filters( 'the_content', $content );
$content = wp_trim_words( get_the_excerpt(), ClenixTheme::$options['portfolio_arexcerpt_limit'], '' );

$icon_class 			= '' ;
if ( empty( $clenix_service_icon ) && empty( $clenix_service_img )  ) {
	$icon_class 		= ' no-icon';	
}
?>
<article id="post-<?php the_ID(); ?>">
	<div class="rtin-item">
				<div class="rtin-figure">
					<a href="<?php the_permalink(); ?>">
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
					</a>
					<span class="rtin-icon"><a href="<?php the_permalink(); ?>"><i class="fa fa-long-arrow-right" aria-hidden="true"></i></a></span>
				</div>
				<div class="rtin-content">
					<h3><a href="<?php the_permalink();?>"><?php the_title();?></a></h3>
					<?php if ( ClenixTheme::$options['port_ar_excerpt'] ) { ?>
					<p><?php echo wp_kses( $content , 'alltext_allow' ); ?></p>
					<?php } ?>
					<?php if ( ClenixTheme::$options['port_ar_category'] ) { ?>
					<div class="rtin-cat"><?php
						$i = 1;
						$term_lists = get_the_terms( get_the_ID(), 'clenix_portfolio_category' );
						foreach ( $term_lists as $term_list ){ 
						$link = get_term_link( $term_list->term_id, 'clenix_portfolio_category' ); ?><?php if ( $i > 1 ){ echo esc_html( ', ' ); } ?><a href="<?php echo esc_url( $link ); ?>"><?php echo esc_html( $term_list->name ); ?></a><?php $i++; } ?></div>
					<?php } ?>
				</div>
			</div>
</article>