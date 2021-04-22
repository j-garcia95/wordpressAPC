<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

add_action( 'template_redirect', 'clenix_template_vars' );
if( !function_exists( 'clenix_template_vars' ) ) {
    function clenix_template_vars() {
        // Single Pages
        if( is_single() || is_page() ) {
            $post_type = get_post_type();
            $post_id   = get_the_id();
            switch( $post_type ) {
                case 'page':
                $prefix = 'page';
                break;
                case 'post':
                $prefix = 'single_post';
                break;
				case 'clenix_service':
                $prefix = 'services';
                break;		  
                case 'clenix_portfolio':
                $prefix = 'portfolio';
                break;  
                case 'product':
                $prefix = 'product';
                break;
                default:
                $prefix = 'single_post';
                break;
            }
			
			$layout_settings    = get_post_meta( $post_id, 'clenix_layout_settings', true );
            
            ClenixTheme::$layout = ( empty( $layout_settings['clenix_layout'] ) || $layout_settings['clenix_layout']  == 'default' ) ? ClenixTheme::$options[$prefix . '_layout'] : $layout_settings['clenix_layout'];

			ClenixTheme::$sidebar = ( empty( $layout_settings['clenix_sidebar'] ) || $layout_settings['clenix_sidebar'] == 'default' ) ? ClenixTheme::$options[$prefix . '_sidebar'] : $layout_settings['clenix_sidebar'];
			
			ClenixTheme::$tr_header = ( empty( $layout_settings['clenix_tr_header'] ) || $layout_settings['clenix_tr_header'] == 'default' ) ? ClenixTheme::$options['tr_header'] : $layout_settings['clenix_tr_header'];
            
            ClenixTheme::$top_bar = ( empty( $layout_settings['clenix_top_bar'] ) || $layout_settings['clenix_top_bar'] == 'default' ) ? ClenixTheme::$options['top_bar'] : $layout_settings['clenix_top_bar'];
            
            ClenixTheme::$top_bar_style = ( empty( $layout_settings['clenix_top_bar_style'] ) || $layout_settings['clenix_top_bar_style'] == 'default' ) ? ClenixTheme::$options['top_bar_style'] : $layout_settings['clenix_top_bar_style'];
			
			ClenixTheme::$header_opt = ( empty( $layout_settings['clenix_header_opt'] ) || $layout_settings['clenix_header_opt'] == 'default' ) ? ClenixTheme::$options['header_opt'] : $layout_settings['clenix_header_opt'];
            
            ClenixTheme::$header_style = ( empty( $layout_settings['clenix_header'] ) || $layout_settings['clenix_header'] == 'default' ) ? ClenixTheme::$options['header_style'] : $layout_settings['clenix_header'];
			
            ClenixTheme::$footer_style = ( empty( $layout_settings['clenix_footer'] ) || $layout_settings['clenix_footer'] == 'default' ) ? ClenixTheme::$options['footer_style'] : $layout_settings['clenix_footer'];
			
			ClenixTheme::$footer_area = ( empty( $layout_settings['clenix_footer_area'] ) || $layout_settings['clenix_footer_area'] == 'default' ) ? ClenixTheme::$options['footer_area'] : $layout_settings['clenix_footer_area'];
						
			ClenixTheme::$copyright_area = ( empty( $layout_settings['clenix_copyright_area'] ) || $layout_settings['clenix_copyright_area'] == 'default' ) ? ClenixTheme::$options['copyright_area'] : $layout_settings['clenix_copyright_area'];
            
            $padding_top = ( empty( $layout_settings['clenix_top_padding'] ) || $layout_settings['clenix_top_padding'] == 'default' ) ? ClenixTheme::$options[$prefix . '_padding_top'] : $layout_settings['clenix_top_padding'];
			
            ClenixTheme::$padding_top = (int) $padding_top;
            
            $padding_bottom = ( empty( $layout_settings['clenix_bottom_padding'] ) || $layout_settings['clenix_bottom_padding'] == 'default' ) ? ClenixTheme::$options[$prefix . '_padding_bottom'] : $layout_settings['clenix_bottom_padding'];
			
            ClenixTheme::$padding_bottom = (int) $padding_bottom;
			
            ClenixTheme::$has_banner = ( empty( $layout_settings['clenix_banner'] ) || $layout_settings['clenix_banner'] == 'default' ) ? ClenixTheme::$options[$prefix . '_banner'] : $layout_settings['clenix_banner'];
            
            ClenixTheme::$has_breadcrumb = ( empty( $layout_settings['clenix_breadcrumb'] ) || $layout_settings['clenix_breadcrumb'] == 'default' ) ? ClenixTheme::$options[ 'breadcrumb_active'] : $layout_settings['clenix_breadcrumb'];
            
            ClenixTheme::$bgtype = ( empty( $layout_settings['clenix_banner_type'] ) || $layout_settings['clenix_banner_type'] == 'default' ) ? ClenixTheme::$options[$prefix . '_bgtype'] : $layout_settings['clenix_banner_type'];
            
            ClenixTheme::$bgcolor = empty( $layout_settings['clenix_banner_bgcolor'] ) ? ClenixTheme::$options[$prefix . '_bgcolor'] : $layout_settings['clenix_banner_bgcolor'];
			
			if( !empty( $layout_settings['clenix_banner_bgimg'] ) ) {
                $attch_url      = wp_get_attachment_image_src( $layout_settings['clenix_banner_bgimg'], 'full', true );
                ClenixTheme::$bgimg = $attch_url[0];
            } elseif( !empty( ClenixTheme::$options[$prefix . '_bgimg']['id'] ) ) {
                $attch_url      = wp_get_attachment_image_src( ClenixTheme::$options[$prefix . '_bgimg']['id'], 'full', true );
                ClenixTheme::$bgimg = $attch_url[0];
            } else {
                ClenixTheme::$bgimg = CLENIX_IMG_URL . 'banner.jpg';
            }
			
            ClenixTheme::$pagebgcolor = empty( $layout_settings['clenix_page_bgcolor'] ) ? ClenixTheme::$options[$prefix . '_page_bgcolor'] : $layout_settings['clenix_page_bgcolor'];			
            
            if( !empty( $layout_settings['clenix_page_bgimg'] ) ) {
                $attch_url      = wp_get_attachment_image_src( $layout_settings['clenix_page_bgimg'], 'full', true );
                ClenixTheme::$pagebgimg = $attch_url[0];
            } elseif( !empty( ClenixTheme::$options[$prefix . '_bgimg']['id'] ) ) {
                $attch_url      = wp_get_attachment_image_src( ClenixTheme::$options[$prefix . '_page_bgimg']['id'], 'full', true );
                ClenixTheme::$pagebgimg = $attch_url[0];
            }
        }
        
        // Blog and Archive
        elseif( is_home() || is_archive() || is_search() || is_404() ) {
            if( is_search() ) {
                $prefix = 'search';
            } else if( is_404() ) {
                $prefix                                = 'error';
                ClenixTheme::$options[$prefix . '_layout'] = 'full-width';
            } else if( function_exists( 'is_woocommerce' ) && is_woocommerce() ) {
                $prefix = 'shop';
            } else {
                $prefix = 'blog';
            }
            
            ClenixTheme::$layout         		= ClenixTheme::$options[$prefix . '_layout'];
            ClenixTheme::$tr_header      		= ClenixTheme::$options['tr_header'];
            ClenixTheme::$top_bar        		= ClenixTheme::$options['top_bar'];
            ClenixTheme::$header_opt      		= ClenixTheme::$options['header_opt'];
            ClenixTheme::$footer_area     		= ClenixTheme::$options['footer_area'];
			ClenixTheme::$copyright_area  		= ClenixTheme::$options['copyright_area'];
            ClenixTheme::$top_bar_style  		= ClenixTheme::$options['top_bar_style'];
            ClenixTheme::$header_style   		= ClenixTheme::$options['header_style'];
            ClenixTheme::$footer_style   		= ClenixTheme::$options['footer_style'];
            ClenixTheme::$padding_top    		= ClenixTheme::$options[$prefix . '_padding_top'];
            ClenixTheme::$padding_bottom 		= ClenixTheme::$options[$prefix . '_padding_bottom'];
            ClenixTheme::$has_banner     		= ClenixTheme::$options[$prefix . '_banner'];
            ClenixTheme::$has_breadcrumb 		= ClenixTheme::$options[$prefix . '_breadcrumb'];
            ClenixTheme::$bgtype         		= ClenixTheme::$options[$prefix . '_bgtype'];
            ClenixTheme::$bgcolor        		= ClenixTheme::$options[$prefix . '_bgcolor'];
			
            if( !empty( ClenixTheme::$options[$prefix . '_bgimg']['id'] ) ) {
                $attch_url      = wp_get_attachment_image_src( ClenixTheme::$options[$prefix . '_bgimg']['id'], 'full', true );
                ClenixTheme::$bgimg = $attch_url[0];
            } else {
                ClenixTheme::$bgimg = CLENIX_IMG_URL . 'banner.jpg';
            }
			
            ClenixTheme::$pagebgcolor = ClenixTheme::$options[$prefix . '_page_bgcolor'];
			
            if( !empty( ClenixTheme::$options[$prefix . '_page_bgimg']['id'] ) ) {
                $attch_url      = wp_get_attachment_image_src( ClenixTheme::$options[$prefix . '_page_bgimg']['id'], 'full', true );
                ClenixTheme::$pagebgimg = $attch_url[0];
            }
        }
    }
}

