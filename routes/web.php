<?php

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', 'PagesController@index');
Route::get('/add', 'OwnerController@create');

Route::resource('owners', 'OwnerController');
Route::resource('vehicles', 'VehicleController');
Route::resource('stickers', 'StickerController');

Route::get('search/{id}', 'SearchController@index');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
