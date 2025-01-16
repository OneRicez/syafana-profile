<?php

namespace Database\Factories;

use App\Models\News;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\News>
 */
class NewsFactory extends Factory
{
    protected $model = News::class;

    public function definition()
    {
        return [
            'title' => $this->faker->sentence(),
            'content' => $this->faker->paragraph(),
            'image' => $this->faker->imageUrl(640, 480, 'news', true),
            'category' => $this->faker->randomElement(['tech', 'sports', 'entertainment']),
            'author' => $this->faker->name(),
            'status' => 'published',
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
