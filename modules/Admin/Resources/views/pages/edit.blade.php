@extends('admin::layouts.master')

@section('content')



<script type = "text/javascript">
    var base_url = document.location.origin;


    $(function($){

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

    });
</script>

<div class = "container">





  @if (count($errors) > 0)
    <div class="alert alert-danger fade in">
        <ul>
            @foreach ($errors->all() as $error)
                <li>
                  <a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a>
                  {{ $error }}
                </li>
            @endforeach
        </ul>
    </div>
  @endif

  <div class="panel panel-default">
      <div class="panel-heading">
        <h3 class="panel-title">Editar Página </h3>
      </div>
      <div class="panel-body">
          <?=Form::model($page, array('method' => 'put', 'url' => '/admin/pages/update/' . $page->id, 'id' => 'EditPageForm')); ?>

          <div class="form-group">
              <?=Form::label('parent_id', 'Subpágina de?') ;?>
              <?=Form::select('parent_id', [null => ' '] + $parents->toArray(), null, array('class' => 'form-control')); ?>
          </div>
          <div class="form-group">
              <?=Form::label('slug', 'Slug'); ?>
              <?=Form::text('slug', null, array('class' => 'form-control')); ?>
          </div>
          <div class="form-group">
              <?=Form::label('title', 'Título') ;?>
              <?=Form::text('title', null, array('class' => 'form-control')); ?>
          </div>
          <div class="form-group">
              <?=Form::label('content', 'Conteúdo'); ?>
              <?=Form::textarea('content', null, array('class' => 'editor-light form-control')); ?>
          </div>
          <div class="form-group">
              <?=Form::submit('Enviar', array('class' => 'btn btn-primary'));?>
              <?=Form::close(); ?>
          </div>
      </div>
  </div>


</div>

@stop
