<?php


Route::get('/', function () {
    return view('web/home');
});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/admin/appointment','Admin\AdminController@appointment');
//Route::resource('appointment','Admin\AppointmentController');
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
    //Route::get('/appointment/creat', 'Admin\AppointmentController@create');
    //Route::resource('newappointment','NewAppointmentController');

    //Appointment vue
    //Route::resource('/appointment', 'Admin\Appointment\AppointmentController');
    Route::get('/getallappointment','Admin\Appointment\AppointmentController@getAllAppointment');

    //Patient
    Route::get('/patient', 'Admin\PatientController@index');

    //Symptoms
    Route::resource('/symptom','Admin\Symptom\SymptomController');

    //Billing
    Route::resource('/billing','Admin\Billing\BillingController');

    //Route::get('/appointment', 'Admin\AdminController@appointment');
    //Route::get('/setting', 'Admin\AdminController@setting');
    //Route::get('/option', 'Admin\OptionController@index');
    //Route::get('/user', 'Admin\UserController@index');
    //Route::get('/activate', 'Admin\UserController@activate');

    Route::group(['prefix' => 'user'],function(){
        Route::get('/activate', 'Admin\UserController@activate');
        Route::get('/deactivate', 'Admin\UserController@deactivate');
    });
});    