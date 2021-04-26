<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreRateRequest;
use App\Http\Requests\UpdateRateRequest;
use App\Models\Rate;
use App\Services\RateService;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class RatesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rates = Rate::all();

        return response()->json($rates, Response::HTTP_OK);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreRateRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRateRequest $request)
    {
    
        Rate::create($request->all());

        return response()->json('New rate was created successefully', Response::HTTP_CREATED);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateRateRequest $request
     * @param  int  $rate
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRateRequest $request, Rate $rate)
    {

        RateService::updateRateWithParameters($request->all(), $rate);

       return response()->json('Rate was successefully updated', Response::HTTP_OK);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $rate
     * @return \Illuminate\Http\Response
     */
    public function destroy(Rate $rate)
    {
         $rate->delete();

        return response()->json('This rate was succesefully deleted', Response::HTTP_OK);
    }
}
