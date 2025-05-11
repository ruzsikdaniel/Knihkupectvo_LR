<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Picture extends Model
{
    protected $table = 'pictures';

    public $timestamps = true;
    protected $primaryKey = 'id';
    protected $keyType = 'string';
    public $incrementing = false;

    protected $fillable = [
        'id',
        'title',
        'url',
        'path',
        'source',
    ];

    protected static function boot(){
        parent::boot();

        static::creating(function ($model) {
            if (empty($model->{$model->getKeyName()}))
                $model->{$model->getKeyName()} = (string) Str::uuid();
        });
    }

    public function books(){
        return $this->belongsToMany(Book::class,
            'book_pictures',
            'id_picture',
            'id_book');
    }
}
