<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Picture_Book extends Model
{
    protected $fillable = [
        'id_picture',
        'id_book',
    ];
}
