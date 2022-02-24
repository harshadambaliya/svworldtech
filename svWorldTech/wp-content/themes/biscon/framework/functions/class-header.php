<?php
/*
The file contain functions for headers sections.
*/

class Atiframebuilder_Header {

    private static $header_widget;

    private static $header_sidebar;

	public function __construct() {

		add_action( 'wp_enqueue_scripts', array( $this, 'preloader_styles' ), 10000 );

		add_action( 'wp_enqueue_scripts', array( 'Atiframebuilder_Header', 'set_header_widget' ), 10000 );

		add_action( 'wp_enqueue_scripts', array( 'Atiframebuilder_Header', 'set_header_sidebar' ), 10000 );

		add_action( 'wp_enqueue_scripts', array( $this, 'header_styles' ), 10000 );

		add_action( 'wp_enqueue_scripts', array( $this, 'head_footer_custom_code' ), 99999 );

		add_action( 'atiframebuilder_header_scripts', array( $this, 'header_js' ), 10000 );

		add_action( 'atiframebuilder_header_set_boxed_background', array( 'Atiframebuilder_Header', 'set_boxed_background' ) );

		add_action( 'atiframebuilder_header_pageloader', array( 'Atiframebuilder_Header', 'pageloader' ) );

		add_action( 'atiframebuilder_header_set_boxed_layout', array( 'Atiframebuilder_Header', 'set_boxed_layout' ) );

		add_action( 'atiframebuilder_header_header_layout', array( 'Atiframebuilder_Header', 'header_layout' ) );

		add_action( 'atiframebuilder_header_set_header_sidebar_layout',
			array( 'Atiframebuilder_Header', 'set_header_sidebar_layout' ) );
		add_action( 'atiframebuilder_header_single_post_heading', array( 'Atiframebuilder_Header', 'single_post_heading' ) );

		add_action( 'wp_head', array( $this, 'pingback_header' ) );
	}

	// Pageloader
	public static function pageloader() {
		global $secretlab;
		if ( isset( $secretlab['pageloader'] ) && ! empty( $secretlab['pgl_color']['rgba'] ) ) {
			if ( '1' === $secretlab['pageloader'] ) {
				echo '<div class="loaderbgr">
                    <svg class="circle-chart" viewbox="0 0 80 80" width="80" height="80" xmlns="http://www.w3.org/2000/svg">
                      <circle class="circle-chart__background" stroke-width="5" fill="none" cx="40" cy="40" r="30" />
                      <circle class="circle-chart__circle" stroke="' . esc_attr( $secretlab['pgl_color']['rgba'] ) . '" stroke-width="5" stroke-dasharray="34,234" stroke-linecap="round" fill="none" cx="40" cy="40" r="30" />
                    </svg>
                </div>';
			}
		}
	}

	// Page preloader
	public function preloader_styles() {
		global $secretlab;
		if ( isset( $secretlab['pageloader'] ) ) {
			if ( '1' === $secretlab['pageloader'] ) {
				/* Pageloader*/
				wp_add_inline_style(
					'atiframebuilder-ownstyles',
					'.loaderbgr {position:fixed; top:0;left:0;right:0;bottom:0; z-index:999999;width: 100%;height: 100%;}
                    .circle-chart__background {stroke: rgba(200, 200, 200, 0.3)}
                    .circle-chart {position:absolute; top:calc(50% - 40px); left:calc(50% - 40px); }
                    .circle-chart__circle {transform-origin: center;animation: ani 1.5s linear infinite reverse; }
                    @keyframes ani {
                        0% {transform: rotate(0deg);}
                        100% {transform: rotate(360deg);}
                    }'
				);
			}
		}
	}

	// Custom CSS and JS for header
	public function header_styles() {
		global $secretlab;
		if ( isset( $secretlab['header-nested'] ) ) {
			if ( '1' === $secretlab['header-nested'] ) {
				if ( isset( $secretlab['header-nested-ace-css'] ) ) {
					if ( strlen( $secretlab['header-nested-ace-css'] ) > 0 && $secretlab['header-nested-ace-css'] !== 'body { margin : 0; padding : 0; }' ) {
						wp_add_inline_style( 'atiframebuilder-ownstyles', $secretlab['header-nested-ace-css'] );
					}
				}
			}
		}
	}

	public function header_js() {
		global $secretlab;
		if ( isset( $secretlab['header-nested'] ) ) {
			if ( '1' === $secretlab['header-nested'] ) {
				if ( isset( $secretlab['header-nested-ace-js'] ) ) {
					if ( strlen( $secretlab['header-nested-ace-js'] ) > 0 && $secretlab['header-nested-ace-js'] !== 'function hello() { alert ("HELLO"); }' ) {
						wp_add_inline_script( 'jquery', $secretlab['footer-nested-ace-js'] );
					}
				}
			}
		}
	}

