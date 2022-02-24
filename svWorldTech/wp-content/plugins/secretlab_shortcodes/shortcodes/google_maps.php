<?php
add_action( 'init', 'ssc_google_maps_params', 99 );

function ssc_google_maps_params() {
	global $kc;

	$kc->add_map( array(
		'ssc_google_maps' => array(
			'name'             => __( 'Google Maps', 'ssc' ),
			'description'      => __( 'Google Maps (you should install API key in the "Theme Options")', 'ssc' ),
			'icon'             => 'ssc-icon-29',
			'category'         => 'SecretLab',
			'preview_editable' => true,
			'params'           => array(
				'general'                      => array(
					array(
						'name'    => 'template',
						'label'   => esc_html__( 'Select Template', 'ssc' ),
						'type'    => 'radio_image',  // USAGE TEXT TYPE
						'options' => array(
							'1' => SSC_URL . 'images/g-maps-template1.jpg',
							'2' => SSC_URL . 'images/g-maps-template2.jpg',
							'3' => SSC_URL . 'images/g-maps-template3.jpg',
							'4' => SSC_URL . 'images/g-maps-template4.jpg',
							'5' => SSC_URL . 'images/g-maps-template5.jpg',
							'6' => SSC_URL . 'images/g-maps-template6.jpg',
						),
						'value'   => '1', // remove this if you do not need a default content
					),
					array(
						'name'        => 'map_styles',
						'label'       => __( 'Map styles from "Styling Wizard: Google Maps APIs" (will overwrite template\'s style)',
							'ssc' ),
						'type'        => 'textarea',
						'description' => esc_html__( 'You can genereate and paste styles here from the',
								'ssc' ) . ' ' . '<a href="https://mapstyle.withgoogle.com/" target="_blank">https://mapstyle.withgoogle.com/</a>',
						'admin_label' => true,
						'value'       => '',
					),
					array(
						'name'        => 'lat',
						'label'       => esc_html__( 'Map Center Latitude', 'ssc' ),
						'type'        => 'text',
						'admin_label' => true,
						'value'       => 27.986065,
					),
					array(
						'name'        => 'lng',
						'label'       => esc_html__( 'Map Center Longitude', 'ssc' ),
						'type'        => 'text',
						'admin_label' => true,
						'value'       => 86.922623,
					),
					array(
						'name'    => 'zoom',
						'label'   => esc_html__( 'Map Zoom', 'ssc' ),
						'type'    => 'number_slider',  // USAGE RADIO TYPE
						'options' => array(    // REQUIRED
							'min'        => 0,
							'max'        => 100,
							'show_input' => true,
						),
						'value'   => 8,
					),
					array(
						'name'    => 'map_type',
						'type'    => 'dropdown',  // USAGE RADIO TYPE
						'label'   => esc_html__( 'Map Type', 'ssc' ),
						'options' => array(
							'roadmap' => esc_html__( 'Roadmap', 'ssc' ),
//							'satellite ' => esc_html__( 'Satellite', 'ssc' ),
							'hybrid'  => esc_html__( 'Hybrid', 'ssc' ),
							'terrain' => esc_html__( 'Terrain', 'ssc' ),
						),
						'value'   => 'hybrid',
					),
					array(
						'name'  => 'disable_default_ui',
						'type'  => 'toggle',
						'label' => esc_html__( 'Disabling the Default UI?', 'ssc' ),
						'value' => '',
					),
					array(
						'name'     => 'zoom_control',
						'type'     => 'toggle',
						'label'    => esc_html__( 'Zoom control', 'ssc' ),
						'relation' => array(
							'parent'    => 'disable_default_ui',
							'hide_when' => 'yes',
						),
						'value'    => 'yes',
					),
					array(
						'name'     => 'map_type_control',
						'type'     => 'toggle',
						'label'    => esc_html__( 'Map Type Control', 'ssc' ),
						'relation' => array(
							'parent'    => 'disable_default_ui',
							'hide_when' => 'yes',
						),
						'value'    => 'yes',
					),
					array(
						'name'     => 'scale_control',
						'type'     => 'toggle',
						'label'    => esc_html__( 'Scale Control', 'ssc' ),
						'relation' => array(
							'parent'    => 'disable_default_ui',
							'hide_when' => 'yes',
						),
						'value'    => 'yes',
					),
					array(
						'name'     => 'street_view_control',
						'type'     => 'toggle',
						'label'    => esc_html__( 'Street View Control', 'ssc' ),
						'relation' => array(
							'parent'    => 'disable_default_ui',
							'hide_when' => 'yes',
						),
						'value'    => 'yes',
					),
					array(
						'name'     => 'rotate_control',
						'type'     => 'toggle',
						'label'    => esc_html__( 'Rotate Control', 'ssc' ),
						'relation' => array(
							'parent'    => 'disable_default_ui',
							'hide_when' => 'yes',
						),
						'value'    => 'yes',
					),
					array(
						'name'     => 'fullscreen_control',
						'type'     => 'toggle',
						'label'    => esc_html__( 'Fullscreen Control', 'ssc' ),
						'relation' => array(
							'parent'    => 'disable_default_ui',
							'hide_when' => 'yes',
						),
						'value'    => 'yes',
					),
					array(
						'name'    => 'gesture_handling',
						'type'    => 'dropdown',  // USAGE RADIO TYPE
						'label'   => esc_html__( 'Zoom mode', 'ssc' ),
						'options' => array(
							'none'        => esc_html__( 'No Zoom', 'ssc' ),
//							'satellite ' => esc_html__( 'Satellite', 'ssc' ),
							'cooperative' => __( 'Standard Zoom (with "Ctrl" or two fingers)', 'ssc' ),
							'greedy'      => __( 'Simple Zoom  (without "Ctrl" or one-finger)', 'ssc' ),
						),
						'value'   => 'cooperative',
					),
//					array(
//						'name'        => 'tilted',
//						'type'        => 'number_slider',  // USAGE RADIO TYPE
//						'options'     => array(    // REQUIRED
//							'min'        => 0,
//							'max'        => 90,
//							'unit'       => '°',
//							'show_input' => true,
//						),
//						'value'       => 0,
//						'label'       => esc_html__( 'Map tilted', 'ssc' ),
//						'admin_label' => true,
//					),
					array(
						'name'        => 'el_class',
						'label'       => esc_html__( 'Extra Class Name', 'ssc' ),
						'type'        => 'text',
						'description' => esc_html__( 'If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your CSS file.',
							'ssc' ),
						'admin_label' => true,
						'value'       => '',
					),
					array(
						'type'        => 'group',
						'label'       => __( 'Points', 'ssc' ),
						'name'        => 'markers',
						'description' => '',
						'options'     => array( 'add_text' => __( 'Add new point', 'ssc' ) ),
						// default values when create new group
//						'value'       => base64_encode( json_encode( array(
//							"1" => array(
//								"icon_type" => "icon",
//							),
//						) ) ),

						// you can use all param type to register child params
						'params'      => array(
							array(
								'name'        => 'title',
								'label'       => esc_html__( 'Marker Title', 'ssc' ),
								'type'        => 'text',
								'admin_label' => true,
								'value'       => esc_html__( 'Everest', 'ssc' ),
							),
							array(
								'name'        => 'icon_type',
								'label'       => esc_html__( 'Merker Type', 'ssc' ),
								'type'        => 'radio',
								'options'     => array(
									'img' => esc_html__( 'Image', 'ssc' ),
									'svg' => esc_html__( 'SVG', 'ssc' ),
								),
								'value'       => 'img',
								'description' => esc_html__( 'Pick what to display: icon, or svg', 'ssc' ),
							),
							array(
								'name'        => 'img',
								'label'       => esc_html__( 'Select Image', 'ssc' ),
								'type'        => 'attach_image',
								'admin_label' => true,
							),
							array(
								'name'        => 'img_size',
								'type'        => 'dropdown',
								'label'       => esc_html__( 'Image size', 'ssc' ),
								'description' => esc_html__( 'Set the image size.', 'ssc' ),
								'value'       => 'full',
								'options'     => ssc_get_image_sizes(),
							),
							array(
								'name'        => 'custom_img_size',
								'type'        => 'text',
								'label'       => esc_html__( 'Custom Image size', 'ssc' ),
								'description' => esc_html__( 'Set the image size: "thumbnail", "medium", "large", "full" or "400x200".',
									'ssc' ),
							),
							array(
								'name'        => 'svg',
								'label'       => esc_html__( 'Select SVG Icon', 'ssc' ),
								'type'        => 'attach_image',
								'admin_label' => true,
							),
							array(
								'name'        => 'svg_width',
								'type'        => 'number_slider',  // USAGE RADIO TYPE
								'options'     => array(    // REQUIRED
									'min'        => 0,
									'max'        => 100,
									'show_input' => true,
								),
								'value'       => 20,
								'label'       => esc_html__( 'SVG Width (in px)', 'ssc' ),
								'admin_label' => true,
							),
							array(
								'name'        => 'svg_height',
								'type'        => 'number_slider',  // USAGE RADIO TYPE
								'options'     => array(    // REQUIRED
									'min'        => 0,
									'max'        => 100,
									'show_input' => true,
								),
								'value'       => 20,
								'label'       => esc_html__( 'SVG Height (in px)', 'ssc' ),
								'admin_label' => true,
							),
							array(
								'name'  => 'svg_fill',
								'type'  => 'color_picker',
								'label' => __( 'SVG Color', 'ssc' ),
							),
							array(
								'name'  => 'svg_hfill',
								'type'  => 'color_picker',
								'label' => __( 'SVG Hover Color', 'ssc' ),
							),
							array(
								'name'        => 'lat',
								'label'       => esc_html__( 'Latitude', 'ssc' ),
								'type'        => 'text',
								'admin_label' => true,
								'value'       => 27.986065,
							),
							array(
								'name'        => 'lng',
								'label'       => esc_html__( 'Longitude', 'ssc' ),
								'type'        => 'text',
								'admin_label' => true,
								'value'       => 86.922623,
							),
							array(
								'name'        => 'zIndex',
								'label'       => esc_html__( 'Merker z-index', 'ssc' ),
								'description' => esc_html__( 'For the order in which markers should display on top of each other',
									'ssc' ),
								'type'        => 'number_slider',  // USAGE RADIO TYPE
								'options'     => array(    // REQUIRED
									'min'        => 0,
									'max'        => 100,
									'show_input' => true,
								),
								'value'       => 0,
							),
						),
					),

				),
				//Styling
				esc_html__( 'styling', 'ssc' ) => array(
					array(
						'name'        => 'my-css',
						'label'       => esc_html__( 'Styling', 'ssc' ),
						'type'        => 'css',
						'value'       => '', // remove this if you do not need a default content
						'description' => esc_html__( 'Styles', 'ssc' ),
						'options'     => array(
							array(
								'screens' => "any,999,768,667,479",
								'Box'     => array(
									array( 'property' => 'background' ),
									array( 'property' => 'display', 'label' => esc_html__( 'Display', 'ssc' ) ),
									array( 'property' => 'float', 'label' => esc_html__( 'Float', 'ssc' ) ),
									array( 'property' => 'max-width', 'label' => esc_html__( 'Max Width', 'ssc' ) ),
									array( 'property' => 'width', 'label' => esc_html__( 'Width', 'ssc' ) ),
									array( 'property' => 'height', 'label' => esc_html__( 'Height', 'ssc' ) ),
									array( 'property' => 'box-shadow', 'label' => esc_html__( 'Box Shadow', 'ssc' ) ),
									array( 'property' => 'opacity', 'label' => esc_html__( 'Opacity', 'ssc' ) ),
									array( 'property' => 'margin', 'label' => esc_html__( 'Margin', 'ssc' ) ),
									array( 'property' => 'padding', 'label' => esc_html__( 'Padding', 'ssc' ) ),
									array( 'property' => 'border', 'label' => esc_html__( 'Border', 'ssc' ) ),
									array(
										'property' => 'border-radius',
										'label'    => esc_html__( 'Border Radius', 'ssc' ),
									),
								),
//								'Point' => array(
//									array('property' => 'fill', 'label' => esc_html__( 'Fill', 'ssc' ), 'selector' => 'svg'),
//									array('property' => 'fill', 'label' => esc_html__( 'Fill', 'ssc' ) . ' ' . esc_html__( 'Hover', 'ssc' ), 'selector' => 'svg:hover'),
//								),
							),

						),
					),
				),
			),
		),
	) );
}

