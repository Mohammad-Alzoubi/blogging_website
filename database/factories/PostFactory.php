<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'user_id'     => fake()->numberBetween(2,4),
            'title'       => $title = fake()->sentence(5),
            'slug'        => make_slug($title),
            'description' => fake()->text(1000),
        ];
    }
}
