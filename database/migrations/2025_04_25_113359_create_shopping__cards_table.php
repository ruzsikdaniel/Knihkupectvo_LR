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
        Schema::create('shopping__cards', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('id_user')->references('id')->on('users')->onUpdate('cascade')->nullable();
            $table->uuid('session_id')->references('user_id')->on('sessions')->onUpdate('cascade')->nullable();
            $table->decimal('price', total:5, places:2);

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('shopping__cards');
    }
};
