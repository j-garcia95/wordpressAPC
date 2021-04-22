<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

namespace radiustheme\Clenix_Core;
use \RT_Posts;
use ClenixTheme;


if ( !class_exists( 'RT_Posts' ) ) {
	return;
}

$post_types = array(
	'clenix_team'       => array(
		'title'           => __( 'Team Member', 'clenix-core' ),
		'plural_title'    => __( 'Team Members', 'clenix-core' ),
		'menu_icon'       => 'dashicons-businessman',
		'labels_override' => array(
			'menu_name'   => __( 'Team', 'clenix-core' ),
		),
		'rewrite'         => ClenixTheme::$options['team_slug'],
		'supports'        => array( 'title', 'thumbnail', 'editor', 'excerpt', 'page-attributes' )
	),
	'clenix_service'  => array(
		'title'           => __( 'Service', 'clenix-core' ),
		'plural_title'    => __( 'Services', 'clenix-core' ),
		'menu_icon'       => 'dashicons-book',
		'rewrite'         => ClenixTheme::$options['service_slug'],
		'supports'        => array( 'title', 'thumbnail', 'editor', 'excerpt', 'page-attributes' ),
	),
	'clenix_portfolio'  => array(
		'title'           => __( 'Portfolio', 'clenix-core' ),
		'plural_title'    => __( 'Portfolios', 'clenix-core' ),
		'menu_icon'       => 'dashicons-book',
		'rewrite'         => ClenixTheme::$options['portfolio_slug'],
		'supports'        => array( 'title', 'thumbnail', 'editor', 'excerpt', 'page-attributes' ),
		'taxonomies' 	  => array( 'post_tag' ),
	),
	'clenix_testim'     => array(
		'title'           => __( 'Testimonial', 'clenix-core' ),
		'plural_title'    => __( 'Testimonials', 'clenix-core' ),
		'menu_icon'       => 'dashicons-awards',
		'rewrite'         => ClenixTheme::$options['testimonial_slug'],
		'supports'        => array( 'title', 'thumbnail', 'editor', 'page-attributes' )
	),
);

$taxonomies = array(
	'clenix_team_category' => array(
		'title'        => __( 'Team Category', 'clenix-core' ),
		'plural_title' => __( 'Team Categories', 'clenix-core' ),
		'post_types'   => 'clenix_team',
		'rewrite'      => array( 'slug' => ClenixTheme::$options['team_cat_slug'] ),
	),
	'clenix_service_category' => array(
		'title'        => __( 'Service Category', 'clenix-core' ),
		'plural_title' => __( 'Service Categories', 'clenix-core' ),
		'post_types'   => 'clenix_service',
		'rewrite'      => array( 'slug' => ClenixTheme::$options['service_cat_slug'] ),
	),
	'clenix_portfolio_category' => array(
		'title'        => __( 'Portfolio Category', 'clenix-core' ),
		'plural_title' => __( 'Portfolio Categories', 'clenix-core' ),
		'post_types'   => 'clenix_portfolio',
		'rewrite'      => array( 'slug' => ClenixTheme::$options['portfolio_cat_slug'] ),
	),
	'clenix_testimonial_category' => array(
		'title'        => __( 'Testimonial Category', 'clenix-core' ),
		'plural_title' => __( 'Testimonial Categories', 'clenix-core' ),
		'post_types'   => 'clenix_testim',
		'rewrite'      => array( 'slug' => ClenixTheme::$options['testim_cat_slug'] ),
	),
);

$Posts = RT_Posts::getInstance();
$Posts->add_post_types( $post_types );
$Posts->add_taxonomies( $taxonomies );