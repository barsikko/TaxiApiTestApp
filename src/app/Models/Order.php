<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

        /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
	'from_address',
	'to_address',
	'from_coordinates',
	'to_coordinates',
	'result_km_price',
	'result_minute_price',
	'result_price',
    ];
}
