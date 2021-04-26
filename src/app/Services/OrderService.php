<?php 

namespace App\Services;

use App\Models\Rate;
use Illuminate\Support\Facades\Http;

class OrderService 
{
	
	public static function calculateOrderPrice($rate_id, $from_coordinates, $to_coordinates)
	{
	
	 $rate = Rate::findOrFail($rate_id); 

     $response = Http::get(
     	"http://router.project-osrm.org/route/v1/driving/{$from_coordinates};{$to_coordinates}"
     );

     foreach ($response['routes'] as $route) {
         $distance = round(($route['distance'])/1000, 2, PHP_ROUND_HALF_UP);
         $duration = round(($route['duration'])/60, 2, PHP_ROUND_HALF_DOWN);
     }

	return  $result_price = $rate->minimum_price + 
                (($duration - $rate->free_minunte_quantity)*$rate->minute_price) +
                (($distance - $rate->free_km_quantity)*$rate->km_price);
		
	}


}