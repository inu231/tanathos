@extends('admin::layouts.master')

@section('content')

<div class = "container">
    @if(session('msg'))
      <div class="alert alert-success fade in" style="margin-top:18px;">
          <a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a>
          <strong>Success!</strong> {{session('msg')}}
      </div>
    @endif
    @if(session('error-msg'))
      <div class="alert alert-success fade in" style="margin-top:18px;">
          <a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a>
          <strong>Success!</strong> {{session('error-msg')}}
      </div>
    @endif


    <div class = "panel panel-info">
        <div class = "panel-heading">
            <h3 class="panel-title"> Filtros </h3>
        </div>
        <div class = "panel-body">
            <?= Form::open(array('method' => 'get', 'url' => '/admin/banners/')); ?>
            <div class="form-group col-md-6">
              <?= Form::label('name', 'Nome'); ?>
              <?= Form::text('name', \Input::has('name') ? \Input::get('name') : null, ['class' => 'form-control'])?>
            </div>
            <div class="form-group col-md-1 pull-right">
              <?= Form::submit('Filtrar', ['class' => 'btn btn-info']); ?>
            </div>
            <?= Form::close(); ?>
            <div class="form-group  pull-right">
                <a href = "{{url('/admin/banners')}}"> <button class="btn btn-default"> Limpar Filtros </button></a>
            </div>

        </div>
    </div>

    <div class = "panel panel-default">
        <div class="panel-heading">
          <h3 class="panel-title">Listar banners </h3>
        </div>
      <div class="panel-body">

          <div class="form-group pull-right">
              <a href="{{url('admin/banners/add/')}}" title = "Adicionar">
                 <button class="btn btn-primary"> Criar banner </button>
              </a>
          </div>

          <div class = "table-background">
            	<table class = "table">
                <tr>
                  <th width="35%"> Imagem  </th>
                  <th> @sortablelink ('name', 'Nome')
                  <th> Ações </th>
                </tr>
              @foreach($banners as $banner)
                <tr>
                    <td> <img src="{{asset('assets/files/'.$banner->file_name )}}" style="height: 200px"></td>
                    <td> {{$banner->name}} </td>
                    <td>
                      <a href="{{url('admin/banners/view/'.$banner->id)}}" title="Ver">  <i class = "fa fa-file"></i> </a>
                      <button class="delete-btn" onclick="onDelete({{$banner->id}})"  title="Excluir"> <i class = "fa fa-minus-square"></i></button>
                      <a href="{{url('admin/banners/edit/'.$banner->id)}}" title="Editar">  <i class = "fa fa-pencil"></i> </a>
                    </td>
                </tr>

              @endforeach
              </table>
          </div>
            {!! $banners->appends(Input::except('page'))->links() !!}
      </div>

    </div>
</div>

@stop
