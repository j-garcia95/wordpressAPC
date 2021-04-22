<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

/**
* About Widget with Social for footer by ClenixTheme
**/
class ClenixTheme_Social_Widget extends WP_Widget {

	public function __construct() {
		$widget_ops = array(
			'classname' => 'rt_footer_social_widget',
			'description' => esc_html__( 'Clenix : (For Footer) Social Link widget with Description' , 'clenix-core' ),
			'customize_selective_refresh' => true,
		);
		parent::__construct( 'rt-about-social', esc_html__( 'Clenix : Social Widget' , 'clenix-core' ), $widget_ops );
		$this->alt_option_name = 'clenix_about_widget';
	}

	public function widget( $args, $instance ){
		echo wp_kses_post( $args['before_widget'] );
		if ( ! empty( $instance['title'] ) ) {
			echo wp_kses_post( $args['before_title'] ) . apply_filters( 'widget_title', esc_html( $instance['title'] ) ) . wp_kses_post( $args['after_title'] );
		}
		?>
		<div class="rt-about-widget">
			<?php if( !empty( $instance['description'] ) ) { ?>
				<div class="footer-about"><?php echo wp_kses_post( $instance['description'] ); ?></div>
			<?php } ?>
			<ul class="footer-social">
				<?php
				if( !empty( $instance['facebook'] ) ){
					?><li><a href="<?php echo esc_url( $instance['facebook'] ); ?>" target="_blank"><i class="fa fa-facebook"></i></a></li><?php
				}
				if( !empty( $instance['twitter'] ) ){
					?><li><a href="<?php echo esc_url( $instance['twitter'] ); ?>" target="_blank"><i class="fa fa-twitter"></i></a></li><?php
				}
				if( !empty( $instance['gplus'] ) ){
					?><li><a href="<?php echo esc_url( $instance['gplus'] ); ?>" target="_blank"><i class="fa fa-google-plus"></i></a></li><?php
				}
				if( !empty( $instance['linkedin'] ) ){
					?><li><a href="<?php echo esc_url( $instance['linkedin'] ); ?>" target="_blank"><i class="fa fa-linkedin"></i></a></li><?php
				}
				if( !empty( $instance['pinterest'] ) ){
					?><li><a href="<?php echo esc_url( $instance['pinterest'] ); ?>" target="_blank"><i class="fa fa-pinterest"></i></a></li><?php
				}
				if( !empty( $instance['skype'] ) ){
					?><li><a href="<?php echo esc_url( $instance['skype'] ); ?>" target="_blank"><i class="fa fa-skype"></i></a></li><?php
				}
				if( !empty( $instance['youtube'] ) ){
					?><li><a href="<?php echo esc_url( $instance['youtube'] ); ?>" target="_blank"><i class="fa fa-youtube"></i></a></li><?php
				}
				if( !empty( $instance['instagram'] ) ){
					?><li><a href="<?php echo esc_url( $instance['instagram'] ); ?>" target="_blank"><i class="fa fa-instagram"></i></a></li><?php
				}
				if( !empty( $instance['behance'] ) ){
					?><li><a href="<?php echo esc_url( $instance['behance'] ); ?>" target="_blank"><i class="fa fa-behance"></i></a></li><?php
				}
				if( !empty( $instance['dribbble'] ) ){
					?><li><a href="<?php echo esc_url( $instance['dribbble'] ); ?>" target="_blank"><i class="fa fa-dribbble"></i></a></li><?php
				}
				?>
			</ul>
		</div>

		<?php
		echo wp_kses_post( $args['after_widget'] );
	}

