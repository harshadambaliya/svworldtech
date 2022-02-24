<?php
add_action('init', 'ssc_searchform_params', 99);

/**
 * Additional functions
 */

/**
 * Additional functions
 */


function ssc_searchform_params() {
    global $kc;
    $kc->add_map(array(
        'ssc_searchform' => array(
            'name' => esc_html__( 'Search Form', 'ssc' ),
            'description' => esc_html__( 'It displays search form in any place', 'ssc' ),
            'icon' => 'kc-icon-box ssc-icon-16',
            'is_container' => true,
            'category' => 'SecretLab',
            'css_box' => true,
            'params' => array(
                // Options here
                esc_html__( 'General', 'ssc' ) => array(
                    array(
                        'name' => 'label_text',
                        'label' => esc_html__( 'Label Text', 'ssc' ),
                        'type' => 'text',
                        'admin_label' => true,
                        'value' => esc_html__( 'Search Form', 'ssc' ),
                    ),
                    array(
                        'name' => 'plchldr_text',
                        'label' => esc_html__( 'Placeholder Text', 'ssc' ),
                        'type' => 'text',
                        'admin_label' => true,
                        'value' => esc_html__( 'Enter Query', 'ssc' ),
                    ),
                    array(
                        'name' => 'button_text',
                        'label' => esc_html__( 'Button Text', 'ssc' ),
                        'type' => 'text',
                        'admin_label' => true,
                        'value' => esc_html__( 'Search', 'ssc' ),
                    ),
                    array(
                        'name'        => 'ex_class',
                        'label'       => esc_html__(' Button extra class', 'kingcomposer'),
                        'type'        => 'text',
                        'description' => esc_html__(' Add class name for a tag.', 'kingcomposer')
                    ),
                    array(
                        'type' 			=> 'toggle',
                        'name' 			=> 'show_icon',
                        'label' 		=> esc_html__( 'Show Icon?', 'kingcomposer' ),
                        'description' 	=> '',
                    ),
                    array(
                        'type' 			=> 'icon_picker',
                        'name'		 	=> 'icon',
                        'label' 		=> esc_html__( 'Icon', 'kingcomposer' ),
                        'value'         => 'fa-leaf',
                        'admin_label' 	=> true,
                        'description' 	=> esc_html__( 'Select icon for button', 'kingcomposer' ),
                        'relation'		=> array(
                            'parent'	=> 'show_icon',
                            'show_when'	=> 'yes'
                        )
                    ),
                ),
                //Styling
                esc_html__( 'styling', 'ssc' ) => array(
                    array(
                        'name' => 'my-css',
                        'label' => esc_html__( 'Styling', 'ssc' ),
                        'type' => 'css',
                        'value' => '{`kc-css`:{`any`:{`box`:{`text-align|`:`right`},`label`:{`display|label`:`inline-block`,`float|label`:`left`},`input`:{`display|input.search-field`:`inline`,`background|input.search-field`:`eyJjb2xvciI6InRyYW5zcGFyZW50IiwibGluZWFyR3JhZGllbnQiOlsiIl0sImltYWdlIjoibm9uZSIsInBvc2l0aW9uIjoiMCUgMCUiLCJzaXplIjoiYXV0byIsInJlcGVhdCI6InJlcGVhdCIsImF0dGFjaG1lbnQiOiJzY3JvbGwiLCJhZHZhbmNlZCI6MH0=`,`border|input.search-field`:`2px solid #cccccc`},`button`:{`color|.search-submit`:`#383838`,`font-size|.search-submit`:`14px`,`line-height|.search-submit`:`44px`,`font-weight|.search-submit`:`700`,`text-transform|.search-submit`:`uppercase`,`display|.search-submit`:`inline-block`,`background|.search-submit`:`eyJjb2xvciI6IiNlOGU4ZTgiLCJsaW5lYXJHcmFkaWVudCI6WyIiXSwiaW1hZ2UiOiJub25lIiwicG9zaXRpb24iOiIwJSAwJSIsInNpemUiOiJhdXRvIiwicmVwZWF0IjoicmVwZWF0IiwiYXR0YWNobWVudCI6InNjcm9sbCIsImFkdmFuY2VkIjowfQ==`,`padding|.search-submit`:`inherit 15px inherit 15px`},`icon`:{`margin|i`:`inherit 5px inherit inherit`}}}}', // remove this if you do not need a default content
                        'description' => esc_html__( 'Styles', 'ssc' ),
                        'options' => array(
                            array(
                                'screens' => "any",
                                //Box group
                                'Box' => array(
                                    array('property' => 'color', 'label' => esc_html__( 'Color', 'ssc' )),
                                    array('property' => 'font-size', 'label' => esc_html__( 'Font Size', 'ssc' )),
                                    array('property' => 'line-height', 'label' => esc_html__( 'Line Height', 'ssc' )),
                                    array('property' => 'font-weight', 'label' => esc_html__( 'Font Weight', 'ssc' )),
                                    array('property' => 'font-style', 'label' => esc_html__( 'Font Style', 'ssc' )),
                                    array('property' => 'font-family', 'label' => esc_html__( 'Font Family', 'ssc' )),
                                    array('property' => 'text-align', 'label' => esc_html__( 'Text Align', 'ssc' )),
                                    array('property' => 'text-transform', 'label' => esc_html__( 'Text Transform', 'ssc' )),
                                    array('property' => 'text-decoration', 'label' => esc_html__( 'Text Decoration', 'ssc' )),
                                    array('property' => 'display', 'label' => esc_html__( 'Display', 'ssc' )),
                                    array('property' => 'float', 'label' => esc_html__( 'Position left/right', 'ssc' )),
                                    array('property' => 'background'),
                                    array('property' => 'width', 'label' => esc_html__( 'Width', 'ssc' )),
                                    array('property' => 'height', 'label' => esc_html__( 'Height', 'ssc' )),
                                    array('property' => 'box-shadow', 'label' => esc_html__( 'Box Shadow', 'ssc' )),
                                    array('property' => 'opacity', 'label' => esc_html__( 'Opacity', 'ssc' )),
                                    array('property' => 'margin', 'label' => esc_html__( 'Margin', 'ssc' )),
                                    array('property' => 'padding', 'label' => esc_html__( 'Padding', 'ssc' )),
                                    array('property' => 'border', 'label' => esc_html__( 'Border', 'ssc' )),
                                    array('property' => 'border-radius', 'label' => esc_html__( 'Border Radius', 'ssc' )),
                                ),
                                //label
                                'label' => array(
                                    array('property' => 'color', 'label' => esc_html__( 'Color', 'ssc' ), 'selector' => 'label'),
                                    array('property' => 'font-size', 'label' => esc_html__( 'Font Size', 'ssc' ), 'selector' => 'label'),
                                    array('property' => 'line-height', 'label' => esc_html__( 'Line Height', 'ssc' ), 'selector' => 'label'),
                                    array('property' => 'font-weight', 'label' => esc_html__( 'Font Weight', 'ssc' ), 'selector' => 'label'),
                                    array('property' => 'font-style', 'label' => esc_html__( 'Font Style', 'ssc' ), 'selector' => 'label'),
                                        array('property' => 'font-family', 'label' => esc_html__( 'Font Family', 'ssc' ), 'selector' => 'label'),
                                        array('property' => 'text-align', 'label' => esc_html__( 'Text Align', 'ssc' ), 'selector' => 'label'),
                                        array('property' => 'text-transform', 'label' => esc_html__( 'Text Transform', 'ssc' ), 'selector' => 'label'),
                                        array('property' => 'text-decoration', 'label' => esc_html__( 'Text Decoration', 'ssc' ), 'selector' => 'label'),
                                    array('property' => 'display', 'label' => esc_html__( 'Display', 'ssc' ), 'selector' => 'label'),
                                    array('property' => 'float', 'label' => esc_html__( 'Position left/right', 'ssc' ), 'selector' => 'label'),
                                        array('property' => 'background', 'selector' => 'label'),
                                        array('property' => 'width', 'label' => esc_html__( 'Width', 'ssc' ), 'selector' => 'label'),
                                        array('property' => 'height', 'label' => esc_html__( 'Height', 'ssc' ), 'selector' => 'label'),
                                        array('property' => 'box-shadow', 'label' => esc_html__( 'Box Shadow', 'ssc' ), 'selector' => 'label'),
                                        array('property' => 'opacity', 'label' => esc_html__( 'Opacity', 'ssc' ), 'selector' => 'label'),
                                        array('property' => 'margin', 'label' => esc_html__( 'Margin', 'ssc' ), 'selector' => 'label'),
                                        array('property' => 'padding', 'label' => esc_html__( 'Padding', 'ssc' ), 'selector' => 'label'),
                                        array('property' => 'border', 'label' => esc_html__( 'Border', 'ssc' ), 'selector' => 'label'),
                                        array('property' => 'border-radius', 'label' => esc_html__( 'Border Radius', 'ssc' ), 'selector' => 'label'),
                                    ),
                                //Input
                                'Input' => array(
                                    array('property' => 'color', 'label' => esc_html__( 'Color', 'ssc' ), 'selector' => 'input.search-field'),
                                    array('property' => 'font-size', 'label' => esc_html__( 'Font Size', 'ssc' ), 'selector' => 'input.search-field'),
                                    array('property' => 'line-height', 'label' => esc_html__( 'Line Height', 'ssc' ), 'selector' => 'input.search-field'),
                                    array('property' => 'font-weight', 'label' => esc_html__( 'Font Weight', 'ssc' ), 'selector' => 'input.search-field'),
                                    array('property' => 'font-style', 'label' => esc_html__( 'Font Style', 'ssc' ), 'selector' => 'input.search-field'),
                                    array('property' => 'font-family', 'label' => esc_html__( 'Font Family', 'ssc' ), 'selector' => 'input.search-field'),
                                    array('property' => 'text-align', 'label' => esc_html__( 'Text Align', 'ssc' ), 'selector' => 'input.search-field'),
                                    array('property' => 'text-transform', 'label' => esc_html__( 'Text Transform', 'ssc' ), 'selector' => 'input.search-field'),
                                    array('property' => 'text-decoration', 'label' => esc_html__( 'Text Decoration', 'ssc' ), 'selector' => 'input.search-field'),
                                    array('property' => 'display', 'label' => esc_html__( 'Display', 'ssc' ), 'selector' => 'input.search-field'),
                                    array('property' => 'float', 'label' => esc_html__( 'Position left/right', 'ssc' ), 'selector' => 'input.search-field'),
                                    array('property' => 'background', 'selector' => 'input.search-field'),
                                    array('property' => 'width', 'label' => esc_html__( 'Width', 'ssc' ), 'selector' => 'input.search-field'),
                                    array('property' => 'height', 'label' => esc_html__( 'Height', 'ssc' ), 'selector' => 'input.search-field'),
                                    array('property' => 'box-shadow', 'label' => esc_html__( 'Box Shadow', 'ssc' ), 'selector' => 'input.search-field'),
                                    array('property' => 'opacity', 'label' => esc_html__( 'Opacity', 'ssc' ), 'selector' => 'input.search-field'),
                                    array('property' => 'margin', 'label' => esc_html__( 'Margin', 'ssc' ), 'selector' => 'input.search-field'),
                                    array('property' => 'padding', 'label' => esc_html__( 'Padding', 'ssc' ), 'selector' => 'input.search-field'),
                                    array('property' => 'border', 'label' => esc_html__( 'Border', 'ssc' ), 'selector' => 'input.search-field'),
                                    array('property' => 'border-radius', 'label' => esc_html__( 'Border Radius', 'ssc' ), 'selector' => 'input.search-field'),
                                ),
                                    //Button
                                    'Button' => array(
                                        array('property' => 'color', 'label' => esc_html__( 'Color', 'ssc' ), 'selector' => '.search-submit'),
                                        array('property' => 'font-size', 'label' => esc_html__( 'Font Size', 'ssc' ), 'selector' => '.search-submit'),
                                        array('property' => 'line-height', 'label' => esc_html__( 'Line Height', 'ssc' ), 'selector' => '.search-submit'),
                                        array('property' => 'font-weight', 'label' => esc_html__( 'Font Weight', 'ssc' ), 'selector' => '.search-submit'),
                                        array('property' => 'font-style', 'label' => esc_html__( 'Font Style', 'ssc' ), 'selector' => '.search-submit'),
                                        array('property' => 'font-family', 'label' => esc_html__( 'Font Family', 'ssc' ), 'selector' => '.search-submit'),
                                        array('property' => 'text-align', 'label' => esc_html__( 'Text Align', 'ssc' ), 'selector' => '.search-submit'),
                                        array('property' => 'text-transform', 'label' => esc_html__( 'Text Transform', 'ssc' ), 'selector' => '.search-submit'),
                                        array('property' => 'text-decoration', 'label' => esc_html__( 'Text Decoration', 'ssc' ), 'selector' => '.search-submit'),
                                        array('property' => 'display', 'label' => esc_html__( 'Display', 'ssc' ), 'selector' => '.search-submit'),
                                        array('property' => 'float', 'label' => esc_html__( 'Position left/right', 'ssc' ), 'selector' => '.search-submit'),
                                        array('property' => 'background', 'selector' => '.search-submit'),
                                        array('property' => 'width', 'label' => esc_html__( 'Width', 'ssc' ), 'selector' => '.search-submit'),
                                        array('property' => 'height', 'label' => esc_html__( 'Height', 'ssc' ), 'selector' => '.search-submit'),
                                        array('property' => 'box-shadow', 'label' => esc_html__( 'Box Shadow', 'ssc' ), 'selector' => '.search-submit'),
                                        array('property' => 'opacity', 'label' => esc_html__( 'Opacity', 'ssc' ), 'selector' => '.search-submit'),
                                        array('property' => 'margin', 'label' => esc_html__( 'Margin', 'ssc' ), 'selector' => '.search-submit'),
                                        array('property' => 'padding', 'label' => esc_html__( 'Padding', 'ssc' ), 'selector' => '.search-submit'),
                                        array('property' => 'border', 'label' => esc_html__( 'Border', 'ssc' ), 'selector' => '.search-submit'),
                                        array('property' => 'border-radius', 'label' => esc_html__( 'Border Radius', 'ssc' ), 'selector' => '.search-submit'),
                                    ),
                                //Icon
                                'Icon' => array(
                                    array('property' => 'color', 'label' => esc_html__( 'Color', 'ssc' ), 'selector' => 'i'),
                                    array('property' => 'font-size', 'label' => esc_html__( 'Font Size', 'ssc' ), 'selector' => 'i'),
                                    array('property' => 'line-height', 'label' => esc_html__( 'Line Height', 'ssc' ), 'selector' => 'i'),
                                    array('property' => 'font-weight', 'label' => esc_html__( 'Font Weight', 'ssc' ), 'selector' => 'i'),
                                    array('property' => 'font-style', 'label' => esc_html__( 'Font Style', 'ssc' ), 'selector' => 'i'),
                                    array('property' => 'font-family', 'label' => esc_html__( 'Font Family', 'ssc' ), 'selector' => 'i'),
                                    array('property' => 'text-align', 'label' => esc_html__( 'Text Align', 'ssc' ), 'selector' => 'i'),
                                    array('property' => 'text-transform', 'label' => esc_html__( 'Text Transform', 'ssc' ), 'selector' => 'i'),
                                    array('property' => 'text-decoration', 'label' => esc_html__( 'Text Decoration', 'ssc' ), 'selector' => 'i'),
                                    array('property' => 'display', 'label' => esc_html__( 'Display', 'ssc' ), 'selector' => 'i'),
                                    array('property' => 'background', 'selector' => 'i'),
                                    array('property' => 'width', 'label' => esc_html__( 'Width', 'ssc' ), 'selector' => 'i'),
                                    array('property' => 'height', 'label' => esc_html__( 'Height', 'ssc' ), 'selector' => 'i'),
                                    array('property' => 'box-shadow', 'label' => esc_html__( 'Box Shadow', 'ssc' ), 'selector' => 'i'),
                                    array('property' => 'opacity', 'label' => esc_html__( 'Opacity', 'ssc' ), 'selector' => 'i'),
                                    array('property' => 'margin', 'label' => esc_html__( 'Margin', 'ssc' ), 'selector' => 'i'),
                                    array('property' => 'padding', 'label' => esc_html__( 'Padding', 'ssc' ), 'selector' => 'i'),
                                    array('property' => 'border', 'label' => esc_html__( 'Border', 'ssc' ), 'selector' => 'i'),
                                    array('property' => 'border-radius', 'label' => esc_html__( 'Border Radius', 'ssc' ), 'selector' => 'i'),
                                ),
                            ),
                            array(
                                "screens" => "999,768,667,479",
                                'Box' => array(
                                    array('property' => 'color', 'label' => esc_html__( 'Color', 'ssc' )),
                                    array('property' => 'font-size', 'label' => esc_html__( 'Font Size', 'ssc' )),
                                    array('property' => 'line-height', 'label' => esc_html__( 'Line Height', 'ssc' )),
                                    array('property' => 'font-weight', 'label' => esc_html__( 'Font Weight', 'ssc' )),
                                    array('property' => 'font-style', 'label' => esc_html__( 'Font Style', 'ssc' )),
                                    array('property' => 'font-family', 'label' => esc_html__( 'Font Family', 'ssc' )),
                                    array('property' => 'text-align', 'label' => esc_html__( 'Text Align', 'ssc' )),
                                    array('property' => 'text-transform', 'label' => esc_html__( 'Text Transform', 'ssc' )),
                                    array('property' => 'text-decoration', 'label' => esc_html__( 'Text Decoration', 'ssc' )),
                                    array('property' => 'display', 'label' => esc_html__( 'Display', 'ssc' )),
                                    array('property' => 'background'),
                                    array('property' => 'width', 'label' => esc_html__( 'Width', 'ssc' )),
                                    array('property' => 'height', 'label' => esc_html__( 'Height', 'ssc' )),
                                    array('property' => 'box-shadow', 'label' => esc_html__( 'Box Shadow', 'ssc' )),
                                    array('property' => 'opacity', 'label' => esc_html__( 'Opacity', 'ssc' )),
                                    array('property' => 'margin', 'label' => esc_html__( 'Margin', 'ssc' )),
                                    array('property' => 'padding', 'label' => esc_html__( 'Padding', 'ssc' )),
                                    array('property' => 'border', 'label' => esc_html__( 'Border', 'ssc' )),
                                    array('property' => 'border-radius', 'label' => esc_html__( 'Border Radius', 'ssc' )),
                                ),
                                //label
                                'label' => array(
                                    array('property' => 'color', 'label' => esc_html__( 'Color', 'ssc' ), 'selector' => 'label'),
                                    array('property' => 'font-size', 'label' => esc_html__( 'Font Size', 'ssc' ), 'selector' => 'label'),
                                    array('property' => 'line-height', 'label' => esc_html__( 'Line Height', 'ssc' ), 'selector' => 'label'),
                                    array('property' => 'font-weight', 'label' => esc_html__( 'Font Weight', 'ssc' ), 'selector' => 'label'),
                                    array('property' => 'font-style', 'label' => esc_html__( 'Font Style', 'ssc' ), 'selector' => 'label'),
                                    array('property' => 'font-family', 'label' => esc_html__( 'Font Family', 'ssc' ), 'selector' => 'label'),
                                    array('property' => 'text-align', 'label' => esc_html__( 'Text Align', 'ssc' ), 'selector' => 'label'),
                                    array('property' => 'text-transform', 'label' => esc_html__( 'Text Transform', 'ssc' ), 'selector' => 'label'),
                                    array('property' => 'text-decoration', 'label' => esc_html__( 'Text Decoration', 'ssc' ), 'selector' => 'label'),
                                    array('property' => 'display', 'label' => esc_html__( 'Display', 'ssc' ), 'selector' => 'label'),
                                    array('property' => 'float', 'label' => esc_html__( 'Position left/right', 'ssc' ), 'selector' => 'label'),
                                    array('property' => 'background', 'selector' => 'label'),
                                    array('property' => 'width', 'label' => esc_html__( 'Width', 'ssc' ), 'selector' => 'label'),
                                    array('property' => 'height', 'label' => esc_html__( 'Height', 'ssc' ), 'selector' => 'label'),
                                    array('property' => 'box-shadow', 'label' => esc_html__( 'Box Shadow', 'ssc' ), 'selector' => 'label'),
                                    array('property' => 'opacity', 'label' => esc_html__( 'Opacity', 'ssc' ), 'selector' => 'label'),
                                    array('property' => 'margin', 'label' => esc_html__( 'Margin', 'ssc' ), 'selector' => 'label'),
                                    array('property' => 'padding', 'label' => esc_html__( 'Padding', 'ssc' ), 'selector' => 'label'),
                                    array('property' => 'border', 'label' => esc_html__( 'Border', 'ssc' ), 'selector' => 'label'),
                                    array('property' => 'border-radius', 'label' => esc_html__( 'Border Radius', 'ssc' ), 'selector' => 'label'),
                                ),
                                //Input
                                'Input' => array(
                                    array('property' => 'color', 'label' => esc_html__( 'Color', 'ssc' ), 'selector' => 'input.search-field'),
                                    array('property' => 'font-size', 'label' => esc_html__( 'Font Size', 'ssc' ), 'selector' => 'input.search-field'),
                                    array('property' => 'line-height', 'label' => esc_html__( 'Line Height', 'ssc' ), 'selector' => 'input.search-field'),
                                    array('property' => 'font-weight', 'label' => esc_html__( 'Font Weight', 'ssc' ), 'selector' => 'input.search-field'),
                                    array('property' => 'font-style', 'label' => esc_html__( 'Font Style', 'ssc' ), 'selector' => 'input.search-field'),
                                    array('property' => 'font-family', 'label' => esc_html__( 'Font Family', 'ssc' ), 'selector' => 'input.search-field'),
                                    array('property' => 'text-align', 'label' => esc_html__( 'Text Align', 'ssc' ), 'selector' => 'input.search-field'),
                                    array('property' => 'text-transform', 'label' => esc_html__( 'Text Transform', 'ssc' ), 'selector' => 'input.search-field'),
                                    array('property' => 'text-decoration', 'label' => esc_html__( 'Text Decoration', 'ssc' ), 'selector' => 'input.search-field'),
                                    array('property' => 'display', 'label' => esc_html__( 'Display', 'ssc' ), 'selector' => 'input.search-field'),
                                    array('property' => 'background', 'selector' => 'input.search-field'),
                                    array('property' => 'width', 'label' => esc_html__( 'Width', 'ssc' ), 'selector' => 'input.search-field'),
                                    array('property' => 'height', 'label' => esc_html__( 'Height', 'ssc' ), 'selector' => 'input.search-field'),
                                    array('property' => 'box-shadow', 'label' => esc_html__( 'Box Shadow', 'ssc' ), 'selector' => 'input.search-field'),
                                    array('property' => 'opacity', 'label' => esc_html__( 'Opacity', 'ssc' ), 'selector' => 'input.search-field'),
                                    array('property' => 'margin', 'label' => esc_html__( 'Margin', 'ssc' ), 'selector' => 'input.search-field'),
                                    array('property' => 'padding', 'label' => esc_html__( 'Padding', 'ssc' ), 'selector' => 'input.search-field'),
                                    array('property' => 'border', 'label' => esc_html__( 'Border', 'ssc' ), 'selector' => 'input.search-field'),
                                    array('property' => 'border-radius', 'label' => esc_html__( 'Border Radius', 'ssc' ), 'selector' => 'input.search-field'),
                                ),
                                //Button
                                'Button' => array(
                                    array('property' => 'color', 'label' => esc_html__( 'Color', 'ssc' ), 'selector' => '.search-submit'),
                                    array('property' => 'font-size', 'label' => esc_html__( 'Font Size', 'ssc' ), 'selector' => '.search-submit'),
                                    array('property' => 'line-height', 'label' => esc_html__( 'Line Height', 'ssc' ), 'selector' => '.search-submit'),
                                    array('property' => 'font-weight', 'label' => esc_html__( 'Font Weight', 'ssc' ), 'selector' => '.search-submit'),
                                    array('property' => 'font-style', 'label' => esc_html__( 'Font Style', 'ssc' ), 'selector' => '.search-submit'),
                                    array('property' => 'font-family', 'label' => esc_html__( 'Font Family', 'ssc' ), 'selector' => '.search-submit'),
                                    array('property' => 'text-align', 'label' => esc_html__( 'Text Align', 'ssc' ), 'selector' => '.search-submit'),
                                    array('property' => 'text-transform', 'label' => esc_html__( 'Text Transform', 'ssc' ), 'selector' => '.search-submit'),
                                    array('property' => 'text-decoration', 'label' => esc_html__( 'Text Decoration', 'ssc' ), 'selector' => '.search-submit'),
                                    array('property' => 'display', 'label' => esc_html__( 'Display', 'ssc' ), 'selector' => '.search-submit'),
                                    array('property' => 'background', 'selector' => '.search-submit'),
                                    array('property' => 'width', 'label' => esc_html__( 'Width', 'ssc' ), 'selector' => '.search-submit'),
                                    array('property' => 'height', 'label' => esc_html__( 'Height', 'ssc' ), 'selector' => '.search-submit'),
                                    array('property' => 'box-shadow', 'label' => esc_html__( 'Box Shadow', 'ssc' ), 'selector' => '.search-submit'),
                                    array('property' => 'opacity', 'label' => esc_html__( 'Opacity', 'ssc' ), 'selector' => '.search-submit'),
                                    array('property' => 'margin', 'label' => esc_html__( 'Margin', 'ssc' ), 'selector' => '.search-submit'),
                                    array('property' => 'padding', 'label' => esc_html__( 'Padding', 'ssc' ), 'selector' => '.search-submit'),
                                    array('property' => 'border', 'label' => esc_html__( 'Border', 'ssc' ), 'selector' => '.search-submit'),
                                    array('property' => 'border-radius', 'label' => esc_html__( 'Border Radius', 'ssc' ), 'selector' => '.search-submit'),
                                ),
                                //Icon
                                'Icon' => array(
                                    array('property' => 'color', 'label' => esc_html__( 'Color', 'ssc' ), 'selector' => 'i'),
                                    array('property' => 'font-size', 'label' => esc_html__( 'Font Size', 'ssc' ), 'selector' => 'i'),
                                    array('property' => 'line-height', 'label' => esc_html__( 'Line Height', 'ssc' ), 'selector' => 'i'),
                                    array('property' => 'font-weight', 'label' => esc_html__( 'Font Weight', 'ssc' ), 'selector' => 'i'),
                                    array('property' => 'font-style', 'label' => esc_html__( 'Font Style', 'ssc' ), 'selector' => 'i'),
                                    array('property' => 'font-family', 'label' => esc_html__( 'Font Family', 'ssc' ), 'selector' => 'i'),
                                    array('property' => 'text-align', 'label' => esc_html__( 'Text Align', 'ssc' ), 'selector' => 'i'),
                                    array('property' => 'text-transform', 'label' => esc_html__( 'Text Transform', 'ssc' ), 'selector' => 'i'),
                                    array('property' => 'text-decoration', 'label' => esc_html__( 'Text Decoration', 'ssc' ), 'selector' => 'i'),
                                    array('property' => 'display', 'label' => esc_html__( 'Display', 'ssc' ), 'selector' => 'i'),
                                    array('property' => 'background', 'selector' => 'i'),
                                    array('property' => 'width', 'label' => esc_html__( 'Width', 'ssc' ), 'selector' => 'i'),
                                    array('property' => 'height', 'label' => esc_html__( 'Height', 'ssc' ), 'selector' => 'i'),
                                    array('property' => 'box-shadow', 'label' => esc_html__( 'Box Shadow', 'ssc' ), 'selector' => 'i'),
                                    array('property' => 'opacity', 'label' => esc_html__( 'Opacity', 'ssc' ), 'selector' => 'i'),
                                    array('property' => 'margin', 'label' => esc_html__( 'Margin', 'ssc' ), 'selector' => 'i'),
                                    array('property' => 'padding', 'label' => esc_html__( 'Padding', 'ssc' ), 'selector' => 'i'),
                                    array('property' => 'border', 'label' => esc_html__( 'Border', 'ssc' ), 'selector' => 'i'),
                                    array('property' => 'border-radius', 'label' => esc_html__( 'Border Radius', 'ssc' ), 'selector' => 'i'),
                                ),

                            )
                        )
                    )
                ),
                //Hover
                esc_html__( 'hover', 'ssc' ) => array(
                    array(
                        'name' => 'my-css',
                        'label' => esc_html__( 'Hover', 'ssc' ),
                        'type' => 'css',
                        'value' => '', // remove this if you do not need a default content
                        'description' => esc_html__( 'Styles', 'ssc' ),
                        'options' => array(
                            array(
                                'screens' => "any",
                                //Box group
                                'Box' => array(
                                    array('property' => 'color', 'label' => esc_html__( 'Color', 'ssc' ), 'selector' => '+:hover '),
                                    array('property' => 'font-size', 'label' => esc_html__( 'Font Size', 'ssc' ), 'selector' => '+:hover '),
                                    array('property' => 'line-height', 'label' => esc_html__( 'Line Height', 'ssc' ), 'selector' => '+:hover '),
                                    array('property' => 'font-weight', 'label' => esc_html__( 'Font Weight', 'ssc' ), 'selector' => '+:hover '),
                                    array('property' => 'font-style', 'label' => esc_html__( 'Font Style', 'ssc' ), 'selector' => '+:hover '),
                                    array('property' => 'font-family', 'label' => esc_html__( 'Font Family', 'ssc' ), 'selector' => '+:hover '),
                                    array('property' => 'text-align', 'label' => esc_html__( 'Text Align', 'ssc' ), 'selector' => '+:hover '),
                                    array('property' => 'text-transform', 'label' => esc_html__( 'Text Transform', 'ssc' ), 'selector' => '+:hover '),
                                    array('property' => 'text-decoration', 'label' => esc_html__( 'Text Decoration', 'ssc' ), 'selector' => '+:hover '),
                                    array('property' => 'display', 'label' => esc_html__( 'Display', 'ssc' ), 'selector' => '+:hover '),
                                    array('property' => 'background', 'selector' => '+:hover '),
                                    array('property' => 'width', 'label' => esc_html__( 'Width', 'ssc' ), 'selector' => '+:hover '),
                                    array('property' => 'height', 'label' => esc_html__( 'Height', 'ssc' ), 'selector' => '+:hover '),
                                    array('property' => 'box-shadow', 'label' => esc_html__( 'Box Shadow', 'ssc' ), 'selector' => '+:hover '),
                                    array('property' => 'opacity', 'label' => esc_html__( 'Opacity', 'ssc' ), 'selector' => '+:hover '),
                                    array('property' => 'margin', 'label' => esc_html__( 'Margin', 'ssc' ), 'selector' => '+:hover '),
                                    array('property' => 'padding', 'label' => esc_html__( 'Padding', 'ssc' ), 'selector' => '+:hover '),
                                    array('property' => 'border', 'label' => esc_html__( 'Border', 'ssc' ), 'selector' => '+:hover '),
                                    array('property' => 'border-radius', 'label' => esc_html__( 'Border Radius', 'ssc' ), 'selector' => '+:hover '),
                                ),
                                //label
                                'label' => array(
                                    array('property' => 'color', 'label' => esc_html__( 'Color', 'ssc' ), 'selector' => '+:hover label'),
                                    array('property' => 'font-size', 'label' => esc_html__( 'Font Size', 'ssc' ), 'selector' => '+:hover label'),
                                    array('property' => 'line-height', 'label' => esc_html__( 'Line Height', 'ssc' ), 'selector' => '+:hover label'),
                                    array('property' => 'font-weight', 'label' => esc_html__( 'Font Weight', 'ssc' ), 'selector' => '+:hover label'),
                                    array('property' => 'font-style', 'label' => esc_html__( 'Font Style', 'ssc' ), 'selector' => '+:hover label'),
                                        array('property' => 'font-family', 'label' => esc_html__( 'Font Family', 'ssc' ), 'selector' => '+:hover label'),
                                        array('property' => 'text-align', 'label' => esc_html__( 'Text Align', 'ssc' ), 'selector' => '+:hover label'),
                                        array('property' => 'text-transform', 'label' => esc_html__( 'Text Transform', 'ssc' ), 'selector' => '+:hover label'),
                                        array('property' => 'text-decoration', 'label' => esc_html__( 'Text Decoration', 'ssc' ), 'selector' => '+:hover label'),
                                    array('property' => 'display', 'label' => esc_html__( 'Display', 'ssc' ), 'selector' => '+:hover label'),
                                    array('property' => 'float', 'label' => esc_html__( 'Position left/right', 'ssc' ), 'selector' => '+:hover label'),
                                        array('property' => 'background', 'selector' => '+:hover label'),
                                        array('property' => 'width', 'label' => esc_html__( 'Width', 'ssc' ), 'selector' => '+:hover label'),
                                        array('property' => 'height', 'label' => esc_html__( 'Height', 'ssc' ), 'selector' => '+:hover label'),
                                        array('property' => 'box-shadow', 'label' => esc_html__( 'Box Shadow', 'ssc' ), 'selector' => '+:hover label'),
                                        array('property' => 'opacity', 'label' => esc_html__( 'Opacity', 'ssc' ), 'selector' => '+:hover label'),
                                        array('property' => 'margin', 'label' => esc_html__( 'Margin', 'ssc' ), 'selector' => '+:hover label'),
                                        array('property' => 'padding', 'label' => esc_html__( 'Padding', 'ssc' ), 'selector' => '+:hover label'),
                                        array('property' => 'border', 'label' => esc_html__( 'Border', 'ssc' ), 'selector' => '+:hover label'),
                                        array('property' => 'border-radius', 'label' => esc_html__( 'Border Radius', 'ssc' ), 'selector' => '+:hover label'),
                                    ),
                                //Input
                                'Input' => array(
                                    array('property' => 'color', 'label' => esc_html__( 'Color', 'ssc' ), 'selector' => 'input.search-field:hover'),
                                    array('property' => 'font-size', 'label' => esc_html__( 'Font Size', 'ssc' ), 'selector' => 'input.search-field:hover'),
                                    array('property' => 'line-height', 'label' => esc_html__( 'Line Height', 'ssc' ), 'selector' => 'input.search-field:hover'),
                                    array('property' => 'font-weight', 'label' => esc_html__( 'Font Weight', 'ssc' ), 'selector' => 'input.search-field:hover'),
                                    array('property' => 'font-style', 'label' => esc_html__( 'Font Style', 'ssc' ), 'selector' => 'input.search-field:hover'),
                                    array('property' => 'font-family', 'label' => esc_html__( 'Font Family', 'ssc' ), 'selector' => 'input.search-field:hover'),
                                    array('property' => 'text-align', 'label' => esc_html__( 'Text Align', 'ssc' ), 'selector' => 'input.search-field:hover'),
                                    array('property' => 'text-transform', 'label' => esc_html__( 'Text Transform', 'ssc' ), 'selector' => 'input.search-field:hover'),
                                    array('property' => 'text-decoration', 'label' => esc_html__( 'Text Decoration', 'ssc' ), 'selector' => 'input.search-field:hover'),
                                    array('property' => 'display', 'label' => esc_html__( 'Display', 'ssc' ), 'selector' => 'input.search-field:hover'),
                                    array('property' => 'background', 'selector' => 'input.search-field:hover'),
                                    array('property' => 'width', 'label' => esc_html__( 'Width', 'ssc' ), 'selector' => 'input.search-field:hover'),
                                    array('property' => 'height', 'label' => esc_html__( 'Height', 'ssc' ), 'selector' => 'input.search-field:hover'),
                                    array('property' => 'box-shadow', 'label' => esc_html__( 'Box Shadow', 'ssc' ), 'selector' => 'input.search-field:hover'),
                                    array('property' => 'opacity', 'label' => esc_html__( 'Opacity', 'ssc' ), 'selector' => 'input.search-field:hover'),
                                    array('property' => 'margin', 'label' => esc_html__( 'Margin', 'ssc' ), 'selector' => 'input.search-field:hover'),
                                    array('property' => 'padding', 'label' => esc_html__( 'Padding', 'ssc' ), 'selector' => 'input.search-field:hover'),
                                    array('property' => 'border', 'label' => esc_html__( 'Border', 'ssc' ), 'selector' => 'input.search-field:hover'),
                                    array('property' => 'border-radius', 'label' => esc_html__( 'Border Radius', 'ssc' ), 'selector' => 'input.search-field:hover'),
                                ),
                                    //Button
                                    'Button' => array(
                                        array('property' => 'color', 'label' => esc_html__( 'Color', 'ssc' ), 'selector' => '.search-submit:hover'),
                                        array('property' => 'font-size', 'label' => esc_html__( 'Font Size', 'ssc' ), 'selector' => '.search-submit:hover'),
                                        array('property' => 'line-height', 'label' => esc_html__( 'Line Height', 'ssc' ), 'selector' => '.search-submit:hover'),
                                        array('property' => 'font-weight', 'label' => esc_html__( 'Font Weight', 'ssc' ), 'selector' => '.search-submit:hover'),
                                        array('property' => 'font-style', 'label' => esc_html__( 'Font Style', 'ssc' ), 'selector' => '.search-submit:hover'),
                                        array('property' => 'font-family', 'label' => esc_html__( 'Font Family', 'ssc' ), 'selector' => '.search-submit:hover'),
                                        array('property' => 'text-align', 'label' => esc_html__( 'Text Align', 'ssc' ), 'selector' => '.search-submit:hover'),
                                        array('property' => 'text-transform', 'label' => esc_html__( 'Text Transform', 'ssc' ), 'selector' => '.search-submit:hover'),
                                        array('property' => 'text-decoration', 'label' => esc_html__( 'Text Decoration', 'ssc' ), 'selector' => '.search-submit:hover'),
                                        array('property' => 'display', 'label' => esc_html__( 'Display', 'ssc' ), 'selector' => '.search-submit:hover'),
                                        array('property' => 'background', 'selector' => '.search-submit:hover'),
                                        array('property' => 'width', 'label' => esc_html__( 'Width', 'ssc' ), 'selector' => '.search-submit:hover'),
                                        array('property' => 'height', 'label' => esc_html__( 'Height', 'ssc' ), 'selector' => '.search-submit:hover'),
                                        array('property' => 'box-shadow', 'label' => esc_html__( 'Box Shadow', 'ssc' ), 'selector' => '.search-submit:hover'),
                                        array('property' => 'opacity', 'label' => esc_html__( 'Opacity', 'ssc' ), 'selector' => '.search-submit:hover'),
                                        array('property' => 'margin', 'label' => esc_html__( 'Margin', 'ssc' ), 'selector' => '.search-submit:hover'),
                                        array('property' => 'padding', 'label' => esc_html__( 'Padding', 'ssc' ), 'selector' => '.search-submit:hover'),
                                        array('property' => 'border', 'label' => esc_html__( 'Border', 'ssc' ), 'selector' => '.search-submit:hover'),
                                        array('property' => 'border-radius', 'label' => esc_html__( 'Border Radius', 'ssc' ), 'selector' => '.search-submit:hover'),
                                    ),
                                //Icon
                                'Icon' => array(
                                    array('property' => 'color', 'label' => esc_html__( 'Color', 'ssc' ), 'selector' => '+:hover i'),
                                    array('property' => 'font-size', 'label' => esc_html__( 'Font Size', 'ssc' ), 'selector' => '+:hover i'),
                                    array('property' => 'line-height', 'label' => esc_html__( 'Line Height', 'ssc' ), 'selector' => '+:hover i'),
                                    array('property' => 'font-weight', 'label' => esc_html__( 'Font Weight', 'ssc' ), 'selector' => '+:hover i'),
                                    array('property' => 'font-style', 'label' => esc_html__( 'Font Style', 'ssc' ), 'selector' => '+:hover i'),
                                    array('property' => 'font-family', 'label' => esc_html__( 'Font Family', 'ssc' ), 'selector' => '+:hover i'),
                                    array('property' => 'text-align', 'label' => esc_html__( 'Text Align', 'ssc' ), 'selector' => '+:hover i'),
                                    array('property' => 'text-transform', 'label' => esc_html__( 'Text Transform', 'ssc' ), 'selector' => '+:hover i'),
                                    array('property' => 'text-decoration', 'label' => esc_html__( 'Text Decoration', 'ssc' ), 'selector' => '+:hover i'),
                                    array('property' => 'display', 'label' => esc_html__( 'Display', 'ssc' ), 'selector' => '+:hover i'),
                                    array('property' => 'background', 'selector' => '+:hover i'),
                                    array('property' => 'width', 'label' => esc_html__( 'Width', 'ssc' ), 'selector' => '+:hover i'),
                                    array('property' => 'height', 'label' => esc_html__( 'Height', 'ssc' ), 'selector' => '+:hover i'),
                                    array('property' => 'box-shadow', 'label' => esc_html__( 'Box Shadow', 'ssc' ), 'selector' => '+:hover i'),
                                    array('property' => 'opacity', 'label' => esc_html__( 'Opacity', 'ssc' ), 'selector' => '+:hover i'),
                                    array('property' => 'margin', 'label' => esc_html__( 'Margin', 'ssc' ), 'selector' => '+:hover i'),
                                    array('property' => 'padding', 'label' => esc_html__( 'Padding', 'ssc' ), 'selector' => '+:hover i'),
                                    array('property' => 'border', 'label' => esc_html__( 'Border', 'ssc' ), 'selector' => '+:hover i'),
                                    array('property' => 'border-radius', 'label' => esc_html__( 'Border Radius', 'ssc' ), 'selector' => '+:hover i'),
                                ),
                            ),
                            array(
                                "screens" => "999,768,667,479",
                                'Box' => array(
                                    array('property' => 'color', 'label' => esc_html__( 'Color', 'ssc' )),
                                    array('property' => 'font-size', 'label' => esc_html__( 'Font Size', 'ssc' )),
                                    array('property' => 'line-height', 'label' => esc_html__( 'Line Height', 'ssc' )),
                                    array('property' => 'font-weight', 'label' => esc_html__( 'Font Weight', 'ssc' )),
                                    array('property' => 'font-style', 'label' => esc_html__( 'Font Style', 'ssc' )),
                                    array('property' => 'font-family', 'label' => esc_html__( 'Font Family', 'ssc' )),
                                    array('property' => 'text-align', 'label' => esc_html__( 'Text Align', 'ssc' )),
                                    array('property' => 'text-transform', 'label' => esc_html__( 'Text Transform', 'ssc' )),
                                    array('property' => 'text-decoration', 'label' => esc_html__( 'Text Decoration', 'ssc' )),
                                    array('property' => 'display', 'label' => esc_html__( 'Display', 'ssc' )),
                                    array('property' => 'background'),
                                    array('property' => 'width', 'label' => esc_html__( 'Width', 'ssc' )),
                                    array('property' => 'height', 'label' => esc_html__( 'Height', 'ssc' )),
                                    array('property' => 'box-shadow', 'label' => esc_html__( 'Box Shadow', 'ssc' )),
                                    array('property' => 'opacity', 'label' => esc_html__( 'Opacity', 'ssc' )),
                                    array('property' => 'margin', 'label' => esc_html__( 'Margin', 'ssc' )),
                                    array('property' => 'padding', 'label' => esc_html__( 'Padding', 'ssc' )),
                                    array('property' => 'border', 'label' => esc_html__( 'Border', 'ssc' )),
                                    array('property' => 'border-radius', 'label' => esc_html__( 'Border Radius', 'ssc' )),
                                ),
                                //label
                                'label' => array(
                                    array('property' => 'color', 'label' => esc_html__( 'Color', 'ssc' ), 'selector' => '+:hover label'),
                                    array('property' => 'font-size', 'label' => esc_html__( 'Font Size', 'ssc' ), 'selector' => '+:hover label'),
                                    array('property' => 'line-height', 'label' => esc_html__( 'Line Height', 'ssc' ), 'selector' => '+:hover label'),
                                    array('property' => 'font-weight', 'label' => esc_html__( 'Font Weight', 'ssc' ), 'selector' => '+:hover label'),
                                    array('property' => 'font-style', 'label' => esc_html__( 'Font Style', 'ssc' ), 'selector' => '+:hover label'),
                                    array('property' => 'font-family', 'label' => esc_html__( 'Font Family', 'ssc' ), 'selector' => '+:hover label'),
                                    array('property' => 'text-align', 'label' => esc_html__( 'Text Align', 'ssc' ), 'selector' => '+:hover label'),
                                    array('property' => 'text-transform', 'label' => esc_html__( 'Text Transform', 'ssc' ), 'selector' => '+:hover label'),
                                    array('property' => 'text-decoration', 'label' => esc_html__( 'Text Decoration', 'ssc' ), 'selector' => '+:hover label'),
                                    array('property' => 'display', 'label' => esc_html__( 'Display', 'ssc' ), 'selector' => '+:hover label'),
                                    array('property' => 'float', 'label' => esc_html__( 'Position left/right', 'ssc' ), 'selector' => '+:hover label'),
                                    array('property' => 'background', 'selector' => '+:hover label'),
                                    array('property' => 'width', 'label' => esc_html__( 'Width', 'ssc' ), 'selector' => '+:hover label'),
                                    array('property' => 'height', 'label' => esc_html__( 'Height', 'ssc' ), 'selector' => '+:hover label'),
                                    array('property' => 'box-shadow', 'label' => esc_html__( 'Box Shadow', 'ssc' ), 'selector' => '+:hover label'),
                                    array('property' => 'opacity', 'label' => esc_html__( 'Opacity', 'ssc' ), 'selector' => '+:hover label'),
                                    array('property' => 'margin', 'label' => esc_html__( 'Margin', 'ssc' ), 'selector' => '+:hover label'),
                                    array('property' => 'padding', 'label' => esc_html__( 'Padding', 'ssc' ), 'selector' => '+:hover label'),
                                    array('property' => 'border', 'label' => esc_html__( 'Border', 'ssc' ), 'selector' => '+:hover label'),
                                    array('property' => 'border-radius', 'label' => esc_html__( 'Border Radius', 'ssc' ), 'selector' => '+:hover label'),
                                ),
                                //Input
                                'Input' => array(
                                    array('property' => 'color', 'label' => esc_html__( 'Color', 'ssc' ), 'selector' => 'input.search-field:hover'),
                                    array('property' => 'font-size', 'label' => esc_html__( 'Font Size', 'ssc' ), 'selector' => 'input.search-field:hover'),
                                    array('property' => 'line-height', 'label' => esc_html__( 'Line Height', 'ssc' ), 'selector' => 'input.search-field:hover'),
                                    array('property' => 'font-weight', 'label' => esc_html__( 'Font Weight', 'ssc' ), 'selector' => 'input.search-field:hover'),
                                    array('property' => 'font-style', 'label' => esc_html__( 'Font Style', 'ssc' ), 'selector' => 'input.search-field:hover'),
                                    array('property' => 'font-family', 'label' => esc_html__( 'Font Family', 'ssc' ), 'selector' => 'input.search-field:hover'),
                                    array('property' => 'text-align', 'label' => esc_html__( 'Text Align', 'ssc' ), 'selector' => 'input.search-field:hover'),
                                    array('property' => 'text-transform', 'label' => esc_html__( 'Text Transform', 'ssc' ), 'selector' => 'input.search-field:hover'),
                                    array('property' => 'text-decoration', 'label' => esc_html__( 'Text Decoration', 'ssc' ), 'selector' => 'input.search-field:hover'),
                                    array('property' => 'display', 'label' => esc_html__( 'Display', 'ssc' ), 'selector' => 'input.search-field:hover'),
                                    array('property' => 'background', 'selector' => 'input.search-field:hover'),
                                    array('property' => 'width', 'label' => esc_html__( 'Width', 'ssc' ), 'selector' => 'input.search-field:hover'),
                                    array('property' => 'height', 'label' => esc_html__( 'Height', 'ssc' ), 'selector' => 'input.search-field:hover'),
                                    array('property' => 'box-shadow', 'label' => esc_html__( 'Box Shadow', 'ssc' ), 'selector' => 'input.search-field:hover'),
                                    array('property' => 'opacity', 'label' => esc_html__( 'Opacity', 'ssc' ), 'selector' => 'input.search-field:hover'),
                                    array('property' => 'margin', 'label' => esc_html__( 'Margin', 'ssc' ), 'selector' => 'input.search-field:hover'),
                                    array('property' => 'padding', 'label' => esc_html__( 'Padding', 'ssc' ), 'selector' => 'input.search-field:hover'),
                                    array('property' => 'border', 'label' => esc_html__( 'Border', 'ssc' ), 'selector' => 'input.search-field:hover'),
                                    array('property' => 'border-radius', 'label' => esc_html__( 'Border Radius', 'ssc' ), 'selector' => 'input.search-field:hover'),
                                ),
                                //Button
                                'Button' => array(
                                    array('property' => 'color', 'label' => esc_html__( 'Color', 'ssc' ), 'selector' => '.search-submit:hover'),
                                    array('property' => 'font-size', 'label' => esc_html__( 'Font Size', 'ssc' ), 'selector' => '.search-submit:hover'),
                                    array('property' => 'line-height', 'label' => esc_html__( 'Line Height', 'ssc' ), 'selector' => '.search-submit:hover'),
                                    array('property' => 'font-weight', 'label' => esc_html__( 'Font Weight', 'ssc' ), 'selector' => '.search-submit:hover'),
                                    array('property' => 'font-style', 'label' => esc_html__( 'Font Style', 'ssc' ), 'selector' => '.search-submit:hover'),
                                    array('property' => 'font-family', 'label' => esc_html__( 'Font Family', 'ssc' ), 'selector' => '.search-submit:hover'),
                                    array('property' => 'text-align', 'label' => esc_html__( 'Text Align', 'ssc' ), 'selector' => '.search-submit:hover'),
                                    array('property' => 'text-transform', 'label' => esc_html__( 'Text Transform', 'ssc' ), 'selector' => '.search-submit:hover'),
                                    array('property' => 'text-decoration', 'label' => esc_html__( 'Text Decoration', 'ssc' ), 'selector' => '.search-submit:hover'),
                                    array('property' => 'display', 'label' => esc_html__( 'Display', 'ssc' ), 'selector' => '.search-submit:hover'),
                                    array('property' => 'background', 'selector' => '.search-submit:hover'),
                                    array('property' => 'width', 'label' => esc_html__( 'Width', 'ssc' ), 'selector' => '.search-submit:hover'),
                                    array('property' => 'height', 'label' => esc_html__( 'Height', 'ssc' ), 'selector' => '.search-submit:hover'),
                                    array('property' => 'box-shadow', 'label' => esc_html__( 'Box Shadow', 'ssc' ), 'selector' => '.search-submit:hover'),
                                    array('property' => 'opacity', 'label' => esc_html__( 'Opacity', 'ssc' ), 'selector' => '.search-submit:hover'),
                                    array('property' => 'margin', 'label' => esc_html__( 'Margin', 'ssc' ), 'selector' => '.search-submit:hover'),
                                    array('property' => 'padding', 'label' => esc_html__( 'Padding', 'ssc' ), 'selector' => '.search-submit:hover'),
                                    array('property' => 'border', 'label' => esc_html__( 'Border', 'ssc' ), 'selector' => '.search-submit:hover'),
                                    array('property' => 'border-radius', 'label' => esc_html__( 'Border Radius', 'ssc' ), 'selector' => '.search-submit:hover'),
                                ),
                                //Icon
                                'Icon' => array(
                                    array('property' => 'color', 'label' => esc_html__( 'Color', 'ssc' ), 'selector' => '+:hover i'),
                                    array('property' => 'font-size', 'label' => esc_html__( 'Font Size', 'ssc' ), 'selector' => '+:hover i'),
                                    array('property' => 'line-height', 'label' => esc_html__( 'Line Height', 'ssc' ), 'selector' => '+:hover i'),
                                    array('property' => 'font-weight', 'label' => esc_html__( 'Font Weight', 'ssc' ), 'selector' => '+:hover i'),
                                    array('property' => 'font-style', 'label' => esc_html__( 'Font Style', 'ssc' ), 'selector' => '+:hover i'),
                                    array('property' => 'font-family', 'label' => esc_html__( 'Font Family', 'ssc' ), 'selector' => '+:hover i'),
                                    array('property' => 'text-align', 'label' => esc_html__( 'Text Align', 'ssc' ), 'selector' => '+:hover i'),
                                    array('property' => 'text-transform', 'label' => esc_html__( 'Text Transform', 'ssc' ), 'selector' => '+:hover i'),
                                    array('property' => 'text-decoration', 'label' => esc_html__( 'Text Decoration', 'ssc' ), 'selector' => '+:hover i'),
                                    array('property' => 'display', 'label' => esc_html__( 'Display', 'ssc' ), 'selector' => '+:hover i'),
                                    array('property' => 'background', 'selector' => '+:hover i'),
                                    array('property' => 'width', 'label' => esc_html__( 'Width', 'ssc' ), 'selector' => '+:hover i'),
                                    array('property' => 'height', 'label' => esc_html__( 'Height', 'ssc' ), 'selector' => '+:hover i'),
                                    array('property' => 'box-shadow', 'label' => esc_html__( 'Box Shadow', 'ssc' ), 'selector' => '+:hover i'),
                                    array('property' => 'opacity', 'label' => esc_html__( 'Opacity', 'ssc' ), 'selector' => '+:hover i'),
                                    array('property' => 'margin', 'label' => esc_html__( 'Margin', 'ssc' ), 'selector' => '+:hover i'),
                                    array('property' => 'padding', 'label' => esc_html__( 'Padding', 'ssc' ), 'selector' => '+:hover i'),
                                    array('property' => 'border', 'label' => esc_html__( 'Border', 'ssc' ), 'selector' => '+:hover i'),
                                    array('property' => 'border-radius', 'label' => esc_html__( 'Border Radius', 'ssc' ), 'selector' => '+:hover i'),
                                ),

                            )
                        )
                    )
                ),
                
            )
        )
    ));
}
// Register Shortcode
function ssc_searchform_shortcode($atts, $content = null) {
    $output = $label_text = $plchldr_text = $button_text = $ex_class = $icon = '';
    extract(shortcode_atts(array(
        'ex_class' => '',
        'label_text' => '',
        'plchldr_text' => '',
        'button_text' => '',
        'icon' => '',
    ) , $atts));


    extract($atts);

    $wrp_classes = apply_filters( 'kc-el-class', $atts );
    $output .= '<div class="ssc_searchf '.implode( ' ', $wrp_classes ) . '">';

    $output .= '<form role="search" method="get" class="search-form" action="'.home_url( '/' ).'">
	    <label><span class="">'.esc_attr( $label_text).'</span> </label>
        <input type="search" class="search-field" placeholder="'.esc_attr( $plchldr_text).'" value="'.get_search_query().'" name="s" title="'.esc_attr( $plchldr_text).'" />
       
        <button type="submit" class="search-submit"><span><i class="'. esc_attr( $icon ).'"></i></span> '.esc_attr( $button_text).'</button>
    </form>';

    $output .= '</div>';

    return $output;
}

add_shortcode('ssc_searchform', 'ssc_searchform_shortcode');

