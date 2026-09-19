<?php

namespace Database\Seeders;

use App\Models\Admin\Brand;
use Illuminate\Database\Seeder;

class BrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Brand::where('id', '>', '0')->delete();
        Brand::insertOrIgnore([
            'name' => 'brand1',
            'brand_slug' => 'brand1',
            'gallary_id' => '1',
            'status' => 'active',
        ]
        );

        Brand::insertOrIgnore([
            'name' => 'brand2',
            'brand_slug' => 'brand2',
            'gallary_id' => '1',
            'status' => 'active',
        ]
        );
    }
}
