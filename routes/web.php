<?php

use App\Http\Controllers\AuthorController;
use App\Models\Blog;
use App\Models\Category;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\BlogController;
use App\Http\Controllers\CategoryController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('home', [
        "title" => "Home"
    ]);
});

Route::get('/about', function () {
    return view('about', [
        "nama" => "Stuart",
        "email" => "stuart@gmail.com",
        "title" => "About"
    ]);
});

Route::get('/blogs', [BlogController::class, 'showAll']);

// blog:slug => mencari blog berdasarkan slug nya, jika tidak diberi :slug, maka secara default akan mencari berdasarkan id
Route::get('/blog/{blog:slug}', [BlogController::class, 'showBySlug']);

Route::get('/category/{category:slug}', function (Category $category) {
    return view('blogs', [
        "title" => "Blogs Category : $category->name",
        "blog_posts" => $category->blogs->load('author', 'category'),
        "categories" => $category::all()
    ]);
});

Route::get('/authors', [AuthorController::class, 'showAll']);

Route::get('/author/{author:username}', [AuthorController::class, 'showByUname']);

Route::get('/category', [CategoryController::class, 'showAll']);
