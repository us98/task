<!DOCTYPE html>
<html>
<head>
	<title>{{ $pageTitle }}</title>
	<link rel="stylesheet" type="text/css" href="{{ asset('themes/assets/css/bootstrap.min.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('themes/assets/css/reset.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('themes/assets/css/style.css') }}">
	@stack('head')
</head>
<body>

<div class="main-wrapper">
	@yield('body')
</div>

<script type="text/javascript" src="{{ asset('themes/assets/js/jquery.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('themes/assets/js/bootstrap.min.js') }}"></script>
@stack('js')
</body>
</html>