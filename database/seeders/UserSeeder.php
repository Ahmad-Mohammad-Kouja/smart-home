<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
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
                'name' => 'jack',
                'email' => 'jack@email.com',
                'email_verified_at' => now(),
                'password' => Hash::make('password'),
                'country_id' => 1,
                'created_at' => now()
            ],
            [
                'name' => 'Emma',
                'email' => 'Emma@email.com',
                'email_verified_at' => now(),
                'password' => Hash::make('password'),
                'country_id' => 2,
                'created_at' => now()
            ]
        ]);
    }
}
