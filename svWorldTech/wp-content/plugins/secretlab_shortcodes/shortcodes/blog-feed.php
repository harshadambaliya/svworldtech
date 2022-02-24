<?php


add_action( 'init', 'ssc_blog_feed_init', 99 );

/**
 * Additional functions
 */

function ssc_blog_feed_init() {

	if ( ! method_exists( 'Atiframebuilder_Theme_Demo', 'get_archive_templates' ) ) {
		return;
	}

	ssc_blog_feed_params();

	add_shortcode( 'ssc_blog_feed', 'ssc_blog_feed_shortcode' );

}

function ssc_blog_feed_params() {

//	var_dump( method_exists( 'Atiframebuilder_Blog', 'archive_template' ) );
//	var_dump( 11111 );
//	die();
	global $kc;
	$kc->add_map( array(
		'ssc_blog_feed' => array(
			'name'         => esc_html__( 'Blog feed', 'ssc' ),
			'description'  => esc_html__( 'It displays posts by post type with unlimited design templates and colors',
				'ssc' ),
			'icon'         => 'kc-icon-box ssc-icon-6',
			'is_container' => true,
			'category'     => 'SecretLab',
			'css_box'      => true,
			'params'       => array(
				esc_html__( 'General', 'ssc' ) => array(
					array(
						'name'    => 'template',
						'label'   => esc_html__( 'Select Template', 'ssc' ),
						'type'    => 'radio_image',  // USAGE TEXT TYPE
						'options' => ssc_blog_feed_get_archive_templates(),
						'value'   => '1', // remove this if you do not need a default content
					),
					array(
						'name'    => 'por',
						'label'   => esc_html__( 'Posts On Row', 'ssc' ),
						'type'    => 'select',
						'options' => array(
							'1' => esc_html__( '1 Item', 'ssc' ),
							'2' => esc_html__( '2 Items', 'ssc' ),
							'3' => esc_html__( '3 Items', 'ssc' ),
						),
						'value'   => '2',
					),
					array(
						'name'        => 'tax_term',
						'label'       => esc_html__( 'Post Type', 'ssc' ),
						'type'        => 'post_taxonomy',
						'description' => esc_html__( 'Choose post type to display', 'ssc' ),
					),
					array(
						'name'  => 'ignore_sticky_posts',
						'label' => esc_html__( 'Ignore Sticky posts', 'ssc' ),
						'type'  => 'toggle',
						'value' => esc_html__( 'yes', 'ssc' ),
					),
					array(
						'name'        => 'withtags',
						'label'       => esc_html__( 'Contain Tags', 'ssc' ),
						'type'        => 'autocomplete',
						'description' => esc_html__( 'If you want so show only posts with specific tag or tags.',
							'ssc' ),
						'options'     => array(
							'multiple' => true,
							'taxonomy' => 'post_tag',
						),
					),
					array(
						'name'    => 'order',
						'label'   => esc_html__( 'Order Of Posts', 'ssc' ),
						'type'    => 'select',
						'options' => array(
							'DESC' => esc_html__( 'Descending', 'ssc' ),
							'ASC'  => esc_html__( 'Ascending', 'ssc' ),
						),
						'value'   => 'DESC',
					),
					array(
						'name'    => 'orderby',
						'label'   => esc_html__( 'Order By', 'ssc' ),
						'type'    => 'select',
						'options' => array(
							'date'          => esc_html__( 'Date', 'ssc' ),
							'comment_count' => esc_html__( 'Comment Count', 'ssc' ),
						),
						'value'   => 'date',
					),

					array(
						'name'        => 'items',
						'label'       => esc_html__( 'Posts Per Page', 'ssc' ),
						'type'        => 'text',
						'value'       => '12',
						'description' => esc_html__( 'Set -1 if want to show all posts on the page', 'ssc' ),
					),
					array(
						'name'  => 'show_pagination',
						'label' => esc_html__( 'Show Pagination', 'ssc' ),
						'type'  => 'toggle',
						'value' => esc_html__( 'Yes', 'ssc' ),
					),
					array(
						'name'        => 'el_class',
						'label'       => esc_html__( 'Extra Class Name', 'ssc' ),
						'type'        => 'text',
						'description' => esc_html__( 'If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your CSS file.',
							'ssc' ),
						'admin_label' => true,
						'value'       => '',
					),

				),
				//Styling
				esc_html__( 'styling', 'ssc' ) => array(
					array(
						'name'        => 'my-css',
						'label'       => esc_html__( 'Styling', 'ssc' ),
						'type'        => 'css',
						'value'       => '',
						// remove this if you do not need a default content
						'description' => esc_html__( 'Styles', 'ssc' ),
						'options'     => array(
							array(
								'screens'        => "any,999,768,667,479",
								'Box' => array(
									array('property' => 'display', 'label' => esc_html__( 'Display', 'ssc' )),
									array('property' => 'float', 'label' => esc_html__( 'Float', 'ssc' )),
									array('property' => 'background'),
									array('property' => 'box-shadow', 'label' => esc_html__( 'Box Shadow', 'ssc' )),
									array('property' => 'opacity', 'label' => esc_html__( 'Opacity', 'ssc' )),
									array('property' => 'margin', 'label' => esc_html__( 'Margin', 'ssc' )),
									array('property' => 'padding', 'label' => esc_html__( 'Padding', 'ssc' )),
									array('property' => 'border', 'label' => esc_html__( 'Border', 'ssc' )),
									array('property' => 'border-radius', 'label' => esc_html__( 'Border Radius', 'ssc' )),
								),
								'Article' => array(
									array('property' => 'display', 'label' => esc_html__( 'Display', 'ssc' ), 'selector' => 'article'),
									array('property' => 'float', 'label' => esc_html__( 'Float', 'ssc' ), 'selector' => 'article'),
									array('property' => 'background', 'selector' => 'article'),
									array('property' => 'color', 'label' =>  esc_html__( 'Color', 'ssc' ), 'selector' => 'article'),
									array('property' => 'font-size', 'label' =>  esc_html__( 'Font Size', 'ssc' ), 'selector' => 'article'),
									array('property' => 'font-weight', 'label' =>  esc_html__( 'Font Weight', 'ssc' ), 'selector' => 'article'),
									array('property' => 'font-style', 'label' =>  esc_html__( 'Font Style', 'ssc' ), 'selector' => 'article'),
									array('property' => 'font-family', 'label' =>  esc_html__( 'Font Family', 'ssc' ), 'selector' => 'article'),
									array('property' => 'text-align', 'label' =>  esc_html__( 'Text Align', 'ssc' ), 'selector' => 'article'),
									array('property' => 'text-shadow', 'label' =>  esc_html__( 'Text Shadow', 'ssc' ), 'selector' => 'article'),
									array('property' => 'text-transform', 'label' =>  esc_html__( 'Text Transform', 'ssc' ), 'selector' => 'article'),
									array('property' => 'text-decoration', 'label' =>  esc_html__( 'Text Decoration', 'ssc' ), 'selector' => 'article'),
									array('property' => 'line-height', 'label' =>  esc_html__( 'Line Height', 'ssc' ), 'selector' => 'article'),
									array('property' => 'letter-spacing', 'label' =>  esc_html__( 'Letter Spacing', 'ssc' ), 'selector' => 'article'),
									array('property' => 'overflow', 'label' =>  esc_html__( 'Overflow', 'ssc' ), 'selector' => 'article'),
									array('property' => 'word-break', 'label' =>  esc_html__( 'Word Break', 'ssc' ), 'selector' => 'article'),
									array('property' => 'width', 'label' => esc_html__( 'Width', 'ssc' ), 'selector' => 'article'),
									array('property' => 'height', 'label' => esc_html__( 'Height', 'ssc' ), 'selector' => 'article'),
									array('property' => 'box-shadow', 'label' => esc_html__( 'Box Shadow', 'ssc' ), 'selector' => 'article'),
									array('property' => 'opacity', 'label' => esc_html__( 'Opacity', 'ssc' ), 'selector' => 'article'),
									array('property' => 'margin', 'label' => esc_html__( 'Margin', 'ssc' ), 'selector' => 'article'),
									array('property' => 'padding', 'label' => esc_html__( 'Padding', 'ssc' ), 'selector' => 'article'),
									array('property' => 'border', 'label' => esc_html__( 'Border', 'ssc' ), 'selector' => 'article'),
									array('property' => 'border-radius', 'label' => esc_html__( 'Border Radius', 'ssc' ), 'selector' => 'article'),
								),
								'Thumbnail Block' => array(
									array('property' => 'display', 'label' => esc_html__( 'Display', 'ssc' ), 'selector' => 'article .thumb'),
									array('property' => 'float', 'label' => esc_html__( 'Float', 'ssc' ), 'selector' => 'article .thumb'),
									array('property' => 'background', 'selector' => 'article .thumb'),
									array('property' => 'color', 'label' =>  esc_html__( 'Color', 'ssc' ), 'selector' => 'article .thumb'),
									array('property' => 'font-size', 'label' =>  esc_html__( 'Font Size', 'ssc' ), 'selector' => 'article .thumb'),
									array('property' => 'font-weight', 'label' =>  esc_html__( 'Font Weight', 'ssc' ), 'selector' => 'article .thumb'),
									array('property' => 'line-height', 'label' =>  esc_html__( 'Line Height', 'ssc' ), 'selector' => 'article .thumb'),
									array('property' => 'overflow', 'label' =>  esc_html__( 'Overflow', 'ssc' ), 'selector' => 'article .thumb'),
									array('property' => 'width', 'label' => esc_html__( 'Width', 'ssc' ), 'selector' => 'article .thumb'),
									array('property' => 'height', 'label' => esc_html__( 'Height', 'ssc' ), 'selector' => 'article .thumb'),
									array('property' => 'box-shadow', 'label' => esc_html__( 'Box Shadow', 'ssc' ), 'selector' => 'article .thumb'),
									array('property' => 'opacity', 'label' => esc_html__( 'Opacity', 'ssc' ), 'selector' => 'article .thumb'),
									array('property' => 'margin', 'label' => esc_html__( 'Margin', 'ssc' ), 'selector' => 'article .thumb'),
									array('property' => 'padding', 'label' => esc_html__( 'Padding', 'ssc' ), 'selector' => 'article .thumb'),
									array('property' => 'border', 'label' => esc_html__( 'Border', 'ssc' ), 'selector' => 'article .thumb'),
									array('property' => 'border-radius', 'label' => esc_html__( 'Border Radius', 'ssc' ), 'selector' => 'article .thumb'),
								),
								'Thumbnail' => array(
									array('property' => 'display', 'label' => esc_html__( 'Display', 'ssc' ), 'selector' => 'article .thumb img'),
									array('property' => 'float', 'label' => esc_html__( 'Float', 'ssc' ), 'selector' => 'article .thumb img'),
									array('property' => 'width', 'label' => esc_html__( 'Width', 'ssc' ), 'selector' => 'article .thumb img'),
									array('property' => 'height', 'label' => esc_html__( 'Height', 'ssc' ), 'selector' => 'article .thumb img'),
									array('property' => 'box-shadow', 'label' => esc_html__( 'Box Shadow', 'ssc' ), 'selector' => 'article .thumb img'),
									array('property' => 'opacity', 'label' => esc_html__( 'Opacity', 'ssc' ), 'selector' => 'article .thumb img'),
									array('property' => 'margin', 'label' => esc_html__( 'Margin', 'ssc' ), 'selector' => 'article .thumb img'),
									array('property' => 'padding', 'label' => esc_html__( 'Padding', 'ssc' ), 'selector' => 'article .thumb img'),
									array('property' => 'border', 'label' => esc_html__( 'Border', 'ssc' ), 'selector' => 'article .thumb img'),
									array('property' => 'border-radius', 'label' => esc_html__( 'Border Radius', 'ssc' ), 'selector' => 'article .thumb img'),
								),
								'Content Block' => array(
									array('property' => 'display', 'label' => esc_html__( 'Display', 'ssc' ), 'selector' => 'article .c_block'),
									array('property' => 'float', 'label' => esc_html__( 'Float', 'ssc' ), 'selector' => 'article .c_block'),
									array('property' => 'background', 'selector' => 'article .c_block'),
									array('property' => 'color', 'label' =>  esc_html__( 'Color', 'ssc' ), 'selector' => 'article .c_block'),
									array('property' => 'font-size', 'label' =>  esc_html__( 'Font Size', 'ssc' ), 'selector' => 'article .c_block'),
									array('property' => 'font-weight', 'label' =>  esc_html__( 'Font Weight', 'ssc' ), 'selector' => 'article .c_block'),
									array('property' => 'font-style', 'label' =>  esc_html__( 'Font Style', 'ssc' ), 'selector' => 'article .c_block'),
									array('property' => 'font-family', 'label' =>  esc_html__( 'Font Family', 'ssc' ), 'selector' => 'article .c_block'),
									array('property' => 'text-align', 'label' =>  esc_html__( 'Text Align', 'ssc' ), 'selector' => 'article .c_block'),
									array('property' => 'text-shadow', 'label' =>  esc_html__( 'Text Shadow', 'ssc' ), 'selector' => 'article .c_block'),
									array('property' => 'text-transform', 'label' =>  esc_html__( 'Text Transform', 'ssc' ), 'selector' => 'article .c_block'),
									array('property' => 'text-decoration', 'label' =>  esc_html__( 'Text Decoration', 'ssc' ), 'selector' => 'article .c_block'),
									array('property' => 'line-height', 'label' =>  esc_html__( 'Line Height', 'ssc' ), 'selector' => 'article .c_block'),
									array('property' => 'letter-spacing', 'label' =>  esc_html__( 'Letter Spacing', 'ssc' ), 'selector' => 'article .c_block'),
									array('property' => 'overflow', 'label' =>  esc_html__( 'Overflow', 'ssc' ), 'selector' => 'article .c_block'),
									array('property' => 'word-break', 'label' =>  esc_html__( 'Word Break', 'ssc' ), 'selector' => 'article .c_block'),
									array('property' => 'width', 'label' => esc_html__( 'Width', 'ssc' ), 'selector' => 'article .c_block'),
									array('property' => 'height', 'label' => esc_html__( 'Height', 'ssc' ), 'selector' => 'article .c_block'),
									array('property' => 'box-shadow', 'label' => esc_html__( 'Box Shadow', 'ssc' ), 'selector' => 'article .c_block'),
									array('property' => 'opacity', 'label' => esc_html__( 'Opacity', 'ssc' ), 'selector' => 'article .c_block'),
									array('property' => 'margin', 'label' => esc_html__( 'Margin', 'ssc' ), 'selector' => 'article .c_block'),
									array('property' => 'padding', 'label' => esc_html__( 'Padding', 'ssc' ), 'selector' => 'article .c_block'),
									array('property' => 'border', 'label' => esc_html__( 'Border', 'ssc' ), 'selector' => 'article .c_block'),
									array('property' => 'border-radius', 'label' => esc_html__( 'Border Radius', 'ssc' ), 'selector' => 'article .c_block'),
								),
								'Entry Header' => array(
									array('property' => 'display', 'label' => esc_html__( 'Display', 'ssc' ), 'selector' => 'article .entry-header'),
									array('property' => 'float', 'label' => esc_html__( 'Float', 'ssc' ), 'selector' => 'article .entry-header'),
									array('property' => 'background', 'selector' => 'article .entry-header'),
									array('property' => 'color', 'label' =>  esc_html__( 'Color', 'ssc' ), 'selector' => 'article .entry-header'),
									array('property' => 'font-size', 'label' =>  esc_html__( 'Font Size', 'ssc' ), 'selector' => 'article .entry-header'),
									array('property' => 'font-weight', 'label' =>  esc_html__( 'Font Weight', 'ssc' ), 'selector' => 'article .entry-header'),
									array('property' => 'font-style', 'label' =>  esc_html__( 'Font Style', 'ssc' ), 'selector' => 'article .entry-header'),
									array('property' => 'font-family', 'label' =>  esc_html__( 'Font Family', 'ssc' ), 'selector' => 'article .entry-header'),
									array('property' => 'text-align', 'label' =>  esc_html__( 'Text Align', 'ssc' ), 'selector' => 'article .entry-header'),
									array('property' => 'text-shadow', 'label' =>  esc_html__( 'Text Shadow', 'ssc' ), 'selector' => 'article .entry-header'),
									array('property' => 'text-transform', 'label' =>  esc_html__( 'Text Transform', 'ssc' ), 'selector' => 'article .entry-header'),
									array('property' => 'text-decoration', 'label' =>  esc_html__( 'Text Decoration', 'ssc' ), 'selector' => 'article .entry-header'),
									array('property' => 'line-height', 'label' =>  esc_html__( 'Line Height', 'ssc' ), 'selector' => 'article .entry-header'),
									array('property' => 'letter-spacing', 'label' =>  esc_html__( 'Letter Spacing', 'ssc' ), 'selector' => 'article .entry-header'),
									array('property' => 'overflow', 'label' =>  esc_html__( 'Overflow', 'ssc' ), 'selector' => 'article .entry-header'),
									array('property' => 'word-break', 'label' =>  esc_html__( 'Word Break', 'ssc' ), 'selector' => 'article .entry-header'),
									array('property' => 'width', 'label' => esc_html__( 'Width', 'ssc' ), 'selector' => 'article .entry-header'),
									array('property' => 'height', 'label' => esc_html__( 'Height', 'ssc' ), 'selector' => 'article .entry-header'),
									array('property' => 'box-shadow', 'label' => esc_html__( 'Box Shadow', 'ssc' ), 'selector' => 'article .entry-header'),
									array('property' => 'opacity', 'label' => esc_html__( 'Opacity', 'ssc' ), 'selector' => 'article .entry-header'),
									array('property' => 'margin', 'label' => esc_html__( 'Margin', 'ssc' ), 'selector' => 'article .entry-header'),
									array('property' => 'padding', 'label' => esc_html__( 'Padding', 'ssc' ), 'selector' => 'article .entry-header'),
									array('property' => 'border', 'label' => esc_html__( 'Border', 'ssc' ), 'selector' => 'article .entry-header'),
									array('property' => 'border-radius', 'label' => esc_html__( 'Border Radius', 'ssc' ), 'selector' => 'article .entry-header'),
								),
								'Entry Title' => array(
									array('property' => 'display', 'label' => esc_html__( 'Display', 'ssc' ), 'selector' => 'article .entry-title'),
									array('property' => 'float', 'label' => esc_html__( 'Float', 'ssc' ), 'selector' => 'article .entry-title'),
									array('property' => 'background', 'selector' => 'article .entry-title'),
									array('property' => 'color', 'label' =>  esc_html__( 'Color', 'ssc' ), 'selector' => 'article .entry-title a'),
									array('property' => 'font-size', 'label' =>  esc_html__( 'Font Size', 'ssc' ), 'selector' => 'article .entry-title'),
									array('property' => 'font-weight', 'label' =>  esc_html__( 'Font Weight', 'ssc' ), 'selector' => 'article .entry-title'),
									array('property' => 'font-style', 'label' =>  esc_html__( 'Font Style', 'ssc' ), 'selector' => 'article .entry-title'),
									array('property' => 'font-family', 'label' =>  esc_html__( 'Font Family', 'ssc' ), 'selector' => 'article .entry-title'),
									array('property' => 'text-align', 'label' =>  esc_html__( 'Text Align', 'ssc' ), 'selector' => 'article .entry-title'),
									array('property' => 'text-shadow', 'label' =>  esc_html__( 'Text Shadow', 'ssc' ), 'selector' => 'article .entry-title'),
									array('property' => 'text-transform', 'label' =>  esc_html__( 'Text Transform', 'ssc' ), 'selector' => 'article .entry-title'),
									array('property' => 'text-decoration', 'label' =>  esc_html__( 'Text Decoration', 'ssc' ), 'selector' => 'article .entry-title'),
									array('property' => 'line-height', 'label' =>  esc_html__( 'Line Height', 'ssc' ), 'selector' => 'article .entry-title'),
									array('property' => 'letter-spacing', 'label' =>  esc_html__( 'Letter Spacing', 'ssc' ), 'selector' => 'article .entry-title'),
									array('property' => 'overflow', 'label' =>  esc_html__( 'Overflow', 'ssc' ), 'selector' => 'article .entry-title'),
									array('property' => 'word-break', 'label' =>  esc_html__( 'Word Break', 'ssc' ), 'selector' => 'article .entry-title'),
									array('property' => 'width', 'label' => esc_html__( 'Width', 'ssc' ), 'selector' => 'article .entry-title'),
									array('property' => 'height', 'label' => esc_html__( 'Height', 'ssc' ), 'selector' => 'article .entry-title'),
									array('property' => 'box-shadow', 'label' => esc_html__( 'Box Shadow', 'ssc' ), 'selector' => 'article .entry-title'),
									array('property' => 'opacity', 'label' => esc_html__( 'Opacity', 'ssc' ), 'selector' => 'article .entry-title'),
									array('property' => 'margin', 'label' => esc_html__( 'Margin', 'ssc' ), 'selector' => 'article .entry-title'),
									array('property' => 'padding', 'label' => esc_html__( 'Padding', 'ssc' ), 'selector' => 'article .entry-title'),
									array('property' => 'border', 'label' => esc_html__( 'Border', 'ssc' ), 'selector' => 'article .entry-title'),
									array('property' => 'border-radius', 'label' => esc_html__( 'Border Radius', 'ssc' ), 'selector' => 'article .entry-title'),
								),
								'Entry Meta' => array(
									array('property' => 'display', 'label' => esc_html__( 'Display', 'ssc' ), 'selector' => 'article .entry-meta'),
									array('property' => 'float', 'label' => esc_html__( 'Float', 'ssc' ), 'selector' => 'article .entry-meta'),
									array('property' => 'background', 'selector' => 'article .entry-meta'),
									array('property' => 'color', 'label' =>  esc_html__( 'Color', 'ssc' ), 'selector' => 'article .entry-meta, article .entry-meta a, article .c_block .entry-meta i'),
									array('property' => 'font-size', 'label' =>  esc_html__( 'Font Size', 'ssc' ), 'selector' => 'article .entry-meta, article .entry-meta a, article .c_block .entry-meta i'),
									array('property' => 'font-weight', 'label' =>  esc_html__( 'Font Weight', 'ssc' ), 'selector' => 'article .entry-meta, article .entry-meta a, article .c_block .entry-meta i'),
									array('property' => 'font-style', 'label' =>  esc_html__( 'Font Style', 'ssc' ), 'selector' => 'article .entry-meta, article .entry-meta a, article .c_block .entry-meta i'),
									array('property' => 'font-family', 'label' =>  esc_html__( 'Font Family', 'ssc' ), 'selector' => 'article .entry-meta, article .entry-meta a, article .c_block .entry-meta i'),
									array('property' => 'text-align', 'label' =>  esc_html__( 'Text Align', 'ssc' ), 'selector' => 'article .entry-meta'),
									array('property' => 'text-shadow', 'label' =>  esc_html__( 'Text Shadow', 'ssc' ), 'selector' => 'article .entry-meta, article .entry-meta a, article .c_block .entry-meta i'),
									array('property' => 'text-transform', 'label' =>  esc_html__( 'Text Transform', 'ssc' ), 'selector' => 'article .entry-meta, article .entry-meta a, article .c_block .entry-meta i'),
									array('property' => 'text-decoration', 'label' =>  esc_html__( 'Text Decoration', 'ssc' ), 'selector' => 'article .entry-meta, article .entry-meta a, article .c_block .entry-meta i'),
									array('property' => 'line-height', 'label' =>  esc_html__( 'Line Height', 'ssc' ), 'selector' => 'article .entry-meta, article .entry-meta a, article .c_block .entry-meta i'),
									array('property' => 'letter-spacing', 'label' =>  esc_html__( 'Letter Spacing', 'ssc' ), 'selector' => 'article .entry-meta, article .entry-meta a, article .c_block .entry-meta i'),
									array('property' => 'overflow', 'label' =>  esc_html__( 'Overflow', 'ssc' ), 'selector' => 'article .entry-meta'),
									array('property' => 'word-break', 'label' =>  esc_html__( 'Word Break', 'ssc' ), 'selector' => 'article .entry-meta, article .entry-meta a, article .c_block .entry-meta i'),
									array('property' => 'width', 'label' => esc_html__( 'Width', 'ssc' ), 'selector' => 'article .entry-meta'),
									array('property' => 'height', 'label' => esc_html__( 'Height', 'ssc' ), 'selector' => 'article .entry-meta'),
									array('property' => 'box-shadow', 'label' => esc_html__( 'Box Shadow', 'ssc' ), 'selector' => 'article .entry-meta'),
									array('property' => 'opacity', 'label' => esc_html__( 'Opacity', 'ssc' ), 'selector' => 'article .entry-meta'),
									array('property' => 'margin', 'label' => esc_html__( 'Margin', 'ssc' ), 'selector' => 'article .entry-meta'),
									array('property' => 'padding', 'label' => esc_html__( 'Padding', 'ssc' ), 'selector' => 'article .entry-meta'),
									array('property' => 'border', 'label' => esc_html__( 'Border', 'ssc' ), 'selector' => 'article .entry-meta'),
									array('property' => 'border-radius', 'label' => esc_html__( 'Border Radius', 'ssc' ), 'selector' => 'article .entry-meta'),
								),
								'Author' => array(
									array('property' => 'display', 'label' => esc_html__( 'Display', 'ssc' ), 'selector' => 'article .author'),
									array('property' => 'float', 'label' => esc_html__( 'Float', 'ssc' ), 'selector' => 'article .author'),
									array('property' => 'background', 'selector' => 'article .author'),
									array('property' => 'color', 'label' =>  esc_html__( 'Color', 'ssc' ), 'selector' => 'article .author a'),
									array('property' => 'font-size', 'label' =>  esc_html__( 'Font Size', 'ssc' ), 'selector' => 'article .author'),
									array('property' => 'font-weight', 'label' =>  esc_html__( 'Font Weight', 'ssc' ), 'selector' => 'article .author'),
									array('property' => 'font-style', 'label' =>  esc_html__( 'Font Style', 'ssc' ), 'selector' => 'article .author'),
									array('property' => 'font-family', 'label' =>  esc_html__( 'Font Family', 'ssc' ), 'selector' => 'article .author'),
									array('property' => 'text-align', 'label' =>  esc_html__( 'Text Align', 'ssc' ), 'selector' => 'article .author'),
									array('property' => 'text-shadow', 'label' =>  esc_html__( 'Text Shadow', 'ssc' ), 'selector' => 'article .author'),
									array('property' => 'text-transform', 'label' =>  esc_html__( 'Text Transform', 'ssc' ), 'selector' => 'article .author'),
									array('property' => 'text-decoration', 'label' =>  esc_html__( 'Text Decoration', 'ssc' ), 'selector' => 'article .author'),
									array('property' => 'line-height', 'label' =>  esc_html__( 'Line Height', 'ssc' ), 'selector' => 'article .author'),
									array('property' => 'letter-spacing', 'label' =>  esc_html__( 'Letter Spacing', 'ssc' ), 'selector' => 'article .author'),
									array('property' => 'overflow', 'label' =>  esc_html__( 'Overflow', 'ssc' ), 'selector' => 'article .author'),
									array('property' => 'word-break', 'label' =>  esc_html__( 'Word Break', 'ssc' ), 'selector' => 'article .author'),
									array('property' => 'width', 'label' => esc_html__( 'Width', 'ssc' ), 'selector' => 'article .author'),
									array('property' => 'height', 'label' => esc_html__( 'Height', 'ssc' ), 'selector' => 'article .author'),
									array('property' => 'box-shadow', 'label' => esc_html__( 'Box Shadow', 'ssc' ), 'selector' => 'article .author'),
									array('property' => 'opacity', 'label' => esc_html__( 'Opacity', 'ssc' ), 'selector' => 'article .author'),
									array('property' => 'margin', 'label' => esc_html__( 'Margin', 'ssc' ), 'selector' => 'article .author'),
									array('property' => 'padding', 'label' => esc_html__( 'Padding', 'ssc' ), 'selector' => 'article .author'),
									array('property' => 'border', 'label' => esc_html__( 'Border', 'ssc' ), 'selector' => 'article .author'),
									array('property' => 'border-radius', 'label' => esc_html__( 'Border Radius', 'ssc' ), 'selector' => 'article .author'),
								),
								'Date' => array(
									array('property' => 'display', 'label' => esc_html__( 'Display', 'ssc' ), 'selector' => 'article .entry-meta .date, article .data'),
									array('property' => 'float', 'label' => esc_html__( 'Float', 'ssc' ), 'selector' => 'article .entry-meta .date, article .data'),
									array('property' => 'background', 'selector' => 'article .entry-meta .date, article .data'),
									array('property' => 'color', 'label' =>  esc_html__( 'Color', 'ssc' ), 'selector' => 'article .entry-meta .date, article .data'),
									array('property' => 'font-size', 'label' =>  esc_html__( 'Font Size', 'ssc' ), 'selector' => 'article .entry-meta .date, article .data'),
									array('property' => 'font-weight', 'label' =>  esc_html__( 'Font Weight', 'ssc' ), 'selector' => 'article .entry-meta .date, article .data'),
									array('property' => 'font-style', 'label' =>  esc_html__( 'Font Style', 'ssc' ), 'selector' => 'article .entry-meta .date, article .data'),
									array('property' => 'font-family', 'label' =>  esc_html__( 'Font Family', 'ssc' ), 'selector' => 'article .entry-meta .date, article .data'),
									array('property' => 'text-align', 'label' =>  esc_html__( 'Text Align', 'ssc' ), 'selector' => 'article .entry-meta .date, article .data'),
									array('property' => 'text-shadow', 'label' =>  esc_html__( 'Text Shadow', 'ssc' ), 'selector' => 'article .entry-meta .date, article .data'),
									array('property' => 'text-transform', 'label' =>  esc_html__( 'Text Transform', 'ssc' ), 'selector' => 'article .entry-meta .date, article .data'),
									array('property' => 'text-decoration', 'label' =>  esc_html__( 'Text Decoration', 'ssc' ), 'selector' => 'article .entry-meta .date, article .data'),
									array('property' => 'line-height', 'label' =>  esc_html__( 'Line Height', 'ssc' ), 'selector' => 'article .entry-meta .date, article .data'),
									array('property' => 'letter-spacing', 'label' =>  esc_html__( 'Letter Spacing', 'ssc' ), 'selector' => 'article .entry-meta .date, article .data'),
									array('property' => 'overflow', 'label' =>  esc_html__( 'Overflow', 'ssc' ), 'selector' => 'article .entry-meta .date, article .data'),
									array('property' => 'word-break', 'label' =>  esc_html__( 'Word Break', 'ssc' ), 'selector' => 'article .entry-meta .date, article .data'),
									array('property' => 'width', 'label' => esc_html__( 'Width', 'ssc' ), 'selector' => 'article .entry-meta .date, article .data'),
									array('property' => 'height', 'label' => esc_html__( 'Height', 'ssc' ), 'selector' => 'article .entry-meta .date, article .data'),
									array('property' => 'box-shadow', 'label' => esc_html__( 'Box Shadow', 'ssc' ), 'selector' => 'article .entry-meta .date, article .data'),
									array('property' => 'opacity', 'label' => esc_html__( 'Opacity', 'ssc' ), 'selector' => 'article .entry-meta .date, article .data'),
									array('property' => 'margin', 'label' => esc_html__( 'Margin', 'ssc' ), 'selector' => 'article .entry-meta .date, article .data'),
									array('property' => 'padding', 'label' => esc_html__( 'Padding', 'ssc' ), 'selector' => 'article .entry-meta .date, article .data'),
									array('property' => 'border', 'label' => esc_html__( 'Border', 'ssc' ), 'selector' => 'article .entry-meta .date, article .data'),
									array('property' => 'border-radius', 'label' => esc_html__( 'Border Radius', 'ssc' ), 'selector' => 'article .entry-meta .date, article .data'),
								),
								'Comments Link' => array(
									array('property' => 'display', 'label' => esc_html__( 'Display', 'ssc' ), 'selector' => 'article .comments-link'),
									array('property' => 'float', 'label' => esc_html__( 'Float', 'ssc' ), 'selector' => 'article .comments-link'),
									array('property' => 'background', 'selector' => 'article .comments-link'),
									array('property' => 'color', 'label' =>  esc_html__( 'Color', 'ssc' ), 'selector' => 'article .comments-link a'),
									array('property' => 'font-size', 'label' =>  esc_html__( 'Font Size', 'ssc' ), 'selector' => 'article .comments-link'),
									array('property' => 'font-weight', 'label' =>  esc_html__( 'Font Weight', 'ssc' ), 'selector' => 'article .comments-link'),
									array('property' => 'font-style', 'label' =>  esc_html__( 'Font Style', 'ssc' ), 'selector' => 'article .comments-link'),
									array('property' => 'font-family', 'label' =>  esc_html__( 'Font Family', 'ssc' ), 'selector' => 'article .comments-link'),
									array('property' => 'text-align', 'label' =>  esc_html__( 'Text Align', 'ssc' ), 'selector' => 'article .comments-link'),
									array('property' => 'text-shadow', 'label' =>  esc_html__( 'Text Shadow', 'ssc' ), 'selector' => 'article .comments-link'),
									array('property' => 'text-transform', 'label' =>  esc_html__( 'Text Transform', 'ssc' ), 'selector' => 'article .comments-link'),
									array('property' => 'text-decoration', 'label' =>  esc_html__( 'Text Decoration', 'ssc' ), 'selector' => 'article .comments-link'),
									array('property' => 'line-height', 'label' =>  esc_html__( 'Line Height', 'ssc' ), 'selector' => 'article .comments-link'),
									array('property' => 'letter-spacing', 'label' =>  esc_html__( 'Letter Spacing', 'ssc' ), 'selector' => 'article .comments-link'),
									array('property' => 'overflow', 'label' =>  esc_html__( 'Overflow', 'ssc' ), 'selector' => 'article .comments-link'),
									array('property' => 'word-break', 'label' =>  esc_html__( 'Word Break', 'ssc' ), 'selector' => 'article .comments-link'),
									array('property' => 'width', 'label' => esc_html__( 'Width', 'ssc' ), 'selector' => 'article .comments-link'),
									array('property' => 'height', 'label' => esc_html__( 'Height', 'ssc' ), 'selector' => 'article .comments-link'),
									array('property' => 'box-shadow', 'label' => esc_html__( 'Box Shadow', 'ssc' ), 'selector' => 'article .comments-link'),
									array('property' => 'opacity', 'label' => esc_html__( 'Opacity', 'ssc' ), 'selector' => 'article .comments-link'),
									array('property' => 'margin', 'label' => esc_html__( 'Margin', 'ssc' ), 'selector' => 'article .comments-link'),
									array('property' => 'padding', 'label' => esc_html__( 'Padding', 'ssc' ), 'selector' => 'article .comments-link'),
									array('property' => 'border', 'label' => esc_html__( 'Border', 'ssc' ), 'selector' => 'article .comments-link'),
									array('property' => 'border-radius', 'label' => esc_html__( 'Border Radius', 'ssc' ), 'selector' => 'article .comments-link'),
								),
								'Entry Content' => array(
									array('property' => 'display', 'label' => esc_html__( 'Display', 'ssc' ), 'selector' => 'article .c_block .entry-content'),
									array('property' => 'float', 'label' => esc_html__( 'Float', 'ssc' ), 'selector' => 'article .c_block .entry-content'),
									array('property' => 'background', 'selector' => 'article .c_block .entry-content'),
									array('property' => 'color', 'label' =>  esc_html__( 'Color', 'ssc' ), 'selector' => 'article .c_block .entry-content'),
									array('property' => 'font-size', 'label' =>  esc_html__( 'Font Size', 'ssc' ), 'selector' => 'article .c_block .entry-content'),
									array('property' => 'font-weight', 'label' =>  esc_html__( 'Font Weight', 'ssc' ), 'selector' => 'article .c_block .entry-content'),
									array('property' => 'font-style', 'label' =>  esc_html__( 'Font Style', 'ssc' ), 'selector' => 'article .c_block .entry-content'),
									array('property' => 'font-family', 'label' =>  esc_html__( 'Font Family', 'ssc' ), 'selector' => 'article .c_block .entry-content'),
									array('property' => 'text-align', 'label' =>  esc_html__( 'Text Align', 'ssc' ), 'selector' => 'article .c_block .entry-content'),
									array('property' => 'text-shadow', 'label' =>  esc_html__( 'Text Shadow', 'ssc' ), 'selector' => 'article .c_block .entry-content'),
									array('property' => 'text-transform', 'label' =>  esc_html__( 'Text Transform', 'ssc' ), 'selector' => 'article .c_block .entry-content'),
									array('property' => 'text-decoration', 'label' =>  esc_html__( 'Text Decoration', 'ssc' ), 'selector' => 'article .c_block .entry-content'),
									array('property' => 'line-height', 'label' =>  esc_html__( 'Line Height', 'ssc' ), 'selector' => 'article .c_block .entry-content'),
									array('property' => 'letter-spacing', 'label' =>  esc_html__( 'Letter Spacing', 'ssc' ), 'selector' => 'article .c_block .entry-content'),
									array('property' => 'overflow', 'label' =>  esc_html__( 'Overflow', 'ssc' ), 'selector' => 'article .c_block .entry-content'),
									array('property' => 'word-break', 'label' =>  esc_html__( 'Word Break', 'ssc' ), 'selector' => 'article .c_block .entry-content'),
									array('property' => 'width', 'label' => esc_html__( 'Width', 'ssc' ), 'selector' => 'article .c_block .entry-content'),
									array('property' => 'height', 'label' => esc_html__( 'Height', 'ssc' ), 'selector' => 'article .c_block .entry-content'),
									array('property' => 'box-shadow', 'label' => esc_html__( 'Box Shadow', 'ssc' ), 'selector' => 'article .c_block .entry-content'),
									array('property' => 'opacity', 'label' => esc_html__( 'Opacity', 'ssc' ), 'selector' => 'article .c_block .entry-content'),
									array('property' => 'margin', 'label' => esc_html__( 'Margin', 'ssc' ), 'selector' => 'article .c_block .entry-content'),
									array('property' => 'padding', 'label' => esc_html__( 'Padding', 'ssc' ), 'selector' => 'article .c_block .entry-content'),
									array('property' => 'border', 'label' => esc_html__( 'Border', 'ssc' ), 'selector' => 'article .c_block .entry-content'),
									array('property' => 'border-radius', 'label' => esc_html__( 'Border Radius', 'ssc' ), 'selector' => 'article .c_block .entry-content'),
								),
								'More Link' => array(
									array('property' => 'display', 'label' => esc_html__( 'Display', 'ssc' ), 'selector' => 'article .c_block .entry-content .more'),
									array('property' => 'float', 'label' => esc_html__( 'Float', 'ssc' ), 'selector' => 'article .c_block .entry-content .more'),
									array('property' => 'background', 'selector' => 'article .c_block .entry-content .more'),
									array('property' => 'color', 'label' =>  esc_html__( 'Color', 'ssc' ), 'selector' => 'article .c_block .entry-content .more'),
									array('property' => 'font-size', 'label' =>  esc_html__( 'Font Size', 'ssc' ), 'selector' => 'article .c_block .entry-content .more'),
									array('property' => 'font-weight', 'label' =>  esc_html__( 'Font Weight', 'ssc' ), 'selector' => 'article .c_block .entry-content .more'),
									array('property' => 'font-style', 'label' =>  esc_html__( 'Font Style', 'ssc' ), 'selector' => 'article .c_block .entry-content .more'),
									array('property' => 'font-family', 'label' =>  esc_html__( 'Font Family', 'ssc' ), 'selector' => 'article .c_block .entry-content .more'),
									array('property' => 'text-align', 'label' =>  esc_html__( 'Text Align', 'ssc' ), 'selector' => 'article .c_block .entry-content .more'),
									array('property' => 'text-shadow', 'label' =>  esc_html__( 'Text Shadow', 'ssc' ), 'selector' => 'article .c_block .entry-content .more'),
									array('property' => 'text-transform', 'label' =>  esc_html__( 'Text Transform', 'ssc' ), 'selector' => 'article .c_block .entry-content .more'),
									array('property' => 'text-decoration', 'label' =>  esc_html__( 'Text Decoration', 'ssc' ), 'selector' => 'article .c_block .entry-content .more'),
									array('property' => 'line-height', 'label' =>  esc_html__( 'Line Height', 'ssc' ), 'selector' => 'article .c_block .entry-content .more'),
									array('property' => 'letter-spacing', 'label' =>  esc_html__( 'Letter Spacing', 'ssc' ), 'selector' => 'article .c_block .entry-content .more'),
									array('property' => 'overflow', 'label' =>  esc_html__( 'Overflow', 'ssc' ), 'selector' => 'article .c_block .entry-content .more'),
									array('property' => 'word-break', 'label' =>  esc_html__( 'Word Break', 'ssc' ), 'selector' => 'article .c_block .entry-content .more'),
									array('property' => 'width', 'label' => esc_html__( 'Width', 'ssc' ), 'selector' => 'article .c_block .entry-content .more'),
									array('property' => 'height', 'label' => esc_html__( 'Height', 'ssc' ), 'selector' => 'article .c_block .entry-content .more'),
									array('property' => 'box-shadow', 'label' => esc_html__( 'Box Shadow', 'ssc' ), 'selector' => 'article .c_block .entry-content .more'),
									array('property' => 'opacity', 'label' => esc_html__( 'Opacity', 'ssc' ), 'selector' => 'article .c_block .entry-content .more'),
									array('property' => 'margin', 'label' => esc_html__( 'Margin', 'ssc' ), 'selector' => 'article .c_block .entry-content .more'),
									array('property' => 'padding', 'label' => esc_html__( 'Padding', 'ssc' ), 'selector' => 'article .c_block .entry-content .more'),
									array('property' => 'border', 'label' => esc_html__( 'Border', 'ssc' ), 'selector' => 'article .c_block .entry-content .more'),
									array('property' => 'border-radius', 'label' => esc_html__( 'Border Radius', 'ssc' ), 'selector' => 'article .c_block .entry-content .more'),
								),
								// Pagination
								'Pagination Box' => array(
									array('property' => 'background', 'selector' => '.ssc-blog-feed-pagination'),
									array('property' => 'overflow', 'label' => esc_html__( 'Overflow', 'ssc' ), 'selector' => '.ssc-blog-feed-pagination'),
									array('property' => 'margin', 'label' => esc_html__( 'Margin', 'ssc' ), 'selector' => '.ssc-blog-feed-pagination'),
									array('property' => 'padding', 'label' => esc_html__( 'Padding', 'ssc' ), 'selector' => '.ssc-blog-feed-pagination'),
									array('property' => 'border', 'label' => esc_html__( 'Border', 'ssc' ), 'selector' => '.ssc-blog-feed-pagination'),
									array('property' => 'border-radius', 'label' => esc_html__( 'Border Radius', 'ssc' ), 'selector' => '.ssc-blog-feed-pagination')
								),
								'Pagination' => array(
									array('property' => 'background', 'selector' => '.page-numbers li a, .page-numbers li span'),
									array('property' => 'color', 'label' => esc_html__( 'Color', 'ssc' ), 'selector' => '.page-numbers li a, .page-numbers li span'),
									array('property' => 'font-size', 'label' => esc_html__( 'Font Size', 'ssc' ), 'selector' => '.page-numbers li a, .page-numbers li span'),
									array('property' => 'line-height', 'label' => esc_html__( 'Line Height', 'ssc' ), 'selector' => '.page-numbers li a, .page-numbers li span'),
									array('property' => 'font-weight', 'label' => esc_html__( 'Font Weight', 'ssc' ), 'selector' => '.page-numbers li a, .page-numbers li span'),
									array('property' => 'font-style', 'label' => esc_html__( 'Font Style', 'ssc' ), 'selector' => '.page-numbers li a, .page-numbers li span'),
									array('property' => 'font-family', 'label' => esc_html__( 'Font Family', 'ssc' ), 'selector' => '.page-numbers li a, .page-numbers li span'),
									array('property' => 'text-align', 'label' => esc_html__( 'Text Align', 'ssc' ), 'selector' => '.page-numbers li a, .page-numbers li span'),
									array('property' => 'text-shadow', 'label' => esc_html__( 'Text Shadow', 'ssc' ), 'selector' => '.page-numbers li a, .page-numbers li span'),
									array('property' => 'box-shadow', 'label' => esc_html__( 'Box Shadow', 'ssc' ), 'selector' => '.page-numbers li a, .page-numbers li span'),
									array('property' => 'text-transform', 'label' => esc_html__( 'Text Transform', 'ssc' ), 'selector' => '.page-numbers li a, .page-numbers li span'),
									array('property' => 'text-decoration', 'label' => esc_html__( 'Text Decoration', 'ssc' ), 'selector' => '.page-numbers li a, .page-numbers li span'),
									array('property' => 'letter-spacing', 'label' => esc_html__( 'Letter Spacing', 'ssc' ), 'selector' => '.page-numbers li a, .page-numbers li span'),
									array('property' => 'overflow', 'label' => esc_html__( 'Overflow', 'ssc' ), 'selector' => '.page-numbers li a, .page-numbers li span'),
									array('property' => 'word-break', 'label' => esc_html__( 'Word Break', 'ssc' ), 'selector' => '.page-numbers li a, .page-numbers li span'),
									array('property' => 'margin', 'label' => esc_html__( 'Margin', 'ssc' ), 'selector' => '.page-numbers li a, .page-numbers li span'),
									array('property' => 'padding', 'label' => esc_html__( 'Padding', 'ssc' ), 'selector' => '.page-numbers li a, .page-numbers li span'),
									array('property' => 'border', 'label' => esc_html__( 'Border', 'ssc' ), 'selector' => '.page-numbers li a, .page-numbers li span'),
									array('property' => 'border-radius', 'label' => esc_html__( 'Border Radius', 'ssc' ), 'selector' => '.page-numbers li a, .page-numbers li span')
								),
//								'Empty styles' => array(
//									array('property' => 'display', 'label' => esc_html__( 'Display', 'ssc' ), 'selector' => ''),
//									array('property' => 'float', 'label' => esc_html__( 'Float', 'ssc' ), 'selector' => ''),
//									array('property' => 'background', 'selector' => ''),
//									array('property' => 'color', 'label' =>  esc_html__( 'Color', 'ssc' ), 'selector' => ''),
//									array('property' => 'font-size', 'label' =>  esc_html__( 'Font Size', 'ssc' ), 'selector' => ''),
//									array('property' => 'font-weight', 'label' =>  esc_html__( 'Font Weight', 'ssc' ), 'selector' => ''),
//									array('property' => 'font-style', 'label' =>  esc_html__( 'Font Style', 'ssc' ), 'selector' => ''),
//									array('property' => 'font-family', 'label' =>  esc_html__( 'Font Family', 'ssc' ), 'selector' => ''),
//									array('property' => 'text-align', 'label' =>  esc_html__( 'Text Align', 'ssc' ), 'selector' => ''),
//									array('property' => 'text-shadow', 'label' =>  esc_html__( 'Text Shadow', 'ssc' ), 'selector' => ''),
//									array('property' => 'text-transform', 'label' =>  esc_html__( 'Text Transform', 'ssc' ), 'selector' => ''),
//									array('property' => 'text-decoration', 'label' =>  esc_html__( 'Text Decoration', 'ssc' ), 'selector' => ''),
//									array('property' => 'line-height', 'label' =>  esc_html__( 'Line Height', 'ssc' ), 'selector' => ''),
//									array('property' => 'letter-spacing', 'label' =>  esc_html__( 'Letter Spacing', 'ssc' ), 'selector' => ''),
//									array('property' => 'overflow', 'label' =>  esc_html__( 'Overflow', 'ssc' ), 'selector' => ''),
//									array('property' => 'word-break', 'label' =>  esc_html__( 'Word Break', 'ssc' ), 'selector' => ''),
//									array('property' => 'width', 'label' => esc_html__( 'Width', 'ssc' ), 'selector' => ''),
//									array('property' => 'height', 'label' => esc_html__( 'Height', 'ssc' ), 'selector' => ''),
//									array('property' => 'box-shadow', 'label' => esc_html__( 'Box Shadow', 'ssc' ), 'selector' => ''),
//									array('property' => 'opacity', 'label' => esc_html__( 'Opacity', 'ssc' ), 'selector' => ''),
//									array('property' => 'margin', 'label' => esc_html__( 'Margin', 'ssc' ), 'selector' => ''),
//									array('property' => 'padding', 'label' => esc_html__( 'Padding', 'ssc' ), 'selector' => ''),
//									array('property' => 'border', 'label' => esc_html__( 'Border', 'ssc' ), 'selector' => ''),
//									array('property' => 'border-radius', 'label' => esc_html__( 'Border Radius', 'ssc' ), 'selector' => ''),
//								),
							),
						),
					),
				),
				esc_html__( 'hover', 'ssc' )   => array(
					array(
						'name'        => 'hover-css',
						'label'       => esc_html__( 'Hover', 'ssc' ),
						'type'        => 'css',
						'value'       => '',
						// remove this if you do not need a default content
						'description' => 'Styles for Hover Condition',
						'options'     => array(
							array(
								'screens'        => "any,999,768,667,479",
								'Box' => array(
									array('property' => 'display', 'label' => esc_html__( 'Display', 'ssc' ), 'selector' => ':hover'),
									array('property' => 'float', 'label' => esc_html__( 'Float', 'ssc' ), 'selector' => ':hover'),
									array('property' => 'background', 'selector' => ':hover'),
									array('property' => 'box-shadow', 'label' => esc_html__( 'Box Shadow', 'ssc' ), 'selector' => ':hover'),
									array('property' => 'opacity', 'label' => esc_html__( 'Opacity', 'ssc' ), 'selector' => ':hover'),
									array('property' => 'margin', 'label' => esc_html__( 'Margin', 'ssc' ), 'selector' => ':hover'),
									array('property' => 'padding', 'label' => esc_html__( 'Padding', 'ssc' ), 'selector' => ':hover'),
									array('property' => 'border', 'label' => esc_html__( 'Border', 'ssc' ), 'selector' => ':hover'),
									array('property' => 'border-radius', 'label' => esc_html__( 'Border Radius', 'ssc' ), 'selector' => ':hover'),
								),
								'Article' => array(
									array('property' => 'display', 'label' => esc_html__( 'Display', 'ssc' ), 'selector' => 'article:hover'),
									array('property' => 'float', 'label' => esc_html__( 'Float', 'ssc' ), 'selector' => 'article:hover'),
									array('property' => 'background', 'selector' => 'article:hover'),
									array('property' => 'color', 'label' =>  esc_html__( 'Color', 'ssc' ), 'selector' => 'article:hover'),
									array('property' => 'font-size', 'label' =>  esc_html__( 'Font Size', 'ssc' ), 'selector' => 'article:hover'),
									array('property' => 'font-weight', 'label' =>  esc_html__( 'Font Weight', 'ssc' ), 'selector' => 'article:hover'),
									array('property' => 'font-style', 'label' =>  esc_html__( 'Font Style', 'ssc' ), 'selector' => 'article:hover'),
									array('property' => 'font-family', 'label' =>  esc_html__( 'Font Family', 'ssc' ), 'selector' => 'article:hover'),
									array('property' => 'text-align', 'label' =>  esc_html__( 'Text Align', 'ssc' ), 'selector' => 'article:hover'),
									array('property' => 'text-shadow', 'label' =>  esc_html__( 'Text Shadow', 'ssc' ), 'selector' => 'article:hover'),
									array('property' => 'text-transform', 'label' =>  esc_html__( 'Text Transform', 'ssc' ), 'selector' => 'article:hover'),
									array('property' => 'text-decoration', 'label' =>  esc_html__( 'Text Decoration', 'ssc' ), 'selector' => 'article:hover'),
									array('property' => 'line-height', 'label' =>  esc_html__( 'Line Height', 'ssc' ), 'selector' => 'article:hover'),
									array('property' => 'letter-spacing', 'label' =>  esc_html__( 'Letter Spacing', 'ssc' ), 'selector' => 'article:hover'),
									array('property' => 'overflow', 'label' =>  esc_html__( 'Overflow', 'ssc' ), 'selector' => 'article:hover'),
									array('property' => 'word-break', 'label' =>  esc_html__( 'Word Break', 'ssc' ), 'selector' => 'article:hover'),
									array('property' => 'width', 'label' => esc_html__( 'Width', 'ssc' ), 'selector' => 'article:hover'),
									array('property' => 'height', 'label' => esc_html__( 'Height', 'ssc' ), 'selector' => 'article:hover'),
									array('property' => 'box-shadow', 'label' => esc_html__( 'Box Shadow', 'ssc' ), 'selector' => 'article:hover'),
									array('property' => 'opacity', 'label' => esc_html__( 'Opacity', 'ssc' ), 'selector' => 'article:hover'),
									array('property' => 'margin', 'label' => esc_html__( 'Margin', 'ssc' ), 'selector' => 'article:hover'),
									array('property' => 'padding', 'label' => esc_html__( 'Padding', 'ssc' ), 'selector' => 'article:hover'),
									array('property' => 'border', 'label' => esc_html__( 'Border', 'ssc' ), 'selector' => 'article:hover'),
									array('property' => 'border-radius', 'label' => esc_html__( 'Border Radius', 'ssc' ), 'selector' => 'article:hover'),
								),
								'Thumbnail Block' => array(
									array('property' => 'display', 'label' => esc_html__( 'Display', 'ssc' ), 'selector' => 'article:hover .thumb'),
									array('property' => 'float', 'label' => esc_html__( 'Float', 'ssc' ), 'selector' => 'article:hover .thumb'),
									array('property' => 'background', 'selector' => 'article:hover .thumb'),
									array('property' => 'color', 'label' =>  esc_html__( 'Color', 'ssc' ), 'selector' => 'article:hover .thumb'),
									array('property' => 'font-size', 'label' =>  esc_html__( 'Font Size', 'ssc' ), 'selector' => 'article:hover .thumb'),
									array('property' => 'font-weight', 'label' =>  esc_html__( 'Font Weight', 'ssc' ), 'selector' => 'article:hover .thumb'),
									array('property' => 'line-height', 'label' =>  esc_html__( 'Line Height', 'ssc' ), 'selector' => 'article:hover .thumb'),
									array('property' => 'overflow', 'label' =>  esc_html__( 'Overflow', 'ssc' ), 'selector' => 'article:hover .thumb'),
									array('property' => 'width', 'label' => esc_html__( 'Width', 'ssc' ), 'selector' => 'article:hover .thumb'),
									array('property' => 'height', 'label' => esc_html__( 'Height', 'ssc' ), 'selector' => 'article:hover .thumb'),
									array('property' => 'box-shadow', 'label' => esc_html__( 'Box Shadow', 'ssc' ), 'selector' => 'article:hover .thumb'),
									array('property' => 'opacity', 'label' => esc_html__( 'Opacity', 'ssc' ), 'selector' => 'article:hover .thumb'),
									array('property' => 'margin', 'label' => esc_html__( 'Margin', 'ssc' ), 'selector' => 'article:hover .thumb'),
									array('property' => 'padding', 'label' => esc_html__( 'Padding', 'ssc' ), 'selector' => 'article:hover .thumb'),
									array('property' => 'border', 'label' => esc_html__( 'Border', 'ssc' ), 'selector' => 'article:hover .thumb'),
									array('property' => 'border-radius', 'label' => esc_html__( 'Border Radius', 'ssc' ), 'selector' => 'article:hover .thumb'),
								),
								'Thumbnail' => array(
									array('property' => 'display', 'label' => esc_html__( 'Display', 'ssc' ), 'selector' => 'article:hover .thumb img'),
									array('property' => 'float', 'label' => esc_html__( 'Float', 'ssc' ), 'selector' => 'article:hover .thumb img'),
									array('property' => 'width', 'label' => esc_html__( 'Width', 'ssc' ), 'selector' => 'article:hover .thumb img'),
									array('property' => 'height', 'label' => esc_html__( 'Height', 'ssc' ), 'selector' => 'article:hover .thumb img'),
									array('property' => 'box-shadow', 'label' => esc_html__( 'Box Shadow', 'ssc' ), 'selector' => 'article:hover .thumb img'),
									array('property' => 'opacity', 'label' => esc_html__( 'Opacity', 'ssc' ), 'selector' => 'article:hover .thumb img'),
									array('property' => 'margin', 'label' => esc_html__( 'Margin', 'ssc' ), 'selector' => 'article:hover .thumb img'),
									array('property' => 'padding', 'label' => esc_html__( 'Padding', 'ssc' ), 'selector' => 'article:hover .thumb img'),
									array('property' => 'border', 'label' => esc_html__( 'Border', 'ssc' ), 'selector' => 'article:hover .thumb img'),
									array('property' => 'border-radius', 'label' => esc_html__( 'Border Radius', 'ssc' ), 'selector' => 'article:hover .thumb img'),
								),
								'Content Block' => array(
									array('property' => 'display', 'label' => esc_html__( 'Display', 'ssc' ), 'selector' => 'article:hover .c_block'),
									array('property' => 'float', 'label' => esc_html__( 'Float', 'ssc' ), 'selector' => 'article:hover .c_block'),
									array('property' => 'background', 'selector' => 'article:hover .c_block'),
									array('property' => 'color', 'label' =>  esc_html__( 'Color', 'ssc' ), 'selector' => 'article:hover .c_block'),
									array('property' => 'font-size', 'label' =>  esc_html__( 'Font Size', 'ssc' ), 'selector' => 'article:hover .c_block'),
									array('property' => 'font-weight', 'label' =>  esc_html__( 'Font Weight', 'ssc' ), 'selector' => 'article:hover .c_block'),
									array('property' => 'font-style', 'label' =>  esc_html__( 'Font Style', 'ssc' ), 'selector' => 'article:hover .c_block'),
									array('property' => 'font-family', 'label' =>  esc_html__( 'Font Family', 'ssc' ), 'selector' => 'article:hover .c_block'),
									array('property' => 'text-align', 'label' =>  esc_html__( 'Text Align', 'ssc' ), 'selector' => 'article:hover .c_block'),
									array('property' => 'text-shadow', 'label' =>  esc_html__( 'Text Shadow', 'ssc' ), 'selector' => 'article:hover .c_block'),
									array('property' => 'text-transform', 'label' =>  esc_html__( 'Text Transform', 'ssc' ), 'selector' => 'article:hover .c_block'),
									array('property' => 'text-decoration', 'label' =>  esc_html__( 'Text Decoration', 'ssc' ), 'selector' => 'article:hover .c_block'),
									array('property' => 'line-height', 'label' =>  esc_html__( 'Line Height', 'ssc' ), 'selector' => 'article:hover .c_block'),
									array('property' => 'letter-spacing', 'label' =>  esc_html__( 'Letter Spacing', 'ssc' ), 'selector' => 'article:hover .c_block'),
									array('property' => 'overflow', 'label' =>  esc_html__( 'Overflow', 'ssc' ), 'selector' => 'article:hover .c_block'),
									array('property' => 'word-break', 'label' =>  esc_html__( 'Word Break', 'ssc' ), 'selector' => 'article:hover .c_block'),
									array('property' => 'width', 'label' => esc_html__( 'Width', 'ssc' ), 'selector' => 'article:hover .c_block'),
									array('property' => 'height', 'label' => esc_html__( 'Height', 'ssc' ), 'selector' => 'article:hover .c_block'),
									array('property' => 'box-shadow', 'label' => esc_html__( 'Box Shadow', 'ssc' ), 'selector' => 'article:hover .c_block'),
									array('property' => 'opacity', 'label' => esc_html__( 'Opacity', 'ssc' ), 'selector' => 'article:hover .c_block'),
									array('property' => 'margin', 'label' => esc_html__( 'Margin', 'ssc' ), 'selector' => 'article:hover .c_block'),
									array('property' => 'padding', 'label' => esc_html__( 'Padding', 'ssc' ), 'selector' => 'article:hover .c_block'),
									array('property' => 'border', 'label' => esc_html__( 'Border', 'ssc' ), 'selector' => 'article:hover .c_block'),
									array('property' => 'border-radius', 'label' => esc_html__( 'Border Radius', 'ssc' ), 'selector' => 'article:hover .c_block'),
								),
								'Entry Header' => array(
									array('property' => 'display', 'label' => esc_html__( 'Display', 'ssc' ), 'selector' => 'article:hover .entry-header'),
									array('property' => 'float', 'label' => esc_html__( 'Float', 'ssc' ), 'selector' => 'article:hover .entry-header'),
									array('property' => 'background', 'selector' => 'article:hover .entry-header'),
									array('property' => 'color', 'label' =>  esc_html__( 'Color', 'ssc' ), 'selector' => 'article:hover .entry-header'),
									array('property' => 'font-size', 'label' =>  esc_html__( 'Font Size', 'ssc' ), 'selector' => 'article:hover .entry-header'),
									array('property' => 'font-weight', 'label' =>  esc_html__( 'Font Weight', 'ssc' ), 'selector' => 'article:hover .entry-header'),
									array('property' => 'font-style', 'label' =>  esc_html__( 'Font Style', 'ssc' ), 'selector' => 'article:hover .entry-header'),
									array('property' => 'font-family', 'label' =>  esc_html__( 'Font Family', 'ssc' ), 'selector' => 'article:hover .entry-header'),
									array('property' => 'text-align', 'label' =>  esc_html__( 'Text Align', 'ssc' ), 'selector' => 'article:hover .entry-header'),
									array('property' => 'text-shadow', 'label' =>  esc_html__( 'Text Shadow', 'ssc' ), 'selector' => 'article:hover .entry-header'),
									array('property' => 'text-transform', 'label' =>  esc_html__( 'Text Transform', 'ssc' ), 'selector' => 'article:hover .entry-header'),
									array('property' => 'text-decoration', 'label' =>  esc_html__( 'Text Decoration', 'ssc' ), 'selector' => 'article:hover .entry-header'),
									array('property' => 'line-height', 'label' =>  esc_html__( 'Line Height', 'ssc' ), 'selector' => 'article:hover .entry-header'),
									array('property' => 'letter-spacing', 'label' =>  esc_html__( 'Letter Spacing', 'ssc' ), 'selector' => 'article:hover .entry-header'),
									array('property' => 'overflow', 'label' =>  esc_html__( 'Overflow', 'ssc' ), 'selector' => 'article:hover .entry-header'),
									array('property' => 'word-break', 'label' =>  esc_html__( 'Word Break', 'ssc' ), 'selector' => 'article:hover .entry-header'),
									array('property' => 'width', 'label' => esc_html__( 'Width', 'ssc' ), 'selector' => 'article:hover .entry-header'),
									array('property' => 'height', 'label' => esc_html__( 'Height', 'ssc' ), 'selector' => 'article:hover .entry-header'),
									array('property' => 'box-shadow', 'label' => esc_html__( 'Box Shadow', 'ssc' ), 'selector' => 'article:hover .entry-header'),
									array('property' => 'opacity', 'label' => esc_html__( 'Opacity', 'ssc' ), 'selector' => 'article:hover .entry-header'),
									array('property' => 'margin', 'label' => esc_html__( 'Margin', 'ssc' ), 'selector' => 'article:hover .entry-header'),
									array('property' => 'padding', 'label' => esc_html__( 'Padding', 'ssc' ), 'selector' => 'article:hover .entry-header'),
									array('property' => 'border', 'label' => esc_html__( 'Border', 'ssc' ), 'selector' => 'article:hover .entry-header'),
									array('property' => 'border-radius', 'label' => esc_html__( 'Border Radius', 'ssc' ), 'selector' => 'article:hover .entry-header'),
								),
								'Entry Title' => array(
									array('property' => 'display', 'label' => esc_html__( 'Display', 'ssc' ), 'selector' => 'article:hover .entry-title'),
									array('property' => 'float', 'label' => esc_html__( 'Float', 'ssc' ), 'selector' => 'article:hover .entry-title'),
									array('property' => 'background', 'selector' => 'article:hover .entry-title'),
									array('property' => 'color', 'label' =>  esc_html__( 'Color', 'ssc' ), 'selector' => 'article:hover .entry-title a'),
									array('property' => 'font-size', 'label' =>  esc_html__( 'Font Size', 'ssc' ), 'selector' => 'article:hover .entry-title'),
									array('property' => 'font-weight', 'label' =>  esc_html__( 'Font Weight', 'ssc' ), 'selector' => 'article:hover .entry-title'),
									array('property' => 'font-style', 'label' =>  esc_html__( 'Font Style', 'ssc' ), 'selector' => 'article:hover .entry-title'),
									array('property' => 'font-family', 'label' =>  esc_html__( 'Font Family', 'ssc' ), 'selector' => 'article:hover .entry-title'),
									array('property' => 'text-align', 'label' =>  esc_html__( 'Text Align', 'ssc' ), 'selector' => 'article:hover .entry-title'),
									array('property' => 'text-shadow', 'label' =>  esc_html__( 'Text Shadow', 'ssc' ), 'selector' => 'article:hover .entry-title'),
									array('property' => 'text-transform', 'label' =>  esc_html__( 'Text Transform', 'ssc' ), 'selector' => 'article:hover .entry-title'),
									array('property' => 'text-decoration', 'label' =>  esc_html__( 'Text Decoration', 'ssc' ), 'selector' => 'article:hover .entry-title'),
									array('property' => 'line-height', 'label' =>  esc_html__( 'Line Height', 'ssc' ), 'selector' => 'article:hover .entry-title'),
									array('property' => 'letter-spacing', 'label' =>  esc_html__( 'Letter Spacing', 'ssc' ), 'selector' => 'article:hover .entry-title'),
									array('property' => 'overflow', 'label' =>  esc_html__( 'Overflow', 'ssc' ), 'selector' => 'article:hover .entry-title'),
									array('property' => 'word-break', 'label' =>  esc_html__( 'Word Break', 'ssc' ), 'selector' => 'article:hover .entry-title'),
									array('property' => 'width', 'label' => esc_html__( 'Width', 'ssc' ), 'selector' => 'article:hover .entry-title'),
									array('property' => 'height', 'label' => esc_html__( 'Height', 'ssc' ), 'selector' => 'article:hover .entry-title'),
									array('property' => 'box-shadow', 'label' => esc_html__( 'Box Shadow', 'ssc' ), 'selector' => 'article:hover .entry-title'),
									array('property' => 'opacity', 'label' => esc_html__( 'Opacity', 'ssc' ), 'selector' => 'article:hover .entry-title'),
									array('property' => 'margin', 'label' => esc_html__( 'Margin', 'ssc' ), 'selector' => 'article:hover .entry-title'),
									array('property' => 'padding', 'label' => esc_html__( 'Padding', 'ssc' ), 'selector' => 'article:hover .entry-title'),
									array('property' => 'border', 'label' => esc_html__( 'Border', 'ssc' ), 'selector' => 'article:hover .entry-title'),
									array('property' => 'border-radius', 'label' => esc_html__( 'Border Radius', 'ssc' ), 'selector' => 'article:hover .entry-title'),
								),
								'Entry Meta' => array(
									array('property' => 'display', 'label' => esc_html__( 'Display', 'ssc' ), 'selector' => 'article:hover .entry-meta'),
									array('property' => 'float', 'label' => esc_html__( 'Float', 'ssc' ), 'selector' => 'article:hover .entry-meta'),
									array('property' => 'background', 'selector' => 'article:hover .entry-meta'),
									array('property' => 'color', 'label' =>  esc_html__( 'Color', 'ssc' ), 'selector' => 'article:hover .entry-meta, article:hover .entry-meta a, article:hover .c_block .entry-meta i'),
									array('property' => 'font-size', 'label' =>  esc_html__( 'Font Size', 'ssc' ), 'selector' => 'article:hover .entry-meta, article:hover .entry-meta a, article:hover .c_block .entry-meta i'),
									array('property' => 'font-weight', 'label' =>  esc_html__( 'Font Weight', 'ssc' ), 'selector' => 'article:hover .entry-meta, article:hover .entry-meta a, article:hover .c_block .entry-meta i'),
									array('property' => 'font-style', 'label' =>  esc_html__( 'Font Style', 'ssc' ), 'selector' => 'article:hover .entry-meta, article:hover .entry-meta a, article:hover .c_block .entry-meta i'),
									array('property' => 'font-family', 'label' =>  esc_html__( 'Font Family', 'ssc' ), 'selector' => 'article:hover .entry-meta, article:hover .entry-meta a, article:hover .c_block .entry-meta i'),
									array('property' => 'text-align', 'label' =>  esc_html__( 'Text Align', 'ssc' ), 'selector' => 'article:hover .entry-meta'),
									array('property' => 'text-shadow', 'label' =>  esc_html__( 'Text Shadow', 'ssc' ), 'selector' => 'article:hover .entry-meta, article:hover .entry-meta a, article:hover .c_block .entry-meta i'),
									array('property' => 'text-transform', 'label' =>  esc_html__( 'Text Transform', 'ssc' ), 'selector' => 'article:hover .entry-meta, article:hover .entry-meta a, article:hover .c_block .entry-meta i'),
									array('property' => 'text-decoration', 'label' =>  esc_html__( 'Text Decoration', 'ssc' ), 'selector' => 'article:hover .entry-meta, article:hover .entry-meta a, article:hover .c_block .entry-meta i'),
									array('property' => 'line-height', 'label' =>  esc_html__( 'Line Height', 'ssc' ), 'selector' => 'article:hover .entry-meta, article:hover .entry-meta a, article:hover .c_block .entry-meta i'),
									array('property' => 'letter-spacing', 'label' =>  esc_html__( 'Letter Spacing', 'ssc' ), 'selector' => 'article:hover .entry-meta, article:hover .entry-meta a, article:hover .c_block .entry-meta i'),
									array('property' => 'overflow', 'label' =>  esc_html__( 'Overflow', 'ssc' ), 'selector' => 'article:hover .entry-meta'),
									array('property' => 'word-break', 'label' =>  esc_html__( 'Word Break', 'ssc' ), 'selector' => 'article:hover .entry-meta, article:hover .entry-meta a, article:hover .c_block .entry-meta i'),
									array('property' => 'width', 'label' => esc_html__( 'Width', 'ssc' ), 'selector' => 'article:hover .entry-meta'),
									array('property' => 'height', 'label' => esc_html__( 'Height', 'ssc' ), 'selector' => 'article:hover .entry-meta'),
									array('property' => 'box-shadow', 'label' => esc_html__( 'Box Shadow', 'ssc' ), 'selector' => 'article:hover .entry-meta'),
									array('property' => 'opacity', 'label' => esc_html__( 'Opacity', 'ssc' ), 'selector' => 'article:hover .entry-meta'),
									array('property' => 'margin', 'label' => esc_html__( 'Margin', 'ssc' ), 'selector' => 'article:hover .entry-meta'),
									array('property' => 'padding', 'label' => esc_html__( 'Padding', 'ssc' ), 'selector' => 'article:hover .entry-meta'),
									array('property' => 'border', 'label' => esc_html__( 'Border', 'ssc' ), 'selector' => 'article:hover .entry-meta'),
									array('property' => 'border-radius', 'label' => esc_html__( 'Border Radius', 'ssc' ), 'selector' => 'article:hover .entry-meta'),
								),
								'Author' => array(
									array('property' => 'display', 'label' => esc_html__( 'Display', 'ssc' ), 'selector' => 'article:hover .author'),
									array('property' => 'float', 'label' => esc_html__( 'Float', 'ssc' ), 'selector' => 'article:hover .author'),
									array('property' => 'background', 'selector' => 'article:hover .author'),
									array('property' => 'color', 'label' =>  esc_html__( 'Color', 'ssc' ), 'selector' => 'article:hover .author a'),
									array('property' => 'font-size', 'label' =>  esc_html__( 'Font Size', 'ssc' ), 'selector' => 'article:hover .author'),
									array('property' => 'font-weight', 'label' =>  esc_html__( 'Font Weight', 'ssc' ), 'selector' => 'article:hover .author'),
									array('property' => 'font-style', 'label' =>  esc_html__( 'Font Style', 'ssc' ), 'selector' => 'article:hover .author'),
									array('property' => 'font-family', 'label' =>  esc_html__( 'Font Family', 'ssc' ), 'selector' => 'article:hover .author'),
									array('property' => 'text-align', 'label' =>  esc_html__( 'Text Align', 'ssc' ), 'selector' => 'article:hover .author'),
									array('property' => 'text-shadow', 'label' =>  esc_html__( 'Text Shadow', 'ssc' ), 'selector' => 'article:hover .author'),
									array('property' => 'text-transform', 'label' =>  esc_html__( 'Text Transform', 'ssc' ), 'selector' => 'article:hover .author'),
									array('property' => 'text-decoration', 'label' =>  esc_html__( 'Text Decoration', 'ssc' ), 'selector' => 'article:hover .author'),
									array('property' => 'line-height', 'label' =>  esc_html__( 'Line Height', 'ssc' ), 'selector' => 'article:hover .author'),
									array('property' => 'letter-spacing', 'label' =>  esc_html__( 'Letter Spacing', 'ssc' ), 'selector' => 'article:hover .author'),
									array('property' => 'overflow', 'label' =>  esc_html__( 'Overflow', 'ssc' ), 'selector' => 'article:hover .author'),
									array('property' => 'word-break', 'label' =>  esc_html__( 'Word Break', 'ssc' ), 'selector' => 'article:hover .author'),
									array('property' => 'width', 'label' => esc_html__( 'Width', 'ssc' ), 'selector' => 'article:hover .author'),
									array('property' => 'height', 'label' => esc_html__( 'Height', 'ssc' ), 'selector' => 'article:hover .author'),
									array('property' => 'box-shadow', 'label' => esc_html__( 'Box Shadow', 'ssc' ), 'selector' => 'article:hover .author'),
									array('property' => 'opacity', 'label' => esc_html__( 'Opacity', 'ssc' ), 'selector' => 'article:hover .author'),
									array('property' => 'margin', 'label' => esc_html__( 'Margin', 'ssc' ), 'selector' => 'article:hover .author'),
									array('property' => 'padding', 'label' => esc_html__( 'Padding', 'ssc' ), 'selector' => 'article:hover .author'),
									array('property' => 'border', 'label' => esc_html__( 'Border', 'ssc' ), 'selector' => 'article:hover .author'),
									array('property' => 'border-radius', 'label' => esc_html__( 'Border Radius', 'ssc' ), 'selector' => 'article:hover .author'),
								),
								'Date' => array(
									array('property' => 'display', 'label' => esc_html__( 'Display', 'ssc' ), 'selector' => 'article:hover .entry-meta .date, article:hover .data'),
									array('property' => 'float', 'label' => esc_html__( 'Float', 'ssc' ), 'selector' => 'article:hover .entry-meta .date, article:hover .data'),
									array('property' => 'background', 'selector' => 'article:hover .entry-meta .date, article:hover .data'),
									array('property' => 'color', 'label' =>  esc_html__( 'Color', 'ssc' ), 'selector' => 'article:hover .entry-meta .date, article:hover .data'),
									array('property' => 'font-size', 'label' =>  esc_html__( 'Font Size', 'ssc' ), 'selector' => 'article:hover .entry-meta .date, article:hover .data'),
									array('property' => 'font-weight', 'label' =>  esc_html__( 'Font Weight', 'ssc' ), 'selector' => 'article:hover .entry-meta .date, article:hover .data'),
									array('property' => 'font-style', 'label' =>  esc_html__( 'Font Style', 'ssc' ), 'selector' => 'article:hover .entry-meta .date, article:hover .data'),
									array('property' => 'font-family', 'label' =>  esc_html__( 'Font Family', 'ssc' ), 'selector' => 'article:hover .entry-meta .date, article:hover .data'),
									array('property' => 'text-align', 'label' =>  esc_html__( 'Text Align', 'ssc' ), 'selector' => 'article:hover .entry-meta .date, article:hover .data'),
									array('property' => 'text-shadow', 'label' =>  esc_html__( 'Text Shadow', 'ssc' ), 'selector' => 'article:hover .entry-meta .date, article:hover .data'),
									array('property' => 'text-transform', 'label' =>  esc_html__( 'Text Transform', 'ssc' ), 'selector' => 'article:hover .entry-meta .date, article:hover .data'),
									array('property' => 'text-decoration', 'label' =>  esc_html__( 'Text Decoration', 'ssc' ), 'selector' => 'article:hover .entry-meta .date, article:hover .data'),
									array('property' => 'line-height', 'label' =>  esc_html__( 'Line Height', 'ssc' ), 'selector' => 'article:hover .entry-meta .date, article:hover .data'),
									array('property' => 'letter-spacing', 'label' =>  esc_html__( 'Letter Spacing', 'ssc' ), 'selector' => 'article:hover .entry-meta .date, article:hover .data'),
									array('property' => 'overflow', 'label' =>  esc_html__( 'Overflow', 'ssc' ), 'selector' => 'article:hover .entry-meta .date, article:hover .data'),
									array('property' => 'word-break', 'label' =>  esc_html__( 'Word Break', 'ssc' ), 'selector' => 'article:hover .entry-meta .date, article:hover .data'),
									array('property' => 'width', 'label' => esc_html__( 'Width', 'ssc' ), 'selector' => 'article:hover .entry-meta .date, article:hover .data'),
									array('property' => 'height', 'label' => esc_html__( 'Height', 'ssc' ), 'selector' => 'article:hover .entry-meta .date, article:hover .data'),
									array('property' => 'box-shadow', 'label' => esc_html__( 'Box Shadow', 'ssc' ), 'selector' => 'article:hover .entry-meta .date, article:hover .data'),
									array('property' => 'opacity', 'label' => esc_html__( 'Opacity', 'ssc' ), 'selector' => 'article:hover .entry-meta .date, article:hover .data'),
									array('property' => 'margin', 'label' => esc_html__( 'Margin', 'ssc' ), 'selector' => 'article:hover .entry-meta .date, article:hover .data'),
									array('property' => 'padding', 'label' => esc_html__( 'Padding', 'ssc' ), 'selector' => 'article:hover .entry-meta .date, article:hover .data'),
									array('property' => 'border', 'label' => esc_html__( 'Border', 'ssc' ), 'selector' => 'article:hover .entry-meta .date, article:hover .data'),
									array('property' => 'border-radius', 'label' => esc_html__( 'Border Radius', 'ssc' ), 'selector' => 'article:hover .entry-meta .date, article:hover .data'),
								),
								'Comments Link' => array(
									array('property' => 'display', 'label' => esc_html__( 'Display', 'ssc' ), 'selector' => 'article:hover .comments-link'),
									array('property' => 'float', 'label' => esc_html__( 'Float', 'ssc' ), 'selector' => 'article:hover .comments-link'),
									array('property' => 'background', 'selector' => 'article:hover .comments-link'),
									array('property' => 'color', 'label' =>  esc_html__( 'Color', 'ssc' ), 'selector' => 'article:hover .comments-link a'),
									array('property' => 'font-size', 'label' =>  esc_html__( 'Font Size', 'ssc' ), 'selector' => 'article:hover .comments-link'),
									array('property' => 'font-weight', 'label' =>  esc_html__( 'Font Weight', 'ssc' ), 'selector' => 'article:hover .comments-link'),
									array('property' => 'font-style', 'label' =>  esc_html__( 'Font Style', 'ssc' ), 'selector' => 'article:hover .comments-link'),
									array('property' => 'font-family', 'label' =>  esc_html__( 'Font Family', 'ssc' ), 'selector' => 'article:hover .comments-link'),
									array('property' => 'text-align', 'label' =>  esc_html__( 'Text Align', 'ssc' ), 'selector' => 'article:hover .comments-link'),
									array('property' => 'text-shadow', 'label' =>  esc_html__( 'Text Shadow', 'ssc' ), 'selector' => 'article:hover .comments-link'),
									array('property' => 'text-transform', 'label' =>  esc_html__( 'Text Transform', 'ssc' ), 'selector' => 'article:hover .comments-link'),
									array('property' => 'text-decoration', 'label' =>  esc_html__( 'Text Decoration', 'ssc' ), 'selector' => 'article:hover .comments-link'),
									array('property' => 'line-height', 'label' =>  esc_html__( 'Line Height', 'ssc' ), 'selector' => 'article:hover .comments-link'),
									array('property' => 'letter-spacing', 'label' =>  esc_html__( 'Letter Spacing', 'ssc' ), 'selector' => 'article:hover .comments-link'),
									array('property' => 'overflow', 'label' =>  esc_html__( 'Overflow', 'ssc' ), 'selector' => 'article:hover .comments-link'),
									array('property' => 'word-break', 'label' =>  esc_html__( 'Word Break', 'ssc' ), 'selector' => 'article:hover .comments-link'),
									array('property' => 'width', 'label' => esc_html__( 'Width', 'ssc' ), 'selector' => 'article:hover .comments-link'),
									array('property' => 'height', 'label' => esc_html__( 'Height', 'ssc' ), 'selector' => 'article:hover .comments-link'),
									array('property' => 'box-shadow', 'label' => esc_html__( 'Box Shadow', 'ssc' ), 'selector' => 'article:hover .comments-link'),
									array('property' => 'opacity', 'label' => esc_html__( 'Opacity', 'ssc' ), 'selector' => 'article:hover .comments-link'),
									array('property' => 'margin', 'label' => esc_html__( 'Margin', 'ssc' ), 'selector' => 'article:hover .comments-link'),
									array('property' => 'padding', 'label' => esc_html__( 'Padding', 'ssc' ), 'selector' => 'article:hover .comments-link'),
									array('property' => 'border', 'label' => esc_html__( 'Border', 'ssc' ), 'selector' => 'article:hover .comments-link'),
									array('property' => 'border-radius', 'label' => esc_html__( 'Border Radius', 'ssc' ), 'selector' => 'article:hover .comments-link'),
								),
								'Entry Content' => array(
									array('property' => 'display', 'label' => esc_html__( 'Display', 'ssc' ), 'selector' => 'article:hover .c_block .entry-content'),
									array('property' => 'float', 'label' => esc_html__( 'Float', 'ssc' ), 'selector' => 'article:hover .c_block .entry-content'),
									array('property' => 'background', 'selector' => 'article:hover .c_block .entry-content'),
									array('property' => 'color', 'label' =>  esc_html__( 'Color', 'ssc' ), 'selector' => 'article:hover .c_block .entry-content'),
									array('property' => 'font-size', 'label' =>  esc_html__( 'Font Size', 'ssc' ), 'selector' => 'article:hover .c_block .entry-content'),
									array('property' => 'font-weight', 'label' =>  esc_html__( 'Font Weight', 'ssc' ), 'selector' => 'article:hover .c_block .entry-content'),
									array('property' => 'font-style', 'label' =>  esc_html__( 'Font Style', 'ssc' ), 'selector' => 'article:hover .c_block .entry-content'),
									array('property' => 'font-family', 'label' =>  esc_html__( 'Font Family', 'ssc' ), 'selector' => 'article:hover .c_block .entry-content'),
									array('property' => 'text-align', 'label' =>  esc_html__( 'Text Align', 'ssc' ), 'selector' => 'article:hover .c_block .entry-content'),
									array('property' => 'text-shadow', 'label' =>  esc_html__( 'Text Shadow', 'ssc' ), 'selector' => 'article:hover .c_block .entry-content'),
									array('property' => 'text-transform', 'label' =>  esc_html__( 'Text Transform', 'ssc' ), 'selector' => 'article:hover .c_block .entry-content'),
									array('property' => 'text-decoration', 'label' =>  esc_html__( 'Text Decoration', 'ssc' ), 'selector' => 'article:hover .c_block .entry-content'),
									array('property' => 'line-height', 'label' =>  esc_html__( 'Line Height', 'ssc' ), 'selector' => 'article:hover .c_block .entry-content'),
									array('property' => 'letter-spacing', 'label' =>  esc_html__( 'Letter Spacing', 'ssc' ), 'selector' => 'article:hover .c_block .entry-content'),
									array('property' => 'overflow', 'label' =>  esc_html__( 'Overflow', 'ssc' ), 'selector' => 'article:hover .c_block .entry-content'),
									array('property' => 'word-break', 'label' =>  esc_html__( 'Word Break', 'ssc' ), 'selector' => 'article:hover .c_block .entry-content'),
									array('property' => 'width', 'label' => esc_html__( 'Width', 'ssc' ), 'selector' => 'article:hover .c_block .entry-content'),
									array('property' => 'height', 'label' => esc_html__( 'Height', 'ssc' ), 'selector' => 'article:hover .c_block .entry-content'),
									array('property' => 'box-shadow', 'label' => esc_html__( 'Box Shadow', 'ssc' ), 'selector' => 'article:hover .c_block .entry-content'),
									array('property' => 'opacity', 'label' => esc_html__( 'Opacity', 'ssc' ), 'selector' => 'article:hover .c_block .entry-content'),
									array('property' => 'margin', 'label' => esc_html__( 'Margin', 'ssc' ), 'selector' => 'article:hover .c_block .entry-content'),
									array('property' => 'padding', 'label' => esc_html__( 'Padding', 'ssc' ), 'selector' => 'article:hover .c_block .entry-content'),
									array('property' => 'border', 'label' => esc_html__( 'Border', 'ssc' ), 'selector' => 'article:hover .c_block .entry-content'),
									array('property' => 'border-radius', 'label' => esc_html__( 'Border Radius', 'ssc' ), 'selector' => 'article:hover .c_block .entry-content'),
								),
								'More Link' => array(
									array('property' => 'display', 'label' => esc_html__( 'Display', 'ssc' ), 'selector' => 'article .c_block .entry-content .more:hover'),
									array('property' => 'float', 'label' => esc_html__( 'Float', 'ssc' ), 'selector' => 'article .c_block .entry-content .more:hover'),
									array('property' => 'background', 'selector' => 'article .c_block .entry-content .more:hover'),
									array('property' => 'color', 'label' =>  esc_html__( 'Color', 'ssc' ), 'selector' => 'article .c_block .entry-content .more:hover'),
									array('property' => 'font-size', 'label' =>  esc_html__( 'Font Size', 'ssc' ), 'selector' => 'article .c_block .entry-content .more:hover'),
									array('property' => 'font-weight', 'label' =>  esc_html__( 'Font Weight', 'ssc' ), 'selector' => 'article .c_block .entry-content .more:hover'),
									array('property' => 'font-style', 'label' =>  esc_html__( 'Font Style', 'ssc' ), 'selector' => 'article .c_block .entry-content .more:hover'),
									array('property' => 'font-family', 'label' =>  esc_html__( 'Font Family', 'ssc' ), 'selector' => 'article .c_block .entry-content .more:hover'),
									array('property' => 'text-align', 'label' =>  esc_html__( 'Text Align', 'ssc' ), 'selector' => 'article .c_block .entry-content .more:hover'),
									array('property' => 'text-shadow', 'label' =>  esc_html__( 'Text Shadow', 'ssc' ), 'selector' => 'article .c_block .entry-content .more:hover'),
									array('property' => 'text-transform', 'label' =>  esc_html__( 'Text Transform', 'ssc' ), 'selector' => 'article .c_block .entry-content .more:hover'),
									array('property' => 'text-decoration', 'label' =>  esc_html__( 'Text Decoration', 'ssc' ), 'selector' => 'article .c_block .entry-content .more:hover'),
									array('property' => 'line-height', 'label' =>  esc_html__( 'Line Height', 'ssc' ), 'selector' => 'article .c_block .entry-content .more:hover'),
									array('property' => 'letter-spacing', 'label' =>  esc_html__( 'Letter Spacing', 'ssc' ), 'selector' => 'article .c_block .entry-content .more:hover'),
									array('property' => 'overflow', 'label' =>  esc_html__( 'Overflow', 'ssc' ), 'selector' => 'article .c_block .entry-content .more:hover'),
									array('property' => 'word-break', 'label' =>  esc_html__( 'Word Break', 'ssc' ), 'selector' => 'article .c_block .entry-content .more:hover'),
									array('property' => 'width', 'label' => esc_html__( 'Width', 'ssc' ), 'selector' => 'article .c_block .entry-content .more:hover'),
									array('property' => 'height', 'label' => esc_html__( 'Height', 'ssc' ), 'selector' => 'article .c_block .entry-content .more:hover'),
									array('property' => 'box-shadow', 'label' => esc_html__( 'Box Shadow', 'ssc' ), 'selector' => 'article .c_block .entry-content .more:hover'),
									array('property' => 'opacity', 'label' => esc_html__( 'Opacity', 'ssc' ), 'selector' => 'article .c_block .entry-content .more:hover'),
									array('property' => 'margin', 'label' => esc_html__( 'Margin', 'ssc' ), 'selector' => 'article .c_block .entry-content .more:hover'),
									array('property' => 'padding', 'label' => esc_html__( 'Padding', 'ssc' ), 'selector' => 'article .c_block .entry-content .more:hover'),
									array('property' => 'border', 'label' => esc_html__( 'Border', 'ssc' ), 'selector' => 'article .c_block .entry-content .more:hover'),
									array('property' => 'border-radius', 'label' => esc_html__( 'Border Radius', 'ssc' ), 'selector' => 'article .c_block .entry-content .more:hover'),
								),
								// Pagination
								'Pagination Box' => array(
									array('property' => 'background', 'selector' => '.ssc-blog-feed-pagination:hover'),
									array('property' => 'overflow', 'label' => esc_html__( 'Overflow', 'ssc' ), 'selector' => '.ssc-blog-feed-pagination:hover'),
									array('property' => 'margin', 'label' => esc_html__( 'Margin', 'ssc' ), 'selector' => '.ssc-blog-feed-pagination:hover'),
									array('property' => 'padding', 'label' => esc_html__( 'Padding', 'ssc' ), 'selector' => '.ssc-blog-feed-pagination:hover'),
									array('property' => 'border', 'label' => esc_html__( 'Border', 'ssc' ), 'selector' => '.ssc-blog-feed-pagination:hover'),
									array('property' => 'border-radius', 'label' => esc_html__( 'Border Radius', 'ssc' ), 'selector' => '.ssc-blog-feed-pagination:hover')
								),
								'Pagination' => array(
									array('property' => 'background', 'selector' => '.page-numbers li a:hover, .page-numbers li span:hover'),
									array('property' => 'color', 'label' => esc_html__( 'Color', 'ssc' ), 'selector' => '.page-numbers li a:hover, .page-numbers li span:hover'),
									array('property' => 'font-size', 'label' => esc_html__( 'Font Size', 'ssc' ), 'selector' => '.page-numbers li a:hover, .page-numbers li span:hover'),
									array('property' => 'line-height', 'label' => esc_html__( 'Line Height', 'ssc' ), 'selector' => '.page-numbers li a:hover, .page-numbers li span:hover'),
									array('property' => 'font-weight', 'label' => esc_html__( 'Font Weight', 'ssc' ), 'selector' => '.page-numbers li a:hover, .page-numbers li span:hover'),
									array('property' => 'font-style', 'label' => esc_html__( 'Font Style', 'ssc' ), 'selector' => '.page-numbers li a:hover, .page-numbers li span:hover'),
									array('property' => 'font-family', 'label' => esc_html__( 'Font Family', 'ssc' ), 'selector' => '.page-numbers li a:hover, .page-numbers li span:hover'),
									array('property' => 'text-align', 'label' => esc_html__( 'Text Align', 'ssc' ), 'selector' => '.page-numbers li a:hover, .page-numbers li span:hover'),
									array('property' => 'text-shadow', 'label' => esc_html__( 'Text Shadow', 'ssc' ), 'selector' => '.page-numbers li a:hover, .page-numbers li span:hover'),
									array('property' => 'box-shadow', 'label' => esc_html__( 'Box Shadow', 'ssc' ), 'selector' => '.page-numbers li a:hover, .page-numbers li span:hover'),
									array('property' => 'text-transform', 'label' => esc_html__( 'Text Transform', 'ssc' ), 'selector' => '.page-numbers li a:hover, .page-numbers li span:hover'),
									array('property' => 'text-decoration', 'label' => esc_html__( 'Text Decoration', 'ssc' ), 'selector' => '.page-numbers li a:hover, .page-numbers li span:hover'),
									array('property' => 'letter-spacing', 'label' => esc_html__( 'Letter Spacing', 'ssc' ), 'selector' => '.page-numbers li a:hover, .page-numbers li span:hover'),
									array('property' => 'overflow', 'label' => esc_html__( 'Overflow', 'ssc' ), 'selector' => '.page-numbers li a:hover, .page-numbers li span:hover'),
									array('property' => 'word-break', 'label' => esc_html__( 'Word Break', 'ssc' ), 'selector' => '.page-numbers li a:hover, .page-numbers li span:hover'),
									array('property' => 'margin', 'label' => esc_html__( 'Margin', 'ssc' ), 'selector' => '.page-numbers li a:hover, .page-numbers li span:hover'),
									array('property' => 'padding', 'label' => esc_html__( 'Padding', 'ssc' ), 'selector' => '.page-numbers li a:hover, .page-numbers li span:hover'),
									array('property' => 'border', 'label' => esc_html__( 'Border', 'ssc' ), 'selector' => '.page-numbers li a:hover, .page-numbers li span:hover'),
									array('property' => 'border-radius', 'label' => esc_html__( 'Border Radius', 'ssc' ), 'selector' => '.page-numbers li a:hover, .page-numbers li span:hover')
								),
							),
						),
					),
				),

				'animate' => array(
					array(
						'name' => 'animate',
						'type' => 'animate',
					),
				),
			),
		),
	) );
}

