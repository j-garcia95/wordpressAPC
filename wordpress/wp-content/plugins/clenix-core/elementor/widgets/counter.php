<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

namespace radiustheme\Clenix_Core;

use Elementor\Controls_Manager;

if ( ! defined( 'ABSPATH' ) ) exit;

class Counter extends Custom_Widget_Base {

	public function __construct( $data = [], $args = null ){
		$this->rt_name = __( 'RT Counter', 'clenix-core' );
		$this->rt_base = 'rt-Counter';
		parent::__construct( $data, $args );
	}

	private function rt_load_scripts(){
		wp_enqueue_style( 'animate' );
		wp_enqueue_script( 'counterup' );
		wp_enqueue_script( 'rt-waypoints' );
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
				),
				'default' => 'style2',
			),
			array(
				'type'    => Controls_Manager::SELECT2,
				'id'      => 'iconalign',
				'label'   => esc_html__( 'Icon Align', 'clenix-core' ),
				'options' => array(
					'left' => esc_html__( 'left', 'clenix-core' ),
					'center' => esc_html__( 'Center', 'clenix-core' ),
					'right' => esc_html__( 'Right', 'clenix-core' ),
				),
				'default' => 'center',
			),
			array(
				'type'    => Controls_Manager::SELECT2,
				'id'      => 'showhide',
				'label'   => esc_html__( 'Icon/image', 'clenix-core' ),
				'options' => array(
					'show'        => esc_html__( 'Show', 'clenix-core' ),
					'hide'        => esc_html__( 'Hide', 'clenix-core' ),
				),
				'default' => 'show',
				'condition'   => array( 'style' => array( 'style1' ) ),
			),
			array(
				'type'    => Controls_Manager::SELECT2,
				'id'      => 'icontype',
				'label'   => __( 'Icon Type', 'clenix-core' ),
				'options' => array(
					'icon'  => __( 'Icon', 'clenix-core' ),
					'image' => __( 'Custom Image', 'clenix-core' ),
				),
				'default' => 'icon',
				'condition'   => array( 'style' => array( 'style1' ) ),
			),
			array(
				'type'    => Controls_Manager::ICON,
				'id'      => 'icon',
				'label'   => __( 'Icon', 'clenix-core' ),
				'default' => 'fa fa-book',
				'condition'   => array( 'icontype' => array( 'icon' ), 'style' => array( 'style1' ) ),
			),
			array(
				'type'    => Controls_Manager::MEDIA,
				'id'      => 'image',
				'label'   => __( 'Image', 'clenix-core' ),
				'condition'   => array( 'icontype' => array( 'image' ) ),
				'description' => __( 'Recommended image size is 67x67 px', 'clenix-core' ),
				'condition'   => array( 'icontype' => array( 'image' ), 'style' => array( 'style1' ) ),
			),
			array(
				'type'    => Controls_Manager::TEXT,
				'id'      => 'title',
				'label'   => esc_html__( 'Title', 'clenix-core' ),
				'default' => esc_html__( 'Total Posts', 'clenix-core' ),
			),
			array(
				'type'    => Controls_Manager::NUMBER,
				'id'      => 'number',
				'label'   => esc_html__( 'Counter Number', 'clenix-core' ),
				'default' => 5000,
			),
			array(
				'type'    => Controls_Manager::NUMBER,
				'id'      => 'speed',
				'label'   => esc_html__( 'Animation Speed', 'clenix-core' ),
				'default' => 2000,
				'description' => esc_html__( 'The total duration of the count animation in milisecond eg. 5000', 'clenix-core' ),
			),
			array(
				'type'    => Controls_Manager::NUMBER,
				'id'      => 'steps',
				'label'   => esc_html__( 'Animation Steps', 'clenix-core' ),
				'default' => 50,
				'description' => esc_html__( 'Counter steps eg. 10', 'clenix-core' ),
			),
			array(
				'mode' => 'section_end',
			),
			
			array(
				'mode'    => 'section_start',
				'id'      => 'sec_colors',
				'label'   => esc_html__( 'Colors', 'clenix-core' ),
				'tab'     => Controls_Manager::TAB_STYLE,
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'title_color',
				'label'   => esc_html__( 'Title Color', 'clenix-core' ),
				'default' => '',
				'selectors' => array(
					'{{WRAPPER}} .rt-counter .rtin-item .rtin-title' => 'color: {{VALUE}}',
				),
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'counter_color',
				'label'   => esc_html__( 'Counter Color', 'clenix-core' ),
				'default' => '',
				'selectors' => array(
					'{{WRAPPER}} .rt-counter .rtin-item .rtin-counter' => 'color: {{VALUE}}',
				),
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'icon_color',
				'label'   => esc_html__( 'Icon Color', 'clenix-core' ),
				'default' => '',
				'selectors' => array(
					'{{WRAPPER}} .rt-counter .rtin-item i' => 'color: {{VALUE}}',
				),
				'condition'   => array( 'style' => array( 'style1' ) ),
			),
			array(
				'type'    => Controls_Manager::TEXT,
				'id'      => 'title_size',
				'label'   => esc_html__( 'Title Font Size', 'clenix-core' ),
				'default' => '',
				'selectors' => array(
					'{{WRAPPER}} .rt-counter .rtin-item .rtin-title' => 'font-size: {{VALUE}}px',
				),
			),
			array(
				'type'    => Controls_Manager::TEXT,
				'id'      => 'counter_size',
				'label'   => esc_html__( 'Counter Font Size', 'clenix-core' ),
				'default' => '',
				'selectors' => array(
					'{{WRAPPER}} .rt-counter .rtin-item .rtin-counter' => 'font-size: {{VALUE}}px',
				),
			),
			array(
				'type'    => Controls_Manager::TEXT,
				'id'      => 'icon_size',
				'label'   => esc_html__( 'Icon Font Size', 'clenix-core' ),
				'default' => '',
				'selectors' => array(
					'{{WRAPPER}} .rt-counter .rtin-item i' => 'font-size: {{VALUE}}px',
				),
				'condition'   => array( 'style' => array( 'style1' ) ),
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
		
		switch ( $data['style'] ) {
			case 'style2':
			$template = 'counter-2';
			break;
			default:
			$template = 'counter-1';
			break;
		}

		return $this->rt_template( $template, $data );
	}
}