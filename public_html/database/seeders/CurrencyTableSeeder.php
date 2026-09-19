<?php

namespace Database\Seeders;

use App\Models\Admin\Currency;
use Illuminate\Database\Seeder;

class CurrencyTableSeeder extends Seeder
{
    /**
     * Auto generated seed file
     */
    public function run(): void
    {

        Currency::where('id', '>', '0')->delete();
        
        Currency::insertOrIgnore([
            [
                'title' => 'USD',
                'code' => '$',
                'is_default' => '1',
                'exchange_rate' => '1.00',
                'decimal_place' => '2',
                'status' => 'active'
            ],
            [
                'title' => 'AED',
                'code' => 'AED',
                'is_default' => '0',
                'exchange_rate' => '1.00',
                'decimal_place' => '2',
                'status' => 'inactive'
            ],
            [
                'title' =>'AFN', 
                'code' => '؋',
                'is_default' => '0',
                'exchange_rate' => '1.00',
                'decimal_place' => '2',
                'status' => 'inactive' 
            ],
            [
                'title' =>'ALL', 
                'code' => 'Lek',
                'is_default' => '0',
                'exchange_rate' => '1.00',
                'decimal_place' => '2',
                'status' => 'inactive' 
            ],
            [
                'title' =>'ANG',
                'code' => 'ƒ', 
                'is_default' => '0',
                'exchange_rate' => '1.00',
                'decimal_place' => '2',
                'status' => 'inactive'
            ],
            [
                'title' =>'ARS',
                'code' => '$',
                'is_default' => '0',
                'exchange_rate' => '1.00',
                'decimal_place' => '2',
                'status' => 'inactive' 
            ],
            [
                'title' =>'AUD',
                'code' => '$',
                'is_default' => '0',
                'exchange_rate' => '1.00',
                'decimal_place' => '2',
                'status' => 'inactive'
            ],
            [
                'title' =>'AWG',
                'code' => 'ƒ',
                'is_default' => '0',
                'exchange_rate' => '1.00',
                'decimal_place' => '2',
                'status' => 'inactive'
            ],
            [
                'title' =>'AZN',
                'code' => 'ман',
                'is_default' => '0',
                'exchange_rate' => '1.00',
                'decimal_place' => '2',
                'status' => 'inactive'
            ],
            [
                'title' =>'BAM',
                'code' => 'KM',
                'is_default' => '0',
                'exchange_rate' => '1.00',
                'decimal_place' => '2',
                'status' => 'inactive'
            ],
            [
                'title' => 'BDT',
                'code' => '৳',
                'is_default' => '0',
                'exchange_rate' => '1.00',
                'decimal_place' => '2',
                'status' => 'inactive'
            ],
            [
                'title' =>'BBD',
                'code' => '$',
                'is_default' => '0',
                'exchange_rate' => '1.00',
                'decimal_place' => '2',
                'status' => 'inactive'
            ],
            [
                'title' =>'BGN',
                'code' => 'лв',
                'is_default' => '0',
                'exchange_rate' => '1.00',
                'decimal_place' => '2',
                'status' => 'inactive'
            ],
            [
                'title' =>'BMD',
                'code' => '$',
                'is_default' => '0',
                'exchange_rate' => '1.00',
                'decimal_place' => '2',
                'status' => 'inactive'
            ],
            [
                'title' =>'BND',
                'code' => '$',
                'is_default' => '0',
                'exchange_rate' => '1.00',
                'decimal_place' => '2',
                'status' => 'inactive'
            ],
            [
                'title' =>'BOB',
                'code' => '$b',
                'is_default' => '0',
                'exchange_rate' => '1.00',
                'decimal_place' => '2',
                'status' => 'inactive' 
            ],
            [
                'title' =>'BRL',
                'code' => 'R$',
                'is_default' => '0',
                'exchange_rate' => '1.00',
                'decimal_place' => '2',
                'status' => 'inactive'
            ],
            [
                'title' =>'BSD',
                'code' => '$',
                'is_default' => '0',
                'exchange_rate' => '1.00',
                'decimal_place' => '2',
                'status' => 'inactive'
            ],
            [
                'title' =>'BWP',
                'code' => 'P',
                'is_default' => '0',
                'exchange_rate' => '1.00',
                'decimal_place' => '2',
                'status' => 'inactive'
            ],
            [
                'title' =>'BYR',
                'code' => '₽',
                'is_default' => '0',
                'exchange_rate' => '1.00',
                'decimal_place' => '2',
                'status' => 'inactive'
            ],
            [
                'title' =>'BZD',
                'code' => 'BZ$',
                'is_default' => '0',
                'exchange_rate' => '1.00',
                'decimal_place' => '2',
                'status' => 'inactive'
            ],
            [
                'title' =>'CAD',
                'code' => '$',
                'is_default' => '0',
                'exchange_rate' => '1.00',
                'decimal_place' => '2',
                'status' => 'inactive'
            ],
            [
                'title' =>'CHF',
                'code' => 'CHF',
                'is_default' => '0',
                'exchange_rate' => '1.00',
                'decimal_place' => '2',
                'status' => 'inactive'
            ],
            [
                'title' =>'CLP',
                'code' => '$',
                'is_default' => '0',
                'exchange_rate' => '1.00',
                'decimal_place' => '2',
                'status' => 'inactive'
            ],
            [
                'title' =>'CNY',
                'code' => '¥',
                'is_default' => '0',
                'exchange_rate' => '1.00',
                'decimal_place' => '2',
                'status' => 'inactive'
            ],
            [
                'title' =>'COP',
                'code' => '$',
                'is_default' => '0',
                'exchange_rate' => '1.00',
                'decimal_place' => '2',
                'status' => 'inactive' 
            ],
            [
                'title' =>'CRC',
                'code' => '₡',
                'is_default' => '0',
                'exchange_rate' => '1.00',
                'decimal_place' => '2',
                'status' => 'inactive' 
            ],
            [
                'title' =>'CUP', 
                'code' => '₱',
                'is_default' => '0',
                'exchange_rate' => '1.00',
                'decimal_place' => '2',
                'status' => 'inactive' 
            ],
            [
                'title' =>'CZK',
                'code' => 'Kč',
                'is_default' => '0',
                'exchange_rate' => '1.00',
                'decimal_place' => '2',
                'status' => 'inactive' 
            ],
            [
                'title' =>'DKK',
                'code' => 'kr',
                'is_default' => '0',
                'exchange_rate' => '1.00',
                'decimal_place' => '2',
                'status' => 'inactive'
            ],
            [
                'title' =>'DOP',
                'code' => 'RD$',
                'is_default' => '0',
                'exchange_rate' => '1.00',
                'decimal_place' => '2',
                'status' => 'inactive'
            ],
            [
                'title' =>'EGP',
                'code' => '£',
                'is_default' => '0',
                'exchange_rate' => '1.00',
                'decimal_place' => '2',
                'status' => 'inactive'
            ],
            [
                'title' =>'EUR',
                'code' => '€',
                'is_default' => '0',
                'exchange_rate' => '1.00',
                'decimal_place' => '2',
                'status' => 'inactive'
            ],
            [
                'title' =>'FJD',
                'code' => '$',
                'is_default' => '0',
                'exchange_rate' => '1.00',
                'decimal_place' => '2',
                'status' => 'inactive'
            ],
            [
                'title' =>'FKP', 
                'code' => '£',
                'is_default' => '0',
                'exchange_rate' => '1.00',
                'decimal_place' => '2',
                'status' => 'inactive' 
            ],
            [
                'title' =>'GBP',
                'code' => '£',
                'is_default' => '0',
                'exchange_rate' => '1.00',
                'decimal_place' => '2',
                'status' => 'inactive' 
            ],
            [
                'title' =>'GIP',
                'code' => '£',
                'is_default' => '0',
                'exchange_rate' => '1.00',
                'decimal_place' => '2',
                'status' => 'inactive'
            ],
            [
                'title' =>'GTQ',
                'code' => 'Q',
                'is_default' => '0',
                'exchange_rate' => '1.00',
                'decimal_place' => '2',
                'status' => 'inactive'
            ],
            [
                'title' =>'GYD',
                'code' => '$',
                'is_default' => '0',
                'exchange_rate' => '1.00',
                'decimal_place' => '2',
                'status' => 'inactive'
            ],
            [
                'title' =>'HKD',
                'code' => '$',
                'is_default' => '0',
                'exchange_rate' => '1.00',
                'decimal_place' => '2',
                'status' => 'inactive' 
            ],
            [
                'title' =>'HNL', 
                'code' => 'L',
                'is_default' => '0',
                'exchange_rate' => '1.00',
                'decimal_place' => '2',
                'status' => 'inactive'
            ],
            [
                'title' =>'HRK', 
                'code' => 'kn',
                'is_default' => '0',
                'exchange_rate' => '1.00',
                'decimal_place' => '2',
                'status' => 'inactive' 
            ],
            [
                'title' =>'HUF', 
                'code' => 'Ft',
                'is_default' => '0',
                'exchange_rate' => '1.00',
                'decimal_place' => '2',
                'status' => 'inactive' 
            ],
            [
                'title' =>'IDR', 
                'code' => 'Rp',
                'is_default' => '0',
                'exchange_rate' => '1.00',
                'decimal_place' => '2',
                'status' => 'inactive'
            ],
            [
                'title' =>'ILS',
                'code' => '₪',
                'is_default' => '0',
                'exchange_rate' => '1.00',
                'decimal_place' => '2',
                'status' => 'inactive'
            ],
            [
                'title' =>'IRR', 
                'code' => '﷼',
                'is_default' => '0',
                'exchange_rate' => '1.00',
                'decimal_place' => '2',
                'status' => 'inactive'
            ],
            [
                'title' =>'ISK',
                'code' => 'kr',
                'is_default' => '0',
                'exchange_rate' => '1.00',
                'decimal_place' => '2',
                'status' => 'inactive'
            ],
            [
                'title' =>'JMD',
                'code' => 'J$',
                'is_default' => '0',
                'exchange_rate' => '1.00',
                'decimal_place' => '2',
                'status' => 'inactive' 
            ],
            [
                'title' =>'JPY',
                'code' => '¥',
                'is_default' => '0',
                'exchange_rate' => '1.00',
                'decimal_place' => '2',
                'status' => 'inactive'
            ],
            [
                'title' =>'KGS',
                'code' => 'лв',
                'is_default' => '0',
                'exchange_rate' => '1.00',
                'decimal_place' => '2',
                'status' => 'inactive' 
            ],
            [
                'title' =>'KHR',
                'code' => '៛',
                'is_default' => '0',
                'exchange_rate' => '1.00',
                'decimal_place' => '2',
                'status' => 'inactive'
            ],
            [
                'title' =>'KPW',
                'code' => '₩',
                'is_default' => '0',
                'exchange_rate' => '1.00',
                'decimal_place' => '2',
                'status' => 'inactive'
            ],
            [
                'title' =>'KRW',
                'code' => '₩',
                'is_default' => '0',
                'exchange_rate' => '1.00',
                'decimal_place' => '2',
                'status' => 'inactive'
            ],
            [
                'title' =>'KYD',
                'code' => '$',
                'is_default' => '0',
                'exchange_rate' => '1.00',
                'decimal_place' => '2',
                'status' => 'inactive' 
            ],
            [
                'title' =>'KZT',
                'code' => 'лв',
                'is_default' => '0',
                'exchange_rate' => '1.00',
                'decimal_place' => '2',
                'status' => 'inactive'
            ],
            [
                'title' =>'LAK',
                'code' => '₭',
                'is_default' => '0',
                'exchange_rate' => '1.00',
                'decimal_place' => '2',
                'status' => 'inactive' 
            ],
            [
                'title' =>'LBP',
                'code' => '£',
                'is_default' => '0',
                'exchange_rate' => '1.00',
                'decimal_place' => '2',
                'status' => 'inactive' 
            ],
            [
                'title' =>'LKR',
                'code' => '₨',
                'is_default' => '0',
                'exchange_rate' => '1.00',
                'decimal_place' => '2',
                'status' => 'inactive' 
            ],
            [
                'title' =>'LRD',
                'code' => '$',
                'is_default' => '0',
                'exchange_rate' => '1.00',
                'decimal_place' => '2',
                'status' => 'inactive' 
            ],
            [
                'title' =>'LTL',
                'code' => 'Lt',
                'is_default' => '0',
                'exchange_rate' => '1.00',
                'decimal_place' => '2',
                'status' => 'inactive' 
            ],
            [
                'title' =>'LVL',
                'code' => 'Ls',
                'is_default' => '0',
                'exchange_rate' => '1.00',
                'decimal_place' => '2',
                'status' => 'inactive' 
            ],
            [
                'title' =>'MKD', 
                'code' => 'ден',
                'is_default' => '0',
                'exchange_rate' => '1.00',
                'decimal_place' => '2',
                'status' => 'inactive'
            ],
            [
                'title' =>'MNT',
                'code' => '₮',
                'is_default' => '0',
                'exchange_rate' => '1.00',
                'decimal_place' => '2',
                'status' => 'inactive'
            ],
            [
                'title' =>'MUR',
                'code' => '₨',
                'is_default' => '0',
                'exchange_rate' => '1.00',
                'decimal_place' => '2',
                'status' => 'inactive' 
            ],
            [
                'title' =>'MXN',
                'code' => '$',
                'is_default' => '0',
                'exchange_rate' => '1.00',
                'decimal_place' => '2',
                'status' => 'inactive'
            ],
            [
                'title' =>'MYR',
                'code' => 'RM',
                'is_default' => '0',
                'exchange_rate' => '1.00',
                'decimal_place' => '2',
                'status' => 'inactive'
            ],
            [
                'title' =>'MZN', 
                'code' => 'MT',
                'is_default' => '0',
                'exchange_rate' => '1.00',
                'decimal_place' => '2',
                'status' => 'inactive'
            ],
            [
                'title' =>'NGN',
                'code' => '₦',
                'is_default' => '0',
                'exchange_rate' => '1.00',
                'decimal_place' => '2',
                'status' => 'inactive'
            ],
            [
                'title' =>'NIO',
                'code' => 'C$',
                'is_default' => '0',
                'exchange_rate' => '1.00',
                'decimal_place' => '2',
                'status' => 'inactive'
            ],
            [
                'title' =>'NOK',
                'code' => 'kr',
                'is_default' => '0',
                'exchange_rate' => '1.00',
                'decimal_place' => '2',
                'status' => 'inactive'
            ],
            [
                'title' =>'NPR',
                'code' => '₨',
                'is_default' => '0',
                'exchange_rate' => '1.00',
                'decimal_place' => '2',
                'status' => 'inactive'
            ],
            [
                'title' =>'NZD', 
                'code' => '$',
                'is_default' => '0',
                'exchange_rate' => '1.00',
                'decimal_place' => '2',
                'status' => 'inactive' 
            ],
            [
                'title' =>'OMR',
                'code' => '﷼',
                'is_default' => '0',
                'exchange_rate' => '1.00',
                'decimal_place' => '2',
                'status' => 'inactive'
            ],
            [
                'title' =>'PAB',
                'code' => 'B/.',
                'is_default' => '0',
                'exchange_rate' => '1.00',
                'decimal_place' => '2',
                'status' => 'inactive' 
            ],
            [
                'title' =>'PEN',
                'code' => 'S/.',
                'is_default' => '0',
                'exchange_rate' => '1.00',
                'decimal_place' => '2',
                'status' => 'inactive'
            ],
            [
                'title' =>'PHP',
                'code' => 'Php',
                'is_default' => '0',
                'exchange_rate' => '1.00',
                'decimal_place' => '2',
                'status' => 'inactive'
            ],
            [
                'title' =>'PKR',
                'code' => '₨',
                'is_default' => '0',
                'exchange_rate' => '1.00',
                'decimal_place' => '2',
                'status' => 'inactive'
            ],
            [
                'title' =>'PLN',
                'code' => 'zł',
                'is_default' => '0',
                'exchange_rate' => '1.00',
                'decimal_place' => '2',
                'status' => 'inactive'
            ],
            [
                'title' =>'PYG',
                'code' => 'Gs',
                'is_default' => '0',
                'exchange_rate' => '1.00',
                'decimal_place' => '2',
                'status' => 'inactive'
            ],
            [
                'title' =>'QAR',
                'code' => '﷼',
                'is_default' => '0',
                'exchange_rate' => '1.00',
                'decimal_place' => '2',
                'status' => 'inactive'
            ],
            [
                'title' =>'RON',
                'code' => 'lei',
                'is_default' => '0',
                'exchange_rate' => '1.00',
                'decimal_place' => '2',
                'status' => 'inactive'
            ],
            [
                'title' =>'RSD',
                'code' => 'Дин.',
                'is_default' => '0',
                'exchange_rate' => '1.00',
                'decimal_place' => '2',
                'status' => 'inactive'
            ],
            [
                'title' =>'RUB',
                'code' => 'руб',
                'is_default' => '0',
                'exchange_rate' => '1.00',
                'decimal_place' => '2',
                'status' => 'inactive'
            ],
            [
                'title' =>'SAR',
                'code' => '﷼',
                'is_default' => '0',
                'exchange_rate' => '1.00',
                'decimal_place' => '2',
                'status' => 'inactive'
            ],
            [
                'title' =>'SBD',
                'code' => '$',
                'is_default' => '0',
                'exchange_rate' => '1.00',
                'decimal_place' => '2',
                'status' => 'inactive'
            ],
            [
                'title' =>'SCR',
                'code' => '₨',
                'is_default' => '0',
                'exchange_rate' => '1.00',
                'decimal_place' => '2',
                'status' => 'inactive'
            ],
            [
                'title' =>'SEK',
                'code' => 'kr',
                'is_default' => '0',
                'exchange_rate' => '1.00',
                'decimal_place' => '2',
                'status' => 'inactive'
            ],
            [
                'title' =>'SGD',
                'code' => '$',
                'is_default' => '0',
                'exchange_rate' => '1.00',
                'decimal_place' => '2',
                'status' => 'inactive'
            ],
            [
                'title' =>'SHP',
                'code' => '£',
                'is_default' => '0',
                'exchange_rate' => '1.00',
                'decimal_place' => '2',
                'status' => 'inactive'
            ],
            [
                'title' =>'SOS',
                'code' => 'S',
                'is_default' => '0',
                'exchange_rate' => '1.00',
                'decimal_place' => '2',
                'status' => 'inactive'
            ],
            [
                'title' =>'SRD',
                'code' => '$',
                'is_default' => '0',
                'exchange_rate' => '1.00',
                'decimal_place' => '2',
                'status' => 'inactive'
            ],
            [
                'title' =>'SVC',
                'code' => '$',
                'is_default' => '0',
                'exchange_rate' => '1.00',
                'decimal_place' => '2',
                'status' => 'inactive'
            ],
            [
                'title' =>'SYP', 
                'code' => '£',
                'is_default' => '0',
                'exchange_rate' => '1.00',
                'decimal_place' => '2',
                'status' => 'inactive'
            ],
            [
                'title' =>'THB',
                'code' => '฿',
                'is_default' => '0',
                'exchange_rate' => '1.00',
                'decimal_place' => '2',
                'status' => 'inactive'
            ],
            [
                'title' =>'TRY',
                'code' => 'TL',
                'is_default' => '0',
                'exchange_rate' => '1.00',
                'decimal_place' => '2',
                'status' => 'inactive'
            ],
            [
                'title' =>'TTD', 
                'code' => 'TT$',
                'is_default' => '0',
                'exchange_rate' => '1.00',
                'decimal_place' => '2',
                'status' => 'inactive'
            ],
            [
                'title' =>'TWD',
                'code' => 'NT$',
                'is_default' => '0',
                'exchange_rate' => '1.00',
                'decimal_place' => '2',
                'status' => 'inactive'
            ],
            [
                'title' =>'UAH',
                'code' => '₴',
                'is_default' => '0',
                'exchange_rate' => '1.00',
                'decimal_place' => '2',
                'status' => 'inactive'
            ],            
            [
                'title' =>'UYU', 
                'code' => '$U',
                'is_default' => '0',
                'exchange_rate' => '1.00',
                'decimal_place' => '2',
                'status' => 'inactive'
            ],
            [
                'title' =>'UZS',
                'code' => 'лв',
                'is_default' => '0',
                'exchange_rate' => '1.00',
                'decimal_place' => '2',
                'status' => 'inactive'
            ],
            [
                'title' =>'VEF',
                'code' => 'Bs',
                'is_default' => '0',
                'exchange_rate' => '1.00',
                'decimal_place' => '2',
                'status' => 'inactive'
            ],
            [
                'title' =>'VND',
                'code' => '₫',
                'is_default' => '0',
                'exchange_rate' => '1.00',
                'decimal_place' => '2',
                'status' => 'inactive' 
            ],
            [
                'title' =>'XCD',
                'code' => '$',
                'is_default' => '0',
                'exchange_rate' => '1.00',
                'decimal_place' => '2',
                'status' => 'inactive'
            ],
            [
                'title' =>'YER',
                'code' => '﷼',
                'is_default' => '0',
                'exchange_rate' => '1.00',
                'decimal_place' => '2',
                'status' => 'inactive'
            ],
            [
                'title' =>'ZAR',
                'code' => 'R',
                'is_default' => '0',
                'exchange_rate' => '1.00',
                'decimal_place' => '2',
                'status' => 'inactive'
            ]
        ]);
    }
}
