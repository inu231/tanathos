<nav class="navbar navbar-default">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="{{'/admin'}}"> JT Soft </a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> <i class="fa fa-newspaper-o"></i>&nbsp; Páginas <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="{{url('admin/pages')}}">Listar Páginas</a></li>
            <li><a href="{{url('admin/pages/add')}}">Adicionar Página</a></li>
          </ul>
        </li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> <i class="fa fa-newspaper-o"></i>&nbsp; Posts <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="{{url('admin/posts')}}">Listar Posts</a></li>
            <li><a href="{{url('admin/posts/add')}}">Adicionar Post</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="{{url('/admin/post-categories')}}">Categorias</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="{{url('/admin/tags')}}" >Tags</a></li>
          </ul>
        </li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> Banners <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="{{url('/admin/banners/add')}}">Adicionar Banner</a></li>
            <li><a href="{{url('/admin/banners')}}">Listar Banners</a></li>
          </ul>
        </li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> Configurações do site <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="#"><i class = "fa fa-gears"></i> Configurações gerais</a></li>
            <li><a href="{{url('/admin/users')}}"><i class = "fa fa-users"></i> Usuários ADM </a></li>
            <li><a href="#"><i class = "fa fa-wrench"></i> Permissões</a></li>
          </ul>
        </li>
      </ul>

        <ul class="navbar-user">
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">   Olá, <strong> {{auth()->guard('admin')->user()->name}} </strong> <span class="caret"></span></a>
            <ul class="dropdown-menu">
              <li><a href="{{url('/admin/users/config/' .auth()->guard('admin')->user()->id )}}"><i class = "fa fa-gears"></i> Configurações </a></li>
              <li><a href="{{url('/admin/logout')}}"><i class = "fa fa-wrench"></i> Sair </a></li>
            </ul>
          </li>
        </ul>

    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
