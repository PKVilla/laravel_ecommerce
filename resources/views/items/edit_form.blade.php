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
	<title>Update Item</title>
</head>
<body>

		<div class="container mt-5">
			<div class="row">
				<div class="col">
					
						<form method="POST" action="/menu/{{$itemedit->id}}/edit" enctype="multipart/form-data">
						{{csrf_field()}}
						{{method_field('PUT')}}
						<div class="form-group">
						<label>item name:</label>
							<input class="form-control" type="text" name="name" value="{{$itemedit->name}}"></input>
						</div>
						<div class="form-group">
							<label>Item Description:</label>
							<input class="form-control" name="description" value="{{$itemedit->description}}"></input>
						</div>
						<div class="form-group">
							<label>Item price:</label>
							<input class="form-control" type="text" name="price" value="{{$itemedit->price}}"></input>
						</div>
						<div class="form-group">
							<label>Item categories:</label>
							<select class="form-control" name="categories">
							@foreach($categories as $category)
							@if($itemedit->category_id == $category->id)
								<option value="{{$category->id}}" selected>{{$category->name}}</option>
								@else
								<option value="{{$category->id}}">{{$category->name}}</option>
								@endif
							@endforeach
							</select>
						</div>
						<div class="form-group">
							<label>Item Image:</label>
							<input type="file" name="image_path"></input>
						</div>
						<button type="submit" class="form-control btn btn-primary" >Submit</button>
						</form>
						@if ($errors->any())
						    <div class="alert alert-danger">
						        <ul class="list-unstyled">
						            @foreach ($errors->all() as $error) <!-- will print the error -->
						                <li>{{ $error }}</li>
						            @endforeach
						        </ul>
						    </div>	
						@endif
				</div>
			</div>
		</div>

</body>
</html>