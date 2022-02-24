<?php
add_action('init', 'ssc_image_effect_params', 99);

function ssc_image_effect_params() {
	global $kc;

	$kc->add_map(array(
		'ssc_image_effect' => array(
			'name' => __('Image Effect', 'ssc'),
			'description' => __('Image Effect', 'ssc'),
			'icon' => 'ssc-icon-19',
			'category' => 'SecretLab',
			'preview_editable' => true,
//			'assets' => array(
//				'styles' => array(
//					'footer-nested-ace-css' => false,
//				),
//			),
			'params' => array(
				'general' => array(
					array(
						'name' => 'template',
						'label' => esc_html__( 'Select Template', 'ssc' ),
						'type' => 'radio_image',  // USAGE TEXT TYPE
						'options' => array(
							'1'	=> plugin_dir_url( __FILE__ ) .'../images/img1.gif',
							'2'	=> plugin_dir_url( __FILE__ ) .'../images/img2.gif',
							'3'	=> plugin_dir_url( __FILE__ ) .'../images/img3.gif',
							'4'	=> plugin_dir_url( __FILE__ ) .'../images/img4.gif',
							'5'	=> plugin_dir_url( __FILE__ ) .'../images/img5.gif',
							'6'	=> plugin_dir_url( __FILE__ ) .'../images/img6.gif',
							'7'	=> plugin_dir_url( __FILE__ ) .'../images/img7.gif',
							'8'	=> plugin_dir_url( __FILE__ ) .'../images/img8.gif',
							'9'	=> plugin_dir_url( __FILE__ ) .'../images/img9.gif',
							'10'	=> plugin_dir_url( __FILE__ ) .'../images/img10.gif',
							'11'	=> plugin_dir_url( __FILE__ ) .'../images/img11.gif',
							'12'	=> plugin_dir_url( __FILE__ ) .'../images/img12.gif',
						),
						'value' => '1', // remove this if you do not need a default content
					),
					array(
						'name'  	    => 'image',
						'type'        	=> 'attach_image',
						'label'     	=> esc_html__( 'Image', 'ssc' ),
						'description' 	=> esc_html__( 'Image for showing in block.', 'ssc' ),
					),
					array(
						'name' 		 	=> 'img_size',
						'type'        	=> 'dropdown',
						'label'     	=> esc_html__( 'Image size', 'ssc' ),
						'description' 	=> esc_html__( 'Set the image size.', 'ssc' ),
						'value'       	=> 'full',
						'options'       => ssc_get_image_sizes(),
					),
					array(
						'type'        	=> 'text',
						'label'     	=> esc_html__( 'Custom Image size', 'ssc' ),
						'name' 		 	=> 'custom_img_size',
						'description' 	=> esc_html__( 'Set the image size: "thumbnail", "medium", "large", "full" or "400x200".', 'ssc' ),
//                            'value'       	=> 'full',
						'relation'  	=> array(
							'parent'	=> 'img_size',
							'show_when' => 'custom_size'
						)
					),
					array(
						'name'        => 'alt',
						'label'       => 'Alt',
						'type'        => 'text',
						'description' => __(' Enter the image alt property.', 'ssc')
					),
					array(
						'name'        => 'caption',
						'label'       => __('Title', 'ssc'),
						'type'        => 'text',

						'description' => __(' Enter the title on overlay.', 'ssc')
					),
					array(
						'name'        => 'description',
						'label'       => 'Description',
						'type'        => 'text',

						'description' => __(' Enter the image description.', 'ssc')
					),
					/////
					array(
						'name'          => 'monocolored',
						'label'         => __(' Grayscale Effect', 'ssc'),
						'type'          => 'toggle',
						'description'   => __(' Enable a grayscale effect for images. Images become colorful on hover.', 'ssc')
					),
					array(
						'name' => 'strength',
						'label' => esc_html__( 'Grayscale strength', 'ssc' ),
						'type' => 'number_slider',
						'value'	=> '0',
						'options' => array(
							'min' => 0,
							'max' => 100,
							'unit' => '%',
							'show_input' => true
						),
						'relation' => array(
							'parent'    => 'monocolored',
							'show_when' => 'yes'
						),
						'description' => '0-100%'
					),
					array(
						'name'			=> 'hover_effect',
						'type'     	=> 'dropdown',
						'label'  	 	=> esc_html__( 'Hover Effect', 'ssc' ),
						'options' 		=> array(
							'none'  => esc_html__( 'None', 'ssc' ),
							'blur'  => esc_html__( 'Blur on hover', 'ssc' ),
							'noblur'  => esc_html__( 'Blur on normal', 'ssc' ),
							'scaleup'  => esc_html__( 'Scale Up', 'ssc' ),
							'scaleupall'  => esc_html__( 'Scale Up Whole Element', 'ssc' ),
							'flip'  => esc_html__( 'Flip', 'ssc' ),
							'rotate'  => esc_html__( 'Rotate', 'ssc' ),
						),
						'description'	=> esc_html__( 'Select the click event when users click on an image.', 'ssc' )
					),


					//////
					array(
						'name'    => 'on_click_action',
						'label'   => esc_html__(' On click event', 'ssc'),
						'type'    => 'select',
						'options' => array(
							''                 => esc_html__(' None', 'ssc'),
							'op_large_image'   => esc_html__(' Link to large image', 'ssc'),
							'lightbox'         => esc_html__(' Open Image In Lightbox', 'ssc'),
							'open_custom_link' => esc_html__(' Open Custom Link', 'ssc'),
							'popup-youtube'	=> esc_html__(' YouTube Video', 'kingcomposer'),
							'popup-vimeo'	=> esc_html__(' Vimeo Video', 'kingcomposer'),
							'popup-gmaps'	=> esc_html__(' Google Map', 'kingcomposer'),
							//'image-link'	=> esc_html__(' Image', 'kingcomposer'),
						),
						'description' => __(' Select the click event when users click on the image.', 'ssc')
					),

					array(
						'name'     => 'custom_link',
						'label'    => __(' Custom Link', 'ssc'),
						'type'     => 'link',
						'value'    => '#',
						'relation' => array(
							'parent'    => 'on_click_action',
							'show_when' => array(
								'open_custom_link','popup-youtube','popup-vimeo','popup-gmaps'
							)
						),
						'description' => __(' The URL which image/title assigned to. You can select page/post or other post type', 'ssc')
					),

					array(
						'name' => 'link_text',
						'label' => esc_html__( 'Read More Text', 'ssc' ),
						'type' => 'text',
						'description' => '',
						'value' => '',
					) ,
					array(
						'name'          => 'show_icon',
						'label'         => __('Display icon?', 'ssc'),
						'type'        	=> 'dropdown',
						'description'   => __(' Enable to add icon to the overlay.', 'ssc'),
						'value'       	=> '',
						'options'       => array(
							'' => esc_html__( 'No', 'ssc' ),
							'yes' => esc_html__( 'Yes', 'ssc' ),
							'svg' => esc_html__( 'SVG', 'ssc' ),
						),
					),
					array(
						'name'     => 'icon',
						'label'    => __(' Icon on Overlay', 'ssc'),
						'type'     => 'icon_picker',
						'value'    => '',
						'relation' => array(
							'parent'    => 'show_icon',
							'show_when' => 'yes'
						),
						'description' => __(' The icon show on overlay layer.', 'ssc')
					),
					array(
						'name' => 'svg_icon',
						'label' => esc_html__( 'Select SVG Icon', 'ssc' ),
						'type' => 'attach_image',
						'admin_label' => true,
						'relation' => array(
							'parent' => 'show_icon',
							'show_when' => 'svg'
						),
					),
					array(
						'name' => 'svg_icon_color',
						'type' => 'color_picker',
						'label' => esc_html__( 'SVG Color', 'ssc' ),
						'relation' => array(
							'parent' => 'show_icon',
							'show_when' => 'svg'
						),
						'description' => esc_html__( 'Deprecated! Use "fill" field at the "Styling\Hover" tab instead.', 'ssc' ),
					),
					array(
						'name' => 'svg_icon_hcolor',
						'type' => 'color_picker',
						'label' => esc_html__( 'SVG Hover Color', 'ssc' ),
						'relation' => array(
							'parent' => 'show_icon',
							'show_when' => 'svg'
						),
						'description' => esc_html__( 'Deprecated! Use "fill" field at the "Styling\Hover" tab instead.', 'ssc' ),
					),
					array(
						'name'          => 'image_position',
						'label'         => __('Image position', 'ssc'),
						'type'          => 'toggle',
						'description'   => __('Enable image absolute position.', 'ssc')
					),
					array(
						'name' => 'left',
						'label' => esc_html__( 'Left side position', 'ssc' ),
						'type' => 'number_slider',
						'options' => array(
							'min' => -500,
							'max' => 1000,
							'unit' => 'px',
							'show_input' => true
						),
						'relation' => array(
							'parent'    => 'image_position',
							'show_when' => 'yes'
						),
						'description' => 'Pixels from the left side'
					),
					array(
						'name' => 'right',
						'label' => esc_html__( 'Right side position', 'ssc' ),
						'type' => 'number_slider',
						'options' => array(
							'min' => -500,
							'max' => 1000,
							'unit' => 'px',
							'show_input' => true
						),
						'relation' => array(
							'parent'    => 'image_position',
							'show_when' => 'yes'
						),
						'description' => 'Pixels from the right side'
					),
					array(
						'name' => 'top',
						'label' => esc_html__( 'Top side position', 'ssc' ),
						'type' => 'number_slider',
						'options' => array(
							'min' => -500,
							'max' => 1000,
							'unit' => 'px',
							'show_input' => true
						),
						'relation' => array(
							'parent'    => 'image_position',
							'show_when' => 'yes'
						),
						'description' => 'Pixels from the top side'
					),
					array(
						'name' => 'bottom',
						'label' => esc_html__( 'Bottom side position', 'ssc' ),
						'type' => 'number_slider',
						'options' => array(
							'min' => -500,
							'max' => 1000,
							'unit' => 'px',
							'show_input' => true
						),
						'relation' => array(
							'parent'    => 'image_position',
							'show_when' => 'yes'
						),
						'description' => 'Pixels from the bottom side'
					),


					array(
						'name'        => 'ieclass',
						'label'       => __(' Image extra class', 'ssc'),
						'type'        => 'text',
						'description' => __(' Add class name for img tag.', 'ssc')
					),
					array(
						'name'        => 'class',
						'label'       => __(' Wrapper extra class', 'ssc'),
						'type'        => 'text',
						'description' => __(' If you wish to style a particular content element differently, please add a class name to this field and refer to it in your custom CSS file.', 'ssc'),
					)
				),
				esc_html__( 'styling', 'ssc' )  => array(
					array(
						'label'			=> esc_html__( 'CSS', 'ssc' ),
						'name'    => 'css_custom',
						'type'    => 'css',
						'value'    => '{`kc-css`:{`any`:{`text-box`:{`background|.ieslide`:`eyJjb2xvciI6InJnYmEoMjMyLCA2NiwgMTAxLCAwLjgzKSIsImxpbmVhckdyYWRpZW50IjpbIiJdLCJpbWFnZSI6Im5vbmUiLCJwb3NpdGlvbiI6IjAlIDAlIiwic2l6ZSI6ImF1dG8iLCJyZXBlYXQiOiJyZXBlYXQiLCJhdHRhY2htZW50Ijoic2Nyb2xsIiwiYWR2YW5jZWQiOjB9`},`title`:{`color|strong, a strong`:`#ffffff`,`font-size|strong, a strong`:`20px`,`line-height|strong, a strong`:`28px`,`padding|strong, a strong`:`8px 30px 8px 16px`},`description`:{`color|.mov`:`#ffffff`,`font-size|.mov`:`13px`,`line-height|.mov`:`22px`,`padding|.mov`:`inherit 30px inherit 16px`},`icon`:{`color|i, a i`:`#e84265`,`background-color|i, a i`:`rgba(255, 255, 255, 0.81)`,`padding|i, a i`:`10px 15px 10px 15px`}}}}',
						'options'		=> array(
							array(
								"screens" => "any,1024,999,767,479",
								'Box' => array(
									array('property' => 'text-align', 'label' => esc_html__( 'Text Align', 'ssc' )),
									array('property' => 'vertical-align', 'label' => esc_html__('Vertical Align', 'ssc' ), 'selector' => 'div'),
									array('property' => 'background'),
									array('property' => 'display', 'label' => esc_html__( 'Display', 'ssc' )),
									array('property' => 'float', 'label' => esc_html__( 'Float', 'ssc' )),
									array('property' => 'width', 'label' => esc_html__( 'Width', 'ssc' )),
									array('property' => 'max-width', 'label' => esc_html__( 'Max Width', 'ssc' )),
									array('property' => 'height', 'label' => esc_html__( 'Height', 'ssc' )),
                                    array('property' => 'max-height', 'label' => esc_html__( 'Max Height', 'ssc' )),
									array('property' => 'box-shadow', 'label' => esc_html__( 'Box Shadow', 'ssc' )),
									array('property' => 'opacity', 'label' => esc_html__( 'Opacity', 'ssc' )),
									array('property' => 'margin', 'label' => esc_html__( 'Margin', 'ssc' )),
									array('property' => 'padding', 'label' => esc_html__( 'Padding', 'ssc' )),
									array('property' => 'border', 'label' => esc_html__( 'Border', 'ssc' )),
									array('property' => 'border-radius', 'label' => esc_html__( 'Border Radius', 'ssc' )),
								),
								'Image' => array(
									array('property' => 'text-align', 'label' => esc_html__( 'Image Alignment', 'ssc' ), 'selector' => 'img'),
									array('property' => 'display', 'label' => esc_html__( 'Image Display', 'ssc' ), 'selector' => 'img'),
									array('property' => 'float', 'label' => esc_html__( 'Image Float', 'ssc' ), 'selector' => 'img'),
									array('property' => 'background-color', 'label' => esc_html__( 'Background Color', 'ssc' ), 'selector' => 'img'),
									array('property' => 'box-shadow', 'label' => esc_html__( 'Box Shadow', 'ssc' ), 'selector' => 'img'),
									array( 'property' => 'opacity', 'label'    => esc_html__( 'Opacity', 'ssc' ), 'selector' => 'img', ),
									array('property' => 'border', 'label' => esc_html__( 'Border', 'ssc' ), 'selector' => 'img'),
									array('property' => 'border-radius', 'label' => esc_html__( 'Border Radius', 'ssc' ), 'selector' => 'img'),
									array('property' => 'width', 'label' => esc_html__( 'Width', 'ssc' ), 'selector' => 'img'),
									array('property' => 'height', 'label' => esc_html__( 'Height', 'ssc' ), 'selector' => 'img'),
									array('property' => 'min-height', 'label' => esc_html__( 'Min Height', 'ssc' ), 'selector' => 'img'),
									array('property' => 'max-height', 'label' => esc_html__( 'Max Height', 'ssc' ), 'selector' => 'img'),
									array('property' => 'max-width', 'label' => esc_html__( 'Max Width', 'ssc' ), 'selector' => 'img'),
									array('property' => 'vertical-align', 'label' => esc_html__( 'Vertical Align', 'ssc' ), 'selector' => 'img'),
									array('property' => 'margin', 'label' => esc_html__( 'Margin', 'ssc' ), 'selector' => 'img'),
									array('property' => 'padding', 'label' => esc_html__( 'Padding', 'ssc' ), 'selector' => 'img')
								),
								'Img Box' => array(
									array('property' => 'text-align', 'label' => esc_html__( 'Text Align', 'ssc' ), 'selector' => '.iw'),
									array('property' => 'vertical-align', 'label' => esc_html__('Vertical Align', 'ssc' ), 'selector' => '.iw'),
									array('property' => 'background', 'selector' => '.iw'),
									array('property' => 'display', 'label' => esc_html__( 'Display', 'ssc' ), 'selector' => '.iw'),
									array('property' => 'float', 'label' => esc_html__( 'Float', 'ssc' ), 'selector' => '.iw'),
									array('property' => 'width', 'label' => esc_html__( 'Width', 'ssc' ), 'selector' => '.iw'),
									array('property' => 'height', 'label' => esc_html__( 'Height', 'ssc' ), 'selector' => '.iw'),
									array('property' => 'box-shadow', 'label' => esc_html__( 'Box Shadow', 'ssc' ), 'selector' => '.iw'),
									array('property' => 'opacity', 'label' => esc_html__( 'Opacity', 'ssc' ), 'selector' => '.iw'),
									array('property' => 'margin', 'label' => esc_html__( 'Margin', 'ssc' ), 'selector' => '.iw'),
									array('property' => 'padding', 'label' => esc_html__( 'Padding', 'ssc' ), 'selector' => '.iw'),
									array('property' => 'border', 'label' => esc_html__( 'Border', 'ssc' ), 'selector' => '.iw'),
									array('property' => 'border-radius', 'label' => esc_html__( 'Border Radius', 'ssc' ), 'selector' => '.iw'),
								),
								'Text Box' => array(
									array('property' => 'text-align', 'label' => esc_html__( 'Text Align', 'ssc' ), 'selector' => '.ieslide'),
									array('property' => 'vertical-align', 'label' => esc_html__('Vertical Align', 'ssc' ), 'selector' => '.ieslide div'),
									array('property' => 'background', 'selector' => '.ieslide'),
									array('property' => 'display', 'label' => esc_html__( 'Display', 'ssc' ), 'selector' => '.ieslide div'),
									array('property' => 'float', 'label' => esc_html__( 'Float', 'ssc' ), 'selector' => '.ieslide'),
									array('property' => 'width', 'label' => esc_html__( 'Width', 'ssc' ), 'selector' => '.ieslide'),
									array('property' => 'height', 'label' => esc_html__( 'Height', 'ssc' ), 'selector' => '.ieslide'),
									array('property' => 'box-shadow', 'label' => esc_html__( 'Box Shadow', 'ssc' ), 'selector' => '.ieslide'),
									array('property' => 'opacity', 'label' => esc_html__( 'Opacity', 'ssc' ), 'selector' => '.ieslide'),
									array('property' => 'margin', 'label' => esc_html__( 'Margin', 'ssc' ), 'selector' => '.ieslide'),
									array('property' => 'padding', 'label' => esc_html__( 'Padding', 'ssc' ), 'selector' => '.ieslide'),
									array('property' => 'border', 'label' => esc_html__( 'Border', 'ssc' ), 'selector' => '.ieslide'),
									array('property' => 'border-radius', 'label' => esc_html__( 'Border Radius', 'ssc' ), 'selector' => '.ieslide'),
								),
								'Title' => array(
									array('property' => 'color', 'label' => esc_html__('Color', 'ssc' ), 'selector' => 'strong, a strong'),
									array('property' => 'background-color', 'label' => esc_html__('Background Color', 'ssc' ), 'selector' => 'strong, a strong'),
									array('property' => 'background', 'selector' => 'strong, a strong'),
									array('property' => 'font-size', 'label' => esc_html__('Font Size', 'ssc' ), 'selector' => 'strong, a strong'),
									array('property' => 'line-height', 'label' => esc_html__('Line Height', 'ssc' ), 'selector' => 'strong, a strong'),
									array('property' => 'font-weight', 'label' => esc_html__('Font Weight', 'ssc' ), 'selector' => 'strong, a strong'),
									array('property' => 'font-family', 'label' => esc_html__('Font Family', 'ssc' ), 'selector' => 'strong, a strong'),
									array('property' => 'text-transform', 'label' => esc_html__('Text Transform', 'ssc' ), 'selector' => 'strong, a strong'),
									array('property' => 'text-decoration', 'label' => esc_html__('Text Decoration', 'ssc' ), 'selector' => 'strong, a strong'),
									array('property' => 'font-style', 'label' => esc_html__('Font Style', 'ssc' ), 'selector' => 'strong, a strong'),
									array('property' => 'text-align', 'label' => esc_html__('Text Align', 'ssc' ), 'selector' => 'strong, a strong'),
									array('property' => 'width', 'label' => esc_html__( 'Width', 'ssc' ), 'selector' => 'strong, a strong'),
									array('property' => 'display', 'label' => esc_html__( 'Display', 'ssc' ), 'selector' => 'strong, a strong'),
									array('property' => 'text-shadow', 'label' => esc_html__('Text Shadow', 'ssc' ), 'selector' => 'strong, a strong'),
									array('property' => 'letter-spacing', 'label' => esc_html__('Letter Spacing', 'ssc' ), 'selector' => 'strong, a strong'),
									array('property' => 'word-break', 'label' => esc_html__('Word Break', 'ssc' ), 'selector' => 'strong, a strong'),
									array('property' => 'border', 'label' => esc_html__('Border', 'ssc' ), 'selector' => 'strong, a strong'),
									array('property' => 'margin', 'label' => esc_html__('Margin', 'ssc' ), 'selector' => 'strong, a strong'),
									array('property' => 'padding', 'label' =>esc_html__( 'Padding', 'ssc' ), 'selector' => 'strong, a strong')
								),
								'Description' => array(
									array('property' => 'color', 'label' => esc_html__('Color', 'ssc' ), 'selector' => '.mov'),
									array('property' => 'background-color', 'label' => esc_html__('Background Color', 'ssc' ), 'selector' => '.mov'),
									array('property' => 'font-size', 'label' => esc_html__('Font Size', 'ssc' ), 'selector' => '.mov'),
									array('property' => 'line-height', 'label' => esc_html__('Line Height', 'ssc' ), 'selector' => '.mov'),
									array('property' => 'font-weight', 'label' => esc_html__('Font Weight', 'ssc' ), 'selector' => '.mov'),
									array('property' => 'font-family', 'label' => esc_html__('Font Family', 'ssc' ), 'selector' => '.mov'),
									array('property' => 'text-transform', 'label' => esc_html__('Text Transform', 'ssc' ), 'selector' => '.mov'),
									array('property' => 'text-decoration', 'label' => esc_html__('Text Decoration', 'ssc' ), 'selector' => '.mov'),
									array('property' => 'font-style', 'label' => esc_html__('Font Style', 'ssc' ), 'selector' => '.mov'),
									array('property' => 'text-align', 'label' => esc_html__('Text Align', 'ssc' ), 'selector' => '.mov'),
									array('property' => 'text-shadow', 'label' => esc_html__('Text Shadow', 'ssc' ), 'selector' => '.mov'),
									array('property' => 'letter-spacing', 'label' => esc_html__('Letter Spacing', 'ssc' ), 'selector' => '.mov'),
									array('property' => 'word-break', 'label' => esc_html__('Word Break', 'ssc' ), 'selector' => '.mov'),
									array('property' => 'display', 'label' => esc_html__( 'Display', 'ssc' ), 'selector' => '.mov'),
									array('property' => 'border', 'label' => esc_html__('Border', 'ssc' ), 'selector' => '.mov'),
									array('property' => 'margin', 'label' => esc_html__('Margin', 'ssc' ), 'selector' => '.mov'),
									array('property' => 'padding', 'label' =>esc_html__( 'Padding', 'ssc' ), 'selector' => '.mov')
								),
								'Icon' => array(
									array('property' => 'color', 'label' => esc_html__('Color', 'ssc' ), 'selector' => 'i, a i'),
									array('property' => 'background-color', 'label' => esc_html__('Background Color', 'ssc' ), 'selector' => 'i, a i'),
									array('property' => 'font-size', 'label' => esc_html__('Font Size', 'ssc' ), 'selector' => 'i, a i'),
									array('property' => 'line-height', 'label' => esc_html__('Line Height', 'ssc' ), 'selector' => 'i, a i'),
									array('property' => 'font-weight', 'label' => esc_html__('Font Weight', 'ssc' ), 'selector' => 'i, a i'),
									array('property' => 'font-family', 'label' => esc_html__('Font Family', 'ssc' ), 'selector' => 'i, a i'),
									array('property' => 'text-transform', 'label' => esc_html__('Text Transform', 'ssc' ), 'selector' => 'i, a i'),
									array('property' => 'text-decoration', 'label' => esc_html__('Text Decoration', 'ssc' ), 'selector' => 'i, a i'),
									array('property' => 'font-style', 'label' => esc_html__('Font Style', 'ssc' ), 'selector' => 'i, a i'),
									array('property' => 'text-align', 'label' => esc_html__('Text Align', 'ssc' ), 'selector' => 'i, a i'),
									array('property' => 'text-shadow', 'label' => esc_html__('Text Shadow', 'ssc' ), 'selector' => 'i, a i'),
									array('property' => 'letter-spacing', 'label' => esc_html__('Letter Spacing', 'ssc' ), 'selector' => 'i, a i'),
									array('property' => 'width', 'label' =>  esc_html__( 'Width', 'ssc' ), 'selector' => 'i, a i'),
									array('property' => 'height', 'label' =>  esc_html__( 'Height', 'ssc' ), 'selector' => 'i, a i'),
									array('property' => 'display', 'label' => esc_html__( 'Display', 'ssc' ), 'selector' => 'i, a i'),
									array('property' => 'float', 'label' => esc_html__( 'Float', 'ssc' ), 'selector' => 'i, a i'),
									array('property' => 'border', 'label' => esc_html__('Border', 'ssc' ), 'selector' => 'i, a i'),
									array('property' => 'border-radius', 'label' => esc_html__( 'Border Radius', 'ssc' ), 'selector' => 'i, a i'),
									array('property' => 'margin', 'label' => esc_html__('Margin', 'ssc' ), 'selector' => 'i, a i'),
									array('property' => 'padding', 'label' =>esc_html__( 'Padding', 'ssc' ), 'selector' => 'i, a i')
								),
								'Icon Box' => array(
									array('property' => 'color', 'label' => esc_html__('Color', 'ssc' ), 'selector' => '.ib'),
									array('property' => 'background-color', 'label' => esc_html__('Background Color', 'ssc' ), 'selector' => '.ib'),
									array('property' => 'font-size', 'label' => esc_html__('Font Size', 'ssc' ), 'selector' => '.ib'),
									array('property' => 'line-height', 'label' => esc_html__('Line Height', 'ssc' ), 'selector' => '.ib'),
									array('property' => 'font-weight', 'label' => esc_html__('Font Weight', 'ssc' ), 'selector' => '.ib'),
									array('property' => 'font-family', 'label' => esc_html__('Font Family', 'ssc' ), 'selector' => '.ib'),
									array('property' => 'text-transform', 'label' => esc_html__('Text Transform', 'ssc' ), 'selector' => '.ib'),
									array('property' => 'text-decoration', 'label' => esc_html__('Text Decoration', 'ssc' ), 'selector' => '.ib'),
									array('property' => 'font-style', 'label' => esc_html__('Font Style', 'ssc' ), 'selector' => '.ib'),
									array('property' => 'text-align', 'label' => esc_html__('Text Align', 'ssc' ), 'selector' => '.ib'),
									array('property' => 'text-shadow', 'label' => esc_html__('Text Shadow', 'ssc' ), 'selector' => '.ib'),
									array('property' => 'letter-spacing', 'label' => esc_html__('Letter Spacing', 'ssc' ), 'selector' => '.ib'),
                                    array('property' => 'opacity', 'label' => esc_html__( 'Opacity', 'ssc' ), 'selector' => '.ib'),
									array('property' => 'width', 'label' =>  esc_html__( 'Width', 'ssc' ), 'selector' => '.ib'),
									array('property' => 'height', 'label' =>  esc_html__( 'Height', 'ssc' ), 'selector' => '.ib'),
									array('property' => 'display', 'label' => esc_html__( 'Display', 'ssc' ), 'selector' => '.ib'),
									array('property' => 'float', 'label' => esc_html__( 'Float', 'ssc' ), 'selector' => '.ib'),
									array('property' => 'border', 'label' => esc_html__('Border', 'ssc' ), 'selector' => '.ib'),
									array('property' => 'border-radius', 'label' => esc_html__( 'Border Radius', 'ssc' ), 'selector' => '.ib'),
									array('property' => 'margin', 'label' => esc_html__('Margin', 'ssc' ), 'selector' => '.ib'),
									array('property' => 'padding', 'label' =>esc_html__( 'Padding', 'ssc' ), 'selector' => '.ib')
								),
								'link' => array(
									array('property' => 'color', 'label' => esc_html__( 'Color', 'ssc' ), 'selector' => ' .rm'),
									array('property' => 'font-size', 'label' => esc_html__( 'Font Size', 'ssc' ), 'selector' => ' .rm'),
									array('property' => 'line-height', 'label' => esc_html__( 'Line Height', 'ssc' ), 'selector' => ' .rm'),
									array('property' => 'font-weight', 'label' => esc_html__( 'Font Weight', 'ssc' ), 'selector' => ' .rm'),
									array('property' => 'font-style', 'label' => esc_html__( 'Font Style', 'ssc' ), 'selector' => ' .rm'),
									array('property' => 'font-family', 'label' => esc_html__( 'Font Family', 'ssc' ), 'selector' => ' .rm'),
									array('property' => 'text-align', 'label' => esc_html__( 'Text Align', 'ssc' ), 'selector' => ' .rm'),
									array('property' => 'text-transform', 'label' => esc_html__( 'Text Transform', 'ssc' ), 'selector' => ' .rm'),
									array('property' => 'text-decoration', 'label' => esc_html__( 'Text Decoration', 'ssc' ), 'selector' => ' .rm'),
									array('property' => 'opacity', 'label' => esc_html__( 'Opacity', 'ssc' ), 'selector' => ' .rm'),
									array('property' => 'background', 'selector' => ' .rm'),
									array('property' => 'width', 'label' => esc_html__( 'Width', 'ssc' ), 'selector' => ' .rm'),
									array('property' => 'float', 'label' => esc_html__( 'Float', 'ssc' ), 'selector' => ' .rm'),
									array('property' => 'display', 'label' => esc_html__( 'Display', 'ssc' ), 'selector' => ' .rm'),
									array('property' => 'margin', 'label' => esc_html__( 'Margin', 'ssc' ), 'selector' => ' .rm'),
									array('property' => 'padding', 'label' => esc_html__( 'Padding', 'ssc' ), 'selector' => ' .rm'),
									array('property' => 'border', 'label' => esc_html__( 'Border', 'ssc' ), 'selector' => ' .rm'),
									array('property' => 'border-radius', 'label' => esc_html__( 'Border Radius', 'ssc' ), 'selector' => ' .rm'),
								),
								'SVG' => array(
									array('property' => 'fill', 'label' => esc_html__( 'Fill', 'ssc' ), 'selector' => ' .ib svg'),
									array('property' => 'fill', 'label' => esc_html__( 'Fill', 'ssc' ) . ' ' . esc_html__( 'Hover', 'ssc' ), 'selector' => ' .ib:hover svg'),
									array('property' => 'width', 'label' => esc_html__( 'Width', 'ssc' ), 'selector' => '.ib svg'),
									array('property' => 'height', 'label' => esc_html__( 'Height', 'ssc' ), 'selector' => '.ib svg'),
									array('property' => 'display', 'label' => esc_html__( 'Display', 'ssc' ), 'selector' => '.ib svg'),
									array('property' => 'float', 'label' => esc_html__( 'Float', 'ssc' ), 'selector' => '.ib svg'),
								),
							)
						)
					)
				),
				'hover'  => array(
					array(
						'label'			=> esc_html__( 'Hover CSS', 'ssc' ),
						'name'    => 'custom_css_hov',
						'type'    => 'css',
						'value'    => '',
						'options'		=> array(
							array(
								"screens" => "any,1024,999,767,479",
								'Box' => array(
									array('property' => 'text-align', 'label' => esc_html__( 'Text Align', 'ssc' ), 'selector' => '+:hover'),
									array('property' => 'vertical-align', 'label' => esc_html__('Vertical Align', 'ssc' ), 'selector' => '+:hover'),
									array('property' => 'background', 'selector' => '+:hover'),
									array('property' => 'display', 'label' => esc_html__( 'Display', 'ssc' ), 'selector' => '+:hover'),
									array('property' => 'float', 'label' => esc_html__( 'Float', 'ssc' ), 'selector' => '+:hover'),
									array('property' => 'width', 'label' => esc_html__( 'Width', 'ssc' ), 'selector' => '+:hover'),
									array('property' => 'height', 'label' => esc_html__( 'Height', 'ssc' ), 'selector' => '+:hover'),
									array('property' => 'box-shadow', 'label' => esc_html__( 'Box Shadow', 'ssc' ), 'selector' => '+:hover'),
									array('property' => 'opacity', 'label' => esc_html__( 'Opacity', 'ssc' ), 'selector' => '+:hover'),
									array('property' => 'margin', 'label' => esc_html__( 'Margin', 'ssc' ), 'selector' => '+:hover'),
									array('property' => 'padding', 'label' => esc_html__( 'Padding', 'ssc' ), 'selector' => '+:hover'),
									array('property' => 'border', 'label' => esc_html__( 'Border', 'ssc' ), 'selector' => '+:hover'),
									array('property' => 'border-radius', 'label' => esc_html__( 'Border Radius', 'ssc' ), 'selector' => '+:hover'),
								),
								'Image' => array(
									array('property' => 'text-align', 'label' => esc_html__( 'Image Alignment', 'ssc' ), 'selector' => '+:hover img'),
									array('property' => 'display', 'label' => esc_html__( 'Image Display', 'ssc' ), 'selector' => '+:hover img'),
									array('property' => 'float', 'label' => esc_html__( 'Image Float', 'ssc' ), 'selector' => '+:hover img'),
									array('property' => 'background-color', 'label' => esc_html__( 'Background Color', 'ssc' ), 'selector' => '+:hover img'),
									array('property' => 'box-shadow', 'label' => esc_html__( 'Box Shadow', 'ssc' ), 'selector' => '+:hover img'),
									array( 'property' => 'opacity', 'label'    => esc_html__( 'Opacity', 'ssc' ), 'selector' => '+:hover img', ),
									array('property' => 'border', 'label' => esc_html__( 'Border', 'ssc' ), 'selector' => '+:hover img'),
									array('property' => 'border-radius', 'label' => esc_html__( 'Border Radius', 'ssc' ), 'selector' => '+:hover img'),
									array('property' => 'width', 'label' => esc_html__( 'Width', 'ssc' ), 'selector' => '+:hover img'),
									array('property' => 'height', 'label' => esc_html__( 'Height', 'ssc' ), 'selector' => '+:hover img'),
									array('property' => 'max-width', 'label' => esc_html__( 'Max Width', 'ssc' ), 'selector' => '+:hover img'),
									array('property' => 'vertical-align', 'label' => esc_html__( 'Vertical Align', 'ssc' ), 'selector' => '+:hover img'),
									array('property' => 'margin', 'label' => esc_html__( 'Margin', 'ssc' ), 'selector' => '+:hover img'),
									array('property' => 'padding', 'label' => esc_html__( 'Padding', 'ssc' ), 'selector' => '+:hover img')
								),
								'Img Box' => array(
									array('property' => 'text-align', 'label' => esc_html__( 'Text Align', 'ssc' ), 'selector' => '+:hover .iw'),
									array('property' => 'vertical-align', 'label' => esc_html__('Vertical Align', 'ssc' ), 'selector' => '+:hover .iw'),
									array('property' => 'background', 'selector' => '+:hover .iw'),
									array('property' => 'display', 'label' => esc_html__( 'Display', 'ssc' ), 'selector' => '+:hover .iw'),
									array('property' => 'float', 'label' => esc_html__( 'Float', 'ssc' ), 'selector' => '+:hover .iw'),
									array('property' => 'width', 'label' => esc_html__( 'Width', 'ssc' ), 'selector' => '+:hover .iw'),
									array('property' => 'height', 'label' => esc_html__( 'Height', 'ssc' ), 'selector' => '+:hover .iw'),
									array('property' => 'box-shadow', 'label' => esc_html__( 'Box Shadow', 'ssc' ), 'selector' => '+:hover .iw'),
									array('property' => 'opacity', 'label' => esc_html__( 'Opacity', 'ssc' ), 'selector' => '+:hover .iw'),
									array('property' => 'margin', 'label' => esc_html__( 'Margin', 'ssc' ), 'selector' => '+:hover .iw'),
									array('property' => 'padding', 'label' => esc_html__( 'Padding', 'ssc' ), 'selector' => '+:hover .iw'),
									array('property' => 'border', 'label' => esc_html__( 'Border', 'ssc' ), 'selector' => '+:hover .iw'),
									array('property' => 'border-radius', 'label' => esc_html__( 'Border Radius', 'ssc' ), 'selector' => '+:hover .iw'),
								),
								'Text Box' => array(
									array('property' => 'text-align', 'label' => esc_html__( 'Text Align', 'ssc' ), 'selector' => '+:hover .ieslide'),
									array('property' => 'vertical-align', 'label' => esc_html__('Vertical Align', 'ssc' ), 'selector' => '+:hover .ieslide'),
									array('property' => 'background', 'selector' => '+:hover .ieslide'),
									array('property' => 'display', 'label' => esc_html__( 'Display', 'ssc' ), 'selector' => '+:hover .ieslide'),
									array('property' => 'float', 'label' => esc_html__( 'Float', 'ssc' ), 'selector' => '+:hover .ieslide'),
									array('property' => 'width', 'label' => esc_html__( 'Width', 'ssc' ), 'selector' => '+:hover .ieslide'),
									array('property' => 'height', 'label' => esc_html__( 'Height', 'ssc' ), 'selector' => '+:hover .ieslide'),
									array('property' => 'box-shadow', 'label' => esc_html__( 'Box Shadow', 'ssc' ), 'selector' => '+:hover .ieslide'),
									array('property' => 'opacity', 'label' => esc_html__( 'Opacity', 'ssc' ), 'selector' => '+:hover .ieslide'),
									array('property' => 'margin', 'label' => esc_html__( 'Margin', 'ssc' ), 'selector' => '+:hover .ieslide'),
									array('property' => 'padding', 'label' => esc_html__( 'Padding', 'ssc' ), 'selector' => '+:hover .ieslide'),
									array('property' => 'border', 'label' => esc_html__( 'Border', 'ssc' ), 'selector' => '+:hover .ieslide'),
									array('property' => 'border-radius', 'label' => esc_html__( 'Border Radius', 'ssc' ), 'selector' => '+:hover .ieslide'),
								),
								'Title' => array(
									array('property' => 'color', 'label' => esc_html__('Color', 'ssc' ), 'selector' => 'strong:hover, a:hover strong'),
									array('property' => 'background-color', 'label' => esc_html__('Background Color', 'ssc' ), 'selector' => 'strong:hover, a:hover strong'),
									array('property' => 'font-size', 'label' => esc_html__('Font Size', 'ssc' ), 'selector' => 'strong:hover, a:hover strong'),
									array('property' => 'line-height', 'label' => esc_html__('Line Height', 'ssc' ), 'selector' => 'strong:hover, a:hover strong'),
									array('property' => 'font-weight', 'label' => esc_html__('Font Weight', 'ssc' ), 'selector' => 'strong:hover, a:hover strong'),
									array('property' => 'font-family', 'label' => esc_html__('Font Family', 'ssc' ), 'selector' => 'strong:hover, a:hover strong'),
									array('property' => 'text-transform', 'label' => esc_html__('Text Transform', 'ssc' ), 'selector' => 'strong:hover, a:hover strong'),
									array('property' => 'text-decoration', 'label' => esc_html__('Text Decoration', 'ssc' ), 'selector' => 'strong:hover, a:hover strong'),
									array('property' => 'font-style', 'label' => esc_html__('Font Style', 'ssc' ), 'selector' => 'strong:hover, a:hover strong'),
									array('property' => 'text-align', 'label' => esc_html__('Text Align', 'ssc' ), 'selector' => 'strong:hover, a:hover strong'),
									array('property' => 'text-shadow', 'label' => esc_html__('Text Shadow', 'ssc' ), 'selector' => 'strong:hover, a:hover strong'),
									array('property' => 'letter-spacing', 'label' => esc_html__('Letter Spacing', 'ssc' ), 'selector' => 'strong:hover, a:hover strong'),
									array('property' => 'word-break', 'label' => esc_html__('Word Break', 'ssc' ), 'selector' => 'strong:hover, a:hover strong'),
									array('property' => 'display', 'label' => esc_html__( 'Display', 'ssc' ), 'selector' => 'strong:hover, a:hover strong'),
									array('property' => 'border', 'label' => esc_html__('Border', 'ssc' ), 'selector' => 'strong:hover, a:hover strong'),
									array('property' => 'margin', 'label' => esc_html__('Margin', 'ssc' ), 'selector' => 'strong:hover, a:hover strong'),
									array('property' => 'padding', 'label' =>esc_html__( 'Padding', 'ssc' ), 'selector' => 'strong:hover, a:hover strong')
								),
								'Description' => array(
									array('property' => 'color', 'label' => esc_html__('Color', 'ssc' ), 'selector' => '+:hover .mov'),
									array('property' => 'background-color', 'label' => esc_html__('Background Color', 'ssc' ), 'selector' => '+:hover .mov'),
									array('property' => 'font-size', 'label' => esc_html__('Font Size', 'ssc' ), 'selector' => '+:hover .mov'),
									array('property' => 'line-height', 'label' => esc_html__('Line Height', 'ssc' ), 'selector' => '+:hover .mov'),
									array('property' => 'font-weight', 'label' => esc_html__('Font Weight', 'ssc' ), 'selector' => '+:hover .mov'),
									array('property' => 'font-family', 'label' => esc_html__('Font Family', 'ssc' ), 'selector' => '+:hover .mov'),
									array('property' => 'text-transform', 'label' => esc_html__('Text Transform', 'ssc' ), 'selector' => '+:hover .mov'),
									array('property' => 'text-decoration', 'label' => esc_html__('Text Decoration', 'ssc' ), 'selector' => '+:hover .mov'),
									array('property' => 'font-style', 'label' => esc_html__('Font Style', 'ssc' ), 'selector' => '+:hover .mov'),
									array('property' => 'text-align', 'label' => esc_html__('Text Align', 'ssc' ), 'selector' => '+:hover .mov'),
									array('property' => 'text-shadow', 'label' => esc_html__('Text Shadow', 'ssc' ), 'selector' => '+:hover .mov'),
									array('property' => 'letter-spacing', 'label' => esc_html__('Letter Spacing', 'ssc' ), 'selector' => '+:hover .mov'),
									array('property' => 'word-break', 'label' => esc_html__('Word Break', 'ssc' ), 'selector' => '+:hover .mov'),
									array('property' => 'display', 'label' => esc_html__( 'Display', 'ssc' ), 'selector' => '+:hover .mov'),
									array('property' => 'border', 'label' => esc_html__('Border', 'ssc' ), 'selector' => '+:hover .mov'),
									array('property' => 'margin', 'label' => esc_html__('Margin', 'ssc' ), 'selector' => '+:hover .mov'),
									array('property' => 'padding', 'label' =>esc_html__( 'Padding', 'ssc' ), 'selector' => '+:hover .mov')
								),
								'Icon' => array(
									array('property' => 'color', 'label' => esc_html__('Color', 'ssc' ), 'selector' => 'i:hover, a:hover i'),
									array('property' => 'background-color', 'label' => esc_html__('Background Color', 'ssc' ), 'selector' => 'i:hover, a:hover i'),
									array('property' => 'font-size', 'label' => esc_html__('Font Size', 'ssc' ), 'selector' => 'i:hover, a:hover i'),
									array('property' => 'line-height', 'label' => esc_html__('Line Height', 'ssc' ), 'selector' => 'i:hover, a:hover i'),
									array('property' => 'font-weight', 'label' => esc_html__('Font Weight', 'ssc' ), 'selector' => 'i:hover, a:hover i'),
									array('property' => 'font-family', 'label' => esc_html__('Font Family', 'ssc' ), 'selector' => 'i:hover, a:hover i'),
									array('property' => 'text-transform', 'label' => esc_html__('Text Transform', 'ssc' ), 'selector' => 'i:hover, a:hover i'),
									array('property' => 'text-decoration', 'label' => esc_html__('Text Decoration', 'ssc' ), 'selector' => 'i:hover, a:hover i'),
									array('property' => 'font-style', 'label' => esc_html__('Font Style', 'ssc' ), 'selector' => 'i:hover, a:hover i'),
									array('property' => 'text-align', 'label' => esc_html__('Text Align', 'ssc' ), 'selector' => 'i:hover, a:hover i'),
									array('property' => 'text-shadow', 'label' => esc_html__('Text Shadow', 'ssc' ), 'selector' => 'i:hover, a:hover i'),
									array('property' => 'letter-spacing', 'label' => esc_html__('Letter Spacing', 'ssc' ), 'selector' => 'i:hover, a:hover i'),
									array('property' => 'width', 'label' =>  esc_html__( 'Width', 'ssc' ), 'selector' => 'i:hover, a:hover i'),
									array('property' => 'height', 'label' =>  esc_html__( 'Height', 'ssc' ), 'selector' => 'i:hover, a:hover i'),
									array('property' => 'display', 'label' => esc_html__( 'Display', 'ssc' ), 'selector' => 'i:hover, a:hover i'),
									array('property' => 'float', 'label' => esc_html__( 'Float', 'ssc' ), 'selector' => 'i:hover, a:hover i'),
									array('property' => 'border', 'label' => esc_html__('Border', 'ssc' ), 'selector' => 'i:hover, a:hover i'),
									array('property' => 'border-radius', 'label' => esc_html__( 'Border Radius', 'ssc' ), 'selector' => 'i:hover, a:hover i'),
									array('property' => 'margin', 'label' => esc_html__('Margin', 'ssc' ), 'selector' => 'i:hover, a:hover i'),
									array('property' => 'padding', 'label' =>esc_html__( 'Padding', 'ssc' ), 'selector' => 'i:hover, a:hover i')
								),
								'Icon Box' => array(
									array('property' => 'color', 'label' => esc_html__('Color', 'ssc' ), 'selector' => '.ib:hover:hover'),
									array('property' => 'background-color', 'label' => esc_html__('Background Color', 'ssc' ), 'selector' => '.ib:hover'),
									array('property' => 'font-size', 'label' => esc_html__('Font Size', 'ssc' ), 'selector' => '.ib:hover'),
									array('property' => 'line-height', 'label' => esc_html__('Line Height', 'ssc' ), 'selector' => '.ib:hover'),
									array('property' => 'font-weight', 'label' => esc_html__('Font Weight', 'ssc' ), 'selector' => '.ib:hover'),
									array('property' => 'font-family', 'label' => esc_html__('Font Family', 'ssc' ), 'selector' => '.ib:hover'),
									array('property' => 'text-transform', 'label' => esc_html__('Text Transform', 'ssc' ), 'selector' => '.ib:hover'),
									array('property' => 'text-decoration', 'label' => esc_html__('Text Decoration', 'ssc' ), 'selector' => '.ib:hover'),
									array('property' => 'font-style', 'label' => esc_html__('Font Style', 'ssc' ), 'selector' => '.ib:hover'),
									array('property' => 'text-align', 'label' => esc_html__('Text Align', 'ssc' ), 'selector' => '.ib:hover'),
									array('property' => 'text-shadow', 'label' => esc_html__('Text Shadow', 'ssc' ), 'selector' => '.ib:hover'),
									array('property' => 'letter-spacing', 'label' => esc_html__('Letter Spacing', 'ssc' ), 'selector' => '.ib:hover'),
                                    array('property' => 'opacity', 'label' => esc_html__( 'Opacity', 'ssc' ), 'selector' => '.ib:hover'),
                                    array('property' => 'opacity', 'label' => esc_html__( 'Opacity Block Hover', 'ssc' ), 'selector' => '+:hover .ib'),
									array('property' => 'width', 'label' =>  esc_html__( 'Width', 'ssc' ), 'selector' => '.ib:hover'),
									array('property' => 'height', 'label' =>  esc_html__( 'Height', 'ssc' ), 'selector' => '.ib:hover'),
									array('property' => 'display', 'label' => esc_html__( 'Display', 'ssc' ), 'selector' => '.ib:hover'),
									array('property' => 'float', 'label' => esc_html__( 'Float', 'ssc' ), 'selector' => '.ib:hover'),
									array('property' => 'border', 'label' => esc_html__('Border', 'ssc' ), 'selector' => '.ib:hover'),
									array('property' => 'border-radius', 'label' => esc_html__( 'Border Radius', 'ssc' ), 'selector' => '.ib:hover'),
									array('property' => 'margin', 'label' => esc_html__('Margin', 'ssc' ), 'selector' => '.ib:hover'),
									array('property' => 'padding', 'label' =>esc_html__( 'Padding', 'ssc' ), 'selector' => '.ib:hover')
								),
								'link' => array(
									array('property' => 'color', 'label' => esc_html__( 'Color', 'ssc' ), 'selector' => ' .rm:hover'),
									array('property' => 'color', 'label' => esc_html__( 'Block Hover Color', 'ssc' ), 'selector' => '+:hover .rm'),
									array('property' => 'font-size', 'label' => esc_html__( 'Font Size', 'ssc' ), 'selector' => ' .rm:hover'),
									array('property' => 'line-height', 'label' => esc_html__( 'Line Height', 'ssc' ), 'selector' => ' .rm:hover'),
									array('property' => 'font-weight', 'label' => esc_html__( 'Font Weight', 'ssc' ), 'selector' => ' .rm:hover'),
									array('property' => 'font-style', 'label' => esc_html__( 'Font Style', 'ssc' ), 'selector' => ' .rm:hover'),
									array('property' => 'font-family', 'label' => esc_html__( 'Font Family', 'ssc' ), 'selector' => ' .rm:hover'),
									array('property' => 'text-align', 'label' => esc_html__( 'Text Align', 'ssc' ), 'selector' => ' .rm:hover'),
									array('property' => 'text-transform', 'label' => esc_html__( 'Text Transform', 'ssc' ), 'selector' => ' .rm:hover'),
									array('property' => 'text-decoration', 'label' => esc_html__( 'Text Decoration', 'ssc' ), 'selector' => ' .rm:hover'),
                                    array('property' => 'opacity', 'label' => esc_html__( 'Opacity', 'ssc' ), 'selector' => '+:hover .rm'),
									array('property' => 'background', 'selector' => ' .rm:hover'),
									array('property' => 'width', 'label' => esc_html__( 'Width', 'ssc' ), 'selector' => ' .rm:hover'),
									array('property' => 'float', 'label' => esc_html__( 'Float', 'ssc' ), 'selector' => ' .rm:hover'),
									array('property' => 'display', 'label' => esc_html__( 'Display', 'ssc' ), 'selector' => ' .rm:hover'),
									array('property' => 'margin', 'label' => esc_html__( 'Margin', 'ssc' ), 'selector' => ' .rm:hover'),
									array('property' => 'padding', 'label' => esc_html__( 'Padding', 'ssc' ), 'selector' => ' .rm:hover'),
									array('property' => 'border', 'label' => esc_html__( 'Border', 'ssc' ), 'selector' => ' .rm:hover'),
									array('property' => 'border-radius', 'label' => esc_html__( 'Border Radius', 'ssc' ), 'selector' => ' .rm:hover'),
								),
							)
						)
					)
				),
				'animate' => array(
					array(
						'name'    => 'animate',
						'type'    => 'animate'
					)
				),
			)
		)
	));
}

