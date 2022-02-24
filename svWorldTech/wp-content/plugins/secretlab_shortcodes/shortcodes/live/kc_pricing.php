<#

if( data === undefined )
	var data = {};

var atts		= ( data.atts !== undefined ) ? data.atts : {},
	desc		= ( atts['desc'] !== undefined )? kc.tools.base64.decode( atts['desc'] ) : '',
	show_icon_header	= ( atts['show_icon_header'] !== undefined )? atts['show_icon_header'] : '',
	icon_header		= ( atts['icon_header'] !== undefined && atts['icon_header'] !== '__empty__' )? atts['icon_header'] : 'fa-rocket',
	price		= ( atts['price'] !== undefined )? atts['price'] : '',
	price_suffix = ( atts['price_suffix'] !== undefined )? atts['price_suffix'] : '',
	title		= ( atts['title'] !== undefined && atts['title'] !== '__empty__' )? atts['title'] : '',
	subtitle	= ( atts['subtitle'] !== undefined && atts['subtitle'] !== '__empty__' )? atts['subtitle'] : '',
    description	= ( atts['description'] !== undefined && atts['description'] !== '__empty__' )? atts['description'] : '',
	el_class	= ( atts['custom_class'] !== undefined )? atts['custom_class'] : '',
	currency	= ( atts['currency'] !== undefined )? atts['currency'] : '',
	show_on_top	= ( atts['show_on_top'] !== undefined )? atts['show_on_top'] : '',
	duration	= ( atts['duration'] !== undefined )? atts['duration'] : '',
    duration_position	= ( atts['duration_position'] !== undefined )? atts['duration_position'] : '',
	show_icon	= ( atts['show_icon'] !== undefined )? atts['show_icon'] : '',
	icon	    = ( atts['icon'] !== undefined && atts['icon'] !== '__empty__')? atts['icon'] : 'fa-check',
	button_text = ( atts['button_text'] !== undefined )? atts['button_text'] : '',
	show_button = ( atts['show_button'] !== undefined )? atts['show_button'] : '||',
	button_link = ( atts['button_link'] !== undefined )? atts['button_link'] : '||',
	layout	    = ( atts['layout'] !== undefined )? atts['layout'] : '1',
sticker		= ( atts['sticker'] !== undefined  )? atts['sticker'] : '0',
stikertext		= ( atts['stikertext'] !== undefined )? atts['stikertext'] : '',
	prefix = ( atts['prefix'] !== undefined )? atts['prefix'] : '',
	suffix = ( atts['suffix'] !== undefined )? atts['suffix'] : '',
	prefix_position = ( atts['prefix_position'] !== undefined )? atts['prefix_position'] : 'span',
	suffix_position = ( atts['suffix_position'] !== undefined )? atts['suffix_position'] : 'span',
    price_suffix_position = ( atts['price_suffix_position'] !== undefined )? atts['price_suffix_position'] : 'span',
	link_url    = '#',
	data_icon_header = '',
	data_title  = '',
	data_subtitle  = '',
	data_description  = '',
	data_price  = '',
	data_currency = '',
	data_duration = '',
	data_desc   = '',
	data_button = '',
stickerout = '',
	link_arr	= [],
	wrap_class	= kc.front.el_class( atts ),
	show_svg = ( atts['show_svg'] !== undefined )? atts['show_svg'] : '',
	svg = ( atts['svg'] !== undefined )? atts['svg'] : '',
    button_icon = ( atts['button_icon'] !== undefined )? atts['button_icon'] : '',
    button_svg = ( atts['button_svg'] !== undefined )? atts['button_svg'] : '',
    button_img = ( atts['button_img'] !== undefined )? atts['button_img'] : '',
    b_i = ( atts['b_i'] !== undefined )? atts['b_i'] : '',
    after_button_description = ( atts['after_button_description'] !== undefined )? atts['after_button_description'] : '',
    data_after_button_description = ( atts['data_after_button_description'] !== undefined )? atts['data_after_button_description'] : '',
    button_icon_type = ( atts['button_icon_type'] !== undefined )? atts['button_icon_type'] : 'none',
    button_icon_position = ( atts['button_icon_position'] !== undefined )? atts['button_icon_position'] : 'before',
    button_img_size = ( atts['button_img_size'] !== undefined )? atts['button_img_size'] : 'full'
    sizes 		= ['full', 'thumbnail', 'medium', 'large'],
    image_url 			= '';

wrap_class.push( 'kc-pricing-tables');
wrap_class.push( 'kc-pricing-layout-' + layout );


if ( el_class !== '' )
	wrap_class.push( el_class );

if ( show_on_top === 'yes' )
	wrap_class.push( 'kc-price-before-currency' );



