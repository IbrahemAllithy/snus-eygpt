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
        Schema::create('purchase_detail', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('purchase_id');
            $table->unsignedBigInteger('product_id');
            $table->unsignedBigInteger('product_combination_id')->nullable();
            $table->float('price');
            $table->integer('qty');
            $table->float('product_total');

            $table->foreign('purchase_id')->references('id')->on('purchase');
            $table->foreign('product_id')->references('id')->on('products');
            $table->foreign('product_combination_id')->references('id')->on('product_combination');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('purchase_detail');
    }
};
