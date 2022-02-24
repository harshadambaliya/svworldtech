<?php
add_action('init', 'ssc_table_params', 99);

function ssc_table_params() {

    global $kc;
    $kc->add_map(array(
        'ssc_table' => array(
            'name' => esc_html__( 'Table', 'ssc' ),
            'description' => esc_html__( 'It displays sidebar with widgets in any place', 'ssc' ),
            'icon' => 'kc-icon-box ssc-icon-15',
            'is_container' => true,
            'category' => 'SecretLab',
            'css_box' => true,
            'admin_view' => 'sst_table',
            'assets' => array(
                'scripts' => array(
                    'sst-responsive-tables-js' => plugin_dir_url( __FILE__  ) . 'js/responsive-tables.js',
                    'jquery' => '', // Leave empty to call the registered scripts
                ),
            ),
            'params' => array(
                esc_html__( 'Table', 'ssc' ) => array(
                    array(
                        'name' => 'content',
                        'label' => esc_html__( 'Table', 'ssc' ),
                        'type' => 'textarea_html',
                        'value' => '',
                        'admin_label' => true,
                    ),
                    array(
                        'name' => 'show_search',
                        'label' => esc_html__(  'Show search', 'ssc' ),
                        'type' => 'toggle',
                        'value' => false,
                        'description' => esc_html__(  'Use search above the table', 'ssc' ),
                    ),
                    array(
                        'name' => 'search_text',
                        'type' => 'text',
                        'value' => esc_html__(  'Search in table', 'ssc' ),
                        'description' => esc_html__(  'Search in table default text', 'ssc' ),
                        'relation' => array(
                            'parent' => 'show_search',
                            'show_when' => 'yes'
                        ),
                    ),
                    array(
                        'type'  => 'text',
                        'label' => esc_html__(  'Extra Class', 'ssc' ),
                        'name'  => 'el_class',
                        'value' => '',
                    )
                ),
                //Styling
                esc_html__( 'styling', 'sst' ) => array(
                    array(
                        'name' => 'my-css',
                        'label' => esc_html__( 'Styling', 'ssc' ),
                        'type' => 'css',
                        'value' => '', // remove this if you do not need a default content
                        'description' => esc_html__( 'Styles', 'ssc' ),
                        'options' => array(
                            array(
                                'screens' => "any",
                                'Table' => array(
                                    array('property' => 'color', 'label' => esc_html__( 'Color', 'ssc' ), 'selector' => 'table'),
                                    array('property' => 'font-family', 'label' => esc_html__( 'Font Family', 'ssc' ), 'selector' => 'table'),
                                    array('property' => 'font-size', 'label' => esc_html__( 'Font Size', 'ssc' ), 'selector' => 'table'),
                                    array('property' => 'line-height', 'label' => esc_html__( 'Line Height', 'ssc' ), 'selector' => 'table'),
                                    array('property' => 'font-weight', 'label' => esc_html__( 'Font Weight', 'ssc' ), 'selector' => 'table'),
                                    array('property' => 'background', 'label' => esc_html__( 'Background Color', 'ssc' ), 'selector' => 'table'),
                                    array('property' => 'width', 'label' => esc_html__( 'Width', 'ssc' ), 'selector' => 'table'),
                                    array('property' => 'height', 'label' => esc_html__( 'Height', 'ssc' ), 'selector' => 'table'),
                                    array('property' => 'box-shadow', 'label' => esc_html__( 'Box Shadow', 'ssc' ), 'selector' => 'table'),
                                    array('property' => 'opacity', 'label' => esc_html__( 'Opacity', 'ssc' ), 'selector' => 'table'),
                                    array('property' => 'margin', 'label' => esc_html__( 'Margin', 'ssc' ), 'selector' => 'table'),
                                    array('property' => 'padding', 'label' => esc_html__( 'Padding', 'ssc' ), 'selector' => 'table'),
                                    array('property' => 'border', 'label' => esc_html__( 'Border', 'ssc' ), 'selector' => 'table'),
                                    array('property' => 'border-radius', 'label' => esc_html__( 'Border Radius', 'ssc' ), 'selector' => 'table'),
                                ),
                                'Table header' => array(
                                    array('property' => 'color', 'label' => esc_html__( 'Color', 'ssc' ), 'selector' => 'table thead'),
                                    array('property' => 'background', 'label' => esc_html__( 'Background Color', 'ssc' ), 'selector' => 'table thead'),
                                    array('property' => 'font-family', 'label' => esc_html__( 'Font Family', 'ssc' ), 'selector' => 'table thead'),
                                    array('property' => 'font-size', 'label' => esc_html__( 'Font Size', 'ssc' ), 'selector' => 'table thead'),
                                    array('property' => 'line-height', 'label' => esc_html__( 'Line Height', 'ssc' ), 'selector' => 'table thead'),
                                    array('property' => 'font-weight', 'label' => esc_html__( 'Font Weight', 'ssc' ), 'selector' => 'table thead'),
                                    array('property' => 'text-align', 'selector' => 'table thead'),
                                    array('property' => 'text-transform', 'label' => esc_html__( 'Text Transform', 'ssc' ), 'selector' => 'table thead'),
                                    array('property' => 'padding', 'label' => esc_html__( 'Padding', 'ssc' ), 'selector' => 'table thead td'),
                                    array('property' => 'border', 'label' => esc_html__( 'Border', 'ssc' ), 'selector' => 'table thead'),
                                    array('property' => 'border-radius', 'label' => esc_html__( 'Border Radius', 'ssc' ), 'selector' => 'table thead'),
                                ),
                                'Row' => array(
                                    array('property' => 'color', 'label' => esc_html__( 'Color', 'ssc' ), 'selector' => 'table tbody tr'),
                                    array('property' => 'background', 'label' => esc_html__( 'Background Color', 'ssc' ), 'selector' => 'table tbody tr'),
                                    array('property' => 'height', 'label' => esc_html__( 'Height', 'ssc' ), 'selector' => 'table tbody tr'),
                                    array('property' => 'padding', 'label' => esc_html__( 'Padding', 'ssc' ), 'selector' => 'table tbody tr'),
                                    array('property' => 'border', 'label' => esc_html__( 'Border', 'ssc' ), 'selector' => 'table tbody tr'),
                                ),
                                'Row even' => array(
                                    array('property' => 'color', 'label' => esc_html__( 'Color', 'ssc' ), 'selector' => 'table tbody tr:nth-child(even)'),
                                    array('property' => 'background', 'label' => esc_html__( 'Background Color', 'ssc' ), 'selector' => 'table tbody tr:nth-child(even)'),
                                    array('property' => 'height', 'label' => esc_html__( 'Height', 'ssc' ), 'selector' => 'table tbody tr:nth-child(even)'),
                                    array('property' => 'padding', 'label' => esc_html__( 'Padding', 'ssc' ), 'selector' => 'table tbody tr:nth-child(even)'),
                                    array('property' => 'border', 'label' => esc_html__( 'Border', 'ssc' ), 'selector' => 'table tbody tr:nth-child(even)'),
                                ),
                                'Cells' => array(
                                    array('property' => 'background', 'label' => esc_html__( 'Background Color', 'ssc' ), 'selector' => 'table td'),
                                    array('property' => 'width', 'label' => esc_html__( 'Width', 'ssc' ), 'selector' => 'table td'),
                                    array('property' => 'height', 'label' => esc_html__( 'Height', 'ssc' ), 'selector' => 'table td'),
                                    array('property' => 'border', 'label' => esc_html__( 'Border', 'ssc' ), 'selector' => 'table td'),
                                    array('property' => 'border-radius', 'label' => esc_html__( 'Border Radius', 'ssc' ), 'selector' => 'table td'),
                                    array('property' => 'padding', 'label' => esc_html__( 'Padding', 'ssc' ), 'selector' => 'table td'),
                                ),
                                'Search Input' => array(
                                    array('property' => 'float', 'label' => esc_html__( 'Float', 'ssc' ), 'selector' => '.sst-table-search input'),
                                    array('property' => 'padding', 'selector' => '.sst-table-search input'),
                                    array('property' => 'color', 'label' => esc_html__( 'Color', 'ssc' ), 'selector' => '.sst-table-search input'),
                                    array('property' => 'background', 'label' => esc_html__( 'Background Color', 'ssc' ), 'selector' => '.sst-table-search input'),
                                    array('property' => 'font-family', 'label' => esc_html__( 'Font Family', 'ssc' ), 'selector' => '.sst-table-search input'),
                                    array('property' => 'font-size', 'label' => esc_html__( 'Font Size', 'ssc' ), 'selector' => '.sst-table-search input'),
                                    array('property' => 'line-height', 'label' => esc_html__( 'Line Height', 'ssc' ), 'selector' => '.sst-table-search input'),
                                    array('property' => 'font-weight', 'label' => esc_html__( 'Font Weight', 'ssc' ), 'selector' => '.sst-table-search input'),
                                    array('property' => 'text-align', 'selector' => '.sst-table-search input'),
                                    array('property' => 'text-transform', 'label' => esc_html__( 'Text Transform', 'ssc' ), 'selector' => '.sst-table-search input'),
                                    array('property' => 'width', 'selector' => '.sst-table-search input'),
                                    array('property' => 'height', 'selector' => '.sst-table-search input'),
                                    array('property' => 'border', 'selector' => '.sst-table-search input'),
                                    array('property' => 'border-radius', 'selector' => '.sst-table-search input'),
                                    array('property' => 'margin', 'label' => esc_html__( 'Margin', 'ssc' ), 'selector' => '.sst-table-search input'),
                                    array('property' => 'padding', 'selector' => '.sst-table-search input'),
                                ),
                            ),
                            array(
                                "screens" => "999,768,667,479",
                                'Table' => array(
                                    array('property' => 'color', 'label' => esc_html__( 'Color', 'ssc' ), 'selector' => 'table'),
                                    array('property' => 'font-family', 'label' => esc_html__( 'Font Family', 'ssc' ), 'selector' => 'table'),
                                    array('property' => 'font-size', 'label' => esc_html__( 'Font Size', 'ssc' ), 'selector' => 'table'),
                                    array('property' => 'line-height', 'label' => esc_html__( 'Line Height', 'ssc' ), 'selector' => 'table'),
                                    array('property' => 'font-weight', 'label' => esc_html__( 'Font Weight', 'ssc' ), 'selector' => 'table'),
                                    array('property' => 'background', 'label' => esc_html__( 'Background Color', 'ssc' ), 'selector' => 'table'),
                                    array('property' => 'width', 'label' => esc_html__( 'Width', 'ssc' ), 'selector' => 'table'),
                                    array('property' => 'height', 'label' => esc_html__( 'Height', 'ssc' ), 'selector' => 'table'),
                                    array('property' => 'box-shadow', 'label' => esc_html__( 'Box Shadow', 'ssc' ), 'selector' => 'table'),
                                    array('property' => 'opacity', 'label' => esc_html__( 'Opacity', 'ssc' ), 'selector' => 'table'),
                                    array('property' => 'margin', 'label' => esc_html__( 'Margin', 'ssc' ), 'selector' => 'table'),
                                    array('property' => 'padding', 'label' => esc_html__( 'Padding', 'ssc' ), 'selector' => 'table'),
                                    array('property' => 'border', 'label' => esc_html__( 'Border', 'ssc' ), 'selector' => 'table'),
                                    array('property' => 'border-radius', 'label' => esc_html__( 'Border Radius', 'ssc' ), 'selector' => 'table'),
                                ),
                                'Table header' => array(
                                    array('property' => 'color', 'label' => esc_html__( 'Color', 'ssc' ), 'selector' => 'table thead'),
                                    array('property' => 'background', 'label' => esc_html__( 'Background Color', 'ssc' ), 'selector' => 'table thead'),
                                    array('property' => 'font-family', 'label' => esc_html__( 'Font Family', 'ssc' ), 'selector' => 'table thead'),
                                    array('property' => 'font-size', 'label' => esc_html__( 'Font Size', 'ssc' ), 'selector' => 'table thead'),
                                    array('property' => 'line-height', 'label' => esc_html__( 'Line Height', 'ssc' ), 'selector' => 'table thead'),
                                    array('property' => 'font-weight', 'label' => esc_html__( 'Font Weight', 'ssc' ), 'selector' => 'table thead'),
                                    array('property' => 'text-align', 'selector' => 'table thead'),
                                    array('property' => 'text-transform', 'label' => esc_html__( 'Text Transform', 'ssc' ), 'selector' => 'table thead'),
                                    array('property' => 'padding', 'label' => esc_html__( 'Padding', 'ssc' ), 'selector' => 'table thead'),
                                    array('property' => 'border', 'label' => esc_html__( 'Border', 'ssc' ), 'selector' => 'table thead'),
                                    array('property' => 'border-radius', 'label' => esc_html__( 'Border Radius', 'ssc' ), 'selector' => 'table thead'),
                                ),
                                'Row' => array(
                                    array('property' => 'color', 'label' => esc_html__( 'Color', 'ssc' ), 'selector' => 'table tbody tr'),
                                    array('property' => 'background', 'label' => esc_html__( 'Background Color', 'ssc' ), 'selector' => 'table tbody tr'),
                                    array('property' => 'height', 'label' => esc_html__( 'Height', 'ssc' ), 'selector' => 'table tbody tr'),
                                    array('property' => 'padding', 'label' => esc_html__( 'Padding', 'ssc' ), 'selector' => 'table tbody tr'),
                                    array('property' => 'border', 'label' => esc_html__( 'Border', 'ssc' ), 'selector' => 'table tbody tr'),
                                ),
                                'Row even' => array(
                                    array('property' => 'color', 'label' => esc_html__( 'Color', 'ssc' ), 'selector' => 'table tbody tr:nth-child(even)'),
                                    array('property' => 'background', 'label' => esc_html__( 'Background Color', 'ssc' ), 'selector' => 'table tbody tr:nth-child(even)'),
                                    array('property' => 'height', 'label' => esc_html__( 'Height', 'ssc' ), 'selector' => 'table tbody tr:nth-child(even)'),
                                    array('property' => 'padding', 'label' => esc_html__( 'Padding', 'ssc' ), 'selector' => 'table tbody tr:nth-child(even)'),
                                    array('property' => 'border', 'label' => esc_html__( 'Border', 'ssc' ), 'selector' => 'table tbody tr:nth-child(even)'),
                                ),
                                'Cells' => array(
                                    array('property' => 'background', 'label' => esc_html__( 'Background Color', 'ssc' ), 'selector' => 'table td'),
                                    array('property' => 'width', 'label' => esc_html__( 'Width', 'ssc' ), 'selector' => 'table td'),
                                    array('property' => 'height', 'label' => esc_html__( 'Height', 'ssc' ), 'selector' => 'table td'),
                                    array('property' => 'border', 'label' => esc_html__( 'Border', 'ssc' ), 'selector' => 'table td'),
                                    array('property' => 'border-radius', 'label' => esc_html__( 'Border Radius', 'ssc' ), 'selector' => 'table td'),
                                    array('property' => 'padding', 'label' => esc_html__( 'Padding', 'ssc' ), 'selector' => 'table td'),
                                ),
                                'Search Input' => array(
                                    array('property' => 'float', 'label' => esc_html__( 'Float', 'ssc' ), 'selector' => '.sst-table-search input'),
                                    array('property' => 'color', 'label' => esc_html__( 'Color', 'ssc' ), 'selector' => '.sst-table-search input'),
                                    array('property' => 'background', 'label' => esc_html__( 'Background Color', 'ssc' ), 'selector' => '.sst-table-search input'),
                                    array('property' => 'font-family', 'label' => esc_html__( 'Font Family', 'ssc' ), 'selector' => '.sst-table-search input'),
                                    array('property' => 'font-size', 'label' => esc_html__( 'Font Size', 'ssc' ), 'selector' => '.sst-table-search input'),
                                    array('property' => 'line-height', 'label' => esc_html__( 'Line Height', 'ssc' ), 'selector' => '.sst-table-search input'),
                                    array('property' => 'font-weight', 'label' => esc_html__( 'Font Weight', 'ssc' ), 'selector' => '.sst-table-search input'),
                                    array('property' => 'text-align', 'selector' => '.sst-table-search input'),
                                    array('property' => 'text-transform', 'label' => esc_html__( 'Text Transform', 'ssc' ), 'selector' => '.sst-table-search input'),
                                    array('property' => 'width', 'selector' => '.sst-table-search input'),
                                    array('property' => 'height', 'selector' => '.sst-table-search input'),
                                    array('property' => 'border', 'selector' => '.sst-table-search input'),
                                    array('property' => 'border-radius', 'selector' => '.sst-table-search input'),
                                    array('property' => 'margin', 'label' => esc_html__( 'Margin', 'ssc' ), 'selector' => '.sst-table-search input'),
                                    array('property' => 'padding', 'selector' => '.sst-table-search input'),
                                ),
                            )
                        )
                    )
                )
            )
        )
    ));
}
// Register Shortcode
function ssc_table_shortcode($atts, $content = null) {
    extract(shortcode_atts(array(
        'el_class' => '',
        'show_search' => '',
        'search_text' => '',
    ) , $atts));

    $output = '';
    extract($atts);

    $wrp_classes = apply_filters( 'kc-el-class', $atts );
    $output .= '<div class="sst-table responsive '.implode( ' ', $wrp_classes ) . ' ' . $el_class . '">';
    if( ! empty( $show_search ) ){

        $output .= '<div class="sst-table-search form-group">
            <input type="text" class="form-control" id="" placeholder="' . esc_html( $search_text ) . '">
        </div>';
    }
    $output .= $content;
    $output .= '</div>';

    return $output;
}

add_shortcode('ssc_table', 'ssc_table_shortcode');

function add_the_table_button( $buttons ) {
    array_push( $buttons, 'separator', 'table' );
    return $buttons;
}
add_filter( 'mce_buttons', 'add_the_table_button' );

function add_the_table_plugin( $plugins ) {
    $plugins['table'] = plugin_dir_url( __FILE__  ) . 'js/plugin.min.js';
    return $plugins;
}
add_filter( 'mce_external_plugins', 'add_the_table_plugin' );

