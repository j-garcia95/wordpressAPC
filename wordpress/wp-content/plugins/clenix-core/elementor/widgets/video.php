<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

namespace radiustheme\Clenix_Core;
use Elementor\Controls_Manager;

if ( ! defined( 'ABSPATH' ) ) exit;

class Video extends Custom_Widget_Base {

	public function __construct( $data = [], $args = null ){
		$this->rt_name = esc_html__( 'RT Video', 'clenix-core' );
		$this->rt_base = 'rt-video';
		parent::__construct( $data, $args );
	}
	
	private function rt_load_scripts(){
		wp_enqueue_script( 'magnific-popup' );
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
				),
				'default' => 'style1',
			),			
			array(
				'type'    => Controls_Manager::URL,
				'id'      => 'videourl',
				'label'   => esc_html__( 'Video URL', 'clenix-core' ),
				'placeholder' => 'https://your-link.com',
			),
			array(
				'type'    => Controls_Manager::MEDIA,
				'id'      => 'image_one',
				'label'   => esc_html__( 'Background Image', 'clenix-core' ),
			),
			array(
				'type'    => Controls_Manager::MEDIA,
				'id'      => 'image_two',
				'label'   => esc_html__( 'Background Image', 'clenix-core' ),
				'condition'   => array( 'style' => array( 'style1' ) ),
			),
			array(
				'type'    => Controls_Manager::TEXT,
				'id'      => 'buttontext',
				'label'   => esc_html__( 'Button Text', 'clenix-core' ),
				'default' => esc_html__( 'Play Video', 'clenix-core' ),
				'condition'   => array( 'style' => array( 'style3' ) ),
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
			case 'style3':
			$template = 'video-3';
			break;
			case 'style2':
			$template = 'video-2';
			break;
			default:
			$template = 'video-1';
			break;
		}

		return $this->rt_template( $template, $data );
	}
}