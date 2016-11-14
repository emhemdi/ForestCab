<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/','HomeController@index');
Route::get('/app', function()
{
	return View::make('cars');
});
Route::get('/charts', function()
{
	return View::make('mcharts');
});

Route::get('/tables', function()
{
	return View::make('table');
});

Route::get('/forms', function()
{
	return View::make('form');
});

Route::get('/grid', function()
{
	return View::make('grid');
});

Route::get('/buttons', function()
{
	return View::make('buttons');
});

Route::get('/icons', function()
{
	return View::make('icons');
});

Route::get('/panels', function()
{
	return View::make('panel');
});

Route::get('/typography', function()
{
	return View::make('typography');
});

Route::get('/notifications', function()
{
	return View::make('notifications');
});

Route::get('/blank', function()
{
	return View::make('blank');
});

Route::get('/login', function()
{
	return View::make('login');
});
Route::get('auth/login', function()
{
	return View::make('auth/login');
});
Route::get('/reset', function()
{
	return View::make('/auth/reset');
});

Route::get('/documentation', function()
{
	return View::make('documentation');
});

Route::get('/cars', 'CarController@index');
Route::get('/cars/delete/{id}','CarController@destroy');
Route::get('/cars/edit/{id}','CarController@edit');
Route::get('/cars/update', 'CarController@update');
Route::get('/cars/create', 'CarController@create');
Route::get('/cars/store', 'CarController@store');

Route::get('/options', 'OptionController@index');
Route::get('/options/{id}/delete','OptionController@destroy');
Route::get('/options/{id}/edit','OptionController@edit');
Route::post('/options/update', 'OptionController@update');
Route::get('/options/create', 'OptionController@create');
Route::post('/options/store', 'OptionController@store');

Route::get('/drivers', 'DriverController@index');
Route::get('/drivers/{id}/delete','DriverController@destroy');
Route::get('/drivers/{id}/edit','DriverController@edit');
Route::post('/drivers/update', 'DriverController@update');
Route::get('/drivers/create', 'DriverController@create');
Route::post('/drivers/store', 'DriverController@store');

Route::get('/promos', 'PromoController@index');
Route::get('/promos/{id}/delete','PromoController@destroy');
Route::get('/promos/{id}/edit','PromoController@edit');
Route::post('/promos/update', 'PromoController@update');
Route::get('/promos/create', 'PromoController@create');
Route::post('/promos/store', 'PromoController@store');

Route::get('/ranges', 'RangeController@index');
Route::get('/ranges/{id}/delete','RangeController@destroy');
Route::get('/ranges/{id}/edit','RangeController@edit');
Route::post('/ranges/update', 'RangeController@update');
Route::get('/ranges/create', 'RangeController@create');
Route::post('/ranges/store', 'RangeController@store');
Route::get('/ranges/{id}/show', 'RangeController@show');





Route::get('/reservations', 'ReservationController@index');
Route::get('/reservations/{id}/delete/','ReservationController@destroy');
Route::get('/reservations/{id}/edit/','ReservationController@edit');
Route::get('/reservations/update', 'ReservationController@update');
Route::get('/reservations/create', 'ReservationController@create');
Route::post('/reservations/store', 'ReservationController@store');
Route::get('/reservations/{id}/show/', 'PromoController@show');

Route::get('/test', function()
{
	return View::make('promo/test');
});

Auth::routes();

Route::get('/home', 'HomeController@index');
