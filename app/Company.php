<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
	/**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded=[];

    public function student(){
    	return $this->belongsTo('App\Student','id','student_id');
    }
    public function college_placements(){
    	return $this->hasManyThrough('App\StudentPlacement','App\CollegePlacement','id','college_placement_id');
    }
}










