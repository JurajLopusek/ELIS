<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Validation\Rule;

class Devices extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = [
        'serial_number',
        'device_name',
        'device_type',
        'registration',
        'qc_data',
        'text',
        'partners_id'
    ];

    public static function eRaptor()
    {
        return self::where('device_name', 'eRaptor')->count();

    }
    public static function eRex()
    {
        return self::where('device_name', 'eRex')->count();

    }
    public static function eRaptor2()
    {
        return self::where('device_name', 'eRaptor 2.0')->count();

    }
    public function partners() : BelongsTo
    {
        return $this->belongsTo(Partners::class);
    }
    public function products() : BelongsTo
    {
        return $this->belongsTo(Products::class);
    }
}
