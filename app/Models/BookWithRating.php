<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BookWithRating extends Model
{
    public $table = 'book_with_ratings';
    public $incrementing = false;
    public $timestamps = false;
}
