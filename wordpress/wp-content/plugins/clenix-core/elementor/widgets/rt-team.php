<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

namespace radiustheme\Clenix_Core;
use Elementor\Controls_Manager;

if ( ! defined( 'ABSPATH' ) ) exit;

class RT_Team extends Custom_Widget_Base {

	public function __construct( $data = [], $args = null ){
		$this->rt_name = esc_html__( 'RT Team', 'clenix-core' );
		$this->rt_base = 'rt-team';
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
		$terms = get_terms( array( 'taxonomy' => 'clenix_team_category', 'fields' => 'id=>name' ) );
		$category_dropdown = array( '0' => esc_html__( 'All Categories', 'clenix-core' ) );

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
				'id'      => 'style',
				'label'   => esc_html__( 'Style', 'clenix-core' ),
				'options' => array(
					'style1' => esc_html__( 'Team Grid 1', 'clenix-core' ),
					'style2' => esc_html__( 'Team Grid 2', 'clenix-core' ),
					'style3' => esc_html__( 'Team Grid 3', 'clenix-core' ),
					'style4' => esc_html__( 'Team Grid 4', 'clenix-core' ),
					'style9' => esc_html__( 'Team Grid 5', 'clenix-core' ),
					'style11' => esc_html__( 'Team Grid 6', 'clenix-core' ),
					'style5' => esc_html__( 'Team Slider 1', 'clenix-core' ),
					'style6' => esc_html__( 'Team Slider 2', 'clenix-core' ),
					'style7' => esc_html__( 'Team Slider 3', 'clenix-core' ),
					'style8' => esc_html__( 'Team Slider 4', 'clenix-core' ),
					'style10' => esc_html__( 'Team Slider 5', 'clenix-core' ),
					'style12' => esc_html__( 'Team Slider 6', 'clenix-core' ),
				),
				'default' => 'style1',
			),
			array(
				'type'    => Controls_Manager::NUMBER,
				'id'      => 'number',
				'label'   => esc_html__( 'Total number of items', 'clenix-core' ),
				'default' => 6,
				'description' => esc_html__( 'Write -1 to show all', 'clenix-core' ),
			),
			array(
				'type'    => Controls_Manager::SELECT2,
				'id'      => 'cat',
				'label'   => esc_html__( 'Categories', 'clenix-core' ),
				'options' => $category_dropdown,
				'default' => '0',
			),
			array(
				'type'    => Controls_Manager::SELECT2,
				'id'      => 'orderby',
				'label'   => esc_html__( 'Order By', 'clenix-core' ),
				'options' => array(
					'date'        => esc_html__( 'Date (Recents comes first)', 'clenix-core' ),
					'title'       => esc_html__( 'Title', 'clenix-core' ),
					'menu_order'  => esc_html__( 'Custom Order (Available via Order field inside Page Attributes box)', 'clenix-core' ),
				),
				'default' => 'date',
			),
			array(
				'type'        => Controls_Manager::SWITCHER,
				'id'          => 'content_display',
				'label'       => esc_html__( 'Content Display', 'clenix-core' ),
				'label_on'    => esc_html__( 'On', 'clenix-core' ),
				'label_off'   => esc_html__( 'Off', 'clenix-core' ),
				'default'     => false,
				'description' => esc_html__( 'Show or Hide Content. Default: off', 'clenix-core' ),
				'condition'   => array( 'style' => array( 'style2', 'style4', 'style6', 'style8' ) ),
			),
			array(
				'type'    => Controls_Manager::SELECT2,
				'id'      => 'contype',
				'label'   => esc_html__( 'Content Type', 'clenix-core' ),
				'options' => array(
					'content' => esc_html__( 'Conents', 'clenix-core' ),
					'excerpt' => esc_html__( 'Excerpts', 'clenix-core' ),
				),
				'default'     => 'content',
				'description' => esc_html__( 'Display contents from Editor or Excerpt field', 'clenix-core' ),
				'condition'   => array( 'content_display' => array( 'yes' ),'style' => array( 'style2', 'style4', 'style6', 'style8' ) ),
			),
			array(
				'type'    => Controls_Manager::NUMBER,
				'id'      => 'count',
				'label'   => esc_html__( 'Word count', 'clenix-core' ),
				'default' => 15,
				'description' => esc_html__( 'Maximum number of words', 'clenix-core' ),
				'condition'   => array( 'content_display' => array( 'yes' ),'style' => array( 'style2', 'style4' ) ),
			),
			array(
				'type'        => Controls_Manager::SWITCHER,
				'id'          => 'designation_display',
				'label'       => esc_html__( 'Designation Display', 'clenix-core' ),
				'label_on'    => esc_html__( 'On', 'clenix-core' ),
				'label_off'   => esc_html__( 'Off', 'clenix-core' ),
				'default'     => 'yes',
				'description' => esc_html__( 'Show or Hide Designation. Default: On', 'clenix-core' ),
			),
			array(
				'type'        => Controls_Manager::SWITCHER,
				'id'          => 'social_display',
				'label'       => esc_html__( 'Social Media Display', 'clenix-core' ),
				'label_on'    => esc_html__( 'On', 'clenix-core' ),
				'label_off'   => esc_html__( 'Off', 'clenix-core' ),
				'default'     => 'yes',
				'description' => esc_html__( 'Show or Hide Social Medias. Default: On', 'clenix-core' ),
			),
			array(
				'type'    => Controls_Manager::SELECT2,
				'id'      => 'more_button',
				'label'   => esc_html__( 'More Button', 'clenix-core' ),
				'options' => array(
					'show'        => esc_html__( 'Show Read More', 'clenix-core' ),
					'hide'        => esc_html__( 'Show Pagination', 'clenix-core' ),
				),
				'default' => 'show',
				'condition'   => array( 'style' => array( 'style1', 'style2', 'style3', 'style4', 'style9', 'style11' ) ),
			),
			array (
				'type'    => Controls_Manager::TEXT,
				'id'      => 'see_button_text',
				'label'   => esc_html__( 'Button Text', 'clenix-core' ),
				'condition'   => array( 'more_button' => array( 'show' ) ),
				'default' => esc_html__( 'Show More', 'clenix-core' ),
				'condition'   => array( 'style' => array( 'style1', 'style2', 'style3', 'style4', 'style9', 'style11' ) ),
			),
			array (
				'type'    => Controls_Manager::TEXT,
				'id'      => 'see_button_link',
				'label'   => esc_html__( 'Button Link', 'clenix-core' ),
				'condition'   => array( 'more_button' => array( 'show' ) ),
				'condition'   => array( 'style' => array( 'style1', 'style2', 'style3', 'style4', 'style9', 'style11' ) ),
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
				'condition'   => array( 'style' => array( 'style5', 'style6', 'style7', 'style8', 'style10', 'style12' ) ),
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
			'margin'             => 30,
			'responsive'         => array(
				'0'    => array( 'items' => 12 / $data['col_mobile'] ),
				'480'  => array( 'items' => 12 / $data['col_xs'] ),
				'768'  => array( 'items' => 12 / $data['col_sm'] ),
				'992'  => array( 'items' => 12 / $data['col_md'] ),
				'1200' => array( 'items' => 12 / $data['col_lg'] ),
			)
		);
		
		switch ( $data['style'] ) {
			case 'style12':
			$template = 'team-slider-6';
			break;
			case 'style11':
			$template = 'team-grid-6';
			break;
			case 'style10':
			$template = 'team-slider-5';
			break;
			case 'style9':
			$template = 'team-grid-5';
			break;
			case 'style8':
			$template = 'team-slider-4';
			break;
			case 'style7':
			$template = 'team-slider-3';
			break;
			case 'style6':
			$template = 'team-slider-2';
			break;
			case 'style5':
			$template = 'team-slider-1';
			break;
			case 'style4':
			$template = 'team-grid-4';
			break;
			case 'style3':
			$template = 'team-grid-3';
			break;
			case 'style2':
			$template = 'team-grid-2';
			break;
			default:
			$template = 'team-grid-1';
			break;
		}
		
		$data['owl_data'] = json_encode( $owl_data );
		$this->rt_load_scripts();

		return $this->rt_template( $template, $data );
	}
}