(function() {
    tinymce.create('tinymce.plugins.Lbdesign', {
        /**
        * Initializes the plugin, this will be executed after the plugin has been created.
        * This call is done before the editor instance has finished it's initialization so use the onInit event
        * of the editor instance to intercept that event.
        *
        * @param {tinymce.Editor} ed Editor instance that the plugin is initialized in.
        * @param {string} url Absolute URL to where the plugin is located.
        */
        init : function(ed, url) {
            ed.addButton('buttonshortcode', {
                title : 'Insert button shortcode',
                cmd : 'buttonshortcode',
                image : lbdbs_plugin.url + 'img/icon-grey.png'
            });
            ed.addCommand('buttonshortcode', function() {
                ed.windowManager.open({
                    title : 'Insert a Button',
                    body: [
                        {type: 'textbox', name: 'link', label: 'Link'},
                        {type: 'textbox', name: 'content', label: 'Button Text' },
                        {type: 'listbox',
                            name: 'type',
                            label: 'Button Type',
                            'values': [
                                {text: 'Default', value: 'default'},
                                {text: 'Primary', value: 'primary'},
                                {text: 'Action', value: 'action'},
                                {text: 'Highlight', value: 'highlight'},
                                {text: 'Warning', value: 'warning'},
                                {text: 'Info', value: 'info'}
                            ]
                        },
                        {type: 'listbox',
                            name: 'size',
                            label: 'Button Size',
                            'values': [
                                {text: 'Default', value: 'default'},
                                {text: 'Small', value: 'small'},
                                {text: 'Large', value: 'large'},
                                {text: 'Extra Large', value: 'xlarge'}
                            ]
                        },
                        {type: 'listbox',
                            name: 'styles',
                            label: 'Button Style',
                            'values': [
                                {text: 'Default', value: 'default'},
                                {text: 'Rounded', value: 'rounded'},
                                {text: 'Pill', value: 'pill'},
                                {text: 'Block', value: 'block'}
                            ]
                        },
                        {type: 'textbox', name: 'custom_class', label: 'Custom Button Class'},
                    ],
                    onsubmit: function(e) {
                        ed.focus();
                        ed.selection.setContent('[lbdesign_button link="' + e.data.link +'" type="' + e.data.type + '" custom_class="' + e.data.custom_class + '" size="' + e.data.size + '" style="'+e.data.styles+'"]' + e.data.content + '[/lbdesign_button]');
                    }
                });
            });
        },

        /**
        * Creates control instances based in the incomming name. This method is normally not
        * needed since the addButton method of the tinymce.Editor class is a more easy way of adding buttons
        * but you sometimes need to create more complex controls like listboxes, split buttons etc then this
        * method can be used to create those.
        *
        * @param {String} n Name of the control to create.
        * @param {tinymce.ControlManager} cm Control manager to use inorder to create new control.
        * @return {tinymce.ui.Control} New control instance or null if no control was created.
        */
        createControl : function(n, cm) {
            return null;
        },

        /**
        * Returns information about the plugin as a name/value array.
        * The current keys are longname, author, authorurl, infourl and version.
        *
        * @return {Object} Name/value array containing information about the plugin.
        */
        getInfo : function() {
            return {
                longname : 'LBDesign Button Shortcode',
                author : 'Lauren Pittenger @ LBDesign',
                authorurl : 'http://lbdesign.tv',
                version : "1.2"
            };
        }
    });

    // Register plugin
    tinymce.PluginManager.add( 'lbdesign', tinymce.plugins.Lbdesign );
})();
