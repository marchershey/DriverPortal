<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PopulateRates extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('rates')->insert([
            [
                'months' => 12,
                'mileage' => 0.360,
                'roll_off' => 0.0280,
                'pack_out' => 0.0395,
                'hourly' => 12.00,
                'stop_pay' => 6.50,
                'drop_hook' => 6.50,
                'pallet' => 6.50,
                'stale' => 6.50,
            ],
            [
                'months' => 24,
                'mileage' => 0.365,
                'roll_off' => 0.0280,
                'pack_out' => 0.0404,
                'hourly' => 12.00,
                'stop_pay' => 6.50,
                'drop_hook' => 6.50,
                'pallet' => 6.50,
                'stale' => 6.50,
            ],
            [
                'months' => 36,
                'mileage' => 0.370,
                'roll_off' => 0.0289,
                'pack_out' => 0.0409,
                'hourly' => 12.00,
                'stop_pay' => 6.50,
                'drop_hook' => 6.50,
                'pallet' => 6.50,
                'stale' => 6.50,
            ],
            [
                'months' => 48,
                'mileage' => 0.375,
                'roll_off' => 0.0294,
                'pack_out' => 0.0414,
                'hourly' => 12.00,
                'stop_pay' => 6.50,
                'drop_hook' => 6.50,
                'pallet' => 6.50,
                'stale' => 6.50,
            ],
            [
                'months' => 60,
                'mileage' => 0.380,
                'roll_off' => 0.0299,
                'pack_out' => 0.0419,
                'hourly' => 12.00,
                'stop_pay' => 6.50,
                'drop_hook' => 6.50,
                'pallet' => 6.50,
                'stale' => 6.50,
            ],
            [
                'months' => 72,
                'mileage' => 0.385,
                'roll_off' => 0.0304,
                'pack_out' => 0.0424,
                'hourly' => 12.00,
                'stop_pay' => 6.50,
                'drop_hook' => 6.50,
                'pallet' => 6.50,
                'stale' => 6.50,
            ],
            [
                'months' => 84,
                'mileage' => 0.390,
                'roll_off' => 0.0309,
                'pack_out' => 0.0429,
                'hourly' => 12.00,
                'stop_pay' => 6.50,
                'drop_hook' => 6.50,
                'pallet' => 6.50,
                'stale' => 6.50,
            ],
            [
                'months' => 96,
                'mileage' => 0.395,
                'roll_off' => 0.0314,
                'pack_out' => 0.0434,
                'hourly' => 12.00,
                'stop_pay' => 6.50,
                'drop_hook' => 6.50,
                'pallet' => 6.50,
                'stale' => 6.50,
            ],
            [
                'months' => 100,
                'mileage' => 0.400,
                'roll_off' => 0.0317,
                'pack_out' => 0.0439,
                'hourly' => 12.00,
                'stop_pay' => 6.50,
                'drop_hook' => 6.50,
                'pallet' => 6.50,
                'stale' => 6.50,
            ],
        ]);
    }
}
