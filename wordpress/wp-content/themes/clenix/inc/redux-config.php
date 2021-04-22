<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

if ( ! class_exists( 'Redux' ) ) {
    return;
}

$opt_name = 'clenix';

$theme = wp_get_theme();
$args = array(
    // TYPICAL -> Change these values as you need/desire
    'opt_name'             => $opt_name,
    // This is where your data is stored in the database and also becomes your global variable name.
    'disable_tracking' => true,
    'display_name'         => $theme->get( 'Name' ),
    // Name that appears at the top of your panel
    'display_version'      => $theme->get( 'Version' ),
    // Version that appears at the top of your panel
    'menu_type'            => 'submenu',
    //Specify if the admin menu should appear or not. Options: menu or submenu (Under appearance only)
    'allow_sub_menu'       => true,
    // Show the sections below the admin menu item or not
    'menu_title'           => esc_html__( 'Clenix Options', 'clenix' ),
	
    'page_title'           => esc_html__( 'Clenix Options', 'clenix' ),
    // You will need to generate a Google API key to use this feature.
    // Please visit: https://developers.google.com/fonts/docs/developer_api#Auth
    //'google_api_key'       => 'AIzaSyC2GwbfJvi-WnYpScCPBGIUyFZF97LI0xs',
    // Set it you want google fonts to update weekly. A google_api_key value is required.
    'google_update_weekly' => false,
    // Must be defined to add google fonts to the typography module
    'async_typography'     => true,
    // Use a asynchronous font on the front end or font string
    //'disable_google_fonts_link' => true,   // Disable this in case you want to create your own google fonts loader
    'admin_bar'            => true,
    // Show the panel pages on the admin bar
    'admin_bar_icon'       => 'dashicons-menu',
    // Choose an icon for the admin bar menu
    'admin_bar_priority'   => 50,
    // Choose an priority for the admin bar menu
    'global_variable'      => '',
    // Set a different name for your global variable other than the opt_name
    'dev_mode'             => false,
    'forced_dev_mode_off'  => false,
    // Show the time the page took to load, etc
    'update_notice'        => false,
    // If dev_mode is enabled, will notify developer of updated versions available in the GitHub Repo
    'customizer'           => true,
    // Enable basic customizer support
    //'open_expanded'     => true,    // Allow you to start the panel in an expanded way initially.
    //'disable_save_warn' => true,    // Disable the save warning when a user changes a field

    // OPTIONAL -> Give you extra features
    'page_priority'        => null,
    // Order where the menu appears in the admin area. If there is any conflict, something will not show. Warning.
    'page_parent'          => 'themes.php',
    // For a full list of options, visit: http://codex.wordpress.org/Function_Reference/add_submenu_page#Parameters
    'page_permissions'     => 'manage_options',
    // Permissions needed to access the options panel.
    'menu_icon'            => '',
    // Specify a custom URL to an icon
    'last_tab'             => '',
    // Force your panel to always open to a specific tab (by id)
    'page_icon'            => 'icon-themes',
    // Icon displayed in the admin panel next to your menu_title
    'page_slug'            => 'clenix-options',
    // Page slug used to denote the panel, will be based off page title then menu title then opt_name if not provided
    'save_defaults'        => true,
    // On load save the defaults to DB before user clicks save or not
    'default_show'         => true,
    // If true, shows the default value next to each field that is not the default value.
    'default_mark'         => '',
    // What to print by the field's title if the value shown is default. Suggested: *
    'show_import_export'   => true,
    // Shows the Import/Export panel when not used as a field.

    // CAREFUL -> These options are for advanced use only
    'transient_time'       => 60 * MINUTE_IN_SECONDS,
    'output'               => true,
    // Global shut-off for dynamic CSS output by the framework. Will also disable google fonts output
    'output_tag'           => true,
    // Allows dynamic CSS to be generated for customizer and google fonts, but stops the dynamic CSS from going to the head
    // 'footer_credit'     => '',                   // Disable the footer credit of Redux. Please leave if you can help it.

    // FUTURE -> Not in use yet, but reserved or partially implemented. Use at your own risk.
    'database'             => '',
    // possible: options, theme_mods, theme_mods_expanded, transient. Not fully functional, warning!
    'use_cdn'              => true,
    // If you prefer not to use the CDN for Select2, Ace Editor, and others, you may download the Redux Vendor Support plugin yourself and run locally or embed it in your code.
);

Redux::setArgs( $opt_name, $args );

// Fields
Redux::setSection( $opt_name, array(
    'title'            => esc_html__( 'General', 'clenix' ),
    'id'               => 'general_section',
    'heading'          => '',
    'icon'             => 'el el-network',
    'fields' => array(
        array(
            'id'       => 'primary_color',
            'type'     => 'color',
            'transparent' => false,
            'title'    => esc_html__( 'Primary Color', 'clenix' ),
            'subtitle' => esc_html__( 'Theme Default: #14287b', 'clenix' ),
            'default'  => '#14287b',
        ),
		array(
            'id'       => 'secondary_color',
            'type'     => 'color',
            'transparent' => false,
            'title'    => esc_html__( 'Secondary Color', 'clenix' ),
            'subtitle' => esc_html__( 'Theme Default: #287ff9', 'clenix' ),
            'default'  => '#287ff9',
        ),
		array(
            'id'       => 'alter_bg_color',
            'type'     => 'color',
            'transparent' => false,
            'title'    => esc_html__( 'Alternate Background Color', 'clenix' ),
            'subtitle' => esc_html__( 'Theme Default: #fef22e', 'clenix' ),
            'default'  => '#fef22e',
        ),
		array(
            'id'       => 'alter_text_color',
            'type'     => 'color',
            'transparent' => false,
            'title'    => esc_html__( 'Alternate Text Color', 'clenix' ),
            'subtitle' => esc_html__( 'Theme Default: #3e3e3e', 'clenix' ),
            'default'  => '#3e3e3e',
        ),
        array(
            'id'       		=> 'body_color',
            'type'     		=> 'color',
            'transparent' 	=> false,
            'title'    		=> esc_html__( 'Body Color', 'clenix' ),
			'subtitle' => esc_html__( 'Theme Default: #646464', 'clenix' ),
            'default'  		=> '#646464',
        ),
        array(
            'id'       => 'container_width',
            'type'     => 'select',
            'title'    => esc_html__( 'Container width( Bootstrap Grid )', 'clenix'), 
            'subtitle' => esc_html__( 'Bootstrap Grid Container Width size for site.', 'clenix' ),
            'options'  => array(
                '1350' => esc_html__( '1350px', 'clenix' ),
                '1240' => esc_html__( '1240px', 'clenix' ),
                '1140' => esc_html__( '1140px', 'clenix' ),
            ),
            'default'  => '1240',
        ),
        array(
            'id'       => 'preloader',
            'type'     => 'switch',
            'title'    => esc_html__( 'Preloader', 'clenix' ),
            'on'       => esc_html__( 'Enabled', 'clenix' ),
            'off'      => esc_html__( 'Disabled', 'clenix' ),
            'default'  => false,
        ),
        array(
            'id'       => 'preloader_image',
            'type'     => 'media',
            'title'    => esc_html__( 'Preloader Image', 'clenix' ),
            'subtitle' => esc_html__( 'Please upload your choice of preloader image. Transparent GIF format is recommended', 'clenix' ),
            'default'  => array(
                'url'=> CLENIX_IMG_URL . 'preloader.gif'
            ),
            'required' => array( 'preloader', 'equals', true )
        ),
        array(
            'id'       => 'back_to_top',
            'type'     => 'switch',
            'title'    => esc_html__( 'Back to Top Arrow', 'clenix' ),
            'on'       => esc_html__( 'Enabled', 'clenix' ),
            'off'      => esc_html__( 'Disabled', 'clenix' ),
            'default'  => true,
        ),
        array(
            'id'       => 'display_no_preview_image',
            'type'     => 'switch',
            'title'    => esc_html__( 'Display No Preview Image on Blog/Archive', 'clenix' ),
			'off'      => esc_html__( 'Disabled', 'clenix' ),
            'on'       => esc_html__( 'Enabled', 'clenix' ),
            'default'  => 'off',
        ),
        array(
            'id'       => 'display_no_prev_img_related_post',
            'type'     => 'switch',
            'title'    => esc_html__( 'Display No Preview Image on Related Post', 'clenix' ),
			'off'      => esc_html__( 'Disabled', 'clenix' ),
            'on'       => esc_html__( 'Enabled', 'clenix' ),
            'default'  => 'off',
        ),
        array(
            'id'       => 'no_preview_image',
            'type'     => 'media',
            'title'    => esc_html__( 'Alternative Preview Image', 'clenix' ),
            'subtitle' => esc_html__( 'This image will be used as preview image in some archive pages if no featured image exists', 'clenix' ),
            'default'  => array(
                'url'=> CLENIX_IMG_URL . 'noimage.jpg'
            ),
			'required' => array( 'display_no_preview_image', 'equals', true )
        ),
		array(
			'id'       => 'team_slug',
			'type'     => 'text',
			'title'    =>  esc_html__( 'Team Slug', 'clenix' ),
			'subtitle' =>  esc_html__( 'Will be used as slug in Team breadcrumb', 'clenix' ),
			'default'  => 'team',
		),
		array(
			'id'       => 'service_slug',
			'type'     => 'text',
			'title'    =>  esc_html__( 'Service Slug', 'clenix' ),
			'subtitle' =>  esc_html__( 'Will be used as slug in Service breadcrumb', 'clenix' ),
			'default'  => 'service',
		),
		array(
			'id'       => 'portfolio_slug',
			'type'     => 'text',
			'title'    =>  esc_html__( 'Portfolio Slug', 'clenix' ),
			'subtitle' =>  esc_html__( 'Will be used as slug in Portfolio breadcrumb', 'clenix' ),
			'default'  => 'portfolio',
		),
		array(
			'id'       => 'testimonial_slug',
			'type'     => 'text',
			'title'    =>  esc_html__( 'Testimonial Slug', 'clenix' ),
			'subtitle' =>  esc_html__( 'Will be used as slug in Testimonial breadcrumb', 'clenix' ),
			'default'  => 'testimonial',
		),
		array(
			'id'       => 'service_cat_slug',
			'type'     => 'text',
			'title'    =>  esc_html__( 'Service Category Slug', 'clenix' ),
			'subtitle' =>  esc_html__( 'Will be used as slug in Service breadcrumb', 'clenix' ),
			'default'  => 'service-category',
		),
		array(
			'id'       => 'team_cat_slug',
			'type'     => 'text',
			'title'    =>  esc_html__( 'Team Category Slug', 'clenix' ),
			'subtitle' =>  esc_html__( 'Will be used as slug in Team breadcrumb', 'clenix' ),
			'default'  => 'team-category',
		),
		array(
			'id'       => 'portfolio_cat_slug',
			'type'     => 'text',
			'title'    =>  esc_html__( 'Portfolio Category Slug', 'clenix' ),
			'subtitle' =>  esc_html__( 'Will be used as slug in Portfolio breadcrumb', 'clenix' ),
			'default'  => 'portfolio-category',
		),
		array(
			'id'       => 'testim_cat_slug',
			'type'     => 'text',
			'title'    =>  esc_html__( 'Testimonial Category Slug', 'clenix' ),
			'subtitle' =>  esc_html__( 'Will be used as slug in Testimonial breadcrumb', 'clenix' ),
			'default'  => 'testimonial-category',
		),
    )
) 
);

