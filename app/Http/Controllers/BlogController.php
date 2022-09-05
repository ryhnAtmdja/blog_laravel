<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;
use App\Models\Category;

class BlogController extends Controller
{

    public function showAll(){
        return view('blogs', [
            "title" => "All Blogs Posts",
            "blog_posts" => Blog::with(['author', 'category'])->latest()->search(request(['search', 'category', 'author']))->get(),
            "categories" => Category::all(),
        ]);
    }

    public function showBySlug(Blog $blog){
        return view('blog', [
            "title" => "Blog Detail",
            "single_post" => $blog
        ]);
    }
}
