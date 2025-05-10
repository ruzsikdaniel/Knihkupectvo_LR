<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Delivery extends Model
{
    protected $table = 'deliveries';

    public $timestamps = false;

    protected $fillable = [
        'id',
        'method',
        'price',
    ];
}
