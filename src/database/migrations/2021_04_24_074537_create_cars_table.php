<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cars', function (Blueprint $table) {
            $table->increments('id');
            $table->string('brand', 100);
            $table->string('model', 100);
            $table->string('plate_number');
            $table->string('color');
            $table->year('manufacture_year');
            
            $table->unsignedInteger('driver_id')->nullable();
            $table->foreign('driver_id')->references('id')
                        ->on('drivers')/*->onDelete('cascade')*/;
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
        Schema::dropIfExists('cars');
    }
}
