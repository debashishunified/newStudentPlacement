<?php

//Dashboard route
Route::get('/','DashboardController@index');

//Student
Route::get('student','StudentController@getStudentList')->name('student');
Route::get('add-student-placement/{studentId}','StudentPlacementController@addStudentPlacement');
Route::post('save-student-placement-data','StudentPlacementController@saveStudentPlacement')->name('save-student-placement-data');
Route::get('/change_placement_date/{date}','StudentPlacementController@changePlacementValue')->name('change_placement_date');
Route::get('student-placement-details/{studentId}','StudentController@studentPlacementDetails')->name('student-placement-details');

//Company route
Route::get('company','CompanyController@index')->name('company');
Route::get('add-company','CompanyController@addCompany')->name('add-company');
Route::post('save-company-data','CompanyController@saveCompanyData')->name('save-company-data');

//College route
Route::get('college','CollegeController@index')->name('college');
Route::get('add-college','CollegeController@addCollege')->name('add-college');
Route::post('save-college-data','CollegeController@saveCollegeData')->name('save-college-data');

//College route
Route::get('department','DepartmentController@index')->name('department');
Route::get('add-department','DepartmentController@addDepartment')->name('add-department');
Route::post('save-department-data','DepartmentController@saveDepartmentData')->name('save-department-data');

//College Placement
Route::get('college-placement','CollegePlacementController@index')->name('college-placement');
Route::get('add-college-placement','CollegePlacementController@addCollegePlacement')->name('add-college-placement');
Route::post('save-college-placement-data','CollegePlacementController@saveCollegePlacement')->name('save-college-placement-data');

//Student Placement
Route::get('student-placement','StudentPlacementController@index')->name('student-placement');


//student registration
Route::prefix('student')->group(function(){
	Route::get('registration','StudentController@index');
	Route::post('save-registration','StudentController@saveRegistration');
});

//Placement Details
Route::get('view-placement-details/{placementId}','StudentPlacementController@viewPlacementDetails')->name('view-placement-details');
Route::get('/update_selected_placement/{data_id}/{value}','StudentPlacementController@updateSelectedPlacement')->name('update_selected_placement');

//Company Wise Reports
Route::get('company-wise-placement','CollegePlacementController@companyWisePlacement')->name('company-wise-placement');
Route::get('company-wise-all-placement/{companyId}','CollegePlacementController@companyWiseAllPlacement')->name('company-wise-all-placement');

//College Wise Reports
Route::get('college-wise-placement','CollegePlacementController@collegeWisePlacement')->name('college-wise-placement');
Route::get('/selected_student_details/{collegeId}','CollegePlacementController@selectedStudentDetails')->name('selected_student_details');
Route::get('student_all_placem_details/{collegeId}','CollegePlacementController@SelectAllPlacemDetails')->name('student_all_placem_details');

//Department Wise Reports
Route::get('department-wise-placement','CollegePlacementController@departmentWisePlacement')->name('department-wise-placement');
Route::get('depart-wise-all-placement/{departId}','CollegePlacementController@departWiseAllPlacement')->name('depart-wise-all-placement');