Redux::setSection( $opt_name, array(
    'title'            => esc_html__( 'Contact & Socials', 'clenix' ),
    'id'               => 'socials_section',
    'heading'          => '',
    'desc'             => esc_html__( 'In case you want to hide any field, keep that field empty', 'clenix' ),
    'icon'             => 'el el-twitter',
    'fields' => array(
        array(
            'id'       => 'phone',
            'type'     => 'text',
            'title'    => esc_html__( 'Phone', 'clenix' ),
            'default'  => '',
        ),
        array(
            'id'       => 'email',
            'type'     => 'text',
            'title'    => esc_html__( 'Email', 'clenix' ),
            'validate' => 'email',
            'default'  => '',
        ),
        array(
            'id'       => 'Opening',
            'type'     => 'text',
            'title'    => esc_html__( 'Opening Hours', 'clenix' ),
            'default'  => '',
        ),
        array(
            'id'       => 'address',
            'type'     => 'textarea',
            'title'    => esc_html__( 'Address', 'clenix' ),
            'default'  => '',
        ),
        array(
            'id'       => 'social_facebook',
            'type'     => 'text',
            'title'    => esc_html__( 'Facebook', 'clenix' ),
            'default'  => '',
        ),
        array(
            'id'       => 'social_twitter',
            'type'     => 'text',
            'title'    => esc_html__( 'Twitter', 'clenix' ),
            'default'  => '',
        ),
        array(
            'id'       => 'social_gplus',
            'type'     => 'text',
            'title'    => esc_html__( 'Google Plus', 'clenix' ),
            'default'  => '',
        ),
        array(
            'id'       => 'social_linkedin',
            'type'     => 'text',
            'title'    => esc_html__( 'Linkedin', 'clenix' ),
            'default'  => ''
        ),
		array(
            'id'       => 'social_behance',
            'type'     => 'text',
            'title'    => esc_html__( 'Behance', 'clenix' ),
            'default'  => '',
        ),
		array(
            'id'       => 'social_dribbble',
            'type'     => 'text',
            'title'    => esc_html__( 'Dribbble', 'clenix' ),
            'default'  => '',
        ),
        array(
            'id'       => 'social_youtube',
            'type'     => 'text',
            'title'    => esc_html__( 'Youtube', 'clenix' ),
            'default'  => '',
        ),
        array(
            'id'       => 'social_pinterest',
            'type'     => 'text',
            'title'    => esc_html__( 'Pinterest', 'clenix' ),
            'default'  => ''
        ),
        array(
            'id'       => 'social_instagram',
            'type'     => 'text',
            'title'    => esc_html__( 'Instagram', 'clenix' ),
            'default'  => ''
        ),
        array(
            'id'       => 'social_skype',
            'type'     => 'text',
            'title'    => esc_html__( 'Skype', 'clenix' ),
            'default'  => ''
        ),
        array(
            'id'       => 'social_rss',
            'type'     => 'text',
            'title'    => esc_html__( 'RSS', 'clenix' ),
            'default'  => '',
        ),
        array(
            'id'       => 'social_snapchat',
            'type'     => 'text',
            'title'    => esc_html__( 'Snapchat', 'clenix' ),
            'default'  => '',
        ),
    )            
));

Redux::setSection( $opt_name, array(
    'title'            => esc_html__( 'Header', 'clenix' ),
    'id'               => 'header_section',
    'heading'          => '',
    'icon'             => 'el el-caret-up',
    'fields' => array(
        array(
            'id'       => 'logo',
            'type'     => 'media',
            'title'    => esc_html__( 'Main Logo', 'clenix' ),
            'default'  => array(
                'url'=> CLENIX_IMG_URL . 'logo.png'
            ),
            'subtitle' => esc_html__( 'Logo height less than 90px is recommended', 'clenix' ),
        ),
        array(
            'id'       => 'logo_light',
            'type'     => 'media',
            'title'    => esc_html__( 'Light Logo', 'clenix' ),
            'default'  => array(
                'url'=> CLENIX_IMG_URL . 'logo2.png'
            ),
            'subtitle' => esc_html__( 'Used when Transparent Header is enabled. Logo height less than 90px is recommended', 'clenix' ),
        ),
        array(
            'id'       => 'logo_width',
            'type'     => 'select',
            'title'    => esc_html__( 'Logo Area Width', 'clenix'), 
            'subtitle' => esc_html__( 'Width is defined by the number of bootstrap columns. Please note, navigation menu width will be decreased with the increase of logo width', 'clenix' ),
            'options'  => array(
                '1' => esc_html__( '1 Column', 'clenix' ),
                '2' => esc_html__( '2 Column', 'clenix' ),
                '3' => esc_html__( '3 Column', 'clenix' ),
                '4' => esc_html__( '4 Column', 'clenix' ),
            ),
            'default'  => '2',
        ),
        array(
            'id'       => 'sticky_menu',
            'type'     => 'switch',
            'title'    => esc_html__( 'Sticky Header', 'clenix' ),
            'on'       => esc_html__( 'Enabled', 'clenix' ),
            'off'      => esc_html__( 'Disabled', 'clenix' ),
            'default'  => true,
            'subtitle' => esc_html__( 'Show header when scroll down', 'clenix' ),
        ),
        array(
            'id'       => 'tr_header',
            'type'     => 'switch',
            'title'    => esc_html__( 'Transparent Header', 'clenix' ),
            'on'       => esc_html__( 'Enabled', 'clenix' ),
            'off'      => esc_html__( 'Disabled', 'clenix' ),
            'default'  => false,
            'subtitle' => esc_html__( 'You have to enable Banner or Slider in page to make it work properly. You can override this settings in individual pages', 'clenix' ),
        ),
		array(
            'id'       => 'header_opt',
            'type'     => 'switch',
            'title'    => esc_html__( 'Header On/Off', 'clenix' ),
            'on'       => esc_html__( 'Enabled', 'clenix' ),
            'off'      => esc_html__( 'Disabled', 'clenix' ),
            'default'  => true,
            'subtitle' => esc_html__( 'You can override this settings in individual pages', 'clenix' ),
        ),
        array(
            'id'       => 'top_bar',
            'type'     => 'switch',
            'title'    => esc_html__( 'Top Bar', 'clenix' ),
            'on'       => esc_html__( 'Enabled', 'clenix' ),
            'off'      => esc_html__( 'Disabled', 'clenix' ),
            'default'  => false,
            'subtitle' => esc_html__( 'You can override this settings in individual pages', 'clenix' ),
        ),
		/*topbar style 1*/		
        array(
            'id'       => 'top_bar_bgcolor',
            'type'     => 'color',
            'transparent' => false,
            'title'    => esc_html__( 'Top Bar Background Color', 'clenix' ),
            'default'  => '#14287b',
			'required' => array( 'top_bar_style', 'equals', '1' )
        ),
        array(
            'id'       => 'top_bar_color',
            'type'     => 'color',
            'transparent' => false,
            'title'    => esc_html__( 'Top Bar Text Color', 'clenix' ),
            'default'  => '#c6ceec',
			'required' => array( 'top_bar_style', 'equals', '1' )
        ),
		array(
            'id'       => 'top_baricon_color',
            'type'     => 'color',
            'transparent' => false,
            'title'    => esc_html__( 'Top Bar Icon Color', 'clenix' ),
            'default'  => '#c6ceec',
			'required' => array( 'top_bar_style', 'equals', '1' )
        ),
        array(
            'id'       => 'top_bar_color_tr',
            'type'     => 'color',
            'transparent' => false,
            'title'    => esc_html__( 'Transparent Top Bar Text Color', 'clenix' ),
            'subtitle' => esc_html__( 'Applied when Transparent Header is enabled', 'clenix' ),
            'default'  => '#ffffff',
			'required' => array( 'top_bar_style', 'equals', '1' )
        ),
		array(
            'id'       => 'top_baricon_color_tr',
            'type'     => 'color',
            'transparent' => false,
            'title'    => esc_html__( 'Transparent Top Bar Icon Color', 'clenix' ),
            'subtitle' => esc_html__( 'Applied when Transparent Header is enabled', 'clenix' ),
            'default'  => '#ffffff',
			'required' => array( 'top_bar_style', 'equals', '1' )
        ),
		/*topbar style 2*/
        array(
            'id'       => 'top_bar_bgcolor_2',
            'type'     => 'color',
            'transparent' => false,
            'title'    => esc_html__( 'Top Bar Background Color', 'clenix' ),
            'default'  => '#f3f4f7',
			'required' => array( 'top_bar_style', 'equals', '2' )
        ),
		array(
            'id'       => 'top_bar_color_2',
            'type'     => 'color',
            'transparent' => false,
            'title'    => esc_html__( 'Top Bar Text Color', 'clenix' ),
            'default'  => '#646464',
			'required' => array( 'top_bar_style', 'equals', '2' )
        ),
		array(
            'id'       => 'top_baricon_color_2',
            'type'     => 'color',
            'transparent' => false,
            'title'    => esc_html__( 'Top Bar Icon Color', 'clenix' ),
            'default'  => '#646464',
			'required' => array( 'top_bar_style', 'equals', '2' )
        ),
        array(
            'id'       => 'top_bar_color_tr_2',
            'type'     => 'color',
            'transparent' => false,
            'title'    => esc_html__( 'Transparent Top Bar Text Color', 'clenix' ),
            'subtitle' => esc_html__( 'Applied when Transparent Header is enabled', 'clenix' ),
            'default'  => '#ffffff',
			'required' => array( 'top_bar_style', 'equals', '2' )
        ),
		array(
            'id'       => 'top_baricon_color_tr_2',
            'type'     => 'color',
            'transparent' => false,
            'title'    => esc_html__( 'Transparent Top Bar Icon Color', 'clenix' ),
            'subtitle' => esc_html__( 'Applied when Transparent Header is enabled', 'clenix' ),
            'default'  => '#ffffff',
			'required' => array( 'top_bar_style', 'equals', '2' )
        ),
        array(
            'id'       => 'top_bar_style',
            'type'     => 'image_select',
            'title'    => esc_html__( 'Top Bar Layout', 'clenix' ),
            'default'  => '1',
            'options' => array(
                '1' => array(
                    'title' => '<b>'. esc_html__( 'Layout 1', 'clenix' ) . '</b>',
                    'img' => CLENIX_IMG_URL . 'top-1.jpg',
                ),
                '2' => array(
                    'title' => '<b>'. esc_html__( 'Layout 2', 'clenix' ) . '</b>',
                    'img' => CLENIX_IMG_URL . 'top-2.jpg',
                ),
                '3' => array(
                    'title' => '<b>'. esc_html__( 'Layout 3', 'clenix' ) . '</b>',
                    'img' => CLENIX_IMG_URL . 'top-3.jpg',
                ),
            ),
            'subtitle' => esc_html__( 'You can override this settings in individual pages', 'clenix' ),
        ),
        array(
            'id'       => 'header_style',
            'type'     => 'image_select',
            'title'    => esc_html__( 'Header Layout', 'clenix' ),
            'default'  => '2',
            'options' => array(
                '1' => array(
                    'title' => '<b>'. esc_html__( 'Layout 1', 'clenix' ) . '</b>',
                    'img' => CLENIX_IMG_URL . 'header-1.jpg',
                ),
                '2' => array(
                    'title' => '<b>'. esc_html__( 'Layout 2', 'clenix' ) . '</b>',
                    'img' => CLENIX_IMG_URL . 'header-2.jpg',
                ),
				'3' => array(
                    'title' => '<b>'. esc_html__( 'Layout 3', 'clenix' ) . '</b>',
                    'img' => CLENIX_IMG_URL . 'header-3.jpg',
                ),
				'4' => array(
                    'title' => '<b>'. esc_html__( 'Layout 4', 'clenix' ) . '</b>',
                    'img' => CLENIX_IMG_URL . 'header-4.jpg',
                ),
            ),
            'subtitle' => esc_html__( 'You can override this settings in individual pages', 'clenix' ),
        ),
		
		/*for top quick link*/         
        array(
            'id'       => 'header_address_txt',
            'type'     => 'text',
            'title'    => esc_html__( 'Header "Location" Text', 'clenix' ),
            'subtitle' => esc_html__( 'Used for header style 1', 'clenix' ),
            'default'  => esc_html__( '58 BelSouth Lane', 'clenix' )		
        ),
		array(
            'id'       => 'header_hotline_txt',
            'type'     => 'text',
            'title'    => esc_html__( 'Header "Quick Contact" Text', 'clenix' ),
            'subtitle' => esc_html__( 'Used for header style 1', 'clenix' ),
            'default'  => esc_html__( 'Quick Contact', 'clenix' )
        ),
        array(
            'id'       => 'header_mailus_txt',
            'type'     => 'text',
            'title'    => esc_html__( 'Header "E-mail Us" Text', 'clenix' ),
            'subtitle' => esc_html__( 'Used for header style 1', 'clenix' ),
            'default'  => esc_html__( 'E-mail Us', 'clenix' ),
        ),		
        array(
            'id'       => 'header_opening_txt',
            'type'     => 'text',
            'title'    => esc_html__( 'Header "Working Hours" Text', 'clenix' ),
            'subtitle' => esc_html__( 'Used for Topbar style 2', 'clenix' ),
            'default'  => esc_html__( 'Working Hours ', 'clenix' ),
        ),
        array(
            'id'       => 'search_icon',
            'type'     => 'switch',
            'title'    => esc_html__( 'Search Icon', 'clenix' ),
            'on'       => esc_html__( 'Enabled', 'clenix' ),
            'off'      => esc_html__( 'Disabled', 'clenix' ),
            'default'  => true,
        ), 
        array(
            'id'       => 'cart_icon',
            'type'     => 'switch',
            'title'    => esc_html__( 'Cart Icon', 'clenix' ),
            'on'       => esc_html__( 'Enabled', 'clenix' ),
            'off'      => esc_html__( 'Disabled', 'clenix' ),
            'default'  => false,
        ),
		array(
			'id'       => 'vertical_menu_icon',
			'type'     => 'switch',
			'title'    =>  esc_html__( 'Vertical Menu Icon', 'clenix' ),
			'on'       =>  esc_html__( 'Enabled', 'clenix' ),
			'off'      =>  esc_html__( 'Disabled', 'clenix' ),
			'default'  => true,
		),
		array(
			'id'       => 'online_button',
			'type'     => 'switch',
			'title'    =>  esc_html__( 'Online Button', 'clenix' ),
			'on'       =>  esc_html__( 'Enabled', 'clenix' ),
			'off'      =>  esc_html__( 'Disabled', 'clenix' ),
			'default'  => true,
		),
		array(
			'id'       => 'online_button_text',
			'type'     => 'text',
			'title'    => esc_html__( 'Button Text', 'clenix' ),
			'default'  => esc_html__( 'Get A Quote', 'clenix' ),
			'required' => array( 'online_button', '=', true )
		),
		array(
			'id'       => 'online_button_link',
			'type'     => 'text',
			'title'    => esc_html__( 'Button Link', 'clenix' ),
			'default'  => '#',
			'required' => array( 'online_button', '=', true )
		),
		
    )            
) 
);

