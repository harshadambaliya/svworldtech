<?php
/**
 * The class contain functions for footer sections.
 */
class Atiframebuilder_Footer {

	private static $footer_widget;

	private static $footer_sidebar;

	/**
	 * Atiframebuilder_Footer constructor.
	 */
	public function __construct() {

		add_action( 'wp_enqueue_scripts', array( 'Atiframebuilder_Footer', 'set_footer_widget' ), 10000 );

		add_action( 'wp_enqueue_scripts', array( 'Atiframebuilder_Footer', 'set_footer_sidebar' ), 10000 );

	    add_action( 'atiframebuilder_footer_set_footer_sidebar_layout', array( 'Atiframebuilder_Footer', 'set_footer_sidebar_layout' ) );

		add_action( 'atiframebuilder_footer_footer', array( 'Atiframebuilder_Footer', 'footer' ) );

		add_action( 'atiframebuilder_footer_footer_close_boxed_layout', array( 'Atiframebuilder_Footer', 'footer_close_boxed_layout' ) );

	}

	public static function set_footer_sidebar_layout() {

		global $secretlab, $atiframebuilder_layout;
		$sl_sidebar_layout = isset( $atiframebuilder_layout[ $secretlab['pagetype_prefix'] . 'sidebar-layout' ] ) ? $atiframebuilder_layout[ $secretlab ['pagetype_prefix'] . 'sidebar-layout' ] : '1';

		echo '	</div><!-- mainsidebar -->';
		if ( class_exists( 'ReduxFrameworkPlugin' ) && class_exists( 'KingComposer' ) ) {
			if ( ! empty ( self::$footer_sidebar ) ) {
				echo '<div class="col-lg-3 col-md-12 col-sm-12 widget-area right_sb animated slideInRight">';
					echo '<div>';
					printf( '%s', self::$footer_sidebar );
					echo '</div>';
				echo '</div>';

			}
			if ( $sl_sidebar_layout !== '1' ) {
				echo '</div><!-- sbcenter -->';
			}
		} else {
			// out of the box
			if ( ! empty ( self::$footer_sidebar ) && is_active_sidebar( '_default_left_sidebar') ) {
				echo '<div class="col-lg-3 col-md-12 col-sm-12 widget-area right_sb animated slideInRight">
                        <div>';
					printf( '%s', self::$footer_sidebar );
				echo '</div>
                			</div><!-- rightsidebar -->';
			} elseif ( ! empty ( self::$footer_sidebar ) ) {
				echo '<div class="col-lg-3 col-md-12 col-sm-12 widget-area right_sb animated slideInRight">
                        <div>';
					printf( '%s', self::$footer_sidebar );
				echo '</div>
                			</div><!-- rightsidebar -->';
			}
			if ( is_active_sidebar( '_default_right_sidebar') || is_active_sidebar( '_default_left_sidebar') ) {
				echo '
				</div><!-- sbcenter -->';
			}
		}
    }

    public static function footer_close_boxed_layout() {
        global $secretlab, $atiframebuilder_layout;
        if ( isset( $atiframebuilder_layout[ $secretlab['design_layout'] ] ) ) {
            if ( '2' === $atiframebuilder_layout[ $secretlab['design_layout'] ] ) {
                echo '</div></div></div>';
            }
        }

    }

	public static function set_footer_widget() {
		global $secretlab, $atiframebuilder_layout;
		if ( isset( $secretlab['footer_widget'] ) && class_exists( 'custom_post_widget' ) ) {
			$prefix = ( '' === $secretlab['page_type'] ) ? '' : '_';
			$secretlab[ $secretlab['page_type'] . $prefix . 'footer_widget' ]        = empty( $secretlab [ $secretlab['page_type'] . $prefix . 'footer_widget' ] ) ? $secretlab['footer_widget'] : $secretlab [ $secretlab ['page_type'] . $prefix . 'footer_widget' ];
			$atiframebuilder_layout[ $secretlab['page_type'] . $prefix . 'footer_widget' ] = empty( $atiframebuilder_layout [ $secretlab['page_type'] . $prefix . 'footer_widget' ] ) ? $secretlab [ $secretlab['page_type'] . $prefix . 'footer_widget' ] : $atiframebuilder_layout[ $secretlab['page_type'] . $prefix . 'footer_widget' ];
			if ( '-1' !== $atiframebuilder_layout[ $secretlab['page_type'] . $prefix . 'footer_widget' ] ) {
				ob_start();
				the_widget(
					'custom_post_widget',
					array(
						'custom_post_id'        => $atiframebuilder_layout[ $secretlab['page_type'] . $prefix . 'footer_widget' ],
						'apply_content_filters' => true,
					),
					array(
						'before_widget' => '<div class="footer-widget %s">',
					)
				);
				$footer = apply_filters( 'atiframebuilder_custom_footer', ob_get_contents() );
				ob_end_clean();
				self::$footer_widget = Atiframebuilder_Helpers::correct_enqueue_styles_for_widgets( $footer );
			}
		}
	}

	public static function set_footer_sidebar() {

		global $secretlab, $atiframebuilder_layout;
		$sidebar = '';
		$sl_sidebar_layout = isset( $atiframebuilder_layout[ $secretlab['pagetype_prefix'] . 'sidebar-layout' ] ) ? $atiframebuilder_layout[ $secretlab ['pagetype_prefix'] . 'sidebar-layout' ] : '1';

		if ( class_exists( 'ReduxFrameworkPlugin' ) && class_exists( 'KingComposer' ) ) {
			if ( '2' === $sl_sidebar_layout || '4' === $sl_sidebar_layout ) {
				$prefix = ( '' === $secretlab['page_type'] ) ? '' : '_';
				if ( isset( $atiframebuilder_layout[ $secretlab['page_type'] . $prefix . 'right_sidebar_widgets' ] ) ) {
					if ( is_active_sidebar( $atiframebuilder_layout[$secretlab['page_type'] . $prefix . 'right_sidebar_widgets'] ) ) {
						ob_start();
						dynamic_sidebar($atiframebuilder_layout[$secretlab['page_type'] . $prefix . 'right_sidebar_widgets']);
						$sidebar = ob_get_contents();
						ob_end_clean();
					}
				}
			}
		} else {
			// out of the box
			if ( is_active_sidebar( '_default_right_sidebar') ) {
				ob_start();
				dynamic_sidebar( '_default_right_sidebar' );
				$sidebar = ob_get_contents();
				ob_end_clean();
			}
		}
		self::$footer_sidebar = Atiframebuilder_Helpers::correct_enqueue_styles_for_widgets( $sidebar );
	}

	/**
	 * Footer
	 */
	public static function footer() {
		if ( ! empty( self::$footer_widget ) ) {
			printf( '%s', self::$footer_widget );
		} else {
            // If theme without plugins
            echo '<div class="footer_alt"><div class="container">&copy; ' , esc_html( date( 'Y' ) ) , '</div></div>';
        }
    }
}

?>
