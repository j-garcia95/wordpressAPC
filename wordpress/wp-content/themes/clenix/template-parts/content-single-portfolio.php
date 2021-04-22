<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

$thumb_size = 'clenix-size1';

$clenix_has_entry_meta  = ( ClenixTheme::$options['port_info_title'] || ClenixTheme::$options['port_info_des'] || ClenixTheme::$options['port_start_date'] || ClenixTheme::$options['port_finish_date'] || ClenixTheme::$options['port_client'] || ClenixTheme::$options['port_cats'] || ClenixTheme::$options['port_tags'] || ClenixTheme::$options['port_website'] || ClenixTheme::$options['port_share'] || ClenixTheme::$options['port_rating'] ) ? true : false;

global $post;
$clenix_port_info_title  		= get_post_meta( $post->ID, 'clenix_port_info_title', true );
$clenix_port_des  				= get_post_meta( $post->ID, 'clenix_port_des', true );
$clenix_client_name  			= get_post_meta( $post->ID, 'clenix_client_name', true );
$clenix_start_date  			= get_post_meta( $post->ID, 'clenix_start_date', true );
$clenix_finish_date  			= get_post_meta( $post->ID, 'clenix_finish_date', true );
$clenix_website  				= get_post_meta( $post->ID, 'clenix_website', true );

$clenix_port_gallerys_raw  		= get_post_meta( $post->ID, 'clenix_port_gallery', true );

$ratting	 					= get_post_meta( $post->ID, 'clenix_port_rating', true );
$rest_port_rating 				= 5- intval( $ratting ) ;

$cats   						= wp_get_post_terms( $post->ID, 'clenix_portfolio_category', array( "fields" => "names" ) );
$cats   						= implode( ', ', $cats );

$tags   						= wp_get_post_terms( $post->ID, 'post_tag', array( "fields" => "names" ) );
$tags   						= implode( ', ', $tags );

$socials        				= get_post_meta( $post->ID, 'clenix_portfolio_icons', true );
$socials        				= array_filter( $socials );
$socials_fields 				= ClenixTheme_Helper::team_socials();

$clenix_port_meta = ( !empty($clenix_port_info_title) ) || ( !empty( $clenix_port_des ) ) || ( !empty($clenix_client_name) ) || ( !empty($clenix_start_date) ) || ( !empty($clenix_finish_date) ) || ( !empty($clenix_website) ) || ( !empty( $cats ) || ( !empty( $socials ) ) ) ? true : false;

if ( $clenix_has_entry_meta ) {
	if ( $clenix_port_meta ) {
		$port_thumb_class = 'col-lg-8 col-12';
	} else {
		$port_thumb_class = 'col-lg-12 col-12';	
	}
} else {
	$port_thumb_class = 'col-lg-12 col-12';
}


