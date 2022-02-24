<?php
add_action('init', 'ssc_team_params', 99);

/**
 * Additional functions
 */

/**
 * Additional functions
 */


function ssc_team_params() {
    global $kc;

    $kc->add_map(array(
        'ssc_team' => array(
            'name' => esc_html__( 'Team Extended', 'ssc' ),
            'icon' => 'kc-icon-box ssc-icon-24',
            'category' => 'SecretLab',
            'css_box' => true,
            'params' => array(
	            'general'	=> array(
		            array(
			            'name'			=> 'layout',
			            'type'			=> 'radio_image',
			            'label'			=> __( 'Select Template', 'ssc' ),
			            'admin_label'	=> true,
			            'options'		=> array(
				            '1'	=> plugin_dir_url( __FILE__ ) .'../images/team1.jpg',
				            '2'	=> plugin_dir_url( __FILE__ ) .'../images/team2.jpg',
				            '3'	=> plugin_dir_url( __FILE__ ) .'../images/team3.jpg',
				            '4'	=> plugin_dir_url( __FILE__ ) .'../images/team4.jpg',
				            '5'	=> plugin_dir_url( __FILE__ ) .'../images/team5.jpg',
				            '6'	=> plugin_dir_url( __FILE__ ) .'../images/team6.jpg',
				            '9'	=> plugin_dir_url( __FILE__ ) .'../images/team9.jpg',
				            '7'	=> plugin_dir_url( __FILE__ ) .'../images/team7.jpg',
				            '8'	=> plugin_dir_url( __FILE__ ) .'../images/team8.jpg',
				            '10'	=> plugin_dir_url( __FILE__ ) .'../images/team10.jpg',
			            ),
			            'value'			=> '1'
		            ),
		            array(
			            'name'	=> 'image',
			            'label'	=> __( 'Avatar Image', 'ssc' ),
			            'type'	=> 'attach_image'
		            ),
		            array(
			            'type'			=> 'text',
			            'label'			=> __( 'Image Size', 'ssc' ),
			            'name'			=> 'img_size',
			            'value'			=> 'full',
			            'description'   => __(' Set the image size: "full", "thumbnail", "medium", "large" or other size ', 'ssc'),

		            ),
		            array(
			            'type'			=> 'text',
			            'name'			=> 'title',
			            'label'			=> __( 'Name', 'ssc' ),
			            'value'			=> 'Your Name',
			            'admin_label'	=> true
		            ),
		            array(
			            'name'		=> 'subtitle',
			            'label'		=> __( 'Subtitle', 'ssc' ),
			            'type'		=> 'text',
			            'value'		=> 'Manager'
		            ),
		            array(
			            'type'	=> 'textarea',
			            'name'	=> 'desc',
			            'label'	=> __( 'Description', 'ssc' ),
			            'value'	=> base64_encode('Lorem Ipsum is simply dummy text of the printing and typesetting industry.')
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
			            'name'	=> 'show_button',
			            'label'	=> __( 'Display Button', 'ssc' ),
			            'type'	=> 'toggle',
			            'value'	=> 'yes',
			            'relation'	=> array(
				            'parent'	=> 'layout',
				            'show_when'	=> array( '1', '3' )
			            )
		            ),
		            array(
			            'name'		=> 'button_text',
			            'label'		=> __( 'Text Button', 'ssc' ),
			            'type'		=> 'text',
			            'value'		=> __( 'Read More', 'ssc' ),
			            'relation'	=> array(
				            'parent'	=> 'show_button',
				            'show_when'	=> 'yes'
			            )
		            ),
		            array(
			            'name'		=> 'button_link',
			            'label'		=> __( 'Link Button', 'ssc' ),
			            'type'		=> 'link',
			            'value'		=> '#',
			            'relation'	=> array(
				            'parent'	=> 'show_button',
				            'show_when'	=> 'yes'
			            )
		            ),
		            array(
			            'type'			=> 'text',
			            'label'			=> __( 'Custom class', 'ssc' ),
			            'name'			=> 'custom_class',
			            'description'	=> __( 'Enter extra custom class', 'ssc' )
		            )
	            ),
	            'socials'   => array(
		            array(
			            'name'			=> 'facebook',
			            'label'			=> __( 'Facebook Link', 'ssc' ),
			            'type'			=> 'text',
			            'value'			=> '#',
			            'description'	=> __( 'Insert link facebook. It hidden when field blank.', 'domain' ),
			            'relation'		=> array(
				            'parent'	=> 'show_icon',
				            'show_when'	=> 'yes'
			            )
		            ),
		            array(
			            'name'			=> 'twitter',
			            'label'			=> __( 'Twitter Link', 'ssc' ),
			            'type'			=> 'text',
			            'value'			=> '#',
			            'description'	=> __( 'Insert link twitter. It hidden when field blank.', 'domain' ),
			            'relation'		=> array(
				            'parent'	=> 'show_icon',
				            'show_when'	=> 'yes'
			            )
		            ),
		            array(
			            'name'			=> 'google_plus',
			            'label'			=> __( 'Google Plus Link', 'ssc' ),
			            'type'			=> 'text',
			            'value'			=> '#',
			            'description'	=> __( 'Insert link google plus. It hidden when field blank.', 'domain' ),
			            'relation'		=> array(
				            'parent'	=> 'show_icon',
				            'show_when'	=> 'yes'
			            )
		            ),
		            array(
			            'name'			=> 'linkedin',
			            'label'			=> __( 'Linkedin Link', 'ssc' ),
			            'type'			=> 'text',
			            'value'			=> '',
			            'description'	=> __( 'Insert link linkedin. It hidden when field blank.', 'domain' ),
			            'relation'		=> array(
				            'parent'	=> 'show_icon',
				            'show_when'	=> 'yes'
			            )
		            ),
		            array(
			            'name'			=> 'pinterest',
			            'label'			=> __( 'Pinterest Link', 'ssc' ),
			            'type'			=> 'text',
			            'value'			=> '',
			            'description'	=> __( 'Insert link pinterest. It hidden when field blank.', 'domain' ),
			            'relation'		=> array(
				            'parent'	=> 'show_icon',
				            'show_when'	=> 'yes'
			            )
		            ),
		            array(
			            'name'			=> 'flickr',
			            'label'			=> __( 'Flickr Link', 'ssc' ),
			            'type'			=> 'text',
			            'value'			=> '',
			            'description'	=> __( 'Insert link flickr. It hidden when field blank.', 'domain' ),
			            'relation'		=> array(
				            'parent'	=> 'show_icon',
				            'show_when'	=> 'yes'
			            )
		            ),
		            array(
			            'name'			=> 'instagram',
			            'label'			=> __( 'Instagram Link', 'ssc' ),
			            'type'			=> 'text',
			            'value'			=> '',
			            'description'	=> __( 'Insert link instagram. It hidden when field blank.', 'domain' ),
			            'relation'		=> array(
				            'parent'	=> 'show_icon',
				            'show_when'	=> 'yes'
			            )
		            ),
		            array(
			            'name'			=> 'dribbble',
			            'label'			=> __( 'Dribbble Link', 'ssc' ),
			            'type'			=> 'text',
			            'value'			=> '',
			            'description'	=> __( 'Insert link dribbble. It hidden when field blank.', 'domain' ),
			            'relation'		=> array(
				            'parent'	=> 'show_icon',
				            'show_when'	=> 'yes'
			            )
		            ),
		            array(
			            'name'			=> 'reddit',
			            'label'			=> __( 'Reddit Link', 'ssc' ),
			            'type'			=> 'text',
			            'value'			=> '',
			            'description'	=> __( 'Insert link reddit. It hidden when field blank.', 'domain' ),
			            'relation'		=> array(
				            'parent'	=> 'show_icon',
				            'show_when'	=> 'yes'
			            )
		            ),
		            array(
			            'name'			=> 'email',
			            'label'			=> __( 'Email Link', 'ssc' ),
			            'type'			=> 'text',
			            'value'			=> '',
			            'description'	=> __( 'Insert link email. It hidden when field blank.', 'domain' ),
			            'relation'		=> array(
				            'parent'	=> 'show_icon',
				            'show_when'	=> 'yes'
			            )
		            ),
	            ),
	            'styling'	=> array(
		            array(
			            'name'		=> 'css_custom',
			            'type'		=> 'css',
			            'value'		=> '{`kc-css`:{`any`:{`text-box`:{`background|.islide`:`eyJjb2xvciI6IiNlODQyNjUiLCJsaW5lYXJHcmFkaWVudCI6WyIiXSwiaW1hZ2UiOiJub25lIiwicG9zaXRpb24iOiIwJSAwJSIsInNpemUiOiJhdXRvIiwicmVwZWF0IjoicmVwZWF0IiwiYXR0YWNobWVudCI6InNjcm9sbCIsImFkdmFuY2VkIjowfQ==`,`padding|.islide`:`20px 15px 20px 15px`},`title`:{`color|.content-title`:`#ffffff`,`font-size|.content-title`:`18px`,`text-transform|.content-title`:`capitalize`,`text-align|.content-title`:`center`,`padding|.content-title`:`inherit inherit 5px inherit`},`subtitle`:{`color|.content-subtitle`:`rgba(255, 255, 255, 0.58)`,`font-size|.content-subtitle`:`16px`,`font-weight|.content-subtitle`:`400`,`text-align|.content-subtitle`:`center`},`social`:{`color|.content-socials a i`:`#e84265`,`color|.content-socials a:hover i`:`#8c283d`,`font-size|.content-socials a`:`16px`,`line-height|.content-socials a`:`16px`,`display|.content-socials a`:`block`,`height|.content-socials a`:`40px`,`padding|.content-socials a`:`18px inherit inherit 10px`}}}}',
			            'options'	=> array(
				            array(
					            "screens" => "any,1024,999,767,479",
					            'Box' => array(
						            array('property' => 'text-align', 'label' => esc_html__( 'Text Align', 'ssc' ), 'selector' => '+.ssc_team'),
						            array('property' => 'vertical-align', 'label' => esc_html__('Vertical Align', 'ssc' ), 'selector' => '+.ssc_team'),
						            array('property' => 'background', 'selector' => '+.ssc_team'),
						            array('property' => 'background', 'selector' => '.ssc_team:hover'),
						            array('property' => 'display', 'label' => esc_html__( 'Display', 'ssc' ), 'selector' => '+.ssc_team'),
						            array('property' => 'float', 'label' => esc_html__( 'Float', 'ssc' ), 'selector' => '+.ssc_team'),
						            array('property' => 'width', 'label' => esc_html__( 'Width', 'ssc' ), 'selector' => '+.ssc_team'),
						            array('property' => 'max-width', 'label' => esc_html__( 'Max Width', 'ssc' ), 'selector' => '+.ssc_team'),
						            array('property' => 'height', 'label' => esc_html__( 'Height', 'ssc' ), 'selector' => '+.ssc_team'),
						            array('property' => 'box-shadow', 'label' => esc_html__( 'Box Shadow', 'ssc' ), 'selector' => '+.ssc_team'),
						            array('property' => 'opacity', 'label' => esc_html__( 'Opacity', 'ssc' ), 'selector' => '+.ssc_team'),
						            array('property' => 'margin', 'label' => esc_html__( 'Margin', 'ssc' ), 'selector' => '+.ssc_team'),
						            array('property' => 'padding', 'label' => esc_html__( 'Padding', 'ssc' ), 'selector' => '+.ssc_team'),
						            array('property' => 'border', 'label' => esc_html__( 'Border', 'ssc' ), 'selector' => '+.ssc_team'),
						            array('property' => 'border-radius', 'label' => esc_html__( 'Border Radius', 'ssc' ), 'selector' => '+.ssc_team'),
					            ),
					            'Text Box' => array(
						            array('property' => 'text-align', 'label' => esc_html__( 'Text Align', 'ssc' ), 'selector' => '.islide'),
						            array('property' => 'vertical-align', 'label' => esc_html__('Vertical Align', 'ssc' ), 'selector' => '.islide'),
						            array('property' => 'background', 'selector' => '.islide'),
						            array('property' => 'background', 'selector' => ':hover .islide'),
						            array('property' => 'display', 'label' => esc_html__( 'Display', 'ssc' ), 'selector' => '.islide'),
						            array('property' => 'float', 'label' => esc_html__( 'Float', 'ssc' ), 'selector' => '.islide'),
						            array('property' => 'width', 'label' => esc_html__( 'Width', 'ssc' ), 'selector' => '.islide'),
						            array('property' => 'max-width', 'label' => esc_html__( 'Max Width', 'ssc' ), 'selector' => '.islide'),
						            array('property' => 'height', 'label' => esc_html__( 'Height', 'ssc' ), 'selector' => '.islide'),
						            array('property' => 'box-shadow', 'label' => esc_html__( 'Box Shadow', 'ssc' ), 'selector' => '.islide'),
						            array('property' => 'opacity', 'label' => esc_html__( 'Opacity', 'ssc' ), 'selector' => '.islide'),
						            array('property' => 'margin', 'label' => esc_html__( 'Margin', 'ssc' ), 'selector' => '.islide'),
						            array('property' => 'padding', 'label' => esc_html__( 'Padding', 'ssc' ), 'selector' => '.islide'),
						            array('property' => 'border', 'label' => esc_html__( 'Border', 'ssc' ), 'selector' => '.islide'),
						            array('property' => 'border-radius', 'label' => esc_html__( 'Border Radius', 'ssc' ), 'selector' => '.islide'),
					            ),
					            'Title'	=> array(
						            array('property' => 'color', 'label' => esc_html__('Color', 'ssc' ), 'selector' => '.content-title'),
						            array('property' => 'background-color', 'selector' => '.content-title'),
						            array('property' => 'background-color', 'label' => esc_html__('BG Color Hover', 'ssc' ), 'selector' => '.content-title:hover'),
						            array('property' => 'font-family', 'label' => esc_html__('Font Family', 'ssc' ), 'selector' => '.content-title'),
						            array('property' => 'font-size', 'label' => esc_html__('Font Size', 'ssc' ), 'selector' => '.content-title'),
						            array('property' => 'line-height', 'label' => esc_html__('Line Height', 'ssc' ), 'selector' => '.content-title'),
						            array('property' => 'font-weight', 'label' => esc_html__('Font Weight', 'ssc' ), 'selector' => '.content-title'),
						            array('property' => 'letter-spacing', 'label' => esc_html__( 'Letter Spacing', 'ssc' ), 'selector' => '.content-title'),
						            array('property' => 'text-transform', 'label' => esc_html__('Text Transform', 'ssc' ), 'selector' => '.content-title'),
						            array('property' => 'text-align', 'label' => esc_html__('Text Align', 'ssc' ), 'selector' => '.content-title'),
						            array('property' => 'margin', 'label' => esc_html__('Margin', 'ssc' ), 'selector' => '.content-title'),
						            array('property' => 'padding', 'label' => esc_html__('Padding', 'ssc' ), 'selector' => '.content-title'),
					            ),
					            'Subtitle'	=> array(
						            array('property' => 'color', 'label' => esc_html__('Color', 'ssc' ), 'selector' => '.content-subtitle'),
						            array('property' => 'background-color', 'selector' => '.content-subtitle'),
						            array('property' => 'background-color', 'label' => esc_html__('BG Color Hover', 'ssc' ), 'selector' => '.content-subtitle:hover'),
						            array('property' => 'font-family', 'label' => esc_html__('Font Family', 'ssc' ), 'selector' => '.content-subtitle'),
						            array('property' => 'font-size', 'label' => esc_html__('Font Size', 'ssc' ), 'selector' => '.content-subtitle'),
						            array('property' => 'line-height', 'label' => esc_html__('Line Height', 'ssc' ), 'selector' => '.content-subtitle'),
						            array('property' => 'font-weight', 'label' => esc_html__('Font Weight', 'ssc' ), 'selector' => '.content-subtitle'),
						            array('property' => 'letter-spacing', 'label' => esc_html__( 'Letter Spacing', 'ssc' ), 'selector' => '.content-subtitle'),
						            array('property' => 'text-transform', 'label' => esc_html__('Text Transform', 'ssc' ), 'selector' => '.content-subtitle'),
						            array('property' => 'text-align', 'label' => esc_html__('Text Align', 'ssc' ), 'selector' => '.content-subtitle'),
						            array('property' => 'margin', 'label' => esc_html__('Margin', 'ssc' ), 'selector' => '.content-subtitle'),
						            array('property' => 'padding', 'label' => esc_html__('Padding', 'ssc' ), 'selector' => '.content-subtitle'),
					            ),
					            'Desc'	=> array(
						            array('property' => 'color', 'label' => esc_html__('Color', 'ssc' ), 'selector' => '.content-desc'),
						            array('property' => 'font-family', 'label' => esc_html__('Font Family', 'ssc' ), 'selector' => '.content-desc'),
						            array('property' => 'font-size', 'label' => esc_html__('Font Size', 'ssc' ), 'selector' => '.content-desc'),
						            array('property' => 'line-height', 'label' => esc_html__('Line Height', 'ssc' ), 'selector' => '.content-desc'),
						            array('property' => 'font-weight', 'label' => esc_html__('Font Weight', 'ssc' ), 'selector' => '.content-desc'),
						            array('property' => 'text-transform', 'label' => esc_html__('Text Transform', 'ssc' ), 'selector' => '.content-desc'),
						            array('property' => 'text-align', 'label' => esc_html__('Text Align', 'ssc' ), 'selector' => '.content-desc'),
						            array('property' => 'padding', 'label' => esc_html__('Padding', 'ssc' ), 'selector' => '.content-desc'),
						            array('property' => 'margin', 'label' => esc_html__('Margin', 'ssc' ), 'selector' => '.content-desc'),
					            ),
					            'Image'	=> array(
						            array('property' => 'background-color', 'label' => esc_html__('Background Color', 'ssc' ), 'selector' => ' img'),
						            array('property' => 'width', 'label' => esc_html__( 'Width', 'ssc' ), 'selector' => ' img'),
						            array('property' => 'border', 'label' => esc_html__('Border', 'ssc' ), 'selector' => ' img'),
						            array('property' => 'border-radius', 'label' => esc_html__('Border Radius', 'ssc' ), 'selector' => ' img'),
						            array('property' => 'margin', 'label' => esc_html__('Margin', 'ssc' ), 'selector' => ' img'),
						            array('property' => 'padding', 'label' => esc_html__('Padding', 'ssc' ), 'selector' => ' img'),
					            ),
					            'Overlay' => array(
						            array('property' => 'text-align', 'label' => esc_html__( 'Text Align', 'ssc' ), 'selector' => 'figure:before'),
						            array('property' => 'vertical-align', 'label' => esc_html__('Vertical Align', 'ssc' ), 'selector' => 'figure:before'),
						            array('property' => 'background', 'selector' => 'figure:before'),
						            array('property' => 'display', 'label' => esc_html__( 'Display', 'ssc' ), 'selector' => 'figure:before'),
						            array('property' => 'float', 'label' => esc_html__( 'Float', 'ssc' ), 'selector' => 'figure:before'),
						            array('property' => 'width', 'label' => esc_html__( 'Width', 'ssc' ), 'selector' => 'figure:before'),
						            array('property' => 'height', 'label' => esc_html__( 'Height', 'ssc' ), 'selector' => 'figure:before'),
						            array('property' => 'box-shadow', 'label' => esc_html__( 'Box Shadow', 'ssc' ), 'selector' => 'figure:before'),
						            array('property' => 'opacity', 'label' => esc_html__( 'Opacity', 'ssc' ), 'selector' => 'figure:before'),
						            array('property' => 'margin', 'label' => esc_html__( 'Margin', 'ssc' ), 'selector' => 'figure:before'),
						            array('property' => 'padding', 'label' => esc_html__( 'Padding', 'ssc' ), 'selector' => 'figure:before'),
						            array('property' => 'border', 'label' => esc_html__( 'Border', 'ssc' ), 'selector' => 'figure:before'),
						            array('property' => 'border-radius', 'label' => esc_html__( 'Border Radius', 'ssc' ), 'selector' => 'figure:before'),
					            ),

					            'Button' => array(
						            array('property' => 'color', 'label' => esc_html__('Button Color', 'ssc' ), 'selector' => '.content-button a'),
						            array('property' => 'color', 'label' => esc_html__('Button Hover Color', 'ssc' ), 'selector' => '.content-button:hover a'),
						            array('property' => 'background-color', 'label' => esc_html__('Button BG Color', 'ssc' ), 'selector' => '.content-button a'),
						            array('property' => 'background-color', 'label' => esc_html__('Button BG Hover Color', 'ssc' ), 'selector' => '.content-button:hover a'),
						            array('property' => 'font-family', 'label' => esc_html__('Font Family', 'ssc' ), 'selector' => '.content-button a'),
						            array('property' => 'font-size', 'label' => esc_html__('Font Size', 'ssc' ), 'selector' => '.content-button a'),
						            array('property' => 'line-height', 'label' => esc_html__('Line Height', 'ssc' ), 'selector' => '.content-button a'),
						            array('property' => 'font-weight', 'label' => esc_html__('Font Weight', 'ssc' ), 'selector' => '.content-button a'),
						            array('property' => 'text-transform', 'label' => esc_html__('Text Transform', 'ssc' ), 'selector' => '.content-button a'),
						            array('property' => 'border', 'label' => esc_html__('Button Border', 'ssc' ), 'selector' => '.content-button a'),
						            array('property' => 'border-color', 'label' => esc_html__('Button Border Color Hover', 'ssc' ), 'selector' => '.content-button:hover a'),
						            array('property' => 'border-radius', 'label' => esc_html__('Border Radius', 'ssc' ), 'selector' => '.content-button a'),
						            array('property' => 'margin', 'label' => esc_html__('Margin', 'ssc' ), 'selector' => '.content-button a'),
						            array('property' => 'padding', 'label' => esc_html__('Padding', 'ssc' ), 'selector' => '.content-button a')
					            ),
					            'Social Box' => array(
						            array('property' => 'text-align', 'label' => esc_html__( 'Text Align', 'ssc' ), 'selector' => '.content-socials'),
						            array('property' => 'vertical-align', 'label' => esc_html__('Vertical Align', 'ssc' ), 'selector' => '.content-socials'),
						            array('property' => 'background', 'selector' => '.content-socials'),
						            array('property' => 'background', 'selector' => '+:hover .content-socials'),
						            array('property' => 'display', 'label' => esc_html__( 'Display', 'ssc' ), 'selector' => '.content-socials'),
						            array('property' => 'float', 'label' => esc_html__( 'Float', 'ssc' ), 'selector' => '.content-socials'),
						            array('property' => 'width', 'label' => esc_html__( 'Width', 'ssc' ), 'selector' => '.content-socials'),
						            array('property' => 'height', 'label' => esc_html__( 'Height', 'ssc' ), 'selector' => '.content-socials'),
						            array('property' => 'box-shadow', 'label' => esc_html__( 'Box Shadow', 'ssc' ), 'selector' => '.content-socials'),
						            array('property' => 'opacity', 'label' => esc_html__( 'Opacity', 'ssc' ), 'selector' => '.content-socials'),
						            array('property' => 'margin', 'label' => esc_html__( 'Margin', 'ssc' ), 'selector' => '.content-socials'),
						            array('property' => 'padding', 'label' => esc_html__( 'Padding', 'ssc' ), 'selector' => '.content-socials'),
						            array('property' => 'border', 'label' => esc_html__( 'Border', 'ssc' ), 'selector' => '.content-socials'),
						            array('property' => 'border', 'label' => esc_html__( 'Border', 'ssc' ), 'selector' => '+:hover .content-socials'),
						            array('property' => 'border-radius', 'label' => esc_html__( 'Border Radius', 'ssc' ), 'selector' => '.content-socials'),
					            ),
					            'Social'	=> array(
						            array('property' => 'color', 'label' => esc_html__('Icon Color', 'ssc' ), 'selector' => '.content-socials a i'),
						            array('property' => 'color', 'label' => esc_html__('Icon Color Hover', 'ssc' ), 'selector' => '.content-socials a:hover i'),
						            array('property' => 'background-color', 'selector' => '.content-socials a'),
						            array('property' => 'background-color', 'label' => esc_html__('BG Color Hover', 'ssc' ), 'selector' => '.content-socials a:hover'),
						            array('property' => 'font-size', 'label' => esc_html__('Font Size', 'ssc' ), 'selector' => '.content-socials a'),
						            array('property' => 'line-height', 'label' => esc_html__('Line Height', 'ssc' ), 'selector' => '.content-socials a'),
						            array('property' => 'width', 'label' => esc_html__('Width', 'ssc' ), 'selector' => '.content-socials a'),
						            array('property' => 'display', 'label' => esc_html__('Display', 'ssc' ), 'selector' => '.content-socials a'),
						            array('property' => 'float', 'label' => esc_html__('Float', 'ssc' ), 'selector' => '.content-socials a'),
						            array('property' => 'height', 'label' => esc_html__('Height', 'ssc' ), 'selector' => '.content-socials a'),
						            array('property' => 'box-shadow', 'label' => esc_html__( 'Box Shadow', 'ssc' ), 'selector' => '.content-socials a'),
						            array('property' => 'text-align', 'label' => esc_html__('Text Align', 'ssc' ), 'selector' => '.content-socials a'),
						            array('property' => 'border', 'label' => esc_html__('Border', 'ssc' ), 'selector' => '.content-socials a'),
						            array('property' => 'border-color', 'label' => esc_html__('Border Color Hover', 'ssc' ), 'selector' => '.content-socials a:hover'),
						            array('property' => 'border-radius', 'label' => esc_html__('Border Radius', 'ssc' ), 'selector' => '.content-socials a'),
						            array('property' => 'margin', 'label' => esc_html__('Margin', 'ssc' ), 'selector' => '.content-socials a'),
						            array('property' => 'padding', 'label' => esc_html__('Padding', 'ssc' ), 'selector' => '.content-socials a'),
					            ),
					            'Social SVG'	=> array(
						            array('property' => 'fill', 'label' => esc_html__('Icon Color', 'ssc' ), 'selector' => '.content-socials a svg'),
						            array('property' => 'fill', 'label' => esc_html__('Icon Color Hover', 'ssc' ), 'selector' => '.content-socials a:hover svg'),
						            array('property' => 'display', 'label' => esc_html__( 'Display', 'ssc' ), 'selector' => '.content-socials a svg'),
						            array('property' => 'float', 'label' => esc_html__( 'Float', 'ssc' ), 'selector' => '.content-socials a svg'),
						            array('property' => 'width', 'label' => esc_html__( 'Width', 'ssc' ), 'selector' => '.content-socials a svg'),
						            array('property' => 'height', 'label' => esc_html__( 'Height', 'ssc' ), 'selector' => '.content-socials a svg'),
						            array('property' => 'box-shadow', 'label' => esc_html__( 'Box Shadow', 'ssc' ), 'selector' => '.content-socials a svg'),
						            array('property' => 'opacity', 'label' => esc_html__( 'Opacity', 'ssc' ), 'selector' => '.content-socials a svg'),
						            array('property' => 'margin', 'label' => esc_html__('Margin', 'ssc' ), 'selector' => '.content-socials a svg'),
						            array('property' => 'padding', 'label' => esc_html__('Padding', 'ssc' ), 'selector' => '.content-socials a svg'),
						            array('property' => 'border-color', 'label' => esc_html__('Border Color', 'ssc' ), 'selector' => '.content-socials a svg'),
						            array('property' => 'border-color', 'label' => esc_html__('Border Color Hover', 'ssc' ), 'selector' => '.content-socials a:hover svg'),
						            array('property' => 'border-radius', 'label' => esc_html__('Border Radius', 'ssc' ), 'selector' => '.content-socials a svg'),
						            array('property' => 'border-radius', 'label' => esc_html__('Border Radius Hover', 'ssc' ), 'selector' => '.content-socials a:hover svg'),

					            ),
					            
				            )
			            )
		            )
	            ),

	            'hover'	=> array(
		            array(
			            'name'		=> 'hover_css',
			            'type'		=> 'css',
			            'value'		=> '',
			            'options'	=> array(
				            array(
					            "screens" => "any,1024,999,767,479",
					            'Box' => array(
						            array('property' => 'text-align', 'label' => esc_html__( 'Text Align', 'ssc' ), 'selector' => '+:hover'),
						            array('property' => 'vertical-align', 'label' => esc_html__('Vertical Align', 'ssc' ), 'selector' => '+:hover'),
						            array('property' => 'background', 'selector' => '+:hover'),
						            array('property' => 'background', 'selector' => '.ssc_team:hover'),
						            array('property' => 'display', 'label' => esc_html__( 'Display', 'ssc' ), 'selector' => '+:hover'),
						            array('property' => 'float', 'label' => esc_html__( 'Float', 'ssc' ), 'selector' => '+:hover'),
						            array('property' => 'width', 'label' => esc_html__( 'Width', 'ssc' ), 'selector' => '+:hover'),
						            array('property' => 'height', 'label' => esc_html__( 'Height', 'ssc' ), 'selector' => '+:hover'),
						            array('property' => 'box-shadow', 'label' => esc_html__( 'Box Shadow', 'ssc' ), 'selector' => '+:hover'),
						            array('property' => 'opacity', 'label' => esc_html__( 'Opacity', 'ssc' ), 'selector' => '+:hover'),
						            array('property' => 'margin', 'label' => esc_html__( 'Margin', 'ssc' ), 'selector' => '+:hover'),
						            array('property' => 'padding', 'label' => esc_html__( 'Padding', 'ssc' ), 'selector' => '+:hover'),
						            array('property' => 'border', 'label' => esc_html__( 'Border', 'ssc' ), 'selector' => '+:hover'),
						            array('property' => 'border-radius', 'label' => esc_html__( 'Border Radius', 'ssc' ), 'selector' => '+:hover'),
					            ),
					            'Text Box' => array(
						            array('property' => 'text-align', 'label' => esc_html__( 'Text Align', 'ssc' ), 'selector' => '+:hover .islide'),
						            array('property' => 'vertical-align', 'label' => esc_html__('Vertical Align', 'ssc' ), 'selector' => '+:hover .islide'),
						            array('property' => 'background', 'selector' => '+:hover .islide'),
						            array('property' => 'display', 'label' => esc_html__( 'Display', 'ssc' ), 'selector' => '+:hover .islide'),
						            array('property' => 'float', 'label' => esc_html__( 'Float', 'ssc' ), 'selector' => '+:hover .islide'),
						            array('property' => 'width', 'label' => esc_html__( 'Width', 'ssc' ), 'selector' => '+:hover .islide'),
						            array('property' => 'height', 'label' => esc_html__( 'Height', 'ssc' ), 'selector' => '+:hover .islide'),
						            array('property' => 'box-shadow', 'label' => esc_html__( 'Box Shadow', 'ssc' ), 'selector' => '+:hover .islide'),
						            array('property' => 'opacity', 'label' => esc_html__( 'Opacity', 'ssc' ), 'selector' => '+:hover .islide'),
						            array('property' => 'margin', 'label' => esc_html__( 'Margin', 'ssc' ), 'selector' => '+:hover .islide'),
						            array('property' => 'padding', 'label' => esc_html__( 'Padding', 'ssc' ), 'selector' => '+:hover .islide'),
						            array('property' => 'border', 'label' => esc_html__( 'Border', 'ssc' ), 'selector' => '+:hover .islide'),
						            array('property' => 'border-radius', 'label' => esc_html__( 'Border Radius', 'ssc' ), 'selector' => '+:hover .islide'),
					            ),
					            'Title'	=> array(
						            array('property' => 'color', 'label' => esc_html__('Color', 'ssc' ), 'selector' => '+:hover .content-title'),
						            array('property' => 'background-color', 'selector' => '+:hover .content-title'),
						            array('property' => 'background-color', 'label' => esc_html__('BG Color Hover', 'ssc' ), 'selector' => '.content-title:hover'),
						            array('property' => 'font-family', 'label' => esc_html__('Font Family', 'ssc' ), 'selector' => '+:hover .content-title'),
						            array('property' => 'font-size', 'label' => esc_html__('Font Size', 'ssc' ), 'selector' => '+:hover .content-title'),
						            array('property' => 'line-height', 'label' => esc_html__('Line Height', 'ssc' ), 'selector' => '+:hover .content-title'),
						            array('property' => 'font-weight', 'label' => esc_html__('Font Weight', 'ssc' ), 'selector' => '+:hover .content-title'),
						            array('property' => 'text-transform', 'label' => esc_html__('Text Transform', 'ssc' ), 'selector' => '+:hover .content-title'),
						            array('property' => 'text-align', 'label' => esc_html__('Text Align', 'ssc' ), 'selector' => '+:hover .content-title'),
						            array('property' => 'margin', 'label' => esc_html__('Margin', 'ssc' ), 'selector' => '+:hover .content-title'),
						            array('property' => 'padding', 'label' => esc_html__('Padding', 'ssc' ), 'selector' => '+:hover .content-title'),
					            ),
					            'Subtitle'	=> array(
						            array('property' => 'color', 'label' => esc_html__('Color', 'ssc' ), 'selector' => '+:hover .content-subtitle'),
						            array('property' => 'background-color', 'selector' => '+:hover .content-subtitle'),
						            array('property' => 'background-color', 'label' => esc_html__('BG Color Hover', 'ssc' ), 'selector' => '.content-subtitle:hover'),
						            array('property' => 'font-family', 'label' => esc_html__('Font Family', 'ssc' ), 'selector' => '+:hover .content-subtitle'),
						            array('property' => 'font-size', 'label' => esc_html__('Font Size', 'ssc' ), 'selector' => '+:hover .content-subtitle'),
						            array('property' => 'line-height', 'label' => esc_html__('Line Height', 'ssc' ), 'selector' => '+:hover .content-subtitle'),
						            array('property' => 'font-weight', 'label' => esc_html__('Font Weight', 'ssc' ), 'selector' => '+:hover .content-subtitle'),
						            array('property' => 'text-transform', 'label' => esc_html__('Text Transform', 'ssc' ), 'selector' => '+:hover .content-subtitle'),
						            array('property' => 'text-align', 'label' => esc_html__('Text Align', 'ssc' ), 'selector' => '+:hover .content-subtitle'),
						            array('property' => 'margin', 'label' => esc_html__('Margin', 'ssc' ), 'selector' => '+:hover .content-subtitle'),
						            array('property' => 'padding', 'label' => esc_html__('Padding', 'ssc' ), 'selector' => '+:hover .content-subtitle'),
					            ),
					            'Desc'	=> array(
						            array('property' => 'color', 'label' => esc_html__('Color', 'ssc' ), 'selector' => '+:hover .content-desc'),
						            array('property' => 'font-family', 'label' => esc_html__('Font Family', 'ssc' ), 'selector' => '+:hover .content-desc'),
						            array('property' => 'font-size', 'label' => esc_html__('Font Size', 'ssc' ), 'selector' => '+:hover .content-desc'),
						            array('property' => 'line-height', 'label' => esc_html__('Line Height', 'ssc' ), 'selector' => '+:hover .content-desc'),
						            array('property' => 'font-weight', 'label' => esc_html__('Font Weight', 'ssc' ), 'selector' => '+:hover .content-desc'),
						            array('property' => 'text-transform', 'label' => esc_html__('Text Transform', 'ssc' ), 'selector' => '+:hover .content-desc'),
						            array('property' => 'text-align', 'label' => esc_html__('Text Align', 'ssc' ), 'selector' => '+:hover .content-desc'),
						            array('property' => 'padding', 'label' => esc_html__('Padding', 'ssc' ), 'selector' => '+:hover .content-desc'),
						            array('property' => 'margin', 'label' => esc_html__('Margin', 'ssc' ), 'selector' => '+:hover .content-desc'),
					            ),
					            'Image'	=> array(
						            array('property' => 'background-color', 'label' => esc_html__('Background Color', 'ssc' ), 'selector' => '+:hover img'),
						            array('property' => 'width', 'label' => esc_html__( 'Width', 'ssc' ), 'selector' => '+:hover img'),
						            array('property' => 'border', 'label' => esc_html__('Border', 'ssc' ), 'selector' => '+:hover img'),
						            array('property' => 'border-radius', 'label' => esc_html__('Border Radius', 'ssc' ), 'selector' => '+:hover img'),
						            array('property' => 'margin', 'label' => esc_html__('Margin', 'ssc' ), 'selector' => '+:hover img'),
						            array('property' => 'padding', 'label' => esc_html__('Padding', 'ssc' ), 'selector' => '+:hover img'),
					            ),
					            'Overlay' => array(
						            array('property' => 'text-align', 'label' => esc_html__( 'Text Align', 'ssc' ), 'selector' => '+:hover figure:before'),
						            array('property' => 'vertical-align', 'label' => esc_html__('Vertical Align', 'ssc' ), 'selector' => '+:hover figure:before'),
						            array('property' => 'background', 'selector' => '+:hover figure:before'),
						            array('property' => 'display', 'label' => esc_html__( 'Display', 'ssc' ), 'selector' => '+:hover figure:before'),
						            array('property' => 'float', 'label' => esc_html__( 'Float', 'ssc' ), 'selector' => '+:hover figure:before'),
						            array('property' => 'width', 'label' => esc_html__( 'Width', 'ssc' ), 'selector' => '+:hover figure:before'),
						            array('property' => 'height', 'label' => esc_html__( 'Height', 'ssc' ), 'selector' => '+:hover figure:before'),
						            array('property' => 'box-shadow', 'label' => esc_html__( 'Box Shadow', 'ssc' ), 'selector' => '+:hover figure:before'),
						            array('property' => 'opacity', 'label' => esc_html__( 'Opacity', 'ssc' ), 'selector' => '+:hover figure:before'),
						            array('property' => 'margin', 'label' => esc_html__( 'Margin', 'ssc' ), 'selector' => '+:hover figure:before'),
						            array('property' => 'padding', 'label' => esc_html__( 'Padding', 'ssc' ), 'selector' => '+:hover figure:before'),
						            array('property' => 'border', 'label' => esc_html__( 'Border', 'ssc' ), 'selector' => '+:hover figure:before'),
						            array('property' => 'border-radius', 'label' => esc_html__( 'Border Radius', 'ssc' ), 'selector' => '+:hover figure:before'),
					            ),

					            'Button' => array(
						            array('property' => 'color', 'label' => esc_html__('Button Color', 'ssc' ), 'selector' => '+:hover .content-button a'),
						            array('property' => 'color', 'label' => esc_html__('Button Hover Color', 'ssc' ), 'selector' => '.content-button:hover a'),
						            array('property' => 'background-color', 'label' => esc_html__('Button BG Color', 'ssc' ), 'selector' => '+:hover .content-button a'),
						            array('property' => 'background-color', 'label' => esc_html__('Button BG Hover Color', 'ssc' ), 'selector' => '.content-button:hover a'),
						            array('property' => 'font-family', 'label' => esc_html__('Font Family', 'ssc' ), 'selector' => '+:hover .content-button a'),
						            array('property' => 'font-size', 'label' => esc_html__('Font Size', 'ssc' ), 'selector' => '+:hover .content-button a'),
						            array('property' => 'line-height', 'label' => esc_html__('Line Height', 'ssc' ), 'selector' => '+:hover .content-button a'),
						            array('property' => 'font-weight', 'label' => esc_html__('Font Weight', 'ssc' ), 'selector' => '+:hover .content-button a'),
						            array('property' => 'text-transform', 'label' => esc_html__('Text Transform', 'ssc' ), 'selector' => '+:hover .content-button a'),
						            array('property' => 'border', 'label' => esc_html__('Button Border', 'ssc' ), 'selector' => '+:hover .content-button a'),
						            array('property' => 'border-color', 'label' => esc_html__('Button Border Color Hover', 'ssc' ), 'selector' => '.content-button:hover a'),
						            array('property' => 'border-radius', 'label' => esc_html__('Border Radius', 'ssc' ), 'selector' => '+:hover .content-button a'),
						            array('property' => 'margin', 'label' => esc_html__('Margin', 'ssc' ), 'selector' => '+:hover .content-button a'),
						            array('property' => 'padding', 'label' => esc_html__('Padding', 'ssc' ), 'selector' => '+:hover .content-button a')
					            ),
					            'Social Box' => array(
						            array('property' => 'text-align', 'label' => esc_html__( 'Text Align', 'ssc' ), 'selector' => '+:hover .content-socials'),
						            array('property' => 'vertical-align', 'label' => esc_html__('Vertical Align', 'ssc' ), 'selector' => '+:hover .content-socials'),
						            array('property' => 'background', 'selector' => '+:hover .content-socials'),
						            array('property' => 'background', 'selector' => ':hover .content-socials'),
						            array('property' => 'display', 'label' => esc_html__( 'Display', 'ssc' ), 'selector' => '+:hover .content-socials'),
						            array('property' => 'float', 'label' => esc_html__( 'Float', 'ssc' ), 'selector' => '+:hover .content-socials'),
						            array('property' => 'width', 'label' => esc_html__( 'Width', 'ssc' ), 'selector' => '+:hover .content-socials'),
						            array('property' => 'height', 'label' => esc_html__( 'Height', 'ssc' ), 'selector' => '+:hover .content-socials'),
						            array('property' => 'box-shadow', 'label' => esc_html__( 'Box Shadow', 'ssc' ), 'selector' => '+:hover .content-socials'),
						            array('property' => 'opacity', 'label' => esc_html__( 'Opacity', 'ssc' ), 'selector' => '+:hover .content-socials'),
						            array('property' => 'margin', 'label' => esc_html__( 'Margin', 'ssc' ), 'selector' => '+:hover .content-socials'),
						            array('property' => 'padding', 'label' => esc_html__( 'Padding', 'ssc' ), 'selector' => '+:hover .content-socials'),
						            array('property' => 'border', 'label' => esc_html__( 'Border', 'ssc' ), 'selector' => '+:hover .content-socials'),
						            array('property' => 'border-radius', 'label' => esc_html__( 'Border Radius', 'ssc' ), 'selector' => '+:hover .content-socials'),
					            ),
					            'Social'	=> array(
						            array('property' => 'color', 'label' => esc_html__('Icon Color', 'ssc' ), 'selector' => '+:hover .content-socials a i'),
						            array('property' => 'color', 'label' => esc_html__('Icon Color Hover', 'ssc' ), 'selector' => '+:hover .content-socials a:hover i'),
						            array('property' => 'background-color', 'selector' => '+:hover .content-socials a'),
						            array('property' => 'background-color', 'label' => esc_html__('BG Color Hover', 'ssc' ), 'selector' => '+:hover .content-socials a:hover'),
						            array('property' => 'font-size', 'label' => esc_html__('Font Size', 'ssc' ), 'selector' => '+:hover .content-socials a'),
						            array('property' => 'line-height', 'label' => esc_html__('Line Height', 'ssc' ), 'selector' => '+:hover .content-socials a'),
						            array('property' => 'width', 'label' => esc_html__('Width', 'ssc' ), 'selector' => '+:hover .content-socials a'),
						            array('property' => 'display', 'label' => esc_html__('Display', 'ssc' ), 'selector' => '+:hover .content-socials a'),
						            array('property' => 'float', 'label' => esc_html__('Float', 'ssc' ), 'selector' => '+:hover .content-socials a'),
						            array('property' => 'height', 'label' => esc_html__('Height', 'ssc' ), 'selector' => '+:hover .content-socials a'),
						            array('property' => 'box-shadow', 'label' => esc_html__( 'Box Shadow', 'ssc' ), 'selector' => '+:hover .content-socials a'),
						            array('property' => 'text-align', 'label' => esc_html__('Text Align', 'ssc' ), 'selector' => '+:hover .content-socials a'),
						            array('property' => 'border', 'label' => esc_html__('Border', 'ssc' ), 'selector' => '+:hover .content-socials a'),
						            array('property' => 'border-color', 'label' => esc_html__('Border Color Hover', 'ssc' ), 'selector' => '+:hover .content-socials a:hover'),
						            array('property' => 'border-radius', 'label' => esc_html__('Border Radius', 'ssc' ), 'selector' => '+:hover .content-socials a'),
						            array('property' => 'margin', 'label' => esc_html__('Margin', 'ssc' ), 'selector' => '+:hover .content-socials a'),
						            array('property' => 'padding', 'label' => esc_html__('Padding', 'ssc' ), 'selector' => '+:hover .content-socials a'),
					            ),
					            'Social SVG'	=> array(
						            array('property' => 'fill', 'label' => esc_html__('Icon Color', 'ssc' ), 'selector' => '+:hover .content-socials a svg'),
						            array('property' => 'fill', 'label' => esc_html__('Icon Color Hover', 'ssc' ), 'selector' => '+:hover .content-socials a:hover svg'),
						            array('property' => 'margin', 'label' => esc_html__('Margin', 'ssc' ), 'selector' => '+:hover .content-socials a svg'),
						            array('property' => 'padding', 'label' => esc_html__('Padding', 'ssc' ), 'selector' => '+:hover .content-socials a svg'),

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
        )
    ));
}

// Register Shortcode

function ssc_team_shortcode($atts, $content = null) {
	$title = $subtitle = $desc = $image = $custom_class = $data_img = $data_title = $data_desc = $data_subtitle = $img_size = $data_socials = $socials = $data_button = $show_button = $img_link = $hover_effect = $blockscale = $monocolored = $data_socials_to_open = '';
	$layout = '1';
    extract(shortcode_atts(array(
	    'layout' => '',
	    'image' => '',
	    'img_size' => '',
	    'title' => '',
	    'subtitle' => '',
	    'desc' => '',
	    'monocolored' => '',
	    'strength' => '',
	    'hover_effect' => '',
	    'button_text' => '',
	    'button_link' => '',
	    'custom_class' => '',
	    'facebook' => '',
	    'twitter' => '',
	    'google_plus' => '',
	    'linkedin' => '',
	    'pinterest' => '',
	    'flickr' => '',
	    'instagram' => '',
	    'dribbble' => '',
	    'reddit' => '',
	    'email' => '',

    ) , $atts));
    $output = '';
    
    /*
    echo '<pre>';
    print_r($atts);
	echo '</pre>';
    */

	$size_array = array('full', 'medium', 'large', 'thumbnail');
	$master_class	= apply_filters( 'kc-el-class', $atts );

	$master_class[] = 'team-' . $layout;

if ( $custom_class != '' )
	$master_class[] = $custom_class;

if ( !empty( $image ) ) {

	if( in_array( $img_size, $size_array ) ){
		$image_data       = image_downsize( $image, $img_size );
		$img_link        = $image_data[0];
	}else{
		$image_full_width = image_downsize( $image, 'full' );
		$img_link 	= kc_tools::createImageSize( $image_full_width[0], $img_size );
	}

	$data_img .= '';

}

if ( !empty( $title ) ) {
	$data_title .= '<div class="content-title">'.$title.'</div>';
}

if ( !empty( $desc ) ) {
	$data_desc .= '<div class="content-desc">'.$desc.'</div>';
}

if ( !empty( $subtitle ) ) {
	$data_subtitle .= '<div class="content-subtitle">'.$subtitle.'</div>';
}

if ( $show_button == 'yes' ) {

	if ( !empty( $button_link ) ) {
		$button_link_text = explode( '|', $button_link );
		$button_link = $button_link_text[0];
	}

	if( empty($button_text) )
		$button_text = __( 'Read more', 'ssc' );

	$data_button .= '<div class="content-button"><a href="'. $button_link .'">'. $button_text .'</a></div>';

}

$social_list = array(
	'facebook' => 'facebook-f',
	'twitter' => 'twitter',
	'google_plus' => 'google_plus-g',
	'linkedin' => 'linkedin-in',
	'pinterest' => 'pinterest',
	'flickr' => 'flickr',
	'instagram' => 'instagram',
	'dribbble' => 'dribbble',
	'reddit' => 'reddit-square',
	'email' => 'envelope',
);


foreach( $social_list as $acc => $icon ){
	if( !empty( $atts[$acc]) && $atts[$acc] != '__empty__' ){
		$icon = str_replace( array('_', 'email') , array( '-', 'envelope') , $icon);
		if ($icon == 'envelope') {
			$data_socials .= '<a href="' . $atts[$acc] . '" target="_blank"><i class="fa-' . $icon . '"></i></a>';
			$data_socials_to_open .= '<a href="' . $atts[$acc] . '" target="_blank"><i class="fa-' . $icon . '"></i></a>';
		}else {
			$data_socials .= '<a href="' . $atts[$acc] . '" target="_blank"><i class="fab-' . $icon . '"></i></a>';
			$data_socials_to_open .= '<a href="' . $atts[$acc] . '" target="_blank"><i class="fab-' . $icon . '"></i></a>';
		}
	}
}

if( !empty( $data_socials) )
	$data_socials = '<div class="content-socials">' . $data_socials . '</div>';

if( !empty( $data_socials_to_open) )
	$data_socials_to_open = '' . $data_socials_to_open . '';

	if ($monocolored === '' ) {$strength = '0%';}
	if ($strength === '' ) {$strength = '0%';}
	if ($hover_effect == 'scaleupall') {$blockscale = 'scaleupall';}
	$imgout ='<img src="'. $img_link .'" alt="'.$title.' '.$subtitle.'" style="-webkit-filter: grayscale('.$strength.');filter: grayscale('.$strength.');">';

// Create master class, return as an array
    $master_class = apply_filters( 'kc-el-class', $atts );

    $output .= '<div class="ssc_team  type'.$layout.' mo'.$monocolored.' '.$hover_effect.' '.$blockscale.' '.implode( ' ', $master_class ) . '">';

	switch ( $layout ) {
	case '2':
	case '6':
		$output .= '<figure>'.$imgout.'</figure>'.'<div class="islide">'.$data_socials.$data_title.$data_subtitle.$data_desc.'</div>';
		break;
	case '3':
	case '9':
		$output .= '<figure>'.$imgout.'</figure>'.'<div class="islide">'.$data_title.$data_subtitle.$data_desc.$data_socials.'</div>';
		break;
	case '4':
		$output .= '<figure>'.$imgout.'</figure>'.'<div class="islide">'.$data_title.$data_subtitle.$data_desc.$data_socials.'</div>';
			break;
	case '5':
	case '7':
			$output .= '<figure>'.$imgout.'</figure>'.'<div class="islide">'.$data_title.$data_subtitle.$data_desc.$data_socials.'</div>';
			break;
		case '8':
			$output .= '<figure>'.$imgout.'</figure>'.'<div class="islide">'.$data_socials.'<div class="posa">'.$data_title.$data_subtitle.$data_desc.'</div></div>';
			break;
	case '10':
		$output .= '<figure>'.$imgout.'</figure>'.'<div class="islide"><div class="content-socials"><div class="opener"><a href="#"><svg height="512pt" viewBox="-21 0 512 512" width="512pt" xmlns="http://www.w3.org/2000/svg"><path d="m453.332031 85.332031c0 38.292969-31.039062 69.335938-69.332031 69.335938s-69.332031-31.042969-69.332031-69.335938c0-38.289062 31.039062-69.332031 69.332031-69.332031s69.332031 31.042969 69.332031 69.332031zm0 0"/><path d="m384 170.667969c-47.0625 0-85.332031-38.273438-85.332031-85.335938 0-47.058593 38.269531-85.332031 85.332031-85.332031s85.332031 38.273438 85.332031 85.332031c0 47.0625-38.269531 85.335938-85.332031 85.335938zm0-138.667969c-29.417969 0-53.332031 23.9375-53.332031 53.332031 0 29.398438 23.914062 53.335938 53.332031 53.335938s53.332031-23.9375 53.332031-53.335938c0-29.394531-23.914062-53.332031-53.332031-53.332031zm0 0"/><path d="m453.332031 426.667969c0 38.289062-31.039062 69.332031-69.332031 69.332031s-69.332031-31.042969-69.332031-69.332031c0-38.292969 31.039062-69.335938 69.332031-69.335938s69.332031 31.042969 69.332031 69.335938zm0 0"/><path d="m384 512c-47.0625 0-85.332031-38.273438-85.332031-85.332031 0-47.0625 38.269531-85.335938 85.332031-85.335938s85.332031 38.273438 85.332031 85.335938c0 47.058593-38.269531 85.332031-85.332031 85.332031zm0-138.667969c-29.417969 0-53.332031 23.9375-53.332031 53.335938 0 29.394531 23.914062 53.332031 53.332031 53.332031s53.332031-23.9375 53.332031-53.332031c0-29.398438-23.914062-53.335938-53.332031-53.335938zm0 0"/><path d="m154.667969 256c0 38.292969-31.042969 69.332031-69.335938 69.332031-38.289062 0-69.332031-31.039062-69.332031-69.332031s31.042969-69.332031 69.332031-69.332031c38.292969 0 69.335938 31.039062 69.335938 69.332031zm0 0"/><path d="m85.332031 341.332031c-47.058593 0-85.332031-38.269531-85.332031-85.332031s38.273438-85.332031 85.332031-85.332031c47.0625 0 85.335938 38.269531 85.335938 85.332031s-38.273438 85.332031-85.335938 85.332031zm0-138.664062c-29.417969 0-53.332031 23.933593-53.332031 53.332031s23.914062 53.332031 53.332031 53.332031c29.421875 0 53.335938-23.933593 53.335938-53.332031s-23.914063-53.332031-53.335938-53.332031zm0 0"/><path d="m135.703125 245.761719c-7.425781 0-14.636719-3.863281-18.5625-10.773438-5.824219-10.21875-2.238281-23.253906 7.980469-29.101562l197.949218-112.851563c10.21875-5.867187 23.253907-2.28125 29.101563 7.976563 5.824219 10.21875 2.238281 23.253906-7.980469 29.101562l-197.953125 112.851563c-3.328125 1.898437-6.953125 2.796875-10.535156 2.796875zm0 0"/><path d="m333.632812 421.761719c-3.585937 0-7.210937-.898438-10.539062-2.796875l-197.953125-112.851563c-10.21875-5.824219-13.800781-18.859375-7.976563-29.101562 5.800782-10.238281 18.855469-13.84375 29.097657-7.976563l197.953125 112.851563c10.21875 5.824219 13.800781 18.859375 7.976562 29.101562-3.945312 6.910157-11.15625 10.773438-18.558594 10.773438zm0 0"/></svg></a></div><div class="opened">' . $data_socials_to_open . '</div></div>'.$data_title.$data_subtitle.$data_desc.'</div>';
	break;
	default:
		$output .= '<figure>'.$imgout.$data_socials.'</figure>'.'<div class="islide">'.$data_title.$data_subtitle.$data_desc.'</div>';
		break;
	}




	$output .= '</div>';
    return $output;
}

add_shortcode('ssc_team', 'ssc_team_shortcode');

