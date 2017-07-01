<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::group(['middleware' => 'auth'], function () {

	
	Route::get('/', function () { return redirect('home'); });
	Route::get('/home', ['as' => 'home', 'uses' => 'HomeController@index']);
	
	Route::get('sales/{sale}/invoice', ['as' => 'sales.invoices', 'uses' => 'SalesController@invoice']);
	Route::resource('sales' ,'SalesController',           ['except' => ['create'] ]);
	
	Route::resource('users' ,'UsersController',           ['except' => ['create','show'] ]);
	Route::resource('providers' ,'ProvidersController',   ['except' => ['create','show'] ]);
	Route::resource('products' ,'ProductsController',     ['except' => ['create','show'] ]);
	Route::resource('categories' ,'CategoriesController', ['except' => ['create','show'] ]);
	Route::resource('customers' ,'CustomersController',   ['except' => ['create','show'] ]);

});

// Auth
Route::controllers([
    'auth' => 'Auth\AuthController',
    'password' => 'Auth\PasswordController',
]);