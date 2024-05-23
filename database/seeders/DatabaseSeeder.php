<?php

namespace Database\Seeders;

use App\Models\car;
use App\Models\hall;
use App\Models\HallImage;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
        //   HallSeeder::class,
        //   OfficeSeeder::class,
        //   SingerSeeder::class,
          CarSeeder::class,
          DishSeeder::class,
        //   HallImageSeeder::class  
       ]);
    }
}