Redux::setSection( $opt_name, array(
    'title'            => esc_html__( 'Main Menu', 'clenix' ),
    'id'               => 'menu_section',
    'heading'          => '',
    'icon'             => 'el el-book',
    'fields' => array(
        array(
            'id'       => 'section-mainmenu',
            'type'     => 'section',
            'title'    => esc_html__( 'Main Menu Items', 'clenix' ),
            'indent'   => true,
        ),
        array(
            'id'       => 'menu_typo',
            'type'     => 'typography',
            'title'    => esc_html__( 'Menu Font', 'clenix' ),
            'google'   => true,
            'subsets'   => false,
            'text-align' => false,
            'color'   => false,
            'text-transform' => true,
            'default'     => array(
                'font-family' 	 => 'Roboto',
                'google'      	 => true,
                'font-size'   	 => '16px',
                'font-weight' 	 => '500',
                'line-height' 	 => '22px',
                'text-transform' => 'capitalize',
            ),
        ),
        array(
            'id'       => 'menu_color',
            'type'     => 'color',
            'transparent' => false,
            'title'    => esc_html__( 'Menu Color', 'clenix' ),
            'default'  => '#111111',
        ),
        array(
            'id'       => 'menu_color_tr',
            'type'     => 'color',
            'transparent' => false,
            'title'    => esc_html__( 'Transparent Menu Color', 'clenix' ),
            'subtitle' => esc_html__( 'Applied when Transparent Header is enabled', 'clenix' ),
            'default'  => '#ffffff',
        ),
        array(
            'id'       => 'menu_hover_color',
            'type'     => 'color',
            'transparent' => false,
            'title'    => esc_html__( 'Menu Hover Color', 'clenix' ),
            'default'  => '#287ff9',
        ),
        array(
            'id'       => 'section-submenu',
            'type'     => 'section',
            'title'    => esc_html__( 'Sub Menu Items', 'clenix' ),
            'indent'   => true,
        ), 
        array(
            'id'       => 'submenu_typo',
            'type'     => 'typography',
            'title'    => esc_html__( 'Submenu Font', 'clenix' ),
            'google'   => true,
            'subsets'   => false,
            'text-align'   => false,
            'color'   => false,
            'text-transform' => true,
            'default'     => array(
                'font-family' => 'Roboto',
                'google'      => true,
                'font-size'   => '14px',
                'font-weight' => '500',
                'line-height' => '22px',
                'text-transform' => 'inherit',
            ),
        ),
        array(
            'id'       => 'submenu_color',
            'type'     => 'color',
            'transparent' => false,
            'title'    => esc_html__( 'Submenu Color', 'clenix' ),
            'default'  => '#111111',
        ), 
        array(
            'id'       => 'submenu_bgcolor',
            'type'     => 'color',
            'transparent' => false,
            'title'    => esc_html__( 'Submenu Background Color', 'clenix' ),
            'default'  => '#ffffff',
        ),  
        array(
            'id'       => 'submenu_hover_color',
            'type'     => 'color',
            'transparent' => false,
            'title'    => esc_html__( 'Submenu Hover Color', 'clenix' ),
            'default'  => '#287ff9',
        ), 
        array(
            'id'       => 'submenu_hover_bgcolor',
            'type'     => 'color',
            'transparent' => false,
            'title'    => esc_html__( 'Submenu Hover Background Color', 'clenix' ),
            'default'  => '#ffffff',
        ),
        array(
            'id'       => 'section-resmenu',
            'type'     => 'section',
            'title'    => esc_html__( 'Mobile Menu', 'clenix' ),
            'indent'   => true,
        ), 
        array(
            'id'       => 'resmenu_width',
            'type'     => 'slider',
            'title'    => esc_html__( 'Screen width in which mobile menu activated', 'clenix' ),
            'subtitle' => esc_html__( 'Recommended value is: 992', 'clenix' ),
            'default'  => 992,
            'min'      => 0,
            'step'     => 1,
            'max'      => 2000,
        ),
        array(
            'id'       => 'resmenu_typo',
            'type'     => 'typography',
            'title'    => esc_html__( 'Mobile Menu Font', 'clenix' ),
            'google'   => true,
            'subsets'   => false,
            'text-align'   => false,
            'color'   => false,
            'text-transform' => true,
            'default'     => array(
				'font-family' => 'Roboto',
                'google'      => true,
                'font-size'   => '14px',
                'font-weight' => '500',
                'line-height' => '22px',
                'text-transform' => 'inherit',				
            ),
        ),
    )
) 
);

Redux::setSection( $opt_name, array(
    'title'            => esc_html__( 'Banner', 'clenix' ),
    'id'               => 'banner_section',
    'heading'          => '',
    'icon'             => 'el el-picture',
    'fields' => array(
        array(
            'id'       => 'banner_heading_color',
            'type'     => 'color',
            'transparent' => false,
            'title'    => esc_html__( 'Banner Heading Color', 'clenix' ),
            'default'  => '#ffffff',
        ),
        array(
            'id'       => 'breadcrumb_active',
            'type'     => 'switch',
            'title'    => esc_html__( 'Enable Breadcrumb', 'clenix' ),
            'on'       => esc_html__( 'Enabled', 'clenix' ),
            'off'      => esc_html__( 'Disabled', 'clenix' ),
            'default'  => true,
        ),
		array(
			'id'       => 'breadcrumbs_delimiter',
			'type'     => 'text',
			'title'    => esc_html__( 'Breadcrumbs Delimiter', 'clenix' ),
			'default'  => '<i class="fa fa-angle-double-right" aria-hidden="true"></i>',
		),
        array(
            'id'       => 'breadcrumb_hide_mobile',
            'type'     => 'switch',
            'title'    => esc_html__( 'Show/Hide Breadcrumb in mobile', 'clenix' ),
            'on'       => esc_html__( 'Enabled', 'clenix' ),
            'off'      => esc_html__( 'Disabled', 'clenix' ),
            'default'  => false,
        ),		
        array(
            'id'       => 'breadcrumb_link_color',
            'type'     => 'color',
            'transparent' => false,
            'title'    => esc_html__( 'Breadcrumb Link Color', 'clenix' ),
            'default'  => '#ffffff',
        ),
        array(
            'id'       => 'breadcrumb_link_hover_color',
            'type'     => 'color',
            'transparent' => false,
            'title'    => esc_html__( 'Breadcrumb Link Hover Color', 'clenix' ),
            'default'  => '#fef22e',
        ),
        array(
            'id'       => 'breadcrumb_active_color',
            'type'     => 'color',
            'transparent' => false,
            'title'    => esc_html__( 'Active Breadcrumb Color', 'clenix' ),
            'default'  => '#fef22e',
        ),
        array(
            'id'       => 'breadcrumb_seperator_color',
            'type'     => 'color',
            'transparent' => false,
            'title'    => esc_html__( 'Breadcrumb Seperator Color', 'clenix' ),
            'default'  => '#ffffff',
        ),
        array(
            'id'       => 'banner_bg_opacity',
            'type'     => 'text',
            'title'    => esc_html__( 'Banner Background Overlay opacity', 'clenix' ),
            'default'  => '0.6',
        ),
		array(
           'id'       => 'banner_top_padding',
           'type'     => 'text',
           'title'    => esc_html__( 'Banner Top Gap ( Top Padding ) ', 'clenix' ),
           'default'  => '120',
		),
		array(
           'id'       => 'banner_bottom_padding',
           'type'     => 'text',
           'title'    => esc_html__( 'Banner Bottom Gap ( Bottom Padding ) ', 'clenix' ),
           'default'  => '120',
		),

    )
) 
);

