<?php
add_action('init', 'ssc_sidebar_params', 99);

/**
 * Additional functions
 */
function ssc_sidebar_get_sidebar_list_array() {

    $arr = array( 0 => 'none');
    if ( class_exists( 'Atiframebuilder_Config' ) ) {
        $sidebars = Atiframebuilder_Config::get_sidebars();
    } else if ( class_exists( 'Secret_Lab_Config' ) ) {
        $sidebars = Secret_Lab_Config::get_sidebars();
    } else if ( function_exists( 'atiframebuilder_get_sidebars' ) ) {
        $sidebars = atiframebuilder_get_sidebars();
    } else {
        $sidebars = array();
    }


    foreach ($sidebars as $id => $name) {
        $arr[$id] = $name;
    }

    if (count($arr) == 1) {
        $arr = array( 0 => esc_attr__('You can create sidebars in Appearance -> Widgets', 'ssc' ));
    }

    return $arr;
}
/**
 * Additional functions
 */


function ssc_sidebar_params() {
    global $kc;
    $kc->add_map(array(
        'ssc_sidebar' => array(
            'name' => esc_html__( 'Sidebar', 'ssc' ),
            'description' => esc_html__( 'It displays sidebar with widgets in any place', 'ssc' ),
            'icon' => 'kc-icon-box ssc-icon-11',
            'is_container' => true,
            'category' => 'SecretLab',
            'css_box' => true,
            'params' => array(
                esc_html__( 'General', 'ssc' ) => array(
                    array(
                        'name' => 'sbar_id',
                        'label' => esc_html__( 'Sidebar', 'ssc' ),
                        'type' => 'select',
                        'options' => ssc_sidebar_get_sidebar_list_array(),
                        'value' => '',
                        'description' => esc_html__( 'Pick sidebar to display', 'ssc' ),
                    ),
                ),
            )
        )
    ));
}
// Register Shortcode
function ssc_sidebar_shortcode($atts, $content = null) {
    extract(shortcode_atts(array(
        'sbar_id' => '',
    ) , $atts));

    $output = '';
    extract($atts);

    $wrp_classes = apply_filters( 'kc-el-class', $atts );
    $output .= '<div class="widget_sc '.implode( ' ', $wrp_classes ) . '">';

    if ( $sbar_id != '0' ) {
        ob_start();
        dynamic_sidebar( $sbar_id );
        $output .= ob_get_clean();
    } else {

    }
    $output .= '</div>';

    return $output;
}

add_shortcode('ssc_sidebar', 'ssc_sidebar_shortcode');

