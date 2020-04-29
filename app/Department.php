<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{	 
	/**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded=[];

    // public function student(){
    // 	return $this->belongsTo('App\Student','department_id');
    // }
    public function students(){
    	return $this->hasMany('App\Student');
    }
    public function student_placements(){
        return $this->hasManyThrough('App\StudentPlacement','App\Student');
    }
}








