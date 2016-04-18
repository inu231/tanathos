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
      <div class="alert alert-danger fade in" style="margin-top:18px;">
          <a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a>
          <strong>Erro!</strong> {{session('error-msg')}}
      </div>
    @endif


    <div class = "panel panel-info">
        <div class = "panel-heading">
            <h3 class="panel-title"> Filtros </h3>
        </div>
        <div class = "panel-body">
            <?= Form::open(array('method' => 'get', 'url' => '/admin/posts/')); ?>
            <div class="form-group col-md-3">
              <?= Form::label('title', 'Título'); ?>
              <?= Form::text('title', \Input::has('title') ? \Input::get('title') : null, ['class' => 'form-control'])?>
            </div>
            <div class="form-group col-md-3">
              <?= Form::label('username', 'Nome do Autor'); ?>
              <?=Form::select('user_id', [\Input::has('user_id') ? Input::get('user_id') : null => \Input::has('user_id') ? $users[\Input::get('user_id')] : ' '] + $users->toArray(), null, array('class' => 'form-control')); ?>
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
                <a href = "{{url('/admin/posts')}}"> <button class="btn btn-default"> Limpar Filtros </button></a>
            </div>

        </div>
    </div>

    <div class = "panel panel-default">
        <div class="panel-heading">
          <h3 class="panel-title">Listar Posts </h3>
        </div>
      <div class="panel-body">

          <div class="form-group pull-right">
              <a href="{{url('admin/posts/add/')}}" title = "Adicionar">
                 <button class="btn btn-primary"> Criar Novo Post </button>
              </a>
          </div>

          <div class = "table-background">
            	<table class = "table">
                <tr>
                  <th> @sortablelink ('title', 'Título')  </th>
                  <th> @sortablelink ('user_id', 'Autor') </th>
                  <th> @sortablelink ('slug') </th>
                  <th> @sortablelink ('created_at', 'Data de Criação') </th>
                  <th> Ações </th>
                </tr>
              @foreach($posts as $post)
                <tr>
                    <td> {{$post->title}} </td>
                    <td> {{$post->user->name}}
                    <td> {{$post->slug}} </td>
                    <td> {{date('d/m/Y', strtotime($post->created_at))}} </td>
                    <td>
                      <a href="{{url('admin/posts/view/'.$post->id)}}" title="Ver">  <i class = "fa fa-file"></i> </a>
                      <button class="delete-btn" onclick="onDelete({{$post->id}})"  title="Excluir"> <i class = "fa fa-minus-square"></i></button>
                      <a href="{{url('admin/posts/edit/'.$post->id)}}" title="Editar">  <i class = "fa fa-pencil"></i> </a>
                    </td>
                </tr>

              @endforeach
              </table>
          </div>
            {!! $posts->appends(Input::except('page'))->links() !!}
      </div>

    </div>
</div>

@stop
