<?php



add_action('init', 'ssc_bgrlabel_params', 99);

/**
 * Additional functions
 */

/**
 * Additional functions
 */


function ssc_bgrlabel_params() {
    global $kc;

     $kc->add_map(array(
        'ssc_bgrlabel' => array(
            'name' => esc_html__( 'Background Label', 'ssc' ),
            'description' => esc_html__( 'It displays label on background of the column or row', 'ssc' ),
            'icon' => 'kc-icon-box ssc-icon-1',
            'category' => 'SecretLab',
            'css_box' => true,
            'params' => array(
                esc_html__( 'General', 'ssc' ) => array(
	                array(
		                'name' => 'l_type',
		                'label' => esc_html__( 'Label Type', 'ssc' ),
		                'type' => 'radio',
		                'options' => array(
			                'text' => esc_html__( 'Text', 'ssc' ),
			                'svg' => esc_html__( 'SVG', 'ssc' ),
			                'img' => esc_html__( 'Image', 'ssc' ),
//			                'text' => esc_html__( 'Text', 'ssc' ),
		                ),
		                'value' => 'text',
		                'description' => esc_html__( 'Pick what to use: svg or image', 'ssc' ),
	                ),
                    array(
                        'name' => 'text',
                        'label' => esc_html__( 'Insert Text', 'ssc'),
                        'type' => 'text',
                        'admin_label' => true,
                        'value' => esc_html__( 'Title Goes Here', 'ssc'),
                        'relation' => array(
	                        'parent' => 'l_type',
	                        'show_when' => 'text'
                        ),
                    ),
	                array(
		                'name' => 'svg',
		                'label' => esc_html__( 'Select SVG Icon', 'ssc' ),
		                'type' => 'attach_image',
		                'admin_label' => true,
		                'relation' => array(
			                'parent' => 'l_type',
			                'show_when' => 'svg'
		                ),
	                ),
	                array(
		                'type' => 'color_picker',
		                'label' => esc_html__( 'SVG Color', 'ssc' ),
		                'name' => 'svg_color',
		                'relation' => array(
			                'parent' => 'l_type',
			                'show_when' => 'svg'
		                ),
		                'description' => esc_html__( 'Deprecated! Use "fill" field at the "Styling\Hover" tab instead.', 'ssc' ),
	                ),
	                array(
		                'type' => 'color_picker',
		                'label' => esc_html__( 'SVG Hover Color', 'ssc' ),
		                'name' => 'svg_hcolor',
		                'relation' => array(
			                'parent' => 'l_type',
			                'show_when' => 'svg'
		                ),
		                'description' => esc_html__( 'Deprecated! Use "fill" field at the "Styling\Hover" tab instead.', 'ssc' ),
	                ),
	                array(
		                'name' => 'img',
		                'label' => esc_html__( 'Select Image', 'ssc' ),
		                'type' => 'attach_image',
		                'admin_label' => true,
		                'relation' => array(
			                'parent' => 'l_type',
			                'show_when' => 'img'
		                ),
	                ),
	                array(
		                'type'        	=> 'dropdown',
		                'label'     	=> esc_html__( 'Image size', 'ssc' ),
		                'name' 		 	=> 'img_size',
		                'description' 	=> esc_html__( 'Set the image size.', 'ssc' ),
//                            'value'       	=> 'full',
		                'options'       => ssc_get_image_sizes(),
		                'relation' => array(
			                'parent' => 'l_type',
			                'show_when' => 'img'
		                ),
	                ),
	                array(
		                'type'        	=> 'text',
		                'label'     	=> esc_html__( 'Custom Image size', 'ssc' ),
		                'name' 		 	=> 'custom_img_size',
		                'description' 	=> esc_html__( 'Set the image size: "thumbnail", "medium", "large", "full" or "400x200".', 'ssc' ),
//                            'value'       	=> 'full',
		                'relation'  	=> array(
			                'parent'	=> 'img_size',
			                'show_when' => 'custom_size'
		                )
	                ),
                    array(
                        'name' => 'top',
                        'label' => esc_html__( 'Position Top, in px. Example: 0, 25', 'ssc'),
                        'type' => 'text',
                        'admin_label' => true,
                        'value' => 0,
                    ),
                    array(
                        'name' => 'left',
                        'label' => esc_html__( 'Position Left, in px. Example: 0, 25', 'ssc'),
                        'type' => 'text',
                        'admin_label' => true,
                        'value' => 10,
                    ),
                    array(
                        'name' => 'bottom',
                        'label' => esc_html__( 'Position Bottom, in px. Example: 0, 25', 'ssc'),
                        'type' => 'text',
                        'admin_label' => true,
                        'value' => '',
                    ),
                    array(
                        'name' => 'right',
                        'label' => esc_html__( 'Position Right, in px. Example: 0, 25', 'ssc'),
                        'type' => 'text',
                        'admin_label' => true,
                        'value' => '',
                    ),
	                array(
		                'name'        => 'class',
		                'label'       => __(' Wrapper extra class', 'ssc'),
		                'type'        => 'text',
		                'description' => __(' If you wish to style a particular content element differently, please add a class name to this field and refer to it in your custom CSS file.', 'ssc'),
	                )
                ),
                //Styling
                esc_html__( 'styling', 'ssc' ) => array(
                    array(
                        'name' => 'my-css',
                        'label' => esc_html__( 'Styling', 'ssc' ),
                        'type' => 'css',
                        'value' => '', // remove this if you do not need a default content
                        'description' => esc_html__( 'Styles', 'ssc' ),
                        'options' => array(
                            array(
	                            "screens" => "any,1024,999,767,479",
                                'Block' => array(
                                    array('property' => 'color', 'label' => esc_html__( 'Color', 'ssc' )),
                                    array('property' => 'font-size', 'label' => esc_html__( 'Font Size', 'ssc' )),
                                    array('property' => 'line-height', 'label' => esc_html__( 'Line Height', 'ssc' )),
                                    array('property' => 'font-weight', 'label' => esc_html__( 'Font Weight', 'ssc' )),
                                    array('property' => 'font-style', 'label' => esc_html__( 'Font Style', 'ssc' )),
                                    array('property' => 'font-family', 'label' => esc_html__( 'Font Family', 'ssc' )),
                                    array('property' => 'text-align', 'label' => esc_html__( 'Text Align', 'ssc' )),
	                                array('property' => 'margin', 'label' => esc_html__( 'Margin', 'ssc' )),
	                                array('property' => 'padding', 'label' => esc_html__( 'Padding', 'ssc' )),
                                    array('property' => 'white-space', 'label' => esc_html__( 'White space', 'ssc' )),
                                    array('property' => 'text-transform', 'label' => esc_html__( 'Text Transform', 'ssc' )),
                                    array('property' => 'text-decoration', 'label' => esc_html__( 'Text Decoration', 'ssc' )),
	                                array( 'property' => 'letter-spacing', 'label'    => esc_html__( 'Letter Spacing', 'ssc' )),
                                    array('property' => 'background'),
                                    array('property' => 'width', 'label' => esc_html__( 'Width', 'ssc' )),
                                    array('property' => 'max-width', 'label' => esc_html__( 'Max-Width', 'ssc' )),
                                    array('property' => 'min-width', 'label' => esc_html__( 'Min-Width', 'ssc' )),
                                    array('property' => 'height', 'label' => esc_html__( 'Height', 'ssc' )),
	                                array('property' => 'z-index', 'label' => esc_html__( 'Z-index', 'ssc' )),
	                                array('property' => 'overflow', 'label' => esc_html__('Overflow','ssc' )),
	                                array('property' => 'position', 'label' => esc_html__('Position','ssc' )),
	                                array('property' => 'display', 'label' => esc_html__('Display','ssc' )),
                                    array('property' => 'box-shadow', 'label' => esc_html__( 'Box Shadow', 'ssc' )),
                                    array('property' => 'opacity', 'label' => esc_html__( 'Opacity', 'ssc' )),
                                    array('property' => 'border', 'label' => esc_html__( 'Border', 'ssc' )),
                                    array('property' => 'border-radius', 'label' => esc_html__( 'Border Radius', 'ssc' )),
                                ),
	                            'Inside Box' => array(
		                            array('property' => 'color', 'label' => esc_html__( 'Color', 'ssc' ), 'selector' => '.inside_wrap'),
		                            array('property' => 'font-size', 'label' => esc_html__( 'Font Size', 'ssc' ), 'selector' => '.inside_wrap'),
		                            array('property' => 'line-height', 'label' => esc_html__( 'Line Height', 'ssc' ), 'selector' => '.inside_wrap'),
		                            array('property' => 'font-weight', 'label' => esc_html__( 'Font Weight', 'ssc' ), 'selector' => '.inside_wrap'),
		                            array('property' => 'font-style', 'label' => esc_html__( 'Font Style', 'ssc' ), 'selector' => '.inside_wrap'),
		                            array('property' => 'font-family', 'label' => esc_html__( 'Font Family', 'ssc' ), 'selector' => '.inside_wrap'),
		                            array('property' => 'text-align', 'label' => esc_html__( 'Text Align', 'ssc' ), 'selector' => '.inside_wrap'),
		                            array('property' => 'margin', 'label' => esc_html__( 'Margin', 'ssc' ), 'selector' => '.inside_wrap'),
		                            array('property' => 'padding', 'label' => esc_html__( 'Padding', 'ssc' ), 'selector' => '.inside_wrap'),
		                            array('property' => 'white-space', 'label' => esc_html__( 'White space', 'ssc' ), 'selector' => '.inside_wrap'),
		                            array('property' => 'text-transform', 'label' => esc_html__( 'Text Transform', 'ssc' ), 'selector' => '.inside_wrap'),
		                            array('property' => 'text-decoration', 'label' => esc_html__( 'Text Decoration', 'ssc' ), 'selector' => '.inside_wrap'),
		                            array( 'property' => 'letter-spacing', 'label'    => esc_html__( 'Letter Spacing', 'ssc' ), 'selector' => '.inside_wrap'),
		                            array('property' => 'background', 'selector' => '.inside_wrap'),
		                            array('property' => 'width', 'label' => esc_html__( 'Width', 'ssc' ), 'selector' => '.inside_wrap'),
		                            array('property' => 'height', 'label' => esc_html__( 'Height', 'ssc' ), 'selector' => '.inside_wrap'),
		                            array('property' => 'z-index', 'label' => esc_html__( 'Z-index', 'ssc' ), 'selector' => '.inside_wrap'),
		                            array('property' => 'overflow', 'label' => esc_html__('Overflow','ssc' ), 'selector' => '.inside_wrap'),
		                            array('property' => 'box-shadow', 'label' => esc_html__( 'Box Shadow', 'ssc' ), 'selector' => '.inside_wrap'),
		                            array('property' => 'opacity', 'label' => esc_html__( 'Opacity', 'ssc' ), 'selector' => '.inside_wrap'),
		                            array('property' => 'border', 'label' => esc_html__( 'Border', 'ssc' ), 'selector' => '.inside_wrap'),
		                            array('property' => 'border-radius', 'label' => esc_html__( 'Border Radius', 'ssc' ), 'selector' => '.inside_wrap'),
	                            ),
	                            'SVG' => array(
		                            array('property' => 'fill', 'label' => esc_html__( 'Fill', 'ssc' ), 'selector' => '.svgl svg'),
		                            array('property' => 'width', 'label' => esc_html__( 'Width', 'ssc' ), 'selector' => '.svgl svg'),
		                            array('property' => 'max-width', 'label' => esc_html__( 'Max Width', 'ssc' ), 'selector' => '.svgl svg'),
		                            array('property' => 'height', 'label' => esc_html__( 'Height', 'ssc' ), 'selector' => '.svgl svg'),
		                            array('property' => 'background', 'selector' => '.svgl'),
		                            array('property' => 'box-shadow', 'label' => esc_html__( 'Box Shadow', 'ssc' ), 'selector' => '.svgl'),
		                            array('property' => 'opacity', 'label' => esc_html__( 'Opacity', 'ssc' ), 'selector' => '.svgl'),
		                            array('property' => 'margin', 'label' => esc_html__( 'Margin', 'ssc' ), 'selector' => '.svgl'),
		                            array('property' => 'padding', 'label' => esc_html__( 'Padding', 'ssc' ), 'selector' => '.svgl'),
		                            array('property' => 'border', 'label' => esc_html__( 'Border', 'ssc' ), 'selector' => '.svgl'),
		                            array('property' => 'border-radius', 'label' => esc_html__( 'Border Radius', 'ssc' ), 'selector' => '.svgl'),
	                            ),
	                            'IMG' => array(
		                            array('property' => 'width', 'label' => esc_html__( 'Width', 'ssc' ), 'selector' => '.imgl img'),
		                            array('property' => 'max-width', 'label' => esc_html__( 'Max Width', 'ssc' ), 'selector' => '.imgl img'),
		                            array('property' => 'height', 'label' => esc_html__( 'Height', 'ssc' ), 'selector' => '.imgl img'),
		                            array('property' => 'box-shadow', 'label' => esc_html__( 'Box Shadow', 'ssc' ), 'selector' => '.imgl img'),
		                            array('property' => 'opacity', 'label' => esc_html__( 'Opacity', 'ssc' ), 'selector' => '.imgl img'),
		                            array('property' => 'margin', 'label' => esc_html__( 'Margin', 'ssc' ), 'selector' => '.imgl img'),
		                            array('property' => 'padding', 'label' => esc_html__( 'Padding', 'ssc' ), 'selector' => '.imgl img'),
		                            array('property' => 'border', 'label' => esc_html__( 'Border', 'ssc' ), 'selector' => '.imgl img'),
		                            array('property' => 'border-radius', 'label' => esc_html__( 'Border Radius', 'ssc' ), 'selector' => '.imgl img'),
	                            ),
                                
                            ),
                        )
                    )
                ),
                esc_html__(  'hover', 'ssc' ) => array(
	                array(
		                'name' => 'hover-css',
		                'label' => esc_html__( 'Hover', 'ssc' ),
		                'type' => 'css',
		                'value' => '', // remove this if you do not need a default content
		                'description' => 'Styles for Hover Condition',
		                'options' => array(
			                array(
				                "screens" => "any,1024,999,767,479",
				                'Block' => array(
					                array('property' => 'background', 'selector' => ':hover'),
					                array('property' => 'box-shadow', 'label' => esc_html__( 'Box Shadow', 'ssc' ), 'selector' => ':hover'),
					                array('property' => 'opacity', 'label' => esc_html__( 'Opacity', 'ssc' ), 'selector' => ':hover'),
					                array('property' => 'border', 'label' => esc_html__( 'Border', 'ssc' ), 'selector' => ':hover'),
					                array('property' => 'border-radius', 'label' => esc_html__( 'Border Radius', 'ssc' ), 'selector' => ':hover'),
				                ),
				                'SVG' => array(
					                array('property' => 'fill', 'label' => esc_html__( 'Fill', 'ssc' ) . ' ' . esc_html__( 'Hover', 'ssc' ), 'selector' => ':hover .svgl svg'),
					                array('property' => 'background', 'selector' => ':hover .svgl'),
					                array('property' => 'box-shadow', 'label' => esc_html__( 'Box Shadow', 'ssc' ), 'selector' => ':hover .svgl'),
					                array('property' => 'opacity', 'label' => esc_html__( 'Opacity', 'ssc' ), 'selector' => ':hover .svgl'),
					                array('property' => 'border', 'label' => esc_html__( 'Border', 'ssc' ), 'selector' => ':hover .svgl'),
					                array('property' => 'border-radius', 'label' => esc_html__( 'Border Radius', 'ssc' ), 'selector' => ':hover .svgl'),
				                ),
				                'IMG' => array(
					                array('property' => 'box-shadow', 'label' => esc_html__( 'Box Shadow', 'ssc' ), 'selector' => ':hover .imgl img'),
					                array('property' => 'opacity', 'label' => esc_html__( 'Opacity', 'ssc' ), 'selector' => ':hover .imgl img'),
					                array('property' => 'border', 'label' => esc_html__( 'Border', 'ssc' ), 'selector' => ':hover .imgl img'),
					                array('property' => 'border-radius', 'label' => esc_html__( 'Border Radius', 'ssc' ), 'selector' => ':hover .imgl img'),
				                ),
			                ),
		                )
	                ),
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

function ssc_bgrlabel_shortcode($atts, $content = null) {
	$top = $left = $bottom = $right = $text = '';
    extract(shortcode_atts(array(
	    'l_type' => 'text',
	    'svg' => '',
	    'img' => '',
	    'img_size' => 'full',
	    'custom_img_size' => '400x200',
        'text' => '',
        'top' => '',
        'left' => '',
        'bottom' => '',
        'right' => '',
        'class' => '',
    ) , $atts));

	$output = $label = '';

	$wrp_classes = apply_filters( 'kc-el-class', $atts );

	switch ($l_type){
		case 'svg':
			if ( $svg != '' ) {
				$label = '<div class="svgl"><div>' . ssc_process_svg( $svg ) . '</div></div>';
			}
			break;
		case 'img':
			if ( $img != '' ) {
				if( 'custom_size' == $img_size ){
					$cs = ssc_get_img_sizes_array_from_string( $custom_img_size );
					$image = wp_get_attachment_image_src( $img, $cs );
				} else {
					$image = image_downsize( $img, $img_size );
				}
				$label = '<div class="imgl"><img src="' . esc_attr( $image[0] ) . '" alt=""></div>';
			}
			break;
		case 'text':
			if ( $text != '' ) {
				$label = $text;
			}
			break;
	}

    $ftop = $top != '' ? 'top:' . $top. 'px;' : '';
    $fleft = $left != '' ? 'left:' . $left. 'px;' : '';
    $fbottom = $bottom != '' ? 'bottom:' . $bottom. 'px;' : '';
    $fright = $right != '' ? 'right:' . $right. 'px;' : '';

    if ( $label != '' ) {
		$output .= '<div class="bgrlabel '.$class.' '.implode( ' ', $wrp_classes ) . '" style="'.$ftop.$fleft.$fbottom.$fright.'"><div class="inside_wrap">';
		$output .= $label;
		$output .=  '</div></div>';
	}


    return $output;
}

add_shortcode('ssc_bgrlabel', 'ssc_bgrlabel_shortcode');

add_filter( 'shortcode_ssc_bgrlabel_before_css_generating', 'ssc_bgrlabel_filter_css', 1 );

function ssc_bgrlabel_filter_css( $atts ) {
	$styles = $hover_styles = array();
	extract( shortcode_atts( array(
		'l_type'     => 'text',
		'svg'        => '',
		'svg_color'  => '',
		'svg_hcolor' => '',
	),
		$atts ) );


	switch ( $l_type ) {
		case 'svg':
			if ( $svg != '' ) {
				if ( '' !== $svg_color ) {
					if ( ! empty ( $atts['my-css'] ) ) {
						$styles = json_decode( str_replace( '`', '"', $atts['my-css'] ), true);
					}
					if ( empty ( $styles['kc-css']['any']['svg']['fill|.svgl svg'] ) ) {
						$styles['kc-css']['any']['svg']['fill|.svgl svg'] = $svg_color;
					}
					$atts['my-css'] = str_replace( '"', '`', json_encode( $styles, JSON_FORCE_OBJECT  ) );
				}
				if ( '' !== $svg_hcolor ) {
					if ( ! empty ( $atts['hover-css'] ) ) {
						$hover_styles = json_decode( str_replace( '`', '"', $atts['hover-css'] ), true);
					}
					if ( empty ( $hover_styles['kc-css']['any']['svg']['fill|:hover .svgl svg'] ) ) {
						$hover_styles['kc-css']['any']['svg']['fill|:hover .svgl svg'] = $svg_hcolor;
					}
					$atts['hover-css'] = str_replace( '"', '`', json_encode( $hover_styles, JSON_FORCE_OBJECT  ) );
				}
			}
			break;
	}

	return $atts;
}