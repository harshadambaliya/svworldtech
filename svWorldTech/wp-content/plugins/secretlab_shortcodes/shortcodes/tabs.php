<?php

add_action( 'init', 'ssc_carousel_params', 99 );

/**
 * Additional functions
 */
function ssc_carousel_params() {
	global $kc;

	//register template folder with KingComposer
	$kc->set_template_path( SSC_SHORTCODES_PATH . 'templates/' );
	$kc->add_map_param(
		'kc_tabs', //element slug - shortcode tag name
		array(
			'name'     => 'template',
			'label'    => esc_html__( 'Select Template', 'ssc' ),
			'type'     => 'radio_image',  // USAGE TEXT TYPE
			'options'  => array(
				'1' => SSC_URL . 'images/car1.gif',
				'2' => SSC_URL . 'images/car2.gif',
				'3' => SSC_URL . 'images/car3.gif',
				'4' => SSC_URL . 'images/car4.gif',
				'7' => SSC_URL . 'images/car4.gif',
				'5' => SSC_URL . 'images/car5.gif',
				'6' => SSC_URL . 'images/car6.gif',
				'8' => SSC_URL . 'images/car8.gif',
			),
			'value'    => '1', // remove this if you do not need a default content,
			'relation' => array(
				'parent'    => 'type',
				'show_when' => 'slider_tabs',
			),
		),
		3 //position of param
	);
	$kc->add_map_param(
		'kc_tabs', //element slug - shortcode tag name
		array(
			'name' => 'n_type',
			'label' => esc_html__( 'Label Type', 'ssc' ),
			'type' => 'radio',
			'options' => array(
                'icon' => esc_html__( 'Icon', 'ssc' ),
				'svg' => esc_html__( 'SVG', 'ssc' ),
//					'img' => esc_html__( 'Image', 'ssc' ),
//			        'text' => esc_html__( 'Text', 'ssc' ),
			),
			'value' => 'icon',
			'description' => esc_html__( 'Pick what to use: svg or icons', 'ssc' ),
			'relation' => array(
				'parent'    => 'type',
				'show_when' => 'slider_tabs',
			),
		),
		10 //position of param
	);
	$kc->add_map_param(
		'kc_tabs', //element slug - shortcode tag name
		array(
			'name' => 'l_svg',
			'label' => esc_html__( 'Select Left SVG Icon', 'ssc' ),
			'type' => 'attach_image',
			'admin_label' => true,
			'relation' => array(
				'parent' => 'n_type',
				'show_when' => 'svg'
			),
		),
		15 //position of param
	);
	$kc->add_map_param(
		'kc_tabs', //element slug - shortcode tag name
		array(
			'name' => 'r_svg',
			'label' => esc_html__( 'Select Right SVG Icon', 'ssc' ),
			'type' => 'attach_image',
			'admin_label' => true,
			'relation' => array(
				'parent' => 'n_type',
				'show_when' => 'svg'
			),
		),
		16 //position of param
	);
	$kc->add_map_param(
		'kc_tabs', //element slug - shortcode tag name
		array(
			'type' => 'color_picker',
			'label' => esc_html__( 'SVG Color', 'ssc' ),
			'name' => 'svg_color',
			'relation' => array(
				'parent' => 'n_type',
				'show_when' => 'svg'
			),
			'description' => esc_html__( 'Deprecated! Use "fill" field at the "Styling" tab instead.', 'ssc' ),
		),
		20 //position of param
	);
	$kc->add_map_param(
		'kc_tabs', //element slug - shortcode tag name
		array(
			'type' => 'color_picker',
			'label' => esc_html__( 'SVG Hover Color', 'ssc' ),
			'name' => 'svg_hcolor',
			'relation' => array(
				'parent' => 'n_type',
				'show_when' => 'svg'
			),
			'description' => esc_html__( 'Deprecated! Use "fill" field at the "Styling" tab instead.', 'ssc' ),
		),
		25 //position of param
	);
	$kc->add_map_param(
		'kc_tabs', //element slug - shortcode tag name
		array(
			'name'        => 'iconleft',
			'label'       => __( 'Icon', 'ssc' ),
			'type'        => 'icon_picker',
			'description' => __( 'Icon for a left arrow', 'ssc' ),
			'value'       => 'fa-arrow-left',
			'relation'    => array(
				'parent' => 'n_type',
				'show_when' => 'icon'
			),
		),
		30 //position of param
	);
	$kc->add_map_param(
		'kc_tabs', //element slug - shortcode tag name
		array(
			'name'        => 'iconright',
			'label'       => __( 'Icon', 'ssc' ),
			'type'        => 'icon_picker',
			'description' => __( 'Icon for a right arrow', 'ssc' ),
			'value'       => 'fa-arrow-right',
			'relation'    => array(
				'parent' => 'n_type',
				'show_when' => 'icon'
			),
		),
		35 //position of param
	);
	$kc->add_map_param(
		'kc_tabs', //element slug - shortcode tag name
		array(
			'name'        => 'textleft',
			'label'       => __( 'Label left', 'ssc' ),
			'type'        => 'text',
			'description' => __( 'Text for a left arrow', 'ssc' ),
			'value'       => '',
			'relation'    => array(
				'parent' => 'n_type',
				'show_when' => 'icon'
			),
		),
		40 //position of param
	);
	$kc->add_map_param(
		'kc_tabs', //element slug - shortcode tag name
		array(
			'name'        => 'textright',
			'label'       => __( 'Label right', 'ssc' ),
			'type'        => 'text',
			'description' => __( 'Text for a right arrow', 'ssc' ),
			'value'       => '',
			'relation'    => array(
				'parent' => 'n_type',
				'show_when' => 'icon'
			),
		),
		45 //position of param
	);
	$kc->add_map_param(
		'kc_tabs', //element slug - shortcode tag name
		array(
			'name'        => 'stop_on_hover',
			'label'       => esc_html__( 'Stop on hover', 'ssc' ),
			'type'        => 'toggle',
			'description' => esc_html__( 'Stop autoplay on mouse hover.', 'ssc' ),
			'value'       => 'yes',
			'relation'    => array(
				'parent'    => 'autoplay',
				'show_when' => array( 'yes' ),
			),
		),
		50 //position of param
	);
	$kc->add_map_param(
		'kc_tabs', //element slug - shortcode tag name
		array(
			'name'        => 'stagePadding',
			'label'       => esc_html__( 'Padding', 'ssc' ),
			'type'        => 'number_slider',
			'description' => esc_html__( 'Padding left and right on stage (can see neighbours).', 'ssc' ),
			'value'       => '0',
			'options'     => array(
				'min'        => 0,
				'max'        => 50,
				'show_input' => true,
			),
			'relation'    => array(
				'parent'    => 'type',
				'show_when' => 'slider_tabs',
			),
		),
		55 //position of param
	);
	$kc->add_map_param(
		'kc_tabs', //element slug - shortcode tag name
		array(
			'name'        => 'progress_bar',
			'label'       => esc_html__( 'Progress Bar', 'ssc' ),
			'type'        => 'toggle',
			'description' => esc_html__( 'Visualize the progression of displaying photos.', 'ssc' ),
			'relation'    => array(
				'parent'    => 'type',
				'show_when' => 'slider_tabs',
			),
		),
		60 //position of param
	);
	$kc->add_map_param(
		'kc_tabs', //element slug - shortcode tag name
		array(
			'name'        => 'lazy_load',
			'label'       => esc_html__( 'Lazy load', 'ssc' ),
			'type'        => 'toggle',
			'description' => esc_html__( 'Delays loading of images.', 'ssc' ),
			'relation'    => array(
				'parent'    => 'type',
				'show_when' => 'slider_tabs',
			),
		),
		65 //position of param
	);
}

