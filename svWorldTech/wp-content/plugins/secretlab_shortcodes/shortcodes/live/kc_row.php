<#

	if( data === undefined )
		data = {};
	var attributes = [], classes = [],
		cont_class = ['kc-row-container'],
		css_data = '', output = '',
		atts = ( data.atts !== undefined ) ? data.atts : {},
		svg1 = ( atts['svg1'] !== undefined )? atts['svg1'] : '',
		svg2 = ( atts['svg2'] !== undefined )? atts['svg2'] : '',
		svg3 = ( atts['svg3'] !== undefined )? atts['svg3'] : '',
		svg4 = ( atts['svg4'] !== undefined )? atts['svg4'] : '',
		svg5 = ( atts['svg5'] !== undefined )? atts['svg5'] : '',
		svg6 = ( atts['svg6'] !== undefined )? atts['svg6'] : '',
		svg7 = ( atts['svg7'] !== undefined )? atts['svg7'] : '',
		svg8 = ( atts['svg8'] !== undefined )? atts['svg8'] : '',
        img_s1 = ( atts['img_s1'] !== undefined )? atts['img_s1'] : 'full',
        img_s2 = ( atts['img_s2'] !== undefined )? atts['img_s2'] : 'full',
        img_s3 = ( atts['img_s3'] !== undefined )? atts['img_s3'] : 'full',
        img_s4 = ( atts['img_s4'] !== undefined )? atts['img_s4'] : 'full',
        img_s5 = ( atts['img_s5'] !== undefined )? atts['img_s5'] : 'full',
        img_s6 = ( atts['img_s6'] !== undefined )? atts['img_s6'] : 'full',
        img_s7 = ( atts['img_s7'] !== undefined )? atts['img_s7'] : 'full',
        img_s8 = ( atts['img_s8'] !== undefined )? atts['img_s8'] : 'full',
        anim1 = ( atts['anim1'] !== undefined )? atts['anim1'] : '',
        anim2 = ( atts['anim2'] !== undefined )? atts['anim2'] : '',
        anim3 = ( atts['anim3'] !== undefined )? atts['anim3'] : '',
        anim4 = ( atts['anim4'] !== undefined )? atts['anim4'] : '',
        anim5 = ( atts['anim5'] !== undefined )? atts['anim5'] : '',
        anim6 = ( atts['anim6'] !== undefined )? atts['anim6'] : '',
        anim7 = ( atts['anim7'] !== undefined )? atts['anim7'] : '',
        anim8 = ( atts['anim8'] !== undefined )? atts['anim8'] : '',
		svg = '',


        particles = ( atts['particles'] !== undefined )? atts['particles'] : '';
        particles_number_value = ( atts['particles_number_value'] !== undefined )? atts['particles_number_value'] : 80;
        particles_number_density = ( atts['particles_number_density'] !== undefined )? atts['particles_number_density'] : '';
        particles_number_density_value_area = ( atts['particles_number_density_value_area'] !== undefined )? atts['particles_number_density_value_area'] : 800;
        particles_color_random = ( atts['particles_color_random'] !== undefined )? atts['particles_color_random'] : 'yes';
        particles_colors = ( atts['particles_colors'] !== undefined )? atts['particles_colors'] : [];
        particles_shape_type = ( atts['particles_shape_type'] !== undefined )? atts['particles_shape_type'] : 'circle';
        particles_shape_stroke_width = ( atts['particles_shape_stroke_width'] !== undefined )? atts['particles_shape_stroke_width'] : 0;
        particles_stroke_shape_color = ( atts['particles_stroke_shape_color'] !== undefined )? atts['particles_stroke_shape_color'] : '#000';
        particles_shape_polygon = ( atts['particles_shape_polygon'] !== undefined )? atts['particles_shape_polygon'] : 5;
        particles_opacity = ( atts['particles_opacity'] !== undefined )? atts['particles_opacity'] : 50;
        particles_opacity_random = ( atts['particles_opacity_random'] !== undefined )? atts['particles_opacity_random'] : '';
        particles_size = ( atts['particles_size'] !== undefined )? atts['particles_size'] : 3;
        particles_random = ( atts['particles_random'] !== undefined )? atts['particles_random'] : 'yes';
        particles_line = ( atts['particles_line'] !== undefined )? atts['particles_line'] : 'yes';
        particles_line_distance = ( atts['particles_line_distance'] !== undefined )? atts['particles_line_distance'] : 150;
        particles_line_color = ( atts['particles_line_color'] !== undefined )? atts['particles_line_color'] : '#000';
        particles_line_opacity = ( atts['particles_line_opacity'] !== undefined )? atts['particles_line_opacity'] : 50;
        particles_line_width = ( atts['particles_line_width'] !== undefined )? atts['particles_line_width'] : 1;
        particles_move = ( atts['particles_move'] !== undefined )? atts['particles_move'] : 'yes';
        particles_move_speed = ( atts['particles_move_speed'] !== undefined )? atts['particles_move_speed'] : 6;
        particles_move_direction = ( atts['particles_move_direction'] !== undefined )? atts['particles_move_direction'] : 'none';
        particles_move_random = ( atts['particles_move_random'] !== undefined )? atts['particles_move_random'] : '';
        particles_move_straight = ( atts['particles_move_straight'] !== undefined )? atts['particles_move_straight'] : '';
        particles_move_out_mode = ( atts['particles_move_out_mode'] !== undefined )? atts['particles_move_out_mode'] : 'out';
        particles_move_bounce = ( atts['particles_move_bounce'] !== undefined )? atts['particles_move_bounce'] : '';
        interactivity = ( atts['interactivity'] !== undefined )? atts['interactivity'] : 'canvas';
        interactivity_events_onhover = ( atts['interactivity_events_onhover'] !== undefined )? atts['interactivity_events_onhover'] : 'yes';
        interactivity_events_onhover_mode = ( atts['interactivity_events_onhover_mode'] !== undefined )? atts['interactivity_events_onhover_mode'] : 'repulse';
        interactivity_events_onclick = ( atts['interactivity_events_onclick'] !== undefined )? atts['interactivity_events_onclick'] : 'yes';
        interactivity_events_onclick_mode = ( atts['interactivity_events_onclick_mode'] !== undefined )? atts['interactivity_events_onclick_mode'] : 'push';
        interactivity_modes_grab_distance = ( atts['interactivity_modes_grab_distance'] !== undefined )? atts['interactivity_modes_grab_distance'] : 400;
        interactivity_modes_grab_line_linked_opacity = ( atts['interactivity_modes_grab_line_linked_opacity'] !== undefined )? atts['interactivity_modes_grab_line_linked_opacity'] : 100;
        interactivity_modes_bubble_distance = ( atts['interactivity_modes_bubble_distance'] !== undefined )? atts['interactivity_modes_bubble_distance'] : 400;
        interactivity_modes_bubble_size = ( atts['interactivity_modes_bubble_size'] !== undefined )? atts['interactivity_modes_bubble_size'] : 40;
        interactivity_modes_bubble_duration = ( atts['interactivity_modes_bubble_duration'] !== undefined )? atts['interactivity_modes_bubble_duration'] : 2;
        interactivity_modes_bubble_opacity = ( atts['interactivity_modes_bubble_opacity'] !== undefined )? atts['interactivity_modes_bubble_opacity'] : 80;
        interactivity_modes_bubble_speed = ( atts['interactivity_modes_bubble_speed'] !== undefined )? atts['interactivity_modes_bubble_speed'] : 3;
        interactivity_modes_repulse_distance = ( atts['interactivity_modes_repulse_distance'] !== undefined )? atts['interactivity_modes_repulse_distance'] : 200;
        interactivity_modes_repulse_duration = ( atts['interactivity_modes_repulse_duration'] !== undefined )? atts['interactivity_modes_repulse_duration'] : 4;
        interactivity_modes_push_particles_nb = ( atts['interactivity_modes_push_particles_nb'] !== undefined )? atts['interactivity_modes_push_particles_nb'] : 4;
        interactivity_modes_remove_particles_nb = ( atts['interactivity_modes_remove_particles_nb'] !== undefined )? atts['interactivity_modes_remove_particles_nb'] : 2;
        retina_detect = ( atts['retina_detect'] !== undefined )? atts['retina_detect'] : 'yes';

