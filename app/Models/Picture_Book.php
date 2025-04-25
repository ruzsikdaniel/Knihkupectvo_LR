<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Picture_Book extends Model
{
    protected $fillable = [
        'id_picture',
        'id_book',
    ];
}
