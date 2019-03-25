<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Citizen extends Model
{
    protected $fillable = [
        'identification_number',
        'name',
        'address',
        'postcode',
        'city',
        'state',
	];
	
	public function tenders()
	{
		return $this->hasMany('App\Tender');
	}
}
