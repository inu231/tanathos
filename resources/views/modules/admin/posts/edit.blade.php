@extends('admin::layouts.master')

@section('content')


<div class = "container">

    @if (count($errors) > 0)
      <div class="alert alert-danger fade in">
          <a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a>
          <span> Houve um erro ao salvar os dados. Verifique os campos que estão incorretos. </span>
      </div>
    @endif

    <div class="panel panel-default">
        <div class="panel-heading">
          <h3 class="panel-title">Editar Post </h3>
        </div>
        <div class="panel-body">
            <?=Form::model($post, array('method' => 'put', 'url' => '/admin/posts/update/' . $post->id, 'id' => 'EditpostForm')); ?>

            <div class="form-group">
                <?=Form::label('user_id', 'Autor') ;?>
                <?=Form::select('user_id', [!empty($post->user_id) ? $post->user_id : null => !empty($post->user_id) ? $post->user->name : ' '] + $users->toArray(), null, array('class' => 'form-control')); ?>
            </div>
            <div class="form-group">
                <?=Form::label('post_category_id', 'Categoria') ;?>
                <?=Form::select('post_category_id', [!empty($post->post_category_id) ? $post->post_category_id : null => !empty($post->post_category_id) ? $post->postCategory->name : ' '] + $postCategories->toArray(), null, array('class' => 'form-control')); ?>
            </div>
            <div class="form-group">
                <?=Form::label('tag_list', 'Tag'); ?>
                <?=Form::select('tag_list[]', $tags, $tags_list->toArray(), array('class' => 'form-control', 'multiple')); ?>
            </div>
            <div class="form-group">
                <?=Form::label('title', 'Título') ;?>
                <?=Form::text('title', null, array('class' => 'form-control', 'required')); ?>
                @if(!empty($errors->get('title')))
                    <ul class="ul-validation-error">
                    @foreach($errors->get('title') as $error)
                        <li class="validation-error"> {{$error}}</li>
                    @endforeach
                    </ul>
                @endif
            </div>
            <div class="form-group">
                <?=Form::label('body', 'Conteúdo'); ?>
                <?=Form::textarea('body', null, array('class' => 'editor-light form-control')); ?>
            </div>
            <div class="form-group">
                <?=Form::label('slug', 'Slug') ;?>
                <?=Form::text('slug', null, array('class' => 'form-control')); ?>
                @if(!empty($errors->get('slug')))
                    <ul class="ul-validation-error">
                    @foreach($errors->get('slug') as $error)
                        <li class="validation-error"> {{$error}}</li>
                    @endforeach
                    </ul>
                @endif
            </div>
            <div class="form-group">
                <?=Form::submit('Enviar', array('class' => 'btn btn-primary'));?>
                <?=Form::close(); ?>
            </div>
        </div>
    </div>
</div>

@stop
