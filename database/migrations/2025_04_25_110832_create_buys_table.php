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
        Schema::create('buys', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('name_u', 20);
            $table->string('surnamename_u', 20);
            $table->string('telephone', 10);
            $table->string('email', 20);
            $table->string('address', 20);
            $table->string('city', 20);
            $table->string('psc', 5);
            $table->unsignedInteger('deliver')->references('id')->on('delivers')->onUpdate('cascade');
            $table->unsignedInteger('pay')->references('id')->on('pays')->onUpdate('cascade');
            $table->string('payed', 20);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('buys');
    }
};
