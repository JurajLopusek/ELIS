<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Partners extends Model
{
    protected $fillable = [
        'partner_name',
        'country',
        'distributor',
        'gps',
        'servis_distributor',
        'ico',
        'dic',
        'address',
        'contact_person1',
        'contact_person2',
    ];

    public function devices(): HasMany
    {
        return $this->hasMany(Devices::class);
    }

    public function deviceInUses(): HasMany
    {
        return $this->hasMany(DeviceInUse::class);
    }
}
