@extends('Frontend.layouts.app')


@section('content')

<div class="row">
	<div class="col-md-3">
		<img src="{{ asset('upload/files/img/products/'.$product->photos) }}" class="img-fluid">
	</div>
	<div class="col-md-9">
		<h2>{{ $product->product_name }}</h2>
		<p>{{ $product->product_code }}</p>
		<p><strong>Rp. {{ number_format($product->price) }}</strong></p>

		<div class="mt-2">
			<form method="post" action="{{ route('frontend.carts.store') }}">
				{!! csrf_field() !!}
				<div class="row">
					<div class="col-md-6">
						@include('Frontend.includes.errors')

						<input type="hidden" name="product_id" value="{{ $product->id }}">

						<div class="form-group">
							<label class="sr-only">qty</label>
							<input type="text" name="qty" class="form-control" placeholder="qty">
						</div>
						<button type="submit" class="btn btn-primary">Add to cart</button>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>

@endsection