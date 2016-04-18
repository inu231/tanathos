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
            <?= Form::open(array('method' => 'get', 'url' => '/admin/post-categories/')); ?>
            <div class="form-group col-md-6">
              <?= Form::label('name', 'Nome'); ?>
              <?= Form::text('name', \Input::has('name') ? \Input::get('name') : null, ['class' => 'form-control'])?>
            </div>
            <div class="form-group col-md-6">
              <?= Form::label('description', 'Descrição'); ?>
              <?= Form::text('description',  \Input::has('description') ? \Input::get('description') : null, array('class' => 'form-control')); ?>
            </div>

            <div class="form-group col-md-1 pull-right">
              <?= Form::submit('Filtrar', ['class' => 'btn btn-info']); ?>
            </div>
            <?= Form::close(); ?>
            <div class="form-group  pull-right">
                <a href = "{{url('/admin/post-categories')}}"> <button class="btn btn-default"> Limpar Filtros </button></a>
            </div>

        </div>
    </div>

    <div class = "panel panel-default">
        <div class="panel-heading">
          <h3 class="panel-title">Listar Categorias de Posts </h3>
        </div>
      <div class="panel-body">

          <div class="form-group pull-right">
              <a href="{{url('admin/post-categories/add/')}}" title = "Adicionar">
                 <button class="btn btn-primary"> Criar nova categoria de Posts </button>
              </a>
          </div>

          <div class = "table-background">
            	<table class = "table">
                <tr>
                  <th> @sortablelink ('name', 'Nome')  </th>
                  <th> @sortablelink ('description', 'Descrição')
                  <th> Ações </th>
                </tr>
              @foreach($postsCategories as $postCategory)
                <tr>
                    <td> {{$postCategory->name}} </td>
                    <td> {{$postCategory->description}} </td>
                    <td>
                      <a href="{{url('admin/postsCategories/view/'.$postCategory->id)}}" title="Ver">  <i class = "fa fa-file"></i> </a>
                      <button class="delete-btn" onclick="onDelete({{$postCategory->id}})"  title="Excluir"> <i class = "fa fa-minus-square"></i></button>
                      <a href="{{url('admin/post-categories/edit/'.$postCategory->id)}}" title="Editar">  <i class = "fa fa-pencil"></i> </a>
                    </td>
                </tr>

              @endforeach
              </table>
          </div>
            {!! $postsCategories->appends(Input::except('page'))->links() !!}
      </div>

    </div>
</div>

@stop
