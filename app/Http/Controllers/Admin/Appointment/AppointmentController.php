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

        $symptoms=Symptom::get();

        $users=User::get();

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

   
    public function store(Request $request){
        

        
        $appointment = new Appointment;
        $appointment->user_id=$request->userid;
        $appointment->family_id=$request->familyhead;
        $appointment->billing_id= 60;
        $appointment->prescription= $request->prescription;
        $appointment->visit_comment = $request->visitcomment;
        $is_saved=$appointment->save();
        
        if($is_saved){
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
        //
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
