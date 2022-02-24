<?php

/*
Plugin Name: SecretLab Shortcodes
Plugin URI: http://secretlab.pw/secretLab-shortcodes
Description: SecretLab Shortcodes For King Composer
Author: SecretLab
Author URI: http://secretlab.pw/
Version: 4.2.8
*/
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! function_exists( 'is_plugin_active' ) ) {
	include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
}

function ssc_admin_style( $hook ) {
	global $post;

	wp_enqueue_style( 'ssc_admin_style', plugin_dir_url( __FILE__ ) . 'css/admin_style.css' );
}

add_action( 'admin_enqueue_scripts', 'ssc_admin_style' );

function ssc_admin_scripts( $hook ) {
	wp_enqueue_script( 'ssc-back', SSC_URL . 'js/back.js', array( 'jquery', 'kc-builder-backend-js', 'kc-params' ), null, true );
}

add_action( 'wp_enqueue_scripts', 'ssc_front_styles', 11000 );
add_action( 'wp_enqueue_scripts', 'ssc_front_scripts' );

function ssc_front_styles() {
	wp_enqueue_style( 'ssc-styles', plugin_dir_url( __FILE__ ) . 'css/style.css' );
}

function ssc_front_scripts() {
	wp_enqueue_script( "jquery" );
	wp_enqueue_script( 'ssc-front', SSC_SHORTCODES_URL . 'js/front.js', array( 'jquery' ), false, true );
}

if ( is_plugin_active( 'kingcomposer/kingcomposer.php' ) ) {

	define( 'SSC_PATH', plugin_dir_path( __FILE__ ) );

	define( 'SSC_SHORTCODES_PATH', SSC_PATH . 'shortcodes/' );

	define( 'SSC_URL', plugin_dir_url( __FILE__ ) );

	define( 'SSC_SHORTCODES_URL', SSC_URL . 'shortcodes/' );

	require_once( ABSPATH . 'wp-admin/includes/plugin.php' );


    // Include the autoloader so we can dynamically include the rest of the classes.
	require_once( SSC_PATH . 'inc/autoloader.php' );

	if ( is_plugin_active( 'wordpress-seo/wp-seo.php' ) ) {
		require( 'shortcodes/breadcrumb2.php' );
	}


	require( 'shortcodes/accordion.php' );
	require( 'shortcodes/accordion_tab.php' );
	require( 'shortcodes/breadcrumb.php' );
	require( 'shortcodes/benefits.php' );
	require( 'shortcodes/bgr-label.php' );
	require( 'shortcodes/button.php' );


	require( 'shortcodes/counter.php' );

	if ( is_plugin_active( 'contact-form-7/wp-contact-form-7.php' ) ) {
		require( 'shortcodes/contact.php' );
	}
	if ( is_plugin_active( 'caldera-forms/caldera-core.php' ) ) {
		require( 'shortcodes/caldera-forms.php' );
	}

	require( 'shortcodes/divider.php' );
	require( 'shortcodes/icon-box.php' );
	require( 'shortcodes/image-carousel.php' );
	require( 'shortcodes/image-effect.php' );
	require( 'shortcodes/image-flow.php' );
	require( 'shortcodes/mailchimp.php' );
	require( 'shortcodes/menu.php' );
	require( 'shortcodes/multititle.php' );
	require( 'shortcodes/post-grid.php' );
	if ( is_plugin_active( 'woocommerce/woocommerce.php' ) ) {
		require( 'shortcodes/product-grid.php' );
	}
	require( 'shortcodes/powerful-image.php' );
	require( 'shortcodes/price_table.php' );
	if ( is_plugin_active( 'LayerSlider/layerslider.php' ) ) {
		require( 'shortcodes/layer-slider.php' );
	}
	if ( is_plugin_active( 'revslider/revslider.php' ) ) {
		require( 'shortcodes/rev-slider.php' );
	}
	if ( is_plugin_active( 'smart-slider-3/smart-slider-3.php' ) ) {
		require( 'shortcodes/smart-slider.php' );
	}

	require( 'shortcodes/sidebar.php' );
	//require( 'shortcodes/svg-label.php' );
	require( 'shortcodes/tabs.php' );
	require( 'shortcodes/tab.php' );
	require( 'shortcodes/tables.php' );
	require( 'shortcodes/testimonial.php' );
	require( 'shortcodes/text.php' );
	require( 'shortcodes/team.php' );

	if ( is_plugin_active( 'wpml/sitepress.php' ) ) {
		require( 'shortcodes/wpml_selector.php' );
	}

	require( 'shortcodes/search.php' );

	require( 'shortcodes/flex_row_inner.php' );
	require( 'shortcodes/row.php' );
	require( 'shortcodes/column.php' );
	require( 'shortcodes/image_gallery.php' );
	require( 'shortcodes/carousel-controls.php' );
	require( 'shortcodes/kc_multi_icons.php' );
	require( 'shortcodes/hotspot.php' );
	require( 'shortcodes/google_maps.php' );
	require( 'shortcodes/blog-feed.php' );

	if( class_exists('BABE_shortcodes') ){
		add_action( 'init', function(){
			if ( ! class_exists( 'Atiframebuilder_Room' ) ) {
				return;
			}
			require( 'shortcodes/babe-search.php' );
			require( 'shortcodes/rooms-grid.php' );
			require( 'shortcodes/room.php' );

        } );

		add_action( 'wp_enqueue_scripts', function(){

			wp_deregister_script( 'babe-js' );


			wp_enqueue_script( 'babe-js', get_template_directory_uri() . '/js/babe-scripts.js', array('babe-google-api'), '1.0', true );

		} );

		remove_filter( 'the_content', array( 'BABE_html', 'post_content' ), 10 );

		remove_filter( 'the_content', array( 'BABE_html', 'page_search_result'), 10 );

		global $wp_query;
		if ($wp_query && in_the_loop() && is_main_query()){
            global $post;
			$add_search_result_to_page = is_page() && $post->ID == BABE_Settings::$settings['search_result_page'];
			$add_search_result_to_page = apply_filters('babe_add_search_result_to_page', $add_search_result_to_page, $post);

			if ($add_search_result_to_page){
				remove_filter( 'the_content', array( __CLASS__, 'page_search_result'), 10, 1 );
			}
		}
	}

	add_action( 'admin_enqueue_scripts', 'ssc_admin_scripts' );

	remove_filter( 'single_template', 'kc_content_template' );

	add_filter( 'single_template', 'ssc_kc_content_template' );

}

