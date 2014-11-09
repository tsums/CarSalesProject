<?php

class CarsController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 * GET /cars
	 *
	 * @return Response
	 */
	public function index()
	{
        return Response::json(Car::all());
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /cars/create
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /cars
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}

	/**
	 * Display the specified resource.
	 * GET /cars/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
        $car = Car::find($id);
        if (empty($car)) return Response::make("Car with id: $id not found", 404);
        return Response::json($car);
	}

	/**
	 * Show the form for editing the specified resource.
	 * GET /cars/{id}/edit
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 * PUT /cars/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 * DELETE /cars/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}