// Register Shortcode

function ssc_image_effect_shortcode($atts, $content = null) {
	$img_size = $on_click_action = $custom_link = $hover_effect = $caption = $template = $blockscale = $link_text = '';
	$monocolored = '0';
	extract(shortcode_atts(array(
		'template' => '',
		'image' => '',
		'img_size' => '',
		'custom_img_size' => '',
		'alt' => '',
		'caption' => '',
		'description' => '',
		'monocolored' => '',
		'strength' => '',
		'hover_effect' => '',
		'on_click_action' => '',
		'custom_link' => '',
		'link_text'         => '',
		'show_icon' => '',
		'icon' => '',
		'svg_icon' => '',
		'svg_icon_color' => '',
		'svg_icon_hcolor' => '',
		'image_position' => '',
		'left' => '',
		'right' => '',
		'top' => '',
		'bottom' => '',
		'ieclass' => '',
		'class' => '',

	) , $atts));

	$output = $data_lightbox = $title_link = $target = $imageout = $iconout = $captout = $descrout = '';
	if ($hover_effect == 'scaleupall') {$blockscale = 'scaleupall';}

	$css_classes = array( 'openlink');

if ( !empty( $on_click_action ) )
	$css_classes[] = $on_click_action;


	if ( !empty( $image ) && is_numeric( $image ) ) {

		if( 'custom_size' == $img_size && '' !== $custom_img_size ){
			$size = ssc_get_img_sizes_array_from_string( $custom_img_size );
			$img_thumb = image_downsize( $image , $size );
		} else {
			$img_thumb = image_downsize( $image , $img_size );
		}
		if (empty($alt) ) {
			$alt = get_post_meta( $image, '_wp_attachment_image_alt', true);
		}

		$image_full_width = image_downsize( $image, 'full' );
		$image_full       = $image_full_width[0];

		if( $on_click_action == 'lightbox' ) {

			$css_classes[] = 'kc-pretty-photo';
			$data_lightbox = ' rel="prettyPhoto" ';

			wp_enqueue_script('prettyPhoto');
			wp_enqueue_style( 'prettyPhoto' );
		} else if( $on_click_action == 'open_custom_link' or $on_click_action == 'popup-youtube' or $on_click_action == 'popup-vimeo' or $on_click_action == 'popup-gmaps') {

			$custom_link	= ( '||' === $custom_link ) ? '' : $custom_link;
			$custom_link	= kc_parse_link($custom_link);

			if ( strlen( $custom_link['url'] ) > 0 ) {
				$image_full 	= $custom_link['url'];
				$title_link 	= $custom_link['title'];
				$target 	= strlen( $custom_link['target'] ) > 0 ? 'target="' . $custom_link['target'] . '"' : 'target="_self"';
			}
		}
		//echo $image_full;
		$wrp_classes = apply_filters( 'kc-el-class', $atts );
		$wrp_classes[] = 'ssc_img_ef';
		if ( !empty( $ieclass ) )
			$wrp_classes[] = $ieclass;
		if ( !empty( $class ) )
			$wrp_classes[] = $class;

		if (!empty($description) ) {
			$descrout .= '<div class="mov"><p>'.$description.'</p></div>';
		}
		if( !empty($on_click_action) ) {
			$imageout .= '<div class="iw"><a ' . $data_lightbox . ' href="' . $image_full . '" title="' . $title_link . '" ' . $target . ' class="'.implode( ' ', $css_classes ) . '"><img src="' . $img_thumb['0'] . '" alt="' . $alt . '"></a></div>';
			$captout .= '<a ' . $data_lightbox . ' href="' . $image_full . '" title="' . $title_link . '" ' . $target . ' class="'.implode( ' ', $css_classes ) . '"><strong>'.html_entity_decode( $caption ).'</strong></a>';
			switch ( $show_icon ){
				case 'yes':
					if( !empty( $icon ) ) {
						$iconout .= '<span class="ib"><a ' . $data_lightbox . ' href="' . $image_full . '" title="' . $title_link . '" ' . $target . ' class="'.implode( ' ', $css_classes ) . '"><i class="' . $icon . '"></i></a></span>';
					}
					break;
				case 'svg':
					if( '' !== $svg_icon ) {
						$iconout .= '<div class="ib"><a ' . $data_lightbox . ' href="' . $image_full . '" title="' . $title_link . '" ' . $target . ' class="'.implode( ' ', $css_classes ) . '">' . ssc_process_svg( $svg_icon ) . '</a></div>';
					}
					break;
			}
		} else {
			$imageout .= '<div class="iw"><img src="' . $img_thumb['0'] . '" alt="' . $alt . '" class="'.$hover_effect.'"></div>';
			$captout .= '<strong>'.html_entity_decode( $caption ).'</strong>';
			switch ( $show_icon ){
				case 'yes':
					if( !empty( $icon ) ) {
						$iconout .= '<span class="ib"><i class="' . $icon . '"></i></span>';
					}
					break;
				case 'svg':
					if( '' !== $svg_icon ) {
						$iconout .= '<div class="ib">' . ssc_process_svg( $svg_icon ) . '</div>';
					}
					break;
			}
		}
		if ($on_click_action != '' and $link_text != '') {
			$read_more = '<a ' . $data_lightbox . ' href="' . $image_full . '" title="' . $title_link . '" ' . $target . ' class="rm '.implode( ' ', $css_classes ) . '">'.$link_text.'</a>';
		} else {$read_more = '';}

		/*---------------------------
		Output
		----------------------------*/
		$output .= '<div  class=" type'.$template.' mo'.$monocolored.' '.$blockscale.' '.$hover_effect.' '.implode( ' ', $wrp_classes ) . '" >';

		switch ( $template ) {
			case '1':

			case '2':

			case '4':
			case '10':

				$output .= $imageout;

				if( !empty( $caption ) or  !empty( $description ) or '' !== $iconout ){
					$output .= '<div class="ieslide">'.$captout.$iconout.$descrout.$read_more.'</div>';
				}
				break;

			case '3':

			case '5':

			case '6':
			case '7':
				$output .= $imageout;

				if( !empty( $caption ) or  !empty( $description ) or '' !== $iconout ){
					$output .= '<div class="ieslide"><div>'.$iconout.$captout.$descrout.$read_more.'</div></div>';
				}

				break;
			case '8':
				$output .= $imageout;

				if( !empty( $caption ) or  !empty( $description ) or  '' !== $iconout ){
					$output .= '<div class="ieslide">
									<div class="icop">'.$iconout.'</div>
									<div class="textop">'.$captout.$descrout.$read_more.'</div>
								</div>';
				}

				break;
			case '11':
				$output .= $imageout;

				if( !empty( $caption ) or  !empty( $description ) or '' !== $iconout ){
					$output .= '<div class="ieslide">
									<div class="textop">'.$captout.$descrout.$read_more.'</div>
									<div class="icop">'.$iconout.'</div>
								</div>';
				}

				break;
			case '9':
				$output .= $imageout;

				if( !empty( $caption ) or  !empty( $description ) ){
					$output .= '<div class="ieslide"><div>'.$captout.$descrout.$read_more.$iconout.'</div></div>';
				}

				break;
			case '12':
				$output .= $imageout;

				if( !empty( $caption ) or  !empty( $description ) or '' !== $iconout ){
					$output .= '<div class="ieslide">'.$iconout.$captout.$descrout.$read_more.'</div>';
				}
				break;
		}

		$output .= '</div>';
		return $output;
	} else {
		return '<div class="kc-carousel_images align-center" style="border:1px dashed #ccc;"><br /><h3>' . esc_html__( 'No image uploaded', 'ssc' ) . '</h3></div>';
	}

}

