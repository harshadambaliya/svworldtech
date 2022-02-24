<?php

add_action( 'init', 'ssc_tab_params', 99 );

/**
 * Additional functions
 */
function ssc_tab_params() {
	global $kc;

	//register template folder with KingComposer
	$kc->set_template_path( SSC_SHORTCODES_PATH . 'templates/' );

	$kc->add_map_param(
		'kc_tab', //element slug - shortcode tag name
		array(
			'type'        	=> 'dropdown',
			'label'     	=> esc_html__( 'Image size', 'ssc' ),
			'name' 		 	=> 'adv_image_size',
			'description' 	=> esc_html__( 'Set the image size.', 'ssc' ),
//                            'value'       	=> 'full',
			'options'       => ssc_get_image_sizes(),
			'relation' => array(
				'parent'    => 'advanced',
				'show_when' => 'yes',
			),
		),
		8 //position of param
	);

	$kc->remove_map_param( 'kc_tab', 'icon_option' );
	$kc->add_map_param(
		'kc_tab', //element slug - shortcode tag name
		array(
			'name' => 'icon_option',
			'label' => __(' Use Icon?', 'kingcomposer'),
			'type' => 'radio',  // USAGE RADIO TYPE
			'options' => array(    // REQUIRED
				'' => esc_html__( 'Without Icon', 'ssc' ),
				'yes' => esc_html__( 'Icon', 'ssc' ),
				'svg' => esc_html__( 'SVG', 'ssc' ),
			),
			'description' => __(' Display an icon beside the title', 'kingcomposer'),
			'relation' => array(
				'parent' => 'advanced',
				'hide_when' => 'yes'
			)
		),
		5
	);

	$kc->add_map_param(
		'kc_tab', //element slug - shortcode tag name
		array(
			'name' 		 	=> 'svg',
			'type'        => 'attach_image',
			'label'     	=> esc_html__( 'Select SVG Icon', 'ssc' ),
			'options'       => ssc_get_image_sizes(),
			'relation' => array(
				'parent'    => 'icon_option',
				'show_when' => 'svg',
			),
		),
		6
	);

	$kc->remove_map_param( 'kc_tab', 'class' );
	$kc->add_map_param(
		'kc_tab', //element slug - shortcode tag name
		array(
			'name' => 'class',
			'label' => 'Extra Class',
			'type' => 'text'
		),
		10
	);
}

add_filter( 'kc_add_map', 'ssc_kc_tab_filter', 0 /*priority index*/, 2 /*number of params*/ );

function ssc_kc_tab_filter( $atts, $base ) {
	if ( $base == 'kc_tab' ) {
		$atts['live_editor'] = SSC_SHORTCODES_PATH . 'live/kc_tabs.php';
	}
	return $atts; // required
}

