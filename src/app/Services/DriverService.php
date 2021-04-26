<?php  

namespace App\Services;

use App\Models\Car;
use App\Models\Driver;
use Illuminate\Http\JsonResponse;


class DriverService
{

	public static function updateDriverWithParameters(array $params, $driver) : ?JsonResponse
	{

        $driver->fill($params);

        if ($driver->isClean()) {
            throw new \Exception('At least one value must change');
        }

        $driver->save();
	}

	public static function assignCarToDriver($car_id, $driver_id)
	{
		$driver = Driver::findOrFail($driver_id);
    	$car = Car::findOrFail($car_id);

    	if (empty($driver->car))
		{
    		$driver->car()->save($car);
		}
			elseif ($driver->car->driver_id !== $car->driver_id){
		 		$driver->car->driver_id = NULL;
		 		$driver->car->save();
				$driver->car()->save($car);
				} 
				else {
				throw new \Exception('This car is already belongs to this driver');
				}
	}

}