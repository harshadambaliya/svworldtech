<?php
add_action( 'init', 'flex_row_inner', 99 );
function flex_row_inner() {

	global $kc;
	//register template folder with KingComposer
	$kc->set_template_path( plugin_dir_path( __FILE__ ) . '/templates/' );

}

add_filter( 'kc_add_map', 'ssc_kc_inner_row_filter', 0 /*priority index*/, 2 /*number of params*/ );

function ssc_kc_inner_row_filter( $atts, $base ) {

	if ( $base == 'kc_row_inner' ) {
		$css_map = array(
			array(
				'screens'                  => "any",
				'Typography'               => array(
					array( 'property' => 'color', 'label' => esc_html__( 'Color', 'ssc' ) ),
					array( 'property' => 'font-size', 'label' => esc_html__( 'Font Size', 'ssc' ) ),
					array( 'property' => 'font-weight', 'label' => esc_html__( 'Font Weight', 'ssc' ) ),
					array( 'property' => 'font-style', 'label' => esc_html__( 'Font Style', 'ssc' ) ),
					array( 'property' => 'font-family', 'label' => esc_html__( 'Font Family', 'ssc' ) ),
					array( 'property' => 'text-align', 'label' => esc_html__( 'Text Align', 'ssc' ) ),
					array( 'property' => 'text-shadow', 'label' => esc_html__( 'Text Shadow', 'ssc' ) ),
					array( 'property' => 'text-transform', 'label' => esc_html__( 'Text Transform', 'ssc' ) ),
					array( 'property' => 'text-decoration', 'label' => esc_html__( 'Text Decoration', 'ssc' ) ),
					array( 'property' => 'line-height', 'label' => esc_html__( 'Line Height', 'ssc' ) ),
					array( 'property' => 'letter-spacing', 'label' => esc_html__( 'Letter Spacing', 'ssc' ) ),
					array( 'property' => 'overflow', 'label' => esc_html__( 'Overflow', 'ssc' ) ),
					array( 'property' => 'word-break', 'label' => esc_html__( 'Word Break', 'ssc' ) ),
				),

				//Background group
				'Background'               => array(
					array( 'property' => 'background' ),
					array( 'property' => 'background', 'selector' => '+:hover' ),
				),

				//Box group
				'Box'                      => array(
					array( 'property' => 'margin', 'label' => esc_html__( 'Margin', 'ssc' ) ),
					array( 'property' => 'padding', 'label' => esc_html__( 'Padding', 'ssc' ) ),
					array( 'property' => 'border', 'label' => esc_html__( 'Border', 'ssc' ) ),
					array( 'property' => 'width', 'label' => esc_html__( 'Width', 'ssc' ) ),
					array( 'property' => 'max-width', 'label' => esc_html__( 'Max-Width', 'ssc' ) ),
					array( 'property' => 'height', 'label' => esc_html__( 'Height', 'ssc' ) ),
					array( 'property' => 'max-height', 'label' => esc_html__( 'Max Height', 'ssc' ) ),
					array( 'property' => 'border-radius', 'label' => esc_html__( 'Border Radius', 'ssc' ) ),
					array( 'property' => 'float', 'label' => esc_html__( 'Float', 'ssc' ) ),
					array( 'property' => 'display', 'label' => esc_html__( 'Display', 'ssc' ) ),
					array( 'property' => 'box-shadow', 'label' => esc_html__( 'Box Shadow', 'ssc' ) ),
					array( 'property' => 'opacity', 'label' => esc_html__( 'Opacity', 'ssc' ) ),
				),


				//Custom code css
				'Custom'                   => array(
					array(
						'property' => 'custom',
						'label'    => esc_html__( 'Custom CSS' ),
					),
				),
			),
			array(
				"screens"                  => "1024,999,767,479",
				'Typography'               => array(
					array( 'property' => 'font-size', 'label' => esc_html__( 'Font Size', 'ssc' ) ),
					array( 'property' => 'text-align', 'label' => esc_html__( 'Text Align', 'ssc' ) ),
					array( 'property' => 'line-height', 'label' => esc_html__( 'Line Height', 'ssc' ) ),
					array( 'property' => 'word-break', 'label' => esc_html__( 'Word Break', 'ssc' ) ),
					array( 'property' => 'custom', 'label' => esc_html__( 'Custom CSS', 'ssc' ) ),
				),

				//Background group
				'Background'               => array(
					array( 'property' => 'background' ),
				),

				//Box group
				'Box'                      => array(
					array( 'property' => 'width', 'label' => esc_html__( 'Width', 'ssc' ) ),
                    array( 'property' => 'max-width', 'label' => esc_html__( 'Max-Width', 'ssc' ) ),
					array( 'property' => 'margin', 'label' => esc_html__( 'Margin', 'ssc' ) ),
					array( 'property' => 'padding', 'label' => esc_html__( 'Padding', 'ssc' ) ),
					array( 'property' => 'border', 'label' => esc_html__( 'Border', 'ssc' ) ),
					array( 'property' => 'height', 'label' => esc_html__( 'Height', 'ssc' ) ),
					array( 'property' => 'border-radius', 'label' => esc_html__( 'Border Radius', 'ssc' ) ),
					array( 'property' => 'float', 'label' => esc_html__( 'Float', 'ssc' ) ),
					array( 'property' => 'display', 'label' => esc_html__( 'Display', 'ssc' ) ),
					array('property' => 'overflow', 'label' => esc_html__( 'Overflow', 'ssc' )),
				),

			),
		);

		$hover_css_map       = array(
			array(
				'screens'                  => "any",
				'Typography'               => array(
					array(
						'property' => 'color',
						'label'    => esc_html__( 'Color', 'ssc' ),
						'selector' => ':hover',
					),
					array(
						'property' => 'font-style',
						'label'    => esc_html__( 'Font Style', 'ssc' ),
						'selector' => ':hover',
					),
					array(
						'property' => 'text-shadow',
						'label'    => esc_html__( 'Text Shadow', 'ssc' ),
						'selector' => ':hover',
					),
					array(
						'property' => 'text-decoration',
						'label'    => esc_html__( 'Text Decoration', 'ssc' ),
						'selector' => ':hover',
					),
					array(
						'property' => 'overflow',
						'label'    => esc_html__( 'Overflow', 'ssc' ),
						'selector' => ':hover',
					),
				),

				//Background group
				'Background'               => array(
					array( 'property' => 'background', 'selector' => ':hover' ),
				),

				//Box group
				'Box'                      => array(
					array(
						'property' => 'border',
						'label'    => esc_html__( 'Border', 'ssc' ),
						'selector' => ':hover',
					),
					array(
						'property' => 'border-radius',
						'label'    => esc_html__( 'Border Radius', 'ssc' ),
						'selector' => ':hover',
					),
					array(
						'property' => 'box-shadow',
						'label'    => esc_html__( 'Box Shadow', 'ssc' ),
						'selector' => ':hover',
					),
					array(
						'property' => 'opacity',
						'label'    => esc_html__( 'Opacity', 'ssc' ),
						'selector' => ':hover',
					),
				),

			),
			array(
				"screens" => "1024,999,767,479",
			),
		);
		$atts['live_editor'] = SSC_SHORTCODES_PATH . 'live/kc_row_inner.php';
		if ( isset( $atts['params']['styling'][0] ) ) {
			$atts['params']['styling'][0]['value']   = '';
			$atts['params']['styling'][0]['options'] = $css_map;
			$atts['params']['hover'][0]              = array(
				'name'    => 'hover-css',
				'label'   => esc_html__( 'Hover', 'ssc' ),
				'type'    => 'css',
//					'value' => '',
				'options' => $hover_css_map,
			);
		}
	}

	return $atts; // required
}