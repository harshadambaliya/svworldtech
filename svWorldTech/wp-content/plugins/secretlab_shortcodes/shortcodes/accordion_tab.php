<?php
/*

*/


add_action( 'init', 'ssc_accordion_tab_params', 99 );

/**
 * Additional functions
 */
function ssc_accordion_tab_params() {
	global $kc;
	//register template folder with KingComposer
	$kc->add_map_param(
		'kc_accordion_tab', //element slug - shortcode tag name
		array(
			'name'        => 'icon_align',
			'type'        => 'dropdown',
			'label'       => esc_html__( 'Open Icon Position', 'ssc' ),
			'options'     => array(
				'right'       => esc_html__( 'Right', 'ssc' ),
				'left'       => esc_html__( 'Left', 'ssc' ),
			),
			'value'    => 'right',
		),
		20 //position of param
	);
	$kc->add_map_param(
		'kc_accordion_tab', //element slug - shortcode tag name
		array(
			'name'     => 'iconarrow',
			'label'    => __(' Icon on Overlay', 'ssc'),
			'type'     => 'icon_picker',
			'value'    => 'nat-arrow-down4',
			'description' => __(' The icon show on overlay layer.', 'ssc')
		),
		25 //position of param
	);
}


add_filter( 'kc_add_map', 'ssc_accordion_tab_filter', 0 /*priority index*/, 2 /*number of params*/ );

function ssc_accordion_tab_filter( $atts, $base ) {
	if ( $base == 'kc_accordion_tab' ) {
		$atts['live_editor'] = SSC_SHORTCODES_PATH . 'live/kc_accordion_tab.php';
	}
	return $atts;
}
