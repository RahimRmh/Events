<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDishHallTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dish_hall', function (Blueprint $table) {
            $table->id();
            $table->foreignId('hall_id')->references('id')->on('halls')->onDelete('cascade');
            $table->foreignId('dish_id')->references('id')->on('dishes')->onDelete('cascade');
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
        Schema::dropIfExists('dish_hall');
    }
}
