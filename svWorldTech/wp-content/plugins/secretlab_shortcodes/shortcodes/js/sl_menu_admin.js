/**
 * Admin Script
 *
 * @package 	CTFramework
 * @author		Sabri Taieb ( codezag )
 * @copyright	Copyright (c) Sabri Taieb
 * @link		http://vamospace.com
 * @since		Version 1.0
 *
 */

(function($) {

    jQuery('.slnm-color-rgba').wpColorPicker();

    var sl_menu = {

        slAjaxSaved: false,

        // Mega Posts : Menu Item Child , show Category settings
        initSortables: function () {
            var currentDepth = 0, originalDepth, minDepth, maxDepth,
                prev, next, prevBottom, nextThreshold, helperHeight, transport,
                menuEdge = api.menuList.offset().left,
                body = $('body'), maxChildDepth,
                menuMaxDepth = initialMenuMaxDepth();

            if (0 !== $('#menu-to-edit li').length)
                $('.drag-instructions').show();

            // Use the right edge if RTL.
            menuEdge += api.isRTL ? api.menuList.width() : 0;

            api.menuList.sortable({
                handle: '.menu-item-handle',
                placeholder: 'sortable-placeholder',
                start: function (e, ui) {
                    var height, width, parent, children, tempHolder;

                    // handle placement for rtl orientation
                    if (api.isRTL)
                        ui.item[0].style.right = 'auto';

                    transport = ui.item.children('.menu-item-transport');

                    // Set depths. currentDepth must be set before children are located.
                    originalDepth = ui.item.menuItemDepth();
                    updateCurrentDepth(ui, originalDepth);

                    // Attach child elements to parent
                    // Skip the placeholder
                    parent = ( ui.item.next()[0] == ui.placeholder[0] ) ? ui.item.next() : ui.item;
                    children = parent.childMenuItems();
                    transport.append(children);

                    // Update the height of the placeholder to match the moving item.
                    height = transport.outerHeight();
                    // If there are children, account for distance between top of children and parent
                    height += ( height > 0 ) ? (ui.placeholder.css('margin-top').slice(0, -2) * 1) : 0;
                    height += ui.helper.outerHeight();
                    helperHeight = height;
                    height -= 2; // Subtract 2 for borders
                    ui.placeholder.height(height);

                    // Update the width of the placeholder to match the moving item.
                    maxChildDepth = originalDepth;
                    children.each(function () {
                        var depth = $(this).menuItemDepth();
                        maxChildDepth = (depth > maxChildDepth) ? depth : maxChildDepth;
                    });
                    width = ui.helper.find('.menu-item-handle').outerWidth(); // Get original width
                    width += api.depthToPx(maxChildDepth - originalDepth); // Account for children
                    width -= 2; // Subtract 2 for borders
                    ui.placeholder.width(width);

                    // Update the list of menu items.
                    tempHolder = ui.placeholder.next();
                    tempHolder.css('margin-top', helperHeight + 'px'); // Set the margin to absorb the placeholder
                    ui.placeholder.detach(); // detach or jQuery UI will think the placeholder is a menu item
                    $(this).sortable('refresh'); // The children aren't sortable. We should let jQ UI know.
                    ui.item.after(ui.placeholder); // reattach the placeholder.
                    tempHolder.css('margin-top', 0); // reset the margin

                    // Now that the element is complete, we can update...
                    updateSharedVars(ui);
                },
                stop: function (e, ui) {

                    var children, subMenuTitle,
                        depthChange = currentDepth - originalDepth;

                    // Return child elements to the list
                    children = transport.children().insertAfter(ui.item);

                    // Add "sub menu" description
                    subMenuTitle = ui.item.find('.item-title .is-submenu');
                    if (0 < currentDepth)
                        subMenuTitle.show();
                    else
                        subMenuTitle.hide();

                    // Update depth classes
                    if (0 !== depthChange) {
                        ui.item.updateDepthClass(currentDepth);
                        children.shiftDepthClass(depthChange);
                        updateMenuMaxDepth(depthChange);
                    }
                    // Register a change
                    api.registerChange();
                    // Update the item data.
                    ui.item.updateParentMenuItemDBId();

                    // address sortable's incorrectly-calculated top in opera
                    ui.item[0].style.top = 0;

                    // handle drop placement for rtl orientation
                    if (api.isRTL) {
                        ui.item[0].style.left = 'auto';
                        ui.item[0].style.right = 0;
                    }

                    api.refreshKeyboardAccessibility();
                    api.refreshAdvancedAccessibility();


                    /*if( !ui.item.is('.suppa_menu_item_mega_posts') && ui.item.is('.menu-item-depth-1') )
                    {

                        var suppa_item 			= ui.item;
                        var suppa_item_parent	= suppa_item.parents('.sl_menu_item');

                        var suppa_item_classes 	= suppa_item.attr('class').split(' ');

                        if( suppa_item.prev('.menu-item').is('.suppa_menu_item_mega_posts') )
                        {
                            var suppa_prev_classes = suppa_item.prev('.menu-item').attr('class').split(' ');
                            suppa_item_classes[1] = suppa_prev_classes[1];
                            suppa_item_classes[2] = suppa_prev_classes[2];
                            var suppa_new_class_string = "";

                            $.each( suppa_item_classes , function( index, value ) {
                                suppa_new_class_string = suppa_new_class_string + value + " ";
                            });
                            suppa_item.attr('class',suppa_new_class_string);
                        }

                    }*/

                },
                change: function (e, ui) {
                    // Make sure the placeholder is inside the menu.
                    // Otherwise fix it, or we're in trouble.
                    if (!ui.placeholder.parent().hasClass('menu')) {
                        (prev.length) ? prev.after(ui.placeholder) : api.menuList.prepend(ui.placeholder);
                    }
                    updateSharedVars(ui);


                },
                sort: function (e, ui) {
                    var offset = ui.helper.offset(),
                        edge = api.isRTL ? offset.left + ui.helper.width() : offset.left,
                        depth = api.negateIfRTL * api.pxToDepth(edge - menuEdge);
                    // Check and correct if depth is not within range.
                    // Also, if the dragged element is dragged upwards over
                    // an item, shift the placeholder to a child position.
                    if (depth > maxDepth || offset.top < prevBottom) depth = maxDepth;
                    else if (depth < minDepth) depth = minDepth;

                    if (depth != currentDepth)
                        updateCurrentDepth(ui, depth);

                    // If we overlap the next element, manually shift downwards
                    if (nextThreshold && offset.top + helperHeight > nextThreshold) {
                        next.after(ui.placeholder);
                        updateSharedVars(ui);
                        $(this).sortable('refreshPositions');
                    }
                }
            });

            function updateSharedVars(ui) {
                var depth;

                prev = ui.placeholder.prev();
                next = ui.placeholder.next();

                // Make sure we don't select the moving item.
                if (prev[0] == ui.item[0]) prev = prev.prev();
                if (next[0] == ui.item[0]) next = next.next();

                prevBottom = (prev.length) ? prev.offset().top + prev.height() : 0;
                nextThreshold = (next.length) ? next.offset().top + next.height() / 3 : 0;
                minDepth = (next.length) ? next.menuItemDepth() : 0;

                if (prev.length)
                    maxDepth = ( (depth = prev.menuItemDepth() + 1) > api.options.globalMaxDepth ) ? api.options.globalMaxDepth : depth;
                else
                    maxDepth = 0;
            }

            function updateCurrentDepth(ui, depth) {
                ui.placeholder.updateDepthClass(depth, currentDepth);
                currentDepth = depth;
            }

            function initialMenuMaxDepth() {
                if (!body[0].className) return 0;
                var match = body[0].className.match(/menu-max-depth-(\d+)/);
                return match && match[1] ? parseInt(match[1], 10) : 0;
            }

            function updateMenuMaxDepth(depthChange) {
                var depth, newDepth = menuMaxDepth;
                if (depthChange === 0) {
                    return;
                } else if (depthChange > 0) {
                    depth = maxChildDepth + depthChange;
                    if (depth > menuMaxDepth)
                        newDepth = depth;
                } else if (depthChange < 0 && maxChildDepth == menuMaxDepth) {
                    while (!$('.menu-item-depth-' + newDepth, api.menuList).length && newDepth > 0)
                        newDepth--;
                }
                // Update the depth class.
                body.removeClass('menu-max-depth-' + menuMaxDepth).addClass('menu-max-depth-' + newDepth);
                menuMaxDepth = newDepth;
            }
        },

        // Delete Menu Types if item is not depth === 0
        eventOnClickMenuSave: function () {
            var locs = '',
                menuName = $('#menu-name'),
                menuNameVal = menuName.val();
            // Cancel and warn if invalid menu name
            if (!menuNameVal || menuNameVal == menuName.attr('title') || !menuNameVal.replace(/\s+/, '')) {
                menuName.parent().addClass('form-invalid');
                return false;
            }
            // Copy menu theme locations
            $('#nav-menu-theme-locations select').each(function () {
                locs += '<input type="hidden" name="' + this.name + '" value="' + $(this).val() + '" />';
            });
            $('#update-nav-menu').append(locs);
            // Update menu item position data
            api.menuList.find('.menu-item-data-position').val(function (index) {
                return index + 1;
            });
            window.onbeforeunload = null;

            // Suppamenu Part
            if (!sl_menu.slAjaxSaved) {

                // Add a Loading Animation
                $('.menu-save').before('<img id="slSaveLoader" style="padding:0 15px;" src="' + seclab_params.loadimg + '" >');

                // Get Suppamenu Data
                var $slmenu_form_data = $('#update-nav-menu').serializeArray();
                var $slmenu_data = [];

                for (var i = 0; i < $slmenu_form_data.length; i++) {

                    if ($slmenu_form_data[i].name.search('seclab') != -1) {
                        $slmenu_data.push($slmenu_form_data[i]);
                    }

                }

                $('*[name*="seclab"]').remove();

                //alert(JSON.stringify($slmenu_data));

                // Ajax:: Send Data
                jQuery.ajax({

                    url: ajaxurl,
                    type: 'POST',
                    data: {
                        nonce: seclab_params.nonce,
                        action: 'slSaveItemsData',
                        data: JSON.stringify($slmenu_data),
                    },

                    success: function (data) {
                        $('#slSaveLoader').remove();
                        sl_menu.slAjaxSaved = true;
                        $('.menu-save').trigger('click');
                    },
                    error: function (error) {
                        console.log(error);
                    }

                });

                return false;
            }
            else {
                return true;
            }
        },

        /** Switch Menu Backend with Ajax **/
        addItemToMenu: function (menuItem, processMethod, callback) {
            var menu = jQuery('#menu').val(),
                nonce = jQuery('#menu-settings-column-nonce').val();

            processMethod = processMethod || function () {
            };
            callback = callback || function () {
            };

            params = {
                'action': 'sl_switch_menu_walker',
                'menu': menu,
                'menu-settings-column-nonce': nonce,
                'menu-item': menuItem
            };

            jQuery.post(ajaxurl, params, function (menuMarkup) {
                var ins = jQuery('#menu-instructions');
                processMethod(menuMarkup, params);
                if (!ins.hasClass('menu-instructions-inactive') && ins.siblings().length)
                    ins.addClass('menu-instructions-inactive');
                callback();
            });
        },

        /** Show / Hide Options Container **/
        options_container: function () {

            jQuery(document).on('click', '.admin-sl-box_header a',

                function () {
                    var $this = jQuery(this);
                    $this.parents('.admin-sl-box').find('.slnm-color-rgba').wpColorPicker();
                    if ($this.hasClass('dashicons-arrow-down-alt2')) {
                        $this.parents('.admin-sl-box').find('.admin-sl-box_container').slideDown(80);
                        $this.removeClass('dashicons-arrow-down-alt2');
                        $this.addClass('dashicons-arrow-up-alt2');
                    }
                    else {
                        $this.parents('.admin-sl-box').find('.admin-sl-box_container').slideUp(80);
                        $this.removeClass('dashicons-arrow-up-alt2');
                        $this.addClass('dashicons-arrow-down-alt2');
                    }
                }
            );
        },

        /** Show / Hide Menu type options **/
        menu_type_options: function () {

            jQuery(document).on('click', '.sl_menu_type',
                function () {
                    let $this = jQuery(this),
                        type = $this.val(),
                        parent = $this.parents('.sl_menu_item'), innerDivs, innerSpans,
                        lik_settings_block = $this.parents('.menu-item-settings').find('.admin-sl-box-menu-item-settings');

                    parent.find('.menu-item-handle .item-type').text('( ' + type + ' )');
                    $this.parents('.admin-sl-box_container').find('.admin-sl-box_option_inside').slideUp(80);
                    $this.parents('.admin-sl-box_container').find('.admin-sl-box_option_inside_' + type).slideDown(80);
                    innerDivs = $this.parents('.admin-sl-box_container').find('.admin-sl-box_option_inside_' + type).find('div');
                    innerSpans = $this.parents('.admin-sl-box_container').find('.admin-sl-box_option_inside_' + type).find('span');
                    lik_settings_block.find('.menu-item-seclab-link_icon_only').trigger('change');
                    lik_settings_block.find('select.menu-item-seclab-link_icon_only').val('only_icon');

                    if (type === 'search') {
                        lik_settings_block.find('input.menu-item-seclab-link_icon').val('nat-search3');
                        lik_settings_block.find('.admin_sl_icon_font_icon_box_preview').children('span').attr('class', 'nat-search3');
                    } else if (type === 'woocommerce_cart') {
                        lik_settings_block.find('input.menu-item-seclab-link_icon').val('nat-cart');
                        lik_settings_block.find('.admin_sl_icon_font_icon_box_preview').children('span').attr('class', 'nat-cart');
                    } else {
                        lik_settings_block.find('select.menu-item-seclab-link_icon_only').val('text_and_icon');
                        lik_settings_block.find('input.menu-item-seclab-link_icon').val('');
                        lik_settings_block.find('.admin_sl_icon_font_icon_box_preview').children('span').attr('class', '');
                    }
                }
            );
        },

        /** Upload Images with Wordpress ( wp 3.5.2+ ) **/
        upload_images: function () {
            jQuery(document).on('click', '.admin_sl_upload', function () {

                var send_attachment_bkp = wp.media.editor.send.attachment;
                var $this = jQuery(this);
                //var seclab_box_menu_item_settings = $this.parents('.admin_seclab_box_menu_item_settings');
                //seclab_box_menu_item_settings.find('.admin-sl-box_option_inside_icon_font .menu-item-seclab-link_icon').val('');
                //seclab_box_menu_item_settings.find('.admin-sl-box_option_inside_icon_font .admin_sl_icon_font_icon_box_preview').children('span').attr('class','');
                wp.media.editor.send.attachment = function (props, attachment) {
                    $this.parent().find('.admin_sl_upload_input').val(attachment.url);
                    // back to first state
                    wp.media.editor.send.attachment = send_attachment_bkp;
                };

                wp.media.editor.open();

                return false;
            });
        },

        /** Show / Hide More Options When Disable FullWidth **/
        fullwidth_checkbox_click: function () {
            /*jQuery( document ).on('click', '.admin_sl_fullwidth_checkbox',
                function()
                {
                    var $this = jQuery(this);
                    if( $this.is(':checked') )
                    {
                        $this.val('on');
                        $this.parents('.admin-sl-box_option_inside').find('.admin_sl_fullwidth_div').hide();
                    }
                    else
                    {
                        $this.val('off');
                        $this.parents('.admin-sl-box_option_inside').find('.admin_sl_fullwidth_div').show();
                    }
                }
            );*/
            jQuery(document).on('change', '.seclab-menu-fullwidth',
                function () {
                    let $selected = jQuery(this).find('option:selected').val();
                    if ($selected === 'on') {
                        jQuery(this).parents('.admin-sl-box_option_inside').find('.admin_sl_fullwidth_div').hide();
                    } else {
                        jQuery(this).parents('.admin-sl-box_option_inside').find('.admin_sl_fullwidth_div').show();
                    }
                });
        },

        /** Show / Hide FullWidth More Options When Page Load  **/
        fullwidth_checkbox: function () {
            jQuery('.menu-item-seclab-mega_menu_fullwidth').each(function () {
                var $selected = jQuery(this).find('option:selected').val();
                if ($selected == 'on') {
                    jQuery(this).parents('.admin-sl-box_option_inside').find('.admin_sl_fullwidth_div').hide();
                } else {
                    jQuery(this).parents('.admin-sl-box_option_inside').find('.admin_sl_fullwidth_div').show();
                }
            });
        },

        /** Add Tinymce Editor **/
        /*wp_editor_set_content : function()
        {
            jQuery( document ).on('click', '.admin_suppa_edit_button',
                function()
                {
                    var $this = jQuery(this);
                    var $id 	= $this.attr('id');

                    var $textarea 	= $this.parent().parent().find('textarea');
                    var $content 	= $textarea.val();

                    jQuery('.admin_suppa_getContent_button').attr('id', $id);

                    tinyMCE.get('suppa_wp_editor_the_editor').setContent( $content, {format : 'raw'});

                    jQuery('.sl_admin_icon_fonts_container').fadeIn(100);

                    jQuery('.suppa_wp_editor_container').fadeIn(100);

                    return false;
                }
            );
        },*/

        /** Get Content from WordPress Editor **/
        /*wp_editor_get_content : function()
        {
            jQuery( document ).on('click', '.admin_suppa_getContent_button',
                function()
                {
                    var $this 	= jQuery(this);
                    var $id 	= $this.attr('id');
                    var $textarea 	= jQuery('#edit-menu-item-seclab-html_content-'+$id);

                    var content;
                    var editor = tinyMCE.get('suppa_wp_editor_the_editor');
                    if (editor) {
                        // Ok, the active tab is Visual
                        content = editor.getContent();
                    } else {
                        // The active tab is HTML, so just query the textarea
                        content = $('#'+'suppa_wp_editor_the_editor').val();
                    }

                    $textarea.val( content );

                    jQuery('.sl_admin_icon_fonts_container').fadeOut(100);
                    jQuery('.suppa_wp_editor_container').fadeOut(100);

                    return false;
                }
            );
        },*/

        /** Show Front Awesome Widget **/
        show_icon_font_widget: function () {
            jQuery(document).on('click', '.admin_sl_select_icon_button',
                function () {
                    var $this = jQuery(this);
                    var $id = $this.attr('id');
                    if (0 == $this.parent().find('.sl_icons_admin_box .sl_icons_block').length) {
                        var html = sl_menu.icons;

                        $this.parent().find('.sl_icons_admin_box .sl_admin_icons_search').after(html);

                        jQuery('.admin_sl_add_icon_button').attr('id', $id);
                    }

                    jQuery('.sl_admin_icon_fonts_container').fadeIn(100);
                    jQuery('.sl_icons_admin_box').fadeIn(100);

                    return false;
                }
            );
        },

        get_icons: function () {

            if (sl_menu.icons != undefined) {
                return sl_menu.icons;
            }
            sl_menu.font_names = [];

            function css_text(x) {
                return x.cssText;
            }

            var files = document.querySelectorAll('*[id^="sl_icons_admin_"]'), html = '', font_name = '', css;

            if (!files || files.length === 0) {
                return '';
            }
            for (var i = 0; i < files.length; i++) {

                var font_name = files[i].id.match('^sl_icons_admin_([^;]+)-css');
                if (Array.isArray(font_name) && font_name[1] != undefined) {
                    font_name = font_name[1];
                } else {
                    font_name = font_name
                }
                css = Array.prototype.map.call(files[i].sheet.cssRules, css_text).join('\n');
                css = css.split('::before');

                html += '<div class="sl_icons_block ' + font_name + '-icons">';
                html += '<div class="sl_icons_service_block"><h3>' + font_name + '</h3></div>';
                html += '<div id="' + font_name + '-icons_table" class="sl_all_icons_container ' + font_name + '-icons_table">';
                css.forEach(function (i) {
                    i = i.split('.')[1];
                    if (i !== undefined && i.indexOf('/') == -1)
                        html += '<span class="sl_icon_container"><i title="' + i.replace(/[^a-z-0-9]/g, "") + '" class="' + i.replace(/[^a-z-0-9]/g, "") + '"></i></span>';
                });
                html += '</div></div>';

            }
            sl_menu.icons = html;
            return false;

        },

        delete_icon_font_widget: function () {
            jQuery(document).on('click', '.admin_sl_delete_icon_button',
                function () {
                    var $this = jQuery(this);
                    var $id = $this.attr('id');

                    jQuery('.admin_sl_add_icon_button').attr('id', $id);
                    jQuery('.admin_sl_icon_font_hidden-' + $id).val('');
                    jQuery('.admin_sl_icon_font_icon_box_preview-' + $id).children('span').attr('class', '');
                    //jQuery('.admin_sl_icon_font_icon_box_preview-'+$id).fadeOut(100);

                    return false;
                }
            );
        },

        /** Add Font Awesome Icon to the Hidden Input **/
        add_font_icon: function () {
            jQuery(document).on('click', '.admin_sl_add_icon_button',
                function () {
                    var $this = jQuery(this);
                    var $id = $this.attr('id');
                    var $icon = jQuery('.sl_icons_admin_box .sl_all_icons_container').find('.selected').find('i').attr('class');

                    jQuery('.admin_sl_icon_font_hidden-' + $id).val($icon);
                    jQuery('.admin_sl_icon_font_icon_box_preview-' + $id).children('span').attr('class', $icon);
                    jQuery('.sl_admin_icon_fonts_container').fadeOut(100);
                    jQuery('.sl_icons_admin_box').fadeOut(100);

                    return false;
                }
            );
        },

        /** Select Font Awesome Icon **/
        select_font_icon: function () {
            jQuery(document).on('click', '.sl_icon_container',
                function () {
                    var $this = jQuery(this);

                    jQuery('.sl_icon_container').removeClass('selected')
                    $this.addClass('selected');

                    return false;
                }
            );
        },

        /** Close Widget Container **/
        close_icon_fonts_container: function () {
            jQuery(document).on('click', 'a#close-sl-icons-box',
                function () {

                    jQuery('.sl_admin_icon_fonts_container').fadeOut(100);
                    jQuery('.sl_icons_admin_box').fadeOut(100);

                    return false;
                }
            );
        },

        /** Upload or Font Awesome **/
        upload_or_icon_font: function () {
            jQuery(document).on('change', '.menu-item-seclab-link_icon_type',
                function () {
                    var $selected = jQuery(this).find('option:selected').val();
                    if ($selected == 'upload') {
                        jQuery(this).parent().parent().parent().find('.admin-sl-box_option_inside_icon_upload').fadeIn(80);
                        jQuery(this).parent().parent().parent().find('.admin-sl-box_option_inside_icon_font').fadeOut(80);
                    }
                    else if ($selected == 'icon_font') {
                        jQuery(this).parent().parent().parent().find('.admin-sl-box_option_inside_icon_upload').fadeOut(80);
                        jQuery(this).parent().parent().parent().find('.admin-sl-box_option_inside_icon_font').fadeIn(80);
                    }
                    else {

                    }
                    return false;
                }
            );
        },

        // Ajax : Save Menu Location
        /*ajax_save_location : function()
        {
            jQuery( document ).on('click', '#admin_suppa_save_menu_location',
                function( event )
                {
                    event.preventDefault();

                    var $this = jQuery(this);
                    $this.addClass('admin_suppa_save_menu_location_saving');

                    // Get Checked Locations
                    var dataString = "";
                    jQuery('#suppa_menu_location_selected').find('input:checked').each(function(){
                        dataString = dataString + ',' + jQuery(this).val() + '=' + jQuery(this).parent().find('.suppa_menu_location_skin').val();
                    });
                    dataString = dataString.substr(1);

                    var $data = {
                        action 		: 'save_locations_skins',
                        nonce 		: jQuery('#admin_suppa_save_menu_location_nonce').val(),
                        location 	: dataString,
                    };

                    jQuery.post(ajaxurl, $data, function(response) {
                        // Remove Alert
                        $this.removeClass('admin_suppa_save_menu_location_saving');
                        jQuery('body').append('<div class="suppa_location_saved">Location Saved</div>');
                        setTimeout( function(){
                            jQuery('.suppa_location_saved').remove();
                        },2000);
                    });
                    return false;
                }
            );
        },*/


        // Use Icon Only Checkbox
        /*icon_only_checkbox : function()
        {
            jQuery( document ).on('click', '.sl_use_icon_only',
                function()
                {
                    var $this = jQuery(this);

                    if( $this.is(':checked') )
                    {
                        $this.val('on');
                    }
                    else
                    {
                        $this.val('off');
                        $this.removeAttr("checked");
                    }
                }
            );
        },*/


        // Get category id after the menu items loads
        getCatID: function () {
            jQuery('.sl_all_cats_tax_types').each(function () {
                alert('yes');
                var $this = jQuery(this);
                var $cat = $this.parent()
                    .find('.menu-item-seclab-posts_category').val();
                $this.find('option').removeAttr('selected');
                $this.find('option[value="' + $cat + '"]')
                    .attr('selected', 'selected').text();
            });
        },


        // Set Cat/taxonomy
        setCatID: function () {
            jQuery(document).on('change', '#sl_all_cats_tax_types', function (event) {
                var $this = jQuery(this).parent();

                //Latest Posts
                $this.parent().find('.menu-item-seclab-posts_category')
                    .val(jQuery(this).find(':selected').val());

                $this.parent().find('.menu-item-seclab-posts_taxonomy')
                    .val(jQuery(this).find(':selected').attr('data-taxonomy'));

                //Mega Posts
                $this.parent().find('.menu-item-seclab-mega_posts_category')
                    .val(jQuery(this).find(':selected').val());

                $this.parent().find('.menu-item-seclab-mega_posts_taxonomy')
                    .val(jQuery(this).find(':selected').attr('data-taxonomy'));
            });
        },

        check_icon_position: function () {
            jQuery(document).on('change', '.menu-item-seclab-link_icon_only',
                function () {
                    var $selected = jQuery(this).find('option:selected').val();
                    if ($selected == 'none') {
                        jQuery(this).parent().parent().find('#menu-item-sl-position-container').fadeOut(80);
                        jQuery(this).parent().parent().find('#menu-item-sl-position-container .menu-item-seclab-link_icon_position').val('');
                        //jQuery(this).parent().parent().find('#menu-item-sl-link-icon-only .menu-item-seclab-link_icon_only').prop('checked', false);
                        jQuery(this).parent().parent().find('#menu-item-seclab-link_icon_type').fadeOut(80);
                        jQuery(this).parent().parent().find('.admin-sl-box_option_inside_icon_font').fadeOut(80);
                        jQuery(this).parent().parent().find('.admin-sl-box_option_inside_icon_upload').fadeOut(80);
                    }
                    else if ($selected == 'text_and_icon' || $selected == 'only_icon') {
                        jQuery(this).parent().parent().find('#menu-item-sl-position-container').fadeIn(80);
                        jQuery(this).parent().parent().find('#menu-item-seclab-link_icon_type').fadeIn(80);
                        jQuery(this).parent().parent().find('#menu-item-sl-position-container .menu-item-seclab-link_icon_position').val('left');
                        var $icon_type_selected = jQuery(this).parent().parent().find('#menu-item-seclab-link_icon_type .menu-item-seclab-link_icon_type').find('option:selected').val();
                        if ($icon_type_selected == 'icon_font') {
                            jQuery(this).parent().parent().find('.admin-sl-box_option_inside_icon_font').fadeIn(80);
                            jQuery(this).parent().parent().find('.admin-sl-box_option_inside_icon_upload').fadeOut(80);
                        } else if ($icon_type_selected == 'upload') {
                            jQuery(this).parent().parent().find('.admin-sl-box_option_inside_icon_font').fadeOut(80);
                            jQuery(this).parent().parent().find('.admin-sl-box_option_inside_icon_upload').fadeIn(80);
                        } else {

                        }
                    }
                    else {

                    }
                    return false;
                }
            );
        }

    };// End Object

    sl_menu.check_icon_position();
    sl_menu.menu_type_options();
    sl_menu.options_container();

    sl_menu.upload_images();

    sl_menu.fullwidth_checkbox();
    sl_menu.fullwidth_checkbox_click();

    // Widgets
    //sl_menu.wp_editor_set_content();
    //sl_menu.wp_editor_get_content();
    sl_menu.show_icon_font_widget();
    sl_menu.get_icons();
    sl_menu.delete_icon_font_widget();
    sl_menu.select_font_icon();
    sl_menu.add_font_icon();
    sl_menu.close_icon_fonts_container();

    sl_menu.upload_or_icon_font();
    //sl_menu.ajax_save_location();

    //sl_menu.icon_only_checkbox();
    sl_menu.getCatID();
    sl_menu.setCatID();

    $('.admin-sl-box_option_inside div').css({'display': 'block'});
    $('.admin-sl-box_option_inside span').css({'display': 'block'});
    // it is a hack, for unknown reason these elementa has { display : none } by default 	

    /** Switch Menu Backend with Ajax **/
    if (typeof wpNavMenu != 'undefined') {
        // Add Our Item to Menu
        wpNavMenu.addItemToMenu = sl_menu.addItemToMenu;

        // Delete Menu Types if item is not depth === 0
        wpNavMenu.eventOnClickMenuSave = sl_menu.eventOnClickMenuSave;

        // Mega Posts : Menu Item Child , show Category settings
        wpNavMenu.initSortables = sl_menu.initSortables;

        api = wpNavMenu;
    }
    if(!jQuery.isFunction(jQuery.fn.lightTabs)){
		jQuery.fn.lightTabs = function (options) {

			var createTabs = function () {
				var tabs = this, i = 0;

				var showTab = function (i, e) {
					if ('' == e) {
						$(tabs).children("div").children("div").hide();
						$(tabs).children("div").children("div").eq(i).show();
						$(tabs).children("ul").children("li").removeClass("active");
						$(tabs).children("ul").children("li").eq(i).addClass("active");
					} else {
						$(e.target).parents(".slmenu-tabs").children("div").children("div").hide();
						$(e.target).parents(".slmenu-tabs").children("div").children("div").eq(i).show();
						$(e.target).parent("ul").children("li").removeClass("active");
						$(e.target).parent("ul").children("li").eq(i).addClass("active");
					}
				}

				showTab(0, '');

				$(tabs).children("ul").children("li").each(function (index, element) {
					$(element).attr("data-page", i);
					i++;
				});

				$(tabs).children("ul").children("li").click(function (e) {
					showTab(parseInt($(this).attr("data-page")), e);
				});
			};
			return this.each(createTabs);
		};
	}

	jQuery(document).ready(function(){
		jQuery(".slmenu-tabs").lightTabs();
	});


})(jQuery);