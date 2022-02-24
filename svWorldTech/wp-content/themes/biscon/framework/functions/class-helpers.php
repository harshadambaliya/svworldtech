<?php
/* 
The file contain theme functions.
*/

class Atiframebuilder_Helpers {

	private $opt_name;

	private static $modal;

	public function __construct( $opt_name ) {

		$this->opt_name = $opt_name;

		if ( is_admin() ) {

			add_action( 'admin_enqueue_scripts', array( $this, 'set_ajax_connector' ) );

			if ( wp_doing_ajax() ) {
				add_action( 'wp_ajax_handle_post_layout', array( $this, 'handle_post_layout' ) );
			}

			add_action( 'redux/options/' . $this->opt_name . '/saved', array( $this, 'change_action' ), 10, 3 );

			add_action( 'redux/options/' . $this->opt_name . '/reset', array( $this, 'reset_action' ), 999, 1 );

			//Disable Redux welcome page
			add_filter( 'wp_redirect', array( $this, 'disable_redux_welcome' ) );
			add_filter( 'upload_mimes', 'my_myme_types', 1, 1 );
			function my_myme_types( $mime_types ) {
				$new_filetypes = array();

				$new_filetypes['svg'] = 'image/svg+xml';

				$mime_types = array_merge( $mime_types, $new_filetypes );

				return $mime_types;
			}

		}

		add_action( 'atiframebuilder_helpers_set_globals', array( 'Atiframebuilder_Helpers', 'set_globals' ) );

		add_action( 'atiframebuilder_helpers_modal', array( 'Atiframebuilder_Helpers', 'modal' ) );

		add_action( 'wp_enqueue_scripts', array( $this, 'remove_plugins_styles' ), 9999 );

		add_action( 'wp_enqueue_scripts', array( $this, 'get_header_scripts' ), 10000 );

		add_action( 'wp_enqueue_scripts', array( 'Atiframebuilder_Helpers', 'set_modal' ), 10000 );

		add_action( 'import_end', array( $this, 'update_composer_block_posts' ) );

		$this->set_kc_templates();

		/*
		*   This is an example Limit 7-day expiration for your images starting at installation,
		*   after that all of the images will not be displayed and stopping request to your server.
		*/

		define( 'KC_ATTACHS_XML_EXPIRATION', 1 * DAY_IN_SECONDS );

	}

	// Ajax queries
	public function set_ajax_connector( $hook ) {
		wp_localize_script(
			'utils',
			'localajax',
			array(
				'url' => admin_url( 'admin-ajax.php' ),
			)
		);
	}

	public function handle_post_layout() {
		$resp = array();
		if ( isset( $_POST['post_id'] ) && is_numeric( $_POST['post_id'] ) ) {
			if ( current_user_can( 'edit_posts', $_POST['post_id'] ) ) {
				if ( delete_post_meta( $_POST['post_id'], 'layout_settings' ) ) {
					$resp = array(
						'success' => true,
						'message' => esc_html__( 'Data was removed. Please, update the page.', 'biscon' ),
					);
				} else {
					$resp = array(
						'success' => false,
						'message' => esc_html__( 'Data was not removed for id=',
								'biscon' ) . $_POST['post_id'],
					);
				}
			} else {
				$resp = array(
					'success' => false,
					'message' => esc_html__( 'You can\'t edit id=', 'biscon' ) . $_POST['post_id'],
				);
			}
		} else {
			$resp = array(
				'success' => false,
				'message' => esc_html__( 'Wrong data.', 'biscon' ),
			);
		}
		echo json_encode( $resp );
		wp_die();
	}

	public function remove_plugins_styles() {
		$remove_styles = array( 'owl-theme', 'owl-carousel' );
		if ( is_array( $remove_styles ) ) {
			foreach ( $remove_styles as $remove_style ) {
				wp_dequeue_style( $remove_style );
				wp_deregister_style( $remove_style );

			}
		}
	}

	// CSS and JS files
	public function get_header_scripts() {
		if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
			wp_enqueue_script( 'comment-reply' );
		}
		wp_enqueue_style( 'mediaelement' );
		wp_enqueue_style( 'wp-mediaelement' );
		wp_enqueue_script( 'mediaelement' );
		wp_enqueue_script( 'wp-mediaelement' );

		wp_enqueue_script( 'magnific-popup', get_template_directory_uri() . '/js/jquery.magnific-popup.min.js', array( 'jquery' ), false, true );
		wp_enqueue_script( 'atiframebuilder-mainjs', get_template_directory_uri() . '/js/main.js', array( 'jquery', 'magnific-popup' ), false, true );

