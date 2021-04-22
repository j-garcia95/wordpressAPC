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
		<div class="media">
			<?php if (!empty( $clenix_service_icon ) || !empty( $clenix_service_img )) { ?>
			<div class="rtin-icon">
				<?php if ( $clenix_service_img ) : ?>
					<?php echo wp_get_attachment_image( $clenix_service_img );?>
				<?php else: ?>
					<span><i class="<?php echo wp_kses_post( $clenix_service_icon );?>"></i></span>
				<?php endif; ?>
			</div>
			<?php } ?>				
			<div class="media-body rtin-content">
				<h3><a href="<?php the_permalink();?>"><?php the_title();?></a></h3>
				<div class="blog-text"><?php echo wp_kses( $content , 'alltext_allow' ); ?></div>
			</div>
		</div>
	</div>
</article>