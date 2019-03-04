<?php

namespace App\Http\Controllers\Admin\UserManagment;

use App\Course;
use App\Http\Requests\CreateUserRequest;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.user_managment.users.index',[
           'users' => User::paginate(5)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.user_managment.users.create',[
           'user' => [],
            'courses' => Course::get(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateUserRequest $request)
    {
        //Add to Database
     $user = User::create([
        'name' => $request['name'],
        'surname' => $request['surname'],
        'email' => $request['email'],
        'password' => bcrypt($request['password']),
     ]);

     //Courses
     if ($request->input('courses')):
         $user->courses()->attach($request->input('courses'));
     endif;
        return redirect()->route('admin.user_managment.user.index');



    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return view('admin.user_managment.users.show',[
           'user' => $user,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('admin.user_managment.users.edit',[
           'user' => $user,
            'courses' => Course::get(),

        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {

        $massages = [
            'required' => 'Поле :attribute обязательное к заполнению!',
            'max' => 'Максисально допустимое количество символов - :max',
            'min' => 'Поле :attribute должно быть не короче 6 символов'

        ];

        $validator = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255',
                \Illuminate\Validation\Rule::unique('users')->ignore($user->id),],
            'password' => ['nullable', 'string', 'min:6', 'confirmed'],
        ],$massages);

        $user->name = $request['name'];
        $user->surname = $request['surname'];
        $user->email = $request['email'];
        $request['password'] == null ?: $user->password = bcrypt($request['password']);
        $user->save();

        return redirect()->route('admin.user_managment.user.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //Courses
        $user->courses()->detach();

        $user->delete();

        return redirect()->route('admin.user_managment.user.index');

    }
}
