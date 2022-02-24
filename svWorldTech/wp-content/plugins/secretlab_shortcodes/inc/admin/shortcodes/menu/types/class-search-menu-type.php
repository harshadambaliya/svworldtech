<?php

namespace Secretlab_Shortcodes\Inc\Admin\Shortcodes\Menu\Types;

use Secretlab_Shortcodes\Inc\Admin\Interfaces\Menu_Type_Interface;

class Search_Menu_Type implements Menu_Type_Interface {

	const TYPE = 'search';

	private $menu_key;

	public function __construct( $menu_key ) {
		$this->menu_key = $menu_key;
	}

	public function render_type_radio( $id, $key, $type ) {
		?>
            <label>
                <input type="radio" value="<?php echo self::TYPE; ?>" class="sl_menu_type <?php echo $key; ?>" name="<?php echo $key . "[". $id ."]";?>" <?php if(  $type == self::TYPE ) echo "checked"; ?> /> &nbsp;&nbsp; <?php _e('Use as Search Form','ssc'); ?>
            </label>
		<?php
	}

	public function render_type_options( $id, $meta, $type ) {
		?>
        <!-- Menu Type : Search -->
        <div <?php if( self::TYPE != $type ) echo "style='display:none;'"; ?> class="admin-sl-box_option_inside sl_box_type admin-sl-box_option_inside_search">
			<?php
			// Menu Type
			$title  = esc_html__( 'Search Text' , 'ssc' );
			$key    = 'menu-item-seclab-' . self::TYPE . '_text';
			if ( isset( $meta[$this->menu_key.'-' . self::TYPE . '_text'] ) && !empty( $meta[$this->menu_key.'-' . self::TYPE . '_text'][0] ) ) {
				$value  = $meta[$this->menu_key.'-' . self::TYPE . '_text'][0];
			}
			else {
				$value = 'Search...';
			}
			?>

            <span class="fl" ><?php echo $title; ?></span>

            <input type="text" value="<?php echo $value; ?>" id="edit-<?php echo $key.'-'.$id; ?>" class="fr <?php echo $key; ?>" name="<?php echo $key . "[". $id ."]";?>" />

            <div class="sl-clearfix"></div>
        </div>
		<?php
	}
}