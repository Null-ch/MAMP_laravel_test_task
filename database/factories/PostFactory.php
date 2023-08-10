<?php

namespace Database\Factories;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    protected $model = Post::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    
    public function definition(): array
    {
        $title = $this->faker->sentence(3);
        return [
            'title' => $title,
            'content' => $this->faker->text,
            'slug' => Str::slug($title, '-'),
            'preview_image' => $this->faker->imageUrl('public/storage/images', 300, 200),
            'category_id' => Category::get()->random()->id,
            'isActive' => true
        ];
    }
}
