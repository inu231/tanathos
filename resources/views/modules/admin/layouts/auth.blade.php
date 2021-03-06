<!DOCTYPE html>
<html lang="en">
	<head>
        <!-- start: Meta -->
        	<meta charset="utf-8">
        	<title>Bootstrap Metro Dashboard by Dennis Ji for ARM demo</title>
        	<meta name="description" content="Bootstrap Metro Dashboard">
        	<meta name="author" content="Dennis Ji">
        	<meta name="keyword" content="Metro, Metro UI, Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
        	<!-- end: Meta -->


        	<!-- start: Mobile Specific -->

            <meta name="viewport" content="width=device-width, initial-scale=1">
            <!-- end: Mobile Specific -->

            <!-- start: CSS -->
            <link id="bootstrap-style" href="{{asset('assets/css/bootstrap.min.css')}}" rel="stylesheet">
            <link href="{{asset('assets/css/bootstrap-responsive.min.css')}}" rel="stylesheet">
            <link id="base-style" href="{{asset('assets/css/style.css')}}" rel="stylesheet">
            <link id="base-style-responsive" href="{{asset('assets/css/style-responsive.css')}}" rel="stylesheet">
            <link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800&subset=latin,cyrillic-ext,latin-ext' rel='stylesheet' type='text/css'>
						<link href="{{asset('assets/css/admin/admin.css')}}" rel="stylesheet">
						<link href="{{asset('assets/css/jquery.alerts.css')}}" rel="stylesheet">
						<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css">
            <!-- end: CSS -->


        	<!-- The HTML5 shim, for IE6-8 support of HTML5 elements -->
        	<!--[if lt IE 9]>
        	  	<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
        		<link id="ie-style" href="{{asset('assets/css/ie.css')}}" rel="stylesheet">
        	<![endif]-->

        	<!--[if IE 9]>
        		<link id="ie9style" href="{{asset('assets/css/ie9.css')}}" rel="stylesheet">
        	<![endif]-->

        	<!-- start: Favicon -->
        	<link rel="shortcut icon" href="{{asset('assets/img/favicon.ico')}}">
        	<!-- end: Favicon -->
			
					<style type="text/css">
					body { background: url({{asset('assets/img/bg-login.jpg')}}) !important; }
				</style>
	</head>
	<body>


        @yield('content')




		<!-- start: Dashboard theme JavaScript-->

        		<script src="{{asset('assets/js/jquery-1.9.1.min.js')}}"></script>
      	    <script src="{{asset('assets/js/jquery-migrate-1.0.0.min.js')}}"></script>
        		<script src="{{asset('assets/js/jquery-ui-1.10.0.custom.min.js')}}"></script>
        		<script src="{{asset('assets/js/jquery.ui.touch-punch.js')}}"></script>
        		<script src="{{asset('assets/js/modernizr.js')}}"></script>
      			<script src="{{asset('assets/js/bootstrap.min.js')}}"></script>
        		<script src="{{asset('assets/js/jquery.cookie.js')}}"></script>
        		<script src="{{asset('assets/js/fullcalendar.min.js')}}"></script>
        		<script src="{{asset('assets/js/jquery.dataTables.min.js')}}"></script>
        		<script src="{{asset('assets/js/excanvas.js')}}"></script>
	          <script src="{{asset('assets/js/jquery.flot.js')}}"></script>
	          <script src="{{asset('assets/js/jquery.flot.pie.js')}}"></script>
	          <script src="{{asset('assets/js/jquery.flot.stack.js')}}"></script>
	          <script src="{{asset('assets/js/jquery.flot.resize.min.js')}}"></script>
        		<script src="{{asset('assets/js/jquery.chosen.min.js')}}"></script>
        		<script src="{{asset('assets/js/jquery.uniform.min.js')}}"></script>
        		<script src="{{asset('assets/js/jquery.cleditor.min.js')}}"></script>
        		<script src="{{asset('assets/js/jquery.noty.js')}}"></script>
        		<script src="{{asset('assets/js/jquery.elfinder.min.js')}}"></script>
        		<script src="{{asset('assets/js/jquery.raty.min.js')}}"></script>
        		<script src="{{asset('assets/js/jquery.iphone.toggle.js')}}"></script>
        		<script src="{{asset('assets/js/jquery.uploadify-3.1.min.js')}}"></script>
        		<script src="{{asset('assets/js/jquery.gritter.min.js')}}"></script>
        		<script src="{{asset('assets/js/jquery.imagesloaded.js')}}"></script>
        		<script src="{{asset('assets/js/jquery.masonry.min.js')}}"></script>
        		<script src="{{asset('assets/js/jquery.knob.modified.js')}}"></script>
        		<script src="{{asset('assets/js/jquery.sparkline.min.js')}}"></script>
        		<script src="{{asset('assets/js/counter.js')}}"></script>
        		<script src="{{asset('assets/js/retina.js')}}"></script>
        		<script src="{{asset('assets/js/custom.js')}}"></script>
						<script src="{{asset('assets/js/jquery.alerts.js')}}"></script>
						<script src="{{asset('assets/js/admin/admin-scripts.js')}}"></script>
						<script src = "{{asset('assets/vendor/tinymce/jquery.tinymce.min.js')}}"></script>
						<script src = "{{asset('assets/vendor/tinymce/tinymce.min.js')}}"></script>
        	<!-- end: Dashboard theme JavaScript-->


	</body>
</html>
