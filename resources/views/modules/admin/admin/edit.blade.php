@extends('admin::layouts.master')

@section('content')

<div class = "container">



    @if (count($errors) > 0)
      <div class="alert alert-danger fade in">
          <a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a>
          <span> Houve um erro ao salvar os dados. Verifique os campos que estão incorretos. </span>
      </div>
    @endif

    <div class="panel panel-default">
        <div class="panel-heading">
          <h3 class="panel-title">Editar Usuarios </h3>
        </div>
        <div class="panel-body">
            <?=Form::model($user, array('method' => 'put', 'url' => '/admin/users/update/' . $user->id, 'id' => 'EdituserForm')); ?>

            <div class="form-group">
                <?=Form::label('name', 'Nome') ;?>
                <?=Form::text('name', null, array('class' => 'form-control')); ?>
                @if(!empty($errors->get('name')))
                    <ul class="ul-validation-error"><li class="validation-error"> {{$errors->first('name')}}</li></ul>
                @endif
            </div>
            <div class="form-group">
                <?=Form::label('email', 'Email') ;?>
                <?=Form::text('email', null, array('class' => 'form-control')); ?>
                @if(!empty($errors->get('email')))
                    <ul class="ul-validation-error"><li class="validation-error"> {{$errors->first('email')}}</li></ul>
                @endif
            </div>
            <div class="form-group">
                <?=Form::submit('Enviar', array('class' => 'btn btn-primary'));?>
                <?=Form::close(); ?>
            </div>
        </div>
    </div>
</div>

@stop
