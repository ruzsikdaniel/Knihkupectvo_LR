<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Purchase extends Model
{
    protected $table = 'purchases';
    protected $keyType = 'string'; // uuid needs data type string
    protected $primaryKey= 'id';
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
        'name_u',
        'surname_u',
        'telephone',
        'email',
        'address',
        'city',
        'postcode',
        'isPaid',
        'delivery_id',
        'payment_id',
    ];
}
