<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Deliver extends Model
{
    protected $fillable = [
        'id',
        'type',
        'price',
    ];
}
