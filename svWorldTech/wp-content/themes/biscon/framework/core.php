<?php

define( 'ATIFRAMEBUILDER_FRAMEWORK_PATH', get_template_directory() . '/framework' );

require ATIFRAMEBUILDER_FRAMEWORK_PATH . '/inc/class-config.php';
require ATIFRAMEBUILDER_FRAMEWORK_PATH . '/functions/class-blog.php'; // Functions and layouts for blog
require ATIFRAMEBUILDER_FRAMEWORK_PATH . '/functions/class-helpers.php'; // General Functions of the theme. Under the hood.
require ATIFRAMEBUILDER_FRAMEWORK_PATH . '/functions/class-header.php'; // Functions for header section
require ATIFRAMEBUILDER_FRAMEWORK_PATH . '/functions/class-layout.php'; // General Functions of the theme. Under the hood.
require ATIFRAMEBUILDER_FRAMEWORK_PATH . '/functions/class-woocommerce.php'; // Functions for woocommerce and a cart in menu
require ATIFRAMEBUILDER_FRAMEWORK_PATH . '/functions/class-footer.php'; // Functions for footer section
require ATIFRAMEBUILDER_FRAMEWORK_PATH . '/class-theme-demo.php'; // Theme demos

class Atiframebuilder_Core {

	/**
	 * @var Atiframebuilder_Config
	 */
	
	public $config;

	public $welcomes;

	private $installer;

	private $opt_name;

	public $blog;

	public $helpers;

	public $header;

	public $layout;

	public $woocommerce;

	public $footer;

	private $plugins;

	private $theme;

	private $notices;

	public function __construct( $theme ) {
		global $secretlab;
		
		$this->theme = $theme;

		$this->notices = Atiframebuilder_Theme_Demo::get_notices();

		$this->welcomes = Atiframebuilder_Theme_Demo::get_welcomes();

		if ( ! class_exists( 'KingComposer' ) ) {
			add_action( 'wp_enqueue_scripts', array( $this, 'save_styles' ) );
		}
		
		if ( ! class_exists( 'KingComposer' ) ) {
				add_action( 'wp_enqueue_scripts', array( $this, 'save_css' ) );
		}
		
		if ( ! class_exists( 'WooCommerce' ) ) {
			add_action( 'wp_enqueue_scripts', array( $this, 'star_css' ), 10000 );
		}

		$this->opt_name = 'bisconsellb';

		if ( class_exists( 'Redux' ) ) {
			$this->config = new Atiframebuilder_Config( $this->opt_name );
		}

		// Load all core theme classes
		$this->blog        = new Atiframebuilder_Blog();
		$this->helpers     = new Atiframebuilder_Helpers( $this->opt_name );
		$this->header      = new Atiframebuilder_Header();
		$this->layout      = new Atiframebuilder_Layout();
		$this->woocommerce = new Atiframebuilder_Woocommerce();
		$this->footer      = new Atiframebuilder_Footer();

		/**
		 * SecretLab only works in WordPress 4.7 or later.
		 */

		if ( version_compare( $GLOBALS['wp_version'], '4.7', '<' ) ) {
			require get_template_directory() . '/inc/class-back-compat.php';

			return;
		}

		/** Admin only actions **/
		if ( is_admin() ) {

			// Welcome Page section
			if ( class_exists( 'SECL_Installer' ) ) {
				$this->installer = new SECL_Installer();
				add_action( 'admin_menu', array( $this, 'welcome_screen_page' ) );
				add_action( 'admin_menu', array( $this, 'documentation_screen_page' ) );
			}


			delete_transient( '_redux_activation_redirect' );
			delete_transient( '_wc_activation_redirect' );
			$GLOBALS['redux_notice_check'] = 0;
			update_option( 'revslider-valid-notice', 'false' );
			add_filter( 'wpcf7_autop_or_not', '__return_false' );

			add_filter( 'yikes_easy_mailchimp_extender_use_custom_db', array( $this, 'del_red_mailchamp' ) );

			add_action( 'redux/page/secretlab/form/before', array( $this, 'save_installed' ) );

			require 'inc/class-tgm-plugin-activation.php';

			

			add_action(
				'activate_redux-framework/redux-framework.php',
				array( $this, 'set_default_demo_theme_options' ),
				10
			);

			$this->set_plugins();

			add_action( 'admin_init', array( $this, 'add_kingcomposer_actions' ) );

		} else {

			add_action( 'comment_form', array( $this, 'comment_checkbox' ) );

			add_action( 'pre_comment_on_post', array( $this, 'comment_check' ) );

		}

		add_action( 'widgets_init', array( $this, 'widgets_init' ) );

		// This theme uses its own gallery styles.
		add_filter( 'use_default_gallery_style', '__return_false' );

		/* Fixes quotes in row_inner */
		add_filter( 'no_texturize_shortcodes', array( $this, 'filter_kc_row_inner' ), 10, 1 );
	}

	/**
	 * @return Atiframe_Theme
	 */
	public function get_theme() {
		return $this->theme;
	}

	/**
	 * Register 7 widget areas.
	 */
	public function widgets_init() {
		foreach ( Atiframebuilder_Theme_Demo::get_widgets() as $widget ) {
			register_sidebar(
				$widget
			);
		}

	}

	public function del_red_mailchamp( $custom_db ) {
		update_option( 'yikes_mailchimp_activation_redirect', 'false' );

		return $custom_db;
	}

	public function save_installed() {
		if ( ! empty( $_GET['atiframebuilderfrom'] ) && 'welcome' === $_GET['atiframebuilderfrom'] ) {
			echo '<div class="updated notice my-acf-notice is-dismissible"><p>' . esc_html( $this->get_notice( 'was_installed' ) ) . '</p></div>';
		}
	}

