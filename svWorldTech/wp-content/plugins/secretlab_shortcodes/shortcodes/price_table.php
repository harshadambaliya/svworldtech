<?php
add_action( 'init', 'ssc_price', 99 );

function ssc_price() {
	global $kc;
	//register template folder with KingComposer
	$kc->set_template_path( SSC_SHORTCODES_PATH . 'templates/' );
//	$kc->remove_map_param( 'kc_pricing', 'show_icon_header' );
	$kc->add_map_param(
		'kc_pricing', //element slug - shortcode tag name
		array(
			'name'		=> 'show_svg',
			'label'		=> __( 'Use SVG Icon', 'kingcomposer' ),
			'type'		=> 'toggle',
			'value'		=> 'no',
		),
		4
	);
	$kc->add_map_param(
		'kc_pricing', //element slug - shortcode tag name
		array(
			'name' => 'svg',
			'label' => esc_html__( 'Select SVG Icon', 'ssc' ),
			'type' => 'attach_image',
			'admin_label' => true,
			'relation' => array(
				'parent' => 'show_svg',
				'show_when' => 'yes'
			)
		),
		5
	);
	$kc->add_map_param(
		'kc_pricing', //element slug - shortcode tag name
		array(
			'type' => 'color_picker',
			'label' => __( 'SVG Color', 'ssc' ),
			'name' => 'svg_c',
			'relation' => array(
				'parent' => 'show_svg',
				'show_when' => 'yes'
			),
			'description' => esc_html__( 'Deprecated! Use "fill" field at the "Styling" tab instead.', 'ssc' ),
		),
		6
	);
	$kc->add_map_param(
		'kc_pricing', //element slug - shortcode tag name
		array(
			'type' => 'color_picker',
			'label' => __( 'SVG Hover Color', 'ssc' ),
			'name' => 'svg_hc',
			'relation' => array(
				'parent' => 'show_svg',
				'show_when' => 'yes'
			),
			'description' => esc_html__( 'Deprecated! Use "fill" field at the "Styling" tab instead.', 'ssc' ),
		),
		7
	);
	$kc->add_map_param(
		'kc_pricing', //element slug - shortcode tag name
		array(
			'name'     => 'price_suffix',
			'label'    => esc_html__( 'The price suffix', 'ssc' ),
			'type'     => 'text',  // USAGE TEXT TYPE
			'value'    => '', // remove this if you do not need a default content,
		),
		12 //position of param
	);
	$kc->add_map_param(
		'kc_pricing', //element slug - shortcode tag name
		array(
			'name'     => 'price_suffix_position',
			'label'    => esc_html__( 'The price suffix position', 'ssc' ),
			'type'     => 'select',
			'value'			=> 'span',
			'options'		=> array(
				'sup'	=> __( 'Up', 'ssc' ),
				'sub'	=> __( 'Down', 'ssc' ),
				'span'	=> __( 'Inline', 'ssc' ),
			),
		),
		13 //position of param
	);
	$kc->add_map_param(
		'kc_pricing', //element slug - shortcode tag name
		array(
			'name' => 'duration_position',
			'type' => 'toggle',
			'label' => __( 'Per: before price?', 'ssc' ),
			'description' => esc_html__( 'Shows "per" before or after the price', 'ssc' ),
			'value' => '',
		),
		16
	);
	$kc->add_map_param(
		'kc_pricing', //element slug - shortcode tag name
		array(
			'name' => 'button_icon_type',
			'label' => esc_html__( 'Icon in Button', 'ssc' ),
			'type' => 'radio',
			'options' => array(
				'none' => esc_html__( 'None', 'ssc' ),
				'icon' => esc_html__( 'Icon', 'ssc' ),
				'svg' => esc_html__( 'SVG', 'ssc' ),
				'img' => esc_html__( 'Image', 'ssc' ),
			),
			'value' => 'none',
//			'description' => esc_html__( 'Use Icon in Button', 'ssc' ),
			'relation' => array(
				'parent' => 'show_button',
				'show_when' => 'yes'
			)
		),
		24
	);
	$kc->add_map_param(
		'kc_pricing', //element slug - shortcode tag name
		array(
			'name' => 'button_icon_position',
			'label' => esc_html__( 'Position Icon in Button', 'ssc' ),
			'type' => 'radio',
			'options' => array(
				'before' => esc_html__( 'Before Text', 'ssc' ),
				'after' => esc_html__( 'After Text', 'ssc' ),
			),
			'value' => 'before',
//			'description' => esc_html__( 'Use Icon in Button', 'ssc' ),
			'relation' => array(
				'parent' => 'show_button',
				'show_when' => 'yes'
			)
		),
		25
	);
	$kc->add_map_param(
		'kc_pricing', //element slug - shortcode tag name
		array(
			'name' => 'button_icon',
			'label' => esc_html__( 'Select Icon', 'ssc' ),
			'type' => 'icon_picker',
			'admin_label' => true,
			'relation' => array(
				'parent' => 'button_icon_type',
				'show_when' => 'icon'
			),
			'value' => 'nat-return-of-investment-roi',
		),
		30
	);
	$kc->add_map_param(
		'kc_pricing', //element slug - shortcode tag name
		array(
			'name' => 'button_svg',
			'label' => esc_html__( 'Select SVG Icon', 'ssc' ),
			'type' => 'attach_image',
			'admin_label' => true,
			'relation' => array(
				'parent' => 'button_icon_type',
				'show_when' => 'svg'
			)
		),
		30
	);
	$kc->add_map_param(
		'kc_pricing', //element slug - shortcode tag name
		array(
			'type' => 'color_picker',
			'label' => __( 'SVG Color', 'ssc' ),
			'name' => 'b_svg_c',
			'relation' => array(
				'parent' => 'button_icon_type',
				'show_when' => 'svg'
			),
			'description' => esc_html__( 'Deprecated! Use "fill" field at the "Styling" tab instead.', 'ssc' ),
		),
		31
	);
	$kc->add_map_param(
		'kc_pricing', //element slug - shortcode tag name
		array(
			'type' => 'color_picker',
			'label' => __( 'SVG Hover Color', 'ssc' ),
			'name' => 'b_svg_hc',
			'relation' => array(
				'parent' => 'button_icon_type',
				'show_when' => 'svg'
			),
			'description' => esc_html__( 'Deprecated! Use "fill" field at the "Styling" tab instead.', 'ssc' ),
		),
		32
	);
	$kc->add_map_param(
		'kc_pricing', //element slug - shortcode tag name
		array(
			'name' => 'button_img',
			'label' => esc_html__( 'Select Image Icon', 'ssc' ),
			'type' => 'attach_image',
			'admin_label' => true,
			'relation' => array(
				'parent' => 'button_icon_type',
				'show_when' => 'img'
			)
		),
		30
	);
	$kc->add_map_param(
		'kc_pricing', //element slug - shortcode tag name
		array(
			'name' 		 	=> 'button_img_size',
			'type'        	=> 'dropdown',
			'label'     	=> esc_html__( 'Image size', 'ssc' ),
			'description' 	=> esc_html__( 'Set the image size.', 'ssc' ),
			'value'       	=> 'full',
			'options'       => ssc_get_image_sizes(),
			'relation' => array(
				'parent' => 'button_icon_type',
				'show_when' => 'img'
			)
		),
		31
	);
	$kc->update_map(
		'kc_pricing',
		'params',
		array(
			'general' => array(
				1 => array(
					'name'		=> 'show_icon_header',
					'label'		=> __( 'Show Icon Header', 'kingcomposer' ),
					'type'		=> 'toggle',
					'value'		=> 'yes',
					'relation'	=> array(
						'parent'	=> 'layout',
						'show_when'	=> array( '1', '3', '4', '5' )
					)
				)
			)
		)
	);

	$kc->add_map_param(
		'kc_pricing', //element slug - shortcode tag name
		array(
			'name'    => 'sticker',
			'label'   => esc_html__( 'Feature the block with stiker', 'ssc' ),
			'type'    => 'radio_image',  // USAGE TEXT TYPE
			'options' => array(
				'0' => SSC_URL . 'images/st1.gif',
				'1' => SSC_URL . 'images/st2.gif',
				'2' => SSC_URL . 'images/st3.gif',
				'3' => SSC_URL . 'images/st4.gif',

			),
			'value'   => '0', // Set default is value_2, remove this if you dont need to set default
		),
		1 //position of param
	);
	$kc->add_map_param(
		'kc_pricing', //element slug - shortcode tag name
		array(
			'name'     => 'stikertext',
			'label'    => esc_html__( 'Text for the sticker', 'ssc' ),
			'type'     => 'text',  // USAGE TEXT TYPE
			'value'    => 'Popular', // remove this if you do not need a default content,
		),
		2 //position of param
	);
	$kc->add_map_param(
		'kc_pricing', //element slug - shortcode tag name
		array(
			'name'     => 'description',
			'label'    => esc_html__( 'Text for the description', 'ssc' ),
			'type'     => 'text',  // USAGE TEXT TYPE
			'value'    => '', // remove this if you do not need a default content,
		),
		36 //position of param
	);
	$kc->add_map_param(
		'kc_pricing', //element slug - shortcode tag name
		array(
			'name'     => 'prefix',
			'label'    => esc_html__( 'Text for the prefix', 'ssc' ),
			'type'     => 'text',  // USAGE TEXT TYPE
			'value'    => '', // remove this if you do not need a default content,
			'relation' => array(
				'parent' => 'layout',
				'show_when' => '5'
			),
		),
		38 //position of param
	);
	$kc->add_map_param(
		'kc_pricing', //element slug - shortcode tag name
		array(
			'name'     => 'prefix_position',
			'label'    => esc_html__( 'Prefix position', 'ssc' ),
			'type'     => 'select',
			'value'			=> 'span',
			'options'		=> array(
				'sup'	=> __( 'Up', 'ssc' ),
				'sub'	=> __( 'Down', 'ssc' ),
				'span'	=> __( 'Inline', 'ssc' ),
			),
			'relation'    => array(
				'parent'    => 'layout',
				'show_when' => '5'
			)
		),
		39 //position of param
	);
	$kc->add_map_param(
		'kc_pricing', //element slug - shortcode tag name
		array(
			'name'     => 'suffix',
			'label'    => esc_html__( 'Text for the suffix', 'ssc' ),
			'type'     => 'text',  // USAGE TEXT TYPE
			'value'    => '', // remove this if you do not need a default content,
			'relation' => array(
				'parent' => 'layout',
				'show_when' => '5'
			),
		),
		40 //position of param
	);
	$kc->add_map_param(
		'kc_pricing', //element slug - shortcode tag name
		array(
			'name'     => 'suffix_position',
			'label'    => esc_html__( 'Suffix position', 'ssc' ),
			'type'     => 'select',
			'value'			=> 'span',
			'options'		=> array(
				'sup'	=> __( 'Up', 'ssc' ),
				'sub'	=> __( 'Down', 'ssc' ),
				'span'	=> __( 'Inline', 'ssc' ),
			),
			'relation'    => array(
				'parent'    => 'layout',
				'show_when' => '5'
			)
		),
		41 //position of param
	);
	$kc->add_map_param(
		'kc_pricing', //element slug - shortcode tag name
		array(
			'name'     => 'after_button_description',
			'label'    => esc_html__( 'Description under button', 'ssc' ),
			'type'     => 'text',  // USAGE TEXT TYPE
			'value'    => '', // remove this if you do not need a default content,
		),
		50 //position of param
	);
}