function ssc_google_maps_shortcode( $atts, $content = null ) {
	$output = '';
	extract( shortcode_atts( array(
		'template'            => 1,
		'lat'                 => 27.986065,
		'lng'                 => 86.922623,
		'zoom'                => 8,
		'map_type'            => 'hybrid',
		'disable_default_ui'  => '',
		'zoom_control'        => 'yes',
		'map_type_control'    => 'yes',
		'scale_control'       => 'yes',
		'street_view_control' => 'yes',
		'rotate_control'      => 'yes',
		'fullscreen_control'  => 'yes',
		'gesture_handling'    => 'cooperative',
		'map_styles'          => '',
//		'tilted' => 0,
		'markers'             => array(),
		'el_class'            => '',

	),
		$atts ) );

	$wrp_classes = apply_filters( 'kc-el-class', $atts );

	if( isset( $_GET['kc_action'] ) && $_GET['kc_action'] === 'live-editor' ){
		return '<div class="ssc-google-map ' . implode( ' ',
				$wrp_classes ) . ' ' . $el_class . ' disable-view-element"><h3>' . esc_html__('For best perfomance, the map has been disabled in this editing mode.', 'ssc') . '</h3></div>';

	}

	$map = array(
		'map'     => array(
			'center'          => array(
				'lat' => (float) $lat,
				'lng' => (float) $lng,
			),
			'zoom'            => (int) $zoom,
			'mapTypeId'       => $map_type,
			'gestureHandling' => $gesture_handling,
//			'tilted'   => (int)$tilted,
		),
		'markers' => array(),
	);

	if ( empty( $map_styles ) ) {
		$templates = array(
			1 => '[]',
			2 => '[
  {
    "elementType": "geometry",
    "stylers": [
      {
        "color": "#f5f5f5"
      }
    ]
  },
  {
    "elementType": "labels.icon",
    "stylers": [
      {
        "visibility": "off"
      }
    ]
  },
  {
    "elementType": "labels.text.fill",
    "stylers": [
      {
        "color": "#616161"
      }
    ]
  },
  {
    "elementType": "labels.text.stroke",
    "stylers": [
      {
        "color": "#f5f5f5"
      }
    ]
  },
  {
    "featureType": "administrative.land_parcel",
    "elementType": "labels.text.fill",
    "stylers": [
      {
        "color": "#bdbdbd"
      }
    ]
  },
  {
    "featureType": "poi",
    "elementType": "geometry",
    "stylers": [
      {
        "color": "#eeeeee"
      }
    ]
  },
  {
    "featureType": "poi",
    "elementType": "labels.text.fill",
    "stylers": [
      {
        "color": "#757575"
      }
    ]
  },
  {
    "featureType": "poi.park",
    "elementType": "geometry",
    "stylers": [
      {
        "color": "#e5e5e5"
      }
    ]
  },
  {
    "featureType": "poi.park",
    "elementType": "labels.text.fill",
    "stylers": [
      {
        "color": "#9e9e9e"
      }
    ]
  },
  {
    "featureType": "road",
    "elementType": "geometry",
    "stylers": [
      {
        "color": "#ffffff"
      }
    ]
  },
  {
    "featureType": "road.arterial",
    "elementType": "labels.text.fill",
    "stylers": [
      {
        "color": "#757575"
      }
    ]
  },
  {
    "featureType": "road.highway",
    "elementType": "geometry",
    "stylers": [
      {
        "color": "#dadada"
      }
    ]
  },
  {
    "featureType": "road.highway",
    "elementType": "labels.text.fill",
    "stylers": [
      {
        "color": "#616161"
      }
    ]
  },
  {
    "featureType": "road.local",
    "elementType": "labels.text.fill",
    "stylers": [
      {
        "color": "#9e9e9e"
      }
    ]
  },
  {
    "featureType": "transit.line",
    "elementType": "geometry",
    "stylers": [
      {
        "color": "#e5e5e5"
      }
    ]
  },
  {
    "featureType": "transit.station",
    "elementType": "geometry",
    "stylers": [
      {
        "color": "#eeeeee"
      }
    ]
  },
  {
    "featureType": "water",
    "elementType": "geometry",
    "stylers": [
      {
        "color": "#c9c9c9"
      }
    ]
  },
  {
    "featureType": "water",
    "elementType": "labels.text.fill",
    "stylers": [
      {
        "color": "#9e9e9e"
      }
    ]
  }
]',
			3 => '[
  {
    "elementType": "geometry",
    "stylers": [
      {
        "color": "#ebe3cd"
      }
    ]
  },
  {
    "elementType": "labels.text.fill",
    "stylers": [
      {
        "color": "#523735"
      }
    ]
  },
  {
    "elementType": "labels.text.stroke",
    "stylers": [
      {
        "color": "#f5f1e6"
      }
    ]
  },
  {
    "featureType": "administrative",
    "elementType": "geometry.stroke",
    "stylers": [
      {
        "color": "#c9b2a6"
      }
    ]
  },
  {
    "featureType": "administrative.land_parcel",
    "elementType": "geometry.stroke",
    "stylers": [
      {
        "color": "#dcd2be"
      }
    ]
  },
  {
    "featureType": "administrative.land_parcel",
    "elementType": "labels.text.fill",
    "stylers": [
      {
        "color": "#ae9e90"
      }
    ]
  },
  {
    "featureType": "landscape.natural",
    "elementType": "geometry",
    "stylers": [
      {
        "color": "#dfd2ae"
      }
    ]
  },
  {
    "featureType": "poi",
    "elementType": "geometry",
    "stylers": [
      {
        "color": "#dfd2ae"
      }
    ]
  },
  {
    "featureType": "poi",
    "elementType": "labels.text.fill",
    "stylers": [
      {
        "color": "#93817c"
      }
    ]
  },
  {
    "featureType": "poi.park",
    "elementType": "geometry.fill",
    "stylers": [
      {
        "color": "#a5b076"
      }
    ]
  },
  {
    "featureType": "poi.park",
    "elementType": "labels.text.fill",
    "stylers": [
      {
        "color": "#447530"
      }
    ]
  },
  {
    "featureType": "road",
    "elementType": "geometry",
    "stylers": [
      {
        "color": "#f5f1e6"
      }
    ]
  },
  {
    "featureType": "road.arterial",
    "elementType": "geometry",
    "stylers": [
      {
        "color": "#fdfcf8"
      }
    ]
  },
  {
    "featureType": "road.highway",
    "elementType": "geometry",
    "stylers": [
      {
        "color": "#f8c967"
      }
    ]
  },
  {
    "featureType": "road.highway",
    "elementType": "geometry.stroke",
    "stylers": [
      {
        "color": "#e9bc62"
      }
    ]
  },
  {
    "featureType": "road.highway.controlled_access",
    "elementType": "geometry",
    "stylers": [
      {
        "color": "#e98d58"
      }
    ]
  },
  {
    "featureType": "road.highway.controlled_access",
    "elementType": "geometry.stroke",
    "stylers": [
      {
        "color": "#db8555"
      }
    ]
  },
  {
    "featureType": "road.local",
    "elementType": "labels.text.fill",
    "stylers": [
      {
        "color": "#806b63"
      }
    ]
  },
  {
    "featureType": "transit.line",
    "elementType": "geometry",
    "stylers": [
      {
        "color": "#dfd2ae"
      }
    ]
  },
  {
    "featureType": "transit.line",
    "elementType": "labels.text.fill",
    "stylers": [
      {
        "color": "#8f7d77"
      }
    ]
  },
  {
    "featureType": "transit.line",
    "elementType": "labels.text.stroke",
    "stylers": [
      {
        "color": "#ebe3cd"
      }
    ]
  },
  {
    "featureType": "transit.station",
    "elementType": "geometry",
    "stylers": [
      {
        "color": "#dfd2ae"
      }
    ]
  },
  {
    "featureType": "water",
    "elementType": "geometry.fill",
    "stylers": [
      {
        "color": "#b9d3c2"
      }
    ]
  },
  {
    "featureType": "water",
    "elementType": "labels.text.fill",
    "stylers": [
      {
        "color": "#92998d"
      }
    ]
  }
]',
			4 => '[
  {
    "elementType": "geometry",
    "stylers": [
      {
        "color": "#212121"
      }
    ]
  },
  {
    "elementType": "labels.icon",
    "stylers": [
      {
        "visibility": "off"
      }
    ]
  },
  {
    "elementType": "labels.text.fill",
    "stylers": [
      {
        "color": "#757575"
      }
    ]
  },
  {
    "elementType": "labels.text.stroke",
    "stylers": [
      {
        "color": "#212121"
      }
    ]
  },
  {
    "featureType": "administrative",
    "elementType": "geometry",
    "stylers": [
      {
        "color": "#757575"
      }
    ]
  },
  {
    "featureType": "administrative.country",
    "elementType": "labels.text.fill",
    "stylers": [
      {
        "color": "#9e9e9e"
      }
    ]
  },
  {
    "featureType": "administrative.land_parcel",
    "stylers": [
      {
        "visibility": "off"
      }
    ]
  },
  {
    "featureType": "administrative.locality",
    "elementType": "labels.text.fill",
    "stylers": [
      {
        "color": "#bdbdbd"
      }
    ]
  },
  {
    "featureType": "poi",
    "elementType": "labels.text.fill",
    "stylers": [
      {
        "color": "#757575"
      }
    ]
  },
  {
    "featureType": "poi.park",
    "elementType": "geometry",
    "stylers": [
      {
        "color": "#181818"
      }
    ]
  },
  {
    "featureType": "poi.park",
    "elementType": "labels.text.fill",
    "stylers": [
      {
        "color": "#616161"
      }
    ]
  },
  {
    "featureType": "poi.park",
    "elementType": "labels.text.stroke",
    "stylers": [
      {
        "color": "#1b1b1b"
      }
    ]
  },
  {
    "featureType": "road",
    "elementType": "geometry.fill",
    "stylers": [
      {
        "color": "#2c2c2c"
      }
    ]
  },
  {
    "featureType": "road",
    "elementType": "labels.text.fill",
    "stylers": [
      {
        "color": "#8a8a8a"
      }
    ]
  },
  {
    "featureType": "road.arterial",
    "elementType": "geometry",
    "stylers": [
      {
        "color": "#373737"
      }
    ]
  },
  {
    "featureType": "road.highway",
    "elementType": "geometry",
    "stylers": [
      {
        "color": "#3c3c3c"
      }
    ]
  },
  {
    "featureType": "road.highway.controlled_access",
    "elementType": "geometry",
    "stylers": [
      {
        "color": "#4e4e4e"
      }
    ]
  },
  {
    "featureType": "road.local",
    "elementType": "labels.text.fill",
    "stylers": [
      {
        "color": "#616161"
      }
    ]
  },
  {
    "featureType": "transit",
    "elementType": "labels.text.fill",
    "stylers": [
      {
        "color": "#757575"
      }
    ]
  },
  {
    "featureType": "water",
    "elementType": "geometry",
    "stylers": [
      {
        "color": "#000000"
      }
    ]
  },
  {
    "featureType": "water",
    "elementType": "labels.text.fill",
    "stylers": [
      {
        "color": "#3d3d3d"
      }
    ]
  }
]',
			5 => '[
  {
    "elementType": "geometry",
    "stylers": [
      {
        "color": "#242f3e"
      }
    ]
  },
  {
    "elementType": "labels.text.fill",
    "stylers": [
      {
        "color": "#746855"
      }
    ]
  },
  {
    "elementType": "labels.text.stroke",
    "stylers": [
      {
        "color": "#242f3e"
      }
    ]
  },
  {
    "featureType": "administrative.locality",
    "elementType": "labels.text.fill",
    "stylers": [
      {
        "color": "#d59563"
      }
    ]
  },
  {
    "featureType": "poi",
    "elementType": "labels.text.fill",
    "stylers": [
      {
        "color": "#d59563"
      }
    ]
  },
  {
    "featureType": "poi.park",
    "elementType": "geometry",
    "stylers": [
      {
        "color": "#263c3f"
      }
    ]
  },
  {
    "featureType": "poi.park",
    "elementType": "labels.text.fill",
    "stylers": [
      {
        "color": "#6b9a76"
      }
    ]
  },
  {
    "featureType": "road",
    "elementType": "geometry",
    "stylers": [
      {
        "color": "#38414e"
      }
    ]
  },
  {
    "featureType": "road",
    "elementType": "geometry.stroke",
    "stylers": [
      {
        "color": "#212a37"
      }
    ]
  },
  {
    "featureType": "road",
    "elementType": "labels.text.fill",
    "stylers": [
      {
        "color": "#9ca5b3"
      }
    ]
  },
  {
    "featureType": "road.highway",
    "elementType": "geometry",
    "stylers": [
      {
        "color": "#746855"
      }
    ]
  },
  {
    "featureType": "road.highway",
    "elementType": "geometry.stroke",
    "stylers": [
      {
        "color": "#1f2835"
      }
    ]
  },
  {
    "featureType": "road.highway",
    "elementType": "labels.text.fill",
    "stylers": [
      {
        "color": "#f3d19c"
      }
    ]
  },
  {
    "featureType": "transit",
    "elementType": "geometry",
    "stylers": [
      {
        "color": "#2f3948"
      }
    ]
  },
  {
    "featureType": "transit.station",
    "elementType": "labels.text.fill",
    "stylers": [
      {
        "color": "#d59563"
      }
    ]
  },
  {
    "featureType": "water",
    "elementType": "geometry",
    "stylers": [
      {
        "color": "#17263c"
      }
    ]
  },
  {
    "featureType": "water",
    "elementType": "labels.text.fill",
    "stylers": [
      {
        "color": "#515c6d"
      }
    ]
  },
  {
    "featureType": "water",
    "elementType": "labels.text.stroke",
    "stylers": [
      {
        "color": "#17263c"
      }
    ]
  }
]',
			6 => '[
  {
    "elementType": "geometry",
    "stylers": [
      {
        "color": "#1d2c4d"
      }
    ]
  },
  {
    "elementType": "labels.text.fill",
    "stylers": [
      {
        "color": "#8ec3b9"
      }
    ]
  },
  {
    "elementType": "labels.text.stroke",
    "stylers": [
      {
        "color": "#1a3646"
      }
    ]
  },
  {
    "featureType": "administrative.country",
    "elementType": "geometry.stroke",
    "stylers": [
      {
        "color": "#4b6878"
      }
    ]
  },
  {
    "featureType": "administrative.land_parcel",
    "elementType": "labels.text.fill",
    "stylers": [
      {
        "color": "#64779e"
      }
    ]
  },
  {
    "featureType": "administrative.province",
    "elementType": "geometry.stroke",
    "stylers": [
      {
        "color": "#4b6878"
      }
    ]
  },
  {
    "featureType": "landscape.man_made",
    "elementType": "geometry.stroke",
    "stylers": [
      {
        "color": "#334e87"
      }
    ]
  },
  {
    "featureType": "landscape.natural",
    "elementType": "geometry",
    "stylers": [
      {
        "color": "#023e58"
      }
    ]
  },
  {
    "featureType": "poi",
    "elementType": "geometry",
    "stylers": [
      {
        "color": "#283d6a"
      }
    ]
  },
  {
    "featureType": "poi",
    "elementType": "labels.text.fill",
    "stylers": [
      {
        "color": "#6f9ba5"
      }
    ]
  },
  {
    "featureType": "poi",
    "elementType": "labels.text.stroke",
    "stylers": [
      {
        "color": "#1d2c4d"
      }
    ]
  },
  {
    "featureType": "poi.park",
    "elementType": "geometry.fill",
    "stylers": [
      {
        "color": "#023e58"
      }
    ]
  },
  {
    "featureType": "poi.park",
    "elementType": "labels.text.fill",
    "stylers": [
      {
        "color": "#3C7680"
      }
    ]
  },
  {
    "featureType": "road",
    "elementType": "geometry",
    "stylers": [
      {
        "color": "#304a7d"
      }
    ]
  },
  {
    "featureType": "road",
    "elementType": "labels.text.fill",
    "stylers": [
      {
        "color": "#98a5be"
      }
    ]
  },
  {
    "featureType": "road",
    "elementType": "labels.text.stroke",
    "stylers": [
      {
        "color": "#1d2c4d"
      }
    ]
  },
  {
    "featureType": "road.highway",
    "elementType": "geometry",
    "stylers": [
      {
        "color": "#2c6675"
      }
    ]
  },
  {
    "featureType": "road.highway",
    "elementType": "geometry.stroke",
    "stylers": [
      {
        "color": "#255763"
      }
    ]
  },
  {
    "featureType": "road.highway",
    "elementType": "labels.text.fill",
    "stylers": [
      {
        "color": "#b0d5ce"
      }
    ]
  },
  {
    "featureType": "road.highway",
    "elementType": "labels.text.stroke",
    "stylers": [
      {
        "color": "#023e58"
      }
    ]
  },
  {
    "featureType": "transit",
    "elementType": "labels.text.fill",
    "stylers": [
      {
        "color": "#98a5be"
      }
    ]
  },
  {
    "featureType": "transit",
    "elementType": "labels.text.stroke",
    "stylers": [
      {
        "color": "#1d2c4d"
      }
    ]
  },
  {
    "featureType": "transit.line",
    "elementType": "geometry.fill",
    "stylers": [
      {
        "color": "#283d6a"
      }
    ]
  },
  {
    "featureType": "transit.station",
    "elementType": "geometry",
    "stylers": [
      {
        "color": "#3a4762"
      }
    ]
  },
  {
    "featureType": "water",
    "elementType": "geometry",
    "stylers": [
      {
        "color": "#0e1626"
      }
    ]
  },
  {
    "featureType": "water",
    "elementType": "labels.text.fill",
    "stylers": [
      {
        "color": "#4e6d70"
      }
    ]
  }
]',
		);
		if ( empty( $templates[ $template ] ) ) {
			$map['map']['styles'] = '[]';
		} else {
			$map['map']['styles'] = str_replace( array( "\n", ), '', $templates[ $template ] );
		}

