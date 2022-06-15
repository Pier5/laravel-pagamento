<?php

use Illuminate\Support\Facades\Auth;
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

Route::get('/show/{id}', 'HouseController@show')->name('show');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/payment/make', 'PaymentsController@make')->name('payment.make');

Route::get("{any?}", function() {
    return view("welcome");
})->where("any", ".*");
