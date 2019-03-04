@extends('admin.layouts.app')

@section('content')
   <div class="container">
       <div class="row">

           <div class="col-sm-4">
               <div class="jumbotron">
                   <p><span class="badge badge-primary " > Студентов {{$count_students}} </span></p>
               </div>
           </div>

           <div class="col-sm-4">
               <div class="jumbotron">
                   <p><span class="badge badge-primary " > Курсов {{$count_courses}} </span></p>
               </div>
           </div>

           <div class="col-sm-4">
               <div class="jumbotron">
                   <p><span class="badge badge-primary " > Преподавателей {{$count_users}} </span></p>
               </div>
           </div>
       </div>

       <div class="row">
           <div class="col-sm-6">
               <a href="{{route('admin.user_managment.student.create')}}" class="btn btn-primary btn-block">Добавить студента</a>
               @foreach($courses as $course)
               <a href="{{route('admin.course.edit',$course)}}" class="list-group-item">
                   <h4 class="list-group-item-heading">{{$course->title}}</h4>
                   <p class="list-group-item-text">
                      Кол-во студентов {{$course->students()->count()}}
                   </p>
               @endforeach
               </a>
           </div>

           <div class="col-sm-6">
               <a href="{{route('admin.user_managment.user.create')}}" class="btn btn-primary btn-block">Добавить преподователя</a>
               @foreach($courses as $course)
               <a href="{{route('admin.course.edit',$course)}}" class="list-group-item">
                   <h4 class="list-group-item-heading">{{$course->title}}</h4>
                   <p class="list-group-item-text">
                       Преподователи:{{$course->users()->pluck('name')->implode(' ,')}}
                   </p>
                @endforeach
               </a>
           </div>

       </div>


   </div>
@endsection