//		var_dump($template, $templates[2], $map['map']['styles']);
	} else {
		$map['map']['styles'] = $map_styles;
	}

	if ( ! empty ( $disable_default_ui ) ) {
		$map['map']['disableDefaultUI'] = ( 'yes' === $disable_default_ui );
	} else {
		$map['map']['zoomControl']       = ( 'yes' === $zoom_control );
		$map['map']['mapTypeControl']    = ( 'yes' === $map_type_control );
		$map['map']['scaleControl']      = ( 'yes' === $scale_control );
		$map['map']['streetViewControl'] = ( 'yes' === $street_view_control );
		$map['map']['rotateControl']     = ( 'yes' === $rotate_control );
		$map['map']['fullscreenControl'] = ( 'yes' === $fullscreen_control );
	}

//	if( ! empty( (int)$tilted ) ) {
//		wp_enqueue_script('google_maps_features', 'https://polyfill.io/v3/polyfill.min.js?features=default');
//		$map['map']['tilted'] = (int)$tilted;
//	}

	try {

		add_action( 'wp_footer', 'ssc_google_maps_add_init_js', 11 );

		foreach ( $markers as $i => $marker ) {
			$marker->zIndex   = empty( $marker->zIndex ) ? $i ++ : (int) $marker->zIndex;
			$map['markers'][] = ssc_google_maps_get_market_parameters( $marker );
//			$marker = array_merge( $def, (array) $marker );
//			$merged = (object) array_merge((array) $object_a, (array) $object_b);
		}


		$map = json_encode( $map, JSON_FORCE_OBJECT );
		/*---------------------------
		Output
		----------------------------*/
		$output .= '<div class="ssc-google-map ' . implode( ' ',
				$wrp_classes ) . ' ' . $el_class . '" data-ssc-google-map-parameters=\'' . $map . '\'>';
//		echo '<pre>';
//		var_dump( $map['markers'] );
//		echo '</pre>';

		$output .= '</div>';

	} catch ( Exception $e ) {
		return '<div class="ssc-google-map ' . implode( ' ',
				$wrp_classes ) . ' ' . $el_class . '" style="border:1px dashed #ccc;"><br /><h3>' . esc_html( $e->getMessage() ) . '</h3></div>';
	}

	return $output;
}

