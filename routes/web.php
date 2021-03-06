<?php

use App\Http\Controllers\HomeController;

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

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/inventory', 'ItemController@index')->name('inventory');
Route::get('/issue', 'BorrowController@create_issue')->name('issue');
Route::get('/return', 'BorrowController@create_return')->name('return');
Route::post('/issue', 'BorrowController@store_issue')->name('issue_store');
Route::post('/return', 'BorrowController@update')->name('return_item');
Route::get('/admin/', function () {
    return view('admin.auth.login');
})->name('admin.login');
Route::group(['prefix' => 'admin', 'middleware' => 'admin' ], function () {
    Route::get('home', 'HomeController@admin')->name('admin.home');
});