add_filter( 'kc_add_map', 'ssc_price_filter', 0 /*priority index*/, 2 /*number of params*/ );

function ssc_price_filter( $atts, $base ) {

	if ( $base == 'kc_pricing' ) {
		$css_map = array(
			array(
				'screens'    => "any,1024,999,767,479",
				'Heading Box'	=> array(
					array('property' => 'background', 'selector' => '.header-pricing'),
					array('property' => 'background', 'selector' => '+:hover .header-pricing'),
					array('property' => 'display', 'label' => 'Display', 'selector' => '.header-pricing'),
					array('property' => 'float', 'label' => 'Float', 'selector' => '.header-pricing'),
					array('property' => 'box-shadow', 'label' => 'Box Shadow', 'selector' => '.header-pricing'),
					array('property' => 'box-shadow', 'label' => 'Box Shadow Hover', 'selector' => '+:hover .header-pricing'),
					array('property' => 'border', 'label' => 'Border', 'selector' => '.header-pricing'),
					array('property' => 'border-color', 'label' => 'Border Color Hover', 'selector' => '+:hover .header-pricing'),
					array('property' => 'border-radius', 'label' => 'Border Radius', 'selector' => '.header-pricing'),
					array('property' => 'border-radius', 'label' => 'Border Radius Hover', 'selector' => '+:hover .header-pricing'),
					array('property' => 'margin', 'label' => 'Position Hover', 'selector' => '+:hover .header-pricing'),
					array('property' => 'margin', 'label' => 'Margin', 'selector' => '.header-pricing'),
					array('property' => 'padding', 'label' => 'Padding', 'selector' => '.header-pricing'),
				),
				'Title'	=> array(
					array('property' => 'color', 'label' => 'Color', 'selector' => '.content-title'),
					array('property' => 'color', 'label' => 'Color Hover', 'selector' => '+:hover .header-pricing .content-title,+:hover .content-title'),
					array('property' => 'font-family', 'label' => 'Font Family', 'selector' => '.content-title'),
					array('property' => 'font-size', 'label' => 'Font Size', 'selector' => '.content-title'),
					array('property' => 'font-weight', 'label' => 'Font Weight', 'selector' => '.content-title'),
					array('property' => 'line-height', 'label' => 'Line Height', 'selector' => '.content-title'),
					array('property' => 'text-transform', 'label' => 'Text Transform', 'selector' => '.content-title'),
					array('property' => 'text-align', 'label' => 'Text Align', 'selector' => '.content-title'),
					array('property' => 'background-color', 'label' => 'Bg Color', 'selector' => '.content-title'),
					array('property' => 'background-color', 'label' => 'Bg Color Hover', 'selector' => '+.kc-pricing-tables:hover .content-title'),
					array('property' => 'float', 'label' => 'Float', 'selector' => '.content-title'),
					array('property' => 'margin', 'label' => 'Margin', 'selector' => '.content-title'),
					array('property' => 'padding', 'label' => 'Padding', 'selector' => '.content-title'),
					array('property' => 'border', 'label' => esc_html__( 'Border', 'ssc' ), 'selector' => '.content-title'),
					array('property' => 'border-radius', 'label' => esc_html__( 'Border Radius', 'ssc' ), 'selector' => '.content-title'),
					array('property' => 'border', 'label' => esc_html__( 'Border Hover', 'ssc' ), 'selector' => '+:hover .header-pricing .content-title,+:hover .content-title'),
					array('property' => 'border-radius', 'label' => esc_html__( 'Border Radius Hover', 'ssc' ), 'selector' => '+:hover .header-pricing .content-title,+:hover .content-title'),
				),
				'SubTitle'	=> array(
					array('property' => 'color', 'label' => 'Color', 'selector' => '.content-sub-title'),
					array('property' => 'color', 'label' => 'Color Hover', 'selector' => '+:hover .header-pricing .content-sub-title,+:hover .content-sub-title'),
					array('property' => 'font-family', 'label' => 'Font Family', 'selector' => '.content-sub-title'),
					array('property' => 'font-size', 'label' => 'Font Size', 'selector' => '.content-sub-title'),
					array('property' => 'font-weight', 'label' => 'Font Weight', 'selector' => '.content-sub-title'),
					array('property' => 'line-height', 'label' => 'Line Height', 'selector' => '.content-sub-title'),
					array('property' => 'text-transform', 'label' => 'Text Transform', 'selector' => '.content-sub-title'),
					array('property' => 'text-align', 'label' => 'Text Align', 'selector' => '.content-sub-title'),
					array('property' => 'background-color', 'label' => 'Bg Color', 'selector' => '.content-sub-title'),
					array('property' => 'background-color', 'label' => 'Bg Color Hover', 'selector' => '+.kc-pricing-tables:hover .content-sub-title'),
					array('property' => 'margin', 'label' => 'Margin', 'selector' => '.content-sub-title'),
					array('property' => 'padding', 'label' => 'Padding', 'selector' => '.content-sub-title'),
				),
				'Description'	=> array(
					array('property' => 'color', 'label' => 'Color', 'selector' => '.description'),
					array('property' => 'color', 'label' => 'Color Hover', 'selector' => '+:hover .description'),
					array('property' => 'float', 'label' => 'Float', 'selector' => '.description'),
					array('property' => 'font-family', 'label' => 'Font Family', 'selector' => '.description'),
					array('property' => 'font-size', 'label' => 'Font Size', 'selector' => '.description'),
					array('property' => 'font-weight', 'label' => 'Font Weight', 'selector' => '.description'),
					array('property' => 'line-height', 'label' => 'Line Height', 'selector' => '.description'),
					array('property' => 'text-transform', 'label' => 'Text Transform', 'selector' => '.description'),
					array('property' => 'text-align', 'label' => 'Text Align', 'selector' => '.description'),
					array('property' => 'background-color', 'label' => 'Bg Color', 'selector' => '.description'),
					array('property' => 'background-color', 'label' => 'Bg Color Hover', 'selector' => '+:hover .description'),
					array('property' => 'margin', 'label' => 'Margin', 'selector' => '.description'),
					array('property' => 'padding', 'label' => 'Padding', 'selector' => '.description'),
				),
				'Price'	=> array(
					array('property' => 'color', 'label' => 'Color', 'selector' => '.content-price'),
					array('property' => 'color', 'label' => 'Color Hover', 'selector' => '+.kc-pricing-tables:hover .content-price'),
					array('property' => 'font-size', 'label' => 'Font Size', 'selector' => '.content-price'),
					array('property' => 'font-weight', 'label' => 'Font Weight', 'selector' => '.content-price'),
					array('property' => 'line-height', 'label' => 'Line Height', 'selector' => '.content-price'),
					array('property' => 'font-family', 'label' => 'Font Family', 'selector' => '.kc-pricing-price'),
					array('property' => 'text-align', 'label' => 'Text Align', 'selector' => '.kc-pricing-price'),
					array('property' => 'letter-spacing', 'label' => 'Letter Spacing', 'selector' => '.kc-pricing-price'),
					array('property' => 'background-color', 'label' => 'Wrapper Bg Price', 'selector' => '.kc-pricing-price'),
					array('property' => 'background-color', 'label' => 'Wrapper Bg Price Hover', 'selector' => '+.kc-pricing-tables:hover .kc-pricing-price'),
					array('property' => 'background', 'selector' => '.kc-pricing-price'),
					array('property' => 'background', 'selector' => '+.kc-pricing-tables:hover .kc-pricing-price'),
					array('property' => 'width', 'label' => 'Width', 'selector' => '.header-pricing .kc-pricing-price'),
					array('property' => 'height', 'label' => 'Height', 'selector' => '.header-pricing .kc-pricing-price'),
					array('property' => 'border', 'label' => 'Wrapper Border', 'selector' => '+.kc-pricing-tables .kc-pricing-price'),
					array('property' => 'border-color', 'label' => 'Wrapper Border Hover', 'selector' => '+.kc-pricing-tables:hover .kc-pricing-price'),
					array('property' => 'padding', 'label' => 'Padding', 'selector' => '.content-price'),
					array('property' => 'margin', 'label' => 'Margin Text', 'selector' => '.content-price'),
					array('property' => 'padding', 'label' => 'Wrapper padding', 'selector' => '.kc-pricing-price'),
					array('property' => 'margin', 'label' => 'Margin Price Block', 'selector' => '.kc-pricing-price'),
					array('property' => 'border-radius', 'label' => esc_html__( 'Border Radius Wrapper', 'ssc' ), 'selector' => '.kc-pricing-price'),
					array('property' => 'display', 'label' => 'Display', 'selector' => '.kc-pricing-price'),
					array('property' => 'float', 'label' => 'Float', 'selector' => '.kc-pricing-price'),

					array('property' => 'display', 'label' => 'Suffix' . ' ' . 'Display', 'selector' => '.content-price span, .content-price sup, .content-price sub'),
					array('property' => 'color', 'label' => 'Suffix' . ' ' . 'Color', 'selector' => '.content-price span, .content-price sup, .content-price sub'),
					array('property' => 'color', 'label' => 'Suffix' . ' ' . 'Color Hover', 'selector' => '+:hover .content-price span,+:hover .content-price sup,+:hover .content-price sub'),
					array('property' => 'font-family', 'label' => 'Suffix' . ' ' . 'Font Family', 'selector' => '.content-price span, .content-price sup, .content-price sub'),
					array('property' => 'font-size', 'label' => 'Suffix' . ' ' . 'Font Size', 'selector' => '.content-price span, .content-price sup, .content-price sub'),
					array('property' => 'font-weight', 'label' => 'Suffix' . ' ' . 'Font Weight', 'selector' => '.content-price span, .content-price sup, .content-price sub'),
					array('property' => 'line-height', 'label' => 'Suffix' . ' ' . 'Line Height', 'selector' => '.content-price span, .content-price sup, .content-price sub'),
					array('property' => 'text-transform', 'label' => 'Suffix' . ' ' . 'Text Transform', 'selector' => '.content-price span, .content-price sup, .content-price sub'),
					array('property' => 'background-color', 'label' => 'Suffix' . ' ' . 'Bg Color', 'selector' => '.content-price span, .content-price sup, .content-price sub'),
					array('property' => 'background-color', 'label' => 'Suffix' . ' ' . 'Bg Color Hover', 'selector' => '+:hover .content-price span,+:hover .content-price sup,+:hover .content-price sub'),
					array('property' => 'border', 'label' => 'Suffix' . ' ' . 'Border', 'selector' => '.content-price span, .content-price sup, .content-price sub'),
					array('property' => 'border', 'label' => 'Suffix' . ' ' . 'Border' . ' ' . 'Hover', 'selector' => '+:hover .content-price span,+:hover .content-price sup,+:hover .content-price sub'),
					array('property' => 'margin', 'label' => 'Suffix' . ' ' . 'Margin', 'selector' => '.content-price span, .content-price sup, .content-price sub'),
					array('property' => 'padding', 'label' => 'Suffix' . ' ' . 'Padding', 'selector' => '.content-price span, .content-price sup, .content-price sub'),
				),
				'Currency'	=> array(
					array('property' => 'color', 'label' => 'Color', 'selector' => '.content-currency'),
					array('property' => 'color', 'label' => 'Color Hover', 'selector' => '+.kc-pricing-tables:hover .content-currency'),
					array('property' => 'font-size', 'label' => 'Font Size', 'selector' => '.content-currency'),
					array('property' => 'font-weight', 'label' => 'Font Weight', 'selector' => '.content-currency'),
					array('property' => 'line-height', 'label' => 'Line Height', 'selector' => '.content-currency'),
					array('property' => 'font-family', 'label' => 'Font Family', 'selector' => '.content-currency'),
                    array('property' => 'letter-spacing', 'label' => 'Letter Spacing', 'selector' => '.kc-pricing-price'),
					array('property' => 'margin', 'label' => 'Margin', 'selector' => '.content-currency'),
					array('property' => 'padding', 'label' => 'Padding', 'selector' => '.content-currency'),
				),
				'Per'	=> array(
					array('property' => 'color', 'label' => 'Color', 'selector' => '.kc-pricing-price span.content-duration'),
					array('property' => 'color', 'label' => 'Color Hover', 'selector' => '+.kc-pricing-tables:hover .kc-pricing-price span.content-duration'),
					array('property' => 'font-family', 'label' => 'Font Family', 'selector' => '.kc-pricing-price span.content-duration'),
					array('property' => 'font-size', 'label' => 'Font Size', 'selector' => '.kc-pricing-price span.content-duration'),
					array('property' => 'font-weight', 'label' => 'Font Weight', 'selector' => '.kc-pricing-price span.content-duration'),
					array('property' => 'line-height', 'label' => 'Line Height', 'selector' => '.kc-pricing-price span.content-duration'),
					array('property' => 'text-transform', 'label' => 'Text Transform', 'selector' => '.kc-pricing-price span.content-duration'),
					array('property' => 'margin', 'label' => 'Margin', 'selector' => '.kc-pricing-price span.content-duration'),
					array('property' => 'padding', 'label' => 'Padding', 'selector' => '.kc-pricing-price span.content-duration'),
					array('property' => 'display', 'label' => 'Display', 'selector' => '.kc-pricing-price span.content-duration'),
				),
				'Attributes'	=> array(
					array('property' => 'color', 'label' => 'Color', 'selector' => '.content-desc li'),
					array('property' => 'color', 'label' => 'Color Hover', 'selector' => '+:hover .content-desc li'),
					array('property' => 'background-color', 'label' => 'Background Color', 'selector' => '.content-desc'),
					array('property' => 'background-color', 'label' => 'Background Color 2', 'des' => 'Background color line highlight', 'selector' => '.content-desc li:nth-of-type(2n+1)'),
					array('property' => 'font-family', 'label' => 'Font Family', 'selector' => '.content-desc li'),
					array('property' => 'font-size', 'label' => 'Font Size', 'selector' => '.content-desc li'),
					array('property' => 'font-weight', 'label' => 'Font Weight', 'selector' => '.content-desc li'),
					array('property' => 'line-height', 'label' => 'Line Height', 'selector' => '.content-desc li'),
					array('property' => 'text-transform', 'label' => 'Text Transform', 'selector' => '.content-desc li'),
					array('property' => 'text-align', 'label' => 'Text Align', 'selector' => '.content-desc li'),
					array('property' => 'border', 'label' => 'Border', 'selector' => '.content-desc li'),
					array('property' => 'padding', 'label' => 'Padding', 'selector' => '.content-desc li'),
					array('property' => 'margin', 'label' => 'Margin', 'selector' => '.content-desc li:last-child,.content-desc li:first-child'),
					array('property' => 'margin', 'label' => 'Icon Spacing', 'selector' => '.content-desc li i'),
				),
				'Attributes Box'	=> array(
					array('property' => 'color', 'label' => 'Color', 'selector' => '.content-desc'),
					array('property' => 'color', 'label' => 'Color Hover', 'selector' => '+:hover .content-desc'),
					array('property' => 'background', 'label' => 'Background', 'selector' => '.content-desc'),
					array('property' => 'background', 'label' => 'Background Hover', 'selector' => '+:hover .content-desc'),
					array('property' => 'font-family', 'label' => 'Font Family', 'selector' => '.content-desc'),
					array('property' => 'font-size', 'label' => 'Font Size', 'selector' => '.content-desc'),
					array('property' => 'font-weight', 'label' => 'Font Weight', 'selector' => '.content-desc'),
					array('property' => 'line-height', 'label' => 'Line Height', 'selector' => '.content-desc'),
					array('property' => 'text-transform', 'label' => 'Text Transform', 'selector' => '.content-desc'),
					array('property' => 'text-align', 'label' => 'Text Align', 'selector' => '.content-desc'),
					array('property' => 'border', 'label' => 'Border', 'selector' => '.content-desc'),
					array('property' => 'border-radius', 'label' => 'Border Radius', 'selector' => '.content-desc'),
					array('property' => 'padding', 'label' => 'Padding', 'selector' => '.content-desc'),
					array('property' => 'margin', 'label' => 'Margin', 'selector' => '.content-desc'),
				),
				'Button' => array(
					array('property' => 'float', 'label' => 'Float', 'selector' => '.content-button'),
					array('property' => 'color', 'label' => 'Text Color', 'selector' => '.content-button a'),
					array('property' => 'color', 'label' => 'Text Hover Color', 'selector' => '.content-button a:hover'),
					array('property' => 'background-color', 'label' => 'Button BG Color', 'selector' => '.content-button a'),
					array('property' => 'background-color', 'label' => 'Button BG Hover Color', 'selector' => '.content-button a:hover'),
					array('property' => 'background', 'selector' => '.content-button a'),
					array('property' => 'background', 'selector' => '.content-button a:hover'),
					array('property' => 'background-color', 'label' => 'Button Wrap BG Color', 'selector' => '.content-button'),
					array('property' => 'background-color', 'label' => 'Button Wrap BG Hover Color', 'selector' => '+:hover.content-button'),
					array('property' => 'font-family', 'label' => 'Font Family', 'selector' => '.content-button a'),
					array('property' => 'font-size', 'label' => 'Font Size', 'selector' => '.content-button a'),
					array('property' => 'line-height', 'label' => 'Line Height', 'selector' => '.content-button a'),
					array('property' => 'font-weight', 'label' => 'Font Weight', 'selector' => '.content-button a'),
					array('property' => 'text-align', 'label' => 'Button Align', 'selector' => '.content-button'),
					array('property' => 'text-transform', 'label' => 'Text Transform', 'selector' => '.content-button a'),
                    array('property' => 'letter-spacing', 'label'    => esc_html__( 'Letter Spacing', 'ssc' ), 'selector' => '.content-button a',),
					array('property' => 'width', 'label' => 'Width', 'selector' => '.content-button a'),
					array('property' => 'box-shadow', 'label' => 'Box Shadow', 'selector' => '.content-button a'),
					array('property' => 'border', 'label' => 'Button Border', 'selector' => '.content-button a'),
					array('property' => 'border-color', 'label' => 'Button Border Color Hover', 'selector' => '.content-button a:hover'),
					array('property' => 'border-radius', 'label' => 'Border Radius', 'selector' => '.content-button a'),
					array('property' => 'background-color', 'label' => 'Wrapper Button BG Color', 'selector' => '.content-button'),
					array('property' => 'padding', 'label' => 'Padding', 'selector' => '.content-button a'),
					array('property' => 'margin', 'label' => 'Margin', 'selector' => '.content-button a'),
					array( 'property' => 'display', 'label'    => esc_html__( 'Icon Display', 'ssc' ), 'selector' => '.content-button a div', ),
					array( 'property' => 'width', 'label'    => esc_html__( 'Icon Width', 'ssc' ), 'selector' => '.content-button svg, .content-button img', ),
					array( 'property' => 'height', 'label'    => esc_html__( 'Icon Height', 'ssc' ), 'selector' => '.content-button svg, .content-button img', ),
					array( 'property' => 'font-size', 'label'    => esc_html__( 'Icon Font Size', 'ssc' ), 'selector' => '.content-button i', ),
					array( 'property' => 'box-shadow', 'label'    => esc_html__( 'Box Shadow', 'ssc' ), 'selector' => '.content-button svg, .content-button img', ),
					array( 'property' => 'padding', 'label'    => esc_html__( 'Padding', 'ssc' ), 'selector' => '.content-button svg, .content-button img', ),
					array( 'property' => 'margin', 'label'    => esc_html__( 'Margin', 'ssc' ), 'selector' => '.content-button svg, .content-button img', ),
				),
				'Button Icon' => array(
					array('property' => 'color', 'label' => 'Text Color', 'selector' => '.content-button svg, .content-button i, .content-button img'),
					array('property' => 'color', 'label' => 'Text Hover Color', 'selector' => '.content-button:hover svg, .content-button:hover i, .content-button:hover img'),
					array('property' => 'fill', 'label' => esc_html__( 'Fill', 'ssc' ), 'selector' => ' .button-svg svg'),
					array('property' => 'fill', 'label' => esc_html__( 'Fill', 'ssc' ) . ' ' . esc_html__( 'Hover', 'ssc' ), 'selector' => ' .content-button a:hover .button-svg svg'),
					array('property' => 'background-color', 'label' => 'Button BG Color', 'selector' => '.content-button svg, .content-button i, .content-button img'),
					array('property' => 'background-color', 'label' => 'Button BG Hover Color', 'selector' => '.content-button:hover svg, .content-button:hover i, .content-button:hover img'),
					array('property' => 'background', 'selector' => '.content-button svg, .content-button i, .content-button img'),
					array('property' => 'background', 'selector' => '.content-button:hover svg, .content-button:hover i, .content-button:hover img'),
					array('property' => 'font-family', 'label' => 'Font Family', 'selector' => '.content-button svg, .content-button i, .content-button img'),
					array('property' => 'font-size', 'label' => 'Font Size', 'selector' => '.content-button svg, .content-button i, .content-button img'),
					array('property' => 'line-height', 'label' => 'Line Height', 'selector' => '.content-button svg, .content-button i, .content-button img'),
					array('property' => 'font-weight', 'label' => 'Font Weight', 'selector' => '.content-button svg, .content-button i, .content-button img'),
					array('property' => 'text-align', 'label' => 'Button Align', 'selector' => '.content-button'),
					array('property' => 'text-transform', 'label' => 'Text Transform', 'selector' => '.content-button svg, .content-button i, .content-button img'),
					array('property' => 'width', 'label' => 'Width', 'selector' => '.content-button svg, .content-button i, .content-button img'),
					array('property' => 'height', 'label' => 'Height', 'selector' => '.content-button svg, .content-button i, .content-button img'),
					array('property' => 'box-shadow', 'label' => 'Box Shadow', 'selector' => '.content-button svg, .content-button i, .content-button img'),
					array('property' => 'border', 'label' => 'Button Border', 'selector' => '.content-button svg, .content-button i, .content-button img'),
					array('property' => 'border-color', 'label' => 'Button Border Color Hover', 'selector' => '.content-button:hover svg, .content-button:hover i, .content-button:hover img'),
					array('property' => 'border-radius', 'label' => 'Border Radius', 'selector' => '.content-button svg, .content-button i, .content-button img'),
					array('property' => 'background-color', 'label' => 'Wrapper Button BG Color', 'selector' => '.content-button'),
					array('property' => 'padding', 'label' => 'Padding', 'selector' => '.content-button svg, .content-button i, .content-button img'),
					array('property' => 'margin', 'label' => 'Margin', 'selector' => '.content-button svg, .content-button i, .content-button img'),
					array( 'property' => 'display', 'label'    => esc_html__( 'Icon Display', 'ssc' ), 'selector' => '.content-button svg, .content-button i, .content-button img div', ),
				),
				'After Button'	=> array(
					array('property' => 'color', 'label' => 'Color', 'selector' => '.after-button-description'),
					array('property' => 'color', 'label' => 'Color Hover', 'selector' => '+:hover .after-button-description'),
					array('property' => 'font-family', 'label' => 'Font Family', 'selector' => '.after-button-description'),
					array('property' => 'font-size', 'label' => 'Font Size', 'selector' => '.after-button-description'),
					array('property' => 'font-weight', 'label' => 'Font Weight', 'selector' => '.after-button-description'),
					array('property' => 'line-height', 'label' => 'Line Height', 'selector' => '.after-button-description'),
					array('property' => 'text-transform', 'label' => 'Text Transform', 'selector' => '.after-button-description'),
					array('property' => 'text-align', 'label' => 'Text Align', 'selector' => '.after-button-description'),
					array('property' => 'background-color', 'label' => 'Bg Color', 'selector' => '.after-button-description'),
					array('property' => 'background-color', 'label' => 'Bg Color Hover', 'selector' => '+.kc-pricing-tables:hover .after-button-description'),
					array('property' => 'float', 'label' => 'Float', 'selector' => '.after-button-description'),
					array('property' => 'margin', 'label' => 'Margin', 'selector' => '.after-button-description'),
					array('property' => 'padding', 'label' => 'Padding', 'selector' => '.after-button-description'),
					array('property' => 'border', 'label' => esc_html__( 'Border', 'ssc' ), 'selector' => '.after-button-description'),
					array('property' => 'border-radius', 'label' => esc_html__( 'Border Radius', 'ssc' ), 'selector' => '.after-button-description'),
					array('property' => 'border', 'label' => esc_html__( 'Border Hover', 'ssc' ), 'selector' => '+:hover .after-button-description'),
					array('property' => 'border-radius', 'label' => esc_html__( 'Border Radius Hover', 'ssc' ), 'selector' => '+:hover .header-pricing .after-button-description,+:hover .after-button-description'),
				),
				'Icon'	=> array(
					array('property' => 'color', 'label' => 'Color', 'selector' => 'i'),
					array('property' => 'color', 'label' => 'Hover Color', 'selector' => '+.kc-pricing-tables:hover i'),
					array('property' => 'background-color', 'label' => 'Background Color', 'selector' => 'i'),
					array('property' => 'background-color', 'label' => 'Hover BG Color', 'selector' => '+.kc-pricing-tables:hover i'),
					array('property' => 'font-size', 'label' => 'Font Size', 'selector' => 'i'),
					array('property' => 'line-height', 'label' => 'Line Height', 'selector' => 'i'),
					array('property' => 'width', 'label' => 'Width', 'selector' => 'i'),
					array('property' => 'height', 'label' => 'Height', 'selector' => 'i'),
					array('property' => 'border', 'label' => 'Border', 'selector' => 'i'),
					array('property' => 'border-color', 'label' => 'Hover Border', 'selector' => '+.kc-pricing-tables:hover i'),
					array('property' => 'background-color', 'label' => 'Wrapper Bg', 'selector' => '+.kc-pricing-tables .content-icon-header'),
					array('property' => 'background-color', 'label' => 'Wrapper Bg Hover', 'selector' => '+.kc-pricing-tables:hover .content-icon-header'),
					array('property' => 'border-radius', 'label' => 'Border Radius', 'selector' => 'i'),
					array('property' => 'margin', 'label' => 'Margin', 'selector' => 'i'),
					array('property' => 'padding', 'label' => 'Padding', 'selector' => 'i'),
				),
				'SVG'    => array(
					array('property' => 'fill', 'label' => esc_html__( 'Fill', 'ssc' ), 'selector' => ' .content-svg-header svg'),
					array('property' => 'fill', 'label' => esc_html__( 'Fill', 'ssc' ) . ' ' . esc_html__( 'Hover', 'ssc' ), 'selector' => ':hover .content-svg-header svg'),
					array(
						'property' => 'display',
						'label'    => esc_html__( 'Display', 'ssc' ),
						'selector' => '.content-svg-header svg',
					),
					array('property' => 'float', 'label' => 'Float', 'selector' => '.content-svg-header'),
					array(
						'property' => 'width',
						'label'    => esc_html__( 'Width', 'ssc' ),
						'selector' => '.content-svg-header svg',
					),
					array(
						'property' => 'height',
						'label'    => esc_html__( 'Height', 'ssc' ),
						'selector' => '.content-svg-header svg',
					),
					array(
						'property' => 'box-shadow',
						'label'    => esc_html__( 'Box Shadow', 'ssc' ),
						'selector' => '.content-svg-header svg',
					),
					array(
						'property' => 'padding',
						'label'    => esc_html__( 'Padding', 'ssc' ),
						'selector' => '.content-svg-header svg',
					),
					array(
						'property' => 'margin',
						'label'    => esc_html__( 'Margin', 'ssc' ),
						'selector' => '.content-svg-header svg',
					),
				),
				'Boxes'	=> array(
					array('property' => 'background'),
					array('property' => 'background-color', 'label' => 'BG Color Hover', 'selector' => '+:hover'),
					array('property' => 'background', 'selector' => '+:hover'),
					array('property' => 'display', 'label' => 'Display'),
					array('property' => 'float', 'label' => 'Float'),
					array('property' => 'width', 'label' => 'Width'),
					array('property' => 'max-width', 'label' => 'Max Width'),
					array('property' => 'box-shadow', 'label' => 'Box Shadow', 'selector' => '+.kc-pricing-tables'),
					array('property' => 'box-shadow', 'label' => 'Box Shadow Hover', 'selector' => '+:hover'),
					array('property' => 'border', 'label' => 'Border'),
					array('property' => 'border-color', 'label' => 'Border Color Hover', 'selector' => '+.kc-pricing-tables:hover'),
					array('property' => 'border-radius', 'label' => 'Border Radius'),
					array('property' => 'border-radius', 'label' => 'Border Radius Hover', 'selector' => '+:hover'),
					array('property' => 'margin', 'label' => 'Margin'),
					array('property' => 'margin', 'label' => 'Margin Hover', 'selector' => '+:hover'),
					array('property' => 'padding', 'label' => 'Padding'),
				),
				'Sticker'	=> array(
					array('property' => 'color', 'label' => 'Color', 'selector' => '.sticker'),
					array('property' => 'color', 'label' => 'Hover Color', 'selector' => '+.kc-pricing-tables:hover .sticker'),
					array('property' => 'background-color', 'label' => 'Background Color', 'selector' => '.sticker'),
					array('property' => 'background-color', 'label' => 'Hover BG Color', 'selector' => '+.kc-pricing-tables:hover .sticker'),
					array('property' => 'font-size', 'label' => 'Font Size', 'selector' => '.sticker'),
					array('property' => 'font-weight', 'label' => 'Font Weight', 'selector' => '.sticker'),
					array('property' => 'line-height', 'label' => 'Line Height', 'selector' => '.sticker'),
					array('property' => 'text-transform', 'label' => 'Text Transform', 'selector' => '.sticker'),
					array('property' => 'width', 'label' => 'Width', 'selector' => '.sticker'),
					array('property' => 'height', 'label' => 'Height', 'selector' => '.sticker'),
					array('property' => 'box-shadow', 'label' => 'Box Shadow', 'selector' => '.sticker'),
					array('property' => 'border', 'label' => 'Border', 'selector' => '.sticker'),
					array('property' => 'border-color', 'label' => 'Hover Border', 'selector' => '+.kc-pricing-tables:hover .sticker'),
					array('property' => 'background-color', 'label' => 'Wrapper Bg', 'selector' => '+.kc-pricing-tables .sticker'),
					array('property' => 'background-color', 'label' => 'Wrapper Bg Hover', 'selector' => '+.kc-pricing-tables:hover .sticker'),
					array('property' => 'border-radius', 'label' => 'Border Radius', 'selector' => '.sticker'),
					array('property' => 'margin', 'label' => 'Margin', 'selector' => '.sticker'),
					array('property' => 'padding', 'label' => 'Padding', 'selector' => '.sticker'),
				),
				'Prefix'	=> array(
					array('property' => 'color', 'label' => 'Color', 'selector' => '.content-button sup'),
					array('property' => 'color', 'label' => 'Color Hover', 'selector' => '+:hover .content-button sup'),
					array('property' => 'font-family', 'label' => 'Font Family', 'selector' => '.content-button sup'),
					array('property' => 'font-size', 'label' => 'Font Size', 'selector' => '.content-button sup'),
					array('property' => 'font-weight', 'label' => 'Font Weight', 'selector' => '.content-button sup'),
					array('property' => 'line-height', 'label' => 'Line Height', 'selector' => '.content-button sup'),
					array('property' => 'text-transform', 'label' => 'Text Transform', 'selector' => '.content-button sup'),
                    array('property' => 'letter-spacing', 'label' => 'Letter Spacing', 'selector' => '.kc-pricing-price'),
					array('property' => 'background-color', 'label' => 'Bg Color', 'selector' => '.content-button sup'),
					array('property' => 'background-color', 'label' => 'Bg Color Hover', 'selector' => '+:hover .content-button sup'),
					array('property' => 'margin', 'label' => 'Margin', 'selector' => '.content-button sup'),
					array('property' => 'padding', 'label' => 'Padding', 'selector' => '.content-button sup'),
				),
				'Suffix'	=> array(
					array('property' => 'color', 'label' => 'Color', 'selector' => '.content-button sub'),
					array('property' => 'color', 'label' => 'Color Hover', 'selector' => '+:hover .content-button sub'),
					array('property' => 'font-family', 'label' => 'Font Family', 'selector' => '.content-button sub'),
					array('property' => 'font-size', 'label' => 'Font Size', 'selector' => '.content-button sub'),
					array('property' => 'font-weight', 'label' => 'Font Weight', 'selector' => '.content-button sub'),
					array('property' => 'line-height', 'label' => 'Line Height', 'selector' => '.content-button sub'),
					array('property' => 'text-transform', 'label' => 'Text Transform', 'selector' => '.content-button sub'),
                    array('property' => 'letter-spacing', 'label' => 'Letter Spacing', 'selector' => '.kc-pricing-price'),
					array('property' => 'background-color', 'label' => 'Bg Color', 'selector' => '.content-button sub'),
					array('property' => 'background-color', 'label' => 'Bg Color Hover', 'selector' => '+:hover .content-button sub'),
					array('property' => 'margin', 'label' => 'Margin', 'selector' => '.content-button sub'),
					array('property' => 'padding', 'label' => 'Padding', 'selector' => '.content-button sub'),
				),
				//Custom code css
				'Custom'      => array(
					array(
						'property' => 'custom',
						'label'    => esc_html__( 'Custom CSS' ),
					),
				),
			),

		);
		$atts['live_editor'] = SSC_SHORTCODES_PATH . 'live/kc_pricing.php';
		if ( isset( $atts['params']['styling'][0] ) ) {
			$atts['params']['styling'][0]['options'] = $css_map;
		}

		if ( isset( $atts['params']['general'][0]['options'] ) ) {
			$atts['params']['general'][0]['options']['3'] = SSC_URL . 'images/price3.jpg';
			$atts['params']['general'][0]['options']['5'] = SSC_URL . 'images/price5.gif';
		}

	}

	return $atts;
}

