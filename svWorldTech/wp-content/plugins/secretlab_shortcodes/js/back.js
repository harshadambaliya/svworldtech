( function($){
    if (typeof ssc !== 'undefined') {
        window.ssc = {}
    }
    window.ssc = $.extend({
        front : {
            ui : {
                process_tab_titles : function (data) {

                    var regx = /kc_tab\s([^\]]+)/gi,
                        split = /([a-zA-Z0-9\-\_]+)="([^"]+)+"/gi,
                        html = '', atts = [], agrs;

                    while (result = regx.exec(data._content)) {

                        if (result[0] !== undefined && result[0] !== '') {
                            atts = [];

                            while (agrs = split.exec(result[0])) {
                                atts[agrs[1]] = agrs[2];
                            }

                            html += '<li>' + this.process_tab_title(atts) + '</li>';

                        }

                    }

                    return html;

                },

                process_tab_title : function (atts) {

                    var title = '',
                        adv_title = '';

                    if (atts['title'] !== undefined && atts['title'] !== '' && atts['title'] !== '__empty__')
                        title = atts['title'];

                    if (atts['advanced'] !== undefined && atts['advanced'] !== '') {

                        if (atts['adv_title'] !== undefined && atts['adv_title'] !== '')
                            adv_title = kc.tools.base64.decode(atts['adv_title']);

                        var icon = icon_class = image = image_id = image_url = image_thumbnail = image_medium = image_large = image_full = '';
                        var svurl = kc_ajax_url + '?action=kc_get_thumbn&id=';
                        var img_size = 'full';

                        if (atts['adv_icon'] !== undefined && atts['adv_icon'] !== '') {
                            icon_class = atts['adv_icon'];
                            icon = '<i class="' + atts['adv_icon'] + '"></i>';
                        }

                        if (atts['adv_image'] !== undefined && atts['adv_image'] !== '') {
                            if(atts['adv_image_size'] !== undefined && atts['adv_image_size'] !== ''){
                                img_size = atts['adv_image_size'];
                            }
                            image_id = atts['adv_image'];
                            image_url = image_full = svurl + image_id + '&size=' + img_size;
                            image_medium = svurl + image_id + '&size=medium';
                            image_large = svurl + image_id + '&size=large';
                            image_thumbnail = svurl + image_id + '&size=thumbnail';
                            image = '<img src="' + image_url + '" alt="" />';
                        }

                        adv_title = adv_title.replace(/\{icon\}/g, icon).replace(/\{icon_class\}/g, icon_class).replace(/\{title\}/g, title).replace(/\{image\}/g, image).replace(/\{image_id\}/g, image_id).replace(/\{image_url\}/g, image_url).replace(/\{image_thumbnail\}/g, image_thumbnail).replace(/\{image_medium\}/g, image_medium).replace(/\{image_large\}/g, image_large).replace(/\{image_full\}/g, image_full).replace(/\{tab_id\}/g, atts['tab_id']);

                        return adv_title;

                    } else {
                        if (atts['icon_option'] !== undefined){
                            if (atts['icon_option'] === 'yes' && atts['icon'] !== undefined && atts['icon'] !== '') {
                                title = '<i class="' + atts['icon'] + '"></i> ' + title;
                            } else if (atts['icon_option'] === 'svg' && atts['svg'] !== undefined && atts['svg'] !== '') {
                                title = '<span data-ssc-svg="' + atts['svg'] + '"></span>' + ' ' + title;
                            }
                        }

                        return '<a href="#' + atts['tab_id'] + '">' + title + '</a>';

                    }
                }
            }
        }
    }, window.ssc);
} )( jQuery );