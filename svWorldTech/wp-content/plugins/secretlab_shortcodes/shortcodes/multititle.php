<?php
add_action('init', 'ssc_multititle_params', 99);

/**
 * Additional functions
 */

/**
 * Additional functions
 */


function ssc_multititle_params() {
    global $kc;

     $kc->add_map(array(
        'ssc_multititle' => array(
            'name' => esc_html__( 'Multiple Title', 'ssc' ),
            'description' => esc_html__( 'It displays a title with multiple sections with different tags and designs', 'ssc' ),
            'icon' => 'kc-icon-box ssc-icon-13',
            'category' => 'SecretLab',
            'css_box' => true,
            'params' => array(
                esc_html__( 'General', 'ssc' ) => array(
	                array(
		                'name'	  => 'tag',
		                'label'   => esc_html__( 'Tag for the text box', 'ssc' ),
		                'type'	  => 'select',
		                'options' => array(
			                'h1'  => 'H1',
			                'h2'  => 'H2',
			                'h3'  => 'H3',
			                'h4'  => 'H4',
			                'h5'  => 'H5',
			                'h6'  => 'H6',
			                'div'  => 'div',
			                'span'  => 'span',
			                'p'  => 'p'
		                ),
		                'value' => 'div',
	                ),

	                array(
		                'name'          => 'design',
		                'label'         => __('Show design elements?', 'ssc'),
		                'type'          => 'toggle',
		                'value' => '',
	                ),
	                array(
		                'name'			=> 'before_element',
		                'type'     	=> 'dropdown',
		                'label'  	 	=> esc_html__( 'Design Element', 'ssc' ),
		                'options' 		=> array(
			                'none'  => esc_html__( 'none', 'ssc' ),
			                'bcircle'  => esc_html__( 'Big circle', 'ssc' ),
			                'scircle'  => esc_html__( 'Small circle', 'ssc' ),
			                'brhombus'  => esc_html__( 'Big rhombus', 'ssc' ),
			                'srhombus'  => esc_html__( 'Small rhombus', 'ssc' ),
			                'bsquare'  => esc_html__( 'Big square', 'ssc' ),
			                'ssquare'  => esc_html__( 'Small square', 'ssc' ),
			                'rectangle'  => esc_html__( 'Inclined Rectangle', 'ssc' ),
			                'arc'  => esc_html__( 'Arc', 'ssc' ),
			                'angle'  => esc_html__( 'Angle', 'ssc' ),
			                'line'  => esc_html__( 'Line', 'ssc' ),
			                'lline'  => esc_html__( 'Long line', 'ssc' ),

		                ),
		                'description'	=> esc_html__( 'Select the click event when users click on an image.', 'ssc' ),
		                'relation' => array(
			                'parent'    => 'design',
			                'show_when' => 'yes'
		                ),
		                'value'	=> 'none'
	                ),
	                array(
		                'name'			=> 'bep',
		                'type'     	=> 'dropdown',
		                'label'  	 	=> esc_html__( 'Design Element Position', 'ssc' ),
		                'options' 		=> array(
			                'left'  => esc_html__( 'Left', 'ssc' ),
			                'right'  => esc_html__( 'Right', 'ssc' ),
			                'center'  => esc_html__( 'Center', 'ssc' ),
		                ),
		                'description'	=> esc_html__( 'Select the click event when users click on an image.', 'ssc' ),
		                'relation' => array(
			                'parent'    => 'design',
			                'show_when' => 'yes'
		                ),
	                ),
	                array(
		                'name'			=> 'after_element',
		                'type'     	=> 'dropdown',
		                'label'  	 	=> esc_html__( 'Design Element 2', 'ssc' ),
		                'options' 		=> array(
			                'nonea'  => esc_html__( 'none', 'ssc' ),
			                'bcirclea'  => esc_html__( 'Big circle', 'ssc' ),
			                'scirclea'  => esc_html__( 'Small circle', 'ssc' ),
			                'brhombusa'  => esc_html__( 'Big rhombus', 'ssc' ),
			                'srhombusa'  => esc_html__( 'Small rhombus', 'ssc' ),
			                'bsquarea'  => esc_html__( 'Big square', 'ssc' ),
			                'ssquarea'  => esc_html__( 'Small square', 'ssc' ),
			                'rectanglea'  => esc_html__( 'Inclined Rectangle', 'ssc' ),
			                'arca'  => esc_html__( 'Arc', 'ssc' ),
			                'anglea'  => esc_html__( 'Angle', 'ssc' ),
			                'linea'  => esc_html__( 'Line', 'ssc' ),
			                'llinea'  => esc_html__( 'Long line', 'ssc' ),

		                ),
		                'description'	=> esc_html__( 'Select the click event when users click on an image.', 'ssc' ),
		                'relation' => array(
			                'parent'    => 'design',
			                'show_when' => 'yes'
		                ),
		                'value'	=> 'nonea'
	                ),
	                array(
		                'name'			=> 'bea',
		                'type'     	=> 'dropdown',
		                'label'  	 	=> esc_html__( 'Design Element Position', 'ssc' ),
		                'options' 		=> array(
			                'left'  => esc_html__( 'Left', 'ssc' ),
			                'right'  => esc_html__( 'Right', 'ssc' ),
			                'center'  => esc_html__( 'Center', 'ssc' ),
		                ),
		                'description'	=> esc_html__( 'Select the click event when users click on an image.', 'ssc' ),
		                'relation' => array(
			                'parent'    => 'design',
			                'show_when' => 'yes'
		                ),
	                ),
	                array(
		                'name'          => 'p_title1',
		                'label'         => __('Use Page Title 1?', 'ssc'),
//		                'type'          => 'toggle',
//		                'value' => '',
		                'type' => 'radio',
		                'options' => array(
			                'yes' => esc_html__( 'Yes', 'ssc' ),
			                '' => esc_html__( 'No', 'ssc' ),
		                ),
		                'value' => '',
	                ),
                    array(
                        'name'	      => 'title1',
                        'label'       => esc_html__(  'Text Line 1', 'ssc' ),
                        'admin_label' => true,
                        'type'	      => 'text',
                        'description' => esc_html__( 'First line of the title', 'ssc' ),
                        'relation' => array(
	                        'parent'    => 'p_title1',
	                        'show_when' => ''
                        ),
                    ),
                    array(
                        'name'	  => 'type1',
                        'label'   => esc_html__( 'Type of the line 1', 'ssc' ),
                        'type'	  => 'select',
                        'options' => array(
                            'h1'  => 'H1',
                            'h2'  => 'H2',
                            'h3'  => 'H3',
                            'h4'  => 'H4',
                            'h5'  => 'H5',
                            'h6'  => 'H6',
                            'div'  => 'div',
                            'span'  => 'span',
                            'p'  => 'p'
                        ),
                        'value' => 'span',
                    ),

	                array(
		                'name' => 'link_url',
		                'label' => esc_html__( 'Link URL for the title', 'ssc' ),
		                'type' => 'text',
		                'description' => '',
		                'value' => '',
	                ) ,
	                array(
		                'name'          => 'p_title2',
		                'label'         => __('Use Page Title 2?', 'ssc'),
//		                'type'          => 'toggle',
//		                'value' => '',
		                'type' => 'radio',
		                'options' => array(
			                'yes' => esc_html__( 'Yes', 'ssc' ),
			                '' => esc_html__( 'No', 'ssc' ),
		                ),
		                'value' => '',
	                ),
                    array(
                        'name'	      => 'title2',
                        'label'       => esc_html__( 'Text Line 2', 'ssc' ),
                        'admin_label' => true,
                        'type'	      => 'text',
                        'description' => esc_html__( 'Second line of the title', 'ssc' ),
                        'relation' => array(
	                        'parent'    => 'p_title2',
	                        'show_when' => ''
                        ),
                    ),
                    array(
                        'name'	  => 'type2',
                        'label'   => esc_html__( 'Type of the line 2', 'ssc' ),
                        'type'	  => 'select',
                        'options' => array(
                            'h1'  => 'H1',
                            'h2'  => 'H2',
                            'h3'  => 'H3',
                            'h4'  => 'H4',
                            'h5'  => 'H5',
                            'h6'  => 'H6',
                            'div'  => 'div',
                            'span'  => 'span',
                            'p'  => 'p'
                        ),
                        'value' => 'span',
                    ),
	                array(
		                'name'          => 'p_title3',
		                'label'         => __('Use Page Title 3?', 'ssc'),
//		                'type'          => 'toggle',
//		                'value' => '',
		                'type' => 'radio',
		                'options' => array(
			                'yes' => esc_html__( 'Yes', 'ssc' ),
			                '' => esc_html__( 'No', 'ssc' ),
		                ),
		                'value' => '',
	                ),
                    array(
                        'name'	      => 'title3',
                        'label'       => esc_html__( 'Text Line 3', 'ssc' ),
                        'admin_label' => true,
                        'type'	      => 'text',
                        'description' => esc_html__( 'Third line of the title', 'ssc' ),
                        'relation' => array(
	                        'parent'    => 'p_title3',
	                        'show_when' => ''
                        ),
                    ),
                    array(
                        'name'	  => 'type3',
                        'label'   => esc_html__( 'Type of the line 3', 'ssc' ),
                        'type'	  => 'select',
                        'options' => array(
                            'h1'  => 'H1',
                            'h2'  => 'H2',
                            'h3'  => 'H3',
                            'h4'  => 'H4',
                            'h5'  => 'H5',
                            'h6'  => 'H6',
                            'div'  => 'div',
                            'span'  => 'span',
                            'p'  => 'p'
                        ),
                        'value' => 'span',
                    ),
	                array(
		                'name'          => 'p_title4',
		                'label'         => __('Use Page Title 4?', 'ssc'),
//		                'type'          => 'toggle',
//		                'value' => '',
		                'type' => 'radio',
		                'options' => array(
			                'yes' => esc_html__( 'Yes', 'ssc' ),
			                '' => esc_html__( 'No', 'ssc' ),
		                ),
		                'value' => '',
	                ),
                    array(
                        'name'	      => 'title4',
                        'label'       => esc_html__( 'Text Line 4', 'ssc' ),
                        'admin_label' => true,
                        'type'	      => 'text',
                        'description' => esc_html__( 'Fourth line of the title', 'ssc' ),
                        'relation' => array(
	                        'parent'    => 'p_title4',
	                        'show_when' => ''
                        ),
                    ),
                    array(
                        'name'	  => 'type4',
                        'label'   => esc_html__( 'Type of the line 4', 'ssc' ),
                        'type'	  => 'select',
                        'options' => array(
                            'h1'  => 'H1',
                            'h2'  => 'H2',
                            'h3'  => 'H3',
                            'h4'  => 'H4',
                            'h5'  => 'H5',
                            'h6'  => 'H6',
                            'div'  => 'div',
                            'span'  => 'span',
                            'p'  => 'p'
                        ),
                        'value' => 'span',
                    ),
	                array(
		                'name'          => 'p_title5',
		                'label'         => __('Use Page Title 5?', 'ssc'),
//		                'type'          => 'toggle',
//		                'value' => '',
		                'type' => 'radio',
		                'options' => array(
			                'yes' => esc_html__( 'Yes', 'ssc' ),
			                '' => esc_html__( 'No', 'ssc' ),
		                ),
		                'value' => '',
	                ),
                    array(
                        'name'	      => 'title5',
                        'label'       => esc_html__( 'Text Line 5', 'ssc' ),
                        'admin_label' => true,
                        'type'	      => 'text',
                        'description' => esc_html__( 'Fifth line of the title', 'ssc' ),
                        'relation' => array(
	                        'parent'    => 'p_title5',
	                        'show_when' => ''
                        ),
                    ),
                    array(
                        'name'	  => 'type5',
                        'label'   => esc_html__( 'Type of the line 5', 'ssc' ),
                        'type'	  => 'select',
                        'options' => array(
                            'h1'  => 'H1',
                            'h2'  => 'H2',
                            'h3'  => 'H3',
                            'h4'  => 'H4',
                            'h5'  => 'H5',
                            'h6'  => 'H6',
                            'div'  => 'div',
                            'span'  => 'span',
                            'p'  => 'p'
                        ),
                        'value' => 'span',
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
                //Styling
                //Styling
                esc_html__( 'styling', 'ssc' ) => array(
                    array(
                        'name' => 'my-css',
                        'label' =>  esc_html__( 'Styling', 'ssc' ),
                        'type' => 'css',
                        'value' => '{`kc-css`:{`any`:{`box`:{`text-align|`:`center`,`padding|`:`inherit inherit 25px inherit`,`display|`:`inline-block`},`elmnt-1`:{`background-color|.deb:before`:`rgba(91, 41, 239, 0.30)`,`border-radius|.deb:before`:`50px 50px 50px 50px`,`width|.deb:before`:`40px`,`height|.deb:before`:`40px`},`elmnt-2`:{`background-color|.deb:after`:`#5b29ef`,`border-radius|.deb:after`:`20px 20px 20px 20px`,`width|.deb:after`:`8px`,`height|.deb:after`:`8px`,`margin|.deb:after`:`17px -4px inherit inherit`},`title-1`:{`padding|.t1`:`inherit inherit inherit inherit`}}}', // remove this if you do not need a default content
                        'description' => esc_html__( 'Styles', 'ssc' ),
                        'options' => array(
                            array(
                                'screens' => "any,999,768,667,479",
                                'Typography' => array(
	                                array('property' => 'color', 'label' =>  esc_html__( 'Color', 'ssc' ), 'selector' => '+.ssc_mltttl .wr'),
	                                array('property' => 'font-size', 'label' =>  esc_html__( 'Font Size', 'ssc' ), 'selector' => '+.ssc_mltttl .wr'),
	                                array('property' => 'font-weight', 'label' =>  esc_html__( 'Font Weight', 'ssc' ), 'selector' => '+.ssc_mltttl .wr'),
	                                array('property' => 'font-style', 'label' =>  esc_html__( 'Font Style', 'ssc' ), 'selector' => '+.ssc_mltttl .wr'),
	                                array('property' => 'font-family', 'label' =>  esc_html__( 'Font Family', 'ssc' ), 'selector' => '+.ssc_mltttl .wr'),
	                                array('property' => 'text-align', 'label' =>  esc_html__( 'Text Align', 'ssc' ), 'selector' => '+.ssc_mltttl .wr'),
	                                array('property' => 'text-shadow', 'label' =>  esc_html__( 'Text Shadow', 'ssc' ), 'selector' => '+.ssc_mltttl .wr'),
	                                array('property' => 'text-transform', 'label' =>  esc_html__( 'Text Transform', 'ssc' ), 'selector' => '+.ssc_mltttl .wr'),
	                                array('property' => 'text-decoration', 'label' =>  esc_html__( 'Text Decoration', 'ssc' ), 'selector' => '+.ssc_mltttl .wr'),
	                                array('property' => 'line-height', 'label' =>  esc_html__( 'Line Height', 'ssc' ), 'selector' => '+.ssc_mltttl .wr'),
	                                array('property' => 'letter-spacing', 'label' =>  esc_html__( 'Letter Spacing', 'ssc' ), 'selector' => '+.ssc_mltttl .wr'),
	                                array('property' => 'overflow', 'label' =>  esc_html__( 'Overflow', 'ssc' ), 'selector' => '+.ssc_mltttl .wr'),
	                                array('property' => 'word-break', 'label' =>  esc_html__( 'Word Break', 'ssc' ), 'selector' => '+.ssc_mltttl .wr'),
	                                array('property' => 'margin', 'label' =>  esc_html__( 'Margin', 'ssc' ), 'selector' => '+.ssc_mltttl .wr'),
	                                array('property' => 'padding', 'label' =>  esc_html__( 'Padding', 'ssc' ), 'selector' => '+.ssc_mltttl .wr'),
                                ),
                                //Background group
                                'Background' => array(
                                    array('property' => 'background'),
                                ),
                                //Box group
                                'Box' => array(
	                                array('property' => 'text-align', 'label' =>  esc_html__( 'Text Align', 'ssc' )),
                                    array('property' => 'margin', 'label' =>  esc_html__( 'Margin', 'ssc' )),
                                    array('property' => 'padding', 'label' =>  esc_html__( 'Padding', 'ssc' )),
                                    array('property' => 'border', 'label' =>  esc_html__( 'Border', 'ssc' )),
                                    array('property' => 'width', 'label' =>  esc_html__( 'Width', 'ssc' )),
	                                array('property' => 'max-width', 'label' => 'Max-Width'),
                                    array('property' => 'height', 'label' =>  esc_html__( 'Height', 'ssc' )),
                                    array('property' => 'border-radius', 'label' =>  esc_html__( 'Border Radius', 'ssc' )),
                                    array('property' => 'float', 'label' =>  esc_html__( 'Float', 'ssc' )),
                                    array('property' => 'display', 'label' =>  esc_html__( 'Display', 'ssc' )),
                                    array('property' => 'box-shadow', 'label' =>  esc_html__( 'Box Shadow', 'ssc' )),
                                    array('property' => 'opacity', 'label' =>  esc_html__( 'Opacity', 'ssc' )),
	                                array('property' => 'z-index', 'label' =>  esc_html__( 'z-index', 'ssc' )),
                                ),
                                'Elmnt 1' => array(
	                                array('property' => 'color', 'label' =>  esc_html__( 'Color', 'ssc' ), 'selector' => '.deb:before'),
	                                array('property' => 'background-color', 'label' => esc_html__( 'Background Color', 'ssc' ), 'selector' => '.deb:before'),
	                                array('property' => 'background', 'selector' => '.deb:before'),
	                                array('property' => 'opacity', 'label' =>  esc_html__( 'Opacity', 'ssc' ), 'selector' => '.deb:before'),
	                                array('property' => 'border', 'label' =>  esc_html__( 'Border', 'ssc' ), 'selector' => '.deb:before'),
	                                array('property' => 'border-radius', 'label' =>  esc_html__( 'Border Radius', 'ssc' ), 'selector' => '.deb:before'),
	                                array('property' => 'width', 'label' =>  esc_html__( 'Width', 'ssc' ), 'selector' => '.deb:before'),
	                                array('property' => 'height', 'label' =>  esc_html__( 'Height', 'ssc' ), 'selector' => '.deb:before'),
	                                array('property' => 'margin', 'label' =>  esc_html__( 'Margin', 'ssc' ), 'selector' => '.deb:before'),
	                                array('property' => 'padding', 'label' =>  esc_html__( 'Padding', 'ssc' ), 'selector' => '.deb:before'),
	                                array('property' => 'float', 'label' =>  esc_html__( 'Float', 'ssc' ), 'selector' => '.deb:before'),
	                                array('property' => 'display', 'label' =>  esc_html__( 'Display', 'ssc' ), 'selector' => '.deb:before'),
	                                array('property' => 'box-shadow', 'label' =>  esc_html__( 'Box Shadow', 'ssc' ), 'selector' => '.deb:before'),
                                ),
                                'Elmnt 2' => array(
	                                array('property' => 'color', 'label' =>  esc_html__( 'Color', 'ssc' ), 'selector' => '.dea:after'),
	                                array('property' => 'background-color', 'label' => esc_html__( 'Background Color', 'ssc' ), 'selector' => '.deb:after'),
	                                array('property' => 'background', 'selector' => '.deb:after'),
	                                array('property' => 'opacity', 'label' =>  esc_html__( 'Opacity', 'ssc' ), 'selector' => '.deb:after'),
	                                array('property' => 'border', 'label' =>  esc_html__( 'Border', 'ssc' ), 'selector' => '.deb:after'),
	                                array('property' => 'border-radius', 'label' =>  esc_html__( 'Border Radius', 'ssc' ), 'selector' => '.deb:after'),
	                                array('property' => 'width', 'label' =>  esc_html__( 'Width', 'ssc' ), 'selector' => '.deb:after'),
	                                array('property' => 'height', 'label' =>  esc_html__( 'Height', 'ssc' ), 'selector' => '.deb:after'),
	                                array('property' => 'margin', 'label' =>  esc_html__( 'Margin', 'ssc' ), 'selector' => '.deb:after'),
	                                array('property' => 'padding', 'label' =>  esc_html__( 'Padding', 'ssc' ), 'selector' => '.deb:after'),
	                                array('property' => 'float', 'label' =>  esc_html__( 'Float', 'ssc' ), 'selector' => '.deb:after'),
	                                array('property' => 'display', 'label' =>  esc_html__( 'Display', 'ssc' ), 'selector' => '.deb:after'),
	                                array('property' => 'box-shadow', 'label' =>  esc_html__( 'Box Shadow', 'ssc' ), 'selector' => '.deb:after'),
                                ),
                                'Title 1' => array(
                                    array('property' => 'color', 'label' =>  esc_html__( 'Color', 'ssc' ), 'selector' => '.t1'),
                                    array('property' => 'font-size', 'label' =>  esc_html__( 'Font Size', 'ssc' ), 'selector' => '.t1'),
                                    array('property' => 'font-weight', 'label' =>  esc_html__( 'Font Weight', 'ssc' ), 'selector' => '.t1'),
                                    array('property' => 'font-style', 'label' =>  esc_html__( 'Font Style', 'ssc' ), 'selector' => '.t1'),
                                    array('property' => 'font-family', 'label' =>  esc_html__( 'Font Family', 'ssc' ), 'selector' => '.t1'),
                                    array('property' => 'text-align', 'label' =>  esc_html__( 'Text Align', 'ssc' ), 'selector' => '.t1'),
                                    array('property' => 'text-shadow', 'label' =>  esc_html__( 'Text Shadow', 'ssc' ), 'selector' => '.t1'),
                                    array('property' => 'text-transform', 'label' =>  esc_html__( 'Text Transform', 'ssc' ), 'selector' => '.t1'),
                                    array('property' => 'text-decoration', 'label' =>  esc_html__( 'Text Decoration', 'ssc' ), 'selector' => '.t1'),
                                    array('property' => 'line-height', 'label' =>  esc_html__( 'Line Height', 'ssc' ), 'selector' => '.t1'),
                                    array('property' => 'letter-spacing', 'label' =>  esc_html__( 'Letter Spacing', 'ssc' ), 'selector' => '.t1'),
                                    array('property' => 'overflow', 'label' =>  esc_html__( 'Overflow', 'ssc' ), 'selector' => '.t1'),
                                    array('property' => 'word-break', 'label' =>  esc_html__( 'Word Break', 'ssc' ), 'selector' => '.t1'),
                                    array('property' => 'background', 'selector' => '.t1'),
                                    array('property' => 'margin', 'label' =>  esc_html__( 'Margin', 'ssc' ), 'selector' => '.t1'),
                                    array('property' => 'padding', 'label' =>  esc_html__( 'Padding', 'ssc' ), 'selector' => '.t1'),
                                    array('property' => 'border', 'label' =>  esc_html__( 'Border', 'ssc' ), 'selector' => '.t1'),
                                    array('property' => 'width', 'label' =>  esc_html__( 'Width', 'ssc' ), 'selector' => '.t1'),
                                    array('property' => 'height', 'label' =>  esc_html__( 'Height', 'ssc' ), 'selector' => '.t1'),
                                    array('property' => 'border-radius', 'label' =>  esc_html__( 'Border Radius', 'ssc' ), 'selector' => '.t1'),
                                    array('property' => 'float', 'label' =>  esc_html__( 'Float', 'ssc' ), 'selector' => '.t1'),
                                    array('property' => 'display', 'label' =>  esc_html__( 'Display', 'ssc' ), 'selector' => '.t1'),
                                    array('property' => 'box-shadow', 'label' =>  esc_html__( 'Box Shadow', 'ssc' ), 'selector' => '.t1'),
                                    array('property' => 'opacity', 'label' =>  esc_html__( 'Opacity', 'ssc' ), 'selector' => '.t1'),
                                    array('property' => 'opacity', 'label' =>  esc_html__( 'Opacity Hover', 'ssc' ), 'selector' => '+:hover .t1'),
                                ),
                                'Title 2' => array(
                                    array('property' => 'color', 'label' =>  esc_html__( 'Color', 'ssc' ), 'selector' => '.t2'),
                                    array('property' => 'font-size', 'label' =>  esc_html__( 'Font Size', 'ssc' ), 'selector' => '.t2'),
                                    array('property' => 'font-weight', 'label' =>  esc_html__( 'Font Weight', 'ssc' ), 'selector' => '.t2'),
                                    array('property' => 'font-style', 'label' =>  esc_html__( 'Font Style', 'ssc' ), 'selector' => '.t2'),
                                    array('property' => 'font-family', 'label' =>  esc_html__( 'Font Family', 'ssc' ), 'selector' => '.t2'),
                                    array('property' => 'text-align', 'label' =>  esc_html__( 'Text Align', 'ssc' ), 'selector' => '.t2'),
                                    array('property' => 'text-shadow', 'label' =>  esc_html__( 'Text Shadow', 'ssc' ), 'selector' => '.t2'),
                                    array('property' => 'text-transform', 'label' =>  esc_html__( 'Text Transform', 'ssc' ), 'selector' => '.t2'),
                                    array('property' => 'text-decoration', 'label' =>  esc_html__( 'Text Decoration', 'ssc' ), 'selector' => '.t2'),
                                    array('property' => 'line-height', 'label' =>  esc_html__( 'Line Height', 'ssc' ), 'selector' => '.t2'),
                                    array('property' => 'letter-spacing', 'label' =>  esc_html__( 'Letter Spacing', 'ssc' ), 'selector' => '.t2'),
                                    array('property' => 'overflow', 'label' =>  esc_html__( 'Overflow', 'ssc' ), 'selector' => '.t2'),
                                    array('property' => 'word-break', 'label' =>  esc_html__( 'Word Break', 'ssc' ), 'selector' => '.t2'),
                                    array('property' => 'background', 'selector' => '.t2'),
                                    array('property' => 'margin', 'label' =>  esc_html__( 'Margin', 'ssc' ), 'selector' => '.t2'),
                                    array('property' => 'padding', 'label' =>  esc_html__( 'Padding', 'ssc' ), 'selector' => '.t2'),
                                    array('property' => 'border', 'label' =>  esc_html__( 'Border', 'ssc' ), 'selector' => '.t2'),
                                    array('property' => 'width', 'label' =>  esc_html__( 'Width', 'ssc' ), 'selector' => '.t2'),
                                    array('property' => 'height', 'label' =>  esc_html__( 'Height', 'ssc' ), 'selector' => '.t2'),
                                    array('property' => 'border-radius', 'label' =>  esc_html__( 'Border Radius', 'ssc' ), 'selector' => '.t2'),
                                    array('property' => 'float', 'label' =>  esc_html__( 'Float', 'ssc' ), 'selector' => '.t2'),
                                    array('property' => 'display', 'label' =>  esc_html__( 'Display', 'ssc' ), 'selector' => '.t2'),
                                    array('property' => 'box-shadow', 'label' =>  esc_html__( 'Box Shadow', 'ssc' ), 'selector' => '.t2'),
                                    array('property' => 'opacity', 'label' =>  esc_html__( 'Opacity', 'ssc' ), 'selector' => '.t2'),
                                    array('property' => 'opacity', 'label' =>  esc_html__( 'Opacity Hover', 'ssc' ), 'selector' => '+:hover .t2'),
                                ),
                                'Title 3' => array(
                                    array('property' => 'color', 'label' =>  esc_html__( 'Color', 'ssc' ), 'selector' => '.t3'),
                                    array('property' => 'font-size', 'label' =>  esc_html__( 'Font Size', 'ssc' ), 'selector' => '.t3'),
                                    array('property' => 'font-weight', 'label' =>  esc_html__( 'Font Weight', 'ssc' ), 'selector' => '.t3'),
                                    array('property' => 'font-style', 'label' =>  esc_html__( 'Font Style', 'ssc' ), 'selector' => '.t3'),
                                    array('property' => 'font-family', 'label' =>  esc_html__( 'Font Family', 'ssc' ), 'selector' => '.t3'),
                                    array('property' => 'text-align', 'label' =>  esc_html__( 'Text Align', 'ssc' ), 'selector' => '.t3'),
                                    array('property' => 'text-shadow', 'label' =>  esc_html__( 'Text Shadow', 'ssc' ), 'selector' => '.t3'),
                                    array('property' => 'text-transform', 'label' =>  esc_html__( 'Text Transform', 'ssc' ), 'selector' => '.t3'),
                                    array('property' => 'text-decoration', 'label' =>  esc_html__( 'Text Decoration', 'ssc' ), 'selector' => '.t3'),
                                    array('property' => 'line-height', 'label' =>  esc_html__( 'Line Height', 'ssc' ), 'selector' => '.t3'),
                                    array('property' => 'letter-spacing', 'label' =>  esc_html__( 'Letter Spacing', 'ssc' ), 'selector' => '.t3'),
                                    array('property' => 'overflow', 'label' =>  esc_html__( 'Overflow', 'ssc' ), 'selector' => '.t3'),
                                    array('property' => 'word-break', 'label' =>  esc_html__( 'Word Break', 'ssc' ), 'selector' => '.t3'),
                                    array('property' => 'background', 'selector' => '.t3'),
                                    array('property' => 'margin', 'label' =>  esc_html__( 'Margin', 'ssc' ), 'selector' => '.t3'),
                                    array('property' => 'padding', 'label' =>  esc_html__( 'Padding', 'ssc' ), 'selector' => '.t3'),
                                    array('property' => 'border', 'label' =>  esc_html__( 'Border', 'ssc' ), 'selector' => '.t3'),
                                    array('property' => 'width', 'label' =>  esc_html__( 'Width', 'ssc' ), 'selector' => '.t3'),
                                    array('property' => 'height', 'label' =>  esc_html__( 'Height', 'ssc' ), 'selector' => '.t3'),
                                    array('property' => 'border-radius', 'label' =>  esc_html__( 'Border Radius', 'ssc' ), 'selector' => '.t3'),
                                    array('property' => 'float', 'label' =>  esc_html__( 'Float', 'ssc' ), 'selector' => '.t3'),
                                    array('property' => 'display', 'label' =>  esc_html__( 'Display', 'ssc' ), 'selector' => '.t3'),
                                    array('property' => 'box-shadow', 'label' =>  esc_html__( 'Box Shadow', 'ssc' ), 'selector' => '.t3'),
                                    array('property' => 'opacity', 'label' =>  esc_html__( 'Opacity', 'ssc' ), 'selector' => '.t3'),
                                    array('property' => 'opacity', 'label' =>  esc_html__( 'Opacity Hover', 'ssc' ), 'selector' => '+:hover .t3'),
                                ),
                                'Title 4' => array(
                                    array('property' => 'color', 'label' =>  esc_html__( 'Color', 'ssc' ), 'selector' => '.t4'),
                                    array('property' => 'font-size', 'label' =>  esc_html__( 'Font Size', 'ssc' ), 'selector' => '.t4'),
                                    array('property' => 'font-weight', 'label' =>  esc_html__( 'Font Weight', 'ssc' ), 'selector' => '.t4'),
                                    array('property' => 'font-style', 'label' =>  esc_html__( 'Font Style', 'ssc' ), 'selector' => '.t4'),
                                    array('property' => 'font-family', 'label' =>  esc_html__( 'Font Family', 'ssc' ), 'selector' => '.t4'),
                                    array('property' => 'text-align', 'label' =>  esc_html__( 'Text Align', 'ssc' ), 'selector' => '.t4'),
                                    array('property' => 'text-shadow', 'label' =>  esc_html__( 'Text Shadow', 'ssc' ), 'selector' => '.t4'),
                                    array('property' => 'text-transform', 'label' =>  esc_html__( 'Text Transform', 'ssc' ), 'selector' => '.t4'),
                                    array('property' => 'text-decoration', 'label' =>  esc_html__( 'Text Decoration', 'ssc' ), 'selector' => '.t4'),
                                    array('property' => 'line-height', 'label' =>  esc_html__( 'Line Height', 'ssc' ), 'selector' => '.t4'),
                                    array('property' => 'letter-spacing', 'label' =>  esc_html__( 'Letter Spacing', 'ssc' ), 'selector' => '.t4'),
                                    array('property' => 'overflow', 'label' =>  esc_html__( 'Overflow', 'ssc' ), 'selector' => '.t4'),
                                    array('property' => 'word-break', 'label' =>  esc_html__( 'Word Break', 'ssc' ), 'selector' => '.t4'),
                                    array('property' => 'background', 'selector' => '.t4'),
                                    array('property' => 'margin', 'label' =>  esc_html__( 'Margin', 'ssc' ), 'selector' => '.t4'),
                                    array('property' => 'padding', 'label' =>  esc_html__( 'Padding', 'ssc' ), 'selector' => '.t4'),
                                    array('property' => 'border', 'label' =>  esc_html__( 'Border', 'ssc' ), 'selector' => '.t4'),
                                    array('property' => 'width', 'label' =>  esc_html__( 'Width', 'ssc' ), 'selector' => '.t4'),
                                    array('property' => 'height', 'label' =>  esc_html__( 'Height', 'ssc' ), 'selector' => '.t4'),
                                    array('property' => 'border-radius', 'label' =>  esc_html__( 'Border Radius', 'ssc' ), 'selector' => '.t4'),
                                    array('property' => 'float', 'label' =>  esc_html__( 'Float', 'ssc' ), 'selector' => '.t4'),
                                    array('property' => 'display', 'label' =>  esc_html__( 'Display', 'ssc' ), 'selector' => '.t4'),
                                    array('property' => 'box-shadow', 'label' =>  esc_html__( 'Box Shadow', 'ssc' ), 'selector' => '.t4'),
                                    array('property' => 'opacity', 'label' =>  esc_html__( 'Opacity', 'ssc' ), 'selector' => '.t4'),
                                    array('property' => 'opacity', 'label' =>  esc_html__( 'Opacity Hover', 'ssc' ), 'selector' => '+:hover .t4'),
                                ),
                                'Title 5' => array(
                                    array('property' => 'color', 'label' =>  esc_html__( 'Color', 'ssc' ), 'selector' => '.t5'),
                                    array('property' => 'font-size', 'label' =>  esc_html__( 'Font Size', 'ssc' ), 'selector' => '.t5'),
                                    array('property' => 'font-weight', 'label' =>  esc_html__( 'Font Weight', 'ssc' ), 'selector' => '.t5'),
                                    array('property' => 'font-style', 'label' =>  esc_html__( 'Font Style', 'ssc' ), 'selector' => '.t5'),
                                    array('property' => 'font-family', 'label' =>  esc_html__( 'Font Family', 'ssc' ), 'selector' => '.t5'),
                                    array('property' => 'text-align', 'label' =>  esc_html__( 'Text Align', 'ssc' ), 'selector' => '.t5'),
                                    array('property' => 'text-shadow', 'label' =>  esc_html__( 'Text Shadow', 'ssc' ), 'selector' => '.t5'),
                                    array('property' => 'text-transform', 'label' =>  esc_html__( 'Text Transform', 'ssc' ), 'selector' => '.t5'),
                                    array('property' => 'text-decoration', 'label' =>  esc_html__( 'Text Decoration', 'ssc' ), 'selector' => '.t5'),
                                    array('property' => 'line-height', 'label' =>  esc_html__( 'Line Height', 'ssc' ), 'selector' => '.t5'),
                                    array('property' => 'letter-spacing', 'label' =>  esc_html__( 'Letter Spacing', 'ssc' ), 'selector' => '.t5'),
                                    array('property' => 'overflow', 'label' =>  esc_html__( 'Overflow', 'ssc' ), 'selector' => '.t5'),
                                    array('property' => 'word-break', 'label' =>  esc_html__( 'Word Break', 'ssc' ), 'selector' => '.t5'),
                                    array('property' => 'background', 'selector' => '.t5'),
                                    array('property' => 'margin', 'label' =>  esc_html__( 'Margin', 'ssc' ), 'selector' => '.t5'),
                                    array('property' => 'padding', 'label' =>  esc_html__( 'Padding', 'ssc' ), 'selector' => '.t5'),
                                    array('property' => 'border', 'label' =>  esc_html__( 'Border', 'ssc' ), 'selector' => '.t5'),
                                    array('property' => 'width', 'label' =>  esc_html__( 'Width', 'ssc' ), 'selector' => '.t5'),
                                    array('property' => 'height', 'label' =>  esc_html__( 'Height', 'ssc' ), 'selector' => '.t5'),
                                    array('property' => 'border-radius', 'label' =>  esc_html__( 'Border Radius', 'ssc' ), 'selector' => '.t5'),
                                    array('property' => 'float', 'label' =>  esc_html__( 'Float', 'ssc' ), 'selector' => '.t5'),
                                    array('property' => 'display', 'label' =>  esc_html__( 'Display', 'ssc' ), 'selector' => '.t5'),
                                    array('property' => 'box-shadow', 'label' =>  esc_html__( 'Box Shadow', 'ssc' ), 'selector' => '.t5'),
                                    array('property' => 'opacity', 'label' =>  esc_html__( 'Opacity', 'ssc' ), 'selector' => '.t5'),
                                    array('property' => 'opacity', 'label' =>  esc_html__( 'Opacity Hover', 'ssc' ), 'selector' => '+:hover .t5'),
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


            ) // Params
        )
    ));
}

// Register Shortcode

function ssc_multititle_shortcode($atts, $content = null) {
	$link_text = '';
	extract( shortcode_atts( array(
		'tag'            => '',
		'before_element' => 'none',
		'bep'            => '',
		'after_element'  => 'nonea',
		'bea'            => '',
		'title1'         => '',
		'type1'          => '',
		'link_url'       => '',
		'title2'         => '',
		'type2'          => '',
		'title3'         => '',
		'type3'          => '',
		'title4'         => '',
		'type4'          => '',
		'title5'         => '',
		'type5'          => '',
		'el_class'       => '',
		'p_title1'       => '',
		'p_title2'       => '',
		'p_title3'       => '',
		'p_title4'       => '',
		'p_title5'       => '',
	),
		$atts ) );

    $output = '';
//    extract($atts);

    $wrp_classes = apply_filters( 'kc-el-class', $atts );

    if (!empty($bep) && $bep == 'left') {$bep = 'delb';} elseif($bep == 'center') {$bep = 'decb';} else {$bep = 'derb';}
    if (!empty($bea) && $bea == 'left') {$bea = 'dela';} elseif($bea == 'center') {$bea = 'deca';}  else {$bea = 'dera';}
	if (empty($before_element)) {$before_element = 'none';}
	if (empty($after_element)) {$after_element = 'nonea';}


	if ( 'yes' == $p_title1 || 'yes' == $p_title2 || 'yes' == $p_title3 || 'yes' == $p_title4 || 'yes' == $p_title5 ) {
		$title = ssc_multititle_generate_title();
		if( 'yes' == $p_title1 && '' === $title1 ){
			$title1 = $title;
		}
		if( 'yes' == $p_title2 && '' === $title2 ){
			$title2 = $title;
		}
		if( 'yes' == $p_title3 && '' === $title3 ){
			$title3 = $title;
		}
		if( 'yes' == $p_title4 && '' === $title4 ){
			$title4 = $title;
		}
		if( 'yes' == $p_title5 && '' === $title5 ){
			$title5 = $title;
		}
	}

    $output .= '<div  class="ssc_mltttl  '.implode( ' ', $wrp_classes ) . ' '.$el_class.'">';
	if ($link_url != '') {
		$output .=  '<a href="'.$link_url.'" class="rm">';
	}
	$output .= '<'. $tag .' class="wr deb '.$bep.' dea '.$bea.' '.$before_element.' '.$after_element.'">';
    if ( $title1 != '' ) {
        $output .= '<'. $type1 .' class="t1">'.$title1.'</'. $type1 .'>';
    }
    if ( $title2 != '' ) {
        $output .= '<'. $type2 .' class="t2">'.$title2.'</'. $type2 .'>';
    }
    if ( $title3 != '' ) {
        $output .= '<'. $type3 .' class="t3">'.$title3.'</'. $type3 .'>';
    }
    if ( $title4 != '' ) {
        $output .= '<'. $type4 .' class="t4">'.$title4.'</'. $type4 .'>';
    }
    if ( $title5 != '' ) {
        $output .= '<'. $type5 .' class="t5">'.$title5.'</'. $type5 .'>';
    }
	$output .= '</'. $tag .'>';
	if ($link_url != '') {
		$output .=  '</a>';
	}
    $output .= '</div>';

    return $output;
}

add_shortcode('ssc_multititle', 'ssc_multititle_shortcode');

function ssc_multititle_generate_title() {

	if ( ssc_multititle_is_home_static_page() ) {
		return ssc_multititle_get_content_title();
	} elseif ( ssc_multititle_is_home_posts_page() ) {
		return get_option('blogdescription');
	} else if ( ssc_multititle_is_posts_page() ) {
	    return ssc_multititle_get_content_title( get_post( get_option( 'page_for_posts' ) ) );
	} else if ( is_singular() ) {
		return ssc_multititle_get_content_title();
	} else if ( is_search() ) {
		return sprintf( esc_html__( 'Search for "%s"', 'ssc' ),
			esc_html( get_search_query() ) );
	} else if ( is_category() || is_tag() || is_tax() ) {
		if ( is_category() ) {
			$title = single_cat_title( '', false );
		} elseif ( is_tag() ) {
			$title = single_tag_title( '', false );
		} else {
			$title = single_term_title( '', false );
		}
		if ( $title === '' ) {
			$term       = $GLOBALS['wp_query']->get_queried_object();
			$title = $term->name;
		}
		return $title;
	} elseif ( is_author() ) {
		return get_the_author_meta( 'display_name', get_query_var( 'author' ) );
	} elseif ( is_post_type_archive() ) {
		$post_type = get_query_var( 'post_type' );
		if ( is_array( $post_type ) ) {
			$post_type = reset( $post_type );
		}
		$post_type_obj = get_post_type_object( $post_type );
		if ( isset( $post_type_obj->labels->menu_name ) ) {
			$title = $post_type_obj->labels->menu_name;
		} elseif ( isset( $post_type_obj->name ) ) {
			$title = $post_type_obj->name;
		} else {
			$title = '';
		}
		return $title;
	} elseif ( is_archive() ) {
		if ( is_month() ) {
			$title = sprintf( esc_html__( '%s Archives', 'ssc' ),
				single_month_title( ' ', false ) );
		} elseif ( is_year() ) {
			$title = sprintf( esc_html__( '%s Archives', 'ssc' ), get_query_var( 'year' ) );
		} elseif ( is_day() ) {
			$title = sprintf( esc_html__( '%s Archives', 'ssc' ), get_the_date() );
		} else {
			$title = esc_html__( 'Archives', 'ssc' );
		}
		return $title;
	} elseif ( is_404() ) {
		return esc_html__( 'Page not found', 'ssc' );
	} else if ( $kc_action = filter_input( INPUT_POST, 'kc_action' ) ) {
		if ( 'live-editor' === $kc_action  ) {
			if( isset( $_POST['ID'] ) ){
				return esc_attr( get_the_title( $_POST['ID'] ) );
			}
			return esc_html__( 'Live Editor', 'ssc' );
		}
	} else {
		return '';
	}
}
function ssc_multititle_is_home_static_page() {
	return ( is_front_page() && 'page' == get_option( 'show_on_front' ) && is_page( get_option( 'page_on_front' ) ) );
}

function ssc_multititle_is_home_posts_page() {
	return ( is_home() && 'posts' == get_option( 'show_on_front' ) );
}

function ssc_multititle_is_posts_page() {
	return ( is_home() && 'page' == get_option( 'show_on_front' ) );
}

function ssc_multititle_get_content_title( $object = null ) {
	if ( is_null( $object ) ) {
		$object = $GLOBALS['wp_query']->get_queried_object();
	}
	if ( is_object( $object ) ) {
		return $object->post_title;
	}
	return esc_html__( '404', 'ssc' );
}