add_shortcode( 'ssc_google_maps', 'ssc_google_maps_shortcode' );

function ssc_google_maps_get_market_parameters( $atts ) {
	$lat = empty( $atts->lat ) ? 27.986065 : (float) $atts->lat;
	$lng = empty( $atts->lng ) ? 86.922623 : (float) $atts->lng;


	$def = array(
		'position' => array(
			'lat' => $lat,
			'lng' => $lng,
		),
	);
	if ( empty( $atts->icon_type ) ) {
		return $def;
	}
	switch ( $atts->icon_type ) {
		case 'svg':
			if ( ! empty( $atts->svg ) ) {
//				$icon = wp_get_attachment_url( $atts->svg );
				$icon = ssc_process_svg( $atts->svg );
				if ( '' !== $icon ) {
					if ( ! empty( $atts->svg_fill ) || ! empty( $atts->svg_hfill ) ) {
						$icon = str_replace( '<svg', '<svg fill="{{ color }}"', $icon );
					}
					$width       = empty ( $atts->svg_width ) ? 20 : (int) $atts->svg_width;
					$height      = empty ( $atts->svg_height ) ? 20 : (int) $atts->svg_height;
					$def['icon'] = array(
						'svg'    => $icon,
						'url'    => 'data:image/svg+xml;charset=UTF-8,',
						'size'   => array( $width, $height ),
						'origin' => array( 0, 0 ),
						'anchor' => array( 0, $height ),
					);
				}
			}
			break;
		case 'img':
			if ( ! empty( $atts->img ) ) {
				$img_size = empty( $atts->img_size ) ? '' : $atts->img_size;
				if ( '' !== $img_size && 'custom_size' !== $img_size ) {
					$img = image_downsize( $atts->img, $img_size );
				} else if ( 'custom_size' == $img_size && ! empty( $atts->custom_img_size ) ) {
					$size = ssc_get_img_sizes_array_from_string( $atts->custom_img_size );
					$img  = image_downsize( $atts->img, $size );
				} else {
					$img = image_downsize( $atts->img, 'full' );
				}

				if ( ! empty( $img[0] ) ) {
					$width       = empty( $img[1] ) ? 20 : (int) $img[1];
					$height      = empty( $img[2] ) ? 20 : (int) $img[2];
					$def['icon'] = array(
						'url'    => $img[0],
						'size'   => array( $width, $height ),
						'origin' => array( 0, 0 ),
						'anchor' => array( 0, $height ),
					);
				}
			}
			break;
	}

	unset(
		$atts->lat,
		$atts->lng,
		$atts->icon_type,
		$atts->svg,
		$atts->img,
		$atts->img_size,
		$atts->custom_img_size
	);

	return array_merge( $def, (array) $atts );

}

function ssc_google_maps_add_init_js() {
	wp_add_inline_script( 'atiframebuilder-google-maps-api', 'ssc_init_map()' );
}