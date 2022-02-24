<?php
add_action('init', 'ssc_breadcrumb_params', 99);

/**
 * Additional functions
 */

/**
 * Additional functions
 */


function ssc_breadcrumb_params() {
	global $kc;

	$kc->add_map(array(
		'ssc_breadcrumb' => array(
			'name' => esc_html__( 'Breadcrumbs', 'ssc' ),
			'description' => esc_html__( 'It displays breadcrumbs ', 'ssc' ),
			'icon' => 'kc-icon-box ssc-icon-26',
			'category' => 'SecretLab',
			'css_box' => true,
			'params' => array(
				esc_html__( 'General', 'ssc' ) => array(
					array(
						'name'	      => 'homename',
						'label'       => esc_html__(  'Homepage Title', 'ssc' ),
						'admin_label' => true,
						'type'	      => 'text',
						'value' => esc_html__(  'Home', 'ssc' )
					),
					array(
						'name'	      => 'divider',
						'label'       => esc_html__(  'Divider', 'ssc' ),
						'admin_label' => true,
						'type'	      => 'text',
						'value' => '/'
					),
					array(
						'name' => 'el_class',
						'label' => esc_html__( 'Extra Class Name', 'ssc' ),
						'type' => 'text',
						'description' => esc_html__( 'If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your CSS file.', 'ssc' ) ,
						'admin_label' => true,
						'value' => ''
					),
					array(
						'name'			=> 'current_title',
						'type'			=> 'toggle',
						'label'			=> esc_html__( 'Show the current page title?', 'ssc' ),
						'value'			=> 'yes'
					),
					array(
						'name'			=> 'home_show',
						'type'			=> 'toggle',
						'label'			=> esc_html__( 'Show breadcrumbs on the Home page?', 'ssc' ),
						'value'			=> 'no'
					),
				),
				//Styling
				//Styling
				esc_html__( 'styling', 'ssc' ) => array(
					array(
						'name' => 'my-css',
						'label' => esc_html__( 'Styling', 'ssc' ),
						'type' => 'css',
						'value' => '{`kc-css`:{`any`:{`box`:{`text-align|`:`center`,`margin|`:`inherit auto inherit auto`,`float|`:`none`,`display|`:`inline-block`},`links`:{`text-decoration|a`:`none`},`divider`:{`padding|.divider`:`inherit 5px inherit 5px`}}}}', // remove this if you do not need a default content
						'description' => esc_html__( 'Styles', 'ssc' ),
						'options' => array(
							array(
								'screens' => "any,999,768,667,479",
								'Box' => array(
									array('property' => 'background'),
									array('property' => 'text-align', 'label' =>  esc_html__( 'Text Align', 'ssc' )),
									array('property' => 'margin', 'label' =>  esc_html__( 'Margin', 'ssc' )),
									array('property' => 'padding', 'label' =>  esc_html__( 'Padding', 'ssc' )),
									array('property' => 'border', 'label' =>  esc_html__( 'Border', 'ssc' )),
									array('property' => 'width', 'label' =>  esc_html__( 'Width', 'ssc' )),
									array('property' => 'max-width', 'label' =>  esc_html__( 'Max-Width', 'ssc' )),
									array('property' => 'height', 'label' =>  esc_html__( 'Height', 'ssc' )),
									array('property' => 'border-radius', 'label' =>  esc_html__( 'Border Radius', 'ssc' )),
									array('property' => 'float', 'label' =>  esc_html__( 'Float', 'ssc' )),
									array('property' => 'display', 'label' =>  esc_html__( 'Display', 'ssc' )),
									array('property' => 'box-shadow', 'label' =>  esc_html__( 'Box Shadow', 'ssc' )),
									array('property' => 'opacity', 'label' =>  esc_html__( 'Opacity', 'ssc' )),
									array('property' => 'z-index', 'label' =>  esc_html__( 'z-index', 'ssc' )),
								),
								'Typography' => array(
									array('property' => 'color', 'label' =>  esc_html__( 'Color', 'ssc' ), 'selector' => ''),
									array('property' => 'font-size', 'label' =>  esc_html__( 'Font Size', 'ssc' ), 'selector' => ''),
									array('property' => 'font-weight', 'label' =>  esc_html__( 'Font Weight', 'ssc' ), 'selector' => ''),
									array('property' => 'font-style', 'label' =>  esc_html__( 'Font Style', 'ssc' ), 'selector' => ''),
									array('property' => 'font-family', 'label' =>  esc_html__( 'Font Family', 'ssc' ), 'selector' => ''),
									array('property' => 'text-shadow', 'label' =>  esc_html__( 'Text Shadow', 'ssc' ), 'selector' => ''),
									array('property' => 'text-transform', 'label' =>  esc_html__( 'Text Transform', 'ssc' ), 'selector' => ''),
									array('property' => 'text-decoration', 'label' =>  esc_html__( 'Text Decoration', 'ssc' ), 'selector' => ''),
									array('property' => 'line-height', 'label' =>  esc_html__( 'Line Height', 'ssc' ), 'selector' => ''),
									array('property' => 'letter-spacing', 'label' =>  esc_html__( 'Letter Spacing', 'ssc' ), 'selector' => ''),
									array('property' => 'overflow', 'label' =>  esc_html__( 'Overflow', 'ssc' ), 'selector' => ''),
									array('property' => 'word-break', 'label' =>  esc_html__( 'Word Break', 'ssc' ), 'selector' => ''),
								),

								'Home' => array(
									array('property' => 'background', 'selector' => '.ssc-breadcrumb-home'),
									array('property' => 'color', 'label' =>  esc_html__( 'Color', 'ssc' ), 'selector' => '.ssc-breadcrumb-home'),
									array('property' => 'font-size', 'label' =>  esc_html__( 'Font Size', 'ssc' ), 'selector' => '.ssc-breadcrumb-home'),
									array('property' => 'font-weight', 'label' =>  esc_html__( 'Font Weight', 'ssc' ), 'selector' => '.ssc-breadcrumb-home'),
									array('property' => 'font-style', 'label' =>  esc_html__( 'Font Style', 'ssc' ), 'selector' => '.ssc-breadcrumb-home'),
									array('property' => 'font-family', 'label' =>  esc_html__( 'Font Family', 'ssc' ), 'selector' => '.ssc-breadcrumb-home'),
									array('property' => 'text-shadow', 'label' =>  esc_html__( 'Text Shadow', 'ssc' ), 'selector' => '.ssc-breadcrumb-home'),
									array('property' => 'text-transform', 'label' =>  esc_html__( 'Text Transform', 'ssc' ), 'selector' => '.ssc-breadcrumb-home'),
									array('property' => 'text-decoration', 'label' =>  esc_html__( 'Text Decoration', 'ssc' ), 'selector' => '.ssc-breadcrumb-home'),
									array('property' => 'line-height', 'label' =>  esc_html__( 'Line Height', 'ssc' ), 'selector' => '.ssc-breadcrumb-home'),
									array('property' => 'letter-spacing', 'label' =>  esc_html__( 'Letter Spacing', 'ssc' ), 'selector' => '.ssc-breadcrumb-home'),
									array('property' => 'float', 'label' =>  esc_html__( 'Float', 'ssc' ), 'selector' => '.ssc-breadcrumb-home'),
									array('property' => 'display', 'label' =>  esc_html__( 'Display', 'ssc' ), 'selector' => '.ssc-breadcrumb-home'),
									array('property' => 'overflow', 'label' =>  esc_html__( 'Overflow', 'ssc' ), 'selector' => '.ssc-breadcrumb-home'),
									array('property' => 'word-break', 'label' =>  esc_html__( 'Word Break', 'ssc' ), 'selector' => '.ssc-breadcrumb-home'),
								),
								'Links' => array(
									array('property' => 'background', 'selector' => 'a'),
									array('property' => 'color', 'label' =>  esc_html__( 'Color', 'ssc' ), 'selector' => 'a'),
									array('property' => 'font-size', 'label' =>  esc_html__( 'Font Size', 'ssc' ), 'selector' => 'a'),
									array('property' => 'font-weight', 'label' =>  esc_html__( 'Font Weight', 'ssc' ), 'selector' => 'a'),
									array('property' => 'font-style', 'label' =>  esc_html__( 'Font Style', 'ssc' ), 'selector' => 'a'),
									array('property' => 'font-family', 'label' =>  esc_html__( 'Font Family', 'ssc' ), 'selector' => 'a'),
									array('property' => 'text-shadow', 'label' =>  esc_html__( 'Text Shadow', 'ssc' ), 'selector' => 'a'),
									array('property' => 'text-transform', 'label' =>  esc_html__( 'Text Transform', 'ssc' ), 'selector' => 'a'),
									array('property' => 'text-decoration', 'label' =>  esc_html__( 'Text Decoration', 'ssc' ), 'selector' => 'a'),
									array('property' => 'line-height', 'label' =>  esc_html__( 'Line Height', 'ssc' ), 'selector' => 'a'),
									array('property' => 'letter-spacing', 'label' =>  esc_html__( 'Letter Spacing', 'ssc' ), 'selector' => 'a'),
									array('property' => 'overflow', 'label' =>  esc_html__( 'Overflow', 'ssc' ), 'selector' => 'a'),
									array('property' => 'word-break', 'label' =>  esc_html__( 'Word Break', 'ssc' ), 'selector' => 'a'),
									array('property' => 'float', 'label' =>  esc_html__( 'Float', 'ssc' ), 'selector' => 'a'),
									array('property' => 'display', 'label' =>  esc_html__( 'Display', 'ssc' ), 'selector' => 'a'),
									array('property' => 'margin', 'label' =>  esc_html__( 'Margin', 'ssc' ), 'selector' => 'a'),
									array('property' => 'padding', 'label' =>  esc_html__( 'Padding', 'ssc' ), 'selector' => 'a'),
								),
								'Page Title' => array(
									array('property' => 'background', 'selector' => '.ssc-breadcrumb'),
									array('property' => 'color', 'label' =>  esc_html__( 'Color', 'ssc' ), 'selector' => '.ssc-breadcrumb'),
									array('property' => 'font-size', 'label' =>  esc_html__( 'Font Size', 'ssc' ), 'selector' => '.ssc-breadcrumb'),
									array('property' => 'font-weight', 'label' =>  esc_html__( 'Font Weight', 'ssc' ), 'selector' => '.ssc-breadcrumb'),
									array('property' => 'font-style', 'label' =>  esc_html__( 'Font Style', 'ssc' ), 'selector' => '.ssc-breadcrumb'),
									array('property' => 'font-family', 'label' =>  esc_html__( 'Font Family', 'ssc' ), 'selector' => '.ssc-breadcrumb'),
									array('property' => 'text-shadow', 'label' =>  esc_html__( 'Text Shadow', 'ssc' ), 'selector' => '.ssc-breadcrumb'),
									array('property' => 'text-transform', 'label' =>  esc_html__( 'Text Transform', 'ssc' ), 'selector' => '.ssc-breadcrumb'),
									array('property' => 'text-decoration', 'label' =>  esc_html__( 'Text Decoration', 'ssc' ), 'selector' => '.ssc-breadcrumb'),
									array('property' => 'line-height', 'label' =>  esc_html__( 'Line Height', 'ssc' ), 'selector' => '.ssc-breadcrumb'),
									array('property' => 'letter-spacing', 'label' =>  esc_html__( 'Letter Spacing', 'ssc' ), 'selector' => '.ssc-breadcrumb'),
									array('property' => 'overflow', 'label' =>  esc_html__( 'Overflow', 'ssc' ), 'selector' => '.ssc-breadcrumb'),
									array('property' => 'word-break', 'label' =>  esc_html__( 'Word Break', 'ssc' ), 'selector' => '.ssc-breadcrumb'),
									array('property' => 'float', 'label' =>  esc_html__( 'Float', 'ssc' ), 'selector' => '.ssc-breadcrumb'),
									array('property' => 'display', 'label' =>  esc_html__( 'Display', 'ssc' ), 'selector' => '.ssc-breadcrumb'),
									array('property' => 'margin', 'label' =>  esc_html__( 'Margin', 'ssc' ), 'selector' => '.ssc-breadcrumb'),
									array('property' => 'padding', 'label' =>  esc_html__( 'Padding', 'ssc' ), 'selector' => '.ssc-breadcrumb'),
								),
								'Divider' => array(
									array('property' => 'background', 'selector' => '.divider'),
									array('property' => 'color', 'label' =>  esc_html__( 'Color', 'ssc' ), 'selector' => '.divider'),
									array('property' => 'font-size', 'label' =>  esc_html__( 'Font Size', 'ssc' ), 'selector' => '.divider'),
									array('property' => 'font-weight', 'label' =>  esc_html__( 'Font Weight', 'ssc' ), 'selector' => '.divider'),
									array('property' => 'font-style', 'label' =>  esc_html__( 'Font Style', 'ssc' ), 'selector' => '.divider'),
									array('property' => 'font-family', 'label' =>  esc_html__( 'Font Family', 'ssc' ), 'selector' => '.divider'),
									array('property' => 'text-shadow', 'label' =>  esc_html__( 'Text Shadow', 'ssc' ), 'selector' => '.divider'),
									array('property' => 'text-transform', 'label' =>  esc_html__( 'Text Transform', 'ssc' ), 'selector' => '.divider'),
									array('property' => 'text-decoration', 'label' =>  esc_html__( 'Text Decoration', 'ssc' ), 'selector' => '.divider'),
									array('property' => 'line-height', 'label' =>  esc_html__( 'Line Height', 'ssc' ), 'selector' => '.divider'),
									array('property' => 'letter-spacing', 'label' =>  esc_html__( 'Letter Spacing', 'ssc' ), 'selector' => '.divider'),
									array('property' => 'overflow', 'label' =>  esc_html__( 'Overflow', 'ssc' ), 'selector' => '.divider'),
									array('property' => 'word-break', 'label' =>  esc_html__( 'Word Break', 'ssc' ), 'selector' => '.divider'),
									array('property' => 'text-align', 'label' =>  esc_html__( 'Text Align', 'ssc' ), 'selector' => '.divider'),
									array('property' => 'margin', 'label' =>  esc_html__( 'Margin', 'ssc' ), 'selector' => '.divider'),
									array('property' => 'padding', 'label' =>  esc_html__( 'Padding', 'ssc' ), 'selector' => '.divider'),
									array('property' => 'border', 'label' =>  esc_html__( 'Border', 'ssc' ), 'selector' => '.divider'),
									array('property' => 'width', 'label' =>  esc_html__( 'Width', 'ssc' ), 'selector' => '.divider'),
									array('property' => 'height', 'label' =>  esc_html__( 'Height', 'ssc' ), 'selector' => '.divider'),
									array('property' => 'border-radius', 'label' =>  esc_html__( 'Border Radius', 'ssc' ), 'selector' => '.divider'),
									array('property' => 'float', 'label' =>  esc_html__( 'Float', 'ssc' ), 'selector' => '.divider'),
									array('property' => 'display', 'label' =>  esc_html__( 'Display', 'ssc' ), 'selector' => '.divider'),
									array('property' => 'box-shadow', 'label' =>  esc_html__( 'Box Shadow', 'ssc' ), 'selector' => '.divider'),
									array('property' => 'opacity', 'label' =>  esc_html__( 'Opacity', 'ssc' ), 'selector' => '.divider'),
									array('property' => 'z-index', 'label' =>  esc_html__( 'z-index', 'ssc' ), 'selector' => '.divider'),
								),

							),
						)
					)
				),
				esc_html__( 'hover', 'ssc' ) => array(
					array(
						'name' => 'hover-css',
						'label' => esc_html__( 'Hover', 'ssc' ),
						'type' => 'css',
						'value' => '{`kc-css`:{`any`:{`links`:{`text-decoration|a:hover`:`underline`}}}}', // remove this if you do not need a default content
						'description' => esc_html__( 'Styles for Hover Condition', 'ssc' ),
						'options' => array(
							array(
								'screens' => "any,999,768,667,479",
								'Box' => array(
									array('property' => 'background', 'selector' => '+:hover'),
									array('property' => 'text-align', 'label' =>  esc_html__( 'Text Align', 'ssc' ), 'selector' => '+:hover'),
									array('property' => 'margin', 'label' =>  esc_html__( 'Margin', 'ssc' ), 'selector' => '+:hover'),
									array('property' => 'padding', 'label' =>  esc_html__( 'Padding', 'ssc' ), 'selector' => '+:hover'),
									array('property' => 'border', 'label' =>  esc_html__( 'Border', 'ssc' ), 'selector' => '+:hover'),
									array('property' => 'width', 'label' =>  esc_html__( 'Width', 'ssc' ), 'selector' => '+:hover'),
									array('property' => 'max-width', 'label' =>  esc_html__( 'Max-Width', 'ssc' ), 'selector' => '+:hover'),
									array('property' => 'height', 'label' =>  esc_html__( 'Height', 'ssc' ), 'selector' => '+:hover'),
									array('property' => 'border-radius', 'label' =>  esc_html__( 'Border Radius', 'ssc' ), 'selector' => '+:hover'),
									array('property' => 'float', 'label' =>  esc_html__( 'Float', 'ssc' ), 'selector' => '+:hover'),
									array('property' => 'display', 'label' =>  esc_html__( 'Display', 'ssc' ), 'selector' => '+:hover'),
									array('property' => 'box-shadow', 'label' =>  esc_html__( 'Box Shadow', 'ssc' ), 'selector' => '+:hover'),
									array('property' => 'opacity', 'label' =>  esc_html__( 'Opacity', 'ssc' ), 'selector' => '+:hover'),
									array('property' => 'z-index', 'label' =>  esc_html__( 'z-index', 'ssc' ), 'selector' => '+:hover'),
								),
								'Typography' => array(
									array('property' => 'color', 'label' =>  esc_html__( 'Color', 'ssc' ), 'selector' => '+:hover'),
									array('property' => 'font-size', 'label' =>  esc_html__( 'Font Size', 'ssc' ), 'selector' => '+:hover'),
									array('property' => 'font-weight', 'label' =>  esc_html__( 'Font Weight', 'ssc' ), 'selector' => '+:hover'),
									array('property' => 'font-style', 'label' =>  esc_html__( 'Font Style', 'ssc' ), 'selector' => '+:hover'),
									array('property' => 'font-family', 'label' =>  esc_html__( 'Font Family', 'ssc' ), 'selector' => '+:hover'),
									array('property' => 'text-shadow', 'label' =>  esc_html__( 'Text Shadow', 'ssc' ), 'selector' => '+:hover'),
									array('property' => 'text-transform', 'label' =>  esc_html__( 'Text Transform', 'ssc' ), 'selector' => '+:hover'),
									array('property' => 'text-decoration', 'label' =>  esc_html__( 'Text Decoration', 'ssc' ), 'selector' => '+:hover'),
									array('property' => 'line-height', 'label' =>  esc_html__( 'Line Height', 'ssc' ), 'selector' => '+:hover'),
									array('property' => 'letter-spacing', 'label' =>  esc_html__( 'Letter Spacing', 'ssc' ), 'selector' => '+:hover'),
									array('property' => 'overflow', 'label' =>  esc_html__( 'Overflow', 'ssc' ), 'selector' => '+:hover'),
									array('property' => 'word-break', 'label' =>  esc_html__( 'Word Break', 'ssc' ), 'selector' => '+:hover'),
								),

								'Home' => array(
									array('property' => 'background', 'selector' => '.ssc-breadcrumb-home:hover'),
									array('property' => 'color', 'label' =>  esc_html__( 'Color', 'ssc' ), 'selector' => '.ssc-breadcrumb-home:hover'),
									array('property' => 'font-size', 'label' =>  esc_html__( 'Font Size', 'ssc' ), 'selector' => '.ssc-breadcrumb-home:hover'),
									array('property' => 'font-weight', 'label' =>  esc_html__( 'Font Weight', 'ssc' ), 'selector' => '.ssc-breadcrumb-home:hover'),
									array('property' => 'font-style', 'label' =>  esc_html__( 'Font Style', 'ssc' ), 'selector' => '.ssc-breadcrumb-home:hover'),
									array('property' => 'font-family', 'label' =>  esc_html__( 'Font Family', 'ssc' ), 'selector' => '.ssc-breadcrumb-home:hover'),
									array('property' => 'text-shadow', 'label' =>  esc_html__( 'Text Shadow', 'ssc' ), 'selector' => '.ssc-breadcrumb-home:hover'),
									array('property' => 'text-transform', 'label' =>  esc_html__( 'Text Transform', 'ssc' ), 'selector' => '.ssc-breadcrumb-home:hover'),
									array('property' => 'text-decoration', 'label' =>  esc_html__( 'Text Decoration', 'ssc' ), 'selector' => '.ssc-breadcrumb-home:hover'),
									array('property' => 'line-height', 'label' =>  esc_html__( 'Line Height', 'ssc' ), 'selector' => '.ssc-breadcrumb-home:hover'),
									array('property' => 'letter-spacing', 'label' =>  esc_html__( 'Letter Spacing', 'ssc' ), 'selector' => '.ssc-breadcrumb-home:hover'),
									array('property' => 'overflow', 'label' =>  esc_html__( 'Overflow', 'ssc' ), 'selector' => '.ssc-breadcrumb-home:hover'),
									array('property' => 'word-break', 'label' =>  esc_html__( 'Word Break', 'ssc' ), 'selector' => '.ssc-breadcrumb-home:hover'),
								),
								'Links' => array(
									array('property' => 'background', 'selector' => 'a:hover'),
									array('property' => 'color', 'label' =>  esc_html__( 'Color', 'ssc' ), 'selector' => 'a:hover'),
									array('property' => 'font-size', 'label' =>  esc_html__( 'Font Size', 'ssc' ), 'selector' => 'a:hover'),
									array('property' => 'font-weight', 'label' =>  esc_html__( 'Font Weight', 'ssc' ), 'selector' => 'a:hover'),
									array('property' => 'font-style', 'label' =>  esc_html__( 'Font Style', 'ssc' ), 'selector' => 'a:hover'),
									array('property' => 'font-family', 'label' =>  esc_html__( 'Font Family', 'ssc' ), 'selector' => 'a:hover'),
									array('property' => 'text-shadow', 'label' =>  esc_html__( 'Text Shadow', 'ssc' ), 'selector' => 'a:hover'),
									array('property' => 'text-transform', 'label' =>  esc_html__( 'Text Transform', 'ssc' ), 'selector' => 'a:hover'),
									array('property' => 'text-decoration', 'label' =>  esc_html__( 'Text Decoration', 'ssc' ), 'selector' => 'a:hover'),
									array('property' => 'line-height', 'label' =>  esc_html__( 'Line Height', 'ssc' ), 'selector' => 'a:hover'),
									array('property' => 'letter-spacing', 'label' =>  esc_html__( 'Letter Spacing', 'ssc' ), 'selector' => 'a:hover'),
									array('property' => 'overflow', 'label' =>  esc_html__( 'Overflow', 'ssc' ), 'selector' => 'a:hover'),
									array('property' => 'word-break', 'label' =>  esc_html__( 'Word Break', 'ssc' ), 'selector' => 'a:hover'),
									array('property' => 'margin', 'label' =>  esc_html__( 'Margin', 'ssc' ), 'selector' => 'a:hover'),
									array('property' => 'padding', 'label' =>  esc_html__( 'Padding', 'ssc' ), 'selector' => 'a:hover'),
								),
								'Divider' => array(
									array('property' => 'background', 'selector' => '.divider:hover'),
									array('property' => 'color', 'label' =>  esc_html__( 'Color', 'ssc' ), 'selector' => '.divider:hover'),
									array('property' => 'font-size', 'label' =>  esc_html__( 'Font Size', 'ssc' ), 'selector' => '.divider:hover'),
									array('property' => 'font-weight', 'label' =>  esc_html__( 'Font Weight', 'ssc' ), 'selector' => '.divider:hover'),
									array('property' => 'font-style', 'label' =>  esc_html__( 'Font Style', 'ssc' ), 'selector' => '.divider:hover'),
									array('property' => 'font-family', 'label' =>  esc_html__( 'Font Family', 'ssc' ), 'selector' => '.divider:hover'),
									array('property' => 'text-shadow', 'label' =>  esc_html__( 'Text Shadow', 'ssc' ), 'selector' => '.divider:hover'),
									array('property' => 'text-transform', 'label' =>  esc_html__( 'Text Transform', 'ssc' ), 'selector' => '.divider:hover'),
									array('property' => 'text-decoration', 'label' =>  esc_html__( 'Text Decoration', 'ssc' ), 'selector' => '.divider:hover'),
									array('property' => 'line-height', 'label' =>  esc_html__( 'Line Height', 'ssc' ), 'selector' => '.divider:hover'),
									array('property' => 'letter-spacing', 'label' =>  esc_html__( 'Letter Spacing', 'ssc' ), 'selector' => '.divider:hover'),
									array('property' => 'overflow', 'label' =>  esc_html__( 'Overflow', 'ssc' ), 'selector' => '.divider:hover'),
									array('property' => 'word-break', 'label' =>  esc_html__( 'Word Break', 'ssc' ), 'selector' => '.divider:hover'),
									array('property' => 'text-align', 'label' =>  esc_html__( 'Text Align', 'ssc' ), 'selector' => '.divider:hover'),
									array('property' => 'margin', 'label' =>  esc_html__( 'Margin', 'ssc' ), 'selector' => '.divider:hover'),
									array('property' => 'padding', 'label' =>  esc_html__( 'Padding', 'ssc' ), 'selector' => '.divider:hover'),
									array('property' => 'border', 'label' =>  esc_html__( 'Border', 'ssc' ), 'selector' => '.divider:hover'),
									array('property' => 'width', 'label' =>  esc_html__( 'Width', 'ssc' ), 'selector' => '.divider:hover'),
									array('property' => 'height', 'label' =>  esc_html__( 'Height', 'ssc' ), 'selector' => '.divider:hover'),
									array('property' => 'border-radius', 'label' =>  esc_html__( 'Border Radius', 'ssc' ), 'selector' => '.divider:hover'),
									array('property' => 'float', 'label' =>  esc_html__( 'Float', 'ssc' ), 'selector' => '.divider:hover'),
									array('property' => 'display', 'label' =>  esc_html__( 'Display', 'ssc' ), 'selector' => '.divider:hover'),
									array('property' => 'box-shadow', 'label' =>  esc_html__( 'Box Shadow', 'ssc' ), 'selector' => '.divider:hover'),
									array('property' => 'opacity', 'label' =>  esc_html__( 'Opacity', 'ssc' ), 'selector' => '.divider:hover'),
									array('property' => 'z-index', 'label' =>  esc_html__( 'z-index', 'ssc' ), 'selector' => '.divider:hover'),
								),

							),
						)
					)
				),

			) // Params
		)
	));
}

