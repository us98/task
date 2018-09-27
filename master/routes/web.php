<?php

Route::namespace('Backend')->prefix('admin')->group(function(){
	Route::middleware(['guest:backend'])->group(function(){
		Route::get('/','AuthController@getLogin')->name('backend.login');

		Route::post('/','AuthController@postLogin');
	});

	Route::middleware(['auth:backend'])->group(function(){
		Route::get('logout', 'AuthController@getLogout')->name('backend.logout');
		Route::get('dashboard', 'AuthController@getDashboard')->name('backend.dashboard');

		Route::resource('users' ,'UserController', ['as'=>'backend']);
		Route::resource('employees' ,'EmployeeController',['as'=>'backend']);
		Route::resource('products' ,'ProductController',['as'=>'backend']);
	});

});

Route::namespace('Frontend')->group(function(){
	Route::middleware(['guest'])->group(function(){
		Route::get('login', 'AuthController@getLogin')->name('login');
		Route::get('signup', 'AuthController@getSignup')->name('signup');

		Route::post('login', 'AuthController@postLogin');
		Route::post('signup', 'AuthController@postSignUp');
	});

	Route::middleware(['auth'])->group(function(){
		Route::get('logout', 'SiteController@getLogout')->name('logout');

		Route::resource('carts' ,'CartController',['as'=>'frontend']);
	});

	Route::get('product/{id}', 'SiteController@getProductShow')->name('product.show');
	Route::get('/' , 'SiteController@getIndex')->name('index');

});
