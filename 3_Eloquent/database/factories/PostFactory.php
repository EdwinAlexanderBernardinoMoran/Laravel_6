<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            //
            'user_id' => rand(1,4),
            'title' => $this->faker->sentence(),
            'body' => $this->faker->text(800),
        ];
    }
}
