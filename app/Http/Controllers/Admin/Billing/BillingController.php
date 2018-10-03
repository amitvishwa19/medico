<?php

namespace App\Http\Controllers\Admin\Billing;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Appointment;
use App\Models\User;
use App\Models\Option;
use App\Models\Billing;
use Illuminate\Support\Facades\Validator;
use Illuminate\Database\Eloquent\Model;
use DB;

class BillingController extends Controller
{
    
    public function index(){       
        
        //$clearbills=appointment::orderby('id','desc')->get();
        //$pendingbills=appointment::orderby('id','desc')->get();

        //$pendingbills = DB::table('appointments')->orderby('id','desc')
                        //->leftjoin('users','users.id','=','appointments.user_id')
                        //->select('appointments.*', 'users.firstname', 'users.lastname')
                        //->simplePaginate(10);

        $billing = Billing::with('user','appointment')->orderby('id','desc')->get();
        //dd($billing);                
        return view('admin/billing/billing',compact('billing'));
        //return view('admin/billing',compact('pendingbills'));
    }
    

 
    public function create(){
        //
    }

  
    public function store(Request $request){
        //
    }

    
    public function show($id){
        //
    }

   
    public function edit($id){
        //
    }

   
    public function update(Request $request, $id){
        //
    }

   
    public function destroy($id){
        //
    }
}
