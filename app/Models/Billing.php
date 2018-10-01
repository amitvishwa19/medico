<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Billing extends Model{



	public function user()
    {
    	return $this->belongsTo('App\Models\User');
    }


    public function appointment()
    {
    	return $this->hasOne('App\Models\Appointment');
    }
}
