<?php

namespace App\Models;

use App\Models\Car;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Driver extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
		'f_name',
		'l_name',
		'birth_day',
		'license_num',
		'end_license_date'
    ];

    /**
     * Set the car associated with the driver.
     */
    public function car()
    {
        return $this->hasOne(Car::class);
    }

}
