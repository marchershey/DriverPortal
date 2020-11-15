<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class WarehouseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('warehouses')->insert([
            [
                'name' => 'Knoxville, TN',
            ],
            [
                'name' => 'Northwood, OH',
            ],
            [
                'name' => 'London Thrift',
            ],
            [
                'name' => 'Paducah, KY',
            ],
            [
                'name' => 'Clarksville, TN',
            ],
            [
                'name' => 'Columbus, OH',
            ],
            [
                'name' => 'Indy West',
            ],
            [
                'name' => 'Indy East',
            ],
            [
                'name' => 'New Albany, IN',
            ],
            [
                'name' => 'Ashland, KY',
            ],
            [
                'name' => 'Charleston, WV',
            ],
            [
                'name' => 'Hazard, KY',
            ],
            [
                'name' => 'Keen Mountain, VA',
            ],
            [
                'name' => 'Parkersburg, WV',
            ],
            [
                'name' => 'Portsmouth, KY',
            ],
            [
                'name' => 'Prestonburg, KY',
            ],
            [
                'name' => 'Williamson, WV',
            ],
            [
                'name' => 'Russell Springs, KY',
            ],
            [
                'name' => 'Seymour, IN',
            ],
            [
                'name' => 'Lafayette, IN',
            ],
            [
                'name' => 'Danville, KY',
            ],
            [
                'name' => 'Terre Haute, IN',
            ],
            [
                'name' => 'Marion, IN',
            ],
            [
                'name' => 'Campbellsville, KY',
            ],
            [
                'name' => 'Glassgow, KY',
            ],
            [
                'name' => 'London, KY',
            ],
            [
                'name' => 'Morehead, KY',
            ],
            [
                'name' => 'Mount Sterling, KY',
            ],
            [
                'name' => 'Lexington, KY',
            ],
            [
                'name' => 'Louisville, KY',
            ],
            [
                'name' => 'Bowling Green, KY',
            ],
            [
                'name' => 'Owensboro, KY',
            ],
            [
                'name' => 'Erlanger, KY',
            ],
            [
                'name' => 'Dayton, OH',
            ],
            [
                'name' => 'Cincinnati, OH',
            ],
            [
                'name' => 'Evansville, IN',
            ],
        ]);
    }
}
