<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

namespace radiustheme\Clenix_Core;

use Elementor\Controls_Manager;

if ( ! defined( 'ABSPATH' ) ) exit;

class Progress_Bar extends Custom_Widget_Base {

	public function __construct( $data = [], $args = null ){
		$this->rt_name = __( 'RT Progress Bar', 'clenix-core' );
		$this->rt_base = 'rt-progress-bar';
		parent::__construct( $data, $args );
	}

	private function rt_load_scripts(){
		wp_enqueue_style( 'animate' );
	}

	public function rt_fields(){
		$fields = array(
			array(
				'mode'    => 'section_start',
				'id'      => 'sec_general',
				'label'   => esc_html__( 'General', 'clenix-core' ),
			),
			array(
				'type'    => Controls_Manager::TEXT,
				'id'      => 'title',
				'label'   => esc_html__( 'Title', 'clenix-core' ),
				'default' => esc_html__( 'Total Posts', 'clenix-core' ),
			),
			array(
				'type'    => Controls_Manager::SLIDER,
				'id'      => 'number',
				'label'   => esc_html__( 'Percentage', 'clenix-core' ),
				'default' => array( 'size' => 77 ),
			),
			array(
				'type'    => Controls_Manager::TEXT,
				'id'      => 'number_height',
				'label'   => esc_html__( 'Percentage Height', 'clenix-core' ),
				'default' => '10',
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'bgcolor_color',
				'label'   => esc_html__( 'Bgcolor', 'clenix-core' ),
				'default' => '',
				'selectors' => array( '{{WRAPPER}} .progress' => 'background-color: {{VALUE}}' ),
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'fgcolor_color',
				'label'   => esc_html__( 'Fgcolor', 'clenix-core' ),
				'default' => '',
				'selectors' => array( '{{WRAPPER}} .progress .progress-bar' => 'background-color: {{VALUE}}' ),
			),
			array(
				'mode' => 'section_end',
			),
		);
		return $fields;
	}

	protected function render() {
		$data = $this->get_settings();
		$this->rt_load_scripts();

		$template = 'progress-bar';

		return $this->rt_template( $template, $data );
	}
}