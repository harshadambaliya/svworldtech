<?php

namespace Secretlab_Shortcodes\Inc\Admin\Shortcodes\Menu;

/**
 * @package CTFramework
 * @since 1.0
 * @uses Walker_Nav_Menu
 */
class Backend_Walker extends \Walker_Nav_Menu {

	protected $sl_menu_type;
	protected $sl_menu_parent_and_child_id = 0;
	protected $menu_types;
	public $menu_key                       = '_menu-item-seclab';


	function __construct(){
		$this->sl_all_categories = self::all_cats_by_select( 'sl_all_cats_tax_types', 'sl_all_cats_tax_types' , '', 0, true );
        $this->menu_types = array(
			'dropdown' => new \Secretlab_Shortcodes\Inc\Admin\Shortcodes\Menu\Types\Drop_Down_Menu_Type($this->menu_key),
			'mega_menu' => new \Secretlab_Shortcodes\Inc\Admin\Shortcodes\Menu\Types\Mega_Menu_Menu_Type($this->menu_key),
			'search' => new \Secretlab_Shortcodes\Inc\Admin\Shortcodes\Menu\Types\Search_Menu_Type($this->menu_key),
		);
		if(post_type_exists('composer_widget')) {
			$this->menu_types['composer_block'] = new \Secretlab_Shortcodes\Inc\Admin\Shortcodes\Menu\Types\Composer_Block_Menu_Type($this->menu_key);
		}
		if(class_exists('WooCommerce')) {
			$this->menu_types['woocommerce_cart'] = new \Secretlab_Shortcodes\Inc\Admin\Shortcodes\Menu\Types\Woocommerce_Cart_Menu_Type($this->menu_key);
		}
	}

	static function all_cats_by_select( $id = '', $class = '', $name = '', $selected_cat = 0 , $return = false ) {
		// get All taxonomies
		$new_taxonomies = get_taxonomies( '' , 'names' );
		$new_post_types = get_post_types( '' , 'names' );
		$new_taxonomies = array_merge( $new_taxonomies,$new_post_types );

		// Taxonomies not needed
		$del_array = array(
			'post_tag',
			'nav_menu',
			'link_category',
			'post_format',
			'page',
			'attachment',
			'revision',
			'nav_menu_item'
		);

		foreach ( $del_array as $del )
		{
			foreach ( $new_taxonomies as $taxy )
			{
				if( $del == $taxy )
				{
					unset($new_taxonomies[$taxy]);
				}
			}
		}

		// Get Categories by taxonomies
		$html  = '<select id="'.$id.'" class="'.$class.'" name="'.$name.'" >';
		$html .= '<option  value="0" data-category_id="0" selected="selected" >Choose a Category</option>';
		foreach ( $new_taxonomies as $taxy )
		{
			$html .= '<optgroup label="'.$taxy.'">';

			$selected = $selected_cat == $taxy ? ' selected="selected" ' : '';
			$html .= '<option value="'.$taxy.'" data-taxonomy="'.$taxy.'" data-category_id="none" data-category_name="none" data-category_url="none" '.$selected.' >'.$taxy.'</option>';

			$args = array(
				'hide_empty'    => 0,
				'hierarchical'  => 1,
				'echo'          => 0,
				'taxonomy'      => $taxy,
				'title_li'      => $taxy,
				'style'         => 'none',
				'walker'        => new All_Cats_As_Select( $selected_cat )
			);

			$html .= wp_list_categories($args);
			$html .= '</optgroup>';

		}
		$html .= '</select>';

		if( $return )
			return $html;
		else
			echo $html;
	}


	/**
	 * @see Walker_Nav_Menu::start_lvl()
	 * @since 3.0.0
	 *
	 * @param string $output Passed by reference.
	 * @param int $depth Depth of page.
	 */
	function start_lvl( &$output, $depth = 0, $args = null ){}

	/**
	 * @see Walker_Nav_Menu::end_lvl()
	 * @since 3.0.0
	 *
	 * @param string $output Passed by reference.
	 * @param int $depth Depth of page.
	 */
	function end_lvl( &$output, $depth = 0, $args = null ) {}

