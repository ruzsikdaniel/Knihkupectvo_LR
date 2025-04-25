<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Deliver extends Model
{
    protected $fillable = [
        'id',
        'type',
        'price',
    ];
}
