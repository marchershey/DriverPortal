<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BillingItemsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('billing_items')->insert([
            [
                'name' => 'Roll Off',
                'rate_code' => 'roll_off',
                'visible_on' => 'stop',
            ],
            [
                'name' => 'Pack Out',
                'rate_code' => 'pack_out',
                'visible_on' => 'stop',
            ],
            [
                'name' => 'Drop Hook',
                'rate_code' => 'drop_hook',
                'visible_on' => 'stop',
            ],
            [
                'name' => 'Pallet',
                'rate_code' => 'pallet',
                'visible_on' => 'dispatch',
            ],
            [
                'name' => 'Stale',
                'rate_code' => 'stale',
                'visible_on' => 'dispatch',
            ],
            [
                'name' => 'Hourly',
                'rate_code' => 'hourly',
                'visible_on' => 'stop',
            ],
        ]);
    }
}
