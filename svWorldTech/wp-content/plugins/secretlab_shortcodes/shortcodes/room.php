<?php
add_action( 'init', 'ssc_room_params', 99 );

/**
 * Additional functions
 */

function ssc_room_params() {
	global $kc;
	$kc->add_map( array(
		'ssc_room' => array(
			'name'         => esc_html__( 'Room Grid', 'ssc' ),
			'description'  => esc_html__( 'It displays rooms by room type with unlimited design templates and colors', 'ssc' ),
			'icon'         => 'kc-icon-box ssc-icon-27',
			'is_container' => true,
			'category'     => 'SecretLab',
			'css_box'      => true,
			'params'       => array(
				esc_html__( 'General', 'ssc' ) => array(
					array(
						'name'    => 'template',
						'label'   => esc_html__( 'Select Template', 'ssc' ),
						'type'    => 'radio_image',  // USAGE TEXT TYPE
						'options' => array(
							'1' => SSC_URL . 'images/room1.jpg',
//                            '20'	=> SSC_URL . 'images/post20.jpg',

						),
						'value'   => '1', // remove this if you do not need a default content
					),
					array(
						'name'        => 'item_id',
						'type'        => 'select',
						'label'       => esc_html__( 'Rooms to show', 'ssc' ),
						'options'     => ssc_get_rooms_select_options(),
						'description' => __( ' Select room to show.', 'ssc' )
					),
					array(
						'name'        => 'limit_words',
						'label'       => esc_html__( 'Limit words For Description', 'ssc' ),
						'type'        => 'text',
						'value'       => '10',
						'description' => esc_html__( 'Set -1 if you don\'t want to show the description.', 'ssc' ),
					),
					array(
						'name'        => 'limit_t_lines',
						'label'       => esc_html__( 'Limit Lines For Title', 'ssc' ),
						'type'        => 'text',
						'value'       => '2',
						'description' => esc_html__( 'Set 0 if you dont want to limit the title.  Set -1 if you don\'t want to show the title.', 'ssc' ),
					),
					array(
						'name'        => 'show_thumb',
						'label'       => esc_html__( 'Show Thumbnails', 'ssc' ),
						'type'        => 'toggle',
						'value'       => 'yes',
						'description' => esc_html__( 'Display thumbnails of room in room items.', 'ssc' ),
					),
					array(
						'type'        => 'dropdown',
						'label'       => esc_html__( 'Thumbnails size', 'ssc' ),
						'name'        => 'thumb_size',
						'description' => esc_html__( 'Set the thumbnails size.', 'ssc' ),
//                            'value'       	=> 'full',
						'options'     => ssc_get_image_sizes(),
						'relation'    => array(
							'parent'    => 'show_thumb',
							'show_when' => 'yes'
						)
					),
					array(
						'type'        => 'text',
						'label'       => esc_html__( 'Custom Thumbnails size', 'ssc' ),
						'name'        => 'custom_thumb_size',
						'description' => esc_html__( 'Set the thumbnails size: "thumbnail", "medium", "large", "full" or "400x200".', 'ssc' ),
//                            'value'       	=> 'full',
						'relation'    => array(
							'parent'    => 'thumb_size',
							'show_when' => 'custom_size'
						)
					),

					array(
						'name'        => 'monocolored',
						'label'       => __( ' Grayscale Effect', 'ssc' ),
						'type'        => 'toggle',
						'description' => __( ' Enable a grayscale effect for images. Images become colorful on hover.', 'ssc' ),
						'value'       => 'no',
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
							'show_input' => true
						),
						'relation'    => array(
							'parent'    => 'monocolored',
							'show_when' => 'yes'
						),
						'description' => '0-100%'
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
						'description' => esc_html__( 'Select the click event when users click on an image.', 'ssc' )
					),
					array(
						'name'        => 'show_price',
						'label'       => esc_html__( 'Show Price', 'ssc' ),
						'type'        => 'toggle',
						'value'       => 'yes',
						'description' => esc_html__( 'Display price of room in room items.', 'ssc' ),
					),
					array(
						'name'        => 'show_rating',
						'label'       => esc_html__( 'Show Rating', 'ssc' ),
						'type'        => 'toggle',
						'value'       => 'yes',
						'description' => esc_html__( 'Display rating of room in room items.', 'ssc' ),
					),
					array(
						'name'        => 'show_terms',
						'type'        => 'toggle',
						'label'       => esc_html__( 'Show Terms', 'ssc' ),
						'value'       => 'yes',
						'description' => esc_html__( 'Display rating of room in room items.', 'ssc' ),
					),
					array(
						'name'        => 'show_book_button',
						'label'       => esc_html__( 'Show Book button', 'ssc' ),
						'type'        => 'toggle',
						'value'       => 'yes',
						'description' => esc_html__( 'Display Book button in room items.', 'ssc' ),
					),
					array(
						'name'     => 'book_text',
						'label'    => esc_html__( 'Book text', 'ssc' ),
						'type'     => 'text',
						'value'    => esc_html__( 'Book room now', 'ssc' ),
						'relation' => array(
							'parent'    => 'show_add',
							'show_when' => 'yes'
						)
					),
					array(
						'name'        => 'el_class',
						'label'       => esc_html__( 'Extra Class Name', 'ssc' ),
						'type'        => 'text',
						'description' => esc_html__( 'If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your CSS file.', 'ssc' ),
						'admin_label' => true,
						'value'       => ''
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
								'screens' => 'any,999,768,667,479',
								'Wrapper' => array(
									array('property' => 'background'),
									array('property' => 'margin', 'label' => esc_html__( 'Margin', 'ssc' )),
									array('property' => 'padding', 'label' => esc_html__( 'Padding', 'ssc' )),
									array('property' => 'border', 'label' => esc_html__( 'Border', 'ssc' )),
									array('property' => 'border-radius', 'label' => esc_html__( 'Border Radius', 'ssc' )),
									array('property' => 'width', 'label' => esc_html__( 'Width', 'ssc' )),
									array('property' => 'height', 'label' => esc_html__( 'Height', 'ssc' )),
									array('property' => 'float', 'label' => esc_html__( 'Float', 'ssc' )),
									array('property' => 'display', 'label' => esc_html__( 'Display', 'ssc' )),
									array('property' => 'box-shadow', 'label' => esc_html__( 'Box Shadow', 'ssc' )),
									array('property' => 'opacity', 'label' => esc_html__( 'Opacity', 'ssc' )),
								),
								// --> Box
								'Box' => array(
									array('property' => 'background', 'selector' => '.room-item'),
									array('property' => 'text-align', 'label' => esc_html__( 'Text Align', 'ssc' ), 'selector' => '.room-item'),
									array('property' => 'margin', 'label' => esc_html__( 'Margin', 'ssc' ), 'selector' => '.room-item'),
									array('property' => 'padding', 'label' => esc_html__( 'Padding', 'ssc' ), 'selector' => '.room-item'),
									array('property' => 'border', 'label' => esc_html__( 'Border', 'ssc' ), 'selector' => '.room-item'),
									array('property' => 'border-radius', 'label' => esc_html__( 'Border Radius', 'ssc' ), 'selector' => '.room-item'),
									array('property' => 'width', 'label' => esc_html__( 'Width', 'ssc' ), 'selector' => '.room-item'),
									array('property' => 'height', 'label' => esc_html__( 'Height', 'ssc' ), 'selector' => '.room-item'),
									array('property' => 'float', 'label' => esc_html__( 'Float', 'ssc' ), 'selector' => '.room-item'),
									array('property' => 'display', 'label' => esc_html__( 'Display', 'ssc' ), 'selector' => '.room-item'),
									array('property' => 'box-shadow', 'label' => esc_html__( 'Box Shadow', 'ssc' ), 'selector' => '.room-item'),
									array('property' => 'opacity', 'label' => esc_html__( 'Opacity', 'ssc' ), 'selector' => '.room-item'),
								),
								'Box Inside' => array(
									array('property' => 'background', 'selector' => '.room-item .room-info-wrapper'),
									array('property' => 'margin', 'label' => esc_html__( 'Margin', 'ssc' ), 'selector' => '.room-item .room-info-wrapper'),
									array('property' => 'padding', 'label' => esc_html__( 'Padding', 'ssc' ), 'selector' => '.room-item .room-info-wrapper'),
									array('property' => 'border', 'label' => esc_html__( 'Border', 'ssc' ), 'selector' => '.room-item .room-info-wrapper'),
									array('property' => 'border-radius', 'label' => esc_html__( 'Border Radius', 'ssc' ), 'selector' => '.room-item .room-info-wrapper'),
									array('property' => 'width', 'label' => esc_html__( 'Width', 'ssc' ), 'selector' => '.room-item .room-info-wrapper'),
									array('property' => 'max-width', 'label' => esc_html__( 'Max-Width', 'ssc' ), 'selector' => '.room-item .room-info-wrapper'),
									array('property' => 'height', 'label' => esc_html__( 'Height', 'ssc' ), 'selector' => '.room-item .room-info-wrapper'),
									array('property' => 'float', 'label' => esc_html__( 'Float', 'ssc' ), 'selector' => '.room-item .room-info-wrapper'),
									array('property' => 'display', 'label' => esc_html__( 'Display', 'ssc' ), 'selector' => '.room-item .room-info-wrapper'),
									array('property' => 'box-shadow', 'label' => esc_html__( 'Box Shadow', 'ssc' ), 'selector' => '.room-item .room-info-wrapper'),
									array('property' => 'opacity', 'label' => esc_html__( 'Opacity', 'ssc' ), 'selector' => '.room-item .room-info-wrapper'),
								),
								// Image Box
								'Image Box' => array(
									array('property' => 'background', 'selector' => '.room-item .room-img-wrapper'),
									array('property' => 'text-align', 'label' => esc_html__( 'Text Align', 'ssc' ), 'selector' => '.room-item .room-img-wrapper'),
									array('property' => 'margin', 'label' => esc_html__( 'Margin', 'ssc' ), 'selector' => '.room-item .room-img-wrapper'),
									array('property' => 'padding', 'label' => esc_html__( 'Padding', 'ssc' ), 'selector' => '.room-item .room-img-wrapper'),
									array('property' => 'border', 'label' => esc_html__( 'Border', 'ssc' ), 'selector' => '.room-item .room-img-wrapper'),
									array('property' => 'border-radius', 'label' => esc_html__( 'Border Radius', 'ssc' ), 'selector' => '.room-item .room-img-wrapper'),
									array('property' => 'width', 'label' => esc_html__( 'Width', 'ssc' ), 'selector' => '.room-item .room-img-wrapper'),
									array('property' => 'height', 'label' => esc_html__( 'Height', 'ssc' ), 'selector' => '.room-item .room-img-wrapper'),
									array('property' => 'float', 'label' => esc_html__( 'Float', 'ssc' ), 'selector' => '.room-item .room-img-wrapper'),
									array('property' => 'display', 'label' => esc_html__( 'Display', 'ssc' ), 'selector' => '.room-item .room-img-wrapper'),
									array('property' => 'box-shadow', 'label' => esc_html__( 'Box Shadow', 'ssc' ), 'selector' => '.room-item .room-img-wrapper'),
									array('property' => 'opacity', 'label' => esc_html__( 'Opacity', 'ssc' ), 'selector' => '.room-item .room-img-wrapper'),
								),
								// Image
								'Image' => array(
									array('property' => 'background', 'selector' => '.room-item .room-img-wrapper img'),
									array('property' => 'margin', 'label' => esc_html__( 'Margin', 'ssc' ), 'selector' => '.room-item .room-img-wrapper img'),
									array('property' => 'padding', 'label' => esc_html__( 'Padding', 'ssc' ), 'selector' => '.room-item .room-img-wrapper img'),
									array('property' => 'border', 'label' => esc_html__( 'Border', 'ssc' ), 'selector' => '.room-item .room-img-wrapper img'),
									array('property' => 'border-radius', 'label' => esc_html__( 'Border Radius', 'ssc' ), 'selector' => '.room-item .room-img-wrapper img'),
									array('property' => 'width', 'label' => esc_html__( 'Width', 'ssc' ), 'selector' => '.room-item .room-img-wrapper img'),
									array('property' => 'max-width', 'label' => esc_html__( 'Max Width', 'ssc' ), 'selector' => '.room-item .room-img-wrapper img'),
									array('property' => 'height', 'label' => esc_html__( 'Height', 'ssc' ), 'selector' => '.room-item .room-img-wrapper img'),
									array('property' => 'float', 'label' => esc_html__( 'Float', 'ssc' ), 'selector' => '.room-item .room-img-wrapper img'),
									array('property' => 'display', 'label' => esc_html__( 'Display', 'ssc' ), 'selector' => '.room-item .room-img-wrapper img'),
									array('property' => 'box-shadow', 'label' => esc_html__( 'Box Shadow', 'ssc' ), 'selector' => '.room-item .room-img-wrapper img'),
									array('property' => 'opacity', 'label' => esc_html__( 'Opacity', 'ssc' ), 'selector' => '.room-item .room-img-wrapper img'),
								),
								'Star Rating' => array(
									array('property' => 'color', 'label' => esc_html__('Color', 'ssc' ), 'selector' => '.room-rating .star'),
									array('property' => 'background-color', 'label' => esc_html__('Background Color', 'ssc' ), 'selector' => '.room-rating .star'),
									array('property' => 'font-size', 'label' => esc_html__('Font Size', 'ssc' ), 'selector' => '.room-rating .star'),
									array('property' => 'display', 'label' => esc_html__( 'Display', 'ssc' ), 'selector' => '.room-rating .star'),
									array('property' => 'float', 'label' => esc_html__( 'Float', 'ssc' ), 'selector' => '.room-rating .star'),
									array('property' => 'border', 'label' => esc_html__('Border', 'ssc' ), 'selector' => '.room-rating .star'),
									array('property' => 'border-radius', 'label' => esc_html__( 'Border Radius', 'ssc' ), 'selector' => '.room-rating .star'),
									array('property' => 'margin', 'label' => esc_html__('Margin', 'ssc' ), 'selector' => '.room-rating .star'),
									array('property' => 'padding', 'label' =>esc_html__( 'Padding', 'ssc' ), 'selector' => '.room-rating .star')
								),
								'Room data box' => array(
									array('property' => 'background', 'selector' => '.room-info'),
									array('property' => 'text-align', 'label' => esc_html__('Text Align', 'ssc' ), 'selector' => '.room-info'),
									array('property' => 'vertical-align', 'label' => 'Vertical Align', 'selector' => '.room-info'),
									array('property' => 'margin', 'label' => esc_html__( 'Margin', 'ssc' ), 'selector' => '.room-info'),
									array('property' => 'padding', 'label' => esc_html__( 'Padding', 'ssc' ), 'selector' => '.room-info'),
									array('property' => 'border', 'label' => esc_html__( 'Border', 'ssc' ), 'selector' => '.room-info'),
									array('property' => 'border-radius', 'label' => esc_html__( 'Border Radius', 'ssc' ), 'selector' => '.room-info'),
									array('property' => 'width', 'label' => esc_html__( 'Width', 'ssc' ), 'selector' => '.room-info'),
									array('property' => 'height', 'label' => esc_html__( 'Height', 'ssc' ), 'selector' => '.room-info'),
									array('property' => 'text-align', 'label' => esc_html__('Text Align', 'ssc' ), 'selector' => '.room-info'),
									array('property' => 'float', 'label' => esc_html__( 'Float', 'ssc' ), 'selector' => '.room-info'),
									array('property' => 'display', 'label' => esc_html__( 'Display', 'ssc' ), 'selector' => '.room-info'),
									array('property' => 'box-shadow', 'label' => esc_html__( 'Box Shadow', 'ssc' ), 'selector' => '.room-info'),
									array('property' => 'opacity', 'label' => esc_html__( 'Opacity', 'ssc' ), 'selector' => '.room-info'),
								),
								'SVG' => array(
									array('property' => 'fill', 'label' => esc_html__( 'Color', 'ssc' ), 'selector' => '.isv svg'),
									array('property' => 'background', 'selector' => '.isv'),
									array('property' => 'width', 'label' => esc_html__( 'Width', 'ssc' ), 'selector' => '.isv'),
									array('property' => 'height', 'label' => esc_html__( 'Height', 'ssc' ), 'selector' => '.isv'),
									array('property' => 'float', 'label' => esc_html__( 'Float', 'ssc' ), 'selector' => '.isv'),
									array('property' => 'display', 'label' => esc_html__( 'Display', 'ssc' ), 'selector' => '.isv'),
									array('property' => 'margin', 'label' => esc_html__('Margin', 'ssc' ), 'selector' => '.isv'),
									array('property' => 'padding', 'label' =>esc_html__( 'Padding', 'ssc' ), 'selector' => '.isv')
								),
								'Room data' => array(
									array('property' => 'background', 'selector' => '.rdata'),
									array('property' => 'color', 'label' => esc_html__( 'Color', 'ssc' ), 'selector' => '.rdata'),
									array('property' => 'text-align', 'label' => esc_html__('Text Align', 'ssc' ), 'selector' => '.rdata'),
									array('property' => 'vertical-align', 'label' => 'Vertical Align', 'selector' => '.rdata'),
									array('property' => 'margin', 'label' => esc_html__( 'Margin', 'ssc' ), 'selector' => '.rdata'),
									array('property' => 'padding', 'label' => esc_html__( 'Padding', 'ssc' ), 'selector' => '.rdata'),
									array('property' => 'border', 'label' => esc_html__( 'Border', 'ssc' ), 'selector' => '.rdata'),
									array('property' => 'border-radius', 'label' => esc_html__( 'Border Radius', 'ssc' ), 'selector' => '.rdata'),
									array('property' => 'width', 'label' => esc_html__( 'Width', 'ssc' ), 'selector' => '.rdata'),
									array('property' => 'height', 'label' => esc_html__( 'Height', 'ssc' ), 'selector' => '.rdata'),
									array('property' => 'text-align', 'label' => esc_html__('Text Align', 'ssc' ), 'selector' => '.rdata'),
									array('property' => 'float', 'label' => esc_html__( 'Float', 'ssc' ), 'selector' => '.rdata'),
									array('property' => 'display', 'label' => esc_html__( 'Display', 'ssc' ), 'selector' => '.rdata'),
									array('property' => 'box-shadow', 'label' => esc_html__( 'Box Shadow', 'ssc' ), 'selector' => '.rdata'),
									array('property' => 'opacity', 'label' => esc_html__( 'Opacity', 'ssc' ), 'selector' => '.rdata'),
								),
								// Content Box
								'Content Box' => array(
									array('property' => 'color', 'label' => esc_html__( 'Color', 'ssc' ), 'selector' => '.room-item .room-description'),
									array('property' => 'font-size', 'label' => esc_html__( 'Font Size', 'ssc' ), 'selector' => '.room-item .room-description'),
									array('property' => 'line-height', 'label' => esc_html__( 'Line Height', 'ssc' ), 'selector' => '.room-item .room-description'),
									array('property' => 'font-weight', 'label' => esc_html__( 'Font Weight', 'ssc' ), 'selector' => '.room-item .room-description'),
									array('property' => 'font-style', 'label' => esc_html__( 'Font Style', 'ssc' ), 'selector' => '.room-item .room-description'),
									array('property' => 'font-family', 'label' => esc_html__( 'Font Family', 'ssc' ), 'selector' => '.room-item .room-description'),
									array('property' => 'text-align', 'label' => esc_html__( 'Text Align', 'ssc' ), 'selector' => '.room-item .room-description'),
									array('property' => 'text-shadow', 'label' => esc_html__( 'Text Shadow', 'ssc' ), 'selector' => '.room-item .room-description'),
									array('property' => 'text-transform', 'label' => esc_html__( 'Text Transform', 'ssc' ), 'selector' => '.room-item .room-description'),
									array('property' => 'text-decoration', 'label' => esc_html__( 'Text Decoration', 'ssc' ), 'selector' => '.room-item .room-description'),
									array('property' => 'letter-spacing', 'label' => esc_html__( 'Letter Spacing', 'ssc' ), 'selector' => '.room-item .room-description'),
									array('property' => 'overflow', 'label' => esc_html__( 'Overflow', 'ssc' ), 'selector' => '.room-item .room-description'),
									array('property' => 'word-break', 'label' => esc_html__( 'Word Break', 'ssc' ), 'selector' => '.room-item .room-description'),
									array('property' => 'background', 'selector' => '.room-item .room-description'),
									array('property' => 'text-align', 'label' => esc_html__('Text Align', 'ssc' ), 'selector' => '.room-item .room-description'),
									array('property' => 'vertical-align', 'label' => 'Vertical Align', 'selector' => '.room-item .room-description'),
									array('property' => 'margin', 'label' => esc_html__( 'Margin', 'ssc' ), 'selector' => '.room-item .room-description'),
									array('property' => 'padding', 'label' => esc_html__( 'Padding', 'ssc' ), 'selector' => '.room-item .room-description'),
									array('property' => 'border', 'label' => esc_html__( 'Border', 'ssc' ), 'selector' => '.room-item .room-description'),
									array('property' => 'border-radius', 'label' => esc_html__( 'Border Radius', 'ssc' ), 'selector' => '.room-item .room-description'),
									array('property' => 'width', 'label' => esc_html__( 'Width', 'ssc' ), 'selector' => '.room-item .room-description'),
									array('property' => 'height', 'label' => esc_html__( 'Height', 'ssc' ), 'selector' => '.room-item .room-description'),
									array('property' => 'text-align', 'label' => esc_html__('Text Align', 'ssc' ), 'selector' => '.room-item .room-description'),
									array('property' => 'float', 'label' => esc_html__( 'Float', 'ssc' ), 'selector' => '.room-item .room-description'),
									array('property' => 'display', 'label' => esc_html__( 'Display', 'ssc' ), 'selector' => '.room-item .room-description'),
									array('property' => 'box-shadow', 'label' => esc_html__( 'Box Shadow', 'ssc' ), 'selector' => '.room-item .room-description'),
									array('property' => 'opacity', 'label' => esc_html__( 'Opacity', 'ssc' ), 'selector' => '.room-item .room-description'),
								),
								// Title
								'Title' => array(
									array('property' => 'background', 'selector' => '.room-item .room-title .title'),
									array('property' => 'color', 'label' => esc_html__( 'Color', 'ssc' ), 'selector' => '.room-item .room-title .title'),
									array('property' => 'font-size', 'label' => esc_html__( 'Font Size', 'ssc' ), 'selector' => '.room-item .room-title .title'),
									array('property' => 'line-height', 'label' => esc_html__( 'Line Height', 'ssc' ), 'selector' => '.room-item .room-title .title'),
									array('property' => 'font-weight', 'label' => esc_html__( 'Font Weight', 'ssc' ), 'selector' => '.room-item .room-title .title'),
									array('property' => 'font-style', 'label' => esc_html__( 'Font Style', 'ssc' ), 'selector' => '.room-item .room-title .title'),
									array('property' => 'font-family', 'label' => esc_html__( 'Font Family', 'ssc' ), 'selector' => '.room-item .room-title .title'),
									array('property' => 'text-align', 'label' => esc_html__( 'Text Align', 'ssc' ), 'selector' => '.room-item .room-title .title'),
									array('property' => 'text-shadow', 'label' => esc_html__( 'Text Shadow', 'ssc' ), 'selector' => '.room-item .room-title .title'),
									array('property' => 'text-transform', 'label' => esc_html__( 'Text Transform', 'ssc' ), 'selector' => '.room-item .room-title .title'),
									array('property' => 'text-decoration', 'label' => esc_html__( 'Text Decoration', 'ssc' ), 'selector' => '.room-item .room-title .title'),
									array('property' => 'letter-spacing', 'label' => esc_html__( 'Letter Spacing', 'ssc' ), 'selector' => '.room-item .room-title .title'),
									array('property' => 'overflow', 'label' => esc_html__( 'Overflow', 'ssc' ), 'selector' => '.room-item .room-title .title'),
									array('property' => 'float', 'label' => esc_html__( 'Float', 'ssc' ), 'selector' => '.room-item .room-title .title'),
									array('property' => 'display', 'label' => esc_html__( 'Display', 'ssc' ), 'selector' => '.room-item .room-title .title'),
									array('property' => 'word-break', 'label' => esc_html__( 'Word Break', 'ssc' ), 'selector' => '.room-item .room-title .title'),
									array('property' => 'margin', 'label' => esc_html__( 'Margin', 'ssc' ), 'selector' => '.room-item .room-title .title'),
									array('property' => 'padding', 'label' => esc_html__( 'Padding', 'ssc' ), 'selector' => '.room-item .room-title .title'),
									array('property' => 'border', 'label' => esc_html__( 'Border', 'ssc' ), 'selector' => '.room-item .room-title .title'),
									array('property' => 'border-radius', 'label' => esc_html__( 'Border Radius', 'ssc' ), 'selector' => '.room-item .room-title .title'),
								),
								// Price
								'Price' => array(
									array('property' => 'color', 'label' => esc_html__( 'Color', 'ssc' ), 'selector' => '.room-item .room-price'),
									array('property' => 'background', 'selector' => '.room-item .room-price'),
									array('property' => 'margin', 'label' => esc_html__( 'Margin', 'ssc' ), 'selector' => '.room-item .room-price'),
									array('property' => 'padding', 'label' => esc_html__( 'Padding', 'ssc' ), 'selector' => '.room-item .room-price'),
									array('property' => 'border', 'label' => esc_html__( 'Border', 'ssc' ), 'selector' => '.room-item .room-price'),
									array('property' => 'border-radius', 'label' => esc_html__( 'Border Radius', 'ssc' ), 'selector' => '.room-item .room-price'),
									array('property' => 'width', 'label' => esc_html__( 'Width', 'ssc' ), 'selector' => '.room-item .room-price'),
									array('property' => 'height', 'label' => esc_html__( 'Height', 'ssc' ), 'selector' => '.room-item .room-price'),
//                                    array('property' => 'float', 'label' => esc_html__( 'Float', 'ssc' ), 'selector' => '.room-item .room-price'),
									array('property' => 'display', 'label' => esc_html__( 'Display', 'ssc' ), 'selector' => '.room-item .room-price'),
									array('property' => 'box-shadow', 'label' => esc_html__( 'Box Shadow', 'ssc' ), 'selector' => '.room-item .room-price'),
									array('property' => 'opacity', 'label' => esc_html__( 'Opacity', 'ssc' ), 'selector' => '.room-item .room-price'),
									array('property' => 'font-size', 'label' => esc_html__( 'Font Size', 'ssc' ), 'selector' => '.room-item .room-price'),
									array('property' => 'line-height', 'label' => esc_html__( 'Line Height', 'ssc' ), 'selector' => '.room-item .room-price'),
									array('property' => 'font-weight', 'label' => esc_html__( 'Font Weight', 'ssc' ), 'selector' => '.room-item .room-price'),
									array('property' => 'font-style', 'label' => esc_html__( 'Font Style', 'ssc' ), 'selector' => '.room-item .room-price'),
									array('property' => 'font-family', 'label' => esc_html__( 'Font Family', 'ssc' ), 'selector' => '.room-item .room-price'),
									array('property' => 'text-align', 'label' => esc_html__( 'Text Align', 'ssc' ), 'selector' => '.room-item .room-price'),
									array('property' => 'text-shadow', 'label' => esc_html__( 'Text Shadow', 'ssc' ), 'selector' => '.room-item .room-price'),
									array('property' => 'text-transform', 'label' => esc_html__( 'Text Transform', 'ssc' ), 'selector' => '.room-item .room-price'),
									array('property' => 'text-decoration', 'label' => esc_html__( 'Text Decoration', 'ssc' ), 'selector' => '.room-item .room-price'),
									array('property' => 'letter-spacing', 'label' => esc_html__( 'Letter Spacing', 'ssc' ), 'selector' => '.room-item .room-price'),
									array('property' => 'overflow', 'label' => esc_html__( 'Overflow', 'ssc' ), 'selector' => '.room-item .room-price'),
									array('property' => 'word-break', 'label' => esc_html__( 'Word Break', 'ssc' ), 'selector' => '.room-item .room-price'),
								),
								// On sale Price
								'Removed Price' => array(
									array('property' => 'color', 'label' => esc_html__( 'Color', 'ssc' ), 'selector' => '.room-item .item_info_price_old'),
									array('property' => 'background', 'selector' => '.room-item .item_info_price_old'),
									array('property' => 'margin', 'label' => esc_html__( 'Margin', 'ssc' ), 'selector' => '.room-item .item_info_price_old'),
									array('property' => 'padding', 'label' => esc_html__( 'Padding', 'ssc' ), 'selector' => '.room-item .item_info_price_old'),
									array('property' => 'border', 'label' => esc_html__( 'Border', 'ssc' ), 'selector' => '.room-item .item_info_price_old'),
									array('property' => 'border-radius', 'label' => esc_html__( 'Border Radius', 'ssc' ), 'selector' => '.room-item .item_info_price_old'),
									array('property' => 'width', 'label' => esc_html__( 'Width', 'ssc' ), 'selector' => '.room-item .item_info_price_old'),
									array('property' => 'height', 'label' => esc_html__( 'Height', 'ssc' ), 'selector' => '.room-item .item_info_price_old'),
//                                    array('property' => 'float', 'label' => esc_html__( 'Float', 'ssc' ), 'selector' => '.room-item .item_info_price_old'),
									array('property' => 'display', 'label' => esc_html__( 'Display', 'ssc' ), 'selector' => '.room-item .item_info_price_old'),
									array('property' => 'box-shadow', 'label' => esc_html__( 'Box Shadow', 'ssc' ), 'selector' => '.room-item .item_info_price_old'),
									array('property' => 'opacity', 'label' => esc_html__( 'Opacity', 'ssc' ), 'selector' => '.room-item .item_info_price_old'),
									array('property' => 'font-size', 'label' => esc_html__( 'Font Size', 'ssc' ), 'selector' => '.room-item .item_info_price_old'),
									array('property' => 'line-height', 'label' => esc_html__( 'Line Height', 'ssc' ), 'selector' => '.room-item .item_info_price_old'),
									array('property' => 'font-weight', 'label' => esc_html__( 'Font Weight', 'ssc' ), 'selector' => '.room-item .item_info_price_old'),
									array('property' => 'font-style', 'label' => esc_html__( 'Font Style', 'ssc' ), 'selector' => '.room-item .item_info_price_old'),
									array('property' => 'font-family', 'label' => esc_html__( 'Font Family', 'ssc' ), 'selector' => '.room-item .item_info_price_old'),
									array('property' => 'text-align', 'label' => esc_html__( 'Text Align', 'ssc' ), 'selector' => '.room-item .item_info_price_old'),
									array('property' => 'text-shadow', 'label' => esc_html__( 'Text Shadow', 'ssc' ), 'selector' => '.room-item .item_info_price_old'),
									array('property' => 'text-transform', 'label' => esc_html__( 'Text Transform', 'ssc' ), 'selector' => '.room-item .item_info_price_old'),
									array('property' => 'text-decoration', 'label' => esc_html__( 'Text Decoration', 'ssc' ), 'selector' => '.room-item .item_info_price_old'),
									array('property' => 'letter-spacing', 'label' => esc_html__( 'Letter Spacing', 'ssc' ), 'selector' => '.room-item .item_info_price_old'),
									array('property' => 'overflow', 'label' => esc_html__( 'Overflow', 'ssc' ), 'selector' => '.room-item .item_info_price_old'),
									array('property' => 'word-break', 'label' => esc_html__( 'Word Break', 'ssc' ), 'selector' => '.room-item .item_info_price_old'),
								),
								'Actual Price' => array(
									array('property' => 'color', 'label' => esc_html__( 'Color', 'ssc' ), 'selector' => '.room-item .room-price-new'),
									array('property' => 'background', 'selector' => '.room-item .room-price-new'),
									array('property' => 'margin', 'label' => esc_html__( 'Margin', 'ssc' ), 'selector' => '.room-item .room-price-new'),
									array('property' => 'padding', 'label' => esc_html__( 'Padding', 'ssc' ), 'selector' => '.room-item .room-price-new'),
									array('property' => 'border', 'label' => esc_html__( 'Border', 'ssc' ), 'selector' => '.room-item .room-price-new'),
									array('property' => 'border-radius', 'label' => esc_html__( 'Border Radius', 'ssc' ), 'selector' => '.room-item .room-price-new'),
									array('property' => 'width', 'label' => esc_html__( 'Width', 'ssc' ), 'selector' => '.room-item .room-price-new'),
									array('property' => 'height', 'label' => esc_html__( 'Height', 'ssc' ), 'selector' => '.room-item .room-price-new'),
//                                    array('property' => 'float', 'label' => esc_html__( 'Float', 'ssc' ), 'selector' => '.room-item .room-price-new'),
									array('property' => 'display', 'label' => esc_html__( 'Display', 'ssc' ), 'selector' => '.room-item .room-price-new'),
									array('property' => 'box-shadow', 'label' => esc_html__( 'Box Shadow', 'ssc' ), 'selector' => '.room-item .room-price-new'),
									array('property' => 'opacity', 'label' => esc_html__( 'Opacity', 'ssc' ), 'selector' => '.room-item .room-price-new'),
									array('property' => 'font-size', 'label' => esc_html__( 'Font Size', 'ssc' ), 'selector' => '.room-item .room-price-new'),
									array('property' => 'line-height', 'label' => esc_html__( 'Line Height', 'ssc' ), 'selector' => '.room-item .room-price-new'),
									array('property' => 'font-weight', 'label' => esc_html__( 'Font Weight', 'ssc' ), 'selector' => '.room-item .room-price-new'),
									array('property' => 'font-style', 'label' => esc_html__( 'Font Style', 'ssc' ), 'selector' => '.room-item .room-price-new'),
									array('property' => 'font-family', 'label' => esc_html__( 'Font Family', 'ssc' ), 'selector' => '.room-item .room-price-new'),
									array('property' => 'text-align', 'label' => esc_html__( 'Text Align', 'ssc' ), 'selector' => '.room-item .room-price-new'),
									array('property' => 'text-shadow', 'label' => esc_html__( 'Text Shadow', 'ssc' ), 'selector' => '.room-item .room-price-new'),
									array('property' => 'text-transform', 'label' => esc_html__( 'Text Transform', 'ssc' ), 'selector' => '.room-item .room-price-new'),
									array('property' => 'text-decoration', 'label' => esc_html__( 'Text Decoration', 'ssc' ), 'selector' => '.room-item .room-price-new'),
									array('property' => 'letter-spacing', 'label' => esc_html__( 'Letter Spacing', 'ssc' ), 'selector' => '.room-item .room-price-new'),
									array('property' => 'overflow', 'label' => esc_html__( 'Overflow', 'ssc' ), 'selector' => '.room-item .room-price-new'),
									array('property' => 'word-break', 'label' => esc_html__( 'Word Break', 'ssc' ), 'selector' => '.room-item .room-price-new'),
								),
								// Book button
								'Book button' => array(
									array('property' => 'background', 'selector' => '.room-item .room-book-button'),
									array('property' => 'color', 'label' => esc_html__( 'Color', 'ssc' ), 'selector' => '.room-item .room-book-button'),
									array('property' => 'font-size', 'label' => esc_html__( 'Font Size', 'ssc' ), 'selector' => '.room-item .room-book-button'),
									array('property' => 'line-height', 'label' => esc_html__( 'Line Height', 'ssc' ), 'selector' => '.room-item .room-book-button'),
									array('property' => 'font-weight', 'label' => esc_html__( 'Font Weight', 'ssc' ), 'selector' => '.room-item .room-book-button'),
									array('property' => 'font-style', 'label' => esc_html__( 'Font Style', 'ssc' ), 'selector' => '.room-item .room-book-button'),
									array('property' => 'font-family', 'label' => esc_html__( 'Font Family', 'ssc' ), 'selector' => '.room-item .room-book-button'),
									array('property' => 'text-align', 'label' => esc_html__( 'Text Align', 'ssc' ), 'selector' => '.room-item .room-book-button'),
									array('property' => 'text-shadow', 'label' => esc_html__( 'Text Shadow', 'ssc' ), 'selector' => '.room-item .room-book-button'),
									array('property' => 'box-shadow', 'label' => esc_html__( 'Box Shadow', 'ssc' ), 'selector' => '.room-item .room-book-button'),
									array('property' => 'text-transform', 'label' => esc_html__( 'Text Transform', 'ssc' ), 'selector' => '.room-item .room-book-button'),
									array('property' => 'text-decoration', 'label' => esc_html__( 'Text Decoration', 'ssc' ), 'selector' => '.room-item .room-book-button'),
									array('property' => 'letter-spacing', 'label' => esc_html__( 'Letter Spacing', 'ssc' ), 'selector' => '.room-item .room-book-button'),
									array('property' => 'display', 'label' => esc_html__( 'Display', 'ssc' ), 'selector' => '.room-item .room-book-button'),
									array('property' => 'float', 'label' => esc_html__( 'Float', 'ssc' ), 'selector' => '.room-item .room-book-button'),
									array('property' => 'overflow', 'label' => esc_html__( 'Overflow', 'ssc' ), 'selector' => '.room-item .room-book-button'),
									array('property' => 'word-break', 'label' => esc_html__( 'Word Break', 'ssc' ), 'selector' => '.room-item .room-book-button'),
									array('property' => 'margin', 'label' => esc_html__( 'Margin', 'ssc' ), 'selector' => '.room-item .room-book-button'),
									array('property' => 'padding', 'label' => esc_html__( 'Padding', 'ssc' ), 'selector' => '.room-item .room-book-button'),
									array('property' => 'border', 'label' => esc_html__( 'Border', 'ssc' ), 'selector' => '.room-item .room-book-button'),
									array('property' => 'border-radius', 'label' => esc_html__( 'Border Radius', 'ssc' ), 'selector' => '.room-item .room-book-button')
								),
								'Icon Box Wrapper' => array(
									array('property' => 'background', 'selector' => '.room-item .atiframebuilder-terms-block-inner'),
									array('property' => 'text-align', 'label' => esc_html__('Text Align', 'ssc' ), 'selector' => '.room-item .atiframebuilder-terms-block-inner'),
									array('property' => 'vertical-align', 'label' => 'Vertical Align', 'selector' => '.room-item .atiframebuilder-terms-block-inner'),
									array('property' => 'margin', 'label' => esc_html__( 'Margin', 'ssc' ), 'selector' => '.room-item .atiframebuilder-terms-block-inner'),
									array('property' => 'padding', 'label' => esc_html__( 'Padding', 'ssc' ), 'selector' => '.room-item .atiframebuilder-terms-block-inner'),
									array('property' => 'border', 'label' => esc_html__( 'Border', 'ssc' ), 'selector' => '.room-item .atiframebuilder-terms-block-inner'),
									array('property' => 'border-radius', 'label' => esc_html__( 'Border Radius', 'ssc' ), 'selector' => '.room-item .atiframebuilder-terms-block-inner'),
									array('property' => 'width', 'label' => esc_html__( 'Width', 'ssc' ), 'selector' => '.room-item .atiframebuilder-terms-block-inner'),
									array('property' => 'height', 'label' => esc_html__( 'Height', 'ssc' ), 'selector' => '.room-item .atiframebuilder-terms-block-inner'),
									array('property' => 'text-align', 'label' => esc_html__('Text Align', 'ssc' ), 'selector' => '.room-item .atiframebuilder-terms-block-inner'),
									array('property' => 'float', 'label' => esc_html__( 'Float', 'ssc' ), 'selector' => '.room-item .atiframebuilder-terms-block-inner'),
									array('property' => 'display', 'label' => esc_html__( 'Display', 'ssc' ), 'selector' => '.room-item .atiframebuilder-terms-block-inner'),
									array('property' => 'box-shadow', 'label' => esc_html__( 'Box Shadow', 'ssc' ), 'selector' => '.room-item .atiframebuilder-terms-block-inner'),
									array('property' => 'opacity', 'label' => esc_html__( 'Opacity', 'ssc' ), 'selector' => '.room-item .atiframebuilder-terms-block-inner'),
								),
								'Icon Box' => array(
									array('property' => 'background', 'selector' => '.fic'),
									array('property' => 'text-align', 'label' => esc_html__('Text Align', 'ssc' ), 'selector' => '.fic'),
									array('property' => 'vertical-align', 'label' => 'Vertical Align', 'selector' => '.fic'),
									array('property' => 'margin', 'label' => esc_html__( 'Margin', 'ssc' ), 'selector' => '.fic'),
									array('property' => 'padding', 'label' => esc_html__( 'Padding', 'ssc' ), 'selector' => '.fic'),
									array('property' => 'border', 'label' => esc_html__( 'Border', 'ssc' ), 'selector' => '.fic'),
									array('property' => 'border-radius', 'label' => esc_html__( 'Border Radius', 'ssc' ), 'selector' => '.fic'),
									array('property' => 'width', 'label' => esc_html__( 'Width', 'ssc' ), 'selector' => '.fic'),
									array('property' => 'height', 'label' => esc_html__( 'Height', 'ssc' ), 'selector' => '.fic'),
									array('property' => 'text-align', 'label' => esc_html__('Text Align', 'ssc' ), 'selector' => '.fic'),
									array('property' => 'float', 'label' => esc_html__( 'Float', 'ssc' ), 'selector' => '.fic'),
									array('property' => 'display', 'label' => esc_html__( 'Display', 'ssc' ), 'selector' => '.fic'),
									array('property' => 'box-shadow', 'label' => esc_html__( 'Box Shadow', 'ssc' ), 'selector' => '.fic'),
									array('property' => 'opacity', 'label' => esc_html__( 'Opacity', 'ssc' ), 'selector' => '.fic'),
								),
								'Icon Title' => array(
									array('property' => 'background', 'selector' => '.room-item .atiframebuilder-term-title'),
									array('property' => 'color', 'label' => esc_html__( 'Color', 'ssc' ), 'selector' => '.room-item .atiframebuilder-term-title'),
									array('property' => 'font-size', 'label' => esc_html__( 'Font Size', 'ssc' ), 'selector' => '.room-item .atiframebuilder-term-title'),
									array('property' => 'line-height', 'label' => esc_html__( 'Line Height', 'ssc' ), 'selector' => '.room-item .atiframebuilder-term-title'),
									array('property' => 'font-weight', 'label' => esc_html__( 'Font Weight', 'ssc' ), 'selector' => '.room-item .atiframebuilder-term-title'),
									array('property' => 'font-style', 'label' => esc_html__( 'Font Style', 'ssc' ), 'selector' => '.room-item .atiframebuilder-term-title'),
									array('property' => 'font-family', 'label' => esc_html__( 'Font Family', 'ssc' ), 'selector' => '.room-item .atiframebuilder-term-title'),
									array('property' => 'text-align', 'label' => esc_html__( 'Text Align', 'ssc' ), 'selector' => '.room-item .atiframebuilder-term-title'),
									array('property' => 'text-shadow', 'label' => esc_html__( 'Text Shadow', 'ssc' ), 'selector' => '.room-item .atiframebuilder-term-title'),
									array('property' => 'text-transform', 'label' => esc_html__( 'Text Transform', 'ssc' ), 'selector' => '.room-item .atiframebuilder-term-title'),
									array('property' => 'text-decoration', 'label' => esc_html__( 'Text Decoration', 'ssc' ), 'selector' => '.room-item .atiframebuilder-term-title'),
									array('property' => 'letter-spacing', 'label' => esc_html__( 'Letter Spacing', 'ssc' ), 'selector' => '.room-item .atiframebuilder-term-title'),
									array('property' => 'overflow', 'label' => esc_html__( 'Overflow', 'ssc' ), 'selector' => '.room-item .atiframebuilder-term-title'),
									array('property' => 'float', 'label' => esc_html__( 'Float', 'ssc' ), 'selector' => '.room-item .atiframebuilder-term-title'),
									array('property' => 'display', 'label' => esc_html__( 'Display', 'ssc' ), 'selector' => '.room-item .atiframebuilder-term-title'),
									array('property' => 'word-break', 'label' => esc_html__( 'Word Break', 'ssc' ), 'selector' => '.room-item .atiframebuilder-term-title'),
									array('property' => 'margin', 'label' => esc_html__( 'Margin', 'ssc' ), 'selector' => '.room-item .atiframebuilder-term-title'),
									array('property' => 'padding', 'label' => esc_html__( 'Padding', 'ssc' ), 'selector' => '.room-item .atiframebuilder-term-title'),
									array('property' => 'border', 'label' => esc_html__( 'Border', 'ssc' ), 'selector' => '.room-item .atiframebuilder-term-title'),
									array('property' => 'border-radius', 'label' => esc_html__( 'Border Radius', 'ssc' ), 'selector' => '.room-item .atiframebuilder-term-title'),
								),
								'Icons' => array(
									array('property' => 'background', 'selector' => '.room-item .fic img'),
									array('property' => 'margin', 'label' => esc_html__( 'Margin', 'ssc' ), 'selector' => '.room-item .fic img'),
									array('property' => 'padding', 'label' => esc_html__( 'Padding', 'ssc' ), 'selector' => '.room-item .fic img'),
									array('property' => 'border', 'label' => esc_html__( 'Border', 'ssc' ), 'selector' => '.room-item .fic img'),
									array('property' => 'border-radius', 'label' => esc_html__( 'Border Radius', 'ssc' ), 'selector' => '.room-item .fic img'),
									array('property' => 'width', 'label' => esc_html__( 'Width', 'ssc' ), 'selector' => '.room-item .fic img'),
									array('property' => 'height', 'label' => esc_html__( 'Height', 'ssc' ), 'selector' => '.room-item .fic img'),
									array('property' => 'float', 'label' => esc_html__( 'Float', 'ssc' ), 'selector' => '.room-item .fic img'),
									array('property' => 'display', 'label' => esc_html__( 'Display', 'ssc' ), 'selector' => '.room-item .fic img'),
									array('property' => 'box-shadow', 'label' => esc_html__( 'Box Shadow', 'ssc' ), 'selector' => '.room-item .fic img'),
									array('property' => 'opacity', 'label' => esc_html__( 'Opacity', 'ssc' ), 'selector' => '.room-item .fic img'),
								),
							),
						)
					)
				),
				esc_html__( 'hover', 'ssc' )   => array(
					array(
						'name'        => 'hover-css',
						'label'       => esc_html__( 'Hover', 'ssc' ),
						'type'        => 'css',
						'value'       => '', // remove this if you do not need a default content
						'description' => 'Styles for Hover Condition',
						'options'     => array(
							array(
								'screens' => 'any,999,768,667,479',
								'Wrapper' => array(
									array('property' => 'background'),
									array('property' => 'margin', 'label' => esc_html__( 'Margin', 'ssc' ), 'selector' => '+:hover'),
									array('property' => 'padding', 'label' => esc_html__( 'Padding', 'ssc' ), 'selector' => '+:hover'),
									array('property' => 'border', 'label' => esc_html__( 'Border', 'ssc' ), 'selector' => '+:hover'),
									array('property' => 'border-radius', 'label' => esc_html__( 'Border Radius', 'ssc' ), 'selector' => '+:hover'),
									array('property' => 'width', 'label' => esc_html__( 'Width', 'ssc' ), 'selector' => '+:hover'),
									array('property' => 'height', 'label' => esc_html__( 'Height', 'ssc' ), 'selector' => '+:hover'),
									array('property' => 'float', 'label' => esc_html__( 'Float', 'ssc' ), 'selector' => '+:hover'),
									array('property' => 'display', 'label' => esc_html__( 'Display', 'ssc' ), 'selector' => '+:hover'),
									array('property' => 'box-shadow', 'label' => esc_html__( 'Box Shadow', 'ssc' ), 'selector' => '+:hover'),
									array('property' => 'opacity', 'label' => esc_html__( 'Opacity', 'ssc' ), 'selector' => '+:hover'),
								),
								// --> Box
								'Box' => array(
									array('property' => 'background', 'selector' => '.room-item:hover'),
									array('property' => 'margin', 'label' => esc_html__( 'Margin', 'ssc' ), 'selector' => '.room-item:hover'),
									array('property' => 'padding', 'label' => esc_html__( 'Padding', 'ssc' ), 'selector' => '.room-item:hover'),
									array('property' => 'border', 'label' => esc_html__( 'Border', 'ssc' ), 'selector' => '.room-item:hover'),
									array('property' => 'border-radius', 'label' => esc_html__( 'Border Radius', 'ssc' ), 'selector' => '.room-item:hover'),
									array('property' => 'width', 'label' => esc_html__( 'Width', 'ssc' ), 'selector' => '.room-item:hover'),
									array('property' => 'height', 'label' => esc_html__( 'Height', 'ssc' ), 'selector' => '.room-item:hover'),
									array('property' => 'float', 'label' => esc_html__( 'Float', 'ssc' ), 'selector' => '.room-item:hover'),
									array('property' => 'display', 'label' => esc_html__( 'Display', 'ssc' ), 'selector' => '.room-item:hover'),
									array('property' => 'box-shadow', 'label' => esc_html__( 'Box Shadow', 'ssc' ), 'selector' => '.room-item:hover'),
									array('property' => 'opacity', 'label' => esc_html__( 'Opacity', 'ssc' ), 'selector' => '.room-item:hover'),
								),
								// Box inde the box
								'Box Inside' => array(
									array('property' => 'background', 'selector' => '.room-item .room-info-wrapper:hover'),
									array('property' => 'margin', 'label' => esc_html__( 'Margin', 'ssc' ), 'selector' => '.room-item .room-info-wrapper:hover'),
									array('property' => 'padding', 'label' => esc_html__( 'Padding', 'ssc' ), 'selector' => '.room-item .room-info-wrapper:hover'),
									array('property' => 'border', 'label' => esc_html__( 'Border', 'ssc' ), 'selector' => '.room-item .room-info-wrapper:hover'),
									array('property' => 'border-radius', 'label' => esc_html__( 'Border Radius', 'ssc' ), 'selector' => '.room-item .room-info-wrapper:hover'),
									array('property' => 'width', 'label' => esc_html__( 'Width', 'ssc' ), 'selector' => '.room-item .room-info-wrapper:hover'),
									array('property' => 'height', 'label' => esc_html__( 'Height', 'ssc' ), 'selector' => '.room-item .room-info-wrapper:hover'),
									array('property' => 'float', 'label' => esc_html__( 'Float', 'ssc' ), 'selector' => '.room-item .room-info-wrapper:hover'),
									array('property' => 'display', 'label' => esc_html__( 'Display', 'ssc' ), 'selector' => '.room-item .room-info-wrapper:hover'),
									array('property' => 'box-shadow', 'label' => esc_html__( 'Box Shadow', 'ssc' ), 'selector' => '.room-item .room-info-wrapper:hover'),
									array('property' => 'opacity', 'label' => esc_html__( 'Opacity', 'ssc' ), 'selector' => '.room-item .room-info-wrapper:hover'),
								),
								// Image Box
								'Image Box' => array(
									array('property' => 'background', 'selector' => '.room-item:hover .room-img'),
									array('property' => 'margin', 'label' => esc_html__( 'Margin', 'ssc' ), 'selector' => '.room-item:hover .room-img'),
									array('property' => 'padding', 'label' => esc_html__( 'Padding', 'ssc' ), 'selector' => '.room-item:hover .room-img'),
									array('property' => 'border', 'label' => esc_html__( 'Border', 'ssc' ), 'selector' => '.room-item:hover .room-img'),
									array('property' => 'border-radius', 'label' => esc_html__( 'Border Radius', 'ssc' ), 'selector' => '.room-item:hover .room-img'),
									array('property' => 'width', 'label' => esc_html__( 'Width', 'ssc' ), 'selector' => '.room-item:hover .room-img'),
									array('property' => 'height', 'label' => esc_html__( 'Height', 'ssc' ), 'selector' => '.room-item:hover .room-img'),
									array('property' => 'float', 'label' => esc_html__( 'Float', 'ssc' ), 'selector' => '.room-item:hover .room-img'),
									array('property' => 'display', 'label' => esc_html__( 'Display', 'ssc' ), 'selector' => '.room-item:hover .room-img'),
									array('property' => 'box-shadow', 'label' => esc_html__( 'Box Shadow', 'ssc' ), 'selector' => '.room-item:hover .room-img'),
									array('property' => 'opacity', 'label' => esc_html__( 'Opacity', 'ssc' ), 'selector' => '.room-item:hover .room-img'),
								),
								// Image
								'Image' => array(
									array('property' => 'background', 'selector' => '.room-item:hover .room-img img'),
									array('property' => 'margin', 'label' => esc_html__( 'Margin', 'ssc' ), 'selector' => '.room-item:hover .room-img img'),
									array('property' => 'padding', 'label' => esc_html__( 'Padding', 'ssc' ), 'selector' => '.room-item:hover .room-img img'),
									array('property' => 'border', 'label' => esc_html__( 'Border', 'ssc' ), 'selector' => '.room-item:hover .room-img img'),
									array('property' => 'border-radius', 'label' => esc_html__( 'Border Radius', 'ssc' ), 'selector' => '.room-item:hover .room-img img'),
									array('property' => 'width', 'label' => esc_html__( 'Width', 'ssc' ), 'selector' => '.room-item:hover .room-img img'),
									array('property' => 'height', 'label' => esc_html__( 'Height', 'ssc' ), 'selector' => '.room-item:hover .room-img img'),
									array('property' => 'float', 'label' => esc_html__( 'Float', 'ssc' ), 'selector' => '.room-item:hover .room-img img'),
									array('property' => 'display', 'label' => esc_html__( 'Display', 'ssc' ), 'selector' => '.room-item:hover .room-img img'),
									array('property' => 'box-shadow', 'label' => esc_html__( 'Box Shadow', 'ssc' ), 'selector' => '.room-item:hover .room-img img'),
									array('property' => 'opacity', 'label' => esc_html__( 'Opacity', 'ssc' ), 'selector' => '.room-item:hover .room-img img'),
								),
								'Star Rating' => array(
									array('property' => 'background-color', 'label' => esc_html__('Background Color', 'ssc' ), 'selector' => '.room-item:hover .room-rating .star'),
									array('property' => 'font-size', 'label' => esc_html__('Font Size', 'ssc' ), 'selector' => '.room-item:hover .room-rating .star'),
									array('property' => 'border', 'label' => esc_html__('Border', 'ssc' ), 'selector' => '.room-item:hover .room-rating .star'),
									array('property' => 'border-radius', 'label' => esc_html__( 'Border Radius', 'ssc' ), 'selector' => '.room-item:hover .room-rating .star'),
									array('property' => 'margin', 'label' => esc_html__('Margin', 'ssc' ), 'selector' => '.room-item:hover .room-rating .star'),
									array('property' => 'padding', 'label' =>esc_html__( 'Padding', 'ssc' ), 'selector' => '.room-item:hover .room-rating .star')
								),
								// Content Box
								'Content Box' => array(
									array('property' => 'color', 'label' => esc_html__( 'Color', 'ssc' ), 'selector' => '.room-item:hover .room-description'),
									array('property' => 'font-size', 'label' => esc_html__( 'Font Size', 'ssc' ), 'selector' => '.room-item:hover .room-description'),
									array('property' => 'line-height', 'label' => esc_html__( 'Line Height', 'ssc' ), 'selector' => '.room-item:hover .room-description'),
									array('property' => 'font-weight', 'label' => esc_html__( 'Font Weight', 'ssc' ), 'selector' => '.room-item:hover .room-description'),
									array('property' => 'font-style', 'label' => esc_html__( 'Font Style', 'ssc' ), 'selector' => '.room-item:hover .room-description'),
									array('property' => 'font-family', 'label' => esc_html__( 'Font Family', 'ssc' ), 'selector' => '.room-item:hover .room-description'),
									array('property' => 'text-align', 'label' => esc_html__( 'Text Align', 'ssc' ), 'selector' => '.room-item:hover .room-description'),
									array('property' => 'text-shadow', 'label' => esc_html__( 'Text Shadow', 'ssc' ), 'selector' => '.room-item:hover .room-description'),
									array('property' => 'text-transform', 'label' => esc_html__( 'Text Transform', 'ssc' ), 'selector' => '.room-item:hover .room-description'),
									array('property' => 'text-decoration', 'label' => esc_html__( 'Text Decoration', 'ssc' ), 'selector' => '.room-item:hover .room-description'),
									array('property' => 'letter-spacing', 'label' => esc_html__( 'Letter Spacing', 'ssc' ), 'selector' => '.room-item:hover .room-description'),
									array('property' => 'overflow', 'label' => esc_html__( 'Overflow', 'ssc' ), 'selector' => '.room-item:hover .room-description'),
									array('property' => 'word-break', 'label' => esc_html__( 'Word Break', 'ssc' ), 'selector' => '.room-item:hover .room-description'),
									array('property' => 'background', 'selector' => '.room-item:hover .room-description'),
									array('property' => 'margin', 'label' => esc_html__( 'Margin', 'ssc' ), 'selector' => '.room-item:hover .room-description'),
									array('property' => 'padding', 'label' => esc_html__( 'Padding', 'ssc' ), 'selector' => '.room-item:hover .room-description'),
									array('property' => 'border', 'label' => esc_html__( 'Border', 'ssc' ), 'selector' => '.room-item:hover .room-description'),
									array('property' => 'border-radius', 'label' => esc_html__( 'Border Radius', 'ssc' ), 'selector' => '.room-item:hover .room-description'),
									array('property' => 'width', 'label' => esc_html__( 'Width', 'ssc' ), 'selector' => '.room-item:hover .room-description'),
									array('property' => 'height', 'label' => esc_html__( 'Height', 'ssc' ), 'selector' => '.room-item:hover .room-description'),
									array('property' => 'float', 'label' => esc_html__( 'Float', 'ssc' ), 'selector' => '.room-item:hover .room-description'),
									array('property' => 'display', 'label' => esc_html__( 'Display', 'ssc' ), 'selector' => '.room-item:hover .room-description'),
									array('property' => 'box-shadow', 'label' => esc_html__( 'Box Shadow', 'ssc' ), 'selector' => '.room-item:hover .room-description'),
									array('property' => 'opacity', 'label' => esc_html__( 'Opacity', 'ssc' ), 'selector' => '.room-item:hover .room-description'),
								),
								// Title
								'Title' => array(
									array('property' => 'background', 'selector' => '.room-item .room-title .title:hover'),
									array('property' => 'color', 'label' => esc_html__( 'Color', 'ssc' ), 'selector' => '.room-item .room-title .title:hover'),
									array('property' => 'color', 'label' => esc_html__( 'Color when block hover', 'ssc' ), 'selector' => '.room-item:hover .room-title .title'),
									array('property' => 'font-size', 'label' => esc_html__( 'Font Size', 'ssc' ), 'selector' => '.room-item .room-title .title:hover'),
									array('property' => 'line-height', 'label' => esc_html__( 'Line Height', 'ssc' ), 'selector' => '.room-item .room-title .title:hover'),
									array('property' => 'font-weight', 'label' => esc_html__( 'Font Weight', 'ssc' ), 'selector' => '.room-item .room-title .title:hover'),
									array('property' => 'font-style', 'label' => esc_html__( 'Font Style', 'ssc' ), 'selector' => '.room-item .room-title .title:hover'),
									array('property' => 'font-family', 'label' => esc_html__( 'Font Family', 'ssc' ), 'selector' => '.room-item .room-title .title:hover'),
									array('property' => 'text-align', 'label' => esc_html__( 'Text Align', 'ssc' ), 'selector' => '.room-item .room-title .title:hover'),
									array('property' => 'text-shadow', 'label' => esc_html__( 'Text Shadow', 'ssc' ), 'selector' => '.room-item .room-title .title:hover'),
									array('property' => 'text-transform', 'label' => esc_html__( 'Text Transform', 'ssc' ), 'selector' => '.room-item .room-title .title:hover'),
									array('property' => 'text-decoration', 'label' => esc_html__( 'Text Decoration', 'ssc' ), 'selector' => '.room-item .room-title .title:hover'),
									array('property' => 'letter-spacing', 'label' => esc_html__( 'Letter Spacing', 'ssc' ), 'selector' => '.room-item .room-title .title:hover'),
									array('property' => 'overflow', 'label' => esc_html__( 'Overflow', 'ssc' ), 'selector' => '.room-item .room-title .title:hover'),
									array('property' => 'word-break', 'label' => esc_html__( 'Word Break', 'ssc' ), 'selector' => '.room-item .room-title .title:hover'),
									array('property' => 'margin', 'label' => esc_html__( 'Margin', 'ssc' ), 'selector' => '.room-item .room-title .title:hover'),
									array('property' => 'padding', 'label' => esc_html__( 'Padding', 'ssc' ), 'selector' => '.room-item .room-title .title:hover'),
									array('property' => 'border', 'label' => esc_html__( 'Border', 'ssc' ), 'selector' => '.room-item .room-title .title:hover'),
									array('property' => 'border-radius', 'label' => esc_html__( 'Border Radius', 'ssc' ), 'selector' => '.room-item .room-title .title:hover'),
								),
								// Price
								'Price' => array(
									array('property' => 'background', 'selector' => '.room-item .room-price:hover'),
									array('property' => 'margin', 'label' => esc_html__( 'Margin', 'ssc' ), 'selector' => '.room-item .room-price:hover'),
									array('property' => 'padding', 'label' => esc_html__( 'Padding', 'ssc' ), 'selector' => '.room-item .room-price:hover'),
									array('property' => 'border', 'label' => esc_html__( 'Border', 'ssc' ), 'selector' => '.room-item .room-price:hover'),
									array('property' => 'border-radius', 'label' => esc_html__( 'Border Radius', 'ssc' ), 'selector' => '.room-item .room-price:hover'),
									array('property' => 'width', 'label' => esc_html__( 'Width', 'ssc' ), 'selector' => '.room-item .room-price:hover'),
									array('property' => 'height', 'label' => esc_html__( 'Height', 'ssc' ), 'selector' => '.room-item .room-price:hover'),
//                                    array('property' => 'float', 'label' => esc_html__( 'Float', 'ssc' ), 'selector' => '.room-item .room-price:hover'),
									array('property' => 'display', 'label' => esc_html__( 'Display', 'ssc' ), 'selector' => '.room-item .room-price:hover'),
									array('property' => 'box-shadow', 'label' => esc_html__( 'Box Shadow', 'ssc' ), 'selector' => '.room-item .room-price:hover'),
									array('property' => 'opacity', 'label' => esc_html__( 'Opacity', 'ssc' ), 'selector' => '.room-item .room-price:hover'),
									array('property' => 'font-size', 'label' => esc_html__( 'Font Size', 'ssc' ), 'selector' => '.room-item .room-price:hover'),
									array('property' => 'line-height', 'label' => esc_html__( 'Line Height', 'ssc' ), 'selector' => '.room-item .room-price:hover'),
									array('property' => 'font-weight', 'label' => esc_html__( 'Font Weight', 'ssc' ), 'selector' => '.room-item .room-price:hover'),
									array('property' => 'font-style', 'label' => esc_html__( 'Font Style', 'ssc' ), 'selector' => '.room-item .room-price:hover'),
									array('property' => 'font-family', 'label' => esc_html__( 'Font Family', 'ssc' ), 'selector' => '.room-item .room-price:hover'),
									array('property' => 'text-align', 'label' => esc_html__( 'Text Align', 'ssc' ), 'selector' => '.room-item .room-price:hover'),
									array('property' => 'text-shadow', 'label' => esc_html__( 'Text Shadow', 'ssc' ), 'selector' => '.room-item .room-price:hover'),
									array('property' => 'text-transform', 'label' => esc_html__( 'Text Transform', 'ssc' ), 'selector' => '.room-item .room-price:hover'),
									array('property' => 'text-decoration', 'label' => esc_html__( 'Text Decoration', 'ssc' ), 'selector' => '.room-item .room-price:hover'),
									array('property' => 'letter-spacing', 'label' => esc_html__( 'Letter Spacing', 'ssc' ), 'selector' => '.room-item .room-price:hover'),
									array('property' => 'overflow', 'label' => esc_html__( 'Overflow', 'ssc' ), 'selector' => '.room-item .room-price:hover'),
									array('property' => 'word-break', 'label' => esc_html__( 'Word Break', 'ssc' ), 'selector' => '.room-item .room-price:hover'),
								),
								// On sale Price
								'Removed Price' => array(
									array('property' => 'background', 'selector' => '.room-item .room-price:hover del'),
									array('property' => 'margin', 'label' => esc_html__( 'Margin', 'ssc' ), 'selector' => '.room-item .room-price:hover del'),
									array('property' => 'padding', 'label' => esc_html__( 'Padding', 'ssc' ), 'selector' => '.room-item .room-price:hover del'),
									array('property' => 'border', 'label' => esc_html__( 'Border', 'ssc' ), 'selector' => '.room-item .room-price:hover del'),
									array('property' => 'border-radius', 'label' => esc_html__( 'Border Radius', 'ssc' ), 'selector' => '.room-item .room-price:hover del'),
									array('property' => 'width', 'label' => esc_html__( 'Width', 'ssc' ), 'selector' => '.room-item .room-price:hover del'),
									array('property' => 'height', 'label' => esc_html__( 'Height', 'ssc' ), 'selector' => '.room-item .room-price:hover del'),
//                                    array('property' => 'float', 'label' => esc_html__( 'Float', 'ssc' ), 'selector' => '.room-item .room-price:hover del'),
									array('property' => 'display', 'label' => esc_html__( 'Display', 'ssc' ), 'selector' => '.room-item .room-price:hover del'),
									array('property' => 'box-shadow', 'label' => esc_html__( 'Box Shadow', 'ssc' ), 'selector' => '.room-item .room-price:hover del'),
									array('property' => 'opacity', 'label' => esc_html__( 'Opacity', 'ssc' ), 'selector' => '.room-item .room-price:hover del'),
									array('property' => 'font-size', 'label' => esc_html__( 'Font Size', 'ssc' ), 'selector' => '.room-item .room-price:hover del'),
									array('property' => 'line-height', 'label' => esc_html__( 'Line Height', 'ssc' ), 'selector' => '.room-item .room-price:hover del'),
									array('property' => 'font-weight', 'label' => esc_html__( 'Font Weight', 'ssc' ), 'selector' => '.room-item .room-price:hover del'),
									array('property' => 'font-style', 'label' => esc_html__( 'Font Style', 'ssc' ), 'selector' => '.room-item .room-price:hover del'),
									array('property' => 'font-family', 'label' => esc_html__( 'Font Family', 'ssc' ), 'selector' => '.room-item .room-price:hover del'),
									array('property' => 'text-align', 'label' => esc_html__( 'Text Align', 'ssc' ), 'selector' => '.room-item .room-price:hover del'),
									array('property' => 'text-shadow', 'label' => esc_html__( 'Text Shadow', 'ssc' ), 'selector' => '.room-item .room-price:hover del'),
									array('property' => 'text-transform', 'label' => esc_html__( 'Text Transform', 'ssc' ), 'selector' => '.room-item .room-price:hover del'),
									array('property' => 'text-decoration', 'label' => esc_html__( 'Text Decoration', 'ssc' ), 'selector' => '.room-item .room-price:hover del'),
									array('property' => 'letter-spacing', 'label' => esc_html__( 'Letter Spacing', 'ssc' ), 'selector' => '.room-item .room-price:hover del'),
									array('property' => 'overflow', 'label' => esc_html__( 'Overflow', 'ssc' ), 'selector' => '.room-item .room-price:hover del'),
									array('property' => 'word-break', 'label' => esc_html__( 'Word Break', 'ssc' ), 'selector' => '.room-item .room-price:hover del'),
								),
								'Actual Price' => array(
									array('property' => 'background', 'selector' => '.room-item .room-price:hover ins'),
									array('property' => 'margin', 'label' => esc_html__( 'Margin', 'ssc' ), 'selector' => '.room-item .room-price:hover ins'),
									array('property' => 'padding', 'label' => esc_html__( 'Padding', 'ssc' ), 'selector' => '.room-item .room-price:hover ins'),
									array('property' => 'border', 'label' => esc_html__( 'Border', 'ssc' ), 'selector' => '.room-item .room-price:hover ins'),
									array('property' => 'border-radius', 'label' => esc_html__( 'Border Radius', 'ssc' ), 'selector' => '.room-item .room-price:hover ins'),
									array('property' => 'width', 'label' => esc_html__( 'Width', 'ssc' ), 'selector' => '.room-item .room-price:hover ins'),
									array('property' => 'height', 'label' => esc_html__( 'Height', 'ssc' ), 'selector' => '.room-item .room-price:hover ins'),
//                                    array('property' => 'float', 'label' => esc_html__( 'Float', 'ssc' ), 'selector' => '.room-item .room-price:hover ins'),
									array('property' => 'display', 'label' => esc_html__( 'Display', 'ssc' ), 'selector' => '.room-item .room-price:hover ins'),
									array('property' => 'box-shadow', 'label' => esc_html__( 'Box Shadow', 'ssc' ), 'selector' => '.room-item .room-price:hover ins'),
									array('property' => 'opacity', 'label' => esc_html__( 'Opacity', 'ssc' ), 'selector' => '.room-item .room-price:hover ins'),
									array('property' => 'font-size', 'label' => esc_html__( 'Font Size', 'ssc' ), 'selector' => '.room-item .room-price:hover ins'),
									array('property' => 'line-height', 'label' => esc_html__( 'Line Height', 'ssc' ), 'selector' => '.room-item .room-price:hover ins'),
									array('property' => 'font-weight', 'label' => esc_html__( 'Font Weight', 'ssc' ), 'selector' => '.room-item .room-price:hover ins'),
									array('property' => 'font-style', 'label' => esc_html__( 'Font Style', 'ssc' ), 'selector' => '.room-item .room-price:hover ins'),
									array('property' => 'font-family', 'label' => esc_html__( 'Font Family', 'ssc' ), 'selector' => '.room-item .room-price:hover ins'),
									array('property' => 'text-align', 'label' => esc_html__( 'Text Align', 'ssc' ), 'selector' => '.room-item .room-price:hover ins'),
									array('property' => 'text-shadow', 'label' => esc_html__( 'Text Shadow', 'ssc' ), 'selector' => '.room-item .room-price:hover ins'),
									array('property' => 'text-transform', 'label' => esc_html__( 'Text Transform', 'ssc' ), 'selector' => '.room-item .room-price:hover ins'),
									array('property' => 'text-decoration', 'label' => esc_html__( 'Text Decoration', 'ssc' ), 'selector' => '.room-item .room-price:hover ins'),
									array('property' => 'letter-spacing', 'label' => esc_html__( 'Letter Spacing', 'ssc' ), 'selector' => '.room-item .room-price:hover ins'),
									array('property' => 'overflow', 'label' => esc_html__( 'Overflow', 'ssc' ), 'selector' => '.room-item .room-price:hover ins'),
									array('property' => 'word-break', 'label' => esc_html__( 'Word Break', 'ssc' ), 'selector' => '.room-item .room-price:hover ins'),
								),
								// Book button
								'Book button' => array(
									array('property' => 'background', 'selector' => '.room-item .room-book-button:hover'),
									array('property' => 'background', 'selector' => '.room-item:hover .room-item .room-book-button'),
									array('property' => 'color', 'label' => esc_html__( 'Color', 'ssc' ), 'selector' => '.room-item .room-book-button:hover'),
									array('property' => 'color', 'label' => esc_html__( 'Color when block hover', 'ssc' ), 'selector' => '.room-item:hover .room-item .room-book-button'),
									array('property' => 'font-size', 'label' => esc_html__( 'Font Size', 'ssc' ), 'selector' => '.room-item .room-book-button:hover'),
									array('property' => 'line-height', 'label' => esc_html__( 'Line Height', 'ssc' ), 'selector' => '.room-item .room-book-button:hover'),
									array('property' => 'font-weight', 'label' => esc_html__( 'Font Weight', 'ssc' ), 'selector' => '.room-item .room-book-button:hover'),
									array('property' => 'font-style', 'label' => esc_html__( 'Font Style', 'ssc' ), 'selector' => '.room-item .room-book-button:hover'),
									array('property' => 'font-family', 'label' => esc_html__( 'Font Family', 'ssc' ), 'selector' => '.room-item .room-book-button:hover'),
									array('property' => 'text-align', 'label' => esc_html__( 'Text Align', 'ssc' ), 'selector' => '.room-item .room-book-button:hover'),
									array('property' => 'text-shadow', 'label' => esc_html__( 'Text Shadow', 'ssc' ), 'selector' => '.room-item .room-book-button:hover'),
									array('property' => 'box-shadow', 'label' => esc_html__( 'Box Shadow', 'ssc' ), 'selector' => '.room-item .room-book-button:hover'),
									array('property' => 'text-transform', 'label' => esc_html__( 'Text Transform', 'ssc' ), 'selector' => '.room-item .room-book-button:hover'),
									array('property' => 'text-decoration', 'label' => esc_html__( 'Text Decoration', 'ssc' ), 'selector' => '.room-item .room-book-button:hover'),
									array('property' => 'letter-spacing', 'label' => esc_html__( 'Letter Spacing', 'ssc' ), 'selector' => '.room-item .room-book-button:hover'),
									array('property' => 'display', 'label' => esc_html__( 'Display', 'ssc' ), 'selector' => '.room-item .room-book-button:hover'),
									array('property' => 'float', 'label' => esc_html__( 'Float', 'ssc' ), 'selector' => '.room-item .room-book-button:hover'),
									array('property' => 'overflow', 'label' => esc_html__( 'Overflow', 'ssc' ), 'selector' => '.room-item .room-book-button:hover'),
									array('property' => 'word-break', 'label' => esc_html__( 'Word Break', 'ssc' ), 'selector' => '.room-item .room-book-button:hover'),
									array('property' => 'margin', 'label' => esc_html__( 'Margin', 'ssc' ), 'selector' => '.room-item .room-book-button:hover'),
									array('property' => 'padding', 'label' => esc_html__( 'Padding', 'ssc' ), 'selector' => '.room-item .room-book-button:hover'),
									array('property' => 'border', 'label' => esc_html__( 'Border', 'ssc' ), 'selector' => '.room-item .room-book-button:hover'),
									array('property' => 'border-radius', 'label' => esc_html__( 'Border Radius', 'ssc' ), 'selector' => '.room-item .room-book-button:hover')
								),
								'Icon Box Wrapper' => array(
									array('property' => 'background', 'selector' => '.room-item:hover .atiframebuilder-terms-block-inner'),
									array('property' => 'text-align', 'label' => esc_html__('Text Align', 'ssc' ), 'selector' => '.room-item:hover .atiframebuilder-terms-block-inner'),
									array('property' => 'vertical-align', 'label' => 'Vertical Align', 'selector' => '.room-item:hover .atiframebuilder-terms-block-inner'),
									array('property' => 'margin', 'label' => esc_html__( 'Margin', 'ssc' ), 'selector' => '.room-item:hover .atiframebuilder-terms-block-inner'),
									array('property' => 'padding', 'label' => esc_html__( 'Padding', 'ssc' ), 'selector' => '.room-item:hover .atiframebuilder-terms-block-inner'),
									array('property' => 'border', 'label' => esc_html__( 'Border', 'ssc' ), 'selector' => '.room-item:hover .atiframebuilder-terms-block-inner'),
									array('property' => 'border-radius', 'label' => esc_html__( 'Border Radius', 'ssc' ), 'selector' => '.room-item:hover .atiframebuilder-terms-block-inner'),
									array('property' => 'width', 'label' => esc_html__( 'Width', 'ssc' ), 'selector' => '.room-item:hover .atiframebuilder-terms-block-inner'),
									array('property' => 'height', 'label' => esc_html__( 'Height', 'ssc' ), 'selector' => '.room-item:hover .atiframebuilder-terms-block-inner'),
									array('property' => 'text-align', 'label' => esc_html__('Text Align', 'ssc' ), 'selector' => '.room-item:hover .atiframebuilder-terms-block-inner'),
									array('property' => 'float', 'label' => esc_html__( 'Float', 'ssc' ), 'selector' => '.room-item:hover .atiframebuilder-terms-block-inner'),
									array('property' => 'display', 'label' => esc_html__( 'Display', 'ssc' ), 'selector' => '.room-item:hover .atiframebuilder-terms-block-inner'),
									array('property' => 'box-shadow', 'label' => esc_html__( 'Box Shadow', 'ssc' ), 'selector' => '.room-item:hover .atiframebuilder-terms-block-inner'),
									array('property' => 'opacity', 'label' => esc_html__( 'Opacity', 'ssc' ), 'selector' => '.room-item:hover .atiframebuilder-terms-block-inner'),
								),
								'Icon Box' => array(
									array('property' => 'background', 'selector' => '.fic:hover'),
									array('property' => 'text-align', 'label' => esc_html__('Text Align', 'ssc' ), 'selector' => '.fic:hover'),
									array('property' => 'vertical-align', 'label' => 'Vertical Align', 'selector' => '.fic:hover'),
									array('property' => 'margin', 'label' => esc_html__( 'Margin', 'ssc' ), 'selector' => '.fic:hover'),
									array('property' => 'padding', 'label' => esc_html__( 'Padding', 'ssc' ), 'selector' => '.fic:hover'),
									array('property' => 'border', 'label' => esc_html__( 'Border', 'ssc' ), 'selector' => '.fic:hover'),
									array('property' => 'border-radius', 'label' => esc_html__( 'Border Radius', 'ssc' ), 'selector' => '.fic:hover'),
									array('property' => 'width', 'label' => esc_html__( 'Width', 'ssc' ), 'selector' => '.fic:hover'),
									array('property' => 'height', 'label' => esc_html__( 'Height', 'ssc' ), 'selector' => '.fic:hover'),
									array('property' => 'text-align', 'label' => esc_html__('Text Align', 'ssc' ), 'selector' => '.fic:hover'),
									array('property' => 'float', 'label' => esc_html__( 'Float', 'ssc' ), 'selector' => '.fic:hover'),
									array('property' => 'display', 'label' => esc_html__( 'Display', 'ssc' ), 'selector' => '.fic:hover'),
									array('property' => 'box-shadow', 'label' => esc_html__( 'Box Shadow', 'ssc' ), 'selector' => '.fic:hover'),
									array('property' => 'opacity', 'label' => esc_html__( 'Opacity', 'ssc' ), 'selector' => '.fic:hover'),
								),
								'Icon Title' => array(
									array('property' => 'background', 'selector' => '.room-item:hover .atiframebuilder-term-title'),
									array('property' => 'color', 'label' => esc_html__( 'Color', 'ssc' ), 'selector' => '.room-item:hover .atiframebuilder-term-title'),
									array('property' => 'font-size', 'label' => esc_html__( 'Font Size', 'ssc' ), 'selector' => '.room-item:hover .atiframebuilder-term-title'),
									array('property' => 'line-height', 'label' => esc_html__( 'Line Height', 'ssc' ), 'selector' => '.room-item:hover .atiframebuilder-term-title'),
									array('property' => 'font-weight', 'label' => esc_html__( 'Font Weight', 'ssc' ), 'selector' => '.room-item:hover .atiframebuilder-term-title'),
									array('property' => 'font-style', 'label' => esc_html__( 'Font Style', 'ssc' ), 'selector' => '.room-item:hover .atiframebuilder-term-title'),
									array('property' => 'font-family', 'label' => esc_html__( 'Font Family', 'ssc' ), 'selector' => '.room-item:hover .atiframebuilder-term-title'),
									array('property' => 'text-align', 'label' => esc_html__( 'Text Align', 'ssc' ), 'selector' => '.room-item:hover .atiframebuilder-term-title'),
									array('property' => 'text-shadow', 'label' => esc_html__( 'Text Shadow', 'ssc' ), 'selector' => '.room-item:hover .atiframebuilder-term-title'),
									array('property' => 'text-transform', 'label' => esc_html__( 'Text Transform', 'ssc' ), 'selector' => '.room-item:hover .atiframebuilder-term-title'),
									array('property' => 'text-decoration', 'label' => esc_html__( 'Text Decoration', 'ssc' ), 'selector' => '.room-item:hover .atiframebuilder-term-title'),
									array('property' => 'letter-spacing', 'label' => esc_html__( 'Letter Spacing', 'ssc' ), 'selector' => '.room-item:hover .atiframebuilder-term-title'),
									array('property' => 'overflow', 'label' => esc_html__( 'Overflow', 'ssc' ), 'selector' => '.room-item:hover .atiframebuilder-term-title'),
									array('property' => 'float', 'label' => esc_html__( 'Float', 'ssc' ), 'selector' => '.room-item:hover .atiframebuilder-term-title'),
									array('property' => 'display', 'label' => esc_html__( 'Display', 'ssc' ), 'selector' => '.room-item:hover .atiframebuilder-term-title'),
									array('property' => 'word-break', 'label' => esc_html__( 'Word Break', 'ssc' ), 'selector' => '.room-item:hover .atiframebuilder-term-title'),
									array('property' => 'margin', 'label' => esc_html__( 'Margin', 'ssc' ), 'selector' => '.room-item:hover .atiframebuilder-term-title'),
									array('property' => 'padding', 'label' => esc_html__( 'Padding', 'ssc' ), 'selector' => '.room-item:hover .atiframebuilder-term-title'),
									array('property' => 'border', 'label' => esc_html__( 'Border', 'ssc' ), 'selector' => '.room-item:hover .atiframebuilder-term-title'),
									array('property' => 'border-radius', 'label' => esc_html__( 'Border Radius', 'ssc' ), 'selector' => '.room-item:hover .atiframebuilder-term-title'),
								),
								'Icons' => array(
									array('property' => 'background', 'selector' => '.room-item .fic:hover img'),
									array('property' => 'margin', 'label' => esc_html__( 'Margin', 'ssc' ), 'selector' => '.room-item .fic:hover img'),
									array('property' => 'padding', 'label' => esc_html__( 'Padding', 'ssc' ), 'selector' => '.room-item .fic:hover img'),
									array('property' => 'border', 'label' => esc_html__( 'Border', 'ssc' ), 'selector' => '.room-item .fic:hover img'),
									array('property' => 'border-radius', 'label' => esc_html__( 'Border Radius', 'ssc' ), 'selector' => '.room-item .fic:hover img'),
									array('property' => 'width', 'label' => esc_html__( 'Width', 'ssc' ), 'selector' => '.room-item .fic:hover img'),
									array('property' => 'height', 'label' => esc_html__( 'Height', 'ssc' ), 'selector' => '.room-item .fic:hover img'),
									array('property' => 'float', 'label' => esc_html__( 'Float', 'ssc' ), 'selector' => '.room-item .fic:hover img'),
									array('property' => 'display', 'label' => esc_html__( 'Display', 'ssc' ), 'selector' => '.room-item .fic:hover img'),
									array('property' => 'box-shadow', 'label' => esc_html__( 'Box Shadow', 'ssc' ), 'selector' => '.room-item .fic:hover img'),
									array('property' => 'opacity', 'label' => esc_html__( 'Opacity', 'ssc' ), 'selector' => '.room-item .fic:hover img'),
								),
							),
						)
					)
				),

				'animate' => array(
					array(
						'name' => 'animate',
						'type' => 'animate'
					)
				),
			)
		)
	) );
}

