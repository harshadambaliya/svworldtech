<?php

namespace Secretlab_Shortcodes\Inc\Front\Shortcodes\Menu;

use Secretlab_Shortcodes\Inc\Front\Shortcodes\Menu\Types\Drop_Down_Menu_Type;
use Secretlab_Shortcodes\Inc\Front\Shortcodes\Menu\Types\Mega_Menu_Menu_Type;
use Secretlab_Shortcodes\Inc\Front\Shortcodes\Menu\Types\Search_Menu_Type;
use Secretlab_Shortcodes\Inc\Front\Shortcodes\Menu\Types\Woocommerce_Cart_Menu_Type;
use Secretlab_Shortcodes\Inc\Front\Shortcodes\Menu\Types\Composer_Block_Menu_Type;


/**
 * @package CTFramework
 * @since 1.0
 * @uses Walker_Nav_Menu
 */
class Walker_Nav_Menu extends \Walker_Nav_Menu {

	private $atts                          = array();

	public $menu_key                       = '_menu-item-seclab';
	public $item_text_color                = '';
	public $item_text_hover_color          = '';
	public $item_text_weight               = '';
	public $item_bg_color                  = '';
	public $item_resp_text_color           = '';
	public $item_resp_text_hover_color     = '';
	public $item_resp_text_weight          = '';
	public $item_resp_bg_color             = '';
//	public $item_display                   = '';
	public $only_icon                      = '';
	private $menu_type                     = '';
	private $menu_types                    = array();

	public static $desc_styles = '';

	public static $res_styles = '';

	function __construct ($atts) {
		$this->atts = $atts;
		$this->menu_types = array(
	        'dropdown' => Drop_Down_Menu_Type::class,
	        'mega_menu' => Mega_Menu_Menu_Type::class,
	        'search' => Search_Menu_Type::class,
        );
		if(post_type_exists('composer_widget')) {
			$this->menu_types['composer_block'] = Composer_Block_Menu_Type::class;
		}
		if(class_exists('WooCommerce')) {
			$this->menu_types['woocommerce_cart'] = Woocommerce_Cart_Menu_Type::class;
		}
	}

	public function slmm_desc_styles() {
		return self::$desc_styles;
	}

	public function slmm_resp_styles() {
		return self::$res_styles;
	}

	// add classes to ul sub-menus
	function start_lvl( &$output, $depth = 0, $args = null ) {
		$args = ( !is_object( $args ) ) ? (object)$args : $args ;
		// depth dependent classes
//		$args->indent = $indent = ( $depth > 0  ? str_repeat( "\t", $depth ) : '' ); // code indent
		$args->display_depth = $display_depth = ( $depth + 1); // because it counts the first submenu as 0
		$classes = array(
			'slm-sub-menu',
			( $display_depth % 2  ? 'menu-odd' : 'menu-even' ),
			( $display_depth >= 2 ? 'sub-sub-menu' : '' ),
			'slm-menu-depth-' . $display_depth,
		);
		$args->class_names = $class_names = implode( ' ', $classes );

		$output .= $this->menu_type->start_lvl( $output, $depth, $args );

	}

