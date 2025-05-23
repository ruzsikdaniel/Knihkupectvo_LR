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
        Schema::create('book_pictures', function (Blueprint $table) {
            $table->id();
            $table->uuid('id_book');
            $table->uuid('id_picture');

            $table->foreign('id_book')->references('id')->on('books')->onDelete('cascade');
            $table->foreign('id_picture')->references('id')->on('pictures')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(){
        Schema::dropIfExists('book_pictures');
    }
};
