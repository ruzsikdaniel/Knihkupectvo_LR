<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category_Book extends Model
{
    protected $fillable = [
        'id_category',
        'id_book',
    ];
}