switch ( parseInt( sticker ) ) {
    case 0:
    stickerout = '';
    break;
    case 1:
    stickerout = '<div class="sticker st1">' + stikertext + '</div>';
    break;
    case 2:
    stickerout = '<div class="sticker st2"><div>' + stikertext + '</div></div>';
    break;
    case 3:
    stickerout = '<div class="sticker st3"><div>' + stikertext + '</div></div>';
    break;
}

if ( show_icon_header === 'yes' ) {
	if ( show_svg == 'yes' && '' !== svg ) {
		data_icon_header += '<div class="content-svg-header" data-ssc-svg="'+svg+'"></div>';
	} else {
		data_icon_header += '<div class="content-icon-header">';
		data_icon_header += '<i class="' + icon_header + '"></i>';
		data_icon_header += '</div>';
	}

}

if ( title !== '' ) {

	data_title += '<div class="content-title">';
		if ( subtitle !== '' ) {

			data_title += '<div>' +  title + '</div>';
			data_title += '<div class="content-sub-title">' +  subtitle + '</div>';

		} else {
			data_title += title;
		}
	data_title += '</div>';

}

if ( description !== '' ) {

data_description += '<div class="description">' + description + '</div>';

}

if ( after_button_description !== '' ) {

data_after_button_description += '<div class="after-button-description">' + after_button_description + '</div>';

}

if ( price !== '' ) {
    if( price_suffix !== '' ){
        price_suffix = '<' + price_suffix_position + '>' + price_suffix + '</' + price_suffix_position + '>';
    }
	data_price += '<span class="content-price">' + price + price_suffix + '</span>';

}

if ( currency !=='' ) {

	data_currency += '<span class="content-currency">' + currency + '</span>';

}

if ( duration !== '' ) {
	data_duration += '<span class="content-duration">' + duration + '</span>';
}

if ( desc !== '' ) {
	var pros = desc.split("\n");

	if( pros.length > 0 ) {

		data_desc += '<ul class="content-desc">';

		for( var i=0; i < pros.length ; i++) {
			if ( show_icon === 'yes' ) {
				data_desc += '<li><i class="' + icon + '"></i> ' + pros[i] + ' </li>';
			} else {
				data_desc += '<li>' + pros[i] + ' </li>';
			}
		}
		data_desc += '</ul>';

	}

}

if ( show_button === 'yes' ) {

switch ( button_icon_type ) {
    case 'svg':
    if( '' !== button_svg ){
        b_i = '<div class="button-svg" data-ssc-svg="' + button_svg + '"></div>';
    }
    break;
    case 'icon':
    if( '' !== button_icon ) {
        b_i = '<div class="button-icon"><i class="' + button_icon + '"></i></div>';
    }
    break;
    case 'img':
    if( '' !== button_img ){
        if ( sizes.indexOf( button_img_size ) > -1  ) {
            image_url 	= ajaxurl + '?action=kc_get_thumbn&id=' + button_img + '&size=' + button_img_size ;
        }else if( button_img_size.indexOf('x') > 0 ){
            image_url 	= ajaxurl + '?action=kc_get_thumbn_size&id=' + button_img + '&size=' + button_img_size ;
        }
        if( image_url !== '' ) {
            b_i = '<div class="button-img"><img src="'+image_url+'" alt="'+title+'"></div>';
        }
    }
    break;
}

	if ( button_link !== '' ) {
		link_arr = button_link.split('|');

		if ( link_arr[0] !== undefined )
			link_url = link_arr[0];
		else
			link_url = '#';
	}

	if('5' === layout){

		if ( show_on_top == 'yes' ) {
            if ( 'yes' === duration_position ) {
                button_price = data_duration + data_price + data_currency;
            } else {
                button_price = data_price + data_currency + data_duration;
            }
		} else {
            if ( 'yes' === duration_position ) {
button_price = data_duration + data_currency + data_price;
            } else {
button_price = data_currency + data_price + data_duration;
            }
		}

		if( '' !== prefix ){
			prefix = '<' + prefix_position + '>' + prefix + '</' + prefix_position + '>';
		}

		if( '' !== suffix ){
			suffix = '<' + suffix_position + '>' + suffix + '</' + suffix_position + '>';
		}

		button_text = prefix + ' ' + button_text + ' ' + button_price + ' ' + suffix;
	}

	data_button += '<div class="content-button">';
        if ( 'before' == button_icon_position ) {
            data_button += '<a href="' + link_url + '">' + b_i + button_text + '</a>';
        } else if( 'after' == button_icon_position ) {
            data_button += '<a href="' + link_url + '">' + button_text + b_i + '</a>';
        } else {
            data_button += '<a href="' + link_url + '">' + button_text + '</a>';
        }
	data_button += '</div>';

}

