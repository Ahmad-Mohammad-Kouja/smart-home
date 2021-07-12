<?php

namespace Database\Seeders;

use App\Models\UserDevice;
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
            CountrySeeder::class,
            UserSeeder::class,
            DeviceSeeder::class,
            UserDeviceSeeder::class,
        ]);
    }
}
