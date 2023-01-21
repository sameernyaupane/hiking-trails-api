<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class TrailDetailFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'difficulty'       => fake()->name(),
            'elevation'        => fake()->name(),
            'elevation_rating' => fake()->name(),
            'distance'         => fake()->name(),
            'distance_rating'  => fake()->name(),
            'estimated_time'   => fake()->name(),
        ];
    }
}
