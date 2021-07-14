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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::group(['middleware' => 'customer'], function(){

Route::get('/payment', 'HomeController@payment')->name('payment');
Route::post('/create-checkout-session','HomeController@CreateCheckoutSession')->name('checkout');
Route::post('/charge','HomeController@charge')->name('charge');
Route::get('/home', 'HomeController@index')->name('home');

});

Route::group([ 'prefix' => 'admin', 'name'=>'admin.', 'namespace' => 'Admin', 'middleware' => 'admin'], function(){

    Route::resource('/customers', 'CustomersController')->except(['show']);
    Route::get('/customers/changeActive', 'CustomersController@changeActive')->name('customers.changeActive');
    Route::get('/home', 'HomeController@index')->name('admin.home');
});

