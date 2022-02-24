<?php

namespace Secretlab_Shortcodes\Inc\Front\Shortcodes\Menu\Types;

use Secretlab_Shortcodes\Inc\Front\Interfaces\Menu_Type_Interface;

class Drop_Down_Menu_Type implements Menu_Type_Interface {

	private $menu_key;

	private $atts;

	private $dropdown_width = '';
	private $dropdown_sub_open_pos          = 'left';

	private $indent;

	public function __construct( $menu_key, $atts ) {
		$this->menu_key = $menu_key;
		$this->atts     = $atts;
	}

	public function start_lvl( $output, $depth, $args ) {
		return "\n" . $this->indent . '<ul class=" ' . $args->class_names . ' ' . $this->dropdown_sub_open_pos . '" style="' . $this->dropdown_width . '">' . "\n";
	}

	public function start_el( $item_meta, $item, $args, $depth ) {
		$this->indent = $args->indent;
		switch ( $depth ) {
			case 0;
				$this->dropdown_width = empty( $item_meta[ $this->menu_key . '-dropdown_width' ][0] ) ? '' : 'width:' . $item_meta[ $this->menu_key . '-dropdown_width' ][0] . ';';

				if ( ! empty ( $item_meta[ $this->menu_key . '-dropdown_open_pos' ][0] ) ) {
					switch ( $item_meta[ $this->menu_key . '-dropdown_open_pos' ][0] ) {
						case ( 'right' ) :
							$this->dropdown_sub_open_pos = 'slm-submenu-pos-right';
							break;
						default :
							$this->dropdown_sub_open_pos = 'slm-submenu-pos-left';
					}
				}

				if ( in_array( "menu-item-has-children",
						$item->classes ) && $depth == 0 && isset( $this->atts['max_menu_depth'] ) && $this->atts['max_menu_depth'] > 1 ) {
					$args->link_after .= '<i class="caret' . ' ' . $this->atts['icon_for_arrow'] . '"></i>';
				}

				$output = $this->indent . '<li id="nav-menu-item-' . $item->ID . '" class=" slm-dropd-item ' . $args->depth_class_names . ' ' . $args->class_names . ' ' . $args->menu_item_acess . '" style="z-index: 1; ">';

				// link attributes

				$item->title = ( 'only_icon' === $args->only_icon ) ? '' : $item->title;
				if ( ! empty( $item->url ) ) {

					$attributes = ! empty( $item->attr_title ) ? ' title="' . esc_attr( $item->attr_title ) . '"' : '';
					$attributes .= ! empty( $item->target ) ? ' target="' . esc_attr( $item->target ) . '"' : '';
					$attributes .= ! empty( $item->xfn ) ? ' rel="' . esc_attr( $item->xfn ) . '"' : '';
					if ( $args->item_url != $args->current_url ) {
						$attributes .= ' href="' . esc_attr( $item->url ) . '" ';
					} else {
						$attributes .= ' href="#" ';
					}
					$attributes .= ' class="menu-link ' . ( $depth > 0 ? 'sub-menu-link' : 'main-menu-link' ) . '" ';

					$item_output = sprintf( '%1$s<a%2$s>%3$s<span>%4$s</span>%5$s</a>%6$s',
						$args->before,
						$attributes,
						$args->link_before,
						apply_filters( 'the_title', $item->title, $item->ID ),
						$args->link_after,
						$args->after
					);

				} else {

					$attributes = ' class="menu-link ' . ( $depth > 0 ? 'sub-menu-link' : 'main-menu-link' ) . '" ';

					$item_output = sprintf( '%1$s%3$s<span%2$s>%4$s</span>%5$s%6$s',
						$args->before,
						$attributes,
						$args->link_before,
						apply_filters( 'the_title', $item->title, $item->ID ),
						$args->link_after,
						$args->after
					);

				}

				// build html
				$output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
				return $output;
			case 1;
				if( in_array( "menu-item-has-children", $item->classes ) && $depth <= 1 && isset($this->atts['max_menu_depth']) && $this->atts['max_menu_depth'] > 1 ) {
					$args->link_after .= '<i class="caret' . ' ' . $this->atts['icon_for_arrow_sec'] . '"></i>';
				}

				$output = $this->indent . '<li id="nav-menu-item-'. $item->ID . '" class=" ' . $args->depth_class_names . ' ' . $args->class_names . ' ' . $args->menu_item_acess . '">';

				$item->title = ( 'only_icon' === $args->only_icon ) ? '' : $item->title;
				if( ! empty( $item->url ) ){

					$attributes  = ! empty( $item->attr_title ) ? ' title="'  . esc_attr( $item->attr_title ) .'"' : '';
					$attributes .= ! empty( $item->target )     ? ' target="' . esc_attr( $item->target     ) .'"' : '';
					$attributes .= ! empty( $item->xfn )        ? ' rel="'    . esc_attr( $item->xfn        ) .'"' : '';
					if ( $args->item_url != $args->current_url ) {
						$attributes .= ' href="'   . esc_attr( $item->url ) .'" ';
					} else {
						$attributes .= ' href="#" ';
					}
					$attributes .= ' class="menu-link sub-menu-link " ';

					$item_output = sprintf( '%1$s<a%2$s>%3$s<span>%4$s</span>%5$s</a>%6$s',
						$args->before,
						$attributes,
						$args->link_before,
						apply_filters( 'the_title', $item->title, $item->ID ),
						$args->link_after,
						$args->after
					);

				} else {

					$attributes = ' class="menu-link sub-menu-link " ';

					$item_output = sprintf( '%1$s%3$s<span%2$s>%4$s</span>%5$s%6$s',
						$args->before,
						$attributes,
						$args->link_before,
						apply_filters( 'the_title', $item->title, $item->ID ),
						$args->link_after,
						$args->after
					);

				}

				// build html
				$output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
				return $output;
			case 2;
				$output = $this->indent . '<li id="nav-menu-item-'. $item->ID . '" class=" ' . $args->depth_class_names . ' ' . $args->class_names . ' ' . $args->menu_item_acess . '">';

				// link attributes
				$item->title = ( 'only_icon' === $args->only_icon ) ? '' : $item->title;
				if( ! empty( $item->url ) ){

					$attributes  = ! empty( $item->attr_title ) ? ' title="'  . esc_attr( $item->attr_title ) .'"' : '';
					$attributes .= ! empty( $item->target )     ? ' target="' . esc_attr( $item->target     ) .'"' : '';
					$attributes .= ! empty( $item->xfn )        ? ' rel="'    . esc_attr( $item->xfn        ) .'"' : '';
					if ( $args->item_url != $args->current_url ) {
						$attributes .= ' href="'   . esc_attr( $item->url ) .'" ';
					} else {
						$attributes .= ' href="#" ';
					}
					$attributes .= ' class="menu-link sub-menu-link " ';

					$item_output = sprintf( '%1$s<a%2$s>%3$s<span>%4$s</span>%5$s</a>%6$s',
						$args->before,
						$attributes,
						$args->link_before,
						apply_filters( 'the_title', $item->title, $item->ID ),
						$args->link_after,
						$args->after
					);

				} else {

					$attributes = ' class="menu-link sub-menu-link " ';

					$item_output = sprintf( '%1$s%3$s<span%2$s>%4$s</span>%5$s%6$s',
						$args->before,
						$attributes,
						$args->link_before,
						apply_filters( 'the_title', $item->title, $item->ID ),
						$args->link_after,
						$args->after
					);

				}

				// build html
				$output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
				return $output;
			case 3;
				$output = $this->indent . '<li id="nav-menu-item-'. $item->ID . '" class=" ' . $args->depth_class_names . ' ' . $args->class_names . ' ' . $args->menu_item_acess . '">';

				// link attributes
				$item->title = ( 'only_icon' === $args->only_icon ) ? '' : $item->title;
				if( ! empty( $item->url ) ){

					$attributes  = ! empty( $item->attr_title ) ? ' title="'  . esc_attr( $item->attr_title ) .'"' : '';
					$attributes .= ! empty( $item->target )     ? ' target="' . esc_attr( $item->target     ) .'"' : '';
					$attributes .= ! empty( $item->xfn )        ? ' rel="'    . esc_attr( $item->xfn        ) .'"' : '';
					if ( $args->item_url != $args->current_url ) {
						$attributes .= ' href="' . esc_attr( $item->url ) . '" ';
					} else {
						$attributes .= ' href="#" ';
					}
					$attributes .= ' class="menu-link sub-menu-link " ';

					$item_output = sprintf( '%1$s<a%2$s>%3$s<span>%4$s</span>%5$s</a>%6$s',
						$args->before,
						$attributes,
						$args->link_before,
						apply_filters( 'the_title', $item->title, $item->ID ),
						$args->link_after,
						$args->after
					);

				} else {

					$attributes = ' class="menu-link sub-menu-link " ';

					$item_output = sprintf( '%1$s%3$s<span%2$s>%4$s</span>%5$s%6$s',
						$args->before,
						$attributes,
						$args->link_before,
						apply_filters( 'the_title', $item->title, $item->ID ),
						$args->link_after,
						$args->after
					);

				}

				// build html
				$output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
				return $output;

		}
	}

	public function end_el( &$output, $object, $depth = 0, $args = null ) {
		return  '</li>';
	}
}