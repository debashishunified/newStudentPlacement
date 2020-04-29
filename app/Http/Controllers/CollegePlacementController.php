<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CollegePlacement, App\Company, App\College, App\Department;
use Session;

class CollegePlacementController extends Controller
{
    /**
	*
	*@method GET
	*@param No
	*@return College Placement Page
	*
	*/
    public function index()
    {	
        $getCollegePlacementList=CollegePlacement::with('companies')->get()->toArray();
    	$title="College Placement";
    	return view('placement.college_placement',compact('title','getCollegePlacementList'));
    }
    /**
	*
	*@method GET
	*@param No
	*@return Add College Placement Page
	*
	*/
    public function addCollegePlacement()
    {	
    	$title="Add College Placement";
    	$companyList=Company::all();
    	return view('placement.add_college_placement', compact('title','companyList'));
    }
    /**
	*
	*@method POST
	*@param Request
	*@return Save College Placement Details
	*
	*/
    public function saveCollegePlacement(Request $request)
    {	
    	$rules=array(
    		'placement_date'=>'required',
    		'company_id'=>'required',
    		'place'=>'required'
    	);
    	$message=array(
    		'company_id.required'=>'The company name field is required.'
    	);
    	$validate=\Validator::make($request->all(), $rules,$message);
    	if(!$validate->fails()){
    		$fields=array(
    		'placement_date'=>$request->input('placement_date'),
    		'company_id'=>$request->input('company_id'),
    		'place'=>$request->input('place'),
    		'created_at'=>date('Y-m-d H:i:s'),
    		'updated_at'=>date('Y-m-d H:i:s')
	    	);
	    	$getResponse=CollegePlacement::insert($fields);
	    	if($getResponse){
	    		$message="Data saved successfully";
	    		Session::flash('message',$message);
	    		Session::flash('alert-class','alert-info');
	    		return redirect()->route('add-college-placement');
	    	}else{
	    		$message="Please try after some times.";
	    		Session::flash('message',$message);
	    		Session::flash('alert-class','alert-danger');
	    		return redirect()->route('add-college-placement');
	    	}
    	}else{
    		return back()->with('errors',$validate->errors());
    	}
    }

    /**
    *
    *@method GET
    *@param No
    *@return College Wise Placement Page
    *
    */
    public function collegeWisePlacement()
    {   
        $title="College Wise Placement";
        $getCollegePlacementList=College::with('student','student_placements')->get()->toArray();
        return view('placement.college_wise_placement',compact('title','getCollegePlacementList'));
    }
    /**
    *
    *@method GET
    *@param No
    *@return Ajax Data
    *
    */
    public function selectedStudentDetails($collegeId)
    {   
        $getCollegePlacementList=College::with('student','student_placements','student.department','student.college')->where('id',$collegeId)->get()->toArray();
        $count=1;
        if(!empty($getCollegePlacementList)){
            foreach ($getCollegePlacementList[0]['student'] as $value) {
            echo "
                <tr>
                    <td>".$count."</td>
                    <td>".$value['name']."</td>
                    <td>".$value['department']['name']."</td>
                    <td>".$value['college']['name']."</td>
                </tr>
            ";
        $count++; }
        }else{
            echo "
                <tr>
                    <td colspan='4'>No Data Found</td>
                </tr>
            ";
        }
        die;
    }
    /**
    *
    *@method GET
    *@param No
    *@return College Placement List According Student
    *
    */
    public function SelectAllPlacemDetails($collegeId)
    {   
        $title="Student All Placement Details";
        $getCollegePlacementList=College::with('student_placements','student_placements.student','student_placements.student.department','student_placements.student.college')->where('id',$collegeId)->get()->toArray();
        if(!empty($getCollegePlacementList)){
            $collegeName=$getCollegePlacementList[0]['name'];
        }else{
            $collegeName='';
        }
        return view('placement.college_wise_placement_details',compact('title','getCollegePlacementList','collegeName'));
    }

    /**
    *
    *@method GET
    *@param No
    *@return Department Placement Page
    *
    */
    public function departmentWisePlacement()
    {   
        $title="Department Wise Placement";
        $getDepartmentList=Department::with('students','student_placements')->get()->toArray();
        return view('placement.department_placement',compact('title','getDepartmentList'));
    }
    /**
    *
    *@method GET
    *@param No
    *@return Department Wise Placement Details
    *
    */
    public function departWiseAllPlacement($departId)
    {   
        $title="Department Wise Placement Details";
        $getDepartmentList=Department::with('student_placements','student_placements.student','student_placements.student.department','student_placements.student.college')->where('id',$departId)->get()->toArray();
        if(!empty($getDepartmentList)){
            $departName=$getDepartmentList[0]['name'];
        }else{
            $departName='';
        }
        return view('placement.department_placement_details',compact('title','getDepartmentList','departName'));
    }

    /**
    *
    *@method GET
    *@param No
    *@return Company Wise Placement Page
    *
    */
    public function companyWisePlacement()
    {   
        $title="Company Wise Placement";
        $getcompanyList=Company::all();
        return view('placement.company_placement',compact('title','getcompanyList'));
    }

    /**
    *
    *@method GET
    *@param No
    *@return Department Wise Placement Details
    *
    */
    public function companyWiseAllPlacement($companyId)
    {   
        $title="Department Wise Placement Details";
        $getCompanyDetailsList=Company::with('college_placements','college_placements.student','college_placements.student.department','college_placements.student.college')->where('id',$companyId)->get()->toArray();

        // dd($getCompanyDetailsList);

        if(!empty($getCompanyDetailsList)){
            $companyName=$getCompanyDetailsList[0]['name'];
        }else{
            $companyName='';
        }
        return view('placement.company_placement_details',compact('title','getCompanyDetailsList','companyName'));
    }
}



