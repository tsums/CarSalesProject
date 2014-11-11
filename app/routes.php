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

/* Frontend */
Route::get('/', function () {
    return View::make('home');
});

Route::group(['prefix' => 'api'], function () {

    //TODO except methods not supported in the controllers on resources.

    /* Customers */
    Route::get('/customers/{id}/sales', 'CustomerController@indexSales');
    Route::get('/customers/{id}/cars', 'CustomerController@indexCars');
    Route::resource('customers', 'CustomerController');

    /* Cars */
    Route::get('cars/{id}/services', 'CarsController@showServices');
    Route::get('cars/{id}/sale', 'CarsController@showSale');
    Route::get('cars/{id}/customer', 'CarsController@showCustomer');
    Route::get('cars/unsold', 'CarsController@indexNotYetSold');
    Route::resource('cars', 'CarsController');

    /* Sales */
    Route::get('sales/{id}/car', 'SalesController@showCar');
    Route::get('sales/{id}/customer', 'SalesController@showCustomer');
    Route::resource('sales', 'SalesController');

    /* Services */
    Route::get('/services/{id}/actions', 'ServiceController@ShowActions');
    Route::get('/services/{id}/car', 'ServiceController@showCar');
    Route::resource('services', 'ServiceController');

});