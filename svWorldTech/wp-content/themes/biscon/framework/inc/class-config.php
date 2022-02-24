<?php

/** Theme Options Config File */

if ( ! class_exists( 'Redux' ) ) {
	return;
}

class Atiframebuilder_Config {

	public $opt_name;

	public $sample_patterns_path;

	public $sample_patterns_url;

	public $sample_patterns;

	public $secretlab;

	private static $composer_block_array = array();

	private static $sliders_array = null;

	/**
	 * Atiframebuilder_Config constructor.
	 */
	public function __construct( $opt_name ) {

		// This is your option name where all the Redux data is stored.
		$this->opt_name = $opt_name;

		// Background Patterns Reader
		$this->sample_patterns_path = ReduxFramework::$_dir . '/patterns/';
		$this->sample_patterns_url  = ReduxFramework::$_url . '/patterns/';
		$this->sample_patterns      = array();

		if ( is_dir( $this->sample_patterns_path ) ) {

			if ( $this->sample_patterns_dir = opendir( $this->sample_patterns_path ) ) {
				$this->sample_patterns = array();

				while ( ( $this->sample_patterns_file = readdir( $this->sample_patterns_dir ) ) !== false ) {

					if ( stristr( $this->sample_patterns_file,
							'.png' ) !== false || stristr( $this->sample_patterns_file, '.jpg' ) !== false ) {
						$name                    = explode( '.', $this->sample_patterns_file );
						$name                    = str_replace( '.' . end( $name ), '', $this->sample_patterns_file );
						$this->sample_patterns[] = array(
							'alt' => $name,
							'img' => $this->sample_patterns_url . $this->sample_patterns_file,
						);
					}
				}
			}
		}

		/* ---> SET ARGUMENTS
		* All the possible arguments for Redux.
		* For full documentation on arguments, please refer to: https://github.com/ReduxFramework/ReduxFramework/wiki/Arguments
		* */

		$theme = wp_get_theme(); // For use with some settings. Not necessary.

		$config = Atiframebuilder_Theme_Demo::get_config();

		$config['args']['secretlab_theme_opt_name'] = $this->opt_name;
		$config['args']['display_name'] = $theme->get( 'atiframebuilder-theme' );
		$config['args']['display_version'] = $theme->get( 'Version 1.0' );
		// Choose an priority for the admin bar menu
		$config['args']['global_variable'] = 'secretlab';

		Redux::setArgs( $this->opt_name, $config['args'] );

		foreach ( $config['sections'] as $sections ) {

			/*
			 As of Redux 3.5+, there is an extensive API. This API can be used in a mix/match mode allowing for
			*/

			// -> START General Settings Tab with no subsections
			Redux::setSection( $this->opt_name, $sections);

			/*
			 * <--- END SECTIONS
			 */
		}

		// This example assumes your secretlab_theme_opt_name is set to redux_demo, replace with your secretlab_theme_opt_name value
		add_action( 'redux/page/secretlab/enqueue', array( 'Atiframebuilder_Config', 'add_panel_css' ) );

		add_filter( 'redux/options/secretlab/saved', array( $this, 'set_index_page' ) );

	}

	public static function get_sidebars() {
		$sidebars = array();
		foreach ( $GLOBALS['wp_registered_sidebars'] as $sb ) {
			$sidebars[ $sb['id'] ] = $sb['name'];
		}

		return $sidebars;
	}

