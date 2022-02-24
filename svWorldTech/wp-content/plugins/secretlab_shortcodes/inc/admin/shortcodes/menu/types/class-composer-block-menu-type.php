<?php

namespace Secretlab_Shortcodes\Inc\Admin\Shortcodes\Menu\Types;

use Secretlab_Shortcodes\Inc\Admin\Interfaces\Menu_Type_Interface;

class Composer_Block_Menu_Type implements Menu_Type_Interface {

	const TYPE = 'composer_block';

	private $menu_key;

	public function __construct( $menu_key ) {
		$this->menu_key = $menu_key;
	}

	public function render_type_radio( $id, $key, $type ) {
		?>
        <label>
            <input type="radio" value="<?php echo self::TYPE; ?>" class="sl_menu_type <?php echo $key; ?>"
                   name="<?php echo $key . "[" . $id . "]"; ?>" <?php if ( $type == self::TYPE ) {
				echo "checked";
			} ?> /> &nbsp;&nbsp; <?php _e( 'Use Composer Block', 'ssc' ); ?>
        </label>
		<?php
	}

	public function render_type_options( $id, $meta, $type ) {
		global $wp_widget_factory;
		if ( ! empty( $wp_widget_factory->widgets['custom_post_widget'] ) ) { ?>
			<?php

			$title = esc_html__( 'Composer Widgets to Display:', 'ssc' );
			$key   = "menu-item-seclab-" . self::TYPE;
			if ( isset( $meta[ $this->menu_key . '-' . self::TYPE ] ) && ! empty( $meta[ $this->menu_key . '-' . self::TYPE ][0] ) ) {
				$value = $meta[ $this->menu_key . '-' . self::TYPE ][0];
			} else {
				$value = '';
			}

			?>
            <!-- Menu Type : composer_block -->
            <div <?php if ( self::TYPE != $type ) {
				echo "style='display:none;'";
			} ?> class="admin-sl-box_option_inside sl_box_type admin-sl-box_option_inside_composer_block">
                    <label for="<?php echo $key . '-' . $id; ?>"> <?php echo $title ?>
                        <select class="widefat 1" id="<?php echo $key . '-' . $id; ?>"
                                name="<?php echo $key . "[" . $id . "]"; ?>">
							<?php
							$content_blocks = $wp_widget_factory->widgets['custom_post_widget']->get_composer_block_array( 'sidebar' );
							if ( ! empty( $content_blocks ) ) {
								foreach ( $content_blocks as $content_block_id => $content_block_title ) :
									echo '<option value="' . $content_block_id . '"';
									if ( $value == $content_block_id ) {
										echo ' selected';
										$widgetExtraTitle = $content_block_title;
									};
									echo '>' . $content_block_title . '</option>';
								endforeach;
							} else {
								echo '<option value="">' . esc_html__( 'No composer widgets available',
										'ssc' ) . '</option>';
							};
							?>
                        </select>
                    </label>
                    <div class="sl-clearfix"></div>
                <?php
                $title  = esc_html__( 'FullWidth' , 'ssc' );
                $key    = 'menu-item-seclab-' . self::TYPE . '_fullwidth';
                if ( isset( $meta[$this->menu_key.'-' . self::TYPE . '_fullwidth'] ) && !empty( $meta[$this->menu_key.'-' . self::TYPE . '_fullwidth'][0] ) ) {
	                $value = $meta[$this->menu_key.'-' . self::TYPE . '_fullwidth'][0];
                }
                else {
	                $value = '';
                }

                $FullWidth_hide = '';
                if( $value == '' )
                {
	                $value          = "off";
	                $FullWidth_hide = 'style="display:block;"';
                }
                else if ( $value == "off" )
                {
	                $value          = "off";
	                $FullWidth_hide = 'style="display:block;"';
                }
                else if( $value == "on" )
                {
	                $value          = "on";
	                $FullWidth_hide = 'style="display:none;"';
                }
                ?>

                <span class="fl" ><?php echo $title; ?></span>
                <div class="fr">
                    <select id="edit-<?php echo $key.'-'.$id; ?>" class="seclab-menu-fullwidth <?php echo $key; ?>" name="<?php echo $key . "[". $id ."]";?>" >
                        <option value="off" <?php if( 'off' == $value ) echo 'selected="selected"'; ?> ><?php esc_html_e( 'off' , 'ssc' ); ?></option>
                        <option value="on" <?php if( 'on' == $value ) echo 'selected="selected"'; ?> ><?php esc_html_e( 'on' , 'ssc' ); ?></option>
                    </select>
                </div>

                <div class="sl-clearfix"></div>

	            <?php
	            // Container Width
	            $title  = esc_html__( 'Container Width' , 'ssc' );
	            $key    = 'menu-item-seclab-' . self::TYPE . '_width';
	            if ( isset( $meta[$this->menu_key.'-' . self::TYPE . '_width'] ) && !empty( $meta[$this->menu_key.'-' . self::TYPE . '_width'][0] ) ) {
		            $value  = $meta[$this->menu_key.'-' . self::TYPE . '_width'][0];
	            }
	            else {
		            $value = '500px';
	            }
	            ?>

                <span class="admin_sl_fullwidth_div" <?php echo $FullWidth_hide; ?> ><?php echo $title; ?></span>
                <div class="admin_sl_fullwidth_div" <?php echo $FullWidth_hide; ?> >
                    <input type="text" value="<?php echo $value; ?>" id="edit-<?php echo $key.'-'.$id; ?>" class=" <?php echo $key; ?>" name="<?php echo $key . "[". $id ."]";?>" />
                    <div class="sl-clearfix"></div>
                </div>


	            <?php
	            // Align
	            $title  = esc_html__( 'Align' , 'ssc' );
	            $key    = 'menu-item-seclab-' . self::TYPE . '_align';
	            if ( isset( $meta[$this->menu_key.'-' . self::TYPE . '_align'] ) && !empty( $meta[$this->menu_key.'-' . self::TYPE . '_align'][0] ) ) {
		            $value  = $meta[$this->menu_key.'-' . self::TYPE . '_align'][0];
	            }
	            else {
		            $value = 'right';
	            }
	            ?>

                <span class="admin_sl_fullwidth_div" <?php echo $FullWidth_hide; ?> ><?php echo $title; ?></span>
                <div class="admin_sl_fullwidth_div" <?php echo $FullWidth_hide; ?> >
                    <select id="edit-<?php echo $key.'-'.$id; ?>" class=" <?php echo $key; ?>" name="<?php echo $key . "[". $id ."]";?>" >
                        <option value="right" <?php if( 'right' == $value ) echo 'selected="selected"'; ?> ><?php esc_html_e( 'right' , 'ssc' ); ?></option>
                        <option value="center" <?php if( 'center' == $value ) echo 'selected="selected"'; ?> ><?php esc_html_e( 'center' , 'ssc' ); ?></option>
                        <option value="left" <?php if( 'left' == $value ) echo 'selected="selected"'; ?> ><?php esc_html_e( 'left' , 'ssc' ); ?></option>
                    </select>
                    <div class="sl-clearfix"></div>
                </div>

	            <?php
	            // Background Color
	            $title  = esc_html__( 'Background Color' , 'ssc' );
	            $key    = 'menu-item-seclab-' . self::TYPE . '_bg_color';
	            if ( isset( $meta[$this->menu_key.'-' . self::TYPE . '_bg_color'] ) && !empty( $meta[$this->menu_key.'-' . self::TYPE . '_bg_color'][0] ) ) {
		            $value  = $meta[$this->menu_key.'-' . self::TYPE . '_bg_color'][0];
	            }
	            else {
		            $value = '';
	            }
	            echo $title; ?>

                <div>
                    <input id="edit-<?php echo $key.'-'.$id; ?>" class="slnm-color-rgba wp-color-picker" name="<?php echo $key . "[". $id ."]";?>" value="<?php echo esc_attr($value); ?>" data-alpha="true" />
                </div>

                <div class="sl-clearfix"></div>

	            <?php
	            // Background Image
	            $title  = esc_html__( 'Background Image' , 'ssc' );
	            $key    = 'menu-item-seclab-' . self::TYPE . '_bg_image';
	            if ( isset( $meta[$this->menu_key.'-' . self::TYPE . '_bg_image'] ) && !empty( $meta[$this->menu_key.'-' . self::TYPE . '_bg_image'][0] ) ) {
		            $value  = $meta[$this->menu_key.'-' . self::TYPE . '_bg_image'][0];
	            }
	            else {
		            $value = '';
	            }

	            echo $title; ?>
                <div>
                    <input type="text" value="<?php echo $value; ?>" id="edit-<?php echo $key.'-'.$id; ?>" class="admin_sl_upload_input <?php echo $key; ?>" name="<?php echo $key . "[". $id ."]";?>" />

                    <button class="admin_sl_upload button-primary fr">Upload</button>
                </div>

                <div class="sl-clearfix"></div>

	            <?php
	            // Background Repeat
	            $title  = esc_html__( 'Background Repeat' , 'ssc' );
	            $key    = 'menu-item-seclab-' . self::TYPE . '_bg_repeat';
	            if ( isset( $meta[$this->menu_key.'-' . self::TYPE . '_bg_repeat'] ) && !empty( $meta[$this->menu_key.'-' . self::TYPE . '_bg_repeat'][0] ) ) {
		            $value  = $meta[$this->menu_key.'-' . self::TYPE . '_bg_repeat'][0];
	            }
	            else {
		            $value = 'no-repeat';
	            }
	            ?>

                <span><?php echo $title; ?></span>
                <div>
                    <select id="edit-<?php echo $key.'-'.$id; ?>" class=" <?php echo $key; ?>" name="<?php echo $key . "[". $id ."]";?>" >
                        <option value="no-repeat" <?php if( 'no-repeat' == $value ) echo 'selected="selected"'; ?> ><?php esc_html_e( 'No Repeat' , 'ssc' ); ?></option>
                        <option value="repeat" <?php if( 'repeat' == $value ) echo 'selected="selected"'; ?> ><?php esc_html_e( 'Repeat All' , 'ssc' ); ?></option>
                        <option value="repeat-x" <?php if( 'repeat-x' == $value ) echo 'selected="selected"'; ?> ><?php esc_html_e( 'Repeat Horizontally' , 'ssc' ); ?></option>
                        <option value="repeat-y" <?php if( 'repeat-y' == $value ) echo 'selected="selected"'; ?> ><?php esc_html_e( 'Repeat Vertically' , 'ssc' ); ?></option>
                        <option value="inherit" <?php if( 'inherit' == $value ) echo 'selected="selected"'; ?> ><?php esc_html_e( 'Inherit' , 'ssc' ); ?></option>
                    </select>
                </div>

                <div class="sl-clearfix"></div>

	            <?php
	            // Background Size
	            $title  = esc_html__( 'Background Size' , 'ssc' );
	            $key    = 'menu-item-seclab-' . self::TYPE . '_bg_size';
	            if ( isset( $meta[$this->menu_key.'-' . self::TYPE . '_bg_size'] ) && !empty( $meta[$this->menu_key.'-' . self::TYPE . '_bg_size'][0] ) ) {
		            $value  = $meta[$this->menu_key.'-' . self::TYPE . '_bg_size'][0];
	            }
	            else {
		            $value = 'auto';
	            }
	            ?>

                <span><?php echo $title; ?></span>
                <div>
                    <select id="edit-<?php echo $key.'-'.$id; ?>" class=" <?php echo $key; ?>" name="<?php echo $key . "[". $id ."]";?>" >
                        <option value="auto" <?php if( 'inherit' == $value ) echo 'selected="selected"'; ?> ><?php esc_html_e( 'Auto' , 'ssc' ); ?></option>
                        <option value="cover" <?php if( 'cover' == $value ) echo 'selected="selected"'; ?> ><?php esc_html_e( 'Cover' , 'ssc' ); ?></option>
                        <option value="contain" <?php if( 'contain' == $value ) echo 'selected="selected"'; ?> ><?php esc_html_e( 'Contain' , 'ssc' ); ?></option>
                        <option value="contain" <?php if( '100% 100%' == $value ) echo 'selected="selected"'; ?> ><?php esc_html_e( '100% 100%' , 'ssc' ); ?></option>
                    </select>
                </div>

                <div class="sl-clearfix"></div>

	            <?php
	            // Background Position
	            $title  = esc_html__( 'Background Position' , 'ssc' );
	            $key    = 'menu-item-seclab-' . self::TYPE . '_bg_position';
	            if ( isset( $meta[$this->menu_key.'-' . self::TYPE . '_bg_position'] ) && !empty( $meta[$this->menu_key.'-' . self::TYPE . '_bg_position'][0] ) ) {
		            $value  = $meta[$this->menu_key.'-' . self::TYPE . '_bg_position'][0];
	            }
	            else {
		            $value = 'center center';
	            }
	            ?>

                <span><?php echo $title; ?></span>
                <div>
                    <select id="edit-<?php echo $key.'-'.$id; ?>" class=" <?php echo $key; ?>" name="<?php echo $key . "[". $id ."]";?>" >
                        <option vale="left top" <?php if( 'left top' == $value ) echo 'selected="selected"'; ?> ><?php esc_html_e( 'Left Top' , 'ssc' ); ?></option>
                        <option value="left center" <?php if( 'left center' == $value ) echo 'selected="selected"'; ?> ><?php esc_html_e( 'Left Center' , 'ssc' ); ?></option>
                        <option value="left bottom" <?php if( 'left bottom' == $value ) echo 'selected="selected"'; ?> ><?php esc_html_e( 'Left Bottom' , 'ssc' ); ?></option>
                        <option value="center top" <?php if( 'center top' == $value ) echo 'selected="selected"'; ?> ><?php esc_html_e( 'Center Top' , 'ssc' ); ?></option>
                        <option value="center center" <?php if( 'center center' == $value ) echo 'selected="selected"'; ?> ><?php esc_html_e( 'Center Center' , 'ssc' ); ?></option>
                        <option value="center bottom" <?php if( 'center bottom' == $value ) echo 'selected="selected"'; ?> ><?php esc_html_e( 'Center Bottom' , 'ssc' ); ?></option>
                        <option value="right top" <?php if( 'right top' == $value ) echo 'selected="selected"'; ?> ><?php esc_html_e( 'Right Top' , 'ssc' ); ?></option>
                        <option value="right center" <?php if( 'right center' == $value ) echo 'selected="selected"'; ?> ><?php esc_html_e( 'Right Center' , 'ssc' ); ?></option>
                        <option value="right bottom" <?php if( 'right bottom' == $value ) echo 'selected="selected"'; ?> ><?php esc_html_e( 'Right Bottom' , 'ssc' ); ?></option>
                    </select>
                </div>

                <div class="sl-clearfix"></div>

            </div>
		<?php }
	}
}