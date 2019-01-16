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
		<div class="row">
			<div class="col-lg-3">
			<div class="card">
			<div class="card-body">
				<h1>item details</h1>
				<img alt="no image yet" src="/{{ $itemdetails->img_path }}" class="img-fluid thumbnail">
				<p>{{ $itemdetails->name }}</p>
				<p>{{ $itemdetails->description }}</p>
				<p>{{ $itemdetails->price }}</p>
					<a class="btn btn-primary" href="">Edit</a>
					<a class="btn btn-danger" href="">Delete</a>
			</div>
			</div>
			</div>
		</div>
	</div>

		

		

</body>
</html>