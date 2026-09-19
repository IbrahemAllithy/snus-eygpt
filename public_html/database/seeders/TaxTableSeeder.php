<?php

namespace Database\Seeders;

use App\Models\Admin\Tax;
use App\Services\Admin\AccountService;
use Illuminate\Database\Seeder;

class TaxTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Tax::where('id', '>', '0')->delete();
        $tax = Tax::create([
            'title' => 'GST',
            'description' => 'GST',
            'created_by' => 1,
        ]
        );
        $accounts = new AccountService;
        $accounts->createAccount('accountpayable', 'GST', $tax->id, 'tax');

    }
}
