<?php

namespace Database\Seeders;

use App\Models\Admin\Tag;
use Illuminate\Database\Seeder;

class TagsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        
        \DB::table('tags')->insert([
            0 => [
                'id' => '1',
                'name' => 'demo',
            ],
            1 => [
                'id' => '2',
                'name' => 'general',
            ],
            2 => [
                'id' => '3',
                'name' => 'sliders',
            ],
            3 => [
                'id' => '4',
                'name' => 'banners',
            ],
            4 => [
                'id' => '5',
                'name' => 'category',
            ],
            5 => [
                'id' => '6',
                'name' => 'product',
            ],
            6 => [
                'id' => '7',
                'name' => 'parallax',
            ],
            7 => [
                'id' => '8',
                'name' => 'home-blocks',
            ],
            8 => [
                'id' => '9',
                'name' => 'home-sliders',
            ],
        ]);
    }
}
