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
    return view('welcome');
});

Route::get('/kontakty', 'KontaktController@index')->name('kontakt.index');
Route::get('/kontakt/nowy', 'KontaktController@create')->name('kontakt.nowy');
Route::post('/kontakt/nowy', 'KontaktController@store');
Route::get('/kontakt/{id}/edycja', 'KontaktController@edit')->name('kontakt.edit');
Route::post('/kontakt/{id}/edycja', 'KontaktController@update')->name('kontakt.update');
Route::delete('/kontakt/{id}', 'KontaktController@destroy')->name('kontakt.destroy');
