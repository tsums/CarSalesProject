<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/



Route::get('/', function()
{
	return View::make('home');
});

Route::group(['prefix' => 'api'], function() {

    Route::get('/customers/{id}/sales', 'CustomerController@indexSales');
    Route::get('/customers/{id}/cars', 'CustomerController@indexCars');
    Route::resource('customers', 'CustomerController');

    Route::get('cars/{id}/services', 'CarsController@showServices');
    Route::get('cars/{id}/sale', 'CarsController@showSale');
    Route::get('cars/unsold', 'CarsController@indexNotYetSold');
    Route::resource('cars', 'CarsController');

    Route::get('sales/{id}/car', 'SalesController@showCar');
    Route::get('sales/{id}/customer', 'SalesController@showCustomer');
    Route::resource('sales', 'SalesController');

    Route::get('/services/{id}/actions', 'ServiceController@actions');
    Route::resource('services', 'ServiceController');

});