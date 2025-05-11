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
        Schema::create('pictures', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('title', 50)->nullable();
            $table->string('url', 1000)->nullable();
            $table->string('path', 1000)->nullable();
            $table->string('source', 1000)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(){
        Schema::dropIfExists('pictures');
    }
};
