<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('picture__books', function (Blueprint $table) {
            $table->unsignedInteger('id_picture')->references('id')->on('picture')->onUpdate('cascade');
            $table->uuid('id_book')->references('id')->on('book')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('picture__books');
    }
};
