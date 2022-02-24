<?php
add_action( 'init', 'ssc_row', 99 );
function ssc_row() {
	global $kc;
	//register template folder with KingComposer
	$kc->set_template_path( SSC_SHORTCODES_PATH . 'templates/' );
}

add_filter( 'kc_add_map', 'ssc_kc_row_map_filter', 0 /*priority index*/, 2 /*number of params*/ );

function ssc_kc_row_map_filter( $atts, $base ) {
	if ( $base == 'kc_row' ) {
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
					array( 'property' => 'height', 'label' => esc_html__( 'Height', 'ssc' ) ),
					array( 'property' => 'max-height', 'label' => esc_html__( 'Max Height', 'ssc' ) ),
					array( 'property' => 'border-radius', 'label' => esc_html__( 'Border Radius', 'ssc' ) ),
					array( 'property' => 'float', 'label' => esc_html__( 'Float', 'ssc' ) ),
					array( 'property' => 'display', 'label' => esc_html__( 'Display', 'ssc' ) ),
					array( 'property' => 'box-shadow', 'label' => esc_html__( 'Box Shadow', 'ssc' ) ),
					array( 'property' => 'opacity', 'label' => esc_html__( 'Opacity', 'ssc' ) ),
					array( 'property' => 'overflow', 'label' => esc_html__( 'Overflow', 'ssc' ) ),
					array( 'property' => 'z-index', 'label' => esc_html__( 'Z Index', 'ssc' ) ),
				),
				'SVG'    => array(
					array('property' => 'fill', 'label' => esc_html__( 'Fill', 'ssc' ) . ' SVG 1', 'selector' => ' .befbgr:nth-child(1) svg'),
					array('property' => 'fill', 'label' => esc_html__( 'Fill', 'ssc' ) . ' SVG 1 ' . esc_html__( 'Hover', 'ssc' ), 'selector' => ':hover .befbgr:nth-child(1) svg'),
					array( 'property' => 'width', 'label'    => esc_html__( 'Width SVG 1', 'ssc' ), 'selector' => '.befbgr:nth-child(1) img, .befbgr:nth-child(1) svg', ),
					array( 'property' => 'height', 'label'    => esc_html__( 'Height SVG 1', 'ssc' ), 'selector' => '.befbgr:nth-child(1) img, .befbgr:nth-child(1) svg', ),
					array( 'property' => 'text-align', 'label' => esc_html__( 'Text Align', 'ssc' ), 'selector' => '.befbgr:nth-child(1)' ),
					array( 'property' => 'box-shadow', 'label'    => esc_html__( 'Box Shadow SVG 1', 'ssc' ), 'selector' => '.befbgr:nth-child(1) img, .befbgr:nth-child(1) svg', ),
					array( 'property' => 'padding', 'label'    => esc_html__( 'Padding SVG 1', 'ssc' ), 'selector' => '.befbgr:nth-child(1)', ),
					array( 'property' => 'margin', 'label'    => esc_html__( 'Margin SVG 1', 'ssc' ), 'selector' => '.befbgr:nth-child(1) img, .befbgr:nth-child(1) svg', ),
					array( 'property' => 'opacity', 'label'    => esc_html__( 'Opacity SVG 1', 'ssc' ), 'selector' => '.befbgr:nth-child(1) img, .befbgr:nth-child(1) svg', ),
					array('property' => 'fill', 'label' => esc_html__( 'Fill', 'ssc' ) . ' SVG 2', 'selector' => ' .befbgr:nth-child(2) svg'),
					array('property' => 'fill', 'label' => esc_html__( 'Fill', 'ssc' ) . ' SVG 2 ' . esc_html__( 'Hover', 'ssc' ), 'selector' => ':hover .befbgr:nth-child(2) svg'),
					array( 'property' => 'width', 'label'    => esc_html__( 'Width SVG 2', 'ssc' ), 'selector' => '.befbgr:nth-child(2) img, .befbgr:nth-child(2) svg', ),
					array( 'property' => 'height', 'label'    => esc_html__( 'Height SVG 2', 'ssc' ), 'selector' => '.befbgr:nth-child(2) img, .befbgr:nth-child(2) svg', ),
					array( 'property' => 'text-align', 'label' => esc_html__( 'Text Align', 'ssc' ), 'selector' => '.befbgr:nth-child(2)' ),
					array( 'property' => 'box-shadow', 'label'    => esc_html__( 'Box Shadow SVG 2', 'ssc' ), 'selector' => '.befbgr:nth-child(2) img, .befbgr:nth-child(2) svg', ),
					array( 'property' => 'padding', 'label'    => esc_html__( 'Padding SVG 2', 'ssc' ), 'selector' => '.befbgr:nth-child(2)', ),
					array( 'property' => 'margin', 'label'    => esc_html__( 'Margin SVG 2', 'ssc' ), 'selector' => '.befbgr:nth-child(2) img, .befbgr:nth-child(2) svg', ),
					array( 'property' => 'opacity', 'label'    => esc_html__( 'Opacity SVG 2', 'ssc' ), 'selector' => '.befbgr:nth-child(2) img, .befbgr:nth-child(2) svg', ),
					array('property' => 'fill', 'label' => esc_html__( 'Fill', 'ssc' ) . ' SVG 3', 'selector' => ' .aftbgr:nth-child(3) svg'),
					array('property' => 'fill', 'label' => esc_html__( 'Fill', 'ssc' ) . ' SVG 3 ' . esc_html__( 'Hover', 'ssc' ), 'selector' => ':hover .aftbgr:nth-child(3) svg'),
					array( 'property' => 'width', 'label'    => esc_html__( 'Width SVG 3', 'ssc' ), 'selector' => '.aftbgr:nth-child(3) img, .aftbgr:nth-child(3) svg', ),
					array( 'property' => 'height', 'label'    => esc_html__( 'Height SVG 3', 'ssc' ), 'selector' => '.aftbgr:nth-child(3) img, .aftbgr:nth-child(3) svg', ),
					array( 'property' => 'text-align', 'label' => esc_html__( 'Text Align', 'ssc' ), 'selector' => '.aftbgr:nth-child(3)' ),
					array( 'property' => 'box-shadow', 'label'    => esc_html__( 'Box Shadow SVG 3', 'ssc' ), 'selector' => '.aftbgr:nth-child(3) img, .aftbgr:nth-child(3) svg', ),
					array( 'property' => 'padding', 'label'    => esc_html__( 'Padding SVG 3', 'ssc' ), 'selector' => '.aftbgr:nth-child(3)', ),
					array( 'property' => 'margin', 'label'    => esc_html__( 'Margin SVG 3', 'ssc' ), 'selector' => '.aftbgr:nth-child(3) img, .aftbgr:nth-child(3) svg', ),
					array( 'property' => 'opacity', 'label'    => esc_html__( 'Opacity SVG 3', 'ssc' ), 'selector' => '.aftbgr:nth-child(3) img, .aftbgr:nth-child(3) svg', ),
					array('property' => 'fill', 'label' => esc_html__( 'Fill', 'ssc' ) . ' SVG 4', 'selector' => ' .aftbgr:nth-child(4) svg'),
					array('property' => 'fill', 'label' => esc_html__( 'Fill', 'ssc' ) . ' SVG 4 ' . esc_html__( 'Hover', 'ssc' ), 'selector' => ':hover .aftbgr:nth-child(4) svg'),
					array( 'property' => 'width', 'label'    => esc_html__( 'Width SVG 4', 'ssc' ), 'selector' => '.aftbgr:nth-child(4) img, .aftbgr:nth-child(4) svg', ),
					array( 'property' => 'height', 'label'    => esc_html__( 'Height SVG 4', 'ssc' ), 'selector' => '.aftbgr:nth-child(4) img, .aftbgr:nth-child(4) svg', ),
					array( 'property' => 'text-align', 'label' => esc_html__( 'Text Align', 'ssc' ), 'selector' => '.aftbgr:nth-child(4)' ),
					array( 'property' => 'box-shadow', 'label'    => esc_html__( 'Box Shadow SVG 4', 'ssc' ), 'selector' => '.aftbgr:nth-child(4) img, .aftbgr:nth-child(4) svg', ),
					array( 'property' => 'padding', 'label'    => esc_html__( 'Padding SVG 4', 'ssc' ), 'selector' => '.aftbgr:nth-child(4)', ),
					array( 'property' => 'margin', 'label'    => esc_html__( 'Margin SVG 4', 'ssc' ), 'selector' => '.aftbgr:nth-child(4) img, .aftbgr:nth-child(4) svg', ),
					array( 'property' => 'opacity', 'label'    => esc_html__( 'Opacity SVG 4', 'ssc' ), 'selector' => '.aftbgr:nth-child(4) img, .aftbgr:nth-child(4) svg', ),
					array('property' => 'fill', 'label' => esc_html__( 'Fill', 'ssc' ) . ' SVG 5', 'selector' => ' .befbgr5 svg'),
					array('property' => 'fill', 'label' => esc_html__( 'Fill', 'ssc' ) . ' SVG 5 ' . esc_html__( 'Hover', 'ssc' ), 'selector' => ':hover .befbgr5 svg'),
					array( 'property' => 'width', 'label'    => esc_html__( 'Width SVG 5', 'ssc' ), 'selector' => '.befbgr5 img, .befbgr5 svg', ),
					array( 'property' => 'height', 'label'    => esc_html__( 'Height SVG 5', 'ssc' ), 'selector' => '.befbgr5 img, .befbgr5 svg', ),
					array( 'property' => 'text-align', 'label' => esc_html__( 'Text Align', 'ssc' ), 'selector' => '.befbgr5' ),
					array( 'property' => 'box-shadow', 'label'    => esc_html__( 'Box Shadow SVG 5', 'ssc' ), 'selector' => '.befbgr5 img, .befbgr5 svg', ),
					array( 'property' => 'padding', 'label'    => esc_html__( 'Padding SVG 5', 'ssc' ), 'selector' => '.befbgr5', ),
					array( 'property' => 'margin', 'label'    => esc_html__( 'Margin SVG 5', 'ssc' ), 'selector' => '.befbgr5 img, .befbgr5 svg', ),
					array( 'property' => 'opacity', 'label'    => esc_html__( 'Opacity SVG 5', 'ssc' ), 'selector' => '.befbgr5 img, .befbgr5 svg', ),
					array('property' => 'fill', 'label' => esc_html__( 'Fill', 'ssc' ) . ' SVG 6', 'selector' => ' .befbgr6 svg'),
					array('property' => 'fill', 'label' => esc_html__( 'Fill', 'ssc' ) . ' SVG 6 ' . esc_html__( 'Hover', 'ssc' ), 'selector' => ':hover .befbgr6 svg'),
					array( 'property' => 'width', 'label'    => esc_html__( 'Width SVG 6', 'ssc' ), 'selector' => '.befbgr6 img, .befbgr6 svg', ),
					array( 'property' => 'height', 'label'    => esc_html__( 'Height SVG 6', 'ssc' ), 'selector' => '.befbgr6 img, .befbgr6 svg', ),
					array( 'property' => 'text-align', 'label' => esc_html__( 'Text Align', 'ssc' ), 'selector' => '.befbgr6' ),
					array( 'property' => 'box-shadow', 'label'    => esc_html__( 'Box Shadow SVG 6', 'ssc' ), 'selector' => '.befbgr6 img, .befbgr6 svg', ),
					array( 'property' => 'padding', 'label'    => esc_html__( 'Padding SVG 6', 'ssc' ), 'selector' => '.befbgr6', ),
					array( 'property' => 'margin', 'label'    => esc_html__( 'Margin SVG 6', 'ssc' ), 'selector' => '.befbgr6 img, .befbgr6 svg', ),
					array( 'property' => 'opacity', 'label'    => esc_html__( 'Opacity SVG 6', 'ssc' ), 'selector' => '.befbgr6 img, .befbgr6 svg', ),
					array('property' => 'fill', 'label' => esc_html__( 'Fill', 'ssc' ) . ' SVG 7', 'selector' => ' .aftbgr7 svg'),
					array('property' => 'fill', 'label' => esc_html__( 'Fill', 'ssc' ) . ' SVG 7 ' . esc_html__( 'Hover', 'ssc' ), 'selector' => ':hover .aftbgr7 svg'),
					array( 'property' => 'width', 'label'    => esc_html__( 'Width SVG 7', 'ssc' ), 'selector' => '.aftbgr7 img, .aftbgr7 svg', ),
					array( 'property' => 'height', 'label'    => esc_html__( 'Height SVG 7', 'ssc' ), 'selector' => '.aftbgr7 img, .aftbgr7 svg', ),
					array( 'property' => 'text-align', 'label' => esc_html__( 'Text Align', 'ssc' ), 'selector' => '.aftbgr7' ),
					array( 'property' => 'box-shadow', 'label'    => esc_html__( 'Box Shadow SVG 7', 'ssc' ), 'selector' => '.aftbgr7 img, .aftbgr7 svg', ),
					array( 'property' => 'padding', 'label'    => esc_html__( 'Padding SVG 7', 'ssc' ), 'selector' => '.aftbgr7', ),
					array( 'property' => 'margin', 'label'    => esc_html__( 'Margin SVG 7', 'ssc' ), 'selector' => '.aftbgr7 img, .aftbgr7 svg', ),
					array( 'property' => 'opacity', 'label'    => esc_html__( 'Opacity SVG 7', 'ssc' ), 'selector' => '.aftbgr7 img, .aftbgr7 svg', ),
					array('property' => 'fill', 'label' => esc_html__( 'Fill', 'ssc' ) . ' SVG 8', 'selector' => ' .aftbgr8 svg'),
					array('property' => 'fill', 'label' => esc_html__( 'Fill', 'ssc' ) . ' SVG 8 ' . esc_html__( 'Hover', 'ssc' ), 'selector' => ':hover .aftbgr8 svg'),
					array( 'property' => 'width', 'label'    => esc_html__( 'Width SVG 8', 'ssc' ), 'selector' => '.aftbgr8 img, .aftbgr8 svg', ),
					array( 'property' => 'height', 'label'    => esc_html__( 'Height SVG 8', 'ssc' ), 'selector' => '.aftbgr8 img, .aftbgr8 svg', ),
					array( 'property' => 'text-align', 'label' => esc_html__( 'Text Align', 'ssc' ), 'selector' => '.aftbgr8' ),
					array( 'property' => 'box-shadow', 'label'    => esc_html__( 'Box Shadow SVG 8', 'ssc' ), 'selector' => '.aftbgr8 img, .aftbgr8 svg', ),
					array( 'property' => 'padding', 'label'    => esc_html__( 'Padding SVG 8', 'ssc' ), 'selector' => '.aftbgr8', ),
					array( 'property' => 'margin', 'label'    => esc_html__( 'Margin SVG 8', 'ssc' ), 'selector' => '.aftbgr8 img, .aftbgr8 svg', ),
					array( 'property' => 'opacity', 'label'    => esc_html__( 'Opacity SVG 8', 'ssc' ), 'selector' => '.aftbgr8 img, .aftbgr8 svg', ),
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
					array( 'property' => 'margin', 'label' => esc_html__( 'Margin', 'ssc' ) ),
					array( 'property' => 'padding', 'label' => esc_html__( 'Padding', 'ssc' ) ),
					array( 'property' => 'border', 'label' => esc_html__( 'Border', 'ssc' ) ),
					array( 'property' => 'height', 'label' => esc_html__( 'Height', 'ssc' ) ),
					array( 'property' => 'border-radius', 'label' => esc_html__( 'Border Radius', 'ssc' ) ),
					array( 'property' => 'float', 'label' => esc_html__( 'Float', 'ssc' ) ),
					array( 'property' => 'display', 'label' => esc_html__( 'Display', 'ssc' ) ),
					array('property' => 'overflow', 'label' => esc_html__( 'Overflow', 'ssc' )),
				),
				'SVG'    => array(
					array( 'property' => 'width', 'label'    => esc_html__( 'Width SVG 1', 'ssc' ), 'selector' => '.befbgr:nth-child(1) img, .befbgr:nth-child(1) svg', ),
					array( 'property' => 'height', 'label'    => esc_html__( 'Height SVG 1', 'ssc' ), 'selector' => '.befbgr:nth-child(1) img, .befbgr:nth-child(1) svg', ),
					array( 'property' => 'box-shadow', 'label'    => esc_html__( 'Box Shadow SVG 1', 'ssc' ), 'selector' => '.befbgr:nth-child(1) img, .befbgr:nth-child(1) svg', ),
					array( 'property' => 'padding', 'label'    => esc_html__( 'Padding SVG 1', 'ssc' ), 'selector' => '.befbgr:nth-child(1)', ),
					array( 'property' => 'margin', 'label'    => esc_html__( 'Margin SVG 1', 'ssc' ), 'selector' => '.befbgr:nth-child(1) img, .befbgr:nth-child(1) svg', ),
					array( 'property' => 'opacity', 'label'    => esc_html__( 'Opacity SVG 1', 'ssc' ), 'selector' => '.befbgr:nth-child(1) img, .befbgr:nth-child(1) svg', ),
					array( 'property' => 'width', 'label'    => esc_html__( 'Width SVG 2', 'ssc' ), 'selector' => '.befbgr:nth-child(2) img, .befbgr:nth-child(2) svg', ),
					array( 'property' => 'height', 'label'    => esc_html__( 'Height SVG 2', 'ssc' ), 'selector' => '.befbgr:nth-child(2) img, .befbgr:nth-child(2) svg', ),
					array( 'property' => 'box-shadow', 'label'    => esc_html__( 'Box Shadow SVG 2', 'ssc' ), 'selector' => '.befbgr:nth-child(2) img, .befbgr:nth-child(2) svg', ),
					array( 'property' => 'padding', 'label'    => esc_html__( 'Padding SVG 2', 'ssc' ), 'selector' => '.befbgr:nth-child(2)', ),
					array( 'property' => 'margin', 'label'    => esc_html__( 'Margin SVG 2', 'ssc' ), 'selector' => '.befbgr:nth-child(2) img, .befbgr:nth-child(2) svg', ),
					array( 'property' => 'opacity', 'label'    => esc_html__( 'Opacity SVG 2', 'ssc' ), 'selector' => '.befbgr:nth-child(2) img, .befbgr:nth-child(2) svg', ),
					array( 'property' => 'width', 'label'    => esc_html__( 'Width SVG 3', 'ssc' ), 'selector' => '.aftbgr:nth-child(3) img, .aftbgr:nth-child(3) svg', ),
					array( 'property' => 'height', 'label'    => esc_html__( 'Height SVG 3', 'ssc' ), 'selector' => '.aftbgr:nth-child(3) img, .aftbgr:nth-child(3) svg', ),
					array( 'property' => 'box-shadow', 'label'    => esc_html__( 'Box Shadow SVG 3', 'ssc' ), 'selector' => '.aftbgr:nth-child(3) img, .aftbgr:nth-child(3) svg', ),
					array( 'property' => 'padding', 'label'    => esc_html__( 'Padding SVG 3', 'ssc' ), 'selector' => '.aftbgr:nth-child(3)', ),
					array( 'property' => 'margin', 'label'    => esc_html__( 'Margin SVG 3', 'ssc' ), 'selector' => '.aftbgr:nth-child(3) img, .aftbgr:nth-child(3) svg', ),
					array( 'property' => 'opacity', 'label'    => esc_html__( 'Opacity SVG 3', 'ssc' ), 'selector' => '.aftbgr:nth-child(3) img, .aftbgr:nth-child(3) svg', ),
					array( 'property' => 'width', 'label'    => esc_html__( 'Width SVG 4', 'ssc' ), 'selector' => '.aftbgr:nth-child(4) img, .aftbgr:nth-child(4) svg', ),
					array( 'property' => 'height', 'label'    => esc_html__( 'Height SVG 4', 'ssc' ), 'selector' => '.aftbgr:nth-child(4) img, .aftbgr:nth-child(4) svg', ),
					array( 'property' => 'box-shadow', 'label'    => esc_html__( 'Box Shadow SVG 4', 'ssc' ), 'selector' => '.aftbgr:nth-child(4) img, .aftbgr:nth-child(4) svg', ),
					array( 'property' => 'padding', 'label'    => esc_html__( 'Padding SVG 4', 'ssc' ), 'selector' => '.aftbgr:nth-child(4)', ),
					array( 'property' => 'margin', 'label'    => esc_html__( 'Margin SVG 4', 'ssc' ), 'selector' => '.aftbgr:nth-child(4) img, .aftbgr:nth-child(4) svg', ),
					array( 'property' => 'opacity', 'label'    => esc_html__( 'Opacity SVG 4', 'ssc' ), 'selector' => '.aftbgr:nth-child(4) img, .aftbgr:nth-child(4) svg', ),
					array( 'property' => 'width', 'label'    => esc_html__( 'Width SVG 5', 'ssc' ), 'selector' => '.befbgr5 img, .befbgr5 svg', ),
					array( 'property' => 'height', 'label'    => esc_html__( 'Height SVG 5', 'ssc' ), 'selector' => '.befbgr5 img, .befbgr5 svg', ),
					array( 'property' => 'box-shadow', 'label'    => esc_html__( 'Box Shadow SVG 5', 'ssc' ), 'selector' => '.befbgr5 img, .befbgr5 svg', ),
					array( 'property' => 'padding', 'label'    => esc_html__( 'Padding SVG 5', 'ssc' ), 'selector' => '.befbgr5', ),
					array( 'property' => 'margin', 'label'    => esc_html__( 'Margin SVG 5', 'ssc' ), 'selector' => '.befbgr5 img, .befbgr5 svg', ),
					array( 'property' => 'opacity', 'label'    => esc_html__( 'Opacity SVG 5', 'ssc' ), 'selector' => '.befbgr5 img, .befbgr5 svg', ),
					array( 'property' => 'width', 'label'    => esc_html__( 'Width SVG 6', 'ssc' ), 'selector' => '.befbgr6 img, .befbgr6 svg', ),
					array( 'property' => 'height', 'label'    => esc_html__( 'Height SVG 6', 'ssc' ), 'selector' => '.befbgr6 img, .befbgr6 svg', ),
					array( 'property' => 'box-shadow', 'label'    => esc_html__( 'Box Shadow SVG 6', 'ssc' ), 'selector' => '.befbgr6 img, .befbgr6 svg', ),
					array( 'property' => 'padding', 'label'    => esc_html__( 'Padding SVG 6', 'ssc' ), 'selector' => '.befbgr6', ),
					array( 'property' => 'margin', 'label'    => esc_html__( 'Margin SVG 6', 'ssc' ), 'selector' => '.befbgr6 img, .befbgr6 svg', ),
					array( 'property' => 'opacity', 'label'    => esc_html__( 'Opacity SVG 6', 'ssc' ), 'selector' => '.befbgr6 img, .befbgr6 svg', ),
					array( 'property' => 'width', 'label'    => esc_html__( 'Width SVG 7', 'ssc' ), 'selector' => '.aftbgr7 img, .aftbgr7 svg', ),
					array( 'property' => 'height', 'label'    => esc_html__( 'Height SVG 7', 'ssc' ), 'selector' => '.aftbgr7 img, .aftbgr7 svg', ),
					array( 'property' => 'box-shadow', 'label'    => esc_html__( 'Box Shadow SVG 7', 'ssc' ), 'selector' => '.aftbgr7 img, .aftbgr7 svg', ),
					array( 'property' => 'padding', 'label'    => esc_html__( 'Padding SVG 7', 'ssc' ), 'selector' => '.aftbgr7', ),
					array( 'property' => 'margin', 'label'    => esc_html__( 'Margin SVG 7', 'ssc' ), 'selector' => '.aftbgr7 img, .aftbgr7 svg', ),
					array( 'property' => 'opacity', 'label'    => esc_html__( 'Opacity SVG 7', 'ssc' ), 'selector' => '.aftbgr7 img, .aftbgr7 svg', ),
					array( 'property' => 'width', 'label'    => esc_html__( 'Width SVG 8', 'ssc' ), 'selector' => '.aftbgr8 img, .aftbgr8 svg', ),
					array( 'property' => 'height', 'label'    => esc_html__( 'Height SVG 8', 'ssc' ), 'selector' => '.aftbgr8 img, .aftbgr8 svg', ),
					array( 'property' => 'box-shadow', 'label'    => esc_html__( 'Box Shadow SVG 8', 'ssc' ), 'selector' => '.aftbgr8 img, .aftbgr8 svg', ),
					array( 'property' => 'padding', 'label'    => esc_html__( 'Padding SVG 8', 'ssc' ), 'selector' => '.aftbgr8', ),
					array( 'property' => 'margin', 'label'    => esc_html__( 'Margin SVG 8', 'ssc' ), 'selector' => '.aftbgr8 img, .aftbgr8 svg', ),
					array( 'property' => 'opacity', 'label'    => esc_html__( 'Opacity SVG 8', 'ssc' ), 'selector' => '.aftbgr8 img, .aftbgr8 svg', ),
				),
			),
		);

		$atts['live_editor'] = SSC_SHORTCODES_PATH . 'live/kc_row.php';

		if ( isset( $atts['params'] ) ) {
			$media = array(
				array(
					'name' => 'svg1',
					'label' => esc_html__( 'Select SVG top Icon 1', 'ssc' ),
					'type' => 'attach_image',
					'admin_label' => true,
				),
				array(
					'type' => 'color_picker',
					'label' => __( 'SVG top icon 1 Color', 'ssc' ),
					'name' => 'svg_c1',
					'description' => esc_html__( 'Deprecated! Use "fill" field at the "Styling" tab instead.', 'ssc' ),
				),
				array(
					'type' => 'color_picker',
					'label' => __( 'SVG top Icon 1 Hover Color', 'ssc' ),
					'name' => 'svg_hc1',
					'description' => esc_html__( 'Deprecated! Use "fill" field at the "Styling" tab instead.', 'ssc' ),
				),
				array(
					'name' => 'img_s1',
					'type'        	=> 'dropdown',
					'label'     	=> esc_html__( 'Image top 1 size', 'ssc' ),
					'description'   => esc_html__( 'Doesn\'t make sense if you use SVG', 'ssc' ),
					'value'       	=> 'full',
					'options'       => ssc_get_image_sizes(),
				),
				array(
					'name'			=> 'anim1',
					'type'     	=> 'dropdown',
					'label'  	 	=> esc_html__( 'Animation', 'ssc' ),
					'options' 		=> ssc_get_row_bg_animations_options(),
					'value'	=> 'none'
				),
				array(
					'name' => 'svg2',
					'label' => esc_html__( 'Select SVG top Icon 2', 'ssc' ),
					'type' => 'attach_image',
					'admin_label' => true,
				),
				array(
					'type' => 'color_picker',
					'label' => __( 'SVG top icon 2 Color', 'ssc' ),
					'name' => 'svg_c2',
					'description' => esc_html__( 'Deprecated! Use "fill" field at the "Styling" tab instead.', 'ssc' ),
				),
				array(
					'type' => 'color_picker',
					'label' => __( 'SVG top icon 2 Hover Color', 'ssc' ),
					'name' => 'svg_hc2',
					'description' => esc_html__( 'Deprecated! Use "fill" field at the "Styling" tab instead.', 'ssc' ),
				),
				array(
					'name' => 'img_s2',
					'type'        	=> 'dropdown',
					'label'     	=> esc_html__( 'Image top 2 size', 'ssc' ),
					'description'   => esc_html__( 'Doesn\'t make sense if you use SVG', 'ssc' ),
					'value'       	=> 'full',
					'options'       => ssc_get_image_sizes(),
				),
				array(
					'name'			=> 'anim2',
					'type'     	=> 'dropdown',
					'label'  	 	=> esc_html__( 'Animation', 'ssc' ),
					'options' 		=> ssc_get_row_bg_animations_options(),
					'value'	=> 'none'
				),
				array(
					'name' => 'svg3',
					'label' => esc_html__( 'Select SVG bottom Icon 3', 'ssc' ),
					'type' => 'attach_image',
					'admin_label' => true,
				),
				array(
					'type' => 'color_picker',
					'label' => __( 'SVG bottom icon 3 Color', 'ssc' ),
					'name' => 'svg_c3',
					'description' => esc_html__( 'Deprecated! Use "fill" field at the "Styling" tab instead.', 'ssc' ),
				),
				array(
					'type' => 'color_picker',
					'label' => __( 'SVG bottom icon 3 Hover Color', 'ssc' ),
					'name' => 'svg_hc3',
					'description' => esc_html__( 'Deprecated! Use "fill" field at the "Styling" tab instead.', 'ssc' ),
				),
				array(
					'name' => 'img_s3',
					'type'        	=> 'dropdown',
					'label'     	=> esc_html__( 'Image 3 bottom size', 'ssc' ),
					'description'   => esc_html__( 'Doesn\'t make sense if you use SVG', 'ssc' ),
					'value'       	=> 'full',
					'options'       => ssc_get_image_sizes(),
				),
				array(
					'name'			=> 'anim3',
					'type'     	=> 'dropdown',
					'label'  	 	=> esc_html__( 'Animation', 'ssc' ),
					'options' 		=> ssc_get_row_bg_animations_options(),
					'value'	=> 'none'
				),
				array(
					'name' => 'svg4',
					'label' => esc_html__( 'Select SVG bottom Icon 4', 'ssc' ),
					'type' => 'attach_image',
					'admin_label' => true,
				),
				array(
					'type' => 'color_picker',
					'label' => __( 'SVG bottom icon 4 Color', 'ssc' ),
					'name' => 'svg_c4',
					'description' => esc_html__( 'Deprecated! Use "fill" field at the "Styling" tab instead.', 'ssc' ),
				),
				array(
					'type' => 'color_picker',
					'label' => __( 'SVG bottom icon 4 Hover Color', 'ssc' ),
					'name' => 'svg_hc4',
					'description' => esc_html__( 'Deprecated! Use "fill" field at the "Styling" tab instead.', 'ssc' ),
				),
				array(
					'name' => 'img_s4',
					'type'        	=> 'dropdown',
					'label'     	=> esc_html__( 'Image 4 bottom size', 'ssc' ),
					'description'   => esc_html__( 'Doesn\'t make sense if you use SVG', 'ssc' ),
					'value'       	=> 'full',
					'options'       => ssc_get_image_sizes(),
				),
				array(
					'name'			=> 'anim4',
					'type'     	=> 'dropdown',
					'label'  	 	=> esc_html__( 'Animation', 'ssc' ),
					'options' 		=> ssc_get_row_bg_animations_options(),
					'value'	=> 'none'
				),
				array(
					'name' => 'svg5',
					'label' => esc_html__( 'Select SVG Top Icon 5', 'ssc' ),
					'type' => 'attach_image',
					'admin_label' => true,
				),
				array(
					'type' => 'color_picker',
					'label' => __( 'SVG bottom icon 5 Color', 'ssc' ),
					'name' => 'svg_c5',
					'description' => esc_html__( 'Deprecated! Use "fill" field at the "Styling" tab instead.', 'ssc' ),
				),
				array(
					'type' => 'color_picker',
					'label' => __( 'SVG bottom icon 5 Hover Color', 'ssc' ),
					'name' => 'svg_hc5',
					'description' => esc_html__( 'Deprecated! Use "fill" field at the "Styling" tab instead.', 'ssc' ),
				),
				array(
					'name' => 'img_s5',
					'type'        	=> 'dropdown',
					'label'     	=> esc_html__( 'Image  5 size', 'ssc' ),
					'description'   => esc_html__( 'Doesn\'t make sense if you use SVG', 'ssc' ),
					'value'       	=> 'full',
					'options'       => ssc_get_image_sizes(),
				),
				array(
					'name'			=> 'anim5',
					'type'     	=> 'dropdown',
					'label'  	 	=> esc_html__( 'Animation', 'ssc' ),
					'options' 		=> ssc_get_row_bg_animations_options(),
					'value'	=> 'none'
				),
				array(
					'name' => 'svg6',
					'label' => esc_html__( 'Select SVG Top Icon 6', 'ssc' ),
					'type' => 'attach_image',
					'admin_label' => true,
				),
				array(
					'type' => 'color_picker',
					'label' => __( 'SVG bottom icon 6 Color', 'ssc' ),
					'name' => 'svg_c6',
					'description' => esc_html__( 'Deprecated! Use "fill" field at the "Styling" tab instead.', 'ssc' ),
				),
				array(
					'type' => 'color_picker',
					'label' => __( 'SVG bottom icon 6 Hover Color', 'ssc' ),
					'name' => 'svg_hc6',
					'description' => esc_html__( 'Deprecated! Use "fill" field at the "Styling" tab instead.', 'ssc' ),
				),
				array(
					'name' => 'img_s6',
					'type'        	=> 'dropdown',
					'label'     	=> esc_html__( 'Image  6 size', 'ssc' ),
					'description'   => esc_html__( 'Doesn\'t make sense if you use SVG', 'ssc' ),
					'value'       	=> 'full',
					'options'       => ssc_get_image_sizes(),
				),
				array(
					'name'			=> 'anim6',
					'type'     	=> 'dropdown',
					'label'  	 	=> esc_html__( 'Animation', 'ssc' ),
					'options' 		=> ssc_get_row_bg_animations_options(),
					'value'	=> 'none'
				),
				array(
					'name' => 'svg7',
					'label' => esc_html__( 'Select SVG bottom Icon 7', 'ssc' ),
					'type' => 'attach_image',
					'admin_label' => true,
				),
				array(
					'type' => 'color_picker',
					'label' => __( 'SVG bottom icon 7 Color', 'ssc' ),
					'name' => 'svg_c7',
					'description' => esc_html__( 'Deprecated! Use "fill" field at the "Styling" tab instead.', 'ssc' ),
				),
				array(
					'type' => 'color_picker',
					'label' => __( 'SVG bottom icon 7 Hover Color', 'ssc' ),
					'name' => 'svg_hc7',
					'description' => esc_html__( 'Deprecated! Use "fill" field at the "Styling" tab instead.', 'ssc' ),
				),
				array(
					'name' => 'img_s7',
					'type'        	=> 'dropdown',
					'label'     	=> esc_html__( 'Image 7 bottom size', 'ssc' ),
					'description'   => esc_html__( 'Doesn\'t make sense if you use SVG', 'ssc' ),
					'value'       	=> 'full',
					'options'       => ssc_get_image_sizes(),
				),
				array(
					'name'			=> 'anim7',
					'type'     	=> 'dropdown',
					'label'  	 	=> esc_html__( 'Animation', 'ssc' ),
					'options' 		=> ssc_get_row_bg_animations_options(),
					'value'	=> 'none'
				),
				array(
					'name' => 'svg8',
					'label' => esc_html__( 'Select SVG bottom Icon 8', 'ssc' ),
					'type' => 'attach_image',
					'admin_label' => true,
				),
				array(
					'type' => 'color_picker',
					'label' => __( 'SVG bottom icon 8 Color', 'ssc' ),
					'name' => 'svg_c8',
					'description' => esc_html__( 'Deprecated! Use "fill" field at the "Styling" tab instead.', 'ssc' ),
				),
				array(
					'type' => 'color_picker',
					'label' => __( 'SVG bottom icon 8 Hover Color', 'ssc' ),
					'name' => 'svg_hc8',
					'description' => esc_html__( 'Deprecated! Use "fill" field at the "Styling" tab instead.', 'ssc' ),
				),
				array(
					'name' => 'img_s8',
					'type'        	=> 'dropdown',
					'label'     	=> esc_html__( 'Image 8 bottom  size', 'ssc' ),
					'description'   => esc_html__( 'Doesn\'t make sense if you use SVG', 'ssc' ),
					'value'       	=> 'full',
					'options'       => ssc_get_image_sizes(),
				),
				array(
					'name'			=> 'anim8',
					'type'     	=> 'dropdown',
					'label'  	 	=> esc_html__( 'Animation', 'ssc' ),
					'options' 		=> ssc_get_row_bg_animations_options(),
					'value'	=> 'none'
				),

			);
			$atts['params']['svg'] = $media;
			$atts['params']['styling'][0]['options'] = $css_map;
			$particles = array(
				array(
					'name' => 'particles',
					'label' => esc_html__( 'Use particles?', 'ssc' ),
					'type' => 'toggle',
					'options' => array(
						'yes' => esc_html__( 'Yes', 'ssc' ),
						'' => esc_html__( 'No', 'ssc' ),
					),
					'value' => '',
				),
				array(
					'name' => 'particles_number_value',
					'label' => esc_html__( 'Particles number?', 'ssc' ),
					'type' => 'number_slider',  // USAGE RADIO TYPE
					'options' => array(    // REQUIRED
						'min' => 0,
						'max' => 150,
						'show_input' => true
					),
					'value' => 80,
					'relation'    => array(
						'parent'    => 'particles',
						'show_when' => array( 'yes' ),
					),
				),
				array(
					'name' => 'particles_number_density',
					'label' => esc_html__( 'Particles density', 'ssc' ),
					'type' => 'toggle',
					'options' => array(
						'yes' => esc_html__( 'Yes', 'ssc' ),
						'' => esc_html__( 'No', 'ssc' ),
					),
					'value' => '',
					'relation'    => array(
						'parent'    => 'particles',
						'show_when' => array( 'yes' ),
					),
				),
				array(
					'name' => 'particles_number_density_value_area',
					'label' => esc_html__( 'Particles density area', 'ssc' ),
					'type' => 'number_slider',  // USAGE RADIO TYPE
					'options' => array(    // REQUIRED
						'min' => 0,
						'max' => 10000,
						'show_input' => true
					),
					'value' => 800,
					'relation'    => array(
						'parent'    => 'particles_number_density',
						'show_when' => array( 'yes' ),
					),
				),
				array(
					'name' => 'particles_color_random',
					'label' => esc_html__( 'Use random colors?', 'ssc' ),
					'type' => 'toggle',
					'options' => array(
						'yes' => esc_html__( 'Yes', 'ssc' ),
						'' => esc_html__( 'No', 'ssc' ),
					),
					'value' => '',
					'relation'    => array(
						'parent'    => 'particles',
						'show_when' => array( 'yes' ),
					),
				),
//				array(
//					'name' => 'particles_color',
//					'label' => esc_html__( 'Particles color', 'ssc' ),
//					'type' => 'color_picker',
//					'value' => '#000',
//					'relation'    => array(
//						'parent'    => 'particles_color_random',
//						'show_when' => array( 'no' ),
//					),
//				),

				array(
					'type'        => 'group',
					'label'       => __( ' Particles color', 'ssc' ),
					'name'        => 'particles_colors',
					'description' => __( 'Repeat this fields to set several colors.',
						'ssc' ),
					'options'     => array( 'add_text' => __( ' Add color', 'ssc' ) ),

					'value'  => base64_encode( json_encode( array(
						"1" => array(
							"color"           => "#000",
						),


					) ) ),
					'params' => array(
						array(
							'type'        => 'color_picker',
							'label'       => esc_html__( 'Color', 'ssc' ),
							'name'        => 'color',
							'value' => '#000',
							'admin_label' => true,
//							'relation'    => array(
//								'parent'    => 'particles',
//								'show_when' => array( 'yes' ),
//							),
						),
					),
					'relation'    => array(
						'parent'    => 'particles',
						'show_when' => array( 'yes' ),
					),
				),




				array(
					'name' => 'particles_shape_type',
					'label' => esc_html__( 'Particles shape type', 'ssc' ),
					'type' => 'dropdown',
					'options'       => array(
						'circle' => esc_html__( 'Circle', 'ssc' ),
						'edge' => esc_html__( 'Edge', 'ssc' ),
						'triangle' => esc_html__( 'Triangle', 'ssc' ),
						'polygon' => esc_html__( 'Polygon', 'ssc' ),
						'star' => esc_html__( 'Star', 'ssc' ),
//						["circle", "triangle", "image"]
					),
					'value' => 'circle',
					'relation'    => array(
						'parent'    => 'particles',
						'show_when' => array( 'yes' ),
					),
				),
				array(
					'name' => 'particles_shape_stroke_width',
					'label' => esc_html__( 'Particles shape stroke width', 'ssc' ),
					'type' => 'number_slider',  // USAGE RADIO TYPE
					'options' => array(    // REQUIRED
						'min' => 0,
						'max' => 20,
						'show_input' => true
					),
					'value' => 0,
					'relation'    => array(
						'parent'    => 'particles',
						'show_when' => array( 'yes' ),
					),
				),
				array(
					'name' => 'particles_stroke_shape_color',
					'label' => esc_html__( 'Particles stroke shape color', 'ssc' ),
					'type' => 'color_picker',
					'value' => '#000',
					'relation'    => array(
						'parent'    => 'particles',
						'show_when' => array( 'yes' ),
					),
				),
				array(
					'name' => 'particles_shape_polygon',
					'label' => esc_html__( 'Particles shape polygon', 'ssc' ),
					'type' => 'number_slider',  // USAGE RADIO TYPE
					'options' => array(    // REQUIRED
						'min' => 0,
						'max' => 12,
						'show_input' => true
					),
					'value' => 5,
					'relation'    => array(
						'parent'    => 'particles',
						'show_when' => array( 'yes' ),
					),
				),
				array(
					'name' => 'particles_opacity',
					'label' => esc_html__( 'Particles opacity', 'ssc' ),
					'type' => 'number_slider',  // USAGE RADIO TYPE
					'options' => array(    // REQUIRED
						'min' => 0,
						'max' => 100,
						'show_input' => true
					),
					'value' => 50,
					'relation'    => array(
						'parent'    => 'particles',
						'show_when' => array( 'yes' ),
					),
				),
				array(
					'name' => 'particles_opacity_random',
					'label' => esc_html__( 'Use particles random opacity', 'ssc' ),
					'type' => 'toggle',
					'options' => array(
						'yes' => esc_html__( 'Yes', 'ssc' ),
						'' => esc_html__( 'No', 'ssc' ),
					),
					'value' => '',
					'relation'    => array(
						'parent'    => 'particles',
						'show_when' => array( 'yes' ),
					),
				),
				array(
					'name' => 'particles_size',
					'label' => esc_html__( 'Particles size', 'ssc' ),
					'type' => 'number_slider',  // USAGE RADIO TYPE
					'options' => array(    // REQUIRED
						'min' => 0,
						'max' => 50,
						'show_input' => true
					),
					'value' => 3,
					'relation'    => array(
						'parent'    => 'particles',
						'show_when' => array( 'yes' ),
					),
				),
				array(
					'name' => 'particles_random',
					'label' => esc_html__( 'Use particles random size', 'ssc' ),
					'type' => 'toggle',
					'options' => array(
						'yes' => esc_html__( 'Yes', 'ssc' ),
						'' => esc_html__( 'No', 'ssc' ),
					),
					'value' => 'yes',
					'relation'    => array(
						'parent'    => 'particles',
						'show_when' => array( 'yes' ),
					),
				),
				array(
					'name' => 'particles_line',
					'label' => esc_html__( 'Use particles link line', 'ssc' ),
					'type' => 'toggle',
					'options' => array(
						'yes' => esc_html__( 'Yes', 'ssc' ),
						'' => esc_html__( 'No', 'ssc' ),
					),
					'value' => 'yes',
					'relation'    => array(
						'parent'    => 'particles',
						'show_when' => array( 'yes' ),
					),
				),
				array(
					'name' => 'particles_line_distance',
					'label' => esc_html__( 'Particles link line distance', 'ssc' ),
					'type' => 'number_slider',  // USAGE RADIO TYPE
					'options' => array(    // REQUIRED
						'min' => 0,
						'max' => 300,
						'show_input' => true
					),
					'value' => 150,
					'relation'    => array(
						'parent'    => 'particles_line',
						'show_when' => array( 'yes' ),
					),
				),
				array(
					'name' => 'particles_line_color',
					'label' => esc_html__( 'Particles link line color', 'ssc' ),
					'type' => 'color_picker',
					'value' => '#000',
					'relation'    => array(
						'parent'    => 'particles_line',
						'show_when' => array( 'yes' ),
					),
				),
				array(
					'name' => 'particles_line_opacity',
					'label' => esc_html__( 'Particles link line opacity', 'ssc' ),
					'type' => 'number_slider',  // USAGE RADIO TYPE
					'options' => array(    // REQUIRED
						'min' => 0,
						'max' => 100,
						'show_input' => true
					),
					'value' => 50,
					'relation'    => array(
						'parent'    => 'particles_line',
						'show_when' => array( 'yes' ),
					),
				),
				array(
					'name' => 'particles_line_width',
					'label' => esc_html__( 'Particles link line width', 'ssc' ),
					'type' => 'number_slider',  // USAGE RADIO TYPE
					'options' => array(    // REQUIRED
						'min' => 0,
						'max' => 3,
						'show_input' => true
					),
					'value' => 1,
					'relation'    => array(
						'parent'    => 'particles_line',
						'show_when' => array( 'yes' ),
					),
				),
				array(
					'name' => 'particles_move',
					'label' => esc_html__( 'Particles move', 'ssc' ),
					'type' => 'toggle',
					'options' => array(
						'yes' => esc_html__( 'Yes', 'ssc' ),
						'' => esc_html__( 'No', 'ssc' ),
					),
					'value' => 'yes',
					'relation'    => array(
						'parent'    => 'particles',
						'show_when' => array( 'yes' ),
					),
				),
				array(
					'name' => 'particles_move_speed',
					'label' => esc_html__( 'Particles move speed', 'ssc' ),
					'type' => 'number_slider',  // USAGE RADIO TYPE
					'options' => array(    // REQUIRED
						'min' => 0,
						'max' => 25,
						'show_input' => true
					),
					'value' => 6,
					'relation'    => array(
						'parent'    => 'particles_move',
						'show_when' => array( 'yes' ),
					),
				),
				array(
					'name' => 'particles_move_direction',
					'label' => esc_html__( 'Particles move direction', 'ssc' ),
					'type' => 'dropdown',
					'options'       => array(
						'none' => esc_html__( 'None', 'ssc' ),
						'top' => esc_html__( 'Top', 'ssc' ),
						'top-right' => esc_html__( 'Top Right', 'ssc' ),
						'right' => esc_html__( 'Right', 'ssc' ),
						'bottom-right' => esc_html__( 'Bottom Right', 'ssc' ),
						'bottom' => esc_html__( 'Bottom', 'ssc' ),
						'bottom-left' => esc_html__( 'Bottom Left', 'ssc' ),
						'left' => esc_html__( 'Left', 'ssc' ),
						'top-left' => esc_html__( 'Top Left', 'ssc' ),
//						["circle", "triangle", "image"]
					),
					'value' => 'none',
					'relation'    => array(
						'parent'    => 'particles_move',
						'show_when' => array( 'yes' ),
					),
				),
				array(
					'name' => 'particles_move_random',
					'label' => esc_html__( 'Random particles move', 'ssc' ),
					'type' => 'toggle',
					'options' => array(
						'yes' => esc_html__( 'Yes', 'ssc' ),
						'' => esc_html__( 'No', 'ssc' ),
					),
					'value' => '',
					'relation'    => array(
						'parent'    => 'particles_move',
						'show_when' => array( 'yes' ),
					),
				),
				array(
					'name' => 'particles_move_straight',
					'label' => esc_html__( 'Particles move straight', 'ssc' ),
					'type' => 'toggle',
					'options' => array(
						'yes' => esc_html__( 'Yes', 'ssc' ),
						'' => esc_html__( 'No', 'ssc' ),
					),
					'value' => '',
					'relation'    => array(
						'parent'    => 'particles_move',
						'show_when' => array( 'yes' ),
					),
				),
				array(
					'name' => 'particles_move_out_mode',
					'label' => esc_html__( 'Particles move out mode', 'ssc' ),
					'type' => 'dropdown',
					'options'       => array(
						'out' => esc_html__( 'Out', 'ssc' ),
						'bounce' => esc_html__( 'Bounce', 'ssc' ),
					),
					'value' => 'out',
					'relation'    => array(
						'parent'    => 'particles_move',
						'show_when' => array( 'yes' ),
					),
				),
				array(
					'name' => 'particles_move_bounce',
					'label' => esc_html__( 'Particles move bounce?', 'ssc' ),
					'type' => 'toggle',
					'options' => array(
						'yes' => esc_html__( 'Yes', 'ssc' ),
						'' => esc_html__( 'No', 'ssc' ),
					),
					'value' => '',
					'relation'    => array(
						'parent'    => 'particles_move',
						'show_when' => array( 'yes' ),
					),
				),
				array(
					'name' => 'interactivity',
					'label' => esc_html__( 'Use interactivity?', 'ssc' ),
					'type' => 'dropdown',
					'options' => array(
						'canvas' => esc_html__( 'Canvas', 'ssc' ),
						'window' => esc_html__( 'Window', 'ssc' ),
					),
					'value' => 'canvas',
					'relation'    => array(
						'parent'    => 'particles',
						'show_when' => array( 'yes' ),
					),
				),
				array(
					'name' => 'interactivity_events_onhover',
					'label' => esc_html__( 'Interactivity onhover?', 'ssc' ),
					'type' => 'toggle',
					'options' => array(
						'yes' => esc_html__( 'Yes', 'ssc' ),
						'' => esc_html__( 'No', 'ssc' ),
					),
					'value' => 'yes',
					'relation'    => array(
						'parent'    => 'particles',
						'show_when' => array( 'yes' ),
					),
				),
				array(
					'name' => 'interactivity_events_onhover_mode',
					'label' => esc_html__( 'Interactivity onhover mode', 'ssc' ),
					'type' => 'dropdown',
					'options'       => array(
						'grab' => esc_html__( 'Grab', 'ssc' ),
						'bubble' => esc_html__( 'Bubble', 'ssc' ),
						'repulse' => esc_html__( 'Repulse', 'ssc' ),
					),
					'value' => 'repulse',
					'relation'    => array(
						'parent'    => 'interactivity_events_onhover',
						'show_when' => array( 'yes' ),
					),
				),
				array(
					'name' => 'interactivity_events_onclick',
					'label' => esc_html__( 'Interactivity onclick?', 'ssc' ),
					'type' => 'toggle',
					'options' => array(
						'yes' => esc_html__( 'Yes', 'ssc' ),
						'' => esc_html__( 'No', 'ssc' ),
					),
					'value' => 'yes',
					'relation'    => array(
						'parent'    => 'particles',
						'show_when' => array( 'yes' ),
					),
				),
				array(
					'name' => 'interactivity_events_onclick_mode',
					'label' => esc_html__( 'Interactivity onclick mode', 'ssc' ),
					'type' => 'dropdown',
					'options'       => array(
						'push' => esc_html__( 'Push', 'ssc' ),
						'remove' => esc_html__( 'Remove', 'ssc' ),
						'bubble' => esc_html__( 'Bubble', 'ssc' ),
						'repulse' => esc_html__( 'Repulse', 'ssc' ),
					),
					'value' => 'push',
					'relation'    => array(
						'parent'    => 'interactivity_events_onhover',
						'show_when' => array( 'yes' ),
					),
				),
				array(
					'name' => 'interactivity_modes_grab_distance',
					'label' => esc_html__( 'Interactivity grab mode distance', 'ssc' ),
					'type' => 'number_slider',  // USAGE RADIO TYPE
					'options' => array(    // REQUIRED
						'min' => 0,
						'max' => 1500,
						'show_input' => true
					),
					'value' => 400,
					'relation'    => array(
						'parent'    => 'particles',
						'show_when' => array( 'yes' ),
					),
				),
				array(
					'name' => 'interactivity_modes_grab_line_linked_opacity',
					'label' => esc_html__( 'Interactivity grab mode link line opacity', 'ssc' ),
					'type' => 'number_slider',  // USAGE RADIO TYPE
					'options' => array(    // REQUIRED
						'min' => 0,
						'max' => 100,
						'show_input' => true
					),
					'value' => 100,
					'relation'    => array(
						'parent'    => 'particles',
						'show_when' => array( 'yes' ),
					),
				),
				array(
					'name' => 'interactivity_modes_bubble_distance',
					'label' => esc_html__( 'Interactivity bubble mode distance', 'ssc' ),
					'type' => 'number_slider',  // USAGE RADIO TYPE
					'options' => array(    // REQUIRED
						'min' => 0,
						'max' => 1500,
						'show_input' => true
					),
					'value' => 400,
					'relation'    => array(
						'parent'    => 'particles',
						'show_when' => array( 'yes' ),
					),
				),
				array(
					'name' => 'interactivity_modes_bubble_size',
					'label' => esc_html__( 'Interactivity bubble mode size', 'ssc' ),
					'type' => 'number_slider',  // USAGE RADIO TYPE
					'options' => array(    // REQUIRED
						'min' => 0,
						'max' => 500,
						'show_input' => true
					),
					'value' => 40,
					'relation'    => array(
						'parent'    => 'particles',
						'show_when' => array( 'yes' ),
					),
				),
				array(
					'name' => 'interactivity_modes_bubble_duration',
					'label' => esc_html__( 'Interactivity bubble mode duration', 'ssc' ),
					'type' => 'number_slider',  // USAGE RADIO TYPE
					'options' => array(    // REQUIRED
						'min' => 0,
						'max' => 10,
						'show_input' => true
					),
					'value' => 2,
					'relation'    => array(
						'parent'    => 'particles',
						'show_when' => array( 'yes' ),
					),
				),
				array(
					'name' => 'interactivity_modes_bubble_opacity',
					'label' => esc_html__( 'Interactivity bubble mode opacity', 'ssc' ),
					'type' => 'number_slider',  // USAGE RADIO TYPE
					'options' => array(    // REQUIRED
						'min' => 0,
						'max' => 100,
						'show_input' => true
					),
					'value' => 80,
					'relation'    => array(
						'parent'    => 'particles',
						'show_when' => array( 'yes' ),
					),
				),
				array(
					'name' => 'interactivity_modes_bubble_speed',
					'label' => esc_html__( 'Interactivity bubble mode speed', 'ssc' ),
					'type' => 'number_slider',  // USAGE RADIO TYPE
					'options' => array(    // REQUIRED
						'min' => 0,
						'max' => 10,
						'show_input' => true
					),
					'value' => 3,
					'relation'    => array(
						'parent'    => 'particles',
						'show_when' => array( 'yes' ),
					),
				),
				array(
					'name' => 'interactivity_modes_repulse_distance',
					'label' => esc_html__( 'Interactivity repulse mode distance', 'ssc' ),
					'type' => 'number_slider',  // USAGE RADIO TYPE
					'options' => array(    // REQUIRED
						'min' => 0,
						'max' => 1000,
						'show_input' => true
					),
					'value' => 200,
					'relation'    => array(
						'parent'    => 'particles',
						'show_when' => array( 'yes' ),
					),
				),
				array(
					'name' => 'interactivity_modes_repulse_duration',
					'label' => esc_html__( 'Interactivity repulse mode duration', 'ssc' ),
					'type' => 'number_slider',  // USAGE RADIO TYPE
					'options' => array(    // REQUIRED
						'min' => 0,
						'max' => 10,
						'show_input' => true
					),
					'value' => 4,
					'relation'    => array(
						'parent'    => 'particles',
						'show_when' => array( 'yes' ),
					),
				),
				array(
					'name' => 'interactivity_modes_push_particles_nb',
					'label' => esc_html__( 'Interactivity push mode particles number', 'ssc' ),
					'type' => 'number_slider',  // USAGE RADIO TYPE
					'options' => array(    // REQUIRED
						'min' => 0,
						'max' => 10,
						'show_input' => true
					),
					'value' => 4,
					'relation'    => array(
						'parent'    => 'particles',
						'show_when' => array( 'yes' ),
					),
				),
				array(
					'name' => 'interactivity_modes_remove_particles_nb',
					'label' => esc_html__( 'Interactivity remove mode particles number', 'ssc' ),
					'type' => 'number_slider',  // USAGE RADIO TYPE
					'options' => array(    // REQUIRED
						'min' => 0,
						'max' => 10,
						'show_input' => true
					),
					'value' => 2,
					'relation'    => array(
						'parent'    => 'particles',
						'show_when' => array( 'yes' ),
					),
				),
				array(
					'name' => 'retina_detect',
					'label' => esc_html__( 'Retina detect?', 'ssc' ),
					'type' => 'toggle',
					'options' => array(
						'yes' => esc_html__( 'Yes', 'ssc' ),
						'' => esc_html__( 'No', 'ssc' ),
					),
					'value' => 'yes',
					'relation'    => array(
						'parent'    => 'particles',
						'show_when' => array( 'yes' ),
					),
				),
			);
			$atts['params']['particles'] = $particles;
		}
	}
	return $atts; // required
}

