<?php



add_action('init', 'ssc_svglabel_params', 99);

/**
 * Additional functions
 */


function ssc_svglabel_params() {
    global $kc;

     $kc->add_map(array(
        'ssc_svglabel' => array(
            'name' => esc_html__( 'SVG Label', 'ssc' ),
            'description' => esc_html__( 'It displays label on background of the column or row', 'ssc' ),
            'icon' => 'kc-icon-box ssc-icon-26',
            'category' => 'SecretLab',
            'css_box' => true,
            'params' => array(
                esc_html__( 'General', 'ssc' ) => array(
	                array(
		                'name' => 'l_type',
		                'label' => esc_html__( 'Label Type', 'ssc' ),
		                'type' => 'radio',
		                'options' => array(
//			                'icon' => esc_html__( 'Icon', 'ssc' ),
			                'svg' => esc_html__( 'SVG', 'ssc' ),
			                'img' => esc_html__( 'Image', 'ssc' ),
//			                'text' => esc_html__( 'Text', 'ssc' ),
		                ),
		                'value' => 'svg',
		                'description' => esc_html__( 'Pick what to use: svg or image', 'ssc' ),
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
		                'description' => esc_html__( 'Deprecated! Use "fill" field at the "Styling" tab instead.', 'ssc' ),
	                ),
	                array(
		                'type' => 'color_picker',
		                'label' => esc_html__( 'SVG Hover Color', 'ssc' ),
		                'name' => 'svg_hcolor',
		                'relation' => array(
			                'parent' => 'l_type',
			                'show_when' => 'svg'
		                ),
		                'description' => esc_html__( 'Deprecated! Use "fill" field at the "Styling" tab instead.', 'ssc' ),
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
                    
                ),
                //Styling
                esc_html__( 'styling', 'ssc' ) => array(
                    array(
                        'name' => 'my-css',
                        'label' => esc_html__( 'Styling', 'ssc' ),
                        'type' => 'css',
                        'value'        => '{`kc-css`:{`any`:{`svg`:{`width|.svgl svg`:`40px`,`height|.svgl svg`:`40px`}}}}',
                        'description' => esc_html__( 'Styles', 'ssc' ),
                        'options' => array(
                            array(
	                            "screens" => "any,1024,999,767,479",
                                'Box' => array(
	                                array('property' => 'margin', 'label' => esc_html__( 'Margin', 'ssc' )),
	                                array('property' => 'padding', 'label' => esc_html__( 'Padding', 'ssc' )),
                                    array('property' => 'background'),
//                                    array('property' => 'width', 'label' => esc_html__( 'Width', 'ssc' )),
//                                    array('property' => 'height', 'label' => esc_html__( 'Height', 'ssc' )),
	                                array('property' => 'overflow', 'label' => esc_html__('Overflow','ssc' )),
                                    array('property' => 'box-shadow', 'label' => esc_html__( 'Box Shadow', 'ssc' )),
                                    array('property' => 'opacity', 'label' => esc_html__( 'Opacity', 'ssc' )),
                                    array('property' => 'border', 'label' => esc_html__( 'Border', 'ssc' )),
                                    array('property' => 'border-radius', 'label' => esc_html__( 'Border Radius', 'ssc' )),
                                ),
	                            'SVG' => array(
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
				                'Box' => array(
					                array('property' => 'background', 'selector' => ':hover'),
					                array('property' => 'box-shadow', 'label' => esc_html__( 'Box Shadow', 'ssc' ), 'selector' => ':hover'),
					                array('property' => 'opacity', 'label' => esc_html__( 'Opacity', 'ssc' ), 'selector' => ':hover'),
					                array('property' => 'border', 'label' => esc_html__( 'Border', 'ssc' ), 'selector' => ':hover'),
					                array('property' => 'border-radius', 'label' => esc_html__( 'Border Radius', 'ssc' ), 'selector' => ':hover'),
				                ),
				                'SVG' => array(
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

function ssc_svglabel_shortcode($atts, $content = null) {
    extract(shortcode_atts(array(
    	'l_type' => 'svg',
        'svg' => '',
        'svg_color' => '',
        'svg_hcolor' => '',
        'img' => '',
        'img_size' => 'full',
	    'custom_img_size' => '400x200',
        'top' => '',
        'left' => '',
        'bottom' => '',
        'right' => '',
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
				$label = '<div class="imgl"><img src="' . esc_attr( $image[0] ) . '"></div>';
			}
			break;
	}
	$ftop = $top != '' ? 'top:' . $top. 'px;' : '';
	$fleft = $left != '' ? 'left:' . $left. 'px;' : '';
	$fbottom = $bottom != '' ? 'bottom:' . $bottom. 'px;' : '';
	$fright = $right != '' ? 'right:' . $right. 'px;' : '';

	if ( $label != '' ) {
		$output .= '<div class="svglabel '.implode( ' ', $wrp_classes ) . '" style="'.$ftop.$fleft.$fbottom.$fright.'">';

		$output .= $label;
		$output .=  '</div>';
    }

    return $output;
}

add_shortcode('ssc_svglabel', 'ssc_svglabel_shortcode');

add_filter( 'shortcode_ssc_svglabel_before_css_generating', 'ssc_svglabel_filter_css' );

function ssc_svglabel_filter_css( $atts ) {
	extract( shortcode_atts( array(
		'l_type'     => 'svg',
		'svg'        => '',
		'svg_color'  => '',
		'svg_hcolor' => '',
	),
		$atts ) );

	switch ( $l_type ) {
		case 'svg':
			if ( $svg !== '' ) {
				$styles = json_decode( str_replace( '`', '"', $atts['my-css'] ), true);
				if ( '' !== $svg_color ) {
					$styles['kc-css']['any']['svg']['fill| .svgl'] = $svg_color;
				}
				if ( '' !== $svg_hcolor ) {
					$styles['kc-css']['any']['svg']['fill|:hover .svgl'] = $svg_hcolor;
				}
				$atts['my-css'] = str_replace( '"', '`', json_encode( $styles, JSON_FORCE_OBJECT  ) );
			}
			break;
	}

	return $atts;
}

