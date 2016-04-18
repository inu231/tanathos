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
          <h3 class="panel-title">Editar banners </h3>
        </div>
        <div class="panel-body">
            <?=Form::model($banner, array('method' => 'put', 'url' => '/admin/banners/update/' . $banner->id, 'id' => 'EditbannerForm', 'files' => true)); ?>

            <div class="form-group">
                <?=Form::label('name', 'Nome') ;?>
                <?=Form::text('name', null, array('class' => 'form-control')); ?>
                @if(!empty($errors->get('name')))
                    <ul class="ul-validation-error"><li class="validation-error"> {{$errors->first('name')}}</li></ul>
                @endif
            </div>
            <div class="form-group edit-image">
              <img src="{{asset('assets/files/'.$banner->file_name)}}" class="img-responsive banner">
            </div>
            <div class="form-group">
                <button class="btn btn-primary" id ="btn-image-change"> Trocar Imagem </button>
                <div class="hidden">
                  <?=Form::label('files', 'Imagem'); ?>
                  <?=Form::file('files[]', null, array('class' => 'form-control')); ?>
                </div>
            </div>
            <div class="form-group">
                <?=Form::submit('Enviar', array('class' => 'btn btn-primary'));?>
                <?=Form::close(); ?>
            </div>
        </div>
    </div>
</div>

@stop
