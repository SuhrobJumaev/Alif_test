<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Course extends Model
{
    protected $fillable = ['title','created_at','created_at'];

    //Users
    public function users(){
        return $this->belongsToMany('App\User','course_user','course_id','user_id');
    }

    //Students
    public function students(){
        return $this->belongsToMany('App\Student','course_student','course_id','student_id');
    }

    public function scopelastCourses($query,$count){

        return $query->orderBy('created_at','desc')->take($count)->get();

    }

}
