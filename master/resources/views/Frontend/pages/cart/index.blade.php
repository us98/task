@extends('Frontend.layouts.app')

@push('js')
<script type="text/javascript">
	$(function() {
		$('.btn-delete').click(function() {
			if(confirm('Anda yakin akan menghapus produk ini?')) {
				$('#form-'+$(this).data('id')).submit();
			}
		});
	});
</script>
@endpush

@section('content')
	@include('Frontend.includes.errors')
	<table class="table">
		<thead>
			<tr>
				<th>Produk</th>
				<th>Nama</th>
				<th>Qty</th>
				<th>Price</th>
				<th>Total</th>
				<th>Aksi</th>
			</tr>
		</thead>
		<tbody>
			<?php 
				$grandtotal = 0;
			?>
			@forelse($carts as $cart)
			<tr>
				<?php $subtotal = $cart->price * $cart->quantity; $grandtotal += $subtotal; ?>
				<td style="width:20%"> <img src="{{ asset('upload/files/img/products/'.$cart->photos) }}" class="img-fluid"> </td>
				<td>{{ $cart->product_name }}</td>
				<td>{{ $cart->quantity }}</td>
				<td>Rp. {{ number_format($cart->price) }}</td>
				<td>Rp. {{ number_format($subtotal) }}</td>
				<td>
					<form id="form-{{ $cart->id }}" method="post" action="{{ route('frontend.carts.destroy', $cart->id) }}">
						{{ method_field('DELETE') }}
						{!! csrf_field() !!}
						<button type="button" class="btn btn-primary btn-delete" data-id="{{ $cart->id }}">Hapus</button>
					</form>					
				</td>
			</tr>
			@empty
			<tr>
				<td colspan="6">tidak ada produk dalam keranjang</td>
			</tr>
			@endforelse
			<tr>
				<td colspan="4" class="text-right">Grandtotal</td>
				<td>Rp. {{ number_format($grandtotal) }}</td>
			</tr>
		</tbody>
	</table>
@endsection