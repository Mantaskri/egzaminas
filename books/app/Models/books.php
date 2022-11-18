<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class books extends Model
{
    use HasFactory;

    public function bookCategory()
    {
        return $this->belongsTo('App\Models\Category', 'category_id', 'id');
    }

    public function reservations()
    {
        return $this->hasMany(Reservation::class, 'book_id', 'id');
    }
}
