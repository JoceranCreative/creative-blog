<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Article>
 */
class ArticleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'user_id' => '1',
            'category_id' => random_int(1, 4),
            'title' => fake()->sentence(),
            'tags' => 'formation, alternance, creativité, développeur',
            'author' => fake()->name(),
            'text' => fake()->text(250),
        ];
    }
}