	/**
	 * @see Walker::start_el()
	 * @since 3.0.0
	 *
	 * @param string $output Passed by reference. Used to append additional content.
	 * @param object $item Menu item data object.
	 * @param int $depth Depth of menu item. Used for padding.
	 * @param int $current_page Menu item ID.
	 * @param object $args
	 */
	function start_el( &$output, $item, $depth = 0, $args = null, $id = 0 ) {

		global $_wp_nav_menu_max_depth;
		$_wp_nav_menu_max_depth = $depth > $_wp_nav_menu_max_depth ? $depth : $_wp_nav_menu_max_depth;

		ob_start();
		$item_id    = esc_attr( $item->ID );

		$removed_args = array(
			'action',
			'customlink-tab',
			'edit-menu-item',
			'menu-item',
			'page-tab',
			'_wpnonce',
		);

		$original_title = '';
		if ( 'taxonomy' == $item->type ) {
			$original_title = get_term_field( 'name', $item->object_id, $item->object, 'raw' );
		} elseif ( 'post_type' == $item->type ) {
			$original_object = get_post( $item->object_id );
			$original_title = $original_object->post_title;
		}

		$classes = array(
			'menu-item menu-item-depth-' . $depth,
			'menu-item-' . esc_attr( $item->object ),
			'menu-item-edit-' . ( ( isset( $_GET['edit-menu-item'] ) && $item_id == $_GET['edit-menu-item'] ) ? 'active' : 'inactive' ),
		);

		$title      = $item->title;

		if ( isset( $item->post_status ) && 'draft' == $item->post_status ) {
			$classes[] = 'pending';
			/* translators: %s: title of menu item in draft status */
			$title = sprintf( __('%s (Pending)','ssc' ), $item->title );
		}

		$title = empty( $item->label ) ? $title : $item->label;

		if( $depth == 0 )
		{
			$this->sl_menu_parent_and_child_id = $this->sl_menu_parent_and_child_id + 1;
		}

		$depth_class = "sl_menu_item sl_menu_parent_and_child_id_" . $this->sl_menu_parent_and_child_id . " sl_menu_item_" . $this->sl_menu_type . " ";

//		$item_meta = get_post_meta( $item->ID );
		$item_meta = get_metadata( 'post', $item->ID );

		if ( isset($item_meta[$this->menu_key.'-menu_type'] ) && ! empty( $item_meta[$this->menu_key.'-menu_type'][0] ) ) {
			$menu_type  = $item_meta[$this->menu_key.'-menu_type'][0];
		}
		else {
			$menu_type = 'dropdown';
		}

		?>

	<li  id="menu-item-<?php echo $item_id; ?>" class="<?php echo $depth_class; echo implode(' ', $classes ); ?>">

		<dl class="menu-item-bar">
			<dt class="menu-item-handle" style="position:relative;" >
				<span class="item-title"><?php echo esc_html( $title ); ?></span>
				<span class="item-controls">
                            <span class="item-type item-type-default"><?php echo "( ".esc_html( $menu_type )." )"; ?></span>
                            <a class="item-edit" id="edit-<?php echo $item_id; ?>" title="<?php _e( 'Edit Menu Item', 'ssc' ); ?>" href="<?php
                            echo ( isset( $_GET['edit-menu-item'] ) && $item_id == $_GET['edit-menu-item'] ) ? admin_url( 'nav-menus.php' ) : add_query_arg( 'edit-menu-item', $item_id, remove_query_arg( $removed_args, admin_url( 'nav-menus.php#menu-item-settings-' . $item_id ) ) );
                            ?>"><?php _e( 'Edit Menu Item', 'ssc' ); ?></a>
                        </span>
			</dt>
		</dl>

		<div class="menu-item-settings" id="menu-item-settings-<?php echo $item_id; ?>">
			<?php if( 'custom' == $item->type ) : ?>
				<p class="field-url description description-wide">
					<label for="edit-menu-item-url-<?php echo $item_id; ?>">
						<?php _e( 'URL' , 'ssc' ); ?>
						<input type="text" id="edit-menu-item-url-<?php echo $item_id; ?>" class="widefat code edit-menu-item-url" name="menu-item-url[<?php echo $item_id; ?>]" value="<?php echo esc_attr( $item->url ); ?>" />
					</label>
				</p>
			<?php endif; ?>
			<p class="description description-thin description-label avia_label_desc_on_active">
				<label for="edit-menu-item-title-<?php echo $item_id; ?>">
					<span class='avia_default_label'><?php _e( 'Navigation Label', 'ssc' ); ?></span>
					<input type="text" id="edit-menu-item-title-<?php echo $item_id; ?>" class="widefat edit-menu-item-title" name="menu-item-title[<?php echo $item_id; ?>]" value="<?php echo esc_attr( $item->title ); ?>" />
				</label>
			</p>
			<p class="description description-thin description-title">
				<label for="edit-menu-item-attr-title-<?php echo $item_id; ?>">
					<?php _e( 'Title Attribute', 'ssc' ); ?>
					<input type="text" id="edit-menu-item-attr-title-<?php echo $item_id; ?>" class="widefat edit-menu-item-attr-title" name="menu-item-attr-title[<?php echo $item_id; ?>]" value="<?php echo esc_attr( $item->post_excerpt ); ?>" />
				</label>
			</p>
			<p class="field-link-target description description-thin">
				<label for="edit-menu-item-target-<?php echo $item_id; ?>">
					<?php _e( 'link Target', 'ssc' ); ?>
					<select id="edit-menu-item-target-<?php echo $item_id; ?>" class="widefat edit-menu-item-target" name="menu-item-target[<?php echo $item_id; ?>]">
						<option value="" <?php selected( $item->target, ''); ?>><?php _e( 'Same window or tab', 'ssc' ); ?></option>
						<option value="_blank" <?php selected( $item->target, '_blank'); ?>><?php _e( 'New window or tab', 'ssc' ); ?></option>
					</select>
				</label>
			</p>
			<p class="field-css-classes description description-thin">
				<label for="edit-menu-item-classes-<?php echo $item_id; ?>">
					<?php _e( 'CSS Classes (optional)', 'ssc' ); ?>
					<input type="text" id="edit-menu-item-classes-<?php echo $item_id; ?>" class="widefat code edit-menu-item-classes" name="menu-item-classes[<?php echo $item_id; ?>]" value="<?php echo esc_attr( implode(' ', $item->classes ) ); ?>" />
				</label>
			</p>
			<p class="field-xfn description description-thin">
				<label for="edit-menu-item-xfn-<?php echo $item_id; ?>">
					<?php _e( 'link Relationship (XFN)' , 'ssc' ); ?>
					<input type="text" id="edit-menu-item-xfn-<?php echo $item_id; ?>" class="widefat code edit-menu-item-xfn" name="menu-item-xfn[<?php echo $item_id; ?>]" value="<?php echo esc_attr( $item->xfn ); ?>" />
				</label>
			</p>
			<p class="field-description description description-wide">
				<label for="edit-menu-item-description-<?php echo $item_id; ?>">
					<?php _e( 'Description' , 'ssc' ); ?>
					<textarea id="edit-menu-item-description-<?php echo $item_id; ?>" class="widefat edit-menu-item-description" rows="3" cols="20" name="menu-item-description[<?php echo $item_id; ?>]"><?php echo esc_html( $item->post_content ); ?></textarea>
				</label>
			</p>

			<!-- *************** SecretLab menu Options *************** -->

			<div class="sl-clearfix"></div>

			<!-- *************** new item *************** -->
			<div class="admin-sl-box admin-sl-box_menu_type" >

				<?php
				// Menu Type
				$title  = esc_html__( 'Choose the menu type' , 'ssc' );
				$key    = "menu-item-seclab-menu_type";
				?>

				<div class="admin-sl-box_header">
					<span><?php echo $title; ?> :</span>
					<a class="dashicons dashicons-arrow-down-alt2" ></a>
				</div>


				<div class="admin-sl-box_container">

					<!-- Select Menu Type -->
					<div class="admin_sl_box_menu_item_types">
                        <?php
                            foreach ( $this->menu_types as $type){
                                $type->render_type_radio( $item_id, $key, $menu_type );
                            }
                        ?>
					</div>
					<div class="sl-clearfix"></div>
					<?php
                        foreach ( $this->menu_types as $type){
                            $type->render_type_options( $item_id, $item_meta, $menu_type );
                        }
					?>
				</div>
			</div>
			<!-- *************** end item *************** -->
			<div class="admin-sl-box admin-sl-box-menu-item-settings">

				<?php
				// Menu Type
				$title  = esc_html__( 'Link & Icon Settings' , 'ssc' );
				?>

				<div class="admin-sl-box_header">
					<span><?php echo $title; ?> :</span>
					<a class="dashicons dashicons-arrow-down-alt2" ></a>
				</div>

				<div class="admin-sl-box_container">
					<div id="menu-item-sl-link-logged-in" >
						<?php
						// User Logged In / Out
						$title  = esc_html__( 'Show link when user' , 'ssc' );
						$key    = "menu-item-seclab-link_user_logged";
						if ( isset( $item_meta[$this->menu_key.'-link_user_logged'] ) && !empty( $item_meta[$this->menu_key.'-link_user_logged'][0] ) ) {
							$value  = $item_meta[$this->menu_key.'-link_user_logged'][0];
						}
						else {
							$value = 'both';
						}
						?>

						<?php echo $title; ?>
						<select id="edit-<?php echo $key.'-'.$item_id; ?>" class=" <?php echo $key; ?>" name="<?php echo $key . "[". $item_id ."]";?>" >
							<option value="both" <?php if( 'both' == $value ) echo 'selected="selected"'; ?> ><?php _e( 'Both Logged in/out', 'ssc' ); ?></option>
							<option value="logged_in" <?php if( 'logged_in' == $value ) echo 'selected="selected"'; ?> ><?php _e( 'Logged in', 'ssc' ); ?></option>
							<option value="logged_out" <?php if( 'logged_out' == $value ) echo 'selected="selected"'; ?> ><?php _e( 'Logged out', 'ssc' ); ?></option>
						</select>
					</div>
					<div class="sl-clearfix"></div>

					<div id="menu-item-sl-link-icon-only">
						<?php
						// Use icon only
						$title  = esc_html__( 'Show link as' , 'ssc' );
						$key    = "menu-item-seclab-link_icon_only";
						if ( isset( $item_meta[$this->menu_key.'-link_icon_only'] ) && !empty( $item_meta[$this->menu_key.'-link_icon_only'][0] ) ) {
							$link_type  = $item_meta[$this->menu_key.'-link_icon_only'][0];
						}
						else {
							$link_type = 'text_and_icon';
						}
						?>

						<?php echo $title;?>

						<select id="edit-<?php echo $key.'-'.$item_id; ?>" class=" <?php echo $key; ?>" name="<?php echo $key . "[". $item_id ."]";?>" >
							<option value="text_and_icon" <?php if( 'text_and_icon' == $link_type ) echo 'selected="selected"'; ?> ><?php _e( 'Text with Icon', 'ssc' ); ?></option>
							<?php if( class_exists( 'SL_Icon_Manager' ) ){ ?>
								<option value="only_icon" <?php if( 'only_icon' == $link_type ) echo 'selected="selected"'; ?> ><?php _e( 'Only Icon', 'ssc' ); ?></option>
							<?php } ?>
							<option value="none" <?php if( 'none' == $link_type ) echo 'selected="selected"'; ?> ><?php _e( 'None', 'ssc' ); ?></option>
						</select>

					</div>
					<div class="sl-clearfix"></div>
					<?php if( class_exists( 'SL_Icon_Manager' ) ){ ?>
						<div id="menu-item-sl-position-container" <?php if( 'none' == $link_type ) echo 'style="display:none;"'; ?>>
							<?php
							// Position
							$title  = esc_html__( 'Icon Position' , 'ssc' );
							$key    = "menu-item-seclab-link_icon_position";
							if ( isset( $item_meta[$this->menu_key.'-link_icon_position'] ) && !empty( $item_meta[$this->menu_key.'-link_icon_position'][0] ) ) {
								$icon_position  = $item_meta[$this->menu_key.'-link_icon_position'][0];
							}
							else {
								$icon_position = 'left';
							}
							?>

							<?php echo $title; ?>
							<select id="edit-<?php echo $key.'-'.$item_id; ?>" class=" <?php echo $key; ?>" name="<?php echo $key . "[". $item_id ."]";?>" >
								<option value="left" <?php if( 'left' == $icon_position ) echo 'selected="selected"'; ?> ><?php _e( 'Before Text', 'ssc' ); ?></option>
								<option value="right" <?php if( 'right' == $icon_position ) echo 'selected="selected"'; ?> ><?php _e( 'After Text', 'ssc' ); ?></option>
							</select>
						</div>
						<div class="sl-clearfix"></div>
					<?php } ?>

					<?php
					// Upload or Icon Font
					$title  = esc_html__( 'Choose Icon' , 'ssc' );
					$key    = "menu-item-seclab-link_icon_type";
					if ( isset( $item_meta[$this->menu_key.'-link_icon_type'] ) && !empty( $item_meta[$this->menu_key.'-link_icon_type'][0] ) ) {
						$icon_type  = $item_meta[$this->menu_key.'-link_icon_type'][0];
					} else {
						$icon_type = 'icon_font';
					}

					?>
					<div id="<?php echo $key; ?>" <?php if( 'none' == $link_type ) echo 'style="display:none;"'; ?>>
						<label for="edit-<?php echo $key.'-'.$item_id; ?>" >

							<?php echo $title; ?>

							<select id="edit-<?php echo $key.'-'.$item_id; ?>" class=" <?php echo $key; ?>" name="<?php echo $key . "[". $item_id ."]";?>"  >
								<?php if( class_exists( 'SL_Icon_Manager' ) ){ ?>
									<option value="icon_font" <?php if( 'icon_font' == $icon_type ) echo 'selected="selected"' ?> ><?php _e( 'Icon font', 'ssc' ); ?></option>
								<?php } ?>
								<option value="upload" <?php if( 'upload' == $icon_type ) echo 'selected="selected"' ?> ><?php _e( 'Upload new icon', 'ssc' ); ?></option>
							</select>

							<div class="sl-clearfix"></div>

						</label>
					</div>
					<?php if ( ! class_exists( 'SL_Icon_Manager' ) ) {
						$icon_type = 'upload';
					} ?>
					<div <?php if( $icon_type != 'upload' ) echo 'style="display:none;"' ; ?> class="admin-sl-box_option_inside admin-sl-box_option_inside_icon_upload">

						<?php
						// Use icon only
						$title  = esc_html__( 'Icon' , 'ssc' );
						$key    = "menu-item-seclab-link_icon_image";
						if ( isset( $item_meta[$this->menu_key.'-link_icon_image'] ) && !empty( $item_meta[$this->menu_key.'-link_icon_image'][0] ) ) {
							$value  = $item_meta[$this->menu_key.'-link_icon_image'][0];
						}
						else {
							$value = '';
						}
						$uploaded_icon = $value;
						?>
						<?php echo $title; ?>
						<div>
							<input type="text" value="<?php echo $value; ?>" id="edit-<?php echo $key.'-'.$item_id; ?>" class="admin_sl_upload_input <?php echo $key; ?>" name="<?php echo $key . "[". $item_id ."]";?>" />

							<button class="admin_sl_upload button-primary fr">Upload</button>
						</div>

						<div class="sl-clearfix"></div>

					</div>


					<?php if( class_exists( 'SL_Icon_Manager' ) ){ ?>
						<div <?php if( $icon_type != 'icon_font' || 'none' == $link_type ) echo 'style="display:none;"' ; ?> class="admin-sl-box_option_inside admin-sl-box_option_inside_icon_font">

							<?php
							// Use icon only
							$title  = esc_html__( 'Icon' , 'ssc' );
							$key    = "menu-item-seclab-link_icon";
							if ( isset( $item_meta[$this->menu_key.'-link_icon'] ) && !empty( $item_meta[$this->menu_key.'-link_icon'][0] ) ) {
								$value  = $item_meta[$this->menu_key.'-link_icon'][0];
							}
							else {
								$value = '';
							}
							$value_icon = $value;
							?>
							<?php echo $title; ?>

							<button id="icon-select-<?php echo $item->ID; ?>" class="admin_sl_select_icon_button button-primary fr"><?php _e( 'Select' , 'ssc' ); ?></button>
							<button id="icon-delete-<?php echo $item->ID; ?>" class="admin_sl_delete_icon_button button-primary fr"><?php _e( 'Delete' , 'ssc' ); ?></button>
							<input type="hidden" value="<?php echo $value_icon; ?>" id="edit-<?php echo $key . '-' . $item_id; ?>" class="fr admin_sl_icon_font_hidden-<?php echo $item->ID . ' ' . $key; ?>" name="<?php echo $key . "[". $item_id ."]";?>" />
							<div class="sl-clearfix"></div>

							<div class="sl_admin_icon_fonts_container">
								<?php
								$upload_dir = wp_get_upload_dir();
								$dir_name = 'sl_icons';
								$icon_folders = scandir( $upload_dir['basedir'] . '/' . $dir_name );
								if ( $icon_folders && count ( $icon_folders ) > 0 ) {
									foreach ( $icon_folders as $icon_folder ) {
										if ( is_file ( $upload_dir['basedir'] . '/' . $dir_name . '/' . $icon_folder . '/' . $icon_folder . '.css' ) && $icon_folder != '.' && $icon_folder != '..' ) {
											$icon_styles[$icon_folder]['dir'] = $upload_dir['basedir'] . '/' . $dir_name . '/' . $icon_folder . '/' . $icon_folder . '.css';
											$icon_styles[$icon_folder]['url'] = $upload_dir['baseurl'] . '/' . $dir_name . '/' . $icon_folder . '/' . $icon_folder . '.css';
										}
									}
								}


								if ( count ( $icon_styles ) > 0 ) {
									$out = '<div class="sl_icons_admin_box" >';
									$out .= '<a id="close-sl-icons-box">X</a>';
									$out .= '<div id="sl_admin_icons_search' . '-' . $item_id . '" class="col-xs-12 sl_admin_icons_search">' . esc_html__( 'Search by icon name', 'ssc' ) .': <input type="text" placeholder="Search"></div>';
									$out .= '<button class="sl_admin_icon_fonts_container_button admin_sl_add_icon_button meta_btn">Add</button>';
									$out .= '</div>';
								}
								else {
									$out = '
                                <div class="no_fonts">
                                    <p>' . esc_html__( 'No font icons uploaded. Upload some font icons to display here.', 'ssc' ) . '</p>
                                </div>';
								}
								echo $out;
								?>
							</div>

							<span class="admin_sl_icon_font_icon_box_preview admin_sl_icon_font_icon_box_preview-<?php echo $item->ID; ?>">
                                    <span style="font-size:20px; ?>;" aria-hidden="true" class="<?php echo $value_icon; ?>"></span>
                                </span>
						</div>
					<?php } else { ?>
						<div><?php esc_html_e(  'For using "Icon Fonts" install "Marketing and SEO Booster" SecretLab plugin','ssc' ) ?></div>
					<?php } ?>

				</div>
			</div>
			<div class="admin-sl-box admin-sl-box-menu-item-design">

				<?php
				// Item settings
				$title  = esc_html__( 'Design' , 'ssc' );
				?>

				<div class="admin-sl-box_header">
					<span><?php echo $title; ?> :</span>
					<a class="dashicons dashicons-arrow-down-alt2" ></a>
				</div>

				<div class="admin-sl-box_container slmenu-tabs">
					<ul>
						<li><?php esc_attr_e( 'Desktop' , 'ssc' ); ?></li>
						<li><?php esc_attr_e( 'Responsive' , 'ssc' ); ?></li>
					</ul>
					<div class="slmenu-tab-box">
						<div class="slmenu-item-desc">
							<?php
							// Text Color
							$title  = esc_html__( 'Text Color' , 'ssc' );
							$key    = "menu-item-seclab-text_color";
							if ( isset( $item_meta[$this->menu_key.'-text_color'] ) && !empty( $item_meta[$this->menu_key.'-text_color'][0] ) ) {
								$value  = $item_meta[$this->menu_key.'-text_color'][0];
							}
							else {
								$value = '';
							}
							echo '<span>' . $title . '</span>'; ?>

							<input id="edit-<?php echo $key.'-'.$item_id; ?>" class="slnm-color-rgba wp-color-picker" name="<?php echo $key . "[". $item_id ."]";?>" value="<?php echo esc_attr($value); ?>" data-alpha="true" />

							<div class="sl-clearfix"></div>

							<?php
							// Text Color Hover
							$title  = esc_html__( 'Text Color on Hover' , 'ssc' );
							$key    = "menu-item-seclab-text_hover_color";
							if ( isset( $item_meta[$this->menu_key.'-text_hover_color'] ) && !empty( $item_meta[$this->menu_key.'-text_hover_color'][0] ) ) {
								$value  = $item_meta[$this->menu_key.'-text_hover_color'][0];
							}
							else {
								$value = '';
							}
							echo '<span>' . $title . '</span>'; ?>

							<input id="edit-<?php echo $key.'-'.$item_id; ?>" class="slnm-color-rgba wp-color-picker" name="<?php echo $key . "[". $item_id ."]";?>" value="<?php echo esc_attr($value); ?>" data-alpha="true" />

							<div class="sl-clearfix"></div>

							<?php
							// Container Width
							$title  = esc_html__( 'Font Weight' , 'ssc' );
							$key    = "menu-item-seclab-text_weight";
							if ( isset( $item_meta[$this->menu_key.'-text_weight'] ) && !empty( $item_meta[$this->menu_key.'-text_weight'][0] ) ) {
								$value  = $item_meta[$this->menu_key.'-text_weight'][0];
							}
							else {
								$value = '';
							}
							?>

							<span ><?php echo $title; ?></span>
							<select id="edit-<?php echo $key.'-'.$item_id; ?>" class=" <?php echo $key; ?>" name="<?php echo $key . "[". $item_id ."]";?>"  >
								<option value="" <?php if( '' == $value ) echo 'selected="selected"' ?> ><?php _e( 'Non Set', 'ssc' ); ?></option>
								<option value="100" <?php if( '100' == $value ) echo 'selected="selected"' ?> >100</option>
								<option value="200" <?php if( '200' == $value ) echo 'selected="selected"' ?> >200</option>
								<option value="300" <?php if( '300' == $value ) echo 'selected="selected"' ?> >300</option>
								<option value="400" <?php if( '400' == $value ) echo 'selected="selected"' ?> >400</option>
								<option value="500" <?php if( '500' == $value ) echo 'selected="selected"' ?> >500</option>
								<option value="600" <?php if( '600' == $value ) echo 'selected="selected"' ?> >600</option>
								<option value="700" <?php if( '700' == $value ) echo 'selected="selected"' ?> >700</option>
								<option value="800" <?php if( '800' == $value ) echo 'selected="selected"' ?> >800</option>
								<option value="900" <?php if( '900' == $value ) echo 'selected="selected"' ?> >900</option>
							</select>
							<div class="sl-clearfix"></div>

							<?php
							// Background Color
							$title  = esc_html__( 'Background Color' , 'ssc' );
							$key    = "menu-item-seclab-item_bg_color";
							if ( isset( $item_meta[$this->menu_key.'-item_bg_color'] ) && !empty( $item_meta[$this->menu_key.'-item_bg_color'][0] ) ) {
								$value  = $item_meta[$this->menu_key.'-item_bg_color'][0];
							}
							else {
								$value = '';
							}
							echo '<span>' . $title . '</span>'; ?>

							<input id="edit-<?php echo $key.'-'.$item_id; ?>" class="slnm-color-rgba wp-color-picker" name="<?php echo $key . "[". $item_id ."]";?>" value="<?php echo esc_attr($value); ?>" data-alpha="true" />

						</div>
						<div class="slmenu-item-resp">
							<?php
							// Text Color
							$title  = esc_html__( 'Text Color' , 'ssc' );
							$key    = "menu-item-seclab-resp_text_color";
							if ( isset( $item_meta[$this->menu_key.'-resp_text_color'] ) && !empty( $item_meta[$this->menu_key.'-resp_text_color'][0] ) ) {
								$value  = $item_meta[$this->menu_key.'-resp_text_color'][0];
							}
							else {
								$value = '';
							}
							echo '<span>' . $title . '</span>'; ?>

							<input id="edit-<?php echo $key.'-'.$item_id; ?>" class="slnm-color-rgba wp-color-picker" name="<?php echo $key . "[". $item_id ."]";?>" value="<?php echo esc_attr($value); ?>" data-alpha="true" />

							<div class="sl-clearfix"></div>

							<?php
							// Text Color Hover
							$title  = esc_html__( 'Text Color on Hover' , 'ssc' );
							$key    = "menu-item-seclab-resp_text_hover_color";
							if ( isset( $item_meta[$this->menu_key.'-resp_text_hover_color'] ) && !empty( $item_meta[$this->menu_key.'-resp_text_hover_color'][0] ) ) {
								$value  = $item_meta[$this->menu_key.'-resp_text_hover_color'][0];
							}
							else {
								$value = '';
							}
							echo '<span>' . $title . '</span>'; ?>

							<input id="edit-<?php echo $key.'-'.$item_id; ?>" class="slnm-color-rgba wp-color-picker" name="<?php echo $key . "[". $item_id ."]";?>" value="<?php echo esc_attr($value); ?>" data-alpha="true" />

							<div class="sl-clearfix"></div>

							<?php
							// Container Width
							$title  = esc_html__( 'Font Weight' , 'ssc' );
							$key    = "menu-item-seclab-resp_text_weight";
							if ( isset( $item_meta[$this->menu_key.'-resp_text_weight'] ) && !empty( $item_meta[$this->menu_key.'-resp_text_weight'][0] ) ) {
								$value  = $item_meta[$this->menu_key.'-resp_text_weight'][0];
							}
							else {
								$value = '';
							}
							?>

							<span ><?php echo $title; ?></span>
							<select id="edit-<?php echo $key.'-'.$item_id; ?>" class=" <?php echo $key; ?>" name="<?php echo $key . "[". $item_id ."]";?>"  >
								<option value="" <?php if( '' == $value ) echo 'selected="selected"' ?> ><?php _e( 'Non Set', 'ssc' ); ?></option>
								<option value="100" <?php if( '100' == $value ) echo 'selected="selected"' ?> >100</option>
								<option value="200" <?php if( '200' == $value ) echo 'selected="selected"' ?> >200</option>
								<option value="300" <?php if( '300' == $value ) echo 'selected="selected"' ?> >300</option>
								<option value="400" <?php if( '400' == $value ) echo 'selected="selected"' ?> >400</option>
								<option value="500" <?php if( '500' == $value ) echo 'selected="selected"' ?> >500</option>
								<option value="600" <?php if( '600' == $value ) echo 'selected="selected"' ?> >600</option>
								<option value="700" <?php if( '700' == $value ) echo 'selected="selected"' ?> >700</option>
								<option value="800" <?php if( '800' == $value ) echo 'selected="selected"' ?> >800</option>
								<option value="900" <?php if( '900' == $value ) echo 'selected="selected"' ?> >900</option>
							</select>
							<div class="sl-clearfix"></div>

							<?php
							// Background Color
							$title  = esc_html__( 'Background Color' , 'ssc' );
							$key    = "menu-item-seclab-resp_item_bg_color";
							if ( isset( $item_meta[$this->menu_key.'-resp_item_bg_color'] ) && !empty( $item_meta[$this->menu_key.'-resp_item_bg_color'][0] ) ) {
								$value  = $item_meta[$this->menu_key.'-resp_item_bg_color'][0];
							}
							else {
								$value = '';
							}
							echo '<span>' . $title . '</span>'; ?>

							<input id="edit-<?php echo $key.'-'.$item_id; ?>" class="slnm-color-rgba wp-color-picker" name="<?php echo $key . "[". $item_id ."]";?>" value="<?php echo esc_attr($value); ?>" data-alpha="true" />

						</div>
					</div>
				</div>
			</div>
			<!-- *************** end SecretLab menu Options *************** -->

			<div class="menu-item-actions description-wide submitbox">
				<?php if( 'custom' != $item->type ) : ?>
					<p class="link-to-original">
						<?php printf( __( 'Original: %s','ssc' ), '<a href="' . esc_attr( $item->url ) . '">' . esc_html( $original_title ) . '</a>' ); ?>
					</p>
				<?php endif; ?>
				<a class="item-delete submitdelete deletion" id="delete-<?php echo $item_id; ?>" href="<?php
				echo wp_nonce_url(
					add_query_arg(
						array(
							'action' => 'delete-menu-item',
							'menu-item' => $item_id,
						),
						remove_query_arg($removed_args, admin_url( 'nav-menus.php' ) )
					),
					'delete-menu_item_' . $item_id
				); ?>"><?php _e( 'Remove', 'ssc' ); ?></a> <span class="meta-sep"> | </span> <a class="item-cancel submitcancel" id="cancel-<?php echo $item_id; ?>" href="<?php    echo add_query_arg( array('edit-menu-item' => $item_id, 'cancel' => time()), remove_query_arg( $removed_args, admin_url( 'nav-menus.php' ) ) );
				?>#menu-item-settings-<?php echo $item_id; ?>">Cancel</a>
			</div>

			<input class="menu-item-data-db-id" type="hidden" name="menu-item-db-id[<?php echo $item_id; ?>]" value="<?php echo $item_id; ?>" />
			<input class="menu-item-data-object-id" type="hidden" name="menu-item-object-id[<?php echo $item_id; ?>]" value="<?php echo esc_attr( $item->object_id ); ?>" />
			<input class="menu-item-data-object" type="hidden" name="menu-item-object[<?php echo $item_id; ?>]" value="<?php echo esc_attr( $item->object ); ?>" />
			<input class="menu-item-data-parent-id" type="hidden" name="menu-item-parent-id[<?php echo $item_id; ?>]" value="<?php echo esc_attr( $item->menu_item_parent ); ?>" />
			<input class="menu-item-data-position" type="hidden" name="menu-item-position[<?php echo $item_id; ?>]" value="<?php echo esc_attr( $item->menu_order ); ?>" />
			<input class="menu-item-data-type" type="hidden" name="menu-item-type[<?php echo $item_id; ?>]" value="<?php echo esc_attr( $item->type ); ?>" />
		</div><!-- .menu-item-settings-->
		<ul class="menu-item-transport"></ul>
		<?php
		$output .= ob_get_clean();
	}

	public function sl_get_font_info( $css_file ) {
		global $wp_filesystem;

		$css = $wp_filesystem->get_contents( $css_file );
		$preg_result = array();
		if ( $css ) {
			preg_match( '/\[class.?=.?\"([^\"]+)\"\]/', $css, $prefix );
			if ( $prefix && $prefix[1] ) {
				$prefix = preg_replace('/\s/', '', $prefix[1]);
				$result = preg_match_all( '/' . $prefix . '([^:]+):before\s?\{[^["\']+["\']([^["\']+)/', $css, $icons );
				if ( $result && strpos( $icons[1][0], ']' ) ) { unset( $icons[0][0] ); unset( $icons[1][0] ); unset( $icons[2][0] ); }
			}
			else {
				$prefix = 'fa fa-';
				$result = preg_match_all( '/fa-([^:]+):before\s\{[^\"]+\"([^\"]+)/', $css, $icons );
			}
		}
		if ( count ( $result ) > 0 ) return array( 'prefix' => $prefix, 'icons' => $icons ); else return false;

	}


}