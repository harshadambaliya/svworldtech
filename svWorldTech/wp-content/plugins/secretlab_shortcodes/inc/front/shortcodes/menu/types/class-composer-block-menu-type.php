<?php

namespace Secretlab_Shortcodes\Inc\Front\Shortcodes\Menu\Types;

use Secretlab_Shortcodes\Inc\Front\Interfaces\Menu_Type_Interface;

class Composer_Block_Menu_Type implements Menu_Type_Interface {

	private $menu_key;

	private $atts;

	private $indent;

	public function __construct( $menu_key, $atts ) {
		$this->menu_key = $menu_key;
		$this->atts     = $atts;
	}

	public function start_lvl( $output, $depth, $args ) {
		return "\n" . $this->indent . '<ul class="' . $args->class_names . '">' . "\n";
	}

	public function start_el( $item_meta, $item, $args, $depth ) {
		$this->indent = $args->indent;
		$top_link_style = $container_align_class = $composer_block_style = '';
		$composer_block_fullwidth =  isset( $item_meta[$this->menu_key.'-composer_block_fullwidth'][0] ) ? $item_meta[$this->menu_key.'-composer_block_fullwidth'][0] : 'off';
		$top_link_style .= ' position:relative; ';
		if( $composer_block_fullwidth == 'off' || $composer_block_fullwidth == '' ){
			$container_width =  isset( $item_meta[$this->menu_key.'-composer_block_width'][0] ) ? $item_meta[$this->menu_key.'-composer_block_width'][0] : '500px';
			$container_align =  isset( $item_meta[$this->menu_key.'-composer_block_align'][0] ) ? $item_meta[$this->menu_key.'-composer_block_align'][0]: 'right';
			$composer_block_style .= 'width:'.$container_width.';';
			if( $container_align == 'left' ){
				$container_align_class = ' slm-submenu-pos-left ';
			}
			else if( $container_align == 'right' ){
				$container_align_class = ' slm-submenu-pos-right ';
			}
			else{
				$composer_block_style .= 'margin-left: -'.( ( (int) $container_width ) / 2 ).'px;';
				$container_align_class = ' slm-submenu-pos-center ';
			}
		} else {
//							$composer_block_style .= 'width:100%%;'; // %% for sprintf() in the_widget()
//							$composer_block_style .= 'width:100vw;';
			$container_align_class  = ' slm-composer-block-full-width ';
		}

		if ( isset( $item_meta[$this->menu_key.'-composer_block_bg_image'][0] ) && !empty( $item_meta[$this->menu_key.'-composer_block_bg_image'][0] ) ) {
			$bg_rep = !empty( $item_meta[$this->menu_key.'-composer_block_bg_repeat'][0] ) ? $item_meta[$this->menu_key.'-composer_block_bg_repeat'][0] : 'no-repeat';
			$bg_size = !empty( $item_meta[$this->menu_key.'-composer_block_bg_size'][0] ) ? $item_meta[$this->menu_key.'-composer_block_bg_size'][0] : 'inherit';
			$bg_pos = !empty( $item_meta[$this->menu_key.'-composer_block_bg_position'][0] ) ? $item_meta[$this->menu_key.'-composer_block_bg_position'][0] : 'center center';
			$composer_block_style .= ' background: url(' . $item_meta[$this->menu_key.'-composer_block_bg_image'][0] . ') ' . $bg_pos . ' ' . $bg_rep . '; background-size:' . $bg_size . '; ';
		}

		if ( isset( $item_meta[$this->menu_key.'-composer_block_bg_color'][0] ) && !empty( $item_meta[$this->menu_key.'-composer_block_bg_color'][0] ) ) {
			$composer_block_style .= ' background-color:' . esc_attr( $item_meta[$this->menu_key.'-composer_block_bg_color'][0] ) . '; ';
		}

		if($depth == 0 && isset($this->atts['max_menu_depth']) && $this->atts['max_menu_depth'] > 1 ) {
			$args->link_after .= '<i class="caret' . ' ' . $this->atts['icon_for_arrow'] . '"></i>';
		}
		// link attributes
		$item->title = ( 'only_icon' === $args->only_icon ) ? '' : $item->title;
		$output = $this->indent . '<li id="nav-menu-item-'. $item->ID . '" class=" slm-composer-block-item ' . $args->depth_class_names . ' ' . $args->class_names . ' ' . $args->menu_item_acess . '" style="z-index:1;' . $top_link_style . '">';

		// link attributes
		if( ! empty( $item->url ) ){

			$attributes  = ! empty( $item->attr_title ) ? ' title="'  . esc_attr( $item->attr_title ) .'"' : '';
			$attributes .= ! empty( $item->target )     ? ' target="' . esc_attr( $item->target     ) .'"' : '';
			$attributes .= ! empty( $item->xfn )        ? ' rel="'    . esc_attr( $item->xfn        ) .'"' : '';
			if ( $args->item_url != $args->current_url ) {
				$attributes .= ' href="'   . esc_attr( $item->url ) .'" ';
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
		$composer_block = ( isset( $item_meta[$this->menu_key.'-composer_block'] ) && ! empty( $item_meta[$this->menu_key.'-composer_block'][0] ) ) ? $item_meta[$this->menu_key.'-composer_block'][0] : null;

		if( !empty( $composer_block ) ){
//							$output .= '<div class=" ' . $class_names . '">';
			ob_start();
			the_widget( 'custom_post_widget',
				array(
					'custom_post_id'        => $composer_block,
					'apply_content_filters' => true,
				),
				array( 'before_widget' => '<div class="slm-composer-block-widget ' . $container_align_class . ' %s" style="' . $composer_block_style . '">' ) );
//							$output .=  ob_end_flush();
			$output .= ob_get_contents();
			ob_end_clean();
//							$output .= '</div>';
		}

		return $output;
	}

	public function end_el( &$output, $object, $depth = 0, $args = null ) {
		return  '</li>';
	}
}