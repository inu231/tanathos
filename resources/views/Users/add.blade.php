<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
  <div class="jumbotron">
    <h1> Adicionar Usuarios </h1>
    <p>Resize this responsive page to see the effect!</p>
  </div>


 {!! Form::open(array('action' => 'UsersController@store')) !!}
 NOME: {!! Form::text('name') !!}
 Email: {!! Form::email('email') !!}
 Senha: {!! Form::password('password') !!}
 <input type = "submit" value="enviar">

</div>

</body>
</html>
