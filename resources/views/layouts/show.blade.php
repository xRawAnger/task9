<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
</head>
<body>

	<div class="container">
		<div class="card p-2">
			<div class="card-title">{{ $product->title }}</div>
			<div class="card-text">{{ $product->description }}</div>
		</div>
		<form method="POST" class="mt-4" action="{{ route('store_comment') }}">
			@csrf
			<input type="hidden" name="id" value="{{ $product->id }}">
			<label>კომენტარი</label>
			<textarea class="form-control" name="comments"></textarea>
			<button class="btn btn-primary">დაკომენატრება</button>
		</form>
		@foreach (App\Comments::where("product_id",$product->id)->get() as $comm)
			<div class="card p-2 mt-4">
				
				<div class="card-text">{{ $comm->comments }}</div>
				<small>{{ $comm->created_at }}</small>
			</div>
		@endforeach
	</div>

<script src="https://code.jquery.com/jquery-3.5.1.min.js" ></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" ></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" ></script>
</body>
</html>