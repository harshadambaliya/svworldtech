<?php


add_action( 'init', 'ssc_col', 99 );

function ssc_col() {
	global $kc, $kc_pro;
	//register template folder with KingComposer
	$kc->set_template_path( SSC_SHORTCODES_PATH . 'templates/' );

	$kc->add_map_param(
		'kc_column', //element slug - shortcode tag name
		array(
			'name'    => 'ssc_col_width',
			'label'   => esc_html__( 'Column Width', 'ssc' ),
			'type'    => 'radio',
			'options' => array(
				''      => esc_html__( 'Standard', 'ssc' ),
				'right' => esc_html__( 'Full to right side', 'ssc' ),
				'left'  => esc_html__( 'Full to left side', 'ssc' ),
			),
			'value'   => '',
		),
		20
	);

	if ( $kc_pro instanceof kc_pro && 'live-editor' == $kc_pro->action ) {
		add_filter( 'kc_enqueue_styles', 'ssc_frontend_editor_styles' );
	}
}

add_filter( 'kc_add_map', 'ssc_kc_col_filter', 0 /*priority index*/, 2 /*number of params*/ );

function ssc_kc_col_filter( $atts, $base ) {


	if ( $base == 'kc_column' ) {
		if ( isset( $atts['params'] ) ) {
			array_push( $atts['params']['styling'][0]['options'][0]['Box'],
				array( 'property' => 'position', 'label' => esc_html__( 'Position', 'ssc' ), ) );
			array_push( $atts['params']['styling'][0]['options'][0]['Background'],
				array( 'property' => 'background', 'label' => esc_html__( 'Background', 'ssc' ) . ' ' . esc_html__( 'hover', 'ssc' ), 'selector' => '+:hover') );
			$atts['params']['styling'][0]['options'][0]['Inside'] = array_merge(
				$atts['params']['styling'][0]['options'][0]['Inside'],
				array(
					array('property' => 'background', 'label' => esc_html__( 'Background', 'ssc' ), 'selector' => '+ .kc-col-container'),
					array('property' => 'background', 'label' => esc_html__( 'Background', 'ssc' ) . ' ' . esc_html__( 'hover', 'ssc' ), 'selector' => '+ .kc-col-container:hover'),
				)
			);
		}

		$atts['live_editor'] = SSC_SHORTCODES_PATH . 'live/kc_column.php';
	}

	return $atts; // required
}

function ssc_frontend_editor_styles( $styles = array() ) {
	$styles['ssc-kc-front-builder'] = array(
		'src'     => str_replace( array( 'http:', 'https:' ), '', trailingslashit( SSC_URL ) ) .
		             'css/ssc_front_builder.css',
		'deps'    => '',
		'version' => '',
		'media'   => 'all',
	);

	return $styles;
}