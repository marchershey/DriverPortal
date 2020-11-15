<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DispatchStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('dispatch_statuses')->insert([
            [
                'name' => 'open',
                'bg_color' => 'bg-green-400',
                'text_color' => 'text-white',
                'text_bg_color' => 'text-green-400',
            ],
            [
                'name' => 'completed',
                'bg_color' => 'bg-gray-400',
                'text_color' => 'text-white',
                'text_bg_color' => 'text-gray-400',
            ],

        ]);
    }
}
