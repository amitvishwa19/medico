<?php

namespace App\Http\Controllers\Admin\Patient;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Billing;
use App\Models\Appointment;
use DB;
use App\Http\Requests\Patient\NewPatient;

class PatientController extends Controller
{
   
    public function index(){
        return view('admin/patient/allpatient');
    }

    public function allPatients(){

        $patients=User::orderBy('firstname','asc')->with('appointment','billing')->paginate(5);
        return request()->json(200,$patients);

    }



    public function newPatient(){
        return view('admin/patient/newpatient');
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

    public function patientBill(Request $request){
       
        $totalbill = DB::table('billings')
                            ->where('user_id', $request->string)
                            ->sum('bill_charge');

        $paidbill = DB::table('billings')
                            ->where('user_id', $request->string)
                            ->sum('bill_paid');
        //$outstanding=  $totalbill - $paidbill                 

        return request()->json(200,array($totalbill,$paidbill));                    
        return array($totalbill,$paidbill);                    
        //$result['totalbill':$totalbill,'paidbill':$paidbill]                    
        
        //return $result;//request()->json(200,$result);
    }
   
    public function create() {
        //
    }

   
    public function store(NewPatient $request) {

        //NewUser
        $user = new User;
        $user->firstname = $request->firstname;
        $user->lastname = $request->lastname;
        $user->email = $request->email;
        $user->mobile=$request->mobile;
        $user->address=$request->address;
        $is_save = $user->save();

        if($is_save){
            return $user->id;
        }

    }

   
    public function show($id) {
        //
    }

    public function edit($id) {
        //
    }

   
    public function update(Request $request, $id) {
        //
    }

 
    public function destroy($id) {
        //
    }
}
