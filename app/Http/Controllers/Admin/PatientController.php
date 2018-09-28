<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use DB;

use Illuminate\Support\Facades\Validator;
use Illuminate\Database\Eloquent\Model;

class PatientController extends Controller
{   

   
    public function index()
    {
        //return 'new patient';
        return view('admin/user/new_user');
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
