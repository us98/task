@extends('Frontend.layouts.app')

@section('content')

	<h3 class="text-center">Halaman Register</h3>
		<div class="row justify-content-md-center">
			<div class="col-md-5">
				<form class="" action="{{ route('signup') }}" method="post">
					{!! csrf_field() !!}
					
					@include('Frontend.includes.errors')
					<div class="form-group">
						<label>Username</label>
						<input class="form-control form-lg" type="text" name="username" placeholder="username" value="{{ old('username') }}">
					</div>
					<div class="form-group">
						<label>Name</label>
						<input class="form-control form-lg" type="text" name="name" placeholder="name" value="{{ old('name') }}">
					</div>
					<div class="form-group">
						<label>email</label>
						<input class="form-control form-lg" type="text" name="email" placeholder="email" value="{{ old('email') }}">
					</div>
					<div class="form-group">
						<label>Password</label>
						<input class="form-control form-lg" type="password" name="password" placeholder="password" value="{{ old('password') }}">
					</div>
					<div class="form-group">
						<label>Ulangi Password</label>
						<input class="form-control form-lg" type="password" name="verify_password" placeholder="ulangi password" value="{{ old('verify_password') }}">
					</div>
					<button type="submit" class="btn btn-primary d-block w-50">Register</button>
				</form>
			</div>
		</div>

@endsection