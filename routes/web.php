<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Auth::routes();

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