/*advertisement*/
function clenix_redux_advertisement_fields( $prefix, $title, $subtitle = '' ){
    return array(
        array(
            'id'       =>  $prefix. '_sec',
            'type'     => 'section',
            'title'    => $title,
            'subtitle' => $subtitle,
            'indent'   => true,
        ),
        array(
            'id'       => $prefix. '_activate',
            'type'     => 'switch',
            'title'    => esc_html__( 'Activate Ad', 'clenix' ),
            'on'       => esc_html__( 'Enabled', 'clenix' ),
            'off'      => esc_html__( 'Disabled', 'clenix' ),
            'default'  => false,
        ),
        array(
            'id'       => $prefix. '_type',
            'type'     => 'button_set',
            'title'    => esc_html__( 'Ad Type', 'clenix' ),
            'options'  => array(
                'image'  => esc_html__( 'Image Link', 'clenix' ),
                'code'   => esc_html__( 'Custom Code', 'clenix' ),
            ),
            'default' => 'image',
            'required' => array(  $prefix. '_activate', 'equals', true )
        ),
        array(
            'id'       => $prefix. '_image',
            'type'     => 'media',
            'title'    => esc_html__( 'Image', 'clenix' ),
            'default'  => '',
            'required' => array(  $prefix. '_type', 'equals', 'image' )
        ),
        array(
            'id'       => $prefix. '_url',
            'type'     => 'text',
            'title'    => esc_html__( 'Link', 'clenix' ),
            'default'  => '',
            'required' => array(  $prefix. '_type', 'equals', 'image' )
        ),
        array(
            'id'       => $prefix. '_newtab',
            'type'     => 'switch',
            'title'    => esc_html__( 'Open Link in New Tab', 'clenix' ),
            'on'       => esc_html__( 'Enabled', 'clenix' ),
            'off'      => esc_html__( 'Disabled', 'clenix' ),
            'default'  => true,
            'required' => array(  $prefix. '_type', 'equals', 'image' )
        ),
        array(
            'id'       => $prefix. '_nofollow',
            'type'     => 'switch',
            'title'    => esc_html__( 'Nofollow', 'clenix' ),
            'on'       => esc_html__( 'Enabled', 'clenix' ),
            'off'      => esc_html__( 'Disabled', 'clenix' ),
            'default'  => true,
            'subtitle' => esc_html__( 'Make Link Nofollow', 'clenix' ),
            'required' => array(  $prefix. '_type', 'equals', 'image' )
        ),
        array(
            'id'       => $prefix. '_code',
            'type'     => 'textarea',
            'title'    => esc_html__( 'Custom Code', 'clenix' ),
            'default'  => '',
            'subtitle' => esc_html__( 'Supports: Shortcode, Adsense, Text, HTML, Scripts', 'clenix' ),
            'required' => array(  $prefix. '_type', 'equals', 'code' )
        ),
    );
}

Redux::setSection( $opt_name, array(
    'title'            => esc_html__( 'Footer', 'clenix' ),
    'id'               => 'footer_section',
    'heading'          => '',
    'icon'             => 'el el-caret-down',
    'fields' => array(
		/*main footer part*/
		array( 
            'id'       => 'footer_style',
            'type'     => 'image_select',
            'title'    => esc_html__( 'Footer Layout', 'clenix' ),
            'default'  => '1',
            'options' => array(
                '1' => array(
                    'title' => '<b>'. esc_html__( 'Layout 1', 'clenix' ) . '</b>',
                    'img' => CLENIX_IMG_URL . 'footer-1.jpg',
                ),
                '2' => array(
                    'title' => '<b>'. esc_html__( 'Layout 2', 'clenix' ) . '</b>',
                    'img' => CLENIX_IMG_URL . 'footer-2.jpg',
                ),
                '3' => array(
                    'title' => '<b>'. esc_html__( 'Layout 3', 'clenix' ) . '</b>',
                    'img' => CLENIX_IMG_URL . 'footer-3.jpg',
                ),
                '4' => array(
                    'title' => '<b>'. esc_html__( 'Layout 4', 'clenix' ) . '</b>',
                    'img' => CLENIX_IMG_URL . 'footer-4.jpg',
                ),
            ),
            'subtitle' => esc_html__( 'You can override this settings in individual pages', 'clenix' ),
        ),				
        array(
            'id'       => 'footer_area',
            'type'     => 'switch',
            'title'    => esc_html__( 'Display Footer Area', 'clenix' ),
            'on'       => esc_html__( 'Enabled', 'clenix' ),
            'off'      => esc_html__( 'Disabled', 'clenix' ),
            'default'  => true,
        ),
        array(
            'id'       => 'footer_column_1',
            'type'     => 'select',
            'title'    => esc_html__( 'Number of Columns for Footer 1', 'clenix' ),
            'options'  => array(
                '1' => '1 Column',
                '2' => '2 Columns',
                '3' => '3 Columns',
                '4' => '4 Columns',
            ),
            'default'  => '4',
            'required' => array( 'footer_style', 'equals', '1' )
        ),
        array(
            'id'       => 'footer_column_2',
            'type'     => 'select',
            'title'    => esc_html__( 'Number of Columns for Footer 2', 'clenix' ),
            'options'  => array(
                '1' => '1 Column',
                '2' => '2 Columns',
                '3' => '3 Columns',
                '4' => '4 Columns',
            ),
            'default'  => '4',
            'required' => array( 'footer_style', 'equals', '2' )
        ),
		array(
			'id'       => 'footer_shape1',
			'type'     => 'media',
			'title'    => esc_html__( 'Footer Top Shape', 'clenix' ),
			'default'  => array(
				'url'=> CLENIX_IMG_URL . 'figure1.png'
			),
			'subtitle' => esc_html__( 'Only use footer 1 & 2', 'clenix' ),
		),
		array(
			'id'       => 'footer_shape2',
			'type'     => 'media',
			'title'    => esc_html__( 'Footer Bottom Shape', 'clenix' ),
			'default'  => array(
				'url'=> CLENIX_IMG_URL . 'figure2.png'
			),
			'subtitle' => esc_html__( 'Only use footer 1 & 2', 'clenix' ),
		),	
        array(
            'id'       => 'footer_bgcolor',
            'type'     => 'color',
            'transparent' => false,
            'title'    => esc_html__( 'Footer Background Color', 'clenix' ),
            'default'  => '#14287b',
            'required' => array( 'footer_area', 'equals', true ),
        ),
        array(
            'id'       => 'footer_title_color',
            'type'     => 'color',
            'transparent' => false,
            'title'    => esc_html__( 'Footer Title Text Color', 'clenix' ),
            'default'  => '#ffffff',
            'required' => array( 'footer_area', 'equals', true )
        ), 
        array(
            'id'       => 'footer_color',
            'type'     => 'color',
            'transparent' => false,
            'title'    => esc_html__( 'Footer Body Text Color', 'clenix' ),
            'default'  => '#c6ceec',
            'required' => array( 'footer_area', 'equals', true )
        ), 
        array(
            'id'       => 'footer_link_color',
            'type'     => 'color',
            'transparent' => false,
            'title'    => esc_html__( 'Footer Body Link Color', 'clenix' ),
            'default'  => '#c6ceec',
            'required' => array( 'footer_area', 'equals', true )
        ), 
        array(
            'id'       => 'footer_link_hover_color',
            'type'     => 'color',
            'transparent' => false,
            'title'    => esc_html__( 'Footer Body Link Hover Color', 'clenix' ),
            'default'  => '#ffffff',
            'required' => array( 'footer_area', 'equals', true )
        ),		
        array(
            'id'       => 'footer_logo_light',
            'type'     => 'media',
            'title'    => esc_html__( 'Footer Logo', 'clenix' ),
            'default'  => array(
                'url'=> CLENIX_IMG_URL . 'logo2.png'
            ),
            'subtitle' => esc_html__( 'Logo height less than 90px is recommended', 'clenix' ),
			'required' => array( 'footer_area', 'equals', true )
        ),
        array(
            'id'       => 'section-copyright-area',
            'type'     => 'section',
            'title'    => esc_html__( 'Copyright Area', 'clenix' ),
            'indent'   => true,
        ),
        array(
            'id'       => 'copyright_area',
            'type'     => 'switch',
            'title'    => esc_html__( 'Display Copyright Area', 'clenix' ),
            'on'       => esc_html__( 'Enabled', 'clenix' ),
            'off'      => esc_html__( 'Disabled', 'clenix' ),
            'default'  => true,
        ),
        array(
            'id'       => 'copyright_bgcolor',
            'type'     => 'color',
            'transparent' => false,
            'title'    => esc_html__( 'Copyright Background Color', 'clenix' ),
            'default'  => '#14287b',
            'required' => array( 'copyright_area', 'equals', true )
        ),
        array(
            'id'       => 'copyright_color',
            'type'     => 'color',
            'transparent' => false,
            'title'    => esc_html__( 'Copyright Text Color', 'clenix' ),
            'default'  => '#c6ceec',
            'required' => array( 'copyright_area', 'equals', true )
        ),
        array(
            'id'       => 'copy_link_color',
            'type'     => 'color',
            'transparent' => false,
            'title'    => esc_html__( 'Copy Link Color', 'clenix' ),
            'default'  => '#c6ceec',
            'required' => array( 'footer_area', 'equals', true )
        ), 
        array(
            'id'       => 'copy_link_hover_color',
            'type'     => 'color',
            'transparent' => false,
            'title'    => esc_html__( 'Copy Link Hover Color', 'clenix' ),
            'default'  => '#ffffff',
            'required' => array( 'footer_area', 'equals', true )
        ),
        array(
            'id'       => 'copyright_text',
            'type'     => 'textarea',
            'title'    => esc_html__( 'Copyright Text', 'clenix' ),
            'default'  => '&copy; 2020 clenix. All Rights Reserved.',
            'required' => array( 'copyright_area', 'equals', true )
        ),
    )
) );

