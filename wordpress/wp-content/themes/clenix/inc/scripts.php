<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

use Elementor\Plugin; 


function clenix_get_maybe_rtl( $filename ){
	$file = get_template_directory_uri() . '/assets/';
	if ( is_rtl() ) {
		return $file . 'rtl-css/' . $filename;
	}
	else {
		return $file . 'css/' . $filename;
	}
}
add_action( 'wp_enqueue_scripts','clenix_enqueue_high_priority_scripts', 1500 );
function clenix_enqueue_high_priority_scripts() {
	if ( is_rtl() ) {
		wp_enqueue_style( 'rtlcss', CLENIX_CSS_URL . 'rtl.css', array(), CLENIX_VERSION );
	}
}

add_action( 'wp_enqueue_scripts', 'clenix_register_scripts', 12 );
if ( !function_exists( 'clenix_register_scripts' ) ) {
	function clenix_register_scripts(){
		wp_deregister_style( 'font-awesome' );
        wp_deregister_style( 'layerslider-font-awesome' );
        wp_deregister_style( 'yith-wcwl-font-awesome' );

		/*CSS*/
		// owl.carousel CSS
		wp_register_style( 'owl-carousel',       CLENIX_CSS_URL . 'owl.carousel.min.css', array(), CLENIX_VERSION );
		wp_register_style( 'owl-theme-default',  CLENIX_CSS_URL . 'owl.theme.default.min.css', array(), CLENIX_VERSION );		
		wp_register_style( 'magnific-popup',     clenix_get_maybe_rtl('magnific-popup.css'), array(), CLENIX_VERSION );
		// Slider
		wp_register_style( 'nivo-slider',        clenix_get_maybe_rtl('nivo-slider.min.css'), array(), CLENIX_VERSION );
		// Swiper CSS
		wp_register_style( 'swiper-slider',      clenix_get_maybe_rtl('swiper.min.css'), array(), CLENIX_VERSION );
		wp_register_style( 'multiscroll',        clenix_get_maybe_rtl('jquery.multiscroll.min.css'), array(), CLENIX_VERSION );
		wp_register_style( 'animate',        	 clenix_get_maybe_rtl('animate.min.css'), array(), CLENIX_VERSION );
		wp_register_style( 'timepicker-css',     clenix_get_maybe_rtl('jquery.timepicker.min.css'), array(), CLENIX_VERSION );
		
		// Slick CSS
		wp_register_style( 'slick',      		 clenix_get_maybe_rtl('slick.css'), array(), CLENIX_VERSION );
		wp_register_style( 'slick-theme',        clenix_get_maybe_rtl('slick-theme.css'), array(), CLENIX_VERSION );
		
		// rt-canvas-menu
		wp_register_style( 'rt-canvas-menu',     clenix_get_maybe_rtl('rt-canvas-menu.css'), '', CLENIX_VERSION );
		
		/*JS*/
		// owl.carousel.min js
		wp_register_script( 'owl-carousel',      CLENIX_JS_URL . 'owl.carousel.min.js', array( 'jquery' ), CLENIX_VERSION, true );
		// Slider
		wp_register_script( 'nivo-slider',       CLENIX_JS_URL . 'jquery.nivo.slider.min.js', array( 'jquery' ), CLENIX_VERSION, true );
		
		// Slick js
		wp_register_script( 'slick',             CLENIX_JS_URL . 'slick.min.js', array( 'jquery' ), CLENIX_VERSION, true );
		
		// counter js
		wp_register_script( 'rt-waypoints',      CLENIX_JS_URL . 'waypoints.min.js', array( 'jquery' ), CLENIX_VERSION, true );
		wp_register_script( 'counterup',         CLENIX_JS_URL . 'jquery.counterup.min.js', array( 'jquery' ), CLENIX_VERSION, true );
		wp_register_script( 'knob',         	 CLENIX_JS_URL . 'jquery.knob.js', array( 'jquery' ), CLENIX_VERSION, true );
		wp_register_script( 'appear',         	 CLENIX_JS_URL . 'jquery.appear.js', array( 'jquery' ), CLENIX_VERSION, true );
		
		// magnific popup
		wp_register_script( 'magnific-popup',    CLENIX_JS_URL . 'jquery.magnific-popup.min.js', array( 'jquery' ), CLENIX_VERSION, true );
		// rt-canvas-menu
		wp_register_script( 'rt-canvas-menu',    CLENIX_JS_URL . 'rt-canvas-menu.js', array( 'jquery' ), CLENIX_VERSION, true );
		// theia sticky
		wp_register_script( 'theia-sticky',    	 CLENIX_JS_URL . 'theia-sticky-sidebar.min.js', array( 'jquery' ), CLENIX_VERSION, true );
		// Swiper Slider
		wp_register_script( 'swiper-slider',     CLENIX_JS_URL . 'swiper.min.js', array( 'jquery' ), CLENIX_VERSION, true );
		wp_register_script( 'isotope-pkgd',      CLENIX_JS_URL . 'isotope.pkgd.min.js', array( 'jquery' ), CLENIX_VERSION, true );
		wp_register_script( 'timepicker-js',     CLENIX_JS_URL . 'jquery.timepicker.min.js', array( 'jquery' ), CLENIX_VERSION, true );
		
		// Tilt js
		wp_register_script( 'tilt',             CLENIX_JS_URL . 'tilt.jquery.js', array( 'jquery' ), CLENIX_VERSION, true );
	}
}

