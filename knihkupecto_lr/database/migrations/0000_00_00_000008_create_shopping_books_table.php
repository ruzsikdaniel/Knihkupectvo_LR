<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(){
        Schema::create('shopping_books', function (Blueprint $table) {
            $table->id();

            $table->uuid('id_cart');
            $table->uuid('id_book');
            $table->unsignedInteger('amount')->default(1);

            $table->foreign('id_cart')->references('id')->on('shopping_carts')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('id_book')->references('id')->on('books')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(){
        Schema::dropIfExists('shopping_books');
    }
};
