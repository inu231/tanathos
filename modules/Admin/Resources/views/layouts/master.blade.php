<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Module Admin</title>

		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
		<!-- <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css"> -->
		<link rel="stylesheet" href="{{asset('assets/vendor/bootstrap/dist/css/bootstrap.min.css')}}">
		<link rel="stylesheet" href="{{asset('assets/vendor/bootstrap/dist/css/bootstrap-theme.min.css')}}">

		<script src="{{asset('assets/vendor/jquery/dist/jquery.min.js')}}"></script>
		<script src="{{asset('assets/vendor/bootstrap/dist/js/bootstrap.min.js')}}"></script>
		<script src = "{{asset('assets/vendor/tinymce/jquery.tinymce.min.js')}}"></script>
		<script src = "{{asset('assets/vendor/tinymce/tinymce.min.js')}}"></script>
		<script src = "{{asset('assets/js/admin/admin-scripts.js')}}"></script>

		<link href="{{ asset('assets/css/admin/admin.css') }}" rel="stylesheet"/>
	</head>
	<body>
		@include('admin::layouts.header')

		@yield('content')
	</body>
</html>
