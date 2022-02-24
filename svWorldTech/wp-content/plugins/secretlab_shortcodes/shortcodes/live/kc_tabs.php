<#

var output = '', tabs_option = {}, tabs_option_data = [], tab_nav_class = '', atts = ( data.atts !== undefined ) ? data.atts : {}, css_class = [], navigationText = ['prev','next'], vertical_tabs_template = '1', n_type = ( atts['n_type'] !== undefined ) ? atts['n_type'] : 'icon', l_svg = ( atts['l_svg'] !== undefined ) ? atts['l_svg'] : '', r_svg = ( atts['r_svg'] !== undefined ) ? atts['r_svg'] : '', textleft = ( atts['textleft'] !== undefined ) ? atts['textleft'] : 'prev', textright = ( atts['textright'] !== undefined ) ? atts['textright'] : 'next';
template = ( atts['template'] !== undefined ) ? atts['template'] : '1',
tabs_option['open-on-mouseover'] = (atts['open_mouseover'] !== undefined) ? atts['open_mouseover'] : '';
tabs_option['tab-active'] = (atts['active_section'] !== undefined) ? atts['active_section'] : '';
tabs_option['effect-option'] = (atts['effect_option'] !== undefined) ? atts['effect_option'] : '';

for( var n in tabs_option ){
	tabs_option_data.push( 'data-'+n+'="'+tabs_option[n]+'"' );
}

css_class = kc.front.el_class( atts );
css_class.push( 'kc_tabs' );
css_class.push( 'group' );


if( undefined !== atts['css'] && atts['css'] !== '' )
	css_class.push( atts['css'].split('|')[0] );
	
if( undefined !== atts['class'] && atts['class'] !== '' )
	css_class.push( atts['class'] );

if( undefined !== atts['type'] && atts['type'] == 'vertical_tabs' )
{
	css_class.push( 'kc_vertical_tabs' );
	
	if( undefined !== atts['vertical_tabs_position'] && atts['vertical_tabs_position'] == 'right' )
		css_class.push( 'tabs_right' );

}
else if( atts['type'] == 'slider_tabs' ){

        if( atts['iconleft'] !== '' && atts['iconright'] !== '' ){
navigationText = [ '<i class="' + atts['iconleft'] + '"></i> ' + textleft + ' ',  ' ' + textright + ' <i class="' + atts['iconright'] + '"></i>' ];
        }


switch (n_type){
case 'svg':
if( '' !== l_svg || '' !== r_svg ){
if( '' !== l_svg ){
navigationText[0]   = '<div class="svg" data-ssc-svg="' + l_svg + '"></div>' + textleft;
}
if( '' !== r_svg ){
navigationText[1]  = textright + '<div class="svg" data-ssc-svg="' + r_svg + '"></div>';
}

}
break;

}
	
	css_class.push( 'kc-tabs-slider' );
	
	var owl_option = jQuery().extend({
		'items' : 1,
		'tablet' : 1,
		'mobile' : 1,
		'speed' : 450,
		'navigation' : false,
        'navigationtext' : navigationText,
		'pagination' : true,
		'autoheight' : false,
		'autoplay' : false,
        'stoponohover' : true,
        'lazyLoad' : false,
	}, atts );
	
	owl_option = JSON.stringify( owl_option );
	
}
else{
	tab_nav_class = 'kc_tabs_nav';
}

data.callback = function( wrp ){ kc_front.tabs( wrp ) };



if( undefined !== atts['type'] && atts['type'] == 'slider_tabs' ){

#><div class="ssc_carousel template-{{ template }} {{css_class.join(' ')}}"><#
    switch ( template ) {
    case '1':
    case '4':
    case '5':


        #><div class="owl-carousel" data-ssc-owl-options="{{owl_option}}">{{{data.content}}}</div><#
        if( atts['title_slider'] !== undefined && atts['title_slider'] == 'yes' ){ #>
            <ul class="kc-tabs-slider-nav kc_clearfix">{{{ssc.front.ui.process_tab_titles(data)}}}</ul><#
        }
        break;
    case '2':
    case '3':
    case '7':
    case '8':
        if( atts['title_slider'] !== undefined && atts['title_slider'] == 'yes' ){
            #><ul class="kc-tabs-slider-nav kc_clearfix">{{{ssc.front.ui.process_tab_titles(data)}}}</ul><#
        }
        #><div class="owl-carousel" data-ssc-owl-options="{{owl_option}}">{{{data.content}}}</div><#
        break;
    case '6':
        #><ul class="kc-tabs-slider-nav kc_clearfix">{{{ssc.front.ui.process_tab_titles(data)}}}</ul><div class="owl-carousel" data-ssc-owl-options="{{owl_option}}">{{{data.content}}}</div><#
        if( atts['title_slider'] !== undefined && atts['title_slider'] == 'yes' ){ #>
        <#
        }
        break;
    }
#></div>
<# }else{ #>
    <div class="template-{{vertical_tabs_template}} {{css_class.join(' ')}}" {{{tabs_option_data.join(' ')}}}>
	<div class="kc_wrapper ui-tabs kc_clearfix">
		<ul class="{{tab_nav_class}} ui-tabs-nav kc_clearfix">
			{{{ssc.front.ui.process_tab_titles(data)}}}
		</ul>
<#

#>{{{data.content}}}</div></div><#

}
data.callback = function( wrp, $ ){
    kc_front.owl_slider(wrp);
    kc_front.ssc_slick(wrp);
    kc_front.ssc_svg_refresh(wrp)
}
#>