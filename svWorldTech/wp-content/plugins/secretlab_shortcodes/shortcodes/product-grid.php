<?php
add_action('init', 'ssc_productgrid_params', 99);

/**
 * Additional functions
 */

function ssc_productgrid_params() {
    global $kc;
    $kc->add_map(array(
        'ssc_productgrid' => array(
            'name' => esc_html__( 'Products Grid', 'ssc' ),
            'description' => esc_html__( 'It displays products by product type with unlimited design templates and colors', 'ssc' ),
            'icon' => 'kc-icon-box ssc-icon-27',
            'is_container' => true,
            'category' => 'SecretLab',
            'css_box' => true,
            'params' => array(
                esc_html__( 'General', 'ssc' ) => array(
                    array(
                        'name' => 'grid_type',
                        'label' => esc_html__( 'Grid Type', 'ssc' ),
                        'type' => 'radio',
                        'options' => array(
                            'grid' => esc_html__( 'Grid', 'ssc' ),
                            'masonry' => esc_html__( 'Masonry', 'ssc' ),
                        ),
                        'value' => 'grid',
                        'relation' => array(
	                        'parent'    => 'template',
	                        'hide_when' => array('20',),
                        )
                    ),
                    array(
                        'name' => 'template',
                        'label' => esc_html__( 'Select Template', 'ssc' ),
                        'type' => 'radio_image',  // USAGE TEXT TYPE
                        'options' => array(
                            '1'	=> SSC_URL . 'images/post1.jpg',
                            '2'	=> SSC_URL . 'images/post2.jpg',
                            '3'	=> SSC_URL . 'images/post3.jpg',
                            '4'	=> SSC_URL . 'images/post4.jpg',
                            '5'	=> SSC_URL . 'images/post5.jpg',
                            '6'	=> SSC_URL . 'images/post6.jpg',
                            '7'	=> SSC_URL . 'images/post7.jpg',
                            '8'	=> SSC_URL . 'images/post8.jpg',
//                            '9'	=> SSC_URL . 'images/post9.jpg',
                            '10'	=> SSC_URL . 'images/post10.jpg',
                            '11'	=> SSC_URL . 'images/post11.jpg',
                            '20'	=> SSC_URL . 'images/post20.jpg',

                        ),
                        'value' => '1', // remove this if you do not need a default content
                    ),
	                array(
		                'name' => 'd_items',
		                'label' => __(' Number Items?', 'ssc'),
		                'type' => 'number_slider',
		                'options' => array(
			                'min' => 1,
			                'max' => 10,
			                'show_input' => true
		                ),
		                'value' => 4,
		                'relation' => array(
			                'parent' => 'template',
			                'show_when' => array( '20', ),
		                ),
		                'description' => __(' Display number of items per each slide (Desktop Screen)', 'ssc')
	                ),
	                array(
		                'name' => 't_items',
		                'label' => __(' Items on tablet?', 'ssc'),
		                'type' => 'number_slider',
		                'options' => array(
			                'min' => 1,
			                'max' => 6,
			                'show_input' => true
		                ),
		                'value' => 2,
		                'relation' => array(
			                'parent' => 'template',
			                'show_when' => array( '20', ),
		                ),
		                'description' => __(' Display number of items per each slide (Tablet Screen)', 'ssc')
	                ),
	                array(
		                'name' => 'm_items',
		                'label' => __(' Items on smartphone?', 'ssc'),
		                'type' => 'number_slider',
		                'options' => array(
			                'min' => 1,
			                'max' => 4,
			                'show_input' => true
		                ),
		                'value' => 1,
		                'relation' => array(
			                'parent' => 'template',
			                'show_when' => array( '20', ),
		                ),
		                'description' => __(' Display number of items per each slide (Smartphone Screen)', 'ssc')
	                ),
	                array(
		                'name' => 'scroll',
		                'label' => __('Scroll items', 'ssc'),
		                'type' => 'number_slider',
		                'options' => array(
			                'min' => 1,
			                'max' => 10,
			                'show_input' => true
		                ),
		                'value' => 4,
		                'relation' => array(
			                'parent' => 'template',
			                'show_when' => array( '20', ),
		                ),
		                'description' => __(' Display number of items to scroll', 'ssc')
	                ),
	                array(
		                'name' => 'arrows',
		                'label' => __('Show arrows?', 'ssc'),
		                'type' => 'toggle',
		                'value' => 'no',
		                'relation' => array(
			                'parent' => 'template',
			                'show_when' => array( '20', ),
		                ),
		                'description' => __(' Display arrows on the slider', 'ssc')
	                ),
	                array(
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
		                'name' => 'dots',
		                'label' => __('Dots?', 'ssc'),
		                'type' => 'toggle',
		                'value' => 'yes',
		                'relation' => array(
			                'parent' => 'template',
			                'show_when' => array( '20', ),
		                ),
		                'description' => __(' Display dots on the slider', 'ssc')
	                ),
                    array(
                        'name'          => 'withtags',
                        'label'         => esc_html__( 'Products Categories', 'ssc'),
                        'type'          => 'autocomplete',
                        'description' => esc_html__( 'If you want so show only products with specific category or categories.', 'ssc' ),
                        'options'       => array(
                            'multiple'      => true,
                            'post_type'     => 'product', // default is "any"
                            'taxonomy'      => 'product_cat'
                        ),
                    ),
                    array(
                        'name' => 'order',
                        'label' => esc_html__( 'Order Of Products', 'ssc' ),
                        'type' => 'select',
                        'options' => array(
                            'DESC' => esc_html__( 'Descending', 'ssc' ),
                            'ASC' => esc_html__( 'Ascending', 'ssc' ),
                        ),
                        'value' => 'DESC',
                    ),
                    array(
                        'name' => 'orderby',
                        'label' => esc_html__( 'Order By', 'ssc' ),
                        'type' => 'select',
                        'options' => array(
                            'date' => esc_html__( 'Date', 'ssc' ),
                            'popularity' => esc_html__( 'Popularity', 'ssc' ),
                            'rating' => esc_html__( 'Average rating', 'ssc' ),
                            'price' => esc_html__( 'Price', 'ssc' ),
                            'comment_count' => esc_html__( 'Comment Count', 'ssc' ),
                        ),
                        'value' => 'date',
                    ),

                    array(
                        'name' => 'items',
                        'label' => esc_html__( 'Products Per Page', 'ssc' ),
                        'type' => 'text',
                        'value' => '12',
                        'description' => esc_html__( 'Set -1 if want to show all products on the page', 'ssc' ),
                    ),
                    array(
                        'name' => 'ior',
                        'label' => esc_html__( 'Products On Row', 'ssc' ),
                        'type' => 'select',
                        'options' => array(
                            '1' => esc_html__( '1 Item', 'ssc' ),
                            '2' => esc_html__( '2 Items', 'ssc' ),
                            '3' => esc_html__( '3 Items', 'ssc' ),
                            '4' => esc_html__( '4 Items', 'ssc' ),
                            '5' => esc_html__( '5 Items', 'ssc' ),
                            '6' => esc_html__( '6 Items', 'ssc' ),
                            '7' => esc_html__( '7 Items', 'ssc' ),
                        ),
                        'relation' => array(
	                        'parent' => 'template',
	                        'hide_when' => array( '20', ),
                        ),
                        'value' => '3',
                    ),
                    array(
                        'name' => 'show_pagination',
                        'label' => esc_html__( 'Show Pagination', 'ssc' ),
                        'type' => 'toggle',
                        'value' => 'yes',
                    ),
                    array(
                        'name' => 'navi_type',
                        'label' => esc_html__( 'Navigation Type', 'ssc' ),
                        'type' => 'select',
                        'options' => array(
                            'buttons' => esc_html__( 'Buttons', 'ssc' ),
                            'numbers' => esc_html__( 'Numbers', 'ssc' ),
                        ),
                        'value' => 'numbers',
                        'relation' => array(
                            'parent' => 'show_pagination',
                            'show_when' => 'yes'
                        )
                    ),
                    array(
                        'name' => 'prev',
                        'label' => esc_html__( 'Text For Prev Button', 'ssc' ),
                        'type' => 'text',
                        'value' => esc_html__( 'Older Products', 'ssc' ),
                        'relation' => array(
                            'parent' => 'navi_type',
                            'show_when' => 'buttons'
                        )
                    ),
                    array(
                        'name' => 'next',
                        'label' => esc_html__( 'Text For Next Button', 'ssc' ),
                        'type' => 'text',
                        'value' => esc_html__( 'Never Products', 'ssc' ),
                        'relation' => array(
                            'parent' => 'navi_type',
                            'show_when' => 'buttons'
                        )
                    ),

                    array(
                        'name' => 'limit_d_lines',
                        'label' => esc_html__( 'Limit Lines For Description', 'ssc' ),
                        'type' => 'text',
                        'value' => '10',
                        'description' => esc_html__( 'Set 0 if you don\'t want to display description. Set -1 if you don\'t want to show the description.', 'ssc' ),
                    ),
	                array(
		                'name' => 'limit_t_lines',
		                'label' => esc_html__( 'Limit Lines For Title', 'ssc' ),
		                'type' => 'text',
		                'value' => '2',
		                'description' => esc_html__( 'Set 0 if you dont want to limit the title.  Set -1 if you don\'t want to show the title.', 'ssc' ),
	                ),
                    array(
                        'name' => 'show_thumb',
                        'label' => esc_html__( 'Show Thumbnails', 'ssc' ),
                        'type' => 'toggle',
                        'value' => 'yes',
                        'description' => esc_html__( 'Display thumbnails of product in product items.', 'ssc' ),
                    ),
	                array(
		                'type'        	=> 'dropdown',
		                'label'     	=> esc_html__( 'Thumbnails size', 'ssc' ),
		                'name' 		 	=> 'thumb_size',
		                'description' 	=> esc_html__( 'Set the thumbnails size.', 'ssc' ),
//                            'value'       	=> 'full',
		                'options'       => ssc_get_image_sizes(),
		                'relation'  	=> array(
			                'parent'	=> 'show_thumb',
			                'show_when' => 'yes'
		                )
	                ),
	                array(
		                'type'        	=> 'text',
		                'label'     	=> esc_html__( 'Custom Thumbnails size', 'ssc' ),
		                'name' 		 	=> 'custom_thumb_size',
		                'description' 	=> esc_html__( 'Set the thumbnails size: "thumbnail", "medium", "large", "full" or "400x200".', 'ssc' ),
//                            'value'       	=> 'full',
		                'relation'  	=> array(
			                'parent'	=> 'thumb_size',
			                'show_when' => 'custom_size'
		                )
	                ),
                    array(
                        'name' => 'show_thumb_zoom',
                        'label' => esc_html__( 'Show Thumbnails Zoom', 'ssc' ),
                        'type' => 'toggle',
                        'value' => 'yes',
                        'description' => esc_html__( 'Display thumbnails zoom of product in product items.', 'ssc' ),
                        'relation' => array(
                            'parent' => 'show_thumb',
                            'show_when' => 'yes'
                        )
                    ),
	                array(
		                'name'          => 'monocolored',
		                'label'         => __(' Grayscale Effect', 'ssc'),
		                'type'          => 'toggle',
		                'description'   => __(' Enable a grayscale effect for images. Images become colorful on hover.', 'ssc'),
		                'value' => 'yes',
	                ),
	                array(
		                'name' => 'strength',
		                'label' => esc_html__( 'Grayscale strength', 'ssc' ),
		                'type' => 'number_slider',
		                'value'	=> '0',
		                'options' => array(
			                'min' => 0,
			                'max' => 100,
			                'unit' => '%',
			                'show_input' => true
		                ),
		                'relation' => array(
			                'parent'    => 'monocolored',
			                'show_when' => 'yes'
		                ),
		                'description' => '0-100%'
	                ),
	                array(
		                'name'			=> 'hover_effect',
		                'type'     	=> 'dropdown',
		                'label'  	 	=> esc_html__( 'Hover Effect', 'ssc' ),
		                'options' 		=> array(
			                'none'  => esc_html__( 'None', 'ssc' ),
			                'blur'  => esc_html__( 'Blur on hover', 'ssc' ),
			                'noblur'  => esc_html__( 'Blur on normal', 'ssc' ),
			                'scaleup'  => esc_html__( 'Scale Up', 'ssc' ),
			                'scaleupall'  => esc_html__( 'Scale Up Whole Element', 'ssc' ),
			                'flip'  => esc_html__( 'Flip', 'ssc' ),
			                'rotate'  => esc_html__( 'Rotate', 'ssc' ),
		                ),
		                'description'	=> esc_html__( 'Select the click event when users click on an image.', 'ssc' )
	                ),
	                array(
		                'name' => 'show_onsale',
		                'label' => esc_html__('Show onsale?', 'ssc'),
		                'type' => 'toggle',
		                'value' => 'yes',
		                'description' => esc_html__('Display on sale on the product items.', 'ssc'),
	                ),
	                array(
		                'name' => 'onsale_text',
		                'label' => esc_html__('Text onsale', 'ssc'),
		                'type' => 'text',
		                'value' => esc_html__('Sale!', 'ssc'),
		                'description' => esc_html__('On sale text.', 'ssc'),
		                'relation' => array(
			                'parent' => 'show_onsale',
			                'show_when' => 'yes'
		                )
	                ),
	                array(
		                'name' => 'show_price',
		                'label' => esc_html__( 'Show Price', 'ssc' ),
		                'type' => 'toggle',
		                'value' => 'yes',
		                'description' => esc_html__( 'Display price of product in product items.', 'ssc' ),
	                ),
	                array(
		                'name' => 'show_rating',
		                'label' => esc_html__( 'Show Rating', 'ssc' ),
		                'type' => 'toggle',
		                'value' => 'yes',
		                'description' => esc_html__( 'Display rating of product in product items.', 'ssc' ),
	                ),
	                array(
		                'name' => 'show_add',
		                'label' => esc_html__( 'Show Add to cart button', 'ssc' ),
		                'type' => 'toggle',
		                'value' => 'yes',
		                'description' => esc_html__( 'Display add to cart button of product in product items.', 'ssc' ),
	                ),
                    array(
                        'name' => 'add_text',
                        'label' => esc_html__( 'Buy Text', 'ssc' ),
                        'type' => 'text',
                        'value' => esc_html__( 'Buy', 'ssc' ),
                        'relation' => array(
                            'parent' => 'show_add',
                            'show_when' => 'yes'
                        )
                    ),
                    array(
                        'name' => 'show_filters',
                        'label' => esc_html__( 'Show Filters', 'ssc' ),
                        'type' => 'toggle',
                        'value' => 'yes',
                        'description' => esc_html__( 'Display filters by tags or categories.', 'ssc' ),
                    ),
                    array(
                        'name' => 'filter_type',
                        'label' => esc_html__( 'Filter By', 'ssc' ),
                        'type' => 'select',
                        'options' => array(
                            'cats' => esc_html__( 'Categories', 'ssc' ),
                            'tags' => esc_html__( 'Tags', 'ssc' ),
                        ),
                        'value' => 'tags',
                        'relation' => array(
                            'parent' => 'show_filters',
                            'show_when' => 'yes'
                        )
                    ),
                    array(
                        'name' => 'all',
                        'label' => esc_html__( 'Word For All products link', 'ssc' ),
                        'type' => 'text',
                        'value' => esc_html__( 'All products', 'ssc' ),
                        'relation' => array(
                            'parent' => 'show_filters',
                            'show_when' => 'yes'
                        )
                    ),
                    array(
                        'name' => 'el_class',
                        'label' => esc_html__( 'Extra Class Name', 'ssc' ),
                        'type' => 'text',
                        'description' => esc_html__( 'If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your CSS file.', 'ssc' ),
                        'admin_label' => true,
                        'value' => ''
                    ) ,

                ),
                // Styling
                //Styling
                esc_html__( 'styling', 'ssc') => array(
                    array(
                        'name' => 'my-css',
                        'label' => esc_html__( 'Styling', 'ssc' ),
                        'type' => 'css',
                        'value' => '{`kc-css`:{`any`:{`box`:{`margin|.grid-item`:`inherit inherit 60px inherit`,`padding|.grid-item`:`inherit 15px inherit 15px`},`content-box`:{`margin|.grid-item .body`:`-20px inherit inherit inherit`,`padding|.grid-item .body`:`20px 15px 15px 15px`,`border|.grid-item .body`:`|2px solid #d7dce0|2px solid #d7dce0|2px solid #d7dce0`},`title`:{`font-family|.grid-item .title a`:`Montserrat`,`margin|.grid-item .title a`:`inherit inherit 5px inherit`},`description`:{`color|.grid-item .description`:`#768188`,`line-height|.grid-item .description`:`24px`},`add-to-cart`:{`color|.grid-item .button`:`#b2b9be`,`font-size|.grid-item .button`:`12px`,`font-weight|.grid-item .button`:`500`,`text-transform|.grid-item .button`:`uppercase`}}}}', // remove this if you do not need a default content
                        'description' => esc_html__( 'Styles', 'ssc' ),
                        'options' => array(
                            array(
                                'screens' => "any,999,768,667,479",
                                'Wrapper' => array(
	                                array('property' => 'background'),
	                                array('property' => 'margin', 'label' => esc_html__( 'Margin', 'ssc' )),
	                                array('property' => 'padding', 'label' => esc_html__( 'Padding', 'ssc' )),
	                                array('property' => 'border', 'label' => esc_html__( 'Border', 'ssc' )),
	                                array('property' => 'border-radius', 'label' => esc_html__( 'Border Radius', 'ssc' )),
	                                array('property' => 'width', 'label' => esc_html__( 'Width', 'ssc' )),
	                                array('property' => 'height', 'label' => esc_html__( 'Height', 'ssc' )),
	                                array('property' => 'float', 'label' => esc_html__( 'Float', 'ssc' )),
	                                array('property' => 'display', 'label' => esc_html__( 'Display', 'ssc' )),
	                                array('property' => 'box-shadow', 'label' => esc_html__( 'Box Shadow', 'ssc' )),
	                                array('property' => 'opacity', 'label' => esc_html__( 'Opacity', 'ssc' )),
                                ),
                                // --> Box
                                'Box' => array(
                                    array('property' => 'background', 'selector' => '.grid-item'),
	                                array('property' => 'text-align', 'label' => esc_html__( 'Text Align', 'ssc' ), 'selector' => '.grid-item'),
                                    array('property' => 'margin', 'label' => esc_html__( 'Margin', 'ssc' ), 'selector' => '.grid-item'),
                                    array('property' => 'padding', 'label' => esc_html__( 'Padding', 'ssc' ), 'selector' => '.grid-item'),
                                    array('property' => 'border', 'label' => esc_html__( 'Border', 'ssc' ), 'selector' => '.grid-item'),
                                    array('property' => 'border-radius', 'label' => esc_html__( 'Border Radius', 'ssc' ), 'selector' => '.grid-item'),
                                    array('property' => 'width', 'label' => esc_html__( 'Width', 'ssc' ), 'selector' => '.grid-item'),
                                    array('property' => 'height', 'label' => esc_html__( 'Height', 'ssc' ), 'selector' => '.grid-item'),
                                    array('property' => 'float', 'label' => esc_html__( 'Float', 'ssc' ), 'selector' => '.grid-item'),
                                    array('property' => 'display', 'label' => esc_html__( 'Display', 'ssc' ), 'selector' => '.grid-item'),
                                    array('property' => 'box-shadow', 'label' => esc_html__( 'Box Shadow', 'ssc' ), 'selector' => '.grid-item'),
                                    array('property' => 'opacity', 'label' => esc_html__( 'Opacity', 'ssc' ), 'selector' => '.grid-item'),
                                ),
                                'Box Inside' => array(
                                    array('property' => 'background', 'selector' => '.grid-item .pbody'),
                                    array('property' => 'margin', 'label' => esc_html__( 'Margin', 'ssc' ), 'selector' => '.grid-item .pbody'),
                                    array('property' => 'padding', 'label' => esc_html__( 'Padding', 'ssc' ), 'selector' => '.grid-item .pbody'),
                                    array('property' => 'border', 'label' => esc_html__( 'Border', 'ssc' ), 'selector' => '.grid-item .pbody'),
                                    array('property' => 'border-radius', 'label' => esc_html__( 'Border Radius', 'ssc' ), 'selector' => '.grid-item .pbody'),
                                    array('property' => 'width', 'label' => esc_html__( 'Width', 'ssc' ), 'selector' => '.grid-item .pbody'),
                                    array('property' => 'height', 'label' => esc_html__( 'Height', 'ssc' ), 'selector' => '.grid-item .pbody'),
                                    array('property' => 'float', 'label' => esc_html__( 'Float', 'ssc' ), 'selector' => '.grid-item .pbody'),
                                    array('property' => 'display', 'label' => esc_html__( 'Display', 'ssc' ), 'selector' => '.grid-item .pbody'),
                                    array('property' => 'box-shadow', 'label' => esc_html__( 'Box Shadow', 'ssc' ), 'selector' => '.grid-item .pbody'),
                                    array('property' => 'opacity', 'label' => esc_html__( 'Opacity', 'ssc' ), 'selector' => '.grid-item .pbody'),
                                ),
                                // Image Box
                                'Image Box' => array(
                                    array('property' => 'background', 'selector' => '.grid-item .thumb'),
	                                array('property' => 'text-align', 'label' => esc_html__( 'Text Align', 'ssc' ), 'selector' => '.grid-item .thumb'),
                                    array('property' => 'margin', 'label' => esc_html__( 'Margin', 'ssc' ), 'selector' => '.grid-item .thumb'),
                                    array('property' => 'padding', 'label' => esc_html__( 'Padding', 'ssc' ), 'selector' => '.grid-item .thumb'),
                                    array('property' => 'border', 'label' => esc_html__( 'Border', 'ssc' ), 'selector' => '.grid-item .thumb'),
                                    array('property' => 'border-radius', 'label' => esc_html__( 'Border Radius', 'ssc' ), 'selector' => '.grid-item .thumb'),
                                    array('property' => 'width', 'label' => esc_html__( 'Width', 'ssc' ), 'selector' => '.grid-item .thumb'),
                                    array('property' => 'height', 'label' => esc_html__( 'Height', 'ssc' ), 'selector' => '.grid-item .thumb'),
                                    array('property' => 'float', 'label' => esc_html__( 'Float', 'ssc' ), 'selector' => '.grid-item .thumb'),
                                    array('property' => 'display', 'label' => esc_html__( 'Display', 'ssc' ), 'selector' => '.grid-item .thumb'),
                                    array('property' => 'box-shadow', 'label' => esc_html__( 'Box Shadow', 'ssc' ), 'selector' => '.grid-item .thumb'),
                                    array('property' => 'opacity', 'label' => esc_html__( 'Opacity', 'ssc' ), 'selector' => '.grid-item .thumb'),
                                ),
                                // Image
                                'Image' => array(
                                    array('property' => 'background', 'selector' => '.grid-item .thumb img'),
                                    array('property' => 'margin', 'label' => esc_html__( 'Margin', 'ssc' ), 'selector' => '.grid-item .thumb img'),
                                    array('property' => 'padding', 'label' => esc_html__( 'Padding', 'ssc' ), 'selector' => '.grid-item .thumb img'),
                                    array('property' => 'border', 'label' => esc_html__( 'Border', 'ssc' ), 'selector' => '.grid-item .thumb img'),
                                    array('property' => 'border-radius', 'label' => esc_html__( 'Border Radius', 'ssc' ), 'selector' => '.grid-item .thumb img'),
                                    array('property' => 'width', 'label' => esc_html__( 'Width', 'ssc' ), 'selector' => '.grid-item .thumb img'),
                                    array('property' => 'height', 'label' => esc_html__( 'Height', 'ssc' ), 'selector' => '.grid-item .thumb img'),
                                    array('property' => 'float', 'label' => esc_html__( 'Float', 'ssc' ), 'selector' => '.grid-item .thumb img'),
                                    array('property' => 'display', 'label' => esc_html__( 'Display', 'ssc' ), 'selector' => '.grid-item .thumb img'),
                                    array('property' => 'box-shadow', 'label' => esc_html__( 'Box Shadow', 'ssc' ), 'selector' => '.grid-item .thumb img'),
                                    array('property' => 'opacity', 'label' => esc_html__( 'Opacity', 'ssc' ), 'selector' => '.grid-item .thumb img'),
                                ),
                                // Onsale
                                'Onsale' => array(
//	                                array('property' => 'position', 'label' => esc_html__('Position','ssc' ), 'selector' => '.grid-item .onsale'),
	                                array('property' => 'top', 'label' => esc_html__('Top (with px or %)','ssc' ), 'selector' => '.grid-item .onsale'),
	                                array('property' => 'right', 'label' => esc_html__('Right (with px or %)','ssc' ), 'selector' => '.grid-item .onsale'),
	                                array('property' => 'bottom', 'label' => esc_html__('Bottom (with px or %)','ssc' ), 'selector' => '.grid-item .onsale'),
	                                array('property' => 'left', 'label' => esc_html__('Left (with px or %)','ssc' ), 'selector' => '.grid-item .onsale'),
	                                array('property' => 'color', 'label' => esc_html__( 'Color', 'ssc' ), 'selector' => '.grid-item .onsale'),
                                    array('property' => 'background', 'selector' => '.grid-item .onsale'),
                                    array('property' => 'margin', 'label' => esc_html__( 'Margin', 'ssc' ), 'selector' => '.grid-item .onsale'),
                                    array('property' => 'padding', 'label' => esc_html__( 'Padding', 'ssc' ), 'selector' => '.grid-item .onsale'),
                                    array('property' => 'border', 'label' => esc_html__( 'Border', 'ssc' ), 'selector' => '.grid-item .onsale'),
                                    array('property' => 'border-radius', 'label' => esc_html__( 'Border Radius', 'ssc' ), 'selector' => '.grid-item .onsale'),
                                    array('property' => 'width', 'label' => esc_html__( 'Width', 'ssc' ), 'selector' => '.grid-item .onsale'),
                                    array('property' => 'height', 'label' => esc_html__( 'Height', 'ssc' ), 'selector' => '.grid-item .onsale'),
//                                    array('property' => 'float', 'label' => esc_html__( 'Float', 'ssc' ), 'selector' => '.grid-item .onsale'),
                                    array('property' => 'display', 'label' => esc_html__( 'Display', 'ssc' ), 'selector' => '.grid-item .onsale'),
                                    array('property' => 'box-shadow', 'label' => esc_html__( 'Box Shadow', 'ssc' ), 'selector' => '.grid-item .onsale'),
                                    array('property' => 'opacity', 'label' => esc_html__( 'Opacity', 'ssc' ), 'selector' => '.grid-item .onsale'),
	                                array('property' => 'font-size', 'label' => esc_html__( 'Font Size', 'ssc' ), 'selector' => '.grid-item .onsale'),
	                                array('property' => 'line-height', 'label' => esc_html__( 'Line Height', 'ssc' ), 'selector' => '.grid-item .onsale'),
	                                array('property' => 'font-weight', 'label' => esc_html__( 'Font Weight', 'ssc' ), 'selector' => '.grid-item .onsale'),
	                                array('property' => 'font-style', 'label' => esc_html__( 'Font Style', 'ssc' ), 'selector' => '.grid-item .onsale'),
	                                array('property' => 'font-family', 'label' => esc_html__( 'Font Family', 'ssc' ), 'selector' => '.grid-item .onsale'),
	                                array('property' => 'text-align', 'label' => esc_html__( 'Text Align', 'ssc' ), 'selector' => '.grid-item .onsale'),
	                                array('property' => 'text-shadow', 'label' => esc_html__( 'Text Shadow', 'ssc' ), 'selector' => '.grid-item .onsale'),
	                                array('property' => 'text-transform', 'label' => esc_html__( 'Text Transform', 'ssc' ), 'selector' => '.grid-item .onsale'),
	                                array('property' => 'text-decoration', 'label' => esc_html__( 'Text Decoration', 'ssc' ), 'selector' => '.grid-item .onsale'),
	                                array('property' => 'letter-spacing', 'label' => esc_html__( 'Letter Spacing', 'ssc' ), 'selector' => '.grid-item .onsale'),
	                                array('property' => 'overflow', 'label' => esc_html__( 'Overflow', 'ssc' ), 'selector' => '.grid-item .onsale'),
	                                array('property' => 'word-break', 'label' => esc_html__( 'Word Break', 'ssc' ), 'selector' => '.grid-item .onsale'),
                                ),
                                // Overlay
                                'Overlay' => array(
                                    array('property' => 'background', 'selector' => '.grid-item .over'),
                                    array('property' => 'margin', 'label' => esc_html__( 'Margin', 'ssc' ), 'selector' => '.grid-item .over'),
                                    array('property' => 'padding', 'label' => esc_html__( 'Padding', 'ssc' ), 'selector' => '.grid-item .over'),
                                    array('property' => 'border', 'label' => esc_html__( 'Border', 'ssc' ), 'selector' => '.grid-item .over'),
                                    array('property' => 'border-radius', 'label' => esc_html__( 'Border Radius', 'ssc' ), 'selector' => '.grid-item .over'),
                                    array('property' => 'width', 'label' => esc_html__( 'Width', 'ssc' ), 'selector' => '.grid-item .over'),
                                    array('property' => 'height', 'label' => esc_html__( 'Height', 'ssc' ), 'selector' => '.grid-item .over'),
                                    array('property' => 'float', 'label' => esc_html__( 'Float', 'ssc' ), 'selector' => '.grid-item .over'),
                                    array('property' => 'display', 'label' => esc_html__( 'Display', 'ssc' ), 'selector' => '.grid-item .over'),
                                    array('property' => 'box-shadow', 'label' => esc_html__( 'Box Shadow', 'ssc' ), 'selector' => '.grid-item .over'),
                                    array('property' => 'opacity', 'label' => esc_html__( 'Opacity', 'ssc' ), 'selector' => '.grid-item .over'),
                                ),
                                'Star Rating' => array(
	                                array('property' => 'color', 'label' => esc_html__('Color', 'ssc' ), 'selector' => '.star-rating'),
	                                array('property' => 'background-color', 'label' => esc_html__('Background Color', 'ssc' ), 'selector' => '.star-rating'),
	                                array('property' => 'font-size', 'label' => esc_html__('Font Size', 'ssc' ), 'selector' => '.star-rating'),
	                                array('property' => 'display', 'label' => esc_html__( 'Display', 'ssc' ), 'selector' => '.star-rating'),
	                                array('property' => 'float', 'label' => esc_html__( 'Float', 'ssc' ), 'selector' => '.star-rating'),
	                                array('property' => 'border', 'label' => esc_html__('Border', 'ssc' ), 'selector' => '.star-rating'),
	                                array('property' => 'border-radius', 'label' => esc_html__( 'Border Radius', 'ssc' ), 'selector' => '.star-rating'),
	                                array('property' => 'margin', 'label' => esc_html__('Margin', 'ssc' ), 'selector' => '.star-rating'),
	                                array('property' => 'padding', 'label' =>esc_html__( 'Padding', 'ssc' ), 'selector' => '.star-rating')
                                ),
                                // Content Box
                                'Content Box' => array(
                                    array('property' => 'background', 'selector' => '.grid-item .body'),
	                                array('property' => 'text-align', 'label' => esc_html__('Text Align', 'ssc' ), 'selector' => '.grid-item .body'),
	                                array('property' => 'vertical-align', 'label' => 'Vertical Align', 'selector' => '.grid-item .body'),
                                    array('property' => 'margin', 'label' => esc_html__( 'Margin', 'ssc' ), 'selector' => '.grid-item .body'),
                                    array('property' => 'padding', 'label' => esc_html__( 'Padding', 'ssc' ), 'selector' => '.grid-item .body'),
                                    array('property' => 'border', 'label' => esc_html__( 'Border', 'ssc' ), 'selector' => '.grid-item .body'),
                                    array('property' => 'border-radius', 'label' => esc_html__( 'Border Radius', 'ssc' ), 'selector' => '.grid-item .body'),
                                    array('property' => 'width', 'label' => esc_html__( 'Width', 'ssc' ), 'selector' => '.grid-item .body'),
                                    array('property' => 'height', 'label' => esc_html__( 'Height', 'ssc' ), 'selector' => '.grid-item .body'),
	                                array('property' => 'text-align', 'label' => esc_html__('Text Align', 'ssc' ), 'selector' => '.grid-item .body'),
                                    array('property' => 'float', 'label' => esc_html__( 'Float', 'ssc' ), 'selector' => '.grid-item .body'),
                                    array('property' => 'display', 'label' => esc_html__( 'Display', 'ssc' ), 'selector' => '.grid-item .body'),
                                    array('property' => 'box-shadow', 'label' => esc_html__( 'Box Shadow', 'ssc' ), 'selector' => '.grid-item .body'),
                                    array('property' => 'opacity', 'label' => esc_html__( 'Opacity', 'ssc' ), 'selector' => '.grid-item .body'),
                                ),
                                // Title
                                'Title' => array(
                                    array('property' => 'background', 'selector' => '.grid-item .title a'),
                                    array('property' => 'color', 'label' => esc_html__( 'Color', 'ssc' ), 'selector' => '.grid-item .title a'),
                                    array('property' => 'font-size', 'label' => esc_html__( 'Font Size', 'ssc' ), 'selector' => '.grid-item .title a'),
                                    array('property' => 'line-height', 'label' => esc_html__( 'Line Height', 'ssc' ), 'selector' => '.grid-item .title a'),
                                    array('property' => 'font-weight', 'label' => esc_html__( 'Font Weight', 'ssc' ), 'selector' => '.grid-item .title a'),
                                    array('property' => 'font-style', 'label' => esc_html__( 'Font Style', 'ssc' ), 'selector' => '.grid-item .title a'),
                                    array('property' => 'font-family', 'label' => esc_html__( 'Font Family', 'ssc' ), 'selector' => '.grid-item .title a'),
                                    array('property' => 'text-align', 'label' => esc_html__( 'Text Align', 'ssc' ), 'selector' => '.grid-item .title a'),
                                    array('property' => 'text-shadow', 'label' => esc_html__( 'Text Shadow', 'ssc' ), 'selector' => '.grid-item .title a'),
                                    array('property' => 'text-transform', 'label' => esc_html__( 'Text Transform', 'ssc' ), 'selector' => '.grid-item .title a'),
                                    array('property' => 'text-decoration', 'label' => esc_html__( 'Text Decoration', 'ssc' ), 'selector' => '.grid-item .title a'),
                                    array('property' => 'letter-spacing', 'label' => esc_html__( 'Letter Spacing', 'ssc' ), 'selector' => '.grid-item .title a'),
                                    array('property' => 'overflow', 'label' => esc_html__( 'Overflow', 'ssc' ), 'selector' => '.grid-item .title a'),
	                                array('property' => 'float', 'label' => esc_html__( 'Float', 'ssc' ), 'selector' => '.grid-item .title a'),
	                                array('property' => 'display', 'label' => esc_html__( 'Display', 'ssc' ), 'selector' => '.grid-item .title a'),
                                    array('property' => 'word-break', 'label' => esc_html__( 'Word Break', 'ssc' ), 'selector' => '.grid-item .title a'),
                                    array('property' => 'margin', 'label' => esc_html__( 'Margin', 'ssc' ), 'selector' => '.grid-item .title a'),
                                    array('property' => 'padding', 'label' => esc_html__( 'Padding', 'ssc' ), 'selector' => '.grid-item .title a'),
                                    array('property' => 'border', 'label' => esc_html__( 'Border', 'ssc' ), 'selector' => '.grid-item .title a'),
                                    array('property' => 'border-radius', 'label' => esc_html__( 'Border Radius', 'ssc' ), 'selector' => '.grid-item .title a'),
                                ),
	                            // Price
                                'Price' => array(
	                                array('property' => 'color', 'label' => esc_html__( 'Color', 'ssc' ), 'selector' => '.grid-item .price'),
	                                array('property' => 'background', 'selector' => '.grid-item .price'),
	                                array('property' => 'margin', 'label' => esc_html__( 'Margin', 'ssc' ), 'selector' => '.grid-item .price'),
	                                array('property' => 'padding', 'label' => esc_html__( 'Padding', 'ssc' ), 'selector' => '.grid-item .price'),
	                                array('property' => 'border', 'label' => esc_html__( 'Border', 'ssc' ), 'selector' => '.grid-item .price'),
	                                array('property' => 'border-radius', 'label' => esc_html__( 'Border Radius', 'ssc' ), 'selector' => '.grid-item .price'),
	                                array('property' => 'width', 'label' => esc_html__( 'Width', 'ssc' ), 'selector' => '.grid-item .price'),
	                                array('property' => 'height', 'label' => esc_html__( 'Height', 'ssc' ), 'selector' => '.grid-item .price'),
//                                    array('property' => 'float', 'label' => esc_html__( 'Float', 'ssc' ), 'selector' => '.grid-item .price'),
	                                array('property' => 'display', 'label' => esc_html__( 'Display', 'ssc' ), 'selector' => '.grid-item .price'),
	                                array('property' => 'box-shadow', 'label' => esc_html__( 'Box Shadow', 'ssc' ), 'selector' => '.grid-item .price'),
	                                array('property' => 'opacity', 'label' => esc_html__( 'Opacity', 'ssc' ), 'selector' => '.grid-item .price'),
	                                array('property' => 'font-size', 'label' => esc_html__( 'Font Size', 'ssc' ), 'selector' => '.grid-item .price'),
	                                array('property' => 'line-height', 'label' => esc_html__( 'Line Height', 'ssc' ), 'selector' => '.grid-item .price'),
	                                array('property' => 'font-weight', 'label' => esc_html__( 'Font Weight', 'ssc' ), 'selector' => '.grid-item .price'),
	                                array('property' => 'font-style', 'label' => esc_html__( 'Font Style', 'ssc' ), 'selector' => '.grid-item .price'),
	                                array('property' => 'font-family', 'label' => esc_html__( 'Font Family', 'ssc' ), 'selector' => '.grid-item .price'),
	                                array('property' => 'text-align', 'label' => esc_html__( 'Text Align', 'ssc' ), 'selector' => '.grid-item .price'),
	                                array('property' => 'text-shadow', 'label' => esc_html__( 'Text Shadow', 'ssc' ), 'selector' => '.grid-item .price'),
	                                array('property' => 'text-transform', 'label' => esc_html__( 'Text Transform', 'ssc' ), 'selector' => '.grid-item .price'),
	                                array('property' => 'text-decoration', 'label' => esc_html__( 'Text Decoration', 'ssc' ), 'selector' => '.grid-item .price'),
	                                array('property' => 'letter-spacing', 'label' => esc_html__( 'Letter Spacing', 'ssc' ), 'selector' => '.grid-item .price'),
	                                array('property' => 'overflow', 'label' => esc_html__( 'Overflow', 'ssc' ), 'selector' => '.grid-item .price'),
	                                array('property' => 'word-break', 'label' => esc_html__( 'Word Break', 'ssc' ), 'selector' => '.grid-item .price'),
                                ),
	                            // On sale Price
                                'Removed Price' => array(
	                                array('property' => 'color', 'label' => esc_html__( 'Color', 'ssc' ), 'selector' => '.grid-item .price del'),
	                                array('property' => 'background', 'selector' => '.grid-item .price del'),
	                                array('property' => 'margin', 'label' => esc_html__( 'Margin', 'ssc' ), 'selector' => '.grid-item .price del'),
	                                array('property' => 'padding', 'label' => esc_html__( 'Padding', 'ssc' ), 'selector' => '.grid-item .price del'),
	                                array('property' => 'border', 'label' => esc_html__( 'Border', 'ssc' ), 'selector' => '.grid-item .price del'),
	                                array('property' => 'border-radius', 'label' => esc_html__( 'Border Radius', 'ssc' ), 'selector' => '.grid-item .price del'),
	                                array('property' => 'width', 'label' => esc_html__( 'Width', 'ssc' ), 'selector' => '.grid-item .price del'),
	                                array('property' => 'height', 'label' => esc_html__( 'Height', 'ssc' ), 'selector' => '.grid-item .price del'),
//                                    array('property' => 'float', 'label' => esc_html__( 'Float', 'ssc' ), 'selector' => '.grid-item .price del'),
	                                array('property' => 'display', 'label' => esc_html__( 'Display', 'ssc' ), 'selector' => '.grid-item .price del'),
	                                array('property' => 'box-shadow', 'label' => esc_html__( 'Box Shadow', 'ssc' ), 'selector' => '.grid-item .price del'),
	                                array('property' => 'opacity', 'label' => esc_html__( 'Opacity', 'ssc' ), 'selector' => '.grid-item .price del'),
	                                array('property' => 'font-size', 'label' => esc_html__( 'Font Size', 'ssc' ), 'selector' => '.grid-item .price del'),
	                                array('property' => 'line-height', 'label' => esc_html__( 'Line Height', 'ssc' ), 'selector' => '.grid-item .price del'),
	                                array('property' => 'font-weight', 'label' => esc_html__( 'Font Weight', 'ssc' ), 'selector' => '.grid-item .price del'),
	                                array('property' => 'font-style', 'label' => esc_html__( 'Font Style', 'ssc' ), 'selector' => '.grid-item .price del'),
	                                array('property' => 'font-family', 'label' => esc_html__( 'Font Family', 'ssc' ), 'selector' => '.grid-item .price del'),
	                                array('property' => 'text-align', 'label' => esc_html__( 'Text Align', 'ssc' ), 'selector' => '.grid-item .price del'),
	                                array('property' => 'text-shadow', 'label' => esc_html__( 'Text Shadow', 'ssc' ), 'selector' => '.grid-item .price del'),
	                                array('property' => 'text-transform', 'label' => esc_html__( 'Text Transform', 'ssc' ), 'selector' => '.grid-item .price del'),
	                                array('property' => 'text-decoration', 'label' => esc_html__( 'Text Decoration', 'ssc' ), 'selector' => '.grid-item .price del'),
	                                array('property' => 'letter-spacing', 'label' => esc_html__( 'Letter Spacing', 'ssc' ), 'selector' => '.grid-item .price del'),
	                                array('property' => 'overflow', 'label' => esc_html__( 'Overflow', 'ssc' ), 'selector' => '.grid-item .price del'),
	                                array('property' => 'word-break', 'label' => esc_html__( 'Word Break', 'ssc' ), 'selector' => '.grid-item .price del'),
                                ),
                                'Actual Price' => array(
	                                array('property' => 'color', 'label' => esc_html__( 'Color', 'ssc' ), 'selector' => '.grid-item .price ins'),
	                                array('property' => 'background', 'selector' => '.grid-item .price ins'),
	                                array('property' => 'margin', 'label' => esc_html__( 'Margin', 'ssc' ), 'selector' => '.grid-item .price ins'),
	                                array('property' => 'padding', 'label' => esc_html__( 'Padding', 'ssc' ), 'selector' => '.grid-item .price ins'),
	                                array('property' => 'border', 'label' => esc_html__( 'Border', 'ssc' ), 'selector' => '.grid-item .price ins'),
	                                array('property' => 'border-radius', 'label' => esc_html__( 'Border Radius', 'ssc' ), 'selector' => '.grid-item .price ins'),
	                                array('property' => 'width', 'label' => esc_html__( 'Width', 'ssc' ), 'selector' => '.grid-item .price ins'),
	                                array('property' => 'height', 'label' => esc_html__( 'Height', 'ssc' ), 'selector' => '.grid-item .price ins'),
//                                    array('property' => 'float', 'label' => esc_html__( 'Float', 'ssc' ), 'selector' => '.grid-item .price ins'),
	                                array('property' => 'display', 'label' => esc_html__( 'Display', 'ssc' ), 'selector' => '.grid-item .price ins'),
	                                array('property' => 'box-shadow', 'label' => esc_html__( 'Box Shadow', 'ssc' ), 'selector' => '.grid-item .price ins'),
	                                array('property' => 'opacity', 'label' => esc_html__( 'Opacity', 'ssc' ), 'selector' => '.grid-item .price ins'),
	                                array('property' => 'font-size', 'label' => esc_html__( 'Font Size', 'ssc' ), 'selector' => '.grid-item .price ins'),
	                                array('property' => 'line-height', 'label' => esc_html__( 'Line Height', 'ssc' ), 'selector' => '.grid-item .price ins'),
	                                array('property' => 'font-weight', 'label' => esc_html__( 'Font Weight', 'ssc' ), 'selector' => '.grid-item .price ins'),
	                                array('property' => 'font-style', 'label' => esc_html__( 'Font Style', 'ssc' ), 'selector' => '.grid-item .price ins'),
	                                array('property' => 'font-family', 'label' => esc_html__( 'Font Family', 'ssc' ), 'selector' => '.grid-item .price ins'),
	                                array('property' => 'text-align', 'label' => esc_html__( 'Text Align', 'ssc' ), 'selector' => '.grid-item .price ins'),
	                                array('property' => 'text-shadow', 'label' => esc_html__( 'Text Shadow', 'ssc' ), 'selector' => '.grid-item .price ins'),
	                                array('property' => 'text-transform', 'label' => esc_html__( 'Text Transform', 'ssc' ), 'selector' => '.grid-item .price ins'),
	                                array('property' => 'text-decoration', 'label' => esc_html__( 'Text Decoration', 'ssc' ), 'selector' => '.grid-item .price ins'),
	                                array('property' => 'letter-spacing', 'label' => esc_html__( 'Letter Spacing', 'ssc' ), 'selector' => '.grid-item .price ins'),
	                                array('property' => 'overflow', 'label' => esc_html__( 'Overflow', 'ssc' ), 'selector' => '.grid-item .price ins'),
	                                array('property' => 'word-break', 'label' => esc_html__( 'Word Break', 'ssc' ), 'selector' => '.grid-item .price ins'),
                                ),
                                // Description
                                'Description' => array(
	                                array('property' => 'display', 'label' => esc_html__( 'Display', 'ssc' ), 'selector' => '.grid-item .description'),
                                    array('property' => 'background', 'selector' => '.grid-item .description'),
                                    array('property' => 'color', 'label' => esc_html__( 'Color', 'ssc' ), 'selector' => '.grid-item .description'),
                                    array('property' => 'font-size', 'label' => esc_html__( 'Font Size', 'ssc' ), 'selector' => '.grid-item .description'),
                                    array('property' => 'line-height', 'label' => esc_html__( 'Line Height', 'ssc' ), 'selector' => '.grid-item .description'),
                                    array('property' => 'font-weight', 'label' => esc_html__( 'Font Weight', 'ssc' ), 'selector' => '.grid-item .description'),
                                    array('property' => 'font-style', 'label' => esc_html__( 'Font Style', 'ssc' ), 'selector' => '.grid-item .description'),
                                    array('property' => 'font-family', 'label' => esc_html__( 'Font Family', 'ssc' ), 'selector' => '.grid-item .description'),
                                    array('property' => 'text-align', 'label' => esc_html__( 'Text Align', 'ssc' ), 'selector' => '.grid-item .description'),
                                    array('property' => 'text-shadow', 'label' => esc_html__( 'Text Shadow', 'ssc' ), 'selector' => '.grid-item .description'),
                                    array('property' => 'text-transform', 'label' => esc_html__( 'Text Transform', 'ssc' ), 'selector' => '.grid-item .description'),
                                    array('property' => 'text-decoration', 'label' => esc_html__( 'Text Decoration', 'ssc' ), 'selector' => '.grid-item .description'),
                                    array('property' => 'letter-spacing', 'label' => esc_html__( 'Letter Spacing', 'ssc' ), 'selector' => '.grid-item .description'),
                                    array('property' => 'overflow', 'label' => esc_html__( 'Overflow', 'ssc' ), 'selector' => '.grid-item .description'),
                                    array('property' => 'word-break', 'label' => esc_html__( 'Word Break', 'ssc' ), 'selector' => '.grid-item .description'),
                                    array('property' => 'margin', 'label' => esc_html__( 'Margin', 'ssc' ), 'selector' => '.grid-item .description'),
                                    array('property' => 'padding', 'label' => esc_html__( 'Padding', 'ssc' ), 'selector' => '.grid-item .description'),
                                    array('property' => 'border', 'label' => esc_html__( 'Border', 'ssc' ), 'selector' => '.grid-item .description'),
                                    array('property' => 'border-radius', 'label' => esc_html__( 'Border Radius', 'ssc' ), 'selector' => '.grid-item .description')
                                ),
                                // Add to cart
                                'Add to cart' => array(
                                    array('property' => 'background', 'selector' => '.grid-item .button'),
                                    array('property' => 'color', 'label' => esc_html__( 'Color', 'ssc' ), 'selector' => '.grid-item .button'),
                                    array('property' => 'font-size', 'label' => esc_html__( 'Font Size', 'ssc' ), 'selector' => '.grid-item .button'),
                                    array('property' => 'line-height', 'label' => esc_html__( 'Line Height', 'ssc' ), 'selector' => '.grid-item .button'),
                                    array('property' => 'font-weight', 'label' => esc_html__( 'Font Weight', 'ssc' ), 'selector' => '.grid-item .button'),
                                    array('property' => 'font-style', 'label' => esc_html__( 'Font Style', 'ssc' ), 'selector' => '.grid-item .button'),
                                    array('property' => 'font-family', 'label' => esc_html__( 'Font Family', 'ssc' ), 'selector' => '.grid-item .button'),
                                    array('property' => 'text-align', 'label' => esc_html__( 'Text Align', 'ssc' ), 'selector' => '.grid-item .button'),
                                    array('property' => 'text-shadow', 'label' => esc_html__( 'Text Shadow', 'ssc' ), 'selector' => '.grid-item .button'),
	                                array('property' => 'box-shadow', 'label' => esc_html__( 'Box Shadow', 'ssc' ), 'selector' => '.grid-item .button'),
                                    array('property' => 'text-transform', 'label' => esc_html__( 'Text Transform', 'ssc' ), 'selector' => '.grid-item .button'),
                                    array('property' => 'text-decoration', 'label' => esc_html__( 'Text Decoration', 'ssc' ), 'selector' => '.grid-item .button'),
                                    array('property' => 'letter-spacing', 'label' => esc_html__( 'Letter Spacing', 'ssc' ), 'selector' => '.grid-item .button'),
                                    array('property' => 'display', 'label' => esc_html__( 'Display', 'ssc' ), 'selector' => '.grid-item .button'),
                                    array('property' => 'float', 'label' => esc_html__( 'Float', 'ssc' ), 'selector' => '.grid-item .button'),
                                    array('property' => 'overflow', 'label' => esc_html__( 'Overflow', 'ssc' ), 'selector' => '.grid-item .button'),
                                    array('property' => 'word-break', 'label' => esc_html__( 'Word Break', 'ssc' ), 'selector' => '.grid-item .button'),
                                    array('property' => 'margin', 'label' => esc_html__( 'Margin', 'ssc' ), 'selector' => '.grid-item .button'),
                                    array('property' => 'padding', 'label' => esc_html__( 'Padding', 'ssc' ), 'selector' => '.grid-item .button'),
                                    array('property' => 'border', 'label' => esc_html__( 'Border', 'ssc' ), 'selector' => '.grid-item .button'),
                                    array('property' => 'border-radius', 'label' => esc_html__( 'Border Radius', 'ssc' ), 'selector' => '.grid-item .button')
                                ),
                                // Pagination
                                'Pagination' => array(
                                    array('property' => 'background', 'selector' => '.page-numbers li a, .nav-previous a, .nav-next a'),
                                    array('property' => 'color', 'label' => esc_html__( 'Color', 'ssc' ), 'selector' => '.page-numbers li a, .nav-previous a, .nav-next a'),
                                    array('property' => 'font-size', 'label' => esc_html__( 'Font Size', 'ssc' ), 'selector' => '.page-numbers li a, .nav-previous a, .nav-next a'),
                                    array('property' => 'line-height', 'label' => esc_html__( 'Line Height', 'ssc' ), 'selector' => '.page-numbers li a, .nav-previous a, .nav-next a'),
                                    array('property' => 'font-weight', 'label' => esc_html__( 'Font Weight', 'ssc' ), 'selector' => '.page-numbers li a, .nav-previous a, .nav-next a'),
                                    array('property' => 'font-style', 'label' => esc_html__( 'Font Style', 'ssc' ), 'selector' => '.page-numbers li a, .nav-previous a, .nav-next a'),
                                    array('property' => 'font-family', 'label' => esc_html__( 'Font Family', 'ssc' ), 'selector' => '.page-numbers li a, .nav-previous a, .nav-next a'),
                                    array('property' => 'text-align', 'label' => esc_html__( 'Text Align', 'ssc' ), 'selector' => '.page-numbers li a, .nav-previous a, .nav-next a'),
                                    array('property' => 'text-shadow', 'label' => esc_html__( 'Text Shadow', 'ssc' ), 'selector' => '.page-numbers li a, .nav-previous a, .nav-next a'),
	                                array('property' => 'box-shadow', 'label' => esc_html__( 'Box Shadow', 'ssc' ), 'selector' => '.page-numbers li a, .nav-previous a, .nav-next a'),
                                    array('property' => 'text-transform', 'label' => esc_html__( 'Text Transform', 'ssc' ), 'selector' => '.page-numbers li a, .nav-previous a, .nav-next a'),
                                    array('property' => 'text-decoration', 'label' => esc_html__( 'Text Decoration', 'ssc' ), 'selector' => '.page-numbers li a, .nav-previous a, .nav-next a'),
                                    array('property' => 'letter-spacing', 'label' => esc_html__( 'Letter Spacing', 'ssc' ), 'selector' => '.page-numbers li a, .nav-previous a, .nav-next a'),
                                    array('property' => 'overflow', 'label' => esc_html__( 'Overflow', 'ssc' ), 'selector' => '.page-numbers li a, .nav-previous a, .nav-next a'),
                                    array('property' => 'word-break', 'label' => esc_html__( 'Word Break', 'ssc' ), 'selector' => '.page-numbers li a, .nav-previous a, .nav-next a'),
                                    array('property' => 'margin', 'label' => esc_html__( 'Margin', 'ssc' ), 'selector' => '.page-numbers li a, .nav-previous a, .nav-next a'),
                                    array('property' => 'padding', 'label' => esc_html__( 'Padding', 'ssc' ), 'selector' => '.page-numbers li a, .nav-previous a, .nav-next a'),
                                    array('property' => 'border', 'label' => esc_html__( 'Border', 'ssc' ), 'selector' => '.page-numbers li a, .nav-previous a, .nav-next a'),
                                    array('property' => 'border-radius', 'label' => esc_html__( 'Border Radius', 'ssc' ), 'selector' => '.page-numbers li a, .nav-previous a, .nav-next a')
                                ),
                                // Filter Links
                                'Filter Links' => array(
                                    array('property' => 'background', 'selector' => '.filter li .fbut'),
                                    array('property' => 'color', 'label' => esc_html__( 'Color', 'ssc' ), 'selector' => '.filter li .fbut'),
                                    array('property' => 'color', 'label' => esc_html__( 'Color', 'ssc' ).esc_html__( 'Current', 'ssc' ), 'selector' => '.filter li .fbut.current'),
                                    array('property' => 'font-size', 'label' => esc_html__( 'Font Size', 'ssc' ), 'selector' => '.filter li .fbut'),
                                    array('property' => 'line-height', 'label' => esc_html__( 'Line Height', 'ssc' ), 'selector' => '.filter li .fbut'),
                                    array('property' => 'font-weight', 'label' => esc_html__( 'Font Weight', 'ssc' ), 'selector' => '.filter li .fbut'),
                                    array('property' => 'font-style', 'label' => esc_html__( 'Font Style', 'ssc' ), 'selector' => '.filter li .fbut'),
                                    array('property' => 'font-family', 'label' => esc_html__( 'Font Family', 'ssc' ), 'selector' => '.filter li .fbut'),
                                    array('property' => 'text-align', 'label' => esc_html__( 'Text Align', 'ssc' ), 'selector' => '.filter'),
                                    array('property' => 'text-shadow', 'label' => esc_html__( 'Text Shadow', 'ssc' ), 'selector' => '.filter li .fbut'),
                                    array('property' => 'text-transform', 'label' => esc_html__( 'Text Transform', 'ssc' ), 'selector' => '.filter li .fbut'),
                                    array('property' => 'text-decoration', 'label' => esc_html__( 'Text Decoration', 'ssc' ), 'selector' => '.filter li .fbut'),
                                    array('property' => 'letter-spacing', 'label' => esc_html__( 'Letter Spacing', 'ssc' ), 'selector' => '.filter li .fbut'),
	                                array('property' => 'width', 'label' => 'Width', 'selector' => '.filter'),
	                                array('property' => 'height', 'label' => 'Height', 'selector' => '.filter'),
	                                array('property' => 'max-width', 'label' => 'Max-Width', 'selector' => '.filter'),
                                    array('property' => 'overflow', 'label' => esc_html__( 'Overflow', 'ssc' ), 'selector' => '.filter li .fbut'),
                                    array('property' => 'word-break', 'label' => esc_html__( 'Word Break', 'ssc' ), 'selector' => '.filter li .fbut'),
                                    array('property' => 'margin', 'label' => esc_html__( 'Margin', 'ssc' ), 'selector' => '.filter li .fbut'),
                                    array('property' => 'margin', 'label' => esc_html__( 'Margin Filter Box', 'ssc' ), 'selector' => '.filter'),
                                    array('property' => 'padding', 'label' => esc_html__( 'Padding', 'ssc' ), 'selector' => '.filter li .fbut'),
                                    array('property' => 'border', 'label' => esc_html__( 'Border', 'ssc' ), 'selector' => '.filter li .fbut'),
                                    array('property' => 'border', 'label' => esc_html__( 'Border', 'ssc' ), 'selector' => '.filter li .fbut.current'),
                                    array('property' => 'border-radius', 'label' => esc_html__( 'Border Radius', 'ssc' ), 'selector' => '.filter li .fbut')
                                ),
	                            'Slider' => array(
		                            array(
			                            'property' => 'background-color',
			                            'label'    => esc_html__( 'Slider Background color', 'ssc' ),
			                            'selector' => '.slick-slider',
		                            ),
	                            	// Dots
		                            array(
			                            'property' => 'width',
			                            'label'    => esc_html__( 'Dots Width', 'ssc' ),
			                            'selector' => '.slick-dots li button',
		                            ),
		                            array(
			                            'property' => 'height',
			                            'label'    => esc_html__( 'Dots Height', 'ssc' ),
			                            'selector' => '.slick-dots li button',
		                            ),
		                            array(
			                            'property' => 'background-color',
			                            'label'    => esc_html__( 'Dots Color', 'ssc' ),
			                            'selector' => '.slick-dots li button:before',
		                            ),
		                            array(
			                            'property' => 'background-color',
			                            'label'    => esc_html__( 'Dots Color on Hover and Active', 'ssc' ),
			                            'selector' => '.slick-dots li button:hover:before, .slick-dots li button:focus:before, .slick-dots li.slick-active button:before, .slick-dots li.slick-active button:before',
		                            ),
		                            array(
			                            'property' => 'opacity',
			                            'label'    => esc_html__( 'Dots Opacity', 'ssc' ),
			                            'selector' => '.slick-dots li button:before',
		                            ),
		                            array(
			                            'property' => 'margin',
			                            'label'    => esc_html__( 'Dots Margin', 'ssc' ),
			                            'selector' => '.slick-dots li button:before',
		                            ),
		                            array(
			                            'property' => 'padding',
			                            'label'    => esc_html__( 'Dots Block Padding', 'ssc' ),
			                            'selector' => '.slick-dots',
		                            ),
		                            array(
			                            'property' => 'border-radius',
			                            'label'    => esc_html__( 'Dots Border Radius', 'ssc' ),
			                            'selector' => '.slick-dots li button:before',
		                            ),
		                            array(
			                            'property' => 'border',
			                            'label'    => esc_html__( 'Dots Border', 'ssc' ),
			                            'selector' => '.slick-dots li button:before',
		                            ),
		                            // Arrows
		                            array(
			                            'property' => 'width',
			                            'label'    => esc_html__( 'Arrow Width', 'ssc' ),
			                            'selector' => '.slick-prev, .slick-next',
		                            ),
		                            array(
			                            'property' => 'height',
			                            'label'    => esc_html__( 'Arrow Height', 'ssc' ),
			                            'selector' => '.slick-prev, .slick-next',
		                            ),
		                            array(
			                            'property' => 'color',
			                            'label'    => esc_html__( 'Arrow Color', 'ssc' ),
			                            'selector' => '.slick-prev, .slick-next',
		                            ),
		                            array(
			                            'property' => 'color',
			                            'label'    => esc_html__( 'Arrow Color on hover', 'ssc' ),
			                            'selector' => '.slick-prev:hover, .slick-next:hover',
		                            ),
		                            array(
			                            'property' => 'font-size',
			                            'label'    => esc_html__( 'Arrow Font Size', 'ssc' ),
			                            'selector' => '.slick-prev, .slick-next',
		                            ),
		                            array(
			                            'property' => 'line-height',
			                            'label'    => esc_html__( 'Arrow Line Height', 'ssc' ),
			                            'selector' => '.slick-prev, .slick-next',
		                            ),
		                            array(
			                            'property' => 'background-color',
			                            'label'    => esc_html__( 'Arrow Background Color', 'ssc' ),
			                            'selector' => '.slick-prev, .slick-next',
		                            ),
		                            array(
			                            'property' => 'background-color',
			                            'label'    => esc_html__( 'Arrow Background Color on hover', 'ssc' ),
			                            'selector' => '.slick-prev:hover, .slick-next:hover',
		                            ),
		                            array(
			                            'property' => 'opacity',
			                            'label'    => esc_html__( 'Arrow Opacity', 'ssc' ),
			                            'selector' => '.slick-prev, .slick-next',
		                            ),
		                            array(
			                            'property' => 'font-weight',
			                            'label'    => esc_html__( 'Arrow Font Weight', 'ssc' ),
			                            'selector' => '.slick-prev i:before, .slick-next i:before,',
		                            ),
		                            array(
			                            'property' => 'border',
			                            'label'    => esc_html__( 'Arrow Border', 'ssc' ),
			                            'selector' => '.slick-prev, .slick-next',
		                            ),
		                            array(
			                            'property' => 'border',
			                            'label'    => esc_html__( 'Arrow Border on Hover', 'ssc' ),
			                            'selector' => '.slick-prev:hover, .slick-next:hover',
		                            ),
		                            array(
			                            'property' => 'border-radius',
			                            'label'    => esc_html__( 'Arrow Border radius', 'ssc' ),
			                            'selector' => '.slick-prev, .slick-next',
		                            ),
		                            array(
			                            'property' => 'border-radius',
			                            'label'    => esc_html__( 'Arrow Border radius on hover', 'ssc' ),
			                            'selector' => '.slick-prev:hover, .slick-next:hover',
		                            ),
		                            array(
			                            'property' => 'padding',
			                            'label'    => esc_html__( 'Arrow Padding', 'ssc' ),
			                            'selector' => '.slick-prev, .slick-next',
		                            ),
		                            array(
			                            'property' => 'margin',
			                            'label'    => esc_html__( 'Arrow Margin', 'ssc' ),
			                            'selector' => '.slick-prev, .slick-next',
		                            ),
		                            array('property' => 'fill', 'label' => esc_html__( 'Fill', 'ssc' ), 'selector' => ' .slick-arrow svg'),
		                            array('property' => 'fill', 'label' => esc_html__( 'Fill', 'ssc' ) . ' ' . esc_html__( 'Hover', 'ssc' ), 'selector' => ' .slick-arrow:hover svg'),
		                            array(
			                            'property' => 'width',
			                            'label'    => esc_html__( 'SVG Width', 'ssc' ),
			                            'selector' => '.slick-arrow svg',
		                            ),
		                            array(
			                            'property' => 'height',
			                            'label'    => esc_html__( 'SVG Height', 'ssc' ),
			                            'selector' => '.slick-arrow svg',
		                            ),
	                            ),
                            ),
                        )
                    )
                ),
                esc_html__( 'hover', 'ssc' ) => array(
                    array(
                        'name' => 'hover-css',
                        'label' => esc_html__( 'Hover', 'ssc' ),
                        'type' => 'css',
                        'value' => '', // remove this if you do not need a default content
                        'description' => 'Styles for Hover Condition',
                        'options' => array(
                            array(
                                'screens' => "any,999,768,667,479",
                                'Wrapper' => array(
	                                array('property' => 'background'),
	                                array('property' => 'margin', 'label' => esc_html__( 'Margin', 'ssc' )),
	                                array('property' => 'padding', 'label' => esc_html__( 'Padding', 'ssc' )),
	                                array('property' => 'border', 'label' => esc_html__( 'Border', 'ssc' )),
	                                array('property' => 'border-radius', 'label' => esc_html__( 'Border Radius', 'ssc' )),
	                                array('property' => 'width', 'label' => esc_html__( 'Width', 'ssc' )),
	                                array('property' => 'height', 'label' => esc_html__( 'Height', 'ssc' )),
	                                array('property' => 'float', 'label' => esc_html__( 'Float', 'ssc' )),
	                                array('property' => 'display', 'label' => esc_html__( 'Display', 'ssc' )),
	                                array('property' => 'box-shadow', 'label' => esc_html__( 'Box Shadow', 'ssc' )),
	                                array('property' => 'opacity', 'label' => esc_html__( 'Opacity', 'ssc' )),
                                ),
                                // --> Box
                                'Box' => array(
                                    array('property' => 'background', 'selector' => '.grid-item:hover'),
                                    array('property' => 'margin', 'label' => esc_html__( 'Margin', 'ssc' ), 'selector' => '.grid-item:hover'),
                                    array('property' => 'padding', 'label' => esc_html__( 'Padding', 'ssc' ), 'selector' => '.grid-item:hover'),
                                    array('property' => 'border', 'label' => esc_html__( 'Border', 'ssc' ), 'selector' => '.grid-item:hover'),
                                    array('property' => 'border-radius', 'label' => esc_html__( 'Border Radius', 'ssc' ), 'selector' => '.grid-item:hover'),
                                    array('property' => 'width', 'label' => esc_html__( 'Width', 'ssc' ), 'selector' => '.grid-item:hover'),
                                    array('property' => 'height', 'label' => esc_html__( 'Height', 'ssc' ), 'selector' => '.grid-item:hover'),
                                    array('property' => 'float', 'label' => esc_html__( 'Float', 'ssc' ), 'selector' => '.grid-item:hover'),
                                    array('property' => 'display', 'label' => esc_html__( 'Display', 'ssc' ), 'selector' => '.grid-item:hover'),
                                    array('property' => 'box-shadow', 'label' => esc_html__( 'Box Shadow', 'ssc' ), 'selector' => '.grid-item:hover'),
                                    array('property' => 'opacity', 'label' => esc_html__( 'Opacity', 'ssc' ), 'selector' => '.grid-item:hover'),
                                ),
                                // Box inde the box
                                'Box Inside' => array(
                                    array('property' => 'background', 'selector' => '.grid-item .pbody:hover'),
                                    array('property' => 'margin', 'label' => esc_html__( 'Margin', 'ssc' ), 'selector' => '.grid-item .pbody:hover'),
                                    array('property' => 'padding', 'label' => esc_html__( 'Padding', 'ssc' ), 'selector' => '.grid-item .pbody:hover'),
                                    array('property' => 'border', 'label' => esc_html__( 'Border', 'ssc' ), 'selector' => '.grid-item .pbody:hover'),
                                    array('property' => 'border-radius', 'label' => esc_html__( 'Border Radius', 'ssc' ), 'selector' => '.grid-item .pbody:hover'),
                                    array('property' => 'width', 'label' => esc_html__( 'Width', 'ssc' ), 'selector' => '.grid-item .pbody:hover'),
                                    array('property' => 'height', 'label' => esc_html__( 'Height', 'ssc' ), 'selector' => '.grid-item .pbody:hover'),
                                    array('property' => 'float', 'label' => esc_html__( 'Float', 'ssc' ), 'selector' => '.grid-item .pbody:hover'),
                                    array('property' => 'display', 'label' => esc_html__( 'Display', 'ssc' ), 'selector' => '.grid-item .pbody:hover'),
                                    array('property' => 'box-shadow', 'label' => esc_html__( 'Box Shadow', 'ssc' ), 'selector' => '.grid-item .pbody:hover'),
                                    array('property' => 'opacity', 'label' => esc_html__( 'Opacity', 'ssc' ), 'selector' => '.grid-item .pbody:hover'),
                                ),
                                // Image Box
                                'Image Box' => array(
                                    array('property' => 'background', 'selector' => '.grid-item:hover .thumb'),
                                    array('property' => 'margin', 'label' => esc_html__( 'Margin', 'ssc' ), 'selector' => '.grid-item:hover .thumb'),
                                    array('property' => 'padding', 'label' => esc_html__( 'Padding', 'ssc' ), 'selector' => '.grid-item:hover .thumb'),
                                    array('property' => 'border', 'label' => esc_html__( 'Border', 'ssc' ), 'selector' => '.grid-item:hover .thumb'),
                                    array('property' => 'border-radius', 'label' => esc_html__( 'Border Radius', 'ssc' ), 'selector' => '.grid-item:hover .thumb'),
                                    array('property' => 'width', 'label' => esc_html__( 'Width', 'ssc' ), 'selector' => '.grid-item:hover .thumb'),
                                    array('property' => 'height', 'label' => esc_html__( 'Height', 'ssc' ), 'selector' => '.grid-item:hover .thumb'),
                                    array('property' => 'float', 'label' => esc_html__( 'Float', 'ssc' ), 'selector' => '.grid-item:hover .thumb'),
                                    array('property' => 'display', 'label' => esc_html__( 'Display', 'ssc' ), 'selector' => '.grid-item:hover .thumb'),
                                    array('property' => 'box-shadow', 'label' => esc_html__( 'Box Shadow', 'ssc' ), 'selector' => '.grid-item:hover .thumb'),
                                    array('property' => 'opacity', 'label' => esc_html__( 'Opacity', 'ssc' ), 'selector' => '.grid-item:hover .thumb'),
                                ),
                                // Image
                                'Image' => array(
                                    array('property' => 'background', 'selector' => '.grid-item:hover .thumb img'),
                                    array('property' => 'margin', 'label' => esc_html__( 'Margin', 'ssc' ), 'selector' => '.grid-item:hover .thumb img'),
                                    array('property' => 'padding', 'label' => esc_html__( 'Padding', 'ssc' ), 'selector' => '.grid-item:hover .thumb img'),
                                    array('property' => 'border', 'label' => esc_html__( 'Border', 'ssc' ), 'selector' => '.grid-item:hover .thumb img'),
                                    array('property' => 'border-radius', 'label' => esc_html__( 'Border Radius', 'ssc' ), 'selector' => '.grid-item:hover .thumb img'),
                                    array('property' => 'width', 'label' => esc_html__( 'Width', 'ssc' ), 'selector' => '.grid-item:hover .thumb img'),
                                    array('property' => 'height', 'label' => esc_html__( 'Height', 'ssc' ), 'selector' => '.grid-item:hover .thumb img'),
                                    array('property' => 'float', 'label' => esc_html__( 'Float', 'ssc' ), 'selector' => '.grid-item:hover .thumb img'),
                                    array('property' => 'display', 'label' => esc_html__( 'Display', 'ssc' ), 'selector' => '.grid-item:hover .thumb img'),
                                    array('property' => 'box-shadow', 'label' => esc_html__( 'Box Shadow', 'ssc' ), 'selector' => '.grid-item:hover .thumb img'),
                                    array('property' => 'opacity', 'label' => esc_html__( 'Opacity', 'ssc' ), 'selector' => '.grid-item:hover .thumb img'),
                                ),
	                            // Onsale
                                'Onsale' => array(
//	                                array('property' => 'position', 'label' => esc_html__('Position','ssc' ), 'selector' => '.grid-item:hover .onsale'),
	                                array('property' => 'top', 'label' => esc_html__('Top','ssc' ), 'selector' => '.grid-item:hover .onsale'),
	                                array('property' => 'right', 'label' => esc_html__('Right','ssc' ), 'selector' => '.grid-item:hover .onsale'),
	                                array('property' => 'bottom', 'label' => esc_html__('Bottom','ssc' ), 'selector' => '.grid-item:hover .onsale'),
	                                array('property' => 'left', 'label' => esc_html__('Left','ssc' ), 'selector' => '.grid-item:hover .onsale'),
	                                array('property' => 'color', 'label' => esc_html__( 'Color', 'ssc' ), 'selector' => '.grid-item:hover .onsale'),
	                                array('property' => 'background', 'selector' => '.grid-item:hover .onsale'),
	                                array('property' => 'margin', 'label' => esc_html__( 'Margin', 'ssc' ), 'selector' => '.grid-item:hover .onsale'),
	                                array('property' => 'padding', 'label' => esc_html__( 'Padding', 'ssc' ), 'selector' => '.grid-item:hover .onsale'),
	                                array('property' => 'border', 'label' => esc_html__( 'Border', 'ssc' ), 'selector' => '.grid-item:hover .onsale'),
	                                array('property' => 'border-radius', 'label' => esc_html__( 'Border Radius', 'ssc' ), 'selector' => '.grid-item:hover .onsale'),
	                                array('property' => 'width', 'label' => esc_html__( 'Width', 'ssc' ), 'selector' => '.grid-item:hover .onsale'),
	                                array('property' => 'height', 'label' => esc_html__( 'Height', 'ssc' ), 'selector' => '.grid-item:hover .onsale'),
//                                    array('property' => 'float', 'label' => esc_html__( 'Float', 'ssc' ), 'selector' => '.grid-item:hover .onsale'),
	                                array('property' => 'display', 'label' => esc_html__( 'Display', 'ssc' ), 'selector' => '.grid-item:hover .onsale'),
	                                array('property' => 'box-shadow', 'label' => esc_html__( 'Box Shadow', 'ssc' ), 'selector' => '.grid-item:hover .onsale'),
	                                array('property' => 'opacity', 'label' => esc_html__( 'Opacity', 'ssc' ), 'selector' => '.grid-item:hover .onsale'),
	                                array('property' => 'font-size', 'label' => esc_html__( 'Font Size', 'ssc' ), 'selector' => '.grid-item:hover .onsale'),
	                                array('property' => 'line-height', 'label' => esc_html__( 'Line Height', 'ssc' ), 'selector' => '.grid-item:hover .onsale'),
	                                array('property' => 'font-weight', 'label' => esc_html__( 'Font Weight', 'ssc' ), 'selector' => '.grid-item:hover .onsale'),
	                                array('property' => 'font-style', 'label' => esc_html__( 'Font Style', 'ssc' ), 'selector' => '.grid-item:hover .onsale'),
	                                array('property' => 'font-family', 'label' => esc_html__( 'Font Family', 'ssc' ), 'selector' => '.grid-item:hover .onsale'),
	                                array('property' => 'text-align', 'label' => esc_html__( 'Text Align', 'ssc' ), 'selector' => '.grid-item:hover .onsale'),
	                                array('property' => 'text-shadow', 'label' => esc_html__( 'Text Shadow', 'ssc' ), 'selector' => '.grid-item:hover .onsale'),
	                                array('property' => 'text-transform', 'label' => esc_html__( 'Text Transform', 'ssc' ), 'selector' => '.grid-item:hover .onsale'),
	                                array('property' => 'text-decoration', 'label' => esc_html__( 'Text Decoration', 'ssc' ), 'selector' => '.grid-item:hover .onsale'),
	                                array('property' => 'letter-spacing', 'label' => esc_html__( 'Letter Spacing', 'ssc' ), 'selector' => '.grid-item:hover .onsale'),
	                                array('property' => 'overflow', 'label' => esc_html__( 'Overflow', 'ssc' ), 'selector' => '.grid-item:hover .onsale'),
	                                array('property' => 'word-break', 'label' => esc_html__( 'Word Break', 'ssc' ), 'selector' => '.grid-item:hover .onsale'),
                                ),
                                // Overlay
                                'Overlay' => array(
                                    array('property' => 'background', 'selector' => '.grid-item:hover .over'),
                                    array('property' => 'margin', 'label' => esc_html__( 'Margin', 'ssc' ), 'selector' => '.grid-item:hover .over'),
                                    array('property' => 'padding', 'label' => esc_html__( 'Padding', 'ssc' ), 'selector' => '.grid-item:hover .over'),
                                    array('property' => 'border', 'label' => esc_html__( 'Border', 'ssc' ), 'selector' => '.grid-item:hover .over'),
                                    array('property' => 'border-radius', 'label' => esc_html__( 'Border Radius', 'ssc' ), 'selector' => '.grid-item:hover .over'),
                                    array('property' => 'width', 'label' => esc_html__( 'Width', 'ssc' ), 'selector' => '.grid-item:hover .over'),
                                    array('property' => 'height', 'label' => esc_html__( 'Height', 'ssc' ), 'selector' => '.grid-item:hover .over'),
                                    array('property' => 'float', 'label' => esc_html__( 'Float', 'ssc' ), 'selector' => '.grid-item:hover .over'),
                                    array('property' => 'display', 'label' => esc_html__( 'Display', 'ssc' ), 'selector' => '.grid-item:hover .over'),
                                    array('property' => 'box-shadow', 'label' => esc_html__( 'Box Shadow', 'ssc' ), 'selector' => '.grid-item:hover .over'),
                                    array('property' => 'opacity', 'label' => esc_html__( 'Opacity', 'ssc' ), 'selector' => '.grid-item:hover .over'),
                                ),
                                'Star Rating' => array(
	                                array('property' => 'background-color', 'label' => esc_html__('Background Color', 'ssc' ), 'selector' => '.grid-item:hover .star-rating'),
	                                array('property' => 'font-size', 'label' => esc_html__('Font Size', 'ssc' ), 'selector' => '.grid-item:hover .star-rating'),
	                                array('property' => 'border', 'label' => esc_html__('Border', 'ssc' ), 'selector' => '.grid-item:hover .star-rating'),
	                                array('property' => 'border-radius', 'label' => esc_html__( 'Border Radius', 'ssc' ), 'selector' => '.grid-item:hover .star-rating'),
	                                array('property' => 'margin', 'label' => esc_html__('Margin', 'ssc' ), 'selector' => '.grid-item:hover .star-rating'),
	                                array('property' => 'padding', 'label' =>esc_html__( 'Padding', 'ssc' ), 'selector' => '.grid-item:hover .star-rating')
                                ),
                                // Content Box
                                'Content Box' => array(
                                    array('property' => 'background', 'selector' => '.grid-item:hover .body'),
                                    array('property' => 'margin', 'label' => esc_html__( 'Margin', 'ssc' ), 'selector' => '.grid-item:hover .body'),
                                    array('property' => 'padding', 'label' => esc_html__( 'Padding', 'ssc' ), 'selector' => '.grid-item:hover .body'),
                                    array('property' => 'border', 'label' => esc_html__( 'Border', 'ssc' ), 'selector' => '.grid-item:hover .body'),
                                    array('property' => 'border-radius', 'label' => esc_html__( 'Border Radius', 'ssc' ), 'selector' => '.grid-item:hover .body'),
                                    array('property' => 'width', 'label' => esc_html__( 'Width', 'ssc' ), 'selector' => '.grid-item:hover .body'),
                                    array('property' => 'height', 'label' => esc_html__( 'Height', 'ssc' ), 'selector' => '.grid-item:hover .body'),
                                    array('property' => 'float', 'label' => esc_html__( 'Float', 'ssc' ), 'selector' => '.grid-item:hover .body'),
                                    array('property' => 'display', 'label' => esc_html__( 'Display', 'ssc' ), 'selector' => '.grid-item:hover .body'),
                                    array('property' => 'box-shadow', 'label' => esc_html__( 'Box Shadow', 'ssc' ), 'selector' => '.grid-item:hover .body'),
                                    array('property' => 'opacity', 'label' => esc_html__( 'Opacity', 'ssc' ), 'selector' => '.grid-item:hover .body'),
                                ),
                                // Title
                                'Title' => array(
                                    array('property' => 'background', 'selector' => '.grid-item .title a:hover'),
                                    array('property' => 'color', 'label' => esc_html__( 'Color', 'ssc' ), 'selector' => '.grid-item .title a:hover'),
                                    array('property' => 'color', 'label' => esc_html__( 'Color when block hover', 'ssc' ), 'selector' => '.grid-item:hover .title a'),
                                    array('property' => 'font-size', 'label' => esc_html__( 'Font Size', 'ssc' ), 'selector' => '.grid-item .title a:hover'),
                                    array('property' => 'line-height', 'label' => esc_html__( 'Line Height', 'ssc' ), 'selector' => '.grid-item .title a:hover'),
                                    array('property' => 'font-weight', 'label' => esc_html__( 'Font Weight', 'ssc' ), 'selector' => '.grid-item .title a:hover'),
                                    array('property' => 'font-style', 'label' => esc_html__( 'Font Style', 'ssc' ), 'selector' => '.grid-item .title a:hover'),
                                    array('property' => 'font-family', 'label' => esc_html__( 'Font Family', 'ssc' ), 'selector' => '.grid-item .title a:hover'),
                                    array('property' => 'text-align', 'label' => esc_html__( 'Text Align', 'ssc' ), 'selector' => '.grid-item .title a:hover'),
                                    array('property' => 'text-shadow', 'label' => esc_html__( 'Text Shadow', 'ssc' ), 'selector' => '.grid-item .title a:hover'),
                                    array('property' => 'text-transform', 'label' => esc_html__( 'Text Transform', 'ssc' ), 'selector' => '.grid-item .title a:hover'),
                                    array('property' => 'text-decoration', 'label' => esc_html__( 'Text Decoration', 'ssc' ), 'selector' => '.grid-item .title a:hover'),
                                    array('property' => 'letter-spacing', 'label' => esc_html__( 'Letter Spacing', 'ssc' ), 'selector' => '.grid-item .title a:hover'),
                                    array('property' => 'overflow', 'label' => esc_html__( 'Overflow', 'ssc' ), 'selector' => '.grid-item .title a:hover'),
                                    array('property' => 'word-break', 'label' => esc_html__( 'Word Break', 'ssc' ), 'selector' => '.grid-item .title a:hover'),
                                    array('property' => 'margin', 'label' => esc_html__( 'Margin', 'ssc' ), 'selector' => '.grid-item .title a:hover'),
                                    array('property' => 'padding', 'label' => esc_html__( 'Padding', 'ssc' ), 'selector' => '.grid-item .title a:hover'),
                                    array('property' => 'border', 'label' => esc_html__( 'Border', 'ssc' ), 'selector' => '.grid-item .title a:hover'),
                                    array('property' => 'border-radius', 'label' => esc_html__( 'Border Radius', 'ssc' ), 'selector' => '.grid-item .title a:hover'),
                                ),
	                            // Price
                                'Price' => array(
	                                array('property' => 'background', 'selector' => '.grid-item .price:hover'),
	                                array('property' => 'margin', 'label' => esc_html__( 'Margin', 'ssc' ), 'selector' => '.grid-item .price:hover'),
	                                array('property' => 'padding', 'label' => esc_html__( 'Padding', 'ssc' ), 'selector' => '.grid-item .price:hover'),
	                                array('property' => 'border', 'label' => esc_html__( 'Border', 'ssc' ), 'selector' => '.grid-item .price:hover'),
	                                array('property' => 'border-radius', 'label' => esc_html__( 'Border Radius', 'ssc' ), 'selector' => '.grid-item .price:hover'),
	                                array('property' => 'width', 'label' => esc_html__( 'Width', 'ssc' ), 'selector' => '.grid-item .price:hover'),
	                                array('property' => 'height', 'label' => esc_html__( 'Height', 'ssc' ), 'selector' => '.grid-item .price:hover'),
//                                    array('property' => 'float', 'label' => esc_html__( 'Float', 'ssc' ), 'selector' => '.grid-item .price:hover'),
	                                array('property' => 'display', 'label' => esc_html__( 'Display', 'ssc' ), 'selector' => '.grid-item .price:hover'),
	                                array('property' => 'box-shadow', 'label' => esc_html__( 'Box Shadow', 'ssc' ), 'selector' => '.grid-item .price:hover'),
	                                array('property' => 'opacity', 'label' => esc_html__( 'Opacity', 'ssc' ), 'selector' => '.grid-item .price:hover'),
	                                array('property' => 'font-size', 'label' => esc_html__( 'Font Size', 'ssc' ), 'selector' => '.grid-item .price:hover'),
	                                array('property' => 'line-height', 'label' => esc_html__( 'Line Height', 'ssc' ), 'selector' => '.grid-item .price:hover'),
	                                array('property' => 'font-weight', 'label' => esc_html__( 'Font Weight', 'ssc' ), 'selector' => '.grid-item .price:hover'),
	                                array('property' => 'font-style', 'label' => esc_html__( 'Font Style', 'ssc' ), 'selector' => '.grid-item .price:hover'),
	                                array('property' => 'font-family', 'label' => esc_html__( 'Font Family', 'ssc' ), 'selector' => '.grid-item .price:hover'),
	                                array('property' => 'text-align', 'label' => esc_html__( 'Text Align', 'ssc' ), 'selector' => '.grid-item .price:hover'),
	                                array('property' => 'text-shadow', 'label' => esc_html__( 'Text Shadow', 'ssc' ), 'selector' => '.grid-item .price:hover'),
	                                array('property' => 'text-transform', 'label' => esc_html__( 'Text Transform', 'ssc' ), 'selector' => '.grid-item .price:hover'),
	                                array('property' => 'text-decoration', 'label' => esc_html__( 'Text Decoration', 'ssc' ), 'selector' => '.grid-item .price:hover'),
	                                array('property' => 'letter-spacing', 'label' => esc_html__( 'Letter Spacing', 'ssc' ), 'selector' => '.grid-item .price:hover'),
	                                array('property' => 'overflow', 'label' => esc_html__( 'Overflow', 'ssc' ), 'selector' => '.grid-item .price:hover'),
	                                array('property' => 'word-break', 'label' => esc_html__( 'Word Break', 'ssc' ), 'selector' => '.grid-item .price:hover'),
                                ),
	                            // On sale Price
                                'Removed Price' => array(
	                                array('property' => 'background', 'selector' => '.grid-item .price:hover del'),
	                                array('property' => 'margin', 'label' => esc_html__( 'Margin', 'ssc' ), 'selector' => '.grid-item .price:hover del'),
	                                array('property' => 'padding', 'label' => esc_html__( 'Padding', 'ssc' ), 'selector' => '.grid-item .price:hover del'),
	                                array('property' => 'border', 'label' => esc_html__( 'Border', 'ssc' ), 'selector' => '.grid-item .price:hover del'),
	                                array('property' => 'border-radius', 'label' => esc_html__( 'Border Radius', 'ssc' ), 'selector' => '.grid-item .price:hover del'),
	                                array('property' => 'width', 'label' => esc_html__( 'Width', 'ssc' ), 'selector' => '.grid-item .price:hover del'),
	                                array('property' => 'height', 'label' => esc_html__( 'Height', 'ssc' ), 'selector' => '.grid-item .price:hover del'),
//                                    array('property' => 'float', 'label' => esc_html__( 'Float', 'ssc' ), 'selector' => '.grid-item .price:hover del'),
	                                array('property' => 'display', 'label' => esc_html__( 'Display', 'ssc' ), 'selector' => '.grid-item .price:hover del'),
	                                array('property' => 'box-shadow', 'label' => esc_html__( 'Box Shadow', 'ssc' ), 'selector' => '.grid-item .price:hover del'),
	                                array('property' => 'opacity', 'label' => esc_html__( 'Opacity', 'ssc' ), 'selector' => '.grid-item .price:hover del'),
	                                array('property' => 'font-size', 'label' => esc_html__( 'Font Size', 'ssc' ), 'selector' => '.grid-item .price:hover del'),
	                                array('property' => 'line-height', 'label' => esc_html__( 'Line Height', 'ssc' ), 'selector' => '.grid-item .price:hover del'),
	                                array('property' => 'font-weight', 'label' => esc_html__( 'Font Weight', 'ssc' ), 'selector' => '.grid-item .price:hover del'),
	                                array('property' => 'font-style', 'label' => esc_html__( 'Font Style', 'ssc' ), 'selector' => '.grid-item .price:hover del'),
	                                array('property' => 'font-family', 'label' => esc_html__( 'Font Family', 'ssc' ), 'selector' => '.grid-item .price:hover del'),
	                                array('property' => 'text-align', 'label' => esc_html__( 'Text Align', 'ssc' ), 'selector' => '.grid-item .price:hover del'),
	                                array('property' => 'text-shadow', 'label' => esc_html__( 'Text Shadow', 'ssc' ), 'selector' => '.grid-item .price:hover del'),
	                                array('property' => 'text-transform', 'label' => esc_html__( 'Text Transform', 'ssc' ), 'selector' => '.grid-item .price:hover del'),
	                                array('property' => 'text-decoration', 'label' => esc_html__( 'Text Decoration', 'ssc' ), 'selector' => '.grid-item .price:hover del'),
	                                array('property' => 'letter-spacing', 'label' => esc_html__( 'Letter Spacing', 'ssc' ), 'selector' => '.grid-item .price:hover del'),
	                                array('property' => 'overflow', 'label' => esc_html__( 'Overflow', 'ssc' ), 'selector' => '.grid-item .price:hover del'),
	                                array('property' => 'word-break', 'label' => esc_html__( 'Word Break', 'ssc' ), 'selector' => '.grid-item .price:hover del'),
                                ),
                                'Actual Price' => array(
	                                array('property' => 'background', 'selector' => '.grid-item .price:hover ins'),
	                                array('property' => 'margin', 'label' => esc_html__( 'Margin', 'ssc' ), 'selector' => '.grid-item .price:hover ins'),
	                                array('property' => 'padding', 'label' => esc_html__( 'Padding', 'ssc' ), 'selector' => '.grid-item .price:hover ins'),
	                                array('property' => 'border', 'label' => esc_html__( 'Border', 'ssc' ), 'selector' => '.grid-item .price:hover ins'),
	                                array('property' => 'border-radius', 'label' => esc_html__( 'Border Radius', 'ssc' ), 'selector' => '.grid-item .price:hover ins'),
	                                array('property' => 'width', 'label' => esc_html__( 'Width', 'ssc' ), 'selector' => '.grid-item .price:hover ins'),
	                                array('property' => 'height', 'label' => esc_html__( 'Height', 'ssc' ), 'selector' => '.grid-item .price:hover ins'),
//                                    array('property' => 'float', 'label' => esc_html__( 'Float', 'ssc' ), 'selector' => '.grid-item .price:hover ins'),
	                                array('property' => 'display', 'label' => esc_html__( 'Display', 'ssc' ), 'selector' => '.grid-item .price:hover ins'),
	                                array('property' => 'box-shadow', 'label' => esc_html__( 'Box Shadow', 'ssc' ), 'selector' => '.grid-item .price:hover ins'),
	                                array('property' => 'opacity', 'label' => esc_html__( 'Opacity', 'ssc' ), 'selector' => '.grid-item .price:hover ins'),
	                                array('property' => 'font-size', 'label' => esc_html__( 'Font Size', 'ssc' ), 'selector' => '.grid-item .price:hover ins'),
	                                array('property' => 'line-height', 'label' => esc_html__( 'Line Height', 'ssc' ), 'selector' => '.grid-item .price:hover ins'),
	                                array('property' => 'font-weight', 'label' => esc_html__( 'Font Weight', 'ssc' ), 'selector' => '.grid-item .price:hover ins'),
	                                array('property' => 'font-style', 'label' => esc_html__( 'Font Style', 'ssc' ), 'selector' => '.grid-item .price:hover ins'),
	                                array('property' => 'font-family', 'label' => esc_html__( 'Font Family', 'ssc' ), 'selector' => '.grid-item .price:hover ins'),
	                                array('property' => 'text-align', 'label' => esc_html__( 'Text Align', 'ssc' ), 'selector' => '.grid-item .price:hover ins'),
	                                array('property' => 'text-shadow', 'label' => esc_html__( 'Text Shadow', 'ssc' ), 'selector' => '.grid-item .price:hover ins'),
	                                array('property' => 'text-transform', 'label' => esc_html__( 'Text Transform', 'ssc' ), 'selector' => '.grid-item .price:hover ins'),
	                                array('property' => 'text-decoration', 'label' => esc_html__( 'Text Decoration', 'ssc' ), 'selector' => '.grid-item .price:hover ins'),
	                                array('property' => 'letter-spacing', 'label' => esc_html__( 'Letter Spacing', 'ssc' ), 'selector' => '.grid-item .price:hover ins'),
	                                array('property' => 'overflow', 'label' => esc_html__( 'Overflow', 'ssc' ), 'selector' => '.grid-item .price:hover ins'),
	                                array('property' => 'word-break', 'label' => esc_html__( 'Word Break', 'ssc' ), 'selector' => '.grid-item .price:hover ins'),
                                ),
                                // Description
                                'Description' => array(
	                                array('property' => 'display', 'label' => esc_html__( 'Display', 'ssc' ), 'selector' => 'grid-item:hover .description'),
                                    array('property' => 'background', 'selector' => '.grid-item:hover .description'),
                                    array('property' => 'color', 'label' => esc_html__( 'Color', 'ssc' ), 'selector' => '.grid-item:hover .description'),
                                    array('property' => 'font-size', 'label' => esc_html__( 'Font Size', 'ssc' ), 'selector' => '.grid-item:hover .description'),
                                    array('property' => 'line-height', 'label' => esc_html__( 'Line Height', 'ssc' ), 'selector' => '.grid-item:hover .description'),
                                    array('property' => 'font-weight', 'label' => esc_html__( 'Font Weight', 'ssc' ), 'selector' => '.grid-item:hover .description'),
                                    array('property' => 'font-style', 'label' => esc_html__( 'Font Style', 'ssc' ), 'selector' => '.grid-item:hover .description'),
                                    array('property' => 'font-family', 'label' => esc_html__( 'Font Family', 'ssc' ), 'selector' => '.grid-item:hover .description'),
                                    array('property' => 'text-align', 'label' => esc_html__( 'Text Align', 'ssc' ), 'selector' => '.grid-item:hover .description'),
                                    array('property' => 'text-shadow', 'label' => esc_html__( 'Text Shadow', 'ssc' ), 'selector' => '.grid-item:hover .description'),
                                    array('property' => 'text-transform', 'label' => esc_html__( 'Text Transform', 'ssc' ), 'selector' => '.grid-item:hover .description'),
                                    array('property' => 'text-decoration', 'label' => esc_html__( 'Text Decoration', 'ssc' ), 'selector' => '.grid-item:hover .description'),
                                    array('property' => 'letter-spacing', 'label' => esc_html__( 'Letter Spacing', 'ssc' ), 'selector' => '.grid-item:hover .description'),
                                    array('property' => 'overflow', 'label' => esc_html__( 'Overflow', 'ssc' ), 'selector' => '.grid-item:hover .description'),
                                    array('property' => 'word-break', 'label' => esc_html__( 'Word Break', 'ssc' ), 'selector' => '.grid-item:hover .description'),
                                    array('property' => 'margin', 'label' => esc_html__( 'Margin', 'ssc' ), 'selector' => '.grid-item:hover .description'),
                                    array('property' => 'padding', 'label' => esc_html__( 'Padding', 'ssc' ), 'selector' => '.grid-item:hover .description'),
                                    array('property' => 'border', 'label' => esc_html__( 'Border', 'ssc' ), 'selector' => '.grid-item:hover .description'),
                                    array('property' => 'border-radius', 'label' => esc_html__( 'Border Radius', 'ssc' ), 'selector' => '.grid-item:hover .description')
                                ),
                                // Add to cart
                                'Add to cart' => array(
	                                array('property' => 'background', 'selector' => '.grid-item .button:hover'),
	                                array('property' => 'background', 'selector' => '.grid-item:hover .grid-item .button'),
	                                array('property' => 'color', 'label' => esc_html__( 'Color', 'ssc' ), 'selector' => '.grid-item .button:hover'),
	                                array('property' => 'color', 'label' => esc_html__( 'Color when block hover', 'ssc' ), 'selector' => '.grid-item:hover .grid-item .button'),
	                                array('property' => 'font-size', 'label' => esc_html__( 'Font Size', 'ssc' ), 'selector' => '.grid-item .button:hover'),
	                                array('property' => 'line-height', 'label' => esc_html__( 'Line Height', 'ssc' ), 'selector' => '.grid-item .button:hover'),
	                                array('property' => 'font-weight', 'label' => esc_html__( 'Font Weight', 'ssc' ), 'selector' => '.grid-item .button:hover'),
	                                array('property' => 'font-style', 'label' => esc_html__( 'Font Style', 'ssc' ), 'selector' => '.grid-item .button:hover'),
	                                array('property' => 'font-family', 'label' => esc_html__( 'Font Family', 'ssc' ), 'selector' => '.grid-item .button:hover'),
	                                array('property' => 'text-align', 'label' => esc_html__( 'Text Align', 'ssc' ), 'selector' => '.grid-item .button:hover'),
	                                array('property' => 'text-shadow', 'label' => esc_html__( 'Text Shadow', 'ssc' ), 'selector' => '.grid-item .button:hover'),
	                                array('property' => 'box-shadow', 'label' => esc_html__( 'Box Shadow', 'ssc' ), 'selector' => '.grid-item .button:hover'),
	                                array('property' => 'text-transform', 'label' => esc_html__( 'Text Transform', 'ssc' ), 'selector' => '.grid-item .button:hover'),
	                                array('property' => 'text-decoration', 'label' => esc_html__( 'Text Decoration', 'ssc' ), 'selector' => '.grid-item .button:hover'),
	                                array('property' => 'letter-spacing', 'label' => esc_html__( 'Letter Spacing', 'ssc' ), 'selector' => '.grid-item .button:hover'),
	                                array('property' => 'display', 'label' => esc_html__( 'Display', 'ssc' ), 'selector' => '.grid-item .button:hover'),
	                                array('property' => 'float', 'label' => esc_html__( 'Float', 'ssc' ), 'selector' => '.grid-item .button:hover'),
	                                array('property' => 'overflow', 'label' => esc_html__( 'Overflow', 'ssc' ), 'selector' => '.grid-item .button:hover'),
	                                array('property' => 'word-break', 'label' => esc_html__( 'Word Break', 'ssc' ), 'selector' => '.grid-item .button:hover'),
	                                array('property' => 'margin', 'label' => esc_html__( 'Margin', 'ssc' ), 'selector' => '.grid-item .button:hover'),
	                                array('property' => 'padding', 'label' => esc_html__( 'Padding', 'ssc' ), 'selector' => '.grid-item .button:hover'),
	                                array('property' => 'border', 'label' => esc_html__( 'Border', 'ssc' ), 'selector' => '.grid-item .button:hover'),
	                                array('property' => 'border-radius', 'label' => esc_html__( 'Border Radius', 'ssc' ), 'selector' => '.grid-item .button:hover')
                                ),
	                            // Pagination
                                'Pagination' => array(
	                                array('property' => 'background', 'selector' => '.page-numbers li a:hover, .nav-previous a:hover, .nav-next a:hover'),
	                                array('property' => 'color', 'label' => esc_html__( 'Color', 'ssc' ), 'selector' => '.page-numbers li a:hover, .nav-previous a:hover, .nav-next a:hover'),
	                                array('property' => 'font-size', 'label' => esc_html__( 'Font Size', 'ssc' ), 'selector' => '.page-numbers li a:hover, .nav-previous a:hover, .nav-next a:hover'),
	                                array('property' => 'line-height', 'label' => esc_html__( 'Line Height', 'ssc' ), 'selector' => '.page-numbers li a:hover, .nav-previous a:hover, .nav-next a:hover'),
	                                array('property' => 'font-weight', 'label' => esc_html__( 'Font Weight', 'ssc' ), 'selector' => '.page-numbers li a:hover, .nav-previous a:hover, .nav-next a:hover'),
	                                array('property' => 'font-style', 'label' => esc_html__( 'Font Style', 'ssc' ), 'selector' => '.page-numbers li a:hover, .nav-previous a:hover, .nav-next a:hover'),
	                                array('property' => 'font-family', 'label' => esc_html__( 'Font Family', 'ssc' ), 'selector' => '.page-numbers li a:hover, .nav-previous a:hover, .nav-next a:hover'),
	                                array('property' => 'text-align', 'label' => esc_html__( 'Text Align', 'ssc' ), 'selector' => '.page-numbers li a:hover, .nav-previous a:hover, .nav-next a:hover'),
	                                array('property' => 'text-shadow', 'label' => esc_html__( 'Text Shadow', 'ssc' ), 'selector' => '.page-numbers li a:hover, .nav-previous a:hover, .nav-next a:hover'),
	                                array('property' => 'box-shadow', 'label' => esc_html__( 'Box Shadow', 'ssc' ), 'selector' => '.page-numbers li a:hover, .nav-previous a:hover, .nav-next a:hover'),
	                                array('property' => 'text-transform', 'label' => esc_html__( 'Text Transform', 'ssc' ), 'selector' => '.page-numbers li a:hover, .nav-previous a:hover, .nav-next a:hover'),
	                                array('property' => 'text-decoration', 'label' => esc_html__( 'Text Decoration', 'ssc' ), 'selector' => '.page-numbers li a:hover, .nav-previous a:hover, .nav-next a:hover'),
	                                array('property' => 'letter-spacing', 'label' => esc_html__( 'Letter Spacing', 'ssc' ), 'selector' => '.page-numbers li a:hover, .nav-previous a:hover, .nav-next a:hover'),
	                                array('property' => 'overflow', 'label' => esc_html__( 'Overflow', 'ssc' ), 'selector' => '.page-numbers li a:hover, .nav-previous a:hover, .nav-next a:hover'),
	                                array('property' => 'word-break', 'label' => esc_html__( 'Word Break', 'ssc' ), 'selector' => '.page-numbers li a:hover, .nav-previous a:hover, .nav-next a:hover'),
	                                array('property' => 'margin', 'label' => esc_html__( 'Margin', 'ssc' ), 'selector' => '.page-numbers li a:hover, .nav-previous a:hover, .nav-next a:hover'),
	                                array('property' => 'padding', 'label' => esc_html__( 'Padding', 'ssc' ), 'selector' => '.page-numbers li a:hover, .nav-previous a:hover, .nav-next a:hover'),
	                                array('property' => 'border', 'label' => esc_html__( 'Border', 'ssc' ), 'selector' => '.page-numbers li a:hover, .nav-previous a:hover, .nav-next a:hover'),
	                                array('property' => 'border-radius', 'label' => esc_html__( 'Border Radius', 'ssc' ), 'selector' => '.page-numbers li a:hover, .nav-previous a:hover, .nav-next a:hover')
                                ),
                                // Filter Links
                                'Filter Links' => array(
                                    array('property' => 'background', 'selector' => '.filter li .fbut:hover'),
                                    array('property' => 'color', 'label' => esc_html__( 'Color', 'ssc' ), 'selector' => '.filter li .fbut:hover'),
                                    array('property' => 'font-size', 'label' => esc_html__( 'Font Size', 'ssc' ), 'selector' => '.filter li .fbut:hover'),
                                    array('property' => 'line-height', 'label' => esc_html__( 'Line Height', 'ssc' ), 'selector' => '.filter li .fbut:hover'),
                                    array('property' => 'font-weight', 'label' => esc_html__( 'Font Weight', 'ssc' ), 'selector' => '.filter li .fbut:hover'),
                                    array('property' => 'font-style', 'label' => esc_html__( 'Font Style', 'ssc' ), 'selector' => '.filter li .fbut:hover'),
                                    array('property' => 'font-family', 'label' => esc_html__( 'Font Family', 'ssc' ), 'selector' => '.filter li .fbut:hover'),
                                    array('property' => 'text-align', 'label' => esc_html__( 'Text Align', 'ssc' ), 'selector' => '.filter li .fbut:hover'),
                                    array('property' => 'text-shadow', 'label' => esc_html__( 'Text Shadow', 'ssc' ), 'selector' => '.filter li .fbut:hover'),
                                    array('property' => 'text-transform', 'label' => esc_html__( 'Text Transform', 'ssc' ), 'selector' => '.filter li .fbut:hover'),
                                    array('property' => 'text-decoration', 'label' => esc_html__( 'Text Decoration', 'ssc' ), 'selector' => '.filter li .fbut:hover'),
                                    array('property' => 'letter-spacing', 'label' => esc_html__( 'Letter Spacing', 'ssc' ), 'selector' => '.filter li .fbut:hover'),
                                    array('property' => 'overflow', 'label' => esc_html__( 'Overflow', 'ssc' ), 'selector' => '.filter li .fbut:hover'),
                                    array('property' => 'word-break', 'label' => esc_html__( 'Word Break', 'ssc' ), 'selector' => '.filter li .fbut:hover'),
                                    array('property' => 'margin', 'label' => esc_html__( 'Margin', 'ssc' ), 'selector' => '.filter li .fbut:hover'),
                                    array('property' => 'padding', 'label' => esc_html__( 'Padding', 'ssc' ), 'selector' => '.filter li .fbut:hover'),
                                    array('property' => 'border', 'label' => esc_html__( 'Border', 'ssc' ), 'selector' => '.filter li .fbut:hover'),
                                    array('property' => 'border-radius', 'label' => esc_html__( 'Border Radius', 'ssc' ), 'selector' => '.filter li .fbut:hover')
                                ),
                            ),
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
        )
    ));
}
// Register Shortcode
function ssc_productgrid_shortcode($atts, $content = null) {
	$thumbnail = $meta2 = $grid_settings = $grid_type = '';
    extract(shortcode_atts(array(
        'grid_type' => 'masonry', //  +
        'template' => '1', //+
        'items' => 12,
        'show_pagination' => 'yes',//+
        'navi_type' => 'numbers',//+
        'prev' => esc_html__( 'Older Products', 'ssc' ),//+
        'next' => esc_html__( 'Never Products', 'ssc' ),//+
        'ior' => 3, //+
        'limit_d_lines' => 20,//+
        'limit_t_lines' => 2,//+
        'show_thumb' => 'yes',//+
	    'thumb_size' => 'full',
        'custom_thumb_size' => '400x200',
        'show_thumb_zoom' => 'yes',
        'monocolored' => 'yes',
        'strength' => 0,
        'hover_effect' => 'none',
        'filter_type' => 'tags', //+
        'withtags' => '',
        'order' => '', //+
        'orderby' => '', //+
	    'show_onsale' => 'yes',
	    'onsale_text' => esc_html__('Sale!', 'ssc'),
//        'show_title' => 'yes',
        'show_price' => 'yes',
        'show_rating' => 'yes',
        'show_add' => 'yes',
        'add_text' => esc_html__( 'Buy', 'ssc' ),
        'show_filters' => 'yes',
        'all' => esc_html__( 'All products', 'ssc' ), //+
        'el_class' => '',//+
        'd_items' => 4,
	    't_items' => 2,
	    'm_items' => 1,
	    'scroll' => 4,
	    'dots' => 'yes',
	    'arrows' => 'no',
	    'iconleft' => 'fa-arrow-left',
	    'iconright' => 'fa-arrow-right',
        'arrows_type'   => 'icon',
        'l_svg'         => '',
        'r_svg'         => '',
    ), $atts));

	$wrp_classes = apply_filters('kc-el-class', $atts);

	if( (int)$template >= 20 ){
		$grid_type = 'ssc-slick';
		$dots = ( 'yes' == $dots ) ? true : false;
		$p_arrow = '';
		$n_arow = '';
		switch ( $arrows ) {
			case 'yes':
				switch ( $arrows_type ) {
					case 'svg':
						if ( '' !== $l_svg || '' !== $r_svg ) {
							if ( '' !== $l_svg ) {
								$p_arrow = '<button type="button" class="slick-prev">' . ssc_process_svg( $l_svg ) . '</button>';
							}
							if ( '' !== $r_svg ) {
								$n_arow = '<button type="button" class="slick-next">' . ssc_process_svg( $r_svg ) . '</button>';
							}
						}
						break;
					default:
						$p_arrow = '<button type="button" class="slick-prev"><i class="' . $iconleft . '"></i></button>';
						$n_arow  = '<button type="button" class="slick-next"><i class="' . $iconright . '"></i></button>';
				}
				break;
		}

		$settings = json_encode(
			array(
				'slidesToShow'   => $d_items,
				'slidesToScroll' => $scroll,
				'dots'           => $dots,
				'prevArrow'      => $p_arrow,
				'nextArrow'      => $n_arow,
				'tabletBreakpoint' => 769,
				'tabletSlidesToShow' => $t_items,
				'mobileBreakpoint' => 480,
				'mobileSlidesToShow' => $m_items,
			)
		);
		$grid_settings = "data-ssc-slick-settings='$settings' data-ssc-grid-type='$grid_type'";

		kc_js_callback( 'kc_front.ssc_slick' );

	}  else {

		wp_enqueue_script( 'isotope', SSC_URL . 'js/isotope.pkgd.min.js',
			array( 'jquery' ),
			false,
			true );
		wp_enqueue_script( 'imagesloaded' );

		if ( $grid_type === 'grid' ) {

			$settings = json_encode(
				array(
					'layoutMode' => 'fitRows',
				)
			);
			$grid_settings = "data-ssc-grid-settings='$settings' data-ssc-grid-type='$grid_type'";

			kc_js_callback( 'kc_front.ssc_isotope' );
		} elseif ( $grid_type === 'masonry' ) {

			$settings = json_encode(
				array(
					'layoutMode' => 'masonry',
				)
			);
			$grid_settings = "data-ssc-masonry-settings='$settings' data-ssc-grid-type='$grid_type'";

			kc_js_callback( 'kc_front.ssc_masonry' );
		}
	}

    $output = '';
//    extract($atts);




    // Variables
    $post_type = 'product';
    $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

    if( $atts['items'] == 0 ){
        $atts['items'] = -1;
    }
    $intaglist=implode("", preg_split("/:([A-Za-z0-9]+)/", $withtags, -1, PREG_SPLIT_NO_EMPTY));

    $args = array(
        'post_type' 		=> $post_type,
        'posts_per_page' 	=> $atts['items'],
        'orderby'           => $orderby,
        'order' 			=> $order,
        'paged'             => $paged,
        'tag' => $intaglist,
        'ignore_sticky_posts'  => true,

    );

//	$the_query = new WC_Product_Query( $args );
//	$list_products = $the_query->get_products();
//	$pcount = $list_products->max_num_pages;

	$the_query = new WP_Query( $args );

	$list_products = $the_query->posts;
	$pcount = $the_query->max_num_pages;

    $sel = implode('.', $wrp_classes);

	if (empty($monocolored) ) {$strength = '0';}

	$mainID = $grid_type;

    $output .= '<div  class="ssc-products-grid ' . implode(' ', $wrp_classes) . ' col' . $ior.' items'.$items. ' template'.$template.' ' . $el_class . '">';

    if ( $list_products ) {

	    // FILTER
	    if($show_filters === 'yes') {
		    if ($filter_type === 'cats') {

			    $postIDs = wp_list_pluck( $list_products, 'ID' );

			    if (!empty($postIDs) && !is_wp_error($postIDs)) {
				    $cats = wp_get_object_terms($postIDs, 'product_cat');
				    if (!empty($cats) && !is_wp_error($cats)) {
					    $all_w = '';
					    if($all != '') {$all_w = '<li><button class="fbut current" data-filter="*">'.$all.'</button></li>';}
					    $output .= '<ul class="filter fgroup">'.$all_w;
					    foreach($cats as $cat) {
						    $output .= '<li><button class="fbut" data-filter=".' . esc_html( str_replace( ' ', '-', $cat->name ) ) . '">'.$cat->name.'</button></li>';
					    }
					    $output .= '</ul>';
				    }
			    }


		    } elseif ($filter_type === 'tags') {

			    $postIDs = wp_list_pluck( $list_products, 'ID' );

			    if (!empty($postIDs) && !is_wp_error($postIDs)) {
				    $tags = wp_get_object_terms($postIDs, 'product_tag');
				    if (!empty($tags) && !is_wp_error($tags)) {
					    $all_w = '';
					    if($all != '') {$all_w = '<li><button class="fbut current" data-filter="*">'.$all.'</button></li>';}
					    $output .= '<ul class="filter fgroup">'.$all_w;
					    foreach($tags as $tag) {
						    $output .= '<li><button class="fbut" data-filter=".' . esc_html( str_replace( ' ', '-', $tag->name ) ) . '">'.$tag->name.'</button></li>';
					    }
					    $output .= '</ul>';
				    }
			    }

		    }

	    }
	    // FILTER END

	    $size = '';
		if( '' !== $thumb_size ){
			if( 'custom_size' == $thumb_size && '' !== $custom_thumb_size ){
				$size = ssc_get_img_sizes_array_from_string( $custom_thumb_size );
//		    $attachment_data[] 		= wp_get_attachment_image_src( $image_id, $cs );
			} else {
				$size = $thumb_size;
//				$attachment_data[] 		= image_downsize( $image_id, $thumb_size );
			}
		}

	    $output .= '<div class="'.$mainID.'" ' . $grid_settings . '>';
	    // TEMPLATES
	    /*
	     * %1$s - $filter_class_list
	     * %2$s - $hover_effect
	     * %3$s - $thumbnail
	     * %4$s - $title
	     * %5$s - $rating
	     * %6$s - $price
	     * %7$s - $myexcept
	     * %8$s - $add_button
	     * %9$s - $onsale
	    */

	    switch ( $template ) {
		    case '1':
//			    $size = 'atiframebuilder_thumb';
//				$dummy = 'images/grid600.gif';
//			    if ($grid_type === 'masonry') {
//				    $size = 'atiframebuilder_masonry600';
//			    }
//			    if ($ior === '1' ) {
//				    $size = 'atiframebuilder_long';
//			    }
			    $out_temp = '<div class="grid-item %1$s %2$s "> %9$s <div class="pbody">
                <div class="thumb"> %3$s
                <div class="over"><div class="pgtab"><div class="body"> %4$s %5$s %6$s %7$s %8$s </div></div></div>
                </div></div>
            </div>';
			    break;
		    case '2':
//			    $size = 'atiframebuilder_rectangle';
//				$dummy = 'images/grid600350.gif';
//			    if ($ior === '1' ) {
//				    $size = 'atiframebuilder_long';
//			    }
			    if ($show_thumb === 'yes') {
				    wp_enqueue_script('prettyPhoto');
				    wp_enqueue_style( 'prettyPhoto' );
			    }
			    $out_temp = '<div class="grid-item %1$s %2$s ">%9$s<div class="pbody">
                <div class="thumb"> %3$s </div>
                <div class="body"> %4$s %5$s %6$s %7$s %8$s </div>
                </div>
            </div>';
			    break;
		    case '3':
//			    $size = 'atiframebuilder_longhalf';
//				$dummy = 'images/grid585.gif';
//			    if ($ior === '1' ) {
//				    $size = 'atiframebuilder_long';
//			    }
			    if ($show_thumb === 'yes') {
				    wp_enqueue_script('prettyPhoto');
				    wp_enqueue_style( 'prettyPhoto' );
			    }
			    $out_temp = '<div class="grid-item %1$s %2$s "><div class="pbody"> 
                %4$s %5$s %6$s
                <div class="thumb"> %9$s %3$s </div>
                <div class="body"> %7$s %8$s </div>
                </div>
            </div>';
			    break;
		    case '4':
//			    $size = 'atiframebuilder_thumb_300';
//				$dummy = 'images/grid300.gif';
			    $out_temp = '<div class="grid-item %1$s %2$s ">%9$s<div class="pbody">
                <div class="thumb"> %3$s </div>
                <div class="body"> %4$s %5$s %6$s %7$s %8$s </div>
                </div>
            </div>';
			    break;
		    case '5':
//			    $size = 'atiframebuilder_rectangle';
//				$dummy = 'images/grid600350.gif';
//			    if ($ior === '1' ) {
//				    $size = 'atiframebuilder_long';
//			    }
			    if ($show_thumb === 'yes') {
				    wp_enqueue_script('prettyPhoto');
				    wp_enqueue_style( 'prettyPhoto' );
			    }
			    $out_temp = '
	            <div class="grid-item %1$s %2$s ">%9$s<div class="pbody">
	                    <div class="thumb"> %3$s </div>
	                    <div class="body"> %4$s %6$s %7$s </div>
	                    <div class="metaline"> %5$s %8$s </div>
	            </div></div>';
			    break;
		    case '6':
//			    $size = 'atiframebuilder_longhalf';
//				$dummy = 'images/grid585.gif';
//			    if ($ior === '1' ) {
//				    $size = 'atiframebuilder_long';
//			    }
			    if ($show_thumb === 'yes') {
				    wp_enqueue_script('prettyPhoto');
				    wp_enqueue_style( 'prettyPhoto' );
			    }
			    $out_temp = '
	            <div class="grid-item %1$s %2$s ">%9$s
	            	<div class="pbody">
	                    <div class="thumb"> %3$s %4$s</div>
	                    <div class="body"> %5$s %6$s %7$s %8$s </div>
	                </div>
	            </div>';
			    break;
		    case '7':
//			    $size = 'atiframebuilder_masonry';
//				$dummy = 'images/mas600.gif';
//			    if ($grid_type === 'masonry') {
//				    $size = 'atiframebuilder_masonry600';
//			    }
//			    if ($ior === '1' ) {
//				    $size = 'atiframebuilder_long';
//			    }
			    $out_temp = '<div class="grid-item %1$s %2$s ">%9$s<div class="pbody">
	                <div class="thumb"> %3$s </div>
	                <div class="over"><div class="t"><div class="c"> %4$s %5$s %6$s %7$s %8$s </div></div></div></div>
            	</div>';
			    break;
		    case '8':
//			    $size = 'atiframebuilder_thumb';
//				$dummy = 'images/grid600.gif';
//			    if ($grid_type === 'masonry') {
//				    $size = 'atiframebuilder_masonry600';
//			    }
//			    if ($ior === '1' ) {
//				    $size = 'atiframebuilder_long';
//			    }
			    if ($show_thumb === 'yes') {
				    wp_enqueue_script('prettyPhoto');
				    wp_enqueue_style( 'prettyPhoto' );
			    }
			    $out_temp = '<div class="grid-item %1$s %2$s ">%9$s<div class="pbody">
                <div class="thumb"> %3$s 
                <div class="over"><div class="pgtab"><div class="body"> %4$s %5$s %6$s %7$s %8$s </div></div></div>
                </div></div>
            </div>';
			    break;
//		    case '9':
//			    $size = 'atiframebuilder_rectangle';
//			    $dummy = 'images/grid600350.gif';
//			    if ($ior === '1' ) {
//				    $size = 'atiframebuilder_long';
//			    }
//			    if ($show_thumb === 'yes') {
//				    wp_enqueue_script('prettyPhoto');
//				    wp_enqueue_style( 'prettyPhoto' );
//			    }
//			    $out_temp = '<div class="grid-item %1$s %2$s ">%9$s<div class="pbody">
//                <div class="thumb"> %3$s </div>
//                <div class="body"> %4$s %5$s %6$s %7$s %8$s </div>
//                </div>
//            </div>';
//			    break;
		    case '10':
//			    $size = 'atiframebuilder_thumb';
//			    $dummy = 'images/grid600.gif';
//			    if ($grid_type === 'masonry') {
//				    $size = 'atiframebuilder_masonry600';
//			    }
//			    if ($ior === '1' ) {
//				    $size = 'atiframebuilder_long';
//			    }
			    $out_temp = '<div class="grid-item %1$s %2$s ">%9$s<div class="pbody">
	                <div class="thumb"> %3$s </div>
	                <div class="over"><div class="t"><div class="c"> %4$s %5$s %6$s %7$s %8$s </div></div></div></div>
            	</div>';
			    break;
		    case '11':
//			    $size = 'atiframebuilder_longhalf';
//			    $dummy = 'images/grid585.gif';
//			    if ($ior === '1' ) {
//				    $size = 'atiframebuilder_long';
//			    }
			    if ($show_thumb === 'yes') {
				    wp_enqueue_script('prettyPhoto');
				    wp_enqueue_style( 'prettyPhoto' );
			    }
			    $out_temp = '
	            <div class="grid-item %1$s %2$s ">%9$s
	            	<div class="pbody">
	                    <div class="thumb"> %3$s </div>
	                    <div class="body"> %4$s %5$s %6$s %7$s </div>
	                    <span class="meta">%8$s </span>
	                </div>
	            </div>';
			    break;
		    case '20':
//			    $size = 'atiframebuilder_thumb';
//			    $dummy = 'images/grid600.gif';
//			    if ($ior === '1' ) {
//				    $size = 'atiframebuilder_long';
//			    }
			    $out_temp = '<div class="grid-item  %1$s %2$s ">%9$s<div class="pbody">
	                <div class="thumb"> %3$s </div>
	                <div class="over"><div class="t"><div class="c"> %4$s %5$s %6$s %7$s %8$s </div></div></div></div>
            	</div>';
			    break;
		    default:
//			    $size = 'atiframebuilder_thumb';
//			    $dummy = 'images/grid600.gif';
			    $out_temp = '<div class="grid-item %1$s %2$s ">%9$s<div class="pbody">
                <div class="thumb"> %3$s
                <div class="over"><div class="pgtab"><div class="body"> %4$s %5$s %6$s %7$s %8$s </div></div></div>
                </div></div>
            </div>';
	    }

//	    if( 'yes' === $lazy_load ){
//		    $ds = '';
//		    $atds = '';
//	    } else {
//		    $ds = array( 'data-src' => '' );
//		    $atds = 'data-src=""';
//	    }


        foreach ( $list_products as $item ) {
	        $myexcept = $thumbnail = $data_lightbox = $add_button = $title = $rating = $price = $onsale = '';
	        $product = wc_get_product($item->ID);
	        $product_id = $product->get_id();

            if ($show_thumb === 'yes') {
	            // Image
	            $image = get_the_post_thumbnail( $product_id, $size );
	            if ('' === $image) {
		            $image = '<img src="'.SSC_URL . 'images/grid600.gif' . '" alt="" />';
	            }
//	            $full_id = get_post_thumbnail_id( $product_id );
	            $full = image_downsize( get_post_thumbnail_id( $product_id ), 'full' );
//	            $full = get_the_post_thumbnail_url( $product_id, 'full' );
                if ($template === '2' || $template === '3' || $template === '5' || $template === '6' || $template === '9') {
                    $data_lightbox = 'rel="prettyPhoto" class="kc-pretty-photo"';

                    if ($show_thumb_zoom === 'yes') {
                        $thumbnail = '<a '.$data_lightbox.' href="' . $full[0] . '"><div class="over"><i class="far fa-search-plus"></i></div><span class="thumb mo'.$monocolored.' " style="-webkit-filter: grayscale('.$strength.');filter: grayscale('.$strength.');">' . $image . '</span></a>';
                    } else {
                        $thumbnail = '<span class="mo'.$monocolored.' " style="-webkit-filter: grayscale('.$strength.');filter: grayscale('.$strength.');">' . $image . '</span>';
                    }
                } elseif ($template === '1' || $template === '4' || $template === '7' || $template === '8' || $template === '10'|| $template === '11'|| $template === '20') {
                    $thumbnail = '<span class="mo'.$monocolored.' " style="-webkit-filter: grayscale('.$strength.');filter: grayscale('.$strength.');">' . $image . '</span>';
                }
            }


	        // Elements
	        if( -1 !== $limit_t_lines ) {
		        $title = '<div class="title lines"><a href="' . esc_url( get_permalink( $product_id ) ) . '" class="lines' . $limit_t_lines . '">' . $product->get_name() . '</a></div>';
	        }

	        if( 'yes' === $show_price ){
		        $price = '<div class="price">' . $product->get_price_html() . '</div>';
	        }

	        if( 'yes' === $show_rating ){
		        $rating = wc_get_rating_html($product->get_average_rating()); // WordPress.XSS.EscapeOutput.OutputNotEscaped.
	        }

	        if( 'yes' === $show_add && '' !== $add_text ){

		        $add_button = sprintf( '<a href="%s" data-quantity="%s" class="%s" %s>%s</a>',
			        esc_url( $product->add_to_cart_url() ),
			        1,
			        implode(
				        ' ',
				        array_filter(
					        array(
						        'button',
						        'product_type_' . $product->get_type(),
						        $product->is_purchasable() && $product->is_in_stock() ? 'add_to_cart_button' : '',
						        $product->supports( 'ajax_add_to_cart' ) && $product->is_purchasable() && $product->is_in_stock() ? 'ajax_add_to_cart' : '',
					        )
				        )
			        ),
			        wc_implode_html_attributes( array(
				        'data-product_id'  => $product_id,
				        'data-product_sku' => $product->get_sku(),
				        'aria-label'       => $product->add_to_cart_description(),
				        'rel'              => 'nofollow',
			        ) ),
			        esc_html( $product->add_to_cart_text() )
		        );
	        }
            // Description
            if( !post_password_required( $product_id ) ) {
                if ( -1 < $limit_d_lines ) {
                    $myexcept = '<div class="description lines">' . $product->get_description() . '</div>';
                }
            }

	        if( 'yes' === $show_onsale && '' !== $onsale_text && $product->is_on_sale() ){
		        $onsale = '<span class="onsale">' . $onsale_text . '</span>';
	        }

	        // FILTER
            $filter_class_list = '';
            if($show_filters === 'yes') {
                if($filter_type === 'cats') {
                    $catlist = wp_get_object_terms( $product_id, 'product_cat', array( 'fields' => 'names' ));
//                    if( ! empty($catlist)){
                        if( ! is_wp_error($catlist) ){
//	                        $filter_class_list = implode( ' ', $catlist);
                            foreach( $catlist as $term ){
                                $filter_class_list .= ' ' . str_replace( ' ', '-', $term );
                            }
                        }
//                    }
                } elseif ($filter_type === 'tags') {
                    $taglist = wp_get_object_terms( $product_id, 'product_tag', array( 'fields' => 'names' ));
//                    if( ! empty($taglist)){
                        if( ! is_wp_error($taglist) ){
//	                        $filter_class_list = implode( ' ', $taglist);
                            foreach( $taglist as $term ){
                                $filter_class_list .= ' ' . str_replace( ' ', '-', $term );
                            }
                        }
//                    }
                }
            }



	        $output .= sprintf(
		        $out_temp,
		        $filter_class_list,
		        $hover_effect,
		        $thumbnail,
		        $title,
		        $rating,
		        $price,
		        $myexcept,
		        $add_button,
		        $onsale
	        );

        } // end foreach
    } //end count
    $output .= '</div>'; // id grid/masonry closed

    // PAGINSTION
    $output .= '<div class="clear"></div>';

    if($show_pagination === 'yes' and $navi_type === 'buttons') {
        $output .= '<div class="nav-links clearfix" role="navigation"><div class="">';
        $output .= '<div class="nav-previous alignleft">'.get_next_posts_link( '<i class="nat-arrow-left8"></i> '.esc_html( $prev ), $pcount ).'</div>';
        $output .= '<div class="nav-next alignright">'.get_previous_posts_link( esc_html( $next ) .' <i class="nat-arrow-right8"></i>' ).'</div>';
        $output .= '</div></div>';
    }

    if( $show_pagination === 'yes' and $navi_type === 'numbers' ) {


//	    echo paginate_links( apply_filters( 'woocommerce_pagination_args', array( // WPCS: XSS ok.
//		    'base'         => $base,
//		    'format'       => $format,
//		    'add_args'     => false,
//		    'current'      => max( 1, $current ),
//		    'total'        => $total,
//		    'prev_text'    => '&larr;',
//		    'next_text'    => '&rarr;',
//		    'type'         => 'list',
//		    'end_size'     => 3,
//		    'mid_size'     => 3,
//	    ) ) );

        $output .= '<div class="clearfix" role="navigation"><div class="ssc-products-grid-navigation">'.paginate_links( array(
                'show_all'     => false,
                'total'        => $pcount,
                'current'      => max( 1, $paged ),
                'type'         => 'list',
                'end_size'     => 3,
                'mid_size'     => 3,
                'prev_next'    => false,
                'add_args'     => false,
                'add_fragment' => '',
                'screen_reader_text' => esc_html(''),
            ) ).'</div></div>';
    }


    // PAGINATION END

    $output .= '</div>'; // row closed

    $the_query = null;
    wp_reset_postdata();

    return $output;
}

add_shortcode('ssc_productgrid', 'ssc_productgrid_shortcode');

add_filter( 'shortcode_ssc_productgrid_before_css_generating', 'ssc_productgrid_filter_css' );

function ssc_productgrid_filter_css( $atts ) {
	$styles = array();
	extract( shortcode_atts( array(
		'template'      => '',
		'limit_d_lines' => 20,//+
		'limit_t_lines' => 2,//+
		'arrows'        => 'no',
		'arrows_type'   => 'icon',
		'l_svg'         => '',
		'r_svg'         => '',
		'svg_color'     => '',
		'svg_hcolor'    => '',
	),
		$atts ) );

	if ( (int) $template >= 20 ) {
		switch ( $arrows ) {
			case 'yes':
				switch ( $arrows_type ) {
					case 'svg':
						if ( '' !== $l_svg || '' !== $r_svg ) {
							if ( ! empty ( $atts['my-css'] ) ) {
								$styles = json_decode( str_replace( '`', '"', $atts['my-css'] ), true);
							}
							if ( '' !== $svg_color ) {
								if ( empty ( $styles['kc-css']['any']['slider']['fill| .slick-arrow svg'] ) ) {
									$styles['kc-css']['any']['slider']['fill| .slick-arrow svg'] = $svg_color;
								}
							}
							if ( '' !== $svg_hcolor ) {
								if ( empty ( $styles['kc-css']['any']['slider']['fill| .slick-arrow:hover svg'] ) ) {
									$styles['kc-css']['any']['slider']['fill| .slick-arrow:hover svg'] = $svg_hcolor;
								}
							}
						}
						break;
				}
		}
	}

	if ( 0 < $limit_t_lines ) {
		if( empty( $styles ) ) {
			if ( ! empty ( $atts['my-css'] ) ) {
				$styles = json_decode( str_replace( '`', '"', $atts['my-css'] ), true);
			}
		}
		$styles['kc-css']['any']['title']['display| .title'] = '-webkit-box !important';
		$styles['kc-css']['any']['title']['-webkit-line-clamp| .title'] = $limit_t_lines;
	}
	if ( 0 < $limit_d_lines ) {
		if( empty( $styles ) ) {
			if ( ! empty ( $atts['my-css'] ) ) {
				$styles = json_decode( str_replace( '`', '"', $atts['my-css'] ), true);
			}
		}
		$styles['kc-css']['any']['description']['display| .description'] = '-webkit-box !important';
		$styles['kc-css']['any']['description']['-webkit-line-clamp| .description'] = $limit_d_lines;
	}

	if( empty( $styles ) ){
		return $atts;
	}

	$atts['my-css'] = str_replace( '"', '`', json_encode( $styles, JSON_FORCE_OBJECT  ) );
	return $atts;
}