function ssc_get_row_bg_animations_options(){
	return array(
		''  => esc_html__( 'None', 'ssc' ),
		'bounceIn4'  => esc_html__( 'Bounce 4 sec delay', 'ssc' ),
		'bounceIn7'  => esc_html__( 'Bounce 7 sec delay', 'ssc' ),
		'bounceIn9'  => esc_html__( 'Bounce 9 sec delay', 'ssc' ),
		'rotateIn10'  => esc_html__( 'Rotate 10 sec', 'ssc' ),
		'rotateIn15'  => esc_html__( 'Rotate 15 sec', 'ssc' ),
		'rotateIn20'  => esc_html__( 'Rotate 20 sec', 'ssc' ),
		'rotateIn30'  => esc_html__( 'Rotate 30 sec', 'ssc' ),
		'rotateOut10'  => esc_html__( 'Rotate Back 10 sec', 'ssc' ),
		'rotateOut15'  => esc_html__( 'Rotate Back 15 sec', 'ssc' ),
		'rotateOut20'  => esc_html__( 'Rotate Back 20 sec', 'ssc' ),
		'rotateOut30'  => esc_html__( 'Rotate Back 30 sec', 'ssc' ),
		'scaleUp8'  => esc_html__( 'Scale Up 8 sec', 'ssc' ),
		'scaleUp15'  => esc_html__( 'Scale Up 15 sec', 'ssc' ),
		'scaleUpSmall8'  => esc_html__( 'Scale Up Small 8 sec', 'ssc' ),
		'scaleUpSmall15'  => esc_html__( 'Scale Up Small 15 sec', 'ssc' ),
		'scaleDown8'  => esc_html__( 'Scale Down 8 sec', 'ssc' ),
		'scaleDown15'  => esc_html__( 'Scale Down 15 sec', 'ssc' ),
		'scaleDownSmall8'  => esc_html__( 'Scale Down Small 8 sec', 'ssc' ),
		'scaleDownSmall15'  => esc_html__( 'Scale Down Small 15 sec', 'ssc' ),
		'fadeIn7'  => esc_html__( 'FadeIn 7 sec', 'ssc' ),
		'fadeOut7'  => esc_html__( 'FadeOut 7 sec', 'ssc' ),
	);
}