Redux::setSection( $opt_name, array(
    'title'            => esc_html__( 'Typography', 'clenix' ),
    'id'               => 'typo_section',
    'icon'             => 'el el-text-width',
    'fields' => array(
        array(
            'id'       => 'typo_body',
            'type'     => 'typography',
            'title'    => esc_html__( 'Body', 'clenix' ),
            'google'   => true,
            'subsets'   => false,
            'text-align'   => false,
            'font-weight'   => false,
            'color'   => false,
            'default'     => array(
                'font-family' => 'Roboto',
                'google'      => true,
                'font-size'   => '16px',
                'font-weight' => '400',
                'line-height' => '28px',
            ),
        ),
        array(
            'id'       => 'typo_h1',
            'type'     => 'typography',
            'title'    => esc_html__( 'Header h1', 'clenix' ),
            'google'   => true,
            'subsets'   => false,
            'text-align'   => false,
            'font-weight'   => false,
            'color'   => false,
            'default'     => array(
                'font-family' => 'Poppins',
                'google'      => true,
                'font-size'   => '36px',
                'font-weight' => '600',
                'line-height'   => '40px',
            ),
        ),
        array(
            'id'       => 'typo_h2',
            'type'     => 'typography',
            'title'    => esc_html__( 'Header h2', 'clenix' ),
            'google'   => true,
            'subsets'   => false,
            'text-align'   => false,
            'font-weight'   => false,
            'color'   => false,
            'default'     => array(
                'font-family' => 'Poppins',
                'google'      => true,
                'font-size'   => '28px',
                'font-weight' => '600',
                'line-height' => '36px',
            ),
        ),
        array(
            'id'       => 'typo_h3',
            'type'     => 'typography',
            'title'    => esc_html__( 'Header h3', 'clenix' ),
            'google'   => true,
            'subsets'   => false,
            'text-align'   => false,
            'font-weight'   => false,
            'color'   => false,
            'default'     => array(
                'font-family' => 'Poppins',
                'google'      => true,
                'font-size'   => '22px',
                'font-weight' => '600',
                'line-height' => '34px',
            ),
        ),
        array(
            'id'       => 'typo_h4',
            'type'     => 'typography',
            'title'    => esc_html__( 'Header h4', 'clenix' ),
            'google'   => true,
            'subsets'   => false,
            'text-align'   => false,
            'font-weight'   => false,
            'color'   => false,
            'default'     => array(
                'font-family' => 'Poppins',
                'google'      => true,
                'font-size'   => '20px',
                'font-weight' => '600',
                'line-height' => '32px',
            ),
        ),
        array(
            'id'       => 'typo_h5',
            'type'     => 'typography',
            'title'    => esc_html__( 'Header h5', 'clenix' ),
            'google'   => true,
            'subsets'   => false,
            'text-align'   => false,
            'font-weight'   => false,
            'color'   => false,
            'default'     => array(
                'font-family' => 'Poppins',
                'google'      => true,
                'font-size'   => '18px',
                'font-weight' => '600',
                'line-height' => '26px',
            ),
        ),
        array(
            'id'       => 'typo_h6',
            'type'     => 'typography',
            'title'    => esc_html__( 'Header h6', 'clenix' ),
            'google'   => true,
            'subsets'   => false,
            'text-align'   => false,
            'font-weight'   => false,
            'color'   => false,
            'default'     => array(
                'font-family' => 'Poppins',
                'google'      => true,
                'font-size'   => '16px',
                'font-weight' => '600',
                'line-height' => '24px',
            ),
        ),
    )
) );

// Generate Common post type fields 
function clenix_redux_post_type_fields( $prefix ){
    return array(
        array(
            'id'       => $prefix. '_layout',
            'type'     => 'button_set',
            'title'    => esc_html__( 'Layout', 'clenix' ),
            'options'  => array(
                'left-sidebar'  => esc_html__( 'Left Sidebar', 'clenix' ),
                'full-width'    => esc_html__( 'Full Width', 'clenix' ),
                'right-sidebar' => esc_html__( 'Right Sidebar', 'clenix' ),
            ),
            'default' => 'right-sidebar'
        ),		
        array(
            'id'       => $prefix. '_sidebar',
            'type'     => 'select',
            'title'    => __( 'Custom Sidebar', 'clenix' ),
            'options'  => ClenixTheme_Helper::custom_sidebar_fields(),
            'default'  => 'sidebar',
            'required' => array( $prefix. '_layout', '!=', 'full-width' ),
        ),
        array(
            'id'       => $prefix. '_padding_top',
            'type'     => 'text',
            'title'    => esc_html__( 'Content Padding Top', 'clenix' ),
            'validate'  => 'numeric',
            'default' => '120',
        ),
        array(
            'id'       => $prefix. '_padding_bottom',
            'type'     => 'text',
            'title'    => esc_html__( 'Content Padding Bottom', 'clenix' ),
            'validate'  => 'numeric',
            'default' => '120'
        ),
        array(
            'id'       => $prefix. '_banner',
            'type'     => 'switch',
            'title'    => esc_html__( 'Banner', 'clenix' ),
            'on'       => esc_html__( 'Enabled', 'clenix' ),
            'off'      => esc_html__( 'Disabled', 'clenix' ),
            'default'  => true,
        ),
        array(
            'id'       => $prefix. '_breadcrumb',
            'type'     => 'switch',
            'title'    => esc_html__( 'Breadcrumb', 'clenix' ),
            'on'       => esc_html__( 'Enabled', 'clenix' ),
            'off'      => esc_html__( 'Disabled', 'clenix' ),
            'default'  => true,
            'required' => array( $prefix. '_banner', 'equals', true )
        ),
        array(
            'id'       => $prefix. '_bgtype',
            'type'     => 'button_set',
            'title'    => esc_html__( 'Banner Background Type', 'clenix' ),
            'options'  => array(
                'bgcolor'  => esc_html__( 'Background Color', 'clenix' ),
                'bgimg'    => esc_html__( 'Background Image', 'clenix' ),
            ),
            'default' => 'bgcolor',
            'required' => array( $prefix. '_banner', 'equals', true )
        ),
        array(
            'id'       => $prefix. '_bgimg',
            'type'     => 'media',
            'title'    => esc_html__( 'Banner Background Image', 'clenix' ),
            'default'  => array(
                'url'=> CLENIX_IMG_URL . 'banner.jpg'
            ),
            'required' => array( $prefix. '_bgtype', 'equals', 'bgimg' )
        ),
        array(
            'id'       => $prefix. '_bgcolor',
            'type'     => 'color',
            'title'    => esc_html__('Banner Background Color', 'clenix'), 
            'validate' => 'color',
            'transparent' => false,
            'default' => '#f8f8f8',
            'required' => array( $prefix. '_bgtype', 'equals', 'bgcolor' )
        ),
        array(
            'id'       => $prefix. '_page_bgimg',
            'type'     => 'media',
            'title'    => esc_html__( 'Page/Post Background Image', 'clenix' ),
            'default'  => array(
                'url'=> '',
            ),
        ),
        array(
            'id'       => $prefix. '_page_bgcolor',
            'type'     => 'color',
            'title'    => esc_html__('Page/Post Background Color', 'clenix'), 
            'validate' => 'color',
            'transparent' => true,
            'default' => '#ffffff',
        ),
    );
}

Redux::setSection( $opt_name, array(
    'title'            => esc_html__( 'Layout Defaults', 'clenix' ),
    'id'               => 'layout_defaults',
    'icon'             => 'el el-th',
    ) );

// Page
$clenix_page_fields = clenix_redux_post_type_fields( 'page' );
$clenix_page_fields[0]['default'] = 'full-width';
Redux::setSection( $opt_name, array(
	'title'            => esc_html__( 'Page', 'clenix' ),
	'id'               => 'pages_section',
	'subsection' => true,
	'fields' => $clenix_page_fields
	) );

//Post Archive
$clenix_post_archive_fields = clenix_redux_post_type_fields( 'blog' );
Redux::setSection( $opt_name, array(
	'title'      => esc_html__( 'Blog / Archive', 'clenix' ),
	'id'         => 'blog_section',
	'subsection' => true,
	'fields' 	 => $clenix_post_archive_fields
	) );

// Single Post
$clenix_single_post_fields = clenix_redux_post_type_fields( 'single_post' );
Redux::setSection( $opt_name, array(
	'title'      => esc_html__( 'Post Single', 'clenix' ),
	'id'         => 'single_post_section',
	'subsection' => true,
	'fields' 	 => $clenix_single_post_fields          
	) );


//Service Single Archive
$clenix_services_fields = clenix_redux_post_type_fields( 'services' );
$clenix_services_fields[0]['default'] = 'full-width';
Redux::setSection( $opt_name, array(
    'title'      => esc_html__( 'Single Services', 'clenix' ),
    'id'         => 'services_section',
    'subsection' => true,
    'fields'     => $clenix_services_fields
) );

//Single Portfolio	
$clenix_portfolio_fields = clenix_redux_post_type_fields( 'portfolio' );
$clenix_portfolio_fields[0]['default'] = 'full-width';
Redux::setSection( $opt_name, array(
    'title'      => esc_html__( 'Single Portfolio', 'clenix' ),
    'id'         => 'portfolio_section',
    'subsection' => true,
    'fields'     => $clenix_portfolio_fields
) );


// Search
$clenix_search_fields = clenix_redux_post_type_fields( 'search' );

$excerpt_length = array (
	array(
		'id'       => 'search_excerpt_length',
		'type'     => 'text',
		'title'    => esc_html__( 'Search Excerpt Length', 'clenix' ),
		'validate'  => 'numeric',
		'default' => '25',
	)       
);
$clenix_search_field_2 = array_merge ( $clenix_search_fields , $excerpt_length );
Redux::setSection( $opt_name, array(
	'title'      => esc_html__( 'Search Layout', 'clenix' ),
	'id'         => 'search_section',
	'heading'    => '',
	'subsection' => true,
	'fields' 	 => $clenix_search_field_2
));

// Error 404 Layout
$clenix_error_fields = clenix_redux_post_type_fields( 'error' );
unset($clenix_error_fields[0]);
$clenix_error_fields[2]['default'] = 'full-width';
$clenix_error_fields[2]['default'] = '120';
$clenix_error_fields[3]['default'] = '120';
Redux::setSection( $opt_name, array(
    'title'   	 => esc_html__( 'Error 404 Layout', 'clenix' ),
    'id'      	 => 'error_section',
    'heading' 	 => '',
    'subsection' => true,
    'fields'  	 => $clenix_error_fields           
) 
);

if ( class_exists( 'WooCommerce' ) ) {
    // Woocommerce Shop Archive
    $clenix_shop_archive_fields = clenix_redux_post_type_fields( 'shop' );
    Redux::setSection( $opt_name, array(
        'title'      => esc_html__( 'Shop Archive', 'clenix' ),
        'id'         => 'shop_section',
        'subsection' => true,
        'fields' 	 => $clenix_shop_archive_fields
        ) );

    // Woocommerce Product
    $clenix_product_fields = clenix_redux_post_type_fields( 'product' );
    Redux::setSection( $opt_name, array(
        'title'      => esc_html__( 'Product Single', 'clenix' ),
        'id'         => 'product_section',
        'subsection' => true,
        'fields' 	 => $clenix_product_fields
        ) );
}

