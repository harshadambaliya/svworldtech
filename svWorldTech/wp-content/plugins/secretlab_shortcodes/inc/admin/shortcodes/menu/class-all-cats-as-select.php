<?php

namespace Secretlab_Shortcodes\Inc\Admin\Shortcodes\Menu;

/**
 * Create HTML '<select>' of categories.
 *
 * @package WordPress
 * @since 2.1.0
 * @uses Walker
 */
class All_Cats_As_Select extends \Walker_Category {


	public $selected_cat;

	function __construct( $selected_cat = 0 ) {

		$this->selected_cat = $selected_cat;
	}

	/**
	 * @see Walker::$tree_type
	 * @since 2.1.0
	 * @var string
	 */
	var $tree_type = 'category';
	/**
	 * @see Walker::$db_fields
	 * @since 2.1.0
	 * @todo Decouple this
	 * @var array
	 */
	var $db_fields = array ('parent' => 'parent', 'id' => 'term_id');
	/**
	 * @see Walker::start_lvl()
	 * @since 2.1.0
	 *
	 * @param string $output Passed by reference. Used to append additional content.
	 * @param int $depth Depth of category. Used for tab indentation.
	 * @param array $args Will only append content if style argument value is 'list'.
	 */
	function start_lvl( &$output, $depth = 0, $args = array() ) {
	}
	/**
	 * @see Walker::end_lvl()
	 * @since 2.1.0
	 *
	 * @param string $output Passed by reference. Used to append additional content.
	 * @param int $depth Depth of category. Used for tab indentation.
	 * @param array $args Will only append content if style argument value is 'list'.
	 */
	function end_lvl( &$output, $depth = 0, $args = array() ) {
	}
	/**
	 * @see Walker::start_el()
	 * @since 2.1.0
	 *
	 * @param string $output Passed by reference. Used to append additional content.
	 * @param object $category Category data object.
	 * @param int $depth Depth of category in reference to parents.
	 * @param array $args
	 */
	function start_el( &$output, $category, $depth = 0, $args = array(), $id = 0 ) {
		extract($args);

		// Category Name
		$cat_name = esc_attr( $category->name );
		$cat_name = apply_filters( 'list_cats', $cat_name, $category );

		// Prepare Select "<option>"
		$indent = '';
		if ( $category->category_parent != 0 )
		{
			$indent = '&nbsp;&nbsp;&nbsp;&nbsp;';
		}

		$wp_get_url = get_term_link( $category );
		$cat_url = '';
		if( !is_wp_error( $wp_get_url ) )
		{
			$cat_url = $wp_get_url;
		}

		$selected = $this->selected_cat == $category->cat_ID ? ' selected="selected" ' : '';
		$op  = '<option value="'.$category->cat_ID.'" data-taxonomy="'.$category->taxonomy.'" data-category_id="'.$category->cat_ID.'" data-category_name="'.$cat_name.'" data-category_url="' .$cat_url. '" '.$selected.' >';
		$op .= $indent.$cat_name . '</option>';

		// Output
		$output .= $op;
	}
	/**
	 * @see Walker::end_el()
	 * @since 2.1.0
	 *
	 * @param string $output Passed by reference. Used to append additional content.
	 * @param object $page Not used.
	 * @param int $depth Depth of category. Not used.
	 * @param array $args Only uses 'list' for whether should append to output.
	 */
	function end_el( &$output, $page, $depth = 0, $args = array() ) {
		$output .= '';
	}

}