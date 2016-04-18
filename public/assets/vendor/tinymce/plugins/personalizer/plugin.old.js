(function() {
    tinymce.PluginManager.requireLangPack('personalizer');

    tinymce.create('tinymce.plugins.PersonalizerPlugin', {
        init : function(ed, url) {
            this.url = url;
        },
        
        createControl : function(n, cm) {
            var plgn = this;
            switch (n) {
                case 'personalizer':
                var c = cm.createMenuButton('personalizerbutton', {
                    title : 'Personalize',
                    image : plgn.url+'/img/personalizer.gif',
                    icons : false
                    });
                c.onRenderMenu.add(function(c, m) {
                    var sub;
                    var tags = tinyMCE.activeEditor.settings['personalizer_tags'];
                    for (var i=0; i<tags.length; i++) {
                        if (tags[i]['label'] == true) {
                            sub = m.addMenu({title : tags[i]['title']});
                            continue;
                        }
                        sub.add({title : tags[i]['title'], value: tags[i]['tags'], onclick : function() {
                            tinyMCE.activeEditor.execCommand('mceInsertContent', false, this.value);
                        }});
                    }
                });
                return c;
            }
            return null;
        },
        
        getInfo : function() {
            return {
                longname : 'Personalizer plugin',
                author : 'Octeth',
                authorurl : 'http://octeth.com',
                infourl : 'octeth.com',
                version : "1.0"
            };
        }
    });
    
    tinymce.PluginManager.add('personalizer', tinymce.plugins.PersonalizerPlugin);
})();