// Widgets
require( 'widgets/post_widget.php' );

function ssc_kc_content_template( $single ) {

	global $wp_query, $post;
	if ( $post->post_type == "kc-section" ) {
		if ( file_exists( get_template_directory() . '/single-kc-section.php' ) ) {
			return get_template_directory() . '/single-kc-section.php';
		}
	}

	return $single;

}

function ssc_king_composer_require_once() {
	if ( ! function_exists( 'is_plugin_active' ) ) {
		include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
	}
	if ( ! is_plugin_active( 'kingcomposer/kingcomposer.php' ) ) {
		if ( is_admin() ) {
			add_action( 'admin_notices', array( &$this, 'ssc_missing_notices' ) );
		}

		return;

	}
}

function ssc_missing_notices() {

	if ( is_dir( ABSPATH . KCPS . 'wp-content' . KCPS . 'plugins' . KCPS . 'kingcomposer' ) ) {
		$plugin_path = 'kingcomposer/kingcomposer.php';
		$active_url  = wp_nonce_url( self_admin_url( 'plugins.php?action=activate&plugin=' . $plugin_path ),
			'activate-plugin_' . $plugin_path );

		$call_action = '<a href="' . $active_url . '">' . __( 'Active KingComposer now', 'kc_pro' ) . '</a>';

	} else {
		$call_action = '<a href="' . admin_url( '/plugin-install.php?s=kingcomposer+king-theme&tab=search&type=term' ) . '">Click here to install KingComposer</a>';

	}

	?>
    <div class="notice notice-warning" style="display:block !important;">
        <p><?php printf( __( 'Oops, The KC Pro! requires KingComposer plugin. %s', 'kc_pro' ), $call_action ); ?></p>
    </div>
	<?php

}

add_action( 'plugins_loaded', 'ssc_load_plugin_textdomain' );

function ssc_load_plugin_textdomain() {
	load_plugin_textdomain( 'ssc', false, dirname( plugin_basename( __FILE__ ) ) . '/languages/' );
}

/**
 * Get images sizes info
 *
 * @global $_wp_additional_image_sizes
 * @uses   get_intermediate_image_sizes()
 *
 * @param  boolean [$unset_disabled = true] Delete images with 0 height and width?
 *
 * @return array
 */
