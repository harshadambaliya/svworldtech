<?php
/**
 * Created by PhpStorm.
 * User: Alex
 */

add_action( 'init', 'ssc_carousel_controls', 99 );

function ssc_carousel_controls() {
    global $kc;
    //get current plugin folder then define the template folder
    $plugin_template = plugin_dir_path( __FILE__ );
    //register template folder with KingComposer
    $kc->set_template_path( $plugin_template );
    $kc->add_map( array(
            'ssc_carousel_controls' => array(

                'name' => esc_html__( 'Navigation for Carousel', 'ssc' ),
                'description' => esc_html__( 'Controls for carousel in the section', 'ssc' ),
                'icon' => 'kc-icon-icarousel',
                'category' => 'SecretLab',
//                'live_editor' => $plugin_template . 'live/image-carousel.php',
                'params' => array(

                    'general' => array(
                        array(
                            'type'			=> 'toggle',
                            'label'			=> esc_html__( 'Navigation', 'ssc' ),
                            'name'			=> 'navigation',
                            'description'	=> esc_html__( 'Display the "Next" and "Prev" buttons.', 'ssc' ),
                            'value'			=> 'yes'
                        ),array(
		                    'name' => 'arrows_type',
		                    'label' => esc_html__( 'Label Type', 'ssc' ),
		                    'type' => 'radio',
		                    'options' => array(
			                    'icon' => esc_html__( 'Icon', 'ssc' ),
			                    'svg' => esc_html__( 'SVG', 'ssc' ),
//					'img' => esc_html__( 'Image', 'ssc' ),
//			        'text' => esc_html__( 'Text', 'ssc' ),
		                    ),
		                    'value' => 'icon',
		                    'description' => esc_html__( 'Pick what to use: svg or icons', 'ssc' ),
		                    'relation' => array(
			                    'parent'    => 'arrows',
			                    'show_when' => 'yes',
		                    ),
	                    ),
	                    array(
		                    'name' => 'l_svg',
		                    'label' => esc_html__( 'Select Left SVG Icon', 'ssc' ),
		                    'type' => 'attach_image',
		                    'admin_label' => true,
		                    'relation' => array(
			                    'parent' => 'arrows_type',
			                    'show_when' => 'svg'
		                    ),
	                    ),
	                    array(
		                    'name' => 'r_svg',
		                    'label' => esc_html__( 'Select Right SVG Icon', 'ssc' ),
		                    'type' => 'attach_image',
		                    'admin_label' => true,
		                    'relation' => array(
			                    'parent' => 'arrows_type',
			                    'show_when' => 'svg'
		                    ),
	                    ),
	                    array(
		                    'type' => 'color_picker',
		                    'label' => esc_html__( 'SVG Color', 'ssc' ),
		                    'name' => 'svg_color',
		                    'relation' => array(
			                    'parent' => 'arrows_type',
			                    'show_when' => 'svg'
		                    ),
		                    'description' => esc_html__( 'Deprecated! Use "fill" field at the "Styling" tab instead.', 'ssc' ),
	                    ),
	                    array(
		                    'type' => 'color_picker',
		                    'label' => esc_html__( 'SVG Hover Color', 'ssc' ),
		                    'name' => 'svg_hcolor',
		                    'relation' => array(
			                    'parent' => 'arrows_type',
			                    'show_when' => 'svg'
		                    ),
		                    'description' => esc_html__( 'Deprecated! Use "fill" field at the "Styling" tab instead.', 'ssc' ),
	                    ),
	                    array(
		                    'name'        => 'iconleft',
		                    'label'       => __( 'Icon', 'ssc' ),
		                    'type'        => 'icon_picker',
		                    'description' => __( 'Icon for a left arrow', 'ssc' ),
		                    'value'       => 'fa-arrow-left',
		                    'relation'    => array(
			                    'parent'    => 'arrows_type',
			                    'show_when' => array( 'icon', ),
		                    ),
	                    ),
	                    array(
		                    'name'        => 'iconright',
		                    'label'       => __( 'Icon', 'ssc' ),
		                    'type'        => 'icon_picker',
		                    'description' => __( 'Icon for a right arrow', 'ssc' ),
		                    'value'       => 'fa-arrow-right',
		                    'relation'    => array(
			                    'parent'    => 'arrows_type',
			                    'show_when' => array( 'icon', ),
		                    ),
	                    ),
                        array(
                            'type'			=> 'toggle',
                            'label'			=> esc_html__( 'Pagination', 'ssc' ),
                            'name'			=> 'pagination',
                            'description'	=> esc_html__( 'Show the pagination.', 'ssc' ),
                            'value'			=> 'yes'
                        ),
                        array(
                            'type' => 'text',
                            'label' => esc_html__( 'Wrapper class name', 'ssc' ),
                            'name' => 'wrap_class',
                            'description' => esc_html__( 'Custom class for wrapper of the shortcode widget.', 'ssc' )
                        ),
                    ),
                    esc_html__( 'styling', 'ssc' ) => array(
                        array(
                            'name' => 'my-css',
                            'label' => esc_html__( 'Styling', 'ssc' ),
                            'type' => 'css',
                            'value' => '{`kc-css`:{`any`:{`box`:{`text-align|`:`center`},`navigation`:{`display|button`:`inline-block`}}}}', // remove this if you do not need a default content
                            'description' => esc_html__( 'Styles', 'ssc' ),
                            'options' => array(
                                array(
                                    'screens' => "any",
                                    'Box' => array(
                                        array('property' => 'background'),
                                        array('property' => 'display', 'label' => esc_html__( 'Display', 'ssc' )),
	                                    array('property' => 'text-align', 'label' => esc_html__( 'Text Align', 'ssc' )),
                                        array('property' => 'float', 'label' => esc_html__( 'Float', 'ssc' )),
                                        array('property' => 'width', 'label' => esc_html__( 'Width', 'ssc' )),
                                        array('property' => 'height', 'label' => esc_html__( 'Height', 'ssc' )),
                                        array('property' => 'box-shadow', 'label' => esc_html__( 'Box Shadow', 'ssc' )),
                                        array('property' => 'opacity', 'label' => esc_html__( 'Opacity', 'ssc' )),
                                        array('property' => 'margin', 'label' => esc_html__( 'Margin', 'ssc' )),
                                        array('property' => 'padding', 'label' => esc_html__( 'Padding', 'ssc' )),
                                        array('property' => 'border', 'label' => esc_html__( 'Border', 'ssc' )),
                                        array('property' => 'border-radius', 'label' => esc_html__( 'Border Radius', 'ssc' )),
                                    ),
                                    'Pagination' => array(
                                        array('property' => 'background', 'label' => esc_html__( 'Background Color', 'ssc' ), 'selector' => '.ssc-carousel-controls .control-dots'),
                                        array('property' => 'padding', 'label' => esc_html__( 'Padding', 'ssc' ), 'selector' => '.ssc-carousel-controls .control-dots'),
                                        array('property' => 'margin', 'label' => esc_html__( 'Margin', 'ssc' ), 'selector' => '.ssc-carousel-controls .control-dots'),
                                        array('property' => 'line-height', 'label' => esc_html__( 'Line Height', 'ssc' ), 'selector' => '.ssc-carousel-controls .control-dots'),
                                        array('property' => 'background-color', 'label' => esc_html__( 'Color', 'ssc' ), 'selector' => '.ssc-carousel-controls .control-dots span'),
                                        array('property' => 'background-color', 'label' => esc_html__( 'Color (Active)', 'ssc' ), 'selector' => '.ssc-carousel-controls .control-dots li.active span, .ssc-carousel-controls .control-dots li:hover span'),
	                                    array('property' => 'text-align', 'label' => esc_html__( 'Text Align', 'ssc' ), 'selector' => '.ssc-carousel-controls .control-dots ul'),

                                        array('property' => 'opacity', 'label' => esc_html__( 'Opacity', 'ssc' ), 'selector' => '.ssc-carousel-controls .control-dots span'),
                                        array('property' => 'width', 'label' => esc_html__( 'Width', 'ssc' ), 'selector' => '.ssc-carousel-controls .control-dots span'),
                                        array('property' => 'height', 'label' => esc_html__( 'Height', 'ssc' ), 'selector' => '.ssc-carousel-controls .control-dots span'),
                                        array('property' => 'margin', 'label' => esc_html__( 'Margin', 'ssc' ), 'selector' => '.ssc-carousel-controls .control-dots span'),

                                    ),
                                    'Navigation' => array(
	                                    array('property' => 'fill', 'label' => esc_html__( 'Fill', 'ssc' ), 'selector' => ' .control-arrow svg'),
	                                    array('property' => 'fill', 'label' => esc_html__( 'Fill', 'ssc' ) . ' ' . esc_html__( 'Hover', 'ssc' ), 'selector' => ' .control-arrow:hover svg'),
	                                    array('property' => 'display', 'label' => esc_html__( 'Display', 'ssc' ), 'selector' => 'button'),
                                        array('property' => 'width', 'label' => esc_html__( 'Width', 'ssc' ), 'selector' => 'button'),
                                        array('property' => 'height', 'label' => esc_html__( 'Height', 'ssc' ), 'selector' => 'button'),
                                        array('property' => 'width', 'label' => esc_html__( 'SVG Width', 'ssc' ), 'selector' => 'button svg'),
                                        array('property' => 'height', 'label' => esc_html__( 'SVG Height', 'ssc' ), 'selector' => 'button svg'),
                                        array('property' => 'color', 'label' => esc_html__( 'Color', 'ssc' ), 'selector' => 'button i'),
                                        array('property' => 'color', 'label' => esc_html__( 'Color on hover', 'ssc' ), 'selector' => 'button:hover i'),
                                        array('property' => 'font-size', 'label' => esc_html__( 'Font Size', 'ssc' ), 'selector' => 'button i'),
                                        array('property' => 'line-height', 'label' => esc_html__( 'Line Height', 'ssc' ), 'selector' => 'button i'),
                                        array('property' => 'background-color', 'label' => esc_html__( 'Background Color', 'ssc' ), 'selector' => 'button'),
                                        array('property' => 'background-color', 'label' => esc_html__( 'Background Color on hover', 'ssc' ), 'selector' => 'button:hover'),
                                        array('property' => 'opacity', 'label' => esc_html__( 'Opacity', 'ssc' ), 'selector' => 'button'),
                                        array('property' => 'border', 'selector' => 'button'),
                                        array('property' => 'border', 'label' => esc_html__( 'Border Hover', 'ssc' ), 'selector' => 'button:hover'),
                                        array('property' => 'border-radius', 'selector' => 'button'),
                                        array('property' => 'padding', 'label' => esc_html__( 'Padding', 'ssc' ), 'selector' => 'button'),
                                        array('property' => 'margin', 'label' => esc_html__( 'Margin', 'ssc' ), 'selector' => 'button'),
                                    ),
                                ),
                                array(
                                    "screens" => "999,768,667,479",
                                    'Box' => array(
	                                    array('property' => 'background'),
	                                    array('property' => 'display', 'label' => esc_html__( 'Display', 'ssc' )),
	                                    array('property' => 'text-align', 'label' => esc_html__( 'Text Align', 'ssc' )),
	                                    array('property' => 'float', 'label' => esc_html__( 'Float', 'ssc' )),
	                                    array('property' => 'width', 'label' => esc_html__( 'Width', 'ssc' )),
	                                    array('property' => 'height', 'label' => esc_html__( 'Height', 'ssc' )),
	                                    array('property' => 'box-shadow', 'label' => esc_html__( 'Box Shadow', 'ssc' )),
	                                    array('property' => 'opacity', 'label' => esc_html__( 'Opacity', 'ssc' )),
	                                    array('property' => 'margin', 'label' => esc_html__( 'Margin', 'ssc' )),
	                                    array('property' => 'padding', 'label' => esc_html__( 'Padding', 'ssc' )),
	                                    array('property' => 'border', 'label' => esc_html__( 'Border', 'ssc' )),
	                                    array('property' => 'border-radius', 'label' => esc_html__( 'Border Radius', 'ssc' )),
                                    ),
                                    'Pagination' => array(
	                                    array('property' => 'background', 'label' => esc_html__( 'Background Color', 'ssc' ), 'selector' => '.ssc-carousel-controls .control-dots'),
	                                    array('property' => 'padding', 'label' => esc_html__( 'Padding', 'ssc' ), 'selector' => '.ssc-carousel-controls .control-dots'),
	                                    array('property' => 'margin', 'label' => esc_html__( 'Margin', 'ssc' ), 'selector' => '.ssc-carousel-controls .control-dots'),
	                                    array('property' => 'line-height', 'label' => esc_html__( 'Line Height', 'ssc' ), 'selector' => '.ssc-carousel-controls .control-dots'),
	                                    array('property' => 'background-color', 'label' => esc_html__( 'Color', 'ssc' ), 'selector' => '.ssc-carousel-controls .control-dots span'),
	                                    array('property' => 'background-color', 'label' => esc_html__( 'Color (Active)', 'ssc' ), 'selector' => '.ssc-carousel-controls .control-dots li.active span, .ssc-carousel-controls .control-dots li:hover span'),
	                                    array('property' => 'text-align', 'label' => esc_html__( 'Text Align', 'ssc' ), 'selector' => '.ssc-carousel-controls .control-dots ul'),

	                                    array('property' => 'opacity', 'label' => esc_html__( 'Opacity', 'ssc' ), 'selector' => '.ssc-carousel-controls .control-dots span'),
	                                    array('property' => 'width', 'label' => esc_html__( 'Width', 'ssc' ), 'selector' => '.ssc-carousel-controls .control-dots span'),
	                                    array('property' => 'height', 'label' => esc_html__( 'Height', 'ssc' ), 'selector' => '.ssc-carousel-controls .control-dots span'),
	                                    array('property' => 'margin', 'label' => esc_html__( 'Margin', 'ssc' ), 'selector' => '.ssc-carousel-controls .control-dots span'),

                                    ),
                                    'Navigation' => array(
	                                    array('property' => 'display', 'label' => esc_html__( 'Display', 'ssc' ), 'selector' => 'button'),
	                                    array('property' => 'width', 'label' => esc_html__( 'Width', 'ssc' ), 'selector' => 'button'),
	                                    array('property' => 'height', 'label' => esc_html__( 'Height', 'ssc' ), 'selector' => 'button'),
	                                    array('property' => 'width', 'label' => esc_html__( 'SVG Width', 'ssc' ), 'selector' => 'button svg'),
	                                    array('property' => 'height', 'label' => esc_html__( 'SVG Height', 'ssc' ), 'selector' => 'button svg'),
	                                    array('property' => 'color', 'label' => esc_html__( 'Color', 'ssc' ), 'selector' => 'button i'),
	                                    array('property' => 'color', 'label' => esc_html__( 'Color on hover', 'ssc' ), 'selector' => 'button:hover i'),
	                                    array('property' => 'font-size', 'label' => esc_html__( 'Font Size', 'ssc' ), 'selector' => 'button i'),
	                                    array('property' => 'line-height', 'label' => esc_html__( 'Line Height', 'ssc' ), 'selector' => 'button i'),
	                                    array('property' => 'background-color', 'label' => esc_html__( 'Background Color', 'ssc' ), 'selector' => 'button'),
	                                    array('property' => 'background-color', 'label' => esc_html__( 'Background Color on hover', 'ssc' ), 'selector' => 'button:hover'),
	                                    array('property' => 'opacity', 'label' => esc_html__( 'Opacity', 'ssc' ), 'selector' => 'button'),
	                                    array('property' => 'border', 'selector' => 'button'),
	                                    array('property' => 'border', 'label' => esc_html__( 'Border Hover', 'ssc' ), 'selector' => 'button:hover'),
	                                    array('property' => 'border-radius', 'selector' => 'button'),
	                                    array('property' => 'padding', 'label' => esc_html__( 'Padding', 'ssc' ), 'selector' => 'button'),
	                                    array('property' => 'margin', 'label' => esc_html__( 'Margin', 'ssc' ), 'selector' => 'button'),
                                    ),
                                )
                            )
                        )
                    ),
                    'animate' => array(
                        array(
                            'name'    => 'animate',
                            'type'    => 'animate'
                        )
                    ),
                )

            ),
        ) 
    );
}



