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
	<title>Cart</title>
</head>
<body>
	
	@if($item_cart != null)
	<div class="container mt-5">
		<div class="col-lg-12">
			<!-- <div class="row"> -->
			<h1>My Cart</h1>
				<div>
					<table class="table table-striped">
						<thead>
							<tr>
								<th>Item</th>
								<th>Quantity</th>
								<th>Price</th>
								<th>subtotal</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
							@foreach($item_cart as $cart)
							<tr>
								<td>{{$cart->name}}</td>
									<td>
										<form action="/menu/mycart/{{$cart->id}}/updatecart" method="POST">
											{{ csrf_field()}}
											{{ method_field('PATCH')}}
											<input type="number" name="newquantity" value="{{$cart->quantity}}"></input> <button class="btn btn-primary">Update Quantity</button>
											</form>
											</td>
											<td>{{$cart->price}}</td>
											<td>{{$cart->subtotal}}</td>
											<td>
											<form action="/menu/mycart/{{$cart->id}}/delete" method="POST">
											{{ csrf_field() }}
											{{ method_field('DELETE') }}
										<button type="submit" class="btn btn-danger">Remove</button>
									</form>
								<td>
									
							</tr>
							@endforeach
							<td>Total:{{$total}}</td>
						</tbody>
					</table>
					<button class="btn btn-success"><a href="/catalog">Go back to Shop!</a></button>
					<button class="btn btn-success"><a href="/checkout">Check Out</a></button>
					<br>
					<form action="/menu/clearcart" method="POST">
					{{ csrf_field() }}
					<button class="btn btn-danger">Clear Cart</button>
					</form>
				</div>
			</div>
		</div>
	<!-- </div> -->
	@else
	<div class="container mt-5">
		<h3>Your cart is empty</h3>
		<a href="/catalog" class="btn btn-primary">Go back to shop.</a>
		
	</div>
	@endif
</body>
</html>