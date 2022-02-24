<?php

/*
Plugin Name: SecretLab Installer
Plugin URI: https://secretlab.pw/
Description: Imports necessary data and settings for SecretLab Theme
Author: SecretLab
Version: 5.2
Author URI: https://secretlab.pw/
*/

define( 'SECL_INSTALLER_PATH', dirname( __FILE__ ));

class Secret_Setup {

	public $theme_type;
	public $plugins;

	public function __construct() {

		if ( isset( $_POST['op'] ) ) {
			$method = $_POST['op'];

			$this->install_demo_archive();


			if ( 'install_plugins' === $method || 'activate_plugins' === $method ) {
				// Remove else after all theme will be updated
				if ( method_exists( 'Atiframebuilder_Plugins', 'getPlugins' ) ) {
					$this->plugins = Atiframebuilder_Plugins::getPlugins();
				} elseif ( method_exists( 'Secret_Lab_Plugins', 'getPlugins' ) ) {
					$this->plugins = Secret_Lab_Plugins::getPlugins();
				} else {
					$this->plugins = array(
						array(
							'name'     => esc_attr__( 'Redux Framework', 'atiframe-builder' ),
							'slug'     => 'redux-framework',
							'required' => true,
						),
						array(
							'name'     => esc_attr__( 'Caldera Forms', 'magency' ),
							'slug'     => 'caldera-forms',
							'source'       => 'https://secretlab.pw/plu/caldera-forms.zip',
							'external_url' => 'http://secretlab.pw/',
							'required' => true,
						),
						array(
							'name'     => esc_attr__( 'WooCommerce', 'atiframe-builder' ),
							'slug'     => 'woocommerce',
							'required' => false,
						),

						array(
							'name'         => esc_attr__( 'Marketing and SEO Booster', 'atiframe-builder' ),
							'slug'         => 'marketing-and-seo-booster',
							'required'     => true,
						),
						array(
							'name'         => esc_attr__( 'SecretLab Shortcodes', 'atiframe-builder' ),
							'slug'         => 'secretlab_shortcodes',
							'source'       => 'https://secretlab.pw/plu/secretlab_shortcodes.zip',
							'external_url' => 'http://secretlab.pw/',
							'required'     => true,
						),
						array(
							'name'         => esc_attr__( 'KingComposer', 'atiframe-builder' ),
							'slug'         => 'kingcomposer',
							'source'       => 'https://secretlab.pw/plu/kingcomposer.zip',
							'external_url' => 'http://king-theme.com/',
							'required'     => true,
						),
						array(
							'name'         => esc_attr__( 'KC Pro!', 'atiframe-builder' ),
							'slug'         => 'kc_pro',
							'source'       => 'https://secretlab.pw/plu/kc_pro.zip',
							'external_url' => 'http://king-theme.com/',
							'required'     => true,
						),
						array(
							'name'         => esc_attr__( 'Easy Forms for MailChimp', 'atiframe-builder' ),
							'slug'         => 'yikes-inc-easy-mailchimp-extender',
							'external_url' => 'https://www.yikesplugins.com/',
							'required'     => false,
						),
						array(
							'name'         => esc_attr__( 'Revolution Slider', 'atiframe-builder' ),
							'slug'         => 'revslider',
							'source'       => 'https://secretlab.pw/plu/revslider.zip',
							'external_url' => 'http://www.revolution.themepunch.com/',
							'required'     => true,
						),
					);
				}
				echo wp_json_encode( $this->plugins );
			}

			add_filter( 'http_request_timeout', array( &$this, 'bump_request_timeout' ) );
			set_time_limit( 0 );

			WP_Filesystem();
			global $wp_filesystem;
		} else {
			echo esc_html__( 'Wrong request', 'sci' );
			$this->abort();
		}
	}

	public function bump_request_timeout() {
		return 60;
	}

	public function install_plugin() {

		if ( filter_input( INPUT_POST, 'op' ) === 'install_plugin' ) {

			if ( isset( $_POST['i_id'] ) && $_POST['i_id'] == 0 ) {
				delete_transient( 'guard_on_click_setup' );
			}

			$setup_opts = array('i_id' => 0,);

			$opts = array(
				'install_plugin',
				'activate_plugin',
				'import_widgets',
				'set_theme_options_and_icons',
				'set_sliders',
				'import_caldera_forms',
				'technical_refresh',
				'set_post_and_menu_screens',
				'import_sample_data',
				'i_id',
				'install_theme',
				'import_data',
				'import_attachments',
			);

			foreach ( $opts as $opt ) {
				if ( isset( $_POST[$opt] ) ) {
					$setup_opts[$opt] = $_POST[$opt];
				}
			}

//			$setup_opts = array(
//				'install_plugin'              => $_POST['install_plugin'],
//				'activate_plugin'             => $_POST['activate_plugin'],
//				'import_widgets'              => $_POST['import_widgets'],
//				'set_theme_options_and_icons' => $_POST['set_theme_options_and_icons'],
//				'set_sliders'                 => $_POST['set_sliders'],
//				'import_caldera_forms'        => $_POST['import_caldera_forms'],
//				'technical_refresh'           => $_POST['technical_refresh'],
////				'set_types'                   => $_POST['set_types'],
//				'set_post_and_menu_screens'   => $_POST['set_post_and_menu_screens'],
//				'import_sample_data'          => $_POST['import_sample_data'],
//				'i_id'                        => 0,
//				'install_theme'               => $_POST['install_theme'],
//				'import_data'                 => $_POST['import_data'],
//				'import_attachments'          => $_POST['import_attachments'],
//			);

			set_transient( 'guard_on_click_setup', $setup_opts, 60 * 10 );
			$tgm_install      = 1;
			$tgm_is_automatic = false;
			$msg              = esc_attr__( 'Plugins Installed', 'sci' );

		} else if ( $_POST['op'] == 'activate_plugin' ) {
			$tgm_install      = 0;
			$tgm_is_automatic = true;
			$msg              = esc_attr__( 'Plugins Activated', 'sci' );
		}

		if ( isset( $_POST ) && is_array( $_POST ) ) {
			$plugin = $_POST;
			if ( $tgm_install == 1 ) {
				$_GET['plugin']       = $plugin['slug'];
				$_POST['tgm_pass']    = 1;
				$_POST['tgm_install'] = $tgm_install;
				$tgma                 = new TGM_Plugin_Activation();
				$tgma->register( $plugin );
				$tgma->is_automatic = $tgm_is_automatic;
				$tgma->do_plugin_install();
			} else if ( $tgm_install == 0 ) {
				$_POST['tgm_pass'] = 0;
				$tgma              = new TGM_Plugin_Activation();
				$file_path         = $tgma->_get_plugin_basename_from_slug( $plugin['slug'] );
				$tgma->activate_single_plugin( $file_path, $plugin['slug'] );
			}
		} else {
			$msg = esc_attr__( 'No plugins data found', 'sci' );
		}

		echo '___<p><b>' . $msg . '</b></p>___';

	}

