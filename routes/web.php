<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('index');
    
    
});

Route::get('/home', function () {
    return view('login.create');
    
    
});

Route::resource('registrations','RegistrationsController');//Registration
Route::get('/creates', 'LoginsController@creates');//lawyer home
Route::get('/creates', 'LoginsController@creates');//user home
Route::get('/editprofile', 'LoginsController@edit_profile');
Route::any('/create2', 'LoginsController@create2');//lawyer change pwd
Route::any('/user_pay_action', 'LoginsController@user_pay_action');
Route::any('/lhome', 'RegistrationsController@lhome');//lawyer home
Route::any('/changepwd', 'LoginsController@change_pwd');
Route::any('/changepwdusr', 'LoginsController@change_pwdusr');
Route::any('/createus', 'LoginsController@createus');
Route::any('/noti_approve','LoginsController@noti_approve');
Route::any('/user_noti{email}','LoginsController@user_noti')->name('user_noti');
Route::any('/myclients','LoginsController@myclients');
Route::any('/emergency_lawyer','LoginsController@emergency_lawyer');
Route::any('/edit_user','LoginsController@edit_user');
Route::any('/user_payment','LoginsController@user_payment');
Route::any('/payment_sel','LoginsController@payment_sel');
Route::any('/fees','LoginsController@fees');
Route::any('/fees_get','LoginsController@fees_get');
Route::any('/noti_update','LoginsController@noti_update');
Route::any('/law_noti_update','LoginsController@law_noti_update');
Route::any('/app_approve','LoginsController@app_approve');
Route::any('/lawyer_appt','LoginsController@lawyer_appt');
Route::any('/notification','LoginsController@notification');
Route::any('/app_get{email}', 'LoginsController@app_get')->name('app_get');
Route::any('/us_home{id}', 'LoginsController@us_home')->name('us_home');
Route::any('/user_rating', 'LoginsController@user_rating');
// Route::any('/rating/{email}', 'LoginsController@rating');
Route::any('/rating', 'LoginsController@rating');
Route::any('/my_lawyer', 'LoginsController@my_lawyer');
Route::any('/us_doc', 'LoginsController@us_doc');
Route::any('/us_doc_get', 'LoginsController@us_doc_get');
Route::any('/lawyer_doc', 'LoginsController@lawyer_doc');
Route::any('/lawyer_doc_get', 'LoginsController@lawyer_doc_get');
Route::any('/download/{file}', 'LoginsController@download');
Route::any('/mylawyer_app_get', 'LoginsController@mylawyer_app_get');
Route::any('/appointment', 'LoginsController@appointment');
Route::any('lawyer_search_get', 'LoginsController@lawyer_search_get');
Route::any('/create1', 'RegistrationsController@create1');//lawyer details
Route::any('/lawyerdetails', 'RegistrationsController@lawyer_details_get');
// Route::any('/lawyerdetails', 'RegistrationsController@lawyer_details_get');
Route::any('/create3', 'LoginsController@lawyer_search');
Route::any('create4', 'LoginsController@create4');
//Route::any('/create4', 'LoginsController@create4');
Route::get('/registrations/create', 'LoginsController@getCountryList');
Route::get('/get-state-list', 'LoginsController@getStateList');
Route::get('/get-title-list', 'LoginsController@titleList');
Route::get('/getlaw-title-list', 'LoginsController@titlelawList');
Route::get('/get-city-list', 'LoginsController@getCityList');
Route::get('/get-appt-list', 'LoginsController@apptList');
Route::get('/get-noti-list', 'LoginsController@notiList');
Route::any('/schedule', 'LoginsController@schedule');
Route::any('/scheduler', 'LoginsController@scheduler');
Route::any('/proof', 'LoginsController@proof');
Route::any('/man_lawyer', 'LoginsController@man_lawyer');
Route::any('/man_bllawyer', 'LoginsController@man_bllawyer');
Route::any('/man_user', 'LoginsController@man_user');
Route::any('/man_bluser', 'LoginsController@man_bluser');
Route::any('/manage', 'LoginsController@user_mng');
Route::any('/manage', 'LoginsController@user_mng');
Route::get('/admin', 'LoginsController@admin');
Route::any('/user_approve', 'LoginsController@user_approve');
Route::any('/laapprove', 'LoginsController@laapprove');
Route::any('/usapprove', 'LoginsController@usapprove');
Route::any('/user_chat', 'LoginsController@user_chat');
Route::resource('logins','LoginsController');//Login
Route::get('/logout', '\App\Http\Controllers\LoginsController@logout');//Logout
// Route::get('send','MailController@send');//where MailController@send z the fn in ctrlr(sending mail)

// Auth::routes();

 Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');
