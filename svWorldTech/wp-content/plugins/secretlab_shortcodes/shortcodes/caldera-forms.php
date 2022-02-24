<?php
/**
 * Created by PhpStorm.
 * User: Alex
 */

add_action('init', 'ssc_calderaf_params', 99);


function ssc_calderaf_params() {
    global $kc;
    $contact_forms = sst_caldera_forms();
    $kc->add_map(array(
        'ssc_caldf' => array(
            'name' => esc_html__( 'Caldera Form', 'ssc' ),
            'description' => esc_html__( 'It displays contact forms with unlimited design templates and colors from Contact Form 7 plugin', 'ssc' ),
            'icon' => 'ssc-icon-14',
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
                        'name'        => 'form_id',
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
                    ),
	                array(
		                'type' => 'color_picker',
		                'label' => __( 'Placeholder Color', 'ssc' ),
		                'name' => 'pl_color',
		                'description' => esc_html__( 'Deprecated! Use fields at the "Styling" tab instead.', 'ssc' ),
	                )
                ),
                // Styling
                esc_html__( 'styling', 'ssc' ) => array(
                    array(
                        'name' => 'my-css',
                        'label' => esc_html__( 'Styling', 'ssc' ),
                        'type' => 'css',
                        'value' => '{`kc-css`:{`any`:{`box`:{`text-align|`:`center`,`float|`:`none`,`max-width|`:`800px`,`margin|`:`inherit auto inherit auto`,`padding|`:`inherit inherit inherit 15px`},`label`:{`color|label`:`#949494`},`input`:{`line-height|input, select`:`50px`,`width|input, select`:`100%`,`height|input, select`:`50px`,`border|input, select`:`1px solid #cccccc`,`border-radius|input, select`:`0px 0px 0px 0px`,`margin|input, select`:`inherit inherit 15px inherit`,`padding|input, select`:`0px inherit 0px inherit`},`text-area`:{`font-size|textarea`:`14px`,`border|textarea`:`1px solid #cccccc`,`border-radius|textarea`:`0px 0px 0px 0px`,`margin|textarea`:`inherit inherit 15px inherit`},`radio-checkbox`:{`color|input label, .checkbox`:`#768188`},`submit`:{`color|.caldera-grid input.btn`:`#5b29ef`,`background|.caldera-grid input.btn`:`eyJjb2xvciI6InJnYmEoMjU1LCAyNTUsIDI1NSwgMCkiLCJsaW5lYXJHcmFkaWVudCI6WyIiXSwiaW1hZ2UiOiJub25lIiwicG9zaXRpb24iOiIwJSAwJSIsInNpemUiOiJhdXRvIiwicmVwZWF0IjoicmVwZWF0IiwiYXR0YWNobWVudCI6InNjcm9sbCIsImFkdmFuY2VkIjowfQ==`,`height|.caldera-grid input.btn`:`40px`,`font-size|.caldera-grid input.btn`:`14px`,`line-height|.caldera-grid input.btn`:`38px`,`font-weight|.caldera-grid input.btn`:`400`,`text-align|.caldera-grid input.btn`:`center`,`text-transform|.caldera-grid input.btn`:`uppercase`,`border|.caldera-grid input.btn`:`1px solid #5b29ef`,`border-radius|.caldera-grid input.btn`:`0px 0px 0px 0px`,`margin|.caldera-grid input.btn`:`inherit auto inherit auto`,`padding|.caldera-grid input.btn`:`inherit 20px 0px 20px`}}}}', // remove this if you do not need a default content
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
                                    array('property' => 'max-width', 'label' => esc_html__( 'Maximum Width', 'ssc' )),
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
                                'Row' => array(
	                                array('property' => 'text-align', 'label' => esc_html__( 'Text Align', 'ssc' ), 'selector' => ' .caldera-grid .row'),
	                                array('property' => 'background', 'selector' => ' .caldera-grid .row'),
	                                array('property' => 'display', 'label' => esc_html__( 'Display', 'ssc' ), 'selector' => ' .caldera-grid .row'),
	                                array('property' => 'float', 'label' => esc_html__( 'Float', 'ssc' ), 'selector' => ' .caldera-grid .row'),
	                                array('property' => 'width', 'label' => esc_html__( 'Width', 'ssc' ), 'selector' => ' .caldera-grid .row'),
	                                array('property' => 'height', 'label' => esc_html__( 'Height', 'ssc' ), 'selector' => ' .caldera-grid .row'),
	                                array('property' => 'box-shadow', 'label' => esc_html__( 'Box Shadow', 'ssc' ), 'selector' => ' .caldera-grid .row'),
	                                array('property' => 'opacity', 'label' => esc_html__( 'Opacity', 'ssc' ), 'selector' => ' .caldera-grid .row'),
	                                array('property' => 'margin', 'label' => esc_html__( 'Margin', 'ssc' ), 'selector' => ' .caldera-grid .row'),
	                                array('property' => 'padding', 'label' => esc_html__( 'Padding', 'ssc' ), 'selector' => ' .caldera-grid .row'),
	                                array('property' => 'border', 'label' => esc_html__( 'Border', 'ssc' ), 'selector' => ' .caldera-grid .row'),
	                                array('property' => 'border-radius', 'label' => esc_html__( 'Border Radius', 'ssc' ), 'selector' => ' .caldera-grid .row'),
                                ),
                                'Columns' => array(
	                                array('property' => 'width', 'label' => esc_html__( 'Width', 'ssc' ), 'selector' => ' .caldera-grid .row > div'),
	                                array('property' => 'text-align', 'label' => esc_html__( 'Text Align', 'ssc' ), 'selector' => ' .caldera-grid .row > div'),
	                                array('property' => 'background', 'selector' => ' .caldera-grid .row > div'),
	                                array('property' => 'display', 'label' => esc_html__( 'Display', 'ssc' ), 'selector' => ' .caldera-grid .row > div'),
	                                array('property' => 'float', 'label' => esc_html__( 'Float', 'ssc' ), 'selector' => ' .caldera-grid .row > div'),
	                                array('property' => 'width', 'label' => esc_html__( 'Width', 'ssc' ), 'selector' => ' .caldera-grid .row > div'),
	                                array('property' => 'height', 'label' => esc_html__( 'Height', 'ssc' ), 'selector' => ' .caldera-grid .row > div'),
	                                array('property' => 'box-shadow', 'label' => esc_html__( 'Box Shadow', 'ssc' ), 'selector' => ' .caldera-grid .row > div'),
	                                array('property' => 'opacity', 'label' => esc_html__( 'Opacity', 'ssc' ), 'selector' => ' .caldera-grid .row > div'),
	                                array('property' => 'margin', 'label' => esc_html__( 'Margin', 'ssc' ), 'selector' => ' .caldera-grid .row > div'),
	                                array('property' => 'padding', 'label' => esc_html__( 'Padding', 'ssc' ), 'selector' => ' .caldera-grid .row > div'),
	                                array('property' => 'border', 'label' => esc_html__( 'Border', 'ssc' ), 'selector' => ' .caldera-grid .row > div'),
	                                array('property' => 'border-radius', 'label' => esc_html__( 'Border Radius', 'ssc' ), 'selector' => ' .caldera-grid .row > div'),
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
                                    array('property' => 'color', 'label' => esc_html__( 'Color', 'ssc' ), 'selector' => 'input, select'),
                                    array('property' => 'background', 'label' => esc_html__( 'Background Color', 'ssc' ), 'selector' => 'input, select'),
                                    array('property' => 'font-family', 'label' => esc_html__( 'Font Family', 'ssc' ), 'selector' => 'input, select'),
                                    array('property' => 'font-size', 'label' => esc_html__( 'Font Size', 'ssc' ), 'selector' => 'input, select'),
                                    array('property' => 'line-height', 'label' => esc_html__( 'Line Height', 'ssc' ), 'selector' => 'input, select'),
                                    array('property' => 'font-weight', 'label' => esc_html__( 'Font Weight', 'ssc' ), 'selector' => 'input, select'),
                                    array('property' => 'text-align', 'selector' => 'input, select'),
                                    array('property' => 'display', 'label' => esc_html__( 'Display', 'ssc' ), 'selector' => 'input, select'),
                                    array('property' => 'float', 'label' => esc_html__( 'Float', 'ssc' ), 'selector' => 'input, select'),
                                    array('property' => 'box-shadow', 'label' => esc_html__( 'Box Shadow', 'ssc' ), 'selector' => 'input, select'),
                                    array('property' => 'text-transform', 'label' => esc_html__( 'Text Transform', 'ssc' ), 'selector' => 'input, select'),
                                    array('property' => 'width', 'selector' => 'input, select'),
                                    array('property' => 'height', 'selector' => 'input, select'),
                                    array('property' => 'border', 'selector' => 'input, select'),
                                    array('property' => 'border-radius', 'selector' => 'input, select'),
                                    array('property' => 'margin', 'label' => esc_html__( 'Margin', 'ssc' ), 'selector' => 'input, select'),
                                    array('property' => 'padding', 'selector' => 'input, select'),
                                ),
                                'Text Area' => array(
                                    array('property' => 'color', 'label' => esc_html__( 'Color', 'ssc' ), 'selector' => 'textarea'),
                                    array('property' => 'background', 'label' => esc_html__( 'Background Color', 'ssc' ), 'selector' => 'textarea'),
                                    array('property' => 'font-family', 'label' => esc_html__( 'Font Family', 'ssc' ), 'selector' => 'textarea'),
                                    array('property' => 'font-size', 'label' => esc_html__( 'Font Size', 'ssc' ), 'selector' => 'textarea'),
                                    array('property' => 'line-height', 'label' => esc_html__( 'Line Height', 'ssc' ), 'selector' => 'textarea'),
                                    array('property' => 'font-weight', 'label' => esc_html__( 'Font Weight', 'ssc' ), 'selector' => 'textarea'),
                                    array('property' => 'text-align', 'selector' => 'textarea'),
                                    array('property' => 'box-shadow', 'label' => esc_html__( 'Box Shadow', 'ssc' ), 'selector' => 'textarea'),
                                    array('property' => 'text-transform', 'label' => esc_html__( 'Text Transform', 'ssc' ), 'selector' => 'textarea'),
                                    array('property' => 'width', 'selector' => 'textarea'),
                                    array('property' => 'height', 'selector' => 'textarea'),
                                    array('property' => 'border', 'selector' => 'textarea'),
                                    array('property' => 'border-radius', 'selector' => 'textarea'),
                                    array('property' => 'margin', 'label' => esc_html__( 'Margin', 'ssc' ), 'selector' => 'textarea'),
                                    array('property' => 'padding', 'selector' => 'textarea'),
                                ),
                                'Placeholder' => array(
	                                array('property' => 'color', 'label' => esc_html__( 'Color', 'ssc' ).esc_html__( ' Google Chrome', 'ssc' ), 'selector' => 'input::-webkit-input-placeholder'),
	                                array('property' => 'color', 'label' => esc_html__( 'Color', 'ssc' ).esc_html__( ' Mozilla Firefox Old', 'ssc' ), 'selector' => 'input::-moz-placeholder'),
	                                array('property' => 'color', 'label' => esc_html__( 'Color', 'ssc' ).esc_html__( ' Mozilla Firefox New', 'ssc' ), 'selector' => 'input:-moz-placeholder'),
	                                array('property' => 'color', 'label' => esc_html__( 'Color', 'ssc' ).esc_html__( ' Internet Explorer ', 'ssc' ), 'selector' => 'input:-ms-input-placeholder'),
	                                array('property' => 'color', 'label' => esc_html__( 'Color', 'ssc' ).esc_html__( ' Google Chrome', 'ssc' ), 'selector' => 'textarea::-webkit-input-placeholder'),
	                                array('property' => 'color', 'label' => esc_html__( 'Color', 'ssc' ).esc_html__( ' Mozilla Firefox Old', 'ssc' ), 'selector' => 'textarea::-moz-placeholder'),
	                                array('property' => 'color', 'label' => esc_html__( 'Color', 'ssc' ).esc_html__( ' Mozilla Firefox New', 'ssc' ), 'selector' => 'textarea:-moz-placeholder'),
	                                array('property' => 'color', 'label' => esc_html__( 'Color', 'ssc' ).esc_html__( ' Internet Explorer', 'ssc' ), 'selector' => 'textarea:-ms-input-placeholder'),
                                ),
                                'Radio - Checkbox' => array(
                                    array('property' => 'color', 'selector' => 'input label, .checkbox'),
                                    array('property' => 'background-color', 'selector' => 'input label, .checkbox'),
                                    array('property' => 'display', 'selector' => 'input label, .checkbox'),
                                    array('property' => 'font-family', 'label' => esc_html__( 'Font Family', 'ssc' ), 'selector' => 'input label, .checkbox'),
                                    array('property' => 'font-size', 'label' => esc_html__( 'Font Size', 'ssc' ), 'selector' => 'input label, .checkbox'),
                                    array('property' => 'line-height', 'label' => esc_html__( 'Line Height', 'ssc' ), 'selector' => 'input label, .checkbox'),
                                    array('property' => 'font-weight', 'label' => esc_html__( 'Font Weight', 'ssc' ), 'selector' => 'input label, .checkbox'),
                                    array('property' => 'text-align', 'selector' => 'input label, .checkbox'),
                                    array('property' => 'text-transform', 'label' => esc_html__( 'Text Transform', 'ssc' ), 'selector' => 'input label, .checkbox'),
                                    array('property' => 'margin', 'label' => esc_html__( 'Margin', 'ssc' ), 'selector' => 'input label, .checkbox'),
                                    array('property' => 'padding', 'label' => esc_html__( 'Padding', 'ssc' ), 'selector' => 'input label, .checkbox'),
                                ),

                                'Submit' => array(
                                    array('property' => 'color', 'selector' => '.caldera-grid input.btn'),
                                    array('property' => 'background', 'selector' => '.caldera-grid input.btn'),
                                    array('property' => 'display', 'selector' => '.caldera-grid input.btn'),
                                    array('property' => 'float', 'label' => esc_html__( 'Float', 'ssc' ), 'selector' => '.caldera-grid input.btn'),
                                    array('property' => 'width', 'label' => esc_html__( 'Width', 'ssc' ), 'selector' => '.caldera-grid input.btn'),
                                    array('property' => 'min-width', 'label' => esc_html__( 'Min Width', 'ssc' ), 'selector' => '.caldera-grid input.btn'),
                                    array('property' => 'height', 'label' => esc_html__( 'Height', 'ssc' ), 'selector' => '.caldera-grid input.btn'),
                                    array('property' => 'font-family', 'label' => esc_html__( 'Font Family', 'ssc' ), 'selector' => '.caldera-grid input.btn'),
                                    array('property' => 'font-size', 'label' => esc_html__( 'Font Size', 'ssc' ), 'selector' => '.caldera-grid input.btn'),
                                    array('property' => 'line-height', 'label' => esc_html__( 'Line Height', 'ssc' ), 'selector' => '.caldera-grid input.btn'),
                                    array('property' => 'font-weight', 'label' => esc_html__( 'Font Weight', 'ssc' ), 'selector' => '.caldera-grid input.btn'),
                                    array('property' => 'text-align', 'selector' => '.caldera-grid input.btn'),
                                    array('property' => 'text-transform', 'label' => esc_html__( 'Text Transform', 'ssc' ), 'selector' => '.caldera-grid input.btn'),
	                                array('property' => 'box-shadow', 'label' => esc_html__( 'Box Shadow', 'ssc' ), 'selector' => '.caldera-grid input.btn'),
                                    array('property' => 'border', 'label' => esc_html__( 'Border', 'ssc' ), 'selector' => '.caldera-grid input.btn'),
                                    array('property' => 'border-radius', 'label' => esc_html__( 'Border Radius', 'ssc' ), 'selector' => '.caldera-grid input.btn'),
                                    array('property' => 'margin', 'label' => esc_html__( 'Margin', 'ssc' ), 'selector' => '.caldera-grid input.btn'),
                                    array('property' => 'padding', 'label' => esc_html__( 'Padding', 'ssc' ), 'selector' => '.caldera-grid input.btn'),
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
                                    array('property' => 'max-width', 'label' => esc_html__( 'Maximum Width', 'ssc' )),
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
                                    array('property' => 'color', 'label' => esc_html__( 'Color', 'ssc' ), 'selector' => 'input, select'),
                                    array('property' => 'background', 'label' => esc_html__( 'Background Color', 'ssc' ), 'selector' => 'input, select'),
                                    array('property' => 'font-family', 'label' => esc_html__( 'Font Family', 'ssc' ), 'selector' => 'input, select'),
                                    array('property' => 'font-size', 'label' => esc_html__( 'Font Size', 'ssc' ), 'selector' => 'input, select'),
                                    array('property' => 'line-height', 'label' => esc_html__( 'Line Height', 'ssc' ), 'selector' => 'input, select'),
                                    array('property' => 'font-weight', 'label' => esc_html__( 'Font Weight', 'ssc' ), 'selector' => 'input, select'),
                                    array('property' => 'text-align', 'selector' => 'input, select'),
                                    array('property' => 'box-shadow', 'label' => esc_html__( 'Box Shadow', 'ssc' ), 'selector' => 'input, select'),
                                    array('property' => 'text-transform', 'label' => esc_html__( 'Text Transform', 'ssc' ), 'selector' => 'input, select'),
                                    array('property' => 'width', 'selector' => 'input, select'),
                                    array('property' => 'height', 'selector' => 'input, select'),
                                    array('property' => 'border', 'selector' => 'input, select'),
                                    array('property' => 'border-radius', 'selector' => 'input, select'),
                                    array('property' => 'margin', 'label' => esc_html__( 'Margin', 'ssc' ), 'selector' => 'input, select'),
                                    array('property' => 'padding', 'selector' => 'input, select'),
                                ),
                                'Columns' => array(
                                    array('property' => 'text-align', 'label' => esc_html__( 'Text Align', 'ssc' ), 'selector' => ' .caldera-grid .row > div'),
                                    array('property' => 'background', 'selector' => ' .caldera-grid .row > div'),
                                    array('property' => 'display', 'label' => esc_html__( 'Display', 'ssc' ), 'selector' => ' .caldera-grid .row > div'),
                                    array('property' => 'float', 'label' => esc_html__( 'Float', 'ssc' ), 'selector' => ' .caldera-grid .row > div'),
                                    array('property' => 'width', 'label' => esc_html__( 'Width', 'ssc' ), 'selector' => ' .caldera-grid .row > div'),
                                    array('property' => 'height', 'label' => esc_html__( 'Height', 'ssc' ), 'selector' => ' .caldera-grid .row > div'),
                                    array('property' => 'box-shadow', 'label' => esc_html__( 'Box Shadow', 'ssc' ), 'selector' => ' .caldera-grid .row > div'),
                                    array('property' => 'opacity', 'label' => esc_html__( 'Opacity', 'ssc' ), 'selector' => ' .caldera-grid .row > div'),
                                    array('property' => 'margin', 'label' => esc_html__( 'Margin', 'ssc' ), 'selector' => ' .caldera-grid .row > div'),
                                    array('property' => 'padding', 'label' => esc_html__( 'Padding', 'ssc' ), 'selector' => ' .caldera-grid .row > div'),
                                    array('property' => 'border', 'label' => esc_html__( 'Border', 'ssc' ), 'selector' => ' .caldera-grid .row > div'),
                                    array('property' => 'border-radius', 'label' => esc_html__( 'Border Radius', 'ssc' ), 'selector' => ' .caldera-grid .row > div'),
                                ),
                                'Text Area' => array(
                                    array('property' => 'color', 'label' => esc_html__( 'Color', 'ssc' ), 'selector' => 'textarea'),
                                    array('property' => 'background', 'label' => esc_html__( 'Background Color', 'ssc' ), 'selector' => 'textarea'),
                                    array('property' => 'font-family', 'label' => esc_html__( 'Font Family', 'ssc' ), 'selector' => 'textarea'),
                                    array('property' => 'font-size', 'label' => esc_html__( 'Font Size', 'ssc' ), 'selector' => 'textarea'),
                                    array('property' => 'line-height', 'label' => esc_html__( 'Line Height', 'ssc' ), 'selector' => 'textarea'),
                                    array('property' => 'font-weight', 'label' => esc_html__( 'Font Weight', 'ssc' ), 'selector' => 'textarea'),
                                    array('property' => 'text-align', 'selector' => 'textarea'),
                                    array('property' => 'box-shadow', 'label' => esc_html__( 'Box Shadow', 'ssc' ), 'selector' => 'textarea'),
                                    array('property' => 'text-transform', 'label' => esc_html__( 'Text Transform', 'ssc' ), 'selector' => 'textarea'),
                                    array('property' => 'width', 'selector' => 'textarea'),
                                    array('property' => 'height', 'selector' => 'textarea'),
                                    array('property' => 'border', 'selector' => 'textarea'),
                                    array('property' => 'border-radius', 'selector' => 'textarea'),
                                    array('property' => 'margin', 'label' => esc_html__( 'Margin', 'ssc' ), 'selector' => 'textarea'),
                                    array('property' => 'padding', 'selector' => 'textarea'),
                                ),

                                'Radio - Checkbox' => array(
                                    array('property' => 'color', 'selector' => 'input label, .checkbox'),
                                    array('property' => 'background-color', 'selector' => 'input label, .checkbox'),
                                    array('property' => 'display', 'selector' => 'input label, .checkbox'),
                                    array('property' => 'font-family', 'label' => esc_html__( 'Font Family', 'ssc' ), 'selector' => 'input label, .checkbox'),
                                    array('property' => 'font-size', 'label' => esc_html__( 'Font Size', 'ssc' ), 'selector' => 'input label, .checkbox'),
                                    array('property' => 'line-height', 'label' => esc_html__( 'Line Height', 'ssc' ), 'selector' => 'input label, .checkbox'),
                                    array('property' => 'font-weight', 'label' => esc_html__( 'Font Weight', 'ssc' ), 'selector' => 'input label, .checkbox'),
                                    array('property' => 'text-align', 'selector' => 'input label, .checkbox'),
                                    array('property' => 'text-transform', 'label' => esc_html__( 'Text Transform', 'ssc' ), 'selector' => 'input label, .checkbox'),
                                    array('property' => 'margin', 'label' => esc_html__( 'Margin', 'ssc' ), 'selector' => 'input label, .checkbox'),
                                    array('property' => 'padding', 'label' => esc_html__( 'Padding', 'ssc' ), 'selector' => 'input label, .checkbox'),
                                ),

                                'Submit' => array(
	                                array('property' => 'color', 'selector' => '.caldera-grid input.btn'),
	                                array('property' => 'background', 'selector' => '.caldera-grid input.btn'),
	                                array('property' => 'display', 'selector' => '.caldera-grid input.btn'),
	                                array('property' => 'float', 'label' => esc_html__( 'Float', 'ssc' ), 'selector' => '.caldera-grid input.btn'),
	                                array('property' => 'width', 'label' => esc_html__( 'Width', 'ssc' ), 'selector' => '.caldera-grid input.btn'),
	                                array('property' => 'min-width', 'label' => esc_html__( 'Min Width', 'ssc' ), 'selector' => '.caldera-grid input.btn'),
	                                array('property' => 'height', 'label' => esc_html__( 'Height', 'ssc' ), 'selector' => '.caldera-grid input.btn'),
	                                array('property' => 'font-family', 'label' => esc_html__( 'Font Family', 'ssc' ), 'selector' => '.caldera-grid input.btn'),
	                                array('property' => 'font-size', 'label' => esc_html__( 'Font Size', 'ssc' ), 'selector' => '.caldera-grid input.btn'),
	                                array('property' => 'line-height', 'label' => esc_html__( 'Line Height', 'ssc' ), 'selector' => '.caldera-grid input.btn'),
	                                array('property' => 'font-weight', 'label' => esc_html__( 'Font Weight', 'ssc' ), 'selector' => '.caldera-grid input.btn'),
	                                array('property' => 'text-align', 'selector' => '.caldera-grid input.btn'),
	                                array('property' => 'text-transform', 'label' => esc_html__( 'Text Transform', 'ssc' ), 'selector' => '.caldera-grid input.btn'),
	                                array('property' => 'box-shadow', 'label' => esc_html__( 'Box Shadow', 'ssc' ), 'selector' => '.caldera-grid input.btn'),
	                                array('property' => 'border', 'label' => esc_html__( 'Border', 'ssc' ), 'selector' => '.caldera-grid input.btn'),
	                                array('property' => 'border-radius', 'label' => esc_html__( 'Border Radius', 'ssc' ), 'selector' => '.caldera-grid input.btn'),
	                                array('property' => 'margin', 'label' => esc_html__( 'Margin', 'ssc' ), 'selector' => '.caldera-grid input.btn'),
	                                array('property' => 'padding', 'label' => esc_html__( 'Padding', 'ssc' ), 'selector' => '.caldera-grid input.btn'),
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
                        'value' => '{`kc-css`:{`any`:{`submit`:{`color|.caldera-grid input.btn:hover`:`#ffffff`,`background|.caldera-grid input.btn:hover`:`eyJjb2xvciI6IiM1YjI5ZWYiLCJsaW5lYXJHcmFkaWVudCI6WyIiXSwiaW1hZ2UiOiJub25lIiwicG9zaXRpb24iOiIwJSAwJSIsInNpemUiOiJhdXRvIiwicmVwZWF0IjoicmVwZWF0IiwiYXR0YWNobWVudCI6InNjcm9sbCIsImFkdmFuY2VkIjowfQ==`}}}}" focus-css="{`kc-css`:{`any`:{`input`:{`box-shadow|input:focus, select:focus`:`none`,`border|input:focus, select:focus`:`1px solid #666666`},`text-area`:{`box-shadow|textarea:focus`:`none`,`border|textarea:focus`:`1px solid #666666`}}}}', // remove this if you do not need a default content
                        'description' => esc_html__( 'Styles for Hover Condition', 'ssc' ),
                        'options' => array(
                            array(
                                'screens' => "any",
                                'Box' => array(
                                    array('property' => 'text-align', 'label' => esc_html__( 'Text Align', 'ssc' ), 'selector' => '+:hover'),
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
                                'Title' => array(
                                    array('property' => 'color', 'label' => esc_html__( 'Color', 'ssc' ), 'selector' => '+:hover h2'),
                                    array('property' => 'background', 'label' => esc_html__( 'Background Color', 'ssc' ), 'selector' => '+:hover h2'),
                                    array('property' => 'font-family', 'label' => esc_html__( 'Font Family', 'ssc' ), 'selector' => '+:hover h2'),
                                    array('property' => 'font-size', 'label' => esc_html__( 'Font Size', 'ssc' ), 'selector' => '+:hover h2'),
                                    array('property' => 'line-height', 'label' => esc_html__( 'Line Height', 'ssc' ), 'selector' => '+:hover h2'),
                                    array('property' => 'font-weight', 'label' => esc_html__( 'Font Weight', 'ssc' ), 'selector' => '+:hover h2'),
                                    array('property' => 'text-align', 'selector' => '+:hover h2'),
                                    array('property' => 'text-transform', 'label' => esc_html__( 'Text Transform', 'ssc' ), 'selector' => '+:hover h2'),
                                    array('property' => 'margin', 'label' => esc_html__( 'Margin', 'ssc' ), 'selector' => '+:hover h2'),
                                    array('property' => 'padding', 'label' => esc_html__( 'Padding', 'ssc' ), 'selector' => '+:hover h2'),
                                ),
                                'Columns' => array(
	                                array('property' => 'width', 'label' => esc_html__( 'Width', 'ssc' ), 'selector' => ' .caldera-grid .row > div'),
	                                array('property' => 'text-align', 'label' => esc_html__( 'Text Align', 'ssc' ), 'selector' => '+:hover .caldera-grid .row > div'),
	                                array('property' => 'background', 'selector' => '+:hover .caldera-grid .row > div'),
	                                array('property' => 'display', 'label' => esc_html__( 'Display', 'ssc' ), 'selector' => '+:hover .caldera-grid .row > div'),
	                                array('property' => 'float', 'label' => esc_html__( 'Float', 'ssc' ), 'selector' => '+:hover .caldera-grid .row > div'),
	                                array('property' => 'width', 'label' => esc_html__( 'Width', 'ssc' ), 'selector' => '+:hover .caldera-grid .row > div'),
	                                array('property' => 'height', 'label' => esc_html__( 'Height', 'ssc' ), 'selector' => '+:hover .caldera-grid .row > div'),
	                                array('property' => 'box-shadow', 'label' => esc_html__( 'Box Shadow', 'ssc' ), 'selector' => '+:hover .caldera-grid .row > div'),
	                                array('property' => 'opacity', 'label' => esc_html__( 'Opacity', 'ssc' ), 'selector' => '+:hover .caldera-grid .row > div'),
	                                array('property' => 'margin', 'label' => esc_html__( 'Margin', 'ssc' ), 'selector' => '+:hover .caldera-grid .row > div'),
	                                array('property' => 'padding', 'label' => esc_html__( 'Padding', 'ssc' ), 'selector' => '+:hover .caldera-grid .row > div'),
	                                array('property' => 'border', 'label' => esc_html__( 'Border', 'ssc' ), 'selector' => '+:hover .caldera-grid .row > div'),
	                                array('property' => 'border-radius', 'label' => esc_html__( 'Border Radius', 'ssc' ), 'selector' => '+:hover .caldera-grid .row > div'),
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
                                    array('property' => 'color', 'label' => esc_html__( 'Color', 'ssc' ), 'selector' => 'input:hover, select:hover'),
                                    array('property' => 'background', 'label' => esc_html__( 'Background Color', 'ssc' ), 'selector' => 'input:hover, select:hover'),
                                    array('property' => 'font-family', 'label' => esc_html__( 'Font Family', 'ssc' ), 'selector' => 'input:hover, select:hover'),
                                    array('property' => 'font-size', 'label' => esc_html__( 'Font Size', 'ssc' ), 'selector' => 'input:hover, select:hover'),
                                    array('property' => 'line-height', 'label' => esc_html__( 'Line Height', 'ssc' ), 'selector' => 'input:hover, select:hover'),
                                    array('property' => 'font-weight', 'label' => esc_html__( 'Font Weight', 'ssc' ), 'selector' => 'input:hover, select:hover'),
                                    array('property' => 'text-align', 'selector' => 'input:hover, select:hover'),
                                    array('property' => 'box-shadow', 'label' => esc_html__( 'Box Shadow', 'ssc' ), 'selector' => 'input:hover, select:hover'),
                                    array('property' => 'text-transform', 'label' => esc_html__( 'Text Transform', 'ssc' ), 'selector' => 'input:hover, select:hover'),
                                    array('property' => 'width', 'selector' => 'input:hover, select:hover'),
                                    array('property' => 'height', 'selector' => 'input:hover, select:hover'),
                                    array('property' => 'border', 'selector' => 'input:hover, select:hover'),
                                    array('property' => 'border-radius', 'selector' => 'input:hover, select:hover'),
                                    array('property' => 'margin', 'label' => esc_html__( 'Margin', 'ssc' ), 'selector' => 'input:hover, select:hover'),
                                    array('property' => 'padding', 'selector' => 'input:hover, select:hover'),
                                ),
                                'Text Area' => array(
                                    array('property' => 'color', 'label' => esc_html__( 'Color', 'ssc' ), 'selector' => 'textarea:hover'),
                                    array('property' => 'background', 'label' => esc_html__( 'Background Color', 'ssc' ), 'selector' => 'textarea:hover'),
                                    array('property' => 'font-family', 'label' => esc_html__( 'Font Family', 'ssc' ), 'selector' => 'textarea:hover'),
                                    array('property' => 'font-size', 'label' => esc_html__( 'Font Size', 'ssc' ), 'selector' => 'textarea:hover'),
                                    array('property' => 'line-height', 'label' => esc_html__( 'Line Height', 'ssc' ), 'selector' => 'textarea:hover'),
                                    array('property' => 'font-weight', 'label' => esc_html__( 'Font Weight', 'ssc' ), 'selector' => 'textarea:hover'),
                                    array('property' => 'text-align', 'selector' => 'textarea:hover'),
                                    array('property' => 'box-shadow', 'label' => esc_html__( 'Box Shadow', 'ssc' ), 'selector' => 'textarea:hover'),
                                    array('property' => 'text-transform', 'label' => esc_html__( 'Text Transform', 'ssc' ), 'selector' => 'textarea:hover'),
                                    array('property' => 'width', 'selector' => 'textarea:hover'),
                                    array('property' => 'height', 'selector' => 'textarea:hover'),
                                    array('property' => 'border', 'selector' => 'textarea:hover'),
                                    array('property' => 'border-radius', 'selector' => 'textarea:hover'),
                                    array('property' => 'margin', 'label' => esc_html__( 'Margin', 'ssc' ), 'selector' => 'textarea:hover'),
                                    array('property' => 'padding', 'selector' => 'textarea:hover'),
                                ),

                                'Radio - Checkbox' => array(
                                    array('property' => 'color', 'selector' => '.radio:hover, .checkbox:hover'),
                                    array('property' => 'background-color', 'selector' => '.radio:hover, .checkbox:hover'),
                                    array('property' => 'display', 'selector' => '.radio:hover, .checkbox:hover'),
                                    array('property' => 'font-family', 'label' => esc_html__( 'Font Family', 'ssc' ), 'selector' => '.radio:hover, .checkbox:hover'),
                                    array('property' => 'font-size', 'label' => esc_html__( 'Font Size', 'ssc' ), 'selector' => '.radio:hover, .checkbox:hover'),
                                    array('property' => 'line-height', 'label' => esc_html__( 'Line Height', 'ssc' ), 'selector' => '.radio:hover, .checkbox:hover'),
                                    array('property' => 'font-weight', 'label' => esc_html__( 'Font Weight', 'ssc' ), 'selector' => '.radio:hover, .checkbox:hover'),
                                    array('property' => 'text-align', 'selector' => '.radio:hover, .checkbox:hover'),
                                    array('property' => 'text-transform', 'label' => esc_html__( 'Text Transform', 'ssc' ), 'selector' => '.radio:hover, .checkbox:hover'),
                                    array('property' => 'margin', 'label' => esc_html__( 'Margin', 'ssc' ), 'selector' => '.radio:hover, .checkbox:hover'),
                                    array('property' => 'padding', 'label' => esc_html__( 'Padding', 'ssc' ), 'selector' => '.radio:hover, .checkbox:hover'),
                                ),

                                'Submit' => array(
                                    array('property' => 'color', 'selector' => '.caldera-grid input.btn:hover'),
                                    array('property' => 'background', 'selector' => '.caldera-grid input.btn:hover'),
                                    array('property' => 'display', 'selector' => '.caldera-grid input.btn:hover'),
                                    array('property' => 'float', 'label' => esc_html__( 'Float', 'ssc' ), 'selector' => '.caldera-grid input.btn:hover'),
                                    array('property' => 'width', 'label' => esc_html__( 'Width', 'ssc' ), 'selector' => '.caldera-grid input.btn:hover'),
                                    array('property' => 'font-family', 'label' => esc_html__( 'Font Family', 'ssc' ), 'selector' => '.caldera-grid input.btn:hover'),
                                    array('property' => 'font-size', 'label' => esc_html__( 'Font Size', 'ssc' ), 'selector' => '.caldera-grid input.btn:hover'),
                                    array('property' => 'line-height', 'label' => esc_html__( 'Line Height', 'ssc' ), 'selector' => '.caldera-grid input.btn:hover'),
                                    array('property' => 'font-weight', 'label' => esc_html__( 'Font Weight', 'ssc' ), 'selector' => '.caldera-grid input.btn:hover'),
                                    array('property' => 'text-align', 'selector' => '.caldera-grid input.btn:hover'),
                                    array('property' => 'text-transform', 'label' => esc_html__( 'Text Transform', 'ssc' ), 'selector' => '.caldera-grid input.btn:hover'),
	                                array('property' => 'box-shadow', 'label' => esc_html__( 'Box Shadow', 'ssc' ), 'selector' => '.caldera-grid input.btn:hover'),
                                    array('property' => 'border', 'label' => esc_html__( 'Border', 'ssc' ), 'selector' => '.caldera-grid input.btn:hover'),
                                    array('property' => 'border-radius', 'label' => esc_html__( 'Border Radius', 'ssc' ), 'selector' => '.caldera-grid input.btn:hover'),
                                    array('property' => 'margin', 'label' => esc_html__( 'Margin', 'ssc' ), 'selector' => '.caldera-grid input.btn:hover'),
                                    array('property' => 'padding', 'label' => esc_html__( 'Padding', 'ssc' ), 'selector' => '.caldera-grid input.btn:hover'),
                                )

                            ),
                            array(
                                "screens" => "999,768,667,479",
                                'Box' => array(
                                    array('property' => 'text-align', 'label' => esc_html__( 'Text Align', 'ssc' ), 'selector' => '+:hover'),
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
                                'Title' => array(
                                    array('property' => 'color', 'label' => esc_html__( 'Color', 'ssc' ), 'selector' => '+:hover h2'),
                                    array('property' => 'background', 'label' => esc_html__( 'Background Color', 'ssc' ), 'selector' => '+:hover h2'),
                                    array('property' => 'font-family', 'label' => esc_html__( 'Font Family', 'ssc' ), 'selector' => '+:hover h2'),
                                    array('property' => 'font-size', 'label' => esc_html__( 'Font Size', 'ssc' ), 'selector' => '+:hover h2'),
                                    array('property' => 'line-height', 'label' => esc_html__( 'Line Height', 'ssc' ), 'selector' => '+:hover h2'),
                                    array('property' => 'font-weight', 'label' => esc_html__( 'Font Weight', 'ssc' ), 'selector' => '+:hover h2'),
                                    array('property' => 'text-align', 'selector' => '+:hover h2'),
                                    array('property' => 'text-transform', 'label' => esc_html__( 'Text Transform', 'ssc' ), 'selector' => '+:hover h2'),
                                    array('property' => 'margin', 'label' => esc_html__( 'Margin', 'ssc' ), 'selector' => '+:hover h2'),
                                    array('property' => 'padding', 'label' => esc_html__( 'Padding', 'ssc' ), 'selector' => '+:hover h2'),
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
                                    array('property' => 'color', 'label' => esc_html__( 'Color', 'ssc' ), 'selector' => 'input:hover, select:hover'),
                                    array('property' => 'background', 'label' => esc_html__( 'Background Color', 'ssc' ), 'selector' => 'input:hover, select:hover'),
                                    array('property' => 'font-family', 'label' => esc_html__( 'Font Family', 'ssc' ), 'selector' => 'input:hover, select:hover'),
                                    array('property' => 'font-size', 'label' => esc_html__( 'Font Size', 'ssc' ), 'selector' => 'input:hover, select:hover'),
                                    array('property' => 'line-height', 'label' => esc_html__( 'Line Height', 'ssc' ), 'selector' => 'input:hover, select:hover'),
                                    array('property' => 'font-weight', 'label' => esc_html__( 'Font Weight', 'ssc' ), 'selector' => 'input:hover, select:hover'),
                                    array('property' => 'text-align', 'selector' => 'input:hover, select:hover'),
                                    array('property' => 'box-shadow', 'label' => esc_html__( 'Box Shadow', 'ssc' ), 'selector' => 'input:hover, select:hover'),
                                    array('property' => 'text-transform', 'label' => esc_html__( 'Text Transform', 'ssc' ), 'selector' => 'input:hover, select:hover'),
                                    array('property' => 'width', 'selector' => 'input:hover, select:hover'),
                                    array('property' => 'height', 'selector' => 'input:hover, select:hover'),
                                    array('property' => 'border', 'selector' => 'input:hover, select:hover'),
                                    array('property' => 'border-radius', 'selector' => 'input:hover, select:hover'),
                                    array('property' => 'margin', 'label' => esc_html__( 'Margin', 'ssc' ), 'selector' => 'input:hover, select:hover'),
                                    array('property' => 'padding', 'selector' => 'input:hover, select:hover'),
                                ),
                                'Text Area' => array(
                                    array('property' => 'color', 'label' => esc_html__( 'Color', 'ssc' ), 'selector' => 'textarea:hover'),
                                    array('property' => 'background', 'label' => esc_html__( 'Background Color', 'ssc' ), 'selector' => 'textarea:hover'),
                                    array('property' => 'font-family', 'label' => esc_html__( 'Font Family', 'ssc' ), 'selector' => 'textarea:hover'),
                                    array('property' => 'font-size', 'label' => esc_html__( 'Font Size', 'ssc' ), 'selector' => 'textarea:hover'),
                                    array('property' => 'line-height', 'label' => esc_html__( 'Line Height', 'ssc' ), 'selector' => 'textarea:hover'),
                                    array('property' => 'font-weight', 'label' => esc_html__( 'Font Weight', 'ssc' ), 'selector' => 'textarea:hover'),
                                    array('property' => 'text-align', 'selector' => 'textarea:hover'),
                                    array('property' => 'box-shadow', 'label' => esc_html__( 'Box Shadow', 'ssc' ), 'selector' => 'textarea:hover'),
                                    array('property' => 'text-transform', 'label' => esc_html__( 'Text Transform', 'ssc' ), 'selector' => 'textarea:hover'),
                                    array('property' => 'width', 'selector' => 'textarea:hover'),
                                    array('property' => 'height', 'selector' => 'textarea:hover'),
                                    array('property' => 'border', 'selector' => 'textarea:hover'),
                                    array('property' => 'border-radius', 'selector' => 'textarea:hover'),
                                    array('property' => 'margin', 'label' => esc_html__( 'Margin', 'ssc' ), 'selector' => 'textarea:hover'),
                                    array('property' => 'padding', 'selector' => 'textarea:hover'),
                                ),
                                'Radio - Checkbox' => array(
                                    array('property' => 'color', 'selector' => '.radio:hover, .checkbox:hover'),
                                    array('property' => 'background-color', 'selector' => '.radio:hover, .checkbox:hover'),
                                    array('property' => 'display', 'selector' => '.radio:hover, .checkbox:hover'),
                                    array('property' => 'font-family', 'label' => esc_html__( 'Font Family', 'ssc' ), 'selector' => '.radio:hover, .checkbox:hover'),
                                    array('property' => 'font-size', 'label' => esc_html__( 'Font Size', 'ssc' ), 'selector' => '.radio:hover, .checkbox:hover'),
                                    array('property' => 'line-height', 'label' => esc_html__( 'Line Height', 'ssc' ), 'selector' => '.radio:hover, .checkbox:hover'),
                                    array('property' => 'font-weight', 'label' => esc_html__( 'Font Weight', 'ssc' ), 'selector' => '.radio:hover, .checkbox:hover'),
                                    array('property' => 'text-align', 'selector' => '.radio:hover, .checkbox:hover'),
                                    array('property' => 'text-transform', 'label' => esc_html__( 'Text Transform', 'ssc' ), 'selector' => '.radio:hover, .checkbox:hover'),
                                    array('property' => 'margin', 'label' => esc_html__( 'Margin', 'ssc' ), 'selector' => '.radio:hover, .checkbox:hover'),
                                    array('property' => 'padding', 'label' => esc_html__( 'Padding', 'ssc' ), 'selector' => '.radio:hover, .checkbox:hover'),
                                ),

                                'Submit' => array(
                                    array('property' => 'color', 'selector' => '.caldera-grid input.btn:hover'),
                                    array('property' => 'background', 'selector' => '.caldera-grid input.btn:hover'),
                                    array('property' => 'display', 'selector' => '.caldera-grid input.btn:hover'),
                                    array('property' => 'float', 'label' => esc_html__( 'Float', 'ssc' ), 'selector' => '.caldera-grid input.btn:hover'),
                                    array('property' => 'width', 'label' => esc_html__( 'Width', 'ssc' ), 'selector' => '.caldera-grid input.btn:hover'),
                                    array('property' => 'font-family', 'label' => esc_html__( 'Font Family', 'ssc' ), 'selector' => '.caldera-grid input.btn:hover'),
                                    array('property' => 'font-size', 'label' => esc_html__( 'Font Size', 'ssc' ), 'selector' => '.caldera-grid input.btn:hover'),
                                    array('property' => 'line-height', 'label' => esc_html__( 'Line Height', 'ssc' ), 'selector' => '.caldera-grid input.btn:hover'),
                                    array('property' => 'font-weight', 'label' => esc_html__( 'Font Weight', 'ssc' ), 'selector' => '.caldera-grid input.btn:hover'),
                                    array('property' => 'text-align', 'selector' => '.caldera-grid input.btn:hover'),
                                    array('property' => 'text-transform', 'label' => esc_html__( 'Text Transform', 'ssc' ), 'selector' => '.caldera-grid input.btn:hover'),
                                    array('property' => 'border', 'label' => esc_html__( 'Border', 'ssc' ), 'selector' => '.caldera-grid input.btn:hover'),
                                    array('property' => 'border-radius', 'label' => esc_html__( 'Border Radius', 'ssc' ), 'selector' => '.caldera-grid input.btn:hover'),
                                    array('property' => 'margin', 'label' => esc_html__( 'Margin', 'ssc' ), 'selector' => '.caldera-grid input.btn:hover'),
                                    array('property' => 'padding', 'label' => esc_html__( 'Padding', 'ssc' ), 'selector' => '.caldera-grid input.btn:hover'),
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
                        'value' => '{`kc-css`:{`any`:{`input`:{`border|input:focus`:`2px solid #768188`},`text-area`:{`border|textarea:focus`:`2px solid #768188`}}}}', // remove this if you do not need a default content
                        'description' => esc_html__( 'Styles for focus Condition', 'ssc' ),
                        'options' => array(
                            array(
                                'screens' => "any",
                                'Input' => array(
                                    array('property' => 'color', 'label' => esc_html__( 'Color', 'ssc' ), 'selector' => 'input:focus, select:focus'),
                                    array('property' => 'background', 'label' => esc_html__( 'Background Color', 'ssc' ), 'selector' => 'input:focus, select:focus'),
                                    array('property' => 'font-family', 'label' => esc_html__( 'Font Family', 'ssc' ), 'selector' => 'input:focus, select:focus'),
                                    array('property' => 'font-size', 'label' => esc_html__( 'Font Size', 'ssc' ), 'selector' => 'input:focus, select:focus'),
                                    array('property' => 'line-height', 'label' => esc_html__( 'Line Height', 'ssc' ), 'selector' => 'input:focus, select:focus'),
                                    array('property' => 'font-weight', 'label' => esc_html__( 'Font Weight', 'ssc' ), 'selector' => 'input:focus, select:focus'),
                                    array('property' => 'text-align', 'selector' => 'input:focus, select:focus'),
                                    array('property' => 'box-shadow', 'label' => esc_html__( 'Box Shadow', 'ssc' ), 'selector' => 'input:focus, select:focus'),
                                    array('property' => 'text-transform', 'label' => esc_html__( 'Text Transform', 'ssc' ), 'selector' => 'input:focus, select:focus'),
                                    array('property' => 'width', 'selector' => 'input:focus, select:focus'),
                                    array('property' => 'height', 'selector' => 'input:focus, select:focus'),
                                    array('property' => 'border', 'selector' => 'input:focus, select:focus'),
                                    array('property' => 'border-radius', 'selector' => 'input:focus, select:focus'),
                                    array('property' => 'margin', 'label' => esc_html__( 'Margin', 'ssc' ), 'selector' => 'input:focus, select:focus'),
                                    array('property' => 'padding', 'selector' => 'input:focus, select:focus'),
                                ),
                                'Text Area' => array(
                                    array('property' => 'color', 'label' => esc_html__( 'Color', 'ssc' ), 'selector' => 'textarea:focus'),
                                    array('property' => 'background', 'label' => esc_html__( 'Background Color', 'ssc' ), 'selector' => 'textarea:focus'),
                                    array('property' => 'font-family', 'label' => esc_html__( 'Font Family', 'ssc' ), 'selector' => 'textarea:focus'),
                                    array('property' => 'font-size', 'label' => esc_html__( 'Font Size', 'ssc' ), 'selector' => 'textarea:focus'),
                                    array('property' => 'line-height', 'label' => esc_html__( 'Line Height', 'ssc' ), 'selector' => 'textarea:focus'),
                                    array('property' => 'font-weight', 'label' => esc_html__( 'Font Weight', 'ssc' ), 'selector' => 'textarea:focus'),
                                    array('property' => 'text-align', 'selector' => 'textarea:focus'),
                                    array('property' => 'box-shadow', 'label' => esc_html__( 'Box Shadow', 'ssc' ), 'selector' => 'textarea:focus'),
                                    array('property' => 'text-transform', 'label' => esc_html__( 'Text Transform', 'ssc' ), 'selector' => 'textarea:focus'),
                                    array('property' => 'width', 'selector' => 'textarea:focus'),
                                    array('property' => 'height', 'selector' => 'textarea:focus'),
                                    array('property' => 'border', 'selector' => 'textarea:focus'),
                                    array('property' => 'border-radius', 'selector' => 'textarea:focus'),
                                    array('property' => 'margin', 'label' => esc_html__( 'Margin', 'ssc' ), 'selector' => 'textarea:focus'),
                                    array('property' => 'padding', 'selector' => 'textarea:focus'),
                                ),
                                'Radio - Checkbox' => array(
                                    array('property' => 'color', 'selector' => '.radio:focus, .checkbox:focus'),
                                    array('property' => 'background-color', 'selector' => '.radio:focus, .checkbox:focus'),
                                    array('property' => 'display', 'selector' => '.radio:focus, .checkbox:focus'),
                                    array('property' => 'font-family', 'label' => esc_html__( 'Font Family', 'ssc' ), 'selector' => '.radio:focus, .checkbox:focus'),
                                    array('property' => 'font-size', 'label' => esc_html__( 'Font Size', 'ssc' ), 'selector' => '.radio:focus, .checkbox:focus'),
                                    array('property' => 'line-height', 'label' => esc_html__( 'Line Height', 'ssc' ), 'selector' => '.radio:focus, .checkbox:focus'),
                                    array('property' => 'font-weight', 'label' => esc_html__( 'Font Weight', 'ssc' ), 'selector' => '.radio:focus, .checkbox:focus'),
                                    array('property' => 'text-align', 'selector' => '.radio:focus, .checkbox:focus'),
                                    array('property' => 'text-transform', 'label' => esc_html__( 'Text Transform', 'ssc' ), 'selector' => '.radio:focus, .checkbox:focus'),
                                    array('property' => 'margin', 'label' => esc_html__( 'Margin', 'ssc' ), 'selector' => '.radio:focus, .checkbox:focus'),
                                    array('property' => 'padding', 'label' => esc_html__( 'Padding', 'ssc' ), 'selector' => '.radio:focus, .checkbox:focus'),
                                ),

                                'Submit' => array(
                                    array('property' => 'color', 'selector' => '.caldera-grid input.btn:focus'),
                                    array('property' => 'background', 'selector' => '.caldera-grid input.btn:focus'),
                                    array('property' => 'display', 'selector' => '.caldera-grid input.btn:focus'),
                                    array('property' => 'font-family', 'label' => esc_html__( 'Font Family', 'ssc' ), 'selector' => '.caldera-grid input.btn:focus'),
                                    array('property' => 'font-size', 'label' => esc_html__( 'Font Size', 'ssc' ), 'selector' => '.caldera-grid input.btn:focus'),
                                    array('property' => 'line-height', 'label' => esc_html__( 'Line Height', 'ssc' ), 'selector' => '.caldera-grid input.btn:focus'),
                                    array('property' => 'font-weight', 'label' => esc_html__( 'Font Weight', 'ssc' ), 'selector' => '.caldera-grid input.btn:focus'),
                                    array('property' => 'text-align', 'selector' => '.caldera-grid input.btn:focus'),
                                    array('property' => 'text-transform', 'label' => esc_html__( 'Text Transform', 'ssc' ), 'selector' => '.caldera-grid input.btn:focus'),
                                    array('property' => 'border', 'label' => esc_html__( 'Border', 'ssc' ), 'selector' => '.caldera-grid input.btn:focus'),
                                    array('property' => 'border-radius', 'label' => esc_html__( 'Border Radius', 'ssc' ), 'selector' => '.caldera-grid input.btn:focus'),
                                    array('property' => 'margin', 'label' => esc_html__( 'Margin', 'ssc' ), 'selector' => '.caldera-grid input.btn:focus'),
                                    array('property' => 'padding', 'label' => esc_html__( 'Padding', 'ssc' ), 'selector' => '.caldera-grid input.btn:focus'),
                                )

                            ),
                            array(
                                "screens" => "999,768,667,480",
                                'Input' => array(
                                    array('property' => 'color', 'label' => esc_html__( 'Color', 'ssc' ), 'selector' => 'input:focus, select:focus'),
                                    array('property' => 'background', 'label' => esc_html__( 'Background Color', 'ssc' ), 'selector' => 'input:focus, select:focus'),
                                    array('property' => 'font-family', 'label' => esc_html__( 'Font Family', 'ssc' ), 'selector' => 'input:focus, select:focus'),
                                    array('property' => 'font-size', 'label' => esc_html__( 'Font Size', 'ssc' ), 'selector' => 'input:focus, select:focus'),
                                    array('property' => 'line-height', 'label' => esc_html__( 'Line Height', 'ssc' ), 'selector' => 'input:focus, select:focus'),
                                    array('property' => 'font-weight', 'label' => esc_html__( 'Font Weight', 'ssc' ), 'selector' => 'input:focus, select:focus'),
                                    array('property' => 'text-align', 'selector' => 'input:focus, select:focus'),
                                    array('property' => 'box-shadow', 'label' => esc_html__( 'Box Shadow', 'ssc' ), 'selector' => 'input:focus, select:focus'),
                                    array('property' => 'text-transform', 'label' => esc_html__( 'Text Transform', 'ssc' ), 'selector' => 'input:focus, select:focus'),
                                    array('property' => 'width', 'selector' => 'input:focus, select:focus'),
                                    array('property' => 'height', 'selector' => 'input:focus, select:focus'),
                                    array('property' => 'border', 'selector' => 'input:focus, select:focus'),
                                    array('property' => 'border-radius', 'selector' => 'input:focus, select:focus'),
                                    array('property' => 'margin', 'label' => esc_html__( 'Margin', 'ssc' ), 'selector' => 'input:focus, select:focus'),
                                    array('property' => 'padding', 'selector' => 'input:focus, select:focus'),
                                ),
                                'Text Area' => array(
                                    array('property' => 'color', 'label' => esc_html__( 'Color', 'ssc' ), 'selector' => 'textarea:focus'),
                                    array('property' => 'background', 'label' => esc_html__( 'Background Color', 'ssc' ), 'selector' => 'textarea:focus'),
                                    array('property' => 'font-family', 'label' => esc_html__( 'Font Family', 'ssc' ), 'selector' => 'textarea:focus'),
                                    array('property' => 'font-size', 'label' => esc_html__( 'Font Size', 'ssc' ), 'selector' => 'textarea:focus'),
                                    array('property' => 'line-height', 'label' => esc_html__( 'Line Height', 'ssc' ), 'selector' => 'textarea:focus'),
                                    array('property' => 'font-weight', 'label' => esc_html__( 'Font Weight', 'ssc' ), 'selector' => 'textarea:focus'),
                                    array('property' => 'text-align', 'selector' => 'textarea:focus'),
                                    array('property' => 'box-shadow', 'label' => esc_html__( 'Box Shadow', 'ssc' ), 'selector' => 'textarea:focus'),
                                    array('property' => 'text-transform', 'label' => esc_html__( 'Text Transform', 'ssc' ), 'selector' => 'textarea:focus'),
                                    array('property' => 'width', 'selector' => 'textarea:focus'),
                                    array('property' => 'height', 'selector' => 'textarea:focus'),
                                    array('property' => 'border', 'selector' => 'textarea:focus'),
                                    array('property' => 'border-radius', 'selector' => 'textarea:focus'),
                                    array('property' => 'margin', 'label' => esc_html__( 'Margin', 'ssc' ), 'selector' => 'textarea:focus'),
                                    array('property' => 'padding', 'selector' => 'textarea:focus'),
                                ),
                                'Radio - Checkbox' => array(
                                    array('property' => 'color', 'selector' => '.radio:focus, .checkbox:focus'),
                                    array('property' => 'background-color', 'selector' => '.radio:focus, .checkbox:focus'),
                                    array('property' => 'display', 'selector' => '.radio:focus, .checkbox:focus'),
                                    array('property' => 'font-family', 'label' => esc_html__( 'Font Family', 'ssc' ), 'selector' => '.radio:focus, .checkbox:focus'),
                                    array('property' => 'font-size', 'label' => esc_html__( 'Font Size', 'ssc' ), 'selector' => '.radio:focus, .checkbox:focus'),
                                    array('property' => 'line-height', 'label' => esc_html__( 'Line Height', 'ssc' ), 'selector' => '.radio:focus, .checkbox:focus'),
                                    array('property' => 'font-weight', 'label' => esc_html__( 'Font Weight', 'ssc' ), 'selector' => '.radio:focus, .checkbox:focus'),
                                    array('property' => 'text-align', 'selector' => '.radio:focus, .checkbox:focus'),
                                    array('property' => 'text-transform', 'label' => esc_html__( 'Text Transform', 'ssc' ), 'selector' => '.radio:focus, .checkbox:focus'),
                                    array('property' => 'margin', 'label' => esc_html__( 'Margin', 'ssc' ), 'selector' => '.radio:focus, .checkbox:focus'),
                                    array('property' => 'padding', 'label' => esc_html__( 'Padding', 'ssc' ), 'selector' => '.radio:focus, .checkbox:focus'),
                                ),

                                'Submit' => array(
                                    array('property' => 'color', 'selector' => '.caldera-grid input.btn:focus'),
                                    array('property' => 'background', 'selector' => '.caldera-grid input.btn:focus'),
                                    array('property' => 'display', 'selector' => '.caldera-grid input.btn:focus'),
                                    array('property' => 'font-family', 'label' => esc_html__( 'Font Family', 'ssc' ), 'selector' => '.caldera-grid input.btn:focus'),
                                    array('property' => 'font-size', 'label' => esc_html__( 'Font Size', 'ssc' ), 'selector' => '.caldera-grid input.btn:focus'),
                                    array('property' => 'line-height', 'label' => esc_html__( 'Line Height', 'ssc' ), 'selector' => '.caldera-grid input.btn:focus'),
                                    array('property' => 'font-weight', 'label' => esc_html__( 'Font Weight', 'ssc' ), 'selector' => '.caldera-grid input.btn:focus'),
                                    array('property' => 'text-align', 'selector' => '.caldera-grid input.btn:focus'),
                                    array('property' => 'text-transform', 'label' => esc_html__( 'Text Transform', 'ssc' ), 'selector' => '.caldera-grid input.btn:focus'),
                                    array('property' => 'border', 'label' => esc_html__( 'Border', 'ssc' ), 'selector' => '.caldera-grid input.btn:focus'),
                                    array('property' => 'border-radius', 'label' => esc_html__( 'Border Radius', 'ssc' ), 'selector' => '.caldera-grid input.btn:focus'),
                                    array('property' => 'margin', 'label' => esc_html__( 'Margin', 'ssc' ), 'selector' => '.caldera-grid input.btn:focus'),
                                    array('property' => 'padding', 'label' => esc_html__( 'Padding', 'ssc' ), 'selector' => '.caldera-grid input.btn:focus'),
                                )

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
function ssc_caldera_form_shortcode($atts, $content = null) {
    extract(shortcode_atts(array(
        'title'         => '',
        'form_id'         => '',
        'el_class'         => '',
        'pl_color'         => '',

    ) , $atts));

    $output = '';

    $wrp_classes = apply_filters( 'kc-el-class', $atts );
    $output .= '<div  class="ssc_caldf '.implode( ' ', $wrp_classes ) . ' '.$el_class.'">';
    if ( !empty( $title ) ) {
        $output .= '<h2>'. $title .'</h2>';
    }
    if ( ! empty( $form_id ) ) {
        $output .= do_shortcode( '[caldera_form id="'. $form_id .'"]' );
    } else {
        $output .= __('Please select one of Caldera form for display.', 'ssc');
    }

    $output .= '</div>';

    return $output;
}

function sst_caldera_forms(){
    $cald_forms = array();
    $forms = Caldera_Forms_Forms::get_forms(true);
    if ( ! empty ( $forms ) && is_array( $forms ) ) {
        $cald_forms[] = __( 'Select Caldera Form', 'sst' );
        foreach ( $forms as $form ) {
            $cald_forms[$form['ID']] = $form['name'];
        }
    } else {

        $cald_forms[0] = __( 'No contact forms found', 'kingcomposer' );

    }

    return $cald_forms;
}

add_shortcode('ssc_caldf', 'ssc_caldera_form_shortcode');

add_filter( 'shortcode_ssc_caldf_before_css_generating', 'ssc_caldf_filter_css', 1 );

function ssc_caldf_filter_css( $atts ) {
	extract( shortcode_atts( array(
		'pl_color' => '',
	),
		$atts ) );
	if ( '' !== $pl_color ) {
		if ( ! empty ( $atts['my-css'] ) ) {
			$styles = json_decode( str_replace( '`', '"', $atts['my-css'] ), true);
		}
		$styles['kc-css']['any']['placeholder']['color| input::-webkit-input-placeholder'] =
		$styles['kc-css']['any']['placeholder']['color| input::-webkit-input-placeholder'] =
		$styles['kc-css']['any']['placeholder']['color| input::-webkit-input-placeholder'] =
		$styles['kc-css']['any']['placeholder']['color| input::-webkit-input-placeholder'] =
		$styles['kc-css']['any']['placeholder']['color| input::-webkit-input-placeholder'] =
		$styles['kc-css']['any']['placeholder']['color| textarea::-webkit-input-placeholder'] =
		$styles['kc-css']['any']['placeholder']['color| input:-ms-input-placeholder'] =
		$styles['kc-css']['any']['placeholder']['color| input:-ms-input-placeholder'] =
		$styles['kc-css']['any']['placeholder']['color| input:-ms-input-placeholder'] =
		$styles['kc-css']['any']['placeholder']['color| input:-ms-input-placeholder'] =
		$styles['kc-css']['any']['placeholder']['color| input:-ms-input-placeholder'] =
		$styles['kc-css']['any']['placeholder']['color| textarea:-ms-input-placeholder'] =
		$styles['kc-css']['any']['placeholder']['color| input::-moz-placeholder'] =
		$styles['kc-css']['any']['placeholder']['color| input::-moz-placeholder'] =
		$styles['kc-css']['any']['placeholder']['color| input::-moz-placeholder'] =
		$styles['kc-css']['any']['placeholder']['color| input::-moz-placeholder'] =
		$styles['kc-css']['any']['placeholder']['color| input::-moz-placeholder'] =
		$styles['kc-css']['any']['placeholder']['color| textarea::-moz-placeholder'] = $pl_color;

		$atts['my-css'] = str_replace( '"', '`', json_encode( $styles, JSON_FORCE_OBJECT  ) );
	}

	return $atts;
}
