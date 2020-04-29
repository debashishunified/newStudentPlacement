<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\StudentPlacement, App\Company, App\CollegePlacement;
use Session;

class StudentPlacementController extends Controller
{
    /**
	*
	*@method GET
	*@param No
	*@return Student Placement Page
	*
	*/
    public function index()
    {	
        $title="Student Placement";
        $getStudentPlacementList=CollegePlacement::with('companies')->get()->toArray();
    	return view('placement.student_placement',compact('title','getStudentPlacementList'));
    }
    /**
	*
	*@method GET
	*@param No
	*@return Add Student Placement Page
	*
	*/
    public function addStudentPlacement($studentId)
    {	
        $studentId=$studentId;
    	$title="Add Student Placement";
    	$collegePlacement=CollegePlacement::with('companies')->get()->toArray();
    	return view('placement.add_student_placement', compact('title','collegePlacement','studentId'));
    }
    /**
	*
	*@method POST
	*@param Request
	*@return Save Student Placement Details
	*
	*/
    public function saveStudentPlacement(Request $request)
    {	 
        $student_id=$request->input('student_id');
    	$rules=array(
            'placement_date'=>'required',
    		'college_placement_id'=>'required',
    		'student_id'=>'required',
    		'is_selected'=>'required'
    	);
    	$message=array(
            'placement_date.required'=>'The placement date field is required.',
    		'college_placement_id.required'=>'The company name field is required.',
            'is_selected.required'=>'The selected field is required.'
    	);
    	$validate=\Validator::make($request->all(), $rules,$message);
    	if(!$validate->fails()){
    		$fields=array(
    		'college_placement_id'=>$request->input('college_placement_id'),
    		'student_id'=>$request->input('student_id'),
    		'is_selected'=>$request->input('is_selected'),
    		'created_at'=>date('Y-m-d H:i:s'),
    		'updated_at'=>date('Y-m-d H:i:s')
	    	);
	    	$getResponse=StudentPlacement::insert($fields);
	    	if($getResponse){
	    		$message="Data saved successfully";
	    		Session::flash('message',$message);
	    		Session::flash('alert-class','alert-info');
	    		return redirect()->route('student');
	    	}else{
	    		$message="Please try after some times.";
	    		Session::flash('message',$message);
	    		Session::flash('alert-class','alert-danger');
	    		return redirect()->route('student');
	    	}
    	}else{
    		return back()->with('errors',$validate->errors());
    	}
    }

    /**
    *
    *@method GET
    *@param $placementId
    *@return Placement Details Page
    *
    */
    public function viewPlacementDetails($placementId=null)
    {   
        $title="Placement Details";
        $getStudentPlacementList=StudentPlacement::with('student','student.department','student.college')->where('college_placement_id',$placementId)->get()->toArray();
        return view('placement.placement_details',compact('title','getStudentPlacementList'));
    }

    /**
    *
    *@method POST
    *@param No
    *@return Ajax Data
    *
    */
    public function updateSelectedPlacement($data_id, $value)
    {   
        $field=array(
            'is_selected'=>$value
        );
        $response=StudentPlacement::where('id',$data_id)->update($field);
        if($response){
            echo "done";
        }else{
            echo "error";
        }
        die;
    }

    /**
    *
    *@method ANY
    *@param No
    *@return Ajax Data
    *
    */
    public function changePlacementValue($date)
    {   
        $collegePlacement=CollegePlacement::with('companies')->where('placement_date',$date)->get()->toArray();
        if(!empty($collegePlacement)){
            echo "<option value=''>-----Select Company------</option>";
            foreach ($collegePlacement as $value) {
              echo "<option value='".$value['companies']['id'] ."'>".$value['companies']['name'] ."</option>";
            }
        }else{
            echo "<option value=''>No Data Found</option>";
        }
        die;
    }
}



