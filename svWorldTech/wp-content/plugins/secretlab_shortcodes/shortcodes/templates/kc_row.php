<?php

$output = $css_data = $css = $svg1 = $svg2 = $svg3 = $svg4 = $svg5 = $svg6 = $svg7 = $svg8 =
$anim1 = $anim2 = $anim3 = $anim4 = $anim5 = $anim6 = $anim7 = $anim8 = '';

$img_s1 = $img_s2 = $img_s3 = $img_s4 = $img_s5 = $img_s6 = $img_s7 = $img_s8 = 'full';

$particles = '';
$particles_number_value = 80;
$particles_number_density = '';
$particles_number_density_value_area = 800;
$particles_color_random = 'yes';
$particles_colors = [];
$particles_shape_type = 'circle';
$particles_shape_stroke_width = 0;
$particles_stroke_shape_color = '#000';
$particles_shape_polygon = 5;
$particles_opacity = 50;
$particles_opacity_random = '';
$particles_size = 3;
$particles_random = 'yes';
$particles_line = 'yes';
$particles_line_distance = 150;
$particles_line_color = '#000';
$particles_line_opacity = 50;
$particles_line_width = 1;
$particles_move = 'yes';
$particles_move_speed = 6;
$particles_move_direction = 'none';
$particles_move_random = '';
$particles_move_straight = '';
$particles_move_out_mode = 'out';
$particles_move_bounce = '';
$interactivity = 'canvas';
$interactivity_events_onhover = 'yes';
$interactivity_events_onhover_mode = 'repulse';
$interactivity_events_onclick = 'yes';
$interactivity_events_onclick_mode = 'push';
$interactivity_modes_grab_distance = 400;
$interactivity_modes_grab_line_linked_opacity = 100;
$interactivity_modes_bubble_distance = 400;
$interactivity_modes_bubble_size = 40;
$interactivity_modes_bubble_duration = 2;
$interactivity_modes_bubble_opacity = 80;
$interactivity_modes_bubble_speed = 3;
$interactivity_modes_repulse_distance = 200;
$interactivity_modes_repulse_duration = 4;
$interactivity_modes_push_particles_nb = 4;
$interactivity_modes_remove_particles_nb = 2;
$retina_detect = 'yes';

$cont_class         = array( 'kc-row-container' );
$element_attributes = array();
extract( $atts );

$css_classes = apply_filters( 'kc-el-class', $atts );

$css_classes[] = 'kc_row';

if ( $css != '' ) {
	$css_classes[] = $css;
}

if ( ! empty( $atts['row_class'] ) ) {
	$css_classes[] = $atts['row_class'];
}

if ( ! empty( $atts['full_height'] ) ) {
	if ( $atts['content_placement'] == 'middle' ) {
		$element_attributes[] = 'data-kc-fullheight="middle-content"';
	} else {
		$element_attributes[] = 'data-kc-fullheight="true"';
	}

}

if ( empty( $atts['column_align'] ) ) {
	$atts['column_align'] = 'center';
}

if ( ! empty( $atts['equal_height'] ) ) {
	$element_attributes[] = 'data-kc-equalheight="true"';
	$element_attributes[] = 'data-kc-equalheight-align="' . $atts['column_align'] . '"';
}


if ( isset( $atts['use_container'] ) && $atts['use_container'] == 'yes' ) {
	$cont_class[] = ' kc-container';
}

if ( ! empty( $atts['container_class'] ) ) {
	$cont_class[] = ' ' . $atts['container_class'];
}

if ( ! empty( $atts['css'] ) ) {
	$css_classes[] = $atts['css'];
}

/**
 *Check video background
 */

if ( $atts['video_bg'] === 'yes' ) {
	$video_bg_url = $atts['video_bg_url'];

	if ( empty( $video_bg_url ) ) {
		$video_bg_url = 'https://www.youtube.com/watch?v=dOWFVKb2JqM';
	}

	$has_video_bg = kc_youtube_id_from_url( $video_bg_url );

	if ( ! empty( $has_video_bg ) ) {
		$css_classes[]        = 'kc-video-bg';
		$element_attributes[] = 'data-kc-video-bg="' . esc_attr( $video_bg_url ) . '"';
		$css_data             .= 'position: relative;';

		if ( isset( $atts['video_options'] ) && ! empty( $video_options ) ) {
			$element_attributes[] = 'data-kc-video-options="' . esc_attr( trim( $video_options ) ) . '"';
		}
		if ( isset( $atts['video_mute'] ) && ! empty( $atts['video_mute'] ) ) {
			$element_attributes[] = 'data-kc-video-mute="' . esc_attr( $atts['video_mute'] ) . '"';
		}
	}
}


if ( ! empty( $atts['row_id'] ) ) {
	$row_id               = urlencode( $atts['row_id'] );
	$element_attributes[] = 'id="' . esc_attr( $row_id ) . '"';
}


