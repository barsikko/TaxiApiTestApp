<?php 

namespace App\Services;

use App\Models\Car;
use App\Models\Rate;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;
use Illuminate\Validation\ValidationException;

class CarService {
	
	public static function attachRateToCar($car_id, $rate_id) : ?JsonResponse 
	{

        $car = Car::findOrFail($car_id);
        $rate = Rate::findOrFail($rate_id);

		foreach ($car->rates as $rates) {

            if ($rates->pivot->rate_id == $rate_id)
            {
             	throw new \Exception('This car already has such rate');
            } 

        }

        $car->rates()->attach($rate);

	}

	public static function updateCarWithParameters(array $params, $car) : ?JsonResponse
	{

		$car->fill($params);

        if ($car->isClean()) {
   					throw new \Exception('At least one value must change');
           }

        $car->save();

        return response()->json('This rate was succesefully added to car', Response::HTTP_OK);
	}

}