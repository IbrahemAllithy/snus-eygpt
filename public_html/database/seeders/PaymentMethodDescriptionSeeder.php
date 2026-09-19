<?php

namespace Database\Seeders;

use App\Models\Admin\PaymentMethodDescription;
use Illuminate\Database\Seeder;

class PaymentMethodDescriptionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        PaymentMethodDescription::where('id', '>', '0')->delete();
        PaymentMethodDescription::insertOrIgnore([
            'payment_method_id' => 1,
            'language_id' => 1,
            'name' => 'Braintree',
            'sub_name_1' => 'Braintree',
            'sub_name_2' => 'Braintree',
        ]);
    }
}
