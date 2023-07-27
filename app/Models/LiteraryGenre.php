<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LiteraryGenre extends Model
{
    use HasFactory;

    public $timetamps = true;

    protected $fillable = ['name', 'description', 'created_at', 'updated_at'];

    public function books()
    {
        return $this->belongsToMany(Book::class, 'books_literary_genres', 'literary_genre_id', 'book_id');
    }
}
