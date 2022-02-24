<?php

namespace Secretlab_Shortcodes\Inc\Front\Shortcodes\Menu\Types;

use Secretlab_Shortcodes\Inc\Front\Interfaces\Menu_Type_Interface;

class Mega_Menu_Menu_Type implements Menu_Type_Interface {

	const TYPE = 'mega_menu';

	private $menu_key;

	private $atts;

	private $container_style = '';
	private $mega_menu_column_width = '50%';
	private $container_align_class = ' slm-submenu-pos-right ';

	private $indent;

	public function __construct( $menu_key, $atts ) {
		$this->menu_key = $menu_key;
		$this->atts     = $atts;
	}

	public function start_lvl( $output, $depth, $args ) {
		if ( $args->display_depth > 1 ) {
			$this->container_style = 'width:100%;';
		}
		return "\n" . $this->indent . '<ul class="slmm-container ' . $this->container_align_class . $args->class_names . '" style="' . $this->container_style . ' " >' . "\n";
	}

	public function start_el( $item_meta, $item, $args, $depth ) {
		$this->indent = $args->indent;
		if ( $depth == 0 ) {

			$this->mega_menu_column_width = isset( $item_meta[ $this->menu_key . '-mega_menu_column_width' ][0] ) ? $item_meta[ $this->menu_key . '-mega_menu_column_width' ][0] : '50%';
			$mega_menu_fullwidth          = isset( $item_meta[ $this->menu_key . '-mega_menu_fullwidth' ][0] ) ? $item_meta[ $this->menu_key . '-mega_menu_fullwidth' ][0] : 'off';
			$top_link_style               = ' position:initial; ';
			if ( $mega_menu_fullwidth == 'off' || $mega_menu_fullwidth == '' ) {
				$container_width       = isset( $item_meta[ $this->menu_key . '-mega_menu_width' ][0] ) ? $item_meta[ $this->menu_key . '-mega_menu_width' ][0] : '500px';
				$container_align       = isset( $item_meta[ $this->menu_key . '-mega_menu_align' ][0] ) ? $item_meta[ $this->menu_key . '-mega_menu_align' ][0] : 'right';
				$this->container_style = 'width:' . $container_width . ';';
				$top_link_style        = ' position:relative; ';

				if ( $container_align == 'left' ) {
					$this->container_align_class = ' slm-submenu-pos-left ';
				} else if ( $container_align == 'right' ) {
					$this->container_align_class = ' slm-submenu-pos-right ';
				} else {
					$this->container_style       .= ' margin-left: -' . ( ( (int) $container_width ) / 2 ) . 'px; ';
					$this->container_align_class = ' slm-submenu-pos-center ';
				}
			} else {
				$this->container_style = 'width:100%;';
			}

			if ( ! empty( $item_meta[ $this->menu_key . '-mega_menu_bg_image' ][0] ) ) {
				$bg_rep                = ! empty( $item_meta[ $this->menu_key . '-mega_menu_bg_repeat' ][0] ) ? $item_meta[ $this->menu_key . '-mega_menu_bg_repeat' ][0] : 'no-repeat';
				$bg_size               = ! empty( $item_meta[ $this->menu_key . '-mega_menu_bg_size' ][0] ) ? $item_meta[ $this->menu_key . '-mega_menu_bg_size' ][0] : 'inherit';
				$bg_pos                = ! empty( $item_meta[ $this->menu_key . '-mega_menu_bg_position' ][0] ) ? $item_meta[ $this->menu_key . '-mega_menu_bg_position' ][0] : 'center center';
				$this->container_style .= ' background: url(' . $item_meta[ $this->menu_key . '-mega_menu_bg_image' ][0] . ') ' . $bg_pos . ' ' . $bg_rep . '; background-size:' . $bg_size . '; ';
			}

			if ( ! empty( $item_meta[ $this->menu_key . '-mega_menu_bg_color' ][0] ) ) {
				$this->container_style .= ' background-color:' . esc_attr( $item_meta[ $this->menu_key . '-mega_menu_bg_color' ][0] ) . '; ';
			}

			if ( in_array( "menu-item-has-children",
					$item->classes ) && $depth == 0 && isset( $this->atts['max_menu_depth'] ) && $this->atts['max_menu_depth'] > 1 ) {
				$args->link_after .= '<i class="caret' . ' ' . $this->atts['icon_for_arrow'] . '"></i>';
			}

			$output = $this->indent . '<li id="nav-menu-item-' . $item->ID . '" class="slm-mega-block ' . $args->depth_class_names . ' ' . $args->class_names . ' ' . $args->menu_item_acess . '" style="' . $top_link_style . '">';

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

		} else if ( $depth == 1 ) {

			// link attributes

			$item->title = ( 'only_icon' === $args->only_icon ) ? '' : $item->title;
			$output      = '<li id="nav-menu-item-' . $item->ID . '" class="slmm-column" style="width:' . $this->mega_menu_column_width . ';">';
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

		} else if ( $depth >= 2 ) {
			$output = $this->indent . '<li id="nav-menu-item-' . $item->ID . '" class=" ' . $args->depth_class_names . ' ' . $args->class_names . ' ' . $args->menu_item_acess . '">';

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

		}
	}

	public function end_el( &$output, $object, $depth = 0, $args = null ) {
		return ( $depth === 0 || $depth === 1 ) ? '</li>' : '';
//		if( 'mega_menu' == $this->menu_type ){
//			if( $depth === 0 ){
//				$output .= '</li><!--sl_submenu_columns_wrap-->';
//			}
//			if( $depth === 1 ){
//				$output .= '</li>';
//			}
//		}
	}
}