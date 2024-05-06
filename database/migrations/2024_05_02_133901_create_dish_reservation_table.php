<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDishReservationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dish_reservation', function (Blueprint $table) {
            $table->id();
            $table->foreignId('dish_id')->references('id')->on('dishes')->onDelete('cascade');
            $table->foreignId('reservation_id')->references('id')->on('reservations')->onDelete('cascade');
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
        Schema::dropIfExists('dish_reservation');
    }
}