function ssc_carousel_controls_shortcode($atts, $content = null) {

    $out = '';
    $wrp_class 	= apply_filters( 'kc-el-class', $atts );

	extract(shortcode_atts(array(
		'navigation' => 'yes', //  +
		'pagination' => 'yes', //+
		'arrows_type'   => 'icon',
		'l_svg'         => '',
		'r_svg'         => '',
		'iconleft' => 'fa-arrow-left',
		'iconright' => 'fa-arrow-right',
	), $atts));

	$out .= '<div class="ssc-carousel-controls ' . esc_attr( implode( ' ', $wrp_class ) ) . '">';
	if( 'yes' == $navigation ){
		switch ($arrows_type){
			case 'svg':
				if( '' !== $l_svg || '' !== $r_svg ){
					if( '' !== $l_svg ){
						$out .= '<button type="button" class="control-arrow control-prev">' . ssc_process_svg( $l_svg ) . '</button>';
					}
					if( '' !== $r_svg ){
						$out .= '<button type="button" class="control-arrow control-next">' . ssc_process_svg( $r_svg ) . '</button>';
					}
				}
				break;
			default:
				if( '' !== $iconleft  ){
					$out .= '<button type="button" class="control-arrow control-prev"><i class="' . $iconleft . '"></i></button>';
				}
				if( '' !== $iconright  ) {
					$out .= '<button type="button" class="control-arrow control-next"><i class="' . $iconright . '"></i></button>';
				}
		}
	}
	if( 'yes' == $pagination ){
		$out .= '<div class="control-dots"><ul></ul></div>';
//		$out .= '<div class="control-dots"><ul><li class="active" data-slide-number="0"><span></span></li></ul></div>';
	}

	$out .= '</div>';

    kc_js_callback( 'kc_front.ssc_carousel_controls' );

    return $out;
}

