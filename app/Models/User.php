<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Billing;
use App\Models\Appointment;

class User extends Model
{
    public function appointment()
    {
    	return $this->belongsTo('App\Models\appointment');
    }


	public function billing()
    {
    	return $this->hasOne('App\Models\Billing');
    }
}
