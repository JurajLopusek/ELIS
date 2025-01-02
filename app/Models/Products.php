<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

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
}
