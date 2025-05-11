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
            $table->string('firstname');
            $table->string('surname');
            $table->string('telephone');
            $table->string('email');
            $table->string('address');
            $table->string('city');
            $table->string('postcode');

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
