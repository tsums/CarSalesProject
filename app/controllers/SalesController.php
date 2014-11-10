<?php

class SalesController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 * GET /sales
	 *
	 * @return Response
	 */
	public function index()
	{
        return Response::json(Sale::all());
	}

    public function showCar($id)
    {
        $sale = Sale::find($id);
        if (empty($sale)) return Response::make("Sale with id: $id not found", 404);
        return Response::json($sale->car);
    }

    public function showCustomer($id)
    {
        $sale = Sale::find($id);
        if (empty($sale)) return Response::make("Sale with id: $id not found", 404);
        return Response::json($sale->customer);
    }

	/**
	 * Show the form for creating a new resource.
	 * GET /sales/create
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}


    /*
     * EXAMPLE
     * {
            "when": "2012-05-10",
            "customer_id": "ID",
            "VIN": "VIN",
            "price": 23456
        }
     *
     *
     */

	/**
	 * Store a newly created resource in storage.
	 * POST /sales
	 *
	 * @return Response
	 */
	public function store()
	{
        if (! Input::isJson() ) return Response::make("Must Post JSON", 400);

        $array = Input::json()->all();

        //TODO catch DB integrity exceptions.

        $sale = Sale::create($array);

        if ($sale) {

            $vin = $sale->car_VIN;

            $car = Car::where('VIN', '=', $vin)->first();

            $car->sold = 1;
            $car->save();

            return Response::json($sale);
        }

        return Response::make("Invalid Request", 400);
	}

	/**
	 * Display the specified resource.
	 * GET /sales/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
        $sale = Sale::find($id);
        if (empty($sale)) return Response::make("Sale with id: $id not found", 404);
        return Response::json($sale);
	}

	/**
	 * Show the form for editing the specified resource.
	 * GET /sales/{id}/edit
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
	 * PUT /sales/{id}
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
	 * DELETE /sales/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}