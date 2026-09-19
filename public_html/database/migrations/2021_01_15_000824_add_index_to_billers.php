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
        Schema::table('billers', function (Blueprint $table) {
            $table->index('name');
            $table->index('company_name');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('billers', function (Blueprint $table) {
            $table->dropIndex('billers_name_index');
            $table->dropIndex('billers_company_name_index');

        });
    }
};
