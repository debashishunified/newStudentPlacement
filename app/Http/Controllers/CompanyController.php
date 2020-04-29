<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Company;
use Session;

class CompanyController extends Controller
{
    /**
	*
	*@method GET
	*@param No
	*@return Company Page
	*
	*/
    public function index()
    {	
    	$title="Company";
    	$getCompanyList=Company::all();
    	return view('company.company',compact('title','getCompanyList'));
    }
    /**
	*
	*@method GET
	*@param No
	*@return Add Company Page
	*
	*/
    public function addCompany()
    {	
    	$title="Add Company";
    	return view('company.add_company', compact('title'));
    }
    /**
	*
	*@method POST
	*@param Request
	*@return Save Company Details
	*
	*/
    public function saveCompanyData(Request $request)
    {	
    	$rules=array(
    		'name'=>'required|unique:companies'
    	);
    	$validate=\Validator::make($request->all(), $rules);
    	if(!$validate->fails()){
    		$fields=array(
    		'name'=>$request->input('name'),
    		'created_at'=>date('Y-m-d H:i:s'),
    		'updated_at'=>date('Y-m-d H:i:s')
	    	);
	    	$getResponse=Company::insert($fields);
	    	if($getResponse){
	    		$message="Data saved successfully";
	    		Session::flash('message',$message);
	    		Session::flash('alert-class','alert-info');
	    		return redirect()->route('add-company');
	    	}else{
	    		$message="Please try after some times.";
	    		Session::flash('message',$message);
	    		Session::flash('alert-class','alert-danger');
	    		return redirect()->route('add-company');
	    	}
    	}else{
    		return back()->with('errors',$validate->errors());
    	}
    }
}








