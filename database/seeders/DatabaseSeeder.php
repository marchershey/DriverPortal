<?php

namespace Database\Seeders;

use App\Models\Dispatch;
use App\Models\User;
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
        $this->call([
            // MakeMarc::class,
            DispatchStatusSeeder::class,
            WarehouseSeeder::class,
            UserRatesSeeder::class,
            BillingItemsSeeder::class,
        ]);

        User::factory(1)->create();
        Dispatch::factory(15)->create();
    }
}
