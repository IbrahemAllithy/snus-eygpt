<?php

namespace Database\Seeders;

use App\Models\Admin\Page;
use App\Models\Admin\PageDetail;
use Illuminate\Database\Seeder;

class PageTableSeeder extends Seeder
{
    /**
     * Auto generated seed file
     */
    public function run(): void
    {

        Page::where('id', '>', '0')->delete();
        PageDetail::where('id', '>', '0')->delete();

        $pageHtml = '<p>
        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
        </p>
        <p>
        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
        </p>
        <p>
        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
        </p>
        <p>
        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
        </p>
        <p>
        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
        </p>
        <p>
        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
        </p>';
        
        Page::insertOrIgnore([
            'slug' => 'about-us',
        ]);

        for ($i = 1; $i <= 31; $i++) {    

            PageDetail::insertOrIgnore([
                'title' => 'About Us',
                'description' => $pageHtml,
                'language_id' => $i,
                'page_id' => '1',
            ]);
        
        }

        
        Page::insertOrIgnore([
            'slug' => 'refund-policy',
        ]);

        for ($i = 1; $i <= 31; $i++) {    

            PageDetail::insertOrIgnore([
                'title' => 'Refund Policy',
                'description' => $pageHtml,
                'language_id' => $i,
                'page_id' => '2',
            ]);
        }    
        
        Page::insertOrIgnore([
            'slug' => 'privacy-policy',
        ]);

        for ($i = 1; $i <= 31; $i++) {    

            PageDetail::insertOrIgnore([
                'title' => 'Privacy Policy',
                'description' => $pageHtml,
                'language_id' => $i,
                'page_id' => '3',
            ]);
        }    
        
        Page::insertOrIgnore([
            'slug' => 'terms-and-conditions',
        ]);

        for ($i = 1; $i <= 31; $i++) {    

            PageDetail::insertOrIgnore([
                'title' => 'Terms and Conditions',
                'description' => $pageHtml,
                'language_id' => $i,
                'page_id' => '4',
            ]);
        }

    }
}
