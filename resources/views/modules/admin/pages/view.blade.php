@extends('admin::layouts.master')

@section('content')

<div class = "container">

    <div class = "panel panel-default">
        <div class="panel-heading">
          <h3 class="panel-title">Ver Página </h3>
        </div>
        
      <div class="panel-body">
          <div class = "table-background">
            	<table class = "table">
              @foreach($page['attributes'] as $key => $value)
                <tr>
                    <th> {{$key}} </th>
                    <td> {{$value}} </td>
                </tr>
              @endforeach
              </table>
          </div>
          <button class = "btn btn-primary" onclick="window.history.back()"> Voltar </button>
      </div>
    </div>
</div>

@stop
