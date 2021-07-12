<?php

namespace App\Jobs;

use App\Models\UserDevice;
use Carbon\Carbon;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class ToogleUserDevicesStateJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $userDevices;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($userDevices)
    {
        $this->userDevices = $userDevices;
    }

    /**
     * check each user device currnet schedule hour state
     * change user device state on/off if needed
     * @return void
     */
    public function handle(UserDevice $userDevice)
    {
        $userCountryTimeZone  = $this->userDevices[0]?->timezone;
        $userDevicesToBeTurnedOn = array();
        $userDevicesToBeTurnedOff = array();

        foreach($this->userDevices as $userDeviceData)
        {
            $currentUserTimezoneHour = Carbon::createFromFormat('Y-m-d H:i:s',now(),
  config('app.timezone'))->setTimezone($userCountryTimeZone)->hour;

            $userDeviceSchedule = json_decode($userDeviceData->schedule,true);
            $userDeviceScheduleCurrentHourState = $userDeviceSchedule[$currentUserTimezoneHour];

         if($userDeviceScheduleCurrentHourState != $userDeviceData->current_state)
            ($userDeviceScheduleCurrentHourState == 0) ?
            array_push( $userDevicesToBeTurnedOff ,$userDeviceData->user_device_id)
          : array_push( $userDevicesToBeTurnedOn ,$userDeviceData->user_device_id);

        }

        if(count($userDevicesToBeTurnedOn) > 0)
            $userDevice->turnOnUserDevices($userDevicesToBeTurnedOn);

        if(count($userDevicesToBeTurnedOff) > 0)
            $userDevice->turnOffUserDevices($userDevicesToBeTurnedOff);

    }
}
