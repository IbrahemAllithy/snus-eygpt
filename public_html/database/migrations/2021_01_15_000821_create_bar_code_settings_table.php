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
        Schema::create('bar_code_settings', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('description');
            $table->enum('continous_feed_or_rolls', ['Yes', 'No']);
            $table->string('additional_top_margin');
            $table->string('height_of_sticker');
            $table->string('width_of_sticker');
            $table->string('paper_width');
            $table->string('paper_height');
            $table->string('stickers_in_one_row');
            $table->string('distance_between_two_rows');
            $table->string('distance_between_two_columns');
            $table->string('no_of_stickers_per_sheet');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('barcode_settings');
    }
};
