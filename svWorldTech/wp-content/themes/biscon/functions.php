<?php

/**
 *  Author: SecretLab
 *  URL: http://secretlab.pw
 *  Custom functions, support and more.
 **/
class Biscon {

	private static $instance = null;

	/**
	 * @var Atiframebuilder_Core
	 */
	private $core;

	/**
	 * Biscon constructor.
	 *
	 * @param Atiframebuilder_Core $core
	 */
	public function __construct() {

		add_action( 'after_setup_theme', array( $this, 'theme_setup' ), 0 );

		if ( ! class_exists( 'Atiframebuilder_Core' ) ) {
			require get_template_directory() . '/framework/core.php';
		}

		$this->core = new Atiframebuilder_Core( $this );
	}

	/**
	 * Theme setup.
	 *
	 * Sets up theme defaults and registers the various WordPress features that
	 * Theme supports.
	 *
	 * @uses load_theme_textdomain() For translation/localization support.
	 * @uses add_editor_style() To add Visual Editor stylesheets.
	 * @uses add_theme_support() To add support for automatic feed links, post
	 * formats, and post thumbnails.
	 * @uses register_nav_menu() To add support for a navigation menu.
	 * @uses set_post_thumbnail_size() To set a custom post thumbnail size.
	 */
	public function theme_setup() {

		/**
		 * Makes The SEO available for translation.
		 * Translations can be added to the /languages/ directory.
		 * If you're building a theme based on SecretLab, use a find and
		 * replace to change 'biscon' to the name of your theme in all
		 * template files.
		 */
		load_theme_textdomain( 'biscon', get_template_directory() . '/languages' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menu( 'atiframebuilder_top_menu', esc_attr__( 'Header Menu', 'biscon' ) );

		/**
		 * This theme styles the visual editor to resemble the theme style,
		 * specifically font, colors, icons, and column width.
		 */
		add_editor_style( array( 'css/editor-style.css', 'genericons/genericons.css' ) );

		// Adds RSS feed links to <head> for posts and comments.
		add_theme_support( 'automatic-feed-links' );

		/**
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/**
		 * Switches default core markup for search form, comment form,
		 * and comments to output valid HTML5.
		 */
		add_theme_support( 'html5', array( 'search-form', 'comment-form', 'comment-list', 'gallery', 'caption' ) );
		/*
			 * This theme supports all available post formats by default.
			 * See https://codex.wordpress.org/Post_Formats
			 */
		add_theme_support( 'post-formats',
			array(
				'audio',
				'gallery',
				'quote',
				'video',
			) );

		/*
		* This theme uses a custom image size for featured images, displayed on
		* "standard" posts and pages.
		*/
		add_theme_support( 'post-thumbnails' );
		set_post_thumbnail_size( 600, 725, true );
		add_image_size( 'atiframebuilder_portfolio', 1170, 9999, true );
		add_image_size( 'atiframebuilder_tiny', 150, 150, true );
		add_image_size( 'atiframebuilder_masonry600', 600, 9999, true );
		add_image_size( 'atiframebuilder_thumb', 600, 600, true );
		add_image_size( 'atiframebuilder_thumb_300', 300, 300, true );
		add_image_size( 'atiframebuilder_long', 1170, 475, true );
		add_image_size( 'atiframebuilder_long650', 1170, 650, true );
		add_image_size( 'atiframebuilder_long750', 1170, 750, true );
		add_image_size( 'atiframebuilder_rectangle', 600, 400, true );
		add_image_size( 'atiframebuilder_rectangle_340', 600, 340, true );
		add_image_size( 'atiframebuilder_rectangle_450', 600, 450, true );
		add_image_size( 'atiframebuilder_rectangle_big', 900, 450, true );
		add_image_size( 'atiframebuilder_masonry', 500, 800, true );
		add_image_size( 'atiframebuilder_longhalf', 585, 270, true );

	}

	/**
	 * gets the instance via lazy initialization (created on first usage)
	 */
	public static function get_instance() {
		if ( null === static::$instance ) {
			static::$instance = new static();
		}

		return static::$instance;
	}

	/**
	 * @return Atiframebuilder_Core
	 */
	public function get_core() {
		return $this->core;
	}
}

if ( ! function_exists( 'wp_body_open' ) ) {
	function wp_body_open() {
		do_action( 'wp_body_open' );
	}
}


global $Biscon;
$Biscon = Biscon::get_instance();
