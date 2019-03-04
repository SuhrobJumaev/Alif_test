<?php

namespace App\Http\Controllers\Admin\UserManagment;

use App\Course;
use App\Http\Requests\StudentRequest;
use App\Student;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.user_managment.students.index',[
            'students' => Student::paginate(5),
            'courses' => Course::get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.user_managment.students.create',[
           'courses' => Course::get(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StudentRequest $request)
    {
        $student =Student::create($request->all());

        //Courses
        if ($request->input('courses')):
            $student->courses()->attach($request->input('courses'));
        endif;

        return redirect()->route('admin.user_managment.student.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function show(Student $student)
    {
        return view('admin.user_managment.students.show',[
           'student' => $student,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function edit(Student $student)
    {
        return view('admin.user_managment.students.edit',[
           'student' => $student,
           'courses' => Course::get(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function update(StudentRequest $request, Student $student)
    {
        $student->update($request->all());

        //Courses
        $student->courses()->detach();

        if($request->input('courses')):
            $student->courses()->attach($request->input('courses'));
        endif;

        return redirect()->route('admin.user_managment.student.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function destroy(Student $student)
    {
        //Courses
        $student->courses()->detach();

        $student->delete();

        return redirect()->route('admin.user_managment.student.index');
    }
}
