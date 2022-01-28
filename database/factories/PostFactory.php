<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class PostFactory extends Factory
{

    public function definition()
    {
        $title = $this->faker->unique()->sentence(mt_rand(1, 4));
        $slug = Str::slug($title);
        $body = $this->faker->paragraphs(mt_rand(8, 12));
        return [
            'title' => $title,
            'slug' => $slug,
            'user_id' => mt_rand(1, 5),
            'category_id' => mt_rand(1, 3),
            'excerpt' => $this->faker->paragraph(2),
            'body' => "<p>" . implode("</p><p>", $body) . "</p>",

        ];
    }
}
