<?php



add_action('init', 'ssc_benefit_params', 99);

/**
 * Additional functions
 */

/**
 * Additional functions
 */


function ssc_benefit_params() {
    global $kc;

     $kc->add_map(array(
        'ssc_benefit' => array(
            'name' => esc_html__( 'Benefits Icon Grid', 'ssc' ),
            'description' => esc_html__( 'It displays block with up to 5 icons and 1 description section to show your benefits', 'ssc' ),
            'icon' => 'kc-icon-box ssc-icon-10',
            'is_container' => true,
            'category' => 'SecretLab',
            'css_box' => true,
            'params' => array(
                esc_html__( 'General', 'ssc' ) => array(
                    array(
                        'name' => 'template',
                        'label' => esc_html__( 'Select Template', 'ssc' ),
                        'type' => 'radio_image',  // USAGE TEXT TYPE
                        'options' => array(
                            '1'	=> plugin_dir_url( __FILE__ ) .'../images/benefits1.gif',
                            '2'	=> plugin_dir_url( __FILE__ ) .'../images/benefits2.gif',
                            '3'	=> plugin_dir_url( __FILE__ ) .'../images/benefits3.gif',
                        ),
                        'value' => '1', // remove this if you do not need a default content
                    ),
                    array(
                        'name' => 'title',
                        'label' => esc_html__( 'Title for description block', 'ssc' ),
                        'type' => 'text',
                        'admin_label' => true,
                        'value' => esc_html__( 'Why Us?', 'ssc' ),
                    ),
                    array(
                        'name' => 'content',
                        'label' => esc_html__( 'Description text', 'ssc' ),
                        'type' => 'textarea_html',
                        'value' => esc_html__( 'We offer synergistic online products, social media marketing and dynamic SEO strategies', 'ssc' ),
                    ),
                    array(
                        'name' => 'el_class',
                        'label' => esc_html__( 'Extra Class Name', 'ssc' ),
                        'type' => 'text',
                        'description' => esc_html__( 'If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your CSS file.', 'ssc' ),
                        'value' => ''
                    ) ,
                    
                ),
                esc_html__( 'Benefit 1', 'ssc' ) => array(
                    array(
                        'name' => 'icondesc1',
                        'label' => esc_html__( 'Description of benefit #1', 'ssc' ),
                        'type' => 'text',
                        'value' => esc_html__( 'Global Reach', 'ssc' ),
                    ),
                    array(
                        'name' => 'icon1',
                        'label' => esc_html__( 'Select Icon', 'ssc' ),
                        'type' => 'icon_picker',
                    ),
                    array(
                        'name' => 'bgr1',
                        'label' => esc_html__( 'Background Image', 'ssc' ),
                        'type' => 'attach_image',
                        'description' => esc_html__( 'Recommended size is 400 x 350px', 'ssc' ),
                    ),
                ),
                esc_html__( 'Benefit 2', 'ssc' ) => array(
                    array(
                        'name' => 'icondesc2',
                        'label' => esc_html__( 'Description of benefit #2', 'ssc' ),
                        'type' => 'text',
                        'value' => esc_html__( 'Best Prices', 'ssc' ),
                    ),
                    array(
                        'name' => 'icon2',
                        'label' => esc_html__( 'Select Icon', 'ssc' ),
                        'type' => 'icon_picker',

                    ),
                    array(
                        'name' => 'bgr2',
                        'label' => esc_html__( 'Background Image', 'ssc' ),
                        'type' => 'attach_image',
                        'description' => esc_html__( 'Recommended size is 400 x 350px', 'ssc' ),
                    ),
                ),
                esc_html__( 'Benefit 3', 'ssc' ) => array(
                    array(
                        'name' => 'icondesc3',
                        'label' => esc_html__( 'Description of benefit #3', 'ssc' ),
                        'type' => 'text',
                        'value' => esc_html__( 'Big Experience', 'ssc' ),
                    ),
                    array(
                        'name' => 'icon3',
                        'label' => esc_html__( 'Select Icon', 'ssc' ),
                        'type' => 'icon_picker',
                    ),
                    array(
                        'name' => 'bgr3',
                        'label' => esc_html__( 'Background Image', 'ssc' ),
                        'type' => 'attach_image',
                        'description' => esc_html__( 'Recommended size is 400 x 350px', 'ssc' ),
                    ),
                ),
                esc_html__( 'Benefit 4', 'ssc' ) => array(
                    array(
                        'name' => 'icondesc4',
                        'label' => esc_html__( 'Description of benefit #4', 'ssc' ),
                        'type' => 'text',
                        'value' => esc_html__( 'Convenience', 'ssc' ),
                    ),
                    array(
                        'name' => 'icon4',
                        'label' => esc_html__( 'Select Icon', 'ssc' ),
                        'type' => 'icon_picker',
                    ),
                    array(
                        'name' => 'bgr4',
                        'label' => esc_html__( 'Background Image', 'ssc' ),
                        'type' => 'attach_image',
                        'description' => esc_html__( 'Recommended size is 400 x 350px', 'ssc' ),
                    ),
                ),
                esc_html__( 'Benefit 5', 'ssc' ) => array(
                    array(
                        'name' => 'icondesc5',
                        'label' => esc_html__( 'Description of benefit #5', 'ssc' ),
                        'type' => 'text',
                        'value' => esc_html__( 'Team Strength', 'ssc' ),
                    ),
                    array(
                        'name' => 'icon5',
                        'label' => esc_html__( 'Select Icon', 'ssc' ),
                        'type' => 'icon_picker',
                    ),
                    array(
                        'name' => 'bgr5',
                        'label' => esc_html__( 'Background Image', 'ssc' ),
                        'type' => 'attach_image',
                        'description' => esc_html__( 'Recommended size is 400 x 350px', 'ssc' ),
                    ),
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
                                'screens' => "any",
                                'Main Background' => array(
                                    array('property' => 'background'),
                                    array('property' => 'height', 'label' => esc_html__( 'Height', 'ssc' )),
                                    array('property' => 'margin', 'label' => esc_html__( 'Margin', 'ssc' )),
                                ),
                                'Description Box' => array(
                                    array('property' => 'background', 'selector' => '.why'),
                                    array('property' => 'width', 'label' => esc_html__( 'Width', 'ssc' ), 'selector' => '.why'),
                                    array('property' => 'height', 'label' => esc_html__( 'Height', 'ssc' ), 'selector' => '.why'),
                                    array('property' => 'box-shadow', 'label' => esc_html__( 'Box Shadow', 'ssc' ), 'selector' => '.why'),
                                    array('property' => 'opacity', 'label' => esc_html__( 'Opacity', 'ssc' ), 'selector' => '.why'),
                                    array('property' => 'margin', 'label' => esc_html__( 'Margin', 'ssc' ), 'selector' => '.why'),
                                    array('property' => 'padding', 'label' => esc_html__( 'Padding', 'ssc' ), 'selector' => '.why'),
                                    array('property' => 'border', 'label' => esc_html__( 'Border', 'ssc' ), 'selector' => '.why'),
                                    array('property' => 'border-radius', 'label' => esc_html__( 'Border Radius', 'ssc' ), 'selector' => '.why'),
                                ),
                                'Title' => array(
                                    array('property' => 'color', 'label' => esc_html__( 'Color', 'ssc' ), 'selector' => '.why h2'),
                                    array('property' => 'font-size', 'label' => esc_html__( 'Font Size', 'ssc' ), 'selector' => '.why h2'),
                                    array('property' => 'line-height', 'label' => esc_html__( 'Line Height', 'ssc' ), 'selector' => '.why h2'),
                                    array('property' => 'font-weight', 'label' => esc_html__( 'Font Weight', 'ssc' ), 'selector' => '.why h2'),
                                    array('property' => 'font-style', 'label' => esc_html__( 'Font Style', 'ssc' ), 'selector' => '.why h2'),
                                    array('property' => 'font-family', 'label' => esc_html__( 'Font Family', 'ssc' ), 'selector' => '.why h2'),
                                    array('property' => 'text-align', 'label' => esc_html__( 'Text Align', 'ssc' ), 'selector' => '.why h2'),
                                    array('property' => 'text-transform', 'label' => esc_html__( 'Text Transform', 'ssc' ), 'selector' => '.why h2'),
                                    array('property' => 'text-decoration', 'label' => esc_html__( 'Text Decoration', 'ssc' ), 'selector' => '.why h2'),
                                    array('property' => 'background', 'selector' => '.why h2'),
                                    array('property' => 'box-shadow', 'label' => esc_html__( 'Box Shadow', 'ssc' ), 'selector' => '.why h2'),
                                    array('property' => 'opacity', 'label' => esc_html__( 'Opacity', 'ssc' ), 'selector' => '.why h2'),
                                    array('property' => 'margin', 'label' => esc_html__( 'Margin', 'ssc' ), 'selector' => '.why h2'),
                                    array('property' => 'padding', 'label' => esc_html__( 'Padding', 'ssc' ), 'selector' => '.why h2'),
                                    array('property' => 'border', 'label' => esc_html__( 'Border', 'ssc' ), 'selector' => '.why h2'),
                                    array('property' => 'border-radius', 'label' => esc_html__( 'Border Radius', 'ssc' ), 'selector' => '.why h2'),
                                ),
                                'Description' => array(
                                    array('property' => 'color', 'label' => esc_html__( 'Color', 'ssc' ), 'selector' => '.why .headinginfo'),
                                    array('property' => 'font-size', 'label' => esc_html__( 'Font Size', 'ssc' ), 'selector' => '.why .headinginfo'),
                                    array('property' => 'line-height', 'label' => esc_html__( 'Line Height', 'ssc' ), 'selector' => '.why .headinginfo'),
                                    array('property' => 'font-weight', 'label' => esc_html__( 'Font Weight', 'ssc' ), 'selector' => '.why .headinginfo'),
                                    array('property' => 'font-style', 'label' => esc_html__( 'Font Style', 'ssc' ), 'selector' => '.why .headinginfo'),
                                    array('property' => 'font-family', 'label' => esc_html__( 'Font Family', 'ssc' ), 'selector' => '.why .headinginfo'),
                                    array('property' => 'text-align', 'label' => esc_html__( 'Text Align', 'ssc' ), 'selector' => '.why .headinginfo'),
                                    array('property' => 'text-transform', 'label' => esc_html__( 'Text Transform', 'ssc' ), 'selector' => '.why .headinginfo'),
                                    array('property' => 'text-decoration', 'label' => esc_html__( 'Text Decoration', 'ssc' ), 'selector' => '.why .headinginfo'),
                                    array('property' => 'background', 'selector' => '.why .headinginfo'),
                                    array('property' => 'margin', 'label' => esc_html__( 'Margin', 'ssc' ), 'selector' => '.why .headinginfo'),
                                    array('property' => 'padding', 'label' => esc_html__( 'Padding', 'ssc' ), 'selector' => '.why .headinginfo'),
                                    array('property' => 'border', 'label' => esc_html__( 'Border', 'ssc' ), 'selector' => '.why .headinginfo'),
                                    array('property' => 'border-radius', 'label' => esc_html__( 'Border Radius', 'ssc' ), 'selector' => '.why .headinginfo'),
                                ),

                                'Benefits Title' => array(
                                    array('property' => 'color', 'label' => esc_html__( 'Color', 'ssc' ), 'selector' => '.beniconblock b'),
                                    array('property' => 'font-size', 'label' => esc_html__( 'Font Size', 'ssc' ), 'selector' => '.beniconblock b'),
                                    array('property' => 'line-height', 'label' => esc_html__( 'Line Height', 'ssc' ), 'selector' => '.beniconblock b'),
                                    array('property' => 'font-weight', 'label' => esc_html__( 'Font Weight', 'ssc' ), 'selector' => '.beniconblock b'),
                                    array('property' => 'font-style', 'label' => esc_html__( 'Font Style', 'ssc' ), 'selector' => '.beniconblock b'),
                                    array('property' => 'font-family', 'label' => esc_html__( 'Font Family', 'ssc' ), 'selector' => '.beniconblock b'),
                                    array('property' => 'text-align', 'label' => esc_html__( 'Text Align', 'ssc' ), 'selector' => '.beniconblock b'),
                                    array('property' => 'text-transform', 'label' => esc_html__( 'Text Transform', 'ssc' ), 'selector' => '.beniconblock b'),
                                    array('property' => 'text-decoration', 'label' => esc_html__( 'Text Decoration', 'ssc' ), 'selector' => '.beniconblock b'),
                                    array('property' => 'background', 'selector' => '.beniconblock b'),
                                    array('property' => 'width', 'label' => esc_html__( 'Width', 'ssc' ), 'selector' => '.beniconblock b'),
                                    array('property' => 'height', 'label' => esc_html__( 'Height', 'ssc' ), 'selector' => '.beniconblock b'),
                                    array('property' => 'box-shadow', 'label' => esc_html__( 'Box Shadow', 'ssc' ), 'selector' => '.beniconblock b'),
                                    array('property' => 'opacity', 'label' => esc_html__( 'Opacity', 'ssc' ), 'selector' => '.beniconblock b'),
                                    array('property' => 'margin', 'label' => esc_html__( 'Margin', 'ssc' ), 'selector' => '.beniconblock b'),
                                    array('property' => 'padding', 'label' => esc_html__( 'Padding', 'ssc' ), 'selector' => '.beniconblock b'),
                                    array('property' => 'border', 'label' => esc_html__( 'Border', 'ssc' ), 'selector' => '.beniconblock b'),
                                    array('property' => 'border-radius', 'label' => esc_html__( 'Border Radius', 'ssc' ), 'selector' => '.beniconblock b'),
                                ),
                                'Benefits Box' => array(
                                    array('property' => 'color', 'label' => esc_html__( 'Icon Color', 'ssc' ), 'selector' => '.beniconblock i'),
                                    array('property' => 'font-size', 'label' => esc_html__( 'Icon Font Size', 'ssc' ), 'selector' => '.beniconblock i'),
                                    array('property' => 'line-height', 'label' => esc_html__( 'Icon Line Height', 'ssc' ), 'selector' => '.beniconblock i'),
                                    array('property' => 'background', 'selector' => '.rhombus'),
                                    array('property' => 'width', 'label' => esc_html__( 'Width', 'ssc' ), 'selector' => '.rhombus'),
                                    array('property' => 'height', 'label' => esc_html__( 'Height', 'ssc' ), 'selector' => '.rhombus'),
                                    array('property' => 'box-shadow', 'label' => esc_html__( 'Box Shadow', 'ssc' ), 'selector' => '.rhombus'),
                                    array('property' => 'opacity', 'label' => esc_html__( 'Opacity', 'ssc' ), 'selector' => '.rhombus'),
                                    array('property' => 'margin', 'label' => esc_html__( 'Margin', 'ssc' ), 'selector' => '.rhombus'),
                                    array('property' => 'padding', 'label' => esc_html__( 'Padding', 'ssc' ), 'selector' => '.rhombus'),
                                    array('property' => 'border', 'label' => esc_html__( 'Border', 'ssc' ), 'selector' => '.rhombus'),
                                    array('property' => 'border-radius', 'label' => esc_html__( 'Border Radius', 'ssc' ), 'selector' => '.rhombus'),
                                ),
                                'Benefits 1 Bgr' => array(
                                    array('property' => 'background', 'selector' => '.rhombus:nth-child(2) .bgr'),
                                ),
                                'Benefits 2 Bgr' => array(
                                    array('property' => 'background', 'selector' => '.rhombus:nth-child(3) .bgr'),
                                ),
                                'Benefits 3 Bgr' => array(
                                    array('property' => 'background', 'selector' => '.rhombus:nth-child(4) .bgr'),
                                ),
                                'Benefits 4 Bgr' => array(
                                    array('property' => 'background', 'selector' => '.rhombus:nth-child(5) .bgr'),
                                ),
                                'Benefits 5 Bgr' => array(
                                    array('property' => 'background', 'selector' => '.rhombus:nth-child(6) .bgr'),
                                ),
                            ),
                            array(
                                "screens" => "999,768,667,479",
                                'Main Background' => array(
                                    array('property' => 'background'),
                                    array('property' => 'height', 'label' => esc_html__( 'Height', 'ssc' )),
                                    array('property' => 'margin', 'label' => esc_html__( 'Margin', 'ssc' )),
                                ),
                                'Description Box' => array(
                                    array('property' => 'background', 'selector' => '.why'),
                                    array('property' => 'width', 'label' => esc_html__( 'Width', 'ssc' ), 'selector' => '.why'),
                                    array('property' => 'height', 'label' => esc_html__( 'Height', 'ssc' ), 'selector' => '.why'),
                                    array('property' => 'box-shadow', 'label' => esc_html__( 'Box Shadow', 'ssc' ), 'selector' => '.why'),
                                    array('property' => 'opacity', 'label' => esc_html__( 'Opacity', 'ssc' ), 'selector' => '.why'),
                                    array('property' => 'margin', 'label' => esc_html__( 'Margin', 'ssc' ), 'selector' => '.why'),
                                    array('property' => 'padding', 'label' => esc_html__( 'Padding', 'ssc' ), 'selector' => '.why'),
                                    array('property' => 'border', 'label' => esc_html__( 'Border', 'ssc' ), 'selector' => '.why'),
                                    array('property' => 'border-radius', 'label' => esc_html__( 'Border Radius', 'ssc' ), 'selector' => '.why'),
                                ),
                                'Title' => array(
                                    array('property' => 'color', 'label' => esc_html__( 'Color', 'ssc' ), 'selector' => '.why h2'),
                                    array('property' => 'font-size', 'label' => esc_html__( 'Font Size', 'ssc' ), 'selector' => '.why h2'),
                                    array('property' => 'line-height', 'label' => esc_html__( 'Line Height', 'ssc' ), 'selector' => '.why h2'),
                                    array('property' => 'font-weight', 'label' => esc_html__( 'Font Weight', 'ssc' ), 'selector' => '.why h2'),
                                    array('property' => 'font-style', 'label' => esc_html__( 'Font Style', 'ssc' ), 'selector' => '.why h2'),
                                    array('property' => 'font-family', 'label' => esc_html__( 'Font Family', 'ssc' ), 'selector' => '.why h2'),
                                    array('property' => 'text-align', 'label' => esc_html__( 'Text Align', 'ssc' ), 'selector' => '.why h2'),
                                    array('property' => 'text-transform', 'label' => esc_html__( 'Text Transform', 'ssc' ), 'selector' => '.why h2'),
                                    array('property' => 'text-decoration', 'label' => esc_html__( 'Text Decoration', 'ssc' ), 'selector' => '.why h2'),
                                    array('property' => 'background', 'selector' => '.why h2'),
                                    array('property' => 'box-shadow', 'label' => esc_html__( 'Box Shadow', 'ssc' ), 'selector' => '.why h2'),
                                    array('property' => 'opacity', 'label' => esc_html__( 'Opacity', 'ssc' ), 'selector' => '.why h2'),
                                    array('property' => 'margin', 'label' => esc_html__( 'Margin', 'ssc' ), 'selector' => '.why h2'),
                                    array('property' => 'padding', 'label' => esc_html__( 'Padding', 'ssc' ), 'selector' => '.why h2'),
                                    array('property' => 'border', 'label' => esc_html__( 'Border', 'ssc' ), 'selector' => '.why h2'),
                                    array('property' => 'border-radius', 'label' => esc_html__( 'Border Radius', 'ssc' ), 'selector' => '.why h2'),
                                ),
                                'Description' => array(
                                    array('property' => 'color', 'label' => esc_html__( 'Color', 'ssc' ), 'selector' => '.why .headinginfo'),
                                    array('property' => 'font-size', 'label' => esc_html__( 'Font Size', 'ssc' ), 'selector' => '.why .headinginfo'),
                                    array('property' => 'line-height', 'label' => esc_html__( 'Line Height', 'ssc' ), 'selector' => '.why .headinginfo'),
                                    array('property' => 'font-weight', 'label' => esc_html__( 'Font Weight', 'ssc' ), 'selector' => '.why .headinginfo'),
                                    array('property' => 'font-style', 'label' => esc_html__( 'Font Style', 'ssc' ), 'selector' => '.why .headinginfo'),
                                    array('property' => 'font-family', 'label' => esc_html__( 'Font Family', 'ssc' ), 'selector' => '.why .headinginfo'),
                                    array('property' => 'text-align', 'label' => esc_html__( 'Text Align', 'ssc' ), 'selector' => '.why .headinginfo'),
                                    array('property' => 'text-transform', 'label' => esc_html__( 'Text Transform', 'ssc' ), 'selector' => '.why .headinginfo'),
                                    array('property' => 'text-decoration', 'label' => esc_html__( 'Text Decoration', 'ssc' ), 'selector' => '.why .headinginfo'),
                                    array('property' => 'background', 'selector' => '.why .headinginfo'),
                                    array('property' => 'margin', 'label' => esc_html__( 'Margin', 'ssc' ), 'selector' => '.why .headinginfo'),
                                    array('property' => 'padding', 'label' => esc_html__( 'Padding', 'ssc' ), 'selector' => '.why .headinginfo'),
                                    array('property' => 'border', 'label' => esc_html__( 'Border', 'ssc' ), 'selector' => '.why .headinginfo'),
                                    array('property' => 'border-radius', 'label' => esc_html__( 'Border Radius', 'ssc' ), 'selector' => '.why .headinginfo'),
                                ),

                                'Benefits Title' => array(
                                    array('property' => 'color', 'label' => esc_html__( 'Color', 'ssc' ), 'selector' => '.beniconblock b'),
                                    array('property' => 'font-size', 'label' => esc_html__( 'Font Size', 'ssc' ), 'selector' => '.beniconblock b'),
                                    array('property' => 'line-height', 'label' => esc_html__( 'Line Height', 'ssc' ), 'selector' => '.beniconblock b'),
                                    array('property' => 'font-weight', 'label' => esc_html__( 'Font Weight', 'ssc' ), 'selector' => '.beniconblock b'),
                                    array('property' => 'font-style', 'label' => esc_html__( 'Font Style', 'ssc' ), 'selector' => '.beniconblock b'),
                                    array('property' => 'font-family', 'label' => esc_html__( 'Font Family', 'ssc' ), 'selector' => '.beniconblock b'),
                                    array('property' => 'text-align', 'label' => esc_html__( 'Text Align', 'ssc' ), 'selector' => '.beniconblock b'),
                                    array('property' => 'text-transform', 'label' => esc_html__( 'Text Transform', 'ssc' ), 'selector' => '.beniconblock b'),
                                    array('property' => 'text-decoration', 'label' => esc_html__( 'Text Decoration', 'ssc' ), 'selector' => '.beniconblock b'),
                                    array('property' => 'background', 'selector' => '.beniconblock b'),
                                    array('property' => 'width', 'label' => esc_html__( 'Width', 'ssc' ), 'selector' => '.beniconblock b'),
                                    array('property' => 'height', 'label' => esc_html__( 'Height', 'ssc' ), 'selector' => '.beniconblock b'),
                                    array('property' => 'box-shadow', 'label' => esc_html__( 'Box Shadow', 'ssc' ), 'selector' => '.beniconblock b'),
                                    array('property' => 'opacity', 'label' => esc_html__( 'Opacity', 'ssc' ), 'selector' => '.beniconblock b'),
                                    array('property' => 'margin', 'label' => esc_html__( 'Margin', 'ssc' ), 'selector' => '.beniconblock b'),
                                    array('property' => 'padding', 'label' => esc_html__( 'Padding', 'ssc' ), 'selector' => '.beniconblock b'),
                                    array('property' => 'border', 'label' => esc_html__( 'Border', 'ssc' ), 'selector' => '.beniconblock b'),
                                    array('property' => 'border-radius', 'label' => esc_html__( 'Border Radius', 'ssc' ), 'selector' => '.beniconblock b'),
                                ),
                                'Benefits Box' => array(
                                    array('property' => 'color', 'label' => esc_html__( 'Icon Color', 'ssc' ), 'selector' => '.beniconblock i'),
                                    array('property' => 'font-size', 'label' => esc_html__( 'Icon Font Size', 'ssc' ), 'selector' => '.beniconblock i'),
                                    array('property' => 'line-height', 'label' => esc_html__( 'Icon Line Height', 'ssc' ), 'selector' => '.beniconblock i'),
                                    array('property' => 'background', 'selector' => '.rhombus'),
                                    array('property' => 'width', 'label' => esc_html__( 'Width', 'ssc' ), 'selector' => '.rhombus'),
                                    array('property' => 'height', 'label' => esc_html__( 'Height', 'ssc' ), 'selector' => '.rhombus'),
                                    array('property' => 'box-shadow', 'label' => esc_html__( 'Box Shadow', 'ssc' ), 'selector' => '.rhombus'),
                                    array('property' => 'opacity', 'label' => esc_html__( 'Opacity', 'ssc' ), 'selector' => '.rhombus'),
                                    array('property' => 'margin', 'label' => esc_html__( 'Margin', 'ssc' ), 'selector' => '.rhombus'),
                                    array('property' => 'padding', 'label' => esc_html__( 'Padding', 'ssc' ), 'selector' => '.rhombus'),
                                    array('property' => 'border', 'label' => esc_html__( 'Border', 'ssc' ), 'selector' => '.rhombus'),
                                    array('property' => 'border-radius', 'label' => esc_html__( 'Border Radius', 'ssc' ), 'selector' => '.rhombus'),
                                ),
                                'Benefits 1 Bgr' => array(
                                    array('property' => 'background', 'selector' => '.rhombus:nth-child(2) .bgr'),
                                ),
                                'Benefits 2 Bgr' => array(
                                    array('property' => 'background', 'selector' => '.rhombus:nth-child(3) .bgr'),
                                ),
                                'Benefits 3 Bgr' => array(
                                    array('property' => 'background', 'selector' => '.rhombus:nth-child(4) .bgr'),
                                ),
                                'Benefits 4 Bgr' => array(
                                    array('property' => 'background', 'selector' => '.rhombus:nth-child(5) .bgr'),
                                ),
                                'Benefits 5 Bgr' => array(
                                    array('property' => 'background', 'selector' => '.rhombus:nth-child(6) .bgr'),
                                ),

                            )
                        )
                    )
                ),
//Hover
                esc_html__( 'hover', 'ssc' ) => array(
                    array(
                        'name' => 'my-css-hover',
                        'label' => esc_html__( 'Hover', 'ssc' ),
                        'type' => 'css',
                        'value' => '', // remove this if you do not need a default content
                        'description' => esc_html__( 'Styles for hover effect', 'ssc' ),
                        'options' => array(
                            array(
                                'screens' => "any",
                                'Main Background' => array(
                                    array('property' => 'background', 'selector' => ':hover'),
                                    array('property' => 'height', 'label' => esc_html__( 'Height', 'ssc' ), 'selector' => ':hover'),
                                    array('property' => 'margin', 'label' => esc_html__( 'Margin', 'ssc' ), 'selector' => ':hover'),
                                ),
                                'Description Box' => array(
                                    array('property' => 'background', 'selector' => '.why:hover'),
                                    array('property' => 'width', 'label' => esc_html__( 'Width', 'ssc' ), 'selector' => '.why:hover'),
                                    array('property' => 'height', 'label' => esc_html__( 'Height', 'ssc' ), 'selector' => '.why:hover'),
                                    array('property' => 'box-shadow', 'label' => esc_html__( 'Box Shadow', 'ssc' ), 'selector' => '.why:hover'),
                                    array('property' => 'opacity', 'label' => esc_html__( 'Opacity', 'ssc' ), 'selector' => '.why:hover'),
                                    array('property' => 'margin', 'label' => esc_html__( 'Margin', 'ssc' ), 'selector' => '.why:hover'),
                                    array('property' => 'padding', 'label' => esc_html__( 'Padding', 'ssc' ), 'selector' => '.why:hover'),
                                    array('property' => 'border', 'label' => esc_html__( 'Border', 'ssc' ), 'selector' => '.why:hover'),
                                    array('property' => 'border-radius', 'label' => esc_html__( 'Border Radius', 'ssc' ), 'selector' => '.why:hover'),
                                ),
                                'Title' => array(
                                    array('property' => 'color', 'label' => esc_html__( 'Color', 'ssc' ), 'selector' => '.why:hover h2'),
                                    array('property' => 'font-size', 'label' => esc_html__( 'Font Size', 'ssc' ), 'selector' => '.why:hover h2'),
                                    array('property' => 'line-height', 'label' => esc_html__( 'Line Height', 'ssc' ), 'selector' => '.why:hover h2'),
                                    array('property' => 'font-weight', 'label' => esc_html__( 'Font Weight', 'ssc' ), 'selector' => '.why:hover h2'),
                                    array('property' => 'font-style', 'label' => esc_html__( 'Font Style', 'ssc' ), 'selector' => '.why:hover h2'),
                                    array('property' => 'font-family', 'label' => esc_html__( 'Font Family', 'ssc' ), 'selector' => '.why:hover h2'),
                                    array('property' => 'text-align', 'label' => esc_html__( 'Text Align', 'ssc' ), 'selector' => '.why:hover h2'),
                                    array('property' => 'text-transform', 'label' => esc_html__( 'Text Transform', 'ssc' ), 'selector' => '.why:hover h2'),
                                    array('property' => 'text-decoration', 'label' => esc_html__( 'Text Decoration', 'ssc' ), 'selector' => '.why:hover h2'),
                                    array('property' => 'background', 'selector' => '.why:hover h2'),
                                    array('property' => 'box-shadow', 'label' => esc_html__( 'Box Shadow', 'ssc' ), 'selector' => '.why:hover h2'),
                                    array('property' => 'opacity', 'label' => esc_html__( 'Opacity', 'ssc' ), 'selector' => '.why:hover h2'),
                                    array('property' => 'margin', 'label' => esc_html__( 'Margin', 'ssc' ), 'selector' => '.why:hover h2'),
                                    array('property' => 'padding', 'label' => esc_html__( 'Padding', 'ssc' ), 'selector' => '.why:hover h2'),
                                    array('property' => 'border', 'label' => esc_html__( 'Border', 'ssc' ), 'selector' => '.why:hover h2'),
                                    array('property' => 'border-radius', 'label' => esc_html__( 'Border Radius', 'ssc' ), 'selector' => '.why:hover h2'),
                                ),
                                'Description' => array(
                                    array('property' => 'color', 'label' => esc_html__( 'Color', 'ssc' ), 'selector' => '.why:hover .headinginfo'),
                                    array('property' => 'font-size', 'label' => esc_html__( 'Font Size', 'ssc' ), 'selector' => '.why:hover .headinginfo'),
                                    array('property' => 'line-height', 'label' => esc_html__( 'Line Height', 'ssc' ), 'selector' => '.why:hover .headinginfo'),
                                    array('property' => 'font-weight', 'label' => esc_html__( 'Font Weight', 'ssc' ), 'selector' => '.why:hover .headinginfo'),
                                    array('property' => 'font-style', 'label' => esc_html__( 'Font Style', 'ssc' ), 'selector' => '.why:hover .headinginfo'),
                                    array('property' => 'font-family', 'label' => esc_html__( 'Font Family', 'ssc' ), 'selector' => '.why:hover .headinginfo'),
                                    array('property' => 'text-align', 'label' => esc_html__( 'Text Align', 'ssc' ), 'selector' => '.why:hover .headinginfo'),
                                    array('property' => 'text-transform', 'label' => esc_html__( 'Text Transform', 'ssc' ), 'selector' => '.why:hover .headinginfo'),
                                    array('property' => 'text-decoration', 'label' => esc_html__( 'Text Decoration', 'ssc' ), 'selector' => '.why:hover .headinginfo'),
                                    array('property' => 'background', 'selector' => '.why:hover .headinginfo'),
                                    array('property' => 'margin', 'label' => esc_html__( 'Margin', 'ssc' ), 'selector' => '.why:hover .headinginfo'),
                                    array('property' => 'padding', 'label' => esc_html__( 'Padding', 'ssc' ), 'selector' => '.why:hover .headinginfo'),
                                    array('property' => 'border', 'label' => esc_html__( 'Border', 'ssc' ), 'selector' => '.why:hover .headinginfo'),
                                    array('property' => 'border-radius', 'label' => esc_html__( 'Border Radius', 'ssc' ), 'selector' => '.why:hover .headinginfo'),
                                ),

                                'Benefits Title' => array(
                                    array('property' => 'color', 'label' => esc_html__( 'Color', 'ssc' ), 'selector' => '.beniconblock:hover b'),
                                    array('property' => 'font-size', 'label' => esc_html__( 'Font Size', 'ssc' ), 'selector' => '.beniconblock:hover b'),
                                    array('property' => 'line-height', 'label' => esc_html__( 'Line Height', 'ssc' ), 'selector' => '.beniconblock:hover b'),
                                    array('property' => 'font-weight', 'label' => esc_html__( 'Font Weight', 'ssc' ), 'selector' => '.beniconblock:hover b'),
                                    array('property' => 'font-style', 'label' => esc_html__( 'Font Style', 'ssc' ), 'selector' => '.beniconblock:hover b'),
                                    array('property' => 'font-family', 'label' => esc_html__( 'Font Family', 'ssc' ), 'selector' => '.beniconblock:hover b'),
                                    array('property' => 'text-align', 'label' => esc_html__( 'Text Align', 'ssc' ), 'selector' => '.beniconblock:hover b'),
                                    array('property' => 'text-transform', 'label' => esc_html__( 'Text Transform', 'ssc' ), 'selector' => '.beniconblock:hover b'),
                                    array('property' => 'text-decoration', 'label' => esc_html__( 'Text Decoration', 'ssc' ), 'selector' => '.beniconblock:hover b'),
                                    array('property' => 'background', 'selector' => '.beniconblock:hover b'),
                                    array('property' => 'width', 'label' => esc_html__( 'Width', 'ssc' ), 'selector' => '.beniconblock:hover b'),
                                    array('property' => 'height', 'label' => esc_html__( 'Height', 'ssc' ), 'selector' => '.beniconblock:hover b'),
                                    array('property' => 'box-shadow', 'label' => esc_html__( 'Box Shadow', 'ssc' ), 'selector' => '.beniconblock:hover b'),
                                    array('property' => 'opacity', 'label' => esc_html__( 'Opacity', 'ssc' ), 'selector' => '.beniconblock:hover b'),
                                    array('property' => 'margin', 'label' => esc_html__( 'Margin', 'ssc' ), 'selector' => '.beniconblock:hover b'),
                                    array('property' => 'padding', 'label' => esc_html__( 'Padding', 'ssc' ), 'selector' => '.beniconblock:hover b'),
                                    array('property' => 'border', 'label' => esc_html__( 'Border', 'ssc' ), 'selector' => '.beniconblock:hover b'),
                                    array('property' => 'border-radius', 'label' => esc_html__( 'Border Radius', 'ssc' ), 'selector' => '.beniconblock:hover b'),
                                ),
                                'Benefits Box' => array(
                                    array('property' => 'color', 'label' => esc_html__( 'Icon Color', 'ssc' ), 'selector' => '.beniconblock i'),
                                    array('property' => 'font-size', 'label' => esc_html__( 'Icon Font Size', 'ssc' ), 'selector' => '.beniconblock i'),
                                    array('property' => 'line-height', 'label' => esc_html__( 'Icon Line Height', 'ssc' ), 'selector' => '.beniconblock i'),
                                    array('property' => 'background', 'selector' => '.rhombus:hover'),
                                    array('property' => 'width', 'label' => esc_html__( 'Width', 'ssc' ), 'selector' => '.rhombus:hover'),
                                    array('property' => 'height', 'label' => esc_html__( 'Height', 'ssc' ), 'selector' => '.rhombus:hover'),
                                    array('property' => 'box-shadow', 'label' => esc_html__( 'Box Shadow', 'ssc' ), 'selector' => '.rhombus:hover'),
                                    array('property' => 'opacity', 'label' => esc_html__( 'Opacity', 'ssc' ), 'selector' => '.rhombus:hover'),
                                    array('property' => 'margin', 'label' => esc_html__( 'Margin', 'ssc' ), 'selector' => '.rhombus:hover'),
                                    array('property' => 'padding', 'label' => esc_html__( 'Padding', 'ssc' ), 'selector' => '.rhombus:hover'),
                                    array('property' => 'border', 'label' => esc_html__( 'Border', 'ssc' ), 'selector' => '.rhombus:hover'),
                                    array('property' => 'border-radius', 'label' => esc_html__( 'Border Radius', 'ssc' ), 'selector' => '.rhombus:hover'),
                                ),
                                'Benefits 1 Bgr' => array(
                                    array('property' => 'background', 'selector' => '.rhombus:nth-child(2) .bgr:hover'),
                                ),
                                'Benefits 2 Bgr' => array(
                                    array('property' => 'background', 'selector' => '.rhombus:nth-child(3) .bgr:hover'),
                                ),
                                'Benefits 3 Bgr' => array(
                                    array('property' => 'background', 'selector' => '.rhombus:nth-child(4) .bgr:hover'),
                                ),
                                'Benefits 4 Bgr' => array(
                                    array('property' => 'background', 'selector' => '.rhombus:nth-child(5) .bgr:hover'),
                                ),
                                'Benefits 5 Bgr' => array(
                                    array('property' => 'background', 'selector' => '.rhombus:nth-child(6) .bgr:hover'),
                                ),
                            ),
                        )
                    )
                ),

            )
        )
    ));
}

