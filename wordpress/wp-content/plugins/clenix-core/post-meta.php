<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

namespace radiustheme\Clenix_Core;

use ClenixTheme;
use ClenixTheme_Helper;
use \RT_Postmeta;

if ( ! defined( 'ABSPATH' ) ) exit;

if ( !class_exists( 'RT_Postmeta' ) ) {
	return;
}

$Postmeta = RT_Postmeta::getInstance();

$prefix = CLENIX_CORE_CPT_PREFIX;

/*-------------------------------------
#. Layout Settings
---------------------------------------*/
$nav_menus = wp_get_nav_menus( array( 'fields' => 'id=>name' ) );
$nav_menus = array( 'default' => __( 'Default', 'clenix-core' ) ) + $nav_menus;
$sidebars  = array( 'default' => __( 'Default', 'clenix-core' ) ) + ClenixTheme_Helper::custom_sidebar_fields();

$Postmeta->add_meta_box( "{$prefix}_page_settings", __( 'Layout Settings', 'clenix-core' ), array( 'page', 'post', 'clenix_team', 'clenix_service', 'clenix_portfolio', 'clenix_testim' ), '', '', 'high', array(
	'fields' => array(
	
		"{$prefix}_layout_settings" => array(
			'label'   => __( 'Layouts', 'clenix-core' ),
			'type'    => 'group',
			'value'  => array(	
			
				"{$prefix}_layout" => array(
					'label'   => __( 'Layout', 'clenix-core' ),
					'type'    => 'select',
					'options' => array(
						'default'       => __( 'Default', 'clenix-core' ),
						'full-width'    => __( 'Full Width', 'clenix-core' ),
						'left-sidebar'  => __( 'Left Sidebar', 'clenix-core' ),
						'right-sidebar' => __( 'Right Sidebar', 'clenix-core' ),
					),
					'default'  => 'default',
				),		
				'clenix_sidebar' => array(
					'label'    => __( 'Custom Sidebar', 'clenix-core' ),
					'type'     => 'select',
					'options'  => $sidebars,
					'default'  => 'default',
				),
				"{$prefix}_page_menu" => array(
					'label'    => __( 'Main Menu', 'clenix-core' ),
					'type'     => 'select',
					'options'  => $nav_menus,
					'default'  => 'default',
				),
				"{$prefix}_tr_header" => array(
					'label'    	  => __( 'Transparent Header', 'clenix-core' ),
					'type'     	  => 'select',
					'options'  	  => array(
						'default' => __( 'Default', 'clenix-core' ),
						'on'      => __( 'Enabled', 'clenix-core' ),
						'off'     => __( 'Disabled', 'clenix-core' ),
					),
					'default'  => 'default',
				),
				"{$prefix}_top_bar" => array(
					'label' 	  => __( 'Top Bar', 'clenix-core' ),
					'type'  	  => 'select',
					'options' => array(
						'default' => __( 'Default', 'clenix-core' ),
						'on'      => __( 'Enabled', 'clenix-core' ),
						'off'     => __( 'Disabled', 'clenix-core' ),
					),
					'default'  	  => 'default',
				),
				"{$prefix}_top_bar_style" => array(
					'label' 	=> __( 'Top Bar Layout', 'clenix-core' ),
					'type'  	=> 'select',
					'options'	=> array(
						'default' => __( 'Default', 'clenix-core' ),
						'1'       => __( 'Layout 1', 'clenix-core' ),
						'2'       => __( 'Layout 2', 'clenix-core' ),
						'3'       => __( 'Layout 3', 'clenix-core' ),
					),
					'default'   => 'default',
				),
				"{$prefix}_header_opt" => array(
					'label' 	  => __( 'Header On/Off', 'clenix-core' ),
					'type'  	  => 'select',
					'options' => array(
						'default' => __( 'Default', 'clenix-core' ),
						'on'      => __( 'Enabled', 'clenix-core' ),
						'off'     => __( 'Disabled', 'clenix-core' ),
					),
					'default'  	  => 'default',
				),
				"{$prefix}_header" => array(
					'label'   => __( 'Header Layout', 'clenix-core' ),
					'type'    => 'select',
					'options' => array(
						'default' => __( 'Default', 'clenix-core' ),
						'1'       => __( 'Layout 1', 'clenix-core' ),
						'2'       => __( 'Layout 2', 'clenix-core' ),
						'3'       => __( 'Layout 3', 'clenix-core' ),
						'4'       => __( 'Layout 4', 'clenix-core' ),
					),
					'default'  => 'default',
				),
				"{$prefix}_footer" => array(
					'label'   => __( 'Footer Layout', 'clenix-core' ),
					'type'    => 'select',
					'options' => array(
						'default' => __( 'Default', 'clenix-core' ),
						'1'       => __( 'Layout 1', 'clenix-core' ),
						'2'       => __( 'Layout 2', 'clenix-core' ),
						'3'       => __( 'Layout 3', 'clenix-core' ),
						'4'       => __( 'Layout 4', 'clenix-core' ),
					),
					'default'  => 'default',
				),
				"{$prefix}_footer_area" => array(
					'label' 	  => __( 'Footer Area', 'clenix-core' ),
					'type'  	  => 'select',
					'options' => array(
						'default' => __( 'Default', 'clenix-core' ),
						'on'      => __( 'Enabled', 'clenix-core' ),
						'off'     => __( 'Disabled', 'clenix-core' ),
					),
					'default'  	  => 'default',
				),
				"{$prefix}_copyright_area" => array(
					'label' 	  => __( 'Copyright Area', 'clenix-core' ),
					'type'  	  => 'select',
					'options' => array(
						'default' => __( 'Default', 'clenix-core' ),
						'on'      => __( 'Enabled', 'clenix-core' ),
						'off'     => __( 'Disabled', 'clenix-core' ),
					),
					'default'  	  => 'default',
				),
				"{$prefix}_top_padding" => array(
					'label'   => __( 'Content Padding Top', 'clenix-core' ),
					'type'    => 'select',
					'options' => array(
						'default' => __( 'Default', 'clenix-core' ),
						'0px'     => __( '0px', 'clenix-core' ),
						'10px'    => __( '10px', 'clenix-core' ),
						'20px'    => __( '20px', 'clenix-core' ),
						'30px'    => __( '30px', 'clenix-core' ),
						'40px'    => __( '40px', 'clenix-core' ),
						'50px'    => __( '50px', 'clenix-core' ),
						'60px'    => __( '60px', 'clenix-core' ),
						'70px'    => __( '70px', 'clenix-core' ),
						'80px'    => __( '80px', 'clenix-core' ),
						'90px'    => __( '90px', 'clenix-core' ),
						'100px'   => __( '100px', 'clenix-core' ),
						'110px'   => __( '110px', 'clenix-core' ),
						'120px'   => __( '120px', 'clenix-core' ),
					),
					'default'  => 'default',
				),
				"{$prefix}_bottom_padding" => array(
					'label'   => __( 'Content Padding Bottom', 'clenix-core' ),
					'type'    => 'select',
					'options' => array(
						'default' => __( 'Default', 'clenix-core' ),
						'0px'     => __( '0px', 'clenix-core' ),
						'10px'    => __( '10px', 'clenix-core' ),
						'20px'    => __( '20px', 'clenix-core' ),
						'30px'    => __( '30px', 'clenix-core' ),
						'40px'    => __( '40px', 'clenix-core' ),
						'50px'    => __( '50px', 'clenix-core' ),
						'60px'    => __( '60px', 'clenix-core' ),
						'70px'    => __( '70px', 'clenix-core' ),
						'80px'    => __( '80px', 'clenix-core' ),
						'90px'    => __( '90px', 'clenix-core' ),
						'100px'   => __( '100px', 'clenix-core' ),
						'110px'   => __( '110px', 'clenix-core' ),
						'120px'   => __( '120px', 'clenix-core' ),
					),
					'default'  => 'default',
				),
				"{$prefix}_banner" => array(
					'label'   => __( 'Banner', 'clenix-core' ),
					'type'    => 'select',
					'options' => array(
						'default' => __( 'Default', 'clenix-core' ),
						'on'	  => __( 'Enable', 'clenix-core' ),
						'off'	  => __( 'Disable', 'clenix-core' ),
					),
					'default'  => 'default',
				),
				"{$prefix}_breadcrumb" => array(
					'label'   => __( 'Breadcrumb', 'clenix-core' ),
					'type'    => 'select',
					'options' => array(
						'default' => __( 'Default', 'clenix-core' ),
						'on'      => __( 'Enable', 'clenix-core' ),
						'off'	  => __( 'Disable', 'clenix-core' ),
					),
					'default'  => 'default',
				),
				"{$prefix}_banner_type" => array(
					'label'   => __( 'Banner Background Type', 'clenix-core' ),
					'type'    => 'select',
					'options' => array(
						'default' => __( 'Default', 'clenix-core' ),
						'bgimg'   => __( 'Background Image', 'clenix-core' ),
						'bgcolor' => __( 'Background Color', 'clenix-core' ),
					),
					'default' => 'default',
				),
				"{$prefix}_banner_bgimg" => array(
					'label' => __( 'Banner Background Image', 'clenix-core' ),
					'type'  => 'image',
					'desc'  => __( 'If not selected, default will be used', 'clenix-core' ),
				),
				"{$prefix}_banner_bgcolor" => array(
					'label' => __( 'Banner Background Color', 'clenix-core' ),
					'type'  => 'color_picker',
					'desc'  => __( 'If not selected, default will be used', 'clenix-core' ),
				),		
				"{$prefix}_page_bgimg" => array(
					'label' => __( 'Page/Post Background Image', 'clenix-core' ),
					'type'  => 'image',
					'desc'  => __( 'If not selected, default will be used', 'clenix-core' ),
				),
				"{$prefix}_page_bgcolor" => array(
					'label' => __( 'Page/Post Background Color', 'clenix-core' ),
					'type'  => 'color_picker',
					'desc'  => __( 'If not selected, default will be used', 'clenix-core' ),
				),
			)
		)
	),
) );


