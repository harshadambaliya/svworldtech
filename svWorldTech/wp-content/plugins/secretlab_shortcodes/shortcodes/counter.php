<?php
add_action('init', 'ssc_counter_params', 99);

/**
 * Additional functions
 */

/**
 * Additional functions
 */


function ssc_counter_params() {
    global $kc;

     $kc->add_map(array(
		'ssc_counter' => array(
		'name' => __(' Counter Extended', 'ssc'),
		'description' => __(' ', 'ssc'),
		'icon' => 'kc-icon-counter ssc-icon-21',
		'category' => 'SecretLab',
		'is_container' => true,
		'assets' => array(
			'scripts' => array(
				'counter-up' => '',
				'waypoints' => '',
				'jquery' => '', // Leave empty to call the registered scripts
				'kingcomposer' => '', // Leave empty to call the registered scripts
			),
		),
		'params'		=> array(
			'general' => array(
				array(
					'name' => 'template',
					'label' => esc_html__( 'Select Template', 'ssc' ),
					'type' => 'radio_image',  // USAGE TEXT TYPE
					'options' => array(
						'1'	=> plugin_dir_url( __FILE__ ) .'../images/counter1.gif',
						'2'	=> plugin_dir_url( __FILE__ ) .'../images/counter2.gif',
						'3'	=> plugin_dir_url( __FILE__ ) .'../images/counter3.gif',
						'4'	=> plugin_dir_url( __FILE__ ) .'../images/counter4.gif',
						'5'	=> plugin_dir_url( __FILE__ ) .'../images/counter5.gif',
					),
					'value' => '1', // remove this if you do not need a default content
				),
				array(
					'type'			=> 'text',
					'label'			=> __( 'Targeted number', 'ssc' ),
					'name'			=> 'number',
					'description'	=> __( 'The targeted number to count up to (From zero).', 'ssc' ),
					'admin_label'	=> true,
					'value'			=> '100'
				),
				array(
					'type'			=> 'text',
					'label'			=> __( 'Label', 'ssc' ),
					'name'			=> 'label',
					'description'	=> __( 'The text description of the counter.', 'ssc' ),
					'admin_label'	=> true,
					'value'			=> 'Percent number'
				),
				array(
					'type'			=> 'text',
					'label'			=> __( 'Prefix', 'ssc' ),
					'name'			=> 'prefix',
					'description'	=> __( 'The text before value of the counter of the counter.', 'ssc' ),
					'admin_label'	=> true,
					'value'			=> '$'
				),
				array(
					'type'			=> 'text',
					'label'			=> __( 'Suffix', 'ssc' ),
					'name'			=> 'suffix',
					'description'	=> __( 'The text after value of the counter of the counter.', 'ssc' ),
					'admin_label'	=> true,
					'value'			=> 'k'
				),
				array(
					'type'	      => 'toggle',
					'name'	      => 'divider_show',
					'label'       => __(' Display Divider', 'ssc'),
					'description' => __(' Display divider in box counter', 'ssc')
				),
				array(
					'type'	      => 'toggle',
					'name'	      => 'icon_show',
					'label'       => __(' Display Icon', 'ssc'),
					'description' => __(' Display icon in box counter', 'ssc')
				),

				array(
					'name' => 'icon_type',
					'label' => esc_html__( 'Icon Type', 'ssc' ),
					'type' => 'radio',
					'options' => array(
						'icon' => esc_html__( 'Icon', 'ssc' ),
						'svg' => esc_html__( 'SVG', 'ssc' ),
						'img' => esc_html__( 'Image', 'ssc' ),
					),
					'value' => 'icon',
					'description' => esc_html__( 'Pick what to display: icon, image or text', 'ssc' ),
					'relation'		=> array(
						'parent'	=> 'icon_show',
						'show_when'	=> array( 'yes' )
					)
				),
				array(
					'type'			=> 'icon_picker',
					'label'			=> __( 'Icon', 'ssc' ),
					'name'			=> 'icon',
					'description'	=> __( 'Icon in counter box', 'ssc' ),
					'relation'		=> array(
						'parent' => 'icon_type',
						'show_when' => 'icon'
					)
				),
				array(
					'name' => 'img',
					'label' => esc_html__( 'Select Image Icon', 'ssc' ),
					'type' => 'attach_image',
					'admin_label' => true,
					'relation' => array(
						'parent' => 'icon_type',
						'show_when' => 'img'
					)
				),
				array(
					'name' => 'svg',
					'label' => esc_html__( 'Select SVG Icon', 'ssc' ),
					'type' => 'attach_image',
					'admin_label' => true,
					'relation' => array(
						'parent' => 'icon_type',
						'show_when' => 'svg'
					)
				),
				array(
					'type' => 'color_picker',
					'label' => __( 'SVG Color', 'ssc' ),
					'name' => 'svg_color',
					'relation' => array(
						'parent' => 'icon_type',
						'show_when' => 'svg'
					),
					'description' => esc_html__( 'Deprecated! Use "fill" field at the "Styling\Hover" tab instead.', 'ssc' ),
				),
				array(
					'type' => 'color_picker',
					'label' => __( 'SVG Hover Color', 'ssc' ),
					'name' => 'svg_hcolor',
					'relation' => array(
						'parent' => 'icon_type',
						'show_when' => 'svg'
					),
					'description' => esc_html__( 'Deprecated! Use "fill" field at the "Styling\Hover" tab instead.', 'ssc' ),
				),

				array(
					'name' => 'content',
					'label' => esc_html__( 'Icon Box Description', 'ssc' ),
					'type' => 'textarea_html',
					'description' => esc_html__( 'Title of the progress bar. Leave blank if no title is needed.', 'ssc' ),
					'value' =>  '',
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
						'flip'  => esc_html__( 'Flip X', 'ssc' ),
						'flipy'  => esc_html__( 'Flip Y', 'ssc' ),
						'rotate'  => esc_html__( 'Rotate', 'ssc' ),

					),
					'description'	=> esc_html__( 'Select the click event when users click on an image.', 'ssc' )
				),
				array(
					'type'			=> 'text',
					'label'			=> __( 'Wrapper class name', 'ssc' ),
					'name'			=> 'wrap_class',
					'description'	=> __( 'Custom class for wrapper of the shortcode widget.', 'ssc' ),
				)
			),
			'styling' => array(
				array(
					'name'    => 'css_custom',
					'type'    => 'css',
					'value'    => '{`kc-css`:{`any`:{`box`:{`text-align|`:`center`,`background|`:`eyJjb2xvciI6IiNmN2Y3ZjciLCJsaW5lYXJHcmFkaWVudCI6WyIiXSwiaW1hZ2UiOiJub25lIiwicG9zaXRpb24iOiIwJSAwJSIsInNpemUiOiJhdXRvIiwicmVwZWF0IjoicmVwZWF0IiwiYXR0YWNobWVudCI6InNjcm9sbCIsImFkdmFuY2VkIjowfQ==`,`padding|`:`70px 20px 70px 20px`},`label`:{`font-size|.lbl`:`16px`},`icon`:{`color|i`:`#e84265`,`font-size|i`:`40px`,`line-height|i`:`50px`,`display|i`:`inline-block`,`padding|i`:`inherit inherit 15px inherit`},`counter-box`:{`vertical-align|.countbox`:`top`,`display|.countbox`:`table`},`prefix`:{`font-size|.pref`:`15px`,`font-weight|.pref`:`700`},`number`:{`color|.num`:`#000000`,`font-size|.num`:`50px`,`line-height|.num`:`60px`,`font-weight|.num`:`500`,`font-family|.num`:`Poppins`,`padding|.num`:`inherit 6px 10px 6px`},`suffix`:{`color|.suf`:`#e84265`,`font-size|.suf`:`20px`,`line-height|.suf`:`32px`,`font-weight|.suf`:`700`,`vertical-align|.suf`:`top`}}}}',
					'options' => array(
						array(
							"screens" => "any,1024,999,767,479",
							'Box' => array(
								array('property' => 'text-align', 'label' => esc_html__( 'Text Align', 'ssc' )),
								array('property' => 'vertical-align', 'label' => esc_html__('Vertical Align', 'ssc' )),
								array('property' => 'background'),
								array('property' => 'display', 'label' => esc_html__( 'Display', 'ssc' )),
								array('property' => 'float', 'label' => esc_html__( 'Float', 'ssc' )),
								array('property' => 'width', 'label' => esc_html__( 'Width', 'ssc' )),
								array('property' => 'height', 'label' => esc_html__( 'Height', 'ssc' )),
								array('property' => 'box-shadow', 'label' => esc_html__( 'Box Shadow', 'ssc' )),
								array('property' => 'opacity', 'label' => esc_html__( 'Opacity', 'ssc' )),
								array('property' => 'margin', 'label' => esc_html__( 'Margin', 'ssc' )),
								array('property' => 'padding', 'label' => esc_html__( 'Padding', 'ssc' )),
								array('property' => 'border', 'label' => esc_html__( 'Border', 'ssc' )),
								array('property' => 'border-radius', 'label' => esc_html__( 'Border Radius', 'ssc' )),
							),
							'Label' => array(
								array('property' => 'color', 'label' => esc_html__('Color', 'ssc' ), 'selector' => '.lbl'),
								array('property' => 'background', 'selector' => '.lbl'),
								array('property' => 'font-size', 'label' => esc_html__('Font Size', 'ssc' ), 'selector' => '.lbl'),
								array('property' => 'line-height', 'label' => esc_html__('Line Height', 'ssc' ), 'selector' => '.lbl'),
								array('property' => 'font-weight', 'label' => esc_html__('Font Weight', 'ssc' ), 'selector' => '.lbl'),
								array('property' => 'font-family', 'label' => esc_html__('Font Family', 'ssc' ), 'selector' => '.lbl'),
								array('property' => 'text-align', 'label' => esc_html__( 'Alignment', 'ssc' ), 'selector' => '.lbl'),
								array('property' => 'vertical-align', 'label' => esc_html__( 'Vertical Align', 'ssc' ), 'selector' => '.lbl'),
								array('property' => 'text-transform', 'label' => esc_html__('Text Transform', 'ssc' ), 'selector' => '.lbl'),
								array('property' => 'text-decoration', 'label' => esc_html__('Text Decoration', 'ssc' ), 'selector' => '.lbl'),
								array('property' => 'font-style', 'label' => esc_html__('Font Style', 'ssc' ), 'selector' => '.lbl'),
                                array('property' => 'letter-spacing', 'label'    => esc_html__( 'Letter Spacing', 'ssc' ), 'selector' => '.lbl',),
								array('property' => 'text-shadow', 'label' => esc_html__('Text Shadow', 'ssc' ), 'selector' => '.lbl'),
								array('property' => 'box-shadow', 'label' => esc_html__( 'Box Shadow', 'ssc' ), 'selector' => '.lbl'),
								array('property' => 'width', 'label' => esc_html__( 'Width', 'ssc' ), 'selector' => '.lbl'),
								array('property' => 'height', 'label' => esc_html__( 'Height', 'ssc' ), 'selector' => '.lbl'),
								array('property' => 'display', 'label' => esc_html__( 'Display', 'ssc' ), 'selector' => '.lbl'),
								array('property' => 'float', 'label' => esc_html__( 'Float', 'ssc' ), 'selector' => '.lbl'),
								array('property' => 'margin', 'label' => esc_html__( 'Margin', 'ssc' ), 'selector' => '.lbl'),
								array('property' => 'padding', 'label' => esc_html__( 'Padding', 'ssc' ), 'selector' => '.lbl'),
								array('property' => 'border', 'label' => esc_html__( 'Border', 'ssc' ), 'selector' => '.lbl'),
								array('property' => 'border-radius', 'label' => esc_html__( 'Border Radius', 'ssc' ), 'selector' => '.lbl'),
							),
							'Icon'=> array(
								array('property' => 'color', 'label' => esc_html__('Color', 'ssc' ), 'selector' => 'i'),
								array('property' => 'background', 'selector' => 'i'),
								array('property' => 'font-size', 'label' => esc_html__('Font Size', 'ssc' ), 'selector' => 'i'),
								array('property' => 'line-height', 'label' => esc_html__('Line Height', 'ssc' ), 'selector' => 'i'),
								array('property' => 'font-weight', 'label' => esc_html__('Font Weight', 'ssc' ), 'selector' => 'i'),
								array('property' => 'font-family', 'label' => esc_html__('Font Family', 'ssc' ), 'selector' => 'i'),
								array('property' => 'text-transform', 'label' => esc_html__('Text Transform', 'ssc' ), 'selector' => 'i'),
								array('property' => 'text-decoration', 'label' => esc_html__('Text Decoration', 'ssc' ), 'selector' => 'i'),
								array('property' => 'font-style', 'label' => esc_html__('Font Style', 'ssc' ), 'selector' => 'i'),
								array('property' => 'text-shadow', 'label' => esc_html__('Text Shadow', 'ssc' ), 'selector' => 'i'),
								array('property' => 'box-shadow', 'label' => esc_html__( 'Box Shadow', 'ssc' ), 'selector' => 'i'),
								array('property' => 'width', 'label' => esc_html__( 'Width', 'ssc' ), 'selector' => 'i'),
								array('property' => 'height', 'label' => esc_html__( 'Height', 'ssc' ), 'selector' => 'i'),
								array('property' => 'fill', 'label' => esc_html__( 'Fill', 'ssc' ), 'selector' => ' .c_svg svg'),
								array('property' => 'width', 'label' => esc_html__( 'Image/ SVG Width', 'ssc' ), 'selector' => 'svg, img'),
								array('property' => 'height', 'label' => esc_html__( 'Image/ SVG Height', 'ssc' ), 'selector' => 'svg, img'),
								array('property' => 'display', 'label' => esc_html__( 'Display', 'ssc' ), 'selector' => 'i'),
								array('property' => 'display', 'label' => esc_html__( 'Image/ SVG Display', 'ssc' ), 'selector' => '.c_svg, .c_img'),
								array('property' => 'float', 'label' => esc_html__( 'Float', 'ssc' ), 'selector' => 'i'),
								array('property' => 'float', 'label' => esc_html__( 'Image/ SVG Float', 'ssc' ), 'selector' => '.c_svg, .c_img'),
								array('property' => 'margin', 'label' => esc_html__( 'Margin', 'ssc' ), 'selector' => 'i'),
								array('property' => 'margin', 'label' => esc_html__( 'Image/ SVG Margin', 'ssc' ), 'selector' => 'svg, img'),
								array('property' => 'padding', 'label' => esc_html__( 'Padding', 'ssc' ), 'selector' => 'i'),
								array('property' => 'border', 'label' => esc_html__( 'Border', 'ssc' ), 'selector' => 'i'),
								array('property' => 'border', 'label' => esc_html__( 'Image/ SVG Border', 'ssc' ), 'selector' => '.c_svg, .c_img'),
								array('property' => 'border-radius', 'label' => esc_html__( 'Border Radius', 'ssc' ), 'selector' => 'i'),
								array('property' => 'border-radius', 'label' => esc_html__( 'Image/ SVG Border Radius', 'ssc' ), 'selector' => '.c_svg, .c_img'),
							),
							'Counter Box' => array(
								array('property' => 'text-align', 'label' => esc_html__( 'Alignment', 'ssc' ), 'selector' => '.countbox'),
								array('property' => 'vertical-align', 'label' => esc_html__( 'Vertical Align', 'ssc' ), 'selector' => '.countbox'),
								array('property' => 'color', 'label' => esc_html__('Color', 'ssc' ), 'selector' => '.countbox'),
								array('property' => 'background', 'selector' => '.countbox'),
								array('property' => 'font-size', 'label' => esc_html__('Font Size', 'ssc' ), 'selector' => '.countbox'),
								array('property' => 'line-height', 'label' => esc_html__('Line Height', 'ssc' ), 'selector' => '.countbox'),
								array('property' => 'font-weight', 'label' => esc_html__('Font Weight', 'ssc' ), 'selector' => '.countbox'),
								array('property' => 'font-family', 'label' => esc_html__('Font Family', 'ssc' ), 'selector' => '.countbox'),
								array('property' => 'text-transform', 'label' => esc_html__('Text Transform', 'ssc' ), 'selector' => '.countbox'),
								array('property' => 'text-decoration', 'label' => esc_html__('Text Decoration', 'ssc' ), 'selector' => '.countbox'),
								array('property' => 'font-style', 'label' => esc_html__('Font Style', 'ssc' ), 'selector' => '.countbox'),
								array('property' => 'text-shadow', 'label' => esc_html__('Text Shadow', 'ssc' ), 'selector' => '.countbox'),
								array('property' => 'box-shadow', 'label' => esc_html__( 'Box Shadow', 'ssc' ), 'selector' => '.countbox'),
								array('property' => 'width', 'label' => esc_html__( 'Width', 'ssc' ), 'selector' => '.countbox'),
								array('property' => 'height', 'label' => esc_html__( 'Height', 'ssc' ), 'selector' => '.countbox'),
								array('property' => 'max-width', 'label' => esc_html__( 'Max Width', 'ssc' ), 'selector' => '.countbox'),
								array('property' => 'display', 'label' => esc_html__( 'Display', 'ssc' ), 'selector' => '.countbox'),
								array('property' => 'float', 'label' => esc_html__( 'Float', 'ssc' ), 'selector' => '.countbox'),
								array('property' => 'margin', 'label' => esc_html__( 'Margin', 'ssc' ), 'selector' => '.countbox'),
								array('property' => 'padding', 'label' => esc_html__( 'Padding', 'ssc' ), 'selector' => '.countbox'),
								array('property' => 'border', 'label' => esc_html__( 'Border', 'ssc' ), 'selector' => '.countbox'),
								array('property' => 'border-radius', 'label' => esc_html__( 'Border Radius', 'ssc' ), 'selector' => '.countbox'),
							),

							'Prefix' => array(
								array('property' => 'color', 'label' => esc_html__('Color', 'ssc' ), 'selector' => '.pref'),
								array('property' => 'background', 'selector' => '.pref'),
								array('property' => 'font-size', 'label' => esc_html__('Font Size', 'ssc' ), 'selector' => '.pref'),
								array('property' => 'line-height', 'label' => esc_html__('Line Height', 'ssc' ), 'selector' => '.pref'),
								array('property' => 'font-weight', 'label' => esc_html__('Font Weight', 'ssc' ), 'selector' => '.pref'),
								array('property' => 'font-family', 'label' => esc_html__('Font Family', 'ssc' ), 'selector' => '.pref'),
								array('property' => 'text-transform', 'label' => esc_html__('Text Transform', 'ssc' ), 'selector' => '.pref'),
								array('property' => 'text-decoration', 'label' => esc_html__('Text Decoration', 'ssc' ), 'selector' => '.pref'),
								array('property' => 'font-style', 'label' => esc_html__('Font Style', 'ssc' ), 'selector' => '.pref'),
                                array('property' => 'letter-spacing', 'label'    => esc_html__( 'Letter Spacing', 'ssc' ), 'selector' => '.pref',),
								array('property' => 'text-shadow', 'label' => esc_html__('Text Shadow', 'ssc' ), 'selector' => '.pref'),
								array('property' => 'box-shadow', 'label' => esc_html__( 'Box Shadow', 'ssc' ), 'selector' => '.pref'),
								array('property' => 'vertical-align', 'label' => esc_html__('Vertical Align', 'ssc' ), 'selector' => '.pref'),
								array('property' => 'width', 'label' => esc_html__( 'Width', 'ssc' ), 'selector' => '.pref'),
								array('property' => 'height', 'label' => esc_html__( 'Height', 'ssc' ), 'selector' => '.pref'),
								array('property' => 'display', 'label' => esc_html__( 'Display', 'ssc' ), 'selector' => '.pref'),
								array('property' => 'float', 'label' => esc_html__( 'Float', 'ssc' ), 'selector' => '.pref'),
								array('property' => 'margin', 'label' => esc_html__( 'Margin', 'ssc' ), 'selector' => '.pref'),
								array('property' => 'padding', 'label' => esc_html__( 'Padding', 'ssc' ), 'selector' => '.pref'),
								array('property' => 'border', 'label' => esc_html__( 'Border', 'ssc' ), 'selector' => '.pref'),
								array('property' => 'border-radius', 'label' => esc_html__( 'Border Radius', 'ssc' ), 'selector' => '.pref'),
							),
							'Number' => array(
								array('property' => 'color', 'label' => esc_html__('Color', 'ssc' ), 'selector' => '.num'),
								array('property' => 'background', 'selector' => '.num'),
								array('property' => 'font-size', 'label' => esc_html__('Font Size', 'ssc' ), 'selector' => '.num'),
								array('property' => 'line-height', 'label' => esc_html__('Line Height', 'ssc' ), 'selector' => '.num'),
								array('property' => 'font-weight', 'label' => esc_html__('Font Weight', 'ssc' ), 'selector' => '.num'),
								array('property' => 'font-family', 'label' => esc_html__('Font Family', 'ssc' ), 'selector' => '.num'),
								array('property' => 'text-transform', 'label' => esc_html__('Text Transform', 'ssc' ), 'selector' => '.num'),
								array('property' => 'text-decoration', 'label' => esc_html__('Text Decoration', 'ssc' ), 'selector' => '.num'),
								array('property' => 'font-style', 'label' => esc_html__('Font Style', 'ssc' ), 'selector' => '.num'),
                                array('property' => 'letter-spacing', 'label'    => esc_html__( 'Letter Spacing', 'ssc' ), 'selector' => '.num',),
								array('property' => 'text-shadow', 'label' => esc_html__('Text Shadow', 'ssc' ), 'selector' => '.num'),
								array('property' => 'box-shadow', 'label' => esc_html__( 'Box Shadow', 'ssc' ), 'selector' => '.num'),
								array('property' => 'vertical-align', 'label' => esc_html__('Vertical Align', 'ssc' ), 'selector' => '.num'),
								array('property' => 'width', 'label' => esc_html__( 'Width', 'ssc' ), 'selector' => '.num'),
								array('property' => 'height', 'label' => esc_html__( 'Height', 'ssc' ), 'selector' => '.num'),
								array('property' => 'display', 'label' => esc_html__( 'Display', 'ssc' ), 'selector' => '.num'),
								array('property' => 'float', 'label' => esc_html__( 'Float', 'ssc' ), 'selector' => '.num'),
								array('property' => 'margin', 'label' => esc_html__( 'Margin', 'ssc' ), 'selector' => '.num'),
								array('property' => 'padding', 'label' => esc_html__( 'Padding', 'ssc' ), 'selector' => '.num'),
								array('property' => 'border', 'label' => esc_html__( 'Border', 'ssc' ), 'selector' => '.num'),
								array('property' => 'border-radius', 'label' => esc_html__( 'Border Radius', 'ssc' ), 'selector' => '.num'),
							),
							'Suffix' => array(
								array('property' => 'color', 'label' => esc_html__('Color', 'ssc' ), 'selector' => '.suf'),
								array('property' => 'background', 'selector' => '.suf'),
								array('property' => 'font-size', 'label' => esc_html__('Font Size', 'ssc' ), 'selector' => '.suf'),
								array('property' => 'line-height', 'label' => esc_html__('Line Height', 'ssc' ), 'selector' => '.suf'),
								array('property' => 'font-weight', 'label' => esc_html__('Font Weight', 'ssc' ), 'selector' => '.suf'),
								array('property' => 'font-family', 'label' => esc_html__('Font Family', 'ssc' ), 'selector' => '.suf'),
								array('property' => 'text-transform', 'label' => esc_html__('Text Transform', 'ssc' ), 'selector' => '.suf'),
								array('property' => 'text-decoration', 'label' => esc_html__('Text Decoration', 'ssc' ), 'selector' => '.suf'),
								array('property' => 'font-style', 'label' => esc_html__('Font Style', 'ssc' ), 'selector' => '.suf'),
                                array('property' => 'letter-spacing', 'label'    => esc_html__( 'Letter Spacing', 'ssc' ), 'selector' => '.suf'),
								array('property' => 'text-shadow', 'label' => esc_html__('Text Shadow', 'ssc' ), 'selector' => '.suf'),
								array('property' => 'box-shadow', 'label' => esc_html__( 'Box Shadow', 'ssc' ), 'selector' => '.suf'),
								array('property' => 'vertical-align', 'label' => esc_html__('Vertical Align', 'ssc' ), 'selector' => '.suf'),
								array('property' => 'width', 'label' => esc_html__( 'Width', 'ssc' ), 'selector' => '.suf'),
								array('property' => 'height', 'label' => esc_html__( 'Height', 'ssc' ), 'selector' => '.suf'),
								array('property' => 'display', 'label' => esc_html__( 'Display', 'ssc' ), 'selector' => '.suf'),
								array('property' => 'float', 'label' => esc_html__( 'Float', 'ssc' ), 'selector' => '.suf'),
								array('property' => 'margin', 'label' => esc_html__( 'Margin', 'ssc' ), 'selector' => '.suf'),
								array('property' => 'padding', 'label' => esc_html__( 'Padding', 'ssc' ), 'selector' => '.suf'),
								array('property' => 'border', 'label' => esc_html__( 'Border', 'ssc' ), 'selector' => '.suf'),
								array('property' => 'border-radius', 'label' => esc_html__( 'Border Radius', 'ssc' ), 'selector' => '.suf'),
							),
							// --> Description
							'description' => array(
								array('property' => 'color', 'label' => esc_html__( 'Color', 'ssc' ), 'selector' => '.description'),
								array('property' => 'font-size', 'label' => esc_html__( 'Font Size', 'ssc' ), 'selector' => '.description'),
								array('property' => 'line-height', 'label' => esc_html__( 'Line Height', 'ssc' ), 'selector' => '.description, .description p'),
								array('property' => 'font-weight', 'label' => esc_html__( 'Font Weight', 'ssc' ), 'selector' => '.description'),
								array('property' => 'font-style', 'label' => esc_html__( 'Font Style', 'ssc' ), 'selector' => '.description'),
								array('property' => 'font-family', 'label' => esc_html__( 'Font Family', 'ssc' ), 'selector' => '.description'),
								array('property' => 'text-align', 'label' => esc_html__( 'Text Align', 'ssc' ), 'selector' => '.description'),
								array('property' => 'text-transform', 'label' => esc_html__( 'Text Transform', 'ssc' ), 'selector' => '.description'),
								array('property' => 'text-decoration', 'label' => esc_html__( 'Text Decoration', 'ssc' ), 'selector' => '.description'),
                                array('property' => 'letter-spacing', 'label'    => esc_html__( 'Letter Spacing', 'ssc' ), 'selector' => '.suf'),
								array('property' => 'background', 'selector' => '.description'),
								array('property' => 'float', 'label' => esc_html__( 'Float', 'ssc' ), 'selector' => '.description'),
								array('property' => 'display', 'label' => esc_html__( 'Display', 'ssc' ), 'selector' => '.description'),
								array('property' => 'height', 'label' => esc_html__( 'Height', 'ssc' ), 'selector' => '.description'),
								array('property' => 'width', 'label' => esc_html__( 'Width', 'ssc' ), 'selector' => '.description'),
								array('property' => 'margin', 'label' => esc_html__( 'Margin', 'ssc' ), 'selector' => '.description'),
								array('property' => 'padding', 'label' => esc_html__( 'Padding', 'ssc' ), 'selector' => '.description'),
								array('property' => 'border', 'label' => esc_html__( 'Border', 'ssc' ), 'selector' => '.description'),
								array('property' => 'border-radius', 'label' => esc_html__( 'Border Radius', 'ssc' ), 'selector' => '.description'),
							),
							// --> divider
							'divider' => array(
								array('property' => 'height', 'label' => esc_html__( 'Height', 'ssc' ), 'selector' => '.divider'),
								array('property' => 'width', 'label' => esc_html__( 'Width', 'ssc' ), 'selector' => '.divider'),
								array('property' => 'line-height', 'label' => esc_html__( 'Line Height', 'ssc' ), 'selector' => '.divider'),
								array('property' => 'text-align', 'label' => esc_html__( 'Text Align', 'ssc' ), 'selector' => '.divider'),
								array('property' => 'background', 'selector' => '.divider'),
								array('property' => 'margin', 'label' => esc_html__( 'Margin', 'ssc' ), 'selector' => '.divider'),
								array('property' => 'padding', 'label' => esc_html__( 'Padding', 'ssc' ), 'selector' => '.divider'),
								array('property' => 'border', 'label' => esc_html__( 'Border', 'ssc' ), 'selector' => '.divider'),
								array('property' => 'border-radius', 'label' => esc_html__( 'Border Radius', 'ssc' ), 'selector' => '.divider'),
							),
						)
					)
				)
			),
			'Hover' => array(
				array(
					'name'    => 'hover',
					'type'    => 'css',
					'options' => array(
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
							'Label' => array(
								array('property' => 'color', 'label' => esc_html__('Color', 'ssc' ), 'selector' => '+:hover .lbl'),
								array('property' => 'background', 'selector' => '+:hover .lbl'),
								array('property' => 'font-size', 'label' => esc_html__('Font Size', 'ssc' ), 'selector' => '+:hover .lbl'),
								array('property' => 'line-height', 'label' => esc_html__('Line Height', 'ssc' ), 'selector' => '+:hover .lbl'),
								array('property' => 'font-weight', 'label' => esc_html__('Font Weight', 'ssc' ), 'selector' => '+:hover .lbl'),
								array('property' => 'font-family', 'label' => esc_html__('Font Family', 'ssc' ), 'selector' => '+:hover .lbl'),
								array('property' => 'text-transform', 'label' => esc_html__('Text Transform', 'ssc' ), 'selector' => '+:hover .lbl'),
								array('property' => 'text-decoration', 'label' => esc_html__('Text Decoration', 'ssc' ), 'selector' => '+:hover .lbl'),
								array('property' => 'font-style', 'label' => esc_html__('Font Style', 'ssc' ), 'selector' => '+:hover .lbl'),
								array('property' => 'text-shadow', 'label' => esc_html__('Text Shadow', 'ssc' ), 'selector' => '+:hover .lbl'),
								array('property' => 'box-shadow', 'label' => esc_html__( 'Box Shadow', 'ssc' ), 'selector' => '+:hover .lbl'),
								array('property' => 'width', 'label' => esc_html__( 'Width', 'ssc' ), 'selector' => '+:hover .lbl'),
								array('property' => 'height', 'label' => esc_html__( 'Height', 'ssc' ), 'selector' => '+:hover .lbl'),
								array('property' => 'display', 'label' => esc_html__( 'Display', 'ssc' ), 'selector' => '+:hover .lbl'),
								array('property' => 'float', 'label' => esc_html__( 'Float', 'ssc' ), 'selector' => '+:hover .lbl'),
								array('property' => 'margin', 'label' => esc_html__( 'Margin', 'ssc' ), 'selector' => '+:hover .lbl'),
								array('property' => 'padding', 'label' => esc_html__( 'Padding', 'ssc' ), 'selector' => '+:hover .lbl'),
								array('property' => 'border', 'label' => esc_html__( 'Border', 'ssc' ), 'selector' => '+:hover .lbl'),
								array('property' => 'border-radius', 'label' => esc_html__( 'Border Radius', 'ssc' ), 'selector' => '+:hover .lbl'),
							),
							'Icon'=> array(
								array('property' => 'color', 'label' => esc_html__('Color', 'ssc' ), 'selector' => '+:hover i'),
								array('property' => 'background', 'selector' => '+:hover i'),
								array('property' => 'font-size', 'label' => esc_html__('Font Size', 'ssc' ), 'selector' => '+:hover i'),
								array('property' => 'line-height', 'label' => esc_html__('Line Height', 'ssc' ), 'selector' => '+:hover i'),
								array('property' => 'font-weight', 'label' => esc_html__('Font Weight', 'ssc' ), 'selector' => '+:hover i'),
								array('property' => 'font-family', 'label' => esc_html__('Font Family', 'ssc' ), 'selector' => '+:hover i'),
								array('property' => 'text-transform', 'label' => esc_html__('Text Transform', 'ssc' ), 'selector' => '+:hover i'),
								array('property' => 'text-decoration', 'label' => esc_html__('Text Decoration', 'ssc' ), 'selector' => '+:hover i'),
								array('property' => 'font-style', 'label' => esc_html__('Font Style', 'ssc' ), 'selector' => '+:hover i'),
								array('property' => 'text-shadow', 'label' => esc_html__('Text Shadow', 'ssc' ), 'selector' => '+:hover i'),
								array('property' => 'box-shadow', 'label' => esc_html__( 'Box Shadow', 'ssc' ), 'selector' => '+:hover i'),
								array('property' => 'width', 'label' => esc_html__( 'Width', 'ssc' ), 'selector' => '+:hover i'),
								array('property' => 'height', 'label' => esc_html__( 'Height', 'ssc' ), 'selector' => '+:hover i'),
								array('property' => 'fill', 'label' => esc_html__( 'Fill', 'ssc' ) . ' ' . esc_html__( 'Hover', 'ssc' ), 'selector' => '+:hover .c_svg svg'),
								array('property' => 'width', 'label' => esc_html__( 'Image/ SVG Width', 'ssc' ), 'selector' => '+:hover svg,+:hover  img'),
								array('property' => 'height', 'label' => esc_html__( 'Image/ SVG Height', 'ssc' ), 'selector' => '+:hover svg,+:hover  img'),
								array('property' => 'display', 'label' => esc_html__( 'Display', 'ssc' ), 'selector' => '+:hover i'),
								array('property' => 'display', 'label' => esc_html__( 'Image/ SVG Display', 'ssc' ), 'selector' => '+:hover .c_svg, +:hover .c_img'),
								array('property' => 'float', 'label' => esc_html__( 'Float', 'ssc' ), 'selector' => '+:hover i'),
								array('property' => 'float', 'label' => esc_html__( 'Image/ SVG Float', 'ssc' ), 'selector' => '+:hover .c_svg, +:hover .c_img'),
								array('property' => 'margin', 'label' => esc_html__( 'Margin', 'ssc' ), 'selector' => '+:hover i'),
								array('property' => 'margin', 'label' => esc_html__( 'Image/ SVG Margin', 'ssc' ), 'selector' => '+:hover svg,+:hover  img'),
								array('property' => 'padding', 'label' => esc_html__( 'Padding', 'ssc' ), 'selector' => '+:hover i'),
								array('property' => 'border', 'label' => esc_html__( 'Border', 'ssc' ), 'selector' => '+:hover i'),
								array('property' => 'border', 'label' => esc_html__( 'Image/ SVG Border', 'ssc' ), 'selector' => '+:hover .c_svg, +:hover .c_img'),
								array('property' => 'border-radius', 'label' => esc_html__( 'Border Radius', 'ssc' ), 'selector' => '+:hover i'),
								array('property' => 'border-radius', 'label' => esc_html__( 'Image/ SVG Border Radius', 'ssc' ), 'selector' => '+:hover .c_svg, +:hover .c_img'),
							),
							'Counter Box' => array(
								array('property' => 'text-align', 'label' => esc_html__( 'Alignment', 'ssc' ), 'selector' => '+:hover .countbox'),
								array('property' => 'vertical-align', 'label' => esc_html__( 'Vertical Align', 'ssc' ), 'selector' => '+:hover .countbox'),
								array('property' => 'color', 'label' => esc_html__('Color', 'ssc' ), 'selector' => '+:hover .countbox'),
								array('property' => 'background', 'selector' => '+:hover .countbox'),
								array('property' => 'font-size', 'label' => esc_html__('Font Size', 'ssc' ), 'selector' => '+:hover .countbox'),
								array('property' => 'line-height', 'label' => esc_html__('Line Height', 'ssc' ), 'selector' => '+:hover .countbox'),
								array('property' => 'font-weight', 'label' => esc_html__('Font Weight', 'ssc' ), 'selector' => '+:hover .countbox'),
								array('property' => 'font-family', 'label' => esc_html__('Font Family', 'ssc' ), 'selector' => '+:hover .countbox'),
								array('property' => 'text-transform', 'label' => esc_html__('Text Transform', 'ssc' ), 'selector' => '+:hover .countbox'),
								array('property' => 'text-decoration', 'label' => esc_html__('Text Decoration', 'ssc' ), 'selector' => '+:hover .countbox'),
								array('property' => 'font-style', 'label' => esc_html__('Font Style', 'ssc' ), 'selector' => '+:hover .countbox'),
								array('property' => 'text-shadow', 'label' => esc_html__('Text Shadow', 'ssc' ), 'selector' => '+:hover .countbox'),
								array('property' => 'box-shadow', 'label' => esc_html__( 'Box Shadow', 'ssc' ), 'selector' => '+:hover .countbox'),
								array('property' => 'width', 'label' => esc_html__( 'Width', 'ssc' ), 'selector' => '+:hover .countbox'),
								array('property' => 'height', 'label' => esc_html__( 'Height', 'ssc' ), 'selector' => '+:hover .countbox'),
								array('property' => 'max-width', 'label' => esc_html__( 'Max Width', 'ssc' ), 'selector' => '+:hover .countbox'),
								array('property' => 'display', 'label' => esc_html__( 'Display', 'ssc' ), 'selector' => '+:hover .countbox'),
								array('property' => 'float', 'label' => esc_html__( 'Float', 'ssc' ), 'selector' => '+:hover .countbox'),
								array('property' => 'margin', 'label' => esc_html__( 'Margin', 'ssc' ), 'selector' => '+:hover .countbox'),
								array('property' => 'padding', 'label' => esc_html__( 'Padding', 'ssc' ), 'selector' => '+:hover .countbox'),
								array('property' => 'border', 'label' => esc_html__( 'Border', 'ssc' ), 'selector' => '+:hover .countbox'),
								array('property' => 'border-radius', 'label' => esc_html__( 'Border Radius', 'ssc' ), 'selector' => '+:hover .countbox'),
							),

							'Prefix' => array(
								array('property' => 'color', 'label' => esc_html__('Color', 'ssc' ), 'selector' => '+:hover .pref'),
								array('property' => 'background', 'selector' => '+:hover .pref'),
								array('property' => 'font-size', 'label' => esc_html__('Font Size', 'ssc' ), 'selector' => '+:hover .pref'),
								array('property' => 'line-height', 'label' => esc_html__('Line Height', 'ssc' ), 'selector' => '+:hover .pref'),
								array('property' => 'font-weight', 'label' => esc_html__('Font Weight', 'ssc' ), 'selector' => '+:hover .pref'),
								array('property' => 'font-family', 'label' => esc_html__('Font Family', 'ssc' ), 'selector' => '+:hover .pref'),
								array('property' => 'text-transform', 'label' => esc_html__('Text Transform', 'ssc' ), 'selector' => '+:hover .pref'),
								array('property' => 'text-decoration', 'label' => esc_html__('Text Decoration', 'ssc' ), 'selector' => '+:hover .pref'),
								array('property' => 'font-style', 'label' => esc_html__('Font Style', 'ssc' ), 'selector' => '+:hover .pref'),
								array('property' => 'text-shadow', 'label' => esc_html__('Text Shadow', 'ssc' ), 'selector' => '+:hover .pref'),
								array('property' => 'box-shadow', 'label' => esc_html__( 'Box Shadow', 'ssc' ), 'selector' => '+:hover .pref'),
								array('property' => 'vertical-align', 'label' => esc_html__('Vertical Align', 'ssc' ), 'selector' => '+:hover .pref'),
								array('property' => 'width', 'label' => esc_html__( 'Width', 'ssc' ), 'selector' => '+:hover .pref'),
								array('property' => 'height', 'label' => esc_html__( 'Height', 'ssc' ), 'selector' => '+:hover .pref'),
								array('property' => 'display', 'label' => esc_html__( 'Display', 'ssc' ), 'selector' => '+:hover .pref'),
								array('property' => 'float', 'label' => esc_html__( 'Float', 'ssc' ), 'selector' => '+:hover .pref'),
								array('property' => 'margin', 'label' => esc_html__( 'Margin', 'ssc' ), 'selector' => '+:hover .pref'),
								array('property' => 'padding', 'label' => esc_html__( 'Padding', 'ssc' ), 'selector' => '+:hover .pref'),
								array('property' => 'border', 'label' => esc_html__( 'Border', 'ssc' ), 'selector' => '+:hover .pref'),
								array('property' => 'border-radius', 'label' => esc_html__( 'Border Radius', 'ssc' ), 'selector' => '+:hover .pref'),
							),
							'Number' => array(
								array('property' => 'color', 'label' => esc_html__('Color', 'ssc' ), 'selector' => '+:hover .num'),
								array('property' => 'background', 'selector' => '+:hover .num'),
								array('property' => 'font-size', 'label' => esc_html__('Font Size', 'ssc' ), 'selector' => '+:hover .num'),
								array('property' => 'line-height', 'label' => esc_html__('Line Height', 'ssc' ), 'selector' => '+:hover .num'),
								array('property' => 'font-weight', 'label' => esc_html__('Font Weight', 'ssc' ), 'selector' => '+:hover .num'),
								array('property' => 'font-family', 'label' => esc_html__('Font Family', 'ssc' ), 'selector' => '+:hover .num'),
								array('property' => 'text-transform', 'label' => esc_html__('Text Transform', 'ssc' ), 'selector' => '+:hover .num'),
								array('property' => 'text-decoration', 'label' => esc_html__('Text Decoration', 'ssc' ), 'selector' => '+:hover .num'),
								array('property' => 'font-style', 'label' => esc_html__('Font Style', 'ssc' ), 'selector' => '+:hover .num'),
								array('property' => 'text-shadow', 'label' => esc_html__('Text Shadow', 'ssc' ), 'selector' => '+:hover .num'),
								array('property' => 'box-shadow', 'label' => esc_html__( 'Box Shadow', 'ssc' ), 'selector' => '+:hover .num'),
								array('property' => 'vertical-align', 'label' => esc_html__('Vertical Align', 'ssc' ), 'selector' => '+:hover .num'),
								array('property' => 'width', 'label' => esc_html__( 'Width', 'ssc' ), 'selector' => '+:hover .num'),
								array('property' => 'height', 'label' => esc_html__( 'Height', 'ssc' ), 'selector' => '+:hover .num'),
								array('property' => 'display', 'label' => esc_html__( 'Display', 'ssc' ), 'selector' => '+:hover .num'),
								array('property' => 'float', 'label' => esc_html__( 'Float', 'ssc' ), 'selector' => '+:hover .num'),
								array('property' => 'margin', 'label' => esc_html__( 'Margin', 'ssc' ), 'selector' => '+:hover .num'),
								array('property' => 'padding', 'label' => esc_html__( 'Padding', 'ssc' ), 'selector' => '+:hover .num'),
								array('property' => 'border', 'label' => esc_html__( 'Border', 'ssc' ), 'selector' => '+:hover .num'),
								array('property' => 'border-radius', 'label' => esc_html__( 'Border Radius', 'ssc' ), 'selector' => '+:hover .num'),
							),
							'Suffix' => array(
								array('property' => 'color', 'label' => esc_html__('Color', 'ssc' ), 'selector' => '+:hover .suf'),
								array('property' => 'background', 'selector' => '+:hover .suf'),
								array('property' => 'font-size', 'label' => esc_html__('Font Size', 'ssc' ), 'selector' => '+:hover .suf'),
								array('property' => 'line-height', 'label' => esc_html__('Line Height', 'ssc' ), 'selector' => '+:hover .suf'),
								array('property' => 'font-weight', 'label' => esc_html__('Font Weight', 'ssc' ), 'selector' => '+:hover .suf'),
								array('property' => 'font-family', 'label' => esc_html__('Font Family', 'ssc' ), 'selector' => '+:hover .suf'),
								array('property' => 'text-transform', 'label' => esc_html__('Text Transform', 'ssc' ), 'selector' => '+:hover .suf'),
								array('property' => 'text-decoration', 'label' => esc_html__('Text Decoration', 'ssc' ), 'selector' => '+:hover .suf'),
								array('property' => 'font-style', 'label' => esc_html__('Font Style', 'ssc' ), 'selector' => '+:hover .suf'),
								array('property' => 'text-shadow', 'label' => esc_html__('Text Shadow', 'ssc' ), 'selector' => '+:hover .suf'),
								array('property' => 'box-shadow', 'label' => esc_html__( 'Box Shadow', 'ssc' ), 'selector' => '+:hover .suf'),
								array('property' => 'vertical-align', 'label' => esc_html__('Vertical Align', 'ssc' ), 'selector' => '+:hover .suf'),
								array('property' => 'width', 'label' => esc_html__( 'Width', 'ssc' ), 'selector' => '+:hover .suf'),
								array('property' => 'height', 'label' => esc_html__( 'Height', 'ssc' ), 'selector' => '+:hover .suf'),
								array('property' => 'display', 'label' => esc_html__( 'Display', 'ssc' ), 'selector' => '+:hover .suf'),
								array('property' => 'float', 'label' => esc_html__( 'Float', 'ssc' ), 'selector' => '+:hover .suf'),
								array('property' => 'margin', 'label' => esc_html__( 'Margin', 'ssc' ), 'selector' => '+:hover .suf'),
								array('property' => 'padding', 'label' => esc_html__( 'Padding', 'ssc' ), 'selector' => '+:hover .suf'),
								array('property' => 'border', 'label' => esc_html__( 'Border', 'ssc' ), 'selector' => '+:hover .suf'),
								array('property' => 'border-radius', 'label' => esc_html__( 'Border Radius', 'ssc' ), 'selector' => '+:hover .suf'),
							),
							// --> Description
							'description' => array(
								array('property' => 'color', 'label' => esc_html__( 'Color', 'ssc' ), 'selector' => '+:hover .description'),
								array('property' => 'font-size', 'label' => esc_html__( 'Font Size', 'ssc' ), 'selector' => '+:hover .description'),
								array('property' => 'line-height', 'label' => esc_html__( 'Line Height', 'ssc' ), 'selector' => '+:hover .description, +:hover .description p'),
								array('property' => 'font-weight', 'label' => esc_html__( 'Font Weight', 'ssc' ), 'selector' => '+:hover .description'),
								array('property' => 'font-style', 'label' => esc_html__( 'Font Style', 'ssc' ), 'selector' => '+:hover .description'),
								array('property' => 'font-family', 'label' => esc_html__( 'Font Family', 'ssc' ), 'selector' => '+:hover .description'),
								array('property' => 'text-align', 'label' => esc_html__( 'Text Align', 'ssc' ), 'selector' => '+:hover .description'),
								array('property' => 'text-transform', 'label' => esc_html__( 'Text Transform', 'ssc' ), 'selector' => '+:hover .description'),
								array('property' => 'text-decoration', 'label' => esc_html__( 'Text Decoration', 'ssc' ), 'selector' => '+:hover .description'),
								array('property' => 'background', 'selector' => '+:hover .description'),
								array('property' => 'float', 'label' => esc_html__( 'Float', 'ssc' ), 'selector' => '+:hover .description'),
								array('property' => 'display', 'label' => esc_html__( 'Display', 'ssc' ), 'selector' => '+:hover .description'),
								array('property' => 'height', 'label' => esc_html__( 'Height', 'ssc' ), 'selector' => '+:hover .description'),
								array('property' => 'width', 'label' => esc_html__( 'Width', 'ssc' ), 'selector' => '+:hover .description'),
								array('property' => 'margin', 'label' => esc_html__( 'Margin', 'ssc' ), 'selector' => '+:hover .description'),
								array('property' => 'padding', 'label' => esc_html__( 'Padding', 'ssc' ), 'selector' => '+:hover .description'),
								array('property' => 'border', 'label' => esc_html__( 'Border', 'ssc' ), 'selector' => '+:hover .description'),
								array('property' => 'border-radius', 'label' => esc_html__( 'Border Radius', 'ssc' ), 'selector' => '+:hover .description'),
							),
							// --> divider
							'divider' => array(
								array('property' => 'height', 'label' => esc_html__( 'Height', 'ssc' ), 'selector' => '+:hover .divider'),
								array('property' => 'width', 'label' => esc_html__( 'Width', 'ssc' ), 'selector' => '+:hover .divider'),
								array('property' => 'text-align', 'label' => esc_html__( 'Text Align', 'ssc' ), 'selector' => '+:hover .divider'),
								array('property' => 'background', 'selector' => '+:hover .divider'),
								array('property' => 'margin', 'label' => esc_html__( 'Margin', 'ssc' ), 'selector' => '+:hover .divider'),
								array('property' => 'padding', 'label' => esc_html__( 'Padding', 'ssc' ), 'selector' => '+:hover .divider'),
								array('property' => 'border', 'label' => esc_html__( 'Border', 'ssc' ), 'selector' => '+:hover .divider'),
								array('property' => 'border-radius', 'label' => esc_html__( 'Border Radius', 'ssc' ), 'selector' => '+:hover .divider'),
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
	),
    ));
}

// Register Shortcode

function ssc_counter_shortcode($atts, $content = null) {
	$blockscale = $divider = '';
    extract(shortcode_atts(array(
        'template' => '1',
        'number' => '',
        'label' => '',
        'prefix' => '',
        'suffix' => '',
        'divider_show' => '',
        'icon_show' => '',
        'icon' => '',
        'hover_effect' => '',
        'wrap_class' => '',
	    'icon_type' => '',
	    'img' => '',
	    'svg' => '',
    ) , $atts));


    $output = '';

    $wrp_classes = apply_filters( 'kc-el-class', $atts );

	if ($hover_effect == 'scaleupall') {$blockscale = 'scaleupall';}
	$counter = '<div class="countbox"><span class="pref">'.$prefix.'</span><span class="num"><span class="counterup">'.$number.'</span></span><span class="suf">'.$suffix.'</span></div>';


	if( $icon_show == 'yes' ) {

		// Content elements: Icon
		switch ( $icon_type ){
			case 'icon':
				$icon = ! empty( $icon ) ? $icon : 'fa-leaf';
				$icon = ( ! empty( $icon ) ) ? '<i class="' . esc_html( $icon ) . ' element-icon"></i>' : '';
				break;

			case 'img':
				$icon_image = image_downsize( $img, 'full' );
				$icon = '<div class="c_img"><img src="'.$icon_image[0].'" alt="'.$label.'" ></div>';
				break;

			case 'svg':
				if( $svg !== ''){
					$icon   = '<div class="c_svg" >' . ssc_process_svg( $svg ) . '</div>';
				}
				break;
		}
	}

	$label = '<div class="lbl">'.$label.'</div>';
	$content = trim($content);
	if ( $content != '' && $content != '<p></p>' && $content != '&nbsp;' && $content != '</p>' && $content != '<p>__empty__</p>' && $content != '<br>\n' && $content != '<p></p>\n' && $content != '\n' && $content != '\n\n' && $content != '<p>none</p>' && $content != '<p>none</p><p></p>' && $content != 'none' && $content != '<br>' ) {
		$description_c = '<div class="description lines">'.$content.'</div>';
	} else {
		$description_c = '';
	}
	if( $divider_show == 'yes' ) {$divider = '<div class="divider"></div>'; }

    if ( !empty( $wrap_class ) )
        $wrp_classes[] = $wrap_class;
    $output .= '<div  class="css_counter type'.$template.'  '.$blockscale.' '.$hover_effect.' '.implode( ' ', $wrp_classes ).' ">';

	switch ( $template ) {
		case '1':
			$output .= $icon.$label.$counter.$divider.$description_c;
			break;
		case '2':
			$output .= $icon.$counter.$label.$divider.$description_c;
			break;
		case '3':
			$output .= $counter.$icon.$label.$divider.$description_c;
			break;
		case '4':
			$output .= '<div>'.$icon.$counter.'</div><div>'.$label.$divider.$description_c.'</div>';
			break;
        case '5':
            $output .= '<div>'.$icon.'</div><div>'.$counter.$label.$divider.$description_c.'</div>';
            break;
	}

    $output .= '</div>';

    return $output;
}

add_shortcode('ssc_counter', 'ssc_counter_shortcode');

add_filter( 'shortcode_ssc_counter_before_css_generating', 'ssc_counter_filter_css' );

function ssc_counter_filter_css( $atts ) {
	extract( shortcode_atts( array(
		'icon_type'  => '',
		'svg'        => '',
		'svg_color'  => '',
		'svg_hcolor' => '',
	),
		$atts ) );

	switch ( $icon_type ) {
		case 'svg':
			if ( '' !== $svg ) {
				if ( '' !== $svg_color ) {
					$styles = array();
					if ( ! empty ( $atts['css_custom'] ) ) {
						$styles = json_decode( str_replace( '`', '"', $atts['css_custom'] ), true);
					}
					if ( empty ( $styles['kc-css']['any']['icon']['fill| .c_svg svg'] ) ) {
						$styles['kc-css']['any']['icon']['fill| .c_svg svg'] = $svg_color;
					}
					$atts['css_custom'] = str_replace( '"', '`', json_encode( $styles, JSON_FORCE_OBJECT  ) );
				}
				if ( '' !== $svg_hcolor ) {
					$hover_styles = array();
					if ( ! empty ( $atts['hover'] ) ) {
						$hover_styles = json_decode( str_replace( '`', '"', $atts['hover'] ), true);
					}
					if ( empty ( $hover_styles['kc-css']['any']['icon']['fill|+:hover .c_svg svg'] ) ) {
						$hover_styles['kc-css']['any']['icon']['fill|+:hover .c_svg svg'] = $svg_hcolor;
					}
					$atts['hover'] = str_replace( '"', '`', json_encode( $hover_styles, JSON_FORCE_OBJECT  ) );
				}
			}
			break;
	}

	return $atts;
}

