<?php

add_filter( 'kc_add_map', 'ssc_image_gallery_filter', 0 /*priority index*/, 2 /*number of params*/ );

function ssc_image_gallery_filter( $atts, $base ) {

	if ( $base == 'kc_image_gallery' ) {
		if ( isset( $atts['params'] ) ) {
			array_push( $atts['params']['styling'][0]['options'][0]['Overlay Effect'],
				array( 'property' => 'border-radius', 'label' => esc_html__( 'Border radius', 'ssc' ), 'selector' => '.kc_image_gallery .item-grid .kc-image-overlay' ) );
		}
	}

	return $atts; // required
}