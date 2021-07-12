<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DeviceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('devices')->insert([
            [
                'name' => 'air condition',
                'description' => 'air condition device',
                'default_schedule' => json_encode(
                    array(1,0,1,0,1,0,1,0,1,0,1,0,1,0,1,0,1,0,1,0,1,0,1,0)),
                'created_at' => now()
            ],
            [
                'name' => 'Washing mashine',
                'description' => 'washing machine device',
                'default_schedule' => json_encode(
                    array(0,1,1,1,1,0,0,0,1,0,1,0,0,0,1,1,0,0,1,0,1,0,1,0)),
                'created_at' => now()
            ]
        ]);
    }
}
