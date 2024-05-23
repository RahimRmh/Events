<?php

namespace Database\Seeders;

use App\Models\dish;
use App\Models\hall;
use Illuminate\Database\Seeder;

class DishSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        $dishes = Dish::factory()->count(2000)->create();
        $dishIds = $dishes->pluck('id')->toArray(); // Get all dish IDs
    
        $halls = Hall::all();
    
       foreach ($halls as $hall) {
            $randomDishIds = collect($dishIds)->random(rand(1, 2000)); 
            $hall->dishes()->attach($randomDishIds); // Attach dishes to hall
        }
    }
    
}
