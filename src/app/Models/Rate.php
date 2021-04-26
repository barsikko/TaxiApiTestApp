<?php

namespace App\Models;

use App\Models\Car;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rate extends Model
{
    use HasFactory;

        /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
			'title',
			'minimum_price',
			'km_price',
			'minute_price',
			'free_km_quantity',
			'free_minunte_quantity',
    ];

     /**
     *  Associate cars with rates
     */
    public function car()
    {
        return $this->belongsToMany(Car::class);
    }
}