// Blog Settings
Redux::setSection( $opt_name, array(
    'title'            => esc_html__( 'Blog Settings', 'clenix' ),
    'id'               => 'blog_settings_section',
    'icon'             => 'el el-tags',
    'heading'          => '',
    'fields' => array(
        array(
            'id'       =>'blog_style',
            'type'     => 'image_select',
            'title'    => esc_html__( 'Blog/Archive Layout', 'clenix' ),
            'default'  => 'style1',
            'options' => array(
                'style1' => array(
                    'title' => '<b>'. esc_html__( 'Layout 1', 'clenix' ) . '</b>',
                    'img' => CLENIX_IMG_URL . 'blog1.png',
                ),
                'style2' => array(
                    'title' => '<b>'. esc_html__( 'Layout 2', 'clenix' ) . '</b>',
                    'img' => CLENIX_IMG_URL . 'blog2.png',
                ),
                'style3' => array(
                    'title' => '<b>'. esc_html__( 'Layout 3', 'clenix' ) . '</b>',
                    'img' => CLENIX_IMG_URL . 'blog3.png',
                ),
				'style4' => array(
                    'title' => '<b>'. esc_html__( 'Layout 4', 'clenix' ) . '</b>',
                    'img' => CLENIX_IMG_URL . 'blog1.png',
                ),
            ),
        ),
		array(
			'id'       => 'post_banner_title',
			'type'     => 'text',
			'title'    => esc_html__( 'Enter the Post Banner Title', 'clenix' ),
			'default'  => esc_html__( '', 'clenix' ),			
		),
		array(
			'id'       => 'post_content_limit',
			'type'     => 'text',
			'title'    => esc_html__( 'Post Content Limit', 'clenix' ),
			'default'  => 20,
		),
        array(
            'id'       => 'blog_date',
            'type'     => 'switch',
            'title'    => esc_html__( 'Show Date', 'clenix' ),
            'on'       => esc_html__( 'On', 'clenix' ),
            'off'      => esc_html__( 'Off', 'clenix' ),
            'default'  => true,
        ), 
        array(
            'id'       => 'blog_author_name',
            'type'     => 'switch',
            'title'    => esc_html__( 'Show Author Name', 'clenix' ),
            'on'       => esc_html__( 'On', 'clenix' ),
            'off'      => esc_html__( 'Off', 'clenix' ),
            'default'  => true,
        ),
        array(
            'id'       => 'blog_comment_num',
            'type'     => 'switch',
            'title'    => esc_html__( 'Show Comment Number', 'clenix' ),
            'on'       => esc_html__( 'On', 'clenix' ),
            'off'      => esc_html__( 'Off', 'clenix' ),
            'default'  => true,
        ), 
        array(
            'id'       => 'blog_cats',
            'type'     => 'switch',
            'title'    => esc_html__( 'Show Categories', 'clenix' ),
            'on'       => esc_html__( 'On', 'clenix' ),
            'off'      => esc_html__( 'Off', 'clenix' ),
            'default'  => false,
        ),		
		array(
            'id'       => 'blog_view',
            'type'     => 'switch',
            'title'    => esc_html__( 'Show Views', 'clenix' ),
            'on'       => esc_html__( 'On', 'clenix' ),
            'off'      => esc_html__( 'Off', 'clenix' ),
            'default'  => false,
        ),
		array(
            'id'       => 'blog_length',
            'type'     => 'switch',
            'title'    => esc_html__( 'Show Reading Length Active', 'clenix' ),
            'on'       => esc_html__( 'On', 'clenix' ),
            'off'      => esc_html__( 'Off', 'clenix' ),
            'default'  => false,
        ),
    )            
) 
);

// Post Settings
Redux::setSection( $opt_name, array(
    'title'            => esc_html__( 'Post Settings', 'clenix' ),
    'id'               => 'post_settings_section',
    'icon'             => 'el el-file-edit',
    'heading'          => '',
    'fields' => array(	
        array(
            'id'       => 'section-submenu-2',
            'type'     => 'section',
            'title'    => esc_html__( 'Single Post/news Layout Style', 'clenix' ),
            'indent'   => true,
        ),	
        array(
            'id'       =>'post_style',
            'type'     => 'image_select',
            'title'    => esc_html__( 'Single Post Layout', 'clenix' ),
            'default'  => 'style1',
            'options' => array(
                'style1' => array(
                    'title' => '<b>'. esc_html__( 'Layout 1', 'clenix' ) . '</b>',
                    'img' => CLENIX_IMG_URL . 'post-style-1.png',
                ),
                'style2' => array(
                    'title' => '<b>'. esc_html__( 'Layout 2', 'clenix' ) . '</b>',
                    'img' => CLENIX_IMG_URL . 'post-style-3.png',
                ),
				'style3' => array(
                    'title' => '<b>'. esc_html__( 'Layout 3', 'clenix' ) . '</b>',
                    'img' => CLENIX_IMG_URL . 'post-style-3.png',
                ),
            ),
        ),		
        array(
            'id'       => 'section-submenu-3',
            'type'     => 'section',
            'title'    => esc_html__( 'single Post info Settings', 'clenix' ),
            'indent'   => true,
        ),
        array(
            'id'       => 'post_featured_image',
            'type'     => 'switch',
            'title'    => esc_html__( 'Show Featured Image', 'clenix' ),
            'on'       => esc_html__( 'On', 'clenix' ),
            'off'      => esc_html__( 'Off', 'clenix' ),
            'default'  => true,
        ),
        array(
            'id'       => 'post_author_name',
            'type'     => 'switch',
            'title'    => esc_html__( 'Show Author Name', 'clenix' ),
            'on'       => esc_html__( 'On', 'clenix' ),
            'off'      => esc_html__( 'Off', 'clenix' ),
            'default'  => true,
        ),
        array(
            'id'       => 'post_date',
            'type'     => 'switch',
            'title'    => esc_html__( 'Show Post Date', 'clenix' ),
            'on'       => esc_html__( 'On', 'clenix' ),
            'off'      => esc_html__( 'Off', 'clenix' ),
            'default'  => true,
        ),
        array(
            'id'       => 'time_format',
            'type'     => 'select',
            'title'    => esc_html__( 'Modern', 'clenix'), 
            'subtitle' => esc_html__( 'Simple Date format', 'clenix' ),
            'options'  => array(
                'modern' => esc_html__( 'Modern', 'clenix' ),
                'none'   => esc_html__( 'None', 'clenix' ),
            ),
            'default'  => true,
        ),
        array(
            'id'       => 'post_comment_num',
            'type'     => 'switch',
            'title'    => esc_html__( 'Show Comment Number', 'clenix' ),
            'on'       => esc_html__( 'On', 'clenix' ),
            'off'      => esc_html__( 'Off', 'clenix' ),
            'default'  => true,
        ), 
        array(
            'id'       => 'post_cats',
            'type'     => 'switch',
            'title'    => esc_html__( 'Show Categories', 'clenix' ),
            'on'       => esc_html__( 'On', 'clenix' ),
            'off'      => esc_html__( 'Off', 'clenix' ),
            'default'  => true,
        ),
        array(
            'id'       => 'post_tags',
            'type'     => 'switch',
            'title'    => esc_html__( 'Show Tags', 'clenix' ),
            'on'       => esc_html__( 'On', 'clenix' ),
            'off'      => esc_html__( 'Off', 'clenix' ),
            'default'  => true,
        ),
		array(
            'id'       => 'post_share',
            'type'     => 'switch',
            'title'    => esc_html__( 'Show Share', 'clenix' ),
            'on'       => esc_html__( 'On', 'clenix' ),
            'off'      => esc_html__( 'Off', 'clenix' ),
            'default'  => true,
        ),
        array(
            'id'       => 'post_links',
            'type'     => 'switch',
            'title'    => esc_html__( 'Show Next Post / Previous post', 'clenix' ),
            'on'       => esc_html__( 'On', 'clenix' ),
            'off'      => esc_html__( 'Off', 'clenix' ),
            'default'  => true,
        ),
        array(
            'id'       => 'post_author_bio',
            'type'     => 'switch',
            'title'    => esc_html__( 'Show Author Bio', 'clenix' ),
            'on'       => esc_html__( 'On', 'clenix' ),
            'off'      => esc_html__( 'Off', 'clenix' ),
            'default'  => false,
        ),
        array(
            'id'       => 'post_view',
            'type'     => 'switch',
            'title'    => esc_html__( 'Show/hide Post View', 'clenix' ),
            'on'       => esc_html__( 'On', 'clenix' ),
            'off'      => esc_html__( 'Off', 'clenix' ),
			'subtitle' => esc_html__( 'Show or hide post views count number', 'clenix' ),
            'default'  => false,
        ),
        array(
            'id'       => 'post_length',
            'type'     => 'switch',
            'title'    => esc_html__( 'Post Reading Length Active', 'clenix' ),
            'on'       => esc_html__( 'On', 'clenix' ),
            'off'      => esc_html__( 'Off', 'clenix' ),
            'default'  => false,
        ),
        array(
            'id'       => 'section_post_related',
            'type'     => 'section',
            'title'    => esc_html__( 'Related Post Settings', 'clenix' ),
            'indent'   => true,
        ),
        array(
            'id'       => 'show_related_post',
            'type'     => 'switch',
            'title'    => esc_html__( 'Show Related product', 'clenix' ),
            'on'       => esc_html__( 'On', 'clenix' ),
            'off'      => esc_html__( 'Off', 'clenix' ),
            'default'  => false,
        ),
        array(
            'id'       => 'show_related_post_cat',
            'type'     => 'switch',
            'title'    => esc_html__( 'Show Related product Category', 'clenix' ),
            'on'       => esc_html__( 'On', 'clenix' ),
            'off'      => esc_html__( 'Off', 'clenix' ),
            'default'  => false,
        ),
        array(
            'id'       => 'show_related_post_date',
            'type'     => 'switch',
            'title'    => esc_html__( 'Show Related product Date', 'clenix' ),
            'on'       => esc_html__( 'On', 'clenix' ),
            'off'      => esc_html__( 'Off', 'clenix' ),
            'default'  => true,
        ),
		array(
			'id'       => 'show_related_post_number',
			'type'     => 'text',
			'title'    => esc_html__( 'Show Related Post Number', 'clenix' ),
			'default'  => esc_html__( '5', 'clenix' ),
		),
		array(
			'id'       => 'related_post_query',
			'type'     => 'radio',
			'title'    => esc_html__('Query Type', 'clenix'), 
			'subtitle' => esc_html__('Post Query', 'clenix'),		
			'options'  => array(
				'cat' => esc_html__( 'Posts in the same Categories', 'clenix' ), 
				'tag' => esc_html__( 'Posts in the same Tags', 'clenix' ), 
				'author' => esc_html__( 'Posts by the same Author', 'clenix' ),
			),
			'default' => 'cat'
		),
		array(
			'id'       => 'related_post_sort',
			'type'     => 'radio',
			'title'    => esc_html__('Sort Order', 'clenix'), 
			'subtitle' => esc_html__('Display post Order', 'clenix'),
			'options'  => array(
				'recent' => esc_html__( 'Recent Posts', 'clenix' ), 
				'rand' => esc_html__( 'Random Posts', 'clenix' ), 
				'modified' => esc_html__( 'Last Modified Posts', 'clenix' ),
				'popular' => esc_html__( 'Most Commented posts', 'clenix' ),
				'views' => esc_html__( 'Most Viewed posts', 'clenix' ),
			),
			'default' => 'recent'
		),
		array(
			'id'       => 'show_related_post_title_limit',
			'type'     => 'text',
			'title'    => esc_html__( 'Show Related Post Title Length', 'clenix' ),
			'default'  => esc_html__( '8', 'clenix' ),
		),
    ),
)
);

