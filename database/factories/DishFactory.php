<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class DishFactory extends Factory
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
            'type' => $this->faker->randomElement(['dinner','dessert','drinks']),
            'dish_image' => $this->faker->imageUrl(),      
            'price' => $this->faker->numberBetween(1000,100000),
        ];
    }
}
