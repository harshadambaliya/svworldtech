<?php

namespace Secretlab_Shortcodes\Inc\Admin\Shortcodes\Menu\Types;

use Secretlab_Shortcodes\Inc\Admin\Interfaces\Menu_Type_Interface;

class Drop_Down_Menu_Type implements Menu_Type_Interface {

	const TYPE = 'dropdown';

	private $menu_key;

	public function __construct( $menu_key ) {
		$this->menu_key = $menu_key;
	}

	public function render_type_radio( $id, $key, $type ) {
		?>
		<label>
			<input type="radio" value="<?php echo self::TYPE; ?>" class="sl_menu_type <?php echo $key; ?>" name="<?php echo $key . "[". $id ."]";?>" <?php if( $type == self::TYPE ) echo "checked"; ?> /> &nbsp;&nbsp; <?php _e('Use as DropDown','ssc'); ?>
		</label>
		<?php
	}

	public function render_type_options( $id, $meta, $type ) {
		?>

		<!-- Menu Type : DropDown -->
		<div <?php if( self::TYPE != $type) echo "style='display:none;'"; ?> class="admin-sl-box_option_inside sl_box_type admin-sl-box_option_inside_dropdown">

			<?php
			// Width
			$title  = esc_html__( 'Submenu Width' , 'ssc' );
			$key    = 'menu-item-seclab-' . self::TYPE . '_width';
			if ( isset( $item_meta[$this->menu_key.'-' . self::TYPE . '_width'] ) && !empty( $item_meta[$this->menu_key.'-' . self::TYPE . '_width'][0] ) ) {
				$value  = $item_meta[$this->menu_key.'-' . self::TYPE . '_width'][0];
			}
			else {
				$value = '';
			}
			?>

			<span class="fl" ><?php echo $title; ?></span>
			<input maxlength="7" type="text" value="<?php echo $value; ?>" id="edit-<?php echo $key.'-'.$id; ?>" class="fr <?php echo $key; ?>" name="<?php echo $key . "[". $id ."]";?>" />

			<?php
			// Open Sub Position
			$title  = esc_html__( 'Open Submenu To' , 'ssc' );
			$key    = 'menu-item-seclab-' . self::TYPE . '_open_pos';
			if ( isset( $item_meta[$this->menu_key.'-' . self::TYPE . '_open_pos'] )  && !empty( $item_meta[$this->menu_key.'-' . self::TYPE . '_open_pos'][0] ) ) {
				$value  = $item_meta[$this->menu_key.'-' . self::TYPE . '_open_pos'][0];
			}
			else {
				$value = 'right';
			}
			?>
			<div class="sl-clearfix"></div>
			<span class="fl" ><?php echo $title . ':'; ?></span>
			<select id="edit-<?php echo $key.'-'.$id; ?>" class=" <?php echo $key; ?>" name="<?php echo $key . "[". $id ."]";?>" >
				<option value="right" <?php if( 'right' == $value ) echo 'selected="selected"'; ?> ><?php esc_html_e( 'right' , 'ssc' ); ?></option>
				<option value="left" <?php if( 'left' == $value ) echo 'selected="selected"'; ?> ><?php esc_html_e( 'left' , 'ssc' ); ?></option>
			</select>
			<div class="sl-clearfix"></div>
		</div>

		<?php
	}
}