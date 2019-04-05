<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tender extends Model
{
    protected $fillable = [
        'registration_number_id',
        'tender_session_id',
        'citizen_id',
        'tender_amount',
        'paid_amount',
        'status',
        'tender_date',
        'tender_success_date',
        'expiry_date',
	];
	
	public function vehicleRegistrationNumber()
	{
		return $this->hasOne('App\VehicleRegistrationNumber','id','registration_number_id');
	}

	public function tenderSession()
	{
		return $this->hasOne('App\TenderSession','id','registration_number_id');
	}

	public function citizen()
	{
		return $this->hasOne('App\Citizen');
	}
}
