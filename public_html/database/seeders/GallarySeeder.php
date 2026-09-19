<?php

namespace Database\Seeders;

use App\Models\Admin\Gallary;
use Illuminate\Database\Seeder;

class GallarySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Gallary::where('id', '>', '0')->delete();

        // Gallary::insertOrIgnore([
        //    'name'=>'01-logo.png',
        //    'extension'=>'image/png',
        //    'user_id'=>'1',
        //    'created_by'=>'1'
        // ]);
        // Gallary::insertOrIgnore([
        //    'name'=>'01-slider.jpg',
        //    'extension'=>'image/jpeg',
        //    'user_id'=>'1',
        //    'created_by'=>'1'
        // ]);
        // Gallary::insertOrIgnore([
        //    'name'=>'202109042527banner_270x211.jpg',
        //    'extension'=>'image/jpeg',
        //    'user_id'=>'1',
        //    'created_by'=>'1'
        // ]);
        // Gallary::insertOrIgnore([
        //    'name'=>'202109025727banner_270x229.jpg',
        //    'extension'=>'image/jpeg',
        //    'user_id'=>'1',
        //    'created_by'=>'1'
        // ]);
        // Gallary::insertOrIgnore([
        //    'name'=>'202109042309banner_271x451.jpg',
        //    'extension'=>'image/jpeg',
        //    'user_id'=>'1',
        //    'created_by'=>'1'
        // ]);
        // Gallary::insertOrIgnore([
        //    'name'=>'202109025813banner_368x550.jpg',
        //    'extension'=>'image/jpeg',
        //    'user_id'=>'1',
        //    'created_by'=>'1'
        // ]);
        // Gallary::insertOrIgnore([
        //    'name'=>'202109025823banner_370x210.jpg',
        //    'extension'=>'image/jpeg',
        //    'user_id'=>'1',
        //    'created_by'=>'1'
        // ]);
        // Gallary::insertOrIgnore([
        //    'name'=>'202109025851banner_370x220.jpg',
        //    'extension'=>'image/jpeg',
        //    'user_id'=>'1',
        //    'created_by'=>'1'
        // ]);
        // Gallary::insertOrIgnore([
        //    'name'=>'202109025909banner_370x230.jpg',
        //    'extension'=>'image/jpeg',
        //    'user_id'=>'1',
        //    'created_by'=>'1'
        // ]);
        // Gallary::insertOrIgnore([
        //    'name'=>'202109025939banner_370x230.jpg',
        //    'extension'=>'image/jpeg',
        //    'user_id'=>'1',
        //    'created_by'=>'1'
        // ]);
        // Gallary::insertOrIgnore([
        //    'name'=>'202109020219banner_370x277.jpg',
        //    'extension'=>'image/jpeg',
        //    'user_id'=>'1',
        //    'created_by'=>'1'
        // ]);
        // Gallary::insertOrIgnore([
        //    'name'=>'202109040046banner_370x493.jpg',
        //    'extension'=>'image/jpeg',
        //    'user_id'=>'1',
        //    'created_by'=>'1'
        // ]);
        // Gallary::insertOrIgnore([
        //    'name'=>'202109045900banner_372x546.jpg',
        //    'extension'=>'image/jpeg',
        //    'user_id'=>'1',
        //    'created_by'=>'1'
        // ]);
        // Gallary::insertOrIgnore([
        //    'name'=>'202109020247banner_470x210.jpg',
        //    'extension'=>'image/jpeg',
        //    'user_id'=>'1',
        //    'created_by'=>'1'
        // ]);
        // Gallary::insertOrIgnore([
        //    'name'=>'202109020336banner_470x210.jpg',
        //    'extension'=>'image/jpeg',
        //    'user_id'=>'1',
        //    'created_by'=>'1'
        // ]);
        // Gallary::insertOrIgnore([
        //    'name'=>'202109020344banner_568x298.jpg',
        //    'extension'=>'image/jpeg',
        //    'user_id'=>'1',
        //    'created_by'=>'1'
        // ]);
        // Gallary::insertOrIgnore([
        //    'name'=>'202109042006banner_570x211.jpg',
        //    'extension'=>'image/jpeg',
        //    'user_id'=>'1',
        //    'created_by'=>'1'
        // ]);
        // Gallary::insertOrIgnore([
        //    'name'=>'202109041942banner_570x451.jpg',
        //    'extension'=>'image/jpeg',
        //    'user_id'=>'1',
        //    'created_by'=>'1'
        // ]);
        // Gallary::insertOrIgnore([
        //    'name'=>'202109020413banner_570x490.jpg',
        //    'extension'=>'image/jpeg',
        //    'user_id'=>'1',
        //    'created_by'=>'1'
        // ]);
        // Gallary::insertOrIgnore([
        //    'name'=>'202109043135banner_770x259.jpg',
        //    'extension'=>'image/jpeg',
        //    'user_id'=>'1',
        //    'created_by'=>'1'
        // ]);
        // Gallary::insertOrIgnore([
        //    'name'=>'202109045938banner_770x301.jpg',
        //    'extension'=>'image/jpeg',
        //    'user_id'=>'1',
        //    'created_by'=>'1'
        // ]);
        // Gallary::insertOrIgnore([
        //    'name'=>'202109045900banner_372x546.jpg',
        //    'extension'=>'image/jpeg',
        //    'user_id'=>'1',
        //    'created_by'=>'1'
        // ]);
        // Gallary::insertOrIgnore([
        //    'name'=>'202109045938banner_770x301.jpg',
        //    'extension'=>'image/jpeg',
        //    'user_id'=>'1',
        //    'created_by'=>'1'
        // ]);
        // Gallary::insertOrIgnore([
        //    'name'=>'202109045420banner_270x229.jpg',
        //    'extension'=>'image/jpeg',
        //    'user_id'=>'1',
        //    'created_by'=>'1'
        // ]);
        // Gallary::insertOrIgnore([
        //    'name'=>'202109041942banner_570x451.jpg',
        //    'extension'=>'image/jpeg',
        //    'user_id'=>'1',
        //    'created_by'=>'1'
        // ]);
        // Gallary::insertOrIgnore([
        //    'name'=>'202109042006banner_570x211.jpg',
        //    'extension'=>'image/jpeg',
        //    'user_id'=>'1',
        //    'created_by'=>'1'
        // ]);
        // Gallary::insertOrIgnore([
        //    'name'=>'202109042527banner_270x211.jpg',
        //    'extension'=>'image/jpeg',
        //    'user_id'=>'1',
        //    'created_by'=>'1'
        // ]);
        // Gallary::insertOrIgnore([
        //    'name'=>'202109042309banner_271x451.jpg',
        //    'extension'=>'image/jpeg',
        //    'user_id'=>'1',
        //    'created_by'=>'1'
        // ]);
        // Gallary::insertOrIgnore([
        //    'name'=>'202109040046banner_370x493.jpg',
        //    'extension'=>'image/jpeg',
        //    'user_id'=>'1',
        //    'created_by'=>'1'
        // ]);
        // Gallary::insertOrIgnore([
        //    'name'=>'202109043135banner_770x259.jpg',
        //    'extension'=>'image/jpeg',
        //    'user_id'=>'1',
        //    'created_by'=>'1'
        // ]);
        // Gallary::insertOrIgnore([
        //    'name'=>'202109054227banner_370x193.jpg',
        //    'extension'=>'image/jpeg',
        //    'user_id'=>'1',
        //    'created_by'=>'1'
        // ]);
        // Gallary::insertOrIgnore([
        //    'name'=>'202109054758category900x900.jpg',
        //    'extension'=>'image/jpeg',
        //    'user_id'=>'1',
        //    'created_by'=>'1'
        // ]);
        // Gallary::insertOrIgnore([
        //    'name'=>'202109055140wUJPQ27501.png',
        //    'extension'=>'image/png',
        //    'user_id'=>'1',
        //    'created_by'=>'1'
        // ]);
        // Gallary::insertOrIgnore([
        //    'name'=>'202109050158product_1_900x900.jpg',
        //    'extension'=>'image/jpeg',
        //    'user_id'=>'1',
        //    'created_by'=>'1'
        // ]);
        // Gallary::insertOrIgnore([
        //    'name'=>'202109050215product_2_900x900.jpg',
        //    'extension'=>'image/jpeg',
        //    'user_id'=>'1',
        //    'created_by'=>'1'
        // ]);
        // Gallary::insertOrIgnore([
        //    'name'=>'202109050235product_3_900x900.jpg',
        //    'extension'=>'image/jpeg',
        //    'user_id'=>'1',
        //    'created_by'=>'1'
        // ]);
        // Gallary::insertOrIgnore([
        //    'name'=>'202109052217product_4_900x900.jpg',
        //    'extension'=>'image/jpeg',
        //    'user_id'=>'1',
        //    'created_by'=>'1'
        // ]);
        // Gallary::insertOrIgnore([
        //    'name'=>'202109052232product_5_900x900.jpg',
        //    'extension'=>'image/jpeg',
        //    'user_id'=>'1',
        //    'created_by'=>'1'
        // ]);
        // Gallary::insertOrIgnore([
        //    'name'=>'202109052248product_6_900x900.jpg',
        //    'extension'=>'image/jpeg',
        //    'user_id'=>'1',
        //    'created_by'=>'1'
        // ]);
        // Gallary::insertOrIgnore([
        //    'name'=>'202109052304product_7_900x900.jpg',
        //    'extension'=>'image/jpeg',
        //    'user_id'=>'1',
        //    'created_by'=>'1'
        // ]);
        // Gallary::insertOrIgnore([
        //    'name'=>'202109061656homebanner1600x800.jpg',
        //    'extension'=>'image/jpeg',
        //    'user_id'=>'1',
        //    'created_by'=>'1'
        // ]);
        // Gallary::insertOrIgnore([
        //    'name'=>'202109081240product_8_900x900.jpg',
        //    'extension'=>'image/jpeg',
        //    'user_id'=>'1',
        //    'created_by'=>'1'
        // ]);
        // Gallary::insertOrIgnore([
        //    'name'=>'202109081253product_9_900x900.jpg',
        //    'extension'=>'image/jpeg',
        //    'user_id'=>'1',
        //    'created_by'=>'1'
        // ]);

        \DB::table('gallary')->insert([
            0 => [
                'id' => '1',
                'name' => '01-logo.png',
                'extension' => 'image/png',
                'user_id' => '1',
                'created_by' => '1',
            ],
            1 => [
                'id' => '2',
                'name' => '01-slider.jpg',
                'extension' => 'image/jpeg',
                'user_id' => '1',
                'created_by' => '1',
            ],
            2 => [
                'id' => '3',
                'name' => '202109042527banner_270x211.jpg',
                'extension' => 'image/jpeg',
                'user_id' => '1',
                'created_by' => '1',
            ],
            3 => [
                'id' => '4',
                'name' => '202109025727banner_270x229.jpg',
                'extension' => 'image/jpeg',
                'user_id' => '1',
                'created_by' => '1',
            ],
            4 => [
                'id' => '5',
                'name' => '202109042309banner_271x451.jpg',
                'extension' => 'image/jpeg',
                'user_id' => '1',
                'created_by' => '1',
            ],
            5 => [
                'id' => '6',
                'name' => '202109025813banner_368x550.jpg',
                'extension' => 'image/jpeg',
                'user_id' => '1',
                'created_by' => '1',
            ],
            6 => [
                'id' => '7',
                'name' => '202109025823banner_370x210.jpg',
                'extension' => 'image/jpeg',
                'user_id' => '1',
                'created_by' => '1',
            ],
            7 => [
                'id' => '8',
                'name' => '202109025851banner_370x220.jpg',
                'extension' => 'image/jpeg',
                'user_id' => '1',
                'created_by' => '1',
            ],
            8 => [
                'id' => '9',
                'name' => '202109025909banner_370x230.jpg',
                'extension' => 'image/jpeg',
                'user_id' => '1',
                'created_by' => '1',
            ],
            9 => [
                'id' => '10',
                'name' => '202109025939banner_370x230.jpg',
                'extension' => 'image/jpeg',
                'user_id' => '1',
                'created_by' => '1',
            ],
            10 => [
                'id' => '11',
                'name' => '202109020219banner_370x277.jpg',
                'extension' => 'image/jpeg',
                'user_id' => '1',
                'created_by' => '1',
            ],
            11 => [
                'id' => '12',
                'name' => '202109040046banner_370x493.jpg',
                'extension' => 'image/jpeg',
                'user_id' => '1',
                'created_by' => '1',
            ],
            12 => [
                'id' => '13',
                'name' => '202109045900banner_372x546.jpg',
                'extension' => 'image/jpeg',
                'user_id' => '1',
                'created_by' => '1',
            ],
            13 => [
                'id' => '14',
                'name' => '202109020247banner_470x210.jpg',
                'extension' => 'image/jpeg',
                'user_id' => '1',
                'created_by' => '1',
            ],
            14 => [
                'id' => '15',
                'name' => '202109020336banner_470x210.jpg',
                'extension' => 'image/jpeg',
                'user_id' => '1',
                'created_by' => '1',
            ],
            15 => [
                'id' => '16',
                'name' => '202109020344banner_568x298.jpg',
                'extension' => 'image/jpeg',
                'user_id' => '1',
                'created_by' => '1',
            ],
            16 => [
                'id' => '17',
                'name' => '202109042006banner_570x211.jpg',
                'extension' => 'image/jpeg',
                'user_id' => '1',
                'created_by' => '1',
            ],
            17 => [
                'id' => '18',
                'name' => '202109041942banner_570x451.jpg',
                'extension' => 'image/jpeg',
                'user_id' => '1',
                'created_by' => '1',
            ],
            18 => [
                'id' => '19',
                'name' => '202109020413banner_570x490.jpg',
                'extension' => 'image/jpeg',
                'user_id' => '1',
                'created_by' => '1',
            ],
            19 => [
                'id' => '20',
                'name' => '202109043135banner_770x259.jpg',
                'extension' => 'image/jpeg',
                'user_id' => '1',
                'created_by' => '1',
            ],
            20 => [
                'id' => '21',
                'name' => '202109045938banner_770x301.jpg',
                'extension' => 'image/jpeg',
                'user_id' => '1',
                'created_by' => '1',
            ],
            21 => [
                'id' => '22',
                'name' => '202109045900banner_372x546.jpg',
                'extension' => 'image/jpeg',
                'user_id' => '1',
                'created_by' => '1',
            ],
            22 => [
                'id' => '23',
                'name' => '202109045938banner_770x301.jpg',
                'extension' => 'image/jpeg',
                'user_id' => '1',
                'created_by' => '1',
            ],
            23 => [
                'id' => '24',
                'name' => '202109045420banner_270x229.jpg',
                'extension' => 'image/jpeg',
                'user_id' => '1',
                'created_by' => '1',
            ],
            24 => [
                'id' => '25',
                'name' => '202109041942banner_570x451.jpg',
                'extension' => 'image/jpeg',
                'user_id' => '1',
                'created_by' => '1',
            ],
            25 => [
                'id' => '26',
                'name' => '202109042006banner_570x211.jpg',
                'extension' => 'image/jpeg',
                'user_id' => '1',
                'created_by' => '1',
            ],
            26 => [
                'id' => '27',
                'name' => '202109042527banner_270x211.jpg',
                'extension' => 'image/jpeg',
                'user_id' => '1',
                'created_by' => '1',
            ],
            27 => [
                'id' => '28',
                'name' => '202109042309banner_271x451.jpg',
                'extension' => 'image/jpeg',
                'user_id' => '1',
                'created_by' => '1',
            ],
            28 => [
                'id' => '29',
                'name' => '202109040046banner_370x493.jpg',
                'extension' => 'image/jpeg',
                'user_id' => '1',
                'created_by' => '1',
            ],
            29 => [
                'id' => '30',
                'name' => '202109043135banner_770x259.jpg',
                'extension' => 'image/jpeg',
                'user_id' => '1',
                'created_by' => '1',
            ],
            30 => [
                'id' => '31',
                'name' => '202109054227banner_370x193.jpg',
                'extension' => 'image/jpeg',
                'user_id' => '1',
                'created_by' => '1',
            ],
            31 => [
                'id' => '32',
                'name' => '202109054758category900x900.jpg',
                'extension' => 'image/jpeg',
                'user_id' => '1',
                'created_by' => '1',
            ],
            32 => [
                'id' => '33',
                'name' => '202109055140wUJPQ27501.png',
                'extension' => 'image/png',
                'user_id' => '1',
                'created_by' => '1',
            ],
            33 => [
                'id' => '34',
                'name' => '202109050158product_1_900x900.jpg',
                'extension' => 'image/jpeg',
                'user_id' => '1',
                'created_by' => '1',
            ],
            34 => [
                'id' => '35',
                'name' => '202109050215product_2_900x900.jpg',
                'extension' => 'image/jpeg',
                'user_id' => '1',
                'created_by' => '1',
            ],
            35 => [
                'id' => '36',
                'name' => '202109050235product_3_900x900.jpg',
                'extension' => 'image/jpeg',
                'user_id' => '1',
                'created_by' => '1',
            ],
            36 => [
                'id' => '37',
                'name' => '202109052217product_4_900x900.jpg',
                'extension' => 'image/jpeg',
                'user_id' => '1',
                'created_by' => '1',
            ],
            37 => [
                'id' => '38',
                'name' => '202109052232product_5_900x900.jpg',
                'extension' => 'image/jpeg',
                'user_id' => '1',
                'created_by' => '1',
            ],
            38 => [
                'id' => '39',
                'name' => '202109052248product_6_900x900.jpg',
                'extension' => 'image/jpeg',
                'user_id' => '1',
                'created_by' => '1',
            ],
            39 => [
                'id' => '40',
                'name' => '202109052304product_7_900x900.jpg',
                'extension' => 'image/jpeg',
                'user_id' => '1',
                'created_by' => '1',
            ],
            40 => [
                'id' => '41',
                'name' => '202109061656homebanner1600x800.jpg',
                'extension' => 'image/jpeg',
                'user_id' => '1',
                'created_by' => '1',
            ],
            41 => [
                'id' => '42',
                'name' => '202109081240product_8_900x900.jpg',
                'extension' => 'image/jpeg',
                'user_id' => '1',
                'created_by' => '1',
            ],
            42 => [
                'id' => '43',
                'name' => '202109081253product_9_900x900.jpg',
                'extension' => 'image/jpeg',
                'user_id' => '1',
                'created_by' => '1',
            ],
            43 => [
                'id' => '44',
                'name' => '202205244413furniture-bg.jpg',
                'extension' => 'image/jpeg',
                'user_id' => '1',
                'created_by' => '1',
            ],
            44 => [
                'id' => '45',
                'name' => '202205244452banner_image_1.png',
                'extension' => 'image/png',
                'user_id' => '1',
                'created_by' => '1',
            ],
            45 => [
                'id' => '46',
                'name' => '202205244454banner_image_2.png',
                'extension' => 'image/png',
                'user_id' => '1',
                'created_by' => '1',
            ],
            46 => [
                'id' => '47',
                'name' => '202205244457banner_image_3.png',
                'extension' => 'image/png',
                'user_id' => '1',
                'created_by' => '1',
            ],
            47 => [
                'id' => '48',
                'name' => '202205240437fullwidthbanner.jpg',
                'extension' => 'image/jpeg',
                'user_id' => '1',
                'created_by' => '1',
            ],
            48 => [
                'id' => '49',
                'name' => '202205240500fullwidthbanner.jpg',
                'extension' => 'image/jpeg',
                'user_id' => '1',
                'created_by' => '1',
            ],
            49 => [
                'id' => '50',
                'name' => '202205240651profile1.png',
                'extension' => 'image/png',
                'user_id' => '1',
                'created_by' => '1',
            ],
            50 => [
                'id' => '51',
                'name' => '202205240910cate-05.jpg',
                'extension' => 'image/jpeg',
                'user_id' => '1',
                'created_by' => '1',
            ],
            51 => [
                'id' => '52',
                'name' => '202205241013banner-01.jpg',
                'extension' => 'image/jpeg',
                'user_id' => '1',
                'created_by' => '1',
            ],
            52 => [
                'id' => '53',
                'name' => '202205241015banner-02.jpg',
                'extension' => 'image/jpeg',
                'user_id' => '1',
                'created_by' => '1',
            ],
            53 => [
                'id' => '54',
                'name' => '202205241020cate-01.jpg',
                'extension' => 'image/jpeg',
                'user_id' => '1',
                'created_by' => '1',
            ],
            54 => [
                'id' => '55',
                'name' => '202205241022cate-02.jpg',
                'extension' => 'image/jpeg',
                'user_id' => '1',
                'created_by' => '1',
            ],
            55 => [
                'id' => '56',
                'name' => '202205241025cate-03.jpg',
                'extension' => 'image/jpeg',
                'user_id' => '1',
                'created_by' => '1',
            ],
            56 => [
                'id' => '57',
                'name' => '202205241027cate-04.jpg',
                'extension' => 'image/jpeg',
                'user_id' => '1',
                'created_by' => '1',
            ],
            57 => [
                'id' => '58',
                'name' => '202205241136offers-1.png',
                'extension' => 'image/png',
                'user_id' => '1',
                'created_by' => '1',
            ],
            58 => [
                'id' => '59',
                'name' => '202205241138offers-2.png',
                'extension' => 'image/png',
                'user_id' => '1',
                'created_by' => '1',
            ],
            59 => [
                'id' => '60',
                'name' => '202205241141offers-3.png',
                'extension' => 'image/png',
                'user_id' => '1',
                'created_by' => '1',
            ],
            60 => [
                'id' => '61',
                'name' => '202205241301bg-paralax.jpg',
                'extension' => 'image/jpeg',
                'user_id' => '1',
                'created_by' => '1',
            ],
            61 => [
                'id' => '62',
                'name' => '202205241457Flower-banner1.jpg',
                'extension' => 'image/jpeg',
                'user_id' => '1',
                'created_by' => '1',
            ],
            62 => [
                'id' => '63',
                'name' => '202205241459Flower-banner2.jpg',
                'extension' => 'image/jpeg',
                'user_id' => '1',
                'created_by' => '1',
            ],
            63 => [
                'id' => '64',
                'name' => '202205241501paralax.jpg',
                'extension' => 'image/jpeg',
                'user_id' => '1',
                'created_by' => '1',
            ],
            64 => [
                'id' => '65',
                'name' => '202205241535banner7.jpg',
                'extension' => 'image/jpeg',
                'user_id' => '1',
                'created_by' => '1',
            ],
            65 => [
                'id' => '66',
                'name' => '202205241538big-img07.jpg',
                'extension' => 'image/jpeg',
                'user_id' => '1',
                'created_by' => '1',
            ],
            66 => [
                'id' => '67',
                'name' => '202205241541cate-banner1.jpg',
                'extension' => 'image/jpeg',
                'user_id' => '1',
                'created_by' => '1',
            ],
            67 => [
                'id' => '68',
                'name' => '202205241543cate-banner3.jpg',
                'extension' => 'image/jpeg',
                'user_id' => '1',
                'created_by' => '1',
            ],
            68 => [
                'id' => '69',
                'name' => '202205241614element-banner5-center.jpg',
                'extension' => 'image/jpeg',
                'user_id' => '1',
                'created_by' => '1',
            ],
            69 => [
                'id' => '70',
                'name' => '202205241735look1.jpg',
                'extension' => 'image/jpeg',
                'user_id' => '1',
                'created_by' => '1',
            ],
            70 => [
                'id' => '71',
                'name' => '202205241741look2.jpg',
                'extension' => 'image/jpeg',
                'user_id' => '1',
                'created_by' => '1',
            ],
            71 => [
                'id' => '72',
                'name' => '202205241744look3.jpg',
                'extension' => 'image/jpeg',
                'user_id' => '1',
                'created_by' => '1',
            ],
            72 => [
                'id' => '73',
                'name' => '202205241811banner2.jpg',
                'extension' => 'image/jpeg',
                'user_id' => '1',
                'created_by' => '1',
            ],
            73 => [
                'id' => '74',
                'name' => '202205241816banner3.jpg',
                'extension' => 'image/jpeg',
                'user_id' => '1',
                'created_by' => '1',
            ],
            74 => [
                'id' => '75',
                'name' => '202205241135paralex.jpg',
                'extension' => 'image/jpeg',
                'user_id' => '1',
                'created_by' => '1',
            ],
            75 => [
                'id' => '76',
                'name' => '202205240154Slider_01_01.jpg',
                'extension' => 'image/jpeg',
                'user_id' => '1',
                'created_by' => '1',
            ],
            76 => [
                'id' => '77',
                'name' => '202205240156Slider_01_02.jpg',
                'extension' => 'image/jpeg',
                'user_id' => '1',
                'created_by' => '1',
            ],
            77 => [
                'id' => '78',
                'name' => '202205240158Slider_01_03.jpg',
                'extension' => 'image/jpeg',
                'user_id' => '1',
                'created_by' => '1',
            ],
            78 => [
                'id' => '79',
                'name' => '202205240224Slider_01_01.jpg',
                'extension' => 'image/jpeg',
                'user_id' => '1',
                'created_by' => '1',
            ],
            79 => [
                'id' => '80',
                'name' => '202205240227Slider_01_02.jpg',
                'extension' => 'image/jpeg',
                'user_id' => '1',
                'created_by' => '1',
            ],
            80 => [
                'id' => '81',
                'name' => '202205240228Slider_01_01.jpg',
                'extension' => 'image/jpeg',
                'user_id' => '1',
                'created_by' => '1',
            ],
            81 => [
                'id' => '82',
                'name' => '202205240229Slider_01_03.jpg',
                'extension' => 'image/jpeg',
                'user_id' => '1',
                'created_by' => '1',
            ],
            82 => [
                'id' => '83',
                'name' => '202205240233Slider_01_02.jpg',
                'extension' => 'image/jpeg',
                'user_id' => '1',
                'created_by' => '1',
            ],
            83 => [
                'id' => '84',
                'name' => '202205240235Slider_01_03.jpg',
                'extension' => 'image/jpeg',
                'user_id' => '1',
                'created_by' => '1',
            ],
            84 => [
                'id' => '85',
                'name' => '202205240256Slider_01_01.jpg',
                'extension' => 'image/jpeg',
                'user_id' => '1',
                'created_by' => '1',
            ],
            85 => [
                'id' => '86',
                'name' => '202205240259Slider_01_02.jpg',
                'extension' => 'image/jpeg',
                'user_id' => '1',
                'created_by' => '1',
            ],
            86 => [
                'id' => '87',
                'name' => '202205240301Slider_01_03.jpg',
                'extension' => 'image/jpeg',
                'user_id' => '1',
                'created_by' => '1',
            ],
            87 => [
                'id' => '88',
                'name' => '202205240324Slider_01_01.jpg',
                'extension' => 'image/jpeg',
                'user_id' => '1',
                'created_by' => '1',
            ],
            88 => [
                'id' => '89',
                'name' => '202205240327Slider_01_02.jpg',
                'extension' => 'image/jpeg',
                'user_id' => '1',
                'created_by' => '1',
            ],
            89 => [
                'id' => '90',
                'name' => '202205240330Slider_01_03.jpg',
                'extension' => 'image/jpeg',
                'user_id' => '1',
                'created_by' => '1',
            ],
            90 => [
                'id' => '91',
                'name' => '202205240403Slider_01_01.jpg',
                'extension' => 'image/jpeg',
                'user_id' => '1',
                'created_by' => '1',
            ],
            91 => [
                'id' => '92',
                'name' => '202205240405Slider_01_02.jpg',
                'extension' => 'image/jpeg',
                'user_id' => '1',
                'created_by' => '1',
            ],
            92 => [
                'id' => '93',
                'name' => '202205240408Slider_01_03.jpg',
                'extension' => 'image/jpeg',
                'user_id' => '1',
                'created_by' => '1',
            ],
            93 => [
                'id' => '94',
                'name' => '202205240428Slider_01_01.jpg',
                'extension' => 'image/jpeg',
                'user_id' => '1',
                'created_by' => '1',
            ],
            94 => [
                'id' => '95',
                'name' => '202205240433Slider_01_02.jpg',
                'extension' => 'image/jpeg',
                'user_id' => '1',
                'created_by' => '1',
            ],
            95 => [
                'id' => '96',
                'name' => '202205240436Slider_01_03.jpg',
                'extension' => 'image/jpeg',
                'user_id' => '1',
                'created_by' => '1',
            ],
            96 => [
                'id' => '97',
                'name' => '202205240459Slider_01_01.jpg',
                'extension' => 'image/jpeg',
                'user_id' => '1',
                'created_by' => '1',
            ],
            97 => [
                'id' => '98',
                'name' => '202205240503Slider_01_02.jpg',
                'extension' => 'image/jpeg',
                'user_id' => '1',
                'created_by' => '1',
            ],
            98 => [
                'id' => '99',
                'name' => '202205240506Slider_01_03.jpg',
                'extension' => 'image/jpeg',
                'user_id' => '1',
                'created_by' => '1',
            ],
            99 => [
                'id' => '100',
                'name' => '202205240528Slider_01_01.jpg',
                'extension' => 'image/jpeg',
                'user_id' => '1',
                'created_by' => '1',
            ],
            100 => [
                'id' => '101',
                'name' => '202205240533Slider_01_02.jpg',
                'extension' => 'image/jpeg',
                'user_id' => '1',
                'created_by' => '1',
            ],
            101 => [
                'id' => '102',
                'name' => '202205240536Slider_01_03.jpg',
                'extension' => 'image/jpeg',
                'user_id' => '1',
                'created_by' => '1',
            ],
            102 => [
                'id' => '103',
                'name' => '202205240601Slider_01_01.jpg',
                'extension' => 'image/jpeg',
                'user_id' => '1',
                'created_by' => '1',
            ],
            103 => [
                'id' => '104',
                'name' => '202205240604Slider_01_02.jpg',
                'extension' => 'image/jpeg',
                'user_id' => '1',
                'created_by' => '1',
            ],
            104 => [
                'id' => '105',
                'name' => '202205240631Slider_01_01.jpg',
                'extension' => 'image/jpeg',
                'user_id' => '1',
                'created_by' => '1',
            ],
            105 => [
                'id' => '106',
                'name' => '202205240633Slider_01_02.jpg',
                'extension' => 'image/jpeg',
                'user_id' => '1',
                'created_by' => '1',
            ],
        ]);

    }
}
