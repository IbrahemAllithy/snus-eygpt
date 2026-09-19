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
        Schema::create('blog_news_detail', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('blog_news_id');
            $table->unsignedBigInteger('language_id');
            $table->string('name')->nullable();
            $table->longText('desc')->nullable();

            $table->foreign('blog_news_id')->references('id')->on('blog_news');
            $table->foreign('language_id')->references('id')->on('languages');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('blog_news_detail');
    }
};
