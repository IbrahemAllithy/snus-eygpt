<?php

namespace Database\Seeders;

use App\Models\Admin\Banner;
use Illuminate\Database\Seeder;

class BannerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Banner::where('id', '>', '0')->delete();
        
        for ($i = 1; $i <= 31; $i++) {    
            Banner::insertOrIgnore(
                [
                    'title' => 'Some Title',
                    'description' => 'Some Description',
                    'slider_navigation_id' => '1',
                    'gallary_id' => '2',
                    'ref_id' => '1',
                    'status' => 'active',
                    'language_id' => $i,

                ]
            );

            Banner::insertOrIgnore(
                [
                    'title' => 'Some Title',
                    'description' => 'Some Description',
                    'slider_navigation_id' => '1',
                    'gallary_id' => '2',
                    'ref_id' => '1',
                    'status' => 'active',
                    'language_id' => $i,

                ]
            );

            Banner::insertOrIgnore(
                [
                    'title' => 'Some Title',
                    'description' => 'Some Description',
                    'slider_navigation_id' => '2',
                    'gallary_id' => '2',
                    'ref_id' => '1',
                    'status' => 'active',
                    'language_id' => $i,

                ]
            );
        }    
    }
}