	// boxed layout
	public static function set_boxed_background() {

		global $secretlab, $atiframebuilder_layout;
		$add_class = get_body_class();

		$sl_design_layout = isset( $atiframebuilder_layout[ $secretlab['design_layout'] ] ) ? $atiframebuilder_layout[ $secretlab['design_layout'] ] : 1;
		if ( '2' === $sl_design_layout ) {

			if ( ! empty( $atiframebuilder_layout[ $secretlab['pagetype_prefix'] . 'boxed-background' ]['background-color'] ) ) {
				$box_bg_color = 'background-color : ' . $atiframebuilder_layout[ $secretlab['pagetype_prefix'] . 'boxed-background' ]['background-color'] . ';';
			} else {
				$box_bg_color = '';
			}

			if ( ! empty( $atiframebuilder_layout[ $secretlab['pagetype_prefix'] . 'boxed-background' ]['background-image'] ) ) {
				if ( ! empty( $atiframebuilder_layout[ $secretlab['pagetype_prefix'] . 'boxed-background' ]['background-image']['url'] ) ) {
					$src_box_bg = $atiframebuilder_layout[ $secretlab['pagetype_prefix'] . 'boxed-background' ]['background-image'];
				} else {
					$src_box_bg['url'] = '';
				}
				if ( $src_box_bg['url'] !== 'none' && $src_box_bg['url'] !== '' ) {
					$box_bg_image      = 'background-image : url("' . $src_box_bg['url'] . '");';
					$box_bg_repeat     = 'background-repeat : ' . ( 'default' === $atiframebuilder_layout[ $secretlab['pagetype_prefix'] . 'boxed-background' ]['background-repeat'] ? $secretlab[ $secretlab['pagetype_prefix'] . 'boxed-background' ]['background-repeat'] : $atiframebuilder_layout[ $secretlab['pagetype_prefix'] . 'boxed-background' ]['background-repeat'] ) . ';';
					$box_bg_size       = 'background-size : ' . ( 'default' === $atiframebuilder_layout[ $secretlab['pagetype_prefix'] . 'boxed-background' ]['background-size'] ? $secretlab[ $secretlab['pagetype_prefix'] . 'boxed-background' ]['background-size'] : $atiframebuilder_layout[ $secretlab['pagetype_prefix'] . 'boxed-background' ]['background-size'] ) . ';';
					$box_bg_attachment = 'background-attachment : ' . ( 'default' === $atiframebuilder_layout[ $secretlab['pagetype_prefix'] . 'boxed-background' ]['background-attachment'] ? $secretlab[ $secretlab['pagetype_prefix'] . 'boxed-background' ]['background-attachment'] : $atiframebuilder_layout[ $secretlab['pagetype_prefix'] . 'boxed-background' ]['background-attachment'] ) . ';';
					$box_bg_position   = 'background-position : ' . ( 'default' === $atiframebuilder_layout[ $secretlab['pagetype_prefix'] . 'boxed-background' ]['background-position'] ? $secretlab[ $secretlab['pagetype_prefix'] . 'boxed-background' ]['background-position'] : $atiframebuilder_layout[ $secretlab['pagetype_prefix'] . 'boxed-background' ]['background-position'] ) . ';';
				} elseif ( 'none' === $src_box_bg['url'] ) {
					$box_bg_image  = 'background-image : none;';
					$box_bg_repeat = $box_bg_size = $box_bg_attachment = $box_bg_position = '';
				} else {
					$box_bg_image = $box_bg_repeat = $box_bg_size = $box_bg_attachment = $box_bg_position = '';
				}

			} else {
				$box_bg_image = $box_bg_repeat = $box_bg_size = $box_bg_attachment = $box_bg_position = '';
			}
			$mainbgr = '.' . $add_class[0] . '.' . $add_class[1] . ' .mainbgr{' . $box_bg_color . $box_bg_image . $box_bg_repeat . $box_bg_size . $box_bg_attachment . $box_bg_position . '}';

		} else {
			$mainbgr = '';
		}

		if ( ! empty( $atiframebuilder_layout[ $secretlab['pagetype_prefix'] . 'content-background' ]['background-color'] ) ) {
			$content_bg_color = 'background-color : ' . $atiframebuilder_layout[ $secretlab['pagetype_prefix'] . 'content-background' ]['background-color'] . ';';
		} else {
			$content_bg_color = '';
		}
		if ( ! empty( $atiframebuilder_layout[ $secretlab['pagetype_prefix'] . 'content-background' ]['background-image']['url'] ) ) {
			$src_content_bg = $atiframebuilder_layout[ $secretlab['pagetype_prefix'] . 'content-background' ]['background-image'];
		} else {
			$src_content_bg['url'] = '';
		}
		if ( $src_content_bg['url'] !== 'none' && $src_content_bg['url'] !== '' ) {

			$content_bg_image      = 'background-image : url("' . $src_content_bg['url'] . '");';
			$content_bg_repeat     = 'background-repeat : ' . $atiframebuilder_layout[ $secretlab['pagetype_prefix'] . 'content-background' ]['background-repeat'] . ';';
			$content_bg_size       = 'background-size : ' . $atiframebuilder_layout[ $secretlab['pagetype_prefix'] . 'content-background' ]['background-size'] . ';';
			$content_bg_attachment = 'background-attachment : ' . $atiframebuilder_layout[ $secretlab['pagetype_prefix'] . 'content-background' ]['background-attachment'] . ';';
			$content_bg_position   = 'background-position : ' . $atiframebuilder_layout[ $secretlab['pagetype_prefix'] . 'content-background' ]['background-position'] . ';';

		} elseif ( 'none' === $src_content_bg['url'] ) {
			$content_bg_image  = 'background-image : none;';
			$content_bg_repeat = $content_bg_size = $content_bg_attachment = $content_bg_position = '';
		} else {
			$content_bg_image = $content_bg_repeat = $content_bg_size = $content_bg_attachment = $content_bg_position = '';
		}

		echo '<style>',
		$mainbgr,
		'.', $add_class[0],
		'.', $add_class[1],
		' main {',
		$content_bg_color,
		$content_bg_image,
		$content_bg_repeat,
		$content_bg_size,
		$content_bg_attachment,
		$content_bg_position,
		'}
        </style>';

	}

