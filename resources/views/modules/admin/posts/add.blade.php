@extends('admin::layouts.master')

@section('content')

<div class = "container">

  @if(session('error-msg'))
    <div class="alert alert-success fade in" style="margin-top:18px;">
        <a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a>
        <strong>Success!</strong> {{session('error-msg')}}
    </div>
  @endif

  @if (count($errors) > 0)
    <div class="alert alert-danger fade in">
        <ul>
            <li>
              <a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a>
              <span> Houve um erro ao salvar os dados. Verifique os campos que estão incorretos. </span>
            </li>
        </ul>
    </div>
  @endif

  <div class="panel panel-default">
      <div class="panel-heading">
        <h3 class="panel-title">Adicionar Página </h3>
      </div>
      <div class="panel-body">
          <?=Form::open(array('url' => '/admin/posts/store', 'id' => 'AddpostForm')); ?>

          <div class="form-group">
              <?=Form::label('user_id', 'Autor') ;?>
              <?=Form::select('user_id', [null => ' '] + $users->toArray(), null, array('class' => 'form-control')); ?>
          </div>
          <div class="form-group">
              <?=Form::label('post_category_id', 'Categoria') ;?>
              <?=Form::select('post_category_id', [null => ' '] + $postCategories->toArray(), null, array('class' => 'form-control')); ?>
          </div>
          <div class="form-group">
              <?=Form::label('tag_id', 'Tag') ;?>
              <?=Form::select('tag_id[]', [null => ' '] + $tags->toArray(), null, array('class' => 'form-control', 'multiple')); ?>
          </div>
          <div class="form-group">
              <?=Form::label('title', 'Título') ;?>
              <?=Form::text('title', null, array('class' => 'form-control')); ?>
              @if(!empty($errors->get('title')))
                  <ul class="ul-validation-error">
                  @foreach($errors->get('title') as $error)
                      <li class="validation-error"> {{$error}}</li>
                  @endforeach
                  </ul>
              @endif
          </div>
          <div class="form-group">
              <?=Form::label('body', 'Conteúdo'); ?>
              <?=Form::textarea('body', null, array('class' => 'editor-light form-control')); ?>
          </div>
          <div class="form-group">
              <?=Form::submit('Enviar', array('class' => 'btn btn-primary'));?>
              <?=Form::close(); ?>
          </div>
      </div>
  </div>


</div>

@stop
