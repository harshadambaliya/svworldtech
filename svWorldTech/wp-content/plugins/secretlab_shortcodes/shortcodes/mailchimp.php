<?php


require_once( ABSPATH . 'wp-admin/includes/plugin.php' );

if( is_plugin_active( 'yikes-inc-easy-mailchimp-extender/yikes-inc-easy-mailchimp-extender.php' ) ){
add_action('init', 'ssc_mailchimp_params', 99);

/**
 * Additional functions
 */
function ssc_mailchimp_get_forms_array() {

    $arr = array( 0 => 'none');

    
        $form_interface = yikes_easy_mailchimp_extender_get_form_interface();
        $all_forms = $form_interface->get_all_forms();
        if (count($all_forms) > 0) {
            foreach ($all_forms as $forms) {
                $arr[$forms['id']] = $forms['form_name'];
            }
        }
    

    if (count($arr) == 1) {
        $arr = array( 0 => esc_html__( 'The Theme support Easy Forms for MailChimp plugin, but couldn\'t find forms. Install the plugin to choose the form to display.', 'ssc' ) );
    }

    return $arr;
}
/**
 * Additional functions
 */


function ssc_mailchimp_params() {
    global $kc;

     $kc->add_map(array(
        'ssc_mailchimp' => array(
            'name' => esc_html__( 'MailChimp Forms', 'ssc' ),
            'description' => esc_html__( 'It displays forms from Easy Forms for MailChimp plugin', 'ssc' ),
            'icon' => 'kc-icon-box ssc-icon-4',
            'category' => 'SecretLab',
            'css_box' => true,
            'params' => array(
                esc_html__( 'General', 'ssc' ) => array(
                    array(
                        'name' => 'form_id',
                        'label' => esc_html__( 'Select a subscription form', 'ssc' ),
                        'type' => 'select',
                        'options' => ssc_mailchimp_get_forms_array(),
                        'value' => '',
                        'description' => esc_html__( 'Pick form to display', 'ssc' ),
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
                                'Box' => array(
                                    array('property' => 'text-align', 'label' => esc_html__( 'Text Align', 'ssc' )),
                                    array('property' => 'display', 'label' => esc_html__( 'Display', 'ssc' )),
                                    array('property' => 'float', 'label' => esc_html__( 'Position left/right', 'ssc' )),
                                    array('property' => 'background'),
                                    array('property' => 'width', 'label' => esc_html__( 'Width', 'ssc' )),
                                    array('property' => 'height', 'label' => esc_html__( 'Height', 'ssc' )),
                                    array('property' => 'box-shadow', 'label' => esc_html__( 'Box Shadow', 'ssc' )),
                                    array('property' => 'opacity', 'label' => esc_html__( 'Opacity', 'ssc' )),
                                    array('property' => 'margin', 'label' => esc_html__( 'Margin', 'ssc' )),
                                    array('property' => 'padding', 'label' => esc_html__( 'Padding', 'ssc' )),
                                    array('property' => 'border', 'label' => esc_html__( 'Border', 'ssc' )),
                                    array('property' => 'border-radius', 'label' => esc_html__( 'Border Radius', 'ssc' )),
                                ),
                                'input' => array(
                                    array('property' => 'color', 'label' => esc_html__( 'Color', 'ssc' ), 'selector' => 'input'),
                                    array('property' => 'font-size', 'label' => esc_html__( 'Font Size', 'ssc' ), 'selector' => 'input'),
                                    array('property' => 'line-height', 'label' => esc_html__( 'Line Height', 'ssc' ), 'selector' => 'input'),
                                    array('property' => 'font-weight', 'label' => esc_html__( 'Font Weight', 'ssc' ), 'selector' => 'input'),
                                    array('property' => 'font-style', 'label' => esc_html__( 'Font Style', 'ssc' ), 'selector' => 'input'),
                                    array('property' => 'font-family', 'label' => esc_html__( 'Font Family', 'ssc' ), 'selector' => 'input'),
                                    array('property' => 'text-align', 'label' => esc_html__( 'Text Align', 'ssc' ), 'selector' => 'input'),
                                    array('property' => 'text-transform', 'label' => esc_html__( 'Text Transform', 'ssc' ), 'selector' => 'input'),
                                    array('property' => 'text-decoration', 'label' => esc_html__( 'Text Decoration', 'ssc' ), 'selector' => 'input'),
                                    array('property' => 'background', 'selector' => 'input'),
                                    array('property' => 'width', 'label' => esc_html__( 'Width', 'ssc' ), 'selector' => 'input'),
                                    array('property' => 'height', 'label' => esc_html__( 'Height', 'ssc' ), 'selector' => 'input'),
                                    array('property' => 'box-shadow', 'label' => esc_html__( 'Box Shadow', 'ssc' ), 'selector' => 'input'),
                                    array('property' => 'opacity', 'label' => esc_html__( 'Opacity', 'ssc' ), 'selector' => 'input'),
                                    array('property' => 'margin', 'label' => esc_html__( 'Margin', 'ssc' ), 'selector' => 'input'),
                                    array('property' => 'padding', 'label' => esc_html__( 'Padding', 'ssc' ), 'selector' => 'input'),
                                    array('property' => 'border', 'label' => esc_html__( 'Border', 'ssc' ), 'selector' => 'input'),
                                    array('property' => 'border-radius', 'label' => esc_html__( 'Border Radius', 'ssc' ), 'selector' => 'input'),
                                ),

                                //Submit group
                                'Submit' => array(
                                    array('property' => 'color', 'label' => esc_html__( 'Color', 'ssc' ), 'selector' => 'button'),
                                    array('property' => 'font-size', 'label' => esc_html__( 'Font Size', 'ssc' ), 'selector' => 'button'),
                                    array('property' => 'line-height', 'label' => esc_html__( 'Line Height', 'ssc' ), 'selector' => 'button'),
                                    array('property' => 'font-weight', 'label' => esc_html__( 'Font Weight', 'ssc' ), 'selector' => 'button'),
                                    array('property' => 'font-style', 'label' => esc_html__( 'Font Style', 'ssc' ), 'selector' => 'button'),
                                    array('property' => 'font-family', 'label' => esc_html__( 'Font Family', 'ssc' ), 'selector' => 'button'),
                                    array('property' => 'text-align', 'label' => esc_html__( 'Text Align', 'ssc' ), 'selector' => 'button'),
                                    array('property' => 'text-transform', 'label' => esc_html__( 'Text Transform', 'ssc' ), 'selector' => 'button'),
                                    array('property' => 'text-decoration', 'label' => esc_html__( 'Text Decoration', 'ssc' ), 'selector' => 'button'),
                                    array('property' => 'background', 'selector' => 'button'),
                                    array('property' => 'width', 'label' => esc_html__( 'Button Width', 'ssc' ), 'selector' => 'button'),
                                    array('property' => 'width', 'label' => esc_html__( 'Wrapper Width', 'ssc' ), 'selector' => 'body .yikes-easy-mc-form .submit-button-inline-label'),
                                    array('property' => 'height', 'label' => esc_html__( 'Height', 'ssc' ), 'selector' => 'button'),
                                    array('property' => 'float', 'label' => esc_html__( 'Float', 'ssc' ), 'selector' => 'button'),
                                    array('property' => 'display', 'label' => esc_html__( 'Display', 'ssc' ), 'selector' => 'button'),
                                    array('property' => 'box-shadow', 'label' => esc_html__( 'Box Shadow', 'ssc' ), 'selector' => 'button'),
                                    array('property' => 'opacity', 'label' => esc_html__( 'Opacity', 'ssc' ), 'selector' => 'button'),
                                    array('property' => 'margin', 'label' => esc_html__( 'Margin', 'ssc' ), 'selector' => 'button'),
                                    array('property' => 'padding', 'label' => esc_html__( 'Padding', 'ssc' ), 'selector' => 'button'),
                                    array('property' => 'border', 'label' => esc_html__( 'Border', 'ssc' ), 'selector' => 'button'),
                                    array('property' => 'border-radius', 'label' => esc_html__( 'Border Radius', 'ssc' ), 'selector' => 'button'),
                                ),


                                //label group
                                'Label' => array(
                                    array('property' => 'color', 'label' => esc_html__( 'Color', 'ssc' ), 'selector' => '.yikes-easy-mailchimp-contact_form_7-checkbox, .yikes-easy-mc-form label'),
                                    array('property' => 'font-size', 'label' => esc_html__( 'Font Size', 'ssc' ), 'selector' => '.yikes-easy-mailchimp-contact_form_7-checkbox, .yikes-easy-mc-form label'),
                                    array('property' => 'line-height', 'label' => esc_html__( 'Line Height', 'ssc' ), 'selector' => '.yikes-easy-mailchimp-contact_form_7-checkbox, .yikes-easy-mc-form label'),
                                    array('property' => 'font-weight', 'label' => esc_html__( 'Font Weight', 'ssc' ), 'selector' => '.yikes-easy-mailchimp-contact_form_7-checkbox, .yikes-easy-mc-form label'),
                                    array('property' => 'font-style', 'label' => esc_html__( 'Font Style', 'ssc' ), 'selector' => '.yikes-easy-mailchimp-contact_form_7-checkbox, .yikes-easy-mc-form label'),
                                    array('property' => 'font-family', 'label' => esc_html__( 'Font Family', 'ssc' ), 'selector' => '.yikes-easy-mailchimp-contact_form_7-checkbox, .yikes-easy-mc-form label'),
                                    array('property' => 'text-align', 'label' => esc_html__( 'Text Align', 'ssc' ), 'selector' => '.yikes-easy-mailchimp-contact_form_7-checkbox, .yikes-easy-mc-form label'),
                                    array('property' => 'text-transform', 'label' => esc_html__( 'Text Transform', 'ssc' ), 'selector' => '.yikes-easy-mailchimp-contact_form_7-checkbox, .yikes-easy-mc-form label'),
                                    array('property' => 'text-decoration', 'label' => esc_html__( 'Text Decoration', 'ssc' ), 'selector' => '.yikes-easy-mailchimp-contact_form_7-checkbox, .yikes-easy-mc-form label'),
                                    array('property' => 'background', 'selector' => '.yikes-easy-mailchimp-contact_form_7-checkbox, .yikes-easy-mc-form label'),
                                    array('property' => 'width', 'label' => esc_html__( 'Width', 'ssc' ), 'selector' => '.yikes-easy-mailchimp-contact_form_7-checkbox, .yikes-easy-mc-form label'),
                                    array('property' => 'height', 'label' => esc_html__( 'Height', 'ssc' ), 'selector' => '.yikes-easy-mailchimp-contact_form_7-checkbox, .yikes-easy-mc-form label'),
                                    array('property' => 'float', 'label' => esc_html__( 'Float', 'ssc' ), 'selector' => '.yikes-easy-mailchimp-contact_form_7-checkbox, .yikes-easy-mc-form label'),
                                    array('property' => 'display', 'label' => esc_html__( 'Display', 'ssc' ), 'selector' => '.yikes-easy-mailchimp-contact_form_7-checkbox, .yikes-easy-mc-form label'),
                                    array('property' => 'box-shadow', 'label' => esc_html__( 'Box Shadow', 'ssc' ), 'selector' => '.yikes-easy-mailchimp-contact_form_7-checkbox, .yikes-easy-mc-form label'),
                                    array('property' => 'opacity', 'label' => esc_html__( 'Opacity', 'ssc' ), 'selector' => '.yikes-easy-mailchimp-contact_form_7-checkbox, .yikes-easy-mc-form label'),
                                    array('property' => 'margin', 'label' => esc_html__( 'Margin', 'ssc' ), 'selector' => '.yikes-easy-mailchimp-contact_form_7-checkbox, .yikes-easy-mc-form label'),
                                    array('property' => 'padding', 'label' => esc_html__( 'Padding', 'ssc' ), 'selector' => '.yikes-easy-mailchimp-contact_form_7-checkbox, .yikes-easy-mc-form label'),
                                    array('property' => 'border', 'label' => esc_html__( 'Border', 'ssc' ), 'selector' => '.yikes-easy-mailchimp-contact_form_7-checkbox, .yikes-easy-mc-form label'),
                                    array('property' => 'border-radius', 'label' => esc_html__( 'Border Radius', 'ssc' ), 'selector' => '.yikes-easy-mailchimp-contact_form_7-checkbox, .yikes-easy-mc-form label'),
                                ),
                            ),
                            array(
                                "screens" => "1024,999,767,479",
                                'Box' => array(
                                    array('property' => 'text-align', 'label' => esc_html__( 'Text Align', 'ssc' )),
                                    array('property' => 'display', 'label' => esc_html__( 'Display', 'ssc' )),
                                    array('property' => 'float', 'label' => esc_html__( 'Position left/right', 'ssc' )),
                                    array('property' => 'background'),
                                    array('property' => 'width', 'label' => esc_html__( 'Width', 'ssc' )),
                                    array('property' => 'height', 'label' => esc_html__( 'Height', 'ssc' )),
                                    array('property' => 'box-shadow', 'label' => esc_html__( 'Box Shadow', 'ssc' )),
                                    array('property' => 'opacity', 'label' => esc_html__( 'Opacity', 'ssc' )),
                                    array('property' => 'margin', 'label' => esc_html__( 'Margin', 'ssc' )),
                                    array('property' => 'padding', 'label' => esc_html__( 'Padding', 'ssc' )),
                                    array('property' => 'border', 'label' => esc_html__( 'Border', 'ssc' )),
                                    array('property' => 'border-radius', 'label' => esc_html__( 'Border Radius', 'ssc' )),
                                ),
                                'input' => array(
                                    array('property' => 'color', 'label' => esc_html__( 'Color', 'ssc' ), 'selector' => 'input'),
                                    array('property' => 'font-size', 'label' => esc_html__( 'Font Size', 'ssc' ), 'selector' => 'input'),
                                    array('property' => 'line-height', 'label' => esc_html__( 'Line Height', 'ssc' ), 'selector' => 'input'),
                                    array('property' => 'font-weight', 'label' => esc_html__( 'Font Weight', 'ssc' ), 'selector' => 'input'),
                                    array('property' => 'font-style', 'label' => esc_html__( 'Font Style', 'ssc' ), 'selector' => 'input'),
                                    array('property' => 'font-family', 'label' => esc_html__( 'Font Family', 'ssc' ), 'selector' => 'input'),
                                    array('property' => 'text-align', 'label' => esc_html__( 'Text Align', 'ssc' ), 'selector' => 'input'),
                                    array('property' => 'text-transform', 'label' => esc_html__( 'Text Transform', 'ssc' ), 'selector' => 'input'),
                                    array('property' => 'text-decoration', 'label' => esc_html__( 'Text Decoration', 'ssc' ), 'selector' => 'input'),
                                    array('property' => 'background', 'selector' => 'input'),
                                    array('property' => 'width', 'label' => esc_html__( 'Width', 'ssc' ), 'selector' => 'input'),
                                    array('property' => 'height', 'label' => esc_html__( 'Height', 'ssc' ), 'selector' => 'input'),
                                    array('property' => 'box-shadow', 'label' => esc_html__( 'Box Shadow', 'ssc' ), 'selector' => 'input'),
                                    array('property' => 'opacity', 'label' => esc_html__( 'Opacity', 'ssc' ), 'selector' => 'input'),
                                    array('property' => 'margin', 'label' => esc_html__( 'Margin', 'ssc' ), 'selector' => 'input'),
                                    array('property' => 'padding', 'label' => esc_html__( 'Padding', 'ssc' ), 'selector' => 'input'),
                                    array('property' => 'border', 'label' => esc_html__( 'Border', 'ssc' ), 'selector' => 'input'),
                                    array('property' => 'border-radius', 'label' => esc_html__( 'Border Radius', 'ssc' ), 'selector' => 'input'),
                                ),

                                //Submit group
                                'Submit' => array(
                                    array('property' => 'color', 'label' => esc_html__( 'Color', 'ssc' ), 'selector' => 'button'),
                                    array('property' => 'font-size', 'label' => esc_html__( 'Font Size', 'ssc' ), 'selector' => 'button'),
                                    array('property' => 'line-height', 'label' => esc_html__( 'Line Height', 'ssc' ), 'selector' => 'button'),
                                    array('property' => 'font-weight', 'label' => esc_html__( 'Font Weight', 'ssc' ), 'selector' => 'button'),
                                    array('property' => 'font-style', 'label' => esc_html__( 'Font Style', 'ssc' ), 'selector' => 'button'),
                                    array('property' => 'font-family', 'label' => esc_html__( 'Font Family', 'ssc' ), 'selector' => 'button'),
                                    array('property' => 'text-align', 'label' => esc_html__( 'Text Align', 'ssc' ), 'selector' => 'button'),
                                    array('property' => 'text-transform', 'label' => esc_html__( 'Text Transform', 'ssc' ), 'selector' => 'button'),
                                    array('property' => 'text-decoration', 'label' => esc_html__( 'Text Decoration', 'ssc' ), 'selector' => 'button'),
                                    array('property' => 'background', 'selector' => 'button'),
                                    array('property' => 'width', 'label' => esc_html__( 'Button Width', 'ssc' ), 'selector' => 'button'),
                                    array('property' => 'width', 'label' => esc_html__( 'Wrapper Width', 'ssc' ), 'selector' => 'body .yikes-easy-mc-form .submit-button-inline-label'),
                                    array('property' => 'height', 'label' => esc_html__( 'Height', 'ssc' ), 'selector' => 'button'),
                                    array('property' => 'float', 'label' => esc_html__( 'Float', 'ssc' ), 'selector' => 'button'),
                                    array('property' => 'display', 'label' => esc_html__( 'Display', 'ssc' ), 'selector' => 'button'),
                                    array('property' => 'box-shadow', 'label' => esc_html__( 'Box Shadow', 'ssc' ), 'selector' => 'button'),
                                    array('property' => 'opacity', 'label' => esc_html__( 'Opacity', 'ssc' ), 'selector' => 'button'),
                                    array('property' => 'margin', 'label' => esc_html__( 'Margin', 'ssc' ), 'selector' => 'button'),
                                    array('property' => 'padding', 'label' => esc_html__( 'Padding', 'ssc' ), 'selector' => 'button'),
                                    array('property' => 'border', 'label' => esc_html__( 'Border', 'ssc' ), 'selector' => 'button'),
                                    array('property' => 'border-radius', 'label' => esc_html__( 'Border Radius', 'ssc' ), 'selector' => 'button'),
                                ),


                                //label group
                                'Label' => array(
                                    array('property' => 'color', 'label' => esc_html__( 'Color', 'ssc' ), 'selector' => '.yikes-easy-mailchimp-contact_form_7-checkbox, .yikes-easy-mc-form label'),
                                    array('property' => 'font-size', 'label' => esc_html__( 'Font Size', 'ssc' ), 'selector' => '.yikes-easy-mailchimp-contact_form_7-checkbox, .yikes-easy-mc-form label'),
                                    array('property' => 'line-height', 'label' => esc_html__( 'Line Height', 'ssc' ), 'selector' => '.yikes-easy-mailchimp-contact_form_7-checkbox, .yikes-easy-mc-form label'),
                                    array('property' => 'font-weight', 'label' => esc_html__( 'Font Weight', 'ssc' ), 'selector' => '.yikes-easy-mailchimp-contact_form_7-checkbox, .yikes-easy-mc-form label'),
                                    array('property' => 'font-style', 'label' => esc_html__( 'Font Style', 'ssc' ), 'selector' => '.yikes-easy-mailchimp-contact_form_7-checkbox, .yikes-easy-mc-form label'),
                                    array('property' => 'font-family', 'label' => esc_html__( 'Font Family', 'ssc' ), 'selector' => '.yikes-easy-mailchimp-contact_form_7-checkbox, .yikes-easy-mc-form label'),
                                    array('property' => 'text-align', 'label' => esc_html__( 'Text Align', 'ssc' ), 'selector' => '.yikes-easy-mailchimp-contact_form_7-checkbox, .yikes-easy-mc-form label'),
                                    array('property' => 'text-transform', 'label' => esc_html__( 'Text Transform', 'ssc' ), 'selector' => '.yikes-easy-mailchimp-contact_form_7-checkbox, .yikes-easy-mc-form label'),
                                    array('property' => 'text-decoration', 'label' => esc_html__( 'Text Decoration', 'ssc' ), 'selector' => '.yikes-easy-mailchimp-contact_form_7-checkbox, .yikes-easy-mc-form label'),
                                    array('property' => 'background', 'selector' => '.yikes-easy-mailchimp-contact_form_7-checkbox, .yikes-easy-mc-form label'),
                                    array('property' => 'width', 'label' => esc_html__( 'Width', 'ssc' ), 'selector' => '.yikes-easy-mailchimp-contact_form_7-checkbox, .yikes-easy-mc-form label'),
                                    array('property' => 'height', 'label' => esc_html__( 'Height', 'ssc' ), 'selector' => '.yikes-easy-mailchimp-contact_form_7-checkbox, .yikes-easy-mc-form label'),
                                    array('property' => 'float', 'label' => esc_html__( 'Float', 'ssc' ), 'selector' => '.yikes-easy-mailchimp-contact_form_7-checkbox, .yikes-easy-mc-form label'),
                                    array('property' => 'display', 'label' => esc_html__( 'Display', 'ssc' ), 'selector' => '.yikes-easy-mailchimp-contact_form_7-checkbox, .yikes-easy-mc-form label'),
                                    array('property' => 'box-shadow', 'label' => esc_html__( 'Box Shadow', 'ssc' ), 'selector' => '.yikes-easy-mailchimp-contact_form_7-checkbox, .yikes-easy-mc-form label'),
                                    array('property' => 'opacity', 'label' => esc_html__( 'Opacity', 'ssc' ), 'selector' => '.yikes-easy-mailchimp-contact_form_7-checkbox, .yikes-easy-mc-form label'),
                                    array('property' => 'margin', 'label' => esc_html__( 'Margin', 'ssc' ), 'selector' => '.yikes-easy-mailchimp-contact_form_7-checkbox, .yikes-easy-mc-form label'),
                                    array('property' => 'padding', 'label' => esc_html__( 'Padding', 'ssc' ), 'selector' => '.yikes-easy-mailchimp-contact_form_7-checkbox, .yikes-easy-mc-form label'),
                                    array('property' => 'border', 'label' => esc_html__( 'Border', 'ssc' ), 'selector' => '.yikes-easy-mailchimp-contact_form_7-checkbox, .yikes-easy-mc-form label'),
                                    array('property' => 'border-radius', 'label' => esc_html__( 'Border Radius', 'ssc' ), 'selector' => '.yikes-easy-mailchimp-contact_form_7-checkbox, .yikes-easy-mc-form label'),
                                ),

                                'Custom' => array(
                                    array('property' => 'custom', 'label' => 'Custom CSS')
                                )
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
                                'screens' => "any",
                                'Box' => array(
                                    array('property' => 'text-align', 'label' => esc_html__( 'Text Align', 'ssc' )),
                                    array('property' => 'display', 'label' => esc_html__( 'Display', 'ssc' )),
                                    array('property' => 'float', 'label' => esc_html__( 'Position left/right', 'ssc' )),
                                    array('property' => 'background'),
                                    array('property' => 'width', 'label' => esc_html__( 'Width', 'ssc' )),
                                    array('property' => 'height', 'label' => esc_html__( 'Height', 'ssc' )),
                                    array('property' => 'box-shadow', 'label' => esc_html__( 'Box Shadow', 'ssc' )),
                                    array('property' => 'opacity', 'label' => esc_html__( 'Opacity', 'ssc' )),
                                    array('property' => 'margin', 'label' => esc_html__( 'Margin', 'ssc' )),
                                    array('property' => 'padding', 'label' => esc_html__( 'Padding', 'ssc' )),
                                    array('property' => 'border', 'label' => esc_html__( 'Border', 'ssc' )),
                                    array('property' => 'border-radius', 'label' => esc_html__( 'Border Radius', 'ssc' )),
                                ),
                                'input' => array(
                                    array('property' => 'color', 'label' => esc_html__( 'Color', 'ssc' ), 'selector' => 'input:active, input:focus'),
                                    array('property' => 'font-size', 'label' => esc_html__( 'Font Size', 'ssc' ), 'selector' => 'input:active, input:focus'),
                                    array('property' => 'line-height', 'label' => esc_html__( 'Line Height', 'ssc' ), 'selector' => 'input:active, input:focus'),
                                    array('property' => 'font-weight', 'label' => esc_html__( 'Font Weight', 'ssc' ), 'selector' => 'input:active, input:focus'),
                                    array('property' => 'font-style', 'label' => esc_html__( 'Font Style', 'ssc' ), 'selector' => 'input:active, input:focus'),
                                    array('property' => 'text-align', 'label' => esc_html__( 'Text Align', 'ssc' ), 'selector' => 'input:active, input:focus'),
                                    array('property' => 'text-transform', 'label' => esc_html__( 'Text Transform', 'ssc' ), 'selector' => 'input:active, input:focus'),
                                    array('property' => 'background', 'selector' => 'input:active, input:focus'),
                                    array('property' => 'box-shadow', 'label' => esc_html__( 'Box Shadow', 'ssc' ), 'selector' => 'input:active, input:focus'),
                                    array('property' => 'opacity', 'label' => esc_html__( 'Opacity', 'ssc' ), 'selector' => 'input:active, input:focus'),
                                    array('property' => 'margin', 'label' => esc_html__( 'Margin', 'ssc' ), 'selector' => 'input:active, input:focus'),
                                    array('property' => 'padding', 'label' => esc_html__( 'Padding', 'ssc' ), 'selector' => 'input:active, input:focus'),
                                    array('property' => 'border', 'label' => esc_html__( 'Border', 'ssc' ), 'selector' => 'input:active, input:focus'),
                                    array('property' => 'border-radius', 'label' => esc_html__( 'Border Radius', 'ssc' ), 'selector' => 'input:active, input:focus'),
                                ),

                                //Submit group
                                'Submit' => array(
                                    array('property' => 'color', 'label' => esc_html__( 'Color', 'ssc' ), 'selector' => 'button:active, button:hover'),
                                    array('property' => 'font-size', 'label' => esc_html__( 'Font Size', 'ssc' ), 'selector' => 'button:active, button:hover'),
                                    array('property' => 'line-height', 'label' => esc_html__( 'Line Height', 'ssc' ), 'selector' => 'button:active, button:hover'),
                                    array('property' => 'font-weight', 'label' => esc_html__( 'Font Weight', 'ssc' ), 'selector' => 'button:active, button:hover'),
                                    array('property' => 'font-style', 'label' => esc_html__( 'Font Style', 'ssc' ), 'selector' => 'button:active, button:hover'),
                                    array('property' => 'text-align', 'label' => esc_html__( 'Text Align', 'ssc' ), 'selector' => 'button:active, button:hover'),
                                    array('property' => 'text-transform', 'label' => esc_html__( 'Text Transform', 'ssc' ), 'selector' => 'button:active, button:hover'),
                                    array('property' => 'text-decoration', 'label' => esc_html__( 'Text Decoration', 'ssc' ), 'selector' => 'button:active, button:hover'),
                                    array('property' => 'background', 'selector' => 'button:active, button:hover'),
                                    array('property' => 'width', 'label' => esc_html__( 'Width', 'ssc' ), 'selector' => 'button:active, button:hover'),
                                    array('property' => 'height', 'label' => esc_html__( 'Height', 'ssc' ), 'selector' => 'button:active, button:hover'),
                                    array('property' => 'box-shadow', 'label' => esc_html__( 'Box Shadow', 'ssc' ), 'selector' => 'button:active, button:hover'),
                                    array('property' => 'opacity', 'label' => esc_html__( 'Opacity', 'ssc' ), 'selector' => 'button:active, button:hover'),
                                    array('property' => 'margin', 'label' => esc_html__( 'Margin', 'ssc' ), 'selector' => 'button:active, button:hover'),
                                    array('property' => 'padding', 'label' => esc_html__( 'Padding', 'ssc' ), 'selector' => 'button:active, button:hover'),
                                    array('property' => 'border', 'label' => esc_html__( 'Border', 'ssc' ), 'selector' => 'button:active, button:hover'),
                                    array('property' => 'border-radius', 'label' => esc_html__( 'Border Radius', 'ssc' ), 'selector' => 'button:active, button:hover'),
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

function ssc_mailchimp_shortcode($atts, $content = null) {
    extract(shortcode_atts(array(
        'form_id' => '',
    ) , $atts));

    $output = '';
    extract($atts);

    $wrp_classes = apply_filters( 'kc-el-class', $atts );
    $output .= '<div class="'.implode( ' ', $wrp_classes ) . '">';
    
    if ( $form_id != '0' ) {
        $output .= kc_do_shortcode( '[yikes-mailchimp form="' . $form_id . '"]' );
    } else {

    }
    $output .=  '</div>';

    return $output;
}

add_shortcode('ssc_mailchimp', 'ssc_mailchimp_shortcode');

}
