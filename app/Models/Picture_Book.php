<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Picture_Book extends Model
{
    public $timestamps = false;
    public $incrementing = false;

    protected $table = 'picture__books';

    protected $fillable = [
        'id_book',
        'id_picture'
    ];
}
