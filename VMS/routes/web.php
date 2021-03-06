<?php
Route::get('/', function () {
    return view('welcome');
});
Route::get('/home', function () {
    return view('home');
});
Route::get('/bookedcheckin', function () {
    return view('bookedcheckin');
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
Route::get('visitorregister', function () {
    return view('visitor.visitorregister');
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
Route::get('adminchangepassword', function () {
    return view('admin.changepassword');
});
Route::get('visitorlog','visitorcontroller@visitorlog');
Route::get('employeelog','employeecontroller@employeelog');
Route::get('adminlog','admincontroller@adminlog');

Route::get('bookingstatus','visitorcontroller@bookingstatus');
Route::get('employeebanvisitor','employeecontroller@employeebanvisitor');

Route::get('admin_visitorresetpassword','admincontroller@adminvisitorresetpassword');
Route::get('admin_employeeresetpassword','admincontroller@adminemployeeresetpassword');
Route::get('admin_adminresetpassword','admincontroller@adminadminresetpassword');



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

Route::get('/admincheckavailability', function () {
    return view('admin.admincheckavailability');
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

Route::get('/visitoreditprofile','visitorcontroller@visitoreditprofileshow');
Route::get('/employee_editprofile','employeecontroller@employeeeditprofileshow');

Route::get('/admin_editprofile','admincontroller@admineditprofileshow');
Route::get('/visitorbooking', function () {
    return view('visitor.booking');
});
Route::post('/visitor_registerandcheckin_store','visitorcontroller@register_checkin_store');
Route::post('/visitor_register_store','visitorcontroller@register_store');
Route::get('/visitorfindempname','visitorcontroller@findempname');
Route::get('/visitorfindempdept','visitorcontroller@findempdept');
Route::get('/visitorfindempavailability','visitorcontroller@findempavailability');
Route::get('/visitorfindempemail','visitorcontroller@findempmail');
Route::get('/employee_pvreq','employeecontroller@findemppvrequests');
Route::get('/employee_ovreq','employeecontroller@findempovrequests');

Route::get('acceptedpersonalvisits','employeecontroller@acceptedpersonalvisits');
Route::get('acceptedofficialvisits','employeecontroller@acceptedofficialvisits');

Route::get('/visitorprofile','visitorcontroller@visitorprofile');
Route::get('/empvisitorlog','employeecontroller@empvisitorlog');
Route::get('/employeeprofile','employeecontroller@employeeprofile');
Route::get('/adminprofile','admincontroller@adminprofile');
Route::get('/admindashboard','admincontroller@admindashboard');
Route::get('/admindashboardfull','admincontroller@admindashboardfull');

Route::get('/visitorlist','admincontroller@visitorlist');
Route::get('/employeelist','admincontroller@employeelist');
Route::get('/adminlist','admincontroller@adminlist');
Route::get('/bannedlist','admincontroller@bannedlist');

Route::post('/visitoreditprofile','visitorcontroller@visitoreditprofile');
Route::post('/employeeeditprofile','employeecontroller@employeeeditprofile');
Route::post('/admineditprofile','admincontroller@admineditprofile');
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
Route::post('/admin_changepassword','admincontroller@adminchangepassword');
Route::post('/visitorbooking','visitorcontroller@visitorbooking');
Route::post('/adminadduser','admincontroller@adduser');

Route::get('employee/{officialvisitorid}/acceptofficialvisit', ['as' => 'acceptofficialvisit', 'uses' => 'bookingcontroller@acceptofficialvisit']);
Route::get('employee/{officialvisitorid}/rejectofficialvisit', ['as' => 'rejectofficialvisit', 'uses' => 'bookingcontroller@rejectofficialvisit']);
Route::get('employee/{personalvisitorid}/acceptpersonalvisit', ['as' => 'acceptpersonalvisit', 'uses' => 'bookingcontroller@acceptpersonalvisit']);
Route::get('employee/{personalvisitorid}/rejectpersonalvisit', ['as' => 'rejectpersonalvisit', 'uses' => 'bookingcontroller@rejectpersonalvisit']);

Route::post('employee/{officialvisitorid}/rejectofficialvisitupdate', ['as' => 'rejectofficialvisitupdate', 'uses' => 'bookingcontroller@rejectofficialvisitupdate']);
Route::post('employee/{officialvisitorid}/acceptofficialvisitupdate', ['as' => 'acceptofficialvisitupdate', 'uses' => 'bookingcontroller@acceptofficialvisitupdate']);
Route::post('employee/{personalvisitorid}/rejectpersonalvisitupdate', ['as' => 'rejectpersonalvisitupdate', 'uses' => 'bookingcontroller@rejectpersonalvisitupdate']);
Route::post('employee/{personalvisitorid}/acceptpersonalvisitupdate', ['as' => 'acceptpersonalvisitupdate', 'uses' => 'bookingcontroller@acceptpersonalvisitupdate']);

Route::post('/bookedcheckin','RegisterController@bookedcheckin');

Route::get('employee/{visitorid}/banvisitor', ['as' => 'banvisitor', 'uses' => 'employeecontroller@banvisitor']);
Route::post('employee/{visitorid}/banconfirmed', ['as' => 'banconfirmed', 'uses' => 'employeecontroller@banconfirmed']);

Route::get('/employeebannedlist','employeecontroller@employeebannedlist');
Route::get('employee/{visitorid}/unbanvisitor', ['as' => 'unbanvisitor', 'uses' => 'employeecontroller@unbanvisitor']);
Route::post('employee/{visitorid}/unbanvisitordone', ['as' => 'unbanvisitordone', 'uses' => 'employeecontroller@unbanvisitordone']);

Route::get('admin/{visitorid}/adminunbanvisitor', ['as' => 'adminunbanvisitor', 'uses' => 'admincontroller@adminunbanvisitor']);
Route::post('admin/{visitorid}/adminunbanvisitordone', ['as' => 'adminunbanvisitordone', 'uses' => 'admincontroller@adminunbanvisitordone']);

Route::get('admin/{visitorid}/banvisitor', ['as' => 'adminbanvisitor', 'uses' => 'admincontroller@adminbanvisitor']);
Route::post('admin/{visitorid}/adminbanconfirmed', ['as' => 'adminbanconfirmed', 'uses' => 'admincontroller@adminbanconfirmed']);

Route::get('admin/{visitorid}/admindeletevisitor', ['as' => 'admindeletevisitor', 'uses' => 'admincontroller@admindeletevisitor']);
Route::post('admin/{visitorid}/admindeletevisitorconfirmed', ['as' => 'admindeletevisitorconfirmed', 'uses' => 'admincontroller@admindeletevisitorconfirmed']);

Route::get('admin/{visitorid}/admindeleteemployee', ['as' => 'admindeleteemployee', 'uses' => 'admincontroller@admindeleteemployee']);
Route::post('admin/{visitorid}/admindeleteemployeeconfirmed', ['as' => 'admindeleteemployeeconfirmed', 'uses' => 'admincontroller@admindeleteemployeeconfirmed']);

Route::get('admin/{visitorid}/admineditemployee', ['as' => 'admineditemployee', 'uses' => 'admincontroller@admineditemployee']);
Route::post('admin/{visitorid}/admineditemployeeconfirmed', ['as' => 'admineditemployeeconfirmed', 'uses' => 'admincontroller@admineditemployeeconfirmed']);

Route::get('admin/{visitorid}/admineditadmin', ['as' => 'admineditadmin', 'uses' => 'admincontroller@admineditadmin']);
Route::post('admin/{visitorid}/admineditadminconfirmed', ['as' => 'admineditadminconfirmed', 'uses' => 'admincontroller@admineditadminconfirmed']);


Route::get('admin/{visitorid}/admindeleteadmin', ['as' => 'admindeleteadmin', 'uses' => 'admincontroller@admindeleteadmin']);
Route::post('admin/{visitorid}/admindeleteadminconfirmed', ['as' => 'admindeleteadminconfirmed', 'uses' => 'admincontroller@admindeleteadminconfirmed']);

Route::get('admin/{visitorid}/adminresetvisitorpassword', ['as' => 'adminresetvisitorpassword', 'uses' => 'admincontroller@adminresetvisitorpassword']);
Route::get('admin/{employeeid}/adminresetemployeepassword', ['as' => 'adminresetemployeepassword', 'uses' => 'admincontroller@adminresetemployeepassword']);
Route::get('admin/{adminid}/adminresetadminpassword', ['as' => 'adminresetadminpassword', 'uses' => 'admincontroller@adminresetadminpassword']);

Route::post('admin/{visitorid}/adminresetvisitorpasswordupdate', ['as' => 'adminresetvisitorpasswordupdate', 'uses' => 'admincontroller@adminresetvisitorpasswordupdate']);
Route::post('admin/{employeeid}/adminresetemployeepasswordupdate', ['as' => 'adminresetemployeepasswordupdate', 'uses' => 'admincontroller@adminresetemployeepasswordupdate']);
Route::post('admin/{adminid}/adminresetadminpasswordupdate', ['as' => 'adminresetadminpasswordupdate', 'uses' => 'admincontroller@adminresetadminpasswordupdate']);



Route::get('employee/{visitorid}/empseen', ['as' => 'empseen', 'uses' => 'employeecontroller@empseen']);
Route::get('employee/{visitorid}/empnotseen', ['as' => 'empnotseen', 'uses' => 'employeecontroller@empnotseen']);




Route::get('/logout',function () {
    Auth::logout();
    return Redirect::to('');
})->middleware("auth");