if ( isset( $atts['force'] ) && $atts['force'] == 'yes' ) {
	if ( isset( $atts['use_container'] ) && $atts['use_container'] == 'yes' ) {
		$element_attributes[] = 'data-kc-fullwidth="row"';
	} else {
		$element_attributes[] = 'data-kc-fullwidth="content"';
	}
}


if ( empty( $has_video_bg ) ) {
	if ( ! empty( $atts['parallax'] ) ) {

		$element_attributes[] = 'data-kc-parallax="true"';

		if ( $atts['parallax'] == 'yes-new' ) {
			$bg_image_id = $atts['parallax_image'];
			$bg_image    = image_downsize( $bg_image_id, 'full' );
			$css_data    .= "background-image:url('" . $bg_image[0] . "');";
		}

	}
}

if ( 'yes' === $particles ) {
	$css_classes[] = 'ssc-particles-section';
}


	$css_class            = implode( ' ', $css_classes );
$element_attributes[] = 'class="' . esc_attr( trim( $css_class ) ) . '"';

if ( ! empty( $css_data ) ) {
	$element_attributes[] = 'style="' . esc_attr( trim( $css_data ) ) . '"';
}

$output .= '<section ' . implode( ' ', $element_attributes ) . '>';

$sel = '.' . implode( '.', $css_classes );

if ( $svg1 != '' ) {
	$anim_atts = null;
	if ( '' != $anim1 ) {
		$anim_atts = array( 'class' => $anim1 . ' anif ' );
	}
	$m1 = ssc_process_media( $svg1, $img_s1, $anim_atts );
} else {
	$m1 = '';
}
if ( $svg2 != '' ) {
	$anim_atts = null;
	if ( '' != $anim2 ) {
		$anim_atts = array( 'class' => $anim2 . ' anif ' );
	}
	$m2 = ssc_process_media( $svg2, $img_s2, $anim_atts );
} else {
	$m2 = '';
}
if ( $svg3 != '' ) {
	$anim_atts = null;
	if ( '' != $anim3 ) {
		$anim_atts = array( 'class' => $anim3 . ' anif ' );
	}
	$m3 = ssc_process_media( $svg3, $img_s3, $anim_atts );
} else {
	$m3 = '';
}
if ( $svg4 != '' ) {
	$anim_atts = null;
	if ( '' != $anim4 ) {
		$anim_atts = array( 'class' => $anim4 . ' anif ' );
	}
	$m4 = ssc_process_media( $svg4, $img_s4, $anim_atts );
} else {
	$m4 = '';
}
if ( $svg5 != '' ) {
	$anim_atts = null;
	if ( '' != $anim5 ) {
		$anim_atts = array( 'class' => $anim5 . ' anif ' );
	}
	$m5 = ssc_process_media( $svg5, $img_s5, $anim_atts );
} else {
	$m5 = '';
}
if ( $svg6 != '' ) {
	$anim_atts = null;
	if ( '' != $anim6 ) {
		$anim_atts = array( 'class' => $anim6 . ' anif ' );
	}
	$m6 = ssc_process_media( $svg6, $img_s6, $anim_atts );
} else {
	$m6 = '';
}
if ( $svg7 != '' ) {
	$anim_atts = null;
	if ( '' != $anim7 ) {
		$anim_atts = array( 'class' => $anim7 . ' anif ' );
	}
	$m7 = ssc_process_media( $svg7, $img_s7, $anim_atts );
} else {
	$m7 = '';
}
if ( $svg8 != '' ) {
	$anim_atts = null;
	if ( '' != $anim8 ) {
		$anim_atts = array( 'class' => $anim8 . ' anif ' );
	}
	$m8 = ssc_process_media( $svg8, $img_s8, $anim_atts );
} else {
	$m8 = '';
}

$output .= '<div class="befbgr" data-ssc-svg="' . $svg1 . '" data-ssc-img-s="' . $img_s1 . '" data-ssc-img-anim="' . $anim1 . '">' . $m1 . '</div>';

$output .= '<div class="befbgr" data-ssc-svg="' . $svg2 . '" data-ssc-img-s="' . $img_s2 . '" data-ssc-img-anim="' . $anim2 . '">' . $m2 . '</div>';

$output .= '<div class="aftbgr" data-ssc-svg="' . $svg3 . '" data-ssc-img-s="' . $img_s3 . '" data-ssc-img-anim="' . $anim3 . '">' . $m3 . '</div>';

$output .= '<div class="aftbgr" data-ssc-svg="' . $svg4 . '" data-ssc-img-s="' . $img_s4 . '" data-ssc-img-anim="' . $anim4 . '">' . $m4 . '</div>';

$output .= '<div class="befbgr5" data-ssc-svg="' . $svg5 . '" data-ssc-img-s="' . $img_s5 . '" data-ssc-img-anim="' . $anim5 . '">' . $m5 . '</div>';

