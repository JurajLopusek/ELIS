<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Partners extends Model
{
    protected $fillable = [
        'user_id',
        'company_name',
        'city',
        'ico',
        'dic',
        'address',
        'postal_code'
    ];

    public function devices(): HasMany
    {
        return $this->hasMany(Devices::class);
    }
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

}
