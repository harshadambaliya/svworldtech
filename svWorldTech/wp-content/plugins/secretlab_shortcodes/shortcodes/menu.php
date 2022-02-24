<?php

use Secretlab_Shortcodes\Inc\Front\Shortcodes\Menu\Walker_Nav_Menu;

add_action('init', 'sl_menu_params', 99);

/**
 * Additional functions
 */

/**
 * Additional functions
 */


function sl_menu_params() {
    global $kc;

    $kc->add_map(array(
        'sl_menu' => array(
            'name' => esc_html__( 'Menu', 'ssc' ),
            'description' => esc_html__( 'It display menu', 'ssc' ),
            'icon' => 'kc-icon-box ssc-icon-7',
            'category' => 'SecretLab',
            'css_box' => true,
            'params' => array(
                esc_html__( 'General', 'ssc' ) => array(
	                array(
		                'name'        => 'class',
		                'label'       => __(' Wrapper extra class', 'ssc'),
		                'type'        => 'text',
		                'description' => __(' If you wish to style a particular content element differently, please add a class name to this field and refer to it in your custom CSS file.', 'ssc'),
	                ),
                    array(
                        'name' => 'menu_id',
                        'label' => esc_html__( 'Menu', 'ssc' ),
                        'type' => 'select',
                        'options' => slmm_get_menu_select(),
                        'value' => '',
                        'description' => esc_html__( 'Menu to display', 'ssc' ),
                    ),
                    array(
                        'name' => 'max_menu_depth',
                        'label' => esc_html__( 'Menu Depth', 'ssc' ),
                        'type' => 'select',
                        'options' => array(
                            1 => '1',
                            2 => '2',
                            3 => '3',
                        ),
                        'value' => 3,
                        'description' => esc_html__( 'Choose depth of submenu', 'ssc' ),
                    ),
                    array(
                        'name' => 'animation_type',
                        'label' => esc_html__( 'Animation Type', 'ssc' ),
                        'type' => 'radio',
                        'options' => array(
                            '' => esc_html__( 'Fade', 'ssc' ),
                            'slmm-anim-flip' => esc_html__( 'Flip', 'ssc' ),
                            'slmm-anim-scale' => esc_html__( 'Scale', 'ssc' ),
                            'slmm-anim-slide' => esc_html__( 'Slide', 'ssc' ),
                        ),
                        'value' => '',
                        'description' => esc_html__( 'Choose animation of submenu', 'ssc' ),
                    ),
                    array(
                        'name' => 'icon_for_arrow',
                        'label' => esc_html__( 'Select Icon for First lvl', 'ssc' ),
                        'type' => 'icon_picker',
                        'admin_label' => true,
                        'value' => 'fa-chevron-down',
                        'relation' => array(
                            'parent' => 'icon_type',
                            'show_when' => 'icon'
                        )
                    ),
                    array(
                        'name' => 'icon_for_arrow_sec',
                        'label' => esc_html__( 'Select Icon for Second lvl', 'ssc' ),
                        'type' => 'icon_picker',
                        'admin_label' => true,
                        'value' => 'fa-chevron-down',
                        'relation' => array(
                            'parent' => 'icon_type',
                            'show_when' => 'icon'
                        )
                    ),
                    array(
                        'name' => 'mobile_type',
                        'label' => esc_html__( 'Use mobile menu', 'ssc' ),
                        'type' => 'radio',
                        'options' => array(
                            true => esc_html__( 'Yes', 'ssc' ),
                            false => esc_html__( 'No', 'ssc' ),
                        ),
                        'value' => 1,
                        'description' => esc_html__( 'Hide menu on mobile', 'ssc' ),
                    ),
                    array(
                        'name' => 'mobile_text',
                        'label' => esc_html__( 'Text for mobile button', 'ssc' ),
                        'type' => 'text',
                        'admin_label' => true,
                        'value' => '',
                        'relation' => array(
                            'parent' => 'mobile_type',
                            'show_when' => 1,
                        )
                    ),
                    array(
                        'name' => 'icon_for_mobile_menu_hiden',
                        'label' => esc_html__( 'Select Icon for Mobile Menu (open)', 'ssc' ),
                        'type' => 'icon_picker',
                        'admin_label' => true,
                        'value' => 'fa-bars',
                        'relation' => array(
                            'parent' => 'mobile_type',
                            'show_when' => 1,
                        )
                    ),
                    array(
                        'name' => 'icon_for_mobile_menu_shown',
                        'label' => esc_html__( 'Select Icon for Mobile Menu (close)', 'ssc' ),
                        'type' => 'icon_picker',
                        'admin_label' => true,
                        'value' => 'fa-times',
                        'relation' => array(
                            'parent' => 'mobile_type',
                            'show_when' => 1,
                        )
                    ),
                    array(
                        'name' => 'menu_box_id',
                        'label' => esc_html__( 'Menu Box ID', 'ssc' ),
                        'type' => 'random',
                        'admin_label' => true,
                    ),
                    array(
                        'name' => 'menu_cart_title',
                        'label' => esc_html__( '"Cart Totals" text', 'ssc' ),
                        'type' => 'text',
                        'admin_label' => true,
                        'value' => esc_html__( 'Cart Totals', 'ssc' ),
                    ),
                    array(
                        'name' => 'menu_cart_button',
                        'label' => esc_html__( '"Go to cart" text', 'ssc' ),
                        'type' => 'text',
                        'admin_label' => true,
                        'value' => esc_html__( 'Go to cart', 'ssc' ),
                    ),
                    array(
                        'name' => 'menu_cart_total',
                        'label' => esc_html__( '"Total" text', 'ssc' ),
                        'type' => 'text',
                        'admin_label' => true,
                        'value' => esc_html__( 'Total', 'ssc' ),
                    ),
                    array(
                        'name' => 'menu_cart_empty',
                        'label' => esc_html__( '"Empty cart" text', 'ssc' ),
                        'type' => 'text',
                        'admin_label' => true,
                        'value' => esc_html__( 'Empty cart', 'ssc' ),
                    ),
                    array(
                        'name' => 'menu_cart_item',
                        'label' => esc_html__( '"Item" text', 'ssc' ),
                        'type' => 'text',
                        'admin_label' => true,
                        'value' => esc_html__( 'Item', 'ssc' ),
                    ),
                    array(
                        'name' => 'menu_cart_items',
                        'label' => esc_html__( '"Items" text', 'ssc' ),
                        'type' => 'text',
                        'admin_label' => true,
                        'value' => esc_html__( 'Items', 'ssc' ),
                    ),
                ),
                //Styling
                esc_html__( 'styling', 'ssc' ) => array(
                    array(
                        'name' => 'my-css',
                        'label' => esc_html__( 'Styling', 'ssc' ),
                        'type' => 'css',
                        'value' => '{`kc-css`:{`999`:{`box`:{`padding|.slmm, .slmm-respmenu`:`15px inherit 10px inherit`},`item-box`:{`display|.slmm li`:`block`,`float|.slmm li`:`none`,`padding|.slmm li`:`inherit 5px inherit 5px`},`item`:{`padding|.slmm li a, .slmm li > span`:`10px inherit 10px inherit`},`search`:{`background|.slmm .slm-search-block .slm-search-input`:`eyJjb2xvciI6InRyYW5zcGFyZW50IiwibGluZWFyR3JhZGllbnQiOlsiIl0sImltYWdlIjoibm9uZSIsInBvc2l0aW9uIjoiMCUgMCUiLCJzaXplIjoiYXV0byIsInJlcGVhdCI6InJlcGVhdCIsImF0dGFjaG1lbnQiOiJzY3JvbGwiLCJhZHZhbmNlZCI6MH0=`,`margin|.slmm .slm-search-block .slm-search-input`:`inherit inherit 5px inherit`,`background|.slmm .slm-search-block`:`eyJjb2xvciI6InJnYmEoMjU1LCAyNTUsIDI1NSwgMCkiLCJsaW5lYXJHcmFkaWVudCI6WyIiXSwiaW1hZ2UiOiJub25lIiwicG9zaXRpb24iOiIwJSAwJSIsInNpemUiOiJhdXRvIiwicmVwZWF0IjoicmVwZWF0IiwiYXR0YWNobWVudCI6InNjcm9sbCIsImFkdmFuY2VkIjowfQ==`}},`any`:{`box`:{`text-align|.slmm-respmenu`:`right`,`background|.slmm-respmenu .slm-open-menu-list`:`eyJjb2xvciI6IiNmZmZmZmYiLCJsaW5lYXJHcmFkaWVudCI6WyIiXSwiaW1hZ2UiOiJub25lIiwicG9zaXRpb24iOiIwJSAwJSIsInNpemUiOiJhdXRvIiwicmVwZWF0IjoicmVwZWF0IiwiYXR0YWNobWVudCI6InNjcm9sbCIsImFkdmFuY2VkIjowfQ==`,`color|.slmm-respmenu .slm-open-menu-list`:`#768188`,`border|.slmm-respmenu .slm-open-menu-list`:`2px solid #b2b9be`,`width|.slmm, .slmm-respmenu`:`100%`,`text-align|.slmm`:`right`},`item-box`:{`display|.slmm li`:`inline-block`,`text-align|.slmm li`:`left`,`padding|.slmm li`:`inherit 5px inherit 5px`},`item`:{`font-size|.slmm li a, .slmm li > span`:`13px`,`line-height|.slmm li a, .slmm li > span`:`13px`,`color|.slmm li a, .slmm li > span`:`#2c3840`,`color|.slmm li.current-menu-item a`:`#768188`,`font-weight|.slmm li a, .slmm li > span`:`700`,`text-transform|.slmm li a, .slmm li > span`:`uppercase`,`text-decoration|.slmm li a span, .slmm li > span`:`none`,`border|.slmm li a, .slmm li > span`:`||3px solid rgba(255, 189, 0, 0)|`,`padding|.slmm li a, .slmm li > span`:`32px 5px 30px 5px`},`caret`:{`font-size|.slmm li .caret`:`9px`,`color|.slmm li .caret`:`#b2b9be`,`line-height|.slmm li .caret`:`1em`,`margin|.slmm li .caret`:`inherit inherit inherit 10px`},`search`:{`width|.slmm .slm-search-block form`:`50%`,`background|.slmm .slm-search-block .slm-search-input`:`eyJjb2xvciI6InJnYmEoMjU1LCAyNTUsIDI1NSwgMC45NSkiLCJsaW5lYXJHcmFkaWVudCI6WyIiXSwiaW1hZ2UiOiJub25lIiwicG9zaXRpb24iOiIwJSAwJSIsInNpemUiOiJhdXRvIiwicmVwZWF0IjoicmVwZWF0IiwiYXR0YWNobWVudCI6InNjcm9sbCIsImFkdmFuY2VkIjowfQ==`,`border|.slmm .slm-search-block .slm-search-input`:`2px solid #a2a2a2`,`padding|.slmm .slm-search-block .slm-search-input`:`0 45px inherit 45px`,`color|.slmm .slm-search-block .slm-search-close`:`#dd3333`,`background|.slmm .slm-search-block`:`eyJjb2xvciI6InJnYmEoMCwgMCwgMCwgMC43MykiLCJsaW5lYXJHcmFkaWVudCI6WyIiXSwiaW1hZ2UiOiJub25lIiwicG9zaXRpb24iOiIwJSAwJSIsInNpemUiOiJhdXRvIiwicmVwZWF0IjoicmVwZWF0IiwiYXR0YWNobWVudCI6InNjcm9sbCIsImFkdmFuY2VkIjowfQ==`},`cart`:{`background|.slmm li.slm-cart-menu-item i`:`eyJjb2xvciI6IiNmZmZmZmYiLCJsaW5lYXJHcmFkaWVudCI6WyIiXSwiaW1hZ2UiOiJub25lIiwicG9zaXRpb24iOiIwJSAwJSIsInNpemUiOiJhdXRvIiwicmVwZWF0IjoicmVwZWF0IiwiYXR0YWNobWVudCI6InNjcm9sbCIsImFkdmFuY2VkIjowfQ==`,`color|.slm-menu-item-cart-block strong`:`#0081d7`,`font-size|.slmm .slm-cart-menu-item .slm-menu-item-cart-block`:`15px`,`line-height|.slmm .slm-cart-menu-item .slm-menu-item-cart-block`:`24px`,`color|.slmm .slm-cart-menu-item .slm-menu-item-cart-block`:`#768188`,`color|.slmm .slm-cart-menu-item .slm-menu-item-cart-block h4`:`#2c3840`,`background|.slmm .slm-cart-menu-item .slm-menu-item-cart-block`:`eyJjb2xvciI6IiNmZmZmZmYiLCJsaW5lYXJHcmFkaWVudCI6WyIiXSwiaW1hZ2UiOiJub25lIiwicG9zaXRpb24iOiIwJSAwJSIsInNpemUiOiJhdXRvIiwicmVwZWF0IjoicmVwZWF0IiwiYXR0YWNobWVudCI6InNjcm9sbCIsImFkdmFuY2VkIjowfQ==`,`box-shadow|.slmm .slm-cart-menu-item .slm-menu-item-cart-block`:`0px 0px 5px 0px rgba(0,0,0,0.30)`,`padding|.slmm .slm-cart-menu-item .slm-menu-item-cart-block`:`25px 30px 25px 30px`,`font-size|.slmm .slm-cart-menu-item .slm-link-to-cart`:`13px`,`line-height|.slmm .slm-cart-menu-item .slm-link-to-cart`:`13px`,`color|.slmm .slm-cart-menu-item .slm-link-to-cart`:`#2c3840`,`font-weight|.slmm .slm-cart-menu-item .slm-link-to-cart`:`700`,`background|.slmm .slm-cart-menu-item .slm-link-to-cart`:`eyJjb2xvciI6IiNmZmJlMDAiLCJsaW5lYXJHcmFkaWVudCI6WyIiXSwiaW1hZ2UiOiJub25lIiwicG9zaXRpb24iOiIwJSAwJSIsInNpemUiOiJhdXRvIiwicmVwZWF0IjoicmVwZWF0IiwiYXR0YWNobWVudCI6InNjcm9sbCIsImFkdmFuY2VkIjowfQ==`,`border|.slmm .slm-cart-menu-item .slm-link-to-cart`:`0px solid #ffffff`,`border-radius|.slmm .slm-cart-menu-item .slm-link-to-cart`:`0px 0px 0px 0px`,`padding|.slmm .slm-cart-menu-item .slm-link-to-cart`:`10px 30px 10px 30px`,`margin|.slmm .slm-cart-menu-item .slm-link-to-cart`:`14px inherit inherit inherit`},`box-2-lvl`:{`padding|.slmm li ul`:`15px 0px 25px 30px`,`background|.slmm li ul`:`eyJjb2xvciI6IiNmZmZmZmYiLCJsaW5lYXJHcmFkaWVudCI6WyIiXSwiaW1hZ2UiOiJub25lIiwicG9zaXRpb24iOiIwJSAwJSIsInNpemUiOiJhdXRvIiwicmVwZWF0IjoicmVwZWF0IiwiYXR0YWNobWVudCI6InNjcm9sbCIsImFkdmFuY2VkIjowfQ==`,`box-shadow|.slmm li ul`:`0px 0px 5px 0px rgba(0,0,0,0.30)`},`item-box-2-lvl`:{`display|.slmm li ul li`:`block`,`float|.slmm li ul li`:`left`,`background|.slmm li ul li`:`eyJjb2xvciI6InRyYW5zcGFyZW50IiwibGluZWFyR3JhZGllbnQiOlsiIl0sImltYWdlIjoibm9uZSIsInBvc2l0aW9uIjoiMCUgMCUiLCJzaXplIjoiYXV0byIsInJlcGVhdCI6InJlcGVhdCIsImF0dGFjaG1lbnQiOiJzY3JvbGwiLCJhZHZhbmNlZCI6MH0=`,`height|.slmm li ul li`:`100%`,`width|.slmm li ul li`:`100%`,`padding|.slmm li ul li`:`0px 30px 0px 0px`},`item-2-lvl`:{`font-size|.slmm li ul li a, .slmm li ul li > span`:`14px`,`line-height|.slmm li ul li a, .slmm li ul li > span`:`19px`,`color|.slmm li ul li a, .slmm li ul li > span`:`#2c3840`,`color|.slm-mega-item li ul li.current-menu-item a, .slm-mega-item li ul li.current-menu-item > span`:`#768188`,`font-weight|.slmm li ul li a, .slmm li ul li > span`:`400`,`text-transform|.slmm li ul li a, .slmm li ul li > span`:`capitalize`,`background|.slmm li ul li a, .slmm li ul li > span`:`eyJjb2xvciI6InJnYmEoMjU1LCAyNTUsIDI1NSwgMCkiLCJsaW5lYXJHcmFkaWVudCI6WyIiXSwiaW1hZ2UiOiJub25lIiwicG9zaXRpb24iOiIwJSAwJSIsInNpemUiOiJhdXRvIiwicmVwZWF0IjoicmVwZWF0IiwiYXR0YWNobWVudCI6InNjcm9sbCIsImFkdmFuY2VkIjowfQ==`,`border|.slmm li ul li a, .slmm li ul li > span`:`||1px solid #d7dce0|`,`padding|.slmm li ul li a, .slmm li ul li > span`:`10px 15px 10px 0px`},`icon-2-lvl`:{`color|.slmm li ul li a i, .slmm li ul li a img`:`#ffbd00`,`color|.slm-mega-item li ul li.current-menu-item i`:`#ffbd00`,`padding|.slmm li ul li a i, .slmm li ul li a img`:`inherit 10px inherit inherit`},`caret-2-lvl`:{`font-size|.slmm li ul li .caret`:`15px`},`box-3-lvl`:{`background|.slmm li ul li ul`:`eyJjb2xvciI6IiNmZmZmZmYiLCJsaW5lYXJHcmFkaWVudCI6WyIiXSwiaW1hZ2UiOiJub25lIiwicG9zaXRpb24iOiIwJSAwJSIsInNpemUiOiJhdXRvIiwicmVwZWF0IjoicmVwZWF0IiwiYXR0YWNobWVudCI6InNjcm9sbCIsImFkdmFuY2VkIjowfQ==`}}}}', // remove this if you do not need a default content
                        //'options' => array(), register css properties, selectors and screens
                        'description' => esc_html__( 'Styles', 'ssc' ),
                        'options' => array(
                            array(
                                'screens' => "any",
                                'Wrapper' => array(
	                                array('property' => 'text-align', 'label' => esc_html__( 'Text Align', 'ssc' ), 'selector' => '+.ssc_menu'),
	                                array('property' => 'display', 'label' => esc_html__( 'Display', 'ssc' ), 'selector' => '+.ssc_menu'),
	                                array('property' => 'float', 'label' => esc_html__( 'Float', 'ssc' ), 'selector' => '+.ssc_menu'),
	                                array('property' => 'width', 'label' => esc_html__( 'Width', 'ssc' ), 'selector' => '+.ssc_menu'),
	                                array('property' => 'height', 'label' => esc_html__( 'Height', 'ssc' ), 'selector' => '+.ssc_menu'),
	                                array('property' => 'margin', 'label' => esc_html__( 'Margin', 'ssc' ), 'selector' => '+.ssc_menu'),
	                                array('property' => 'padding', 'label' => esc_html__( 'Padding', 'ssc' ), 'selector' => '+.ssc_menu'),
	                                array('property' => 'border', 'label' => esc_html__( 'Border', 'ssc' ), 'selector' => '+.ssc_menu'),
	                                array('property' => 'border-radius', 'label' => esc_html__( 'Border Radius', 'ssc' ), 'selector' => '+.ssc_menu'),
                                ),
                                'Box' => array(
                                    array('property' => 'text-align', 'label' => esc_html__( 'Position of mobile menu button (left/right)', 'ssc' ), 'selector' => '.slmm-respmenu'),
                                    array('property' => 'background', 'selector' => '.slmm-respmenu .slm-open-menu-list'),
                                    array('property' => 'font-size', 'label' => esc_html__( 'Font Size of text for mobile menu button', 'ssc' ), 'selector' => '.slmm-respmenu i'),
                                    array('property' => 'line-height', 'label' => esc_html__( 'Line Height of icon for mobile menu button', 'ssc' ), 'selector' => '.slmm-respmenu i'),
                                    array('property' => 'line-height', 'label' => esc_html__( 'Line Height of text for mobile menu button', 'ssc' ), 'selector' => '.slmm-respmenu .slm-open-menu-list'),
                                    array('property' => 'color', 'label' => esc_html__( 'Color of text for mobile menu button', 'ssc' ), 'selector' => '.slmm-respmenu i'),
                                    array('property' => 'font-family', 'label' => esc_html__( 'Font Family of text for mobile menu button', 'ssc' ), 'selector' => '.slmm-respmenu i'),
                                    array('property' => 'font-weight', 'label' => esc_html__( 'Font Weight of text for mobile menu button', 'ssc' ), 'selector' => '.slmm-respmenu i'),
                                    array('property' => 'font-style', 'label' => esc_html__( 'Font Style of text for mobile menu button', 'ssc' ), 'selector' => '.slmm-respmenu i'),
                                    array('property' => 'text-transform', 'label' => esc_html__( 'Text Transform of text for mobile menu button', 'ssc' ), 'selector' => '.slmm-respmenu i'),
                                    array('property' => 'text-decoration', 'label' => esc_html__( 'Text Decoration of text for mobile menu button', 'ssc' ), 'selector' => '.slmm-respmenu i'),
                                    array('property' => 'margin', 'label' => esc_html__( 'Margin of text for mobile menu button', 'ssc' ), 'selector' => '.slmm-respmenu i'),
                                    array('property' => 'color', 'label' => esc_html__( 'Text Color of mobile menu button text', 'ssc' ), 'selector' => '.slmm-respmenu .slm-open-menu-list'),
                                    array('property' => 'color', 'label' => esc_html__( 'Text Color of mobile menu button icon', 'ssc' ), 'selector' => '.slm-open-menu-list i'),
                                    array('property' => 'border', 'label' => esc_html__( 'Border of mobile menu button', 'ssc' ), 'selector' => '.slmm-respmenu .slm-open-menu-list'),
                                    array('property' => 'border-radius', 'label' => esc_html__( 'Border Radius of mobile menu button', 'ssc' ), 'selector' => '.slmm-respmenu .slm-open-menu-list'),
                                    array('property' => 'width', 'label' => esc_html__( 'Width', 'ssc' ), 'selector' => '.slmm, .slmm-respmenu'),
                                    array('property' => 'height', 'label' => esc_html__( 'Height', 'ssc' ), 'selector' => '.slmm, .slmm-respmenu'),
                                    array('property' => 'display', 'label' => esc_html__( 'Display', 'ssc' ), 'selector' => '.slmm, .slmm-respmenu'),
                                    array('property' => 'text-align', 'label' => esc_html__( 'Text Align', 'ssc' ), 'selector' => '.slmm'),
                                    array('property' => 'float', 'label' => esc_html__( 'Position left/right', 'ssc' ), 'selector' => '.slmm, .slmm-respmenu'),
                                    array('property' => 'margin', 'label' => esc_html__( 'Margin', 'ssc' ), 'selector' => '.slmm, .slmm-respmenu'),
                                    array('property' => 'padding', 'label' => esc_html__( 'Padding', 'ssc' ), 'selector' => '.slmm, .slmm-respmenu'),
                                    array('property' => 'box-shadow', 'label' => esc_html__( 'Box Shadow', 'ssc' ), 'selector' => '.slmm, .slmm-respmenu'),
                                    array('property' => 'border', 'label' => esc_html__( 'Border', 'ssc' ), 'selector' => '.slmm, .slmm-respmenu'),
                                    array('property' => 'border-radius', 'label' => esc_html__( 'Border Radius', 'ssc' ), 'selector' => '.slmm, .slmm-respmenu'),
                                ),
                                'Box 1 Lvl' => array(
	                                array('property' => 'display', 'label' => esc_html__( 'Display', 'ssc' ), 'selector' => '.slmm'),
	                                array('property' => 'float', 'label' => esc_html__( 'Float', 'ssc' ), 'selector' => '.slmm'),
	                                array('property' => 'line-height', 'label' => esc_html__( 'Line Height', 'ssc' ), 'selector' => '.slmm'),
	                                array('property' => 'text-align', 'label' => esc_html__( 'Text Align', 'ssc' ), 'selector' => '.slmm'),
	                                array('property' => 'background', 'selector' => '.slmm'),
	                                array('property' => 'height', 'label' => esc_html__( 'Height', 'ssc' ), 'selector' => '.slmm'),
	                                array('property' => 'width', 'label' => esc_html__( 'Width', 'ssc' ), 'selector' => '.slmm'),
	                                array('property' => 'border', 'label' => esc_html__( 'Border', 'ssc' ), 'selector' => '.slmm'),
	                                array('property' => 'border', 'label' => esc_html__( 'Border Last Child', 'ssc' ), 'selector' => '.slm-sub-menu li:last-child'),
	                                array('property' => 'border-radius', 'label' => esc_html__( 'Border Radius', 'ssc' ), 'selector' => '.slmm'),
	                                array('property' => 'padding', 'label' => esc_html__( 'Padding', 'ssc' ), 'selector' => '.slmm'),
	                                array('property' => 'margin', 'label' => esc_html__( 'Margin', 'ssc' ), 'selector' => '.slmm'),
                                ),
                                'Item Box' => array(
                                    array('property' => 'display', 'label' => esc_html__( 'Display', 'ssc' ), 'selector' => '.slmm li'),
                                    array('property' => 'float', 'label' => esc_html__( 'Float', 'ssc' ), 'selector' => '.slmm li'),
                                    array('property' => 'line-height', 'label' => esc_html__( 'Line Height', 'ssc' ), 'selector' => '.slmm li'),
                                    array('property' => 'text-align', 'label' => esc_html__( 'Text Align', 'ssc' ), 'selector' => '.slmm li'),
                                    array('property' => 'background', 'selector' => '.slmm li'),
                                    array('property' => 'background', 'label' => esc_html__( 'Background for active item', 'ssc' ), 'selector' => '.slmm li.current-menu-item'),
                                    array('property' => 'height', 'label' => esc_html__( 'Height', 'ssc' ), 'selector' => '.slmm li'),
                                    array('property' => 'width', 'label' => esc_html__( 'Width', 'ssc' ), 'selector' => '.slmm li'),
                                    array('property' => 'border', 'label' => esc_html__( 'Border', 'ssc' ), 'selector' => '.slmm li'),
                                    array('property' => 'border', 'label' => esc_html__( 'Border Last Child', 'ssc' ), 'selector' => '.slmm li:last-child'),
                                    array('property' => 'border-radius', 'label' => esc_html__( 'Border Radius', 'ssc' ), 'selector' => '.slmm li'),
                                    array('property' => 'padding', 'label' => esc_html__( 'Padding', 'ssc' ), 'selector' => '.slmm li'),
                                    array('property' => 'margin', 'label' => esc_html__( 'Margin', 'ssc' ), 'selector' => '.slmm li'),
                                ),

                                'Item' => array(
                                    array('property' => 'font-size', 'label' => esc_html__( 'Font Size', 'ssc' ), 'selector' => '.slmm li a, .slmm li > span'),
                                    array('property' => 'line-height', 'label' => esc_html__( 'Line Height', 'ssc' ), 'selector' => '.slmm li a, .slmm li > span'),
                                    array('property' => 'color', 'label' => esc_html__( 'Color', 'ssc' ), 'selector' => '.slmm li a, .slmm li > span'),
                                    array('property' => 'color', 'label' => esc_html__( 'Color on Active', 'ssc' ), 'selector' => '.slmm li.current-menu-item a, .slmm li.current-menu-item span'),
                                    array('property' => 'font-family', 'label' => esc_html__( 'Font Family', 'ssc' ), 'selector' => '.slmm li a, .slmm li > span'),
                                    array('property' => 'font-weight', 'label' => esc_html__( 'Font Weight', 'ssc' ), 'selector' => '.slmm li a, .slmm li > span'),
                                    array('property' => 'font-style', 'label' => esc_html__( 'Font Style', 'ssc' ), 'selector' => '.slmm li a, .slmm li > span'),
                                    array('property' => 'text-transform', 'label' => esc_html__( 'Text Transform', 'ssc' ), 'selector' => '.slmm li a, .slmm li > span'),
                                    array('property' => 'text-decoration', 'label' => esc_html__( 'Text Decoration', 'ssc' ), 'selector' => '.slmm li a span, .slmm li > span'),
                                    array('property' => 'letter-spacing', 'label' => esc_html__('Letter Spacing', 'ssc' ), 'selector' => '.slmm li a span, .slmm li > spa'),
                                    array('property' => 'background', 'label' => esc_html__( 'Background', 'ssc' ), 'selector' => '.slmm li a, .slmm li > span'),
                                    array('property' => 'background', 'label' => esc_html__( 'Background on Active', 'ssc' ), 'selector' => '.slmm li.current-menu-item a, .slmm li.current-menu-item > span'),
                                    array('property' => 'border', 'label' => esc_html__( 'Border', 'ssc' ), 'selector' => '.slmm li a, .slmm li > span'),
                                    array('property' => 'border', 'label' => esc_html__( 'Border Last Child', 'ssc' ), 'selector' => '.slmm li:last-child > a, .slmm li:last-child > span'),
                                    array('property' => 'border-radius', 'label' => esc_html__( 'Border Radius', 'ssc' ), 'selector' => '.slmm li a, .slmm li > span'),
                                    array('property' => 'padding', 'label' => esc_html__( 'Padding', 'ssc' ), 'selector' => '.slmm li a, .slmm li > span'),
                                    array('property' => 'margin', 'label' => esc_html__( 'Margin', 'ssc' ), 'selector' => '.slmm li a, .slmm li > span'),
                                ),
                                'Icon' => array(
                                    array('property' => 'font-size', 'label' => esc_html__( 'Font Size', 'ssc' ), 'selector' => '.slmm li i'),
                                    array('property' => 'height', 'label' => esc_html__( 'Image Height', 'ssc' ), 'selector' => '.slmm li i,.slmm li img'),
                                    array('property' => 'width', 'label' => esc_html__( 'Image Width', 'ssc' ), 'selector' => '.slmm li i,.slmm li img'),
                                    array('property' => 'color', 'label' => esc_html__( 'Color', 'ssc' ), 'selector' => '.slmm li i, .slmm li img'),
                                    array('property' => 'color', 'label' => esc_html__( 'Color on Active', 'ssc' ), 'selector' => '.slmm li.current-menu-item i'),
                                    array('property' => 'text-align', 'label' => esc_html__( 'Text Align', 'ssc' ), 'selector' => '.slmm li i, .slmm li i'),
                                    array('property' => 'display', 'label' => esc_html__( 'Display', 'ssc' ), 'selector' => '.slmm li i, .slmm li img'),
                                    array('property' => 'float', 'label' => esc_html__( 'Float', 'ssc' ), 'selector' => '.slmm li i, .slmm li img'),
                                    array('property' => 'line-height', 'label' => esc_html__( 'Line Height', 'ssc' ), 'selector' => '.slmm li i, .slmm li img'),
                                    array('property' => 'background', 'label' => esc_html__( 'Background', 'ssc' ), 'selector' => '.slmm li i, .slmm li img'),
                                    array('property' => 'background', 'label' => esc_html__( 'Background on Active', 'ssc' ), 'selector' => '.slmm li.current-menu-item i, .slmm li.current-menu-item img'),
                                    array('property' => 'border', 'label' => esc_html__( 'Border', 'ssc' ), 'selector' => '.slmm li i, .slmm li img'),
                                    array('property' => 'border-radius', 'label' => esc_html__( 'Border Radius', 'ssc' ), 'selector' => '.slmm li i, .slmm li img'),
                                    array('property' => 'padding', 'label' => esc_html__( 'Padding', 'ssc' ), 'selector' => '.slmm li i, .slmm li img'),
                                    array('property' => 'margin', 'label' => esc_html__( 'Margin', 'ssc' ), 'selector' => '.slmm li i, .slmm li img'),
                                ),
                                'Caret' => array(
                                    array('property' => 'font-size', 'label' => esc_html__( 'Font Size', 'ssc' ), 'selector' => '.slmm li .caret'),
                                    array('property' => 'color', 'label' => esc_html__( 'Color', 'ssc' ), 'selector' => '.slmm li .caret'),
                                    array('property' => 'color', 'label' => esc_html__( 'Color on Active', 'ssc' ), 'selector' => '.slmm li.current-menu-item .caret'),
                                    array('property' => 'display', 'label' => esc_html__( 'Display', 'ssc' ), 'selector' => '.slmm li .caret'),
                                    array('property' => 'float', 'label' => esc_html__( 'Float', 'ssc' ), 'selector' => '.slmm li .caret'),
                                    array('property' => 'line-height', 'label' => esc_html__( 'Line Height', 'ssc' ), 'selector' => '.slmm li .caret'),
                                    array('property' => 'background', 'label' => esc_html__( 'Background', 'ssc' ), 'selector' => '.slmm li .caret'),
                                    array('property' => 'background', 'label' => esc_html__( 'Background on Active', 'ssc' ), 'selector' => '.slmm li.current-menu-item .caret'),
                                    array('property' => 'border', 'label' => esc_html__( 'Border', 'ssc' ), 'selector' => '.slmm li .caret'),
                                    array('property' => 'border-radius', 'label' => esc_html__( 'Border Radius', 'ssc' ), 'selector' => '.slmm li .caret'),
                                    array('property' => 'padding', 'label' => esc_html__( 'Padding', 'ssc' ), 'selector' => '.slmm li .caret'),
                                    array('property' => 'margin', 'label' => esc_html__( 'Margin', 'ssc' ), 'selector' => '.slmm li .caret'),
                                ),
                                'Search' => array(
                                    // Icon
                                    array('property' => 'font-size', 'label' => esc_html__( 'Icon Font Size', 'ssc' ), 'selector' => '.slm-mega-item .slm-search-icon i.menu-item-icon'),
                                    array('property' => 'line-height', 'label' => esc_html__( 'Icon Line Height', 'ssc' ), 'selector' => '.slm-mega-item .slm-search-icon i.menu-item-icon'),
                                    array('property' => 'color', 'label' => esc_html__( 'Icon Color', 'ssc' ), 'selector' => '.slm-mega-item .slm-search-icon i.menu-item-icon'),
                                    array('property' => 'display', 'label' => esc_html__( 'Icon Display', 'ssc' ), 'selector' => '.slm-mega-item .slm-search-icon i.menu-item-icon'),
                                    array('property' => 'float', 'label' => esc_html__( 'Icon Float', 'ssc' ), 'selector' => '.slmm .slm-search-menu-item.slm-mega-item'),
                                    array('property' => 'background', 'label' => esc_html__( 'Icon Background', 'ssc' ), 'selector' => '.slm-mega-item .slm-search-icon i'),
	                                array('property' => 'height', 'label' => esc_html__( 'Height', 'ssc' ), 'selector' => '.slm-search-icon i'),
	                                array('property' => 'width', 'label' => esc_html__( 'Width', 'ssc' ), 'selector' => '.slm-search-icon i'),
                                    array('property' => 'border', 'label' => esc_html__( 'Icon Border', 'ssc' ), 'selector' => '.slm-mega-item .slm-search-icon i.menu-item-icon'),
                                    array('property' => 'border-radius', 'label' => esc_html__( 'Icon Border Radius', 'ssc' ), 'selector' => '.slm-mega-item .slm-search-icon i.menu-item-icon'),
                                    array('property' => 'padding', 'label' => esc_html__( 'Search Link Padding', 'ssc' ), 'selector' => '.slm-mega-item .slm-search-icon'),
                                    array('property' => 'padding', 'label' => esc_html__( 'Icon Padding', 'ssc' ), 'selector' => '.slm-mega-item .slm-search-icon i.menu-item-icon'),
                                    array('property' => 'margin', 'label' => esc_html__( 'Icon Margin', 'ssc' ), 'selector' => '.slm-mega-item .slm-search-icon i.menu-item-icon'),
                                    // Input
                                    array('property' => 'font-size', 'label' => esc_html__( 'Input Font Size', 'ssc' ), 'selector' => '.slmm .slm-search-block .slm-search-input'),
                                    array('property' => 'line-height', 'label' => esc_html__( 'Input Line Height', 'ssc' ), 'selector' => '.slmm .slm-search-block .slm-search-input'),
                                    array('property' => 'width', 'label' => esc_html__( 'Input Width', 'ssc' ), 'selector' => '.slmm .slm-search-block form'),
                                    array('property' => 'color', 'label' => esc_html__( 'Input Text Color', 'ssc' ), 'selector' => '.slmm .slm-search-block .slm-search-input'),
                                    array('property' => 'display', 'label' => esc_html__( 'Input Display', 'ssc' ), 'selector' => '.slmm .slm-search-block .slm-search-input'),
                                    array('property' => 'float', 'label' => esc_html__( 'Input Float', 'ssc' ), 'selector' => '.slmm .slm-search-block .slm-search-input'),
                                    array('property' => 'background', 'label' => esc_html__( 'Input Background', 'ssc' ), 'selector' => '.slmm .slm-search-block .slm-search-input'),
                                    array('property' => 'border', 'label' => esc_html__( 'Input Border', 'ssc' ), 'selector' => '.slmm .slm-search-block .slm-search-input'),
                                    array('property' => 'border-radius', 'label' => esc_html__( 'Input Border Radius', 'ssc' ), 'selector' => '.slmm .slm-search-block .slm-search-input'),
                                    array('property' => 'padding', 'label' => esc_html__( 'Input Padding', 'ssc' ), 'selector' => '.slmm .slm-search-block .slm-search-input'),
	                                array('property' => 'margin', 'label' => esc_html__( 'Form Margin', 'ssc' ), 'selector' => '.slmm .slm-search-block form'),
	                                array('property' => 'margin', 'label' => esc_html__( 'Input Margin', 'ssc' ), 'selector' => '.slmm .slm-search-block .slm-search-input'),
                                    // Close Icon
                                    array('property' => 'color', 'label' => esc_html__( 'Color of Close Icon', 'ssc' ), 'selector' => '.slmm .slm-search-block .slm-search-close'),
                                    array('property' => 'background', 'label' => esc_html__( 'Layout Background', 'ssc' ), 'selector' => '.slmm .slm-search-block'),
                                ),
                                'Cart' => array(
                                    // Icon
                                    array('property' => 'font-size', 'label' => esc_html__( 'Icon Font Size', 'ssc' ), 'selector' => '.slmm li.slm-cart-menu-item i'),
                                    array('property' => 'line-height', 'label' => esc_html__( 'Icon Line Height', 'ssc' ), 'selector' => '.slmm li.slm-cart-menu-item i'),
                                    array('property' => 'color', 'label' => esc_html__( 'Icon Color', 'ssc' ), 'selector' => '.slmm .slmm li.slm-cart-menu-item i'),
                                    array('property' => 'display', 'label' => esc_html__( 'Icon Display', 'ssc' ), 'selector' => '.slmm li.slm-cart-menu-item i'),
                                    array('property' => 'float', 'label' => esc_html__( 'Icon Float', 'ssc' ), 'selector' => '.slmm .slm-cart-menu-item.slm-mega-item'),
                                    array('property' => 'background', 'label' => esc_html__( 'Icon Background', 'ssc' ), 'selector' => '.slmm li.slm-cart-menu-item i'),
                                    array('property' => 'border', 'label' => esc_html__( 'Icon Border', 'ssc' ), 'selector' => '.slmm li.slm-cart-menu-item i'),
                                    array('property' => 'border-radius', 'label' => esc_html__( 'Icon Border Radius', 'ssc' ), 'selector' => '.slmm li.slm-cart-menu-item i'),
                                    array('property' => 'padding', 'label' => esc_html__( 'Icon Padding', 'ssc' ), 'selector' => '.slmm li.slm-cart-menu-item i'),
                                    array('property' => 'margin', 'label' => esc_html__( 'Icon Margin', 'ssc' ), 'selector' => '.slmm li.slm-cart-menu-item i'),
                                    // Cart Money
                                    array('property' => 'color', 'label' => esc_html__( 'Money Total Text Color', 'ssc' ), 'selector' => '.slm-menu-item-cart-block strong'),
                                    // Block
                                    array('property' => 'font-size', 'label' => esc_html__( 'Cart Font Size', 'ssc' ), 'selector' => '.slmm .slm-cart-menu-item .slm-menu-item-cart-block'),
                                    array('property' => 'line-height', 'label' => esc_html__( 'Cart Line Height', 'ssc' ), 'selector' => '.slmm .slm-cart-menu-item .slm-menu-item-cart-block'),
                                    array('property' => 'width', 'label' => esc_html__( 'Cart Block Width', 'ssc' ), 'selector' => '.slmm .slm-search-block form'),
                                    array('property' => 'color', 'label' => esc_html__( 'Cart Text Color', 'ssc' ), 'selector' => '.slmm .slm-cart-menu-item .slm-menu-item-cart-block'),
                                    array('property' => 'color', 'label' => esc_html__( 'Cart Header Text Color', 'ssc' ), 'selector' => '.slmm .slm-cart-menu-item .slm-menu-item-cart-block h4'),
                                    array('property' => 'background', 'label' => esc_html__( 'Cart Block Background', 'ssc' ), 'selector' => '.slmm .slm-cart-menu-item .slm-menu-item-cart-block'),
                                    array('property' => 'box-shadow', 'label' => esc_html__( 'Box Shadow', 'ssc' ), 'selector' => '.slmm .slm-cart-menu-item .slm-menu-item-cart-block'),
                                    array('property' => 'border', 'label' => esc_html__( 'Cart Block Border', 'ssc' ), 'selector' => '.slmm .slm-cart-menu-item .slm-menu-item-cart-block'),
                                    array('property' => 'border-radius', 'label' => esc_html__( 'Cart Block Border Radius', 'ssc' ), 'selector' => '.slmm .slm-cart-menu-item .slm-menu-item-cart-block'),
                                    array('property' => 'padding', 'label' => esc_html__( 'Cart Block Padding', 'ssc' ), 'selector' => '.slmm .slm-cart-menu-item .slm-menu-item-cart-block'),
                                    array('property' => 'margin', 'label' => esc_html__( 'Cart Block Margin', 'ssc' ), 'selector' => '.slmm .slm-cart-menu-item .slm-menu-item-cart-block'),
                                    // Cart Link
                                    array('property' => 'font-size', 'label' => esc_html__( 'Cart Link Font Size', 'ssc' ), 'selector' => '.slmm .slm-cart-menu-item .slm-link-to-cart'),
                                    array('property' => 'line-height', 'label' => esc_html__( 'Cart Link Line Height', 'ssc' ), 'selector' => '.slmm .slm-cart-menu-item .slm-link-to-cart'),
                                    array('property' => 'color', 'label' => esc_html__( 'Cart Link Text Color', 'ssc' ), 'selector' => '.slmm .slm-cart-menu-item .slm-link-to-cart'),
                                    array('property' => 'font-family', 'label' => esc_html__( 'Cart Link Font Family', 'ssc' ), 'selector' => '.slmm .slm-cart-menu-item .slm-link-to-cart'),
                                    array('property' => 'font-weight', 'label' => esc_html__( 'Cart Link Font Weight', 'ssc' ), 'selector' => '.slmm .slm-cart-menu-item .slm-link-to-cart'),
                                    array('property' => 'font-style', 'label' => esc_html__( 'Cart Link Font Style', 'ssc' ), 'selector' => '.slmm .slm-cart-menu-item .slm-link-to-cart'),
                                    array('property' => 'text-transform', 'label' => esc_html__( 'Cart Link Text Transform', 'ssc' ), 'selector' => '.slmm .slm-cart-menu-item .slm-link-to-cart'),
                                    array('property' => 'text-decoration', 'label' => esc_html__( 'Cart Link Text Decoration', 'ssc' ), 'selector' => '.slmm .slm-cart-menu-item .slm-link-to-cart'),
                                    array('property' => 'background', 'label' => esc_html__( 'Cart Link Background', 'ssc' ), 'selector' => '.slmm .slm-cart-menu-item .slm-link-to-cart'),
                                    array('property' => 'border', 'label' => esc_html__( 'Cart Link Border', 'ssc' ), 'selector' => '.slmm .slm-cart-menu-item .slm-link-to-cart'),
                                    array('property' => 'border-radius', 'label' => esc_html__( 'Cart Link Border Radius', 'ssc' ), 'selector' => '.slmm .slm-cart-menu-item .slm-link-to-cart'),
                                    array('property' => 'padding', 'label' => esc_html__( 'Cart Link Padding', 'ssc' ), 'selector' => '.slmm .slm-cart-menu-item .slm-link-to-cart'),
                                    array('property' => 'margin', 'label' => esc_html__( 'Cart Link Margin', 'ssc' ), 'selector' => '.slmm .slm-cart-menu-item .slm-link-to-cart'),
                                ),
                                'Box 2 lvl' => array(
                                    array('property' => 'width', 'label' => esc_html__( 'Width', 'ssc' ), 'selector' => '.slmm li ul'),
                                    array('property' => 'height', 'label' => esc_html__( 'Height', 'ssc' ), 'selector' => '.slmm li ul'),
                                    array('property' => 'text-align', 'label' => esc_html__( 'Text Align', 'ssc' ), 'selector' => '.slmm li ul'),
                                    array('property' => 'float', 'label' => esc_html__( 'Position left/right', 'ssc' ), 'selector' => '.slmm li ul'),
                                    array('property' => 'margin', 'label' => esc_html__( 'Margin', 'ssc' ), 'selector' => '.slmm li ul'),
                                    array('property' => 'padding', 'label' => esc_html__( 'Padding', 'ssc' ), 'selector' => '.slmm li ul'),
                                    array('property' => 'background', 'selector' => '.slmm li ul'),
                                    array('property' => 'box-shadow', 'label' => esc_html__( 'Box Shadow', 'ssc' ), 'selector' => '.slmm li ul'),
                                    array('property' => 'border', 'label' => esc_html__( 'Border', 'ssc' ), 'selector' => '.slmm li ul'),
                                    array('property' => 'border-radius', 'label' => esc_html__( 'Border Radius', 'ssc' ), 'selector' => '.slmm li ul'),
                                ),
                                'Item Box 2 lvl' => array(
                                    array('property' => 'display', 'label' => esc_html__( 'Display', 'ssc' ), 'selector' => '.slmm li ul li'),
                                    array('property' => 'float', 'label' => esc_html__( 'Position left/right', 'ssc' ), 'selector' => '.slmm li ul li'),
                                    array('property' => 'line-height', 'label' => esc_html__( 'Line Height', 'ssc' ), 'selector' => '.slmm li ul li'),
                                    array('property' => 'text-align', 'label' => esc_html__( 'Text Align', 'ssc' ), 'selector' => '.slmm li ul li'),
                                    array('property' => 'background', 'selector' => '.slmm li ul li'),
                                    array('property' => 'background', 'label' => esc_html__( 'Background for active item', 'ssc' ), 'selector' => '.slmm li ul li.current-menu-item'),
                                    array('property' => 'height', 'label' => esc_html__( 'Height', 'ssc' ), 'selector' => '.slmm li ul li'),
                                    array('property' => 'width', 'label' => esc_html__( 'Width', 'ssc' ), 'selector' => '.slmm li ul li'),
                                    array('property' => 'min-width', 'label' => esc_html__( 'Min-Width', 'ssc' ), 'selector' => '.slmm li ul li'),
                                    array('property' => 'border', 'label' => esc_html__( 'Border', 'ssc' ), 'selector' => '.slmm li ul li'),
                                    array('property' => 'border', 'label' => esc_html__( 'Border Last Child', 'ssc' ), 'selector' => '.slm-sub-menu li:last-child'),
                                    array('property' => 'border-radius', 'label' => esc_html__( 'Border Radius', 'ssc' ), 'selector' => '.slmm li ul li'),
                                    array('property' => 'padding', 'label' => esc_html__( 'Padding', 'ssc' ), 'selector' => '.slmm li ul li'),
                                    array('property' => 'margin', 'label' => esc_html__( 'Margin', 'ssc' ), 'selector' => '.slmm li ul li'),
                                ),
                                'Item 2 lvl' => array(
                                    array('property' => 'font-size', 'label' => esc_html__( 'Font Size', 'ssc' ), 'selector' => '.slmm li ul li a, .slmm li ul li > span'),
                                    array('property' => 'line-height', 'label' => esc_html__( 'Line Height', 'ssc' ), 'selector' => '.slmm li ul li a, .slmm li ul li > span'),
                                    array('property' => 'color', 'label' => esc_html__( 'Color', 'ssc' ), 'selector' => '.slmm li ul li a, .slmm li ul li > span'),
                                    array('property' => 'color', 'label' => esc_html__( 'Color on Active', 'ssc' ), 'selector' => '.slmm li ul li.current-menu-item a, .slmm li ul li.current-menu-item span'),
                                    array('property' => 'font-family', 'label' => esc_html__( 'Font Family', 'ssc' ), 'selector' => '.slmm li ul li a, .slmm li ul li > span'),
                                    array('property' => 'font-weight', 'label' => esc_html__( 'Font Weight', 'ssc' ), 'selector' => '.slmm li ul li a, .slmm li ul li > span'),
                                    array('property' => 'font-style', 'label' => esc_html__( 'Font Style', 'ssc' ), 'selector' => '.slmm li ul li a, .slmm li ul li > span'),
                                    array('property' => 'text-transform', 'label' => esc_html__( 'Text Transform', 'ssc' ), 'selector' => '.slmm li ul li a, .slmm li ul li > span'),
                                    array('property' => 'text-decoration', 'label' => esc_html__( 'Text Decoration', 'ssc' ), 'selector' => '.slmm li ul li a span, .slmm li ul li > span'),
                                    array('property' => 'background', 'label' => esc_html__( 'Background', 'ssc' ), 'selector' => '.slmm li ul li a, .slmm li ul li > span'),
                                    array('property' => 'background', 'label' => esc_html__( 'Background on Active', 'ssc' ), 'selector' => '.slmm li ul li.current-menu-item a, .slmm li ul li.current-menu-item > span'),
                                    array('property' => 'border', 'label' => esc_html__( 'Border', 'ssc' ), 'selector' => '.slmm li ul li a, .slmm li ul li > span'),
                                    array('property' => 'border', 'label' => esc_html__( 'Border Last Child', 'ssc' ), 'selector' => '.slm-sub-menu li:last-child > a, .slm-sub-menu li:last-child > span'),
                                    array('property' => 'border-radius', 'label' => esc_html__( 'Border Radius', 'ssc' ), 'selector' => '.slmm li ul li a, .slmm li ul li > span'),
                                    array('property' => 'padding', 'label' => esc_html__( 'Padding', 'ssc' ), 'selector' => '.slmm li ul li a, .slmm li ul li > span'),
                                    array('property' => 'margin', 'label' => esc_html__( 'Margin', 'ssc' ), 'selector' => '.slmm li ul li a, .slmm li ul li > span'),
                                ),
                                'Icon 2 lvl' => array(
                                    array('property' => 'font-size', 'label' => esc_html__( 'Font Size', 'ssc' ), 'selector' => '.slmm li ul li a i'),
                                    array('property' => 'height', 'label' => esc_html__( 'Image Height', 'ssc' ), 'selector' => '.slmm li ul li a i, .slmm li ul li a img'),
                                    array('property' => 'width', 'label' => esc_html__( 'Image Width', 'ssc' ), 'selector' => '.slmm li ul li a i, .slmm li ul li a img'),
                                    array('property' => 'color', 'label' => esc_html__( 'Color', 'ssc' ), 'selector' => '.slmm li ul li a i, .slmm li ul li a img'),
                                    array('property' => 'color', 'label' => esc_html__( 'Color on Active', 'ssc' ), 'selector' => '.slm-mega-item li ul li.current-menu-item i'),
                                    array('property' => 'display', 'label' => esc_html__( 'Display', 'ssc' ), 'selector' => '.slmm li ul li a i, .slmm li ul li a img'),
                                    array('property' => 'float', 'label' => esc_html__( 'Float', 'ssc' ), 'selector' => '.slmm li ul li a i, .slmm li ul li a img'),
                                    array('property' => 'line-height', 'label' => esc_html__( 'Line Height', 'ssc' ), 'selector' => '.slmm li ul li a i, .slmm li ul li a img'),
                                    array('property' => 'background', 'label' => esc_html__( 'Background', 'ssc' ), 'selector' => '.slmm li ul li a i, .slmm li ul li a img'),
                                    array('property' => 'background', 'label' => esc_html__( 'Background on Active', 'ssc' ), 'selector' => '.slmm li ul li.current-menu-item i, .slmm li ul li.current-menu-item img'),
                                    array('property' => 'border', 'label' => esc_html__( 'Border', 'ssc' ), 'selector' => '.slmm li ul li a i, .slmm li ul li a img'),
                                    array('property' => 'border-radius', 'label' => esc_html__( 'Border Radius', 'ssc' ), 'selector' => '.slmm li ul li a i, .slmm li ul li a img'),
                                    array('property' => 'padding', 'label' => esc_html__( 'Padding', 'ssc' ), 'selector' => '.slmm li ul li a i, .slmm li ul li a img'),
                                    array('property' => 'margin', 'label' => esc_html__( 'Margin', 'ssc' ), 'selector' => '.slmm li ul li a i, .slmm li ul li a img'),
                                ),
                                'Caret 2 lvl' => array(
                                    array('property' => 'font-size', 'label' => esc_html__( 'Font Size', 'ssc' ), 'selector' => '.slmm li ul li .caret'),
                                    array('property' => 'color', 'label' => esc_html__( 'Color', 'ssc' ), 'selector' => '.slmm li ul li .caret'),
                                    array('property' => 'color', 'label' => esc_html__( 'Color on Active', 'ssc' ), 'selector' => '.slmm li.current-menu-item .caret'),
                                    array('property' => 'display', 'label' => esc_html__( 'Display', 'ssc' ), 'selector' => '.slmm li ul li .caret'),
                                    array('property' => 'float', 'label' => esc_html__( 'Float', 'ssc' ), 'selector' => '.slmm li ul li .caret'),
                                    array('property' => 'line-height', 'label' => esc_html__( 'Line Height', 'ssc' ), 'selector' => '.slmm li ul li .caret'),
                                    array('property' => 'background', 'label' => esc_html__( 'Background', 'ssc' ), 'selector' => '.slmm li ul li .caret'),
                                    array('property' => 'background', 'label' => esc_html__( 'Background on Active', 'ssc' ), 'selector' => '.slmm li.current-menu-item .caret'),
                                    array('property' => 'border', 'label' => esc_html__( 'Border', 'ssc' ), 'selector' => '.slmm li ul li .caret'),
                                    array('property' => 'border-radius', 'label' => esc_html__( 'Border Radius', 'ssc' ), 'selector' => '.slmm li ul li .caret'),
                                    array('property' => 'padding', 'label' => esc_html__( 'Padding', 'ssc' ), 'selector' => '.slmm li ul li .caret'),
                                    array('property' => 'margin', 'label' => esc_html__( 'Margin', 'ssc' ), 'selector' => '.slmm li ul li .caret'),
                                ),
                                'Box 3 lvl' => array(
                                    array('property' => 'width', 'label' => esc_html__( 'Width', 'ssc' ), 'selector' => '.slmm li ul li ul'),
                                    array('property' => 'height', 'label' => esc_html__( 'Height', 'ssc' ), 'selector' => '.slmm li ul li ul'),
                                    array('property' => 'text-align', 'label' => esc_html__( 'Text Align', 'ssc' ), 'selector' => '.slmm li ul li ul'),
                                    array('property' => 'margin', 'label' => esc_html__( 'Margin', 'ssc' ), 'selector' => '.slmm li ul li ul'),
                                    array('property' => 'padding', 'label' => esc_html__( 'Padding', 'ssc' ), 'selector' => '.slmm li ul li ul'),
                                    array('property' => 'background', 'selector' => '.slmm li ul li ul'),
                                    array('property' => 'box-shadow', 'label' => esc_html__( 'Box Shadow', 'ssc' ), 'selector' => '.slmm li ul li ul'),
                                    array('property' => 'border', 'label' => esc_html__( 'Border', 'ssc' ), 'selector' => '.slmm li ul li ul'),
                                    array('property' => 'border-radius', 'label' => esc_html__( 'Border Radius', 'ssc' ), 'selector' => '.slmm li ul li ul'),
                                ),
                                'Item Box 3 lvl' => array(
                                    array('property' => 'display', 'label' => esc_html__( 'Display', 'ssc' ), 'selector' => '.slmm li ul li ul li'),
                                    array('property' => 'float', 'label' => esc_html__( 'Float', 'ssc' ), 'selector' => '.slmm li ul li ul li'),
                                    array('property' => 'line-height', 'label' => esc_html__( 'Line Height', 'ssc' ), 'selector' => '.slmm li ul li ul li'),
                                    array('property' => 'text-align', 'label' => esc_html__( 'Text Align', 'ssc' ), 'selector' => '.slmm li ul li ul li'),
                                    array('property' => 'background', 'selector' => '.slmm li ul li ul li'),
                                    array('property' => 'background', 'label' => esc_html__( 'Background for active item', 'ssc' ), 'selector' => '.slmm li ul li ul li.current-menu-item'),
                                    array('property' => 'height', 'label' => esc_html__( 'Height', 'ssc' ), 'selector' => '.slmm li ul li ul li'),
                                    array('property' => 'border', 'label' => esc_html__( 'Border', 'ssc' ), 'selector' => '.slmm li ul li ul li'),
                                    array('property' => 'border', 'label' => esc_html__( 'Border', 'ssc' ), 'selector' => '.slm-sub-menu li:last-child'),
                                    array('property' => 'border-radius', 'label' => esc_html__( 'Border Radius', 'ssc' ), 'selector' => '.slmm li ul li ul li'),
                                    array('property' => 'padding', 'label' => esc_html__( 'Padding', 'ssc' ), 'selector' => '.slmm li ul li ul li'),
                                    array('property' => 'margin', 'label' => esc_html__( 'Margin', 'ssc' ), 'selector' => '.slmm li ul li ul li'),
                                ),
                                'Item 3 lvl' => array(
                                    array('property' => 'font-size', 'label' => esc_html__( 'Font Size', 'ssc' ), 'selector' => '.slmm li ul li ul li a, .slmm li ul li ul li > span'),
                                    array('property' => 'line-height', 'label' => esc_html__( 'Line Height', 'ssc' ), 'selector' => '.slmm li ul li ul li a, .slmm li ul li ul li > span'),
                                    array('property' => 'color', 'label' => esc_html__( 'Color', 'ssc' ), 'selector' => '.slmm li ul li ul li a, .slmm li ul li ul li > span'),
                                    array('property' => 'color', 'label' => esc_html__( 'Color on Active', 'ssc' ), 'selector' => '.slm-mega-item li ul li ul li.current-menu-item a, .slm-mega-item li ul li ul li.current-menu-item > span'),
                                    array('property' => 'font-family', 'label' => esc_html__( 'Font Family', 'ssc' ), 'selector' => '.slmm li ul li ul li a, .slmm li ul li ul li > span'),
                                    array('property' => 'font-weight', 'label' => esc_html__( 'Font Weight', 'ssc' ), 'selector' => '.slmm li ul li ul li a, .slmm li ul li ul li > span'),
                                    array('property' => 'font-style', 'label' => esc_html__( 'Font Style', 'ssc' ), 'selector' => '.slmm li ul li ul li a, .slmm li ul li ul li > span'),
                                    array('property' => 'text-transform', 'label' => esc_html__( 'Text Transform', 'ssc' ), 'selector' => '.slmm li ul li ul li a, .slmm li ul li ul li > span'),
                                    array('property' => 'text-decoration', 'label' => esc_html__( 'Text Decoration', 'ssc' ), 'selector' => '.slmm li ul li ul li a span, .slmm li ul li ul li > span'),
                                    array('property' => 'background', 'label' => esc_html__( 'Background', 'ssc' ), 'selector' => '.slmm li ul li ul li a, .slmm li ul li ul li > span'),
                                    array('property' => 'background', 'label' => esc_html__( 'Background on Active', 'ssc' ), 'selector' => '.slmm li ul li ul li.current-menu-item a, .slmm li ul li ul li.current-menu-item > span'),
                                    array('property' => 'border', 'label' => esc_html__( 'Border', 'ssc' ), 'selector' => '.slmm li ul li ul li a, .slmm li ul li ul li > span'),
                                    array('property' => 'border-radius', 'label' => esc_html__( 'Border Radius', 'ssc' ), 'selector' => '.slmm li ul li ul li a, .slmm li ul li ul li > span'),
                                    array('property' => 'padding', 'label' => esc_html__( 'Padding', 'ssc' ), 'selector' => '.slmm li ul li ul li a, .slmm li ul li ul li > span'),
                                    array('property' => 'margin', 'label' => esc_html__( 'Margin', 'ssc' ), 'selector' => '.slmm li ul li ul li a, .slmm li ul li ul li > span'),
                                ),
                                'Icon 3 lvl' => array(
                                    array('property' => 'font-size', 'label' => esc_html__( 'Font Size', 'ssc' ), 'selector' => '.slmm li ul li ul li i'),
                                    array('property' => 'height', 'label' => esc_html__( 'Image Height', 'ssc' ), 'selector' => '.slmm li ul li a i, .slmm li ul li ul li img'),
                                    array('property' => 'width', 'label' => esc_html__( 'Image Width', 'ssc' ), 'selector' => '.slmm li ul li a i, .slmm li ul li ul li img'),
                                    array('property' => 'color', 'label' => esc_html__( 'Color', 'ssc' ), 'selector' => '.slmm li ul li ul li i, .slmm li ul li ul li img'),
                                    array('property' => 'color', 'label' => esc_html__( 'Color on Active', 'ssc' ), 'selector' => '.slm-mega-item li ul li ul li.current-menu-item i'),
                                    array('property' => 'display', 'label' => esc_html__( 'Display', 'ssc' ), 'selector' => '.slmm li ul li ul li i, .slmm li ul li ul li img'),
                                    array('property' => 'float', 'label' => esc_html__( 'Float', 'ssc' ), 'selector' => '.slmm li ul li ul li i, .slmm li ul li ul li img'),
                                    array('property' => 'line-height', 'label' => esc_html__( 'Line Height', 'ssc' ), 'selector' => '.slmm li ul li ul li i, .slmm li ul li ul li img'),
                                    array('property' => 'background', 'label' => esc_html__( 'Background', 'ssc' ), 'selector' => '.slmm li ul li ul li i, .slmm li ul li ul li img'),
                                    array('property' => 'background', 'label' => esc_html__( 'Background on Active', 'ssc' ), 'selector' => '.slmm li ul li ul li.current-menu-item i, .slmm li ul li ul li.current-menu-item img'),
                                    array('property' => 'border', 'label' => esc_html__( 'Border', 'ssc' ), 'selector' => '.slmm li ul li ul li i, .slmm li ul li ul li img'),
                                    array('property' => 'border-radius', 'label' => esc_html__( 'Border Radius', 'ssc' ), 'selector' => '.slmm li ul li ul li i, .slmm li ul li ul li img'),
                                    array('property' => 'padding', 'label' => esc_html__( 'Padding', 'ssc' ), 'selector' => '.slmm li ul li ul li i, .slmm li ul li ul li img'),
                                    array('property' => 'margin', 'label' => esc_html__( 'Margin', 'ssc' ), 'selector' => '.slmm li ul li ul li i, .slmm li ul li ul li img'),
                                ),
                                'Mega Menu Box' => array(
                                    array('property' => 'height', 'label' => esc_html__( 'Height', 'ssc' ), 'selector' => '.slmm li.slm-mega-block > ul'),
                                    array('property' => 'background', 'selector' => '.slmm li.slm-mega-block > ul'),
                                    array('property' => 'margin', 'label' => esc_html__( 'Margin', 'ssc' ), 'selector' => '.slmm li.slm-mega-block > ul'),
                                    array('property' => 'padding', 'label' => esc_html__( 'Padding', 'ssc' ), 'selector' => '.slmm li.slm-mega-block > ul'),
                                    array('property' => 'box-shadow', 'label' => esc_html__( 'Box Shadow', 'ssc' ), 'selector' => '.slmm li.slm-mega-block > ul'),
                                    array('property' => 'border', 'label' => esc_html__( 'Border', 'ssc' ), 'selector' => '.slmm li.slm-mega-block > ul'),
                                    array('property' => 'border-radius', 'label' => esc_html__( 'Border Radius', 'ssc' ), 'selector' => '.slmm li.slm-mega-block > ul'),
                                ),
                                'Column Box' => array(
	                                array('property' => 'display', 'label' => esc_html__( 'Display', 'ssc' ), 'selector' => '.slmm li.slmm-column'),
	                                array('property' => 'float', 'label' => esc_html__( 'Float', 'ssc' ), 'selector' => '.slmm li.slmm-column'),
	                                array('property' => 'line-height', 'label' => esc_html__( 'Line Height', 'ssc' ), 'selector' => '.slmm li.slmm-column'),
	                                array('property' => 'text-align', 'label' => esc_html__( 'Text Align', 'ssc' ), 'selector' => '.slmm li.slmm-column'),
	                                array('property' => 'background', 'selector' => '.slmm li.slmm-column'),
	                                array('property' => 'background', 'label' => esc_html__( 'Background for active item', 'ssc' ), 'selector' => '.slmm li.slmm-column.current-menu-item'),
	                                array('property' => 'height', 'label' => esc_html__( 'Height', 'ssc' ), 'selector' => '.slmm li.slmm-column'),
	                                array('property' => 'width', 'label' => esc_html__( 'Width', 'ssc' ), 'selector' => '.slmm li.slmm-column'),
	                                array('property' => 'border', 'label' => esc_html__( 'Border', 'ssc' ), 'selector' => '.slmm li.slmm-column'),
	                                array('property' => 'border', 'label' => esc_html__( 'Border Last Child', 'ssc' ), 'selector' => '.slm-sub-menu li.slmm-column:last-child'),
	                                array('property' => 'border-radius', 'label' => esc_html__( 'Border Radius', 'ssc' ), 'selector' => '.slmm li.slmm-column'),
	                                array('property' => 'padding', 'label' => esc_html__( 'Padding', 'ssc' ), 'selector' => '.slmm li.slmm-column'),
	                                array('property' => 'padding', 'label' => esc_html__( 'Padding', 'ssc' ), 'selector' => '.slmm li.slmm-column:last-child'),
	                                array('property' => 'margin', 'label' => esc_html__( 'Margin', 'ssc' ), 'selector' => '.slmm li.slmm-column'),
                                ),
                                'Column Item' => array(
	                                array('property' => 'font-size', 'label' => esc_html__( 'Font Size', 'ssc' ), 'selector' => '.slmm li.slmm-column > a, .slmm li.slmm-column > span'),
	                                array('property' => 'line-height', 'label' => esc_html__( 'Line Height', 'ssc' ), 'selector' => '.slmm li.slmm-column > a, .slmm li.slmm-column > span'),
	                                array('property' => 'color', 'label' => esc_html__( 'Color', 'ssc' ), 'selector' => '.slmm li.slmm-column > a, .slmm li.slmm-column > span'),
	                                array('property' => 'color', 'label' => esc_html__( 'Color on Active', 'ssc' ), 'selector' => '.slmm li.current-menu-item a, .slmm li.current-menu-item span'),
	                                array('property' => 'font-family', 'label' => esc_html__( 'Font Family', 'ssc' ), 'selector' => '.slmm li.slmm-column > a, .slmm li.slmm-column > span'),
	                                array('property' => 'font-weight', 'label' => esc_html__( 'Font Weight', 'ssc' ), 'selector' => '.slmm li.slmm-column > a, .slmm li.slmm-column > span'),
	                                array('property' => 'font-style', 'label' => esc_html__( 'Font Style', 'ssc' ), 'selector' => '.slmm li.slmm-column > a, .slmm li.slmm-column > span'),
	                                array('property' => 'text-transform', 'label' => esc_html__( 'Text Transform', 'ssc' ), 'selector' => '.slmm li.slmm-column > a, .slmm li.slmm-column > span'),
	                                array('property' => 'text-decoration', 'label' => esc_html__( 'Text Decoration', 'ssc' ), 'selector' => '.slmm li a span, .slmm li > span'),
	                                array('property' => 'background', 'label' => esc_html__( 'Background', 'ssc' ), 'selector' => '.slmm li.slmm-column > a, .slmm li.slmm-column > span'),
	                                array('property' => 'background', 'label' => esc_html__( 'Background on Active', 'ssc' ), 'selector' => '.slmm li.current-menu-item a, .slmm li.current-menu-item > span'),
	                                array('property' => 'border', 'label' => esc_html__( 'Border', 'ssc' ), 'selector' => '.slmm li.slmm-column > a, .slmm li.slmm-column > span'),
	                                array('property' => 'border', 'label' => esc_html__( 'Border Last Child', 'ssc' ), 'selector' => '.slm-sub-menu li:last-child > a, .slm-sub-menu li:last-child > span'),
	                                array('property' => 'border-radius', 'label' => esc_html__( 'Border Radius', 'ssc' ), 'selector' => '.slmm li.slmm-column > a, .slmm li.slmm-column > span'),
	                                array('property' => 'padding', 'label' => esc_html__( 'Padding', 'ssc' ), 'selector' => '.slmm li.slmm-column > a, .slmm li.slmm-column > span'),
	                                array('property' => 'margin', 'label' => esc_html__( 'Margin', 'ssc' ), 'selector' => '.slmm li.slmm-column > a, .slmm li.slmm-column > span'),
                                ),
                                'Composer Block Box' => array(
	                                array('property' => 'width', 'label' => esc_html__( 'Width', 'ssc' ), 'selector' => '.slm-composer-block-widget'),
	                                array('property' => 'height', 'label' => esc_html__( 'Height', 'ssc' ), 'selector' => '.slm-composer-block-widget'),
	                                array('property' => 'background', 'selector' => '.slm-composer-block-widget'),
	                                array('property' => 'margin', 'label' => esc_html__( 'Margin', 'ssc' ), 'selector' => '.slm-composer-block-widget'),
	                                array('property' => 'padding', 'label' => esc_html__( 'Padding', 'ssc' ), 'selector' => '.slm-composer-block-widget'),
	                                array('property' => 'box-shadow', 'label' => esc_html__( 'Box Shadow', 'ssc' ), 'selector' => '.slm-composer-block-widget'),
	                                array('property' => 'border', 'label' => esc_html__( 'Border', 'ssc' ), 'selector' => '.slm-composer-block-widget'),
	                                array('property' => 'border-radius', 'label' => esc_html__( 'Border Radius', 'ssc' ), 'selector' => '.slm-composer-block-widget'),
                                ),
                            ),
                            array(
                                'screens' => "999,768,667,479",
                                'Wrapper' => array(
	                                array('property' => 'text-align', 'label' => esc_html__( 'Text Align', 'ssc' ), 'selector' => '+.ssc_menu'),
	                                array('property' => 'display', 'label' => esc_html__( 'Display', 'ssc' ), 'selector' => '+.ssc_menu'),
	                                array('property' => 'float', 'label' => esc_html__( 'Float', 'ssc' ), 'selector' => '+.ssc_menu'),
	                                array('property' => 'width', 'label' => esc_html__( 'Width', 'ssc' ), 'selector' => '+.ssc_menu'),
	                                array('property' => 'height', 'label' => esc_html__( 'Height', 'ssc' ), 'selector' => '+.ssc_menu'),
	                                array('property' => 'margin', 'label' => esc_html__( 'Margin', 'ssc' ), 'selector' => '+.ssc_menu'),
	                                array('property' => 'padding', 'label' => esc_html__( 'Padding', 'ssc' ), 'selector' => '+.ssc_menu'),
	                                array('property' => 'border', 'label' => esc_html__( 'Border', 'ssc' ), 'selector' => '+.ssc_menu'),
	                                array('property' => 'border-radius', 'label' => esc_html__( 'Border Radius', 'ssc' ), 'selector' => '+.ssc_menu'),
                                ),
                                'Box' => array(

                                    array('property' => 'width', 'label' => esc_html__( 'Width', 'ssc' ), 'selector' => '.slmm, .slmm-respmenu'),
                                    array('property' => 'height', 'label' => esc_html__( 'Height', 'ssc' ), 'selector' => '.slmm, .slmm-respmenu'),
                                    array('property' => 'text-align', 'label' => esc_html__( 'Text Align', 'ssc' ), 'selector' => '.slmm, .slmm-respmenu'),
                                    array('property' => 'float', 'label' => esc_html__( 'Position left/right', 'ssc' ), 'selector' => '.slmm, .slmm-respmenu'),
	                                array('property' => 'display', 'label' => esc_html__( 'Display', 'ssc' ), 'selector' => '.slmm, .slmm-respmenu'),
                                    array('property' => 'margin', 'label' => esc_html__( 'Margin', 'ssc' ), 'selector' => '.slmm, .slmm-respmenu'),
                                    array('property' => 'padding', 'label' => esc_html__( 'Padding', 'ssc' ), 'selector' => '.slmm, .slmm-respmenu'),
                                    array('property' => 'background', 'selector' => '.slmm, .slmm-respmenu'),
                                    array('property' => 'box-shadow', 'label' => esc_html__( 'Box Shadow', 'ssc' ), 'selector' => '.slmm, .slmm-respmenu'),
                                    array('property' => 'border', 'label' => esc_html__( 'Border', 'ssc' ), 'selector' => '.slmm, .slmm-respmenu'),
                                    array('property' => 'border-radius', 'label' => esc_html__( 'Border Radius', 'ssc' ), 'selector' => '.slmm, .slmm-respmenu'),

                                ),
                                'Box 1 Lvl' => array(
	                                array('property' => 'display', 'label' => esc_html__( 'Display', 'ssc' ), 'selector' => '.slmm'),
	                                array('property' => 'float', 'label' => esc_html__( 'Float', 'ssc' ), 'selector' => '.slmm'),
	                                array('property' => 'line-height', 'label' => esc_html__( 'Line Height', 'ssc' ), 'selector' => '.slmm'),
	                                array('property' => 'text-align', 'label' => esc_html__( 'Text Align', 'ssc' ), 'selector' => '.slmm'),
	                                array('property' => 'background', 'selector' => '.slmm'),
	                                array('property' => 'height', 'label' => esc_html__( 'Height', 'ssc' ), 'selector' => '.slmm'),
	                                array('property' => 'width', 'label' => esc_html__( 'Width', 'ssc' ), 'selector' => '.slmm'),
	                                array('property' => 'border', 'label' => esc_html__( 'Border', 'ssc' ), 'selector' => '.slmm'),
	                                array('property' => 'border', 'label' => esc_html__( 'Border Last Child', 'ssc' ), 'selector' => '.slm-sub-menu li:last-child'),
	                                array('property' => 'border-radius', 'label' => esc_html__( 'Border Radius', 'ssc' ), 'selector' => '.slmm'),
	                                array('property' => 'padding', 'label' => esc_html__( 'Padding', 'ssc' ), 'selector' => '.slmm'),
	                                array('property' => 'margin', 'label' => esc_html__( 'Margin', 'ssc' ), 'selector' => '.slmm'),
                                ),
                                'Item Box' => array(
                                    array('property' => 'display', 'label' => esc_html__( 'Display', 'ssc' ), 'selector' => '.slmm li'),
                                    array('property' => 'float', 'label' => esc_html__( 'Float', 'ssc' ), 'selector' => '.slmm li'),
                                    array('property' => 'line-height', 'label' => esc_html__( 'Line Height', 'ssc' ), 'selector' => '.slmm li'),
                                    array('property' => 'text-align', 'label' => esc_html__( 'Text Align', 'ssc' ), 'selector' => '.slmm li'),
                                    array('property' => 'background', 'selector' => '.slmm li'),
                                    array('property' => 'background', 'label' => esc_html__( 'Background for active item', 'ssc' ), 'selector' => '.slmm li.current-menu-item'),
                                    array('property' => 'height', 'label' => esc_html__( 'Height', 'ssc' ), 'selector' => '.slmm li'),
                                    array('property' => 'width', 'label' => esc_html__( 'Width', 'ssc' ), 'selector' => '.slmm li'),
                                    array('property' => 'border', 'label' => esc_html__( 'Border', 'ssc' ), 'selector' => '.slmm li'),
                                    array('property' => 'border-radius', 'label' => esc_html__( 'Border Radius', 'ssc' ), 'selector' => '.slmm li'),
                                    array('property' => 'padding', 'label' => esc_html__( 'Padding', 'ssc' ), 'selector' => '.slmm li'),
                                    array('property' => 'margin', 'label' => esc_html__( 'Margin', 'ssc' ), 'selector' => '.slmm li'),
                                ),
                                'Item' => array(
                                    array('property' => 'font-size', 'label' => esc_html__( 'Font Size', 'ssc' ), 'selector' => '.slmm li a, .slmm li > span'),
                                    array('property' => 'line-height', 'label' => esc_html__( 'Line Height', 'ssc' ), 'selector' => '.slmm li a, .slmm li > span'),
                                    array('property' => 'color', 'label' => esc_html__( 'Color', 'ssc' ), 'selector' => '.slmm li a, .slmm li > span'),
                                    array('property' => 'color', 'label' => esc_html__( 'Color on Active', 'ssc' ), 'selector' => '.slmm li.current-menu-item a, .slmm li.current-menu-item > span'),
                                    array('property' => 'font-weight', 'label' => esc_html__( 'Font Weight', 'ssc' ), 'selector' => '.slmm li a, .slmm li > span'),
                                    array('property' => 'text-transform', 'label' => esc_html__( 'Text Transform', 'ssc' ), 'selector' => '.slmm li a, .slmm li > span'),
                                    array('property' => 'text-decoration', 'label' => esc_html__( 'Text Decoration', 'ssc' ), 'selector' => '.slmm li a span, .slmm li > span'),
                                    array('property' => 'background', 'label' => esc_html__( 'Background', 'ssc' ), 'selector' => '.slmm li a, .slmm li > span'),
                                    array('property' => 'background', 'label' => esc_html__( 'Background on Active', 'ssc' ), 'selector' => '.slmm li.current-menu-item a'),
                                    array('property' => 'border', 'label' => esc_html__( 'Border', 'ssc' ), 'selector' => '.slmm li a, .slmm li > span'),
                                    array('property' => 'border-radius', 'label' => esc_html__( 'Border Radius', 'ssc' ), 'selector' => '.slmm li a, .slmm li > span'),
                                    array('property' => 'padding', 'label' => esc_html__( 'Padding', 'ssc' ), 'selector' => '.slmm li a, .slmm li > span'),
                                    array('property' => 'margin', 'label' => esc_html__( 'Margin', 'ssc' ), 'selector' => '.slmm li a, .slmm li > span'),
                                ),
                                'Icon' => array(
                                    array('property' => 'font-size', 'label' => esc_html__( 'Font Size', 'ssc' ), 'selector' => '.slmm li i'),
                                    array('property' => 'height', 'label' => esc_html__( 'Image Height', 'ssc' ), 'selector' => '.slmm li i, .slmm li img'),
                                    array('property' => 'width', 'label' => esc_html__( 'Image Width', 'ssc' ), 'selector' => '.slmm li i, .slmm li img'),
                                    array('property' => 'color', 'label' => esc_html__( 'Color', 'ssc' ), 'selector' => '.slmm li i, .slmm li img'),
                                    array('property' => 'color', 'label' => esc_html__( 'Color on Active', 'ssc' ), 'selector' => '.slmm li.current-menu-item i'),
                                    array('property' => 'display', 'label' => esc_html__( 'Display', 'ssc' ), 'selector' => '.slmm li i, .slmm li img'),
                                    array('property' => 'float', 'label' => esc_html__( 'Float', 'ssc' ), 'selector' => '.slmm li i, .slmm li img'),
                                    array('property' => 'line-height', 'label' => esc_html__( 'Line Height', 'ssc' ), 'selector' => '.slmm li i, .slmm li img'),
                                    array('property' => 'background', 'label' => esc_html__( 'Background', 'ssc' ), 'selector' => '.slmm li i, .slmm li img'),
                                    array('property' => 'background', 'label' => esc_html__( 'Background on Active', 'ssc' ), 'selector' => '.slmm li.current-menu-item i, .slmm li.current-menu-item img'),
                                    array('property' => 'border', 'label' => esc_html__( 'Border', 'ssc' ), 'selector' => '.slmm li i, .slmm li img'),
                                    array('property' => 'border-radius', 'label' => esc_html__( 'Border Radius', 'ssc' ), 'selector' => '.slmm li i, .slmm li img'),
                                    array('property' => 'padding', 'label' => esc_html__( 'Padding', 'ssc' ), 'selector' => '.slmm li i, .slmm li img'),
                                    array('property' => 'margin', 'label' => esc_html__( 'Margin', 'ssc' ), 'selector' => '.slmm li i, .slmm li img'),
                                ),
                                'Caret' => array(
                                    array('property' => 'font-size', 'label' => esc_html__( 'Font Size', 'ssc' ), 'selector' => '.slmm li .caret'),
                                    array('property' => 'color', 'label' => esc_html__( 'Color', 'ssc' ), 'selector' => '.slmm li .caret'),
                                    array('property' => 'color', 'label' => esc_html__( 'Color on Active', 'ssc' ), 'selector' => '.slmm li.current-menu-item .caret'),
                                    array('property' => 'display', 'label' => esc_html__( 'Display', 'ssc' ), 'selector' => '.slmm li .caret'),
                                    array('property' => 'float', 'label' => esc_html__( 'Float', 'ssc' ), 'selector' => '.slmm li .caret'),
                                    array('property' => 'line-height', 'label' => esc_html__( 'Line Height', 'ssc' ), 'selector' => '.slmm li .caret'),
                                    array('property' => 'background', 'label' => esc_html__( 'Background', 'ssc' ), 'selector' => '.slmm li .caret'),
                                    array('property' => 'background', 'label' => esc_html__( 'Background on Active', 'ssc' ), 'selector' => '.slmm li.current-menu-item .caret'),
                                    array('property' => 'border', 'label' => esc_html__( 'Border', 'ssc' ), 'selector' => '.slmm li .caret'),
                                    array('property' => 'border-radius', 'label' => esc_html__( 'Border Radius', 'ssc' ), 'selector' => '.slmm li .caret'),
                                    array('property' => 'padding', 'label' => esc_html__( 'Padding', 'ssc' ), 'selector' => '.slmm li .caret'),
                                    array('property' => 'margin', 'label' => esc_html__( 'Margin', 'ssc' ), 'selector' => '.slmm li .caret'),
                                ),
                                'Search' => array(
                                    // Icon
                                    array('property' => 'font-size', 'label' => esc_html__( 'Icon Font Size', 'ssc' ), 'selector' => '.slm-mega-item .slm-search-icon i.menu-item-icon'),
                                    array('property' => 'line-height', 'label' => esc_html__( 'Icon Line Height', 'ssc' ), 'selector' => '.slm-mega-item .slm-search-icon i.menu-item-icon'),
                                    array('property' => 'color', 'label' => esc_html__( 'Icon Color', 'ssc' ), 'selector' => '.slm-mega-item .slm-search-icon i.menu-item-icon'),
                                    array('property' => 'float', 'label' => esc_html__( 'Block Float', 'ssc' ), 'selector' => '.slmm .slm-search-menu-item.slm-mega-item'),
                                    array('property' => 'background', 'label' => esc_html__( 'Icon Background', 'ssc' ), 'selector' => '.slm-mega-item .slm-search-icon i.menu-item-icon'),
                                    array('property' => 'border', 'label' => esc_html__( 'Icon Border', 'ssc' ), 'selector' => '.slm-mega-item .slm-search-icon i.menu-item-icon'),
                                    array('property' => 'border-radius', 'label' => esc_html__( 'Icon Border Radius', 'ssc' ), 'selector' => '.slm-mega-item .slm-search-icon i.menu-item-icon'),
                                    array('property' => 'padding', 'label' => esc_html__( 'Icon Padding', 'ssc' ), 'selector' => '.slm-mega-item .slm-search-icon i.menu-item-icon'),
                                    array('property' => 'margin', 'label' => esc_html__( 'Icon Margin', 'ssc' ), 'selector' => '.slm-mega-item .slm-search-icon i.menu-item-icon'),
                                    // Input
                                    array('property' => 'font-size', 'label' => esc_html__( 'Input Font Size', 'ssc' ), 'selector' => '.slmm .slm-search-block .slm-search-input'),
                                    array('property' => 'line-height', 'label' => esc_html__( 'Input Line Height', 'ssc' ), 'selector' => '.slmm .slm-search-block .slm-search-input'),
                                    array('property' => 'width', 'label' => esc_html__( 'Input Width', 'ssc' ), 'selector' => '.slmm .slm-search-block form'),
                                    array('property' => 'color', 'label' => esc_html__( 'Input Text Color', 'ssc' ), 'selector' => '.slmm .slm-search-block .slm-search-input'),
                                    array('property' => 'display', 'label' => esc_html__( 'Input Display', 'ssc' ), 'selector' => '.slmm .slm-search-block .slm-search-input'),
                                    array('property' => 'float', 'label' => esc_html__( 'Input Float', 'ssc' ), 'selector' => '.slmm .slm-search-block .slm-search-input'),
                                    array('property' => 'background', 'label' => esc_html__( 'Input Background', 'ssc' ), 'selector' => '.slmm .slm-search-block .slm-search-input'),
                                    array('property' => 'border', 'label' => esc_html__( 'Input Border', 'ssc' ), 'selector' => '.slmm .slm-search-block .slm-search-input'),
                                    array('property' => 'border-radius', 'label' => esc_html__( 'Input Border Radius', 'ssc' ), 'selector' => '.slmm .slm-search-block .slm-search-input'),
                                    array('property' => 'padding', 'label' => esc_html__( 'Input Padding', 'ssc' ), 'selector' => '.slmm .slm-search-block .slm-search-input'),
                                    array('property' => 'margin', 'label' => esc_html__( 'Form Margin', 'ssc' ), 'selector' => '.slmm .slm-search-block form'),
                                    array('property' => 'margin', 'label' => esc_html__( 'Input Margin', 'ssc' ), 'selector' => '.slmm .slm-search-block .slm-search-input'),
                                    // Close Icon
                                    array('property' => 'color', 'label' => esc_html__( 'Color of Close Icon', 'ssc' ), 'selector' => '.slmm .slm-search-block .slm-search-close'),
                                    array('property' => 'background', 'label' => esc_html__( 'Layout Background', 'ssc' ), 'selector' => '.slmm .slm-search-block'),
                                ),
                                'Cart' => array(
                                    // Icon
                                    array('property' => 'font-size', 'label' => esc_html__( 'Icon Font Size', 'ssc' ), 'selector' => '.slmm li.slm-cart-menu-item i'),
                                    array('property' => 'line-height', 'label' => esc_html__( 'Icon Line Height', 'ssc' ), 'selector' => '.slmm li.slm-cart-menu-item i'),
                                    array('property' => 'color', 'label' => esc_html__( 'Icon Color', 'ssc' ), 'selector' => '.slmm li.slm-cart-menu-item i'),
                                    array('property' => 'float', 'label' => esc_html__( 'Block Float', 'ssc' ), 'selector' => '.slmm .slm-cart-menu-item.slm-mega-item'),
                                    array('property' => 'background', 'label' => esc_html__( 'Icon Background', 'ssc' ), 'selector' => '.slmm li.slm-cart-menu-item i'),
                                    array('property' => 'border', 'label' => esc_html__( 'Icon Border', 'ssc' ), 'selector' => '.slmm li.slm-cart-menu-item i'),
                                    array('property' => 'border-radius', 'label' => esc_html__( 'Icon Border Radius', 'ssc' ), 'selector' => '.slmm li.slm-cart-menu-item i'),
                                    array('property' => 'padding', 'label' => esc_html__( 'Icon Padding', 'ssc' ), 'selector' => '.slmm li.slm-cart-menu-item i'),
                                    array('property' => 'margin', 'label' => esc_html__( 'Icon Margin', 'ssc' ), 'selector' => '.slmm li.slm-cart-menu-item i'),
                                    // Block
                                    array('property' => 'font-size', 'label' => esc_html__( 'Data Font Size', 'ssc' ), 'selector' => '.slmm .slm-cart-menu-item .slm-menu-item-cart-block'),
                                    array('property' => 'line-height', 'label' => esc_html__( 'Data Line Height', 'ssc' ), 'selector' => '.slmm .slm-cart-menu-item .slm-menu-item-cart-block'),
                                    array('property' => 'width', 'label' => esc_html__( 'Data Block Width', 'ssc' ), 'selector' => '.slmm .slm-search-block form'),
                                    array('property' => 'color', 'label' => esc_html__( 'Text Color', 'ssc' ), 'selector' => '.slmm .slm-cart-menu-item .slm-menu-item-cart-block'),
                                    array('property' => 'color', 'label' => esc_html__( 'Header Text Color', 'ssc' ), 'selector' => '.slmm .slm-cart-menu-item .slm-menu-item-cart-block h4'),
                                    array('property' => 'background', 'label' => esc_html__( 'Data Block Background', 'ssc' ), 'selector' => '.slmm .slm-cart-menu-item .slm-menu-item-cart-block'),

                                    array('property' => 'border', 'label' => esc_html__( 'Data Block Border', 'ssc' ), 'selector' => '.slmm .slm-cart-menu-item .slm-menu-item-cart-block'),
                                    array('property' => 'border-radius', 'label' => esc_html__( 'Data Block Border Radius', 'ssc' ), 'selector' => '.slmm .slm-cart-menu-item .slm-menu-item-cart-block'),
                                    array('property' => 'padding', 'label' => esc_html__( 'Data Block Padding', 'ssc' ), 'selector' => '.slmm .slm-cart-menu-item .slm-menu-item-cart-block'),
                                    array('property' => 'margin', 'label' => esc_html__( 'Data Block Margin', 'ssc' ), 'selector' => '.slmm .slm-cart-menu-item .slm-menu-item-cart-block'),
                                    // Cart Link
                                    array('property' => 'font-size', 'label' => esc_html__( 'Cart Link Font Size', 'ssc' ), 'selector' => '.slmm .slm-cart-menu-item .slm-link-to-cart'),
                                    array('property' => 'line-height', 'label' => esc_html__( 'Cart Link Line Height', 'ssc' ), 'selector' => '.slmm .slm-cart-menu-item .slm-link-to-cart'),
                                    array('property' => 'color', 'label' => esc_html__( 'Cart Link Text Color', 'ssc' ), 'selector' => '.slmm .slm-cart-menu-item .slm-link-to-cart'),
                                    array('property' => 'font-family', 'label' => esc_html__( 'Cart Link Font Family', 'ssc' ), 'selector' => '.slmm .slm-cart-menu-item .slm-link-to-cart'),
                                    array('property' => 'font-weight', 'label' => esc_html__( 'Cart Link Font Weight', 'ssc' ), 'selector' => '.slmm .slm-cart-menu-item .slm-link-to-cart'),
                                    array('property' => 'font-style', 'label' => esc_html__( 'Cart Link Font Style', 'ssc' ), 'selector' => '.slmm .slm-cart-menu-item .slm-link-to-cart'),
                                    array('property' => 'text-transform', 'label' => esc_html__( 'Cart Link Text Transform', 'ssc' ), 'selector' => '.slmm .slm-cart-menu-item .slm-link-to-cart'),
                                    array('property' => 'text-decoration', 'label' => esc_html__( 'Cart Link Text Decoration', 'ssc' ), 'selector' => '.slmm .slm-cart-menu-item .slm-link-to-cart'),
                                    array('property' => 'background', 'label' => esc_html__( 'Cart Link Background', 'ssc' ), 'selector' => '.slmm .slm-cart-menu-item .slm-link-to-cart'),
                                    array('property' => 'border', 'label' => esc_html__( 'Cart Link Border', 'ssc' ), 'selector' => '.slmm .slm-cart-menu-item .slm-link-to-cart'),
                                    array('property' => 'border-radius', 'label' => esc_html__( 'Cart Link Border Radius', 'ssc' ), 'selector' => '.slmm .slm-cart-menu-item .slm-link-to-cart'),
                                    array('property' => 'padding', 'label' => esc_html__( 'Cart Link Padding', 'ssc' ), 'selector' => '.slmm .slm-cart-menu-item .slm-link-to-cart'),
                                    array('property' => 'margin', 'label' => esc_html__( 'Cart Link Margin', 'ssc' ), 'selector' => '.slmm .slm-cart-menu-item .slm-link-to-cart'),
                                ),
                                'Box 2 lvl' => array(
                                    array('property' => 'width', 'label' => esc_html__( 'Width', 'ssc' ), 'selector' => '.slmm li ul'),
                                    array('property' => 'height', 'label' => esc_html__( 'Height', 'ssc' ), 'selector' => '.slmm li ul'),
                                    array('property' => 'text-align', 'label' => esc_html__( 'Text Align', 'ssc' ), 'selector' => '.slmm li ul'),
                                    array('property' => 'float', 'label' => esc_html__( 'Position left/right', 'ssc' ), 'selector' => '.slmm li ul'),
                                    array('property' => 'margin', 'label' => esc_html__( 'Margin', 'ssc' ), 'selector' => '.slmm li ul'),
                                    array('property' => 'padding', 'label' => esc_html__( 'Padding', 'ssc' ), 'selector' => '.slmm li ul'),
                                    array('property' => 'background', 'selector' => '.slmm li ul'),
                                    array('property' => 'box-shadow', 'label' => esc_html__( 'Box Shadow', 'ssc' ), 'selector' => '.slmm li ul'),
                                    array('property' => 'border', 'label' => esc_html__( 'Border', 'ssc' ), 'selector' => '.slmm li ul'),
                                    array('property' => 'border-radius', 'label' => esc_html__( 'Border Radius', 'ssc' ), 'selector' => '.slmm li ul'),
                                ),
                                'Item Box 2 lvl' => array(
                                    array('property' => 'display', 'label' => esc_html__( 'Display', 'ssc' ), 'selector' => '.slmm li ul li'),
                                    array('property' => 'line-height', 'label' => esc_html__( 'Line Height', 'ssc' ), 'selector' => '.slmm li ul li'),

                                    array('property' => 'text-align', 'label' => esc_html__( 'Text Align', 'ssc' ), 'selector' => '.slmm li ul li'),
                                    array('property' => 'background', 'selector' => '.slmm li ul li'),
                                    array('property' => 'background', 'label' => esc_html__( 'Background for active item', 'ssc' ), 'selector' => '.slmm li ul li.current-menu-item'),
                                    array('property' => 'height', 'label' => esc_html__( 'Height', 'ssc' ), 'selector' => '.slmm li ul li'),
                                    array('property' => 'width', 'label' => esc_html__( 'Width', 'ssc' ), 'selector' => '.slmm li'),
                                    array('property' => 'border', 'label' => esc_html__( 'Border', 'ssc' ), 'selector' => '.slmm li ul li'),
                                    array('property' => 'border-radius', 'label' => esc_html__( 'Border Radius', 'ssc' ), 'selector' => '.slmm li ul li'),
                                    array('property' => 'padding', 'label' => esc_html__( 'Padding', 'ssc' ), 'selector' => '.slmm li ul li'),
                                    array('property' => 'margin', 'label' => esc_html__( 'Margin', 'ssc' ), 'selector' => '.slmm li ul li'),
                                ),
                                'Item 2 lvl' => array(
                                    array('property' => 'font-size', 'label' => esc_html__( 'Font Size', 'ssc' ), 'selector' => '.slmm li ul li a, .slmm li ul li > span'),
                                    array('property' => 'line-height', 'label' => esc_html__( 'Line Height', 'ssc' ), 'selector' => '.slmm li ul li a, .slmm li ul li > span'),
                                    array('property' => 'color', 'label' => esc_html__( 'Color', 'ssc' ), 'selector' => '.slmm li ul li a, .slmm li ul li > span'),
                                    array('property' => 'color', 'label' => esc_html__( 'Color on Active', 'ssc' ), 'selector' => '.slm-mega-item li ul li.current-menu-item a, .slm-mega-item li ul li.current-menu-item > span'),
                                    array('property' => 'font-weight', 'label' => esc_html__( 'Font Weight', 'ssc' ), 'selector' => '.slmm li ul li a, .slmm li ul li > span'),
                                    array('property' => 'text-transform', 'label' => esc_html__( 'Text Transform', 'ssc' ), 'selector' => '.slmm li ul li a, .slmm li ul li > span'),
                                    array('property' => 'text-decoration', 'label' => esc_html__( 'Text Decoration', 'ssc' ), 'selector' => '.slmm li ul li a span, .slmm li ul li > span'),
                                    array('property' => 'background', 'label' => esc_html__( 'Background', 'ssc' ), 'selector' => '.slmm li ul li a, .slmm li ul li > span'),
                                    array('property' => 'background', 'label' => esc_html__( 'Background on Active', 'ssc' ), 'selector' => '.slmm li ul li.current-menu-item a, .slmm li ul li.current-menu-item > span'),
                                    array('property' => 'border', 'label' => esc_html__( 'Border', 'ssc' ), 'selector' => '.slmm li ul li a, .slmm li ul li > span'),
                                    array('property' => 'border-radius', 'label' => esc_html__( 'Border Radius', 'ssc' ), 'selector' => '.slmm li ul li a, .slmm li ul li > span'),
                                    array('property' => 'padding', 'label' => esc_html__( 'Padding', 'ssc' ), 'selector' => '.slmm li ul li a, .slmm li ul li > span'),
                                    array('property' => 'margin', 'label' => esc_html__( 'Margin', 'ssc' ), 'selector' => '.slmm li ul li a, .slmm li ul li > span'),
                                ),
                                'Icon 2 lvl' => array(
                                    array('property' => 'font-size', 'label' => esc_html__( 'Font Size', 'ssc' ), 'selector' => '.slmm li ul li a i'),
                                    array('property' => 'height', 'label' => esc_html__( 'Image Height', 'ssc' ), 'selector' => '.slmm li ul li a i, .slmm li ul li a img'),
                                    array('property' => 'width', 'label' => esc_html__( 'Image Width', 'ssc' ), 'selector' => '.slmm li ul li a i, .slmm li ul li a img'),
                                    array('property' => 'color', 'label' => esc_html__( 'Color', 'ssc' ), 'selector' => '.slmm li ul li a i, .slmm li ul li a img'),
                                    array('property' => 'color', 'label' => esc_html__( 'Color on Active', 'ssc' ), 'selector' => '.slm-mega-item li ul li.current-menu-item i'),
                                    array('property' => 'display', 'label' => esc_html__( 'Display', 'ssc' ), 'selector' => '.slmm li ul li a i, .slmm li ul li a img'),
                                    array('property' => 'float', 'label' => esc_html__( 'Float', 'ssc' ), 'selector' => '.slmm li ul li a i, .slmm li ul li a img'),
                                    array('property' => 'line-height', 'label' => esc_html__( 'Line Height', 'ssc' ), 'selector' => '.slmm li ul li a i, .slmm li ul li a img'),
                                    array('property' => 'background', 'label' => esc_html__( 'Background', 'ssc' ), 'selector' => '.slmm li ul li a i, .slmm li ul li a img'),
                                    array('property' => 'background', 'label' => esc_html__( 'Background on Active', 'ssc' ), 'selector' => '.slmm li ul li.current-menu-item i, .slmm li ul li.current-menu-item img'),
                                    array('property' => 'border', 'label' => esc_html__( 'Border', 'ssc' ), 'selector' => '.slmm li ul li a i, .slmm li ul li a img'),
                                    array('property' => 'border-radius', 'label' => esc_html__( 'Border Radius', 'ssc' ), 'selector' => '.slmm li ul li a i, .slmm li ul li a img'),
                                    array('property' => 'padding', 'label' => esc_html__( 'Padding', 'ssc' ), 'selector' => '.slmm li ul li a i, .slmm li ul li a img'),
                                    array('property' => 'margin', 'label' => esc_html__( 'Margin', 'ssc' ), 'selector' => '.slmm li ul li a i, .slmm li ul li a img'),
                                ),
                                'Caret 2 lvl' => array(
                                    array('property' => 'font-size', 'label' => esc_html__( 'Font Size', 'ssc' ), 'selector' => '.slmm li ul li .caret'),
                                    array('property' => 'color', 'label' => esc_html__( 'Color', 'ssc' ), 'selector' => '.slmm li ul li .caret'),
                                    array('property' => 'color', 'label' => esc_html__( 'Color on Active', 'ssc' ), 'selector' => '.slmm li.current-menu-item .caret'),
                                    array('property' => 'display', 'label' => esc_html__( 'Display', 'ssc' ), 'selector' => '.slmm li ul li .caret'),
                                    array('property' => 'float', 'label' => esc_html__( 'Float', 'ssc' ), 'selector' => '.slmm li ul li .caret'),
                                    array('property' => 'line-height', 'label' => esc_html__( 'Line Height', 'ssc' ), 'selector' => '.slmm li ul li .caret'),
                                    array('property' => 'background', 'label' => esc_html__( 'Background', 'ssc' ), 'selector' => '.slmm li ul li .caret'),
                                    array('property' => 'background', 'label' => esc_html__( 'Background on Active', 'ssc' ), 'selector' => '.slmm li.current-menu-item .caret'),
                                    array('property' => 'border', 'label' => esc_html__( 'Border', 'ssc' ), 'selector' => '.slmm li ul li .caret'),
                                    array('property' => 'border-radius', 'label' => esc_html__( 'Border Radius', 'ssc' ), 'selector' => '.slmm li ul li .caret'),
                                    array('property' => 'padding', 'label' => esc_html__( 'Padding', 'ssc' ), 'selector' => '.slmm li ul li .caret'),
                                    array('property' => 'margin', 'label' => esc_html__( 'Margin', 'ssc' ), 'selector' => '.slmm li ul li .caret'),
                                ),
                                'Box 3 lvl' => array(
                                    array('property' => 'width', 'label' => esc_html__( 'Height', 'ssc' ), 'selector' => '.slmm li ul li ul'),
                                    array('property' => 'height', 'label' => esc_html__( 'Height', 'ssc' ), 'selector' => '.slmm li ul li ul'),
                                    array('property' => 'text-align', 'label' => esc_html__( 'Text Align', 'ssc' ), 'selector' => '.slmm li ul li ul'),
                                    array('property' => 'margin', 'label' => esc_html__( 'Margin', 'ssc' ), 'selector' => '.slmm li ul li ul'),
                                    array('property' => 'padding', 'label' => esc_html__( 'Padding', 'ssc' ), 'selector' => '.slmm li ul li ul'),
                                    array('property' => 'background', 'selector' => '.slmm li ul li ul'),
                                    array('property' => 'box-shadow', 'label' => esc_html__( 'Box Shadow', 'ssc' ), 'selector' => '.slmm li ul li ul'),
                                    array('property' => 'border', 'label' => esc_html__( 'Border', 'ssc' ), 'selector' => '.slmm li ul li ul'),
                                    array('property' => 'border-radius', 'label' => esc_html__( 'Border Radius', 'ssc' ), 'selector' => '.slmm li ul li ul'),
                                ),
                                'Item Box 3 lvl' => array(
                                    array('property' => 'display', 'label' => esc_html__( 'Display', 'ssc' ), 'selector' => '.slmm li ul li ul li'),
                                    array('property' => 'float', 'label' => esc_html__( 'Float', 'ssc' ), 'selector' => '.slmm li ul li ul li'),
                                    array('property' => 'line-height', 'label' => esc_html__( 'Line Height', 'ssc' ), 'selector' => '.slmm li ul li ul li'),
                                    array('property' => 'text-align', 'label' => esc_html__( 'Text Align', 'ssc' ), 'selector' => '.slmm li ul li ul li'),
                                    array('property' => 'background', 'selector' => '.slmm li ul li ul li'),
                                    array('property' => 'background', 'label' => esc_html__( 'Background for active item', 'ssc' ), 'selector' => '.slmm li ul li ul li.current-menu-item'),
                                    array('property' => 'height', 'label' => esc_html__( 'Height', 'ssc' ), 'selector' => '.slmm li ul li ul li'),
                                    array('property' => 'border', 'label' => esc_html__( 'Border', 'ssc' ), 'selector' => '.slmm li ul li ul li'),
                                    array('property' => 'border-radius', 'label' => esc_html__( 'Border Radius', 'ssc' ), 'selector' => '.slmm li ul li ul li'),
                                    array('property' => 'padding', 'label' => esc_html__( 'Padding', 'ssc' ), 'selector' => '.slmm li ul li ul li'),
                                    array('property' => 'margin', 'label' => esc_html__( 'Margin', 'ssc' ), 'selector' => '.slmm li ul li ul li'),
                                ),
                                'Item 3 lvl' => array(
                                    array('property' => 'font-size', 'label' => esc_html__( 'Font Size', 'ssc' ), 'selector' => '.slmm li ul li ul li a, .slmm li ul li ul li > span'),
                                    array('property' => 'line-height', 'label' => esc_html__( 'Line Height', 'ssc' ), 'selector' => '.slmm li ul li ul li a, .slmm li ul li ul li > span'),
                                    array('property' => 'color', 'label' => esc_html__( 'Color', 'ssc' ), 'selector' => '.slmm li ul li ul li a, .slmm li ul li ul li > span'),
                                    array('property' => 'color', 'label' => esc_html__( 'Color on Active', 'ssc' ), 'selector' => '.slm-mega-item li ul li ul li.current-menu-item a, .slm-mega-item li ul li ul li.current-menu-item > span'),
                                    array('property' => 'font-weight', 'label' => esc_html__( 'Font Weight', 'ssc' ), 'selector' => '.slmm li ul li ul li a, .slmm li ul li ul li > span'),
                                    array('property' => 'text-transform', 'label' => esc_html__( 'Text Transform', 'ssc' ), 'selector' => '.slmm li ul li ul li a, .slmm li ul li ul li > span'),
                                    array('property' => 'text-decoration', 'label' => esc_html__( 'Text Decoration', 'ssc' ), 'selector' => '.slmm li ul li ul li a span, .slmm li ul li ul li > span'),
                                    array('property' => 'background', 'label' => esc_html__( 'Background', 'ssc' ), 'selector' => '.slmm li ul li ul li a, .slmm li ul li ul li > span'),
                                    array('property' => 'background', 'label' => esc_html__( 'Background on Active', 'ssc' ), 'selector' => '.slmm li ul li ul li.current-menu-item a, .slmm li ul li ul li.current-menu-item > span'),
                                    array('property' => 'border', 'label' => esc_html__( 'Border', 'ssc' ), 'selector' => '.slmm li ul li ul li a, .slmm li ul li ul li > span'),
                                    array('property' => 'border-radius', 'label' => esc_html__( 'Border Radius', 'ssc' ), 'selector' => '.slmm li ul li ul li a, .slmm li ul li ul li > span'),
                                    array('property' => 'padding', 'label' => esc_html__( 'Padding', 'ssc' ), 'selector' => '.slmm li ul li ul li a, .slmm li ul li ul li > span'),
                                    array('property' => 'margin', 'label' => esc_html__( 'Margin', 'ssc' ), 'selector' => '.slmm li ul li ul li a, .slmm li ul li ul li > span'),
                                ),
                                'Icon 3 lvl' => array(
                                    array('property' => 'font-size', 'label' => esc_html__( 'Font Size', 'ssc' ), 'selector' => '.slmm li ul li ul li i'),
                                    array('property' => 'height', 'label' => esc_html__( 'Image Height', 'ssc' ), 'selector' => '.slmm li ul li ul li i,.slmm li ul li ul li img'),
                                    array('property' => 'width', 'label' => esc_html__( 'Image Width', 'ssc' ), 'selector' => '.slmm li ul li ul li i,.slmm li ul li ul li img'),
                                    array('property' => 'color', 'label' => esc_html__( 'Color', 'ssc' ), 'selector' => '.slmm li ul li ul li i, .slmm li ul li ul li img'),
                                    array('property' => 'color', 'label' => esc_html__( 'Color on Active', 'ssc' ), 'selector' => '.slm-mega-item li ul li ul li.current-menu-item i'),
                                    array('property' => 'display', 'label' => esc_html__( 'Display', 'ssc' ), 'selector' => '.slmm li ul li ul li i, .slmm li ul li ul li img'),
                                    array('property' => 'float', 'label' => esc_html__( 'Float', 'ssc' ), 'selector' => '.slmm li ul li ul li i, .slmm li ul li ul li img'),
                                    array('property' => 'line-height', 'label' => esc_html__( 'Line Height', 'ssc' ), 'selector' => '.slmm li ul li ul li i, .slmm li ul li ul li img'),
                                    array('property' => 'background', 'label' => esc_html__( 'Background', 'ssc' ), 'selector' => '.slmm li ul li ul li i, .slmm li ul li ul li img'),
                                    array('property' => 'background', 'label' => esc_html__( 'Background on Active', 'ssc' ), 'selector' => '.slmm li ul li ul li.current-menu-item i, .slmm li ul li ul li.current-menu-item img'),
                                    array('property' => 'border', 'label' => esc_html__( 'Border', 'ssc' ), 'selector' => '.slmm li ul li ul li i, .slmm li ul li ul li img'),
                                    array('property' => 'border-radius', 'label' => esc_html__( 'Border Radius', 'ssc' ), 'selector' => '.slmm li ul li ul li i, .slmm li ul li ul li img'),
                                    array('property' => 'padding', 'label' => esc_html__( 'Padding', 'ssc' ), 'selector' => '.slmm li ul li ul li i, .slmm li ul li ul li img'),
                                    array('property' => 'margin', 'label' => esc_html__( 'Margin', 'ssc' ), 'selector' => '.slmm li ul li ul li i, .slmm li ul li ul li img'),
                                ),
                                'Mega Menu Box' => array(
                                    array('property' => 'height', 'label' => esc_html__( 'Height', 'ssc' ), 'selector' => '.slmm li.slm-mega-block > ul'),
                                    array('property' => 'background', 'selector' => '.slmm li.slm-mega-block > ul'),
                                    array('property' => 'margin', 'label' => esc_html__( 'Margin', 'ssc' ), 'selector' => '.slmm li.slm-mega-block > ul'),
                                    array('property' => 'padding', 'label' => esc_html__( 'Padding', 'ssc' ), 'selector' => '.slmm li.slm-mega-block > ul'),
                                    array('property' => 'box-shadow', 'label' => esc_html__( 'Box Shadow', 'ssc' ), 'selector' => '.slmm li.slm-mega-block > ul'),
                                    array('property' => 'border', 'label' => esc_html__( 'Border', 'ssc' ), 'selector' => '.slmm li.slm-mega-block > ul'),
                                    array('property' => 'border-radius', 'label' => esc_html__( 'Border Radius', 'ssc' ), 'selector' => '.slmm li.slm-mega-block > ul'),
                                ),
                                'Column Box' => array(
	                                array('property' => 'display', 'label' => esc_html__( 'Display', 'ssc' ), 'selector' => '.slmm li.slmm-column'),
	                                array('property' => 'float', 'label' => esc_html__( 'Float', 'ssc' ), 'selector' => '.slmm li.slmm-column'),
	                                array('property' => 'line-height', 'label' => esc_html__( 'Line Height', 'ssc' ), 'selector' => '.slmm li.slmm-column'),
	                                array('property' => 'text-align', 'label' => esc_html__( 'Text Align', 'ssc' ), 'selector' => '.slmm li.slmm-column'),
	                                array('property' => 'background', 'selector' => '.slmm li.slmm-column'),
	                                array('property' => 'background', 'label' => esc_html__( 'Background for active item', 'ssc' ), 'selector' => '.slmm li.slmm-column.current-menu-item'),
	                                array('property' => 'height', 'label' => esc_html__( 'Height', 'ssc' ), 'selector' => '.slmm li.slmm-column'),
	                                array('property' => 'width', 'label' => esc_html__( 'Width', 'ssc' ), 'selector' => '.slmm li.slmm-column'),
	                                array('property' => 'border', 'label' => esc_html__( 'Border', 'ssc' ), 'selector' => '.slmm li.slmm-column'),
	                                array('property' => 'border', 'label' => esc_html__( 'Border Last Child', 'ssc' ), 'selector' => '.slm-sub-menu li.slmm-column:last-child'),
	                                array('property' => 'border-radius', 'label' => esc_html__( 'Border Radius', 'ssc' ), 'selector' => '.slmm li.slmm-column'),
	                                array('property' => 'padding', 'label' => esc_html__( 'Padding', 'ssc' ), 'selector' => '.slmm li.slmm-column'),
	                                array('property' => 'margin', 'label' => esc_html__( 'Margin', 'ssc' ), 'selector' => '.slmm li.slmm-column'),
                                ),
                                'Column Item' => array(
	                                array('property' => 'font-size', 'label' => esc_html__( 'Font Size', 'ssc' ), 'selector' => '.slmm li.slmm-column > a, .slmm li.slmm-column > span'),
	                                array('property' => 'line-height', 'label' => esc_html__( 'Line Height', 'ssc' ), 'selector' => '.slmm li.slmm-column > a, .slmm li.slmm-column > span'),
	                                array('property' => 'color', 'label' => esc_html__( 'Color', 'ssc' ), 'selector' => '.slmm li.slmm-column > a, .slmm li.slmm-column > span'),
	                                array('property' => 'color', 'label' => esc_html__( 'Color on Active', 'ssc' ), 'selector' => '.slmm li.current-menu-item a, .slmm li.current-menu-item span'),
	                                array('property' => 'font-family', 'label' => esc_html__( 'Font Family', 'ssc' ), 'selector' => '.slmm li.slmm-column > a, .slmm li.slmm-column > span'),
	                                array('property' => 'font-weight', 'label' => esc_html__( 'Font Weight', 'ssc' ), 'selector' => '.slmm li.slmm-column > a, .slmm li.slmm-column > span'),
	                                array('property' => 'font-style', 'label' => esc_html__( 'Font Style', 'ssc' ), 'selector' => '.slmm li.slmm-column > a, .slmm li.slmm-column > span'),
	                                array('property' => 'text-transform', 'label' => esc_html__( 'Text Transform', 'ssc' ), 'selector' => '.slmm li.slmm-column > a, .slmm li.slmm-column > span'),
	                                array('property' => 'text-decoration', 'label' => esc_html__( 'Text Decoration', 'ssc' ), 'selector' => '.slmm li a span, .slmm li > span'),
	                                array('property' => 'background', 'label' => esc_html__( 'Background', 'ssc' ), 'selector' => '.slmm li.slmm-column > a, .slmm li.slmm-column > span'),
	                                array('property' => 'background', 'label' => esc_html__( 'Background on Active', 'ssc' ), 'selector' => '.slmm li.current-menu-item a, .slmm li.current-menu-item > span'),
	                                array('property' => 'border', 'label' => esc_html__( 'Border', 'ssc' ), 'selector' => '.slmm li.slmm-column > a, .slmm li.slmm-column > span'),
	                                array('property' => 'border', 'label' => esc_html__( 'Border Last Child', 'ssc' ), 'selector' => '.slm-sub-menu li:last-child > a, .slm-sub-menu li:last-child > span'),
	                                array('property' => 'border-radius', 'label' => esc_html__( 'Border Radius', 'ssc' ), 'selector' => '.slmm li.slmm-column > a, .slmm li.slmm-column > span'),
	                                array('property' => 'padding', 'label' => esc_html__( 'Padding', 'ssc' ), 'selector' => '.slmm li.slmm-column > a, .slmm li.slmm-column > span'),
	                                array('property' => 'margin', 'label' => esc_html__( 'Margin', 'ssc' ), 'selector' => '.slmm li.slmm-column > a, .slmm li.slmm-column > span'),
                                ),
                                'Composer Block Box' => array(
	                                array('property' => 'width', 'label' => esc_html__( 'Width', 'ssc' ), 'selector' => '.slm-composer-block-widget'),
	                                array('property' => 'height', 'label' => esc_html__( 'Height', 'ssc' ), 'selector' => '.slm-composer-block-widget'),
	                                array('property' => 'background', 'selector' => '.slm-composer-block-widget'),
	                                array('property' => 'margin', 'label' => esc_html__( 'Margin', 'ssc' ), 'selector' => '.slm-composer-block-widget'),
	                                array('property' => 'padding', 'label' => esc_html__( 'Padding', 'ssc' ), 'selector' => '.slm-composer-block-widget'),
	                                array('property' => 'box-shadow', 'label' => esc_html__( 'Box Shadow', 'ssc' ), 'selector' => '.slm-composer-block-widget'),
	                                array('property' => 'border', 'label' => esc_html__( 'Border', 'ssc' ), 'selector' => '.slm-composer-block-widget'),
	                                array('property' => 'border-radius', 'label' => esc_html__( 'Border Radius', 'ssc' ), 'selector' => '.slm-composer-block-widget'),
                                ),
                            )
                        )
                    )
                ),
                // Hover
                esc_html__( 'hover', 'ssc' ) => array(
                    array(
                        'name' => 'hover-css',
                        'label' => esc_html__( 'Hover', 'ssc' ),
                        'type' => 'css',
                        'value' => '{`kc-css`:{`any`:{`box`:{`background|.slmm-respmenu .slm-open-menu-list:hover`:`eyJjb2xvciI6IiNmZmZmZmYiLCJsaW5lYXJHcmFkaWVudCI6WyIiXSwiaW1hZ2UiOiJub25lIiwicG9zaXRpb24iOiIwJSAwJSIsInNpemUiOiJhdXRvIiwicmVwZWF0IjoicmVwZWF0IiwiYXR0YWNobWVudCI6InNjcm9sbCIsImFkdmFuY2VkIjowfQ==`,`color|.slmm-respmenu .slm-open-menu-list:hover`:`#768188`,`border|.slmm-respmenu .slm-open-menu-list:hover`:`2px solid #ffbd00`},`item`:{`color|.slmm li a:hover, .slmm li > span:hover`:`#768188`,`color|.slmm li.current-menu-item a:hover`:`#768188`,`border|.slmm li a:hover, .slmm li > span:hover`:`||3px solid #ffbd00|`},`cart`:{`color|.slmm .slm-cart-menu-item .slm-link-to-cart:hover`:`#ffbd00`,`background|.slmm .slm-cart-menu-item .slm-link-to-cart:hover`:`eyJjb2xvciI6IiMyYzM4NDAiLCJsaW5lYXJHcmFkaWVudCI6WyIiXSwiaW1hZ2UiOiJub25lIiwicG9zaXRpb24iOiIwJSAwJSIsInNpemUiOiJhdXRvIiwicmVwZWF0IjoicmVwZWF0IiwiYXR0YWNobWVudCI6InNjcm9sbCIsImFkdmFuY2VkIjowfQ==`},`item-2-lvl`:{`color|.slmm li ul li a:hover, .slmm li ul li > span:hover`:`#0081d7`,`color|.slm-mega-item li ul li.current-menu-item a:hover`:`#768188`,`text-decoration|.slmm li ul li a:hover span, .slmm li ul li > span:hover`:`none`,`background|.slmm li ul li a:hover, .slmm li ul li > span:hover`:`eyJjb2xvciI6InRyYW5zcGFyZW50IiwibGluZWFyR3JhZGllbnQiOlsiIl0sImltYWdlIjoibm9uZSIsInBvc2l0aW9uIjoiMCUgMCUiLCJzaXplIjoiYXV0byIsInJlcGVhdCI6InJlcGVhdCIsImF0dGFjaG1lbnQiOiJzY3JvbGwiLCJhZHZhbmNlZCI6MH0=`,`border|.slmm li ul li a:hover, .slmm li ul li > span:hover`:`||1px solid #b2b9be|`},`icon-2-lvl`:{`color|.slmm li:hover ul li a:hover i, .slmm li:hover ul li a:hover img`:`#0081d7`,`color|.slm-mega-item li ul li.current-menu-item:hover i`:`#0081d7`}}}}', // remove this if you do not need a default content
                        'description' => esc_html__( 'Styles for Hover Condition', 'ssc' ),
                        'options' => array(
                            array(
                                'screens' => "any",
                                'Box' => array(
                                    array('property' => 'background', 'selector' => '.slmm-respmenu .slm-open-menu-list:hover'),
                                    array('property' => 'color', 'label' => esc_html__( 'Text Color of mobile menu button text', 'ssc' ), 'selector' => '.slmm-respmenu .slm-open-menu-list:hover'),
                                    array('property' => 'color', 'label' => esc_html__( 'Text Color of mobile menu button icon', 'ssc' ), 'selector' => '.slm-open-menu-list:hover i'),
                                    array('property' => 'border', 'label' => esc_html__( 'Border of mobile menu button', 'ssc' ), 'selector' => '.slmm-respmenu .slm-open-menu-list:hover'),
                                    array('property' => 'border-radius', 'label' => esc_html__( 'Border Radius of mobile menu button', 'ssc' ), 'selector' => '.slmm-respmenu .slm-open-menu-list:hover'),
                                ),
                                'Box 1 Lvl' => array(
	                                array('property' => 'display', 'label' => esc_html__( 'Display', 'ssc' ), 'selector' => '.slmm'),
	                                array('property' => 'float', 'label' => esc_html__( 'Float', 'ssc' ), 'selector' => '.slmm'),
	                                array('property' => 'line-height', 'label' => esc_html__( 'Line Height', 'ssc' ), 'selector' => '.slmm'),
	                                array('property' => 'text-align', 'label' => esc_html__( 'Text Align', 'ssc' ), 'selector' => '.slmm'),
	                                array('property' => 'background', 'selector' => '.slmm'),
	                                array('property' => 'height', 'label' => esc_html__( 'Height', 'ssc' ), 'selector' => '.slmm'),
	                                array('property' => 'width', 'label' => esc_html__( 'Width', 'ssc' ), 'selector' => '.slmm'),
	                                array('property' => 'border', 'label' => esc_html__( 'Border', 'ssc' ), 'selector' => '.slmm'),
	                                array('property' => 'border', 'label' => esc_html__( 'Border Last Child', 'ssc' ), 'selector' => '.slm-sub-menu li:last-child'),
	                                array('property' => 'border-radius', 'label' => esc_html__( 'Border Radius', 'ssc' ), 'selector' => '.slmm'),
	                                array('property' => 'padding', 'label' => esc_html__( 'Padding', 'ssc' ), 'selector' => '.slmm'),
	                                array('property' => 'margin', 'label' => esc_html__( 'Margin', 'ssc' ), 'selector' => '.slmm'),
                                ),
                                'Item Box' => array(
                                    array('property' => 'text-align', 'label' => esc_html__( 'Text Align', 'ssc' ), 'selector' => '.slmm li:hover'),
                                    array('property' => 'background', 'selector' => '.slmm li:hover'),
                                    array('property' => 'background', 'label' => esc_html__( 'Background for active item', 'ssc' ), 'selector' => '.slmm li.current-menu-item:hover'),
                                    array('property' => 'border', 'label' => esc_html__( 'Border', 'ssc' ), 'selector' => '.slmm li:hover'),
                                    array('property' => 'border-radius', 'label' => esc_html__( 'Border Radius', 'ssc' ), 'selector' => '.slmm li:hover'),
                                    array('property' => 'padding', 'label' => esc_html__( 'Padding', 'ssc' ), 'selector' => '.slmm li:hover'),
                                ),
                                'Item' => array(
                                    array('property' => 'color', 'label' => esc_html__( 'Color', 'ssc' ), 'selector' => '.slmm li a:hover, .slmm li > span:hover'),
                                    array('property' => 'color', 'label' => esc_html__( 'Color on Active', 'ssc' ), 'selector' => '.slmm li.current-menu-item a:hover, .slmm li.current-menu-item > span:hover'),
                                    array('property' => 'font-weight', 'label' => esc_html__( 'Font Weight', 'ssc' ), 'selector' => '.slmm li a:hover, .slmm li > span:hover'),
                                    array('property' => 'font-style', 'label' => esc_html__( 'Font Style', 'ssc' ), 'selector' => '.slmm li a:hover, .slmm li > span:hover'),
                                    array('property' => 'text-transform', 'label' => esc_html__( 'Text Transform', 'ssc' ), 'selector' => '.slmm li a:hover, .slmm li > span:hover'),
                                    array('property' => 'text-decoration', 'label' => esc_html__( 'Text Decoration', 'ssc' ), 'selector' => '.slmm li a:hover span, .slmm li > span:hover'),
                                    array('property' => 'background', 'label' => esc_html__( 'Background', 'ssc' ), 'selector' => '.slmm li a:hover, .slmm li > span:hover'),
                                    array('property' => 'background', 'label' => esc_html__( 'Background on Active', 'ssc' ), 'selector' => '.slmm li.current-menu-item a:hover'),
                                    array('property' => 'border', 'label' => esc_html__( 'Border', 'ssc' ), 'selector' => '.slmm li a:hover, .slmm li > span:hover'),
                                    array('property' => 'border-radius', 'label' => esc_html__( 'Border Radius', 'ssc' ), 'selector' => '.slmm li a:hover, .slmm li > span:hover'),
                                    array('property' => 'padding', 'label' => esc_html__( 'Padding', 'ssc' ), 'selector' => '.slmm li a:hover, .slmm li > span:hover'),
                                ),
                                'Icon' => array(
                                    array('property' => 'font-size', 'label' => esc_html__( 'Font Size', 'ssc' ), 'selector' => '.slmm li:hover i'),
                                    array('property' => 'height', 'label' => esc_html__( 'Image Height', 'ssc' ), 'selector' => '.slmm li:hover i,.slmm li:hover img'),
                                    array('property' => 'width', 'label' => esc_html__( 'Image Width', 'ssc' ), 'selector' => '.slmm li:hover i,.slmm li:hover img'),
                                    array('property' => 'color', 'label' => esc_html__( 'Color', 'ssc' ), 'selector' => '.slmm li:hover i, .slmm li:hover img'),
                                    array('property' => 'color', 'label' => esc_html__( 'Color on Active', 'ssc' ), 'selector' => '.slmm li.current-menu-item:hover i'),
                                    array('property' => 'background', 'label' => esc_html__( 'Background', 'ssc' ), 'selector' => '.slmm li:hover i, .slmm li:hover img'),
                                    array('property' => 'background', 'label' => esc_html__( 'Background on Active', 'ssc' ), 'selector' => '.slmm li.current-menu-item:hover i, .slmm li.current-menu-item:hover img'),
                                    array('property' => 'border', 'label' => esc_html__( 'Border', 'ssc' ), 'selector' => '.slmm li:hover i, .slmm li:hover img'),
                                    array('property' => 'border-radius', 'label' => esc_html__( 'Border Radius', 'ssc' ), 'selector' => '.slmm li:hover i, .slmm li:hover img'),
                                    array('property' => 'padding', 'label' => esc_html__( 'Padding', 'ssc' ), 'selector' => '.slmm li:hover i, .slmm li:hover img'),
                                ),
                                'Caret' => array(
                                    array('property' => 'font-size', 'label' => esc_html__( 'Font Size', 'ssc' ), 'selector' => '.slmm li:hover .caret'),
                                    array('property' => 'color', 'label' => esc_html__( 'Color', 'ssc' ), 'selector' => '.slmm li:hover .caret'),
                                    array('property' => 'color', 'label' => esc_html__( 'Color on Active', 'ssc' ), 'selector' => '.slmm li.current-menu-item .caret:hover'),
                                    array('property' => 'background', 'label' => esc_html__( 'Background', 'ssc' ), 'selector' => '.slmm li:hover .caret'),
                                    array('property' => 'background', 'label' => esc_html__( 'Background on Active', 'ssc' ), 'selector' => '.slmm li.current-menu-item .caret:hover'),
                                    array('property' => 'border', 'label' => esc_html__( 'Border', 'ssc' ), 'selector' => '.slmm li:hover .caret'),
                                    array('property' => 'border-radius', 'label' => esc_html__( 'Border Radius', 'ssc' ), 'selector' => '.slmm li:hover .caret'),
                                    array('property' => 'padding', 'label' => esc_html__( 'Padding', 'ssc' ), 'selector' => '.slmm li:hover .caret'),
                                ),
                                'Search' => array(
                                    // Icon
                                    array('property' => 'font-size', 'label' => esc_html__( 'Icon Font Size', 'ssc' ), 'selector' => '.slm-mega-item .slm-search-icon i.menu-item-icon:hover'),
                                    array('property' => 'color', 'label' => esc_html__( 'Icon Color', 'ssc' ), 'selector' => '.slm-mega-item .slm-search-icon i.menu-item-icon:hover'),
                                    array('property' => 'background', 'label' => esc_html__( 'Icon Background', 'ssc' ), 'selector' => '.slm-mega-item .slm-search-icon i.menu-item-icon:hover'),
                                    array('property' => 'border', 'label' => esc_html__( 'Icon Border', 'ssc' ), 'selector' => '.slm-mega-item .slm-search-icon i.menu-item-icon:hover'),
                                    array('property' => 'border-radius', 'label' => esc_html__( 'Icon Border Radius', 'ssc' ), 'selector' => '.slm-mega-item .slm-search-icon i.menu-item-icon:hover'),
                                    array('property' => 'padding', 'label' => esc_html__( 'Icon Padding', 'ssc' ), 'selector' => '.slm-mega-item .slm-search-icon i.menu-item-icon:hover'),
                                    // Input
                                    array('property' => 'font-size', 'label' => esc_html__( 'Input Font Size', 'ssc' ), 'selector' => '.slmm .slm-search-block .slm-search-input:hover'),
                                    array('property' => 'color', 'label' => esc_html__( 'Input Text Color', 'ssc' ), 'selector' => '.slmm .slm-search-block .slm-search-input:hover'),
                                    array('property' => 'background', 'label' => esc_html__( 'Input Background', 'ssc' ), 'selector' => '.slmm .slm-search-block .slm-search-input:hover'),
                                    array('property' => 'border', 'label' => esc_html__( 'Input Border', 'ssc' ), 'selector' => '.slmm .slm-search-block .slm-search-input:hover'),
                                    array('property' => 'border-radius', 'label' => esc_html__( 'Input Border Radius', 'ssc' ), 'selector' => '.slmm .slm-search-block .slm-search-input:hover'),
                                    // Close Icon
                                    array('property' => 'color', 'label' => esc_html__( 'Color of Close Icon', 'ssc' ), 'selector' => '.slmm .slm-search-block .slm-search-close:hover'),
                                ),
                                'Cart' => array(
                                    // Icon
                                    array('property' => 'font-size', 'label' => esc_html__( 'Icon Font Size', 'ssc' ), 'selector' => '.slmm li.slm-cart-menu-item:hover i'),
                                    array('property' => 'color', 'label' => esc_html__( 'Icon Color', 'ssc' ), 'selector' => '.slmm li.slm-cart-menu-item:hover i'),
                                    array('property' => 'background', 'label' => esc_html__( 'Icon Background', 'ssc' ), 'selector' => '.slmm li.slm-cart-menu-item:hover i'),
                                    array('property' => 'border', 'label' => esc_html__( 'Icon Border', 'ssc' ), 'selector' => '.slmm li.slm-cart-menu-item:hover i'),
                                    array('property' => 'border-radius', 'label' => esc_html__( 'Icon Border Radius', 'ssc' ), 'selector' => '.slmm li.slm-cart-menu-item:hover i'),
                                    array('property' => 'padding', 'label' => esc_html__( 'Icon Padding', 'ssc' ), 'selector' => '.slmm li.slm-cart-menu-item:hover i'),
                                    // Cart Link
                                    array('property' => 'color', 'label' => esc_html__( 'Cart Link Text Color', 'ssc' ), 'selector' => '.slmm .slm-cart-menu-item .slm-link-to-cart:hover'),
                                    array('property' => 'font-weight', 'label' => esc_html__( 'Cart Link Font Weight', 'ssc' ), 'selector' => '.slmm .slm-cart-menu-item .slm-link-to-cart:hover'),
                                    array('property' => 'text-transform', 'label' => esc_html__( 'Cart Link Text Transform', 'ssc' ), 'selector' => '.slmm .slm-cart-menu-item .slm-link-to-cart:hover'),
                                    array('property' => 'text-decoration', 'label' => esc_html__( 'Cart Link Text Decoration', 'ssc' ), 'selector' => '.slmm .slm-cart-menu-item .slm-link-to-cart:hover'),
                                    array('property' => 'background', 'label' => esc_html__( 'Cart Link Background', 'ssc' ), 'selector' => '.slmm .slm-cart-menu-item .slm-link-to-cart:hover'),
                                    array('property' => 'border', 'label' => esc_html__( 'Cart Link Border', 'ssc' ), 'selector' => '.slmm .slm-cart-menu-item .slm-link-to-cart:hover'),
                                    array('property' => 'border-radius', 'label' => esc_html__( 'Cart Link Border Radius', 'ssc' ), 'selector' => '.slmm .slm-cart-menu-item .slm-link-to-cart:hover'),
                                    array('property' => 'padding', 'label' => esc_html__( 'Cart Link Padding', 'ssc' ), 'selector' => '.slmm .slm-cart-menu-item .slm-link-to-cart:hover'),
                                ),
                                'Box 2 lvl' => array(
                                    array('property' => 'background', 'selector' => '.slmm li ul:hover'),
                                    array('property' => 'box-shadow', 'label' => esc_html__( 'Box Shadow', 'ssc' ), 'selector' => '.slmm li ul:hover'),
                                    array('property' => 'border', 'label' => esc_html__( 'Border', 'ssc' ), 'selector' => '.slmm li ul:hover'),
                                    array('property' => 'border-radius', 'label' => esc_html__( 'Border Radius', 'ssc' ), 'selector' => '.slmm li ul:hover'),
                                ),
                                'Item Box 2 lvl' => array(
                                    array('property' => 'background', 'selector' => '.slmm li ul li:hover'),
                                    array('property' => 'background', 'label' => esc_html__( 'Background for active item', 'ssc' ), 'selector' => '.slmm li ul li.current-menu-item:hover'),
                                    array('property' => 'border', 'label' => esc_html__( 'Border', 'ssc' ), 'selector' => '.slmm li ul li:hover'),
                                    array('property' => 'border-radius', 'label' => esc_html__( 'Border Radius', 'ssc' ), 'selector' => '.slmm li ul li:hover'),
                                    array('property' => 'padding', 'label' => esc_html__( 'Padding', 'ssc' ), 'selector' => '.slmm li ul li:hover'),
                                ),
                                'Item 2 lvl' => array(
                                    array('property' => 'color', 'label' => esc_html__( 'Color', 'ssc' ), 'selector' => '.slmm li ul li a:hover, .slmm li ul li > span:hover'),
                                    array('property' => 'color', 'label' => esc_html__( 'Color on Active', 'ssc' ), 'selector' => '.slm-mega-item li ul li.current-menu-item a:hover, .slm-mega-item li ul li.current-menu-item > span:hover'),
                                    array('property' => 'font-weight', 'label' => esc_html__( 'Font Weight', 'ssc' ), 'selector' => '.slmm li ul li a:hover, .slmm li ul li > span:hover'),
                                    array('property' => 'font-style', 'label' => esc_html__( 'Font Style', 'ssc' ), 'selector' => '.slmm li ul li a:hover, .slmm li ul li > span:hover'),
                                    array('property' => 'text-transform', 'label' => esc_html__( 'Text Transform', 'ssc' ), 'selector' => '.slmm li ul li a:hover, .slmm li ul li > span:hover'),
                                    array('property' => 'text-decoration', 'label' => esc_html__( 'Text Decoration', 'ssc' ), 'selector' => '.slmm li ul li a:hover, .slmm li ul li > span:hover'),
                                    array('property' => 'background', 'label' => esc_html__( 'Background', 'ssc' ), 'selector' => '.slmm li ul li a:hover, .slmm li ul li > span:hover'),
                                    array('property' => 'background', 'label' => esc_html__( 'Background on Active', 'ssc' ), 'selector' => '.slmm li ul li.current-menu-item a:hover, .slmm li ul li.current-menu-item > span:hover'),
                                    array('property' => 'border', 'label' => esc_html__( 'Border', 'ssc' ), 'selector' => '.slmm li ul li a:hover, .slmm li ul li > span:hover'),
                                    array('property' => 'border-radius', 'label' => esc_html__( 'Border Radius', 'ssc' ), 'selector' => '.slmm li ul li a:hover, .slmm li ul li > span:hover'),
                                    array('property' => 'padding', 'label' => esc_html__( 'Padding', 'ssc' ), 'selector' => '.slmm li ul li a:hover, .slmm li ul li > span:hover'),
                                ),
                                'Icon 2 lvl' => array(
                                    array('property' => 'font-size', 'label' => esc_html__( 'Font Size', 'ssc' ), 'selector' => '.slmm li:hover ul li a:hover a i'),
                                    array('property' => 'height', 'label' => esc_html__( 'Image Height', 'ssc' ), 'selector' => '.slmm li:hover ul li a:hover a i,.slmm li:hover ul li a:hover a img'),
                                    array('property' => 'width', 'label' => esc_html__( 'Image Width', 'ssc' ), 'selector' => '.slmm li:hover ul li a:hover a i,.slmm li:hover ul li a:hover img'),
                                    array('property' => 'color', 'label' => esc_html__( 'Color', 'ssc' ), 'selector' => '.slmm li:hover ul li a:hover i, .slmm li:hover ul li a:hover img'),
                                    array('property' => 'color', 'label' => esc_html__( 'Color on Active', 'ssc' ), 'selector' => '.slm-mega-item li ul li.current-menu-item:hover i'),
                                    array('property' => 'background', 'label' => esc_html__( 'Background', 'ssc' ), 'selector' => '.slmm li:hover ul li a:hover i, .slmm li:hover ul li a:hover img'),
                                    array('property' => 'background', 'label' => esc_html__( 'Background on Active', 'ssc' ), 'selector' => '.slmm li ul li.current-menu-item:hover i, .slmm li ul li.current-menu-item img:hover'),
                                    array('property' => 'border', 'label' => esc_html__( 'Border', 'ssc' ), 'selector' => '.slmm li:hover ul li a:hover i, .slmm li:hover ul li a:hover img'),
                                    array('property' => 'border-radius', 'label' => esc_html__( 'Border Radius', 'ssc' ), 'selector' => '.slmm li:hover ul li a:hover i, .slmm li:hover ul li a:hover img'),
                                    array('property' => 'padding', 'label' => esc_html__( 'Padding', 'ssc' ), 'selector' => '.slmm li:hover ul li a:hover i, .slmm li:hover ul li a:hover img'),
                                    array('property' => 'margin', 'label' => esc_html__( 'Margin', 'ssc' ), 'selector' => '.slmm li:hover ul li a:hover i, .slmm li:hover ul li a:hover img'),
                                ),
                                'Caret 2 lvl' => array(
                                    array('property' => 'font-size', 'label' => esc_html__( 'Font Size', 'ssc' ), 'selector' => '.slmm li:hover ul li a:hover .caret'),
                                    array('property' => 'color', 'label' => esc_html__( 'Color', 'ssc' ), 'selector' => '.slmm li:hover ul li a:hover .caret'),
                                    array('property' => 'color', 'label' => esc_html__( 'Color on Active', 'ssc' ), 'selector' => '.slmm li.current-menu-item .caret:hover'),
                                    array('property' => 'background', 'label' => esc_html__( 'Background', 'ssc' ), 'selector' => '.slmm li:hover ul li a:hover .caret'),
                                    array('property' => 'background', 'label' => esc_html__( 'Background on Active', 'ssc' ), 'selector' => '.slmm li.current-menu-item .caret:hover'),
                                    array('property' => 'border', 'label' => esc_html__( 'Border', 'ssc' ), 'selector' => '.slmm li:hover ul li a:hover .caret'),
                                    array('property' => 'border-radius', 'label' => esc_html__( 'Border Radius', 'ssc' ), 'selector' => '.slmm li:hover ul li a:hover .caret'),
                                    array('property' => 'padding', 'label' => esc_html__( 'Padding', 'ssc' ), 'selector' => '.slmm li:hover ul li a:hover .caret'),
                                ),
                                'Box 3 lvl' => array(
                                    array('property' => 'background', 'selector' => '.slmm li ul li ul:hover'),
                                    array('property' => 'box-shadow', 'label' => esc_html__( 'Box Shadow', 'ssc' ), 'selector' => '.slmm li ul li ul:hover'),
                                    array('property' => 'border', 'label' => esc_html__( 'Border', 'ssc' ), 'selector' => '.slmm li ul li ul:hover'),
                                    array('property' => 'border-radius', 'label' => esc_html__( 'Border Radius', 'ssc' ), 'selector' => '.slmm li ul li ul:hover'),
                                ),
                                'Item Box 3 lvl' => array(
                                    array('property' => 'background', 'selector' => '.slmm li ul li ul li:hover'),
                                    array('property' => 'background', 'label' => esc_html__( 'Background for active item', 'ssc' ), 'selector' => '.slmm li ul li ul li.current-menu-item:hover'),
                                    array('property' => 'border', 'label' => esc_html__( 'Border', 'ssc' ), 'selector' => '.slmm li ul li ul li:hover'),
                                    array('property' => 'border-radius', 'label' => esc_html__( 'Border Radius', 'ssc' ), 'selector' => '.slmm li ul li ul li:hover'),
                                    array('property' => 'padding', 'label' => esc_html__( 'Padding', 'ssc' ), 'selector' => '.slmm li ul li ul li:hover'),
                                ),
                                'Item 3 lvl' => array(
                                    array('property' => 'color', 'label' => esc_html__( 'Color', 'ssc' ), 'selector' => '.slmm li ul li ul li a:hover, .slmm li ul li ul li > span:hover'),
                                    array('property' => 'color', 'label' => esc_html__( 'Color on Active', 'ssc' ), 'selector' => '.slm-mega-item li ul li ul li.current-menu-item a:hover, .slm-mega-item li ul li ul li.current-menu-item > span:hover'),
                                    array('property' => 'font-weight', 'label' => esc_html__( 'Font Weight', 'ssc' ), 'selector' => '.slmm li ul li ul li a:hover, .slmm li ul li ul li > span:hover'),
                                    array('property' => 'font-style', 'label' => esc_html__( 'Font Style', 'ssc' ), 'selector' => '.slmm li ul li ul li a:hover, .slmm li ul li ul li > span:hover'),
                                    array('property' => 'text-transform', 'label' => esc_html__( 'Text Transform', 'ssc' ), 'selector' => '.slmm li ul li ul li a:hover, .slmm li ul li ul li > span:hover'),
                                    array('property' => 'text-decoration', 'label' => esc_html__( 'Text Decoration', 'ssc' ), 'selector' => '.slmm li ul li ul li a:hover span, .slmm li ul li ul li > span:hover'),
                                    array('property' => 'background', 'label' => esc_html__( 'Background', 'ssc' ), 'selector' => '.slmm li ul li ul li a:hover, .slmm li ul li ul li > span:hover'),
                                    array('property' => 'background', 'label' => esc_html__( 'Background on Active', 'ssc' ), 'selector' => '.slmm li ul li ul li.current-menu-item a:hover, .slmm li ul li ul li.current-menu-item > span:hover'),
                                    array('property' => 'border', 'label' => esc_html__( 'Border', 'ssc' ), 'selector' => '.slmm li ul li ul li a:hover, .slmm li ul li ul li > span:hover'),
                                    array('property' => 'border-radius', 'label' => esc_html__( 'Border Radius', 'ssc' ), 'selector' => '.slmm li ul li ul li a:hover, .slmm li ul li ul li > span:hover'),
                                    array('property' => 'padding', 'label' => esc_html__( 'Padding', 'ssc' ), 'selector' => '.slmm li ul li ul li a:hover, .slmm li ul li ul li > span:hover'),
                                ),
                                'Icon 3 lvl' => array(
                                    array('property' => 'font-size', 'label' => esc_html__( 'Font Size', 'ssc' ), 'selector' => '.slmm li ul li ul li:hover i'),
                                    array('property' => 'height', 'label' => esc_html__( 'Image Height', 'ssc' ), 'selector' => '.slmm li ul li ul li:hover i,.slmm li ul li ul li:hover img'),
                                    array('property' => 'width', 'label' => esc_html__( 'Image Width', 'ssc' ), 'selector' => '.slmm li ul li ul li:hover i,.slmm li ul li ul li:hover img'),
                                    array('property' => 'color', 'label' => esc_html__( 'Color', 'ssc' ), 'selector' => '.slmm li ul li ul li:hover i, .slmm li ul li ul li:hover img'),
                                    array('property' => 'color', 'label' => esc_html__( 'Color on Active', 'ssc' ), 'selector' => '.slm-mega-item li ul li ul li.current-menu-item:hover i'),
                                    array('property' => 'background', 'label' => esc_html__( 'Background', 'ssc' ), 'selector' => '.slmm li ul li ul li:hover i, .slmm li ul li ul li:hover img'),
                                    array('property' => 'background', 'label' => esc_html__( 'Background on Active', 'ssc' ), 'selector' => '.slmm li ul li ul li.current-menu-item:hover i, .slmm li ul li ul li.current-menu-item:hover img'),
                                    array('property' => 'border', 'label' => esc_html__( 'Border', 'ssc' ), 'selector' => '.slmm li ul li ul li:hover i, .slmm li ul li ul li:hover img'),
                                    array('property' => 'border-radius', 'label' => esc_html__( 'Border Radius', 'ssc' ), 'selector' => '.slmm li ul li ul li:hover i, .slmm li ul li ul li:hover img'),
                                    array('property' => 'padding', 'label' => esc_html__( 'Padding', 'ssc' ), 'selector' => '.slmm li ul li ul li:hover i, .slmm li ul li ul li:hover img'),
                                ),
                                'Mega Menu Box' => array(
	                                array('property' => 'height', 'label' => esc_html__( 'Height', 'ssc' ), 'selector' => '.slmm li.slm-mega-block > ul'),
	                                array('property' => 'background', 'selector' => '.slmm li.slm-mega-block > ul'),
	                                array('property' => 'margin', 'label' => esc_html__( 'Margin', 'ssc' ), 'selector' => '.slmm li.slm-mega-block > ul'),
	                                array('property' => 'padding', 'label' => esc_html__( 'Padding', 'ssc' ), 'selector' => '.slmm li.slm-mega-block > ul'),
	                                array('property' => 'box-shadow', 'label' => esc_html__( 'Box Shadow', 'ssc' ), 'selector' => '.slmm li.slm-mega-block > ul'),
	                                array('property' => 'border', 'label' => esc_html__( 'Border', 'ssc' ), 'selector' => '.slmm li.slm-mega-block > ul'),
	                                array('property' => 'border-radius', 'label' => esc_html__( 'Border Radius', 'ssc' ), 'selector' => '.slmm li.slm-mega-block > ul'),
                                ),
                                'Column Box' => array(
	                                array('property' => 'display', 'label' => esc_html__( 'Display', 'ssc' ), 'selector' => '.slmm li.slmm-column'),
	                                array('property' => 'float', 'label' => esc_html__( 'Float', 'ssc' ), 'selector' => '.slmm li.slmm-column'),
	                                array('property' => 'line-height', 'label' => esc_html__( 'Line Height', 'ssc' ), 'selector' => '.slmm li.slmm-column'),
	                                array('property' => 'text-align', 'label' => esc_html__( 'Text Align', 'ssc' ), 'selector' => '.slmm li.slmm-column'),
	                                array('property' => 'background', 'selector' => '.slmm li.slmm-column'),
	                                array('property' => 'background', 'label' => esc_html__( 'Background for active item', 'ssc' ), 'selector' => '.slmm li.slmm-column.current-menu-item'),
	                                array('property' => 'height', 'label' => esc_html__( 'Height', 'ssc' ), 'selector' => '.slmm li.slmm-column'),
	                                array('property' => 'width', 'label' => esc_html__( 'Width', 'ssc' ), 'selector' => '.slmm li.slmm-column'),
	                                array('property' => 'border', 'label' => esc_html__( 'Border', 'ssc' ), 'selector' => '.slmm li.slmm-column'),
	                                array('property' => 'border', 'label' => esc_html__( 'Border Last Child', 'ssc' ), 'selector' => '.slm-sub-menu li.slmm-column:last-child'),
	                                array('property' => 'border-radius', 'label' => esc_html__( 'Border Radius', 'ssc' ), 'selector' => '.slmm li.slmm-column'),
	                                array('property' => 'padding', 'label' => esc_html__( 'Padding', 'ssc' ), 'selector' => '.slmm li.slmm-column'),
	                                array('property' => 'padding', 'label' => esc_html__( 'Padding', 'ssc' ), 'selector' => '.slmm li.slmm-column:last-child'),
	                                array('property' => 'margin', 'label' => esc_html__( 'Margin', 'ssc' ), 'selector' => '.slmm li.slmm-column'),
                                ),
                                'Column Item' => array(
	                                array('property' => 'font-size', 'label' => esc_html__( 'Font Size', 'ssc' ), 'selector' => '.slmm li.slmm-column > a, .slmm li.slmm-column > span'),
	                                array('property' => 'line-height', 'label' => esc_html__( 'Line Height', 'ssc' ), 'selector' => '.slmm li.slmm-column > a, .slmm li.slmm-column > span'),
	                                array('property' => 'color', 'label' => esc_html__( 'Color', 'ssc' ), 'selector' => '.slmm li.slmm-column > a, .slmm li.slmm-column > span'),
	                                array('property' => 'color', 'label' => esc_html__( 'Color on Active', 'ssc' ), 'selector' => '.slmm li.current-menu-item a, .slmm li.current-menu-item span'),
	                                array('property' => 'font-family', 'label' => esc_html__( 'Font Family', 'ssc' ), 'selector' => '.slmm li.slmm-column > a, .slmm li.slmm-column > span'),
	                                array('property' => 'font-weight', 'label' => esc_html__( 'Font Weight', 'ssc' ), 'selector' => '.slmm li.slmm-column > a, .slmm li.slmm-column > span'),
	                                array('property' => 'font-style', 'label' => esc_html__( 'Font Style', 'ssc' ), 'selector' => '.slmm li.slmm-column > a, .slmm li.slmm-column > span'),
	                                array('property' => 'text-transform', 'label' => esc_html__( 'Text Transform', 'ssc' ), 'selector' => '.slmm li.slmm-column > a, .slmm li.slmm-column > span'),
	                                array('property' => 'text-decoration', 'label' => esc_html__( 'Text Decoration', 'ssc' ), 'selector' => '.slmm li a span, .slmm li > span'),
	                                array('property' => 'background', 'label' => esc_html__( 'Background', 'ssc' ), 'selector' => '.slmm li.slmm-column > a, .slmm li.slmm-column > span'),
	                                array('property' => 'background', 'label' => esc_html__( 'Background on Active', 'ssc' ), 'selector' => '.slmm li.current-menu-item a, .slmm li.current-menu-item > span'),
	                                array('property' => 'border', 'label' => esc_html__( 'Border', 'ssc' ), 'selector' => '.slmm li.slmm-column > a, .slmm li.slmm-column > span'),
	                                array('property' => 'border', 'label' => esc_html__( 'Border Last Child', 'ssc' ), 'selector' => '.slm-sub-menu li:last-child > a, .slm-sub-menu li:last-child > span'),
	                                array('property' => 'border-radius', 'label' => esc_html__( 'Border Radius', 'ssc' ), 'selector' => '.slmm li.slmm-column > a, .slmm li.slmm-column > span'),
	                                array('property' => 'padding', 'label' => esc_html__( 'Padding', 'ssc' ), 'selector' => '.slmm li.slmm-column > a, .slmm li.slmm-column > span'),
	                                array('property' => 'margin', 'label' => esc_html__( 'Margin', 'ssc' ), 'selector' => '.slmm li.slmm-column > a, .slmm li.slmm-column > span'),
                                ),
                                'Composer Block Box' => array(
	                                array('property' => 'width', 'label' => esc_html__( 'Width', 'ssc' ), 'selector' => '.slmm li:hover .slm-composer-block-widget'),
	                                array('property' => 'height', 'label' => esc_html__( 'Height', 'ssc' ), 'selector' => '.slmm li:hover .slm-composer-block-widget'),
	                                array('property' => 'background', 'selector' => '.slmm li:hover .slm-composer-block-widget'),
	                                array('property' => 'margin', 'label' => esc_html__( 'Margin', 'ssc' ), 'selector' => '.slmm li:hover .slm-composer-block-widget'),
	                                array('property' => 'padding', 'label' => esc_html__( 'Padding', 'ssc' ), 'selector' => '.slmm li:hover .slm-composer-block-widget'),
	                                array('property' => 'box-shadow', 'label' => esc_html__( 'Box Shadow', 'ssc' ), 'selector' => '.slmm li:hover .slm-composer-block-widget'),
	                                array('property' => 'border', 'label' => esc_html__( 'Border', 'ssc' ), 'selector' => '.slmm li:hover .slm-composer-block-widget'),
	                                array('property' => 'border-radius', 'label' => esc_html__( 'Border Radius', 'ssc' ), 'selector' => '.slmm li:hover .slm-composer-block-widget'),
                                ),
                            ),
                            array(
                                "screens" => "999,768,667,479",
                                'Box 1 Lvl' => array(
	                                array('property' => 'display', 'label' => esc_html__( 'Display', 'ssc' ), 'selector' => '.slmm'),
	                                array('property' => 'float', 'label' => esc_html__( 'Float', 'ssc' ), 'selector' => '.slmm'),
	                                array('property' => 'line-height', 'label' => esc_html__( 'Line Height', 'ssc' ), 'selector' => '.slmm'),
	                                array('property' => 'text-align', 'label' => esc_html__( 'Text Align', 'ssc' ), 'selector' => '.slmm'),
	                                array('property' => 'background', 'selector' => '.slmm'),
	                                array('property' => 'height', 'label' => esc_html__( 'Height', 'ssc' ), 'selector' => '.slmm'),
	                                array('property' => 'width', 'label' => esc_html__( 'Width', 'ssc' ), 'selector' => '.slmm'),
	                                array('property' => 'border', 'label' => esc_html__( 'Border', 'ssc' ), 'selector' => '.slmm'),
	                                array('property' => 'border', 'label' => esc_html__( 'Border Last Child', 'ssc' ), 'selector' => '.slm-sub-menu li:last-child'),
	                                array('property' => 'border-radius', 'label' => esc_html__( 'Border Radius', 'ssc' ), 'selector' => '.slmm'),
	                                array('property' => 'padding', 'label' => esc_html__( 'Padding', 'ssc' ), 'selector' => '.slmm'),
	                                array('property' => 'margin', 'label' => esc_html__( 'Margin', 'ssc' ), 'selector' => '.slmm'),
                                ),
                                'Item Box' => array(
                                    array('property' => 'text-align', 'label' => esc_html__( 'Text Align', 'ssc' ), 'selector' => '.slmm li:hover'),
                                    array('property' => 'background', 'selector' => '.slmm li:hover'),
                                    array('property' => 'background', 'label' => esc_html__( 'Background for active item', 'ssc' ), 'selector' => '.slmm li.current-menu-item:hover'),
                                    array('property' => 'border', 'label' => esc_html__( 'Border', 'ssc' ), 'selector' => '.slmm li:hover'),
                                    array('property' => 'border-radius', 'label' => esc_html__( 'Border Radius', 'ssc' ), 'selector' => '.slmm li:hover'),
                                    array('property' => 'padding', 'label' => esc_html__( 'Padding', 'ssc' ), 'selector' => '.slmm li:hover'),
                                ),
                                'Item' => array(
                                    array('property' => 'color', 'label' => esc_html__( 'Color', 'ssc' ), 'selector' => '.slmm li a:hover, .slmm li > span:hover'),
                                    array('property' => 'color', 'label' => esc_html__( 'Color on Active', 'ssc' ), 'selector' => '.slmm li.current-menu-item a:hover, .slmm li.current-menu-item > span:hover'),
                                    array('property' => 'font-weight', 'label' => esc_html__( 'Font Weight', 'ssc' ), 'selector' => '.slmm li a:hover, .slmm li > span:hover'),
                                    array('property' => 'font-style', 'label' => esc_html__( 'Font Style', 'ssc' ), 'selector' => '.slmm li a:hover, .slmm li > span:hover'),
                                    array('property' => 'text-transform', 'label' => esc_html__( 'Text Transform', 'ssc' ), 'selector' => '.slmm li a:hover, .slmm li > span:hover'),
                                    array('property' => 'text-decoration', 'label' => esc_html__( 'Text Decoration', 'ssc' ), 'selector' => '.slmm li a:hover span, .slmm li > span:hover'),
                                    array('property' => 'background', 'label' => esc_html__( 'Background', 'ssc' ), 'selector' => '.slmm li a:hover, .slmm li > span:hover'),
                                    array('property' => 'background', 'label' => esc_html__( 'Background on Active', 'ssc' ), 'selector' => '.slmm li.current-menu-item a:hover'),
                                    array('property' => 'border', 'label' => esc_html__( 'Border', 'ssc' ), 'selector' => '.slmm li a:hover, .slmm li > span:hover'),
                                    array('property' => 'border-radius', 'label' => esc_html__( 'Border Radius', 'ssc' ), 'selector' => '.slmm li a:hover, .slmm li > span:hover'),
                                    array('property' => 'padding', 'label' => esc_html__( 'Padding', 'ssc' ), 'selector' => '.slmm li a:hover, .slmm li > span:hover'),
                                ),
                                'Icon' => array(
                                    array('property' => 'font-size', 'label' => esc_html__( 'Font Size', 'ssc' ), 'selector' => '.slmm li i:hover'),
                                    array('property' => 'height', 'label' => esc_html__( 'Image Height', 'ssc' ), 'selector' => '.slmm li i:hover,.slmm li img:hover'),
                                    array('property' => 'width', 'label' => esc_html__( 'Image Width', 'ssc' ), 'selector' => '.slmm li i:hover,.slmm li img:hover'),
                                    array('property' => 'color', 'label' => esc_html__( 'Color', 'ssc' ), 'selector' => '.slmm li i:hover, .slmm li img:hover'),
                                    array('property' => 'color', 'label' => esc_html__( 'Color on Active', 'ssc' ), 'selector' => '.slmm li.current-menu-item:hover i'),
                                    array('property' => 'background', 'label' => esc_html__( 'Background', 'ssc' ), 'selector' => '.slmm li i:hover, .slmm li img:hover'),
                                    array('property' => 'background', 'label' => esc_html__( 'Background on Active', 'ssc' ), 'selector' => '.slmm li.current-menu-item:hover i, .slmm li.current-menu-item img:hover'),
                                    array('property' => 'border', 'label' => esc_html__( 'Border', 'ssc' ), 'selector' => '.slmm li i:hover, .slmm li img:hover'),
                                    array('property' => 'border-radius', 'label' => esc_html__( 'Border Radius', 'ssc' ), 'selector' => '.slmm li i:hover, .slmm li img:hover'),
                                    array('property' => 'padding', 'label' => esc_html__( 'Padding', 'ssc' ), 'selector' => '.slmm li i:hover, .slmm li img:hover'),
                                ),
                                'Caret' => array(
                                    array('property' => 'font-size', 'label' => esc_html__( 'Font Size', 'ssc' ), 'selector' => '.slmm li:hover .caret'),
                                    array('property' => 'color', 'label' => esc_html__( 'Color', 'ssc' ), 'selector' => '.slmm li:hover .caret'),
                                    array('property' => 'color', 'label' => esc_html__( 'Color on Active', 'ssc' ), 'selector' => '.slmm li.current-menu-item .caret:hover'),
                                    array('property' => 'background', 'label' => esc_html__( 'Background', 'ssc' ), 'selector' => '.slmm li:hover .caret'),
                                    array('property' => 'background', 'label' => esc_html__( 'Background on Active', 'ssc' ), 'selector' => '.slmm li.current-menu-item .caret:hover'),
                                    array('property' => 'border', 'label' => esc_html__( 'Border', 'ssc' ), 'selector' => '.slmm li:hover .caret'),
                                    array('property' => 'border-radius', 'label' => esc_html__( 'Border Radius', 'ssc' ), 'selector' => '.slmm li:hover .caret'),
                                    array('property' => 'padding', 'label' => esc_html__( 'Padding', 'ssc' ), 'selector' => '.slmm li:hover .caret'),
                                ),
                                'Search' => array(
                                    // Icon
                                    array('property' => 'font-size', 'label' => esc_html__( 'Icon Font Size', 'ssc' ), 'selector' => '.slm-mega-item .slm-search-icon i.menu-item-icon:hover'),
                                    array('property' => 'color', 'label' => esc_html__( 'Icon Color', 'ssc' ), 'selector' => '.slm-mega-item .slm-search-icon i.menu-item-icon:hover'),
                                    array('property' => 'background', 'label' => esc_html__( 'Icon Background', 'ssc' ), 'selector' => '.slm-mega-item .slm-search-icon i.menu-item-icon:hover'),
                                    array('property' => 'border', 'label' => esc_html__( 'Icon Border', 'ssc' ), 'selector' => '.slm-mega-item .slm-search-icon i.menu-item-icon:hover'),
                                    array('property' => 'border-radius', 'label' => esc_html__( 'Icon Border Radius', 'ssc' ), 'selector' => '.slm-mega-item .slm-search-icon i.menu-item-icon:hover'),
                                    array('property' => 'padding', 'label' => esc_html__( 'Icon Padding', 'ssc' ), 'selector' => '.slm-mega-item .slm-search-icon i.menu-item-icon:hover'),
                                    // Input
                                    array('property' => 'font-size', 'label' => esc_html__( 'Input Font Size', 'ssc' ), 'selector' => '.slmm .slm-search-block .slm-search-input:hover'),
                                    array('property' => 'color', 'label' => esc_html__( 'Input Text Color', 'ssc' ), 'selector' => '.slmm .slm-search-block .slm-search-input:hover'),
                                    array('property' => 'background', 'label' => esc_html__( 'Input Background', 'ssc' ), 'selector' => '.slmm .slm-search-block .slm-search-input:hover'),
                                    array('property' => 'border', 'label' => esc_html__( 'Input Border', 'ssc' ), 'selector' => '.slmm .slm-search-block .slm-search-input:hover'),
                                    array('property' => 'border-radius', 'label' => esc_html__( 'Input Border Radius', 'ssc' ), 'selector' => '.slmm .slm-search-block .slm-search-input:hover'),
                                    // Close Icon
                                    array('property' => 'color', 'label' => esc_html__( 'Color of Close Icon', 'ssc' ), 'selector' => '.slmm .slm-search-block .slm-search-close:hover'),
                                ),
                                'Cart' => array(
                                    // Icon
                                    array('property' => 'font-size', 'label' => esc_html__( 'Icon Font Size', 'ssc' ), 'selector' => '.slmm li.slm-cart-menu-item:hover i'),
                                    array('property' => 'color', 'label' => esc_html__( 'Icon Color', 'ssc' ), 'selector' => '.slmm li.slm-cart-menu-item:hover i'),
                                    array('property' => 'background', 'label' => esc_html__( 'Icon Background', 'ssc' ), 'selector' => '.slmm li.slm-cart-menu-item:hover i'),
                                    array('property' => 'border', 'label' => esc_html__( 'Icon Border', 'ssc' ), 'selector' => '.slmm li.slm-cart-menu-item:hover i'),
                                    array('property' => 'border-radius', 'label' => esc_html__( 'Icon Border Radius', 'ssc' ), 'selector' => '.slmm li.slm-cart-menu-item:hover i'),
                                    array('property' => 'padding', 'label' => esc_html__( 'Icon Padding', 'ssc' ), 'selector' => '.slmm li.slm-cart-menu-item:hover i'),
                                    // Cart Link
                                    array('property' => 'color', 'label' => esc_html__( 'Cart Link Text Color', 'ssc' ), 'selector' => '.slmm .slm-cart-menu-item .slm-link-to-cart:hover'),
                                    array('property' => 'font-weight', 'label' => esc_html__( 'Cart Link Font Weight', 'ssc' ), 'selector' => '.slmm .slm-cart-menu-item .slm-link-to-cart:hover'),
                                    array('property' => 'text-transform', 'label' => esc_html__( 'Cart Link Text Transform', 'ssc' ), 'selector' => '.slmm .slm-cart-menu-item .slm-link-to-cart:hover'),
                                    array('property' => 'text-decoration', 'label' => esc_html__( 'Cart Link Text Decoration', 'ssc' ), 'selector' => '.slmm .slm-cart-menu-item .slm-link-to-cart:hover'),
                                    array('property' => 'background', 'label' => esc_html__( 'Cart Link Background', 'ssc' ), 'selector' => '.slmm .slm-cart-menu-item .slm-link-to-cart:hover'),
                                    array('property' => 'border', 'label' => esc_html__( 'Cart Link Border', 'ssc' ), 'selector' => '.slmm .slm-cart-menu-item .slm-link-to-cart:hover'),
                                    array('property' => 'border-radius', 'label' => esc_html__( 'Cart Link Border Radius', 'ssc' ), 'selector' => '.slmm .slm-cart-menu-item .slm-link-to-cart:hover'),
                                    array('property' => 'padding', 'label' => esc_html__( 'Cart Link Padding', 'ssc' ), 'selector' => '.slmm .slm-cart-menu-item .slm-link-to-cart:hover'),
                                ),
                                'Box 2 lvl' => array(
                                    array('property' => 'background', 'selector' => '.slmm li ul:hover'),
                                    array('property' => 'box-shadow', 'label' => esc_html__( 'Box Shadow', 'ssc' ), 'selector' => '.slmm li ul:hover'),
                                    array('property' => 'border', 'label' => esc_html__( 'Border', 'ssc' ), 'selector' => '.slmm li ul:hover'),
                                    array('property' => 'border-radius', 'label' => esc_html__( 'Border Radius', 'ssc' ), 'selector' => '.slmm li ul:hover'),
                                ),
                                'Item Box 2 lvl' => array(
                                    array('property' => 'background', 'selector' => '.slmm li ul li:hover'),
                                    array('property' => 'background', 'label' => esc_html__( 'Background for active item', 'ssc' ), 'selector' => '.slmm li ul li.current-menu-item:hover'),
                                    array('property' => 'border', 'label' => esc_html__( 'Border', 'ssc' ), 'selector' => '.slmm li ul li:hover'),
                                    array('property' => 'border-radius', 'label' => esc_html__( 'Border Radius', 'ssc' ), 'selector' => '.slmm li ul li:hover'),
                                    array('property' => 'padding', 'label' => esc_html__( 'Padding', 'ssc' ), 'selector' => '.slmm li ul li:hover'),
                                ),
                                'Item 2 lvl' => array(
                                    array('property' => 'color', 'label' => esc_html__( 'Color', 'ssc' ), 'selector' => '.slmm li ul li a:hover, .slmm li ul li > span:hover'),
                                    array('property' => 'color', 'label' => esc_html__( 'Color on Active', 'ssc' ), 'selector' => '.slm-mega-item li ul li.current-menu-item a:hover, .slm-mega-item li ul li.current-menu-item > span:hover'),
                                    array('property' => 'font-weight', 'label' => esc_html__( 'Font Weight', 'ssc' ), 'selector' => '.slmm li ul li a:hover, .slmm li ul li > span:hover'),
                                    array('property' => 'font-style', 'label' => esc_html__( 'Font Style', 'ssc' ), 'selector' => '.slmm li ul li a:hover, .slmm li ul li > span:hover'),
                                    array('property' => 'text-transform', 'label' => esc_html__( 'Text Transform', 'ssc' ), 'selector' => '.slmm li ul li a:hover, .slmm li ul li > span:hover'),
                                    array('property' => 'text-decoration', 'label' => esc_html__( 'Text Decoration', 'ssc' ), 'selector' => '.slmm li ul li a:hover, .slmm li ul li > span:hover'),
                                    array('property' => 'background', 'label' => esc_html__( 'Background', 'ssc' ), 'selector' => '.slmm li ul li a:hover, .slmm li ul li > span:hover'),
                                    array('property' => 'background', 'label' => esc_html__( 'Background on Active', 'ssc' ), 'selector' => '.slmm li ul li.current-menu-item a:hover, .slmm li ul li.current-menu-item > span:hover'),
                                    array('property' => 'border', 'label' => esc_html__( 'Border', 'ssc' ), 'selector' => '.slmm li ul li a:hover, .slmm li ul li > span:hover'),
                                    array('property' => 'border-radius', 'label' => esc_html__( 'Border Radius', 'ssc' ), 'selector' => '.slmm li ul li a:hover, .slmm li ul li > span:hover'),
                                    array('property' => 'padding', 'label' => esc_html__( 'Padding', 'ssc' ), 'selector' => '.slmm li ul li a:hover, .slmm li ul li > span:hover'),
                                ),
                                'Icon 2 lvl' => array(
                                    array('property' => 'font-size', 'label' => esc_html__( 'Font Size', 'ssc' ), 'selector' => '.slmm li:hover ul li a:hover a i'),
                                    array('property' => 'height', 'label' => esc_html__( 'Image Height', 'ssc' ), 'selector' => '.slmm li:hover ul li a:hover a i,.slmm li:hover ul li a:hover a img'),
                                    array('property' => 'width', 'label' => esc_html__( 'Image Width', 'ssc' ), 'selector' => '.slmm li:hover ul li a:hover a i,.slmm li:hover ul li a:hover img'),
                                    array('property' => 'color', 'label' => esc_html__( 'Color', 'ssc' ), 'selector' => '.slmm li:hover ul li a:hover i, .slmm li:hover ul li a:hover img'),
                                    array('property' => 'color', 'label' => esc_html__( 'Color on Active', 'ssc' ), 'selector' => '.slm-mega-item li ul li.current-menu-item:hover i'),
                                    array('property' => 'background', 'label' => esc_html__( 'Background', 'ssc' ), 'selector' => '.slmm li:hover ul li a:hover i, .slmm li:hover ul li a:hover img'),
                                    array('property' => 'background', 'label' => esc_html__( 'Background on Active', 'ssc' ), 'selector' => '.slmm li ul li.current-menu-item:hover i, .slmm li ul li.current-menu-item img:hover'),
                                    array('property' => 'border', 'label' => esc_html__( 'Border', 'ssc' ), 'selector' => '.slmm li:hover ul li a:hover i, .slmm li:hover ul li a:hover img'),
                                    array('property' => 'border-radius', 'label' => esc_html__( 'Border Radius', 'ssc' ), 'selector' => '.slmm li:hover ul li a:hover i, .slmm li:hover ul li a:hover img'),
                                    array('property' => 'padding', 'label' => esc_html__( 'Padding', 'ssc' ), 'selector' => '.slmm li:hover ul li a:hover i, .slmm li:hover ul li a:hover img'),
                                    array('property' => 'margin', 'label' => esc_html__( 'Margin', 'ssc' ), 'selector' => '.slmm li:hover ul li a:hover i, .slmm li:hover ul li a:hover img'),
                                ),
                                'Caret 2 lvl' => array(
                                    array('property' => 'font-size', 'label' => esc_html__( 'Font Size', 'ssc' ), 'selector' => '.slmm li:hover ul li a:hover .caret'),
                                    array('property' => 'color', 'label' => esc_html__( 'Color', 'ssc' ), 'selector' => '.slmm li:hover ul li a:hover .caret'),
                                    array('property' => 'color', 'label' => esc_html__( 'Color on Active', 'ssc' ), 'selector' => '.slmm li.current-menu-item .caret:hover'),
                                    array('property' => 'background', 'label' => esc_html__( 'Background', 'ssc' ), 'selector' => '.slmm li:hover ul li a:hover .caret'),
                                    array('property' => 'background', 'label' => esc_html__( 'Background on Active', 'ssc' ), 'selector' => '.slmm li.current-menu-item .caret:hover'),
                                    array('property' => 'border', 'label' => esc_html__( 'Border', 'ssc' ), 'selector' => '.slmm li:hover ul li a:hover .caret'),
                                    array('property' => 'border-radius', 'label' => esc_html__( 'Border Radius', 'ssc' ), 'selector' => '.slmm li:hover ul li a:hover .caret'),
                                    array('property' => 'padding', 'label' => esc_html__( 'Padding', 'ssc' ), 'selector' => '.slmm li:hover ul li a:hover .caret'),
                                ),
                                'Box 3 lvl' => array(
                                    array('property' => 'background', 'selector' => '.slmm li ul li ul:hover'),
                                    array('property' => 'box-shadow', 'label' => esc_html__( 'Box Shadow', 'ssc' ), 'selector' => '.slmm li ul li ul:hover'),
                                    array('property' => 'border', 'label' => esc_html__( 'Border', 'ssc' ), 'selector' => '.slmm li ul li ul:hover'),
                                    array('property' => 'border-radius', 'label' => esc_html__( 'Border Radius', 'ssc' ), 'selector' => '.slmm li ul li ul:hover'),
                                ),
                                'Item Box 3 lvl' => array(
                                    array('property' => 'background', 'selector' => '.slmm li ul li ul li:hover'),
                                    array('property' => 'background', 'label' => esc_html__( 'Background for active item', 'ssc' ), 'selector' => '.slmm li ul li ul li.current-menu-item:hover'),
                                    array('property' => 'border', 'label' => esc_html__( 'Border', 'ssc' ), 'selector' => '.slmm li ul li ul li:hover'),
                                    array('property' => 'border-radius', 'label' => esc_html__( 'Border Radius', 'ssc' ), 'selector' => '.slmm li ul li ul li:hover'),
                                    array('property' => 'padding', 'label' => esc_html__( 'Padding', 'ssc' ), 'selector' => '.slmm li ul li ul li:hover'),
                                ),
                                'Item 3 lvl' => array(
                                    array('property' => 'color', 'label' => esc_html__( 'Color', 'ssc' ), 'selector' => '.slmm li ul li ul li a:hover, .slmm li ul li ul li > span:hover'),
                                    array('property' => 'color', 'label' => esc_html__( 'Color on Active', 'ssc' ), 'selector' => '.slm-mega-item li ul li ul li.current-menu-item a:hover, .slm-mega-item li ul li ul li.current-menu-item > span:hover'),
                                    array('property' => 'font-weight', 'label' => esc_html__( 'Font Weight', 'ssc' ), 'selector' => '.slmm li ul li ul li a:hover, .slmm li ul li ul li > span:hover'),
                                    array('property' => 'font-style', 'label' => esc_html__( 'Font Style', 'ssc' ), 'selector' => '.slmm li ul li ul li a:hover, .slmm li ul li ul li > span:hover'),
                                    array('property' => 'text-transform', 'label' => esc_html__( 'Text Transform', 'ssc' ), 'selector' => '.slmm li ul li ul li a:hover, .slmm li ul li ul li > span:hover'),
                                    array('property' => 'text-decoration', 'label' => esc_html__( 'Text Decoration', 'ssc' ), 'selector' => '.slmm li ul li ul li a:hover span, .slmm li ul li ul li > span:hover'),
                                    array('property' => 'background', 'label' => esc_html__( 'Background', 'ssc' ), 'selector' => '.slmm li ul li ul li a:hover, .slmm li ul li ul li > span:hover'),
                                    array('property' => 'background', 'label' => esc_html__( 'Background on Active', 'ssc' ), 'selector' => '.slmm li ul li ul li.current-menu-item a:hover, .slmm li ul li ul li.current-menu-item > span:hover'),
                                    array('property' => 'border', 'label' => esc_html__( 'Border', 'ssc' ), 'selector' => '.slmm li ul li ul li a:hover, .slmm li ul li ul li > span:hover'),
                                    array('property' => 'border-radius', 'label' => esc_html__( 'Border Radius', 'ssc' ), 'selector' => '.slmm li ul li ul li a:hover, .slmm li ul li ul li > span:hover'),
                                    array('property' => 'padding', 'label' => esc_html__( 'Padding', 'ssc' ), 'selector' => '.slmm li ul li ul li a:hover, .slmm li ul li ul li > span:hover'),
                                ),
                                'Icon 3 lvl' => array(
                                    array('property' => 'font-size', 'label' => esc_html__( 'Font Size', 'ssc' ), 'selector' => '.slmm li ul li ul li:hover i'),
                                    array('property' => 'height', 'label' => esc_html__( 'Image Height', 'ssc' ), 'selector' => '.slmm li ul li ul li:hover i,.slmm li ul li ul li:hover img'),
                                    array('property' => 'width', 'label' => esc_html__( 'Image Width', 'ssc' ), 'selector' => '.slmm li ul li ul li:hover i,.slmm li ul li ul li:hover img'),
                                    array('property' => 'color', 'label' => esc_html__( 'Color', 'ssc' ), 'selector' => '.slmm li ul li ul li:hover i, .slmm li ul li ul li:hover img'),
                                    array('property' => 'color', 'label' => esc_html__( 'Color on Active', 'ssc' ), 'selector' => '.slm-mega-item li ul li ul li.current-menu-item:hover i'),
                                    array('property' => 'background', 'label' => esc_html__( 'Background', 'ssc' ), 'selector' => '.slmm li ul li ul li:hover i, .slmm li ul li ul li:hover img'),
                                    array('property' => 'background', 'label' => esc_html__( 'Background on Active', 'ssc' ), 'selector' => '.slmm li ul li ul li.current-menu-item:hover i, .slmm li ul li ul li.current-menu-item:hover img'),
                                    array('property' => 'border', 'label' => esc_html__( 'Border', 'ssc' ), 'selector' => '.slmm li ul li ul li:hover i, .slmm li ul li ul li:hover img'),
                                    array('property' => 'border-radius', 'label' => esc_html__( 'Border Radius', 'ssc' ), 'selector' => '.slmm li ul li ul li:hover i, .slmm li ul li ul li:hover img'),
                                    array('property' => 'padding', 'label' => esc_html__( 'Padding', 'ssc' ), 'selector' => '.slmm li ul li ul li:hover i, .slmm li ul li ul li:hover img'),
                                ),
                                'Mega Menu Box' => array(
	                                array('property' => 'height', 'label' => esc_html__( 'Height', 'ssc' ), 'selector' => '.slmm li.slm-mega-block > ul'),
	                                array('property' => 'background', 'selector' => '.slmm li.slm-mega-block > ul'),
	                                array('property' => 'margin', 'label' => esc_html__( 'Margin', 'ssc' ), 'selector' => '.slmm li.slm-mega-block > ul'),
	                                array('property' => 'padding', 'label' => esc_html__( 'Padding', 'ssc' ), 'selector' => '.slmm li.slm-mega-block > ul'),
	                                array('property' => 'box-shadow', 'label' => esc_html__( 'Box Shadow', 'ssc' ), 'selector' => '.slmm li.slm-mega-block > ul'),
	                                array('property' => 'border', 'label' => esc_html__( 'Border', 'ssc' ), 'selector' => '.slmm li.slm-mega-block > ul'),
	                                array('property' => 'border-radius', 'label' => esc_html__( 'Border Radius', 'ssc' ), 'selector' => '.slmm li.slm-mega-block > ul'),
                                ),
                                'Column Box' => array(
	                                array('property' => 'display', 'label' => esc_html__( 'Display', 'ssc' ), 'selector' => '.slmm li.slmm-column'),
	                                array('property' => 'float', 'label' => esc_html__( 'Float', 'ssc' ), 'selector' => '.slmm li.slmm-column'),
	                                array('property' => 'line-height', 'label' => esc_html__( 'Line Height', 'ssc' ), 'selector' => '.slmm li.slmm-column'),
	                                array('property' => 'text-align', 'label' => esc_html__( 'Text Align', 'ssc' ), 'selector' => '.slmm li.slmm-column'),
	                                array('property' => 'background', 'selector' => '.slmm li.slmm-column'),
	                                array('property' => 'background', 'label' => esc_html__( 'Background for active item', 'ssc' ), 'selector' => '.slmm li.slmm-column.current-menu-item'),
	                                array('property' => 'height', 'label' => esc_html__( 'Height', 'ssc' ), 'selector' => '.slmm li.slmm-column'),
	                                array('property' => 'width', 'label' => esc_html__( 'Width', 'ssc' ), 'selector' => '.slmm li.slmm-column'),
	                                array('property' => 'border', 'label' => esc_html__( 'Border', 'ssc' ), 'selector' => '.slmm li.slmm-column'),
	                                array('property' => 'border', 'label' => esc_html__( 'Border Last Child', 'ssc' ), 'selector' => '.slm-sub-menu li.slmm-column:last-child'),
	                                array('property' => 'border-radius', 'label' => esc_html__( 'Border Radius', 'ssc' ), 'selector' => '.slmm li.slmm-column'),
	                                array('property' => 'padding', 'label' => esc_html__( 'Padding', 'ssc' ), 'selector' => '.slmm li.slmm-column'),
	                                array('property' => 'margin', 'label' => esc_html__( 'Margin', 'ssc' ), 'selector' => '.slmm li.slmm-column'),
                                ),
                                'Column Item' => array(
	                                array('property' => 'font-size', 'label' => esc_html__( 'Font Size', 'ssc' ), 'selector' => '.slmm li.slmm-column > a, .slmm li.slmm-column > span'),
	                                array('property' => 'line-height', 'label' => esc_html__( 'Line Height', 'ssc' ), 'selector' => '.slmm li.slmm-column > a, .slmm li.slmm-column > span'),
	                                array('property' => 'color', 'label' => esc_html__( 'Color', 'ssc' ), 'selector' => '.slmm li.slmm-column > a, .slmm li.slmm-column > span'),
	                                array('property' => 'color', 'label' => esc_html__( 'Color on Active', 'ssc' ), 'selector' => '.slmm li.current-menu-item a, .slmm li.current-menu-item span'),
	                                array('property' => 'font-family', 'label' => esc_html__( 'Font Family', 'ssc' ), 'selector' => '.slmm li.slmm-column > a, .slmm li.slmm-column > span'),
	                                array('property' => 'font-weight', 'label' => esc_html__( 'Font Weight', 'ssc' ), 'selector' => '.slmm li.slmm-column > a, .slmm li.slmm-column > span'),
	                                array('property' => 'font-style', 'label' => esc_html__( 'Font Style', 'ssc' ), 'selector' => '.slmm li.slmm-column > a, .slmm li.slmm-column > span'),
	                                array('property' => 'text-transform', 'label' => esc_html__( 'Text Transform', 'ssc' ), 'selector' => '.slmm li.slmm-column > a, .slmm li.slmm-column > span'),
	                                array('property' => 'text-decoration', 'label' => esc_html__( 'Text Decoration', 'ssc' ), 'selector' => '.slmm li a span, .slmm li > span'),
	                                array('property' => 'background', 'label' => esc_html__( 'Background', 'ssc' ), 'selector' => '.slmm li.slmm-column > a, .slmm li.slmm-column > span'),
	                                array('property' => 'background', 'label' => esc_html__( 'Background on Active', 'ssc' ), 'selector' => '.slmm li.current-menu-item a, .slmm li.current-menu-item > span'),
	                                array('property' => 'border', 'label' => esc_html__( 'Border', 'ssc' ), 'selector' => '.slmm li.slmm-column > a, .slmm li.slmm-column > span'),
	                                array('property' => 'border', 'label' => esc_html__( 'Border Last Child', 'ssc' ), 'selector' => '.slm-sub-menu li:last-child > a, .slm-sub-menu li:last-child > span'),
	                                array('property' => 'border-radius', 'label' => esc_html__( 'Border Radius', 'ssc' ), 'selector' => '.slmm li.slmm-column > a, .slmm li.slmm-column > span'),
	                                array('property' => 'padding', 'label' => esc_html__( 'Padding', 'ssc' ), 'selector' => '.slmm li.slmm-column > a, .slmm li.slmm-column > span'),
	                                array('property' => 'margin', 'label' => esc_html__( 'Margin', 'ssc' ), 'selector' => '.slmm li.slmm-column > a, .slmm li.slmm-column > span'),
                                ),
                                'Composer Block Box' => array(
	                                array('property' => 'width', 'label' => esc_html__( 'Width', 'ssc' ), 'selector' => '.slmm li:hover .slm-composer-block-widget'),
	                                array('property' => 'height', 'label' => esc_html__( 'Height', 'ssc' ), 'selector' => '.slmm li:hover .slm-composer-block-widget'),
	                                array('property' => 'background', 'selector' => '.slmm li:hover .slm-composer-block-widget'),
	                                array('property' => 'margin', 'label' => esc_html__( 'Margin', 'ssc' ), 'selector' => '.slmm li:hover .slm-composer-block-widget'),
	                                array('property' => 'padding', 'label' => esc_html__( 'Padding', 'ssc' ), 'selector' => '.slmm li:hover .slm-composer-block-widget'),
	                                array('property' => 'box-shadow', 'label' => esc_html__( 'Box Shadow', 'ssc' ), 'selector' => '.slmm li:hover .slm-composer-block-widget'),
	                                array('property' => 'border', 'label' => esc_html__( 'Border', 'ssc' ), 'selector' => '.slmm li:hover .slm-composer-block-widget'),
	                                array('property' => 'border-radius', 'label' => esc_html__( 'Border Radius', 'ssc' ), 'selector' => '.slmm li:hover .slm-composer-block-widget'),
                                ),
                            )
                        )
                    )
                )

            )
        )
    ));
}

