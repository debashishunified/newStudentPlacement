<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StudentPlacement extends Model
{	
	/**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded=[];

    public function student(){
    	return $this->belongsTo('App\Student','student_id','id');
    }
    public function college_placement(){
    	return $this->hasOne('App\CollegePlacement','id','college_placement_id');
    }
}



