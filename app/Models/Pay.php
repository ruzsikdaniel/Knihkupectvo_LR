<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Pay extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'id',
        'type',
        'price',
    ];
}
