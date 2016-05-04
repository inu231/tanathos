@extends('admin::layouts.master')

@section('content')

<!-- start: Content -->
<div id="content" class="span10">

<ul class="breadcrumb">
	<li>
		<i class="icon-home"></i>
		<a href="{{url('/admin')}}">Home</a>
		<i class="icon-angle-right"></i>
	</li>
	<li>
		<a href="{{url('/admin/posts')}}">Posts</a>
		<i class="icon-angle-right"></i>
	</li>
	<li><a href="#">Tags</a></li>
</ul>
<div class="row-fluid add-new">
  <a href="{{url('/admin/tags/add')}}" class="btn btn-info fa fa-plus">  Nova tag </a>
</div>

@if(session('msg'))
  <div class="alert alert-success fade in" style="margin-top:18px;">
      <a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a>
      <strong>Ok!</strong> {{session('msg')}}
  </div>
@endif
@if(session('error-msg'))
  <div class="alert alert-danger fade in" style="margin-top:18px;">
      <a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a>
      <strong>Erro! </strong> {{session('error-msg')}}
  </div>
@endif


<div class="row-fluid sortable">
  <div class="box span12">
    <div class="box-header" data-original-title>
      <h2><i class="fa fa-search" aria-hidden="true"></i></i><span class="break"></span>Filtro Avançado</h2>
      <div class="box-icon">
        <a href="#" class="btn-setting"><i class="halflings-icon white wrench"></i></a>
        <a href="#" class="btn-minimize"><i class="halflings-icon white chevron-up"></i></a>
        <a href="#" class="btn-close"><i class="halflings-icon white remove"></i></a>
      </div>
    </div>

    <div class="box-content" style="display: {{$isFilter? ' ' : 'none'}}">
        <div class="form-group">
              {!! Form::open(array('method' => 'get', 'url' => '/admin/tags/', 'class' => 'form-horizontal')); !!}

              <div class="block">
                  <div class="admin-form">
                    {!! Form::label('name', 'Nome'); !!}
                    {!! Form::text('name', \Input::has('name') ? \Input::get('name') : null, ['class' => 'form-control'])!!}
                  </div>
                  <div class="admin-form">
                    {!! Form::label('description', 'Descrição'); !!}
                    {!! Form::text('description',  \Input::has('description') ? \Input::get('description') : null, array('class' => 'form-control')); !!}
                  </div>
              </div>

              <div class="block pull-right">
                  <div class="form-group col-md-6 admin-form" style="padding-right: 0px !important">
                    {!! Form::submit('Filtrar', ['class' => 'btn btn-info btn-filter']); !!}
                  </div>
                  {!! Form::close(); !!}
                  <div class="form-group col-md-1 admin-form">
                     <button class="btn btn-default" id="clear-filters"> Limpar Filtros </button>
                  </div>
              </div>
        </div>
    </div>
  </div>
</div>

<div class="row-fluid sortable">
	<div class="box span12">
		<div class="box-header" data-original-title>
			<h2><i class="icon-align-justify"></i><span class="break"></span>Tags</h2>
			<div class="box-icon">
				<a href="#" class="btn-setting"><i class="halflings-icon white wrench"></i></a>
				<a href="#" class="btn-minimize"><i class="halflings-icon white chevron-up"></i></a>
				<a href="#" class="btn-close"><i class="halflings-icon white remove"></i></a>
			</div>
		</div>
		<div class="box-content">
			<table class="table table-striped table-bordered bootstrap-datatable datatable">
				<thead>
					<tr>
						<th>Name</th>
						<th>Description</th>
						<th>Date registered</th>
						<th>Status</th>
						<th>Actions</th>
					</tr>
				</thead>
				<tbody>

        @foreach($tags as $tag)
				<tr>
					<td>{{$tag->name}}</td>
					<td class="center">{{$tag->description}}</td>
					<td class="center">{{$tag->created_at}}</td>
					<td class="center">
						<span class="label label-success">Active</span>
					</td>
					<td class="center">
						<a class="btn btn-success" href="{{url('/admin/tags/view/'.$tag->id)}}" title="vizualizar">
							<i class="halflings-icon white zoom-in"></i>
						</a>
						<a class="btn btn-info" href="{{url('/admin/tags/edit/'.$tag->id)}}"  title="editar">
							<i class="halflings-icon white edit"></i>
						</a>
						<a class="btn btn-danger" onclick="onDelete({{$tag->id}})"  title="excluir">
							<i class="halflings-icon white trash"></i>
						</a>
					</td>
				</tr>
        @endforeach
				</tbody>
			</table>
		</div>
	</div><!--/span-->

</div><!--/row-->





</div><!--/.fluid-container-->

<!-- end: Content -->
</div><!--/#content.span10-->
</div><!--/fluid-row-->

<div class="modal hide fade" id="myModal">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal">×</button>
<h3>Settings</h3>
</div>
<div class="modal-body">
<p>Here settings can be configured...</p>
</div>
<div class="modal-footer">
<a href="#" class="btn" data-dismiss="modal">Close</a>
<a href="#" class="btn btn-primary">Save changes</a>
</div>
</div>
<div class="common-modal modal fade" id="common-Modal1" tabindex="-1" role="dialog" aria-hidden="true">
<div class="modal-content">
<ul class="list-inline item-details">
	<li><a href="http://themifycloud.com">Admin templates</a></li>
	<li><a href="http://themescloud.org">Bootstrap themes</a></li>
</ul>
</div>
</div>
<div class="clearfix"></div>


@stop
