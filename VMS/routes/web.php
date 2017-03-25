<?php
Route::get('/', function () {
    return view('welcome');
});
Route::get('/home', function () {
    return view('home');
});
Route::get('/login', function () {
    return view('login');
});
Route::get('visitorlogin', function () {
    return view('visitor.visitorlogin');
});
Route::get('visitorregisterandcheckin', function () {
    return view('visitor.registerandcheckin');
});


Route::get('adminlogin', function () {
    return view('admin.adminlogin');
});
Route::get('visitorchangepassword', function () {
    return view('visitor.changepassword');
});
Route::get('employeechangepassword', function () {
    return view('employee.changepassword');
});
Route::get('visitorlog','visitorcontroller@visitorlog');
Route::get('employeelog','employeecontroller@employeelog');

Route::get('bookingstatus','visitorcontroller@bookingstatus');



Route::get('employeelogin', function () {
    return view('employee.employeelogin');
});
Route::get('employeecheckin', function () {
    return view('employee.empcheckin');
});
Route::get('admincheckin', function () {
    return view('admin.admincheckin');
});
Route::get('employeecheckout', function () {
    return view('employee.employeecheckout');
});
Route::get('admincheckout', function () {
    return view('admin.admincheckout');
});
Route::get('adminadduser', function () {
    return view('admin.adminadduser');
});
Route::get('/visitorhomepage', function () {
    return view('visitor.visitorhomepage');
});
Route::get('/visitorcheckavailability', function () {
    return view('visitor.visitorcheckavailability');
});
Route::get('/employeecheckavailability', function () {
    return view('employee.employeecheckavailability');
});
Route::get('/adminhomepage', function () {
    return view('admin.adminhomepage');
});
Route::get('/emphomepage', function () {
    return view('employee.emphomepage');
});
Route::get('/visitorcheckin', function () {
    return view('visitor.visitorcheckin');
});
Route::get('/visitorcheckout', function () {
    return view('visitor.visitorcheckout');
});
Route::get('/register', function () {
    return view('register.register');
});
Route::get('/visitoreditprofile', function () {
    return view('visitor.visitoreditprofile');
});
Route::get('/employee_editprofile', function () {
    return view('employee.employeeeditprofile');
});
Route::get('/visitorbooking', function () {
    return view('visitor.booking');
});
Route::post('/visitor_registerandcheckin_store','visitorcontroller@register_checkin_store');
Route::get('/visitorfindempname','visitorcontroller@findempname');
Route::get('/visitorfindempdept','visitorcontroller@findempdept');
Route::get('/visitorfindempavailability','visitorcontroller@findempavailability');
Route::get('/visitorfindempemail','visitorcontroller@findempmail');
Route::get('/employee_pvreq','employeecontroller@findemppvrequests');
Route::get('/employee_ovreq','employeecontroller@findempovrequests');
Route::get('/visitorprofile','visitorcontroller@visitorprofile');
Route::get('/empvisitorlog','employeecontroller@empvisitorlog');
Route::get('/employeeprofile','employeecontroller@employeeprofile');
Route::get('/admindashboard','admincontroller@admindashboard');

Route::get('/visitorlist','admincontroller@visitorlist');
Route::get('/employeelist','admincontroller@employeelist');
Route::get('/adminlist','admincontroller@adminlist');

Route::post('/visitoreditprofile','visitorcontroller@visitoreditprofile');
Route::post('/employeeeditprofile','employeecontroller@employeeeditprofile');
Route::post('/register_action','RegisterController@store');
Route::post('/login_check','RegisterController@login');
Route::post('/visitorlogin_check','RegisterController@login');
Route::post('/adminlogin_check','RegisterController@login');
Route::post('/employeelogin_check','RegisterController@login');
Route::post('/employeecheckin_check','RegisterController@empcheckin');
Route::post('/admincheckin_check','RegisterController@admincheckin');
//Route::post('/employeecheckin_check','RegisterController@checkin');
Route::post('/visitor_checkout','RegisterController@checkout');
Route::post('/employee_checkout','RegisterController@checkout');
Route::post('/admin_checkout','RegisterController@checkout');

Route::post('/visitor_checkin','RegisterController@visitorcheckin');
Route::post('/visitor_changepassword','visitorcontroller@visitorchangepassword');
Route::post('/employee_changepassword','employeecontroller@employeechangepassword');
Route::post('/visitorbooking','visitorcontroller@visitorbooking');
Route::post('/adminadduser','admincontroller@adduser');



Route::get('/logout',function () {
    Auth::logout();
    return Redirect::to('');
})->middleware("auth");
