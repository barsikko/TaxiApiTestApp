<?php

namespace App\Http\Controllers;

use App\Http\Requests\AssignCarRequest;
use App\Http\Requests\StoreDriverRequest;
use App\Http\Requests\UpdateDriverRequest;
use App\Models\Driver;
use App\Services\DriverService;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class DriversController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $drivers = Driver::all();

        return response()->json($drivers, Response::HTTP_OK);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreDriverRequest $request
     * 
     * @return \Illuminate\Http\Response
     */
    public function store(StoreDriverRequest $request)
    {

      	Driver::create($request->all());

      	return response()->json('New driver was created successefully', Response::HTTP_CREATED);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $driver
     * @return \Illuminate\Http\Response
     */
    public function show(Driver $driver)
    { 
        return response()->json($driver, Response::HTTP_OK);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateDriverRequest; $request
     * @param  int  $driver
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateDriverRequest $request, Driver $driver)
    {

        DriverService::updateDriverWithParameters($request->all(), $driver);

       return response()->json('Driver was successefully updated', Response::HTTP_OK);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $driver
     * @return \Illuminate\Http\Response
     */
    public function destroy(Driver $driver)
    {
         $driver->delete();

        return response()->json('This driver was succesefully deleted', Response::HTTP_OK);
    }

    /**
     * Assign car to driver
     * 
     * @param  \App\Http\Requests\AssignCarRequest  $request
     * 
     * @param int $driver_id
     * @param int $car_id
     * 
     * @return \Illuminate\Http\Response
     */
    public function assignCarToDriver(AssignCarRequest $request)
    {

        DriverService::assignCarToDriver($request->car_id, $request->driver_id);


    	return response()->json('This car was succesefully added to driver', Response::HTTP_OK);

    }
}
