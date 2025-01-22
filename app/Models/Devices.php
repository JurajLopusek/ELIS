<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Devices extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = [
        'serial_number',
        'products_id',
        'device_type',
        'registration',
        'qc_data',
        'text',
        'partners_id',
        'deleted_at'
    ];
    public static function eRaptor()
    {
        return self::where('products_id', 1)->count();

    }
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
    public static function eRex()
    {
        return self::where('products_id', 3)->count();

    }
    public static function eRaptor2()
    {
        return self::where('products_id', 2)->count();

    }
    public function partners() : BelongsTo
    {
        return $this->belongsTo(Partners::class);
    }
    public function products() : BelongsTo
    {
        return $this->belongsTo(Products::class,'products_id');
    }

}
