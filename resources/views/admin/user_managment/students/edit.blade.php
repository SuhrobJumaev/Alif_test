@extends('admin.layouts.app')

@section('content')
    <div class="container">
        @component('admin.components.breadcrumb')
            @slot('title')Редактирования студента @endslot
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
        <form class="form-horizontal" action="{{route('admin.user_managment.student.update',$student)}}" method="post">
            {{method_field('PUT')}}
            {{csrf_field()}}
            <fieldset class="form-horizontal">
                <div class="form-group"><label class="col-sm-2 control-label">Фамилия:</label>
                    <div class="col-sm-12">
                        <input type="text" name="surname" class="form-control" placeholder=""
                               value="@if(old('surname')){{old('surname')}}@else{{$student->surname ?? ""}}@endif">
                    </div>
                </div>

                <div class="form-group"><label class="col-sm-2 control-label">Имя:</label>
                    <div class="col-sm-12">
                        <input type="text" name="name" class="form-control" placeholder=""
                               value="@if(old('name')){{old('name')}}@else{{$student->name ?? ""}}@endif">
                    </div>
                </div>

                <div class="form-group"><label class="col-sm-2 control-label">Отчество:</label>
                    <div class="col-sm-12">
                        <input type="text" name="father_name" class="form-control" placeholder=""
                               value="@if(old('father_name')){{old('father_name')}}@else{{$student->father_name ?? ""}}@endif">
                    </div>
                </div>

                <div class="form-group"><label class="col-sm-2 control-label">Дата рождения:</label>
                    <div class="col-sm-12">
                        <input type="date" name="date_of_birth" class="form-control" placeholder=""
                               value="@if(old('date_of_birth')){{old('date_of_birth')}}@else{{$student->date_of_birth ?? ""}}@endif">
                    </div>
                </div>

                <div class="form-group"><label class="col-sm-2 control-label">Телефон:</label>
                    <div class="col-sm-12">
                        <input type="tel" name="phone" class="form-control" placeholder=""
                               value="@if(old('phone')){{old('phone')}}@else{{$student->phone ?? ""}}@endif">
                    </div>
                </div>

                <div class="form-group"><label class="col-sm-2 control-label">Адресс:</label>
                    <div class="col-sm-12">
                        <input type="text" name="address" class="form-control" placeholder=""
                               value="@if(old('address')){{old('address')}}@else{{$student->address ?? ""}}@endif">
                    </div>
                </div>

                <div class="form-group"><label class="col-sm-2 control-label">Email:</label>
                    <div class="col-sm-12">
                        <input type="text" name="email" class="form-control" placeholder=""
                               value="@if(old('email')){{old('email')}}@else{{$student->email ?? ""}}@endif">
                    </div>
                </div>

                <div class="form-group"><label class="col-sm-2 control-label">Курсы:</label>
                    <div class="col-sm-12">
                        <select name="courses[]" class="form-control" multiple="">
                            @foreach($courses as $course)
                                <option  value="{{$course->id}}"
                                         @foreach($student->courses as $student_course)
                                         @if($course->id == $student_course->id)
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