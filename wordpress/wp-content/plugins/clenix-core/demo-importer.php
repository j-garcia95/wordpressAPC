<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

namespace radiustheme\Clenix_Core;

use \FW_Ext_Backups_Demo;
use \WPCF7_ContactFormTemplate;

if ( ! defined( 'ABSPATH' ) ) exit;

class Demo_Importer {

	public function __construct() {
		add_filter( 'plugin_action_links_rt-demo-importer/rt-demo-importer.php', array( $this, 'add_action_links' ) ); // Link from plugins page 
		add_filter( 'rt_demo_installer_warning', array( $this, 'data_loss_warning' ) );
		add_filter( 'fw:ext:backups-demo:demos', array( $this, 'demo_config' ) );
		add_action( 'fw:ext:backups:tasks:success:id:demo-content-install', array( $this, 'after_demo_install' ) );
	}

	public function add_action_links( $links ) {
		$mylinks = array(
			'<a href="' . esc_url( admin_url( 'tools.php?page=fw-backups-demo-content' ) ) . '">'.__( 'Install Demo Contents', 'clenix-core' ).'</a>',
		);
		return array_merge( $links, $mylinks );
	}

	public function data_loss_warning( $links ) {
		$html  = '<div style="margin-top:20px;color:#f00;font-size:20px;line-height:1.3;font-weight:600;margin-bottom:40px;border-color: #f00;border-style: dashed;border-width: 1px 0;padding:10px 0;">';
		$html .= __( 'Warning: All your old data will be lost if you install One Click demo data from here, so it is suitable only for a new website.', 'clenix-core');
		$html .= '</div>';
		return $html;
	}

	public function demo_config( $demos ) {
		$demos_array = array(
			'demo1' => array(
				'title' => __( 'Home 1', 'clenix-core' ),
				'screenshot' => plugins_url( 'screenshots/screenshot1.jpg', __FILE__ ),
				'preview_link' => 'https://radiustheme.com/demo/wordpress/themes/clenix/',
			),
			'demo2' => array(
				'title' => __( 'Home 2', 'clenix-core' ),
				'screenshot' => plugins_url( 'screenshots/screenshot2.jpg', __FILE__ ),
				'preview_link' => 'https://radiustheme.com/demo/wordpress/themes/clenix/home-2/',
			),
			'demo3' => array(
				'title' => __( 'Home 3', 'clenix-core' ),
				'screenshot' => plugins_url( 'screenshots/screenshot3.jpg', __FILE__ ),
				'preview_link' => 'https://radiustheme.com/demo/wordpress/themes/clenix/home-3/',
			),
			'demo4' => array(
				'title' => __( 'Home 4', 'clenix-core' ),
				'screenshot' => plugins_url( 'screenshots/screenshot4.jpg', __FILE__ ),
				'preview_link' => 'https://radiustheme.com/demo/wordpress/themes/clenix/home-4/',
			),
			'demo5' => array(
				'title' => __( 'Home 5', 'clenix-core' ),
				'screenshot' => plugins_url( 'screenshots/screenshot5.jpg', __FILE__ ),
				'preview_link' => 'https://radiustheme.com/demo/wordpress/themes/clenix/home-5/',
			),
			'demo6' => array(
				'title' => __( 'Home 6', 'clenix-core' ),
				'screenshot' => plugins_url( 'screenshots/screenshot6.jpg', __FILE__ ),
				'preview_link' => 'https://radiustheme.com/demo/wordpress/themes/clenix/home-6/',
			),
			'demo7' => array(
				'title' => __( 'Home 1 ( OnePage )', 'clenix-core' ),
				'screenshot' => plugins_url( 'screenshots/screenshot1.jpg', __FILE__ ),
				'preview_link' => 'https://radiustheme.com/demo/wordpress/themes/clenix/home-1-one-page/',
			),
			'demo8' => array(
				'title' => __( 'Home 2 ( OnePage )', 'clenix-core' ),
				'screenshot' => plugins_url( 'screenshots/screenshot2.jpg', __FILE__ ),
				'preview_link' => 'https://radiustheme.com/demo/wordpress/themes/clenix/home-2-one-page/',
			),
			'demo9' => array(
				'title' => __( 'Home 3 ( OnePage )', 'clenix-core' ),
				'screenshot' => plugins_url( 'screenshots/screenshot3.jpg', __FILE__ ),
				'preview_link' => 'https://radiustheme.com/demo/wordpress/themes/clenix/home-3-one-page/',
			),
			'demo10' => array(
				'title' => __( 'Home 4 ( OnePage )', 'clenix-core' ),
				'screenshot' => plugins_url( 'screenshots/screenshot4.jpg', __FILE__ ),
				'preview_link' => 'https://radiustheme.com/demo/wordpress/themes/clenix/home-4-one-page/',
			),
			'demo11' => array(
				'title' => __( 'Home 5 ( OnePage )', 'clenix-core' ),
				'screenshot' => plugins_url( 'screenshots/screenshot5.jpg', __FILE__ ),
				'preview_link' => 'https://radiustheme.com/demo/wordpress/themes/clenix/home-5-one-page/',
			),
			'demo12' => array(
				'title' => __( 'Home 6 ( OnePage )', 'clenix-core' ),
				'screenshot' => plugins_url( 'screenshots/screenshot6.jpg', __FILE__ ),
				'preview_link' => 'https://radiustheme.com/demo/wordpress/themes/clenix/home-6-one-page/',
			),
		);

		$download_url = 'https://radiustheme.com/demo/wordpress/demo-content/clenix/';

		foreach ($demos_array as $id => $data) {
			$demo = new FW_Ext_Backups_Demo($id, 'piecemeal', array(
				'url' => $download_url,
				'file_id' => $id,
			));
			$demo->set_title($data['title']);
			$demo->set_screenshot($data['screenshot']);
			$demo->set_preview_link($data['preview_link']);

			$demos[ $demo->get_id() ] = $demo;

			unset($demo);
		}

		return $demos;
	}

