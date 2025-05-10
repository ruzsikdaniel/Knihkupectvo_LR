<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Book extends Model
{
    protected $table = 'books';
    protected $keyType = 'string';
    public $incrementing = false;
    public $timestamps = false;

    protected static function boot(){
        parent::boot();

        static::creating(function ($model) {
            if (empty($model->{$model->getKeyName()}))
                $model->{$model->getKeyName()} = (string) Str::uuid();
        });
    }

    public function pictures(){
        return $this->belongsToMany(Picture::class, 'book_pictures', 'id_book', 'id_picture');
    }

    protected $fillable = [
        'id',
        'name',
        'price',
        'detail',
        'genre',
        'language',
        'pages',
        'publisher',
        'year',
        'state',
        'author',
    ];
}
