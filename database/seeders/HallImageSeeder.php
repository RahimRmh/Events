<?php

namespace Database\Seeders;

use App\Models\HallImage;
use Illuminate\Database\Seeder;

class HallImageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        HallImage::factory()->count(3000)->create();    
    }
}
