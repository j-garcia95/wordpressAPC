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

class RT_Animate_Image extends Custom_Widget_Base {

	public function __construct( $data = [], $args = null ){
		$this->rt_name = esc_html__( 'RT Animate Image', 'clenix-core' );
		$this->rt_base = 'rt-animate-image';
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
				'id'      => 'big_image',
				'label'   => esc_html__( 'Image', 'clenix-core' ),
				'description' => esc_html__( 'Recommended image size is 490x600 px', 'clenix-core' ),
			),
			array (
				'type'    => Controls_Manager::REPEATER,
				'id'      => 'icon_info',
				'label'   => esc_html__( 'Icon Info', 'clenix-core' ),
				'fields'  => array(
					
					array(
						'type'    => Controls_Manager::SELECT2,
						'name'      => 'icontype',
						'label'   => esc_html__( 'Icon Type', 'clenix-core' ),
						'options' => array(
							'icon'  => esc_html__( 'Icon', 'clenix-core' ),
							'image' => esc_html__( 'Custom Image', 'clenix-core' ),
						),
						'default' => 'icon',
					),
					array(
						'type'    => Controls_Manager::ICON,
						'name'      => 'icon',
						'label'   => esc_html__( 'Icon', 'clenix-core' ),
						'default' => 'fa fa-check',
						'condition'   => array( 'icontype' => array( 'icon' )),
					),
					array(
						'type'    => Controls_Manager::MEDIA,
						'name'      => 'image',
						'label'   => esc_html__( 'Image', 'clenix-core' ),
						'description' => esc_html__( 'Recommended image jpg/png/svg size is 60x60 px', 'clenix-core' ),
						'condition'   => array( 'icontype' => array( 'image' )),
					),
					array(
						'type'    => Controls_Manager::COLOR,
						'name'    => 'icon_color',
						'label'   => esc_html__( 'Icon Color', 'clenix-core' ),
						'description' => esc_html__( 'Awesome font color', 'clenix-core' ),
						'default' => '',
						'selectors' => array(
							'{{WRAPPER}} .about-animate-image .item-icon .image-svg svg' => 'fill: {{VALUE}}',
						),
					),
					array(
						'type'    => Controls_Manager::NUMBER,
						'name'    => 'icon_size',
						'label'   => esc_html__( 'Icon Size', 'clenix-core' ),
						'default' => '',
						'description' => esc_html__( 'Awesome font size', 'clenix-core' ),
					),
					array(
						'type'    => Controls_Manager::NUMBER,
						'name'    => 'icon_position_top',
						'label'   => esc_html__( 'Icon Position Top', 'clenix-core' ),
						'default' => '',
					),
					array(
						'type'    => Controls_Manager::NUMBER,
						'name'    => 'icon_position_right',
						'label'   => esc_html__( 'Icon Position right', 'clenix-core' ),
						'default' => '',
					),
					array(
						'type'    => Controls_Manager::NUMBER,
						'name'    => 'icon_position_left',
						'label'   => esc_html__( 'Icon Position Left', 'clenix-core' ),
						'default' => '',
					),
					array(
						'type'    => Controls_Manager::NUMBER,
						'name'    => 'icon_position_bottom',
						'label'   => esc_html__( 'Icon Position Bottom', 'clenix-core' ),
						'default' => '',
					),
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

		$template = 'animate-image';
	
		return $this->rt_template( $template, $data );
	}
}