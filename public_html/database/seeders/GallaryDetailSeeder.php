<?php

namespace Database\Seeders;

use App\Models\Admin\GallaryDetail;
use Illuminate\Database\Seeder;

class GallaryDetailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        GallaryDetail::where('id', '>', '0')->delete();
        //   GallaryDetail::insertOrIgnore([
        //       'gallary_id'=>'1',
        //       'gallary_type'=>'large',
        //       'height'=>'900',
        //       'width'=>'900',
        //       'path'=>'/gallary/01-largelogo.png',

        //    ]);
        //    GallaryDetail::insertOrIgnore([
        //       'gallary_id'=>'1',
        //       'gallary_type'=>'medium',
        //       'height'=>'600',
        //       'width'=>'600',
        //       'path'=>'/gallary/01-mediumlogo.png',

        //    ]);
        //    GallaryDetail::insertOrIgnore([
        //       'gallary_id'=>'1',
        //       'gallary_type'=>'thumbnail',
        //       'height'=>'400',
        //       'width'=>'400',
        //       'path'=>'/gallary/01-thumbnaillogo.png',

        //    ]);
        //    GallaryDetail::insertOrIgnore([
        //       'gallary_id'=>'2',
        //       'gallary_type'=>'large',
        //       'height'=>'900',
        //       'width'=>'900',
        //       'path'=>'/gallary/large01-slider.jpg',

        //    ]);
        //    GallaryDetail::insertOrIgnore([
        //       'gallary_id'=>'2',
        //       'gallary_type'=>'medium',
        //       'height'=>'600',
        //       'width'=>'600',
        //       'path'=>'/gallary/medium01-slider.jpg',

        //    ]);
        //    GallaryDetail::insertOrIgnore([
        //       'gallary_id'=>'2',
        //       'gallary_type'=>'thumbnail',
        //       'height'=>'400',
        //       'width'=>'400',
        //       'path'=>'/gallary/thumbnail01-slider.jpg',

        //    ]);
        //    GallaryDetail::insertOrIgnore([
        //       'gallary_id'=>'3',
        //       'gallary_type'=>'large',
        //       'height'=>'900',
        //       'width'=>'900',
        //       'path'=>'/gallary/large202109042527banner_270x211.jpg',

        //    ]);
        //    GallaryDetail::insertOrIgnore([
        //       'gallary_id'=>'3',
        //       'gallary_type'=>'medium',
        //       'height'=>'600',
        //       'width'=>'600',
        //       'path'=>'/gallary/medium202109042527banner_270x211.jpg',

        //    ]);
        //    GallaryDetail::insertOrIgnore([
        //       'gallary_id'=>'3',
        //       'gallary_type'=>'thumbnail',
        //       'height'=>'400',
        //       'width'=>'400',
        //       'path'=>'/gallary/thumbnail202109042527banner_270x211.jpg',

        //    ]);
        //    GallaryDetail::insertOrIgnore([
        //       'gallary_id'=>'4',
        //       'gallary_type'=>'large',
        //       'height'=>'900',
        //       'width'=>'900',
        //       'path'=>'/gallary/large202109025727banner_270x229.jpg',

        //    ]);
        //    GallaryDetail::insertOrIgnore([
        //       'gallary_id'=>'4',
        //       'gallary_type'=>'medium',
        //       'height'=>'600',
        //       'width'=>'600',
        //       'path'=>'/gallary/medium202109025727banner_270x229.jpg',

        //    ]);
        //    GallaryDetail::insertOrIgnore([
        //       'gallary_id'=>'4',
        //       'gallary_type'=>'thumbnail',
        //       'height'=>'600',
        //       'width'=>'600',
        //       'path'=>'/gallary/thumbnail202109025727banner_270x229.jpg',

        //    ]);
        //    GallaryDetail::insertOrIgnore([
        //       'gallary_id'=>'5',
        //       'gallary_type'=>'large',
        //       'height'=>'900',
        //       'width'=>'900',
        //       'path'=>'/gallary/large202109042309banner_271x451.jpg',

        //    ]);
        //    GallaryDetail::insertOrIgnore([
        //       'gallary_id'=>'5',
        //       'gallary_type'=>'medium',
        //       'height'=>'600',
        //       'width'=>'600',
        //       'path'=>'/gallary/medium202109042309banner_271x451.jpg',

        //    ]);
        //    GallaryDetail::insertOrIgnore([
        //       'gallary_id'=>'5',
        //       'gallary_type'=>'thumbnail',
        //       'height'=>'400',
        //       'width'=>'400',
        //       'path'=>'/gallary/thumbnail202109042309banner_271x451.jpg',

        //    ]);
        //    GallaryDetail::insertOrIgnore([
        //       'gallary_id'=>'6',
        //       'gallary_type'=>'large',
        //       'height'=>'900',
        //       'width'=>'900',
        //       'path'=>'/gallary/large202109025813banner_368x550.jpg',

        //    ]);
        //    GallaryDetail::insertOrIgnore([
        //       'gallary_id'=>'6',
        //       'gallary_type'=>'medium',
        //       'height'=>'600',
        //       'width'=>'600',
        //       'path'=>'/gallary/medium202109025813banner_368x550.jpg',

        //    ]);
        //    GallaryDetail::insertOrIgnore([
        //       'gallary_id'=>'6',
        //       'gallary_type'=>'thumbnail',
        //       'height'=>'400',
        //       'width'=>'400',
        //       'path'=>'/gallary/thumbnail202109025813banner_368x550.jpg',

        //    ]);
        //    GallaryDetail::insertOrIgnore([
        //       'gallary_id'=>'7',
        //       'gallary_type'=>'large',
        //       'height'=>'900',
        //       'width'=>'900',
        //       'path'=>'/gallary/large202109025823banner_370x210.jpg',

        //    ]);
        //    GallaryDetail::insertOrIgnore([
        //       'gallary_id'=>'7',
        //       'gallary_type'=>'medium',
        //       'height'=>'600',
        //       'width'=>'600',
        //       'path'=>'/gallary/medium202109025823banner_370x210.jpg',

        //    ]);
        //    GallaryDetail::insertOrIgnore([
        //       'gallary_id'=>'7',
        //       'gallary_type'=>'thumbnail',
        //       'height'=>'400',
        //       'width'=>'400',
        //       'path'=>'/gallary/thumbnail202109025823banner_370x210.jpg',

        //    ]);
        //    GallaryDetail::insertOrIgnore([
        //       'gallary_id'=>'8',
        //       'gallary_type'=>'large',
        //       'height'=>'900',
        //       'width'=>'900',
        //       'path'=>'/gallary/large202109025851banner_370x220.jpg',

        //    ]);
        //    GallaryDetail::insertOrIgnore([
        //       'gallary_id'=>'8',
        //       'gallary_type'=>'medium',
        //       'height'=>'600',
        //       'width'=>'600',
        //       'path'=>'/gallary/medium202109025851banner_370x220.jpg',

        //    ]);
        //    GallaryDetail::insertOrIgnore([
        //       'gallary_id'=>'8',
        //       'gallary_type'=>'thumbnail',
        //       'height'=>'400',
        //       'width'=>'400',
        //       'path'=>'/gallary/thumbnail202109025851banner_370x220.jpg',

        //    ]);
        //    GallaryDetail::insertOrIgnore([
        //       'gallary_id'=>'9',
        //       'gallary_type'=>'large',
        //       'height'=>'900',
        //       'width'=>'900',
        //       'path'=>'/gallary/large202109025909banner_370x230.jpg',

        //    ]);
        //    GallaryDetail::insertOrIgnore([
        //       'gallary_id'=>'9',
        //       'gallary_type'=>'medium',
        //       'height'=>'600',
        //       'width'=>'600',
        //       'path'=>'/gallary/medium202109025909banner_370x230.jpg',

        //    ]);
        //    GallaryDetail::insertOrIgnore([
        //       'gallary_id'=>'9',
        //       'gallary_type'=>'thumbnail',
        //       'height'=>'400',
        //       'width'=>'400',
        //       'path'=>'/gallary/thumbnail202109025909banner_370x230.jpg',

        //    ]);
        //    GallaryDetail::insertOrIgnore([
        //       'gallary_id'=>'10',
        //       'gallary_type'=>'large',
        //       'height'=>'900',
        //       'width'=>'900',
        //       'path'=>'/gallary/large202109025939banner_370x230.jpg',

        //    ]);
        //    GallaryDetail::insertOrIgnore([
        //       'gallary_id'=>'10',
        //       'gallary_type'=>'medium',
        //       'height'=>'600',
        //       'width'=>'600',
        //       'path'=>'/gallary/medium202109025939banner_370x230.jpg',

        //    ]);
        //    GallaryDetail::insertOrIgnore([
        //       'gallary_id'=>'10',
        //       'gallary_type'=>'thumbnail',
        //       'height'=>'400',
        //       'width'=>'400',
        //       'path'=>'/gallary/thumbnail202109025939banner_370x230.jpg',

        //    ]);
        //    GallaryDetail::insertOrIgnore([
        //       'gallary_id'=>'11',
        //       'gallary_type'=>'large',
        //       'height'=>'900',
        //       'width'=>'900',
        //       'path'=>'/gallary/large202109020219banner_370x277.jpg',

        //    ]);
        //    GallaryDetail::insertOrIgnore([
        //       'gallary_id'=>'11',
        //       'gallary_type'=>'medium',
        //       'height'=>'600',
        //       'width'=>'600',
        //       'path'=>'/gallary/medium202109020219banner_370x277.jpg',

        //    ]);
        //    GallaryDetail::insertOrIgnore([
        //       'gallary_id'=>'11',
        //       'gallary_type'=>'thumbnail',
        //       'height'=>'400',
        //       'width'=>'400',
        //       'path'=>'/gallary/thumbnail202109020219banner_370x277.jpg',

        //    ]);
        //    GallaryDetail::insertOrIgnore([
        //       'gallary_id'=>'12',
        //       'gallary_type'=>'large',
        //       'height'=>'900',
        //       'width'=>'900',
        //       'path'=>'/gallary/large202109040046banner_370x493.jpg',

        //    ]);
        //    GallaryDetail::insertOrIgnore([
        //       'gallary_id'=>'12',
        //       'gallary_type'=>'medium',
        //       'height'=>'600',
        //       'width'=>'600',
        //       'path'=>'/gallary/medium202109040046banner_370x493.jpg',

        //    ]);
        //    GallaryDetail::insertOrIgnore([
        //       'gallary_id'=>'12',
        //       'gallary_type'=>'thumbnail',
        //       'height'=>'400',
        //       'width'=>'400',
        //       'path'=>'/gallary/thumbnail202109040046banner_370x493.jpg',

        //    ]);
        //    GallaryDetail::insertOrIgnore([
        //       'gallary_id'=>'13',
        //       'gallary_type'=>'large',
        //       'height'=>'900',
        //       'width'=>'900',
        //       'path'=>'/gallary/large202109045900banner_372x546.jpg',

        //    ]);
        //    GallaryDetail::insertOrIgnore([
        //       'gallary_id'=>'13',
        //       'gallary_type'=>'medium',
        //       'height'=>'600',
        //       'width'=>'600',
        //       'path'=>'/gallary/medium202109045900banner_372x546.jpg',

        //    ]);
        //    GallaryDetail::insertOrIgnore([
        //       'gallary_id'=>'13',
        //       'gallary_type'=>'thumbnail',
        //       'height'=>'400',
        //       'width'=>'400',
        //       'path'=>'/gallary/thumbnail202109045900banner_372x546.jpg',

        //    ]);
        //    GallaryDetail::insertOrIgnore([
        //       'gallary_id'=>'14',
        //       'gallary_type'=>'large',
        //       'height'=>'900',
        //       'width'=>'900',
        //       'path'=>'/gallary/large202109020247banner_470x210.jpg',

        //    ]);
        //    GallaryDetail::insertOrIgnore([
        //       'gallary_id'=>'14',
        //       'gallary_type'=>'medium',
        //       'height'=>'600',
        //       'width'=>'600',
        //       'path'=>'/gallary/medium202109020247banner_470x210.jpg',

        //    ]);
        //    GallaryDetail::insertOrIgnore([
        //       'gallary_id'=>'14',
        //       'gallary_type'=>'thumbnail',
        //       'height'=>'400',
        //       'width'=>'400',
        //       'path'=>'/gallary/thumbnail202109020247banner_470x210.jpg',

        //    ]);
        //    GallaryDetail::insertOrIgnore([
        //       'gallary_id'=>'15',
        //       'gallary_type'=>'large',
        //       'height'=>'900',
        //       'width'=>'900',
        //       'path'=>'/gallary/large202109020336banner_470x210.jpg',

        //    ]);
        //    GallaryDetail::insertOrIgnore([
        //       'gallary_id'=>'15',
        //       'gallary_type'=>'medium',
        //       'height'=>'600',
        //       'width'=>'600',
        //       'path'=>'/gallary/medium202109020336banner_470x210.jpg',

        //    ]);
        //    GallaryDetail::insertOrIgnore([
        //       'gallary_id'=>'15',
        //       'gallary_type'=>'thumbnail',
        //       'height'=>'400',
        //       'width'=>'400',
        //       'path'=>'/gallary/thumbnail202109020336banner_470x210.jpg',

        //    ]);
        //    GallaryDetail::insertOrIgnore([
        //       'gallary_id'=>'16',
        //       'gallary_type'=>'large',
        //       'height'=>'900',
        //       'width'=>'900',
        //       'path'=>'/gallary/large202109020344banner_568x298.jpg',

        //    ]);
        //    GallaryDetail::insertOrIgnore([
        //       'gallary_id'=>'16',
        //       'gallary_type'=>'medium',
        //       'height'=>'600',
        //       'width'=>'600',
        //       'path'=>'/gallary/medium202109020344banner_568x298.jpg',

        //    ]);
        //    GallaryDetail::insertOrIgnore([
        //       'gallary_id'=>'16',
        //       'gallary_type'=>'thumbnail',
        //       'height'=>'400',
        //       'width'=>'400',
        //       'path'=>'/gallary/thumbnail202109020344banner_568x298.jpg',

        //    ]);
        //    GallaryDetail::insertOrIgnore([
        //       'gallary_id'=>'17',
        //       'gallary_type'=>'large',
        //       'height'=>'900',
        //       'width'=>'900',
        //       'path'=>'/gallary/large202109042006banner_570x211.jpg',

        //    ]);
        //    GallaryDetail::insertOrIgnore([
        //       'gallary_id'=>'17',
        //       'gallary_type'=>'medium',
        //       'height'=>'600',
        //       'width'=>'600',
        //       'path'=>'/gallary/medium202109042006banner_570x211.jpg',

        //    ]);
        //    GallaryDetail::insertOrIgnore([
        //       'gallary_id'=>'17',
        //       'gallary_type'=>'thumbnail',
        //       'height'=>'400',
        //       'width'=>'400',
        //       'path'=>'/gallary/thumbnail202109042006banner_570x211.jpg',

        //    ]);
        //    GallaryDetail::insertOrIgnore([
        //       'gallary_id'=>'18',
        //       'gallary_type'=>'large',
        //       'height'=>'900',
        //       'width'=>'900',
        //       'path'=>'/gallary/large202109041942banner_570x451.jpg',

        //    ]);
        //    GallaryDetail::insertOrIgnore([
        //       'gallary_id'=>'18',
        //       'gallary_type'=>'medium',
        //       'height'=>'600',
        //       'width'=>'600',
        //       'path'=>'/gallary/medium202109041942banner_570x451.jpg',

        //    ]);
        //    GallaryDetail::insertOrIgnore([
        //       'gallary_id'=>'18',
        //       'gallary_type'=>'thumbnail',
        //       'height'=>'400',
        //       'width'=>'400',
        //       'path'=>'/gallary/thumbnail202109041942banner_570x451.jpg',

        //    ]);
        //    GallaryDetail::insertOrIgnore([
        //       'gallary_id'=>'19',
        //       'gallary_type'=>'large',
        //       'height'=>'900',
        //       'width'=>'900',
        //       'path'=>'/gallary/large202109020413banner_570x490.jpg',

        //    ]);
        //    GallaryDetail::insertOrIgnore([
        //       'gallary_id'=>'19',
        //       'gallary_type'=>'medium',
        //       'height'=>'600',
        //       'width'=>'600',
        //       'path'=>'/gallary/medium202109020413banner_570x490.jpg',

        //    ]);
        //    GallaryDetail::insertOrIgnore([
        //       'gallary_id'=>'19',
        //       'gallary_type'=>'thumbnail',
        //       'height'=>'400',
        //       'width'=>'400',
        //       'path'=>'/gallary/thumbnail202109020413banner_570x490.jpg',

        //    ]);
        //    GallaryDetail::insertOrIgnore([
        //       'gallary_id'=>'20',
        //       'gallary_type'=>'large',
        //       'height'=>'900',
        //       'width'=>'900',
        //       'path'=>'/gallary/large202109043135banner_770x259.jpg',

        //    ]);
        //    GallaryDetail::insertOrIgnore([
        //       'gallary_id'=>'20',
        //       'gallary_type'=>'medium',
        //       'height'=>'600',
        //       'width'=>'600',
        //       'path'=>'/gallary/medium202109043135banner_770x259.jpg',

        //    ]);
        //    GallaryDetail::insertOrIgnore([
        //       'gallary_id'=>'20',
        //       'gallary_type'=>'thumbnail',
        //       'height'=>'400',
        //       'width'=>'400',
        //       'path'=>'/gallary/thumbnail202109043135banner_770x259.jpg',

        //    ]);
        //    GallaryDetail::insertOrIgnore([
        //       'gallary_id'=>'21',
        //       'gallary_type'=>'large',
        //       'height'=>'900',
        //       'width'=>'900',
        //       'path'=>'/gallary/large202109045938banner_770x301.jpg',

        //    ]);
        //    GallaryDetail::insertOrIgnore([
        //       'gallary_id'=>'21',
        //       'gallary_type'=>'medium',
        //       'height'=>'600',
        //       'width'=>'600',
        //       'path'=>'/gallary/medium202109045938banner_770x301.jpg',

        //    ]);
        //    GallaryDetail::insertOrIgnore([
        //       'gallary_id'=>'21',
        //       'gallary_type'=>'thumbnail',
        //       'height'=>'400',
        //       'width'=>'400',
        //       'path'=>'/gallary/thumbnail202109045938banner_770x301.jpg',

        //    ]);
        //    GallaryDetail::insertOrIgnore([
        //       'gallary_id'=>'22',
        //       'gallary_type'=>'large',
        //       'height'=>'900',
        //       'width'=>'900',
        //       'path'=>'/gallary/large202109045900banner_372x546.jpg',

        //    ]);
        //    GallaryDetail::insertOrIgnore([
        //       'gallary_id'=>'22',
        //       'gallary_type'=>'medium',
        //       'height'=>'600',
        //       'width'=>'600',
        //       'path'=>'/gallary/medium202109045900banner_372x546.jpg',

        //    ]);
        //    GallaryDetail::insertOrIgnore([
        //       'gallary_id'=>'22',
        //       'gallary_type'=>'thumbnail',
        //       'height'=>'400',
        //       'width'=>'400',
        //       'path'=>'/gallary/thumbnail202109045900banner_372x546.jpg',

        //    ]);
        //    GallaryDetail::insertOrIgnore([
        //       'gallary_id'=>'23',
        //       'gallary_type'=>'large',
        //       'height'=>'900',
        //       'width'=>'900',
        //       'path'=>'/gallary/large202109045938banner_770x301.jpg',

        //    ]);
        //    GallaryDetail::insertOrIgnore([
        //       'gallary_id'=>'23',
        //       'gallary_type'=>'medium',
        //       'height'=>'600',
        //       'width'=>'600',
        //       'path'=>'/gallary/medium202109045938banner_770x301.jpg',

        //    ]);
        //    GallaryDetail::insertOrIgnore([
        //       'gallary_id'=>'23',
        //       'gallary_type'=>'thumbnail',
        //       'height'=>'400',
        //       'width'=>'400',
        //       'path'=>'/gallary/thumbnail202109045938banner_770x301.jpg',

        //    ]);
        //    GallaryDetail::insertOrIgnore([
        //       'gallary_id'=>'24',
        //       'gallary_type'=>'large',
        //       'height'=>'900',
        //       'width'=>'900',
        //       'path'=>'/gallary/large202109045420banner_270x229.jpg',

        //    ]);
        //    GallaryDetail::insertOrIgnore([
        //       'gallary_id'=>'24',
        //       'gallary_type'=>'medium',
        //       'height'=>'600',
        //       'width'=>'600',
        //       'path'=>'/gallary/medium202109045420banner_270x229.jpg',

        //    ]);
        //    GallaryDetail::insertOrIgnore([
        //       'gallary_id'=>'24',
        //       'gallary_type'=>'thumbnail',
        //       'height'=>'400',
        //       'width'=>'400',
        //       'path'=>'/gallary/thumbnail202109045420banner_270x229.jpg',

        //    ]);
        //    GallaryDetail::insertOrIgnore([
        //       'gallary_id'=>'25',
        //       'gallary_type'=>'large',
        //       'height'=>'900',
        //       'width'=>'900',
        //       'path'=>'/gallary/large202109041942banner_570x451.jpg',

        //    ]);
        //    GallaryDetail::insertOrIgnore([
        //       'gallary_id'=>'25',
        //       'gallary_type'=>'medium',
        //       'height'=>'600',
        //       'width'=>'600',
        //       'path'=>'/gallary/medium202109041942banner_570x451.jpg',

        //    ]);
        //    GallaryDetail::insertOrIgnore([
        //       'gallary_id'=>'25',
        //       'gallary_type'=>'thumbnail',
        //       'height'=>'400',
        //       'width'=>'400',
        //       'path'=>'/gallary/thumbnail202109041942banner_570x451.jpg',

        //    ]);
        //    GallaryDetail::insertOrIgnore([
        //       'gallary_id'=>'26',
        //       'gallary_type'=>'large',
        //       'height'=>'900',
        //       'width'=>'900',
        //       'path'=>'/gallary/large202109042006banner_570x211.jpg',

        //    ]);
        //    GallaryDetail::insertOrIgnore([
        //       'gallary_id'=>'26',
        //       'gallary_type'=>'medium',
        //       'height'=>'600',
        //       'width'=>'600',
        //       'path'=>'/gallary/medium202109042006banner_570x211.jpg',

        //    ]);
        //    GallaryDetail::insertOrIgnore([
        //       'gallary_id'=>'26',
        //       'gallary_type'=>'thumbnail',
        //       'height'=>'400',
        //       'width'=>'400',
        //       'path'=>'/gallary/thumbnail202109042006banner_570x211.jpg',

        //    ]);
        //    GallaryDetail::insertOrIgnore([
        //       'gallary_id'=>'27',
        //       'gallary_type'=>'large',
        //       'height'=>'900',
        //       'width'=>'900',
        //       'path'=>'/gallary/large202109042527banner_270x211.jpg',

        //    ]);
        //    GallaryDetail::insertOrIgnore([
        //       'gallary_id'=>'27',
        //       'gallary_type'=>'medium',
        //       'height'=>'600',
        //       'width'=>'600',
        //       'path'=>'/gallary/medium202109042527banner_270x211.jpg',

        //    ]);
        //    GallaryDetail::insertOrIgnore([
        //       'gallary_id'=>'27',
        //       'gallary_type'=>'thumbnail',
        //       'height'=>'400',
        //       'width'=>'400',
        //       'path'=>'/gallary/thumbnail202109042527banner_270x211.jpg',

        //    ]);
        //    GallaryDetail::insertOrIgnore([
        //       'gallary_id'=>'28',
        //       'gallary_type'=>'large',
        //       'height'=>'900',
        //       'width'=>'900',
        //       'path'=>'/gallary/large202109042309banner_271x451.jpg',

        //    ]);
        //    GallaryDetail::insertOrIgnore([
        //       'gallary_id'=>'28',
        //       'gallary_type'=>'medium',
        //       'height'=>'600',
        //       'width'=>'600',
        //       'path'=>'/gallary/medium202109042309banner_271x451.jpg',

        //    ]);
        //    GallaryDetail::insertOrIgnore([
        //       'gallary_id'=>'28',
        //       'gallary_type'=>'thumbnail',
        //       'height'=>'400',
        //       'width'=>'400',
        //       'path'=>'/gallary/thumbnail202109042309banner_271x451.jpg',

        //    ]);
        //    GallaryDetail::insertOrIgnore([
        //       'gallary_id'=>'29',
        //       'gallary_type'=>'large',
        //       'height'=>'900',
        //       'width'=>'900',
        //       'path'=>'/gallary/large202109040046banner_370x493.jpg',

        //    ]);
        //    GallaryDetail::insertOrIgnore([
        //       'gallary_id'=>'29',
        //       'gallary_type'=>'medium',
        //       'height'=>'600',
        //       'width'=>'600',
        //       'path'=>'/gallary/medium202109040046banner_370x493.jpg',

        //    ]);
        //    GallaryDetail::insertOrIgnore([
        //       'gallary_id'=>'29',
        //       'gallary_type'=>'thumbnail',
        //       'height'=>'400',
        //       'width'=>'400',
        //       'path'=>'/gallary/thumbnail202109040046banner_370x493.jpg',

        //    ]);
        //    GallaryDetail::insertOrIgnore([
        //       'gallary_id'=>'30',
        //       'gallary_type'=>'large',
        //       'height'=>'900',
        //       'width'=>'900',
        //       'path'=>'/gallary/large202109043135banner_770x259.jpg',

        //    ]);
        //    GallaryDetail::insertOrIgnore([
        //       'gallary_id'=>'30',
        //       'gallary_type'=>'medium',
        //       'height'=>'600',
        //       'width'=>'600',
        //       'path'=>'/gallary/medium202109043135banner_770x259.jpg',

        //    ]);
        //    GallaryDetail::insertOrIgnore([
        //       'gallary_id'=>'30',
        //       'gallary_type'=>'thumbnail',
        //       'height'=>'400',
        //       'width'=>'400',
        //       'path'=>'/gallary/thumbnail202109043135banner_770x259.jpg',

        //    ]);
        //    GallaryDetail::insertOrIgnore([
        //       'gallary_id'=>'31',
        //       'gallary_type'=>'large',
        //       'height'=>'900',
        //       'width'=>'900',
        //       'path'=>'/gallary/large202109054227banner_370x193.jpg',

        //    ]);
        //    GallaryDetail::insertOrIgnore([
        //       'gallary_id'=>'31',
        //       'gallary_type'=>'medium',
        //       'height'=>'600',
        //       'width'=>'600',
        //       'path'=>'/gallary/medium202109054227banner_370x193.jpg',

        //    ]);
        //    GallaryDetail::insertOrIgnore([
        //       'gallary_id'=>'31',
        //       'gallary_type'=>'thumbnail',
        //       'height'=>'400',
        //       'width'=>'400',
        //       'path'=>'/gallary/thumbnail202109054227banner_370x193.jpg',

        //    ]);
        //    GallaryDetail::insertOrIgnore([
        //       'gallary_id'=>'32',
        //       'gallary_type'=>'large',
        //       'height'=>'900',
        //       'width'=>'900',
        //       'path'=>'/gallary/large202109054758category900x900.jpg',

        //    ]);
        //    GallaryDetail::insertOrIgnore([
        //       'gallary_id'=>'32',
        //       'gallary_type'=>'medium',
        //       'height'=>'600',
        //       'width'=>'600',
        //       'path'=>'/gallary/medium202109054758category900x900.jpg',

        //    ]);
        //    GallaryDetail::insertOrIgnore([
        //       'gallary_id'=>'32',
        //       'gallary_type'=>'thumbnail',
        //       'height'=>'400',
        //       'width'=>'400',
        //       'path'=>'/gallary/thumbnail202109054758category900x900.jpg',

        //    ]);
        //    GallaryDetail::insertOrIgnore([
        //       'gallary_id'=>'33',
        //       'gallary_type'=>'large',
        //       'height'=>'900',
        //       'width'=>'900',
        //       'path'=>'/gallary/large202109055140wUJPQ27501.png',

        //    ]);
        //    GallaryDetail::insertOrIgnore([
        //       'gallary_id'=>'33',
        //       'gallary_type'=>'medium',
        //       'height'=>'600',
        //       'width'=>'600',
        //       'path'=>'/gallary/medium202109055140wUJPQ27501.png',

        //    ]);
        //    GallaryDetail::insertOrIgnore([
        //       'gallary_id'=>'33',
        //       'gallary_type'=>'thumbnail',
        //       'height'=>'400',
        //       'width'=>'400',
        //       'path'=>'/gallary/thumbnail202109055140wUJPQ27501.png',

        //    ]);
        //    GallaryDetail::insertOrIgnore([
        //       'gallary_id'=>'34',
        //       'gallary_type'=>'large',
        //       'height'=>'900',
        //       'width'=>'900',
        //       'path'=>'/gallary/large202109050158product_1_900x900.jpg',

        //    ]);

        //    GallaryDetail::insertOrIgnore([
        //       'gallary_id'=>'34',
        //       'gallary_type'=>'medium',
        //       'height'=>'600',
        //       'width'=>'600',
        //       'path'=>'/gallary/medium202109050158product_1_900x900.jpg',

        //    ]);
        //    GallaryDetail::insertOrIgnore([
        //       'gallary_id'=>'34',
        //       'gallary_type'=>'thumbnail',
        //       'height'=>'400',
        //       'width'=>'400',
        //       'path'=>'/gallary/thumbnail202109050158product_1_900x900.jpg',

        //    ]);
        //    GallaryDetail::insertOrIgnore([
        //       'gallary_id'=>'35',
        //       'gallary_type'=>'large',
        //       'height'=>'900',
        //       'width'=>'900',
        //       'path'=>'/gallary/large202109050215product_2_900x900.jpg',

        //    ]);
        //    GallaryDetail::insertOrIgnore([
        //       'gallary_id'=>'35',
        //       'gallary_type'=>'medium',
        //       'height'=>'600',
        //       'width'=>'600',
        //       'path'=>'/gallary/medium202109050215product_2_900x900.jpg',

        //    ]);
        //    GallaryDetail::insertOrIgnore([
        //       'gallary_id'=>'35',
        //       'gallary_type'=>'thumbnail',
        //       'height'=>'400',
        //       'width'=>'400',
        //       'path'=>'/gallary/thumbnail202109050215product_2_900x900.jpg',

        //    ]);
        //    GallaryDetail::insertOrIgnore([
        //       'gallary_id'=>'36',
        //       'gallary_type'=>'large',
        //       'height'=>'900',
        //       'width'=>'900',
        //       'path'=>'/gallary/large202109050235product_3_900x900.jpg',

        //    ]);
        //    GallaryDetail::insertOrIgnore([
        //       'gallary_id'=>'36',
        //       'gallary_type'=>'medium',
        //       'height'=>'600',
        //       'width'=>'600',
        //       'path'=>'/gallary/medium202109050235product_3_900x900.jpg',

        //    ]);
        //    GallaryDetail::insertOrIgnore([
        //       'gallary_id'=>'36',
        //       'gallary_type'=>'thumbnail',
        //       'height'=>'400',
        //       'width'=>'400',
        //       'path'=>'/gallary/thumbnail202109050235product_3_900x900.jpg',

        //    ]);
        //    GallaryDetail::insertOrIgnore([
        //       'gallary_id'=>'37',
        //       'gallary_type'=>'large',
        //       'height'=>'900',
        //       'width'=>'900',
        //       'path'=>'/gallary/large202109052217product_4_900x900.jpg',

        //    ]);
        //    GallaryDetail::insertOrIgnore([
        //       'gallary_id'=>'37',
        //       'gallary_type'=>'medium',
        //       'height'=>'600',
        //       'width'=>'600',
        //       'path'=>'/gallary/medium202109052217product_4_900x900.jpg',

        //    ]);
        //    GallaryDetail::insertOrIgnore([
        //       'gallary_id'=>'37',
        //       'gallary_type'=>'thumbnail',
        //       'height'=>'400',
        //       'width'=>'400',
        //       'path'=>'/gallary/thumbnail202109052217product_4_900x900.jpg',

        //    ]);
        //    GallaryDetail::insertOrIgnore([
        //       'gallary_id'=>'38',
        //       'gallary_type'=>'large',
        //       'height'=>'900',
        //       'width'=>'900',
        //       'path'=>'/gallary/large202109052232product_5_900x900.jpg',

        //    ]);
        //    GallaryDetail::insertOrIgnore([
        //       'gallary_id'=>'38',
        //       'gallary_type'=>'medium',
        //       'height'=>'600',
        //       'width'=>'600',
        //       'path'=>'/gallary/medium202109052232product_5_900x900.jpg',

        //    ]);
        //    GallaryDetail::insertOrIgnore([
        //       'gallary_id'=>'38',
        //       'gallary_type'=>'thumbnail',
        //       'height'=>'400',
        //       'width'=>'400',
        //       'path'=>'/gallary/thumbnail202109052232product_5_900x900.jpg',

        //    ]);
        //    GallaryDetail::insertOrIgnore([
        //       'gallary_id'=>'39',
        //       'gallary_type'=>'large',
        //       'height'=>'900',
        //       'width'=>'900',
        //       'path'=>'/gallary/large202109052248product_6_900x900.jpg',

        //    ]);
        //    GallaryDetail::insertOrIgnore([
        //       'gallary_id'=>'39',
        //       'gallary_type'=>'medium',
        //       'height'=>'600',
        //       'width'=>'600',
        //       'path'=>'/gallary/medium202109052248product_6_900x900.jpg',

        //    ]);
        //    GallaryDetail::insertOrIgnore([
        //       'gallary_id'=>'39',
        //       'gallary_type'=>'thumbnail',
        //       'height'=>'400',
        //       'width'=>'400',
        //       'path'=>'/gallary/thumbnail202109052248product_6_900x900.jpg',

        //    ]);
        //    GallaryDetail::insertOrIgnore([
        //       'gallary_id'=>'40',
        //       'gallary_type'=>'large',
        //       'height'=>'900',
        //       'width'=>'900',
        //       'path'=>'/gallary/large202109052304product_7_900x900.jpg',

        //    ]);
        //    GallaryDetail::insertOrIgnore([
        //       'gallary_id'=>'40',
        //       'gallary_type'=>'medium',
        //       'height'=>'600',
        //       'width'=>'600',
        //       'path'=>'/gallary/medium202109052304product_7_900x900.jpg',

        //    ]);
        //    GallaryDetail::insertOrIgnore([
        //       'gallary_id'=>'40',
        //       'gallary_type'=>'thumbnail',
        //       'height'=>'400',
        //       'width'=>'400',
        //       'path'=>'/gallary/thumbnail202109052304product_7_900x900.jpg',

        //    ]);
        //    GallaryDetail::insertOrIgnore([
        //       'gallary_id'=>'41',
        //       'gallary_type'=>'large',
        //       'height'=>'1600',
        //       'width'=>'1600',
        //       'path'=>'/gallary/large202109061656homebanner1600x800.jpg',

        //    ]);
        //    GallaryDetail::insertOrIgnore([
        //       'gallary_id'=>'41',
        //       'gallary_type'=>'medium',
        //       'height'=>'600',
        //       'width'=>'600',
        //       'path'=>'/gallary/medium202109061656homebanner1600x800.jpg',

        //    ]);
        //    GallaryDetail::insertOrIgnore([
        //       'gallary_id'=>'41',
        //       'gallary_type'=>'thumbnail',
        //       'height'=>'400',
        //       'width'=>'400',
        //       'path'=>'/gallary/thumbnail202109061656homebanner1600x800.jpg',

        //    ]);
        //    GallaryDetail::insertOrIgnore([
        //       'gallary_id'=>'42',
        //       'gallary_type'=>'large',
        //       'height'=>'900',
        //       'width'=>'900',
        //       'path'=>'/gallary/large202109081240product_8_900x900.jpg',

        //    ]);
        //    GallaryDetail::insertOrIgnore([
        //       'gallary_id'=>'42',
        //       'gallary_type'=>'medium',
        //       'height'=>'600',
        //       'width'=>'600',
        //       'path'=>'/gallary/medium202109081240product_8_900x900.jpg',

        //    ]);
        //    GallaryDetail::insertOrIgnore([
        //       'gallary_id'=>'42',
        //       'gallary_type'=>'thumbnail',
        //       'height'=>'400',
        //       'width'=>'400',
        //       'path'=>'/gallary/thumbnail202109081240product_8_900x900.jpg',

        //    ]);
        //    GallaryDetail::insertOrIgnore([
        //       'gallary_id'=>'43',
        //       'gallary_type'=>'large',
        //       'height'=>'900',
        //       'width'=>'900',
        //       'path'=>'/gallary/large202109081253product_9_900x900.jpg',

        //    ]);
        //    GallaryDetail::insertOrIgnore([
        //       'gallary_id'=>'43',
        //       'gallary_type'=>'medium',
        //       'height'=>'600',
        //       'width'=>'600',
        //       'path'=>'/gallary/medium202109081253product_9_900x900.jpg',

        //    ]);
        //    GallaryDetail::insertOrIgnore([
        //       'gallary_id'=>'43',
        //       'gallary_type'=>'thumbnail',
        //       'height'=>'400',
        //       'width'=>'400',
        //       'path'=>'/gallary/thumbnail202109081253product_9_900x900.jpg',

        //    ]);

        \DB::table('gallary_detail')->insert([
            0 => [
                'id' => '1',
                'gallary_id' => '1',
                'gallary_type' => 'large',
                'height' => '900',
                'width' => '900',
                'path' => '/gallary/01-largelogo.png',
            ],
            1 => [
                'id' => '2',
                'gallary_id' => '1',
                'gallary_type' => 'medium',
                'height' => '600',
                'width' => '600',
                'path' => '/gallary/01-mediumlogo.png',
            ],
            2 => [
                'id' => '3',
                'gallary_id' => '1',
                'gallary_type' => 'thumbnail',
                'height' => '400',
                'width' => '400',
                'path' => '/gallary/01-thumbnaillogo.png',
            ],
            3 => [
                'id' => '4',
                'gallary_id' => '2',
                'gallary_type' => 'large',
                'height' => '900',
                'width' => '900',
                'path' => '/gallary/large01-slider.jpg',
            ],
            4 => [
                'id' => '5',
                'gallary_id' => '2',
                'gallary_type' => 'medium',
                'height' => '600',
                'width' => '600',
                'path' => '/gallary/medium01-slider.jpg',
            ],
            5 => [
                'id' => '6',
                'gallary_id' => '2',
                'gallary_type' => 'thumbnail',
                'height' => '400',
                'width' => '400',
                'path' => '/gallary/thumbnail01-slider.jpg',
            ],
            6 => [
                'id' => '7',
                'gallary_id' => '3',
                'gallary_type' => 'large',
                'height' => '900',
                'width' => '900',
                'path' => '/gallary/large202109042527banner_270x211.jpg',
            ],
            7 => [
                'id' => '8',
                'gallary_id' => '3',
                'gallary_type' => 'medium',
                'height' => '600',
                'width' => '600',
                'path' => '/gallary/medium202109042527banner_270x211.jpg',
            ],
            8 => [
                'id' => '9',
                'gallary_id' => '3',
                'gallary_type' => 'thumbnail',
                'height' => '400',
                'width' => '400',
                'path' => '/gallary/thumbnail202109042527banner_270x211.jpg',
            ],
            9 => [
                'id' => '10',
                'gallary_id' => '4',
                'gallary_type' => 'large',
                'height' => '900',
                'width' => '900',
                'path' => '/gallary/large202109025727banner_270x229.jpg',
            ],
            10 => [
                'id' => '11',
                'gallary_id' => '4',
                'gallary_type' => 'medium',
                'height' => '600',
                'width' => '600',
                'path' => '/gallary/medium202109025727banner_270x229.jpg',
            ],
            11 => [
                'id' => '12',
                'gallary_id' => '4',
                'gallary_type' => 'thumbnail',
                'height' => '600',
                'width' => '600',
                'path' => '/gallary/thumbnail202109025727banner_270x229.jpg',
            ],
            12 => [
                'id' => '13',
                'gallary_id' => '5',
                'gallary_type' => 'large',
                'height' => '900',
                'width' => '900',
                'path' => '/gallary/large202109042309banner_271x451.jpg',
            ],
            13 => [
                'id' => '14',
                'gallary_id' => '5',
                'gallary_type' => 'medium',
                'height' => '600',
                'width' => '600',
                'path' => '/gallary/medium202109042309banner_271x451.jpg',
            ],
            14 => [
                'id' => '15',
                'gallary_id' => '5',
                'gallary_type' => 'thumbnail',
                'height' => '400',
                'width' => '400',
                'path' => '/gallary/thumbnail202109042309banner_271x451.jpg',
            ],
            15 => [
                'id' => '16',
                'gallary_id' => '6',
                'gallary_type' => 'large',
                'height' => '900',
                'width' => '900',
                'path' => '/gallary/large202109025813banner_368x550.jpg',
            ],
            16 => [
                'id' => '17',
                'gallary_id' => '6',
                'gallary_type' => 'medium',
                'height' => '600',
                'width' => '600',
                'path' => '/gallary/medium202109025813banner_368x550.jpg',
            ],
            17 => [
                'id' => '18',
                'gallary_id' => '6',
                'gallary_type' => 'thumbnail',
                'height' => '400',
                'width' => '400',
                'path' => '/gallary/thumbnail202109025813banner_368x550.jpg',
            ],
            18 => [
                'id' => '19',
                'gallary_id' => '7',
                'gallary_type' => 'large',
                'height' => '900',
                'width' => '900',
                'path' => '/gallary/large202109025823banner_370x210.jpg',
            ],
            19 => [
                'id' => '20',
                'gallary_id' => '7',
                'gallary_type' => 'medium',
                'height' => '600',
                'width' => '600',
                'path' => '/gallary/medium202109025823banner_370x210.jpg',
            ],
            20 => [
                'id' => '21',
                'gallary_id' => '7',
                'gallary_type' => 'thumbnail',
                'height' => '400',
                'width' => '400',
                'path' => '/gallary/thumbnail202109025823banner_370x210.jpg',
            ],
            21 => [
                'id' => '22',
                'gallary_id' => '8',
                'gallary_type' => 'large',
                'height' => '900',
                'width' => '900',
                'path' => '/gallary/large202109025851banner_370x220.jpg',
            ],
            22 => [
                'id' => '23',
                'gallary_id' => '8',
                'gallary_type' => 'medium',
                'height' => '600',
                'width' => '600',
                'path' => '/gallary/medium202109025851banner_370x220.jpg',
            ],
            23 => [
                'id' => '24',
                'gallary_id' => '8',
                'gallary_type' => 'thumbnail',
                'height' => '400',
                'width' => '400',
                'path' => '/gallary/thumbnail202109025851banner_370x220.jpg',
            ],
            24 => [
                'id' => '25',
                'gallary_id' => '9',
                'gallary_type' => 'large',
                'height' => '900',
                'width' => '900',
                'path' => '/gallary/large202109025909banner_370x230.jpg',
            ],
            25 => [
                'id' => '26',
                'gallary_id' => '9',
                'gallary_type' => 'medium',
                'height' => '600',
                'width' => '600',
                'path' => '/gallary/medium202109025909banner_370x230.jpg',
            ],
            26 => [
                'id' => '27',
                'gallary_id' => '9',
                'gallary_type' => 'thumbnail',
                'height' => '400',
                'width' => '400',
                'path' => '/gallary/thumbnail202109025909banner_370x230.jpg',
            ],
            27 => [
                'id' => '28',
                'gallary_id' => '10',
                'gallary_type' => 'large',
                'height' => '900',
                'width' => '900',
                'path' => '/gallary/large202109025939banner_370x230.jpg',
            ],
            28 => [
                'id' => '29',
                'gallary_id' => '10',
                'gallary_type' => 'medium',
                'height' => '600',
                'width' => '600',
                'path' => '/gallary/medium202109025939banner_370x230.jpg',
            ],
            29 => [
                'id' => '30',
                'gallary_id' => '10',
                'gallary_type' => 'thumbnail',
                'height' => '400',
                'width' => '400',
                'path' => '/gallary/thumbnail202109025939banner_370x230.jpg',
            ],
            30 => [
                'id' => '31',
                'gallary_id' => '11',
                'gallary_type' => 'large',
                'height' => '900',
                'width' => '900',
                'path' => '/gallary/large202109020219banner_370x277.jpg',
            ],
            31 => [
                'id' => '32',
                'gallary_id' => '11',
                'gallary_type' => 'medium',
                'height' => '600',
                'width' => '600',
                'path' => '/gallary/medium202109020219banner_370x277.jpg',
            ],
            32 => [
                'id' => '33',
                'gallary_id' => '11',
                'gallary_type' => 'thumbnail',
                'height' => '400',
                'width' => '400',
                'path' => '/gallary/thumbnail202109020219banner_370x277.jpg',
            ],
            33 => [
                'id' => '34',
                'gallary_id' => '12',
                'gallary_type' => 'large',
                'height' => '900',
                'width' => '900',
                'path' => '/gallary/large202109040046banner_370x493.jpg',
            ],
            34 => [
                'id' => '35',
                'gallary_id' => '12',
                'gallary_type' => 'medium',
                'height' => '600',
                'width' => '600',
                'path' => '/gallary/medium202109040046banner_370x493.jpg',
            ],
            35 => [
                'id' => '36',
                'gallary_id' => '12',
                'gallary_type' => 'thumbnail',
                'height' => '400',
                'width' => '400',
                'path' => '/gallary/thumbnail202109040046banner_370x493.jpg',
            ],
            36 => [
                'id' => '37',
                'gallary_id' => '13',
                'gallary_type' => 'large',
                'height' => '900',
                'width' => '900',
                'path' => '/gallary/large202109045900banner_372x546.jpg',
            ],
            37 => [
                'id' => '38',
                'gallary_id' => '13',
                'gallary_type' => 'medium',
                'height' => '600',
                'width' => '600',
                'path' => '/gallary/medium202109045900banner_372x546.jpg',
            ],
            38 => [
                'id' => '39',
                'gallary_id' => '13',
                'gallary_type' => 'thumbnail',
                'height' => '400',
                'width' => '400',
                'path' => '/gallary/thumbnail202109045900banner_372x546.jpg',
            ],
            39 => [
                'id' => '40',
                'gallary_id' => '14',
                'gallary_type' => 'large',
                'height' => '900',
                'width' => '900',
                'path' => '/gallary/large202109020247banner_470x210.jpg',
            ],
            40 => [
                'id' => '41',
                'gallary_id' => '14',
                'gallary_type' => 'medium',
                'height' => '600',
                'width' => '600',
                'path' => '/gallary/medium202109020247banner_470x210.jpg',
            ],
            41 => [
                'id' => '42',
                'gallary_id' => '14',
                'gallary_type' => 'thumbnail',
                'height' => '400',
                'width' => '400',
                'path' => '/gallary/thumbnail202109020247banner_470x210.jpg',
            ],
            42 => [
                'id' => '43',
                'gallary_id' => '15',
                'gallary_type' => 'large',
                'height' => '900',
                'width' => '900',
                'path' => '/gallary/large202109020336banner_470x210.jpg',
            ],
            43 => [
                'id' => '44',
                'gallary_id' => '15',
                'gallary_type' => 'medium',
                'height' => '600',
                'width' => '600',
                'path' => '/gallary/medium202109020336banner_470x210.jpg',
            ],
            44 => [
                'id' => '45',
                'gallary_id' => '15',
                'gallary_type' => 'thumbnail',
                'height' => '400',
                'width' => '400',
                'path' => '/gallary/thumbnail202109020336banner_470x210.jpg',
            ],
            45 => [
                'id' => '46',
                'gallary_id' => '16',
                'gallary_type' => 'large',
                'height' => '900',
                'width' => '900',
                'path' => '/gallary/large202109020344banner_568x298.jpg',
            ],
            46 => [
                'id' => '47',
                'gallary_id' => '16',
                'gallary_type' => 'medium',
                'height' => '600',
                'width' => '600',
                'path' => '/gallary/medium202109020344banner_568x298.jpg',
            ],
            47 => [
                'id' => '48',
                'gallary_id' => '16',
                'gallary_type' => 'thumbnail',
                'height' => '400',
                'width' => '400',
                'path' => '/gallary/thumbnail202109020344banner_568x298.jpg',
            ],
            48 => [
                'id' => '49',
                'gallary_id' => '17',
                'gallary_type' => 'large',
                'height' => '900',
                'width' => '900',
                'path' => '/gallary/large202109042006banner_570x211.jpg',
            ],
            49 => [
                'id' => '50',
                'gallary_id' => '17',
                'gallary_type' => 'medium',
                'height' => '600',
                'width' => '600',
                'path' => '/gallary/medium202109042006banner_570x211.jpg',
            ],
            50 => [
                'id' => '51',
                'gallary_id' => '17',
                'gallary_type' => 'thumbnail',
                'height' => '400',
                'width' => '400',
                'path' => '/gallary/thumbnail202109042006banner_570x211.jpg',
            ],
            51 => [
                'id' => '52',
                'gallary_id' => '18',
                'gallary_type' => 'large',
                'height' => '900',
                'width' => '900',
                'path' => '/gallary/large202109041942banner_570x451.jpg',
            ],
            52 => [
                'id' => '53',
                'gallary_id' => '18',
                'gallary_type' => 'medium',
                'height' => '600',
                'width' => '600',
                'path' => '/gallary/medium202109041942banner_570x451.jpg',
            ],
            53 => [
                'id' => '54',
                'gallary_id' => '18',
                'gallary_type' => 'thumbnail',
                'height' => '400',
                'width' => '400',
                'path' => '/gallary/thumbnail202109041942banner_570x451.jpg',
            ],
            54 => [
                'id' => '55',
                'gallary_id' => '19',
                'gallary_type' => 'large',
                'height' => '900',
                'width' => '900',
                'path' => '/gallary/large202109020413banner_570x490.jpg',
            ],
            55 => [
                'id' => '56',
                'gallary_id' => '19',
                'gallary_type' => 'medium',
                'height' => '600',
                'width' => '600',
                'path' => '/gallary/medium202109020413banner_570x490.jpg',
            ],
            56 => [
                'id' => '57',
                'gallary_id' => '19',
                'gallary_type' => 'thumbnail',
                'height' => '400',
                'width' => '400',
                'path' => '/gallary/thumbnail202109020413banner_570x490.jpg',
            ],
            57 => [
                'id' => '58',
                'gallary_id' => '20',
                'gallary_type' => 'large',
                'height' => '900',
                'width' => '900',
                'path' => '/gallary/large202109043135banner_770x259.jpg',
            ],
            58 => [
                'id' => '59',
                'gallary_id' => '20',
                'gallary_type' => 'medium',
                'height' => '600',
                'width' => '600',
                'path' => '/gallary/medium202109043135banner_770x259.jpg',
            ],
            59 => [
                'id' => '60',
                'gallary_id' => '20',
                'gallary_type' => 'thumbnail',
                'height' => '400',
                'width' => '400',
                'path' => '/gallary/thumbnail202109043135banner_770x259.jpg',
            ],
            60 => [
                'id' => '61',
                'gallary_id' => '21',
                'gallary_type' => 'large',
                'height' => '900',
                'width' => '900',
                'path' => '/gallary/large202109045938banner_770x301.jpg',
            ],
            61 => [
                'id' => '62',
                'gallary_id' => '21',
                'gallary_type' => 'medium',
                'height' => '600',
                'width' => '600',
                'path' => '/gallary/medium202109045938banner_770x301.jpg',
            ],
            62 => [
                'id' => '63',
                'gallary_id' => '21',
                'gallary_type' => 'thumbnail',
                'height' => '400',
                'width' => '400',
                'path' => '/gallary/thumbnail202109045938banner_770x301.jpg',
            ],
            63 => [
                'id' => '64',
                'gallary_id' => '22',
                'gallary_type' => 'large',
                'height' => '900',
                'width' => '900',
                'path' => '/gallary/large202109045900banner_372x546.jpg',
            ],
            64 => [
                'id' => '65',
                'gallary_id' => '22',
                'gallary_type' => 'medium',
                'height' => '600',
                'width' => '600',
                'path' => '/gallary/medium202109045900banner_372x546.jpg',
            ],
            65 => [
                'id' => '66',
                'gallary_id' => '22',
                'gallary_type' => 'thumbnail',
                'height' => '400',
                'width' => '400',
                'path' => '/gallary/thumbnail202109045900banner_372x546.jpg',
            ],
            66 => [
                'id' => '67',
                'gallary_id' => '23',
                'gallary_type' => 'large',
                'height' => '900',
                'width' => '900',
                'path' => '/gallary/large202109045938banner_770x301.jpg',
            ],
            67 => [
                'id' => '68',
                'gallary_id' => '23',
                'gallary_type' => 'medium',
                'height' => '600',
                'width' => '600',
                'path' => '/gallary/medium202109045938banner_770x301.jpg',
            ],
            68 => [
                'id' => '69',
                'gallary_id' => '23',
                'gallary_type' => 'thumbnail',
                'height' => '400',
                'width' => '400',
                'path' => '/gallary/thumbnail202109045938banner_770x301.jpg',
            ],
            69 => [
                'id' => '70',
                'gallary_id' => '24',
                'gallary_type' => 'large',
                'height' => '900',
                'width' => '900',
                'path' => '/gallary/large202109045420banner_270x229.jpg',
            ],
            70 => [
                'id' => '71',
                'gallary_id' => '24',
                'gallary_type' => 'medium',
                'height' => '600',
                'width' => '600',
                'path' => '/gallary/medium202109045420banner_270x229.jpg',
            ],
            71 => [
                'id' => '72',
                'gallary_id' => '24',
                'gallary_type' => 'thumbnail',
                'height' => '400',
                'width' => '400',
                'path' => '/gallary/thumbnail202109045420banner_270x229.jpg',
            ],
            72 => [
                'id' => '73',
                'gallary_id' => '25',
                'gallary_type' => 'large',
                'height' => '900',
                'width' => '900',
                'path' => '/gallary/large202109041942banner_570x451.jpg',
            ],
            73 => [
                'id' => '74',
                'gallary_id' => '25',
                'gallary_type' => 'medium',
                'height' => '600',
                'width' => '600',
                'path' => '/gallary/medium202109041942banner_570x451.jpg',
            ],
            74 => [
                'id' => '75',
                'gallary_id' => '25',
                'gallary_type' => 'thumbnail',
                'height' => '400',
                'width' => '400',
                'path' => '/gallary/thumbnail202109041942banner_570x451.jpg',
            ],
            75 => [
                'id' => '76',
                'gallary_id' => '26',
                'gallary_type' => 'large',
                'height' => '900',
                'width' => '900',
                'path' => '/gallary/large202109042006banner_570x211.jpg',
            ],
            76 => [
                'id' => '77',
                'gallary_id' => '26',
                'gallary_type' => 'medium',
                'height' => '600',
                'width' => '600',
                'path' => '/gallary/medium202109042006banner_570x211.jpg',
            ],
            77 => [
                'id' => '78',
                'gallary_id' => '26',
                'gallary_type' => 'thumbnail',
                'height' => '400',
                'width' => '400',
                'path' => '/gallary/thumbnail202109042006banner_570x211.jpg',
            ],
            78 => [
                'id' => '79',
                'gallary_id' => '27',
                'gallary_type' => 'large',
                'height' => '900',
                'width' => '900',
                'path' => '/gallary/large202109042527banner_270x211.jpg',
            ],
            79 => [
                'id' => '80',
                'gallary_id' => '27',
                'gallary_type' => 'medium',
                'height' => '600',
                'width' => '600',
                'path' => '/gallary/medium202109042527banner_270x211.jpg',
            ],
            80 => [
                'id' => '81',
                'gallary_id' => '27',
                'gallary_type' => 'thumbnail',
                'height' => '400',
                'width' => '400',
                'path' => '/gallary/thumbnail202109042527banner_270x211.jpg',
            ],
            81 => [
                'id' => '82',
                'gallary_id' => '28',
                'gallary_type' => 'large',
                'height' => '900',
                'width' => '900',
                'path' => '/gallary/large202109042309banner_271x451.jpg',
            ],
            82 => [
                'id' => '83',
                'gallary_id' => '28',
                'gallary_type' => 'medium',
                'height' => '600',
                'width' => '600',
                'path' => '/gallary/medium202109042309banner_271x451.jpg',
            ],
            83 => [
                'id' => '84',
                'gallary_id' => '28',
                'gallary_type' => 'thumbnail',
                'height' => '400',
                'width' => '400',
                'path' => '/gallary/thumbnail202109042309banner_271x451.jpg',
            ],
            84 => [
                'id' => '85',
                'gallary_id' => '29',
                'gallary_type' => 'large',
                'height' => '900',
                'width' => '900',
                'path' => '/gallary/large202109040046banner_370x493.jpg',
            ],
            85 => [
                'id' => '86',
                'gallary_id' => '29',
                'gallary_type' => 'medium',
                'height' => '600',
                'width' => '600',
                'path' => '/gallary/medium202109040046banner_370x493.jpg',
            ],
            86 => [
                'id' => '87',
                'gallary_id' => '29',
                'gallary_type' => 'thumbnail',
                'height' => '400',
                'width' => '400',
                'path' => '/gallary/thumbnail202109040046banner_370x493.jpg',
            ],
            87 => [
                'id' => '88',
                'gallary_id' => '30',
                'gallary_type' => 'large',
                'height' => '900',
                'width' => '900',
                'path' => '/gallary/large202109043135banner_770x259.jpg',
            ],
            88 => [
                'id' => '89',
                'gallary_id' => '30',
                'gallary_type' => 'medium',
                'height' => '600',
                'width' => '600',
                'path' => '/gallary/medium202109043135banner_770x259.jpg',
            ],
            89 => [
                'id' => '90',
                'gallary_id' => '30',
                'gallary_type' => 'thumbnail',
                'height' => '400',
                'width' => '400',
                'path' => '/gallary/thumbnail202109043135banner_770x259.jpg',
            ],
            90 => [
                'id' => '91',
                'gallary_id' => '31',
                'gallary_type' => 'large',
                'height' => '900',
                'width' => '900',
                'path' => '/gallary/large202109054227banner_370x193.jpg',
            ],
            91 => [
                'id' => '92',
                'gallary_id' => '31',
                'gallary_type' => 'medium',
                'height' => '600',
                'width' => '600',
                'path' => '/gallary/medium202109054227banner_370x193.jpg',
            ],
            92 => [
                'id' => '93',
                'gallary_id' => '31',
                'gallary_type' => 'thumbnail',
                'height' => '400',
                'width' => '400',
                'path' => '/gallary/thumbnail202109054227banner_370x193.jpg',
            ],
            93 => [
                'id' => '94',
                'gallary_id' => '32',
                'gallary_type' => 'large',
                'height' => '900',
                'width' => '900',
                'path' => '/gallary/large202109054758category900x900.jpg',
            ],
            94 => [
                'id' => '95',
                'gallary_id' => '32',
                'gallary_type' => 'medium',
                'height' => '600',
                'width' => '600',
                'path' => '/gallary/medium202109054758category900x900.jpg',
            ],
            95 => [
                'id' => '96',
                'gallary_id' => '32',
                'gallary_type' => 'thumbnail',
                'height' => '400',
                'width' => '400',
                'path' => '/gallary/thumbnail202109054758category900x900.jpg',
            ],
            96 => [
                'id' => '97',
                'gallary_id' => '33',
                'gallary_type' => 'large',
                'height' => '900',
                'width' => '900',
                'path' => '/gallary/large202109055140wUJPQ27501.png',
            ],
            97 => [
                'id' => '98',
                'gallary_id' => '33',
                'gallary_type' => 'medium',
                'height' => '600',
                'width' => '600',
                'path' => '/gallary/medium202109055140wUJPQ27501.png',
            ],
            98 => [
                'id' => '99',
                'gallary_id' => '33',
                'gallary_type' => 'thumbnail',
                'height' => '400',
                'width' => '400',
                'path' => '/gallary/thumbnail202109055140wUJPQ27501.png',
            ],
            99 => [
                'id' => '100',
                'gallary_id' => '34',
                'gallary_type' => 'large',
                'height' => '900',
                'width' => '900',
                'path' => '/gallary/large202109050158product_1_900x900.jpg',
            ],
            100 => [
                'id' => '101',
                'gallary_id' => '34',
                'gallary_type' => 'medium',
                'height' => '600',
                'width' => '600',
                'path' => '/gallary/medium202109050158product_1_900x900.jpg',
            ],
            101 => [
                'id' => '102',
                'gallary_id' => '34',
                'gallary_type' => 'thumbnail',
                'height' => '400',
                'width' => '400',
                'path' => '/gallary/thumbnail202109050158product_1_900x900.jpg',
            ],
            102 => [
                'id' => '103',
                'gallary_id' => '35',
                'gallary_type' => 'large',
                'height' => '900',
                'width' => '900',
                'path' => '/gallary/large202109050215product_2_900x900.jpg',
            ],
            103 => [
                'id' => '104',
                'gallary_id' => '35',
                'gallary_type' => 'medium',
                'height' => '600',
                'width' => '600',
                'path' => '/gallary/medium202109050215product_2_900x900.jpg',
            ],
            104 => [
                'id' => '105',
                'gallary_id' => '35',
                'gallary_type' => 'thumbnail',
                'height' => '400',
                'width' => '400',
                'path' => '/gallary/thumbnail202109050215product_2_900x900.jpg',
            ],
            105 => [
                'id' => '106',
                'gallary_id' => '36',
                'gallary_type' => 'large',
                'height' => '900',
                'width' => '900',
                'path' => '/gallary/large202109050235product_3_900x900.jpg',
            ],
            106 => [
                'id' => '107',
                'gallary_id' => '36',
                'gallary_type' => 'medium',
                'height' => '600',
                'width' => '600',
                'path' => '/gallary/medium202109050235product_3_900x900.jpg',
            ],
            107 => [
                'id' => '108',
                'gallary_id' => '36',
                'gallary_type' => 'thumbnail',
                'height' => '400',
                'width' => '400',
                'path' => '/gallary/thumbnail202109050235product_3_900x900.jpg',
            ],
            108 => [
                'id' => '109',
                'gallary_id' => '37',
                'gallary_type' => 'large',
                'height' => '900',
                'width' => '900',
                'path' => '/gallary/large202109052217product_4_900x900.jpg',
            ],
            109 => [
                'id' => '110',
                'gallary_id' => '37',
                'gallary_type' => 'medium',
                'height' => '600',
                'width' => '600',
                'path' => '/gallary/medium202109052217product_4_900x900.jpg',
            ],
            110 => [
                'id' => '111',
                'gallary_id' => '37',
                'gallary_type' => 'thumbnail',
                'height' => '400',
                'width' => '400',
                'path' => '/gallary/thumbnail202109052217product_4_900x900.jpg',
            ],
            111 => [
                'id' => '112',
                'gallary_id' => '38',
                'gallary_type' => 'large',
                'height' => '900',
                'width' => '900',
                'path' => '/gallary/large202109052232product_5_900x900.jpg',
            ],
            112 => [
                'id' => '113',
                'gallary_id' => '38',
                'gallary_type' => 'medium',
                'height' => '600',
                'width' => '600',
                'path' => '/gallary/medium202109052232product_5_900x900.jpg',
            ],
            113 => [
                'id' => '114',
                'gallary_id' => '38',
                'gallary_type' => 'thumbnail',
                'height' => '400',
                'width' => '400',
                'path' => '/gallary/thumbnail202109052232product_5_900x900.jpg',
            ],
            114 => [
                'id' => '115',
                'gallary_id' => '39',
                'gallary_type' => 'large',
                'height' => '900',
                'width' => '900',
                'path' => '/gallary/large202109052248product_6_900x900.jpg',
            ],
            115 => [
                'id' => '116',
                'gallary_id' => '39',
                'gallary_type' => 'medium',
                'height' => '600',
                'width' => '600',
                'path' => '/gallary/medium202109052248product_6_900x900.jpg',
            ],
            116 => [
                'id' => '117',
                'gallary_id' => '39',
                'gallary_type' => 'thumbnail',
                'height' => '400',
                'width' => '400',
                'path' => '/gallary/thumbnail202109052248product_6_900x900.jpg',
            ],
            117 => [
                'id' => '118',
                'gallary_id' => '40',
                'gallary_type' => 'large',
                'height' => '900',
                'width' => '900',
                'path' => '/gallary/large202109052304product_7_900x900.jpg',
            ],
            118 => [
                'id' => '119',
                'gallary_id' => '40',
                'gallary_type' => 'medium',
                'height' => '600',
                'width' => '600',
                'path' => '/gallary/medium202109052304product_7_900x900.jpg',
            ],
            119 => [
                'id' => '120',
                'gallary_id' => '40',
                'gallary_type' => 'thumbnail',
                'height' => '400',
                'width' => '400',
                'path' => '/gallary/thumbnail202109052304product_7_900x900.jpg',
            ],
            120 => [
                'id' => '121',
                'gallary_id' => '41',
                'gallary_type' => 'large',
                'height' => '1600',
                'width' => '1600',
                'path' => '/gallary/large202109061656homebanner1600x800.jpg',
            ],
            121 => [
                'id' => '122',
                'gallary_id' => '41',
                'gallary_type' => 'medium',
                'height' => '600',
                'width' => '600',
                'path' => '/gallary/medium202109061656homebanner1600x800.jpg',
            ],
            122 => [
                'id' => '123',
                'gallary_id' => '41',
                'gallary_type' => 'thumbnail',
                'height' => '400',
                'width' => '400',
                'path' => '/gallary/thumbnail202109061656homebanner1600x800.jpg',
            ],
            123 => [
                'id' => '124',
                'gallary_id' => '42',
                'gallary_type' => 'large',
                'height' => '900',
                'width' => '900',
                'path' => '/gallary/large202109081240product_8_900x900.jpg',
            ],
            124 => [
                'id' => '125',
                'gallary_id' => '42',
                'gallary_type' => 'medium',
                'height' => '600',
                'width' => '600',
                'path' => '/gallary/medium202109081240product_8_900x900.jpg',
            ],
            125 => [
                'id' => '126',
                'gallary_id' => '42',
                'gallary_type' => 'thumbnail',
                'height' => '400',
                'width' => '400',
                'path' => '/gallary/thumbnail202109081240product_8_900x900.jpg',
            ],
            126 => [
                'id' => '127',
                'gallary_id' => '43',
                'gallary_type' => 'large',
                'height' => '900',
                'width' => '900',
                'path' => '/gallary/large202109081253product_9_900x900.jpg',
            ],
            127 => [
                'id' => '128',
                'gallary_id' => '43',
                'gallary_type' => 'medium',
                'height' => '600',
                'width' => '600',
                'path' => '/gallary/medium202109081253product_9_900x900.jpg',
            ],
            128 => [
                'id' => '129',
                'gallary_id' => '43',
                'gallary_type' => 'thumbnail',
                'height' => '400',
                'width' => '400',
                'path' => '/gallary/thumbnail202109081253product_9_900x900.jpg',
            ],
            129 => [
                'id' => '130',
                'gallary_id' => '44',
                'gallary_type' => 'large',
                'height' => '900',
                'width' => '900',
                'path' => '/gallary/large202205244413furniture-bg.jpg',
            ],
            130 => [
                'id' => '131',
                'gallary_id' => '44',
                'gallary_type' => 'medium',
                'height' => '600',
                'width' => '600',
                'path' => '/gallary/medium202205244413furniture-bg.jpg',
            ],
            131 => [
                'id' => '132',
                'gallary_id' => '44',
                'gallary_type' => 'thumbnail',
                'height' => '400',
                'width' => '400',
                'path' => '/gallary/thumbnail202205244413furniture-bg.jpg',
            ],
            132 => [
                'id' => '133',
                'gallary_id' => '45',
                'gallary_type' => 'large',
                'height' => '900',
                'width' => '900',
                'path' => '/gallary/large202205244452banner_image_1.png',
            ],
            133 => [
                'id' => '134',
                'gallary_id' => '45',
                'gallary_type' => 'medium',
                'height' => '600',
                'width' => '600',
                'path' => '/gallary/medium202205244452banner_image_1.png',
            ],
            134 => [
                'id' => '135',
                'gallary_id' => '45',
                'gallary_type' => 'thumbnail',
                'height' => '400',
                'width' => '400',
                'path' => '/gallary/thumbnail202205244452banner_image_1.png',
            ],
            135 => [
                'id' => '136',
                'gallary_id' => '46',
                'gallary_type' => 'large',
                'height' => '900',
                'width' => '900',
                'path' => '/gallary/large202205244454banner_image_2.png',
            ],
            136 => [
                'id' => '137',
                'gallary_id' => '46',
                'gallary_type' => 'medium',
                'height' => '600',
                'width' => '600',
                'path' => '/gallary/medium202205244454banner_image_2.png',
            ],
            137 => [
                'id' => '138',
                'gallary_id' => '46',
                'gallary_type' => 'thumbnail',
                'height' => '400',
                'width' => '400',
                'path' => '/gallary/thumbnail202205244454banner_image_2.png',
            ],
            138 => [
                'id' => '139',
                'gallary_id' => '47',
                'gallary_type' => 'large',
                'height' => '900',
                'width' => '900',
                'path' => '/gallary/large202205244457banner_image_3.png',
            ],
            139 => [
                'id' => '140',
                'gallary_id' => '47',
                'gallary_type' => 'medium',
                'height' => '600',
                'width' => '600',
                'path' => '/gallary/medium202205244457banner_image_3.png',
            ],
            140 => [
                'id' => '141',
                'gallary_id' => '47',
                'gallary_type' => 'thumbnail',
                'height' => '400',
                'width' => '400',
                'path' => '/gallary/thumbnail202205244457banner_image_3.png',
            ],
            141 => [
                'id' => '142',
                'gallary_id' => '48',
                'gallary_type' => 'large',
                'height' => '900',
                'width' => '900',
                'path' => '/gallary/large202205240437fullwidthbanner.jpg',
            ],
            142 => [
                'id' => '143',
                'gallary_id' => '48',
                'gallary_type' => 'medium',
                'height' => '600',
                'width' => '600',
                'path' => '/gallary/medium202205240437fullwidthbanner.jpg',
            ],
            143 => [
                'id' => '144',
                'gallary_id' => '48',
                'gallary_type' => 'thumbnail',
                'height' => '400',
                'width' => '400',
                'path' => '/gallary/thumbnail202205240437fullwidthbanner.jpg',
            ],
            144 => [
                'id' => '145',
                'gallary_id' => '49',
                'gallary_type' => 'large',
                'height' => '900',
                'width' => '900',
                'path' => '/gallary/large202205240500fullwidthbanner.jpg',
            ],
            145 => [
                'id' => '146',
                'gallary_id' => '49',
                'gallary_type' => 'medium',
                'height' => '600',
                'width' => '600',
                'path' => '/gallary/medium202205240500fullwidthbanner.jpg',
            ],
            146 => [
                'id' => '147',
                'gallary_id' => '49',
                'gallary_type' => 'thumbnail',
                'height' => '400',
                'width' => '400',
                'path' => '/gallary/thumbnail202205240500fullwidthbanner.jpg',
            ],
            147 => [
                'id' => '148',
                'gallary_id' => '50',
                'gallary_type' => 'large',
                'height' => '900',
                'width' => '900',
                'path' => '/gallary/large202205240651profile1.png',
            ],
            148 => [
                'id' => '149',
                'gallary_id' => '50',
                'gallary_type' => 'medium',
                'height' => '600',
                'width' => '600',
                'path' => '/gallary/medium202205240651profile1.png',
            ],
            149 => [
                'id' => '150',
                'gallary_id' => '50',
                'gallary_type' => 'thumbnail',
                'height' => '400',
                'width' => '400',
                'path' => '/gallary/thumbnail202205240651profile1.png',
            ],
            150 => [
                'id' => '151',
                'gallary_id' => '51',
                'gallary_type' => 'large',
                'height' => '900',
                'width' => '900',
                'path' => '/gallary/large202205240910cate-05.jpg',
            ],
            151 => [
                'id' => '152',
                'gallary_id' => '51',
                'gallary_type' => 'medium',
                'height' => '600',
                'width' => '600',
                'path' => '/gallary/medium202205240910cate-05.jpg',
            ],
            152 => [
                'id' => '153',
                'gallary_id' => '51',
                'gallary_type' => 'thumbnail',
                'height' => '400',
                'width' => '400',
                'path' => '/gallary/thumbnail202205240910cate-05.jpg',
            ],
            153 => [
                'id' => '154',
                'gallary_id' => '52',
                'gallary_type' => 'large',
                'height' => '900',
                'width' => '900',
                'path' => '/gallary/large202205241013banner-01.jpg',
            ],
            154 => [
                'id' => '155',
                'gallary_id' => '52',
                'gallary_type' => 'medium',
                'height' => '600',
                'width' => '600',
                'path' => '/gallary/medium202205241013banner-01.jpg',
            ],
            155 => [
                'id' => '156',
                'gallary_id' => '52',
                'gallary_type' => 'thumbnail',
                'height' => '400',
                'width' => '400',
                'path' => '/gallary/thumbnail202205241013banner-01.jpg',
            ],
            156 => [
                'id' => '157',
                'gallary_id' => '53',
                'gallary_type' => 'large',
                'height' => '900',
                'width' => '900',
                'path' => '/gallary/large202205241015banner-02.jpg',
            ],
            157 => [
                'id' => '158',
                'gallary_id' => '53',
                'gallary_type' => 'medium',
                'height' => '600',
                'width' => '600',
                'path' => '/gallary/medium202205241015banner-02.jpg',
            ],
            158 => [
                'id' => '159',
                'gallary_id' => '53',
                'gallary_type' => 'thumbnail',
                'height' => '400',
                'width' => '400',
                'path' => '/gallary/thumbnail202205241015banner-02.jpg',
            ],
            159 => [
                'id' => '160',
                'gallary_id' => '54',
                'gallary_type' => 'large',
                'height' => '900',
                'width' => '900',
                'path' => '/gallary/large202205241020cate-01.jpg',
            ],
            160 => [
                'id' => '161',
                'gallary_id' => '54',
                'gallary_type' => 'medium',
                'height' => '600',
                'width' => '600',
                'path' => '/gallary/medium202205241020cate-01.jpg',
            ],
            161 => [
                'id' => '162',
                'gallary_id' => '54',
                'gallary_type' => 'thumbnail',
                'height' => '400',
                'width' => '400',
                'path' => '/gallary/thumbnail202205241020cate-01.jpg',
            ],
            162 => [
                'id' => '163',
                'gallary_id' => '55',
                'gallary_type' => 'large',
                'height' => '900',
                'width' => '900',
                'path' => '/gallary/large202205241022cate-02.jpg',
            ],
            163 => [
                'id' => '164',
                'gallary_id' => '55',
                'gallary_type' => 'medium',
                'height' => '600',
                'width' => '600',
                'path' => '/gallary/medium202205241022cate-02.jpg',
            ],
            164 => [
                'id' => '165',
                'gallary_id' => '55',
                'gallary_type' => 'thumbnail',
                'height' => '400',
                'width' => '400',
                'path' => '/gallary/thumbnail202205241022cate-02.jpg',
            ],
            165 => [
                'id' => '166',
                'gallary_id' => '56',
                'gallary_type' => 'large',
                'height' => '900',
                'width' => '900',
                'path' => '/gallary/large202205241025cate-03.jpg',
            ],
            166 => [
                'id' => '167',
                'gallary_id' => '56',
                'gallary_type' => 'medium',
                'height' => '600',
                'width' => '600',
                'path' => '/gallary/medium202205241025cate-03.jpg',
            ],
            167 => [
                'id' => '168',
                'gallary_id' => '56',
                'gallary_type' => 'thumbnail',
                'height' => '400',
                'width' => '400',
                'path' => '/gallary/thumbnail202205241025cate-03.jpg',
            ],
            168 => [
                'id' => '169',
                'gallary_id' => '57',
                'gallary_type' => 'large',
                'height' => '900',
                'width' => '900',
                'path' => '/gallary/large202205241027cate-04.jpg',
            ],
            169 => [
                'id' => '170',
                'gallary_id' => '57',
                'gallary_type' => 'medium',
                'height' => '600',
                'width' => '600',
                'path' => '/gallary/medium202205241027cate-04.jpg',
            ],
            170 => [
                'id' => '171',
                'gallary_id' => '57',
                'gallary_type' => 'thumbnail',
                'height' => '400',
                'width' => '400',
                'path' => '/gallary/thumbnail202205241027cate-04.jpg',
            ],
            171 => [
                'id' => '172',
                'gallary_id' => '58',
                'gallary_type' => 'large',
                'height' => '900',
                'width' => '900',
                'path' => '/gallary/large202205241136offers-1.png',
            ],
            172 => [
                'id' => '173',
                'gallary_id' => '58',
                'gallary_type' => 'medium',
                'height' => '600',
                'width' => '600',
                'path' => '/gallary/medium202205241136offers-1.png',
            ],
            173 => [
                'id' => '174',
                'gallary_id' => '58',
                'gallary_type' => 'thumbnail',
                'height' => '400',
                'width' => '400',
                'path' => '/gallary/thumbnail202205241136offers-1.png',
            ],
            174 => [
                'id' => '175',
                'gallary_id' => '59',
                'gallary_type' => 'large',
                'height' => '900',
                'width' => '900',
                'path' => '/gallary/large202205241138offers-2.png',
            ],
            175 => [
                'id' => '176',
                'gallary_id' => '59',
                'gallary_type' => 'medium',
                'height' => '600',
                'width' => '600',
                'path' => '/gallary/medium202205241138offers-2.png',
            ],
            176 => [
                'id' => '177',
                'gallary_id' => '59',
                'gallary_type' => 'thumbnail',
                'height' => '400',
                'width' => '400',
                'path' => '/gallary/thumbnail202205241138offers-2.png',
            ],
            177 => [
                'id' => '178',
                'gallary_id' => '60',
                'gallary_type' => 'large',
                'height' => '900',
                'width' => '900',
                'path' => '/gallary/large202205241141offers-3.png',
            ],
            178 => [
                'id' => '179',
                'gallary_id' => '60',
                'gallary_type' => 'medium',
                'height' => '600',
                'width' => '600',
                'path' => '/gallary/medium202205241141offers-3.png',
            ],
            179 => [
                'id' => '180',
                'gallary_id' => '60',
                'gallary_type' => 'thumbnail',
                'height' => '400',
                'width' => '400',
                'path' => '/gallary/thumbnail202205241141offers-3.png',
            ],
            180 => [
                'id' => '181',
                'gallary_id' => '61',
                'gallary_type' => 'large',
                'height' => '900',
                'width' => '900',
                'path' => '/gallary/large202205241301bg-paralax.jpg',
            ],
            181 => [
                'id' => '182',
                'gallary_id' => '61',
                'gallary_type' => 'medium',
                'height' => '600',
                'width' => '600',
                'path' => '/gallary/medium202205241301bg-paralax.jpg',
            ],
            182 => [
                'id' => '183',
                'gallary_id' => '61',
                'gallary_type' => 'thumbnail',
                'height' => '400',
                'width' => '400',
                'path' => '/gallary/thumbnail202205241301bg-paralax.jpg',
            ],
            183 => [
                'id' => '184',
                'gallary_id' => '62',
                'gallary_type' => 'large',
                'height' => '900',
                'width' => '900',
                'path' => '/gallary/large202205241457Flower-banner1.jpg',
            ],
            184 => [
                'id' => '185',
                'gallary_id' => '62',
                'gallary_type' => 'medium',
                'height' => '600',
                'width' => '600',
                'path' => '/gallary/medium202205241457Flower-banner1.jpg',
            ],
            185 => [
                'id' => '186',
                'gallary_id' => '62',
                'gallary_type' => 'thumbnail',
                'height' => '400',
                'width' => '400',
                'path' => '/gallary/thumbnail202205241457Flower-banner1.jpg',
            ],
            186 => [
                'id' => '187',
                'gallary_id' => '63',
                'gallary_type' => 'large',
                'height' => '900',
                'width' => '900',
                'path' => '/gallary/large202205241459Flower-banner2.jpg',
            ],
            187 => [
                'id' => '188',
                'gallary_id' => '63',
                'gallary_type' => 'medium',
                'height' => '600',
                'width' => '600',
                'path' => '/gallary/medium202205241459Flower-banner2.jpg',
            ],
            188 => [
                'id' => '189',
                'gallary_id' => '63',
                'gallary_type' => 'thumbnail',
                'height' => '400',
                'width' => '400',
                'path' => '/gallary/thumbnail202205241459Flower-banner2.jpg',
            ],
            189 => [
                'id' => '190',
                'gallary_id' => '64',
                'gallary_type' => 'large',
                'height' => '900',
                'width' => '900',
                'path' => '/gallary/large202205241501paralax.jpg',
            ],
            190 => [
                'id' => '191',
                'gallary_id' => '64',
                'gallary_type' => 'medium',
                'height' => '600',
                'width' => '600',
                'path' => '/gallary/medium202205241501paralax.jpg',
            ],
            191 => [
                'id' => '192',
                'gallary_id' => '64',
                'gallary_type' => 'thumbnail',
                'height' => '400',
                'width' => '400',
                'path' => '/gallary/thumbnail202205241501paralax.jpg',
            ],
            192 => [
                'id' => '193',
                'gallary_id' => '65',
                'gallary_type' => 'large',
                'height' => '900',
                'width' => '900',
                'path' => '/gallary/large202205241535banner7.jpg',
            ],
            193 => [
                'id' => '194',
                'gallary_id' => '65',
                'gallary_type' => 'medium',
                'height' => '600',
                'width' => '600',
                'path' => '/gallary/medium202205241535banner7.jpg',
            ],
            194 => [
                'id' => '195',
                'gallary_id' => '65',
                'gallary_type' => 'thumbnail',
                'height' => '400',
                'width' => '400',
                'path' => '/gallary/thumbnail202205241535banner7.jpg',
            ],
            195 => [
                'id' => '196',
                'gallary_id' => '66',
                'gallary_type' => 'large',
                'height' => '900',
                'width' => '900',
                'path' => '/gallary/large202205241538big-img07.jpg',
            ],
            196 => [
                'id' => '197',
                'gallary_id' => '66',
                'gallary_type' => 'medium',
                'height' => '600',
                'width' => '600',
                'path' => '/gallary/medium202205241538big-img07.jpg',
            ],
            197 => [
                'id' => '198',
                'gallary_id' => '66',
                'gallary_type' => 'thumbnail',
                'height' => '400',
                'width' => '400',
                'path' => '/gallary/thumbnail202205241538big-img07.jpg',
            ],
            198 => [
                'id' => '199',
                'gallary_id' => '67',
                'gallary_type' => 'large',
                'height' => '900',
                'width' => '900',
                'path' => '/gallary/large202205241541cate-banner1.jpg',
            ],
            199 => [
                'id' => '200',
                'gallary_id' => '67',
                'gallary_type' => 'medium',
                'height' => '600',
                'width' => '600',
                'path' => '/gallary/medium202205241541cate-banner1.jpg',
            ],
            200 => [
                'id' => '201',
                'gallary_id' => '67',
                'gallary_type' => 'thumbnail',
                'height' => '400',
                'width' => '400',
                'path' => '/gallary/thumbnail202205241541cate-banner1.jpg',
            ],
            201 => [
                'id' => '202',
                'gallary_id' => '68',
                'gallary_type' => 'large',
                'height' => '900',
                'width' => '900',
                'path' => '/gallary/large202205241543cate-banner3.jpg',
            ],
            202 => [
                'id' => '203',
                'gallary_id' => '68',
                'gallary_type' => 'medium',
                'height' => '600',
                'width' => '600',
                'path' => '/gallary/medium202205241543cate-banner3.jpg',
            ],
            203 => [
                'id' => '204',
                'gallary_id' => '68',
                'gallary_type' => 'thumbnail',
                'height' => '400',
                'width' => '400',
                'path' => '/gallary/thumbnail202205241543cate-banner3.jpg',
            ],
            204 => [
                'id' => '205',
                'gallary_id' => '69',
                'gallary_type' => 'large',
                'height' => '900',
                'width' => '900',
                'path' => '/gallary/large202205241614element-banner5-center.jpg',
            ],
            205 => [
                'id' => '206',
                'gallary_id' => '69',
                'gallary_type' => 'medium',
                'height' => '600',
                'width' => '600',
                'path' => '/gallary/medium202205241614element-banner5-center.jpg',
            ],
            206 => [
                'id' => '207',
                'gallary_id' => '69',
                'gallary_type' => 'thumbnail',
                'height' => '400',
                'width' => '400',
                'path' => '/gallary/thumbnail202205241614element-banner5-center.jpg',
            ],
            207 => [
                'id' => '208',
                'gallary_id' => '70',
                'gallary_type' => 'large',
                'height' => '900',
                'width' => '900',
                'path' => '/gallary/large202205241735look1.jpg',
            ],
            208 => [
                'id' => '209',
                'gallary_id' => '70',
                'gallary_type' => 'medium',
                'height' => '600',
                'width' => '600',
                'path' => '/gallary/medium202205241735look1.jpg',
            ],
            209 => [
                'id' => '210',
                'gallary_id' => '70',
                'gallary_type' => 'thumbnail',
                'height' => '400',
                'width' => '400',
                'path' => '/gallary/thumbnail202205241735look1.jpg',
            ],
            210 => [
                'id' => '211',
                'gallary_id' => '71',
                'gallary_type' => 'large',
                'height' => '900',
                'width' => '900',
                'path' => '/gallary/large202205241741look2.jpg',
            ],
            211 => [
                'id' => '212',
                'gallary_id' => '71',
                'gallary_type' => 'medium',
                'height' => '600',
                'width' => '600',
                'path' => '/gallary/medium202205241741look2.jpg',
            ],
            212 => [
                'id' => '213',
                'gallary_id' => '71',
                'gallary_type' => 'thumbnail',
                'height' => '400',
                'width' => '400',
                'path' => '/gallary/thumbnail202205241741look2.jpg',
            ],
            213 => [
                'id' => '214',
                'gallary_id' => '72',
                'gallary_type' => 'large',
                'height' => '900',
                'width' => '900',
                'path' => '/gallary/large202205241744look3.jpg',
            ],
            214 => [
                'id' => '215',
                'gallary_id' => '72',
                'gallary_type' => 'medium',
                'height' => '600',
                'width' => '600',
                'path' => '/gallary/medium202205241744look3.jpg',
            ],
            215 => [
                'id' => '216',
                'gallary_id' => '72',
                'gallary_type' => 'thumbnail',
                'height' => '400',
                'width' => '400',
                'path' => '/gallary/thumbnail202205241744look3.jpg',
            ],
            216 => [
                'id' => '217',
                'gallary_id' => '73',
                'gallary_type' => 'large',
                'height' => '900',
                'width' => '900',
                'path' => '/gallary/large202205241811banner2.jpg',
            ],
            217 => [
                'id' => '218',
                'gallary_id' => '73',
                'gallary_type' => 'medium',
                'height' => '600',
                'width' => '600',
                'path' => '/gallary/medium202205241811banner2.jpg',
            ],
            218 => [
                'id' => '219',
                'gallary_id' => '73',
                'gallary_type' => 'thumbnail',
                'height' => '400',
                'width' => '400',
                'path' => '/gallary/thumbnail202205241811banner2.jpg',
            ],
            219 => [
                'id' => '220',
                'gallary_id' => '74',
                'gallary_type' => 'large',
                'height' => '900',
                'width' => '900',
                'path' => '/gallary/large202205241816banner3.jpg',
            ],
            220 => [
                'id' => '221',
                'gallary_id' => '74',
                'gallary_type' => 'medium',
                'height' => '600',
                'width' => '600',
                'path' => '/gallary/medium202205241816banner3.jpg',
            ],
            221 => [
                'id' => '222',
                'gallary_id' => '74',
                'gallary_type' => 'thumbnail',
                'height' => '400',
                'width' => '400',
                'path' => '/gallary/thumbnail202205241816banner3.jpg',
            ],
            222 => [
                'id' => '223',
                'gallary_id' => '75',
                'gallary_type' => 'large',
                'height' => '900',
                'width' => '900',
                'path' => '/gallary/large202205241135paralex.jpg',
            ],
            223 => [
                'id' => '224',
                'gallary_id' => '75',
                'gallary_type' => 'medium',
                'height' => '600',
                'width' => '600',
                'path' => '/gallary/medium202205241135paralex.jpg',
            ],
            224 => [
                'id' => '225',
                'gallary_id' => '75',
                'gallary_type' => 'thumbnail',
                'height' => '400',
                'width' => '400',
                'path' => '/gallary/thumbnail202205241135paralex.jpg',
            ],
            225 => [
                'id' => '226',
                'gallary_id' => '76',
                'gallary_type' => 'large',
                'height' => '900',
                'width' => '900',
                'path' => '/gallary/large202205240154Slider_01_01.jpg',
            ],
            226 => [
                'id' => '227',
                'gallary_id' => '76',
                'gallary_type' => 'medium',
                'height' => '600',
                'width' => '600',
                'path' => '/gallary/medium202205240154Slider_01_01.jpg',
            ],
            227 => [
                'id' => '228',
                'gallary_id' => '76',
                'gallary_type' => 'thumbnail',
                'height' => '400',
                'width' => '400',
                'path' => '/gallary/thumbnail202205240154Slider_01_01.jpg',
            ],
            228 => [
                'id' => '229',
                'gallary_id' => '77',
                'gallary_type' => 'large',
                'height' => '900',
                'width' => '900',
                'path' => '/gallary/large202205240156Slider_01_02.jpg',
            ],
            229 => [
                'id' => '230',
                'gallary_id' => '77',
                'gallary_type' => 'medium',
                'height' => '600',
                'width' => '600',
                'path' => '/gallary/medium202205240156Slider_01_02.jpg',
            ],
            230 => [
                'id' => '231',
                'gallary_id' => '77',
                'gallary_type' => 'thumbnail',
                'height' => '400',
                'width' => '400',
                'path' => '/gallary/thumbnail202205240156Slider_01_02.jpg',
            ],
            231 => [
                'id' => '232',
                'gallary_id' => '78',
                'gallary_type' => 'large',
                'height' => '900',
                'width' => '900',
                'path' => '/gallary/large202205240158Slider_01_03.jpg',
            ],
            232 => [
                'id' => '233',
                'gallary_id' => '78',
                'gallary_type' => 'medium',
                'height' => '600',
                'width' => '600',
                'path' => '/gallary/medium202205240158Slider_01_03.jpg',
            ],
            233 => [
                'id' => '234',
                'gallary_id' => '78',
                'gallary_type' => 'thumbnail',
                'height' => '400',
                'width' => '400',
                'path' => '/gallary/thumbnail202205240158Slider_01_03.jpg',
            ],
            234 => [
                'id' => '235',
                'gallary_id' => '79',
                'gallary_type' => 'large',
                'height' => '900',
                'width' => '900',
                'path' => '/gallary/large202205240224Slider_01_01.jpg',
            ],
            235 => [
                'id' => '236',
                'gallary_id' => '79',
                'gallary_type' => 'medium',
                'height' => '600',
                'width' => '600',
                'path' => '/gallary/medium202205240224Slider_01_01.jpg',
            ],
            236 => [
                'id' => '237',
                'gallary_id' => '79',
                'gallary_type' => 'thumbnail',
                'height' => '400',
                'width' => '400',
                'path' => '/gallary/thumbnail202205240224Slider_01_01.jpg',
            ],
            237 => [
                'id' => '238',
                'gallary_id' => '80',
                'gallary_type' => 'large',
                'height' => '900',
                'width' => '900',
                'path' => '/gallary/large202205240227Slider_01_02.jpg',
            ],
            238 => [
                'id' => '239',
                'gallary_id' => '80',
                'gallary_type' => 'medium',
                'height' => '600',
                'width' => '600',
                'path' => '/gallary/medium202205240227Slider_01_02.jpg',
            ],
            239 => [
                'id' => '240',
                'gallary_id' => '80',
                'gallary_type' => 'thumbnail',
                'height' => '400',
                'width' => '400',
                'path' => '/gallary/thumbnail202205240227Slider_01_02.jpg',
            ],
            240 => [
                'id' => '241',
                'gallary_id' => '81',
                'gallary_type' => 'large',
                'height' => '900',
                'width' => '900',
                'path' => '/gallary/large202205240228Slider_01_01.jpg',
            ],
            241 => [
                'id' => '242',
                'gallary_id' => '81',
                'gallary_type' => 'medium',
                'height' => '600',
                'width' => '600',
                'path' => '/gallary/medium202205240228Slider_01_01.jpg',
            ],
            242 => [
                'id' => '243',
                'gallary_id' => '81',
                'gallary_type' => 'thumbnail',
                'height' => '400',
                'width' => '400',
                'path' => '/gallary/thumbnail202205240228Slider_01_01.jpg',
            ],
            243 => [
                'id' => '244',
                'gallary_id' => '82',
                'gallary_type' => 'large',
                'height' => '900',
                'width' => '900',
                'path' => '/gallary/large202205240229Slider_01_03.jpg',
            ],
            244 => [
                'id' => '245',
                'gallary_id' => '82',
                'gallary_type' => 'medium',
                'height' => '600',
                'width' => '600',
                'path' => '/gallary/medium202205240229Slider_01_03.jpg',
            ],
            245 => [
                'id' => '246',
                'gallary_id' => '82',
                'gallary_type' => 'thumbnail',
                'height' => '400',
                'width' => '400',
                'path' => '/gallary/thumbnail202205240229Slider_01_03.jpg',
            ],
            246 => [
                'id' => '247',
                'gallary_id' => '83',
                'gallary_type' => 'large',
                'height' => '900',
                'width' => '900',
                'path' => '/gallary/large202205240233Slider_01_02.jpg',
            ],
            247 => [
                'id' => '248',
                'gallary_id' => '83',
                'gallary_type' => 'medium',
                'height' => '600',
                'width' => '600',
                'path' => '/gallary/medium202205240233Slider_01_02.jpg',
            ],
            248 => [
                'id' => '249',
                'gallary_id' => '83',
                'gallary_type' => 'thumbnail',
                'height' => '400',
                'width' => '400',
                'path' => '/gallary/thumbnail202205240233Slider_01_02.jpg',
            ],
            249 => [
                'id' => '250',
                'gallary_id' => '84',
                'gallary_type' => 'large',
                'height' => '900',
                'width' => '900',
                'path' => '/gallary/large202205240235Slider_01_03.jpg',
            ],
            250 => [
                'id' => '251',
                'gallary_id' => '84',
                'gallary_type' => 'medium',
                'height' => '600',
                'width' => '600',
                'path' => '/gallary/medium202205240235Slider_01_03.jpg',
            ],
            251 => [
                'id' => '252',
                'gallary_id' => '84',
                'gallary_type' => 'thumbnail',
                'height' => '400',
                'width' => '400',
                'path' => '/gallary/thumbnail202205240235Slider_01_03.jpg',
            ],
            252 => [
                'id' => '253',
                'gallary_id' => '85',
                'gallary_type' => 'large',
                'height' => '900',
                'width' => '900',
                'path' => '/gallary/large202205240256Slider_01_01.jpg',
            ],
            253 => [
                'id' => '254',
                'gallary_id' => '85',
                'gallary_type' => 'medium',
                'height' => '600',
                'width' => '600',
                'path' => '/gallary/medium202205240256Slider_01_01.jpg',
            ],
            254 => [
                'id' => '255',
                'gallary_id' => '85',
                'gallary_type' => 'thumbnail',
                'height' => '400',
                'width' => '400',
                'path' => '/gallary/thumbnail202205240256Slider_01_01.jpg',
            ],
            255 => [
                'id' => '256',
                'gallary_id' => '86',
                'gallary_type' => 'large',
                'height' => '900',
                'width' => '900',
                'path' => '/gallary/large202205240259Slider_01_02.jpg',
            ],
            256 => [
                'id' => '257',
                'gallary_id' => '86',
                'gallary_type' => 'medium',
                'height' => '600',
                'width' => '600',
                'path' => '/gallary/medium202205240259Slider_01_02.jpg',
            ],
            257 => [
                'id' => '258',
                'gallary_id' => '86',
                'gallary_type' => 'thumbnail',
                'height' => '400',
                'width' => '400',
                'path' => '/gallary/thumbnail202205240259Slider_01_02.jpg',
            ],
            258 => [
                'id' => '259',
                'gallary_id' => '87',
                'gallary_type' => 'large',
                'height' => '900',
                'width' => '900',
                'path' => '/gallary/large202205240301Slider_01_03.jpg',
            ],
            259 => [
                'id' => '260',
                'gallary_id' => '87',
                'gallary_type' => 'medium',
                'height' => '600',
                'width' => '600',
                'path' => '/gallary/medium202205240301Slider_01_03.jpg',
            ],
            260 => [
                'id' => '261',
                'gallary_id' => '87',
                'gallary_type' => 'thumbnail',
                'height' => '400',
                'width' => '400',
                'path' => '/gallary/thumbnail202205240301Slider_01_03.jpg',
            ],
            261 => [
                'id' => '262',
                'gallary_id' => '88',
                'gallary_type' => 'large',
                'height' => '900',
                'width' => '900',
                'path' => '/gallary/large202205240324Slider_01_01.jpg',
            ],
            262 => [
                'id' => '263',
                'gallary_id' => '88',
                'gallary_type' => 'medium',
                'height' => '600',
                'width' => '600',
                'path' => '/gallary/medium202205240324Slider_01_01.jpg',
            ],
            263 => [
                'id' => '264',
                'gallary_id' => '88',
                'gallary_type' => 'thumbnail',
                'height' => '400',
                'width' => '400',
                'path' => '/gallary/thumbnail202205240324Slider_01_01.jpg',
            ],
            264 => [
                'id' => '265',
                'gallary_id' => '89',
                'gallary_type' => 'large',
                'height' => '900',
                'width' => '900',
                'path' => '/gallary/large202205240327Slider_01_02.jpg',
            ],
            265 => [
                'id' => '266',
                'gallary_id' => '89',
                'gallary_type' => 'medium',
                'height' => '600',
                'width' => '600',
                'path' => '/gallary/medium202205240327Slider_01_02.jpg',
            ],
            266 => [
                'id' => '267',
                'gallary_id' => '89',
                'gallary_type' => 'thumbnail',
                'height' => '400',
                'width' => '400',
                'path' => '/gallary/thumbnail202205240327Slider_01_02.jpg',
            ],
            267 => [
                'id' => '268',
                'gallary_id' => '90',
                'gallary_type' => 'large',
                'height' => '900',
                'width' => '900',
                'path' => '/gallary/large202205240330Slider_01_03.jpg',
            ],
            268 => [
                'id' => '269',
                'gallary_id' => '90',
                'gallary_type' => 'medium',
                'height' => '600',
                'width' => '600',
                'path' => '/gallary/medium202205240330Slider_01_03.jpg',
            ],
            269 => [
                'id' => '270',
                'gallary_id' => '90',
                'gallary_type' => 'thumbnail',
                'height' => '400',
                'width' => '400',
                'path' => '/gallary/thumbnail202205240330Slider_01_03.jpg',
            ],
            270 => [
                'id' => '271',
                'gallary_id' => '91',
                'gallary_type' => 'large',
                'height' => '900',
                'width' => '900',
                'path' => '/gallary/large202205240403Slider_01_01.jpg',
            ],
            271 => [
                'id' => '272',
                'gallary_id' => '91',
                'gallary_type' => 'medium',
                'height' => '600',
                'width' => '600',
                'path' => '/gallary/medium202205240403Slider_01_01.jpg',
            ],
            272 => [
                'id' => '273',
                'gallary_id' => '91',
                'gallary_type' => 'thumbnail',
                'height' => '400',
                'width' => '400',
                'path' => '/gallary/thumbnail202205240403Slider_01_01.jpg',
            ],
            273 => [
                'id' => '274',
                'gallary_id' => '92',
                'gallary_type' => 'large',
                'height' => '900',
                'width' => '900',
                'path' => '/gallary/large202205240405Slider_01_02.jpg',
            ],
            274 => [
                'id' => '275',
                'gallary_id' => '92',
                'gallary_type' => 'medium',
                'height' => '600',
                'width' => '600',
                'path' => '/gallary/medium202205240405Slider_01_02.jpg',
            ],
            275 => [
                'id' => '276',
                'gallary_id' => '92',
                'gallary_type' => 'thumbnail',
                'height' => '400',
                'width' => '400',
                'path' => '/gallary/thumbnail202205240405Slider_01_02.jpg',
            ],
            276 => [
                'id' => '277',
                'gallary_id' => '93',
                'gallary_type' => 'large',
                'height' => '900',
                'width' => '900',
                'path' => '/gallary/large202205240408Slider_01_03.jpg',
            ],
            277 => [
                'id' => '278',
                'gallary_id' => '93',
                'gallary_type' => 'medium',
                'height' => '600',
                'width' => '600',
                'path' => '/gallary/medium202205240408Slider_01_03.jpg',
            ],
            278 => [
                'id' => '279',
                'gallary_id' => '93',
                'gallary_type' => 'thumbnail',
                'height' => '400',
                'width' => '400',
                'path' => '/gallary/thumbnail202205240408Slider_01_03.jpg',
            ],
            279 => [
                'id' => '280',
                'gallary_id' => '94',
                'gallary_type' => 'large',
                'height' => '900',
                'width' => '900',
                'path' => '/gallary/large202205240428Slider_01_01.jpg',
            ],
            280 => [
                'id' => '281',
                'gallary_id' => '94',
                'gallary_type' => 'medium',
                'height' => '600',
                'width' => '600',
                'path' => '/gallary/medium202205240428Slider_01_01.jpg',
            ],
            281 => [
                'id' => '282',
                'gallary_id' => '94',
                'gallary_type' => 'thumbnail',
                'height' => '400',
                'width' => '400',
                'path' => '/gallary/thumbnail202205240428Slider_01_01.jpg',
            ],
            282 => [
                'id' => '283',
                'gallary_id' => '95',
                'gallary_type' => 'large',
                'height' => '900',
                'width' => '900',
                'path' => '/gallary/large202205240433Slider_01_02.jpg',
            ],
            283 => [
                'id' => '284',
                'gallary_id' => '95',
                'gallary_type' => 'medium',
                'height' => '600',
                'width' => '600',
                'path' => '/gallary/medium202205240433Slider_01_02.jpg',
            ],
            284 => [
                'id' => '285',
                'gallary_id' => '95',
                'gallary_type' => 'thumbnail',
                'height' => '400',
                'width' => '400',
                'path' => '/gallary/thumbnail202205240433Slider_01_02.jpg',
            ],
            285 => [
                'id' => '286',
                'gallary_id' => '96',
                'gallary_type' => 'large',
                'height' => '900',
                'width' => '900',
                'path' => '/gallary/large202205240436Slider_01_03.jpg',
            ],
            286 => [
                'id' => '287',
                'gallary_id' => '96',
                'gallary_type' => 'medium',
                'height' => '600',
                'width' => '600',
                'path' => '/gallary/medium202205240436Slider_01_03.jpg',
            ],
            287 => [
                'id' => '288',
                'gallary_id' => '96',
                'gallary_type' => 'thumbnail',
                'height' => '400',
                'width' => '400',
                'path' => '/gallary/thumbnail202205240436Slider_01_03.jpg',
            ],
            288 => [
                'id' => '289',
                'gallary_id' => '97',
                'gallary_type' => 'large',
                'height' => '900',
                'width' => '900',
                'path' => '/gallary/large202205240459Slider_01_01.jpg',
            ],
            289 => [
                'id' => '290',
                'gallary_id' => '97',
                'gallary_type' => 'medium',
                'height' => '600',
                'width' => '600',
                'path' => '/gallary/medium202205240459Slider_01_01.jpg',
            ],
            290 => [
                'id' => '291',
                'gallary_id' => '97',
                'gallary_type' => 'thumbnail',
                'height' => '400',
                'width' => '400',
                'path' => '/gallary/thumbnail202205240459Slider_01_01.jpg',
            ],
            291 => [
                'id' => '292',
                'gallary_id' => '98',
                'gallary_type' => 'large',
                'height' => '900',
                'width' => '900',
                'path' => '/gallary/large202205240503Slider_01_02.jpg',
            ],
            292 => [
                'id' => '293',
                'gallary_id' => '98',
                'gallary_type' => 'medium',
                'height' => '600',
                'width' => '600',
                'path' => '/gallary/medium202205240503Slider_01_02.jpg',
            ],
            293 => [
                'id' => '294',
                'gallary_id' => '98',
                'gallary_type' => 'thumbnail',
                'height' => '400',
                'width' => '400',
                'path' => '/gallary/thumbnail202205240503Slider_01_02.jpg',
            ],
            294 => [
                'id' => '295',
                'gallary_id' => '99',
                'gallary_type' => 'large',
                'height' => '900',
                'width' => '900',
                'path' => '/gallary/large202205240506Slider_01_03.jpg',
            ],
            295 => [
                'id' => '296',
                'gallary_id' => '99',
                'gallary_type' => 'medium',
                'height' => '600',
                'width' => '600',
                'path' => '/gallary/medium202205240506Slider_01_03.jpg',
            ],
            296 => [
                'id' => '297',
                'gallary_id' => '99',
                'gallary_type' => 'thumbnail',
                'height' => '400',
                'width' => '400',
                'path' => '/gallary/thumbnail202205240506Slider_01_03.jpg',
            ],
            297 => [
                'id' => '298',
                'gallary_id' => '100',
                'gallary_type' => 'large',
                'height' => '900',
                'width' => '900',
                'path' => '/gallary/large202205240528Slider_01_01.jpg',
            ],
            298 => [
                'id' => '299',
                'gallary_id' => '100',
                'gallary_type' => 'medium',
                'height' => '600',
                'width' => '600',
                'path' => '/gallary/medium202205240528Slider_01_01.jpg',
            ],
            299 => [
                'id' => '300',
                'gallary_id' => '100',
                'gallary_type' => 'thumbnail',
                'height' => '400',
                'width' => '400',
                'path' => '/gallary/thumbnail202205240528Slider_01_01.jpg',
            ],
            300 => [
                'id' => '301',
                'gallary_id' => '101',
                'gallary_type' => 'large',
                'height' => '900',
                'width' => '900',
                'path' => '/gallary/large202205240533Slider_01_02.jpg',
            ],
            301 => [
                'id' => '302',
                'gallary_id' => '101',
                'gallary_type' => 'medium',
                'height' => '600',
                'width' => '600',
                'path' => '/gallary/medium202205240533Slider_01_02.jpg',
            ],
            302 => [
                'id' => '303',
                'gallary_id' => '101',
                'gallary_type' => 'thumbnail',
                'height' => '400',
                'width' => '400',
                'path' => '/gallary/thumbnail202205240533Slider_01_02.jpg',
            ],
            303 => [
                'id' => '304',
                'gallary_id' => '102',
                'gallary_type' => 'large',
                'height' => '900',
                'width' => '900',
                'path' => '/gallary/large202205240536Slider_01_03.jpg',
            ],
            304 => [
                'id' => '305',
                'gallary_id' => '102',
                'gallary_type' => 'medium',
                'height' => '600',
                'width' => '600',
                'path' => '/gallary/medium202205240536Slider_01_03.jpg',
            ],
            305 => [
                'id' => '306',
                'gallary_id' => '102',
                'gallary_type' => 'thumbnail',
                'height' => '400',
                'width' => '400',
                'path' => '/gallary/thumbnail202205240536Slider_01_03.jpg',
            ],
            306 => [
                'id' => '307',
                'gallary_id' => '103',
                'gallary_type' => 'large',
                'height' => '900',
                'width' => '900',
                'path' => '/gallary/large202205240601Slider_01_01.jpg',
            ],
            307 => [
                'id' => '308',
                'gallary_id' => '103',
                'gallary_type' => 'medium',
                'height' => '600',
                'width' => '600',
                'path' => '/gallary/medium202205240601Slider_01_01.jpg',
            ],
            308 => [
                'id' => '309',
                'gallary_id' => '103',
                'gallary_type' => 'thumbnail',
                'height' => '400',
                'width' => '400',
                'path' => '/gallary/thumbnail202205240601Slider_01_01.jpg',
            ],
            309 => [
                'id' => '310',
                'gallary_id' => '104',
                'gallary_type' => 'large',
                'height' => '900',
                'width' => '900',
                'path' => '/gallary/large202205240604Slider_01_02.jpg',
            ],
            310 => [
                'id' => '311',
                'gallary_id' => '104',
                'gallary_type' => 'medium',
                'height' => '600',
                'width' => '600',
                'path' => '/gallary/medium202205240604Slider_01_02.jpg',
            ],
            311 => [
                'id' => '312',
                'gallary_id' => '104',
                'gallary_type' => 'thumbnail',
                'height' => '400',
                'width' => '400',
                'path' => '/gallary/thumbnail202205240604Slider_01_02.jpg',
            ],
            312 => [
                'id' => '313',
                'gallary_id' => '105',
                'gallary_type' => 'large',
                'height' => '900',
                'width' => '900',
                'path' => '/gallary/large202205240631Slider_01_01.jpg',
            ],
            313 => [
                'id' => '314',
                'gallary_id' => '105',
                'gallary_type' => 'medium',
                'height' => '600',
                'width' => '600',
                'path' => '/gallary/medium202205240631Slider_01_01.jpg',
            ],
            314 => [
                'id' => '315',
                'gallary_id' => '105',
                'gallary_type' => 'thumbnail',
                'height' => '400',
                'width' => '400',
                'path' => '/gallary/thumbnail202205240631Slider_01_01.jpg',
            ],
            315 => [
                'id' => '316',
                'gallary_id' => '106',
                'gallary_type' => 'large',
                'height' => '900',
                'width' => '900',
                'path' => '/gallary/large202205240633Slider_01_02.jpg',
            ],
            316 => [
                'id' => '317',
                'gallary_id' => '106',
                'gallary_type' => 'medium',
                'height' => '600',
                'width' => '600',
                'path' => '/gallary/medium202205240633Slider_01_02.jpg',
            ],
            317 => [
                'id' => '318',
                'gallary_id' => '106',
                'gallary_type' => 'thumbnail',
                'height' => '400',
                'width' => '400',
                'path' => '/gallary/thumbnail202205240633Slider_01_02.jpg',
            ],
        ]);

    }
}
