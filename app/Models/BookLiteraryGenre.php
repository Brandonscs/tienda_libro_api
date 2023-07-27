<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookLiteraryGenre extends Model
{
    use HasFactory;

    public function books()
    {
        return $this->hasMany(Book::class);
    }
    
    public function literaryGenres()
    {
        return $this->hasMany(LiteraryGenre::class);
    }
}
