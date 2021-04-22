<?php
/*
Plugin Name: Clenix Core
Plugin URI: https://www.radiustheme.com
Description: Clenix Core Plugin for Clenix Theme
Version: 1.3.4
Author: RadiusTheme
Author URI: https://www.radiustheme.com
*/

if ( ! defined( 'ABSPATH' ) ) exit;

if ( ! defined( 'CLENIX_CORE' ) ) {
	define( 'CLENIX_CORE',                   ( WP_DEBUG ) ? time() : '1.0' );
	define( 'CLENIX_CORE_THEME_PREFIX',      'clenix' );
	define( 'CLENIX_CORE_THEME_PREFIX_VAR',  'clenix' );
	define( 'CLENIX_CORE_CPT_PREFIX',        'clenix' );
	define( 'CLENIX_CORE_BASE_DIR',      plugin_dir_path( __FILE__ ) );
	
}

class Clenix_Core {

	public $plugin  = 'clenix-core';
	public $action  = 'clenix_theme_init';

	public function __construct() {
		$prefix = CLENIX_CORE_THEME_PREFIX_VAR;
		
		add_action( 'plugins_loaded', array( $this, 'demo_importer' ), 15 );
		add_action( 'plugins_loaded', array( $this, 'load_textdomain' ), 16 );
		add_action( 'after_setup_theme', array( $this, 'post_meta' ), 15 );
		add_action( 'after_setup_theme', array( $this, 'elementor_widgets' ) );
		add_action( $this->action,       array( $this, 'after_theme_loaded' ) );
		add_shortcode('clenix-post-single-gallery', array( $this, 'clenix_post_single_gallery' ) );
		add_shortcode('clenix-single-service-info', array( $this, 'clenix_single_service_info' ) );

		// Redux Flash permalink after options changed
		add_action( "redux/options/{$prefix}/saved", array( $this, 'flush_redux_saved' ), 10, 2 );
		add_action( "redux/options/{$prefix}/section/reset", array( $this, 'flush_redux_reset' ) );
		add_action( "redux/options/{$prefix}/reset", array( $this, 'flush_redux_reset' ) );
		add_action( 'init', array( $this, 'rewrite_flush_check' ) );
		add_action( 'redux/loaded', array( $this, 'clenix_remove_demo') );
		
		require_once 'module/rt-post-share.php';
		require_once 'module/rt-post-views.php';
		require_once 'module/rt-post-length.php';
		
		// Widgets
		require_once 'widget/about-widget.php';
		require_once 'widget/address-widget.php';
		require_once 'widget/social-widget.php';
		require_once 'widget/rt-recent-post-widget.php';
		require_once 'widget/rt-post-box.php';
		require_once 'widget/rt-post-tab.php';
		require_once 'widget/rt-feature-post.php';
		require_once 'widget/rt-open-hour-widget.php';
		require_once 'widget/search-widget.php'; // override default
		require_once 'widget/rt-product-box.php';
		require_once 'widget/rt-calltoaction-widget.php';
		
		require_once 'widget/widget-settings.php';
		require_once 'widget/rt-widget-fields.php';
	}	

	/**
	 * Removes the demo link and the notice of integrated demo from the redux-framework plugin
	*/

	public function clenix_remove_demo() {
		// Used to hide the demo mode link from the plugin page. Only used when Redux is a plugin.
		if ( class_exists( 'ReduxFrameworkPlugin' ) ) {
			remove_filter( 'plugin_row_meta', array(
				ReduxFrameworkPlugin::instance(),
				'plugin_metalinks'
				), null, 2 );

			// Used to hide the activation notice informing users of the demo panel. Only used when Redux is a plugin.
			remove_action( 'admin_notices', array( ReduxFrameworkPlugin::instance(), 'admin_notices' ) );
		}
	}

