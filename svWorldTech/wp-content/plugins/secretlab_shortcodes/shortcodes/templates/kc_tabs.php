<?php

$title                  = $interval = $open_mouseover = $active_section = $effect_option = $class = $navigation = $auto_height = $auto_play = $tab_nav_class = $title_slider = $type = $vertical_tabs_position = '';
$vertical_tabs_template = '1';
$speed                  = 4500;
$pagination             = 'yes';
$items                  = $items1 = $items2 = 1;
extract( $atts );


$css_class = apply_filters( 'kc-el-class', $atts );

$tabs_option = array(
	'open-on-mouseover' => $open_mouseover,
	'tab-active'        => $active_section,
	'effect-option'     => $effect_option,
);

$tabs_option_data = array();
foreach ( $tabs_option as $name => $value ) {
	array_push( $tabs_option_data, 'data-' . esc_attr( $name ) . '="' . esc_attr( $value ) . '"' );
}

$css_class = array_merge( $css_class, array( 'kc_tabs', 'group' ) );

if ( isset( $css ) && ! empty( $css ) ) {
	$css_class[] = $css;
}

if ( isset( $class ) && ! empty( $class ) ) {
	$css_class[] = $class;
}

if ( 'vertical_tabs' == $type ) {

	$css_class[] = 'kc_vertical_tabs';

	if ( 'right' == $vertical_tabs_position ) {
		array_push( $css_class, 'tabs_right' );
	};

	$tab_nav_class = '';

} else if ( $type == 'slider_tabs' ) {

	$template   = $stop_on_hover = $delay = $stage_padding = '';
	$speed      = 4500;
	$pag = $progress_bar = $lazy_load = '1';
	$items      = $tablet = $mobile = 1;
	$iconleft   = 'fa-arrow-left';
	$iconright  = 'fa-arrow-right';
	$textleft = 'prev';
	$textright = 'next';

	$css_class[] = 'kc-tabs-slider';

	extract( shortcode_atts( array(
		'template'      => '',
		'items'         => '',
		'tablet'        => '',
		'mobile'        => '',
		'speed'         => '',
		'navigation'    => '',
		'iconleft'      => '',
		'iconright'     => '',
		'textleft'     => '',
		'textright'     => '',
		'pagination'    => '',
		'auto_height'   => '',
		'auto_play'     => '',
		'stop_on_hover' => '',
		'delay'         => '',
		'progress_bar'  => '',
		'stage_padding' => '',
		'lazy_load'     => '',
		'n_type'        => 'icon',
		'l_svg'         => '',
		'r_svg'         => '',
		'svg_color'     => '',
		'svg_hcolor'    => '',

	),
		$atts ) );

	$tl = '<span class="t">'.$textleft.'</span>';
	$tr = '<span class="t">'.$textright.'</span>';
	$navigationText = array( '<i class="' . $iconleft . '"></i>'. $tl, $tr .'<i class="' .  $iconright . '"></i>' );

	switch ($n_type){
        case 'svg':
            if( '' !== $l_svg || '' !== $r_svg ){
	            if( '' !== $l_svg ){
		            $navigationText[0]   = '<div class="svg">' . ssc_process_svg( $l_svg ) . '</div>' . $tl;
	            }
	            if( '' !== $r_svg ){
		            $navigationText[1]  = $tr . '<div class="svg">' . ssc_process_svg( $r_svg ) . '</div>';
	            }
            }
            break;

    }

	$owl_option = array(
		'items'          => intval( $items ) ? intval( $items ) : 1,
		'speed'          => intval( $speed ),
		'navigation'     => $navigation,
		'pagination'     => $pagination,
		'tablet'         => intval( $tablet ) ? intval( $tablet ) : 1,
		'mobile'         => intval( $mobile ) ? intval( $mobile ) : 1,
		'loop'           => true,
		'navigationText' => $navigationText,
		'autoHeight'     => $auto_height,
		'autoPlay'       => $auto_play,
		'stopOnHover'    => $stop_on_hover,
		'stagePadding'   => $stage_padding,
		'lazyLoad'       => $lazy_load,
		'progressbar'    => $progress_bar,
		'itemsCustom'    => array(
			array( 0, $mobile ),
			array( 768, $tablet ),
			array( 1000, $items ),
		),

	);

//	$owl_option = strtolower( json_encode( $owl_option ) );
	$owl_option = ( json_encode( $owl_option ) );
	echo '<div class="ssc_carousel template-' . $template . ' ' . implode( ' ', $css_class ) . '">';
	switch ( $template ) {
		case '1':
		case '4':
		case '5':

			echo '<div class="owl-carousel" data-ssc-owl-options=\'' . $owl_option . '\'>';
			echo do_shortcode( str_replace( 'kc_tabs#', 'kc_tabs', $content ) );
			echo '</div>';
			if ( $title_slider === 'yes' ) {
				echo '<ul class="kc-tabs-slider-nav kc_clearfix">';
				preg_replace_callback( '/kc_tab\s([^\]\#]+)/i', 'ssc_process_tab_title', $content );
				echo '</ul>';
			}
			break;
		case '2':
		case '3':
		case '7':
		case '8':
			if ( $title_slider === 'yes' ) {
				echo '<ul class="kc-tabs-slider-nav kc_clearfix">';
				preg_replace_callback( '/kc_tab\s([^\]\#]+)/i', 'ssc_process_tab_title', $content );
				echo '</ul>';
			}
			echo '<div class="owl-carousel" data-ssc-owl-options=\'' . $owl_option . '\'>';
			echo do_shortcode( str_replace( 'kc_tabs#', 'kc_tabs', $content ) );
			echo '</div>';
			break;
		case '6':
			if ( $title_slider === 'yes' ) {
				echo '<ul class="kc-tabs-slider-nav kc_clearfix">';
				preg_replace_callback( '/kc_tab\s([^\]\#]+)/i', 'ssc_process_tab_title', $content );
				echo '</ul>';
			}
			echo '<div class="owl-carousel" data-ssc-owl-options=\'' . $owl_option . '\'>';
			echo do_shortcode( str_replace( 'kc_tabs#', 'kc_tabs', $content ) );
			echo '</div>';
			break;

	}

        echo '</div>';

	return;

} else {
	$tab_nav_class = 'kc_tabs_nav';
}

$tabs_option_data[] = 'class="template-' . $vertical_tabs_template . ' ' . esc_attr( implode( ' ', $css_class ) ) . '"';

?>
<div <?php echo implode( ' ', $tabs_option_data ); ?>>
    <div class="kc_wrapper ui-tabs kc_clearfix">
        <ul class="<?php echo esc_attr( $tab_nav_class ); ?> ui-tabs-nav kc_clearfix">
			<?php preg_replace_callback( '/kc_tab\s([^\]\#]+)/i', 'ssc_process_tab_title', $content ); ?>
        </ul>
		<?php echo do_shortcode( str_replace( 'kc_tabs#', 'kc_tabs', $content ) ); ?>
    </div>
</div>


