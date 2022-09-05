<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Blog;
use App\Models\Category;
use App\Models\Author;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::factory(10)->create();
        Author::factory(5)->create();

        Blog::factory(20)->create();

        Category::create([
            "name" => "Health",
            "slug" => "health"
        ]);
        Category::create([
            "name" => "Technology",
            "slug" => "technology"
        ]);
        Category::create([
            "name" => "Lifestyle",
            "slug" => "lifestyle"
        ]);

    }
}
