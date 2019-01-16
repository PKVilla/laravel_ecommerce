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
	<title>Add Item</title>
</head>
<body>
			<!-- validation error -->
			@if ($errors->any())
			    <div class="alert alert-danger">
			        <ul class="list-unstyled">
			            @foreach ($errors->all() as $error) <!-- will print the error -->
			                <li>{{ $error }}</li>
			            @endforeach
			        </ul>
			    </div>	
			@endif

		<div class="container mt-5">
			<div class="row">
				<div class="col">
				<h1 class="text-center">Add New Item</h1>
					<form method="POST" action="/menu/add" enctype="multipart/form-data">
					{{ csrf_field() }}
						<label for="name">Name:</label>
						<input type="text" name="itemname" id="name" class="form-control"></input>
						<br>
						<label for="description">Description:</label>
						<textarea name="itemdescription" id="description" class="form-control"></textarea>
						<br>
						<label for="price">Price:</label>
						<input type="number" name="itemprice" id="price" step=0.01 min=0 class="form-control"></input>
						<br>
						<label>Upload Image:</label>
						 <div class="form-group">
						    <input type="file" name="itemimg_path" class="form-control-file btn btn-secondary" id="exampleFormControlFile1">
						  </div>
						  <br>
						  <button class="btn btn-success">Add new Item</button>
					</form>
				</div>
			</div>
		</div>
		</div>
</body>
</html>