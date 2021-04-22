<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

namespace radiustheme\Clenix_Core;
use Elementor\Controls_Manager;

if ( ! defined( 'ABSPATH' ) ) exit;

class Contact_Address extends Custom_Widget_Base {

	public function __construct( $data = [], $args = null ){
		$this->rt_name = esc_html__( 'RT Contact Address', 'clenix-core' );
		$this->rt_base = 'rt-contact-address';
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
				'label'   => esc_html__( 'Theme Style', 'clenix-core' ),
				'options' => array(
					'light' => esc_html__( 'Light Background', 'clenix-core' ),
					'dark'  => esc_html__( 'Dark Background', 'clenix-core' ),
				),
				'default' => 'light',
			),
			array(
				'type'    => Controls_Manager::TEXT,
				'id'    => 'address_title',
				'label'   => esc_html__( 'Address Tile', 'clenix-core' ),
				'default' => esc_html__( 'Our Office Address', 'clenix-core' ),
			),
			array (
				'type'    => Controls_Manager::REPEATER,
				'id'      => 'address_info',
				'label'   => esc_html__( 'Address', 'clenix-core' ),
				'fields'  => array(
					array(
						'type'    => Controls_Manager::TEXTAREA,
						'name'    => 'address_icon',
						'label'   => esc_html__( 'Address Icon', 'clenix-core' ),
						'default' => '<i class="flaticon-gps"></i>',
					),
					array(
						'type'    => Controls_Manager::TEXT,
						'name'    => 'address_label',
						'label'   => esc_html__( 'Address Label', 'clenix-core' ),
						'default' => 'Office Name',
					),
					array(
						'type'    => Controls_Manager::TEXTAREA,
						'name'    => 'address_infos',
						'label'   => esc_html__( 'Add Address', 'clenix-core' ),
						'default' => 'City Hall<br>The Queen\'s Walk<br>London<br>SE1 2AA<br><a href="tel:01234564">0123456</a> ',
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
		
		$template = 'contact-address';

		return $this->rt_template( $template, $data );
	}
}