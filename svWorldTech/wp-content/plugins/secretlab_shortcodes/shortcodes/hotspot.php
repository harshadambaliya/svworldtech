<?php
add_action( 'init', 'ssc_hotspot_params', 99 );

function ssc_hotspot_params() {
	global $kc;

	$kc->add_map( array(
		'ssc_hotspot' => array(
			'name'             => __( 'Hotspot', 'ssc' ),
			'description'      => __( 'Hotspot Effect', 'ssc' ),
			'icon'             => 'ssc-icon-28',
			'category'         => 'SecretLab',
			'preview_editable' => true,
//			'assets' => array(
//				'styles' => array(
//					'footer-nested-ace-css' => false,
//				),
//			),
			'params'           => array(
				'general' => array(
					array(
						'name'        => 'image',
						'type'        => 'attach_image',
						'label'       => esc_html__( 'Image', 'ssc' ),
						'description' => esc_html__( 'Image for showing in block.', 'ssc' ),
					),
					array(
						'name'        => 'image_size',
						'type'        => 'dropdown',
						'label'       => esc_html__( 'Image size', 'ssc' ),
						'description' => esc_html__( 'Set the image size.', 'ssc' ),
						'value'       => 'full',
						'options'     => ssc_get_image_sizes(),
					),
					array(
						'type'        => 'text',
						'label'       => esc_html__( 'Custom Image size', 'ssc' ),
						'name'        => 'custom_image_size',
						'description' => esc_html__( 'Set the image size: "thumbnail", "medium", "large", "full" or "400x200".',
							'ssc' ),
//                            'value'       	=> 'full',
						'relation'    => array(
							'parent'    => 'image_size',
							'show_when' => 'custom_size',
						),
					),
					array(
						'name'        => 'alt',
						'label'       => 'Alt',
						'type'        => 'text',
						'description' => __( ' Enter the image alt property.', 'ssc' ),
					),
					array(
						'name' => 'show_on',
						'label' => __( 'Show popup on.', 'ssc' ),
						'type' => 'radio',  // USAGE RADIO TYPE
						'options' => array(    // REQUIRED
							'click' => __( 'Click', 'ssc' ),
							'hover' => __( 'Hover', 'ssc' ),
						),
						'value' => 'click',
					),
					array(
						'name' => 'el_class',
						'label' => esc_html__( 'Extra Class Name', 'ssc' ),
						'type' => 'text',
						'description' => esc_html__( 'If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your CSS file.', 'ssc' ),
						'admin_label' => true,
						'value' => ''
					),
					array(
						'type'        => 'group',
						'label'       => __( 'Points', 'ssc' ),
						'name'        => 'points',
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
								'name'        => 'icon_type',
								'label'       => esc_html__( 'Icon Type', 'ssc' ),
								'type'        => 'radio',
								'options'     => array(
									'icon' => esc_html__( 'Icon', 'ssc' ),
									'img'  => esc_html__( 'Image', 'ssc' ),
									'svg'  => esc_html__( 'SVG', 'ssc' ),
								),
								'value'       => 'icon',
								'description' => esc_html__( 'Pick what to display: icon, or svg', 'ssc' ),
							),
							array(
								'name'        => 'icon',
								'label'       => esc_html__( 'Select Icon', 'ssc' ),
								'type'        => 'icon_picker',
								'admin_label' => true,
								'value'       => 'nat-return-of-investment-roi',
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
								'type'        => 'text',
								'label'       => esc_html__( 'Custom Image size', 'ssc' ),
								'name'        => 'custom_img_size',
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
								'name'        => 'top',
								'label'       => esc_html__( 'Point top position', 'ssc' ),
								'type'        => 'text',
								'admin_label' => true,
								'value'       => '0%',
							),
							array(
								'name'        => 'right',
								'label'       => esc_html__( 'Point right position', 'ssc' ),
								'type'        => 'text',
								'admin_label' => true,
								'value'       => '',
							),
							array(
								'name'        => 'bottom',
								'label'       => esc_html__( 'Point bottom position', 'ssc' ),
								'type'        => 'text',
								'admin_label' => true,
								'value'       => '',
							),
							array(
								'name'        => 'left',
								'label'       => esc_html__( 'Point left position', 'ssc' ),
								'type'        => 'text',
								'admin_label' => true,
								'value'       => '0%',
							),
							array(
								'name'        => 'title',
								'label'       => esc_html__( 'Title', 'ssc' ),
								'type'        => 'text',
								'description' => esc_html__( 'Title of the popup.', 'ssc' ),
								'admin_label' => true,
								'value'       => esc_html__( 'Title Goes Here', 'ssc' ),
							),
							array(
								'name'        => 'popup_img',
								'label'       => esc_html__( 'Select Image for popup', 'ssc' ),
								'type'        => 'attach_image',
								'admin_label' => true,
							),
							array(
								'name'        => 'popup_img_size',
								'type'        => 'dropdown',
								'label'       => esc_html__( 'Image size for popup', 'ssc' ),
								'description' => esc_html__( 'Set the image size.', 'ssc' ),
								'value'       => 'full',
								'options'     => ssc_get_image_sizes(),
							),
							array(
								'type'        => 'text',
								'label'       => esc_html__( 'Custom Image size for popup', 'ssc' ),
								'name'        => 'popup_custom_img_size',
								'description' => esc_html__( 'Set the image size: "thumbnail", "medium", "large", "full" or "400x200".',
									'ssc' ),
							),
							array(
								'name'        => 'subtitle',
								'label'       => esc_html__( 'Subtitle', 'ssc' ),
								'type'        => 'text',
								'description' => esc_html__( 'Subtitle of the popup.', 'ssc' ),
								'admin_label' => true,
								'value'       => esc_html__( 'Subtitle Goes Here', 'ssc' ),
							),
							array(
								'name'        => 'description',
								'label'       => esc_html__( 'Description', 'ssc' ),
								'type'        => 'textarea',
								'description' => __( ' Enter the image description.', 'ssc' ),
							),
							array(
								'name'        => 'popup_top',
								'label'       => esc_html__( 'Popup top position', 'ssc' ),
								'type'        => 'text',
								'admin_label' => true,
								'value'       => '',
							),
							array(
								'name'        => 'popup_right',
								'label'       => esc_html__( 'Popup right position', 'ssc' ),
								'type'        => 'text',
								'admin_label' => true,
								'value'       => '',
							),
							array(
								'name'        => 'popup_bottom',
								'label'       => esc_html__( 'Popup bottom position', 'ssc' ),
								'type'        => 'text',
								'admin_label' => true,
								'value'       => '',
							),
							array(
								'name'        => 'popup_left',
								'label'       => esc_html__( 'Popup left position', 'ssc' ),
								'type'        => 'text',
								'admin_label' => true,
								'value'       => '',
							),
						),
					),
				),
				//Styling
				esc_html__( 'styling', 'ssc' ) => array(
					array(
						'name' => 'my-css',
						'label' =>  esc_html__( 'Styling', 'ssc' ),
						'type' => 'css',
						'value' => '', // remove this if you do not need a default content
						'description' => esc_html__( 'Styles', 'ssc' ),
						'options' => array(
							array(
								'screens' => "any,999,768,667,479",
								'Box' => array(
									array('property' => 'background'),
									array('property' => 'display', 'label' => esc_html__( 'Display', 'ssc' )),
									array('property' => 'float', 'label' => esc_html__( 'Float', 'ssc' )),
									array('property' => 'max-width', 'label' => esc_html__( 'Max Width', 'ssc' )),
									array('property' => 'width', 'label' => esc_html__( 'Width', 'ssc' )),
									array('property' => 'height', 'label' => esc_html__( 'Height', 'ssc' )),
									array('property' => 'box-shadow', 'label' => esc_html__( 'Box Shadow', 'ssc' )),
									array('property' => 'opacity', 'label' => esc_html__( 'Opacity', 'ssc' )),
									array('property' => 'margin', 'label' => esc_html__( 'Margin', 'ssc' )),
									array('property' => 'padding', 'label' => esc_html__( 'Padding', 'ssc' )),
									array('property' => 'border', 'label' => esc_html__( 'Border', 'ssc' )),
									array('property' => 'border-radius', 'label' => esc_html__( 'Border Radius', 'ssc' )),
								),
								'Image' => array(
									array('property' => 'background', 'selector' => '.background-image'),
									array('property' => 'display', 'label' => esc_html__( 'Display', 'ssc' ), 'selector' => '.background-image'),
									array('property' => 'float', 'label' => esc_html__( 'Float', 'ssc' ), 'selector' => '.background-image'),
									array('property' => 'max-width', 'label' => esc_html__( 'Max Width', 'ssc' ), 'selector' => '.background-image'),
									array('property' => 'width', 'label' => esc_html__( 'Width', 'ssc' ), 'selector' => '.background-image'),
									array('property' => 'height', 'label' => esc_html__( 'Height', 'ssc' ), 'selector' => '.background-image'),
									array('property' => 'box-shadow', 'label' => esc_html__( 'Box Shadow', 'ssc' ), 'selector' => '.background-image'),
									array('property' => 'opacity', 'label' => esc_html__( 'Opacity', 'ssc' ), 'selector' => '.background-image'),
									array('property' => 'margin', 'label' => esc_html__( 'Margin', 'ssc' ), 'selector' => '.background-image'),
									array('property' => 'padding', 'label' => esc_html__( 'Padding', 'ssc' ), 'selector' => '.background-image'),
									array('property' => 'border', 'label' => esc_html__( 'Border', 'ssc' ), 'selector' => '.background-image'),
									array('property' => 'border-radius', 'label' => esc_html__( 'Border Radius', 'ssc' ), 'selector' => '.background-image'),
								),
								'Point' => array(
									array('property' => 'display', 'label' => esc_html__( 'Display', 'ssc' ), 'selector' => '.button i, .button svg, .button img'),
									array('property' => 'color', 'label' => esc_html__( 'Color', 'ssc' ), 'selector' => '.button i'),
									array('property' => 'font-size', 'label' => esc_html__( 'Font Size', 'ssc' ), 'selector' => '.button i'),
									array('property' => 'line-height', 'label' => esc_html__( 'Line Height', 'ssc' ), 'selector' => '.button i'),
									array('property' => 'font-weight', 'label' => esc_html__( 'Font Weight', 'ssc' ), 'selector' => '.button i'),
									array('property' => 'text-decoration', 'label' => esc_html__( 'Text Decoration', 'ssc' ), 'selector' => '.button i'),
									array('property' => 'width', 'label' => esc_html__( 'Width', 'ssc' ), 'selector' => '.button svg, .button img'),
									array('property' => 'height', 'label' => esc_html__( 'Height', 'ssc' ), 'selector' => '.button svg, .button img'),
									array('property' => 'fill', 'label' => esc_html__( 'Fill', 'ssc' ), 'selector' => '.button svg'),
									array('property' => 'background', 'selector' => '.button i, .button svg, .button img'),
									array('property' => 'box-shadow', 'label' => esc_html__( 'Box Shadow', 'ssc' ), 'selector' => '.button i, .button svg, .button img'),
									array('property' => 'opacity', 'label' => esc_html__( 'Opacity', 'ssc' ), 'selector' => '.button i, .button svg, .button img'),
									array('property' => 'margin', 'label' => esc_html__( 'Margin', 'ssc' ), 'selector' => '.button i, .button svg, .button img'),
									array('property' => 'padding', 'label' => esc_html__( 'Padding', 'ssc' ), 'selector' => '.button i, .button svg, .button img'),
									array('property' => 'border', 'label' => esc_html__( 'Border', 'ssc' ), 'selector' => '.button i, .button svg, .button img'),
									array('property' => 'border-radius', 'label' => esc_html__( 'Border Radius', 'ssc' ), 'selector' => '.button i, .button svg, .button img'),
								),
								// --> Icon Box
								'Point Box' => array(
									array('property' => 'background', 'selector' => '.button'),
									array('property' => 'display', 'label' => esc_html__( 'Display', 'ssc' ), 'selector' => '.button'),
									array('property' => 'width', 'label' => esc_html__( 'Width', 'ssc' ), 'selector' => '.button'),
									array('property' => 'height', 'label' => esc_html__( 'Height', 'ssc' ), 'selector' => '.button'),
									array('property' => 'box-shadow', 'label' => esc_html__( 'Box Shadow', 'ssc' ), 'selector' => '.button'),
									array('property' => 'opacity', 'label' => esc_html__( 'Opacity', 'ssc' ), 'selector' => '.button'),
									array('property' => 'margin', 'label' => esc_html__( 'Margin', 'ssc' ), 'selector' => '.button'),
									array('property' => 'padding', 'label' => esc_html__( 'Padding', 'ssc' ), 'selector' => '.button'),
									array('property' => 'border', 'label' => esc_html__( 'Border', 'ssc' ), 'selector' => '.button'),
									array('property' => 'border-radius', 'label' => esc_html__( 'Border Radius', 'ssc' ), 'selector' => '.button'),
									array('property' => 'text-align', 'label' => esc_html__( 'Text Align', 'ssc' ), 'selector' => '.button'),
								),
								//Popup
								'Popup' => array(
									array('property' => 'display', 'label' => esc_html__( 'Close icon', 'ssc' ) . ' ' . esc_html__( 'Display', 'ssc' ), 'selector' => '.popup .popup-close'),
									array('property' => 'text-align', 'label' => esc_html__( 'Close icon', 'ssc' ) . ' ' . esc_html__( 'Position', 'ssc' ), 'selector' => '.popup .popup-close-wrapper'),
									array('property' => 'line-height', 'label' => esc_html__( 'Close icon', 'ssc' ) . ' ' . esc_html__( 'Line Height', 'ssc' ), 'selector' => '.popup .popup-close'),
									array('property' => 'width', 'label' => esc_html__( 'Close icon', 'ssc' ) . ' ' . esc_html__( 'Width', 'ssc' ), 'selector' => '.popup .popup-close svg'),
									array('property' => 'height', 'label' => esc_html__( 'Close icon', 'ssc' ) . ' ' . esc_html__( 'Height', 'ssc' ), 'selector' => '.popup .popup-close svg'),
									array('property' => 'fill', 'label' => esc_html__( 'Close icon', 'ssc' ) . ' ' . esc_html__( 'Fill', 'ssc' ), 'selector' => '.popup .popup-close svg'),
									array('property' => 'background', 'selector' => '.popup .popup-close'),
									array('property' => 'box-shadow', 'label' => esc_html__( 'Close icon', 'ssc' ) . ' ' . esc_html__( 'Box Shadow', 'ssc' ), 'selector' => '.popup .popup-close'),
									array('property' => 'opacity', 'label' => esc_html__( 'Close icon', 'ssc' ) . ' ' . esc_html__( 'Opacity', 'ssc' ), 'selector' => '.popup .popup-close'),
									array('property' => 'margin', 'label' => esc_html__( 'Close icon', 'ssc' ) . ' ' . esc_html__( 'Margin', 'ssc' ), 'selector' => '.popup .popup-close'),
									array('property' => 'padding', 'label' => esc_html__( 'Close icon', 'ssc' ) . ' ' . esc_html__( 'Padding', 'ssc' ), 'selector' => '.popup .popup-close'),
									array('property' => 'border', 'label' => esc_html__( 'Close icon', 'ssc' ) . ' ' . esc_html__( 'Border', 'ssc' ), 'selector' => '.popup .popup-close'),
									array('property' => 'border-radius', 'label' => esc_html__( 'Close icon', 'ssc' ) . ' ' . esc_html__( 'Border Radius', 'ssc' ), 'selector' => '.popup .popup-close'),
									array('property' => 'display', 'label' =>  esc_html__( 'Display', 'ssc' ), 'selector' => '.popup'),
									array('property' => 'width', 'label' =>  esc_html__( 'Width', 'ssc' ), 'selector' => '.popup'),
									array('property' => 'height', 'label' =>  esc_html__( 'Height', 'ssc' ), 'selector' => '.popup'),
									array('property' => 'background', 'selector' => '.popup'),
									array('property' => 'text-align', 'label' =>  esc_html__( 'Text Align', 'ssc' ), 'selector' => '.popup'),
									array('property' => 'margin', 'label' =>  esc_html__( 'Margin', 'ssc' ), 'selector' => '.popup'),
									array('property' => 'padding', 'label' =>  esc_html__( 'Padding', 'ssc' ), 'selector' => '.popup'),
									array('property' => 'border', 'label' =>  esc_html__( 'Border', 'ssc' ), 'selector' => '.popup'),
									array('property' => 'border-radius', 'label' =>  esc_html__( 'Border Radius', 'ssc' ), 'selector' => '.popup'),
									array('property' => 'box-shadow', 'label' =>  esc_html__( 'Box Shadow', 'ssc' ), 'selector' => '.popup'),
									array('property' => 'opacity', 'label' =>  esc_html__( 'Opacity', 'ssc' ), 'selector' => '.popup'),
									array('property' => 'z-index', 'label' =>  esc_html__( 'z-index', 'ssc' ), 'selector' => '.popup'),
								),
								'Popup Title' => array(
									array('property' => 'color', 'label' =>  esc_html__( 'Color', 'ssc' ), 'selector' => '.title'),
									array('property' => 'font-size', 'label' =>  esc_html__( 'Font Size', 'ssc' ), 'selector' => '.title'),
									array('property' => 'font-weight', 'label' =>  esc_html__( 'Font Weight', 'ssc' ), 'selector' => '.title'),
									array('property' => 'font-style', 'label' =>  esc_html__( 'Font Style', 'ssc' ), 'selector' => '.title'),
									array('property' => 'font-family', 'label' =>  esc_html__( 'Font Family', 'ssc' ), 'selector' => '.title'),
									array('property' => 'text-align', 'label' =>  esc_html__( 'Text Align', 'ssc' ), 'selector' => '.title'),
									array('property' => 'text-shadow', 'label' =>  esc_html__( 'Text Shadow', 'ssc' ), 'selector' => '.title'),
									array('property' => 'text-transform', 'label' =>  esc_html__( 'Text Transform', 'ssc' ), 'selector' => '.title'),
									array('property' => 'text-decoration', 'label' =>  esc_html__( 'Text Decoration', 'ssc' ), 'selector' => '.title'),
									array('property' => 'line-height', 'label' =>  esc_html__( 'Line Height', 'ssc' ), 'selector' => '.title'),
									array('property' => 'letter-spacing', 'label' =>  esc_html__( 'Letter Spacing', 'ssc' ), 'selector' => '.title'),
									array('property' => 'overflow', 'label' =>  esc_html__( 'Overflow', 'ssc' ), 'selector' => '.title'),
									array('property' => 'word-break', 'label' =>  esc_html__( 'Word Break', 'ssc' ), 'selector' => '.title'),
									array('property' => 'background', 'selector' => '.title'),
									array('property' => 'margin', 'label' =>  esc_html__( 'Margin', 'ssc' ), 'selector' => '.title'),
									array('property' => 'padding', 'label' =>  esc_html__( 'Padding', 'ssc' ), 'selector' => '.title'),
									array('property' => 'border', 'label' =>  esc_html__( 'Border', 'ssc' ), 'selector' => '.title'),
									array('property' => 'width', 'label' =>  esc_html__( 'Width', 'ssc' ), 'selector' => '.title'),
									array('property' => 'height', 'label' =>  esc_html__( 'Height', 'ssc' ), 'selector' => '.title'),
									array('property' => 'border-radius', 'label' =>  esc_html__( 'Border Radius', 'ssc' ), 'selector' => '.title'),
									array('property' => 'float', 'label' =>  esc_html__( 'Float', 'ssc' ), 'selector' => '.title'),
									array('property' => 'display', 'label' =>  esc_html__( 'Display', 'ssc' ), 'selector' => '.title'),
									array('property' => 'box-shadow', 'label' =>  esc_html__( 'Box Shadow', 'ssc' ), 'selector' => '.title'),
									array('property' => 'opacity', 'label' =>  esc_html__( 'Opacity', 'ssc' ), 'selector' => '.title'),
								),
								'Popup Image Box' => array(
									array('property' => 'text-align', 'label' => esc_html__( 'Image Alignment', 'ssc' ), 'selector' => '.thumbnail'),
									array('property' => 'display', 'label' => esc_html__( 'Image Display', 'ssc' ), 'selector' => '.thumbnail'),
									array('property' => 'float', 'label' => esc_html__( 'Image Float', 'ssc' ), 'selector' => '.thumbnail'),
									array('property' => 'background', 'selector' => '.thumbnail'),
									array('property' => 'box-shadow', 'label' => esc_html__( 'Box Shadow', 'ssc' ), 'selector' => '.thumbnail'),
									array( 'property' => 'opacity', 'label'    => esc_html__( 'Opacity', 'ssc' ), 'selector' => '.thumbnail', ),
									array('property' => 'border', 'label' => esc_html__( 'Border', 'ssc' ), 'selector' => '.thumbnail'),
									array('property' => 'border-radius', 'label' => esc_html__( 'Border Radius', 'ssc' ), 'selector' => '.thumbnail'),
									array('property' => 'width', 'label' => esc_html__( 'Width', 'ssc' ), 'selector' => '.thumbnail'),
									array('property' => 'height', 'label' => esc_html__( 'Height', 'ssc' ), 'selector' => '.thumbnail'),
									array('property' => 'max-width', 'label' => esc_html__( 'Max Width', 'ssc' ), 'selector' => '.thumbnail'),
									array('property' => 'vertical-align', 'label' => esc_html__( 'Vertical Align', 'ssc' ), 'selector' => '.thumbnail'),
									array('property' => 'margin', 'label' => esc_html__( 'Margin', 'ssc' ), 'selector' => '.thumbnail'),
									array('property' => 'padding', 'label' => esc_html__( 'Padding', 'ssc' ), 'selector' => '.thumbnail')
								),
								'Popup Image' => array(
									array('property' => 'display', 'label' => esc_html__( 'Image Display', 'ssc' ), 'selector' => '.thumbnail img'),
									array('property' => 'float', 'label' => esc_html__( 'Image Float', 'ssc' ), 'selector' => '.thumbnail img'),
									array('property' => 'background-color', 'label' => esc_html__( 'Background Color', 'ssc' ), 'selector' => '.thumbnail img'),
									array('property' => 'box-shadow', 'label' => esc_html__( 'Box Shadow', 'ssc' ), 'selector' => '.thumbnail img'),
									array( 'property' => 'opacity', 'label'    => esc_html__( 'Opacity', 'ssc' ), 'selector' => '.thumbnail img', ),
									array('property' => 'border', 'label' => esc_html__( 'Border', 'ssc' ), 'selector' => '.thumbnail img'),
									array('property' => 'border-radius', 'label' => esc_html__( 'Border Radius', 'ssc' ), 'selector' => '.thumbnail img'),
									array('property' => 'width', 'label' => esc_html__( 'Width', 'ssc' ), 'selector' => '.thumbnail img'),
									array('property' => 'height', 'label' => esc_html__( 'Height', 'ssc' ), 'selector' => '.thumbnail img'),
									array('property' => 'max-width', 'label' => esc_html__( 'Max Width', 'ssc' ), 'selector' => '.thumbnail img'),
									array('property' => 'vertical-align', 'label' => esc_html__( 'Vertical Align', 'ssc' ), 'selector' => '.thumbnail img'),
									array('property' => 'margin', 'label' => esc_html__( 'Margin', 'ssc' ), 'selector' => '.thumbnail img'),
									array('property' => 'padding', 'label' => esc_html__( 'Padding', 'ssc' ), 'selector' => '.thumbnail img')
								),
								'Popup Subtitle' => array(
									array('property' => 'color', 'label' =>  esc_html__( 'Color', 'ssc' ), 'selector' => '.subtitle'),
									array('property' => 'font-size', 'label' =>  esc_html__( 'Font Size', 'ssc' ), 'selector' => '.subtitle'),
									array('property' => 'font-weight', 'label' =>  esc_html__( 'Font Weight', 'ssc' ), 'selector' => '.subtitle'),
									array('property' => 'font-style', 'label' =>  esc_html__( 'Font Style', 'ssc' ), 'selector' => '.subtitle'),
									array('property' => 'font-family', 'label' =>  esc_html__( 'Font Family', 'ssc' ), 'selector' => '.subtitle'),
									array('property' => 'text-align', 'label' =>  esc_html__( 'Text Align', 'ssc' ), 'selector' => '.subtitle'),
									array('property' => 'text-shadow', 'label' =>  esc_html__( 'Text Shadow', 'ssc' ), 'selector' => '.subtitle'),
									array('property' => 'text-transform', 'label' =>  esc_html__( 'Text Transform', 'ssc' ), 'selector' => '.subtitle'),
									array('property' => 'text-decoration', 'label' =>  esc_html__( 'Text Decoration', 'ssc' ), 'selector' => '.subtitle'),
									array('property' => 'line-height', 'label' =>  esc_html__( 'Line Height', 'ssc' ), 'selector' => '.subtitle'),
									array('property' => 'letter-spacing', 'label' =>  esc_html__( 'Letter Spacing', 'ssc' ), 'selector' => '.subtitle'),
									array('property' => 'overflow', 'label' =>  esc_html__( 'Overflow', 'ssc' ), 'selector' => '.subtitle'),
									array('property' => 'word-break', 'label' =>  esc_html__( 'Word Break', 'ssc' ), 'selector' => '.subtitle'),
									array('property' => 'background', 'selector' => '.subtitle'),
									array('property' => 'margin', 'label' =>  esc_html__( 'Margin', 'ssc' ), 'selector' => '.subtitle'),
									array('property' => 'padding', 'label' =>  esc_html__( 'Padding', 'ssc' ), 'selector' => '.subtitle'),
									array('property' => 'border', 'label' =>  esc_html__( 'Border', 'ssc' ), 'selector' => '.subtitle'),
									array('property' => 'width', 'label' =>  esc_html__( 'Width', 'ssc' ), 'selector' => '.subtitle'),
									array('property' => 'height', 'label' =>  esc_html__( 'Height', 'ssc' ), 'selector' => '.subtitle'),
									array('property' => 'border-radius', 'label' =>  esc_html__( 'Border Radius', 'ssc' ), 'selector' => '.subtitle'),
									array('property' => 'float', 'label' =>  esc_html__( 'Float', 'ssc' ), 'selector' => '.subtitle'),
									array('property' => 'display', 'label' =>  esc_html__( 'Display', 'ssc' ), 'selector' => '.subtitle'),
									array('property' => 'box-shadow', 'label' =>  esc_html__( 'Box Shadow', 'ssc' ), 'selector' => '.subtitle'),
									array('property' => 'opacity', 'label' =>  esc_html__( 'Opacity', 'ssc' ), 'selector' => '.subtitle'),
								),
								'Popup Description' => array(
									array('property' => 'color', 'label' =>  esc_html__( 'Color', 'ssc' ), 'selector' => '.description'),
									array('property' => 'font-size', 'label' =>  esc_html__( 'Font Size', 'ssc' ), 'selector' => '.description'),
									array('property' => 'font-weight', 'label' =>  esc_html__( 'Font Weight', 'ssc' ), 'selector' => '.description'),
									array('property' => 'font-style', 'label' =>  esc_html__( 'Font Style', 'ssc' ), 'selector' => '.description'),
									array('property' => 'font-family', 'label' =>  esc_html__( 'Font Family', 'ssc' ), 'selector' => '.description'),
									array('property' => 'text-align', 'label' =>  esc_html__( 'Text Align', 'ssc' ), 'selector' => '.description'),
									array('property' => 'text-shadow', 'label' =>  esc_html__( 'Text Shadow', 'ssc' ), 'selector' => '.description'),
									array('property' => 'text-transform', 'label' =>  esc_html__( 'Text Transform', 'ssc' ), 'selector' => '.description'),
									array('property' => 'text-decoration', 'label' =>  esc_html__( 'Text Decoration', 'ssc' ), 'selector' => '.description'),
									array('property' => 'line-height', 'label' =>  esc_html__( 'Line Height', 'ssc' ), 'selector' => '.description'),
									array('property' => 'letter-spacing', 'label' =>  esc_html__( 'Letter Spacing', 'ssc' ), 'selector' => '.description'),
									array('property' => 'overflow', 'label' =>  esc_html__( 'Overflow', 'ssc' ), 'selector' => '.description'),
									array('property' => 'word-break', 'label' =>  esc_html__( 'Word Break', 'ssc' ), 'selector' => '.description'),
									array('property' => 'background', 'selector' => '.description'),
									array('property' => 'margin', 'label' =>  esc_html__( 'Margin', 'ssc' ), 'selector' => '.description'),
									array('property' => 'padding', 'label' =>  esc_html__( 'Padding', 'ssc' ), 'selector' => '.description'),
									array('property' => 'border', 'label' =>  esc_html__( 'Border', 'ssc' ), 'selector' => '.description'),
									array('property' => 'width', 'label' =>  esc_html__( 'Width', 'ssc' ), 'selector' => '.description'),
									array('property' => 'height', 'label' =>  esc_html__( 'Height', 'ssc' ), 'selector' => '.description'),
									array('property' => 'border-radius', 'label' =>  esc_html__( 'Border Radius', 'ssc' ), 'selector' => '.description'),
									array('property' => 'float', 'label' =>  esc_html__( 'Float', 'ssc' ), 'selector' => '.description'),
									array('property' => 'display', 'label' =>  esc_html__( 'Display', 'ssc' ), 'selector' => '.description'),
									array('property' => 'box-shadow', 'label' =>  esc_html__( 'Box Shadow', 'ssc' ), 'selector' => '.description'),
									array('property' => 'opacity', 'label' =>  esc_html__( 'Opacity', 'ssc' ), 'selector' => '.description'),
								),
							),

						)
					)
				),
				esc_html__( 'hover', 'ssc' ) => array(
					array(
						'name' => 'my-css-hover',
						'label' =>  esc_html__( 'Hover', 'ssc' ),
						'type' => 'css',
						'value' => '', // remove this if you do not need a default content
						'description' => esc_html__( 'Styles on hover', 'ssc' ),
						'options' => array(
							array(
								'screens' => "any,999,768,667,479",
								'Box' => array(
									array('property' => 'background', 'selector' => ':hover'),
									array('property' => 'display', 'label' => esc_html__( 'Display', 'ssc' ), 'selector' => ':hover'),
									array('property' => 'float', 'label' => esc_html__( 'Float', 'ssc' ), 'selector' => ':hover'),
									array('property' => 'max-width', 'label' => esc_html__( 'Max Width', 'ssc' ), 'selector' => ':hover'),
									array('property' => 'width', 'label' => esc_html__( 'Width', 'ssc' ), 'selector' => ':hover'),
									array('property' => 'height', 'label' => esc_html__( 'Height', 'ssc' ), 'selector' => ':hover'),
									array('property' => 'box-shadow', 'label' => esc_html__( 'Box Shadow', 'ssc' ), 'selector' => ':hover'),
									array('property' => 'opacity', 'label' => esc_html__( 'Opacity', 'ssc' ), 'selector' => ':hover'),
									array('property' => 'margin', 'label' => esc_html__( 'Margin', 'ssc' ), 'selector' => ':hover'),
									array('property' => 'padding', 'label' => esc_html__( 'Padding', 'ssc' ), 'selector' => ':hover'),
									array('property' => 'border', 'label' => esc_html__( 'Border', 'ssc' ), 'selector' => ':hover'),
									array('property' => 'border-radius', 'label' => esc_html__( 'Border Radius', 'ssc' ), 'selector' => ':hover'),
								),
								'Image' => array(
									array('property' => 'background', 'selector' => ':hover .background-image'),
									array('property' => 'display', 'label' => esc_html__( 'Display', 'ssc' ), 'selector' => ':hover .background-image'),
									array('property' => 'float', 'label' => esc_html__( 'Float', 'ssc' ), 'selector' => ':hover .background-image'),
									array('property' => 'max-width', 'label' => esc_html__( 'Max Width', 'ssc' ), 'selector' => ':hover .background-image'),
									array('property' => 'width', 'label' => esc_html__( 'Width', 'ssc' ), 'selector' => ':hover .background-image'),
									array('property' => 'height', 'label' => esc_html__( 'Height', 'ssc' ), 'selector' => ':hover .background-image'),
									array('property' => 'box-shadow', 'label' => esc_html__( 'Box Shadow', 'ssc' ), 'selector' => ':hover .background-image'),
									array('property' => 'opacity', 'label' => esc_html__( 'Opacity', 'ssc' ), 'selector' => ':hover .background-image'),
									array('property' => 'margin', 'label' => esc_html__( 'Margin', 'ssc' ), 'selector' => ':hover .background-image'),
									array('property' => 'padding', 'label' => esc_html__( 'Padding', 'ssc' ), 'selector' => ':hover .background-image'),
									array('property' => 'border', 'label' => esc_html__( 'Border', 'ssc' ), 'selector' => ':hover .background-image'),
									array('property' => 'border-radius', 'label' => esc_html__( 'Border Radius', 'ssc' ), 'selector' => ':hover .background-image'),
								),
								'Point' => array(
									array('property' => 'display', 'label' => esc_html__( 'Display', 'ssc' ), 'selector' => '.button:hover i, .button:hover svg, .button:hover img'),
									array('property' => 'color', 'label' => esc_html__( 'Color', 'ssc' ), 'selector' => '.button:hover i'),
									array('property' => 'font-size', 'label' => esc_html__( 'Font Size', 'ssc' ), 'selector' => '.button:hover i'),
									array('property' => 'line-height', 'label' => esc_html__( 'Line Height', 'ssc' ), 'selector' => '.button:hover i'),
									array('property' => 'font-weight', 'label' => esc_html__( 'Font Weight', 'ssc' ), 'selector' => '.button:hover i'),
									array('property' => 'text-decoration', 'label' => esc_html__( 'Text Decoration', 'ssc' ), 'selector' => '.button:hover i'),
									array('property' => 'width', 'label' => esc_html__( 'Width', 'ssc' ), 'selector' => '.button:hover svg, .button:hover img'),
									array('property' => 'height', 'label' => esc_html__( 'Height', 'ssc' ), 'selector' => '.button:hover svg, .button:hover img'),
									array('property' => 'fill', 'label' => esc_html__( 'Fill', 'ssc' ), 'selector' => '.button:hover svg'),
									array('property' => 'background', 'selector' => '.button:hover i, .button:hover svg, .button:hover img'),
									array('property' => 'box-shadow', 'label' => esc_html__( 'Box Shadow', 'ssc' ), 'selector' => '.button:hover i, .button:hover svg, .button:hover img'),
									array('property' => 'opacity', 'label' => esc_html__( 'Opacity', 'ssc' ), 'selector' => '.button:hover i, .button:hover svg, .button:hover img'),
									array('property' => 'margin', 'label' => esc_html__( 'Margin', 'ssc' ), 'selector' => '.button:hover i, .button:hover svg, .button:hover img'),
									array('property' => 'padding', 'label' => esc_html__( 'Padding', 'ssc' ), 'selector' => '.button:hover i, .button:hover svg, .button:hover img'),
									array('property' => 'border', 'label' => esc_html__( 'Border', 'ssc' ), 'selector' => '.button:hover i, .button:hover svg, .button:hover img'),
									array('property' => 'border-radius', 'label' => esc_html__( 'Border Radius', 'ssc' ), 'selector' => '.button:hover i, .button:hover svg, .button:hover img'),
								),
								// --> Icon Box
								'Point Box' => array(
									array('property' => 'background', 'selector' => '.button:hover'),
									array('property' => 'display', 'label' => esc_html__( 'Display', 'ssc' ), 'selector' => '.button:hover'),
									array('property' => 'width', 'label' => esc_html__( 'Width', 'ssc' ), 'selector' => '.button:hover'),
									array('property' => 'height', 'label' => esc_html__( 'Height', 'ssc' ), 'selector' => '.button:hover'),
									array('property' => 'box-shadow', 'label' => esc_html__( 'Box Shadow', 'ssc' ), 'selector' => '.button:hover'),
									array('property' => 'opacity', 'label' => esc_html__( 'Opacity', 'ssc' ), 'selector' => '.button:hover'),
									array('property' => 'margin', 'label' => esc_html__( 'Margin', 'ssc' ), 'selector' => '.button:hover'),
									array('property' => 'padding', 'label' => esc_html__( 'Padding', 'ssc' ), 'selector' => '.button:hover'),
									array('property' => 'border', 'label' => esc_html__( 'Border', 'ssc' ), 'selector' => '.button:hover'),
									array('property' => 'border-radius', 'label' => esc_html__( 'Border Radius', 'ssc' ), 'selector' => '.button:hover'),
									array('property' => 'text-align', 'label' => esc_html__( 'Text Align', 'ssc' ), 'selector' => '.button:hover'),
								),
								//Popup
								'Popup' => array(
									array('property' => 'display', 'label' => esc_html__( 'Close icon', 'ssc' ) . ' ' . esc_html__( 'Display', 'ssc' ), 'selector' => '.popup .popup-close:hover'),
									array('property' => 'text-align', 'label' => esc_html__( 'Close icon', 'ssc' ) . ' ' . esc_html__( 'Position', 'ssc' ), 'selector' => '.popup .popup-close-wrapper:hover'),
									array('property' => 'line-height', 'label' => esc_html__( 'Close icon', 'ssc' ) . ' ' . esc_html__( 'Line Height', 'ssc' ), 'selector' => '.popup .popup-close:hover'),
									array('property' => 'width', 'label' => esc_html__( 'Close icon', 'ssc' ) . ' ' . esc_html__( 'Width', 'ssc' ), 'selector' => '.popup .popup-close:hover svg'),
									array('property' => 'height', 'label' => esc_html__( 'Close icon', 'ssc' ) . ' ' . esc_html__( 'Height', 'ssc' ), 'selector' => '.popup .popup-close:hover svg'),
									array('property' => 'fill', 'label' => esc_html__( 'Close icon', 'ssc' ) . ' ' . esc_html__( 'Fill', 'ssc' ), 'selector' => '.popup .popup-close:hover svg'),
									array('property' => 'background', 'selector' => '.popup .popup-close:hover'),
									array('property' => 'box-shadow', 'label' => esc_html__( 'Close icon', 'ssc' ) . ' ' . esc_html__( 'Box Shadow', 'ssc' ), 'selector' => '.popup .popup-close:hover'),
									array('property' => 'opacity', 'label' => esc_html__( 'Close icon', 'ssc' ) . ' ' . esc_html__( 'Opacity', 'ssc' ), 'selector' => '.popup .popup-close:hover'),
									array('property' => 'margin', 'label' => esc_html__( 'Close icon', 'ssc' ) . ' ' . esc_html__( 'Margin', 'ssc' ), 'selector' => '.popup .popup-close:hover'),
									array('property' => 'padding', 'label' => esc_html__( 'Close icon', 'ssc' ) . ' ' . esc_html__( 'Padding', 'ssc' ), 'selector' => '.popup .popup-close:hover'),
									array('property' => 'border', 'label' => esc_html__( 'Close icon', 'ssc' ) . ' ' . esc_html__( 'Border', 'ssc' ), 'selector' => '.popup .popup-close:hover'),
									array('property' => 'border-radius', 'label' => esc_html__( 'Close icon', 'ssc' ) . ' ' . esc_html__( 'Border Radius', 'ssc' ), 'selector' => '.popup .popup-close:hover'),
									array('property' => 'display', 'label' =>  esc_html__( 'Display', 'ssc' ), 'selector' => '.popup:hover'),
									array('property' => 'width', 'label' =>  esc_html__( 'Width', 'ssc' ), 'selector' => '.popup:hover'),
									array('property' => 'height', 'label' =>  esc_html__( 'Height', 'ssc' ), 'selector' => '.popup:hover'),
									array('property' => 'background', 'selector' => '.popup:hover'),
									array('property' => 'text-align', 'label' =>  esc_html__( 'Text Align', 'ssc' ), 'selector' => '.popup:hover'),
									array('property' => 'margin', 'label' =>  esc_html__( 'Margin', 'ssc' ), 'selector' => '.popup:hover'),
									array('property' => 'padding', 'label' =>  esc_html__( 'Padding', 'ssc' ), 'selector' => '.popup:hover'),
									array('property' => 'border', 'label' =>  esc_html__( 'Border', 'ssc' ), 'selector' => '.popup:hover'),
									array('property' => 'border-radius', 'label' =>  esc_html__( 'Border Radius', 'ssc' ), 'selector' => '.popup:hover'),
									array('property' => 'box-shadow', 'label' =>  esc_html__( 'Box Shadow', 'ssc' ), 'selector' => '.popup:hover'),
									array('property' => 'opacity', 'label' =>  esc_html__( 'Opacity', 'ssc' ), 'selector' => '.popup:hover'),
									array('property' => 'z-index', 'label' =>  esc_html__( 'z-index', 'ssc' ), 'selector' => '.popup:hover'),
								),
								'Popup Title' => array(
									array('property' => 'color', 'label' =>  esc_html__( 'Color', 'ssc' ), 'selector' => '.popup:hover .title'),
									array('property' => 'font-size', 'label' =>  esc_html__( 'Font Size', 'ssc' ), 'selector' => '.popup:hover .title'),
									array('property' => 'font-weight', 'label' =>  esc_html__( 'Font Weight', 'ssc' ), 'selector' => '.popup:hover .title'),
									array('property' => 'font-style', 'label' =>  esc_html__( 'Font Style', 'ssc' ), 'selector' => '.popup:hover .title'),
									array('property' => 'font-family', 'label' =>  esc_html__( 'Font Family', 'ssc' ), 'selector' => '.popup:hover .title'),
									array('property' => 'text-align', 'label' =>  esc_html__( 'Text Align', 'ssc' ), 'selector' => '.popup:hover .title'),
									array('property' => 'text-shadow', 'label' =>  esc_html__( 'Text Shadow', 'ssc' ), 'selector' => '.popup:hover .title'),
									array('property' => 'text-transform', 'label' =>  esc_html__( 'Text Transform', 'ssc' ), 'selector' => '.popup:hover .title'),
									array('property' => 'text-decoration', 'label' =>  esc_html__( 'Text Decoration', 'ssc' ), 'selector' => '.popup:hover .title'),
									array('property' => 'line-height', 'label' =>  esc_html__( 'Line Height', 'ssc' ), 'selector' => '.popup:hover .title'),
									array('property' => 'letter-spacing', 'label' =>  esc_html__( 'Letter Spacing', 'ssc' ), 'selector' => '.popup:hover .title'),
									array('property' => 'overflow', 'label' =>  esc_html__( 'Overflow', 'ssc' ), 'selector' => '.popup:hover .title'),
									array('property' => 'word-break', 'label' =>  esc_html__( 'Word Break', 'ssc' ), 'selector' => '.popup:hover .title'),
									array('property' => 'background', 'selector' => '.popup:hover .title'),
									array('property' => 'margin', 'label' =>  esc_html__( 'Margin', 'ssc' ), 'selector' => '.popup:hover .title'),
									array('property' => 'padding', 'label' =>  esc_html__( 'Padding', 'ssc' ), 'selector' => '.popup:hover .title'),
									array('property' => 'border', 'label' =>  esc_html__( 'Border', 'ssc' ), 'selector' => '.popup:hover .title'),
									array('property' => 'width', 'label' =>  esc_html__( 'Width', 'ssc' ), 'selector' => '.popup:hover .title'),
									array('property' => 'height', 'label' =>  esc_html__( 'Height', 'ssc' ), 'selector' => '.popup:hover .title'),
									array('property' => 'border-radius', 'label' =>  esc_html__( 'Border Radius', 'ssc' ), 'selector' => '.popup:hover .title'),
									array('property' => 'float', 'label' =>  esc_html__( 'Float', 'ssc' ), 'selector' => '.popup:hover .title'),
									array('property' => 'display', 'label' =>  esc_html__( 'Display', 'ssc' ), 'selector' => '.popup:hover .title'),
									array('property' => 'box-shadow', 'label' =>  esc_html__( 'Box Shadow', 'ssc' ), 'selector' => '.popup:hover .title'),
									array('property' => 'opacity', 'label' =>  esc_html__( 'Opacity', 'ssc' ), 'selector' => '.popup:hover .title'),
								),
								'Popup Image Box' => array(
									array('property' => 'text-align', 'label' => esc_html__( 'Image Alignment', 'ssc' ), 'selector' => '.popup:hover .thumbnail'),
									array('property' => 'display', 'label' => esc_html__( 'Image Display', 'ssc' ), 'selector' => '.popup:hover .thumbnail'),
									array('property' => 'float', 'label' => esc_html__( 'Image Float', 'ssc' ), 'selector' => '.popup:hover .thumbnail'),
									array('property' => 'background', 'selector' => '.popup:hover .thumbnail'),
									array('property' => 'box-shadow', 'label' => esc_html__( 'Box Shadow', 'ssc' ), 'selector' => '.popup:hover .thumbnail'),
									array( 'property' => 'opacity', 'label'    => esc_html__( 'Opacity', 'ssc' ), 'selector' => '.popup:hover .thumbnail', ),
									array('property' => 'border', 'label' => esc_html__( 'Border', 'ssc' ), 'selector' => '.popup:hover .thumbnail'),
									array('property' => 'border-radius', 'label' => esc_html__( 'Border Radius', 'ssc' ), 'selector' => '.popup:hover .thumbnail'),
									array('property' => 'width', 'label' => esc_html__( 'Width', 'ssc' ), 'selector' => '.popup:hover .thumbnail'),
									array('property' => 'height', 'label' => esc_html__( 'Height', 'ssc' ), 'selector' => '.popup:hover .thumbnail'),
									array('property' => 'max-width', 'label' => esc_html__( 'Max Width', 'ssc' ), 'selector' => '.popup:hover .thumbnail'),
									array('property' => 'vertical-align', 'label' => esc_html__( 'Vertical Align', 'ssc' ), 'selector' => '.popup:hover .thumbnail'),
									array('property' => 'margin', 'label' => esc_html__( 'Margin', 'ssc' ), 'selector' => '.popup:hover .thumbnail'),
									array('property' => 'padding', 'label' => esc_html__( 'Padding', 'ssc' ), 'selector' => '.popup:hover .thumbnail')
								),
								'Popup Image' => array(
									array('property' => 'display', 'label' => esc_html__( 'Image Display', 'ssc' ), 'selector' => '.popup:hover .thumbnail img'),
									array('property' => 'float', 'label' => esc_html__( 'Image Float', 'ssc' ), 'selector' => '.popup:hover .thumbnail img'),
									array('property' => 'background-color', 'label' => esc_html__( 'Background Color', 'ssc' ), 'selector' => '.popup:hover .thumbnail img'),
									array('property' => 'box-shadow', 'label' => esc_html__( 'Box Shadow', 'ssc' ), 'selector' => '.popup:hover .thumbnail img'),
									array( 'property' => 'opacity', 'label'    => esc_html__( 'Opacity', 'ssc' ), 'selector' => '.popup:hover .thumbnail img', ),
									array('property' => 'border', 'label' => esc_html__( 'Border', 'ssc' ), 'selector' => '.popup:hover .thumbnail img'),
									array('property' => 'border-radius', 'label' => esc_html__( 'Border Radius', 'ssc' ), 'selector' => '.popup:hover .thumbnail img'),
									array('property' => 'width', 'label' => esc_html__( 'Width', 'ssc' ), 'selector' => '.popup:hover .thumbnail img'),
									array('property' => 'height', 'label' => esc_html__( 'Height', 'ssc' ), 'selector' => '.popup:hover .thumbnail img'),
									array('property' => 'max-width', 'label' => esc_html__( 'Max Width', 'ssc' ), 'selector' => '.popup:hover .thumbnail img'),
									array('property' => 'vertical-align', 'label' => esc_html__( 'Vertical Align', 'ssc' ), 'selector' => '.popup:hover .thumbnail img'),
									array('property' => 'margin', 'label' => esc_html__( 'Margin', 'ssc' ), 'selector' => '.popup:hover .thumbnail img'),
									array('property' => 'padding', 'label' => esc_html__( 'Padding', 'ssc' ), 'selector' => '.popup:hover .thumbnail img')
								),
								'Popup Subtitle' => array(
									array('property' => 'color', 'label' =>  esc_html__( 'Color', 'ssc' ), 'selector' => '.popup:hover .subtitle'),
									array('property' => 'font-size', 'label' =>  esc_html__( 'Font Size', 'ssc' ), 'selector' => '.popup:hover .subtitle'),
									array('property' => 'font-weight', 'label' =>  esc_html__( 'Font Weight', 'ssc' ), 'selector' => '.popup:hover .subtitle'),
									array('property' => 'font-style', 'label' =>  esc_html__( 'Font Style', 'ssc' ), 'selector' => '.popup:hover .subtitle'),
									array('property' => 'font-family', 'label' =>  esc_html__( 'Font Family', 'ssc' ), 'selector' => '.popup:hover .subtitle'),
									array('property' => 'text-align', 'label' =>  esc_html__( 'Text Align', 'ssc' ), 'selector' => '.popup:hover .subtitle'),
									array('property' => 'text-shadow', 'label' =>  esc_html__( 'Text Shadow', 'ssc' ), 'selector' => '.popup:hover .subtitle'),
									array('property' => 'text-transform', 'label' =>  esc_html__( 'Text Transform', 'ssc' ), 'selector' => '.popup:hover .subtitle'),
									array('property' => 'text-decoration', 'label' =>  esc_html__( 'Text Decoration', 'ssc' ), 'selector' => '.popup:hover .subtitle'),
									array('property' => 'line-height', 'label' =>  esc_html__( 'Line Height', 'ssc' ), 'selector' => '.popup:hover .subtitle'),
									array('property' => 'letter-spacing', 'label' =>  esc_html__( 'Letter Spacing', 'ssc' ), 'selector' => '.popup:hover .subtitle'),
									array('property' => 'overflow', 'label' =>  esc_html__( 'Overflow', 'ssc' ), 'selector' => '.popup:hover .subtitle'),
									array('property' => 'word-break', 'label' =>  esc_html__( 'Word Break', 'ssc' ), 'selector' => '.popup:hover .subtitle'),
									array('property' => 'background', 'selector' => '.popup:hover .subtitle'),
									array('property' => 'margin', 'label' =>  esc_html__( 'Margin', 'ssc' ), 'selector' => '.popup:hover .subtitle'),
									array('property' => 'padding', 'label' =>  esc_html__( 'Padding', 'ssc' ), 'selector' => '.popup:hover .subtitle'),
									array('property' => 'border', 'label' =>  esc_html__( 'Border', 'ssc' ), 'selector' => '.popup:hover .subtitle'),
									array('property' => 'width', 'label' =>  esc_html__( 'Width', 'ssc' ), 'selector' => '.popup:hover .subtitle'),
									array('property' => 'height', 'label' =>  esc_html__( 'Height', 'ssc' ), 'selector' => '.popup:hover .subtitle'),
									array('property' => 'border-radius', 'label' =>  esc_html__( 'Border Radius', 'ssc' ), 'selector' => '.popup:hover .subtitle'),
									array('property' => 'float', 'label' =>  esc_html__( 'Float', 'ssc' ), 'selector' => '.popup:hover .subtitle'),
									array('property' => 'display', 'label' =>  esc_html__( 'Display', 'ssc' ), 'selector' => '.popup:hover .subtitle'),
									array('property' => 'box-shadow', 'label' =>  esc_html__( 'Box Shadow', 'ssc' ), 'selector' => '.popup:hover .subtitle'),
									array('property' => 'opacity', 'label' =>  esc_html__( 'Opacity', 'ssc' ), 'selector' => '.popup:hover .subtitle'),
								),
								'Popup Description' => array(
									array('property' => 'color', 'label' =>  esc_html__( 'Color', 'ssc' ), 'selector' => '.popup:hover .description'),
									array('property' => 'font-size', 'label' =>  esc_html__( 'Font Size', 'ssc' ), 'selector' => '.popup:hover .description'),
									array('property' => 'font-weight', 'label' =>  esc_html__( 'Font Weight', 'ssc' ), 'selector' => '.popup:hover .description'),
									array('property' => 'font-style', 'label' =>  esc_html__( 'Font Style', 'ssc' ), 'selector' => '.popup:hover .description'),
									array('property' => 'font-family', 'label' =>  esc_html__( 'Font Family', 'ssc' ), 'selector' => '.popup:hover .description'),
									array('property' => 'text-align', 'label' =>  esc_html__( 'Text Align', 'ssc' ), 'selector' => '.popup:hover .description'),
									array('property' => 'text-shadow', 'label' =>  esc_html__( 'Text Shadow', 'ssc' ), 'selector' => '.popup:hover .description'),
									array('property' => 'text-transform', 'label' =>  esc_html__( 'Text Transform', 'ssc' ), 'selector' => '.popup:hover .description'),
									array('property' => 'text-decoration', 'label' =>  esc_html__( 'Text Decoration', 'ssc' ), 'selector' => '.popup:hover .description'),
									array('property' => 'line-height', 'label' =>  esc_html__( 'Line Height', 'ssc' ), 'selector' => '.popup:hover .description'),
									array('property' => 'letter-spacing', 'label' =>  esc_html__( 'Letter Spacing', 'ssc' ), 'selector' => '.popup:hover .description'),
									array('property' => 'overflow', 'label' =>  esc_html__( 'Overflow', 'ssc' ), 'selector' => '.popup:hover .description'),
									array('property' => 'word-break', 'label' =>  esc_html__( 'Word Break', 'ssc' ), 'selector' => '.popup:hover .description'),
									array('property' => 'background', 'selector' => '.popup:hover .description'),
									array('property' => 'margin', 'label' =>  esc_html__( 'Margin', 'ssc' ), 'selector' => '.popup:hover .description'),
									array('property' => 'padding', 'label' =>  esc_html__( 'Padding', 'ssc' ), 'selector' => '.popup:hover .description'),
									array('property' => 'border', 'label' =>  esc_html__( 'Border', 'ssc' ), 'selector' => '.popup:hover .description'),
									array('property' => 'width', 'label' =>  esc_html__( 'Width', 'ssc' ), 'selector' => '.popup:hover .description'),
									array('property' => 'height', 'label' =>  esc_html__( 'Height', 'ssc' ), 'selector' => '.popup:hover .description'),
									array('property' => 'border-radius', 'label' =>  esc_html__( 'Border Radius', 'ssc' ), 'selector' => '.popup:hover .description'),
									array('property' => 'float', 'label' =>  esc_html__( 'Float', 'ssc' ), 'selector' => '.popup:hover .description'),
									array('property' => 'display', 'label' =>  esc_html__( 'Display', 'ssc' ), 'selector' => '.popup:hover .description'),
									array('property' => 'box-shadow', 'label' =>  esc_html__( 'Box Shadow', 'ssc' ), 'selector' => '.popup:hover .description'),
									array('property' => 'opacity', 'label' =>  esc_html__( 'Opacity', 'ssc' ), 'selector' => '.popup:hover .description'),
								),
							),

						)
					)
				),
//				esc_html__( 'styling', 'ssc' )  => array(
//					array()
//				),
//				'hover'  => array(),
//				'animate' => array(),
			),
		),
	) );
}

