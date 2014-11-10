<?php

class ServiceController extends \BaseController
{

    /**
     * Display a listing of the resource.
     * GET /services
     *
     * @return Response
     */
    public function index()
    {
        return Response::json(Service::all());
    }

    /**
     * Show the form for creating a new resource.
     * GET /services/create
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /*
     *  EXAMPLE
     *  {
     *      "car_id" : "3",
     *      "scheduled" : "2014-11-12T14:30:00",
     *      "time_est" : 120
     *  }
     */
    /**
     * Store a newly created resource in storage.
     * POST /services
     *
     * @return Response
     */
    public function store()
    {
        if (!Input::isJson()) return Response::make("Must Post JSON", 400);

        $array = Input::json()->all();

        //TODO catch DB integrity exceptions.

        $service = Service::create($array);
        if (!empty($service)) {
            return Response::json($service);
        }

        return Response::make("Invalid Request", 400);
    }

    /**
     * Display the specified resource.
     * GET /services/{id}
     *
     * @param  int $id
     * @return Response
     */
    public function show($id)
    {
        $service = Service::find($id);
        if (empty($service)) return Response::make("Service with id: $id not found", 404);
        return Response::json($service);
    }

    /**
     * Show the Car object referenced by given Service
     * GET /services/{id}/car
     *
     * @param $id
     * @return Response
     */
    public function showCar($id)
    {
        $service = Service::find($id);
        if (empty($service)) return Response::make("Service with id: $id not found", 404);
        return Response::json($service->car);
    }

    /**
     * Show the actions taken during given Service
     * GET /services/{id}/actions
     *
     * @param $id
     * @return Response
     */
    public function ShowActions($id)
    {
        $service = Service::find($id);
        if (empty($service)) return Response::json(["error" => "Service with id: $id not found"], 404);
        return Response::json($service->actions);
    }

    /**
     * Show the form for editing the specified resource.
     * GET /services/{id}/edit
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
     * PUT /services/{id}
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
     * DELETE /services/{id}
     *
     * @param  int $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }

}