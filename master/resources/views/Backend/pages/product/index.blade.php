@extends('Backend.layouts.app')

@section('content')

<div class="container mh-5">
	<h5> Daftar Produk </h5>

	<a class="btn btn-success" href="{{ route('backend.products.create') }}">create</a>
	<table class="table my-1">
		<thead>
			<tr>
				<th>Product Name</th>
				<th>Product Code</th>
				<th>Description</th>
				<th>Price</th>
				<th>Image</th>
				<th>Action</th>
			</tr>
		</thead>

		<tbody>
			@foreach($products as $product)
			<tr>
				<td> {{ $product->product_name }} </td>
				<td> {{ $product->product_code }} </td>
				<td> {{ $product->description }} </td>
				<td> {{ $product->price }} </td>
				<td> 
					<img src="{{ asset('upload/files/img/products./'.$product->photos) }}" width="70" height="70">
				</td>
				<td>
					<a class="btn btn-success btn-sm d-block w-100 mb-1" href="{{ route('backend.products.edit',['id'=>$product->id]) }}" > Edit </a>
					<form class="delete" action="{{ route('backend.products.destroy', $product->id) }}" method="POST">
				        <input type="hidden" name="_method" value="DELETE">
				        <input type="hidden" name="_token" value="{{ csrf_token() }}" />
				        <input class="btn btn-danger btn-sm d-block w-100" type="submit" value="Delete">
				    </form>
				</td>
			</tr>
			@endforeach
			@push('js')
			<script>
				    $(".delete").on("submit", function(){
				        return confirm("Do you want to delete this item?");
				    });
				</script>
			@endpush
		</tbody>
	</table>

</div>
	
@endsection