add_filter( 'shortcode_kc_pricing_before_css_generating', 'ssc_kc_pricing_filter_css' );

function ssc_kc_pricing_filter_css( $atts ) {
	$styles = array();
	extract( shortcode_atts( array(
		'show_svg' => '', //+
		'svg'      => '', //+
		'svg_c'    => '', //+
		'svg_hc'   => '', //+

		'show_button'      => '', //+
		'button_icon_type' => '',
		'button_svg'       => '',
		'b_svg_c'          => '',
		'b_svg_hc'         => '',
	),
		$atts ) );

	if ( $show_svg == 'yes' && '' !== $svg ) {
		if ( ! empty ( $atts['css_custom'] ) ) {
			$styles = json_decode( str_replace( '`', '"', $atts['css_custom'] ), true);
		}
		if ( '' !== $svg_c ) {
			if ( empty ( $styles['kc-css']['any']['svg']['fill| .content-svg-header svg'] ) ) {
				$styles['kc-css']['any']['svg']['fill| .content-svg-header svg'] = $svg_c;
			}
		}
		if ( '' !== $svg_hc ) {
			if ( empty ( $styles['kc-css']['any']['svg']['fill|:hover .content-svg-header svg'] ) ) {
				$styles['kc-css']['any']['svg']['fill|:hover .content-svg-header svg'] = $svg_hc;
			}
		}
	}

	if ( $show_button == 'yes' ) {
		switch ( $button_icon_type ) {
			case 'svg':
				if ( '' !== $button_svg ) {
					if( empty( $styles ) ) {
						if ( ! empty ( $atts['css_custom'] ) ) {
							$styles = json_decode( str_replace( '`', '"', $atts['css_custom'] ), true);
						}
					}
					if ( '' !== $b_svg_c ) {
						if ( empty ( $styles['kc-css']['any']['button-icon']['fill| .button-svg svg'] ) ) {
							$styles['kc-css']['any']['button-icon']['fill| .button-svg svg'] = $b_svg_c;
						}
					}
					if ( '' !== $b_svg_hc ) {
						if ( empty ( $styles['kc-css']['any']['button-icon']['fill| .content-button a:hover .button-svg svg'] ) ) {
							$styles['kc-css']['any']['button-icon']['fill| .content-button a:hover .button-svg svg'] = $b_svg_hc;
						}
					}
				}
				break;
		}
	}

	if( empty( $styles ) ){
		return $atts;
	}

	$atts['css_custom'] = str_replace( '"', '`', json_encode( $styles, JSON_FORCE_OBJECT  ) );

	return $atts;
}
