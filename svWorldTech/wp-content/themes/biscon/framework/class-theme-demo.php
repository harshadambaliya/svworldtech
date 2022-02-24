<?php

class Atiframebuilder_Theme_Demo {

    const THEME_PREFIX = 'biscon';
	const DEFAULT_DEMO = 'demo21';
	const DEFAULT_COLUMN = 1; // Columns
	const DEFAULT_POST_THEMPLATE = 7; // Post template number
	const DEFAULT_ARCHIVE_THEMPLATE = 7; // Blog template number
	const DEFAULT_COMMENT_THEMPLATE = 4; // Comment from view


	const DEMO_FONT_SRC = 'https://fonts.googleapis.com/css?family=Open+Sans:400,600,700|Fira+Sans:900,700,400&subset=latin&display=swap';


	// Colors Presets;


	// Allowed HTML tags for escaping of texts
	const ALLOWED_HTML = array(
		'a'      => array(
			'href'   => array(),
			'title'  => array(),
			'target' => array(),
		),
		'br'     => array(),
		'em'     => array(),
		'strong' => array(),
		'h1'     => array(),
		'h2'     => array(),
		'h3'     => array(),
		'h4'     => array(),
		'h5'     => array(),
		'h6'     => array(),
		'p'      => array(
			'style' => array(),
		),
		'b'      => array(),
		'i'      => array(),
		'u'      => array(),
		'ol'     => array(),
		'ul'     => array(),
		'li'     => array(),
		'code'   => array(),
		'del'    => array(),
	);

	public static function get_theme_name() {
		return __( 'Biscon', 'biscon' );
	}

	public static function get_demos() {
		return array(
			'demo21'       => esc_html__( 'Demo 21: Business Consulting', 'biscon' ),
		);
	}

