<?php

namespace Database\Seeders;

use App\Models\hall;
use App\Models\Singer;
use Illuminate\Database\Seeder;

class SingerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $singers = Singer::factory()->count(50)->create();
        $halls = Hall::all();

        foreach ($halls as $hall) {
            $hallModel = Hall::find($hall->id); // Retrieve Hall model instance
            $hallModel->singers()->attach($singers->random(rand(1, 3))->pluck('id')->toArray());
        }
        
     
    }
}
