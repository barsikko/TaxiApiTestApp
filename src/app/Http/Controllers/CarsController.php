<?php

namespace App\Http\Controllers;

use App\Services\CarService;
use App\Http\Requests\AttachCarRequest;
use App\Http\Requests\StoreCarRequest;
use App\Http\Requests\UpdateCarRequest;
use App\Models\Car;
use App\Models\Rate;
use Illuminate\Http\Response;

class CarsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $cars = Car::all();

        return response()->json($cars, Response::HTTP_OK);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreCarRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCarRequest $request)
    {
        Car::create($request->all());

        return response()->json('New car was created successefully', Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $car
     * @return \Illuminate\Http\Response
     */
    public function show(Car $car)
    {
        return response()->json($car, Response::HTTP_OK);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCarRequest $request
     * @param  int  $car
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCarRequest $request, Car $car)
    {   

      CarService::updateCarWithParameters($request->all(), $car);

      return response()->json('This rate was succesefully added to car', Response::HTTP_OK);
      
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $car
     * @return \Illuminate\Http\Response
     */
    public function destroy(Car $car)
    {
         $car->delete();

        return response()->json('This car was succesefully deleted', Response::HTTP_OK);
    }

    /**
     * Attach multiple rates to car
     * 
     * @param \App\Http\Requests\AttachCarRequest   $request
     * @param int $car_id
     * @param int $rate_id 
     * 
     * @return  \Illuminate\Http\Response
     * 
     */
    public function attachRatesToCar(AttachCarRequest $request)
    {
        CarService::attachRateToCar($request->car_id, $request->rate_id);

        return response()->json('Car was successefully updated', Response::HTTP_OK);
    }

}
