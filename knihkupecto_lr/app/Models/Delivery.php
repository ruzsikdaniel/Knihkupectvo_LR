<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

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
