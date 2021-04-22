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

class Pricing_Table extends Custom_Widget_Base {

	public function __construct( $data = [], $args = null ){
		$this->rt_name = esc_html__( 'RT Pricing Table', 'clenix-core' );
		$this->rt_base = 'rt-pricing-table';
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
				'id'      => 'layout',
				'label'   => esc_html__( 'Layout', 'clenix-core' ),
				'options' => array(
					'layout1' => esc_html__( 'Layout 1', 'clenix-core' ),
					'layout2' => esc_html__( 'Layout 2', 'clenix-core' ),
					'layout3' => esc_html__( 'Layout 3', 'clenix-core' ),
				),
				'default' => 'layout1',
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
				'condition'   => array( 'layout' => array( 'layout1', 'layout2' ) ),
			),
			array(
				'type'    => Controls_Manager::ICON,
				'id'      => 'icon',
				'label'   => esc_html__( 'Icon', 'clenix-core' ),
				'default' => 'fa fa-check',
				'condition'   => array( 'icontype' => array( 'icon' ), 'layout' => array( 'layout1', 'layout2' ) ),
			),
			array(
				'type'    => Controls_Manager::MEDIA,
				'id'      => 'image',
				'label'   => esc_html__( 'Image', 'clenix-core' ),
				'condition'   => array( 'icontype' => array( 'image' ), 'layout' => array( 'layout1', 'layout2' ) ),
				'description' => esc_html__( 'Recommended image/jpg/png/svg', 'clenix-core' ),
			),			
			array(
				'type'    => Controls_Manager::NUMBER,
				'id'      => 'icon_size',
				'label'   => esc_html__( 'Icon Size', 'clenix-core' ),
				'description' => esc_html__( 'Recommended Icon size is 52x52 px', 'clenix-core' ),
				'default' => '',
				'selectors' => array(
					'{{WRAPPER}} .rt-price-table-box .rtin-icon i' => 'font-size: {{VALUE}}px',
					'{{WRAPPER}} .rt-price-table-box .rtin-icon .image-svg svg' => 'width: {{VALUE}}px',
					'{{WRAPPER}} .rt-price-table-box .rtin-icon .image-svg img' => 'width: {{VALUE}}px',
				),
				'condition'   => array( 'layout' => array( 'layout1', 'layout2' ) ),
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'icon_color',
				'label'   => esc_html__( 'Icon Color', 'clenix-core' ),
				'default' => '',
				'selectors' => array(
					'{{WRAPPER}} .rt-price-table-box .rtin-icon i' => 'color: {{VALUE}}',
				),
				'condition'   => array( 'layout' => array( 'layout1', 'layout2' ) ),
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'icon_hover_color',
				'label'   => esc_html__( 'Icon Hover Color', 'clenix-core' ),
				'default' => '',
				'selectors' => array(
					'{{WRAPPER}} .rt-price-table-box:hover .rtin-icon i' => 'color: {{VALUE}}',
				),
				'condition'   => array( 'layout' => array( 'layout1', 'layout2' ) ),
			),
			array(
				'type'    => Controls_Manager::TEXTAREA,
				'id'      => 'title',
				'label'   => esc_html__( 'Title', 'clenix-core' ),
				'default' => esc_html__( 'Basic', 'clenix-core' ),
			),			
			array(
				'type'    => Controls_Manager::TEXT,
				'id'      => 'price',
				'label'   => esc_html__( 'Price', 'clenix-core' ),
				'default' => '39',
				'description' => esc_html__( "Including currency sign eg. $59", 'clenix-core' ),
			),
			array(
				'type'    => Controls_Manager::TEXT,
				'id'      => 'price_symbol',
				'label'   => esc_html__( 'Price Symbol', 'clenix-core' ),
				'default' => '$',
			),
			array(
				'type'    => Controls_Manager::TEXT,
				'id'      => 'unit',
				'label'   => esc_html__( 'Unit Name', 'clenix-core' ),
				'default' => esc_html__( 'Per month', 'clenix-core' ),
			),
			array(
				'type'    => Controls_Manager::TEXTAREA,
				'id'      => 'features',
				'label'   => esc_html__( 'Features', 'clenix-core' ),
				'default' => esc_html__( 'One line per feature', 'clenix-core' ),
				'description' => esc_html__( "One line per feature. Put BLANK keyword if you want blank line. eg.<br/>Investment Plan</br>Education Loan</br>Tax Planning</br>BLANK", 'clenix-core' ),
			),
			array(
				'type'  => Controls_Manager::URL,
				'id'    => 'url',
				'label' => esc_html__( 'Link (Optional)', 'clenix-core' ),
				'placeholder' => 'https://your-link.com',
			),
			array(
				'type'    => Controls_Manager::TEXT,
				'id'      => 'buttontext',
				'label'   => esc_html__( 'Button Text', 'clenix-core' ),
				'default' => esc_html__( 'Book Now', 'clenix-core' ),
			),
			array(
				'type'    => Controls_Manager::SELECT2,
				'id'      => 'display_active',
				'label'   => esc_html__( 'Display Active', 'clenix-core' ),
				'options' => array(
					'common-class' => esc_html__( 'Common Price Table', 'clenix-core' ),
					'active-class'  => esc_html__( 'Active Price Table', 'clenix-core' ),
				),
				'default' => 'common-class',
			),
			array(
				'type'    => Controls_Manager::SELECT2,
				'id'      => 'offer_active',
				'label'   => esc_html__( 'Display Offer', 'clenix-core' ),
				'options' => array(
					'offer-active' 		=> esc_html__( 'Offer Active', 'clenix-core' ),
					'offer-inactive'  	=> esc_html__( 'Offer Inactive', 'clenix-core' ),
				),
				'default' => 'offer-inactive',
			),
			array(
				'type'    => Controls_Manager::TEXT,
				'id'      => 'offertext',
				'label'   => esc_html__( 'Button Text', 'clenix-core' ),
				'default' => esc_html__( 'Popular Sale!', 'clenix-core' ),
				'condition'   => array( 'offer_active' => array( 'offer-active' ) ),
			),
			
