<#
        if( data === undefined )
        data = {};
        var wrp_classes = [],
        output = '',
        icon_image = [],
        title_c = '',
        subtitle_c = '',
        read_more = '',
        description_c = '',
        likon = '',
        icon_n = '',
        bgr_icon_image = '',
        atts = ( data.atts !== undefined ) ? data.atts : {},
        template = ( atts['template'] !== undefined && atts['template'] !== '__empty__' )? atts['template'] : '',
        icon_type = ( atts['icon_type'] !== undefined && atts['icon_type'] !== '__empty__' )? atts['icon_type'] : '',
        icon = ( atts['icon'] !== undefined && atts['icon'] !== '__empty__' )? atts['icon'] : '',
        img = ( atts['img'] !== undefined && atts['img'] !== '__empty__' )? atts['img'] : '',
        svg = ( atts['svg'] !== undefined && atts['svg'] !== '__empty__' )? atts['svg'] : '',
        text = ( atts['text'] !== undefined && atts['text'] !== '__empty__' )? atts['text'] : '',
        isize = ( atts['isize'] !== undefined && atts['isize'] !== '__empty__' )? atts['isize'] : '',
        is_icon_link = ( atts['is_icon_link'] !== undefined && atts['is_icon_link'] !== '__empty__' )? atts['is_icon_link'] : '',
        icon_link = ( atts['icon_link'] !== undefined && atts['icon_link'] !== '__empty__' )? atts['icon_link'] : '',
        show_icon_link = ( atts['show_icon_link'] !== undefined && atts['show_icon_link'] !== '__empty__' )? atts['show_icon_link'] : '',
        iconleft = ( atts['iconleft'] !== undefined && atts['iconleft'] !== '__empty__' )? atts['iconleft'] : '',
        icon_link_svg = ( atts['icon_link_svg'] !== undefined && atts['icon_link_svg'] !== '__empty__' )? atts['icon_link_svg'] : '',
        linkicon = ( atts['linkicon'] !== undefined && atts['linkicon'] !== '__empty__' )? atts['linkicon'] : '',
        bgr_type = ( atts['bgr_type'] !== undefined && atts['bgr_type'] !== '__empty__' )? atts['bgr_type'] : '',
        bgr_icon = ( atts['bgr_icon'] !== undefined && atts['bgr_icon'] !== '__empty__' )? atts['bgr_icon'] : '',
        bgr_img = ( atts['bgr_img'] !== undefined && atts['bgr_img'] !== '__empty__' )? atts['bgr_img'] : '',
        bgr_text = ( atts['bgr_text'] !== undefined && atts['bgr_text'] !== '__empty__' )? atts['bgr_text'] : '',
        bsize = ( atts['bsize'] !== undefined && atts['bsize'] !== '__empty__' )? atts['bsize'] : '',
        title = ( atts['title'] !== undefined && atts['title'] !== '__empty__' )? atts['title'] : '',
        is_title_link = ( atts['is_title_link'] !== undefined && atts['is_title_link'] !== '__empty__' )? atts['is_title_link'] : '',
        title_link = ( atts['title_link'] !== undefined && atts['title_link'] !== '__empty__' )? atts['title_link'] : '',
        subtitle = ( atts['subtitle'] !== undefined && atts['subtitle'] !== '__empty__' )? atts['subtitle'] : '',
        limit_lines = ( atts['limit_lines'] !== undefined && atts['limit_lines'] !== '__empty__' )? atts['limit_lines'] : '',
        link_text = ( atts['link_text'] !== undefined && atts['link_text'] !== '__empty__' )? atts['link_text'] : '',
        link_url = ( atts['link_url'] !== undefined && atts['link_url'] !== '__empty__' )? atts['link_url'] : '',
        el_class = ( atts['el_class'] !== undefined && atts['el_class'] !== '__empty__' )? atts['el_class'] : '',
        isize = ( atts['isize'] !== undefined && atts['isize'] !== '__empty__' )? atts['isize'] : '',
        content = (data.content === undefined) ? '' : data.content,
        style = '';
    wrp_classes = kc.front.el_class( atts );

    if( is_icon_link != '' && is_icon_link === 'yes' && icon_link != '' ) {
        icon_link = icon_link.split('|');
        icon_tar = ( icon_link[2] === '_blank' ) ? 'target="'+ icon_link[2] +'"' : '';
    }

    switch ( icon_type ){
        case 'icon':
        if( is_icon_link != '' && is_icon_link === 'yes' && icon_link != '' ){
            icon_c = '<div class="c_icon" style="margin-top: -'+bsize+'px; width: '+bsize+'px; height: '+bsize+'px;"><a href="'+ icon_link[0] +'" '+ icon_tar +'><i class="'+icon+'" style="font-size:'+isize+'px;"></i></a></div>';

            icon_n = '<div class="c_icon" ><a href="'+ icon_link[0] +'" '+ icon_tar +'><i class="'+icon+'" style=" font-size: '+isize+'px; "></i></a></div>';
        } else {
            icon_c = '<div class="c_icon" style="margin-top: -'+bsize+'px; width: '+bsize+'px; height: '+bsize+'px;"><i class="'+icon+'" style=" font-size: '+isize+'px;"></i></div>';

            icon_n = '<div class="c_icon" ><i class="'+icon+'" style=" font-size: '+isize+'px; "></i></div>';
        }
        break;

        case 'img':
            icon_image = ajaxurl + '?action=kc_get_thumbn&size=full&id=' + img;
        if( is_icon_link != '' && is_icon_link === 'yes' && icon_link != '' ){
        icon_c = '<div class="c_img" style="margin-top: -'+bsize+'px; line-height:'+bsize+'px; height:'+bsize+'px; width:'+bsize+'px;"><a href="'+ icon_link[0] +'" '+ icon_tar +'><img src="'+icon_image+'" alt="'+title+'" style="max-width: '+isize+'px; max-height: '+isize+'px;margin-top: calc(('+bsize+'px - '+isize+'px)/2);"></a></div>';

        icon_n = '<div class="c_img"><a href="'+ icon_link[0] +'" '+ icon_tar +'><img src="'+icon_image+'" alt="'+title+'" style="max-width: '+isize+'px; max-height: '+isize+'px;margin-top: calc(('+bsize+'px - '+isize+'px)/2);"></a></div>';
        } else {
        icon_c = '<div class="c_img" style="margin-top: -'+bsize+'px; line-height:'+bsize+'px; height:'+bsize+'px; width:'+bsize+'px;"><img src="'+icon_image+'" alt="'+title+'" style="max-width: '+isize+'px; max-height: '+isize+'px;margin-top: calc(('+bsize+'px - '+isize+'px)/2);"></div>';

        icon_n = '<div class="c_img"><img src="'+icon_image+'" alt="'+title+'" style="max-width: '+isize+'px; max-height: '+isize+'px;margin-top: calc(('+bsize+'px - '+isize+'px)/2);"></div>';
        }
        break;

        case 'svg':
        icon_c   = '<div class="c_svg"><div data-ssc-svg="'+svg+'"></div></div>';
        if( bsize !== '' && isize !== '' ){
            var sel = '.'+wrp_classes.join('.');
            style += sel+' .c_svg{margin-top:-'+bsize+'px;width:'+isize+'px;max-height:'+isize+'px;padding-top:calc(('+bsize+'px - '+isize+'px)/2);}'+sel+' .c_svg div{height:'+isize+'px;}'+sel+' .icon_box{height:'+bsize+'px;}';
        }
        break;

        case 'text':
        icon_c = '<div class="c_text" style=" height: '+bsize+'px; margin-top: -'+bsize+'px; font-size: '+isize+'px; ">'+text+'</div>';

        icon_n = '<div class="c_text" style=" height: '+bsize+'px; margin-top: -'+bsize+'px; font-size: '+isize+'px">'+text+'</div>';
        break;
        }

        switch ( bgr_type ) {
        case 'bgr_icon':
        if( is_icon_link != '' && is_icon_link === 'yes' && icon_link != '' ){
        bgr_icon_c = '<div class="bgr_icon"><a href="'+ icon_link[0] +'" '+ icon_tar +'><i class="'+bgr_icon+'" style="font-size:'+bsize+'px; width:'+bsize+'px; height:'+bsize+'px"></i></a></div>';
        } else {
        bgr_icon_c = '<div class="bgr_icon"><i class="'+bgr_icon+'" style="font-size:'+bsize+'px; width:'+bsize+'px; height:'+bsize+'px"></i></div>';

        }

        break;

        case 'bgr_img':
            bgr_icon_image = ajaxurl + '?action=kc_get_thumbn&size=full&id=' + bgr_img;
        if( is_icon_link != '' && is_icon_link === 'yes' && icon_link != '' ){
        bgr_icon_c = '<div class="bgr_img"><a href="'+ icon_link[0] +'" '+ icon_tar +'><img src="'+bgr_icon_image+'" alt="'+title+'" style="max-width: '+bsize+'px; max-height: '+bsize+'px;"></a></div>';
        } else {
        bgr_icon_c = '<div class="bgr_img"><img src="'+bgr_icon_image+'" alt="'+title+'" style="max-width: '+bsize+'px; max-height: '+bsize+'px;"></div>';
        }

        break;

        case 'bgr_nothing':
        bgr_icon_c = '<div class="bgr_no" style="width:'+bsize+'px; height:'+bsize+'px;"><div> </div></div>';
        break;
    }

    if (title != '') {
        if( is_title_link != '' && is_title_link === 'yes' && title_link != '' ){
            title_link = title_link.split('|');
            var tar = ( title_link[2] === '_blank' ) ? 'target="'+ title_link[2] +'"' : '';
            title_c = '<div class="title"><a href="'+ title_link[0] +'" title = "'+ title +'" '+ tar +'>'+title+'</a></div>';
        } else {
            title_c = '<div class="title">'+title+'</div>';
        }
    }

    if (subtitle != '') {
        subtitle_c = '<div class="subtitle">'+subtitle+'</div>';
    }
    content = content.trim();

    if ( content != '' && content != '<p></p>' && content != '&nbsp;' && content != '</p>' && content != '<p>__empty__</p>' && content != '<br>\n' && content != '<p></p>\n' && content != '\n' && content != '\n\n' && content != '<p>none</p>' && content != '<p>none</p><p></p>' && content != 'none' && content != '<br>' ) {
        description_c = '<div class="description lines'+limit_lines+'">'+content+'</div>';
    }
    if ( show_icon_link == 'yes' ) {
        likon = ' <i class="'+ linkicon +'"></i> ';
    } else if ( show_icon_link == 'svg' && icon_link_svg !== '' ) {
        likon   = '<span data-ssc-svg="'+icon_link_svg+'"></span>';
    }
    if (link_url != '') {
        if ( 'yes' === iconleft ) {
            read_more = '<a href="'+link_url+'" class="rm pos'+iconleft+'">'+likon+link_text+'</a>';
        } else {
            read_more = '<a href="'+link_url+'" class="rm pos'+iconleft+'">'+link_text+likon+'</a>';
        }
    }

    output += '<div class="ssc_icon_box '+wrp_classes.join(' ') +' template'+template+' '+el_class+'">';

        switch ( template ){
            case '1':
                output += '<div class="icon_box">'+bgr_icon_c+icon_c+'</div>';
                output += '<div class="cont_box">'+title_c+subtitle_c+description_c+read_more+'</div>';
                break;
            case '2':
                output += '<div class="cont_box">'+title_c+subtitle_c+description_c+read_more+'</div>';
                output += '<div class="icon_box">'+bgr_icon_c+icon_c+'</div>';
                break;
            case '3':
                output += '<div class="icon_box">'+bgr_icon_c+icon_c+'</div>';
                output += '<div class="cont_box">'+title_c+subtitle_c+description_c+read_more+'</div>';
                break;
            case '4':
                output += ''+title_c+subtitle_c+'<div class="wrap">';
                output += '<div class="icon_box">'+bgr_icon_c+icon_c+'</div>';
                output += '<div class="cont_box">'+description_c+read_more+'</div></div>';
                break;
            case '5':
                output += ''+title_c+subtitle_c+'<div class="wrap">';
                output += '<div class="cont_box">'+description_c+read_more+'</div>';
                output += '<div class="icon_box">'+bgr_icon_c+icon_c+'</div></div>';
                break;
            case '6':
                output += ''+title_c+subtitle_c+'';
                output += '<div class="icon_box">'+bgr_icon_c+icon_c+'</div>';
                output += '<div class="cont_box">'+description_c+read_more+'</div>';
                break;
            case '7':
                output += '<div class="icon_box">'+bgr_icon_c+'</div>';
                output += '<div class="cont_box" style="height:'+bsize+'px;margin-top: -'+bsize+'px;">'+icon_n+title_c+subtitle_c+read_more+'</div>';
                break;
            case '8':
                output += '<div class="icon_box">'+bgr_icon_c+'</div>';
                output += '<div class="cont_box" style="height:'+bsize+'px; margin-top: -'+bsize+'px;">'+title_c+subtitle_c+icon_n+read_more+'</div>';
                break;
            case '9':
                output += '<div class="icon_box">'+bgr_icon_c+icon_c+'</div>';
                output += '<div class="cont_box">'+title_c+subtitle_c+description_c+read_more+'</div>';
                break;
            case '10':
                output += '<div class="icon_box">'+bgr_icon_c+icon_c+title_c+subtitle_c+'</div>';
                output += '<div class="cont_box">'+description_c+read_more+'</div>';
                break;
            case '11':
                output += '<div class="tc"><div class="icon_box">'+bgr_icon_c+icon_c+'</div><div class="title_box">'+title_c+subtitle_c+'</div></div><div class="cont_box">'+description_c+read_more+'</div>';
                break;
            case '12':
                output += '<div class="tc"><div class="title_box">'+title_c+subtitle_c+'</div><div class="icon_box">'+bgr_icon_c+icon_c+'</div></div><div class="cont_box">'+description_c+read_more+'</div>';
                break;
            case '13':
                output += ''+title_c+'';
                output += '<div class="icon_box">'+bgr_icon_c+icon_c+'</div>';
                output += '<div class="cont_box">'+subtitle_c+description_c+read_more+'</div>';
                break;
            case '14':
                output += '<div class="tbl">'+title_c+'<div class="icon_box">'+bgr_icon_c+icon_c+'</div></div>';
                output += '<div class="tbl">'+subtitle_c+'<div class="cont_box">'+description_c+read_more+'</div></div>';
                break;
            case '15':
                output += '<div class="icon_box">'+bgr_icon_c+icon_c+'</div>';
                output += '<div><div class="tbl">'+title_c+subtitle_c+'</div>';
                output += '<div class="cont_box">'+description_c+read_more+'</div></div>';
                break;
            case '16':
                output += '<div class="icon_box">'+bgr_icon_c+icon_c+'</div>';
                output += '<div><div class="tbl">'+title_c+subtitle_c+'</div>';
                output += '<div class="cont_box">'+description_c+read_more+'</div></div>';
                break;
            case '17':
                output += '<div class="icon_box">'+bgr_icon_c+icon_c+'</div>';
                output += '<div class="cont_box">'+title_c+subtitle_c+'<span>?</span>'+description_c+read_more+'</div>';
                break;
            case '18':
                output += '<div class="icon_box">'+bgr_icon_c+icon_c+'</div>';
                output += '<div class="cont_box">'+title_c+subtitle_c+description_c+read_more+'</div>';
                break;
            case '19':
                output += '<div class="cont_box">'+title_c+subtitle_c+description_c+read_more+'</div>';
                output += '<div class="icon_box">'+bgr_icon_c+icon_c+'</div>';
                break;
        }

    if(style !== ''){
        output += '<style>'+style+'</style>';
    }

        output += '</div>';

data.callback = function( wrp, $ ){
kc_front.ssc_svg_refresh(wrp);
}

#>

{{{ output }}}