@extends('admin::layouts.master')

@section('content')

<div class = "container">

    <div class = "panel panel-default">
        <div class="panel-heading">
          <h3 class="panel-title">Ver banner </h3>
        </div>

      <div class="panel-body">
          <div class = "table-background">
            	<table class = "table">
              @foreach($banner['attributes'] as $key => $value)
                <tr>
                    <th> {{$key}} </th>
                    <td> {{$value}} </td>
                </tr>
              @endforeach
              <tr>
                <th> Imagem </th>
                <td> <img src="{{asset('assets/files/Sylvanas-windrunner-222018.jpg')}}" style="height: 200px"> </td>
              </tr>

              </table>

          </div>
          <button class = "btn btn-primary" onclick="window.history.back()"> Voltar </button>
      </div>
    </div>
</div>

@stop