function ssc_get_image_sizes( $unset_disabled = true ) {
	$wais = &$GLOBALS['_wp_additional_image_sizes'];

	$sizes = array( 'full' => 'full', 'custom_size' => 'Custom size' );

	foreach ( get_intermediate_image_sizes() as $_size ) {
		if ( in_array( $_size, array( 'thumbnail', 'medium', 'medium_large', 'large' ) ) ) {
			if ( $unset_disabled && 0 == get_option( "{$_size}_size_w" ) && 0 == get_option( "{$_size}_size_h" ) ) {
				continue;
			}
			$sizes[ $_size ] = $_size . '(' . get_option( "{$_size}_size_w" ) . 'x' . get_option( "{$_size}_size_h" ) . ')';
		} elseif ( isset( $wais[ $_size ] ) ) {
			if ( $unset_disabled && 0 == $wais[ $_size ]['width'] && 0 == $wais[ $_size ]['height'] ) {
				continue;
			}
			$sizes[ $_size ] = $_size . '(' . $wais[ $_size ]['width'] . 'x' . $wais[ $_size ]['height'] . ')';
		}
	}

	return $sizes;
}

function ssc_get_img_sizes_array_from_string( $c_size ) {
	$sizes = explode( 'x', str_replace( ' ', '', $c_size ), 2 );
	if ( count( $sizes ) > 1 && is_numeric( $sizes[0] ) && is_numeric( $sizes[1] ) ) {
		return $sizes;
	} else {
		return $c_size;
	}
}

function ssc_process_tab_title( $matches ) {

	if ( ! empty( $matches[0] ) ) {

		$tab_atts = shortcode_parse_atts( $matches[0] );

		$title     = '';
		$adv_title = '';
		$tab_id    = '';
		if ( isset( $tab_atts['title'] ) ) {
			$title = $tab_atts['title'];
		}
		if ( isset( $tab_atts['tab_id'] ) ) {
			$tab_id = $tab_atts['tab_id'];
		}

		if ( isset( $tab_atts['advanced'] ) && $tab_atts['advanced'] === 'yes' ) {

			if ( isset( $tab_atts['adv_title'] ) && ! empty( $tab_atts['adv_title'] ) ) {
				$adv_title = base64_decode( $tab_atts['adv_title'] );
			}

			$icon = $icon_class = $image = $image_id = $image_url = $image_thumbnail = $image_medium = $image_large = $image_full = '';

			if ( ! empty( $tab_atts['adv_icon'] ) ) {
				$icon_class = $tab_atts['adv_icon'];
				$icon       = '<i class="' . $tab_atts['adv_icon'] . '"></i>';
			}

			if ( ! empty( $tab_atts['adv_image'] ) ) {
				$img_size = 'full';
				if ( ! empty( $tab_atts['adv_image_size'] ) ) {
					$img_size = $tab_atts['adv_image_size'];
				}
				$image_id        = $tab_atts['adv_image'];
				$image_url       = image_downsize( $image_id, $img_size );
				$image_medium    = image_downsize( $image_id, 'medium' );
				$image_large     = image_downsize( $image_id, 'large' );
				$image_thumbnail = image_downsize( $image_id, 'thumbnail' );

				if ( ! empty( $image_url ) && isset( $image_url[0] ) ) {
					$image_url  = $image_url[0];
					$image_full = $image_url;
				}
				if ( ! empty( $image_medium ) && isset( $image_medium[0] ) ) {
					$image_medium = $image_medium[0];
				}

				if ( ! empty( $image_large ) && isset( $image_large[0] ) ) {
					$image_large = $image_large[0];
				}

				if ( ! empty( $image_thumbnail ) && isset( $image_thumbnail[0] ) ) {
					$image_thumbnail = $image_thumbnail[0];
				}
				if ( ! empty( $image_url ) ) {
					$image = '<img src="' . $image_url . '" alt="" />';
				}
			}

			$adv_title = str_replace( array(
				'{title}',
				'{icon}',
				'{icon_class}',
				'{image}',
				'{image_id}',
				'{image_url}',
				'{image_thumbnail}',
				'{image_medium}',
				'{image_large}',
				'{image_full}',
				'{tab_id}',
			),
				array(
					$title,
					$icon,
					$icon_class,
					$image,
					$image_id,
					$image_url,
					$image_thumbnail,
					$image_medium,
					$image_large,
					$image_full,
					$tab_id,
				),
				$adv_title );

			echo '<li>' . $adv_title . '</li>';

		} else {
			if ( ! empty ( $tab_atts['icon_option'] ) ) {
				if ( $tab_atts['icon_option'] == 'yes' ) {
					if ( empty( $tab_atts['icon'] ) ) {
						$tab_atts['icon'] = 'fa-leaf';
					}
					$title = '<i class="' . $tab_atts['icon'] . '"></i> ' . $title;
				} else if ( $tab_atts['icon_option'] == 'svg' ) {
					if ( ! empty( $tab_atts['svg'] ) ) {
						$title = ssc_process_svg( $tab_atts['svg'] ) . ' ' . $title;
					}
				}
			}
			echo '<li><a href="#' . ( isset( $tab_atts['tab_id'] ) ? $tab_atts['tab_id'] : '' ) . '" data-prevent="scroll">' . $title . '</a></li>';
		}

	}

	return $matches[0];

}