classes = kc.front.el_class( atts );
classes.push( 'kc_row' );

if( atts['row_class'] !== undefined && atts['row_class'] !== '' )
	classes.push( atts['row_class'] );

if( atts['full_height'] !== undefined && atts['full_height'] !== '' ){

	if( atts['content_placement'] !== undefined && atts['content_placement'] == 'middle' )
		attributes.push( 'data-kc-fullheight="middle-content"' );
	else attributes.push( 'data-kc-fullheight="true"' );

}

if( atts['column_align'] === undefined || atts['column_align'] === '' )
	atts['column_align'] = 'center';

if( atts['equal_height'] !== undefined && atts['equal_height'] !== '' ){

	attributes.push( 'data-kc-equalheight="true"' );
	attributes.push( 'data-kc-equalheight-align="' + atts['column_align'] + '"' );
}

if( atts['use_container'] !== undefined && atts['use_container'] == 'yes' )
	cont_class.push( 'kc-container' );

if( atts['container_class'] !== undefined && atts['container_class'] !== '' )
	cont_class.push( atts['container_class'] );

if( atts['css'] !== undefined && atts['css'] !== '' )
	classes .push( atts['css'].split('|')[0] );

if( atts['video_bg'] !== undefined && atts['video_bg'] === 'yes' ){

	var video_bg_url = atts['video_bg_url'];

	if( atts['video_bg_url'] !== undefined ){

		classes.push('kc-video-bg');
		attributes.push('data-kc-video-bg="'+atts['video_bg_url']+'"');
		css_data += 'position: relative;';

		if( atts['video_options'] !== undefined ){
			attributes.push('data-kc-video-options="'+atts['video_options']+'"');
		}

	}
}

