<?php

namespace Database\Seeders;

use App\Models\Admin\UnitDetail;
use Illuminate\Database\Seeder;

class UnitDetailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 1; $i <= 31; $i++) { 
            UnitDetail::insertOrIgnore(
                [
                    'unit_id' => '1',
                    'name' => 'pcs',
                    'language_id' => $i,
                ]
            );
        }    
    }
}
