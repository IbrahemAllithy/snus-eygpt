<?php

namespace Database\Seeders;

use App\Models\Admin\State;
use Illuminate\Database\Seeder;

class StatesTableSeeder extends Seeder
{
    /**
     * Auto generated seed file
     */
    public function run(): void
    {

        State::where('id', '>', '0')->delete();
        $file = fopen(public_path('state.csv'), 'r');
        while (($data = fgetcsv($file, 0, ',')) !== false) {
            State::insertOrIgnore(
                [
                    'id' => $data[0],
                    'country_id' => $data[2],
                    'name' => $data[1],
                ]
            );

        }
        fclose($file);

    }
}
