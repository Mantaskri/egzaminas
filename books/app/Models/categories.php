<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class categories extends Model
{
    use HasFactory;

    public function categoryBooks()
    {
        return $this->hasMany('App\Models\Book', 'book_id', 'id');
    }

    public function categoryCount()
    {
        return $this->hasMany('App\Models\Book', 'book_id', 'id');
    }

    public function books()
     {
         return $this->hasMany(Book::class, 'category_id', 'id');
     }
}