add_shortcode('ssc_image_effect', 'ssc_image_effect_shortcode');

add_filter( 'shortcode_ssc_image_effect_before_css_generating', 'ssc_image_effect_filter_css' );

function ssc_image_effect_filter_css( $atts ){
	$styles = array();
	extract(shortcode_atts(array(
		'monocolored' => '',
		'strength' => '',
		'hover_effect' => '',
		'on_click_action' => '',
		'custom_link' => '',
		'link_text'         => '',
		'show_icon' => '',
		'icon' => '',
		'svg_icon' => '',
		'svg_icon_color' => '',
		'svg_icon_hcolor' => '',
		'image_position' => '',
		'left' => '',
		'right' => '',
		'top' => '',
		'bottom' => '',

	) , $atts));

	if ( $monocolored === '' ) {
		$strength = '0%';
	}
	if ( $strength === '__empty__' ) {
		$strength = '0%';
	}
	if ( ! empty ( $atts['css_custom'] ) ) {
		$styles = json_decode( str_replace( '`', '"', $atts['css_custom'] ), true);
	}
	if ( ! empty( $image_position ) ) {
		$styles['kc-css']['any']['image']['position|'] = 'absolute';
		if ( ! empty( $left ) ) {
			$styles['kc-css']['any']['image']['left|'] = $left;
		}
		if ( ! empty( $right ) ) {
			$styles['kc-css']['any']['image']['right|'] = $right;
		}
		if ( ! empty( $top ) ) {
			$styles['kc-css']['any']['image']['top|'] = $top;
		}
		if ( ! empty( $bottom ) ) {
			$styles['kc-css']['any']['image']['bottom|'] = $bottom;
		}
	}
	$styles['kc-css']['any']['image']['-webkit-filter|'] = 'grayscale(' . $strength . ')';
	$styles['kc-css']['any']['image']['filter|'] = 'grayscale(' . $strength . ')';

	switch ( $show_icon ){
		case 'svg':
			if( '' !== $svg_icon ) {
				if ( '' !== $svg_icon_color ) {
					if ( empty ( $styles['kc-css']['any']['svg']['fill| .ib svg'] ) ) {
						$styles['kc-css']['any']['svg']['fill| .ib svg'] = $svg_icon_color;
					}
				}
				if ( '' !== $svg_icon_hcolor ) {
					if ( empty ( $styles['kc-css']['any']['svg']['fill| .ib:hover svg'] ) ) {
						$styles['kc-css']['any']['svg']['fill| .ib:hover svg'] = $svg_icon_hcolor;
					}
				}
			}
			break;
	}

	if( ! empty( $styles ) ){
		$atts['css_custom'] = str_replace( '"', '`', json_encode( $styles, JSON_FORCE_OBJECT  ) );
	}

	return $atts;
}