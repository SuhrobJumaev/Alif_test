<?php

namespace App\Http\Controllers\Admin;

use App\Course;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         return view('admin.courses.index',[
            'courses' => Course::paginate(5),
         ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.courses.create',[
           'course' => [],
           'users' => User::get()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $course = Course::create($request->all());

        //Teachers
        if ($request->input('users')):
            $course->users()->attach($request->input('users'));
        endif;

        return redirect()->route('admin.course.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function show(Course $course)
    {
        return view('admin.courses.show',[
            'course' => $course,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function edit(Course $course)
    {
        return view('admin.courses.edit',[
           'course' => $course,
           'users' => User::get(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Course $course)
    {
        $course->update($request->all());

        //Teachers
        $course->users()->detach();

        if ($request->input('users')):
            $course->users()->attach($request->input('users'));
        endif;

        return redirect()->route('admin.course.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function destroy(Course $course)
    {
        //Teachers
        $course->users()->detach();

        $course->delete();

        return redirect()->route('admin.course.index');
    }
}
