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
	@if(Session::has('successmessage'))
		<div class="alert alert-success">
				{{ Session::get('successmessage')}}		
		</div>
	@endif
		<div class="row">
			<div class="col-lg-3">
			<div class="card">
			<div class="card-body">
				<h1>item details</h1>
				<img alt="no image yet" src="/{{ $itemdetails->img_path }}" class="img-fluid thumbnail">
				<p>{{ $itemdetails->name }}</p>
				<p>{{ $itemdetails->description }}</p>
				<p>{{ $itemdetails->price }}</p>
					<a class="btn btn-primary w-100 mb-2" href="/menu/{{$itemdetails->id}}/edit">Edit</a>
					<a class="btn btn-danger w-100" href="" data-toggle="modal" data-target="#Deletemodal">Delete</a>
			</div>
			</div>
			</div>
		</div>
	</div>

		<!-- Delete modal -->
		<div id="Deletemodal" class="modal" tabindex="-1" role="dialog">
		  <div class="modal-dialog" role="document">
		    <div class="modal-content">
		      <div class="modal-header">
		        <h5 class="modal-title">Modal title</h5>
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		          <span aria-hidden="true">&times;</span>
		        </button>
		      </div>
		      <div class="modal-body">
		      		<p>Do you want to delete this {{ $itemdetails->name }}?</p>
		       		<form method="POST" action="/menu/{{$itemdetails->id}}/delete">
		       			{{csrf_field()}}
		       			{{method_field('DELETE')}}
		       			<button type="submit" class="btn btn-primary">Confirm</button>
		       		</form>
		      </div>
		      <div class="modal-footer">
		        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
		        <button type="button" class="btn btn-primary">Save changes</button>
		      </div>
		    </div>
		  </div>
		</div>
		<!-- Edit Modal -->
		<div id="Editmodal" class="modal" tabindex="-1" role="dialog">
		  <div class="modal-dialog" role="document">
		    <div class="modal-content">
		      <div class="modal-header">
		        <h5 class="modal-title">Modal title</h5>
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		          <span aria-hidden="true">&times;</span>
		        </button>
		      </div>
		      <div class="modal-body">
		      <p>Do you want to edit this {{ $itemdetails->name }}?</p>
		        	<form method="POST" action="/menu/{{$itemdetails->id}}/delete">
		       			{{ csrf_field() }}
		       			{{ method_field('PUT') }}
		       			<button type="submit" class="btn btn-primary">Confirm</button>
		       		</form>
		      </div>
		      <div class="modal-footer">
		        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
		        <button type="button" class="btn btn-primary">Save changes</button>
		      </div>
		    </div>
		  </div>
		</div>

		

</body>
</html>