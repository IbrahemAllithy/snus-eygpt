<?php

namespace Database\Seeders;

use App\Models\Admin\Attribute;
use App\Models\Admin\AttributeDetail;
use Illuminate\Database\Seeder;

class AttributeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Attribute::where('id', '>', '0')->delete();
        Attribute::insertOrIgnore(
            [
                'created_by' => 1,
                'updated_by' => 1,
            ]
        );

        AttributeDetail::insertOrIgnore(
            [
                'attribute_id' => 1,
                'language_id' => 1,
                'name' => 'Size',
            ]
        );

        AttributeDetail::insertOrIgnore(
            [
                'attribute_id' => 1,
                'language_id' => 2,
                'name' => 'مقاس',
            ]
        );

        Attribute::insertOrIgnore(
            [
                'created_by' => 1,
                'updated_by' => 1,
            ]
        );
        AttributeDetail::insertOrIgnore(
            [
                'attribute_id' => 2,
                'language_id' => 1,
                'name' => 'Color',
            ]
        );

        AttributeDetail::insertOrIgnore(
            [
                'attribute_id' => 2,
                'language_id' => 2,
                'name' => 'اللون',
            ]
        );
    }
}
