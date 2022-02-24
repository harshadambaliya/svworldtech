<?php



add_action('init', 'ssc_testimonial_params', 99);

/**
 * Additional functions
 */

/**
 * Additional functions
 */


function ssc_testimonial_params() {
    global $kc;

     $kc->add_map(array(
        'ssc_testimonial' => array(
            'name' => esc_html__( 'Testimonial Extended', 'ssc' ),
            'description' => esc_html__( 'It displays testimonal with custom options', 'ssc' ),
            'icon' => 'kc-icon-box ssc-icon-22',
            // 'is_container' => true,
            'category' => 'SecretLab',
            'css_box' => true,
            'params' => array(
	            'general'	=> array(

	            ),


                //Styling
                esc_html__( 'styling', 'ssc' ) => array(
                    array(
                        'name' => 'my-css',
                        'label' => esc_html__( 'Styling', 'ssc' ),
                        'type' => 'css',
                        'value' => '', // remove this if you do not need a default content
                        'options' => array(
                            array(
                                'screens' => "any, 999,768,667,479",

                            ),
                        )
                    )
                ),


            )
        )
    ));
}

// Register Shortcode

function ssc_testimonial_shortcode($atts, $content = null) {
	$title = $desc = $image = $img_size = $position = $custom_class = $data_img = $data_title = $data_desc = $data_position = $template = '';
    extract(shortcode_atts(array(
        'text' => '',
        'top' => '',
        'left' => '',
        'bottom' => '',
        'right' => '',
    ) , $atts));

	if ( !empty( $title ) ) {
		$data_title .= '<div class="content-title">'.$title.'</div>';
	}
	if ( !empty( $desc ) ) {
		$data_desc .= '<div class="content-desc">'.$desc.'</div>';
	}
	if ( !empty( $position ) ) {
		$data_position .= '<div class="content-position">'.$position.'</div>';
	}

    $output = '';
    extract($atts);

    $wrp_classes = apply_filters( 'kc-el-class', $atts );
    $output .= '<div class="ssc_testimonial '.implode( ' ', $wrp_classes ) . '" >';

	switch ( $template ) {
		case '2':
			$output .=  $data_title.$data_position.$data_desc;
			break;
		case '3':
			$output .= $data_img.$data_title.$data_position.$data_desc;
			break;
		case '4':
			$output .=  $data_img.'<div class="box-right">'. $data_desc.$data_position.$data_title.'</div>';
			break;
		case '5':
			$output .=  $data_desc.$data_img.'<div class="box-right">'.$data_title.$data_position.'</div>';
			break;
		default:
			$output .= $data_img.$data_desc.$data_title.$data_position;
			break;
    $output .=  '</div>';

    return $output;
}

add_shortcode('ssc_testimonial', 'ssc_testimonial_shortcode');

