<?php
add_action('init', 'ssc_postgrid_params', 99);

/**
 * Additional functions
 */

function ssc_postgrid_params() {
    global $kc;
    $kc->add_map(array(
        'ssc_postgrid' => array(
            'name' => esc_html__( 'Blog Post Grid', 'ssc' ),
            'description' => esc_html__( 'It displays posts by post type with unlimited design templates and colors', 'ssc' ),
            'icon' => 'kc-icon-box ssc-icon-6',
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
	                        'hide_when' => array( '20', '21', '22' ),
	                        // 'hide_when' => 'yes'
	                        // hide_when has the opposite effect
	                        // NOTICE: Only use one show_when or hide_when in the same time
	                        // 'show_when' => 'yes,ok,right'
	                        // 'show_when' => array( 'yes', 'ok', 'right' )
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
                            '9'	=> SSC_URL . 'images/post9.jpg',
                            '10'	=> SSC_URL . 'images/post10.jpg',
                            '11'	=> SSC_URL . 'images/post11.jpg',
                            '12'	=> SSC_URL . 'images/post12.jpg',
                            '13'	=> SSC_URL . 'images/post13.jpg',
                            '14'	=> SSC_URL . 'images/post14.jpg',
                            '20'	=> SSC_URL . 'images/post20.jpg',
                            '21'	=> SSC_URL . 'images/post21.jpg',
                            '22'	=> SSC_URL . 'images/post22.jpg',

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
			                'show_when' => array( '20', '21', '22' ),
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
			                'show_when' => array( '20', '21', '22' ),
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
			                'show_when' => array( '20', '21', '22' ),
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
			                'show_when' => array( '20', '21', '22' ),
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
			                'show_when' => array( '20', '21', '22' ),
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
			                'show_when' => array( '20', '21', '22' ),
		                ),
		                'description' => __(' Display dots on the slider', 'ssc')
	                ),
                    array(
                        'name' => 'tax_term',
                        'label' => esc_html__( 'Post Type', 'ssc' ),
                        'type' => 'post_taxonomy',
                        'description' => esc_html__( 'Choose post type to display', 'ssc' ),
                    ),
                    array(
                        'name' => 'ignore_sticky_posts',
                        'label' => esc_html__( 'Ignore Sticky posts', 'ssc' ),
                        'type' => 'toggle',
                        'value' => esc_html__( 'yes', 'ssc'),
                    ),
                    array(
                        'name'          => 'withtags',
                        'label'         => esc_html__( 'Contain Tags', 'ssc'),
                        'type'          => 'autocomplete',
                        'description' => esc_html__( 'If you want so show only posts with specific tag or tags.', 'ssc' ),
                        'options'       => array(
                            'multiple'      => true,
                            'taxonomy'      => 'post_tag'
                        ),
                    ),
                    array(
                        'name' => 'order',
                        'label' => esc_html__( 'Order Of Posts', 'ssc' ),
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
                            'comment_count' => esc_html__( 'Comment Count', 'ssc' ),
                        ),
                        'value' => 'date',
                    ),

                    array(
                        'name' => 'items',
                        'label' => esc_html__( 'Posts Per Page', 'ssc' ),
                        'type' => 'text',
                        'value' => '12',
                        'description' => esc_html__( 'Set -1 if want to show all posts on the page', 'ssc' ),
                    ),
                    array(
                        'name' => 'ior',
                        'label' => esc_html__( 'Posts On Row', 'ssc' ),
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
	                        'hide_when' => array( '20', '21', '22' ),
                        ),
                        'value' => '3',
                    ),
                    array(
                        'name' => 'show_pagination',
                        'label' => esc_html__( 'Show Pagination', 'ssc' ),
                        'type' => 'toggle',
                        'value' => esc_html__( 'Yes', 'ssc' ),
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
                        'value' => esc_html__( 'Older Posts', 'ssc' ),
                        'relation' => array(
                            'parent' => 'navi_type',
                            'show_when' => 'buttons'
                        )
                    ),
                    array(
                        'name' => 'next',
                        'label' => esc_html__( 'Text For Next Button', 'ssc' ),
                        'type' => 'text',
                        'value' => esc_html__( 'Never Posts', 'ssc' ),
                        'relation' => array(
                            'parent' => 'navi_type',
                            'show_when' => 'buttons'
                        )
                    ),

                    array(
                        'name' => 'limit_words',
                        'label' => esc_html__( 'Limit Words For Description', 'ssc' ),
                        'type' => 'text',
                        'value' => '20',
                        'description' => esc_html__( 'Set 0 if you don\'t want to display description or empty if you want to show all', 'ssc' ),
                    ),
	                array(
		                'name' => 'limit_lines',
		                'label' => esc_html__( 'Limit Lines For Title', 'ssc' ),
		                'type' => 'text',
		                'value' => '2',
		                'description' => esc_html__( 'Set 0 if you dont want to limit the title', 'ssc' ),
	                ),
                    array(
                        'name' => 'excerpt_type',
                        'label' => esc_html__( 'Excerpt Type', 'ssc' ),
                        'type' => 'radio',
                        'options' => array(
                            'content' => esc_html__( 'Page Content', 'ssc' ),
                            'excerpt' => esc_html__( 'Page Excerpt', 'ssc' ),
                        ),
                        'value' => 'excerpt',
                        'description' => esc_html__( 'Pick description type: from excerpt field of from editor field', 'ssc' ),
                    ),
                    array(
                        'name' => 'show_thumb',
                        'label' => esc_html__( 'Show Thumbnails', 'ssc' ),
                        'type' => 'toggle',
                        'value' => esc_html__( 'yes', 'ssc' ),
                        'description' => esc_html__( 'Display thumbnails of post in post items.', 'ssc' ),
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
                        'value' => esc_html__( 'yes', 'ssc' ),
                        'description' => esc_html__( 'Display thumbnails zoom of post in post items.', 'ssc' ),
                        'relation' => array(
                            'parent' => 'show_thumb',
                            'show_when' => 'yes'
                        )
                    ),
	                array(
		                'name'          => 'monocolored',
		                'label'         => __(' Grayscale Effect', 'ssc'),
		                'type'          => 'toggle',
		                'description'   => __(' Enable a grayscale effect for images. Images become colorful on hover.', 'ssc')
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
		                'name'          => 'show_icon',
		                'label'         => __('Display icon?', 'ssc'),
		                'type'          => 'toggle',
		                'description'   => __(' Enable to add icon to the overlay.', 'ssc')
	                ),
	                array(
		                'name'     => 'icon',
		                'label'    => __(' Icon on Overlay', 'ssc'),
		                'type'     => 'icon_picker',
		                'value'    => '',
		                'relation' => array(
			                'parent'    => 'show_icon',
			                'show_when' => 'yes'
		                ),
		                'description' => __(' The icon show on overlay layer.', 'ssc')
	                ),
                    array(
                        'name' => 'show_date',
                        'label' => esc_html__( 'Show Date', 'ssc' ),
                        'type' => 'toggle',
                        'value' => esc_html__( 'yes', 'ssc' ),
                        'description' => esc_html__( 'Display date of post in post items.', 'ssc' ),
                    ),
                    array(
                        'name' => 'date_format',
                        'type' => 'text',
                        'label' => esc_html__( 'Set date Format', 'ssc' ),
                        'description' => esc_html__( 'Example: M j, Y . You can read more about date format here:', 'ssc' ) . ' ' . '<a href="https://wordpress.org/support/article/formatting-date-and-time/" target="_blank">https://wordpress.org/support/article/formatting-date-and-time/</a>',
                        'relation' => array(
	                        'parent'    => 'show_date',
	                        'show_when' => 'yes'
                        ),
                    ),
                    array(
                        'name' => 'show_author',
                        'label' => esc_html__( 'Show Author', 'ssc' ),
                        'type' => 'toggle',
                        'value' => esc_html__( 'yes', 'ssc' ),
                        'description' => esc_html__( 'Display author of post in post items.', 'ssc' ),
                    ),
                    array(
                        'name' => 'show_category',
                        'label' => esc_html__( 'Show Category', 'ssc' ),
                        'type' => 'toggle',
                        'value' => esc_html__( 'yes', 'ssc' ),
                        'description' => esc_html__( 'Display category of post in post items.', 'ssc' ),
                    ),
	                array(
		                'name' => 'show_tag',
		                'label' => esc_html__( 'Show Tags', 'ssc' ),
		                'type' => 'toggle',
		                'value' => esc_html__( 'no', 'ssc' ),
		                'description' => esc_html__( 'Display tags in post items.', 'ssc' ),
	                ),
                    array(
                        'name' => 'show_comment',
                        'label' => esc_html__( 'Show Comment Count', 'ssc' ),
                        'type' => 'toggle',
                        'value' => esc_html__( 'yes', 'ssc' ),
                        'description' => esc_html__( 'Display comments count of post in post items.', 'ssc' ),
                    ),

                    array(
                        'name' => 'show_readmore',
                        'label' => esc_html__( 'Read More Link', 'ssc' ),
                        'type' => 'toggle',
                        'value' => esc_html__( 'yes', 'ssc' ),
                        'description' => esc_html__( 'Display read more link in post items.', 'ssc' ),
                    ),
                    array(
                        'name' => 'readmore_text',
                        'label' => esc_html__( 'Read More Link Text', 'ssc' ),
                        'type' => 'text',
                        'value' => esc_html__( 'Read More', 'ssc' ),
                        'relation' => array(
                            'parent' => 'show_readmore',
                            'show_when' => 'yes'
                        )
                    ),
                    array(
                        'name' => 'readmore_icon',
                        'label' => esc_html__( 'Read More SVG Icon', 'ssc' ),
                        'type' => 'attach_image',
                        'admin_label' => true,
                        'relation' => array(
                            'parent' => 'show_readmore',
                            'show_when' => 'yes'
                        )
                    ),
	                array(
		                'name' => 'readmore_icon_color',
		                'type' => 'color_picker',
		                'label' => esc_html__( 'SVG Color', 'ssc' ),
		                'relation' => array(
			                'parent' => 'show_readmore',
			                'show_when' => 'yes'
		                ),
		                'description' => esc_html__( 'Deprecated! Use "fill" field at the "Styling" tab instead.', 'ssc' ),
	                ),
	                array(
		                'name' => 'readmore_icon_hcolor',
		                'type' => 'color_picker',
		                'label' => esc_html__( 'SVG Hover Color', 'ssc' ),
		                'relation' => array(
			                'parent' => 'show_readmore',
			                'show_when' => 'yes'
		                ),
		                'description' => esc_html__( 'Deprecated! Use "fill" field at the "Styling" tab instead.', 'ssc' ),
	                ),
                    array(
                        'name' => 'show_filters',
                        'label' => esc_html__( 'Show Filters', 'ssc' ),
                        'type' => 'toggle',
                        'value' => esc_html__( 'yes', 'ssc' ),
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
                        'label' => esc_html__( 'Word For All Items link', 'ssc' ),
                        'type' => 'text',
                        'value' => esc_html__( 'All items', 'ssc' ),
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
//	                array(
//		                'name'          => 'lazy_load',
//		                'label'         => __('Lazy Load', 'ssc'),
//		                'type'          => 'toggle',
//		                'value'         => 'yes',
//		                'description'   => __('Enable Lazy Load for images.', 'ssc')
//	                ),

                ),
                // Styling
                //Styling
                esc_html__( 'styling', 'ssc') => array(
                    array(
                        'name' => 'my-css',
                        'label' => esc_html__( 'Styling', 'ssc' ),
                        'type' => 'css',
                        'value' => '{`kc-css`:{`any`:{`box`:{`margin|.grid-item`:`inherit inherit 60px inherit`,`padding|.grid-item`:`inherit 15px inherit 15px`},`content-box`:{`margin|.grid-item .body`:`-20px inherit inherit inherit`,`padding|.grid-item .body`:`20px 15px 15px 15px`,`border|.grid-item .body`:`|2px solid #d7dce0|2px solid #d7dce0|2px solid #d7dce0`},`title`:{`margin|.grid-item .title a`:`inherit inherit 5px inherit`},`read-more-link`:{`font-size|.grid-item a.rm`:`12px`,`text-transform|.grid-item a.rm`:`uppercase`}}}}', // remove this if you do not need a default content
                        'description' => esc_html__( 'Styles', 'ssc' ),
                        'options' => array(
                            array(
                                'screens' => "any",
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
                                    array('property' => 'padding', 'label' => esc_html__( 'Padding', 'ssc' ), 'selector' => '.grid-item'),
                                    array('property' => 'padding', 'label' => esc_html__( 'Padding for 2n items', 'ssc' ), 'selector' => '.grid-item:nth-child(2n)'),
                                    array('property' => 'padding', 'label' => esc_html__( 'Padding for 3n items', 'ssc' ), 'selector' => '.grid-item:nth-child(3n)'),
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
                                'Icon' => array(
	                                array('property' => 'color', 'label' => esc_html__('Color', 'ssc' ), 'selector' => '.thumb i, .thumb a i'),
	                                array('property' => 'background-color', 'label' => esc_html__('Background Color', 'ssc' ), 'selector' => '.thumb i, .thumb a i'),
	                                array('property' => 'font-size', 'label' => esc_html__('Font Size', 'ssc' ), 'selector' => '.thumb i, .thumb a i'),
	                                array('property' => 'line-height', 'label' => esc_html__('Line Height', 'ssc' ), 'selector' => '.thumb i, .thumb a i'),
	                                array('property' => 'font-weight', 'label' => esc_html__('Font Weight', 'ssc' ), 'selector' => '.thumb i, .thumb a i'),
	                                array('property' => 'font-family', 'label' => esc_html__('Font Family', 'ssc' ), 'selector' => '.thumb i, .thumb a i'),
	                                array('property' => 'text-transform', 'label' => esc_html__('Text Transform', 'ssc' ), 'selector' => '.thumb i, .thumb a i'),
	                                array('property' => 'text-decoration', 'label' => esc_html__('Text Decoration', 'ssc' ), 'selector' => '.thumb i, .thumb a i'),
	                                array('property' => 'font-style', 'label' => esc_html__('Font Style', 'ssc' ), 'selector' => '.thumb i, .thumb a i'),
	                                array('property' => 'text-align', 'label' => esc_html__('Text Align', 'ssc' ), 'selector' => '.thumb i, .thumb a i'),
	                                array('property' => 'text-shadow', 'label' => esc_html__('Text Shadow', 'ssc' ), 'selector' => '.thumb i, .thumb a i'),
	                                array('property' => 'letter-spacing', 'label' => esc_html__('Letter Spacing', 'ssc' ), 'selector' => '.thumb i, .thumb a i'),
	                                array('property' => 'width', 'label' =>  esc_html__( 'Width', 'ssc' ), 'selector' => '.thumb i, .thumb a i'),
	                                array('property' => 'height', 'label' =>  esc_html__( 'Height', 'ssc' ), 'selector' => '.thumb i, .thumb a i'),
	                                array('property' => 'display', 'label' => esc_html__( 'Display', 'ssc' ), 'selector' => '.thumb i, .thumb a i'),
	                                array('property' => 'float', 'label' => esc_html__( 'Float', 'ssc' ), 'selector' => '.thumb i, .thumb a i'),
	                                array('property' => 'border', 'label' => esc_html__('Border', 'ssc' ), 'selector' => '.thumb i, .thumb a i'),
	                                array('property' => 'border-radius', 'label' => esc_html__( 'Border Radius', 'ssc' ), 'selector' => '.thumb i, .thumb a i'),
	                                array('property' => 'margin', 'label' => esc_html__('Margin', 'ssc' ), 'selector' => '.thumb i, .thumb a i'),
	                                array('property' => 'margin', 'label' => esc_html__('Margin Wrapper', 'ssc' ), 'selector' => '.icoli'),
	                                array('property' => 'padding', 'label' =>esc_html__( 'Padding', 'ssc' ), 'selector' => '.thumb i, .thumb a i')
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
                                // Meta Text
                                'Meta Text' => array(
                                    array('property' => 'background', 'selector' => '.grid-item .meta'),
                                    array('property' => 'color', 'label' => esc_html__( 'Color', 'ssc' ), 'selector' => '.grid-item .meta'),
                                    array('property' => 'font-size', 'label' => esc_html__( 'Font Size', 'ssc' ), 'selector' => '.grid-item .meta'),
                                    array('property' => 'line-height', 'label' => esc_html__( 'Line Height', 'ssc' ), 'selector' => '.grid-item .meta'),
                                    array('property' => 'font-weight', 'label' => esc_html__( 'Font Weight', 'ssc' ), 'selector' => '.grid-item .meta'),
                                    array('property' => 'font-style', 'label' => esc_html__( 'Font Style', 'ssc' ), 'selector' => '.grid-item .meta'),
                                    array('property' => 'font-family', 'label' => esc_html__( 'Font Family', 'ssc' ), 'selector' => '.grid-item .meta'),
                                    array('property' => 'text-align', 'label' => esc_html__( 'Text Align', 'ssc' ), 'selector' => '.grid-item .meta'),
                                    array('property' => 'text-shadow', 'label' => esc_html__( 'Text Shadow', 'ssc' ), 'selector' => '.grid-item .meta'),
                                    array('property' => 'text-transform', 'label' => esc_html__( 'Text Transform', 'ssc' ), 'selector' => '.grid-item .meta'),
                                    array('property' => 'text-decoration', 'label' => esc_html__( 'Text Decoration', 'ssc' ), 'selector' => '.grid-item .meta'),

                                    array('property' => 'letter-spacing', 'label' => esc_html__( 'Letter Spacing', 'ssc' ), 'selector' => '.grid-item .meta'),
	                                array('property' => 'display', 'label' => esc_html__( 'Display', 'ssc' ), 'selector' => '.grid-item .meta'),
                                    array('property' => 'overflow', 'label' => esc_html__( 'Overflow', 'ssc' ), 'selector' => '.grid-item .meta'),
                                    array('property' => 'word-break', 'label' => esc_html__( 'Word Break', 'ssc' ), 'selector' => '.grid-item .meta'),
                                    array('property' => 'margin', 'label' => esc_html__( 'Margin', 'ssc' ), 'selector' => '.grid-item .meta'),
                                    array('property' => 'padding', 'label' => esc_html__( 'Padding', 'ssc' ), 'selector' => '.grid-item .meta'),
                                    array('property' => 'border', 'label' => esc_html__( 'Border', 'ssc' ), 'selector' => '.grid-item .meta'),
                                    array('property' => 'border-radius', 'label' => esc_html__( 'Border Radius', 'ssc' ), 'selector' => '.grid-item .meta'),
                                ),
                                // Meta Links
                                'Meta Links' => array(
                                    array('property' => 'background', 'selector' => '.grid-item .meta a'),
                                    array('property' => 'color', 'label' => esc_html__( 'Color', 'ssc' ), 'selector' => '.grid-item .meta a'),
                                    array('property' => 'font-size', 'label' => esc_html__( 'Font Size', 'ssc' ), 'selector' => '.grid-item .meta a'),
                                    array('property' => 'line-height', 'label' => esc_html__( 'Line Height', 'ssc' ), 'selector' => '.grid-item .meta a'),
                                    array('property' => 'font-weight', 'label' => esc_html__( 'Font Weight', 'ssc' ), 'selector' => '.grid-item .meta a'),
                                    array('property' => 'font-style', 'label' => esc_html__( 'Font Style', 'ssc' ), 'selector' => '.grid-item .meta a'),
                                    array('property' => 'font-family', 'label' => esc_html__( 'Font Family', 'ssc' ), 'selector' => '.grid-item .meta a'),
                                    array('property' => 'text-align', 'label' => esc_html__( 'Text Align', 'ssc' ), 'selector' => '.grid-item .meta a'),
                                    array('property' => 'text-shadow', 'label' => esc_html__( 'Text Shadow', 'ssc' ), 'selector' => '.grid-item .meta a'),
                                    array('property' => 'text-transform', 'label' => esc_html__( 'Text Transform', 'ssc' ), 'selector' => '.grid-item .meta a'),
                                    array('property' => 'text-decoration', 'label' => esc_html__( 'Text Decoration', 'ssc' ), 'selector' => '.grid-item .meta a'),
                                    array('property' => 'letter-spacing', 'label' => esc_html__( 'Letter Spacing', 'ssc' ), 'selector' => '.grid-item .meta a'),
                                    array('property' => 'overflow', 'label' => esc_html__( 'Overflow', 'ssc' ), 'selector' => '.grid-item .meta a'),
                                    array('property' => 'word-break', 'label' => esc_html__( 'Word Break', 'ssc' ), 'selector' => '.grid-item .meta a'),
                                    array('property' => 'margin', 'label' => esc_html__( 'Margin', 'ssc' ), 'selector' => '.grid-item .meta a'),
                                    array('property' => 'padding', 'label' => esc_html__( 'Padding', 'ssc' ), 'selector' => '.grid-item .meta a'),
                                    array('property' => 'border', 'label' => esc_html__( 'Border', 'ssc' ), 'selector' => '.grid-item .meta a'),
                                    array('property' => 'border-radius', 'label' => esc_html__( 'Border Radius', 'ssc' ), 'selector' => '.grid-item .meta a')
                                ),
                                // Meta Icons
                                'Meta Icons' => array(
                                    array('property' => 'background', 'selector' => '.grid-item .meta i'),
                                    array('property' => 'color', 'label' => esc_html__( 'Color', 'ssc' ), 'selector' => '.grid-item .meta i'),
                                    array('property' => 'font-size', 'label' => esc_html__( 'Font Size', 'ssc' ), 'selector' => '.grid-item .meta i'),
                                    array('property' => 'line-height', 'label' => esc_html__( 'Line Height', 'ssc' ), 'selector' => '.grid-item .meta i'),
                                    array('property' => 'font-weight', 'label' => esc_html__( 'Font Weight', 'ssc' ), 'selector' => '.grid-item .meta i'),
                                    array('property' => 'font-style', 'label' => esc_html__( 'Font Style', 'ssc' ), 'selector' => '.grid-item .meta i'),
                                    array('property' => 'font-family', 'label' => esc_html__( 'Font Family', 'ssc' ), 'selector' => '.grid-item .meta i'),
                                    array('property' => 'text-align', 'label' => esc_html__( 'Text Align', 'ssc' ), 'selector' => '.grid-item .meta i'),
                                    array('property' => 'text-shadow', 'label' => esc_html__( 'Text Shadow', 'ssc' ), 'selector' => '.grid-item .meta i'),
                                    array('property' => 'text-transform', 'label' => esc_html__( 'Text Transform', 'ssc' ), 'selector' => '.grid-item .meta i'),
                                    array('property' => 'text-decoration', 'label' => esc_html__( 'Text Decoration', 'ssc' ), 'selector' => '.grid-item .meta i'),
                                    array('property' => 'letter-spacing', 'label' => esc_html__( 'Letter Spacing', 'ssc' ), 'selector' => '.grid-item .meta i'),
                                    array('property' => 'overflow', 'label' => esc_html__( 'Overflow', 'ssc' ), 'selector' => '.grid-item .meta i'),
                                    array('property' => 'word-break', 'label' => esc_html__( 'Word Break', 'ssc' ), 'selector' => '.grid-item .meta i'),
	                                array('property' => 'width', 'label' =>  esc_html__( 'Width', 'ssc' ), 'selector' => '.grid-item .meta i'),
	                                array('property' => 'height', 'label' =>  esc_html__( 'Height', 'ssc' ), 'selector' => '.grid-item .meta i'),
	                                array('property' => 'display', 'label' => esc_html__( 'Display', 'ssc' ), 'selector' => '.grid-item .meta i'),
	                                array('property' => 'float', 'label' => esc_html__( 'Float', 'ssc' ), 'selector' => '.grid-item .meta i'),
                                    array('property' => 'margin', 'label' => esc_html__( 'Margin', 'ssc' ), 'selector' => '.grid-item .meta i'),
                                    array('property' => 'padding', 'label' => esc_html__( 'Padding', 'ssc' ), 'selector' => '.grid-item .meta i'),
                                    array('property' => 'border', 'label' => esc_html__( 'Border', 'ssc' ), 'selector' => '.grid-item .meta i'),
                                    array('property' => 'border-radius', 'label' => esc_html__( 'Border Radius', 'ssc' ), 'selector' => '.grid-item .meta i')
                                ),
                                // Date
                                'Date' => array(
                                    array('property' => 'background', 'selector' => '.grid-item .date'),
                                    array('property' => 'color', 'label' => esc_html__( 'Color', 'ssc' ), 'selector' => '.grid-item .date'),
                                    array('property' => 'font-size', 'label' => esc_html__( 'Font Size', 'ssc' ), 'selector' => '.grid-item .date'),
                                    array('property' => 'line-height', 'label' => esc_html__( 'Line Height', 'ssc' ), 'selector' => '.grid-item .date'),
                                    array('property' => 'font-weight', 'label' => esc_html__( 'Font Weight', 'ssc' ), 'selector' => '.grid-item .date'),
                                    array('property' => 'font-style', 'label' => esc_html__( 'Font Style', 'ssc' ), 'selector' => '.grid-item .date'),
                                    array('property' => 'font-family', 'label' => esc_html__( 'Font Family', 'ssc' ), 'selector' => '.grid-item .date'),
                                    array('property' => 'text-align', 'label' => esc_html__( 'Text Align', 'ssc' ), 'selector' => '.grid-item .date'),
                                    array('property' => 'text-shadow', 'label' => esc_html__( 'Text Shadow', 'ssc' ), 'selector' => '.grid-item .date'),
                                    array('property' => 'text-transform', 'label' => esc_html__( 'Text Transform', 'ssc' ), 'selector' => '.grid-item .date'),
                                    array('property' => 'text-decoration', 'label' => esc_html__( 'Text Decoration', 'ssc' ), 'selector' => '.grid-item .date'),
                                    array('property' => 'letter-spacing', 'label' => esc_html__( 'Letter Spacing', 'ssc' ), 'selector' => '.grid-item .date'),
                                    array('property' => 'overflow', 'label' => esc_html__( 'Overflow', 'ssc' ), 'selector' => '.grid-item .date'),
                                    array('property' => 'word-break', 'label' => esc_html__( 'Word Break', 'ssc' ), 'selector' => '.grid-item .date'),
                                    array('property' => 'margin', 'label' => esc_html__( 'Margin', 'ssc' ), 'selector' => '.grid-item .date'),
                                    array('property' => 'padding', 'label' => esc_html__( 'Padding', 'ssc' ), 'selector' => '.grid-item .date'),
                                    array('property' => 'border', 'label' => esc_html__( 'Border', 'ssc' ), 'selector' => '.grid-item .date'),
                                    array('property' => 'border-radius', 'label' => esc_html__( 'Border Radius', 'ssc' ), 'selector' => '.grid-item .date'),
	                                array('property' => 'float', 'label' => esc_html__( 'Float', 'ssc' ), 'selector' => '.grid-item .date'),
	                                array('property' => 'display', 'label' => esc_html__( 'Display', 'ssc' ), 'selector' => '.grid-item .date'),
                                ),
                                // Comments
                                'Comments' => array(
                                    array('property' => 'background', 'selector' => '.grid-item .commentsc'),
                                    array('property' => 'color', 'label' => esc_html__( 'Color', 'ssc' ), 'selector' => '.grid-item .commentsc, .grid-item .commentsc a'),
                                    array('property' => 'font-size', 'label' => esc_html__( 'Font Size', 'ssc' ), 'selector' => '.grid-item .commentsc'),
                                    array('property' => 'line-height', 'label' => esc_html__( 'Line Height', 'ssc' ), 'selector' => '.grid-item .commentsc'),
                                    array('property' => 'font-weight', 'label' => esc_html__( 'Font Weight', 'ssc' ), 'selector' => '.grid-item .commentsc'),
                                    array('property' => 'font-style', 'label' => esc_html__( 'Font Style', 'ssc' ), 'selector' => '.grid-item .commentsc'),
                                    array('property' => 'font-family', 'label' => esc_html__( 'Font Family', 'ssc' ), 'selector' => '.grid-item .commentsc'),
                                    array('property' => 'text-align', 'label' => esc_html__( 'Text Align', 'ssc' ), 'selector' => '.grid-item .commentsc'),
                                    array('property' => 'text-shadow', 'label' => esc_html__( 'Text Shadow', 'ssc' ), 'selector' => '.grid-item .commentsc'),
                                    array('property' => 'text-transform', 'label' => esc_html__( 'Text Transform', 'ssc' ), 'selector' => '.grid-item .commentsc'),
                                    array('property' => 'text-decoration', 'label' => esc_html__( 'Text Decoration', 'ssc' ), 'selector' => '.grid-item .commentsc, .grid-item .commentsc a'),
                                    array('property' => 'letter-spacing', 'label' => esc_html__( 'Letter Spacing', 'ssc' ), 'selector' => '.grid-item .commentsc'),
                                    array('property' => 'overflow', 'label' => esc_html__( 'Overflow', 'ssc' ), 'selector' => '.grid-item .commentsc'),
                                    array('property' => 'word-break', 'label' => esc_html__( 'Word Break', 'ssc' ), 'selector' => '.grid-item .commentsc'),
                                    array('property' => 'margin', 'label' => esc_html__( 'Margin', 'ssc' ), 'selector' => '.grid-item .commentsc'),
                                    array('property' => 'padding', 'label' => esc_html__( 'Padding', 'ssc' ), 'selector' => '.grid-item .commentsc'),
                                    array('property' => 'border', 'label' => esc_html__( 'Border', 'ssc' ), 'selector' => '.grid-item .commentsc'),
                                    array('property' => 'border-radius', 'label' => esc_html__( 'Border Radius', 'ssc' ), 'selector' => '.grid-item .commentsc')
                                ),
                                'Category' => array(
	                                array('property' => 'background', 'selector' => '.post-categories a, .cats a'),
	                                array('property' => 'color', 'label' => esc_html__( 'Color', 'ssc' ), 'selector' => '.post-categories a, .cats a'),
	                                array('property' => 'font-size', 'label' => esc_html__( 'Font Size', 'ssc' ), 'selector' => '.post-categories a, .cats a'),
	                                array('property' => 'line-height', 'label' => esc_html__( 'Line Height', 'ssc' ), 'selector' => '.post-categories a, .cats a'),
	                                array('property' => 'font-weight', 'label' => esc_html__( 'Font Weight', 'ssc' ), 'selector' => '.post-categories a, .cats a'),
	                                array('property' => 'font-style', 'label' => esc_html__( 'Font Style', 'ssc' ), 'selector' => '.post-categories a, .cats a'),
	                                array('property' => 'font-family', 'label' => esc_html__( 'Font Family', 'ssc' ), 'selector' => '.post-categories a, .cats a'),
	                                array('property' => 'text-align', 'label' => esc_html__( 'Text Align', 'ssc' ), 'selector' => '.post-categories a, .cats a'),
	                                array('property' => 'text-shadow', 'label' => esc_html__( 'Text Shadow', 'ssc' ), 'selector' => '.post-categories a, .cats a'),
	                                array('property' => 'text-transform', 'label' => esc_html__( 'Text Transform', 'ssc' ), 'selector' => '.post-categories a, .cats a'),
	                                array('property' => 'text-decoration', 'label' => esc_html__( 'Text Decoration', 'ssc' ), 'selector' => '.post-categories a, .cats a'),
	                                array('property' => 'letter-spacing', 'label' => esc_html__( 'Letter Spacing', 'ssc' ), 'selector' => '.post-categories a, .cats a'),
	                                array('property' => 'overflow', 'label' => esc_html__( 'Overflow', 'ssc' ), 'selector' => '.post-categories a, .cats a'),
	                                array('property' => 'float', 'label' => esc_html__( 'Float', 'ssc' ), 'selector' => '.post-categories a, .cats a'),
	                                array('property' => 'display', 'label' => esc_html__( 'Display', 'ssc' ), 'selector' => '.post-categories a, .cats a'),
	                                array('property' => 'word-break', 'label' => esc_html__( 'Word Break', 'ssc' ), 'selector' => '.post-categories a, .cats a'),
	                                array('property' => 'margin', 'label' => esc_html__( 'Margin', 'ssc' ), 'selector' => '.post-categories a, .cats a'),
	                                array('property' => 'padding', 'label' => esc_html__( 'Padding', 'ssc' ), 'selector' => '.post-categories a, .cats a'),
	                                array('property' => 'border', 'label' => esc_html__( 'Border', 'ssc' ), 'selector' => '.post-categories a, .cats a'),
	                                array('property' => 'border-radius', 'label' => esc_html__( 'Border Radius', 'ssc' ), 'selector' => '.post-categories a, .cats a'),
                                ),
                                // Description
                                'Description' => array(
                                    array('property' => 'background', 'selector' => '.grid-item p'),
                                    array('property' => 'color', 'label' => esc_html__( 'Color', 'ssc' ), 'selector' => '.grid-item p'),
                                    array('property' => 'font-size', 'label' => esc_html__( 'Font Size', 'ssc' ), 'selector' => '.grid-item p'),
                                    array('property' => 'line-height', 'label' => esc_html__( 'Line Height', 'ssc' ), 'selector' => '.grid-item p'),
                                    array('property' => 'font-weight', 'label' => esc_html__( 'Font Weight', 'ssc' ), 'selector' => '.grid-item p'),
                                    array('property' => 'font-style', 'label' => esc_html__( 'Font Style', 'ssc' ), 'selector' => '.grid-item p'),
                                    array('property' => 'font-family', 'label' => esc_html__( 'Font Family', 'ssc' ), 'selector' => '.grid-item p'),
                                    array('property' => 'text-align', 'label' => esc_html__( 'Text Align', 'ssc' ), 'selector' => '.grid-item p'),
                                    array('property' => 'text-shadow', 'label' => esc_html__( 'Text Shadow', 'ssc' ), 'selector' => '.grid-item p'),
                                    array('property' => 'text-transform', 'label' => esc_html__( 'Text Transform', 'ssc' ), 'selector' => '.grid-item p'),
                                    array('property' => 'text-decoration', 'label' => esc_html__( 'Text Decoration', 'ssc' ), 'selector' => '.grid-item p'),
                                    array('property' => 'letter-spacing', 'label' => esc_html__( 'Letter Spacing', 'ssc' ), 'selector' => '.grid-item p'),
                                    array('property' => 'overflow', 'label' => esc_html__( 'Overflow', 'ssc' ), 'selector' => '.grid-item p'),
                                    array('property' => 'word-break', 'label' => esc_html__( 'Word Break', 'ssc' ), 'selector' => '.grid-item p'),
                                    array('property' => 'margin', 'label' => esc_html__( 'Margin', 'ssc' ), 'selector' => '.grid-item p'),
                                    array('property' => 'padding', 'label' => esc_html__( 'Padding', 'ssc' ), 'selector' => '.grid-item p'),
                                    array('property' => 'border', 'label' => esc_html__( 'Border', 'ssc' ), 'selector' => '.grid-item p'),
                                    array('property' => 'border-radius', 'label' => esc_html__( 'Border Radius', 'ssc' ), 'selector' => '.grid-item p')
                                ),
                                // Read More Link
                                'Read More Link' => array(
                                    array('property' => 'background', 'selector' => '.grid-item a.rm'),
                                    array('property' => 'color', 'label' => esc_html__( 'Color', 'ssc' ), 'selector' => '.grid-item a.rm'),
                                    array('property' => 'font-size', 'label' => esc_html__( 'Font Size', 'ssc' ), 'selector' => '.grid-item a.rm'),
                                    array('property' => 'line-height', 'label' => esc_html__( 'Line Height', 'ssc' ), 'selector' => '.grid-item a.rm'),
                                    array('property' => 'font-weight', 'label' => esc_html__( 'Font Weight', 'ssc' ), 'selector' => '.grid-item a.rm'),
                                    array('property' => 'font-style', 'label' => esc_html__( 'Font Style', 'ssc' ), 'selector' => '.grid-item a.rm'),
                                    array('property' => 'font-family', 'label' => esc_html__( 'Font Family', 'ssc' ), 'selector' => '.grid-item a.rm'),
                                    array('property' => 'text-align', 'label' => esc_html__( 'Text Align', 'ssc' ), 'selector' => '.grid-item a.rm'),
                                    array('property' => 'text-shadow', 'label' => esc_html__( 'Text Shadow', 'ssc' ), 'selector' => '.grid-item a.rm'),
	                                array('property' => 'box-shadow', 'label' => esc_html__( 'Box Shadow', 'ssc' ), 'selector' => '.grid-item a.rm'),
                                    array('property' => 'text-transform', 'label' => esc_html__( 'Text Transform', 'ssc' ), 'selector' => '.grid-item a.rm'),
                                    array('property' => 'text-decoration', 'label' => esc_html__( 'Text Decoration', 'ssc' ), 'selector' => '.grid-item a.rm'),
                                    array('property' => 'letter-spacing', 'label' => esc_html__( 'Letter Spacing', 'ssc' ), 'selector' => '.grid-item a.rm'),
                                    array('property' => 'opacity', 'label' => esc_html__( 'Opacity', 'ssc' ), 'selector' => '.grid-item a.rm'),
                                    array('property' => 'width', 'label' => esc_html__( 'Width', 'ssc' ), 'selector' => '.grid-item a.rm'),
                                    array('property' => 'height', 'label' => esc_html__( 'Height', 'ssc' ), 'selector' => '.grid-item a.rm'),
                                    array('property' => 'display', 'label' => esc_html__( 'Display', 'ssc' ), 'selector' => '.grid-item a.rm'),
                                    array('property' => 'float', 'label' => esc_html__( 'Float', 'ssc' ), 'selector' => '.grid-item a.rm'),
                                    array('property' => 'overflow', 'label' => esc_html__( 'Overflow', 'ssc' ), 'selector' => '.grid-item a.rm'),
                                    array('property' => 'word-break', 'label' => esc_html__( 'Word Break', 'ssc' ), 'selector' => '.grid-item a.rm'),
                                    array('property' => 'margin', 'label' => esc_html__( 'Margin', 'ssc' ), 'selector' => '.grid-item a.rm'),
                                    array('property' => 'padding', 'label' => esc_html__( 'Padding', 'ssc' ), 'selector' => '.grid-item a.rm'),
                                    array('property' => 'border', 'label' => esc_html__( 'Border', 'ssc' ), 'selector' => '.grid-item a.rm'),
                                    array('property' => 'border-radius', 'label' => esc_html__( 'Border Radius', 'ssc' ), 'selector' => '.grid-item a.rm')
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
                                    array('property' => 'background', 'selector' => '.filter li .fbut.current'),
                                    array('property' => 'color', 'label' => esc_html__( 'Color', 'ssc' ), 'selector' => '.filter li .fbut'),
                                    array('property' => 'color', 'label' => esc_html__( 'Color', 'ssc' ).esc_html__( 'Current', 'ssc' ), 'selector' => '.filter li .fbut.current'),
                                    array('property' => 'font-size', 'label' => esc_html__( 'Font Size', 'ssc' ), 'selector' => '.filter li .fbut'),
                                    array('property' => 'line-height', 'label' => esc_html__( 'Line Height', 'ssc' ), 'selector' => '.filter li .fbut'),
                                    array('property' => 'font-weight', 'label' => esc_html__( 'Font Weight', 'ssc' ), 'selector' => '.filter li .fbut'),
                                    array('property' => 'font-style', 'label' => esc_html__( 'Font Style', 'ssc' ), 'selector' => '.filter li .fbut'),
                                    array('property' => 'font-family', 'label' => esc_html__( 'Font Family', 'ssc' ), 'selector' => '.filter li .fbut'),
                                    array('property' => 'text-align', 'label' => esc_html__( 'Text Align', 'ssc' ), 'selector' => '.filter'),
                                    array('property' => 'text-shadow', 'label' => esc_html__( 'Text Shadow', 'ssc' ), 'selector' => '.filter li .fbut'),
                                    array('property' => 'box-shadow', 'label' => esc_html__( 'Box Shadow', 'ssc' ), 'selector' => '.filter li .fbut'),
                                    array('property' => 'box-shadow', 'label' => esc_html__( 'Box Shadow', 'ssc' ), 'selector' => '.filter li .fbut.current'),
                                    array('property' => 'text-transform', 'label' => esc_html__( 'Text Transform', 'ssc' ), 'selector' => '.filter li .fbut'),
                                    array('property' => 'text-decoration', 'label' => esc_html__( 'Text Decoration', 'ssc' ), 'selector' => '.filter li .fbut'),
                                    array('property' => 'letter-spacing', 'label' => esc_html__( 'Letter Spacing', 'ssc' ), 'selector' => '.filter li .fbut'),
	                                array('property' => 'width', 'label' => 'Width', 'selector' => '.filter'),
	                                array('property' => 'height', 'label' => 'Height', 'selector' => '.filter'),
	                                array('property' => 'max-width', 'label' => 'Max-Width', 'selector' => '.filter'),
                                    array('property' => 'overflow', 'label' => esc_html__( 'Overflow', 'ssc' ), 'selector' => '.filter li .fbut'),
                                    array('property' => 'opacity', 'label' => esc_html__( 'Opacity', 'ssc' ), 'selector' => '.filter li .fbut'),
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
			                            'selector' => '.slick-dots li',
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
	                            'SVG' => array(
		                            array('property' => 'fill', 'label' => esc_html__( 'Fill', 'ssc' ), 'selector' => ' .rm svg'),
		                            array('property' => 'fill', 'label' => esc_html__( 'Fill', 'ssc' ) . ' ' . esc_html__( 'Hover', 'ssc' ), 'selector' => ' .rm:hover svg'),
		                            array(
			                            'property' => 'display',
			                            'label'    => esc_html__( 'Display', 'ssc' ),
			                            'selector' => '.rm svg',
		                            ),
		                            array(
			                            'property' => 'float',
			                            'label'    => esc_html__( 'Float', 'ssc' ),
			                            'selector' => '.rm svg',
		                            ),
		                            array(
			                            'property' => 'width',
			                            'label'    => esc_html__( 'Width', 'ssc' ),
			                            'selector' => '.rm svg',
		                            ),
		                            array(
			                            'property' => 'height',
			                            'label'    => esc_html__( 'Height', 'ssc' ),
			                            'selector' => '.rm svg',
		                            ),
		                            array('property' => 'background', 'selector' => '.rm svg'),
		                            array('property' => 'margin', 'label' => esc_html__( 'Margin', 'ssc' ), 'selector' => '.rm svg'),
		                            array('property' => 'padding', 'label' => esc_html__( 'Padding', 'ssc' ), 'selector' => '.rm svg'),
		                            array('property' => 'border', 'label' => esc_html__( 'Border', 'ssc' ), 'selector' => '.rm svg'),
		                            array('property' => 'border-radius', 'label' => esc_html__( 'Border Radius', 'ssc' ), 'selector' => '.rm svg'),
		                            array('property' => 'box-shadow', 'label' => esc_html__( 'Box Shadow', 'ssc' ), 'selector' => '.rm svg'),
		                            array('property' => 'opacity', 'label' => esc_html__( 'Opacity', 'ssc' ), 'selector' => '.rm svg'),
	                            ),
                            ),
                            array(
                                "screens" => "999,768,667,479",
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
                                    array('property' => 'padding', 'label' => esc_html__( 'Padding for 2n items', 'ssc' ), 'selector' => '.grid-item:nth-child(2n)'),
                                    array('property' => 'padding', 'label' => esc_html__( 'Padding for 3n items', 'ssc' ), 'selector' => '.grid-item:nth-child(3n)'),
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
                                'Icon' => array(
	                                array('property' => 'color', 'label' => esc_html__('Color', 'ssc' ), 'selector' => '.thumb i, .thumb a i'),
	                                array('property' => 'background-color', 'label' => esc_html__('Background Color', 'ssc' ), 'selector' => '.thumb i, .thumb a i'),
	                                array('property' => 'font-size', 'label' => esc_html__('Font Size', 'ssc' ), 'selector' => '.thumb i, .thumb a i'),
	                                array('property' => 'line-height', 'label' => esc_html__('Line Height', 'ssc' ), 'selector' => '.thumb i, .thumb a i'),
	                                array('property' => 'font-weight', 'label' => esc_html__('Font Weight', 'ssc' ), 'selector' => '.thumb i, .thumb a i'),
	                                array('property' => 'font-family', 'label' => esc_html__('Font Family', 'ssc' ), 'selector' => '.thumb i, .thumb a i'),
	                                array('property' => 'text-transform', 'label' => esc_html__('Text Transform', 'ssc' ), 'selector' => '.thumb i, .thumb a i'),
	                                array('property' => 'text-decoration', 'label' => esc_html__('Text Decoration', 'ssc' ), 'selector' => '.thumb i, .thumb a i'),
	                                array('property' => 'font-style', 'label' => esc_html__('Font Style', 'ssc' ), 'selector' => '.thumb i, .thumb a i'),
	                                array('property' => 'text-align', 'label' => esc_html__('Text Align', 'ssc' ), 'selector' => '.thumb i, .thumb a i'),
	                                array('property' => 'text-shadow', 'label' => esc_html__('Text Shadow', 'ssc' ), 'selector' => '.thumb i, .thumb a i'),
	                                array('property' => 'letter-spacing', 'label' => esc_html__('Letter Spacing', 'ssc' ), 'selector' => '.thumb i, .thumb a i'),
	                                array('property' => 'width', 'label' =>  esc_html__( 'Width', 'ssc' ), 'selector' => '.thumb i, .thumb a i'),
	                                array('property' => 'height', 'label' =>  esc_html__( 'Height', 'ssc' ), 'selector' => '.thumb i, .thumb a i'),
	                                array('property' => 'display', 'label' => esc_html__( 'Display', 'ssc' ), 'selector' => '.thumb i, .thumb a i'),
	                                array('property' => 'float', 'label' => esc_html__( 'Float', 'ssc' ), 'selector' => '.thumb i, .thumb a i'),
	                                array('property' => 'border', 'label' => esc_html__('Border', 'ssc' ), 'selector' => '.thumb i, .thumb a i'),
	                                array('property' => 'border-radius', 'label' => esc_html__( 'Border Radius', 'ssc' ), 'selector' => '.thumb i, .thumb a i'),
	                                array('property' => 'margin', 'label' => esc_html__('Margin', 'ssc' ), 'selector' => '.thumb i, .thumb a i'),
	                                array('property' => 'margin', 'label' => esc_html__('Margin Wrapper', 'ssc' ), 'selector' => '.icoli'),
	                                array('property' => 'padding', 'label' =>esc_html__( 'Padding', 'ssc' ), 'selector' => '.thumb i, .thumb a i')
                                ),
                                // Content Box
                                'Content Box' => array(
                                    array('property' => 'background', 'selector' => '.grid-item .body'),
                                    array('property' => 'margin', 'label' => esc_html__( 'Margin', 'ssc' ), 'selector' => '.grid-item .body'),
                                    array('property' => 'padding', 'label' => esc_html__( 'Padding', 'ssc' ), 'selector' => '.grid-item .body'),
                                    array('property' => 'border', 'label' => esc_html__( 'Border', 'ssc' ), 'selector' => '.grid-item .body'),
                                    array('property' => 'border-radius', 'label' => esc_html__( 'Border Radius', 'ssc' ), 'selector' => '.grid-item .body'),
                                    array('property' => 'width', 'label' => esc_html__( 'Width', 'ssc' ), 'selector' => '.grid-item .body'),
                                    array('property' => 'height', 'label' => esc_html__( 'Height', 'ssc' ), 'selector' => '.grid-item .body'),
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
                                // Meta Text
                                'Meta Text' => array(
                                    array('property' => 'background', 'selector' => '.grid-item .meta'),
                                    array('property' => 'color', 'label' => esc_html__( 'Color', 'ssc' ), 'selector' => '.grid-item .meta'),
                                    array('property' => 'font-size', 'label' => esc_html__( 'Font Size', 'ssc' ), 'selector' => '.grid-item .meta'),
                                    array('property' => 'line-height', 'label' => esc_html__( 'Line Height', 'ssc' ), 'selector' => '.grid-item .meta'),
                                    array('property' => 'font-weight', 'label' => esc_html__( 'Font Weight', 'ssc' ), 'selector' => '.grid-item .meta'),
                                    array('property' => 'font-style', 'label' => esc_html__( 'Font Style', 'ssc' ), 'selector' => '.grid-item .meta'),
                                    array('property' => 'font-family', 'label' => esc_html__( 'Font Family', 'ssc' ), 'selector' => '.grid-item .meta'),
                                    array('property' => 'text-align', 'label' => esc_html__( 'Text Align', 'ssc' ), 'selector' => '.grid-item .meta'),
                                    array('property' => 'text-shadow', 'label' => esc_html__( 'Text Shadow', 'ssc' ), 'selector' => '.grid-item .meta'),
                                    array('property' => 'text-transform', 'label' => esc_html__( 'Text Transform', 'ssc' ), 'selector' => '.grid-item .meta'),
                                    array('property' => 'text-decoration', 'label' => esc_html__( 'Text Decoration', 'ssc' ), 'selector' => '.grid-item .meta'),

                                    array('property' => 'letter-spacing', 'label' => esc_html__( 'Letter Spacing', 'ssc' ), 'selector' => '.grid-item .meta'),
                                    array('property' => 'overflow', 'label' => esc_html__( 'Overflow', 'ssc' ), 'selector' => '.grid-item .meta'),
                                    array('property' => 'word-break', 'label' => esc_html__( 'Word Break', 'ssc' ), 'selector' => '.grid-item .meta'),
                                    array('property' => 'margin', 'label' => esc_html__( 'Margin', 'ssc' ), 'selector' => '.grid-item .meta'),
                                    array('property' => 'padding', 'label' => esc_html__( 'Padding', 'ssc' ), 'selector' => '.grid-item .meta'),
                                    array('property' => 'border', 'label' => esc_html__( 'Border', 'ssc' ), 'selector' => '.grid-item .meta'),
                                    array('property' => 'border-radius', 'label' => esc_html__( 'Border Radius', 'ssc' ), 'selector' => '.grid-item .meta'),
                                ),
                                // Meta Links
                                'Meta Links' => array(
                                    array('property' => 'background', 'selector' => '.grid-item .meta a'),
                                    array('property' => 'color', 'label' => esc_html__( 'Color', 'ssc' ), 'selector' => '.grid-item .meta a'),
                                    array('property' => 'font-size', 'label' => esc_html__( 'Font Size', 'ssc' ), 'selector' => '.grid-item .meta a'),
                                    array('property' => 'line-height', 'label' => esc_html__( 'Line Height', 'ssc' ), 'selector' => '.grid-item .meta a'),
                                    array('property' => 'font-weight', 'label' => esc_html__( 'Font Weight', 'ssc' ), 'selector' => '.grid-item .meta a'),
                                    array('property' => 'font-style', 'label' => esc_html__( 'Font Style', 'ssc' ), 'selector' => '.grid-item .meta a'),
                                    array('property' => 'font-family', 'label' => esc_html__( 'Font Family', 'ssc' ), 'selector' => '.grid-item .meta a'),
                                    array('property' => 'text-align', 'label' => esc_html__( 'Text Align', 'ssc' ), 'selector' => '.grid-item .meta a'),
                                    array('property' => 'text-shadow', 'label' => esc_html__( 'Text Shadow', 'ssc' ), 'selector' => '.grid-item .meta a'),
                                    array('property' => 'text-transform', 'label' => esc_html__( 'Text Transform', 'ssc' ), 'selector' => '.grid-item .meta a'),
                                    array('property' => 'text-decoration', 'label' => esc_html__( 'Text Decoration', 'ssc' ), 'selector' => '.grid-item .meta a'),
                                    array('property' => 'letter-spacing', 'label' => esc_html__( 'Letter Spacing', 'ssc' ), 'selector' => '.grid-item .meta a'),
                                    array('property' => 'overflow', 'label' => esc_html__( 'Overflow', 'ssc' ), 'selector' => '.grid-item .meta a'),
                                    array('property' => 'word-break', 'label' => esc_html__( 'Word Break', 'ssc' ), 'selector' => '.grid-item .meta a'),
                                    array('property' => 'margin', 'label' => esc_html__( 'Margin', 'ssc' ), 'selector' => '.grid-item .meta a'),
                                    array('property' => 'padding', 'label' => esc_html__( 'Padding', 'ssc' ), 'selector' => '.grid-item .meta a'),
                                    array('property' => 'border', 'label' => esc_html__( 'Border', 'ssc' ), 'selector' => '.grid-item .meta a'),
                                    array('property' => 'border-radius', 'label' => esc_html__( 'Border Radius', 'ssc' ), 'selector' => '.grid-item .meta a')
                                ),
                                // Meta Icons
                                'Meta Icons' => array(
                                    array('property' => 'background', 'selector' => '.grid-item .meta i'),
                                    array('property' => 'color', 'label' => esc_html__( 'Color', 'ssc' ), 'selector' => '.grid-item .meta i'),
                                    array('property' => 'font-size', 'label' => esc_html__( 'Font Size', 'ssc' ), 'selector' => '.grid-item .meta i'),
                                    array('property' => 'line-height', 'label' => esc_html__( 'Line Height', 'ssc' ), 'selector' => '.grid-item .meta i'),
                                    array('property' => 'font-weight', 'label' => esc_html__( 'Font Weight', 'ssc' ), 'selector' => '.grid-item .meta i'),
                                    array('property' => 'font-style', 'label' => esc_html__( 'Font Style', 'ssc' ), 'selector' => '.grid-item .meta i'),
                                    array('property' => 'font-family', 'label' => esc_html__( 'Font Family', 'ssc' ), 'selector' => '.grid-item .meta i'),
                                    array('property' => 'text-align', 'label' => esc_html__( 'Text Align', 'ssc' ), 'selector' => '.grid-item .meta i'),
                                    array('property' => 'text-shadow', 'label' => esc_html__( 'Text Shadow', 'ssc' ), 'selector' => '.grid-item .meta i'),
                                    array('property' => 'text-transform', 'label' => esc_html__( 'Text Transform', 'ssc' ), 'selector' => '.grid-item .meta i'),
                                    array('property' => 'text-decoration', 'label' => esc_html__( 'Text Decoration', 'ssc' ), 'selector' => '.grid-item .meta i'),
                                    array('property' => 'letter-spacing', 'label' => esc_html__( 'Letter Spacing', 'ssc' ), 'selector' => '.grid-item .meta i'),
                                    array('property' => 'overflow', 'label' => esc_html__( 'Overflow', 'ssc' ), 'selector' => '.grid-item .meta i'),
                                    array('property' => 'word-break', 'label' => esc_html__( 'Word Break', 'ssc' ), 'selector' => '.grid-item .meta i'),
	                                array('property' => 'width', 'label' =>  esc_html__( 'Width', 'ssc' ), 'selector' => '.grid-item .meta i'),
	                                array('property' => 'height', 'label' =>  esc_html__( 'Height', 'ssc' ), 'selector' => '.grid-item .meta i'),
	                                array('property' => 'display', 'label' => esc_html__( 'Display', 'ssc' ), 'selector' => '.grid-item .meta i'),
	                                array('property' => 'float', 'label' => esc_html__( 'Float', 'ssc' ), 'selector' => '.grid-item .meta i'),
                                    array('property' => 'margin', 'label' => esc_html__( 'Margin', 'ssc' ), 'selector' => '.grid-item .meta i'),
                                    array('property' => 'padding', 'label' => esc_html__( 'Padding', 'ssc' ), 'selector' => '.grid-item .meta i'),
                                    array('property' => 'border', 'label' => esc_html__( 'Border', 'ssc' ), 'selector' => '.grid-item .meta i'),
                                    array('property' => 'border-radius', 'label' => esc_html__( 'Border Radius', 'ssc' ), 'selector' => '.grid-item .meta i')
                                ),
                                // Date
                                'Date' => array(
                                    array('property' => 'background', 'selector' => '.grid-item .date'),
                                    array('property' => 'color', 'label' => esc_html__( 'Color', 'ssc' ), 'selector' => '.grid-item .date'),
                                    array('property' => 'font-size', 'label' => esc_html__( 'Font Size', 'ssc' ), 'selector' => '.grid-item .date'),
                                    array('property' => 'line-height', 'label' => esc_html__( 'Line Height', 'ssc' ), 'selector' => '.grid-item .date'),
                                    array('property' => 'font-weight', 'label' => esc_html__( 'Font Weight', 'ssc' ), 'selector' => '.grid-item .date'),
                                    array('property' => 'font-style', 'label' => esc_html__( 'Font Style', 'ssc' ), 'selector' => '.grid-item .date'),
                                    array('property' => 'font-family', 'label' => esc_html__( 'Font Family', 'ssc' ), 'selector' => '.grid-item .date'),
                                    array('property' => 'text-align', 'label' => esc_html__( 'Text Align', 'ssc' ), 'selector' => '.grid-item .date'),
                                    array('property' => 'text-shadow', 'label' => esc_html__( 'Text Shadow', 'ssc' ), 'selector' => '.grid-item .date'),
                                    array('property' => 'text-transform', 'label' => esc_html__( 'Text Transform', 'ssc' ), 'selector' => '.grid-item .date'),
                                    array('property' => 'text-decoration', 'label' => esc_html__( 'Text Decoration', 'ssc' ), 'selector' => '.grid-item .date'),
                                    array('property' => 'letter-spacing', 'label' => esc_html__( 'Letter Spacing', 'ssc' ), 'selector' => '.grid-item .date'),
                                    array('property' => 'overflow', 'label' => esc_html__( 'Overflow', 'ssc' ), 'selector' => '.grid-item .date'),
                                    array('property' => 'word-break', 'label' => esc_html__( 'Word Break', 'ssc' ), 'selector' => '.grid-item .date'),
                                    array('property' => 'margin', 'label' => esc_html__( 'Margin', 'ssc' ), 'selector' => '.grid-item .date'),
                                    array('property' => 'padding', 'label' => esc_html__( 'Padding', 'ssc' ), 'selector' => '.grid-item .date'),
                                    array('property' => 'border', 'label' => esc_html__( 'Border', 'ssc' ), 'selector' => '.grid-item .date'),
                                    array('property' => 'border-radius', 'label' => esc_html__( 'Border Radius', 'ssc' ), 'selector' => '.grid-item .date')
                                ),
                                // Comments
                                'Comments' => array(
                                    array('property' => 'background', 'selector' => '.grid-item .commentsc'),
                                    array('property' => 'color', 'label' => esc_html__( 'Color', 'ssc' ), 'selector' => '.grid-item .commentsc, .grid-item .commentsc a'),
                                    array('property' => 'font-size', 'label' => esc_html__( 'Font Size', 'ssc' ), 'selector' => '.grid-item .commentsc'),
                                    array('property' => 'line-height', 'label' => esc_html__( 'Line Height', 'ssc' ), 'selector' => '.grid-item .commentsc'),
                                    array('property' => 'font-weight', 'label' => esc_html__( 'Font Weight', 'ssc' ), 'selector' => '.grid-item .commentsc'),
                                    array('property' => 'font-style', 'label' => esc_html__( 'Font Style', 'ssc' ), 'selector' => '.grid-item .commentsc'),
                                    array('property' => 'font-family', 'label' => esc_html__( 'Font Family', 'ssc' ), 'selector' => '.grid-item .commentsc'),
                                    array('property' => 'text-align', 'label' => esc_html__( 'Text Align', 'ssc' ), 'selector' => '.grid-item .commentsc'),
                                    array('property' => 'text-shadow', 'label' => esc_html__( 'Text Shadow', 'ssc' ), 'selector' => '.grid-item .commentsc'),
                                    array('property' => 'text-transform', 'label' => esc_html__( 'Text Transform', 'ssc' ), 'selector' => '.grid-item .commentsc'),
                                    array('property' => 'text-decoration', 'label' => esc_html__( 'Text Decoration', 'ssc' ), 'selector' => '.grid-item .commentsc, .grid-item .commentsc a'),
                                    array('property' => 'letter-spacing', 'label' => esc_html__( 'Letter Spacing', 'ssc' ), 'selector' => '.grid-item .commentsc'),
                                    array('property' => 'overflow', 'label' => esc_html__( 'Overflow', 'ssc' ), 'selector' => '.grid-item .commentsc'),
                                    array('property' => 'word-break', 'label' => esc_html__( 'Word Break', 'ssc' ), 'selector' => '.grid-item .commentsc'),
                                    array('property' => 'margin', 'label' => esc_html__( 'Margin', 'ssc' ), 'selector' => '.grid-item .commentsc'),
                                    array('property' => 'padding', 'label' => esc_html__( 'Padding', 'ssc' ), 'selector' => '.grid-item .commentsc'),
                                    array('property' => 'border', 'label' => esc_html__( 'Border', 'ssc' ), 'selector' => '.grid-item .commentsc'),
                                    array('property' => 'border-radius', 'label' => esc_html__( 'Border Radius', 'ssc' ), 'selector' => '.grid-item .commentsc')
                                ),
                                // Description
                                'Description' => array(
                                    array('property' => 'background', 'selector' => '.grid-item p'),
                                    array('property' => 'color', 'label' => esc_html__( 'Color', 'ssc' ), 'selector' => '.grid-item p'),
                                    array('property' => 'font-size', 'label' => esc_html__( 'Font Size', 'ssc' ), 'selector' => '.grid-item p'),
                                    array('property' => 'line-height', 'label' => esc_html__( 'Line Height', 'ssc' ), 'selector' => '.grid-item p'),
                                    array('property' => 'font-weight', 'label' => esc_html__( 'Font Weight', 'ssc' ), 'selector' => '.grid-item p'),
                                    array('property' => 'font-style', 'label' => esc_html__( 'Font Style', 'ssc' ), 'selector' => '.grid-item p'),
                                    array('property' => 'font-family', 'label' => esc_html__( 'Font Family', 'ssc' ), 'selector' => '.grid-item p'),
                                    array('property' => 'text-align', 'label' => esc_html__( 'Text Align', 'ssc' ), 'selector' => '.grid-item p'),
                                    array('property' => 'text-shadow', 'label' => esc_html__( 'Text Shadow', 'ssc' ), 'selector' => '.grid-item p'),
                                    array('property' => 'text-transform', 'label' => esc_html__( 'Text Transform', 'ssc' ), 'selector' => '.grid-item p'),
                                    array('property' => 'text-decoration', 'label' => esc_html__( 'Text Decoration', 'ssc' ), 'selector' => '.grid-item p'),
                                    array('property' => 'letter-spacing', 'label' => esc_html__( 'Letter Spacing', 'ssc' ), 'selector' => '.grid-item p'),
                                    array('property' => 'overflow', 'label' => esc_html__( 'Overflow', 'ssc' ), 'selector' => '.grid-item p'),
                                    array('property' => 'word-break', 'label' => esc_html__( 'Word Break', 'ssc' ), 'selector' => '.grid-item p'),
                                    array('property' => 'margin', 'label' => esc_html__( 'Margin', 'ssc' ), 'selector' => '.grid-item p'),
                                    array('property' => 'padding', 'label' => esc_html__( 'Padding', 'ssc' ), 'selector' => '.grid-item p'),
                                    array('property' => 'border', 'label' => esc_html__( 'Border', 'ssc' ), 'selector' => '.grid-item p'),
                                    array('property' => 'border-radius', 'label' => esc_html__( 'Border Radius', 'ssc' ), 'selector' => '.grid-item p')
                                ),
                                // Read More Link
                                'Read More Link' => array(
	                                array('property' => 'background', 'selector' => '.grid-item a.rm'),
	                                array('property' => 'color', 'label' => esc_html__( 'Color', 'ssc' ), 'selector' => '.grid-item a.rm'),
	                                array('property' => 'font-size', 'label' => esc_html__( 'Font Size', 'ssc' ), 'selector' => '.grid-item a.rm'),
	                                array('property' => 'line-height', 'label' => esc_html__( 'Line Height', 'ssc' ), 'selector' => '.grid-item a.rm'),
	                                array('property' => 'font-weight', 'label' => esc_html__( 'Font Weight', 'ssc' ), 'selector' => '.grid-item a.rm'),
	                                array('property' => 'font-style', 'label' => esc_html__( 'Font Style', 'ssc' ), 'selector' => '.grid-item a.rm'),
	                                array('property' => 'font-family', 'label' => esc_html__( 'Font Family', 'ssc' ), 'selector' => '.grid-item a.rm'),
	                                array('property' => 'text-align', 'label' => esc_html__( 'Text Align', 'ssc' ), 'selector' => '.grid-item a.rm'),
	                                array('property' => 'text-shadow', 'label' => esc_html__( 'Text Shadow', 'ssc' ), 'selector' => '.grid-item a.rm'),
	                                array('property' => 'box-shadow', 'label' => esc_html__( 'Box Shadow', 'ssc' ), 'selector' => '.grid-item a.rm'),
	                                array('property' => 'text-transform', 'label' => esc_html__( 'Text Transform', 'ssc' ), 'selector' => '.grid-item a.rm'),
	                                array('property' => 'text-decoration', 'label' => esc_html__( 'Text Decoration', 'ssc' ), 'selector' => '.grid-item a.rm'),
	                                array('property' => 'letter-spacing', 'label' => esc_html__( 'Letter Spacing', 'ssc' ), 'selector' => '.grid-item a.rm'),
	                                array('property' => 'opacity', 'label' => esc_html__( 'Opacity', 'ssc' ), 'selector' => '.grid-item a.rm'),
	                                array('property' => 'display', 'label' => esc_html__( 'Display', 'ssc' ), 'selector' => '.grid-item a.rm'),
	                                array('property' => 'float', 'label' => esc_html__( 'Float', 'ssc' ), 'selector' => '.grid-item a.rm'),
	                                array('property' => 'overflow', 'label' => esc_html__( 'Overflow', 'ssc' ), 'selector' => '.grid-item a.rm'),
	                                array('property' => 'word-break', 'label' => esc_html__( 'Word Break', 'ssc' ), 'selector' => '.grid-item a.rm'),
	                                array('property' => 'margin', 'label' => esc_html__( 'Margin', 'ssc' ), 'selector' => '.grid-item a.rm'),
	                                array('property' => 'padding', 'label' => esc_html__( 'Padding', 'ssc' ), 'selector' => '.grid-item a.rm'),
	                                array('property' => 'border', 'label' => esc_html__( 'Border', 'ssc' ), 'selector' => '.grid-item a.rm'),
	                                array('property' => 'border-radius', 'label' => esc_html__( 'Border Radius', 'ssc' ), 'selector' => '.grid-item a.rm')
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
	                                array('property' => 'background', 'selector' => '.filter li .fbut.current'),
	                                array('property' => 'color', 'label' => esc_html__( 'Color', 'ssc' ), 'selector' => '.filter li .fbut'),
	                                array('property' => 'color', 'label' => esc_html__( 'Color', 'ssc' ).esc_html__( 'Current', 'ssc' ), 'selector' => '.filter li .fbut.current'),
	                                array('property' => 'font-size', 'label' => esc_html__( 'Font Size', 'ssc' ), 'selector' => '.filter li .fbut'),
	                                array('property' => 'line-height', 'label' => esc_html__( 'Line Height', 'ssc' ), 'selector' => '.filter li .fbut'),
	                                array('property' => 'font-weight', 'label' => esc_html__( 'Font Weight', 'ssc' ), 'selector' => '.filter li .fbut'),
	                                array('property' => 'font-style', 'label' => esc_html__( 'Font Style', 'ssc' ), 'selector' => '.filter li .fbut'),
	                                array('property' => 'font-family', 'label' => esc_html__( 'Font Family', 'ssc' ), 'selector' => '.filter li .fbut'),
	                                array('property' => 'text-align', 'label' => esc_html__( 'Text Align', 'ssc' ), 'selector' => '.filter'),
	                                array('property' => 'text-shadow', 'label' => esc_html__( 'Text Shadow', 'ssc' ), 'selector' => '.filter li .fbut'),
	                                array('property' => 'box-shadow', 'label' => esc_html__( 'Box Shadow', 'ssc' ), 'selector' => '.filter li .fbut'),
	                                array('property' => 'box-shadow', 'label' => esc_html__( 'Box Shadow', 'ssc' ), 'selector' => '.filter li .fbut.current'),
	                                array('property' => 'text-transform', 'label' => esc_html__( 'Text Transform', 'ssc' ), 'selector' => '.filter li .fbut'),
	                                array('property' => 'text-decoration', 'label' => esc_html__( 'Text Decoration', 'ssc' ), 'selector' => '.filter li .fbut'),
	                                array('property' => 'letter-spacing', 'label' => esc_html__( 'Letter Spacing', 'ssc' ), 'selector' => '.filter li .fbut'),
	                                array('property' => 'width', 'label' => 'Width', 'selector' => '.filter'),
	                                array('property' => 'height', 'label' => 'Height', 'selector' => '.filter'),
	                                array('property' => 'max-width', 'label' => 'Max-Width', 'selector' => '.filter'),
	                                array('property' => 'overflow', 'label' => esc_html__( 'Overflow', 'ssc' ), 'selector' => '.filter li .fbut'),
	                                array('property' => 'opacity', 'label' => esc_html__( 'Opacity', 'ssc' ), 'selector' => '.filter li .fbut'),
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
		                                'selector' => '.slick-dots li',
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
                                'SVG' => array(
	                                array(
		                                'property' => 'width',
		                                'label'    => esc_html__( 'Width', 'ssc' ),
		                                'selector' => '.rm svg',
	                                ),
	                                array(
		                                'property' => 'height',
		                                'label'    => esc_html__( 'Height', 'ssc' ),
		                                'selector' => '.rm svg',
	                                ),
                                ),
                            ) // screen responsive
                        )
                    )
                ),
                esc_html__( 'hover', 'ssc' ) => array(
                    array(
                        'name' => 'hover-css',
                        'label' => esc_html__( 'Hover', 'ssc' ),
                        'type' => 'css',
                        'value' => '{`kc-css`:{`any`:{`meta-links`:{`color|.grid-item .meta a:hover`:`#0081d7`},`read-more-link`:{`color|.grid-item a.rm:hover`:`#0081d7`}}}}', // remove this if you do not need a default content
                        'description' => 'Styles for Hover Condition',
                        'options' => array(
                            array(
                                'screens' => "any",
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

                                'Icon' => array(
	                                array('property' => 'color', 'label' => esc_html__('Color', 'ssc' ), 'selector' => '.thumb i:hover, .thumb a:hover i'),
	                                array('property' => 'background-color', 'label' => esc_html__('Background Color', 'ssc' ), 'selector' => '.thumb i:hover, .thumb a:hover i'),
	                                array('property' => 'font-size', 'label' => esc_html__('Font Size', 'ssc' ), 'selector' => '.thumb i:hover, .thumb a:hover i'),
	                                array('property' => 'line-height', 'label' => esc_html__('Line Height', 'ssc' ), 'selector' => '.thumb i:hover, .thumb a:hover i'),
	                                array('property' => 'font-weight', 'label' => esc_html__('Font Weight', 'ssc' ), 'selector' => '.thumb i:hover, .thumb a:hover i'),
	                                array('property' => 'font-family', 'label' => esc_html__('Font Family', 'ssc' ), 'selector' => '.thumb i:hover, .thumb a:hover i'),
	                                array('property' => 'text-transform', 'label' => esc_html__('Text Transform', 'ssc' ), 'selector' => '.thumb i:hover, .thumb a:hover i'),
	                                array('property' => 'text-decoration', 'label' => esc_html__('Text Decoration', 'ssc' ), 'selector' => '.thumb i:hover, .thumb a:hover i'),
	                                array('property' => 'font-style', 'label' => esc_html__('Font Style', 'ssc' ), 'selector' => '.thumb i:hover, .thumb a:hover i'),
	                                array('property' => 'text-align', 'label' => esc_html__('Text Align', 'ssc' ), 'selector' => '.thumb i:hover, .thumb a:hover i'),
	                                array('property' => 'text-shadow', 'label' => esc_html__('Text Shadow', 'ssc' ), 'selector' => '.thumb i:hover, .thumb a:hover i'),
	                                array('property' => 'letter-spacing', 'label' => esc_html__('Letter Spacing', 'ssc' ), 'selector' => '.thumb i:hover, .thumb a:hover i'),
	                                array('property' => 'width', 'label' =>  esc_html__( 'Width', 'ssc' ), 'selector' => '.thumb i:hover, .thumb a:hover i'),
	                                array('property' => 'height', 'label' =>  esc_html__( 'Height', 'ssc' ), 'selector' => '.thumb i:hover, .thumb a:hover i'),
	                                array('property' => 'display', 'label' => esc_html__( 'Display', 'ssc' ), 'selector' => '.thumb i:hover, .thumb a:hover i'),
	                                array('property' => 'float', 'label' => esc_html__( 'Float', 'ssc' ), 'selector' => '.thumb i:hover, .thumb a:hover i'),
	                                array('property' => 'border', 'label' => esc_html__('Border', 'ssc' ), 'selector' => '.thumb i:hover, .thumb a:hover i'),
	                                array('property' => 'border-radius', 'label' => esc_html__( 'Border Radius', 'ssc' ), 'selector' => '.thumb i:hover, .thumb a:hover i'),
	                                array('property' => 'margin', 'label' => esc_html__('Margin', 'ssc' ), 'selector' => '.thumb i:hover, .thumb a:hover i'),
	                                array('property' => 'margin', 'label' => esc_html__('Margin Wrapper', 'ssc' ), 'selector' => '.icoli'),
	                                array('property' => 'padding', 'label' =>esc_html__( 'Padding', 'ssc' ), 'selector' => '.thumb i:hover, .thumb a:hover i')
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
                                // Meta Text
                                'Meta Text' => array(
                                    array('property' => 'background', 'selector' => '.grid-item .meta:hover'),
                                    array('property' => 'color', 'label' => esc_html__( 'Color', 'ssc' ), 'selector' => '.grid-item .meta:hover'),
                                    array('property' => 'color', 'label' => esc_html__( 'Color when block hover', 'ssc' ), 'selector' => '.grid-item:hover .meta'),
                                    array('property' => 'font-size', 'label' => esc_html__( 'Font Size', 'ssc' ), 'selector' => '.grid-item .meta:hover'),
                                    array('property' => 'line-height', 'label' => esc_html__( 'Line Height', 'ssc' ), 'selector' => '.grid-item .meta:hover'),
                                    array('property' => 'font-weight', 'label' => esc_html__( 'Font Weight', 'ssc' ), 'selector' => '.grid-item .meta:hover'),
                                    array('property' => 'font-style', 'label' => esc_html__( 'Font Style', 'ssc' ), 'selector' => '.grid-item .meta:hover'),
                                    array('property' => 'font-family', 'label' => esc_html__( 'Font Family', 'ssc' ), 'selector' => '.grid-item .meta:hover'),
                                    array('property' => 'text-align', 'label' => esc_html__( 'Text Align', 'ssc' ), 'selector' => '.grid-item .meta:hover'),
                                    array('property' => 'text-shadow', 'label' => esc_html__( 'Text Shadow', 'ssc' ), 'selector' => '.grid-item .meta:hover'),
                                    array('property' => 'text-transform', 'label' => esc_html__( 'Text Transform', 'ssc' ), 'selector' => '.grid-item .meta:hover'),
                                    array('property' => 'text-decoration', 'label' => esc_html__( 'Text Decoration', 'ssc' ), 'selector' => '.grid-item .meta:hover'),

                                    array('property' => 'letter-spacing', 'label' => esc_html__( 'Letter Spacing', 'ssc' ), 'selector' => '.grid-item .meta:hover'),
                                    array('property' => 'overflow', 'label' => esc_html__( 'Overflow', 'ssc' ), 'selector' => '.grid-item .meta:hover'),
                                    array('property' => 'word-break', 'label' => esc_html__( 'Word Break', 'ssc' ), 'selector' => '.grid-item .meta:hover'),
                                    array('property' => 'margin', 'label' => esc_html__( 'Margin', 'ssc' ), 'selector' => '.grid-item .meta:hover'),
                                    array('property' => 'margin', 'label' => esc_html__( 'Margin Block Hover', 'ssc' ), 'selector' => '.grid-item:hover .meta'),
                                    array('property' => 'padding', 'label' => esc_html__( 'Padding', 'ssc' ), 'selector' => '.grid-item .meta:hover'),
                                    array('property' => 'border', 'label' => esc_html__( 'Border', 'ssc' ), 'selector' => '.grid-item .meta:hover'),
                                    array('property' => 'border-radius', 'label' => esc_html__( 'Border Radius', 'ssc' ), 'selector' => '.grid-item .meta:hover'),
                                ),
                                // Meta Links
                                'Meta Links' => array(
                                    array('property' => 'background', 'selector' => '.grid-item .meta a:hover'),
                                    array('property' => 'color', 'label' => esc_html__( 'Color', 'ssc' ), 'selector' => '.grid-item .meta a:hover'),
                                    array('property' => 'color', 'label' => esc_html__( 'Color when block hover', 'ssc' ), 'selector' => '.grid-item:hover .meta a'),
                                    array('property' => 'font-size', 'label' => esc_html__( 'Font Size', 'ssc' ), 'selector' => '.grid-item .meta a:hover'),
                                    array('property' => 'line-height', 'label' => esc_html__( 'Line Height', 'ssc' ), 'selector' => '.grid-item .meta a:hover'),
                                    array('property' => 'font-weight', 'label' => esc_html__( 'Font Weight', 'ssc' ), 'selector' => '.grid-item .meta a:hover'),
                                    array('property' => 'font-style', 'label' => esc_html__( 'Font Style', 'ssc' ), 'selector' => '.grid-item .meta a:hover'),
                                    array('property' => 'font-family', 'label' => esc_html__( 'Font Family', 'ssc' ), 'selector' => '.grid-item .meta a:hover'),
                                    array('property' => 'text-align', 'label' => esc_html__( 'Text Align', 'ssc' ), 'selector' => '.grid-item .meta a:hover'),
                                    array('property' => 'text-shadow', 'label' => esc_html__( 'Text Shadow', 'ssc' ), 'selector' => '.grid-item .meta a:hover'),
                                    array('property' => 'text-transform', 'label' => esc_html__( 'Text Transform', 'ssc' ), 'selector' => '.grid-item .meta a:hover'),
                                    array('property' => 'text-decoration', 'label' => esc_html__( 'Text Decoration', 'ssc' ), 'selector' => '.grid-item .meta a:hover'),
                                    array('property' => 'letter-spacing', 'label' => esc_html__( 'Letter Spacing', 'ssc' ), 'selector' => '.grid-item .meta a:hover'),
                                    array('property' => 'overflow', 'label' => esc_html__( 'Overflow', 'ssc' ), 'selector' => '.grid-item .meta a:hover'),
                                    array('property' => 'word-break', 'label' => esc_html__( 'Word Break', 'ssc' ), 'selector' => '.grid-item .meta a:hover'),
                                    array('property' => 'margin', 'label' => esc_html__( 'Margin', 'ssc' ), 'selector' => '.grid-item .meta a:hover'),
                                    array('property' => 'padding', 'label' => esc_html__( 'Padding', 'ssc' ), 'selector' => '.grid-item .meta a:hover'),
                                    array('property' => 'border', 'label' => esc_html__( 'Border', 'ssc' ), 'selector' => '.grid-item .meta a:hover'),
                                    array('property' => 'border-radius', 'label' => esc_html__( 'Border Radius', 'ssc' ), 'selector' => '.grid-item .meta a:hover')
                                ),
                                // Meta Icons
                                'Meta Icons' => array(
                                    array('property' => 'background', 'selector' => '.grid-item .meta:hover i'),
                                    array('property' => 'color', 'label' => esc_html__( 'Color', 'ssc' ), 'selector' => '.grid-item .meta:hover i'),
                                    array('property' => 'color', 'label' => esc_html__( 'Color when block hover', 'ssc' ), 'selector' => '.grid-item:hover .meta i'),
                                    array('property' => 'font-size', 'label' => esc_html__( 'Font Size', 'ssc' ), 'selector' => '.grid-item .meta:hover i'),
                                    array('property' => 'line-height', 'label' => esc_html__( 'Line Height', 'ssc' ), 'selector' => '.grid-item .meta:hover i'),
                                    array('property' => 'font-weight', 'label' => esc_html__( 'Font Weight', 'ssc' ), 'selector' => '.grid-item .meta:hover i'),
                                    array('property' => 'font-style', 'label' => esc_html__( 'Font Style', 'ssc' ), 'selector' => '.grid-item .meta:hover i'),
                                    array('property' => 'font-family', 'label' => esc_html__( 'Font Family', 'ssc' ), 'selector' => '.grid-item .meta:hover i'),
                                    array('property' => 'text-align', 'label' => esc_html__( 'Text Align', 'ssc' ), 'selector' => '.grid-item .meta:hover i'),
                                    array('property' => 'text-shadow', 'label' => esc_html__( 'Text Shadow', 'ssc' ), 'selector' => '.grid-item .meta:hover i'),
                                    array('property' => 'text-transform', 'label' => esc_html__( 'Text Transform', 'ssc' ), 'selector' => '.grid-item .meta:hover i'),
                                    array('property' => 'text-decoration', 'label' => esc_html__( 'Text Decoration', 'ssc' ), 'selector' => '.grid-item .meta:hover i'),
                                    array('property' => 'letter-spacing', 'label' => esc_html__( 'Letter Spacing', 'ssc' ), 'selector' => '.grid-item .meta:hover i'),
                                    array('property' => 'overflow', 'label' => esc_html__( 'Overflow', 'ssc' ), 'selector' => '.grid-item .meta:hover i'),
                                    array('property' => 'word-break', 'label' => esc_html__( 'Word Break', 'ssc' ), 'selector' => '.grid-item .meta:hover i'),
                                    array('property' => 'margin', 'label' => esc_html__( 'Margin', 'ssc' ), 'selector' => '.grid-item .meta:hover i'),
                                    array('property' => 'padding', 'label' => esc_html__( 'Padding', 'ssc' ), 'selector' => '.grid-item .meta:hover i'),
                                    array('property' => 'border', 'label' => esc_html__( 'Border', 'ssc' ), 'selector' => '.grid-item .meta:hover i'),
                                    array('property' => 'border-radius', 'label' => esc_html__( 'Border Radius', 'ssc' ), 'selector' => '.grid-item .meta:hover i')
                                ),
                                // Date
                                'Date' => array(
                                    array('property' => 'background', 'selector' => '.grid-item:hover .date'),
                                    array('property' => 'color', 'label' => esc_html__( 'Color', 'ssc' ), 'selector' => '.grid-item:hover .date'),
                                    array('property' => 'color', 'label' => esc_html__( 'Color when block hover', 'ssc' ), 'selector' => '.grid-item:hover .date'),
                                    array('property' => 'font-size', 'label' => esc_html__( 'Font Size', 'ssc' ), 'selector' => '.grid-item:hover .date'),
                                    array('property' => 'line-height', 'label' => esc_html__( 'Line Height', 'ssc' ), 'selector' => '.grid-item:hover .date'),
                                    array('property' => 'font-weight', 'label' => esc_html__( 'Font Weight', 'ssc' ), 'selector' => '.grid-item:hover .date'),
                                    array('property' => 'font-style', 'label' => esc_html__( 'Font Style', 'ssc' ), 'selector' => '.grid-item:hover .date'),
                                    array('property' => 'font-family', 'label' => esc_html__( 'Font Family', 'ssc' ), 'selector' => '.grid-item:hover .date'),
                                    array('property' => 'text-align', 'label' => esc_html__( 'Text Align', 'ssc' ), 'selector' => '.grid-item:hover .date'),
                                    array('property' => 'text-shadow', 'label' => esc_html__( 'Text Shadow', 'ssc' ), 'selector' => '.grid-item:hover .date'),
                                    array('property' => 'text-transform', 'label' => esc_html__( 'Text Transform', 'ssc' ), 'selector' => '.grid-item:hover .date'),
                                    array('property' => 'text-decoration', 'label' => esc_html__( 'Text Decoration', 'ssc' ), 'selector' => '.grid-item:hover .date'),
                                    array('property' => 'letter-spacing', 'label' => esc_html__( 'Letter Spacing', 'ssc' ), 'selector' => '.grid-item:hover .date'),
                                    array('property' => 'overflow', 'label' => esc_html__( 'Overflow', 'ssc' ), 'selector' => '.grid-item:hover .date'),
                                    array('property' => 'word-break', 'label' => esc_html__( 'Word Break', 'ssc' ), 'selector' => '.grid-item:hover .date'),
                                    array('property' => 'margin', 'label' => esc_html__( 'Margin', 'ssc' ), 'selector' => '.grid-item:hover .date'),
                                    array('property' => 'padding', 'label' => esc_html__( 'Padding', 'ssc' ), 'selector' => '.grid-item:hover .date'),
                                    array('property' => 'border', 'label' => esc_html__( 'Border', 'ssc' ), 'selector' => '.grid-item:hover .date'),
                                    array('property' => 'border-radius', 'label' => esc_html__( 'Border Radius', 'ssc' ), 'selector' => '.grid-item:hover .date')
                                ),
                                // Comments
                                'Comments' => array(
                                    array('property' => 'background', 'selector' => '.grid-item:hover .commentsc'),
                                    array('property' => 'color', 'label' => esc_html__( 'Color', 'ssc' ), 'selector' => '.grid-item:hover .commentsc, .grid-item:hover .commentsc a'),
                                    array('property' => 'font-size', 'label' => esc_html__( 'Font Size', 'ssc' ), 'selector' => '.grid-item:hover .commentsc'),
                                    array('property' => 'line-height', 'label' => esc_html__( 'Line Height', 'ssc' ), 'selector' => '.grid-item:hover .commentsc'),
                                    array('property' => 'font-weight', 'label' => esc_html__( 'Font Weight', 'ssc' ), 'selector' => '.grid-item:hover .commentsc'),
                                    array('property' => 'font-style', 'label' => esc_html__( 'Font Style', 'ssc' ), 'selector' => '.grid-item:hover .commentsc'),
                                    array('property' => 'font-family', 'label' => esc_html__( 'Font Family', 'ssc' ), 'selector' => '.grid-item:hover .commentsc'),
                                    array('property' => 'text-align', 'label' => esc_html__( 'Text Align', 'ssc' ), 'selector' => '.grid-item:hover .commentsc'),
                                    array('property' => 'text-shadow', 'label' => esc_html__( 'Text Shadow', 'ssc' ), 'selector' => '.grid-item:hover .commentsc'),
                                    array('property' => 'text-transform', 'label' => esc_html__( 'Text Transform', 'ssc' ), 'selector' => '.grid-item:hover .commentsc'),
                                    array('property' => 'text-decoration', 'label' => esc_html__( 'Text Decoration', 'ssc' ), 'selector' => '.grid-item .commentsc a:hover'),
                                    array('property' => 'letter-spacing', 'label' => esc_html__( 'Letter Spacing', 'ssc' ), 'selector' => '.grid-item:hover .commentsc'),
                                    array('property' => 'overflow', 'label' => esc_html__( 'Overflow', 'ssc' ), 'selector' => '.grid-item:hover .commentsc'),
                                    array('property' => 'word-break', 'label' => esc_html__( 'Word Break', 'ssc' ), 'selector' => '.grid-item:hover .commentsc'),
                                    array('property' => 'margin', 'label' => esc_html__( 'Margin', 'ssc' ), 'selector' => '.grid-item:hover .commentsc'),
                                    array('property' => 'padding', 'label' => esc_html__( 'Padding', 'ssc' ), 'selector' => '.grid-item:hover .commentsc'),
                                    array('property' => 'border', 'label' => esc_html__( 'Border', 'ssc' ), 'selector' => '.grid-item:hover .commentsc'),
                                    array('property' => 'border-radius', 'label' => esc_html__( 'Border Radius', 'ssc' ), 'selector' => '.grid-item:hover .commentsc')
                                ),
                                // Description
                                'Description' => array(
                                    array('property' => 'background', 'selector' => '.grid-item:hover p'),
                                    array('property' => 'color', 'label' => esc_html__( 'Color', 'ssc' ), 'selector' => '.grid-item:hover p'),
                                    array('property' => 'font-size', 'label' => esc_html__( 'Font Size', 'ssc' ), 'selector' => '.grid-item:hover p'),
                                    array('property' => 'line-height', 'label' => esc_html__( 'Line Height', 'ssc' ), 'selector' => '.grid-item:hover p'),
                                    array('property' => 'font-weight', 'label' => esc_html__( 'Font Weight', 'ssc' ), 'selector' => '.grid-item:hover p'),
                                    array('property' => 'font-style', 'label' => esc_html__( 'Font Style', 'ssc' ), 'selector' => '.grid-item:hover p'),
                                    array('property' => 'font-family', 'label' => esc_html__( 'Font Family', 'ssc' ), 'selector' => '.grid-item:hover p'),
                                    array('property' => 'text-align', 'label' => esc_html__( 'Text Align', 'ssc' ), 'selector' => '.grid-item:hover p'),
                                    array('property' => 'text-shadow', 'label' => esc_html__( 'Text Shadow', 'ssc' ), 'selector' => '.grid-item:hover p'),
                                    array('property' => 'text-transform', 'label' => esc_html__( 'Text Transform', 'ssc' ), 'selector' => '.grid-item:hover p'),
                                    array('property' => 'text-decoration', 'label' => esc_html__( 'Text Decoration', 'ssc' ), 'selector' => '.grid-item:hover p'),
                                    array('property' => 'letter-spacing', 'label' => esc_html__( 'Letter Spacing', 'ssc' ), 'selector' => '.grid-item:hover p'),
                                    array('property' => 'overflow', 'label' => esc_html__( 'Overflow', 'ssc' ), 'selector' => '.grid-item:hover p'),
                                    array('property' => 'word-break', 'label' => esc_html__( 'Word Break', 'ssc' ), 'selector' => '.grid-item:hover p'),
                                    array('property' => 'margin', 'label' => esc_html__( 'Margin', 'ssc' ), 'selector' => '.grid-item:hover p'),
                                    array('property' => 'padding', 'label' => esc_html__( 'Padding', 'ssc' ), 'selector' => '.grid-item:hover p'),
                                    array('property' => 'border', 'label' => esc_html__( 'Border', 'ssc' ), 'selector' => '.grid-item:hover p'),
                                    array('property' => 'border-radius', 'label' => esc_html__( 'Border Radius', 'ssc' ), 'selector' => '.grid-item:hover p')
                                ),
                                // Read More Link
                                'Read More Link' => array(
	                                array('property' => 'background', 'selector' => '.grid-item:hover a.rm'),
	                                array('property' => 'background', 'selector' => '.grid-item a.rm:hover'),

	                                array('property' => 'color', 'label' => esc_html__( 'Color', 'ssc' ), 'selector' => '.grid-item a.rm:hover'),
	                                array('property' => 'color', 'label' => esc_html__( 'Color when block hover', 'ssc' ), 'selector' => '.grid-item:hover a.rm'),
	                                array('property' => 'font-size', 'label' => esc_html__( 'Font Size', 'ssc' ), 'selector' => '.grid-item a.rm:hover'),
	                                array('property' => 'line-height', 'label' => esc_html__( 'Line Height', 'ssc' ), 'selector' => '.grid-item a.rm:hover'),
	                                array('property' => 'font-weight', 'label' => esc_html__( 'Font Weight', 'ssc' ), 'selector' => '.grid-item a.rm:hover'),
	                                array('property' => 'font-style', 'label' => esc_html__( 'Font Style', 'ssc' ), 'selector' => '.grid-item a.rm:hover'),
	                                array('property' => 'font-family', 'label' => esc_html__( 'Font Family', 'ssc' ), 'selector' => '.grid-item a.rm:hover'),
	                                array('property' => 'text-align', 'label' => esc_html__( 'Text Align', 'ssc' ), 'selector' => '.grid-item a.rm:hover'),
	                                array('property' => 'text-shadow', 'label' => esc_html__( 'Text Shadow', 'ssc' ), 'selector' => '.grid-item a.rm:hover'),
	                                array('property' => 'box-shadow', 'label' => esc_html__( 'Box Shadow', 'ssc' ), 'selector' => '.grid-item a.rm:hover'),
	                                array('property' => 'text-transform', 'label' => esc_html__( 'Text Transform', 'ssc' ), 'selector' => '.grid-item a.rm:hover'),
	                                array('property' => 'text-decoration', 'label' => esc_html__( 'Text Decoration', 'ssc' ), 'selector' => '.grid-item a.rm:hover'),
	                                array('property' => 'letter-spacing', 'label' => esc_html__( 'Letter Spacing', 'ssc' ), 'selector' => '.grid-item a.rm:hover'),
                                    array('property' => 'opacity', 'label' => esc_html__( 'Opacity', 'ssc' ), 'selector' => '.grid-item a.rm:hover'),
                                    array('property' => 'opacity', 'label' => esc_html__( 'Opacity when block hover', 'ssc' ), 'selector' => '.grid-item:hover a.rm'),
	                                array('property' => 'display', 'label' => esc_html__( 'Display', 'ssc' ), 'selector' => '.grid-item a.rm:hover'),
	                                array('property' => 'float', 'label' => esc_html__( 'Float', 'ssc' ), 'selector' => '.grid-item a.rm:hover'),
	                                array('property' => 'overflow', 'label' => esc_html__( 'Overflow', 'ssc' ), 'selector' => '.grid-item a.rm:hover'),
	                                array('property' => 'word-break', 'label' => esc_html__( 'Word Break', 'ssc' ), 'selector' => '.grid-item a.rm:hover'),
	                                array('property' => 'margin', 'label' => esc_html__( 'Margin', 'ssc' ), 'selector' => '.grid-item a.rm:hover'),
	                                array('property' => 'margin', 'label' => esc_html__( 'Margin Block Hover', 'ssc' ), 'selector' => '.grid-item:hover a.rm'),
	                                array('property' => 'padding', 'label' => esc_html__( 'Padding', 'ssc' ), 'selector' => '.grid-item a.rm:hover'),
	                                array('property' => 'border', 'label' => esc_html__( 'Border', 'ssc' ), 'selector' => '.grid-item a.rm:hover'),
	                                array('property' => 'border-radius', 'label' => esc_html__( 'Border Radius', 'ssc' ), 'selector' => '.grid-item a.rm:hover')
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
	                                array('property' => 'box-shadow', 'label' => esc_html__( 'Box Shadow', 'ssc' ), 'selector' => '.filter li .fbut:hover'),
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
                            array(
                                "screens" => "999,768,667,479",
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
                                // Meta Text
                                'Meta Text' => array(
                                    array('property' => 'background', 'selector' => '.grid-item .meta:hover'),
                                    array('property' => 'color', 'label' => esc_html__( 'Color', 'ssc' ), 'selector' => '.grid-item .meta:hover'),
                                    array('property' => 'font-size', 'label' => esc_html__( 'Font Size', 'ssc' ), 'selector' => '.grid-item .meta:hover'),
                                    array('property' => 'line-height', 'label' => esc_html__( 'Line Height', 'ssc' ), 'selector' => '.grid-item .meta:hover'),
                                    array('property' => 'font-weight', 'label' => esc_html__( 'Font Weight', 'ssc' ), 'selector' => '.grid-item .meta:hover'),
                                    array('property' => 'font-style', 'label' => esc_html__( 'Font Style', 'ssc' ), 'selector' => '.grid-item .meta:hover'),
                                    array('property' => 'font-family', 'label' => esc_html__( 'Font Family', 'ssc' ), 'selector' => '.grid-item .meta:hover'),
                                    array('property' => 'text-align', 'label' => esc_html__( 'Text Align', 'ssc' ), 'selector' => '.grid-item .meta:hover'),
                                    array('property' => 'text-shadow', 'label' => esc_html__( 'Text Shadow', 'ssc' ), 'selector' => '.grid-item .meta:hover'),
                                    array('property' => 'text-transform', 'label' => esc_html__( 'Text Transform', 'ssc' ), 'selector' => '.grid-item .meta:hover'),
                                    array('property' => 'text-decoration', 'label' => esc_html__( 'Text Decoration', 'ssc' ), 'selector' => '.grid-item .meta:hover'),

                                    array('property' => 'letter-spacing', 'label' => esc_html__( 'Letter Spacing', 'ssc' ), 'selector' => '.grid-item .meta:hover'),
                                    array('property' => 'overflow', 'label' => esc_html__( 'Overflow', 'ssc' ), 'selector' => '.grid-item .meta:hover'),
                                    array('property' => 'word-break', 'label' => esc_html__( 'Word Break', 'ssc' ), 'selector' => '.grid-item .meta:hover'),
                                    array('property' => 'margin', 'label' => esc_html__( 'Margin', 'ssc' ), 'selector' => '.grid-item .meta:hover'),
                                    array('property' => 'padding', 'label' => esc_html__( 'Padding', 'ssc' ), 'selector' => '.grid-item .meta:hover'),
                                    array('property' => 'border', 'label' => esc_html__( 'Border', 'ssc' ), 'selector' => '.grid-item .meta:hover'),
                                    array('property' => 'border-radius', 'label' => esc_html__( 'Border Radius', 'ssc' ), 'selector' => '.grid-item .meta:hover'),
                                ),
                                // Meta Links
                                'Meta Links' => array(
                                    array('property' => 'background', 'selector' => '.grid-item .meta a:hover'),
                                    array('property' => 'color', 'label' => esc_html__( 'Color', 'ssc' ), 'selector' => '.grid-item .meta a:hover'),
                                    array('property' => 'font-size', 'label' => esc_html__( 'Font Size', 'ssc' ), 'selector' => '.grid-item .meta a:hover'),
                                    array('property' => 'line-height', 'label' => esc_html__( 'Line Height', 'ssc' ), 'selector' => '.grid-item .meta a:hover'),
                                    array('property' => 'font-weight', 'label' => esc_html__( 'Font Weight', 'ssc' ), 'selector' => '.grid-item .meta a:hover'),
                                    array('property' => 'font-style', 'label' => esc_html__( 'Font Style', 'ssc' ), 'selector' => '.grid-item .meta a:hover'),
                                    array('property' => 'font-family', 'label' => esc_html__( 'Font Family', 'ssc' ), 'selector' => '.grid-item .meta a:hover'),
                                    array('property' => 'text-align', 'label' => esc_html__( 'Text Align', 'ssc' ), 'selector' => '.grid-item .meta a:hover'),
                                    array('property' => 'text-shadow', 'label' => esc_html__( 'Text Shadow', 'ssc' ), 'selector' => '.grid-item .meta a:hover'),
                                    array('property' => 'text-transform', 'label' => esc_html__( 'Text Transform', 'ssc' ), 'selector' => '.grid-item .meta a:hover'),
                                    array('property' => 'text-decoration', 'label' => esc_html__( 'Text Decoration', 'ssc' ), 'selector' => '.grid-item .meta a:hover'),
                                    array('property' => 'letter-spacing', 'label' => esc_html__( 'Letter Spacing', 'ssc' ), 'selector' => '.grid-item .meta a:hover'),
                                    array('property' => 'overflow', 'label' => esc_html__( 'Overflow', 'ssc' ), 'selector' => '.grid-item .meta a:hover'),
                                    array('property' => 'word-break', 'label' => esc_html__( 'Word Break', 'ssc' ), 'selector' => '.grid-item .meta a:hover'),
                                    array('property' => 'margin', 'label' => esc_html__( 'Margin', 'ssc' ), 'selector' => '.grid-item .meta a:hover'),
                                    array('property' => 'padding', 'label' => esc_html__( 'Padding', 'ssc' ), 'selector' => '.grid-item .meta a:hover'),
                                    array('property' => 'border', 'label' => esc_html__( 'Border', 'ssc' ), 'selector' => '.grid-item .meta a:hover'),
                                    array('property' => 'border-radius', 'label' => esc_html__( 'Border Radius', 'ssc' ), 'selector' => '.grid-item .meta a:hover')
                                ),
                                // Meta Icons
                                'Meta Icons' => array(
                                    array('property' => 'background', 'selector' => '.grid-item .meta:hover i'),
                                    array('property' => 'color', 'label' => esc_html__( 'Color', 'ssc' ), 'selector' => '.grid-item .meta:hover i'),
                                    array('property' => 'font-size', 'label' => esc_html__( 'Font Size', 'ssc' ), 'selector' => '.grid-item .meta:hover i'),
                                    array('property' => 'line-height', 'label' => esc_html__( 'Line Height', 'ssc' ), 'selector' => '.grid-item .meta:hover i'),
                                    array('property' => 'font-weight', 'label' => esc_html__( 'Font Weight', 'ssc' ), 'selector' => '.grid-item .meta:hover i'),
                                    array('property' => 'font-style', 'label' => esc_html__( 'Font Style', 'ssc' ), 'selector' => '.grid-item .meta:hover i'),
                                    array('property' => 'font-family', 'label' => esc_html__( 'Font Family', 'ssc' ), 'selector' => '.grid-item .meta:hover i'),
                                    array('property' => 'text-align', 'label' => esc_html__( 'Text Align', 'ssc' ), 'selector' => '.grid-item .meta:hover i'),
                                    array('property' => 'text-shadow', 'label' => esc_html__( 'Text Shadow', 'ssc' ), 'selector' => '.grid-item .meta:hover i'),
                                    array('property' => 'text-transform', 'label' => esc_html__( 'Text Transform', 'ssc' ), 'selector' => '.grid-item .meta:hover i'),
                                    array('property' => 'text-decoration', 'label' => esc_html__( 'Text Decoration', 'ssc' ), 'selector' => '.grid-item .meta:hover i'),
                                    array('property' => 'letter-spacing', 'label' => esc_html__( 'Letter Spacing', 'ssc' ), 'selector' => '.grid-item .meta:hover i'),
                                    array('property' => 'overflow', 'label' => esc_html__( 'Overflow', 'ssc' ), 'selector' => '.grid-item .meta:hover i'),
                                    array('property' => 'word-break', 'label' => esc_html__( 'Word Break', 'ssc' ), 'selector' => '.grid-item .meta:hover i'),
                                    array('property' => 'margin', 'label' => esc_html__( 'Margin', 'ssc' ), 'selector' => '.grid-item .meta:hover i'),
                                    array('property' => 'padding', 'label' => esc_html__( 'Padding', 'ssc' ), 'selector' => '.grid-item .meta:hover i'),
                                    array('property' => 'border', 'label' => esc_html__( 'Border', 'ssc' ), 'selector' => '.grid-item .meta:hover i'),
                                    array('property' => 'border-radius', 'label' => esc_html__( 'Border Radius', 'ssc' ), 'selector' => '.grid-item .meta:hover i')
                                ),
                                // Date
                                'Date' => array(
                                    array('property' => 'background', 'selector' => '.grid-item:hover .date'),
                                    array('property' => 'color', 'label' => esc_html__( 'Color', 'ssc' ), 'selector' => '.grid-item:hover .date'),
                                    array('property' => 'font-size', 'label' => esc_html__( 'Font Size', 'ssc' ), 'selector' => '.grid-item:hover .date'),
                                    array('property' => 'line-height', 'label' => esc_html__( 'Line Height', 'ssc' ), 'selector' => '.grid-item:hover .date'),
                                    array('property' => 'font-weight', 'label' => esc_html__( 'Font Weight', 'ssc' ), 'selector' => '.grid-item:hover .date'),
                                    array('property' => 'font-style', 'label' => esc_html__( 'Font Style', 'ssc' ), 'selector' => '.grid-item:hover .date'),
                                    array('property' => 'font-family', 'label' => esc_html__( 'Font Family', 'ssc' ), 'selector' => '.grid-item:hover .date'),
                                    array('property' => 'text-align', 'label' => esc_html__( 'Text Align', 'ssc' ), 'selector' => '.grid-item:hover .date'),
                                    array('property' => 'text-shadow', 'label' => esc_html__( 'Text Shadow', 'ssc' ), 'selector' => '.grid-item:hover .date'),
                                    array('property' => 'text-transform', 'label' => esc_html__( 'Text Transform', 'ssc' ), 'selector' => '.grid-item:hover .date'),
                                    array('property' => 'text-decoration', 'label' => esc_html__( 'Text Decoration', 'ssc' ), 'selector' => '.grid-item:hover .date'),
                                    array('property' => 'letter-spacing', 'label' => esc_html__( 'Letter Spacing', 'ssc' ), 'selector' => '.grid-item:hover .date'),
                                    array('property' => 'overflow', 'label' => esc_html__( 'Overflow', 'ssc' ), 'selector' => '.grid-item:hover .date'),
                                    array('property' => 'word-break', 'label' => esc_html__( 'Word Break', 'ssc' ), 'selector' => '.grid-item:hover .date'),
                                    array('property' => 'margin', 'label' => esc_html__( 'Margin', 'ssc' ), 'selector' => '.grid-item:hover .date'),
                                    array('property' => 'padding', 'label' => esc_html__( 'Padding', 'ssc' ), 'selector' => '.grid-item:hover .date'),
                                    array('property' => 'border', 'label' => esc_html__( 'Border', 'ssc' ), 'selector' => '.grid-item:hover .date'),
                                    array('property' => 'border-radius', 'label' => esc_html__( 'Border Radius', 'ssc' ), 'selector' => '.grid-item:hover .date')
                                ),
                                // Comments
                                'Comments' => array(
                                    array('property' => 'background', 'selector' => '.grid-item:hover .commentsc'),
                                    array('property' => 'color', 'label' => esc_html__( 'Color', 'ssc' ), 'selector' => '.grid-item:hover .commentsc, .grid-item:hover .commentsc a'),
                                    array('property' => 'font-size', 'label' => esc_html__( 'Font Size', 'ssc' ), 'selector' => '.grid-item:hover .commentsc'),
                                    array('property' => 'line-height', 'label' => esc_html__( 'Line Height', 'ssc' ), 'selector' => '.grid-item:hover .commentsc'),
                                    array('property' => 'font-weight', 'label' => esc_html__( 'Font Weight', 'ssc' ), 'selector' => '.grid-item:hover .commentsc'),
                                    array('property' => 'font-style', 'label' => esc_html__( 'Font Style', 'ssc' ), 'selector' => '.grid-item:hover .commentsc'),
                                    array('property' => 'font-family', 'label' => esc_html__( 'Font Family', 'ssc' ), 'selector' => '.grid-item:hover .commentsc'),
                                    array('property' => 'text-align', 'label' => esc_html__( 'Text Align', 'ssc' ), 'selector' => '.grid-item:hover .commentsc'),
                                    array('property' => 'text-shadow', 'label' => esc_html__( 'Text Shadow', 'ssc' ), 'selector' => '.grid-item:hover .commentsc'),
                                    array('property' => 'text-transform', 'label' => esc_html__( 'Text Transform', 'ssc' ), 'selector' => '.grid-item:hover .commentsc'),
                                    array('property' => 'text-decoration', 'label' => esc_html__( 'Text Decoration', 'ssc' ), 'selector' => '.grid-item:hover .commentsc, .grid-item:hover .commentsc a'),
                                    array('property' => 'letter-spacing', 'label' => esc_html__( 'Letter Spacing', 'ssc' ), 'selector' => '.grid-item:hover .commentsc'),
                                    array('property' => 'overflow', 'label' => esc_html__( 'Overflow', 'ssc' ), 'selector' => '.grid-item:hover .commentsc'),
                                    array('property' => 'word-break', 'label' => esc_html__( 'Word Break', 'ssc' ), 'selector' => '.grid-item:hover .commentsc'),
                                    array('property' => 'margin', 'label' => esc_html__( 'Margin', 'ssc' ), 'selector' => '.grid-item:hover .commentsc'),
                                    array('property' => 'padding', 'label' => esc_html__( 'Padding', 'ssc' ), 'selector' => '.grid-item:hover .commentsc'),
                                    array('property' => 'border', 'label' => esc_html__( 'Border', 'ssc' ), 'selector' => '.grid-item:hover .commentsc'),
                                    array('property' => 'border-radius', 'label' => esc_html__( 'Border Radius', 'ssc' ), 'selector' => '.grid-item:hover .commentsc')
                                ),
                                'Category' => array(
	                                array('property' => 'background', 'selector' => '+:hover .post-categories a,+:hover  .cats a'),
	                                array('property' => 'color', 'label' => esc_html__( 'Color', 'ssc' ), 'selector' => '+:hover .post-categories a,+:hover  .cats a'),
	                                array('property' => 'font-size', 'label' => esc_html__( 'Font Size', 'ssc' ), 'selector' => '+:hover .post-categories a,+:hover  .cats a'),
	                                array('property' => 'line-height', 'label' => esc_html__( 'Line Height', 'ssc' ), 'selector' => '+:hover .post-categories a,+:hover  .cats a'),
	                                array('property' => 'font-weight', 'label' => esc_html__( 'Font Weight', 'ssc' ), 'selector' => '+:hover .post-categories a,+:hover  .cats a'),
	                                array('property' => 'font-style', 'label' => esc_html__( 'Font Style', 'ssc' ), 'selector' => '+:hover .post-categories a,+:hover  .cats a'),
	                                array('property' => 'font-family', 'label' => esc_html__( 'Font Family', 'ssc' ), 'selector' => '+:hover .post-categories a,+:hover  .cats a'),
	                                array('property' => 'text-align', 'label' => esc_html__( 'Text Align', 'ssc' ), 'selector' => '+:hover .post-categories a,+:hover  .cats a'),
	                                array('property' => 'text-shadow', 'label' => esc_html__( 'Text Shadow', 'ssc' ), 'selector' => '+:hover .post-categories a,+:hover  .cats a'),
	                                array('property' => 'text-transform', 'label' => esc_html__( 'Text Transform', 'ssc' ), 'selector' => '+:hover .post-categories a,+:hover  .cats a'),
	                                array('property' => 'text-decoration', 'label' => esc_html__( 'Text Decoration', 'ssc' ), 'selector' => '+:hover .post-categories a,+:hover  .cats a'),
	                                array('property' => 'letter-spacing', 'label' => esc_html__( 'Letter Spacing', 'ssc' ), 'selector' => '+:hover .post-categories a,+:hover  .cats a'),
	                                array('property' => 'overflow', 'label' => esc_html__( 'Overflow', 'ssc' ), 'selector' => '+:hover .post-categories a,+:hover  .cats a'),
	                                array('property' => 'float', 'label' => esc_html__( 'Float', 'ssc' ), 'selector' => '+:hover .post-categories a,+:hover  .cats a'),
	                                array('property' => 'display', 'label' => esc_html__( 'Display', 'ssc' ), 'selector' => '+:hover .post-categories a,+:hover  .cats a'),
	                                array('property' => 'word-break', 'label' => esc_html__( 'Word Break', 'ssc' ), 'selector' => '+:hover .post-categories a,+:hover  .cats a'),
	                                array('property' => 'margin', 'label' => esc_html__( 'Margin', 'ssc' ), 'selector' => '+:hover .post-categories a,+:hover  .cats a'),
	                                array('property' => 'padding', 'label' => esc_html__( 'Padding', 'ssc' ), 'selector' => '+:hover .post-categories a,+:hover  .cats a'),
	                                array('property' => 'border', 'label' => esc_html__( 'Border', 'ssc' ), 'selector' => '+:hover .post-categories a,+:hover  .cats a'),
	                                array('property' => 'border-radius', 'label' => esc_html__( 'Border Radius', 'ssc' ), 'selector' => '+:hover .post-categories a,+:hover  .cats a'),
                                ),
                                // Description
                                'Description' => array(
                                    array('property' => 'background', 'selector' => '.grid-item:hover p'),
                                    array('property' => 'color', 'label' => esc_html__( 'Color', 'ssc' ), 'selector' => '.grid-item:hover p'),
                                    array('property' => 'font-size', 'label' => esc_html__( 'Font Size', 'ssc' ), 'selector' => '.grid-item:hover p'),
                                    array('property' => 'line-height', 'label' => esc_html__( 'Line Height', 'ssc' ), 'selector' => '.grid-item:hover p'),
                                    array('property' => 'font-weight', 'label' => esc_html__( 'Font Weight', 'ssc' ), 'selector' => '.grid-item:hover p'),
                                    array('property' => 'font-style', 'label' => esc_html__( 'Font Style', 'ssc' ), 'selector' => '.grid-item:hover p'),
                                    array('property' => 'font-family', 'label' => esc_html__( 'Font Family', 'ssc' ), 'selector' => '.grid-item:hover p'),
                                    array('property' => 'text-align', 'label' => esc_html__( 'Text Align', 'ssc' ), 'selector' => '.grid-item:hover p'),
                                    array('property' => 'text-shadow', 'label' => esc_html__( 'Text Shadow', 'ssc' ), 'selector' => '.grid-item:hover p'),
                                    array('property' => 'text-transform', 'label' => esc_html__( 'Text Transform', 'ssc' ), 'selector' => '.grid-item:hover p'),
                                    array('property' => 'text-decoration', 'label' => esc_html__( 'Text Decoration', 'ssc' ), 'selector' => '.grid-item:hover p'),
                                    array('property' => 'letter-spacing', 'label' => esc_html__( 'Letter Spacing', 'ssc' ), 'selector' => '.grid-item:hover p'),
                                    array('property' => 'overflow', 'label' => esc_html__( 'Overflow', 'ssc' ), 'selector' => '.grid-item:hover p'),
                                    array('property' => 'word-break', 'label' => esc_html__( 'Word Break', 'ssc' ), 'selector' => '.grid-item:hover p'),
                                    array('property' => 'margin', 'label' => esc_html__( 'Margin', 'ssc' ), 'selector' => '.grid-item:hover p'),
                                    array('property' => 'padding', 'label' => esc_html__( 'Padding', 'ssc' ), 'selector' => '.grid-item:hover p'),
                                    array('property' => 'border', 'label' => esc_html__( 'Border', 'ssc' ), 'selector' => '.grid-item:hover p'),
                                    array('property' => 'border-radius', 'label' => esc_html__( 'Border Radius', 'ssc' ), 'selector' => '.grid-item:hover p')
                                ),
                                // Read More Link
                                'Read More Link' => array(
	                                array('property' => 'background', 'selector' => '.grid-item a.rm:hover'),
	                                array('property' => 'background', 'selector' => '.grid-item:hover a.rm'),
	                                array('property' => 'color', 'label' => esc_html__( 'Color', 'ssc' ), 'selector' => '.grid-item a.rm:hover'),
	                                array('property' => 'color', 'label' => esc_html__( 'Color when block hover', 'ssc' ), 'selector' => '.grid-item:hover a.rm'),
	                                array('property' => 'font-size', 'label' => esc_html__( 'Font Size', 'ssc' ), 'selector' => '.grid-item a.rm:hover'),
	                                array('property' => 'line-height', 'label' => esc_html__( 'Line Height', 'ssc' ), 'selector' => '.grid-item a.rm:hover'),
	                                array('property' => 'font-weight', 'label' => esc_html__( 'Font Weight', 'ssc' ), 'selector' => '.grid-item a.rm:hover'),
	                                array('property' => 'font-style', 'label' => esc_html__( 'Font Style', 'ssc' ), 'selector' => '.grid-item a.rm:hover'),
	                                array('property' => 'font-family', 'label' => esc_html__( 'Font Family', 'ssc' ), 'selector' => '.grid-item a.rm:hover'),
	                                array('property' => 'text-align', 'label' => esc_html__( 'Text Align', 'ssc' ), 'selector' => '.grid-item a.rm:hover'),
	                                array('property' => 'text-shadow', 'label' => esc_html__( 'Text Shadow', 'ssc' ), 'selector' => '.grid-item a.rm:hover'),
	                                array('property' => 'box-shadow', 'label' => esc_html__( 'Box Shadow', 'ssc' ), 'selector' => '.grid-item a.rm:hover'),
	                                array('property' => 'text-transform', 'label' => esc_html__( 'Text Transform', 'ssc' ), 'selector' => '.grid-item a.rm:hover'),
	                                array('property' => 'text-decoration', 'label' => esc_html__( 'Text Decoration', 'ssc' ), 'selector' => '.grid-item a.rm:hover'),
	                                array('property' => 'letter-spacing', 'label' => esc_html__( 'Letter Spacing', 'ssc' ), 'selector' => '.grid-item a.rm:hover'),
	                                array('property' => 'display', 'label' => esc_html__( 'Display', 'ssc' ), 'selector' => '.grid-item a.rm:hover'),
	                                array('property' => 'float', 'label' => esc_html__( 'Float', 'ssc' ), 'selector' => '.grid-item a.rm:hover'),
	                                array('property' => 'overflow', 'label' => esc_html__( 'Overflow', 'ssc' ), 'selector' => '.grid-item a.rm:hover'),
	                                array('property' => 'word-break', 'label' => esc_html__( 'Word Break', 'ssc' ), 'selector' => '.grid-item a.rm:hover'),
	                                array('property' => 'margin', 'label' => esc_html__( 'Margin', 'ssc' ), 'selector' => '.grid-item a.rm:hover'),
	                                array('property' => 'padding', 'label' => esc_html__( 'Padding', 'ssc' ), 'selector' => '.grid-item a.rm:hover'),
	                                array('property' => 'border', 'label' => esc_html__( 'Border', 'ssc' ), 'selector' => '.grid-item a.rm:hover'),
	                                array('property' => 'border-radius', 'label' => esc_html__( 'Border Radius', 'ssc' ), 'selector' => '.grid-item a.rm:hover')
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
                            ) // screen responsive
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
function ssc_postgrid_shortcode($atts, $content = null) {
	$thumbnail = $monocolored = $strength = $hover_effect = $show_icon = $icon = $iconout = $limit_lines = $meta2 = $grid_settings = $authorimg = $show_tag = $iconbtn = $read_more = '';
    extract(shortcode_atts(array(
        'grid_type' => 'masonry', //  +
        'template' => '1', //+
        'tax_term' => '', //+
        'withtags' => '',
        'items' => '', //+
        'show_pagination' => '',//+
        'navi_type' => '',//+
        'prev' => '',//+
        'next' => '',//+
        'ior' => '', //+
        'excerpt_type' => '',//+
        'limit_words' => '',//+
        'limit_lines' => '',//+
        'show_thumb' => '',//+
        'thumb_size' => '',//+
        'custom_thumb_size' => '',//+
        'show_thumb_zoom' => '',
        'monocolored' => '',
        'strength' => '',
        'hover_effect' => '',
        'show_icon' => '',
        'icon' => '',
        'show_date' => '',//+
        'date_format' => '',//+
        'show_author' => '',//+
        'show_tag' => '',//+
        'show_category' => '',//+
        'show_comment' => '',//+
        'show_readmore' => '',//+
        'readmore_text' => '',//+
        'readmore_icon' => '',//+
        'show_filters' => '', //+
        'filter_type' => '', //+
        'order' => '', //+
        'orderby' => '', //+
        'all' => '', //+
        'ignore_sticky_posts' => '', //+
        'el_class' => '',//+
//        'lazy_load' => 'no',
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
		switch($arrows){
			case 'yes':
				switch ($arrows_type){
					case 'svg':
						if( '' !== $l_svg || '' !== $r_svg ){
							if( '' !== $l_svg ){
								$p_arrow   = '<button type="button" class="slick-prev">' . ssc_process_svg( $l_svg ) . '</button>';
							}
							if( '' !== $r_svg ){
								$n_arow  = '<button type="button" class="slick-next">' . ssc_process_svg( $r_svg ) . '</button>';
							}
						}
						break;
					default:
						$p_arrow = '<button type="button" class="slick-prev"><i class="' . $iconleft . '"></i></button>';
						$n_arow = '<button type="button" class="slick-next"><i class="' . $iconright . '"></i></button>';
				}
				break;
			default:
				$p_arrow = '';
				$n_arow = '';
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

//		$grid_settings = '
//        jQuery(document).ready(function ($) {
//		    "use strict";
//			$(".' . $grid_type . '").slick({
//				slidesToShow: ' . $d_items . ',
//				slidesToScroll: ' . $scroll . ',
//                dots: true,
//				prevArrow: \'' . $p_arrow . '\',
//				nextArrow: \'' . $n_arow . '\',
//				responsive: [
//					{
//					  breakpoint: 769,
//					  settings: {
//					    slidesToShow: ' . $t_items . ',
//					    slidesToScroll: ' . $scroll . '
//					  }
//					},
//					{
//					  breakpoint: 480,
//					  settings: {
//					    slidesToShow: ' . $m_items . ',
//					    slidesToScroll: ' . $scroll . '
//					  }
//					}
//				]
//			});
//			$(".filter").on("click", "button", function(){
//			    $(".' . $grid_type . '").slick("slickUnfilter");
//				var filterValue = $( this ).attr("data-filter");
//			    $(".' . $grid_type . '").slick("slickFilter", filterValue);
//			});
//			$(".fgroup").each( function( i, buttonGroup ) {
//				var $buttonGroup = $( buttonGroup );
//				$buttonGroup.on( "click", "button", function() {
//					$buttonGroup.find(".current").removeClass("current");
//					$( this ).addClass("current");
//				});
//			});
//        });';

	} else {

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

//			$grid_settings = '
//				jQuery(document).ready(function ($) {
//					"use strict";
//					var $grid = $(".grid").isotope({
//						itemSelector: ".grid-item",
//						layoutMode: "fitRows"
//					});
//					$grid.imagesLoaded().progress( function() {
//						$grid.isotope("layout");
//					});
//					// bind filter button click
//					$(".filter").on( "click", "button", function() {
//						var filterValue = $( this ).attr("data-filter");
//						$grid.isotope({ filter: filterValue });
//					});
//					// change is-checked class on buttons
//					$(".fgroup").each( function( i, buttonGroup ) {
//						var $buttonGroup = $( buttonGroup );
//						$buttonGroup.on( "click", "button", function() {
//							$buttonGroup.find(".current").removeClass("current");
//							$( this ).addClass("current");
//						})
//					});
//				});';
//        if( 'yes' === $lazy_load ){
//	        $grid_settings .= 'document.addEventListener("lazybeforeunveil", function(e){
//			        $(e.target).closest(".grid").isotope("layout");
//			}, true);
//			});
//			        ';
//        }
		} elseif ( $grid_type === 'masonry' ) {

			$settings = json_encode(
				array(
					'layoutMode' => 'masonry',
				)
			);
			$grid_settings = "data-ssc-masonry-settings='$settings' data-ssc-grid-type='$grid_type'";

//			$grid_settings = '
//				jQuery(document).ready(function ($) {
//					"use strict";
//					var $containerm = $(".masonry").isotope({
//						itemSelector: ".grid-item",
//						layoutMode: "masonry",
//						masonry: {
//							columnWidth: ".grid-item",
//							horizontalOrder: true
//						}
//					});
//					$containerm.imagesLoaded().progress( function() {
//						$containerm.isotope("layout");
//					});
//					// bind filter button click
//					$(".filter").on( "click", "button", function() {
//						var filterValue = $( this ).attr("data-filter");
//						$containerm.isotope({ filter: filterValue });
//					});
//					// change is-checked class on buttons
//					$(".fgroup").each( function( i, buttonGroup ) {
//						var $buttonGroup = $( buttonGroup );
//						$buttonGroup.on( "click", "button", function() {
//							$buttonGroup.find(".current").removeClass("current");
//							$( this ).addClass("current");
//						})
//					});
//				});';
//	    if( 'yes' === $lazy_load ) {
//		    $grid_settings .= 'document.addEventListener("lazybeforeunveil", function(e){
//		        $(e.target).closest(".masonry").isotope("layout");
//		}, true);
//		});
//		        ';
//	    }
		}
	}

    $output = '';
//    extract($atts);




    // Vadiables
    $post_taxonomy_data = explode( ',', $tax_term );
    $taxonomy_term = array();
    $post_type = 'post';
    $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;


    // Post Taxonomy
//    if( isset($post_taxonomy_data) ){
    $post_taxonomy_tmp = explode( ':', $post_taxonomy_data[0] );
    if( count($post_taxonomy_tmp) > 1 || !isset($post_taxonomy_tmp[1]))
        $post_type = $post_taxonomy_tmp[0];

    foreach( $post_taxonomy_data as $post_taxonomy ){
        $post_taxonomy_tmp = explode( ':', $post_taxonomy );

        if( isset($post_taxonomy_tmp[1]) ){
            $taxonomy_term[] = $post_taxonomy_tmp[1];
        }
    }

    $taxonomy_objects = get_object_taxonomies( $post_type, 'objects' );
    $taxonomy = key( $taxonomy_objects );

    if( $atts['items'] == 0 ){
        $atts['items'] = -1;
    }
    $intaglist=implode("", preg_split("/:([A-Za-z0-9]+)/", $withtags, -1, PREG_SPLIT_NO_EMPTY));


    $atts['ignore_sticky_posts'] = ( 'yes' !==  $atts['ignore_sticky_posts'] ? false : true );
    $args = array(
        'post_type' 		=> $post_type,
        'posts_per_page' 	=> $atts['items'],
        'orderby'           => $orderby,
        'order' 			=> $order,
        'paged'             => $paged,
        'tag' => $intaglist,
        'ignore_sticky_posts'  => $atts['ignore_sticky_posts'],

    );

    if( count($taxonomy_term) )
    {
        $tax_query = array(
            'relation' => 'OR'
        );

        foreach( $taxonomy_term as $term ){
            $tax_query[] = array(
                'taxonomy' => $taxonomy,
                'field'    => 'slug',
                'terms'    => $term,
            );
        }

        $args['tax_query'] = $tax_query;
    }

    $the_query = new WP_Query( $args );

    $list_posts = $the_query->posts;
    $pcount = $the_query->max_num_pages;

        //}
//    }

	if ($monocolored === '' ) {$strength = '0%';}
	if ($strength === '' ) {$strength = '0%';}

	$mainID = $grid_type;

//    if ($grid_type === 'grid') {$mainID = 'grid';} else {$mainID = 'masonry';}
//    $output .= '<script type="text/javascript">'.$grid_settings.'</script>';

//	wp_add_inline_script( 'isotope', $grid_settings );


    $output .= '<div  class="ssc_post_grid ' . implode(' ', $wrp_classes) . ' col' . $ior.' items'.$items. ' template'.$template.' ' . $el_class . '">';

    // FILTER
    if($show_filters === 'yes') {


        if ($filter_type === 'cats') {

            $postIDs = wp_list_pluck( $list_posts, 'ID' );

            if (!empty($postIDs) && !is_wp_error($postIDs)) {
                $cats = wp_get_object_terms($postIDs, 'category');
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


            $postIDs = wp_list_pluck( $list_posts, 'ID' );

            if (!empty($postIDs) && !is_wp_error($postIDs)) {
                $tags = wp_get_object_terms($postIDs, 'post_tag');

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
	$desclass = "";
    if ($template === '14') {
	    $desclass = 'column2 alayout2';
    }

	$size = '';
	if( '' !== $thumb_size ){
		if( 'custom_size' == $thumb_size && '' !== $custom_thumb_size ){
			$size = ssc_get_img_sizes_array_from_string( $custom_thumb_size );
		} else {
			$size = $thumb_size;
		}
	}
    $output .= '
            <div class="'.$mainID.' '.$desclass.'" ' . $grid_settings . '>';
    if ( $the_query->have_posts() ) {
	    // Image size
	    $format = get_post_format();
	    if ( false === $format )
		    $format = 'standard';
	    // Templates

	    /*
	     * %1$s - $filter_class_list
	     * %2$s - $hover_effect
	     * %3$s - $thumbnail
	     * %4$s - $iconout
	     * %5$s - $title
	     * %6$s - $meta2
	     * %7$s - $myexcept
	     * %8$s - $read_more
	     * %9$s - $meta
	     * %10$s - $dateshort
	     * %11$s - $author
	     * %12$s - $category
	     * %13$s - $commentslabel
	     * %14$s - $dateshort2
	     * %15$s - $authorimg
	     * %16$s - $tagl
	     * %17$s - $categlist
	    */

	    switch ( $template ) {
		    case '1':
		    	if( '' === $size ){
				    $size = 'atiframebuilder_thumb';
				    if ($grid_type === 'masonry') {
					    $size = 'atiframebuilder_masonry600';
				    }
				    if ($ior === '1' ) {
					    $size = 'atiframebuilder_long';
				    }
			    }
			    $dummy = 'images/grid600.gif';
			    break;
		    case '2':
			    if( '' === $size ){
				    $size = 'atiframebuilder_rectangle';
				    if ($ior === '1' ) {
					    $size = 'atiframebuilder_long';
				    }
			    }
			    $dummy = 'images/grid600350.gif';
			    if ($show_thumb === 'yes') {
				    wp_enqueue_script('prettyPhoto');
				    wp_enqueue_style( 'prettyPhoto' );
			    }
			    break;
		    case '3':
		    	if( '' === $size ){
				    $size = 'atiframebuilder_longhalf';
				    if ($ior === '1' ) {
					    $size = 'atiframebuilder_long';
				    }
			    }
			    $dummy = 'images/grid585.gif';
			    if ($show_thumb === 'yes') {
				    wp_enqueue_script('prettyPhoto');
				    wp_enqueue_style( 'prettyPhoto' );
			    }
			    break;
		    case '4':
		    	if( '' === $size ){
				    $size = 'atiframebuilder_thumb_300';
			    }
				$dummy = 'images/grid300.gif';
			    break;
		    case '5':
		    	if( '' === $size ){
				    $size = 'atiframebuilder_rectangle';
				    if ($ior === '1' ) {
					    $size = 'atiframebuilder_long';
				    }
			    }
				$dummy = 'images/grid600350.gif';
			    if ($show_thumb === 'yes') {
				    wp_enqueue_script('prettyPhoto');
				    wp_enqueue_style( 'prettyPhoto' );
			    }
			    break;
		    case '6':
		    	if( '' === $size ){
				    $size = 'atiframebuilder_longhalf';
				    if ($ior === '1' ) {
					    $size = 'atiframebuilder_long';
				    }
			    }
			    $dummy = 'images/grid585.gif';
			    if ($show_thumb === 'yes') {
				    wp_enqueue_script('prettyPhoto');
				    wp_enqueue_style( 'prettyPhoto' );
			    }
			    break;
		    case '7':
		    	if( '' === $size ){
				    $size = 'atiframebuilder_masonry';
				    if ($grid_type === 'masonry') {
					    $size = 'atiframebuilder_masonry600';
				    }
				    if ($ior === '1' ) {
					    $size = 'atiframebuilder_long';
				    }
			    }
			    $dummy = 'images/mas600.gif';
			    break;
		    case '8':
		    	if( '' === $size ){
				    $size = 'atiframebuilder_thumb';
				    if ($grid_type === 'masonry') {
					    $size = 'atiframebuilder_masonry600';
				    }
				    if ($ior === '1' ) {
					    $size = 'atiframebuilder_long';
				    }
			    }
			    $dummy = 'images/grid600.gif';
			    if ($show_thumb === 'yes') {
				    wp_enqueue_script('prettyPhoto');
				    wp_enqueue_style( 'prettyPhoto' );
			    }
			    break;
		    case '9':
		    	if( '' === $size ){
				    $size = 'atiframebuilder_rectangle';
				    if ($ior === '1' ) {
					    $size = 'atiframebuilder_long';
				    }
			    }
			    $dummy = 'images/grid600350.gif';
			    if ($show_thumb === 'yes') {
				    wp_enqueue_script('prettyPhoto');
				    wp_enqueue_style( 'prettyPhoto' );
			    }
			    break;
		    case '10':
		    	if( '' === $size ){
				    $size = 'atiframebuilder_thumb';
				    if ($grid_type === 'masonry') {
					    $size = 'atiframebuilder_masonry600';
				    }
				    if ($ior === '1' ) {
					    $size = 'atiframebuilder_long';
				    }
			    }
			    $dummy = 'images/grid600.gif';
			    break;
		    case '11':
		    	if( '' === $size ){
				    $size = 'atiframebuilder_longhalf';
				    if ($ior === '1' ) {
					    $size = 'atiframebuilder_long';
				    }
			    }
			    $dummy = 'images/grid585.gif';
			    if ($show_thumb === 'yes') {
				    wp_enqueue_script('prettyPhoto');
				    wp_enqueue_style( 'prettyPhoto' );
			    }
			    break;
		    case '12':
		    	if( '' === $size ){
				    $size = 'atiframebuilder_rectangle';
				    if ($ior === '1' ) {
					    $size = 'atiframebuilder_long';
				    }
			    }
			    $dummy = 'images/grid600400.gif';
			    if ($show_thumb === 'yes') {
				    wp_enqueue_script('prettyPhoto');
				    wp_enqueue_style( 'prettyPhoto' );
			    }
			    break;
		    case '13':
			    if( '' === $size ){
				    $size = 'atiframebuilder_rectangle';
				    if ($ior === '1' ) {
					    $size = 'atiframebuilder_long';
				    }
			    }
			    $dummy = 'images/grid600350.gif';
			    if ($show_thumb === 'yes') {
				    wp_enqueue_script('prettyPhoto');
				    wp_enqueue_style( 'prettyPhoto' );
			    }
			    break;
		    case '14':
			    if( '' === $size ){
				    $size = 'atiframebuilder_rectangle';
				    if ($ior === '1' ) {
					    $size = 'atiframebuilder_long';
				    }
			    }
			    $dummy = 'images/grid400.gif';
			    if ($show_thumb === 'yes') {
				    wp_enqueue_script('prettyPhoto');
				    wp_enqueue_style( 'prettyPhoto' );
			    }
			    break;


		    case '20':
		    	if( '' === $size ){
				    $size = 'atiframebuilder_thumb';
				    if ($ior === '1' ) {
					    $size = 'atiframebuilder_long';
				    }
			    }
			    $dummy = 'images/grid600.gif';
			    break;
		    case '21':
		    case '22':
			    if( '' === $size ){
				    $size = 'atiframebuilder_rectangle';
				    if ($ior === '1' ) {
					    $size = 'atiframebuilder_long';
				    }
			    }
			    $dummy = 'images/grid600350.gif';
			    if ($show_thumb === 'yes') {
				    wp_enqueue_script('prettyPhoto');
				    wp_enqueue_style( 'prettyPhoto' );
			    }
//			    $out_temp = '<div class="grid-item %1$s %2$s "><div class="pbody">
//                <div class="thumb"> %3$s </div>
//                <div class="body"> %5$s %9$s %7$s %8$s </div>
//                </div>
//            </div>';
			    break;
		    default:
		    	if( '' === $size ){
				    $size = 'atiframebuilder_thumb';
			    }
			    $dummy = 'images/grid600.gif';
	    }

	    // TEMPLATES END

        foreach ( $list_posts as $item ) {
	        $myexcept = $dateshort = $author = $category = $commentslabel = $commentslabel = $dateshort2 = $tagl = $categlist = '';
	        if ($show_readmore === 'yes') {
		        if( '' !== $readmore_icon ){
			        $iconbtn  = ssc_process_svg( $readmore_icon );
		        }
		        $read_more = '<a href="'.esc_url(get_permalink($item->ID)).'" class="rm">' . $iconbtn . ' ' . $readmore_text . '</a>';
	        }
            // Elements
            // Image
	        $image = get_the_post_thumbnail( $item->ID, $size );
	        if ('' === $image) {
		        $image = '<img src="'.SSC_URL . $dummy . '" alt="" />';
	        }
            $full = get_the_post_thumbnail_url( $item->ID, 'full' );
            $formatico = '';
            if ($show_thumb === 'yes') {
                if ($template === '2' || $template === '3' || $template === '5' || $template === '6' || $template === '9' || $template === '12' || '13' === $template || '21' === $template || '22' === $template ) {
                    $data_lightbox = 'rel="prettyPhoto" class="kc-pretty-photo"';

                    if ($show_thumb_zoom === 'yes') {
                        $thumbnail = '<a '.$data_lightbox.' href="'.$full.'"><div class="over"><i class="far fa-search-plus"></i></div><span class="thumb mo'.$monocolored.' " style="-webkit-filter: grayscale('.$strength.');filter: grayscale('.$strength.');">' . $image . '</span></a>';
                    } else {
                        $thumbnail = '<span class="mo'.$monocolored.' " style="-webkit-filter: grayscale('.$strength.');filter: grayscale('.$strength.');">' . $image . '</span>';
                    }
                } elseif ($template === '1' || $template === '4' || $template === '7' || $template === '8' || $template === '10'|| $template === '11'|| $template === '20') {
                    $thumbnail = '<span class="mo'.$monocolored.' " style="-webkit-filter: grayscale('.$strength.');filter: grayscale('.$strength.');">' . $image . '</span>';
                } elseif ($template === '14') {
	                if ( 'standard' == $format ) {

	                } elseif ( 'video' == $format ) {
		                $formatico = '<div><img src="'.get_template_directory_uri().'/images/play.svg" alt="'.get_the_title().'"></div>';
	                } elseif ( 'audio' == $format ) {
		                $formatico = '<div><img src="'.get_template_directory_uri().'/images/volume.svg" alt="'.get_the_title().'"></div>';
	                } elseif ( 'gallery' == $format ) {
		                $formatico = '<div><img src="'.get_template_directory_uri().'/images/gallery.svg" alt="'.get_the_title().'"></div>';
	                } elseif ( 'quote' == $format ) {
		                $formatico = '<div><img src="'.get_template_directory_uri().'/images/quote.svg" alt="'.get_the_title().'"></div>';
	                } elseif ( 'link' == $format ) {
		                $formatico = '<div><img src="'.get_template_directory_uri().'/images/link.svg" alt="'.get_the_title().'"></div>';
	                }
	                $thumbnail = '<a href="'.get_the_permalink().'" rel="bookmark"></a><span class="mo'.$monocolored.' " style="-webkit-filter: grayscale('.$strength.');filter: grayscale('.$strength.');">' . $image . '</span><div class="over">'.$formatico.'</div>';

                }
            } else {
                $thumbnail = '';
            }



// TITLE

	        $title = '<div class="title"><a href="'.esc_url(get_permalink($item->ID)).'" class="lines'.$limit_lines.'">' . get_the_title($item->ID) . '</a></div>';
            $meta = '';
	        if ( $show_tag === 'yes' ) {
		        if ( $tagl = get_the_tag_list( '<div class="taglist">', ',', '</div>', $item->ID ) ) {
		        } else {
			        $tagl = '';
		        }
	        }
            if ($show_date === 'yes' || $show_author === 'yes' || $show_category === 'yes' || $show_comment === 'yes') {
                if ($show_date === 'yes') {
                	if ( empty( $date_format ) ) {
		                $date = '<span class="date"><i class="far fa-clock"></i> <time class="entry-date" datetime="' . get_the_date('c', $item->ID) . '">' . get_the_time('F j, Y', $item->ID) . '</time></span> <span class="updated">'. get_the_modified_time('F jS, Y h:i a', $item->ID).'</span>';
		                $date2 = '<span class="date"><i class="far fa-clock"></i> <time class="entry-date" datetime="' . get_the_date('c', $item->ID) . '">' . get_the_time('M j, Y', $item->ID) . '</time></span> <span class="updated">'. get_the_modified_time('F jS, Y h:i a', $item->ID).'</span>';
		                $dateshort = '<span class="date"><time class="entry-date" datetime="' . get_the_date('c', $item->ID) . '"><span class="dm">' . get_the_time('M', $item->ID) . '</span><span class="dc">' . get_the_time('d', $item->ID) . '</span></time></span> <span class="updated">'. get_the_modified_time('F jS, Y h:i a', $item->ID).'</span>';
		                $dateshort2 = '<span class="date"><time class="entry-date" datetime="' . get_the_date('c', $item->ID) . '">' . get_the_time('M d, Y', $item->ID) . '</time></span> <span class="updated">'. get_the_modified_time('F jS, Y h:i a', $item->ID).'</span>';
	                } else {
                		$format = '';
                		try {
			                foreach( str_split($date_format) as $s ){
				                if (ctype_alpha($s)) {
					                $format .= '<\s\p\a\n>' . $s . '</\s\p\a\n>';
				                } else {
					                $format .= $s;
				                }
			                }
		                } catch (Exception $e) {
			                $format = '<\s\p\a\n>M</\s\p\a\n> <\s\p\a\n>j</\s\p\a\n>, <\s\p\a\n>Y</\s\p\a\n>';
		                }
		                $date = '<span class="date"><i class="far fa-clock"></i> <time class="entry-date" datetime="' . get_the_date('c', $item->ID) . '">' . get_the_time($format, $item->ID) . '</time></span> <span class="updated">'. get_the_modified_time( $format, $item->ID).'</span>';
		                $date2 = '<span class="date"><i class="far fa-clock"></i> <time class="entry-date" datetime="' . get_the_date('c', $item->ID) . '">' . get_the_time( $format, $item->ID) . '</time></span> <span class="updated">'. get_the_modified_time( $format, $item->ID).'</span>';
		                $dateshort = '<span class="date"><time class="entry-date" datetime="' . get_the_date('c', $item->ID) . '"><span class="dm">' . get_the_time('M', $item->ID) . '</span><span class="dc">' . get_the_time('d', $item->ID) . '</span></time></span> <span class="updated">'. get_the_modified_time( $format, $item->ID).'</span>';
		                $dateshort2 = '<span class="date"><time class="entry-date" datetime="' . get_the_date('c', $item->ID) . '">' . get_the_time( $format, $item->ID) . '</time></span> <span class="updated">'. get_the_modified_time('F jS, Y h:i a', $item->ID).'</span>';

	                }
                } else {$date = '';$date2 = '';}
                if ($show_author === 'yes') {
                    $author = '<span class="post-author"><i class="far fa-user"></i>  <a href="'.get_author_posts_url( $item->post_author ).'" rel="author">'.get_the_author_meta( 'display_name', $item->post_author ).'</a></span>';
                    $authorimg ='<span class="post-author">'.get_avatar( get_the_author_meta( 'user_email' ), 40 ).'  <a href="'.get_author_posts_url( $item->post_author ).'" rel="author">'.get_the_author_meta( 'display_name', $item->post_author ).'</a></span>';
                }
                if ($show_category === 'yes') {
                    $cat = get_the_category($item->ID);
	                $categlist = get_the_category_list( '', 'multiple', $item->ID );
	                if(!empty($cat)) {
                        $category = '<span class="cats"><i class="far fa-folder"></i> '.$cat[0]->cat_name.'</span>';
                    }
                }
                if ($show_comment === 'yes') {
                    $commentslabel = '<span class="commentsc"><i class="far fa-comments"></i> <a href="'.get_comments_link($item->ID).'">'.get_comments_number( $item->ID ).'</a></span>';
                }

                $meta = '<div class="meta">' . $date . $author . $category . $commentslabel . '</div>';
                $meta2 = '<div class="meta">' . $date2 . $author . $category . $commentslabel . '</div>';
            }
            // Description
            if( !post_password_required( $item->ID ) ) {
                if ($limit_words > 0) {
                    if ($excerpt_type === 'content') {
	                    $extext = wp_trim_words(preg_replace( '~\[[^\]]+\]~', '', $item->post_content ), $limit_words);
	                    if (!empty($extext)) {
		                    $myexcept = '<p>' . $extext . '</p>';
	                    }
                    } elseif ($excerpt_type === 'excerpt') {
                        if (has_excerpt($item->ID)) {
                            $limit = $limit_words + 1;
                            $exdata = get_the_excerpt($item->ID);
                            $extext = explode(' ', $exdata, $limit);
                            array_pop($extext);
                            $extext = implode(" ", $extext) . "...";
                            $myexcept = '<p>' . $extext . '</p>';
                        }
                    }
                } else if ( '' === $limit_words ) {
	                if ($excerpt_type === 'content') {
		                $extext = preg_replace( '~\[[^\]]+\]~', '', $item->post_content );
		                if (!empty($extext)) {
			                $myexcept = '<p>' . $extext . '</p>';
		                }
	                } elseif ($excerpt_type === 'excerpt') {
		                if (has_excerpt($item->ID)) {
			                $myexcept = '<p>' . get_the_excerpt($item->ID) . '</p>';
		                }
	                }
                }
            } else {
	            $myexcept = '<p>' . esc_attr__( 'This content is password protected. To view it please enter your password', 'atiframe-builder' ). '</p>';
            }
	        if( !empty( $icon ) ) {$iconout = '<a href="'.esc_url(get_permalink($item->ID)).'" class="icoli"><i class="' . $icon . '"></i></a>';}

	        // FILTER
            $filter_class_list = '';
            if($show_filters === 'yes') {
                if($filter_type === 'cats') {
                    $catlist = wp_get_object_terms( $item->ID, 'category', array( 'fields' => 'names' ));
//                    if( ! empty($catlist)){
                        if( ! is_wp_error($catlist) ){
//	                        $filter_class_list = implode( ' ', $catlist);
                            foreach( $catlist as $term ){
                                $filter_class_list .= ' ' . str_replace( ' ', '-', $term );
                            }
                        }
//                    }
                } elseif ($filter_type === 'tags') {
                    $taglist = wp_get_object_terms( $item->ID, 'post_tag', array( 'fields' => 'names' ));
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

	        ob_start();
	            include SSC_SHORTCODES_PATH . 'templates/post-grid/template' . $template . '.php';
	        $output .= ob_get_clean();





	        // TEMPLATES END

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
        $output .= '<div class="clearfix" role="navigation"><div class="ssc-post-grid-navigation">'.paginate_links( array(
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
//    $loop = null;
    wp_reset_postdata();

    return $output;
}

add_shortcode('ssc_postgrid', 'ssc_postgrid_shortcode');

add_filter( 'shortcode_ssc_postgrid_before_css_generating', 'ssc_postgrid_filter_css' );

function ssc_postgrid_filter_css( $atts ) {
	$styles = array();
	extract( shortcode_atts( array(
		'template'             => '', //+
		'show_readmore'        => '', //+
		'readmore_icon'        => '', //+
		'readmore_icon_color'  => '', //+
		'readmore_icon_hcolor' => '', //+
		'arrows'               => 'no',
		'arrows_type'          => 'icon',
		'l_svg'                => '',
		'r_svg'                => '',
		'svg_color'            => '',
		'svg_hcolor'           => '',
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
	if ( $show_readmore === 'yes' ) {
		if ( '' !== $readmore_icon ) {
			if( empty( $styles ) ) {
				if ( ! empty ( $atts['my-css'] ) ) {
					$styles = json_decode( str_replace( '`', '"', $atts['my-css'] ), true);
				}
			}
			if ( '' !== $readmore_icon_color ) {
				if ( empty ( $styles['kc-css']['any']['svg']['fill| .rm svg'] ) ) {
					$styles['kc-css']['any']['svg']['fill| .rm svg'] = $readmore_icon_color;
				}
			}
			if ( '' !== $readmore_icon_hcolor ) {
				if ( empty ( $styles['kc-css']['any']['svg']['fill| .rm:hover svg'] ) ) {
					$styles['kc-css']['any']['svg']['fill| .rm:hover svg'] = $readmore_icon_hcolor;
				}
			}
		}
	}

	if( empty( $styles ) ){
		return $atts;
	}

	$atts['my-css'] = str_replace( '"', '`', json_encode( $styles, JSON_FORCE_OBJECT  ) );
	return $atts;
}

