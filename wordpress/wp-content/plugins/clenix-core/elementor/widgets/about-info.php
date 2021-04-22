<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

namespace radiustheme\Clenix_Core;
use Elementor\Controls_Manager;

if ( ! defined( 'ABSPATH' ) ) exit;

class About_Info extends Custom_Widget_Base {

	public function __construct( $data = [], $args = null ){
		$this->rt_name = esc_html__( 'RT About Info', 'clenix-core' );
		$this->rt_base = 'rt-About-info';
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
				'label'   => esc_html__( 'About Info', 'clenix-core' ),
				'options' => array(
					'style1' => esc_html__( 'About Info 1' , 'clenix-core' ),
					'style2' => esc_html__( 'About Info 2' , 'clenix-core' ),
				),
				'default' => 'style1',
			),
			array(
				'type'    => Controls_Manager::TEXT,
				'id'      => 'title',
				'label'   => esc_html__( 'Title', 'clenix-core' ),
				'default' =>  esc_html__( 'About Us', 'clenix-core' ),
			),
			array(
				'type'    => Controls_Manager::TEXT,
				'id'      => 'name',
				'label'   => esc_html__( 'Name', 'clenix-core' ),
				'default' => 'Dainel Dina',
			),
			array(
				'type'    => Controls_Manager::MEDIA,
				'id'      => 'image',
				'label'   => __( 'Image', 'clenix-core' ),
				'description' => __( 'Recommended image size is 490x600 px', 'clenix-core' ),
			),
			array(
				'type'    => Controls_Manager::WYSIWYG,
				'id'      => 'content',
				'label'   => esc_html__( 'Content', 'clenix-core' ),
				'default' => esc_html__('Fusce mauris auctor ollicituder teary iner hendrerit risusey aeenean rauctor pibus doloer.', 'clenix-core' ),
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
			$template = 'about-info-2';
			break;
			default:
			$template = 'about-info-1';
			break;
		}
	
		return $this->rt_template( $template, $data );
	}
}