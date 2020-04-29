<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CollegePlacement extends Model
{
	/**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded=[];

    public function companies(){
    	return $this->hasOne('App\Company','id');
    }
    public function student_placement(){
    	return $this->hasOne('App\StudentPlacement');
    }
}