	public static function get_config() {
		return array(
			'args'     => array(
				// Version that appears at the top of your panel
				'menu_type'            => 'menu',
				//Specify if the admin menu should appear or not. Options: menu or submenu (Under appearance only)
				'allow_sub_menu'       => true,
				// Show the sections below the admin menu item or not
				'menu_title'           => esc_html__( 'Theme Options', 'biscon' ),
				'page_title'           => esc_html__( 'SecretLab Theme Options', 'biscon' ),
				// Set it you want google fonts to update weekly. A google_api_key value is required.
				'google_update_weekly' => true,
                'google_api_key'       => Atiframebuilder_Config::google_api(),
				// Must be defined to add google fonts to the typography module
				'async_typography'     => true,
				// Use a asynchronous font on the front end or font string
				//'disable_google_fonts_link' => true,                    // Disable this in case you want to create your own google fonts loader
				'admin_bar'            => true,
				// Show the panel pages on the admin bar
				'admin_bar_icon'       => 'dashicons-portfolio',
				// Choose an icon for the admin bar menu
				'admin_bar_priority'   => 50,
				// Set a different name for your global variable other than the secretlab_theme_opt_name
				'dev_mode'             => false,
				// Show the time the page took to load, etc
				'update_notice'        => true,
				// If dev_mode is enabled, will notify developer of updated versions available in the GitHub Repo
				'customizer'           => true,
				// Enable basic customizer support
				//'open_expanded'     => true,                    // Allow you to start the panel in an expanded way initially.
				//'disable_save_warn' => true,                    // Disable the save warning when a user changes a field

				// OPTIONAL -> Give you extra features
				'page_priority'        => null,
				// Order where the menu appears in the admin area. If there is any conflict, something will not show. Warning.
				'page_parent'          => 'themes.php',
				// For a full list of options, visit: http://codex.wordpress.org/Function_Reference/add_submenu_page#Parameters
				'page_permissions'     => 'manage_options',
				// Permissions needed to access the options panel.
				'menu_icon'            => '',
				// Specify a custom URL to an icon
				'last_tab'             => '',
				// Force your panel to always open to a specific tab (by id)
				'page_icon'            => 'icon-themes',
				// Icon displayed in the admin panel next to your menu_title
				'page_slug'            => '_sl_theme_options',
				// Page slug used to denote the panel
				'save_defaults'        => true,
				// On load save the defaults to DB before user clicks save or not
				'default_show'         => false,
				// If true, shows the default value next to each field that is not the default value.
				'default_mark'         => '',
				// What to print by the field's title if the value shown is default. Suggested: *
				'show_import_export'   => true,
				// Shows the Import/Export panel when not used as a field.

				// CAREFUL -> These options are for advanced use only
				'transient_time'       => 60 * MINUTE_IN_SECONDS,
				'output'               => true,
				// Global shut-off for dynamic CSS output by the framework. Will also disable google fonts output
				'output_tag'           => true,
				// Allows dynamic CSS to be generated for customizer and google fonts, but stops the dynamic CSS from going to the head
				'footer_credit'        => esc_html__( 'Developed with love by www.SecretLab.pw', 'biscon' ),
				// Disable the footer credit of Redux. Please leave if you can help it.


				'compiler' => true,

				'disable_tracking' => true,

				// HINTS
				'hints'            => array(
					'icon'          => 'el el-question-sign',
					'icon_position' => 'right',
					'icon_color'    => 'lightgray',
					'icon_size'     => 'normal',
					'tip_style'     => array(
						'color'   => 'light',
						'shadow'  => true,
						'rounded' => false,
						'style'   => '',
					),
					'tip_position'  => array(
						'my' => 'top left',
						'at' => 'bottom right',
					),
					'tip_effect'    => array(
						'show' => array(
							'effect'   => 'slide',
							'duration' => '500',
							'event'    => 'mouseover',
						),
						'hide' => array(
							'effect'   => 'slide',
							'duration' => '500',
							'event'    => 'click mouseleave',
						),
					),
				),
				// ADMIN BAR LINKS -> Setup custom links in the admin bar menu as external links.
				'admin_bar_links'  => array(
					array(
						'id'    => 'sl-docs',
						'href'  => 'https://support.secretlab.pw/help-center',
						'title' => esc_html__( 'Documentation', 'biscon' ),
					),
					array(
						'id'    => 'sl-support',
						'href'  => 'https://support.secretlab.pw/',
						'title' => esc_html__( 'Support', 'biscon' ),
					),
					array(
						'id'    => 'sl-extensions',
						'href'  => 'http://secretlab.pw/',
						'title' => esc_html__( 'SecretLab Website', 'biscon' ),
					),
				),
				// Add content after the form.
				'footer_text'      => '<p>' . esc_html__( 'Support Panel: ',
						'biscon' ) . '<a href="https://support.secretlab.pw/help-center" target="_blank">https://support.secretlab.pw/help-center</a></p>',
			),
			'sections' => array(
				array(
					'title'  => esc_html__( 'General Setting', 'biscon' ),
					'id'     => 'general',
					'icon'   => 'el el-home',
					'fields' => array(
						array(
							'id'       => 'homepage',
							'type'     => 'text',
							'class'    => 'hide',
							'readonly' => true,
							'default'  => get_option( 'page_on_front' ),
						),
						array(
							'id'       => 'google_api_key_opt',
							'type'     => 'text',
							'title'    => esc_html__( 'Google API Key', 'biscon' ),
							'subtitle'    => esc_html__( 'You can get a new API key at https://developers.google.com/maps/documentation/javascript/get-api-key',
								'biscon' ),
							'default'  => '',
						),
						array(
							'id'       => 'contacts_email',
							'type'     => 'text',
							'title'    => esc_html__( 'Email for Contact Form 7', 'biscon' ),
							'subtitle'    => esc_html__( 'You can add a specific email address at each form',
								'biscon' ),
							'default'  => '',
						),
						array(
							'id'       => 'sender_email',
							'type'     => 'text',
							'title'    => esc_html__( 'Sender Email for Contact Form 7 Plugin', 'biscon' ),
							'subtitle'    => esc_html__( 'You can add a specific email address at each form',
								'biscon' ),
							'default'  => '',
						),
						array(
							'id'       => 'cases-info2',
							'type'     => 'info',
							'style'    => 'info',
							'title'    => esc_html__( 'Select Homepage', 'biscon' ),
							'subtitle' => wp_kses( __( ' You should select your homepage and blogpage on <a href="/wp-admin/options-reading.php">/wp-admin/options-reading.php</a>', 'biscon' ),
								self::ALLOWED_HTML ),
						),
						array(
							'id'      => 'header_widget',
							'type'    => 'select',
							'title'   => esc_html__( 'Select Header', 'biscon' ),
							'options' => Atiframebuilder_Config::get_composer_block_array( 'header' ),
							'default' => '',
						),

						array(
							'id'       => 'header_type',
							'type'     => 'select',
							'title'    => esc_html__( 'Select Header type', 'biscon' ),
							'options'  => array( 1 => 'Slider', ),
							'default'  => 1,
							'required' => array( 'header_type', '<', '0' ),
						),
						array(
							'id'       => 'pick_slider',
							'type'     => 'select',
							'title'    => esc_html__( 'Select Slider', 'biscon' ),
							'subtitle'    => esc_html__( 'Select slider for header section', 'biscon' ),
							//Must provide key => value(array:title|img) pairs for radio options
							'options'  => Atiframebuilder_Config::get_sliders_array(
								esc_html__( 'The Theme Support Layer Slider, Smart Slider and Slider Revolution, but couldn\'t find it. Install one of the plug-ins to choose the slider to display in the header.',
									'biscon' )
							),
							'default'  => '0',
						),
						array(
							'id'      => 'footer_widget',
							'type'    => 'select',
							'title'   => esc_html__( 'Select Footer', 'biscon' ),
							//Must provide key => value(array:title|img) pairs for radio options
							'options' => Atiframebuilder_Config::get_composer_block_array( 'footer' ),

							'default' => '',
						),
						array(
							'id'      => 'scroll-to-top',
							'type'    => 'switch',
							'title'   => esc_html__( 'Display Scroll to Top Button?', 'biscon' ),
							'default' => true,
						),


						array(
							'id'       => 'pageloader',
							'type'     => 'switch',
							'title'    => esc_html__( 'Display Page Loader', 'biscon' ),
							'subtitle'    => esc_html__( 'Do you want to show page loader, when website is loading?',
								'biscon' ),
							'default'  => true,
							'indent'   => true,
						),

						array(
							'id'       => 'pgl_color_bgr',
							'type'     => 'color_rgba',
							'title'    => esc_html__( 'Select Background Color for Page Loader', 'biscon' ),
							'output'   => array( 'background-color' => '.loaderbgr' ),
							'default'  => array(
								'color' => '#ebf1f6',
								'alpha' => 1,
							),
							'required' => array( 'pageloader', '=', true ),
						),
						array(
							'id'    => 'pgl_color',
							'type'  => 'color_rgba',
							'title' => esc_html__( 'Select Arrow Color for Page Loader', 'biscon' ),

							'default'  => array(
								'color' => '#084b99',
								'alpha' => 1,
							),
							'required' => array( 'pageloader', '=', true ),
						),
					),
				),
				array(
					'title'  => esc_html__( 'Layout', 'biscon' ),
					'id'     => 'design-layout-subsection',
					'icon'   => 'el el-th-large',
					'fields' => array(
						array(
							'id'       => 'single-header',
							'type'     => 'switch',
							'title'    => esc_html__( 'Display Page H1 Heading', 'biscon' ),
							'subtitle'    => esc_html__( 'Do you want to show H1 heading for pages? Usually we display it through drag&drop builder',
								'biscon' ),
							'default'  => false,
							'indent'   => false,
						),
						array(
							'id'            => 'transition',
							'type'          => 'slider',
							'title'         => esc_html__( 'Transition time', 'biscon' ),
							'subtitle'      => esc_html__( 'Select hover effects time in ms', 'biscon' ),
							'desc'          => esc_html__( 'Slider description. Min: 0, max: 1000, step: 5, default value: 600',
								'biscon' ),
							'default'       => 400,
							'min'           => 0,
							'step'          => 5,
							'max'           => 1000,
							'display_value' => 'text',
						),

						array(
							'id'      => 'design-layout',
							'type'    => 'image_select',
							'title'   => esc_html__( 'Select page layout', 'biscon' ),

							//Must provide key => value(array:title|img) pairs for radio options
							'options' => array(
								'1' => array(
									'alt' => esc_attr__('Full width layout', 'biscon' ),
									'img' => get_template_directory_uri() . '/images/framework/full.gif',
								),
								'2' => array(
									'alt' => esc_attr__('Boxed layout, maximum resolution - 1170 px', 'biscon' ),
									'img' => get_template_directory_uri() . '/images/framework/boxed.gif',
								),
							),
							'default' => '1',
						),
						array(
							'id'       => 'boxed-background',
							'type'     => 'background',
							'title'    => esc_html__( 'Background settings for box', 'biscon' ),
							'output'   => array( '.page .mainbgr', ),
							'default'  => array(
								'background-color'      => '#323232',
								'background-repeat'     => 'no-repeat',
								'background-attachment' => 'fixed',
								'background-position'   => 'center center',
								'background-size'       => 'inherit',
							),
							'required' => array( 'design-layout', '=', '2' ),
						),

						array(
							'id'      => 'content-background',
							'type'    => 'background',
							'title'   => esc_html__( 'Background settings for content section', 'biscon' ),
							'output'  => array( '.page main', ),
							'default' => array(
								'background-color'      => '#ffffff',
								'background-repeat'     => 'no-repeat',
								'background-attachment' => 'fixed',
								'background-position'   => 'center center',
								'background-size'       => 'inherit',
								'background-image'      => '',
							),

						),
						array(
							'id'          => 'sidebar-layout',
							'type'        => 'image_select',
							'title'       => esc_html__( 'Select sidebar option', 'biscon' ),
							'description' => esc_html__( 'Default sidebars is Left Sidebar and Right sidebar',
								'biscon' ),

							//Must provide key => value(array:title|img) pairs for radio options
							'options'     => array(
								'1' => array(
									'alt' => esc_attr__('Without sidebar', 'biscon' ),
									'img' => get_template_directory_uri() . '/images/framework/nosidebar.gif',
								),
								'2' => array(
									'alt' => esc_attr__('2 sidebars', 'biscon' ),
									'img' => get_template_directory_uri() . '/images/framework/2sidebars.gif',
								),
								'3' => array(
									'alt' => esc_attr__('Left sidebar', 'biscon' ),
									'img' => get_template_directory_uri() . '/images/framework/leftsidebar.gif',
								),
								'4' => array(
									'alt' => esc_attr__('Right sidebar', 'biscon' ),
									'img' => get_template_directory_uri() . '/images/framework/rightsidebar.gif',
								),
							),
							'default'     => '1',
						),
						array(
							'id'       => 'left_sidebar_widgets',
							'type'     => 'select',
							'title'    => esc_html__( 'Widgets for Left Sidebar', 'biscon' ),
							//Must provide key => value(array:title|img) pairs for radio options
							'options'  => array( '_default_left_sidebar' => 'Left Sidebar', ),
							'default'  => '_default_left_sidebar',
							'required' => array( 'sidebar-layout', '<', '0' ),
						),
						array(
							'id'       => 'right_sidebar_widgets',
							'type'     => 'select',
							'title'    => esc_html__( 'Widgets for Right Sidebar', 'biscon' ),
							//Must provide key => value(array:title|img) pairs for radio options
							'options'  => array( '_default_right_sidebar' => 'Right Sidebar', ),
							'default'  => '_default_right_sidebar',
							'required' => array( 'sidebar-layout', '<', '0' ),
						),


					),
				),
				array(
					'title'  => esc_html__( 'Portfolio', 'biscon' ),
					'id'     => 'services-subsection',
					'icon'   => 'el el-brush',
					'fields' => array(


						array(
							'id'    => 'cases-info1',
							'type'  => 'info',
							'style' => 'info',
							'title' => esc_html__( 'Options for Portfolio Post Type', 'biscon' ),
						),

						array(
							'id'          => 'portfolio_slug',
							'type'        => 'text',
							'title'       => esc_html__( 'URL Slug For Portfolio Post Type', 'biscon' ),
							'description' => wp_kses( __( ' After you change it, go to <a href="options-permalink.php" target="_blank">/wp-admin/options-permalink.php</a> and click "Save Changes" button to activate the URL slug', 'biscon' ),
								self::ALLOWED_HTML ),
							'default'     => 'portfolio',
						),
						array(
							'id'       => 'cases_arch_title',
							'type'     => 'text',
							'title'    => esc_html__( 'Portfolio Page H1 Heading', 'biscon' ),
							'subtitle'    => esc_html__( 'Heading for Portfolio Archive page', 'biscon' ),
							'default'  => 'Case Studies List',
						),
						array(
							'id'       => 'portfolio_arch_desc',
							'type'     => 'editor',
							'title'    => esc_html__( 'Description Text Under H1 Heading', 'biscon' ),
							'subtitle'    => esc_html__( 'Allowed tags: a, img, br, em, strong, h1, h2, h3, h4, h5, h6, p, b, i, u, ol, ul, li, code, del',
								'biscon' ),
							'default'  => 'Some description text here',
						),


					),
				),
				array(
					'title' => esc_html__( 'Color Scheme', 'biscon' ),
					'id'    => 'ocs',
					'desc'  => esc_html__( 'Color scheme of the current design. You can create your own color scheme.',
						'biscon' ),
					'icon'  => 'el el-cog',

					'fields' => array(
						array(
							'id'     => 'colors_info_notice',
							'type'   => 'info',
							'notice' => true,
							'style'  => 'info',
							'icon'   => 'el-icon-info-sign',
							'title'  => esc_html__( 'Note', 'biscon' ),
							'desc'   => esc_html__( 'We recommend to export and save theme options setting before change everything.',
								'biscon' ),
						),
					
						//Section START
						array(
							'id'     => 'general-colors-section-start',
							'type'   => 'section',
							'title'  => esc_html__( 'General Colors', 'biscon' ),
							'indent' => true, // Indent all options below until the next 'section' option is set.
						),
						array(
							'id'       => 'gc1',
							'type'     => 'color_rgba',
							'title'    => esc_html__( 'Major Color', 'biscon' ),
							'default'  => array(
								'color' => '#333d52',
								'alpha' => '1',
							),
							'compiler' => true,
							'output'   => false,
						),
						array(
							'id'       => 'gc1d',
							'type'     => 'color_rgba',
							'title'    => esc_html__( 'Dark Major Color', 'biscon' ),
							'default'  => array(
								'color' => '#333d52',
								'alpha' => '1',
							),
							'compiler' => true,
							'output'   => false,
						),

						array(
							'id'       => 'link',
							'type'     => 'link_color',
							'title'    => esc_html__( 'Links Color Option', 'biscon' ),
							'visited'  => false,  // Disable Visited Color
							'default'  => array(
								'regular' => '#084b99',
								'hover'   => '#333d52',
								'active'  => '#333d52',
							),
							'compiler' => true,
							'output'   => 'a',
						),
						array(
							'id'       => 'gc2',
							'type'     => 'color_rgba',
							'title'    => esc_html__( 'Minor Color', 'biscon' ),
							'default'  => array(
								'color' => '#4d6275',
								'alpha' => '1',
							),
							'compiler' => true,
							'output'   => false,
						),
						array(
							'id'       => 'gc2d',
							'type'     => 'color_rgba',
							'title'    => esc_html__( 'Dark Minor Color', 'biscon' ),
							'default'  => array(
								'color' => '#4d6275',
								'alpha' => '1',
							),
							'compiler' => true,
							'output'   => false,
						),

						array(
							'id'       => 'bgrc',
							'type'     => 'color_rgba',
							'title'    => esc_html__( 'Background Color', 'biscon' ),
							'default'  => array(
								'color' => '#ffffff',
								'alpha' => '1',
							),
							'compiler' => true,
							'output'   => false,
						),

						array(
							'id'     => 'general-colors-section-end',
							'type'   => 'section',
							'indent' => false, // Indent all options below until the next 'section' option is set.
						),
						// Section END


						//Section START
						array(
							'id'     => 'additional-colors-section-start',
							'type'   => 'section',
							'title'  => esc_html__( 'Additional Colors', 'biscon' ),
							'indent' => true, // Indent all options below until the next 'section' option is set.
						),

						array(
							'id'       => 'ac1',
							'type'     => 'color_rgba',
							'title'    => esc_html__( 'Gray Color', 'biscon' ),
							'default'  => array(
								'color' => '#4d6275',
								'alpha' => '1',
							),
							'compiler' => true,
							'output'   => false,
						),
						array(
							'id'       => 'ac1l',
							'type'     => 'color_rgba',
							'title'    => esc_html__( 'Gray Color Light', 'biscon' ),
							'default'  => array(
								'color' => '#4d6275',
								'alpha' => '1',
							),
							'compiler' => true,
							'output'   => false,
						),
						array(
							'id'       => 'ac1d',
							'type'     => 'color_rgba',
							'title'    => esc_html__( 'Gray Color Dark', 'biscon' ),
							'default'  => array(
								'color' => '#4d6275',
								'alpha' => '1',
							),
							'compiler' => true,
							'output'   => false,
						),


						array(
							'id'     => 'additional-colors-section-end',
							'type'   => 'section',
							'indent' => false, // Indent all options below until the next 'section' option is set.
						),
						// Section END

					),

				),
				array(
					'title'  => esc_html__( 'Design', 'biscon' ),
					'id'     => 'design',
					'icon'   => 'el el-tasks',
					'fields' => array(
						array(
							'id'    => 'design-info1',
							'type'  => 'info',
							'style' => 'info',
							'title' => esc_html__( 'Options for major design styles', 'biscon' ),
						),
						array(
							'id'             => 'boxed-padding',
							'type'           => 'spacing',
							'output'         => array( 'body main.boxed-wrapper' ),
							'mode'           => 'padding',
							'units'          => array( 'em', 'px' ),
							'units_extended' => 'false',
							'title'          => esc_html__( 'Padding Option for Boxed Background', 'biscon' ),
							'default'        => array(
								'padding-top'    => '',
								'padding-right'  => '',
								'padding-bottom' => '',
								'padding-left'   => '',
								'units'          => 'px',
							),
						),
						array(
							'id'    => 'design-info2',
							'type'  => 'info',
							'style' => 'info',
							'title' => esc_html__( 'Sidebars design styles', 'biscon' ),
						),
						array(
							'id'       => 'sidebar-bgr',
							'type'     => 'color_rgba',
							'title'    => esc_html__( 'Sidebars Background Color', 'biscon' ),
							'default'  => array(
								'color' => '#ffffff',
								'alpha' => '0',
							),
							'compiler' => true,
							'output'   => false,
						),
						array(
							'id'             => 'sidebar-padding',
							'type'           => 'spacing',
							'output'         => array( 'main .widget-area >div, html .sidebar-type' ),
							'mode'           => 'padding',
							'units'          => array( 'em', 'px' ),
							'units_extended' => 'false',
							'title'          => esc_html__( 'Padding Option for Sidebar', 'biscon' ),
							// DONT TOUCH
							'default'        => array(
								'padding-top'    => '0',
								'padding-right'  => '0',
								'padding-bottom' => '0',
								'padding-left'   => '0',
								'units'          => 'px',
							),
						),
						array(
							'id'     => 'sidebar-border',
							'type'   => 'border',
							'title'  => esc_html__( 'Border Option for Sidebar', 'biscon' ),
							'output' => array( 'main .widget-area >div, html .sidebar-type' ),
							// An array of CSS selectors to apply this font style to

							'default' => array(
								'border-color'  => '',
								'border-style'  => '',
								'border-top'    => '',
								'border-right'  => '',
								'border-bottom' => '',
								'border-left'   => '',
							),
						),
						array(
							'id'            => 'sidebar-border-radius',
							'type'          => 'slider',
							'title'         => esc_html__( 'Border Radius', 'biscon' ),
							'desc'          => esc_html__( 'Select border radius in px. Min: 0, max: 100, step: 1, default value: 0',
								'biscon' ),
							'default'       => '0',
							'min'           => 0,
							'step'          => 1,
							'max'           => 100,
							'display_value' => 'text',
						),

						array(
							'id'             => 'sidebar-width',
							'type'           => 'dimensions',
							'output'         => array( 'main .widget-area, html .sidebar-type' ),
							'units'          => array( 'em', 'px', '%' ),
							// You can specify a unit value. Possible: px, em, %
							'units_extended' => 'true',
							// Allow users to select any type of unit
							'title'          => esc_html__( 'Sidebar Width', 'biscon' ),
							'desc'           => esc_html__( 'Total content zone width is 1170px. If you turn 2 sidebars on, remember about it.',
								'biscon' ),
							'height'         => false,
							'default'        => array(
								'width'  => '320',
							),
						),
						array(
							'id'             => 'content-width',
							'type'           => 'dimensions',
							'output'         => array( 'main .cont-box-area' ),
							'units'          => array( 'em', 'px', '%' ),
							// You can specify a unit value. Possible: px, em, %
							'units_extended' => 'true',
							// Allow users to select any type of unit
							'title'          => esc_html__( 'Content Column Width', 'biscon' ),
							'desc'           => esc_html__( 'Total content zone width is 1170px. If you turn 2 sidebars on, remember about it.',
								'biscon' ),
							'height'         => false,
							'default'        => array(
								'width'  => '850',
							),
						),
						array(
							'id'             => 'content-padding',
							'type'           => 'spacing',
							'output'         => array( 'main .cont-box-area' ),
							'mode'           => 'padding',
							'units'          => array( 'em', 'px' ),
							'units_extended' => 'false',
							'title'          => esc_html__( 'Padding Option for Content Column', 'biscon' ),
							'default'        => array(
								'padding-top'    => '0',
								'padding-right'  => '30',
								'padding-bottom' => '0',
								'padding-left'   => '0',
								'units'          => 'px',
							),
						),


						array(
							'id'    => 'design-info3',
							'type'  => 'info',
							'style' => 'info',
							'title' => esc_html__( 'Buttons design styles', 'biscon' ),
						),
						array(
							'id'             => 'button-padding',
							'type'           => 'spacing',
							'output'         => array( 'main button, main input[type="button"], main input[type="reset"], main input[type="submit"]' ),
							'mode'           => 'padding',
							'units'          => array( 'em', 'px' ),
							'units_extended' => 'false',
							'title'          => esc_html__( 'Padding Option for Buttons', 'biscon' ),
							'default'        => array(
								'padding-top'    => '0',
								'padding-right'  => '40',
								'padding-bottom' => '0',
								'padding-left'   => '40',
								'units'          => 'px',
							),
						),
						array(
							'id'       => 'button-border',
							'type'     => 'border',
							'title'    => esc_html__( 'Border Option for Buttons', 'biscon' ),
							'output'   => array( 'main button, main input[type="button"], main input[type="reset"], main input[type="submit"], main .form-submit input[type="submit"]' ),
							// An array of CSS selectors to apply this font style to
							'compiler' => true,
							'default'  => array(
								'border-color'  => '#084b99',
								'border-style'  => 'solid',
								'border-top'    => '0px',
								'border-right'  => '0px',
								'border-bottom' => '0px',
								'border-left'   => '0px',
							),
						),

						array(
							'id'       => 'button-color',
							'type'     => 'color_rgba',
							'title'    => esc_html__( 'Buttons Background Color', 'biscon' ),
							'default'  => array(
								'color' => '#084b99',
								'alpha' => '1',
							),
							'compiler' => true,
							'output'   => false,

						),
						array(
							'id'       => 'button-text-color',
							'type'     => 'color_rgba',
							'title'    => esc_html__( 'Buttons Text Color', 'biscon' ),
							'default'  => array(
								'color' => '#ffffff',
								'alpha' => '1',
							),
							'compiler' => true,
							'output'   => false,
						),
						array(
							'id'       => 'button-border-hover',
							'type'     => 'border',
							'title'    => esc_html__( 'Border Option for Buttons (hover)', 'biscon' ),
							'output'   => array( 'main button:hover, main input[type="button"]:hover, main input[type="reset"]:hover, main .form-submit input[type="submit"]:hover' ),
							// An array of CSS selectors to apply this font style to
							'compiler' => true,
							'default'  => array(
								'border-color'  => '#084b99',
								'border-style'  => 'solid',
								'border-top'    => '0px',
								'border-right'  => '0px',
								'border-bottom' => '0px',
								'border-left'   => '0px',
							),
						),
						array(
							'id'       => 'button-color-hover',
							'type'     => 'color_rgba',
							'title'    => esc_html__( 'Buttons Background Color (hover)', 'biscon' ),
							'default'  => array(
								'color' => '#084b99',
								'alpha' => '0.5',
							),
							'compiler' => true,
							'output'   => false,
						),
						array(
							'id'       => 'button-text-color-hover',
							'type'     => 'color_rgba',
							'title'    => esc_html__( 'Buttons Text Color (hover)', 'biscon' ),
							'default'  => array(
								'color' => '#ffffff',
								'alpha' => '1',
							),
							'compiler' => true,
							'output'   => false,
						),
						array(
							'id'            => 'button-border-radius',
							'type'          => 'slider',
							'title'         => esc_html__( 'Border Radius for Buttons', 'biscon' ),
							'desc'          => esc_html__( 'Select border radius in px. Min: 0, max: 100, step: 1, default value: 0',
								'biscon' ),
							'default'       => '4',
							'min'           => 0,
							'step'          => 1,
							'max'           => 100,
							'display_value' => 'text',
						),


						array(
							'id'    => 'design-info4',
							'type'  => 'info',
							'style' => 'info',
							'title' => esc_html__( 'Inputs design styles', 'biscon' ),
						),
						array(
							'id'       => 'input-border',
							'type'     => 'border',
							'title'    => esc_html__( 'Border Option for Inputs', 'biscon' ),
							'output'   => array( 'input[type="text"], input[type="email"], input[type="url"], input[type="password"], input[type="search"], input[type="number"], input[type="tel"], input[type="range"], input[type="date"], input[type="month"], input[type="week"], input[type="time"], input[type="datetime"], input[type="datetime-local"], input[type="color"], html body textarea, select.form-control,select,.select2-container a' ),
							// An array of CSS selectors to apply this font style to
							'compiler' => true,
							'default'  => array(
								'border-color'  => '#ebf1f6',
								'border-style'  => 'solid',
								'border-top'    => '1px',
								'border-right'  => '1px',
								'border-bottom' => '1px',
								'border-left'   => '1px',
							),
						),
						array(
							'id'            => 'input-border-radius',
							'type'          => 'slider',
							'output'        => array( 'input[type="text"], input[type="email"], input[type="url"], input[type="password"], input[type="search"], input[type="number"], input[type="tel"], input[type="range"], input[type="date"], input[type="month"], input[type="week"], input[type="time"], input[type="datetime"], input[type="datetime-local"], input[type="color"], textarea' ),
							'compiler'      => true,
							'title'         => esc_html__( 'Border Radius for Inputs', 'biscon' ),
							'desc'          => esc_html__( 'Select border radius in px. Min: 0, max: 100, step: 1, default value: 0',
								'biscon' ),
							'default'       => '5',
							'min'           => 0,
							'step'          => 1,
							'max'           => 100,
							'display_value' => 'text',
						),
						array(
							'id'       => 'input-color',
							'type'     => 'color_rgba',
							'title'    => esc_html__( 'Inputs Background Color', 'biscon' ),
							'default'  => array(
								'color' => '#ebf1f6',
								'alpha' => '1',
							),
							'compiler' => true,
							'output'   => false,
						),
						array(
							'id'       => 'input-text-color',
							'type'     => 'color_rgba',
							'title'    => esc_html__( 'Inputs Text Color', 'biscon' ),
							'default'  => array(
								'color' => '#879bae',
								'alpha' => '1',
							),
							'compiler' => true,
							'output'   => false,
						),


					),
				),
				array(
					'title'  => esc_html__( 'Typography', 'biscon' ),
					'id'     => 'typography',
					'icon'   => 'el el-font',
					'fields' => array(
						array(
							'id'     => 'typography-_info_notice',
							'type'   => 'info',
							'notice' => true,
							'style'  => 'info',
							'icon'   => 'el-icon-info-sign',
							'title'  => esc_html__( 'Note', 'biscon' ),
							'desc'   => esc_html__( 'We recommend to use font pair: one font for body text and one for headings. You can find good font pair on',
									'biscon' ) . ' <a href="http://fontpair.co/" target="_blank">http://fontpair.co/</a>',
						),
						array(
							'id'          => 'typography-body',
							'type'        => 'typography',
							'title'       => esc_html__( 'Body Font', 'biscon' ),
							'subtitle'    => esc_html__( 'Specify the body font properties.', 'biscon' ),
							'font-backup' => true,
							'google'      => true,
							'subsets'     => true,
							'default'     => array(
								'color'       => '#4d6275',
								'font-size'   => '16px',
								'font-family' => 'Open Sans',
								'font-weight' => '400',
								'text-align'  => 'left',
								'line-height' => '27px',
							),
						),
						array(
							'id'             => 'h1-typography',
							'type'           => 'typography',
							'title'          => esc_html__( 'Heading H1 Font', 'biscon' ),
							'subtitle'       => esc_html__( 'Specify the H1 font properties.', 'biscon' ),
							'font-backup'    => true,
							'google'         => true,
							'subsets'        => true,
							'text-transform' => true,
							'default'        => array(
								'color'          => '#333d52',
								'font-weight'    => '900',
								'font-family'    => 'Fira Sans',
								'font-size'      => '52px',
								'line-height'    => '68px',
								'text-transform' => 'capitalize',
								'text-align'     => 'center',
							),
						),

						array(
							'id'             => 'h2-typography',
							'type'           => 'typography',
							'title'          => esc_html__( 'Heading H2 Font', 'biscon' ),
							'subtitle'       => esc_html__( 'Specify the H2 font properties.', 'biscon' ),
							'font-backup'    => true,
							'google'         => true,
							'subsets'        => true,
							'text-transform' => true,
							'default'        => array(
								'color'          => '#333d52',
								'font-weight'    => '900',
								'font-family'    => 'Fira Sans',
								'font-size'      => '48px',
								'line-height'    => '62px',
								'text-transform' => 'capitalize',
								'text-align'     => 'center',
							),
						),
						array(
							'id'             => 'h3-typography',
							'type'           => 'typography',
							'title'          => esc_html__( 'Heading H3 Font', 'biscon' ),
							'subtitle'       => esc_html__( 'Specify the H3 font properties.', 'biscon' ),
							'font-backup'    => true,
							'google'         => true,
							'subsets'        => true,
							'text-transform' => true,
							'default'        => array(
								'color'          => '#333d52',
								'font-weight'    => '900',
								'font-family'    => 'Fira Sans',
								'font-size'      => '32px',
								'line-height'    => '42px',
								'text-transform' => 'capitalize',
								'text-align'     => 'center',
							),
						),

						array(
							'id'             => 'reserved-typography',
							'type'           => 'typography',
							'title'          => esc_html__( 'Reserved Font', 'biscon' ),
							'subtitle'       => esc_html__( 'Connects the font.', 'biscon' ),
							'font-backup'    => false,
							'google'         => true,
							'subsets'        => true,
							'text-transform' => false,
							'text-align'     => false,
							'font-size'      => false,
							'line-height'    => false,
							'color'          => false,
							'default'        => array(
								'font-family' => 'Open Sans',
								'font-weight' => '600',
							),
						),
						array(
							'id'             => 'reserved2-typography',
							'type'           => 'typography',
							'title'          => esc_html__( 'Reserved Font #2', 'biscon' ),
							'subtitle'       => esc_html__( 'Connects the font.', 'biscon' ),
							'font-backup'    => false,
							'google'         => true,
							'subsets'        => true,
							'text-transform' => false,
							'text-align'     => false,
							'font-size'      => false,
							'line-height'    => false,
							'color'          => false,
							'default'        => array(
								'font-family' => 'Open Sans',
								'font-weight' => '700',
							),
						),
						array(
							'id'             => 'reserved3-typography',
							'type'           => 'typography',
							'title'          => esc_html__( 'Reserved Font #3', 'biscon' ),
							'subtitle'       => esc_html__( 'Connects the font.', 'biscon' ),
							'font-backup'    => false,
							'google'         => true,
							'subsets'        => true,
							'text-transform' => false,
							'text-align'     => false,
							'font-size'      => false,
							'line-height'    => false,
							'color'          => false,
							'default'        => array(
								'font-family' => 'Fira Sans',
								'font-weight' => '400',
							),
						),
						array(
							'id'             => 'reserved4-typography',
							'type'           => 'typography',
							'title'          => esc_html__( 'Reserved Font #4', 'biscon' ),
							'subtitle'       => esc_html__( 'Connects the font.', 'biscon' ),
							'font-backup'    => false,
							'google'         => true,
							'subsets'        => true,
							'text-transform' => false,
							'text-align'     => false,
							'font-size'      => false,
							'line-height'    => false,
							'color'          => false,
							'default'        => array(
								'font-family' => '',
								'font-weight' => '',
							),
						),
						array(
							'id'             => 'reserved5-typography',
							'type'           => 'typography',
							'title'          => esc_html__( 'Reserved Font #5', 'biscon' ),
							'subtitle'       => esc_html__( 'Connects the font.', 'biscon' ),
							'font-backup'    => false,
							'google'         => true,
							'subsets'        => true,
							'text-transform' => false,
							'text-align'     => false,
							'font-size'      => false,
							'line-height'    => false,
							'color'          => false,
							'default'        => array(
								'font-family' => '',
								'font-weight' => '',
							),
						),
						array(
							'id'     => 'typography-_info_notice_2',
							'type'   => 'info',
							'notice' => true,
							'style'  => 'info',
							'icon'   => 'el-icon-info-sign',
							'title'  => esc_html__( 'Responsive Default Fonts', 'biscon' ),
							'desc'   => esc_html__( 'Fonts settings for mobile version under width resolution 600px ',
								'biscon' ),
						),
						array(
							'id'          => 'typography-body-m',
							'type'        => 'typography',
							'title'       => esc_html__( 'Body Font', 'biscon' ),
							'subtitle'    => esc_html__( 'Specify the body font properties.', 'biscon' ),
							'font-backup' => true,
							'google'      => true,
							'subsets'     => true,
							'default'     => array(
								'color'       => '#4d6275',
								'font-size'   => '16px',
								'font-family' => 'Open Sans',
								'font-weight' => '400',
								'text-align'  => 'left',
								'line-height' => '26px',
							),
						),
						array(
							'id'             => 'h1-typography-m',
							'type'           => 'typography',
							'title'          => esc_html__( 'Heading H1 Font', 'biscon' ),
							'subtitle'       => esc_html__( 'Specify the H1 font properties.', 'biscon' ),
							'font-backup'    => true,
							'google'         => true,
							'subsets'        => true,
							'text-transform' => true,
							'default'        => array(
								'color'          => '#333d52',
								'font-weight'    => '700',
								'font-family'    => 'Fira Sans',
								'font-size'      => '30px',
								'line-height'    => '40px',
								'text-transform' => 'capitalize',
								'text-align'     => 'center',
							),
						),

					),
				),
				array(
					'title'  => esc_html__( 'Translate', 'biscon' ),
					'id'     => 'translate',
					'icon'   => 'el el-list-alt',
					'fields' => array(
						array(
							'id'    => '404-info1',
							'type'  => 'info',
							'style' => 'info',
							'title' => esc_html__( 'Text for 404 error page', 'biscon' ),
						),
						array(
							'id'      => '404_title',
							'type'    => 'text',
							'title'   => esc_html__( '404 Page Heading', 'biscon' ),
							'default' => esc_html__( 'Not Found', 'biscon' ),
						),
						array(
							'id'      => '404_descr',
							'type'    => 'text',
							'title'   => esc_html__( '404 Page Description', 'biscon' ),
							'default' => esc_html__( 'It looks like nothing was found at this location. Maybe try a search?',
								'biscon' ),
						),
						array(
							'id'    => '404_icon',
							'type'  => 'media',
							'url'   => true,
							'title' => esc_html__( 'Icon On 404 Error Page', 'biscon' ),

							'default' => array(
								'url' => 'https://demo21.atiframe.com/wp-content/uploads/2020/05/Oops_-1.jpg',
							),
						),
					),
				),
				array(
					'title'  => esc_html__( 'Custom CSS/JS', 'biscon' ),
					'id'     => 'custom_settings',
					'desc'   => esc_html__( 'Your settings for customization', 'biscon' ),
					'icon'   => 'el el-file-edit',
					'fields' => array(


						array(
							'id'       => 'header-nested',
							'type'     => 'switch',
							'title'    => esc_html__( 'Header Section JS, CSS editors', 'biscon' ),
							'subtitle'    => esc_html__( 'Click On to choice of editors to appear.', 'biscon' ),
							'default'  => false,
						),
						array(
							'id'       => 'header-nested-buttonset',
							'type'     => 'button_set',
							'subtitle'    => esc_html__( 'This code will appear in the HEADER secrion of the site',
								'biscon' ),
							'options'  => array(
								'button-js'  => 'JS editor',
								'button-css' => 'CSS editor',
							),
							'required' => array( 'header-nested', '=', true ),
							'default'  => 'button-js',
						),

						array(
							'id'       => 'header-nested-ace-js',
							'type'     => 'ace_editor',
							'mode'     => 'javascript',
							'title'    => esc_html__( 'JS Editor', 'biscon' ),
							'default'  => '// function hello() { alert ("HELLO"); }',
							'required' => array( 'header-nested-buttonset', '=', 'button-js' ),
						),

						array(
							'id'       => 'header-nested-ace-css',
							'type'     => 'ace_editor',
							'mode'     => 'css',
							'title'    => esc_html__( 'CSS Editor', 'biscon' ),
							'default'  => 'body { margin : 0; padding : 0; }',
							'required' => array( 'header-nested-buttonset', '=', 'button-css' ),
						),

						array(
							'id'       => 'footer-nested',
							'type'     => 'switch',
							'title'    => esc_html__( 'Footer Section JS, CSS editors', 'biscon' ),
							'subtitle'    => esc_html__( 'Click On to choice of editors to appear.', 'biscon' ),
							'default'  => false,
						),
						array(
							'id'       => 'footer-nested-buttonset',
							'type'     => 'button_set',
							'subtitle'    => esc_html__( 'This code will appear in the FOOTER secrion of the site',
								'biscon' ),
							'options'  => array(
								'button-js'  => 'JS editor',
								'button-css' => 'CSS editor',
							),
							'required' => array( 'footer-nested', '=', true ),
							'default'  => 'button-js',
						),

						array(
							'id'       => 'footer-nested-ace-js',
							'type'     => 'ace_editor',
							'mode'     => 'javascript',
							'title'    => esc_html__( 'JS Editor', 'biscon' ),
							'default'  => 'function hello() { alert ("HELLO"); }',
							'required' => array( 'footer-nested-buttonset', '=', 'button-js' ),
						),

						array(
							'id'       => 'footer-nested-ace-css',
							'type'     => 'ace_editor',
							'mode'     => 'css',
							'title'    => esc_html__( 'CSS Editor', 'biscon' ),
							'default'  => 'body { margin : 0; padding : 0; }',
							'required' => array( 'footer-nested-buttonset', '=', 'button-css' ),
						),
					),
				),
				array(
					'title'  => esc_html__( 'Shop', 'biscon' ),
					'id'     => 'shop-setting',
					'icon'   => 'el el-shopping-cart',
					'fields' => array(
						array(
							'id'       => 'shop-header_type',
							'type'     => 'select',
							'title'    => esc_html__( 'Choose Header type', 'biscon' ),
							'options'  => array( 1 => 'Slider', ),
							'default'  => 1,
							'required' => array( 'header_type', '<', '0' ),
						),

						array(
							'id'       => 'shop-pick_slider',
							'type'     => 'select',
							'title'    => esc_html__( 'Select Slider for Shop', 'biscon' ),
							'subtitle'    => esc_html__( 'Select slider for header section', 'biscon' ),
							'options'  => Atiframebuilder_Config::get_sliders_array(
								esc_html__( 'The Theme Support Layer Slider, Smart Slider and Slider Revolution, but couldn\'t find it. Install one of the plug-ins to choose the slider to display in the header.',
									'biscon' )
							),
							'default'  => '0',
						),
						array(
							'id'       => 'shop1',
							'type'     => 'color_rgba',
							'title'    => esc_html__( 'Price Color', 'biscon' ),
							'default'  => array(
								'color' => '#ce0000',
								'alpha' => '1',
							),
							'compiler' => true,
							'output'   => false,
						),

						array(
							'id'       => 'product_columns',
							'type'     => 'text',
							'title'    => esc_html__( 'Columns of Products', 'biscon' ),
							'subtitle'    => esc_html__( 'For catalog and categories pages', 'biscon' ),
							'default'  => '4',
						),
						array(
							'id'       => 'relates_product_products',
							'type'     => 'text',
							'title'    => esc_html__( 'Related Products to show', 'biscon' ),
							'subtitle'    => esc_html__( 'For product page', 'biscon' ),
							'default'  => '4',
						),
						array(
							'id'       => 'relates_product_columns',
							'type'     => 'text',
							'title'    => esc_html__( 'Columns of related products', 'biscon' ),
							'subtitle'    => esc_html__( 'For product page', 'biscon' ),
							'default'  => '4',
						),

						array(
							'id'       => 'shop-layout',
							'type'     => 'image_select',
							'title'    => esc_html__( 'Select shop page layout', 'biscon' ),
							'subtitle'    => esc_html__( 'The option work for slug /shop/', 'biscon' ),
							//Must provide key => value(array:title|img) pairs for radio options
							'options'  => array(
								'1' => array(
									'alt' => esc_attr__('Full width layout', 'biscon' ),
									'img' => get_template_directory_uri() . '/images/framework/full.gif',
								),
								'2' => array(
									'alt' => esc_attr__('Boxed layout, maximum resolution - 1170 px', 'biscon' ),
									'img' => get_template_directory_uri() . '/images/framework/boxed.gif',
								),
							),
							'default'  => '1',
						),
						array(
							'id'       => 'shop-boxed-background',
							'type'     => 'background',
							'title'    => esc_html__( 'Background settings for box', 'biscon' ),
							'output'   => array( '.woocommerce-page .mainbgr', ),
							'default'  => array(
								'background-color'      => '#323232',
								'background-repeat'     => 'no-repeat',
								'background-attachment' => 'fixed',
								'background-position'   => 'center center',
								'background-size'       => 'inherit',
							),
							'required' => array( 'shop-layout', '=', '2' ),
						),
						array(
							'id'      => 'shop-content-background',
							'type'    => 'background',
							'title'   => esc_html__( 'Background settings for content section', 'biscon' ),
							'output'  => array( '.woocommerce-page main' ),
							'default' => array(
								'background-color'      => '#ffffff',
								'background-repeat'     => 'no-repeat',
								'background-attachment' => 'fixed',
								'background-position'   => 'center center',
								'background-size'       => 'inherit',
							),
						),

						array(
							'id'      => 'shop-sidebar-layout',
							'type'    => 'image_select',
							'title'   => esc_html__( 'Select sidebar option for shop', 'biscon' ),

							//Must provide key => value(array:title|img) pairs for radio options
							'options' => array(
								'1' => array(
									'alt' => esc_attr__('Without sidebar', 'biscon' ),
									'img' => get_template_directory_uri() . '/images/framework/nosidebar.gif',
								),
								'2' => array(
									'alt' => esc_attr__('2 sidebars', 'biscon' ),
									'img' => get_template_directory_uri() . '/images/framework/2sidebars.gif',
								),
								'3' => array(
									'alt' => esc_attr__('Left sidebar', 'biscon' ),
									'img' => get_template_directory_uri() . '/images/framework/leftsidebar.gif',
								),
								'4' => array(
									'alt' => esc_attr__('Right sidebar', 'biscon' ),
									'img' => get_template_directory_uri() . '/images/framework/rightsidebar.gif',
								),
							),
							'default' => '0',
						),
						array(
							'id'       => 'shop_left_sidebar_widgets',
							'type'     => 'select',
							'title'    => esc_html__( 'Widgets for Shop Left Sidebar', 'biscon' ),
							//Must provide key => value(array:title|img) pairs for radio options
							'options'  => array( 'shop_default_left_sidebar' => 'Left Shop Sidebar', ),
							'default'  => 'shop_default_left_sidebar',
							'required' => array( 'shop-sidebar-layout', '<', '0' ),
						),
						array(
							'id'       => 'shop_right_sidebar_widgets',
							'type'     => 'select',
							'title'    => esc_html__( 'Widgets for Shop Right Sidebar', 'biscon' ),
							//Must provide key => value(array:title|img) pairs for radio options
							'options'  => array( 'shop_default_right_sidebar' => 'Right Shop Sidebar', ),
							'default'  => 'shop_default_right_sidebar',
							'required' => array( 'shop-sidebar-layout', '<', '0' ),
						),

						array(
							'id'      => 'shop_header_widget',
							'type'    => 'select',
							'title'   => esc_html__( 'Select Header for Shop', 'biscon' ),
							//Must provide key => value(array:title|img) pairs for radio options
							'options' => Atiframebuilder_Config::get_composer_block_array( 'header' ),
							'default' => '1833',
						),


						array(
							'id'      => 'shop_footer_widget',
							'type'    => 'select',
							'title'   => esc_html__( 'Select Footer for Shop', 'biscon' ),
							//Must provide key => value(array:title|img) pairs for radio options
							'options' => Atiframebuilder_Config::get_composer_block_array( 'footer' ),
							'default' => '1848',
						),
						array(
							'id'      => 'woocomp',
							'type'    => 'switch',
							'title'   => esc_html__( 'Enable company field in checkout', 'biscon' ),
							'default' => true,
						),
						array(
							'id'      => 'wooadd1',
							'type'    => 'switch',
							'title'   => esc_html__( 'Enable address 1 field in checkout', 'biscon' ),
							'default' => true,
						),
						array(
							'id'      => 'wooadd2',
							'type'    => 'switch',
							'title'   => esc_html__( 'Enable address 2 field in checkout', 'biscon' ),
							'default' => true,
						),
						array(
							'id'      => 'woostate',
							'type'    => 'switch',
							'title'   => esc_html__( 'Enable state field in checkout', 'biscon' ),
							'default' => true,
						),
						array(
							'id'      => 'woocity',
							'type'    => 'switch',
							'title'   => esc_html__( 'Enable city field in checkout', 'biscon' ),
							'default' => true,
						),
						array(
							'id'      => 'woophone',
							'type'    => 'switch',
							'title'   => esc_html__( 'Enable phone field in checkout', 'biscon' ),
							'default' => true,
						),
						array(
							'id'      => 'woopostcode',
							'type'    => 'switch',
							'title'   => esc_html__( 'Enable postcode field in checkout', 'biscon' ),
							'default' => true,
						),
						array(
							'id'      => 'woocountry',
							'type'    => 'switch',
							'title'   => esc_html__( 'Enable country field in checkout', 'biscon' ),
							'default' => true,
						),

					),
				),
				array(
					'title'  => esc_html__( 'Blog', 'biscon' ),
					'id'     => 'blog-setting',
					'icon'   => 'el el-blogger',
					'fields' => array(
						

						array(
							'id'       => 'blog-sidebar-layout',
							'type'     => 'image_select',
							'title'    => esc_html__( 'Choose sidebar option for blog', 'biscon' ),
							'subtitle'    => esc_html__( 'The option work for POST post type', 'biscon' ),
							//Must provide key => value(array:title|img) pairs for radio options
							'options'  => array(
								'1' => array(
									'alt' => esc_attr__('Without sidebar', 'biscon' ),
									'img' => get_template_directory_uri() . '/images/framework/nosidebar.gif',
								),
								'2' => array(
									'alt' => esc_attr__('2 sidebars', 'biscon' ),
									'img' => get_template_directory_uri() . '/images/framework/2sidebars.gif',
								),
								'3' => array(
									'alt' => esc_attr__('Left sidebar', 'biscon' ),
									'img' => get_template_directory_uri() . '/images/framework/leftsidebar.gif',
								),
								'4' => array(
									'alt' => esc_attr__('Right sidebar', 'biscon' ),
									'img' => get_template_directory_uri() . '/images/framework/rightsidebar.gif',
								),
							),
							'default'  => '1',
						),

						array(
							'id'       => 'blog_left_sidebar_widgets',
							'type'     => 'select',
							'title'    => esc_html__( 'Widgets for Blog Left Sidebar', 'biscon' ),
							//Must provide key => value(array:title|img) pairs for radio options
							'options'  => array( 'blog_default_left_sidebar' => 'Left Blog Sidebar', ),
							'default'  => 'blog_default_left_sidebar',
							'required' => array( 'blog-sidebar-layout', '<', '0' ),
						),
						array(
							'id'       => 'blog_right_sidebar_widgets',
							'type'     => 'select',
							'title'    => esc_html__( 'Widgets for Blog Right Sidebar', 'biscon' ),
							//Must provide key => value(array:title|img) pairs for radio options
							'options'  => array( 'blog_default_right_sidebar' => 'Right Blog Sidebar', ),
							'default'  => 'blog_default_right_sidebar',
							'required' => array( 'blog-sidebar-layout', '<', '0' ),
						),


						array(
							'id'             => 'blog-title-typography',
							'type'           => 'typography',
							'title'          => esc_html__( 'Blog Category Heading', 'biscon' ),
							'subtitle'       => esc_html__( 'Specify the blog category heading font  properties.',
								'biscon' ),
							'font-backup'    => true,
							'google'         => true,
							'subsets'        => true,
							'text-transform' => true,
							'default'        => array(
								'color'          => '#333d52',
								'font-weight'    => '500',
								'font-family'    => 'Fira Sans',
								'font-size'      => '26px',
								'line-height'    => '34px',
								'text-transform' => 'capitalize',
								'text-align'     => 'left',
							),
						),


						array(
							'id'       => 'blog-layout',
							'type'     => 'image_select',
							'title'    => esc_html__( 'Select page layout', 'biscon' ),
							'subtitle'    => esc_html__( 'The option work for Post post type', 'biscon' ),
							//Must provide key => value(array:title|img) pairs for radio options
							'options'  => array(
								'1' => array(
									'alt' => esc_attr__('Full width layout', 'biscon' ),
									'img' => get_template_directory_uri() . '/images/framework/full.gif',
								),
								'2' => array(
									'alt' => esc_attr__('Boxed layout, maximum resolution - 1170 px', 'biscon' ),
									'img' => get_template_directory_uri() . '/images/framework/boxed.gif',
								),
							),
							'default'  => '1',

						),
						array(
							'id'       => 'blog-boxed-background',
							'type'     => 'background',
							'title'    => esc_html__( 'Background settings for box', 'biscon' ),
							'output'   => array( '.single-post .mainbgr', '.archive.category .mainbgr', ),
							'default'  => array(
								'background-color'      => '#323232',
								'background-repeat'     => 'no-repeat',
								'background-attachment' => 'fixed',
								'background-position'   => 'center center',
								'background-size'       => 'inherit',
							),
							'required' => array( 'blog-layout', '=', '2' ),
						),
						array(
							'id'      => 'blog-content-background',
							'type'    => 'background',
							'title'   => esc_html__( 'Background settings for content section', 'biscon' ),
							'output'  => array( '.single-post main', '.archive.category main', ),
							'default' => array(
								'background-color'      => '#ffffff',
								'background-repeat'     => 'no-repeat',
								'background-attachment' => 'fixed',
								'background-position'   => 'center center',
								'background-size'       => 'inherit',
								'background-image'      => '',
							),
						),


						array(
							'id'      => 'blog_header_widget',
							'type'    => 'select',
							'title'   => esc_html__( 'Header Menu for Blog', 'biscon' ),
							//Must provide key => value(array:title|img) pairs for radio options
							'options' => Atiframebuilder_Config::get_composer_block_array( 'header' ),
							'default' => '',
						),
						array(
							'id'       => 'blog-header_type',
							'type'     => 'select',
							'title'    => esc_html__( 'Select Header type', 'biscon' ),
							'options'  => array( 1 => 'Slider', ),
							'default'  => 1,
							'required' => array( 'header_type', '<', '0' ),
						),
						array(
							'id'      => 'blog_footer_widget',
							'type'    => 'select',
							'title'   => esc_html__( 'Footer for Blog', 'biscon' ),
							//Must provide key => value(array:title|img) pairs for radio options
							'options' => Atiframebuilder_Config::get_composer_block_array( 'footer' ),
							'default' => '',
						),
						array(
							'id'   => 'blog-opt-divide1',
							'type' => 'divide',
						),
						array(
							'id'    => 'cases-info-BLOG',
							'type'  => 'info',
							'style' => 'info',
							'title' => esc_html__( 'Blog Heading Box', 'biscon' ),
						),

						// BLOG Headings to choose
						array(
							'id'      => 'blog-custom-heading',
							'type'    => 'image_select',
							'title'   => esc_html__( 'Select blog header', 'biscon' ),
							//Must provide key => value(array:title|img) pairs for radio options
							'options' => array(
								'1' => array(
									'alt' => esc_attr__( 'Blog Head', 'biscon' ),
									'img' => get_template_directory_uri() . '/images/framework/bloghead1.gif',
								),
								'2' => array(
									'alt' => esc_attr__( 'Blog Head', 'biscon' ),
									'img' => get_template_directory_uri() . '/images/framework/bloghead2.gif',
								),
								'3' => array(
									'alt' => esc_attr__( 'Blog Head', 'biscon' ),
									'img' => get_template_directory_uri() . '/images/framework/bloghead3.gif',
								),

							),
							'default' => '1',
						),


						array(
							'id'       => 'blog-pick_slider',
							'type'     => 'select',
							'title'    => esc_html__( 'Select Slider for Blog', 'biscon' ),
							'subtitle'    => esc_html__( 'The option work for Post post type', 'biscon' ),
							//Must provide key => value(array:title|img) pairs for radio options
							'options'  => Atiframebuilder_Config::get_sliders_array(
								esc_html__( 'The Theme Support Layer Slider, Smart Slider and Slider Revolution, but couldn\'t find it. Install one of the plug-ins to choose the slider to display in the header.',
									'biscon' )
							),
							'default'  => '0',
							'required' => array( 'blog-custom-heading', '=', 1 ),
						),


						array(
							'id'       => 'blog-heading-background',
							'type'     => 'background',
							'title'    => esc_html__( 'Background settings for the heading box on the blog',
								'biscon' ),
							'compiler' => true,
							'output'   => false,
							'default'  => array(
								'background-color'      => '#999999',
								'background-repeat'     => 'no-repeat',
								'background-attachment' => 'fixed',
								'background-position'   => 'center center',
								'background-size'       => 'inherit',
								'background-image'       => '',
							),
							'required' => array( 'blog-custom-heading', '=', 2 ),
						),
						array(
							'id'       => 'bgfrom',
							'type'     => 'color_rgba',
							'title'    => esc_html__( 'Gradient Underlay for Background From', 'biscon' ),
							'default'  => array(
								'color' => '#F45769',
								'alpha' => '0',
							),
							'compiler' => true,
							'output'   => false,
							'required' => array( 'blog-custom-heading', '=', 2 ),
						),
						array(
							'id'       => 'bgto',
							'type'     => 'color_rgba',
							'title'    => esc_html__( 'Gradient Underlay for Background To', 'biscon' ),
							'default'  => array(
								'color' => '#F6964D',
								'alpha' => '0',
							),
							'compiler' => true,
							'output'   => false,
							'required' => array( 'blog-custom-heading', '=', 2 ),
						),
						array(
							'id'       => 'bgfromo',
							'type'     => 'color_rgba',
							'title'    => esc_html__( 'Gradient Overlay for Background From', 'biscon' ),
							'default'  => array(
								'color' => '#F45769',
								'alpha' => '0',
							),
							'compiler' => true,
							'output'   => false,
							'required' => array( 'blog-custom-heading', '=', 2 ),
						),
						array(
							'id'       => 'bgtoo',
							'type'     => 'color_rgba',
							'title'    => esc_html__( 'Gradient Overlay for Background To', 'biscon' ),
							'default'  => array(
								'color' => '#F6964D',
								'alpha' => '0',
							),
							'compiler' => true,
							'output'   => false,
							'required' => array( 'blog-custom-heading', '=', 2 ),
						),

						array(
							'id'             => 'blog-heading-padding',
							'type'           => 'spacing',
							'output'         => array( '.custblog' ),
							'compiler'       => false,
							'mode'           => 'padding',
							'units'          => array( 'em', 'px' ),
							'units_extended' => 'false',
							'title'          => esc_html__( 'Padding Option for Heading Box', 'biscon' ),
							'default'        => array(
								'padding-top'    => '55',
								'padding-right'  => '55',
								'padding-bottom' => '45',
								'padding-left'   => '55',
								'units'          => 'px',
							),
							'required'       => array( 'blog-custom-heading', '=', 2 ),
						),
						array(
							'id'       => 'blog-heading-cat-text',
							'type'     => 'color_rgba',
							'title'    => esc_html__( 'Category Link Text Color', 'biscon' ),
							'default'  => array(
								'color' => '#FFFFFF',
								'alpha' => '1',
							),
							'output'   => array( '.single .entry-header ul.post-categories li a' ),
							'compiler' => false,
							'required' => array( 'blog-custom-heading', '=', 2 ),
						),
						array(
							'id'       => 'blog-heading-cat-bgr',
							'type'     => 'color_rgba',
							'title'    => esc_html__( 'Category Link Background Color', 'biscon' ),
							'default'  => array(
								'color' => '#FFFFFF',
								'alpha' => '0',
							),
							'output'   => array( '.single .entry-header ul.post-categories li a' ),
							'compiler' => false,
							'required' => array( 'blog-custom-heading', '=', 2 ),
						),
						array(
							'id'       => 'blog-heading-cat-border',
							'type'     => 'border',
							'title'    => esc_html__( 'Category Link Border', 'biscon' ),
							'output'   => array( '.single .entry-header ul.post-categories li a' ),
							'compiler' => false,
							'default'  => array(
								'border-color'  => '#FFFFFF',
								'border-style'  => 'solid',
								'border-top'    => '1px',
								'border-right'  => '1px',
								'border-bottom' => '1px',
								'border-left'   => '1px',
							),
							'required' => array( 'blog-custom-heading', '=', 2 ),
						),
						array(
							'id'            => 'blog-heading-cat-radius',
							'type'          => 'slider',
							'title'         => esc_html__( 'Category Link Border Radius', 'biscon' ),
							'desc'          => esc_html__( 'Select border radius in px. Min: 0, max: 20, step: 1, default value: 0',
								'biscon' ),
							'output'        => array( '.single .entry-header ul.post-categories li a' ),
							'compiler'      => false,
							'default'       => '0',
							'min'           => 0,
							'step'          => 1,
							'max'           => 20,
							'display_value' => 'text',
							'required'      => array( 'blog-custom-heading', '=', 2 ),
						),

						array(
							'id'       => 'blog-heading-h1-color',
							'type'     => 'color_rgba',
							'title'    => esc_html__( 'H1 Heading Text Color', 'biscon' ),
							'default'  => array(
								'color' => '#FFFFFF',
								'alpha' => '1',
							),
							'compiler' => true,
							'output'   => false,
							'required' => array( 'blog-custom-heading', '=', 2 ),
						),
						array(
							'id'       => 'blog-heading-meta-color',
							'type'     => 'color_rgba',
							'title'    => esc_html__( 'Meta Data Text Color', 'biscon' ),
							'default'  => array(
								'color' => '#FFFFFF',
								'alpha' => '1',
							),
							'compiler' => true,
							'output'   => false,
							'required' => array( 'blog-custom-heading', '=', 2 ),
						),


						array(
							'id'   => 'blog-opt-divide1',
							'type' => 'divide',
						),
						/*======== Slider OR Image END ==========*/
						array(
							'id'            => 'thumb-border-radius',
							'type'          => 'slider',
							'title'         => esc_html__( 'Border Radius for blog elements', 'biscon' ),
							'desc'          => esc_html__( 'Select border radius in px. Min: 0, max: 100, step: 1, default value: 0',
								'biscon' ),
							'default'       => '5',
							'min'           => 0,
							'step'          => 1,
							'max'           => 100,
							'display_value' => 'text',
						),
						array(
							'id'       => 'post-header',
							'type'     => 'switch',
							'title'    => esc_html__( 'Display Post H1 Heading', 'biscon' ),
							'subtitle'    => esc_html__( 'Do you want to show H1 heading for post? Usually we display it through drag&drop builder',
								'biscon' ),
							'default'  => false,
							'indent'   => false,
						),
						array(
							'id'       => 'is_related_posts',
							'type'     => 'switch',
							'title'    => esc_html__( 'Related Posts for Single Post View', 'biscon' ),
							'subtitle'    => esc_html__( 'Press On to template choice appear', 'biscon' ),
							'default'  => true,
						),
						array(
							'id'       => 'related_posts_title',
							'type'     => 'text',
							'title'    => esc_html__( 'Related Posts Title', 'biscon' ),
							'subtitle'    => esc_html__( 'Set Title for Related Posts section', 'biscon' ),
							'required' => array( 'is_related_posts', '=', true ),
							'default'  => 'Related Posts',
						),

						array(
							'id'      => 'show_post_author',
							'type'    => 'switch',
							'title'   => esc_html__( 'Show Post Author ', 'biscon' ),
							'default' => true,
						),
						array(
							'id'      => 'show_post_category',
							'type'    => 'switch',
							'title'   => esc_html__( 'Show Post Category ', 'biscon' ),
							'default' => true,
						),
						array(
							'id'      => 'show_post_tags',
							'type'    => 'switch',
							'title'   => esc_html__( 'Show Post Tags ', 'biscon' ),
							'default' => true,
						),
						array(
							'id'      => 'show_post_share',
							'type'    => 'switch',
							'title'   => esc_html__( 'Show Post Share ', 'biscon' ),
							'default' => false,
						),
						array(
							'id'      => 'show_post_date',
							'type'    => 'switch',
							'title'   => esc_html__( 'Show Post Date ', 'biscon' ),
							'default' => true,
						),
						array(
							'id'      => 'show_comments_count',
							'type'    => 'switch',
							'title'   => esc_html__( 'Show Post Comments count ', 'biscon' ),
							'default' => true,
						),
						array(
							'id'      => 'show_read_more',
							'type'    => 'switch',
							'title'   => esc_html__( 'Show Read More Link', 'biscon' ),
							'default' => true,
						),
						array(
							'id'       => 'read_more_text',
							'type'     => 'text',
							'title'    => esc_html__( 'Read More Link Text', 'biscon' ),
							'subtitle'    => esc_html__( 'Set Text for Read More Link', 'biscon' ),
							'required' => array( 'show_read_more', '=', true ),
							'default'  => ' ',
						),
						array(
							'id'       => 'read_more_related',
							'type'     => 'text',
							'title'    => esc_html__( 'Read More Link Text On Related Posts', 'biscon' ),
							'subtitle'    => esc_html__( 'Set Text for Read More Link', 'biscon' ),
							'default'  => ' ',
						),
					),
				),
				array(
					'title'  => esc_html__( 'Modal Window', 'biscon' ),
					'id'     => 'modal',
					'icon'   => 'el el-list-alt',
					'fields' => array(
						array(
							'id'    => 'modal-info',
							'type'  => 'info',
							'style' => 'info',
							'title' => esc_html__( 'Option enabling you to display a modal window before a user leaves your website.',
								'biscon' ),
						),
						array(
							'id'      => 'show_modal',
							'type'    => 'switch',
							'title'   => esc_html__( 'Show Modal Window', 'biscon' ),
							'default' => false,
						),
						array(
							'id'          => 'modal_window',
							'type'        => 'select',
							'data'        => 'posts',
							'args'        => array( 'post_type' => array( 'modal_window', ) ),
							'title'       => esc_html__( 'Select Modal Window', 'biscon' ),
							'description' => wp_kses( __( ' Create a new Modal Window <a href="post-new.php?post_type=modal_window" target="_blank">here</a>',
								'biscon' ),
								self::ALLOWED_HTML ),
							'required'    => array( 'show_modal', '=', true ),
							'default'     => false,
						),
						array(
							'id'       => 'close-color',
							'type'     => 'color_rgba',
							'title'    => esc_html__( 'Close Button Color', 'biscon' ),
							'default'  => array(
								'color' => '#ffffff',
								'alpha' => '1',
							),
							'compiler' => false,
							'output'   => array( '#ouibounce-modal .modal > i' ),
						),

						array(
							'id'       => 'agressive_modal',
							'type'     => 'switch',
							'title'    => esc_html__( 'Aggressive Mode', 'biscon' ),
							'subtitle'    => esc_html__( 'The modal to be eligible to fire anytime the page is loaded/ reloaded',
								'biscon' ),
							'default'  => false,
						),
						array(
							'id'       => 'time_modal',
							'type'     => 'text',
							'title'    => esc_html__( 'Set a min time before Ouibounce fires, in seconds',
								'biscon' ),
							'subtitle'    => esc_html__( 'By default, Ouibounce won\'t fire in the first second to prevent false positives, as it\'s unlikely the user will be able to exit the page within less than a second.',
								'biscon' ),
							'default'  => '1000',
						),
						array(
							'id'       => 'day_modal',
							'type'     => 'text',
							'title'    => esc_html__( 'Cookie expiration, in days', 'biscon' ),
							'subtitle'    => esc_html__( 'Ouibounce sets a cookie by default to prevent the modal from appearing more than once per user. By default, the cookie will expire at the end of the session, which for most browsers is when the browser is closed entirely.',
								'biscon' ),
							'default'  => '5',
						),
					),
				),
			),
		);
	}

