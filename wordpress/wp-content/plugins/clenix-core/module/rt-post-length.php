<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/* Post reading time */
if( !function_exists( 'clenix_reading_time' )){

	function clenix_reading_time(){
		$post_content = get_post()->post_content;
		$post_content = strip_shortcodes( $post_content );
		$post_content = strip_tags( $post_content );
		$word_count   = str_word_count( $post_content );
		$reading_time = floor( $word_count / 200 );

		if( $reading_time < 1){
			$result = esc_html ( 'Less than a minute', 'clenix-core' );
		}
		elseif( $reading_time > 60 ){
			$result = sprintf( esc_html( '%s hours read' ), floor( $reading_time / 60 ) );
		}
		else if ( $reading_time == 1 ){
			$result = esc_html( '1min read' );
		} else {
			$result = sprintf( esc_html( '%smins read' ), $reading_time );
		}

		return '<span class="meta-reading-time meta-item">'. $result .'</span> ';
	}
	
}