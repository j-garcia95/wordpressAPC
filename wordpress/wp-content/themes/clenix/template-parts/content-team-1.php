<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

$thumb_size 			= 'clenix-size4';
$id = get_the_ID();
$content = get_the_content();
$content = apply_filters( 'the_content', $content );
$content = wp_trim_words( get_the_excerpt(), ClenixTheme::$options['portfolio_arexcerpt_limit'], '' );

$designation   	= get_post_meta( $id, 'clenix_team_designation', true );
$socials       	= get_post_meta( $id, 'clenix_team_socials', true );
$social_fields 	= ClenixTheme_Helper::team_socials();

$icon_class 			= '' ;
if ( empty( $clenix_service_icon ) && empty( $clenix_service_img )  ) {
	$icon_class 		= ' no-icon';	
}
?>
<article id="post-<?php the_ID(); ?>">
	<div class="rtin-item">
		<div class="rtin-content-wrap">		
			<figure>
				<a href="<?php the_permalink();?>">
				<?php
				if ( has_post_thumbnail() ){
					the_post_thumbnail( $thumb_size );
				}
				else {
					if ( !empty( ClenixTheme::$options['no_preview_image']['id'] ) ) {
						echo wp_get_attachment_image( ClenixTheme::$options['no_preview_image']['id'], $thumb_size );
					}
					else {
						echo '<img class="wp-post-image" src="' . ClenixTheme_Helper::get_img( 'noimage_400X400.jpg' ) . '" alt="'.get_the_title().'">';
					}
				}
				?>
			</a>
			</figure>
			<div class="mask-wrap">
				<div class="rtin-content">
					<h3 class="rtin-title"><a href="<?php the_permalink();?>"><?php the_title();?></a></h3>
						<div class="rtin-designation"><?php echo esc_html( $designation );?></div>
					<ul class="rtin-social">
						<?php foreach ( $socials as $key => $social ): ?>
							<?php if ( !empty( $social ) ): ?>
								<li><a target="_blank" href="<?php echo esc_url( $social );?>"><i class="fa <?php echo esc_attr( $social_fields[$key]['icon'] );?>" aria-hidden="true"></i></a></li>
							<?php endif; ?>
						<?php endforeach; ?>
					</ul>
				</div>
			</div>
		</div>
	</div>
</article>