	public function abort() {
		delete_transient( 'guard_on_click_setup' );
	}


	public function run() {
		if ( isset( $_POST['theme_type'] ) ) {
			$this->theme_type = $_POST['theme_type'];
		} else {
			if ( class_exists( 'Atiframebuilder_Theme_Demo' ) ) {
				$this->theme_type = Atiframebuilder_Theme_Demo::DEFAULT_DEMO;
			} elseif ( class_exists( 'Secret_Lab_Theme_Demo' ) ) {
				$this->theme_type = Secret_Lab_Theme_Demo::DEFAULT_DEMO;
			} else {
				$this->theme_type = 'full';
			}
		}
		$method = $_POST['op'];
		if ( $method == 'activate_plugin' ) {
			$method = 'install_plugin';
		}
		if ( method_exists( $this, $method ) ) {
			$this->$method();
		} else {
			$setup2 = new SECL_Installer();
			if ( method_exists( $setup2, $method ) ) {
				$setup2->$method();
			} else {
				$this->abort();
			}
		}
	}

	private function install_demo_archive() {
		$installer = new SECL_Installer();
		if ( isset( $_POST['theme_type'] ) ) {
			$theme_type = $_POST['theme_type'];
		} else {
			if ( class_exists( 'Atiframebuilder_Theme_Demo' ) ) {
				$theme_type = Atiframebuilder_Theme_Demo::DEFAULT_DEMO;
			} elseif ( class_exists( 'Secret_Lab_Theme_Demo' ) ) {
				$theme_type = Secret_Lab_Theme_Demo::DEFAULT_DEMO;
			} else {
				$theme_type = 'full';
			}
		}

		try {
			$installer->upload_demo_archive( $theme_type );
			$installer->unzip_demo_data( $theme_type );
		} catch ( Exception $e ) {
			error_log( print_r( $e->getMessage(), true ) );

			return;
		}
	}
}


function guard_theme_setup() {

	$setup = new Secret_Setup();

	$setup->run();

}


add_action( 'wp_ajax_setup_theme', 'guard_theme_setup' );
add_action( 'wp_ajax_nopriv_setup_theme', 'guard_theme_setup' );


class SECL_Installer {

	static $attachments_import_table = 'sl_import_attachments';

	private $wp_filesystem;

	private $wp_http = null;

	private $theme_type;

	private $import_url = 'https://secretlab.pw/import/';

	private $base_url = '';

	public function __construct() {

		global $wp_filesystem;
		if ( empty( $wp_filesystem ) ) {
			require_once( ABSPATH . '/wp-admin/includes/file.php' );
			WP_Filesystem();
		}

		$this->wp_filesystem = $wp_filesystem;

		if ( isset( $_POST['theme_type'] ) ) {
			$this->theme_type = $_POST['theme_type'];
		} else {
			$this->theme_type = 'main';
		}

		add_filter( 'wp_import_post_data_processed', array( $this, 'set_attachment_import_id' ), 10, 2 );
	}

	/**
	 * @return string
	 */
	public function get_theme_type() {
		return $this->theme_type;
	}

	/**
	 * @param string $theme_type
	 */
	public function set_theme_type( $theme_type ) {
		$this->theme_type = $theme_type;
	}

	/**
	 * @return mixed
	 */
	public function get_wp_http() {
		if ( null === $this->wp_http ) {
			$this->wp_http = new WP_Http();
		}

		return $this->wp_http;
	}

