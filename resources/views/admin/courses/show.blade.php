@extends('admin.layouts.app')

@section('content')
    <div class="container">
        @component('admin.components.breadcrumb')

            @slot('title'){{$course->title}}@endslot
            @slot('parent')Главная@endslot
            @slot('active') {{$course->title}}@endslot
        @endcomponent
        <table class="table">

            <h1 class="text-center">Список преподователей</h1>
            <tbody>
            @forelse($course->users as $user)
                <tr>
                    <td>{{$user->name}}</td>
                    <td class="text-right">
                        <form action="{{route('admin.user_managment.user.show',$user)}}" method="post">
                            <a class="btn" href="{{route('admin.user_managment.user.show',$user)}}"><i class="fa fa-eye"></i></a>
                        </form>

                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="3" class="text-center"><h2>Данные отсутсвуют</h2></td>
                </tr>
            @endforelse
            </tbody>
        </table>



            <table class="table">

                <h1 class="text-center mt-5">Список студентов</h1>
                <tbody>
                @forelse($course->students as $student)
                    <tr>
                        <td>{{$student->name}} {{$student->surname}}</td>
                        <td class="text-right">
                            <form action="{{route('admin.user_managment.student.show',$student)}}" method="post">
                                <a class="btn" href="{{route('admin.user_managment.student.show',$student)}}"><i class="fa fa-eye"></i></a>
                            </form>

                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="3" class="text-center"><h2>Данные отсутсвуют</h2></td>
                    </tr>
                @endforelse
                </tbody>
            </table>


    </div>

@endsection