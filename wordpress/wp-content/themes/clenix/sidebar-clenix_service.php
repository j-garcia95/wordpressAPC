<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */
 

$service_layout = get_post_meta( get_the_ID() ,'clenix_service_style', true );
$service_layout_ops = ClenixTheme::$options['service_style'];

$f_layout = ( empty( $service_layout ) || ( $service_layout  == 'default' ) ) ? $service_layout_ops : $service_layout;

$clenix_has_entry_meta  = ( ClenixTheme::$options['service_price'] || ClenixTheme::$options['service_cleaning_hour'] || ClenixTheme::$options['service_no'] || ClenixTheme::$options['service_visiting_hour'] || ClenixTheme::$options['service_contact']  || ClenixTheme::$options['service_email'] || ClenixTheme::$options['service_button'] ) ? true : false;
?>
<div class="col-lg-4 col-md-12 fixed-side-bar">
	<aside class="sidebar-widget-area fixed-bar-coloum">
		<?php 
			if ( $f_layout == 'style2' ) { ?>
			<?php if ( $clenix_has_entry_meta ) { ?>
			<div class="widget widget-service-info">
			<?php 
			$clenix_service_info_title  	= get_post_meta( get_the_ID(), 'clenix_service_info_title', true );
			$clenix_service_price  			= get_post_meta( get_the_ID(), 'clenix_service_price', true );
			$clenix_price_unit    			= get_post_meta( get_the_ID(), 'clenix_service_price_unit', true ); 
			$clenix_service_cleaning_hour  	= get_post_meta( get_the_ID(), 'clenix_service_cleaning_hour', true );
			$clenix_service_no  			= get_post_meta( get_the_ID(), 'clenix_service_no', true );
			$clenix_service_visiting_hour  	= get_post_meta( get_the_ID(), 'clenix_service_visiting_hour', true );
			$clenix_service_contact  		= get_post_meta( get_the_ID(), 'clenix_service_contact', true );
			$clenix_service_email  			= get_post_meta( get_the_ID(), 'clenix_service_email', true );
			$clenix_service_button  		= get_post_meta( get_the_ID(), 'clenix_service_button', true );
			$clenix_service_url  		    = get_post_meta( get_the_ID(), 'clenix_service_url', true );
			?>
			<?php if ( ( ClenixTheme::$options['service_price'] )  && !empty( $clenix_service_price ) || ( ClenixTheme::$options['service_cleaning_hour'] ) && !empty( $clenix_service_cleaning_hour ) || ( ClenixTheme::$options['service_no'] )  && !empty( $clenix_service_no ) || ( ClenixTheme::$options['service_visiting_hour'] ) && !empty( $clenix_service_visiting_hour ) || ( ClenixTheme::$options['service_contact'] ) && !empty ( $clenix_service_contact ) || ( ClenixTheme::$options['service_email'] ) && !empty ( $clenix_service_email ) ) { ?>
			<div class="rtin-service2-wrap">
				<?php if ( ( ClenixTheme::$options['service_info_title'] )  && !empty( $clenix_service_info_title ) ) { ?>	
					<h3><?php echo wp_kses( $clenix_service_info_title , 'alltext_allow' );?></h3>
				<?php } ?>
				<ul class="rtin-service-info">
					<?php if ( ( ClenixTheme::$options['service_price'] )  && !empty( $clenix_service_price ) ) { ?>	
						<li><span class="rtin-label"><?php esc_html_e( 'Service Price', 'clenix' );?> :</span><?php echo esc_html( $clenix_price_unit );?><?php echo esc_html( $clenix_service_price );?></li>
					<?php } if ( ( ClenixTheme::$options['service_cleaning_hour'] ) && !empty( $clenix_service_cleaning_hour ) ) { ?>	
						<li><span class="rtin-label"><?php esc_html_e( 'Cleaning Hours', 'clenix' );?> :</span><?php echo esc_html( $clenix_service_cleaning_hour );?></li>
					<?php } if ( ( ClenixTheme::$options['service_no'] )  && !empty( $clenix_service_no ) ) { ?>	
						<li><span class="rtin-label"><?php esc_html_e( 'Number of Cleaners', 'clenix' );?> :</span><?php echo esc_html( $clenix_service_no );?></li>
					<?php } if ( ( ClenixTheme::$options['service_visiting_hour'] ) && !empty( $clenix_service_visiting_hour ) ) { ?>	
						<li><span class="rtin-label"><?php esc_html_e( 'Visiting Hours', 'clenix' );?> :</span><?php echo esc_html( $clenix_service_visiting_hour );?></li>
					<?php } if ( ( ClenixTheme::$options['service_contact'] ) && !empty ( $clenix_service_contact ) ) { ?>
						<li><span class="rtin-label"><?php esc_html_e( 'Contact', 'clenix' );?> :</span><?php echo wp_kses( $clenix_service_contact , 'alltext_allow' );?></li>
					<?php } if ( ( ClenixTheme::$options['service_email'] ) && !empty ( $clenix_service_email ) ) { ?>
						<li><span class="rtin-label"><?php esc_html_e( 'E-mail', 'clenix' );?> :</span><?php echo wp_kses( $clenix_service_email , 'alltext_allow' );?></li>
					<?php } ?>
				</ul>
				<?php if ( ( ClenixTheme::$options['service_button'] ) && !empty ( $clenix_service_button ) ) { ?>
					<a href="<?php echo esc_url ( $clenix_service_url ); ?>" class="service-button"><?php echo wp_kses( $clenix_service_button , 'alltext_allow' );?></a>
				<?php } ?>
			</div>
			<?php } ?>
			</div>
			<?php } ?>
		<?php }	?>
		<?php
			if ( ClenixTheme::$sidebar ) {
				if ( is_active_sidebar( ClenixTheme::$sidebar ) ) dynamic_sidebar( ClenixTheme::$sidebar );
			}
			else {
				if ( is_active_sidebar( 'service-sidebar' ) ) dynamic_sidebar( 'service-sidebar' );
			}
		?>
	</aside>
</div>