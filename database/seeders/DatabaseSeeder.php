<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(CreateAdmin::class);
        $this->call(PopulateWarehouses::class);
        $this->call(PopulateBillableItems::class);
        $this->call(PopulateRates::class);
        $this->call(PopulateDispatchStatuses::class);
    }
}