	public function set_sliders() {

		global $wpdb;

		if ( class_exists( 'RevSliderSlider' ) ) {
			try {
				$this->upload_demo_archive( $this->theme_type );
				if ( ! $this->wp_filesystem->exists( get_template_directory() . '/import/' . $this->theme_type . '/sliders/rev-slider/' ) ) {
					$this->unzip_demo_data( $this->theme_type );
				}
//				$this->upload_ipmort_file( 'sliders/' . $zip . '.zip' );
//				$this->unzip_sliders( $zip );
			} catch ( Exception $e ) {
				echo $e->getMessage();

				return;
			}

			$installed_sliders = $wpdb->get_col( "SELECT title, alias FROM " . $wpdb->prefix . "revslider_sliders WHERE ( type is NULL OR type = '' )",
				1 );
			$files             = glob( get_template_directory() . '/import/' . $this->theme_type . '/sliders/rev-slider/*.zip' );
			$names             = preg_replace( '/(.+sliders\/rev-slider\/)([^\.]+)(\.zip)/', "\$2", $files );
			$result            = $msg = array();
			$i                 = 0;
			foreach ( $names as $name ) {
				if ( ! in_array( $name, $installed_sliders ) ) {
					$_FILES["import_file"]["tmp_name"] = $files[ $i ];
					if ( class_exists( 'RevSliderSliderImport' ) ) {
						$instance = new RevSliderSliderImport();
						$instance->import_slider();
					} else {
						$instance = new RevSliderSlider();
						$instance->importSliderFromPost();
					}
					$result[] = str_ireplace( '_', ' ', $name );
				} else {
					$msg[] = '<i>' . str_ireplace( '_', ' ', $name ) . '</i>';
				}
				$i ++;
			}
			if ( count( $result ) > 0 ) {
				$result = 'Revolution Sliders ' . implode( ', ', $result ) . ' are imported';
			} else {
				$result = '';
			}
			if ( count( $msg ) > 0 ) {
				$msg = '<br>NOTE: Revolution Sliders ' . implode( ', ', $msg ) . ' already exists';
			} else {
				$msg = '';
			}
			echo '___<p><b>' . $result . '</b>' . $msg . '</p>___';
		}
	}

	public function set_theme_options() {

		try {
			$this->upload_demo_archive( $this->theme_type );
			$file = get_template_directory() . '/import/' . $this->theme_type . '/theme_options.json';
			if ( ! $this->wp_filesystem->exists( $file ) ) {
				$this->unzip_demo_data( $this->theme_type );
			}
//			$this->upload_ipmort_file( 'theme_options.json' );
		} catch ( Exception $e ) {
			echo $e->getMessage();

			return;
		}

		if ( $this->wp_filesystem->exists( $file ) ) {
			$theme_options = $this->wp_filesystem->get_contents( $file );
			$theme_options = preg_replace( '/http.....(digital|digitalpl|digitalpl1).secretlab.pw/',
				site_url(),
				$theme_options );
			if ( update_option( 'secretlab', json_decode( $theme_options, true ) ) ) {
				$msg = '___<p><b>' . esc_attr__( 'Theme Options updated', 'sci' ) . '</b></p>___';
			} else {
				$msg = '___<p><b>' . esc_attr__( 'Error occured while Theme Options importing or you are trying to save the same data',
						'sci' ) . '</b></p>___';
			}
			$options = get_option( 'secretlab' );
			if ( is_array( $options ) ) {
				if ( class_exists( 'Atiframebuilder_Helpers' ) ) {
					Atiframebuilder_Helpers::change_action( $options );
				} elseif ( class_exists( 'Secret_Lab_Helpers' ) ) {
					Secret_Lab_Helpers::change_action( $options );
				}
			}
		} else {
			$msg = '___<p><b>' . esc_attr__( 'There isn\'t file for import', 'sci' ) . '</b></p>___';
		}
		echo $msg;
	}

	public function import_widgets( $echo = true ) {

		try {
			$this->upload_demo_archive( $this->theme_type );
			$file = glob( get_template_directory() . '/import/' . $this->theme_type . '/widgets.json' );
			if ( ! $this->wp_filesystem->exists( $file ) ) {
				$this->unzip_demo_data( $this->theme_type );
			}
//			$this->upload_ipmort_file( 'widgets.json' );
//			$this->upload_ipmort_file( 'widgets.wie' );
		} catch ( Exception $e ) {
			echo $e->getMessage();

			return;
		}

		$file        = $file[0];
		$file_to_use = str_ireplace( '.json', '_to_use.json', $file );
		copy( $file, $file_to_use );
		wie_process_import_file( $file_to_use );

		if ( $echo ) {
			echo '___<p><b>' . esc_attr__( 'Widgets imported', 'sci' ) . '</b></p>___';
		}
	}

	public function set_post_and_menu_screens() {
		$this->set_admin_metaboxes();
		if ( $_POST['data_import'] == 0 ) {
			echo '___<p class="green"><b>' . esc_attr__( 'Theme setup completed', 'sci' ) . '</b></p>___';
		}
	}

//	public function set_types() {
//
//		global $wp_filesystem;
//
//		$_POST['overwrite-settings'] = 1;
//		$_POST['overwrite-groups']   = 1;
//		$_POST['delete-groups']      = 1;
//		$_POST['delete-fields']      = 1;
//		$_POST['delete-types']       = 1;
//		$_POST['delete-tax']         = 1;
//		$_POST['overwrite-fields']   = 1;
//		$_POST['overwrite-types']    = 1;
//		$_POST['overwrite-tax']      = 1;
//		$_POST['post_relationship']  = 1;
//		$_POST['mode']               = 'file';
//		$_POST['import-final']       = 1;
//		$_POST['import']             = 'Import';
//		//require_once WP_PLUGIN_DIR . '/types/embedded/admin.php';
//		//require_once WP_PLUGIN_DIR . '/types/embedded/types.php';
//		//require_once WP_PLUGIN_DIR . '/types/embedded/includes/fields.php';
//		//require_once WP_PLUGIN_DIR . '/types/embedded/includes/import-export.php';
//		$data = $wp_filesystem->get_contents( get_template_directory() . '/import/types_plugin_settings.xml' );
//		wpcf_admin_import_data( $data, false, 'types-auto-import' );
//
//		echo '___<p><b>' . esc_attr__( 'Types Plugin Settings imported', 'sci' ) . '</b></p>___';
//
//	}

