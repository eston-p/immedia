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


Auth::routes();

Route::get('/', 'SearchController@showListing')->name('listings');

Route::get('/view/{place}/{param}', 'SearchController@index')->name('view');

Route::post('/search', 'SearchController@store')->name('search');