add_filter( 'kc_add_map', 'ssc_kc_tabs_map_filter', 0 /*priority index*/, 2 /*number of params*/ );

function ssc_kc_tabs_map_filter( $atts, $base ) {

	if ( 'kc_tabs' == $base ) {

		$css_map = array(
			array(
				"screens" => "any,1024,999,767,479",
				'Box' => array(
					array('property' => 'background'),
					array('property' => 'background', 'selector' => '+:hover'),
					array('property' => 'display', 'label' => esc_html__( 'Display', 'ssc' )),
					array('property' => 'float', 'label' => esc_html__( 'Float', 'ssc' )),
					array('property' => 'width', 'label' => esc_html__( 'Width', 'ssc' )),
					array('property' => 'height', 'label' => esc_html__( 'Height', 'ssc' )),
					array('property' => 'box-shadow', 'label' => esc_html__( 'Box Shadow', 'ssc' )),
					array('property' => 'box-shadow', 'label' => esc_html__( 'Box Shadow', 'ssc' ).' '. esc_html__( 'Hover', 'ssc' ), 'selector' => '+:hover'),
					array('property' => 'opacity', 'label' => esc_html__( 'Opacity', 'ssc' )),
					array('property' => 'opacity', 'label' => esc_html__( 'Opacity', 'ssc' ).' '. esc_html__( 'Hover', 'ssc' ), 'selector' => '+i:hover'),
					array('property' => 'margin', 'label' => esc_html__( 'Margin', 'ssc' )),
					array('property' => 'margin', 'label' => esc_html__( 'Margin', 'ssc' ).' '. esc_html__( 'Hover', 'ssc' ), 'selector' => '+i:hover'),
					array('property' => 'padding', 'label' => esc_html__( 'Padding', 'ssc' )),
					array('property' => 'padding', 'label' => esc_html__( 'Padding', 'ssc' ).' '. esc_html__( 'Hover', 'ssc' ), 'selector' => '+i:hover'),
					array('property' => 'padding', 'label' => esc_html__( 'Padding', 'ssc' ).esc_html__( ' Slider Box', 'ssc' ), 'selector' => '.owl-wrapper-outer'),

					array('property' => 'border', 'label' => esc_html__( 'Border', 'ssc' )),
					array('property' => 'border', 'label' => esc_html__( 'Border', 'ssc' ).' '. esc_html__( 'Hover', 'ssc' ), 'selector' => '+i:hover'),
					array('property' => 'border-radius', 'label' => esc_html__( 'Border Radius', 'ssc' )),
					array('property' => 'border-radius', 'label' => esc_html__( 'Border Radius', 'ssc' ).' '. esc_html__( 'Hover', 'ssc' ), 'selector' => '+i:hover'),
				),
				'Tab'     => array(
					array( 'property' => 'font-family,font-size,line-height,font-weight,text-transform,text-align', 'label'    => esc_html__( 'Font family', 'ssc' ), 'selector' => '.kc_tabs_nav, .kc_tabs_nav > li a,+.kc_vertical_tabs>.kc_wrapper>ul.ui-tabs-nav>li>a', ),
					array( 'property' => 'font-size,color,padding', 'label'    => esc_html__( 'Icon Size,Icon Color,Icon Spacing', 'ssc' ), 'selector' => '.kc_tabs_nav a i,+.kc_vertical_tabs>.kc_wrapper>ul.ui-tabs-nav>li>a i', ),
					array( 'property' => 'color', 'label'    => esc_html__( 'Text Color', 'ssc' ), 'selector' => '.kc_tabs_nav a, .kc_tabs_nav,+.kc_vertical_tabs>.kc_wrapper>ul.ui-tabs-nav>li>a', ),
					array( 'property' => 'background-color', 'label'    => esc_html__( 'Background Color', 'ssc' ), 'selector' => '.kc_tabs_nav,+.kc_vertical_tabs>.kc_wrapper>ul.ui-tabs-nav', ),
					array( 'property' => 'background-color', 'label'    => esc_html__( 'Background Color tab item', 'ssc' ), 'selector' => '.kc_tabs_nav li,+.kc_vertical_tabs>.kc_wrapper>ul.ui-tabs-nav li', ),
					array('property' => 'background', 'selector' => '.ui-tabs-nav > li'),
					array( 'property' => 'opacity', 'label'    => esc_html__( 'Opacity', 'ssc' ), 'selector' => '.ui-tabs-nav > li' ),
					array('property' => 'display', 'label' => esc_html__( 'Display', 'ssc' ), 'selector' => '.ui-tabs-nav > li'),
					array('property' => 'float', 'label' => esc_html__( 'Float', 'ssc' ), 'selector' => '.ui-tabs-nav > li'),
					array( 'property' => 'border', 'label'    => esc_html__( 'Border', 'ssc' ), 'selector' => '+.kc_tabs .kc_wrapper .ui-tabs-nav > li > a'),
					array( 'property' => 'border', 'label'    => esc_html__( 'Border for Tab Box', 'ssc' ), 'selector' => '+.kc_tabs .kc_wrapper .ui-tabs-nav > li', ),
					array( 'property' => 'border-radius', 'label'    => esc_html__( 'Border-radius', 'ssc' ), 'selector' => '.kc_tabs_nav > li, .kc_tab.ui-tabs-body-active, .kc_tabs_nav,+.kc_vertical_tabs>.kc_wrapper>ul.ui-tabs-nav>li,.kc_vertical_tabs>.kc_wrapper>ul.ui-tabs-nav ~ div.kc_tab.ui-tabs-body-active,+.kc_vertical_tabs.tabs_right>.kc_wrapper>ul.ui-tabs-nav ~ div.kc_tab', ),
					array( 'property' => 'padding', 'label'    => esc_html__( 'Padding', 'ssc' ), 'selector' => '.kc_tabs_nav > li > a,+.kc_vertical_tabs>.kc_wrapper>ul.ui-tabs-nav>li>a', ),
					array( 'property' => 'margin', 'label'    => esc_html__( 'Margin Link', 'ssc' ), 'selector' => '.kc_tabs_nav > li > a,+.kc_vertical_tabs>.kc_wrapper>ul.ui-tabs-nav>li', ),
					array( 'property' => 'margin', 'label'    => esc_html__( 'Margin Tab', 'ssc' ), 'selector' => 'ul.ui-tabs-nav>li', ),
					array( 'property' => 'width', 'label'    => esc_html__( 'Width', 'ssc' ), 'selector' => '.kc_tabs_nav > li,+.kc_vertical_tabs>.kc_wrapper>ul.ui-tabs-nav>li', ),
					array( 'property' => 'height', 'label'    => esc_html__( 'Height', 'ssc' ), 'selector' => '.kc_tabs_nav > li,+.kc_vertical_tabs>.kc_wrapper>ul.ui-tabs-nav>li', ),
					array('property' => 'fill', 'label' => esc_html__( 'Fill', 'ssc' ), 'selector' => 'li a svg'),
					array('property' => 'fill', 'label' => esc_html__( 'Fill Hover', 'ssc' ), 'selector' => 'li:hover a svg'),
					array( 'property' => 'width', 'label'    => esc_html__( 'SVG Width', 'ssc' ), 'selector' => 'li a svg', ),
					array( 'property' => 'height', 'label'    => esc_html__( 'SVG Height', 'ssc' ), 'selector' => 'li a svg', ),
					array( 'property' => 'display', 'label' => esc_html__( 'SVG Display', 'ssc' ), 'selector' => 'li a svg' ),
					array( 'property' => 'float', 'label' => esc_html__( 'SVG float', 'ssc' ), 'selector' => 'li a svg' ),
					array( 'property' => 'box-shadow', 'label'    => esc_html__( 'SVG Box Shadow', 'ssc' ), 'selector' => 'li a svg', ),
					array( 'property' => 'margin', 'label'    => esc_html__( 'SVG Margin', 'ssc' ), 'selector' => 'li a svg', ),
					array( 'property' => 'margin', 'label'    => esc_html__( 'SVG Margin Hover', 'ssc' ), 'selector' => 'li:hover a svg', ),
					array( 'property' => 'opacity', 'label'    => esc_html__( 'SVG Opacity', 'ssc' ), 'selector' => 'li a svg', ),
					array( 'property' => 'opacity', 'label'    => esc_html__( 'SVG Opacity Hover', 'ssc' ), 'selector' => 'li:hover a svg', ),
				),

				'Tab Hover'  => array(
					array( 'property' => 'color', 'label'    => esc_html__( 'Text Color', 'ssc' ), 'selector' => '.kc_tabs_nav li:hover a, .kc_tabs_nav li:hover, .kc_tabs_nav > .ui-tabs-active:hover a,+.kc_vertical_tabs>.kc_wrapper>ul.ui-tabs-nav>li>a:hover,+.kc_vertical_tabs>.kc_wrapper>ul.ui-tabs-nav>li.ui-tabs-active > a'),
					array( 'property' => 'color', 'label'    => esc_html__( 'Icon Color', 'ssc' ), 'selector' => '.kc_tabs_nav li:hover a i,+.kc_vertical_tabs>.kc_wrapper>ul.ui-tabs-nav>li>a:hover i,+.kc_vertical_tabs>.kc_wrapper>ul.ui-tabs-nav>li.ui-tabs-active > a i'),
					array( 'property' => 'background-color', 'label'    => esc_html__( 'Background Color', 'ssc' ), 'selector' => '.kc_tabs_nav > li:hover, .kc_tabs_nav > li:hover a, .kc_tabs_nav > li > a:hover,+.kc_vertical_tabs>.kc_wrapper>ul.ui-tabs-nav>li>a:hover,+.kc_vertical_tabs>.kc_wrapper>ul.ui-tabs-nav>li.ui-tabs-active > a'),
					array('property' => 'background', 'selector' => '.ui-tabs-nav > li a:hover'),

					array( 'property' => 'border', 'label'    => esc_html__( 'Border', 'ssc' ), 'selector' => '+.kc_tabs .kc_wrapper .ui-tabs-nav > li > a:hover', ),
					array('property' => 'fill', 'label' => esc_html__( 'Fill', 'ssc' ), 'selector' => ' .kc_tabs_nav li a:hover svg'),
					array( 'property' => 'width', 'label'    => esc_html__( 'SVG Width', 'ssc' ), 'selector' => ' .kc_tabs_nav li a:hover svg', ),
					array( 'property' => 'height', 'label'    => esc_html__( 'SVG Height', 'ssc' ), 'selector' => ' .kc_tabs_nav li a:hover svg', ),
					array( 'property' => 'display', 'label' => esc_html__( 'SVG Display', 'ssc' ), 'selector' => '.kc_tabs_nav li a:hover svg' ),
					array( 'property' => 'float', 'label' => esc_html__( 'SVG float', 'ssc' ), 'selector' => '.kc_tabs_nav li a:hover svg' ),
					array( 'property' => 'box-shadow', 'label'    => esc_html__( 'SVG Box Shadow', 'ssc' ), 'selector' => ' .kc_tabs_nav li a:hover svg', ),
					array( 'property' => 'padding', 'label'    => esc_html__( 'SVG Padding', 'ssc' ), 'selector' => '.kc_tabs_nav li', ),
					array( 'property' => 'margin', 'label'    => esc_html__( 'SVG Margin', 'ssc' ), 'selector' => ' .kc_tabs_nav li a:hover svg', ),
					array( 'property' => 'opacity', 'label'    => esc_html__( 'SVG Opacity', 'ssc' ), 'selector' => ' .kc_tabs_nav li a:hover svg', ),
				),
				'Tab Active' => array(
					array( 'property' => 'color', 'label'    => esc_html__( 'Text Color', 'ssc' ), 'selector' => '.kc_tabs_nav li.ui-tabs-active a,+.kc_vertical_tabs>.kc_wrapper>ul.ui-tabs-nav>li.ui-tabs-active > a', ),
					array( 'property' => 'color', 'label'    => esc_html__( 'Icon Color', 'ssc' ), 'selector' => '.kc_tabs_nav li.ui-tabs-active a i, .kc_tabs_nav > .ui-tabs-active:focus a i,+.kc_vertical_tabs>.kc_wrapper>ul.ui-tabs-nav>li.ui-tabs-active > a i', ),
					array( 'property' => 'background-color', 'label'    => esc_html__( 'Background Color', 'ssc' ), 'selector' => '.kc_tabs_nav > .ui-tabs-active:focus, .kc_tabs_nav > .ui-tabs-active, .kc_tabs_nav > .ui-tabs-active > a,+.kc_vertical_tabs>.kc_wrapper>ul.ui-tabs-nav>li.ui-tabs-active > a', ),
					array( 'property' => 'background-color', 'label'    => esc_html__( 'Background Color Active Tab', 'ssc' ), 'selector' => 'ul.kc-tabs-slider-nav li.kc-title-active', ),
					array('property' => 'background', 'label' => esc_html__( 'Display', 'ssc' ), 'selector' => '.ui-tabs-nav > li.ui-tabs-active a'),
					array( 'property' => 'border', 'label'    => esc_html__( 'Border', 'ssc' ), 'selector' => '+.kc_tabs .kc_wrapper .ui-tabs-nav > li.ui-tabs-active > a'),
					array( 'property' => 'opacity', 'label'    => esc_html__( 'Opacity', 'ssc' ), 'selector' => '+.kc_tabs .kc_wrapper .ui-tabs-nav > li.ui-tabs-active > a'),
					array('property' => 'fill', 'label' => esc_html__( 'Fill', 'ssc' ), 'selector' => ' .kc_tabs_nav li.ui-tabs-active a svg'),
					array( 'property' => 'width', 'label'    => esc_html__( 'SVG Width', 'ssc' ), 'selector' => ' .kc_tabs_nav li.ui-tabs-active a svg', ),
					array( 'property' => 'height', 'label'    => esc_html__( 'SVG Height', 'ssc' ), 'selector' => ' .kc_tabs_nav li.ui-tabs-active a svg', ),
					array( 'property' => 'display', 'label' => esc_html__( 'SVG Display', 'ssc' ), 'selector' => '.kc_tabs_nav li.ui-tabs-active a svg' ),
					array( 'property' => 'float', 'label' => esc_html__( 'SVG float', 'ssc' ), 'selector' => '.kc_tabs_nav li.ui-tabs-active a svg' ),
					array( 'property' => 'box-shadow', 'label'    => esc_html__( 'SVG Box Shadow', 'ssc' ), 'selector' => ' .kc_tabs_nav li.ui-tabs-active a svg', ),
					array( 'property' => 'padding', 'label'    => esc_html__( 'SVG Padding', 'ssc' ), 'selector' => '.kc_tabs_nav li.ui-tabs-active', ),
					array( 'property' => 'margin', 'label'    => esc_html__( 'SVG Margin', 'ssc' ), 'selector' => ' .kc_tabs_nav li.ui-tabs-active a svg', ),
					array( 'property' => 'opacity', 'label'    => esc_html__( 'SVG Opacity', 'ssc' ), 'selector' => ' .kc_tabs_nav li.ui-tabs-active a svg', ),

				),
				'Tab Body'   => array(
					array( 'property' => 'background-color', 'label'    => esc_html__( 'Background Color', 'ssc' ), 'selector' => '.kc_tab', ),
                    array('property' => 'background', 'selector' => '.kc_tab'),
                    array('property' => 'width', 'label' => esc_html__( 'Width', 'ssc' ), 'selector' => '.kc_tab'),
                    array('property' => 'max-width', 'label' => esc_html__( 'Max-Width', 'ssc' ), 'selector' => '.kc_tab'),
                    array('property' => 'display', 'label' => esc_html__( 'Display', 'ssc' ), 'selector' => '.kc_tab'),
                    array('property' => 'float', 'label' => esc_html__( 'Float', 'ssc' ), 'selector' => '.kc_tab'),
					array( 'property' => 'padding', 'label'    => esc_html__( 'Spacing', 'ssc' ), 'selector' => '.kc_tab .kc_tab_content', ),
					array( 'property' => 'display', 'label' => esc_html__( 'Display', 'ssc' ) ),
					array( 'property' => 'border', 'label'    => esc_html__( 'Border', 'ssc' ), 'selector' => '.kc_wrapper > ul.ui-tabs-nav ~ div.kc_tab.ui-tabs-body-active'),
				),
				'Tab Image'   => array(
					array( 'property' => 'display', 'label' => esc_html__( 'Display', 'ssc' ), 'selector' => '.ui-tabs-nav > li img' ),
					array( 'property' => 'float', 'label' => esc_html__( 'Float', 'ssc' ), 'selector' => '.ui-tabs-nav > li img' ),
					array('property' => 'width', 'label' => esc_html__( 'Width', 'ssc' ), 'selector' => '.ui-tabs-nav > li img'),
					array('property' => 'max-width', 'label' => esc_html__( 'Max-Width', 'ssc' ), 'selector' => '.ui-tabs-nav > li img'),
					array('property' => 'height', 'label' => esc_html__( 'Height', 'ssc' ), 'selector' => '.ui-tabs-nav > li img'),
					array( 'property' => 'margin', 'label'    => esc_html__( 'Margin', 'ssc' ), 'selector' => '.ui-tabs-nav > li img'),
					array( 'property' => 'padding', 'label'    => esc_html__( 'Padding', 'ssc' ), 'selector' => '.ui-tabs-nav > li img'),
				),
				'Tabs Box' => array(
					array('property' => 'text-align', 'label' => 'Text Align', 'selector' => '.kc-tabs-slider-nav, .kc_tabs_nav'),
					array('property' => 'background', 'selector' => '.kc-tabs-slider-nav'),
					array('property' => 'background', 'selector' => '+i:hover .kc-tabs-slider-nav'),
					array('property' => 'display', 'label' => esc_html__( 'Display', 'ssc' ), 'selector' => '.kc-tabs-slider-nav'),
					array('property' => 'float', 'label' => esc_html__( 'Float', 'ssc' ), 'selector' => '.kc-tabs-slider-nav'),
					array('property' => 'width', 'label' => esc_html__( 'Width', 'ssc' ), 'selector' => '.kc-tabs-slider-nav'),
					array('property' => 'height', 'label' => esc_html__( 'Height', 'ssc' ), 'selector' => '.kc-tabs-slider-nav'),
					array('property' => 'box-shadow', 'label' => esc_html__( 'Box Shadow', 'ssc' ), 'selector' => '.kc-tabs-slider-nav'),
					array('property' => 'box-shadow', 'label' => esc_html__( 'Box Shadow', 'ssc' ).' '. esc_html__( 'Hover', 'ssc' ), 'selector' => '+i:hover .kc-tabs-slider-nav'),
					array('property' => 'opacity', 'label' => esc_html__( 'Opacity', 'ssc' ), 'selector' => '.kc-tabs-slider-nav'),
					array('property' => 'opacity', 'label' => esc_html__( 'Opacity', 'ssc' ).' '. esc_html__( 'Hover', 'ssc' ), 'selector' => '+i:hover .kc-tabs-slider-nav'),
					array('property' => 'margin', 'label' => esc_html__( 'Margin', 'ssc' ), 'selector' => '.kc-tabs-slider-nav'),
					array('property' => 'margin', 'label' => esc_html__( 'Margin', 'ssc' ).' '. esc_html__( 'Hover', 'ssc' ), 'selector' => '+i:hover .kc-tabs-slider-nav'),
					array('property' => 'padding', 'label' => esc_html__( 'Padding', 'ssc' ), 'selector' => '.kc-tabs-slider-nav'),
					array('property' => 'padding', 'label' => esc_html__( 'Padding', 'ssc' ).' '. esc_html__( 'Hover', 'ssc' ), 'selector' => '+i:hover .kc-tabs-slider-nav'),
					array('property' => 'border', 'label' => esc_html__( 'Border', 'ssc' ), 'selector' => '.kc-tabs-slider-nav'),
					array('property' => 'border', 'label' => esc_html__( 'Border', 'ssc' ).' '. esc_html__( 'Hover', 'ssc' ), 'selector' => '+i:hover .kc-tabs-slider-nav'),
					array('property' => 'border-radius', 'label' => esc_html__( 'Border Radius', 'ssc' ), 'selector' => '.kc-tabs-slider-nav'),
					array('property' => 'border-radius', 'label' => esc_html__( 'Border Radius', 'ssc' ).' '. esc_html__( 'Hover', 'ssc' ), 'selector' => '+i:hover .kc-tabs-slider-nav'),
				),
                'Tab Wrap' => array(
                    array('property' => 'text-align', 'label' => 'Text Align', 'selector' => '.kc_tabs_nav'),
                    array('property' => 'background', 'selector' => '.kc_tabs_nav'),
                    array('property' => 'display', 'label' => esc_html__( 'Display', 'ssc' ), 'selector' => '.kc_tabs_nav'),
                    array('property' => 'float', 'label' => esc_html__( 'Float', 'ssc' ), 'selector' => '.kc_tabs_nav'),
                    array('property' => 'width', 'label' => esc_html__( 'Width', 'ssc' ), 'selector' => '.kc_tabs_nav'),
                    array('property' => 'height', 'label' => esc_html__( 'Height', 'ssc' ), 'selector' => '.kc_tabs_nav'),
                    array('property' => 'box-shadow', 'label' => esc_html__( 'Box Shadow', 'ssc' ), 'selector' => '.kc_tabs_nav'),
                    array('property' => 'box-shadow', 'label' => esc_html__( 'Box Shadow', 'ssc' ).' '. esc_html__( 'Hover', 'ssc' ), 'selector' => '.kc_tabs_nav:hover'),
                    array('property' => 'opacity', 'label' => esc_html__( 'Opacity', 'ssc' ), 'selector' => '.kc_tabs_nav'),
                    array('property' => 'opacity', 'label' => esc_html__( 'Opacity', 'ssc' ).' '. esc_html__( 'Hover', 'ssc' ), 'selector' => '.kc_tabs_nav:hover'),
                    array('property' => 'margin', 'label' => esc_html__( 'Margin', 'ssc' ), 'selector' => '.kc_tabs_nav'),
                    array('property' => 'margin', 'label' => esc_html__( 'Margin', 'ssc' ).' '. esc_html__( 'Hover', 'ssc' ), 'selector' => '.kc_tabs_nav:hover'),
                    array('property' => 'padding', 'label' => esc_html__( 'Padding', 'ssc' ), 'selector' => '.kc_tabs_nav'),
                    array('property' => 'padding', 'label' => esc_html__( 'Padding', 'ssc' ).' '. esc_html__( 'Hover', 'ssc' ), 'selector' => ' .kc_tabs_nav:hover'),
                    array('property' => 'border', 'label' => esc_html__( 'Border', 'ssc' ), 'selector' => '.kc_tabs_nav'),
                    array('property' => 'border', 'label' => esc_html__( 'Border', 'ssc' ).' '. esc_html__( 'Hover', 'ssc' ), 'selector' => '.kc_tabs_nav:hover'),
                    array('property' => 'border-radius', 'label' => esc_html__( 'Border Radius', 'ssc' ), 'selector' => '.kc_tabs_nav'),
                    array('property' => 'border-radius', 'label' => esc_html__( 'Border Radius', 'ssc' ).' '. esc_html__( 'Hover', 'ssc' ), 'selector' => '.kc_tabs_nav:hover'),
                ),
				'Controls'   => array(
					array( 'property' => 'background', 'label'    => esc_html__( 'Background Color', 'ssc' ), 'selector' => '.ssc_carousel .owl-controls', ),
					array( 'property' => 'padding', 'label'    => esc_html__( 'Padding', 'ssc' ), 'selector' => '.ssc_carousel .owl-controls', ),
					array( 'property' => 'margin', 'label'    => esc_html__( 'Margin', 'ssc' ), 'selector' => '.ssc_carousel .owl-controls', ),
					array( 'property' => 'width', 'label'    => esc_html__( 'Width', 'ssc' ), 'selector' => '.ssc_carousel .owl-controls', ),
					array( 'property' => 'height', 'label'    => esc_html__( 'Height', 'ssc' ), 'selector' => '.ssc_carousel .owl-controls', ),
				),
				'Pagination' => array(
					array('property' => 'text-align', 'label' => 'Text Align', 'selector' => '.owl-pagination'),
					array( 'property' => 'background-color', 'label'    => esc_html__( 'Color', 'ssc' ), 'selector' => '.owl-page span', ),
					array( 'property' => 'background-color', 'label'    => esc_html__( 'Color on Hover and Active', 'ssc' ), 'selector' => '.owl-page.active span, .owl-page:hover span', ),
					array( 'property' => 'opacity', 'label'    => esc_html__( 'Opacity', 'ssc' ), 'selector' => '.owl-page span', ),
					array( 'property' => 'opacity', 'label'    => esc_html__( 'Opacity', 'ssc' ).' '. esc_html__( 'Hover', 'ssc' ), 'selector' => '.owl-page.active span, .owl-page:hover span', ),
					array( 'property' => 'width', 'label'    => esc_html__( 'Width', 'ssc' ), 'selector' => '.owl-page span', ),
					array( 'property' => 'width', 'label'    => esc_html__( 'Width', 'ssc' ).' '. esc_html__( 'Hover', 'ssc' ), 'selector' => '.owl-page.active span, .owl-page:hover span', ),
					array( 'property' => 'height', 'label'    => esc_html__( 'Height', 'ssc' ), 'selector' => '.owl-page span', ),
					array( 'property' => 'height', 'label'    => esc_html__( 'Height', 'ssc' ).' '. esc_html__( 'Hover', 'ssc' ), 'selector' => '.owl-page.active span, .owl-page:hover span', ),
					array( 'property' => 'margin', 'label'    => esc_html__( 'Margin', 'ssc' ), 'selector' => '.owl-page span', ),
					array( 'property' => 'margin', 'label'    => esc_html__( 'Margin', 'ssc' ).' '. esc_html__( 'Hover', 'ssc' ), 'selector' => '.owl-page.active span, .owl-page:hover span', ),
					array( 'property' => 'margin', 'label'    => esc_html__( 'Margin Box', 'ssc' ), 'selector' => '.owl-pagination', ),
					array('property' => 'border', 'label' => esc_html__( 'Border', 'ssc' ), 'selector' => '.owl-page span'),
					array('property' => 'border', 'label' => esc_html__( 'Border', 'ssc' ).' '. esc_html__( 'Hover', 'ssc' ), 'selector' => '.owl-page.active span, .owl-page:hover span'),
					array('property' => 'border-radius', 'label' => esc_html__( 'Border Radius', 'ssc' ), 'selector' => '.owl-page span'),
					array('property' => 'border-radius', 'label' => esc_html__( 'Border Radius', 'ssc' ).' '. esc_html__( 'Hover', 'ssc' ), 'selector' => '.owl-page.active span, .owl-page:hover span'),
				),
				'Navigation' => array(
					array('property' => 'text-align', 'label' => esc_html__( 'Text Align', 'ssc' ), 'selector' => '.owl-controls .owl-buttons'),
					array(
						'property' => 'width',
						'label'    => esc_html__( 'Width', 'ssc' ),
						'selector' => '.owl-controls .owl-buttons div',
					),
					array(
						'property' => 'height',
						'label'    => esc_html__( 'Height', 'ssc' ),
						'selector' => '.owl-controls .owl-buttons div',
					),
					array(
						'property' => 'color',
						'label'    => esc_html__( 'Color', 'ssc' ),
						'selector' => '.owl-controls .owl-buttons div',
					),
					array(
						'property' => 'color',
						'label'    => esc_html__( 'Color on hover', 'ssc' ),
						'selector' => '.owl-controls .owl-buttons div:hover',
					),
					array(
						'property' => 'font-size',
						'label'    => esc_html__( 'Font Size', 'ssc' ),
						'selector' => '.owl-controls .owl-buttons div',
					),
					array(
						'property' => 'line-height',
						'label'    => esc_html__( 'Line Height', 'ssc' ),
						'selector' => '.owl-controls .owl-buttons div',
					),
					array(
						'property' => 'background-color',
						'label'    => esc_html__( 'Background Color', 'ssc' ),
						'selector' => '.owl-controls .owl-buttons div',
					),
					array(
						'property' => 'background-color',
						'label'    => esc_html__( 'Background Color on hover', 'ssc' ),
						'selector' => '.owl-controls .owl-buttons div:hover',
					),
					array(
						'property' => 'opacity',
						'label'    => esc_html__( 'Opacity', 'ssc' ),
						'selector' => '.owl-controls .owl-buttons div',
					),
					array(
						'property' => 'font-weight',
						'label'    => esc_html__( 'Font Weight', 'ssc' ),
						'selector' => '.owl-controls .owl-buttons div, .owl-controls .owl-buttons div i:before',
					),
					array(
						'property' => 'border',
						'label'    => esc_html__( 'Border', 'ssc' ),
						'selector' => '.owl-controls .owl-buttons div',
					),
					array(
						'property' => 'border',
						'label'    => esc_html__( 'Border on Hover', 'ssc' ),
						'selector' => '.owl-controls .owl-buttons div:hover',
					),
					array(
						'property' => 'border-radius',
						'label'    => esc_html__( 'Border radius', 'ssc' ),
						'selector' => '.owl-controls .owl-buttons div',
					),
					array(
						'property' => 'border-radius',
						'label'    => esc_html__( 'Border radius on hover', 'ssc' ),
						'selector' => '.owl-controls .owl-buttons div:hover',
					),
					array(
						'property' => 'padding',
						'label'    => esc_html__( 'Padding', 'ssc' ),
						'selector' => '.owl-controls .owl-buttons div',
					),
					array(
						'property' => 'margin','label'    => esc_html__( 'Margin', 'ssc' ),
						'selector' => '.owl-controls .owl-buttons div',
					),
					array(
						'property' => 'margin','label'    => esc_html__( 'Margin Prev', 'ssc' ),
						'selector' => '.owl-controls .owl-buttons .owl-prev',
					),
					array(
						'property' => 'margin','label'    => esc_html__( 'Margin Next', 'ssc' ),
						'selector' => '.owl-controls .owl-buttons .owl-next',
					),
					array(
						'property' => 'margin',
						'label'    => esc_html__( 'Wrapper Margin', 'ssc' ),
						'selector' => '.owl-controls .owl-buttons',
					),
				),
				'Navigation SVG' => array(
					array('property' => 'fill', 'label' => esc_html__( 'Fill', 'ssc' ), 'selector' => ' .svg'),
					array('property' => 'fill', 'label' => esc_html__( 'Fill', 'ssc' ) . ' ' . esc_html__( 'Hover', 'ssc' ), 'selector' => ' .svg:hover'),
					array(
						'property' => 'width',
						'label'    => esc_html__( 'Width', 'ssc' ),
						'selector' => '.owl-controls .owl-buttons div svg',
					),
					array(
						'property' => 'height',
						'label'    => esc_html__( 'Height', 'ssc' ),
						'selector' => '.owl-controls .owl-buttons div svg',
					),
				),
				'Nav Text' => array(
					array('property' => 'color', 'label' => esc_html__('Color', 'ssc' ), 'selector' => '.owl-controls .owl-buttons div .t'),
					array('property' => 'color', 'label' => esc_html__('Color', 'ssc' ).esc_html__(' Hover', 'ssc' ), 'selector' => '.owl-controls .owl-buttons div:hover .t'),
					array('property' => 'background', 'selector' => '.owl-controls .owl-buttons div .t'),
					array('property' => 'background', 'selector' => '.owl-controls .owl-buttons div:hover .t'),
					array('property' => 'font-size', 'label' => esc_html__('Font Size', 'ssc' ), 'selector' => '.owl-controls .owl-buttons div .t'),
					array('property' => 'line-height', 'label' => esc_html__('Line Height', 'ssc' ), 'selector' => '.owl-controls .owl-buttons div .t'),
					array('property' => 'font-weight', 'label' => esc_html__('Font Weight', 'ssc' ), 'selector' => '.owl-controls .owl-buttons div .t'),
					array('property' => 'font-family', 'label' => esc_html__('Font Family', 'ssc' ), 'selector' => '.owl-controls .owl-buttons div .t'),
					array('property' => 'text-align', 'label' => esc_html__( 'Alignment', 'ssc' ), 'selector' => '.owl-controls .owl-buttons div .t'),
					array('property' => 'vertical-align', 'label' => esc_html__( 'Vertical Align', 'ssc' ), 'selector' => '.owl-controls .owl-buttons div .t'),
					array('property' => 'text-transform', 'label' => esc_html__('Text Transform', 'ssc' ), 'selector' => '.owl-controls .owl-buttons div .t'),
					array('property' => 'text-decoration', 'label' => esc_html__('Text Decoration', 'ssc' ), 'selector' => '.owl-controls .owl-buttons div .t'),
					array('property' => 'font-style', 'label' => esc_html__('Font Style', 'ssc' ), 'selector' => '.owl-controls .owl-buttons div .t'),
					array('property' => 'text-shadow', 'label' => esc_html__('Text Shadow', 'ssc' ), 'selector' => '.owl-controls .owl-buttons div .t'),
					array('property' => 'box-shadow', 'label' => esc_html__( 'Box Shadow', 'ssc' ), 'selector' => '.owl-controls .owl-buttons div .t'),
					array('property' => 'width', 'label' => esc_html__( 'Width', 'ssc' ), 'selector' => '.owl-controls .owl-buttons div .t'),
					array('property' => 'height', 'label' => esc_html__( 'Height', 'ssc' ), 'selector' => '.owl-controls .owl-buttons div .t'),
					array('property' => 'display', 'label' => esc_html__( 'Display', 'ssc' ), 'selector' => '.owl-controls .owl-buttons div .t'),
					array('property' => 'float', 'label' => esc_html__( 'Float', 'ssc' ), 'selector' => '.owl-controls .owl-buttons div .t'),
					array('property' => 'margin', 'label' => esc_html__( 'Margin', 'ssc' ), 'selector' => '.owl-controls .owl-buttons div .t'),
					array('property' => 'padding', 'label' => esc_html__( 'Padding', 'ssc' ), 'selector' => '.owl-controls .owl-buttons div .t'),
					array('property' => 'border', 'label' => esc_html__( 'Border', 'ssc' ), 'selector' => '.owl-controls .owl-buttons div .t'),
					array('property' => 'border-radius', 'label' => esc_html__( 'Border Radius', 'ssc' ), 'selector' => '.owl-controls .owl-buttons div .t'),
				),
				'Title Box' => array(
					array('property' => 'text-align', 'label' => esc_html__( 'Text Align', 'ssc' ), 'selector' => '.slick-slider .slick-list'),
					array('property' => 'vertical-align', 'label' => esc_html__('Vertical Align', 'ssc' ), 'selector' => '.slick-slider .slick-list'),
					array('property' => 'background'),
					array('property' => 'display', 'label' => esc_html__( 'Display', 'ssc' ), 'selector' => '.slick-slider .slick-list'),
					array('property' => 'float', 'label' => esc_html__( 'Float', 'ssc' ), 'selector' => '.slick-slider .slick-list'),
					array('property' => 'width', 'label' => esc_html__( 'Width', 'ssc' ), 'selector' => '.slick-slider .slick-list'),
					array('property' => 'height', 'label' => esc_html__( 'Height', 'ssc' ), 'selector' => '.slick-slider .slick-list'),
					array('property' => 'box-shadow', 'label' => esc_html__( 'Box Shadow', 'ssc' ), 'selector' => '.slick-slider .slick-list'),
					array('property' => 'opacity', 'label' => esc_html__( 'Opacity', 'ssc' ), 'selector' => '.slick-slider .slick-list'),
					array('property' => 'margin', 'label' => esc_html__( 'Margin', 'ssc' ), 'selector' => '.slick-slider .slick-list'),
					array('property' => 'padding', 'label' => esc_html__( 'Padding', 'ssc' ), 'selector' => '.slick-slider .slick-list'),
					array('property' => 'border', 'label' => esc_html__( 'Border', 'ssc' ), 'selector' => '.slick-slider .slick-list'),
					array('property' => 'border-radius', 'label' => esc_html__( 'Border Radius', 'ssc' ), 'selector' => '.slick-slider .slick-list'),
				),
				'Title' => array(
					array('property' => 'text-align', 'label' => esc_html__( 'Text Align', 'ssc' ), 'selector' => '.slick-list li'),
					array('property' => 'vertical-align', 'label' => esc_html__('Vertical Align', 'ssc' ), 'selector' => '.slick-list li'),
					array('property' => 'background', 'selector' => '.slick-list li'),
					array('property' => 'color', 'label' => esc_html__('Color', 'ssc' ), 'selector' => '.slick-list li'),
					array('property' => 'font-size', 'label' => esc_html__('Font Size', 'ssc' ), 'selector' => '.slick-list li'),
					array('property' => 'line-height', 'label' => esc_html__('Line Height', 'ssc' ), 'selector' => '.slick-list li'),
					array('property' => 'font-weight', 'label' => esc_html__('Font Weight', 'ssc' ), 'selector' => '.slick-list li'),
					array('property' => 'font-family', 'label' => esc_html__('Font Family', 'ssc' ), 'selector' => '.slick-list li'),
					array('property' => 'text-transform', 'label' => esc_html__('Text Transform', 'ssc' ), 'selector' => '.slick-list li'),
					array('property' => 'text-decoration', 'label' => esc_html__('Text Decoration', 'ssc' ), 'selector' => '.slick-list li'),
					array('property' => 'font-style', 'label' => esc_html__('Font Style', 'ssc' ), 'selector' => '.slick-list li'),
					array('property' => 'text-align', 'label' => esc_html__('Text Align', 'ssc' ), 'selector' => '.slick-list li'),
					array('property' => 'text-shadow', 'label' => esc_html__('Text Shadow', 'ssc' ), 'selector' => '.slick-list li'),
					array('property' => 'display', 'label' => esc_html__( 'Display', 'ssc' ), 'selector' => '.slick-list li'),
					array('property' => 'float', 'label' => esc_html__( 'Float', 'ssc' ), 'selector' => '.slick-list li'),
					array('property' => 'width', 'label' => esc_html__( 'Width', 'ssc' ), 'selector' => '.slick-list li'),
					array('property' => 'height', 'label' => esc_html__( 'Height', 'ssc' ), 'selector' => '.slick-list li'),
					array('property' => 'box-shadow', 'label' => esc_html__( 'Box Shadow', 'ssc' ), 'selector' => '.slick-list li'),
					array('property' => 'opacity', 'label' => esc_html__( 'Opacity', 'ssc' ), 'selector' => '.slick-list li'),
					array('property' => 'margin', 'label' => esc_html__( 'Margin', 'ssc' ), 'selector' => '.slick-list li'),
					array('property' => 'padding', 'label' => esc_html__( 'Padding', 'ssc' ), 'selector' => '.slick-list li'),
					array('property' => 'border', 'label' => esc_html__( 'Border', 'ssc' ), 'selector' => '.slick-list li'),
					array('property' => 'border-radius', 'label' => esc_html__( 'Border Radius', 'ssc' ), 'selector' => '.slick-list li'),
				),
				'Title Image' => array(
					array('property' => 'text-align', 'label' => esc_html__( 'Image Alignment', 'ssc' ), 'selector' => '.slick-list li img'),
					array('property' => 'display', 'label' => esc_html__( 'Image Display', 'ssc' ), 'selector' => '.slick-list li img'),
					array('property' => 'float', 'label' => esc_html__( 'Image Float', 'ssc' ), 'selector' => '.slick-list li img'),
					array('property' => 'background-color', 'label' => esc_html__( 'Background Color', 'ssc' ), 'selector' => '.slick-list li img'),
					array('property' => 'box-shadow', 'label' => esc_html__( 'Box Shadow', 'ssc' ), 'selector' => '.slick-list li img'),
					array('property' => 'border', 'label' => esc_html__( 'Border', 'ssc' ), 'selector' => '.slick-list li img'),
					array('property' => 'border-radius', 'label' => esc_html__( 'Border Radius', 'ssc' ), 'selector' => '.slick-list li img'),
					array('property' => 'width', 'label' => esc_html__( 'Width', 'ssc' ), 'selector' => '.slick-list li img'),
					array('property' => 'height', 'label' => esc_html__( 'Height', 'ssc' ), 'selector' => '.slick-list li img'),
					array('property' => 'width', 'label' => esc_html__( 'Width Active Image', 'ssc' ), 'selector' => '.slick-current.slick-active img'),
					array('property' => 'height', 'label' => esc_html__( 'Height Active Image', 'ssc' ), 'selector' => '.slick-current.slick-active li img'),
					array('property' => 'max-width', 'label' => esc_html__( 'Max Width', 'ssc' ), 'selector' => '.slick-list li img'),
					array('property' => 'vertical-align', 'label' => esc_html__( 'Vertical Align', 'ssc' ), 'selector' => '.slick-list li img'),
					array('property' => 'margin', 'label' => esc_html__( 'Margin', 'ssc' ), 'selector' => ''),

					array('property' => 'padding', 'label' => esc_html__( 'Padding', 'ssc' ), 'selector' => '.slick-list li img'),
					array('property' => 'padding', 'label' => esc_html__( 'Padding Active Image', 'ssc' ), 'selector' => '.slick-current.slick-active img'),
				),
				'Carousel' => array(
					array('property' => 'background', 'selector' => '.owl-wrapper-outer'),
					array('property' => 'width', 'label' => esc_html__( 'Width', 'ssc' ), 'selector' => '.owl-wrapper-outer'),
					array('property' => 'height', 'label' => esc_html__( 'Height', 'ssc' ), 'selector' => '.owl-wrapper-outer'),
					array('property' => 'box-shadow', 'label' => esc_html__( 'Box Shadow', 'ssc' ), 'selector' => '.owl-wrapper-outer'),
					array('property' => 'box-shadow', 'label' => esc_html__( 'Box Shadow', 'ssc' ).' '. esc_html__( 'Hover', 'ssc' ), 'selector' => '.owl-wrapper-outer:hover'),
					array('property' => 'opacity', 'label' => esc_html__( 'Opacity', 'ssc' ), 'selector' => '.owl-wrapper-outer'),
					array('property' => 'opacity', 'label' => esc_html__( 'Opacity', 'ssc' ).' '. esc_html__( 'Hover', 'ssc' ), 'selector' => '.owl-wrapper-outer:hover'),
					array('property' => 'margin', 'label' => esc_html__( 'Margin', 'ssc' ), 'selector' => '.owl-wrapper-outer'),
					array('property' => 'margin', 'label' => esc_html__( 'Margin', 'ssc' ).' '. esc_html__( 'Hover', 'ssc' ), 'selector' => '.owl-wrapper-outer:hover'),
					array('property' => 'padding', 'label' => esc_html__( 'Padding', 'ssc' ), 'selector' => '.owl-wrapper-outer'),
					array('property' => 'padding', 'label' => esc_html__( 'Padding', 'ssc' ).' '. esc_html__( 'Hover', 'ssc' ), 'selector' => '.owl-wrapper-outer:hover'),
					array('property' => 'border', 'label' => esc_html__( 'Border', 'ssc' ), 'selector' => '.owl-wrapper-outer'),
					array('property' => 'border', 'label' => esc_html__( 'Border', 'ssc' ).' '. esc_html__( 'Hover', 'ssc' ), 'selector' => '.owl-wrapper-outer:hover'),
					array('property' => 'border-radius', 'label' => esc_html__( 'Border Radius', 'ssc' ), 'selector' => '.owl-wrapper-outer'),
					array('property' => 'border-radius', 'label' => esc_html__( 'Border Radius', 'ssc' ).' '. esc_html__( 'Hover', 'ssc' ), 'selector' => '.owl-wrapper-outer:hover'),
				),
                'Slider Title' => array(
                    array('property' => 'text-align', 'label' => esc_html__( 'Text Align', 'ssc' ), 'selector' => '.slick-slide a'),
                    array('property' => 'vertical-align', 'label' => esc_html__('Vertical Align', 'ssc' ), 'selector' => '.slick-slide a'),
                    array('property' => 'background', 'selector' => '.slick-slide a'),
                    array('property' => 'background', 'selector' => '.slick-slide a:hover'),
                    array('property' => 'background', 'selector' => '.slick-slide.slick-current a'),
                    array('property' => 'color', 'label' => esc_html__('Color', 'ssc' ), 'selector' => '.slick-slide a'),
                    array('property' => 'color', 'label' => esc_html__('Color Hover', 'ssc' ), 'selector' => '.slick-slide a:hover'),
                    array('property' => 'color', 'label' => esc_html__('Color Active', 'ssc' ), 'selector' => '.slick-slide.slick-current a'),
                    array('property' => 'font-size', 'label' => esc_html__('Font Size', 'ssc' ), 'selector' => '.slick-slide a'),
                    array('property' => 'font-size', 'label' => esc_html__('Font Size Current', 'ssc' ), 'selector' => '.slick-slide.slick-current a'),
                    array('property' => 'line-height', 'label' => esc_html__('Line Height', 'ssc' ), 'selector' => '.slick-slide a'),
                    array('property' => 'font-weight', 'label' => esc_html__('Font Weight', 'ssc' ), 'selector' => '.slick-slide a'),
                    array('property' => 'font-family', 'label' => esc_html__('Font Family', 'ssc' ), 'selector' => '.slick-slide a'),
                    array('property' => 'text-transform', 'label' => esc_html__('Text Transform', 'ssc' ), 'selector' => '.slick-slide a'),
                    array('property' => 'text-decoration', 'label' => esc_html__('Text Decoration', 'ssc' ), 'selector' => '.slick-slide a'),
                    array('property' => 'font-style', 'label' => esc_html__('Font Style', 'ssc' ), 'selector' => '.slick-slide a'),
                    array('property' => 'text-align', 'label' => esc_html__('Text Align', 'ssc' ), 'selector' => '.slick-slide a'),
                    array('property' => 'text-shadow', 'label' => esc_html__('Text Shadow', 'ssc' ), 'selector' => '.slick-slide a'),
                    array('property' => 'display', 'label' => esc_html__( 'Display', 'ssc' ), 'selector' => '.slick-slide'),
                    array('property' => 'float', 'label' => esc_html__( 'Float', 'ssc' ), 'selector' => '.slick-slide'),
                    array('property' => 'width', 'label' => esc_html__( 'Width', 'ssc' ), 'selector' => '.slick-slide a'),
                    array('property' => 'height', 'label' => esc_html__( 'Height', 'ssc' ), 'selector' => '.slick-slide a'),
                    array('property' => 'box-shadow', 'label' => esc_html__( 'Box Shadow', 'ssc' ), 'selector' => '.slick-slide a'),
                    array('property' => 'opacity', 'label' => esc_html__( 'Opacity', 'ssc' ), 'selector' => '.slick-slide a'),
                    array('property' => 'margin', 'label' => esc_html__( 'Margin', 'ssc' ), 'selector' => '.slick-slide a'),
                    array('property' => 'padding', 'label' => esc_html__( 'Padding', 'ssc' ), 'selector' => '.slick-slide a'),
                    array('property' => 'border', 'label' => esc_html__( 'Border', 'ssc' ), 'selector' => '.slick-slide a'),
                    array('property' => 'border-radius', 'label' => esc_html__( 'Border Radius', 'ssc' ), 'selector' => '.slick-slide a'),
                ),
			),
		);
		$atts['live_editor'] = SSC_SHORTCODES_PATH . 'live/kc_tabs.php';
		if ( isset( $atts['params']['styling'][0] ) ) {
			$atts['params']['styling'][0]['options'] = $css_map;
		}
	}

	return $atts;
}

