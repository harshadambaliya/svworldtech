<?php
/**
 * kc_accordion_tab shortcode
 **/
$icon_align = $iconout = '';
$css_class = apply_filters( 'kc-el-class', $atts );
$css_class[] = 'kc_accordion_section';
$css_class[] = 'group';

$title = 'Title';
$icon_align = $atts['icon_align'];

$iconout .= !empty( $atts['iconarrow'] ) ? $atts['iconarrow'] : 'nat-arrow-down4';

if( isset( $atts['title'] ) )
	$title = $atts['title'];

if( isset( $atts['icon'] ) )
	$title = '<i class="'.esc_attr( $atts['icon'] ).'"></i> '.$title;

if( isset( $atts['class'] ) )
	array_push( $css_class, $atts['class'] );

$output  =  '<div class="'.esc_attr( implode(' ',$css_class) ).'"><h3 class="kc_accordion_header ui-accordion-header pos_'.$icon_align.'">'.
            '<span class="ui-accordion-header-icon ui-icon"><i class="' . $iconout . '"></i></span>'.
            '<a href="#' . sanitize_title( $title ) . '" data-prevent="scroll">' . $title . '</a>'.
		  		'</h3>'.
			  	'<div class="kc_accordion_content ui-accordion-content kc_clearfix">'.
					'<div class="kc-panel-body">'.
						( ( '' === trim( $content ) )
						? __( 'Empty section. Edit page to add content here.', 'kingcomposer' )
						: do_shortcode( str_replace('kc_accordion_tab#', 'kc_accordion_tab', $content ) ) ).
					'</div>'.
				'</div>'.
			'</div>';

echo $output;
