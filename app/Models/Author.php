<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    use HasFactory;

    public $timetamps = true;

    protected $fillable = ['name', 'nationality', 'biography', 'created_at', 'updated_at'];

    public function books()
    {
        return $this->hasMany(Book::class);
    }
}