// Post Sharing Settings
Redux::setSection( $opt_name, array(
    'title'            => esc_html__( 'Post Sharing Option', 'clenix' ),
    'id'               => 'post_sharing_section',
    'icon'             => 'el el-file-edit',
    'heading'          => '',
    'fields' => array(	
        array(
            'id'       => 'section-submenu-3',
            'type'     => 'section',
            'title'    => esc_html__( 'Single Post/news Sharing Option', 'clenix' ),
            'indent'   => true,
        ),
        array(
            'id'       => 'post_share_facebook',
            'type'     => 'switch',
            'title'    => esc_html__( 'Show Facebook Share Button', 'clenix' ),
            'on'       => esc_html__( 'On', 'clenix' ),
            'off'      => esc_html__( 'Off', 'clenix' ),
            'default'  => true,
        ),
        array(
            'id'       => 'post_share_twitter',
            'type'     => 'switch',
            'title'    => esc_html__( 'Show Twitter Share Button', 'clenix' ),
            'on'       => esc_html__( 'On', 'clenix' ),
            'off'      => esc_html__( 'Off', 'clenix' ),
            'default'  => true,
        ),
        array(
            'id'       => 'post_share_google',
            'type'     => 'switch',
            'title'    => esc_html__( 'Show Google Share Button', 'clenix' ),
            'on'       => esc_html__( 'On', 'clenix' ),
            'off'      => esc_html__( 'Off', 'clenix' ),
            'default'  => true,
        ),
        array(
            'id'       => 'post_share_linkedin',
            'type'     => 'switch',
            'title'    => esc_html__( 'Show Linkedin Share Button', 'clenix' ),
            'on'       => esc_html__( 'On', 'clenix' ),
            'off'      => esc_html__( 'Off', 'clenix' ),
            'default'  => true,
        ),
        array(
            'id'       => 'post_share_whatsapp',
            'type'     => 'switch',
            'title'    => esc_html__( 'Show Whatsapp Share Button', 'clenix' ),
            'on'       => esc_html__( 'On', 'clenix' ),
            'off'      => esc_html__( 'Off', 'clenix' ),
            'default'  => true,
        ),
        array(
            'id'       => 'post_share_stumbleupon',
            'type'     => 'switch',
            'title'    => esc_html__( 'Show Stumbleupon Share Button', 'clenix' ),
            'on'       => esc_html__( 'On', 'clenix' ),
            'off'      => esc_html__( 'Off', 'clenix' ),
            'default'  => true,
        ),
        array(
            'id'       => 'post_share_tumblr',
            'type'     => 'switch',
            'title'    => esc_html__( 'Show Tumblr Share Button', 'clenix' ),
            'on'       => esc_html__( 'On', 'clenix' ),
            'off'      => esc_html__( 'Off', 'clenix' ),
            'default'  => true,
        ),
        array(
            'id'       => 'post_share_pinterest',
            'type'     => 'switch',
            'title'    => esc_html__( 'Show Pinterest Share Button', 'clenix' ),
            'on'       => esc_html__( 'On', 'clenix' ),
            'off'      => esc_html__( 'Off', 'clenix' ),
            'default'  => true,
        ),
        array(
            'id'       => 'post_share_reddit',
            'type'     => 'switch',
            'title'    => esc_html__( 'Show Reddit Share Button', 'clenix' ),
            'on'       => esc_html__( 'On', 'clenix' ),
            'off'      => esc_html__( 'Off', 'clenix' ),
            'default'  => true,
        ),
        array(
            'id'       => 'post_share_email',
            'type'     => 'switch',
            'title'    => esc_html__( 'Show Email Share Button', 'clenix' ),
            'on'       => esc_html__( 'On', 'clenix' ),
            'off'      => esc_html__( 'Off', 'clenix' ),
            'default'  => true,
        ),
        array(
            'id'       => 'post_share_print',
            'type'     => 'switch',
            'title'    => esc_html__( 'Show Print Share Button', 'clenix' ),
            'on'       => esc_html__( 'On', 'clenix' ),
            'off'      => esc_html__( 'Off', 'clenix' ),
            'default'  => true,
        ),
    ),
)
);
// Portfolio Settings
Redux::setSection( $opt_name, array(
    'title'            => esc_html__( 'Portfolio Settings', 'clenix' ),
    'id'               => 'portfolio_settings_section',
    'icon'             => 'el el-file-edit',
    'heading'          => '',
    'fields' => array(	
		array(
            'id'       => 'portfolio-section-archive-1',
            'type'     => 'section',
            'title'    => esc_html__( 'Portfolio Archive', 'clenix' ),
            'indent'   => true,
        ),
        array(
            'id'       =>'portfoli_archive_style',
            'type'     => 'image_select',
            'title'    => esc_html__( 'Portfolio Archive Layout', 'clenix' ),
            'default'  => 'style1',
            'options' => array(
                'style1' => array(
                    'title' => '<b>'. esc_html__( 'Layout 1', 'clenix' ) . '</b>',
                    'img' => CLENIX_IMG_URL . 'blog1.png',
                ),
                'style2' => array(
                    'title' => '<b>'. esc_html__( 'Layout 2', 'clenix' ) . '</b>',
                    'img' => CLENIX_IMG_URL . 'blog3.png',
                ),
			),
        ),
		array(
			'id'       => 'portfolio_arexcerpt_limit',
			'type'     => 'text',
			'title'    => esc_html__( 'Portfolio Content Limit', 'clenix' ),
			'default'  => 14,
		),
		array(
            'id'       => 'port_ar_category',
            'type'     => 'switch',
            'title'    => esc_html__( 'Show Category', 'clenix' ),
            'on'       => esc_html__( 'On', 'clenix' ),
            'off'      => esc_html__( 'Off', 'clenix' ),
            'default'  => true,
        ),
		array(
            'id'       => 'port_ar_excerpt',
            'type'     => 'switch',
            'title'    => esc_html__( 'Show Excerpt', 'clenix' ),
            'on'       => esc_html__( 'On', 'clenix' ),
            'off'      => esc_html__( 'Off', 'clenix' ),
            'default'  => false,
        ),
		array(
            'id'       => 'section-portfolio-1',
            'type'     => 'section',
            'title'    => esc_html__( 'Single Portfolio info Settings', 'clenix' ),
            'indent'   => true,
        ),
		array(
            'id'       => 'port_info_title',
            'type'     => 'switch',
            'title'    => esc_html__( 'Show Info Title', 'clenix' ),
            'on'       => esc_html__( 'On', 'clenix' ),
            'off'      => esc_html__( 'Off', 'clenix' ),
            'default'  => true,
        ),
		array(
            'id'       => 'port_info_des',
            'type'     => 'switch',
            'title'    => esc_html__( 'Show Info Descrption', 'clenix' ),
            'on'       => esc_html__( 'On', 'clenix' ),
            'off'      => esc_html__( 'Off', 'clenix' ),
            'default'  => true,
        ),
		array(
            'id'       => 'port_client',
            'type'     => 'switch',
            'title'    => esc_html__( 'Show Client', 'clenix' ),
            'on'       => esc_html__( 'On', 'clenix' ),
            'off'      => esc_html__( 'Off', 'clenix' ),
            'default'  => true,
        ),
		array(
            'id'       => 'port_start_date',
            'type'     => 'switch',
            'title'    => esc_html__( 'Start Date', 'clenix' ),
            'on'       => esc_html__( 'On', 'clenix' ),
            'off'      => esc_html__( 'Off', 'clenix' ),
            'default'  => true,
        ),
		array(
            'id'       => 'port_finish_date',
            'type'     => 'switch',
            'title'    => esc_html__( 'Finish Date', 'clenix' ),
            'on'       => esc_html__( 'On', 'clenix' ),
            'off'      => esc_html__( 'Off', 'clenix' ),
            'default'  => true,
        ),
		array(
            'id'       => 'port_website',
            'type'     => 'switch',
            'title'    => esc_html__( 'Website', 'clenix' ),
            'on'       => esc_html__( 'On', 'clenix' ),
            'off'      => esc_html__( 'Off', 'clenix' ),
            'default'  => true,
        ),
		array(
            'id'       => 'port_cats',
            'type'     => 'switch',
            'title'    => esc_html__( 'Show Categories', 'clenix' ),
            'on'       => esc_html__( 'On', 'clenix' ),
            'off'      => esc_html__( 'Off', 'clenix' ),
            'default'  => true,
        ),
        array(
            'id'       => 'port_tags',
            'type'     => 'switch',
            'title'    => esc_html__( 'Show Tags', 'clenix' ),
            'on'       => esc_html__( 'On', 'clenix' ),
            'off'      => esc_html__( 'Off', 'clenix' ),
            'default'  => false,
        ),
        array(
            'id'       => 'port_share',
            'type'     => 'switch',
            'title'    => esc_html__( 'Show Share', 'clenix' ),
            'on'       => esc_html__( 'On', 'clenix' ),
            'off'      => esc_html__( 'Off', 'clenix' ),
            'default'  => false,
        ),	
		array(
            'id'       => 'port_rating',
            'type'     => 'switch',
            'title'    => esc_html__( 'Show Rating', 'clenix' ),
            'on'       => esc_html__( 'On', 'clenix' ),
            'off'      => esc_html__( 'Off', 'clenix' ),
            'default'  => true,
        ),	
    ),
)
);
// Service Settings
Redux::setSection( $opt_name, array(
    'title'            => esc_html__( 'Service Info Settings', 'clenix' ),
    'id'               => 'service_settings_section',
    'icon'             => 'el el-file-edit',
    'heading'          => '',
    'fields' => array(
		array(
            'id'       => 'services-section-archive-1',
            'type'     => 'section',
            'title'    => esc_html__( 'Services Archive Info', 'clenix' ),
            'indent'   => true,
        ),
        array(
            'id'       =>'services_style',
            'type'     => 'image_select',
            'title'    => esc_html__( 'Services Archive Layout', 'clenix' ),
            'default'  => 'style1',
            'options' => array(
                'style1' => array(
                    'title' => '<b>'. esc_html__( 'Layout 1', 'clenix' ) . '</b>',
                    'img' => CLENIX_IMG_URL . 'blog1.png',
                ),
                'style2' => array(
                    'title' => '<b>'. esc_html__( 'Layout 2', 'clenix' ) . '</b>',
                    'img' => CLENIX_IMG_URL . 'blog3.png',
                ),
			),
        ),		
		array(
			'id'       => 'service_excerpt_limit',
			'type'     => 'text',
			'title'    => esc_html__( 'Service Content Limit', 'clenix' ),
			'default'  => 14,
		),
		array(
            'id'       => 'section-case-1',
            'type'     => 'section',
            'title'    => esc_html__( 'Single Service info', 'clenix' ),
            'indent'   => true,
        ),	
        array(
            'id'       =>'service_style',
            'type'     => 'image_select',
            'title'    => esc_html__( 'Single Service Layout', 'clenix' ),
            'default'  => 'style1',
            'options' => array(
                'style1' => array(
                    'title' => '<b>'. esc_html__( 'Layout 1', 'clenix' ) . '</b>',
                    'img' => CLENIX_IMG_URL . 'post-style-1.png',
                ),
                'style2' => array(
                    'title' => '<b>'. esc_html__( 'Layout 2', 'clenix' ) . '</b>',
                    'img' => CLENIX_IMG_URL . 'post-style-3.png',
                ),
            ),
        ),	
		array(
            'id'       => 'service_info_title',
            'type'     => 'switch',
            'title'    => esc_html__( 'Service Info Title', 'clenix' ),
            'on'       => esc_html__( 'On', 'clenix' ),
            'off'      => esc_html__( 'Off', 'clenix' ),
            'default'  => true,
        ),
		array(
            'id'       => 'service_price',
            'type'     => 'switch',
            'title'    => esc_html__( 'Service Price', 'clenix' ),
            'on'       => esc_html__( 'On', 'clenix' ),
            'off'      => esc_html__( 'Off', 'clenix' ),
            'default'  => true,
        ),
		array(
            'id'       => 'service_cleaning_hour',
            'type'     => 'switch',
            'title'    => esc_html__( 'Service Cleaning Hour', 'clenix' ),
            'on'       => esc_html__( 'On', 'clenix' ),
            'off'      => esc_html__( 'Off', 'clenix' ),
            'default'  => true,
        ),
		array(
            'id'       => 'service_no',
            'type'     => 'switch',
            'title'    => esc_html__( 'Service no', 'clenix' ),
            'on'       => esc_html__( 'On', 'clenix' ),
            'off'      => esc_html__( 'Off', 'clenix' ),
            'default'  => true,
        ),
		array(
            'id'       => 'service_visiting_hour',
            'type'     => 'switch',
            'title'    => esc_html__( 'Service Visiting Hour', 'clenix' ),
            'on'       => esc_html__( 'On', 'clenix' ),
            'off'      => esc_html__( 'Off', 'clenix' ),
            'default'  => true,
        ),
		array(
            'id'       => 'service_contact',
            'type'     => 'switch',
            'title'    => esc_html__( 'Service Contact', 'clenix' ),
            'on'       => esc_html__( 'On', 'clenix' ),
            'off'      => esc_html__( 'Off', 'clenix' ),
            'default'  => true,
        ),
		array(
            'id'       => 'service_email',
            'type'     => 'switch',
            'title'    => esc_html__( 'Service Email', 'clenix' ),
            'on'       => esc_html__( 'On', 'clenix' ),
            'off'      => esc_html__( 'Off', 'clenix' ),
            'default'  => true,
        ),
		array(
            'id'       => 'service_button',
            'type'     => 'switch',
            'title'    => esc_html__( 'Service Button', 'clenix' ),
            'on'       => esc_html__( 'On', 'clenix' ),
            'off'      => esc_html__( 'Off', 'clenix' ),
            'default'  => true,
        ),
    ),
)
);
// Error
$clenix_fields2 = array(
    array(
        'id'       => 'error_title',
        'type'     => 'text',
        'title'    => esc_html__( 'Page Title', 'clenix' ),
        'default'  => esc_html__( 'Error 404', 'clenix' ),
    ),
    array(
        'id'       => 'error_bodybg',
        'type'     => 'color',
        'transparent' => false,
        'title'    => esc_html__( 'Body Background Color', 'clenix' ),
        'default'  => '#ffffff',
    ),
    array(
        'id'       => 'error_bgimage',
        'type'     => 'media',
        'title'    => esc_html__( 'Body Background Image', 'clenix' ),
        'default'  => array(
            'url'=> CLENIX_IMG_URL . '404-bg.png'
        ),
    ),
    array(
        'id'       => 'error_bodybanner',
        'type'     => 'media',
        'title'    => esc_html__( 'Body Banner', 'clenix' ),
        'default'  => array(
            'url'=> CLENIX_IMG_URL . '404.png'
        ),
    ),
    array(
        'id'       => 'error_text1',
        'type'     => 'text',
        'title'    => esc_html__( 'Body Text 1', 'clenix' ),
        'default'  => esc_html__( 'Sorry! Page Was Not Found', 'clenix' ),
    ),
	array(
        'id'       => 'error_text2',
        'type'     => 'text',
        'title'    => esc_html__( 'Body Text 2', 'clenix' ),
        'default'  => esc_html__( 'The page you are looking is not available or has been removed. Try going to Home Page by using the button below.', 'clenix' ),
    ),
    array(
        'id'       => 'error_text1_color',
        'type'     => 'color',
        'transparent' => false,
        'title'    => esc_html__( 'Body Text 1 Color', 'clenix' ),
        'default'  => '#ffffff',
    ),
    array(
        'id'       => 'error_text2_color',
        'type'     => 'color',
        'transparent' => false,
        'title'    => esc_html__( 'Body Text 2 Color', 'clenix' ),
        'default'  => '#ffffff',
    ),
    array(
        'id'       => 'error_buttontext',
        'type'     => 'text',
        'title'    => esc_html__( 'Button Text', 'clenix' ),
        'default'  => esc_html__( 'GO HOME PAGE', 'clenix' ),
    )
);
Redux::setSection( $opt_name, array(
    'title'   => esc_html__( 'Error Page Settings', 'clenix' ),
    'id'      => 'error_srttings_section',
    'heading' => '',
    'icon'    => 'el el-error-alt',
    'fields'  => $clenix_fields2           
) 
);

