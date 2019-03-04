@extends('admin.layouts.app')

@section('content')
    <div class="container">
        @component('admin.components.breadcrumb')
            @slot('title')Добавления студента @endslot
            @slot('parent') Главная @endslot
            @slot('active') Студенты @endslot
        @endcomponent
        @if($errors->any())
            <div class="alert alert-danger">
                @foreach($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </div>
        @endif

        <hr/>
        <form class="form-horizontal" action="{{route('admin.user_managment.student.store')}}" method="post">
            {{csrf_field()}}
            <fieldset class="form-horizontal">
                <div class="form-group"><label class="col-sm-2 control-label">Фамилия:</label>
                    <div class="col-sm-12">
                        <input type="text" name="surname" class="form-control" placeholder="Фамилия" value="{{old('surname')}}">
                    </div>
                </div>

                <div class="form-group"><label class="col-sm-2 control-label">Имя:</label>
                    <div class="col-sm-12">
                        <input type="text" name="name" class="form-control" placeholder="Имя" value="{{old('name')}}">
                    </div>
                </div>

                <div class="form-group"><label class="col-sm-2 control-label">Отчество:</label>
                    <div class="col-sm-12">
                        <input type="text" name="father_name" class="form-control" placeholder="Отчество" value="{{old('father_name')}}">
                    </div>
                </div>

                <div class="form-group"><label class="col-sm-2 control-label">Дата рождения:</label>
                    <div class="col-sm-12">
                        <input type="date" name="date_of_birth" class="form-control" placeholder="Дата рождения" value="{{old('date_of_birth')}}">
                    </div>
                </div>

                <div class="form-group"><label class="col-sm-2 control-label">Телефон:</label>
                    <div class="col-sm-12">
                        <input type="tel" pattern="+992[0-9]{9}" name="phone" class="form-control" placeholder="+992 ххххххххх" value="{{old('phone')}}">
                    </div>
                </div>

                <div class="form-group"><label class="col-sm-2 control-label">Адресс:</label>
                    <div class="col-sm-12">
                        <input type="text" name="address" class="form-control" placeholder="Адресс" value="{{old('address')}}">
                    </div>
                </div>

                <div class="form-group"><label class="col-sm-2 control-label">Email:</label>
                    <div class="col-sm-12">
                        <input type="text" name="email" class="form-control" placeholder="email" value="{{old('email')}}">
                    </div>
                </div>

                <div class="form-group"><label class="col-sm-2 control-label">Курсы:</label>
                    <div class="col-sm-12">
                        <select name="courses[]" class="form-control" multiple="">

                            @foreach($courses as $course)
                                <option  value="{{$course->id}}">
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