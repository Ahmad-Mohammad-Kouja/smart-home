<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserDeviceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('user_devices')->insert([
            [
                'user_id' => 1,
                'device_id' => 1,
                'sku' => 1,
                'current_state' => 0,
                'schedule' => json_encode(
                    array(0, 1, 1, 1, 1, 0, 0, 0, 1, 0, 1, 0, 0, 0, 1, 1, 0, 0, 1, 0, 1, 0, 1, 0)
                ),
                'created_at' => now()
            ],
            [
                'user_id' => 1,
                'device_id' => 2,
                'sku' => 2,
                'current_state' => 0,
                'schedule' => json_encode(
                    array(0, 1, 1, 1, 1, 0, 0, 0, 1, 0, 1, 0, 0, 0, 1, 1, 0, 0, 1, 0, 1, 0, 1, 0)),
                'created_at' => now()
            ],
            [
                'user_id' => 2,
                'device_id' => 1,
                'sku' => 3,
                'current_state' => 0,
                'schedule' => json_encode(
                    array(0, 1, 1, 1, 1, 0, 0, 0, 1, 0, 1, 0, 0, 0, 1, 1, 0, 0, 1, 0, 1, 0, 1, 0)),
                'created_at' => now()
            ],
            [
                'user_id' => 2,
                'device_id' => 2,
                'sku' => 4,
                'current_state' => 0,
                'schedule' => json_encode(
                    array(0, 1, 1, 1, 1, 0, 0, 0, 1, 0, 1, 0, 0, 0, 1, 1, 0, 0, 1, 0, 1, 0, 1, 0)),
                'created_at' => now()
            ]
        ]);
    }
}