// Add body class
add_filter( 'body_class', 'clenix_body_classes' );
if( !function_exists( 'clenix_body_classes' ) ) {
    function clenix_body_classes( $classes ) {
        
        $classes[] = 'header-style-'. ClenixTheme::$header_style;		
        $classes[] = 'footer-style-'. ClenixTheme::$footer_style;

        if ( ClenixTheme::$top_bar == 1 || ClenixTheme::$top_bar == 'on' ){
            $classes[] = 'has-topbar topbar-style-'. ClenixTheme::$top_bar_style;
        }

        if ( ClenixTheme::$tr_header == 1 || ClenixTheme::$tr_header == 'on' ){
           $classes[] = 'trheader';
        }
        
        $classes[] = ( ClenixTheme::$layout == 'full-width' ) ? 'no-sidebar' : 'has-sidebar';
		
		$classes[] = ( ClenixTheme::$layout == 'left-sidebar' ) ? 'left-sidebar' : 'right-sidebar';
        
        if( isset( $_COOKIE["shopview"] ) && $_COOKIE["shopview"] == 'list' ) {
            $classes[] = 'product-list-view';
        } else {
            $classes[] = 'product-grid-view';
        }
		if ( is_singular('post') ) {
			$classes[] =  ' post-detail-' . ClenixTheme::$options['post_style'];
        }
        return $classes;
    }
}