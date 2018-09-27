@extends('Frontend.master')

@section('body')
	
	<div class="container-fluid bg-success">
		<nav class="container navbar navbar-expand navbar-light px-0">
			<a class="navbar-brand text-light" href="{{ route('index') }}">
				Tokoku
			</a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
		    	<span class="navbar-toggler-icon"></span>
		  	</button>

		  	<div class="collapse navbar-collapse" id="navbarSupportedContent">
    			<ul class="navbar-nav mr-auto">
				    @if(!Auth::check())
				    <li class="nav-ite">
				    	<a class="nav-link text-light" href="{{ route('login') }}">
				    		Login
				    	</a>
				    </li>
				    <li class="nav-item">
				    	<a class="nav-link text-light" href="{{ route('signup') }}" >
				    		Register
				    	</a>
				    </li>
				    @endif
    			</ul>

    			@if(Auth::check() )
    			<ul class="navbar-nav">
    				<li class="nav-item">
    					<a class="nav-link text-light" href="">
    						{{ Auth::user()->username }}
    					</a>
    				</li>
    				<li class="nav-item">
    					<a class="nav-link text-light" href="{{ route('frontend.carts.index') }}">
    						Cart
    					</a>
    				</li>
    				<li class="nav-item">
    					<a class="nav-link text-light" href="{{ route('logout') }}">
    						Logout
    					</a>
    				</li>
    			</ul>
    			@endif
    		</div>

		</nav>
	</div>
		<main>
			<div class="container p-0 my-4 mh-4">
				@yield('content')
			</div>
		</main>	

		<footer class="container-fluid bg-dark py-4 m-0">
			<div class="container text-light">
				<p class="text-center">
					&copy; 2018 . developed by alfeus
				</p>
			</div>
		</footer>
@endsection