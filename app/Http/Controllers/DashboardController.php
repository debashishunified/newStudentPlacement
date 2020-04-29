<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Student, App\College, App\Department, App\Company;

class DashboardController extends Controller
{	
	/**
	*
	*@method GET
	*@param No
	*@return Dashboard Page
	*
	*/
    public function index()
    {	
    	$studentCount=Student::count();
    	$collegeCount=College::count();
    	$departmentCount=Department::count();
    	$companyCount=Company::count();
    	return view('dashboard.dashboard', compact('studentCount','collegeCount','departmentCount','companyCount'));
    }
}