// Register Shortcode

function ssc_breadcrumb_shortcode( $atts, $content = null ) {
	extract( shortcode_atts( array(
		'homename'   => esc_html__(  'Home', 'ssc' ),
		'divider'    => '/',
		'el_class'   => '',
		'current_title' => 'yes',
		'home_show' => 'no',
	),
		$atts ) );
	$wrp_classes = apply_filters( 'kc-el-class', $atts );
	$divider = !empty( $divider ) ? '<span class="divider">' . $divider . '</span>' : '';
	$output      = '<div  class="ssc-breadcrumbs ' . implode( ' ', $wrp_classes ) . ' ' . $el_class . '">';
	$before = '<span class="ssc-breadcrumb">';
	$after = '</span>';
	$linkBefore = $linkAfter = $pagedHtml = '';

	if ( function_exists( 'woocommerce_breadcrumb' ) && ( is_woocommerce() || is_shop() ) ) {
		$args = array(
			'delimiter' => $divider,
			'before'    => $before,
			'after'     => $after,
		);
		ob_start();
		woocommerce_breadcrumb( $args );
		$output .= ob_get_clean();
	} else {
		$content = $before;
		$category = esc_html__( '%1$s Archive for %2$s', 'ssc' );
		$search   = esc_html__( '%1$sSearch results for: %2$s', 'ssc' );
		$tag      = esc_html__( '%1$sPosts tagged %2$s', 'ssc' );
		$title_author   = esc_html__( '%1$sView all posts by %2$s', 'ssc' ); // text for an author page
		$title_404      = esc_html__( 'Error 404', 'ssc' ); // text for the 404 page

		global $post, $paged, $page;
		$homeLink   = home_url( '/' );
		$linkAttr   = ' rel="v:url" property="v:title"';

		$link_home       = $linkBefore . '<a class="ssc-breadcrumb-home" ' . $linkAttr . ' href="%1$s">%2$s</a>' . wp_kses_post( $divider ) . $linkAfter;

		$link       = $linkBefore . '<a' . $linkAttr . ' href="%1$s">' . '%2$s</a>' . wp_kses_post( $divider ) . $linkAfter;

		if ( is_front_page() ) {
			if ( 'yes' == $home_show ) {
				$output .= $linkBefore . '<a href="' . esc_url( $homeLink ) . '">' . $homename . '</a>' . $linkAfter;
			}
		} else {
			$output .= sprintf( $link_home, esc_url( $homeLink ), $homename ); // WPCS: XSS OK.

			if ( get_query_var( 'paged' ) ) {
				$pagedHtml .= '<span class="paged"> ';
				$pagedHtml .= '(';
//				if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) {
//					$pagedHtml .= '(';
//				}
				/* translators: %s: current page number. */
				$pagedHtml .= sprintf( esc_html__( 'Page %s', 'ssc' ), absint( max( $paged, $page ) ) );
//				if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) {
//					$pagedHtml .= ')';
//				}
				$pagedHtml .= ')';
				$pagedHtml .= '</span>';
			}

			if ( is_home() ) {
				$output .= $content . esc_html( get_the_title( get_option( 'page_for_posts', true ) ) ) . $after; // WPCS: XSS OK.
			} elseif ( is_category() ) {
				$thisCat = get_category( get_query_var( 'cat' ), false );
				if ( $thisCat->parent != 0 ) {
					$cats = get_category_parents( $thisCat->parent, true, false );
					$cats = str_replace( '<a',  $linkBefore . '<a' . $linkAttr, $cats );
					$cats = str_replace( '</a>', '</a>' . wp_kses_post( $divider) . $linkAfter, $cats );
					$output .= $cats; // WPCS: XSS OK.
				}
				$output .= $content . sprintf( $category, '<span class="archive-text">', '</span>' , $after ) .  get_the_archive_title() . $pagedHtml . $after;
			} elseif ( is_search() ) {
				$output .= $content . sprintf( $search, '<span class="search-text">', '</span>' . get_search_query() ) . $pagedHtml . $after; // WPCS: XSS OK.

			} elseif ( is_day() ) {
				$output .= sprintf( $link, esc_url( get_year_link( get_the_time( __( 'Y', 'ssc' ) ) ) ), esc_html( get_the_time( __( 'Y', 'ssc' ) ) ) ) ; // WPCS: XSS OK.
				$output .= sprintf( $link, esc_url( get_month_link( get_the_time( __( 'Y', 'ssc' ) ), false ) ), esc_html(get_the_time( __( 'F', 'ssc' ) ) ) ); // WPCS: XSS OK.
				$output .= $content . esc_html( get_the_time( __( 'd', 'ssc' ) ) ) . $pagedHtml . $after; // WPCS: XSS OK.
			} elseif ( is_month() ) {
				$output .= sprintf( $link, esc_url( get_year_link( get_the_time( __( 'Y', 'ssc' ) ) ) ), esc_html( get_the_time( __( 'Y', 'ssc' ) ) ) ) ; // WPCS: XSS OK.
				$output .= $content . esc_html( get_the_time( __( 'F', 'ssc' ) ) ) . $pagedHtml . $after; // WPCS: XSS OK.
			} elseif ( is_year() ) {
				$output .= $content . esc_html( get_the_time( __( 'Y', 'ssc' ) ) ) . $pagedHtml . $after; // WPCS: XSS OK.
			} elseif ( is_single() && !is_attachment() ) {
				if ( get_post_type() != 'post' ) {
					$post_type = get_post_type_object( get_post_type() );
					$post_link = get_post_type_archive_link( $post_type->name );
					$output .= sprintf( $link, esc_url( $post_link ), esc_html( $post_type->labels->singular_name ) ); // WPCS: XSS OK.
					$output .= $content . esc_html( get_the_title() ) . $pagedHtml . $after; // WPCS: XSS OK
				}
				else {
					$cat  = get_the_category();
					$cat = $cat[0];

					if( ! empty( $cat ) ) {
						$cats = get_category_parents( $cat, true, '' );
						$cats = preg_replace( "#^(.+)$#", "$1", $cats );
						$cats = str_replace( '<a',  $linkBefore . '<a' . $linkAttr, $cats );
						$cats = str_replace( '</a>', '</a>' . wp_kses_post( $divider ) . $linkAfter, $cats );
						$output .= $cats;  // WPCS: XSS OK.
					}
					$output .= $content . esc_html( get_the_title() ) . $pagedHtml . $after;  // WPCS: XSS OK.
				}
			} elseif ( !is_single() && !is_page() && get_post_type() != 'post' && !is_404() ) {
				$post_type = get_post_type_object( get_post_type() );
				$output .= isset( $post_type->labels->singular_name ) ? $content. esc_html( $post_type->labels->singular_name ) .  $pagedHtml . $after: '';  // WPCS: XSS OK.
				if ( null === $post_type && $kc_action = filter_input( INPUT_POST, 'kc_action' ) ) {
					if ( 'live-editor' === $kc_action  ) {
						if( isset( $_POST['ID'] ) ){
							$output .= $content . esc_attr( get_the_title( $_POST['ID'] ) ) . $pagedHtml . $after;
						} else {
							$output .= $content . esc_html__( 'Live Editor', 'ssc' ) . $pagedHtml . $after;
						}
					}
				}
			} elseif ( is_attachment() ) {
				$parent = get_post( $post->post_parent );
				$cat    = get_the_category( $parent->ID );
				if ( isset( $cat[0] ) ) {
					$cat = $cat[0];
				}
				if ( $cat ) {
					$cats = get_category_parents( $cat, true );
					$cats = str_replace( '<a', $linkBefore . '<a' . $linkAttr, $cats );
					$cats = str_replace( '</a>', '</a>' . wp_kses_post( $divider ) . $linkAfter, $cats );
					$output .= $cats; // WPCS: XSS OK.
				}
				$output .= sprintf( $link, esc_url( get_permalink( $parent ) ), esc_html( $parent->post_title ) );// WPCS: XSS OK.
				$output .= $content . esc_html( get_the_title() ) . $pagedHtml . $after;// WPCS: XSS OK.
			} elseif ( is_page() && ! $post->post_parent ) {
				$output .= $content. esc_html( get_the_title() ) . $pagedHtml . $after; // WPCS: XSS O
			} elseif ( is_page() && $post->post_parent ) {
				$parent_id   = $post->post_parent;
				$breadcrumbs = array();
				while( $parent_id ) {
					$page_child    = get_post( $parent_id );
					$breadcrumbs[] = sprintf( $link, esc_url( get_permalink( $page_child->ID ) ), esc_html( get_the_title( $page_child->ID ) ) );
					$parent_id     = $page_child->post_parent;
				}
				$breadcrumbs = array_reverse( $breadcrumbs );
				for( $i = 0; $i < count( $breadcrumbs ); $i++ ) {
					$output .= $breadcrumbs[$i];// WPCS: XSS OK.
				}
				$output .= $content . esc_html( get_the_title() ) . $pagedHtml . $after; // WPCS: XSS OK.
			} elseif ( is_tag() ) {
				$output .= $content . sprintf( $tag, '<span class="tag-text">', '</span>' ) . get_the_archive_title() . $pagedHtml . $after; // WPCS: XSS OK
			} elseif ( is_author() ) {
				global $author;
				$userdata = get_userdata( $author );
				$output .= $content . sprintf( $title_author, '<span class="author-text">', '</span>' . $userdata->display_name ) . $pagedHtml . $after; // WPCS: XSS
			} elseif ( is_404() ) {
				$output .= $content . $title_404 . $after; // WPCS: XSS OK.
			}
		}
	}

	$output .= '</div>';

	return $output;
}

add_shortcode('ssc_breadcrumb', 'ssc_breadcrumb_shortcode');
