<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
     public function addvisitor()
	   {
		   return view('admin.addvisitor');
	   }
     public function addemployee()
 	   {
 		   return view('admin.addemployee');
 	   }
     public function addadministrator()
 	   {
 		   return view('admin.addadministrator');
 	   }
}
