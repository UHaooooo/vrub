<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    protected $fillable = [
        'registration_number_id',
        'engine_number',
        'chassis_number',
        'production_year',
        'original_status',
        'engine_capacity',
        'number_of_seat',
        'color',
        'fuel_type',
        'purpose',
        'brand',
        'model',
        'vehicle_type',
        'laden_weight',
        'unladen_weight',
        'kerb_weight',
    ];

    public function VehicleRegistrationNumber()
    {
        return $this->hasOne('App\VehicleRegistrationNumber', 'id', 'registration_number_id');
    }

    public function vehicleLicenses()
    {
        return $this->hasMany('App\VehicleLicense');
    }

    public function vehicleInsurances()
    {
        return $this->hasMany('App\VehicleInsurance');
    }
}
