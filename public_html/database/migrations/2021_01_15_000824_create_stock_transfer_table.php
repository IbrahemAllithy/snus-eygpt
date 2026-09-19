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
        Schema::create('stock_transfer', function (Blueprint $table) {
            $table->id();
            $table->string('reference_no');
            $table->date('trasfer_date')->useCurrent();
            $table->longText('notes')->nullable();
            $table->foreignId('warehouse_from')->constrained('warehouses')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('warehouse_to')->constrained('warehouses')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('created_by')->nullable()->constrained('users')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('updated_by')->nullable()->constrained('users')->onUpdate('cascade')->onDelete('cascade');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('stock_transfer');
    }
};