	public static function set_boxed_layout() {

		global $secretlab, $atiframebuilder_layout;

		if ( isset( $atiframebuilder_layout[ $secretlab['design_layout'] ] ) ) {
			if ( '2' === $atiframebuilder_layout[ $secretlab['design_layout'] ] ) {
				echo '<div class="mainbgr"><div class="container"><div class="row">';
			}
		}
	}

	public static function set_header_sidebar_layout() {

		global $secretlab, $atiframebuilder_layout;
		if ( ! isset( $secretlab['sidebar-layout'] ) ) {
			$secretlab['sidebar-layout'] = 1;
		}

		$type   = empty( $secretlab['page_type'] ) ? '' : $secretlab['page_type'];
		$prefix = ( '' === $type ) ? '' : '-';

		$secretlab[ $type . $prefix . 'sidebar-layout' ]        = ( empty( $secretlab[ $type . $prefix . 'sidebar-layout' ] ) ) ? $secretlab['sidebar-layout'] : $secretlab[ $type . $prefix . 'sidebar-layout' ];
		$atiframebuilder_layout[ $type . $prefix . 'sidebar-layout' ] = ( empty( $atiframebuilder_layout[ $type . $prefix . 'sidebar-layout' ] ) ) ? $secretlab[ $type . $prefix . 'sidebar-layout' ] : $atiframebuilder_layout[ $type . $prefix . 'sidebar-layout' ];
		$sl_sidebar_layout                                      = isset( $atiframebuilder_layout[ $secretlab['pagetype_prefix'] . 'sidebar-layout' ] ) ? $atiframebuilder_layout[ $secretlab['pagetype_prefix'] . 'sidebar-layout' ] : '1';

		if ( class_exists( 'ReduxFrameworkPlugin' ) && class_exists( 'KingComposer' ) ) {
			if ( $sl_sidebar_layout !== '1' ) {
				echo '<div class="sbcenter">';
			}
			if ( ! empty ( self::$header_sidebar ) ) {
				echo '<div class="col-lg-3 col-md-12 col-sm-12 widget-area left_sb animated slideInLeft">';
				echo '<div>';
				    printf( '%s', self::$header_sidebar );
				echo '</div>';
				echo '</div>';
			}
			if ( '1' === $sl_sidebar_layout ) {
				echo '<div class="main">';
			} elseif ( '2' === $sl_sidebar_layout ) {
				echo '<div class="col-lg-6 col-md-12 col-sm-12 col-xs-12 cont-box-area main  blogsidebarspage">';
			} elseif ( '3' === $sl_sidebar_layout ) {
				echo '<div class="col-lg-9 col-md-12 col-sm-12 col-xs-12 cont-box-area main blogsidebarpage lsb">';
			} elseif ( '4' === $sl_sidebar_layout ) {
				echo '<div class="col-lg-9 col-md-12 col-sm-12 col-xs-12 cont-box-area main blogsidebarpage rsb">';
			}
		} else {
			// out of the box
			if ( !is_active_sidebar( '_default_right_sidebar') && empty ( self::$header_sidebar ) ) {
				echo '<div class="main">';
			} else {echo '<div class="sbcenter">';}
			if ( is_active_sidebar( '_default_right_sidebar') && ! empty ( self::$header_sidebar ) ) {
				echo '<div class="col-lg-3 col-md-12 col-sm-12 widget-area left_sb animated slideInLeft">
                        <div>';
				    printf( '%s', self::$header_sidebar );
				echo '</div>
                    </div>
                <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12 cont-box-area main  blogsidebarspage">';
			} elseif ( ! empty ( self::$header_sidebar ) ) {
				echo '<div class="col-lg-3 col-md-12 col-sm-12 widget-area left_sb animated slideInLeft">
                        <div>';
				    printf( '%s', self::$header_sidebar );
				echo '</div>
                    </div>
                <div class="col-lg-9 col-md-12 col-sm-12 col-xs-12 cont-box-area main blogsidebarpage lsb">';
			} elseif ( is_active_sidebar( '_default_right_sidebar') ) {
				echo '<div class="col-lg-9 col-md-12 col-sm-12 col-xs-12 cont-box-area main blogsidebarpage rsb">';
			}
		}

	}