	public function update( $new_instance, $old_instance ){
		$instance                  = array();
		$instance['title']         = ( ! empty( $new_instance['title'] ) ) ? sanitize_text_field( $new_instance['title'] ) : '';
		$instance['description']   = ( ! empty( $new_instance['description'] ) ) ? wp_kses_post( $new_instance['description'] ) : '';
		$instance['facebook']      = ( ! empty( $new_instance['facebook'] ) ) ? sanitize_text_field( $new_instance['facebook'] ) : '';
		$instance['twitter']       = ( ! empty( $new_instance['twitter'] ) ) ? sanitize_text_field( $new_instance['twitter'] ) : '';
		$instance['gplus']         = ( ! empty( $new_instance['gplus'] ) ) ? sanitize_text_field( $new_instance['gplus'] ) : '';
		$instance['linkedin']      = ( ! empty( $new_instance['linkedin'] ) ) ? sanitize_text_field( $new_instance['linkedin'] ) : '';
		$instance['pinterest']     = ( ! empty( $new_instance['pinterest'] ) ) ? sanitize_text_field( $new_instance['pinterest'] ) : '';
		$instance['skype']       = ( ! empty( $new_instance['skype'] ) ) ? sanitize_text_field( $new_instance['skype'] ) : '';
		$instance['youtube']      = ( ! empty( $new_instance['youtube'] ) ) ? sanitize_text_field( $new_instance['youtube'] ) : '';
		$instance['instagram']     = ( ! empty( $new_instance['instagram'] ) ) ? sanitize_text_field( $new_instance['instagram'] ) : '';
		$instance['behance']       = ( ! empty( $new_instance['behance'] ) ) ? sanitize_text_field( $new_instance['behance'] ) : '';
		$instance['dribbble']      = ( ! empty( $new_instance['dribbble'] ) ) ? sanitize_text_field( $new_instance['dribbble'] ) : '';
		return $instance;
	}

	public function form( $instance ){
		$defaults = array(
			'title'       => esc_html__( 'About Company' , 'clenix-core' ),
			'description' => '',
			'facebook'    => '',
			'twitter'     => '',
			'gplus'       => '',
			'skype'       => '',
			'youtube'     => '',
			'linkedin'    => '',
			'pinterest'   => '',
			'instagram'   => '',
			'behance'     => '',
			'dribbble'    => '',
			);
		$instance = wp_parse_args( (array) $instance, $defaults );

		$fields = array(
			'title'        => array(
				'label'    => esc_html__( 'Title', 'clenix-core' ),
				'type'     => 'text',
				),
			'description'  => array(
				'label'    => esc_html__( 'Description', 'clenix-core' ),
				'type'     => 'textarea',
				),
			'facebook'     => array(
				'label'    => esc_html__( 'Facebook URL', 'clenix-core' ),
				'type'     => 'url',
				),
			'twitter'      => array(
				'label'    => esc_html__( 'Twitter URL', 'clenix-core' ),
				'type'     => 'url',
				),
			'gplus'        => array(
				'label'    => esc_html__( 'Google Plus URL', 'clenix-core' ),
				'type'     => 'url',
				),
			'linkedin'     => array(
				'label'    => esc_html__( 'LinkedIn URL', 'clenix-core' ),
				'type'     => 'url',
				),
			'pinterest'    => array(
				'label'    => esc_html__( 'Pinterest URL', 'clenix-core' ),
				'type'     => 'url',
				),
			'skype'        => array(
				'label'    => esc_html__( 'Skype URL', 'clenix-core' ),
				'type'     => 'url',
				),
			'youtube'      => array(
				'label'    => esc_html__( 'Youtube URL', 'clenix-core' ),
				'type'     => 'url',
				),
			'instagram'    => array(
				'label'    => esc_html__( 'Instagram URL', 'clenix-core' ),
				'type'     => 'url',
				),
			'behance'      => array(
				'label'    => esc_html__( 'Behance Plus URL', 'clenix-core' ),
				'type'     => 'url',
				),
			'dribbble'     => array(
				'label'    => esc_html__( 'Dribbble Plus URL', 'clenix-core' ),
				'type'     => 'url',
				),
			);
		
		RT_Widget_Fields::display( $fields, $instance, $this );
	}	
}