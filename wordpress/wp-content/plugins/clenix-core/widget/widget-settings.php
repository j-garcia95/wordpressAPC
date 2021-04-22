<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

add_action( 'widgets_init', 'clenix_widgets_init' );
function clenix_widgets_init() {

	// Register Custom Widgets
	register_widget( 'ClenixTheme_About_Widget' );
	register_widget( 'ClenixTheme_Address_Widget' );
	register_widget( 'ClenixTheme_Social_Widget' );
	register_widget( 'ClenixTheme_Recent_Posts_With_Image_Widget' );
	register_widget( 'ClenixTheme_Post_Box' );
	register_widget( 'ClenixTheme_Post_Tab' );
	register_widget( 'ClenixTheme_Feature_Post' );
	register_widget( 'ClenixTheme_Open_Hour_Widget' );
	register_widget( 'ClenixTheme_Product_Box' );
	register_widget( 'ClenixTheme_Call_to_Action' );
	
}