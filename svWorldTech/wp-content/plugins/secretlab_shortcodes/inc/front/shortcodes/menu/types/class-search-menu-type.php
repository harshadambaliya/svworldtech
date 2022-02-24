<?php

namespace Secretlab_Shortcodes\Inc\Front\Shortcodes\Menu\Types;

use Secretlab_Shortcodes\Inc\Front\Interfaces\Menu_Type_Interface;

class Search_Menu_Type implements Menu_Type_Interface {

	const TYPE = 'search';

	private $menu_key;

	private $indent;

	public function start_lvl( $output, $depth, $args ) {
		return "\n" . $this->indent . '<ul class="' . $args->class_names . '">' . "\n";
	}

	public function start_el( $item_meta, $item, $args, $depth ) {
		$this->indent = $args->indent;

		$output = '<li class="slm-search-menu-item ' . $args->depth_class_names . ' ' . $args->class_names . ' ' . $args->menu_item_acess . '">';
		$output .= '<div class="slm-search-block">';
		$output .= '        <span aria-hidden="true" class="slm-search-close sl-remove"><svg width="184" height="184" viewBox="0 0 184 184" fill="white" xmlns="http://www.w3.org/2000/svg">
<rect x="169.782" y="0.0761108" width="20" height="240" transform="rotate(45 169.782 0.0761108)" />
<rect x="0.0761108" y="14.2183" width="20" height="240" transform="rotate(-45 0.0761108 14.2183)" />
</svg>
</span>';
		$output .= '    <form action="'.get_bloginfo('url').'" method="get" >';
		$output .= '        <input type="text" name="s" class="slm-search-input" value="" placeholder="' . ( isset( $item_meta[$this->menu_key.'-search_text'][0] ) ? $item_meta[$this->menu_key.'-search_text'][0] : esc_attr__( 'Search', 'ssc' ) ) . '" >';
		$output .= '        <span aria-hidden="true" class="slm-search-submit-icon "><svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
	 viewBox="0 0 511.999 511.999" style="fill:white" xml:space="preserve">
<g>
	<g>
		<path d="M508.874,478.708L360.142,329.976c28.21-34.827,45.191-79.103,45.191-127.309c0-111.75-90.917-202.667-202.667-202.667
			S0,90.917,0,202.667s90.917,202.667,202.667,202.667c48.206,0,92.482-16.982,127.309-45.191l148.732,148.732
			c4.167,4.165,10.919,4.165,15.086,0l15.081-15.082C513.04,489.627,513.04,482.873,508.874,478.708z M202.667,362.667
			c-88.229,0-160-71.771-160-160s71.771-160,160-160s160,71.771,160,160S290.896,362.667,202.667,362.667z"/>
	</g>
</g>
</svg></span>';
		$output .= '        <input class="slm-search-submit" type="submit">';

		$output .= '    </form>';
		$output .= '</div>';

		$item->title = ( 'only_icon' === $args->only_icon ) ? '' : $item->title;

		$attributes = ' href="#" class="menu-link slm-search-icon ' . ( $depth > 0 ? 'sub-menu-link' : 'main-menu-link' ) . '" ';

		$item_output = sprintf( '%1$s<a%2$s>%3$s<span>%4$s</span>%5$s</a>%6$s',
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

	public function end_el( &$output, $object, $depth = 0, $args = null ) {
		return '';
	}
}