	public function demo_importer() {
		require_once 'demo-importer.php';
	}
	public function load_textdomain() {
		load_plugin_textdomain( $this->plugin , false, dirname( plugin_basename( __FILE__ ) ) . '/languages' ); 
	}
	public function post_meta(){
		if ( !did_action( $this->action ) || ! defined( 'RT_FRAMEWORK_VERSION' ) ) {
			return;
		}
		require_once 'post-meta.php';
		require_once 'post-types.php';
	}
	public function elementor_widgets(){ 
		if ( did_action( $this->action ) && did_action( 'elementor/loaded' ) ) { 
			
			require_once 'elementor/init.php';
		}
	}
	public function after_theme_loaded() {
		require_once CLENIX_CORE_BASE_DIR . 'lib/wp-svg/init.php'; // SVG support
		require_once 'widget/sidebar-generator.php'; // sidebar widget generator
	}

	public function get_base_url(){
		
		$file = dirname( dirname(__FILE__) );

		// Get correct URL and path to wp-content
		$content_url = untrailingslashit( dirname( dirname( get_stylesheet_directory_uri() ) ) );
		$content_dir = untrailingslashit( WP_CONTENT_DIR );

		// Fix path on Windows
		$file = wp_normalize_path( $file );
		$content_dir = wp_normalize_path( $content_dir );

		$url = str_replace( $content_dir, $content_url, $file );

		return $url;
			
	}
		
	// Flush rewrites
	public function flush_redux_saved( $saved_options, $changed_options ){
		if ( empty( $changed_options ) ) {
			return;
		}
		$prefix = CLENIX_CORE_THEME_PREFIX_VAR;
		$flush  = false;

		if ( $flush ) {
			update_option( "{$prefix}_rewrite_flash", true );
		}
	}

	public function flush_redux_reset(){
		$prefix = CLENIX_CORE_THEME_PREFIX_VAR;
		update_option( "{$prefix}_rewrite_flash", true );
	}

	public function rewrite_flush_check() {
		$prefix = CLENIX_CORE_THEME_PREFIX_VAR;
		if ( get_option( "{$prefix}_rewrite_flash" ) == true ) {
			flush_rewrite_rules();
			update_option( "{$prefix}_rewrite_flash", false );
		}
	}
	