if ( class_exists( 'WooCommerce' ) ) {
    // Woocommerce Settings
    Redux::setSection( $opt_name, array(
        'title'   => esc_html__( 'WooCommerce', 'clenix' ),
        'id'      => 'woo_Settings_section',
        'heading' => '',
        'icon'    => 'el el-shopping-cart',
        'fields'  => array(
            array(
                'id'       => 'wc_sec_general',
                'type'     => 'section',
                'title'    => esc_html__( 'General', 'clenix' ),
                'indent'   => true,
            ),
            array(
                'id'       => 'wc_num_product',
                'type'     => 'text',
                'title'    => esc_html__( 'Number of Products Per Page', 'clenix' ),
                'default'  => '12',
            ),
			array(
               'id'       => 'wc_num_product_shop_page',
               'type'     => 'text',
               'title'    => esc_html__( 'Number of Products on Shop Page', 'clenix' ),
               'default'  => '4',
			),
            array(
                'id'       => 'wc_product_hover',
                'type'     => 'switch',
                'title'    => esc_html__( 'Product Hover Effect', 'clenix' ),
                'on'       => esc_html__( 'Enabled', 'clenix' ),
                'off'      => esc_html__( 'Disabled', 'clenix' ),
                'default'  => true,
            ),
            array(
                'id'       => 'wc_wishlist_icon',
                'type'     => 'switch',
                'title'    => esc_html__( 'Product Add to Wishlist Icon', 'clenix' ),
                'on'       => esc_html__( 'Enabled', 'clenix' ),
                'off'      => esc_html__( 'Disabled', 'clenix' ),
                'default'  => true,
                'required' => array( 'wc_product_hover', 'equals', true )
            ),
            array(
                'id'       => 'wc_quickview_icon',
                'type'     => 'switch',
                'title'    => esc_html__( 'Product Quickview Icon', 'clenix' ),
                'on'       => esc_html__( 'Enabled', 'clenix' ),
                'off'      => esc_html__( 'Disabled', 'clenix' ),
                'default'  => true,
                'required' => array( 'wc_product_hover', 'equals', true )
            ),
            array(
                'id'       => 'wc_sec_product',
                'type'     => 'section',
                'title'    => esc_html__( 'Product Single Page', 'clenix' ),
                'indent'   => true,
            ),
            array(
                'id'       => 'wc_show_excerpt',
                'type'     => 'switch',
                'title'    => esc_html__( "Show excerpt when short description doesn't exist", 'clenix' ),
                'on'       => esc_html__( 'Enabled', 'clenix' ),
                'off'      => esc_html__( 'Disabled', 'clenix' ),
                'default'  => true,
            ),
            array(
                'id'       => 'wc_cats',
                'type'     => 'switch',
                'title'    => esc_html__( 'Categories', 'clenix' ),
                'on'       => esc_html__( 'Show', 'clenix' ),
                'off'      => esc_html__( 'Hide', 'clenix' ),
                'default'  => true,
            ),
            array(
                'id'       => 'wc_tags',
                'type'     => 'switch',
                'title'    => esc_html__( 'Tags', 'clenix' ),
                'on'       => esc_html__( 'Show', 'clenix' ),
                'off'      => esc_html__( 'Hide', 'clenix' ),
                'default'  => true,
            ),
            array(
                'id'       => 'wc_related',
                'type'     => 'switch',
                'title'    => esc_html__( 'Related Products', 'clenix' ),
                'on'       => esc_html__( 'Show', 'clenix' ),
                'off'      => esc_html__( 'Hide', 'clenix' ),
                'default'  => true,
            ),
            array(
                'id'       => 'wc_description',
                'type'     => 'switch',
                'title'    => esc_html__( 'Description Tab', 'clenix' ),
                'on'       => esc_html__( 'Show', 'clenix' ),
                'off'      => esc_html__( 'Hide', 'clenix' ),
                'default'  => true,
            ),
            array(
                'id'       => 'wc_reviews',
                'type'     => 'switch',
                'title'    => esc_html__( 'Reviews Tab', 'clenix' ),
                'on'       => esc_html__( 'Show', 'clenix' ),
                'off'      => esc_html__( 'Hide', 'clenix' ),
                'default'  => true,
            ),
            array(
                'id'       => 'wc_additional_info',
                'type'     => 'switch',
                'title'    => esc_html__( 'Additional Information Tab', 'clenix' ),
                'on'       => esc_html__( 'Show', 'clenix' ),
                'off'      => esc_html__( 'Hide', 'clenix' ),
                'default'  => true,
            ),
			array(
				'id'       => 'wc_related_title',
				'type'     => 'text',
				'title'    => esc_html__( 'Related Title', 'clenix' ),
				'default'  => esc_html__( 'Related Products', 'clenix' ),
			),
			array(
				'id'       => 'wc_related_subtitle',
				'type'     => 'textarea',
				'title'    => esc_html__( 'Related Sub Title', 'clenix' ),
				'default'  => esc_html__( 'Perspiciatis unde omnis iste natus error sit voluptatem accusantium dol oremque laudantium, totam remeaque ipsa.', 'clenix' ),
			),
            array(
                'id'       => 'wc_sec_cart',
                'type'     => 'section',
                'title'    => esc_html__( 'Cart Page', 'clenix' ),
                'indent'   => true,
            ),
            array(
                'id'       => 'wc_cross_sell',
                'type'     => 'switch',
                'title'    => esc_html__( 'Cross Sell Products', 'clenix' ),
                'on'       => esc_html__( 'Show', 'clenix' ),
                'off'      => esc_html__( 'Hide', 'clenix' ),
                'default'  => true,
            ),
        )
	) 
);
}

// -> END Fields
