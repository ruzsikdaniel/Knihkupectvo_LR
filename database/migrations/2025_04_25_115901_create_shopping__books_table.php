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
            $table->id();

            $table->uuid('id_card');
            $table->uuid('id_book');
            $table->unsignedInteger('number')->default(1);

            $table->foreign('id_card')->references('id')->on('shopping__cards')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('id_book')->references('id')->on('books')->onUpdate('cascade')->onDelete('cascade');
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
