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
  					<a href="{{url('/admin/banners')}}">banners</a>
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
						<h2><i class="halflings-icon white edit"></i><span class="break"></span> Editar banner </h2>
						<div class="box-icon">
							<a href="#" class="btn-setting"><i class="halflings-icon white wrench"></i></a>
							<a href="#" class="btn-minimize"><i class="halflings-icon white chevron-up"></i></a>
							<a href="#" class="btn-close"><i class="halflings-icon white remove"></i></a>
						</div>
					</div>
					<div class="box-content">
							  <?=Form::model($banner, array('method' => 'put', 'url' => '/admin/banners/update/' . $banner->id, 'id' => 'EditbannerForm', 'files' => true)); ?>
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

              <div class="form-group edit-image">
                <img src="{{asset('assets/files/'.$banner->file_name)}}" class="img-responsive banner">
              </div>
              <div class="form-group">
                  <button class="btn btn-info" id ="btn-image-change"> Trocar Imagem </button>
                  <div class="hidden">
                    <?=Form::label('files', 'Imagem'); ?>
                    <?=Form::file('files[]', null, array('class' => 'form-control')); ?>
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
