<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    public $timetamps = true;

    protected $fillable = ['book_name', 'book_description', 'book_image', 'category', 'created_at', 'updated_at'];

    public function categories()
    {
        return $this->belongsTo(Category::class, 'category');
    }

    public function authors()
    {
        return $this->belongsToMany(Author::class, 'books_authors', 'book_id', 'author_id');
    }

    public function literaryGenres()
    {
        return $this->belongsToMany(LiteraryGenre::class, 'books_literary_genres', 'book_id', 'literary_genre_id');
    }
}
