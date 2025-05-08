<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Shopping_Card extends Model
{
    protected $table = 'shopping__cards';
    protected $keyType = 'string'; // uuid needs string as type
    public $incrementing = false;
    public $timestamps = false;

    protected $fillable = [
        'id_user',
        'session_id',
        'price',
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            if (empty($model->{$model->getKeyName()})) {
                $model->{$model->getKeyName()} = (string) Str::uuid();
            }
        });
    }

    public function books()
    {
        return $this->hasMany(Shopping_Book::class, 'id_card', 'id');
    }

}
