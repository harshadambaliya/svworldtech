<?php

namespace Secretlab_Shortcodes\Inc\Admin\Shortcodes\Menu\Types;

use Secretlab_Shortcodes\Inc\Admin\Interfaces\Menu_Type_Interface;

class Woocommerce_Cart_Menu_Type implements Menu_Type_Interface {

	const TYPE = 'woocommerce_cart';

	private $menu_key;

	public function __construct( $menu_key ) {
		$this->menu_key = $menu_key;
	}

	public function render_type_radio( $id, $key, $type ) {
		?>
            <label>
                <input type="radio" value="<?php echo self::TYPE; ?>" class="sl_menu_type <?php echo $key; ?>" name="<?php echo $key . "[". $id ."]";?>" <?php if( $type == self::TYPE ) echo "checked"; ?> /> &nbsp;&nbsp; <?php _e('Use as Woocommerce Cart','ssc'); ?>
            </label>
		<?php
	}

	public function render_type_options( $id, $meta, $type ) {
		?>
            <!-- Menu Type : woocommerce_cart -->
            <div <?php if( self::TYPE != $type ) echo "style='display:none;'"; ?> class="admin-sl-box_option_inside sl_box_type admin-sl-box_option_inside_woocommerce_cart">
            </div>
		<?php
	}
}