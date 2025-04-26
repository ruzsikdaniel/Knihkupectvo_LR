<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Category_Book extends Model
{
    protected $fillable = [
        'id_category',
        'id_book',
    ];
}
