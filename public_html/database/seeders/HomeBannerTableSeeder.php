<?php

namespace Database\Seeders;

use App\Models\Admin\HomeBanner;
use Illuminate\Database\Seeder;

class HomeBannerTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        HomeBanner::where('id', '>', '0')->delete();
        
        for ($i = 1; $i <= 31; $i++) {  
            HomeBanner::insertOrIgnore([
                'banner_name' => 'banners_1',
                'language_id' => $i,
                'content' => '<div class="parallax-banner-text"><h2>Parallax Banner One</h2><h4>Sunday Special</h4><div class="hover-link"><a href="/shop" class="btn btn-secondary swipe-to-top" data-toggle="tooltip" data-placement="bottom" title="View All Range" data-original-title="View All Range">Shop Now</a></div></div>',
                'gallary_id' => '41',

            ]);
            HomeBanner::insertOrIgnore([
                'banner_name' => 'banners_2',
                'language_id' => $i,
                'content' => '<div class="parallax-banner-text">        <h2>Parallax Banner Two</h2>            <h4>Farm Fresh</h4>            <div class="hover-link">               <a href="/shop" class="btn btn-secondary swipe-to-top" data-toggle="tooltip" data-placement="bottom" title="View All Range" data-original-title="View All Range">Shop Now</a>        </div>      </div>',
                'gallary_id' => '41',

            ]);
            HomeBanner::insertOrIgnore([
                'banner_name' => 'banners_3',
                'language_id' => $i,
                'content' => '<div class="parallax-banner-text">      <h2>Parallax Banner Three</h2>          <h4>Your Favorite</h4>          <div class="hover-link">             <a href="/shop" class="btn btn-secondary swipe-to-top" data-toggle="tooltip" data-placement="bottom" title="View All Range" data-original-title="View All Range">Shop Now </a>      </div>    </div>',
                'gallary_id' => '41',

            ]);
        }    
    }
}
