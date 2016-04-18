<?php $prefix = Route::getCurrentRoute()->getAction()['prefix']; // recupera os dados de acion/controller/prefix etc... ?>


@if($prefix == "admin") <!-- Se for administrador -->
    Click here to reset your password:
     <a href="{{ $link = url('/admin/password/reset', $token).'?email='.urlencode($user->getEmailForPasswordReset()) }}"> {{ $link }} </a>
@else <!-- Se for usuário comum: -->
    Click here to reset your password:
     <a href="{{ $link = url('password/reset', $token).'?email='.urlencode($user->getEmailForPasswordReset()) }}"> {{ $link }} </a>
@endif
