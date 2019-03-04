<?php

namespace App\Http\Controllers\Admin;

use App\Course;
use App\Student;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    //Dashboard
    public function dashboard(){
        return view('admin.dashboard',[
            'count_students' => Student::count(),
            'count_courses' => Course::count(),
            'count_users' => User::count(),
            'courses' => Course::LastCourses(5),
        ]);
    }
}
