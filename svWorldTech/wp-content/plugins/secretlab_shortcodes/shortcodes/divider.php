<?php
add_action('init', 'ssc_divider_params', 99);

/**
 * Additional functions
 */

/**
 * Additional functions
 */


function ssc_divider_params() {
    global $kc;

    $kc->add_map(array(
        'ssc_divider' => array(
            'name' => esc_html__( 'Divider Icon', 'ssc' ),
            'description' => esc_html__( 'It displays divider with SVG icon', 'ssc' ),
            'icon' => 'kc-icon-box ssc-icon-2',
            'category' => 'SecretLab',
            'css_box' => true,
            'params' => array(
                esc_html__( 'General', 'ssc' ) => array(
                    array(
                        'name' => 'pick_icon',
                        'label' => esc_html__( 'Pick Icon for the divider', 'ssc' ),
                        'type' => 'radio_image',  // USAGE TEXT TYPE
                        'options' => array(
                            '1'	=> plugin_dir_url( __FILE__ ) .'../images/div1.jpg',
                            '2'	=> plugin_dir_url( __FILE__ ) .'../images/div2.jpg',
                            '3'	=> plugin_dir_url( __FILE__ ) .'../images/div3.jpg',
                            '4'	=> plugin_dir_url( __FILE__ ) .'../images/div4.jpg',
                            '5'	=> plugin_dir_url( __FILE__ ) .'../images/div5.jpg',
                            '6'	=> plugin_dir_url( __FILE__ ) .'../images/div6.jpg',
                            '7'	=> plugin_dir_url( __FILE__ ) .'../images/div7.jpg',
                            '8'	=> plugin_dir_url( __FILE__ ) .'../images/div8.jpg',
                            '9'	=> plugin_dir_url( __FILE__ ) .'../images/div9.jpg',
                            '10'	=> plugin_dir_url( __FILE__ ) .'../images/div10.jpg',
                            '11'	=> plugin_dir_url( __FILE__ ) .'../images/div11.jpg',
                            '12'	=> plugin_dir_url( __FILE__ ) .'../images/div12.jpg',
                            '13'	=> plugin_dir_url( __FILE__ ) .'../images/div13.jpg',
                            '14'	=> plugin_dir_url( __FILE__ ) .'../images/div14.jpg',
                            '15'	=> plugin_dir_url( __FILE__ ) .'../images/div15.jpg',
                            '16'	=> plugin_dir_url( __FILE__ ) .'../images/div16.jpg',
                            '17'	=> plugin_dir_url( __FILE__ ) .'../images/div17.jpg',
                            '18'	=> plugin_dir_url( __FILE__ ) .'../images/div18.jpg',
                            '19'	=> plugin_dir_url( __FILE__ ) .'../images/div19.jpg',
                            '20'	=> plugin_dir_url( __FILE__ ) .'../images/div20.jpg',
                        ),
                        'value' => '1', // remove this if you do not need a default content
                    ),
                    array(
                        'name' => 'color',
                        'label' => esc_html__( 'Color', 'ssc' ),
                        'type' => 'color_picker',  // USAGE COLOR_PICKER TYPE
                        'description' => esc_html__( 'Field Description', 'ssc' ),
                    ),
                    array(
                        'name' => 'height',
                        'label' => esc_html__( 'Height', 'ssc' ),
                        'type' => 'number_slider',
                        'options' => array(
                            'min' => 3,
                            'max' => 18,
                            'unit' => '',
                            'show_input' => true
                        ),
                        'value' => '4',
                    ),
                ) ,
                esc_html__( 'styling', 'ssc' ) => array(
                array(
                    'name' => 'my-css',
                    'label' => esc_html__( 'Styling', 'ssc' ),
                    'type' => 'css',
                    'value' => '', // remove this if you do not need a default content
                    'description' => esc_html__( 'Field Description', 'ssc' ),
                    'options' => array(
                        array(
                            'screens' => "any",
                            'Typography' => array(
                                array('property' => 'text-align', 'label' => esc_html__( 'Text Align', 'ssc' )),
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
                                array('property' => 'border-radius', 'label' => esc_html__( 'Border Radius', 'ssc' )),
                            ),
                        ),
                        array(
                            "screens" => "999,768,667,479",

                            //Box group
                            'Box' => array(
                                array('property' => 'margin', 'label' => esc_html__( 'Margin', 'ssc' )),
                                array('property' => 'padding', 'label' => esc_html__( 'Padding', 'ssc' )),
                                array('property' => 'border', 'label' => esc_html__( 'Border', 'ssc' )),
                                array('property' => 'border-radius', 'label' => esc_html__( 'Border Radius', 'ssc' )),
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

function ssc_divider_shortcode($atts, $content = null) {
    extract(shortcode_atts(array(
        'pick_icon' => '1',
        'color' => '',
        'height' => '',
    ) , $atts));
    $output = '';
    extract($atts);

    // Create master class, return as an array
    $master_class = apply_filters( 'kc-el-class', $atts );

    $output .= '<div class="ssc_divider '.implode( ' ', $master_class ) . '">';
    $height = $height * 5;

    if ($pick_icon == '1') {
        $output .= '<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Layer_1" x="0px" y="0px" viewBox="0 0 100 60" style="enable-background:new 0 0 100 60;height: '.$height.'px;" xml:space="preserve">
            <style type="text/css">
                .kc-css-'.$_id.' circle {fill:'.$color.';stroke:'.$color.';stroke-miterlimit:10;}
            </style>
            <circle cx="15" cy="30" r="10" />
            <circle cx="50" cy="30" r="10"/>
            <circle cx="85" cy="30" r="10"/>
            </svg>';
    }
    if ($pick_icon == '2') {
        $output .= '<svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 100 60" style="enable-background:new 0 0 100 60;height: '.$height.'px;" xml:space="preserve">
         <style type="text/css">
                .kc-css-'.$_id.' rect{fill:'.$color.';}
            </style>
            <g><rect x="2.3" y="27.6" width="25" height="3"/></g>
            <g><rect x="13.3" y="16.6" width="3" height="25"/></g>
            <g><rect x="37.5" y="27.6" width="25" height="3"/></g>
            <g><rect x="48.5" y="16.6" width="3" height="25"/></g>
            <g><rect x="72.3" y="27.6" width="25" height="3"/></g>
            <g><rect x="83.3" y="16.6" width="3" height="25"/></g>
            </svg>';
    }
    if ($pick_icon == '3') {
        $output .= '<svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 100 60" style="enable-background:new 0 0 100 60;height: '.$height.'px;" xml:space="preserve">
	 <style type="text/css">
                .kc-css-'.$_id.' rect{fill:'.$color.';}
            </style>
        <g><rect x="-12.3" y="37.6" transform="matrix(0.7071 0.7071 -0.7071 0.7071 39.3606 5.9755)" width="25" height="3"/></g>
        <g><rect x="-1.3" y="26.6" transform="matrix(0.7071 0.7071 -0.7071 0.7071 39.3606 5.9755)" width="3" height="25"/></g>
        <g><rect x="25.5" y="37.6" transform="matrix(0.7071 0.7071 -0.7071 0.7071 49.3606 -20.9755)" width="25" height="3"/></g>
        <g><rect x="36.5" y="26.6" transform="matrix(0.7071 0.7071 -0.7071 0.7071 49.3606 -20.9755)" width="3" height="25"/></g>
        <g><rect x="60.3" y="37.6" transform="matrix(0.7071 0.7071 -0.7071 0.7071 59.5406 -45.5523)" width="25" height="3"/></g>
        <g><rect x="71.3" y="26.6" transform="matrix(0.7071 0.7071 -0.7071 0.7071 59.5406 -45.5523)" width="3" height="25"/></g>
        </svg>';
    }
    if ($pick_icon == '4') {
        $output .= '<svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 100 60" style="enable-background:new 0 0 100 60; height: '.$height.'px;" xml:space="preserve">
  <style type="text/css">
                .kc-css-'.$_id.' path{fill:'.$color.';}
            </style>
        <g><path d="M49.7,41.7c-6.3,0-11.5-5.2-11.5-11.5s5.2-11.5,11.5-11.5c6.3,0,11.5,5.2,11.5,11.5S56,41.7,49.7,41.7z M49.7,21.7 c-4.7,0-8.5,3.8-8.5,8.5s3.8,8.5,8.5,8.5c4.7,0,8.5-3.8,8.5-8.5S54.4,21.7,49.7,21.7z"/></g>
        <g><path d="M29.1,41.3h-26l13-22.5L29.1,41.3z M8.3,38.3h15.6l-7.8-13.5L8.3,38.3z"/></g>
        <g><path d="M95.7,41.7h-23v-23h23V41.7z M75.7,38.7h17v-17h-17V38.7z"/></g>
        </svg>';
    }
    if ($pick_icon == '5') {
        $output .= '<svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 100 60" style="enable-background:new 0 0 100 60; height: '.$height.'px;" xml:space="preserve">
	 <style type="text/css">
                .kc-css-'.$_id.' path{fill:'.$color.';}
            </style>
        <g><path d="M49.7,41.7c-6.3,0-11.5-5.2-11.5-11.5s5.2-11.5,11.5-11.5c6.3,0,11.5,5.2,11.5,11.5S56,41.7,49.7,41.7z M49.7,21.7
                c-4.7,0-8.5,3.8-8.5,8.5s3.8,8.5,8.5,8.5c4.7,0,8.5-3.8,8.5-8.5S54.4,21.7,49.7,21.7z"/></g>
        <g><path d="M29.1,41.3h-26l13-22.5L29.1,41.3z M8.3,38.3h15.6l-7.8-13.5L8.3,38.3z"/></g>
        <g><path d="M97.1,41.3h-26l13-22.5L97.1,41.3z M76.3,38.3h15.6l-7.8-13.5L76.3,38.3z"/></g>
        </svg>';
    }
    if ($pick_icon == '6') {
        $output .= '<svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 100 60" style="enable-background:new 0 0 100 60; height: '.$height.'px;" xml:space="preserve">
        <style type="text/css">
            .kc-css-'.$_id.' rect{stroke:'.$color.';fill:'.$color.'; stroke-miterlimit:10;}
        </style>
        <rect x="0" y="20" width="20" height="20"/>
        <rect x="40" y="20" width="20" height="20"/>
        <rect x="80" y="20" width="20" height="20"/>
        </svg>';
    }
    if ($pick_icon == '7') {
        $output .= '<svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 100 60" style="enable-background:new 0 0 100 60; height: '.$height.'px;" xml:space="preserve">
        <style type="text/css">
            .kc-css-'.$_id.' line, .kc-css-'.$_id.' circle{stroke:'.$color.';fill:'.$color.';stroke-width:2;stroke-miterlimit:10;}
        </style>
        <circle cx="50.1" cy="30.4" r="5"/>
        <line x1="58.7" y1="30.4" x2="100" y2="30.4"/>
        <line x1="41.2" y1="30.4" x2="0.4" y2="30.4"/>
        </svg>';
    }
    if ($pick_icon == '8') {
        $output .= '<svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 100 60" style="enable-background:new 0 0 100 60; height: '.$height.'px;" xml:space="preserve">
         <style type="text/css">
                .kc-css-'.$_id.' path, .kc-css-'.$_id.' polygon{fill:'.$color.';}
            </style>
        <g><g><path d="M1.8,49.3c14.7,0.1,28.1,6,42.9,6c14.7,0,28.2-5.9,42.9-6c3.2,0,4.6-3.9,0.6-3.9c-14.5,0.1-27.7,6-42.1,6
                    c-14.4,0-27.7-5.9-42.1-6C1.3,45.4-2.1,49.3,1.8,49.3L1.8,49.3z"/></g></g>
        <g><polygon points="79.5,41.3 96.5,45.5 80.8,53.3 	"/>
            <path d="M80,54.9L78.3,40l21,5.1L80,54.9z M80.6,42.6l1,9.2l12-6L80.6,42.6z"/></g>
        </svg>';
    }
    if ($pick_icon == '9') {
        $output .= '<svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 100 60" style="enable-background:new 0 0 100 60; height: '.$height.'px;" xml:space="preserve">
        <style type="text/css">
            .kc-css-'.$_id.' path {fill: '.$color.';stroke: '.$color.'}
        </style>
        <g><path d="M28.7,30.4H0.4l14.1-24.5L28.7,30.4z M5.6,27.4h17.9l-8.9-15.5L5.6,27.4z"/></g>
        <g><path d="M99.9,30.4H71.6l14.1-24.5L99.9,30.4z M76.8,27.4h17.9l-8.9-15.5L76.8,27.4z"/></g>
        <g><path d="M51.3,30.7L37.2, 6.2h28.3L51.3,30.7z M42.4, 9.2l8.9,15.5l8.9-15.5H42.4z"/></g>
        </svg>';
    }
    if ($pick_icon == '10') {
        $output .= '<svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
	 viewBox="0 0 100 60" style="enable-background:new 0 0 100 60; height: '.$height.'px;" xml:space="preserve">
        <style type="text/css">
            .kc-css-'.$_id.' polygon {stroke:'.$color.';fill:'.$color.';stroke-miterlimit:10;}
        </style>
        <polygon points="1.5,35 13,15 24.5,35 "/>
        <polygon points="33.4,35 46,15 57.5,35 "/>
        <polygon points="67.1,35 78.7,15 90.2,35 "/>
        </svg>';
    }
    if ($pick_icon == '11') {
        $output .= '<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Layer_1" x="0px" y="0px" viewBox="0 0 100 60" style="enable-background:new 0 0 100 60;height: '.$height.'px;" xml:space="preserve">
            <style type="text/css">
                .kc-css-'.$_id.' circle {fill: transparent;stroke:'.$color.';stroke-miterlimit:10;    stroke-width: 4px;}
            </style>
            <circle cx="15" cy="30" r="10" />
            <circle cx="50" cy="30" r="10"/>
            <circle cx="85" cy="30" r="10"/>
            </svg>';
    }
    if ($pick_icon == '12') {
        $output .= '<svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 100 60" style="enable-background:new 0 0 100 60;height: '.$height.'px;" xml:space="preserve">
        <style type="text/css">
            .kc-css-'.$_id.' circle {fill:transparent;stroke:'.$color.';stroke-width:2;stroke-miterlimit:10;}
            .kc-css-'.$_id.' line {fill:none;stroke:'.$color.';stroke-width:2;stroke-miterlimit:10;}
        </style>
        <circle cx="50.1" cy="30.4" r="5"/>
        <line x1="55.1" y1="30.4" x2="100" y2="30.4"/>
        <line x1="45.1" y1="30.4" x2="0" y2="30.4"/>
        </svg>';
    }
    if ($pick_icon == '13') {
        $output .= '<svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 100 60" style="enable-background:new 0 0 100 60;height: '.$height.'px;" xml:space="preserve">
        <style type="text/css">
        .kc-css-'.$_id.' circle, .kc-css-'.$_id.' rect {fill: '.$color.';stroke:'.$color.';}
        </style>
        <g><rect x="8.3" y="27.3" width="84.9" height="3"/></g>
        <g><circle cx="5.1" cy="28.8" r="4"/></g>
        <g><circle cx="95.1" cy="28.8" r="4"/></g>
        </svg>';
    }
    if ($pick_icon == '14') {
        $output .= '<svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 100 60" style="enable-background:new 0 0 100 60;height: '.$height.'px;" xml:space="preserve">
        <style type="text/css">
        .kc-css-'.$_id.' rect, .kc-css-'.$_id.' polygon {fill: '.$color.';stroke:'.$color.';}
        </style>
        <g><rect x="8.3" y="27.3" width="84.9" height="3"/></g>
        <polygon points="85,22.3 100,28.8 85,35.3 "/>
        <polygon points="15,35.3 0,28.8 15,22.3 "/>
        </svg>';
    }
    if ($pick_icon == '15') {
        $output .= '<svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 100 60" style="enable-background:new 0 0 100 60;height: '.$height.'px;" xml:space="preserve">
        <style type="text/css">
            .kc-css-'.$_id.' circle {fill:'.$color.';stroke:'.$color.';stroke-width:2;stroke-miterlimit:10;}
            .kc-css-'.$_id.' line {fill:none;stroke:'.$color.';stroke-width:2;stroke-miterlimit:10;}
        </style>
        <circle cx="50.1" cy="30.4" r="5"/>
        <line x1="55.1" y1="30.4" x2="100" y2="30.4"/>
        <line x1="45.1" y1="30.4" x2="0" y2="30.4"/>
        </svg>';
    }
    if ($pick_icon == '16') {
        $output .= '<svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 100 60" style="enable-background:new 0 0 100 60;height: '.$height.'px;" xml:space="preserve">
        <style type="text/css">
        .kc-css-'.$_id.' path {fill: '.$color.';stroke:'.$color.';}
        </style>
        <g><g><path d="M2.5,29.5c4.8,0.2,7.4,4.2,11.8,5.5c3.9,1.1,8.1,0.5,11.6-1.6c4.6-2.9,8.4-5.5,13.7-2.1c3.4,2.2,6.1,4.2,10.4,4.2
			c4.3,0,7-2,10.4-4.2c5.1-3.3,8.9-1.1,13.3,1.8c3.3,2.2,7.5,3,11.4,2.1c4.7-1.1,7.4-5.4,12.4-5.6c3.2-0.2,3.2-5.2,0-5
			c-4.6,0.2-7.1,2.2-10.8,4.5c-5.2,3.2-8.9,0.4-13.3-2.3c-3.6-2.2-8.1-2.8-12.1-1.5c-4.1,1.4-6.6,5.3-11.2,5.3
			c-4.6,0-7.1-3.9-11.2-5.3c-3.8-1.3-8.2-0.8-11.7,1.2c-4.4,2.6-7.9,5.9-13.3,2.9c-4-2.3-6.3-4.5-11.2-4.8
			C-0.7,24.3-0.7,29.3,2.5,29.5L2.5,29.5z"/></g></g>
        </svg>';
    }
    if ($pick_icon == '17') {
        $output .= '<svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 150 90" style="enable-background:new 0 0 150 90;height: '.$height.'px;" xml:space="preserve">
        <style type="text/css">
        .kc-css-'.$_id.' path, .kc-css-'.$_id.' rect {fill: '.$color.';stroke:'.$color.';stroke-miterlimit:10;}
        </style>
        <g><path d="M3.6,47.5c41.8,0,53.7,0,125.5,0c5.8,0,11.7,0,17.5,0c3.2,0,3.2-5,0-5c-41.8,0-83.7,0-125.5,0c-5.8,0-11.7,0-17.5,0
                C0.4,42.5,0.4,47.5,3.6,47.5L3.6,47.5z"/></g>
        <rect x="65" y="35" class="st0" width="20" height="20"/>
        </svg>';
    }
    if ($pick_icon == '18') {
        $output .= '<svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"viewBox="0 0 150 90" style="enable-background:new 0 0 150 90;height: '.$height.'px;" xml:space="preserve">
        <style type="text/css">
        .kc-css-'.$_id.' path, .kc-css-'.$_id.' polygon {fill: '.$color.';stroke:'.$color.';stroke-miterlimit:10;}
        </style>
        <g><g><path d="M3.6,47.5c41.8,0,53.7,0,125.5,0c5.8,0,11.7,0,17.5,0c3.2,0,3.2-5,0-5c-41.8,0-83.7,0-125.5,0c-5.8,0-11.7,0-17.5,0
                    C0.4,42.5,0.4,47.5,3.6,47.5L3.6,47.5z"/></g></g>
        <polygon points="57.8,57.5 75.1,27.5 92.4,57.5 "/>
        </svg>';
    }
    if ($pick_icon == '19') {
        $output .= '<svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 100 60" style="enable-background:new 0 0 100 60;height: '.$height.'px;" xml:space="preserve">
        <style type="text/css">
        .kc-css-'.$_id.' path {fill: '.$color.';stroke:'.$color.';stroke-miterlimit:10;}
        </style>
        <g><path d="M1.7,25.7c5.2,4,10.4,8,15.7,12c0.6,0.5,1.9,0.5,2.5,0c5.2-4,10.4-8,15.7-12c-0.8,0-1.7,0-2.5,0c5.2,4,10.4,8,15.7,12
                c0.6,0.5,1.9,0.5,2.5,0c5.2-4,10.4-8,15.7-12c-0.8,0-1.7,0-2.5,0c5.2,4,10.4,8,15.7,12c0.6,0.5,1.9,0.5,2.5,0c5.2-4,10.4-8,15.7-12
                c2.5-1.9,0-6.3-2.5-4.3c-5.2,4-10.4,8-15.7,12c0.8,0,1.7,0,2.5,0c-5.2-4-10.4-8-15.7-12c-0.6-0.5-1.9-0.5-2.5,0
                c-5.2,4-10.4,8-15.7,12c0.8,0,1.7,0,2.5,0c-5.2-4-10.4-8-15.7-12c-0.6-0.5-1.9-0.5-2.5,0c-5.2,4-10.4,8-15.7,12c0.8,0,1.7,0,2.5,0
                c-5.2-4-10.4-8-15.7-12C1.7,19.4-0.8,23.7,1.7,25.7L1.7,25.7z"/></g>
        </svg>';
    }
    if ($pick_icon == '20') {
        $output .= '<svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
	 viewBox="0 0 400 400" style="enable-background:new 0 0 400 400;height: '.($height*2).'px;" xml:space="preserve">
        <style type="text/css">
        .kc-css-'.$_id.' path {fill: '.$color.';stroke:'.$color.';stroke-miterlimit:10;}
        </style>
	<g>
		<path d="M355.105,118.905c-14.799,0-22.337-6.899-28.988-12.986c-6.005-5.497-10.749-9.839-20.886-9.839
			c-10.137,0-14.881,4.342-20.887,9.839c-6.65,6.087-14.188,12.986-28.988,12.986c-14.8,0-22.337-6.899-28.988-12.986
			c-6.005-5.497-10.748-9.839-20.885-9.839c-10.136,0-14.879,4.342-20.884,9.839c-6.65,6.087-14.188,12.986-28.988,12.986
			c-14.798,0-22.334-6.899-28.984-12.986c-6.004-5.497-10.747-9.839-20.882-9.839c-10.136,0-14.879,4.342-20.884,9.839
			c-6.65,6.087-14.188,12.986-28.987,12.986c-14.8,0-22.338-6.899-28.989-12.986C20.88,100.422,16.137,96.08,6,96.08
			c-3.313,0-6-2.686-6-6c0-3.313,2.687-6,6-6c14.799,0,22.337,6.899,28.988,12.986c6.005,5.497,10.749,9.839,20.886,9.839
			c10.136,0,14.879-4.342,20.884-9.838c6.65-6.088,14.188-12.987,28.987-12.987c14.798,0,22.335,6.9,28.985,12.987
			c6.004,5.497,10.746,9.838,20.881,9.838c10.137,0,14.88-4.342,20.885-9.838c6.65-6.088,14.188-12.987,28.987-12.987
			c14.8,0,22.337,6.899,28.988,12.987c6.005,5.496,10.749,9.838,20.885,9.838c10.138,0,14.881-4.342,20.886-9.838
			c6.651-6.088,14.189-12.987,28.989-12.987s22.338,6.899,28.989,12.987c6.005,5.496,10.748,9.838,20.885,9.838
			c10.139,0,14.883-4.342,20.89-9.839c6.651-6.087,14.19-12.986,28.991-12.986c3.313,0,6,2.687,6,6c0,3.314-2.687,6-6,6
			c-10.139,0-14.883,4.342-20.89,9.839C377.445,112.006,369.907,118.905,355.105,118.905z"/>
	</g>

</svg>';
    }


    $output .= '</div>';
    return $output;
}

add_shortcode('ssc_divider', 'ssc_divider_shortcode');