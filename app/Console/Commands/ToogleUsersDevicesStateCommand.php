<?php

namespace App\Console\Commands;


use App\Jobs\ToogleUserDevicesStateJob;
use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Arr;

class ToogleUsersDevicesStateCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'toogle:users_devices_state';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'toogle users device state based on user device schedule';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * get all users with user devices
     * dispatch each user data to job for changing devices state
     * @return int
     */
    public function handle(User $user)
    {
        $usersDevices = Arr::groupBy($user->getEachUserDevices(),'id');
        foreach($usersDevices as $userDevices)
            dispatch(new ToogleUserDevicesStateJob($userDevices));
    }
}
