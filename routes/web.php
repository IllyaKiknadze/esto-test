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

Route::post('users', 'UserController@store');
Route::get('users', 'UserController@index');

Route::post('transactions', 'TransactionController@store');
Route::get('transactions', 'TransactionController@index');
Route::get('transactions/create', 'TransactionController@create')->middleware('auth');
Route::get('transactions/{transaction}', 'TransactionController@show');

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

