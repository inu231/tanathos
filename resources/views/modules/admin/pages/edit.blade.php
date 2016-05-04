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
					<a href="{{url('/admin/pages')}}">pages</a>
					<i class="icon-angle-right"></i>
				</li>
				<li>
					<i class="icon-edit"></i>
					<a href="#">Editar</a>
				</li>
			</ul>


					@if(session('error-msg'))
						<div class="alert alert-success fade in" style="margin-top:18px;">
								<a href="#" id="close-alert-msg1" class="close" data-dismiss="alert" aria-label="close" title="close">×</a>
								<strong>Success!</strong> {{session('error-msg')}}
						</div>
					@endif

					@if (count($errors) > 0)
						<div class="alert alert-danger fade in" style="margin-top:18px;">
								<a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a>
								<strong>Ops! </strong> <span> Houve um erro ao salvar os dados. Verifique os campos que estão incorretos. </span>
								@foreach($errors->all() as $error)
									{{$error}}
								@endforeach
						</div>
					@endif

			<div class="row-fluid sortable">
				<div class="box span12">
					<div class="box-header" data-original-title>
						<h2><i class="halflings-icon white edit"></i><span class="break"></span> Ediar page </h2>
						<div class="box-icon">
							<a href="#" class="btn-setting"><i class="halflings-icon white wrench"></i></a>
							<a href="#" class="btn-minimize"><i class="halflings-icon white chevron-up"></i></a>
							<a href="#" class="btn-close"><i class="halflings-icon white remove"></i></a>
						</div>
					</div>
					<div class="box-content">
							<?=Form::model($page, array('method' => 'put', 'url' => '/admin/pages/update/'.$page->id, 'id' => 'EditpageForm', 'class' => 'form-admin')); ?>
						  <fieldset>
								<div class="control-group">
											<div class="controls">
												<?=Form::label('parent_id', 'Subpágina de?') ;?>
												<?=Form::select('parent_id', [null => ' '] + $parents->toArray(), null, array('class' => 'form-control span12')); ?>
											</div>
								</div>
							<div class="control-group">
										<div class="controls">
												<?=Form::label('title', 'Título') ;?>
												<?=Form::text('title', null, array('class' => 'form-control span12')); ?>
												 @if(!empty($errors->get('title')))
														 <ul class="ul-validation-error"> <li class="validation-error"> {{$errors->first('title')}}</li> </ul>
												 @endif
										</div>
							</div>
							<div class="control-group">
										<div class="controls">
												<?=Form::label('conteudo', 'Conteúdo'); ?>
												<?=Form::textarea('content', null, array('class' => 'editor-light form-control')); ?>
												 @if(!empty($errors->get('content')))
														 <ul class="ul-validation-error"> <li class="validation-error"> {{$errors->first('content')}}</li> </ul>
												 @endif
										</div>
							</div>
              <!-- <div class="control-group">
                    <div class="controls">
                        <?=Form::label('slug', 'Slug') ;?>
                        <?=Form::text('slug', null, array('class' => 'form-control span12')); ?>
                         @if(!empty($errors->get('slug')))
                             <ul class="ul-validation-error"> <li class="validation-error"> {{$errors->first('slug')}}</li> </ul>
                         @endif
                    </div>
              </div> -->

							<div class="form-actions">
								  <button type="submit" class="btn btn-primary">Editar</button>
								  <a class="btn" href="{{url('/admin/pages')}}">Cancelar</a>
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
