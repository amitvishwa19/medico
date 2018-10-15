<?php


Route::get('/', function () {
    return view('web/home');
});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/admin/vuebilling','Admin\AdminController@billing');


//Appointment
Route::get('/admin/vueappointment','Admin\AdminController@appointment');
Route::get('/admin/appointment/new','Admin\AdminController@bookAppointment');


Route::resource('appointment','Admin\AppointmentController');
//Route::resource('patient','Admin\PatientController');
//Route::resource('newuser','NewUserController');
//Route::resource('newuserappointment','AppntNewUserController');
//Route::resource('report','ReportController');


//User profile for their appointment and billing details
//Route::get('/profile', 'MyProfileController@index')->middleware('admin');

//Admin Route Group
Route::group(['prefix' => 'admin','middleware'=>['auth','admin']],function(){

    Route::get('/dashboard', 'Admin\AdminController@dashboard')->name('admin.home');

    //Appointment
    //Route::get('/appointment/all', 'Admin\AppointmentController@index');
    //Route::get('/appointment/today', 'Admin\AppointmentController@today_appointment');
    //Route::get('/appointment/create', 'Admin\AppointmentController@create');
    //Route::resource('newappointment','NewAppointmentController');

    //Appointment vue
    Route::get('/appointment/all','Admin\AdminController@allappointment');
    Route::get('/appointment/allappointment','Admin\Appointment\AppointmentController@getAllAppointment'); //Controller for all appointment
    Route::get('/appointment/searchappointment/{term1?}-{term2?}-{term3?}','Admin\Appointment\AppointmentController@allAppointment'); //Controller for all
    Route::get('/appointment/alluser','Admin\Appointment\AppointmentController@allUser'); //Controller for all  
    Route::get('/appointment/searchuser/{term?}','Admin\Appointment\AppointmentController@userSearch'); //Controller for all  
    Route::resource('/appointment/saveappointment','Admin\Appointment\AppointmentController'); // for edit and delete appointment
    Route::get('/appointment/newappointmentdropdowns','Admin\Appointment\AppointmentController@newAppointmentDropdowns');//dropdowns for all 
    Route::resource('/appointment/saveappointment','Admin\Appointment\AppointmentController');



    Route::get('/appointment/booknew','Admin\AdminController@bookAppointment');






    Route::get('/getallappointment','Admin\Appointment\AppointmentController@getAllAppointment');
    Route::get('/newappointmentdropdowns','Admin\Appointment\AppointmentController@newAppointmentDropdowns');
    Route::get('/searchappointment/{term1?}','Admin\Appointment\AppointmentController@getAllAppointment');
    Route::resource('/saveappointment','Admin\Appointment\AppointmentController');

    //Billing vue


    //Patient
    Route::get('/patient', 'Admin\PatientController@index');
    Route::get('/user/newuser','Admin\AdminController@newUser');


    //Symptoms
    Route::resource('/symptom','Admin\Symptom\SymptomController');

    //Billing
    Route::resource('/billing','Admin\Billing\BillingController');


    Route::group(['prefix' => 'user'],function(){
        Route::get('/activate', 'Admin\UserController@activate');
        Route::get('/deactivate', 'Admin\UserController@deactivate');
    });
});    