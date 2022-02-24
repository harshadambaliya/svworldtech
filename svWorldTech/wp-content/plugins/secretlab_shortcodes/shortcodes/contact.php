<?php
add_action('init', 'ssc_cf7_params', 99);

/**
 * Additional functions
 */

/**
 * Additional functions
 */


function ssc_cf7_params() {
    global $kc;
    $contact_forms = kc_tools::get_cf7_names();
    $kc->add_map(array(
        'ssc_cf7' => array(
            'name' => esc_html__( 'Contact Form', 'ssc' ),
            'description' => esc_html__( 'It displays contact forms with unlimited design templates and colors from Contact Form 7 plugin', 'ssc' ),
            'icon' => 'ssc-icon-12',
            'is_container' => true,
            'category' => 'SecretLab',
            'css_box' => true,
            'params' => array(
                esc_html__( 'General', 'ssc' ) => array(
                    array(
                        'type'  => 'text',
                        'label' => esc_html__(  'Title', 'ssc' ),
                        'name'  => 'title',
                    ),
                    array(
                        'name'        => 'slug',
                        'type'        => 'select',
                        'label'       => esc_html__(  'Select Contact Form', 'ssc' ),
                        'admin_label' => true,
                        'options'     => $contact_forms,
                        'description' => esc_html__(  'Choose previously created contact form from the drop down list.', 'ssc' )
                    ),
                    array(
                        'type'  => 'text',
                        'label' => esc_html__(  'Extra Class', 'ssc' ),
                        'name'  => 'el_class',
                        'value' => '',
                    )

                ),
                // Styling
                //Styling
                esc_html__( 'styling', 'ssc' ) => array(
                    array(
                        'name' => 'my-css',
                        'label' => esc_html__( 'Styling', 'ssc' ),
                        'type' => 'css',
                        'value' => '{`kc-css`:{`any`:{`label`:{`color|label`:`#949494`},`input`:{`font-size|.wpcf7-text`:`14px`,`margin|.wpcf7-text`:`inherit inherit 20px inherit`},`text-area`:{`font-size|.wpcf7-textarea`:`14px`,`margin|.wpcf7-textarea`:`inherit inherit 15px inherit`},`radio-checkbox`:{`color|.wpcf7-radio .wpcf7-list-item-label, .wpcf7-checkbox .wpcf7-list-item-label`:`#768188`},`submit`:{`color|.wpcf7-submit`:`#ffffff`,`background|.wpcf7-submit`:`eyJjb2xvciI6IiMwMDgzZGIiLCJsaW5lYXJHcmFkaWVudCI6WyIiXSwiaW1hZ2UiOiJub25lIiwicG9zaXRpb24iOiIwJSAwJSIsInNpemUiOiJhdXRvIiwicmVwZWF0IjoicmVwZWF0IiwiYXR0YWNobWVudCI6InNjcm9sbCIsImFkdmFuY2VkIjowfQ==`,`font-family|.wpcf7-submit`:`Roboto`,`font-size|.wpcf7-submit`:`14px`,`line-height|.wpcf7-submit`:`14px`,`font-weight|.wpcf7-submit`:`700`,`text-align|.wpcf7-submit`:`center`,`text-transform|.wpcf7-submit`:`uppercase`,`border|.wpcf7-submit`:`2px solid #0083db`,`border-radius|.wpcf7-submit`:`0px 0px 0px 0px`,`margin|.wpcf7-submit`:`25px auto inherit auto`,`padding|.wpcf7-submit`:`16px 50px 16px 50px`}}}}', // remove this if you do not need a default content
                        'description' => esc_html__( 'Styles', 'ssc' ),
                        'options' => array(
                            array(
                                'screens' => "any",
                                'Box' => array(
                                    array('property' => 'text-align', 'label' => esc_html__( 'Text Align', 'ssc' )),
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
                                'Title' => array(
                                    array('property' => 'color', 'label' => esc_html__( 'Color', 'ssc' ), 'selector' => 'h2'),
                                    array('property' => 'background', 'label' => esc_html__( 'Background Color', 'ssc' ), 'selector' => 'h2'),
                                    array('property' => 'font-family', 'label' => esc_html__( 'Font Family', 'ssc' ), 'selector' => 'h2'),
                                    array('property' => 'font-size', 'label' => esc_html__( 'Font Size', 'ssc' ), 'selector' => 'h2'),
                                    array('property' => 'line-height', 'label' => esc_html__( 'Line Height', 'ssc' ), 'selector' => 'h2'),
                                    array('property' => 'font-weight', 'label' => esc_html__( 'Font Weight', 'ssc' ), 'selector' => 'h2'),
                                    array('property' => 'text-align', 'selector' => 'h2'),
                                    array('property' => 'text-transform', 'label' => esc_html__( 'Text Transform', 'ssc' ), 'selector' => 'h2'),
                                    array('property' => 'margin', 'label' => esc_html__( 'Margin', 'ssc' ), 'selector' => 'h2'),
                                    array('property' => 'padding', 'label' => esc_html__( 'Padding', 'ssc' ), 'selector' => 'h2'),
                                ),
                                'Label' => array(
                                    array('property' => 'color', 'label' => esc_html__( 'Color', 'ssc' ), 'selector' => 'label'),
                                    array('property' => 'background', 'label' => esc_html__( 'Background Color', 'ssc' ), 'selector' => 'label'),
                                    array('property' => 'font-family', 'label' => esc_html__( 'Font Family', 'ssc' ), 'selector' => 'label'),
                                    array('property' => 'font-size', 'label' => esc_html__( 'Font Size', 'ssc' ), 'selector' => 'label'),
                                    array('property' => 'line-height', 'label' => esc_html__( 'Line Height', 'ssc' ), 'selector' => 'label'),
                                    array('property' => 'font-weight', 'label' => esc_html__( 'Font Weight', 'ssc' ), 'selector' => 'label'),
                                    array('property' => 'text-align', 'selector' => 'label'),
                                    array('property' => 'text-transform', 'label' => esc_html__( 'Text Transform', 'ssc' ), 'selector' => 'label'),
                                    array('property' => 'display', 'label' => esc_html__( 'Display', 'ssc' ), 'selector' => 'label'),
                                    array('property' => 'float', 'label' => esc_html__( 'Float', 'ssc' ), 'selector' => 'label'),
                                    array('property' => 'margin', 'label' => esc_html__( 'Margin', 'ssc' ), 'selector' => 'label'),
                                    array('property' => 'padding', 'label' => esc_html__( 'Padding', 'ssc' ), 'selector' => 'label'),

                                ),
                                'Input' => array(
                                    array('property' => 'color', 'label' => esc_html__( 'Color', 'ssc' ), 'selector' => '.wpcf7-text'),
                                    array('property' => 'background', 'label' => esc_html__( 'Background Color', 'ssc' ), 'selector' => '.wpcf7-text'),
                                    array('property' => 'font-family', 'label' => esc_html__( 'Font Family', 'ssc' ), 'selector' => '.wpcf7-text'),
                                    array('property' => 'font-size', 'label' => esc_html__( 'Font Size', 'ssc' ), 'selector' => '.wpcf7-text'),
                                    array('property' => 'line-height', 'label' => esc_html__( 'Line Height', 'ssc' ), 'selector' => '.wpcf7-text'),
                                    array('property' => 'font-weight', 'label' => esc_html__( 'Font Weight', 'ssc' ), 'selector' => '.wpcf7-text'),
                                    array('property' => 'text-align', 'selector' => '.wpcf7-text'),
                                    array('property' => 'text-transform', 'label' => esc_html__( 'Text Transform', 'ssc' ), 'selector' => '.wpcf7-text'),
                                    array('property' => 'width', 'selector' => '.wpcf7-text'),
                                    array('property' => 'height', 'selector' => '.wpcf7-text'),
                                    array('property' => 'border', 'selector' => '.wpcf7-text'),
                                    array('property' => 'border-radius', 'selector' => '.wpcf7-text'),
                                    array('property' => 'margin', 'label' => esc_html__( 'Margin', 'ssc' ), 'selector' => '.wpcf7-text'),
                                    array('property' => 'padding', 'selector' => '.wpcf7-text'),
                                ),
                                'Text Area' => array(
                                    array('property' => 'color', 'label' => esc_html__( 'Color', 'ssc' ), 'selector' => '.wpcf7-textarea'),
                                    array('property' => 'background', 'label' => esc_html__( 'Background Color', 'ssc' ), 'selector' => '.wpcf7-textarea'),
                                    array('property' => 'font-family', 'label' => esc_html__( 'Font Family', 'ssc' ), 'selector' => '.wpcf7-textarea'),
                                    array('property' => 'font-size', 'label' => esc_html__( 'Font Size', 'ssc' ), 'selector' => '.wpcf7-textarea'),
                                    array('property' => 'line-height', 'label' => esc_html__( 'Line Height', 'ssc' ), 'selector' => '.wpcf7-textarea'),
                                    array('property' => 'font-weight', 'label' => esc_html__( 'Font Weight', 'ssc' ), 'selector' => '.wpcf7-textarea'),
                                    array('property' => 'text-align', 'selector' => '.wpcf7-textarea'),
                                    array('property' => 'text-transform', 'label' => esc_html__( 'Text Transform', 'ssc' ), 'selector' => '.wpcf7-textarea'),
                                    array('property' => 'width', 'selector' => '.wpcf7-textarea'),
                                    array('property' => 'height', 'selector' => '.wpcf7-textarea'),
                                    array('property' => 'border', 'selector' => '.wpcf7-textarea'),
                                    array('property' => 'border-radius', 'selector' => '.wpcf7-textarea'),
                                    array('property' => 'margin', 'label' => esc_html__( 'Margin', 'ssc' ), 'selector' => '.wpcf7-textarea'),
                                    array('property' => 'padding', 'selector' => '.wpcf7-textarea'),
                                ),

                                'Select' => array(
                                    array('property' => 'color', 'label' => esc_html__( 'Color', 'ssc' ), 'selector' => '.wpcf7-select'),
                                    array('property' => 'background', 'label' => esc_html__( 'Background Color', 'ssc' ), 'selector' => '.wpcf7-select'),
                                    array('property' => 'font-family', 'label' => esc_html__( 'Font Family', 'ssc' ), 'selector' => '.wpcf7-select'),
                                    array('property' => 'font-size', 'label' => esc_html__( 'Font Size', 'ssc' ), 'selector' => '.wpcf7-select'),
                                    array('property' => 'line-height', 'label' => esc_html__( 'Line Height', 'ssc' ), 'selector' => '.wpcf7-select'),
                                    array('property' => 'font-weight', 'label' => esc_html__( 'Font Weight', 'ssc' ), 'selector' => '.wpcf7-select'),
                                    array('property' => 'text-align', 'selector' => '.wpcf7-select'),
                                    array('property' => 'text-transform', 'label' => esc_html__( 'Text Transform', 'ssc' ), 'selector' => '.wpcf7-select'),
                                    array('property' => 'width', 'selector' => '.wpcf7-select'),
                                    array('property' => 'height', 'selector' => '.wpcf7-select'),
                                    array('property' => 'border', 'selector' => '.wpcf7-select'),
                                    array('property' => 'border-radius', 'selector' => '.wpcf7-select'),
                                    array('property' => 'margin', 'label' => esc_html__( 'Margin', 'ssc' ), 'selector' => '.wpcf7-select'),
                                    array('property' => 'padding', 'selector' => '.wpcf7-select'),
                                ),
                                'Radio - Checkbox' => array(
                                    array('property' => 'color', 'selector' => '.wpcf7-radio .wpcf7-list-item-label, .wpcf7-checkbox .wpcf7-list-item-label'),
                                    array('property' => 'background-color', 'selector' => '.wpcf7-radio .wpcf7-list-item-label, .wpcf7-checkbox .wpcf7-list-item-label'),
                                    array('property' => 'display', 'selector' => '.wpcf7-radio .wpcf7-list-item-label, .wpcf7-checkbox .wpcf7-list-item-label'),
                                    array('property' => 'font-family', 'label' => esc_html__( 'Font Family', 'ssc' ), 'selector' => '.wpcf7-radio .wpcf7-list-item-label, .wpcf7-checkbox .wpcf7-list-item-label'),
                                    array('property' => 'font-size', 'label' => esc_html__( 'Font Size', 'ssc' ), 'selector' => '.wpcf7-radio .wpcf7-list-item-label, .wpcf7-checkbox .wpcf7-list-item-label'),
                                    array('property' => 'line-height', 'label' => esc_html__( 'Line Height', 'ssc' ), 'selector' => '.wpcf7-radio .wpcf7-list-item-label, .wpcf7-checkbox .wpcf7-list-item-label'),
                                    array('property' => 'font-weight', 'label' => esc_html__( 'Font Weight', 'ssc' ), 'selector' => '.wpcf7-radio .wpcf7-list-item-label, .wpcf7-checkbox .wpcf7-list-item-label'),
                                    array('property' => 'text-align', 'selector' => '.wpcf7-radio .wpcf7-list-item-label, .wpcf7-checkbox .wpcf7-list-item-label'),
                                    array('property' => 'text-transform', 'label' => esc_html__( 'Text Transform', 'ssc' ), 'selector' => '.wpcf7-radio .wpcf7-list-item-label, .wpcf7-checkbox .wpcf7-list-item-label'),
                                    array('property' => 'margin', 'label' => esc_html__( 'Margin', 'ssc' ), 'selector' => '.wpcf7-radio .wpcf7-list-item-label, .wpcf7-checkbox .wpcf7-list-item-label'),
                                    array('property' => 'padding', 'label' => esc_html__( 'Padding', 'ssc' ), 'selector' => '.wpcf7-radio .wpcf7-list-item-label, .wpcf7-checkbox .wpcf7-list-item-label'),
                                ),

                                'Submit' => array(
                                    array('property' => 'color', 'selector' => '.wpcf7-submit'),
                                    array('property' => 'background', 'selector' => '.wpcf7-submit'),
                                    array('property' => 'display', 'selector' => '.wpcf7-submit'),
                                    array('property' => 'width', 'label' => esc_html__( 'Width', 'ssc' ), 'selector' => '.wpcf7-submit'),
                                    array('property' => 'height', 'label' => esc_html__( 'Height', 'ssc' ), 'selector' => '.wpcf7-submit'),
                                    array('property' => 'font-family', 'label' => esc_html__( 'Font Family', 'ssc' ), 'selector' => '.wpcf7-submit'),
                                    array('property' => 'font-size', 'label' => esc_html__( 'Font Size', 'ssc' ), 'selector' => '.wpcf7-submit'),
                                    array('property' => 'line-height', 'label' => esc_html__( 'Line Height', 'ssc' ), 'selector' => '.wpcf7-submit'),
                                    array('property' => 'font-weight', 'label' => esc_html__( 'Font Weight', 'ssc' ), 'selector' => '.wpcf7-submit'),
                                    array('property' => 'text-align', 'selector' => '.wpcf7-submit'),
                                    array('property' => 'text-transform', 'label' => esc_html__( 'Text Transform', 'ssc' ), 'selector' => '.wpcf7-submit'),
                                    array('property' => 'border', 'label' => esc_html__( 'Border', 'ssc' ), 'selector' => '.wpcf7-submit'),
                                    array('property' => 'border-radius', 'label' => esc_html__( 'Border Radius', 'ssc' ), 'selector' => '.wpcf7-submit'),
                                    array('property' => 'margin', 'label' => esc_html__( 'Margin', 'ssc' ), 'selector' => '.wpcf7-submit'),
                                    array('property' => 'padding', 'label' => esc_html__( 'Padding', 'ssc' ), 'selector' => '.wpcf7-submit'),
                                )

                            ),
                            array(
                                "screens" => "999,768,667,479",
                                'Box' => array(
                                    array('property' => 'text-align', 'label' => esc_html__( 'Text Align', 'ssc' )),
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
                                    'Title' => array(
                                        array('property' => 'color', 'label' => esc_html__( 'Color', 'ssc' ), 'selector' => 'h2'),
                                        array('property' => 'background', 'label' => esc_html__( 'Background Color', 'ssc' ), 'selector' => 'h2'),
                                        array('property' => 'font-family', 'label' => esc_html__( 'Font Family', 'ssc' ), 'selector' => 'h2'),
                                        array('property' => 'font-size', 'label' => esc_html__( 'Font Size', 'ssc' ), 'selector' => 'h2'),
                                        array('property' => 'line-height', 'label' => esc_html__( 'Line Height', 'ssc' ), 'selector' => 'h2'),
                                        array('property' => 'font-weight', 'label' => esc_html__( 'Font Weight', 'ssc' ), 'selector' => 'h2'),
                                        array('property' => 'text-align', 'selector' => 'h2'),
                                        array('property' => 'text-transform', 'label' => esc_html__( 'Text Transform', 'ssc' ), 'selector' => 'h2'),
                                        array('property' => 'margin', 'label' => esc_html__( 'Margin', 'ssc' ), 'selector' => 'h2'),
                                        array('property' => 'padding', 'label' => esc_html__( 'Padding', 'ssc' ), 'selector' => 'h2'),
                                    ),
                                ),
                                'Label' => array(
                                    array('property' => 'color', 'label' => esc_html__( 'Color', 'ssc' ), 'selector' => 'label'),
                                    array('property' => 'background', 'label' => esc_html__( 'Background Color', 'ssc' ), 'selector' => 'label'),
                                    array('property' => 'font-family', 'label' => esc_html__( 'Font Family', 'ssc' ), 'selector' => 'label'),
                                    array('property' => 'font-size', 'label' => esc_html__( 'Font Size', 'ssc' ), 'selector' => 'label'),
                                    array('property' => 'line-height', 'label' => esc_html__( 'Line Height', 'ssc' ), 'selector' => 'label'),
                                    array('property' => 'font-weight', 'label' => esc_html__( 'Font Weight', 'ssc' ), 'selector' => 'label'),
                                    array('property' => 'text-align', 'selector' => 'label'),
                                    array('property' => 'text-transform', 'label' => esc_html__( 'Text Transform', 'ssc' ), 'selector' => 'label'),
                                    array('property' => 'display', 'label' => esc_html__( 'Display', 'ssc' ), 'selector' => 'label'),
                                    array('property' => 'float', 'label' => esc_html__( 'Float', 'ssc' ), 'selector' => 'label'),
                                    array('property' => 'margin', 'label' => esc_html__( 'Margin', 'ssc' ), 'selector' => 'label'),
                                    array('property' => 'padding', 'label' => esc_html__( 'Padding', 'ssc' ), 'selector' => 'label'),
                                ),
                                'Input' => array(
                                    array('property' => 'color', 'label' => esc_html__( 'Color', 'ssc' ), 'selector' => '.wpcf7-text'),
                                    array('property' => 'background', 'label' => esc_html__( 'Background Color', 'ssc' ), 'selector' => '.wpcf7-text'),
                                    array('property' => 'font-family', 'label' => esc_html__( 'Font Family', 'ssc' ), 'selector' => '.wpcf7-text'),
                                    array('property' => 'font-size', 'label' => esc_html__( 'Font Size', 'ssc' ), 'selector' => '.wpcf7-text'),
                                    array('property' => 'line-height', 'label' => esc_html__( 'Line Height', 'ssc' ), 'selector' => '.wpcf7-text'),
                                    array('property' => 'font-weight', 'label' => esc_html__( 'Font Weight', 'ssc' ), 'selector' => '.wpcf7-text'),
                                    array('property' => 'text-align', 'selector' => '.wpcf7-text'),
                                    array('property' => 'text-transform', 'label' => esc_html__( 'Text Transform', 'ssc' ), 'selector' => '.wpcf7-text'),
                                    array('property' => 'width', 'selector' => '.wpcf7-text'),
                                    array('property' => 'height', 'selector' => '.wpcf7-text'),
                                    array('property' => 'border', 'selector' => '.wpcf7-text'),
                                    array('property' => 'border-radius', 'selector' => '.wpcf7-text'),
                                    array('property' => 'margin', 'label' => esc_html__( 'Margin', 'ssc' ), 'selector' => '.wpcf7-text'),
                                    array('property' => 'padding', 'selector' => '.wpcf7-text'),
                                ),
                                'Text Area' => array(
                                    array('property' => 'color', 'label' => esc_html__( 'Color', 'ssc' ), 'selector' => '.wpcf7-textarea'),
                                    array('property' => 'background', 'label' => esc_html__( 'Background Color', 'ssc' ), 'selector' => '.wpcf7-textarea'),
                                    array('property' => 'font-family', 'label' => esc_html__( 'Font Family', 'ssc' ), 'selector' => '.wpcf7-textarea'),
                                    array('property' => 'font-size', 'label' => esc_html__( 'Font Size', 'ssc' ), 'selector' => '.wpcf7-textarea'),
                                    array('property' => 'line-height', 'label' => esc_html__( 'Line Height', 'ssc' ), 'selector' => '.wpcf7-textarea'),
                                    array('property' => 'font-weight', 'label' => esc_html__( 'Font Weight', 'ssc' ), 'selector' => '.wpcf7-textarea'),
                                    array('property' => 'text-align', 'selector' => '.wpcf7-textarea'),
                                    array('property' => 'text-transform', 'label' => esc_html__( 'Text Transform', 'ssc' ), 'selector' => '.wpcf7-textarea'),
                                    array('property' => 'width', 'selector' => '.wpcf7-textarea'),
                                    array('property' => 'height', 'selector' => '.wpcf7-textarea'),
                                    array('property' => 'border', 'selector' => '.wpcf7-textarea'),
                                    array('property' => 'border-radius', 'selector' => '.wpcf7-textarea'),
                                    array('property' => 'margin', 'label' => esc_html__( 'Margin', 'ssc' ), 'selector' => '.wpcf7-textarea'),
                                    array('property' => 'padding', 'selector' => '.wpcf7-textarea'),
                                ),

                                'Select' => array(
                                    array('property' => 'color', 'label' => esc_html__( 'Color', 'ssc' ), 'selector' => '.wpcf7-select'),
                                    array('property' => 'background', 'label' => esc_html__( 'Background Color', 'ssc' ), 'selector' => '.wpcf7-select'),
                                    array('property' => 'font-family', 'label' => esc_html__( 'Font Family', 'ssc' ), 'selector' => '.wpcf7-select'),
                                    array('property' => 'font-size', 'label' => esc_html__( 'Font Size', 'ssc' ), 'selector' => '.wpcf7-select'),
                                    array('property' => 'line-height', 'label' => esc_html__( 'Line Height', 'ssc' ), 'selector' => '.wpcf7-select'),
                                    array('property' => 'font-weight', 'label' => esc_html__( 'Font Weight', 'ssc' ), 'selector' => '.wpcf7-select'),
                                    array('property' => 'text-align', 'selector' => '.wpcf7-select'),
                                    array('property' => 'text-transform', 'label' => esc_html__( 'Text Transform', 'ssc' ), 'selector' => '.wpcf7-select'),
                                    array('property' => 'width', 'selector' => '.wpcf7-select'),
                                    array('property' => 'height', 'selector' => '.wpcf7-select'),
                                    array('property' => 'border', 'selector' => '.wpcf7-select'),
                                    array('property' => 'border-radius', 'selector' => '.wpcf7-select'),
                                    array('property' => 'margin', 'label' => esc_html__( 'Margin', 'ssc' ), 'selector' => '.wpcf7-select'),
                                    array('property' => 'padding', 'selector' => '.wpcf7-select'),
                                ),
                                'Radio - Checkbox' => array(
                                    array('property' => 'color', 'selector' => '.wpcf7-radio .wpcf7-list-item-label, .wpcf7-checkbox .wpcf7-list-item-label'),
                                    array('property' => 'background-color', 'selector' => '.wpcf7-radio .wpcf7-list-item-label, .wpcf7-checkbox .wpcf7-list-item-label'),
                                    array('property' => 'display', 'selector' => '.wpcf7-radio .wpcf7-list-item-label, .wpcf7-checkbox .wpcf7-list-item-label'),
                                    array('property' => 'font-family', 'label' => esc_html__( 'Font Family', 'ssc' ), 'selector' => '.wpcf7-radio .wpcf7-list-item-label, .wpcf7-checkbox .wpcf7-list-item-label'),
                                    array('property' => 'font-size', 'label' => esc_html__( 'Font Size', 'ssc' ), 'selector' => '.wpcf7-radio .wpcf7-list-item-label, .wpcf7-checkbox .wpcf7-list-item-label'),
                                    array('property' => 'line-height', 'label' => esc_html__( 'Line Height', 'ssc' ), 'selector' => '.wpcf7-radio .wpcf7-list-item-label, .wpcf7-checkbox .wpcf7-list-item-label'),
                                    array('property' => 'font-weight', 'label' => esc_html__( 'Font Weight', 'ssc' ), 'selector' => '.wpcf7-radio .wpcf7-list-item-label, .wpcf7-checkbox .wpcf7-list-item-label'),
                                    array('property' => 'text-align', 'selector' => '.wpcf7-radio .wpcf7-list-item-label, .wpcf7-checkbox .wpcf7-list-item-label'),
                                    array('property' => 'text-transform', 'label' => esc_html__( 'Text Transform', 'ssc' ), 'selector' => '.wpcf7-radio .wpcf7-list-item-label, .wpcf7-checkbox .wpcf7-list-item-label'),
                                    array('property' => 'margin', 'label' => esc_html__( 'Margin', 'ssc' ), 'selector' => '.wpcf7-radio .wpcf7-list-item-label, .wpcf7-checkbox .wpcf7-list-item-label'),
                                    array('property' => 'padding', 'label' => esc_html__( 'Padding', 'ssc' ), 'selector' => '.wpcf7-radio .wpcf7-list-item-label, .wpcf7-checkbox .wpcf7-list-item-label'),
                                ),

                                'Submit' => array(
                                    array('property' => 'color', 'selector' => '.wpcf7-submit'),
                                    array('property' => 'background', 'selector' => '.wpcf7-submit'),
                                    array('property' => 'display', 'selector' => '.wpcf7-submit'),
                                    array('property' => 'width', 'label' => esc_html__( 'Width', 'ssc' ), 'selector' => '.wpcf7-submit'),
                                    array('property' => 'height', 'label' => esc_html__( 'Height', 'ssc' ), 'selector' => '.wpcf7-submit'),
                                    array('property' => 'font-family', 'label' => esc_html__( 'Font Family', 'ssc' ), 'selector' => '.wpcf7-submit'),
                                    array('property' => 'font-size', 'label' => esc_html__( 'Font Size', 'ssc' ), 'selector' => '.wpcf7-submit'),
                                    array('property' => 'line-height', 'label' => esc_html__( 'Line Height', 'ssc' ), 'selector' => '.wpcf7-submit'),
                                    array('property' => 'font-weight', 'label' => esc_html__( 'Font Weight', 'ssc' ), 'selector' => '.wpcf7-submit'),
                                    array('property' => 'text-align', 'selector' => '.wpcf7-submit'),
                                    array('property' => 'text-transform', 'label' => esc_html__( 'Text Transform', 'ssc' ), 'selector' => '.wpcf7-submit'),
                                    array('property' => 'border', 'label' => esc_html__( 'Border', 'ssc' ), 'selector' => '.wpcf7-submit'),
                                    array('property' => 'border-radius', 'label' => esc_html__( 'Border Radius', 'ssc' ), 'selector' => '.wpcf7-submit'),
                                    array('property' => 'margin', 'label' => esc_html__( 'Margin', 'ssc' ), 'selector' => '.wpcf7-submit'),
                                    array('property' => 'padding', 'label' => esc_html__( 'Padding', 'ssc' ), 'selector' => '.wpcf7-submit'),
                                )

                            )
                        )
                    )
                ),
                esc_html__( 'hover', 'ssc' ) => array(
                    array(
                        'name' => 'hover-css',
                        'label' => esc_html__( 'Hover', 'ssc' ),
                        'type' => 'css',
                        'value' => '{`kc-css`:{`any`:{`submit`:{`color|.wpcf7-submit:hover`:`#2c3840`,`background|.wpcf7-submit:hover`:`eyJjb2xvciI6IiNmZmJkMDAiLCJsaW5lYXJHcmFkaWVudCI6WyIiXSwiaW1hZ2UiOiJub25lIiwicG9zaXRpb24iOiIwJSAwJSIsInNpemUiOiJhdXRvIiwicmVwZWF0IjoicmVwZWF0IiwiYXR0YWNobWVudCI6InNjcm9sbCIsImFkdmFuY2VkIjowfQ==`,`border|.wpcf7-submit:hover`:`2px solid #ffbd00`}}}}', // remove this if you do not need a default content
                        'description' => esc_html__( 'Styles for Hover Condition', 'ssc' ),
                        'options' => array(
                            array(
                                'screens' => "any",
                                'Box' => array(
                                    array('property' => 'text-align', 'label' => esc_html__( 'Text Align', 'ssc' ), 'selector' => ':hover'),
                                    array('property' => 'background', 'selector' => ':hover'),
                                    array('property' => 'display', 'label' => esc_html__( 'Display', 'ssc' ), 'selector' => ':hover'),
                                    array('property' => 'float', 'label' => esc_html__( 'Float', 'ssc' ), 'selector' => ':hover'),
                                    array('property' => 'width', 'label' => esc_html__( 'Width', 'ssc' ), 'selector' => ':hover'),
                                    array('property' => 'height', 'label' => esc_html__( 'Height', 'ssc' ), 'selector' => ':hover'),
                                    array('property' => 'box-shadow', 'label' => esc_html__( 'Box Shadow', 'ssc' ), 'selector' => ':hover'),
                                    array('property' => 'opacity', 'label' => esc_html__( 'Opacity', 'ssc' ), 'selector' => ':hover'),
                                    array('property' => 'margin', 'label' => esc_html__( 'Margin', 'ssc' ), 'selector' => ':hover'),
                                    array('property' => 'padding', 'label' => esc_html__( 'Padding', 'ssc' ), 'selector' => ':hover'),
                                    array('property' => 'border', 'label' => esc_html__( 'Border', 'ssc' ), 'selector' => ':hover'),
                                    array('property' => 'border-radius', 'label' => esc_html__( 'Border Radius', 'ssc' ), 'selector' => ':hover'),
                                ),
                                'Title' => array(
                                    array('property' => 'color', 'label' => esc_html__( 'Color', 'ssc' ), 'selector' => ':hover h2'),
                                    array('property' => 'background', 'label' => esc_html__( 'Background Color', 'ssc' ), 'selector' => ':hover h2'),
                                    array('property' => 'font-family', 'label' => esc_html__( 'Font Family', 'ssc' ), 'selector' => ':hover h2'),
                                    array('property' => 'font-size', 'label' => esc_html__( 'Font Size', 'ssc' ), 'selector' => ':hover h2'),
                                    array('property' => 'line-height', 'label' => esc_html__( 'Line Height', 'ssc' ), 'selector' => ':hover h2'),
                                    array('property' => 'font-weight', 'label' => esc_html__( 'Font Weight', 'ssc' ), 'selector' => ':hover h2'),
                                    array('property' => 'text-align', 'selector' => ':hover h2'),
                                    array('property' => 'text-transform', 'label' => esc_html__( 'Text Transform', 'ssc' ), 'selector' => ':hover h2'),
                                    array('property' => 'margin', 'label' => esc_html__( 'Margin', 'ssc' ), 'selector' => ':hover h2'),
                                    array('property' => 'padding', 'label' => esc_html__( 'Padding', 'ssc' ), 'selector' => ':hover h2'),
                                ),
                                'Label' => array(
                                    array('property' => 'color', 'label' => esc_html__( 'Color', 'ssc' ), 'selector' => 'label:hover'),
                                    array('property' => 'background', 'label' => esc_html__( 'Background Color', 'ssc' ), 'selector' => 'label:hover'),
                                    array('property' => 'font-family', 'label' => esc_html__( 'Font Family', 'ssc' ), 'selector' => 'label:hover'),
                                    array('property' => 'font-size', 'label' => esc_html__( 'Font Size', 'ssc' ), 'selector' => 'label:hover'),
                                    array('property' => 'line-height', 'label' => esc_html__( 'Line Height', 'ssc' ), 'selector' => 'label:hover'),
                                    array('property' => 'font-weight', 'label' => esc_html__( 'Font Weight', 'ssc' ), 'selector' => 'label:hover'),
                                    array('property' => 'text-align', 'selector' => 'label:hover'),
                                    array('property' => 'text-transform', 'label' => esc_html__( 'Text Transform', 'ssc' ), 'selector' => 'label:hover'),
                                    array('property' => 'display', 'label' => esc_html__( 'Display', 'ssc' ), 'selector' => 'label:hover'),
                                    array('property' => 'float', 'label' => esc_html__( 'Float', 'ssc' ), 'selector' => 'label:hover'),
                                    array('property' => 'margin', 'label' => esc_html__( 'Margin', 'ssc' ), 'selector' => 'label:hover'),
                                    array('property' => 'padding', 'label' => esc_html__( 'Padding', 'ssc' ), 'selector' => 'label:hover'),
                                ),
                                'Input' => array(
                                    array('property' => 'color', 'label' => esc_html__( 'Color', 'ssc' ), 'selector' => '.wpcf7-text:hover'),
                                    array('property' => 'background', 'label' => esc_html__( 'Background Color', 'ssc' ), 'selector' => '.wpcf7-text:hover'),
                                    array('property' => 'font-family', 'label' => esc_html__( 'Font Family', 'ssc' ), 'selector' => '.wpcf7-text:hover'),
                                    array('property' => 'font-size', 'label' => esc_html__( 'Font Size', 'ssc' ), 'selector' => '.wpcf7-text:hover'),
                                    array('property' => 'line-height', 'label' => esc_html__( 'Line Height', 'ssc' ), 'selector' => '.wpcf7-text:hover'),
                                    array('property' => 'font-weight', 'label' => esc_html__( 'Font Weight', 'ssc' ), 'selector' => '.wpcf7-text:hover'),
                                    array('property' => 'text-align', 'selector' => '.wpcf7-text:hover'),
                                    array('property' => 'text-transform', 'label' => esc_html__( 'Text Transform', 'ssc' ), 'selector' => '.wpcf7-text:hover'),
                                    array('property' => 'width', 'selector' => '.wpcf7-text:hover'),
                                    array('property' => 'height', 'selector' => '.wpcf7-text:hover'),
                                    array('property' => 'border', 'selector' => '.wpcf7-text:hover'),
                                    array('property' => 'border-radius', 'selector' => '.wpcf7-text:hover'),
                                    array('property' => 'margin', 'label' => esc_html__( 'Margin', 'ssc' ), 'selector' => '.wpcf7-text:hover'),
                                    array('property' => 'padding', 'selector' => '.wpcf7-text:hover'),
                                ),
                                'Text Area' => array(
                                    array('property' => 'color', 'label' => esc_html__( 'Color', 'ssc' ), 'selector' => '.wpcf7-textarea:hover'),
                                    array('property' => 'background', 'label' => esc_html__( 'Background Color', 'ssc' ), 'selector' => '.wpcf7-textarea:hover'),
                                    array('property' => 'font-family', 'label' => esc_html__( 'Font Family', 'ssc' ), 'selector' => '.wpcf7-textarea:hover'),
                                    array('property' => 'font-size', 'label' => esc_html__( 'Font Size', 'ssc' ), 'selector' => '.wpcf7-textarea:hover'),
                                    array('property' => 'line-height', 'label' => esc_html__( 'Line Height', 'ssc' ), 'selector' => '.wpcf7-textarea:hover'),
                                    array('property' => 'font-weight', 'label' => esc_html__( 'Font Weight', 'ssc' ), 'selector' => '.wpcf7-textarea:hover'),
                                    array('property' => 'text-align', 'selector' => '.wpcf7-textarea:hover'),
                                    array('property' => 'text-transform', 'label' => esc_html__( 'Text Transform', 'ssc' ), 'selector' => '.wpcf7-textarea:hover'),
                                    array('property' => 'width', 'selector' => '.wpcf7-textarea:hover'),
                                    array('property' => 'height', 'selector' => '.wpcf7-textarea:hover'),
                                    array('property' => 'border', 'selector' => '.wpcf7-textarea:hover'),
                                    array('property' => 'border-radius', 'selector' => '.wpcf7-textarea:hover'),
                                    array('property' => 'margin', 'label' => esc_html__( 'Margin', 'ssc' ), 'selector' => '.wpcf7-textarea:hover'),
                                    array('property' => 'padding', 'selector' => '.wpcf7-textarea:hover'),
                                ),

                                'Select' => array(
                                    array('property' => 'color', 'label' => esc_html__( 'Color', 'ssc' ), 'selector' => '.wpcf7-select:hover'),
                                    array('property' => 'background', 'label' => esc_html__( 'Background Color', 'ssc' ), 'selector' => '.wpcf7-select:hover'),
                                    array('property' => 'font-family', 'label' => esc_html__( 'Font Family', 'ssc' ), 'selector' => '.wpcf7-select:hover'),
                                    array('property' => 'font-size', 'label' => esc_html__( 'Font Size', 'ssc' ), 'selector' => '.wpcf7-select:hover'),
                                    array('property' => 'line-height', 'label' => esc_html__( 'Line Height', 'ssc' ), 'selector' => '.wpcf7-select:hover'),
                                    array('property' => 'font-weight', 'label' => esc_html__( 'Font Weight', 'ssc' ), 'selector' => '.wpcf7-select:hover'),
                                    array('property' => 'text-align', 'selector' => '.wpcf7-select:hover'),
                                    array('property' => 'text-transform', 'label' => esc_html__( 'Text Transform', 'ssc' ), 'selector' => '.wpcf7-select:hover'),
                                    array('property' => 'width', 'selector' => '.wpcf7-select:hover'),
                                    array('property' => 'height', 'selector' => '.wpcf7-select:hover'),
                                    array('property' => 'border', 'selector' => '.wpcf7-select:hover'),
                                    array('property' => 'border-radius', 'selector' => '.wpcf7-select:hover'),
                                    array('property' => 'margin', 'label' => esc_html__( 'Margin', 'ssc' ), 'selector' => '.wpcf7-select:hover'),
                                    array('property' => 'padding', 'selector' => '.wpcf7-select:hover'),
                                ),
                                'Radio - Checkbox' => array(
                                    array('property' => 'color', 'selector' => '.wpcf7-radio:hover .wpcf7-list-item-label, .wpcf7-checkbox:hover .wpcf7-list-item-label'),
                                    array('property' => 'background-color', 'selector' => '.wpcf7-radio:hover .wpcf7-list-item-label, .wpcf7-checkbox:hover .wpcf7-list-item-label'),
                                    array('property' => 'display', 'selector' => '.wpcf7-radio:hover .wpcf7-list-item-label, .wpcf7-checkbox:hover .wpcf7-list-item-label'),
                                    array('property' => 'font-family', 'label' => esc_html__( 'Font Family', 'ssc' ), 'selector' => '.wpcf7-radio:hover .wpcf7-list-item-label, .wpcf7-checkbox:hover .wpcf7-list-item-label'),
                                    array('property' => 'font-size', 'label' => esc_html__( 'Font Size', 'ssc' ), 'selector' => '.wpcf7-radio:hover .wpcf7-list-item-label, .wpcf7-checkbox:hover .wpcf7-list-item-label'),
                                    array('property' => 'line-height', 'label' => esc_html__( 'Line Height', 'ssc' ), 'selector' => '.wpcf7-radio:hover .wpcf7-list-item-label, .wpcf7-checkbox:hover .wpcf7-list-item-label'),
                                    array('property' => 'font-weight', 'label' => esc_html__( 'Font Weight', 'ssc' ), 'selector' => '.wpcf7-radio:hover .wpcf7-list-item-label, .wpcf7-checkbox:hover .wpcf7-list-item-label'),
                                    array('property' => 'text-align', 'selector' => '.wpcf7-radio:hover .wpcf7-list-item-label, .wpcf7-checkbox:hover .wpcf7-list-item-label'),
                                    array('property' => 'text-transform', 'label' => esc_html__( 'Text Transform', 'ssc' ), 'selector' => '.wpcf7-radio:hover .wpcf7-list-item-label, .wpcf7-checkbox:hover .wpcf7-list-item-label'),
                                    array('property' => 'margin', 'label' => esc_html__( 'Margin', 'ssc' ), 'selector' => '.wpcf7-radio:hover .wpcf7-list-item-label, .wpcf7-checkbox:hover .wpcf7-list-item-label'),
                                    array('property' => 'padding', 'label' => esc_html__( 'Padding', 'ssc' ), 'selector' => '.wpcf7-radio:hover .wpcf7-list-item-label, .wpcf7-checkbox:hover .wpcf7-list-item-label'),
                                ),

                                'Submit' => array(
                                    array('property' => 'color', 'selector' => '.wpcf7-submit:hover'),
                                    array('property' => 'background', 'selector' => '.wpcf7-submit:hover'),
                                    array('property' => 'display', 'selector' => '.wpcf7-submit:hover'),
                                    array('property' => 'width', 'label' => esc_html__( 'Width', 'ssc' ), 'selector' => '.wpcf7-submit:hover'),
                                    array('property' => 'font-family', 'label' => esc_html__( 'Font Family', 'ssc' ), 'selector' => '.wpcf7-submit:hover'),
                                    array('property' => 'font-size', 'label' => esc_html__( 'Font Size', 'ssc' ), 'selector' => '.wpcf7-submit:hover'),
                                    array('property' => 'line-height', 'label' => esc_html__( 'Line Height', 'ssc' ), 'selector' => '.wpcf7-submit:hover'),
                                    array('property' => 'font-weight', 'label' => esc_html__( 'Font Weight', 'ssc' ), 'selector' => '.wpcf7-submit:hover'),
                                    array('property' => 'text-align', 'selector' => '.wpcf7-submit:hover'),
                                    array('property' => 'text-transform', 'label' => esc_html__( 'Text Transform', 'ssc' ), 'selector' => '.wpcf7-submit:hover'),
                                    array('property' => 'border', 'label' => esc_html__( 'Border', 'ssc' ), 'selector' => '.wpcf7-submit:hover'),
                                    array('property' => 'border-radius', 'label' => esc_html__( 'Border Radius', 'ssc' ), 'selector' => '.wpcf7-submit:hover'),
                                    array('property' => 'margin', 'label' => esc_html__( 'Margin', 'ssc' ), 'selector' => '.wpcf7-submit:hover'),
                                    array('property' => 'padding', 'label' => esc_html__( 'Padding', 'ssc' ), 'selector' => '.wpcf7-submit:hover'),
                                )

                            ),
                            array(
                                "screens" => "999,768,667,479",
                                'Box' => array(
                                    array('property' => 'text-align', 'label' => esc_html__( 'Text Align', 'ssc' ), 'selector' => ':hover'),
                                    array('property' => 'background', 'selector' => ':hover'),
                                    array('property' => 'display', 'label' => esc_html__( 'Display', 'ssc' ), 'selector' => ':hover'),
                                    array('property' => 'float', 'label' => esc_html__( 'Float', 'ssc' ), 'selector' => ':hover'),
                                    array('property' => 'width', 'label' => esc_html__( 'Width', 'ssc' ), 'selector' => ':hover'),
                                    array('property' => 'height', 'label' => esc_html__( 'Height', 'ssc' ), 'selector' => ':hover'),
                                    array('property' => 'box-shadow', 'label' => esc_html__( 'Box Shadow', 'ssc' ), 'selector' => ':hover'),
                                    array('property' => 'opacity', 'label' => esc_html__( 'Opacity', 'ssc' ), 'selector' => ':hover'),
                                    array('property' => 'margin', 'label' => esc_html__( 'Margin', 'ssc' ), 'selector' => ':hover'),
                                    array('property' => 'padding', 'label' => esc_html__( 'Padding', 'ssc' ), 'selector' => ':hover'),
                                    array('property' => 'border', 'label' => esc_html__( 'Border', 'ssc' ), 'selector' => ':hover'),
                                    array('property' => 'border-radius', 'label' => esc_html__( 'Border Radius', 'ssc' ), 'selector' => ':hover'),
                                ),
                                'Title' => array(
                                    array('property' => 'color', 'label' => esc_html__( 'Color', 'ssc' ), 'selector' => ':hover h2'),
                                    array('property' => 'background', 'label' => esc_html__( 'Background Color', 'ssc' ), 'selector' => ':hover h2'),
                                    array('property' => 'font-family', 'label' => esc_html__( 'Font Family', 'ssc' ), 'selector' => ':hover h2'),
                                    array('property' => 'font-size', 'label' => esc_html__( 'Font Size', 'ssc' ), 'selector' => ':hover h2'),
                                    array('property' => 'line-height', 'label' => esc_html__( 'Line Height', 'ssc' ), 'selector' => ':hover h2'),
                                    array('property' => 'font-weight', 'label' => esc_html__( 'Font Weight', 'ssc' ), 'selector' => ':hover h2'),
                                    array('property' => 'text-align', 'selector' => ':hover h2'),
                                    array('property' => 'text-transform', 'label' => esc_html__( 'Text Transform', 'ssc' ), 'selector' => ':hover h2'),
                                    array('property' => 'margin', 'label' => esc_html__( 'Margin', 'ssc' ), 'selector' => ':hover h2'),
                                    array('property' => 'padding', 'label' => esc_html__( 'Padding', 'ssc' ), 'selector' => ':hover h2'),
                                ),
                                'Label' => array(
                                    array('property' => 'color', 'label' => esc_html__( 'Color', 'ssc' ), 'selector' => 'label:hover'),
                                    array('property' => 'background', 'label' => esc_html__( 'Background Color', 'ssc' ), 'selector' => 'label:hover'),
                                    array('property' => 'font-family', 'label' => esc_html__( 'Font Family', 'ssc' ), 'selector' => 'label:hover'),
                                    array('property' => 'font-size', 'label' => esc_html__( 'Font Size', 'ssc' ), 'selector' => 'label:hover'),
                                    array('property' => 'line-height', 'label' => esc_html__( 'Line Height', 'ssc' ), 'selector' => 'label:hover'),
                                    array('property' => 'font-weight', 'label' => esc_html__( 'Font Weight', 'ssc' ), 'selector' => 'label:hover'),
                                    array('property' => 'text-align', 'selector' => 'label:hover'),
                                    array('property' => 'text-transform', 'label' => esc_html__( 'Text Transform', 'ssc' ), 'selector' => 'label:hover'),
                                    array('property' => 'display', 'label' => esc_html__( 'Display', 'ssc' ), 'selector' => 'label:hover'),
                                    array('property' => 'float', 'label' => esc_html__( 'Float', 'ssc' ), 'selector' => 'label:hover'),
                                    array('property' => 'margin', 'label' => esc_html__( 'Margin', 'ssc' ), 'selector' => 'label:hover'),
                                    array('property' => 'padding', 'label' => esc_html__( 'Padding', 'ssc' ), 'selector' => 'label:hover'),
                                ),
                                'Input' => array(
                                    array('property' => 'color', 'label' => esc_html__( 'Color', 'ssc' ), 'selector' => '.wpcf7-text:hover'),
                                    array('property' => 'background', 'label' => esc_html__( 'Background Color', 'ssc' ), 'selector' => '.wpcf7-text:hover'),
                                    array('property' => 'font-family', 'label' => esc_html__( 'Font Family', 'ssc' ), 'selector' => '.wpcf7-text:hover'),
                                    array('property' => 'font-size', 'label' => esc_html__( 'Font Size', 'ssc' ), 'selector' => '.wpcf7-text:hover'),
                                    array('property' => 'line-height', 'label' => esc_html__( 'Line Height', 'ssc' ), 'selector' => '.wpcf7-text:hover'),
                                    array('property' => 'font-weight', 'label' => esc_html__( 'Font Weight', 'ssc' ), 'selector' => '.wpcf7-text:hover'),
                                    array('property' => 'text-align', 'selector' => '.wpcf7-text:hover'),
                                    array('property' => 'text-transform', 'label' => esc_html__( 'Text Transform', 'ssc' ), 'selector' => '.wpcf7-text:hover'),
                                    array('property' => 'width', 'selector' => '.wpcf7-text:hover'),
                                    array('property' => 'height', 'selector' => '.wpcf7-text:hover'),
                                    array('property' => 'border', 'selector' => '.wpcf7-text:hover'),
                                    array('property' => 'border-radius', 'selector' => '.wpcf7-text:hover'),
                                    array('property' => 'margin', 'label' => esc_html__( 'Margin', 'ssc' ), 'selector' => '.wpcf7-text:hover'),
                                    array('property' => 'padding', 'selector' => '.wpcf7-text:hover'),
                                ),
                                'Text Area' => array(
                                    array('property' => 'color', 'label' => esc_html__( 'Color', 'ssc' ), 'selector' => '.wpcf7-textarea:hover'),
                                    array('property' => 'background', 'label' => esc_html__( 'Background Color', 'ssc' ), 'selector' => '.wpcf7-textarea:hover'),
                                    array('property' => 'font-family', 'label' => esc_html__( 'Font Family', 'ssc' ), 'selector' => '.wpcf7-textarea:hover'),
                                    array('property' => 'font-size', 'label' => esc_html__( 'Font Size', 'ssc' ), 'selector' => '.wpcf7-textarea:hover'),
                                    array('property' => 'line-height', 'label' => esc_html__( 'Line Height', 'ssc' ), 'selector' => '.wpcf7-textarea:hover'),
                                    array('property' => 'font-weight', 'label' => esc_html__( 'Font Weight', 'ssc' ), 'selector' => '.wpcf7-textarea:hover'),
                                    array('property' => 'text-align', 'selector' => '.wpcf7-textarea:hover'),
                                    array('property' => 'text-transform', 'label' => esc_html__( 'Text Transform', 'ssc' ), 'selector' => '.wpcf7-textarea:hover'),
                                    array('property' => 'width', 'selector' => '.wpcf7-textarea:hover'),
                                    array('property' => 'height', 'selector' => '.wpcf7-textarea:hover'),
                                    array('property' => 'border', 'selector' => '.wpcf7-textarea:hover'),
                                    array('property' => 'border-radius', 'selector' => '.wpcf7-textarea:hover'),
                                    array('property' => 'margin', 'label' => esc_html__( 'Margin', 'ssc' ), 'selector' => '.wpcf7-textarea:hover'),
                                    array('property' => 'padding', 'selector' => '.wpcf7-textarea:hover'),
                                ),

                                'Select' => array(
                                    array('property' => 'color', 'label' => esc_html__( 'Color', 'ssc' ), 'selector' => '.wpcf7-select:hover'),
                                    array('property' => 'background', 'label' => esc_html__( 'Background Color', 'ssc' ), 'selector' => '.wpcf7-select:hover'),
                                    array('property' => 'font-family', 'label' => esc_html__( 'Font Family', 'ssc' ), 'selector' => '.wpcf7-select:hover'),
                                    array('property' => 'font-size', 'label' => esc_html__( 'Font Size', 'ssc' ), 'selector' => '.wpcf7-select:hover'),
                                    array('property' => 'line-height', 'label' => esc_html__( 'Line Height', 'ssc' ), 'selector' => '.wpcf7-select:hover'),
                                    array('property' => 'font-weight', 'label' => esc_html__( 'Font Weight', 'ssc' ), 'selector' => '.wpcf7-select:hover'),
                                    array('property' => 'text-align', 'selector' => '.wpcf7-select:hover'),
                                    array('property' => 'text-transform', 'label' => esc_html__( 'Text Transform', 'ssc' ), 'selector' => '.wpcf7-select:hover'),
                                    array('property' => 'width', 'selector' => '.wpcf7-select:hover'),
                                    array('property' => 'height', 'selector' => '.wpcf7-select:hover'),
                                    array('property' => 'border', 'selector' => '.wpcf7-select:hover'),
                                    array('property' => 'border-radius', 'selector' => '.wpcf7-select:hover'),
                                    array('property' => 'margin', 'label' => esc_html__( 'Margin', 'ssc' ), 'selector' => '.wpcf7-select:hover'),
                                    array('property' => 'padding', 'selector' => '.wpcf7-select:hover'),
                                ),
                                'Radio - Checkbox' => array(
                                    array('property' => 'color', 'selector' => '.wpcf7-radio:hover .wpcf7-list-item-label, .wpcf7-checkbox:hover .wpcf7-list-item-label'),
                                    array('property' => 'background-color', 'selector' => '.wpcf7-radio:hover .wpcf7-list-item-label, .wpcf7-checkbox:hover .wpcf7-list-item-label'),
                                    array('property' => 'display', 'selector' => '.wpcf7-radio:hover .wpcf7-list-item-label, .wpcf7-checkbox:hover .wpcf7-list-item-label'),
                                    array('property' => 'font-family', 'label' => esc_html__( 'Font Family', 'ssc' ), 'selector' => '.wpcf7-radio:hover .wpcf7-list-item-label, .wpcf7-checkbox:hover .wpcf7-list-item-label'),
                                    array('property' => 'font-size', 'label' => esc_html__( 'Font Size', 'ssc' ), 'selector' => '.wpcf7-radio:hover .wpcf7-list-item-label, .wpcf7-checkbox:hover .wpcf7-list-item-label'),
                                    array('property' => 'line-height', 'label' => esc_html__( 'Line Height', 'ssc' ), 'selector' => '.wpcf7-radio:hover .wpcf7-list-item-label, .wpcf7-checkbox:hover .wpcf7-list-item-label'),
                                    array('property' => 'font-weight', 'label' => esc_html__( 'Font Weight', 'ssc' ), 'selector' => '.wpcf7-radio:hover .wpcf7-list-item-label, .wpcf7-checkbox:hover .wpcf7-list-item-label'),
                                    array('property' => 'text-align', 'selector' => '.wpcf7-radio:hover .wpcf7-list-item-label, .wpcf7-checkbox:hover .wpcf7-list-item-label'),
                                    array('property' => 'text-transform', 'label' => esc_html__( 'Text Transform', 'ssc' ), 'selector' => '.wpcf7-radio:hover .wpcf7-list-item-label, .wpcf7-checkbox:hover .wpcf7-list-item-label'),
                                    array('property' => 'margin', 'label' => esc_html__( 'Margin', 'ssc' ), 'selector' => '.wpcf7-radio:hover .wpcf7-list-item-label, .wpcf7-checkbox:hover .wpcf7-list-item-label'),
                                    array('property' => 'padding', 'label' => esc_html__( 'Padding', 'ssc' ), 'selector' => '.wpcf7-radio:hover .wpcf7-list-item-label, .wpcf7-checkbox:hover .wpcf7-list-item-label'),
                                ),

                                'Submit' => array(
                                    array('property' => 'color', 'selector' => '.wpcf7-submit:hover'),
                                    array('property' => 'background', 'selector' => '.wpcf7-submit:hover'),
                                    array('property' => 'display', 'selector' => '.wpcf7-submit:hover'),
                                    array('property' => 'width', 'label' => esc_html__( 'Width', 'ssc' ), 'selector' => '.wpcf7-submit:hover'),
                                    array('property' => 'font-family', 'label' => esc_html__( 'Font Family', 'ssc' ), 'selector' => '.wpcf7-submit:hover'),
                                    array('property' => 'font-size', 'label' => esc_html__( 'Font Size', 'ssc' ), 'selector' => '.wpcf7-submit:hover'),
                                    array('property' => 'line-height', 'label' => esc_html__( 'Line Height', 'ssc' ), 'selector' => '.wpcf7-submit:hover'),
                                    array('property' => 'font-weight', 'label' => esc_html__( 'Font Weight', 'ssc' ), 'selector' => '.wpcf7-submit:hover'),
                                    array('property' => 'text-align', 'selector' => '.wpcf7-submit:hover'),
                                    array('property' => 'text-transform', 'label' => esc_html__( 'Text Transform', 'ssc' ), 'selector' => '.wpcf7-submit:hover'),
                                    array('property' => 'border', 'label' => esc_html__( 'Border', 'ssc' ), 'selector' => '.wpcf7-submit:hover'),
                                    array('property' => 'border-radius', 'label' => esc_html__( 'Border Radius', 'ssc' ), 'selector' => '.wpcf7-submit:hover'),
                                    array('property' => 'margin', 'label' => esc_html__( 'Margin', 'ssc' ), 'selector' => '.wpcf7-submit:hover'),
                                    array('property' => 'padding', 'label' => esc_html__( 'Padding', 'ssc' ), 'selector' => '.wpcf7-submit:hover'),
                                )

                            ),
                        )
                    )
                ),

                // Focus
                esc_html__( 'focus', 'ssc' ) => array(
                    array(
                        'name' => 'focus-css',
                        'label' => esc_html__( 'focus', 'ssc' ),
                        'type' => 'css',
                        'value' => '{`kc-css`:{`any`:{`input`:{`border|.wpcf7-text:focus`:`2px solid #768188`},`text-area`:{`border|.wpcf7-textarea:focus`:`2px solid #768188`}}}}', // remove this if you do not need a default content
                        'description' => esc_html__( 'Styles for focus Condition', 'ssc' ),
                        'options' => array(
                            array(
                                'screens' => "any",
                                'Input' => array(
                                    array('property' => 'color', 'label' => esc_html__( 'Color', 'ssc' ), 'selector' => '.wpcf7-text:focus'),
                                    array('property' => 'background', 'label' => esc_html__( 'Background Color', 'ssc' ), 'selector' => '.wpcf7-text:focus'),
                                    array('property' => 'font-family', 'label' => esc_html__( 'Font Family', 'ssc' ), 'selector' => '.wpcf7-text:focus'),
                                    array('property' => 'font-size', 'label' => esc_html__( 'Font Size', 'ssc' ), 'selector' => '.wpcf7-text:focus'),
                                    array('property' => 'line-height', 'label' => esc_html__( 'Line Height', 'ssc' ), 'selector' => '.wpcf7-text:focus'),
                                    array('property' => 'font-weight', 'label' => esc_html__( 'Font Weight', 'ssc' ), 'selector' => '.wpcf7-text:focus'),
                                    array('property' => 'text-align', 'selector' => '.wpcf7-text:focus'),
                                    array('property' => 'text-transform', 'label' => esc_html__( 'Text Transform', 'ssc' ), 'selector' => '.wpcf7-text:focus'),
                                    array('property' => 'width', 'selector' => '.wpcf7-text:focus'),
                                    array('property' => 'height', 'selector' => '.wpcf7-text:focus'),
                                    array('property' => 'border', 'selector' => '.wpcf7-text:focus'),
                                    array('property' => 'border-radius', 'selector' => '.wpcf7-text:focus'),
                                    array('property' => 'margin', 'label' => esc_html__( 'Margin', 'ssc' ), 'selector' => '.wpcf7-text:focus'),
                                    array('property' => 'padding', 'selector' => '.wpcf7-text:focus'),
                                ),
                                'Text Area' => array(
                                    array('property' => 'color', 'label' => esc_html__( 'Color', 'ssc' ), 'selector' => '.wpcf7-textarea:focus'),
                                    array('property' => 'background', 'label' => esc_html__( 'Background Color', 'ssc' ), 'selector' => '.wpcf7-textarea:focus'),
                                    array('property' => 'font-family', 'label' => esc_html__( 'Font Family', 'ssc' ), 'selector' => '.wpcf7-textarea:focus'),
                                    array('property' => 'font-size', 'label' => esc_html__( 'Font Size', 'ssc' ), 'selector' => '.wpcf7-textarea:focus'),
                                    array('property' => 'line-height', 'label' => esc_html__( 'Line Height', 'ssc' ), 'selector' => '.wpcf7-textarea:focus'),
                                    array('property' => 'font-weight', 'label' => esc_html__( 'Font Weight', 'ssc' ), 'selector' => '.wpcf7-textarea:focus'),
                                    array('property' => 'text-align', 'selector' => '.wpcf7-textarea:focus'),
                                    array('property' => 'text-transform', 'label' => esc_html__( 'Text Transform', 'ssc' ), 'selector' => '.wpcf7-textarea:focus'),
                                    array('property' => 'width', 'selector' => '.wpcf7-textarea:focus'),
                                    array('property' => 'height', 'selector' => '.wpcf7-textarea:focus'),
                                    array('property' => 'border', 'selector' => '.wpcf7-textarea:focus'),
                                    array('property' => 'border-radius', 'selector' => '.wpcf7-textarea:focus'),
                                    array('property' => 'margin', 'label' => esc_html__( 'Margin', 'ssc' ), 'selector' => '.wpcf7-textarea:focus'),
                                    array('property' => 'padding', 'selector' => '.wpcf7-textarea:focus'),
                                ),

                                'Select' => array(
                                    array('property' => 'color', 'label' => esc_html__( 'Color', 'ssc' ), 'selector' => '.wpcf7-select:focus'),
                                    array('property' => 'background', 'label' => esc_html__( 'Background Color', 'ssc' ), 'selector' => '.wpcf7-select:focus'),
                                    array('property' => 'font-family', 'label' => esc_html__( 'Font Family', 'ssc' ), 'selector' => '.wpcf7-select:focus'),
                                    array('property' => 'font-size', 'label' => esc_html__( 'Font Size', 'ssc' ), 'selector' => '.wpcf7-select:focus'),
                                    array('property' => 'line-height', 'label' => esc_html__( 'Line Height', 'ssc' ), 'selector' => '.wpcf7-select:focus'),
                                    array('property' => 'font-weight', 'label' => esc_html__( 'Font Weight', 'ssc' ), 'selector' => '.wpcf7-select:focus'),
                                    array('property' => 'text-align', 'selector' => '.wpcf7-select:focus'),
                                    array('property' => 'text-transform', 'label' => esc_html__( 'Text Transform', 'ssc' ), 'selector' => '.wpcf7-select:focus'),
                                    array('property' => 'width', 'selector' => '.wpcf7-select:focus'),
                                    array('property' => 'height', 'selector' => '.wpcf7-select:focus'),
                                    array('property' => 'border', 'selector' => '.wpcf7-select:focus'),
                                    array('property' => 'border-radius', 'selector' => '.wpcf7-select:focus'),
                                    array('property' => 'margin', 'label' => esc_html__( 'Margin', 'ssc' ), 'selector' => '.wpcf7-select:focus'),
                                    array('property' => 'padding', 'selector' => '.wpcf7-select:focus'),
                                ),
                                'Radio - Checkbox' => array(
                                    array('property' => 'color', 'selector' => '.wpcf7-radio:focus .wpcf7-list-item-label, .wpcf7-checkbox:focus .wpcf7-list-item-label'),
                                    array('property' => 'background-color', 'selector' => '.wpcf7-radio:focus .wpcf7-list-item-label, .wpcf7-checkbox:focus .wpcf7-list-item-label'),
                                    array('property' => 'display', 'selector' => '.wpcf7-radio:focus .wpcf7-list-item-label, .wpcf7-checkbox:focus .wpcf7-list-item-label'),
                                    array('property' => 'font-family', 'label' => esc_html__( 'Font Family', 'ssc' ), 'selector' => '.wpcf7-radio:focus .wpcf7-list-item-label, .wpcf7-checkbox:focus .wpcf7-list-item-label'),
                                    array('property' => 'font-size', 'label' => esc_html__( 'Font Size', 'ssc' ), 'selector' => '.wpcf7-radio:focus .wpcf7-list-item-label, .wpcf7-checkbox:focus .wpcf7-list-item-label'),
                                    array('property' => 'line-height', 'label' => esc_html__( 'Line Height', 'ssc' ), 'selector' => '.wpcf7-radio:focus .wpcf7-list-item-label, .wpcf7-checkbox:focus .wpcf7-list-item-label'),
                                    array('property' => 'font-weight', 'label' => esc_html__( 'Font Weight', 'ssc' ), 'selector' => '.wpcf7-radio:focus .wpcf7-list-item-label, .wpcf7-checkbox:focus .wpcf7-list-item-label'),
                                    array('property' => 'text-align', 'selector' => '.wpcf7-radio:focus .wpcf7-list-item-label, .wpcf7-checkbox:focus .wpcf7-list-item-label'),
                                    array('property' => 'text-transform', 'label' => esc_html__( 'Text Transform', 'ssc' ), 'selector' => '.wpcf7-radio:focus .wpcf7-list-item-label, .wpcf7-checkbox:focus .wpcf7-list-item-label'),
                                    array('property' => 'margin', 'label' => esc_html__( 'Margin', 'ssc' ), 'selector' => '.wpcf7-radio:focus .wpcf7-list-item-label, .wpcf7-checkbox:focus .wpcf7-list-item-label'),
                                    array('property' => 'padding', 'label' => esc_html__( 'Padding', 'ssc' ), 'selector' => '.wpcf7-radio:focus .wpcf7-list-item-label, .wpcf7-checkbox:focus .wpcf7-list-item-label'),
                                ),

                                'Submit' => array(
                                    array('property' => 'color', 'selector' => '.wpcf7-submit:focus'),
                                    array('property' => 'background', 'selector' => '.wpcf7-submit:focus'),
                                    array('property' => 'display', 'selector' => '.wpcf7-submit:focus'),
                                    array('property' => 'font-family', 'label' => esc_html__( 'Font Family', 'ssc' ), 'selector' => '.wpcf7-submit:focus'),
                                    array('property' => 'font-size', 'label' => esc_html__( 'Font Size', 'ssc' ), 'selector' => '.wpcf7-submit:focus'),
                                    array('property' => 'line-height', 'label' => esc_html__( 'Line Height', 'ssc' ), 'selector' => '.wpcf7-submit:focus'),
                                    array('property' => 'font-weight', 'label' => esc_html__( 'Font Weight', 'ssc' ), 'selector' => '.wpcf7-submit:focus'),
                                    array('property' => 'text-align', 'selector' => '.wpcf7-submit:focus'),
                                    array('property' => 'text-transform', 'label' => esc_html__( 'Text Transform', 'ssc' ), 'selector' => '.wpcf7-submit:focus'),
                                    array('property' => 'border', 'label' => esc_html__( 'Border', 'ssc' ), 'selector' => '.wpcf7-submit:focus'),
                                    array('property' => 'border-radius', 'label' => esc_html__( 'Border Radius', 'ssc' ), 'selector' => '.wpcf7-submit:focus'),
                                    array('property' => 'margin', 'label' => esc_html__( 'Margin', 'ssc' ), 'selector' => '.wpcf7-submit:focus'),
                                    array('property' => 'padding', 'label' => esc_html__( 'Padding', 'ssc' ), 'selector' => '.wpcf7-submit:focus'),
                                )

                            ),
                            array(
                                "screens" => "999,768,667,479",
                                'Input' => array(
                                    array('property' => 'color', 'label' => esc_html__( 'Color', 'ssc' ), 'selector' => '.wpcf7-text:focus'),
                                    array('property' => 'background', 'label' => esc_html__( 'Background Color', 'ssc' ), 'selector' => '.wpcf7-text:focus'),
                                    array('property' => 'font-family', 'label' => esc_html__( 'Font Family', 'ssc' ), 'selector' => '.wpcf7-text:focus'),
                                    array('property' => 'font-size', 'label' => esc_html__( 'Font Size', 'ssc' ), 'selector' => '.wpcf7-text:focus'),
                                    array('property' => 'line-height', 'label' => esc_html__( 'Line Height', 'ssc' ), 'selector' => '.wpcf7-text:focus'),
                                    array('property' => 'font-weight', 'label' => esc_html__( 'Font Weight', 'ssc' ), 'selector' => '.wpcf7-text:focus'),
                                    array('property' => 'text-align', 'selector' => '.wpcf7-text:focus'),
                                    array('property' => 'text-transform', 'label' => esc_html__( 'Text Transform', 'ssc' ), 'selector' => '.wpcf7-text:focus'),
                                    array('property' => 'width', 'selector' => '.wpcf7-text:focus'),
                                    array('property' => 'height', 'selector' => '.wpcf7-text:focus'),
                                    array('property' => 'border', 'selector' => '.wpcf7-text:focus'),
                                    array('property' => 'border-radius', 'selector' => '.wpcf7-text:focus'),
                                    array('property' => 'margin', 'label' => esc_html__( 'Margin', 'ssc' ), 'selector' => '.wpcf7-text:focus'),
                                    array('property' => 'padding', 'selector' => '.wpcf7-text:focus'),
                                ),
                                'Text Area' => array(
                                    array('property' => 'color', 'label' => esc_html__( 'Color', 'ssc' ), 'selector' => '.wpcf7-textarea:focus'),
                                    array('property' => 'background', 'label' => esc_html__( 'Background Color', 'ssc' ), 'selector' => '.wpcf7-textarea:focus'),
                                    array('property' => 'font-family', 'label' => esc_html__( 'Font Family', 'ssc' ), 'selector' => '.wpcf7-textarea:focus'),
                                    array('property' => 'font-size', 'label' => esc_html__( 'Font Size', 'ssc' ), 'selector' => '.wpcf7-textarea:focus'),
                                    array('property' => 'line-height', 'label' => esc_html__( 'Line Height', 'ssc' ), 'selector' => '.wpcf7-textarea:focus'),
                                    array('property' => 'font-weight', 'label' => esc_html__( 'Font Weight', 'ssc' ), 'selector' => '.wpcf7-textarea:focus'),
                                    array('property' => 'text-align', 'selector' => '.wpcf7-textarea:focus'),
                                    array('property' => 'text-transform', 'label' => esc_html__( 'Text Transform', 'ssc' ), 'selector' => '.wpcf7-textarea:focus'),
                                    array('property' => 'width', 'selector' => '.wpcf7-textarea:focus'),
                                    array('property' => 'height', 'selector' => '.wpcf7-textarea:focus'),
                                    array('property' => 'border', 'selector' => '.wpcf7-textarea:focus'),
                                    array('property' => 'border-radius', 'selector' => '.wpcf7-textarea:focus'),
                                    array('property' => 'margin', 'label' => esc_html__( 'Margin', 'ssc' ), 'selector' => '.wpcf7-textarea:focus'),
                                    array('property' => 'padding', 'selector' => '.wpcf7-textarea:focus'),
                                ),

                                'Select' => array(
                                    array('property' => 'color', 'label' => esc_html__( 'Color', 'ssc' ), 'selector' => '.wpcf7-select:focus'),
                                    array('property' => 'background', 'label' => esc_html__( 'Background Color', 'ssc' ), 'selector' => '.wpcf7-select:focus'),
                                    array('property' => 'font-family', 'label' => esc_html__( 'Font Family', 'ssc' ), 'selector' => '.wpcf7-select:focus'),
                                    array('property' => 'font-size', 'label' => esc_html__( 'Font Size', 'ssc' ), 'selector' => '.wpcf7-select:focus'),
                                    array('property' => 'line-height', 'label' => esc_html__( 'Line Height', 'ssc' ), 'selector' => '.wpcf7-select:focus'),
                                    array('property' => 'font-weight', 'label' => esc_html__( 'Font Weight', 'ssc' ), 'selector' => '.wpcf7-select:focus'),
                                    array('property' => 'text-align', 'selector' => '.wpcf7-select:focus'),
                                    array('property' => 'text-transform', 'label' => esc_html__( 'Text Transform', 'ssc' ), 'selector' => '.wpcf7-select:focus'),
                                    array('property' => 'width', 'selector' => '.wpcf7-select:focus'),
                                    array('property' => 'height', 'selector' => '.wpcf7-select:focus'),
                                    array('property' => 'border', 'selector' => '.wpcf7-select:focus'),
                                    array('property' => 'border-radius', 'selector' => '.wpcf7-select:focus'),
                                    array('property' => 'margin', 'label' => esc_html__( 'Margin', 'ssc' ), 'selector' => '.wpcf7-select:focus'),
                                    array('property' => 'padding', 'selector' => '.wpcf7-select:focus'),
                                ),
                                'Radio - Checkbox' => array(
                                    array('property' => 'color', 'selector' => '.wpcf7-radio:focus .wpcf7-list-item-label, .wpcf7-checkbox:focus .wpcf7-list-item-label'),
                                    array('property' => 'background-color', 'selector' => '.wpcf7-radio:focus .wpcf7-list-item-label, .wpcf7-checkbox:focus .wpcf7-list-item-label'),
                                    array('property' => 'display', 'selector' => '.wpcf7-radio:focus .wpcf7-list-item-label, .wpcf7-checkbox:focus .wpcf7-list-item-label'),
                                    array('property' => 'font-family', 'label' => esc_html__( 'Font Family', 'ssc' ), 'selector' => '.wpcf7-radio:focus .wpcf7-list-item-label, .wpcf7-checkbox:focus .wpcf7-list-item-label'),
                                    array('property' => 'font-size', 'label' => esc_html__( 'Font Size', 'ssc' ), 'selector' => '.wpcf7-radio:focus .wpcf7-list-item-label, .wpcf7-checkbox:focus .wpcf7-list-item-label'),
                                    array('property' => 'line-height', 'label' => esc_html__( 'Line Height', 'ssc' ), 'selector' => '.wpcf7-radio:focus .wpcf7-list-item-label, .wpcf7-checkbox:focus .wpcf7-list-item-label'),
                                    array('property' => 'font-weight', 'label' => esc_html__( 'Font Weight', 'ssc' ), 'selector' => '.wpcf7-radio:focus .wpcf7-list-item-label, .wpcf7-checkbox:focus .wpcf7-list-item-label'),
                                    array('property' => 'text-align', 'selector' => '.wpcf7-radio:focus .wpcf7-list-item-label, .wpcf7-checkbox:focus .wpcf7-list-item-label'),
                                    array('property' => 'text-transform', 'label' => esc_html__( 'Text Transform', 'ssc' ), 'selector' => '.wpcf7-radio:focus .wpcf7-list-item-label, .wpcf7-checkbox:focus .wpcf7-list-item-label'),
                                    array('property' => 'margin', 'label' => esc_html__( 'Margin', 'ssc' ), 'selector' => '.wpcf7-radio:focus .wpcf7-list-item-label, .wpcf7-checkbox:focus .wpcf7-list-item-label'),
                                    array('property' => 'padding', 'label' => esc_html__( 'Padding', 'ssc' ), 'selector' => '.wpcf7-radio:focus .wpcf7-list-item-label, .wpcf7-checkbox:focus .wpcf7-list-item-label'),
                                ),

                                'Submit' => array(
                                    array('property' => 'color', 'selector' => '.wpcf7-submit:focus'),
                                    array('property' => 'background', 'selector' => '.wpcf7-submit:focus'),
                                    array('property' => 'display', 'selector' => '.wpcf7-submit:focus'),
                                    array('property' => 'font-family', 'label' => esc_html__( 'Font Family', 'ssc' ), 'selector' => '.wpcf7-submit:focus'),
                                    array('property' => 'font-size', 'label' => esc_html__( 'Font Size', 'ssc' ), 'selector' => '.wpcf7-submit:focus'),
                                    array('property' => 'line-height', 'label' => esc_html__( 'Line Height', 'ssc' ), 'selector' => '.wpcf7-submit:focus'),
                                    array('property' => 'font-weight', 'label' => esc_html__( 'Font Weight', 'ssc' ), 'selector' => '.wpcf7-submit:focus'),
                                    array('property' => 'text-align', 'selector' => '.wpcf7-submit:focus'),
                                    array('property' => 'text-transform', 'label' => esc_html__( 'Text Transform', 'ssc' ), 'selector' => '.wpcf7-submit:focus'),
                                    array('property' => 'border', 'label' => esc_html__( 'Border', 'ssc' ), 'selector' => '.wpcf7-submit:focus'),
                                    array('property' => 'border-radius', 'label' => esc_html__( 'Border Radius', 'ssc' ), 'selector' => '.wpcf7-submit:focus'),
                                    array('property' => 'margin', 'label' => esc_html__( 'Margin', 'ssc' ), 'selector' => '.wpcf7-submit:focus'),
                                    array('property' => 'padding', 'label' => esc_html__( 'Padding', 'ssc' ), 'selector' => '.wpcf7-submit:focus'),
                                )

                            ),
                        )
                    )
                ),

            )
        )
    ));
}
// Register Shortcode
function ssc_cf7_shortcode($atts, $content = null) {
    extract(shortcode_atts(array(
        'title'         => '',
        'slug'         => '',
        'el_class'         => '',

    ) , $atts));

    $output = '';
    extract($atts);

    global $wpdb;
    $form = $wpdb->get_results("SELECT `ID` FROM `".$wpdb->posts."` WHERE `post_type` = 'wpcf7_contact_form' AND `post_name` = '".esc_attr(sanitize_title($slug))."' LIMIT 1");

    if ( function_exists( 'wpcf7_enqueue_scripts' ) ) {
        wpcf7_enqueue_scripts();
    }

    $wrp_classes = apply_filters( 'kc-el-class', $atts );
    $output .= '<div  class="ssc_cf7 '.implode( ' ', $wrp_classes ) . ' '.$el_class.'">';

    if ( !empty( $title ) ) {
        $output .= '<h2>'. $title .'</h2>';
    }
    if ( ! empty( $form ) ) {
        //print_r($form);
        $output .= kc_do_shortcode( '[contact-form-7 id="'.$form[0]->ID.'" title=""]' );
    } else {
        $output .= __('Please select one of contact form 7 for display.', 'ssc');
    }

    $output .= '</div>';

    return $output;
}

add_shortcode('ssc_cf7', 'ssc_cf7_shortcode');
