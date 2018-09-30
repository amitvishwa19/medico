<?php

namespace App\Http\Controllers\Admin\Billing;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class illingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         //$patients = patient::limit(5)->orderby('id','desc')->get() ;
        //return view('home',compact('patients'));
        
        $clearbills=appointment::orderby('id','desc')->get();
        //$pendingbills=appointment::orderby('id','desc')->get();

        $pendingbills = DB::table('appointments')->orderby('id','desc')
                        ->leftjoin('users','users.id','=','appointments.user_id')
                        ->select('appointments.*', 'users.firstname', 'users.lastname')
                        ->simplePaginate(10);


        //dd($pendingbills);                
        return view('admin/billing/billing',compact('clearbills','pendingbills'));
        //return view('admin/billing',compact('pendingbills'));
    }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
