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

//Admin Route Group
Route::group(['prefix' => 'admin','middleware'=>['auth','admin']],function(){

    Route::get('/dashboard', 'Admin\AdminController@dashboard')->name('admin.home');


    //Appointment vue
    Route::get('/appointment/all','Admin\AdminController@allappointment');
    Route::get('/appointment/allappointment','Admin\Appointment\AppointmentController@AllAppointment'); //Controller for all appointment
    Route::get('/appointment/searchappointment','Admin\Appointment\AppointmentController@allAppointment'); //Controller for all
    Route::get('/appointment/search','Admin\Appointment\AppointmentController@allSearch'); //Controller 
    Route::get('/appointment/alluser','Admin\Appointment\AppointmentController@allUser'); //Controller for all  
    Route::get('/appointment/searchuser', 'Admin\Appointment\AppointmentController@searchPatient');
    Route::resource('/appointment/saveappointment','Admin\Appointment\AppointmentController'); // for edit and delete appointment
    Route::get('/appointment/newappointmentdropdowns','Admin\Appointment\AppointmentController@newAppointmentDropdowns');//dropdowns for all 
    



    Route::get('/appointment/booknew','Admin\AdminController@bookAppointment');


    //Route::get('/getallappointment','Admin\Appointment\AppointmentController@getAllAppointment');
    //Route::get('/newappointmentdropdowns','Admin\Appointment\AppointmentController@newAppointmentDropdowns');
    //Route::get('/searchappointment/{term1?}/{term2?}/{term3?}','Admin\Appointment\AppointmentController@getAllAppointment');
    //Route::resource('/saveappointment','Admin\Appointment\AppointmentController');

    //Billing vue
    Route::resource('/billing/all','Admin\Billing\BillingController');
    Route::get('/billing/new','Admin\Billing\BillingController@newBilling');
    Route::get('/billing/getallbilling','Admin\Billing\BillingController@allBilling');
    Route::get('/billing/search','Admin\Billing\BillingController@billSearch'); //Controller 
    Route::get('/billing/alldropdowns','Admin\AdminController@allDropdowns');//dropdowns for all 
    Route::get('/billing/alluser','Admin\Billing\BillingController@allUser'); //
    Route::resource('/billing/savebill','Admin\Billing\BillingController');//Save Bill 
    Route::get('/billing/searchuser', 'Admin\Billing\BillingController@searchPatient');
    //Route::get('/billing/patientbill', 'Admin\patient\PatientController@patientBill');




    //Patient
    Route::get('/patient/all', 'Admin\Patient\PatientController@index');
    Route::get('/patient/allpatients', 'Admin\Patient\PatientController@allPatients');
    Route::get('/patient/searchpatient', 'Admin\Patient\PatientController@searchPatient');
    Route::get('/patient/new', 'Admin\Patient\PatientController@newPatient');
    Route::resource('/patient/newpatient','Admin\Patient\PatientController'); // to save new ptient
    Route::get('/patient/patientallappointment', 'Admin\Patient\PatientController@patientAllAppointment');


    //Symptoms
    


    //User
    Route::resource('/profile','User\UserController');

    //Settings
    Route::resource('/setting','Setting\SettingController');

    Route::group(['prefix' => 'user'],function(){
        Route::get('/activate', 'Admin\UserController@activate');
        Route::get('/deactivate', 'Admin\UserController@deactivate');
    });
});    