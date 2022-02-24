<?php
add_action('init', 'ssc_pagetitle_params', 99);

/**
 * Additional functions
 */

/**
 * Additional functions
 */


function ssc_pagetitle_params() {
    global $kc;

     $kc->add_map(array(
        'ssc_pagetitle' => array(
            'name' => esc_html__( 'Dynamic Page Title', 'ssc' ),
            'description' => esc_html__( 'It displays a dynamic page title. Use it for headers', 'ssc' ),
            'icon' => 'kc-icon-box ssc-icon-5',
            // 'is_container' => true,
            'category' => 'SecretLab',
            'css_box' => true,
            'params' => array(
                esc_html__( 'General', 'ssc' ) => array(
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
                        'label' => esc_html__( 'Styling', 'ssc' ),
                        'type' => 'css',
                        'value' => '', // remove this if you do not need a default content
                        //'options' => array(), register css properties, selectors and screens
                        'description' => esc_html__( 'Styles', 'ssc' ),
                        'options' => array(
                            array(
                                'screens' => "any",
                                'Typography' => array(
                                    array('property' => 'color', 'label' => esc_html__( 'Color', 'ssc' )),
                                    array('property' => 'font-size', 'label' => esc_html__( 'Font Size', 'ssc' )),
                                    array('property' => 'font-weight', 'label' => esc_html__( 'Font Weight', 'ssc' )),
                                    array('property' => 'font-style', 'label' => esc_html__( 'Font Style', 'ssc' )),
                                    array('property' => 'font-family', 'label' => esc_html__( 'Font Family', 'ssc' )),
                                    array('property' => 'text-align', 'label' => esc_html__( 'Text Align', 'ssc' )),
                                    array('property' => 'text-shadow', 'label' => esc_html__( 'Text Shadow', 'ssc' )),
                                    array('property' => 'text-transform', 'label' => esc_html__( 'Text Transform', 'ssc' )),
                                    array('property' => 'text-decoration', 'label' => esc_html__( 'Text Decoration', 'ssc' )),
                                    array('property' => 'line-height', 'label' => esc_html__( 'Line Height', 'ssc' )),
                                    array('property' => 'letter-spacing', 'label' => esc_html__( 'Letter Spacing', 'ssc' )),
                                    array('property' => 'overflow', 'label' => esc_html__( 'Overflow', 'ssc' )),
                                    array('property' => 'word-break', 'label' => esc_html__( 'Word Break', 'ssc' )),
                                ),


                                //Background group
                                'Background' => array(
                                    array('property' => 'background'),
                                ),
                                //Box group
                                'Box' => array(
                                    array('property' => 'margin', 'label' => esc_html__( 'Margin', 'ssc' )),
                                    array('property' => 'padding', 'label' => esc_html__( 'Padding', 'ssc' )),
                                    array('property' => 'border', 'label' => esc_html__( 'Border', 'ssc' )),
                                    array('property' => 'width', 'label' => esc_html__( 'Width', 'ssc' )),
                                    array('property' => 'height', 'label' => esc_html__( 'Height', 'ssc' )),
                                    array('property' => 'border-radius', 'label' => esc_html__( 'Border Radius', 'ssc' )),
                                    array('property' => 'float', 'label' => esc_html__( 'Float', 'ssc' )),
                                    array('property' => 'display', 'label' => esc_html__( 'Display', 'ssc' )),
                                    array('property' => 'box-shadow', 'label' => esc_html__( 'Box Shadow', 'ssc' )),
                                    array('property' => 'opacity', 'label' => esc_html__( 'Opacity', 'ssc' )),
                                ),


                            ),
                            array(
                                "screens" => "999,768,667,479",
                                'Typography' => array(
                                    array('property' => 'color', 'label' => esc_html__( 'Color', 'ssc' )),
                                    array('property' => 'font-size', 'label' => esc_html__( 'Font Size', 'ssc' )),
                                    array('property' => 'font-weight', 'label' => esc_html__( 'Font Weight', 'ssc' )),
                                    array('property' => 'font-style', 'label' => esc_html__( 'Font Style', 'ssc' )),
                                    array('property' => 'font-family', 'label' => esc_html__( 'Font Family', 'ssc' )),
                                    array('property' => 'text-align', 'label' => esc_html__( 'Text Align', 'ssc' )),
                                    array('property' => 'text-shadow', 'label' => esc_html__( 'Text Shadow', 'ssc' )),
                                    array('property' => 'text-transform', 'label' => esc_html__( 'Text Transform', 'ssc' )),
                                    array('property' => 'text-decoration', 'label' => esc_html__( 'Text Decoration', 'ssc' )),
                                    array('property' => 'line-height', 'label' => esc_html__( 'Line Height', 'ssc' )),
                                    array('property' => 'letter-spacing', 'label' => esc_html__( 'Letter Spacing', 'ssc' )),
                                    array('property' => 'overflow', 'label' => esc_html__( 'Overflow', 'ssc' )),
                                    array('property' => 'word-break', 'label' => esc_html__( 'Word Break', 'ssc' )),
                                ),
                                //Background group
                                'Background' => array(
                                    array('property' => 'background'),
                                ),
                                //Box group
                                'Box' => array(
                                    array('property' => 'width', 'label' => esc_html__( 'Width', 'ssc' )),
                                    array('property' => 'margin', 'label' => esc_html__( 'Margin', 'ssc' )),
                                    array('property' => 'padding', 'label' => esc_html__( 'Padding', 'ssc' )),
                                    array('property' => 'border', 'label' => esc_html__( 'Border', 'ssc' )),
                                    array('property' => 'height', 'label' => esc_html__( 'Height', 'ssc' )),
                                    array('property' => 'border-radius', 'label' => esc_html__( 'Border Radius', 'ssc' )),
                                    array('property' => 'float', 'label' => esc_html__( 'Float', 'ssc' )),
                                    array('property' => 'display', 'label' => esc_html__( 'Display', 'ssc' )),
                                ),

                            )
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
                                'screens' => "any",
                                'Typography' => array(
                                    array('property' => 'color', 'label' => esc_html__( 'Color', 'ssc' )),
                                    array('property' => 'font-size', 'label' => esc_html__( 'Font Size', 'ssc' )),
                                    array('property' => 'font-weight', 'label' => esc_html__( 'Font Weight', 'ssc' )),
                                    array('property' => 'font-style', 'label' => esc_html__( 'Font Style', 'ssc' )),
                                    array('property' => 'font-family', 'label' => esc_html__( 'Font Family', 'ssc' )),
                                    array('property' => 'text-align', 'label' => esc_html__( 'Text Align', 'ssc' )),
                                    array('property' => 'text-shadow', 'label' => esc_html__( 'Text Shadow', 'ssc' )),
                                    array('property' => 'text-transform', 'label' => esc_html__( 'Text Transform', 'ssc' )),
                                    array('property' => 'text-decoration', 'label' => esc_html__( 'Text Decoration', 'ssc' )),
                                    array('property' => 'line-height', 'label' => esc_html__( 'Line Height', 'ssc' )),
                                    array('property' => 'letter-spacing', 'label' => esc_html__( 'Letter Spacing', 'ssc' )),
                                    array('property' => 'overflow', 'label' => esc_html__( 'Overflow', 'ssc' )),
                                    array('property' => 'word-break', 'label' => esc_html__( 'Word Break', 'ssc' )),
                                ),

                            ),
                            array(
                                "screens" => "999,768,667,479",
                                'Typography' => array(
                                    array('property' => 'color', 'label' => esc_html__( 'Color', 'ssc' )),
                                    array('property' => 'font-size', 'label' => esc_html__( 'Font Size', 'ssc' )),
                                    array('property' => 'font-weight', 'label' => esc_html__( 'Font Weight', 'ssc' )),
                                    array('property' => 'font-style', 'label' => esc_html__( 'Font Style', 'ssc' )),
                                    array('property' => 'font-family', 'label' => esc_html__( 'Font Family', 'ssc' )),
                                    array('property' => 'text-align', 'label' => esc_html__( 'Text Align', 'ssc' )),
                                    array('property' => 'text-shadow', 'label' => esc_html__( 'Text Shadow', 'ssc' )),
                                    array('property' => 'text-transform', 'label' => esc_html__( 'Text Transform', 'ssc' )),
                                    array('property' => 'text-decoration', 'label' => esc_html__( 'Text Decoration', 'ssc' )),
                                    array('property' => 'line-height', 'label' => esc_html__( 'Line Height', 'ssc' )),
                                    array('property' => 'letter-spacing', 'label' => esc_html__( 'Letter Spacing', 'ssc' )),
                                    array('property' => 'overflow', 'label' => esc_html__( 'Overflow', 'ssc' )),
                                    array('property' => 'word-break', 'label' => esc_html__( 'Word Break', 'ssc' )),
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

function ssc_pagetitle_shortcode($atts, $content = null) {
    extract(shortcode_atts(array(
        'el_class'          => '',
    ) , $atts));

    $output = '';
    extract($atts);

    $wrp_classes = apply_filters( 'kc-el-class', $atts );
    $output .= '<div  class="'.implode( ' ', $wrp_classes ) . ' '.$el_class.'"><h1>';
    
    $output .= get_the_title();

    $output .= '</h1></div>';

    return $output;
}

add_shortcode('ssc_pagetitle', 'ssc_pagetitle_shortcode');