#>

<div class="{{{wrap_class.join(' ')}}}">

	<#

	switch ( parseInt( layout ) ) {
		case 2:
	#>
    {{{stickerout}}}
			<div class="header-pricing">
				{{{data_title}}}
				{{{data_description}}}
				<div class="kc-pricing-price">
				<#	if ( show_on_top === 'yes' ) {
                    if ( 'yes' === duration_position ) { #>
                    {{{data_duration}}}
                    {{{data_price}}}
                    {{{data_currency}}}
                    <#  } else { #>
                    {{{data_price}}}
                    {{{data_currency}}}
                    {{{data_duration}}}
                    <#  }
				} else {
                    if ( 'yes' === duration_position ) { #>
                        {{{data_duration}}}
                        {{{data_currency}}}
                        {{{data_price}}}
                    <# } else { #>
                        {{{data_currency}}}
                        {{{data_price}}}
                        {{{data_duration}}}
                    <# }
                } #>
				</div>
			</div>
			{{{data_desc}}}
			{{{data_button}}}
			{{{data_after_button_description}}}
		<#
		break;

		case 3:
		#>
            {{{stickerout}}}
            {{{data_icon_header}}}
			{{{data_title}}}
            {{{data_description}}}
			{{{data_desc}}}
			<div class="kc-pricing-price">
				<# if ( show_on_top === 'yes' ) {
                    if ( 'yes' === duration_position ) { #>
                        {{{data_duration}}}
                        {{{data_price}}}
                        {{{data_currency}}}
                    <# } else { #>
                        {{{data_price}}}
                        {{{data_currency}}}
                        {{{data_duration}}}
                    <# }
				    } else {
                    if ( 'yes' === duration_position ) { #>
                        {{{data_duration}}}
                        {{{data_currency}}}
                        {{{data_price}}}
                    <# } else { #>
                        {{{data_currency}}}
                        {{{data_price}}}
                        {{{data_duration}}}
                    <# }
                    } #>
			</div>
			{{{data_button}}}
            {{{data_after_button_description}}}
		<#
		break;

		case 4:
		#>
            {{{stickerout}}}
			<div class="header-pricing">
			{{{data_icon_header}}}
			{{{data_title}}}
			<div class="kc-pricing-price">
				<# if ( show_on_top === 'yes' ) {
                    if ( 'yes' === duration_position ) { #>
                        {{{data_duration}}}
                        {{{data_price}}}
                        {{{data_currency}}}
                    <# } else { #>
                        {{{data_price}}}
                        {{{data_currency}}}
                        {{{data_duration}}}
                    <# }
                    } else {
                    if ( 'yes' === duration_position ) { #>
                        {{{data_duration}}}
                        {{{data_currency}}}
                        {{{data_price}}}
                    <# } else { #>
                        {{{data_currency}}}
                        {{{data_price}}}
                        {{{data_duration}}}
                    <# }
                    } #>
			</div>
			</div>
            {{{data_description}}}
			{{{data_desc}}}
			{{{data_button}}}
            {{{data_after_button_description}}}
		<#
		break;

		case 5:
		#>
            {{{stickerout}}}
			<div class="header-pricing">
			{{{data_icon_header}}}
			{{{data_title}}}
			</div>
            {{{data_description}}}
			{{{data_desc}}}
			{{{data_button}}}
            {{{data_after_button_description}}}
		<#
		break;

		default:
		#>
            {{{stickerout}}}
			<div class="header-pricing">
				{{{data_title}}}
				{{{data_icon_header}}}
				<div class="kc-pricing-price">
					<# if ( show_on_top === 'yes' ) {
                        if ( 'yes' === duration_position ) { #>
                            {{{data_duration}}}
                            {{{data_price}}}
                            {{{data_currency}}}
                        <# } else { #>
                            {{{data_price}}}
                            {{{data_currency}}}
                            {{{data_duration}}}
                        <# }
                        } else {
                            if ( 'yes' === duration_position ) { #>
                                {{{data_duration}}}
                                {{{data_currency}}}
                                {{{data_price}}}
                            <# } else { #>
                                {{{data_currency}}}
                                {{{data_price}}}
                                {{{data_duration}}}
                            <# }
                            } #>
				</div>
			</div>
            {{{data_description}}}
			{{{data_desc}}}
			{{{data_button}}}
            {{{data_after_button_description}}}
	<#
	}
	#>

</div>

<#
data.callback = function( wrp, $ ){
    kc_front.ssc_svg_refresh(wrp)
}
#>