<?php
add_action('init', 'ssc_iconbox_params', 99);

/**
 * Additional functions
 */

/**
 * Additional functions
 */


function ssc_iconbox_params() {
	global $kc;
	//get current plugin folder then define the template folder
	$plugin_template = plugin_dir_path( __FILE__ );
	//register template folder with KingComposer
	$kc->set_template_path( $plugin_template );
	$kc->add_map(array(
		'ssc_iconbox' => array(
			'name' => esc_html__( 'Icon Box', 'ssc' ),
			'description' => esc_html__( 'It displays icon box with unlimited design templates and colors', 'ssc' ),
			'icon' => 'kc-icon-box ssc-icon-3',
			'is_container' => true,
			'category' => 'SecretLab',
			'live_editor' => $plugin_template . 'live/icon-box.php',
			'css_box' => true,
			'params' => array(
				esc_html__( 'General', 'ssc' ) => array(
					array(
						'name' => 'template',
						'label' => esc_html__( 'Select Template', 'ssc' ),
						'type' => 'radio_image',  // USAGE TEXT TYPE
						'options' => array(
							'1'	=> plugin_dir_url( __FILE__ ) .'../images/ib1.gif',
							'2'	=> plugin_dir_url( __FILE__ ) .'../images/ib2.gif',
							'3'	=> plugin_dir_url( __FILE__ ) .'../images/ib3.gif',
							'4'	=> plugin_dir_url( __FILE__ ) .'../images/ib4.gif',
							'5'	=> plugin_dir_url( __FILE__ ) .'../images/ib5.gif',
							'6'	=> plugin_dir_url( __FILE__ ) .'../images/ib6.gif',
							'7'	=> plugin_dir_url( __FILE__ ) .'../images/ib7.gif',
							'8'	=> plugin_dir_url( __FILE__ ) .'../images/ib8.gif',
							'9'	=> plugin_dir_url( __FILE__ ) .'../images/ib9.gif',
							'10'	=> plugin_dir_url( __FILE__ ) .'../images/ib10.gif',
							'11'	=> plugin_dir_url( __FILE__ ) .'../images/ib11.gif',
							'12'	=> plugin_dir_url( __FILE__ ) .'../images/ib12.gif',
							'13'	=> plugin_dir_url( __FILE__ ) .'../images/ib6.gif',
							'14'	=> plugin_dir_url( __FILE__ ) .'../images/ib14.gif',
							'15'	=> plugin_dir_url( __FILE__ ) .'../images/ib15.gif',
							'16'	=> plugin_dir_url( __FILE__ ) .'../images/ib16.gif',
							'17'	=> plugin_dir_url( __FILE__ ) .'../images/ib17.gif',
							'18'	=> plugin_dir_url( __FILE__ ) .'../images/ib18.gif',
							'19'	=> plugin_dir_url( __FILE__ ) .'../images/ib19.gif',
						),
						'value' => '1', // remove this if you do not need a default content
					),
					array(
						'name' => 'icon_type',
						'label' => esc_html__( 'Icon Type', 'ssc' ),
						'type' => 'radio',
						'options' => array(
							'icon' => esc_html__( 'Icon', 'ssc' ),
							'svg' => esc_html__( 'SVG', 'ssc' ),
							'img' => esc_html__( 'Image', 'ssc' ),
							'text' => esc_html__( 'Text', 'ssc' ),
						),
						'value' => 'icon',
						'description' => esc_html__( 'Pick what to display: icon, image or text', 'ssc' ),
					),
					array(
						'name' => 'icon',
						'label' => esc_html__( 'Select Icon', 'ssc' ),
						'type' => 'icon_picker',
						'admin_label' => true,
						'relation' => array(
							'parent' => 'icon_type',
							'show_when' => 'icon'
						),
						'value' => 'nat-return-of-investment-roi',
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
						'name' => 'text',
						'label' => esc_html__( 'Text Instead Of Icon', 'ssc' ),
						'type' => 'text',
						'admin_label' => true,
						'value' => esc_html__( 'Title Goes Here', 'ssc' ),
						'relation' => array(
							'parent' => 'icon_type',
							'show_when' => 'text'
						)
					),
					array(
						'name' => 'isize',
						'label' => esc_html__( 'Size in px', 'ssc' ),

						'type' => 'number_slider',  // USAGE RADIO TYPE
						'options' => array(    // REQUIRED
							'min' => 5,
							'max' => 600,
							'unit' => '',
							'show_input' => true
						),

						'value' => '26', // remove this if you do not need a default content
					),
					array(
						'name' => 'is_icon_link',
						'label' => esc_html__( 'Is Icon Link?', 'ssc' ),
						'type' => 'radio',
						'options' => array(
							'yes' => esc_html__( 'Yes', 'ssc' ),
							'no' => esc_html__( 'No', 'ssc' ),
						),
						'value' => 'no',
					),
					array(
						'name' => 'icon_link',
						'label' => esc_html__( 'Icon Link', 'ssc' ),
						'relation' => array(
							'parent' => 'is_icon_link',
							'show_when' => 'yes'
						),
						'type' => 'link',
						'value' => '',
					),
					// END ICON TYPE
					array(
						'name' => 'bgr_type',
						'label' => esc_html__( 'Background Type', 'ssc' ),
						'type' => 'radio',
						'options' => array(
							'bgr_icon' => esc_html__( 'Icon', 'ssc' ),
							'bgr_img' => esc_html__( 'Image', 'ssc' ),
							'bgr_nothing' => esc_html__( 'Nothing', 'ssc' ),
						),
						'value' => 'bgr_icon',
						'description' => esc_html__( 'Pick what to display under icon: icon, image or nothing', 'ssc' ),
					),
					array(
						'name' => 'bgr_icon',
						'label' => esc_html__( 'Select Icon', 'ssc' ),
						'type' => 'icon_picker',
						'admin_label' => true,
						'relation' => array(
							'parent' => 'bgr_type',
							'show_when' => 'bgr_icon'
						),
						'value' => 'nat-sdr6'
					),
					array(
						'name' => 'bgr_img',
						'label' => esc_html__( 'Select Image Icon', 'ssc' ),
						'type' => 'attach_image',
						'admin_label' => true,
						'relation' => array(
							'parent' => 'bgr_type',
							'show_when' => 'bgr_img'
						)
					),
					array(
						'name' => 'bgr_text',
						'label' => esc_html__( 'Text Instead Of Icon', 'ssc' ),
						'type' => 'text',
						'admin_label' => true,
						'value' => esc_html__( 'Title Goes Here', 'ssc' ),
						'relation' => array(
							'parent' => 'bgr_type',
							'show_when' => 'bgr_text'
						)
					),
					array(
						'name' => 'bsize',
						'label' => esc_html__( 'Size in px', 'ssc' ),

						'type' => 'number_slider',  // USAGE RADIO TYPE
						'options' => array(    // REQUIRED
							'min' => 5,
							'max' => 600,
							'unit' => '',
							'show_input' => true
						),

						'value' => '90', // remove this if you do not need a default content
					),
					// END BGR TYPE
					array(
						'name' => 'title',
						'label' => esc_html__( 'Icon Box Title', 'ssc' ),
						'type' => 'text',
						'description' => esc_html__( 'Title of the progress bar. Leave blank if no title is needed.', 'ssc' ),
						'admin_label' => true,
						'value' => esc_html__( 'Title Goes Here', 'ssc' ),
					),
					array(
						'name' => 'is_title_link',
						'label' => esc_html__( 'Is The Title a Link?', 'ssc' ),
						'type' => 'toggle',
						'options' => array(
							'yes' => esc_html__( 'Yes', 'ssc' ),
							'no' => esc_html__( 'No', 'ssc' ),
						),
						'value' => 'no',
					),
					array(
						'name' => 'title_link',
						'label' => esc_html__( 'Title Link', 'ssc' ),
						'relation' => array(
							'parent' => 'is_title_link',
							'show_when' => 'yes'
						),
						'type' => 'link',
						'value' => '',
					),
					array(
						'name' => 'subtitle',
						'label' => esc_html__( 'Icon Box Subtitle', 'ssc' ),
						'type' => 'text',
						'description' => esc_html__( 'Subtitle of the progress bar. Leave blank if no title is needed.', 'ssc' ),
						'admin_label' => true,
						'value' => esc_html__( 'Subtitle Goes Here', 'ssc' ),
					),
					array(
						'name' => 'limit_lines',
						'label' => esc_html__( 'Limit Lines For Description', 'ssc' ),
						'type' => 'text',
						'value' => '0',
						'description' => esc_html__( 'Set 0 if you dont want to limit the title', 'ssc' ),
					),
					array(
						'name' => 'content',
						'label' => esc_html__( 'Icon Box Description', 'ssc' ),
						'type' => 'textarea_html',
						'description' => esc_html__( 'Title of the progress bar. Leave blank if no title is needed.', 'ssc' ),
						'value' => esc_html__( 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet', 'ssc' ),
					),
					array(
						'name' => 'link_text',
						'label' => esc_html__( 'Read More Text', 'ssc' ),
						'type' => 'text',
						'description' => '',
						'value' => '',
					) ,
					array(
						'name' => 'link_url',
						'label' => esc_html__( 'Read More URL', 'ssc' ),
						'type' => 'text',
						'description' => '',
						'value' => '',
					) ,
					array(
						'name' => 'show_icon_link',
						'label' => esc_html__( 'Icon Type', 'ssc' ),
						'type' => 'radio',
						'value' => '',
						'options' => array(
							'' => esc_html__( 'No', 'ssc' ),
							'yes' => esc_html__( 'Icon', 'ssc' ),
							'svg' => esc_html__( 'SVG', 'ssc' ),
						),
						'description' => esc_html__( 'Pick what to display: icon, image or text', 'ssc' ),
					),
					array(
						'name' => 'icon_link_svg',
						'label' => esc_html__( 'Select SVG Icon', 'ssc' ),
						'type' => 'attach_image',
						'admin_label' => true,
						'relation' => array(
							'parent' => 'show_icon_link',
							'show_when' => 'svg'
						)
					),
					array(
						'type' => 'color_picker',
						'label' => __( 'SVG Color', 'ssc' ),
						'name' => 'icon_link_svg_color',
						'relation' => array(
							'parent' => 'show_icon_link',
							'show_when' => 'svg'
						),
						'description' => esc_html__( 'Deprecated! Use "fill" field at the "Styling\Hover" tab instead.', 'ssc' ),
					),
					array(
						'type' => 'color_picker',
						'label' => __( 'SVG Hover Color', 'ssc' ),
						'name' => 'icon_link_svg_hcolor',
						'relation' => array(
							'parent' => 'show_icon_link',
							'show_when' => 'svg'
						),
						'description' => esc_html__( 'Deprecated! Use "fill" field at the "Styling\Hover" tab instead.', 'ssc' ),
					),
					array(
						'type' => 'color_picker',
						'label' => __( 'SVG Box Hover Color', 'ssc' ),
						'name' => 'icon_link_svg_hbox',
						'relation' => array(
							'parent' => 'show_icon_link',
							'show_when' => 'svg'
						),
						'description' => esc_html__( 'Deprecated! Use "fill" field at the "Styles\Hover" tab instead.', 'ssc' ),
					),
					array(
						'name'		=> 'iconleft',
						'label'		=> esc_html__( 'Show Icon on the left?', 'ssc' ),
						'type'		=> 'toggle',
						'value'		=> 'yes',
						'relation' => array(
							'parent' => 'show_icon_link',
							'show_when' => array('yes', 'svg'),
						),
					),
					array(
						'name' => 'linkicon',
						'label' => esc_html__( 'Select Icon for link', 'ssc' ),
						'type' => 'icon_picker',
						'admin_label' => true,
						'relation' => array(
							'parent' => 'show_icon_link',
							'show_when' => 'yes'
						),
						'value' => 'nat-arrow-right7',
					),
					array(
						'name' => 'el_class',
						'label' => esc_html__( 'Extra Class Name', 'ssc' ),
						'type' => 'text',
						'description' => esc_html__( 'If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your CSS file.', 'ssc' ),
						'admin_label' => true,
						'value' => ''
					) ,
				),
				// Styling
				//Styling
				esc_html__( 'styling', 'ssc' ) => array(
					array(
						'name' => 'my-css',
						'label' => esc_html__( 'Styling', 'ssc' ),
						'type' => 'css',
						'value' => '{`kc-css`:{`any`:{`icon`:{`color|.c_icon, .c_text`:`#ffffff`,`line-height|.c_icon i, .c_img img, .c_text`:`85px`},`bgr-icon`:{`color|.bgr_icon`:`#004a97`,`line-height|.bgr_icon i, .bgr_img img, .bgr_no`:`90px`,`text-align|.bgr_icon i, .bgr_img, .bgr_no`:`center`},`title`:{`font-size|.title, .title a`:`22px`,`line-height|.title, .title a`:`30px`,`font-weight|.title, .title a`:`400`,`text-transform|.title, .title a`:`uppercase`},`description`:{`margin|.cont_box .description`:`inherit inherit 15px inherit`}}}}', // remove this if you do not need a default content
						//'options' => array(), register css properties, selectors and screens
						'description' => esc_html__( 'Styles', 'ssc' ),
						'options' => array(
							array(
								'screens' => "any,1024,999,768,479",
								// --> Box
								'Box' => array(
									array('property' => 'text-align', 'label' => esc_html__( 'Text Align', 'ssc' )),
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
								'SVG' => array(
									array('property' => 'fill', 'label' => esc_html__( 'Fill', 'ssc' ), 'selector' => '.c_svg svg'),
									array('property' => 'width', 'label' => esc_html__( 'Width', 'ssc' ), 'selector' => '.c_svg svg'),
									array('property' => 'max-width', 'label' => esc_html__( 'Max Width', 'ssc' ), 'selector' => '.c_svg svg'),
									array('property' => 'height', 'label' => esc_html__( 'Height', 'ssc' ), 'selector' => '.c_svg svg'),
									array('property' => 'display', 'label' => esc_html__( 'Display', 'ssc' ), 'selector' => '.c_svg svg'),
									array('property' => 'float', 'label' => esc_html__( 'Float', 'ssc' ), 'selector' => '.c_svg svg'),
									array('property' => 'background', 'selector' => '.c_svg'),
									array('property' => 'box-shadow', 'label' => esc_html__( 'Box Shadow', 'ssc' ), 'selector' => '.c_svg'),
									array('property' => 'opacity', 'label' => esc_html__( 'Opacity', 'ssc' ), 'selector' => '.c_svg'),
									array('property' => 'margin', 'label' => esc_html__( 'Margin', 'ssc' ), 'selector' => '.c_svg'),
									array('property' => 'padding', 'label' => esc_html__( 'Padding', 'ssc' ), 'selector' => '.c_svg'),
									array('property' => 'border', 'label' => esc_html__( 'Border', 'ssc' ), 'selector' => '.c_svg'),
									array('property' => 'border-radius', 'label' => esc_html__( 'Border Radius', 'ssc' ), 'selector' => '.c_svg'),
								),
								// --> Icon/Img/Text
								'Icon' => array(
									array('property' => 'color', 'label' => esc_html__( 'Color', 'ssc' ), 'selector' => '.c_icon, .c_text'),
									array('property' => 'font-size', 'label' => esc_html__( 'Font Size', 'ssc' ), 'selector' => '.c_icon, .c_text'),
									array('property' => 'line-height', 'label' => esc_html__( 'Line Height', 'ssc' ), 'selector' => '.c_icon i, .c_img img, .c_text'),
									array('property' => 'font-family', 'label' => esc_html__( 'Font Family', 'ssc' ), 'selector' => '.c_icon i, .c_img img, .c_text'),
									array('property' => 'font-weight', 'label' => esc_html__( 'Font Weight', 'ssc' ), 'selector' => '.c_icon i, .c_img img, .c_text'),
									array('property' => 'text-align', 'label' => esc_html__( 'Text Align', 'ssc' ), 'selector' => '.c_icon, .c_img, .c_text'),
									array('property' => 'text-decoration', 'label' => esc_html__( 'Text Decoration', 'ssc' ), 'selector' => '.c_icon a, .c_img a, .c_text'),
									array('property' => 'width', 'label' => esc_html__( 'Width', 'ssc' ), 'selector' => '.c_icon, .c_img, .c_text'),
									array('property' => 'height', 'label' => esc_html__( 'Height', 'ssc' ), 'selector' => '.c_icon, .c_img, .c_text'),
									array('property' => 'background', 'selector' => '.c_icon, .c_img, .c_text'),
									array('property' => 'box-shadow', 'label' => esc_html__( 'Box Shadow', 'ssc' ), 'selector' => '.c_icon, .c_img, .c_text'),
									array('property' => 'opacity', 'label' => esc_html__( 'Opacity', 'ssc' ), 'selector' => '.c_icon, .c_img, .c_text'),
									array('property' => 'margin', 'label' => esc_html__( 'Margin', 'ssc' ), 'selector' => '.c_icon, .c_img, .c_text'),
									array('property' => 'padding', 'label' => esc_html__( 'Padding', 'ssc' ), 'selector' => '.c_icon, .c_img, .c_text'),
									array('property' => 'border', 'label' => esc_html__( 'Border', 'ssc' ), 'selector' => '.c_icon, .c_img, .c_text'),
									array('property' => 'border-radius', 'label' => esc_html__( 'Border Radius', 'ssc' ), 'selector' => '.c_icon, .c_img, .c_text'),
								),
								// --> Icon Box
								'Icon Box' => array(
									array('property' => 'background', 'selector' => '.icon_box'),
									array('property' => 'display', 'label' => esc_html__( 'Display', 'ssc' ), 'selector' => '.icon_box'),
									array('property' => 'width', 'label' => esc_html__( 'Width', 'ssc' ), 'selector' => '.icon_box'),
									array('property' => 'height', 'label' => esc_html__( 'Height', 'ssc' ), 'selector' => '.icon_box'),
									array('property' => 'box-shadow', 'label' => esc_html__( 'Box Shadow', 'ssc' ), 'selector' => '.icon_box'),
									array('property' => 'opacity', 'label' => esc_html__( 'Opacity', 'ssc' ), 'selector' => '.icon_box'),
									array('property' => 'margin', 'label' => esc_html__( 'Margin', 'ssc' ), 'selector' => '.icon_box'),
									array('property' => 'padding', 'label' => esc_html__( 'Padding', 'ssc' ), 'selector' => '.icon_box'),
									array('property' => 'border', 'label' => esc_html__( 'Border', 'ssc' ), 'selector' => '.icon_box'),
									array('property' => 'border-radius', 'label' => esc_html__( 'Border Radius', 'ssc' ), 'selector' => '.icon_box'),
								),
								// --> Bgr Icon - Icon/Image/Box
								'Bgr Icon' => array(
									array('property' => 'color', 'label' => esc_html__( 'Color', 'ssc' ), 'selector' => '.bgr_icon'),
									array('property' => 'font-size', 'label' => esc_html__( 'Font Size', 'ssc' ), 'selector' => '.bgr_icon i'),
									array('property' => 'line-height', 'label' => esc_html__( 'Line Height', 'ssc' ), 'selector' => '.bgr_icon i, .bgr_img img, .bgr_no'),
									array('property' => 'text-align', 'label' => esc_html__( 'Text Align', 'ssc' ), 'selector' => '.bgr_icon i, .bgr_img, .bgr_no'),
									array('property' => 'background', 'selector' => '.bgr_icon i, .bgr_img, .bgr_no'),
									array('property' => 'height', 'label' => esc_html__( 'Height', 'ssc' ), 'selector' => '.bgr_icon i, .bgr_no, .bgr_img img, .bgr_img'),
									array('property' => 'box-shadow', 'label' => esc_html__( 'Box Shadow', 'ssc' ), 'selector' => '.bgr_icon i, .bgr_img, .bgr_no'),
									array('property' => 'opacity', 'label' => esc_html__( 'Opacity', 'ssc' ), 'selector' => '.bgr_icon i, .bgr_img img, .bgr_no'),
									array('property' => 'margin', 'label' => esc_html__( 'Margin', 'ssc' ), 'selector' => '.bgr_icon i, .bgr_img img, .bgr_no'),
									array('property' => 'padding', 'label' => esc_html__( 'Padding', 'ssc' ), 'selector' => '.bgr_icon, .bgr_img, .bgr_no'),
									array('property' => 'border', 'label' => esc_html__( 'Border', 'ssc' ), 'selector' => '.bgr_icon i, .bgr_img img, .bgr_no'),
									array('property' => 'border-radius', 'label' => esc_html__( 'Border Radius', 'ssc' ), 'selector' => '.bgr_icon i, .bgr_img img, .bgr_no'),
								),
								// --> Bgr Icon Box
								// --> Title
								'Title' => array(
									array('property' => 'color', 'label' => esc_html__( 'Color', 'ssc' ), 'selector' => '.title, .title a'),
									array('property' => 'color', 'label' => esc_html__( 'Color Box Hover', 'ssc' ), 'selector' => '+:hover .title, +:hover  .title a'),
									array('property' => 'font-size', 'label' => esc_html__( 'Font Size', 'ssc' ), 'selector' => '.title, .title a'),
									array('property' => 'line-height', 'label' => esc_html__( 'Line Height', 'ssc' ), 'selector' => '.title, .title a'),
									array('property' => 'font-weight', 'label' => esc_html__( 'Font Weight', 'ssc' ), 'selector' => '.title, .title a'),
									array('property' => 'font-style', 'label' => esc_html__( 'Font Style', 'ssc' ), 'selector' => '.title, .title a'),
									array('property' => 'font-family', 'label' => esc_html__( 'Font Family', 'ssc' ), 'selector' => '.title, .title a'),
									array('property' => 'text-align', 'label' => esc_html__( 'Text Align', 'ssc' ), 'selector' => '.title, .title a'),
									array('property' => 'text-transform', 'label' => esc_html__( 'Text Transform', 'ssc' ), 'selector' => '.title, .title a'),
									array('property' => 'text-decoration', 'label' => esc_html__( 'Text Decoration', 'ssc' ), 'selector' => '.title, .title a'),
									array('property' => 'letter-spacing', 'label' => esc_html__( 'Letter Spacing', 'ssc' ), 'selector' => '.title, .title a'),
									array('property' => 'background', 'selector' => '.title, .title a'),
									array('property' => 'width', 'label' => esc_html__( 'Width', 'ssc' ), 'selector' => '.title'),
									array('property' => 'height', 'label' => esc_html__( 'Height', 'ssc' ), 'selector' => '.title'),
									array('property' => 'float', 'label' => esc_html__( 'Float', 'ssc' ), 'selector' => '.title, .title a'),
									array('property' => 'display', 'label' => esc_html__( 'Display', 'ssc' ), 'selector' => '.title, .title a'),
									array('property' => 'vertical-align', 'label' => 'Vertical Align', 'selector' => '.title_box'),
									array('property' => 'margin', 'label' => esc_html__( 'Margin', 'ssc' ), 'selector' => '.title, .title a'),
									array('property' => 'padding', 'label' => esc_html__( 'Padding', 'ssc' ), 'selector' => '.title, .title a'),
									array('property' => 'border', 'label' => esc_html__( 'Border', 'ssc' ), 'selector' => '.title, .title a'),
									array('property' => 'border-radius', 'label' => esc_html__( 'Border Radius', 'ssc' ), 'selector' => '.title, .title a'),
								),
								// --> Subtitle
								'Subtitle' => array(
									array('property' => 'color', 'label' => esc_html__( 'Color', 'ssc' ), 'selector' => '.subtitle'),
									array('property' => 'font-size', 'label' => esc_html__( 'Font Size', 'ssc' ), 'selector' => '.subtitle'),
									array('property' => 'line-height', 'label' => esc_html__( 'Line Height', 'ssc' ), 'selector' => '.subtitle'),
									array('property' => 'font-weight', 'label' => esc_html__( 'Font Weight', 'ssc' ), 'selector' => '.subtitle'),
									array('property' => 'font-style', 'label' => esc_html__( 'Font Style', 'ssc' ), 'selector' => '.subtitle'),
									array('property' => 'font-family', 'label' => esc_html__( 'Font Family', 'ssc' ), 'selector' => '.subtitle'),
									array('property' => 'text-align', 'label' => esc_html__( 'Text Align', 'ssc' ), 'selector' => '.subtitle'),
									array('property' => 'text-transform', 'label' => esc_html__( 'Text Transform', 'ssc' ), 'selector' => '.subtitle'),
									array('property' => 'text-decoration', 'label' => esc_html__( 'Text Decoration', 'ssc' ), 'selector' => '.subtitle'),
									array('property' => 'letter-spacing', 'label' => esc_html__( 'Letter Spacing', 'ssc' ), 'selector' => '.subtitle'),
									array('property' => 'background', 'selector' => '.subtitle'),
									array('property' => 'width', 'label' => esc_html__( 'Width', 'ssc' ), 'selector' => '.subtitle'),
									array('property' => 'height', 'label' => esc_html__( 'Height', 'ssc' ), 'selector' => '.subtitle'),
									array('property' => 'float', 'label' => esc_html__( 'Float', 'ssc' ), 'selector' => '.subtitle'),
									array('property' => 'display', 'label' => esc_html__( 'Display', 'ssc' ), 'selector' => '.subtitle'),
									array('property' => 'margin', 'label' => esc_html__( 'Margin', 'ssc' ), 'selector' => '.subtitle'),
									array('property' => 'padding', 'label' => esc_html__( 'Padding', 'ssc' ), 'selector' => '.subtitle'),
									array('property' => 'border', 'label' => esc_html__( 'Border', 'ssc' ), 'selector' => '.subtitle'),
									array('property' => 'border-radius', 'label' => esc_html__( 'Border Radius', 'ssc' ), 'selector' => '.subtitle'),
								),
								// --> Description
								'description' => array(
									array('property' => 'color', 'label' => esc_html__( 'Color', 'ssc' ), 'selector' => '.cont_box .description'),
									array('property' => 'font-size', 'label' => esc_html__( 'Font Size', 'ssc' ), 'selector' => '.cont_box .description'),
									array('property' => 'line-height', 'label' => esc_html__( 'Line Height', 'ssc' ), 'selector' => '.cont_box .description, .cont_box .description p'),
									array('property' => 'font-weight', 'label' => esc_html__( 'Font Weight', 'ssc' ), 'selector' => '.cont_box .description'),
									array('property' => 'font-style', 'label' => esc_html__( 'Font Style', 'ssc' ), 'selector' => '.cont_box .description'),
									array('property' => 'font-family', 'label' => esc_html__( 'Font Family', 'ssc' ), 'selector' => '.cont_box .description'),
									array('property' => 'text-align', 'label' => esc_html__( 'Text Align', 'ssc' ), 'selector' => '.cont_box .description'),
									array('property' => 'text-transform', 'label' => esc_html__( 'Text Transform', 'ssc' ), 'selector' => '.cont_box .description'),
									array('property' => 'text-decoration', 'label' => esc_html__( 'Text Decoration', 'ssc' ), 'selector' => '.cont_box .description'),
									array('property' => 'background', 'selector' => '.cont_box .description'),
									array('property' => 'box-shadow', 'label' => esc_html__( 'Box Shadow', 'ssc' ), 'selector' => '.cont_box .description'),
									array('property' => 'float', 'label' => esc_html__( 'Float', 'ssc' ), 'selector' => '.cont_box .description'),
									array('property' => 'display', 'label' => esc_html__( 'Display', 'ssc' ), 'selector' => '.cont_box .description'),
									array('property' => 'height', 'label' => esc_html__( 'Height', 'ssc' ), 'selector' => '.cont_box .description'),
									array('property' => 'margin', 'label' => esc_html__( 'Margin', 'ssc' ), 'selector' => '.cont_box .description'),
									array('property' => 'padding', 'label' => esc_html__( 'Padding', 'ssc' ), 'selector' => '.cont_box .description'),
									array('property' => 'border', 'label' => esc_html__( 'Border', 'ssc' ), 'selector' => '.cont_box .description'),
									array('property' => 'border-radius', 'label' => esc_html__( 'Border Radius', 'ssc' ), 'selector' => '.cont_box .description'),
								),
								// --> Description Links
								'desc Links' => array(
									array('property' => 'color', 'label' => esc_html__( 'Color', 'ssc' ), 'selector' => '.description a'),
									array('property' => 'color', 'label' => esc_html__( 'Color Hover', 'ssc' ), 'selector' => '.description a:hover'),
									array('property' => 'font-weight', 'label' => esc_html__( 'Font Weight', 'ssc' ), 'selector' => '.description a'),
									array('property' => 'font-style', 'label' => esc_html__( 'Font Style', 'ssc' ), 'selector' => '.description a'),
									array('property' => 'text-transform', 'label' => esc_html__( 'Text Transform', 'ssc' ), 'selector' => '.description a'),
									array('property' => 'text-decoration', 'label' => esc_html__( 'Text Decoration', 'ssc' ), 'selector' => '.description a'),
									array('property' => 'text-decoration', 'label' => esc_html__( 'Text Decoration Hover', 'ssc' ), 'selector' => '.description a:hover'),
									array('property' => 'background', 'selector' => '.description a'),
								),
								// --> Images in Description
								'Desc Images' => array(
									array('property' => 'text-align', 'label' => esc_html__( 'Image Align', 'ssc' ), 'selector' => '.description img'),
									array('property' => 'float', 'label' => esc_html__( 'Float', 'ssc' ), 'selector' => '.description img'),
									array('property' => 'display', 'label' => esc_html__( 'Display', 'ssc' ), 'selector' => '.description img'),
									array('property' => 'height', 'label' => esc_html__( 'Height', 'ssc' ), 'selector' => '.description img'),
									array('property' => 'margin', 'label' => esc_html__( 'Margin', 'ssc' ), 'selector' => '.description img'),
									array('property' => 'padding', 'label' => esc_html__( 'Padding', 'ssc' ), 'selector' => '.description img'),
									array('property' => 'border', 'label' => esc_html__( 'Border', 'ssc' ), 'selector' => '.description img'),
									array('property' => 'border-radius', 'label' => esc_html__( 'Border Radius', 'ssc' ), 'selector' => '.description img'),
								),
								'Desc List' => array(
									array('property' => 'text-align', 'label' => esc_html__( 'Image Align', 'ssc' ), 'selector' => '.description ol, .description ul'),
									array('property' => 'line-height', 'label' => esc_html__( 'Line Height', 'ssc' ), 'selector' => '.description ol, .description ul'),
									array('property' => 'float', 'label' => esc_html__( 'Float', 'ssc' ), 'selector' => '.description ol, .description ul'),
									array('property' => 'display', 'label' => esc_html__( 'Display', 'ssc' ), 'selector' => '.description ol, .description ul'),
									array('property' => 'height', 'label' => esc_html__( 'Height', 'ssc' ), 'selector' => '.description ol, .description ul'),
									array('property' => 'margin', 'label' => esc_html__( 'Margin', 'ssc' ), 'selector' => '.description ol, .description ul'),
									array('property' => 'padding', 'label' => esc_html__( 'Padding', 'ssc' ), 'selector' => '.description ol, .description ul'),
									array('property' => 'border', 'label' => esc_html__( 'Border', 'ssc' ), 'selector' => '.description ol, .description ul'),
									array('property' => 'border-radius', 'label' => esc_html__( 'Border Radius', 'ssc' ), 'selector' => '.description ol, .description ul'),
								),
								// --> Link
								'link' => array(
									array('property' => 'color', 'label' => esc_html__( 'Color', 'ssc' ), 'selector' => '.cont_box .rm'),
									array('property' => 'font-size', 'label' => esc_html__( 'Font Size', 'ssc' ), 'selector' => '.cont_box .rm'),
									array('property' => 'line-height', 'label' => esc_html__( 'Line Height', 'ssc' ), 'selector' => '.cont_box .rm'),
									array('property' => 'font-weight', 'label' => esc_html__( 'Font Weight', 'ssc' ), 'selector' => '.cont_box .rm'),
									array('property' => 'font-style', 'label' => esc_html__( 'Font Style', 'ssc' ), 'selector' => '.cont_box .rm'),
									array('property' => 'font-family', 'label' => esc_html__( 'Font Family', 'ssc' ), 'selector' => '.cont_box .rm'),
									array('property' => 'text-align', 'label' => esc_html__( 'Text Align', 'ssc' ), 'selector' => '.cont_box .rm'),
									array('property' => 'text-transform', 'label' => esc_html__( 'Text Transform', 'ssc' ), 'selector' => '.cont_box .rm'),
									array('property' => 'text-decoration', 'label' => esc_html__( 'Text Decoration', 'ssc' ), 'selector' => '.cont_box .rm'),
									array('property' => 'opacity', 'label' => esc_html__( 'Opacity', 'ssc' ), 'selector' => '.cont_box .rm'),
									array('property' => 'background', 'selector' => '.cont_box .rm'),
									array('property' => 'box-shadow', 'label' => esc_html__( 'Box Shadow', 'ssc' ), 'selector' => '.cont_box .rm'),
									array('property' => 'width', 'label' => esc_html__( 'Width', 'ssc' ), 'selector' => '.cont_box .rm'),
									array('property' => 'float', 'label' => esc_html__( 'Float', 'ssc' ), 'selector' => '.cont_box .rm'),
									array('property' => 'display', 'label' => esc_html__( 'Display', 'ssc' ), 'selector' => '.cont_box .rm'),
									array('property' => 'margin', 'label' => esc_html__( 'Margin', 'ssc' ), 'selector' => '.cont_box .rm'),
									array('property' => 'padding', 'label' => esc_html__( 'Padding', 'ssc' ), 'selector' => '.cont_box .rm'),
									array('property' => 'border', 'label' => esc_html__( 'Border', 'ssc' ), 'selector' => '.cont_box .rm'),
									array('property' => 'border-radius', 'label' => esc_html__( 'Border Radius', 'ssc' ), 'selector' => '.cont_box .rm'),
								),
								'Link Icon' => array(
									array('property' => 'color', 'label' => esc_html__( 'Color', 'ssc' ), 'selector' => '.rm i'),
									array('property' => 'font-size', 'label' => esc_html__( 'Font Size', 'ssc' ), 'selector' => '.rm i'),
									array('property' => 'line-height', 'label' => esc_html__( 'Line Height', 'ssc' ), 'selector' => '.rm i'),
									array('property' => 'font-family', 'label' => esc_html__( 'Font Family', 'ssc' ), 'selector' => '.rm i'),
									array('property' => 'font-weight', 'label' => esc_html__( 'Font Weight', 'ssc' ), 'selector' => '.rm i'),
									array('property' => 'text-align', 'label' => esc_html__( 'Text Align', 'ssc' ), 'selector' => '.rm i'),
									array('property' => 'text-decoration', 'label' => esc_html__( 'Text Decoration', 'ssc' ), 'selector' => '.rm i'),
									array('property' => 'width', 'label' => esc_html__( 'Width', 'ssc' ), 'selector' => '.rm i'),
									array('property' => 'height', 'label' => esc_html__( 'Height', 'ssc' ), 'selector' => '.rm i'),
									array('property' => 'width', 'label' => esc_html__( 'SVG Width', 'ssc' ), 'selector' => '.rm svg'),
									array('property' => 'height', 'label' => esc_html__( 'SVG Height', 'ssc' ), 'selector' => '.rm svg'),
									array('property' => 'display', 'label' => esc_html__( 'SVG Display', 'ssc' ), 'selector' => '.rm svg'),
									array('property' => 'float', 'label' => esc_html__( 'Float', 'ssc' ), 'selector' => '.rm i'),
									array('property' => 'float', 'label' => esc_html__( 'SVG Float', 'ssc' ), 'selector' => '.rm svg'),
									array('property' => 'margin', 'label' => esc_html__( 'SVG Margin', 'ssc' ), 'selector' => '.rm svg'),
									array('property' => 'padding', 'label' => esc_html__( 'SVG Padding', 'ssc' ), 'selector' => '.rm svg'),
									array('property' => 'opacity', 'label' => esc_html__( 'SVG Opacity', 'ssc' ), 'selector' => '.rm svg'),
									array('property' => 'background', 'selector' => '.rm i'),
									array('property' => 'box-shadow', 'label' => esc_html__( 'Box Shadow', 'ssc' ), 'selector' => '.rm i'),
									array('property' => 'opacity', 'label' => esc_html__( 'Opacity', 'ssc' ), 'selector' => '.rm i'),
									array('property' => 'margin', 'label' => esc_html__( 'Margin', 'ssc' ), 'selector' => '.rm i'),
									array('property' => 'padding', 'label' => esc_html__( 'Padding', 'ssc' ), 'selector' => '.rm i'),
									array('property' => 'border', 'label' => esc_html__( 'Border', 'ssc' ), 'selector' => '.rm i'),
									array('property' => 'border-radius', 'label' => esc_html__( 'Border Radius', 'ssc' ), 'selector' => '.rm i'),
								),
								'Link SVG' => array(
									array('property' => 'fill', 'label' => esc_html__( 'Fill', 'ssc' ), 'selector' => '.rm svg'),
									array('property' => 'width', 'label' => esc_html__( 'Width', 'ssc' ), 'selector' => '.rm svg'),
									array('property' => 'max-width', 'label' => esc_html__( 'Max Width', 'ssc' ), 'selector' => '.rm svg'),
									array('property' => 'height', 'label' => esc_html__( 'Height', 'ssc' ), 'selector' => '.rm svg'),
									array('property' => 'display', 'label' => esc_html__( 'Display', 'ssc' ), 'selector' => '.rm svg'),
									array('property' => 'float', 'label' => esc_html__( 'Float', 'ssc' ), 'selector' => '.rm svg'),
									array('property' => 'opacity', 'label' => esc_html__( 'Opacity', 'ssc' ), 'selector' => '.rm svg'),
									array('property' => 'margin', 'label' => esc_html__( 'Margin', 'ssc' ), 'selector' => '.rm svg'),
									array('property' => 'padding', 'label' => esc_html__( 'Padding', 'ssc' ), 'selector' => '.rm svg'),
									array('property' => 'border', 'label' => esc_html__( 'Border', 'ssc' ), 'selector' => '.rm svg'),
									array('property' => 'border-radius', 'label' => esc_html__( 'Border Radius', 'ssc' ), 'selector' => '.rm svg'),
								),
								// --> Conetnt Box
								'Content Box' => array(
									array('property' => 'text-align', 'label' => esc_html__( 'Text Align', 'ssc' ), 'selector' => '.cont_box'),
									array('property' => 'line-height', 'label' => esc_html__( 'Line Height', 'ssc' ), 'selector' => '.cont_box'),
									array('property' => 'background', 'selector' => '.cont_box'),
									array('property' => 'width', 'label' => esc_html__( 'Width', 'ssc' ), 'selector' => '.cont_box'),
									array('property' => 'height', 'label' => esc_html__( 'Height', 'ssc' ), 'selector' => '.cont_box'),
									array('property' => 'vertical-align', 'label' => 'Vertical Align', 'selector' => '.cont_box'),
									array('property' => 'display', 'label' => esc_html__( 'Display', 'ssc' ), 'selector' => '.cont_box'),
									array('property' => 'float', 'label' => esc_html__( 'Float', 'ssc' ), 'selector' => '.cont_box'),
									array('property' => 'box-shadow', 'label' => esc_html__( 'Box Shadow', 'ssc' ), 'selector' => '.cont_box'),
									array('property' => 'opacity', 'label' => esc_html__( 'Opacity', 'ssc' ), 'selector' => '.cont_box'),
									array('property' => 'margin', 'label' => esc_html__( 'Margin', 'ssc' ), 'selector' => '.cont_box'),
									array('property' => 'padding', 'label' => esc_html__( 'Padding', 'ssc' ), 'selector' => '.cont_box'),
									array('property' => 'border', 'label' => esc_html__( 'Border', 'ssc' ), 'selector' => '.cont_box'),
									array('property' => 'border-radius', 'label' => esc_html__( 'Border Radius', 'ssc' ), 'selector' => '.cont_box'),
								),
								'Custom' => array(
									array('property' => 'custom', 'label' => esc_html__('Custom CSS for Icon', 'ssc' ), 'selector' => '.icon_box .c_icon, .icon_box .c_text'),
									array('property' => 'custom', 'label' => esc_html__('Custom CSS for Icon Box', 'ssc' ), 'selector' => '.icon_box'),
								)
							),

						)
					)
				),
				esc_html__( 'hover', 'ssc' ) => array(
					array(
						'name' => 'hover-css',
						'label' => esc_html__( 'Hover', 'ssc' ),
						'type' => 'css',
						'value' => '', // remove this if you do not need a default content
						//'options' => array(), register css properties, selectors and screens
						'description' => esc_html__( 'Styles for Hover Condition', 'ssc' ),
						'options' => array(
							array(
								'screens' => "any,1024,999,768,479",
								// --> Box
								'Box' => array(
									array('property' => 'text-align', 'label' => esc_html__( 'Text Align', 'ssc' ), 'selector' => '+:hover'),
									array('property' => 'background', 'selector' => '+:hover'),
									array('property' => 'width', 'label' => esc_html__( 'Width', 'ssc' ), 'selector' => '+:hover'),
									array('property' => 'height', 'label' => esc_html__( 'Height', 'ssc' ), 'selector' => '+:hover'),
									array('property' => 'box-shadow', 'label' => esc_html__( 'Box Shadow', 'ssc' ), 'selector' => '+:hover'),
									array('property' => 'opacity', 'label' => esc_html__( 'Opacity', 'ssc' ), 'selector' => '+:hover'),
									array('property' => 'margin', 'label' => esc_html__( 'Margin', 'ssc' ), 'selector' => '+:hover'),
									array('property' => 'padding', 'label' => esc_html__( 'Padding', 'ssc' ), 'selector' => '+:hover'),
									array('property' => 'border', 'label' => esc_html__( 'Border', 'ssc' ), 'selector' => '+:hover'),
									array('property' => 'border-radius', 'label' => esc_html__( 'Border Radius', 'ssc' ), 'selector' => '+:hover'),
								),
								'SVG' => array(
									array('property' => 'fill', 'label' => esc_html__( 'Fill', 'ssc' ) . ' ' . esc_html__( 'Hover', 'ssc' ), 'selector' => '+:hover .c_svg svg'),
									array('property' => 'width', 'label' => esc_html__( 'Width', 'ssc' ), 'selector' => '+:hover .c_svg svg'),
									array('property' => 'width', 'label' => esc_html__( 'Width', 'ssc' ), 'selector' => '+:hover .c_svg svg'),
									array('property' => 'height', 'label' => esc_html__( 'Height', 'ssc' ), 'selector' => '+:hover .c_svg svg'),
									array('property' => 'display', 'label' => esc_html__( 'Display', 'ssc' ), 'selector' => '+:hover .c_svg svg'),
									array('property' => 'float', 'label' => esc_html__( 'Float', 'ssc' ), 'selector' => '+:hover .c_svg svg'),
									array('property' => 'background', 'selector' => '+:hover .c_svg'),
									array('property' => 'box-shadow', 'label' => esc_html__( 'Box Shadow', 'ssc' ), 'selector' => '+:hover .c_svg'),
									array('property' => 'opacity', 'label' => esc_html__( 'Opacity', 'ssc' ), 'selector' => '+:hover .c_svg'),
									array('property' => 'margin', 'label' => esc_html__( 'Margin', 'ssc' ), 'selector' => '+:hover .c_svg'),
									array('property' => 'padding', 'label' => esc_html__( 'Padding', 'ssc' ), 'selector' => '+:hover .c_svg'),
									array('property' => 'border', 'label' => esc_html__( 'Border', 'ssc' ), 'selector' => '+:hover .c_svg'),
									array('property' => 'border-radius', 'label' => esc_html__( 'Border Radius', 'ssc' ), 'selector' => '+:hover .c_svg'),
								),
								// --> Icon/Img/Text
								'Icon' => array(
									array('property' => 'color', 'label' => esc_html__( 'Color', 'ssc' ), 'selector' => '+:hover .c_icon,:hover .c_text'),
									array('property' => 'font-size', 'label' => esc_html__( 'Font Size', 'ssc' ), 'selector' => '+:hover .c_icon,:hover .c_text'),
									array('property' => 'line-height', 'label' => esc_html__( 'Line Height', 'ssc' ), 'selector' => '+:hover .c_icon,:hover .c_img,:hover .c_text'),
									array('property' => 'text-align', 'label' => esc_html__( 'Text Align', 'ssc' ), 'selector' => '+:hover .c_icon,:hover .c_img,:hover .c_text'),
									array('property' => 'text-decoration', 'label' => esc_html__( 'Text Decoration', 'ssc' ), 'selector' => '+:hover .c_icon a,:hover .c_img a,:hover .c_text'),
									array('property' => 'background', 'selector' => '+:hover .c_icon,:hover .c_img,:hover .c_text'),
									array('property' => 'width', 'label' => esc_html__( 'Width', 'ssc' ), 'selector' => '+:hover .c_icon,:hover .c_img,:hover .c_img img,:hover .c_text'),
									array('property' => 'height', 'label' => esc_html__( 'Height', 'ssc' ), 'selector' => '+:hover .c_icon,:hover .c_img,:hover .c_img img,:hover .c_text'),
									array('property' => 'box-shadow', 'label' => esc_html__( 'Box Shadow', 'ssc' ), 'selector' => '+:hover .c_icon,:hover .c_img,:hover .c_text'),
									array('property' => 'opacity', 'label' => esc_html__( 'Opacity', 'ssc' ), 'selector' => '+:hover .c_icon,:hover .c_img,:hover .c_text'),
									array('property' => 'margin', 'label' => esc_html__( 'Margin', 'ssc' ), 'selector' => '+:hover .c_icon,:hover .c_img,:hover .c_text'),
									array('property' => 'padding', 'label' => esc_html__( 'Padding', 'ssc' ), 'selector' => '+:hover .c_icon,:hover .c_img,:hover .c_text'),
									array('property' => 'border', 'label' => esc_html__( 'Border', 'ssc' ), 'selector' => '+:hover .c_icon,:hover .c_img,:hover .c_text'),
									array('property' => 'border-radius', 'label' => esc_html__( 'Border Radius', 'ssc' ), 'selector' => '+:hover .c_icon,:hover .c_img,:hover .c_text'),
								),
								// --> Icon Box
								'Icon Box' => array(
									array('property' => 'background', 'selector' => '+:hover .icon_box'),
									array('property' => 'width', 'label' => esc_html__( 'Width', 'ssc' ), 'selector' => '+:hover .icon_box'),
									array('property' => 'height', 'label' => esc_html__( 'Height', 'ssc' ), 'selector' => '+:hover .icon_box'),
									array('property' => 'box-shadow', 'label' => esc_html__( 'Box Shadow', 'ssc' ), 'selector' => '+:hover .icon_box'),
									array('property' => 'opacity', 'label' => esc_html__( 'Opacity', 'ssc' ), 'selector' => '+:hover .icon_box'),
									array('property' => 'margin', 'label' => esc_html__( 'Margin', 'ssc' ), 'selector' => '+:hover .icon_box'),
									array('property' => 'padding', 'label' => esc_html__( 'Padding', 'ssc' ), 'selector' => '+:hover .icon_box'),
									array('property' => 'border', 'label' => esc_html__( 'Border', 'ssc' ), 'selector' => '+:hover .icon_box'),
									array('property' => 'border-radius', 'label' => esc_html__( 'Border Radius', 'ssc' ), 'selector' => '+:hover .icon_box'),
								),
								// --> Bgr Icon - Icon/Image/Box
								'Bgr Icon' => array(
									array('property' => 'color', 'label' => esc_html__( 'Color', 'ssc' ), 'selector' => '+:hover .bgr_icon'),
									array('property' => 'font-size', 'label' => esc_html__( 'Font Size', 'ssc' ), 'selector' => '+:hover .bgr_icon i'),
									array('property' => 'line-height', 'label' => esc_html__( 'Line Height', 'ssc' ), 'selector' => '+:hover .bgr_icon i,:hover .bgr_img img,:hover .bgr_no'),
									array('property' => 'text-align', 'label' => esc_html__( 'Text Align', 'ssc' ), 'selector' => '+:hover .bgr_icon i,:hover .bgr_img'),
									array('property' => 'background', 'selector' => '+:hover .bgr_icon i,:hover .bgr_img,:hover .bgr_no'),

									array('property' => 'height', 'label' => esc_html__( 'Height', 'ssc' ), 'selector' => '+:hover .bgr_icon i,:hover .bgr_no,:hover .bgr_img img,:hover .bgr_img'),
									array('property' => 'box-shadow', 'label' => esc_html__( 'Box Shadow', 'ssc' ), 'selector' => '+:hover .bgr_icon i,:hover .bgr_img,:hover .bgr_no'),
									array('property' => 'opacity', 'label' => esc_html__( 'Opacity', 'ssc' ), 'selector' => '+:hover .bgr_icon i,:hover .bgr_img img,:hover .bgr_no'),
									array('property' => 'margin', 'label' => esc_html__( 'Margin', 'ssc' ), 'selector' => '+:hover .bgr_icon i,:hover .bgr_img img,:hover .bgr_no'),
									array('property' => 'padding', 'label' => esc_html__( 'Padding', 'ssc' ), 'selector' => '+:hover .bgr_icon,:hover .bgr_img,:hover .bgr_no'),
									array('property' => 'border', 'label' => esc_html__( 'Border', 'ssc' ), 'selector' => '+:hover .bgr_icon i,:hover .bgr_img img,:hover .bgr_no'),
									array('property' => 'border-radius', 'label' => esc_html__( 'Border Radius', 'ssc' ), 'selector' => '+:hover .bgr_icon i,:hover .bgr_img img,:hover .bgr_no'),
								),
								// --> Bgr Icon Box
								// --> Title
								'Title' => array(
									array('property' => 'color', 'label' => esc_html__( 'Color', 'ssc' ), 'selector' => '+:hover .title, :hover .title a'),
									array('property' => 'color', 'label' => esc_html__( 'Color Title Hover', 'ssc' ), 'selector' => ' .title:hover,  .title a:hover'),
									array('property' => 'font-size', 'label' => esc_html__( 'Font Size', 'ssc' ), 'selector' => '+:hover .title, :hover .title a'),
									array('property' => 'line-height', 'label' => esc_html__( 'Line Height', 'ssc' ), 'selector' => '+:hover .title, :hover .title a'),
									array('property' => 'font-weight', 'label' => esc_html__( 'Font Weight', 'ssc' ), 'selector' => '+:hover .title, :hover .title a'),
									array('property' => 'font-style', 'label' => esc_html__( 'Font Style', 'ssc' ), 'selector' => '+:hover .title, :hover .title a'),
									array('property' => 'font-family', 'label' => esc_html__( 'Font Family', 'ssc' ), 'selector' => '+:hover .title, :hover .title a'),
									array('property' => 'text-align', 'label' => esc_html__( 'Text Align', 'ssc' ), 'selector' => '+:hover .title, :hover .title a'),
									array('property' => 'text-transform', 'label' => esc_html__( 'Text Transform', 'ssc' ), 'selector' => '+:hover .title, :hover .title a'),
									array('property' => 'text-decoration', 'label' => esc_html__( 'Text Decoration', 'ssc' ), 'selector' => '+:hover .title, :hover .title a'),
									array('property' => 'background', 'selector' => '+:hover .title, :hover .title a'),
									array('property' => 'width', 'label' => esc_html__( 'Width', 'ssc' ), 'selector' => '+:hover .title'),
									array('property' => 'height', 'label' => esc_html__( 'Height', 'ssc' ), 'selector' => '+:hover .title'),
									array('property' => 'float', 'label' => esc_html__( 'Float', 'ssc' ), 'selector' => '+:hover .title, :hover .title a'),
									array('property' => 'display', 'label' => esc_html__( 'Display', 'ssc' ), 'selector' => '+:hover .title, :hover .title a'),
									array('property' => 'margin', 'label' => esc_html__( 'Margin', 'ssc' ), 'selector' => '+:hover .title, :hover .title a'),
									array('property' => 'padding', 'label' => esc_html__( 'Padding', 'ssc' ), 'selector' => '+:hover .title, :hover .title a'),
									array('property' => 'border', 'label' => esc_html__( 'Border', 'ssc' ), 'selector' => '+:hover .title, :hover .title a'),
									array('property' => 'border-radius', 'label' => esc_html__( 'Border Radius', 'ssc' ), 'selector' => '+:hover .title, :hover .title a'),
								),
								// --> Subtitle
								'Subtitle' => array(
									array('property' => 'color', 'label' => esc_html__( 'Color', 'ssc' ), 'selector' => '+:hover .subtitle'),
									array('property' => 'font-size', 'label' => esc_html__( 'Font Size', 'ssc' ), 'selector' => '+:hover .subtitle'),
									array('property' => 'line-height', 'label' => esc_html__( 'Line Height', 'ssc' ), 'selector' => '+:hover .subtitle'),
									array('property' => 'font-weight', 'label' => esc_html__( 'Font Weight', 'ssc' ), 'selector' => '+:hover .subtitle'),
									array('property' => 'font-style', 'label' => esc_html__( 'Font Style', 'ssc' ), 'selector' => '+:hover .subtitle'),
									array('property' => 'font-family', 'label' => esc_html__( 'Font Family', 'ssc' ), 'selector' => '+:hover .subtitle'),
									array('property' => 'text-align', 'label' => esc_html__( 'Text Align', 'ssc' ), 'selector' => '+:hover .subtitle'),
									array('property' => 'text-transform', 'label' => esc_html__( 'Text Transform', 'ssc' ), 'selector' => '+:hover .subtitle'),
									array('property' => 'text-decoration', 'label' => esc_html__( 'Text Decoration', 'ssc' ), 'selector' => '+:hover .subtitle'),
									array('property' => 'background', 'selector' => '+:hover .subtitle'),
									array('property' => 'width', 'label' => esc_html__( 'Width', 'ssc' ), 'selector' => '+:hover .subtitle'),
									array('property' => 'height', 'label' => esc_html__( 'Height', 'ssc' ), 'selector' => '+:hover .subtitle'),
									array('property' => 'float', 'label' => esc_html__( 'Float', 'ssc' ), 'selector' => '+:hover .subtitle'),
									array('property' => 'display', 'label' => esc_html__( 'Display', 'ssc' ), 'selector' => '+:hover .subtitle'),
									array('property' => 'margin', 'label' => esc_html__( 'Margin', 'ssc' ), 'selector' => '+:hover .subtitle'),
									array('property' => 'padding', 'label' => esc_html__( 'Padding', 'ssc' ), 'selector' => '+:hover .subtitle'),
									array('property' => 'border', 'label' => esc_html__( 'Border', 'ssc' ), 'selector' => '+:hover .subtitle'),
									array('property' => 'border-radius', 'label' => esc_html__( 'Border Radius', 'ssc' ), 'selector' => '+:hover .subtitle'),
								),
								// --> Description
								'description' => array(
									array('property' => 'color', 'label' => esc_html__( 'Color', 'ssc' ), 'selector' => '+:hover .cont_box .description'),
									array('property' => 'font-size', 'label' => esc_html__( 'Font Size', 'ssc' ), 'selector' => '+:hover .cont_box .description'),
									array('property' => 'line-height', 'label' => esc_html__( 'Line Height', 'ssc' ), 'selector' => '+:hover .cont_box .description'),
									array('property' => 'font-weight', 'label' => esc_html__( 'Font Weight', 'ssc' ), 'selector' => '+:hover .cont_box .description'),
									array('property' => 'font-style', 'label' => esc_html__( 'Font Style', 'ssc' ), 'selector' => '+:hover .cont_box .description'),
									array('property' => 'font-family', 'label' => esc_html__( 'Font Family', 'ssc' ), 'selector' => '+:hover .cont_box .description'),
									array('property' => 'text-align', 'label' => esc_html__( 'Text Align', 'ssc' ), 'selector' => '+:hover .cont_box .description'),
									array('property' => 'text-transform', 'label' => esc_html__( 'Text Transform', 'ssc' ), 'selector' => '+:hover .cont_box .description'),
									array('property' => 'text-decoration', 'label' => esc_html__( 'Text Decoration', 'ssc' ), 'selector' => '+:hover .cont_box .description'),
									array('property' => 'background', 'selector' => '+:hover .cont_box .description'),
									array('property' => 'box-shadow', 'label' => esc_html__( 'Box Shadow', 'ssc' ), 'selector' => '.cont_box .description'),
									array('property' => 'float', 'label' => esc_html__( 'Float', 'ssc' ), 'selector' => '+:hover .cont_box .description'),
									array('property' => 'display', 'label' => esc_html__( 'Display', 'ssc' ), 'selector' => '+:hover .cont_box .description'),
									array('property' => 'margin', 'label' => esc_html__( 'Margin', 'ssc' ), 'selector' => '+:hover .cont_box .description'),
									array('property' => 'padding', 'label' => esc_html__( 'Padding', 'ssc' ), 'selector' => '+:hover .cont_box .description'),
									array('property' => 'border', 'label' => esc_html__( 'Border', 'ssc' ), 'selector' => '+:hover .cont_box .description'),
									array('property' => 'border-radius', 'label' => esc_html__( 'Border Radius', 'ssc' ), 'selector' => '+:hover .cont_box .description'),
								),
								// --> Description Links
								'desc Links' => array(
									array('property' => 'color', 'label' => esc_html__( 'Color', 'ssc' ), 'selector' => '.description a'),
									array('property' => 'color', 'label' => esc_html__( 'Color Hover', 'ssc' ), 'selector' => '.description a:hover'),
									array('property' => 'font-weight', 'label' => esc_html__( 'Font Weight', 'ssc' ), 'selector' => '.description a'),
									array('property' => 'font-style', 'label' => esc_html__( 'Font Style', 'ssc' ), 'selector' => '.description a'),
									array('property' => 'text-transform', 'label' => esc_html__( 'Text Transform', 'ssc' ), 'selector' => '.description a'),
									array('property' => 'text-decoration', 'label' => esc_html__( 'Text Decoration', 'ssc' ), 'selector' => '.description a'),
									array('property' => 'text-decoration', 'label' => esc_html__( 'Text Decoration Hover', 'ssc' ), 'selector' => '.description a:hover'),
									array('property' => 'background', 'selector' => '.description a'),
								),
								// --> Images in Description
								'Desc Images' => array(
									array('property' => 'text-align', 'label' => esc_html__( 'Image Align', 'ssc' ), 'selector' => '.description img'),
									array('property' => 'float', 'label' => esc_html__( 'Float', 'ssc' ), 'selector' => '.description img'),
									array('property' => 'display', 'label' => esc_html__( 'Display', 'ssc' ), 'selector' => '.description img'),
									array('property' => 'height', 'label' => esc_html__( 'Height', 'ssc' ), 'selector' => '.description img'),
									array('property' => 'margin', 'label' => esc_html__( 'Margin', 'ssc' ), 'selector' => '.description img'),
									array('property' => 'padding', 'label' => esc_html__( 'Padding', 'ssc' ), 'selector' => '.description img'),
									array('property' => 'border', 'label' => esc_html__( 'Border', 'ssc' ), 'selector' => '.description img'),
									array('property' => 'border-radius', 'label' => esc_html__( 'Border Radius', 'ssc' ), 'selector' => '.description img'),
								),
								// --> Link
								'link' => array(
									array('property' => 'color', 'label' => esc_html__( 'Color', 'ssc' ), 'selector' => '.cont_box .rm:hover'),
									array('property' => 'color', 'label' => esc_html__( 'Color Box Hover', 'ssc' ), 'selector' => '+:hover .rm'),
									array('property' => 'font-size', 'label' => esc_html__( 'Font Size', 'ssc' ), 'selector' => '.cont_box .rm:hover'),
									array('property' => 'line-height', 'label' => esc_html__( 'Line Height', 'ssc' ), 'selector' => '.cont_box .rm:hover'),
									array('property' => 'font-weight', 'label' => esc_html__( 'Font Weight', 'ssc' ), 'selector' => '.cont_box .rm:hover'),
									array('property' => 'font-style', 'label' => esc_html__( 'Font Style', 'ssc' ), 'selector' => '.cont_box .rm:hover'),
									array('property' => 'font-family', 'label' => esc_html__( 'Font Family', 'ssc' ), 'selector' => '.cont_box .rm:hover'),
									array('property' => 'text-align', 'label' => esc_html__( 'Text Align', 'ssc' ), 'selector' => '.cont_box .rm:hover'),
									array('property' => 'text-transform', 'label' => esc_html__( 'Text Transform', 'ssc' ), 'selector' => '.cont_box .rm:hover'),
									array('property' => 'text-decoration', 'label' => esc_html__( 'Text Decoration', 'ssc' ), 'selector' => '.cont_box .rm:hover'),
                                    array('property' => 'opacity', 'label' => esc_html__( 'Opacity', 'ssc' ), 'selector' => '+:hover .cont_box .rm'),
									array('property' => 'background', 'selector' => '.cont_box .rm:hover'),
									array('property' => 'box-shadow', 'label' => esc_html__( 'Box Shadow', 'ssc' ), 'selector' => '.cont_box .rm:hover'),
									array('property' => 'width', 'label' => esc_html__( 'Width', 'ssc' ), 'selector' => '.cont_box .rm:hover'),
									array('property' => 'float', 'label' => esc_html__( 'Float', 'ssc' ), 'selector' => '.cont_box .rm:hover'),
									array('property' => 'display', 'label' => esc_html__( 'Display', 'ssc' ), 'selector' => '.cont_box .rm:hover'),
									array('property' => 'margin', 'label' => esc_html__( 'Margin', 'ssc' ), 'selector' => '.cont_box .rm:hover'),
									array('property' => 'padding', 'label' => esc_html__( 'Padding', 'ssc' ), 'selector' => '.cont_box .rm:hover'),
									array('property' => 'border', 'label' => esc_html__( 'Border', 'ssc' ), 'selector' => '.cont_box .rm:hover'),
									array('property' => 'border-radius', 'label' => esc_html__( 'Border Radius', 'ssc' ), 'selector' => '.cont_box .rm:hover'),
								),
								'Link Icon' => array(
									array('property' => 'color', 'label' => esc_html__( 'Color', 'ssc' ), 'selector' => '+:hover .rm i'),
									array('property' => 'color', 'label' => esc_html__( 'Color', 'ssc' ).esc_html__( 'Hover', 'ssc' ), 'selector' => '.rm:hover i'),
									array('property' => 'font-size', 'label' => esc_html__( 'Font Size', 'ssc' ), 'selector' => '+:hover .rm i'),
									array('property' => 'line-height', 'label' => esc_html__( 'Line Height', 'ssc' ), 'selector' => '+:hover .rm i'),
									array('property' => 'font-family', 'label' => esc_html__( 'Font Family', 'ssc' ), 'selector' => '+:hover .rm i'),
									array('property' => 'font-weight', 'label' => esc_html__( 'Font Weight', 'ssc' ), 'selector' => '+:hover .rm i'),
									array('property' => 'text-align', 'label' => esc_html__( 'Text Align', 'ssc' ), 'selector' => '+:hover .rm i'),
									array('property' => 'text-decoration', 'label' => esc_html__( 'Text Decoration', 'ssc' ), 'selector' => '+:hover .rm i'),
									array('property' => 'width', 'label' => esc_html__( 'Width', 'ssc' ), 'selector' => '+:hover .rm i'),
									array('property' => 'height', 'label' => esc_html__( 'Height', 'ssc' ), 'selector' => '+:hover .rm i'),
									array('property' => 'width', 'label' => esc_html__( 'SVG Width', 'ssc' ), 'selector' => '.rm:hover svg'),
									array('property' => 'height', 'label' => esc_html__( 'SVG Height', 'ssc' ), 'selector' => '.rm:hover svg'),
									array('property' => 'margin', 'label' => esc_html__( 'SVG Margin', 'ssc' ), 'selector' => '.rm:hover svg'),
									array('property' => 'padding', 'label' => esc_html__( 'SVG Padding', 'ssc' ), 'selector' => '.rm:hover svg'),
									array('property' => 'opacity', 'label' => esc_html__( 'SVG Opacity', 'ssc' ), 'selector' => '.rm:hover svg'),
									array('property' => 'background', 'selector' => '+:hover .rm i'),
									array('property' => 'background', 'selector' => '.rm:hover i'),
									array('property' => 'box-shadow', 'label' => esc_html__( 'Box Shadow', 'ssc' ), 'selector' => '+:hover .rm i'),
									array('property' => 'box-shadow', 'label' => esc_html__( 'Box Shadow', 'ssc' ).esc_html__( 'Hover', 'ssc' ), 'selector' => '.rm:hover i'),
									array('property' => 'opacity', 'label' => esc_html__( 'Opacity', 'ssc' ), 'selector' => '+:hover .rm i'),
									array('property' => 'opacity', 'label' => esc_html__( 'Opacity', 'ssc' ).esc_html__( 'Hover', 'ssc' ), 'selector' => '.rm:hover i'),
									array('property' => 'margin', 'label' => esc_html__( 'Margin', 'ssc' ), 'selector' => '+:hover .rm i'),
									array('property' => 'padding', 'label' => esc_html__( 'Padding', 'ssc' ), 'selector' => '+:hover .rm i'),
									array('property' => 'padding', 'label' => esc_html__( 'Padding', 'ssc' ).esc_html__( 'Hover', 'ssc' ), 'selector' => '.rm:hover i'),
									array('property' => 'border', 'label' => esc_html__( 'Border', 'ssc' ), 'selector' => '+:hover .rm i'),
									array('property' => 'border', 'label' => esc_html__( 'Border', 'ssc' ).esc_html__( 'Hover', 'ssc' ), 'selector' => '.rm:hover i'),
									array('property' => 'border-radius', 'label' => esc_html__( 'Border Radius', 'ssc' ), 'selector' => '+:hover .rm i'),
									array('property' => 'border-radius', 'label' => esc_html__( 'Border Radius', 'ssc' ).esc_html__( 'Hover', 'ssc' ), 'selector' => '.rm:hover i'),
								),
								'Link SVG' => array(
									array('property' => 'fill', 'label' => esc_html__( 'Fill', 'ssc' ) . ' ' . esc_html__( 'Hover', 'ssc' ), 'selector' => '.rm:hover svg'),
									array('property' => 'fill', 'label' => esc_html__( 'SVG Box Hover Color', 'ssc' ), 'selector' => '+:hover .rm svg'),
									array('property' => 'width', 'label' => esc_html__( 'Width', 'ssc' ), 'selector' => '.rm:hover svg'),
									array('property' => 'max-width', 'label' => esc_html__( 'Max Width', 'ssc' ), 'selector' => '.rm:hover svg'),
									array('property' => 'height', 'label' => esc_html__( 'Height', 'ssc' ), 'selector' => '.rm:hover svg'),
									array('property' => 'display', 'label' => esc_html__( 'Display', 'ssc' ), 'selector' => '.rm:hover svg'),
									array('property' => 'float', 'label' => esc_html__( 'Float', 'ssc' ), 'selector' => '.rm:hover svg'),
									array('property' => 'opacity', 'label' => esc_html__( 'Opacity', 'ssc' ), 'selector' => '.rm:hover svg'),
									array('property' => 'margin', 'label' => esc_html__( 'Margin', 'ssc' ), 'selector' => '.rm:hover svg'),
									array('property' => 'padding', 'label' => esc_html__( 'Padding', 'ssc' ), 'selector' => '.rm:hover svg'),
									array('property' => 'border', 'label' => esc_html__( 'Border', 'ssc' ), 'selector' => '.rm:hover svg'),
									array('property' => 'border-radius', 'label' => esc_html__( 'Border Radius', 'ssc' ), 'selector' => '.rm:hover svg'),
								),
								// --> Conetnt Box
								'Content Box' => array(
									array('property' => 'text-align', 'label' => esc_html__( 'Text Align', 'ssc' ), 'selector' => '+:hover .cont_box'),
									array('property' => 'line-height', 'label' => esc_html__( 'Line Height', 'ssc' ), 'selector' => '.cont_box'),
									array('property' => 'background', 'selector' => '+:hover .cont_box'),
									array('property' => 'width', 'label' => esc_html__( 'Width', 'ssc' ), 'selector' => '+:hover .cont_box'),
									array('property' => 'height', 'label' => esc_html__( 'Height', 'ssc' ), 'selector' => '+:hover .cont_box'),
									array('property' => 'box-shadow', 'label' => esc_html__( 'Box Shadow', 'ssc' ), 'selector' => '+:hover .cont_box'),
									array('property' => 'opacity', 'label' => esc_html__( 'Opacity', 'ssc' ), 'selector' => '+:hover .cont_box'),
									array('property' => 'margin', 'label' => esc_html__( 'Margin', 'ssc' ), 'selector' => '+:hover .cont_box'),
									array('property' => 'padding', 'label' => esc_html__( 'Padding', 'ssc' ), 'selector' => '+:hover .cont_box'),
									array('property' => 'border', 'label' => esc_html__( 'Border', 'ssc' ), 'selector' => '+:hover .cont_box'),
									array('property' => 'border-radius', 'label' => esc_html__( 'Border Radius', 'ssc' ), 'selector' => '+:hover .cont_box'),
								),

							),
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
function ssc_iconbox_shortcode($atts, $content = null) {
	extract(shortcode_atts(array(
		'template'          => '',
		'icon_type'         => '',
		'icon'              => '',
		'img'               => '',
		'svg'               => '',
		'text'              => '',
		'isize'             => '',
		'is_icon_link'      => '',
		'icon_link'         => '',
		'show_icon_link'    => '',
		'iconleft'          => '',
		'icon_link_svg'     => '',
		'linkicon'          => '',
		'bgr_type'          => '',
		'bgr_icon'          => '',
		'bgr_img'           => '',
		'bgr_text'          => '',
		'bsize'             => '',
		'title'             => '',
		'is_title_link'     => '',
		'title_link'        => '',
		'subtitle'          => '',
		'limit_lines'       => '',
		//'content'         => '',
		'link_text'         => '',
		'link_url'          => '',
		'el_class'          => '',
	) , $atts));


	$output = '';

	$wrp_classes = apply_filters( 'kc-el-class', $atts );

	if( $is_icon_link != '' && $is_icon_link === 'yes' && $icon_link != '' ){
		$icon_link = explode ( '|', $icon_link );
		$icon_tar = ( $icon_link[2] === '_blank' ) ? 'target="' . $icon_link[2] . '"' : '';
	}

	// Content elements: Icon
	switch ( $icon_type ){
		case 'icon':
			if( $is_icon_link != '' && $is_icon_link === 'yes' && $icon_link != '' ){
				$icon_c = '<div class="c_icon" style="margin-top: -'.$bsize.'px; width: '.$bsize.'px; height: '.$bsize.'px;"><a href="' . $icon_link[0] . '" ' . $icon_tar . '><i class="'.$icon.'" style=" font-size: '.$isize.'px;"></i></a></div>';

				// Content elements: Icon for template #8
				$icon_n = '<div class="c_icon" ><a href="' . $icon_link[0] . '" ' . $icon_tar . '><i class="'.$icon.'" style=" font-size: '.$isize.'px; "></i></a></div>';
			} else {
				$icon_c = '<div class="c_icon" style="margin-top: -'.$bsize.'px; width: '.$bsize.'px; height: '.$bsize.'px;"><i class="'.$icon.'" style=" font-size: '.$isize.'px;"></i></div>';

				// Content elements: Icon for template #8
				$icon_n = '<div class="c_icon" ><i class="'.$icon.'" style=" font-size: '.$isize.'px; "></i></div>';
			}
			break;

		case 'img':
			$icon_image = image_downsize( $img, 'full' );
			if( $is_icon_link != '' && $is_icon_link === 'yes' && $icon_link != '' ){
				$icon_c = '<div class="c_img" style="margin-top: -'.$bsize.'px; line-height:'.$bsize.'px; height:'.$bsize.'px; width:'.$bsize.'px;"><a href="' . $icon_link[0] . '" ' . $icon_tar . '><img src="'.$icon_image[0].'" alt="'.$title.'" style="max-width: '.$isize.'px; max-height: '.$isize.'px;margin-top: calc(('.$bsize.'px - '.$isize.'px)/2);"></a></div>';

				// Content elements: Icon for template #8
				$icon_n = '<div class="c_img"><a href="' . $icon_link[0] . '" ' . $icon_tar . '><img src="'.$icon_image[0].'" alt="'.$title.'" style="max-width: '.$isize.'px; max-height: '.$isize.'px;margin-top: calc(('.$bsize.'px - '.$isize.'px)/2);"></a></div>';
			} else {
				$icon_c = '<div class="c_img" style="margin-top: -'.$bsize.'px; line-height:'.$bsize.'px; height:'.$bsize.'px; width:'.$bsize.'px;"><img src="'.$icon_image[0].'" alt="'.$title.'" style="max-width: '.$isize.'px; max-height: '.$isize.'px;margin-top: calc(('.$bsize.'px - '.$isize.'px)/2);"></div>';

				// Content elements: Icon for template #8
				$icon_n = '<div class="c_img"><img src="'.$icon_image[0].'" alt="'.$title.'" style="max-width: '.$isize.'px; max-height: '.$isize.'px;margin-top: calc(('.$bsize.'px - '.$isize.'px)/2);"></div>';
			}
			break;

		case 'svg':
            if( $is_icon_link != '' && $is_icon_link === 'yes' && $icon_link != '' ){
                $icon_c   = '<div class="c_svg" style="margin-top: -'.$bsize.'px;"><div><a href="' . $icon_link[0] . '" ' . $icon_tar . '>' . ssc_process_svg( $svg ) . '</a></div></div>';
            } else {
                $icon_c   = '<div class="c_svg" style="margin-top: -'.$bsize.'px;"><div>' . ssc_process_svg( $svg ) . '</div></div>';
            }

			break;

		case 'text':
			$icon_c = '<div class="c_text" style=" height: '.$bsize.'px; margin-top: -'.$bsize.'px; font-size: '.$isize.'px; ">'.$text.'</div>';

			// Content elements: Icon for template #8
			$icon_n = '<div class="c_text" style=" height: '.$bsize.'px; margin-top: -'.$bsize.'px; font-size: '.$isize.'px">'.$text.'</div>';
			break;
	}

	// Content elements: BGR Icon
	switch ( $bgr_type ) {
		case 'bgr_icon':
			if( $is_icon_link != '' && $is_icon_link === 'yes' && $icon_link != '' ){
				$bgr_icon_c = '<div class="bgr_icon"><a href="' . $icon_link[0] . '" ' . $icon_tar . '><i class="'.$bgr_icon.'" style="font-size:'.$bsize.'px; width:'.$bsize.'px; height:'.$bsize.'px"></i></a></div>';
			} else {
				$bgr_icon_c = '<div class="bgr_icon"><i class="'.$bgr_icon.'" style="font-size:'.$bsize.'px; width:'.$bsize.'px; height:'.$bsize.'px"></i></div>';

			}

			break;

		case 'bgr_img':
			$bgr_icon_image = image_downsize( $bgr_img, 'full' );
			if( $is_icon_link != '' && $is_icon_link === 'yes' && $icon_link != '' ){
				$bgr_icon_c = '<div class="bgr_img"><a href="' . $icon_link[0] . '" ' . $icon_tar . '><img src="'.$bgr_icon_image[0].'" alt="'.$title.'" style="max-width: '.$bsize.'px; max-height: '.$bsize.'px;"></a></div>';
			} else {
				$bgr_icon_c = '<div class="bgr_img"><img src="'.$bgr_icon_image[0].'" alt="'.$title.'" style="max-width: '.$bsize.'px; max-height: '.$bsize.'px;"></div>';
			}

			break;

		case 'bgr_nothing':
			$bgr_icon_c = '<div class="bgr_no" style="width:'.$bsize.'px; height:'.$bsize.'px;"><div> </div></div>';
			break;
	}



	// Content elements: Content
	if ($title != '') {
		if( $is_title_link != '' && $is_title_link === 'yes' && $title_link != '' ){
			$title_link = explode ( '|', $title_link );
			$tar = ( $title_link[2] === '_blank' ) ? 'target="' . $title_link[2] . '"' : '';
			$title_c = '<div class="title"><a href="' . $title_link[0] . '" title = "' . $title . '" ' . $tar . '>'.$title.'</a></div>';
		} else {
			$title_c = '<div class="title">'.$title.'</div>';
		}
	} else {$title_c = '';}

	if ($subtitle != '') {
		$subtitle_c = '<div class="subtitle">'.$subtitle.'</div>';
	} else {$subtitle_c = '';}
	$content = trim($content);
	if ( $content != '' && $content != '<p></p>' && $content != '&nbsp;' && $content != '</p>' && $content != '<p>__empty__</p>' && $content != '<br>\n' && $content != '<p></p>\n' && $content != '\n' && $content != '\n\n' && $content != '<p>none</p>' && $content != '<p>none</p><p></p>' && $content != 'none' && $content != '<br>' ) {
		$description_c = '<div class="description lines'.$limit_lines.'">'.$content.'</div>';
	} else {
		$description_c = '';
	}
	if ( $show_icon_link == 'yes' ) {
		$likon = ' <i class="' . esc_attr( $linkicon ) . '"></i> ';
	} elseif ( $show_icon_link == 'svg' && $icon_link_svg !== '' ) {
		$likon   = ssc_process_svg( $icon_link_svg );
	} else {
		$likon = '';
	}
	if ($link_url != '') {
		if ( 'yes' === $iconleft ) {
			$read_more = '<a href="'.$link_url.'" class="rm pos'.$iconleft.'">'.$likon.$link_text.'</a>';
		} else {
			$read_more = '<a href="'.$link_url.'" class="rm pos'.$iconleft.'">'.$link_text.$likon.'</a>';
		}
	} else {$read_more = '';}

	$output .= '<div  class="ssc_icon_box '.implode( ' ', $wrp_classes ) . ' template'.$template.' '.$el_class.'">';

	switch ( $template ) {
		case '1':
			$output .= '<div class="icon_box">'.$bgr_icon_c.$icon_c.'</div>';
			$output .= '<div class="cont_box">'.$title_c.$subtitle_c.$description_c.$read_more.'</div>';
			break;
		case '2':
			$output .= '<div class="cont_box">'.$title_c.$subtitle_c.$description_c.$read_more.'</div>';
			$output .= '<div class="icon_box">'.$bgr_icon_c.$icon_c.'</div>';
			break;
		case '3':
			$output .= '<div class="icon_box">'.$bgr_icon_c.$icon_c.'</div>';
			$output .= '<div class="cont_box">'.$title_c.$subtitle_c.$description_c.$read_more.'</div>';
			break;
		case '4':
			$output .= ''.$title_c.$subtitle_c.'<div class="wrap">';
			$output .= '<div class="icon_box">'.$bgr_icon_c.$icon_c.'</div>';
			$output .= '<div class="cont_box">'.$description_c.$read_more.'</div></div>';
			break;
		case '5':
			$output .= ''.$title_c.$subtitle_c.'<div class="wrap">';
			$output .= '<div class="cont_box">'.$description_c.$read_more.'</div>';
			$output .= '<div class="icon_box">'.$bgr_icon_c.$icon_c.'</div></div>';
			break;
		case '6':
			$output .= ''.$title_c.$subtitle_c.'';
			$output .= '<div class="icon_box">'.$bgr_icon_c.$icon_c.'</div>';
			$output .= '<div class="cont_box">'.$description_c.$read_more.'</div>';
			break;
		case '7':
			$output .= '<div class="icon_box">'.$bgr_icon_c.'</div>
        <div class="cont_box" style="height:'.$bsize.'px; margin-top: -'.$bsize.'px;">'.$icon_n.$title_c.$subtitle_c.$read_more.'</div>';
			break;
		case '8':
			$output .= '<div class="icon_box">'.$bgr_icon_c.'</div>
        <div class="cont_box" style="height:'.$bsize.'px; margin-top: -'.$bsize.'px;">'.$title_c.$subtitle_c.$icon_n.$read_more.'</div>';
			break;
		case '9':
			$output .= '<div class="icon_box">'.$bgr_icon_c.$icon_c.'</div>';
			$output .= '<div class="cont_box">'.$title_c.$subtitle_c.$description_c.$read_more.'</div>';
			break;
		case '10':
			$output .= '<div class="icon_box">'.$bgr_icon_c.$icon_c.$title_c.$subtitle_c.'</div>';
			$output .= '<div class="cont_box">'.$description_c.$read_more.'</div>';
			break;
		case '11':
			$output .= '<div class="tc"><div class="icon_box">'.$bgr_icon_c.$icon_c.'</div><div class="title_box">'.$title_c.$subtitle_c.'</div></div><div class="cont_box">'.$description_c.$read_more.'</div>';
			break;
		case '12':
			$output .= '<div class="tc"><div class="title_box">'.$title_c.$subtitle_c.'</div><div class="icon_box">'.$bgr_icon_c.$icon_c.'</div></div><div class="cont_box">'.$description_c.$read_more.'</div>';
			break;
		case '13':
			$output .= ''.$title_c.'';
			$output .= '<div class="icon_box">'.$bgr_icon_c.$icon_c.'</div>';
			$output .= '<div class="cont_box">'.$subtitle_c.$description_c.$read_more.'</div>';
			break;
		case '14':
			$output .= '<div class="tbl">'.$title_c.'<div class="icon_box">'.$bgr_icon_c.$icon_c.'</div></div>';
			$output .= '<div class="tbl">'.$subtitle_c.'<div class="cont_box">'.$description_c.$read_more.'</div></div>';
			break;
		case '15':
			$output .= '<div class="icon_box">'.$bgr_icon_c.$icon_c.'</div>
				<div><div class="tbl">'.$title_c.$subtitle_c.'</div>
				<div class="cont_box">'.$description_c.$read_more.'</div></div>';
			break;
		case '16':
			$output .= '<div class="icon_box">'.$bgr_icon_c.$icon_c.'</div>
				<div><div class="tbl">'.$title_c.$subtitle_c.'</div>
				<div class="cont_box">'.$description_c.$read_more.'</div></div>';
			break;
		case '17':
			$output .= '<div class="icon_box">'.$bgr_icon_c.$icon_c.'</div>';
			$output .= '<div class="cont_box">'.$title_c.$subtitle_c.'<span>?</span>'.$description_c.$read_more.'</div>';
			break;
		case '18':
			$output .= '<div class="icon_box">'.$bgr_icon_c.$icon_c.'</div>';
			$output .= '<div class="cont_box">'.$title_c.$subtitle_c.$description_c.$read_more.'</div>';
			break;
		case '19':
			$output .= '<div class="cont_box">'.$title_c.$subtitle_c.$description_c.$read_more.'</div>';
			$output .= '<div class="icon_box">'.$bgr_icon_c.$icon_c.'</div>';
			break;
	}


	$output .= '</div>'; //ssc_icon_box

	return $output;
}

add_shortcode('ssc_iconbox', 'ssc_iconbox_shortcode');

add_filter( 'shortcode_ssc_iconbox_before_css_generating', 'ssc_iconbox_filter_css', 1 );

function ssc_iconbox_filter_css( $atts ) {
	$styles = $hover_styles = array();
	extract( shortcode_atts( array(
		'icon_type'  => '',
		'svg'        => '',
		'svg_color'  => '',
		'svg_hcolor' => '',
		'bsize'      => '',
		'isize'      => '',
		'show_icon_link' => '',
		'icon_link_svg' => '',
		'icon_link_svg_color' => '',
		'icon_link_svg_hcolor' => '',
		'icon_link_svg_hbox' => '',
		'is_icon_link'  => '',
		'icon_link'     => '',
		'bgr_type'      => '',
		'bgr_icon'      => '',
		'bgr_img'       => '',
		'bgr_text'      => '',
		'title'         => '',
		'is_title_link' => '',
		'title_link'    => '',
		'subtitle'      => '',
		'limit_lines'   => '',
		'link_text'     => '',
		'link_url'      => '',
		'el_class'      => '',
	),
		$atts ) );
	switch ( $icon_type ) {
		case 'svg':
			if ( '' !== $svg ) {
				$styles = json_decode( str_replace( '`', '"', $atts['my-css'] ), true);
				if ( '' !== $svg_color ) {
					if ( empty ( $styles['kc-css']['any']['svg']['fill|.c_svg svg'] ) ) {
						$styles['kc-css']['any']['svg']['fill|.c_svg svg'] = $svg_color;
					}
				}
				if ( '' !== $svg_hcolor ) {
					$hover_styles = json_decode( str_replace( '`', '"', $atts['hover-css'] ), true);
					if ( empty ( $hover_styles['kc-css']['any']['svg']['fill|+:hover .c_svg svg'] ) ) {
						$hover_styles['kc-css']['any']['svg']['fill|+:hover .c_svg svg'] = $svg_hcolor;
					}
				}
				if( $bsize !== '' && $isize !== '' ){
					if ( empty( $styles['kc-css']['any']['svg'] ) ) {
						$styles['kc-css']['any']['svg'] = array();
					}
					$styles['kc-css']['any']['svg'] = array('margin-top| .c_svg' => '-' . $bsize . 'px') + $styles['kc-css']['any']['svg'];
					$styles['kc-css']['any']['svg'] = array('width| .c_svg' => $isize . 'px') + $styles['kc-css']['any']['svg'];
					$styles['kc-css']['any']['svg'] = array('max-height| .c_svg' => $isize . 'px') + $styles['kc-css']['any']['svg'];
					$styles['kc-css']['any']['svg'] = array('padding-top| .c_svg' => 'calc((' . $bsize . 'px - ' . $isize . 'px)/2)') + $styles['kc-css']['any']['svg'];
					$styles['kc-css']['any']['svg']['height| .c_svg div'] = $isize . 'px';
					$styles['kc-css']['any']['svg'] = array('height| .icon_box' => $bsize . 'px') + $styles['kc-css']['any']['svg'];
				}
			}
			break;
	}
	if ( $show_icon_link == 'svg' && $icon_link_svg !== '' ) {
		if ( '' !== $icon_link_svg_color ) {
			if ( empty( $styles ) ) {
				$styles = json_decode( str_replace( '`', '"', $atts['my-css'] ), true);
			}
			if ( empty ( $styles['kc-css']['any']['link-svg']['fill|.rm svg'] ) ) {
				$styles['kc-css']['any']['link-svg']['fill|.rm svg'] = $icon_link_svg_color;
			}
		}
		if ( '' !== $icon_link_svg_hcolor ) {
			if ( empty( $hover_styles ) ) {
				$hover_styles = json_decode( str_replace( '`', '"', $atts['hover-css'] ), true);
			}
			if ( empty ( $hover_styles['kc-css']['any']['link-svg']['fill|.rm:hover svg'] ) ) {
				$hover_styles['kc-css']['any']['link-svg']['fill|.rm:hover svg'] = $icon_link_svg_hcolor;
			}
		}
		if ( '' !== $icon_link_svg_hbox ) {
			if ( empty( $hover_styles ) ) {
				$hover_styles = json_decode( str_replace( '`', '"', $atts['hover-css'] ), true);
			}
			if ( empty ( $hover_styles['kc-css']['any']['link-svg']['fill|:hover .rm svg'] ) ) {
				$hover_styles['kc-css']['any']['link-svg']['fill|:hover .rm svg'] = $icon_link_svg_hbox;
			}
		}
	}

	if( ! empty( $styles ) ){
		$atts['my-css'] = str_replace( '"', '`', json_encode( $styles, JSON_FORCE_OBJECT  ) );
	}

	if( ! empty( $hover_styles ) ){
		$atts['hover-css'] = str_replace( '"', '`', json_encode( $hover_styles, JSON_FORCE_OBJECT  ) );
	}
	return $atts;
}
