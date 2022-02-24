<?php
add_action('init', 'ssc_powerful_image_params', 99);

/**
 * Additional functions
 */

/**
 * Additional functions
 */


function ssc_powerful_image_params() {
    global $kc;

     $kc->add_map(array(
         'ssc_powerful_image' => array(

             'name' => esc_html__('Powerful Image', 'ssc'),
             'description' => esc_html__(' ', 'ssc'),
             'icon' => 'ssc-icon-17',
             'category' => 'SecretLab',
             'params' => array(
                 'general' => array(
                     array(
                         'type'        	=> 'attach_image',
                         'label'     	=> esc_html__( 'Image', 'ssc' ),
                         'name'  	    => 'img',
                         'description' 	=> esc_html__( 'Image for showing in block.', 'ssc' ),
                     ),
                     array(
                         'type'        	=> 'dropdown',
                         'label'     	=> esc_html__( 'Image size', 'ssc' ),
                         'name' 		 	=> 'img_size',
                         'description' 	=> esc_html__( 'Set the image size.', 'ssc' ),
                         'value'       	=> 'full',
                         'options'       => ssc_get_image_sizes(),
                     ),
                     array(
                         'type'     	=> 'dropdown',
                         'label'  	 	=> esc_html__( 'Onclick event', 'ssc' ),
                         'name'			=> 'onclick',
                         'options' 		=> array(
                             'lightbox'  => esc_html__( 'Open image on lightbox', 'ssc' ),
                             'gallery'   => esc_html__( 'Open gallery', 'ssc' ),
                             'video'     => esc_html__( 'Open video', 'ssc' )
                         ),
                         'description'	=> esc_html__( 'Select the click event when users click on an image.', 'ssc' )
                     ),
                     array(
                         'type'        	=> 'attach_images',
                         'label'     	=> esc_html__( 'Images for gallery', 'ssc' ),
                         'name'  	    => 'imgs',
                         'description' 	=> esc_html__( 'Choose images for gallery.', 'ssc' ),
                         'relation'  	=> array(
                             'parent'	 => 'onclick',
                             'show_when' => 'gallery'
                         )
                     ),
                     array(
                         'type'        	=> 'text',
                         'label'     	=> esc_html__( 'Video link', 'ssc' ),
                         'name'  	    => 'link',
                         'description' 	=> esc_html__( 'Enter link for the video.', 'ssc' ),
                         'relation'  	=> array(
                             'parent'	 => 'onclick',
                             'show_when' => 'video'
                         )
                     ),
                     array(
                         'type'			=> 'text',
                         'label'		=> esc_html__( 'Title', 'kingcomposer' ),
                         'name'			=> 'title',
                         'description'	=> esc_html__( 'Add the text that appears on the button.', 'kingcomposer' ),
                         'value' 		=> '',
                         'admin_label'	=> true
                     ),
                 ),
                 'styling' => array(
                     array(
                         'type'			=> 'css',
                         'label'			=> esc_html__( 'css', 'kingcomposer' ),
                         'name'			=> 'custom_css',
                         'value'        => '{`kc-css`:{`any`:{`icon`:{`color|.ssc-pi-icon`:`#ffffff`,`opacity|.ssc-pi-icon`:`1`,`background-color|.ssc-pi-icon`:`#ec5a36`,`font-size|.ssc-pi-icon`:`25px`,`line-height|.ssc-pi-icon`:`1em`,`padding|.ssc-pi-icon`:`20px 20px 20px 20px`},`overlay`:{`background-color|.ssc-pi-overlay`:`rgba(236,90,54,0.5)`},`overlay-icon`:{`color|.ssc-pi-overlay-icon`:`#ffffff`,`opacity|.ssc-pi-overlay-icon`:`1`,`font-size|.ssc-pi-overlay-icon`:`30px`,`line-height|.ssc-pi-overlay-icon`:`1em`,`border|.ssc-pi-overlay-icon`:`3px solid #fff`,`padding|.ssc-pi-overlay-icon`:`20px 20px 20px 20px`},`title`:{`color|h4`:`#ffffff`,`font-size|h4`:`15px`,`line-height|h4`:`1em`,`padding|h4`:`20px 0 0 0`,`text-transform|h4`:`uppercase`}}}}',
                         'options'		=> array(
                             array(
                                 'screens' => 'any,1024,999,767,479',
                                 'Box' => array(
                                     array('property' => 'box-shadow', 'label' => esc_html__( 'Box Shadow', 'ssc' ), 'selector' => '.ssc-pi'),
                                     array('property' => 'display', 'label' => esc_html__( 'Display', 'ssc' ), 'selector' => '.ssc-pi'),
                                     array('property' => 'width', 'label' => esc_html__( esc_html__( 'Width', 'ssc' ), 'ssc' ), 'selector' => '.ssc-pi'),
                                     array('property' => 'border', 'label' => esc_html__( 'Border', 'ssc' ), 'selector' => '.ssc-pi'),
                                     array('property' => 'border-radius', 'label' => esc_html__( 'Border Radius', 'ssc' ), 'selector' => '.ssc-pi'),
                                     array('property' => 'padding', 'label' => esc_html__( 'Padding', 'ssc' ), 'selector' => '.ssc-pi'),
                                     array('property' => 'margin', 'label' => esc_html__( 'Margin', 'ssc' ), 'selector' => '.ssc-pi'),
                                 ),
                                 'Image' => array(
                                     array('property' => 'height', 'label' => esc_html__( 'Height', 'ssc' ), 'selector' => '.ssc-pi-image'),
                                     array('property' => 'display', 'label' => esc_html__( 'Display', 'ssc' ), 'selector' => '.ssc-pi-image'),
                                     array('property' => 'display', 'label' => esc_html__( 'Display', 'ssc' ), 'selector' => '.ssc-pi-image'),
                                     array('property' => 'width', 'label' => esc_html__( esc_html__( 'Width', 'ssc' ), 'ssc' ), 'selector' => '.ssc-pi-image'),
                                     array('property' => 'border', 'label' => esc_html__( 'Border', 'ssc' ), 'selector' => '.ssc-pi-image'),
                                     array('property' => 'border-radius', 'label' => esc_html__( 'Border Radius', 'ssc' ), 'selector' => '.ssc-pi-image'),
                                     array('property' => 'padding', 'label' => esc_html__( 'Padding', 'ssc' ), 'selector' => '.ssc-pi-image'),
                                     array('property' => 'margin', 'label' => esc_html__( 'Margin', 'ssc' ), 'selector' => '.ssc-pi-image'),

                                 ),
                                 'Icon' => array(
                                     array('property' => 'color', 'label' => esc_html__( 'Icon Color', 'ssc' ), 'selector' => '.ssc-pi-icon'),
                                     array('property' => 'opacity', 'label' => esc_html__( 'Opacity', 'ssc' ), 'selector' => '.ssc-pi-icon'),
                                     array('property' => 'background-color', 'label' => esc_html__( 'Background Color', 'ssc' ), 'selector' => '.ssc-pi-icon'),
                                     array('property' => 'font-size', 'label' => esc_html__( 'Text Size', 'ssc' ), 'selector' => '.ssc-pi-icon'),
                                     array('property' => 'line-height', 'label' => esc_html__( 'Line Height', 'ssc' ), 'selector' => '.ssc-pi-icon'),
                                     array('property' => 'text-shadow', 'label' => esc_html__( 'Text Shadow', 'ssc' ), 'selector' => '.ssc-pi-icon'),
                                     array('property' => 'border', 'label' => esc_html__( 'Border', 'ssc' ), 'selector' => '.ssc-pi-icon'),
                                     array('property' => 'border-radius', 'label' => esc_html__( 'Border Radius', 'ssc' ), 'selector' => '.ssc-pi-icon'),
                                     array('property' => 'padding', 'label' => esc_html__( 'Padding', 'ssc' ), 'selector' => '.ssc-pi-icon'),
                                     array('property' => 'margin', 'label' => esc_html__( 'Margin', 'ssc' ), 'selector' => '.ssc-pi-icon'),

                                 ),
                                 'Overlay' => array(
                                     array('property' => 'background-color', 'label' => esc_html__( 'Background Color', 'ssc' ), 'selector' => '.ssc-pi-overlay'),
                                     array('property' => 'border', 'label' => esc_html__( 'Border', 'ssc' ), 'selector' => '.ssc-pi-overlay'),
                                     array('property' => 'border-radius', 'label' => esc_html__( 'Border Radius', 'ssc' ), 'selector' => '.ssc-pi-overlay'),
                                     array('property' => 'padding', 'label' => esc_html__( 'Padding', 'ssc' ), 'selector' => '.ssc-pi-overlay'),
                                     array('property' => 'margin', 'label' => esc_html__( 'Margin', 'ssc' ), 'selector' => '.ssc-pi-overlay'),
                                 ),
                                 'Overlay Icon' => array(
                                     array('property' => 'color', 'label' => esc_html__( 'Icon Color', 'ssc' ), 'selector' => '.ssc-pi-overlay-icon'),
                                     array('property' => 'background-color', 'label' => esc_html__( 'Background Color', 'ssc' ), 'selector' => '.ssc-pi-overlay-icon'),
                                     array('property' => 'opacity', 'label' => esc_html__( 'Opacity', 'ssc' ), 'selector' => '.ssc-pi-icon'),
                                     array('property' => 'font-size', 'label' => esc_html__( 'Text Size', 'ssc' ), 'selector' => '.ssc-pi-overlay-icon'),
                                     array('property' => 'line-height', 'label' => esc_html__( 'Line Height', 'ssc' ), 'selector' => '.ssc-pi-overlay-icon'),
                                     array('property' => 'text-shadow', 'label' => esc_html__( 'Text Shadow', 'ssc' ), 'selector' => '.ssc-pi-overlay-icon'),
                                     array('property' => 'border', 'label' => esc_html__( 'Border', 'ssc' ), 'selector' => '.ssc-pi-overlay-icon'),
                                     array('property' => 'border-radius', 'label' => esc_html__( 'Border Radius', 'ssc' ), 'selector' => '.ssc-pi-overlay-icon'),
                                     array('property' => 'padding', 'label' => esc_html__( 'Padding', 'ssc' ), 'selector' => '.ssc-pi-overlay-icon'),
                                     array('property' => 'margin', 'label' => esc_html__( 'Margin', 'ssc' ), 'selector' => '.ssc-pi-overlay-icon'),

                                 ),
                                 'Title' => array(
                                     array('property' => 'font-family', 'label' => esc_html__( esc_html__( 'Font Family', 'ssc' ), 'ssc' ), 'selector' => 'h4'),
                                     array('property' => 'color', 'label' => esc_html__( 'Text Color', 'ssc' ), 'selector' => 'h4'),
                                     array('property' => 'background-color', 'label' => esc_html__( 'Background Color', 'ssc' ), 'selector' => 'h4'),
                                     array('property' => 'font-size', 'label' => esc_html__( 'Text Size', 'ssc' ), 'selector' => 'h4'),
                                     array('property' => 'line-height', 'label' => esc_html__( 'Line Height', 'ssc' ), 'selector' => 'h4'),
                                     array('property' => 'text-transform', 'label' => esc_html__( esc_html__( 'Text Transform', 'ssc' ), 'ssc' ), 'selector' => 'h4'),
                                     array('property' => 'text-shadow', 'label' => esc_html__( 'Text Shadow', 'ssc' ), 'selector' => 'h4'),
                                     array('property' => 'border', 'label' => esc_html__( 'Border', 'ssc' ), 'selector' => 'h4'),
                                     array('property' => 'border-radius', 'label' => esc_html__( 'Border Radius', 'ssc' ), 'selector' => 'h4'),
                                     array('property' => 'padding', 'label' => esc_html__( 'Padding', 'ssc' ), 'selector' => 'h4'),
                                     array('property' => 'margin', 'label' => esc_html__( 'Margin', 'ssc' ), 'selector' => 'h4'),
                                 ),
                             )
                         )
                     ),
                 ),
                 'hover' => array(
                     array(
                         'type'			=> 'css',
                         'label'			=> esc_html__( 'Hover CSS', 'kingcomposer' ),
                         'name'			=> 'custom_css_hov',
                         'value'        => '{`kc-css`:{`any`:{`icon`:{`opacity|.ssc-pi-link:hover .ssc-pi-icon`:`0`}}}}',
                         'options'		=> array(
                             array(
                                 'screens' => 'any,1024,999,767,479',
                                 'Box' => array(
                                     array('property' => 'box-shadow', 'label' => esc_html__( 'Box Shadow', 'ssc' ), 'selector' => '.ssc-pi-link:hover'),
                                     array('property' => 'display', 'label' => esc_html__( 'Display', 'ssc' ), 'selector' => '.ssc-pi-link:hover'),

                                     array('property' => 'border', 'label' => esc_html__( 'Border', 'ssc' ), 'selector' => '.ssc-pi-link:hover'),
                                     array('property' => 'border-radius', 'label' => esc_html__( 'Border Radius', 'ssc' ), 'selector' => '.ssc-pi-link:hover'),
                                     array('property' => 'padding', 'label' => esc_html__( 'Padding', 'ssc' ), 'selector' => '.ssc-pi-link:hover'),
                                     array('property' => 'margin', 'label' => esc_html__( 'Margin', 'ssc' ), 'selector' => '.ssc-pi-link:hover'),
                                 ),
                                 'Image' => array(
                                     array('property' => 'width', 'label' => esc_html__( 'Width', 'ssc' ), 'selector' => '.ssc-pi-link:hover .ssc-pi-image'),
                                     array('property' => 'height', 'label' => esc_html__( 'Height', 'ssc' ), 'selector' => '.ssc-pi-link:hover .ssc-pi-image'),
                                     array('property' => 'display', 'label' => esc_html__( 'Display', 'ssc' ), 'selector' => '.ssc-pi-link:hover .ssc-pi-image'),
                                     array('property' => 'border', 'label' => esc_html__( 'Border', 'ssc' ), 'selector' => '.ssc-pi-link:hover .ssc-pi-image'),
                                     array('property' => 'border-radius', 'label' => esc_html__( 'Border Radius', 'ssc' ), 'selector' => '.ssc-pi-link:hover .ssc-pi-image'),
                                     array('property' => 'padding', 'label' => esc_html__( 'Padding', 'ssc' ), 'selector' => '.ssc-pi-link:hover .ssc-pi-image'),
                                     array('property' => 'margin', 'label' => esc_html__( 'Margin', 'ssc' ), 'selector' => '.ssc-pi-link:hover .ssc-pi-image'),

                                 ),
                                 'Icon' => array(
                                     array('property' => 'color', 'label' => esc_html__( 'Icon Color', 'ssc' ), 'selector' => '.ssc-pi-link:hover .ssc-pi-icon'),
                                     array('property' => 'opacity', 'label' => esc_html__( 'Opacity', 'ssc' ), 'selector' => '.ssc-pi-link:hover .ssc-pi-icon'),
                                     array('property' => 'background-color', 'label' => esc_html__( 'Background Color', 'ssc' ), 'selector' => '.ssc-pi-link:hover .ssc-pi-icon'),
                                     array('property' => 'font-size', 'label' => esc_html__( 'Text Size', 'ssc' ), 'selector' => '.ssc-pi-link:hover .ssc-pi-icon'),
                                     array('property' => 'line-height', 'label' => esc_html__( 'Line Height', 'ssc' ), 'selector' => '.ssc-pi-link:hover .ssc-pi-icon'),
                                     array('property' => 'text-shadow', 'label' => esc_html__( 'Text Shadow', 'ssc' ), 'selector' => '.ssc-pi-link:hover .ssc-pi-icon'),
                                     array('property' => 'border', 'label' => esc_html__( 'Border', 'ssc' ), 'selector' => '.ssc-pi-link:hover .ssc-pi-icon'),
                                     array('property' => 'border-radius', 'label' => esc_html__( 'Border Radius', 'ssc' ), 'selector' => '.ssc-pi-link:hover .ssc-pi-icon'),
                                     array('property' => 'padding', 'label' => esc_html__( 'Padding', 'ssc' ), 'selector' => '.ssc-pi-link:hover .ssc-pi-icon'),
                                     array('property' => 'margin', 'label' => esc_html__( 'Margin', 'ssc' ), 'selector' => '.ssc-pi-link:hover .ssc-pi-icon'),

                                 ),
                                 'Overlay' => array(
                                     array('property' => 'background-color', 'label' => esc_html__( 'Background Color', 'ssc' ), 'selector' => '.ssc-pi-link:hover .ssc-pi-overlay'),
                                     array('property' => 'border', 'label' => esc_html__( 'Border', 'ssc' ), 'selector' => '.ssc-pi-link:hover .ssc-pi-overlay'),
                                     array('property' => 'border-radius', 'label' => esc_html__( 'Border Radius', 'ssc' ), 'selector' => '.ssc-pi-link:hover .ssc-pi-overlay'),
                                     array('property' => 'padding', 'label' => esc_html__( 'Padding', 'ssc' ), 'selector' => '.ssc-pi-link:hover .ssc-pi-overlay'),
                                     array('property' => 'margin', 'label' => esc_html__( 'Margin', 'ssc' ), 'selector' => '.ssc-pi-link:hover .ssc-pi-overlay'),
                                 ),
                                 'Overlay Icon' => array(
                                     array('property' => 'color', 'label' => esc_html__( 'Icon Color', 'ssc' ), 'selector' => '.ssc-pi-overlay-icon:hover'),
                                     array('property' => 'background-color', 'label' => esc_html__( 'Background Color', 'ssc' ), 'selector' => '.ssc-pi-overlay-icon:hover'),
                                     array('property' => 'font-size', 'label' => esc_html__( 'Text Size', 'ssc' ), 'selector' => '.ssc-pi-overlay-icon:hover'),
                                     array('property' => 'line-height', 'label' => esc_html__( 'Line Height', 'ssc' ), 'selector' => '.ssc-pi-overlay-icon:hover'),
                                     array('property' => 'text-shadow', 'label' => esc_html__( 'Text Shadow', 'ssc' ), 'selector' => '.ssc-pi-overlay-icon:hover'),
                                     array('property' => 'border', 'label' => esc_html__( 'Border', 'ssc' ), 'selector' => '.ssc-pi-overlay-icon:hover'),
                                     array('property' => 'border-radius', 'label' => esc_html__( 'Border Radius', 'ssc' ), 'selector' => '.ssc-pi-overlay-icon:hover'),
                                     array('property' => 'padding', 'label' => esc_html__( 'Padding', 'ssc' ), 'selector' => '.ssc-pi-overlay-icon:hover'),
                                     array('property' => 'margin', 'label' => esc_html__( 'Margin', 'ssc' ), 'selector' => '.ssc-pi-overlay-icon:hover'),

                                 ),
                                 'Title' => array(
                                     array('property' => 'color', 'label' => esc_html__( 'Text Color', 'ssc' ), 'selector' => 'h4:hover'),
                                     array('property' => 'background-color', 'label' => esc_html__( 'Background Color', 'ssc' ), 'selector' => 'h4:hover'),
                                     array('property' => 'font-size', 'label' => esc_html__( 'Text Size', 'ssc' ), 'selector' => 'h4:hover'),
                                     array('property' => 'line-height', 'label' => esc_html__( 'Line Height', 'ssc' ), 'selector' => 'h4:hover'),
                                     array('property' => 'text-shadow', 'label' => esc_html__( 'Text Shadow', 'ssc' ), 'selector' => 'h4:hover'),
                                     array('property' => 'border', 'label' => esc_html__( 'Border', 'ssc' ), 'selector' => 'h4:hover'),
                                     array('property' => 'border-radius', 'label' => esc_html__( 'Border Radius', 'ssc' ), 'selector' => 'h4:hover'),
                                     array('property' => 'padding', 'label' => esc_html__( 'Padding', 'ssc' ), 'selector' => 'h4:hover'),
                                     array('property' => 'margin', 'label' => esc_html__( 'Margin', 'ssc' ), 'selector' => 'h4:hover'),
                                 ),
                             )
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
         ),
    ));
}

// Register Shortcode

function ssc_powerful_image_shortcode($atts, $content = null) {
    extract( shortcode_atts( array(
        'img' => '',
        'img_size' => '',
        'onclick' => '',
        'imgs' => '',
        'link' => '',
        'title' => '',
    ) , $atts ) );

    if ( !empty( $img ) && is_numeric( $img ) ) {

        $wrp_classes = apply_filters( 'kc-el-class', $atts );

        $html = '<div class="ssc-pi '.implode( ' ', $wrp_classes ) . '">';

        $img_inf = image_downsize( $img , $img_size );
        $alt = get_post_meta( $img, '_wp_attachment_image_alt', true);

    } else {
        return '<div class="kc-carousel_images align-center" style="border:1px dashed #ccc;"><br /><h3>' . esc_html__( 'No image uploaded', 'ssc' ) . '</h3></div>';
    }

    switch ( $onclick ) {
        case 'gallery':
            $img_full = image_downsize( $img, 'full' );

            if( !empty( $imgs ) ) {
                $imgs = explode( ',', $imgs );
            }

            $html .= '<div class="ssc-pi-gallery">';

            $html .= '<a href="' . $img_full[0] . '" title="' . esc_attr( $alt ) . '" class="ssc-pi-link">
                <img src="' . $img_inf[0] . '" alt="' . esc_attr( $alt ) . '" class="ssc-pi-image" width="' . $img_inf[1] . '" height="' . $img_inf[2] . '">
                <div class="ssc-pi-icon">
                    <i class="fa-images"></i>
                </div>
                <div class="ssc-pi-overlay">
                    <div class="ssc-pi-overlay-icon">
                        <i class="fa-images"></i>
                    </div>';
                    if( !empty( $title ) ){
                        $html .= '<h4>' . esc_html( $title ) . '</h4>';
                    }
                    $html .= '</div>
            </a>';

            if ( is_array( $imgs ) && !empty( $imgs ) ) {

                foreach( $imgs as $img_id ){
                    $img_full = image_downsize( $img_id, 'full' );

                    $html .='<a href="' . $img_full[0] . '" title="The Cleaner"><img src="' . $img_full[0] . '" width="' . $img_full[1] . '" height="' . $img_full[2] . '"></a>';

                }

                $html .= '</div>';

            } else {
            }

            break;

        case 'video':
            if ( !empty( $link ) ){
                $html .= '<a href="' . $link . '" title="' . esc_attr( $alt ) . '" class="ssc-pi-link ssc-pi-video">
                    <img src="' . $img_inf[0] . '" alt="' . esc_attr( $alt ) . '" class="ssc-pi" width="' . $img_inf[1] . '" height="' . $img_inf[2] . '">
                    <div class="ssc-pi-icon">
                        <i class="fa-play"></i>
                    </div>
                    <div class="ssc-pi-overlay">
                        <div class="ssc-pi-overlay-icon">
                            <i class="fa-play"></i>
                        </div>';
                        if( !empty( $title ) ){
                            $html .= '<h4>' . esc_html( $title ) . '</h4>';
                        }
                        $html .= '</div>
                </a>';
            }
            break;

        default:
            $img_full = image_downsize( $img, 'full' );

            $html .= '<a href="' . $img_full[0] . '" title="' . esc_attr( $alt ) . '" class="ssc-pi-link image-link">
                <img src="' . $img_inf[0] . '" alt="' . esc_attr( $alt ) . '" class="ssc-pi" width="' . $img_inf[1] . '" height="' . $img_inf[2] . '">
                <div class="ssc-pi-icon">
                    <i class="fa-image"></i>
                </div>
                <div class="ssc-pi-overlay">
                    <div class="ssc-pi-overlay-icon">
                        <i class="fa-image"></i>
                    </div>';
                    if( !empty( $title ) ){
                        $html .= '<h4>' . esc_html( $title ) . '</h4>';
                    }
                $html .= '</div>
            </a>';
    }
    $html .= '</div>';

    return $html;
}

add_shortcode('ssc_powerful_image', 'ssc_powerful_image_shortcode');

