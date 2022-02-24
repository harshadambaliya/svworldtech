<?php
/**
 * Register the required plugins for this theme.
 *
 * The variable passed to tgmpa_register_plugins() should be an array of plugin
 * arrays.
 *
 */

//require_once get_template_directory() . '/inc/class-tgm-plugin-activation.php';
class Atiframebuilder_Plugins_F {

    public $plugins;

    public $config;

    public function __construct() {

        /**
        * Array of plugins
        * Required keys are name, slug and required.
        * If the source is NOT from the .org repo, then source is also required.
        */
        $this->plugins = array(
	        array(
		        'name'     => esc_html__( 'SecretLab Installer', 'biscon' ),
		        'slug'     => 'SecretLabInstaller',
		        'source' => 'https://secretlab.pw/plu/SecretLabInstaller.zip',
		        'required' => true,
	        ),
	        array(
		        'name'     => esc_html__( 'Redux Framework', 'biscon' ),
		        'slug'     => 'redux-framework',
		        'required' => true,
	        ),
        );

        $this->config = array(
            'domain'       => 'biscon', // Text domain
            'default_path' => '', // Default absolute path to pre-packaged plugins
            'menu'         => 'install-required-plugins', // Menu slug
            'has_notices'  => true, // Show admin notices or not
            'is_automatic' => false, // Automatically activate plugins after installation or not
            'message'      => '', // Message to output right before the plugins table
            'strings'      => array(
                'page_title'                      => esc_attr__( 'Install Required Plugins', 'biscon' ),
                'menu_title'                      => esc_attr__( 'Install Plugins', 'biscon' ),
                'installing'                      => esc_attr__( 'Installing Plugin: %s', 'biscon' ), // %1$s = plugin name
                'oops'                            => esc_attr__( 'Something went wrong with the plugin API.', 'biscon' ),
                'notice_can_install_required'     => _n_noop( 'This theme requires the following plugin: %1$s.', 'This theme requires the following plugins: %1$s.', 'biscon' ), // %1$s = plugin name(s)
                'notice_can_install_recommended'  => _n_noop( 'This theme recommends the following plugin: %1$s.', 'This theme recommends the following plugins: %1$s.', 'biscon' ), // %1$s = plugin name(s)
                'notice_cannot_install'           => _n_noop( 'Sorry, but you do not have the correct permissions to install the %s plugin. Contact the administrator of this site for help on getting the plugin installed.', 'Sorry, but you do not have the correct permissions to install the %s plugins. Contact the administrator of this site for help on getting the plugins installed.', 'biscon' ), // %1$s = plugin name(s)
                'notice_can_activate_required'    => _n_noop( 'The following required plugin is currently inactive: %1$s.', 'The following required plugins are currently inactive: %1$s.', 'biscon' ), // %1$s = plugin name(s)
                'notice_can_activate_recommended' => _n_noop( 'The following recommended plugin is currently inactive: %1$s.', 'The following recommended plugins are currently inactive: %1$s.', 'biscon' ), // %1$s = plugin name(s)
                'notice_cannot_activate'          => _n_noop( 'Sorry, but you do not have the correct permissions to activate the %s plugin. Contact the administrator of this site for help on getting the plugin activated.', 'Sorry, but you do not have the correct permissions to activate the %s plugins. Contact the administrator of this site for help on getting the plugins activated.', 'biscon' ), // %1$s = plugin name(s)
                'notice_ask_to_update'            => _n_noop( 'The following plugin needs to be updated to its latest version to ensure maximum compatibility with this theme: %1$s.', 'The following plugins need to be updated to their latest version to ensure maximum compatibility with this theme: %1$s.', 'biscon' ), // %1$s = plugin name(s)
                'notice_cannot_update'            => _n_noop( 'Sorry, but you do not have the correct permissions to update the %s plugin. Contact the administrator of this site for help on getting the plugin updated.', 'Sorry, but you do not have the correct permissions to update the %s plugins. Contact the administrator of this site for help on getting the plugins updated.', 'biscon' ), // %1$s = plugin name(s)
                'install_link'                    => _n_noop( 'Begin installing plugin', 'Begin installing plugins', 'biscon' ),
                'activate_link'                   => _n_noop( 'Activate installed plugin', 'Activate installed plugins', 'biscon' ),
                'return'                          => esc_attr__( 'Return to Required Plugins Installer', 'biscon' ),
                'plugin_activated'                => esc_attr__( 'Plugin activated successfully.', 'biscon' ),
                'complete'                        => esc_attr__( 'All plugins installed and activated successfully. %s', 'biscon' ), // %1$s = dashboard link
            )
        );

        add_action( 'tgmpa_register', array( $this, 'register_required_plugins' ) );

    }

    public function register_required_plugins(){
        tgmpa( $this->plugins, $this->config );
    }

}
