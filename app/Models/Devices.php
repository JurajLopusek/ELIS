<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Devices extends Model
{
    use HasFactory;

    protected $fillable = [
        'serial_number',
        'device_name',
        'device_type',
        'registration',
        'qc_data',
        'text'
    ];
}
