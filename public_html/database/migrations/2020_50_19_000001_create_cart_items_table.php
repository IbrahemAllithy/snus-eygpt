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
        Schema::create('cart_items', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('product_id');
            $table->unsignedBigInteger('warehouse_id');
            $table->index('product_id');
            $table->unsignedBigInteger('product_combination_id')->nullable();
            $table->index('product_combination_id')->nullable();
            $table->unsignedBigInteger('customer_id')->nullable();
            $table->integer('qty')->nullable();
            $table->boolean('is_order')->default('0');
            $table->string('session_id')->nullable();
            $table->timestamps();

            $table->foreign('product_id')->references('id')->on('products');
            // $table->foreign('warehouse_id')->references('id')->on('warehouses');
            $table->foreign('product_combination_id')->references('id')->on('product_combination');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cart_items');
    }
};
