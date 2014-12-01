<?php

class StatisticsController extends \BaseController
{

    public function getStatistics()
    {
        $startDate = Input::get("startDate");
        $endDate   = Input::get('endDate');

        if (empty($startDate) || empty($endDate)) {
            return Response::JSON(['error' => 'Invalid Start or End Date'], 400);
        }

        $sales = Sale::whereBetween('when', [$startDate, $endDate])->with('car')->get();

        $profitsByCar = [];
        foreach ($sales as $sale) {
            if (empty($profitsByCar[$sale->car->year][$sale->car->make][$sale->car->model])) {
                $profitsByCar[$sale->car->year][$sale->car->make][$sale->car->model] = 0.0;
            }
            $profit = $sale->price - $sale->car->cost;
            $profitsByCar[$sale->car->year][$sale->car->make][$sale->car->model] += $profit;
        }

        return Response::JSON(['count' => count($sales), 'profits' => $profitsByCar]);
    }


}
