<?php 

namespace App\Services;


class RateService
{
	public static function updateRateWithParameters(array $params, $rate)
	{
		$rate->fill($params);

        if ($rate->isClean()) {
            throw new \Exception('At least one value must change');
        }

        $rate->save();
	}
}