<?php

function atiframebuilder_enqueue_styles() {

    $parent_style = 'atiframebuilder-ownstyles';

    wp_enqueue_style( 'child-style',
        get_stylesheet_directory_uri() . '/style.css',
        array( $parent_style )
    );
}
add_action( 'wp_enqueue_scripts', 'atiframebuilder_enqueue_styles' );

/*======================================
YOU CAN PUT YOUR OWN php CODE AND FUNCTIONS HERE
=======================================*/

?>