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

    /* Cars */
    Route::get('cars/{id}/appointments', 'CarsController@showAppointments');
    Route::get('cars/{id}/sale', 'CarsController@showSale');
    Route::get('cars/{id}/customer', 'CarsController@showCustomer');
    Route::get('cars/unsold', 'CarsController@indexNotYetSold');
    Route::get('cars/sold', 'CarsController@indexSold');
    Route::resource('cars', 'CarsController');

    /* Customers */
    Route::get('/customers/{id}/sales', 'CustomerController@indexSales');
    Route::get('/customers/{id}/cars', 'CustomerController@indexCars');
    Route::resource('customers', 'CustomerController');

    /* Sales */
    Route::get('sales/{id}/car', 'SalesController@showCar');
    Route::get('sales/{id}/customer', 'SalesController@showCustomer');
    Route::resource('sales', 'SalesController');

    /* Appointments */
    Route::get('/appointments/{id}/actions', 'AppointmentController@ShowActions');
    Route::post('/appointments/{id}/actions', 'AppointmentController@addActions');
    Route::get('/appointments/{id}/car', 'AppointmentController@showCar');
    Route::get('/appointments/pending', 'AppointmentController@indexPending');
    Route::resource('appointments', 'AppointmentController');

    /* Static Data and Definitions */
    Route::group(['prefix' => 'static'], function () {

        /* Service Types */
        Route::get('service-types', function () {
            return ServiceType::all();
        });

    });

});


