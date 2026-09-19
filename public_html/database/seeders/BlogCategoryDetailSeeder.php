<?php

namespace Database\Seeders;

use App\Models\Admin\BlogCategoryDetail;
use Illuminate\Database\Seeder;

class BlogCategoryDetailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 1; $i <= 31; $i++) {  
            BlogCategoryDetail::insertOrIgnore(
                [
                    'blog_category_id' => '1',
                    'language_id' => $i,
                    'name' => 'Blog Cat1',
                ]
            );
        
            BlogCategoryDetail::insertOrIgnore(
                [
                    'blog_category_id' => '2',
                    'language_id' => $i,
                    'name' => 'Blog Cat2',
                ]
            );
        }
    }
}
