<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Shopping_Book extends Model
{
    protected $table = 'shopping__books';

    public $timestamps = false;
    public $incrementing = false;

    protected $fillable = [
        'id_card',
        'id_book',
        'number',
    ];

    public function card()
    {
        return $this->belongsTo(Shopping_Card::class, 'id_card', 'id');
    }

    public function book()
    {
        return $this->belongsTo(Book::class, 'id_book', 'id');
    }

}
