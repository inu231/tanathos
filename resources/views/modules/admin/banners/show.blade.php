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
            <a href="{{url('/admin/banners')}}">banners</a>
            <i class="icon-angle-right"></i>
          </li>
          <li>
            <a href="#">Visualizar</a>
          </li>
  			</ul>

					@if (count($errors) > 0)
						<div class="alert alert-danger fade in" style="margin-top:18px;">
								<a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a>
								<strong>Ops! </strong> <span> Houve um erro ao salvar os dados. Verifique os campos que estão incorretos. </span>
						</div>
					@endif

			<div class="row-fluid sortable">
				<div class="box span12">
					<div class="box-header" data-original-title>
						<h2><i class="halflings-icon white zoom-in"></i><span class="break"></span> Visualizar banner </h2>
						<div class="box-icon">
							<a href="#" class="btn-setting"><i class="halflings-icon white wrench"></i></a>
							<a href="#" class="btn-minimize"><i class="halflings-icon white chevron-up"></i></a>
							<a href="#" class="btn-close"><i class="halflings-icon white remove"></i></a>
						</div>
					</div>
					<div class="box-content">
						  <fieldset>

                <div class = "table-background">
                    <table class = "table">
                    <tr>
                      <th> Imagem </th>
                      <td> <img src="{{asset('assets/files/'.$banner->file_name)}}" style="height: 200px"> </td>
                    </tr>
                    <tr>
                      <th> Nome </th>
                      <td> {{$banner->name}} </td>
                    </tr>
                    </table>
                </div>
                <button class = "btn btn-primary" onclick="window.history.back()"> Voltar </button>


						  </fieldset>
					</div>
				</div><!--/span-->

			</div><!--/row-->




	</div><!--/.fluid-container-->

        <!-- end: Content -->
    </div><!--/#content.span10-->
    </div><!--/fluid-row-->


@stop
