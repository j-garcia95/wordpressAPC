<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

namespace radiustheme\Clenix_Core;
use Elementor\Controls_Manager;

if ( ! defined( 'ABSPATH' ) ) exit;

class Portfolio_Slider extends Custom_Widget_Base {

	public function __construct( $data = [], $args = null ){
		$this->rt_name = esc_html__( 'RT Portfolio Slider', 'clenix-core' );
		$this->rt_base = 'rt-portfolio-slider';
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
	
	private function rt_load_scripts(){
		wp_enqueue_style(  'owl-carousel' );
		wp_enqueue_style(  'owl-theme-default' );		
		wp_enqueue_script( 'owl-carousel' );
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
				'condition'   => array( 'layout' => array( 'layout1', 'layout2' ) ),
			),
			array(
				'type'    => Controls_Manager::NUMBER,
				'id'      => 'column_no_gutters',
				'label'   => esc_html__( 'Display column gap', 'clenix-core' ),
				'default' => '0',
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
				'condition'   => array( 'layout' => array( 'layout1', 'layout2' ) ),
			),
			array(
				'type'    => Controls_Manager::NUMBER,
				'id'      => 'excerpt_count',
				'label'   => esc_html__( 'Word count', 'clenix-core' ),
				'default' => 15,
				'description' => esc_html__( 'Maximum number of words', 'clenix-core' ),
				'condition'   => array( 'excerpt_display' =>'yes' ),
				'condition'   => array( 'layout' => array( 'layout1', 'layout2' ) ),
			),
			array (
				'type'    => Controls_Manager::COLOR,
				'id'      => 'item_title_color',
				'label'   => esc_html__( 'Item Title Color', 'clenix-core' ),
				'default' => '',
				'selectors' => array( 
					'{{WRAPPER}} .portfolio-slider-default .rtin-content h3' => 'color: {{VALUE}}',
					'{{WRAPPER}} .portfolio-slider-default .rtin-content h3 a' => 'color: {{VALUE}}',
				),
			),
			array (
				'type'    => Controls_Manager::COLOR,
				'id'      => 'item_link_color_hover',
				'label'   => esc_html__( 'Item Link Hover Color', 'clenix-core' ),
				'default' => '',
				'selectors' => array(
					'{{WRAPPER}} .portfolio-slider-default .rtin-content h3 a:hover' => 'color: {{VALUE}}',
				),
			),
			array (
				'type'    => Controls_Manager::COLOR,
				'id'      => 'item_content_color',
				'label'   => esc_html__( 'Item Content Color', 'clenix-core' ),
				'default' => '',
				'selectors' => array(
					'{{WRAPPER}} .portfolio-slider-default .rtin-item .rtin-content p' => 'color: {{VALUE}}',
					'{{WRAPPER}} .portfolio-slider-default .rtin-item .rtin-cat a' => 'color: {{VALUE}}',
				),
			),
			array (
				'type'        => Controls_Manager::SWITCHER,
				'id'          => 'read_display',
				'label'       => esc_html__( 'Read More Display', 'clenix-core' ),
				'label_on'    => esc_html__( 'Show', 'clenix-core' ),
				'label_off'   => esc_html__( 'Hide', 'clenix-core' ),
				'default'     => 'yes',
			),
			array(
				'type'    => Controls_Manager::TEXT,
				'id'      => 'buttontext',
				'label'   => esc_html__( 'Button Text', 'clenix-core' ),
				'default' => esc_html__( 'View Project', 'clenix-core' ),
				'condition'   => array( 'read_display' =>'yes' ),
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
				'type'    => Controls_Manager::SELECT2,
				'id'      => 'col_mobile',
				'label'   => esc_html__( 'Small Phones: < 480px', 'clenix-core' ),
				'options' => $this->rt_translate['cols'],
				'default' => '12',
			),
			array(
				'mode' => 'section_end',
			),
			// Slider options
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
				'label'       => esc_html__( 'Navigation Dots', 'clenix-core' ),
				'label_on'    => esc_html__( 'On', 'clenix-core' ),
				'label_off'   => esc_html__( 'Off', 'clenix-core' ),
				'default'     => '',
				'description' => esc_html__( 'Enable or disable navigation dots. Default: Off', 'clenix-core' ),
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
				'type'        => Controls_Manager::SWITCHER,
				'id'          => 'slider_stop_on_hover',
				'label'       => esc_html__( 'Stop on Hover', 'clenix-core' ),
				'label_on'    => esc_html__( 'On', 'clenix-core' ),
				'label_off'   => esc_html__( 'Off', 'clenix-core' ),
				'default'     => 'yes',
				'description' => esc_html__( 'Stop autoplay on mouse hover. Default: On', 'clenix-core' ),
				'condition'   => array( 'slider_autoplay' => 'yes' ),
			),
			array(
				'type'    => Controls_Manager::SELECT2,
				'id'      => 'slider_interval',
				'label'   => esc_html__( 'Autoplay Interval', 'clenix-core' ),
				'options' => array(
					'5000' => esc_html__( '5 Seconds', 'clenix-core' ),
					'4000' => esc_html__( '4 Seconds', 'clenix-core' ),
					'3000' => esc_html__( '3 Seconds', 'clenix-core' ),
					'2000' => esc_html__( '2 Seconds', 'clenix-core' ),
					'1000' => esc_html__( '1 Second',  'clenix-core' ),
				),
				'default' => '5000',
				'description' => esc_html__( 'Set any value for example 5 seconds to play it in every 5 seconds. Default: 5 Seconds', 'clenix-core' ),
				'condition'   => array( 'slider_autoplay' => 'yes' ),
			),
			array(
				'type'    => Controls_Manager::NUMBER,
				'id'      => 'slider_autoplay_speed',
				'label'   => esc_html__( 'Autoplay Slide Speed', 'clenix-core' ),
				'default' => 200,
				'description' => esc_html__( 'Slide speed in milliseconds. Default: 200', 'clenix-core' ),
				'condition'   => array( 'slider_autoplay' => 'yes' ),
			),
			array(
				'type'        => Controls_Manager::SWITCHER,
				'id'          => 'slider_loop',
				'label'       => esc_html__( 'Loop', 'clenix-core' ),
				'label_on'    => esc_html__( 'On', 'clenix-core' ),
				'label_off'   => esc_html__( 'Off', 'clenix-core' ),
				'default'     => 'yes',
				'description' => esc_html__( 'Loop to first item. Default: On', 'clenix-core' ),
			),
			array(
				'mode' => 'section_end',
			),
		);
		return $fields;
	}

	protected function render() {
		$data = $this->get_settings();
		
		$owl_data = array( 
			'nav'                => $data['slider_nav'] == 'yes' ? true : false,
			'dots'               => $data['slider_dots'] == 'yes' ? true : false,
			'navText'            => array( "<i class='fa fa-angle-left'></i>", "<i class='fa fa-angle-right'></i>" ),
			'autoplay'           => $data['slider_autoplay'] == 'yes' ? true : false,
			'autoplayTimeout'    => $data['slider_interval'],
			'autoplaySpeed'      => $data['slider_autoplay_speed'],
			'autoplayHoverPause' => $data['slider_stop_on_hover'] == 'yes' ? true : false,
			'loop'               => $data['slider_loop'] == 'yes' ? true : false,
			'margin'             => intval($data['column_no_gutters']),
			'responsive'         => array(
				'0'    => array( 'items' => 12 / $data['col_mobile'] ),
				'480'  => array( 'items' => 12 / $data['col_xs'] ),
				'768'  => array( 'items' => 12 / $data['col_sm'] ),
				'992'  => array( 'items' => 12 / $data['col_md'] ),
				'1200' => array( 'items' => 12 / $data['col_lg'] ),
			)
		);

		$template = 'portfolio-slider';
		
		$data['owl_data'] = json_encode( $owl_data );
		$this->rt_load_scripts();

		return $this->rt_template( $template, $data );
	}
}