<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Appointment;
use DB;

class AdminController extends Controller
{

  
    public function __construct() {
        $this->middleware('auth');
        $this->middleware('admin');
    }


    public function index(){

        return view('admin/dashboard');
    }

    public function dashboard(){

        $fresh_appointment=Appointment::where('visit_type','=','Fresh Case')->where('appointment_date','=',date("Y/m/d"))->get();
        $fresh_count= $fresh_appointment->count();

       

        return view('admin/dashboard',compact('fresh_count'));
    }

    public function appointment(){
        return view('admin/appointment/appointment');
    }

    public function billing(){
         //$patients = patient::limit(5)->orderby('id','desc')->get() ;
        //return view('home',compact('patients'));
        
        $clearbills=appointment::orderby('id','desc')->get();
        //$pendingbills=appointment::orderby('id','desc')->get();

        $pendingbills = DB::table('appointments')->orderby('id','desc')
                        ->leftjoin('users','users.id','=','appointments.user_id')
                        ->select('appointments.*', 'users.firstname', 'users.lastname')
                        ->simplePaginate(10);


        //dd($pendingbills);                
        return view('admin/billing/billing',compact('clearbills','pendingbills'));
        //return view('admin/billing',compact('pendingbills'));
    }


    public function setting(){
        return view('admin/setting');
    }


}
