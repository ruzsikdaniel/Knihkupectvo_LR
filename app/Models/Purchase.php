<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Purchase extends Model
{
    protected $table = 'purchases';
    protected $keyType = 'string'; // uuid needs data type string
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
