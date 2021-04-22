<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

namespace radiustheme\Clenix_Core;
use Elementor\Controls_Manager;

if ( ! defined( 'ABSPATH' ) ) exit;

class Rt_Divider extends Custom_Widget_Base {

	public function __construct( $data = [], $args = null ){
		$this->rt_name = esc_html__( 'RT Divider', 'clenix-core' );
		$this->rt_base = 'rt-divider';
		parent::__construct( $data, $args );
	}

	public function rt_fields(){
		$fields = array(
			array(
				'mode'    => 'section_start',
				'id'      => 'sec_general',
				'label'   => esc_html__( 'News Title', 'clenix-core' ),
			),
			array(
				'type'    => Controls_Manager::SELECT2,
				'id'      => 'style',
				'label'   => esc_html__( 'Style', 'clenix-core' ),
				'options' => array(
					'solid' => esc_html__( 'Solid', 'clenix-core' ),
					'double'  => esc_html__( 'Double', 'clenix-core' ),
					'dotted'  => esc_html__( 'Dotted', 'clenix-core' ),
					'dashed'  => esc_html__( 'Dashed', 'clenix-core' ),
				),
				'default' => 'solid',
				'selectors' => array (
					'{{WRAPPER}} .divide-bar' => 'border-top-style: {{VALUE}};',
				),
			),
			array(
				'type'    => Controls_Manager::SLIDER,
				'id'      => 'rtdivider_width',
				'label'   => esc_html__( 'Width', 'clenix-core' ),
				'size_units' => array ('%', 'px'),
				'range' => array (
					'px' => array (
						'min' => 0,
						'max' => 1000,
						'step' => 5,
					),
					'%' => array (
						'min' => 0,
						'max' => 100,
					),
				),
				'default' => array (
					'unit' => '%',
					'size' => 100,
				),
				'selectors' => array (
					'{{WRAPPER}} .divide-bar' => 'width: {{SIZE}}{{UNIT}};',
				),
			),
			array(
				'type'    => Controls_Manager::SLIDER,
				'id'      => 'rtdivider_weight',
				'label'   => esc_html__( 'Weight', 'clenix-core' ),
				'range' => array (
					'px' => array (
						'min' => 0,
						'max' => 1000,
					),
				),
				'default' => array (
					'size' => 1,
				),
				'selectors' => array (
					'{{WRAPPER}} .divide-bar' => 'border-top-width: {{SIZE}}{{UNIT}};',
				),
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'divide_color',
				'label'   => esc_html__( 'Divider Color', 'clenix-core' ),
				'default' => '',
				'selectors' => array(
					'{{WRAPPER}} .divide-bar' => 'color: {{VALUE}}',
				),
			),
			array(
				'type'    => Controls_Manager::CHOOSE,
				'id'      => 'alignment',
				'label'   => esc_html__( 'Alignment', 'clenix-core' ),
				'options' => array(
					'left' => array(
						'title' => esc_html__( 'Left', 'clenix-core' ),
						'icon' => 'fa fa-align-left',
					),
					'center' => array(
						'title' => esc_html__( 'Center', 'clenix-core' ),
						'icon' => 'fa fa-align-center',
					),
					'right' => array(
						'title' => esc_html__( 'Right', 'clenix-core' ),
						'icon' => 'fa fa-align-right',
					),
				),
				'default' => 'center',
				'selectors' => array(
					'{{WRAPPER}} .divider-holder' => 'text-align: {{VALUE}};',
				),
				'toggle' => true,
			),			
			array(
				'type'    => Controls_Manager::SLIDER,
				'id'      => 'rtdivider_gap',
				'label'   => esc_html__( 'Gap', 'clenix-core' ),
				'range' => array (
					'px' => array (
						'min' => 0,
						'max' => 1000,
					),
				),
				'default' => array (
					'size' => 10,
				),
				'selectors' => array (
					'{{WRAPPER}} .divider-holder' => 'padding-top: {{SIZE}}{{UNIT}}; padding-bottom: {{SIZE}}{{UNIT}};',
				),
			),
			
			array(
				'mode' => 'section_end',
			),
		);
		return $fields;
	}

	protected function render() {
		$data = $this->get_settings();

		$template = 'rt-divider';

		return $this->rt_template( $template, $data );
	}
}