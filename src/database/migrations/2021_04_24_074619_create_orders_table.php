<?php

use App\Enums\OrderType;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('from_address');
            $table->string('to_address');
            $table->string('from_coordinates');
            $table->string('to_coordinates');
            $table->decimal('result_km_price', 6, 2)->nullable();
            $table->decimal('result_minute_price', 6, 2)->nullable();
            $table->decimal('result_price', 6, 2)->nullable();
            $table->unsignedTinyInt('status')->default(OrderType::NewOrder);
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
        Schema::dropIfExists('orders');
    }
}