function slmm_get_menu_select (){
    $menus = get_terms( array (
        'taxonomy'      => 'nav_menu',
        'orderby'       => 'id',
        'order'         => 'ASC',
        'hide_empty'    => true,
        'object_ids'    => null,
        'include'       => array(),
        'exclude'       => array(),
        'exclude_tree'  => array(),
        'number'        => '',
        'fields'        => 'all',
        'count'         => false,
        'slug'          => '',
        'parent'         => '',
        'hierarchical'  => true,
    ) );
    $out = array();
    if( is_array( $menus ) ) {
        foreach( $menus as $menu ){
            $out[$menu->slug] = $menu->name;
        }
    }
    return $out;
}

// Register Shortcode
function sl_menu_shortcode( $atts, $content = null ) {
	$class = '';
    extract( shortcode_atts( array(
        'menu_id' => '',
        'animation_type' => '',
        'max_menu_depth' => '',
        'icon_for_arrow' => '',
        'icon_for_arrow_sec' => '',
        'menu_box_id' => '',
        'mobile_type'=>'',
        'mobile_text'=> '',
        'icon_for_mobile_menu_hiden' => '',
        'icon_for_mobile_menu_shown' => '',
        'menu_cart_title' => '',
        'menu_cart_button' => '',
        'menu_cart_total' => '',
        'menu_cart_empty' => '',
        'menu_cart_item' => '',
        'menu_cart_items' => '',
        'class' => '',
    ) , $atts ) );



    $wrp_classes = apply_filters( 'kc-el-class', $atts );
    $output = '<div  class="ssc_menu '.implode( ' ', $wrp_classes ) . ' '.$class.'">';
    if ( isset($mobile_type) && true == $mobile_type ) {
        $output .= '<div class="slmm-respmenu "><button type="button" class="slm-open-menu-list" data-slmenu-target="#slmenu-' . $menu_box_id .  '">';
        if( !empty( $mobile_text ) ){
            $output .= '<span>' . esc_html( $mobile_text ) . '</span>';
        }
        $output .= '<i class="slmm-icon-menu-hiden' . ' ' . $icon_for_mobile_menu_hiden . '"></i><i class="slmm-icon-menu-shown' . ' '  . $icon_for_mobile_menu_shown . '" style="display: none;"></i></button></div>';
        $container_class = 'slmm-mobile-hide';
    } else {
        $container_class = '';
    }
    $output .= wp_nav_menu( array(
        'theme_location'  => '',
        'menu'            => $menu_id,
        'container'       => 'div',
        'container_class' => $container_class,
        'container_id'    => 'slmenu-' . $menu_box_id,
        'menu_class'      => 'slmm '.$animation_type,
        'menu_id'         => '',
        'echo'            => false,
        'fallback_cb'     => 'wp_page_menu',
        'before'          => '',
        'after'           => '',
        'link_before'     => '',
        'link_after'      => '',
        'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
        'depth'           => $max_menu_depth,
        'walker'          => new Walker_Nav_Menu( $atts ),
    ) );
    if ( Walker_Nav_Menu::$desc_styles != '' || Walker_Nav_Menu::$res_styles != '' ) {
//        wp_register_style('ssc-styles-menu', false);
//        wp_enqueue_style('ssc-styles-menu');
//	    wp_add_inline_style( 'ssc-styles-menu',
//		    sl_walker_nav_menu::$desc_styles . '@media (max-width: 999px){' . sl_walker_nav_menu::$res_styles . '}' );
//	    sl_walker_nav_menu::$desc_styles = sl_walker_nav_menu::$res_styles = '';

	    add_action(
		    'wp_enqueue_scripts',
		    function () {
			    wp_add_inline_style( 'ssc-styles',
				    Walker_Nav_Menu::$desc_styles . '@media (max-width: 999px){' . Walker_Nav_Menu::$res_styles . '}' );
			    Walker_Nav_Menu::$desc_styles = Walker_Nav_Menu::$res_styles = '';
		    },
            13000
	    );
    }
    $output .= '</div>';
    return $output;

}
add_shortcode( 'sl_menu', 'sl_menu_shortcode' );

