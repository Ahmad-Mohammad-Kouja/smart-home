<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserDevice extends Model
{
    use HasFactory;

    protected $table = 'user_devices';

    protected $fillable = ['schedule','user_id','device_id','current_state','is_active'];

    protected $casts = [
        'user_id' => 'integer',
        'device_id' => 'integer',
        'is_active' => 'boolean',
        'schedule' => AsCollection::class,
    ];

    public function scopeUserDevice($query,$userId,$deviceId)
    {
        return $query->where('user_id',$userId)
                    ->where('device_id',$deviceId);
    }

    public function scopeUserDevices($query,$userId,$devicesIds)
    {
        return $query->where('user_id',$userId)
                    ->whereIn('device_id',$devicesIds);
    }

    public function scopeActive($query)
    {
        return $query->where('is_active',1);
    }


    public function turnOnUserDevice($deviceId,$userId)
    {
        return $this->userDevice($userId,$deviceId)
            ->available()
            ->update(['current_state' => 1]);
    }

    public function turnOffUserDevice($deviceId,$userId)
    {
        return $this->userDevice($userId,$deviceId)
            ->available()
            ->update(['current_state' => 0]);
    }


    public function turnOnUserDevices($devicesIds,$userId)
    {
        return $this->userDevices($userId,$devicesIds)
            ->available()
            ->update(['current_state' => 1]);
    }

    public function turnOffUserDevices($devicesIds,$userId)
    {
        return $this->userDevices($userId,$devicesIds)
            ->available()
            ->update(['current_state' => 0]);
    }
}
