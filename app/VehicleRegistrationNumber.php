<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VehicleRegistrationNumber extends Model
{
    protected $fillable = [
        'registration_number',
        'status',
        'area_id',
    ];

    public function area()
    {
        return $this->belongsTo('App\Area');
    }

    public function vehicle()
    {
        return $this->belongsTo('App\Vehicle', 'registration_number_id', 'id');
    }

    public function tenders()
    {
        return $this->hasMany('App\Tender', 'registration_number_id', 'id');
    }
}