// Register Shortcode

function ssc_hotspot_shortcode( $atts, $content = null ) {
	$output = $popup_html = $points_html = $popup_html = '';
	extract( shortcode_atts( array(
		'image'             => '',
		'image_size'        => '',
		'custom_image_size' => '',
		'alt'               => esc_html__( 'Hottspot background image', 'ssc' ),
		'show_on'           => 'click',
		'points'            => array(),
		'el_class' => '',

	),
		$atts ) );

	try {
		if ( is_numeric( $image ) ) {

			if ( '' !== $image_size && 'custom_size' !== $image_size ) {
				$image = image_downsize( $image, $image_size );
			} else if ( 'custom_size' == $image_size && '' !== $custom_image_size ) {
				$size  = ssc_get_img_sizes_array_from_string( $custom_image_size );
				$image = image_downsize( $image, $size );
			} else {
				$image = image_downsize( $image, 'full' );
			}

			if ( empty( $image[0] ) ) {
				throw new Exception( __( 'No image uploaded', 'ssc' ) );
			}

			$width  = empty( $image[1] ) ? '' : 'width="' . $image[1] . '"';
			$height = empty( $image[2] ) ? '' : 'height="' . $image[2] . '"';

			$wrp_classes = apply_filters( 'kc-el-class', $atts );

			/*---------------------------
			Output
			----------------------------*/
			$output .= '<div class="ssc-hotspot ' . implode( ' ', $wrp_classes ) . ' ' . $el_class . '" data-ssc-hotspot-action="' . $show_on . '">';
			$output .= '<div class="hotspot-container" >';
			$output .= '<img class="background-image" src="' . $image[0] . '" alt="' . $alt . '" ' . $width . ' ' . $height . '>';
//var_dump($atts);
			foreach ( $points as $i => $point ) {
				if ( empty( $point->icon_type ) ) {
					continue;
				}
				$top         = empty( $point->top ) ? '' : 'top:' . $point->top . ';';
				$right       = empty( $point->right ) ? '' : 'right:' . $point->right . ';';
				$bottom      = empty( $point->bottom ) ? '' : 'bottom:' . $point->bottom . ';';
				$left         = empty( $point->left ) ? '' : 'left:' . $point->left . ';';
				$points_html .= '<div class="button button-' . $i . '" style="' . $top . $right . $bottom . $left . '" data-ssc-hotspot-popup="' . $i . '">';
//				$points_html = '<div class="button button-' . $i . '">';
				switch ( $point->icon_type ) {
					case 'svg':
						if ( !empty( $point->svg ) ) {
							$points_html .= ssc_process_svg( $point->svg );
						}
						break;
					case 'icon':
						if ( !empty( $point->icon ) ) {
							$points_html .= '<i class="' . $point->icon . '"></i>';
						}
						break;
					case 'img':
						if ( !empty( $point->img ) ) {
							$img_size = empty( $point->img_size ) ? '' : $point->img_size ;
							if ( '' !== $img_size && 'custom_size' !== $img_size ) {
								$img = image_downsize( $point->img, $img_size );
							} else if ( 'custom_size' == $img_size && ! empty( $point->custom_img_size ) ) {
								$size  = ssc_get_img_sizes_array_from_string( $point->custom_img_size );
								$img = image_downsize( $point->img, $size );
							} else {
								$img = image_downsize( $point->img, 'full' );
							}

							if ( empty( $img[0] ) ) {
								break;
							}

							$width  = empty( $img[1] ) ? '' : 'width="' . $img[1] . '"';
							$height = empty( $img[2] ) ? '' : 'height="' . $img[2] . '"';
							$points_html .= '<img src="' . $img[0] . '" alt="' . esc_html__( 'Point', 'ssc' ) . '-' . $i . '" ' . $width . ' ' . $height . '>';
						}
						break;
				}
				$points_html .= '</div>';
				$hotspot_popup_style = (object)array();
				if( empty( $point->popup_top ) ) {
					$hotspot_popup_style->top = $point->top;
				} else {
					$hotspot_popup_style->top = $point->popup_top;
				}
				if( empty( $point->popup_right ) ) {
					$hotspot_popup_style->right = $point->right;
				} else {
					$hotspot_popup_style->right = $point->popup_right;
				}
				if( empty( $point->popup_bottom ) ) {
					$hotspot_popup_style->bottom = $point->bottom;
				} else {
					$hotspot_popup_style->bottom = $point->popup_bottom;
				}
				if( empty( $point->popup_left ) ) {
					$hotspot_popup_style->left = $point->left;
				} else {
					$hotspot_popup_style->left = $point->popup_left;
				}
//				$top         = empty( $point->popup_top ) ? '' : 'top:' . $point->popup_top . ';';
//				$right       = empty( $point->popup_right ) ? '' : 'right:' . $point->popup_right . ';';
//				$bottom      = empty( $point->popup_bottom ) ? '' : 'bottom:' . $point->popup_bottom . ';';
//				$left         = empty( $point->popup_left ) ? '' : 'left:' . $point->popup_left . ';';

				$hotspot_popup_style = json_encode( $hotspot_popup_style, JSON_FORCE_OBJECT  );

				$popup_html .= '<div class="popup popup-' . $i . '" data-ssc-hotspot-popup-style=\'' . $hotspot_popup_style . '\'>';
				if ( 'click' == $show_on ) {
					$popup_html .=
					'<div aria-hidden="true" class="popup-close-wrapper">
						<span class="popup-close">
							<svg width="184" height="184" viewBox="0 0 184 184" fill="white" xmlns="http://www.w3.org/2000/svg">
							<rect x="169.782" y="0.0761108" width="20" height="240" transform="rotate(45 169.782 0.0761108)"></rect>
							<rect x="0.0761108" y="14.2183" width="20" height="240" transform="rotate(-45 0.0761108 14.2183)"></rect>
						</svg>
						</span>
					</div>';
				}

				$title = empty( $point->title ) ? '' : '<div class="title">' . $point->title . '</div>';
				$subtitle = empty( $point->subtitle ) ? '' : '<div class="subtitle">' . $point->subtitle . '</div>';
				$description = empty( $point->description ) ? '' : '<div class="description">' . $point->description . '</div>';
				$img = '';
				if ( !empty( $point->popup_img ) ) {
					$popup_img_size = empty( $point->popup_img_size ) ? '' : $point->popup_img_size ;
					if ( '' !== $popup_img_size && 'custom_size' !== $popup_img_size ) {
						$img = image_downsize( $point->popup_img, $popup_img_size );
					} else if ( 'custom_size' == $popup_img_size && ! empty( $point->popup_custom_img_size ) ) {
						$size  = ssc_get_img_sizes_array_from_string( $point->popup_custom_img_size );
						$img = image_downsize( $point->popup_img, $size );
					} else {
						$img = image_downsize( $point->popup_img, 'full' );
					}

					if ( ! empty( $img[0] ) ) {
						$width  = empty( $img[1] ) ? '' : 'width ="' . $img[1] . '"';
						$height = empty( $img[2] ) ? '' : 'height ="' . $img[2] . '"';
						$img_title = empty( $point->title ) ? esc_html__( 'Popup image', 'ssc' ) : $point->title;
						$img = '<div class="thumbnail">
							<img src="' . $img[0] . '" alt="' . $img_title . '" ' . $width . ' ' . $height . '>
						</div>';
					}
				}

				$popup_html .= $title . $img . $subtitle . $description;

				$popup_html .= '</div>';
			}

			$output .= $points_html . $popup_html;

			$output .= '</div>';
			$output .= '</div>';

			return $output;

		} else {
			throw new Exception( __( 'No image uploaded', 'ssc' ) );
		}
	} catch ( Exception $e ) {
		return '<div class="kc-carousel_images align-center" style="border:1px dashed #ccc;"><br /><h3>' . esc_html( $e->getMessage() ) . '</h3></div>';
	}
}

add_shortcode( 'ssc_hotspot', 'ssc_hotspot_shortcode' );