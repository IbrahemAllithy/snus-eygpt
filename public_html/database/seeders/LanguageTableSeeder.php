<?php

namespace Database\Seeders;

use App\Models\Admin\Language;
use Illuminate\Database\Seeder;

class LanguageTableSeeder extends Seeder
{
    /**
     * Auto generated seed file
     */
    public function run(): void
    {

        Language::where('id', '>', '0')->delete();
        Language::insertOrIgnore([
            [
                'name' => 'English',
                'code' => 'en',
                'direction' => 'ltr',
                'is_default' => '1',
                'status' => 'active',
            ],
            [
                'name' => 'Arabic',
                'code' => 'ar',
                'direction' => 'rtl',
                'is_default' => '0',
                'status' => 'inactive',
            ],
            [
                'name' => 'French',
                'code' => 'fr',
                'direction' => "ltr",
                'is_default' => '0',
                'status' => 'inactive',
            ],
            [
                'name' => 'Spanish',
                'code' => 'es',
                'direction' => "ltr",
                'is_default' => '0',
                'status' => 'inactive',
            ],
            [
                'name' => 'Portuguese',
                'code' => 'pt',
                'direction' => "ltr",
                'is_default' => '0',
                'status' => 'inactive',
            ],
            [
                'name' => 'Portuguese BR',
                'code' => 'pt-BR',
                'direction' => "ltr",
                'is_default' => '0',
                'status' => 'inactive',
            ],
            [
                'name' => 'German',
                'code' => 'de',
                'direction' => "ltr",
                'is_default' => '0',
                'status' => 'inactive',
            ],
            [
                'name' => 'Italian',
                'code' => 'it',
                'direction' => "ltr",
                'is_default' => '0',
                'status' => 'inactive',
            ],
            [
                'name' => 'Swedish',
                'code' => 'sv',
                'direction' => "ltr",
                'is_default' => '0',
                'status' => 'inactive',
            ],
            [
                'name' => 'Dutch',
                'code' => 'nl',
                'direction' => "ltr",
                'is_default' => '0',
                'status' => 'inactive',
            ],
            [
                'name' => 'Hindi',
                'code' => 'hi',
                'direction' => "ltr",
                'is_default' => '0',
                'status' => 'inactive',
            ],
            [
                'name' => 'Bengali',
                'code' => 'bn',
                'direction' => "ltr",
                'is_default' => '0',
                'status' => 'inactive',
            ],
            [
                'name' => 'Indonesian',
                'code' => 'id',
                'direction' => "ltr",
                'is_default' => '0',
                'status' => 'inactive',
            ],
            [
                'name' => 'Danish',
                'code' => 'da',
                'direction' => "ltr",
                'is_default' => '0',
                'status' => 'inactive',
            ],
            [
                'name' => 'Norwegian',
                'code' => 'no',
                'direction' => "ltr",
                'is_default' => '0',
                'status' => 'inactive',
            ],
            [
                'name' => 'Turkish',
                'code' => 'tr',
                'direction' => "ltr",
                'is_default' => '0',
                'status' => 'inactive',
            ],
            [
                'name' => 'Finnish',
                'code' => 'fi',
                'direction' => "ltr",
                'is_default' => '0',
                'status' => 'inactive',
            ],
            [
                'name' => 'Icelandic',
                'code' => 'is',
                'direction' => "ltr",
                'is_default' => '0',
                'status' => 'inactive',
            ],
            [
                'name' => 'Tamil',
                'code' => 'ta',
                'direction' => "ltr",
                'is_default' => '0',
                'status' => 'inactive',
            ],
            [
                'name' => 'Hebrew',
                'code' => 'he',
                'direction' => "rtl",
                'is_default' => '0',
                'status' => 'inactive',
            ],
            [
                'name' => 'Malay',
                'code' => 'ms',
                'direction' => "ltr",
                'is_default' => '0',
                'status' => 'inactive',
            ],
            [
                'name' => 'Polish',
                'code' => 'pl',
                'direction' => "ltr",
                'is_default' => '0',
                'status' => 'inactive',
            ],
            [
                'name' => 'Estonian',
                'code' => 'et',
                'direction' => "ltr",
                'is_default' => '0',
                'status' => 'inactive',
            ],
            [
                'name' => 'Persian',
                'code' => 'fa',
                'direction' => "rtl",
                'is_default' => '0',
                'status' => 'inactive',
            ],
            [
                'name' => 'Greek',
                'code' => 'gr',
                'direction' => "ltr",
                'is_default' => '0',
                'status' => 'inactive',
            ],
            [
                'name' => 'Romanian',
                'code' => 'ro',
                'direction' => "ltr",
                'is_default' => '0',
                'status' => 'inactive',
            ],
            [
                'name' => 'Russian',
                'code' => 'ru',
                'direction' => "ltr",
                'is_default' => '0',
                'status' => 'inactive',
            ],
            [
                'name' => 'Thai',
                'code' => 'th',
                'direction' => "ltr",
                'is_default' => '0',
                'status' => 'inactive',
            ],
            [
                'name' => 'Chinese CN',
                'code' => 'zh-CN',
                'direction' => "ltr",
                'is_default' => '0',
                'status' => 'inactive',
            ],
            [
                'name' => 'Chinese HK',
                'code' => 'zh-HK',
                'direction' => "ltr",
                'is_default' => '0',
                'status' => 'inactive',
            ],
            [
                'name' => 'Chinese TW',
                'code' => 'zh-TW',
                'direction' => "ltr",
                'is_default' => '0',
                'status' => 'inactive',
            ]
        ]);
    }
}
