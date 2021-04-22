<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

namespace radiustheme\Clenix_Core;

use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;
use Elementor\Scheme_Base;
use Elementor\Scheme_Typography;

if ( ! defined( 'ABSPATH' ) ) exit;

class Progress_Circle extends Custom_Widget_Base {

	public function __construct( $data = [], $args = null ){
		$this->rt_name = __( 'RT Progress Circle', 'clenix-core' );
		$this->rt_base = 'rt-progress-circle';
		parent::__construct( $data, $args );
	}

	private function rt_load_scripts(){
		wp_enqueue_script( 'knob' );
		wp_enqueue_script( 'appear' );
	}

	public function rt_fields(){
		$fields = array(
			array(
				'mode'    => 'section_start',
				'id'      => 'sec_general',
				'label'   => esc_html__( 'General', 'clenix-core' ),
			),
			array(
				'type'    => Controls_Manager::SELECT2,
				'id'      => 'theme',
				'label'   => __( 'Theme', 'clenix-core' ),
				'options' => array(
					'light' => __( 'Light Background', 'clenix-core' ),
					'dark'  => __( 'Dark Background', 'clenix-core' ),
				),
				'default' => 'light',
			),
			array(
				'type'    => Controls_Manager::NUMBER,
				'id'      => 'number',
				'label'   => esc_html__( 'Circle Number', 'clenix-core' ),
				'default' => 50,
			),
			array(
				'type'    => Controls_Manager::TEXT,
				'id'      => 'circle_width',
				'label'   => esc_html__( 'Circle Width', 'clenix-core' ),
				'default' => 200,
			),
			array(
				'type'    => Controls_Manager::TEXT,
				'id'      => 'circle_height',
				'label'   => esc_html__( 'Circle Height', 'clenix-core' ),
				'default' => 200,
			),
			array(
				'type'    => Controls_Manager::TEXT,
				'id'      => 'circle_border',
				'label'   => esc_html__( 'Circle thickness', 'clenix-core' ),
				'default' => 0.09,
			),
			array(
				'type'    => Controls_Manager::TEXT,
				'id'      => 'title',
				'label'   => esc_html__( 'Title', 'clenix-core' ),
				'default' => esc_html__( 'Feature works', 'clenix-core' ),
			),
			array(
				'type'    => Controls_Manager::TEXTAREA,
				'id'      => 'content',
				'label'   => esc_html__( 'Content', 'clenix-core' ),
				'default' => esc_html__( 'All our projects incorporate a unique artistic image functional.', 'clenix-core' ),
			),
			array(
				'type'    => Controls_Manager::NUMBER,
				'id'      => 'speed',
				'label'   => esc_html__( 'Animation Speed', 'clenix-core' ),
				'default' => 5000,
				'description' => esc_html__( 'The total duration of the count animation in milisecond eg. 5000', 'clenix-core' ),
			),
			array(
				'type'    => Controls_Manager::NUMBER,
				'id'      => 'steps',
				'label'   => esc_html__( 'Animation Steps', 'clenix-core' ),
				'default' => 10,
				'description' => esc_html__( 'Counter steps eg. 10', 'clenix-core' ),
			),
			array(
				'mode' => 'section_end',
			),
			array(
				'mode'    => 'section_start',
				'id'      => 'sec_style',
				'label'   => esc_html__( 'Style', 'clenix-core' ),
			),
			array (
				'mode'    => 'group',
				'type'    => Group_Control_Typography::get_type(),
				'name'    => 'title_typo',
				'label'   => esc_html__( 'Title Style', 'clenix-core' ),
				'selector' => '{{WRAPPER}} .progress-circular-layout .rtin-title',
				'scheme'   => Scheme_Typography::TYPOGRAPHY_3,
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'title_color',
				'label'   => esc_html__( 'Title Color', 'clenix-core' ),
				'default' => '',
				'selectors' => array(
					'{{WRAPPER}} .progress-circular-layout .rtin-title' => 'color: {{VALUE}}',
				),
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'content_color',
				'label'   => esc_html__( 'Content Color', 'clenix-core' ),
				'default' => '',
				'selectors' => array(
					'{{WRAPPER}} .progress-circular-layout .rtin-content' => 'color: {{VALUE}}',
				),
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'bgcolor_color',
				'label'   => esc_html__( 'bgcolor Color', 'clenix-core' ),
				'default' => '',
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'fgcolor_color',
				'label'   => esc_html__( 'fgcolor Color', 'clenix-core' ),
				'default' => '',
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
		
		$template = 'progress-circle';

		return $this->rt_template( $template, $data );
	}
}