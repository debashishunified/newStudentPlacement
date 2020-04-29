<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Department;
use Session;

class DepartmentController extends Controller
{
    /**
	*
	*@method GET
	*@param No
	*@return Department Page
	*
	*/
    public function index()
    {	
    	$title="Department";
    	$getDepartmentList=Department::all();
    	return view('department.department',compact('title','getDepartmentList'));
    }
    /**
	*
	*@method GET
	*@param No
	*@return Add Department Page
	*
	*/
    public function addDepartment()
    {	
    	$title="Add Department";
    	return view('department.add_department', compact('title'));
    }
    /**
	*
	*@method POST
	*@param Request
	*@return Save Department Details
	*
	*/
    public function saveDepartmentData(Request $request)
    {	
    	$rules=array(
    		'name'=>'required|unique:companies',
    		'abbr'=>'required'
    	);
    	$validate=\Validator::make($request->all(), $rules);
    	if(!$validate->fails()){
    		$fields=array(
    		'name'=>$request->input('name'),
    		'abbr'=>$request->input('abbr'),
    		'created_at'=>date('Y-m-d H:i:s'),
    		'updated_at'=>date('Y-m-d H:i:s')
	    	);
	    	$getResponse=Department::insert($fields);
	    	if($getResponse){
	    		$message="Data saved successfully";
	    		Session::flash('message',$message);
	    		Session::flash('alert-class','alert-info');
	    		return redirect()->route('add-department');
	    	}else{
	    		$message="Please try after some times.";
	    		Session::flash('message',$message);
	    		Session::flash('alert-class','alert-danger');
	    		return redirect()->route('add-department');
	    	}
    	}else{
    		return back()->with('errors',$validate->errors());
    	}
    }
}
