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
    return view('welcome');
});

Route::get('profile', 'UserController@profile');
Route::post('profile', 'UserController@update_avatar');
Route::get('admin/addvisitor','AdminController@addvisitorview');
Route::post('admin/addvisitor','AdminController@addvisitordata');
Route::get('admin/addemployee','AdminController@addemployee');
Route::get('admin/registeredvisitorslist','AdminController@registeredvisitorslist');
Route::get('admin/employeelist','AdminController@employeelist');
Route::get('admin/adminlist','AdminController@adminlist');
Route::get('admin/totaltable','AdminController@totaltable');
Route::post('admin/addemployee','AdminController@addemployeedata');
Route::get('admin/addadministrator','AdminController@addadministrator');
Route::post('admin/addadministrator','AdminController@addadministratordata');
Route::get('/changestatus','changestatus@change');
Auth::routes();
Route::get('/home', 'HomeController@index');
Route::get("details",'detailscontroller@index');
Route::post("store",'detailscontroller@store');
Route::get('/visitor/editprofile','BookController@editprofile');
Route::post('/visitor/editprofile','BookController@editprofiledata');
Route::get('/visitor/checkavailability','BookController@checkavailability');
Route::post('/visitor/checkavailability','BookController@checkavailabilitydata');
Route::get('/visitor/bookemployee','BookController@bookemployee');
Route::post('/visitor/bookemployee','BookController@bookemployeedata');
Route::get('/visitor/changepassword','BookController@changepassword');
Route::get('/visitor/entrylog','BookController@entrylog');
Route::get('/visitor/bookedstatus','BookController@bookedstatus');
