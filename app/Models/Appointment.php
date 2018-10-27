<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Appointment extends Model
{
    
	public function user()
    {
    	return $this->belongsTo('App\Models\User');
    }


	public function billing()
    {
    	return $this->belongsTo('App\Models\Billing');
    }

}
