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

class CTA extends Custom_Widget_Base {

	public function __construct( $data = [], $args = null ){
		$this->rt_name = esc_html__( 'RT Call to Action', 'clenix-core' );
		$this->rt_base = 'rt-cta';
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
				'type'    => Controls_Manager::SELECT2,
				'id'      => 'style',
				'label'   => esc_html__( 'CTA Style', 'clenix-core' ),
				'options' => array(
					'style1' => esc_html__( 'Style 1' , 'clenix-core' ),
					'style2' => esc_html__( 'Style 2', 'clenix-core' ),
					'style3' => esc_html__( 'Style 3', 'clenix-core' ),
				),
				'default' => 'style1',
			),
			array(
				'type'    => Controls_Manager::SELECT2,
				'id'      => 'theme',
				'label'   => esc_html__( 'Theme', 'clenix-core' ),
				'options' => array(
					'light' => esc_html__( 'Light Background', 'clenix-core' ),
					'dark'  => esc_html__( 'Dark Background', 'clenix-core' ),
				),
				'default' => 'light',
				'condition'   => array( 'style' => array( 'style1', 'style2' ) ),
			),
			array(
				'type'    => Controls_Manager::TEXTAREA,
				'id'      => 'title',
				'label'   => esc_html__( 'Title', 'clenix-core' ),
				'default' => esc_html__( 'Get started with your free estimate', 'clenix-core' ),
			),
			array (
				'mode'    => 'group',
				'type'    => Group_Control_Typography::get_type(),
				'name'    => 'title_typo',
				'label'   => esc_html__( 'Title Typo', 'clenix-core' ),
				'selector' => '{{WRAPPER}} .rt-el-cta .align-items h2',
				'scheme'   => Scheme_Typography::TYPOGRAPHY_3,
				'condition'   => array( 'style' => array( 'style1', 'style2' ) ),
			),
			array (
				'mode'    => 'group',
				'type'    => Group_Control_Typography::get_type(),
				'name'    => 'title_typo_three',
				'label'   => esc_html__( 'Title Typo', 'clenix-core' ),
				'selector' => '{{WRAPPER}} .cta-style3 .rtin-item-content .rtin-title',
				'scheme'   => Scheme_Typography::TYPOGRAPHY_3,
				'condition'   => array( 'style' => array( 'style3' ) ),
			),
			array (
				'mode'    => 'group',
				'type'    => Group_Control_Typography::get_type(),
				'name'    => 'icon_typo',
				'label'   => esc_html__( 'Icon Style', 'clenix-core' ),
				'selector' => '{{WRAPPER}} .cta-style2 .phone-number span i:before',
				'scheme'   => Scheme_Typography::TYPOGRAPHY_3,
				'condition'   => array( 'style' => array( 'style2' ) ),
			),
			array(
				'type'    => Controls_Manager::TEXTAREA,
				'id'      => 'content',
				'label'   => esc_html__( 'Content Text ', 'clenix-core' ),
				'default' => '',
				'condition'   => array( 'style' => array( 'style1', 'style3' ) ),
			),
			array(
				'type'    => Controls_Manager::MEDIA,
				'id'      => 'image',
				'label'   => esc_html__( 'Image', 'clenix-core' ),
				'description' => esc_html__( 'Recommended image size is 400x400 px', 'clenix-core' ),
				'condition'   => array( 'style' => array( 'style3' ) ),
			),
			array(
				'type'    => Controls_Manager::TEXTAREA,
				'id'      => 'pho_number',
				'label'   => esc_html__( 'Phone Number', 'clenix-core' ),
				'default' => '+ 95 888 777',
				'condition'   => array( 'style' => array( 'style2' ) ),
			),
			array(
				'type'    => Controls_Manager::SELECT2,
				'id'      => 'button_style',
				'label'   => esc_html__( 'Button Style', 'clenix-core' ),
				'options' => array(
					'clenix-button-1'        => esc_html__( 'Button 1', 'clenix-core' ),
					'clenix-button-2'        => esc_html__( 'Button 2', 'clenix-core' ),
				),
				'default' => 'clenix-button-1',
				'condition'   => array( 'style' => array( 'style1', 'style3' ) ),
			),
			array(
				'type'    	  => Controls_Manager::TEXT,
				'id'      	  => 'buttontext',
				'label'   	  => esc_html__( 'Button Text', 'clenix-core' ),
				'default' 	  => esc_html__( 'Get an Estimate', 'clenix-core' ),
				'condition'   => array( 'style' => array( 'style1', 'style3' ) ),
			),
			array(
				'type'    => Controls_Manager::URL,
				'id'      => 'buttonurl',
				'label'   => esc_html__( 'Button URL', 'clenix-core' ),
				'placeholder' => 'https://your-link.com',
				'condition'   => array( 'style' => array( 'style1', 'style3' ) ),
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'title_color',
				'label'   => esc_html__( 'Title Color', 'clenix-core' ),
				'default' => '',
				'selectors' => array(
					'{{WRAPPER}} .rt-el-cta .cta-content h2' => 'color: {{VALUE}}',
				),
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'content_color',
				'label'   => esc_html__( 'Content Color', 'clenix-core' ),
				'default' => '',
				'selectors' => array(
					'{{WRAPPER}} .rt-el-cta .cta-content p' => 'color: {{VALUE}}',
				),
				'condition'   => array( 'style' => array( 'style1', 'style3' ) ),
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'icon_color',
				'label'   => esc_html__( 'Icon Color', 'clenix-core' ),
				'default' => '',
				'selectors' => array(
					'{{WRAPPER}} .cta-style2 .phone-number span i' => 'color: {{VALUE}}',
					'{{WRAPPER}} .cta-style2 .phone-number span i:before' => 'color: {{VALUE}}',
				),
				'condition'   => array( 'style' => array( 'style2' ) ),
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'phone_color',
				'label'   => esc_html__( 'Phone No Color', 'clenix-core' ),
				'default' => '',
				'selectors' => array(
					'{{WRAPPER}} .rt-el-cta .align-items h3 a' => 'color: {{VALUE}}',
				),
				'condition'   => array( 'style' => array( 'style2' ) ),
			),
			array(
				'mode' => 'section_end',
			),
		);
		return $fields;
	}

	protected function render() {
		$data = $this->get_settings();
		
		switch ( $data['style'] ) {
			case 'style3':
			$template = 'cta-3';
			break;
			case 'style2':
			$template = 'cta-2';
			break;
			default:
			$template = 'cta-1';
			break;
		}
		
		return $this->rt_template( $template, $data );
	}
}