	public static function set_customized_slider() {

		global $secretlab, $atiframebuilder_layout;

		if ( isset( $secretlab['header_type'] ) ) {

			$prefix = empty( $secretlab['pagetype_prefix'] ) ? '' : $secretlab['pagetype_prefix'];

			if ( empty( $secretlab[ $prefix . 'header_type' ] ) ) {
				$secretlab[ $prefix . 'header_type' ] = $secretlab['header_type'];
			}

			if ( empty( $atiframebuilder_layout[ $prefix . 'header_type' ] ) ) {
				$atiframebuilder_layout[ $prefix . 'header_type' ] = $secretlab[ $prefix . 'header_type' ];
			}

			if ( '1' === $atiframebuilder_layout[ $prefix . 'header_type' ] ) {

				if ( isset( $secretlab[ $prefix . 'pick_slider' ] ) ) {
					if ( '' === $secretlab[ $prefix . 'pick_slider' ] ) {
						$secretlab[ $prefix . 'pick_slider' ] = $secretlab['pick_slider'];
					} elseif ( '0' === $secretlab[ $prefix . 'pick_slider' ] ) {
						$secretlab[ $prefix . 'pick_slider' ] = 0;
					}
				}

				if ( empty( $atiframebuilder_layout[ $prefix . 'pick_slider' ] ) || 'default' === $atiframebuilder_layout[ $prefix . 'pick_slider' ] ) {
					$sl_headerslider = $secretlab[ $prefix . 'pick_slider' ];
				} else {
					$sl_headerslider = $atiframebuilder_layout[ $prefix . 'pick_slider' ];
				}

				if ( ! empty( $sl_headerslider ) && 0 !== $sl_headerslider ) {
					echo '<div class="headerslider">';

					if ( ! $secretlab['is_active_slider_plugins'] ) {

						echo '';

					} else {
						if ( ! is_search() ) {
							Atiframebuilder_Helpers::get_customized_slider( $prefix );
						}
					}
					echo '</div>';

				}

			} elseif ( '2' === $atiframebuilder_layout[ $prefix . 'header_type' ] ) {

				if ( ! empty( $atiframebuilder_layout[ $prefix . 'header_image' ] ) ) {

					echo '<div class="headerimage">
                        <img src="' . esc_url( $atiframebuilder_layout[ $prefix . 'header_image' ] ) . '">
                    </div>';
				}
			}
		}
	}

	public static function set_header_widget() {
		global $secretlab, $atiframebuilder_layout;
		// Switcher between classic title and built-in blog header
		if ( !empty( $secretlab['header_widget'] ) && class_exists( 'custom_post_widget' ) ) {

			$type   = empty( $secretlab['page_type'] ) ? '' : $secretlab['page_type'];
			$prefix = ( '' === $type ) ? '' : '_';

			$secretlab[ $type . $prefix . 'header_widget' ]              = ( empty( $secretlab[ $type . $prefix . 'header_widget' ] ) ) ? $secretlab['header_widget'] : $secretlab[ $type . $prefix . 'header_widget' ];
			$atiframebuilder_layout[ $type . $prefix . 'header_widget' ] = ( empty( $atiframebuilder_layout[ $type . $prefix . 'header_widget' ] ) ) ? $secretlab[ $type . $prefix . 'header_widget' ] : $atiframebuilder_layout[ $type . $prefix . 'header_widget' ];
			if ( $atiframebuilder_layout[ $type . $prefix . 'header_widget' ] !== - 1 ) {
				ob_start();
				the_widget( 'custom_post_widget',
					array(
						'custom_post_id'        => $atiframebuilder_layout[ $type . $prefix . 'header_widget' ],
						'apply_content_filters' => true,
					),
					array( 'before_widget' => '<div class="header-widget %s">' ) );
				$header = apply_filters( 'atiframebuilder_custom_header', ob_get_contents() );
				ob_end_clean();
				self::$header_widget = Atiframebuilder_Helpers::correct_enqueue_styles_for_widgets( $header );
			}
		}
	}