	public function after_demo_install( $collection ){
		// Update front page id
		$demos = array(
			'demo1'  => 1368,			
			'demo2'  => 1454,			
			'demo3'  => 3351,			
			'demo4'  => 3424,			
			'demo5'  => 3654,
			'demo6'  => 3696,
			'demo7'  => 3580,
			'demo8'  => 3583,
			'demo9'  => 3615,
			'demo10'  => 3618,
			'demo11'  => 3668,
			'demo12'  => 3768,
		);

		$data = $collection->to_array();

		foreach( $data['tasks'] as $task ) {
			if( $task['id'] == 'demo:demo-download' ){
				$demo_id = $task['args']['demo_id'];
				$page_id = $demos[$demo_id];
				update_option( 'page_on_front', $page_id );
				flush_rewrite_rules();
				break;
			}
		}

		// Update contact form 7 email
		$cf7ids = array( 1262, 1303, 2876 );
		foreach ( $cf7ids as $cf7id ) {
			$mail = get_post_meta( $cf7id, '_mail', true );
			$mail['recipient'] = get_option( 'admin_email' );

			if ( class_exists( 'WPCF7_ContactFormTemplate' ) ) {
				$pattern = "/<[^@\s]*@[^@\s]*\.[^@\s]*>/"; // <email@email.com>
				$replacement = '<'. WPCF7_ContactFormTemplate::from_email().'>';
				$mail['sender'] = preg_replace($pattern, $replacement, $mail['sender']);
			}
			
			update_post_meta( $cf7id, '_mail', $mail );		
		}

		// Update WooCommerce emails
		$admin_email = get_option( 'admin_email' );
		update_option( 'woocommerce_email_from_address', $admin_email );
		update_option( 'woocommerce_stock_email_recipient', $admin_email );
	}
}

new Demo_Importer;