	public static function get_widgets() {
		return array(
			array(
				'name'          => esc_html__( 'Left Sidebar', 'biscon' ),
				'id'            => '_default_left_sidebar',
				'description'   => esc_html__( 'Appears in the left section of the site.', 'biscon' ),
				'before_widget' => '<aside id="%1$s" class="widget %2$s">',
				'after_widget'  => '</aside>',
				'before_title'  => '<h3 class="widget-title">',
				'after_title'   => '</h3>',
			),
			array(
				'name'          => esc_html__( 'Right Sidebar', 'biscon' ),
				'id'            => '_default_right_sidebar',
				'description'   => esc_html__( 'Appears in the right section of the site.', 'biscon' ),
				'before_widget' => '<aside id="%1$s" class="widget %2$s">',
				'after_widget'  => '</aside>',
				'before_title'  => '<h3 class="widget-title">',
				'after_title'   => '</h3>',
			),
			array(
				'name'          => esc_html__( 'Left Blog Sidebar', 'biscon' ),
				'id'            => 'blog_default_left_sidebar',
				'description'   => esc_html__( 'Appears in the left blog section of the site.', 'biscon' ),
				'before_widget' => '<aside id="%1$s" class="widget %2$s">',
				'after_widget'  => '</aside>',
				'before_title'  => '<h3 class="widget-title">',
				'after_title'   => '</h3>',
			),
			array(
				'name'          => esc_html__( 'Right Blog Sidebar', 'biscon' ),
				'id'            => 'blog_default_right_sidebar',
				'description'   => esc_html__( 'Appears in the right blog section of the site.', 'biscon' ),
				'before_widget' => '<aside id="%1$s" class="widget %2$s">',
				'after_widget'  => '</aside>',
				'before_title'  => '<h3 class="widget-title">',
				'after_title'   => '</h3>',
			),
			array(
				'name'          => esc_html__( 'Left Shop Sidebar', 'biscon' ),
				'id'            => 'shop_default_left_sidebar',
				'description'   => esc_html__( 'Appears in the left shop section of the site.', 'biscon' ),
				'before_widget' => '<aside id="%1$s" class="widget %2$s">',
				'after_widget'  => '</aside>',
				'before_title'  => '<h3 class="widget-title">',
				'after_title'   => '</h3>',
			),
			array(
				'name'          => esc_html__( 'Right Shop Sidebar', 'biscon' ),
				'id'            => 'shop_default_right_sidebar',
				'description'   => esc_html__( 'Appears in the left shop section of the site.', 'biscon' ),
				'before_widget' => '<aside id="%1$s" class="widget %2$s">',
				'after_widget'  => '</aside>',
				'before_title'  => '<h3 class="widget-title">',
				'after_title'   => '</h3>',
			),
		);
	}

	public static function get_notices() {
		return array(
			'was_installed'   => __( 'SecretLab themes data was installed successfully', 'biscon' ),
			'sliders_message' => __( 'You use more that one slider on the site, so we advise to you leave only one of them. You can deactiveta others at:',
				'biscon' ),
			'sliders_plugins' => __( 'plugins', 'biscon' ),
		);
	}

	public static function get_welcomes() {
		return array(
			'welcome'       => __( 'SecretLab', 'biscon' ),
			'documentation' => __( 'Documentation', 'biscon' ),
		);
	}

	public static function get_layout_settings() {
		return (object)array(
			'scroll_to_top'       => __( 'Scroll to top', 'biscon' ),
		);
	}
}