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
        Schema::create('shopping__books', function (Blueprint $table) {
            $table->uuid('id_card')->references('id')->on('shopping__cards')->onUpdate('cascade');
            $table->uuid('id_book')->references('id')->on('books')->onUpdate('cascade');
            $table->unsignedInteger('number');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('shopping__books');
    }
};
