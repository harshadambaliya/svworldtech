<?php

namespace Secretlab_Shortcodes\Inc\Front\Shortcodes\Menu\Types;

use Secretlab_Shortcodes\Inc\Front\Interfaces\Menu_Type_Interface;

class Woocommerce_Cart_Menu_Type implements Menu_Type_Interface {

	private $menu_key;

	private $atts;

	private $indent;

	public function __construct( $menu_key, $atts ) {
		$this->menu_key = $menu_key;
		$this->atts     = $atts;
	}

	public function start_lvl( $output, $depth, $args ) {
		return "\n" . $this->indentt . '<ul class="' . $args->class_names . '">' . "\n";
	}

	public function start_el( $item_meta, $item, $args, $depth ) {
		$this->indent = $args->indent;
//		if (class_exists('WC_Integration')) {

			global $woocommerce;

			if (is_object($woocommerce->cart)) {

				$cart_url = wc_get_cart_url();
				$cart_contents_count = $woocommerce->cart->cart_contents_count;
				$cart_contents = sprintf( _n( '<span>%d</span> '.$this->atts["menu_cart_item"], '<span>%d</span> '.$this->atts["menu_cart_items"], $cart_contents_count ), $cart_contents_count );
				$cart_total = $woocommerce->cart->get_cart_total();

				$output = '<li style="" class="slm-cart-menu-item ' . $args->depth_class_names . ' ' . $args->class_names . ' ' . $args->menu_item_acess . '">';
				$args->after = '<div class=" slm-menu-item-cart-block ">';
				$args->after .= '<div>';
				$args->after .= '<h4>' . esc_attr( $this->atts['menu_cart_title'] ) . '</h4>';
				$args->after .= '<div>'.$cart_contents.'</div>';
				$args->after .= '<div>'.esc_attr( $this->atts['menu_cart_total'] ) . ' <strong>' . $cart_total . '</strong></div></div>';
				$args->after .=  '<a href="' . $cart_url . '" class="slm-link-to-cart';
				$args->after .=  '">' . esc_attr( $this->atts['menu_cart_button'] ) . '</a></div>';

				$item->title = ( 'only_icon' === $args->only_icon ) ? '' : $item->title;

				$attributes = ' href="#"  class=" menu-link slm-cart-icon ' . ( $depth > 0 ? 'sub-menu-link' : 'main-menu-link' ) . '" ';

				$item_output = sprintf( '%1$s<a%2$s>%3$s%4$s%5$s</a>%6$s',
					$args->before,
					$attributes,
					$args->link_before,
					apply_filters( 'the_title', $item->title, $item->ID ),
					$args->link_after,
					$args->after
				);

				// build html
				$output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );

				return $output;

			}

//		}
	}

	public function end_el( &$output, $object, $depth = 0, $args = null ) {
		return '';
	}
}