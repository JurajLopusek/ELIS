<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Products extends Model
{
    protected $fillable = [
        'serial_number',
        'name',
        'product_type',
        'calibration_time',
        'service_interval_time',
        'service_interval_m2',
        'service_interval_km',
        'application_subscription',
        'warning',
    ];
    public function devices(): HasMany
    {
        return $this->hasMany(Devices::class);
    }
    public static function findPrefix($prefix)
    {
        return self::where('serial_number', $prefix)->first();
    }
}