$output .= '<div class="befbgr6" data-ssc-svg="' . $svg6 . '" data-ssc-img-s="' . $img_s6 . '" data-ssc-img-anim="' . $anim6 . '">' . $m6 . '</div>';

$output .= '<div class="aftbgr7" data-ssc-svg="' . $svg7 . '" data-ssc-img-s="' . $img_s7 . '" data-ssc-img-anim="' . $anim7 . '">' . $m7 . '</div>';

$output .= '<div class="aftbgr8" data-ssc-svg="' . $svg8 . '" data-ssc-img-s="' . $img_s8 . '" data-ssc-img-anim="' . $anim8 . '">' . $m8 . '</div>';

$output .= '<div class="' . esc_attr( implode( ' ', $cont_class ) ) . '">';

$output .= '<div class="kc-wrap-columns">' . do_shortcode( str_replace( 'kc_row#', 'kc_row', $content ) ) . '</div>';

$output .= '</div>';

if ( 'yes' === $particles ) {
	wp_enqueue_script( 'particles', SSC_URL . 'js/particles.min.js', array(), false, true );

	if( '' == $particles_color_random ) {
		foreach ( $particles_colors as $particles_color) {
			if(!empty($particles_color->color)){
				$c_s[] = $particles_color->color;
			}
		}
	} else {
		$c_s = 'random';
	}

	$p_sets = json_encode(array(
		'particles' => array(
			'number' => array(
				'value' => $particles_number_value,
				'density' => array(
					'enable' => ( 'yes' === $particles_number_density ),
					'value_area' => $particles_number_density_value_area,
				),
			),
			'color' => array(
				'value' => $c_s,
			),
			'shape' => array(
				'type' => $particles_shape_type,
				'stroke' => array(
					'width' => $particles_shape_stroke_width,
					'color' => $particles_stroke_shape_color,
				),
				'polygon' => array(
					'nb_sides' => $particles_shape_polygon,
				),
			),
			'opacity' => array(
				'value' => ( $particles_opacity / 100 ),
				'random' => ( 'yes' === $particles_opacity_random ),
				'anim' => array(
					'enable' => false,
					'speed' => 1,
					'opacity_min' => 0.1,
					'sync' => false
				),
			),
			'size' => array(
				'value' => $particles_size,
				'random' => ( 'yes' === $particles_random ),
				'anim' => array(
					'enable' => false,
					'speed' => 40,
					'size_min' => 0.1,
					'sync' => false
				),
			),
			'line_linked' => array(
				'enable' => ( 'yes' === $particles_line ),
				'distance' => $particles_line_distance,
				'color' => $particles_line_color,
				'opacity' => ( $particles_line_opacity / 100 ),
				'width' => $particles_line_width,
			),
			'move' => array(
				'enable' => ( 'yes' === $particles_move ),
				'speed' =>  $particles_move_speed,
				'direction' =>  $particles_move_direction,
				'random' =>  ( 'yes' === $particles_move_random ),
				'straight' =>  ( 'yes' === $particles_move_straight ),
				'out_mode' =>  $particles_move_out_mode,
				'bounce' =>  ( 'yes' === $particles_move_bounce ),
				'attract' =>  array(
					'enable' =>  false,
					'rotateX' =>  600,
					'rotateY' =>  1200
				),
			),
		),
		'interactivity' => array(
			'detect_on' => $interactivity,
			'events'    => array(
				'onhover' => array(
					'enable' => ( 'yes' === $interactivity_events_onhover ),
					'mode'   => $interactivity_events_onhover_mode,
				),
				'onclick' => array(
					'enable' => ( 'yes' === $interactivity_events_onclick ),
					'mode'   => $interactivity_events_onclick_mode,
				),
				'resize'  => true,
			),
			'modes'     => array(
				'grab'    => array(
					'distance'    => $interactivity_modes_grab_distance,
					'line_linked' => array(
						'opacity' => ( $interactivity_modes_grab_line_linked_opacity / 100 ),
					),
				),
				'bubble'  => array(
					'distance' => $interactivity_modes_bubble_distance,
					'size'     => $interactivity_modes_bubble_size,
					'duration' => $interactivity_modes_bubble_duration,
					'opacity'  => ( $interactivity_modes_bubble_opacity / 100 ),
					'speed'    => $interactivity_modes_bubble_speed,
				),
				'repulse' => array(
					'distance' => $interactivity_modes_repulse_distance,
					'duration' => ( $interactivity_modes_repulse_duration / 10 ),
				),
				'push'    => array(
					'particles_nb' => $interactivity_modes_push_particles_nb,
				),
				'remove'  => array(
					'particles_nb' => $interactivity_modes_remove_particles_nb,
				),
			),
		),
		'retina_detect' => ( 'yes' === $retina_detect ),
	));

	$output .= '<div  id="' . implode('-', $css_classes) . '" class="ssc-particles " data-ssc-particles=\'' . $p_sets . '\' ></div>';
}

$output .= '</section>';

echo $output;
