<?php
add_action('init', 'ssc_revslider_params', 99);

/**
 * Additional functions
 */
function ssc_revslider_get_sliders_array() {

    global $wpdb;
    $arr = array( 0 => 'none');

    if ( class_exists( 'RevSliderSlider' ) ) {
        $RsExists = count($wpdb->get_results("SELECT * FROM information_schema.tables WHERE table_schema = '".$wpdb->dbname."' AND table_name = '".$wpdb->prefix."revslider_sliders' LIMIT 1", ARRAY_A));
        if ( $RsExists > 0 ) {
            $revSliders = $wpdb->get_results("SELECT title, alias FROM ".$wpdb->prefix."revslider_sliders WHERE ( type is NULL OR type = '' )", ARRAY_A);
            if ( count( $revSliders ) > 0 ) {
                foreach ( $revSliders as $slider ) {
                    $arr['rev_'.$slider['alias']] = $slider['title'];
                }
            }
        }
    }

    if (count($arr) == 1) {
        $arr = array( 0 => esc_attr__('The Theme Support Slider Revolution, but couldn\'t find it. Install the plugin to choose the slider to display.', 'ssc' ));
    }

    return $arr;
}
/**
 * Additional functions
 */


function ssc_revslider_params() {
    global $kc;

     $kc->add_map(array(
        'ssc_revslider' => array(
            'name' => esc_html__( 'Slider Revolution', 'ssc' ),
            'description' => esc_html__( 'It displays slider from Revolution Slider plugin', 'ssc' ),
            'icon' => 'kc-icon-box ssc-icon-9',
            'category' => 'SecretLab',
            'css_box' => true,
            'params' => array(
                esc_html__( 'General', 'ssc' ) => array(
                    array(
                        'name' => 'slider_id',
                        'label' => esc_html__( 'Slider', 'ssc' ),
                        'type' => 'select',
                        'options' => ssc_revslider_get_sliders_array(),
                        'value' => '',
                        'description' => esc_html__( 'Pick slider to display', 'ssc' ),
                    ),
                ),
            )
        )
    ));
}

// Register Shortcode

function ssc_revslider_shortcode($atts, $content = null) {
    extract(shortcode_atts(array(
        'slider_id' => '',
    ) , $atts));

    $output = '';
    extract($atts);

    $wrp_classes = apply_filters( 'kc-el-class', $atts );
    $output .= '<div  class="'.implode( ' ', $wrp_classes ) . '">';

    if ( $slider_id != '0' ) {
	    $slider_id = str_replace( 'rev_', '', $slider_id );
        $output .= kc_do_shortcode( '[rev_slider alias="' . $slider_id . '"]' );
    } else {

    }
    $output .= '</div>';

    return $output;
}

add_shortcode('ssc_revslider', 'ssc_revslider_shortcode');

