<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VehicleLicense extends Model
{
    protected $fillable = [
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
