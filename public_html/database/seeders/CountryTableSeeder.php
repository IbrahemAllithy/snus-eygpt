<?php

namespace Database\Seeders;

use App\Models\Admin\Country;
use Illuminate\Database\Seeder;

class CountryTableSeeder extends Seeder
{
    /**
     * Auto generated seed file
     */
    public function run(): void
    {

        Country::where('id', '>', '0')->delete();
        $file = fopen(public_path('country.csv'), 'r');
        $i = 1;
        while (($data = fgetcsv($file, 0, ',')) !== false) {
            if ($i == 233)
            {
                Country::insertOrIgnore(
                    [
                        'id' => $data[0],
                        'name' => $data[1],
                        'iso_code_2' => $data[2],
                        'iso_code_3' => $data[3],
                        'address_format_id' => $data[4],
                        'country_code' => $data[5],
                        'status' => 'active'
                    ],
                );
            } else {
                Country::insertOrIgnore(
                    [
                        'id' => $data[0],
                        'name' => $data[1],
                        'iso_code_2' => $data[2],
                        'iso_code_3' => $data[3],
                        'address_format_id' => $data[4],
                        'country_code' => $data[5],
                    ],
                );
            }    
            $i++;
        }
        fclose($file);

    }
}
