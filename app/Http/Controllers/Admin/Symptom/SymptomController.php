<?php

namespace App\Http\Controllers\Admin\Symptom;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Symptom;
use DB;
use Illuminate\Support\Facades\Validator;

class SymptomController extends Controller
{
   
    public function index(){

        $symptoms = symptom::orderby('id','desc')->get();
        

        return view('admin/symptom/symptom',compact('symptoms'));
    }

   
    public function create()
    {
       return view('admin/symptom/symptom_new');
    }

 
    public function store(Request $request){

        $validator = Validator::make($request->all(),[
                'symptom' => 'required|max:225|unique:symptoms',
                'symptomdescription' => 'required',  
            ],[
                'symptom.required' => 'Symptom is required',
                'symptomdescription.required' => 'Please give a short description of symptom',
            ])->Validate();


        $obj = new Symptom;
        $obj->symptom = $request->symptom;
        $obj->symptom_description = $request->symptomdescription;        
        $is_saved = $obj->save();
      

        if($is_saved){
            session()->flash('response_msg','New Symptom saved');
            return redirect('admin/symptom');
        }else{
            session()->flash('response_msg','Data Not Saved');
            return redirect('admin/symptom/symptom_new');
        }


    }

    
    public function show($id)
    {
        //
    }

  
    public function edit($id)
    {
        $symptoms = symptom::find($id);
        return view('admin/symptom/symptom_edit',compact('symptoms'));
    }

  
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(),[
                'symptom' => 'required|max:225',
                'symptomdescription' => 'required',  
            ],[
                'symptom.required' => 'Symptom is required',
                'symptomdescription.required' => 'Please give a short description of symptom',
            ])->Validate();

        $obj = Symptom::find($id);
        $obj->symptom = $request->symptom;
        $obj->symptom_description = $request->symptomdescription;        
        $is_saved = $obj->save();

        if($is_saved){
            session()->flash('response_msg','Symptom edited succesfully');
            return redirect('admin/symptom');
        }else{
            session()->flash('response_msg','Data Not Saved');
            return redirect('admin/symptom/symptom_new');
        }
    }

 
    public function destroy($id)
    {
        $symptom = symptom::find($id);
        $is_deleted=$symptom->delete();
        if($is_deleted){
            session()->flash('response_msg','Symptom deleted succesfully');
            return redirect('admin/symptom');
        }
    }
}
