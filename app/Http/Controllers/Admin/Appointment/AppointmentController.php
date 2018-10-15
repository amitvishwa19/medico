<?php

namespace App\Http\Controllers\Admin\Appointment;

use App\Models\Appointment;
use App\Models\User;
use App\Models\Option;
use App\Models\Billing;
use App\Models\Symptom;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Model;

use App\Http\Requests\Appointment\NewAppointment;

class AppointmentController extends Controller
{
    
    public function index($term=null){
        return 'ok';
    }

    public function userSearch($term=null){
        return 'User search result';
    }

    public function allAppointment($term1=null,$term2=null,$term3=null){
        if($term1 != null){
            //return $term2;
            $appointments['data'] =Appointment::where('id','like', '%'.$term1.'%')
                                    ->orWhere('visit_type','like', '%'.$term1.'%')
                                    ->with('user','billing')
                                    ->get();
            return request()->json(200,$appointments);
        }elseif($term1 != null && $term2 != null){
            return 'two term';
        }

        $appointments =Appointment::orderBy('id','desc')->with('user','billing')->paginate(3);
        return request()->json(200,$appointments);
    }//not in use


    public function getAllAppointment($term1=null){
        
        if($term1 != null){
            $appointments['data'] =Appointment::where('id','like', '%'.$term1.'%')
                                    ->orWhere('visit_type','like', '%'.$term1.'%')
                                    ->with('user','billing')
                                    ->get();
            return request()->json(200,$appointments);
        }

        $appointments =Appointment::orderBy('id','desc')->with('user','billing')->paginate(3);
        return request()->json(200,$appointments);
    }//need to delete after new menu works


    public function newAppointmentDropdowns(){

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
   
    public function create(){
        //


    }

    public function store(NewAppointment $request){
        
        //return $request->all();
        $bill =new Billing;
        $bill->user_id = $request->userid;
        $bill->bill_status = $request->billingstatus;
        $bill->bill_charge = $request->billingcharge;
        $bill->bill_paid = $request->billingpaid;
        //$bill->bill_pending = $request->appointment_date;
        $bill->save();

        $appointment = new Appointment;
        $appointment->user_id = $request->userid;
        $appointment->family_id =$request->familyid;
        $appointment->billing_id = $bill->id;
        $appointment->visit_type = $request->visittype;
        $appointment->symptoms = $request->symptom;
        $appointment->reffered_to = $request->reffered;
        $appointment->prescription = $request->prescription;
        $appointment->visit_comment = $request->visitcomment;
        $is_saved=$appointment->save();
        
        if($is_saved){

            $e_bill = Billing::find($bill->id);
            $e_bill->appointment_id=$appointment->id;
            $e_bill->save();

            
            $appointments =Appointment::orderBy('id','desc')->with('user','billing')->paginate(5);
            return request()->json(200,$appointments);
        }


    }

  
    public function show($id){
        //
    }

   
    public function edit($id){
        return $appointment = appointment::with('user','billing')->find($id);
        return 'edit called';
    }

    
    public function update(Request $request, $id){
        //return $request->all();
        $appointment = Appointment::find($id);   
        $appointment->visit_type = $request->visit_type;
        $appointment->symptoms = $request->symptoms;
        $appointment->visit_comment = $request->visit_comment;
        $appointment->prescription = $request->prescription;      
        $appointment->reffered_to = $request->reffered_to;
        //$appointment->appointment_date = $request->appointment_date;
        //$appointment->next_visit_date = $request->next_visit_date;
        $is_saved = $appointment->save();

    }

   
    public function destroy($id){
        $appointment = appointment::find($id);
        $is_deleted=$appointment->delete();
        if($is_deleted){
            $appointments =Appointment::orderBy('id','desc')->with('user','billing')->paginate(5);
            return request()->json(200,$appointments);
        }
    }

}
