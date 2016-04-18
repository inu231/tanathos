@extends('admin::layouts.master')

@section('content')

<div class = "container">
    @if(session('msg'))
      <div class="alert alert-success fade in" style="margin-top:18px;">
          <a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a>
          <strong>Success!</strong> {{session('msg')}}
      </div>
    @endif



    <div class = "panel panel-info">
        <div class = "panel-heading">
            <h3 class="panel-title"> Filtros </h3>
        </div>
        <div class = "panel-body">
            <?= Form::open(array('method' => 'get', 'url' => '/admin/pages/')); ?>
            <div class="form-group col-md-3">
              <?= Form::label('title', 'Título'); ?>
              <?= Form::text('title', \Input::has('title') ? \Input::get('title') : null, ['class' => 'form-control'])?>
            </div>
            <div class="form-group col-md-3">
              <?= Form::label('slug'); ?>
              <?= Form::text('slug', \Input::has('slug') ? Input::get('slug') : null, ['class' => 'form-control'])?>
            </div>
            <div class="date col-md-3">
              <?= Form::label('created_at', 'Criado em'); ?>
              <?= Form::text('created_at', \Input::has('created_at') ? Input::get('created_at') : null, ['class' => 'form-control', 'id' => 'created_at'])?> <span class="add-on"><i class="icon-th"></i></span>
            </div>
            <div class="date form-group col-md-3">
              <?= Form::label('created_end', 'Criado até'); ?>
              <?= Form::text('created_end', \Input::has('created_end') ? Input::get('created_end') : null, ['class' => 'form-control', 'id' => 'created_end'])?> <span class="add-on"><i class="icon-th"></i></span>
            </div>



            <div class="form-group col-md-1 pull-right">
              <?= Form::submit('Filtrar', ['class' => 'btn btn-info']); ?>
            </div>
            <?= Form::close(); ?>
            <div class="form-group  pull-right">
                <a href = "{{url('/admin/pages')}}"> <button class="btn btn-default"> Limpar Filtros </button></a>
            </div>

        </div>
    </div>

    <div class = "panel panel-default">
        <div class="panel-heading">
          <h3 class="panel-title">Listar Páginas </h3>
        </div>
      <div class="panel-body">
          <div class = "table-background">
            	<table class = "table">
                <tr>
                  <th> @sortablelink ('title', 'Título')  </th>
                  <th> @sortablelink ('parent_id', 'Pai') </th>
                  <th> @sortablelink ('slug') </th>
                  <th> @sortablelink ('created_at', 'Data de Criação') </th>
                  <th> Ações </th>
                </tr>
              @foreach($pages as $page)
                <tr>
                    <td> {{$page->title}} </td>
                    <td> {{$page->parent_id}}
                    <td> {{$page->slug}} </td>
                    <td> {{date('d/m/Y', strtotime($page->created_at))}} </td>
                    <td>
                      <a href="{{url('admin/pages/view/'.$page->id)}}" title="Ver">  <i class = "fa fa-file"></i> </a>
                      <button class="delete-btn" onclick="onDelete({{$page->id}})"  title="Excluir"> <i class = "fa fa-minus-square"></i></button>
                      <a href="{{url('admin/pages/add/')}}" title = "Adicionar"> <i class = "fa fa-plus-square"></i> </a>
                      <a href="{{url('admin/pages/edit/'.$page->id)}}" title="Editar">  <i class = "fa fa-pencil"></i> </a>
                    </td>
                </tr>

              @endforeach
              </table>
          </div>
            {!! $pages->appends(Input::except('page'))->links() !!}
      </div>

    </div>
</div>

@stop
