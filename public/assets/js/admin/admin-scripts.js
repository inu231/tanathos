$(function($){
      var base_url = document.location.origin;

      $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
      });

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

    $('input.date[type=text]').datepicker({
        dateFormat: 'dd/mm/yy'
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
        $(this).remove();
    });

    $('#btn-password-change').click(function(){
        $('.password-group').removeClass('hidden');
        $(this).fadeOut('slow');
    });

    $('#clear-filters').click(function(e){
        e.preventDefault();
        var location = window.location.pathname;
        location = location.split('/');
        location = location[location.length - 1];
        window.location.href = "/admin/" + location;
    });

    $('#multi-select-tag').attr('placeholder', 'teste');

    $('.select2').select2();

    $('#AddMessageForm').submit(function(e){
          e.preventDefault();
          console.log($(this).serialize());
          $.ajax({
              type:"POST",
              dataType:"HTML",
              data:$(this).serialize(),
              url: $(this).attr('action'),
              success : function(data) {
                 //var material = $.parseJSON(data);
                 alert('funfou');
              },
              error : function() {
                 alert("não funfou");
              }
          });
    });







});

// Funções JavaScript4

function onDelete(id) {

    jQuery(function($) {
          jConfirm('Deseja mesmo deletar o item ' + id + '?', 'Confirmação', function(r) {
                if(r == true) {
                    var location = window.location.pathname;
                    location = location.split('/');
                    location = location[location.length - 1];
                    window.location = "/admin/" + location + "/destroy/" + id;
                }
          });
   });

}

function getMessage(id)  {

    jQuery(function($) {
          $.ajax({
            type:"POST",
            dataType:"HTML",
            data:{value_to_send:id},
            url:"/admin/messages/getMessage/" + id,
            success : function(data) {
               var message = $.parseJSON(data);
               $('#message-title').text(message.title);
               $('#message-author').text(message.author);
               $('#message-email').text(message.email);
               $('#message-body').text(message.body);
               $('.sendmail').attr('id', message.email);

               var current_date = $.datepicker.formatDate('dd/mm/yy', new Date());
               var created_at = $.datepicker.formatDate('dd/mm/yy', new Date(message.created_at));

               var time = new Date(message.created_at);
               time = time.getHours() + ':' + time.getMinutes();

               $('#message-created_at').text(current_date==created_at? 'Hoje ' : created_at);
               $('#message-time').text(time);

            },
            error : function() {
               alert("false");
            }
        });
   });

}

function ajax_mail(id)  {

    jQuery(function($) {

      var email = id;
      var message = $('#message').val();
      var data = {email: email, message: message};

      //data.push({email: email});
      //data.push({message: message});

      console.log(data);
      $.ajax({
          type:"POST",
          dataType:"HTML",
          data:{value_to_send:data},
          url: "/admin/messages/sendmail/"+{email: email, message: message},
          success : function(tata) {
             var material = $.parseJSON(tata);
             console.log(material);
             console.log(tata);
          },
          error : function() {
             alert("não funfou");
          }
      });

   });

}
