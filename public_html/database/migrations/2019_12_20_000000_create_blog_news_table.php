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
        Schema::create('blog_news', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('gallary_id')->nullable();
            $table->unsignedBigInteger('blog_category_id')->nullable();
            $table->enum('status', ['active', 'inactive'])->default('active');
            $table->tinyInteger('is_featured')->default('0')->comment('0 for not featured & 1 for featured');
            $table->string('slug');
            $table->integer('views')->default(0);
            $table->unsignedBigInteger('created_by')->nullable();
            $table->unsignedBigInteger('updated_by')->nullable();
            $table->softDeletes();
            $table->timestamps();

            $table->foreign('gallary_id')->references('id')->on('gallary');
            $table->foreign('created_by')->references('id')->on('users');
            $table->foreign('updated_by')->references('id')->on('users');
            $table->foreign('blog_category_id')->references('id')->on('blog_categories');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('blog_news');
    }
};
