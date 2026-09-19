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
        Schema::create('variation_detail', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->foreignId('variation_id')->constrained('variations')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('language_id')->constrained('languages')->onUpdate('cascade')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('variation_detail');
    }
};
