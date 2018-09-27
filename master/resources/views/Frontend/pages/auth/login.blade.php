@extends('Frontend.layouts.app')

@section('content')

	<h3 class="text-center pb-3">Halaman Login</h3>
		<div class="row justify-content-md-center">
			<div class="col-md-4 ">
				<form action="{{ route('login') }}" method="post">
					{!! csrf_field() !!}
					
					@include('Frontend.includes.errors')
					<div class="form-group">
						<label>Username</label>
						<input class="form-control form-lg" type="text" name="username" placeholder="username" value="{{ old('username') }}">
					</div>
					<div class="form-group">
						<label>Password</label>
						<input class="form-control form-lg" type="password" name="password" placeholder="password" value="{{ old('password') }}">
					</div>
					<button type="submit" class="btn btn-primary btn-block">Login</button>
				</form>
			</div>
		</div>

@endsection