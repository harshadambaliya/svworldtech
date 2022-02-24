<?php
add_action('init', 'ssc_wpml_params', 99);

/**
 * Additional functions
 */

/**
 * Additional functions
 */


function ssc_wpml_params() {
    global $kc;

     $kc->add_map(array(
        'ssc_wpml' => array(
            'name' => esc_html__( 'WPML Language Selector', 'ssc' ),
            'description' => esc_html__( 'It displays Language Selector for WPML plugin', 'ssc' ),
            'icon' => 'kc-icon-box',
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
                esc_html__( 'styling', 'ssc' ) => array(
                    array(
                        'name' => 'my-css',
                        'label' => esc_html__( 'Styling', 'ssc' ),
                        'type' => 'css',
                        'value' => '', // remove this if you do not need a default content
                        'options' => array(
                            array(
                                'screens' => "any",
                                //Background grou
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
            )
        )
    ));
}

// Register Shortcode

function ssc_wpml_shortcode($atts, $content = null) {
    extract(shortcode_atts(array(
        'el_class'          => '',
    ) , $atts));
    
    $output = '';
    extract($atts);
    
    $wrp_classes = apply_filters( 'kc-el-class', $atts );
   
    do_action('wpml_add_language_selector');
    $action = ob_get_contents();
    ob_end_clean();
    
    $output .= '<div  class="'.implode( ' ', $wrp_classes ) . ' '.$el_class.'">'.$action.'</div>';

    return $output;
}

add_shortcode('ssc_wpml', 'ssc_wpml_shortcode');

