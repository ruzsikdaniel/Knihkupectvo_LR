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
        Schema::create('purchases', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('name_u', 20);
            $table->string('surname_u', 20);
            $table->string('telephone', 10);
            $table->string('email', 20);
            $table->string('address', 20);
            $table->string('city', 20);
            $table->string('postcode', 5);

            $table->unsignedBigInteger('delivery_id')->nullable()->default(null);
            $table->unsignedBigInteger('payment_id')->nullable()->default(null);

            $table->foreign('delivery_id')->references('id')->on('deliveries');
            $table->foreign('payment_id')->references('id')->on('payments');

            $table->boolean('isPaid')->default(false)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(){
        Schema::dropIfExists('purchases');
    }
};
