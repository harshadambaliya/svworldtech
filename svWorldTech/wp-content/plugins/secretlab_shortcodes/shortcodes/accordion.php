<?php
/*

*/


add_filter( 'kc_add_map', 'ssc_accordion_filter', 0 /*priority index*/, 2 /*number of params*/ );

function ssc_accordion_filter( $atts, $base ) {

	if ( $base == 'kc_accordion' ) {
		$css_map = array(
			array(
				"screens" => "any,1024,999,767,479",
				'Header' => array(
					array('property' => 'font-family', 'label' => 'Text Font Family', 'selector' => '.kc_accordion_header, .kc_accordion_header > a'),
					array('property' => 'font-size', 'label' => 'Text Size', 'selector' => '.kc_accordion_header, .kc_accordion_header > a'),
					array('property' => 'font-size,color,padding', 'label' => 'Icon Size,Icon Color,Icon Spacing', 'selector' => '.kc_accordion_header a i'),
					array('property' => 'text-align', 'label' => 'Text Alignment', 'selector' => '.kc_accordion_header'),
					array('property' => 'color,font-weight,text-transform', 'label' => 'Text Color,Font Weight,Text Transform', 'selector' => '.kc_accordion_header a'),
					array('property' => 'color', 'label' => 'State Icon Color', 'selector' => '.ui-icon'),
					array('property' => 'background-color', 'label' => 'Background Color', 'selector' => '.kc_accordion_header'),
					array('property' => 'background', 'selector' => '.kc_accordion_header'),
					array('property' => 'background', 'selector' => '.kc_accordion_header a'),
					array('property' => 'border', 'label' => 'Border', 'selector' => '.kc_accordion_header'),
					array('property' => 'padding', 'label' => 'Padding Wrapper', 'selector' => '.kc_accordion_header'),
					array('property' => 'padding', 'label' => 'Padding Link', 'selector' => '.kc_accordion_header a'),
					array('property' => 'margin', 'label' => 'Icon Margin', 'selector' => '.ui-accordion-header-icon i'),
					array('property' => 'border-radius', 'label' => esc_html__( 'Border Radius Wrapper', 'ssc' ), 'selector' => '.kc_accordion_header'),
					array('property' => 'border-radius', 'label' => esc_html__( 'Border Radius', 'ssc' ), 'selector' => '.kc_accordion_header a'),

				),
				'Active' => array(
					array('property' => 'color', 'label' => 'Text Color', 'selector' => '.kc-section-active .kc_accordion_header a'),
					array('property' => 'color', 'label' => 'Icon Color', 'selector' => '.kc-section-active .kc_accordion_header a i'),
					array('property' => 'color', 'label' => 'State Icon Color', 'selector' => '.kc-section-active .kc_accordion_header .ui-icon'),
					array('property' => 'background-color', 'label' => 'Background Color Wrapper', 'selector' => '.kc-section-active .kc_accordion_header'),
					array('property' => 'background-color', 'label' => 'Background Color Link', 'selector' => '.kc-section-active .kc_accordion_header a'),
					array('property' => 'border', 'label' => 'Border', 'selector' => '.kc_accordion_header'),
				),
				'Hover' => array(
					array('property' => 'color', 'label' => 'Text Color', 'selector' => '.kc_accordion_header:hover a'),
					array('property' => 'color', 'label' => 'Icon Color', 'selector' => '.kc_accordion_header:hover a i'),
					array('property' => 'color', 'label' => 'State Icon Color', 'selector' => '.kc_accordion_header:hover .ui-icon'),
					array('property' => 'background-color', 'label' => 'Background Color Wrapper', 'selector' => '.kc_accordion_header:hover'),
					array('property' => 'background-color', 'label' => 'Background Color Link', 'selector' => '.kc_accordion_header:hover a'),
					array('property' => 'border', 'label' => 'Border', 'selector' => '.kc_accordion_header'),
				),
				'Body' => array(
					array('property' => 'background-color', 'label' => 'Background Color', 'selector' => '.kc-panel-body'),
					array('property' => 'border', 'label' => 'Border', 'selector' => '.kc_accordion_content'),
					array('property' => 'padding', 'label' => 'Spacing', 'selector' => '.kc-panel-body'),
					array('property' => 'margin', 'label' => 'Margin', 'selector' => '.kc_accordion_section'),
					array('property' => 'display', 'label' => 'Display'),
					array('property' => 'border-radius', 'label' => esc_html__( 'Border Radius', 'ssc' ), 'selector' => '.kc-panel-body'),
				),


			)
		);

		$hover_css_map       = array();
		$atts['live_editor'] = SSC_SHORTCODES_PATH . 'live/kc_accordion.php';

		if ( isset( $atts['params']['global style'][0] ) ) {
			$atts['params']['global style'][0]['options'] = $css_map;

		}

	}

	return $atts;
}
