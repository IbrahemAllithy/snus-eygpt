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
        Schema::create('points', function (Blueprint $table) {
            $table->id();
            $table->float('points')->nullable();
            $table->string('description')->nullable();
            $table->enum('type', ['checkin_point', 'product_share_point', 'invite_friend_share_point', 'register_points', 'per_order_point', 'redeem']);
            $table->bigInteger('reference_id')->nullable();
            $table->bigInteger('customer_id')->nullable();
            $table->enum('status', ['1', '0'])->default(0)->comment('o for not redeem 1 for redeem')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('points');
    }
};
