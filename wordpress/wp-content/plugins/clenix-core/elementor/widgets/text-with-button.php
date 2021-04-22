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

class Text_With_Button extends Custom_Widget_Base {

	public function __construct( $data = [], $args = null ){
		$this->rt_name = esc_html__( 'RT Title Text With Button', 'clenix-core' );
		$this->rt_base = 'rt-text-with-button';
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
				'label'   => esc_html__( 'Text Style', 'clenix-core' ),
				'options' => array(
					'style1' => esc_html__( 'Text Style 1' , 'clenix-core' ),
					'style2' => esc_html__( 'Text Style 2', 'clenix-core' ),
				),
				'default' => 'style1',
			),
			array(
				'type'    => Controls_Manager::SELECT2,
				'id'      => 'textalign',
				'label'   => esc_html__( 'Text Align', 'clenix-core' ),
				'options' => array(
					'left' => esc_html__( 'Left', 'clenix-core' ),
					'center' => esc_html__( 'Center', 'clenix-core' ),
					'right' => esc_html__( 'Right', 'clenix-core' ),
				),
				'default' => 'left',
			),
			array(
				'type'    => Controls_Manager::SELECT2,
				'id'      => 'icontype',
				'label'   => esc_html__( 'Icon Type', 'clenix-core' ),
				'options' => array(
					'showhide'  => esc_html__( 'Title Bar', 'clenix-core' ),
					'image' => esc_html__( 'Title Image', 'clenix-core' ),
				),
				'default' => 'showhide',
			),
			array(
				'type'    => Controls_Manager::SELECT2,
				'id'      => 'showhide',
				'label'   => esc_html__( 'Title Bar', 'clenix-core' ),
				'options' => array(
					'barshow'        => esc_html__( 'Show', 'clenix-core' ),
					'barhide'        => esc_html__( 'Hide', 'clenix-core' ),
				),
				'default' => 'barhide',
				'condition'   => array( 'icontype' => array( 'showhide' ), 'style' => array( 'style1', 'style3' ) ),
			),
			array(
				'type'    => Controls_Manager::MEDIA,
				'id'      => 'image',
				'label'   => esc_html__( 'Image', 'clenix-core' ),
				'description' => esc_html__( 'Recommended image size is 100x12 px', 'clenix-core' ),
				'condition'   => array( 'icontype' => array( 'image' ) ),
			),
			array(
				'type'    => Controls_Manager::TEXTAREA,
				'id'      => 'title',
				'label'   => esc_html__( 'Title', 'clenix-core' ),
				'default' => esc_html__( 'Wellcome To Clenix', 'clenix-core' ),
			),
			array(
				'type'    => Controls_Manager::TEXTAREA,
				'id'      => 'sub_title',
				'label'   => esc_html__( 'Sub Title', 'clenix-core' ),
				'default' => esc_html__('About Us', 'clenix-core' ),
			),
			array(
				'type'    => Controls_Manager::WYSIWYG,
				'id'      => 'content',
				'label'   => esc_html__( 'Content', 'clenix-core' ),
				'default' => esc_html__('Lorem Ipsum has been the industrys standard dummy text ever since printer took a galley. Rimply dummy text of the printing and typesetting industry', 'clenix-core' ),
			),
			array(
				'type'        => Controls_Manager::SWITCHER,
				'id'          => 'button_display',
				'label'       => esc_html__( 'Button Display', 'clenix-core' ),
				'label_on'    => esc_html__( 'On', 'clenix-core' ),
				'label_off'   => esc_html__( 'Off', 'clenix-core' ),
				'default'     => false,
				'description' => esc_html__( 'Show or Hide Content. Default: off', 'clenix-core' ),
			),
			array(
				'type'    => Controls_Manager::SELECT2,
				'id'      => 'button_style',
				'label'   => esc_html__( 'Button Style', 'clenix-core' ),
				'options' => array(
					'clenix-button-1'   => esc_html__( 'Button 1', 'clenix-core' ),
					'clenix-button-2'   => esc_html__( 'Button 2', 'clenix-core' ),
				),
				'default' => 'clenix-button-1',
				'condition'   => array( 'button_display' => array( 'yes' ) ),
			),
			array(
				'type'    => Controls_Manager::TEXT,
				'id'      => 'button_one',
				'label'   => esc_html__( 'Button Text', 'clenix-core' ),
				'default' => esc_html__( 'Read More', 'clenix-core' ),
				'condition'   => array( 'button_display' => array( 'yes' ) ),
			),
			array(
				'type'    => Controls_Manager::URL,
				'id'      => 'one_buttonurl',
				'label'   => esc_html__( 'Button URL', 'clenix-core' ),
				'placeholder' => 'https://your-link.com',
				'condition'   => array( 'button_display' => array( 'yes' ) ),
			),
			
			array(
				'mode' => 'section_end',
			),
			// Style
			array(
				'mode'    => 'section_start',
				'id'      => 'sec_style',
				'label'   => esc_html__( 'Style', 'clenix-core' ),
				'tab'     => Controls_Manager::TAB_STYLE,
			),
			array (
				'mode'    => 'group',
				'type'    => Group_Control_Typography::get_type(),
				'name'    => 'title_typo',
				'label'   => esc_html__( 'Title Style', 'clenix-core' ),
				'selector' => '{{WRAPPER}} .title-text-button .rtin-title',
				'scheme'   => Scheme_Typography::TYPOGRAPHY_3,
			),
			array (
				'mode'    => 'group',
				'type'    => Group_Control_Typography::get_type(),
				'name'    => 'sub_title_typo',
				'label'   => esc_html__( 'Sub Title Style', 'clenix-core' ),
				'selector' => '{{WRAPPER}} .title-text-button .subtitle',
				'scheme'   => Scheme_Typography::TYPOGRAPHY_3,
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'title_color',
				'label'   => esc_html__( 'Title Color', 'clenix-core' ),
				'default' => '',
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'sub_title_color',
				'label'   => esc_html__( 'Sub Title Color', 'clenix-core' ),
				'default' => '',
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'title_bar_color',
				'label'   => esc_html__( 'Title Bar Color', 'clenix-core' ),
				'default' => '',
				'selectors' => array(
					'{{WRAPPER}} .barshow .title-bar' => 'background: {{VALUE}}',
				),
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'content_color',
				'label'   => esc_html__( 'Content Color', 'clenix-core' ),
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
		
		switch ( $data['style'] ) {
			case 'style2':
			$template = 'text-with-button-2';
			break;
			default:
			$template = 'text-with-button-1';
			break;
		}
	
		return $this->rt_template( $template, $data );
	}
}