if( atts['row_id'] !== undefined && atts['row_id'] !== '' )
	attributes.push( 'id="'+atts['row_id']+'"' );


if( atts['force'] !== undefined && atts['force'] == 'yes'  ){
    if( atts['use_container'] !== undefined && atts['use_container'] == 'yes' )
        attributes.push( 'data-kc-fullwidth="row"' );
    else
        attributes.push( 'data-kc-fullwidth="content"' );
}

if( atts['video_bg_url'] === undefined || atts['video_bg'] !== 'yes' )
{
	if( atts['parallax'] !== undefined )
	{

		attributes.push( 'data-kc-parallax="true"' );

		if( atts['parallax'] == 'yes-new' )
		{
			var bg_image = '<?php echo admin_url('/admin-ajax.php?action=kc_get_thumbn&size=full&id='); ?>'+atts['parallax_image'];
			css_data += "background-image:url('"+bg_image+"');";
		}

	}
}

if ( 'yes' === particles ) {
        classes.push('ssc-particles-section');
}

attributes.push( 'class="'+classes.join(' ')+'"' );

if( css_data !== '' )
	attributes.push( 'style="'+css_data+'"' );

output += '<section '+attributes.join(' ')+'>';

	output += '<div class="befbgr" data-ssc-svg="'+svg1+'" data-ssc-img-s="'+img_s1+'" data-ssc-img-anim="'+anim1+' anif"></div>';

	output += '<div class="befbgr" data-ssc-svg="'+svg2+'" data-ssc-img-s="'+img_s2+'" data-ssc-img-anim="'+anim2+' anif"></div>';




output += '<div class="aftbgr" data-ssc-svg="'+svg3+'" data-ssc-img-s="'+img_s3+'" data-ssc-img-anim="'+anim3+' anif"></div>';
output += '<div class="aftbgr" data-ssc-svg="'+svg4+'" data-ssc-img-s="'+img_s4+'" data-ssc-img-anim="'+anim4+' anif"></div>';

output += '<div class="befbgr5" data-ssc-svg="'+svg5+'" data-ssc-img-s="'+img_s5+'" data-ssc-img-anim="'+anim5+' anif"></div>';

