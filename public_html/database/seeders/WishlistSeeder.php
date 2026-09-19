<?php

namespace Database\Seeders;

use App\Models\Web\Wishlist;
use Illuminate\Database\Seeder;

class WishlistSeeder extends Seeder
{
    /**
     * Auto generated seed file
     */
    public function run(): void
    {

        Wishlist::where('id', '>', '0')->delete();

    }
}
