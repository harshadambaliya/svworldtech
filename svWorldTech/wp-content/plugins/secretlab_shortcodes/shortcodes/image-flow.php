<?php
add_action( 'init', 'ssc_image_flow_params', 99 );

/**
 * Additional functions
 */
function ssc_image_flow_get_sliders_array() {

}

/**
 * Additional functions
 */


function ssc_image_flow_params() {
	global $kc;

	$kc->add_map( array(
		'ssc_image_flow' => array(
			'name'             => __( 'Image Flow', 'ssc' ),
			'description'      => __( 'Animation with images faded one by one. Up to 10 images', 'ssc' ),
			'icon'             => 'ssc-icon-25',
			'category'         => 'SecretLab',
			'preview_editable' => true,
			'params'           => array(
				'general'                      => array(
					array(
						'name'    => 'template',
						'label'   => esc_html__( 'Select Template', 'ssc' ),
						'type'    => 'radio_image',  // USAGE TEXT TYPE
						'options' => array(
							'1' => plugin_dir_url( __FILE__ ) . '../images/img1.gif',

						),
						'value'   => '1', // remove this if you do not need a default content
					),
					array(
						'type'        => 'group',
						'label'       => __( ' Images', 'ssc' ),
						'name'        => 'icons',
						'description' => __( 'Repeat this fields with each item created, Each item corresponding an image element.',
							'ssc' ),
						'options'     => array( 'add_text' => __( ' Add new image', 'ssc' ) ),

						'value'  => base64_encode( json_encode( array(
							"1" => array(
								"image"           => "",
								"img_size"        => "",
								"custom_img_size" => "",
								"monocolored"     => "no",
								"strength"        => "",
								"hover_effect"    => "",
								"on_click_action" => "",
								"custom_link"     => "",
								"title"           => "",
								"show_icon"       => "no",
								"icon"            => "",
							),


						) ) ),
						'params' => array(
							array(
								'type'        => 'attach_image',
								'label'       => esc_html__( 'Image', 'ssc' ),
								'name'        => 'image',
								'description' => esc_html__( 'Select an image from media library.', 'ssc' ),
								'admin_label' => true,
							),
							array(
								'type'        => 'dropdown',
								'label'       => esc_html__( 'Image size', 'ssc' ),
								'name'        => 'img_size',
								'description' => esc_html__( 'Set the image size.', 'ssc' ),
								'options'     => ssc_get_image_sizes(),
							),
							array(
								'type'        => 'text',
								'label'       => esc_html__( 'Custom Image size', 'ssc' ),
								'name'        => 'custom_img_size',
								'description' => esc_html__( 'Set the image size: "thumbnail", "medium", "large", "full" or "400x200".',
									'ssc' ),
								'relation'    => array(
									'parent'    => 'img_size',
									'show_when' => 'custom_size',
								),
							),
							array(
								'name'        => 'monocolored',
								'label'       => __( ' Grayscale Effect', 'ssc' ),
								'type'        => 'toggle',
								'description' => __( ' Enable a grayscale effect for images. Images become colorful on hover.',
									'ssc' ),
							),
							array(
								'name'        => 'strength',
								'label'       => esc_html__( 'Grayscale strength', 'ssc' ),
								'type'        => 'number_slider',
								'value'       => '0',
								'options'     => array(
									'min'        => 0,
									'max'        => 100,
									'unit'       => '%',
									'show_input' => true,
								),
								'relation'    => array(
									'parent'    => 'monocolored',
									'show_when' => 'yes',
								),
								'description' => '0-100%',
							),
							array(
								'name'        => 'hover_effect',
								'type'        => 'dropdown',
								'label'       => esc_html__( 'Hover Effect', 'ssc' ),
								'options'     => array(
									'none'       => esc_html__( 'None', 'ssc' ),
									'blur'       => esc_html__( 'Blur on hover', 'ssc' ),
									'noblur'     => esc_html__( 'Blur on normal', 'ssc' ),
									'scaleup'    => esc_html__( 'Scale Up', 'ssc' ),
									'scaleupall' => esc_html__( 'Scale Up Whole Element', 'ssc' ),
									'flip'       => esc_html__( 'Flip', 'ssc' ),
									'rotate'     => esc_html__( 'Rotate', 'ssc' ),
								),
								'description' => esc_html__( 'Select the click event when users click on an image.',
									'ssc' ),
							),
							array(
								'type'        => 'dropdown',
								'label'       => esc_html__( 'Onclick event', 'ssc' ),
								'name'        => 'on_click_action',
								'options'     => array(
									'none'             => esc_html__( 'None', 'ssc' ),
									'lightbox'         => esc_html__( 'Open on lightbox', 'ssc' ),
									'open_custom_link' => esc_html__( 'Open custom links', 'ssc' ),
								),
								'description' => esc_html__( 'Select the click event when users click on an image.',
									'ssc' ),
							),
							array(
								'name'        => 'custom_link',
								'label'       => __( ' Custom Link', 'ssc' ),
								'type'        => 'link',
								'value'       => '#',
								'relation'    => array(
									'parent'    => 'on_click_action',
									'show_when' => 'open_custom_link',
								),
								'description' => __( ' The URL which image/title assigned to. You can select page/post or other post type',
									'ssc' ),
							),

							array(
								'type'        => 'text',
								'label'       => __( 'Title', 'ssc' ),
								'name'        => 'title',
								'description' => __( 'Enter text used as title over the image.', 'ssc' ),
								'admin_label' => true,
							),
							array(
								'name'        => 'show_icon',
								'label'       => __( 'Display icon?', 'ssc' ),
								'type'        => 'toggle',
								'description' => __( ' Enable to add icon to the overlay.', 'ssc' ),
							),
							array(
								'name'        => 'icon',
								'label'       => __( ' Icon on Overlay', 'ssc' ),
								'type'        => 'icon_picker',
								'value'       => '',
								'relation'    => array(
									'parent'    => 'show_icon',
									'show_when' => 'yes',
								),
								'description' => __( ' The icon show on overlay layer.', 'ssc' ),
							),


						),
					),

					/////


					//////
					array(
						'name'        => 'ieclass',
						'label'       => __( ' Image extra class', 'ssc' ),
						'type'        => 'text',
						'description' => __( ' Add class name for img tag.', 'ssc' ),
					),
					array(
						'name'        => 'class',
						'label'       => __( ' Wrapper extra class', 'ssc' ),
						'type'        => 'text',
						'description' => __( ' If you wish to style a particular content element differently, please add a class name to this field and refer to it in your custom CSS file.',
							'ssc' ),
					),
				),
				esc_html__( 'styling', 'ssc' ) => array(
					array(
						'label'   => esc_html__( 'CSS', 'ssc' ),
						'name'    => 'css_custom',
						'type'    => 'css',
						'value'   => '',
						'options' => array(
							array(
								"screens"    => "any,1024,999,767,479",
								'Box'        => array(
									array( 'property' => 'text-align', 'label' => esc_html__( 'Text Align', 'ssc' ) ),
									array(
										'property' => 'vertical-align',
										'label'    => esc_html__( 'Vertical Align', 'ssc' ),
									),
									array( 'property' => 'background' ),
									array( 'property' => 'display', 'label' => esc_html__( 'Display', 'ssc' ) ),
									array( 'property' => 'float', 'label' => esc_html__( 'Float', 'ssc' ) ),
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
								'Images'     => array(
									array(
										'property' => 'text-align',
										'label'    => esc_html__( 'Image Alignment', 'ssc' ),
										'selector' => ' img',
									),
									array(
										'property' => 'background-color',
										'label'    => esc_html__( 'Background Color', 'ssc' ),
										'selector' => ' img',
									),
									array(
										'property' => 'background-color',
										'label'    => esc_html__( 'Background Color', 'ssc' ) . esc_html__( ' Hover',
												'ssc' ),
										'selector' => ' img:hover',
									),
									array(
										'property' => 'box-shadow',
										'label'    => esc_html__( 'Box Shadow', 'ssc' ),
										'selector' => ' img',
									),
									array(
										'property' => 'box-shadow',
										'label'    => esc_html__( 'Box Shadow', 'ssc' ) . esc_html__( ' Hover',
												'ssc' ),
										'selector' => 'img:hover',
									),
									array(
										'property' => 'border',
										'label'    => esc_html__( 'Border', 'ssc' ),
										'selector' => ' img',
									),
									array(
										'property' => 'border',
										'label'    => esc_html__( 'Border', 'ssc' ) . esc_html__( ' Hover', 'ssc' ),
										'selector' => ' img:hover',
									),
									array(
										'property' => 'border-radius',
										'label'    => esc_html__( 'Border Radius', 'ssc' ),
										'selector' => ' img',
									),
									array(
										'property' => 'border-radius',
										'label'    => esc_html__( 'Border Radius', 'ssc' ) . esc_html__( ' Hover',
												'ssc' ),
										'selector' => ' img:hover',
									),
									array(
										'property' => 'width',
										'label'    => esc_html__( 'Width', 'ssc' ),
										'selector' => ' img',
									),
									array(
										'property' => 'height',
										'label'    => esc_html__( 'Height', 'ssc' ),
										'selector' => ' img',
									),
									array(
										'property' => 'max-width',
										'label'    => esc_html__( 'Max Width', 'ssc' ),
										'selector' => ' img',
									),
									array(
										'property' => 'margin',
										'label'    => esc_html__( 'Margin', 'ssc' ),
										'selector' => ' img',
									),
									array(
										'property' => 'padding',
										'label'    => esc_html__( 'Padding', 'ssc' ),
										'selector' => ' img',
									),
									array(
										'property' => 'padding',
										'label'    => esc_html__( 'Padding', 'ssc' ) . esc_html__( ' Hover', 'ssc' ),
										'selector' => ' img:hover',
									),
								),
								'Typography' => array(
									array(
										'property' => 'color',
										'label'    => esc_html__( 'Color', 'ssc' ),
										'selector' => '',
									),
									array(
										'property' => 'background-color',
										'label'    => esc_html__( 'Background Color', 'ssc' ),
										'selector' => '',
									),
									array(
										'property' => 'font-size',
										'label'    => esc_html__( 'Font Size', 'ssc' ),
										'selector' => '',
									),
									array(
										'property' => 'line-height',
										'label'    => esc_html__( 'Line Height', 'ssc' ),
										'selector' => '',
									),
									array(
										'property' => 'font-weight',
										'label'    => esc_html__( 'Font Weight', 'ssc' ),
										'selector' => '',
									),
									array(
										'property' => 'font-family',
										'label'    => esc_html__( 'Font Family', 'ssc' ),
										'selector' => '',
									),
									array(
										'property' => 'text-transform',
										'label'    => esc_html__( 'Text Transform', 'ssc' ),
										'selector' => '',
									),
									array(
										'property' => 'text-decoration',
										'label'    => esc_html__( 'Text Decoration', 'ssc' ),
										'selector' => '',
									),
									array(
										'property' => 'font-style',
										'label'    => esc_html__( 'Font Style', 'ssc' ),
										'selector' => '',
									),
									array(
										'property' => 'text-align',
										'label'    => esc_html__( 'Text Align', 'ssc' ),
										'selector' => '',
									),
									array(
										'property' => 'text-shadow',
										'label'    => esc_html__( 'Text Shadow', 'ssc' ),
										'selector' => '',
									),
									array(
										'property' => 'letter-spacing',
										'label'    => esc_html__( 'Letter Spacing', 'ssc' ),
										'selector' => '',
									),
									array(
										'property' => 'word-break',
										'label'    => esc_html__( 'Word Break', 'ssc' ),
										'selector' => '',
									),
									array(
										'property' => 'border',
										'label'    => esc_html__( 'Border', 'ssc' ),
										'selector' => '',
									),
									array(
										'property' => 'margin',
										'label'    => esc_html__( 'Margin', 'ssc' ),
										'selector' => '',
									),
									array(
										'property' => 'padding',
										'label'    => esc_html__( 'Padding', 'ssc' ),
										'selector' => '',
									),
								),
								'Icons'      => array(
									array(
										'property' => 'color',
										'label'    => esc_html__( 'Color', 'ssc' ),
										'selector' => 'i',
									),
									array(
										'property' => 'color',
										'label'    => esc_html__( 'Color', 'ssc' ) . esc_html__( ' Hover', 'ssc' ),
										'selector' => 'i:hover',
									),
									array(
										'property' => 'font-size',
										'label'    => esc_html__( 'Font Size', 'ssc' ),
										'selector' => 'i',
									),
									array(
										'property' => 'font-size',
										'label'    => esc_html__( 'Font Size', 'ssc' ) . esc_html__( ' Hover',
												'ssc' ),
										'selector' => 'i:hover',
									),
									array(
										'property' => 'line-height',
										'label'    => esc_html__( 'Line Height', 'ssc' ),
										'selector' => 'i',
									),
									array( 'property' => 'background', 'selector' => 'i' ),
									array( 'property' => 'background', 'selector' => 'i:hover' ),
									array(
										'property' => 'width',
										'label'    => esc_html__( 'Width', 'ssc' ),
										'selector' => 'i',
									),
									array(
										'property' => 'height',
										'label'    => esc_html__( 'Height', 'ssc' ),
										'selector' => 'i',
									),
									array(
										'property' => 'box-shadow',
										'label'    => esc_html__( 'Box Shadow', 'ssc' ),
										'selector' => 'i',
									),
									array(
										'property' => 'opacity',
										'label'    => esc_html__( 'Opacity', 'ssc' ),
										'selector' => 'i',
									),
									array(
										'property' => 'margin',
										'label'    => esc_html__( 'Margin', 'ssc' ),
										'selector' => 'i',
									),
									array(
										'property' => 'padding',
										'label'    => esc_html__( 'Padding', 'ssc' ),
										'selector' => 'i',
									),
									array(
										'property' => 'border',
										'label'    => esc_html__( 'Border', 'ssc' ),
										'selector' => 'i',
									),
									array(
										'property' => 'border-radius',
										'label'    => esc_html__( 'Border Radius', 'ssc' ),
										'selector' => 'i',
									),
									array(
										'property' => 'display',
										'label'    => esc_html__( 'Display', 'ssc' ),
										'selector' => 'i',
									),
									array(
										'property' => 'float',
										'label'    => esc_html__( 'Float', 'ssc' ),
										'selector' => 'i',
									),
								),
								'Img 1'      => array(
									array(
										'property' => 'text-align',
										'label'    => esc_html__( 'Image Alignment', 'ssc' ),
										'selector' => '.img1 img',
									),
									array(
										'property' => 'background-color',
										'label'    => esc_html__( 'Background Color', 'ssc' ),
										'selector' => '.img1 img',
									),
									array(
										'property' => 'box-shadow',
										'label'    => esc_html__( 'Box Shadow', 'ssc' ),
										'selector' => '.img1 img',
									),
									array(
										'property' => 'box-shadow',
										'label'    => esc_html__( 'Box Shadow', 'ssc' ) . esc_html__( ' Hover',
												'ssc' ),
										'selector' => 'img:hover',
									),
									array(
										'property' => 'border',
										'label'    => esc_html__( 'Border', 'ssc' ),
										'selector' => '.img1 img',
									),
									array(
										'property' => 'border-radius',
										'label'    => esc_html__( 'Border Radius', 'ssc' ),
										'selector' => '.img1 img',
									),
									array(
										'property' => 'width',
										'label'    => esc_html__( 'Width', 'ssc' ),
										'selector' => '.img1 img',
									),
									array(
										'property' => 'height',
										'label'    => esc_html__( 'Height', 'ssc' ),
										'selector' => '.img1 img',
									),
									array(
										'property' => 'max-width',
										'label'    => esc_html__( 'Max Width', 'ssc' ),
										'selector' => '.img1 img',
									),
									array(
										'property' => 'margin',
										'label'    => esc_html__( 'Margin', 'ssc' ),
										'selector' => '.img1 img',
									),
									array(
										'property' => 'padding',
										'label'    => esc_html__( 'Padding', 'ssc' ),
										'selector' => '.img1 img',
									),
									array( 'property' => 'display', 'label' => esc_html__( 'Display', 'ssc' ), 'selector' => '.img1 img' ),
								),
								'Img 2'      => array(
									array(
										'property' => 'text-align',
										'label'    => esc_html__( 'Image Alignment', 'ssc' ),
										'selector' => '.img2 img',
									),
									array(
										'property' => 'background-color',
										'label'    => esc_html__( 'Background Color', 'ssc' ),
										'selector' => '.img2 img',
									),
									array(
										'property' => 'box-shadow',
										'label'    => esc_html__( 'Box Shadow', 'ssc' ),
										'selector' => '.img2 img',
									),
									array(
										'property' => 'box-shadow',
										'label'    => esc_html__( 'Box Shadow', 'ssc' ) . esc_html__( ' Hover',
												'ssc' ),
										'selector' => 'img:hover',
									),
									array(
										'property' => 'border',
										'label'    => esc_html__( 'Border', 'ssc' ),
										'selector' => '.img2 img',
									),
									array(
										'property' => 'border-radius',
										'label'    => esc_html__( 'Border Radius', 'ssc' ),
										'selector' => '.img2 img',
									),
									array(
										'property' => 'width',
										'label'    => esc_html__( 'Width', 'ssc' ),
										'selector' => '.img2 img',
									),
									array(
										'property' => 'height',
										'label'    => esc_html__( 'Height', 'ssc' ),
										'selector' => '.img2 img',
									),
									array(
										'property' => 'max-width',
										'label'    => esc_html__( 'Max Width', 'ssc' ),
										'selector' => '.img2 img',
									),
									array(
										'property' => 'margin',
										'label'    => esc_html__( 'Margin', 'ssc' ),
										'selector' => '.img2 img',
									),
									array(
										'property' => 'padding',
										'label'    => esc_html__( 'Padding', 'ssc' ),
										'selector' => '.img2 img',
									),
									array( 'property' => 'display', 'label' => esc_html__( 'Display', 'ssc' ), 'selector' => '.img2 img' ),
								),
								'Img 3'      => array(
									array(
										'property' => 'text-align',
										'label'    => esc_html__( 'Image Alignment', 'ssc' ),
										'selector' => '.img3 img',
									),
									array(
										'property' => 'background-color',
										'label'    => esc_html__( 'Background Color', 'ssc' ),
										'selector' => '.img3 img',
									),
									array(
										'property' => 'box-shadow',
										'label'    => esc_html__( 'Box Shadow', 'ssc' ),
										'selector' => '.img3 img',
									),
									array(
										'property' => 'box-shadow',
										'label'    => esc_html__( 'Box Shadow', 'ssc' ) . esc_html__( ' Hover',
												'ssc' ),
										'selector' => 'img:hover',
									),
									array(
										'property' => 'border',
										'label'    => esc_html__( 'Border', 'ssc' ),
										'selector' => '.img3 img',
									),
									array(
										'property' => 'border-radius',
										'label'    => esc_html__( 'Border Radius', 'ssc' ),
										'selector' => '.img3 img',
									),
									array(
										'property' => 'width',
										'label'    => esc_html__( 'Width', 'ssc' ),
										'selector' => '.img3 img',
									),
									array(
										'property' => 'height',
										'label'    => esc_html__( 'Height', 'ssc' ),
										'selector' => '.img3 img',
									),
									array(
										'property' => 'max-width',
										'label'    => esc_html__( 'Max Width', 'ssc' ),
										'selector' => '.img3 img',
									),
									array(
										'property' => 'margin',
										'label'    => esc_html__( 'Margin', 'ssc' ),
										'selector' => '.img3 img',
									),
									array(
										'property' => 'padding',
										'label'    => esc_html__( 'Padding', 'ssc' ),
										'selector' => '.img3 img',
									),
									array( 'property' => 'display', 'label' => esc_html__( 'Display', 'ssc' ), 'selector' => '.img3 img' ),
								),
								'Img 4'      => array(
									array(
										'property' => 'text-align',
										'label'    => esc_html__( 'Image Alignment', 'ssc' ),
										'selector' => '.img4 img',
									),
									array(
										'property' => 'background-color',
										'label'    => esc_html__( 'Background Color', 'ssc' ),
										'selector' => '.img4 img',
									),
									array(
										'property' => 'box-shadow',
										'label'    => esc_html__( 'Box Shadow', 'ssc' ),
										'selector' => '.img4 img',
									),
									array(
										'property' => 'box-shadow',
										'label'    => esc_html__( 'Box Shadow', 'ssc' ) . esc_html__( ' Hover',
												'ssc' ),
										'selector' => 'img:hover',
									),
									array(
										'property' => 'border',
										'label'    => esc_html__( 'Border', 'ssc' ),
										'selector' => '.img4 img',
									),
									array(
										'property' => 'border-radius',
										'label'    => esc_html__( 'Border Radius', 'ssc' ),
										'selector' => '.img4 img',
									),
									array(
										'property' => 'width',
										'label'    => esc_html__( 'Width', 'ssc' ),
										'selector' => '.img4 img',
									),
									array(
										'property' => 'height',
										'label'    => esc_html__( 'Height', 'ssc' ),
										'selector' => '.img4 img',
									),
									array(
										'property' => 'max-width',
										'label'    => esc_html__( 'Max Width', 'ssc' ),
										'selector' => '.img4 img',
									),
									array(
										'property' => 'margin',
										'label'    => esc_html__( 'Margin', 'ssc' ),
										'selector' => '.img4 img',
									),
									array(
										'property' => 'padding',
										'label'    => esc_html__( 'Padding', 'ssc' ),
										'selector' => '.img4 img',
									),
									array( 'property' => 'display', 'label' => esc_html__( 'Display', 'ssc' ), 'selector' => '.img4 img' ),
								),
								'Img 5'      => array(
									array(
										'property' => 'text-align',
										'label'    => esc_html__( 'Image Alignment', 'ssc' ),
										'selector' => '.img5 img',
									),
									array(
										'property' => 'background-color',
										'label'    => esc_html__( 'Background Color', 'ssc' ),
										'selector' => '.img5 img',
									),
									array(
										'property' => 'box-shadow',
										'label'    => esc_html__( 'Box Shadow', 'ssc' ),
										'selector' => '.img5 img',
									),
									array(
										'property' => 'box-shadow',
										'label'    => esc_html__( 'Box Shadow', 'ssc' ) . esc_html__( ' Hover',
												'ssc' ),
										'selector' => 'img:hover',
									),
									array(
										'property' => 'border',
										'label'    => esc_html__( 'Border', 'ssc' ),
										'selector' => '.img5 img',
									),
									array(
										'property' => 'border-radius',
										'label'    => esc_html__( 'Border Radius', 'ssc' ),
										'selector' => '.img5 img',
									),
									array(
										'property' => 'width',
										'label'    => esc_html__( 'Width', 'ssc' ),
										'selector' => '.img5 img',
									),
									array(
										'property' => 'height',
										'label'    => esc_html__( 'Height', 'ssc' ),
										'selector' => '.img5 img',
									),
									array(
										'property' => 'max-width',
										'label'    => esc_html__( 'Max Width', 'ssc' ),
										'selector' => '.img5 img',
									),
									array(
										'property' => 'margin',
										'label'    => esc_html__( 'Margin', 'ssc' ),
										'selector' => '.img5 img',
									),
									array(
										'property' => 'padding',
										'label'    => esc_html__( 'Padding', 'ssc' ),
										'selector' => '.img5 img',
									),
									array( 'property' => 'display', 'label' => esc_html__( 'Display', 'ssc' ), 'selector' => '.img5 img' ),
								),

								'Img 6'      => array(
									array(
										'property' => 'text-align',
										'label'    => esc_html__( 'Image Alignment', 'ssc' ),
										'selector' => '.img6 img',
									),
									array(
										'property' => 'background-color',
										'label'    => esc_html__( 'Background Color', 'ssc' ),
										'selector' => '.img6 img',
									),
									array(
										'property' => 'box-shadow',
										'label'    => esc_html__( 'Box Shadow', 'ssc' ),
										'selector' => '.img6 img',
									),
									array(
										'property' => 'box-shadow',
										'label'    => esc_html__( 'Box Shadow', 'ssc' ) . esc_html__( ' Hover',
												'ssc' ),
										'selector' => 'img:hover',
									),
									array(
										'property' => 'border',
										'label'    => esc_html__( 'Border', 'ssc' ),
										'selector' => '.img6 img',
									),
									array(
										'property' => 'border-radius',
										'label'    => esc_html__( 'Border Radius', 'ssc' ),
										'selector' => '.img6 img',
									),
									array(
										'property' => 'width',
										'label'    => esc_html__( 'Width', 'ssc' ),
										'selector' => '.img6 img',
									),
									array(
										'property' => 'height',
										'label'    => esc_html__( 'Height', 'ssc' ),
										'selector' => '.img6 img',
									),
									array(
										'property' => 'max-width',
										'label'    => esc_html__( 'Max Width', 'ssc' ),
										'selector' => '.img6 img',
									),
									array(
										'property' => 'margin',
										'label'    => esc_html__( 'Margin', 'ssc' ),
										'selector' => '.img6 img',
									),
									array(
										'property' => 'padding',
										'label'    => esc_html__( 'Padding', 'ssc' ),
										'selector' => '.img6 img',
									),
									array( 'property' => 'display', 'label' => esc_html__( 'Display', 'ssc' ), 'selector' => '.img6 img' ),
								),

								'Img 7'      => array(
									array(
										'property' => 'text-align',
										'label'    => esc_html__( 'Image Alignment', 'ssc' ),
										'selector' => '.img7 img',
									),
									array(
										'property' => 'background-color',
										'label'    => esc_html__( 'Background Color', 'ssc' ),
										'selector' => '.img7 img',
									),
									array(
										'property' => 'box-shadow',
										'label'    => esc_html__( 'Box Shadow', 'ssc' ),
										'selector' => '.img7 img',
									),
									array(
										'property' => 'box-shadow',
										'label'    => esc_html__( 'Box Shadow', 'ssc' ) . esc_html__( ' Hover',
												'ssc' ),
										'selector' => 'img:hover',
									),
									array(
										'property' => 'border',
										'label'    => esc_html__( 'Border', 'ssc' ),
										'selector' => '.img7 img',
									),
									array(
										'property' => 'border-radius',
										'label'    => esc_html__( 'Border Radius', 'ssc' ),
										'selector' => '.img7 img',
									),
									array(
										'property' => 'width',
										'label'    => esc_html__( 'Width', 'ssc' ),
										'selector' => '.img7 img',
									),
									array(
										'property' => 'height',
										'label'    => esc_html__( 'Height', 'ssc' ),
										'selector' => '.img7 img',
									),
									array(
										'property' => 'max-width',
										'label'    => esc_html__( 'Max Width', 'ssc' ),
										'selector' => '.img7 img',
									),
									array(
										'property' => 'margin',
										'label'    => esc_html__( 'Margin', 'ssc' ),
										'selector' => '.img7 img',
									),
									array(
										'property' => 'padding',
										'label'    => esc_html__( 'Padding', 'ssc' ),
										'selector' => '.img7 img',
									),

									array( 'property' => 'display', 'label' => esc_html__( 'Display', 'ssc' ), 'selector' => '.img7 img' ),
								),


							),
						),
					),
				),
				'hover'                        => array(
					array(
						'label'   => esc_html__( 'Hover CSS', 'ssc' ),
						'name'    => 'custom_css_hov',
						'type'    => 'css',
						'value'   => '',
						'options' => array(
							array(
								"screens" => "any,1024,999,767,479",


							),
						),
					),
				),
				'animate'                      => array(
					array(
						'name' => 'animate',
						'type' => 'animate',
					),
				),
			),
		),
	) );
}

// Register Shortcode

function ssc_image_flow_shortcode( $atts, $content = null ) {
	$iconout = $captout = $imageout =  '';
	$icons   = array();
	extract( shortcode_atts( array(
		'template' => '1',
		'icons'    => '',
		'ieclass'  => '',
		'class'    => '',

	),
		$atts ) );
	$css_classes = array();
	$output = $data_lightbox = $title_link = $target = '';

	if ( ! empty( $ieclass ) ) {
		$css_classes[] = $ieclass;
	}
	if ( ! empty( $class ) ) {
		$css_classes[] = $class;
	}

	if ( ! empty( $icons ) ) {


		$wrp_classes = apply_filters( 'kc-el-class', $atts );


		/*---------------------------
		Output
		----------------------------*/
		$output .= '<div  class="ssc_img_ef type' . $template . ' '. implode( ' ', $wrp_classes ) . ' '. implode( ' ', $css_classes ) . '">';
		$i      = 1;
		foreach ( $icons as $item ):
			$blockscale      = '';
			$image           = $item->image;
			$img_size        = $item->img_size;
			$custom_img_size = $item->custom_img_size;
			$monocolored     = $item->monocolored;
			$strength        = $item->strength;
			$hover_effect    = $item->hover_effect;
			$on_click_action = $item->on_click_action;
			$custom_link     = $item->custom_link;
			$show_icon       = $item->show_icon;
			$alt             = $title = $item->title;
			$icon            = $item->icon;
			$img_cl = 'img' . $i;

			if ( $hover_effect == 'scaleupall' ) {
				$blockscale = 'scaleupall';
			}

			// IMAGE
			if ( 'custom_size' == $img_size && ! empty( $custom_img_size ) ) {
				$cs                = ssc_get_img_sizes_array_from_string( $custom_img_size );
				$attachment_data[] = wp_get_attachment_image_src( $image, $cs );
			} else {
				$attachment_data[] = image_downsize( $image, $img_size );
			}
			$attachment_data_full[] = image_downsize( $image, 'full' );

			if ( empty( $icon ) ) {
				$icon = 'fa-leaf';
			}

			$img_thumb = image_downsize( $image, $img_size );
			if ( empty( $alt ) ) {
				$alt = get_post_meta( $image, '_wp_attachment_image_alt', true );
			}

			$image_full_width = image_downsize( $image, 'full' );
			$image_full       = $image_full_width[0];

			switch ( $on_click_action ) {
				case 'lightbox':
					$data_lightbox = ' rel="prettyPhoto" class="kc-pretty-photo"';
					wp_enqueue_script( 'prettyPhoto' );
					wp_enqueue_style( 'prettyPhoto' );
					break;
				case 'open_custom_link':
					$custom_link = ( '||' === $custom_link ) ? '' : $custom_link;
					$custom_link = kc_parse_link( $custom_link );

					if ( strlen( $custom_link['url'] ) > 0 ) {
						$image_full = $custom_link['url'];
						$title_link = $custom_link['title'];
						$target     = strlen( $custom_link['target'] ) > 0 ? $custom_link['target'] : '_self';
					}
					break;
			}

			if ( empty( $monocolored ) ) {
				$strength = '0';
			}

			if (  $on_click_action != 'none' ) {
				$imageout .= '<div class=" mo' . $monocolored . ' ' . $blockscale . ' ' . $hover_effect . ' ' . $img_cl . '" style="-webkit-filter: grayscale(' . $strength . ');filter: grayscale(' . $strength . ');"><a ' . $data_lightbox . ' href="' . $image_full . '" title="' . $title_link . '" target="' . $target . '"><img src="' . $img_thumb['0'] . '" alt="' . $alt . '"></a></div>';
				if ( ! empty( $title ) ) {
					$captout .= '<a ' . $data_lightbox . ' href="' . $image_full . '" title="' . $title_link . '" target="' . $target . '"><strong>' . html_entity_decode( $title ) . '</strong></a>';
				}
				if ( ! empty( $icon ) && 'yes' === $show_icon ) {
					$iconout .= '<a ' . $data_lightbox . ' href="' . $image_full . '" title="' . $title_link . '" target="' . $target . '"><i class="' . $icon . '"></i></a>';
					$iconout .= '<i class="' . $icon . '"></i>';
				}
			} else {
				$imageout .= '<div class=" mo' . $monocolored . ' ' . $blockscale . ' ' . $hover_effect . ' ' . $img_cl . '" style="-webkit-filter: grayscale(' . $strength . ');filter: grayscale(' . $strength . ');"><img src="' . $img_thumb['0'] . '" alt="' . $alt . '" class="' . $hover_effect . '"></div>';
				if ( ! empty( $title ) ) {
					$captout .= '<strong>' . html_entity_decode( $title ) . '</strong>';
				}
			}

			$i ++;
		endforeach;

		// TEMPLATES
		switch ( $template ) {
			case '1':
				$output .= '<div class="obj ">' . $imageout;
				if ( ! empty( $title ) or ! empty( $icon ) ) {
					$output .= '<div class="ieslide">' . $captout . $iconout . '</div>';
				}
				$output .= '</div>';
				break;
			case '2':

				break;

		}

		$output .= '</div>';

		///////////////////////////////////////////////////

	} else {
		return '<div class="kc-carousel_images align-center" style="border:1px dashed #ccc;"><br /><h3>' . esc_html__( 'No image uploaded',
				'ssc' ) . '</h3></div>';
	}

	return $output;

}

add_shortcode( 'ssc_image_flow', 'ssc_image_flow_shortcode' );

