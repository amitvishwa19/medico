<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Billing;
use App\Models\Appointment;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Model
{
    public function appointment()
    {
    	return $this->belongsTo('App\Models\Appointment');
    }


	public function billing()
    {
    	return $this->hasOne('App\Models\Billing');
    }
}
