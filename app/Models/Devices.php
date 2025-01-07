<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Devices extends Model
{
    use HasFactory;

    protected $fillable = [
        'serial_number',
        'device_name',
        'device_type',
        'registration',
        'qc_data',
        'text',
        'partners_id'
    ];
    public function partners() : BelongsTo
    {
        return $this->belongsTo(Partners::class);
    }
}
