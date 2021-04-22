<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

namespace radiustheme\Clenix_Core;

use Elementor\Controls_Manager;

if ( ! defined( 'ABSPATH' ) ) exit;

class Contact_Info extends Custom_Widget_Base {

	public function __construct( $data = [], $args = null ){
		$this->rt_name = esc_html__( 'RT Contact Info', 'clenix-core' );
		$this->rt_base = 'rt-contact-info';
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
				'type'    => Controls_Manager::TEXTAREA,
				'id'      => 'content',
				'label'   => esc_html__( 'Content', 'clenix-core' ),
				'default' => esc_html__( 'Lorem Ipsum hasbeen standard daand scrambled. Rimply dummy text of the printing and typesetting industry', 'clenix-core' ),
			),
			array(
				'type'    => Controls_Manager::TEXTAREA,
				'id'      => 'address',
				'label'   => esc_html__( 'Address', 'clenix-core' ),
				'default' => esc_html__( '29 Street, Melbourne City, Australia # 34 Road, House #10.', 'clenix-core' ),
			),
			array(
				'type'    => Controls_Manager::TEXT,
				'id'      => 'phone1',
				'label'   => esc_html__( 'Phone 1', 'clenix-core' ),
				'default' => '+0000000000',
			),
			array(
				'type'    => Controls_Manager::TEXT,
				'id'      => 'phone2',
				'label'   => esc_html__( 'Phone 2', 'clenix-core' ),
			),
			array(
				'type'    => Controls_Manager::TEXT,
				'id'      => 'email',
				'label'   => esc_html__( 'Email', 'clenix-core' ),
				'default' => 'info@example.com',
			),
			array(
				'type'    => Controls_Manager::TEXT,
				'id'      => 'fax',
				'label'   => esc_html__( 'Fax', 'clenix-core' ),
				'default' => '+0000000000',
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'icon_color',
				'label'   => esc_html__( 'Icon Color', 'clenix-core' ),
				'default' => '',
				'selectors' => array(
					'{{WRAPPER}} .rtin-contact-info ul li i' => 'color: {{VALUE}}',
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

		$template = 'contact-info';

		return $this->rt_template( $template, $data );
	}
}