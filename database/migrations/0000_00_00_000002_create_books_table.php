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
        Schema::create('books', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('title', 50);
            $table->string('author', 20);
            $table->float('price', precision:2);
            $table->string('abstract', 1500);
            $table->string('genre', 30);
            $table->string('language', 14);
            $table->unsignedInteger('pages');
            $table->string('publisher', 15);
            $table->unsignedInteger('year');
            $table->boolean('stock');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(){
        Schema::dropIfExists('books');
    }
};