		//css
		wp_enqueue_style( 'atiframebuilder-ownstyles', get_template_directory_uri() . '/style.css', array(), false, 'all' );

	}

	// Modal Window Code
	public static function set_modal() {
		global $secretlab;
		if ( isset( $secretlab['show_modal'] ) && ! empty( $secretlab['modal_window'] ) ) {
			if ( '1' === $secretlab['show_modal'] ) {
				if ( function_exists( 'kc_do_shortcode' ) ) {
					$raw_content = kc_raw_content( $secretlab['modal_window'] );
					$modal = kc_do_shortcode( $raw_content );
				} else {
					$post = get_post( $secretlab['modal_window'] );
					$modal = do_shortcode( $post->post_content );
				}
				preg_match_all( '~<style[\s\r\n].*?>(?P<styles>.*)\<\/style>~', $modal, $styles );
				if ( ! empty( $styles['styles'] ) ) {
					if( is_array( $styles['styles'] ) ) {
						foreach ( $styles['styles'] as $style ) {
							wp_add_inline_style( 'atiframebuilder-ownstyles', $style );
						}
					} else {
						wp_add_inline_style( 'atiframebuilder-ownstyles', $styles['styles'] );
					}
					self::$modal = preg_replace( '@<(script|style)[^>]*?>.*?</\\1>@si', '', $modal );
				} else {
					self::$modal = $modal;
				}
			}
		}
	}

	// Modal Window Code
	public static function modal() {
		global $secretlab;
		if ( ! empty( self::$modal ) ) {
			if ( '1' === $secretlab['agressive_modal'] ) {
				$displagg = 'true';
			} else {
				$displagg = 'false';
			}
			$displsec = ! empty( $secretlab['show_modal'] ) ? 'timer: ' . $secretlab['time_modal'] . ', ' : '';
			$displday = ! empty( $secretlab['day_modal'] ) ? 'cookieExpire: ' . $secretlab['day_modal'] . ', ' : '';
			wp_add_inline_script(
				'atiframebuilder-mainjs',
				'jQuery(document).ready(function ($) {
                "use strict";
                var _ouibounce = ouibounce(document.getElementById("ouibounce-modal"), {
                    aggressive:  ' . $displagg . ',
                    ' . $displsec . '
                    ' . $displday . '
                    callback: function() { console.log("ouibounce fired!"); }
                  });
                  
			     
                  $("body").on("click", function() {
                    $("#ouibounce-modal").hide();
                  });
                
                  $("#ouibounce-modal .nat-bgr-cross").on("click", function() {
                    $("#ouibounce-modal").hide();
                  });
                
                  $("#ouibounce-modal .modal").on("click", function(e) {
                    e.stopPropagation();
                  });
                  
                  $(document).on("click", ".modalfire", function(e) {
                    e.preventDefault();
                    _ouibounce.fire();
			      });
			      
                  });'
			);
			echo '<!-- Ouibounce Modal -->
            <div id="ouibounce-modal">
                  <div class="underlay"></div>
                  <div class="modal"><i class="nat-bgr-cross"></i>';
			printf( '%s', self::$modal );
			echo '</div>
            </div>';
		}
	}

	// Check pagetype for Boxed background setting
	public static function check_pagetype( $pagetype_prefix ) {
		global $atiframebuilder_layout, $secretlab;
		$props = array( 'shop-' => array( 'boxed-background', 'content-background' ), 'blog-' => array() );
		foreach ( $props[ $pagetype_prefix ] as $prop ) {
			if ( ! isset( $atiframebuilder_layout[ $pagetype_prefix . $prop ] ) && ! empty( $secretlab[ $prop ] ) ) {
				$atiframebuilder_layout[ $pagetype_prefix . $prop ] = $secretlab[ $prop ];
			} else {
				$atiframebuilder_layout[ $pagetype_prefix . $prop ] = '';
			}
		}
	}

	// Remove Injected classes, ID's and Page ID's from Navigation <li> items
	public function my_css_attributes_filter( $var ) {
		return is_array( $var ) ? array() : '';
	}

	//The function set global variables for correct work of Metabox Plugin with page setting: sidebar and slider
	public static function set_globals() {
		global $secretlab, $atiframebuilder_layout, $post;
		$plugins = get_option( 'active_plugins' );
		if ( ! in_array( 'revslider/revslider.php', $plugins ) && ! in_array( 'LayerSlider/layerslider.php',
				$plugins ) ) {
			$secretlab['is_active_slider_plugins'] = false;
		} else {
			$secretlab['is_active_slider_plugins'] = true;
		}

		if ( is_singular() ) {
			$atiframebuilder_layout = json_decode( get_post_meta( $post->ID, 'layout_settings', true ), true );
			if ( ! $atiframebuilder_layout ) {
				$atiframebuilder_layout = $secretlab;
			}
			if ( 'post' === get_post_type() ) {
				$secretlab['page_type']       = 'blog';
				$secretlab['design_layout']   = 'blog-layout';
				$secretlab['pagetype_prefix'] = 'blog-';
				self::check_pagetype( $secretlab['pagetype_prefix'] );
			} elseif ( function_exists( 'is_woocommerce' ) && is_woocommerce() ) {
				$secretlab['page_type']       = 'shop';
				$secretlab['design_layout']   = 'shop-layout';
				$secretlab['pagetype_prefix'] = 'shop-';
				self::check_pagetype( $secretlab['pagetype_prefix'] );
			} else {
				$secretlab['page_type']       = '';
				$secretlab['design_layout']   = 'design-layout';
				$secretlab['pagetype_prefix'] = '';
			}
		} elseif ( function_exists( 'is_woocommerce' ) && is_woocommerce() ) {
			$atiframebuilder_layout       = $secretlab;
			$secretlab['page_type']       = 'shop';
			$secretlab['design_layout']   = 'shop-layout';
			$secretlab['pagetype_prefix'] = 'shop-';
			self::check_pagetype( $secretlab['pagetype_prefix'] );
		} elseif ( is_category() || is_home() || is_tag() || is_author() ) {
			$atiframebuilder_layout       = $secretlab;
			$secretlab['page_type']       = 'blog';
			$secretlab['design_layout']   = 'blog-layout';
			$secretlab['pagetype_prefix'] = 'blog-';
		} else {
			$atiframebuilder_layout       = $secretlab;
			$secretlab['page_type']       = '';
			$secretlab['design_layout']   = 'design-layout';
			$secretlab['pagetype_prefix'] = '';
		}

	}

	// Slider for Shop/blog/site
	/*
	*get_customized_slider() returns aliases of availeble sliders, dependinding
	*of $page_type which can indicate WooComerce page (forms 'shop' prefix,
	*Blog page (forms 'blog' prefix),
	*and regular page (forms '' prefix)
	*/
	public static function get_customized_slider( $prefix = '' ) {
		global $secretlab, $atiframebuilder_layout;
		$param_name = ( ! isset( $secretlab[ $prefix . 'pick_slider' ] ) || empty( $secretlab[ $prefix . 'pick_slider' ] ) ) ? 'pick_slider' : $prefix . 'pick_slider';
		if ( ! isset( $atiframebuilder_layout[ $param_name ] ) || 0 === count( $atiframebuilder_layout ) || 'default' === $atiframebuilder_layout[ $param_name ] || '' === $atiframebuilder_layout[ $param_name ] ) {
			$params = $secretlab;
		} else {
			$params = $atiframebuilder_layout;
		}
		if ( ! empty( $params[ $param_name ] ) && preg_match( '/(rev_|lay_|smart_)(.+)/',
				$params[ $param_name ],
				$slider ) ) {
			$type   = $slider[1];
			$slider = $slider[2];
			switch ( $type ) {
				case 'rev_':
					echo do_shortcode( '[rev_slider alias="' . $slider . '"]' );
					break;
				case 'smart_':
					echo do_shortcode( '[smartslider3 slider=' . $slider . ']' );
					break;
				case 'lay_':
					echo do_shortcode( '[layerslider id="' . $slider . '"]' );
					break;
			}
		} else {
			return;
		}
	}

	/* Color Schemes - Generate CSS */
	public static function to_row( $arr ) {
		$keys   = array();
		$values = array();
		foreach ( $arr as $key => $val ) {
			if ( is_array( $val ) ) {
				foreach ( $val as $k => $v ) {
					if ( ! is_array( $v ) ) {
						$keys[]   = '/\$' . $key . '_' . $k . '\$/';
						$values[] = $v;
					} else {
						foreach ( $v as $k1 => $v1 ) {
							$keys[]   = '/\$' . $key . '_' . $k . '_' . $k1 . '\$/';
							$values[] = $v1;
						}
					}
				}
			} else {
				$keys[]   = '/\$' . $key . '\$/';
				$values[] = $val;
			}
		}
		$result         = array();
		$result['keys'] = $keys;
		ksort( $result['keys'] );
		$result['values'] = $values;
		ksort( $result['values'] );

		return $result;
	}

	/* Generate CSS by Template */
	public static function change_action( $opts ) {
		global $wp_filesystem;
		$template_css = get_template_directory() . '/css/theme.css';
		if ( empty( $wp_filesystem ) ) {
			WP_Filesystem();
		}
		if ( $wp_filesystem ) {

			$css     = get_template_directory() . '/style.css';
			$content = $wp_filesystem->get_contents( $template_css );
			$opts    = self::to_row( $opts );
			$content = preg_replace( $opts['keys'], $opts['values'], $content );
			$wp_filesystem->put_contents( $css, $content, FS_CHMOD_FILE );
		}
	}

	/* Generate CSS at reset */
	public static function reset_action( $instance ) {
		if ( ! empty( $instance->parent->options ) ) {
			$options = $instance->parent->options;
			foreach ( $options as &$option ) {
				if ( isset( $option['color'] ) && ! empty( $option['color'] ) && empty( $option['rgba'] ) ) {
					$alpha = isset( $option['alpha'] ) ? $option['alpha'] : 1 ;
					$option['rgba'] = Redux_Helpers::hex2rgba( $option['color'], $alpha );
				}
				unset( $option );
			}
			self::change_action( $options );
		}
	}

	// Update data for composer block post type
	public function update_composer_block_posts() {
		$args       = array(
			'public'   => true,
			'_builtin' => false,
		);
		$output     = 'names';
		$operator   = 'and';
		$post_types = get_post_types( $args, $output, $operator );
		$post_types = is_array( $post_types ) ? $post_types : array( 'composer_widget', 'portfolio', );

		$args = array(
			'numberposts'      => - 1,
			'category'         => 0,
			'include'          => array(),
			'exclude'          => array(),
			'post_type'        => $post_types,
			'suppress_filters' => true,
		);

		$composer_widgets = get_posts( $args );

		if ( is_array( $composer_widgets ) ) {
			global $wpdb;
			foreach ( $composer_widgets as $composer_widget ) {
				if ( empty( $composer_widget->post_content_filtered ) ) {
					$args = sanitize_post(
						array(
							'ID'           => $composer_widget->ID,
							'post_content' => $composer_widget->post_content,
						),
						'db'
					);
					if ( class_exists( 'KingComposer' ) ) {
						$post_content = kc_do_shortcode( $args['post_content'] );
					} else {
						$post_content = $args['post_content'];
					}
					$data   = array(
						$args['post_content'],
						$post_content,
						$args['ID'],
					);

					$result = $wpdb->query(
					    $wpdb->prepare(
					        'UPDATE ' . $wpdb->prefix . 'posts' . ' SET post_content_filtered = %s, post_content = %s WHERE ID = %d;',
					        $data
					    ) // $wpdb->prepare
					); // $wpdb->query
				}
			}
		}
		update_option( 'permalink_structure', '/%category%/%postname%/' );
	}

	public function disable_redux_welcome( $path ) {
		if ( preg_match( '/redux.about|vc.welcome/', $path ) ) {
			$path = '/wp-admin/plugins.php';
		}

		return $path;
	}

	// Load prebuilt templates and sections
	private function set_kc_templates() {
		// Load prebuilt templates and sections
		if ( function_exists( 'kc_prebuilt_template' ) ) {
			foreach ( Atiframebuilder_Theme_Demo::get_demos() as $demo => $name ) {
				$xml_path = get_template_directory() . '/import/' . $demo . '/demo_data.xml';
				kc_prebuilt_template( $name, $xml_path );
			}
		}
	}

	public static function correct_enqueue_styles_for_widgets( $html ) {
		if ( empty( $html ) ) {
			return $html;
		}
		preg_match_all( '~<style[\s\r\n].*?>(?P<styles>.*)\<\/style>~', $html, $styles );
		if ( ! empty( $styles['styles'] ) ) {
			if( is_array( $styles['styles'] ) ) {
				foreach ( $styles['styles'] as $style ) {
					wp_add_inline_style( 'atiframebuilder-ownstyles', $style );
				}
			} else {
				wp_add_inline_style( 'atiframebuilder-ownstyles', $styles['styles'] );
			}
			return preg_replace( '@<(style)[^>]*?>.*?</\\1>@si', '', $html );
		} else {
			return $html;
		}
	}
}

?>
