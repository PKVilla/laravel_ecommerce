<!DOCTYPE html>
<html>
<head>
	<title>@yield('title')</title>
	@include('header') <!-- this is called directives -->
</head>
<body>

	@include('nav')

	@yield('body') <!-- user defined ('body') -->

	@yield('admin_body')
	
</body>
</html>