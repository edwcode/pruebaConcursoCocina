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
});
Route::get('registerCompetition',function(){
	return view('competition');
});
Route::get('plate',function(){
	return view('plate');
});
Route::get('vote',function(){
	return view('vote');
})->middleware('auth');
Route::get('results',function(){
	return view('results');
});
Route::get('evaluate/{id?}','VoteController@show');
Route::post('evaluate/{id?}','VoteController@store');
Route::post('plate','PlateController@store');
Route::post('registerUser','UserController@store');
Route::post('registerCompetition','PeriodController@store');
Route::get('updateCompetition/{id?}', 'PeriodController@show');
Route::post('updateCompetition/{id?}','PeriodController@store');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

