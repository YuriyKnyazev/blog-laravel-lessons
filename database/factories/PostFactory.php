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
    public function definition(): array
    {
        $tittle = fake()->sentence(4);

        return [
            'title' => $tittle,
            'slug' => str($tittle)->slug()->toString(),
            'description' => fake()->text(),
            'body' => fake()->text(2000),
            'cover' => 'sample/images/' . rand(1, 10) . '.jpg',
            'category_id' => rand(1, 10),
            'user_id' => rand(1, 11)

        ];
    }
}