/*-------------------------------------
#. Team
---------------------------------------*/

$Postmeta->add_meta_box( 'clenix_team_settings', __( 'Team Member Settings', 'clenix-core' ), array( 'clenix_team' ), '', '', 'high', array(
	'fields' => array(
		'clenix_team_designation' => array(
			'label' => __( 'Designation', 'clenix-core' ),
			'type'  => 'text',
		),
		'clenix_team_email' => array(
			'label' => __( 'Email', 'clenix-core' ),
			'type'  => 'text',
		),
		'clenix_team_phone' => array(
			'label' => __( 'Phone', 'clenix-core' ),
			'type'  => 'text',
		),
		'clenix_team_address' => array(
			'label' => __( 'Address', 'clenix-core' ),
			'type'  => 'text',
		),
		'clenix_team_socials_header' => array(
			'label' => __( 'Socials', 'clenix-core' ),
			'type'  => 'header',
			'desc'  => __( 'Enter your social links here', 'clenix-core' ),
		),
		'clenix_team_socials' => array(
			'type'  => 'group',
			'value'  => ClenixTheme_Helper::team_socials()
		),
	)
) );

$Postmeta->add_meta_box( 'clenix_team_skills', __( 'Team Member Skills', 'clenix-core' ), array( 'clenix_team' ), '', '', 'high', array(
	'fields' => array(
		'clenix_team_skill' => array(
			'type'  => 'repeater',
			'button' => __( 'Add New Skill', 'clenix-core' ),
			'value'  => array(
				'skill_name' => array(
					'label' => __( 'Skill Name', 'clenix-core' ),
					'type'  => 'text',
					'desc'  => __( 'eg. Marketing', 'clenix-core' ),
				),
				'skill_value' => array(
					'label' => __( 'Skill Percentage (%)', 'clenix-core' ),
					'type'  => 'text',
					'desc'  => __( 'eg. 75', 'clenix-core' ),
				),
				'skill_color' => array(
					'label' => __( 'Skill Color', 'clenix-core' ),
					'type'  => 'color_picker',
					'desc'  => __( 'If not selected, primary color will be used', 'clenix-core' ),
				),
			)
		),
	)
) );
$Postmeta->add_meta_box( 'clenix_team_contact', __( 'Team Member Contact', 'clenix-core' ), array( 'clenix_team' ), '', '', 'high', array(
	'fields' => array(
		'clenix_team_contact_form' => array(
			'label' => __( 'Contct Shortcode', 'clenix-core' ),
			'type'  => 'text',
		),
	)
) );

