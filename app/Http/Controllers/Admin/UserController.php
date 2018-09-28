<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;

class UserController extends Controller
{
    

    public function index(){
        $users = user::get();



        return view('admin/user',compact('users'));
    }

    public function activate(Request $request,$id){
        

        return 'Activated'.$request;
    }

    public function deactivate(Request $request){
        

        return 'deActivated';
    }
}
