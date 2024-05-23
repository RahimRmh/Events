<?php

namespace Database\Factories;

use App\Models\office;
use Illuminate\Database\Eloquent\Factories\Factory;

class CarFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $offices = office::pluck('id')->toArray();

        return [
            'model' => $this->faker->word,
            'office_id' => $this->faker->randomElement($offices),
            'price' => $this->faker->numberBetween(1000,99999),
            'car_image' => $this->faker->imageUrl(),
        ];
    }
}
