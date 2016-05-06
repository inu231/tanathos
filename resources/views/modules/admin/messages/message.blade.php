@extends('admin::layouts.master')

@section('content')

<div id="content" class="span10">

<ul class="breadcrumb">
	<li>
		<i class="icon-home"></i>
		<a href="{{url('/admin')}}">Home</a>
		<i class="icon-angle-right"></i>
	</li>
	<li><a href="#">Messages</a></li>
</ul>

<div class="row-fluid">

	<div class="span7">
		<h1>Caixa de Entrada</h1>

		<ul class="messagesList">

			@foreach($messages as $message)
				<li id="{{$message->id}}" onclick="getMessage(id)">
					<span class="from">
							<span class="glyphicons star"><i></i>
							</span> {{$message->author}}
					</span>
					<span class="title"> {{$message->title}}</span>
					<span class="date">
						{{date('d/m/Y')==date('d/m/Y', strtotime($message->created_at))?  'Hoje' : date('d/m/Y', strtotime($message->created_at))}},
						 <b>{{date('H:i', strtotime($message->created_at))}}</b>
				 </span>
				</li>
			@endforeach
		</ul>


		  {!! $messages->appends(Input::except('page'))->links() !!}
		<div class="common-modal modal fade" id="common-Modal1" tabindex="-1" role="dialog" aria-hidden="true">
			<div class="modal-content">
				<ul class="list-inline item-details">
					<li><a href="http://themifycloud.com">Admin templates</a></li>
					<li><a href="http://themescloud.org">Bootstrap themes</a></li>
				</ul>
			</div>
		</div>
	</div>


	<div id="" class="span5 noMarginLeft">

		<div class="message dark">
			<?=Form::open(array('url' => '/admin/messages/sendmail', 'id' => 'AddMessageForm', 'class' => '')); ?>

			<div class="header">
				<h1 id="message-title"></h1>
				<div class="from"><i class="halflings-icon user"></i> <b id="message-author">  </b> / <span id="message-email"> </span> </div>
				<div class="date"><b id="message-created_at"> </b> <i class="halflings-icon time"></i> <b id="message-time">  </b></div>

				<div class="menu"></div>

			</div>

			<div class="content">
				<p>
					<blockquote id="message-body">

					</blockquote>
				<p>
			</div>




					<fieldset>
						<textarea tabindex="3" class="sendMessage input-xlarge span12" id="" name="message" rows="12" placeholder="Clique aqui para responder"></textarea>
						<input type = "hidden" name="name" id="nameToSend">
						<input type = "hidden" name="id" id="user-id">
						<input type = "hidden" name="email" id="emailToSend">
						<div id="" class="actions">

							<button id="" tabindex="3" type="submit" class="sendmail btn btn-success" onclick="">Enviar Mensagem</button>

						</div>

					</fieldset>
				</form>




		</div>

	</div>

</div>



</div><!--/.fluid-container-->

<!-- end: Content -->
</div><!--/#content.span10-->
</div><!--/fluid-row-->

<div class="modal hide fade" id="myModal">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal">×</button>
<h3>Settings</h3>
</div>
<div class="modal-body">
<p>Here settings can be configured...</p>
</div>
<div class="modal-footer">
<a href="#" class="btn" data-dismiss="modal">Close</a>
<a href="#" class="btn btn-primary">Save changes</a>
</div>
</div>


@endsection
