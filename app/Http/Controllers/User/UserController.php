<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\User\NewUser;
use App\Models\User;

class UserController extends Controller
{
  
    public function index(){
        return view('admin/user/profile');
    }


    public function create(){
        //
    }

    public function store(NewUser $request){
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