	// add main/sub classes to li's and mega_menu
	function start_el( &$output, $item, $depth = 0, $args = null, $id = 0 ) {
		$args = ( !is_object( $args ) ) ? (object)$args : $args ;
		$args->link_before = $args->link_after = $args->before = $args->after = '';
		$args->indent = ( $depth > 0 ? str_repeat( "\t", $depth ) : '' ); // code indent
//		$item_meta = get_post_meta( $item->ID );
		$item_meta = get_metadata( 'post', $item->ID );
		$this->item_text_color = ( empty( $item_meta[$this->menu_key.'-text_color'][0] ) ) ? '' : $item_meta[$this->menu_key.'-text_color'][0];
		$this->item_text_hover_color = ( empty( $item_meta[$this->menu_key.'-text_hover_color'][0] ) ) ? '' : $item_meta[$this->menu_key.'-text_hover_color'][0];
		$this->item_text_weight = ( empty( $item_meta[$this->menu_key.'-text_weight'][0] ) ) ? '' : $item_meta[$this->menu_key.'-text_weight'][0];
		$this->item_bg_color = ( empty( $item_meta[$this->menu_key.'-item_bg_color'][0] ) ) ? '' : $item_meta[$this->menu_key.'-item_bg_color'][0];
		$this->item_resp_text_color = ( empty( $item_meta[$this->menu_key.'-resp_text_color'][0] ) ) ? '' : $item_meta[$this->menu_key.'-resp_text_color'][0];
		$this->item_resp_text_hover_color = ( empty( $item_meta[$this->menu_key.'-resp_text_hover_color'][0] ) ) ? '' : $item_meta[$this->menu_key.'-resp_text_hover_color'][0];
		$this->item_resp_text_weight = ( empty( $item_meta[$this->menu_key.'-resp_text_weight'][0] ) ) ? '' : $item_meta[$this->menu_key.'-resp_text_weight'][0];
		$this->item_resp_bg_color = ( empty( $item_meta[$this->menu_key.'-resp_item_bg_color'][0] ) ) ? '' : $item_meta[$this->menu_key.'-resp_item_bg_color'][0];
		$args->only_icon = $this->only_icon = empty( $item_meta[$this->menu_key.'-link_icon_only'][0] ) ? 'text_and_icon' : $item_meta[$this->menu_key.'-link_icon_only'][0];
		$args->menu_item_acess = $menu_item_acess = empty( $item_meta[$this->menu_key.'-link_user_logged'][0] ) ? 'both' : $item_meta[$this->menu_key.'-link_user_logged'][0];

		if ( ( 'logged_in' == $menu_item_acess && is_user_logged_in() ) || ( 'logged_out' == $menu_item_acess && !is_user_logged_in() ) || 'both' == $menu_item_acess ) {
			// depth dependent classes
			$depth_classes = array(
				( $depth == 0 ? 'main-menu-item slm-mega-item' : 'sub-menu-item' ),
				( $depth >=2 ? 'sub-sub-menu-item' : '' ),
				( $depth % 2 ? 'menu-item-odd' : 'menu-item-even' ),
				'slm-menu-item-depth-' . $depth
			);

			$args->depth_class_names = $depth_class_names = esc_attr( implode( ' ', $depth_classes ) );

			if ( isset( $item_meta[$this->menu_key.'-link_icon_position'][0] ) ) {
				if ( "icon_font" == $item_meta[$this->menu_key.'-link_icon_type'][0] && !empty( $item_meta[$this->menu_key.'-link_icon'][0] ) ) {
					$icon  = $item_meta[$this->menu_key.'-link_icon'][0];
					switch( $item_meta[$this->menu_key.'-link_icon_position'][0] ) {
						case 'right' : $args->link_after = '<i class="menu-item-icon' . ' ' . $icon . '"></i>'; $args->link_before = ''; break;
						default : $args->link_before = '<i class="menu-item-icon' . ' ' . $icon . '"></i>'; $args->link_after = '';
					}
				} else if ( "upload" == $item_meta[$this->menu_key.'-link_icon_type'][0] && !empty( $item_meta[$this->menu_key.'-link_icon_image'][0] ) ) {
					$icon_image  = $item_meta[$this->menu_key.'-link_icon_image'][0];
					switch( $item_meta[$this->menu_key.'-link_icon_position'][0] ) {
						case 'right' : $args->link_after = '<img src="' . $icon_image . '" class="menu-item-icon">'; $args->link_before = ''; break;
						default : $args->link_before = '<img src="' . $icon_image . '">'; $args->link_after = '';
					}
				}
			}

			// passed classes
			$classes = empty( $item->classes ) ? array() : (array) $item->classes;
			$args->class_names = $class_names = esc_attr( implode( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item ) ) );

			// build html
			$args->current_url = $current_url = (is_ssl()?'https://':'http://').$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
			$args->item_url = $item_url = esc_attr( $item->url );

			if( $depth === 0 ) {

//				$this->top_level_counter += 1;
				$this->menu_type = ( ( isset( $item_meta[$this->menu_key.'-menu_type'][0] ) && !empty( $item_meta[$this->menu_key.'-menu_type'][0] ) ) ? $item_meta[$this->menu_key.'-menu_type'][0] : '' );

				$menu_type = $this->get_menu_type_class( $item_meta );

				$this->menu_type = new $menu_type( $this->menu_key, $this->atts );

			}

			$this->set_link_styles( $item->ID );

			$output .= $this->menu_type->start_el( $item_meta, $item, $args, $depth );

		} else {

			$output .= $args->indent . '<li class="' . $menu_item_acess . '" style="display: none;">';
			$item_output = apply_filters( 'the_title', $item->title, $item->ID );
			// build html
			$output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );

		}

	}

	function end_el( &$output, $object, $depth = 0, $args = null ) {
		$output .= $this->menu_type->end_el( $output, $object, $depth = 0, $args = null  );

	}// End Func


	public function set_link_styles( $id ) {

		if ( $this->item_text_color != '' || $this->item_text_weight != '' || $this->item_bg_color != '' || $this->only_icon == 'none' ) {
			self::$desc_styles .= '.slmm li#nav-menu-item-' . $id . ' > a, .slmm li#nav-menu-item-' . $id . ' > span {';
			if ( $this->item_text_color != '' ) {
				self::$desc_styles .= 'color:' . $this->item_text_color . ';';
			}
			if ( $this->item_text_weight != '' ) {
				self::$desc_styles .= 'font-weight:' . $this->item_text_weight . ';';
			}
			if ( $this->item_bg_color != '' ) {
				self::$desc_styles .= 'background-color:' . $this->item_bg_color . ';';
			}
			if ( $this->only_icon == 'none' ) {
				self::$desc_styles .= 'display:none;';
			}
			self::$desc_styles .= '} ';
		}
		if ( $this->item_text_hover_color != '' ) {
			self::$desc_styles .= '.slmm li#nav-menu-item-' . $id . ':hover > a, .slmm li#nav-menu-item-' . $id . ':hover > span {';
			self::$desc_styles .= 'color:' . $this->item_text_hover_color . ';';
			self::$desc_styles .= '} ';
		}
		if ( $this->item_resp_text_color != '' || $this->item_resp_text_weight != '' || $this->item_resp_bg_color != '' || $this->only_icon === 'none' ) {
			self::$res_styles .= '.slmm li#nav-menu-item-' . $id . ' > a, .slmm li#nav-menu-item-' . $id . ' > span {';
			if ( $this->item_resp_text_color != '' ) {
				self::$res_styles .= 'color:' . $this->item_resp_text_color . ';';
			}
			if ( $this->item_resp_text_weight != '' ) {
				self::$res_styles .= 'font-weight:' . $this->item_resp_text_weight . ';';
			}
			if ( $this->item_resp_bg_color != '' ) {
				self::$res_styles .= 'background-color:' . $this->item_resp_bg_color . ';';
			}
			self::$res_styles .= '} ';
		}
		if ( $this->item_resp_text_hover_color != '' ) {
			self::$res_styles .= '.slmm li#nav-menu-item-' . $id . ':hover > a, .slmm li#nav-menu-item-' . $id . ':hover > span {';
			self::$res_styles .= 'color:' . $this->item_resp_text_hover_color . ';';
			self::$res_styles .= '} ';
		}
	}

	private function get_menu_type_class( $item_meta ) {
		return ( empty( $item_meta[$this->menu_key.'-menu_type'][0] ) || empty( $this->menu_types[$item_meta[$this->menu_key.'-menu_type'][0]] ) ) ? Drop_Down_Menu_Type::class : $this->menu_types[$item_meta[$this->menu_key.'-menu_type'][0]];
	}
}