	public static function set_header_sidebar() {

		global $secretlab, $atiframebuilder_layout;
		$sidebar = '';
		if ( ! isset( $secretlab['sidebar-layout'] ) ) {
			$secretlab['sidebar-layout'] = 1;
		}

		$type   = empty( $secretlab['page_type'] ) ? '' : $secretlab['page_type'];
		$prefix = ( '' === $type ) ? '' : '-';

		$secretlab[ $type . $prefix . 'sidebar-layout' ]        = ( empty( $secretlab[ $type . $prefix . 'sidebar-layout' ] ) ) ? $secretlab['sidebar-layout'] : $secretlab[ $type . $prefix . 'sidebar-layout' ];
		$atiframebuilder_layout[ $type . $prefix . 'sidebar-layout' ] = ( empty( $atiframebuilder_layout[ $type . $prefix . 'sidebar-layout' ] ) ) ? $secretlab[ $type . $prefix . 'sidebar-layout' ] : $atiframebuilder_layout[ $type . $prefix . 'sidebar-layout' ];
		$sl_sidebar_layout                                      = isset( $atiframebuilder_layout[ $secretlab['pagetype_prefix'] . 'sidebar-layout' ] ) ? $atiframebuilder_layout[ $secretlab['pagetype_prefix'] . 'sidebar-layout' ] : '1';

		if ( class_exists( 'ReduxFrameworkPlugin' ) && class_exists( 'KingComposer' ) ) {
			if ( '2' === $sl_sidebar_layout || '3' === $sl_sidebar_layout ) {
				$prefix = ( '' === $type ) ? '' : '_';
				if ( isset( $atiframebuilder_layout[ $type . $prefix . 'left_sidebar_widgets' ] ) ) {
					if ( is_active_sidebar( $atiframebuilder_layout[ $type . $prefix . 'left_sidebar_widgets' ] ) ) {
						ob_start();
                        dynamic_sidebar( $atiframebuilder_layout[ $type . $prefix . 'left_sidebar_widgets' ] );
						$sidebar = ob_get_contents();
						ob_end_clean();
					}
				} else {
					if ( is_active_sidebar( $type . '_default_left_sidebar' ) ) {
						ob_start();
                        dynamic_sidebar( $type . '_default_left_sidebar' );
						$sidebar = ob_get_contents();
						ob_end_clean();
					}
				}
			}
		} else if ( is_active_sidebar( '_default_left_sidebar' ) ) {
			ob_start();
			dynamic_sidebar( '_default_left_sidebar' );
			$sidebar = ob_get_contents();
			ob_end_clean();
		}
		self::$header_sidebar = Atiframebuilder_Helpers::correct_enqueue_styles_for_widgets( $sidebar );
	}

