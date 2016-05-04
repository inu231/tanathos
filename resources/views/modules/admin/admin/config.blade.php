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
					<a href="{{url('/admin/users')}}">users</a>
					<i class="icon-angle-right"></i>
				</li>
				<li>
					<i class="icon-edit"></i>
					<a href="#">Configurações</a>
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
						</div>
					@endif

			<div class="row-fluid sortable">
				<div class="box span12">
					<div class="box-header" data-original-title>
						<h2><i class="halflings-icon white edit"></i><span class="break"></span> Configurar Usuário </h2>
						<div class="box-icon">
							<a href="#" class="btn-setting"><i class="halflings-icon white wrench"></i></a>
							<a href="#" class="btn-minimize"><i class="halflings-icon white chevron-up"></i></a>
							<a href="#" class="btn-close"><i class="halflings-icon white remove"></i></a>
						</div>
					</div>
					<div class="box-content">
							<?=Form::open(array('url' => '/admin/users/store', 'id' => 'AdduserForm', 'class' => 'form-admin')); ?>
						  <fieldset>



                <form class="form-horizontal" role="form" method="POST" action="{{ url('/admin/users/update-config/'.$user->id) }}">
                    {!! csrf_field() !!}

                    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">


                        <div class="col-md-6 user-form">
                            <label class="col-md-4 control-label user-form"> Nome </label>
                            <input type="text" class="form-control user-form" name="name" value="{{ $user->name }}">

                            @if ($errors->has('name'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">


                        <div class="col-md-6 user-form">
                            <label class="col-md-4 control-label user-form"> Endereço de Email </label>
                            <input type="email" class="form-control user-form" name="email" value="{{ $user->email }}">

                            @if ($errors->has('email'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class = "password-group hidden">
                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">

                            <div class="col-md-6 user-form">
                                <label class="col-md-4 control-label user-form">Senha </label>
                                <input type="password" class="form-control user-form" name="password">

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                            <div class="col-md-6 user-form">
                                <label class="col-md-4 control-label user-form">Confirme a senha</label>
                                <input type="password" class="form-control user-form" name="password_confirmation">

                                @if ($errors->has('password_confirmation'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                    </div> <!-- End Password-group -->

              <button type="button" class="btn btn-default" id="btn-password-change" style="margin-left: 150px;">
                  <i class="fa fa-btn fa-key"></i> Trocar senha
              </button>

							<div class="form-actions">
								  <button type="submit" class="btn btn-primary">Adicionar</button>
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


@endsection






<!--
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading"> Configurações </div>
                <div class="panel-body">
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

                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/admin/users/update-config/'.$user->id) }}">
                        {!! csrf_field() !!}

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label"> Nome </label>

                            <div class="col-md-6">
                                <input type="text" class="form-control" name="name" value="{{$user->name}}">

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label"> Endereço de Email </label>

                            <div class="col-md-6">
                                <input type="email" class="form-control" name="email" value="{{ $user->email }}">

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class = "password-group hidden">
                            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                <label class="col-md-4 control-label">Senha </label>

                                <div class="col-md-6">
                                    <input type="password" class="form-control" name="password" value="">

                                    @if ($errors->has('password'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                                <label class="col-md-4 control-label">Confirme a senha</label>

                                <div class="col-md-6">
                                    <input type="password" class="form-control" name="password_confirmation">

                                    @if ($errors->has('password_confirmation'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('password_confirmation') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-btn fa-user"></i> Enviar
                                </button>
                                <button type="button" class="btn btn-default" id="btn-password-change">
                                    <i class="fa fa-btn fa-key"></i> Trocar senha
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
