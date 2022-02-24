<?php
/**
 *  SecretLab Theme Customizer
 *
 * @package SecretLab
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */

class Atiframebuilder_Customize {

	public static function customize_register( $wp_customize ) {
		
		$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
		$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
		$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';
		
	}
	
}

add_action( 'customize_register', array( 'Atiframebuilder_Customize', 'customize_register' ) );

