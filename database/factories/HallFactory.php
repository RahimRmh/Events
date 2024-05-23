<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class HallFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->word,
            'capacity' => $this->faker->numberBetween(50, 500),
            'location' => $this->faker->address,
            'price' => $this->faker->numberBetween(1000, 5000),
            'category' => $this->faker->randomElement(['Weddings','Sad occasions','Graduation parties','Birthdays']),
            'description' => $this->faker->paragraph,
            'hall_image' => $this->faker->imageUrl(),      
          ];
    }
}
