<?php

namespace App\Http\Controllers;

use App\Http\Requests\MakeOrderRequest;
use App\Models\Order;
use App\Services\OrderService;
use Illuminate\Http\Request;
use Illuminate\Http\Response;


class OrdersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {            
        $orders = Order::all();

        return response()->json($orders, Response::HTTP_OK);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\MakeOrderRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(MakeOrderRequest $request)
    {
      
     $result_price = OrderService::calculateOrderPrice($request->rate_id,
                                                         $request->from_coordinates,
                                                             $request->to_coordinates);

     // save Order into DB
        Order::create([
            'from_address' => $request->from_address,
            'to_address' => $request->to_address,
            'from_coordinates' => $request->from_coordinates,
            'to_coordinates' => $request->to_coordinates,
            'result_price' => $result_price,
        ]);

         
    return response()->json("Total cost of your trip would be: " . $result_price . " $", Response::HTTP_OK);

    }

}
