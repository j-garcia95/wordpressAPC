<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

class ClenixTheme_Call_to_Action extends WP_Widget {
	public function __construct() {
		parent::__construct(
            'clenix_about_info', // Base ID
            esc_html__( 'Clenix: Call To Action', 'clenix-core' ), // Name
            array( 'description' => esc_html__( 'Clenix: Call To Action Widget', 'clenix-core' )) );
	}

	public function widget( $args, $instance ){
		echo wp_kses_post( $args['before_widget'] );
		if ( !empty( $instance['title'] ) ) {
			$html = apply_filters( 'widget_title', $instance['title'] );
			$html = $args['before_title'] . $html .$args['after_title'];
		}
		else {
			$html = '';
		}

		echo wp_kses_post( $html );
		?>
		<div class="call-to-action-wrap">
			<div class="call-to-action-content">
				<div class="rtin-des"><?php if( !empty( $instance['description'] ) ) echo wp_kses_post( $instance['description'] ); ?></div>
			</div>
		</div>
		<?php
		echo wp_kses_post( $args['after_widget'] );
	}

	public function update( $new_instance, $old_instance ){
		$instance                  = array();
		$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? sanitize_text_field( $new_instance['title'] ) : '';
		$instance['description']   = ( ! empty( $new_instance['description'] ) ) ? wp_kses_post( $new_instance['description'] ) : '';
		return $instance;
	}

	public function form( $instance ){
		$defaults = array(
			'title'       	=> '',
			'description' 	=> '',
		);
		$instance = wp_parse_args( (array) $instance, $defaults );

		$fields = array(
			'title'       => array(
				'label'   => esc_html__( 'Title', 'clenix-core' ),
				'type'    => 'text',
			),
			'description' => array(
				'label'   => esc_html__( 'Description', 'clenix-core' ),
				'type'    => 'textarea',
			),
		);

		RT_Widget_Fields::display( $fields, $instance, $this );
	}
}