add_filter( 'wp_edit_nav_menu_walker', 'sl_replace_backend_walker', 3000 );

/** Swith To SecretLab Walker Axtion **/
add_action( 'wp_ajax_sl_switch_menu_walker' , 'sl_switch_menu_walker' );


function sl_replace_backend_walker( $name )
{
    return 'Secretlab_Shortcodes\Inc\Admin\Shortcodes\Menu\Backend_Walker';
}


/**
 * Very Important .
 * Replace The WP add menu item by AJAX
 * This Will be remove when they add an action in the future
 *
 */
function sl_switch_menu_walker() {
    if ( ! current_user_can( 'edit_theme_options' ) )
        die('-1');

    check_ajax_referer( 'add-menu_item', 'menu-settings-column-nonce' );

    require_once ABSPATH . 'wp-admin/includes/nav-menu.php';

    $item_ids = wp_save_nav_menu_items( 0, $_POST['menu-item'] );
    if ( is_wp_error( $item_ids ) )
        die('-1');

    foreach ( ( array ) $item_ids as $menu_item_id ) {
        $menu_obj = get_post( $menu_item_id );
        if ( !empty( $menu_obj->ID ) ) {
            $menu_obj = wp_setup_nav_menu_item( $menu_obj );
            $menu_obj->label = $menu_obj->title; // don't show "(pending)" in ajax-added items
            $menu_items[] = $menu_obj;
        }
    }

    if ( ! empty( $menu_items ) ) {
        $args = array(
            'after' => '',
            'before' => '',
            'link_after' => '',
            'link_before' => '',
            'walker' => new \Secretlab_Shortcodes\Inc\Admin\Shortcodes\Menu\Backend_Walker(),
        );
        echo walk_nav_menu_tree( $menu_items, 0, ( object ) $args );
    }

    die('end');
}