	public function import_sample_data() {
		global $wp_import;

		if ( ( isset( $_POST['import_data'] ) && $_POST['import_data'] == 1 ) || $_POST['op'] == 'import_sample_data' ) {

			if ( ! defined( 'WP_LOAD_IMPORTERS' ) ) {
				define( 'WP_LOAD_IMPORTERS', true );
			} // we are loading importers

			if ( ! class_exists( 'WP_Importer' ) ) { // if main importer class doesn't exist
				$wp_importer = ABSPATH . 'wp-admin/includes/class-wp-importer.php';
				include $wp_importer;
			}

			if ( ! class_exists( 'Secretlab_Import' ) ) { // if WP importer doesn't exist
//				$wp_import = SECL_INSTALLER_PATH . '/modules/wordpress-importer/secretlab-importer.php';
//				include $wp_import;
				require SECL_INSTALLER_PATH . '/modules/secretlab-importer/secretlab-importer.php';
			}

			if ( class_exists( 'Secretlab_Import' ) ) {

				$_POST['imported_authors'][0] = 'admin';
				$_POST['imported_authors'][1] = 'wooteam';
				$_POST['use_map'][0]          = 0;
				$_POST['use_map'][1]          = 0;
				$_POST['user_new'][0]         = null;
				$_POST['user_new'][1]         = null;

				$importer                    = new Secretlab_Import();
				$importer->fetch_attachments = false;

				try {
					$this->upload_demo_archive( $this->theme_type );
					$file = get_template_directory() . '/import/' . $this->theme_type . '/demo_data.xml';
					if ( ! $this->wp_filesystem->exists( $file ) ) {
						$this->unzip_demo_data( $this->theme_type );
					}
//					$this->upload_ipmort_file( 'demo_data.xml' );
				} catch ( Exception $e ) {
					echo $e->getMessage();

					return;
				}

				$files = glob( get_template_directory() . '/import/' . $this->theme_type . '/demo_data.xml' );

				$past_files = glob( get_template_directory() . '/import/*inst.xml' );
				if ( count( $past_files ) > 0 ) {
					foreach ( $past_files as $pf ) {
						unlink( $pf );
					}
				}


				foreach ( $files as $file ) {
					$nfn = str_ireplace( '.xml', '_inst.xml', $file );
					if ( copy( $file, $nfn ) ) {
						$object = array(
							'post_title'     => $nfn,
							'post_content'   => $nfn,
							'post_mime_type' => '',
							'guid'           => $nfn,
							'context'        => 'import',
							'post_status'    => 'private',
						);

						$id = wp_insert_attachment( $object, $nfn );
						wp_schedule_single_event( time() + DAY_IN_SECONDS, 'importer_scheduled_cleanup', array( $id ) );

						$_POST['import_id'] = $id;
						$importer->id       = $id;

						ob_start();
						$importer->import( $nfn );
						if ( is_file( $nfn ) ) {
							unlink( $nfn );
						}
						sleep( 2 );
						ob_end_clean();
					}
				}
				echo '___<p class="green"><b>' . esc_attr__( 'Sample data imported', 'sci' ) . '</b></p>___';
			} else {
				echo '___<p class="red"><b>' . esc_attr__( 'There are problems with WP_Import classes, check if "wordpress-importer" plugin is activated',
						'sci' ) . '</b></p>___';
			}
			// Set Front Page
			$homepage = get_post( 549 );
			if ( ( $homepage && $homepage->ID ) ) {
				update_option( 'show_on_front', 'page' );
				update_option( 'page_on_front', $homepage->ID );
			}
			// Finish Import
			delete_transient( 'guard_on_click_setup' );
		}
		$options = get_option( 'secretlab' );
		if ( is_array( $options ) ) {
			if ( ! empty( $options['index-page'] ) ) {
				if ( is_numeric( $options['index-page'] ) ) {
					update_option( 'page_on_front', $options['index-page'] );
				} else {
					$page = get_page_by_path( $options['index-page'], OBJECT, 'page' );
					if ( is_object( $page ) ) {
						update_option( 'page_on_front', $page->ID );
					}
				}
				update_option( 'show_on_front', 'page' );
			}
			if ( class_exists( 'Atiframebuilder_Helpers' ) ) {
				Atiframebuilder_Helpers::change_action( $options );
			} elseif ( class_exists( 'Secret_Lab_Helpers' ) ) {
				Secret_Lab_Helpers::change_action( $options );
			}
		}
	}

	public function get_xml_file() {

		try {
			$this->upload_demo_archive( $this->theme_type );
			$file = glob( get_template_directory() . '/import/' . $this->theme_type . '/demo_data.xml' );
			if ( ! $this->wp_filesystem->exists( $file ) ) {
				$this->unzip_demo_data( $this->theme_type );
			}
//			$this->upload_ipmort_file( 'demo_data.xml' );
		} catch ( Exception $e ) {
			echo $e->getMessage();

			return;
		}

		$file    = $file[0];
		$content = $this->wp_filesystem->get_contents( $file );

		ob_clean();
		echo $content;
	}

	public function get_uploaded_attachments() {
		$uploaded_attachments = get_option( 'guard_uploaded_attachments' );
		if ( isset( $_POST['theme_type'] ) ) {
//			$theme_type = filter_input( INPUT_POST, 'theme_type' );
			$theme_type = $_POST['theme_type'];
		} else {
			if ( class_exists( 'Atiframebuilder_Theme_Demo' ) ) {
				$theme_type = Atiframebuilder_Theme_Demo::DEFAULT_DEMO;
			} elseif ( class_exists( 'Secret_Lab_Theme_Demo' ) ) {
				$theme_type = Secret_Lab_Theme_Demo::DEFAULT_DEMO;
			} else {
				$theme_type = 'full';
			}
		}
		try {
			$this->upload_demo_archive( $theme_type );
			$this->unzip_demo_data( $theme_type );
		} catch ( Exception $e ) {
			error_log( print_r( $e->getMessage(), true ) );
		}
		ob_clean();
		if ( $uploaded_attachments && count( $uploaded_attachments ) > 0 ) {
			echo json_encode( array( 'empty' => 'no', 'content' => array_values( $uploaded_attachments ) ) );
		} else {
			echo json_encode( array( 'empty' => 'yes', 'content' => $uploaded_attachments ) );
		}
	}

