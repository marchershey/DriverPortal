<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class MakeMarc extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'first_name' => 'John',
            'last_name' => 'Smith',
            'email' => 'admin@admin.com',
            'password' => Hash::make('password'),
            'hire_date' => date('Y-m-d'),
            'is_admin' => 1,
        ]);
    }
}
