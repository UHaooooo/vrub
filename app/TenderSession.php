<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TenderSession extends Model
{
    protected $fillable = [
        'name',
        'start_date',
        'end_date',
        'area_id',
        'status',
    ];

    public function tenders()
    {
        return $this->hasMany('App\Tender', 'tender_session_id', 'id');
    }

    public function area()
    {
        return $this->belongsTo('App\Area');
    }
}
