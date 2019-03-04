@extends('admin.layouts.app')

@section('content')
    <div class="container">
        @component('admin.components.breadcrumb')
            @slot('title')Редактирование курса @endslot
            @slot('parent') Главная @endslot
            @slot('active') Курсы @endslot
        @endcomponent

        <hr/>
        <form class="form-horizontal" action="{{route('admin.course.update', $course)}}" method="post">

            {{method_field('PUT')}}
            {{csrf_field()}}
            <fieldset class="form-horizontal">
                <div class="form-group"><label class="col-sm-2 control-label">Название курса:</label>
                    <div class="col-sm-12">
                        <input type="text" name="title" class="form-control" placeholder="" value="{{$course->title ?? ''}}">
                    </div>
                </div>

                <div class="form-group"><label class="col-sm-2 control-label">Преподователи:</label>
                    <div class="col-sm-12">
                        <select name="users[]" class="form-control" multiple="">

                            @foreach($users as $user)
                                <option  value="{{$user->id ?? ''}}"
                                         @foreach($course->users as $course_user)
                                              @if($user->id == $course_user->id)
                                                 selected="selected"
                                              @endif
                                         @endforeach

                                >
                                    <label>{{$user->name}}</label>
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