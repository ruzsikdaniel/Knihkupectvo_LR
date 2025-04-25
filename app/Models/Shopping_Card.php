<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Shopping_Card extends Model
{
    protected $keyType = 'string'; //for using uuid we need to set to string
    public $incrementing = false;

    protected $fillable = [
        'id_user',
        'session_id',
        'price',
    ];

}
