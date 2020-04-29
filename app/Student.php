<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{  
	/**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded=[];

    public function department(){
    	return $this->hasOne('App\Department','id','department_id');
    }
    public function college(){
    	return $this->hasOne('App\College','id','college_id');
    }
    public function student_placements(){
        return $this->hasMany('App\StudentPlacement');
    }
}





