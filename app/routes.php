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

    /* //////////////////////// Cars \\\\\\\\\\\\\\\\\\\\\\\\ */

    /**
     * GET the appointments only for car
     */
    Route::get('cars/{id}/appointments', 'CarsController@showAppointments');
    /**
     * GET the sale of a car if applicable
     */
    Route::get('cars/{id}/sale', 'CarsController@showSale');
    /**
     * GET the customer that owns a car if applicable
     */
    Route::get('cars/{id}/customer', 'CarsController@showCustomer');
    /**
     * GET only unsold cars.
     */
    Route::get('cars/unsold', 'CarsController@indexNotYetSold');
    /**
     * GET only sold cars.
     */
    Route::get('cars/sold', 'CarsController@indexSold');
    /**
     * GET all cars
     */
    Route::resource('cars', 'CarsController');

    /* //////////////////////// Customers \\\\\\\\\\\\\\\\\\\\\\\\ */

    /**
     * GET sales which reference this customer
     */
    Route::get('/customers/{id}/sales', 'CustomerController@indexSales');
    /**
     * GET cars this customer owns
     */
    Route::get('/customers/{id}/cars', 'CustomerController@indexCars');
    /**
     * GET list of customers
     */
    Route::resource('customers', 'CustomerController');

    /* //////////////////////// Sales \\\\\\\\\\\\\\\\\\\\\\\\ */

    /**
     * GET car of a sale
     */
    Route::get('sales/{id}/car', 'SalesController@showCar');
    /**
     * GET customer of a sale
     */
    Route::get('sales/{id}/customer', 'SalesController@showCustomer');
    /**
     * GET list of sales
     * POST make a sale {"customer_id" : id, "car_id" : id, "price" : decimal, "when" : DateTime}
     */
    Route::resource('sales', 'SalesController');

    /* //////////////////////// Appointments \\\\\\\\\\\\\\\\\\\\\\\\ */

    /**
     * GET actions taken during an appointment
     */
    Route::get('/appointments/{id}/actions', 'AppointmentController@ShowActions');
    /**
     * POST add an action to an appointment {"action_id" : price, "action_id2" : price2}
     */
    Route::post('/appointments/{id}/actions', 'AppointmentController@addActions');
    /**
     * GET the car related to this appointment
     */
    Route::get('/appointments/{id}/car', 'AppointmentController@showCar');
    /**
     * GET list of appointments without departure time.
     */
    Route::get('/appointments/pending', 'AppointmentController@indexPending');
    /**
     * GET list of appointments
     * POST make new appointment {"car_id" : id, "scheduled" : DateTime, "time_est": int}
     * PUT update appointment with new info. {"arrived" : DateTime, "departed" : DateTime}
     */
    Route::resource('appointments', 'AppointmentController');

    /* Static Data and Definitions */
    Route::group(['prefix' => 'static'], function () {

        /* Service Types */
        Route::get('service-types', function () {
            return ServiceType::all();
        });

    });

});


