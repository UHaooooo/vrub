<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VehicleInsurance extends Model
{
    protected $fillable = [
		'provider',
		'insurance_type',
        'commencement_date',
        'expiry_date',
        'amount_paid',
        'status',
        'vehicle_id',
	];
	
	public function vehicle()
	{
		return $this->belongsTo('App\Vehicle');
	}
}
