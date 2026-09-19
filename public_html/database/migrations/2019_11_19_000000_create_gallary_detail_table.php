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
        Schema::create('gallary_detail', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('gallary_id')->nullable();
            $table->enum('gallary_type', ['large', 'medium', 'thumbnail'])->nullable();
            $table->integer('height')->nullable();
            $table->integer('width')->nullable();
            $table->string('path')->nullable();

            $table->foreign('gallary_id')->references('id')->on('gallary');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('gallary_detail');
    }
};
