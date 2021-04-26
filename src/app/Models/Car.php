<?php

namespace App\Models;

use App\Models\Driver;
use App\Models\Rate;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
			'brand',
			'model',
			'plate_number',
			'color',
			'manufacture_year',
    ];

     /**
     * Get the driver associated with the car.
     */
    public function driver()
    {
        return $this->belongsTo(Driver::class);
    }

     /**
     *  Associate cars with rates
     */
    public function rates()
    {
       return $this->belongsToMany(Rate::class);
    }
}
