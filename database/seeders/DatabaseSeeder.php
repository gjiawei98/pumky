<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('states')->insert([
            [
                'name' => 'Johor',
                'state_code' => 'JHR',
                'area' => 1,
            ],
            [
                'name' => 'Kedah',
                'state_code' => 'KDH',
                'area' => 1,
            ],
            [
                'name' => 'Kelantan',
                'state_code' => 'KTN',
                'area' => 1,
            ],
            [
                'name' => 'Malacca',
                'state_code' => 'MLK',
                'area' => 1,
            ],
            [
                'name' => 'Negeri Sembilan',
                'state_code' => 'NSN',
                'area' => 1,
            ],
            [
                'name' => 'Pahang',
                'state_code' => 'PHG',
                'area' => 1,
            ],
            [
                'name' => 'Penang',
                'state_code' => 'PNG',
                'area' => 1,
            ],
            [
                'name' => 'Perak',
                'state_code' => 'PRK',
                'area' => 1,
            ],
            [
                'name' => 'Perlis',
                'state_code' => 'PLS',
                'area' => 1,
            ],
            [
                'name' => 'Sabah',
                'state_code' => 'SBH',
                'area' => 2,
            ],
            [
                'name' => 'Sarawak',
                'state_code' => 'SWK',
                'area' => 2,
            ],
            [
                'name' => 'Selangor',
                'state_code' => 'SGR',
                'area' => 1,
            ],
            [
                'name' => 'Terengganu',
                'state_code' => 'TRG',
                'area' => 1,
            ],
            [
                'name' => 'Kuala Lumpur',
                'state_code' => 'KUL',
                'area' => 1,
            ],
            [
                'name' => 'Labuan',
                'state_code' => 'LBN',
                'area' => 1,
            ],
            [
                'name' => 'Putrajaya',
                'state_code' => 'PJY',
                'area' => 1,
            ]
        ]);

        DB::table('users')->insert([
            [
                'name' => 'abcd',
                'password' => Hash::make('123123123'),
                'email' => '123@gmail.com',
            ]
        ]);

        DB::table('couriers')->insert([
            [
                'name' => 'Pgeon',
                'tracking_url' => 'https://www.tracking.my/pgeon',
                'status' => 1,
            ],
            [
                'name' => 'Pos Laju',
                'tracking_url' => 'https://www.tracking.my/poslaju',
                'status' => 1,
            ],
            [
                'name' => 'GDex',
                'tracking_url' => 'https://www.tracking.my/gdex',
                'status' => 1,
            ],
            [
                'name' => 'ABX Express',
                'tracking_url' => 'https://www.tracking.my/abx',
                'status' => 1,
            ],
            [
                'name' => 'J&T Express',
                'tracking_url' => 'https://www.tracking.my/jt',
                'status' => 1,
            ],
            [
                'name' => 'Skynet Express',
                'tracking_url' => 'https://www.tracking.my/skynet',
                'status' => 1,
            ],
            [
                'name' => 'TA-Q-BIN',
                'tracking_url' => 'https://www.tracking.my/taqbin',
                'status' => 1,
            ],
            [
                'name' => 'Citylink',
                'tracking_url' => 'https://www.tracking.my/citylink',
                'status' => 1,
            ],
            [
                'name' => 'DHL Express',
                'tracking_url' => 'https://www.tracking.my/dhl',
                'status' => 1,
            ],
            [
                'name' => 'FedEx',
                'tracking_url' => 'https://trackposlaju.com/fedex-tracking/',
                'status' => 1,
            ]
        ]);
    }
}
