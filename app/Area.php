<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Area extends Model
{
    protected $fillable = [
        'id',
        'code',
        'name',
    ];

    public function vehicleRegistrationNumbers()
    {
        return $this->hasMany('App\VehicleRegistrationNumber');
    }

    public function latestVehicleRegistrationNumber()
    {
        return $this->hasOne('App\VehicleRegistrationNumber')->where('status', 'FREE')->orderBy('id', 'asc');
    }

    public function tenderSessions()
    {
        return $this->hasMany('App\TenderSession');
    }
}
