<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

namespace radiustheme\Clenix_Core;

use Elementor\Controls_Manager;

if ( ! defined( 'ABSPATH' ) ) exit;

class Slider extends Custom_Widget_Base {

	public function __construct( $data = [], $args = null ){
		$this->rt_name = esc_html__( 'FullScreen Slider', 'clenix-core' );
		$this->rt_base = 'rt-slider';
		parent::__construct( $data, $args );
	}

	private function rt_load_scripts(){
		wp_enqueue_style( 'nivo-slider' );
		wp_enqueue_script( 'nivo-slider' );
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
				'id'      => 'layout',
				'label'   => esc_html__( 'Slider Layout', 'clenix-core' ),
				'options' => array(
					'slider1' => esc_html__( 'Slider Layout 1', 'clenix-core' ),
					'slider2' => esc_html__( 'Slider Layout 2', 'clenix-core' ),
				),
				'default' => 'slider1',
			),
			array(
				'type'    => Controls_Manager::REPEATER,
				'id'      => 'slides',
				'label'   => esc_html__( 'Add as many slides as you want', 'clenix-core' ),
				'fields'  => array(
					array(
						'type'    => Controls_Manager::MEDIA,
						'name'    => 'image',
						'label'   => esc_html__( 'Image', 'clenix-core' ),
						'description' => esc_html__( 'Image size should be 1920x820 px', 'clenix-core' ),
					),
					array(
						'type'    => Controls_Manager::TEXTAREA,
						'name'    => 'title',
						'label'   => esc_html__( 'Title', 'clenix-core' ),
						'default' => esc_html__( 'Test Title', 'clenix-core' ),
					),
					array(
						'type'    => Controls_Manager::TEXTAREA,
						'name'    => 'sub_title',
						'label'   => esc_html__( 'Sub Title', 'clenix-core' ),
						'default' => esc_html__( 'Experts Are', 'clenix-core' ),
					),
					array(
						'type'    => Controls_Manager::TEXTAREA,
						'name'    => 'content',
						'label'   => esc_html__( 'Content (For desktop and tab)', 'clenix-core' ),
						'default' => 'Mimply dummy text of the printing type setting area lead spsum dolor onsecte dipiscing. Mimply dummy text printing apsum dolor onsecte dipiscing.',
					),
					array(
						'type'    => Controls_Manager::TEXTAREA,
						'name'    => 'content_mob',
						'label'   => esc_html__( 'Content (For mobile)', 'clenix-core' ),
						'default' => 'Dorem ipsum dolor sit amet, consectetur adipisicing',
					),
					array(
						'type'    => Controls_Manager::COLOR,
						'name'      => 'title_color',
						'label'   => esc_html__( 'Title Color', 'clenix-core' ),
						'default' => '',
						'selectors' => array(
							'{{WRAPPER}} .rt-el-slider .rtin-content .rtin-content-inner .rtin-content-wrap .rtin-title' => 'color: {{VALUE}}',
						),
					),
					array(
						'type'    	=> Controls_Manager::COLOR,
						'name'      => 'sub_title_color',
						'label'   	=> esc_html__( 'Sub Title Color', 'clenix-core' ),
						'default' 	=> '',
						'selectors' => array(
						'{{WRAPPER}} .rt-el-slider .rtin-content .rtin-content-inner .rtin-content-wrap .rtin-sub-title' => 'color: {{VALUE}}',
						),
					),
					array(
						'type'    	=> Controls_Manager::COLOR,
						'name'      => 'content_color',
						'label'   	=> esc_html__( 'Content Color', 'clenix-core' ),
						'default' 	=> '',
						'selectors' => array(
						'{{WRAPPER}} .rt-el-slider .rtin-content .rtin-content-inner .rtin-content-wrap .rtin-content-desk' => 'color: {{VALUE}}',
						'{{WRAPPER}} .rt-el-slider .rtin-content .rtin-content-inner .rtin-content-wrap .rtin-content-mob' => 'color: {{VALUE}}',
						),
					),
					array(
						'type'    => Controls_Manager::TEXT,
						'name'    => 'buttontext',
						'label'   => esc_html__( 'Button Text', 'clenix-core' ),
						'default' => 'LOREM IPSUM',
					),
					array(
						'type'    => Controls_Manager::TEXT,
						'name'    => 'buttonurl',
						'label'   => esc_html__( 'Button URL', 'clenix-core' ),
					),
				),
			),
			array(
				'mode' => 'section_end',
			),
			array(
				'mode'        => 'section_start',
				'id'          => 'sec_slider',
				'label'       => esc_html__( 'Slider Options', 'clenix-core' ),
			),
			array(
				'type'        => Controls_Manager::SWITCHER,
				'id'          => 'slider_nav',
				'label'       => esc_html__( 'Navigation Arrow', 'clenix-core' ),
				'label_on'    => esc_html__( 'On', 'clenix-core' ),
				'label_off'   => esc_html__( 'Off', 'clenix-core' ),
				'default'     => 'yes',
				'description' => esc_html__( 'Enable or disable navigation arrow. Default: On', 'clenix-core' ),
			),
			array(
				'type'        => Controls_Manager::SWITCHER,
				'id'          => 'slider_dots',
				'label'       => esc_html__( 'Navigation Dot', 'clenix-core' ),
				'label_on'    => esc_html__( 'On', 'clenix-core' ),
				'label_off'   => esc_html__( 'Off', 'clenix-core' ),
				'default'     => '',
				'description' => esc_html__( 'Enable or disable navigation dot. Default: Off', 'clenix-core' ),
			),
			array(
				'type'        => Controls_Manager::SWITCHER,
				'id'          => 'slider_autoplay',
				'label'       => esc_html__( 'Autoplay', 'clenix-core' ),
				'label_on'    => esc_html__( 'On', 'clenix-core' ),
				'label_off'   => esc_html__( 'Off', 'clenix-core' ),
				'default'     => 'yes',
				'description' => esc_html__( 'Enable or disable autoplay. Default: On', 'clenix-core' ),
			),
			array(
				'type'    	  => Controls_Manager::SELECT2,
				'id'      	  => 'slider_effect',
				'label'   	  => esc_html__( 'Slider Effect', 'clenix-core' ),
				'options' 	  => array(
					'sliceDown' 		=> esc_html__( 'SliceDown', 'blogxer-core' ),
					'sliceDownLeft' 	=> esc_html__( 'SliceDownLeft', 'blogxer-core' ),
					'sliceUp' 			=> esc_html__( 'SliceUp', 'blogxer-core' ),
					'sliceUpLeft' 		=> esc_html__( 'SliceUpLeft', 'blogxer-core' ),
					'sliceUpDown' 		=> esc_html__( 'SliceUpDown',  'blogxer-core' ),
					'SliceUpDownLeft' 	=> esc_html__( 'SliceUpDownLeft',  'blogxer-core' ),
					'fade' 				=> esc_html__( 'Fade',  'blogxer-core' ),
					'slideInRight' 		=> esc_html__( 'SlideInRight',  'blogxer-core' ),
					'slideInLeft' 		=> esc_html__( 'SlideInLeft',  'blogxer-core' ),
					'boxRainReverse' 	=> esc_html__( 'BoxRainReverse',  'blogxer-core' ),
				),
				'default' 	  => 'boxRainReverse',
				'description' => esc_html__( 'Slider Effect. Default: boxRainReverse', 'clenix-core' ),
			),
			array(
				'type'    	  => Controls_Manager::NUMBER,
				'id'      	  => 'slider_anim_speed',
				'label'   	  => esc_html__( 'Slider Animatin Speed', 'clenix-core' ),
				'default' 	  => 500,
				'description' => esc_html__( 'Slide speed in milliseconds. Default: 500', 'clenix-core' ),
			),
			array(
				'type'    	  => Controls_Manager::NUMBER,
				'id'      	  => 'slider_pause_time',
				'label'   	  => esc_html__( 'Slider Pause Time', 'clenix-core' ),
				'default' 	  => 3000,
				'description' => esc_html__( 'Slide Pause Time. Default: 3000', 'clenix-core' ),
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

		$template = 'slider';

		return $this->rt_template( $template, $data );
	}
}