<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $keyType = 'string'; //for using uuid we need to set to string
    public $incrementing = false;

    protected $fillable = [
        'id',
        'name',
        'price',
        'detail',
        'genre',
        'language',
        'pages',
        'publisher',
        'year',
        'state',
    ];
}
