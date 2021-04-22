<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

namespace radiustheme\Clenix_Core;
use Elementor\Controls_Manager;

if ( ! defined( 'ABSPATH' ) ) exit;

class Portfolio_Grid extends Custom_Widget_Base {

	public function __construct( $data = [], $args = null ){
		$this->rt_name = esc_html__( 'RT Portfolio Grid', 'clenix-core' );
		$this->rt_base = 'rt-portfolio-grid';
		$this->rt_translate = array(
			'cols'  => array(
				'12' => esc_html__( '1 Col', 'clenix-core' ),
				'6'  => esc_html__( '2 Col', 'clenix-core' ),
				'4'  => esc_html__( '3 Col', 'clenix-core' ),
				'3'  => esc_html__( '4 Col', 'clenix-core' ),
				'2'  => esc_html__( '6 Col', 'clenix-core' ),
			),
		);
		parent::__construct( $data, $args );
	}

	public function rt_fields(){
		
		$terms  = get_terms( array( 'taxonomy' => 'clenix_portfolio_category', 'fields' => 'id=>name' ) );
		$category_dropdown = array( '0' => __( 'Please Selecet category', 'clenix-core' ) );

		foreach ( $terms as $id => $name ) {
			$category_dropdown[$id] = $name;
		}
		
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
					'layout1' => esc_html__( 'Grid layout 1', 'clenix-core' ),
					'layout2' => esc_html__( 'Grid layout 2', 'clenix-core' ),
					'layout3' => esc_html__( 'Grid layout 3', 'clenix-core' ),
					'layout4' => esc_html__( 'Grid layout 4', 'clenix-core' ),
				),
				'default' => 'layout1',
			),
			array (
				'type'      => Controls_Manager::SELECT2,
				'id'        => 'cat_single',
				'label'     => esc_html__( 'Categories', 'zugan-core' ),
				'options'   => $category_dropdown,
				'default'   => '0',
				'multiple'  => false,
			),
			/*Post Order*/
			array(
				'type'    => Controls_Manager::SELECT2,
				'id'      => 'post_ordering',
				'label'   => esc_html__( 'Post Ordering', 'clenix-core' ),
				'options' => array(
					'DESC'	=> esc_html__( 'Desecending', 'clenix-core' ),
					'ASC'	=> esc_html__( 'Ascending', 'clenix-core' ),
				),
				'default' => 'DESC',
			),
			array(
				'type'    => Controls_Manager::SELECT2,
				'id'      => 'orderby',
				'label'   => esc_html__( 'Post Sorting', 'clenix-core' ),				
				'options' => array(
					'recent' 		=> esc_html__( 'Recent Post', 'clenix-core' ),
					'rand' 			=> esc_html__( 'Random Post', 'clenix-core' ),
					'menu_order' 	=> esc_html__( 'Custom Order', 'clenix-core' ),
					'title' 		=> esc_html__( 'By Name', 'clenix-core' ),
				),
				'default' => 'recent',
			),			
			array(
				'type'    => Controls_Manager::REPEATER,
				'id'      => 'posts_not_in',
				'label'   => esc_html__( 'Enter Post ID that will not display', 'clenix-core' ),
				'fields'  => array(
					array(
						'type'    => Controls_Manager::NUMBER,
						'name'    => 'post_not_in',
						'label'   => esc_html__( 'Post ID', 'clenix-core' ),
						'default' => '0',
					),
				),
			),
			array (
				'type'        => Controls_Manager::SWITCHER,
				'id'          => 'cat_display',
				'label'       => esc_html__( 'Category Name Display', 'clenix-core' ),
				'label_on'    => esc_html__( 'Show', 'clenix-core' ),
				'label_off'   => esc_html__( 'Hide', 'clenix-core' ),
				'default'     => 'yes',
				'condition'   => array( 'layout' => array( 'layout1', 'layout2', 'layout4' ) ),
			),
			array(
				'type'    => Controls_Manager::SELECT2,
				'id'      => 'column_no_gutters',
				'label'   => esc_html__( 'Display column gap', 'clenix-core' ),
				'options' => array(
					'show'        => esc_html__( 'Gap', 'clenix-core' ),
					'hide'        => esc_html__( 'No Gap', 'clenix-core' ),
				),
				'default' => 'show',
			),
			array(
				'type'    => Controls_Manager::NUMBER,
				'id'      => 'itemnumber',
				'label'   => esc_html__( 'Item Number', 'clenix-core' ),
				'default' => -1,
				'description' => esc_html__( 'Use -1 for showing all items( Showing items per category )', 'clenix-core' ),
			),
			array(
				'type'    => Controls_Manager::NUMBER,
				'id'      => 'title_size',
				'label'   => esc_html__( 'Title Font Size', 'clenix-core' ),
				'default' => '',
			),
			array(
				'type'    => Controls_Manager::NUMBER,
				'id'      => 'title_count',
				'label'   => esc_html__( 'Title Word count', 'clenix-core' ),
				'default' => 5,
				'description' => esc_html__( 'Maximum number of words', 'clenix-core' ),				
			),
			array (
				'type'        => Controls_Manager::SWITCHER,
				'id'          => 'excerpt_display',
				'label'       => esc_html__( 'Excerpt/Content Display', 'clenix-core' ),
				'label_on'    => esc_html__( 'Show', 'clenix-core' ),
				'label_off'   => esc_html__( 'Hide', 'clenix-core' ),
				'default'     => 'false',
				'condition'   => array( 'layout' => array( 'layout1', 'layout2', 'layout4' ) ),
			),
			array(
				'type'    => Controls_Manager::NUMBER,
				'id'      => 'excerpt_count',
				'label'   => esc_html__( 'Word count', 'clenix-core' ),
				'default' => 15,
				'description' => esc_html__( 'Maximum number of words', 'clenix-core' ),
				'condition'   => array( 'excerpt_display' =>'yes' ),
				'condition'   => array( 'layout' => array( 'layout1', 'layout2', 'layout4' ) ),
			),
			array (
				'type'    => Controls_Manager::COLOR,
				'id'      => 'item_title_color',
				'label'   => esc_html__( 'Item Title Color', 'clenix-core' ),
				'default' => '',
				'selectors' => array( 
					'{{WRAPPER}} .portfolio-default .rtin-content h3 a' => 'color: {{VALUE}}',
				),
			),
			array (
				'type'    => Controls_Manager::COLOR,
				'id'      => 'item_link_color_hover',
				'label'   => esc_html__( 'Item Link Hover Color', 'clenix-core' ),
				'default' => '',
				'selectors' => array(
					'{{WRAPPER}} .portfolio-default .rtin-content h3 a:hover' => 'color: {{VALUE}}',
					'{{WRAPPER}} .portfolio-multi-layout-1 .rtin-item .rtin-cat a:hover' => 'color: {{VALUE}}',
					'{{WRAPPER}} .portfolio-multi-layout-1 .rtin-item .rtin-icon i:hover' => 'color: {{VALUE}}',
					'{{WRAPPER}} .portfolio-multi-layout-2 .rtin-item .rtin-cat a:hover' => 'color: {{VALUE}}',
				),
			),
			array (
				'type'    => Controls_Manager::COLOR,
				'id'      => 'item_content_color',
				'label'   => esc_html__( 'Item Content Color', 'clenix-core' ),
				'default' => '',
				'selectors' => array(
					'{{WRAPPER}} .portfolio-default .rtin-item .rtin-content p' => 'color: {{VALUE}}',
					'{{WRAPPER}} .portfolio-default .rtin-item .rtin-cat a' => 'color: {{VALUE}}',
				),
			),
			array(
				'type'    => Controls_Manager::SELECT2,
				'id'      => 'more_button',
				'label'   => esc_html__( 'More Button', 'clenix-core' ),
				'options' => array(
					'show'        => esc_html__( 'Show', 'clenix-core' ),
					'hide'        => esc_html__( 'Hide', 'clenix-core' ),
				),
				'default' => 'show',				
			),
			array (
				'type'    => Controls_Manager::TEXT,
				'id'      => 'see_button_text',
				'label'   => esc_html__( 'Button Text', 'clenix-core' ),
				'condition'   => array( 'more_button' => array( 'show' ) ),
				'default' => esc_html__( 'ALL PORTFOLIO', 'clenix-core' ),
			),
			array (
				'type'    => Controls_Manager::TEXT,
				'id'      => 'see_button_link',
				'label'   => esc_html__( 'Button Link', 'clenix-core' ),
				'condition'   => array( 'more_button' => array( 'show' ) ),
			),
			array(
				'mode' => 'section_end',
			),

			// Responsive Columns
			array(
				'mode'    => 'section_start',
				'id'      => 'sec_responsive',
				'label'   => esc_html__( 'Number of Responsive Columns', 'clenix-core' ),
			),
			array(
				'type'    => Controls_Manager::SELECT2,
				'id'      => 'col_lg',
				'label'   => esc_html__( 'Desktops: > 1199px', 'clenix-core' ),
				'options' => $this->rt_translate['cols'],
				'default' => '4',
			),
			array(
				'type'    => Controls_Manager::SELECT2,
				'id'      => 'col_md',
				'label'   => esc_html__( 'Desktops: > 991px', 'clenix-core' ),
				'options' => $this->rt_translate['cols'],
				'default' => '4',
			),
			array(
				'type'    => Controls_Manager::SELECT2,
				'id'      => 'col_sm',
				'label'   => esc_html__( 'Tablets: > 767px', 'clenix-core' ),
				'options' => $this->rt_translate['cols'],
				'default' => '6',
			),
			array(
				'type'    => Controls_Manager::SELECT2,
				'id'      => 'col_xs',
				'label'   => esc_html__( 'Phones: < 768px', 'clenix-core' ),
				'options' => $this->rt_translate['cols'],
				'default' => '12',
			),
			array(
				'mode' => 'section_end',
			),
		);
		return $fields;
	}

	protected function render() {
		$data = $this->get_settings();

		switch ( $data['layout'] ) {
			case 'layout4':
			$template = 'portfolio-grid-4';
			break;
			case 'layout3':
			$template = 'portfolio-grid-3';
			break;
			case 'layout2':
			$template = 'portfolio-grid-2';
			break;
			default:
			$template = 'portfolio-grid-1';
			break;
		}

		return $this->rt_template( $template, $data );
	}
}