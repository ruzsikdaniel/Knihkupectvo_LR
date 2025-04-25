<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Buy extends Model
{
    protected $keyType = 'string'; //for using uuid we need to set to string
    public $incrementing = false;

    protected $fillable = [
        'id',
        'name_u',
        'surname_u',
        'telephone',
        'email',
        'address',
        'city',
        'psc',
        'deliver',
        'pay',
        'payed',
    ];
}