	// header layout
	public static function header_layout() {

		global $secretlab, $atiframebuilder_layout;
		// Switcher between classic title and built-in blog header

		if ( !empty( self::$header_widget )) {

			$type   = empty( $secretlab['page_type'] ) ? '' : $secretlab['page_type'];
			$prefix = ( '' === $type ) ? '' : '_';

			$secretlab[ $type . $prefix . 'header_widget' ]        = ( empty( $secretlab[ $type . $prefix . 'header_widget' ] ) ) ? $secretlab['header_widget'] : $secretlab[ $type . $prefix . 'header_widget' ];
			$atiframebuilder_layout[ $type . $prefix . 'header_widget' ] = ( empty( $atiframebuilder_layout[ $type . $prefix . 'header_widget' ] ) ) ? $secretlab[ $type . $prefix . 'header_widget' ] : $atiframebuilder_layout[ $type . $prefix . 'header_widget' ];
			$position                                              = get_post_meta( $atiframebuilder_layout[ $type . $prefix . 'header_widget' ],
				'header_block_type',
				true );

			if ( 'slmm-below' === $position ) {
				self::set_customized_slider();
			}

			?>
            <div class="secretlab_menuline <?php echo ( isset( $position ) && ! empty( $position ) ) ? $position : 'slmm-above'; ?> default">
				<?php
				if ( ! empty( self::$header_widget ) ) {
                    printf( '%s', self::$header_widget );
				}
				?>
            </div>
			<?php

			if ( $position !== 'slmm-below' ) {
				self::set_customized_slider();
			}

		} else {

			if ( isset( $secretlab['blog-custom-heading'] ) ) {
				if ( $secretlab['blog-custom-heading'] === '2' ) {
				    if ( ! class_exists( 'KingComposer' ) ) {
					    // If theme withoutplugins
					    echo '<div class="header_alt">
                        <div class="topbar">
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-3">
                                    <a href="' . esc_url( home_url( '/' ) ) . '" class="logo">' . esc_html( Atiframebuilder_Theme_Demo::get_theme_name() ) . '</a>
                                    </div>
                                    <div class="col-md-9">
                                    <ul class="topnav" id="myTopnav">';
					    wp_nav_menu( array(
						    'theme_location'  => 'atiframebuilder_top_menu',
						    'container'       => false,
						    'container_id'    => 'myTopnav',
						    'container_class' => 'topnav',
						    'menu_class'      => 'topnav',
                            'fallback_cb' => '__return_empty_string',
						    'depth'      => 2,
						    'items_wrap' => '%3$s',
					    ) );

					    echo '<a href="javascript:void(0);"  class="icon">&#9776;</a>
                                    </ul></div>
                                </div>
                            </div>
                        </div></div>';
				    }
						if ( is_home() ) {
							echo '<header class="custblog">
                                <h1>', get_bloginfo( 'name' ), '</h1>
                                <div class="archive-meta">' . get_bloginfo( 'description' ) . '</div>
                            </header>';
						}
						if ( is_singular() ) {
							echo '<header class="custblog">';
							do_action( 'atiframebuilder_blog_cat_list' );
							echo '<h1 class="entry-title">', get_the_title(), '</h1>
            <div class="entry-meta">';
							do_action( 'atiframebuilder_blog_entry_meta_header' );
							edit_post_link( esc_html__( 'Edit', 'biscon' ),
								'<span class="edit-link"><i></i> ',
								'</span>' );
							echo '</div>
        </header>';
						}

						if ( is_author() ) {
							$post_id        = get_queried_object_id();
							$post_author_id = get_post_field( 'post_author', $post_id );
							$anick          = get_the_author_meta( 'nickname', $post_author_id );
							echo '<header class="custblog">';
							echo '<h1 class="archive-title">' . $anick . '</h1>';
							echo '<div class="archive-meta">' . get_the_author_meta( 'description' ) . '</div>';
							echo '</header>';
						}
						if ( is_category() ) {
							echo '<header class="custblog">';
							echo '<h1 class="archive-title">' . single_cat_title( '', 0 ) . '</h1>';
							if ( category_description() ) {
								echo '<div class="archive-meta">' . category_description() . '</div>';
							}
							echo '</header>';
						}
						if ( is_tag() ) {
							echo '<header class="custblog">';
							echo '<h1 class="archive-title">' . single_cat_title( '', 0 ) . '</h1>';
							if ( tag_description() ) {
								echo '<div class="archive-meta">' . tag_description() . '</div>';
							}
							echo '</header>';
						}
						if ( is_search() ) {
							echo '<header class="custblog">';
							echo '<h1 class="archive-title">';
							printf( esc_html__( 'Search Results for: %s', 'biscon' ), get_search_query() );
							echo '</h1>';
							echo '</header>';
						}
						if ( is_date() ) {
							echo '<header class="custblog">';
							echo '<h1 class="archive-title">';
							printf( esc_html__( 'Archive: %s', 'biscon' ), get_the_date() );
							echo '</h1>';
							echo '</header>';
						}
						if ( is_404() ) {
							echo '<header class="custblog">
                                   <h1>', esc_html__( '404', 'biscon' ), '</h1>
                                </header>
                                </div>';
						}
						if ( function_exists( 'is_woocommerce' ) ) {
							if ( is_woocommerce() ) {
								echo '<header class="custblog"></header></div>';
							}
						}

				} else {

					// If theme without King Composer  or header builder not selected
					if ( ! class_exists( 'KingComposer' ) || isset( $secretlab['header_widget'] ) ) {

						echo '<div class="header_alt">
                        <div class="topbar">
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-3">
                                    <a href="' . esc_url( home_url( '/' ) ) . '" class="logo">' . esc_html( Atiframebuilder_Theme_Demo::get_theme_name() ) . '</a>
                                    </div>
                                    <div class="col-md-9">
                                    <ul class="topnav" id="myTopnav">';
                                wp_nav_menu( array(
                                    'theme_location'  => 'atiframebuilder_top_menu',
                                    'container'       => false,
                                    'container_id'    => 'myTopnav',
                                    'container_class' => 'topnav',
                                    'menu_class'      => 'topnav',
                                    'fallback_cb' => '__return_empty_string',
                                    'depth'      => 2,
                                    'items_wrap' => '%3$s',
                                ) );

                                echo '<a href="javascript:void(0);"  class="icon">&#9776;</a>
                                    </ul></div>
                                </div>
                            </div>
                        </div></div>';
						if ( is_home() ) {
							echo '<header class="custblog">
                                <h1>', get_bloginfo( 'name' ), '</h1>
                                <div class="archive-meta">' . get_bloginfo( 'description' ) . '</div>
                            </header>';
						}

						if ( is_singular() ) {
							echo '<header class="custblog">';
							do_action( 'atiframebuilder_blog_cat_list' );
							echo '<h1 class="entry-title">', get_the_title(), '</h1>
            <div class="entry-meta">';
							do_action( 'atiframebuilder_blog_entry_meta_header' );
							edit_post_link( esc_html__( 'Edit', 'biscon' ),
								'<span class="edit-link"><i></i> ',
								'</span>' );
							echo '</div>
        </header>';
						}

						if ( is_author() ) {
							$post_id        = get_queried_object_id();
							$post_author_id = get_post_field( 'post_author', $post_id );
							$anick          = get_the_author_meta( 'nickname', $post_author_id );
							echo '<header class="custblog">';
							echo '<h1 class="archive-title">' . $anick . '</h1>';
							echo '<div class="archive-meta">' . get_the_author_meta( 'description' ) . '</div>';
							echo '</header>';
						}
						if ( is_category() ) {
							echo '<header class="custblog">';
							echo '<h1 class="archive-title">' . single_cat_title( '', 0 ) . '</h1>';
							if ( category_description() ) {
								echo '<div class="archive-meta">' . category_description() . '</div>';
							}
							echo '</header>';
						}
						if ( is_tag() ) {
							echo '<header class="custblog">';
							echo '<h1 class="archive-title">' . single_cat_title( '', 0 ) . '</h1>';
							if ( tag_description() ) {
								echo '<div class="archive-meta">' . tag_description() . '</div>';
							}
							echo '</header>';
						}
						if ( is_search() ) {
							echo '<header class="custblog">';
							echo '<h1 class="archive-title">';
							printf( esc_html__( 'Search Results for: %s', 'biscon' ), get_search_query() );
							echo '</h1>';
							echo '</header>';
						}
                        if ( is_date() ) {
                            echo '<header class="custblog">';
                            echo '<h1 class="archive-title">';
                            printf( esc_html__( 'Archive: %s', 'biscon' ), get_the_date() );
                            echo '</h1>';
                            echo '</header>';
                        }
						if ( is_404() ) {
							echo '<header class="custblog">
                               <h1>', esc_html__( '404', 'biscon' ), '</h1>
                            </header>
                            </div>';
						}
                        if ( function_exists( 'is_woocommerce' ) ) {
                            if ( is_archive() ) {
                                if ( is_woocommerce() ) {
                                    echo '<header class="custblog"><h1>'.get_the_archive_title().'</h1></header></div>';
                                }
                            }
                        }
					}
				}

			} else {
				if ( ! class_exists( 'KingComposer' )) {
					// If theme without Redux and KC
					echo '<div class="header_alt">
                        <div class="topbar">
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-3">
                                    <a href="' . esc_url( home_url( '/' ) ) . '" class="logo">' . esc_html( Atiframebuilder_Theme_Demo::get_theme_name() ) . '</a>
                                    </div>
                                    <div class="col-md-9">
                                    <ul class="topnav" id="myTopnav">';
					wp_nav_menu( array(
						'theme_location'  => 'atiframebuilder_top_menu',
						'container'       => false,
						'container_id'    => 'myTopnav',
						'container_class' => 'topnav',
						'menu_class'      => 'topnav',
                        'fallback_cb' => '__return_empty_string',
						'depth'      => 2,
						'items_wrap' => '%3$s',
					) );

					echo '<a href="javascript:void(0);"  class="icon">&#9776;</a>
                                    </ul></div>
                                </div>
                            </div>
                        </div></div>';
					if ( is_home() ) {
						echo '<header class="custblog">
                                <h1>', get_bloginfo( 'name' ), '</h1>
                                <div class="archive-meta">' . get_bloginfo( 'description' ) . '</div>
                            </header>';
					}

					if ( is_singular() ) {
						echo '<header class="custblog">';
						do_action( 'atiframebuilder_blog_cat_list' );
						echo '<h1 class="entry-title">', get_the_title(), '</h1>
            <div class="entry-meta">';
						do_action( 'atiframebuilder_blog_entry_meta_header' );
						edit_post_link( esc_html__( 'Edit', 'biscon' ),
							'<span class="edit-link"><i></i> ',
							'</span>' );
						echo '</div>
        </header>';
					}

					if ( is_author() ) {
						$post_id        = get_queried_object_id();
						$post_author_id = get_post_field( 'post_author', $post_id );
						$anick          = get_the_author_meta( 'nickname', $post_author_id );
						echo '<header class="custblog">';
						echo '<h1 class="archive-title">' . $anick . '</h1>';
						echo '<div class="archive-meta">' . get_the_author_meta( 'description' ) . '</div>';
						echo '</header>';
					}
					if ( is_category() ) {
						echo '<header class="custblog">';
						echo '<h1 class="archive-title">' . single_cat_title( '', 0 ) . '</h1>';
						if ( category_description() ) {
							echo '<div class="archive-meta">' . category_description() . '</div>';
						}
						echo '</header>';
					}
					if ( is_tag() ) {
						echo '<header class="custblog">';
						echo '<h1 class="archive-title">' . single_cat_title( '', 0 ) . '</h1>';
						if ( tag_description() ) {
							echo '<div class="archive-meta">' . tag_description() . '</div>';
						}
						echo '</header>';
					}
					if ( is_search() ) {
						echo '<header class="custblog">';
						echo '<h1 class="archive-title">';
						printf( esc_html__( 'Search Results for: %s', 'biscon' ), get_search_query() );
						echo '</h1>';
						echo '</header>';
					}
                    if ( is_date() ) {
                        echo '<header class="custblog">';
                        echo '<h1 class="archive-title">';
                        printf( esc_html__( 'Archive: %s', 'biscon' ), get_the_date() );
                        echo '</h1>';
                        echo '</header>';
                    }
					if ( is_404() ) {
						echo '<header class="custblog">
                               <h1>', esc_html__( '404', 'biscon' ), '</h1>
                            </header>
                            </div>';
					}
                    if ( function_exists( 'is_woocommerce' ) ) {
                        if ( is_archive() ) {
                            if ( is_woocommerce() ) {
                                echo '<header class="custblog"><h1>'.get_the_archive_title().'</h1></header></div>';
                            }
                        }
                    }
				}
            }
		}
		


	}

