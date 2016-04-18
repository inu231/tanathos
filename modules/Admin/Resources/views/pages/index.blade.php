@extends('admin::layouts.master')

@section('content')

<div class = "container">
    @if(session('msg'))
      <div class="alert alert-success fade in" style="margin-top:18px;">
          <a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a>
          <strong>Success!</strong> {{session('msg')}}
      </div>
    @endif

    <div class = "panel panel-default">
        <div class = "panel-heading">
            <h3 class="panel-title"> Filtros </h3>
        </div>
        <div class = "panel-body">
            <!-- Content goes here -->
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
                  <!-- <th> @sortablelink ('content') </th> -->
                  <th> @sortablelink ('created_at', 'Data de Criação') </th>
                  <th> Ações </th>
                </tr>
              @foreach($pages as $page)
                <tr>
                    <td> {{$page->title}} </td>
                    <td> {{$page->parent_id}}
                    <!-- <td> {{$page->content}} </td> -->
                    <td> {{date('d/m/Y', strtotime($page->created_at))}} </td>
                    <td>
                      <a href="{{url('admin/pages/view/'.$page->id)}}" title="Ver">  <i class = "fa fa-file"></i> </a>
                      <button class="delete-btn" onclick="onDelete({{$post->id}})"  title="Excluir"> <i class = "fa fa-minus-square"></i></button>
                      <a href="{{url('admin/pages/add/')}}" title = "Adicionar"> <i class = "fa fa-plus-square"></i> </a>
                      <a href="{{url('admin/pages/edit/'.$page->id)}}" title="Editar">  <i class = "fa fa-pencil"></i> </a>
                    </td>
                </tr>

              @endforeach
              </table>
          </div>
            {!! $pages->render() !!}
      </div>

    </div>
</div>

@stop