// Register Shortcode

function ssc_benefit_shortcode($atts, $content = null) {
    extract(shortcode_atts(array(
        'title' => '',
        'content' => '',

        'icondesc1' => '',
        'icon1' => '',
        'bgr1' => '',
        'icondesc2' => '',
        'icon2' => '',
        'bgr2' => '',
        'icondesc3' => '',
        'icon3' => '',
        'bgr3' => '',
        'icondesc4' => '',
        'icon4' => '',
        'bgr4' => '',
        'icondesc5' => '',
        'icon5' => '',
        'bgr5' => '',

        'el_class'          => '',
    ) , $atts));


    $bgr1i = $bgr2i = $bgr3i = $bgr4i = $bgr5i = '';
    $bgr1i = image_downsize( $bgr1, 'full', false );
    $bgr2i = image_downsize( $bgr2, 'full', false );
    $bgr3i = image_downsize( $bgr3, 'full', false );
    $bgr4i = image_downsize( $bgr4, 'full', false );
    $bgr5i = image_downsize( $bgr5, 'full', false );

    $output = '';
    extract($atts);

    $wrp_classes = apply_filters( 'kc-el-class', $atts );
    if ( $template == '1' ) {
        $output .= '<div class="benefits ' . implode(' ', $wrp_classes) . ' ' . $el_class . '">';
        $output .= '<div class="container">';

        if ($title != '') {
            $output .= '<div class="why">
							<div class="headinginfo">
								<h2>' . $title . '</h2>' . $content . '
							</div>
						</div>';
        }

        if ($icondesc1 != '') {
            $output .= '<div class="rhombus beniconsize1">
						<div class="tralign">
							<img class="imgbgr" alt="' . $icondesc1 . '" src="' . $bgr1i[0] . '">
                            <div class="beniconblock bgr bico o0-o02"><i class="' . $icon1 . '"></i><b>' . $icondesc1 . '</b>
                            </div>
					    </div>
					</div>';
        }
        if ($icondesc2 != '') {
            $output .= '<div class="rhombus beniconsize2">
						<div class="tralign">
							<img class="imgbgr" alt="' . $icondesc2 . '" src="' . $bgr2i[0] . '">
                            <div class="beniconblock bgr bico o0-o02"><i class="' . $icon2 . '"></i><b>' . $icondesc2 . '</b>
                            </div>
					    </div>
					</div>';
        }
        if ($icondesc3 != '') {
            $output .= '<div class="rhombus beniconsize3">
						<div class="tralign">
							<img class="imgbgr" alt="' . $icondesc3 . '" src="' . $bgr3i[0] . '">
                            <div class="beniconblock bgr bico o0-o02"><i class="' . $icon3 . '"></i><b>' . $icondesc3 . '</b>
                            </div>
					    </div>
					</div>';
        }
        if ($icondesc4 != '') {
            $output .= '<div class="rhombus beniconsize4">
						<div class="tralign">
							<img class="imgbgr" alt="' . $icondesc4 . '" src="' . $bgr4i[0] . '">
                            <div class="beniconblock bgr bico o0-o02"><i class="' . $icon4 . '"></i><b>' . $icondesc4 . '</b>
                            </div>
					    </div>
					</div>';
        }
        if ($icondesc5 != '') {
            $output .= '<div class="rhombus beniconsize5">
						<div class="tralign">
							<img class="imgbgr" alt="' . $icondesc5 . '" src="' . $bgr5i[0] . '">
                            <div class="beniconblock bgr bico o0-o02"><i class="' . $icon5 . '"></i><b>' . $icondesc5 . '</b>
                            </div>
					    </div>
					</div>';
        }

        $output .= '</div>';
        $output .= '<div class="clearfix"></div></div>';
    }
    if ( $template == '2' ) {
        $output .= '<div class="benefits2 ' . implode(' ', $wrp_classes) . ' ' . $el_class . '">';
        $output .= '<div class="container">';

        if ($title != '') {
            $output .= '<div class="why">
							<div class="headinginfo">
								<h2>' . $title . '</h2>' . $content . '
							</div>
						</div>';
        }

        if ($icondesc1 != '') {
            $output .= '<div class="rhombus beniconsize1">
						<div class="tralign">
							<img class="imgbgr" alt="' . $icondesc1 . '" src="' . $bgr1i[0] . '">
                            <div class="beniconblock bgr bico o0-o02"><i class="' . $icon1 . '"></i><b>' . $icondesc1 . '</b>
                            </div>
					    </div>
					</div>';
        }
        if ($icondesc2 != '') {
            $output .= '<div class="rhombus beniconsize2">
						<div class="tralign">
							<img class="imgbgr" alt="' . $icondesc2 . '" src="' . $bgr2i[0] . '">
                            <div class="beniconblock bgr bico o0-o02"><i class="' . $icon2 . '"></i><b>' . $icondesc2 . '</b>
                            </div>
					    </div>
					</div>';
        }
        if ($icondesc3 != '') {
            $output .= '<div class="rhombus beniconsize3">
						<div class="tralign">
							<img class="imgbgr" alt="' . $icondesc3 . '" src="' . $bgr3i[0] . '">
                            <div class="beniconblock bgr bico o0-o02"><i class="' . $icon3 . '"></i><b>' . $icondesc3 . '</b>
                            </div>
					    </div>
					</div>';
        }
        if ($icondesc4 != '') {
            $output .= '<div class="rhombus beniconsize4">
						<div class="tralign">
							<img class="imgbgr" alt="' . $icondesc4 . '" src="' . $bgr4i[0] . '">
                            <div class="beniconblock bgr bico o0-o02"><i class="' . $icon4 . '"></i><b>' . $icondesc4 . '</b>
                            </div>
					    </div>
					</div>';
        }
        if ($icondesc5 != '') {
            $output .= '<div class="rhombus beniconsize5">
						<div class="tralign">
							<img class="imgbgr" alt="' . $icondesc5 . '" src="' . $bgr5i[0] . '">
                            <div class="beniconblock bgr bico o0-o02"><i class="' . $icon5 . '"></i><b>' . $icondesc5 . '</b>
                            </div>
					    </div>
					</div>';
        }

        $output .= '</div>';
        $output .= '<div class="clearfix"></div></div>';
    }
    if ( $template == '3' ) {
        $output .= '<div class="benefits3 ' . implode(' ', $wrp_classes) . ' ' . $el_class . '">';
        $output .= '<div class="container">';

        if ($title != '') {
            $output .= '<div class="why">
							<div class="headinginfo">
								<h2>' . $title . '</h2>' . $content . '
							</div>
						</div>';
        }

        if ($icondesc1 != '') {
            $output .= '<div class="rhombus beniconsize1">
						<div class="tralign">
							<img class="imgbgr" alt="' . $icondesc1 . '" src="' . $bgr1i[0] . '">
                            <div class="beniconblock bgr bico o0-o02"><i class="' . $icon1 . '"></i><b>' . $icondesc1 . '</b>
                            </div>
					    </div>
					</div>';
        }
        if ($icondesc2 != '') {
            $output .= '<div class="rhombus beniconsize2">
						<div class="tralign">
							<img class="imgbgr" alt="' . $icondesc2 . '" src="' . $bgr2i[0] . '">
                            <div class="beniconblock bgr bico o0-o02"><i class="' . $icon2 . '"></i><b>' . $icondesc2 . '</b>
                            </div>
					    </div>
					</div>';
        }
        if ($icondesc3 != '') {
            $output .= '<div class="rhombus beniconsize3">
						<div class="tralign">
							<img class="imgbgr" alt="' . $icondesc3 . '" src="' . $bgr3i[0] . '">
                            <div class="beniconblock bgr bico o0-o02"><i class="' . $icon3 . '"></i><b>' . $icondesc3 . '</b>
                            </div>
					    </div>
					</div>';
        }
        if ($icondesc4 != '') {
            $output .= '<div class="rhombus beniconsize4">
						<div class="tralign">
							<img class="imgbgr" alt="' . $icondesc4 . '" src="' . $bgr4i[0] . '">
                            <div class="beniconblock bgr bico o0-o02"><i class="' . $icon4 . '"></i><b>' . $icondesc4 . '</b>
                            </div>
					    </div>
					</div>';
        }
        if ($icondesc5 != '') {
            $output .= '<div class="rhombus beniconsize5">
						<div class="tralign">
							<img class="imgbgr" alt="' . $icondesc5 . '" src="' . $bgr5i[0] . '">
                            <div class="beniconblock bgr bico o0-o02"><i class="' . $icon5 . '"></i><b>' . $icondesc5 . '</b>
                            </div>
					    </div>
					</div>';
        }

        $output .= '</div>';
        $output .= '<div class="clearfix"></div></div>';
    }

    return $output;
}

add_shortcode('ssc_benefit', 'ssc_benefit_shortcode');

