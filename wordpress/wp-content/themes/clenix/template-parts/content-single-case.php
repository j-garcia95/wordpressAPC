<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */
$thumb_size = 'clenix-size1';

$clenix_has_entry_meta  = ( ClenixTheme::$options['case_date'] || ClenixTheme::$options['case_client'] || ClenixTheme::$options['case_location'] || ClenixTheme::$options['case_cats'] || ClenixTheme::$options['case_year'] ) ? true : false;

global $post;
$clenix_case_title  			= get_post_meta( $post->ID, 'clenix_case_title', true );
$clenix_case_date  				= get_post_meta( $post->ID, 'clenix_case_date', true );
$clenix_case_client  			= get_post_meta( $post->ID, 'clenix_case_client', true );
$clenix_case_location  			= get_post_meta( $post->ID, 'clenix_case_location', true );
$clenix_case_year  				= get_post_meta( $post->ID, 'clenix_case_year', true );

$cats   						= wp_get_post_terms( $post->ID, 'clenix_case_category', array( "fields" => "names" ) );
$cats 							= implode( ', ', $cats );

$clenix_case_meta = ( !empty($clenix_case_date) ) || ( !empty($clenix_case_client) ) || ( !empty($clenix_case_location) ) || ( !empty($clenix_case_year) ) || ( !empty( $cats ) ) ? true : false;

if ( $clenix_has_entry_meta ) {
	if ( $clenix_case_meta ) {
		$case_thumb_class = 'col-lg-8 col-12';
	} else {
		$case_thumb_class = 'col-lg-12 col-12';	
	}
} else {
	$case_thumb_class = 'col-lg-12 col-12';
}

?>
<div id="post-<?php the_ID(); ?>" <?php post_class( 'case-study-single' );?>>
	<div class="row">
		<div class="<?php echo esc_attr( $case_thumb_class ); ?>">
			<?php if ( has_post_thumbnail() ) { ?>
			<div class="rtin-thumbnail"><?php the_post_thumbnail( $thumb_size );?></div>
			<?php } ?>
		</div>
		<?php if ( $clenix_has_entry_meta ) { ?>
		<?php if ( $clenix_case_meta ) { ?>
		<div class="col-lg-4 col-12">
			<div class="case-study-details">
				<div class="case-details">
				<?php if ( ( ClenixTheme::$options['case_title'] )  && !empty( $clenix_case_title ) ) { ?>	
					<h3><?php echo wp_kses( $clenix_case_title , 'alltext_allow' );?></h3>
				<?php } ?>
				<ul class="rtin-case-info">
					<?php if ( ( ClenixTheme::$options['case_cats'] )  && !empty( $cats ) ) { ?>	
						<li><span class="rtin-label"><?php esc_html_e( 'Categories', 'clenix' );?> :</span><?php echo wp_kses( $cats , 'alltext_allow' );?></li>
					<?php } if ( ( ClenixTheme::$options['case_client'] ) && !empty( $clenix_case_client ) ) { ?>	
						<li><span class="rtin-label"><?php esc_html_e( 'Client', 'clenix' );?> :</span><?php echo esc_html( $clenix_case_client );?></li>
					<?php } if ( ( ClenixTheme::$options['case_date'] )  && !empty( $clenix_case_date ) ) { ?>	
						<li><span class="rtin-label"><?php esc_html_e( 'Date', 'clenix' );?> :</span><?php echo esc_html( $clenix_case_date );?></li>
					<?php } if ( ( ClenixTheme::$options['case_location'] ) && !empty( $clenix_case_location ) ) { ?>	
						<li><span class="rtin-label"><?php esc_html_e( 'Location', 'clenix' );?> :</span><?php echo esc_html( $clenix_case_location );?></li>
					<?php } if ( ( ClenixTheme::$options['case_year'] ) && !empty ( $clenix_case_year ) ) { ?>
						<li><span class="rtin-label"><?php esc_html_e( 'Year', 'clenix' );?> :</span><?php echo wp_kses( $clenix_case_year , 'alltext_allow' );?></li>
					<?php } ?>
				</ul>
				</div>
			</div>
		</div>
		<?php } ?>
		<?php } ?>
	</div>
	<div class="rtin-case-content">
		<?php the_content();?>
	</div>
</div>