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

    public function allUser(){
        $users=User::orderby('firstname','asc')->paginate(5);
        return request()->json(200,$users);
    }

    public function searchPatient(Request $request){
        
        if( $request->string == !null ){
            $user['data'] =User::where('firstname','like', '%'.$request->string.'%')
                                ->orWhere('lastname','like', '%'.$request->string.'%')
                                ->orWhere('email','like', '%'.$request->string.'%')
                                ->orWhere('mobile','like', '%'.$request->string.'%')
                                ->orWhere('address','like', '%'.$request->string.'%')
                                ->get();
            return request()->json(200,$user);
        }else{
            $user =User::orderBy('firstname','asc')->paginate(5);
            return request()->json(200,$user);
        } 
    }

    public function allAppointment(){
        $appointments =Appointment::orderBy('id','desc')->with('user','billing')->paginate(5);
        return request()->json(200,$appointments);
    }

    public function allSearch(Request $request){

        if( $request->visit == !null && $request->sdate == null && $request->edate == null ){
            $appointments['data'] =Appointment::where('visit_type','like', '%'.$request->visit.'%')
                                ->with('user','billing')->get();
            return request()->json(200,$appointments);

        }else if( $request->visit == !null && $request->sdate == !null && $request->edate == null ){

            $appointments['data'] =Appointment::where('visit_type','like', '%'.$request->visit.'%')
                                ->Where('appointment_date','>=', $request->sdate)
                                ->with('user','billing')->get();
            return request()->json(200,$appointments);

        }else if( $request->visit == !null && $request->sdate == null && $request->edate == !null ){

            $appointments['data'] =Appointment::where('visit_type','like', '%'.$request->visit.'%')
                                ->Where('appointment_date','<=', $request->sdate)
                                ->with('user','billing')->get();
            return request()->json(200,$appointments);

        }else if( $request->visit == !null && $request->sdate == !null && $request->edate == !null ){
            $appointments['data'] =Appointment::where('visit_type','like', '%'.$request->visit.'%')
                                ->Where('appointment_date','>=', $request->sdate)
                                ->Where('appointment_date','<=', $request->edate)
                                ->with('user','billing')->get();
            return request()->json(200,$appointments);

        }else if( $request->visit == null && $request->sdate == !null && $request->edate == !null ){
            $appointments['data'] =Appointment::Where('appointment_date','>=', $request->sdate)
                                ->Where('appointment_date','<=', $request->edate)
                                ->with('user','billing')->get();
            return request()->json(200,$appointments);
        }else{
            $appointments =Appointment::orderBy('id','desc')->with('user','billing')->paginate(5);
            return request()->json(200,$appointments);
        }
    }

  
    public function getAllAppointment($term1=null){
        
        if($term1 != null){
            $appointments['data'] =Appointment::where('id','like', '%'.$term1.'%')
                                    ->orWhere('visit_type','like', '%'.$term1.'%')
                                    ->with('user','billing')
                                    ->paginate(5);
            return request()->json(200,$appointments);
        }

        $appointments =Appointment::orderBy('id','desc')->with('user','billing')->paginate(5);
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

    public function store(Request $request){
        //NewAppointment
        //return $request->all();

        $bill =new Billing;
        $bill->user_id = $request->userid;
        $bill->appointment_date = $request->apntdate;
        $bill_charge = $request->billing_charge;
        $bill->bill_date = $request->apntdate;
        $bill->save();

        $appointment = new Appointment;
        $appointment->user_id = $request->userid;
        $appointment->billing_id = $bill->id;
        $appointment->visit_type = $request->visittype;
        $appointment->appointment_date = $request->apntdate;
        $appointment->appointment_time = $request->apnttime;
        $appointment->symptoms = $request->symptom;
        $appointment->visit_comment = $request->visitcomment;
        $is_saved=$appointment->save();
         return $appointment->id;
       
        if($is_saved){
            $e_bill = Billing::find($bill->id);
            $e_bill->appointment_id=$appointment->id;
            $e_bill->save();
            return $appointment->id;     
        }

    }

   
    public function show($id){
        //
    }

   
    public function edit($id){
        return $appointment = appointment::with('user','billing')->find($id);
    }

    
    public function update(Request $request, $id){

    

        $appointment = Appointment::find($id);   
        $appointment->visit_type = $request->visit_type;
        $appointment->symptoms = $request->symptoms;
        $appointment->visit_comment = $request->visit_comment;
        $appointment->prescription = $request->prescription;      
        $appointment->reffered_to = $request->reffered_to;
        //$appointment->appointment_date = $request->appointment_date;
        //$appointment->next_visit_date = $request->next_visit_date;
        $is_saved = $appointment->save();

        $billing = Billing::find($request->billing_id);
        $billing->bill_charge = $request->billing_charge;
        $billing->save();
 
        if($is_saved){
            $appointments =Appointment::orderBy('id','desc')->with('user','billing')->paginate(5);
            return request()->json(200,$appointments);
        }

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
