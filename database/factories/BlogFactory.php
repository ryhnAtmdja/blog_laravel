<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class BlogFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            "title" => $this->faker->sentence(mt_rand(3, 5)),
            "slug" => $this->faker->sentence(strtolower(3)),
            "excerpt" => $this->faker->paragraph(mt_rand(2, 3)),
            "body" => collect($this->faker->paragraphs(mt_rand(5,10)))->
                        map(fn($p) => "<p>$p</p>")->implode(""),
            "author_id" => mt_rand(1, 5),
            "category_id" => mt_rand(1, 3),
        ];
    }
}
