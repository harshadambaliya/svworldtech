<?php
add_action( 'init', 'ssc_kc_multi_icons', 99 );
function ssc_kc_multi_icons() {
	global $kc;
	//register template folder with KingComposer
	$kc->set_template_path( SSC_SHORTCODES_PATH . 'templates/' );
	$kc->add_map_param(
		'kc_multi_icons', //element slug - shortcode tag name
		array(
			'name'     => 'noref_noop',
			'label'    => esc_html__( 'Use noreferrer and noopener for links', 'ssc' ),
			'admin_label' => true,
			'type'     => 'toggle',  // USAGE TEXT TYPE
			'value'    => '', // remove this if you do not need a default content,
		),
		20 //position of param
	);
}