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

Route::post('admin/addemployee','AdminController@addemployeedata');
Route::get('admin/addadministrator','AdminController@addadministrator');
Route::post('admin/addadministrator','AdminController@addadministratordata');
Route::get('/changestatus','changestatus@change');
Auth::routes();

Route::get('/home', 'HomeController@index');

Route::get("details",'detailscontroller@index');
Route::post("store",'detailscontroller@store');