function ssc_process_svg( $svg ) {
	$svg_url = wp_get_attachment_url( $svg );

	return ssc_generate_svg( $svg_url );
}

function ssc_generate_svg( $svg_url ) {
	$svg_file = wp_remote_get( esc_url_raw( $svg_url ), array('sslverify' => false) ); //  array('sslverify' => false) ???????????????
	$svg_file = wp_remote_retrieve_body( $svg_file );
	if ( false !== $pos = strpos( $svg_file, '<svg' ) ) {
		return substr( preg_replace('~\sid="[^"]+"~', '', $svg_file), $pos );
	}

	return '';

}

function ssc_process_media( $media, $size = 'full', $atts = array() ) {
	$m_data = image_downsize( $media, $size );
	if ( $m_url = $m_data[0] ) {
		if ( false === strpos( $m_url, '.svg' ) ) {
			$d_atts = array(
				'alt' => "",
			);
			$atts   = wp_parse_args( $atts, $d_atts );
			$att    = '';
			foreach ( $atts as $n => $v ) {
				$att .= " $n=" . '"' . $v . '"';
			}

			return '<img src="' . $m_url . '"' . $att . ' />';
		} else {
			$d_atts = array();
			$atts   = wp_parse_args( $atts, $d_atts );
			$att    = '';
			foreach ( $atts as $n => $v ) {
				$att .= " $n=" . '"' . $v . '"';
			}

			return str_replace( '<svg', '<svg ' . $att . ' ', ssc_generate_svg( $m_url ) );
		}
	}

	return '';
}

add_action( 'wp_ajax_ssc_get_svg', 'ssc_get_svg' );

function ssc_get_svg() {
	$svg = '';
	if ( ! empty( $_GET['id'] ) ) {
		$img_s = empty( $_GET['img_s'] ) ? '' : $_GET['img_s'];
		$anim  = null;
		if ( ! empty( $_GET['anim'] ) ) {
			$anim = array( 'class' => $_GET['anim'] );
		}
		$svg = ssc_process_media( esc_attr( $_GET['id'] ), $img_s, $anim );
	}

	echo $svg;
	wp_die();
}


add_action( 'admin_init', 'ssc_add_kingcomposer_actions' );

function ssc_add_kingcomposer_actions() {
	if ( class_exists( 'KingComposer' ) ) {
		add_action( 'save_post', 'ssc_save_post_thumbnail', 1000, 2 );
	}
}

function ssc_save_post_thumbnail( $post_id, $post ) {
	if ( ! current_user_can( 'publish_pages' ) ) {
		return;
	}

	$id = filter_input( INPUT_POST, 'post_ID', FILTER_VALIDATE_INT );

	if ( empty( $id ) ) {
		return;
	}

	$thumbnail = esc_url_raw( get_home_url() . '/scrs/' . get_the_title() . '.jpg', array( 'http', 'https' ) );
	$param     = (array) get_post_meta( $id, 'kc_data', true );

	if ( empty( $param ) ) {
		$param = array(
			'mode'      => '',
			'css'       => '',
			'max_width' => '',
			'classes'   => '',
			'thumbnail' => $thumbnail,
			'collapsed' => '',
			'optimized' => '',
		);
	} else {
		if ( empty( $param['thumbnail'] ) ) {
			$param['thumbnail'] = $thumbnail;
		}
	}

	if ( ! add_post_meta( $id, 'kc_data', $param, true ) ) {
		update_post_meta( $id, 'kc_data', $param );
	}


}

add_filter( 'kc-core-scripts',
	function ( $args ) {
		$args['params'] = SSC_URL . 'js/kc/kc.params.js';
		return $args;
	},
    11
);