@extends('admin::layouts.master')

@section('content')



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
        <h3 class="panel-title">Adicionar Página </h3>
      </div>
      <div class="panel-body">
          <?=Form::open(array('url' => '/admin/pages/store', 'id' => 'AddPageForm')); ?>

          <div class="form-group">
              <?=Form::label('parent_id', 'Subpágina de?') ;?>
              <?=Form::select('parent_id', [null => ' '] + $parents->toArray(), null, array('class' => 'form-control')); ?>
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
