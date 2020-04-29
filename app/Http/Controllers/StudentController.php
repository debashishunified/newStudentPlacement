<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use App\Student, App\Department, App\College;

class StudentController extends Controller
{
     /**
	*
	*@method GET
	*@param No
	*@return Student Registration Page
	*
	*/
    public function index()
    {	
    	$departmentList=Department::all();
    	$collegeList=College::all();
    	return view('student.registration',compact('departmentList','collegeList'));
    }
    /**
	*
	*@method POSt
	*@param Request
	*@return Save Student Registration Data
	*
	*/
    public function saveRegistration(Request $request)
    {	
    	$rules=array(
    		'name'=>'required',
    		'roll'=>'required',
    		'department_id'=>'required',
    		'college_id'=>'required'
    	);
    	$validate=\Validator::make($request->all(), $rules);
    	if(!$validate->fails()){
    		$fields=array(
    		'name'=>$request->input('name'),
    		'roll'=>$request->input('roll'),
    		'department_id'=>$request->input('department_id'),
    		'college_id'=>$request->input('college_id'),
    		'created_at'=>date('Y-m-d H:i:s'),
    		'updated_at'=>date('Y-m-d H:i:s')
	    	);
	    	$getResponse=Student::insert($fields);
	    	if($getResponse){
	    		$message="Data saved successfully";
	    		Session::flash('message',$message);
	    		Session::flash('alert-class','alert-info');
	    		return redirect('student/registration');
	    	}else{
	    		$message="Please try after some times.";
	    		Session::flash('message',$message);
	    		Session::flash('alert-class','alert-danger');
	    		return redirect('student/registration');
	    	}
    	}else{
    		return back()->with('errors',$validate->errors());
    	}
    }
    /**
    *
    *@method GET
    *@param No
    *@return Student List
    *
    */
    public function getStudentList()
    {   
        $title="Student List";
        $studentList=Student::with('department','college')->get()->toArray();
        return view('student.student_list',compact('title','studentList'));
    }

    /**
    *
    *@method GET
    *@param studentId
    *@return Student Placement Details
    *
    */
    public function studentPlacementDetails($studentId)
    {   
        $title="Student Placement Details";
        $studentList=Student::with('student_placements','student_placements.college_placement','student_placements.college_placement.companies')->where('id',$studentId)->get()->toArray();
        return view('student.student_placement_details',compact('title','studentList'));
    }
}




