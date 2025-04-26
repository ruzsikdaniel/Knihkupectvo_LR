<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Picture extends Model
{
    protected $fillable = [
        'id',
        'name',
        'dir',
    ];

}
