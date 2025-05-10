<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class ShoppingCart extends Model
{
    protected $table = 'shopping_carts';

    public $incrementing = false;

    public $timestamps = false;

    protected $keyType = 'string';

    protected $fillable = [
        'id_user',
        'session_id',
        'price',
    ];

    protected static function boot(){
        parent::boot();

        static::creating(function ($model) {
            if(empty($model->{$model->getKeyName()}))
                $model->{$model->getKeyName()} = (string) Str::uuid();
        });
    }

    public function books(){
        return $this->hasMany(ShoppingBook::class, 'id_card', 'id');
    }

}
