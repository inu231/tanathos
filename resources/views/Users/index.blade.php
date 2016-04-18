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
    <h1>My First Bootstrap Page</h1>
    <p>Resize this responsive page to see the effect!</p>
  </div>

  @if(Session::has('flash_message'))
      <div class="alert alert-success"><span class="glyphicon glyphicon-ok"></span><em> {!! session('flash_message') !!}</em></div>
  @endif

  <div>
      Clique {!! Html::linkAction('UsersController@add', 'Aqui') !!} Para adicionar usuários
  </div>

  <table class="table">
      <tr>
        <th> Nome </th>
        <th> Email </th>
        <th> Data de Criação </th>
        <th> Telefone </th>
        <th> Ações </th>
      </tr>
      @foreach($users as $user)
        <tr>
          <td> {{$user->name}} </td>
          <td> {{$user->email}}</td>
          <td> {{$user->created_at}} </td>
          <td> {{isset($user->userPhone->phone)? $user->userPhone->phone : 'Sem telefone'}} </td>
          <td>
             <li>
               {!! Html::linkAction('UsersController@destroy', 'Delete', ['id' => $user->id], ['class' => 'abc']) !!} |
               {!! Html::linkAction('UsersController@show', 'View', ['id' => $user->id], ['class' => 'abc']) !!} |
               {!! Html::linkAction('UsersController@edit', 'Edit', ['id' => $user->id], ['class' => 'abc']) !!}
             </li>
         </td>
        </tr>
      @endforeach
  </table>



</div>

</body>
</html>
