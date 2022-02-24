<?php

namespace Secretlab_Shortcodes\Inc\Admin\Interfaces;

interface Menu_Type_Interface {

	public function render_type_radio($id, $key, $type);

	public function render_type_options($id, $meta, $type);

}