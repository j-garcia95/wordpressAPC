<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */
namespace radiustheme\Clenix_Core;
use Elementor\Controls_Manager;

if ( ! defined( 'ABSPATH' ) ) exit;
class Service_Tab extends Custom_Widget_Base {
	public function __construct( $data = [], $args = null ){
		$this->rt_name = esc_html__( 'Service Tab', 'clenix-core' );
		$this->rt_base = 'rt-service-tab';
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
		wp_enqueue_style(  'slick' );
		wp_enqueue_style(  'slick-theme' );
		wp_enqueue_script( 'slick' );
	}
	public function rt_fields(){
		$terms  = get_terms( array( 'taxonomy' => "clenix_service_category", 'fields' => 'id=>name' ) );
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
				'type'    => Controls_Manager::NUMBER,
				'id'      => 'number',
				'label'   => esc_html__( 'Total number of items', 'clenix-core' ),
				'default' => 7,
				'description' => esc_html__( 'Write -1 to show all', 'clenix-core' ),
			),
			array(
				'type'    => Controls_Manager::NUMBER,
				'id'      => 'tab_number',
				'label'   => esc_html__( 'Total number of Tab', 'clenix-core' ),
				'default' => 5,
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
				'type'    => Controls_Manager::NUMBER,
				'id'      => 'count',
				'label'   => esc_html__( 'Word count', 'clenix-core' ),
				'default' => 30,
				'description' => esc_html__( 'Maximum number of words', 'clenix-core' ),
				
			),
			array(
				'type'        => Controls_Manager::SWITCHER,
				'id'          => 'price_display',
				'label'       => esc_html__( 'Price Display', 'clenix-core' ),
				'label_on'    => esc_html__( 'On', 'clenix-core' ),
				'label_off'   => esc_html__( 'Off', 'clenix-core' ),
				'default'     => 'yes',
				'description' => esc_html__( 'Show or Hide Doctors No. Default: On', 'clenix-core' ),
			),
			array(
				'type'        => Controls_Manager::SWITCHER,
				'id'          => 'read_more',
				'label'       => esc_html__( 'Read More Display', 'clenix-core' ),
				'label_on'    => esc_html__( 'On', 'clenix-core' ),
				'label_off'   => esc_html__( 'Off', 'clenix-core' ),
				'default'     => 'yes',
				'description' => esc_html__( 'Show or Hide Opening Hours No. Default: On', 'clenix-core' ),
			),
			array(
				'type'    => Controls_Manager::TEXT,
				'id'    => 'buttontext',
				'label'   => esc_html__( 'Button Text', 'clenix-core' ),
				'default' => esc_html__( 'Book Now', 'clenix-core' ),
				'condition'   => array( 'read_more' => array( 'yes' ) ),
			),
			array(
				'type'    => Controls_Manager::TEXT,
				'id'    => 'buttonurl',
				'label'   => esc_html__( 'Button URL', 'clenix-core' ),
				'condition'   => array( 'read_more' => array( 'yes' ) ),
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
		$template = 'service-tab';			
		return $this->rt_template( $template, $data );
	}
}