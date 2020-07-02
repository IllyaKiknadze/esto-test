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
Route::get('/', 'HomeController@index')->name('home');

Route::prefix('users')->group(function () {
    Route::post('/', 'UserController@store')->name('users.store');
    Route::get('/', 'UserController@index')->name('users.get');

    Route::prefix('transactions')->group(function () {
        Route::post('/', 'TransactionController@store')->name('transactions.store');
        Route::get('/', 'TransactionController@index')->middleware('auth')->name('transactions.get');
        Route::get('create', 'TransactionController@create')->middleware('auth')->name('transactions.create');
        Route::get('{transaction}', 'TransactionController@show')->name('transactions.show');
    });
});


Auth::routes();