add_shortcode('ssc_carousel_controls', 'ssc_carousel_controls_shortcode');

add_filter( 'shortcode_ssc_carousel_controls_before_css_generating', 'ssc_carousel_controls_filter_css' );

function ssc_carousel_controls_filter_css( $atts ) {
	extract( shortcode_atts( array(
		'arrows_type' => 'icon',
		'l_svg'       => '',
		'r_svg'       => '',
		'svg_color'   => '',
		'svg_hcolor'  => '',
	),
		$atts ) );


	switch ( $arrows_type ) {
		case 'svg':
			if ( '' !== $l_svg || '' !== $r_svg ) {
				$styles = array();
				if ( ! empty ( $atts['my-css'] ) ) {
					$styles = json_decode( str_replace( '`', '"', $atts['my-css'] ), true);
				}
				if ( '' !== $svg_color ) {
					if ( empty ( $styles['kc-css']['any']['navigation']['fill| .control-arrow svg'] ) ) {
						$styles['kc-css']['any']['navigation']['fill| .control-arrow svg'] = $svg_color;
					}
				}
				if ( '' !== $svg_hcolor ) {
					if ( empty ( $styles['kc-css']['any']['navigation']['fill| .control-arrow:hover svg'] ) ) {
						$styles['kc-css']['any']['navigation']['fill| .control-arrow:hover svg'] = $svg_hcolor;
					}
				}
				$atts['my-css'] = str_replace( '"', '`', json_encode( $styles, JSON_FORCE_OBJECT  ) );
			}
			break;
	}

	return $atts;
}