	public function attachment_upload() {
		//header($_SERVER['SERVER_PROTOCOL'] . ' 500 Internal Server Error', true, 500);
		$parameters = array(
			'url'               => $_POST['url'],
			'post_title'        => $_POST['title'],
			'link'              => $_POST['link'],
			'pubDate'           => $_POST['pubDate'],
			'post_author'       => $_POST['creator'],
			'guid'              => $_POST['guid'],
			'import_id'         => $_POST['post_id'],
			'post_date'         => $_POST['post_date'],
			'post_date_gmt'     => $_POST['post_date_gmt'],
			'comment_status'    => $_POST['comment_status'],
			'ping_status'       => $_POST['ping_status'],
			'post_name'         => $_POST['post_name'],
			'post_status'       => $_POST['status'],
			'post_parent'       => $_POST['post_parent'],
			'menu_order'        => $_POST['menu_order'],
			'post_type'         => $_POST['post_type'],
			'post_password'     => $_POST['post_password'],
			'is_sticky'         => $_POST['is_sticky'],
			'attribute_author1' => $_POST['author1'],
			'attribute_author2' => $_POST['author2'],
		);

		$remote_url = ! empty( $parameters['attachment_url'] ) ? $parameters['attachment_url'] : $parameters['guid'];

		$result = $this->process_attachment( $parameters, $remote_url );
		ob_clean();
		echo json_encode( $result );

		if ( ! isset( $result['error'] ) && ! isset( $result['fatal'] ) ) {
			$uploaded_attachments = get_option( 'guard_uploaded_attachments' );
			if ( ! is_array( $uploaded_attachments ) ) {
				$uploaded_attachments[] = array();
			}
			$uploaded_attachments[] = $_POST['post_id'];
			if ( is_array( $uploaded_attachments ) ) {
				update_option( 'guard_uploaded_attachments', array_unique( $uploaded_attachments ) );
			}
		}

		die();
	}

	public function process_attachment( $post, $url ) {

		$pre_process = $this->pre_process_attachment( $post, $url );
		if ( is_wp_error( $pre_process ) ) {
			return array(
				'fatal'   => false,
				'type'    => 'error',
				'code'    => $pre_process->get_error_code(),
				'message' => $pre_process->get_error_message(),
				'text'    => sprintf( esc_attr__( '%1$s was not uploaded. (<strong>%2$s</strong>: %3$s)', 'sci' ),
					$post['post_title'],
					$pre_process->get_error_code(),
					$pre_process->get_error_message() ),
			);
		}

		// if the URL is absolute, but does not contain address, then upload it assuming base_site_url
		if ( preg_match( '|^/[\w\W]+$|', $url ) ) {
			$url = rtrim( $this->base_url, '/' ) . $url;
		}

		$upload = $this->fetch_remote_file( $url, $post );
		if ( is_wp_error( $upload ) ) {
			return array(
				'fatal'   => ( $upload->get_error_code() == 'upload_dir_error' && $upload->get_error_message() != 'Invalid file type' ? true : false ),
				'type'    => 'error',
				'code'    => $upload->get_error_code(),
				'message' => $upload->get_error_message(),
				'text'    => sprintf( esc_attr__( '%1$s could not be uploaded because of an error. (<strong>%2$s</strong>: %3$s)',
					'sci' ),
					$post['post_title'],
					$upload->get_error_code(),
					$upload->get_error_message() ),
			);
		}

		if ( $info = wp_check_filetype( $upload['file'] ) ) {
			$post['post_mime_type'] = $info['type'];
		} else {
			$upload = new WP_Error( 'attachment_processing_error', esc_attr__( 'Invalid file type', 'sci' ) );

			return array(
				'fatal'   => false,
				'type'    => 'error',
				'code'    => $upload->get_error_code(),
				'message' => $upload->get_error_message(),
				'text'    => sprintf( esc_attr__( '%1$s could not be uploaded because of an error. (<strong>%2$s</strong>: %3$s)',
					'sci' ),
					$post['post_title'],
					$upload->get_error_code(),
					$upload->get_error_message() ),
			);
		}

		$post['guid'] = $upload['url'];

		// Set author per user options.
		switch ( $post['attribute_author1'] ) {

			case 1: // Attribute to current user.
				$post['post_author'] = (int) wp_get_current_user()->ID;
				break;

			case 2: // Attribute to user in import file.
				if ( ! username_exists( $post['post_author'] ) ) {
					wp_create_user( $post['post_author'], wp_generate_password() );
				}
				$post['post_author'] = (int) username_exists( $post['post_author'] );
				break;

			case 3: // Attribute to selected user.
				$post['post_author'] = (int) $post['attribute_author2'];
				break;

		}

		// as per wp-admin/includes/upload.php
		$post_id = wp_insert_attachment( $post, $upload['file'] );
		wp_update_attachment_metadata( $post_id, wp_generate_attachment_metadata( $post_id, $upload['file'] ) );

		// remap image URL's
		$this->backfill_attachment_urls( $url, $upload['url'] );

		return array(
			'fatal' => false,
			'type'  => 'updated',
			'text'  => sprintf( esc_attr__( '%s was uploaded successfully', 'sci' ), $post['post_title'] ),
		);
	}

