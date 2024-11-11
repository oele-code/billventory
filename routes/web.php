<?php

use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\CustomersController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\ProvidersController;
use App\Http\Controllers\SalesController;
use App\Http\Controllers\UsersController;
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

Route::group(['middleware' => 'auth'], function (): void {

	Route::get('/', fn() => redirect('home'));
	Route::get('/home', [HomeController::class, 'index'])->name('home');

	Route::get('sales/{sale}/invoice', [SalesController::class, 'invoice'])->name('sales.invoices');
	Route::resource('sales' ,SalesController::class,           ['except' => ['create'] ]);

	Route::resource('users' ,UsersController::class,           ['except' => ['create','show'] ]);
	Route::resource('providers' ,ProvidersController::class,   ['except' => ['create','show'] ]);
	Route::resource('products' ,ProductsController::class,     ['except' => ['create','show'] ]);
	Route::resource('categories' ,CategoriesController::class, ['except' => ['create','show'] ]);
	Route::resource('customers' ,CustomersController::class,   ['except' => ['create','show'] ]);
});