add_action( 'wp_enqueue_scripts', 'clenix_enqueue_scripts', 15 );
if ( !function_exists( 'clenix_enqueue_scripts' ) ) {
	function clenix_enqueue_scripts() {
		$dep = array( 'jquery' );
		/*CSS*/
		// Google fonts
		wp_enqueue_style( 'clenix-gfonts', 		ClenixTheme_Helper::fonts_url(), array(), CLENIX_VERSION );
		// Bootstrap CSS  //@rtl
		wp_enqueue_style( 'bootstrap', 			clenix_get_maybe_rtl('bootstrap.min.css'), array(), CLENIX_VERSION );
		
		// Flaticon CSS
		wp_enqueue_style( 'flaticon-clenix',    CLENIX_ASSETS_URL . 'fonts/flaticon-clenix/flaticon.css', array(), CLENIX_VERSION );
		
		elementor_scripts();
		wp_enqueue_style( 'nivo-slider' );
		//Video popup
		wp_enqueue_style( 'magnific-popup' );
		// font-awesome CSS
		wp_enqueue_style( 'font-awesome',       CLENIX_CSS_URL . 'font-awesome.min.css', array(), CLENIX_VERSION );
		// animate CSS
		wp_enqueue_style( 'animate',            clenix_get_maybe_rtl('animate.min.css'), array(), CLENIX_VERSION );	
		// Select 2 CSS
		wp_enqueue_style( 'select2',            clenix_get_maybe_rtl('select2.min.css'), array(), CLENIX_VERSION );		
		// Meanmenu CSS // @rtl
		wp_enqueue_style( 'meanmenu',     		clenix_get_maybe_rtl('meanmenu.css'), array(), CLENIX_VERSION );
		// main CSS // @rtl
		wp_enqueue_style( 'clenix-default',    	clenix_get_maybe_rtl('default.css'), array(), CLENIX_VERSION );
		// vc modules css
		wp_enqueue_style( 'clenix-elementor',   clenix_get_maybe_rtl('elementor.css'), array(), CLENIX_VERSION );
			
		// Style CSS
		wp_enqueue_style( 'clenix-style',     	clenix_get_maybe_rtl('style.css'), array(), CLENIX_VERSION );
		
		// Template Style
		wp_add_inline_style( 'clenix-style',   	clenix_template_style() );

		/*JS*/
		wp_enqueue_script( 'isotope-pkgd' );
		// bootstrap js
		wp_enqueue_script( 'popper',            CLENIX_JS_URL . 'popper.js', array( 'jquery' ), CLENIX_VERSION, true );
		// bootstrap js
		wp_enqueue_script( 'bootstrap',         CLENIX_JS_URL . 'bootstrap.min.js', array( 'jquery' ), CLENIX_VERSION, true );
		
		// Comments
		if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
			wp_enqueue_script( 'comment-reply' );
		}
		// Select2 js
		wp_enqueue_script( 'select2',           CLENIX_JS_URL . 'select2.min.js', array( 'jquery' ), CLENIX_VERSION, true );
		// Meanmenu js
		wp_enqueue_script( 'jquery-meanmenu', 	CLENIX_JS_URL . 'jquery.meanmenu.min.js', array( 'jquery' ), CLENIX_VERSION, true );		
		// Nav smooth scroll
		wp_enqueue_script( 'jquery-nav',      	CLENIX_JS_URL . 'jquery.nav.min.js', array( 'jquery' ), CLENIX_VERSION, true );
		// Countdown
		wp_enqueue_script( 'countdown',      	CLENIX_JS_URL . 'jquery.countdown.min.js', array( 'jquery' ), CLENIX_VERSION, true );
		// Cookie js
		wp_enqueue_script( 'cookie',       		CLENIX_JS_URL . 'js.cookie.min.js', array( 'jquery' ), CLENIX_VERSION, true );
		
		wp_enqueue_script( 'nivo-slider' );
		wp_enqueue_script( 'rt-canvas-menu' );
		wp_enqueue_style( 'rt-canvas-menu' );
		wp_enqueue_script( 'theia-sticky' );
		wp_enqueue_style( 'timepicker-css' );
		wp_enqueue_script( 'timepicker-js' );
		wp_enqueue_script( 'tilt' );
		
		if ( is_singular() ) {
			wp_enqueue_style( 'swiper-slider' );
			wp_enqueue_script( 'swiper-slider' );		
		}
		
		wp_enqueue_script( 'masonry' );
		wp_enqueue_script( 'clenix-main',    	CLENIX_JS_URL . 'main.js', $dep , CLENIX_VERSION, true );
		if ( !empty( ClenixTheme::$options['logo']['url'] ) ) {
			$logo = '<img class="logo-small" src="'. esc_url( empty( ClenixTheme::$options['logo']['url'] ) ? CLENIX_IMG_URL . 'logo.png' : ClenixTheme::$options['logo']['url'] ).'" />';
		} else {
			$logo = '<img class="logo-small" src="'. esc_url( CLENIX_IMG_URL . 'logo.png' ) . '" />';
		}		
		
		// localize script
		$clenix_localize_data = array(
			'stickyMenu' 	=> ClenixTheme::$options['sticky_menu'],
			'meanWidth'  	=> ClenixTheme::$options['resmenu_width'],
			'siteLogo'   	=> '<a href="' . esc_url( home_url( '/' ) ) . '" alt="' . esc_attr( get_bloginfo( 'title' ) ) . '">' . esc_html ( $logo ) . '</a>',
			'extraOffset' => ClenixTheme::$options['sticky_menu'] ? 70 : 0,
			'extraOffsetMobile' => ClenixTheme::$options['sticky_menu'] ? 52 : 0,
			'rtl' => is_rtl()?'yes':'no',
			
			// Ajax
			'ajaxURL' => admin_url('admin-ajax.php'),
			'nonce' => wp_create_nonce( 'clenix-nonce' )
		);
		wp_localize_script( 'clenix-main', 'clenixObj', $clenix_localize_data );
	}	
}

