<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

global $post;

$clenix_team_designation 	= get_post_meta( $post->ID, 'clenix_team_designation', true );
$clenix_team_email    		= get_post_meta( $post->ID, 'clenix_team_email', true );
$clenix_team_phone    		= get_post_meta( $post->ID, 'clenix_team_phone', true );
$clenix_team_address    	= get_post_meta( $post->ID, 'clenix_team_address', true );
$clenix_team_skill       	= get_post_meta( $post->ID, 'clenix_team_skill', true );
$clenix_team_counter      	= get_post_meta( $post->ID, 'clenix_team_count', true );
$socials        			= get_post_meta( $post->ID, 'clenix_team_socials', true );
$socials        			= array_filter( $socials );
$socials_fields 			= ClenixTheme_Helper::team_socials();

$clenix_team_contact_form 	= get_post_meta( $post->ID, 'clenix_team_contact_form', true );

$thumb_size = 'clenix-size5';
?>
<div id="post-<?php the_ID(); ?>" <?php post_class( 'team-single' ); ?>>
	<div class="team-content-wrap">
		<div class="container">
			<div class="row">
				<div class="col-xl-4 col-12">
					<div class="rtin-thumb">
						<?php
							if ( has_post_thumbnail() ){
								the_post_thumbnail( $thumb_size );
							} else {
								if ( !empty( ClenixTheme::$options['no_preview_image']['id'] ) ) {
									echo wp_get_attachment_image( ClenixTheme::$options['no_preview_image']['id'], $thumb_size );
								} else {
									echo '<img class="wp-post-image" src="' . ClenixTheme_Helper::get_img( 'noimage_620X672.jpg' ) . '" alt="'.get_the_title().'">';
								}
							}
						?>	
					</div>
				</div>
				<div class="col-xl-8 col-12">
					<div class="rtin-content">
						<div class="rtin-heading">
							<?php if ( $clenix_team_designation ) { ?>
							<span class="designation"><span><?php esc_html_e( 'Designation', 'clenix' );?> : </span><?php echo esc_html( $clenix_team_designation );?></span>
							<?php } ?>
						</div>
						<?php if ( !empty( $socials ) ) { ?>
						<ul class="rtin-social"><span><i class="fa fa-share-alt" aria-hidden="true"></i></span>
							<?php foreach ( $socials as $key => $value ): ?>
								<li><a target="_blank" href="<?php echo esc_url( $value ); ?>"><i class="fa <?php echo esc_attr( $socials_fields[$key]['icon'] );?>"></i></a></li>
							<?php endforeach; ?>
						</ul>						
						<?php } ?>
						<ul class="rtin-team-info">
							<?php if ( !empty( $clenix_team_phone ) ) { ?>	
								<li><i class="flaticon-call-answer"></i><span class="rtin-label"><?php esc_html_e( 'Phone', 'clenix' );?> : </span><a href="mailto:<?php echo esc_html( $clenix_team_phone );?>"><?php echo esc_html( $clenix_team_phone );?></a></li>
							<?php } if ( !empty( $clenix_team_address ) ) { ?>	
								<li><i class="flaticon-maps-and-flags"></i><span class="rtin-label"><?php esc_html_e( 'Address', 'clenix' );?> : </span><?php echo esc_html( $clenix_team_address );?></li>
							<?php } if ( !empty( $clenix_team_email ) ) { ?>	
								<li><i class="flaticon-message"></i><span class="rtin-label"><?php esc_html_e( 'Email', 'clenix' );?> : </span><a href="mailto:<?php echo esc_html( $clenix_team_email );?>"><?php echo esc_html( $clenix_team_email );?></a></li>
							<?php } ?>
						</ul>
						<?php the_content();?>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- Team Skills -->
	<?php if ( !empty( $clenix_team_skill ) ) { ?>
	<div class="team-skill-wrap">
		<div class="container">
			<div class="rtin-skills">
				<h3><?php esc_html_e( 'Skill', 'clenix' );?></h3>
				<?php foreach ( $clenix_team_skill as $skill ): ?>
					<?php
					if ( empty( $skill['skill_name'] ) || empty( $skill['skill_value'] ) ) {
						continue;
					}
					$skill_value = (int) $skill['skill_value'];
					$skill_style = "width:{$skill_value}%;";

					if ( !empty( $skill['skill_color'] ) ) {
						$skill_style .= "background-color:{$skill['skill_color']};";
					}
					?>
					<div class="rtin-skill-each">
						<div class="rtin-name"><?php echo esc_html( $skill['skill_name'] );?></div>
						<div class="progress">
							<div class="progress-bar progress-bar-striped fadeInLeft animated" data-progress="<?php echo esc_attr( $skill_value );?>%" style="<?php echo esc_attr( $skill_style );?>"> <span><?php echo esc_html( $skill_value );?>%</span></div>
						</div>								
					</div>
				<?php endforeach;?> 
			</div>
		</div>
	</div>
	<?php } ?>
	<!-- Contact form -->
	<?php if ( !empty( $clenix_team_contact_form ) ) { ?>
	<div class="team-contact-wrap">
		<div class="container">
			<h3><?php esc_html_e( 'Contact', 'clenix' );?></h3>
			<?php echo do_shortcode( $clenix_team_contact_form );?>
		</div>
	</div>
	<?php } ?>
</div>