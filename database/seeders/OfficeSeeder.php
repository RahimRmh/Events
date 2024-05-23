<?php

namespace Database\Seeders;

use App\Models\office;
use Illuminate\Database\Seeder;

class OfficeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        office::factory()->count(200)->create();
    }
}