	public function pre_process_attachment( $post, $url ) {
		global $wpdb;

		$imported = $wpdb->get_results(
			$wpdb->prepare(
				"
					SELECT ID, post_date_gmt, guid
					FROM $wpdb->posts
					WHERE post_type = 'attachment'
						AND post_title = %s
					",
				$post['post_title']
			)
		);

		if ( $imported ) {
			foreach ( $imported as $attachment ) {
				if ( basename( $url ) == basename( $attachment->guid ) ) {
					if ( $post['post_date_gmt'] == $attachment->post_date_gmt ) {
						$WP_Http = $this->get_wp_http();
						$headers = $WP_Http->head( $url );
						if ( filesize( get_attached_file( $attachment->ID ) ) == $headers['headers']['content-length'] ) {
							return new WP_Error( 'duplicate_file_notice', esc_attr__( 'File already exists', 'sci' ) );
						}
					}
				}
			}
		}

		return false;
	}

	public function backfill_attachment_urls( $from_url, $to_url ) {
		global $wpdb;
		// remap urls in post_content
		$wpdb->query(
			$wpdb->prepare(
				"
						UPDATE {$wpdb->posts}
						SET post_content = REPLACE(post_content, %s, %s)
					",
				$from_url,
				$to_url
			)
		);
		// remap enclosure urls
		$result = $wpdb->query(
			$wpdb->prepare(
				"
						UPDATE {$wpdb->postmeta}
						SET meta_value = REPLACE(meta_value, %s, %s) WHERE meta_key='enclosure'
					",
				$from_url,
				$to_url
			)
		);
	}

	public function fetch_remote_file( $url, $post ) {
		// extract the file name and extension from the url
		$file_name = basename( $url );

		// get placeholder file in the upload dir with a unique, sanitized filename
		$upload = wp_upload_bits( $file_name, 0, '', $post['post_date'] );
		if ( $upload['error'] ) {
			return new WP_Error( 'upload_dir_error', $upload['error'] );
		}

		// fetch the remote url and write it to the placeholder file
		$remote_response = wp_safe_remote_get( $url,
			array(
				'timeout'  => 300,
				'stream'   => true,
				'filename' => $upload['file'],
				'headers'    => array(
					'Accept-Encoding' => 'identity',
				),
			) );

		$headers = wp_remote_retrieve_headers( $remote_response );
		// request failed
		if ( ! $headers ) {
			@unlink( $upload['file'] );

			return new WP_Error( 'import_file_error', __( 'Remote server did not respond', 'attachment-importer' ) );
		}

		$remote_response_code = wp_remote_retrieve_response_code( $remote_response );

		// make sure the fetch was successful
		if ( $remote_response_code != '200' ) {
			@unlink( $upload['file'] );

			return new WP_Error( 'import_file_error',
				sprintf( __( 'Remote server returned error response %1$d %2$s', 'wordpress-importer' ),
					esc_html( $remote_response_code ),
					get_status_header_desc( $remote_response_code ) ) );
		}

		$filesize = filesize( $upload['file'] );

		if ( isset( $headers['content-length'] ) && $filesize != $headers['content-length'] ) {
			@unlink( $upload['file'] );

			return new WP_Error( 'import_file_error', __( 'Remote file is incorrect size', 'attachment-importer' ) );
		}

		if ( 0 == $filesize ) {
			@unlink( $upload['file'] );

			return new WP_Error( 'import_file_error', __( 'Zero size file downloaded', 'attachment-importer' ) );
		}

		return $upload;
	}

	public function set_admin_metaboxes() {
		$post_types_fields = array( 'post', 'page' );
		$user              = wp_get_current_user();
		foreach ( $post_types_fields as $screen_id ) {
			$option = get_user_option( 'metaboxhidden_' . $screen_id );
			if ( is_array( $option ) ) {
				$option = array_diff( $option, array( 'commentstatusdiv' ) );
			} else {
				$option = array(
					'wpb_visual_composer',
					'postexcerpt',
					'trackbacksdiv',
					'postcustom',
					'slugdiv',
					'authordiv',
				);
			}
			$r = update_user_option( $user->ID, 'metaboxhidden_' . $screen_id, $option, true );
		}
		$screen_id = 'nav-menus';
		$option    = get_user_option( 'metaboxhidden_' . $screen_id );
		if ( is_array( $option ) ) {
			$option = array_diff( $option,
				array(
					'add-post-type-testimonial',
					'add-post-type-service',
					'add-post-type-teammate',
					'add-post-type-portfolio',
				) );
		} else {
			$option = array(
				'add-post_format',
				'add-product_cat',
				'add-product_tag',
				'woocommerce_endpoints_nav_link',
			);
		}
		$r = update_user_option( $user->ID, 'metaboxhidden_' . $screen_id, $option, true );


		$option = get_user_option( 'manage' . $screen_id . 'columnshidden' );
		if ( is_array( $option ) ) {
			$option = array_diff( $option, array( 'css-classes' ) );
		} else {
			$option = array( 'title-attribute', 'xfn' );
		}
		$r = update_user_option( $user->ID, 'manage' . $screen_id . 'columnshidden', $option, true );
		if ( $r || 1 == 1 ) {
			echo '___<p><b>' . esc_attr__( 'Post and Menu Screen Settings saved', 'sci' ) . '</b></p>___';
		} //else echo "Error occured while Saving Screen Settings";
	}

