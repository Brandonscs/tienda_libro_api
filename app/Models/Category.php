<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    public $timetamps = true;

    protected $fillable = ['name', 'description', 'priority', 'created_at', 'updated_at'];

    public function books()
    {
        return $this->hasMany(Book::class, 'category');
    }
}