/*-------------------------------------
#. Service
---------------------------------------*/

$Postmeta->add_meta_box( 'clenix_service_style_box', __( 'Service style', 'clenix-core' ), array( 'clenix_service' ), '', '', 'high', array(
	'fields' => array(
		"clenix_service_style" => array(
			'label'   => __( 'Service Template', 'clenix-core' ),
			'type'    => 'select',
			'options' => array(
				'default'  => __( 'Default', 'clenix-core' ),
				'style1'  => __( 'Style 1', 'clenix-core' ),
				'style2'  => __( 'Style 2', 'clenix-core' ),
			),
			'default'  => 'default',
		),
	),
) );
$Postmeta->add_meta_box( 'clenix_service_info', __( 'Service Info', 'clenix-core' ), array( 'clenix_service' ), '', '', 'high', array(
	'fields' => array(
		'clenix_service_info_title' => array(
			'label' => __( 'Service Info Title', 'clenix-core' ),
			'type'  => 'text',
		),
		'clenix_service_price' => array(
			'label' => __( 'Service Price', 'clenix-core' ),
			'type'  => 'text',
		),
		'clenix_service_price_unit' => array(
			'label' => __( 'Service Price Unit', 'clenix-core' ),
			'type'  => 'text',
		),
		'clenix_service_cleaning_hour' => array(
			'label' => __( 'Service Cleaning Hours', 'clenix-core' ),
			'type'  => 'text',
		),
		'clenix_service_no' => array(
			'label' => __( 'Service Number of Cleaners', 'clenix-core' ),
			'type'  => 'text',
		),
		'clenix_service_visiting_hour' => array(
			'label' => __( 'Service Visiting Hours', 'clenix-core' ),
			'type'  => 'text',
		),
		'clenix_service_contact' => array(
			'label' => __( 'Service Contact', 'clenix-core' ),
			'type'  => 'text',
		),
		'clenix_service_email' => array(
			'label' => __( 'Service E-mail', 'clenix-core' ),
			'type'  => 'text',
		),
		'clenix_service_button' => array(
			'label' => __( 'Service Button', 'clenix-core' ),
			'type'  => 'text',
		),
		'clenix_service_url' => array(
			'label' => __( 'Service Button Url', 'clenix-core' ),
			'type'  => 'text',
		),
	),
) );