?>
<div id="post-<?php the_ID();?>" <?php post_class( 'portfolio-single' );?>>
	<div class="row">
		<div class="<?php echo esc_attr( $port_thumb_class ); ?>">
			<?php $clenix_port_gallerys = explode( "," , $clenix_port_gallerys_raw );	
			if ( !empty( $clenix_port_gallerys_raw ) ) { ?>
			<div class="single-portfolio-slider">
				<div class="portfolio-loading"></div>
				<div class="rt-port-swiper-container" data-autoplay="false" data-autoplay-timeout="true" data-slides-per-view="1" 
				data-centered-slides="true" data-space-between="30" data-r-x-small="1" data-r-small="1" data-r-medium="1" data-r-large="1" 
				data-r-x-large="1">
					<div class="swiper-wrapper">
					<?php foreach( $clenix_port_gallerys as $clenix_port_gallery ) { ?>
					<div class="swiper-slide">
						<?php echo wp_get_attachment_image( $clenix_port_gallery, 'full', "", array( "class" => "img-responsive" ) ); ?>
					</div>
					<?php } ?>
					</div>
					<div class="swiper-button">
						<div class="swiper-button-prev"><i class="fa fa-angle-left"></i></div>
						<div class="swiper-button-next"><i class="fa fa-angle-right"></i></div>
					</div>
				</div>
			</div>
			<?php } ?>
			
			<?php if ( empty( $clenix_port_gallerys_raw ) ) { ?>
			<div class="rtin-thumbnail">
				<?php if ( has_post_thumbnail() ) { ?>
				<?php
					the_post_thumbnail( $thumb_size );
				} else {
					if ( !empty( ClenixTheme::$options['no_preview_image']['id'] ) ) {
						echo wp_get_attachment_image( ClenixTheme::$options['no_preview_image']['id'], $thumb_size );
					} else {
						echo '<img class="wp-post-image" src="' . ClenixTheme_Helper::get_img( 'noimage_1210X723.jpg' ) . '" alt="'.get_the_title().'">';
					} } ?>
			</div>
			<?php } ?>			
		</div>
		<?php if ( $clenix_has_entry_meta ) { ?>
		<?php if ( $clenix_port_meta ) { ?>
		<div class="col-lg-4 col-12">
			<div class="portfolio-details">
				<?php if ( ( ClenixTheme::$options['port_info_title'] )  && !empty( $clenix_port_info_title ) ) { ?>	
					<h3><?php echo wp_kses( $clenix_port_info_title , 'alltext_allow' );?></h3>
				<?php } ?>
				<?php if ( ( ClenixTheme::$options['port_info_des'] )  && !empty( $clenix_port_des ) ) { ?>	
					<p><?php echo wp_kses( $clenix_port_des , 'alltext_allow' );?></p>
				<?php } ?>
				<ul class="rtin-portfolio-info">
					<?php if ( ( ClenixTheme::$options['port_cats'] )  && !empty( $cats ) ) { ?>	
						<li><span class="rtin-label"><?php esc_html_e( 'Category', 'clenix' );?></span><?php echo wp_kses( $cats , 'alltext_allow' );?></li>
					<?php } if ( ( ClenixTheme::$options['port_client'] )  && !empty( $clenix_client_name ) ) { ?>	
						<li><span class="rtin-label"><?php esc_html_e( 'Client', 'clenix' );?></span><?php echo esc_html( $clenix_client_name );?></li>
					<?php } if ( ( ClenixTheme::$options['port_start_date'] ) && !empty( $clenix_start_date ) ) { ?>	
						<li><span class="rtin-label"><?php esc_html_e( 'Start Date', 'clenix' );?></span><?php echo esc_html( $clenix_start_date );?></li>
					<?php } if ( ( ClenixTheme::$options['port_finish_date'] ) && !empty( $clenix_finish_date ) ) { ?>	
						<li><span class="rtin-label"><?php esc_html_e( 'End Date', 'clenix' );?></span><?php echo esc_html( $clenix_finish_date );?></li>
					<?php } if ( ( ClenixTheme::$options['port_tags'] ) && !empty ( $tags ) ) { ?>
						<li><span class="rtin-label"><?php esc_html_e( 'Tags', 'clenix' );?></span><?php the_tags('',', ', '');?></li>
					<?php } if ( ( ClenixTheme::$options['port_website'] ) && !empty ( $clenix_website ) ) { ?>
						<li><span class="rtin-label"><?php esc_html_e( 'Website', 'clenix' );?></span><?php echo wp_kses( $clenix_website , 'alltext_allow' );?></li>
					<?php } if ( ( ClenixTheme::$options['port_share'] ) && !empty( $socials ) ) { ?>
						<li><span class="rtin-label"><?php esc_html_e( 'Share', 'clenix' );?></span> 
							<ul class="rtin-social">
								<?php foreach ( $socials as $key => $value ): ?>
									<li><a target="_blank" href="<?php echo esc_url( $value ); ?>"><i class="fa <?php echo esc_attr( $socials_fields[$key]['icon'] );?>"></i></a></li>
								<?php endforeach; ?>
							</ul>
						</li>
					
					<?php } if ( ClenixTheme::$options['port_rating'] ) { ?>	
						<li class="port-rating"><span class="rtin-label"><?php esc_html_e( 'Rating', 'clenix' );?></span>
							<ul class="rating">
								<?php for ($i=0; $i < $ratting; $i++) { ?>
									<li class="star-rate"><i class="fa fa-star" aria-hidden="true"></i></li>
								<?php } ?>			
								<?php for ($i=0; $i < $rest_port_rating; $i++) { ?>
									<li><i class="fa fa-star" aria-hidden="true"></i></li>
								<?php } ?>
							</ul></li>
					<?php } ?>						
				</ul>
			</div>
		</div>
		<?php } ?>
	<?php } ?>
	</div>
	<div class="rtin-portfolio-content">
		<?php the_content();?>
	</div>
</div>