	/*Post Single Shortcode*/
	public function clenix_post_single_gallery() {	
		ob_start();	
		$clenix_post_gallerys_raw = get_post_meta( get_the_ID(), 'clenix_post_gallery', true );
		$clenix_post_gallerys = explode( "," , $clenix_post_gallerys_raw );
			if ( !empty( $clenix_post_gallerys ) ) { ?>
			<div class="shortcode-slider single-post-slider">
				<div class="rt-swiper-container" data-autoplay="true" data-loop="true" data-autoplay-timeout="1000" data-space-between="10" 
						data-slides-per-view="1" data-centered-slides="false" data-r-x-small="1" data-r-small="1" data-r-medium="1" data-r-large="1" 
						data-r-x-large="1">
					<div class="swiper-wrapper">
					<?php foreach( $clenix_post_gallerys as $clenix_post_gallery ) { ?>
					<div class="swiper-slide">
						<?php echo wp_get_attachment_image( $clenix_post_gallery, 'clenix-size2', "", array( "class" => "img-responsive" ) );
						?>
					</div>
					<?php } ?>
					</div>
					<div class="swiper-button">
						<div class="swiper-button-prev"><i class="fa fa-arrow-left"></i></div>
						<div class="swiper-button-next"><i class="fa fa-arrow-right"></i></div>
					</div>
				</div>
			</div>
		<?php }  
		return ob_get_clean();
	}
	
	
	public function clenix_single_service_info() {	
		ob_start();
		$clenix_service_info_title  	= get_post_meta( get_the_ID(), 'clenix_service_info_title', true );
		$clenix_service_price  			= get_post_meta( get_the_ID(), 'clenix_service_price', true );
			$clenix_price_unit    			= get_post_meta( get_the_ID(), 'clenix_service_price_unit', true );
		$clenix_service_cleaning_hour  	= get_post_meta( get_the_ID(), 'clenix_service_cleaning_hour', true );
		$clenix_service_no  			= get_post_meta( get_the_ID(), 'clenix_service_no', true );
		$clenix_service_visiting_hour  	= get_post_meta( get_the_ID(), 'clenix_service_visiting_hour', true );
		$clenix_service_contact  		= get_post_meta( get_the_ID(), 'clenix_service_contact', true );
		$clenix_service_email  			= get_post_meta( get_the_ID(), 'clenix_service_email', true );
		$clenix_service_button  		= get_post_meta( get_the_ID(), 'clenix_service_button', true );
		$clenix_service_url  		    = get_post_meta( get_the_ID(), 'clenix_service_url', true );
		?>
		<?php if ( ( ClenixTheme::$options['service_price'] )  && !empty( $clenix_service_price ) || ( ClenixTheme::$options['service_cleaning_hour'] ) && !empty( $clenix_service_cleaning_hour ) || ( ClenixTheme::$options['service_no'] )  && !empty( $clenix_service_no ) || ( ClenixTheme::$options['service_visiting_hour'] ) && !empty( $clenix_service_visiting_hour ) || ( ClenixTheme::$options['service_contact'] ) && !empty ( $clenix_service_contact ) || ( ClenixTheme::$options['service_email'] ) && !empty ( $clenix_service_email ) ) { ?>
		<div class="rtin-service-wrap">
			<?php if ( ( ClenixTheme::$options['service_info_title'] )  && !empty( $clenix_service_info_title ) ) { ?>	
				<h3><?php echo wp_kses_post( $clenix_service_info_title );?></h3>
			<?php } ?>
			<ul class="rtin-service-info">
				<?php if ( ( ClenixTheme::$options['service_price'] )  && !empty( $clenix_service_price ) ) { ?>	
					<li><span class="rtin-label"><?php esc_html_e( 'Price', 'clenix-core' );?> :</span><?php echo esc_html( $clenix_price_unit );?><?php echo esc_html( $clenix_service_price );?></li>
				<?php } if ( ( ClenixTheme::$options['service_cleaning_hour'] ) && !empty( $clenix_service_cleaning_hour ) ) { ?>	
					<li><span class="rtin-label"><?php esc_html_e( 'Cleaning Hours', 'clenix-core' );?> :</span><?php echo esc_html( $clenix_service_cleaning_hour );?></li>
				<?php } if ( ( ClenixTheme::$options['service_no'] )  && !empty( $clenix_service_no ) ) { ?>	
					<li><span class="rtin-label"><?php esc_html_e( 'Number of Cleaners', 'clenix-core' );?> :</span><?php echo esc_html( $clenix_service_no );?></li>
				<?php } if ( ( ClenixTheme::$options['service_visiting_hour'] ) && !empty( $clenix_service_visiting_hour ) ) { ?>	
					<li><span class="rtin-label"><?php esc_html_e( 'Visiting Hours', 'clenix-core' );?> :</span><?php echo esc_html( $clenix_service_visiting_hour );?></li>
				<?php } if ( ( ClenixTheme::$options['service_contact'] ) && !empty ( $clenix_service_contact ) ) { ?>
					<li><span class="rtin-label"><?php esc_html_e( 'Contact', 'clenix-core' );?> :</span><?php echo wp_kses_post( $clenix_service_contact );?></li>
				<?php } if ( ( ClenixTheme::$options['service_email'] ) && !empty ( $clenix_service_email ) ) { ?>
					<li><span class="rtin-label"><?php esc_html_e( 'E-mail', 'clenix-core' );?> :</span><?php echo wp_kses_post( $clenix_service_email );?></li>
				<?php } ?>
			</ul>
			<?php if ( ( ClenixTheme::$options['service_button'] ) && !empty ( $clenix_service_button ) ) { ?>
			<a href="<?php echo esc_url ( $clenix_service_url ); ?>" class="service-button"><?php echo wp_kses_post( $clenix_service_button );?></a>
			<?php } ?>
		</div>
		<?php } ?>
		<?php
		return ob_get_clean();
	}
}

new Clenix_Core;