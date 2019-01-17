<!DOCTYPE html>
<html>
<head>
<!-- bootstrap css -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
	<!-- jquery -->
		<script
	  src="https://code.jquery.com/jquery-3.3.1.min.js"
	  integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
	  crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
	<!-- bootstrap js -->
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
	<title></title>
</head>
<body>
<div class="container mt-5">

	<div class="alert">
		{{ Session::get('successmessage')}}		
	</div>
	
	<h2 class="text-center">Catalog</h2>
	<h3>Categories</h3>
	@foreach($categories as $category)
		
		<a href="">{{$category->name}}</a>

	@endforeach

	<hr>

		<h2 class="text-center">Current Items</h2>
		<div class="container">
			<div class="row">
			<div class="card">
			@foreach($items as $item)
				
				<a href="/menu/{{$item->id}}">{{$item->name}}</a>

			@endforeach

	</div>
	<a href="/menu/add">Add new item</a>
	</div>
	</div>
</div>
</body>
</html>	