	public function welcome_notice() {
		global $wn;

		$max = array(
			"max_execution_time"  => array(
				120,
				ini_get( "max_execution_time" ),
				" 'max_execution_time' " . esc_html__( "parameter on your hosting/server is ### seconds, 120 seconds recommended",
					"sci" ),
			),
			"memory_limit"        => array(
				128,
				intval( ini_get( "memory_limit" ) ),
				" 'memory_limit' " . esc_html__( "parameter on your hosting/server is ### Mb, 128Mb recommended",
					"sci" ),
			),
			"post_max_size"       => array(
				12,
				intval( ini_get( "post_max_size" ) ),
				" 'post_max_size' " . esc_html__( "parameter on your hosting/server is ### Mb, 12Mb recommended",
					"sci" ),
			),
			"upload_max_filesize" => array(
				12,
				intval( ini_get( "upload_max_filesize" ) ),
				" 'upload_max_filesize' " . esc_html__( "parameter on your hosting/server is ### Mb, 12Mb recommended",
					"sci" ),
			),
		);

		$init_msgs = array();
		foreach ( $max as $name => $set ) {
			if ( $set[1] < $set[0] ) {
				$init_msgs[] = str_ireplace( '###', $set[1], $set[2] );
			}
		}

		if ( count( $init_msgs ) > 0 ) {
			$init_msg = '<div id="message" class="notice notice-warning is-dismissible"><p>' . implode( '<br>', $init_msgs ) . '</p></div>';
		} else {
			$init_msg = '';
		}

		$wn['real_capabilities'] = $init_msg;

		$wn['recommended_capabilities'] = '<div class="col-md-4 col-sm-12">

						<h2 class="second">' . esc_html__( 'Server Requirements', 'sci' ) . '</h2>
						<div class="inform">
						<ul>
						<li>' . esc_html( 'max_execution_time 120' ) . '</li>
						<li>' . esc_html( 'memory_limit 128M' ) . '</li>
						<li>' . esc_html( 'post_max_size 12M' ) . '</li>
						<li>' . esc_html( 'upload_max_filesize 12M' ) . '</li>
						<li>' . esc_html( 'allow_url_fopen ON' ) . '</li>
						</ul>
						</div></div>';

		$wn['fail_install'] = '	<div class="col-md-4 col-sm-12">	                
						<h2 class="second">' . esc_html__( 'Fail of installation',
				'sci' ) . '</h2><div class="inform">' .
		                      esc_html__( 'If you got fail of the installation ask your hosting to check error logs',
			                      'sci' ) .
		                      '</div></div>';

	}

	public static function load_plugin_textdomain() {
		load_plugin_textdomain( 'sci', false, dirname( plugin_basename( __FILE__ ) ) . '/languages/' );
	}

//	public static function correct_imported_attaches_list( $id ) {
//		$imported_attaches = get_option( 'guard_uploaded_attachments' );
//		if ( is_array( $imported_attaches ) ) {
//			$imported_attaches = array_diff( $imported_attaches, array( $id ) );
//			update_option( 'guard_uploaded_attachments', $imported_attaches );
//		}
//	}

	public function import_caldera_forms() {
		if ( class_exists( 'Caldera_Forms_Forms' ) ) {
			$msg = $result = array();

			try {
				$this->upload_demo_archive( $this->theme_type );
				if ( ! $this->wp_filesystem->exists( get_template_directory() . '/import/' . $this->theme_type . '/caldera2/' ) ) {
					$this->unzip_demo_data( $this->theme_type );
				}
//				$this->upload_ipmort_file( 'caldera2.zip' );
//				$this->unzip_caldera( 'caldera2' );
			} catch ( Exception $e ) {
				echo $e->getMessage();

				return;
			}
			$files = glob( get_template_directory() . '/' . 'import/' . $this->theme_type . '/caldera2/*.json' );
			if ( ! empty( $files ) ) {
				$forms = Caldera_Forms_Forms::get_forms();
				foreach ( $files as $file ) {
					$new_form = null;
					$form     = json_decode( $this->wp_filesystem->get_contents( $file ), true );
					if ( isset( $form['ID'] ) && ! array_key_exists( $form['ID'], $forms ) ) {
						$new_form = Caldera_Forms_Forms::import_form( $form );
						if ( $new_form ) {
							$result[] = $form['name'];
						}
					} else {
						$msg[] = $form['name'];
					}
				}
			} else {
				echo '___<p><b>' . esc_attr__( 'There isn\'t files for import', 'sci' ) . '</b></p>___';

				return;
			}
			if ( count( $result ) > 0 ) {
				$result = 'Caldera Forms: ' . implode( ', ', $result ) . ' were imported';
			} else {
				$result = '';
			}
			if ( count( $msg ) > 0 ) {
				$msg = '<br>NOTE: Caldera Forms: ' . implode( ', ', $msg ) . ' already exists';
			} else {
				$msg = '';
			}
			echo '___<p><b>' . $result . '</b>' . $msg . '</p>___';
			echo $msg;
		}
	}

	public static function move_attachments_to_begin( $posts ) {
//		$posts = array(0 => array('type' => 'post', 'id' => 1),
//		               1 => array('type' => 'post', 'id' => 2),
//		               2 => array('type' => 'att', 'id' => 3),
//		               3 => array('type' => 'att', 'id' => 4)
//		);
		uasort( $posts, array( 'SECL_Installer', 'attachments_to_begin' ) );

//		print_r($posts);
		return $posts;
	}


	public static function attachments_to_begin( $a, $b ) {
		if ( $a['post_type'] == $b['post_type'] ) {
			return 0;
		}

		return ( $a['post_type'] == 'attachment' ) ? - 1 : 1;
	}

	public function upload_ipmort_file( $file ) {
		if ( file_exists( get_template_directory() . '/import/' . $this->theme_type . '/' . $file ) ) {
			return true;
		}
		$WP_Http = $this->get_wp_http();
		$url     = $this->import_url . $this->theme_type . '/' . $file;
		$headers = $WP_Http->get( $url, array( 'stream' => true, ) );
		if ( is_wp_error( $headers ) ) {
			throw new Exception(
				'___<p class="red"><b>' . sprintf(
					__( 'Remote server did not respond for file:',
						'sci' ) . ' %1$s',
					$this->theme_type . '/' . $file
				) . '</b></p>___'
			);
//			return '___<p class="red"><b>' . __( 'Remote server did not respond',
//					'sci' ) . '</b></p>___';
		}
		// make sure the fetch was successful
		if ( $headers['response']['code'] == '200' ) {
			$installer = $this->wp_filesystem->get_contents( $url );
			$this->wp_filesystem->put_contents( get_template_directory() . '/import/' . $this->theme_type . '/' . $file,
				$installer );
		} else {
			throw new Exception(
				'___<p class="red"><b>' . sprintf(
					__( 'Remote server returned error response %1$d %2$s demo: %3$s',
						'sci' ),
					esc_html( $headers['response']['code'] ),
					get_status_header_desc( $headers['response']['code'] ),
					$this->theme_type
				) . '</b></p>___'
			);
//			return '___<p class="red"><b>' . sprintf( __( 'Remote server returned error response %1$d %2$s',
//					'sci' ),
//					esc_html( $headers['response']['code'] ),
//					get_status_header_desc( $headers['response']['code'] ) ) . '</b></p>___';
		}

		return true;
	}

	public function upload_demo_archive( $file ) {
		$file = $file . '.zip';
		if ( file_exists( get_template_directory() . '/import/' . $file ) ) {
			return true;
		}
		$WP_Http = $this->get_wp_http();
		$url     = $this->import_url . $file;
		$headers = $WP_Http->get( $url, array( 'stream' => true, 'timeout' => 25 ) );
		if ( is_wp_error( $headers ) ) {
			throw new Exception(
				'___<p class="red"><b>' . sprintf(
					__( 'Remote server did not respond for file:',
						'sci' ) . ' %1$s',
					$file
				) . '</b></p>___'
			);
		}
		// make sure the fetch was successful
		if ( $headers['response']['code'] == '200' ) {
			$installer = $this->wp_filesystem->get_contents( $url );
			$this->wp_filesystem->put_contents( get_template_directory() . '/import/' . $file,
				$installer );
		} else {
			throw new Exception(
				'___<p class="red"><b>' . sprintf(
					__( 'Remote server returned error response %1$d %2$s demo: %3$s',
						'sci' ),
					esc_html( $headers['response']['code'] ),
					get_status_header_desc( $headers['response']['code'] ),
					$file
				) . '</b></p>___'
			);
		}

		return true;
	}

