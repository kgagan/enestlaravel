<?php

use Illuminate\Support\Facades\Route;

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

/*Route::get('/', function () {
    return view('welcome');
});*/



Route::get('/', 'App\Http\Controllers\IController@index');
Route::get('/display-category/{id}', 'App\Http\Controllers\IController@display_category');
Route::get('/buy-product/{id}', 'App\Http\Controllers\IController@buy_product');
Route::get('/new-products', 'App\Http\Controllers\IController@new_products');
Route::get('/special-products', 'App\Http\Controllers\IController@special_products');
Route::get('/all-products', 'App\Http\Controllers\IController@all_products');
Route::get('/contact', 'App\Http\Controllers\IController@contact');
Route::get('/login', 'App\Http\Controllers\IController@login');
Route::post('/signup', 'App\Http\Controllers\IController@signup');
Route::post('/login-user', 'App\Http\Controllers\IController@login_user');
Route::get('/logout', 'App\Http\Controllers\IController@logout');
Route::post('/add-quantity', 'App\Http\Controllers\IController@quantity');
Route::get('/checkout/{uid}', 'App\Http\Controllers\IController@checkout');
Route::post('/contactus', 'App\Http\Controllers\IController@contactus');
Route::post('/search', 'App\Http\Controllers\IController@search');

