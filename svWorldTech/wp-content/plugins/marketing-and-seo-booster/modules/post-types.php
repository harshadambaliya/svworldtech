<?php

add_action( 'init', 'masb_register_post_types_to_kc', 99 );
add_action( 'init', 'masb_register_post_types', 98 );

function masb_register_post_types_to_kc() {
	global $kc;
	if ( isset( $kc ) ) {
		$kc->add_content_type( array(
			'portfolio',
			'composer_widget',
			'product',
			'modal_window',
		) );
	}
}

function masb_register_post_types() {
	global $secretlab;
	if ( isset ( $secretlab['portfolio_slug'] ) ) {
		$pslug = $secretlab['portfolio_slug'];
	} else {
		$pslug = 'portfolio';
	}
	register_post_type( 'portfolio',
		array(
			'label'               => 'Portfolio',
			'labels'              => array(
				'name'               => esc_html__( 'Portfolio', 'marketing-and-seo-booster' ),
				'singular_name'      => esc_html__( 'Portfolio', 'marketing-and-seo-booster' ),
				'add_new'            => esc_html__( 'Add New', 'marketing-and-seo-booster' ),
				'add_new_item'       => esc_html__( 'Add New Portfolio Item', 'marketing-and-seo-booster' ),
				'edit_item'          => esc_html__( 'Edit Portfolio Item', 'marketing-and-seo-booster' ),
				'new_item'           => esc_html__( 'New Portfolio Item', 'marketing-and-seo-booster' ),
				'view_item'          => esc_html__( 'View Portfolio Item', 'marketing-and-seo-booster' ),
				'search_items'       => esc_html__( 'Search Portfolio Item', 'marketing-and-seo-booster' ),
				'not_found'          => esc_html__( 'No portfolio found.', 'marketing-and-seo-booster' ),
				'not_found_in_trash' => esc_html__( 'No portfolio found in Trash.', 'marketing-and-seo-booster' ),
				'parent_item_colon'  => '',
				'menu_name'          => esc_html__( 'Portfolio', 'marketing-and-seo-booster' ),
			),
			'description'         => '',
			'public'              => true,
			'publicly_queryable'  => true,
			'exclude_from_search' => false,
			'show_ui'             => true,
			'show_in_menu'        => true,
			'show_in_admin_bar'   => true,
			'show_in_nav_menus'   => true,
			'show_in_rest'        => false,
			'rest_base'           => true,
			'menu_position'       => 27,
			'menu_icon'           => 'dashicons-portfolio',
			'hierarchical'        => true,
			'supports'            => array( 'title', 'editor', 'thumbnail', 'comments', 'revisions', 'excerpt' ),
			// 'title','editor','author','thumbnail','excerpt','trackbacks','custom-fields','comments','revisions','page-attributes','post-formats'
			'taxonomies'          => array( 'post_tag', 'category' ),
			'has_archive'         => $pslug,
			'rewrite'             => array( 'slug' => $pslug, 'with_front' => true ),
			'query_var'           => true,
		)
	);
}