	// Single post heading
	public static function single_post_heading() {
		global $secretlab;

		if ( isset( $secretlab['blog-custom-heading'] ) ) {
			if ( '1' === $secretlab['blog-custom-heading'] ) {
				echo '<header class="single-heading">';
				    do_action( 'atiframebuilder_layout_entry_header' );
				    echo '<div class="entry-meta">';
				    do_action( 'atiframebuilder_blog_entry_meta_header' );
				    edit_post_link( esc_html__( 'Edit', 'biscon' ),
					'<span class="edit-link"><i></i> ',
					'</span>' );
				    echo '</div>
                    </header>';
			} elseif ('3' === $secretlab['blog-custom-heading']) {
				do_action( 'atiframebuilder_layout_entry_header' );
            }
		} else {
			do_action( 'atiframebuilder_layout_entry_header' );
        }
	}

	// Add a pingback
	public function pingback_header() {
		if ( is_singular() && pings_open() ) {
			echo '<link rel="pingback" href="', esc_url( get_bloginfo( 'pingback_url' ) ), '">';
		}
	}

	public function head_footer_custom_code() {
		global $secretlab;
		if ( isset( $secretlab['footer-nested'] ) ) {
			if ( '1' === $secretlab['footer-nested'] ) {
				if ( isset ( $secretlab['footer-nested-ace-js'] ) ) {
					if ( strlen( $secretlab['footer-nested-ace-js'] ) > 0 && $secretlab['footer-nested-ace-js'] !== 'function hello() { alert ("HELLO"); }' ) {
						wp_add_inline_script( 'atiframebuilder-mainjs', $secretlab['footer-nested-ace-js'] );
					}
				}
			}
		}
		if ( isset( $secretlab['footer-nested'] ) ) {
			if ( '1' === $secretlab['footer-nested'] ) {
				if ( isset( $secretlab['footer-nested-ace-css'] ) ) {
					if ( strlen( $secretlab['footer-nested-ace-css'] ) > 0 && $secretlab['footer-nested-ace-css'] !== 'body { margin : 0; padding : 0; }' ) {
						wp_add_inline_style( 'atiframebuilder-ownstyles', $secretlab['footer-nested-ace-css'] );
					}
				}
			}
		}
	}
}

?>
