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
    return view('home');
})->middleware('auth');

Route::get('registerUser',function(){
	return view('auth.register');
})->middleware('auth');
Route::get('registerCompetition',function(){
	return view('competition');
})->middleware('auth');
Route::get('plate',function(){
	return view('plate');
})->middleware('auth');
Route::get('vote',function(){
	return view('vote');
})->middleware('auth');
Route::get('results',function(){
	return view('results');
});
Route::get('evaluate/{id?}','VoteController@show')->middleware('auth');
Route::post('evaluate/{id?}','VoteController@store')->middleware('auth');
Route::post('plate','PlateController@store')->middleware('auth');
Route::post('registerUser','UserController@store')->middleware('auth');

Route::post('registerUserAjax','UserController@storeAjax')->middleware('auth');

Route::post('registerCompetition','PeriodController@store')->middleware('auth');
Route::get('updateCompetition/{id?}', 'PeriodController@show')->middleware('auth');
Route::post('updateCompetition/{id?}','PeriodController@store')->middleware('auth');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

