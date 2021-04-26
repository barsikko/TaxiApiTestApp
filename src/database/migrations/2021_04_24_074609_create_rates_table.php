<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rates', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->decimal('minimum_price', 5, 2);
            $table->decimal('km_price', 5, 2);
            $table->decimal('minute_price', 5, 2);
            $table->unsignedTinyInteger('free_km_quantity');
            $table->unsignedTinyInteger('free_minunte_quantity');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rates');
    }
}
