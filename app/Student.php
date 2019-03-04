<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $guarded = ['courses'];

    //Courses
    public function courses(){
        return $this->belongsToMany('App\Course','course_student','student_id','course_id');
    }
}
