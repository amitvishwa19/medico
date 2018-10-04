<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Appointment;
use App\Models\User;
use App\Models\Option;
use App\Models\Billing;
use DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Database\Eloquent\Model;

class AppointmentController extends Controller
{
   
    public function __construct() {
        $this->middleware('auth');
        $this->middleware('admin');
    }


    public function index(){

        //$appointment = appointment::with('user')->get();
        //return $appointment;
        //dd($appointment);

        $users = user::orderby('id','desc')->orderby('id','desc')->get();
        //$appointments = DB::table('appointments')->orderby('id','desc')
                        //->leftjoin('users','users.id','=','appointments.user_id')
                        //->select('appointments.*', 'users.firstname', 'users.lastname')
                        //->get();
        $appointments = appointment::with('user','billing')->orderby('id','desc')->get();
        //dd($appointments);
        return view('admin/appointment/appointment',compact('users','appointments'));
    }

    public function today_appointment(){
        return view('admin/appointment/appointment_today');
    }

    public function new_appointment(){
        return view('admin/appointment/appointment_new');
    }
   
    public function create() {

       

        $users = user::orderby('id','desc')->orderby('id','desc')->get();

        $symptoms = option::where('type','=','Dropdown')
                    -> where('name','=','symptoms')
                    ->orderby('id','desc')->get();

        $visittypes = option::where('type','=','Dropdown')
                              -> where('name','=','visit_type')
                              ->orderby('id','desc')->get();

        $billingcharges = option::where('type','=','Dropdown')
                        -> where('name','=','billing_status')
                        ->orderby('id','desc')->get();

        $reffered = option::where('type','=','Dropdown')
                            ->where('name','=','reffered_to')
                            ->orderby('id','desc')->get();

        return view('admin/appointment/appointment_new',compact('appointment','users','symptoms','visittypes','billingcharges','reffered','current_user'));
    }

    
    public function store(Request $request){

        //return $request->all();
        $bill =new Billing;
        $bill->user_id = $request->id;
        $bill->appointment_date = $request->appointment_date;
        $bill->save();

        $obj = new Appointment;
        $obj->user_id = $request->id;
        $obj->billing_id = $bill->id;
        $obj->appointment_date = $request->appointment_date;        
        $is_saved = $obj->save();
        if($is_saved){
            session()->flash('patientmessage','New Appointment created, Please complete appointment details by clicking edit field');

            $e_bill = Billing::find($bill->id);
            $e_bill->appointment_id=$obj->id;
            $e_bill->save();

            return redirect('admin\appointment\all');
        }else{
            session()->flash('patientmessage','Data Not Saved');
            return redirect('admin\appointment\all');
        }
    }

    
    
    public function show($id){
        //
    }

   
    public function edit($id){   

        //return $id;

        $users = user::orderby('id','desc')->orderby('id','desc')->get();

        $symptoms = option::where('type','=','Dropdown')
                    -> where('name','=','symptoms')
                    ->orderby('id','desc')->get();

        $visittypes = option::where('type','=','Dropdown')
                              -> where('name','=','visit_type')
                              ->orderby('id','desc')->get();

        $billingcharges = option::where('type','=','Dropdown')
                        -> where('name','=','billing_status')
                        ->orderby('id','desc')->get();

        $reffered = option::where('type','=','Dropdown')
                            ->where('name','=','reffered_to')
                            ->orderby('id','desc')->get();

        $current_user = User::find(1);
        //$appointment = Appointment::find($id);
        $appointment = appointment::with('user','billing')->find($id);//->with('user');
        //$appointment = appointment::find($id)->user;
        //dd($appointment);
        return view('admin/appointment/appointment_edit',compact('appointment','users','symptoms','visittypes','billingcharges','reffered','current_user'));
       
    }

  
    public function update(Request $request, $id){

        //return $request->all();

        $billing = Billing::find($request->billing_id);
        $billing->appointment_id = $request->appointment_id;
        $billing->bill_status = $request->billing_status;
        $billing->bill_paid = $request->billing_paid;
        $billing->save();

        $appointment = Appointment::find($id);
        $appointment->family_id = $request->familyid;     
        $appointment->visit_type = $request->visittype;
        $appointment->symptoms = $request->symptoms;
        $appointment->visit_comment = $request->visit_comment;
        $appointment->prescription = $request->prescription;      
        //$appointment->billing_status = $request->billing_status;
        //$appointment->billing_paid = $request->billing_paid;
        $appointment->reffered_to = $request->reffered_to;
        $appointment->appointment_date = $request->appointment_date;
        $appointment->next_visit_date = $request->next_visit_date;
        $is_saved = $appointment->save();
        if($is_saved){
                session()->flash('patientmessage','Appointment Updated successfully');
                return redirect('admin/appointment/all');
        }{
                session()->flash('patientmessage','Data Not Saved');
                return redirect('appointment/'.$id.'/edit');
        }
        
        return $request->billing_status ;
    }

   
    public function destroy($id){
             
        $appointment = appointment::find($id);
        $is_deleted=$appointment->delete();
        if($is_deleted){
            session()->flash('patientmessage','Appointment deleted successfully');
            return redirect('admin/appointment/all');
        }

         
    }
}
