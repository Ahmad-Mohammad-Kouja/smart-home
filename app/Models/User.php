<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\DB;

class User extends Authenticatable
{
    use HasFactory, Notifiable,SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'country_id' => 'integer',
    ];

    public function UserDevice()
    {
        return $this->hasMany(UserDevice::class);
    }

    public function getEachUserDevices()
    {
        return DB::table('users')
            ->join('countries', 'countries.id', '=', 'users.country_id')
            ->join('user_devices','user_devices.user_id','=','users.id')
            ->where('user_devices.is_active',1)
            ->whereNull('users.deleted_at')
            ->whereNull('user_devices.deleted_at')
            ->select('users.id','users.name','countries.timezone','user_devices.schedule',
            'user_devices.id as user_device_id','user_devices.current_state')
            ->get();
    }
}
