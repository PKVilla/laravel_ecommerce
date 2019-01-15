<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

	<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
	tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
	quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
	consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
	cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
	proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>


 	<h2>
 		
 		<p>Hello, <strong>{{ $fullname['name'] }}</strong></p>

 	</h2>

 	@if($fullname['name'] == 'juan')

 	<h2>
 		Hello {{ $fullname['name']}}
 	</h2>

 	@else
 		<h2>You're not juan!</h2>
 	@endif

 	@foreach($fullname as $key => $value)
 		<h2>Key is: {{$key}},
 		value is {{$value}}</h2>
 	@endforeach

</body>
</html>