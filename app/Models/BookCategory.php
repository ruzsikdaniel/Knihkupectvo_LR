<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BookCategory extends Model
{
    protected $table = 'book_categories';

    public $timestamps = false;
    public $incrementing = false;

    protected $fillable = [
        'id_category',
        'id_book',
    ];
}
