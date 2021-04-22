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

$prefix      = CLENIX_CORE_THEME_PREFIX;
$thumb_size  = 'clenix-size4';

$args = array(
	'post_type'      => 'clenix_team',
	'posts_per_page' => $data['number'],
	'orderby'        => $data['orderby'],
);

if ( !empty( $data['cat'] ) ) {
	$args['tax_query'] = array(
		array(
			'taxonomy' => 'clenix_team_category',
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
$slider_nav_class = $data['slider_nav'] == 'yes' ? 'slider-nav-enabled' : '';
$slider_dot_class = $data['slider_dots'] == 'yes' ? ' slider-dot-enabled' : '';
?>
<div class="team-default team-multi-layout-6 rt-owl-nav-2 owl-wrap team-slider-<?php echo esc_attr( $data['style'] );?> <?php echo esc_attr( $slider_nav_class ); ?><?php echo esc_attr( $slider_dot_class ); ?>">
	<div class="owl-theme owl-carousel rt-owl-carousel" data-carousel-options="<?php echo esc_attr( $data['owl_data'] );?>">
		<?php if ( $query->have_posts() ) :?>
			<?php while ( $query->have_posts() ) : $query->the_post();?>
				<?php
				$id            	= get_the_id();
				$designation   	= get_post_meta( $id, 'clenix_team_designation', true );
				$socials       	= get_post_meta( $id, 'clenix_team_socials', true );
				$social_fields 	= ClenixTheme_Helper::team_socials();
				?>
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
							<?php if ( !empty( $socials ) && $data['social_display']  == 'yes' ) { ?>
								<ul class="rtin-social">
									<?php foreach ( $socials as $key => $social ): ?>
										<?php if ( !empty( $social ) ): ?>
											<li><a target="_blank" href="<?php echo esc_url( $social );?>"><i class="fa <?php echo esc_attr( $social_fields[$key]['icon'] );?>" aria-hidden="true"></i></a></li>
										<?php endif; ?>
									<?php endforeach; ?>
								</ul>
							<?php } ?>
						</figure>
						<div class="mask-wrap">
							<div class="rtin-content <?php if ( empty( $socials ) ||( $data['social_display']  == NULL ) || $data['social_display']  == '0' ) { ?>no-social<?php } ?>">
								<h3 class="rtin-title"><a href="<?php the_permalink();?>"><?php the_title();?></a></h3>
								<?php if ( $designation && $data['designation_display']  == 'yes' ): ?>
									<div class="rtin-designation"><?php echo esc_html( $designation );?></div>
								<?php endif; ?>
							</div>
						</div>
					</div>
				</div>
			<?php endwhile;?>
		<?php endif;?>
		<?php wp_reset_postdata();?>
	</div>
</div>