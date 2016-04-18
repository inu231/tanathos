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
          <?=Form::open(array('url' => '/admin/post-categories/store', 'id' => 'AddpostForm')); ?>

          <div class="form-group">
              <?=Form::label('name', 'Nome') ;?>
              <?=Form::text('name', null, array('class' => 'form-control')); ?>
              @if(!empty($errors->get('name')))
                  <ul class="ul-validation-error"> <li class="validation-error"> {{$errors->first('name')}}</li> </ul>
              @endif
          </div>
          <div class="form-group">
              <?=Form::label('description', 'Descrição'); ?>
              <?=Form::textarea('description', null, array('class' => 'form-control')); ?>
          </div>
          <div class="form-group">
              <?=Form::submit('Enviar', array('class' => 'btn btn-primary'));?>
              <?=Form::close(); ?>
          </div>
      </div>
  </div>


</div>

@stop
