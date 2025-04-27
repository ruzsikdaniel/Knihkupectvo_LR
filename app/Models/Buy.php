<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Buy extends Model
{
    protected $keyType = 'string'; //for using uuid we need to set to string
    public $incrementing = false;
    public $timestamps = false;

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            if (empty($model->{$model->getKeyName()})) {
                $model->{$model->getKeyName()} = (string) Str::uuid();
            }
        });
    }

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
