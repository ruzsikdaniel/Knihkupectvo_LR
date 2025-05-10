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
        Schema::create('book_categories', function (Blueprint $table) {
            $table->unsignedInteger('id_category')->references('id')->on('categories')->onUpdate('cascade');
            $table->uuid('id_book')->references('id')->on('books')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(){
        Schema::dropIfExists('book_categories');
    }
};
