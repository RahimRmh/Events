<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHallSingerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hall_singer', function (Blueprint $table) {
            $table->id();
            $table->foreignId('hall_id')->references('id')->on('halls')->onDelete('cascade');
            $table->foreignId('singer_id')->references('id')->on('singers')->onDelete('cascade');
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
        Schema::dropIfExists('hall_singer');
    }
}
