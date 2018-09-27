@extends('Backend.layouts.app')

@section('content')

<div class="container mh-5">
	<h5> Edit Produk </h5>

	<form action="{{ route('backend.products.update',['id'=>$product->id ] ) }}" method="post" enctype="multipart/form-data">
		{!! csrf_field() !!}
		{!! method_field('PUT') !!}
		
		@include('Backend.includes.errors')
		<div class="form-group">
			<label>Product Name</label>
			<input class="form-control form-lg" type="text" name="name" placeholder="name" value="{{ old('name',$product->product_name) }}">
		</div>
		<div class="col-4 p-0">
			<div class="form-group">
				<label>Product Code</label>
				<input class="form-control form-lg" type="text" name="code" placeholder="code" value="{{ old('code',$product->product_code) }}">
			</div>
		</div>
		<div class="form-group">
			<label>Price</label>
			<input class="form-control form-lg" type="text" name="price" placeholder="Rp. " value="{{ old('price',$product->price) }}">
		</div>
		<div class="form-group">
			<label>Description</label>
			<textarea class="form-control" name="description">{{ old('description',$product->description) }}</textarea>
		</div>
		<div class="col-6 p-0">
			<div class="form-group">
				<label>Image</label>
				<input class="form-control  p-1" type="file" name="image" value="{{ old('image') }}">
				<div class="p-2 text-center">
					<img src="{{ asset('upload/files/img/products/'.$product->photos) }}" width="200" >
				</div>
			</div>
		</div>

		<button type="submit" class="btn btn-primary d-block w-50">Update</button>
	</form>

</div>

@endsection