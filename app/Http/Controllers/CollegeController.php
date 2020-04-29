<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\College;
use Session;

class CollegeController extends Controller
{
     /**
	*
	*@method GET
	*@param No
	*@return College Page
	*
	*/
    public function index()
    {	
    	$title="College";
    	$getCollegeList=College::all();
    	return view('college.college',compact('title','getCollegeList'));
    }
    /**
	*
	*@method GET
	*@param No
	*@return Add College Page
	*
	*/
    public function addCollege()
    {	
    	$title="Add College";
    	return view('college.add_college', compact('title'));
    }
    /**
	*
	*@method POST
	*@param Request
	*@return Save College Details
	*
	*/
    public function saveCollegeData(Request $request)
    {	
    	$rules=array(
    		'name'=>'required|unique:colleges',
    		'location'=>'required'
    	);
    	$validate=\Validator::make($request->all(), $rules);
    	if(!$validate->fails()){
    		$fields=array(
    		'name'=>$request->input('name'),
    		'location'=>$request->input('location'),
    		'created_at'=>date('Y-m-d H:i:s'),
    		'updated_at'=>date('Y-m-d H:i:s')
	    	);
	    	$getResponse=College::insert($fields);
	    	if($getResponse){
	    		$message="Data saved successfully";
	    		Session::flash('message',$message);
	    		Session::flash('alert-class','alert-info');
	    		return redirect()->route('add-college');
	    	}else{
	    		$message="Please try after some times.";
	    		Session::flash('message',$message);
	    		Session::flash('alert-class','alert-danger');
	    		return redirect()->route('add-college');
	    	}
    	}else{
    		return back()->with('errors',$validate->errors());
    	}
    }
}
