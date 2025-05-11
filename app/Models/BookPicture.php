<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BookPicture extends Model
{
    protected $table = 'book_pictures';

    public $incrementing = false;
    public $timestamps = false;

    protected $fillable = [
        'id_book',
        'id_picture'
    ];
}
