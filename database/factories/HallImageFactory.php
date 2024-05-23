<?php

namespace Database\Factories;

use App\Models\hall;
use Illuminate\Database\Eloquent\Factories\Factory;

class HallImageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $hallIds = hall::all()->pluck('id')->toArray();

        return [
            'path' =>  $this->faker->imageUrl(),
            'hall_id' => $this->faker->randomElement($hallIds),
        ];
    }
}
