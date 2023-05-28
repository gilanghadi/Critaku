<?php

namespace Database\Factories;

use Illuminate\Support\Arr;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Comment>
 */
class CommentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => Arr::random([1, 2, 3, 4, 5]),
            'blog_id' => Arr::random([1, 2, 3, 4, 5, 6, 7, 8, 9, 10]),
            'comment_body' => Str::random(100),
            'parent' => Arr::random([1, 2, 3, 4, 5])
        ];
    }
}
