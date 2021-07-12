<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CountrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('countries')->insert([
            [
                'name' => 'Armenia',
                'timezone' => 'Asia/Yerevan',
                'created_at' => now()
            ],
            [
                'name' => 'Argentina',
                'timezone' => 'America/Buenos_Aires',
                'created_at' => now()
            ]
            ]);
    }
}
