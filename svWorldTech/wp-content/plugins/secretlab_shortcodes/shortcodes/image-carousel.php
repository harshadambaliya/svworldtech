<?php
/**
 * Created by PhpStorm.
 * User: Alex
 */

add_action( 'init', 'ssc_images_carousel', 99 );

function ssc_images_carousel() {
    global $kc;
    //get current plugin folder then define the template folder
    $plugin_template = plugin_dir_path( __FILE__ );
    //register template folder with KingComposer
    $kc->set_template_path( $plugin_template );
    $kc->add_map( array(
            'ssc_img_carousel' => array(

                'name' => esc_html__( 'SecretLab Image Carousel', 'ssc' ),
                'description' => esc_html__( ' ', 'ssc' ),
                'icon' => 'kc-icon-icarousel',
                'category' => 'SecretLab',
                'live_editor' => $plugin_template . 'live/image-carousel.php',
                'params' => array(

                    'general' => array(
                        array(
                            'type' 			=> 'attach_images',
                            'label' 		=> esc_html__( 'Images', 'ssc' ),
                            'name'			=> 'images',
                            'description' 	=> esc_html__( 'Select images from media library.', 'ssc' ),
                            'admin_label'	=> true
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
                            'type'     		=> 'dropdown',
                            'label'  	 	=> esc_html__( 'Onclick event', 'ssc' ),
                            'name'			=> 'onclick',
                            'options' 		=> array(
                                'none' => esc_html__( 'None', 'ssc' ),
                                'lightbox' => esc_html__( 'Open on lightbox', 'ssc' ),
                                'custom_link' => esc_html__( 'Open custom links', 'ssc' )
                            ),
                            'description'	=> esc_html__( 'Select the click event when users click on an image.', 'ssc' )
                        ),
                        array(
                            'type' 			=> 'number_slider',
                            'label' 		=> esc_html__( 'Items per slide', 'ssc' ),
                            'name' 			=> 'items_number',
                            'description' 	=> esc_html__( 'The number of items displayed per slide (not apply for autoheight). Default is 3 items and 1 item on mobile.', 'ssc' ),
                            'admin_label'	=> true,
                            'value'			=> '3',
                            'options' => array(
                                'min' => 1,
                                'max' => 15,
                                'show_input' => true
                            )
                        ),
                        array(
                            'type' 			=> 'number_slider',
                            'label' 		=> esc_html__( 'Items On Tablet?', 'ssc' ),
                            'name' 			=> 'tablet',
                            'value'			=> 2,
                            'options' => array(
                                'min' => 1,
                                'max' => 10,
                                'show_input' => true
                            ),
                            'description'   => esc_html__( 'Display number of items per each slide (Tablet Screen)')

                        ),
                        array(
                            'type' 			=> 'number_slider',
                            'label' 		=> esc_html__( 'Items On Smartphone?', 'ssc' ),
                            'name' 			=> 'mobile',
                            'value'			=> 1,
                            'options' => array(
                                'min' => 1,
                                'max' => 10,
                                'show_input' => true
                            ),
                            'description'   => esc_html__( 'Display number of items per each slide (Mobile Screen)')

                        ),
                        array(
                            'type' 			=> 'number_slider',
                            'label' 		=> esc_html__( 'Speed', 'ssc' ),
                            'name' 			=> 'speed',
                            'description' 	=> esc_html__( 'Set the speed at which auto playing sliders will transition (in second).', 'ssc' ),
                            'value'			=> 500,
                            'admin_label'	=> true,
                            'options' => array(
                                'min' => 100,
                                'max' => 1500,
                                'show_input' => true
                            )
                        ),
                        array(
                            'type'        	=> 'textarea',
                            'label'     	=> esc_html__( 'Custom links', 'ssc' ),
                            'name'  	=> 'custom_links',
                            'description' 	=> esc_html__( 'Enter links for each slide (Note: divide links with linebreaks (Enter)).', 'ssc' ),
                            'relation'  	=> array(
                                'parent'	=> 'onclick',
                                'show_when' => 'custom_link'
                            )
                        ),
                        array(
                            'type'        	=> 'dropdown',
                            'label'     	=> esc_html__( 'Custom link target', 'ssc' ),
                            'name'  		=> 'custom_links_target',
                            'description' 	=> esc_html__( 'Select how to open custom links.', 'ssc' ),
                            'options'       	=> array(
                                '_self' => esc_html__( 'Same window', 'ssc' ),
                                '_blank' => esc_html__( 'New window', 'ssc' )
                            ),
                            'relation'  	=> array(
                                'parent'	=> 'onclick',
                                'show_when' => 'custom_link'
                            )
                        ),
                        array(
                            'type'			=> 'toggle',
                            'label'			=> esc_html__( 'Navigation', 'ssc' ),
                            'name'			=> 'navigation',
                            'description'	=> esc_html__( 'Display the "Next" and "Prev" buttons.', 'ssc' ),
                        ),
                        array(
                            'type'			=> 'toggle',
                            'label'			=> esc_html__( 'Pagination', 'ssc' ),
                            'name'			=> 'pagination',
                            'description'	=> esc_html__( 'Show the pagination.', 'ssc' ),
                            'value'			=> 'yes'
                        ),
                        array(
                            'type'			=> 'toggle',
                            'label'			=> esc_html__( 'Auto height', 'ssc' ),
                            'name'			=> 'auto_height',
                            'description'	=> esc_html__( 'Add height to div "owl-wrapper-outer" so you can use diffrent heights on slides. Use it only for one item per page setting.', 'ssc' ),
                        ),
                        array(
                            'type'			=> 'toggle',
                            'label'			=> esc_html__( 'Auto Play', 'ssc' ),
                            'name'			=> 'auto_play',
                            'description'	=> esc_html__( 'The carousel automatically plays when site loaded.', 'ssc' ),
                            'value'			=> 'yes'
                        ),
                        array(
                            'type'			=> 'toggle',
                            'label'			=> esc_html__( 'Stop on hover', 'ssc' ),
                            'name'			=> 'stop_on_hover',
                            'description'	=> esc_html__( 'Stop autoplay on mouse hover.', 'ssc' ),
                            'value'			=> '',
                        ),
                        array(
                            'type'			=> 'number_slider',
                            'label'			=> esc_html__( 'Time delay', 'ssc' ),
                            'name'			=> 'delay',
                            'description'	=> esc_html__( 'The delay time before moving on to a new slide', 'ssc' ),
                            'value'			=> '8',
                            'options' => array(
                                'min' => 1,
                                'max' => 15,
                                'show_input' => true
                            ),
                            'relation'  	=> array(
                                'parent'	=> 'auto_play',
                                'show_when' => 'yes'
                            )
                        ),
                        array(
                            'type'			=> 'toggle',
                            'label'			=> esc_html__( 'Progress Bar', 'ssc' ),
                            'name'			=> 'progress_bar',
                            'description'	=> esc_html__( 'Visualize the progression of displaying photos.', 'ssc' )
                        ),
                        array(
                            'type'			=> 'toggle',
                            'label'			=> esc_html__( 'Lazy load', 'ssc' ),
                            'name'			=> 'lazy_load',
                            'description'	=> esc_html__( 'Delays loading of images.', 'ssc' )
                        ),
                        array(
                            'type'			=> 'toggle',
                            'label'			=> esc_html__( 'Show thumbnail', 'ssc' ),
                            'name'			=> 'show_thumb',
                            'description'	=> esc_html__( 'Show the thumbnails in carousel.', 'ssc' ),
                        ),
                        array(
                            'type'			=> 'number_slider',
                            'label'			=> esc_html__( 'Number Thumbnail View', 'ssc' ),
                            'name'			=> 'num_thumb',
                            'description'	=> esc_html__( 'The number of images show in thumbnail view', 'ssc' ),
                            'value'			=> '5',
                            'options' => array(
                                'min' => 1,
                                'max' => 15,
                                'show_input' => true
                            ),
                            'relation'  	=> array(
                                'parent'	=> 'show_thumb',
                                'show_when' => 'yes'
                            )
                        ),
                        array(
                            'type'			=> 'toggle',
                            'label'			=> esc_html__( 'Images Alt Text', 'ssc' ),
                            'name'			=> 'alt_text',
                            'description'	=> esc_html__( 'Display the text into image tag.', 'ssc' ),
                            'value'			=> 'no',
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
                            'value' => '{`kc-css`:{`any`:{`thumbnails`:{`opacity|.ssc-carousel-tumb-imgs img`:`0.5`,`opacity|.ssc-carousel-tumb-imgs .synced img`:`1`},`pagination`:{`opacity|.owl-page span`:`1`},`navigation`:{`opacity|.owl-controls .owl-buttons div`:`1`,`width|.owl-controls .owl-buttons div`:`40px`,`height|.owl-controls .owl-buttons div`:`40px`,`background-color|.owl-controls .owl-buttons div`:`rgba(0,0,0,0.5)`,`background-color|.owl-controls .owl-buttons div:hover`:`#000`,`color|.owl-controls .owl-buttons div:before`:`#fff`,`color|.owl-controls .owl-buttons div:hover:before`:`#fff`,`font-size|.owl-controls .owl-buttons div:before`:`15px`,`line-height|.owl-controls .owl-buttons div:before`:`40px`}}}}', // remove this if you do not need a default content
                            'description' => esc_html__( 'Styles', 'ssc' ),
                            'options' => array(
                                array(
                                    'screens' => "any",
                                    'Box' => array(
                                        array('property' => 'background'),
                                        array('property' => 'display', 'label' => esc_html__( 'Display', 'ssc' )),
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
                                    'Image' => array(
                                        array('property' => 'background', 'label' => esc_html__( 'Background Color', 'ssc' ), 'selector' => '.ssc-carousel-main-img img'),
                                        array('property' => 'width', 'label' => esc_html__( 'Width', 'ssc' ), 'selector' => '.ssc-carousel-main-img img'),
                                        array('property' => 'height', 'label' => esc_html__( 'Height', 'ssc' ), 'selector' => '.ssc-carousel-main-img img'),
                                        array('property' => 'box-shadow', 'label' => esc_html__( 'Box Shadow', 'ssc' ), 'selector' => '.ssc-carousel-main-img img'),
                                        array('property' => 'opacity', 'label' => esc_html__( 'Opacity', 'ssc' ), 'selector' => '.ssc-carousel-main-img img'),
                                        array('property' => 'margin', 'label' => esc_html__( 'Margin', 'ssc' ), 'selector' => '.ssc-carousel-main-img img'),
                                        array('property' => 'padding', 'label' => esc_html__( 'Padding', 'ssc' ), 'selector' => '.ssc-carousel-main-img img'),
                                        array('property' => 'border', 'label' => esc_html__( 'Border', 'ssc' ), 'selector' => '.ssc-carousel-main-img img'),
                                        array('property' => 'border-radius', 'label' => esc_html__( 'Border Radius', 'ssc' ), 'selector' => '.ssc-carousel-main-img img'),
                                    ),
                                    'Thumbnails' => array(
                                        array('property' => 'background', 'label' => esc_html__( 'Background Color', 'ssc' ), 'selector' => '.ssc-carousel-tumb-imgs'),
                                        array('property' => 'margin', 'label' => esc_html__( 'Margin', 'ssc' ), 'selector' => '.ssc-carousel-tumb-imgs'),
                                        array('property' => 'padding', 'label' => esc_html__( 'Padding', 'ssc' ), 'selector' => '.ssc-carousel-tumb-imgs'),
                                        array('property' => 'width', 'label' => esc_html__( 'Width', 'ssc' ), 'selector' => '.ssc-carousel-tumb-imgs img'),
                                        array('property' => 'height', 'label' => esc_html__( 'Height', 'ssc' ), 'selector' => '.ssc-carousel-tumb-imgs img'),
                                        array('property' => 'box-shadow', 'label' => esc_html__( 'Box Shadow', 'ssc' ), 'selector' => '.ssc-carousel-tumb-imgs img'),
                                        array('property' => 'opacity', 'label' => esc_html__( 'Opacity', 'ssc' ), 'selector' => '.ssc-carousel-tumb-imgs img'),
                                        array('property' => 'opacity', 'label' => esc_html__( 'Opacity (Active)', 'ssc' ), 'selector' => '.ssc-carousel-tumb-imgs .synced img'),
                                        array('property' => 'border', 'label' => esc_html__( 'Border', 'ssc' ), 'selector' => '.ssc-carousel-tumb-imgs img'),
                                        array('property' => 'border-radius', 'label' => esc_html__( 'Border Radius', 'ssc' ), 'selector' => '.ssc-carousel-tumb-imgs img'),
                                        array('property' => 'border', 'label' => esc_html__( 'Border (Active)', 'ssc' ), 'selector' => '.ssc-carousel-tumb-imgs .synced img'),
                                        array('property' => 'border-radius', 'label' => esc_html__( 'Border Radius (Active)', 'ssc' ), 'selector' => 'ssc-carousel-tumb-imgs .synced img'),
                                        array('property' => 'display', 'label' => esc_html__( 'Display Thumbnails Pagination', 'ssc' ), 'selector' => '.ssc-carousel-tumb-imgs .owl-pagination'),
                                    ),
                                    'Pagination' => array(
                                        array('property' => 'background', 'label' => esc_html__( 'Background Color', 'ssc' ), 'selector' => '.ssc-carousel-main-img .owl-controls'),

                                        array('property' => 'line-height', 'label' => esc_html__( 'Line Height', 'ssc' ), 'selector' => '.ssc-carousel-main-img .owl-controls'),
                                        array('property' => 'background-color', 'label' => esc_html__( 'Color', 'ssc' ), 'selector' => '.owl-page span'),
                                        array('property' => 'background-color', 'label' => esc_html__( 'Color (Active)', 'ssc' ), 'selector' => '.owl-page.active span, .owl-page:hover span'),
	                                    array('property' => 'text-align', 'label' => esc_html__( 'Text Align', 'ssc' ), 'selector' => '.owl-pagination'),

                                        array('property' => 'opacity', 'label' => esc_html__( 'Opacity', 'ssc' ), 'selector' => '.owl-page span'),
                                        array('property' => 'opacity', 'label' => esc_html__( 'Opacity Active', 'ssc' ), 'selector' => '.owl-page.active span, .owl-page:hover span'),
                                        array('property' => 'border', 'label' => esc_html__( 'Border', 'ssc' ), 'selector' => '.owl-page span'),
                                        array('property' => 'border', 'label' => esc_html__( 'Border Active', 'ssc' ), 'selector' => '.owl-page.active span, .owl-page:hover span'),
                                        array('property' => 'border-radius', 'label' => esc_html__( 'Border Radius', 'ssc' ), 'selector' => '.owl-page span'),
                                        array('property' => 'border-radius', 'label' => esc_html__( 'Border Radius Active', 'ssc' ), 'selector' => '.owl-page.active span, .owl-page:hover span'),
                                        array('property' => 'width', 'label' => esc_html__( 'Width', 'ssc' ), 'selector' => '.owl-page span'),
                                        array('property' => 'height', 'label' => esc_html__( 'Height', 'ssc' ), 'selector' => '.owl-page span'),
                                        array('property' => 'padding', 'label' => esc_html__( 'Padding', 'ssc' ), 'selector' => '.ssc-carousel-main-img .owl-controls'),
                                        array('property' => 'margin', 'label' => esc_html__( 'Margin', 'ssc' ), 'selector' => '.owl-page span'),


                                    ),
                                    'Navigation' => array(
                                        array('property' => 'width', 'label' => esc_html__( 'Width', 'ssc' ), 'selector' => '.owl-controls .owl-buttons div'),
                                        array('property' => 'height', 'label' => esc_html__( 'Height', 'ssc' ), 'selector' => '.owl-controls .owl-buttons div'),
                                        array('property' => 'color', 'label' => esc_html__( 'Color', 'ssc' ), 'selector' => '.owl-controls .owl-buttons div:before'),
                                        array('property' => 'color', 'label' => esc_html__( 'Color on hover', 'ssc' ), 'selector' => '.owl-controls .owl-buttons div:hover:before'),
                                        array('property' => 'font-size', 'label' => esc_html__( 'Font Size', 'ssc' ), 'selector' => '.owl-controls .owl-buttons div:before'),
                                        array('property' => 'line-height', 'label' => esc_html__( 'Line Height', 'ssc' ), 'selector' => '.owl-controls .owl-buttons div:before'),
                                        array('property' => 'background-color', 'label' => esc_html__( 'Background Color', 'ssc' ), 'selector' => '.owl-controls .owl-buttons div'),
                                        array('property' => 'background-color', 'label' => esc_html__( 'Background Color on hover', 'ssc' ), 'selector' => '.owl-controls .owl-buttons div:hover'),
                                        array('property' => 'opacity', 'label' => esc_html__( 'Opacity', 'ssc' ), 'selector' => '.owl-controls .owl-buttons div'),
                                        array('property' => 'font-weight', 'label' => esc_html__( 'Font Weight', 'ssc' ), 'selector' => '.owl-controls .owl-buttons div:before'),
                                        array('property' => 'top', 'label' => esc_html__( 'Top', 'ssc' ), 'selector' => '.owl-controls .owl-buttons div'),
                                        array('property' => 'left', 'label' => esc_html__( 'Left Button Position', 'ssc' ), 'selector' => '.owl-controls .owl-buttons div.owl-prev, .owl-nav-arrow.owl-theme:hover .owl-controls .owl-buttons div.owl-prev'),
                                        array('property' => 'right', 'label' => esc_html__( 'Right Button Position', 'ssc' ), 'selector' => '.owl-controls .owl-buttons div.owl-next, .owl-nav-arrow.owl-theme:hover .owl-controls .owl-buttons div.owl-next'),
                                        array('property' => 'border', 'selector' => '.owl-controls .owl-buttons div'),
                                        array('property' => 'border', 'label' => esc_html__( 'Border Hover', 'ssc' ), 'selector' => '.owl-controls .owl-buttons div:hover'),
                                        array('property' => 'border-radius', 'selector' => '.owl-controls .owl-buttons div'),
                                        array('property' => 'padding', 'label' => esc_html__( 'Padding', 'ssc' ), 'selector' => '.owl-controls .owl-buttons div'),
                                        array('property' => 'margin', 'label' => esc_html__( 'Margin', 'ssc' ), 'selector' => '.owl-controls .owl-buttons div'),
                                    ),
                                ),
                                array(
                                    "screens" => "999,768,667,479",
                                    'Box' => array(
                                        array('property' => 'background'),
                                        array('property' => 'display', 'label' => esc_html__( 'Display', 'ssc' )),
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
                                    'Image' => array(
                                        array('property' => 'background', 'label' => esc_html__( 'Background Color', 'ssc' ), 'selector' => '.ssc-carousel-main-img img'),
                                        array('property' => 'width', 'label' => esc_html__( 'Width', 'ssc' ), 'selector' => '.ssc-carousel-main-img img'),
                                        array('property' => 'height', 'label' => esc_html__( 'Height', 'ssc' ), 'selector' => '.ssc-carousel-main-img img'),
                                        array('property' => 'box-shadow', 'label' => esc_html__( 'Box Shadow', 'ssc' ), 'selector' => '.ssc-carousel-main-img img'),
                                        array('property' => 'opacity', 'label' => esc_html__( 'Opacity', 'ssc' ), 'selector' => '.ssc-carousel-main-img img'),
                                        array('property' => 'margin', 'label' => esc_html__( 'Margin', 'ssc' ), 'selector' => '.ssc-carousel-main-img img'),
                                        array('property' => 'padding', 'label' => esc_html__( 'Padding', 'ssc' ), 'selector' => '.ssc-carousel-main-img img'),
                                        array('property' => 'border', 'label' => esc_html__( 'Border', 'ssc' ), 'selector' => '.ssc-carousel-main-img img'),
                                        array('property' => 'border-radius', 'label' => esc_html__( 'Border Radius', 'ssc' ), 'selector' => '.ssc-carousel-main-img img'),
                                    ),
                                    'Thumbnails' => array(
                                        array('property' => 'background', 'label' => esc_html__( 'Background Color', 'ssc' ), 'selector' => '.ssc-carousel-tumb-imgs'),
                                        array('property' => 'margin', 'label' => esc_html__( 'Margin', 'ssc' ), 'selector' => '.ssc-carousel-tumb-imgs'),
                                        array('property' => 'padding', 'label' => esc_html__( 'Padding', 'ssc' ), 'selector' => '.ssc-carousel-tumb-imgs'),
                                        array('property' => 'width', 'label' => esc_html__( 'Width', 'ssc' ), 'selector' => '.ssc-carousel-tumb-imgs img'),
                                        array('property' => 'height', 'label' => esc_html__( 'Height', 'ssc' ), 'selector' => '.ssc-carousel-tumb-imgs img'),
                                        array('property' => 'box-shadow', 'label' => esc_html__( 'Box Shadow', 'ssc' ), 'selector' => '.ssc-carousel-tumb-imgs img'),
                                        array('property' => 'opacity', 'label' => esc_html__( 'Opacity', 'ssc' ), 'selector' => '.ssc-carousel-tumb-imgs img'),
                                        array('property' => 'opacity', 'label' => esc_html__( 'Opacity (Active)', 'ssc' ), 'selector' => '.ssc-carousel-tumb-imgs .synced img'),
                                        array('property' => 'border', 'label' => esc_html__( 'Border', 'ssc' ), 'selector' => '.ssc-carousel-tumb-imgs img'),
                                        array('property' => 'border-radius', 'label' => esc_html__( 'Border Radius', 'ssc' ), 'selector' => '.ssc-carousel-tumb-imgs img'),
                                        array('property' => 'border', 'label' => esc_html__( 'Border (Active)', 'ssc' ), 'selector' => '.ssc-carousel-tumb-imgs .synced img'),
                                        array('property' => 'border-radius', 'label' => esc_html__( 'Border Radius (Active)', 'ssc' ), 'selector' => 'ssc-carousel-tumb-imgs .synced img'),
                                        array('property' => 'display', 'label' => esc_html__( 'Display Thumbnails Pagination', 'ssc' ), 'selector' => '.ssc-carousel-tumb-imgs .owl-pagination'),
                                    ),
                                    'Pagination' => array(
                                        array('property' => 'background', 'label' => esc_html__( 'Background Color', 'ssc' ), 'selector' => '.ssc-carousel-main-img .owl-controls'),
                                        array('property' => 'padding', 'label' => esc_html__( 'Padding', 'ssc' ), 'selector' => '.ssc-carousel-main-img .owl-controls'),
                                        array('property' => 'line-height', 'label' => esc_html__( 'Line Height', 'ssc' ), 'selector' => '.ssc-carousel-main-img .owl-controls'),
                                        array('property' => 'background-color', 'label' => esc_html__( 'Color', 'ssc' ), 'selector' => '.owl-page span'),
                                        array('property' => 'background-color', 'label' => esc_html__( 'Color (Active)', 'ssc' ), 'selector' => '.owl-page.active span, .owl-page:hover span'),
                                        array('property' => 'opacity', 'label' => esc_html__( 'Opacity', 'ssc' ), 'selector' => '.owl-page span'),
                                        array('property' => 'width', 'label' => esc_html__( 'Width', 'ssc' ), 'selector' => '.owl-page span'),
                                        array('property' => 'height', 'label' => esc_html__( 'Height', 'ssc' ), 'selector' => '.owl-page span'),
                                        array('property' => 'margin', 'label' => esc_html__( 'Margin', 'ssc' ), 'selector' => '.owl-page span'),

                                    ),
                                    'Navigation' => array(
                                        array('property' => 'width', 'label' => esc_html__( 'Width', 'ssc' ), 'selector' => '.owl-controls .owl-buttons div'),
                                        array('property' => 'height', 'label' => esc_html__( 'Height', 'ssc' ), 'selector' => '.owl-controls .owl-buttons div'),
                                        array('property' => 'color', 'label' => esc_html__( 'Color', 'ssc' ), 'selector' => '.owl-controls .owl-buttons div:before'),
                                        array('property' => 'color', 'label' => esc_html__( 'Color on hover', 'ssc' ), 'selector' => '.owl-controls .owl-buttons div:hover:before'),
                                        array('property' => 'font-size', 'label' => esc_html__( 'Font Size', 'ssc' ), 'selector' => '.owl-controls .owl-buttons div:before'),
                                        array('property' => 'line-height', 'label' => esc_html__( 'Line Height', 'ssc' ), 'selector' => '.owl-controls .owl-buttons div:before'),
                                        array('property' => 'background-color', 'label' => esc_html__( 'Background Color', 'ssc' ), 'selector' => '.owl-controls .owl-buttons div'),
                                        array('property' => 'background-color', 'label' => esc_html__( 'Background Color on hover', 'ssc' ), 'selector' => '.owl-controls .owl-buttons div:hover'),
                                        array('property' => 'opacity', 'label' => esc_html__( 'Opacity', 'ssc' ), 'selector' => '.owl-controls .owl-buttons div'),
                                        array('property' => 'font-weight', 'label' => esc_html__( 'Font Weight', 'ssc' ), 'selector' => '.owl-controls .owl-buttons div:before'),
                                        array('property' => 'top', 'label' => esc_html__( 'Top', 'ssc' ), 'selector' => '.owl-controls .owl-buttons div'),
                                        array('property' => 'left', 'label' => esc_html__( 'Left Button Position', 'ssc' ), 'selector' => '.owl-controls .owl-buttons div.owl-prev, .owl-nav-arrow.owl-theme:hover .owl-controls .owl-buttons div.owl-prev'),
                                        array('property' => 'right', 'label' => esc_html__( 'Right Button Position', 'ssc' ), 'selector' => '.owl-controls .owl-buttons div.owl-next, .owl-nav-arrow.owl-theme:hover .owl-controls .owl-buttons div.owl-next'),
                                        array('property' => 'border', 'selector' => '.owl-controls .owl-buttons div'),
                                        array('property' => 'border-radius', 'selector' => '.owl-controls .owl-buttons div'),
                                        array('property' => 'padding', 'label' => esc_html__( 'Padding', 'ssc' ), 'selector' => '.owl-controls .owl-buttons div'),
                                        array('property' => 'margin', 'label' => esc_html__( 'Margin', 'ssc' ), 'selector' => '.owl-controls .owl-buttons div'),
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



function ssc_img_carousel($atts, $content = null) {

    $out 	= $thumb_data = $speed = $items_tablet = $mobile = '';
    $img_size 	= 'full';
    $onclick 	= 'none';
    $custom_img_size = '400x200';
    $wrp_class 	= apply_filters( 'kc-el-class', $atts );
    
    extract( $atts );
    
    $items_number 	= ( !empty( $items_number ) ) ? $items_number : 4;
    $tablet 	= ( !empty( $tablet ) ) ? $tablet : 2;
    $mobile 	= ( !empty( $mobile ) ) ? $mobile : 1;
    
    if( !empty( $images ) )
        $images 	= explode( ',', $images );
    
    if ( is_array( $images ) && !empty( $images ) ) {
    
        foreach( $images as $image_id ){

        	if( 'custom_size' == $img_size ){
        		$cs = ssc_get_img_sizes_array_from_string( $custom_img_size );
		        $attachment_data[] 		= wp_get_attachment_image_src( $image_id, $cs );
	        } else {
		        $attachment_data[] 		= image_downsize( $image_id, $img_size );
	        }
            $attachment_data_full[] = image_downsize( $image_id, 'full' );
    
        }
    
    }else{
        return '<div class="kc-carousel_images align-center" style="border:1px dashed #ccc;"><br /><h3>Carousel Images: '.__( 'No images upload', 'ssc' ).'</h3></div>';
    }
    
    $element_attribute = array();
    
    $el_classes = array(
        'sl-carousel-images',
        'owl-carousel-images',
        'kc-sync1',
        'ssc-carousel-main-img',
        'owl-nav-arrow',
        $wrap_class
    );
    
    $owl_option = array(
        'items' 		=> $items_number,
        'tablet' 	=> $tablet,
        'mobile' 	=> $mobile,
        'speed' 		=> $speed,
        'navigation' 	=> $navigation,
        'pagination' 	=> $pagination,
        'autoheight' 	=> $auto_height,
        'progressbar' 	=> $progress_bar,
        'delay' 		=> $delay,
        'autoplay' 		=> $auto_play,
        'showthumb'		=> $show_thumb,
        'num_thumb'		=> $num_thumb,
        'stopOnHover' => $stop_on_hover,
        'lazyLoad' => $lazy_load,
        'singleItem' => true,
        'itemsScaleUp' => true,
    );
    
    $owl_option 			= json_encode( $owl_option );
    $element_attribute[] 	= 'class="'. esc_attr( implode( ' ', $el_classes ) ) .'"';
    $element_attribute[] 	= "data-owl-i-options='$owl_option'";
    
    if( 'custom_link' === $onclick && !empty( $custom_links ) ){
    
        $custom_links 		= preg_replace( '/\n$/', '', preg_replace('/^\n/','',preg_replace('/[\r\n]+/',"\n", $custom_links)) );
        $custom_links_arr 	= explode("\n", $custom_links );
    
    }

    $out .=
    '<div class="' . esc_attr( implode( ' ', $wrp_class ) ) . '">
        <div class="kc-carousel_images">
    
            <div ' . implode( ' ', $element_attribute ) . '>';

                $i = 0;
                foreach( $attachment_data as $i => $image ):
                    $alttext = '';
                    if( $alt_text == 'yes' ) {
                        $alttext = get_post_meta( $images[$i], '_wp_attachment_image_alt', true);
                    }
                        $img_src = ( !empty( $lazy_load ) ) ? 'class="lazyOwl" data-src="' . esc_attr( $image[0] ) . '"' : 'src="' . esc_attr( $image[0] ) . '"';
                    $out .= '<div class="item">';

                        if( 'none' === $onclick ){

                            $out .= '<img ' . $img_src . ' alt="' . esc_attr( $alttext ) . '"/>';

                        } else {

                            switch( $onclick ){

                                case 'lightbox':

                                    $out .= '<a class="kc-image-link kc-pretty-photo" data-lightbox="kc-lightbox" rel="prettyPhoto['. $atts['_id'] .']" href="'. esc_attr( esc_attr( $attachment_data_full[$i][0] ) ) .'">'
                                        .'<img ' . $img_src . ' alt="'. $alttext .'" /></a>';
                                    break;

                                case 'custom_link':

                                    if( isset( $custom_links_arr[$i] ) ){
                                        $out .= '<a href="'. esc_attr( strip_tags( $custom_links_arr[$i] ) ) .'" target="'. esc_attr( $custom_links_target ) .'">'
                                            .'<img ' . $img_src . ' alt="'. esc_attr( $alttext ) .'" /></a>';
                                    }else{
                                        $out .= '<img ' . $img_src . ' alt="'. esc_attr( $alttext ) .'" />';
                                    }

                                    break;

                            }

                        }

                    $out .= '</div>';

                    $i++;
                endforeach;

            $out .= '</div>';

            if( !empty( $show_thumb ) && 'yes' === $show_thumb ){

                $out .= '<div class="kc-sync2 owl-carousel ssc-carousel-tumb-imgs">';
                    foreach( $attachment_data as $image ):
                        $out .= '
                        <div class="item">
                            <img src="' . esc_attr( $image[0] ) . '" alt="" />
                        </div>';

                    endforeach;

                $out .= '</div>';

            } //end if show thumb

        $out .=
        '</div>
    </div>';

//    kc_js_callback( 'kc_front.owl_slider' );

    return $out;
}

add_shortcode('ssc_img_carousel', 'ssc_img_carousel');

add_filter( 'shortcode_ssc_img_carousel', 'ssc_img_carousel_filter' );

function ssc_img_carousel_filter( $atts ){

    $atts = kc_remove_empty_code( $atts );
    extract( $atts );

    wp_enqueue_script( 'owl-carousel' );
    wp_enqueue_style( 'owl-theme' );
    wp_enqueue_style( 'owl-carousel' );

    if( isset( $onclick ) && $onclick == 'lightbox' ){
        wp_enqueue_script( 'prettyPhoto' );
        wp_enqueue_style( 'prettyPhoto' );
    }

    return $atts;

}