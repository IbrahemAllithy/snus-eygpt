<?php

namespace Database\Seeders;

use App\Models\Admin\Customer;
use App\Services\Admin\AccountService;
use Illuminate\Database\Seeder;

class CustomerTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Customer::where('id', '>', '0')->delete();
        $customer = Customer::create([
            'first_name' => 'default',
            'last_name' => 'pos customer',
            'email' => 'default-pos-customer@email.com',
            'phone_number' => '00000000',
            'gallary_id' => '1',
            'password' => \Hash::make('123'),
            'is_seen' => '1',
            'password' => 'active',
        ]);

        $accounts = new AccountService;
        $accounts->createAccount('CUSTOMER', 'default pos customer', $customer->id, 'customer');
    }
}