function sl_backend_css_js( $hook ){

    if( 'nav-menus.php' == $hook ) {
        wp_enqueue_script( 'jquery' );
        wp_enqueue_script( 'wp-color-picker' );
        wp_enqueue_style( 'wp-color-picker' );
        wp_enqueue_script( 'wp-color-picker-alpha', plugin_dir_url(__FILE__) . 'js/wp-color-picker-alpha.js', array( 'wp-color-picker' ), false, true );
        wp_enqueue_script('sl_admin_menus_script', plugin_dir_url( __FILE__ ) . 'js/sl_menu_admin.js' , array( 'jquery', 'wp-color-picker-alpha' ) );
        $params = array(
            'nonce' => wp_create_nonce( 'sl_nonce' ),
            'loadimg' => get_admin_url() . 'images/loading.gif',
        );
        wp_localize_script( 'sl_admin_menus_script', 'seclab_params', $params );
    }
}

add_action( 'admin_enqueue_scripts' , 'sl_backend_css_js' );

function ajax_slSaveItemsData(){

    check_ajax_referer( 'sl_nonce', 'nonce' );

    $post_data = json_decode( stripslashes( $_POST['data'] ), true );

    foreach ( $post_data as $option ) {

        $id = explode( '[', $option['name'] );
        $name = '_'.$id[0];
        $id = str_replace( ']', '', $id[1] );

        update_post_meta( $id, $name, $option['value'] );
    }

    exit();
}
add_action( 'wp_ajax_slSaveItemsData','ajax_slSaveItemsData' );
