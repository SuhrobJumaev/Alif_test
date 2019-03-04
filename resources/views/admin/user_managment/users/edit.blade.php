@extends('admin.layouts.app')

@section('content')
<div class="container">
    @component('admin.components.breadcrumb')
    @slot('title')Редактирование преподователя @endslot
    @slot('parent') Главная @endslot
    @slot('active') Пользователи @endslot
    @endcomponent
        @if($errors->any())
            <div class="alert alert-danger">
                @foreach($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </div>
        @endif

        <hr>
    <form class="form-horizontal" action="{{route('admin.user_managment.user.update', $user)}}" method="post">

        {{method_field('PUT')}}
        {{csrf_field()}}
        <fieldset class="form-horizontal">
            <div class="form-group"><label class="col-sm-2 control-label">Имя:</label>
                <div class="col-sm-12">
                    <input type="text" name="name" class="form-control" placeholder="" value="@if(old('name')){{old('name')}}@else{{$user->name ?? ""}}@endif">
                </div>
            </div>

            <div class="form-group"><label class="col-sm-2 control-label">Фамилия:</label>
                <div class="col-sm-12">
                    <input type="text" name="surname" class="form-control" placeholder="" value="@if(old('surname')){{old('surname')}}@else{{$user->surname ?? ""}}@endif">
                </div>
            </div>


            <div class="form-group"><label class="col-sm-2 control-label">Email:</label>
                <div class="col-sm-12">
                    <input type="text" name="email" class="form-control" placeholder="" value="@if(old('email')){{old('email')}}@else{{$user->email ?? ""}}@endif">
                </div>
            </div>

            <div class="form-group"><label class="col-sm-2 control-label">Пароль:</label>
                <div class="col-sm-12">
                    <input type="password" class="form-control" name="password">
                </div>
            </div>

            <div class="form-group"><label class="col-sm-2 control-label">Потверждение пароля:</label>
                <div class="col-sm-12">
                    <input type="password" class="form-control" name="password_confirmation">
                </div>
            </div>

            <div class="form-group"><label class="col-sm-2 control-label">Курсы:</label>
                <div class="col-sm-12">
                    <select name="courses[]" class="form-control" multiple="">
                        @foreach($courses as $course)
                            <option  value="{{$course->id}}"
                                     @foreach($user->courses as $user_course)
                                     @if($course->id == $user_course->id)
                                     selected="selected"
                                    @endif
                                    @endforeach
                            >
                                <label>{{$course->title}}</label>
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="form-group">
                <div class="col-sm-4 col-sm-offset-2">
                    <button class="btn btn-primary" type="submit">Сохранить</button>
                </div>
            </div>
        </fieldset>
    </form>
</div>
@endsection