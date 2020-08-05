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
Route::get('/errors', 'ErrorController@index')->name('errors.index')->middleware('can:user');
Route::post('/errors/store', 'ErrorController@store')->name('errors.store')->middleware('can:user');
Route::put('/errors/update/{id}', 'ErrorController@update')->name('errors.update')->middleware('can:user');

//Solutions
Route::get('/errors/{id}/solutions', 'SolutionController@index')->name('solutions.index')->middleware('can:user');
Route::post('/solutions/store', 'SolutionController@store')->name('solutions.store')->middleware('can:user');
Route::put('/solutions/update/{id}', 'SolutionController@update')->name('solutions.update')->middleware('can:user');

//links
Route::get('/solutions/{id}/links', 'LinkController@index')->name('links.index')->middleware('can:user');
Route::post('/links/store', 'LinkController@store')->name('links.store')->middleware('can:user');
Route::put('/links/update/{id}', 'LinkController@update')->name('links.update')->middleware('can:user');
Route::put('/errors/update/{id}', 'ErrorController@update')->name('errors.update')->middleware('can:user');
