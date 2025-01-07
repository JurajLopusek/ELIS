<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Facades\DB;

class DeviceInUse extends Model
{
    use HasFactory;

    protected $fillable = [
        'device_id',
        'partner_id',
        'device_name',
        'serial_number'];

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
}
