@extends('admin.layouts.app')

@section('content')
    <div class="container">
        @component('admin.components.breadcrumb')
            @slot('title')Новый преподователь @endslot
            @slot('parent') Главная @endslot
            @slot('active') Преподователи @endslot
        @endcomponent
            @if($errors->any())
                <div class="alert alert-danger">
                    @foreach($errors->all() as $error)
                        <li>{{$error}}</li>
                    @endforeach
                </div>
            @endif

            <hr/>
        <form class="form-horizontal" action="{{route('admin.user_managment.user.store')}}" method="post">
            {{csrf_field()}}
            <fieldset class="form-horizontal">
                <div class="form-group"><label class="col-sm-2 control-label">Имя:</label>
                    <div class="col-sm-12">
                        <input type="text" name="name" class="form-control" placeholder="Имя" value="{{old('name')}}">
                    </div>
                </div>

                <div class="form-group"><label class="col-sm-2 control-label">Фамилия:</label>
                    <div class="col-sm-12">
                        <input type="text" name="surname" class="form-control" placeholder="Фамилия" value="{{old('surname')}}">
                    </div>
                </div>


                <div class="form-group"><label class="col-sm-2 control-label">Email:</label>
                    <div class="col-sm-12">
                        <input type="text" name="email" class="form-control" placeholder="email" value="{{old('email')}}">
                    </div>
                </div>

                <div class="form-group"><label class="col-sm-2 control-label">Пароль</label>
                    <div class="col-sm-12">
                        <input type="password" class="form-control" name="password">
                    </div>
                </div>

                <div class="form-group"><label class="col-sm-2 control-label">Потверждение пароля</label>
                    <div class="col-sm-12">
                        <input type="password" class="form-control" name="password_confirmation">
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