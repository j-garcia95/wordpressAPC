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

class Info_Box extends Custom_Widget_Base {

	public function __construct( $data = [], $args = null ){
		$this->rt_name = esc_html__( 'RT Info Box', 'clenix-core' );
		$this->rt_base = 'rt-info-box';
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
				'label'   => esc_html__( 'Style', 'clenix-core' ),
				'options' => array(
					'style1' => esc_html__( 'Style 1', 'clenix-core' ),
					'style2' => esc_html__( 'Style 2', 'clenix-core' ),
					'style3' => esc_html__( 'Style 3', 'clenix-core' ),
					'style4' => esc_html__( 'Style 4', 'clenix-core' ),
					'style5' => esc_html__( 'Style 5', 'clenix-core' ),
					'style6' => esc_html__( 'Style 6', 'clenix-core' ),
					'style7' => esc_html__( 'Style 7', 'clenix-core' ),
					'style8' => esc_html__( 'Style 8', 'clenix-core' ),
					'style9' => esc_html__( 'Style 9', 'clenix-core' ),
					'style10' => esc_html__( 'Style 10', 'clenix-core' ),
				),
				'default' => 'style1',
			),
			array(
				'type'    => Controls_Manager::SELECT2,
				'id'      => 'backg_color',
				'label'   => esc_html__( 'Theme', 'clenix-core' ),
				'options' => array(
					'light' => esc_html__( 'Light Background', 'clenix-core' ),
					'dark' => esc_html__( 'Dark Background' , 'clenix-core' ),
				),
				'default' => 'light',
				'condition'   => array( 'style' => array( 'style3', 'style4', 'style6', 'style7', 'style8' ) ),
			),		
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'box_back_color',
				'label'   => esc_html__( 'Box Background Color', 'clenix-core' ),
				'default' => '',
				'condition'   => array( 'backg_color' => array( 'dark' ), 'style' => array( 'style3', 'style4', 'style6', 'style7', 'style8' ) ),
				'selectors' => array(
					'{{WRAPPER}} .info-style4 .rtin-item' => 'background-color: {{VALUE}}',
					'{{WRAPPER}} .info-style3 .rtin-item' => 'background-color: {{VALUE}}',
					'{{WRAPPER}} .info-style6 .rtin-item' => 'background-color: {{VALUE}}',
					'{{WRAPPER}} .info-style7 .rtin-item' => 'background-color: {{VALUE}}',
					'{{WRAPPER}} .info-style8 .rtin-item' => 'background-color: {{VALUE}}',
				),
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'box_backhov_color',
				'label'   => esc_html__( 'Box background hover color', 'clenix-core' ),
				'default' => '',
				'condition'   => array( 'backg_color' => array( 'dark' ), 'style' => array( 'style6', 'style7', 'style8' ) ),
				'selectors' => array(
					'{{WRAPPER}} .info-style6 .rtin-item:hover' => 'background-color: {{VALUE}}',
					'{{WRAPPER}} .info-style7 .rtin-item:hover' => 'background-color: {{VALUE}}',
					'{{WRAPPER}} .info-style8 .rtin-item:hover' => 'background-color: {{VALUE}}',
				),
			),
			array(
				'type'    => Controls_Manager::SELECT2,
				'id'      => 'title_align',
				'label'   => esc_html__( 'Content Align', 'clenix-core' ),
				'options' => array(
					'left' => esc_html__( 'Align Left' , 'clenix-core' ),
					'center' => esc_html__( 'Align Center', 'clenix-core' ),
					'right' => esc_html__( 'Align right', 'clenix-core' ),
				),
				'default' => 'center',
				'condition'   => array( 'style' => array( 'style1', 'style2', 'style3', 'style4', 'style5', 'style6', 'style7', 'style9', 'style10' ) ),
			),			
			array(
				'type'    => Controls_Manager::SELECT2,
				'id'      => 'shadow',
				'label'   => esc_html__( 'Shadow', 'clenix-core' ),
				'options' => array(
					'shadow-show' => esc_html__( 'Show', 'clenix-core' ),
					'shadow-hide' => esc_html__( 'Hide' , 'clenix-core' ),
				),
				'default' => 'shadow-show',
				'condition'   => array( 'style' => array( 'style1' ) ),
			),	
			array(
				'type'    => Controls_Manager::MEDIA,
				'id'      => 'layout_one_image',
				'label'   => esc_html__( 'Image', 'clenix-core' ),
				'condition'   => array( 'style' => array( 'style1' ) ),
			),
			array(
				'type'    => Controls_Manager::SELECT2,
				'id'      => 'icontype',
				'label'   => esc_html__( 'Icon Type', 'clenix-core' ),
				'options' => array(
					'icon'  => esc_html__( 'Icon', 'clenix-core' ),
					'image' => esc_html__( 'Custom Image', 'clenix-core' ),
				),
				'default' => 'icon',
			),
			array(
				'type'    => Controls_Manager::ICON,
				'id'      => 'icon',
				'label'   => esc_html__( 'Icon', 'clenix-core' ),
				'default' => 'fa fa-check',
				'condition'   => array( 'icontype' => array( 'icon' ) ),
			),
			array(
				'type'    => Controls_Manager::MEDIA,
				'id'      => 'image',
				'label'   => esc_html__( 'Image', 'clenix-core' ),
				'condition'   => array( 'icontype' => array( 'image' ) ),
				'description' => esc_html__( 'Recommended jpg, png, svg image', 'clenix-core' ),
			),
			array(
				'type'    => Controls_Manager::MEDIA,
				'id'      => 'icon_back_image',
				'label'   => esc_html__( 'Icon Background Image', 'clenix-core' ),
				'description' => esc_html__( 'Recommended image size is 120x120 px', 'clenix-core' ),
				'condition'   => array( 'style' => array( 'style2' ) ),
			),
			array(
				'type'    => Controls_Manager::NUMBER,
				'id'      => 'icon_size',
				'label'   => esc_html__( 'Icon Size', 'clenix-core' ),
				'default' => '',
				'condition'   => array( 'icontype' => array( 'icon' ), 'style' => array( 'style1', 'style2', 'style4', 'style5', 'style9' ) ),
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'icon_bag_color',
				'label'   => esc_html__( 'Icon Background Color', 'clenix-core' ),
				'default' => '',
				'condition'   => array( 'style' => array( 'style9', 'style10' ) ),
				'selectors' => array(
					'{{WRAPPER}} .info-style9 .rtin-item .rtin-media span > span' => 'background: {{VALUE}}',
					'{{WRAPPER}} .info-style10 .rtin-item .rtin-media > span' => 'background: {{VALUE}}',
				),
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'icon_color',
				'label'   => esc_html__( 'Icon Color', 'clenix-core' ),
				'default' => '',
				'condition'   => array( 'icontype' => array( 'icon' ), 'style' => array( 'style2', 'style4', 'style5', 'style8', 'style9', 'style10' ) ),
				'selectors' => array(
					'{{WRAPPER}} .info-style2 .rtin-icon .rtin-media span i' => 'color: {{VALUE}}',
					'{{WRAPPER}} .info-style4 .rtin-icon span i' => 'color: {{VALUE}}',
					'{{WRAPPER}} .info-style5 .rtin-icon span i' => 'color: {{VALUE}}',
					'{{WRAPPER}} .info-style8 .rtin-icon span i' => 'color: {{VALUE}}',
					'{{WRAPPER}} .info-style8 .rtin-item .rtin-content h3:after' => 'color: {{VALUE}}',
					'{{WRAPPER}} .info-style9 .rtin-icon span i' => 'color: {{VALUE}}',
					'{{WRAPPER}} .info-style10 .rtin-icon .rtin-media span i' => 'color: {{VALUE}}',
				),
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'svg_color',
				'label'   => esc_html__( 'Svg Color', 'clenix-core' ),
				'default' => '',
				'condition'   => array( 'icontype' => array( 'image' ), 'style' => array( 'style8', 'style9', 'style10' ) ),
				'selectors' => array(
					'{{WRAPPER}} .info-style8 .rtin-item span svg' => 'fill: {{VALUE}}',
					'{{WRAPPER}} .info-style9 .rtin-item span svg' => 'fill: {{VALUE}}',
					'{{WRAPPER}} .info-style10 .rtin-image .rtin-media .image-svg svg' => 'fill: {{VALUE}}',
				),
			),
			array(
				'type'    => Controls_Manager::TEXT,
				'id'      => 'title',
				'label'   => esc_html__( 'Title', 'clenix-core' ),
				'default' => esc_html__( 'Digital Solutions', 'clenix-core' ),
			),
			array (
				'mode'    => 'group',
				'type'    => Group_Control_Typography::get_type(),
				'name'    => 'title_typo',
				'label'   => esc_html__( 'Title Style', 'clenix-core' ),
				'selector' => '{{WRAPPER}} .info-box .rtin-item-title',
				'scheme'   => Scheme_Typography::TYPOGRAPHY_3,
			),			
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'title_color',
				'label'   => esc_html__( 'Title Color', 'clenix-core' ),
				'default' => '',
				'selectors' => array(
					'{{WRAPPER}} .info-box .rtin-item-title' => 'color: {{VALUE}}',
					'{{WRAPPER}} .info-box .rtin-item-title a' => 'color: {{VALUE}}',
				),
			),
			array(
				'type'    => Controls_Manager::WYSIWYG,
				'id'      => 'content',
				'label'   => esc_html__( 'Content', 'clenix-core' ),
				'default' => esc_html__( 'Grursus mal suada faci lisis is an Lorem is ipsum dolarorit more as ametion that the dummy text elit.', 'clenix-core' ),
				'condition'   => array( 'style' => array( 'style1', 'style2', 'style3', 'style4', 'style5', 'style6', 'style7', 'style9', 'style10' ) ),
			),
			array(
				'type'  => Controls_Manager::URL,
				'id'    => 'url',
				'label' => esc_html__( 'Link (Optional)', 'clenix-core' ),
				'placeholder' => 'https://your-link.com',
				'condition'   => array( 'style' => array( 'style1', 'style2', 'style3', 'style4', 'style5', 'style6', 'style7', 'style8', 'style9', 'style10' ) ),
			),
			array(
				'type'    => Controls_Manager::TEXT,
				'id'      => 'buttontext',
				'label'   => esc_html__( 'Button Text', 'clenix-core' ),
				'default' => esc_html__( 'Read More', 'clenix-core' ),
				'condition'   => array( 'style' => array( 'style2', 'style3', 'style5' ) ),
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
			case 'style10':
			$template = 'info-box-10';
			break;
			case 'style9':
			$template = 'info-box-9';
			break;
			case 'style8':
			$template = 'info-box-8';
			break;
			case 'style7':
			$template = 'info-box-7';
			break;
			case 'style6':
			$template = 'info-box-6';
			break;
			case 'style5':
			$template = 'info-box-5';
			break;
			case 'style4':
			$template = 'info-box-4';
			break;
			case 'style3':
			$template = 'info-box-3';
			break;
			case 'style2':
			$template = 'info-box-2';
			break;
			default:
			$template = 'info-box-1';
			break;
		}

		return $this->rt_template( $template, $data );
	}
}