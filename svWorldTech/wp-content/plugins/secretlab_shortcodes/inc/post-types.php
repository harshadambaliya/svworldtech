<?php

add_action('init', 'ssc_register_post_types', 99 );

function ssc_register_post_types(){
    global $kc;
    
    $kc->add_content_type( array(
        'portfolio',
        'service'
    ));
}

?>