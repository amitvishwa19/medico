<?php

namespace App\Http\Controllers\Admin\Patient;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;

class PatientController extends Controller
{
   
    public function index(){
        //
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
   
    public function create()
    {
        //
    }

   
    public function store(Request $request)
    {
        //
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
