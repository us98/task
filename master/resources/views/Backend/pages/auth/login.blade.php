@extends('Backend.master')

@section('body')

<div class="container">
	<h4 class="text-center py-4">Login Administrator</h4>

	<div class="row justify-content-md-center">
		<div class="col-5">
			<form action="{{ route('backend.login') }}" method="post">
				{!! csrf_field() !!}
				
				@include('Backend.includes.errors')
				<div class="form-group">
					<!-- <span class="font-weight-bold">Username</span> -->
					<input class="form-control form-lg p-4" type="text" name="username" placeholder="username...">
				</div>

				<div class="form-group">
					<!-- <span class="font-weight-bold">Password</span> -->
					<input class="form-control form-lg p-4" type="password" name="password" placeholder="password...">
				</div>
				<button class="btn btn-primary btn-lg d-block w-100 ">Login</button>
			</form>
		</div>

	</div>
</div>
	
@endsection