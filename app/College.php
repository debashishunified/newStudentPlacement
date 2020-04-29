<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class College extends Model
{
	/**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded=[];

    public function student(){
    	return $this->hasMany('App\Student','college_id');
    }

    public function student_placements(){
    	return $this->hasManyThrough('App\StudentPlacement','App\Student','college_id','');
    }
}