output += '<div class="befbgr6" data-ssc-svg="'+svg6+'" data-ssc-img-s="'+img_s6+'" data-ssc-img-anim="'+anim6+' anif"></div>';

output += '<div class="aftbgr7" data-ssc-svg="'+svg7+'" data-ssc-img-s="'+img_s7+'" data-ssc-img-anim="'+anim7+' anif"></div>';

output += '<div class="aftbgr8" data-ssc-svg="'+svg8+'" data-ssc-img-s="'+img_s8+'" data-ssc-img-anim="'+anim8+' anif"></div>';

output += '<div class="'+cont_class.join(' ')+'">';

output += '<div class="kc-wrap-columns">'+data.content+'</div>';

output += '</div>';


if ( 'yes' === particles ) {

var c_s = [],
p_sets = {};

if( '' == particles_color_random ) {
for( var particles_color in particles_colors ) {
if(particles_color.color !== undefined){
c_s.push(particles_color.color);
}
}
} else {
c_s = 'random';
}

p_sets = {
"particles": {
"number": {
"value": particles_number_value,
"density": {
"enable": ( 'yes' === particles_number_density ),
"value_area": particles_number_density_value_area
}
},
"color": {
"value": c_s
},
"shape": {
"type": particles_shape_type,
"stroke": {
"width": particles_shape_stroke_width,
"color": particles_stroke_shape_color
},
"polygon": {
"nb_sides": particles_shape_polygon
}
},
"opacity": {
"value": ( particles_opacity / 100 ),
"random": ( 'yes' === particles_opacity_random ),
"anim": {
"enable": false,
"speed": 1,
"opacity_min": 0.1,
"sync": false
}
},
"size": {
"value": particles_size,
"random": ( 'yes' === particles_random ),
"anim": {
"enable": false,
"speed": 40,
"size_min": 0.1,
"sync": false
}
},
"line_linked": {
"enable": ( 'yes' === particles_line ),
"distance": particles_line_distance,
"color": particles_line_color,
"opacity": ( particles_line_opacity / 100 ),
"width": particles_line_width
},
"move": {
"enable": ( 'yes' === particles_move ),
"speed": particles_move_speed,
"direction": particles_move_direction,
"random": ( 'yes' === particles_move_random ),
"straight": ( 'yes' === particles_move_straight ),
"out_mode": particles_move_out_mode,
"bounce": ( 'yes' === particles_move_bounce ),
"attract": {
"enable": false,
"rotateX": 600,
"rotateY": 1200
}
}
},
"interactivity": {
"detect_on": interactivity,
"events": {
"onhover": {
"enable": ( 'yes' === interactivity_events_onhover ),
"mode": interactivity_events_onhover_mode
},
"onclick": {
"enable": ( 'yes' === interactivity_events_onclick ),
"mode": interactivity_events_onclick_mode
},
"resize": true
},
"modes": {
"grab": {
"distance": interactivity_modes_grab_distance,
"line_linked": {
"opacity": ( interactivity_modes_grab_line_linked_opacity / 100 )
}
},
"bubble": {
"distance": interactivity_modes_bubble_distance,
"size": interactivity_modes_bubble_size,
"duration": interactivity_modes_bubble_duration,
"opacity": ( interactivity_modes_bubble_opacity / 100 ),
"speed": interactivity_modes_bubble_speed
},
"repulse": {
"distance": interactivity_modes_repulse_distance,
"duration": ( interactivity_modes_repulse_duration / 10 )
},
"push": {
"particles_nb": interactivity_modes_push_particles_nb
},
"remove": {
"particles_nb": interactivity_modes_remove_particles_nb
}
}
},
"retina_detect": ( 'yes' === retina_detect )
};


p_sets = JSON.stringify( p_sets );

output += '<div  id="'+classes.join('-')+'" class="ssc-particles " data-ssc-particles=\''+p_sets+'\' ><h3>For best perfomance, the particles has been disabled in this editing mode.</h3></div>';
}

output += '</section>';

data.callback = function( wrp, $ ){
	kc_front.init( wrp );
    kc_front.ssc_svg_refresh(wrp);
}

#>

{{{output}}}
