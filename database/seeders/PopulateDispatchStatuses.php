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
            ],
            [
                'name' => 'Active',
            ],
            [
                'name' => 'Pending',
            ],
            [
                'name' => 'Completed',
            ],
        ]);
    }
}