// Register Shortcode
function ssc_blog_feed_shortcode( $atts, $content = null ) {
	$thumbnail = '';
	extract( shortcode_atts( array(
		'template'            => '1', //+
		'por'                 => '2', //+
		'tax_term'            => '', //+
		'ignore_sticky_posts' => '', //+
		'withtags'            => '',
		'order'               => '', //+
		'orderby'             => '', //+
		'items'               => '', //+
		'show_pagination'     => '',//+
		'el_class'            => '',//+
	),
		$atts ) );

	$wrp_classes = apply_filters( 'kc-el-class', $atts );

	// Vadiables
	$post_taxonomy_data = explode( ',', $tax_term );
	$taxonomy_term      = array();
	$post_type          = 'post';
	$paged              = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;


	// Post Taxonomy
	$post_taxonomy_tmp = explode( ':', $post_taxonomy_data[0] );
	if ( count( $post_taxonomy_tmp ) > 1 || ! isset( $post_taxonomy_tmp[1] ) ) {
		$post_type = $post_taxonomy_tmp[0];
	}

	foreach ( $post_taxonomy_data as $post_taxonomy ) {
		$post_taxonomy_tmp = explode( ':', $post_taxonomy );

		if ( isset( $post_taxonomy_tmp[1] ) ) {
			$taxonomy_term[] = $post_taxonomy_tmp[1];
		}
	}

	$taxonomy_objects = get_object_taxonomies( $post_type, 'objects' );
	$taxonomy         = key( $taxonomy_objects );

	if ( $atts['items'] == 0 ) {
		$atts['items'] = - 1;
	}
	$intaglist = implode( "", preg_split( "/:([A-Za-z0-9]+)/", $withtags, - 1, PREG_SPLIT_NO_EMPTY ) );

	$atts['ignore_sticky_posts'] = ( 'yes' !== $atts['ignore_sticky_posts'] ? false : true );
	$args                        = array(
		'post_type'           => $post_type,
		'posts_per_page'      => $atts['items'],
		'orderby'             => $orderby,
		'order'               => $order,
		'paged'               => $paged,
		'tag'                 => $intaglist,
		'ignore_sticky_posts' => $atts['ignore_sticky_posts'],

	);

	if ( count( $taxonomy_term ) ) {
		$tax_query = array(
			'relation' => 'OR',
		);

		foreach ( $taxonomy_term as $term ) {
			$tax_query[] = array(
				'taxonomy' => $taxonomy,
				'field'    => 'slug',
				'terms'    => $term,
			);
		}

		$args['tax_query'] = $tax_query;
	}

	$the_query = new WP_Query( $args );
	$pcount    = $the_query->max_num_pages;

	$output = '<div  class="ssc-post-feed ' . implode( ' ',
			$wrp_classes ) . ' ' . 'column' . $por . ' ' . 'alayout' . $template . ' ' . $el_class . ' archive">';
	if ( $the_query->have_posts() ) {
		while ( $the_query->have_posts() ) {
			$the_query->the_post();
			global $post;
			$output   .= '<article id="post-' . $post->ID . '" class="' . join( ' ', get_post_class() ) . '">';
			$function = 'archive_template_' . $template;
			ob_start();
			Atiframebuilder_Blog::$function();
			$output .= ob_get_clean();
			$output .= '</article>';
			wp_reset_postdata();
		}

	} //end count

	if ( $show_pagination === 'yes' ) {
		$output .= '<div class="clearfix ssc-blog-feed-pagination" role="navigation">' . paginate_links( array(
				'show_all'           => false,
				'total'              => $pcount,
				'current'            => max( 1, $paged ),
				'type'               => 'list',
				'end_size'           => 3,
				'mid_size'           => 3,
				'prev_next'          => false,
				'add_args'           => false,
				'add_fragment'       => '',
				'screen_reader_text' => esc_html( '' ),
			) ) . '</div>';
	}


	// PAGINATION END

	$output .= '</div>'; // row closed

	$the_query = null;

	return $output;
}

function ssc_blog_feed_get_archive_templates() {
	$options = array();
	foreach ( Atiframebuilder_Theme_Demo::get_archive_templates() as $i => $opt ) {
		$options[ $i ] = $opt['img'];
	}

	return $options;
}

