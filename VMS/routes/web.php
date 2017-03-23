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
Route::get('employeelogin', function () {
    return view('employee.employeelogin');
});
Route::get('employeecheckin', function () {
    return view('employee.empcheckin');
});
Route::get('adminadduser', function () {
    return view('admin.adminadduser');
});
Route::get('/visitorhomepage', function () {
    return view('visitor.visitorhomepage');
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
Route::post('/visitor_registerandcheckin_store','visitorcontroller@register_checkin_store');
Route::get('/visitorfindempname','visitorcontroller@findempname');
Route::get('/visitorfindempdept','visitorcontroller@findempdept');
Route::get('/visitorfindempavailability','visitorcontroller@findempavailability');
Route::get('/visitorprofile','visitorcontroller@visitorprofile');
Route::post('/visitoreditprofile','visitorcontroller@visitoreditprofile');
Route::post('/register_action','RegisterController@store');
Route::post('/login_check','RegisterController@login');
Route::post('/visitorlogin_check','RegisterController@login');
Route::post('/adminlogin_check','RegisterController@login');
Route::post('/employeelogin_check','RegisterController@login');
//Route::post('/employeecheckin_check','RegisterController@checkin');
Route::post('/visitor_checkout','RegisterController@checkout');
Route::post('/visitor_checkin','RegisterController@visitorcheckin');
Route::post('/adminadduser','admincontroller@adduser');

Route::get('/logout',function () {
    Auth::logout();
    return Redirect::to('');
})->middleware("auth");