add_filter( 'shortcode_kc_tabs_before_css_generating', 'ssc_kc_tabs_filter_css' );

function ssc_kc_tabs_filter_css( $atts ) {
	$styles = array();
	extract( shortcode_atts( array(
		'n_type'     => '',
		'l_svg'      => '',
		'r_svg'      => '',
		'svg_color'  => '',
		'svg_hcolor' => '',
	),
		$atts ) );
	switch ( $n_type ) {
		case 'svg':
			if ( '' !== $l_svg || '' !== $r_svg ) {
				if ( ! empty ( $atts['css_custom'] ) ) {
					$styles = json_decode( str_replace( '`', '"', $atts['css_custom'] ), true);
				}
				if ( '' !== $svg_color ) {
					if ( empty ( $styles['kc-css']['any']['navigation-svg']['fill| .svg'] ) ) {
						$styles['kc-css']['any']['navigation-svg']['fill| .svg'] = $svg_color;
					}
				}
				if ( '' !== $svg_hcolor ) {
					if ( empty ( $styles['kc-css']['any']['navigation-svg']['fill| .svg:hover'] ) ) {
						$styles['kc-css']['any']['navigation-svg']['fill| .svg:hover'] = $svg_hcolor;
					}
				}
				$atts['css_custom'] = str_replace( '"', '`', json_encode( $styles, JSON_FORCE_OBJECT  ) );
			}
			break;
	}

	return $atts;
}