//	private function unzip_sliders( $zip_file ) {
//		$from     = get_template_directory() . '/import/' . $this->theme_type . '/sliders/';
//		$to       = str_replace( ABSPATH, $this->wp_filesystem->abspath(), $from ) . $zip_file;
//		$zip_file = $from . $zip_file . '.zip';
//
//		return $this->unzip( $zip_file, $to );
//	}
//
//	private function unzip_caldera( $zip_file ) {
//		$from     = get_template_directory() . '/import/' . $this->theme_type . '/';
//		$to       = str_replace( ABSPATH, $this->wp_filesystem->abspath(), $from ) . $zip_file;
//		$zip_file = $from . $zip_file . '.zip';
//
//		return $this->unzip( $zip_file, $to );
//	}

	public function unzip_demo_data( $zip_file ) {
		$from     = get_template_directory() . '/import/';
		$to       = str_replace( ABSPATH, $this->wp_filesystem->abspath(), $from );
		$zip_file = $from . $zip_file . '.zip';

		return $this->unzip( $zip_file, $to );
	}

	private function unzip( $zip_file, $to ) {
		$unzip = unzip_file( $zip_file, $to );
		if ( is_wp_error( $unzip ) ) {
			throw new Exception( $unzip->get_error_message() );
		}

		return true;
	}

	public function prepeare_full_demo_data() {
		try {
			$this->upload_demo_archive( 'full' );
			$this->unzip_demo_data( 'full' );
		} catch ( Exception $e ) {
			error_log( print_r( $e->getMessage(), true ) );
		}
	}

	public function set_attachment_import_id( $postdata, $post ){
		if ( 'attachment' == $postdata['post_type'] ) {
			$postdata['ID'] = $post['post_id'];
		}
		return $postdata;
	}
}

$modules = array(
	'widget-importer-exporter',
);

if ( ! in_array( 'wordpress-importer.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) {
	$modules[] = 'secretlab-importer';
}

foreach ( $modules as $module ) {
	$module = SECL_INSTALLER_PATH . '/modules/' . $module . '/' . $module . '.php';
	if ( file_exists( $module ) ) {
		require $module;
	}
}

//add_action( 'delete_attachment', array( 'SECL_Installer', 'correct_imported_attaches_list' ), 10, 2 );

add_action( 'plugins_loaded', array( 'SECL_Installer', 'load_plugin_textdomain' ) );

define( 'KC_LICENSE', 'l483kg4m-jxbv-ju7k-or7h-yhgd-q3jl1ec3fqyi' );

add_action( 'init', 'secl_remove_demo_mode_link' );

/*=== Dev mode disable ===*/
function secl_remove_demo_mode_link() { // Be sure to rename this function to something more unique
	if ( class_exists( 'ReduxFrameworkPlugin' ) ) {
		remove_filter( 'plugin_row_meta',
			array( ReduxFrameworkPlugin::get_instance(), 'plugin_metalinks' ),
			null,
			2 );
		remove_action( 'admin_notices', array( ReduxFrameworkPlugin::get_instance(), 'admin_notices' ) );
	}
}

function secl_plugin_activate() {
	if ( add_option( 'secret_lab_demo_files_imported', true ) ) {
		$inst = new SECL_Installer();
		$inst->prepeare_full_demo_data();
	}
}

register_activation_hook( __FILE__, 'secl_plugin_activate' );

function secl_plugin_uninstall() {
	delete_option( 'secret_lab_demo_files_imported' );
}

register_uninstall_hook( __FILE__, 'secl_plugin_uninstall' );

?>
