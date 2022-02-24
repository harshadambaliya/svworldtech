<?php
add_action('init', 'ssc_button_params', 99);

/**
 * Additional functions
 */

/**
 * Additional functions
 */


function ssc_button_params() {
    global $kc;

     $kc->add_map(array(
         'ssc_button' => array(

             'name' => esc_html__('Button Extended', 'kingcomposer'),
             'description' => esc_html__(' ', 'kingcomposer'),
             'icon' => 'kc-icon-button',
             'category' => 'SecretLab',
             'params' => array(
                 'general' => array(
                     array(
                         'type'			=> 'text',
                         'label'			=> esc_html__( 'Title', 'kingcomposer' ),
                         'name'			=> 'text_title',
                         'description'	=> esc_html__( 'Add the text that appears on the button.', 'kingcomposer' ),
                         'value' 			=> 'Text Button',
                         'admin_label'	=> true
                     ),
                     array(
                         'type'			=> 'link',
                         'label'			=> esc_html__( 'Link', 'kingcomposer' ),
                         'name'			=> 'link',
                         'description'	=> esc_html__( 'Add your relative URL. Each URL contains link, anchor text and target attributes.', 'kingcomposer' ),
                     ),
	                 array(
		                 'name'			=> 'hover_effect',
		                 'type'     	=> 'dropdown',
		                 'label'  	 	=> esc_html__( 'Hover Effect', 'ssc' ),
		                 'options' 		=> array(
			                 ''  => esc_html__( 'None', 'ssc' ),
			                 'anim1'  => esc_html__( '1. Glance', 'ssc' ),
			                 'anim2'  => esc_html__( '2. SlideIn Left Bgr Out', 'ssc' ),
			                 'anim6'  => esc_html__( '3. SlideIn Left Bgr', 'ssc' ),
			                 'anim3'  => esc_html__( '4. SlideIn Left and Right', 'ssc' ),
			                 'anim4'  => esc_html__( '5. Border SlideInDown', 'ssc' ),
			                 'anim5'  => esc_html__( '6. SlideIn Down Bgr Out', 'ssc' ),
			                 'anim7'  => esc_html__( '7. SlideIn Down Bgr', 'ssc' ),
			                 'anim8'  => esc_html__( '8. SlideIn Left Skew Bgr', 'ssc' ),
			                 'anim9'  => esc_html__( '9. Zoom In', 'ssc' ),
			                 'anim10'  => esc_html__( '10. Zoom In Cirle', 'ssc' ),
			                 'anim11'  => esc_html__( '11. Zoom In 2 Blocks', 'ssc' ),

		                 ),
		                 'description'	=> esc_html__( 'Select the click event when users click on an image.', 'ssc' )
	                 ),
                     array(
	                     'name' 			=> 'show_icon',
                         'type' 			=> 'radio',
                         'label' 		=> esc_html__( 'Show Icon?', 'kingcomposer' ),
                         'options'      => array(
                         	''  => esc_html__('None', 'ssc'),
                         	'yes'  => esc_html__('Icon', 'ssc'),
                         	'svg'  => esc_html__('SVG', 'ssc'),
                         ),
                         'description' 	=> '',
                     ),
                     array(
	                     'name'		 	=> 'icon',
                         'type' 			=> 'icon_picker',
                         'label' 		=> esc_html__( 'Icon', 'kingcomposer' ),
                         'value'         => 'fa-leaf',
                         'admin_label' 	=> true,
                         'description' 	=> esc_html__( 'Select icon for button', 'kingcomposer' ),
                         'relation'		=> array(
                             'parent'	=> 'show_icon',
                             'show_when'	=> 'yes'
                         )
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
                         'type'			=> 'dropdown',
                         'name'			=> 'icon_position',
                         'label'			=> esc_html__( 'Icon position', 'kingcomposer' ),
                         'description'	=> '',
                         'value'     	=> 'left',
                         'options'		=> array(
                             'left'	=> esc_html__(' Left', 'kingcomposer'),
                             'right'	=> esc_html__(' Right', 'kingcomposer'),
                         ),
                         'relation'		=> array(
                             'parent'	=> 'show_icon',
                             'hide_when'	=> ''
                         )
                     ),
                     array(
                         'type'			=> 'dropdown',
                         'name'			=> 'popup',
                         'label'			=> esc_html__( 'Popup Window', 'kingcomposer' ),
                         'description'	=> '',
                         'value'     	=> 'none',
                         'options'		=> array(
                             'none'	=> esc_html__(' None', 'kingcomposer'),
                             'popup-youtube'	=> esc_html__(' YouTube Video', 'kingcomposer'),
                             'popup-vimeo'	=> esc_html__(' Vimeo Video', 'kingcomposer'),
                             'popup-gmaps'	=> esc_html__(' Google Map', 'kingcomposer'),
                             'image-link'	=> esc_html__(' Image', 'kingcomposer'),
                         )
                     ),
                     array(
                         'type'        	=> 'attach_image',
                         'label'     	=> esc_html__( 'Image', 'ssc' ),
                         'name'  	    => 'img',
                         'description' 	=> esc_html__( 'Image for showing in block.', 'ssc' ),
                         'relation'		=> array(
                             'parent'	=> 'popup',
                             'show_when'	=> 'image-link'
                         ),
                     ),
                     array(
                         'type'			=> 'text',
                         'label'			=> esc_html__( 'On Click', 'kingcomposer' ),
                         'name'			=> 'onclick',
                         'description'	=> esc_html__( 'Content of on click attribute for element.', 'kingcomposer' ),
                         'value' 			=> '',
                     ),
                     array(
                         'name'        => 'ex_class',
                         'label'       => esc_html__(' Button extra class', 'kingcomposer'),
                         'type'        => 'text',
                         'description' => esc_html__(' Add class name for a tag.', 'kingcomposer')
                     ),
                     array(
                         'type'			=> 'text',
                         'label'			=> esc_html__( 'Wrapper class name', 'kingcomposer' ),
                         'name'			=> 'wrap_class',
                         'description'	=> esc_html__( 'Custom class for wrapper of the shortcode widget.', 'kingcomposer' ),
                     )
                 ),
                 'styling' => array(
                     array(
                         'type'			=> 'css',
                         'label'			=> esc_html__( 'css', 'kingcomposer' ),
                         'name'			=> 'custom_css',
                         'value'        => '{`kc-css`:{`any`:{`button-style`:{`color|.ssc_button`:`#ffffff`,`background-color|.ssc_button`:`#2a64d8`,`font-size|.ssc_button`:`14px`,`line-height|.ssc_button`:`14px`,`font-weight|.ssc_button`:`700`,`text-decoration|.ssc_button`:`none`,`text-align|`:`center`,`border-radius|.ssc_button`:`4px 4px 4px 4px`,`padding|.ssc_button`:`18px 50px 18px 50px`}}}}',
                         'options'		=> array(
                             array(
                                 'screens' => 'any,1024,999,767,479',
                                 'Box' => array(
	                                 array('property' => 'text-align', 'label' => esc_html__( 'Text Align', 'ssc' ), 'selector' => '+.ssc_btn'),
	                                 array('property' => 'display', 'label' => esc_html__( 'Display', 'ssc' ), 'selector' => '+.ssc_btn'),
	                                 array('property' => 'background', 'label' => 'Background', 'selector' => '+.ssc_btn'),
	                                 array('property' => 'float', 'label' => esc_html__( 'Float', 'ssc' ), 'selector' => '+.ssc_btn'),
	                                 array('property' => 'width', 'label' => esc_html__( 'Width', 'ssc' ), 'selector' => '+.ssc_btn'),
	                                 array('property' => 'max-width', 'label' => esc_html__( 'Max-Width', 'ssc' ), 'selector' => '+.ssc_btn'),
	                                 array('property' => 'height', 'label' => esc_html__( 'Height', 'ssc' ), 'selector' => '+.ssc_btn'),
	                                 array('property' => 'margin', 'label' => esc_html__( 'Margin', 'ssc' ), 'selector' => '+.ssc_btn'),
	                                 array('property' => 'padding', 'label' => esc_html__( 'Padding', 'ssc' ), 'selector' => '+.ssc_btn'),
	                                 array('property' => 'border', 'label' => esc_html__( 'Border', 'ssc' ), 'selector' => '+.ssc_btn'),
	                                 array('property' => 'border-radius', 'label' => esc_html__( 'Border Radius', 'ssc' ), 'selector' => '+.ssc_btn'),
	                                 array('property' => 'box-shadow', 'label' => esc_html__( 'Box Shadow', 'ssc' )),
                                 ),
                                 'Button Style' => array(
                                     array('property' => 'color', 'label' => 'Text Color', 'selector' => '.ssc_button'),
                                     array('property' => 'background-color', 'label' => 'Background Color', 'selector' => '.ssc_button'),
                                     array('property' => 'background', 'label' => 'Background', 'selector' => '.ssc_button'),
                                     array('property' => 'font-family', 'label' => 'Font Family', 'selector' => '.ssc_button'),
                                     array('property' => 'font-size', 'label' => 'Text Size', 'selector' => '.ssc_button'),
                                     array('property' => 'line-height', 'label' => 'Line Height', 'selector' => '.ssc_button'),
                                     array('property' => 'font-weight', 'label' => 'Font Weight', 'selector' => '.ssc_button'),
                                     array('property' => 'font-family', 'label' => 'Font Family', 'selector' => '.ssc_button'),
                                     array('property' => 'text-transform', 'label' => 'Text Transform', 'selector' => '.ssc_button'),
                                     array('property' => 'text-decoration', 'label' => esc_html__( 'Text Decoration', 'ssc' ), 'selector' => '.ssc_button'),
                                     array('property' => 'text-align', 'label' => 'Button Align'),
                                     array('property' => 'text-align', 'label' => 'Text Align', 'selector' => '.ssc_button'),
                                     array('property' => 'letter-spacing', 'label' => 'Letter Spacing', 'selector' => '.ssc_button'),
                                     array('property' => 'box-shadow', 'label' => 'Box Shadow', 'selector' => '.ssc_button'),
                                     array('property' => 'text-shadow', 'label' => 'Text Shadow', 'selector' => '.ssc_button'),
                                     array('property' => 'width', 'selector' => '.ssc_button'),
	                                 array('property' => 'max-width', 'label' => esc_html__( 'Max-Width', 'ssc' ), 'selector' => '.ssc_button'),
                                     array('property' => 'height', 'selector' => '.ssc_button'),
                                     array('property' => 'display', 'label' => 'Display', 'selector' => '.ssc_button'),
	                                 array('property' => 'float', 'label' => esc_html__( 'Float', 'ssc' ), 'selector' => '.ssc_button'),
                                     array('property' => 'border', 'label' => 'Border', 'selector' => '.ssc_button'),
                                     array('property' => 'border-radius', 'label' => 'Border Radius', 'selector' => '.ssc_button'),
                                     array('property' => 'padding', 'label' => 'Padding', 'selector' => '.ssc_button'),
                                     array('property' => 'margin', 'label' => 'Margin', 'selector' => '.ssc_button'),
                                     array('property' => 'overflow', 'label' => 'Overflow', 'selector' => '.ssc_button'),
                                 ),
                                 'Button Label' => array(
	                                 array('property' => 'color', 'label' => 'Text Color', 'selector' => '.ssc_button span'),
	                                 array('property' => 'background-color', 'label' => 'Background Color', 'selector' => '.ssc_button span'),
	                                 array('property' => 'background', 'label' => 'Background', 'selector' => '.ssc_button span'),
	                                 array('property' => 'font-family', 'label' => 'Font Family', 'selector' => '.ssc_button span'),
	                                 array('property' => 'font-size', 'label' => 'Text Size', 'selector' => '.ssc_button span'),
	                                 array('property' => 'line-height', 'label' => 'Line Height', 'selector' => '.ssc_button span'),
	                                 array('property' => 'font-weight', 'label' => 'Font Weight', 'selector' => '.ssc_button span'),
	                                 array('property' => 'font-family', 'label' => 'Font Family', 'selector' => '.ssc_button span'),
	                                 array('property' => 'text-transform', 'label' => 'Text Transform', 'selector' => '.ssc_button span'),
	                                 array('property' => 'text-decoration', 'label' => esc_html__( 'Text Decoration', 'ssc' ), 'selector' => '.ssc_button span'),
	                                 array('property' => 'text-align', 'label' => 'Button Align'),
	                                 array('property' => 'text-align', 'label' => 'Text Align', 'selector' => '.ssc_button span'),
	                                 array('property' => 'letter-spacing', 'label' => 'Letter Spacing', 'selector' => '.ssc_button span'),
	                                 array('property' => 'box-shadow', 'label' => 'Box Shadow', 'selector' => '.ssc_button span'),
	                                 array('property' => 'text-shadow', 'label' => 'Text Shadow', 'selector' => '.ssc_button span'),
	                                 array('property' => 'width', 'selector' => '.ssc_button span'),
	                                 array('property' => 'max-width', 'label' => esc_html__( 'Max-Width', 'ssc' ), 'selector' => '.ssc_button span'),
	                                 array('property' => 'height', 'selector' => '.ssc_button span'),
	                                 array('property' => 'display', 'label' => 'Display', 'selector' => '.ssc_button span'),
	                                 array('property' => 'float', 'label' => esc_html__( 'Float', 'ssc' ), 'selector' => '.ssc_button span'),
	                                 array('property' => 'border', 'label' => 'Border', 'selector' => '.ssc_button span'),
	                                 array('property' => 'border-radius', 'label' => 'Border Radius', 'selector' => '.ssc_button span'),
	                                 array('property' => 'padding', 'label' => 'Padding', 'selector' => '.ssc_button span'),
	                                 array('property' => 'margin', 'label' => 'Margin', 'selector' => '.ssc_button span'),
                                 ),
                                 'Before' => array(
	                                 array('property' => 'color', 'label' => 'Text Color', 'selector' => '.ssc_button:before'),
	                                 array('property' => 'background-color', 'label' => 'Background Color', 'selector' => '.ssc_button:before'),
	                                 array('property' => 'background', 'label' => 'Background', 'selector' => '.ssc_button:before'),
	                                 array('property' => 'font-family', 'label' => 'Font Family', 'selector' => '.ssc_button:before'),
	                                 array('property' => 'font-size', 'label' => 'Text Size', 'selector' => '.ssc_button:before'),
	                                 array('property' => 'line-height', 'label' => 'Line Height', 'selector' => '.ssc_button:before'),
	                                 array('property' => 'font-weight', 'label' => 'Font Weight', 'selector' => '.ssc_button:before'),
	                                 array('property' => 'font-family', 'label' => 'Font Family', 'selector' => '.ssc_button:before'),
	                                 array('property' => 'text-transform', 'label' => 'Text Transform', 'selector' => '.ssc_button:before'),
	                                 array('property' => 'text-decoration', 'label' => esc_html__( 'Text Decoration', 'ssc' ), 'selector' => '.ssc_button:before'),
	                                 array('property' => 'text-align', 'label' => 'Button Align'),
	                                 array('property' => 'text-align', 'label' => 'Text Align', 'selector' => '.ssc_button:before'),
	                                 array('property' => 'letter-spacing', 'label' => 'Letter Spacing', 'selector' => '.ssc_button:before'),
	                                 array('property' => 'box-shadow', 'label' => 'Box Shadow', 'selector' => '.ssc_button:before'),
	                                 array('property' => 'text-shadow', 'label' => 'Text Shadow', 'selector' => '.ssc_button:before'),
	                                 array('property' => 'width', 'selector' => '.ssc_button:before'),
	                                 array('property' => 'max-width', 'label' => esc_html__( 'Max-Width', 'ssc' ), 'selector' => '.ssc_button:before'),
	                                 array('property' => 'height', 'selector' => '.ssc_button:before'),
	                                 array('property' => 'display', 'label' => 'Display', 'selector' => '.ssc_button:before'),
	                                 array('property' => 'float', 'label' => esc_html__( 'Float', 'ssc' ), 'selector' => '.ssc_button:before'),
	                                 array('property' => 'opacity', 'label' => esc_html__( 'Opacity', 'ssc' ), 'selector' => '.ssc_button:before'),
	                                 array('property' => 'border', 'label' => 'Border', 'selector' => '.ssc_button:before'),
	                                 array('property' => 'border-radius', 'label' => 'Border Radius', 'selector' => '.ssc_button:before'),
	                                 array('property' => 'padding', 'label' => 'Padding', 'selector' => '.ssc_button:before'),
	                                 array('property' => 'margin', 'label' => 'Margin', 'selector' => '.ssc_button:before'),
                                 ),
                                 'After' => array(
	                                 array('property' => 'color', 'label' => 'Text Color', 'selector' => '.ssc_button:after'),
	                                 array('property' => 'background-color', 'label' => 'Background Color', 'selector' => '.ssc_button:after'),
	                                 array('property' => 'background', 'label' => 'Background', 'selector' => '.ssc_button:after'),
	                                 array('property' => 'font-family', 'label' => 'Font Family', 'selector' => '.ssc_button:after'),
	                                 array('property' => 'font-size', 'label' => 'Text Size', 'selector' => '.ssc_button:after'),
	                                 array('property' => 'line-height', 'label' => 'Line Height', 'selector' => '.ssc_button:after'),
	                                 array('property' => 'font-weight', 'label' => 'Font Weight', 'selector' => '.ssc_button:after'),
	                                 array('property' => 'font-family', 'label' => 'Font Family', 'selector' => '.ssc_button:after'),
	                                 array('property' => 'text-transform', 'label' => 'Text Transform', 'selector' => '.ssc_button:after'),
	                                 array('property' => 'text-decoration', 'label' => esc_html__( 'Text Decoration', 'ssc' ), 'selector' => '.ssc_button:after'),
	                                 array('property' => 'text-align', 'label' => 'Button Align'),
	                                 array('property' => 'text-align', 'label' => 'Text Align', 'selector' => '.ssc_button:after'),
	                                 array('property' => 'letter-spacing', 'label' => 'Letter Spacing', 'selector' => '.ssc_button:after'),
	                                 array('property' => 'box-shadow', 'label' => 'Box Shadow', 'selector' => '.ssc_button:after'),
	                                 array('property' => 'text-shadow', 'label' => 'Text Shadow', 'selector' => '.ssc_button:after'),
	                                 array('property' => 'width', 'selector' => '.ssc_button:after'),
	                                 array('property' => 'max-width', 'label' => esc_html__( 'Max-Width', 'ssc' ), 'selector' => '.ssc_button:after'),
	                                 array('property' => 'height', 'selector' => '.ssc_button:after'),
	                                 array('property' => 'display', 'label' => 'Display', 'selector' => '.ssc_button:after'),
	                                 array('property' => 'float', 'label' => esc_html__( 'Float', 'ssc' ), 'selector' => '.ssc_button:after'),
	                                 array('property' => 'opacity', 'label' => esc_html__( 'Opacity', 'ssc' ), 'selector' => '.ssc_button:after'),
	                                 array('property' => 'border', 'label' => 'Border', 'selector' => '.ssc_button:after'),
	                                 array('property' => 'border-radius', 'label' => 'Border Radius', 'selector' => '.ssc_button:after'),
	                                 array('property' => 'padding', 'label' => 'Padding', 'selector' => '.ssc_button:after'),
	                                 array('property' => 'margin', 'label' => 'Margin', 'selector' => '.ssc_button:after'),
                                 ),
                                 'Icon Style' => array(
                                     array('property' => 'color', 'label' => 'Text Color', 'selector' => '.ssc_button i'),
                                     array('property' => 'background-color', 'label' => 'Background Color', 'selector' => '.ssc_button i'),
	                                 array('property' => 'background', 'label' => 'Background', 'selector' => '.ssc_button i'),
                                     array('property' => 'font-family', 'label' => 'Font Family', 'selector' => '.ssc_button i'),
                                     array('property' => 'font-size', 'label' => 'Text Size', 'selector' => '.ssc_button i'),
                                     array('property' => 'line-height', 'label' => 'Line Height', 'selector' => '.ssc_button i'),
                                     array('property' => 'font-weight', 'label' => 'Font Weight', 'selector' => '.ssc_button i'),
                                     array('property' => 'font-family', 'label' => 'Font Family', 'selector' => '.ssc_button i'),
                                     array('property' => 'text-transform', 'label' => 'Text Transform', 'selector' => '.ssc_button i'),
                                     array('property' => 'text-decoration', 'label' => esc_html__( 'Text Decoration', 'ssc' ), 'selector' => '.ssc_button i'),
                                     array('property' => 'text-align', 'label' => 'Align', 'selector' => '.ssc_button i'),
                                     array('property' => 'letter-spacing', 'label' => 'Letter Spacing', 'selector' => '.ssc_button i'),
                                     array('property' => 'text-shadow', 'label' => 'Text Shadow', 'selector' => '.ssc_button i'),
	                                 array('property' => 'box-shadow', 'label' => esc_html__( 'Box Shadow', 'ssc' ), 'selector' => '.ssc_button i'),
                                     array('property' => 'width', 'selector' => '.ssc_button i'),
                                     array('property' => 'height', 'selector' => '.ssc_button i'),
                                     array('property' => 'display', 'label' => 'Display', 'selector' => '.ssc_button i'),
                                     array('property' => 'border', 'label' => 'Border', 'selector' => '.ssc_button i'),
                                     array('property' => 'border-radius', 'label' => 'Border Radius', 'selector' => '.ssc_button i'),
                                     array('property' => 'padding', 'label' => 'Padding', 'selector' => '.ssc_button i'),
                                     array('property' => 'margin', 'label' => 'Margin', 'selector' => '.ssc_button i'),


                                 ),
                                 'SVG Icon' => array(
	                                 array('property' => 'fill', 'label' => esc_html__( 'Fill', 'ssc' ), 'selector' => ' .ssc_button svg'),
	                                 array('property' => 'width', 'label' => esc_html__( 'Width', 'ssc' ), 'selector' => '.ssc_button svg'),
	                                 array('property' => 'height', 'label' => esc_html__( 'Height', 'ssc' ), 'selector' => '.ssc_button svg'),
	                                 array('property' => 'background', 'selector' => '.ssc_button .svg-icon'),
	                                 array('property' => 'display', 'label' => esc_html__( 'Display', 'ssc' ), 'selector' => '.ssc_button .svg-icon'),
	                                 array('property' => 'float', 'label' => esc_html__( 'Float', 'ssc' ), 'selector' => '.ssc_button .svg-icon'),
	                                 array('property' => 'border', 'label' => esc_html__( 'Border', 'ssc' ), 'selector' => '.ssc_button .svg-icon'),
	                                 array('property' => 'border-radius', 'label' => esc_html__( 'Border Radius', 'ssc' ), 'selector' => '.ssc_button .svg-icon'),
	                                 array('property' => 'padding', 'label' => esc_html__( 'Padding', 'ssc' ), 'selector' => '.ssc_button .svg-icon'),
	                                 array('property' => 'margin', 'label' => esc_html__( 'Margin', 'ssc' ), 'selector' => '.ssc_button .svg-icon'),
	                                 array('property' => 'opacity', 'label' => esc_html__( 'Opacity', 'ssc' ), 'selector' => '.ssc_button .svg-icon'),
	                                 array('property' => 'box-shadow', 'label' => esc_html__( 'Box Shadow', 'ssc' ), 'selector' => '.ssc_button .svg-icon'),

                                 ),
                                 'Icon Wrapper' => array(
                                     array('property' => 'color', 'label' => 'Text Color', 'selector' => '.ssc_button span'),
                                     array('property' => 'background-color', 'label' => 'Background Color', 'selector' => '.ssc_button span'),
                                     array('property' => 'font-family', 'label' => 'Font Family', 'selector' => '.ssc_button span'),
                                     array('property' => 'font-size', 'label' => 'Text Size', 'selector' => '.ssc_button span'),
                                     array('property' => 'line-height', 'label' => 'Line Height', 'selector' => '.ssc_button span'),
                                     array('property' => 'font-weight', 'label' => 'Font Weight', 'selector' => '.ssc_button span'),
                                     array('property' => 'font-family', 'label' => 'Font Family', 'selector' => '.ssc_button span'),
                                     array('property' => 'text-transform', 'label' => 'Text Transform', 'selector' => '.ssc_button span'),
                                     array('property' => 'text-align', 'label' => 'Align', 'selector' => '.ssc_button span'),
                                     array('property' => 'letter-spacing', 'label' => 'Letter Spacing', 'selector' => '.ssc_button span'),
                                     array('property' => 'text-shadow', 'label' => 'Text Shadow', 'selector' => '.ssc_button span'),
	                                 array('property' => 'box-shadow', 'label' => esc_html__( 'Box Shadow', 'ssc' ), 'selector' => '.ssc_button span'),
                                     array('property' => 'width', 'selector' => '.ssc_button span'),
                                     array('property' => 'height', 'selector' => '.ssc_button span'),
                                     array('property' => 'display', 'label' => 'Display', 'selector' => '.ssc_button span'),
                                     array('property' => 'border', 'label' => 'Border', 'selector' => '.ssc_button span'),
                                     array('property' => 'border-radius', 'label' => 'Border Radius', 'selector' => '.ssc_button span'),
                                     array('property' => 'padding', 'label' => 'Padding', 'selector' => '.ssc_button span'),
                                     array('property' => 'margin', 'label' => 'Margin', 'selector' => '.ssc_button span'),
                                 ),
                                 'Icon Wrapper 2' => array(
	                                 array('property' => 'color', 'label' => 'Text Color', 'selector' => '.ssc_button span strong'),
	                                 array('property' => 'background-color', 'label' => 'Background Color', 'selector' => '.ssc_button span strong'),
	                                 array('property' => 'font-family', 'label' => 'Font Family', 'selector' => '.ssc_button span strong'),
	                                 array('property' => 'font-size', 'label' => 'Text Size', 'selector' => '.ssc_button span strong'),
	                                 array('property' => 'line-height', 'label' => 'Line Height', 'selector' => '.ssc_button span strong'),
	                                 array('property' => 'font-weight', 'label' => 'Font Weight', 'selector' => '.ssc_button span strong'),
	                                 array('property' => 'font-family', 'label' => 'Font Family', 'selector' => '.ssc_button span strong'),
	                                 array('property' => 'text-transform', 'label' => 'Text Transform', 'selector' => '.ssc_button span strong'),
	                                 array('property' => 'text-align', 'label' => 'Align', 'selector' => '.ssc_button span strong'),
	                                 array('property' => 'letter-spacing', 'label' => 'Letter Spacing', 'selector' => '.ssc_button span strong'),
	                                 array('property' => 'text-shadow', 'label' => 'Text Shadow', 'selector' => '.ssc_button span strong'),
	                                 array('property' => 'box-shadow', 'label' => esc_html__( 'Box Shadow', 'ssc' ), 'selector' => '.ssc_button span strong'),
	                                 array('property' => 'width', 'selector' => '.ssc_button span strong'),
	                                 array('property' => 'height', 'selector' => '.ssc_button span strong'),
	                                 array('property' => 'display', 'label' => 'Display', 'selector' => '.ssc_button span strong'),
	                                 array('property' => 'border', 'label' => 'Border', 'selector' => '.ssc_button span strong'),
	                                 array('property' => 'border-radius', 'label' => 'Border Radius', 'selector' => '.ssc_button span strong'),
	                                 array('property' => 'padding', 'label' => 'Padding', 'selector' => '.ssc_button span strong'),
	                                 array('property' => 'margin', 'label' => 'Margin', 'selector' => '.ssc_button span strong'),
                                 ),
                             )
                         )
                     ),
                 ),
                 'hover' => array(
                     array(
                         'type'			=> 'css',
                         'label'			=> esc_html__( 'Hover CSS', 'kingcomposer' ),
                         'name'			=> 'custom_css_hov',
                         'value'        => '{`kc-css`:{`any`:{`button-style`:{`color|.ssc_button:hover`:`#ffffff`,`background-color|.ssc_button:hover`:`#333333`}}}}',
                         'options'		=> array(
                             array(
                                 'screens' => 'any,1024,999,767,479',
                                 'Box' => array(
	                                 array('property' => 'text-align', 'label' => esc_html__( 'Text Align', 'ssc' ), 'selector' => '+:hover'),
	                                 array('property' => 'display', 'label' => esc_html__( 'Display', 'ssc' ), 'selector' => '+:hover'),
	                                 array('property' => 'background', 'label' => 'Background', 'selector' => '+:hover'),
	                                 array('property' => 'float', 'label' => esc_html__( 'Float', 'ssc' ), 'selector' => '+:hover'),
	                                 array('property' => 'width', 'label' => esc_html__( 'Width', 'ssc' ), 'selector' => '+:hover'),
	                                 array('property' => 'max-width', 'label' => esc_html__( 'Max-Width', 'ssc' ), 'selector' => '+:hover'),
	                                 array('property' => 'height', 'label' => esc_html__( 'Height', 'ssc' ), 'selector' => '+:hover'),
	                                 array('property' => 'margin', 'label' => esc_html__( 'Margin', 'ssc' ), 'selector' => '+:hover'),
	                                 array('property' => 'padding', 'label' => esc_html__( 'Padding', 'ssc' ), 'selector' => '+:hover'),
	                                 array('property' => 'border', 'label' => esc_html__( 'Border', 'ssc' ), 'selector' => '+:hover'),
	                                 array('property' => 'border-radius', 'label' => esc_html__( 'Border Radius', 'ssc' ), 'selector' => '+:hover'),
	                                 array('property' => 'box-shadow', 'label' => esc_html__( 'Box Shadow', 'ssc' )),
                                 ),
                                 'Button Style' => array(
                                     array('property' => 'color', 'label' => 'Text Color', 'selector' => '.ssc_button:hover'),
                                     array('property' => 'background-color', 'label' => 'Background Color', 'selector' => '.ssc_button:hover'),
	                                 array('property' => 'background', 'label' => 'Background', 'selector' => '.ssc_button:hover'),
                                     array('property' => 'font-family', 'label' => 'Font Family', 'selector' => '.ssc_button:hover'),
                                     array('property' => 'font-size', 'label' => 'Text Size', 'selector' => '.ssc_button:hover'),
                                     array('property' => 'line-height', 'label' => 'Line Height', 'selector' => '.ssc_button:hover'),
                                     array('property' => 'font-weight', 'label' => 'Font Weight', 'selector' => '.ssc_button:hover'),
                                     array('property' => 'font-family', 'label' => 'Font Family', 'selector' => '.ssc_button:hover'),
                                     array('property' => 'text-transform', 'label' => 'Text Transform', 'selector' => '.ssc_button:hover'),
                                     array('property' => 'text-decoration', 'label' => esc_html__( 'Text Decoration', 'ssc' ), 'selector' => '.ssc_button:hover'),
                                     array('property' => 'text-align', 'label' => 'Button Align'),
                                     array('property' => 'text-align', 'label' => 'Text Align', 'selector' => '.ssc_button'),
                                     array('property' => 'letter-spacing', 'label' => 'Letter Spacing', 'selector' => '.ssc_button:hover'),
	                                 array('property' => 'box-shadow', 'label' => 'Box Shadow', 'selector' => '.ssc_button:hover'),
                                     array('property' => 'text-shadow', 'label' => 'Text Shadow', 'selector' => '.ssc_button:hover'),
                                     array('property' => 'width', 'selector' => ':hover'),
                                     array('property' => 'height', 'selector' => ':hover'),
                                     array('property' => 'display', 'label' => 'Display', 'selector' => '.ssc_button:hover'),
	                                 array('property' => 'float', 'label' => esc_html__( 'Float', 'ssc' ), 'selector' => '.ssc_button:hover'),
                                     array('property' => 'border', 'label' => 'Border', 'selector' => '.ssc_button:hover'),
                                     array('property' => 'border-radius', 'label' => 'Border Radius', 'selector' => '.ssc_button:hover'),
                                     array('property' => 'padding', 'label' => 'Padding', 'selector' => '.ssc_button:hover'),
                                     array('property' => 'margin', 'label' => 'Margin', 'selector' => '.ssc_button:hover'),
	                                 array('property' => 'overflow', 'label' => 'Overflow', 'selector' => '.ssc_button'),

                                 ),
                                 'Button Label' => array(
	                                 array('property' => 'color', 'label' => 'Text Color', 'selector' => '.ssc_button:hover span'),
	                                 array('property' => 'background-color', 'label' => 'Background Color', 'selector' => '.ssc_button:hover span'),
	                                 array('property' => 'background', 'label' => 'Background', 'selector' => '.ssc_button:hover span'),
	                                 array('property' => 'font-family', 'label' => 'Font Family', 'selector' => '.ssc_button:hover span'),
	                                 array('property' => 'font-size', 'label' => 'Text Size', 'selector' => '.ssc_button:hover span'),
	                                 array('property' => 'line-height', 'label' => 'Line Height', 'selector' => '.ssc_button:hover span'),
	                                 array('property' => 'font-weight', 'label' => 'Font Weight', 'selector' => '.ssc_button:hover span'),
	                                 array('property' => 'font-family', 'label' => 'Font Family', 'selector' => '.ssc_button:hover span'),
	                                 array('property' => 'text-transform', 'label' => 'Text Transform', 'selector' => '.ssc_button:hover span'),
	                                 array('property' => 'text-decoration', 'label' => esc_html__( 'Text Decoration', 'ssc' ), 'selector' => '.ssc_button:hover span'),
	                                 array('property' => 'text-align', 'label' => 'Button Align'),
	                                 array('property' => 'text-align', 'label' => 'Text Align', 'selector' => '.ssc_button:hover span'),
	                                 array('property' => 'letter-spacing', 'label' => 'Letter Spacing', 'selector' => '.ssc_button:hover span'),
	                                 array('property' => 'box-shadow', 'label' => 'Box Shadow', 'selector' => '.ssc_button:hover span'),
	                                 array('property' => 'text-shadow', 'label' => 'Text Shadow', 'selector' => '.ssc_button:hover span'),
	                                 array('property' => 'width', 'selector' => '.ssc_button:hover span'),
	                                 array('property' => 'max-width', 'label' => esc_html__( 'Max-Width', 'ssc' ), 'selector' => '.ssc_button:hover span'),
	                                 array('property' => 'height', 'selector' => '.ssc_button:hover span'),
	                                 array('property' => 'display', 'label' => 'Display', 'selector' => '.ssc_button:hover span'),
	                                 array('property' => 'float', 'label' => esc_html__( 'Float', 'ssc' ), 'selector' => '.ssc_button:hover span'),
	                                 array('property' => 'border', 'label' => 'Border', 'selector' => '.ssc_button:hover span'),
	                                 array('property' => 'border-radius', 'label' => 'Border Radius', 'selector' => '.ssc_button:hover span'),
	                                 array('property' => 'padding', 'label' => 'Padding', 'selector' => '.ssc_button:hover span'),
	                                 array('property' => 'margin', 'label' => 'Margin', 'selector' => '.ssc_button:hover span'),
                                 ),
                                 'Before' => array(
	                                 array('property' => 'color', 'label' => 'Text Color', 'selector' => '.ssc_button:hover:before'),
	                                 array('property' => 'background-color', 'label' => 'Background Color', 'selector' => '.ssc_button:hover:before'),
	                                 array('property' => 'background', 'label' => 'Background', 'selector' => '.ssc_button:hover:before'),
	                                 array('property' => 'font-family', 'label' => 'Font Family', 'selector' => '.ssc_button:hover:before'),
	                                 array('property' => 'font-size', 'label' => 'Text Size', 'selector' => '.ssc_button:hover:before'),
	                                 array('property' => 'line-height', 'label' => 'Line Height', 'selector' => '.ssc_button:hover:before'),
	                                 array('property' => 'font-weight', 'label' => 'Font Weight', 'selector' => '.ssc_button:hover:before'),
	                                 array('property' => 'font-family', 'label' => 'Font Family', 'selector' => '.ssc_button:hover:before'),
	                                 array('property' => 'text-transform', 'label' => 'Text Transform', 'selector' => '.ssc_button:hover:before'),
	                                 array('property' => 'text-decoration', 'label' => esc_html__( 'Text Decoration', 'ssc' ), 'selector' => '.ssc_button:hover:before'),
	                                 array('property' => 'text-align', 'label' => 'Button Align'),
	                                 array('property' => 'text-align', 'label' => 'Text Align', 'selector' => '.ssc_button:hover:before'),
	                                 array('property' => 'letter-spacing', 'label' => 'Letter Spacing', 'selector' => '.ssc_button:hover:before'),
	                                 array('property' => 'box-shadow', 'label' => 'Box Shadow', 'selector' => '.ssc_button:hover:before'),
	                                 array('property' => 'text-shadow', 'label' => 'Text Shadow', 'selector' => '.ssc_button:hover:before'),
	                                 array('property' => 'width', 'selector' => '.ssc_button:hover:before'),
	                                 array('property' => 'max-width', 'label' => esc_html__( 'Max-Width', 'ssc' ), 'selector' => '.ssc_button:hover:before'),
	                                 array('property' => 'height', 'selector' => '.ssc_button:hover:before'),
	                                 array('property' => 'display', 'label' => 'Display', 'selector' => '.ssc_button:hover:before'),
	                                 array('property' => 'float', 'label' => esc_html__( 'Float', 'ssc' ), 'selector' => '.ssc_button:hover:before'),
	                                 array('property' => 'opacity', 'label' => esc_html__( 'Opacity', 'ssc' ), 'selector' => '.ssc_button:hover:before'),
	                                 array('property' => 'border', 'label' => 'Border', 'selector' => '.ssc_button:hover:before'),
	                                 array('property' => 'border-radius', 'label' => 'Border Radius', 'selector' => '.ssc_button:hover:before'),
	                                 array('property' => 'padding', 'label' => 'Padding', 'selector' => '.ssc_button:hover:before'),
	                                 array('property' => 'margin', 'label' => 'Margin', 'selector' => '.ssc_button:hover:before'),
                                 ),
                                 'After' => array(
	                                 array('property' => 'color', 'label' => 'Text Color', 'selector' => '.ssc_button:hover:after'),
	                                 array('property' => 'background-color', 'label' => 'Background Color', 'selector' => '.ssc_button:hover:after'),
	                                 array('property' => 'background', 'label' => 'Background', 'selector' => '.ssc_button:hover:after'),
	                                 array('property' => 'font-family', 'label' => 'Font Family', 'selector' => '.ssc_button:hover:after'),
	                                 array('property' => 'font-size', 'label' => 'Text Size', 'selector' => '.ssc_button:hover:after'),
	                                 array('property' => 'line-height', 'label' => 'Line Height', 'selector' => '.ssc_button:hover:after'),
	                                 array('property' => 'font-weight', 'label' => 'Font Weight', 'selector' => '.ssc_button:hover:after'),
	                                 array('property' => 'font-family', 'label' => 'Font Family', 'selector' => '.ssc_button:hover:after'),
	                                 array('property' => 'text-transform', 'label' => 'Text Transform', 'selector' => '.ssc_button:hover:after'),
	                                 array('property' => 'text-decoration', 'label' => esc_html__( 'Text Decoration', 'ssc' ), 'selector' => '.ssc_button:hover:after'),
	                                 array('property' => 'text-align', 'label' => 'Button Align'),
	                                 array('property' => 'text-align', 'label' => 'Text Align', 'selector' => '.ssc_button:hover:after'),
	                                 array('property' => 'letter-spacing', 'label' => 'Letter Spacing', 'selector' => '.ssc_button:hover:after'),
	                                 array('property' => 'box-shadow', 'label' => 'Box Shadow', 'selector' => '.ssc_button:hover:after'),
	                                 array('property' => 'text-shadow', 'label' => 'Text Shadow', 'selector' => '.ssc_button:hover:after'),
	                                 array('property' => 'width', 'selector' => '.ssc_button:hover:after'),
	                                 array('property' => 'max-width', 'label' => esc_html__( 'Max-Width', 'ssc' ), 'selector' => '.ssc_button:hover:after'),
	                                 array('property' => 'height', 'selector' => '.ssc_button:hover:after'),
	                                 array('property' => 'display', 'label' => 'Display', 'selector' => '.ssc_button:hover:after'),
	                                 array('property' => 'float', 'label' => esc_html__( 'Float', 'ssc' ), 'selector' => '.ssc_button:hover:after'),
	                                 array('property' => 'opacity', 'label' => esc_html__( 'Opacity', 'ssc' ), 'selector' => '.ssc_button:hover:after'),
	                                 array('property' => 'border', 'label' => 'Border', 'selector' => '.ssc_button:hover:after'),
	                                 array('property' => 'border-radius', 'label' => 'Border Radius', 'selector' => '.ssc_button:hover:after'),
	                                 array('property' => 'padding', 'label' => 'Padding', 'selector' => '.ssc_button:hover:after'),
	                                 array('property' => 'margin', 'label' => 'Margin', 'selector' => '.ssc_button:hover:after'),
                                 ),
                                 'Icon Style' => array(
                                     array('property' => 'color', 'label' => 'Text Color', 'selector' => '.ssc_button:hover i'),
                                     array('property' => 'background-color', 'label' => 'Background Color', 'selector' => '.ssc_button:hover i'),
                                     array('property' => 'font-family', 'label' => 'Font Family', 'selector' => '.ssc_button:hover i'),
                                     array('property' => 'font-size', 'label' => 'Text Size', 'selector' => '.ssc_button:hover i'),
                                     array('property' => 'line-height', 'label' => 'Line Height', 'selector' => '.ssc_button:hover i'),
                                     array('property' => 'font-weight', 'label' => 'Font Weight', 'selector' => '.ssc_button:hover i'),
                                     array('property' => 'font-family', 'label' => 'Font Family', 'selector' => '.ssc_button:hover i'),
                                     array('property' => 'text-transform', 'label' => 'Text Transform', 'selector' => '.ssc_button:hover i'),
                                     array('property' => 'text-decoration', 'label' => esc_html__( 'Text Decoration', 'ssc' ), 'selector' => '.ssc_button:hover i'),
                                     array('property' => 'text-align', 'label' => 'Align', 'selector' => '.ssc_button:hover i'),
                                     array('property' => 'letter-spacing', 'label' => 'Letter Spacing', 'selector' => '.ssc_button:hover i'),
                                     array('property' => 'text-shadow', 'label' => 'Text Shadow', 'selector' => '.ssc_button:hover i'),
	                                 array('property' => 'box-shadow', 'label' => esc_html__( 'Box Shadow', 'ssc' ), 'selector' => '.ssc_button:hover i'),
                                     array('property' => 'width', 'selector' => '.ssc_button:hover i'),
                                     array('property' => 'height', 'selector' => '.ssc_button:hover i'),
                                     array('property' => 'display', 'label' => 'Display', 'selector' => '.ssc_button:hover i'),
                                     array('property' => 'border', 'label' => 'Border', 'selector' => '.ssc_button:hover i'),
                                     array('property' => 'border-radius', 'label' => 'Border Radius', 'selector' => '.ssc_button:hover i'),
                                     array('property' => 'padding', 'label' => 'Padding', 'selector' => '.ssc_button:hover i'),
                                     array('property' => 'margin', 'label' => 'Margin', 'selector' => '.ssc_button:hover i'),

                                 ),
                                 'SVG Icon' => array(
	                                 array('property' => 'fill', 'label' => esc_html__( 'Fill', 'ssc' ), 'selector' => ' .ssc_button:hover svg'),
	                                 array('property' => 'width', 'label' => esc_html__( 'Width', 'ssc' ), 'selector' => '.ssc_button:hover svg'),
	                                 array('property' => 'height', 'label' => esc_html__( 'Height', 'ssc' ), 'selector' => '.ssc_button:hover svg'),
	                                 array('property' => 'background', 'selector' => '.ssc_button:hover .svg-icon'),
	                                 array('property' => 'display', 'label' => esc_html__( 'Display', 'ssc' ), 'selector' => '.ssc_button:hover .svg-icon'),
	                                 array('property' => 'float', 'label' => esc_html__( 'Float', 'ssc' ), 'selector' => '.ssc_button:hover .svg-icon'),
	                                 array('property' => 'border', 'label' => esc_html__( 'Border', 'ssc' ), 'selector' => '.ssc_button:hover .svg-icon'),
	                                 array('property' => 'border-radius', 'label' => esc_html__( 'Border Radius', 'ssc' ), 'selector' => '.ssc_button:hover .svg-icon'),
	                                 array('property' => 'padding', 'label' => esc_html__( 'Padding', 'ssc' ), 'selector' => '.ssc_button:hover .svg-icon'),
	                                 array('property' => 'margin', 'label' => esc_html__( 'Margin', 'ssc' ), 'selector' => '.ssc_button:hover .svg-icon'),
	                                 array('property' => 'opacity', 'label' => esc_html__( 'Opacity', 'ssc' ), 'selector' => '.ssc_button:hover .svg-icon'),
	                                 array('property' => 'box-shadow', 'label' => esc_html__( 'Box Shadow', 'ssc' ), 'selector' => '.ssc_button:hover .svg-icon'),
                                 ),
                                 'Icon Wrapper' => array(
                                     array('property' => 'color', 'label' => 'Text Color', 'selector' => '.ssc_button:hover span'),
                                     array('property' => 'background-color', 'label' => 'Background Color', 'selector' => '.ssc_button:hover span'),
                                     array('property' => 'font-family', 'label' => 'Font Family', 'selector' => '.ssc_button:hover span'),
                                     array('property' => 'font-size', 'label' => 'Text Size', 'selector' => '.ssc_button:hover span'),
                                     array('property' => 'line-height', 'label' => 'Line Height', 'selector' => '.ssc_button:hover span'),
                                     array('property' => 'font-weight', 'label' => 'Font Weight', 'selector' => '.ssc_button:hover span'),
                                     array('property' => 'font-family', 'label' => 'Font Family', 'selector' => '.ssc_button:hover span'),
                                     array('property' => 'text-transform', 'label' => 'Text Transform', 'selector' => '.ssc_button:hover span'),
                                     array('property' => 'text-align', 'label' => 'Align', 'selector' => '.ssc_button:hover span'),
                                     array('property' => 'letter-spacing', 'label' => 'Letter Spacing', 'selector' => '.ssc_button:hover span'),
                                     array('property' => 'text-shadow', 'label' => 'Text Shadow', 'selector' => '.ssc_button:hover span'),
	                                 array('property' => 'box-shadow', 'label' => esc_html__( 'Box Shadow', 'ssc' ), 'selector' => '.ssc_button:hover span'),
                                     array('property' => 'width', 'selector' => '.ssc_button:hover span'),
                                     array('property' => 'height', 'selector' => '.ssc_button:hover span'),
                                     array('property' => 'display', 'label' => 'Display', 'selector' => '.ssc_button:hover span'),
                                     array('property' => 'border', 'label' => 'Border', 'selector' => '.ssc_button:hover span'),
                                     array('property' => 'border-radius', 'label' => 'Border Radius', 'selector' => '.ssc_button:hover span'),
                                     array('property' => 'padding', 'label' => 'Padding', 'selector' => '.ssc_button:hover span'),
                                     array('property' => 'margin', 'label' => 'Margin', 'selector' => '.ssc_button:hover span'),

                                 ),
                                 'Icon Wrapper 2' => array(
	                                 array('property' => 'color', 'label' => 'Text Color', 'selector' => '.ssc_button:hover span strong'),
	                                 array('property' => 'background-color', 'label' => 'Background Color', 'selector' => '.ssc_button:hover span strong'),
	                                 array('property' => 'font-family', 'label' => 'Font Family', 'selector' => '.ssc_button:hover span strong'),
	                                 array('property' => 'font-size', 'label' => 'Text Size', 'selector' => '.ssc_button:hover span strong'),
	                                 array('property' => 'line-height', 'label' => 'Line Height', 'selector' => '.ssc_button:hover span strong'),
	                                 array('property' => 'font-weight', 'label' => 'Font Weight', 'selector' => '.ssc_button:hover span strong'),
	                                 array('property' => 'font-family', 'label' => 'Font Family', 'selector' => '.ssc_button:hover span strong'),
	                                 array('property' => 'text-transform', 'label' => 'Text Transform', 'selector' => '.ssc_button:hover span strong'),
	                                 array('property' => 'text-align', 'label' => 'Align', 'selector' => '.ssc_button:hover span strong'),
	                                 array('property' => 'letter-spacing', 'label' => 'Letter Spacing', 'selector' => '.ssc_button:hover span strong'),
	                                 array('property' => 'text-shadow', 'label' => 'Text Shadow', 'selector' => '.ssc_button:hover span strong'),
	                                 array('property' => 'box-shadow', 'label' => esc_html__( 'Box Shadow', 'ssc' ), 'selector' => '.ssc_button:hover span strong'),
	                                 array('property' => 'width', 'selector' => '.ssc_button:hover span strong'),
	                                 array('property' => 'height', 'selector' => '.ssc_button:hover span strong'),
	                                 array('property' => 'display', 'label' => 'Display', 'selector' => '.ssc_button:hover span strong'),
	                                 array('property' => 'border', 'label' => 'Border', 'selector' => '.ssc_button:hover span strong'),
	                                 array('property' => 'border-radius', 'label' => 'Border Radius', 'selector' => '.ssc_button:hover span strong'),
	                                 array('property' => 'padding', 'label' => 'Padding', 'selector' => '.ssc_button:hover span strong'),
	                                 array('property' => 'margin', 'label' => 'Margin', 'selector' => '.ssc_button:hover span strong'),

                                 )
                             )
                         )
                     ),
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

function ssc_button_shortcode($atts, $content = null) {
	$hover_effect = '';
    extract(shortcode_atts(array(
        'text_title' => '',
        'link' => '',
        'hover_effect' => '',
        'show_icon' => '',
        'svg_icon' => '',
        'icon' => '',
        'icon_position' => '',
        'popup' => '',
        'img' => '',
        'onclick' => '',
        'ex_class' => '',
        'wrap_class' => '',
    ) , $atts));

    $output = '';
    $button_attr 	= array();
    extract($atts);

    $link	= ( '||' === $link ) ? '' : $link;
    $link	= kc_parse_link($link);

    if ( strlen( $link['url'] ) > 0 ) {
        $a_href 	= $link['url'];
        $a_title 	= $link['title'];
        $a_target 	= strlen( $link['target'] ) > 0 ? $link['target'] : '_self';
    }

    if( !isset( $a_href ) )
        $a_href = "#";



    $el_class = array( 'ssc_button');
    if ( !empty( $ex_class ) )
        $el_class[] = $ex_class;

    if ( !empty( $popup ) ) {
        $el_class[] = $popup;
        if ($popup === 'image-link'){
            $img_full = image_downsize( $img, 'full' );
            $a_href = $img_full[0];
        }
    }


    if( isset( $el_class ) )
        $button_attr[] = 'class="'. esc_attr( implode(' ', $el_class ) ) .'"';

    if( isset( $a_href ) )
        $button_attr[] = 'href="'. esc_attr($a_href) .'"';

    if( isset( $a_target ) )
        $button_attr[] = 'target="'. esc_attr($a_target) .'"';

    if( isset($a_title) && $a_title != '' )
        $button_attr[] = 'title="'. esc_attr($a_title) .'"';



    if( $onclick != '' )
        $button_attr[] = ' onclick="'. $onclick .'"';

    $wrp_classes = apply_filters( 'kc-el-class', $atts );
	if ( !empty( $wrap_class ) )
		$wrp_classes[] = $wrap_class;
    $output .= '<div  class="ssc_btn '.implode( ' ', $wrp_classes ) . '  '. $hover_effect .'">';

    $output .= '<a '.implode(' ', $button_attr).'>';

    if ( 'yes' === $show_icon ) {
        if ( $icon_position == 'left' ) {
            $output .= '<span><strong><i class="'. esc_attr( $icon ).'"></i></strong></span> '.esc_html( $text_title ) ;
        } else {
            $output .= esc_html( $text_title ).' <span><strong><i class="'. esc_attr( $icon ) .'"></i></strong></span>';
        }
    } else if ( 'svg' === $show_icon && is_numeric( $svg_icon ) ) {
	    if ( $icon_position == 'left' ) {
		    $output .= '<span class="svg-icon">' . ssc_process_svg( $svg_icon ) . '</span> <span>'.esc_html( $text_title ).'</span>' ;
	    } else {
		    $output .= '<span>'.esc_html( $text_title ).'</span> <span class="svg-icon">' . ssc_process_svg( $svg_icon ) . '</span>';
	    }
    } else {

        if ( !empty( $text_title ) )
            $output .= '<span>'.esc_html( $text_title ).'</span>';

    }
    $output .= '</a>';
    $output .= '</div>';

    return $output;
}

add_shortcode('ssc_button', 'ssc_button_shortcode');

