<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

if ( !class_exists( 'ClenixTheme' ) ) {

	class ClenixTheme {

		protected static $instance = null;

		// Sitewide static variables
		public static $options = null;
		public static $team_social_fields = null;

		// Template specific variables
		public static $layout = null;
		public static $sidebar = null;
		public static $tr_header = null;
		public static $top_bar = null;
		public static $header_opt = null;
		public static $footer_area = null;
		public static $copyright_area = null;
		public static $top_bar_style = null;
		public static $header_style = null;
		public static $footer_style = null;
		public static $padding_top = null;
		public static $padding_bottom = null;
		public static $has_banner = null;
		public static $has_breadcrumb = null;
		public static $bgtype = null;
		public static $bgimg = null;
		public static $bgcolor = null;
		public static $pagebgimg = null;
		public static $pagebgcolor = null;
		public static $footer_top_widget = null;

		private function __construct() {
			$this->redux_init();
			add_action( 'after_setup_theme', array( $this, 'set_redux_option' ) );
			add_action( 'after_setup_theme', array( $this, 'set_redux_compability_options' ) );
			add_action( 'init', array( $this, 'rewrite_flush_check' ) );			
		}

		public static function instance() {
			if ( null == self::$instance ) {
				self::$instance = new self;
			}
			return self::$instance;
		}

		public function redux_init() {
			add_action( 'admin_menu', array( $this, 'remove_redux_menu' ), 12 ); // Remove Redux Menu
			add_filter( 'redux/clenix/aURL_filter', '__return_empty_string' ); // Remove Redux Ads
			add_action( 'redux/page/clenix/enqueue', array( $this, 'redux_admin_style' ) );
			add_action( 'redux/loaded', array( $this, 'remove_redux_demo' ) ); // If Redux is running as a plugin, this will remove the demo notice and links

			// Flash permalink after options changed
			add_action( 'redux/options/clenix/saved', array( $this, 'flush_redux_saved' ), 10, 2 );
			add_action( 'redux/options/clenix/section/reset', array( $this, 'flush_redux_reset' ) );
			add_action( 'redux/options/clenix/reset', array( $this, 'flush_redux_reset' ) );
		}
		
		public function remove_redux_demo() {
			if ( class_exists( 'ReduxFrameworkPlugin' ) ) {
				add_filter( 'plugin_row_meta', array( $this, 'redux_remove_extra_meta' ), 12, 2 );
				remove_action( 'admin_notices', array( ReduxFrameworkPlugin::instance(), 'admin_notices' ) );
			}
		}

		public function redux_remove_extra_meta( $links, $file ){
			if ( strpos( $file, 'redux-framework.php' ) !== false ) {
				$links = array_slice( $links, 0, 3 );
			}
			return $links;
		}
		
		public function set_redux_option(){
			if ( !class_exists( 'Redux' ) ) {
				include CLENIX_INC_DIR . 'redux-data.php';
				self::$options = json_decode( $clenix_redux_data, true );
				return;
			}		
			global $clenix;
			self::$options = $clenix ? $clenix : array();

			// Prevent Redux first activation error on admin
			if ( is_admin() && count( self::$options ) < 3 ) {
				include CLENIX_INC_DIR . 'redux-data.php';
				self::$options = json_decode( $clenix_redux_data, true );
			}
		}
		
		
		 // Backward compatibility for newly added options
		public function set_redux_compability_options(){
			$new_options = array(
			'footer_shape1' => '',
			'footer_shape2' => '',
			);

			foreach ( $new_options as $key => $value ) {
				if ( !isset( self::$options[$key] ) ) {
				self::$options[$key] = $value;
				}
			}
		}

		public function remove_redux_menu() {
			remove_submenu_page('tools.php','redux-about');
		}

		public function redux_admin_style() {
			wp_enqueue_style( 'clenix-redux-admin', CLENIX_CSS_URL . 'redux-admin.css', array( 'redux-admin-css' ), CLENIX_VERSION );
		}

		// Flush rewrites
		public function flush_redux_saved( $saved_options, $changed_options ){
			if ( empty( $changed_options ) ) {
				return;
			}
			$flush = false;
			$slugs = array();
			foreach ( $slugs as $slug ) {
				if ( array_key_exists( $slug, $changed_options ) ) {
					$flush = true;
				}
			}

			if ( $flush ) {
				update_option( 'clenix_rewrite_flash', true );
			}
		}

		public function flush_redux_reset(){
			update_option( 'clenix_rewrite_flash', true );
		}

		public function rewrite_flush_check() {
			if ( get_option('clenix_rewrite_flash') == true ) {
				flush_rewrite_rules();
				update_option( 'clenix_rewrite_flash', false );
			}
		}
	}
}

ClenixTheme::instance();

// Remove Redux NewsFlash
if ( ! class_exists( 'reduxNewsflash' ) ){
	class reduxNewsflash {
		public function __construct( $parent, $params ) {}
	}
}