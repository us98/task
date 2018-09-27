@extends('Backend.master')

@section('body')
	<div class="container-fluid bg-light">
		<nav class="container navbar navbar-expand-lg navbar-light">
			<a class="navbar-brand" href="{{ route('backend.dashboard') }}">
				C-Panel
			</a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
		    	<span class="navbar-toggler-icon"></span>
		  	</button>

		  	<div class="collapse navbar-collapse" id="navbarSupportedContent">
		  		<ul class="navbar-nav mr-auto">
			      <!-- <li class="nav-item">
			      	<a class="nav-link" href="">
			      		Users
			      	</a>
			      </li>
			      <li class="nav-item">
			      	<a class="nav-link" href="">
			      		Employee
			      	</a>
			      </li> -->
			      <li class="nav-item">
			      	<a class="nav-link" href="{{ route('backend.products.index') }}">
			      		Products
			      	</a>
			      </li>
		  		</ul>
		  		<ul class="navbar-nav mr-auto>
		  			<li class="nav-item">
		  				<a class="nav-link" href="{{ route('backend.logout') }}">
		  					Logout
		  				</a>
		  			</li>
		  		</ul>
		  	</div>
		</nav>
	</div>

	<main class="container-fluid py-3">
		@yield('content')
	</main>
	
	<footer class="bg-dark p-0 m-0">
		<div class="container p-0 py-3">
			<p class="text-light text-center"> &copy; 2018. developed by alfeus </p>
		</div>
	</footer>

@endsection