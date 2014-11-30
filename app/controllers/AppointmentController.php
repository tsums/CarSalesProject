<?php

class AppointmentController extends \BaseController
{

    /**
     * Display a listing of the resource.
     * GET /appointments
     *
     * PARAMS:
     *      pending     true|false  filter only appointments with no departure time.
     *
     * @return Response
     */
    public function index()
    {
        $query = Appointment::query();
        if (!empty(Input::get('pending'))) {
            if (Input::get('pending') === "true") {
                $query->where('departed', null);
            }
        }

        return Response::json($query->with('car')->get());
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
     * POST /appointments
     *
     * @return Response
     */
    public function store()
    {
        if (!Input::isJson()) return Response::make("Must Post JSON", 400);

        $array = Input::json()->all();

        $service = Appointment::create($array);
        if (!empty($service)) {
            return Response::json($service);
        }

        return Response::make("Invalid Request", 400);
    }

    /**
     * Display the specified resource.
     * GET /appointments/{id}
     *
     * @param  int $id
     * @return Response
     */
    public function show($id)
    {
        $service = Appointment::with('service_types.type', 'car')->find($id);
        if (empty($service)) return Response::make("Service with id: $id not found", 404);
        return Response::json($service);
    }

    /**
     * Show the Car object referenced by given Service
     * GET /appointments/{id}/car
     *
     * @param $id
     * @return Response
     */
    public function showCar($id)
    {
        $service = Appointment::find($id);
        if (empty($service)) return Response::make("Service with id: $id not found", 404);
        return Response::json($service->car);
    }

    /**
     * Show the actions taken during given Service
     * GET /appointments/{id}/actions
     *
     * @param $id
     * @return Response
     */
    public function ShowActions($id)
    {
        $service = Appointment::with('service_types.type')->find($id);
        if (empty($service)) return Response::json(["error" => "Service with id: $id not found"], 404);
        return Response::json($service->service_types);
    }

    /**
     * Add actions to the given service instance.
     * POST /appointments/{id}/actions
     *
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function addActions($id)
    {
        if (!Input::isJson()) return Response::make("Must Post JSON", 400);

        $array = Input::json()->all();

        $service = Appointment::find($id);
        if (empty($service)) return Response::json(["error" => "Service with id: $id not found"], 404);

        foreach ($array as $type => $price) {
            $service->actions()->attach($type, ['price' => $price]);
        }

        return Response::json($service);

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
     * PUT /appointments/{id}
     *
     * @param  int $id
     * @return Response
     */
    public function update($id)
    {
        if (!Input::isJson()) return Response::make("Must Post JSON", 400);

        $array = Input::json()->all();

        $service = Appointment::find($id);
        if (empty($service)) return Response::json(["error" => "Service with id: $id not found"], 404);

        foreach ($array as $key => $val) {
            $service->{$key} = $val;
        }

        $service->save();
        return Response::json($service);
    }

    /**
     * Remove the specified resource from storage.
     * DELETE /appointments/{id}
     *
     * @param  int $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }

}