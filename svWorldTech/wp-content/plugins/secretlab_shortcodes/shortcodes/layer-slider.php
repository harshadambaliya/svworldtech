<?php
add_action('init', 'ssc_layerslider_params', 99);

/**
 * Additional functions
 */
function ssc_layerslider_get_sliders_array() {

    $arr = array( 0 => 'none');

    if (class_exists('LS_Sliders')) {
        $sliders = LS_Sliders::find();
        foreach ($sliders as $slider) {
            $arr[''.$slider['id']] = $slider['name'];
        }
    }


    if (count($arr) == 1) {
        $arr = array( 0 => esc_attr__('The Theme Support Layer Slider, but couldn\'t find it. Install the plugin to choose the slider to display.', 'ssc' ));
    }

    return $arr;
}
/**
 * Additional functions
 */


function ssc_layerslider_params() {
    global $kc;

     $kc->add_map(array(
        'ssc_layerslider' => array(
            'name' => esc_html__( 'Layer Slider', 'ssc' ),
            'description' => esc_html__( 'It displays slider from Layer Slider plugin', 'ssc' ),
            'icon' => 'kc-icon-box ssc-icon-8',
            'category' => 'SecretLab',
            'css_box' => true,
            'params' => array(
                esc_html__( 'General', 'ssc' ) => array(
                    array(
                        'name' => 'slider_id',
                        'label' => esc_html__( 'Slider', 'ssc' ),
                        'type' => 'select',
                        'options' => ssc_layerslider_get_sliders_array(),
                        'value' => '',
                        'description' => esc_html__( 'Pick slider to display', 'ssc' ),
                    ),
                ),
                //Styling

            )
        )
    ));
}

// Register Shortcode

function ssc_layerslider_shortcode($atts, $content = null) {
    extract(shortcode_atts(array(
        'slider_id' => '',
    ) , $atts));

    $output = '';
    extract($atts);
    
    $wrp_classes = apply_filters( 'kc-el-class', $atts );
    $output .= '<div  class="'.implode( ' ', $wrp_classes ) . '">';
    
    if ( $slider_id != '0' ) {
        $output .= kc_do_shortcode( '[layerslider id="' . $slider_id . '"]' );
    } else {

    }
    $output .= '</div>';
    
    return $output;
}

add_shortcode('ssc_layerslider', 'ssc_layerslider_shortcode');

