<?php

namespace Database\Seeders;

use App\Models\car;
use App\Models\hall;
use Illuminate\Database\Seeder;

class HallSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        hall::factory()->count(10000)->create();
    }
}  
