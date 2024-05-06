<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReservationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reservations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreignId('hall_id')->references('id')->on('halls')->onDelete('cascade');
            $table->foreignId('time_id')->references('id')->on('times');
            $table->enum('status', ['pending', 'confirmed', 'canceled'])->default('pending');
            $table->date('Date')->default('2024-05-02');
            $table->decimal('Total_Price',10,2)->default(0.0);
            $table->foreignId('car_id')->references('id')->on('cars')->onDelete('cascade');


            $table->text('notes')->nullable();
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
        Schema::dropIfExists('reservations');
    }
}
