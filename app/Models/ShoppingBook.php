<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ShoppingBook extends Model
{
    protected $table = 'shopping_books';
    public $incrementing = false;
    public $timestamps = false;

    protected $fillable = [
        'id_card',
        'id_book',
        'number',
    ];

    public function card(){
        return $this->belongsTo(ShoppingCart::class, 'id_card', 'id');
    }

    public function book(){
        return $this->belongsTo(Book::class, 'id_book', 'id');
    }

}
