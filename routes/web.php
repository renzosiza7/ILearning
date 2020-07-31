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

Route::get('/home', 'HomeController@index')->name('home');


//Errors
Route::get('/errors', 'ErrorController@index')->name('errors.index')->middleware('can:admin');
Route::post('/errors/store', 'ErrorController@store')->name('errors.store')->middleware('can:admin');

//Solutions
Route::get('/errors/{id}/solutions', 'SolutionController@index')->name('solutions.index')->middleware('can:admin');
Route::post('/solutions/store', 'SolutionController@store')->name('solutions.store')->middleware('can:admin');

//links
Route::get('/solutions/{id}/links', 'LinkController@index')->name('links.index')->middleware('can:admin');
Route::post('/links/store', 'LinkController@store')->name('links.store')->middleware('can:admin');