// Register Shortcode
function ssc_room_shortcode( $atts, $content = null ) {
	$image = $price = $rating = $descr = $room_terms = $book_button = '';
	extract( shortcode_atts( array(
		'template'          => '1', //+
		'item_id'           => '',
		'limit_words'       => 20,//+
		'limit_t_lines'     => '',//+
		'show_thumb'        => 'yes',//+
		'thumb_size'        => 'full',
		'custom_thumb_size' => '400x200',
		'monocolored'       => 'no',
		'strength'          => 0,
		'hover_effect'      => 'none',
		'show_price'        => 'yes',
		'show_rating'       => 'yes',
		'show_book_button'  => 'yes',
		'book_text'         => esc_html__( 'Book room now', 'ssc' ),
		'show_terms'        => 'yes',
		'el_class'          => '',//+
	), $atts ) );

	if ( ! is_numeric( $item_id ) ) {
		return '<div class="kc-carousel_images align-center" style="border:1px dashed #ccc;"><br /><h3>' . esc_html__( 'No Romm Selected', 'ssc' ) . '</h3></div>';
	}

	$wrp_classes = apply_filters( 'kc-el-class', $atts );

	$item     = BABE_Post_types::get_post( $item_id );
	$item_url = BABE_Functions::get_page_url_with_args( $item['ID'], $_GET );

	if ( $show_thumb === 'yes' ) {
		// Image
		if ( 'custom_size' == $thumb_size ) {
			if ( '' === $custom_thumb_size ) {
				$thumb_size = 'full';
			} else {
				$thumb_size = ssc_get_img_sizes_array_from_string( $custom_thumb_size );
			}
		}
		$image = get_the_post_thumbnail( $item['ID'], $thumb_size );
		if ( '' === $image ) {
			$image = '<img src="' . SSC_URL . 'images/grid600.gif' . '" alt="" />';
		}

		if ( 'yes' === $monocolored ) {
			$image = '<div class="room-image mo' . $monocolored . ' " style="-webkit-filter: grayscale(' . $strength . ');filter: grayscale(' . $strength . ');">' . $image . '</div>';
		} else {
			$image = '<div class="room-image">' . $image . '</div>';
		}
	}

	if ( 'yes' === $show_price ) {
		$prices    = BABE_Post_types::get_post_price_from( $item['ID'] );
		$price_old = $prices['discount_price_from'] < $prices['price_from'] ? '<span class="item_info_price_old">' . BABE_Currency::get_currency_price( $prices['price_from'] ) . '</span>' : '';

		$discount = $prices['discount'] ? '<div class="item_info_price_discount">-' . $prices['discount'] . '%</div>' : '';
		$price    = '<div class="room-price">
					<label>' . __( 'from', 'atiframe-builder' ) . '</label>
					' . $price_old . '
					<span class="room-price-new">' . BABE_Currency::get_currency_price( $prices['discount_price_from'] ) . '</span>
					' . $discount . '
				</div>';
	}

	if ( 'yes' === $show_rating ) {
		$rating = Atiframebuilder_Room::post_stars_rendering( $item['ID'] );
	}

	// Description
	if ( ! post_password_required( $item['ID'] ) ) {
		if ( - 1 < $limit_words ) {
			$descr = '<div class="room-description">' . BABE_Post_types::get_post_excerpt( $item, $limit_words ) . '</div>';
		}
	}

	if( 'yes' === $show_terms ) {
		$room_terms = Atiframebuilder_Room::get_room_terms( $item['ID'], array( 'show_title' => true ) );
	}

	if( 'yes' === $show_book_button && ! empty( $book_text ) ) {
		$book_button = '<a class="room-book-button" href="' . $item_url . '">' . '<span class="button-text">' . $book_text . '</span>' . '</a>';
	}

	$output = '<div class="ssc-room ' . implode( ' ', $wrp_classes ) . ' template' . $template . '">';


	ob_start();
	include SSC_SHORTCODES_PATH . 'templates/room/template' . $template . '.php';
	$output .= ob_get_clean();

	$output .= '</div>';

	return $output;
}

add_shortcode( 'ssc_room', 'ssc_room_shortcode' );

function ssc_get_rooms_select_options() {
	$options = array();
	$rooms   = BABE_Post_types::get_posts( array( 'posts_per_page' => - 1 ) );
	if ( empty( $rooms ) ) {
		return $options;
	}
	foreach ( $rooms as $room ) {
		$options[ $room['ID'] ] = $room['post_title'];
	}

	return $options;
}