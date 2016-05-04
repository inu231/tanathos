
@extends('admin::layouts.auth')

@section('content')

<div class="container-fluid-full">
<div class="row-fluid">

  <div class="row-fluid">
    <div class="login-box">
      <div class="icons">
        <a href="index.html"><i class="halflings-icon home"></i></a>
        <a href="#"><i class="halflings-icon cog"></i></a>
      </div>
      <h2>Faça login em sua conta</h2>
      {!! csrf_field() !!}
      <form class="form-horizontal" role="form" method="POST" action="{{ url('/admin/login') }}">

        @if(session('msg'))
          <div class="alert alert-success fade in" style="margin-top:18px;">
              <a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a>
              <strong>Success!</strong> {{session('msg')}}
          </div>
        @endif
        @if(session('error-msg'))
          <div class="alert alert-danger fade in" style="margin-top:18px; width: 60%; margin-left: 10%;">
              <a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a>
              <strong>Erro!</strong> {{session('error-msg')}}
          </div>
        @endif

      <input type="hidden" name="_token" value="{!! csrf_token() !!}">
        <fieldset>

          <input type="hidden" name="_token" value="{!! csrf_token() !!}">


          <div class="input-prepend" title="Username">
            <span class="add-on"><i class="halflings-icon user"></i></span>
            <input class="input-large span10" name="email" id="username" type="text" placeholder="digite o email"/>
          </div>
          <div class="clearfix"></div>

          <div class="input-prepend" title="Password">
            <span class="add-on"><i class="halflings-icon lock"></i></span>
            <input class="input-large span10" name="password" id="password" type="password" placeholder="type password"/>
          </div>
          <div class="clearfix"></div>

          <label class="remember" for="remember"><input type="checkbox" id="remember" />Lembrar</label>

          <div class="button-login">
            <button type="submit" class="btn btn-primary">Login</button>
          </div>
          <div class="clearfix"></div>
      </form>
      <hr>
      <h3>Esqueceu sua senha??</h3>
      <p>
        Sem problemas, <a href="{{ url('/admin/password/reset') }}">clique aqui</a> para recupera-la.
      </p>
    </div><!--/span-->
  </div><!--/row-->


</div><!--/.fluid-container-->

</div><!--/fluid-row-->
  <div class="common-modal modal fade" id="common-Modal1" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-content">
    <ul class="list-inline item-details">
      <li><a href="http://themifycloud.com">Admin templates</a></li>
      <li><a href="http://themescloud.org">Bootstrap themes</a></li>
    </ul>
  </div>
</div>
