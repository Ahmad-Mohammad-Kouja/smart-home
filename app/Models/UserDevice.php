<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;

class UserDevice extends Model
{
    use HasFactory,SoftDeletes;

    protected $table = 'user_devices';

    protected $fillable = ['schedule','user_id','device_id','current_state','is_active'];

    protected $casts = [
        'user_id' => 'integer',
        'device_id' => 'integer',
        'is_active' => 'boolean',
        'schedule' => AsCollection::class,
    ];


    public function scopeActive($query)
    {
        return $query->where('is_active',1);
    }

    public function turnOnUserDevices($userDevicesIds)
    {
        return $this->whereIn('id',$userDevicesIds)
            ->active()
            ->update(['current_state' => 1]);
    }

    public function turnOffUserDevices($userDevicesIds)
    {
        return $this->whereIn('id',$userDevicesIds)
            ->active()
            ->update(['current_state' => 0]);
    }

}
