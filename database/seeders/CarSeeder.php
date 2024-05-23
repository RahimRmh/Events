<?php

namespace Database\Seeders;

use App\Models\car;
use App\Models\hall;
use Illuminate\Database\Seeder;

class CarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $cars = car::factory()->count(50)->create();
        $carsIds = $cars->pluck('id')->toArray();

        $halls = Hall::all();

        foreach ($halls as $hall) {
           $carId =  collect($carsIds)->random(rand(1,2000)) ;     
            $hall->cars()->attach($carId);
        }
        

    }

}
