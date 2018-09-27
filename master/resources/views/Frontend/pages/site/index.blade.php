@extends('Frontend.layouts.app')

@section('content')
	<h3 class="">Selamat Datang di Tokoku</h3>
	<p>
		Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
		tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
		quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
		consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
		cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
		proident, sunt in culpa qui officia deserunt mollit anim id est laborum.		
	</p>

	<div class="row">

	@foreach($products as $product)
		<div class="col-sm-3 ">
			<div class="card">
				<img class="card-img-top" src="{{asset('upload/files/img/products/'.$product->photos )}}" height="200" >
				<div class="card-body">
					<h5 class="card-title"> {{ $product->product_name }} </h5>
					<p class="card-text">
						{{ $product->description }}
					</p>
    				<a href="{{ route('product.show', $product->id) }}" class="btn btn-primary btn-block">Details</a>
				</div>
			</div>
		</div>
	@endforeach

	</div>
@endsection