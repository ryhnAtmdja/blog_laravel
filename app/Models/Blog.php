<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;

    // untuk menghindari massassigment exception ketika menggunakan method create()
    protected $fillable = ["title", "category_id","author_id", "slug", "excerpt", "body"];

    public function category (){
        return $this->belongsTo(Category::class);
    }

    public function author (){
        return $this->belongsTo(Author::class);
    }

    public function scopeSearch($query, array $filters){
        $query->when($filters['search'] ?? false, function($query, $search){
            return $query->where('title', 'like', '%' . $search . '%');
        })->when($filters['category'] ?? false, function($query, $category){
            return $query->whereHas('category', function($query) use($category){
                return $query->where('slug', $category);
            });
        })->when($filters['author'] ?? false, function($query, $author){
            return $query->whereHas('author', function($query) use($author){
                return $query->where('name', $author);
            });
        });
    }
}