	public static function get_sliders_array( $text = '' ) {

		if( null !== self::$sliders_array ){
			return self::$sliders_array;
		}

		global $wpdb;

		$arr = array( 0 => 'none' );

		if ( class_exists( 'LS_Sliders' ) ) {
			$sliders = LS_Sliders::find();
			foreach ( $sliders as $slider ) {
				$arr[ 'lay_' . $slider['id'] ] = $slider['name'];
			}
		}

		if ( class_exists( 'RevSliderSlider' ) ) {
			$RsExists = count( $wpdb->get_results( "SELECT * FROM information_schema.tables WHERE table_schema = '" . $wpdb->dbname . "' AND table_name = '" . $wpdb->prefix . "revslider_sliders' LIMIT 1",
				ARRAY_A ) );
			if ( $RsExists > 0 ) {
				$revSliders = $wpdb->get_results( "SELECT title, alias FROM " . $wpdb->prefix . "revslider_sliders WHERE ( type is NULL OR type = '' )",
					ARRAY_A );
				if ( count( $revSliders ) > 0 ) {
					foreach ( $revSliders as $slider ) {
						$arr[ 'rev_' . $slider['alias'] ] = $slider['title'];
					}
				}
			}
		}

		if ( class_exists( 'SmartSlider3' ) ) {
			$sliders = $wpdb->get_results( "SELECT id, title FROM " . $wpdb->prefix . "nextend2_smartslider3_sliders" );
			if ( ! empty( $sliders ) ) {
				foreach ( $sliders as $slider ) {
					$arr[ 'smart_' . $slider->id ] = $slider->title;
				}
			}
		}

		if ( count( $arr ) === 1 ) {
			$arr = array(
				0 => esc_html( $text ),
			);
		}
		self::$sliders_array = $arr;
		return $arr;
	}

	public static function get_composer_block_array( $type = 'sidebar' ) {

		if( isset( self::$composer_block_array[$type] ) ){
			return self::$composer_block_array[$type];
		}

		global $wpdb;

		$composer_block_array = array();
		if ( 'header' == $type || 'footer' == $type ) {
			$composer_block_array[ - 1 ] = 'None';
		}
		$composer_block_type = 'composer_block_' . $type;

		$query_arr = $wpdb->get_results( $wpdb->prepare( "SELECT pm.`post_id`, wps.`post_title` FROM $wpdb->postmeta pm INNER JOIN $wpdb->posts wps ON pm.post_id=wps.ID WHERE pm.meta_key = 'composer_block_type' AND pm.meta_value = '%s' AND wps.post_status = 'publish'",
			$composer_block_type ) );

		if ( is_array( $query_arr ) ) {
			foreach ( $query_arr as $composer_block_data ) {
				$composer_block_array[ $composer_block_data->post_id ] = $composer_block_data->post_title;
			}
		}
		self::$composer_block_array[$type] = $composer_block_array;
		return $composer_block_array;
	}

	/*=== Adding custom CSS for Theme Options design ===*/
	public static function add_panel_css() {
		wp_register_style(
			'redux-custom-css',
			esc_url( get_template_directory_uri() ) . '/framework/css/redux-custom-css.css',
			array( 'redux-admin-css' ),
			// Be sure to include redux-admin-css so it's appended after the core css is applied
			time(),
			'all'
		);
		wp_enqueue_style( 'redux-custom-css' );
	}

	/* ---> SET ARGUMENTS
	* All the possible arguments for Redux.
	* For full documentation on arguments, please refer to: https://github.com/ReduxFramework/ReduxFramework/wiki/Arguments
	* */

	// Google Api Key
	public static function google_api() {
		global $secretlab;
		$ga_out = '';
		if ( isset( $secretlab['google_api_key_opt'] ) ) {
			$gapikey          = $secretlab['google_api_key_opt'];
			$ga_out = $gapikey;
		}

		return $ga_out;
	}

	public function set_index_page( $var ) {
		if ( class_exists( 'WPCF7_ContactForm' ) ) {
			$forms = get_posts( array( 'posts_per_page' => - 1, 'post_type' => 'wpcf7_contact_form', ) );
			if ( is_array( $forms ) ) {
				foreach ( $forms as $form ) {
					$cont_form = wpcf7_contact_form( $form->ID );
					if ( empty( $cont_form->prop( 'mail' )['recipient'] ) || in_array( $cont_form->prop( 'mail' )['recipient'],
							array( 'info@secretlab.pw', 'spam@atiframe.ru', ) ) ) {
						wpcf7_save_contact_form( array(
							'id'    => $form->ID,
							'mail'  => array( 'recipient' => $var['contacts_email'] ),
							'title' => $form->post_title,
						) );
					}
					if ( ! empty( $var['sender_email'] ) && stripos( $cont_form->mail['sender'],
							'<wordpress@' ) !== false ) {
						wpcf7_save_contact_form( array(
							'id'    => $form->ID,
							'mail'  => array( 'sender' => $var['sender_email'] ),
							'title' => $form->post_title,
						) );
					}
				}
			}
		}
	}
}