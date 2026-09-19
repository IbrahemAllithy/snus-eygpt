<?php

namespace Database\Seeders;

use App\Models\Admin\Unit;
use Illuminate\Database\Seeder;

class UnitsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Unit::insertOrIgnore(
            [
                'is_active' => '1',
                'created_by' => '1',
            ]
        );
    }
}
