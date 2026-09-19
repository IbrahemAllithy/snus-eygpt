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
        Schema::create('constant_banners', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('url');
            $table->string('banner_number');
            $table->enum('status', ['active', 'inactive'])->default('active');
            $table->unsignedBigInteger('language_id')->nullable();
            $table->unsignedBigInteger('gallary_id')->nullable();
            $table->unsignedBigInteger('created_by')->nullable();
            $table->unsignedBigInteger('updated_by')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('constant_banners');
    }
};
