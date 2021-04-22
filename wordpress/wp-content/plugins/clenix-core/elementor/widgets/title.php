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

class Title extends Custom_Widget_Base {

	public function __construct( $data = [], $args = null ){
		$this->rt_name = esc_html__( 'RT Section Title', 'clenix-core' );
		$this->rt_base = 'rt-title';
		parent::__construct( $data, $args );
	}

	public function rt_fields(){
		$fields = array(
			array(
				'mode'    => 'section_start',
				'id'      => 'sec_general',
				'label'   => esc_html__( 'News Title', 'clenix-core' ),
			),
			/*box title*/
			array(
				'type'    => Controls_Manager::SELECT2,
				'id'      => 'style',
				'label'   => esc_html__( 'Title Style', 'clenix-core' ),
				'options' => array(
					'style1' => esc_html__( 'Title Style 1' , 'clenix-core' ),
					'style2' => esc_html__( 'Title Style 2', 'clenix-core' ),
					'style3' => esc_html__( 'Title Style 3', 'clenix-core' ),
					'style4' => esc_html__( 'Title Style 4 ( left Bar )', 'clenix-core' ),
				),
				'default' => 'style1',
			),
			array(
				'type'    => Controls_Manager::SELECT2,
				'id'      => 'title_align',
				'label'   => esc_html__( 'Title Align', 'clenix-core' ),
				'options' => array(
					'left' => esc_html__( 'Align Left' , 'clenix-core' ),
					'center' => esc_html__( 'Align Center', 'clenix-core' ),
					'right' => esc_html__( 'Align right', 'clenix-core' ),
				),
				'default' => 'center',
				'condition'   => array( 'style' => array( 'style1', 'style2', 'style3' ) ),
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
				'condition'   => array( 'style' => array( 'style1', 'style3' ) ),
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
				'description' => esc_html__( 'Recommended image / SVG image size is 35x36 px', 'clenix-core' ),
				'condition'   => array( 'icontype' => array( 'image' ), 'style' => array( 'style1', 'style3' ) ),
			),
			array(
				'type'    => Controls_Manager::MEDIA,
				'id'      => 'title2_image',
				'label'   => esc_html__( 'Image', 'clenix-core' ),
				'description' => esc_html__( 'Recommended image / SVG image size is 35x36 px', 'clenix-core' ),
				'condition'   => array( 'style' => array( 'style2' ) ),
			),
			array(
				'type'    => Controls_Manager::TEXTAREA,
				'id'      => 'title',
				'label'   => esc_html__( 'Title', 'clenix-core' ),
				'default' => 'Wellcome To Clenix',
			),
			array(
				'type'    => Controls_Manager::TEXTAREA,
				'id'      => 'sub_title',
				'label'   => esc_html__( 'Sub Title', 'clenix-core' ),
				'default' => esc_html__( 'Our subtitle', 'clenix-core' ),
				'condition'   => array( 'style' => array( 'style1', 'style3' ) ),
			),			
			array(
				'type'    => Controls_Manager::WYSIWYG,
				'id'      => 'content',
				'label'   => esc_html__( 'Content', 'clenix-core' ),
				'default' => esc_html__( 'Perspiciatis unde omnis iste natus error sit voluptatem accusantium dol oremque laudantium, totam remeaque ipsa.', 'clenix-core' ),
				'condition'   => array( 'style' => array( 'style2' ) ),
			),
			/*Title Style Option*/
			
			array (
				'mode'    => 'group',
				'type'    => Group_Control_Typography::get_type(),
				'name'    => 'title_typo',
				'label'   => esc_html__( 'Title Style', 'clenix-core' ),
				'selector' => '{{WRAPPER}} .sec-title .rtin-title',
				'scheme'   => Scheme_Typography::TYPOGRAPHY_3,
			),
			array (
				'mode'    => 'group',
				'type'    => Group_Control_Typography::get_type(),
				'name'    => 'sub_title_typo',
				'label'   => esc_html__( 'Sub Title Style', 'clenix-core' ),
				'selector' => '{{WRAPPER}} .sec-title .sub-title',
				'scheme'   => Scheme_Typography::TYPOGRAPHY_3,
				'condition'   => array( 'style' => array( 'style1', 'style3' ) ),
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'title_color',
				'label'   => esc_html__( 'Title Color', 'clenix-core' ),
				'default' => '',
				'selectors' => array(
					'{{WRAPPER}} .sec-title .rtin-title' => 'color: {{VALUE}}',
				),
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'title_bar_color',
				'label'   => esc_html__( 'Title Bar Color', 'clenix-core' ),
				'default' => '',
				'selectors' => array(
					'{{WRAPPER}} .barshow .title-bar' => 'background: {{VALUE}}',
				),
				'condition'   => array( 'style' => array( 'style1', 'style3' ) ),
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'svg_img_color',
				'label'   => esc_html__( 'SVG Image Color', 'clenix-core' ),
				'default' => '',
				'selectors' => array(
					'{{WRAPPER}} .sec-title .title-svg svg path' => 'fill: {{VALUE}}',
				),
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'sub_title_color',
				'label'   => esc_html__( 'Sub Title Color', 'clenix-core' ),
				'default' => '',
				'selectors' => array(
					'{{WRAPPER}} .sec-title .sub-title' => 'color: {{VALUE}}',
					'{{WRAPPER}} .sec-title.style2 .rtin-text' => 'color: {{VALUE}}',
				),
				'condition'   => array( 'style' => array( 'style1', 'style2', 'style3' ) ),
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
			case 'style4':
			$template = 'title-4';
			break;
			case 'style3':
			$template = 'title-3';
			break;
			case 'style2':
			$template = 'title-2';
			break;
			default:
			$template = 'title-1';
			break;
		}

		return $this->rt_template( $template, $data );
	}
}