			array(
				'mode' => 'section_end',
			),
			
			array(
				'mode'        => 'section_start',
				'id'          => 'sec_style',
				'label'       => esc_html__( 'Style', 'clenix-core' ),
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'bgcolor',
				'label'   => esc_html__( 'Background Color', 'clenix-core' ),
				'default' => '',
				'selectors' => array(
					'{{WRAPPER}} .rtin-pricing-layout1 .rt-price-table-box' => 'background: {{VALUE}}',
					'{{WRAPPER}} .rtin-pricing-layout2 .rt-price-table-box' => 'background: {{VALUE}}',
					'{{WRAPPER}} .rtin-pricing-layout3 .rt-price-table-box' => 'background: {{VALUE}}',
				),
			),
			array (
				'mode'    => 'group',
				'type'    => Group_Control_Typography::get_type(),
				'name'    => 'title_typo',
				'label'   => esc_html__( 'Title Style', 'clenix-core' ),
				'selector' => '{{WRAPPER}} .default-pricing .price-header .rtin-title',
				'scheme'   => Scheme_Typography::TYPOGRAPHY_3,
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'title_color',
				'label'   => esc_html__( 'Title Color', 'clenix-core' ),
				'default' => '',
				'selectors' => array(
					'{{WRAPPER}} .rtin-pricing-layout1 .price-header .rtin-title' => 'color: {{VALUE}}',
					'{{WRAPPER}} .rtin-pricing-layout2 .price-header .rtin-title' => 'color: {{VALUE}}',
					'{{WRAPPER}} .rtin-pricing-layout3 .price-header .rtin-title' => 'color: {{VALUE}}',
				),
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'content_color',
				'label'   => esc_html__( 'Content Color', 'clenix-core' ),
				'default' => '',
				'selectors' => array(
					'{{WRAPPER}} .rtin-pricing-layout1 .rt-price-table-box ul li' => 'color: {{VALUE}}',
					'{{WRAPPER}} .rtin-pricing-layout2 .rt-price-table-box ul li' => 'color: {{VALUE}}',
					'{{WRAPPER}} .rtin-pricing-layout3 .rt-price-table-box ul li' => 'color: {{VALUE}}',
					'{{WRAPPER}} .rtin-pricing-layout1 .rtin-price .price-unit' => 'color: {{VALUE}}',
					'{{WRAPPER}} .rtin-pricing-layout2 .rtin-price .price-unit' => 'color: {{VALUE}}',
					'{{WRAPPER}} .rtin-pricing-layout3 .rtin-price .price-unit' => 'color: {{VALUE}}',
				),
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'price_color',
				'label'   => esc_html__( 'Price Color', 'clenix-core' ),
				'default' => '',
				'selectors' => array(
					'{{WRAPPER}} .rtin-pricing-layout1 .rtin-pricing-price .rtin-price' => 'color: {{VALUE}}',
					'{{WRAPPER}} .rtin-pricing-layout2 .rtin-pricing-price .rtin-price' => 'color: {{VALUE}}',
					'{{WRAPPER}} .rtin-pricing-layout3 .rtin-pricing-price .rtin-price' => 'color: {{VALUE}}',
				),
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'content_icon_color',
				'label'   => esc_html__( 'Content Icon Color', 'clenix-core' ),
				'default' => '',
				'selectors' => array(
					'{{WRAPPER}} .rtin-pricing-layout1 .rt-price-table-box ul li:before' => 'color: {{VALUE}}',
					'{{WRAPPER}} .rtin-pricing-layout2 .rt-price-table-box ul li:before' => 'color: {{VALUE}}',
				),
				'condition'   => array( 'layout' => array( 'layout1', 'layout2' ) ),
			),
			array(
				'mode' => 'section_end',
			),
		);
		return $fields;
	}
	
	private function validate( $str ){
			$str = trim( $str );
			// replace BLANK keyword
			if ( strtolower( $str ) == 'blank'  ) {
				return '&nbsp;';
			}
			return $str;
		}

	protected function render() {
		
		$data = $this->get_settings();
			
		$features = strip_tags( $data['features'] ); // remove tags
		$features = preg_split( "/\R/", $data['features'] ); // string to array
		$features = array_map( array( $this, 'validate' ),  $features ); // validate

		$data['features'] = $features;
		
		$template = 'pricing-table';
		
		switch ( $data['layout'] ) {
			case 'layout3':
			$template = 'pricing-table-3';
			break;
			case 'layout2':
			$template = 'pricing-table-2';
			break;
			default:
			$template = 'pricing-table-1';
			break;
		}

		return $this->rt_template( $template, $data );
	}
}