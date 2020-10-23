<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class CreateAdmin extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'first_name' => 'marc',
                'last_name' => 'hershey',
                'email' => 'marclewishershey@gmail.com',
                'password' => Hash::make('wonder123'),
            ],
        ]);
    }
}
