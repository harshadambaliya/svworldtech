<?php

add_action( 'init', 'ssc_babe_search_params', 99 );

function ssc_babe_search_params() {
	global $kc;

	$kc->add_map( array(
		'ssc_babe_search' => array(
			'name'             => __( ' SC Room Search Form', 'ssc' ),
			'icon'             => 'ssc-icon-31',
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
						'name'        => 'title',
						'type'        => 'text',
						'label'       => esc_html__( 'Title', 'ssc' ),
						'admin_label' => true,
						'value' => ''
					),
					array(
						'name'        => 'date_from_label',
						'type'        => 'text',
						'label'       => esc_html__( 'Check-in label', 'ssc' ),
						'admin_label' => true,
						'value' => esc_html__( 'Check-in', 'ssc' ),
					),
					array(
						'name'        => 'date_to_label',
						'type'        => 'text',
						'label'       => esc_html__( 'Check-out label', 'ssc' ),
						'admin_label' => true,
						'value' => esc_html__( 'Check-out', 'ssc' ),
					),
					array(
						'name'        => 'guests_label',
						'type'        => 'text',
						'label'       => esc_html__( 'Guests label', 'ssc' ),
						'admin_label' => true,
						'value' => esc_html__( 'Guests', 'ssc' ),
					),
					array(
						'name'        => 'guest_text',
						'type'        => 'text',
						'label'       => esc_html__( '"Guest" text', 'ssc' ),
						'admin_label' => true,
						'value' => esc_html__( 'Guest', 'ssc' ),
					),
					array(
						'name'        => 'guests_text',
						'type'        => 'text',
						'label'       => esc_html__( '"Guests" text', 'ssc' ),
						'admin_label' => true,
						'value' => esc_html__( 'Guests', 'ssc' ),
					),
					array(
						'name'        => 'button_title',
						'type'        => 'text',
						'label'       => esc_html__( 'Button Title', 'ssc' ),
						'admin_label' => true,
						'value' => ''
					),
					array(
						'name' => 'button_svg',
						'type' => 'attach_image',
						'label' => esc_html__( 'Select SVG for button', 'ssc' ),
						'admin_label' => true,
					),
					array(
						'name' => 'el_class',
						'type' => 'text',
						'label' => esc_html__( 'Extra Class Name', 'ssc' ),
						'description' => esc_html__( 'If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your CSS file.', 'ssc' ),
						'admin_label' => true,
						'value' => ''
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
									array('property' => 'background', 'selector' => '#search-box'),
									array('property' => 'display', 'label' => esc_html__( 'Display', 'ssc' ), 'selector' => '#search-box'),
									array('property' => 'float', 'label' => esc_html__( 'Float', 'ssc' ), 'selector' => '#search-box'),
									array('property' => 'max-width', 'label' => esc_html__( 'Max Width', 'ssc' ), 'selector' => '#search-box'),
									array('property' => 'width', 'label' => esc_html__( 'Width', 'ssc' ), 'selector' => '#search-box'),
									array('property' => 'height', 'label' => esc_html__( 'Height', 'ssc' ), 'selector' => '#search-box'),
									array('property' => 'box-shadow', 'label' => esc_html__( 'Box Shadow', 'ssc' ), 'selector' => '#search-box'),
									array('property' => 'opacity', 'label' => esc_html__( 'Opacity', 'ssc' ), 'selector' => '#search-box'),
									array('property' => 'margin', 'label' => esc_html__( 'Margin', 'ssc' ), 'selector' => '#search-box'),
									array('property' => 'padding', 'label' => esc_html__( 'Padding', 'ssc' ), 'selector' => '#search-box'),
									array('property' => 'border', 'label' => esc_html__( 'Border', 'ssc' ), 'selector' => '#search-box'),
									array('property' => 'border-radius', 'label' => esc_html__( 'Border Radius', 'ssc' ), 'selector' => '#search-box'),
								),
                                'Icons' => array(
                                    array('property' => 'background', 'selector' => 'i'),
                                    array('property' => 'text-align', 'label' => esc_html__( 'Text Align', 'ssc' ), 'selector' => 'i'),
                                    array('property' => 'margin', 'label' => esc_html__( 'Margin', 'ssc' ), 'selector' => 'i'),
                                    array('property' => 'padding', 'label' => esc_html__( 'Padding', 'ssc' ), 'selector' => 'i'),
                                    array('property' => 'border', 'label' => esc_html__( 'Border', 'ssc' ), 'selector' => 'i'),
                                    array('property' => 'border-radius', 'label' => esc_html__( 'Border Radius', 'ssc' ), 'selector' => 'i'),
                                    array('property' => 'width', 'label' => esc_html__( 'Width', 'ssc' ), 'selector' => 'i'),
                                    array('property' => 'height', 'label' => esc_html__( 'Height', 'ssc' ), 'selector' => 'i'),
                                    array('property' => 'float', 'label' => esc_html__( 'Float', 'ssc' ), 'selector' => 'i'),
                                    array('property' => 'display', 'label' => esc_html__( 'Display', 'ssc' ), 'selector' => 'i'),
                                    array('property' => 'box-shadow', 'label' => esc_html__( 'Box Shadow', 'ssc' ), 'selector' => 'i'),
                                    array('property' => 'opacity', 'label' => esc_html__( 'Opacity', 'ssc' ), 'selector' => 'i'),
                                ),
                                'Date Wrap' => array(
                                    array('property' => 'background', 'selector' => 'div.search_date'),
                                    array('property' => 'color', 'label' => esc_html__( 'Color', 'ssc' ), 'selector' => 'div.search_date'),
                                    array('property' => 'font-size', 'label' => esc_html__( 'Font Size', 'ssc' ), 'selector' => 'div.search_date'),
                                    array('property' => 'line-height', 'label' => esc_html__( 'Line Height', 'ssc' ), 'selector' => 'div.search_date'),
                                    array('property' => 'font-weight', 'label' => esc_html__( 'Font Weight', 'ssc' ), 'selector' => 'div.search_date'),
                                    array('property' => 'font-style', 'label' => esc_html__( 'Font Style', 'ssc' ), 'selector' => 'div.search_date'),
                                    array('property' => 'font-family', 'label' => esc_html__( 'Font Family', 'ssc' ), 'selector' => 'div.search_date'),
                                    array('property' => 'text-align', 'label' => esc_html__( 'Text Align', 'ssc' ), 'selector' => 'div.search_date'),
                                    array('property' => 'text-shadow', 'label' => esc_html__( 'Text Shadow', 'ssc' ), 'selector' => 'div.search_date'),
                                    array('property' => 'text-transform', 'label' => esc_html__( 'Text Transform', 'ssc' ), 'selector' => 'div.search_date'),
                                    array('property' => 'text-decoration', 'label' => esc_html__( 'Text Decoration', 'ssc' ), 'selector' => 'div.search_date'),
                                    array('property' => 'letter-spacing', 'label' => esc_html__( 'Letter Spacing', 'ssc' ), 'selector' => 'div.search_date'),
                                    array('property' => 'overflow', 'label' => esc_html__( 'Overflow', 'ssc' ), 'selector' => 'div.search_date'),
                                    array('property' => 'float', 'label' => esc_html__( 'Float', 'ssc' ), 'selector' => 'div.search_date'),
                                    array('property' => 'display', 'label' => esc_html__( 'Display', 'ssc' ), 'selector' => 'div.search_date'),
                                    array('property' => 'word-break', 'label' => esc_html__( 'Word Break', 'ssc' ), 'selector' => 'div.search_date'),
                                    array('property' => 'margin', 'label' => esc_html__( 'Margin', 'ssc' ), 'selector' => 'div.search_date'),
                                    array('property' => 'padding', 'label' => esc_html__( 'Padding', 'ssc' ), 'selector' => 'div.search_date'),
                                    array('property' => 'border', 'label' => esc_html__( 'Border', 'ssc' ), 'selector' => 'div.search_date'),
                                    array('property' => 'border-radius', 'label' => esc_html__( 'Border Radius', 'ssc' ), 'selector' => 'div.search_date'),
                                ),
                                'Guest Wrap' => array(
                                    array('property' => 'background', 'selector' => '.search_guests_field'),
                                    array('property' => 'color', 'label' => esc_html__( 'Color', 'ssc' ), 'selector' => '.search_guests_field'),
                                    array('property' => 'font-size', 'label' => esc_html__( 'Font Size', 'ssc' ), 'selector' => '.search_guests_field'),
                                    array('property' => 'line-height', 'label' => esc_html__( 'Line Height', 'ssc' ), 'selector' => '.search_guests_field'),
                                    array('property' => 'font-weight', 'label' => esc_html__( 'Font Weight', 'ssc' ), 'selector' => '.search_guests_field'),
                                    array('property' => 'font-style', 'label' => esc_html__( 'Font Style', 'ssc' ), 'selector' => '.search_guests_field'),
                                    array('property' => 'font-family', 'label' => esc_html__( 'Font Family', 'ssc' ), 'selector' => '.search_guests_field'),
                                    array('property' => 'text-align', 'label' => esc_html__( 'Text Align', 'ssc' ), 'selector' => '.search_guests_field'),
                                    array('property' => 'text-shadow', 'label' => esc_html__( 'Text Shadow', 'ssc' ), 'selector' => '.search_guests_field'),
                                    array('property' => 'text-transform', 'label' => esc_html__( 'Text Transform', 'ssc' ), 'selector' => '.search_guests_field'),
                                    array('property' => 'text-decoration', 'label' => esc_html__( 'Text Decoration', 'ssc' ), 'selector' => '.search_guests_field'),
                                    array('property' => 'letter-spacing', 'label' => esc_html__( 'Letter Spacing', 'ssc' ), 'selector' => '.search_guests_field'),
                                    array('property' => 'overflow', 'label' => esc_html__( 'Overflow', 'ssc' ), 'selector' => '.search_guests_field'),
                                    array('property' => 'float', 'label' => esc_html__( 'Float', 'ssc' ), 'selector' => '.search_guests_field'),
                                    array('property' => 'display', 'label' => esc_html__( 'Display', 'ssc' ), 'selector' => '.search_guests_field'),
                                    array('property' => 'word-break', 'label' => esc_html__( 'Word Break', 'ssc' ), 'selector' => '.search_guests_field'),
                                    array('property' => 'margin', 'label' => esc_html__( 'Margin', 'ssc' ), 'selector' => '.search_guests_field'),
                                    array('property' => 'padding', 'label' => esc_html__( 'Padding', 'ssc' ), 'selector' => '.search_guests_field'),
                                    array('property' => 'border', 'label' => esc_html__( 'Border', 'ssc' ), 'selector' => '.search_guests_field'),
                                    array('property' => 'border-radius', 'label' => esc_html__( 'Border Radius', 'ssc' ), 'selector' => '.search_guests_field'),
                                ),
                                'Guest' => array(
                                    array('property' => 'background', 'selector' => '.search_guests_title'),
                                    array('property' => 'color', 'label' => esc_html__( 'Color', 'ssc' ), 'selector' => '.search_guests_title'),
                                    array('property' => 'font-size', 'label' => esc_html__( 'Font Size', 'ssc' ), 'selector' => '.search_guests_title'),
                                    array('property' => 'line-height', 'label' => esc_html__( 'Line Height', 'ssc' ), 'selector' => '.search_guests_title'),
                                    array('property' => 'font-weight', 'label' => esc_html__( 'Font Weight', 'ssc' ), 'selector' => '.search_guests_title'),
                                    array('property' => 'font-style', 'label' => esc_html__( 'Font Style', 'ssc' ), 'selector' => '.search_guests_title'),
                                    array('property' => 'font-family', 'label' => esc_html__( 'Font Family', 'ssc' ), 'selector' => '.search_guests_title'),
                                    array('property' => 'text-align', 'label' => esc_html__( 'Text Align', 'ssc' ), 'selector' => '.search_guests_title'),
                                    array('property' => 'text-shadow', 'label' => esc_html__( 'Text Shadow', 'ssc' ), 'selector' => '.search_guests_title'),
                                    array('property' => 'text-transform', 'label' => esc_html__( 'Text Transform', 'ssc' ), 'selector' => '.search_guests_title'),
                                    array('property' => 'text-decoration', 'label' => esc_html__( 'Text Decoration', 'ssc' ), 'selector' => '.search_guests_title'),
                                    array('property' => 'letter-spacing', 'label' => esc_html__( 'Letter Spacing', 'ssc' ), 'selector' => '.search_guests_title'),
                                    array('property' => 'overflow', 'label' => esc_html__( 'Overflow', 'ssc' ), 'selector' => '.search_guests_title'),
                                    array('property' => 'float', 'label' => esc_html__( 'Float', 'ssc' ), 'selector' => '.search_guests_title'),
                                    array('property' => 'display', 'label' => esc_html__( 'Display', 'ssc' ), 'selector' => '.search_guests_title'),
                                    array('property' => 'word-break', 'label' => esc_html__( 'Word Break', 'ssc' ), 'selector' => '.search_guests_title'),
                                    array('property' => 'margin', 'label' => esc_html__( 'Margin', 'ssc' ), 'selector' => '.search_guests_title'),
                                    array('property' => 'padding', 'label' => esc_html__( 'Padding', 'ssc' ), 'selector' => '.search_guests_title'),
                                    array('property' => 'border', 'label' => esc_html__( 'Border', 'ssc' ), 'selector' => '.search_guests_title'),
                                    array('property' => 'border-radius', 'label' => esc_html__( 'Border Radius', 'ssc' ), 'selector' => '.search_guests_title'),
                                ),
                                'Button' => array(
                                    array('property' => 'background', 'selector' => '.btn-search'),
                                    array('property' => 'color', 'label' => esc_html__( 'Color', 'ssc' ), 'selector' => '.btn-search'),
                                    array('property' => 'font-size', 'label' => esc_html__( 'Font Size', 'ssc' ), 'selector' => '.btn-search'),
                                    array('property' => 'line-height', 'label' => esc_html__( 'Line Height', 'ssc' ), 'selector' => '.btn-search'),
                                    array('property' => 'font-weight', 'label' => esc_html__( 'Font Weight', 'ssc' ), 'selector' => '.btn-search'),
                                    array('property' => 'font-style', 'label' => esc_html__( 'Font Style', 'ssc' ), 'selector' => '.btn-search'),
                                    array('property' => 'font-family', 'label' => esc_html__( 'Font Family', 'ssc' ), 'selector' => '.btn-search'),
                                    array('property' => 'text-align', 'label' => esc_html__( 'Text Align', 'ssc' ), 'selector' => '.btn-search'),
                                    array('property' => 'text-shadow', 'label' => esc_html__( 'Text Shadow', 'ssc' ), 'selector' => '.btn-search'),
                                    array('property' => 'text-transform', 'label' => esc_html__( 'Text Transform', 'ssc' ), 'selector' => '.btn-search'),
                                    array('property' => 'text-decoration', 'label' => esc_html__( 'Text Decoration', 'ssc' ), 'selector' => '.btn-search'),
                                    array('property' => 'letter-spacing', 'label' => esc_html__( 'Letter Spacing', 'ssc' ), 'selector' => '.btn-search'),
                                    array('property' => 'overflow', 'label' => esc_html__( 'Overflow', 'ssc' ), 'selector' => '.btn-search'),
                                    array('property' => 'float', 'label' => esc_html__( 'Float', 'ssc' ), 'selector' => '.btn-search'),
                                    array('property' => 'display', 'label' => esc_html__( 'Display', 'ssc' ), 'selector' => '.btn-search'),
                                    array('property' => 'word-break', 'label' => esc_html__( 'Word Break', 'ssc' ), 'selector' => '.btn-search'),
                                    array('property' => 'margin', 'label' => esc_html__( 'Margin', 'ssc' ), 'selector' => '.btn-search'),
                                    array('property' => 'padding', 'label' => esc_html__( 'Padding', 'ssc' ), 'selector' => '.btn-search'),
                                    array('property' => 'border', 'label' => esc_html__( 'Border', 'ssc' ), 'selector' => '.btn-search'),
                                    array('property' => 'border-radius', 'label' => esc_html__( 'Border Radius', 'ssc' ), 'selector' => '.btn-search'),
                                ),
								'Button SVG' => array(
									array('property' => 'fill', 'label' => esc_html__( 'Color', 'ssc' ), 'selector' => '.btn-search svg'),
									array('property' => 'background', 'selector' => '.btn-search svg'),
									array('property' => 'width', 'label' => esc_html__( 'Width', 'ssc' ), 'selector' => '.btn-search svg'),
									array('property' => 'height', 'label' => esc_html__( 'Height', 'ssc' ), 'selector' => '.btn-search svg'),
									array('property' => 'float', 'label' => esc_html__( 'Float', 'ssc' ), 'selector' => '.btn-search svg'),
									array('property' => 'display', 'label' => esc_html__( 'Display', 'ssc' ), 'selector' => '.btn-search svg'),
									array('property' => 'margin', 'label' => esc_html__('Margin', 'ssc' ), 'selector' => '.btn-search svg'),
									array('property' => 'padding', 'label' =>esc_html__( 'Padding', 'ssc' ), 'selector' => '.btn-search svg'),
									array('property' => 'border', 'label' =>esc_html__( 'Padding', 'ssc' ), 'selector' => '.btn-search svg'),
									array('property' => 'border-radius', 'label' =>esc_html__( 'Padding', 'ssc' ), 'selector' => '.btn-search svg'),
									array('opacity' => 'border-radius', 'label' =>esc_html__( 'Padding', 'ssc' ), 'selector' => '.btn-search svg'),
								),
								'Button text' => array(
									array('property' => 'background', 'selector' => '.btn-search .text'),
									array('property' => 'color', 'label' => esc_html__( 'Color', 'ssc' ), 'selector' => '.btn-search .text'),
									array('property' => 'font-size', 'label' => esc_html__( 'Font Size', 'ssc' ), 'selector' => '.btn-search .text'),
									array('property' => 'line-height', 'label' => esc_html__( 'Line Height', 'ssc' ), 'selector' => '.btn-search .text'),
									array('property' => 'font-weight', 'label' => esc_html__( 'Font Weight', 'ssc' ), 'selector' => '.btn-search .text'),
									array('property' => 'font-style', 'label' => esc_html__( 'Font Style', 'ssc' ), 'selector' => '.btn-search .text'),
									array('property' => 'font-family', 'label' => esc_html__( 'Font Family', 'ssc' ), 'selector' => '.btn-search .text'),
									array('property' => 'text-align', 'label' => esc_html__( 'Text Align', 'ssc' ), 'selector' => '.btn-search .text'),
									array('property' => 'text-shadow', 'label' => esc_html__( 'Text Shadow', 'ssc' ), 'selector' => '.btn-search .text'),
									array('property' => 'text-transform', 'label' => esc_html__( 'Text Transform', 'ssc' ), 'selector' => '.btn-search .text'),
									array('property' => 'text-decoration', 'label' => esc_html__( 'Text Decoration', 'ssc' ), 'selector' => '.btn-search .text'),
									array('property' => 'letter-spacing', 'label' => esc_html__( 'Letter Spacing', 'ssc' ), 'selector' => '.btn-search .text'),
									array('property' => 'overflow', 'label' => esc_html__( 'Overflow', 'ssc' ), 'selector' => '.btn-search .text'),
									array('property' => 'float', 'label' => esc_html__( 'Float', 'ssc' ), 'selector' => '.btn-search .text'),
									array('property' => 'display', 'label' => esc_html__( 'Display', 'ssc' ), 'selector' => '.btn-search .text'),
									array('property' => 'word-break', 'label' => esc_html__( 'Word Break', 'ssc' ), 'selector' => '.btn-search .text'),
									array('property' => 'margin', 'label' => esc_html__( 'Margin', 'ssc' ), 'selector' => '.btn-search .text'),
									array('property' => 'padding', 'label' => esc_html__( 'Padding', 'ssc' ), 'selector' => '.btn-search .text'),
									array('property' => 'border', 'label' => esc_html__( 'Border', 'ssc' ), 'selector' => '.btn-search .text'),
									array('property' => 'border-radius', 'label' => esc_html__( 'Border Radius', 'ssc' ), 'selector' => '.btn-search .text'),
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
                                'Button' => array(
                                    array('property' => 'background', 'selector' => '.btn-search:hover'),
                                    array('property' => 'color', 'label' => esc_html__( 'Color', 'ssc' ), 'selector' => '.btn-search:hover'),
                                    array('property' => 'font-size', 'label' => esc_html__( 'Font Size', 'ssc' ), 'selector' => '.btn-search:hover'),
                                    array('property' => 'line-height', 'label' => esc_html__( 'Line Height', 'ssc' ), 'selector' => '.btn-search:hover'),
                                    array('property' => 'font-weight', 'label' => esc_html__( 'Font Weight', 'ssc' ), 'selector' => '.btn-search:hover'),
                                    array('property' => 'font-style', 'label' => esc_html__( 'Font Style', 'ssc' ), 'selector' => '.btn-search:hover'),
                                    array('property' => 'font-family', 'label' => esc_html__( 'Font Family', 'ssc' ), 'selector' => '.btn-search:hover'),
                                    array('property' => 'text-align', 'label' => esc_html__( 'Text Align', 'ssc' ), 'selector' => '.btn-search:hover'),
                                    array('property' => 'text-shadow', 'label' => esc_html__( 'Text Shadow', 'ssc' ), 'selector' => '.btn-search:hover'),
                                    array('property' => 'text-transform', 'label' => esc_html__( 'Text Transform', 'ssc' ), 'selector' => '.btn-search:hover'),
                                    array('property' => 'text-decoration', 'label' => esc_html__( 'Text Decoration', 'ssc' ), 'selector' => '.btn-search:hover'),
                                    array('property' => 'letter-spacing', 'label' => esc_html__( 'Letter Spacing', 'ssc' ), 'selector' => '.btn-search:hover'),
                                    array('property' => 'overflow', 'label' => esc_html__( 'Overflow', 'ssc' ), 'selector' => '.btn-search:hover'),
                                    array('property' => 'float', 'label' => esc_html__( 'Float', 'ssc' ), 'selector' => '.btn-search:hover'),
                                    array('property' => 'display', 'label' => esc_html__( 'Display', 'ssc' ), 'selector' => '.btn-search:hover'),
                                    array('property' => 'word-break', 'label' => esc_html__( 'Word Break', 'ssc' ), 'selector' => '.btn-search:hover'),
                                    array('property' => 'margin', 'label' => esc_html__( 'Margin', 'ssc' ), 'selector' => '.btn-search:hover'),
                                    array('property' => 'padding', 'label' => esc_html__( 'Padding', 'ssc' ), 'selector' => '.btn-search:hover'),
                                    array('property' => 'border', 'label' => esc_html__( 'Border', 'ssc' ), 'selector' => '.btn-search:hover'),
                                    array('property' => 'border-radius', 'label' => esc_html__( 'Border Radius', 'ssc' ), 'selector' => '.btn-search:hover'),
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

function ssc_babe_search_shortcode( $atts, $content = null ){
	extract( shortcode_atts( array(
		'title'             => '',
		'date_from_label'      => '',
		'date_to_label'      => '',
		'guests_label'      => '',
		'guest_text'      => '',
		'guests_text'      => '',
		'button_title'      => '',
		'button_svg'      => '',
		'el_class' => '',

	),
		$atts ) );

	$wrp_classes = apply_filters( 'kc-el-class', $atts );

//	wp_localize_script( 'babe-js', 'babe_lst', array(
//			'drp_date_format' => 'd MMMM',
//		)
//	);

	$form_settings = array(
		'form_class' => 'active',
		'date_from_label' => $date_from_label,
		'date_to_label' => $date_to_label,
		'guests_label' => $guests_label,
		'guest_text' => $guest_text,
		'guests_text' => $guests_text,
		'button_title' => $button_title,
	);

	if( '' !== $button_svg) {
		$button_svg = ssc_process_media( $button_svg );
		$form_settings['button_icon'] = $button_svg;
	}

	return '<div class="ssc-babe-form ' . implode( ' ', $wrp_classes ) . '">' . Atiframebuilder_Room::render_form( $title, $form_settings  ) . '</div>';
}

add_shortcode( 'ssc_babe_search', 'ssc_babe_search_shortcode' );