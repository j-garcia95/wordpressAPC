<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

$thumb_size 			= 'clenix-size5';
$id            			= get_the_id();
$clenix_service_icon   	= get_post_meta( get_the_ID(), 'clenix_service_icon', true );
$clenix_service_img   	= get_post_meta( get_the_ID(), 'clenix_service_img', true );
$icon_class 			= '' ;
if ( empty( $clenix_service_icon ) && empty( $clenix_service_img )  ) {
	$icon_class 		= ' no-icon';	
}

$id = get_the_ID();
$content = get_the_content();
$content = apply_filters( 'the_content', $content );
$content = wp_trim_words( get_the_excerpt(), ClenixTheme::$options['service_excerpt_limit'], '' );

?>

<article id="post-<?php the_ID(); ?>">
	<div class="rtin-item <?php echo esc_attr( $icon_class ); ?>">
		<div class="rtin-figure">
			<a href="<?php the_permalink(); ?>">
				<?php
					if ( has_post_thumbnail() ){
						the_post_thumbnail( $thumb_size, ['class' => 'img-fluid mb-10 width-100'] );
					} else {
						if ( !empty( ClenixTheme::$options['no_preview_image']['id'] ) ) {
							echo wp_get_attachment_image( ClenixTheme::$options['no_preview_image']['id'], $thumb_size );
						} else {
							echo '<img class="wp-post-image" src="' . ClenixTheme_Helper::get_img( 'noimage_620X672.jpg' ) . '" alt="'.get_the_title().'">';
						}
					}
				?>
			</a>
		</div>
		<div class="rtin-content">
			<?php if (!empty( $clenix_service_icon ) || !empty( $clenix_service_img )) { ?>
			<div class="rtin-icon">
				<?php if ( $clenix_service_img ) : ?>
					<span><?php echo wp_get_attachment_image( $clenix_service_img );?></span>
				<?php else: ?>
					<span><i class="<?php echo wp_kses_post( $clenix_service_icon );?>"></i></span>
				<?php endif; ?>
			</div>
			<?php } ?>
			<h3><a href="<?php the_permalink();?>"><?php the_title();?></a></h3>
			<div class="hover-content">
				<div class="blog-text"><?php echo wp_kses( $content , 'alltext_allow' ); ?></div>
				<div class="rtin-read"><a class="yellow-button-1" href="<?php the_permalink(); ?>"><?php esc_html_e( 'Read More', 'clenix-core' );?></a></div>
			</div>
		</div>
	</div>
</article>