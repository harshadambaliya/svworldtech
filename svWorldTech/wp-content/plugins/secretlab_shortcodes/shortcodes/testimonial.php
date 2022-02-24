<?php


add_action( 'init', 'ssc_testimonial_params', 99 );

/**
 * Additional functions
 */

/**
 * Additional functions
 */


function ssc_testimonial_params() {
	global $kc;

	$kc->add_map( array(
		'ssc_testimonial' => array(
			'name'        => esc_html__( 'Testimonial Extended', 'ssc' ),
			'description' => esc_html__( 'It displays testimonal with custom options', 'ssc' ),
			'icon'        => 'kc-icon-box ssc-icon-23',
			'category'    => 'SecretLab',
			'css_box'     => true,
			'params'      => array(
				'general'                      => array(
					array(
						'name'        => 'template',
						'type'        => 'radio_image',
						'label'       => __( 'Select Template', 'ssc' ),
						'admin_label' => true,
						'options'     => array(
							'1' => plugin_dir_url( __FILE__ ) . '../images/testim1.gif',
							'2' => plugin_dir_url( __FILE__ ) . '../images/testim2.gif',
							'3' => plugin_dir_url( __FILE__ ) . '../images/testim3.gif',
							'4' => plugin_dir_url( __FILE__ ) . '../images/testim4.gif',
							'6' => plugin_dir_url( __FILE__ ) . '../images/testim6.gif',
							'7' => plugin_dir_url( __FILE__ ) . '../images/testim7.gif',
							'8' => plugin_dir_url( __FILE__ ) . '../images/testim8.gif',
							'9' => plugin_dir_url( __FILE__ ) . '../images/testim9.gif',
							'10' => plugin_dir_url( __FILE__ ) . '../images/testim10.gif',
						),
						'value'       => '1',
					),
					array(
						'type'        => 'text',
						'name'        => 'title',
						'label'       => __( 'Title', 'ssc' ),
						'value'       => 'Text Title',
						'admin_label' => true,
					),
					array(
						'name'  => 'position',
						'label' => __( 'Position', 'ssc' ),
						'type'  => 'text',
						'value' => 'Lead Manager',
					),
					array(
						'type'  => 'textarea',
						'name'  => 'desc',
						'label' => __( 'Description', 'ssc' ),
						'value' => base64_encode( 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.' ),
					),
					array(
						'name'     => 'image',
						'label'    => __( 'Upload Image', 'ssc' ),
						'type'     => 'attach_image',
						'relation' => array(
							'parent'    => 'layout',
							'show_when' => array( '1', '3', '4', '5' ),
						),
					),
					array(
						'type'        => 'text',
						'label'       => __( 'Image Size', 'ssc' ),
						'name'        => 'img_size',
						'value'       => 'full',
						'description' => __( ' Set the image size: "full", "thumbnail", "medium", "large" or other size ',
							'ssc' ),
						'relation'    => array(
							'parent'    => 'layout',
							'show_when' => array( '1', '3', '4', '5' ),
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
							'flip'       => esc_html__( 'Flip X', 'ssc' ),
							'flipy'      => esc_html__( 'Flip Y', 'ssc' ),
							'rotate'     => esc_html__( 'Rotate', 'ssc' ),
						),
						'description' => esc_html__( 'Select the click event when users click on an image.', 'ssc' ),
					),
					array(
						'name'        => 'use_rating',
						'label'       => __( ' Use rating?', 'ssc' ),
						'type'        => 'toggle',
						'description' => __( ' Enable a star rating',
							'ssc' ),
						'value'       => '',
					),
//					array(
//						'name'        => 'rating',
//						'label'       => __( 'Rating', 'ssc' ),
//						'type'        => 'number_slider',
//						'value'       => '50%',
//						'description' => '0-100%',
//						'options'     => array(
//							'min'        => 0,
//							'max'        => 100,
//							'unit'       => '%',
//							'show_input' => true,
//						),
//						'relation'    => array(
//							'parent'    => 'use_rating',
//							'show_when' => 'yes',
//						),
//					),
					array(
						'name'        => 'rating',
						'label'       => __( 'Rating', 'ssc' ),
						'type'        => 'select',
						'value'       => 4,
						'options' => array(
							'0' => '0',
							'0.5' => '0.5',
							'1' => '1',
							'1.5' => '1.5',
							'2' => '2',
							'2.5' => '2.5',
							'3' => '3',
							'3.5' => '3.5',
							'4' => '4',
							'4.5' => '4.5',
							'5' => '5',
						),
						'relation'    => array(
							'parent'    => 'use_rating',
							'show_when' => 'yes',
						),
					),

					array(
						'name' => 'star_color',
						'label' => esc_html__( 'Particles stroke shape color', 'ssc' ),
						'type' => 'color_picker',
						'value' => '#fff',
						'relation'    => array(
							'parent'    => 'use_rating',
							'show_when' => 'yes',
						),
					),
					array(
						'type'        => 'text',
						'label'       => __( 'Custom class', 'ssc' ),
						'name'        => 'custom_class',
						'description' => __( 'Enter extra custom class', 'ssc' ),
					),
				),


				//Styling
				esc_html__( 'styling', 'ssc' ) => array(
					array(
						'name'    => 'my-css',
						'label'   => esc_html__( 'Styling', 'ssc' ),
						'type'    => 'css',
						'value'   => '', // remove this if you do not need a default content
						'options' => array(
							array(
								'screens'     => "any, 999,768,667,479",
								'Box'         => array(
									array(
										'property' => 'text-align',
										'label'    => esc_html__( 'Text Align', 'ssc' ),
										'selector' => '+.ssc_testi',
									),
									array(
										'property' => 'vertical-align',
										'label'    => esc_html__( 'Vertical Align', 'ssc' ),
										'selector' => '+.ssc_testi',
									),
									array( 'property' => 'background', 'selector' => '+.ssc_testi' ),
									array( 'property' => 'background', 'selector' => '+.ssc_testi:hover' ),
									array(
										'property' => 'display',
										'label'    => esc_html__( 'Display', 'ssc' ),
										'selector' => '+.ssc_testi',
									),
									array(
										'property' => 'float',
										'label'    => esc_html__( 'Float', 'ssc' ),
										'selector' => '+.ssc_testi',
									),
									array(
										'property' => 'width',
										'label'    => esc_html__( 'Width', 'ssc' ),
										'selector' => '+.ssc_testi',
									),
									array(
										'property' => 'height',
										'label'    => esc_html__( 'Height', 'ssc' ),
										'selector' => '+.ssc_testi',
									),
									array(
										'property' => 'box-shadow',
										'label'    => esc_html__( 'Box Shadow', 'ssc' ),
										'selector' => '+.ssc_testi',
									),
									array(
										'property' => 'box-shadow',
										'label'    => esc_html__( 'Box Shadow', 'ssc' ),
										'selector' => '+.ssc_testi:hover',
									),
									array(
										'property' => 'opacity',
										'label'    => esc_html__( 'Opacity', 'ssc' ),
										'selector' => '+.ssc_testi',
									),
									array(
										'property' => 'opacity',
										'label'    => esc_html__( 'Opacity', 'ssc' ) . ' ' . esc_html__( 'Hover',
												'ssc' ),
										'selector' => '+.ssc_testi:hover',
									),
									array(
										'property' => 'margin',
										'label'    => esc_html__( 'Margin', 'ssc' ),
										'selector' => '+.ssc_testi',
									),
									array(
										'property' => 'margin',
										'label'    => esc_html__( 'Margin', 'ssc' ) . ' ' . esc_html__( 'Hover',
												'ssc' ),
										'selector' => '+.ssc_testi:hover',
									),
									array(
										'property' => 'padding',
										'label'    => esc_html__( 'Padding', 'ssc' ),
										'selector' => '+.ssc_testi',
									),
									array(
										'property' => 'padding',
										'label'    => esc_html__( 'Padding', 'ssc' ) . ' ' . esc_html__( 'Hover',
												'ssc' ),
										'selector' => '+.ssc_testi:hover',
									),
									array(
										'property' => 'border',
										'label'    => esc_html__( 'Border', 'ssc' ),
										'selector' => '+.ssc_testi',
									),
									array(
										'property' => 'border',
										'label'    => esc_html__( 'Border', 'ssc' ) . ' ' . esc_html__( 'Hover',
												'ssc' ),
										'selector' => '+.ssc_testi:hover',
									),
									array(
										'property' => 'border-radius',
										'label'    => esc_html__( 'Border Radius', 'ssc' ),
										'selector' => '+.ssc_testi',
									),
									array(
										'property' => 'border-radius',
										'label'    => esc_html__( 'Border Radius',
												'ssc' ) . ' ' . esc_html__( 'Hover', 'ssc' ),
										'selector' => '+.ssc_testi:hover',
									),
								),
								'Image Box'   => array(
									array(
										'property' => 'text-align',
										'label'    => esc_html__( 'Text Align', 'ssc' ),
										'selector' => '+.ssc_testi figure',
									),
									array(
										'property' => 'vertical-align',
										'label'    => esc_html__( 'Vertical Align', 'ssc' ),
										'selector' => '+.ssc_testi figure',
									),
									array( 'property' => 'background', 'selector' => '+.ssc_testi figure' ),
									array( 'property' => 'background', 'selector' => '+.ssc_testi figure:hover' ),
									array(
										'property' => 'display',
										'label'    => esc_html__( 'Display', 'ssc' ),
										'selector' => '+.ssc_testi figure',
									),
									array(
										'property' => 'float',
										'label'    => esc_html__( 'Float', 'ssc' ),
										'selector' => '+.ssc_testi figure',
									),
									array(
										'property' => 'width',
										'label'    => esc_html__( 'Width', 'ssc' ),
										'selector' => '+.ssc_testi figure',
									),
									array(
										'property' => 'height',
										'label'    => esc_html__( 'Height', 'ssc' ),
										'selector' => '+.ssc_testi figure',
									),
									array(
										'property' => 'box-shadow',
										'label'    => esc_html__( 'Box Shadow', 'ssc' ),
										'selector' => '+.ssc_testi figure',
									),
									array(
										'property' => 'box-shadow',
										'label'    => esc_html__( 'Box Shadow', 'ssc' ),
										'selector' => '+.ssc_testi figure:hover',
									),
									array(
										'property' => 'opacity',
										'label'    => esc_html__( 'Opacity', 'ssc' ),
										'selector' => '+.ssc_testi figure',
									),
									array(
										'property' => 'opacity',
										'label'    => esc_html__( 'Opacity', 'ssc' ) . ' ' . esc_html__( 'Hover',
												'ssc' ),
										'selector' => '+.ssc_testi figure:hover',
									),
									array(
										'property' => 'margin',
										'label'    => esc_html__( 'Margin', 'ssc' ),
										'selector' => '+.ssc_testi figure',
									),
									array(
										'property' => 'margin',
										'label'    => esc_html__( 'Margin', 'ssc' ) . ' ' . esc_html__( 'Hover',
												'ssc' ),
										'selector' => '+.ssc_testi figure:hover',
									),
									array(
										'property' => 'padding',
										'label'    => esc_html__( 'Padding', 'ssc' ),
										'selector' => '+.ssc_testi figure',
									),
									array(
										'property' => 'padding',
										'label'    => esc_html__( 'Padding', 'ssc' ) . ' ' . esc_html__( 'Hover',
												'ssc' ),
										'selector' => '+.ssc_testi figure:hover',
									),
									array(
										'property' => 'border',
										'label'    => esc_html__( 'Border', 'ssc' ),
										'selector' => '+.ssc_testi figure',
									),
									array(
										'property' => 'border',
										'label'    => esc_html__( 'Border', 'ssc' ) . ' ' . esc_html__( 'Hover',
												'ssc' ),
										'selector' => '+.ssc_testi figure:hover',
									),
									array(
										'property' => 'border-radius',
										'label'    => esc_html__( 'Border Radius', 'ssc' ),
										'selector' => '+.ssc_testi figure',
									),
									array(
										'property' => 'border-radius',
										'label'    => esc_html__( 'Border Radius',
												'ssc' ) . ' ' . esc_html__( 'Hover', 'ssc' ),
										'selector' => '+.ssc_testi figure:hover',
									),
								),
								'Image'       => array(
									array( 'property' => 'background', 'selector' => 'img' ),
									array(
										'property' => 'box-shadow',
										'label'    => esc_html__( 'Box Shadow', 'ssc' ),
										'selector' => 'img',
									),
									array(
										'property' => 'width',
										'label'    => esc_html__( 'Width', 'ssc' ),
										'selector' => 'img',
									),
									array(
										'property' => 'height',
										'label'    => esc_html__( 'Height', 'ssc' ),
										'selector' => 'img',
									),
									array(
										'property' => 'display',
										'label'    => esc_html__( 'Display', 'ssc' ),
										'selector' => 'img',
									),
									array(
										'property' => 'float',
										'label'    => esc_html__( 'Float', 'ssc' ),
										'selector' => 'img',
									),
									array(
										'property' => 'margin',
										'label'    => esc_html__( 'Margin', 'ssc' ),
										'selector' => 'img',
									),
									array(
										'property' => 'padding',
										'label'    => esc_html__( 'Padding', 'ssc' ),
										'selector' => 'img',
									),
									array(
										'property' => 'border',
										'label'    => esc_html__( 'Border', 'ssc' ),
										'selector' => 'img',
									),
									array(
										'property' => 'border-radius',
										'label'    => esc_html__( 'Border Radius', 'ssc' ),
										'selector' => 'img',
									),
								),
								'Title'       => array(
									array(
										'property' => 'color',
										'label'    => esc_html__( 'Color', 'ssc' ),
										'selector' => '+.ssc_testi .title',
									),
									array(
										'property' => 'color',
										'label'    => esc_html__( 'Color', 'ssc' ) . ' ' . esc_html__( 'Hover',
												'ssc' ),
										'selector' => '+.ssc_testi:hover .title',
									),
									array( 'property' => 'background', 'selector' => '+.ssc_testi .title' ),
									array( 'property' => 'background', 'selector' => '+.ssc_testi:hover .title' ),
									array(
										'property' => 'font-size',
										'label'    => esc_html__( 'Font Size', 'ssc' ),
										'selector' => '+.ssc_testi .title',
									),
									array(
										'property' => 'line-height',
										'label'    => esc_html__( 'Line Height', 'ssc' ),
										'selector' => '+.ssc_testi .title',
									),
									array(
										'property' => 'font-weight',
										'label'    => esc_html__( 'Font Weight', 'ssc' ),
										'selector' => '+.ssc_testi .title',
									),
									array(
										'property' => 'font-family',
										'label'    => esc_html__( 'Font Family', 'ssc' ),
										'selector' => '+.ssc_testi .title',
									),
									array(
										'property' => 'letter-spacing',
										'label'    => esc_html__( 'Letter Spacing', 'ssc' ),
										'selector' => '+.ssc_testi .title',
									),
									array(
										'property' => 'text-transform',
										'label'    => esc_html__( 'Text Transform', 'ssc' ),
										'selector' => '+.ssc_testi .title',
									),
									array(
										'property' => 'text-decoration',
										'label'    => esc_html__( 'Text Decoration', 'ssc' ),
										'selector' => '+.ssc_testi .title',
									),
									array(
										'property' => 'font-style',
										'label'    => esc_html__( 'Font Style', 'ssc' ),
										'selector' => '+.ssc_testi .title',
									),
									array(
										'property' => 'text-shadow',
										'label'    => esc_html__( 'Text Shadow', 'ssc' ),
										'selector' => '+.ssc_testi .title',
									),
									array(
										'property' => 'text-align',
										'label'    => esc_html__( 'Text Align', 'ssc' ),
										'selector' => '+.ssc_testi .title',
									),
									array(
										'property' => 'display',
										'label'    => esc_html__( 'Display', 'ssc' ),
										'selector' => '+.ssc_testi .title',
									),
									array(
										'property' => 'float',
										'label'    => esc_html__( 'Float', 'ssc' ),
										'selector' => '+.ssc_testi .title',
									),
									array(
										'property' => 'width',
										'label'    => esc_html__( 'Width', 'ssc' ),
										'selector' => '+.ssc_testi .title',
									),
									array(
										'property' => 'height',
										'label'    => esc_html__( 'Height', 'ssc' ),
										'selector' => '+.ssc_testi .title',
									),
									array(
										'property' => 'box-shadow',
										'label'    => esc_html__( 'Box Shadow', 'ssc' ),
										'selector' => '+.ssc_testi .title',
									),
									array(
										'property' => 'box-shadow',
										'label'    => esc_html__( 'Box Shadow', 'ssc' ) . ' ' . esc_html__( 'Hover',
												'ssc' ),
										'selector' => '+.ssc_testi:hover .title',
									),
									array(
										'property' => 'opacity',
										'label'    => esc_html__( 'Opacity', 'ssc' ),
										'selector' => '+.ssc_testi .title',
									),
									array(
										'property' => 'opacity',
										'label'    => esc_html__( 'Opacity', 'ssc' ) . ' ' . esc_html__( 'Hover',
												'ssc' ),
										'selector' => '+.ssc_testi:hover .title',
									),
									array(
										'property' => 'margin',
										'label'    => esc_html__( 'Margin', 'ssc' ),
										'selector' => '+.ssc_testi .title',
									),
									array(
										'property' => 'margin',
										'label'    => esc_html__( 'Margin', 'ssc' ) . ' ' . esc_html__( 'Hover',
												'ssc' ),
										'selector' => '+.ssc_testi:hover .title',
									),
									array(
										'property' => 'padding',
										'label'    => esc_html__( 'Padding', 'ssc' ),
										'selector' => '+.ssc_testi .title',
									),
									array(
										'property' => 'padding',
										'label'    => esc_html__( 'Padding', 'ssc' ) . ' ' . esc_html__( 'Hover',
												'ssc' ),
										'selector' => '+.ssc_testi:hover .title',
									),
									array(
										'property' => 'border',
										'label'    => esc_html__( 'Border', 'ssc' ),
										'selector' => '+.ssc_testi .title',
									),
									array(
										'property' => 'border',
										'label'    => esc_html__( 'Border', 'ssc' ) . ' ' . esc_html__( 'Hover',
												'ssc' ),
										'selector' => '+.ssc_testi:hover .title',
									),
									array(
										'property' => 'border-radius',
										'label'    => esc_html__( 'Border Radius', 'ssc' ),
										'selector' => '+.ssc_testi .title',
									),
									array(
										'property' => 'border-radius',
										'label'    => esc_html__( 'Border Radius',
												'ssc' ) . ' ' . esc_html__( 'Hover', 'ssc' ),
										'selector' => '+.ssc_testi:hover .title',
									),
								),
								'Subtitle'    => array(
									array(
										'property' => 'color',
										'label'    => esc_html__( 'Color', 'ssc' ),
										'selector' => '+.ssc_testi .position',
									),
									array(
										'property' => 'color',
										'label'    => esc_html__( 'Color', 'ssc' ) . ' ' . esc_html__( 'Hover',
												'ssc' ),
										'selector' => '+.ssc_testi:hover .position',
									),
									array( 'property' => 'background', 'selector' => '+.ssc_testi .position' ),
									array( 'property' => 'background', 'selector' => '+.ssc_testi:hover .position' ),
									array(
										'property' => 'font-size',
										'label'    => esc_html__( 'Font Size', 'ssc' ),
										'selector' => '+.ssc_testi .position',
									),
									array(
										'property' => 'line-height',
										'label'    => esc_html__( 'Line Height', 'ssc' ),
										'selector' => '+.ssc_testi .position',
									),
									array(
										'property' => 'font-weight',
										'label'    => esc_html__( 'Font Weight', 'ssc' ),
										'selector' => '+.ssc_testi .position',
									),
									array(
										'property' => 'font-family',
										'label'    => esc_html__( 'Font Family', 'ssc' ),
										'selector' => '+.ssc_testi .position',
									),
                                    array(
                                        'property' => 'letter-spacing',
                                        'label'    => esc_html__( 'Letter Spacing', 'ssc' ),
                                        'selector' => '+.ssc_testi .position',
                                    ),
									array(
										'property' => 'text-transform',
										'label'    => esc_html__( 'Text Transform', 'ssc' ),
										'selector' => '+.ssc_testi .position',
									),
									array(
										'property' => 'text-decoration',
										'label'    => esc_html__( 'Text Decoration', 'ssc' ),
										'selector' => '+.ssc_testi .position',
									),
									array(
										'property' => 'font-style',
										'label'    => esc_html__( 'Font Style', 'ssc' ),
										'selector' => '+.ssc_testi .position',
									),
									array(
										'property' => 'text-shadow',
										'label'    => esc_html__( 'Text Shadow', 'ssc' ),
										'selector' => '+.ssc_testi .position',
									),
									array(
										'property' => 'text-align',
										'label'    => esc_html__( 'Text Align', 'ssc' ),
										'selector' => '+.ssc_testi .position',
									),
									array(
										'property' => 'display',
										'label'    => esc_html__( 'Display', 'ssc' ),
										'selector' => '+.ssc_testi .position',
									),
									array(
										'property' => 'float',
										'label'    => esc_html__( 'Float', 'ssc' ),
										'selector' => '+.ssc_testi .position',
									),
									array(
										'property' => 'width',
										'label'    => esc_html__( 'Width', 'ssc' ),
										'selector' => '+.ssc_testi .position',
									),
									array(
										'property' => 'height',
										'label'    => esc_html__( 'Height', 'ssc' ),
										'selector' => '+.ssc_testi .position',
									),
									array(
										'property' => 'box-shadow',
										'label'    => esc_html__( 'Box Shadow', 'ssc' ),
										'selector' => '+.ssc_testi .position',
									),
									array(
										'property' => 'box-shadow',
										'label'    => esc_html__( 'Box Shadow', 'ssc' ) . ' ' . esc_html__( 'Hover',
												'ssc' ),
										'selector' => '+.ssc_testi:hover .position',
									),
									array(
										'property' => 'opacity',
										'label'    => esc_html__( 'Opacity', 'ssc' ),
										'selector' => '+.ssc_testi .position',
									),
									array(
										'property' => 'opacity',
										'label'    => esc_html__( 'Opacity', 'ssc' ) . ' ' . esc_html__( 'Hover',
												'ssc' ),
										'selector' => '+.ssc_testi:hover .position',
									),
									array(
										'property' => 'margin',
										'label'    => esc_html__( 'Margin', 'ssc' ),
										'selector' => '+.ssc_testi .position',
									),
									array(
										'property' => 'margin',
										'label'    => esc_html__( 'Margin', 'ssc' ) . ' ' . esc_html__( 'Hover',
												'ssc' ),
										'selector' => '+.ssc_testi:hover .position',
									),
									array(
										'property' => 'padding',
										'label'    => esc_html__( 'Padding', 'ssc' ),
										'selector' => '+.ssc_testi .position',
									),
									array(
										'property' => 'padding',
										'label'    => esc_html__( 'Padding', 'ssc' ) . ' ' . esc_html__( 'Hover',
												'ssc' ),
										'selector' => '+.ssc_testi:hover .position',
									),
									array(
										'property' => 'border',
										'label'    => esc_html__( 'Border', 'ssc' ),
										'selector' => '+.ssc_testi .position',
									),
									array(
										'property' => 'border',
										'label'    => esc_html__( 'Border', 'ssc' ) . ' ' . esc_html__( 'Hover',
												'ssc' ),
										'selector' => '+.ssc_testi:hover .position',
									),
									array(
										'property' => 'border-radius',
										'label'    => esc_html__( 'Border Radius', 'ssc' ),
										'selector' => '+.ssc_testi .position',
									),
									array(
										'property' => 'border-radius',
										'label'    => esc_html__( 'Border Radius',
												'ssc' ) . ' ' . esc_html__( 'Hover', 'ssc' ),
										'selector' => '+.ssc_testi:hover .position',
									),
								),
								'Description' => array(
									array(
										'property' => 'color',
										'label'    => esc_html__( 'Color', 'ssc' ),
										'selector' => '+.ssc_testi .desc',
									),
									array(
										'property' => 'color',
										'label'    => esc_html__( 'Color', 'ssc' ) . ' ' . esc_html__( 'Hover',
												'ssc' ),
										'selector' => '+.ssc_testi:hover .desc',
									),
									array( 'property' => 'background', 'selector' => '+.ssc_testi .desc' ),
									array( 'property' => 'background', 'selector' => '+.ssc_testi:hover .desc' ),
									array(
										'property' => 'font-size',
										'label'    => esc_html__( 'Font Size', 'ssc' ),
										'selector' => '+.ssc_testi .desc',
									),
									array(
										'property' => 'line-height',
										'label'    => esc_html__( 'Line Height', 'ssc' ),
										'selector' => '+.ssc_testi .desc',
									),
									array(
										'property' => 'font-weight',
										'label'    => esc_html__( 'Font Weight', 'ssc' ),
										'selector' => '+.ssc_testi .desc',
									),
									array(
										'property' => 'font-family',
										'label'    => esc_html__( 'Font Family', 'ssc' ),
										'selector' => '+.ssc_testi .desc',
									),
									array(
										'property' => 'text-transform',
										'label'    => esc_html__( 'Text Transform', 'ssc' ),
										'selector' => '+.ssc_testi .desc',
									),
									array(
										'property' => 'text-decoration',
										'label'    => esc_html__( 'Text Decoration', 'ssc' ),
										'selector' => '+.ssc_testi .desc',
									),
									array(
										'property' => 'font-style',
										'label'    => esc_html__( 'Font Style', 'ssc' ),
										'selector' => '+.ssc_testi .desc',
									),
									array(
										'property' => 'text-shadow',
										'label'    => esc_html__( 'Text Shadow', 'ssc' ),
										'selector' => '+.ssc_testi .desc',
									),
									array(
										'property' => 'text-align',
										'label'    => esc_html__( 'Text Align', 'ssc' ),
										'selector' => '+.ssc_testi .desc',
									),
									array(
										'property' => 'display',
										'label'    => esc_html__( 'Display', 'ssc' ),
										'selector' => '+.ssc_testi .desc',
									),
									array(
										'property' => 'float',
										'label'    => esc_html__( 'Float', 'ssc' ),
										'selector' => '+.ssc_testi .desc',
									),
									array(
										'property' => 'width',
										'label'    => esc_html__( 'Width', 'ssc' ),
										'selector' => '+.ssc_testi .desc',
									),
									array(
										'property' => 'height',
										'label'    => esc_html__( 'Height', 'ssc' ),
										'selector' => '+.ssc_testi .desc',
									),
									array(
										'property' => 'box-shadow',
										'label'    => esc_html__( 'Box Shadow', 'ssc' ),
										'selector' => '+.ssc_testi .desc',
									),
									array(
										'property' => 'box-shadow',
										'label'    => esc_html__( 'Box Shadow', 'ssc' ) . ' ' . esc_html__( 'Hover',
												'ssc' ),
										'selector' => '+.ssc_testi:hover .desc',
									),
									array(
										'property' => 'opacity',
										'label'    => esc_html__( 'Opacity', 'ssc' ),
										'selector' => '+.ssc_testi .desc',
									),
									array(
										'property' => 'opacity',
										'label'    => esc_html__( 'Opacity', 'ssc' ) . ' ' . esc_html__( 'Hover',
												'ssc' ),
										'selector' => '+.ssc_testi:hover .desc',
									),
									array(
										'property' => 'margin',
										'label'    => esc_html__( 'Margin', 'ssc' ),
										'selector' => '+.ssc_testi .desc',
									),
									array(
										'property' => 'margin',
										'label'    => esc_html__( 'Margin', 'ssc' ) . ' ' . esc_html__( 'Hover',
												'ssc' ),
										'selector' => '+.ssc_testi:hover .desc',
									),
									array(
										'property' => 'padding',
										'label'    => esc_html__( 'Padding', 'ssc' ),
										'selector' => '+.ssc_testi .desc',
									),
									array(
										'property' => 'padding',
										'label'    => esc_html__( 'Padding', 'ssc' ) . ' ' . esc_html__( 'Hover',
												'ssc' ),
										'selector' => '+.ssc_testi:hover .desc',
									),
									array(
										'property' => 'border',
										'label'    => esc_html__( 'Border', 'ssc' ),
										'selector' => '+.ssc_testi .desc',
									),
									array(
										'property' => 'border',
										'label'    => esc_html__( 'Border', 'ssc' ) . ' ' . esc_html__( 'Hover',
												'ssc' ),
										'selector' => '+.ssc_testi:hover .desc',
									),
									array(
										'property' => 'border-radius',
										'label'    => esc_html__( 'Border Radius', 'ssc' ),
										'selector' => '+.ssc_testi .desc',
									),
									array(
										'property' => 'border-radius',
										'label'    => esc_html__( 'Border Radius',
												'ssc' ) . ' ' . esc_html__( 'Hover', 'ssc' ),
										'selector' => '+.ssc_testi:hover .desc',
									),
								),
								'Rating'      => array(
									array( 'property' => 'background', 'selector' => '.rating-wrapper' ),

									array('property' => 'width', 'label'    => esc_html__( 'Width', 'ssc' ), 'selector' => '+.ssc_testi .rating svg',),
									array(
										'property' => 'height',
										'label'    => esc_html__( 'Height', 'ssc' ),
										'selector' => '+.ssc_testi .rating svg',
									),
									array(
										'property' => 'display',
										'label'    => esc_html__( 'Display', 'ssc' ),
										'selector' => '+.ssc_testi .rating svg',
									),
									array(
										'property' => 'margin',
										'label'    => esc_html__( 'Margin', 'ssc' ),
										'selector' => '+.ssc_testi .rating svg',
									),
									array(
										'property' => 'padding',
										'label'    => esc_html__( 'Padding', 'ssc' ),
										'selector' => '+.ssc_testi .rating svg',
									),
									array(
										'property' => 'float',
										'label'    => esc_html__( 'Float', 'ssc' ),
										'selector' => '.rating-wrapper',
									),
									array(
										'property' => 'box-shadow',
										'label'    => esc_html__( 'Box Shadow', 'ssc' ),
										'selector' => '.rating-wrapper',
									),
									array(
										'property' => 'opacity',
										'label'    => esc_html__( 'Opacity', 'ssc' ),
										'selector' => '.rating-wrapper',
									),
									array(
										'property' => 'opacity',
										'label'    => esc_html__( 'Opacity', 'ssc' ) . ' ' . esc_html__( 'Hover',
												'ssc' ),
										'selector' => '.rating-wrapper:hover',
									),
									array(
										'property' => 'margin',
										'label'    => esc_html__( 'Margin', 'ssc' ),
										'selector' => '.rating-wrapper',
									),
									array(
										'property' => 'padding',
										'label'    => esc_html__( 'Padding', 'ssc' ),
										'selector' => '.rating-wrapper',
									),
									array(
										'property' => 'border',
										'label'    => esc_html__( 'Border', 'ssc' ),
										'selector' => '.rating-wrapper',
									),
									array(
										'property' => 'border',
										'label'    => esc_html__( 'Border', 'ssc' ) . ' ' . esc_html__( 'Hover',
												'ssc' ),
										'selector' => '.rating-wrapper:hover',
									),
									array(
										'property' => 'border-radius',
										'label'    => esc_html__( 'Border Radius', 'ssc' ),
										'selector' => '.rating-wrapper',
									),
									array(
										'property' => 'border-radius',
										'label'    => esc_html__( 'Border Radius',
												'ssc' ) . ' ' . esc_html__( 'Hover', 'ssc' ),
										'selector' => '.rating-wrapper:hover',
									),
								),
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

function ssc_testimonial_shortcode( $atts, $content = null ) {
	$title = $desc = $image = $img_size = $position = $custom_class = $data_img = $data_title = $data_desc = $data_position = $template = $hover_effect = $strength = $blockscale = $r_html = '';
	extract( shortcode_atts( array(
		'template'     => '',
		'title'        => '',
		'position'     => '',
		'desc'         => '',
		'image'        => '',
		'img_size'     => '',
		'monocolored'  => '',
		'strength'     => '',
		'hover_effect' => '',
		'use_rating'   => '',
		'rating'       => '2.5',
		'star_color'   => '#fff',
		'custom_class' => '',
	),
		$atts ) );

	if ( ! empty( $title ) ) {
		$data_title .= '<h5 class="title">' . $title . '</h5>';
	}
	if ( ! empty( $desc ) ) {
		$data_desc .= '<div class="desc">' . $desc . '</div>';
	}
	if ( ! empty( $position ) ) {
		$data_position .= '<div class="position">' . $position . '</div>';
	}
	if ( empty( $monocolored ) ) {
		$strength = '0';
	}
	if ( ! empty( $image ) ) {
		$size_array = array( 'full', 'medium', 'large', 'thumbnail' );
		if ( in_array( $img_size, $size_array ) ) {
			$image_data = image_downsize( $image, $img_size );
			$img_link   = $image_data[0];
		} else {
			$image_full_width = image_downsize( $image, 'full' );
			$img_link         = kc_tools::createImageSize( $image_full_width[0], $img_size );
		}

		$data_img .= '<figure>';
		$data_img .= '<img src="' . $img_link . '" alt="' . $title . ' ' . $position . '" style="-webkit-filter: grayscale(' . $strength . ');filter: grayscale(' . $strength . ');">';
		$data_img .= '</figure>';

	}

	if ( $hover_effect == 'scaleupall' ) {
		$blockscale = 'scaleupall';
	}

	$output = '';

	$wrp_classes = apply_filters( 'kc-el-class', $atts );
	if ( ! empty( $custom_class ) ) {
		$wrp_classes[] = $custom_class;
	}
	$output .= '<div class="ssc_testi type' . $template . ' mo' . $monocolored . ' ' . $hover_effect . ' ' . $blockscale . ' ' . implode( ' ', $wrp_classes ) . '" >';



	if ( 'yes' === $use_rating ) {
		$id = implode( '-', $wrp_classes );
		$stars = '';
		$full = (int)$rating;
		$empt = 5 - round($rating);
		$h_star = empty( strpos ( $rating, '.'  ) ) ? '' : '<svg xmlns="http://www.w3.org/2000/svg" enable-background="new 0 0 24 24" height="512" viewBox="0 0 24 24" width="512">
    <defs>
        <linearGradient id="' . implode( '-', $wrp_classes ) . '" gradientUnits="userSpaceOnUse">
            <stop offset="50%" stop-color="' . $star_color . '"/>
            <stop offset="50%" stop-color="transparent" stop-opacity="1" />
        </linearGradient>
    </defs>
<path d="m22.765 9.397c-.08-.24-.288-.414-.538-.453l-6.64-1.015-2.976-6.34c-.222-.474-.999-.474-1.222 0l-2.976 6.341-6.64 1.015c-.25.038-.458.213-.538.453s-.019.505.157.686l4.824 4.945-1.14 6.99c-.042.255.066.512.277.66s.489.164.715.039l5.932-3.279 5.931 3.278c.102.057.214.084.327.084.137 0 .273-.041.389-.123.211-.149.319-.406.277-.66l-1.14-6.99 4.824-4.945c.177-.181.237-.446.157-.686z" fill="url(#' . implode( '-', $wrp_classes ) . ')"/>
<path d="m5.574 15.362-1.267 7.767c-.046.283.073.568.308.734.234.165.543.183.795.043l6.59-3.642 6.59 3.643c.114.062.239.093.363.093.152 0 .303-.046.432-.137.235-.166.354-.451.308-.734l-1.267-7.767 5.36-5.494c.196-.201.264-.496.175-.762-.089-.267-.32-.46-.598-.503l-7.378-1.127-3.307-7.044c-.247-.526-1.11-.526-1.357 0l-3.306 7.044-7.378 1.127c-.278.043-.509.236-.598.503s-.022.561.174.762zm3.063-6.464c.247-.038.459-.196.565-.422l2.798-5.961 2.798 5.96c.106.226.318.385.565.422l6.331.967-4.605 4.72c-.167.17-.242.41-.204.645l1.08 6.617-5.602-3.096c-.113-.062-.238-.094-.363-.094s-.25.031-.363.094l-5.602 3.096 1.08-6.617c.038-.235-.037-.474-.204-.645l-4.605-4.72z" fill="' . $star_color . '"/>
</svg>';
		$f_star = '<svg xmlns="http://www.w3.org/2000/svg" enable-background="new 0 0 24 24" height="512" viewBox="0 0 24 24" width="512">
<path d="m22.765 9.397c-.08-.24-.288-.414-.538-.453l-6.64-1.015-2.976-6.34c-.222-.474-.999-.474-1.222 0l-2.976 6.341-6.64 1.015c-.25.038-.458.213-.538.453s-.019.505.157.686l4.824 4.945-1.14 6.99c-.042.255.066.512.277.66s.489.164.715.039l5.932-3.279 5.931 3.278c.102.057.214.084.327.084.137 0 .273-.041.389-.123.211-.149.319-.406.277-.66l-1.14-6.99 4.824-4.945c.177-.181.237-.446.157-.686z" fill="' . $star_color . '"/>
<path d="m5.574 15.362-1.267 7.767c-.046.283.073.568.308.734.234.165.543.183.795.043l6.59-3.642 6.59 3.643c.114.062.239.093.363.093.152 0 .303-.046.432-.137.235-.166.354-.451.308-.734l-1.267-7.767 5.36-5.494c.196-.201.264-.496.175-.762-.089-.267-.32-.46-.598-.503l-7.378-1.127-3.307-7.044c-.247-.526-1.11-.526-1.357 0l-3.306 7.044-7.378 1.127c-.278.043-.509.236-.598.503s-.022.561.174.762zm3.063-6.464c.247-.038.459-.196.565-.422l2.798-5.961 2.798 5.96c.106.226.318.385.565.422l6.331.967-4.605 4.72c-.167.17-.242.41-.204.645l1.08 6.617-5.602-3.096c-.113-.062-.238-.094-.363-.094s-.25.031-.363.094l-5.602 3.096 1.08-6.617c.038-.235-.037-.474-.204-.645l-4.605-4.72z" fill="' . $star_color . '"/>
</svg>';
		$e_star = '<svg xmlns="http://www.w3.org/2000/svg" enable-background="new 0 0 24 24" height="512" viewBox="0 0 24 24" width="512">
<path d="m5.574 15.362-1.267 7.767c-.046.283.073.568.308.734.234.165.543.183.795.043l6.59-3.642 6.59 3.643c.114.062.239.093.363.093.152 0 .303-.046.432-.137.235-.166.354-.451.308-.734l-1.267-7.767 5.36-5.494c.196-.201.264-.496.175-.762-.089-.267-.32-.46-.598-.503l-7.378-1.127-3.307-7.044c-.247-.526-1.11-.526-1.357 0l-3.306 7.044-7.378 1.127c-.278.043-.509.236-.598.503s-.022.561.174.762zm3.063-6.464c.247-.038.459-.196.565-.422l2.798-5.961 2.798 5.96c.106.226.318.385.565.422l6.331.967-4.605 4.72c-.167.17-.242.41-.204.645l1.08 6.617-5.602-3.096c-.113-.062-.238-.094-.363-.094s-.25.031-.363.094l-5.602 3.096 1.08-6.617c.038-.235-.037-.474-.204-.645l-4.605-4.72z" fill="' . $star_color . '"/>
</svg>';
		for($i = 1; $i <= $full; $i++ ){
			$stars .= $f_star;
		}
		$stars .= $h_star;
		for($i = 1; $i <= $empt; $i++ ){
			$stars .= $e_star;
		}
		$r_html = '<div class="rating-wrapper"><div class="rating">' . $stars . '</div></div>';
	}

	switch ( $template ) {
		case '2':
			$output .= $data_desc . $data_img . $r_html . $data_title . $data_position;
			break;
		case '3':
			$output .= $data_img . $data_desc . $data_title . $data_position . $r_html;
			break;
		case '4':
			$output .= $data_img . $r_html . $data_title . $data_position . $data_desc;
			break;
		case '5':
			$output .= $data_desc . $data_img . '<div class="box-right">' . $data_title . $r_html . $data_position . '</div>';
			break;
		case '6':
			$output .= $data_img . $data_title . $r_html . $data_position . $data_desc;
			break;
		case '7':
			$output .= $data_desc . $r_html . $data_title . $data_position . $data_img;
			break;
		case '8':
			$output .= $data_img . $data_title . $data_position . $data_desc . $r_html;
			break;
		case '9':
			$output .= $data_desc . '<div class="user-data">' . $data_img . '<div class="box-right">' . $data_title . $data_position . $r_html . '</div></div>';
			break;
        case '10':
            $output .= $data_img. $data_title . $data_position . $data_desc . $r_html ;
            break;

		default:
			$output .= $data_title . $data_desc . $r_html . $data_img . $data_position;
			break;
	}
	$output .= '</div>';

	return $output;
}

add_shortcode( 'ssc_testimonial', 'ssc_testimonial_shortcode' );

