<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

namespace radiustheme\Clenix_Core;

use Elementor\Controls_Manager;

if ( ! defined( 'ABSPATH' ) ) exit;

class RT_Image extends Custom_Widget_Base {

	public function __construct( $data = [], $args = null ){
		$this->rt_name = esc_html__( 'RT Image', 'clenix-core' );
		$this->rt_base = 'rt-image';
		parent::__construct( $data, $args );
	}

	public function rt_fields(){
		$fields = array(
			array(
				'mode'    => 'section_start',
				'id'      => 'sec_general',
				'label'   => esc_html__( 'General', 'clenix-core' ),
			),
			array(
				'type'    => Controls_Manager::MEDIA,
				'id'      => 'image_one',
				'label'   => esc_html__( 'Image One', 'clenix-core' ),
				'description' => esc_html__( 'Recommended image size is 600x600 px', 'clenix-core' ),
			),
			array(
				'type'    => Controls_Manager::MEDIA,
				'id'      => 'image_two',
				'label'   => esc_html__( 'Image Two', 'clenix-core' ),
				'description' => esc_html__( 'Recommended image size is 400x400 px', 'clenix-core' ),
			),
			array(
				'type'    => Controls_Manager::MEDIA,
				'id'      => 'image_three',
				'label'   => esc_html__( 'Image Three', 'clenix-core' ),
				'description' => esc_html__( 'Recommended image size is 400x400 px', 'clenix-core' ),
			),
			array(
				'mode' => 'section_end',
			),
		);
		return $fields;
	}

	protected function render() {
		$data = $this->get_settings();

		$template = 'rt-image';
	
		return $this->rt_template( $template, $data );
	}
}