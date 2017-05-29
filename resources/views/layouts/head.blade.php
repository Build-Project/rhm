	<head>
		<title>@yield('title')</title>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<!-- Tell the browser to be responsive to screen width -->
		<meta name="viewport" content="initial-scale=1, user-scalable=no, maximum-scale=1, width=device-width">
		<meta name="viewport" content="initial-scale=1, user-scalable=no, maximum-scale=1">
		<meta name="csrf-token" content="{{ csrf_token() }}" />
		<link rel="shortcut icon" type="image/png" href="resources/images/favicon.png"/>

		<link type="text/css" href="{{asset('plugins/select2/select2.min.css')}}" rel="stylesheet">
		<link rel="stylesheet" href="{{asset('bootstrap/css/bootstrap.min.css')}}">
		<link rel="stylesheet" href="{{asset('bootstrap/css/bootstrapValidator.css')}}">
		<link rel="stylesheet" href="{{asset('bootstrap/css/font-awesome.min.css')}}">
		<link rel="stylesheet" href="{{asset('bootstrap/css/ionicons.min.css')}}">
		<link rel="stylesheet" href="{{asset('plugins/daterangepicker/daterangepicker-bs3.css')}}">
		<link rel="stylesheet" href="{{asset('plugins/timepicker/bootstrap-timepicker.min.css')}}">

		<link rel="stylesheet" href="{{asset('dist/css/AdminLTE.min.css')}}">
		<link rel="stylesheet" href="{{asset('dist/css/skins/_all-skins.min.css')}}">
		<link rel="stylesheet" href="{{asset('bootstrap/css/fileinput.min.css')}}">
		<link rel="stylesheet" href="{{asset('editor/summernote.css')}}">
		<link rel="stylesheet" href="{{asset('js/style.css')}}">
		<link rel="stylesheet" href="{{asset('editor/font-awesome.min.css')}}">
		<link rel="stylesheet" href="{{asset('editor/summernote.css')}}" >
		<link rel="stylesheet" href="{{asset('css/sweetalert.css')}}">
		<link rel="stylesheet" href="{{asset('angular/css/angular-material.css')}}">
		<link rel="stylesheet" href="{{asset('angular/css/loading-bar.css')}}">
		<link rel="stylesheet" href="{{asset('angular/css/angular-block-ui.css')}}">
		<link rel="stylesheet" href="{{asset('plugins/toggle/bootstrap-toggle.min.css')}}">

		<style type="text/css">
			.cursor_move{ cursor: move; }
			.width-100{ width: 100px; }
			.width-80{ width: 80px; }
			.width-90{ width: 80px; }
			.requrie{color: #b9292d;}
			.select2{ width: 100%; }
			.iText-right{ text-align:right !important; }
			.dis-number{ text-align:right !important; margin-right: 10px !important; width:120px !important;}
			.iPanel{ margin-top: -25px; }
			.color_msg{ color:#F8BB86 !important; }
			.min-height-300{ height: 300px !important;  }
			.content-wrapper{
				min-height: 80vh;
			}
			.panel {
   				 margin-bottom: 0px;
			}
		</style>

		<script src="{{asset('bootstrap/js/jquery.min.js')}}"></script>
		<script src="{{asset('bootstrap/js/angular.min.js')}}"></script>
		<script src="{{asset('bootstrap/js/jquerysession.js')}}"></script>
		<script src="{{asset('bootstrap/js/bootstrap-filestyle.min.js')}}"></script>
		<script src="{{asset('angular/angular-material.min.js')}}"></script>
		<script src="{{asset('angular/angular-animate.min.js')}}"></script>
		<script src="{{asset('angular/loading-bar.js')}}"></script>
		<script src="{{asset('angular/angular-block-ui.js')}}"></script>
		<script src="{{asset('angular/angular-aria.min.js')}}"></script>
		<script src="{{asset('angular/angular-messages.min.js')}}"></script>
		<script src="{{asset('angular/datetime.js')}}"></script>
		<script src="{{asset('angular/custom-input.js')}}"></script>
		<script src="{{asset('angular/FileSaver.js')}}"></script>
		<script src="{{asset('plugins/toggle/bootstrap-toggle.min.js')}}"></script>

		<script src="{{asset('angular/svg-assets-cache.js')}}"></script>
		<script src="{{asset('bootstrap/js/dirPagination.js')}}"></script>
		<script src="{{asset('bootstrap/js/bootstrapValidator.js')}}"></script>
		<script src="{{asset('js/jPages.js')}}"></script>
		<script src="{{asset('editor/summernote.min.js')}}"></script>
		<script src="{{asset('plugins/select2/select2.full.js')}}"></script>
		<script src="{{asset('plugins/timepicker/bootstrap-timepicker.min.js')}}"></script>
		<script src="{{asset('bootstrap/menu/menu.js')}}"></script>
	</head>
