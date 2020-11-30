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
Route::get('test', 'HomeController@index');
Route::resource('/', 'DayController')->middleware('auth');
Route::post('/match/create', 'MatchController@create')->middleware('auth');
Route::post('/match/accept', 'MatchController@accept')->middleware('auth');
Route::post('/match/deny', 'MatchController@deny')->middleware('auth');
Route::get('day/create', 'DayController@create')->middleware('auth')->name('day.create');
Route::post('day/store', 'DayController@store')->middleware('auth');
Auth::routes();
