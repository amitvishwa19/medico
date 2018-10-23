<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Appointment;
use App\Models\Option;
use App\Models\User;
use DB;

class AdminController extends Controller
{

  
    public function __construct() {
        $this->middleware('auth');
        $this->middleware('admin');
    }


    public function index(){

        return 'admin';
        return view('admin/dashboard');
    }

    public function dashboard(){

        $total_appointment=Appointment::where('appointment_date','=',date("Y/m/d"))->get();
        $total_count= $total_appointment->count();

        $fresh_appointment=Appointment::where('appointment_date','=',date("Y/m/d"))
                                    ->where('visit_type','=','Fresh Case')
                                    ->get();
        $fresh_count= $fresh_appointment->count();

        $followup_appointment=Appointment::where('appointment_date','=',date("Y/m/d"))
                                    ->where('visit_type','=','Follow Up')
                                    ->get();
        $followup_count= $followup_appointment->count();

        $emergency_appointment=Appointment::where('appointment_date','=',date("Y/m/d"))
                                    ->where('visit_type','=','Emergency')
                                    ->get();
        $emergency_count= $emergency_appointment->count();

       
        return view('admin/dashboard/dashboard',compact('total_count','fresh_count','followup_count','emergency_count'));
    }


    public function allDropdowns(){

        $users=User::get();

        $symptoms=option::where('type','=','Dropdown')
                            -> where('name','=','symptom')
                            ->orderby('id','desc')->get();

        $visittypes = option::where('type','=','Dropdown')
                              -> where('name','=','visit_type')
                              ->orderby('id','desc')->get();

        $billingstatus = option::where('type','=','Dropdown')
                        -> where('name','=','billing_status')
                        ->orderby('id','desc')->get();

        $billingcharge = option::where('type','=','Dropdown')
                        ->where('name','=','billing_charge')
                        ->orderby('id','desc')->get();

        $reffered = option::where('type','=','Dropdown')
                    ->where('name','=','reffered_to')
                    ->orderby('id','desc')->get();


        return request()->json(200,['symptom'=>$symptoms,'user'=>$users,'visittype'=>$visittypes,'billingstatus'=>$billingstatus,'reffered'=>$reffered,'billingcharge'=>$billingcharge]);
    }
    //Appointments

    public function appointment(){
        //return 'VueAppointment';
        return view('admin/appointment/vueappointment');
    }
    public function allappointment(){
        //return 'VueAppointment';
        return view('admin/appointment/appointment_all');
    }

    public function bookAppointment(){
        return view('admin/appointment/bookappointment');
    }

  
    public function delbilling(){

        return 'Billing';
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
