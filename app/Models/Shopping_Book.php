<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Shopping_Book extends Model
{
    public $timestamps = false;
    public $incrementing = false;

    protected $fillable = [
        'id_card',
        'id_book',
        'number',
    ];
}