function elementor_scripts() {
	
	if ( !did_action( 'elementor/loaded' ) ) {
		return;
	}
	
	if ( \Elementor\Plugin::$instance->preview->is_preview_mode() ) {
		// do stuff for preview
		wp_enqueue_style(  'owl-carousel' );
		wp_enqueue_style(  'owl-theme-default' );
		wp_enqueue_script( 'owl-carousel' );
		
		wp_enqueue_style( 'nivo-slider' );
		wp_enqueue_script( 'nivo-slider' );
		
		wp_enqueue_style( 'timepicker-css' );
		wp_enqueue_script( 'timepicker-js' );
		
		wp_enqueue_script( 'knob' );
		wp_enqueue_script( 'appear' );
		wp_enqueue_script( 'counterup' );
		wp_enqueue_script( 'rt-waypoints' );		
		
		wp_enqueue_style(  'slick' );
		wp_enqueue_style(  'slick-theme' );
		wp_enqueue_script( 'slick' );
	} 
}

add_action( 'wp_enqueue_scripts', 'clenix_high_priority_scripts', 1500 );
if ( !function_exists( 'clenix_high_priority_scripts' ) ) {
	function clenix_high_priority_scripts() {
		// Dynamic style
		ClenixTheme_Helper::dynamic_internal_style();
	}
}