add_filter( 'shortcode_kc_row_before_css_generating', 'ssc_kc_row_filter_css' );

function ssc_kc_row_filter_css( $atts ) {
	$styles = array();
	extract( shortcode_atts( array(
		'svg_c1'  => '',
		'svg_hc1' => '',
		'svg_c2'  => '',
		'svg_hc2' => '',
		'svg_c3'  => '',
		'svg_hc3' => '',
		'svg_c4'  => '',
		'svg_hc4' => '',
		'svg_c5'  => '',
		'svg_hc5' => '',
		'svg_c6'  => '',
		'svg_hc6' => '',
		'svg_c7'  => '',
		'svg_hc7' => '',
		'svg_c8'  => '',
		'svg_hc8' => '',
	),
		$atts ) );
//  || $atts['css_custom'] == "{`kc-css`:{}}"
	if( empty ( $atts['css_custom'] ) ) {
		return $atts;
	}

	$styles = json_decode( str_replace( '`', '"', $atts['css_custom'] ), true);

	if ( '' !== $svg_c1 ) {
		if ( empty ( $styles['kc-css']['any']['svg']['fill| .befbgr:nth-child(1) svg'] ) ) {
			$styles['kc-css']['any']['svg']['fill| .befbgr:nth-child(1) svg'] = $svg_c1;
		}
	}
	if ( '' !== $svg_hc1 ) {
		if ( empty ( $styles['kc-css']['any']['svg']['fill|:hover .befbgr:nth-child(1) svg'] ) ) {
			$styles['kc-css']['any']['svg']['fill|:hover .befbgr:nth-child(1) svg'] = $svg_hc1;
		}
	}

	if ( '' !== $svg_c2 ) {
		if ( empty ( $styles['kc-css']['any']['svg']['fill| .befbgr:nth-child(2) svg'] ) ) {
			$styles['kc-css']['any']['svg']['fill| .befbgr:nth-child(2) svg'] = $svg_c2;
		}
	}
	if ( '' !== $svg_hc2 ) {
		if ( empty ( $styles['kc-css']['any']['svg']['fill|:hover .befbgr:nth-child(2) svg'] ) ) {
			$styles['kc-css']['any']['svg']['fill|:hover .befbgr:nth-child(2) svg'] = $svg_hc2;
		}
	}

	if ( '' !== $svg_c3 ) {
		if ( empty ( $styles['kc-css']['any']['svg']['fill| .aftbgr:nth-child(3) svg'] ) ) {
			$styles['kc-css']['any']['svg']['fill| .aftbgr:nth-child(3) svg'] = $svg_c3;
		}
	}
	if ( '' !== $svg_hc3 ) {
		if ( empty ( $styles['kc-css']['any']['svg']['fill|:hover .aftbgr:nth-child(3) svg'] ) ) {
			$styles['kc-css']['any']['svg']['fill|:hover .aftbgr:nth-child(3) svg'] = $svg_hc3;
		}
	}

	if ( '' !== $svg_c4 ) {
		if ( empty ( $styles['kc-css']['any']['svg']['fill| .aftbgr:nth-child(4) svg'] ) ) {
			$styles['kc-css']['any']['svg']['fill| .aftbgr:nth-child(4) svg'] = $svg_c4;
		}
	}
	if ( '' !== $svg_hc4 ) {
		if ( empty ( $styles['kc-css']['any']['svg']['fill|:hover .aftbgr:nth-child(4) svg'] ) ) {
			$styles['kc-css']['any']['svg']['fill|:hover .aftbgr:nth-child(4) svg'] = $svg_hc4;
		}
	}

	if ( '' !== $svg_c5 ) {
		if ( empty ( $styles['kc-css']['any']['svg']['fill| .befbgr5 svg'] ) ) {
			$styles['kc-css']['any']['svg']['fill| .befbgr5 svg'] = $svg_c5;
		}
	}
	if ( '' !== $svg_hc5 ) {
		if ( empty ( $styles['kc-css']['any']['svg']['fill|:hover .befbgr5 svg'] ) ) {
			$styles['kc-css']['any']['svg']['fill|:hover .befbgr5 svg'] = $svg_hc5;
		}
	}

	if ( '' !== $svg_c6 ) {
		if ( empty ( $styles['kc-css']['any']['svg']['fill| .befbgr6 svg'] ) ) {
			$styles['kc-css']['any']['svg']['fill| .befbgr6 svg'] = $svg_c6;
		}
	}
	if ( '' !== $svg_hc6 ) {
		if ( empty ( $styles['kc-css']['any']['svg']['fill|:hover .befbgr6 svg'] ) ) {
			$styles['kc-css']['any']['svg']['fill|:hover .befbgr6 svg'] = $svg_hc6;
		}
	}

	if ( '' !== $svg_c7 ) {
		if ( empty ( $styles['kc-css']['any']['svg']['fill| .aftbgr7 svg'] ) ) {
			$styles['kc-css']['any']['svg']['fill| .aftbgr7 svg'] = $svg_c7;
		}
	}
	if ( '' !== $svg_hc7 ) {
		if ( empty ( $styles['kc-css']['any']['svg']['fill|:hover .aftbgr7 svg'] ) ) {
			$styles['kc-css']['any']['svg']['fill|:hover .aftbgr7 svg'] = $svg_hc7;
		}
	}

	if ( '' !== $svg_c8 ) {
		if ( empty ( $styles['kc-css']['any']['svg']['fill| .aftbgr8 svg'] ) ) {
			$styles['kc-css']['any']['svg']['fill| .aftbgr8 svg'] = $svg_c8;
		}
	}
	if ( '' !== $svg_hc8 ) {
		if ( empty ( $styles['kc-css']['any']['svg']['fill|:hover .aftbgr8 svg'] ) ) {
			$styles['kc-css']['any']['svg']['fill|:hover .aftbgr8 svg'] = $svg_hc8;
		}
	}

	$atts['css_custom'] = str_replace( '"', '`', json_encode( $styles, JSON_FORCE_OBJECT ) );

	return $atts;
}