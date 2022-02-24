<?php
add_filter( 'kc_add_map', 'ssc_kc_column_text', 0 /*priority index*/, 2 /*number of params*/ );

function ssc_kc_column_text( $atts, $base ) {

if ( $base == 'kc_column_text' ) {
$css_map = array(
array(
'screens'                  => "any,1024,999,767,479",
	'Typography' => array(
		array('property' => 'color', 'label' => 'Color', 'selector' => ',p'),
		array('property' => 'font-family', 'label' => 'Font Family', 'selector' => ',p'),
		array('property' => 'font-size', 'label' => 'Font Size', 'selector' => ',p'),
		array('property' => 'line-height', 'label' => 'Line Height', 'selector' => ',p'),
		array('property' => 'font-style', 'label' => 'Font Style', 'selector' => ',p'),
		array('property' => 'font-weight', 'label' => 'Font Weight', 'selector' => ',p'),
		array('property' => 'text-transform', 'label' => 'Text Transform', 'selector' => ',p'),
		array('property' => 'text-align', 'label' => 'Text Align', 'selector' => 'p'),
		array('property' => 'letter-spacing', 'label' => 'Letter Spacing', 'selector' => ',p'),
		array('property' => 'text-shadow', 'label' => 'Text Shadow', 'selector' => ',p'),
	),
'Box'    => array(
	array('property' => 'background', 'label' => 'Background'),
	array('property' => 'width', 'label' => 'Width'),
	array('property' => 'height', 'label' => 'Height'),
	array('property' => 'max-width', 'label' => 'Max Width'),
	array('property' => 'border', 'label' => 'Border'),
	array('property' => 'border', 'label' => 'Border Hover', 'selector' => '+:hover'),
	array('property' => 'border-radius', 'label' => 'Border Radius'),
	array('property' => 'display', 'label' => 'Display'),
	array('property' => 'float', 'label' => 'Float'),
	array('property' => 'padding', 'label' => 'Padding for box'),
	array('property' => 'margin', 'label' => 'Margin for box'),
	array('property' => 'margin', 'label' => 'Margin for Paragraph', 'selector' => 'p'),

),
	'Links' => array(
		array('property' => 'color', 'label' => esc_html__( 'Color', 'ssc' ), 'selector' => 'a'),
		array('property' => 'color', 'label' => esc_html__( 'Color Hover', 'ssc' ), 'selector' => 'a:hover'),
		array('property' => 'background-color', 'selector' => 'a'),
		array('property' => 'background-color', 'selector' => 'a:hover'),
		array('property' => 'background', 'selector' => 'a'),
		array('property' => 'background', 'selector' => 'a:hover'),
		array('property' => 'font-size', 'label' => esc_html__( 'Font Size', 'ssc' ), 'selector' => 'a'),
		array('property' => 'line-height', 'label' => esc_html__( 'Line Height', 'ssc' ), 'selector' => 'a'),
		array('property' => 'text-decoration', 'label' => esc_html__( 'Text Decoration', 'ssc' ), 'selector' => 'a'),
		array('property' => 'text-decoration', 'label' => esc_html__( 'Text Decoration', 'ssc' ), 'selector' => 'a:hover'),
		array('property' => 'font-style', 'label' => esc_html__( 'Font Style', 'ssc' ), 'selector' => 'a'),
		array('property' => 'font-style', 'label' => esc_html__( 'Font Style Hover', 'ssc' ), 'selector' => 'a:hover'),
		array('property' => 'font-weight', 'label' => esc_html__( 'Font Weight', 'ssc' ), 'selector' => 'a'),
		array('property' => 'font-weight', 'label' => esc_html__( 'Font Weight Hover', 'ssc' ), 'selector' => 'a:hover'),
		array('property' => 'text-transform', 'label' => esc_html__( 'Text Transform', 'ssc' ), 'selector' => 'a'),
		array('property' => 'text-transform', 'label' => esc_html__( 'Text Transform Hover', 'ssc' ), 'selector' => 'a:hover'),
		array('property' => 'letter-spacing', 'label' => esc_html__( 'Letter Spacing', 'ssc' ), 'selector' => 'a'),
		array('property' => 'letter-spacing', 'label' => esc_html__( 'Letter Spacing Hover', 'ssc' ), 'selector' => 'a:hover'),
		array('property' => 'padding', 'label' => esc_html__( 'Padding'), 'selector' => 'a'),
		array('property' => 'margin', 'label' => esc_html__( 'Margin'), 'selector' => 'a'),
		array('property' => 'margin', 'label' => esc_html__( 'Margin Hover'), 'selector' => 'a:hover'),
		array('property' => 'display', 'label' => 'Display', 'selector' => 'a'),
	),
	'List'    => array(
		array('property' => 'background', 'label' => 'Background', 'selector' => 'ul, ol'),
		array('property' => 'max-width', 'label' => 'Max Width', 'selector' => 'ul, ol'),
		array('property' => 'text-align', 'label' => 'Text Align', 'selector' => 'ul, ol'),
		array('property' => 'border', 'label' => 'Border', 'selector' => 'ul, ol'),
		array('property' => 'border-radius', 'label' => 'Border Radius', 'selector' => 'ul, ol'),
		array('property' => 'display', 'label' => 'Display', 'selector' => 'ul, ol'),
		array('property' => 'padding', 'label' => 'Padding', 'selector' => 'ul, ol'),
		array('property' => 'margin', 'label' => 'Margin', 'selector' => 'ul, ol'),
	),
	'Strong' => array(
		array('property' => 'color', 'label' => esc_html__( 'Color', 'ssc' ), 'selector' => 'strong'),
		array('property' => 'color', 'label' => esc_html__( 'Color Hover', 'ssc' ), 'selector' => 'strong:hover'),
		array('property' => 'background-color', 'selector' => 'strong'),
		array('property' => 'background-color', 'selector' => 'strong:hover'),
		array('property' => 'font-size', 'label' => esc_html__( 'Font Size', 'ssc' ), 'selector' => 'strong'),
		array('property' => 'line-height', 'label' => esc_html__( 'Line Height', 'ssc' ), 'selector' => 'strong'),
		array('property' => 'text-decoration', 'label' => esc_html__( 'Text Decoration', 'ssc' ), 'selector' => 'strong'),
		array('property' => 'text-decoration', 'label' => esc_html__( 'Text Decoration', 'ssc' ), 'selector' => 'strong:hover'),
		array('property' => 'font-style', 'label' => esc_html__( 'Font Style', 'ssc' ), 'selector' => 'strong'),
		array('property' => 'font-style', 'label' => esc_html__( 'Font Style Hover', 'ssc' ), 'selector' => 'strong:hover'),
		array('property' => 'font-weight', 'label' => esc_html__( 'Font Weight', 'ssc' ), 'selector' => 'strong'),
		array('property' => 'font-weight', 'label' => esc_html__( 'Font Weight Hover', 'ssc' ), 'selector' => 'strong:hover'),
		array('property' => 'text-transform', 'label' => esc_html__( 'Text Transform', 'ssc' ), 'selector' => 'strong'),
		array('property' => 'text-transform', 'label' => esc_html__( 'Text Transform Hover', 'ssc' ), 'selector' => 'strong:hover'),
		array('property' => 'letter-spacing', 'label' => esc_html__( 'Letter Spacing', 'ssc' ), 'selector' => 'strong'),
		array('property' => 'letter-spacing', 'label' => esc_html__( 'Letter Spacing Hover', 'ssc' ), 'selector' => 'strong:hover'),
		array('property' => 'margin', 'label' => esc_html__( 'Margin'), 'selector' => 'strong'),
		array('property' => 'margin', 'label' => esc_html__( 'Margin Hover'), 'selector' => 'strong:hover'),
		array('property' => 'display', 'label' => 'Display', 'selector' => 'strong'),
	),
),
);



	if ( isset( $atts['params']['styling'][0] ) ) {
		$atts['params']['styling'][0]['value']   = '';
		$atts['params']['styling'][0]['options'] = $css_map;
	}
}

return $atts; // required
}