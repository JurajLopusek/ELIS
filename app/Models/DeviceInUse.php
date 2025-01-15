<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOneThrough;
use Illuminate\Support\Facades\DB;

class DeviceInUse extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_id',
        'device_id',
        'partner_id',
        'serial_number',
        'device_type',
        'registration',
        'qc_data',
        'cost',
        'text',
        'created_at',
        'updated_at',
    ];

//    public static function create(array $attributes)
//    {
//        $data = [
//            'device_id' => $attributes['device_id'],
//            'partner_id' => $attributes['partner_id'],
//            'device_name' => $attributes['device_name'],
//            'serial_number' => $attributes['serial_number'],
//        ];
//        return DeviceInUse::create($data);
//        // Perform any additional logic here, if needed
//        // Create and return the new DeviceInUse instance
//    }
    protected $table = 'devices_in_use';

    public static function create(array $attributes): bool
    {
        return DB::table((new static)->table)->insert($attributes);

    }

    public static function whereHasDevices()
    {
        return self::whereHas('devices', function ($query) {
            $query->onlyTrashed(); // Vyberie len zariadenia, ktoré sú vymazané
        });
    }


    public static function eRaptor()
    {
        return self::where('device_type', 'eRaptor')->count();

    }

    public static function eRex()
    {
        return self::where('device_type', 'eRex')->count();

    }

    public static function eRaptor2()
    {
        return self::where('device_type', 'eRaptor 2.0')->count();

    }

    public function devices(): BelongsTo
    {
        return $this->BelongsTo(Devices::class, 'device_id', 'id');
    }

    public function partners(): BelongsTo
    {
        return $this->belongsTo(Partners::class, 'partner_id', 'id');
    }

    public function products(): BelongsTo
    {
        return $this->belongsTo(Products::class, 'product_id', 'id');
    }

}