$Postmeta->add_meta_box( 'clenix_service_media', __( 'Service Icon image', 'clenix-core' ),
		array( "clenix_service" ),'',
		'side',
		'default', array(
		'fields' => array(
			"clenix_service_icon" => array(
			  'label' => __( 'Service Icon', 'clenix-core' ),
			  'type'  => 'icon_select',
			  'desc'  => __( "Choose a Icon for your service", 'clenix-core' ),
			  'options' => ClenixTheme_Helper::get_icons(),
			),
			"clenix_service_img" => array(
				'label' => __( 'Service Image', 'clenix-core' ),
				'type'  => 'image',
				'desc'  => __( "Upload service image in case of icon not selected", 'clenix-core' ),
			),
			"clenix_service_img_hover" => array(
				'label' => __( 'Service Hover Image', 'clenix-core' ),
				'type'  => 'image',
				'desc'  => __( "Upload service hover image in case of icon not selected", 'clenix-core' ),
			),
		)
) );
/*-------------------------------------
#. Portfolio
---------------------------------------*/

$Postmeta->add_meta_box( 'clenix_portfolio_info', __( 'Portfolio Info', 'clenix-core' ), array( 'clenix_portfolio' ), '', '', 'high', array(
	'fields' => array(
		'clenix_port_info_title' => array(
			'label' => __( 'Info Title', 'clenix-core' ),
			'type'  => 'text',
		),
		'clenix_port_des' => array(
			'label' => __( 'Info Description', 'clenix-core' ),
			'type'  => 'textarea',
		),
		'clenix_client_name' => array(
			'label' => __( 'Client', 'clenix-core' ),
			'type'  => 'text',
		),
		'clenix_start_date' => array(
			'label' => __( 'Start Date', 'clenix-core' ),
			'type'  => 'text',
		),
		'clenix_finish_date' => array(
			'label' => __( 'End Date', 'clenix-core' ),
			'type'  => 'text',
		),
		'clenix_website' => array(
			'label' => __( 'Website', 'clenix-core' ),
			'type'  => 'text',
		),
		'clenix_port_rating' => array(
			'label' => __( 'Select the Rating', 'clenix-core' ),
			'type'  => 'select',
			'options' => array(
				'default' => __( 'Default', 'clenix-core' ),
				'1'    => '1',
				'2'    => '2',
				'3'    => '3',
				'4'    => '4',
				'5'    => '5'
				),
			'default'  => 'default',
		),	
		'clenix_port_gallery' => array(
			'label' => __( 'Portfolio Gallery', 'clenix-core' ),
			'type'  => 'gallery',
		),
	),
) );

$Postmeta->add_meta_box( 'clenix_portfolio_share', __( 'Portfolio Social Share', 'clenix-core' ), array( 'clenix_portfolio' ), '', '', 'high', array(
	'fields' => array(
		'clenix_portfolio_socials' => array(
			'label' => __( 'Socials', 'clenix-core' ),
			'type'  => 'header',
			'desc'  => __( 'Enter your social links here', 'clenix-core' ),
		),
		'clenix_portfolio_icons' => array(
			'type'  => 'group',
			'value'  => ClenixTheme_Helper::team_socials()
		),
	)
) );

/*-------------------------------------
#. Testimonial
---------------------------------------*/
$Postmeta->add_meta_box( 'clenix_testimonial_info', __( 'Testimonial Info', 'clenix-core' ), array( 'clenix_testim' ), '', '', 'high', array(
	'fields' => array(
		'clenix_tes_designation' => array(
			'label' => __( 'Designation', 'clenix-core' ),
			'type'  => 'text',
		),		
		'clenix_tes_rating' => array(
			'label' => __( 'Select the Rating', 'clenix-core' ),
			'type'  => 'select',
			'options' => array(
				'default' => __( 'Default', 'clenix-core' ),
				'1'    => '1',
				'2'    => '2',
				'3'    => '3',
				'4'    => '4',
				'5'    => '5'
				),
			'default'  => 'default',
		),
	)
) );