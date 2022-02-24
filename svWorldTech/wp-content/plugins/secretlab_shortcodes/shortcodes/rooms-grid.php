<?php
add_action('init', 'ssc_rooms_grid_params', 99);

/**
 * Additional functions
 */

function ssc_rooms_grid_params() {
    global $kc;
    $kc->add_map(array(
        'ssc_rooms_grid' => array(
            'name' => esc_html__( 'Rooms Grid', 'ssc' ),
            'description' => esc_html__( 'It displays rooms by room type with unlimited design templates and colors', 'ssc' ),
            'icon' => 'kc-icon-box ssc-icon-30',
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
//                            '2'	=> SSC_URL . 'images/post2.jpg',
//                            '3'	=> SSC_URL . 'images/post3.jpg',
//                            '4'	=> SSC_URL . 'images/post4.jpg',
//                            '5'	=> SSC_URL . 'images/post5.jpg',
//                            '6'	=> SSC_URL . 'images/post6.jpg',
//                            '7'	=> SSC_URL . 'images/post7.jpg',
//                            '8'	=> SSC_URL . 'images/post8.jpg',
//                            '9'	=> SSC_URL . 'images/post9.jpg',
//                            '10'	=> SSC_URL . 'images/post10.jpg',
//                            '11'	=> SSC_URL . 'images/post11.jpg',
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
//                    array(
//                        'name'          => 'withtags',
//                        'type'          => 'autocomplete',
//                        'label'         => esc_html__( 'Rooms Categories', 'ssc'),
//                        'description' => esc_html__( 'If you want so show only rooms with specific category or categories.', 'ssc' ),
//                        'options'       => array(
//                            'multiple'      => true,
//                            'post_type'     => 'to_book', // default is "any"
//                            'taxonomy'      => 'categories'
//                        ),
//                    ),
                    array(
                        'name' => 'order',
                        'label' => esc_html__( 'Order Of Rooms', 'ssc' ),
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
                            'price_from' => esc_html__( 'Price', 'ssc' ),
                            'comment_count' => esc_html__( 'Comment Count', 'ssc' ),
                        ),
                        'value' => 'date',
                    ),

                    array(
                        'name' => 'items',
                        'label' => esc_html__( 'Rooms Per Page', 'ssc' ),
                        'type' => 'text',
                        'value' => '12',
                        'description' => esc_html__( 'Set -1 if want to show all rooms on the page', 'ssc' ),
                    ),
                    array(
                        'name' => 'ior',
                        'label' => esc_html__( 'Rooms On Row', 'ssc' ),
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
//                    array(
//                        'name' => 'show_pagination',
//                        'label' => esc_html__( 'Show Pagination', 'ssc' ),
//                        'type' => 'toggle',
//                        'value' => 'yes',
//                    ),
//                    array(
//                        'name' => 'navi_type',
//                        'label' => esc_html__( 'Navigation Type', 'ssc' ),
//                        'type' => 'select',
//                        'options' => array(
//                            'buttons' => esc_html__( 'Buttons', 'ssc' ),
//                            'numbers' => esc_html__( 'Numbers', 'ssc' ),
//                        ),
//                        'value' => 'numbers',
//                        'relation' => array(
//                            'parent' => 'show_pagination',
//                            'show_when' => 'yes'
//                        )
//                    ),
//                    array(
//                        'name' => 'prev',
//                        'label' => esc_html__( 'Text For Prev Button', 'ssc' ),
//                        'type' => 'text',
//                        'value' => esc_html__( 'Older Rooms', 'ssc' ),
//                        'relation' => array(
//                            'parent' => 'navi_type',
//                            'show_when' => 'buttons'
//                        )
//                    ),
//                    array(
//                        'name' => 'next',
//                        'label' => esc_html__( 'Text For Next Button', 'ssc' ),
//                        'type' => 'text',
//                        'value' => esc_html__( 'Never Rooms', 'ssc' ),
//                        'relation' => array(
//                            'parent' => 'navi_type',
//                            'show_when' => 'buttons'
//                        )
//                    ),

                    array(
                        'name' => 'limit_words',
                        'label' => esc_html__( 'Limit words For Description', 'ssc' ),
                        'type' => 'text',
                        'value' => '10',
                        'description' => esc_html__( 'Set -1 if you don\'t want to show the description.', 'ssc' ),
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
                        'description' => esc_html__( 'Display thumbnails of room in room items.', 'ssc' ),
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
//	                array(
//		                'name' => 'show_onsale',
//		                'label' => esc_html__('Show onsale?', 'ssc'),
//		                'type' => 'toggle',
//		                'value' => 'yes',
//		                'description' => esc_html__('Display on sale on the room items.', 'ssc'),
//	                ),
//	                array(
//		                'name' => 'onsale_text',
//		                'label' => esc_html__('Text onsale', 'ssc'),
//		                'type' => 'text',
//		                'value' => esc_html__('Sale!', 'ssc'),
//		                'description' => esc_html__('On sale text.', 'ssc'),
//		                'relation' => array(
//			                'parent' => 'show_onsale',
//			                'show_when' => 'yes'
//		                )
//	                ),
	                array(
		                'name' => 'show_price',
		                'label' => esc_html__( 'Show Price', 'ssc' ),
		                'type' => 'toggle',
		                'value' => 'yes',
		                'description' => esc_html__( 'Display price of room in room items.', 'ssc' ),
	                ),
	                array(
		                'name' => 'show_rating',
		                'label' => esc_html__( 'Show Rating', 'ssc' ),
		                'type' => 'toggle',
		                'value' => 'yes',
		                'description' => esc_html__( 'Display rating of room in room items.', 'ssc' ),
	                ),
	                array(
		                'name' => 'show_terms',
		                'type' => 'toggle',
		                'label' => esc_html__( 'Show Terms', 'ssc' ),
		                'value' => 'yes',
		                'description' => esc_html__( 'Display rating of room in room items.', 'ssc' ),
	                ),
	                array(
		                'name' => 'show_book_button',
		                'label' => esc_html__( 'Show Book button', 'ssc' ),
		                'type' => 'toggle',
		                'value' => 'yes',
		                'description' => esc_html__( 'Display Book button in room items.', 'ssc' ),
	                ),
                    array(
                        'name' => 'book_text',
                        'label' => esc_html__( 'Book text', 'ssc' ),
                        'type' => 'text',
                        'value' => esc_html__( 'Book room now', 'ssc' ),
                        'relation' => array(
                            'parent' => 'show_add',
                            'show_when' => 'yes'
                        )
                    ),
//                    array(
//                        'name' => 'show_filters',
//                        'label' => esc_html__( 'Show Filters', 'ssc' ),
//                        'type' => 'toggle',
//                        'value' => 'yes',
//                        'description' => esc_html__( 'Display filters by tags or categories.', 'ssc' ),
//                    ),
//                    array(
//                        'name' => 'filter_type',
//                        'label' => esc_html__( 'Filter By', 'ssc' ),
//                        'type' => 'select',
//                        'options' => array(
//                            'cats' => esc_html__( 'Categories', 'ssc' ),
//                            'tags' => esc_html__( 'Tags', 'ssc' ),
//                        ),
//                        'value' => 'tags',
//                        'relation' => array(
//                            'parent' => 'show_filters',
//                            'show_when' => 'yes'
//                        )
//                    ),
//                    array(
//                        'name' => 'all',
//                        'label' => esc_html__( 'Word For All rooms link', 'ssc' ),
//                        'type' => 'text',
//                        'value' => esc_html__( 'All rooms', 'ssc' ),
//                        'relation' => array(
//                            'parent' => 'show_filters',
//                            'show_when' => 'yes'
//                        )
//                    ),
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
                        'value' => '{`kc-css`:{`any`:{`wrapper`:{`padding|`:`30px inherit inherit inherit`},`box`:{`padding|.grid-item`:`inherit 15px 30px 15px`},`box-inside`:{`background|.room-inner`:`eyJjb2xvciI6IiNmZmZmZmYiLCJsaW5lYXJHcmFkaWVudCI6WyIiXSwiaW1hZ2UiOiJub25lIiwicG9zaXRpb24iOiIwJSAwJSIsInNpemUiOiJhdXRvIiwicmVwZWF0IjoicmVwZWF0IiwiYXR0YWNobWVudCI6InNjcm9sbCIsImFkdmFuY2VkIjowfQ==`,`border|.room-inner`:`10px solid #ffffff`,`box-shadow|.room-inner`:`0px 5px 30px 0px rgba(0, 0, 0, 0.08)`},`star-rating`:{`color|.post-total-rating .star`:`#ffffff`,`color|.post-total-rating .post-total-rating-value`:`#ffffff`,`font-size|.post-total-rating-value`:`17px`,`font-family|.post-total-rating-value`:`Bebas Neue`,`text-align|.post-total-rating`:`right`,`margin|.post-total-rating .star`:`inherit 4px inherit inherit`,`margin|.post-total-rating`:`-35px 20px 6px inherit`},`svg`:{`fill|.isv svg`:`#d3a478`,`width|.isv`:`24px`,`height|.isv`:`24px`,`float|.isv`:`left`,`display|.isv`:`inline-block`,`margin|.isv`:`inherit 8px inherit inherit`},`room-data`:{`padding|.rdata`:`35px inherit inherit inherit`},`content-box`:{`background|.room-text`:`eyJjb2xvciI6InRyYW5zcGFyZW50IiwibGluZWFyR3JhZGllbnQiOlsiIl0sImltYWdlIjoiJVNJVEVfVVJMJS93cC1jb250ZW50L3VwbG9hZHMvMjAyMC8wNi9obGluZTEucG5nIiwicG9zaXRpb24iOiJsZWZ0IGJvdHRvbSIsInNpemUiOiJhdXRvIiwicmVwZWF0IjoicmVwZWF0LXgiLCJhdHRhY2htZW50Ijoic2Nyb2xsIiwiYWR2YW5jZWQiOjF9`,`margin|.room-text`:`inherit 25px 30px 25px`,`padding|.room-text`:`inherit inherit 25px inherit`},`title`:{`color|h4`:`#191919`,`font-size|h4`:`30px`,`line-height|h4`:`36px`,`font-weight|h4`:`600`},`price`:{`color|.room-price`:`#ffffff`,`background|.room-price`:`eyJjb2xvciI6IiNkM2E0NzgiLCJsaW5lYXJHcmFkaWVudCI6WyIiXSwiaW1hZ2UiOiJub25lIiwicG9zaXRpb24iOiIwJSAwJSIsInNpemUiOiJhdXRvIiwicmVwZWF0IjoicmVwZWF0IiwiYXR0YWNobWVudCI6InNjcm9sbCIsImFkdmFuY2VkIjowfQ==`,`margin|.room-price`:`-45px inherit inherit inherit`,`padding|.room-price`:`7px 35px 7px 35px`,`width|.room-price`:`150px`,`display|.room-price`:`block`,`font-size|.room-price`:`18px`,`font-family|.room-price`:`Bebas Neue`},`removed-price`:{`display|.item_info_price_old`:`none`,`text-decoration|.item_info_price_old`:`none`},`actual-price`:{`padding|.room-price-new`:`inherit inherit inherit 5px`},`percent`:{`background|.item_info_price_discount`:`eyJjb2xvciI6IiNkZDMzMzMiLCJsaW5lYXJHcmFkaWVudCI6WyIiXSwiaW1hZ2UiOiJub25lIiwicG9zaXRpb24iOiIwJSAwJSIsInNpemUiOiJhdXRvIiwicmVwZWF0IjoicmVwZWF0IiwiYXR0YWNobWVudCI6InNjcm9sbCIsImFkdmFuY2VkIjowfQ==`,`padding|.item_info_price_discount`:`1px 5px 1px 5px`,`font-size|.item_info_price_discount`:`16px`},`book-button`:{`color|.room-book-button`:`#191919`,`font-size|.room-book-button`:`18px`,`font-family|.room-book-button`:`Bebas Neue`,`letter-spacing|.room-book-button`:`1px`,`display|.room-book-button`:`inline-block`,`padding|.room-book-button`:`15px inherit inherit inherit`},`icon-box-title`:{`display|.atiframebuilder-terms-block-title`:`none`},`icon-box`:{`padding|.atiframebuilder-terms-block-inner`:`inherit inherit inherit 35px`},`icon`:{`margin|.fic`:`inherit inherit 0px inherit`,`padding|.fic`:`inherit inherit 15px inherit`,`width|.fic img, .fic svg`:`22px`,`height|.fic img, .fic svg`:`22px`},`icon-label`:{`color|.atiframebuilder-term-title`:`#191919`,`display|.atiframebuilder-term-title`:`none`}}}}', // remove this if you do not need a default content
                        'description' => esc_html__( 'Styles', 'ssc' ),
                        'options' => array(
                            array(
                                'screens' => 'any,999,768,667,479',
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
                                    array('property' => 'background', 'selector' => '.room-inner'),
                                    array('property' => 'margin', 'label' => esc_html__( 'Margin', 'ssc' ), 'selector' => '.room-inner'),
                                    array('property' => 'padding', 'label' => esc_html__( 'Padding', 'ssc' ), 'selector' => '.room-inner'),
                                    array('property' => 'border', 'label' => esc_html__( 'Border', 'ssc' ), 'selector' => '.room-inner'),
                                    array('property' => 'border-radius', 'label' => esc_html__( 'Border Radius', 'ssc' ), 'selector' => '.room-inner'),
                                    array('property' => 'width', 'label' => esc_html__( 'Width', 'ssc' ), 'selector' => '.room-inner'),
                                    array('property' => 'height', 'label' => esc_html__( 'Height', 'ssc' ), 'selector' => '.room-inner'),
                                    array('property' => 'float', 'label' => esc_html__( 'Float', 'ssc' ), 'selector' => '.room-inner'),
                                    array('property' => 'display', 'label' => esc_html__( 'Display', 'ssc' ), 'selector' => '.room-inner'),
                                    array('property' => 'box-shadow', 'label' => esc_html__( 'Box Shadow', 'ssc' ), 'selector' => '.room-inner'),
                                    array('property' => 'opacity', 'label' => esc_html__( 'Opacity', 'ssc' ), 'selector' => '.room-inner'),
                                ),
                                // Image Box
                                'Image Box' => array(
                                    array('property' => 'background', 'selector' => '.room-img'),
	                                array('property' => 'text-align', 'label' => esc_html__( 'Text Align', 'ssc' ), 'selector' => '.room-img'),
                                    array('property' => 'margin', 'label' => esc_html__( 'Margin', 'ssc' ), 'selector' => '.room-img'),
                                    array('property' => 'padding', 'label' => esc_html__( 'Padding', 'ssc' ), 'selector' => '.room-img'),
                                    array('property' => 'border', 'label' => esc_html__( 'Border', 'ssc' ), 'selector' => '.room-img'),
                                    array('property' => 'border-radius', 'label' => esc_html__( 'Border Radius', 'ssc' ), 'selector' => '.room-img'),
                                    array('property' => 'width', 'label' => esc_html__( 'Width', 'ssc' ), 'selector' => '.room-img'),
                                    array('property' => 'height', 'label' => esc_html__( 'Height', 'ssc' ), 'selector' => '.room-img'),
                                    array('property' => 'float', 'label' => esc_html__( 'Float', 'ssc' ), 'selector' => '.room-img'),
                                    array('property' => 'display', 'label' => esc_html__( 'Display', 'ssc' ), 'selector' => '.room-img'),
                                    array('property' => 'box-shadow', 'label' => esc_html__( 'Box Shadow', 'ssc' ), 'selector' => '.room-img'),
                                    array('property' => 'opacity', 'label' => esc_html__( 'Opacity', 'ssc' ), 'selector' => '.room-img'),
                                ),
                                // Image
                                'Image' => array(
                                    array('property' => 'background', 'selector' => '.room-img img'),
                                    array('property' => 'margin', 'label' => esc_html__( 'Margin', 'ssc' ), 'selector' => '.room-img img'),
                                    array('property' => 'padding', 'label' => esc_html__( 'Padding', 'ssc' ), 'selector' => '.room-img img'),
                                    array('property' => 'border', 'label' => esc_html__( 'Border', 'ssc' ), 'selector' => '.room-img img'),
                                    array('property' => 'border-radius', 'label' => esc_html__( 'Border Radius', 'ssc' ), 'selector' => '.room-img img'),
                                    array('property' => 'width', 'label' => esc_html__( 'Width', 'ssc' ), 'selector' => '.room-img img'),
                                    array('property' => 'height', 'label' => esc_html__( 'Height', 'ssc' ), 'selector' => '.room-img img'),
                                    array('property' => 'float', 'label' => esc_html__( 'Float', 'ssc' ), 'selector' => '.room-img img'),
                                    array('property' => 'display', 'label' => esc_html__( 'Display', 'ssc' ), 'selector' => '.room-img img'),
                                    array('property' => 'box-shadow', 'label' => esc_html__( 'Box Shadow', 'ssc' ), 'selector' => '.room-img img'),
                                    array('property' => 'opacity', 'label' => esc_html__( 'Opacity', 'ssc' ), 'selector' => '.room-img img'),
                                ),
                                'Star Rating' => array(
	                                array('property' => 'color', 'label' => esc_html__('Color Star', 'ssc' ), 'selector' => '.post-total-rating .star'),
	                                array('property' => 'color', 'label' => esc_html__('Color Text', 'ssc' ), 'selector' => '.post-total-rating .post-total-rating-value'),
	                                array('property' => 'background-color', 'label' => esc_html__('Background Color', 'ssc' ), 'selector' => '.post-total-rating .star'),
	                                array('property' => 'font-size', 'label' => esc_html__('Font Size Star', 'ssc' ), 'selector' => '.star'),
	                                array('property' => 'font-size', 'label' => esc_html__('Font Size Rating', 'ssc' ), 'selector' => '.post-total-rating-value'),
                                    array('property' => 'font-family', 'label' => esc_html__( 'Font Family', 'ssc' ), 'selector' => '.post-total-rating-value'),
                                    array('property' => 'text-align', 'label' => esc_html__('Text Align', 'ssc' ), 'selector' => '.post-total-rating'),
	                                array('property' => 'display', 'label' => esc_html__( 'Display', 'ssc' ), 'selector' => '.post-total-rating .star'),
	                                array('property' => 'float', 'label' => esc_html__( 'Float', 'ssc' ), 'selector' => '.post-total-rating .star'),
	                                array('property' => 'border', 'label' => esc_html__('Border', 'ssc' ), 'selector' => '.post-total-rating .star'),
	                                array('property' => 'border-radius', 'label' => esc_html__( 'Border Radius', 'ssc' ), 'selector' => '.post-total-rating .star'),
	                                array('property' => 'margin', 'label' => esc_html__('Margin', 'ssc' ), 'selector' => '.post-total-rating .star'),
	                                array('property' => 'padding', 'label' =>esc_html__( 'Padding', 'ssc' ), 'selector' => '.post-total-rating .star'),
                                    array('property' => 'margin', 'label' => esc_html__('Margin Wrap', 'ssc' ), 'selector' => '.post-total-rating'),
                                ),
                                'SVG' => array(
                                    array('property' => 'fill', 'label' => esc_html__( 'Color', 'ssc' ), 'selector' => '.isv svg'),
                                    array('property' => 'background', 'selector' => '.isv'),
                                    array('property' => 'width', 'label' => esc_html__( 'Width', 'ssc' ), 'selector' => '.isv'),
                                    array('property' => 'height', 'label' => esc_html__( 'Height', 'ssc' ), 'selector' => '.isv'),
                                    array('property' => 'float', 'label' => esc_html__( 'Float', 'ssc' ), 'selector' => '.isv'),
                                    array('property' => 'display', 'label' => esc_html__( 'Display', 'ssc' ), 'selector' => '.isv'),
                                    array('property' => 'margin', 'label' => esc_html__('Margin', 'ssc' ), 'selector' => '.isv'),
                                    array('property' => 'padding', 'label' =>esc_html__( 'Padding', 'ssc' ), 'selector' => '.isv')
                                ),
                                'Room data' => array(
                                    array('property' => 'background', 'selector' => '.rdata'),
                                    array('property' => 'text-align', 'label' => esc_html__('Text Align', 'ssc' ), 'selector' => '.rdata'),
                                    array('property' => 'vertical-align', 'label' => 'Vertical Align', 'selector' => '.rdata'),
                                    array('property' => 'margin', 'label' => esc_html__( 'Margin', 'ssc' ), 'selector' => '.rdata'),
                                    array('property' => 'padding', 'label' => esc_html__( 'Padding', 'ssc' ), 'selector' => '.rdata'),
                                    array('property' => 'border', 'label' => esc_html__( 'Border', 'ssc' ), 'selector' => '.rdata'),
                                    array('property' => 'border-radius', 'label' => esc_html__( 'Border Radius', 'ssc' ), 'selector' => '.rdata'),
                                    array('property' => 'width', 'label' => esc_html__( 'Width', 'ssc' ), 'selector' => '.rdata'),
                                    array('property' => 'height', 'label' => esc_html__( 'Height', 'ssc' ), 'selector' => '.rdata'),
                                    array('property' => 'text-align', 'label' => esc_html__('Text Align', 'ssc' ), 'selector' => '.rdata'),
                                    array('property' => 'float', 'label' => esc_html__( 'Float', 'ssc' ), 'selector' => '.rdata'),
                                    array('property' => 'display', 'label' => esc_html__( 'Display', 'ssc' ), 'selector' => '.rdata'),
                                    array('property' => 'box-shadow', 'label' => esc_html__( 'Box Shadow', 'ssc' ), 'selector' => '.rdata'),
                                    array('property' => 'opacity', 'label' => esc_html__( 'Opacity', 'ssc' ), 'selector' => '.rdata'),
                                ),
                                // Content Box
                                'Content Box' => array(
                                    array('property' => 'background', 'selector' => '.room-text'),
	                                array('property' => 'text-align', 'label' => esc_html__('Text Align', 'ssc' ), 'selector' => '.room-text'),
	                                array('property' => 'vertical-align', 'label' => 'Vertical Align', 'selector' => '.room-text'),
                                    array('property' => 'margin', 'label' => esc_html__( 'Margin', 'ssc' ), 'selector' => '.room-text'),
                                    array('property' => 'padding', 'label' => esc_html__( 'Padding', 'ssc' ), 'selector' => '.room-text'),
                                    array('property' => 'border', 'label' => esc_html__( 'Border', 'ssc' ), 'selector' => '.room-text'),
                                    array('property' => 'border-radius', 'label' => esc_html__( 'Border Radius', 'ssc' ), 'selector' => '.room-text'),
                                    array('property' => 'width', 'label' => esc_html__( 'Width', 'ssc' ), 'selector' => '.room-text'),
                                    array('property' => 'height', 'label' => esc_html__( 'Height', 'ssc' ), 'selector' => '.room-text'),
	                                array('property' => 'text-align', 'label' => esc_html__('Text Align', 'ssc' ), 'selector' => '.room-text'),
                                    array('property' => 'float', 'label' => esc_html__( 'Float', 'ssc' ), 'selector' => '.room-text'),
                                    array('property' => 'display', 'label' => esc_html__( 'Display', 'ssc' ), 'selector' => '.room-text'),
                                    array('property' => 'box-shadow', 'label' => esc_html__( 'Box Shadow', 'ssc' ), 'selector' => '.room-text'),
                                    array('property' => 'opacity', 'label' => esc_html__( 'Opacity', 'ssc' ), 'selector' => '.room-text'),
                                ),
                                // Title
                                'Title' => array(
                                    array('property' => 'background', 'selector' => 'h4'),
                                    array('property' => 'color', 'label' => esc_html__( 'Color', 'ssc' ), 'selector' => 'h4'),
                                    array('property' => 'font-size', 'label' => esc_html__( 'Font Size', 'ssc' ), 'selector' => 'h4'),
                                    array('property' => 'line-height', 'label' => esc_html__( 'Line Height', 'ssc' ), 'selector' => 'h4'),
                                    array('property' => 'font-weight', 'label' => esc_html__( 'Font Weight', 'ssc' ), 'selector' => 'h4'),
                                    array('property' => 'font-style', 'label' => esc_html__( 'Font Style', 'ssc' ), 'selector' => 'h4'),
                                    array('property' => 'font-family', 'label' => esc_html__( 'Font Family', 'ssc' ), 'selector' => 'h4'),
                                    array('property' => 'text-align', 'label' => esc_html__( 'Text Align', 'ssc' ), 'selector' => 'h4'),
                                    array('property' => 'text-shadow', 'label' => esc_html__( 'Text Shadow', 'ssc' ), 'selector' => 'h4'),
                                    array('property' => 'text-transform', 'label' => esc_html__( 'Text Transform', 'ssc' ), 'selector' => 'h4'),
                                    array('property' => 'text-decoration', 'label' => esc_html__( 'Text Decoration', 'ssc' ), 'selector' => 'h4'),
                                    array('property' => 'letter-spacing', 'label' => esc_html__( 'Letter Spacing', 'ssc' ), 'selector' => 'h4'),
                                    array('property' => 'overflow', 'label' => esc_html__( 'Overflow', 'ssc' ), 'selector' => 'h4'),
	                                array('property' => 'float', 'label' => esc_html__( 'Float', 'ssc' ), 'selector' => 'h4'),
	                                array('property' => 'display', 'label' => esc_html__( 'Display', 'ssc' ), 'selector' => 'h4'),
                                    array('property' => 'word-break', 'label' => esc_html__( 'Word Break', 'ssc' ), 'selector' => 'h4'),
                                    array('property' => 'margin', 'label' => esc_html__( 'Margin', 'ssc' ), 'selector' => 'h4'),
                                    array('property' => 'padding', 'label' => esc_html__( 'Padding', 'ssc' ), 'selector' => 'h4'),
                                    array('property' => 'border', 'label' => esc_html__( 'Border', 'ssc' ), 'selector' => 'h4'),
                                    array('property' => 'border-radius', 'label' => esc_html__( 'Border Radius', 'ssc' ), 'selector' => 'h4'),
                                ),
	                            // Price
                                'Price' => array(
	                                array('property' => 'color', 'label' => esc_html__( 'Color', 'ssc' ), 'selector' => '.room-price'),
	                                array('property' => 'background', 'selector' => '.room-price'),
	                                array('property' => 'margin', 'label' => esc_html__( 'Margin', 'ssc' ), 'selector' => '.room-price'),
	                                array('property' => 'padding', 'label' => esc_html__( 'Padding', 'ssc' ), 'selector' => '.room-price'),
	                                array('property' => 'border', 'label' => esc_html__( 'Border', 'ssc' ), 'selector' => '.room-price'),
	                                array('property' => 'border-radius', 'label' => esc_html__( 'Border Radius', 'ssc' ), 'selector' => '.room-price'),
	                                array('property' => 'width', 'label' => esc_html__( 'Width', 'ssc' ), 'selector' => '.room-price'),
	                                array('property' => 'height', 'label' => esc_html__( 'Height', 'ssc' ), 'selector' => '.room-price'),
//                                    array('property' => 'float', 'label' => esc_html__( 'Float', 'ssc' ), 'selector' => '.room-price'),
	                                array('property' => 'display', 'label' => esc_html__( 'Display', 'ssc' ), 'selector' => '.room-price'),
	                                array('property' => 'box-shadow', 'label' => esc_html__( 'Box Shadow', 'ssc' ), 'selector' => '.room-price'),
	                                array('property' => 'opacity', 'label' => esc_html__( 'Opacity', 'ssc' ), 'selector' => '.room-price'),
	                                array('property' => 'font-size', 'label' => esc_html__( 'Font Size', 'ssc' ), 'selector' => '.room-price'),
	                                array('property' => 'line-height', 'label' => esc_html__( 'Line Height', 'ssc' ), 'selector' => '.room-price'),
	                                array('property' => 'font-weight', 'label' => esc_html__( 'Font Weight', 'ssc' ), 'selector' => '.room-price'),
	                                array('property' => 'font-style', 'label' => esc_html__( 'Font Style', 'ssc' ), 'selector' => '.room-price'),
	                                array('property' => 'font-family', 'label' => esc_html__( 'Font Family', 'ssc' ), 'selector' => '.room-price'),
	                                array('property' => 'text-align', 'label' => esc_html__( 'Text Align', 'ssc' ), 'selector' => '.room-price'),
	                                array('property' => 'text-shadow', 'label' => esc_html__( 'Text Shadow', 'ssc' ), 'selector' => '.room-price'),
	                                array('property' => 'text-transform', 'label' => esc_html__( 'Text Transform', 'ssc' ), 'selector' => '.room-price'),
	                                array('property' => 'text-decoration', 'label' => esc_html__( 'Text Decoration', 'ssc' ), 'selector' => '.room-price'),
	                                array('property' => 'letter-spacing', 'label' => esc_html__( 'Letter Spacing', 'ssc' ), 'selector' => '.room-price'),
	                                array('property' => 'overflow', 'label' => esc_html__( 'Overflow', 'ssc' ), 'selector' => '.room-price'),
	                                array('property' => 'word-break', 'label' => esc_html__( 'Word Break', 'ssc' ), 'selector' => '.room-price'),
                                ),
	                            // On sale Price
                                'Removed Price' => array(
	                                array('property' => 'color', 'label' => esc_html__( 'Color', 'ssc' ), 'selector' => '.item_info_price_old'),
	                                array('property' => 'background', 'selector' => '.item_info_price_old'),
	                                array('property' => 'margin', 'label' => esc_html__( 'Margin', 'ssc' ), 'selector' => '.item_info_price_old'),
	                                array('property' => 'padding', 'label' => esc_html__( 'Padding', 'ssc' ), 'selector' => '.item_info_price_old'),
	                                array('property' => 'border', 'label' => esc_html__( 'Border', 'ssc' ), 'selector' => '.item_info_price_old'),
	                                array('property' => 'border-radius', 'label' => esc_html__( 'Border Radius', 'ssc' ), 'selector' => '.item_info_price_old'),
	                                array('property' => 'width', 'label' => esc_html__( 'Width', 'ssc' ), 'selector' => '.item_info_price_old'),
	                                array('property' => 'height', 'label' => esc_html__( 'Height', 'ssc' ), 'selector' => '.item_info_price_old'),
//                                    array('property' => 'float', 'label' => esc_html__( 'Float', 'ssc' ), 'selector' => '.item_info_price_old'),
	                                array('property' => 'display', 'label' => esc_html__( 'Display', 'ssc' ), 'selector' => '.item_info_price_old'),
	                                array('property' => 'box-shadow', 'label' => esc_html__( 'Box Shadow', 'ssc' ), 'selector' => '.item_info_price_old'),
	                                array('property' => 'opacity', 'label' => esc_html__( 'Opacity', 'ssc' ), 'selector' => '.item_info_price_old'),
	                                array('property' => 'font-size', 'label' => esc_html__( 'Font Size', 'ssc' ), 'selector' => '.item_info_price_old'),
	                                array('property' => 'line-height', 'label' => esc_html__( 'Line Height', 'ssc' ), 'selector' => '.item_info_price_old'),
	                                array('property' => 'font-weight', 'label' => esc_html__( 'Font Weight', 'ssc' ), 'selector' => '.item_info_price_old'),
	                                array('property' => 'font-style', 'label' => esc_html__( 'Font Style', 'ssc' ), 'selector' => '.item_info_price_old'),
	                                array('property' => 'font-family', 'label' => esc_html__( 'Font Family', 'ssc' ), 'selector' => '.item_info_price_old'),
	                                array('property' => 'text-align', 'label' => esc_html__( 'Text Align', 'ssc' ), 'selector' => '.item_info_price_old'),
	                                array('property' => 'text-shadow', 'label' => esc_html__( 'Text Shadow', 'ssc' ), 'selector' => '.item_info_price_old'),
	                                array('property' => 'text-transform', 'label' => esc_html__( 'Text Transform', 'ssc' ), 'selector' => '.item_info_price_old'),
	                                array('property' => 'text-decoration', 'label' => esc_html__( 'Text Decoration', 'ssc' ), 'selector' => '.item_info_price_old'),
	                                array('property' => 'letter-spacing', 'label' => esc_html__( 'Letter Spacing', 'ssc' ), 'selector' => '.item_info_price_old'),
	                                array('property' => 'overflow', 'label' => esc_html__( 'Overflow', 'ssc' ), 'selector' => '.item_info_price_old'),
	                                array('property' => 'word-break', 'label' => esc_html__( 'Word Break', 'ssc' ), 'selector' => '.item_info_price_old'),
                                ),
                                'Actual Price' => array(
	                                array('property' => 'color', 'label' => esc_html__( 'Color', 'ssc' ), 'selector' => '.room-price-new'),
	                                array('property' => 'background', 'selector' => '.room-price-new'),
	                                array('property' => 'margin', 'label' => esc_html__( 'Margin', 'ssc' ), 'selector' => '.room-price-new'),
	                                array('property' => 'padding', 'label' => esc_html__( 'Padding', 'ssc' ), 'selector' => '.room-price-new'),
	                                array('property' => 'border', 'label' => esc_html__( 'Border', 'ssc' ), 'selector' => '.room-price-new'),
	                                array('property' => 'border-radius', 'label' => esc_html__( 'Border Radius', 'ssc' ), 'selector' => '.room-price-new'),
	                                array('property' => 'width', 'label' => esc_html__( 'Width', 'ssc' ), 'selector' => '.room-price-new'),
	                                array('property' => 'height', 'label' => esc_html__( 'Height', 'ssc' ), 'selector' => '.room-price-new'),
//                                    array('property' => 'float', 'label' => esc_html__( 'Float', 'ssc' ), 'selector' => '.room-price-new'),
	                                array('property' => 'display', 'label' => esc_html__( 'Display', 'ssc' ), 'selector' => '.room-price-new'),
	                                array('property' => 'box-shadow', 'label' => esc_html__( 'Box Shadow', 'ssc' ), 'selector' => '.room-price-new'),
	                                array('property' => 'opacity', 'label' => esc_html__( 'Opacity', 'ssc' ), 'selector' => '.room-price-new'),
	                                array('property' => 'font-size', 'label' => esc_html__( 'Font Size', 'ssc' ), 'selector' => '.room-price-new'),
	                                array('property' => 'line-height', 'label' => esc_html__( 'Line Height', 'ssc' ), 'selector' => '.room-price-new'),
	                                array('property' => 'font-weight', 'label' => esc_html__( 'Font Weight', 'ssc' ), 'selector' => '.room-price-new'),
	                                array('property' => 'font-style', 'label' => esc_html__( 'Font Style', 'ssc' ), 'selector' => '.room-price-new'),
	                                array('property' => 'font-family', 'label' => esc_html__( 'Font Family', 'ssc' ), 'selector' => '.room-price-new'),
	                                array('property' => 'text-align', 'label' => esc_html__( 'Text Align', 'ssc' ), 'selector' => '.room-price-new'),
	                                array('property' => 'text-shadow', 'label' => esc_html__( 'Text Shadow', 'ssc' ), 'selector' => '.room-price-new'),
	                                array('property' => 'text-transform', 'label' => esc_html__( 'Text Transform', 'ssc' ), 'selector' => '.room-price-new'),
	                                array('property' => 'text-decoration', 'label' => esc_html__( 'Text Decoration', 'ssc' ), 'selector' => '.room-price-new'),
	                                array('property' => 'letter-spacing', 'label' => esc_html__( 'Letter Spacing', 'ssc' ), 'selector' => '.room-price-new'),
	                                array('property' => 'overflow', 'label' => esc_html__( 'Overflow', 'ssc' ), 'selector' => '.room-price-new'),
	                                array('property' => 'word-break', 'label' => esc_html__( 'Word Break', 'ssc' ), 'selector' => '.room-price-new'),
                                ),
                                'Percent' => array(
                                    array('property' => 'color', 'label' => esc_html__( 'Color', 'ssc' ), 'selector' => '.item_info_price_discount'),
                                    array('property' => 'background', 'selector' => '.item_info_price_discount'),
                                    array('property' => 'margin', 'label' => esc_html__( 'Margin', 'ssc' ), 'selector' => '.item_info_price_discount'),
                                    array('property' => 'padding', 'label' => esc_html__( 'Padding', 'ssc' ), 'selector' => '.item_info_price_discount'),
                                    array('property' => 'border', 'label' => esc_html__( 'Border', 'ssc' ), 'selector' => '.item_info_price_discount'),
                                    array('property' => 'border-radius', 'label' => esc_html__( 'Border Radius', 'ssc' ), 'selector' => '.item_info_price_discount'),
                                    array('property' => 'width', 'label' => esc_html__( 'Width', 'ssc' ), 'selector' => '.item_info_price_discount'),
                                    array('property' => 'height', 'label' => esc_html__( 'Height', 'ssc' ), 'selector' => '.item_info_price_discount'),
                                    array('property' => 'float', 'label' => esc_html__( 'Float', 'ssc' ), 'selector' => '.item_info_price_discount'),
                                    array('property' => 'display', 'label' => esc_html__( 'Display', 'ssc' ), 'selector' => '.item_info_price_discount'),
                                    array('property' => 'box-shadow', 'label' => esc_html__( 'Box Shadow', 'ssc' ), 'selector' => '.item_info_price_discount'),
                                    array('property' => 'opacity', 'label' => esc_html__( 'Opacity', 'ssc' ), 'selector' => '.item_info_price_discount'),
                                    array('property' => 'font-size', 'label' => esc_html__( 'Font Size', 'ssc' ), 'selector' => '.item_info_price_discount'),
                                    array('property' => 'line-height', 'label' => esc_html__( 'Line Height', 'ssc' ), 'selector' => '.item_info_price_discount'),
                                    array('property' => 'font-weight', 'label' => esc_html__( 'Font Weight', 'ssc' ), 'selector' => '.item_info_price_discount'),
                                    array('property' => 'font-style', 'label' => esc_html__( 'Font Style', 'ssc' ), 'selector' => '.item_info_price_discount'),
                                    array('property' => 'font-family', 'label' => esc_html__( 'Font Family', 'ssc' ), 'selector' => '.item_info_price_discount'),
                                    array('property' => 'text-align', 'label' => esc_html__( 'Text Align', 'ssc' ), 'selector' => '.item_info_price_discount'),
                                    array('property' => 'text-shadow', 'label' => esc_html__( 'Text Shadow', 'ssc' ), 'selector' => '.item_info_price_discount'),
                                    array('property' => 'text-transform', 'label' => esc_html__( 'Text Transform', 'ssc' ), 'selector' => '.item_info_price_discount'),
                                    array('property' => 'text-decoration', 'label' => esc_html__( 'Text Decoration', 'ssc' ), 'selector' => '.item_info_price_discount'),
                                    array('property' => 'letter-spacing', 'label' => esc_html__( 'Letter Spacing', 'ssc' ), 'selector' => '.item_info_price_discount'),
                                    array('property' => 'overflow', 'label' => esc_html__( 'Overflow', 'ssc' ), 'selector' => '.item_info_price_discount'),
                                    array('property' => 'word-break', 'label' => esc_html__( 'Word Break', 'ssc' ), 'selector' => '.item_info_price_discount'),
                                ),
                                // Book button
                                'Book button' => array(
                                    array('property' => 'background', 'selector' => '.room-book-button'),
                                    array('property' => 'color', 'label' => esc_html__( 'Color', 'ssc' ), 'selector' => '.room-book-button'),
                                    array('property' => 'font-size', 'label' => esc_html__( 'Font Size', 'ssc' ), 'selector' => '.room-book-button'),
                                    array('property' => 'line-height', 'label' => esc_html__( 'Line Height', 'ssc' ), 'selector' => '.room-book-button'),
                                    array('property' => 'font-weight', 'label' => esc_html__( 'Font Weight', 'ssc' ), 'selector' => '.room-book-button'),
                                    array('property' => 'font-style', 'label' => esc_html__( 'Font Style', 'ssc' ), 'selector' => '.room-book-button'),
                                    array('property' => 'font-family', 'label' => esc_html__( 'Font Family', 'ssc' ), 'selector' => '.room-book-button'),
                                    array('property' => 'text-align', 'label' => esc_html__( 'Text Align', 'ssc' ), 'selector' => '.room-book-button'),
                                    array('property' => 'text-shadow', 'label' => esc_html__( 'Text Shadow', 'ssc' ), 'selector' => '.room-book-button'),
	                                array('property' => 'box-shadow', 'label' => esc_html__( 'Box Shadow', 'ssc' ), 'selector' => '.room-book-button'),
                                    array('property' => 'text-transform', 'label' => esc_html__( 'Text Transform', 'ssc' ), 'selector' => '.room-book-button'),
                                    array('property' => 'text-decoration', 'label' => esc_html__( 'Text Decoration', 'ssc' ), 'selector' => '.room-book-button'),
                                    array('property' => 'letter-spacing', 'label' => esc_html__( 'Letter Spacing', 'ssc' ), 'selector' => '.room-book-button'),
                                    array('property' => 'display', 'label' => esc_html__( 'Display', 'ssc' ), 'selector' => '.room-book-button'),
                                    array('property' => 'float', 'label' => esc_html__( 'Float', 'ssc' ), 'selector' => '.room-book-button'),
                                    array('property' => 'overflow', 'label' => esc_html__( 'Overflow', 'ssc' ), 'selector' => '.room-book-button'),
                                    array('property' => 'word-break', 'label' => esc_html__( 'Word Break', 'ssc' ), 'selector' => '.room-book-button'),
                                    array('property' => 'margin', 'label' => esc_html__( 'Margin', 'ssc' ), 'selector' => '.room-book-button'),
                                    array('property' => 'padding', 'label' => esc_html__( 'Padding', 'ssc' ), 'selector' => '.room-book-button'),
                                    array('property' => 'border', 'label' => esc_html__( 'Border', 'ssc' ), 'selector' => '.room-book-button'),
                                    array('property' => 'border-radius', 'label' => esc_html__( 'Border Radius', 'ssc' ), 'selector' => '.room-book-button')
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
                                'Icon Box Title' => array(
                                    array('property' => 'background', 'selector' => '.atiframebuilder-terms-block-title'),
                                    array('property' => 'color', 'label' => esc_html__( 'Color', 'ssc' ), 'selector' => '.atiframebuilder-terms-block-title'),
                                    array('property' => 'font-size', 'label' => esc_html__( 'Font Size', 'ssc' ), 'selector' => '.atiframebuilder-terms-block-title'),
                                    array('property' => 'line-height', 'label' => esc_html__( 'Line Height', 'ssc' ), 'selector' => '.atiframebuilder-terms-block-title'),
                                    array('property' => 'font-weight', 'label' => esc_html__( 'Font Weight', 'ssc' ), 'selector' => '.atiframebuilder-terms-block-title'),
                                    array('property' => 'font-style', 'label' => esc_html__( 'Font Style', 'ssc' ), 'selector' => '.atiframebuilder-terms-block-title'),
                                    array('property' => 'font-family', 'label' => esc_html__( 'Font Family', 'ssc' ), 'selector' => '.atiframebuilder-terms-block-title'),
                                    array('property' => 'text-align', 'label' => esc_html__( 'Text Align', 'ssc' ), 'selector' => '.atiframebuilder-terms-block-title'),
                                    array('property' => 'text-shadow', 'label' => esc_html__( 'Text Shadow', 'ssc' ), 'selector' => '.atiframebuilder-terms-block-title'),
                                    array('property' => 'text-transform', 'label' => esc_html__( 'Text Transform', 'ssc' ), 'selector' => '.atiframebuilder-terms-block-title'),
                                    array('property' => 'text-decoration', 'label' => esc_html__( 'Text Decoration', 'ssc' ), 'selector' => '.atiframebuilder-terms-block-title'),
                                    array('property' => 'letter-spacing', 'label' => esc_html__( 'Letter Spacing', 'ssc' ), 'selector' => '.atiframebuilder-terms-block-title'),
                                    array('property' => 'overflow', 'label' => esc_html__( 'Overflow', 'ssc' ), 'selector' => '.atiframebuilder-terms-block-title'),
                                    array('property' => 'float', 'label' => esc_html__( 'Float', 'ssc' ), 'selector' => '.atiframebuilder-terms-block-title'),
                                    array('property' => 'display', 'label' => esc_html__( 'Display', 'ssc' ), 'selector' => '.atiframebuilder-terms-block-title'),
                                    array('property' => 'word-break', 'label' => esc_html__( 'Word Break', 'ssc' ), 'selector' => '.atiframebuilder-terms-block-title'),
                                    array('property' => 'margin', 'label' => esc_html__( 'Margin', 'ssc' ), 'selector' => '.atiframebuilder-terms-block-title'),
                                    array('property' => 'padding', 'label' => esc_html__( 'Padding', 'ssc' ), 'selector' => '.atiframebuilder-terms-block-title'),
                                    array('property' => 'border', 'label' => esc_html__( 'Border', 'ssc' ), 'selector' => '.atiframebuilder-terms-block-title'),
                                    array('property' => 'border-radius', 'label' => esc_html__( 'Border Radius', 'ssc' ), 'selector' => '.atiframebuilder-terms-block-title'),
                                ),
                                'Icon Box' => array(
	                                array('property' => 'background', 'selector' => '.atiframebuilder-terms-block-inner'),
	                                array('property' => 'text-align', 'label' => esc_html__('Text Align', 'ssc' ), 'selector' => '.atiframebuilder-terms-block-inner'),
	                                array('property' => 'vertical-align', 'label' => 'Vertical Align', 'selector' => '.atiframebuilder-terms-block-inner'),
	                                array('property' => 'margin', 'label' => esc_html__( 'Margin', 'ssc' ), 'selector' => '.atiframebuilder-terms-block-inner'),
	                                array('property' => 'padding', 'label' => esc_html__( 'Padding', 'ssc' ), 'selector' => '.atiframebuilder-terms-block-inner'),
	                                array('property' => 'border', 'label' => esc_html__( 'Border', 'ssc' ), 'selector' => '.atiframebuilder-terms-block-inner'),
	                                array('property' => 'border-radius', 'label' => esc_html__( 'Border Radius', 'ssc' ), 'selector' => '.atiframebuilder-terms-block-inner'),
	                                array('property' => 'width', 'label' => esc_html__( 'Width', 'ssc' ), 'selector' => '.atiframebuilder-terms-block-inner'),
	                                array('property' => 'height', 'label' => esc_html__( 'Height', 'ssc' ), 'selector' => '.atiframebuilder-terms-block-inner'),
	                                array('property' => 'text-align', 'label' => esc_html__('Text Align', 'ssc' ), 'selector' => '.atiframebuilder-terms-block-inner'),
	                                array('property' => 'float', 'label' => esc_html__( 'Float', 'ssc' ), 'selector' => '.atiframebuilder-terms-block-inner'),
	                                array('property' => 'display', 'label' => esc_html__( 'Display', 'ssc' ), 'selector' => '.atiframebuilder-terms-block-inner'),
	                                array('property' => 'box-shadow', 'label' => esc_html__( 'Box Shadow', 'ssc' ), 'selector' => '.atiframebuilder-terms-block-inner'),
	                                array('property' => 'opacity', 'label' => esc_html__( 'Opacity', 'ssc' ), 'selector' => '.atiframebuilder-terms-block-inner'),
                                ),

                                'Icon' => array(
	                                array('property' => 'background', 'selector' => '.fic img, .fic svg'),
                                    array('property' => 'fill', 'label' => esc_html__( 'Color', 'ssc' ), 'selector' => '.fic svg'),
	                                array('property' => 'margin', 'label' => esc_html__( 'Margin', 'ssc' ), 'selector' => '.fic'),
	                                array('property' => 'padding', 'label' => esc_html__( 'Padding', 'ssc' ), 'selector' => '.fic'),
	                                array('property' => 'border', 'label' => esc_html__( 'Border', 'ssc' ), 'selector' => '.fic img, .fic svg'),
	                                array('property' => 'border-radius', 'label' => esc_html__( 'Border Radius', 'ssc' ), 'selector' => '.fic img, .fic svg'),
	                                array('property' => 'width', 'label' => esc_html__( 'Width', 'ssc' ), 'selector' => '.fic img, .fic svg'),
	                                array('property' => 'height', 'label' => esc_html__( 'Height', 'ssc' ), 'selector' => '.fic img, .fic svg'),
	                                array('property' => 'float', 'label' => esc_html__( 'Float', 'ssc' ), 'selector' => '.fic img, .fic svg'),
	                                array('property' => 'display', 'label' => esc_html__( 'Display', 'ssc' ), 'selector' => '.fic img, .fic svg'),
	                                array('property' => 'box-shadow', 'label' => esc_html__( 'Box Shadow', 'ssc' ), 'selector' => '.fic img, .fic svg'),
	                                array('property' => 'opacity', 'label' => esc_html__( 'Opacity', 'ssc' ), 'selector' => '.fic img, .fic svg'),
                                ),
                                'Icon Label' => array(
                                    array('property' => 'background', 'selector' => '.atiframebuilder-term-title'),
                                    array('property' => 'color', 'label' => esc_html__( 'Color', 'ssc' ), 'selector' => '.atiframebuilder-term-title'),
                                    array('property' => 'font-size', 'label' => esc_html__( 'Font Size', 'ssc' ), 'selector' => '.atiframebuilder-term-title'),
                                    array('property' => 'line-height', 'label' => esc_html__( 'Line Height', 'ssc' ), 'selector' => '.atiframebuilder-term-title'),
                                    array('property' => 'font-weight', 'label' => esc_html__( 'Font Weight', 'ssc' ), 'selector' => '.atiframebuilder-term-title'),
                                    array('property' => 'font-style', 'label' => esc_html__( 'Font Style', 'ssc' ), 'selector' => '.atiframebuilder-term-title'),
                                    array('property' => 'font-family', 'label' => esc_html__( 'Font Family', 'ssc' ), 'selector' => '.atiframebuilder-term-title'),
                                    array('property' => 'text-align', 'label' => esc_html__( 'Text Align', 'ssc' ), 'selector' => '.atiframebuilder-term-title'),
                                    array('property' => 'text-shadow', 'label' => esc_html__( 'Text Shadow', 'ssc' ), 'selector' => '.atiframebuilder-term-title'),
                                    array('property' => 'text-transform', 'label' => esc_html__( 'Text Transform', 'ssc' ), 'selector' => '.atiframebuilder-term-title'),
                                    array('property' => 'text-decoration', 'label' => esc_html__( 'Text Decoration', 'ssc' ), 'selector' => '.atiframebuilder-term-title'),
                                    array('property' => 'letter-spacing', 'label' => esc_html__( 'Letter Spacing', 'ssc' ), 'selector' => '.atiframebuilder-term-title'),
                                    array('property' => 'overflow', 'label' => esc_html__( 'Overflow', 'ssc' ), 'selector' => '.atiframebuilder-term-title'),
                                    array('property' => 'float', 'label' => esc_html__( 'Float', 'ssc' ), 'selector' => '.atiframebuilder-term-title'),
                                    array('property' => 'display', 'label' => esc_html__( 'Display', 'ssc' ), 'selector' => '.atiframebuilder-term-title'),
                                    array('property' => 'word-break', 'label' => esc_html__( 'Word Break', 'ssc' ), 'selector' => '.atiframebuilder-term-title'),
                                    array('property' => 'margin', 'label' => esc_html__( 'Margin', 'ssc' ), 'selector' => '.atiframebuilder-term-title'),
                                    array('property' => 'padding', 'label' => esc_html__( 'Padding', 'ssc' ), 'selector' => '.atiframebuilder-term-title'),
                                    array('property' => 'border', 'label' => esc_html__( 'Border', 'ssc' ), 'selector' => '.atiframebuilder-term-title'),
                                    array('property' => 'border-radius', 'label' => esc_html__( 'Border Radius', 'ssc' ), 'selector' => '.atiframebuilder-term-title'),
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
                                'screens' => 'any,999,768,667,479',

                                // --> Box
                                'Box' => array(
                                    array('property' => 'background', 'selector' => '.grid-item:hover .grid-item:hover'),
                                    array('property' => 'text-align', 'label' => esc_html__( 'Text Align', 'ssc' ), 'selector' => '.grid-item:hover .grid-item:hover'),
                                    array('property' => 'margin', 'label' => esc_html__( 'Margin', 'ssc' ), 'selector' => '.grid-item:hover .grid-item:hover'),
                                    array('property' => 'padding', 'label' => esc_html__( 'Padding', 'ssc' ), 'selector' => '.grid-item:hover .grid-item:hover'),
                                    array('property' => 'border', 'label' => esc_html__( 'Border', 'ssc' ), 'selector' => '.grid-item:hover .grid-item:hover'),
                                    array('property' => 'border-radius', 'label' => esc_html__( 'Border Radius', 'ssc' ), 'selector' => '.grid-item:hover .grid-item:hover'),
                                    array('property' => 'width', 'label' => esc_html__( 'Width', 'ssc' ), 'selector' => '.grid-item:hover .grid-item:hover'),
                                    array('property' => 'height', 'label' => esc_html__( 'Height', 'ssc' ), 'selector' => '.grid-item:hover .grid-item:hover'),
                                    array('property' => 'float', 'label' => esc_html__( 'Float', 'ssc' ), 'selector' => '.grid-item:hover .grid-item:hover'),
                                    array('property' => 'display', 'label' => esc_html__( 'Display', 'ssc' ), 'selector' => '.grid-item:hover .grid-item:hover'),
                                    array('property' => 'box-shadow', 'label' => esc_html__( 'Box Shadow', 'ssc' ), 'selector' => '.grid-item:hover .grid-item:hover'),
                                    array('property' => 'opacity', 'label' => esc_html__( 'Opacity', 'ssc' ), 'selector' => '.grid-item:hover .grid-item:hover'),
                                ),
                                'Box Inside' => array(
                                    array('property' => 'background', 'selector' => '.grid-item:hover .room-inner'),
                                    array('property' => 'margin', 'label' => esc_html__( 'Margin', 'ssc' ), 'selector' => '.grid-item:hover .room-inner'),
                                    array('property' => 'padding', 'label' => esc_html__( 'Padding', 'ssc' ), 'selector' => '.grid-item:hover .room-inner'),
                                    array('property' => 'border', 'label' => esc_html__( 'Border', 'ssc' ), 'selector' => '.grid-item:hover .room-inner'),
                                    array('property' => 'border-radius', 'label' => esc_html__( 'Border Radius', 'ssc' ), 'selector' => '.grid-item:hover .room-inner'),
                                    array('property' => 'width', 'label' => esc_html__( 'Width', 'ssc' ), 'selector' => '.grid-item:hover .room-inner'),
                                    array('property' => 'height', 'label' => esc_html__( 'Height', 'ssc' ), 'selector' => '.grid-item:hover .room-inner'),
                                    array('property' => 'float', 'label' => esc_html__( 'Float', 'ssc' ), 'selector' => '.grid-item:hover .room-inner'),
                                    array('property' => 'display', 'label' => esc_html__( 'Display', 'ssc' ), 'selector' => '.grid-item:hover .room-inner'),
                                    array('property' => 'box-shadow', 'label' => esc_html__( 'Box Shadow', 'ssc' ), 'selector' => '.grid-item:hover .room-inner'),
                                    array('property' => 'opacity', 'label' => esc_html__( 'Opacity', 'ssc' ), 'selector' => '.grid-item:hover .room-inner'),
                                ),
                                // Image Box
                                'Image Box' => array(
                                    array('property' => 'background', 'selector' => '.grid-item:hover .room-img'),
                                    array('property' => 'text-align', 'label' => esc_html__( 'Text Align', 'ssc' ), 'selector' => '.grid-item:hover .room-img'),
                                    array('property' => 'margin', 'label' => esc_html__( 'Margin', 'ssc' ), 'selector' => '.grid-item:hover .room-img'),
                                    array('property' => 'padding', 'label' => esc_html__( 'Padding', 'ssc' ), 'selector' => '.grid-item:hover .room-img'),
                                    array('property' => 'border', 'label' => esc_html__( 'Border', 'ssc' ), 'selector' => '.grid-item:hover .room-img'),
                                    array('property' => 'border-radius', 'label' => esc_html__( 'Border Radius', 'ssc' ), 'selector' => '.grid-item:hover .room-img'),
                                    array('property' => 'width', 'label' => esc_html__( 'Width', 'ssc' ), 'selector' => '.grid-item:hover .room-img'),
                                    array('property' => 'height', 'label' => esc_html__( 'Height', 'ssc' ), 'selector' => '.grid-item:hover .room-img'),
                                    array('property' => 'float', 'label' => esc_html__( 'Float', 'ssc' ), 'selector' => '.grid-item:hover .room-img'),
                                    array('property' => 'display', 'label' => esc_html__( 'Display', 'ssc' ), 'selector' => '.grid-item:hover .room-img'),
                                    array('property' => 'box-shadow', 'label' => esc_html__( 'Box Shadow', 'ssc' ), 'selector' => '.grid-item:hover .room-img'),
                                    array('property' => 'opacity', 'label' => esc_html__( 'Opacity', 'ssc' ), 'selector' => '.grid-item:hover .room-img'),
                                ),
                                // Image
                                'Image' => array(
                                    array('property' => 'background', 'selector' => '.grid-item:hover .room-img img'),
                                    array('property' => 'margin', 'label' => esc_html__( 'Margin', 'ssc' ), 'selector' => '.grid-item:hover .room-img img'),
                                    array('property' => 'padding', 'label' => esc_html__( 'Padding', 'ssc' ), 'selector' => '.grid-item:hover .room-img img'),
                                    array('property' => 'border', 'label' => esc_html__( 'Border', 'ssc' ), 'selector' => '.grid-item:hover .room-img img'),
                                    array('property' => 'border-radius', 'label' => esc_html__( 'Border Radius', 'ssc' ), 'selector' => '.grid-item:hover .room-img img'),
                                    array('property' => 'width', 'label' => esc_html__( 'Width', 'ssc' ), 'selector' => '.grid-item:hover .room-img img'),
                                    array('property' => 'height', 'label' => esc_html__( 'Height', 'ssc' ), 'selector' => '.grid-item:hover .room-img img'),
                                    array('property' => 'float', 'label' => esc_html__( 'Float', 'ssc' ), 'selector' => '.grid-item:hover .room-img img'),
                                    array('property' => 'display', 'label' => esc_html__( 'Display', 'ssc' ), 'selector' => '.grid-item:hover .room-img img'),
                                    array('property' => 'box-shadow', 'label' => esc_html__( 'Box Shadow', 'ssc' ), 'selector' => '.grid-item:hover .room-img img'),
                                    array('property' => 'opacity', 'label' => esc_html__( 'Opacity', 'ssc' ), 'selector' => '.grid-item:hover .room-img img'),
                                ),
                                'Star Rating' => array(
                                    array('property' => 'color', 'label' => esc_html__('Color Star', 'ssc' ), 'selector' => '.grid-item:hover .post-total-rating .star'),
                                    array('property' => 'color', 'label' => esc_html__('Color Text', 'ssc' ), 'selector' => '.grid-item:hover .post-total-rating .post-total-rating-value'),
                                    array('property' => 'background-color', 'label' => esc_html__('Background Color', 'ssc' ), 'selector' => '.grid-item:hover .post-total-rating .star'),
                                    array('property' => 'font-size', 'label' => esc_html__('Font Size Star', 'ssc' ), 'selector' => '.grid-item:hover .star'),
                                    array('property' => 'font-size', 'label' => esc_html__('Font Size Rating', 'ssc' ), 'selector' => '.grid-item:hover .post-total-rating-value'),
                                    array('property' => 'font-family', 'label' => esc_html__( 'Font Family', 'ssc' ), 'selector' => '.grid-item:hover .post-total-rating-value'),
                                    array('property' => 'text-align', 'label' => esc_html__('Text Align', 'ssc' ), 'selector' => '.grid-item:hover .post-total-rating'),
                                    array('property' => 'display', 'label' => esc_html__( 'Display', 'ssc' ), 'selector' => '.grid-item:hover .post-total-rating .star'),
                                    array('property' => 'float', 'label' => esc_html__( 'Float', 'ssc' ), 'selector' => '.grid-item:hover .post-total-rating .star'),
                                    array('property' => 'border', 'label' => esc_html__('Border', 'ssc' ), 'selector' => '.grid-item:hover .post-total-rating .star'),
                                    array('property' => 'border-radius', 'label' => esc_html__( 'Border Radius', 'ssc' ), 'selector' => '.grid-item:hover .post-total-rating .star'),
                                    array('property' => 'margin', 'label' => esc_html__('Margin', 'ssc' ), 'selector' => '.grid-item:hover .post-total-rating .star'),
                                    array('property' => 'padding', 'label' =>esc_html__( 'Padding', 'ssc' ), 'selector' => '.grid-item:hover .post-total-rating .star'),
                                    array('property' => 'margin', 'label' => esc_html__('Margin Wrap', 'ssc' ), 'selector' => '.grid-item:hover .post-total-rating'),
                                ),
                                'SVG' => array(
                                    array('property' => 'fill', 'label' => esc_html__( 'Color', 'ssc' ), 'selector' => '.grid-item:hover .isv svg'),
                                    array('property' => 'background', 'selector' => '.grid-item:hover .isv'),
                                    array('property' => 'width', 'label' => esc_html__( 'Width', 'ssc' ), 'selector' => '.grid-item:hover .isv'),
                                    array('property' => 'height', 'label' => esc_html__( 'Height', 'ssc' ), 'selector' => '.grid-item:hover .isv'),
                                    array('property' => 'float', 'label' => esc_html__( 'Float', 'ssc' ), 'selector' => '.grid-item:hover .isv'),
                                    array('property' => 'display', 'label' => esc_html__( 'Display', 'ssc' ), 'selector' => '.grid-item:hover .isv'),
                                    array('property' => 'margin', 'label' => esc_html__('Margin', 'ssc' ), 'selector' => '.grid-item:hover .isv'),
                                    array('property' => 'padding', 'label' =>esc_html__( 'Padding', 'ssc' ), 'selector' => '.grid-item:hover .isv')
                                ),
                                'Room data' => array(
                                    array('property' => 'background', 'selector' => '.grid-item:hover .rdata'),
                                    array('property' => 'text-align', 'label' => esc_html__('Text Align', 'ssc' ), 'selector' => '.grid-item:hover .rdata'),
                                    array('property' => 'vertical-align', 'label' => 'Vertical Align', 'selector' => '.grid-item:hover .rdata'),
                                    array('property' => 'margin', 'label' => esc_html__( 'Margin', 'ssc' ), 'selector' => '.grid-item:hover .rdata'),
                                    array('property' => 'padding', 'label' => esc_html__( 'Padding', 'ssc' ), 'selector' => '.grid-item:hover .rdata'),
                                    array('property' => 'border', 'label' => esc_html__( 'Border', 'ssc' ), 'selector' => '.grid-item:hover .rdata'),
                                    array('property' => 'border-radius', 'label' => esc_html__( 'Border Radius', 'ssc' ), 'selector' => '.grid-item:hover .rdata'),
                                    array('property' => 'width', 'label' => esc_html__( 'Width', 'ssc' ), 'selector' => '.grid-item:hover .rdata'),
                                    array('property' => 'height', 'label' => esc_html__( 'Height', 'ssc' ), 'selector' => '.grid-item:hover .rdata'),
                                    array('property' => 'text-align', 'label' => esc_html__('Text Align', 'ssc' ), 'selector' => '.grid-item:hover .rdata'),
                                    array('property' => 'float', 'label' => esc_html__( 'Float', 'ssc' ), 'selector' => '.grid-item:hover .rdata'),
                                    array('property' => 'display', 'label' => esc_html__( 'Display', 'ssc' ), 'selector' => '.grid-item:hover .rdata'),
                                    array('property' => 'box-shadow', 'label' => esc_html__( 'Box Shadow', 'ssc' ), 'selector' => '.grid-item:hover .rdata'),
                                    array('property' => 'opacity', 'label' => esc_html__( 'Opacity', 'ssc' ), 'selector' => '.grid-item:hover .rdata'),
                                ),
                                // Content Box
                                'Content Box' => array(
                                    array('property' => 'background', 'selector' => '.grid-item:hover .room-text'),
                                    array('property' => 'text-align', 'label' => esc_html__('Text Align', 'ssc' ), 'selector' => '.grid-item:hover .room-text'),
                                    array('property' => 'vertical-align', 'label' => 'Vertical Align', 'selector' => '.grid-item:hover .room-text'),
                                    array('property' => 'margin', 'label' => esc_html__( 'Margin', 'ssc' ), 'selector' => '.grid-item:hover .room-text'),
                                    array('property' => 'padding', 'label' => esc_html__( 'Padding', 'ssc' ), 'selector' => '.grid-item:hover .room-text'),
                                    array('property' => 'border', 'label' => esc_html__( 'Border', 'ssc' ), 'selector' => '.grid-item:hover .room-text'),
                                    array('property' => 'border-radius', 'label' => esc_html__( 'Border Radius', 'ssc' ), 'selector' => '.grid-item:hover .room-text'),
                                    array('property' => 'width', 'label' => esc_html__( 'Width', 'ssc' ), 'selector' => '.grid-item:hover .room-text'),
                                    array('property' => 'height', 'label' => esc_html__( 'Height', 'ssc' ), 'selector' => '.grid-item:hover .room-text'),
                                    array('property' => 'text-align', 'label' => esc_html__('Text Align', 'ssc' ), 'selector' => '.grid-item:hover .room-text'),
                                    array('property' => 'float', 'label' => esc_html__( 'Float', 'ssc' ), 'selector' => '.grid-item:hover .room-text'),
                                    array('property' => 'display', 'label' => esc_html__( 'Display', 'ssc' ), 'selector' => '.grid-item:hover .room-text'),
                                    array('property' => 'box-shadow', 'label' => esc_html__( 'Box Shadow', 'ssc' ), 'selector' => '.grid-item:hover .room-text'),
                                    array('property' => 'opacity', 'label' => esc_html__( 'Opacity', 'ssc' ), 'selector' => '.grid-item:hover .room-text'),
                                ),
                                // Title
                                'Title' => array(
                                    array('property' => 'background', 'selector' => '.grid-item:hover h4'),
                                    array('property' => 'color', 'label' => esc_html__( 'Color', 'ssc' ), 'selector' => '.grid-item:hover h4'),
                                    array('property' => 'font-size', 'label' => esc_html__( 'Font Size', 'ssc' ), 'selector' => '.grid-item:hover h4'),
                                    array('property' => 'line-height', 'label' => esc_html__( 'Line Height', 'ssc' ), 'selector' => '.grid-item:hover h4'),
                                    array('property' => 'font-weight', 'label' => esc_html__( 'Font Weight', 'ssc' ), 'selector' => '.grid-item:hover h4'),
                                    array('property' => 'font-style', 'label' => esc_html__( 'Font Style', 'ssc' ), 'selector' => '.grid-item:hover h4'),
                                    array('property' => 'font-family', 'label' => esc_html__( 'Font Family', 'ssc' ), 'selector' => '.grid-item:hover h4'),
                                    array('property' => 'text-align', 'label' => esc_html__( 'Text Align', 'ssc' ), 'selector' => '.grid-item:hover h4'),
                                    array('property' => 'text-shadow', 'label' => esc_html__( 'Text Shadow', 'ssc' ), 'selector' => '.grid-item:hover h4'),
                                    array('property' => 'text-transform', 'label' => esc_html__( 'Text Transform', 'ssc' ), 'selector' => '.grid-item:hover h4'),
                                    array('property' => 'text-decoration', 'label' => esc_html__( 'Text Decoration', 'ssc' ), 'selector' => '.grid-item:hover h4'),
                                    array('property' => 'letter-spacing', 'label' => esc_html__( 'Letter Spacing', 'ssc' ), 'selector' => '.grid-item:hover h4'),
                                    array('property' => 'overflow', 'label' => esc_html__( 'Overflow', 'ssc' ), 'selector' => '.grid-item:hover h4'),
                                    array('property' => 'float', 'label' => esc_html__( 'Float', 'ssc' ), 'selector' => '.grid-item:hover h4'),
                                    array('property' => 'display', 'label' => esc_html__( 'Display', 'ssc' ), 'selector' => '.grid-item:hover h4'),
                                    array('property' => 'word-break', 'label' => esc_html__( 'Word Break', 'ssc' ), 'selector' => '.grid-item:hover h4'),
                                    array('property' => 'margin', 'label' => esc_html__( 'Margin', 'ssc' ), 'selector' => '.grid-item:hover h4'),
                                    array('property' => 'padding', 'label' => esc_html__( 'Padding', 'ssc' ), 'selector' => '.grid-item:hover h4'),
                                    array('property' => 'border', 'label' => esc_html__( 'Border', 'ssc' ), 'selector' => '.grid-item:hover h4'),
                                    array('property' => 'border-radius', 'label' => esc_html__( 'Border Radius', 'ssc' ), 'selector' => '.grid-item:hover h4'),
                                ),
                                // Price
                                'Price' => array(
                                    array('property' => 'color', 'label' => esc_html__( 'Color', 'ssc' ), 'selector' => '.grid-item:hover .room-price'),
                                    array('property' => 'background', 'selector' => '.grid-item:hover .room-price'),
                                    array('property' => 'margin', 'label' => esc_html__( 'Margin', 'ssc' ), 'selector' => '.grid-item:hover .room-price'),
                                    array('property' => 'padding', 'label' => esc_html__( 'Padding', 'ssc' ), 'selector' => '.grid-item:hover .room-price'),
                                    array('property' => 'border', 'label' => esc_html__( 'Border', 'ssc' ), 'selector' => '.grid-item:hover .room-price'),
                                    array('property' => 'border-radius', 'label' => esc_html__( 'Border Radius', 'ssc' ), 'selector' => '.grid-item:hover .room-price'),
                                    array('property' => 'width', 'label' => esc_html__( 'Width', 'ssc' ), 'selector' => '.grid-item:hover .room-price'),
                                    array('property' => 'height', 'label' => esc_html__( 'Height', 'ssc' ), 'selector' => '.grid-item:hover .room-price'),
//                                    array('property' => 'float', 'label' => esc_html__( 'Float', 'ssc' ), 'selector' => '.grid-item:hover .room-price'),
                                    array('property' => 'display', 'label' => esc_html__( 'Display', 'ssc' ), 'selector' => '.grid-item:hover .room-price'),
                                    array('property' => 'box-shadow', 'label' => esc_html__( 'Box Shadow', 'ssc' ), 'selector' => '.grid-item:hover .room-price'),
                                    array('property' => 'opacity', 'label' => esc_html__( 'Opacity', 'ssc' ), 'selector' => '.grid-item:hover .room-price'),
                                    array('property' => 'font-size', 'label' => esc_html__( 'Font Size', 'ssc' ), 'selector' => '.grid-item:hover .room-price'),
                                    array('property' => 'line-height', 'label' => esc_html__( 'Line Height', 'ssc' ), 'selector' => '.grid-item:hover .room-price'),
                                    array('property' => 'font-weight', 'label' => esc_html__( 'Font Weight', 'ssc' ), 'selector' => '.grid-item:hover .room-price'),
                                    array('property' => 'font-style', 'label' => esc_html__( 'Font Style', 'ssc' ), 'selector' => '.grid-item:hover .room-price'),
                                    array('property' => 'font-family', 'label' => esc_html__( 'Font Family', 'ssc' ), 'selector' => '.grid-item:hover .room-price'),
                                    array('property' => 'text-align', 'label' => esc_html__( 'Text Align', 'ssc' ), 'selector' => '.grid-item:hover .room-price'),
                                    array('property' => 'text-shadow', 'label' => esc_html__( 'Text Shadow', 'ssc' ), 'selector' => '.grid-item:hover .room-price'),
                                    array('property' => 'text-transform', 'label' => esc_html__( 'Text Transform', 'ssc' ), 'selector' => '.grid-item:hover .room-price'),
                                    array('property' => 'text-decoration', 'label' => esc_html__( 'Text Decoration', 'ssc' ), 'selector' => '.grid-item:hover .room-price'),
                                    array('property' => 'letter-spacing', 'label' => esc_html__( 'Letter Spacing', 'ssc' ), 'selector' => '.grid-item:hover .room-price'),
                                    array('property' => 'overflow', 'label' => esc_html__( 'Overflow', 'ssc' ), 'selector' => '.grid-item:hover .room-price'),
                                    array('property' => 'word-break', 'label' => esc_html__( 'Word Break', 'ssc' ), 'selector' => '.grid-item:hover .room-price'),
                                ),
                                // On sale Price
                                'Removed Price' => array(
                                    array('property' => 'color', 'label' => esc_html__( 'Color', 'ssc' ), 'selector' => '.grid-item:hover .item_info_price_old'),
                                    array('property' => 'background', 'selector' => '.grid-item:hover .item_info_price_old'),
                                    array('property' => 'margin', 'label' => esc_html__( 'Margin', 'ssc' ), 'selector' => '.grid-item:hover .item_info_price_old'),
                                    array('property' => 'padding', 'label' => esc_html__( 'Padding', 'ssc' ), 'selector' => '.grid-item:hover .item_info_price_old'),
                                    array('property' => 'border', 'label' => esc_html__( 'Border', 'ssc' ), 'selector' => '.grid-item:hover .item_info_price_old'),
                                    array('property' => 'border-radius', 'label' => esc_html__( 'Border Radius', 'ssc' ), 'selector' => '.grid-item:hover .item_info_price_old'),
                                    array('property' => 'width', 'label' => esc_html__( 'Width', 'ssc' ), 'selector' => '.grid-item:hover .item_info_price_old'),
                                    array('property' => 'height', 'label' => esc_html__( 'Height', 'ssc' ), 'selector' => '.grid-item:hover .item_info_price_old'),
//                                    array('property' => 'float', 'label' => esc_html__( 'Float', 'ssc' ), 'selector' => '.grid-item:hover .item_info_price_old'),
                                    array('property' => 'display', 'label' => esc_html__( 'Display', 'ssc' ), 'selector' => '.grid-item:hover .item_info_price_old'),
                                    array('property' => 'box-shadow', 'label' => esc_html__( 'Box Shadow', 'ssc' ), 'selector' => '.grid-item:hover .item_info_price_old'),
                                    array('property' => 'opacity', 'label' => esc_html__( 'Opacity', 'ssc' ), 'selector' => '.grid-item:hover .item_info_price_old'),
                                    array('property' => 'font-size', 'label' => esc_html__( 'Font Size', 'ssc' ), 'selector' => '.grid-item:hover .item_info_price_old'),
                                    array('property' => 'line-height', 'label' => esc_html__( 'Line Height', 'ssc' ), 'selector' => '.grid-item:hover .item_info_price_old'),
                                    array('property' => 'font-weight', 'label' => esc_html__( 'Font Weight', 'ssc' ), 'selector' => '.grid-item:hover .item_info_price_old'),
                                    array('property' => 'font-style', 'label' => esc_html__( 'Font Style', 'ssc' ), 'selector' => '.grid-item:hover .item_info_price_old'),
                                    array('property' => 'font-family', 'label' => esc_html__( 'Font Family', 'ssc' ), 'selector' => '.grid-item:hover .item_info_price_old'),
                                    array('property' => 'text-align', 'label' => esc_html__( 'Text Align', 'ssc' ), 'selector' => '.grid-item:hover .item_info_price_old'),
                                    array('property' => 'text-shadow', 'label' => esc_html__( 'Text Shadow', 'ssc' ), 'selector' => '.grid-item:hover .item_info_price_old'),
                                    array('property' => 'text-transform', 'label' => esc_html__( 'Text Transform', 'ssc' ), 'selector' => '.grid-item:hover .item_info_price_old'),
                                    array('property' => 'text-decoration', 'label' => esc_html__( 'Text Decoration', 'ssc' ), 'selector' => '.grid-item:hover .item_info_price_old'),
                                    array('property' => 'letter-spacing', 'label' => esc_html__( 'Letter Spacing', 'ssc' ), 'selector' => '.grid-item:hover .item_info_price_old'),
                                    array('property' => 'overflow', 'label' => esc_html__( 'Overflow', 'ssc' ), 'selector' => '.grid-item:hover .item_info_price_old'),
                                    array('property' => 'word-break', 'label' => esc_html__( 'Word Break', 'ssc' ), 'selector' => '.grid-item:hover .item_info_price_old'),
                                ),
                                'Actual Price' => array(
                                    array('property' => 'color', 'label' => esc_html__( 'Color', 'ssc' ), 'selector' => '.grid-item:hover .room-price-new'),
                                    array('property' => 'background', 'selector' => '.grid-item:hover .room-price-new'),
                                    array('property' => 'margin', 'label' => esc_html__( 'Margin', 'ssc' ), 'selector' => '.grid-item:hover .room-price-new'),
                                    array('property' => 'padding', 'label' => esc_html__( 'Padding', 'ssc' ), 'selector' => '.grid-item:hover .room-price-new'),
                                    array('property' => 'border', 'label' => esc_html__( 'Border', 'ssc' ), 'selector' => '.grid-item:hover .room-price-new'),
                                    array('property' => 'border-radius', 'label' => esc_html__( 'Border Radius', 'ssc' ), 'selector' => '.grid-item:hover .room-price-new'),
                                    array('property' => 'width', 'label' => esc_html__( 'Width', 'ssc' ), 'selector' => '.grid-item:hover .room-price-new'),
                                    array('property' => 'height', 'label' => esc_html__( 'Height', 'ssc' ), 'selector' => '.grid-item:hover .room-price-new'),
//                                    array('property' => 'float', 'label' => esc_html__( 'Float', 'ssc' ), 'selector' => '.grid-item:hover .room-price-new'),
                                    array('property' => 'display', 'label' => esc_html__( 'Display', 'ssc' ), 'selector' => '.grid-item:hover .room-price-new'),
                                    array('property' => 'box-shadow', 'label' => esc_html__( 'Box Shadow', 'ssc' ), 'selector' => '.grid-item:hover .room-price-new'),
                                    array('property' => 'opacity', 'label' => esc_html__( 'Opacity', 'ssc' ), 'selector' => '.grid-item:hover .room-price-new'),
                                    array('property' => 'font-size', 'label' => esc_html__( 'Font Size', 'ssc' ), 'selector' => '.grid-item:hover .room-price-new'),
                                    array('property' => 'line-height', 'label' => esc_html__( 'Line Height', 'ssc' ), 'selector' => '.grid-item:hover .room-price-new'),
                                    array('property' => 'font-weight', 'label' => esc_html__( 'Font Weight', 'ssc' ), 'selector' => '.grid-item:hover .room-price-new'),
                                    array('property' => 'font-style', 'label' => esc_html__( 'Font Style', 'ssc' ), 'selector' => '.grid-item:hover .room-price-new'),
                                    array('property' => 'font-family', 'label' => esc_html__( 'Font Family', 'ssc' ), 'selector' => '.grid-item:hover .room-price-new'),
                                    array('property' => 'text-align', 'label' => esc_html__( 'Text Align', 'ssc' ), 'selector' => '.grid-item:hover .room-price-new'),
                                    array('property' => 'text-shadow', 'label' => esc_html__( 'Text Shadow', 'ssc' ), 'selector' => '.grid-item:hover .room-price-new'),
                                    array('property' => 'text-transform', 'label' => esc_html__( 'Text Transform', 'ssc' ), 'selector' => '.grid-item:hover .room-price-new'),
                                    array('property' => 'text-decoration', 'label' => esc_html__( 'Text Decoration', 'ssc' ), 'selector' => '.grid-item:hover .room-price-new'),
                                    array('property' => 'letter-spacing', 'label' => esc_html__( 'Letter Spacing', 'ssc' ), 'selector' => '.grid-item:hover .room-price-new'),
                                    array('property' => 'overflow', 'label' => esc_html__( 'Overflow', 'ssc' ), 'selector' => '.grid-item:hover .room-price-new'),
                                    array('property' => 'word-break', 'label' => esc_html__( 'Word Break', 'ssc' ), 'selector' => '.grid-item:hover .room-price-new'),
                                ),
                                'Percent' => array(
                                    array('property' => 'color', 'label' => esc_html__( 'Color', 'ssc' ), 'selector' => '.grid-item:hover .item_info_price_discount'),
                                    array('property' => 'background', 'selector' => '.grid-item:hover .item_info_price_discount'),
                                    array('property' => 'margin', 'label' => esc_html__( 'Margin', 'ssc' ), 'selector' => '.grid-item:hover .item_info_price_discount'),
                                    array('property' => 'padding', 'label' => esc_html__( 'Padding', 'ssc' ), 'selector' => '.grid-item:hover .item_info_price_discount'),
                                    array('property' => 'border', 'label' => esc_html__( 'Border', 'ssc' ), 'selector' => '.grid-item:hover .item_info_price_discount'),
                                    array('property' => 'border-radius', 'label' => esc_html__( 'Border Radius', 'ssc' ), 'selector' => '.grid-item:hover .item_info_price_discount'),
                                    array('property' => 'width', 'label' => esc_html__( 'Width', 'ssc' ), 'selector' => '.grid-item:hover .item_info_price_discount'),
                                    array('property' => 'height', 'label' => esc_html__( 'Height', 'ssc' ), 'selector' => '.grid-item:hover .item_info_price_discount'),
                                    array('property' => 'float', 'label' => esc_html__( 'Float', 'ssc' ), 'selector' => '.grid-item:hover .item_info_price_discount'),
                                    array('property' => 'display', 'label' => esc_html__( 'Display', 'ssc' ), 'selector' => '.grid-item:hover .item_info_price_discount'),
                                    array('property' => 'box-shadow', 'label' => esc_html__( 'Box Shadow', 'ssc' ), 'selector' => '.grid-item:hover .item_info_price_discount'),
                                    array('property' => 'opacity', 'label' => esc_html__( 'Opacity', 'ssc' ), 'selector' => '.grid-item:hover .item_info_price_discount'),
                                    array('property' => 'font-size', 'label' => esc_html__( 'Font Size', 'ssc' ), 'selector' => '.grid-item:hover .item_info_price_discount'),
                                    array('property' => 'line-height', 'label' => esc_html__( 'Line Height', 'ssc' ), 'selector' => '.grid-item:hover .item_info_price_discount'),
                                    array('property' => 'font-weight', 'label' => esc_html__( 'Font Weight', 'ssc' ), 'selector' => '.grid-item:hover .item_info_price_discount'),
                                    array('property' => 'font-style', 'label' => esc_html__( 'Font Style', 'ssc' ), 'selector' => '.grid-item:hover .item_info_price_discount'),
                                    array('property' => 'font-family', 'label' => esc_html__( 'Font Family', 'ssc' ), 'selector' => '.grid-item:hover .item_info_price_discount'),
                                    array('property' => 'text-align', 'label' => esc_html__( 'Text Align', 'ssc' ), 'selector' => '.grid-item:hover .item_info_price_discount'),
                                    array('property' => 'text-shadow', 'label' => esc_html__( 'Text Shadow', 'ssc' ), 'selector' => '.grid-item:hover .item_info_price_discount'),
                                    array('property' => 'text-transform', 'label' => esc_html__( 'Text Transform', 'ssc' ), 'selector' => '.grid-item:hover .item_info_price_discount'),
                                    array('property' => 'text-decoration', 'label' => esc_html__( 'Text Decoration', 'ssc' ), 'selector' => '.grid-item:hover .item_info_price_discount'),
                                    array('property' => 'letter-spacing', 'label' => esc_html__( 'Letter Spacing', 'ssc' ), 'selector' => '.grid-item:hover .item_info_price_discount'),
                                    array('property' => 'overflow', 'label' => esc_html__( 'Overflow', 'ssc' ), 'selector' => '.grid-item:hover .item_info_price_discount'),
                                    array('property' => 'word-break', 'label' => esc_html__( 'Word Break', 'ssc' ), 'selector' => '.grid-item:hover .item_info_price_discount'),
                                ),
                                // Book button
                                'Book button' => array(
                                    array('property' => 'background', 'selector' => '.grid-item:hover .room-book-button'),
                                    array('property' => 'color', 'label' => esc_html__( 'Color', 'ssc' ), 'selector' => '.grid-item .room-book-button:hover'),
                                    array('property' => 'color', 'label' => esc_html__( 'Color Box Hover', 'ssc' ), 'selector' => '.grid-item:hover .room-book-button'),
                                    array('property' => 'font-size', 'label' => esc_html__( 'Font Size', 'ssc' ), 'selector' => '.grid-item:hover .room-book-button'),
                                    array('property' => 'line-height', 'label' => esc_html__( 'Line Height', 'ssc' ), 'selector' => '.grid-item:hover .room-book-button'),
                                    array('property' => 'font-weight', 'label' => esc_html__( 'Font Weight', 'ssc' ), 'selector' => '.grid-item:hover .room-book-button'),
                                    array('property' => 'font-style', 'label' => esc_html__( 'Font Style', 'ssc' ), 'selector' => '.grid-item:hover .room-book-button'),
                                    array('property' => 'font-family', 'label' => esc_html__( 'Font Family', 'ssc' ), 'selector' => '.grid-item:hover .room-book-button'),
                                    array('property' => 'text-align', 'label' => esc_html__( 'Text Align', 'ssc' ), 'selector' => '.grid-item:hover .room-book-button'),
                                    array('property' => 'text-shadow', 'label' => esc_html__( 'Text Shadow', 'ssc' ), 'selector' => '.grid-item:hover .room-book-button'),
                                    array('property' => 'box-shadow', 'label' => esc_html__( 'Box Shadow', 'ssc' ), 'selector' => '.grid-item:hover .room-book-button'),
                                    array('property' => 'text-transform', 'label' => esc_html__( 'Text Transform', 'ssc' ), 'selector' => '.grid-item:hover .room-book-button'),
                                    array('property' => 'text-decoration', 'label' => esc_html__( 'Text Decoration', 'ssc' ), 'selector' => '.grid-item:hover .room-book-button'),
                                    array('property' => 'letter-spacing', 'label' => esc_html__( 'Letter Spacing', 'ssc' ), 'selector' => '.grid-item:hover .room-book-button'),
                                    array('property' => 'display', 'label' => esc_html__( 'Display', 'ssc' ), 'selector' => '.grid-item:hover .room-book-button'),
                                    array('property' => 'float', 'label' => esc_html__( 'Float', 'ssc' ), 'selector' => '.grid-item:hover .room-book-button'),
                                    array('property' => 'overflow', 'label' => esc_html__( 'Overflow', 'ssc' ), 'selector' => '.grid-item:hover .room-book-button'),
                                    array('property' => 'word-break', 'label' => esc_html__( 'Word Break', 'ssc' ), 'selector' => '.grid-item:hover .room-book-button'),
                                    array('property' => 'margin', 'label' => esc_html__( 'Margin', 'ssc' ), 'selector' => '.grid-item:hover .room-book-button'),
                                    array('property' => 'padding', 'label' => esc_html__( 'Padding', 'ssc' ), 'selector' => '.grid-item:hover .room-book-button'),
                                    array('property' => 'border', 'label' => esc_html__( 'Border', 'ssc' ), 'selector' => '.grid-item:hover .room-book-button'),
                                    array('property' => 'border-radius', 'label' => esc_html__( 'Border Radius', 'ssc' ), 'selector' => '.grid-item:hover .room-book-button')
                                ),
                                'Slider' => array(
                                    array(
                                        'property' => 'background-color',
                                        'label'    => esc_html__( 'Slider Background color', 'ssc' ),
                                        'selector' => '.grid-item:hover .slick-slider',
                                    ),
                                    // Dots
                                    array(
                                        'property' => 'width',
                                        'label'    => esc_html__( 'Dots Width', 'ssc' ),
                                        'selector' => '.grid-item:hover .slick-dots li button',
                                    ),
                                    array(
                                        'property' => 'height',
                                        'label'    => esc_html__( 'Dots Height', 'ssc' ),
                                        'selector' => '.grid-item:hover .slick-dots li button',
                                    ),
                                    array(
                                        'property' => 'background-color',
                                        'label'    => esc_html__( 'Dots Color', 'ssc' ),
                                        'selector' => '.grid-item:hover .slick-dots li button:before',
                                    ),
                                    array(
                                        'property' => 'background-color',
                                        'label'    => esc_html__( 'Dots Color on Hover and Active', 'ssc' ),
                                        'selector' => '.grid-item:hover .slick-dots li button:hover:before, .slick-dots li button:focus:before, .slick-dots li.slick-active button:before, .slick-dots li.slick-active button:before',
                                    ),
                                    array(
                                        'property' => 'opacity',
                                        'label'    => esc_html__( 'Dots Opacity', 'ssc' ),
                                        'selector' => '.grid-item:hover .slick-dots li button:before',
                                    ),
                                    array(
                                        'property' => 'margin',
                                        'label'    => esc_html__( 'Dots Margin', 'ssc' ),
                                        'selector' => '.grid-item:hover .slick-dots li button:before',
                                    ),
                                    array(
                                        'property' => 'padding',
                                        'label'    => esc_html__( 'Dots Block Padding', 'ssc' ),
                                        'selector' => '.grid-item:hover .slick-dots',
                                    ),
                                    array(
                                        'property' => 'border-radius',
                                        'label'    => esc_html__( 'Dots Border Radius', 'ssc' ),
                                        'selector' => '.grid-item:hover .slick-dots li button:before',
                                    ),
                                    array(
                                        'property' => 'border',
                                        'label'    => esc_html__( 'Dots Border', 'ssc' ),
                                        'selector' => '.grid-item:hover .slick-dots li button:before',
                                    ),
                                    // Arrows
                                    array(
                                        'property' => 'width',
                                        'label'    => esc_html__( 'Arrow Width', 'ssc' ),
                                        'selector' => '.grid-item:hover .slick-prev, .slick-next',
                                    ),
                                    array(
                                        'property' => 'height',
                                        'label'    => esc_html__( 'Arrow Height', 'ssc' ),
                                        'selector' => '.grid-item:hover .slick-prev, .slick-next',
                                    ),
                                    array(
                                        'property' => 'color',
                                        'label'    => esc_html__( 'Arrow Color', 'ssc' ),
                                        'selector' => '.grid-item:hover .slick-prev, .slick-next',
                                    ),
                                    array(
                                        'property' => 'color',
                                        'label'    => esc_html__( 'Arrow Color on hover', 'ssc' ),
                                        'selector' => '.grid-item:hover .slick-prev:hover, .slick-next:hover',
                                    ),
                                    array(
                                        'property' => 'font-size',
                                        'label'    => esc_html__( 'Arrow Font Size', 'ssc' ),
                                        'selector' => '.grid-item:hover .slick-prev, .slick-next',
                                    ),
                                    array(
                                        'property' => 'line-height',
                                        'label'    => esc_html__( 'Arrow Line Height', 'ssc' ),
                                        'selector' => '.grid-item:hover .slick-prev, .slick-next',
                                    ),
                                    array(
                                        'property' => 'background-color',
                                        'label'    => esc_html__( 'Arrow Background Color', 'ssc' ),
                                        'selector' => '.grid-item:hover .slick-prev, .slick-next',
                                    ),
                                    array(
                                        'property' => 'background-color',
                                        'label'    => esc_html__( 'Arrow Background Color on hover', 'ssc' ),
                                        'selector' => '.grid-item:hover .slick-prev:hover, .slick-next:hover',
                                    ),
                                    array(
                                        'property' => 'opacity',
                                        'label'    => esc_html__( 'Arrow Opacity', 'ssc' ),
                                        'selector' => '.grid-item:hover .slick-prev, .slick-next',
                                    ),
                                    array(
                                        'property' => 'font-weight',
                                        'label'    => esc_html__( 'Arrow Font Weight', 'ssc' ),
                                        'selector' => '.grid-item:hover .slick-prev i:before, .slick-next i:before,',
                                    ),
                                    array(
                                        'property' => 'border',
                                        'label'    => esc_html__( 'Arrow Border', 'ssc' ),
                                        'selector' => '.grid-item:hover .slick-prev, .slick-next',
                                    ),
                                    array(
                                        'property' => 'border',
                                        'label'    => esc_html__( 'Arrow Border on Hover', 'ssc' ),
                                        'selector' => '.grid-item:hover .slick-prev:hover, .slick-next:hover',
                                    ),
                                    array(
                                        'property' => 'border-radius',
                                        'label'    => esc_html__( 'Arrow Border radius', 'ssc' ),
                                        'selector' => '.grid-item:hover .slick-prev, .slick-next',
                                    ),
                                    array(
                                        'property' => 'border-radius',
                                        'label'    => esc_html__( 'Arrow Border radius on hover', 'ssc' ),
                                        'selector' => '.grid-item:hover .slick-prev:hover, .slick-next:hover',
                                    ),
                                    array(
                                        'property' => 'padding',
                                        'label'    => esc_html__( 'Arrow Padding', 'ssc' ),
                                        'selector' => '.grid-item:hover .slick-prev, .slick-next',
                                    ),
                                    array(
                                        'property' => 'margin',
                                        'label'    => esc_html__( 'Arrow Margin', 'ssc' ),
                                        'selector' => '.grid-item:hover .slick-prev, .slick-next',
                                    ),
                                    array('property' => 'fill', 'label' => esc_html__( 'Fill', 'ssc' ), 'selector' => '.grid-item:hover  .slick-arrow svg'),
                                    array('property' => 'fill', 'label' => esc_html__( 'Fill', 'ssc' ) . ' ' . esc_html__( 'Hover', 'ssc' ), 'selector' => '.grid-item:hover  .slick-arrow:hover svg'),
                                    array(
                                        'property' => 'width',
                                        'label'    => esc_html__( 'SVG Width', 'ssc' ),
                                        'selector' => '.grid-item:hover .slick-arrow svg',
                                    ),
                                    array(
                                        'property' => 'height',
                                        'label'    => esc_html__( 'SVG Height', 'ssc' ),
                                        'selector' => '.grid-item:hover .slick-arrow svg',
                                    ),
                                ),
                                'Icon Box Title' => array(
                                    array('property' => 'background', 'selector' => '.grid-item:hover .atiframebuilder-terms-block-title'),
                                    array('property' => 'color', 'label' => esc_html__( 'Color', 'ssc' ), 'selector' => '.grid-item:hover .atiframebuilder-terms-block-title'),
                                    array('property' => 'font-size', 'label' => esc_html__( 'Font Size', 'ssc' ), 'selector' => '.grid-item:hover .atiframebuilder-terms-block-title'),
                                    array('property' => 'line-height', 'label' => esc_html__( 'Line Height', 'ssc' ), 'selector' => '.grid-item:hover .atiframebuilder-terms-block-title'),
                                    array('property' => 'font-weight', 'label' => esc_html__( 'Font Weight', 'ssc' ), 'selector' => '.grid-item:hover .atiframebuilder-terms-block-title'),
                                    array('property' => 'font-style', 'label' => esc_html__( 'Font Style', 'ssc' ), 'selector' => '.grid-item:hover .atiframebuilder-terms-block-title'),
                                    array('property' => 'font-family', 'label' => esc_html__( 'Font Family', 'ssc' ), 'selector' => '.grid-item:hover .atiframebuilder-terms-block-title'),
                                    array('property' => 'text-align', 'label' => esc_html__( 'Text Align', 'ssc' ), 'selector' => '.grid-item:hover .atiframebuilder-terms-block-title'),
                                    array('property' => 'text-shadow', 'label' => esc_html__( 'Text Shadow', 'ssc' ), 'selector' => '.grid-item:hover .atiframebuilder-terms-block-title'),
                                    array('property' => 'text-transform', 'label' => esc_html__( 'Text Transform', 'ssc' ), 'selector' => '.grid-item:hover .atiframebuilder-terms-block-title'),
                                    array('property' => 'text-decoration', 'label' => esc_html__( 'Text Decoration', 'ssc' ), 'selector' => '.grid-item:hover .atiframebuilder-terms-block-title'),
                                    array('property' => 'letter-spacing', 'label' => esc_html__( 'Letter Spacing', 'ssc' ), 'selector' => '.grid-item:hover .atiframebuilder-terms-block-title'),
                                    array('property' => 'overflow', 'label' => esc_html__( 'Overflow', 'ssc' ), 'selector' => '.grid-item:hover .atiframebuilder-terms-block-title'),
                                    array('property' => 'float', 'label' => esc_html__( 'Float', 'ssc' ), 'selector' => '.grid-item:hover .atiframebuilder-terms-block-title'),
                                    array('property' => 'display', 'label' => esc_html__( 'Display', 'ssc' ), 'selector' => '.grid-item:hover .atiframebuilder-terms-block-title'),
                                    array('property' => 'word-break', 'label' => esc_html__( 'Word Break', 'ssc' ), 'selector' => '.grid-item:hover .atiframebuilder-terms-block-title'),
                                    array('property' => 'margin', 'label' => esc_html__( 'Margin', 'ssc' ), 'selector' => '.grid-item:hover .atiframebuilder-terms-block-title'),
                                    array('property' => 'padding', 'label' => esc_html__( 'Padding', 'ssc' ), 'selector' => '.grid-item:hover .atiframebuilder-terms-block-title'),
                                    array('property' => 'border', 'label' => esc_html__( 'Border', 'ssc' ), 'selector' => '.grid-item:hover .atiframebuilder-terms-block-title'),
                                    array('property' => 'border-radius', 'label' => esc_html__( 'Border Radius', 'ssc' ), 'selector' => '.grid-item:hover .atiframebuilder-terms-block-title'),
                                ),
                                'Icon Box' => array(
                                    array('property' => 'background', 'selector' => '.grid-item:hover .atiframebuilder-terms-block-inner'),
                                    array('property' => 'text-align', 'label' => esc_html__('Text Align', 'ssc' ), 'selector' => '.grid-item:hover .atiframebuilder-terms-block-inner'),
                                    array('property' => 'vertical-align', 'label' => 'Vertical Align', 'selector' => '.grid-item:hover .atiframebuilder-terms-block-inner'),
                                    array('property' => 'margin', 'label' => esc_html__( 'Margin', 'ssc' ), 'selector' => '.grid-item:hover .atiframebuilder-terms-block-inner'),
                                    array('property' => 'padding', 'label' => esc_html__( 'Padding', 'ssc' ), 'selector' => '.grid-item:hover .atiframebuilder-terms-block-inner'),
                                    array('property' => 'border', 'label' => esc_html__( 'Border', 'ssc' ), 'selector' => '.grid-item:hover .atiframebuilder-terms-block-inner'),
                                    array('property' => 'border-radius', 'label' => esc_html__( 'Border Radius', 'ssc' ), 'selector' => '.grid-item:hover .atiframebuilder-terms-block-inner'),
                                    array('property' => 'width', 'label' => esc_html__( 'Width', 'ssc' ), 'selector' => '.grid-item:hover .atiframebuilder-terms-block-inner'),
                                    array('property' => 'height', 'label' => esc_html__( 'Height', 'ssc' ), 'selector' => '.grid-item:hover .atiframebuilder-terms-block-inner'),
                                    array('property' => 'text-align', 'label' => esc_html__('Text Align', 'ssc' ), 'selector' => '.grid-item:hover .atiframebuilder-terms-block-inner'),
                                    array('property' => 'float', 'label' => esc_html__( 'Float', 'ssc' ), 'selector' => '.grid-item:hover .atiframebuilder-terms-block-inner'),
                                    array('property' => 'display', 'label' => esc_html__( 'Display', 'ssc' ), 'selector' => '.grid-item:hover .atiframebuilder-terms-block-inner'),
                                    array('property' => 'box-shadow', 'label' => esc_html__( 'Box Shadow', 'ssc' ), 'selector' => '.grid-item:hover .atiframebuilder-terms-block-inner'),
                                    array('property' => 'opacity', 'label' => esc_html__( 'Opacity', 'ssc' ), 'selector' => '.grid-item:hover .atiframebuilder-terms-block-inner'),
                                ),

                                'Icon' => array(
                                    array('property' => 'background', 'selector' => '.grid-item:hover .fic img, .fic svg'),
                                    array('property' => 'fill', 'label' => esc_html__( 'Color', 'ssc' ), 'selector' => '.grid-item:hover .fic svg'),
                                    array('property' => 'margin', 'label' => esc_html__( 'Margin', 'ssc' ), 'selector' => '.grid-item:hover .fic'),
                                    array('property' => 'padding', 'label' => esc_html__( 'Padding', 'ssc' ), 'selector' => '.grid-item:hover .fic'),
                                    array('property' => 'border', 'label' => esc_html__( 'Border', 'ssc' ), 'selector' => '.grid-item:hover .fic img, .fic svg'),
                                    array('property' => 'border-radius', 'label' => esc_html__( 'Border Radius', 'ssc' ), 'selector' => '.grid-item:hover .fic img, .fic svg'),
                                    array('property' => 'width', 'label' => esc_html__( 'Width', 'ssc' ), 'selector' => '.grid-item:hover .fic img, .fic svg'),
                                    array('property' => 'height', 'label' => esc_html__( 'Height', 'ssc' ), 'selector' => '.grid-item:hover .fic img, .fic svg'),
                                    array('property' => 'float', 'label' => esc_html__( 'Float', 'ssc' ), 'selector' => '.grid-item:hover .fic img, .fic svg'),
                                    array('property' => 'display', 'label' => esc_html__( 'Display', 'ssc' ), 'selector' => '.grid-item:hover .fic img, .fic svg'),
                                    array('property' => 'box-shadow', 'label' => esc_html__( 'Box Shadow', 'ssc' ), 'selector' => '.grid-item:hover .fic img, .fic svg'),
                                    array('property' => 'opacity', 'label' => esc_html__( 'Opacity', 'ssc' ), 'selector' => '.grid-item:hover .fic img, .fic svg'),
                                ),
                                'Icon Label' => array(
                                    array('property' => 'background', 'selector' => '.grid-item:hover .atiframebuilder-term-title'),
                                    array('property' => 'color', 'label' => esc_html__( 'Color', 'ssc' ), 'selector' => '.grid-item:hover .atiframebuilder-term-title'),
                                    array('property' => 'font-size', 'label' => esc_html__( 'Font Size', 'ssc' ), 'selector' => '.grid-item:hover .atiframebuilder-term-title'),
                                    array('property' => 'line-height', 'label' => esc_html__( 'Line Height', 'ssc' ), 'selector' => '.grid-item:hover .atiframebuilder-term-title'),
                                    array('property' => 'font-weight', 'label' => esc_html__( 'Font Weight', 'ssc' ), 'selector' => '.grid-item:hover .atiframebuilder-term-title'),
                                    array('property' => 'font-style', 'label' => esc_html__( 'Font Style', 'ssc' ), 'selector' => '.grid-item:hover .atiframebuilder-term-title'),
                                    array('property' => 'font-family', 'label' => esc_html__( 'Font Family', 'ssc' ), 'selector' => '.grid-item:hover .atiframebuilder-term-title'),
                                    array('property' => 'text-align', 'label' => esc_html__( 'Text Align', 'ssc' ), 'selector' => '.grid-item:hover .atiframebuilder-term-title'),
                                    array('property' => 'text-shadow', 'label' => esc_html__( 'Text Shadow', 'ssc' ), 'selector' => '.grid-item:hover .atiframebuilder-term-title'),
                                    array('property' => 'text-transform', 'label' => esc_html__( 'Text Transform', 'ssc' ), 'selector' => '.grid-item:hover .atiframebuilder-term-title'),
                                    array('property' => 'text-decoration', 'label' => esc_html__( 'Text Decoration', 'ssc' ), 'selector' => '.grid-item:hover .atiframebuilder-term-title'),
                                    array('property' => 'letter-spacing', 'label' => esc_html__( 'Letter Spacing', 'ssc' ), 'selector' => '.grid-item:hover .atiframebuilder-term-title'),
                                    array('property' => 'overflow', 'label' => esc_html__( 'Overflow', 'ssc' ), 'selector' => '.grid-item:hover .atiframebuilder-term-title'),
                                    array('property' => 'float', 'label' => esc_html__( 'Float', 'ssc' ), 'selector' => '.grid-item:hover .atiframebuilder-term-title'),
                                    array('property' => 'display', 'label' => esc_html__( 'Display', 'ssc' ), 'selector' => '.grid-item:hover .atiframebuilder-term-title'),
                                    array('property' => 'word-break', 'label' => esc_html__( 'Word Break', 'ssc' ), 'selector' => '.grid-item:hover .atiframebuilder-term-title'),
                                    array('property' => 'margin', 'label' => esc_html__( 'Margin', 'ssc' ), 'selector' => '.grid-item:hover .atiframebuilder-term-title'),
                                    array('property' => 'padding', 'label' => esc_html__( 'Padding', 'ssc' ), 'selector' => '.grid-item:hover .atiframebuilder-term-title'),
                                    array('property' => 'border', 'label' => esc_html__( 'Border', 'ssc' ), 'selector' => '.grid-item:hover .atiframebuilder-term-title'),
                                    array('property' => 'border-radius', 'label' => esc_html__( 'Border Radius', 'ssc' ), 'selector' => '.grid-item:hover .atiframebuilder-term-title'),
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
function ssc_rooms_grid_shortcode($atts, $content = null) {
	$grid_settings = $grid_type = $image = $price = $discount = '';
	$size = 'full';
		extract(shortcode_atts(array(
        'grid_type' => 'masonry', //  +
        'template' => '1', //+
        'items' => 12,
//        'show_pagination' => 'yes',//+
//        'navi_type' => 'buttons',//+
//        'prev' => esc_html__( 'Older Rooms', 'ssc' ),//+
//        'next' => esc_html__( 'Never Rooms', 'ssc' ),//+
        'ior' => 3, //+
        'limit_words' => 20,//+
        'limit_t_lines' => 2,//+
        'show_thumb' => 'yes',//+
	    'thumb_size' => 'full',
        'custom_thumb_size' => '400x200',

        'monocolored' => 'yes',
        'strength' => 0,
        'hover_effect' => 'none',
		'show_price' => 'yes',
//        'filter_type' => 'tags', //+
//        'withtags' => '',
        'order' => '', //+
        'orderby' => '', //+
        'show_rating' => 'yes',
        'show_book_button' => 'yes',
        'book_text' => esc_html__( 'Book room now', 'ssc' ),
        'show_terms' => 'yes',
//        'show_filters' => 'yes',
//        'all' => esc_html__( 'All rooms', 'ssc' ), //+
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

	if ( (int) $template >= 20 ) {
		$grid_type = 'ssc-slick';
		$dots      = ( 'yes' == $dots ) ? true : false;
		$p_arrow   = '';
		$n_arow    = '';
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

		$settings      = json_encode(
			array(
				'slidesToShow'       => $d_items,
				'slidesToScroll'     => $scroll,
				'dots'               => $dots,
				'prevArrow'          => $p_arrow,
				'nextArrow'          => $n_arow,
				'tabletBreakpoint'   => 769,
				'tabletSlidesToShow' => $t_items,
				'mobileBreakpoint'   => 480,
				'mobileSlidesToShow' => $m_items,
			)
		);
		$grid_settings = "data-ssc-slick-settings='$settings' data-ssc-grid-type='$grid_type'";

		kc_js_callback( 'kc_front.ssc_slick' );

	} else {

		wp_enqueue_script( 'isotope', SSC_URL . 'js/isotope.pkgd.min.js',
			array( 'jquery' ),
			false,
			true );
		wp_enqueue_script( 'imagesloaded' );

		if ( $grid_type === 'grid' ) {

			$settings      = json_encode(
				array(
					'layoutMode' => 'fitRows',
				)
			);
			$grid_settings = "data-ssc-grid-settings='$settings' data-ssc-grid-type='$grid_type'";

			kc_js_callback( 'kc_front.ssc_isotope' );
		} elseif ( $grid_type === 'masonry' ) {

			$settings      = json_encode(
				array(
					'layoutMode' => 'masonry',
				)
			);
			$grid_settings = "data-ssc-masonry-settings='$settings' data-ssc-grid-type='$grid_type'";

			kc_js_callback( 'kc_front.ssc_masonry' );
		}
	}

	$output = '';

	// Variables
	$paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;

	if ( $atts['items'] == 0 ) {
		$atts['items'] = - 1;
	}
//	$intaglist = implode( "", preg_split( "/:([A-Za-z0-9]+)/", $withtags, - 1, PREG_SPLIT_NO_EMPTY ) );
	$intaglist = array();

	$args = array(
		'posts_per_page'      => $atts['items'],
		'sort'                => $orderby,
		'sort_by'             => $order,
		'paged'               => $paged,
		'categories'          => $intaglist,
		'ignore_sticky_posts' => true,

	);

	$rooms = BABE_Post_types::get_posts( $args );

//	$pcount = $the_query->max_num_pages;

//	if ( empty( $monocolored ) ) {
//		$strength = '0';
//	}

	$mainID = $grid_type;

	$output .= '<div  class="ssc-rooms-grid ssc-grid ' . implode( ' ', $wrp_classes ) . ' col' . $ior . ' items' . $items . ' template' . $template . ' ' . $el_class . '">';

	if ( ! empty( $rooms ) ) {

		// FILTER
//		if ( $show_filters === 'yes' ) {
//			$postIDs = wp_list_pluck( $rooms, 'ID' );
//			if ( ! empty( $postIDs ) && ! is_wp_error( $postIDs ) ) {
//				$cats = wp_get_object_terms( $postIDs, 'categories' );
//				if ( ! empty( $cats ) && ! is_wp_error( $cats ) ) {
//					$all_w = '';
//					if ( $all != '' ) {
//						$all_w = '<li><button class="fbut current" data-filter="*">' . $all . '</button></li>';
//					}
//					$output .= '<ul class="filter fgroup">' . $all_w;
//					foreach ( $cats as $cat ) {
//						$output .= '<li><button class="fbut" data-filter=".' . esc_html( str_replace( ' ', '-', $cat->name ) ) . '">' . $cat->name . '</button></li>';
//					}
//					$output .= '</ul>';
//				}
//			}
//		}
		// FILTER END

		if ( '' !== $thumb_size ) {
			if ( 'custom_size' == $thumb_size && '' !== $custom_thumb_size ) {
				$size = ssc_get_img_sizes_array_from_string( $custom_thumb_size );
			} else {
				$size = $thumb_size;
			}
		}

		$output .= '<div class="' . $mainID . '" ' . $grid_settings . '>';

		foreach ( $rooms as $item ) {
			$descr          = $title = $room_terms = $book_button = '';
			$item_url       = BABE_Functions::get_page_url_with_args( $item['ID'], $_GET );
			if ( $show_thumb === 'yes' ) {
				// Image
				$image = get_the_post_thumbnail( $item['ID'], $size );
				if ( '' === $image ) {
					$image = '<img src="' . SSC_URL . 'images/grid600.gif' . '" alt="" />';
				}
				if ( 'yes' === $monocolored  ) {
					$image = '<a href="' . $item_url . '" class="mo'.$monocolored.' " style="-webkit-filter: grayscale('.$strength.');filter: grayscale('.$strength.');">' . $image . '</a>';
				} else {
					$image = '<a href="' . $item_url . '">' . $image . '</a>';
				}
			}

			if ( 'yes' === $show_rating ) {
				$rating = Atiframebuilder_Room::post_stars_rendering( $item['ID'] );
			}

			if ( 'yes' === $show_price ) {
				$price_old = $item['discount_price_from'] < $item['price_from'] ? '<span class="item_info_price_old">' . BABE_Currency::get_currency_price( $item['price_from'] ) . '</span>' : '';

				$discount = $item['discount'] ? '<div class="item_info_price_discount">-' . $item['discount'] . '%</div>' : '';
				$price    = '<div class="room-price">
					<label>' . __( 'from', 'atiframe-builder' ) . '</label>
					' . $price_old . '
					<span class="room-price-new">' . BABE_Currency::get_currency_price( $item['discount_price_from'] ) . '</span>
					' . $discount . '
				</div>';
			}


			// Elements
			if ( - 1 !== $limit_t_lines ) {
				$title = '<div class="room-title title lines">
	                 <h4 class="lines' . $limit_t_lines . '"><a href="' . $item_url . '">' . $item['post_title'] . '</a></h4>
				</div>';
			}

			// Description
			if ( ! post_password_required( $item['ID'] ) ) {
				if ( - 1 < $limit_words ) {
					$descr = '<div class="room-description">' . BABE_Post_types::get_post_excerpt( $item, $limit_words ) . '</div>';
				}
			}

			// FILTER
//			$filter_class_list = '';
//			if ( $show_filters === 'yes' ) {
//				$catlist = wp_get_object_terms( $item['ID'], 'categories', array( 'fields' => 'names' ) );
//				if ( ! is_wp_error( $catlist ) ) {
//					foreach ( $catlist as $term ) {
//						$filter_class_list .= ' ' . str_replace( ' ', '-', $term );
//					}
//				}
//			}

			if( 'yes' === $show_book_button && ! empty( $book_text ) ) {
				$book_button = '<a class="room-book-button" href="' . $item_url . '">' . $book_text . '</a>';
			}

			if( 'yes' === $show_terms ) {
				$room_terms = Atiframebuilder_Room::get_room_terms( $item['ID'], array( 'show_title' => true ) );
			}

			ob_start();
			include SSC_SHORTCODES_PATH . 'templates/rooms-grid/template' . $template . '.php';
			$output .= ob_get_clean();

		} // end foreach
	} //end count
	$output .= '</div>'; // id grid/masonry closed

	// PAGINSTION
	$output .= '<div class="clear"></div>';

//    if($show_pagination === 'yes' and $navi_type === 'buttons') {
//        $output .= '<div class="nav-links clearfix" role="navigation"><div class="">';
//        $output .= '<div class="nav-previous alignleft">'.get_next_posts_link( '<i class="nat-arrow-left8"></i> '.esc_html( $prev ), $pcount ).'</div>';
//        $output .= '<div class="nav-next alignright">'.get_previous_posts_link( esc_html( $next ) .' <i class="nat-arrow-right8"></i>' ).'</div>';
//        $output .= '</div></div>';
//    }

//    if( $show_pagination === 'yes' and $navi_type === 'numbers' ) {
//        $output .= '<div class="clearfix" role="navigation"><div class="ssc-rooms-grid-navigation ssc-grid-navigation">'.paginate_links( array(
//                'show_all'     => false,
//                'total'        => $pcount,
//                'current'      => max( 1, $paged ),
//                'type'         => 'list',
//                'end_size'     => 3,
//                'mid_size'     => 3,
//                'prev_next'    => false,
//                'add_args'     => false,
//                'add_fragment' => '',
//                'screen_reader_text' => esc_html(''),
//            ) ).'</div></div>';
//    }


	// PAGINATION END

	$output .= '</div>'; // row closed

	$the_query = null;
	wp_reset_postdata();

	return $output;
}

add_shortcode('ssc_rooms_grid', 'ssc_rooms_grid_shortcode');