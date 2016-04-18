function onDelete(id) {
    var location = window.location.pathname;
    location = location.split('/');
    location = location[location.length - 1];
    var conf = confirm('Deseja mesmo deletar o item ' + id + '?');
    if (conf == true)
    {
      window.location = "/admin/" + location + "/destroy/" + id;
    }
}

$(function($){
      var base_url = document.location.origin;

      tinymce.init({
        selector: "textarea.editor-light",
        font_formats: "Andale Mono=andale mono,times;"+
                "Arial=arial,helvetica,sans-serif;"+
                "Arial Black=arial black,avant garde;"+
                "Book Antiqua=book antiqua,palatino;"+
                "Calibri = calibri, sans-serif;"+
                "Calibri Light = calibri light, sans-serif;"+
                "Cambria = cambria, serif;"+
                "Candara = candara light, sans-serif;"+
                "Comic Sans MS=comic sans ms,sans-serif;"+
                "Consolas = consolas, monospace;"+
                "Constantia = constantia, serif;"+
                "Corbel = corbel, sans-serif;"+
                "Courier New=courier new,courier;"+
                "Franklin Gothic Medium= franklin gothic medium, sans-serif"+
                "Georgia=georgia,palatino;"+
                "Helvetica=helvetica;"+
                "Impact=impact,chicago;"+
                "Lucida Sans Unicode = lucida sans unicode;"+
                "Malgun Gothic = malgun gothic;"+
                "Microsoft JhengHei = microsoft jhengHei;"+
                "Microsoft YaHei = microsoft yaHei;"+
                "PMingLiU-ExtB = pmingliU-extb;"+
                "Segoe UI = segoe ui;"+
                "Segoe UI Light = segoe ui light;"+
                "SimSun = simsun;"+
                "SimSun-ExtB = simsun-extb"+
                "Sylfaen = sylfaen;"+
                "Symbol=symbol;"+
                "Tahoma=tahoma,arial,helvetica,sans-serif;"+
                "Terminal=terminal,monaco;"+
                "Times = times;"+
                "Times New Roman=times new roman,times;"+
                "Trebuchet MS=trebuchet ms,geneva;"+
                "Verdana=verdana,geneva;"+
                "Webdings=webdings;"+
                "Wingdings=wingdings,zapf dingbats",
        width: '100%',
        height: 500,
        theme: "modern",
        language : 'pt_BR',
        schema: 'html5',
        valid_elements : '*[*]',
        plugins: [
            "advlist autolink lists link image charmap print preview hr anchor pagebreak",
            "searchreplace wordcount visualblocks visualchars code fullscreen",
            "insertdatetime nonbreaking save table contextmenu directionality",
            "emoticons template paste textcolor colorpicker fullpage variaveis responsivefilemanager"
        ],
        toolbar1: "insertfile undo redo |  fontselect | fontsizeselect |  styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image",
        toolbar2: "print preview | forecolor backcolor emoticons | code fullpage variaveis responsivefilemanager",
        image_advtab: true,
        external_filemanager_path: base_url+"/assets/vendor/filemanager/",
        filemanager_title:"Gerenciador de Arquivos",
        external_plugins: { "filemanager" : base_url+"/assets/vendor/filemanager/plugin.min.js"},
        relative_urls: false,
        document_base_url: base_url,
        remove_script_host: false
    });

    $('.date').datepicker({
        format: 'dd/mm/yyyy'
    });

    $('.ul-validation-error').prev().addClass("input-validation-error");

    $('.ul-validation-error').prev().blur(function(){
        $(this).removeClass('input-validation-error');
        $('.ul-validation-error').children().remove();
    });

    $('#btn-image-change').click(function(e){
        e.preventDefault();
        $('.edit-image').addClass('hidden');
        $(this).next().removeClass('hidden');
        $(this).addClass('hidden');
    });

    $('#btn-password-change').click(function(){
        $('.password-group').removeClass('hidden');
    });

});
