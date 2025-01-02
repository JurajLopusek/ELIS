<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

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
}
