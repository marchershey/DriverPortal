<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PopulateDispatchStatuses extends Seeder
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
                'name' => 'Draft',
                'bg_color' => 'bg-gray-200',
                'text_color' => 'text-gray-800',
            ],
            [
                'name' => 'Active',
                'bg_color' => 'bg-blue-200',
                'text_color' => 'text-blue-800',
            ],
            [
                'name' => 'Pending',
                'bg_color' => 'bg-yellow-200',
                'text_color' => 'text-yellow-800',
            ],
            [
                'name' => 'Completed',
                'bg_color' => 'bg-green-200',
                'text_color' => 'text-green-800',
            ],
        ]);
    }
}