function clenix_template_style(){
	ob_start();
	$clenix_error_img = empty( ClenixTheme::$options['error_bgimage']['url'] ) ? CLENIX_IMG_URL . '404-bg.png' : ClenixTheme::$options['error_bgimage']['url'];
	?>
	.entry-banner {
		<?php if ( ClenixTheme::$bgtype == 'bgcolor' ): ?>
			background-color: <?php echo esc_html( ClenixTheme::$bgcolor );?>;
		<?php else: ?>
			background: url(<?php echo esc_url( ClenixTheme::$bgimg );?>) no-repeat scroll center center / cover;
		<?php endif; ?>
	}
	.content-area {
		padding-top: <?php echo esc_html( ClenixTheme::$padding_top );?>px; 
		padding-bottom: <?php echo esc_html( ClenixTheme::$padding_bottom );?>px;
	}
	#page {
		background-image: url( <?php echo ClenixTheme::$pagebgimg; ?> );
		background-color: <?php echo ClenixTheme::$pagebgcolor; ?>;
	}
	.single-clenix_team #page {
		background-image: none;
		background-color: transparent;
	}
	.single-clenix_team .site-main {
		background-image: url( <?php echo ClenixTheme::$pagebgimg; ?> );
		background-color: <?php echo ClenixTheme::$pagebgcolor; ?>;
	}
	
	.error-page-area {		 
		background-color: <?php echo esc_html( ClenixTheme::$options['error_bodybg'] );?>;
	}
	.error-page-area .error-page-content {		 
		background: url(<?php echo esc_url( $clenix_error_img );?>) no-repeat scroll center center / cover;
	}
	

	
	<?php
	return ob_get_clean();
}

function load_custom_wp_admin_script_gutenberg() {
	wp_enqueue_style( 'clenix-gfonts', ClenixTheme_Helper::fonts_url(), array(), CLENIX_VERSION );
	// font-awesome CSS
	wp_enqueue_style( 'font-awesome',       CLENIX_CSS_URL . 'font-awesome.min.css', array(), CLENIX_VERSION );
	// Flaticon CSS
	wp_enqueue_style( 'flaticon-clenix',    CLENIX_ASSETS_URL . 'fonts/flaticon-clenix/flaticon.css', array(), CLENIX_VERSION );
}
add_action( 'admin_enqueue_scripts', 'load_custom_wp_admin_script_gutenberg', 1 );

function load_custom_wp_admin_script() {
	wp_enqueue_style( 'clenix-admin-style',  CLENIX_CSS_URL . 'admin-style.css', false, CLENIX_VERSION );
	wp_enqueue_script( 'clenix-admin-main',  CLENIX_JS_URL . 'admin.main.js', false, CLENIX_VERSION, true );
	
}
add_action( 'admin_enqueue_scripts', 'load_custom_wp_admin_script' );


