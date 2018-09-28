<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Option;

class OptionController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
        $this->middleware('admin');
    }

    public function index(){
        //$options = option::where('type','=','Dropdown')->orderby('id','desc')->distinct()->get();
        
        
        $options = option::where('type','=','Dropdown')->get();


        //dd($options);

        return view('admin/option',compact('options'));
    }


}
