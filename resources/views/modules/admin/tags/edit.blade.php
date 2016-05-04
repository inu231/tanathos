@extends('admin::layouts.master')

@section('content')



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
  				<li>
  					<a href="{{url('/admin/tags')}}">Tags</a>
  					<i class="icon-angle-right"></i>
  				</li>
  				<li>
  					<i class="icon-edit"></i>
  					<a href="#">Editar</a>
  				</li>
  			</ul>

					@if (count($errors) > 0)
						<div class="alert alert-danger fade in" style="margin-top:18px;">
								<a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a>
								<strong>Ops! </strong> <span> Houve um erro ao salvar os dados. Verifique os campos que estão incorretos. </span>
						</div>
					@endif

			<div class="row-fluid sortable">
				<div class="box span12">
					<div class="box-header" data-original-title>
						<h2><i class="halflings-icon white edit"></i><span class="break"></span> Editar Tag </h2>
						<div class="box-icon">
							<a href="#" class="btn-setting"><i class="halflings-icon white wrench"></i></a>
							<a href="#" class="btn-minimize"><i class="halflings-icon white chevron-up"></i></a>
							<a href="#" class="btn-close"><i class="halflings-icon white remove"></i></a>
						</div>
					</div>
					<div class="box-content">
							  {!! Form::model($tag, array('method' => 'put', 'class' => 'form-admin', 'url' => '/admin/tags/update/' . $tag->id, 'id' => 'EdittagForm')) !!}
						  <fieldset>
							<div class="control-group">
					          <label class="control-label" for="name"> Nome </label>
    							  <div class="controls">
    		                 {{ Form::text('name', null, ['class' => 'span12']) }}
												 @if(!empty($errors->get('name')))
														 <ul class="ul-validation-error"> <li class="validation-error"> {{$errors->first('name')}}</li> </ul>
												 @endif
    							  </div>
							</div>

							<div class="control-group hidden-phone">
							  	<label class="control-label" for="description">Descrição</label>
								  <div class="controls">
											{{ Form::textarea('description', null, array('class' => 'span12')) }}
								  </div>
							</div>
							<div class="form-actions">
								  <button type="submit" class="btn btn-primary">Salvar</button>
								  <button type="reset" class="btn" onclick="window.history.back()">Cancelar</button>
							</div>
						  </fieldset>
						</form>

					</div>
				</div><!--/span-->

			</div><!--/row-->




	</div><!--/.fluid-container-->

        <!-- end: Content -->
    </div><!--/#content.span10-->
    </div><!--/fluid-row-->


@stop
