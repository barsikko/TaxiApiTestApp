<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCarRateTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('car_rate', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('car_id')->nullable();
            $table->foreign('car_id')->references('id')
                        ->on('cars')/*->onDelete('cascade')*/;     
            $table->unsignedInteger('rate_id')->nullable();
            $table->foreign('rate_id')->references('id')
                        ->on('rates')/*->onDelete('cascade')*/;     
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
        Schema::dropIfExists('car_rate');
    }
}
