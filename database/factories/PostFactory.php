<?php

namespace Database\Factories;

use App\Models\Post;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    protected $model = Post::class;

    public function definition(): array
    {
        $title = $this->faker->sentence();
        return [
            'title' => $title,
            'description' => $this->faker->paragraph(2),
            'slug' => Str::slug($title),
            'image_path' => $this->faker->imageUrl(),
            'user_id' => $this->faker->numberBetween(1, 10),
        ];
    }
}
