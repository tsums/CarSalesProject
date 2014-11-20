<?php

class CustomerController extends \BaseController
{

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        return Response::json(Customer::all());
    }


    public function indexSales($id)
    {
        $customer = Customer::find($id);
        if (empty($customer)) return Response::make("Customer with id: $id not found", 404);
        return Response::json($customer->sales);
    }

    public function indexCars($id)
    {
        $customer = Customer::find($id);
        if (empty($customer)) return Response::make("Customer with id: $id not found", 404);
        return Response::json($customer->cars);
    }


    /**
     * Show the form for creating a new resource.
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
            "name_first": "John",
            "name_last": "Savage",
            "address_1": "Mi5",
            "address_2": null,
            "birthDate": "2014-5-08",
            "city": "Donde",
            "state": "CA",
            "zip": "12345",
            "phone": "456-454-3456",
            "email": "adam@masterrace.com"
        }
     */
    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store()
    {
        if (!Input::isJson()) return Response::make("Must Post JSON", 400);

        $array = Input::json()->all();

        //TODO catch DB integrity exceptions.

        $customer = Customer::create($array);

        if ($customer) return Response::json($customer);

        return Response::make("Invalid Request", 400);
    }


    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function show($id)
    {
        $customer = Customer::with(['cars', 'sales'])->find($id);
        if (empty($customer)) return Response::make("Customer with id: $id not found", 404);
        return Response::json($customer);
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  int $id
     * @return Response
     */
    public function update($id)
    {
        //
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }


}
