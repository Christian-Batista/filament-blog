<?php

namespace Database\Factories;

use App\Models\Post;
use App\Models\User;
use App\Models\Category;
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
        return [
            "user_id"=> User::factory(),
            "title" => $this->faker->sentence,
            "image" => $this->faker->imageUrl,
            "slug" => $this->faker->slug(3),
            "body" => $this->faker->paragraph(10),
            "published_at" => $this->faker->dateTimeBetween("-1 Week","+1 Week"),
            "featured" => $this->faker->boolean(10),

        ];
    }

    public function configure()
    {
        return $this->afterCreating(function (Post $post) {
            $categories = Category::inRandomOrder()->limit(2)->get();
            $post->categories()->attach($categories);
        });
    }
}