	public function comment_checkbox() {
		echo '<p class="comment-form-ch"><input id="atiframebuilder-ch" name="atiframebuilder_ch" type="checkbox" /></p>';
	}

	public function comment_check( $comment_data ) {
		if ( isset( $_POST['atiframebuilder_ch'] ) ) {
			wp_die();
		} else {
			return $comment_data;
		}
	}

	public function installer() {
		return $this->installer;
	}

	public function blog() {
		return $this->blog;
	}

	public function helpers() {
		return $this->helpers;
	}

	public function header() {
		return $this->header;
	}

	public function layout() {
		return $this->layout;
	}

	public function woocommerce() {
		return $this->woocommerce;
	}

	public function footer() {
		return $this->footer;
	}

	public function set_plugins() {
		// Change plugins list if inctaller is active
		if ( class_exists( 'SECL_Installer' ) ) {
			require ATIFRAMEBUILDER_FRAMEWORK_PATH . '/inc/class-plugins-list.php';
			$this->plugins = new Atiframebuilder_Plugins();
		} else {
			require ATIFRAMEBUILDER_FRAMEWORK_PATH . '/inc/class-plugins-list_f.php';
			$this->plugins = new Atiframebuilder_Plugins_F();
		}
	}

	public function plugins() {
		return $this->plugins;
	}

	public function welcome_screen_page() {
		if ( isset( $this->installer ) ) {
			add_theme_page(
				esc_html( $this->get_welcome( 'welcome' ) ),
				esc_html( $this->get_welcome( 'welcome' ) ),
				'read',
				'welcome',
				array( $this, 'welcome_page' ) );
		}
	}

	public function documentation_screen_page() {
		if ( isset( $this->installer ) ) {
			add_theme_page(
				esc_html( $this->get_welcome( 'documentation' ) ),
				esc_html( $this->get_welcome( 'documentation' ) ),
				'read',
				'welcomedocs',
				array( $this, 'welcome_docs' ) );
		}
	}

	public function welcome_page() {

		require ATIFRAMEBUILDER_FRAMEWORK_PATH . '/inc/class-welcome-page.php';

		$welcome = new Atiframebuilder_Welcome( $this );

		$welcome->render();
	}

	public function welcome_docs() {

		require ATIFRAMEBUILDER_FRAMEWORK_PATH . '/inc/class-welcome-docs.php';

		$welcome = new Atiframebuilder_Docs();

		$welcome->render();

	}

	public function filter_kc_row_inner( $default_no_texturize_shortcodes ) {
		$default_no_texturize_shortcodes[] = 'kc_row_inner';

		return $default_no_texturize_shortcodes;
	}

	public function sliders_message() {
		$sliders = array(
			'LS_Sliders',
			'RevSliderSlider',
			'SmartSlider3',
		);
		$c       = 0;

		foreach ( $sliders as $slider ) {
			if ( class_exists( $slider ) ) {
				$c ++;
			}
		}

		if ( 1 < $c ) {
			echo '<div id="message" class="notice notice-warning is-dismissible">';
			echo '<p>' . esc_html( $this->get_notice( 'sliders_message' ) ) . '</p>';
			echo '<a class="meta_btn" href="' . get_admin_url( null, 'plugins.php' ) . '">' . esc_html( $this->get_notice( 'sliders_plugins' ) ) . '</a>';
			echo '
    </div>';
		} else {
			echo '';
		}
	}

	public function add_kingcomposer_actions() {
		if ( class_exists( 'KingComposer' ) ) {
			add_filter( 'kc_before_instant_save', array( $this, 'save_live_editor_revision' ), 10, 2 );
		}
	}

	public function save_live_editor_revision( $addition_check, $id ) {
		wp_save_post_revision( $id );

		return $addition_check;
	}

	public function save_styles() {
		wp_enqueue_style( 'atiframebuilder-save-fonts',
			Atiframebuilder_Theme_Demo::DEMO_FONT_SRC,
			array(),
			'1.0.0' );


	}

	public function save_css() {
		wp_enqueue_style( 'fontawesome',
			get_template_directory_uri() . '/css/font-awesome.min.css',
			array( 'atiframebuilder-ownstyles' ) );
		wp_enqueue_style( 'atiframebuilder-save-style',
			get_template_directory_uri() . '/css/save.css',
			array( 'atiframebuilder-ownstyles' ) );
	}

	public function star_css() {
		wp_enqueue_style( 'atiframebuilder-star',
			get_template_directory_uri() . '/css/star.css',
			array( 'atiframebuilder-ownstyles' ) );
	}

	public function set_default_demo_theme_options() {
		$options = get_option( $this->opt_name );
		if ( ! empty( $options ) ) {
			return;
		}

		global $wp_filesystem;

		if ( empty( $wp_filesystem ) ) {
			WP_Filesystem();
		}

		$file = get_template_directory() . '/' . 'import/' . Atiframebuilder_Theme_Demo::DEFAULT_DEMO . '/theme_options.json';
		if ( $wp_filesystem->exists( $file ) ) {
			$theme_options = $wp_filesystem->get_contents( $file );
			if ( add_option( $this->opt_name, json_decode( $theme_options, true ) ) ) {
				Atiframebuilder_Helpers::change_action( $theme_options );
			}
		}
	}

	private function get_notice( $key ) {
		return isset( $this->notices[ $key ] ) ? $this->notices[ $key ] : '';
	}

	private function get_welcome( $key ) {
		return isset( $this->welcomes[ $key ] ) ? $this->welcomes[ $key ] : '';
	}
}
