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
    
    public function index()
    {
        return 'ok';
    }

    public function getAllAppointment(){
        
        $appointments =Appointment::orderBy('created_at','desc')->with('user','billing')->paginate(5);
        return request()->json(200,$appointments);
    }

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
   
    public function create()
    {
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
        $appointment->user_id=$request->userid;
        $appointment->family_id=$request->familyid;
        $appointment->billing_id= 60;
        $appointment->visit_type= $request->visittype;
        $appointment->symptoms= $request->symptom;
        $appointment->reffered_to= $request->reffered;
        $appointment->prescription= $request->prescription;
        $appointment->visit_comment = $request->visitcomment;
        $is_saved=$appointment->save();
        
        if($is_saved){

            $e_bill = Billing::find($bill->id);
            $e_bill->appointment_id=$appointment->id;
            $e_bill->save();

            
            $appointments =Appointment::orderBy('created_at','desc')->with('user','billing')->paginate(5);
            return request()->json(200,$appointments);
        }


    }

  
    public function show($id)
    {
        //
    }

   
    public function edit($id)
    {
        return $appointment = appointment::with('user','billing')->find($id);
        return 'edit called';
    }

    
    public function update(Request $request, $id)
    {
        //
    }

   
    public function destroy($id)
    {
        //
    }

}
