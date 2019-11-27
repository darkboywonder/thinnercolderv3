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
Route::get('/', function () {
    return redirect(route('artwork.index'));
});

Route::prefix('artwork')->name('artwork.')->group(function () {
    Route::get('', 'ArtworkController@index')->name('index');
    Route::get('{artwork}', 'ArtworkController@show')->name('show');
});

Route::prefix('designs')->name('designs.')->group(function () {
    Route::get('', 'DesignsController@index')->name('index');
    Route::get('{design}', 'DesignsController@show')->name('show');
});

Route::view('/contact', 'contact');
