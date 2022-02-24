<?php

namespace Secretlab_Shortcodes\Inc\Front\Interfaces;

interface Menu_Type_Interface {

	public function start_lvl( $output, $depth, $args );

	public function start_el( $item_meta, $item, $args, $depth );

	public function end_el( &$output, $object, $depth = 0, $args = null );

}