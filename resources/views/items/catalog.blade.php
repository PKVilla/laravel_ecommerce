<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<h2>Catalog</h2>
	<h3>Categories</h3>
	@foreach($categories as $category)
		
		<a href="">{{$category->name}}</a>

	@endforeach

	<hr>

		<h2>Current Items:</h2>
			@foreach($items as $item)
				
				<a href="">{{$item->name}}</a>

			@endforeach
</body>
</html>