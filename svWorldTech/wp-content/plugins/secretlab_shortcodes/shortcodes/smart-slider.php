<?php
add_action('init', 'ssc_smartslider_params', 99);

/**
 * Additional functions
 */
function ssc_smartslider_get_sliders_array() {

    global $wpdb;

    $arr = array( 0 => 'none');

    if ( class_exists( 'SmartSlider3' ) ) {
        $sliders = $wpdb->get_results( "SELECT id, title FROM ".$wpdb->prefix."nextend2_smartslider3_sliders" );
        if ( ! empty( $sliders ) ) {
            foreach ( $sliders as $slider ) {
                $arr[''.$slider->id] = $slider->title;
            }
        }
    }

    if (count($arr) == 1) {
        $arr = array( 0 => esc_attr__('The Theme Support Smart Slider, but couldn\'t find it. Install the plugin to choose the slider to display.', 'ssc' ));
    }

    return $arr;
}
/**
 * Additional functions
 */


function ssc_smartslider_params() {
    global $kc;

     $kc->add_map(array(
        'ssc_smartslider' => array(
            'name' => esc_html__( 'Smart Slider 3', 'ssc' ),
            'description' => esc_html__( 'It displays slider from Smart Slider 3 plugin', 'ssc' ),
            'icon' => 'kc-icon-box ssc-icon-18',
            'category' => 'SecretLab',
            'css_box' => true,
            'params' => array(
                esc_html__( 'General', 'ssc' ) => array(
                    array(
                        'name' => 'slider_id',
                        'label' => esc_html__( 'Slider', 'ssc' ),
                        'type' => 'select',
                        'options' => ssc_smartslider_get_sliders_array(),
                        'value' => '',
                        'description' => esc_html__( 'Pick slider to display', 'ssc' ),
                    ),
                ),
            )
        )
    ));
}

// Register Shortcode

function ssc_smartslider_shortcode($atts, $content = null) {
    extract(shortcode_atts(array(
        'slider_id' => '',
    ) , $atts));

    $output = '';
    extract($atts);

    $wrp_classes = apply_filters( 'kc-el-class', $atts );
    $output .= '<div  class="'.implode( ' ', $wrp_classes ) . '">';
    
    if ( $slider_id != '0' ) {
        $output .= kc_do_shortcode( '[smartslider3 slider="' . $slider_id . '"]' );
    } else {

    }
    $output .= '</div>';

    return $output;
}

add_shortcode('ssc_smartslider', 'ssc_smartslider_shortcode');

