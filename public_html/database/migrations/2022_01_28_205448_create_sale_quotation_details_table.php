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
        Schema::create('sale_quotation_details', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('sale_quotation_id');
            $table->unsignedBigInteger('product_id');
            $table->unsignedBigInteger('product_combination_id')->nullable();
            $table->unsignedBigInteger('qty')->nullable();
            $table->float('price')->nullable();
            $table->float('total')->nullable();

            $table->foreign('sale_quotation_id')->references('id')->on('sale_quotations');
            $table->foreign('product_combination_id')->references('id')->on('product_combination');
            $table->foreign('product_id')->references('id')->on('products');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sale_qoutation_details');
    }
};
